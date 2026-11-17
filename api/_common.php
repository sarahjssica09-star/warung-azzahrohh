<?php
header('Content-Type: application/json; charset=utf-8');
ob_start();
    require_once __DIR__ . '/../config.php';
    ob_end_clean();
if (!isset($conn) || !($conn instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Koneksi database tidak tersedia.', 'data' => null]);
    exit;
}
$conn->set_charset('utf8mb4');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

function api_reply(int $status, bool $success, string $message, $data = null): void
{
    http_response_code($status);
    echo json_encode(['success' => $success, 'message' => $message, 'data' => $data], JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}
function api_body(): array
{
    $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
        if (!empty($_POST)) return $_POST;

        $raw = trim((string) file_get_contents('php://input'));
        if ($raw !== '') {
            $type = strtolower($_SERVER['CONTENT_TYPE'] ?? '');
            if (strpos($type, 'application/json') !== false) {
                $decoded = json_decode($raw, true);
                if (is_array($decoded)) return $decoded;
                throw new InvalidArgumentException('Format JSON tidak valid.');
            }

            $decoded = json_decode($raw, true);
            if (is_array($decoded)) return $decoded;

            parse_str($raw, $data);
            if (is_array($data) && !empty($data)) return $data;
            throw new InvalidArgumentException('Format JSON tidak valid.');
        }

        return [];
    }
    return $_GET;
}
function api_int($value, string $field, bool $allowZero = false): int
{
    $number = filter_var($value, FILTER_VALIDATE_INT);
    if ($number === false || ($allowZero ? $number < 0 : $number <= 0)) {
        throw new InvalidArgumentException("{$field} harus berupa bilangan bulat yang valid.");
    }
    return (int)$number;
}
function api_string($value, string $field, int $max = 255, bool $required = true): ?string
{
    if ($value === null && !$required) return null;
    if (!is_scalar($value)) throw new InvalidArgumentException("{$field} harus berupa teks.");
    $value = trim((string)$value);
    if ($required && $value === '') throw new InvalidArgumentException("{$field} wajib diisi.");
    if (strlen($value) > $max) throw new InvalidArgumentException("{$field} maksimal {$max} karakter.");
    return $value === '' && !$required ? null : $value;
}
function api_money($value, string $field, float $min = 0): float
{
    if (!is_numeric($value) || !is_finite((float)$value) || (float)$value < $min) {
        throw new InvalidArgumentException("{$field} harus berupa angka minimal {$min}.");
    }
    return round((float)$value, 2);
}
function api_require_role(string $role): void
{
    if (empty($_SESSION['id_akun']) || ($_SESSION['role'] ?? '') !== $role) {
        api_reply(401, false, 'Silakan login dengan akun ' . strtoupper($role) . '.', null);
    }
}
function api_bind(mysqli_stmt $stmt, string $types, array &$values): void
{
    $args = [$types];
    foreach ($values as $key => &$value) $args[] = &$value;
    unset($value);
    call_user_func_array([$stmt, 'bind_param'], $args);
}
function api_one(mysqli_stmt $stmt): ?array
{
    $row = $stmt->get_result()->fetch_assoc();
    return $row ?: null;
}
function api_store_image(array $file, string $subdir, string $prefix): string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) throw new InvalidArgumentException('Upload gambar gagal.');
    if (($file['size'] ?? 0) < 1 || $file['size'] > 5 * 1024 * 1024) throw new InvalidArgumentException('Gambar maksimal 5 MB.');
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($file['tmp_name']);
    $exts = ['image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'];
    if (!isset($exts[$mime])) throw new InvalidArgumentException('Gambar harus JPG, PNG, atau WEBP.');
    $folder = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'HTML' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $subdir;
    if (!is_dir($folder) && !mkdir($folder, 0755, true) && !is_dir($folder)) throw new RuntimeException('Folder gambar tidak dapat dibuat.');
    $name = $prefix . '-' . bin2hex(random_bytes(8)) . '.' . $exts[$mime];
    if (!move_uploaded_file($file['tmp_name'], $folder . DIRECTORY_SEPARATOR . $name)) throw new RuntimeException('Gambar gagal disimpan.');
    return '../img/' . $subdir . '/' . $name;
}
function api_db_error(Throwable $error): void
{
    if ($error instanceof InvalidArgumentException) api_reply(400, false, $error->getMessage(), null);
    if ($error instanceof OutOfBoundsException) api_reply(404, false, $error->getMessage(), null);
    if ($error instanceof DomainException) api_reply(422, false, $error->getMessage(), null);
    if ($error instanceof LogicException) api_reply(409, false, $error->getMessage(), null);
    api_reply(500, false, 'Kesalahan server/database.', null);
}
function api_allow_methods(array $methods): string
{
    $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    if (!in_array($method, $methods, true)) {
        header('Allow: ' . implode(', ', $methods));
        api_reply(405, false, 'Method tidak diizinkan.', null);
    }
    return $method;
}