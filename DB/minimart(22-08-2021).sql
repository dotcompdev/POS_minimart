-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Agu 2021 pada 15.15
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
(2, 'PM0001', 'Teh Rio', 'Minuman', 'buah', 1500, 5, 1629641649);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `frek` varchar(20) NOT NULL,
  `day_no` int(5) NOT NULL,
  `intv` varchar(20) NOT NULL,
  `date` int(11) NOT NULL,
  `tenggat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `nama_promo` varchar(100) NOT NULL,
  `harga_promo` int(20) NOT NULL,
  `qty_promo` int(11) NOT NULL,
  `tgl_promo` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_retur`
--

CREATE TABLE `tbl_retur` (
  `id_retur` int(11) NOT NULL,
  `trans_jual_id` int(11) NOT NULL,
  `kode_brg_retur` int(11) NOT NULL,
  `qty_retur` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Struktur dari tabel `tbl_trans_beli`
--

CREATE TABLE `tbl_trans_beli` (
  `id_trans_beli` int(11) NOT NULL,
  `supplier_nama` varchar(150) NOT NULL,
  `brg_kode` varchar(100) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `qty_beli` int(5) NOT NULL,
  `tgl_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_trans_beli`
--

INSERT INTO `tbl_trans_beli` (`id_trans_beli`, `supplier_nama`, `brg_kode`, `harga_beli`, `qty_beli`, `tgl_beli`) VALUES
(2, 'PT. Penyuplai', 'PM0001', 1000, 5, 1629641649);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trans_jual`
--

CREATE TABLE `tbl_trans_jual` (
  `id_trans_jual` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `tgl_transaksi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty_jual` int(5) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `promo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, 'Raymond Putra', 'raymond', '$2y$10$v2NyWDtrx/ZGPZjoa6gDOeqcw/Su82nKl0VDHb2wMo.Colq1/2CVi', 'raymondputra15@gmail.com', '08995815163', '58874.png', 1, 1, 1629015138, 0),
(6, 'Agok san', 'agokk', '$2y$10$aawDZjnLljCuehr1xcliXu9EUdE8YUVQGhI03RsLHonhhrbpuISt6', 'agok@gmail.com', '085250041000', 'avatar4.png', 2, 1, 1629078493, 0),
(12, 'Feli', 'feli', '$2y$10$CQTmtOuzlZN4DZ93dHc9zuS2ADdWouiv5CwQSWU60.TpM7NUiWLY6', 'feli@gmail.com', '08995815163', '411082.jpg', 3, 1, 1629430349, 0);

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
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `tbl_trans_beli`
--
ALTER TABLE `tbl_trans_beli`
  MODIFY `id_trans_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_trans_jual`
--
ALTER TABLE `tbl_trans_jual`
  MODIFY `id_trans_jual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
