<?php
require_once __DIR__ . '/../_common.php'; api_require_role('admin');
function normGenderAdmin($value): string { $v=strtolower(trim((string)$value)); if(in_array($v,['l','laki','laki-laki','laki laki','male'],true))return 'L'; if(in_array($v,['p','perempuan','female'],true))return 'P'; throw new InvalidArgumentException('gender harus L atau P.'); }
try {
 $method=api_allow_methods(['GET','POST','PUT','DELETE']);
 if($method==='GET'){
  $sql='SELECT u.id_user,u.nama,u.no_telp,u.email,u.alamat,u.tanggal_lahir,u.gender,u.foto_profile,u.created_at,u.id_akun,a.status_akun FROM users u LEFT JOIN akun a ON a.id_akun=u.id_akun';
  if(isset($_GET['id_user'])){$id=api_int($_GET['id_user'],'id_user');$st=$conn->prepare($sql.' WHERE u.id_user=?');$st->bind_param('i',$id);}else{$q=trim($_GET['q']??'');$sql.=$q!==''?' WHERE u.nama LIKE ? OR u.email LIKE ?':'';$sql.=' ORDER BY u.id_user DESC';$st=$conn->prepare($sql);if($q!==''){$like='%'.$q.'%';$st->bind_param('ss',$like,$like);}}
  $st->execute();$res=$st->get_result();$rows=$res->fetch_all(MYSQLI_ASSOC);$st->close();if(isset($_GET['id_user'])){if(!$rows)throw new OutOfBoundsException('Pengguna tidak ditemukan.');api_reply(200,true,'Data pengguna berhasil diambil.',$rows[0]);}api_reply(200,true,'Daftar pengguna berhasil diambil.',$rows);
 }
 $b=api_body();
 if($method==='POST'||$method==='PUT'){
  $name=api_string($b['nama']??null,'nama',100);$email=api_string($b['email']??null,'email',150);$phone=api_string($b['no_telp']??($b['no_hp']??null),'no_telp',20);$address=api_string($b['alamat']??null,'alamat',10000);$birth=api_string($b['tanggal_lahir']??null,'tanggal_lahir',10);$gender=normGenderAdmin($b['gender']??null);$password=api_string($b['password']??null,'password',255,$method==='POST');
  if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$birth))throw new InvalidArgumentException('tanggal_lahir harus YYYY-MM-DD.');
  $conn->begin_transaction();try{
   if($method==='POST'){
    $check=$conn->prepare('SELECT id_user FROM users WHERE email=? LIMIT 1');$check->bind_param('s',$email);$check->execute();if(api_one($check))throw new DomainException('Email sudah digunakan.');$check->close();
    $hash=password_hash($password,PASSWORD_DEFAULT);$end='minggu';$a=$conn->prepare("INSERT INTO akun(nama,email,password,role,tanggal_lahir,no_telp,gender,alamat,hari_kerja_selesai) VALUES(?,?,?,'user',?,?,?,?,?)");$a->bind_param('ssssssss',$name,$email,$hash,$birth,$phone,$gender,$address,$end);$a->execute();$idA=(int)$conn->insert_id;$a->close();
    $u=$conn->prepare('INSERT INTO users(nama,no_telp,email,alamat,tanggal_lahir,password,gender,id_akun) VALUES(?,?,?,?,?,?,?,?)');$u->bind_param('sssssssi',$name,$phone,$email,$address,$birth,$hash,$gender,$idA);$u->execute();$id=(int)$conn->insert_id;$u->close();
   }else{
    $id=api_int($b['id_user']??($_GET['id_user']??null),'id_user');$check=$conn->prepare('SELECT id_akun FROM users WHERE id_user=? FOR UPDATE');$check->bind_param('i',$id);$check->execute();$old=api_one($check);$check->close();if(!$old)throw new OutOfBoundsException('Pengguna tidak ditemukan.');
    $dup=$conn->prepare('SELECT id_user FROM users WHERE email=? AND id_user<>? LIMIT 1');$dup->bind_param('si',$email,$id);$dup->execute();if(api_one($dup))throw new DomainException('Email sudah digunakan.');$dup->close();
    if($old['id_akun']!==null){$a=$conn->prepare('UPDATE akun SET nama=?,email=?,tanggal_lahir=?,no_telp=?,gender=?,alamat=? WHERE id_akun=?');$a->bind_param('ssssssi',$name,$email,$birth,$phone,$gender,$address,$old['id_akun']);$a->execute();$a->close();if($password!==null&&$password!==''){$hash=password_hash($password,PASSWORD_DEFAULT);$a=$conn->prepare('UPDATE akun SET password=? WHERE id_akun=?');$a->bind_param('si',$hash,$old['id_akun']);$a->execute();$a->close();}}
    $u=$conn->prepare('UPDATE users SET nama=?,no_telp=?,email=?,alamat=?,tanggal_lahir=?,gender=?'.(($password!==null&&$password!=='')?',password=?':'').' WHERE id_user=?');if($password!==null&&$password!==''){$hash=password_hash($password,PASSWORD_DEFAULT);$u->bind_param('sssssssi',$name,$phone,$email,$address,$birth,$gender,$hash,$id);}else{$u->bind_param('ssssssi',$name,$phone,$email,$address,$birth,$gender,$id);}$u->execute();$u->close();
   }
   $conn->commit();
  }catch(Throwable $e){$conn->rollback();throw $e;}
  api_reply($method==='POST'?201:200,true,$method==='POST'?'Pengguna berhasil ditambahkan.':'Pengguna berhasil diperbarui.',['id_user'=>$id]);
 }
 $id=api_int($b['id_user']??($_GET['id_user']??null),'id_user');$st=$conn->prepare('SELECT id_akun FROM users WHERE id_user=?');$st->bind_param('i',$id);$st->execute();$row=api_one($st);$st->close();if(!$row)throw new OutOfBoundsException('Pengguna tidak ditemukan.');if($row['id_akun']===null)throw new DomainException('Pengguna tanpa akun login tidak dapat dinonaktifkan melalui endpoint ini.');$st=$conn->prepare("UPDATE akun SET status_akun='nonaktif' WHERE id_akun=?");$st->bind_param('i',$row['id_akun']);$st->execute();$st->close();api_reply(200,true,'Akun pengguna dinonaktifkan; riwayat transaksi dipertahankan.',['id_user'=>$id,'status_akun'=>'nonaktif']);
}catch(Throwable $e){api_db_error($e);}