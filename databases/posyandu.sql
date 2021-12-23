-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Des 2021 pada 08.26
-- Versi server: 10.5.12-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18152243_posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`) VALUES
('galuh14', '1234'),
('aofal26', '1234'),
('galih', '1234'),
('admin', 'admin1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan_timbangan`
--

CREATE TABLE `bulan_timbangan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan_timbangan`
--

INSERT INTO `bulan_timbangan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_balita`
--

CREATE TABLE `data_balita` (
  `id_balita` int(11) NOT NULL,
  `nik_balita` varchar(50) NOT NULL,
  `id_posyandu` int(11) NOT NULL,
  `nama_balita` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `anak_ke` varchar(50) NOT NULL,
  `berat_lahir` varchar(50) NOT NULL,
  `panjang_lahir` varchar(50) NOT NULL,
  `IMD` varchar(50) NOT NULL,
  `buku_KIA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_balita`
--

INSERT INTO `data_balita` (`id_balita`, `nik_balita`, `id_posyandu`, `nama_balita`, `jenis_kelamin`, `tanggal_lahir`, `nama_ayah`, `nama_ibu`, `anak_ke`, `berat_lahir`, `panjang_lahir`, `IMD`, `buku_KIA`) VALUES
(1, '3521011405160001', 1, 'Biasca Syakbian Alfarezel', 'L', '2016-05-14', 'Galuh Joni', 'Nindi', '1', '3', '48', 'ya', 'ada'),
(2, '3521014706160001', 1, 'Aisyah Putri Ramadhani', 'P', '2016-06-07', 'Sugimanto', 'Suparmi', '3', '3.1', '48', 'ya', 'ada'),
(3, '3521014408160001', 1, 'Adeeva Arsyila Dwinafisha', 'P', '2016-08-04', 'Dwi Susilo', 'Tri Handayani', '2', '3', '45', 'ya', 'ada'),
(4, '3521016610160001', 1, 'Mysha Shaqeena Prastiyo', 'P', '2016-10-26', 'Tri Prastiyo', 'Luluk', '1', '3.2', '28', 'ya', 'ada'),
(5, '35210166101600433', 7, 'Prasetisius el muhammad kuncoro', 'L', '2016-10-26', 'Dwi Prastiyo', 'Lilik', '1', '3.2', '47', 'ya', 'ada'),
(6, '1234672912831264', 6, 'Boruto Uzumaki', 'L', '2019-02-12', 'Galih Jono', 'Nindi Amel', '1', '3', '190', 'ya', 'ada'),
(7, '2617492745361943', 8, 'Galih Restu ', 'L', '2019-07-19', 'Aofal', 'Galuh', '10', '3', '44', 'ya', 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_imunisasi`
--

CREATE TABLE `data_imunisasi` (
  `id_data_imunisasi` int(11) NOT NULL,
  `nik_balita` varchar(50) NOT NULL,
  `tanggal_imunisasi` date NOT NULL,
  `id_imunisasi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_imunisasi`
--

INSERT INTO `data_imunisasi` (`id_data_imunisasi`, `nik_balita`, `tanggal_imunisasi`, `id_imunisasi`, `status`) VALUES
(1, '3521011405160001', '2017-12-12', '01', 'Sudah'),
(2, '3521014706160001', '2017-12-03', '01', 'Sudah'),
(3, '3521014408160001', '2017-12-09', '02', 'Sudah'),
(4, '3521016610160001', '2017-12-05', '04', 'Sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_posyandu`
--

CREATE TABLE `data_posyandu` (
  `id_posyandu` int(11) NOT NULL,
  `nama_posyandu` varchar(50) NOT NULL,
  `rt` varchar(50) NOT NULL,
  `rw` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_posyandu`
--

INSERT INTO `data_posyandu` (`id_posyandu`, `nama_posyandu`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`) VALUES
(1, 'Lestari', '04', '03', 'Ketanggung', 'Sine', 'Ngawi', 'Jawa Timur'),
(6, 'Mentari', '01', '01', 'Pancor', 'Gayam', 'Sumenep ', 'Jawa Timur'),
(7, 'Melati', ' 10', '01', 'Candi', 'Sepuluh', 'Bangkalan', 'Jawa Timur'),
(8, 'UJICOBA', '01', '01', 'untuk', 'tugas', 'paw', 'UTM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_timbangan`
--

CREATE TABLE `data_timbangan` (
  `id_data_timbangan` int(11) NOT NULL,
  `id_balita` varchar(50) NOT NULL,
  `id_bulan_timbangan` int(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `berat_badan` varchar(50) NOT NULL,
  `tinggi_badan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_timbangan`
--

INSERT INTO `data_timbangan` (`id_data_timbangan`, `id_balita`, `id_bulan_timbangan`, `tahun`, `berat_badan`, `tinggi_badan`) VALUES
(1, '1', 2, 2021, '19.1', '105.9'),
(2, '2', 2, 2021, '15.9', '103.4'),
(3, '3', 2, 2021, '15.8', '103.3'),
(4, '4', 2, 2021, '20.8', '109.5'),
(5, '1', 3, 2021, '20.3', '106.2'),
(6, '2', 3, 2021, '15.7', '103.9'),
(7, '3', 3, 2021, '15.7', '103.5'),
(8, '4', 3, 2021, '22.7', '110.7'),
(9, '1', 12, 2020, '18.7', '100'),
(10, '1', 11, 2020, '18', '98'),
(11, '1', 10, 2020, '17.8', '97'),
(14, '1', 12, 2021, '22', '110.9'),
(15, '7', 7, 2019, '2,9', '47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi`
--

CREATE TABLE `imunisasi` (
  `id_imun` varchar(50) NOT NULL,
  `nama_imunisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `imunisasi`
--

INSERT INTO `imunisasi` (`id_imun`, `nama_imunisasi`) VALUES
('01', 'Hepatitis B'),
('02', 'Polio '),
('03', 'BCG'),
('04', 'Campak'),
('05', 'DPT-HB-HiB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_posyandu` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_posyandu`, `tanggal`, `waktu`, `nama_kegiatan`) VALUES
(1, '0', '2022-07-15', '09:00:00', 'Timbangan 2'),
(4, '0', '2021-12-31', '09:00:00', 'Imunisasi 1'),
(5, '0', '2021-12-21', '10:10:00', 'Timbangan'),
(6, '1', '2021-12-22', '10:10:00', 'IMUNISASI'),
(7, '6', '2022-01-14', '10:40:00', 'Imunisasi Campak Dan Rubella'),
(8, '7', '2022-02-01', '11:45:00', 'Imunisasi cacar'),
(9, '8', '2022-02-18', '10:15:00', 'UJICOBA 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username_pengguna` varchar(50) NOT NULL,
  `password_pengguna` varchar(50) NOT NULL,
  `nik_balita` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username_pengguna`, `password_pengguna`, `nik_balita`) VALUES
(1, 'Galih', '1234', '3521011405160001'),
(2, 'Galuh', '1234', '3521014706160001'),
(3, 'Aofal', '1234', '3521014408160001'),
(4, 'admin', '1234', '3521016610160001'),
(5, 'admin12', '1234', '3521016610160002'),
(6, 'nindi', '1234', '1234672912831264'),
(7, 'pras', '1234', '35210166101600433'),
(8, 'user', 'user1234', '2617492745361943');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `id_posyandu` varchar(50) NOT NULL,
  `nik_pengurus` varchar(50) NOT NULL,
  `username_pengurus` varchar(50) NOT NULL,
  `password_pengurus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `id_posyandu`, `nik_pengurus`, `username_pengurus`, `password_pengurus`) VALUES
(1, '1', '3521011010910022', 'galuh', '1234'),
(2, '6', '3529202907788282', 'restu', '1234'),
(9, '7', '1235728194830261', 'marom', '1234'),
(11, '8', '8291746271927364', 'pengurus', 'pengurus1234');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_imunisasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_imunisasi` (
`id_data_imunisasi` int(11)
,`nik_balita` varchar(50)
,`tanggal_imunisasi` date
,`id_imunisasi` varchar(50)
,`status` varchar(50)
,`id_imun` varchar(50)
,`nama_imunisasi` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_timbangan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_timbangan` (
`id_data_timbangan` int(11)
,`id_balita` varchar(50)
,`id_bulan_timbangan` int(50)
,`tahun` year(4)
,`berat_badan` varchar(50)
,`tinggi_badan` varchar(50)
,`id_bulan` int(11)
,`nama_bulan` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_imunisasi`
--
DROP TABLE IF EXISTS `v_imunisasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id18152243_root`@`%` SQL SECURITY DEFINER VIEW `v_imunisasi`  AS  select `data_imunisasi`.`id_data_imunisasi` AS `id_data_imunisasi`,`data_imunisasi`.`nik_balita` AS `nik_balita`,`data_imunisasi`.`tanggal_imunisasi` AS `tanggal_imunisasi`,`data_imunisasi`.`id_imunisasi` AS `id_imunisasi`,`data_imunisasi`.`status` AS `status`,`imunisasi`.`id_imun` AS `id_imun`,`imunisasi`.`nama_imunisasi` AS `nama_imunisasi` from (`data_imunisasi` join `imunisasi` on(`data_imunisasi`.`id_imunisasi` = `imunisasi`.`id_imun`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_timbangan`
--
DROP TABLE IF EXISTS `v_timbangan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id18152243_root`@`%` SQL SECURITY DEFINER VIEW `v_timbangan`  AS  select `data_timbangan`.`id_data_timbangan` AS `id_data_timbangan`,`data_timbangan`.`id_balita` AS `id_balita`,`data_timbangan`.`id_bulan_timbangan` AS `id_bulan_timbangan`,`data_timbangan`.`tahun` AS `tahun`,`data_timbangan`.`berat_badan` AS `berat_badan`,`data_timbangan`.`tinggi_badan` AS `tinggi_badan`,`bulan_timbangan`.`id_bulan` AS `id_bulan`,`bulan_timbangan`.`nama_bulan` AS `nama_bulan` from (`data_timbangan` join `bulan_timbangan` on(`data_timbangan`.`id_bulan_timbangan` = `bulan_timbangan`.`id_bulan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulan_timbangan`
--
ALTER TABLE `bulan_timbangan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `data_balita`
--
ALTER TABLE `data_balita`
  ADD PRIMARY KEY (`id_balita`);

--
-- Indeks untuk tabel `data_imunisasi`
--
ALTER TABLE `data_imunisasi`
  ADD PRIMARY KEY (`id_data_imunisasi`);

--
-- Indeks untuk tabel `data_posyandu`
--
ALTER TABLE `data_posyandu`
  ADD PRIMARY KEY (`id_posyandu`);

--
-- Indeks untuk tabel `data_timbangan`
--
ALTER TABLE `data_timbangan`
  ADD PRIMARY KEY (`id_data_timbangan`);

--
-- Indeks untuk tabel `imunisasi`
--
ALTER TABLE `imunisasi`
  ADD PRIMARY KEY (`id_imun`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bulan_timbangan`
--
ALTER TABLE `bulan_timbangan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_balita`
--
ALTER TABLE `data_balita`
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_imunisasi`
--
ALTER TABLE `data_imunisasi`
  MODIFY `id_data_imunisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_posyandu`
--
ALTER TABLE `data_posyandu`
  MODIFY `id_posyandu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_timbangan`
--
ALTER TABLE `data_timbangan`
  MODIFY `id_data_timbangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
