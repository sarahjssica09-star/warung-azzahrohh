<?php
header('Content-Type: application/json; charset=utf-8');

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

function formatVoucher(array $row): array
{
    return [
        'id_voucher' => (int) $row['id_voucher'],
        'kode_voucher' => $row['kode_voucher'],
        'nama_voucher' => $row['nama_voucher'],
        'jenis_diskon' => $row['jenis_diskon'],
        'nilai_diskon' => angkaJson($row['nilai_diskon']),
        'minimal_belanja' => angkaJson($row['minimal_belanja']),
        'status_voucher' => $row['status_voucher']
    ];
}

function ambilVoucherAktif(mysqli $conn, string $kodeVoucher): ?array
{
    $stmt = $conn->prepare(
        "SELECT id_voucher, kode_voucher, nama_voucher, jenis_diskon, nilai_diskon,
                minimal_belanja, status_voucher
         FROM voucher
         WHERE kode_voucher = ? AND status_voucher = 'aktif'
         LIMIT 1"
    );
    $stmt->bind_param('s', $kodeVoucher);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc() ?: null;
    $stmt->close();

    return $row;
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

    if ($method === 'GET') {
        if (isset($_GET['kode_voucher'])) {
            if (!is_string($_GET['kode_voucher']) && !is_numeric($_GET['kode_voucher'])) {
                kirimJson(400, [
                    'success' => false,
                    'message' => 'Kode voucher harus berupa teks.',
                    'data' => null
                ]);
            }
            $kodeVoucher = trim((string) $_GET['kode_voucher']);
            if ($kodeVoucher === '') {
                kirimJson(400, [
                    'success' => false,
                    'message' => 'Kode voucher wajib diisi.',
                    'data' => null
                ]);
            }

            $voucher = ambilVoucherAktif($conn, $kodeVoucher);
            if ($voucher === null) {
                kirimJson(404, [
                    'success' => false,
                    'message' => 'Voucher tidak ditemukan atau sudah tidak berlaku',
                    'data' => null
                ]);
            }

            kirimJson(200, [
                'success' => true,
                'message' => 'Data voucher berhasil diambil',
                'data' => formatVoucher($voucher)
            ]);
        }

        $stmt = $conn->prepare(
            "SELECT id_voucher, kode_voucher, nama_voucher, jenis_diskon, nilai_diskon,
                    minimal_belanja, status_voucher
             FROM voucher
             WHERE status_voucher = 'aktif'
             ORDER BY id_voucher ASC"
        );
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = formatVoucher($row);
        }
        $stmt->close();

        kirimJson(200, [
            'success' => true,
            'message' => 'Data voucher berhasil diambil',
            'data' => $data
        ]);
    }

    $contentType = strtolower($_SERVER['CONTENT_TYPE'] ?? '');
    if (!str_contains($contentType, 'application/json')) {
        kirimJson(400, [
            'success' => false,
            'message' => 'Request POST harus menggunakan Content-Type application/json.',
            'data' => null
        ]);
    }

    $input = json_decode(file_get_contents('php://input'), true);
    if (!is_array($input)) {
        kirimJson(400, [
            'success' => false,
            'message' => 'Format JSON tidak valid.',
            'data' => null
        ]);
    }

    if (!isset($input['kode_voucher']) || !is_string($input['kode_voucher']) || trim($input['kode_voucher']) === '') {
        kirimJson(400, [
            'success' => false,
            'message' => 'Kode voucher wajib diisi.',
            'data' => null
        ]);
    }
    if (!isset($input['subtotal']) || !is_numeric($input['subtotal'])) {
        kirimJson(400, [
            'success' => false,
            'message' => 'Subtotal wajib berupa angka.',
            'data' => null
        ]);
    }

    $subtotal = (float) $input['subtotal'];
    if (!is_finite($subtotal) || $subtotal < 0) {
        kirimJson(400, [
            'success' => false,
            'message' => 'Subtotal harus berupa angka yang valid dan tidak boleh negatif.',
            'data' => null
        ]);
    }

    $voucher = ambilVoucherAktif($conn, trim($input['kode_voucher']));
    if ($voucher === null) {
        kirimJson(404, [
            'success' => false,
            'message' => 'Voucher tidak ditemukan atau sudah tidak berlaku',
            'data' => null
        ]);
    }

    $minimalBelanja = (float) $voucher['minimal_belanja'];
    if ($subtotal < $minimalBelanja) {
        kirimJson(422, [
            'success' => false,
            'message' => 'Minimal pembelian untuk voucher ini belum terpenuhi',
            'data' => null
        ]);
    }

    $nilaiDiskon = (float) $voucher['nilai_diskon'];
    if ($voucher['jenis_diskon'] === 'nominal') {
        $diskon = $nilaiDiskon;
    } elseif ($voucher['jenis_diskon'] === 'persen') {
        $diskon = $subtotal * ($nilaiDiskon / 100);
    } else {
        kirimJson(500, [
            'success' => false,
            'message' => 'Jenis diskon voucher tidak dikenali.',
            'data' => null
        ]);
    }

    $diskon = min($subtotal, round($diskon, 2));
    $totalPembayaran = max(0, round($subtotal - $diskon, 2));

    kirimJson(200, [
        'success' => true,
        'message' => 'Voucher berhasil digunakan',
        'data' => [
            'id_voucher' => (int) $voucher['id_voucher'],
            'kode_voucher' => $voucher['kode_voucher'],
            'subtotal' => angkaJson($subtotal),
            'diskon' => angkaJson($diskon),
            'total_pembayaran' => angkaJson($totalPembayaran)
        ]
    ]);
} catch (Throwable $error) {
    kirimJson(500, [
        'success' => false,
        'message' => 'Terjadi kesalahan database: ' . $error->getMessage(),
        'data' => null
    ]);
}
?>