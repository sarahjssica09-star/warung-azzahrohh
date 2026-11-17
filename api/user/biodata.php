<?php
require_once __DIR__ . '/../_common.php';
api_require_role('user');
try {
    $method = api_allow_methods(['GET','PUT']);
    $idUser = (int) ($_SESSION['id_user'] ?? 0);
    $stmt = $conn->prepare('SELECT u.id_user,u.id_akun,u.nama,u.no_telp,u.email,u.alamat,u.tanggal_lahir,u.gender,u.foto_profile FROM users u WHERE u.id_user=?');
    $stmt->bind_param('i', $idUser);
    $stmt->execute();
    $profile = api_one($stmt);
    $stmt->close();
    if (!$profile) throw new OutOfBoundsException('Biodata user tidak ditemukan.');
    if ($method === 'GET') {
        $pending = $conn->prepare("SELECT field_diajukan,nilai_baru,status_pengajuan,tanggal_pengajuan FROM pengajuan_perubahan WHERE id_user=? AND status_pengajuan='menunggu' ORDER BY tanggal_pengajuan DESC");
        $pending->bind_param('i', $idUser);
        $pending->execute();
        $profile['pengajuan_menunggu'] = $pending->get_result()->fetch_all(MYSQLI_ASSOC);
        $pending->close();
        api_reply(200, true, 'Biodata berhasil diambil.', $profile);
    }
    $body = api_body();
    $fields = [
        'nama' => ['nama', 100],
        'no_telp' => ['no_telp', 20],
        'email' => ['email', 150],
        'alamat' => ['alamat', 10000],
        'tanggal_lahir' => ['tanggal_lahir', 10],
        'gender' => ['gender', 20]
    ];
    $changes = [];
    foreach ($fields as $field => [$label, $limit]) {
        if (!array_key_exists($field, $body)) continue;
        $newValue = api_string($body[$field], $label, $limit);
        if ($field === 'gender') {
            $value = strtolower($newValue);
            if (in_array($value, ['l','laki-laki','laki laki'], true)) $newValue = 'L';
            elseif (in_array($value, ['p','perempuan'], true)) $newValue = 'P';
            else throw new InvalidArgumentException('gender harus L atau P.');
        }
        if ($field === 'email' && !filter_var($newValue, FILTER_VALIDATE_EMAIL)) throw new InvalidArgumentException('Format email tidak valid.');
        if ($field === 'tanggal_lahir' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $newValue)) throw new InvalidArgumentException('tanggal_lahir harus YYYY-MM-DD.');
        $oldValue = (string) ($profile[$field] ?? '');
        if ($field === 'gender' && in_array(strtolower($oldValue), ['laki-laki','perempuan'], true)) $oldValue = strtolower($oldValue) === 'laki-laki' ? 'L' : 'P';
        if ($oldValue !== $newValue) $changes[$field] = [$oldValue, $newValue];
    }
    if (!$changes) api_reply(200, true, 'Tidak ada perubahan biodata.', ['id_user'=>$idUser,'pengajuan'=>[]]);
    if (isset($changes['email'])) {
        $email = $changes['email'][1];
        $dup = $conn->prepare('SELECT id_user FROM users WHERE email=? AND id_user<>? LIMIT 1');
        $dup->bind_param('si', $email, $idUser);
        $dup->execute();
        if (api_one($dup)) throw new DomainException('Email sudah digunakan akun lain.');
        $dup->close();
    }
    $idAkun = $profile['id_akun'] === null ? null : (int) $profile['id_akun'];
    $conn->begin_transaction();
    try {
        $insert = $conn->prepare("INSERT INTO pengajuan_perubahan(id_user,id_akun,field_diajukan,nilai_lama,nilai_baru,status_pengajuan,status,tanggal_pengajuan) VALUES(?,?,?,?,?,'menunggu','proses',NOW())");
        foreach ($changes as $field => [$oldValue, $newValue]) {
            $insert->bind_param('iisss', $idUser, $idAkun, $field, $oldValue, $newValue);
            $insert->execute();
        }
        $insert->close();
        $conn->commit();
    } catch (Throwable $error) {
        $conn->rollback();
        throw $error;
    }
    api_reply(201, true, 'Pengajuan perubahan biodata dikirim untuk ditinjau.', ['id_user'=>$idUser,'field_diajukan'=>array_keys($changes),'status_pengajuan'=>'menunggu']);
} catch (Throwable $error) {
    api_db_error($error);
}