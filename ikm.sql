-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2023 pada 19.21
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` text NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_nama`, `admin_email`, `admin_password`, `admin_foto`) VALUES
('97b3263bf74746ea6e803616c9ff9511', 'Admin', 'admin@gmail.com', '$2y$10$uH6FmXfiqa6gXMAVByqTrOULSSpkOs9e.yzBaXhWXjVhTOIQ8tvjG', '1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `hasil_id` varchar(255) NOT NULL,
  `hasil_tgl` date NOT NULL,
  `hasil_user` varchar(255) NOT NULL,
  `hasil_indeks` int(11) NOT NULL,
  `hasil_kuesioner` varchar(255) NOT NULL,
  `hasil_jawaban` int(11) NOT NULL,
  `hasil_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`hasil_id`, `hasil_tgl`, `hasil_user`, `hasil_indeks`, `hasil_kuesioner`, `hasil_jawaban`, `hasil_created`) VALUES
('0014932794c594434dd9ff3c945839b8', '2023-08-20', 'UNILA', 1804661027, '81e4af281f36e9ef2a849495fd268016', 2, '2023-08-20 09:56:53'),
('0991785feca0443d6d4cec9831399870', '2023-08-23', 'UNIVERSITAS LAMPUNG', 2085294331, '788285e341d3065bbfabbd286b6e1058', 1, '2023-08-23 02:11:23'),
('11d28c41eadc5cd51980b30e9f7c46f0', '2023-08-20', 'UNILA', 1804661027, '1ccb824a23d029307b82923dcff94d24', 1, '2023-08-20 09:56:52'),
('16010ffda516763cae369dbe174c3db0', '2023-08-23', 'UNIVERSITAS LAMPUNG', 298903738, '34cd8c886b26f8ca663efa3081f4a90c', 2, '2023-08-23 02:11:16'),
('3a4160ab5364dfc0ee68b7a1522be6cc', '2023-08-20', 'UNILA', 671793577, 'ea463ee4a5a52f89882b70105b2b8957', 2, '2023-08-20 09:56:54'),
('3fa334e0a663bbb02285463aa4367195', '2023-08-20', 'UNILA', 19650646, '12bdf9120b5b34bd74a2f5f980d5a4a8', 2, '2023-08-20 09:56:55'),
('4140bea5f6e3e2b9fce26db14b505ad4', '2023-08-20', 'UNILA', 276297795, 'c99896ce7c9fc96b85c5ef5a3430eff5', 1, '2023-08-20 09:56:50'),
('4b590a8c24b7c0b4aef6a7a0ed44845c', '2023-08-20', 'UNILA', 19650646, 'f2fe5e67714a10614ae9e5fd4af5d85a', 2, '2023-08-20 09:56:56'),
('4c5f97069268e1de1306bc97b20fec90', '2023-08-20', 'UNILA', 671793577, '9711bbbba7d984e84567ba3a31c365c0', 2, '2023-08-20 09:56:54'),
('505f7203b962851bf44082ba2b2f9b04', '2023-08-20', 'UNILA', 1721289256, '5428d3a7024d09e7fbee0d6ec7e89488', 2, '2023-08-20 09:56:58'),
('55c396b92b281507e3f107a72724eb6d', '2023-08-20', 'UNILA', 19650646, '8a6214da0c81bf106bcfe6584a39c255', 2, '2023-08-20 09:56:56'),
('5732195fcb563bb4b730ca073bde9a9f', '2023-08-20', 'UNILA', 1804661027, 'd835d2b6f5b41a33a24aca8bc51f0073', 2, '2023-08-20 09:56:53'),
('5f04e9d09242d1d49f4f3029fdb3e73f', '2023-08-20', 'UNILA', 1721289256, 'c0be34087f11e51cdbe0fd5bf10d4308', 2, '2023-08-20 09:57:01'),
('6ceae7ceafe6394939a3bf4d5ba8c828', '2023-08-23', 'UNIVERSITAS LAMPUNG', 298903738, '62ea8010889af1e752e817b137ad557e', 1, '2023-08-23 02:11:14'),
('6e62945f967cf9b1697c4d495d599d92', '2023-08-23', 'UNIVERSITAS LAMPUNG', 2085294331, '795da03cf93e1338afcefa077c9b32f7', 2, '2023-08-23 02:11:22'),
('6f5d6aaa7071e84a94ef4bd87fbe3b5d', '2023-08-20', 'UNILA', 671793577, 'a695ab0bb0e52f4e662d17f63aacf006', 2, '2023-08-20 09:56:55'),
('89a0e51679a863a7111665ce67356dd8', '2023-08-23', 'UNIVERSITAS LAMPUNG', 97281488, '885a35fa804c27c230086ea80c3795dc', 1, '2023-08-23 02:11:09'),
('947f74bca6cd826c88b37d5cf0b003a1', '2023-08-20', 'UNILA', 19650646, '979cb6161901ad71dc4ad3d02a8589db', 2, '2023-08-20 09:56:58'),
('a0f4ffffd9b01b929684da3fa9976800', '2023-08-20', 'UNILA', 276297795, '4503ed3fc3211722184b70b893449df8', 1, '2023-08-20 09:56:48'),
('a46aff2de7ec32706fc2eb3ca16234bb', '2023-08-23', 'UNIVERSITAS LAMPUNG', 298903738, 'e83ef157a5b383c42c9f060037a002a9', 1, '2023-08-23 02:11:14'),
('a46dc3d051db5ac34ff9b4d12f267fa1', '2023-08-20', 'UNILA', 19650646, 'd6e3dc8c27d762c52e70ab69d4f2cef5', 2, '2023-08-20 09:56:57'),
('a7690e6f67ac61db5e3fb490a9e17174', '2023-08-20', 'UNILA', 1804661027, '131dc1bba89f3c6d5fd24b92917abd67', 1, '2023-08-20 09:56:51'),
('aea8d991c82105522a98252437b157b1', '2023-08-20', 'UNILA', 276297795, '59de427a5165f631e617219bed2f2f50', 1, '2023-08-20 09:56:50'),
('b57c166f5e5d255ebb74a7195affd865', '2023-08-20', 'UNILA', 1804661027, '129b6fad1bb6233c9f8b80c2be05669b', 1, '2023-08-20 09:56:51'),
('b954bb0809e639057849d1cd950c457f', '2023-08-20', 'UNILA', 1721289256, '8c1e4cadc3e1dd7bde8c1465e8408607', 2, '2023-08-20 09:56:59'),
('bd69f69fd4e64dd7ee6a806503f09f32', '2023-08-20', 'UNILA', 1721289256, '6cb5dcd4110b811810dd85ba75bee24c', 2, '2023-08-20 09:56:59'),
('cb83fbe6fc63c32b55ef1b3fadc772f3', '2023-08-23', 'UNIVERSITAS LAMPUNG', 298903738, 'b0127dbadbf52309517134ea5c7077f1', 1, '2023-08-23 02:11:17'),
('d0b4c3293564e57c714a023e79131095', '2023-08-23', 'UNIVERSITAS LAMPUNG', 97281488, 'e0a0d3eeac233fee8a0197375b3015b9', 3, '2023-08-23 02:11:13'),
('d6a8ad678218f1cfa28f1f19af0bfa18', '2023-08-23', 'UNIVERSITAS LAMPUNG', 97281488, '1b9163403207d5e42c854b024dd361c9', 2, '2023-08-23 02:11:11'),
('ddd76af4838e163fdd37e2760af18f24', '2023-08-23', 'UNIVERSITAS LAMPUNG', 1549227063, 'a0811baf09f84fe9cd0ed0c033726884', 2, '2023-08-23 02:11:18'),
('ee715d2eb0867a5bc98c36f2b0e98da0', '2023-08-20', 'UNILA', 276297795, 'd36e5116c2c105087ada5308122a9273', 1, '2023-08-20 09:56:49'),
('f08da1f0531c0c76b1667107a10a2916', '2023-08-20', 'UNILA', 671793577, 'aea975267dddc2c2a45eb866564e0bf5', 2, '2023-08-20 09:56:55'),
('f0c53a5d00acfe04268f4bdf172c59b3', '2023-08-20', 'UNILA', 671793577, '977091f49692316d85c9864e5691f07b', 2, '2023-08-20 09:56:54'),
('f9f692e3c5cea8d0cdfa03225f9802ef', '2023-08-20', 'UNILA', 1721289256, '7407550d6360e49b5f3a1eebd9a3247b', 2, '2023-08-20 09:57:00'),
('fd0d082ff3fc724a7370b58127236f87', '2023-08-23', 'UNIVERSITAS LAMPUNG', 1549227063, '4c3b16c1404bd392ec565895e76230cb', 1, '2023-08-23 02:11:20'),
('fe25be3a1877444a01a33869de5bd843', '2023-06-09', 'P2392H', 19650646, 'f2fe5e67714a10614ae9e5fd4af5d85a', 3, '2023-06-09 01:20:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_indeks`
--

CREATE TABLE `tb_indeks` (
  `indeks_id` int(11) NOT NULL,
  `indeks_judul` varchar(255) NOT NULL,
  `indeks_warna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_indeks`
--

INSERT INTO `tb_indeks` (`indeks_id`, `indeks_judul`, `indeks_warna`) VALUES
(97281488, 'Waktu', ''),
(298903738, 'Sarana Dan Prasarana', ''),
(1468736694, 'Sistem, Mekanisme Dan Prosedur', ''),
(1549227063, 'Kompetensi Pelaksana', ''),
(2085294331, 'Persyaratan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `jawab_id` int(11) NOT NULL,
  `jawab_jenis` varchar(255) NOT NULL,
  `jawab_emoji` text NOT NULL,
  `jawab_type_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`jawab_id`, `jawab_jenis`, `jawab_emoji`, `jawab_type_text`) VALUES
(1, 'Sangat Puas', 'bi bi-emoji-laughing', 'success'),
(2, 'Puas', 'bi bi-emoji-smile', 'primary'),
(3, 'Cukup Puas', 'bi bi-emoji-neutral', 'warning'),
(4, 'Tidak Puas', 'bi bi-emoji-angry', 'danger');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_krisar`
--

CREATE TABLE `tb_krisar` (
  `krisar_id` varchar(255) NOT NULL,
  `krisar_nama` varchar(255) DEFAULT NULL,
  `krisar_email` varchar(255) DEFAULT NULL,
  `krisar_hp` varchar(255) DEFAULT NULL,
  `krisar_isi` text DEFAULT NULL,
  `krisar_status` int(11) NOT NULL,
  `krisar_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_krisar`
--

INSERT INTO `tb_krisar` (`krisar_id`, `krisar_nama`, `krisar_email`, `krisar_hp`, `krisar_isi`, `krisar_status`, `krisar_created`) VALUES
('39e07263cf3c5a7adb3539c5cea6f181', 'Wina Fadhilah', 'wina@gmail.com', '082281429601', 'Para staf yang bertugas sangat ramah sehingga malakukan pelayanan menjadi nyaman', 0, '2023-08-23 02:37:39'),
('4df49dba359ce9ea9928e002fe423d84', 'Nur Mita Utami', 'mitautami47@gmail.com', '08776502189', 'Pelayanan sangat bagus, tempatnya nyaman dan staf sangat ramah', 1, '2023-08-23 02:34:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuesioner`
--

CREATE TABLE `tb_kuesioner` (
  `kuesioner_id` varchar(255) NOT NULL,
  `kuesioner_judul` text NOT NULL,
  `kuesioner_indeksid` int(11) NOT NULL,
  `kuesioner_next` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kuesioner`
--

INSERT INTO `tb_kuesioner` (`kuesioner_id`, `kuesioner_judul`, `kuesioner_indeksid`, `kuesioner_next`) VALUES
('1b9163403207d5e42c854b024dd361c9', 'Ketepatan waktu dalam penyelesaian permohonan atau permintaan yang Anda ajukan kepada Biro Perencanaan dan Hubungan Masyarakat', 97281488, 2),
('34cd8c886b26f8ca663efa3081f4a90c', 'Kenyamanan dan kelengkapan sarana yang digunakan dalam komunikasi dengan Biro Perencanaan dan Hubungan Masyarakat', 298903738, 6),
('4c3b16c1404bd392ec565895e76230cb', 'Respons dan solusi yang diberikan oleh staf Biro Perencanaan dan Hubungan Masyarakat dalam mengatasi masalah atau pertanyaan', 1549227063, 9),
('62ea8010889af1e752e817b137ad557e', ' Kualitas sarana dan prasarana yang disediakan oleh Biro Perencanaan dan Hubungan Masyarakat Universitas Lampung', 298903738, 4),
('788285e341d3065bbfabbd286b6e1058', ' Ketersediaan panduan atau petunjuk yang menjelaskan persyaratan yang harus dipatuhi dalam berinteraksi dengan Biro Perencanaan dan Hubungan Masyarakat', 2085294331, 11),
('795da03cf93e1338afcefa077c9b32f7', ' Kejelasan dan keterbacaan informasi mengenai persyaratan yang harus Anda penuhi sebelum mengakses layanan dari Biro Perencanaan dan Hubungan Masyarakat', 2085294331, 10),
('885a35fa804c27c230086ea80c3795dc', 'Kecepatan respon dari layanan yang diberikan oleh Biro Perencanaan dan Hubungan Masyarakat Universitas Lampung', 97281488, 1),
('a0811baf09f84fe9cd0ed0c033726884', 'Kompetensi dan keahlian para staf yang melayani di Biro Perencanaan dan Hubungan Masyarakat Universitas Lampung', 1549227063, 8),
('b0127dbadbf52309517134ea5c7077f1', ' Kejelasan dan kekompletan informasi yang diberikan mengenai langkah-langkah atau prosedur yang harus diikuti dalam menggunakan layanan dari Biro Perencanaan dan Hubungan Masyarakat', 298903738, 7),
('e0a0d3eeac233fee8a0197375b3015b9', 'Ketersediaan waktu layanan yang diberikan oleh Biro Perencanaan dan Hubungan Masyarakat dalam menjawab pertanyaan atau memberikan informasi', 97281488, 3),
('e83ef157a5b383c42c9f060037a002a9', ' Ketersediaan fasilitas yang mendukung pelayanan dari Biro Perencanaan dan Hubungan Masyarakat', 298903738, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log_akses`
--

CREATE TABLE `tb_log_akses` (
  `id_log_info` int(11) NOT NULL,
  `time_log_info` int(11) NOT NULL,
  `browser_log_info` varchar(50) NOT NULL,
  `b_version_log_info` varchar(50) NOT NULL,
  `os_log_info` varchar(50) NOT NULL,
  `ip_log_info` varchar(50) NOT NULL,
  `date_sortir` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_log_akses`
--

INSERT INTO `tb_log_akses` (`id_log_info`, `time_log_info`, `browser_log_info`, `b_version_log_info`, `os_log_info`, `ip_log_info`, `date_sortir`) VALUES
(1, 1686471508, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-11 08:18:28'),
(2, 1686489495, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-11 13:18:15'),
(3, 1686489589, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-11 13:19:49'),
(4, 1687256119, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-20 10:15:19'),
(5, 1687316542, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-21 03:02:22'),
(6, 1687415406, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-22 06:30:06'),
(7, 1688788927, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-08 04:02:07'),
(8, 1688789209, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-08 04:06:49'),
(9, 1689081449, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-11 13:17:29'),
(10, 1689694572, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-18 15:36:12'),
(11, 1689694625, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-18 15:37:05'),
(12, 1689694766, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-18 15:39:26'),
(13, 1689855906, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-20 12:25:06'),
(14, 1690169566, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-07-24 03:32:46'),
(15, 1692525406, 'Chrome', '115.0.0.0', 'Windows 10', '::1', '2023-08-20 09:56:46'),
(16, 1692756665, 'Chrome', '116.0.0.0', 'Windows 10', '::1', '2023-08-23 02:11:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `noti_id` varchar(255) NOT NULL,
  `noti_nama` varchar(255) NOT NULL,
  `noti_ket` text NOT NULL,
  `noti_status` int(11) NOT NULL,
  `noti_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`noti_id`, `noti_nama`, `noti_ket`, `noti_status`, `noti_created`) VALUES
('4f42bc5cf908238e1d2bba34fa56477f', 'Mita Utami', 'Telah mengisi kuesioner', 0, '2023-08-20 09:57:01'),
('632b9ad8a43ad5e5b9f88f2080a7d211', 'Default Value', 'Telah mengisi kuesioner', 0, '2023-08-20 09:56:17'),
('72d8f6fc67029cacaa8b29c8b32bfa22', 'Mita Utami', 'Responden baru', 0, '2023-08-20 09:56:46'),
('99dfc12d5df3a56c78e2f6f7d490c5e6', 'Wina Fadhilah', 'Telah mengisi kuesioner', 0, '2023-08-23 02:11:23'),
('9aa7eb8e9471548958373871456ca4b5', 'Wina Fadhilah', 'Responden baru', 0, '2023-08-23 02:11:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_responden`
--

CREATE TABLE `tb_responden` (
  `respo_id` varchar(255) NOT NULL,
  `respo_nama` varchar(255) NOT NULL,
  `respo_lembaga` varchar(255) NOT NULL,
  `respo_jk` varchar(255) NOT NULL,
  `respo_usia` int(11) NOT NULL,
  `respo_pekerjaan` varchar(255) NOT NULL,
  `respo_pendidikan` varchar(255) NOT NULL,
  `respo_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_responden`
--

INSERT INTO `tb_responden` (`respo_id`, `respo_nama`, `respo_lembaga`, `respo_jk`, `respo_usia`, `respo_pekerjaan`, `respo_pendidikan`, `respo_created`) VALUES
('147e0ec193412a15f641dc2b5e8d3225', 'Wina Fadhilah', 'UNIVERSITAS LAMPUNG', 'Perempuan', 22, 'Pelajar/Mahasiswa', 'SMA', '2023-08-23 02:11:05'),
('9c655dc53a455f519b7702778b26cc41', 'Mita Utami', 'UNILA', 'Perempuan', 21, 'Lainnya', 'SMP', '2023-08-20 09:56:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`hasil_id`);

--
-- Indeks untuk tabel `tb_indeks`
--
ALTER TABLE `tb_indeks`
  ADD PRIMARY KEY (`indeks_id`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`jawab_id`);

--
-- Indeks untuk tabel `tb_krisar`
--
ALTER TABLE `tb_krisar`
  ADD PRIMARY KEY (`krisar_id`);

--
-- Indeks untuk tabel `tb_kuesioner`
--
ALTER TABLE `tb_kuesioner`
  ADD PRIMARY KEY (`kuesioner_id`);

--
-- Indeks untuk tabel `tb_log_akses`
--
ALTER TABLE `tb_log_akses`
  ADD PRIMARY KEY (`id_log_info`);

--
-- Indeks untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indeks untuk tabel `tb_responden`
--
ALTER TABLE `tb_responden`
  ADD PRIMARY KEY (`respo_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `jawab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_log_akses`
--
ALTER TABLE `tb_log_akses`
  MODIFY `id_log_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
