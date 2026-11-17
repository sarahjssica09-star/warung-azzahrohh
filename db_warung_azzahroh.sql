-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2026 at 05:01 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warung_azzahroh`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('user','fo','admin') NOT NULL DEFAULT 'user',
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `photo_profile` varchar(300) DEFAULT NULL,
  `hari_kerja_mulai` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hari_kerja_selesai` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_akun` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_keranjang`
--

CREATE TABLE `detail_keranjang` (
  `id_detail_keranjang` int NOT NULL,
  `id_keranjang` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `harga_satuan` decimal(12,2) NOT NULL DEFAULT '0.00',
  `subtotal` decimal(12,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int NOT NULL,
  `id_transaksi` int DEFAULT NULL,
  `id_produk` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `harga_satuan` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int NOT NULL,
  `id_user` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_perubahan`
--

CREATE TABLE `pengajuan_perubahan` (
  `id_pengajuan` int NOT NULL,
  `id_akun` int DEFAULT NULL,
  `nama_lama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_baru` varchar(100) DEFAULT NULL,
  `no_telp_lama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_telp_baru` varchar(100) DEFAULT NULL,
  `alamat_lama` text,
  `alamat_baru` text,
  `gender_lama` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender_baru` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jam_mulai_lama` time DEFAULT NULL,
  `jam_mulai_baru` time DEFAULT NULL,
  `jam_selesai_lama` time DEFAULT NULL,
  `jam_selesai_baru` time DEFAULT NULL,
  `status` enum('proses','disetujui','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `craeted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int DEFAULT NULL,
  `field_diajukan` varchar(100) NOT NULL DEFAULT 'nama',
  `nilai_lama` text,
  `nilai_baru` text,
  `alasan` text,
  `status_pengajuan` enum('menunggu','disetujui','ditolak') NOT NULL DEFAULT 'menunggu',
  `tanggal_pengajuan` datetime DEFAULT CURRENT_TIMESTAMP,
  `tanggal_diproses` datetime DEFAULT NULL,
  `diproses_oleh` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text,
  `status_produk` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stok` int NOT NULL DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga`, `deskripsi`, `status_produk`, `updated_at`, `stok`, `gambar`) VALUES
(1, 'bengbeng', 'makanan ringan', 2200.00, 'bengbeng coklat premium 24g', 'aktif', '2026-11-16 15:35:51', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `id_fo` int DEFAULT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `tanggal_diproses` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `total_harga` decimal(12,2) NOT NULL DEFAULT '0.00',
  `id_voucher` int DEFAULT NULL,
  `kode_voucher` varchar(50) DEFAULT NULL,
  `diskon` decimal(12,2) NOT NULL DEFAULT '0.00',
  `total_bayar` decimal(12,2) NOT NULL DEFAULT '0.00',
  `metode_pembayaran` enum('cash','qris') DEFAULT NULL,
  `status_pembayaran` enum('belum_bayar','menunggu_verifikasi','berhasil','gagal','expired') NOT NULL DEFAULT 'belum_bayar',
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_pesanan` enum('menunggu_pembayaran','menunggu_verifikasi','diproses','dikirim','selesai','ditolak','dibatalkan') NOT NULL DEFAULT 'menunggu_pembayaran',
  `alamat_pengiriman` text,
  `catatan` text,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `id_akun` int DEFAULT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int NOT NULL,
  `kode_voucher` varchar(50) NOT NULL,
  `nama_voucher` varchar(100) NOT NULL,
  `jenis_diskon` enum('nominal','persen') NOT NULL DEFAULT 'nominal',
  `nilai_diskon` decimal(12,2) NOT NULL DEFAULT '0.00',
  `minimal_belanja` decimal(12,2) NOT NULL DEFAULT '0.00',
  `status_voucher` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD UNIQUE KEY `uq_akun_id_akun_autoinc` (`id_akun`);

--
-- Indexes for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD PRIMARY KEY (`id_detail_keranjang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD UNIQUE KEY `uq_keranjang_user` (`id_user`);

--
-- Indexes for table `pengajuan_perubahan`
--
ALTER TABLE `pengajuan_perubahan`
  ADD KEY `idx_pengajuan_status` (`status_pengajuan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD UNIQUE KEY `uq_produk_id_produk_autoinc` (`id_produk`),
  ADD UNIQUE KEY `uq_produk_kategori_nama` (`kategori`,`nama_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `idx_transaksi_status` (`status_pesanan`),
  ADD KEY `fk_transaksi_voucher` (`id_voucher`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`),
  ADD UNIQUE KEY `uq_voucher_kode` (`kode_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  MODIFY `id_detail_keranjang` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id_voucher`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
