-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2018 at 06:54 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsiibas`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `nomer_transaksi` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`nomer_transaksi`, `tanggal`, `kode_barang`, `jumlah_barang`, `satuan`, `keterangan`) VALUES
('OUT0000001', '2018-04-04', 'FRNT-AXL-6x40', 3, 'Unit', 'Pengambilan'),
('OUT0000002', '2018-04-05', 'BH-12x45', 2, 'Pcs', 'Pengambilan'),
('OUT0000003', '2018-04-05', 'BH-12x45', 10000, 'Pcs', 'Pengambilan'),
('OUT0000004', '2018-04-05', 'BH-12x45', 23, 'Pcs', 'Pengambilan'),
('OUT0000005', '2018-04-05', 'BH-12x45', 1, 'Pcs', 'Pengambilan'),
('OUT0000006', '2018-04-06', 'BH-12x45', 1, 'Pcs', 'Pengambilan'),
('OUT0000007', '2018-04-20', 'BH-12x45', 20, 'Pcs', 'Penjualan'),
('OUT0000008', '2018-04-28', 'BH-12x50', 2, 'Pcs', 'Pengambilan'),
('OUT0000009', '2018-05-04', 'asdasd', 2, 'Pcs', 'Pengambilan'),
('OUT0000010', '2018-06-05', 'asdasd', 1, 'Unit', 'Reject'),
('OUT0000011', '2018-06-05', 'BH-12x50', 2, 'Pcs', 'Pengambilan'),
('OUT0000012', '2018-06-05', 'BH-12x45', 2, 'Pcs', 'Pengambilan'),
('OUT0000013', '2018-07-21', 'BH-12x45', 100, 'Pcs', 'Pengambilan');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `pengurangan` AFTER INSERT ON `barang_keluar` FOR EACH ROW UPDATE stok_barang set stok=stok - new.jumlah_barang
where kode_barang=new.kode_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `nomer_transaksi` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `kode_supplier` varchar(25) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`nomer_transaksi`, `tanggal`, `kode_barang`, `kode_supplier`, `jumlah_barang`, `satuan`, `keterangan`) VALUES
('RCV0000001', '2018-04-04', 'FRNT-AXL-6x37', 'ALCSJT', 33, 'Pcs', 'Pemasukan'),
('RCV0000002', '2018-04-05', 'BH-12x50', 'ALCSJT', 12, 'Pcs', 'Pemasukan'),
('RCV0000003', '2018-04-05', 'FRNT-AXL-6x41', 'MRTTG', 11, 'Pcs', 'Pemasukan'),
('RCV0000004', '2018-04-05', 'BH-12x45', 'ALCSJT', 26, 'Pcs', 'Pemasukan'),
('RCV0000005', '2018-04-05', 'BH-12x45', 'ALCSJT', 10000, 'Pcs', 'Pemasukan'),
('RCV0000006', '2018-06-06', 'BH-12x45', 'ALCSJT', 2, 'Pcs', 'Pemasukan'),
('RCV0000007', '2018-06-20', 'BH-12x45', 'ALCSJT', 2, 'Pcs', 'Pemasukan');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `penambahan` AFTER INSERT ON `barang_masuk` FOR EACH ROW UPDATE stok_barang set stok=stok + new.jumlah_barang
where kode_barang=new.kode_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `nomer_transaksi` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kode_customer` varchar(25) NOT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telp` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kode_customer`, `nama_customer`, `alamat`, `kota`, `email`, `telp`, `fax`) VALUES
('AUM', 'PT. Agung Auto Mall', 'Jl Padurenan Jaya', 'Bekasi', 'agungauto@gmail.com', 88990076, 88990076),
('HMSI', 'PT. Hino Motor Sales Indonesia', 'Jl Jatake', 'Jakarta', 'hmsijatake@gmail.com', 88112233, 88112233),
('MTSJYABD', 'PT. Mitsubishi Jaya abadi', 'Jl Jababeka 3', 'Cikarang', 'mtsjayaabadi@gmail.com', 88445512, 88445512);

-- --------------------------------------------------------

--
-- Table structure for table `order_barang`
--

CREATE TABLE `order_barang` (
  `nomer_order` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(25) DEFAULT NULL,
  `jumlah_order` int(11) DEFAULT NULL,
  `jumlah_kedatangan` int(11) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_barang`
--

INSERT INTO `order_barang` (`nomer_order`, `tanggal`, `kode_barang`, `nama_barang`, `jumlah_order`, `jumlah_kedatangan`, `keterangan`) VALUES
('ORD0000002', '2018-04-05', 'TRN-U-MRD-01', 'Trasnfer Un Merried', 100, 100, 'Urgent'),
('ORD0000004', '2018-07-21', 'BH-12x45', 'Bolt Hex M12x45', 100, 50, 'Permintaan Barang'),
('ORD0000005', '2018-08-06', 'BH-12x45', 'Bolt Hex M12x45', 23, 23, 'Urgent');

-- --------------------------------------------------------

--
-- Table structure for table `purchas_receiving`
--

CREATE TABLE `purchas_receiving` (
  `nomer_receiving` varchar(25) NOT NULL,
  `nomer_order` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `keterangan_barang` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchas_receiving`
--

INSERT INTO `purchas_receiving` (`nomer_receiving`, `nomer_order`, `tanggal`, `kode_barang`, `jumlah_barang`, `keterangan_barang`) VALUES
('RCV0000001', 'ORD0000001', '2018-04-28', 'BH-12x45', 2, 'Parsial'),
('RCV0000004', 'ORD0000001', '2018-04-28', 'BH-12x45', 2, 'Lunas'),
('RCV0000005', 'ORD0000003', '2018-04-28', 'FRNT-AXL-6x41', 3, 'Lunas'),
('RCV0000007', 'ORD0000004', '2018-07-21', 'BH-12x45', 50, 'On Order'),
('RCV0000008', 'ORD0000005', '2018-08-06', 'BH-12x45', 23, 'lunas');

--
-- Triggers `purchas_receiving`
--
DELIMITER $$
CREATE TRIGGER `penambahanreceiving` AFTER INSERT ON `purchas_receiving` FOR EACH ROW UPDATE order_barang set jumlah_kedatangan=jumlah_kedatangan + new.jumlah_barang
where nomer_order=new.nomer_order
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `purchas_receivingrtr`
--

CREATE TABLE `purchas_receivingrtr` (
  `nomer_receivingrtr` varchar(25) NOT NULL,
  `nomer_reture` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `keterangan_barang` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchas_receivingrtr`
--

INSERT INTO `purchas_receivingrtr` (`nomer_receivingrtr`, `nomer_reture`, `tanggal`, `kode_barang`, `jumlah_barang`, `keterangan_barang`) VALUES
('RCV0000001', 'RTR0000002', '2018-04-28', 'BH-12x45', 10, 'Parsial'),
('RCV0000002', 'RTR0000002', '2018-04-28', 'BH-12x45', 1, 'Lunas'),
('RCV0000003', 'RTR0000001', '2018-05-04', 'BH-12x45', 1, 'Lunas'),
('RCV0000004', 'RTR0000003', '2018-06-05', 'TRN-U-MRD-01', 2, 'lunas'),
('RCV0000005', 'RTR0000005', '2018-06-06', 'BH-12x45', 2, 'Lunas');

--
-- Triggers `purchas_receivingrtr`
--
DELIMITER $$
CREATE TRIGGER `penambahanreceivingrtr` AFTER INSERT ON `purchas_receivingrtr` FOR EACH ROW UPDATE reture_barang set jumlah_kedatangan=jumlah_kedatangan + new.jumlah_barang
where nomer_reture=new.nomer_reture
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `nama_depan` varchar(25) DEFAULT NULL,
  `nama_belakang` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`nama_depan`, `nama_belakang`, `tanggal`, `username`, `password`, `status`, `foto`) VALUES
('admin', 'admin', '2018-08-07', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin.jpg'),
('ibas', 'base', '2018-08-07', 'ibas', '4f0c6beb94590174d66943a5fdc4840c', 'admin', '2015-05-26 11.jpg'),
('purchasing', 'purchasing', '2018-08-07', 'purchasing', '74ba4e8291e8b2e40a31a50505f8b72e', 'purchasing', 'purchasing.jpg'),
('user', 'user', '2018-08-07', 'user', 'user', 'warehouse', 'Koala.jpg'),
('warehouse', 'warehouse', '2018-08-07', 'warehouse', '372d30dd2849813ef674855253900679', 'warehouse', 'warehouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reture_barang`
--

CREATE TABLE `reture_barang` (
  `nomer_reture` varchar(25) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_barang` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(25) DEFAULT NULL,
  `jumlah_reture` int(11) DEFAULT NULL,
  `jumlah_kedatangan` int(11) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reture_barang`
--

INSERT INTO `reture_barang` (`nomer_reture`, `tanggal`, `kode_barang`, `nama_barang`, `jumlah_reture`, `jumlah_kedatangan`, `keterangan`) VALUES
('RTR0000001', '2018-04-19', 'BH-12x45', 'Bolt Hex M12x45', 1, 1, 'Reture'),
('RTR0000002', '2018-04-19', 'BH-12x45', 'Bolt Hex M12x45', 11, 11, 'Reture'),
('RTR0000003', '2018-04-20', 'TRN-U-MRD-01', 'Trasnfer Un Merried', 2, 2, 'Reture'),
('RTR0000004', '2018-05-08', 'BH-12x45', 'Bolt Hex M12x45', 30, 0, 'Reture'),
('RTR0000005', '2018-06-06', 'BH-12x45', 'Bolt Hex M12x45', 2, 2, 'NG');

--
-- Triggers `reture_barang`
--
DELIMITER $$
CREATE TRIGGER `penguranganreture` AFTER INSERT ON `reture_barang` FOR EACH ROW UPDATE stok_barang set stok=stok - new.jumlah_reture
where kode_barang=new.kode_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `jenis_barang` varchar(25) DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`kode_barang`, `nama_barang`, `jenis_barang`, `stok`) VALUES
('BH-12x45', 'Bolt Hex M12x45', 'Bolt Hex', 600),
('BH-12x50', 'Bolt Hex M12x50', 'Bolt Hex', 808),
('BH-14x40', 'Bolt Hex M14x40', 'Bolt Hex', 11),
('CSA-01-MRD', 'Cover Shifter Area Merried', 'Assy Unit', 20),
('CSA-02-UMRD', 'Cover Shifter Area Un Merried', 'Assy Unit', 43),
('DF-6x40', 'Differential Assy 6x40', 'Assy Unit', 22),
('FB-10x25', 'Flange Bolt M10x25', 'Bolt Flange', 112),
('FRNT-AXL-6x37', 'Front Axle 6x37', 'Assy Unit', 120),
('FRNT-AXL-6x40', 'Front Axle 6x40', 'Assy Unit', 9),
('FRNT-AXL-6x41', 'Front Axle 6x41', 'Assy Unit', 133),
('TRN-MRD-01', 'Trasnfer Merried', 'Assy Unit', 100),
('TRN-U-MRD-01', 'Trasnfer Un Merried', 'Assy Unit', 898);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(25) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telp` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat`, `kota`, `email`, `telp`, `fax`) VALUES
('ALCSJT', 'PT. Alcorindo Sejahteraa', 'Jl Raya Narogong ', 'Bekasi', 'alcorindosjt@gmail.com', 88778845, 88778845),
('ASNBB', 'PT. Asian Berindo Bearing', 'Jl Tangerang Raya', 'Tangerang', 'asianbb@gmail.com', 88665412, 88665412),
('BNTGBRTM', 'PT. Bintang Baru Tama', 'Jl Tangerang Banten', 'Tangerang', 'bintangbaru@gmail.com', 88009988, 88009988),
('MRTTG', 'PT. Morita Tjokro Gearindo', 'Jln Pulo Gadung Raya', 'Jakartaa', 'mtg@gmail.com', 88787667, 88787667),
('SKNAG', 'PT. Sekina Agung', 'Jln Kebon Jeruk', 'Jakarta', 'Sekinaagung@gmail.com', 88675467, 88675467),
('SKWPM', 'PT. Sekawan Putra Makmur', 'Jl Jababeka 2', 'Cikarang', 'spm@gmail.com', 889967564, 889967564);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `kode_vendor` varchar(25) NOT NULL,
  `nama_vendor` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telp` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`kode_vendor`, `nama_vendor`, `alamat`, `kota`, `email`, `telp`, `fax`) VALUES
('AXLIND', 'PT. AXLE INDONESIA', 'Jl Sumatra MM2100', 'Cikarang', 'axleind@gmail.com', 88990098, 88990098),
('HTMLIND', 'PT. Hotmal Indonesia', 'Jl Tangerang Raya', 'Cikarang', 'hotmalind@gmail.com', 88997645, 88997645),
('INDKDPLTG', 'PT. Indo Kida Plating', 'Jl Bali MM2100', 'Cikarang', 'indokida@gmail.com', 88778765, 88778765),
('LNCRJYABD', 'PT. Lancar Jaya Abadi', 'Jl Narogong Raya', 'Bekasi', 'lancarjaya@gmail.com', 88776545, 88776545);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`nomer_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`nomer_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `jumlah_barang` (`jumlah_barang`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`nomer_transaksi`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indexes for table `order_barang`
--
ALTER TABLE `order_barang`
  ADD PRIMARY KEY (`nomer_order`);

--
-- Indexes for table `purchas_receiving`
--
ALTER TABLE `purchas_receiving`
  ADD PRIMARY KEY (`nomer_receiving`),
  ADD KEY `FK_purchas_receiving_barang_masuk` (`kode_barang`);

--
-- Indexes for table `purchas_receivingrtr`
--
ALTER TABLE `purchas_receivingrtr`
  ADD PRIMARY KEY (`nomer_receivingrtr`),
  ADD KEY `kode_barang` (`kode_barang`,`jumlah_barang`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reture_barang`
--
ALTER TABLE `reture_barang`
  ADD PRIMARY KEY (`nomer_reture`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`kode_vendor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
