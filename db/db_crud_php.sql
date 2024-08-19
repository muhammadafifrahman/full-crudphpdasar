-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2024 pada 20.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(6, 'Rudi3', 'rudi3', 'rudi3@gmail.com', '$2y$10$YCxodWjbE1rL2d.x/Pn5wOphh025GPl8SP27Th9MvCdHWEhyUsA4a', '1'),
(7, 'Budi2', 'budi2', 'budi2@gmail.com', '$2y$10$Wo6pvwC5tLJHd2V0Xw1wfOXOToxf2c.hUvRlcH.QHr/XorEdw4UES', '2'),
(8, 'Super Admin', 'toni', 'toni@gmail.com', '$2y$10$CkVePRg/AKbDGHlE6DYFQOWwHVP.SfcNiVc25C.EuIsEpI39lgStq', '1'),
(9, 'Operator Barang1', 'opmbarang', 'opmbarang@gmail.com', '$2y$10$bgWd6hJi61tHvQobO38mY.ngd.sFPyCuI6otu/CysC9rOnUDgW5CC', '2'),
(10, 'Operator Mahasiswa', 'opmahasiswa', 'opmahasiswa@gmail.com', '$2y$10$f53TPkBaucI5SAqrc/Dud.zahqNjUSdoMI0PAiTpyMYOx0BKVnVg.', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(13, 'Komputer Asus', '5', '5000000', '320110', '2024-08-15 17:58:38'),
(14, 'Laptop Asus ROG', '5', '3000000', '561958', '2024-08-12 17:09:07'),
(16, 'Laptop Thinkpad', '5', '2500000', '306759', '2024-08-19 17:04:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(2, 'Budi', 'Teknik Informatika', 'Laki-Laki', '08123456789', '', 'budi@gmail.com', '66acb18694a04.jpeg'),
(3, 'Putri', 'Sistem Informasi', 'Perempuan', '08123456789', '', 'putri@gmail.com', '66b9b5d74d51d.jpeg'),
(5, 'Antoni', 'Teknik Informatika', 'Laki-Laki', '08123456789', '<p><em>Amuntai, Kalimatan Selatan</em> <strong>71011</strong></p>', 'antoni@gmail.com', '66acb3b223541.jpeg'),
(7, 'Ilham Wijaya', 'Sistem Informasi', 'Laki-Laki', '08123456784', '<p><em>Banjarmasin, Kalimantan Selatan</em> <strong>71011</strong></p>', 'ilham@gmail.com', '66bb0a17a533d.jpeg'),
(8, 'Ilham Lutfi', 'Teknik Informatika', 'Laki-Laki', '081234567879', '<p>Banjarmasin<a href=\"/ckfinder/userfiles/images/foto%20alamat/WhatsApp%20Image%202024-08-03%20at%2017_51_37.jpeg\" target=\"_blank\"><img alt=\"Gambar Alamat\" src=\"/ckfinder/userfiles/images/foto%20alamat/WhatsApp%20Image%202024-08-03%20at%2017_51_37.jpeg\" style=\"width:100%\" /></a></p>\r\n', 'ilhamluthfi@gmail.com', '66bb4506339f3.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
