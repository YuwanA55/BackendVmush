-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2025 at 04:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backendvmush`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akun_user`
--

CREATE TABLE `akun_user` (
  `username` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pwasli` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gambar` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nohp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_create` datetime DEFAULT NULL,
  `status_akun` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`username`, `nama`, `email`, `password`, `pwasli`, `status`, `gambar`, `alamat`, `nohp`, `tanggal_create`, `status_akun`) VALUES
('adit', 'adit anj', 'adir@gmail.com', '$2y$12$o.tuhFkY1yjheP5Tg.6LvuWKxyDZu8qRpbjoA6gcvz1MASTinjnEG', 'adit1243', 'User', 'http://127.0.0.1:8000/GambarProfile/20250520_682c5f791eeac.jpg', 'Bondowoso, jalan blindungan', '089697752475', '2025-05-20 17:53:00', 'Aktif'),
('adminvmush', 'adminvmush', 'adminvmush@gmail.com', '$2y$12$.IL0IhxBHRQq71w3SlcLE.2dcfTtpu3V2wE2C1wlLhSK.bwWeLKCy', 'adminvmush123', 'Admin', 'http://127.0.0.1:8000/GambarProfile/20250512_6821a16913a80.jpg', 'Bondowoso', '085607843865', '2025-05-12 14:20:00', 'Aktif'),
('alpant', 'alfandy', 'alpanth@gmail.com', '$2y$12$WkJtwjeYHNUeH3pVbKfrKOy2CBGEAupEqEwQBjHKJEvb16SfAz2RC', '', 'User', 'http://127.0.0.1:8000/GambarProfile/20250418_6802d7a186280.jpg', 'Jlan grujugan Rt 25 rw 26', '01823123123', '2025-04-19 05:50:00', 'Aktif'),
('Danapay', 'Dana', 'Danayu@gmail.com', 'dana123', '', 'User', 'http://127.0.0.1:8000/GambarProfile/20250413_67fb66b8f23ea.jpeg', 'Kademangan', '085555555555', '2025-04-13 07:24:40', 'Aktif'),
('nico', 'nicosibon', 'reyhanzaynuri3@gmail.com', '$2y$12$fgV0GPzQnJEeCTWBxmpxN.wzYHQVOgHlYG5pFisrmoKHn1P2VxsZG', '123', 'User', 'http://127.0.0.1:8000/GambarProfile/20250522_682e8fb9a26de.jpg', 'Situbondo, Banyuhitam', '081232080123', '2025-05-22 09:40:00', 'Aktif'),
('ppyuwan', 'ppyuwan', 'ppyuwan@gmail.com', '$2y$12$Zc9hYzSST2U3kBhJnMFZc.qsTNfD3ufOue34asOiRxv76NfhyuoSG', 'ppyuwan123', 'User', 'https://i.pinimg.com/736x/38/7d/b3/387db37845cded1e9a0d939a992cf0a4.jpg', 'Bondowoso, jalan blindungan', '0891231232131', '2025-05-19 20:45:00', 'Aktif'),
('Ragielpay', 'Ragiel', 'Ragiel123@gmail.com', 'Ragiel123', '', 'User', 'http://127.0.0.1:8000/GambarProfile/20250413_67fb6e2b8272f.jpeg', 'Kademangan', '085555555555', '2025-04-13 07:56:27', 'Aktif'),
('tengkulak1', 'tengkulak', 'tengkulak1@gmail.com', '$2y$12$w5Bh6AXvI1J2z2owaIMk5OVkqsTX6/U9fjD1s6mVr4zbaMnn8y1D6', 'tengkulak123', 'Tengkulak', 'https://i.pinimg.com/736x/4e/38/e7/4e38e73208c8a9c2410e4f1d9cb90ee5.jpg', 'Bondowoso, jalan blindungan', '089934343434', '2025-05-25 16:37:00', 'Aktif'),
('Useryuwan1', 'yuwantengku', 'tengkulak1@gmail.com', '$2y$12$STVlulZkA7M4fiZq2gMqUO.mgoYZRZv9XVGvxEO6Rf7yx9drPE.Y.', 'Useryuwan1', 'Tengkulak', NULL, 'jln diponegoro', '0832423428734', '2025-06-01 12:43:00', 'Aktif'),
('Yuwanpay', 'Yuwandana', 'yuwam147@gmail.com', 'yuwan147', '', 'Admin', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCFztnylePldHuz27yD5LrVHy8tA66JV7a7g&s', 'KOTAKULON', '085607843865', '2025-04-09 21:51:04', 'Aktif'),
('yuwantes', 'yuwandanaa', 'yuwandanaa@gmail.com', '$2y$12$E6HNC0b032HQsfqv0OwAwOM3QE8/Wppd0yiuKiJ/NPE3SkrhAVTwi', 'yuwantes123', 'User', 'https://i.pinimg.com/736x/38/7d/b3/387db37845cded1e9a0d939a992cf0a4.jpg', 'Bondowoso', '089932323', '2025-05-12 15:41:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `norek` varchar(200) DEFAULT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama`, `bank`, `norek`, `tanggal_create`) VALUES
(1, 'Yuwandana', 'BANK SEABANK', '0855888899991234', '2025-05-17 20:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `firebase`
--

CREATE TABLE `firebase` (
  `id` varchar(20) NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Link` varchar(200) NOT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `firebase`
--

INSERT INTO `firebase` (`id`, `username`, `Link`, `tanggal_create`) VALUES
('FRB0001', 'alpant', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-04-10 13:01:00'),
('FRB0002', 'Ragielpay', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-04-19 11:08:00'),
('FRB0003', 'alpant', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-04-19 04:21:51'),
('FRB0004', 'yuwantes', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-05-28 23:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jumlah_sensor` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kontrol_app` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `support` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `analisisdata` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `konsultasi` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gambar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `jumlah_sensor`, `kontrol_app`, `support`, `analisisdata`, `konsultasi`, `gambar`) VALUES
('PKT0001', 'Paket Rakyat', '199', '1 Sensor Kelembaban', 'Kontrol basic via App', 'Support 8/5', NULL, NULL, ''),
('PKT0002', 'Paket Raden', '399', '3 Sensor Kelembaban', 'Kontrol premium via App', 'Support 24/7', 'Analisis data basic', NULL, NULL),
('PKT0003', 'Paket Sultan', '599', '5 Sensor Kelembaban', 'Kontrol ultimate via App', 'Support 24/7', 'Analisis data advanced', 'Konsultasi Expert', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(20) NOT NULL,
  `id_paket` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_paket`, `username`, `status`, `tanggal`) VALUES
('PBL0001', 'PKT0001', 'alpant', NULL, '2025-04-14 23:20:30'),
('PBL0002', 'PKT0001', 'Ragielpay', '', '2025-04-19 05:24:34'),
('PBL0003', 'PKT0001', 'Ragielpay', '', '2025-04-19 05:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_penjadwalan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `sub_keterangan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `username`, `tanggal`, `keterangan`, `sub_keterangan`) VALUES
('JDW0001', 'Danapay', '2025-05-22', 'Peniyraman', 'pupuk berkualitas pkn'),
('JDW0002', 'alpant', '2025-05-12', 'Pemupukan', 'pakailah pupuk yang berkualitas');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_sewa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_paket` varchar(20) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `gambar_sewa` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_pembelian` datetime DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_sewa` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_sewa` varchar(150) DEFAULT NULL,
  `tanggal_akhir` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_sewa`, `id_paket`, `username`, `gambar_sewa`, `tanggal_pembelian`, `keterangan`, `status_sewa`, `tanggal_sewa`, `tanggal_akhir`) VALUES
('SW0001', 'PKT0003', 'ppyuwan', 'http://127.0.0.1:8000/GambarProfile/20250520_682c00cac08a5.jpg', '2025-05-20 11:09:00', 'penyewa yuwandana', 'Pending', NULL, NULL),
('SW0002', 'PKT0002', 'adit', 'http://127.0.0.1:8000/GambarProfile/20250520_682c5ff2ca1b2.png', '2025-05-20 17:56:00', 'AN. Adit', 'Pending', NULL, NULL),
('SW0003', 'PKT0003', 'nico', 'http://127.0.0.1:8000/GambarPembayaran/20250522_682e8ff5479dd.png', '2025-05-22 09:45:00', NULL, 'Berhasil', '2025-05-22', '2025-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_stok`
--

CREATE TABLE `permintaan_stok` (
  `id_stok` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jumlah_stok` varchar(25) DEFAULT NULL,
  `alamat_permintaan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status_permintaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_permintaan` datetime DEFAULT NULL,
  `dibutuhkan` date DEFAULT NULL,
  `user` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `permintaan_stok`
--

INSERT INTO `permintaan_stok` (`id_stok`, `username`, `jumlah_stok`, `alamat_permintaan`, `status_permintaan`, `tanggal_permintaan`, `dibutuhkan`, `user`) VALUES
('STK0001', 'tengkulak1', '12321', 'jalan blindungan', 'Tersedia', '2025-05-25 18:06:00', '2025-06-02', ''),
('STK0002', 'tengkulak1', '12', 'jalan Kotakulon', 'Selesai', '2025-05-31 00:12:59', '2025-06-01', 'yuwantes'),
('STK0003', 'Useryuwan1', '99', 'dasdadsasd', 'Pending', '2025-06-01 14:00:00', '2025-06-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `tengkulak`
--

CREATE TABLE `tengkulak` (
  `usertengku` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(250) NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pwasli` varchar(150) NOT NULL,
  `alamat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nohp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tengkulak`
--

INSERT INTO `tengkulak` (`usertengku`, `nama`, `password`, `pwasli`, `alamat`, `nohp`, `status`, `gambar`, `tanggal_create`) VALUES
('tengkuyuwan', 'tengkuyuwan', 'tengkuyuwan123', '0', 'bondowoso', '085555555555', '', 'https://i.pinimg.com/736x/01/f1/14/01f1146ad2c3b46b3e55349137c083fd.jpg', '2025-05-21 01:32:57'),
('yuwanpay', 'yuwannpay', '$2y$12$NfE/8Ww2zVhVIzvhGtQ8l.0DKSHRC85Bu6xnbBHpONYLkiMvy00FC', 'yuwannpay', 'Bondowosoo', '0899234234324', 'Tengkulak', 'http://127.0.0.1:8000/GambarProfile/20250521_682e0bf9e194b.png', '2025-05-21 17:23:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `firebase`
--
ALTER TABLE `firebase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hub_link_user` (`username`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hub_Pembelian_user` (`username`),
  ADD KEY `hub_paket` (`id_paket`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD KEY `hub _user` (`username`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `permintaan_stok`
--
ALTER TABLE `permintaan_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `hub _tengku` (`username`);

--
-- Indexes for table `tengkulak`
--
ALTER TABLE `tengkulak`
  ADD PRIMARY KEY (`usertengku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `firebase`
--
ALTER TABLE `firebase`
  ADD CONSTRAINT `hub_link_user` FOREIGN KEY (`username`) REFERENCES `akun_user` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `hub_paket` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `hub_Pembelian_user` FOREIGN KEY (`username`) REFERENCES `akun_user` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `hub _user` FOREIGN KEY (`username`) REFERENCES `akun_user` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
