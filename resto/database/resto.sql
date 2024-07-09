-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 05:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataadmin`
--

CREATE TABLE `dataadmin` (
  `idadmin` int(255) NOT NULL,
  `adminname` varchar(30) NOT NULL,
  `passwordadmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataadmin`
--

INSERT INTO `dataadmin` (`idadmin`, `adminname`, `passwordadmin`) VALUES
(1, 'admin', 'admin'),
(2, 'egwgeg', 'gwgwgwwe'),
(3, 'aku12', 'aku12'),
(4, '5253', '53322');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `idlokasi` int(255) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`idlokasi`, `lokasi`, `deskripsi`) VALUES
(1, 'Persawahan', 'Restoran dekat persawahan'),
(2, 'Tengah Kota', 'Restoran ditengah kota'),
(3, 'Pinggir sungai', 'restoran pinggir sungai'),
(7, 'pinggir jalan', 'restoran dipinggir jalan');

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `idrestoran` int(255) NOT NULL,
  `idtema` int(255) NOT NULL,
  `idlokasi` int(255) NOT NULL,
  `namarestoran` text NOT NULL,
  `menu` text NOT NULL,
  `alamat` text NOT NULL,
  `waktubuka` text NOT NULL,
  `vectors` float NOT NULL,
  `vectorv` float NOT NULL,
  `gbrestoran` text NOT NULL,
  `deskripsi` text NOT NULL,
  `Latitude` varchar(200) NOT NULL,
  `Longitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`idrestoran`, `idtema`, `idlokasi`, `namarestoran`, `menu`, `alamat`, `waktubuka`, `vectors`, `vectorv`, `gbrestoran`, `deskripsi`, `Latitude`, `Longitude`) VALUES
(1, 1, 1, 'Restoran Sawah Buli Lewu', 'Patin Bakar, Nila Bakar, Juhu', 'Jl. Jepang, Pulau Telo, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516', '09.00–19.00', 5.56712, 0.143526, '2020-12-16.jpg', 'Restoran Sawah Buli Lewu adalah restoran bertema tradisional yang menyajikan makanan khas kapuas yang mengusung tema yang nostalgia ', '-2.9873956977817997', '114.38158515036821'),
(2, 3, 2, 'Wongsolo.Kapuas', 'ayam bakar, ayam goreng, patin goreng, patin bakar, nila bakar, nila goreng, lalapan, dll.', 'Depan Taman Baca ASKARI, Jl. Trans Kalimantan Bundaran Besar Kuala, Selat Dalam, Kuala, Kabupaten Kapuas, Kalimantan Tengah 73516', '09.00–21.00', 5.56712, 0.143526, 'wongsolo.jpg', 'Restoran Ayam Bakar Wong Solo didirikan oleh Puspo Wardoyo pada bulan April tahun 1991. Restoran Ayam Bakar Wong Solo mampu mengembangkan usahanya dan memperluas cabang restoran berkat bantuan modal dari Bank dan lembaga keuangan. Kesuksesan Ayam Bakar Wong Solo tidak hanya terdapat pada restorannya saja, pemilik sekaligus founder dari Ayam Bakar Wong Solo juga mendapat penghargaan sebagai “50 Pengusaha Terbaik” dari Presiden ke-5 Republik Indonesia Megawati Soekarno Putri.', '-2.9798720533007996', '114.40558225206301'),
(3, 1, 2, 'rumah makan BUNDO masakan padang', 'rendang, lalapan, ayam kemangi, ayam bakar, nila goreng, nila bakar', '2C92+38R, Selat Dalam, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516', '08.00–20.30', 5.56693, 0.143521, 'bundo.jpg', 'rumah makan BUNDO masakan padang rumah kaman sederhana yang menyaajikan makanan khas padang yang mengguggah selera dan mengenyangkan perut usahakan untuk mampir.', '-2.9821924782975215', '114.40080992698776'),
(4, 2, 2, 'Bilik Sementara Kopi', 'coffe, coffe mocktail, creamy coffe milk, macha, red valet, tea, katsudon, dan berbagi menu lainya', 'Jl. Pemuda No.KM. 1, Selat Dalam, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516', '09.00–23.00', 5.46199, 0.140816, 'bilikkopi.jpg', 'Bilik Sementara Kopi cafe kekinian dengan menu yang beragam yang terjangkau dan fun untuk hang out dengan teman-teman ', '-2.9914041699992704', '114.3970164413753'),
(5, 2, 2, 'Cofus Coffee', 'experso, capucino, americano, waffel, black forest, dan berbagai jenis makanan dan minuman', 'Samping Kantor Notaris Saddam, Jl. Pemuda No.Km. 0 1, Selat Dalam, Selat, Kapuas Regency, Central Kalimantan 73516', '10.00–22.00', 5.56712, 0.143526, 'cofus.jpg', 'Cofus Coffee cafe sederhana yang elegan ditenagh kota kuala kapuas', '-2.999313008424753', '114.39279198529269'),
(6, 3, 2, 'Ayam Penyet Sambal Korek At Taqwa', 'ayam goreng, ayam penyet, ayam bakar, nasi goreng, nila bakar, lina goreng, lalapan', 'X9XR+7C4, Jl. Tambun Bungai, Selat Tengah, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516', '10.30–21.00', 5.46199, 0.140816, 'penyet.jpg', 'Ayam Penyet Sambal Korek At Taqwa menyajikan berbagai macam menu penggugah selera pereda lapar', '-3.001648207309044', '114.39108290400421'),
(19, 1, 3, 'Dapoer Tepian Kapuas', 'bakso iga', 'Jl. Kapuas Seberang No.222, Mambulau, Kec. Kapuas Hilir, Kabupaten Kapuas, Kalimantan Tengah 73581', '10:00-21:00', 0, 0, '667c0ea6e32b7.jpg', 'Dapoer Tepian Kapuas restoran di tepi sungai kapuas dengan pesona yang memukau ', '-3.025544875464587', '114.39596361164625'),
(20, 1, 2, 'Bakso dan Mie Ayam Anugerah', 'bakso, mie ayam', 'Jl. Untung Surapati No.RT. 04, Mambulau, Kec. Kapuas Hilir, Kabupaten Kapuas, Kalimantan Tengah 73521', '09:00-21:00', 0, 0, '667c0f480b2bc.jpg', 'Bakso dan Mie Ayam Anugerah warung bakso pinggir jalan  dengan dengan kaldu rempah yang tak terlupakan', '-3.030565925083104', '114.39793169608035'),
(21, 1, 1, 'Warung Makan Al Fatah', 'ayam bakar/goreng, nila bakar/goreng, patin bakar/goreng, sayur asam , lalapan', 'XC63+GPF, Anjir Mambulau Bar., Kec. Kapuas Tim., Kabupaten Kapuas, Kalimantan Tengah', '06:30-19:30', 0, 0, '667c103cca75a.jpg', 'lapar dijalan mampir ke Warung Makan Al Fatah', '-3.0372947137990263', '114.40403940273474'),
(22, 2, 2, 'Monokrom Coffee', 'beraneka ragam kopi, kue dan ice cream', 'Jl Seth Adjie ruko kapuas TV Depan tower) Kapuas tv multimedia, Selat Hilir, Selat, Kapuas Regency, Central Kalimantan 73516', '10:00-23:00', 0, 0, '667c1139f2bcd.jpg', 'tempat bersantai dan bersenda gurau acfe murah dan terjangkau Monokrom Coffee', '-3.020095604383043', '114.38794515872173'),
(23, 2, 2, 'PERDANA CAFE', 'beraneka ragam kopi, kue dan makanaan ringan pelengkap obrolan', 'Jl. Sulawesi No.77, Selat Hilir, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516', '08:00-00:00', 0, 0, '667c12278772f.jpg', 'PERDANA CAFE tongrkongan seru sesudah ngantor', '-3.0064637443039923', '114.37848558598986'),
(24, 2, 2, 'Angkringan Jogja Patrum', 'berbagai macam jenis kopi, kue dan kudapan ringgan', 'Jl. Trans Kalimantan, Selat Tengah, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73516', '00:00-21:30', 5.59599, 0.14427, '667c12c7dfdfb.jpg', 'Angkringan Jogja Patrum cafe tema restro untuk kamu  yang rindu masa lalu', '-3.004751799460496', '114.38068886886737');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idreview` int(255) NOT NULL,
  `idrestoran` int(255) NOT NULL,
  `iduser` int(255) NOT NULL,
  `username` text NOT NULL,
  `namarestoran` text NOT NULL,
  `rasa` int(30) NOT NULL,
  `vibe` int(30) NOT NULL,
  `bersih` int(30) NOT NULL,
  `pelayanan` int(30) NOT NULL,
  `review` text NOT NULL,
  `tglpost` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`idreview`, `idrestoran`, `iduser`, `username`, `namarestoran`, `rasa`, `vibe`, `bersih`, `pelayanan`, `review`, `tglpost`) VALUES
(1, 1, 1, 'yudi23', 'Restoran Sawah Buli Lewu', 4, 4, 5, 4, 'makanannya enak tapi rada mahal', '2024-05-03 14:45:34'),
(2, 1, 2, 'eric45', 'Restoran Sawah Buli Lewu', 4, 3, 4, 3, 'makananya enak tapi pelayanan agak lambat dan harga kemahalan', '2024-05-03 14:45:34'),
(4, 2, 2, 'eric45', 'Wongsolo.Kapuas', 4, 3, 4, 3, 'enak si enak tapi males kembali pelayanan lambat dan suasana kurang seru', '2024-05-03 14:48:19'),
(5, 3, 1, 'yudi23', 'rumah makan BUNDO masakan padang', 4, 4, 4, 5, 'rendangnya pedas banget ', '2024-05-03 14:52:42'),
(6, 3, 2, 'eric45', 'rumah makan BUNDO masakan padang', 3, 5, 2, 5, 'makanaannya enak tapi wcnya kotor', '2024-05-03 14:52:42'),
(8, 4, 2, 'eric45', 'Bilik Sementara Kopi', 3, 4, 5, 4, 'kemahalan', '2024-05-03 14:55:03'),
(10, 5, 1, 'eric45', 'Cofus Coffee', 4, 2, 5, 4, 'tambahin music dong', '2024-05-03 14:57:17'),
(11, 6, 1, 'yudi23', 'Ayam Penyet Sambal Korek At Taqwa', 4, 4, 5, 4, 'xeberwhetjrwetr', '2023-05-24 00:00:00'),
(13, 6, 2, 'eric45', 'Ayam Penyet Sambal Korek At Taqwa', 3, 4, 3, 5, 'gwrgqegwrhrwjwrhw', '2023-05-24 00:00:00'),
(14, 6, 2, 'eric45', 'Ayam Penyet Sambal Korek At Taqwa', 3, 4, 3, 5, 'gwrgqegwrhrwjwrhw', '2023-05-24 00:00:00'),
(15, 6, 2, 'eric45', 'Ayam Penyet Sambal Korek At Taqwa', 3, 4, 3, 5, 'gwrgqegwrhrwjwrhw', '2023-05-24 00:00:00'),
(16, 6, 2, 'eric45', 'Ayam Penyet Sambal Korek At Taqwa', 3, 4, 3, 5, 'gwrgqegwrhrwjwrhw', '2023-05-24 00:00:00'),
(17, 6, 2, 'eric45', 'Ayam Penyet Sambal Korek At Taqwa', 3, 4, 3, 5, 'gwrgqegwrhrwjwrhw', '2023-05-24 00:00:00'),
(18, 7, 1, 'yudi23', 'euqfuwobf', 3, 4, 2, 5, 'fuwdwudouwhdh', '2025-05-24 00:00:00'),
(19, 7, 1, 'yudi23', 'euqfuwobf', 3, 4, 2, 5, 'fuwdwudouwhdh', '2025-05-24 00:00:00'),
(20, 8, 1, 'yudi23', 'dfwqqf', 3, 5, 4, 4, 'dvigeououefoheoufhiqefuqeof', '2025-05-24 00:00:00'),
(21, 8, 1, 'yudi23', 'dfwqqf', 3, 5, 4, 4, 'dvigeououefoheoufhiqefuqeof', '2025-05-24 00:00:00'),
(22, 8, 1, 'yudi23', 'dfwqqf', 3, 5, 4, 4, 'dvigeououefoheoufhiqefuqeof', '2025-05-24 00:00:00'),
(23, 8, 1, 'yudi23', 'dfwqqf', 3, 5, 4, 4, 'dvigeououefoheoufhiqefuqeof', '2025-05-24 00:00:00'),
(24, 9, 1, 'yudi23', 'dfwqqf', 3, 2, 4, 2, 'djqwdodiuqwdbqudidq', '2027-05-24 00:00:00'),
(25, 10, 2, 'eric45', 'dfwqqf', 4, 2, 5, 3, 'tryjyryjrjr', '2027-05-24 00:00:00'),
(26, 10, 2, 'eric45', 'dfwqqf', 4, 2, 5, 3, 'tryjyryjrjr', '2027-05-24 00:00:00'),
(27, 10, 2, 'eric45', 'dfwqqf', 4, 2, 5, 3, 'tryjyryjrjr', '2027-05-24 00:00:00'),
(28, 10, 2, 'eric45', 'dfwqqf', 4, 2, 5, 3, 'fqgegegw', '2027-05-24 00:00:00'),
(29, 4, 2, 'eric45', 'Bilik Sementara Kopi', 4, 3, 4, 5, 'QBCOEOFBOEBOEOEE', '2027-05-24 00:00:00'),
(31, 2, 1, 'yudi23', 'Wongsolo.Kapuas', 4, 4, 5, 3, 'vaveeve', '2003-06-24 00:00:00'),
(37, 4, 3, 'kevin26', 'Bilik Sementara Kopi', 2, 5, 3, 4, 'dvdbsbs', '2015-06-24 00:00:00'),
(38, 4, 3, 'kevin26', 'Bilik Sementara Kopi', 4, 5, 4, 5, 'dbsbsbsb', '2015-06-24 00:00:00'),
(43, 4, 7, 'kevin266', 'Bilik Sementara Kopi', 4, 4, 3, 5, 'oqfpiefhoehfebfqfouqhfqeof', '2027-06-24 00:00:00'),
(45, 24, 7, 'kevin266', 'Angkringan Jogja Patrum', 3, 4, 5, 4, 'suaasana enak lampu berwarna kuning memberikan suasnaa retro ', '2027-06-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `idtema` int(255) NOT NULL,
  `tema` varchar(15) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`idtema`, `tema`, `deskripsi`) VALUES
(1, 'Rumah Makan', 'Rumah makan yang nyaman dengan dekorasi yang hangat, menyajikan hidangan autentik dengan sentuhan modern. Suasana ramah dan menu beragam, cocok untuk bersantap santai atau acara spesial.'),
(2, 'Cafe', 'Cafe yang cozy dengan aroma kopi menggoda, tempat sempurna untuk bertemu teman atau menikmati waktu sendiri. Desain interior yang stylish dan menu kreatif, menyuguhkan pengalaman bersantap yang unik dan menyenangkan.'),
(3, 'Restoran', 'Tempat yang menyediakan layanan makanan dan minuman dengan beragam menu untuk dinikmati oleh pelanggan dalam suasana yang nyaman dan bersantap.'),
(4, 'Tradisional', 'Restoran bertama tradisional yang menyajikan makanan makan tradisional lokal ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`) VALUES
(1, 'yudi23', '123456789'),
(2, 'eric45', '987654321'),
(3, 'kevin26', 'admin'),
(4, 'QEVQEF', '556ff87'),
(6, 'widoqwdhoqw', 'wubdowqdouh'),
(7, 'kevin266', '111111'),
(8, 'samsuri33', '1717');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataadmin`
--
ALTER TABLE `dataadmin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`idlokasi`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`idrestoran`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idreview`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`idtema`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataadmin`
--
ALTER TABLE `dataadmin`
  MODIFY `idadmin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `idlokasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `idrestoran` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idreview` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `idtema` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
