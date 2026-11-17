<?php
require_once __DIR__ . '/../_common.php';
try {
    api_allow_methods(['GET']);
    $where = ["status_produk = 'aktif'"];
    $types = '';
    $values = [];
    if (isset($_GET['kategori']) && trim((string) $_GET['kategori']) !== '') {
        $where[] = 'kategori = ?';
        $types .= 's';
        $values[] = trim((string) $_GET['kategori']);
    }
    if (isset($_GET['q']) && trim((string) $_GET['q']) !== '') {
        $where[] = '(nama_produk LIKE ? OR deskripsi LIKE ?)';
        $types .= 'ss';
        $term = '%' . trim((string) $_GET['q']) . '%';
        $values[] = $term;
        $values[] = $term;
    }
    $sorts = [
        'terbaru' => 'updated_at DESC, id_produk DESC',
        'terlama' => 'updated_at ASC, id_produk ASC',
        'harga_terendah' => 'harga ASC, id_produk ASC',
        'harga_tertinggi' => 'harga DESC, id_produk DESC'
    ];
    $sort = (string) ($_GET['sort'] ?? 'terbaru');
    $order = $sorts[$sort] ?? $sorts['terbaru'];
    $stmt = $conn->prepare('SELECT id_produk,nama_produk,kategori,harga,deskripsi,status_produk,updated_at,stok,gambar FROM produk WHERE ' . implode(' AND ', $where) . ' ORDER BY ' . $order);
    if ($types !== '') api_bind($stmt, $types, $values);
    $stmt->execute();
    $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    foreach ($rows as &$row) {
        $row['id_produk'] = (int) $row['id_produk'];
        $row['harga'] = (float) $row['harga'];
        $row['stok'] = (int) $row['stok'];
    }
    unset($row);
    api_reply(200, true, 'Data produk berhasil diambil', $rows);
} catch (Throwable $error) {
    api_db_error($error);
}