<?php
header('Content-Type: application/json; charset=utf-8');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function kirimJson(int $statusCode, array $response): void
{
    http_response_code($statusCode);
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

function bacaInput(): array
{
    $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');

    if ($method === 'GET') {
        return $_GET;
    }

    if ($method === 'POST' && !empty($_POST)) {
        return $_POST;
    }

    $rawInput = file_get_contents('php://input');
    if ($rawInput === false || trim($rawInput) === '') {
        return $method === 'POST' ? $_POST : [];
    }

    $contentType = strtolower($_SERVER['CONTENT_TYPE'] ?? '');
    if (str_contains($contentType, 'application/json')) {
        $input = json_decode($rawInput, true);
        if (!is_array($input)) {
            throw new InvalidArgumentException('Format JSON tidak valid.');
        }
        return $input;
    }

    $input = [];
    parse_str($rawInput, $input);
    return is_array($input) ? $input : [];
}

function ambilInteger(array $input, string $nama, bool $harusPositif = true): int
{
    if (!array_key_exists($nama, $input) || is_array($input[$nama]) || is_object($input[$nama])) {
        throw new InvalidArgumentException("Field {$nama} wajib diisi dengan angka.");
    }

    $nilai = filter_var($input[$nama], FILTER_VALIDATE_INT);
    if ($nilai === false || ($harusPositif && $nilai <= 0)) {
        throw new InvalidArgumentException($harusPositif
            ? "Field {$nama} harus berupa bilangan bulat lebih dari 0."
            : "Field {$nama} harus berupa bilangan bulat.");
    }

    return (int) $nilai;
}

function angkaJson($nilai)
{
    $angka = round((float) $nilai, 2);
    return floor($angka) === $angka ? (int) $angka : $angka;
}

function ambilRingkasanKeranjang(mysqli $conn, int $idUser): array
{
    $sql = "SELECT k.id_keranjang,
                   d.id_detail_keranjang,
                   p.id_produk,
                   p.nama_produk,
                   p.kategori,
                   d.harga_satuan AS harga,
                   d.jumlah,
                   d.subtotal,
                   p.gambar
            FROM keranjang AS k
            LEFT JOIN detail_keranjang AS d ON d.id_keranjang = k.id_keranjang
            LEFT JOIN produk AS p ON p.id_produk = d.id_produk
            WHERE k.id_user = ?
            ORDER BY d.id_detail_keranjang ASC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    $result = $stmt->get_result();

    $idKeranjang = null;
    $items = [];
    $totalBelanja = 0.0;

    while ($row = $result->fetch_assoc()) {
        $idKeranjang = (int) $row['id_keranjang'];
        if ($row['id_detail_keranjang'] === null) {
            continue;
        }

        $subtotal = (float) $row['subtotal'];
        $items[] = [
            'id_detail_keranjang' => (int) $row['id_detail_keranjang'],
            'id_produk' => (int) $row['id_produk'],
            'nama_produk' => $row['nama_produk'],
            'kategori' => $row['kategori'],
            'harga' => angkaJson($row['harga']),
            'jumlah' => (int) $row['jumlah'],
            'subtotal' => angkaJson($subtotal),
            'gambar' => $row['gambar']
        ];
        $totalBelanja += $subtotal;
    }

    $stmt->close();

    return [
        'id_keranjang' => $idKeranjang,
        'items' => $items,
        'total_belanja' => angkaJson($totalBelanja)
    ];
}

function dapatkanProduk(mysqli $conn, int $idProduk, bool $kunciBaris = false): ?array
{
    $sql = 'SELECT id_produk, harga, stok, status_produk FROM produk WHERE id_produk = ?';
    if ($kunciBaris) {
        $sql .= ' FOR UPDATE';
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idProduk);
    $stmt->execute();
    $result = $stmt->get_result();
    $produk = $result->fetch_assoc() ?: null;
    $stmt->close();

    return $produk;
}

function pastikanStokCukup(array $produk, int $jumlah): void
{
    if ($produk['status_produk'] !== 'aktif') {
        throw new DomainException('Produk tidak aktif dan tidak dapat dimasukkan ke keranjang.');
    }
    if ($jumlah > (int) $produk['stok']) {
        throw new DomainException('Jumlah melebihi stok produk yang tersedia. Stok saat ini: ' . (int) $produk['stok'] . '.');
    }
}

function pastikanKeranjang(mysqli $conn, int $idUser): int
{
    $stmt = $conn->prepare(
        'INSERT INTO keranjang (id_user) VALUES (?) ON DUPLICATE KEY UPDATE id_keranjang = LAST_INSERT_ID(id_keranjang)'
    );
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare('SELECT id_keranjang FROM keranjang WHERE id_user = ? FOR UPDATE');
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if (!$row) {
        throw new RuntimeException('Keranjang user gagal dibuat.');
    }

    return (int) $row['id_keranjang'];
}

function ubahKeranjang(mysqli $conn, callable $aksi)
{
    $conn->begin_transaction();
    try {
        $data = $aksi();
        $conn->commit();
        return $data;
    } catch (Throwable $error) {
        $conn->rollback();
        throw $error;
    }
}

try {
    $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    if (!in_array($method, ['GET', 'POST', 'PUT', 'DELETE'], true)) {
        header('Allow: GET, POST, PUT, DELETE');
        kirimJson(405, [
            'success' => false,
            'message' => 'Method tidak diizinkan. Gunakan GET, POST, PUT, atau DELETE.',
            'data' => null
        ]);
    }

    ob_start();
    require_once __DIR__ . '/../../config.php';
    ob_end_clean();
    if (!isset($conn) || !($conn instanceof mysqli)) {
        throw new RuntimeException('Koneksi database tidak tersedia.');
    }

    $input = bacaInput();
    if (($_SESSION['role'] ?? '') !== 'user' || empty($_SESSION['id_user'])) {
        kirimJson(401, ['success' => false, 'message' => 'Silakan login sebagai user.', 'data' => null]);
    }
    $idUser = (int) $_SESSION['id_user'];
    $requestedUser = $input['id_user'] ?? ($_GET['id_user'] ?? null);
    if ($requestedUser !== null && (int) $requestedUser !== $idUser) {
        kirimJson(403, ['success' => false, 'message' => 'Akses ke data user lain ditolak.', 'data' => null]);
    }

    if ($method === 'GET') {
        $data = ambilRingkasanKeranjang($conn, $idUser);
        kirimJson(200, [
            'success' => true,
            'message' => 'Data keranjang berhasil diambil',
            'data' => $data
        ]);
    }

    $idProduk = ambilInteger($input, 'id_produk');

    if ($method === 'POST') {
        $jumlah = ambilInteger($input, 'jumlah');
        ubahKeranjang($conn, function () use ($conn, $idUser, $idProduk, $jumlah) {
            $produk = dapatkanProduk($conn, $idProduk, true);
            if ($produk === null) {
                throw new OutOfBoundsException('Produk tidak ditemukan.');
            }
            if ($produk['status_produk'] !== 'aktif') {
                throw new DomainException('Produk tidak aktif dan tidak dapat dimasukkan ke keranjang.');
            }

            $idKeranjang = pastikanKeranjang($conn, $idUser);
            $stmt = $conn->prepare(
                'SELECT id_detail_keranjang, jumlah FROM detail_keranjang WHERE id_keranjang = ? AND id_produk = ? FOR UPDATE'
            );
            $stmt->bind_param('ii', $idKeranjang, $idProduk);
            $stmt->execute();
            $existing = $stmt->get_result()->fetch_assoc() ?: null;
            $stmt->close();

            $jumlahBaru = $jumlah + ($existing ? (int) $existing['jumlah'] : 0);
            pastikanStokCukup($produk, $jumlahBaru);
            $harga = (float) $produk['harga'];
            $subtotal = number_format($harga * $jumlahBaru, 2, '.', '');

            if ($existing) {
                $idDetail = (int) $existing['id_detail_keranjang'];
                $stmt = $conn->prepare(
                    'UPDATE detail_keranjang SET jumlah = ?, harga_satuan = ?, subtotal = ? WHERE id_detail_keranjang = ? AND id_keranjang = ?'
                );
                $stmt->bind_param('idsii', $jumlahBaru, $harga, $subtotal, $idDetail, $idKeranjang);
            } else {
                $stmt = $conn->prepare(
                    'INSERT INTO detail_keranjang (id_keranjang, id_produk, jumlah, harga_satuan, subtotal) VALUES (?, ?, ?, ?, ?)'
                );
                $stmt->bind_param('iiids', $idKeranjang, $idProduk, $jumlahBaru, $harga, $subtotal);
            }
            $stmt->execute();
            $stmt->close();
            return true;
        });

        kirimJson(201, [
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang',
            'data' => ambilRingkasanKeranjang($conn, $idUser)
        ]);
    }

    if ($method === 'PUT') {
        $jumlah = ambilInteger($input, 'jumlah', false);
        ubahKeranjang($conn, function () use ($conn, $idUser, $idProduk, $jumlah) {
            $stmt = $conn->prepare('SELECT id_keranjang FROM keranjang WHERE id_user = ? FOR UPDATE');
            $stmt->bind_param('i', $idUser);
            $stmt->execute();
            $cart = $stmt->get_result()->fetch_assoc() ?: null;
            $stmt->close();
            if (!$cart) {
                throw new OutOfBoundsException('Keranjang user tidak ditemukan.');
            }
            $idKeranjang = (int) $cart['id_keranjang'];

            $stmt = $conn->prepare(
                'SELECT id_detail_keranjang FROM detail_keranjang WHERE id_keranjang = ? AND id_produk = ? FOR UPDATE'
            );
            $stmt->bind_param('ii', $idKeranjang, $idProduk);
            $stmt->execute();
            $item = $stmt->get_result()->fetch_assoc() ?: null;
            $stmt->close();
            if (!$item) {
                throw new OutOfBoundsException('Produk tidak ditemukan di keranjang user ini.');
            }

            if ($jumlah <= 0) {
                $stmt = $conn->prepare(
                    'DELETE FROM detail_keranjang WHERE id_keranjang = ? AND id_produk = ?'
                );
                $stmt->bind_param('ii', $idKeranjang, $idProduk);
                $stmt->execute();
                $stmt->close();
                return true;
            }

            $produk = dapatkanProduk($conn, $idProduk, true);
            if ($produk === null) {
                throw new OutOfBoundsException('Produk tidak ditemukan.');
            }
            pastikanStokCukup($produk, $jumlah);
            $harga = (float) $produk['harga'];
            $subtotal = number_format($harga * $jumlah, 2, '.', '');

            $stmt = $conn->prepare(
                'UPDATE detail_keranjang SET jumlah = ?, harga_satuan = ?, subtotal = ? WHERE id_keranjang = ? AND id_produk = ?'
            );
            $stmt->bind_param('idsii', $jumlah, $harga, $subtotal, $idKeranjang, $idProduk);
            $stmt->execute();
            $stmt->close();
            return true;
        });

        kirimJson(200, [
            'success' => true,
            'message' => $jumlah <= 0 ? 'Produk berhasil dihapus dari keranjang' : 'Jumlah produk berhasil diperbarui',
            'data' => ambilRingkasanKeranjang($conn, $idUser)
        ]);
    }

    if ($method === 'DELETE') {
        ubahKeranjang($conn, function () use ($conn, $idUser, $idProduk) {
            $stmt = $conn->prepare('SELECT id_keranjang FROM keranjang WHERE id_user = ? FOR UPDATE');
            $stmt->bind_param('i', $idUser);
            $stmt->execute();
            $cart = $stmt->get_result()->fetch_assoc() ?: null;
            $stmt->close();
            if (!$cart) {
                throw new OutOfBoundsException('Keranjang user tidak ditemukan.');
            }

            $idKeranjang = (int) $cart['id_keranjang'];
            $stmt = $conn->prepare(
                'DELETE FROM detail_keranjang WHERE id_keranjang = ? AND id_produk = ?'
            );
            $stmt->bind_param('ii', $idKeranjang, $idProduk);
            $stmt->execute();
            $jumlahTerhapus = $stmt->affected_rows;
            $stmt->close();
            if ($jumlahTerhapus === 0) {
                throw new OutOfBoundsException('Produk tidak ditemukan di keranjang user ini.');
            }
            return true;
        });

        kirimJson(200, [
            'success' => true,
            'message' => 'Produk berhasil dihapus dari keranjang',
            'data' => ambilRingkasanKeranjang($conn, $idUser)
        ]);
    }
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
    if (isset($conn) && $conn instanceof mysqli && $conn->errno !== 0) {
        try {
            $conn->rollback();
        } catch (Throwable $ignored) {
            // Tidak ada transaksi aktif yang perlu dibatalkan.
        }
    }

    kirimJson(500, [
        'success' => false,
        'message' => 'Terjadi kesalahan database: ' . $error->getMessage(),
        'data' => null
    ]);
}
?>