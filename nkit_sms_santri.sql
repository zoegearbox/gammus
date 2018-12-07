-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 01:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nkit_sms_santri`
--

-- --------------------------------------------------------

--
-- Table structure for table `daemons`
--

CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(11);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2018-11-30 03:25:38', '2018-11-30 02:25:36', '0049006E0066006F002000620061006700610069006D0061006E006100200063006100720061006E007900610020006D0065006E00670065007400610068007500690020006E0069007300200061006E0061006E006400610020007300610075006B0061006E0069003F0020', '+6282153278782', 'Default_No_Compression', '', '+6281107908', -1, 'Info bagaimana caranya mengetahui nis ananda saukani? ', 13, 'Prolink', 'true'),
('2018-11-30 03:26:51', '2018-11-30 02:26:50', '0048006100660061006C0061006E002000310037003900320030003000300031', '+6282153278782', 'Default_No_Compression', '', '+6281107908', -1, 'Hafalan 17920001', 14, 'Prolink', 'true'),
('2018-11-30 03:28:43', '2018-11-30 02:28:41', '00590061', '+6282153278782', 'Default_No_Compression', '', '+6281107908', -1, 'Ya', 15, 'Prolink', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pbk`
--

CREATE TABLE `pbk` (
  `ID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pbk_groups`
--

CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Fathul Hafidh', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '0',
  `Signal` int(11) NOT NULL DEFAULT '0',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('Prolink', '2018-07-23 01:22:33', '2018-07-23 01:17:42', '2018-07-23 01:22:43', 'yes', 'yes', '353907046377130', 'Gammu 1.28.90, Windows Server 2007, GCC 4.4, MinGW 3.13', 100, 54, 1, 0),
('Prolink', '2018-11-30 03:57:00', '2018-11-30 03:24:56', '2018-11-30 03:57:10', 'yes', 'yes', '350960684418347', 'Gammu 1.28.90, Windows Server 2007, GCC 4.4, MinGW 3.13', 0, 36, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2018-11-30 03:28:53', '0000-00-00 00:00:00', '2018-11-30 03:28:53', NULL, '004D00610061006600200070006500720069006E007400610068002000730061006C00610068002C002000670075006E0061006B0061006E003D00200048004100460041004C0041004E0028007300700061007300690029004E006F006D006F007200200049006E00640075006B002000530061006E0074007200690020006100740061007500200049004E0046004F0028007300700061007300690029006900730069002000700065007200740061006E007900610061006E002E', '+6282153278782', 'Default_No_Compression', '', '+62818445009', -1, 'Maaf perintah salah, gunakan= HAFALAN(spasi)Nomor Induk Santri atau INFO(spasi)isi pertanyaan.', 28, 'Prolink', 1, 'SendingOKNoReport', -1, 8, 255, 'nKIT'),
('2018-11-30 03:27:18', '0000-00-00 00:00:00', '2018-11-30 03:27:18', NULL, '00530061006E0074007200690020004D007500680061006D006D006100640020005300610075006B0061006E006900200070006100640061002000620075006C0061006E002000300036002000740065006C006100680020006D0065006E0063006100700061006900200041006E002D0041006C0061007100200028003300300029002000640061006E00200073006500640061006E00670020006D0065006E00670068006100660061006C002000200041006E002D0049006B0068006C00610073002000280033003000290020', '+6282153278782', 'Default_No_Compression', '', '+62818445009', -1, 'Santri Muhammad Saukani pada bulan 06 telah mencapai An-Alaq (30) dan sedang menghafal  An-Ikhlas (30) ', 27, 'Prolink', 1, 'SendingOKNoReport', -1, 7, 255, 'nKIT'),
('2018-11-30 03:25:43', '0000-00-00 00:00:00', '2018-11-30 03:25:43', NULL, '0054006500720069006D00610020004B0061007300690068002000740065006C006100680020006D0065006E006700670075006E0061006B0061006E0020006C006100790061006E0061006E0020006B0061006D0069002C0020006D006F0068006F006E002000740075006E006700670075002000310078003200340020006A0061006D0020006B0061006D006900200061006B0061006E0020006D0065006D00620061006C00610073002000700065007200740061006E007900610061006E00200041006E00640061002E', '+6282153278782', 'Default_No_Compression', '', '+62818445009', -1, 'Terima Kasih telah menggunakan layanan kami, mohon tunggu 1x24 jam kami akan membalas pertanyaan Anda.', 26, 'Prolink', 1, 'SendingOKNoReport', -1, 6, 255, 'nKIT'),
('2018-11-30 03:25:06', '0000-00-00 00:00:00', '2018-11-30 03:25:06', NULL, '0070006500720063006F006200610061006E00200073006D0073002000670061007400650077006100790020006B006900720069006D00200073006D0073002000210021', '082153278782', 'Default_No_Compression', '', '+62818445009', -1, 'percobaan sms gateway kirim sms !!', 25, 'Prolink', 1, 'SendingOKNoReport', -1, 5, 255, '');

-- --------------------------------------------------------

--
-- Table structure for table `t_broadcast`
--

CREATE TABLE `t_broadcast` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `tahun` year(4) NOT NULL,
  `bulan` char(2) NOT NULL,
  `jumlah_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_hafalan`
--

CREATE TABLE `t_hafalan` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `juz` int(2) NOT NULL,
  `surah` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hafalan`
--

INSERT INTO `t_hafalan` (`id`, `created_at`, `updated_at`, `status`, `juz`, `surah`) VALUES
(1, '2018-10-30 22:31:46', '2018-11-30 06:06:30', 0, 30, 'An-Naas'),
(2, '2018-10-30 22:33:04', '2018-12-01 00:53:35', 0, 30, 'Al-Alaq'),
(3, '2018-10-30 22:33:04', '2018-10-30 22:33:04', 0, 30, 'An-Ikhlas'),
(4, '2018-10-30 22:33:04', '2018-12-01 00:36:24', 0, 30, 'Al-Lahab'),
(6, '2018-11-29 22:52:03', '2018-11-29 22:52:03', 1, 30, 'Ad-Dhuha');

-- --------------------------------------------------------

--
-- Table structure for table `t_hafiz`
--

CREATE TABLE `t_hafiz` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `id_santri` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` char(2) NOT NULL,
  `pencapaian_hafalan` int(11) NOT NULL,
  `penambahan_hafalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hafiz`
--

INSERT INTO `t_hafiz` (`id`, `created_at`, `updated_at`, `status`, `id_santri`, `tahun`, `bulan`, `pencapaian_hafalan`, `penambahan_hafalan`) VALUES
(1, '2018-11-29 23:13:32', '2018-11-29 23:13:32', 1, 1, 2018, '06', 1, 2),
(2, '2018-11-30 03:08:43', '2018-11-30 21:56:30', 1, 1, 2018, '10', 2, 3),
(3, '2018-12-01 01:47:31', '2018-12-01 01:47:31', 1, 2, 2018, '10', 3, 3),
(4, '2018-12-05 14:03:15', '2018-12-05 14:03:15', 1, 2, 2018, '12', 2, 4),
(5, '2018-12-05 14:04:01', '2018-12-05 14:04:01', 1, 1, 2018, '12', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama_kelas` varchar(32) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id`, `created_at`, `updated_at`, `status`, `nama_kelas`, `keterangan`, `id_tahun_akademik`) VALUES
(1, '2018-11-29 22:10:00', '2018-11-30 22:18:19', 1, 'XIA', 'Kelas Tahfis A', 1),
(2, '2018-11-29 22:10:34', '2018-11-29 22:10:34', 1, 'XIB', 'Kelas Tahfis B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas_santri`
--

CREATE TABLE `t_kelas_santri` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_santri` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kelas_santri`
--

INSERT INTO `t_kelas_santri` (`id`, `created_at`, `updated_at`, `status`, `id_santri`, `id_kelas`) VALUES
(1, '2018-11-29 22:38:23', '2018-12-01 01:41:32', 1, 1, 2),
(2, '2018-12-01 01:35:49', '2018-12-01 01:36:26', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_pesan`
--

CREATE TABLE `t_pesan` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_santri` int(11) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  `status_pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_santri`
--

CREATE TABLE `t_santri` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nis` char(12) NOT NULL,
  `nama_santri` varchar(164) NOT NULL,
  `tahun_akademik` year(4) NOT NULL,
  `status_santri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_santri`
--

INSERT INTO `t_santri` (`id`, `created_at`, `updated_at`, `status`, `nis`, `nama_santri`, `tahun_akademik`, `status_santri`) VALUES
(1, '2018-11-29 22:37:12', '2018-12-01 00:34:26', 1, '17920001', 'Muhammad Saukani', 2017, 'Aktif'),
(2, '2018-12-01 00:23:08', '2018-12-01 00:36:02', 1, '17920002', 'Mirza Yogy Kurniawan', 2018, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_tahun_akademik`
--

CREATE TABLE `t_tahun_akademik` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `tahun_akademik` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tahun_akademik`
--

INSERT INTO `t_tahun_akademik` (`id`, `created_at`, `updated_at`, `status`, `tahun_akademik`) VALUES
(1, '0000-00-00 00:00:00', '2018-11-29 22:50:55', 1, '2018'),
(2, '0000-00-00 00:00:00', '2018-11-30 22:18:06', 1, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `t_wali`
--

CREATE TABLE `t_wali` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_santri` int(11) NOT NULL,
  `nama_wali` varchar(32) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_wali`
--

INSERT INTO `t_wali` (`id`, `created_at`, `updated_at`, `status`, `id_santri`, `nama_wali`, `no_hp`) VALUES
(1, '2018-12-05 11:11:10', '2018-12-05 11:11:10', 1, 2, 'Marzuki Ali', '08115131846'),
(2, '2018-12-05 12:19:35', '2018-12-05 12:19:35', 1, 1, 'Almarhum', '082153278782');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`);

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `pbk`
--
ALTER TABLE `pbk`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`);

--
-- Indexes for table `t_hafalan`
--
ALTER TABLE `t_hafalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_hafiz`
--
ALTER TABLE `t_hafiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `t_kelas_santri`
--
ALTER TABLE `t_kelas_santri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD KEY `id_santri` (`id_santri`);

--
-- Indexes for table `t_santri`
--
ALTER TABLE `t_santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_tahun_akademik`
--
ALTER TABLE `t_tahun_akademik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `t_wali`
--
ALTER TABLE `t_wali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_santri` (`id_santri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pbk`
--
ALTER TABLE `pbk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pbk_groups`
--
ALTER TABLE `pbk_groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_hafalan`
--
ALTER TABLE `t_hafalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_hafiz`
--
ALTER TABLE `t_hafiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_kelas_santri`
--
ALTER TABLE `t_kelas_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_santri`
--
ALTER TABLE `t_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_tahun_akademik`
--
ALTER TABLE `t_tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_wali`
--
ALTER TABLE `t_wali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_hafiz`
--
ALTER TABLE `t_hafiz`
  ADD CONSTRAINT `t_hafiz_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `t_santri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD CONSTRAINT `t_pesan_ibfk_1` FOREIGN KEY (`id_santri`) REFERENCES `t_santri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
