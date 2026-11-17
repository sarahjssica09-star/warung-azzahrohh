<?php
header('Content-Type: application/json; charset=utf-8');

function foJson(int $status, array $body): void
{
    http_response_code($status);
    echo json_encode($body, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}
function foBody(): array
{
    $data = json_decode(file_get_contents('php://input') ?: '', true);
    if (!is_array($data)) throw new InvalidArgumentException('Format JSON tidak valid.');
    return $data;
}
function foId($value, string $field): int
{
    $id = filter_var($value, FILTER_VALIDATE_INT);
    if ($id === false || $id <= 0) throw new InvalidArgumentException("{$field} wajib berupa bilangan bulat lebih dari 0.");
    return (int)$id;
}
function foItems(mysqli $conn, int $id): array
{
    $stmt = $conn->prepare(
        'SELECT d.id_produk, p.nama_produk, d.jumlah, d.harga_satuan, d.subtotal
         FROM detail_transaksi d LEFT JOIN produk p ON p.id_produk = d.id_produk
         WHERE d.id_transaksi = ? ORDER BY d.id_detail ASC'
    );
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = [
            'id_produk' => $row['id_produk'] === null ? null : (int)$row['id_produk'],
            'nama_produk' => $row['nama_produk'] ?? 'Produk tidak tersedia',
            'jumlah' => (int)$row['jumlah'],
            'harga_satuan' => (float)$row['harga_satuan'],
            'subtotal' => (float)$row['subtotal']
        ];
    }
    $stmt->close();
    return $items;
}
function foTransaction(mysqli $conn, array $row): array
{
    return [
        'id_transaksi' => (int)$row['id_transaksi'],
        'id_user' => (int)$row['id_user'],
        'nama_pelanggan' => $row['nama_pelanggan'] ?: ('User ' . (int)$row['id_user']),
        'tanggal_masuk' => $row['tanggal_masuk'],
        'tanggal_diproses' => $row['tanggal_diproses'],
        'tanggal_selesai' => $row['tanggal_selesai'],
        'total_harga' => (float)$row['total_harga'],
        'id_voucher' => $row['id_voucher'] === null ? null : (int)$row['id_voucher'],
        'kode_voucher' => $row['kode_voucher'],
        'diskon' => (float)$row['diskon'],
        'total_pembayaran' => (float)$row['total_bayar'],
        'metode_pembayaran' => $row['metode_pembayaran'],
        'status_pembayaran' => $row['status_pembayaran'],
        'status_pesanan' => $row['status_pesanan'],
        'bukti_pembayaran' => $row['bukti_pembayaran'],
        'alamat_pengiriman' => $row['alamat_pengiriman'],
        'catatan' => $row['catatan'],
        'items' => foItems($conn, (int)$row['id_transaksi'])
    ];
}

try {
    ob_start();
    require_once __DIR__ . '/../../config.php';
    ob_end_clean();
    if (!isset($conn) || !($conn instanceof mysqli)) throw new RuntimeException('Koneksi database tidak tersedia.');

    $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    if ($method === 'GET') {
        $baseSelect = "SELECT t.id_transaksi, t.id_user,
                              COALESCE(NULLIF(u.nama, ''), NULLIF(t.nama_customer, ''), CONCAT('User ', t.id_user)) AS nama_pelanggan,
                              t.tanggal_masuk, t.tanggal_diproses, t.tanggal_selesai,
                              t.total_harga, t.id_voucher, t.kode_voucher, t.diskon, t.total_bayar,
                              t.metode_pembayaran, t.status_pembayaran, t.status_pesanan,
                              t.bukti_pembayaran, t.alamat_pengiriman, t.catatan
                       FROM transaksi t LEFT JOIN users u ON u.id_user = t.id_user";
        if (isset($_GET['id_transaksi'])) {
            $id = foId($_GET['id_transaksi'], 'id_transaksi');
            $stmt = $conn->prepare($baseSelect . ' WHERE t.id_transaksi = ? AND t.id_user IS NOT NULL LIMIT 1');
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $row = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            if (!$row) foJson(404, ['success' => false, 'message' => 'Transaksi online tidak ditemukan.', 'data' => null]);
            foJson(200, ['success' => true, 'message' => 'Detail transaksi berhasil diambil.', 'data' => foTransaction($conn, $row)]);
        }

        $view = $_GET['view'] ?? 'incoming';
        $conditions = [
            'incoming' => "t.id_user IS NOT NULL AND t.status_pesanan = 'menunggu_pembayaran'
                           AND ((t.metode_pembayaran = 'qris' AND t.status_pembayaran = 'menunggu_verifikasi' AND t.bukti_pembayaran IS NOT NULL AND t.bukti_pembayaran <> '')
                             OR (t.metode_pembayaran = 'cash' AND t.status_pembayaran = 'berhasil'))",
            'processing' => "t.id_user IS NOT NULL AND t.status_pesanan IN ('diproses', 'dikirim')",
            'history' => "t.id_user IS NOT NULL AND t.status_pesanan IN ('selesai', 'ditolak', 'dibatalkan')"
        ];
        if (!isset($conditions[$view])) throw new InvalidArgumentException('view harus incoming, processing, atau history.');
        $sql = $baseSelect . ' WHERE ' . $conditions[$view] . ' ORDER BY t.tanggal_masuk DESC, t.id_transaksi DESC';
        $result = $conn->query($sql);
        $rows = [];
        while ($row = $result->fetch_assoc()) $rows[] = foTransaction($conn, $row);
        foJson(200, ['success' => true, 'message' => 'Daftar transaksi berhasil diambil.', 'data' => $rows]);
    }

    if ($method === 'PUT') {
        $body = foBody();
        $id = foId($body['id_transaksi'] ?? null, 'id_transaksi');
        $action = $body['action'] ?? '';
        if (!in_array($action, ['proses', 'tolak', 'selesaikan'], true)) throw new InvalidArgumentException('action harus proses, tolak, atau selesaikan.');

        $conn->begin_transaction();
        try {
            $stmt = $conn->prepare(
                'SELECT id_transaksi, id_user, metode_pembayaran, status_pembayaran, status_pesanan, bukti_pembayaran
                 FROM transaksi WHERE id_transaksi = ? AND id_user IS NOT NULL FOR UPDATE'
            );
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $row = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            if (!$row) throw new OutOfBoundsException('Pesanan online tidak ditemukan.');

            if ($action === 'proses') {
                if ($row['status_pesanan'] !== 'menunggu_pembayaran') throw new LogicException('Pesanan ini bukan lagi pesanan masuk.');
                if ($row['metode_pembayaran'] === 'qris') {
                    if ($row['status_pembayaran'] !== 'menunggu_verifikasi' || !$row['bukti_pembayaran']) {
                        throw new DomainException('Bukti QRIS belum tersedia atau pembayaran tidak menunggu verifikasi.');
                    }
                    $stmt = $conn->prepare("UPDATE transaksi SET status_pembayaran = 'berhasil', status_pesanan = 'diproses', tanggal_diproses = NOW(), updated_at = NOW() WHERE id_transaksi = ?");
                } else {
                    if ($row['status_pembayaran'] !== 'berhasil') throw new DomainException('Pembayaran tunai belum berstatus berhasil.');
                    $stmt = $conn->prepare("UPDATE transaksi SET status_pesanan = 'diproses', tanggal_diproses = NOW(), updated_at = NOW() WHERE id_transaksi = ?");
                }
            } elseif ($action === 'tolak') {
                if ($row['status_pesanan'] !== 'menunggu_pembayaran') throw new LogicException('Hanya pesanan masuk yang dapat ditolak.');
                $stmt = $conn->prepare(
                    "UPDATE transaksi SET status_pesanan = 'ditolak',
                     status_pembayaran = IF(status_pembayaran = 'menunggu_verifikasi', 'gagal', status_pembayaran),
                     updated_at = NOW() WHERE id_transaksi = ?"
                );
            } else {
                if (!in_array($row['status_pesanan'], ['diproses', 'dikirim'], true)) throw new LogicException('Pesanan belum berada dalam status proses.');
                $stmt = $conn->prepare("UPDATE transaksi SET status_pesanan = 'selesai', tanggal_selesai = NOW(), updated_at = NOW() WHERE id_transaksi = ?");
            }
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
            $conn->commit();
        } catch (Throwable $error) {
            $conn->rollback();
            throw $error;
        }

        $stmt = $conn->prepare(
            "SELECT t.id_transaksi, t.id_user,
                    COALESCE(NULLIF(u.nama, ''), NULLIF(t.nama_customer, ''), CONCAT('User ', t.id_user)) AS nama_pelanggan,
                    t.tanggal_masuk, t.tanggal_diproses, t.tanggal_selesai,
                    t.total_harga, t.id_voucher, t.kode_voucher, t.diskon, t.total_bayar,
                    t.metode_pembayaran, t.status_pembayaran, t.status_pesanan,
                    t.bukti_pembayaran, t.alamat_pengiriman, t.catatan
             FROM transaksi t LEFT JOIN users u ON u.id_user = t.id_user WHERE t.id_transaksi = ?"
        );
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $updated = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        foJson(200, ['success' => true, 'message' => 'Status pesanan berhasil diperbarui.', 'data' => foTransaction($conn, $updated)]);
    }

    header('Allow: GET, PUT');
    foJson(405, ['success' => false, 'message' => 'Method tidak diizinkan. Gunakan GET atau PUT.', 'data' => null]);
} catch (InvalidArgumentException $error) {
    foJson(400, ['success' => false, 'message' => $error->getMessage(), 'data' => null]);
} catch (OutOfBoundsException $error) {
    foJson(404, ['success' => false, 'message' => $error->getMessage(), 'data' => null]);
} catch (DomainException $error) {
    foJson(422, ['success' => false, 'message' => $error->getMessage(), 'data' => null]);
} catch (LogicException $error) {
    foJson(409, ['success' => false, 'message' => $error->getMessage(), 'data' => null]);
} catch (Throwable $error) {
    foJson(500, ['success' => false, 'message' => 'Terjadi kesalahan database: ' . $error->getMessage(), 'data' => null]);
}