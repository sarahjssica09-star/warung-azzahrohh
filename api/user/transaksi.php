<?php
header('Content-Type: application/json; charset=utf-8');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function kirimJson(int $statusCode, array $response): void
{
    http_response_code($statusCode);
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

function angkaJson($nilai)
{
    $angka = round((float) $nilai, 2);
    return floor($angka) === $angka ? (int) $angka : $angka;
}

function bacaJsonBody(): array
{
    $raw = file_get_contents('php://input');
    $data = json_decode($raw === false ? '' : $raw, true);
    if (!is_array($data)) {
        throw new InvalidArgumentException('Format JSON tidak valid.');
    }
    return $data;
}

function ambilIntegerPositif(array $data, string $nama): int
{
    if (!array_key_exists($nama, $data) || is_array($data[$nama]) || is_object($data[$nama])) {
        throw new InvalidArgumentException("Field {$nama} wajib diisi dengan bilangan bulat lebih dari 0.");
    }
    $nilai = filter_var($data[$nama], FILTER_VALIDATE_INT);
    if ($nilai === false || $nilai <= 0) {
        throw new InvalidArgumentException("Field {$nama} wajib berupa bilangan bulat lebih dari 0.");
    }
    return (int) $nilai;
}

function ambilKolomTeksOpsional(array $data, string $nama): ?string
{
    if (!array_key_exists($nama, $data) || $data[$nama] === null) {
        return null;
    }
    if (!is_string($data[$nama])) {
        throw new InvalidArgumentException("Field {$nama} harus berupa teks.");
    }
    return trim($data[$nama]);
}

function satuBaris(mysqli_stmt $stmt): ?array
{
    $result = $stmt->get_result();
    return $result->fetch_assoc() ?: null;
}

function ambilProduk(mysqli $conn, int $idProduk, bool $kunci = false): ?array
{
    $sql = 'SELECT id_produk, nama_produk, harga, stok, status_produk FROM produk WHERE id_produk = ?';
    if ($kunci) {
        $sql .= ' FOR UPDATE';
    }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idProduk);
    $stmt->execute();
    $produk = satuBaris($stmt);
    $stmt->close();
    return $produk;
}

function ambilVoucher(mysqli $conn, string $kodeVoucher): ?array
{
    $stmt = $conn->prepare(
        "SELECT id_voucher, kode_voucher, jenis_diskon, nilai_diskon, minimal_belanja
         FROM voucher
         WHERE kode_voucher = ? AND status_voucher = 'aktif'
         LIMIT 1
         FOR UPDATE"
    );
    $stmt->bind_param('s', $kodeVoucher);
    $stmt->execute();
    $voucher = satuBaris($stmt);
    $stmt->close();
    return $voucher;
}

try {
    $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    if (!in_array($method, ['GET', 'POST'], true)) {
        header('Allow: GET, POST');
        kirimJson(405, [
            'success' => false,
            'message' => 'Method tidak diizinkan. Gunakan GET atau POST.',
            'data' => null
        ]);
    }

    ob_start();
    require_once __DIR__ . '/../../config.php';
    ob_end_clean();
    if (!isset($conn) || !($conn instanceof mysqli)) {
        throw new RuntimeException('Koneksi database tidak tersedia.');
    }

    if ($method === 'POST' && ($_POST['action'] ?? '') === 'upload_bukti') {
        if (($_SESSION['role'] ?? '') !== 'user' || empty($_SESSION['id_user'])) { kirimJson(401, ['success'=>false,'message'=>'Silakan login sebagai user.','data'=>null]); }
        $idUser = (int) $_SESSION['id_user'];
        if (isset($_POST['id_user']) && (int) $_POST['id_user'] !== $idUser) { kirimJson(403, ['success'=>false,'message'=>'Akses ke data user lain ditolak.','data'=>null]); }
        $idTransaksi = filter_var($_POST['id_transaksi'] ?? null, FILTER_VALIDATE_INT);
        if ($idUser === false || $idUser <= 0 || $idTransaksi === false || $idTransaksi <= 0) {
            throw new InvalidArgumentException('id_user dan id_transaksi wajib berupa bilangan bulat lebih dari 0.');
        }
        if (!isset($_FILES['bukti_transaksi']) || !is_array($_FILES['bukti_transaksi'])) {
            throw new InvalidArgumentException('File bukti_transaksi wajib dipilih.');
        }
        $file = $_FILES['bukti_transaksi'];
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            throw new InvalidArgumentException('Upload bukti pembayaran gagal. Pilih file kembali.');
        }
        if (($file['size'] ?? 0) < 1 || $file['size'] > 5 * 1024 * 1024) {
            throw new InvalidArgumentException('Ukuran bukti pembayaran maksimal 5 MB.');
        }
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        $extensions = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'application/pdf' => 'pdf'];
        if (!isset($extensions[$mime])) {
            throw new InvalidArgumentException('Format bukti harus JPG, PNG, WEBP, atau PDF.');
        }
        $folder = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'bukti-pembayaran';
        if (!is_dir($folder) && !mkdir($folder, 0755, true) && !is_dir($folder)) {
            throw new RuntimeException('Folder penyimpanan bukti pembayaran tidak dapat dibuat.');
        }
        $namaFile = 'trx-' . $idTransaksi . '-' . bin2hex(random_bytes(8)) . '.' . $extensions[$mime];
        $tujuan = $folder . DIRECTORY_SEPARATOR . $namaFile;
        if (!move_uploaded_file($file['tmp_name'], $tujuan)) {
            throw new RuntimeException('File bukti pembayaran tidak dapat disimpan.');
        }
        $pathRelatif = 'uploads/bukti-pembayaran/' . $namaFile;
        $stmt = $conn->prepare(
            "UPDATE transaksi SET bukti_pembayaran = ?, updated_at = NOW()
             WHERE id_transaksi = ? AND id_user = ? AND metode_pembayaran = 'qris'
               AND status_pembayaran = 'menunggu_verifikasi' AND status_pesanan = 'menunggu_pembayaran'"
        );
        $stmt->bind_param('sii', $pathRelatif, $idTransaksi, $idUser);
        $stmt->execute();
        $changed = $stmt->affected_rows;
        $stmt->close();
        if ($changed !== 1) {
            @unlink($tujuan);
            throw new DomainException('Transaksi QRIS tidak ditemukan, bukan milik user ini, atau sudah tidak menunggu bukti.');
        }
        kirimJson(200, ['success' => true, 'message' => 'Bukti pembayaran berhasil diunggah dan menunggu verifikasi FO.', 'data' => ['id_transaksi' => (int) $idTransaksi, 'bukti_pembayaran' => $pathRelatif, 'status_pembayaran' => 'menunggu_verifikasi']]);
    }
    if ($method === 'GET') {
        if (!isset($_GET['id_transaksi']) || $_GET['id_transaksi'] === '') {
            if (($_SESSION['role'] ?? '') !== 'user' || empty($_SESSION['id_user'])) { kirimJson(401, ['success'=>false,'message'=>'Silakan login sebagai user.','data'=>null]); }
            $idUser = (int) $_SESSION['id_user'];
            if (isset($_GET['id_user']) && (int) $_GET['id_user'] !== $idUser) { kirimJson(403, ['success'=>false,'message'=>'Akses ke data user lain ditolak.','data'=>null]); }
            $stmt = $conn->prepare(
                'SELECT id_transaksi, id_user, nama_customer, tanggal_masuk, total_harga,
                        id_voucher, kode_voucher, diskon, total_bayar, metode_pembayaran,
                        status_pembayaran, status_pesanan, bukti_pembayaran,
                        alamat_pengiriman, catatan
                 FROM transaksi
                 WHERE id_user = ?
                 ORDER BY tanggal_masuk DESC, id_transaksi DESC'
            );
            $stmt->bind_param('i', $idUser);
            $stmt->execute();
            $resultTransaksi = $stmt->get_result();
            $daftarTransaksi = [];

            while ($rowTransaksi = $resultTransaksi->fetch_assoc()) {
                $idBarisTransaksi = (int) $rowTransaksi['id_transaksi'];
                $stmtDetailDaftar = $conn->prepare(
                    'SELECT d.id_produk, p.nama_produk, d.jumlah, d.harga_satuan, d.subtotal
                     FROM detail_transaksi AS d
                     LEFT JOIN produk AS p ON p.id_produk = d.id_produk
                     WHERE d.id_transaksi = ?
                     ORDER BY d.id_detail ASC'
                );
                $stmtDetailDaftar->bind_param('i', $idBarisTransaksi);
                $stmtDetailDaftar->execute();
                $resultDetailDaftar = $stmtDetailDaftar->get_result();
                $itemsDaftar = [];
                while ($itemDaftar = $resultDetailDaftar->fetch_assoc()) {
                    $itemsDaftar[] = [
                        'id_produk' => $itemDaftar['id_produk'] === null ? null : (int) $itemDaftar['id_produk'],
                        'nama_produk' => $itemDaftar['nama_produk'],
                        'jumlah' => $itemDaftar['jumlah'] === null ? null : (int) $itemDaftar['jumlah'],
                        'harga_satuan' => angkaJson($itemDaftar['harga_satuan'] ?? 0),
                        'subtotal' => angkaJson($itemDaftar['subtotal'] ?? 0)
                    ];
                }
                $stmtDetailDaftar->close();

                $daftarTransaksi[] = [
                    'id_transaksi' => $idBarisTransaksi,
                    'id_user' => (int) $rowTransaksi['id_user'],
                    'nama_customer' => $rowTransaksi['nama_customer'],
                    'tanggal_masuk' => $rowTransaksi['tanggal_masuk'],
                    'total_harga' => angkaJson($rowTransaksi['total_harga']),
                    'id_voucher' => $rowTransaksi['id_voucher'] === null ? null : (int) $rowTransaksi['id_voucher'],
                    'kode_voucher' => $rowTransaksi['kode_voucher'],
                    'diskon' => angkaJson($rowTransaksi['diskon']),
                    'total_pembayaran' => angkaJson($rowTransaksi['total_bayar']),
                    'metode_pembayaran' => $rowTransaksi['metode_pembayaran'],
                    'status_pembayaran' => $rowTransaksi['status_pembayaran'],
                    'status_pesanan' => $rowTransaksi['status_pesanan'],
                    'bukti_pembayaran' => $rowTransaksi['bukti_pembayaran'],
                    'alamat_pengiriman' => $rowTransaksi['alamat_pengiriman'],
                    'catatan' => $rowTransaksi['catatan'],
                    'items' => $itemsDaftar
                ];
            }
            $stmt->close();

            kirimJson(200, [
                'success' => true,
                'message' => 'Daftar transaksi berhasil diambil',
                'data' => $daftarTransaksi
            ]);
        }

        if (($_SESSION['role'] ?? '') !== 'user' || empty($_SESSION['id_user'])) { kirimJson(401, ['success'=>false,'message'=>'Silakan login sebagai user.','data'=>null]); }
            $idUser = (int) $_SESSION['id_user'];
            if (isset($_GET['id_user']) && (int) $_GET['id_user'] !== $idUser) { kirimJson(403, ['success'=>false,'message'=>'Akses ke data user lain ditolak.','data'=>null]); }

        $idTransaksi = ambilIntegerPositif($_GET, 'id_transaksi');
        $stmt = $conn->prepare(
            'SELECT id_transaksi, id_user, tanggal_masuk, total_harga, id_voucher, kode_voucher,
                    diskon, total_bayar, metode_pembayaran, status_pembayaran, status_pesanan, bukti_pembayaran,
                    alamat_pengiriman, catatan
             FROM transaksi
             WHERE id_transaksi = ? AND id_user = ?
             LIMIT 1'
        );
        $stmt->bind_param('ii', $idTransaksi, $idUser);
        $stmt->execute();
        $transaksi = satuBaris($stmt);
        $stmt->close();

        if ($transaksi === null) {
            throw new OutOfBoundsException('Transaksi tidak ditemukan untuk user tersebut.');
        }

        $stmt = $conn->prepare(
            'SELECT d.id_produk, p.nama_produk, d.jumlah, d.harga_satuan, d.subtotal
             FROM detail_transaksi AS d
             LEFT JOIN produk AS p ON p.id_produk = d.id_produk
             WHERE d.id_transaksi = ?
             ORDER BY d.id_detail ASC'
        );
        $stmt->bind_param('i', $idTransaksi);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = [
                'id_produk' => $row['id_produk'] === null ? null : (int) $row['id_produk'],
                'nama_produk' => $row['nama_produk'],
                'jumlah' => $row['jumlah'] === null ? null : (int) $row['jumlah'],
                'harga_satuan' => angkaJson($row['harga_satuan'] ?? 0),
                'subtotal' => angkaJson($row['subtotal'] ?? 0)
            ];
        }
        $stmt->close();

        kirimJson(200, [
            'success' => true,
            'message' => 'Detail transaksi berhasil diambil',
            'data' => [
                'id_transaksi' => (int) $transaksi['id_transaksi'],
                'id_user' => (int) $transaksi['id_user'],
                'tanggal_masuk' => $transaksi['tanggal_masuk'],
                'items' => $items,
                'total_harga' => angkaJson($transaksi['total_harga']),
                'id_voucher' => $transaksi['id_voucher'] === null ? null : (int) $transaksi['id_voucher'],
                'kode_voucher' => $transaksi['kode_voucher'],
                'diskon' => angkaJson($transaksi['diskon']),
                'total_pembayaran' => angkaJson($transaksi['total_bayar']),
                'metode_pembayaran' => $transaksi['metode_pembayaran'],
                'status_pembayaran' => $transaksi['status_pembayaran'],
                'status_pesanan' => $transaksi['status_pesanan'],
                'bukti_pembayaran' => $transaksi['bukti_pembayaran'],
                'alamat_pengiriman' => $transaksi['alamat_pengiriman'],
                'catatan' => $transaksi['catatan']
            ]
        ]);
    }

    $input = bacaJsonBody();
    if (($_SESSION['role'] ?? '') !== 'user' || empty($_SESSION['id_user'])) { kirimJson(401, ['success'=>false,'message'=>'Silakan login sebagai user.','data'=>null]); }
        $idUser = (int) $_SESSION['id_user'];
        if (isset($input['id_user']) && (int) $input['id_user'] !== $idUser) { kirimJson(403, ['success'=>false,'message'=>'Akses ke data user lain ditolak.','data'=>null]); }
    if (!isset($input['metode_pembayaran']) || !is_string($input['metode_pembayaran'])) {
        throw new InvalidArgumentException('Field metode_pembayaran wajib diisi dengan cash atau qris.');
    }
    $metodePembayaran = strtolower(trim($input['metode_pembayaran']));
    if (!in_array($metodePembayaran, ['cash', 'qris'], true)) {
        throw new InvalidArgumentException('Metode pembayaran hanya boleh cash atau qris.');
    }

    $kodeVoucher = ambilKolomTeksOpsional($input, 'kode_voucher');
    if ($kodeVoucher === '') {
        $kodeVoucher = null;
    }
    if ($kodeVoucher !== null && strlen($kodeVoucher) > 50) {
        throw new InvalidArgumentException('Kode voucher maksimal 50 karakter.');
    }
    $alamatPengiriman = ambilKolomTeksOpsional($input, 'alamat_pengiriman');
    $catatan = ambilKolomTeksOpsional($input, 'catatan');

    $conn->begin_transaction();
    try {
        $stmt = $conn->prepare('SELECT id_keranjang FROM keranjang WHERE id_user = ? FOR UPDATE');
        $stmt->bind_param('i', $idUser);
        $stmt->execute();
        $cart = satuBaris($stmt);
        $stmt->close();

        if ($cart === null) {
            throw new DomainException('Keranjang user masih kosong.');
        }
        $idKeranjang = (int) $cart['id_keranjang'];

        $stmt = $conn->prepare(
            'SELECT id_produk, jumlah FROM detail_keranjang WHERE id_keranjang = ? ORDER BY id_produk ASC FOR UPDATE'
        );
        $stmt->bind_param('i', $idKeranjang);
        $stmt->execute();
        $result = $stmt->get_result();
        $cartLines = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        if (count($cartLines) === 0) {
            throw new DomainException('Keranjang user masih kosong.');
        }

        $items = [];
        $subtotal = 0.0;
        foreach ($cartLines as $line) {
            $idProduk = (int) $line['id_produk'];
            $jumlah = (int) $line['jumlah'];
            if ($jumlah <= 0) {
                throw new DomainException('Ada jumlah produk di keranjang yang tidak valid.');
            }

            $produk = ambilProduk($conn, $idProduk, true);
            if ($produk === null) {
                throw new DomainException('Produk dengan ID ' . $idProduk . ' tidak ditemukan.');
            }
            if ($produk['status_produk'] !== 'aktif') {
                throw new DomainException('Produk ' . $produk['nama_produk'] . ' sudah tidak aktif.');
            }
            if ($jumlah > (int) $produk['stok']) {
                throw new DomainException(
                    'Stok produk ' . $produk['nama_produk'] . ' tidak cukup. Stok tersedia: ' . (int) $produk['stok'] . '.'
                );
            }

            $harga = (float) $produk['harga'];
            $subtotalItem = round($harga * $jumlah, 2);
            $subtotal += $subtotalItem;
            $items[] = [
                'id_produk' => $idProduk,
                'jumlah' => $jumlah,
                'harga_satuan' => $harga,
                'subtotal' => $subtotalItem
            ];
        }
        $subtotal = round($subtotal, 2);

        $idVoucher = null;
        $kodeVoucherTersimpan = null;
        $diskon = 0.0;
        if ($kodeVoucher !== null) {
            $voucher = ambilVoucher($conn, $kodeVoucher);
            if ($voucher === null) {
                throw new DomainException('Voucher tidak valid atau tidak aktif.');
            }

            if ($subtotal < (float) $voucher['minimal_belanja']) {
                throw new DomainException('Minimal pembelian untuk voucher ini belum terpenuhi.');
            }

            $nilaiDiskon = (float) $voucher['nilai_diskon'];
            if ($voucher['jenis_diskon'] === 'nominal') {
                $diskon = $nilaiDiskon;
            } elseif ($voucher['jenis_diskon'] === 'persen') {
                $diskon = $subtotal * ($nilaiDiskon / 100);
            } else {
                throw new RuntimeException('Jenis diskon voucher tidak dikenali.');
            }
            $diskon = min($subtotal, round($diskon, 2));
            $idVoucher = (int) $voucher['id_voucher'];
            $kodeVoucherTersimpan = $voucher['kode_voucher'];
        }

        $totalPembayaran = max(0, round($subtotal - $diskon, 2));
        $statusPembayaran = $metodePembayaran === 'cash' ? 'berhasil' : 'menunggu_verifikasi';
        $statusPesanan = 'menunggu_pembayaran';

        $stmt = $conn->prepare(
            'INSERT INTO transaksi
                (id_user, tanggal_masuk, total_harga, id_voucher, kode_voucher, diskon,
                 total_bayar, metode_pembayaran, status_pembayaran, status_pesanan,
                 alamat_pengiriman, catatan)
             VALUES (?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->bind_param(
            'idisddsssss',
            $idUser,
            $subtotal,
            $idVoucher,
            $kodeVoucherTersimpan,
            $diskon,
            $totalPembayaran,
            $metodePembayaran,
            $statusPembayaran,
            $statusPesanan,
            $alamatPengiriman,
            $catatan
        );
        $stmt->execute();
        $idTransaksi = (int) $conn->insert_id;
        $stmt->close();

        $stmtDetail = $conn->prepare(
            'INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, harga_satuan, subtotal)
             VALUES (?, ?, ?, ?, ?)'
        );
        foreach ($items as $item) {
            $idProdukDetail = $item['id_produk'];
            $jumlahDetail = $item['jumlah'];
            $hargaSatuan = $item['harga_satuan'];
            $subtotalProduk = $item['subtotal'];
            $stmtDetail->bind_param(
                'iiidd',
                $idTransaksi,
                $idProdukDetail,
                $jumlahDetail,
                $hargaSatuan,
                $subtotalProduk
            );
            $stmtDetail->execute();
        }
        $stmtDetail->close();

        $stmt = $conn->prepare('DELETE FROM detail_keranjang WHERE id_keranjang = ?');
        $stmt->bind_param('i', $idKeranjang);
        $stmt->execute();
        $stmt->close();

        $conn->commit();
    } catch (Throwable $error) {
        $conn->rollback();
        throw $error;
    }

    kirimJson(201, [
        'success' => true,
        'message' => 'Transaksi berhasil dibuat',
        'data' => [
            'id_transaksi' => $idTransaksi,
            'subtotal' => angkaJson($subtotal),
            'kode_voucher' => $kodeVoucherTersimpan,
            'diskon' => angkaJson($diskon),
            'total_pembayaran' => angkaJson($totalPembayaran),
            'metode_pembayaran' => $metodePembayaran,
            'status_pembayaran' => $statusPembayaran,
            'status_pesanan' => $statusPesanan
        ]
    ]);
} catch (InvalidArgumentException $error) {
    kirimJson(400, [
        'success' => false,
        'message' => $error->getMessage(),
        'data' => null
    ]);
} catch (OutOfBoundsException $error) {
    kirimJson(404, [
        'success' => false,
        'message' => $error->getMessage(),
        'data' => null
    ]);
} catch (DomainException $error) {
    kirimJson(422, [
        'success' => false,
        'message' => $error->getMessage(),
        'data' => null
    ]);
} catch (Throwable $error) {
    kirimJson(500, [
        'success' => false,
        'message' => 'Terjadi kesalahan database: ' . $error->getMessage(),
        'data' => null
    ]);
}
?>