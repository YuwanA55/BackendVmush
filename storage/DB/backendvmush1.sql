-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2025 at 03:22 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akun_user`
--

CREATE TABLE `akun_user` (
  `username` varchar(10) CHARACTER SET NOT NULL,
  `nama` varchar(150) CHARACTER SET DEFAULT NULL,
  `email` varchar(150) CHARACTER SET NOT NULL,
  `password` varchar(150) CHARACTER SET DEFAULT NULL,
  `pwasli` varchar(150) CHARACTER SET DEFAULT NULL,
  `status` varchar(10) CHARACTER SET DEFAULT NULL,
  `gambar` varchar(150) CHARACTER SET DEFAULT NULL,
  `alamat` varchar(150) CHARACTER SET DEFAULT NULL,
  `nohp` varchar(15) CHARACTER SET DEFAULT NULL,
  `tanggal_create` datetime DEFAULT NULL,
  `status_akun` varchar(20) CHARACTER SET DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_user`
--

INSERT INTO `akun_user` (`username`, `nama`, `email`, `password`, `pwasli`, `status`, `gambar`, `alamat`, `nohp`, `tanggal_create`, `status_akun`) VALUES
('adminvmush', 'adminvmush', 'adminvmush@gmail.com', '$2y$12$.IL0IhxBHRQq71w3SlcLE.2dcfTtpu3V2wE2C1wlLhSK.bwWeLKCy', 'adminvmush123', 'Admin', 'http://127.0.0.1:8000/GambarProfile/20250512_6821a16913a80.jpg', 'Bondowoso', '085607843865', '2025-05-12 14:20:00', 'Aktif'),
('alpant', 'alfandy', 'alpanth@gmail.com', '$2y$12$WkJtwjeYHNUeH3pVbKfrKOy2CBGEAupEqEwQBjHKJEvb16SfAz2RC', '', 'User', 'http://127.0.0.1:8000/GambarProfile/20250418_6802d7a186280.jpg', 'Jlan grujugan Rt 25 rw 26', '01823123123', '2025-04-19 05:50:00', 'Aktif'),
('Danapay', 'Dana', 'Danayu@gmail.com', 'dana123', '', 'User', 'http://127.0.0.1:8000/GambarProfile/20250413_67fb66b8f23ea.jpeg', 'Kademangan', '085555555555', '2025-04-13 07:24:40', 'Aktif'),
('Ragielpay', 'Ragiel', 'Ragiel123@gmail.com', 'Ragiel123', '', 'User', 'http://127.0.0.1:8000/GambarProfile/20250413_67fb6e2b8272f.jpeg', 'Kademangan', '085555555555', '2025-04-13 07:56:27', 'Aktif'),
('Yuwanpay', 'Yuwandana', 'yuwam147@gmail.com', 'yuwan147', '', 'Admin', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCFztnylePldHuz27yD5LrVHy8tA66JV7a7g&s', 'KOTAKULON', '085607843865', '2025-04-09 21:51:04', 'Aktif'),
('yuwantes', 'yuwandanaa', 'yuwandanaa@gmail.com', '$2y$12$E6HNC0b032HQsfqv0OwAwOM3QE8/Wppd0yiuKiJ/NPE3SkrhAVTwi', 'yuwantes123', 'User', NULL, 'Bondowoso', '089932323', '2025-05-12 15:41:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `norek` varchar(200) DEFAULT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `nama`, `bank`, `norek`, `tanggal_create`) VALUES
(1, 'Yuwandana', 'BANK SEABANK', '0855888899991234', '2025-05-17 20:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `firebase`
--

CREATE TABLE `firebase` (
  `id` varchar(20) NOT NULL,
  `username` varchar(200) CHARACTER SET NOT NULL,
  `Link` varchar(200) NOT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `firebase`
--

INSERT INTO `firebase` (`id`, `username`, `Link`, `tanggal_create`) VALUES
('FRB0001', 'alpant', 'https://www.youtube.com/watch?v=2STQ7jPN0v0&t=440s', '2025-04-10 13:01:00'),
('FRB0002', 'Ragielpay', 'https://www.youtube.com/watch?v=9KPIM-tZvEc', '2025-04-19 11:08:00'),
('FRB0003', 'alpant', 'https://www.youtube.com/watch?v=mt9yKzEF0no', '2025-04-19 04:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(150) CHARACTER SET DEFAULT NULL,
  `harga` varchar(150) CHARACTER SET DEFAULT NULL,
  `jumlah_sensor` varchar(150) CHARACTER SET DEFAULT NULL,
  `kontrol_app` varchar(150) CHARACTER SET DEFAULT NULL,
  `support` varchar(150) CHARACTER SET DEFAULT NULL,
  `analisisdata` varchar(150) CHARACTER SET DEFAULT NULL,
  `konsultasi` varchar(150) CHARACTER SET DEFAULT NULL,
  `gambar` varchar(250) CHARACTER SET DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `jumlah_sensor`, `kontrol_app`, `support`, `analisisdata`, `konsultasi`, `gambar`) VALUES
('PKT0001', 'Paket Rakyat', '199', '1', 'Kontrol basic via App', 'Support 8/5', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(20) NOT NULL,
  `id_paket` varchar(20) CHARACTER SET DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id_penjadwalan` varchar(20) CHARACTER SET NOT NULL,
  `username` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `sub_keterangan` varchar(250) CHARACTER SET NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `username`, `tanggal`, `keterangan`, `sub_keterangan`) VALUES
('JDW0001', 'Danapay', '2025-05-22', 'Peniyraman', 'pupuk berkualitas pkn'),
('JDW0002', 'alpant', '2025-05-12', 'Pemupukan', 'pakailah pupuk yang berkualitas');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_stok`
--

CREATE TABLE `permintaan_stok` (
  `id_stok` varchar(10) CHARACTER SET DEFAULT NULL,
  `id_tengkulak` varchar(10) CHARACTER SET DEFAULT NULL,
  `jumlah_stok` varchar(10) CHARACTER SET DEFAULT NULL,
  `status` varchar(20) CHARACTER SET DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tengkulak`
--

CREATE TABLE `tengkulak` (
  `id_tengku` varchar(10) CHARACTER SET DEFAULT NULL,
  `username` varchar(150) CHARACTER SET DEFAULT NULL,
  `nama` varchar(250) NOT NULL,
  `password` varchar(150) CHARACTER SET DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET DEFAULT NULL,
  `nohp` varchar(20) CHARACTER SET DEFAULT NULL,
  `gambar` varchar(250) NOT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
