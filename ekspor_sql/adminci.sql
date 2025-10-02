-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2025 pada 05.37
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` int(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `isi2` varchar(50) NOT NULL,
  `link2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id`, `icon`, `judul`, `isi`, `link`, `isi2`, `link2`) VALUES
(1, 'ion-ios-location-outline', 'ALAMAT SAYA', 'Gambirono Krajan, Gambirono, Kec. Bangsalsari, Kab', 'https://www.google.com/maps/place/8%C2%B012\'01.5%22S+113%C2%B031\'16.5%22E/@-8.2004206,113.5190692,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x7e45611ce51b2b94!8m2!3d-8.2004206!4d113.5212579?hl=id', '', ''),
(2, 'ion-ios-location-outline', 'ALAMAT SMK', 'RCVP+R39, Jl. PB.Sudirman, Tekoan, Tanggul Kulon, ', 'https://www.google.com/maps/place/SMK+Negeri+6+Jember/@-8.1554502,113.4330301,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd68b08077adae9:0x32c15952de1123cb!8m2!3d-8.1554555!4d113.4352188', '', ''),
(3, 'ion-ios-telephone-outline', 'NO.WA', 'MOHAMMAD MAHBUBIL GOFUR(0895351440722)', 'https://wa.me/62895351440722', 'MOHAMMAD DANIEL REZA(089652159944)', 'https://wa.me/6289652159944');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `notlp` varchar(50) NOT NULL,
  `linknomer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `nama`, `notlp`, `linknomer`) VALUES
(1, 'MOHAMMAD MAHBUBIL GOFUR', '0895351440722', 'https://wa.me/62895351440722'),
(2, 'MOHAMAD DANIEL REZA', '089652159944', 'https://wa.me/6289652159944');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen`
--

CREATE TABLE `data_absen` (
  `id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL,
  `keterangan` varchar(1) NOT NULL,
  `tgl_absen` date NOT NULL DEFAULT current_timestamp(),
  `jam_masuk` time NOT NULL,
  `jam_pulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_absen`
--

INSERT INTO `data_absen` (`id`, `nis`, `password`, `keterangan`, `tgl_absen`, `jam_masuk`, `jam_pulang`) VALUES
(26, 'S00001', '1222', 's', '2023-03-30', '02:04:10', '02:04:10'),
(27, 'S00002', '111', 'i', '2023-03-30', '02:04:43', '02:04:43'),
(28, 'S00003', '222', 'h', '2023-03-30', '02:05:50', '02:06:15'),
(29, 'S00004', '333', 't', '2023-03-31', '19:54:59', '19:56:44'),
(30, 'S00005', '444', 't', '2023-03-31', '19:57:27', '19:57:32'),
(31, 'S00007', '666', 'h', '2023-03-31', '19:59:15', '20:00:05'),
(32, 'S00001', '1222', 't', '2023-03-31', '20:02:28', '20:03:22'),
(33, 'S00008', '777', 'h', '2023-03-31', '23:35:16', NULL),
(34, 'S00009', '888', 't', '2023-03-31', '23:36:10', '23:36:14'),
(35, 'S00001', '1222', 'h', '2023-04-01', '18:36:27', NULL),
(36, 'S00002', '111', 's', '2023-04-01', '18:36:50', '18:36:50'),
(37, 'S00003', '222', 'i', '2023-04-01', '18:37:14', '18:37:14'),
(38, 'S00001', '1222', 'h', '2023-04-02', '09:06:19', NULL),
(39, 'S00012', '122', 't', '2023-04-02', '12:01:30', NULL),
(40, 'S00011', '100', 'i', '2023-04-02', '12:57:46', '12:57:46'),
(41, 'S00006', '555', 't', '2023-04-02', '12:58:48', NULL),
(42, 'S00001', '1222', 't', '2023-04-06', '05:14:24', '05:15:22'),
(43, 'S00002', '111', 's', '2023-04-06', '05:19:23', '05:19:23'),
(44, 'S00001', '1222', 't', '2023-04-13', '22:31:41', NULL),
(45, 'S00002', '111', 'h', '2023-04-13', '22:36:18', NULL),
(46, 'S00003', '222', 't', '2023-04-13', '22:37:22', NULL),
(47, 'S00001', '1222', 't', '2023-05-06', '18:59:05', NULL),
(48, 'S00010', '999', 't', '2023-05-06', '19:06:06', NULL),
(49, 'S00001', '1222', 't', '2023-05-09', '17:52:28', NULL),
(50, 'S00003', '222', 'i', '2023-05-09', '18:03:47', '18:03:47'),
(51, 'S00004', '333', 's', '2023-05-09', '18:06:19', '18:06:19'),
(52, 'S00005', '444', 't', '2023-05-09', '18:06:51', NULL),
(53, 'S00001', '1222', 't', '2023-05-10', '19:32:19', NULL),
(54, 'S00002', '111', 'i', '2023-05-10', '19:39:17', '19:39:17'),
(55, 'S00001', '1222', 't', '2023-05-11', '07:36:58', NULL),
(56, 'S00002', '111', 'i', '2023-05-11', '07:39:53', '07:39:53'),
(57, 'S00004', '333', 's', '2023-05-11', '07:40:50', '07:40:50'),
(58, 'S00001', '1222', 't', '2023-06-03', '19:13:22', NULL),
(59, 'S00002', '111', 't', '2023-06-03', '19:40:27', NULL),
(60, 'S00003', '222', 't', '2023-06-03', '20:37:20', NULL),
(61, 'S00004', '333', 't', '2023-06-03', '20:39:03', NULL),
(62, 'S00005', '444', 't', '2023-06-03', '20:40:07', NULL),
(63, 'S00001', '1222', 't', '2023-06-13', '19:16:44', NULL),
(64, 'S00001', '1222', 't', '2023-06-14', '19:14:07', NULL),
(65, 'S00002', '111', 't', '2023-06-14', '19:16:18', NULL),
(66, 'S00003', '222', 't', '2023-06-14', '19:25:37', NULL),
(67, 'S00004', '333', 't', '2023-06-14', '19:30:45', NULL),
(68, 'S00001', '1222', 't', '2023-06-15', '19:27:13', NULL),
(69, 'S00001', '1222', 't', '2023-06-27', '19:19:32', NULL),
(70, 'S00001', '1222', 't', '2023-07-08', '20:01:47', NULL),
(71, 'S00002', '111', 't', '2023-07-08', '20:03:49', NULL),
(72, 'S00001', '1222', 't', '2023-07-10', '07:00:16', '07:17:06'),
(73, 'S00002', '111', 't', '2023-07-10', '07:02:16', NULL),
(74, 'S00003', '222', 't', '2023-07-10', '07:03:04', NULL),
(75, 'S00004', '333', 't', '2023-07-10', '07:04:36', NULL),
(76, 'S00005', '444', 't', '2023-07-10', '07:08:44', NULL),
(77, 'S00006', '555', 't', '2023-07-10', '07:09:28', NULL),
(78, 'S00007', '666', 't', '2023-07-10', '07:10:33', NULL),
(79, 'S00008', '777', 't', '2023-07-10', '07:12:38', NULL),
(80, 'S00009', '888', 't', '2023-07-10', '07:22:34', NULL),
(81, 'S00001', '1222', 'h', '2023-07-14', '06:04:11', NULL),
(82, 'S00002', '111', 'h', '2023-07-14', '06:49:39', NULL),
(83, 'S00001', '1222', 't', '2023-07-15', '07:01:54', NULL),
(84, 'S00001', '1222', 't', '2023-07-16', '07:41:53', NULL),
(85, 'S00001', '1222', 't', '2023-09-05', '22:44:53', NULL),
(86, 'S00001', '1222', 't', '2023-10-31', '13:20:57', NULL),
(87, 'S00014', '777', 't', '2025-05-01', '15:28:14', '15:31:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jk` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jk`, `jk`) VALUES
('L', 'laki_laki'),
('P', 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` varchar(20) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `id_jk` varchar(20) NOT NULL,
  `ttl` date NOT NULL,
  `telepone` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nama_guru`, `id_jk`, `ttl`, `telepone`, `password`) VALUES
('G00001', 'mahbubil', 'L', '2023-03-01', '089934739222', '111112');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` varchar(45) NOT NULL,
  `nama_kelas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`) VALUES
('RplIX01', 'X RPL 2'),
('RplIX02', 'X RPL 3'),
('RplX01', 'X RPL 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(20) NOT NULL,
  `lotitude` double NOT NULL,
  `logitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_lokasi`, `lotitude`, `logitude`) VALUES
(1, 'sklh', -8.20035171508789, 113.5213623046875),
(2, 'sklh', -8.200420379638672, 113.52133178710938),
(3, 'sklh', -8.200419425964355, 113.52149200439453),
(4, 'sklh', -8.200470924377441, 113.5214614868164);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `kode_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`kode_mapel`, `nama_mapel`) VALUES
(1, 'BHS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` varchar(15) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `id_kelas` varchar(45) NOT NULL,
  `id_jk` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `number` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama_siswa`, `id_kelas`, `id_jk`, `ttl`, `number`, `password`) VALUES
('S00001', 'MOHAMMAD MAHBUBIL GOFUR', 'RplX01', 'L', '2023-01-27', '0890284083420', '1222'),
('S00002', 'MOHAMMAD DANIEL REZA', 'RplX01', 'L', '0001-01-01', '0898273287381', '111'),
('S00003', 'MOHAMMAD ALI', 'RplX01', 'L', '0011-02-02', '0897656757876', '222'),
('S00004', 'MOHAMMAD ARIF', 'RplIX01', 'L', '0011-03-03', '0890980980098', '333'),
('S00005', 'MOHAMMAD AKBAR', 'RplIX02', 'L', '0001-11-01', '0890927393792', '444'),
('S00006', 'AHMAD SIDIQ', 'RplIX01', 'L', '0001-01-01', '0899389238293', '555'),
('S00007', 'MOHAMMAD ANWAR', 'RplIX01', 'P', '0001-01-01', '1', '666'),
('S00008', 'MOHAMMAD AHMAD', 'RplIX02', 'P', '0001-01-01', '1', '777'),
('S00009', 'AHMAD JAFAR', 'RplIX01', 'L', '0001-01-01', '1', '888'),
('S00010', 'RAFFI', 'RplIX01', 'L', '0002-02-22', '2', '999'),
('S00011', 'AHMAD GOFAR', 'RplIX02', 'L', '0001-01-01', '1', '100'),
('S00012', 'MOHAMMAD MAHBUBIL GHOFUR', 'RplIX01', 'L', '2023-03-30', '0890284083422', '122'),
('S00013', 'MOHAMMAD MAHBUBIL MAULANA', 'RplIX01', 'L', '2023-03-07', '089028408777', '133'),
('S00014', 'MOH AROFIN', 'RplIX01', 'L', '2000-11-11', '08923456789', '777');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_skedule`
--

CREATE TABLE `tbl_skedule` (
  `id` int(11) NOT NULL,
  `tgl_thn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_skedule`
--

INSERT INTO `tbl_skedule` (`id`, `tgl_thn`) VALUES
(8, '2023-05-13'),
(9, '2023-05-14'),
(13, '0000-00-00'),
(14, '2023-05-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(130) NOT NULL,
  `image` varchar(130) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'MOHAMMAD MAHBUBIL GOFUR', 'mahbubilgofur@gmail.com', 'default.jpg', '$2y$10$clZ4gUOqQEFYeNDIANpw7OxJr3ik.l27CT3yxRZBk9.26FXtK8DlO', 2, 1, 1673573172);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_waktu`
--

CREATE TABLE `tbl_waktu` (
  `id_waktu` int(11) NOT NULL,
  `jam_masuk` int(11) NOT NULL,
  `jam_pulang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id_team`, `nama`, `foto`, `jabatan`) VALUES
(1, 'M MAHBUBIL GOFUR', '09c8ab7a37f5694c3374bb08c8a93fb6.jpg', 'SISWA'),
(2, 'MOHAMAD DANIEL REZA', '09c8ab7a37f5694c3374bb08c8a93fb61.jpg', 'SISWA'),
(3, 'PAK HAMID', '09c8ab7a37f5694c3374bb08c8a93fb62.jpg', 'GURU JURUSAN'),
(4, 'MOH ARIF', 'user.jpg', 'KEPALA SEKOLAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(20) NOT NULL,
  `link_wilayah` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `link_wilayah`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.0232003337896!2d113.52125!3d-8.2004167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc38236d234974ef9!2zOMKwMTInMDEuNSJTIDExM8KwMzEnMTYuNSJF!5e0!3m2!1sid!2sid!4v1673286271069!5m2!1sid!2sid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tbl_skedule`
--
ALTER TABLE `tbl_skedule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_waktu`
--
ALTER TABLE `tbl_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `kode_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_skedule`
--
ALTER TABLE `tbl_skedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_waktu`
--
ALTER TABLE `tbl_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
