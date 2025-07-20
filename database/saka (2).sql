-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2025 pada 09.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(10) UNSIGNED NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_berkas` varchar(100) DEFAULT NULL,
  `unggah_berkas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_anggota`, `nama_berkas`, `unggah_berkas`, `keterangan`, `created_at`) VALUES
(1, 1, 'ktp', 'poster_12.jpg', 'mkasnkas', '2025-06-29 12:42:26'),
(2, 2, 'ijajah', 'poster_3.jpg', 'dfdf', '2025-06-29 12:47:35'),
(3, 3, 'akta', 'poster_31.jpg', '', '2025-06-29 12:52:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_seleksi`
--

CREATE TABLE `jadwal_seleksi` (
  `id_jadwal` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_seleksi`
--

INSERT INTO `jadwal_seleksi` (`id_jadwal`, `nama_kegiatan`, `tanggal_kegiatan`, `lokasi`, `keterangan`) VALUES
(1, 'lari 1 km', '2222-11-12', 'aula', 'harus datang'),
(2, 'qqqqqq', '1111-11-12', 'lapangan bola', 'wajibdd'),
(3, 'push up', '2025-06-27', 'lapangan depan', 'Push up 50X');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_status_pendaftaran`
--

CREATE TABLE `log_status_pendaftaran` (
  `id_log` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak') NOT NULL,
  `waktu_update` datetime NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_status_pendaftaran`
--

INSERT INTO `log_status_pendaftaran` (`id_log`, `id_anggota`, `status`, `waktu_update`, `keterangan`, `id_jadwal`) VALUES
(12, 3, 'Diterima', '2025-06-29 12:53:19', 'okoko', NULL),
(13, 1, 'Ditolak', '2025-06-29 12:55:07', 'ghgh', NULL),
(14, 2, 'Diterima', '2025-06-29 12:55:27', 'tytytyu', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `status` enum('Lulus','Tidak Lulus') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_anggota` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `tgl_pengumuman`, `status`, `created_at`, `id_anggota`, `nama`) VALUES
(12, 'Pengumuman Kelulusan: azam', 'dinyatakan lulus', '2025-07-12', 'Lulus', '2025-06-29 10:53:54', 3, 'azam'),
(13, 'Pengumuman Kelulusan: farida', 'dfdfdfdf', '2025-06-26', 'Tidak Lulus', '2025-06-29 10:56:07', 2, 'farida');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi_anggota`
--

CREATE TABLE `registrasi_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `registrasi_anggota`
--

INSERT INTO `registrasi_anggota` (`id_anggota`, `nama`, `nik`, `ttl`, `alamat`, `asal_sekolah`, `no_hp`, `created_at`) VALUES
(1, 'azura', '6101222025', 'kayraa, 4 januari 2025', 'jl.alianyang, melayu, no.  71, kec. singkawang barat', 'SD 1 semamok', '081225448351', '2025-06-29 15:59:54'),
(2, 'farida', '868787', 'kayraa, 4 januari 2004', 'Desa Rambayan, kec. Tekarang, Kab.Sambas, Prov.Kalimantan Barat, Indonesia', 'rtrt', '085822717459', '2025-06-29 16:07:14'),
(3, 'azam', '6101023400', 'SAmbas, 4 januari 2022', 'Desa Rambayan, kec. Tekarang, Kab.Sambas, Prov.Kalimantan Barat, Indonesia', 'sman 1 tekarang', '082151349099', '2025-06-29 17:52:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role_id`, `foto`, `created_at`) VALUES
(6, 'yusup miko', 'yusupmiko', '$2y$10$AuOl0qen5R.3.pjktxXfYePDTxWIDozlnbYjlblQMwKBpeFABQVJC', 1, NULL, '2025-05-10 05:30:07'),
(7, 'yusup miko5', 'yusupmiko2', '$2y$10$MUNJXwhz2T1jOnAjHO2QleE2DZFCLAF.sQ3SsO7LvcV3l5ehJ7jay', 2, NULL, '2025-05-10 05:30:48'),
(10, 'dini astri', 'dini', '$2y$10$2KztuejcVrzWe2s.EU3Zfu6SVUzb8Vk7NEZzicj9rM2NCH1Zf10V.', 1, NULL, '2025-06-13 06:22:27'),
(11, 'astri calon', 'calonanggota', '$2y$10$6M2uZUnnQaFWkzZTb2HgzedmqbuoAleE36WOspyYZ4q8iDrCa4S0O', 2, NULL, '2025-06-21 05:21:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `jadwal_seleksi`
--
ALTER TABLE `jadwal_seleksi`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `log_status_pendaftaran`
--
ALTER TABLE `log_status_pendaftaran`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `fk_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `fk_pengumuman_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `registrasi_anggota`
--
ALTER TABLE `registrasi_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal_seleksi`
--
ALTER TABLE `jadwal_seleksi`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log_status_pendaftaran`
--
ALTER TABLE `log_status_pendaftaran`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `registrasi_anggota` (`id_anggota`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_status_pendaftaran`
--
ALTER TABLE `log_status_pendaftaran`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_seleksi` (`id_jadwal`),
  ADD CONSTRAINT `log_status_pendaftaran_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `registrasi_anggota` (`id_anggota`);

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `fk_pengumuman_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `registrasi_anggota` (`id_anggota`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
