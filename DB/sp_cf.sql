-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 12:20 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_cf`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`, `level`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosacf`
--

CREATE TABLE `tb_diagnosacf` (
  `kode_diagnosa` varchar(16) NOT NULL,
  `nama_diagnosa` varchar(256) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_diagnosacf`
--

INSERT INTO `tb_diagnosacf` (`kode_diagnosa`, `nama_diagnosa`, `keterangan`) VALUES
('D01', 'Paranoid', 'masalah psikologis yang ditandai dengan munculnya rasa curiga dan takut berlebihan. Orang yang paranoid cenderung sulit atau bahkan tidak bisa memercayai orang lain dan memiliki pola pikir yang berbeda dari kebanyakan orang.'),
('D02', 'Hebefrenik', 'Skizofrenia hebefrenik adalah gangguan mental yang ditandai perilaku, pembicaraan, serta pikiran yang cenderung kacau dan tidak logis seperti orang umum disertai dengan halusinasi.'),
('D03', 'Katatonik', 'katatonik adalah salah satu ciri dari penyakit mental serius yang disebut skizofrenia. Penyakit mental tersebut membuat seseorang tidak bisa membedakan kenyataan dengan yang bukan, suatu keadaan pikiran yang disebut psikosis.'),
('D04', 'Tak Terinci', 'Halusinasi disebabkan oleh jenis dan jumlah sumber yang dapat dibangkitkan oleh individu.'),
('D05', 'Residual', 'residual adalah keadaan kronis dari skizofrenia dengan riwayat sedikitnya satu episode psikotik yang jelas dan gejala-gejalanya berkembang kearah gejala negatif yang lebih menonjol. Penderita akan bersikap eksentrik (aneh/tidak wajar) dan menarik diri dari lingkungan sosial.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosads`
--

CREATE TABLE `tb_diagnosads` (
  `kode_diagnosa` varchar(11) NOT NULL,
  `nama_diagnosa` varchar(256) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_diagnosads`
--

INSERT INTO `tb_diagnosads` (`kode_diagnosa`, `nama_diagnosa`, `keterangan`) VALUES
('G1', 'Paranoid', 'masalah psikologis yang ditandai dengan munculnya rasa curiga dan takut berlebihan. Orang yang paranoid cenderung sulit atau bahkan tidak bisa memercayai orang lain dan memiliki pola pikir yang berbeda dari kebanyakan orang.'),
('G2', 'Hebefrenik', 'Skizofrenia hebefrenik adalah gangguan mental yang ditandai perilaku, pembicaraan, serta pikiran yang cenderung kacau dan tidak logis seperti orang umum disertai dengan halusinasi.'),
('G3', 'Katatonik', 'katatonik adalah salah satu ciri dari penyakit mental serius yang disebut skizofrenia. Penyakit mental tersebut membuat seseorang tidak bisa membedakan kenyataan dengan yang bukan, suatu keadaan pikiran yang disebut psikosis.'),
('G4', 'Tak Terinci', 'Halusinasi disebabkan oleh jenis dan jumlah sumber yang dapat dibangkitkan oleh individu.'),
('G5', 'Residual', 'residual adalah keadaan kronis dari skizofrenia dengan riwayat sedikitnya satu episode psikotik yang jelas dan gejala-gejalanya berkembang kearah gejala negatif yang lebih menonjol. Penderita akan bersikap eksentrik (aneh/tidak wajar) dan menarik diri dari lingkungan sosial.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejalacf`
--

CREATE TABLE `tb_gejalacf` (
  `kode_gejalacf` varchar(8) NOT NULL,
  `nama_gejalacf` varchar(256) NOT NULL DEFAULT '',
  `keterangan` varchar(256) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejalacf`
--

INSERT INTO `tb_gejalacf` (`kode_gejalacf`, `nama_gejalacf`, `keterangan`) VALUES
('G001', 'Isi pikiran dirinya sendiri yang berulang atau bergema dalam kepalanya, dan isi pikiran ulangan, walaupun isinya sama, namun kualitasnya berbeda', 'psikologis'),
('G002', 'Isi pikiran yang asing dari luar masuk ke dalam pikirannya atau isi pikiranya diambil keluar oleh sesuatu dari luar dirinya.', 'psikologis'),
('G003', 'Isi pikirannya tersiar ke luar sehingga orang lain atau umum mengetahuinya.', 'psikologis'),
('G004', 'Paham tentang dirinya dikendalikan oleh suatu kekuatan tertentu dari luar. ', 'psikologis'),
('G005', 'Paham tentang dirinya dipengaruhi oleh suatu kekuatan tertentu dari luar. ', 'psikologis'),
('G006', 'Paham tentang dirinya tidak berdaya dan pasrah terhadap suatu kekuatan dari luar ( tentang ', 'psikologis'),
('G007', 'Pengalaman inderawi yang tak wajar, yang bermakna sangat khas bagi dirinya, biasanya bersifat mistik atau mukjizat', 'psikologis'),
('G008', 'Mendiskusikan perihal pasien di antara mereka sendiri (diantara berbagai suara yang berbicara).', 'psikologis'),
('G009', 'Suara halusinasi yang berkomentar secara terus menerus terhadap perilaku pasien. ', 'psikologis'),
('G010', 'Jenis suara halusinasi lain yang berasal dari salah satu bagian tubuh.', 'psikologis'),
('G011', 'Paham menetap jenis lainnya, yang menurut budaya setempat dianggap tidak wajar dan sesuatu yang mustahil (keyakinan agama atau politik tertentu), atau kekuatan dan kemampuan di atas manusia biasa (mengendalikan cuaca, atau berkomunikasi dengan makhluk asi', 'psikologis'),
('G012', 'Arus Pikiran yang Terputus atau mengalami sisipan (interpolation), yang berakibat inkoherensi atau pembicaraan yang tidak relevan, atau neologisme.', 'psikologis'),
('G013', 'Keadaan gaduh-gelisah (ex-citement), posisi tubuh tertentu (posturing), atau fleksibelitas cerea, negativisme, dan stupor.', 'psikologis'),
('G014', 'Gejala Negatif seperti sikap sangat apatis, bicara  jarang, dan respons emosional yang menumpul atau tidak wajar.', 'psikologis'),
('G015', 'Suara Halusinasi yang Mengancam pasien atau memberi perintah, atau halusinasi auditorik berupa bunyi peluit, mendengung, atau bunyi tawa.', 'psikologis'),
('G016', 'Halusinasi Pembauan atau Pengecapan Rasa, atau bersifat seksual, atau lainlain perasaan tubuh', 'psikologis'),
('G017', 'Dapat berupa semua jenis waham; waham dikendalikan, waham dipengaruhi, atau passivity, dan keyakinan dikejar-kejar yang beraneka ragam', 'psikologis'),
('G018', 'Gangguan afektif, dorongan kehendak dan pembicaraan, serta gejala katatonik secara relatif tidak nyata/ tidak menonjol.', 'psikologis'),
('G019', 'Gangguan suasana (mood) seperti iritabilitas, kemarahan yang tiba-tiba, ketakutan dan kecurigaan', 'psikologis'),
('G020', 'Halusinasi visual', 'psikologis'),
('G021', 'Perilaku tidak Bertanggung Jawab, mannerisme, kecenderungan selalu menyendiri (solitary), hampa tujuan dan hampa perasaan', 'psikologis'),
('G022', 'Afek dangkal (shallow) dan tidak wajar (inappropriate), cekikikan (giggling) atau perasaan puas diri, senyum sendiri, sikap tinggi hati, tertawa menyeringai, mannerisme, mengibuli secara senda gurau, keluhan hipokondrikal, dan unkapan kata yang diulang-ul', 'psikologis'),
('G023', 'Proses pikir mengalami disorganisasi dan pembicaraan tak menentu (rambling) serta inkoheren.', 'psikologis'),
('G024', 'Stupor (amat berkurangnya dalam reaktivitas terhadap lingkungan dan aktivitasa spontan) atau mutisme (tidak berbicara).', 'psikologis'),
('G025', 'Gaduh-gelisah ( tampak jelas aktivitas motorik yang tidak bertujuan).', 'psikologis'),
('G026', 'Menampilkan Posisi Tubuh Tertentu ( secara sukarela mengambil dan mempertahankan posisi tubuh tertentu yang tidak wajar.', 'psikologis'),
('G027', 'Rigiditas ( mempertahankan posisi tubuh yang kaku untuk melawan upaya menggerakan dirinya.', 'psikologis'),
('G028', 'Fleksibilitas Cerea ( mempertahan kan anggota gerak dan tubuh dalam posisi yang dapat dibentuk dari luar.', 'psikologis'),
('G029', 'Command Automatism ( kepatuhan secara otomatis terhadap perintah) , dan pengulangan kata-kata serta kalimat-kalimat.', 'psikologis'),
('G030', 'Negativisme ( tampak jelas perlawanan yang tidak bermotif terhadap semua perintah atau upaya untuk menggerakan , atau pergerakan kearah yang berlawanan).', 'psikologis'),
('G031', 'Terdapat Riwayat satu episode psikotik yang jelas di masa lampau.', 'psikologis'),
('G032', 'Sedikitnya sudah melampaui kurun waktu satu tahun dimana intensitas dan frekuensi gejala yang nyata telah sangat berkurang (minimal) dan telah timbul sindrom ', 'psikologis'),
('G033', 'Tidak terdapat dementia atau penyakit/gangguan otak organik lain, depresi kronis atau institusinalisasi yang dapat menjelaskan disabilitas negatif tersebut.', 'psikologis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejalads`
--

CREATE TABLE `tb_gejalads` (
  `kode_gejalads` int(11) NOT NULL,
  `nama_gejalads` varchar(255) NOT NULL DEFAULT '',
  `bobot` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejalads`
--

INSERT INTO `tb_gejalads` (`kode_gejalads`, `nama_gejalads`, `bobot`) VALUES
(1, 'Isi pikiran dirinya sendiri yang berulang atau bergema dalam kepalanya, dan isi pikiran ulangan, walaupun isinya sama, namun kualitasnya berbeda', 0.8),
(2, 'Isi pikiran yang asing dari luar masuk ke dalam pikirannya atau isi pikiranya diambil keluar oleh sesuatu dari luar dirinya.', 0.8),
(3, 'Isi pikirannya tersiar ke luar sehingga orang lain atau umum mengetahuinya.', 0.6),
(4, 'Paham tentang dirinya dikendalikan oleh suatu kekuatan tertentu dari luar. ', 0.6),
(5, 'Paham tentang dirinya dipengaruhi oleh suatu kekuatan tertentu dari luar. ', 0.6),
(6, 'Paham tentang dirinya tidak berdaya dan pasrah terhadap suatu kekuatan dari luar ( tentang ', 0.6),
(7, 'Pengalaman inderawi yang tak wajar, yang bermakna sangat khas bagi dirinya, biasanya bersifat mistik atau mukjizat', 0.2),
(8, 'Mendiskusikan perihal pasien di antara mereka sendiri (diantara berbagai suara yang berbicara).', 0.6),
(9, 'Suara halusinasi yang berkomentar secara terus menerus terhadap perilaku pasien. ', 0.8),
(10, 'Jenis suara halusinasi lain yang berasal dari salah satu bagian tubuh.', 0.6),
(11, 'Paham menetap jenis lainnya, yang menurut budaya setempat dianggap tidak wajar dan sesuatu yang mustahil (keyakinan agama atau politik tertentu), atau kekuatan dan kemampuan di atas manusia biasa (mengendalikan cuaca, atau berkomunikasi dengan makhluk asi', 0.6),
(12, 'Arus Pikiran yang Terputus atau mengalami sisipan (interpolation), yang berakibat inkoherensi atau pembicaraan yang tidak relevan, atau neologisme.', 0.8),
(13, 'Keadaan gaduh-gelisah (ex-citement), posisi tubuh tertentu (posturing), atau fleksibelitas cerea, negativisme, dan stupor.', 0.8),
(14, 'Gejala Negatif seperti sikap sangat apatis, bicara  jarang, dan respons emosional yang menumpul atau tidak wajar.', 0.6),
(15, 'Suara Halusinasi yang Mengancam pasien atau memberi perintah, atau halusinasi auditorik berupa bunyi peluit, mendengung, atau bunyi tawa.', 0.6),
(16, 'Halusinasi Pembauan atau Pengecapan Rasa, atau bersifat seksual, atau lainlain perasaan tubuh', 0.8),
(17, 'Dapat berupa semua jenis waham; waham dikendalikan, waham dipengaruhi, atau passivity, dan keyakinan dikejar-kejar yang beraneka ragam', 1),
(18, 'Gangguan afektif, dorongan kehendak dan pembicaraan, serta gejala katatonik secara relatif tidak nyata/ tidak menonjol.', 1),
(19, 'Gangguan suasana (mood) seperti iritabilitas, kemarahan yang tiba-tiba, ketakutan dan kecurigaan', 0.8),
(20, 'Halusinasi visual', 0.6),
(21, 'Perilaku tidak Bertanggung Jawab, mannerisme, kecenderungan selalu menyendiri (solitary), hampa tujuan dan hampa perasaan', 0.8),
(22, 'Afek dangkal (shallow) dan tidak wajar (inappropriate), cekikikan (giggling) atau perasaan puas diri, senyum sendiri, sikap tinggi hati, tertawa menyeringai, mannerisme, mengibuli secara senda gurau, keluhan hipokondrikal, dan unkapan kata yang diulang-ul', 0.8),
(23, 'Proses pikir mengalami disorganisasi dan pembicaraan tak menentu (rambling) serta inkoheren.', 0.6),
(24, 'Stupor (amat berkurangnya dalam reaktivitas terhadap lingkungan dan aktivitasa spontan) atau mutisme (tidak berbicara).', 0.8),
(25, 'Gaduh-gelisah ( tampak jelas aktivitas motorik yang tidak bertujuan).', 0.8),
(26, 'Menampilkan Posisi Tubuh Tertentu ( secara sukarela mengambil dan mempertahankan posisi tubuh tertentu yang tidak wajar.', 0.8),
(27, 'Rigiditas ( mempertahankan posisi tubuh yang kaku untuk melawan upaya menggerakan dirinya.', 0.8),
(28, 'Fleksibilitas Cerea ( mempertahan kan anggota gerak dan tubuh dalam posisi yang dapat dibentuk dari luar.', 0.8),
(29, 'Command Automatism ( kepatuhan secara otomatis terhadap perintah) , dan pengulangan kata-kata serta kalimat-kalimat.', 0.8),
(30, 'Negativisme ( tampak jelas perlawanan yang tidak bermotif terhadap semua perintah atau upaya untuk menggerakan , atau pergerakan kearah yang berlawanan).', 0.8),
(31, 'Terdapat Riwayat satu episode psikotik yang jelas di masa lampau.', 0.8),
(32, 'Sedikitnya sudah melampaui kurun waktu satu tahun dimana intensitas dan frekuensi gejala yang nyata telah sangat berkurang (minimal) dan telah timbul sindrom ', 0.8),
(33, 'Tidak terdapat dementia atau penyakit/gangguan otak organik lain, depresi kronis atau institusinalisasi yang dapat menjelaskan disabilitas negatif tersebut.', 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_relasicf`
--

CREATE TABLE `tb_relasicf` (
  `ID` int(11) NOT NULL,
  `kode_diagnosa` varchar(16) NOT NULL,
  `kode_gejalacf` varchar(16) NOT NULL,
  `mb` double NOT NULL,
  `md` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_relasicf`
--

INSERT INTO `tb_relasicf` (`ID`, `kode_diagnosa`, `kode_gejalacf`, `mb`, `md`) VALUES
(31, 'D01', 'G001', 0.8, 0.2),
(32, 'D01', 'G002', 0.8, 0.2),
(33, 'D01', 'G003', 0.6, 0.2),
(34, 'D01', 'G005', 0.6, 0.4),
(35, 'D01', 'G006', 0.6, 0.4),
(36, 'D01', 'G007', 0.2, 0.8),
(37, 'D01', 'G008', 0.6, 0.4),
(38, 'D01', 'G009', 0.8, 0.2),
(39, 'D01', 'G010', 0.6, 0.4),
(40, 'D01', 'G013', 0.8, 0.2),
(41, 'D01', 'G015', 0.6, 0.4),
(42, 'D01', 'G016', 0.8, 0.2),
(43, 'D01', 'G017', 1, 0),
(44, 'D01', 'G018', 1, 0),
(45, 'D01', 'G025', 0.8, 0.2),
(46, 'D02', 'G001', 0.8, 0.2),
(47, 'D02', 'G010', 0.6, 0.4),
(48, 'D02', 'G011', 0.6, 0.4),
(49, 'D02', 'G012', 0.8, 0.2),
(50, 'D02', 'G013', 0.8, 0.2),
(51, 'D02', 'G014', 0.6, 0.4),
(52, 'D02', 'G020', 0.6, 0.4),
(53, 'D02', 'G021', 0.8, 0.2),
(54, 'D02', 'G022', 0.8, 0.2),
(55, 'D02', 'G023', 0.6, 0.4),
(56, 'D02', 'G025', 0.8, 0.2),
(57, 'D02', 'G029', 0.8, 0.2),
(58, 'D03', 'G001', 0.8, 0.2),
(59, 'D03', 'G002', 0.8, 0.2),
(60, 'D03', 'G004', 0.6, 0.4),
(61, 'D03', 'G005', 0.6, 0.4),
(62, 'D03', 'G006', 0.6, 0.4),
(63, 'D03', 'G009', 0.8, 0.2),
(64, 'D03', 'G010', 0.6, 0.4),
(65, 'D03', 'G013', 0.8, 0.2),
(66, 'D03', 'G014', 0.6, 0.4),
(67, 'D03', 'G019', 0.8, 0.2),
(68, 'D03', 'G024', 0.8, 0.2),
(69, 'D03', 'G025', 0.8, 0.2),
(70, 'D03', 'G026', 0.8, 0.2),
(71, 'D03', 'G027', 0.8, 0.2),
(72, 'D03', 'G028', 0.8, 0.2),
(73, 'D03', 'G029', 0.8, 0.2),
(74, 'D03', 'G030', 0.8, 0.2),
(75, 'D04', 'G001', 0.8, 0.2),
(76, 'D04', 'G006', 0.6, 0.4),
(77, 'D04', 'G010', 0.6, 0.4),
(78, 'D04', 'G011', 0.6, 0.4),
(79, 'D04', 'G012', 0.8, 0.2),
(80, 'D04', 'G023', 0.6, 0.2),
(81, 'D05', 'G001', 0.8, 0.2),
(82, 'D05', 'G010', 0.6, 0.4),
(83, 'D05', 'G031', 0.8, 0.2),
(84, 'D05', 'G032', 0.8, 0.2),
(85, 'D05', 'G033', 0.6, 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_relasids`
--

CREATE TABLE `tb_relasids` (
  `ID` int(11) NOT NULL,
  `kode_diagnosa` varchar(11) NOT NULL,
  `kode_gejalads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_relasids`
--

INSERT INTO `tb_relasids` (`ID`, `kode_diagnosa`, `kode_gejalads`) VALUES
(11, 'G1', 1),
(13, 'G2', 1),
(14, 'G3', 1),
(15, 'G4', 1),
(16, 'G5', 1),
(17, 'G1', 2),
(18, 'G3', 2),
(19, 'G1', 3),
(20, 'G3', 4),
(21, 'G1', 5),
(22, 'G3', 5),
(23, 'G1', 6),
(24, 'G3', 6),
(25, 'G4', 6),
(26, 'G1', 7),
(27, 'G1', 8),
(28, 'G1', 9),
(29, 'G3', 9),
(30, 'G1', 10),
(31, 'G2', 10),
(32, 'G3', 10),
(33, 'G4', 10),
(34, 'G5', 10),
(35, 'G2', 11),
(36, 'G4', 11),
(37, 'G2', 12),
(38, 'G4', 12),
(39, 'G1', 13),
(40, 'G2', 13),
(41, 'G3', 13),
(42, 'G2', 14),
(43, 'G3', 14),
(44, 'G1', 15),
(45, 'G1', 16),
(46, 'G1', 17),
(47, 'G1', 18),
(48, 'G3', 19),
(49, 'G2', 20),
(50, 'G2', 21),
(51, 'G2', 22),
(52, 'G2', 23),
(53, 'G4', 23),
(54, 'G3', 24),
(55, 'G1', 25),
(56, 'G2', 25),
(57, 'G3', 25),
(58, 'G3', 26),
(59, 'G3', 27),
(60, 'G3', 28),
(61, 'G3', 29),
(62, 'G2', 29),
(63, 'G3', 30),
(64, 'G5', 31),
(65, 'G5', 32),
(66, 'G5', 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_diagnosacf`
--
ALTER TABLE `tb_diagnosacf`
  ADD PRIMARY KEY (`kode_diagnosa`);

--
-- Indexes for table `tb_diagnosads`
--
ALTER TABLE `tb_diagnosads`
  ADD PRIMARY KEY (`kode_diagnosa`);

--
-- Indexes for table `tb_gejalacf`
--
ALTER TABLE `tb_gejalacf`
  ADD PRIMARY KEY (`kode_gejalacf`);

--
-- Indexes for table `tb_gejalads`
--
ALTER TABLE `tb_gejalads`
  ADD PRIMARY KEY (`kode_gejalads`);

--
-- Indexes for table `tb_relasicf`
--
ALTER TABLE `tb_relasicf`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kode_diagnosa` (`kode_diagnosa`),
  ADD KEY `kode_gejala` (`kode_gejalacf`);

--
-- Indexes for table `tb_relasids`
--
ALTER TABLE `tb_relasids`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `kode_diagnosa` (`kode_diagnosa`),
  ADD KEY `kode_gejala` (`kode_gejalads`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gejalads`
--
ALTER TABLE `tb_gejalads`
  MODIFY `kode_gejalads` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_relasicf`
--
ALTER TABLE `tb_relasicf`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `tb_relasids`
--
ALTER TABLE `tb_relasids`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_relasicf`
--
ALTER TABLE `tb_relasicf`
  ADD CONSTRAINT `tb_relasicf_ibfk_1` FOREIGN KEY (`kode_diagnosa`) REFERENCES `tb_diagnosacf` (`kode_diagnosa`),
  ADD CONSTRAINT `tb_relasicf_ibfk_2` FOREIGN KEY (`kode_gejalacf`) REFERENCES `tb_gejalacf` (`kode_gejalacf`);

--
-- Constraints for table `tb_relasids`
--
ALTER TABLE `tb_relasids`
  ADD CONSTRAINT `tb_relasids_ibfk_1` FOREIGN KEY (`kode_diagnosa`) REFERENCES `tb_diagnosads` (`kode_diagnosa`),
  ADD CONSTRAINT `tb_relasids_ibfk_2` FOREIGN KEY (`kode_gejalads`) REFERENCES `tb_gejalads` (`kode_gejalads`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
