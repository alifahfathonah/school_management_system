-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Okt 2018 pada 10.47
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` int(10) NOT NULL,
  `benar` int(5) NOT NULL,
  `salah` int(5) NOT NULL,
  `total_skor` int(5) NOT NULL,
  `siswabaru_id` int(8) NOT NULL,
  `quiz_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_history`, `benar`, `salah`, `total_skor`, `siswabaru_id`, `quiz_id`) VALUES
(5, 2, 1, 4, 1, 1),
(6, 1, 2, 2, 1, 1),
(65, 1, 2, 2, 1, 1),
(66, 1, 2, 2, 1, 1),
(67, 1, 2, 2, 1, 1),
(68, 1, 2, 2, 1, 1),
(93, 2, 1, 4, 1, 1),
(94, 1, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_soal`
--

CREATE TABLE `jenis_soal` (
  `id_jenis` int(8) NOT NULL,
  `jenis_soal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `quiz_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_soal`
--

INSERT INTO `jenis_soal` (`id_jenis`, `jenis_soal`, `deskripsi`, `quiz_id`) VALUES
(1, 'Listening', 'Deskripsi Soal', 1),
(2, 'Reading', '<p>Deskripsi Soal</p>', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(8) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `skor_benar` int(8) NOT NULL,
  `skor_salah` int(8) NOT NULL,
  `waktu` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `skor_benar`, `skor_salah`, `waktu`) VALUES
(1, 'AVID', 2, 0, 1),
(2, 'FORWARD', 2, 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` tinyint(2) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Siswa'),
(3, 'Guru'),
(4, 'Orang Tua'),
(5, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `part`
--

CREATE TABLE `part` (
  `id_part` int(8) NOT NULL,
  `nama_part` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `audio` text,
  `jenis_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `part`
--

INSERT INTO `part` (`id_part`, `nama_part`, `description`, `audio`, `jenis_id`) VALUES
(1, 'Part 1', 'Question 1 – 8 are based on the following dialogue', NULL, 1),
(2, 'part 2', 'h', 'part-1mp3.mp3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(8) NOT NULL,
  `nama_quiz` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `kategori_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `nama_quiz`, `level`, `is_active`, `kategori_id`) VALUES
(1, 'Quiz 1', 'high', 1, 1),
(2, 'Quiz 2', 'medium', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_baru`
--

CREATE TABLE `siswa_baru` (
  `id_siswabaru` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_baru`
--

INSERT INTO `siswa_baru` (`id_siswabaru`, `nama`, `nama_ayah`, `alamat`, `jk`, `sekolah`, `pekerjaan`, `no_hp`, `email`, `password`) VALUES
(1, 'fata', 'hasan', 'bandung', 'Laki-Laki', 'unikom', 'mahasiswa', '087822555754', 'fatahasan97@gmail.com', 'bismillah'),
(2, 'azka', 'haha', 'k', 'Laki-Laki', 'uni', 'maha', '0866789989', 'haha@email.com', 'bismillah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(8) NOT NULL,
  `soal` text,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_benar` text NOT NULL,
  `part_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_benar`, `part_id`) VALUES
(1, 'More and more people ____ divorced every year.', 'are wanting', 'wanting', 'getting', 'are getting', 'are wanting', 1),
(2, '2 * 4 =', '2', '4', '5', '8', '8', 1),
(5, 'h', '7', '8', '9', '1', '9', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(8) NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `siswabaru_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(2, 'hasan', 'hasan', '$2y$10$82Y6zDKsz6s0P7O.BgE2/.kLRqSqQSeyxUkrIflduJe1pErN9w86e', 'uvgdfItRGN6fr6uw03eQXv0siwfVAkQ4BpOtDtr78vpgZtrQN6G5zIJZzyGF', '2018-01-19 13:40:07', '2018-01-19 13:40:07', 1),
(3, 'guru', 'fata', '$2y$10$82Y6zDKsz6s0P7O.BgE2/.kLRqSqQSeyxUkrIflduJe1pErN9w86e', 'FUlH1dzFmqrz4pETSNwKzh7XLTeBpxbCDlPqp7q2oUh6l9UFZYeOl8chKK5p', NULL, NULL, 3),
(17, 'fata', 'fatahasan97@gmail.com', '$2y$10$zTeov1Gbw/s/W78dtyRo2.NxHNEBrMQlC3kKQmn7xTiGgJUzxEiMm', 'Kk8kHstPeaIp7lB4X1GvVLM8eMe7YEUer6xF7WpkgrFaHLiJ9jCxqrP7tpMQ', NULL, NULL, 2),
(18, 'azka', 'haha@email.com', '$2y$10$qMbEBMQk.ho.6yAt5vroPOG4QhF236yahOKwvNkLHdIFJeNfeW/1G', '67bhoOMWfB6XQ8TommOo7h0c7yodpro3DnEryRO1z6W1PeRB6kKfTPCGY1W2', NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `siswabaru_id` (`siswabaru_id`);

--
-- Indexes for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `kategori_id` (`quiz_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id_part`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `siswa_baru`
--
ALTER TABLE `siswa_baru`
  ADD PRIMARY KEY (`id_siswabaru`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `quiz_id` (`part_id`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`),
  ADD KEY `siswabaru_id` (`siswabaru_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `jenis_soal`
--
ALTER TABLE `jenis_soal`
  MODIFY `id_jenis` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `id_part` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `siswa_baru`
--
ALTER TABLE `siswa_baru`
  MODIFY `id_siswabaru` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`siswabaru_id`) REFERENCES `siswa_baru` (`id_siswabaru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_soal`
--
ALTER TABLE `jenis_soal`
  ADD CONSTRAINT `jenis_soal_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id_quiz`);

--
-- Ketidakleluasaan untuk tabel `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `part_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_soal` (`id_jenis`);

--
-- Ketidakleluasaan untuk tabel `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`part_id`) REFERENCES `part` (`id_part`);

--
-- Ketidakleluasaan untuk tabel `sumber`
--
ALTER TABLE `sumber`
  ADD CONSTRAINT `sumber_ibfk_1` FOREIGN KEY (`siswabaru_id`) REFERENCES `siswa_baru` (`id_siswabaru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
