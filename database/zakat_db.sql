-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2020 pada 09.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'asep', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran_zakat`
--

CREATE TABLE `tb_pembayaran_zakat` (
  `id_pembayaran` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `id_zakat` int(10) NOT NULL,
  `nominal` int(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat_email` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rekening` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran_zakat`
--

INSERT INTO `tb_pembayaran_zakat` (`id_pembayaran`, `id_admin`, `id_zakat`, `nominal`, `nama_lengkap`, `no_hp`, `alamat_email`, `nama_bank`, `no_rekening`) VALUES
(7, 1, 3, 500000, 'Ilham Dwi Nugraha', '08870937758', 'ilham@gmail.com', 'BNI', 8825631),
(9, 1, 1, 1400000, 'Hans Varian', '08125472593', 'hansvar@gmail.com', 'Mandiri', 222381623),
(10, 1, 3, 1200000, 'Armanditto', '08974566723', 'ditto@ditto.com', 'UOB', 88745623),
(11, 1, 2, 2100000, 'Febrian Sudimara', '089623243', 'febrian@gmail.com', 'BCA', 8572536);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_zakat`
--

CREATE TABLE `tb_zakat` (
  `id_zakat` int(10) NOT NULL,
  `jenis_zakat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_zakat`
--

INSERT INTO `tb_zakat` (`id_zakat`, `jenis_zakat`) VALUES
(1, 'Zakat Penghasilan'),
(2, 'Zakat Maal'),
(3, 'Zakat Fitrah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_pembayaran_zakat`
--
ALTER TABLE `tb_pembayaran_zakat`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_zakat` (`id_zakat`);

--
-- Indeks untuk tabel `tb_zakat`
--
ALTER TABLE `tb_zakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran_zakat`
--
ALTER TABLE `tb_pembayaran_zakat`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_zakat`
--
ALTER TABLE `tb_zakat`
  MODIFY `id_zakat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran_zakat`
--
ALTER TABLE `tb_pembayaran_zakat`
  ADD CONSTRAINT `tb_pembayaran_zakat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  ADD CONSTRAINT `tb_pembayaran_zakat_ibfk_2` FOREIGN KEY (`id_zakat`) REFERENCES `tb_zakat` (`id_zakat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
