-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Apr 2018 pada 05.38
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukom2018_aribahtiar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `IDkaryawan` varchar(10) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`IDkaryawan`, `token`, `Nama`, `Alamat`, `Password`, `Jabatan`) VALUES
('Admin', NULL, 'I am Administrator', 'SMK Manangga Pratama', '$2y$10$QXoNYl88jN3phkyXvgVb8umGadjavUrO8DVFt2M4iyhUbD37Q5FFi', 'Admin'),
('adsdsa', NULL, 'das', 'ads', '$2y$10$0nb6NdJtWPEeNn0UwchVGeNyQFvQAV8x6FxkGOnP.Eb/.7l9mKddu', 'Agen'),
('agen', NULL, 'agen', 'Tasikmalaya', '$2y$10$Rv4h.RHK7yCD1C4fCY/LJOhm57jAtq9jDUzOGYL6AZ8Qbp92kT6f6', 'Agen'),
('Agen baru', NULL, 'Ari Bahtiar', 'Tasikmalaya', '$2y$10$AwIkKTBDCBQUj9sDYdSpB.SoPGmgkzqZ1jYe/0iRK5pDipmF.DU8W', 'Agen'),
('agen1', NULL, 'Agen 1 2', 'bojong', '$2y$10$4z8mhJBdg5deN6KxIa4BROeV1waJqVUsgAzfP42sDKL7QQBx0hpGq', 'Agen'),
('ari', NULL, 'ari', 'Tasikmalaya', '$2y$10$iyCEG1qeHX4AZsQ81qk8hOQG1Psh.6puiuRz.Ph55dYetNYss.lXK', 'Agen'),
('Ari Lagi ', NULL, 'ari lagi', 'Tasikmalaya', '$2y$10$JBbJ6A.mcdIsnpKnNtwQ/.wkO3126Rb2WRrB1MDBkG1.UhlEJdxzm', 'Admin'),
('aribahtiar', NULL, 'Ari Bahtiar', 'Kota Tasikmalaya', '$2y$10$IutcYzZx4tJcs/d5o0rIQuAYguoqWyGpAWM2iLHdCw1jEcVh5r9RW', 'Admin'),
('asdljk', NULL, 'daskljl', 'kjlas', '$2y$10$Lhs0MG2ZLbEmfYFEXW.Hpu6sjXof7GLrdWC9CF0UxeYRCAkR.v0wG', 'Agen'),
('asdlkn', NULL, 'asnldm', 'adsn,', '$2y$10$lVc8Uofe6i8/HmNtUR.6Ie5D9j1uUN9uK8x2rVunDYsY/8.j2zcnO', 'Agen'),
('daasdas', NULL, 'das', 'das', '$2y$10$ATe4IW.H1zQC8VKNTrVeBOT0OCpuF5fODDjCgjJP3iU4c/a6oSI6i', 'Agen'),
('dadsfgdfg', NULL, 'gfd', 'df', '$2y$10$csHLgoDSMNUWlIgxVeOGGOKsIFgI5FSxbcnBX8HMgUQ4.R/1jHHgG', 'Karyawan'),
('Daftar Lag', NULL, 'Daftar Lagi', 'Tasikmalaya', '$2y$10$oUfDlXT/xi7ap3YxdJ6IUOJmmBblAC0gVN4Nl50S0xG9jAQinx3iy', 'Karyawan'),
('dalskjdlka', NULL, 'dakjsdlaj', 'djaklsd', '$2y$10$h8SEPiEcj0xCArb/3toK1..sm.KobjAHEs2yKo0Ci0vn9fwDUV9eS', 'Admin'),
('dasdamd.a,', NULL, 'dasd', 'asd', '$2y$10$Er6qLpfPixWXP/kSexInQ.RKjABxlK3gsv9k7tsLPOeN8VezkUspS', 'Karyawan'),
('dasdkl;', NULL, 'dasdjkl', 'askld', '$2y$10$3bbg590k5rkdiuVBDgJTyeBVyiLGfm9QnrKgnxoW6Zb5oDgO2Cqlu', 'Agen'),
('dasdlkaj', NULL, 'dak;sl', 'adskl', '$2y$10$QQ9kgYnjJhPmPfvHNHfK.OUunEmfuTWuDyXn15QC8nd8R8O5uTRUC', 'Karyawan'),
('dasjdlkajs', NULL, 'ljkldasjda', 'jdalksjd', '$2y$10$vsAvycRcSC4htdSHQmSVOOm3X/PD1.KIMb.go8hiLSn4micKKiMMC', 'Admin'),
('dask;dl', NULL, 'dajskl', 'da;lsk;', '$2y$10$sSMWjZgyfJ00am1qsXIJ2eoiQdi19Kcp46uDUexVm52/4LlBnsKN2', 'Karyawan'),
('daskdjlkja', NULL, 'daksjld', 'dajskdla', '$2y$10$7dV84lepA2vmV1F3JtC5ROGjVgfGEZu9rvw7sedY4SxmTCMTYneKC', 'Agen'),
('dasm,d', NULL, 'nad,', 'na,sd', '$2y$10$75xBer1WPXmkNyfsSfXMDeCPvADw5p.4dwl8C82HF1ksl4Qt7lPS.', 'Karyawan'),
('jkjl', NULL, 'kjn', 'sd', '$2y$10$RwEimJS3IU.CsrPcCdQfOOXGJrN22027ZAQ8vmN/fTT3pvxp1piRi', 'Karyawan'),
('K001', NULL, 'Ade Kartini', 'Sukaratu', '$2y$10$.wBkPZvnNNDDd8rs2/efuepgbQjO/j4ViWmPMGhYUXOR66dWEqxIa', 'Agen'),
('K002', NULL, 'Ari Bahtiar 1', 'Tasikmalaya', '$2y$10$zeIQeZpe8C2j4H83Z4mWxO6ugrHM1YGy4MbWYQDNLggn.PbYfxTHy', 'Admin'),
('K003', NULL, 'Alfan wahyudin', 'Indihiang', '$2y$10$.UPxRDuklQA8uxo0kV4Touob4qX6kbc8HK1AcMjhS8o/lYdRkISWa', 'Agen'),
('K004', NULL, 'Aditya Fs', 'Tasikmalaya', '$2y$10$JRZuTW7IJpaDQEBzheMYW.dhYDtaN8w3/1h.uPRkcqrAcKez96ODu', 'Admin'),
('K006', NULL, 'Dede irma', 'tasik', '$2y$10$raUirgTCoTPM9eKsFFbRBuwKpS2rRwLFwDLVeGb9AKcZUPsCVyFEK', 'Agen'),
('K0067', NULL, 'Ari', 'Tasik', '$2y$10$KZ78PhmBAKvVuC44W80qVeYQn06c9n.pk/8n3.br6HC.HHFsdya5u', 'Agen'),
('K007', NULL, 'Dendi', 'tasikm', '$2y$10$t9yv2f3GDA6K68ZvsxKbSO.p0VntXq8FogDHKKQQWkppew4Z8eZ1q', 'Karyawan'),
('Karyawan', NULL, 'Karyawan', 'Tasikm', '$2y$10$qPbpezRz4aLts4QpuWT2J.JYSccYoASZEVoJkHuez3v3Ru3H7StRO', 'Karyawan'),
('Karyawan1', NULL, 'Karyawan 123', 'Tasikmalaya', '$2y$10$C8QWqwuM8Q1oLjz1zn7HPOnZv.7/vt9Ann/Y7AEcQSIews09majf2', 'Karyawan'),
('kjldkajs', NULL, 'jdalks', 'ljlkasd', '$2y$10$za2DGECIl2sxrPCkJ2GXnubQvW4aOixlnNyyHEPYtu2FqIuAMh4ne', 'Agen'),
('kjlkasd', NULL, 'asd', 'das', '$2y$10$Kw95heT7Z2DXaxH7D.ocsOpBRiGWgJdUNqhjUdYtN3JX/vJ3kEDmi', 'Karyawan'),
('l;adsla', NULL, 'ajlskdka', 'ldjalsk', '$2y$10$53fQVZKsY7yJCj9BTFTxH.CA0oF4W7gAIx5bJkdNdfY95.C2BMx5G', 'Karyawan'),
('ljlaksd', NULL, 'dasjkl', 'dajls', '$2y$10$sZm.co9C.2Fms6MV7N3kw.FPKb4rceF.tWQfoaGNC5Ge.cP/cr0Di', 'Karyawan'),
('lkjldjalks', NULL, 'dkjalskjd', 'dlkjaklsjd', '$2y$10$HIJCdq85H2xzvYHxiH9zS.ZPake56Ea1YaCzKXeamqc8p4wUnBUX2', 'Admin'),
('m,asdasokl', NULL, 'dasljkd', 'dajskld', '$2y$10$5RLbNIOVN8/HtobJZo55SO/vdoujCKgKuHRvwTnSfTZ4Mi1bTvAUe', 'Agen'),
('m.,mda.sm', NULL, 'dmas,dma.', 'mdas.,d', '$2y$10$lsalBA.GU92bQHKPXw8OXOW9/IMyHcoZUTHpZgOw/55B19cUE4U2y', 'Karyawan'),
('msmd,a', NULL, 'masd', 'asn,d', '$2y$10$nDwqX0pBwRGYl0.Yu3HnC.NjZedeslHSzgWGfLY2mCDOj6eA2MVJO', 'Agen'),
('sdadas', NULL, 'dasd', 'das', '$2y$10$nMER3UIUvYPHRy6bTtP4LO6GPFAdLb3iBgjF8g2pCpYo7012EfCfG', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IDpelanggan` varchar(10) NOT NULL,
  `Nometer` varchar(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kodetarif` varchar(10) NOT NULL,
  `IDkaryawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`IDpelanggan`, `Nometer`, `Nama`, `Alamat`, `Kodetarif`, `IDkaryawan`) VALUES
('P001', '12345', 'Ari Bahtiar', 'Tasikmalaya', 'T001', 'Admin'),
('P002', '0001', 'Ade kartini', 'Sukaratu', 'T002', 'Admin'),
('P003', '0003', 'Aditya FS', 'Tasikmalaya', 'T003', 'aribahtiar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `IDbayar` int(11) NOT NULL,
  `IDpelanggan` varchar(10) NOT NULL,
  `Bulanbayar` int(2) NOT NULL,
  `Tahun` int(4) NOT NULL,
  `Tanggal` date NOT NULL,
  `Biayaadmin` int(11) NOT NULL,
  `IDkaryawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`IDbayar`, `IDpelanggan`, `Bulanbayar`, `Tahun`, `Tanggal`, `Biayaadmin`, `IDkaryawan`) VALUES
(84, 'P001', 1, 2018, '2018-03-01', 2000, 'aribahtiar'),
(85, 'P001', 2, 2018, '2018-03-01', 300, 'aribahtiar'),
(86, 'P001', 4, 2018, '2018-03-01', 4000, 'aribahtiar'),
(87, 'P001', 6, 2019, '2018-03-01', 6000, 'aribahtiar'),
(88, 'P001', 7, 2017, '2018-03-01', 7000, 'aribahtiar'),
(89, 'P001', 8, 2018, '2018-03-01', 2000, 'aribahtiar'),
(90, 'P001', 8, 2017, '2018-03-01', 400, 'aribahtiar'),
(91, 'P001', 8, 2019, '2018-03-01', 5000, 'aribahtiar'),
(92, 'P001', 12, 2018, '2018-03-01', 6000, 'aribahtiar'),
(93, 'P001', 10, 2018, '2018-03-01', 4000, 'aribahtiar'),
(94, 'P001', 7, 2018, '2018-03-01', 400, 'aribahtiar'),
(95, 'P001', 11, 2019, '2018-03-01', 4000, 'aribahtiar'),
(96, 'P001', 10, 2000, '2018-03-01', 10000, 'aribahtiar'),
(97, 'P001', 1, 2000, '2018-03-01', 4000, 'aribahtiar'),
(98, 'P002', 3, 2018, '2018-03-01', 2000, 'aribahtiar'),
(99, 'P003', 8, 2018, '2018-03-01', 2000, 'aribahtiar'),
(100, 'P002', 5, 2018, '2018-03-01', 4000, 'aribahtiar'),
(101, 'P002', 11, 2019, '2018-03-01', 5000, 'aribahtiar'),
(102, 'P002', 6, 2018, '2018-03-01', 3000, 'A001'),
(103, 'P003', 5, 2018, '2018-03-03', 6000, 'aribahtiar'),
(104, 'P003', 3, 2018, '2018-03-03', 2500, 'aribahtiar'),
(105, 'P003', 9, 2000, '2018-03-21', 5000, 'aribahtiar'),
(106, 'P002', 6, 2017, '2018-03-21', 5000, 'aribahtiar'),
(107, 'P001', 8, 2017, '2018-04-05', 8798, 'aribahtiar');

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `Status` AFTER INSERT ON `pembayaran` FOR EACH ROW Update Tagihan set Status = "Lunas"
Where IDpelanggan = new.IDpelanggan AND
Bulan = new.Bulanbayar AND
Tahun = new.Tahun
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `IDpelanggan` varchar(10) NOT NULL,
  `Bulan` int(2) NOT NULL,
  `Tahun` int(4) NOT NULL,
  `Meterawal` int(11) NOT NULL,
  `Meterakhir` int(11) NOT NULL,
  `IDkaryawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penggunaan`
--

INSERT INTO `penggunaan` (`IDpelanggan`, `Bulan`, `Tahun`, `Meterawal`, `Meterakhir`, `IDkaryawan`) VALUES
('P001', 2, 2018, 100, 2000, 'Admin'),
('P002', 3, 2018, 1000, 200000, 'aribahtiar'),
('P001', 4, 2018, 100, 10000, 'aribahtiar'),
('P001', 6, 2019, 100, 2312, 'aribahtiar'),
('P001', 7, 2017, 2819, 2147483647, 'aribahtiar'),
('P001', 8, 2018, 3231, 3123123, 'aribahtiar'),
('P002', 5, 2018, 10, 1000, 'aribahtiar'),
('P001', 8, 2019, 100, 10000, 'aribahtiar'),
('P001', 12, 2018, 200, 200000, 'aribahtiar'),
('P001', 8, 2019, 2000, 2000000, 'aribahtiar'),
('P002', 11, 2019, 200, 30000, 'aribahtiar'),
('P001', 10, 2018, 2000, 30000, 'aribahtiar'),
('P001', 7, 2018, 1000, 300000, 'aribahtiar'),
('P001', 11, 2019, 20, 2000, 'aribahtiar'),
('P001', 10, 2018, 20, 300, 'aribahtiar'),
('p003', 8, 2018, 20, 2000, 'aribahtiar'),
('P003', 5, 2018, 200, 5000, 'aribahtiar'),
('P003', 3, 2018, 20, 3000, 'aribahtiar'),
('P001', 10, 2000, 200, 3000, 'aribahtiar'),
('P001', 8, 2018, 20, 1000, 'aribahtiar'),
('P001', 11, 2019, 100, 2000, 'aribahtiar'),
('P001', 1, 2000, 200, 20000, 'aribahtiar');

--
-- Trigger `penggunaan`
--
DELIMITER $$
CREATE TRIGGER `tagihan` AFTER INSERT ON `penggunaan` FOR EACH ROW Insert into tagihan  values(new.IDpelanggan,new.Bulan,new.Tahun,new.Meterakhir - new.Meterawal , 'Belum Lunas',new.IDkaryawan)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `IDpelanggan` varchar(10) NOT NULL,
  `Bulan` int(2) NOT NULL,
  `Tahun` int(4) NOT NULL,
  `Jumlahmeter` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `IDkaryawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`IDpelanggan`, `Bulan`, `Tahun`, `Jumlahmeter`, `Status`, `IDkaryawan`) VALUES
('P001', 2, 2018, 1900, 'Lunas', 'Admin'),
('P002', 3, 2018, 199000, 'Lunas', 'aribahtiar'),
('P001', 4, 2018, 9900, 'Lunas', 'aribahtiar'),
('P001', 6, 2019, 2212, 'Lunas', 'aribahtiar'),
('P001', 7, 2017, 2147480828, 'Lunas', 'aribahtiar'),
('P001', 8, 2018, 3119892, 'Lunas', 'aribahtiar'),
('P002', 5, 2018, 990, 'Lunas', 'aribahtiar'),
('P001', 8, 2019, 9900, 'Lunas', 'aribahtiar'),
('P001', 12, 2018, 199800, 'Lunas', 'aribahtiar'),
('P001', 8, 2019, 1998000, 'Lunas', 'aribahtiar'),
('P002', 11, 2019, 29800, 'Lunas', 'aribahtiar'),
('P001', 10, 2018, 28000, 'Lunas', 'aribahtiar'),
('P001', 7, 2018, 299000, 'Lunas', 'aribahtiar'),
('P001', 11, 2019, 1980, 'Lunas', 'aribahtiar'),
('P001', 10, 2018, 280, 'Lunas', 'aribahtiar'),
('p003', 8, 2018, 1980, 'Lunas', 'aribahtiar'),
('P003', 5, 2018, 4800, 'Lunas', 'aribahtiar'),
('P003', 3, 2018, 2980, 'Lunas', 'aribahtiar'),
('P001', 10, 2000, 2800, 'Lunas', 'aribahtiar'),
('P001', 8, 2018, 980, 'Lunas', 'aribahtiar'),
('P001', 11, 2019, 1900, 'Lunas', 'aribahtiar'),
('P001', 1, 2000, 19800, 'Lunas', 'aribahtiar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `Kodetarif` varchar(10) NOT NULL,
  `Daya` int(11) NOT NULL,
  `Tarifperkwh` int(11) NOT NULL,
  `IDkaryawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`Kodetarif`, `Daya`, `Tarifperkwh`, `IDkaryawan`) VALUES
('T001', 100, 1000, 'K001'),
('T002', 2000, 2000, 'Admin'),
('T003', 3000, 3000, 'Admin'),
('T004', 4000, 4000, 'Admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tagihan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_tagihan` (
`IDpelanggan` varchar(10)
,`Nometer` varchar(20)
,`Nama` varchar(100)
,`Alamat` varchar(100)
,`Tarifperkwh` int(11)
,`Daya` int(11)
,`Bulan` int(2)
,`Tahun` int(4)
,`Jumlahmeter` int(11)
,`Status` varchar(15)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tagihan`
--
DROP TABLE IF EXISTS `view_tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tagihan`  AS  select `pelanggan`.`IDpelanggan` AS `IDpelanggan`,`pelanggan`.`Nometer` AS `Nometer`,`pelanggan`.`Nama` AS `Nama`,`pelanggan`.`Alamat` AS `Alamat`,`tarif`.`Tarifperkwh` AS `Tarifperkwh`,`tarif`.`Daya` AS `Daya`,`tagihan`.`Bulan` AS `Bulan`,`tagihan`.`Tahun` AS `Tahun`,`tagihan`.`Jumlahmeter` AS `Jumlahmeter`,`tagihan`.`Status` AS `Status` from ((`pelanggan` join `tagihan`) join `tarif`) where ((`pelanggan`.`IDpelanggan` = `tagihan`.`IDpelanggan`) and (`pelanggan`.`Kodetarif` = `tarif`.`Kodetarif`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`IDkaryawan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IDpelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`IDbayar`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`Kodetarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `IDbayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
