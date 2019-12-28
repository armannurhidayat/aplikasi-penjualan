-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2019 at 03:19 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anh`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `stock_barang` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stock_barang`, `created`, `updated`) VALUES
(5, 'komputer', '1000000', 2, '2019-10-01 12:42:19', '2019-10-01 15:26:05'),
(6, 'mouse', '500000', 5, '2019-10-01 12:43:22', NULL),
(7, 'keyboard', '100000', 5, '2019-10-01 12:43:22', NULL),
(8, 'laptop', '1500000', 5, '2019-10-01 12:43:44', NULL),
(9, 'COBAAN', '90000', 0, '2019-12-28 10:02:08', '2019-12-28 10:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `created`, `updated`) VALUES
(3, 'arman nur hidayat', 'karawang', '2019-10-01 16:03:45', NULL),
(4, 'putra azzam', 'cianjur', '2019-10-01 16:03:58', NULL),
(6, 'Taufiq hidayat', 'medan', '2019-10-01 16:13:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_struk` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_struk`, `id_pelanggan`, `id_barang`, `tanggal_transaksi`, `jumlah`, `subtotal`) VALUES
(10, 'TRX-20191002006', 3, 7, '2019-02-10 00:00:00', 1, 600000),
(11, 'TRX-20191002006', 3, 6, '2019-02-10 00:00:00', 1, 600000),
(12, 'TRX-20191002007', 4, 8, '2019-02-10 00:00:00', 1, 2000000),
(13, 'TRX-20191002007', 4, 6, '2019-02-10 00:00:00', 1, 2000000),
(14, 'TRX-20191228008', 4, 8, '2019-12-28 00:00:00', 5, 1500000),
(15, 'DSDSA', 3, 9, '2019-12-28 10:02:38', 10, 200),
(16, 'FSFA', 3, 9, '2019-12-28 10:03:18', 90, 90000);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `penjualan_barang` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stock_barang=stock_barang-NEW.jumlah
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'admin',
  `level` enum('admin') NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `email`, `created`, `updated`) VALUES
(1, 'arman nur hidayat', 'admin', '$2y$10$rU1QP/DY702BkxDEaMYGhOFxMWzBX.F/LqkPME8gqyEL3V6pum0Sq', 'admin', 'armannurhidayat7@gmail.com', '2019-10-01 12:12:15', '2019-10-01 12:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `no_struk` (`no_struk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
