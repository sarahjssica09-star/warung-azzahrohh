<?php
require_once __DIR__ . '/../_common.php';
api_require_role('admin');
try {
 $method=api_allow_methods(['GET','POST','PUT','DELETE']);
 if($method==='GET'){
  $sql='SELECT id_voucher,kode_voucher,nama_voucher,jenis_diskon,nilai_diskon,minimal_belanja,status_voucher,created_at,updated_at FROM voucher';
  if(isset($_GET['id_voucher'])){$id=api_int($_GET['id_voucher'],'id_voucher');$stmt=$conn->prepare($sql.' WHERE id_voucher=?');$stmt->bind_param('i',$id);$stmt->execute();$row=api_one($stmt);$stmt->close();if(!$row)throw new OutOfBoundsException('Voucher tidak ditemukan.');api_reply(200,true,'Data voucher berhasil diambil.',$row);}
  if(isset($_GET['status_voucher'])&&in_array($_GET['status_voucher'],['aktif','nonaktif'],true))$sql.=' WHERE status_voucher=?';$sql.=' ORDER BY updated_at DESC,id_voucher DESC';
  if(isset($_GET['status_voucher'])&&in_array($_GET['status_voucher'],['aktif','nonaktif'],true)){$stmt=$conn->prepare($sql);$stmt->bind_param('s',$_GET['status_voucher']);}else $stmt=$conn->prepare($sql);
  $stmt->execute();$rows=$stmt->get_result()->fetch_all(MYSQLI_ASSOC);$stmt->close();api_reply(200,true,'Data voucher berhasil diambil.',$rows);
 }
 $b=api_body();
 if($method==='POST'||$method==='PUT'){
  $code=strtoupper(api_string($b['kode_voucher']??null,'kode_voucher',50));$name=api_string($b['nama_voucher']??null,'nama_voucher',100);$type=$b['jenis_diskon']??'nominal';
  if(!in_array($type,['nominal','persen'],true))throw new InvalidArgumentException('jenis_diskon hanya nominal atau persen.');
  $value=api_money($b['nilai_diskon']??null,'nilai_diskon',0.01);$minimum=api_money($b['minimal_belanja']??0,'minimal_belanja');$status=$b['status_voucher']??'aktif';if(!in_array($status,['aktif','nonaktif'],true))throw new InvalidArgumentException('status_voucher harus aktif atau nonaktif.');
  if($type==='persen'&&$value>100)throw new InvalidArgumentException('Nilai diskon persen tidak boleh melebihi 100.');
  if($method==='POST'){$stmt=$conn->prepare('INSERT INTO voucher(kode_voucher,nama_voucher,jenis_diskon,nilai_diskon,minimal_belanja,status_voucher) VALUES(?,?,?,?,?,?)');$stmt->bind_param('sssdds',$code,$name,$type,$value,$minimum,$status);$stmt->execute();$id=(int)$conn->insert_id;$stmt->close();api_reply(201,true,'Voucher berhasil ditambahkan.',['id_voucher'=>$id]);}
  $id=api_int($b['id_voucher']??($_GET['id_voucher']??null),'id_voucher');$stmt=$conn->prepare('UPDATE voucher SET kode_voucher=?,nama_voucher=?,jenis_diskon=?,nilai_diskon=?,minimal_belanja=?,status_voucher=? WHERE id_voucher=?');$stmt->bind_param('sssddsi',$code,$name,$type,$value,$minimum,$status,$id);$stmt->execute();$stmt->close();$check=$conn->prepare('SELECT id_voucher FROM voucher WHERE id_voucher=?');$check->bind_param('i',$id);$check->execute();$exists=api_one($check);$check->close();if(!$exists)throw new OutOfBoundsException('Voucher tidak ditemukan.');api_reply(200,true,'Voucher berhasil diperbarui.',['id_voucher'=>$id]);
 }
 $id=api_int($b['id_voucher']??($_GET['id_voucher']??null),'id_voucher');$stmt=$conn->prepare("UPDATE voucher SET status_voucher='nonaktif' WHERE id_voucher=?");$stmt->bind_param('i',$id);$stmt->execute();$stmt->close();api_reply(200,true,'Voucher dinonaktifkan.',['id_voucher'=>$id,'status_voucher'=>'nonaktif']);
} catch(Throwable $e){api_db_error($e);}