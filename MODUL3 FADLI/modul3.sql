-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Nov 20, 2022 at 06:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul3`
--

-- --------------------------------------------------------

--
-- Table structure for table `showroom_fadli_table`
--

CREATE TABLE `showroom_fadli_table` (
  `id_mobil` int(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `pemilik_mobil` varchar(255) NOT NULL,
  `merk_mobil` varchar(255) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_mobil` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showroom_fadli_table`
--

INSERT INTO `showroom_fadli_table` (`id_mobil`, `nama_mobil`, `pemilik_mobil`, `merk_mobil`, `tanggal_beli`, `deskripsi`, `foto_mobil`, `status_pembayaran`) VALUES
(8, 'BMW ajaa', 'FADLI - 1202204033', 'BMW', '2022-11-18', '    The first all-electric Gran Coupé, the BMW i4 delivers outstanding dynamics with a high level of comfort and the ideal qualities to make it your daily driver. The five-door model comes equipped with fifth-generation BMW eDrive technology for sporty performance figures – reaching up to 340 hp. With a long range of up to 591 kilometres* and five spacious full-sized seats, it is the perfect companion for any journey.\r\n    ', 'gambar mobil.png', 'Lunas'),
(18, 'adasdasd', 'adsasdasd', 'adsasdasdasd', '2022-11-20', '   adsasdaslkdjajkdaldkjaklhajkdhajkdhajkdhajkdhajksdhajksd   ', 'imagefandik.png', 'Lunas'),
(19, 'Mobilku', 'Izurohmanq', 'Pentaho Mobil', '2022-11-20', 'adowaoidjaiojsdoaijwiodjaiojdsoiajiowjd', 'mobil2.png', 'Lunas'),
(21, 'awdoajdowij', 'oijaiojdaoijwoij', 'oijaoidjwoajdodij', '2022-11-20', 'aowdjaiojdwoajoidjaodjwoj', 'rush.png', 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `showroom_fadli_table`
--
ALTER TABLE `showroom_fadli_table`
  ADD PRIMARY KEY (`id_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `showroom_fadli_table`
--
ALTER TABLE `showroom_fadli_table`
  MODIFY `id_mobil` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
