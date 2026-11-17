<?php
require_once __DIR__ . '/../_common.php';api_require_role('fo');
try{api_allow_methods(['GET']);$rows=$conn->query("SELECT id_akun,nama,hari_kerja_mulai,hari_kerja_selesai,jam_mulai,jam_selesai FROM akun WHERE role='fo' AND status_akun='aktif' ORDER BY nama")->fetch_all(MYSQLI_ASSOC);api_reply(200,true,'Jadwal FO aktif berhasil diambil.',$rows);}catch(Throwable $e){api_db_error($e);}