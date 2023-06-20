-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 15.55
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikm8`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`hasil_id`, `hasil_tgl`, `hasil_user`, `hasil_indeks`, `hasil_kuesioner`, `hasil_jawaban`, `hasil_created`) VALUES
('01af67a2b51a6a39d23d758ef5703f3d', '2023-06-11', 'D9202H', 1721289256, '8c1e4cadc3e1dd7bde8c1465e8408607', 2, '2023-06-11 08:18:51'),
('05db5ab4935bbc84701b224c2b2d6e2b', '2023-06-09', 'R2380S', 19650646, '8a6214da0c81bf106bcfe6584a39c255', 1, '2023-06-09 01:20:30'),
('06bc41fc23dd87396015bb309b505fdf', '2023-06-09', 'R2380S', 671793577, 'aea975267dddc2c2a45eb866564e0bf5', 1, '2023-06-09 01:20:30'),
('12760eb5651e4f64ef0af4d73f9dfd2d', '2023-06-09', 'P2392H', 1804661027, 'd835d2b6f5b41a33a24aca8bc51f0073', 2, '2023-06-09 01:20:30'),
('14823b732c373f5097c7f473168f2872', '2023-06-09', 'R2380S', 276297795, 'c99896ce7c9fc96b85c5ef5a3430eff5', 1, '2023-06-09 01:20:30'),
('16c28a7c3e64050ff833a05460d34606', '2023-06-11', 'D9202H', 276297795, 'c99896ce7c9fc96b85c5ef5a3430eff5', 1, '2023-06-11 08:18:32'),
('1a161f5d4e5b0f5fe264fee75d77452b', '2023-06-09', 'P2392H', 671793577, 'aea975267dddc2c2a45eb866564e0bf5', 4, '2023-06-09 01:20:30'),
('1a827f5bc9cdb1800f1bcf7c381e8d0f', '2023-06-11', 'D9202H', 671793577, 'aea975267dddc2c2a45eb866564e0bf5', 2, '2023-06-11 08:18:44'),
('1b8b61d0041c348a8c3142fcb32111fc', '2023-06-09', 'P2392H', 276297795, '4503ed3fc3211722184b70b893449df8', 1, '2023-06-09 01:20:30'),
('2265cc504aac88a83a3647220296a758', '2023-06-09', 'P2392H', 671793577, '9711bbbba7d984e84567ba3a31c365c0', 2, '2023-06-09 01:20:30'),
('2b3363447749d0c7a1afdfe547416b52', '2023-06-09', 'P2392H', 276297795, 'd36e5116c2c105087ada5308122a9273', 1, '2023-06-09 01:20:30'),
('32b5bc3c3ddbb785b63128477807bb95', '2023-06-11', 'D9202H', 671793577, '977091f49692316d85c9864e5691f07b', 3, '2023-06-11 08:18:41'),
('3457d0e0e4a2c6a7ee01caf31569c62a', '2023-06-09', 'P2392H', 1804661027, '131dc1bba89f3c6d5fd24b92917abd67', 1, '2023-06-09 01:20:30'),
('39ebef49ff5db940513d6e134657ea59', '2023-06-09', 'P2392H', 19650646, '12bdf9120b5b34bd74a2f5f980d5a4a8', 3, '2023-06-09 01:20:30'),
('3a10d35548dcef4398d4f921fba1ea9a', '2023-06-11', 'D9202H', 19650646, '12bdf9120b5b34bd74a2f5f980d5a4a8', 4, '2023-06-11 08:18:45'),
('3b8500e2d2fe445792f3697948987387', '2023-06-11', 'D9202H', 19650646, 'f2fe5e67714a10614ae9e5fd4af5d85a', 3, '2023-06-11 08:18:46'),
('3c03b668e697b483e54c66ec76efff67', '2023-06-11', 'D9202H', 1721289256, 'c0be34087f11e51cdbe0fd5bf10d4308', 2, '2023-06-11 08:18:54'),
('3cf5d56aafbb37143fd17214d75af0c9', '2023-06-09', 'R2380S', 671793577, '9711bbbba7d984e84567ba3a31c365c0', 3, '2023-06-09 01:20:30'),
('40c85b18b9ba5ddc36d0777b9d77d106', '2023-06-09', 'R2380S', 671793577, 'a695ab0bb0e52f4e662d17f63aacf006', 4, '2023-06-09 01:20:30'),
('41ba1de26ee19853aae1c832f11b9e32', '2023-06-09', 'R2380S', 1804661027, '1ccb824a23d029307b82923dcff94d24', 3, '2023-06-09 01:20:30'),
('4421c0b444ed76b9228caae4725ca6b8', '2023-06-09', 'P2392H', 671793577, '977091f49692316d85c9864e5691f07b', 2, '2023-06-09 01:20:30'),
('45dcc2efadd020094b9c9dfd66126d34', '2023-06-11', 'D9202H', 1721289256, '6cb5dcd4110b811810dd85ba75bee24c', 2, '2023-06-11 08:18:52'),
('476c7d919dbba1dc9055b3ee5ae45539', '2023-06-09', 'R2380S', 1804661027, '81e4af281f36e9ef2a849495fd268016', 1, '2023-06-09 01:20:30'),
('487327f6badfa647b4d5fa8605075f13', '2023-06-09', 'R2380S', 1721289256, 'c0be34087f11e51cdbe0fd5bf10d4308', 4, '2023-06-09 01:20:30'),
('53908b85f0bfac7179e6b42b5e42faec', '2023-06-11', 'D9202H', 1721289256, '5428d3a7024d09e7fbee0d6ec7e89488', 2, '2023-06-11 08:18:50'),
('56cd84de3a47d42686515a3534d4f6c8', '2023-06-11', 'D9202H', 671793577, '9711bbbba7d984e84567ba3a31c365c0', 1, '2023-06-11 08:18:40'),
('58e7ce60d8cac9fabbb0aa33a634d893', '2023-06-09', 'R2380S', 1721289256, '8c1e4cadc3e1dd7bde8c1465e8408607', 1, '2023-06-09 01:20:30'),
('5a9ef08882affb465522f34932356af5', '2023-06-09', 'R2380S', 19650646, '12bdf9120b5b34bd74a2f5f980d5a4a8', 1, '2023-06-09 01:20:30'),
('5ce09731e75ff7a23ea4381e9a8c10b3', '2023-06-09', 'P2392H', 1804661027, '1ccb824a23d029307b82923dcff94d24', 2, '2023-06-09 01:20:30'),
('63833d9c3c23d5fcf8feab2015f02e13', '2023-06-09', 'R2380S', 671793577, '977091f49692316d85c9864e5691f07b', 3, '2023-06-09 01:20:30'),
('6527b509f6ad74998540d93b4c43b31f', '2023-06-11', 'D9202H', 276297795, '59de427a5165f631e617219bed2f2f50', 1, '2023-06-11 08:18:33'),
('6564d26ea062b98db54dd62124bcfd3b', '2023-06-11', 'D9202H', 1721289256, '7407550d6360e49b5f3a1eebd9a3247b', 2, '2023-06-11 08:18:53'),
('6cd4215033d4b51661e3291d331f30df', '2023-06-11', 'D9202H', 1804661027, 'd835d2b6f5b41a33a24aca8bc51f0073', 2, '2023-06-11 08:18:38'),
('6e9dc1606957fc9e6a2fdf0429e67b13', '2023-06-09', 'R2380S', 1804661027, '129b6fad1bb6233c9f8b80c2be05669b', 2, '2023-06-09 01:20:30'),
('75a772344afa887a5783967e0790d9ca', '2023-06-11', 'D9202H', 671793577, 'ea463ee4a5a52f89882b70105b2b8957', 1, '2023-06-11 08:18:42'),
('75fd336affb020ac5f57d942f2d84c6a', '2023-06-09', 'R2380S', 19650646, 'f2fe5e67714a10614ae9e5fd4af5d85a', 1, '2023-06-09 01:20:30'),
('767217d4fabc512b2c04c66cd9abe7b6', '2023-06-09', 'R2380S', 1721289256, '7407550d6360e49b5f3a1eebd9a3247b', 2, '2023-06-09 01:20:30'),
('7b67cc2853bf9f923a8b9cf1cef11ffa', '2023-06-09', 'R2380S', 1721289256, '5428d3a7024d09e7fbee0d6ec7e89488', 2, '2023-06-09 01:20:30'),
('7c2608cd1d99bc3afa3b2686f5338a92', '2023-06-09', 'R2380S', 19650646, '979cb6161901ad71dc4ad3d02a8589db', 3, '2023-06-09 01:20:30'),
('7f35e2003e0a0456a4efb2eb2dc5d475', '2023-06-09', 'P2392H', 1721289256, 'c0be34087f11e51cdbe0fd5bf10d4308', 4, '2023-06-09 01:20:30'),
('803e09c447d6f268560e6bdec5dcab1b', '2023-06-09', 'P2392H', 1721289256, '7407550d6360e49b5f3a1eebd9a3247b', 2, '2023-06-09 01:20:30'),
('80f45f462df5064ffec42ab89b9c1623', '2023-06-09', 'P2392H', 1804661027, '81e4af281f36e9ef2a849495fd268016', 2, '2023-06-09 01:20:30'),
('83aae97ade4c5e9a2904d0eb871e3894', '2023-06-11', 'D9202H', 1804661027, '81e4af281f36e9ef2a849495fd268016', 2, '2023-06-11 08:18:38'),
('8adfe6da3ddaf4096313721b5a01cadf', '2023-06-09', 'R2380S', 671793577, 'ea463ee4a5a52f89882b70105b2b8957', 4, '2023-06-09 01:20:30'),
('8b710577ed9dfcd8ec7f0b543fcba0ae', '2023-06-09', 'P2392H', 1721289256, '6cb5dcd4110b811810dd85ba75bee24c', 2, '2023-06-09 01:20:30'),
('947a6d8a96373848e794d9f9a5334bb2', '2023-06-09', 'R2380S', 276297795, '4503ed3fc3211722184b70b893449df8', 1, '2023-06-09 01:20:30'),
('982d4daf1509a5c2a8eff4e8d9b92538', '2023-06-09', 'P2392H', 671793577, 'ea463ee4a5a52f89882b70105b2b8957', 4, '2023-06-09 01:20:30'),
('9e9f0e7c7b919587139d5cd38ac46610', '2023-06-09', 'P2392H', 276297795, '59de427a5165f631e617219bed2f2f50', 2, '2023-06-09 01:20:30'),
('a0c479a3b32ffa5eea6b2ef9a4ea2afa', '2023-06-09', 'P2392H', 1804661027, '129b6fad1bb6233c9f8b80c2be05669b', 3, '2023-06-09 01:20:30'),
('a1ea3c1c7ce3d0552c97aad2c591689d', '2023-06-09', 'R2380S', 1804661027, '131dc1bba89f3c6d5fd24b92917abd67', 2, '2023-06-09 01:20:30'),
('a200b2bc4592a110221b6caf39d3366f', '2023-06-11', 'D9202H', 671793577, 'a695ab0bb0e52f4e662d17f63aacf006', 1, '2023-06-11 08:18:43'),
('aaa43fee06a27b4d7473f246b2cda7d6', '2023-06-11', 'D9202H', 276297795, '4503ed3fc3211722184b70b893449df8', 1, '2023-06-11 08:18:30'),
('abee290ae05118b459698864c746ac23', '2023-06-11', 'D9202H', 1804661027, '1ccb824a23d029307b82923dcff94d24', 2, '2023-06-11 08:18:37'),
('acb3d15f0a4e776024c7b9ee5408f6c0', '2023-06-09', 'P2392H', 1721289256, '5428d3a7024d09e7fbee0d6ec7e89488', 2, '2023-06-09 01:20:30'),
('b156e0170d2cc921fe0c4f3698c79ec8', '2023-06-09', 'P2392H', 19650646, 'd6e3dc8c27d762c52e70ab69d4f2cef5', 3, '2023-06-09 01:20:30'),
('b530ad34c7e9b9bbdb879afd6e33e548', '2023-06-11', 'D9202H', 1804661027, '129b6fad1bb6233c9f8b80c2be05669b', 2, '2023-06-11 08:18:34'),
('ba71e052b5ee092862a89348dfa3b858', '2023-06-09', 'R2380S', 276297795, 'd36e5116c2c105087ada5308122a9273', 2, '2023-06-09 01:20:30'),
('c3ae89853cc0ccb2e49c76dbd217f44e', '2023-06-09', 'P2392H', 671793577, 'a695ab0bb0e52f4e662d17f63aacf006', 4, '2023-06-09 01:20:30'),
('c57541b7060e587a2927d24330c871d4', '2023-06-09', 'R2380S', 276297795, '59de427a5165f631e617219bed2f2f50', 2, '2023-06-09 01:20:30'),
('c9944b97f0039a8db0e9e45793d707ef', '2023-06-09', 'P2392H', 276297795, 'c99896ce7c9fc96b85c5ef5a3430eff5', 1, '2023-06-09 01:20:30'),
('da973d52ba717ee129f8622ebc42caa9', '2023-06-11', 'D9202H', 1804661027, '131dc1bba89f3c6d5fd24b92917abd67', 1, '2023-06-11 08:18:35'),
('dcc6bee1eb59d04e68b71afa128a246a', '2023-06-09', 'R2380S', 1721289256, '6cb5dcd4110b811810dd85ba75bee24c', 2, '2023-06-09 01:20:30'),
('dd72446b77f137043c74154d3fe3e683', '2023-06-09', 'P2392H', 19650646, '979cb6161901ad71dc4ad3d02a8589db', 2, '2023-06-09 01:20:30'),
('e1c65d31ce9830dcbbe5e7e25de395e6', '2023-06-09', 'P2392H', 1721289256, '8c1e4cadc3e1dd7bde8c1465e8408607', 2, '2023-06-09 01:20:30'),
('e39382fb2ba740e6e65da0bb19f21672', '2023-06-09', 'P2392H', 19650646, '8a6214da0c81bf106bcfe6584a39c255', 3, '2023-06-09 01:20:30'),
('e83157b8a634080e2c1f6b1a64b1ee70', '2023-06-11', 'D9202H', 19650646, 'd6e3dc8c27d762c52e70ab69d4f2cef5', 1, '2023-06-11 08:18:48'),
('e89b08237c684c2f4e273d8b884013f1', '2023-06-09', 'R2380S', 1804661027, 'd835d2b6f5b41a33a24aca8bc51f0073', 1, '2023-06-09 01:20:30'),
('ebc1bc7fcffe30a3a172baaa3ab4a81e', '2023-06-11', 'D9202H', 276297795, 'd36e5116c2c105087ada5308122a9273', 1, '2023-06-11 08:18:31'),
('f98fc8072c7f032b5934798586666a87', '2023-06-09', 'R2380S', 19650646, 'd6e3dc8c27d762c52e70ab69d4f2cef5', 3, '2023-06-09 01:20:30'),
('fb92526f2e0b418fa8d61d472898dc21', '2023-06-11', 'D9202H', 19650646, '8a6214da0c81bf106bcfe6584a39c255', 3, '2023-06-11 08:18:47'),
('fe24ff9165dab60d65fb5135dac152b7', '2023-06-11', 'D9202H', 19650646, '979cb6161901ad71dc4ad3d02a8589db', 4, '2023-06-11 08:18:49'),
('fe25be3a1877444a01a33869de5bd843', '2023-06-09', 'P2392H', 19650646, 'f2fe5e67714a10614ae9e5fd4af5d85a', 3, '2023-06-09 01:20:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_indeks`
--

CREATE TABLE `tb_indeks` (
  `indeks_id` int(11) NOT NULL,
  `indeks_judul` varchar(255) NOT NULL,
  `indeks_warna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_indeks`
--

INSERT INTO `tb_indeks` (`indeks_id`, `indeks_judul`, `indeks_warna`) VALUES
(19650646, 'Assurance (Jaminan)', ''),
(276297795, 'Tangible (Bukti Fisik)', ''),
(671793577, 'Responsiveness (Daya Tanggap)', ''),
(1721289256, 'Emphaty (Empati)', ''),
(1804661027, 'Reliability (Keandalan)', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `jawab_id` int(11) NOT NULL,
  `jawab_jenis` varchar(255) NOT NULL,
  `jawab_emoji` text NOT NULL,
  `jawab_type_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`jawab_id`, `jawab_jenis`, `jawab_emoji`, `jawab_type_text`) VALUES
(1, 'Sangat Memuaskan', 'bi bi-emoji-heart-eyes-fill', 'success'),
(2, 'Memuaskan', 'bi bi-emoji-smile-fill', 'primary'),
(3, 'Cukup Memuaskan', 'bi bi-emoji-neutral-fill', 'warning'),
(4, 'Tidak Memuaskan', 'bi bi-emoji-angry-fill', 'danger');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuesioner`
--

CREATE TABLE `tb_kuesioner` (
  `kuesioner_id` varchar(255) NOT NULL,
  `kuesioner_judul` text NOT NULL,
  `kuesioner_indeksid` int(11) NOT NULL,
  `kuesioner_next` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kuesioner`
--

INSERT INTO `tb_kuesioner` (`kuesioner_id`, `kuesioner_judul`, `kuesioner_indeksid`, `kuesioner_next`) VALUES
('129b6fad1bb6233c9f8b80c2be05669b', 'Pelaksanaan Jam Kerja Dilakukan Tepat Waktu.', 1804661027, 5),
('12bdf9120b5b34bd74a2f5f980d5a4a8', 'Petugas SAMSAT menguasai peraturan Pajak Kendaraan Bermotor.', 19650646, 15),
('131dc1bba89f3c6d5fd24b92917abd67', 'Petugas SAMSAT mampu memberikan pelayanan dengan cepat.', 1804661027, 6),
('1ccb824a23d029307b82923dcff94d24', 'Petugas SAMSAT mampu memberikan pelayanan dengan tepat.', 1804661027, 7),
('4503ed3fc3211722184b70b893449df8', 'Letak/lokasi SAMSAT Yang Strategis.', 276297795, 1),
('5428d3a7024d09e7fbee0d6ec7e89488', 'Petugas SAMSAT memberikan perhatian terhadap masalah yang berkaitan dengan Pajak Kendaraan Bermotor', 1721289256, 20),
('59de427a5165f631e617219bed2f2f50', 'Kerapihan Penampilan Petugas SAMSAT.', 276297795, 4),
('6cb5dcd4110b811810dd85ba75bee24c', 'Petugas SAMSAT memberikan kemudahan dalam pelayanan.', 1721289256, 22),
('7407550d6360e49b5f3a1eebd9a3247b', 'Petugas SAMSAT selalu bersikap simpatik dalam memberikan pelayanan.', 1721289256, 23),
('81e4af281f36e9ef2a849495fd268016', 'Kemudahan untuk memperoleh penjelasan tentang hal-hal yang belum jelas berkaitan dengan Pajak Kendaraan Bermotor.', 1804661027, 9),
('8a6214da0c81bf106bcfe6584a39c255', 'Petugas SAMSAT menjaga kerahasiaan data Wajib Pajak.', 19650646, 17),
('8c1e4cadc3e1dd7bde8c1465e8408607', 'Petugas SAMSAT memberikan waktu untuk menyelesaikan masalah yang berkaitan dengan Pajak Kendaraan Bermotor.', 1721289256, 21),
('9711bbbba7d984e84567ba3a31c365c0', 'Kesediaan petugas SAMSAT untuk menjawab pertanyaan mengenai Pajak Kendaraan Bermotor', 671793577, 10),
('977091f49692316d85c9864e5691f07b', 'Petugas SAMSAT mampu menyelesaikan setiap masalah dengan cepat.', 671793577, 11),
('979cb6161901ad71dc4ad3d02a8589db', 'Petugas SAMSAT terampil dalam memberikan pelayanan.', 19650646, 19),
('a695ab0bb0e52f4e662d17f63aacf006', 'Petugas SAMSAT mampu menjelaskan prosedur pembayaran Pajak Kendaraan Bermotor', 671793577, 13),
('aea975267dddc2c2a45eb866564e0bf5', 'Petugas SAMSAT selalu siap sedia membantu Wajib Pajak.', 671793577, 14),
('c0be34087f11e51cdbe0fd5bf10d4308', 'Petugas SAMSAT berusaha memberikan pelayanan yang terbaik.', 1721289256, 24),
('c99896ce7c9fc96b85c5ef5a3430eff5', 'Tersedia Tempat Parkir Yang Memadai.', 276297795, 3),
('d36e5116c2c105087ada5308122a9273', 'Tersedia Ruang Tunggu Yang Nyaman.', 276297795, 2),
('d6e3dc8c27d762c52e70ab69d4f2cef5', 'Petugas SAMSAT ramah dalam memberikan pelayanan', 19650646, 18),
('d835d2b6f5b41a33a24aca8bc51f0073', 'Petugas SAMSAT bertanggung jawab atas tugasnya', 1804661027, 8),
('ea463ee4a5a52f89882b70105b2b8957', 'Petugas SAMSAT mampu menyelesaikan setiap masalah dengan tepat.', 671793577, 12),
('f2fe5e67714a10614ae9e5fd4af5d85a', 'Petugas SAMSAT mampu melakukan komunikasi yang efektif.', 19650646, 16);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_log_akses`
--

INSERT INTO `tb_log_akses` (`id_log_info`, `time_log_info`, `browser_log_info`, `b_version_log_info`, `os_log_info`, `ip_log_info`, `date_sortir`) VALUES
(1, 1686471508, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-11 08:18:28'),
(2, 1686489495, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-11 13:18:15'),
(3, 1686489589, 'Chrome', '114.0.0.0', 'Windows 10', '::1', '2023-06-11 13:19:49');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`noti_id`, `noti_nama`, `noti_ket`, `noti_status`, `noti_created`) VALUES
('0ea4e2d604d64c8c458208e365831468', 'Sarmin', 'Responden baru', 0, '2023-06-11 13:18:15'),
('14f78269ebbbca044b172436c1b0b5a1', 'Sarmin', 'Telah mengisi kuesioner', 0, '2023-06-11 13:18:45'),
('499ea221e3e1bec749cfeb3e1e1af685', 'Maverick', 'Responden baru', 0, '2023-06-11 08:18:28'),
('662e53b72d426621be14aab54c03a63d', 'Lia', 'Telah mengisi kuesioner', 0, '2023-06-11 13:20:16'),
('7d6222c83cc823805114440e6a5bb7b1', 'Maverick', 'Telah mengisi kuesioner', 0, '2023-06-11 08:18:54'),
('fd1c82bef4cc5a8ab3ecba0831fd4eb4', 'Lia', 'Responden baru', 0, '2023-06-11 13:19:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_responden`
--

CREATE TABLE `tb_responden` (
  `respo_id` varchar(255) NOT NULL,
  `respo_nama` varchar(255) NOT NULL,
  `respo_nopol` varchar(255) NOT NULL,
  `respo_jk` varchar(255) NOT NULL,
  `respo_usia` int(11) NOT NULL,
  `respo_pekerjaan` varchar(255) NOT NULL,
  `respo_pendidikan` varchar(255) NOT NULL,
  `respo_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_responden`
--

INSERT INTO `tb_responden` (`respo_id`, `respo_nama`, `respo_nopol`, `respo_jk`, `respo_usia`, `respo_pekerjaan`, `respo_pendidikan`, `respo_created`) VALUES
('b42d37b25851af105f347ab43391502e', 'Sarmin', 'R2380S', 'Laki-Laki', 30, 'Buruh', 'SMA', '2023-06-11 13:18:15'),
('c1b9ab64095de3f2f62ed0cff381b086', 'Lia', 'P2392H', 'Perempuan', 19, 'Polisi', 'SMA', '2023-06-11 13:19:49'),
('ced7f5814f0f79a03c01ea8ee3180d87', 'Maverick', 'D9202H', 'Laki-Laki', 50, 'Guru', 'D3', '2023-06-11 08:18:28');

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
  MODIFY `id_log_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
