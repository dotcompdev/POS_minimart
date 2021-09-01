-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Sep 2021 pada 06.31
-- Versi server: 5.7.35-0ubuntu0.18.04.1-log
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minimart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_brg` int(11) NOT NULL,
  `kode_brg` varchar(100) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `unit` varchar(70) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `qty` int(10) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_brg`, `kode_brg`, `nama_brg`, `kategori`, `unit`, `harga_jual`, `qty`, `created`) VALUES
(2, 'PM0001', 'Teh Rio', 'Minuman', 'buah', 1500, -5, 1629641649),
(5, 'PM0002', 'Beras', 'Makanan', 'kilogram', 15000, 4, 1629794744),
(6, 'PM0003', 'Pulpen', 'ATK', 'buah', 2000, 77, 1629794892),
(7, 'BM017', 'Sticker PDIP', 'ATK', 'bungkus', 20000, 7, 1629795261),
(17, 'PM0007', 'Arab DX', 'ATK', 'buah', 0, 0, 1630046020),
(19, '', 'Stiker', '', '', 0, 0, 1630075219),
(20, 'PM0008', 'Penghapus', 'ATK', 'buah', 0, 0, 1630229123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tgl_mulai` int(11) NOT NULL,
  `tgl_berakhir` int(11) NOT NULL,
  `hari_frek` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `tgl_mulai`, `tgl_berakhir`, `hari_frek`) VALUES
(2, 1630416780, 1630762440, ''),
(3, 1630454400, 1631059200, ''),
(4, 1630467360, 1631245020, 'Selasa,Kamis,Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jual_detail`
--

CREATE TABLE `tbl_jual_detail` (
  `id` int(11) NOT NULL,
  `waktu_trans` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `invoice` varchar(150) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `cash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jual_detail`
--

INSERT INTO `tbl_jual_detail` (`id`, `waktu_trans`, `user`, `invoice`, `total_qty`, `total_bayar`, `diskon`, `cash`) VALUES
(26, 1630287899, 'admin', 'PM2108300001', 4, 40500, 0, 50000),
(27, 1630290761, 'admin', 'PM2108300002', 2, 4000, 0, 5000),
(28, 1630468379, 'admin', 'PM2109010001', 2, 3300, 0, 4000),
(29, 1630468551, 'admin', 'PM2109010002', 2, 3500, 0, 10000),
(30, 1630468578, 'admin', 'PM2109010003', 2, 3500, 0, 10000),
(31, 1630468846, 'admin', 'PM2109010004', 1, 2000, 0, 3000),
(32, 1630469243, 'admin', 'PM2109010005', 1, 2000, 0, 4000),
(33, 1630469380, 'admin', 'PM2109010006', 1, 2000, 0, 4000),
(34, 1630469776, 'admin', 'PM2109010007', 1, 2000, 0, 4000),
(35, 1630469841, 'admin', 'PM2109010008', 1, 2000, 0, 4000),
(36, 1630469896, 'admin', 'PM2109010009', 1, 1500, 0, 2000),
(37, 1630469957, 'admin', 'PM2109010010', 1, 2000, 0, 4000),
(38, 1630470050, 'admin', 'PM2109010011', 1, 1500, 0, 2000),
(39, 1630470089, 'admin', 'PM2109010012', 1, 1500, 0, 2000),
(40, 1630470111, 'admin', 'PM2109010013', 1, 1500, 0, 2000),
(41, 1630470140, 'admin', 'PM2109010014', 1, 1500, 0, 2000),
(42, 1630470196, 'admin', 'PM2109010015', 1, 2000, 0, 3000),
(43, 1630470211, 'admin', 'PM2109010016', 1, 1500, 0, 2000),
(44, 1630470261, 'admin', 'PM2109010017', 1, 2000, 0, 3000),
(45, 1630470350, 'admin', 'PM2109010018', 2, 3500, 0, 4000),
(46, 1630470391, 'admin', 'PM2109010019', 2, 3500, 0, 4000),
(47, 1630470520, 'admin', 'PM2109010020', 1, 1500, 0, 2000),
(48, 1630470548, 'admin', 'PM2109010021', 1, 1500, 0, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `qty_pesan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `id_promo` int(11) NOT NULL,
  `kode_brg` varchar(150) NOT NULL,
  `nama_brg` varchar(150) NOT NULL,
  `qty_brg` int(5) NOT NULL,
  `harga_brg` varchar(200) NOT NULL,
  `diskon_brg` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_promo_detail`
--

CREATE TABLE `tbl_promo_detail` (
  `id` int(11) NOT NULL,
  `nama_promo` varchar(150) NOT NULL,
  `kode_brg` varchar(200) NOT NULL,
  `nama_brg` varchar(200) NOT NULL,
  `qty_brg` varchar(200) NOT NULL,
  `harga_brg` varchar(200) NOT NULL,
  `diskon_brg` varchar(200) NOT NULL,
  `jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_promo_detail`
--

INSERT INTO `tbl_promo_detail` (`id`, `nama_promo`, `kode_brg`, `nama_brg`, `qty_brg`, `harga_brg`, `diskon_brg`, `jadwal`) VALUES
(2, 'akhir pekan', 'PM0001', 'Teh Rio', '1', '1500', '500', 2),
(3, 'Paket mahasiswa', 'PM0001, PM0002, PM0003', 'Teh Rio, Beras, Pulpen', '2, 1, 1', '1500, 15000, 2000', '500, 2000, 500', 3),
(4, 'Paket Hemat', 'PM0003, BM017, PM0008', 'Pulpen, Sticker PDIP, Penghapus', '1, 1, 1', '2000, 20000, 0', '500, 3000, 0', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_retur`
--

CREATE TABLE `tbl_retur` (
  `id_retur` int(11) NOT NULL,
  `invoice_jual` varchar(150) NOT NULL,
  `kode_brg_retur` varchar(150) NOT NULL,
  `nama_brg_retur` varchar(150) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty_retur` int(10) NOT NULL,
  `opsi` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_retur`
--

INSERT INTO `tbl_retur` (`id_retur`, `invoice_jual`, `kode_brg_retur`, `nama_brg_retur`, `harga_jual`, `qty_retur`, `opsi`, `keterangan`) VALUES
(1, 'PM2108300001', 'PM0003', 'Pulpen', 2000, 1, 'uang kembali', 'tinta bocor'),
(2, 'PM2108300001', 'BM017', 'Sticker PDIP', 20000, 2, 'uang kembali', 'omdo'),
(3, 'PM2108300001', 'PM0001', 'Teh Rio', 1500, 1, 'uang kembali', ''),
(4, 'PM2108300001', 'PM0002', 'Beras', 15000, 1, 'tukar barang', 'basi, kosong'),
(5, 'PM2108300001', 'PM0003', 'Pulpen', 2000, 1, 'tukar barang', 'bocor'),
(6, 'PM2108300001', 'PM0003', 'Pulpen', 2000, 1, 'tukar barang', 'bocor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role`) VALUES
(1, 'supervisor'),
(2, 'kasir'),
(3, 'stafGudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tampung`
--

CREATE TABLE `tbl_tampung` (
  `id_trans` int(11) NOT NULL,
  `kode_barang` varchar(200) NOT NULL,
  `barang` varchar(200) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `diskon` int(10) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trans_beli`
--

CREATE TABLE `tbl_trans_beli` (
  `id_trans_beli` int(11) NOT NULL,
  `supplier_nama` varchar(150) DEFAULT NULL,
  `brg_kode` varchar(100) NOT NULL,
  `brg_nama` varchar(100) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `qty_beli` int(5) NOT NULL,
  `tgl_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trans_jual`
--

CREATE TABLE `tbl_trans_jual` (
  `id_trans_jual` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `barang_id` varchar(100) NOT NULL,
  `barang_nama` varchar(150) NOT NULL,
  `tgl_transaksi` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty_jual` int(5) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `promo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_trans_jual`
--

INSERT INTO `tbl_trans_jual` (`id_trans_jual`, `invoice`, `barang_id`, `barang_nama`, `tgl_transaksi`, `user_id`, `harga_jual`, `qty_jual`, `sub_total`, `total_diskon`, `cash`, `promo_id`) VALUES
(37, 'PM2108300001', 'PM0001', 'Teh Rio', 1630287899, 'admin', 1500, 1, 1500, 0, 50000, 0),
(38, 'PM2108300001', 'PM0002', 'Beras', 1630287899, 'admin', 15000, 1, 15000, 0, 50000, 0),
(39, 'PM2108300001', 'PM0003', 'Pulpen', 1630287899, 'admin', 2000, 1, 4000, 0, 50000, 0),
(40, 'PM2108300001', 'BM017', 'Sticker PDIP', 1630287899, 'admin', 20000, 1, 20000, 0, 50000, 0),
(41, 'PM2108300002', 'PM0003', 'Pulpen', 1630290761, 'admin', 2000, 1, 4000, 0, 5000, 0),
(42, 'PM2109010001', 'PM0001', 'Teh Rio', 1630468379, 'admin', 1500, 1, 1300, 200, 4000, 0),
(43, 'PM2109010001', 'PM0003', 'Pulpen', 1630468379, 'admin', 2000, 1, 2000, 0, 4000, 0),
(44, 'PM2109010002', 'PM0001', 'Teh Rio', 1630468551, 'admin', 1500, 1, 1500, 0, 10000, 0),
(45, 'PM2109010002', 'PM0003', 'Pulpen', 1630468551, 'admin', 2000, 1, 2000, 0, 10000, 0),
(46, 'PM2109010003', 'PM0001', 'Teh Rio', 1630468578, 'admin', 1500, 1, 1500, 0, 10000, 0),
(47, 'PM2109010003', 'PM0003', 'Pulpen', 1630468578, 'admin', 2000, 1, 2000, 0, 10000, 0),
(48, 'PM2109010004', 'PM0003', 'Pulpen', 1630468846, 'admin', 2000, 1, 2000, 0, 3000, 0),
(49, 'PM2109010005', 'PM0003', 'Pulpen', 1630469243, 'admin', 2000, 1, 2000, 0, 4000, 0),
(50, 'PM2109010006', 'PM0003', 'Pulpen', 1630469380, 'admin', 2000, 1, 2000, 0, 4000, 0),
(51, 'PM2109010007', 'PM0003', 'Pulpen', 1630469776, 'admin', 2000, 1, 2000, 0, 4000, 0),
(52, 'PM2109010008', 'PM0003', 'Pulpen', 1630469841, 'admin', 2000, 1, 2000, 0, 4000, 0),
(53, 'PM2109010009', 'PM0001', 'Teh Rio', 1630469896, 'admin', 1500, 1, 1500, 0, 2000, 0),
(54, 'PM2109010010', 'PM0003', 'Pulpen', 1630469957, 'admin', 2000, 1, 2000, 0, 4000, 0),
(55, 'PM2109010011', 'PM0001', 'Teh Rio', 1630470050, 'admin', 1500, 1, 1500, 0, 2000, 0),
(56, 'PM2109010012', 'PM0001', 'Teh Rio', 1630470089, 'admin', 1500, 1, 1500, 0, 2000, 0),
(57, 'PM2109010013', 'PM0001', 'Teh Rio', 1630470111, 'admin', 1500, 1, 1500, 0, 2000, 0),
(58, 'PM2109010014', 'PM0001', 'Teh Rio', 1630470140, 'admin', 1500, 1, 1500, 0, 2000, 0),
(59, 'PM2109010015', 'PM0003', 'Pulpen', 1630470196, 'admin', 2000, 1, 2000, 0, 3000, 0),
(60, 'PM2109010016', 'PM0001', 'Teh Rio', 1630470211, 'admin', 1500, 1, 1500, 0, 2000, 0),
(61, 'PM2109010017', 'PM0003', 'Pulpen', 1630470261, 'admin', 2000, 1, 2000, 0, 3000, 0),
(62, 'PM2109010018', 'PM0001', 'Teh Rio', 1630470350, 'admin', 1500, 1, 1500, 0, 4000, 0),
(63, 'PM2109010018', 'PM0003', 'Pulpen', 1630470350, 'admin', 2000, 1, 2000, 0, 4000, 0),
(64, 'PM2109010019', 'PM0001', 'Teh Rio', 1630470391, 'admin', 1500, 1, 1500, 0, 4000, 0),
(65, 'PM2109010019', 'PM0003', 'Pulpen', 1630470391, 'admin', 2000, 1, 2000, 0, 4000, 0),
(66, 'PM2109010020', 'PM0001', 'Teh Rio', 1630470520, 'admin', 1500, 1, 1500, 0, 2000, 0),
(67, 'PM2109010021', 'PM0001', 'Teh Rio', 1630470548, 'admin', 1500, 1, 1500, 0, 2000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `email`, `no_telp`, `image`, `role_id`, `is_active`, `created_date`, `modified_date`) VALUES
(4, 'Raymond Putra', 'admin', '$2y$10$D7pu0ruXcRyFFdnpIr7sled3mST9gnAtjReBizpu19sGSL1ouVTU2', 'raymondputra15@gmail.com', '08995815163', '58874.png', 1, 1, 1629015138, 0),
(6, 'Agok san', 'agok', '$2y$10$aawDZjnLljCuehr1xcliXu9EUdE8YUVQGhI03RsLHonhhrbpuISt6', 'agok@gmail.com', '', 'avatar4.png', 2, 1, 1629078493, 0),
(12, 'Felicia', 'feli', '$2y$10$CQTmtOuzlZN4DZ93dHc9zuS2ADdWouiv5CwQSWU60.TpM7NUiWLY6', 'feli@gmail.com', '08995815163', '4110823.jpg', 3, 1, 1629430349, 0),
(13, 'Joko', 'joko', '$2y$10$Mz9gt2si/Y9WUET91yqqyucJcu1AXfuuNEJTTXt1WBDIdDJu3Zggi', 'joko@gmail.com', '0888323212', '4110824.jpg', 2, 1, 1630419523, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_access_menu`
--

CREATE TABLE `tbl_user_access_menu` (
  `id_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id_menu`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'User'),
(3, 'Pembukuan'),
(4, 'Promo'),
(5, 'Rangkuman Bisnis'),
(6, 'Transaksi'),
(7, 'Gudang'),
(8, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_submenu`
--

CREATE TABLE `tbl_user_submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_user_submenu`
--

INSERT INTO `tbl_user_submenu` (`id_submenu`, `id_menu`, `title`, `url`, `is_active`) VALUES
(1, 2, 'Profil', 'user', 1),
(2, 2, 'Edit profil', 'user/editProfil', 1),
(3, 2, 'Ganti password', 'user/gantiPassword', 1),
(4, 3, 'Jurnal penjualan', '#', 1),
(5, 3, 'Jurnal pembelian', '#', 1),
(6, 3, 'Jurnal retur', '#', 1),
(7, 4, 'Info promo', '#', 1),
(8, 4, 'Tentukan promo', '#', 1),
(9, 5, 'Barang terlaris', '#', 1),
(10, 5, 'Waktu terpadat', '#', 1),
(11, 5, 'Pencarian dari pelanggan', '#', 1),
(12, 6, 'Sales', '#', 1),
(13, 6, 'Returment', '#', 1),
(14, 7, 'Info stok', '#', 1),
(15, 7, 'Input barang', '#', 1),
(16, 7, 'Info supplier', '#', 1),
(17, 8, 'Info pegawai', '#', 1),
(18, 8, 'Tambah pegawai', '#', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_token`
--

CREATE TABLE `tbl_user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_jual_detail`
--
ALTER TABLE `tbl_jual_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `tbl_promo_detail`
--
ALTER TABLE `tbl_promo_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_retur`
--
ALTER TABLE `tbl_retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbl_tampung`
--
ALTER TABLE `tbl_tampung`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indeks untuk tabel `tbl_trans_beli`
--
ALTER TABLE `tbl_trans_beli`
  ADD PRIMARY KEY (`id_trans_beli`);

--
-- Indeks untuk tabel `tbl_trans_jual`
--
ALTER TABLE `tbl_trans_jual`
  ADD PRIMARY KEY (`id_trans_jual`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_user_submenu`
--
ALTER TABLE `tbl_user_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_jual_detail`
--
ALTER TABLE `tbl_jual_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_promo_detail`
--
ALTER TABLE `tbl_promo_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tampung`
--
ALTER TABLE `tbl_tampung`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_trans_beli`
--
ALTER TABLE `tbl_trans_beli`
  MODIFY `id_trans_beli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_trans_jual`
--
ALTER TABLE `tbl_trans_jual`
  MODIFY `id_trans_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_submenu`
--
ALTER TABLE `tbl_user_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
