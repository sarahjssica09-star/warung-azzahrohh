<?php
require_once __DIR__ . '/../_common.php';
try {
 $method=api_allow_methods(['GET','POST']);
 if($method==='GET'){if(empty($_SESSION['id_akun']))api_reply(401,false,'Belum login.',null);api_reply(200,true,'Sesi admin aktif.',['id_akun'=>(int)$_SESSION['id_akun'],'role'=>$_SESSION['role']??null,'nama'=>$_SESSION['nama']??null]);}
 $b=api_body();$action=$b['action']??'login';
 if($action==='logout'){$_SESSION=[];session_destroy();api_reply(200,true,'Logout berhasil.',null);}
 $email=api_string($b['email']??null,'email',100);$password=api_string($b['password']??null,'password',255);
 $stmt=$conn->prepare("SELECT id_akun,nama,email,password,role,status_akun FROM akun WHERE email=? AND role='admin' LIMIT 1");$stmt->bind_param('s',$email);$stmt->execute();$row=api_one($stmt);$stmt->close();
 if(!$row||$row['status_akun']!=='aktif'||!password_verify($password,(string)$row['password']))api_reply(401,false,'Email atau kata sandi admin salah.',null);
 session_regenerate_id(true);$_SESSION['id_akun']=(int)$row['id_akun'];$_SESSION['role']='admin';$_SESSION['nama']=$row['nama'];
 api_reply(200,true,'Login admin berhasil.',['id_akun'=>(int)$row['id_akun'],'nama'=>$row['nama'],'role'=>'admin']);
}catch(Throwable $e){api_db_error($e);}