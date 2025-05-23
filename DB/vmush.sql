-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 23 Bulan Mei 2025 pada 04.58
-- Versi server: 8.0.36-28
-- Versi PHP: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vmush`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_user`
--

CREATE TABLE `akun_user` (
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
-- Dumping data untuk tabel `akun_user`
--

INSERT INTO `akun_user` (`username`, `nama`, `email`, `password`, `pwasli`, `status`, `gambar`, `alamat`, `nohp`, `tanggal_create`, `status_akun`) VALUES
('adminvmush', 'adminvmush', 'adminvmush@gmail.com', '$2y$12$.IL0IhxBHRQq71w3SlcLE.2dcfTtpu3V2wE2C1wlLhSK.bwWeLKCy', 'adminvmush123', 'Admin', 'https://vmush.site/GambarProfile/20250512_6821a16913a80.jpg', 'Bondowoso', '085607843865', '2025-05-12 14:20:00', 'Aktif'),
('alpant', 'alfandy', 'alpanth@gmail.com', '$2y$12$WkJtwjeYHNUeH3pVbKfrKOy2CBGEAupEqEwQBjHKJEvb16SfAz2RC', 'alpant123', 'User', 'https://vmush.site/GambarProfile/20250418_6802d7a186280.jpg', 'Jlan grujugan Rt 25 rw 26', '01823123123', '2025-04-19 05:50:00', 'Aktif'),
('Danapay', 'Dana', 'Danayu@gmail.com', 'dana123', 'dana123', 'User', 'https://vmush.site/GambarProfile/20250413_67fb66b8f23ea.jpeg', 'Kademangan', '085555555555', '2025-04-13 07:24:40', 'Aktif'),
('jamur', 'jamurenak', 'alfandyputra05@gmail.com', '$2y$12$FIGyMZRveVhsPyTA7yWOS.FwrAQ.b9arr/ZLffeu2m0dm8LQhn7aG', 'jamur123', 'Admin', 'https://vmush.site/GambarProfile/20250518_682984af8f933.png', 'Bondowoso', '89858487766', '2025-05-18 13:53:00', 'Aktif'),
('ketua cacing', 'aditya', 'Ragiel@gmail.com', '$2y$12$NJwuu1n5.7UhnloZ09/Fn.Cef0qxmyc/3KLJ7omftnNq5LTkbQTym', 'Ragiel123', 'User', 'https://i.pinimg.com/736x/bf/d9/56/bfd9563b5a7277df5ca476b4e90a06cb.jpg', 'Kademangan', '085555555555', '2025-05-18 04:05:44', 'Aktif'),
('ragiel123', 'Ragiel Faqih', 'ragiel77789@gmail.com', '$2y$12$pE5V0OSHM/iY0tpq/PKTuuH.p/H.md66m96OgWoNAj935xJHmKWBW', 'ragiel123', 'User', 'https://vmush.site/GambarProfile/20250521_682d48eb92f6b.png', 'blindungan', '08128282828', '2025-05-21 10:29:00', 'Aktif'),
('Ragielpay', 'Ragiel', 'Ragiel123@gmail.com', 'Ragiel123', 'Ragiel123', 'User', 'https://vmush.site/GambarProfile/20250413_67fb6e2b8272f.jpeg', 'Kademangan', '085555555555', '2025-04-13 07:56:27', 'Aktif'),
('yuwantes', 'yuwandanaa', 'yuwandanaa@gmail.com', '$2y$12$E6HNC0b032HQsfqv0OwAwOM3QE8/Wppd0yiuKiJ/NPE3SkrhAVTwi', 'yuwantes123', 'User', 'https://i.pinimg.com/736x/bf/d9/56/bfd9563b5a7277df5ca476b4e90a06cb.jpg', 'Bondowoso', '089932323', '2025-05-12 15:41:00', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `norek` varchar(200) DEFAULT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama`, `bank`, `norek`, `tanggal_create`) VALUES
(1, 'Yuwandana', 'BANK SEABANK', '0855888899991234', '2025-05-17 20:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `firebase`
--

CREATE TABLE `firebase` (
  `id` varchar(20) NOT NULL,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Link` varchar(200) NOT NULL,
  `tanggal_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `firebase`
--

INSERT INTO `firebase` (`id`, `username`, `Link`, `tanggal_create`) VALUES
('FRB0001', 'alpant', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-04-10 13:01:00'),
('FRB0002', 'Ragielpay', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-04-19 11:08:00'),
('FRB0003', 'alpant', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-04-19 04:21:51'),
('FRB0004', 'ketua cacing', 'https://testsuhu-845a0-default-rtdb.firebaseio.com/sensorData.json', '2025-05-18 04:14:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
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
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `jumlah_sensor`, `kontrol_app`, `support`, `analisisdata`, `konsultasi`, `gambar`) VALUES
('PKT0001', 'Paket Rakyat', '199', '1 Sensor Kelembaban', 'Kontrol basic via App', 'Support 8/5', NULL, NULL, ''),
('PKT0002', 'Paket Raden', '399', '3 Sensor Kelembaban', 'Kontrol premium via App', 'Support 24/7', 'Analisis data basic', NULL, NULL),
('PKT0003', 'Paket Sultan', '599', '5 Sensor Kelembaban', 'Kontrol ultimate via App', 'Support 24/7', 'Analisis data advanced', 'Konsultasi Expert', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(20) NOT NULL,
  `id_paket` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_penjadwalan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `sub_keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `username`, `tanggal`, `keterangan`, `sub_keterangan`) VALUES
('JDW0002', 'alpant', '2025-05-12', 'Pemupukan', 'pakailah pupuk yang berkualitas'),
('JDW0003', 'alpant', '2025-05-12', 'Pemupukan', 'pakailah pupuk yang berkualitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_stok`
--

CREATE TABLE `permintaan_stok` (
  `id_stok` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usertengku` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jumlah_stok` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `permintaan_stok`
--

INSERT INTO `permintaan_stok` (`id_stok`, `usertengku`, `jumlah_stok`, `status`, `tanggal`) VALUES
('STK0001', 'yuwanpay', '12', 'Pending', '2025-05-22 00:23:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tengkulak`
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
-- Dumping data untuk tabel `tengkulak`
--

INSERT INTO `tengkulak` (`usertengku`, `nama`, `password`, `pwasli`, `alamat`, `nohp`, `status`, `gambar`, `tanggal_create`) VALUES
('tengkuyuwan', 'tengkuyuwan', 'tengkuyuwan123', '0', 'bondowoso', '085555555555', '', 'https://i.pinimg.com/736x/01/f1/14/01f1146ad2c3b46b3e55349137c083fd.jpg', '2025-05-21 01:32:57'),
('yuwanpay', 'yuwannpay', '$2y$12$NfE/8Ww2zVhVIzvhGtQ8l.0DKSHRC85Bu6xnbBHpONYLkiMvy00FC', 'yuwannpay', 'Bondowosoo', '0899234234324', 'Tengkulak', 'http://127.0.0.1:8000/GambarProfile/20250521_682e0bf9e194b.png', '2025-05-21 17:23:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_user`
--
ALTER TABLE `akun_user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `firebase`
--
ALTER TABLE `firebase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hub_link_user` (`username`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hub_Pembelian_user` (`username`),
  ADD KEY `hub_paket` (`id_paket`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD KEY `hub _user` (`username`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `permintaan_stok`
--
ALTER TABLE `permintaan_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `hub _tengku` (`usertengku`);

--
-- Indeks untuk tabel `tengkulak`
--
ALTER TABLE `tengkulak`
  ADD PRIMARY KEY (`usertengku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `firebase`
--
ALTER TABLE `firebase`
  ADD CONSTRAINT `hub _user` FOREIGN KEY (`username`) REFERENCES `akun_user` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `hub_paket` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `hub_user` FOREIGN KEY (`username`) REFERENCES `akun_user` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `hub_user_new` FOREIGN KEY (`username`) REFERENCES `akun_user` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
