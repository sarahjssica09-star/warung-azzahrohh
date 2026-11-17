<?php
require_once __DIR__ . '/../_common.php';
api_require_role('admin');
try {
    $method = api_allow_methods(['GET','POST','PUT','DELETE']);
    if ($method === 'GET') {
        $where = ['1=1']; $types = ''; $values = [];
        if (isset($_GET['id_produk'])) { $where[] = 'id_produk = ?'; $types .= 'i'; $values[] = api_int($_GET['id_produk'], 'id_produk'); }
        if (!empty($_GET['kategori'])) { $where[] = 'kategori = ?'; $types .= 's'; $values[] = api_string($_GET['kategori'], 'kategori', 100); }
        if (isset($_GET['status_produk']) && in_array($_GET['status_produk'], ['aktif','nonaktif'], true)) { $where[] = 'status_produk = ?'; $types .= 's'; $values[] = $_GET['status_produk']; }
        if (!empty($_GET['q'])) { $where[] = '(nama_produk LIKE ? OR deskripsi LIKE ?)'; $types .= 'ss'; $q = '%' . trim($_GET['q']) . '%'; $values[] = $q; $values[] = $q; }
        $stmt = $conn->prepare('SELECT id_produk,nama_produk,kategori,harga,deskripsi,status_produk,updated_at,stok,gambar FROM produk WHERE ' . implode(' AND ', $where) . ' ORDER BY updated_at DESC,id_produk DESC');
        if ($types !== '') api_bind($stmt, $types, $values);
        $stmt->execute(); $result = $stmt->get_result(); $rows = $result->fetch_all(MYSQLI_ASSOC); $stmt->close();
        if (isset($_GET['id_produk']) && !$rows) throw new OutOfBoundsException('Produk tidak ditemukan.');
        api_reply(200,true,'Data produk berhasil diambil.',isset($_GET['id_produk']) ? $rows[0] : $rows);
    }
    $body = api_body();
    if ($method === 'POST') {
        $name=api_string($body['nama_produk']??null,'nama_produk',100); $category=api_string($body['kategori']??null,'kategori',100); $price=api_money($body['harga']??null,'harga'); $stock=api_int($body['stok']??null,'stok',true);
        $description=api_string($body['deskripsi']??'','deskripsi',10000,false); $image=isset($_FILES['foto_produk'])?api_store_image($_FILES['foto_produk'],'produk','produk'):api_string($body['gambar']??null,'gambar',255,false); $status=$body['status_produk']??'aktif';
        if(!in_array($status,['aktif','nonaktif'],true)) throw new InvalidArgumentException('status_produk harus aktif atau nonaktif.');
        $stmt=$conn->prepare('INSERT INTO produk(nama_produk,kategori,harga,deskripsi,status_produk,stok,gambar) VALUES(?,?,?,?,?,?,?)'); $stmt->bind_param('ssdssis',$name,$category,$price,$description,$status,$stock,$image);
        $stmt->execute(); $id=(int)$conn->insert_id; $stmt->close(); api_reply(201,true,'Produk berhasil ditambahkan.',['id_produk'=>$id]);
    }
    $id=api_int($body['id_produk']??($_GET['id_produk']??null),'id_produk');
    if($method==='DELETE') { $stmt=$conn->prepare("UPDATE produk SET status_produk='nonaktif' WHERE id_produk=?"); $stmt->bind_param('i',$id); $stmt->execute(); $n=$stmt->affected_rows; $stmt->close(); if(!$n){$check=$conn->prepare('SELECT id_produk FROM produk WHERE id_produk=?');$check->bind_param('i',$id);$check->execute();$exists=api_one($check);$check->close();if(!$exists)throw new OutOfBoundsException('Produk tidak ditemukan.');} api_reply(200,true,'Produk dinonaktifkan agar riwayat transaksi tetap utuh.',['id_produk'=>$id,'status_produk'=>'nonaktif']); }
    $name=api_string($body['nama_produk']??null,'nama_produk',100); $category=api_string($body['kategori']??null,'kategori',100); $price=api_money($body['harga']??null,'harga'); $stock=api_int($body['stok']??null,'stok',true); $description=api_string($body['deskripsi']??'','deskripsi',10000,false); $status=$body['status_produk']??'aktif';
    $existingImage=null; $lookup=$conn->prepare('SELECT gambar FROM produk WHERE id_produk=?'); $lookup->bind_param('i',$id); $lookup->execute(); $existing=api_one($lookup); $lookup->close(); if(!$existing) throw new OutOfBoundsException('Produk tidak ditemukan.'); $existingImage=$existing['gambar'];
    $image=isset($_FILES['foto_produk'])?api_store_image($_FILES['foto_produk'],'produk','produk'):(array_key_exists('gambar',$body)?api_string($body['gambar'],'gambar',255,false):$existingImage);
    if(!in_array($status,['aktif','nonaktif'],true))throw new InvalidArgumentException('status_produk harus aktif atau nonaktif.');
    $stmt=$conn->prepare('UPDATE produk SET nama_produk=?,kategori=?,harga=?,deskripsi=?,status_produk=?,stok=?,gambar=? WHERE id_produk=?'); $stmt->bind_param('ssdssisi',$name,$category,$price,$description,$status,$stock,$image,$id); $stmt->execute(); $n=$stmt->affected_rows; $stmt->close();
    $check=$conn->prepare('SELECT id_produk FROM produk WHERE id_produk=?');$check->bind_param('i',$id);$check->execute();$exists=api_one($check);$check->close();if(!$exists)throw new OutOfBoundsException('Produk tidak ditemukan.');
    api_reply(200,true,'Produk berhasil diperbarui.',['id_produk'=>$id]);
} catch(Throwable $e){api_db_error($e);}