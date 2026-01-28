-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2025 pada 09.35
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wmc_xiirpl2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dealer`
--

CREATE TABLE `tb_dealer` (
  `id_dealer` int(11) NOT NULL,
  `nama_dealer` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventori`
--

CREATE TABLE `tb_inventori` (
  `id_inv` int(11) NOT NULL,
  `id_sepeda` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL,
  `ket_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `ket_kategori`) VALUES
(1, 'Sepeda Anak', 'Sepeda ini cocok digunakan untuk anak usia 5-8 tahun'),
(2, 'Sepeda BMX', 'Sepeda yang cocok untuk kamu yg suka freestyle'),
(3, 'Sepeda Gunung', 'Sepeda yg cocok digunakan untuk kamu yg suka menjelajah. Dapat digunakan di medan kering dan basah bahkan berbatuan sekalipun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Abdul Jabbar', 'dettline', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Jordan Turbo', 'Jotu', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sepeda`
--

CREATE TABLE `tb_sepeda` (
  `id_sepeda` int(11) NOT NULL,
  `tipe_sepeda` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `ket_sepeda` text NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sepeda`
--

INSERT INTO `tb_sepeda` (`id_sepeda`, `tipe_sepeda`, `harga`, `gambar`, `ket_sepeda`, `id_kategori`) VALUES
(2, 'Thor Jungle', 3200000, 'thorjungle.jpg', 'Sepeda dengan desain petir yg elegan, siap menjadi pusat perhatian, selain itu speda ini ringan bobotnya hanya 9kg', 3),
(3, 'Big Foot', 4200000, 'bigfoot.jpg', 'Sepeda dengan bentuk kokoh dibuat dengan tema hitam gelap, menjadikan sepeda ini terlihat gagah dan elegan. Sepeda ini mampu menampung bobot berat, dan siap menerjang medan manapun', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dealer`
--
ALTER TABLE `tb_dealer`
  ADD PRIMARY KEY (`id_dealer`);

--
-- Indeks untuk tabel `tb_inventori`
--
ALTER TABLE `tb_inventori`
  ADD PRIMARY KEY (`id_inv`),
  ADD KEY `id_sepeda` (`id_sepeda`),
  ADD KEY `id_dealer` (`id_dealer`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_sepeda`
--
ALTER TABLE `tb_sepeda`
  ADD PRIMARY KEY (`id_sepeda`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dealer`
--
ALTER TABLE `tb_dealer`
  MODIFY `id_dealer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_inventori`
--
ALTER TABLE `tb_inventori`
  MODIFY `id_inv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_sepeda`
--
ALTER TABLE `tb_sepeda`
  MODIFY `id_sepeda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_inventori`
--
ALTER TABLE `tb_inventori`
  ADD CONSTRAINT `tb_inventori_ibfk_1` FOREIGN KEY (`id_sepeda`) REFERENCES `tb_sepeda` (`id_sepeda`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_inventori_ibfk_2` FOREIGN KEY (`id_dealer`) REFERENCES `tb_dealer` (`id_dealer`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_sepeda`
--
ALTER TABLE `tb_sepeda`
  ADD CONSTRAINT `tb_sepeda_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
