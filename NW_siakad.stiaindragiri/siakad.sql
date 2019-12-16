-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 05:39 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosemengajar`
--

CREATE TABLE IF NOT EXISTS `dosemengajar` (
  `id_mengajar` int(11) NOT NULL AUTO_INCREMENT,
  `kode_dosen` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdmatkul` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdkelas` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `dosenlain` text COLLATE latin1_general_ci NOT NULL,
  `jumlahtatapmuka` int(4) NOT NULL,
  `tahun` int(4) NOT NULL,
  `kdjur` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `semester` int(2) NOT NULL,
  PRIMARY KEY (`id_mengajar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `dosemengajar`
--

INSERT INTO `dosemengajar` (`id_mengajar`, `kode_dosen`, `kdmatkul`, `kdkelas`, `dosenlain`, `jumlahtatapmuka`, `tahun`, `kdjur`, `semester`) VALUES
(45, '1016068603', 'MWI03', '', 'Surya Akbar\r\n', 0, 2014, '63201', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `kode_dosen` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_dosen` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `golongan` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `status_dosen` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `spesial_mengajar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kode_dosen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`kode_dosen`, `nama_dosen`, `password`, `alamat`, `telpon`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `jabatan`, `golongan`, `status_dosen`, `spesial_mengajar`) VALUES
('1005038802', 'DWI HERLINDA', 'ea568d260a956bdf0dbd4140558bcc93', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Wanita', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1003108701', 'EMA FITRI LUBIS', 'e96e4228dddc05709d8dbd1bdb80cbe7', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Wanita', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1010028901', 'AMIR SYAMSUADI', '248970d9dfa8adb1ababbf8fe975fe6d', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '2017-11-12', 'S2', '', '', 'Dosen Tetap', ''),
('1016068603', 'ERICK MAISON PUTRA', '3f13117ee0e2a4524f04acf0e2eafdaa', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1010098101', 'MANDATARIS', 'dc7a9dbaaf4606c1ec37a38ff32f7056', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1011028701', 'MUHAMMAD HANAFI', '65ea38159a45609c7024be426cfc686c', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1010108307', 'PISLAWATI', '98c39ec61a8fc990673c3bca58800c38', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Wanita', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1005058705', 'RINALDI ROSBA', 'e05e501a5b1a1934434b29ca1db3f7d1', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1026128503', 'RIZA EFENDI', '2d0d275356b76ddbd8017bd1835ffcc7', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1025037905', 'ROMAGIA', '83d3c08fce7dbcef8be69264151e187f', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Wanita', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1025038801', 'SURYA AKBAR', 'a1c89fdd0161d9a21a87859146f55f89', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1002098802', 'SUYENO', '473d96ef6f256484222c11f8106c9a7b', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', 'ADM'),
('1016038702', 'SYAFRIJON ARIPAH', '4f828c94cb0ec0c8a144901b84d5a641', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1007108801', 'YUDADIBRATA', '11358ac014d853fee80a2975e33d3744', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1021068801', 'ZATUL AKMAM', '85365496c43a0a23a7901b776f7a7a09', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '1970-01-01', 'S2', '', '', 'Dosen Tetap', ''),
('1012699301', 'Reza Safitri', '497c9f9fd290bae5b4df4bd477444574', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Wanita', '', '2017-11-13', 'S2', '', '', 'Dosen Tetap', ''),
('1026108902', 'Benny Asmali Indra', 'c1aae8700c0784fd3b95deb4a1618af3', 'Jl. Raya Pematang Reba Perumahan Aura Residence', '', 'Pria', '', '2017-11-13', 'S2', '', '', 'Dosen Tetap', '');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `kdfak` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nmfak` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nippimpinan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `almtfak` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kdfak`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kdfak`, `nmfak`, `nippimpinan`, `almtfak`) VALUES
('ADM', 'ADMINSTRASI', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) NOT NULL,
  `semester` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `kdmatkul` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdkelas` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `ruangan` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `rtmuka` int(2) NOT NULL,
  `timpengajar` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `kdjur` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nmjur` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nipketua` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nmketua` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kdjur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kdjur`, `nmjur`, `nipketua`, `nmketua`) VALUES
('63201', 'ADMINISTRASI NEGARA', '', ''),
('63211', 'ADMINISTRASI BISNIS', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kdkelas` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nmkelas` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `ruang` varchar(5) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kdkelas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kdkelas`, `nmkelas`, `ruang`) VALUES
('ADMNEGARA', 'ADMNEGARA', '-'),
('ADMBISNIS', 'ADMBISNIS', '-');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
  `id_krs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(18) COLLATE latin1_general_ci NOT NULL,
  `tahun` int(4) NOT NULL,
  `semester` int(2) NOT NULL,
  `ket` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `kdjur` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdmatkul` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdkelas` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kode_dosen` varchar(15) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_krs`),
  KEY `nim` (`nim`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=202 ;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `nim`, `tahun`, `semester`, `ket`, `kdjur`, `kdmatkul`, `kdkelas`, `kode_dosen`) VALUES
(172, 'AKA012029', 2011, 3, 'Ganjil', '030303', 'VF0007', 'AK', '15002002'),
(164, 'AKA012029', 2009, 1, 'Ganjil', '030303', 'ME0002', 'AK', '15002001'),
(165, 'AKA012029', 2009, 1, 'Ganjil', '030303', 'MA0003', 'AK', '15002001'),
(166, 'AKA012029', 2009, 1, 'Ganjil', '030303', 'AP0004', 'AK', '15002001'),
(167, 'AKA012029', 2009, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002001'),
(140, '020202', 2010, 1, 'Ganjil', '020202', 'MW0001', 'MI', '15002001'),
(168, 'AKA012029', 2010, 2, 'Genap', '030303', 'MY0009', 'AK', '15002001'),
(142, '030303', 2010, 3, 'Ganjil', '030303', 'DC0008', 'AK', '15002002'),
(149, '030303', 2010, 1, 'Ganjil', '030303', 'ME0002', 'AK', '15002002'),
(150, '030303', 2010, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002002'),
(169, 'AKA012029', 2010, 2, 'Genap', '030303', 'DC0008', 'AK', '15002001'),
(170, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'ME0002', 'AK', '15002002'),
(171, 'AKA012029', 2011, 3, 'Ganjil', '030303', 'VB0006', 'AK', '15002002'),
(174, 'AKA012029', 2011, 3, 'Ganjil', '030303', '3D0010', 'AK', '15002002'),
(173, 'AKA012029', 2011, 3, 'Ganjil', '030303', 'CD0005', 'AK', '15002002'),
(175, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'AP0004', 'AK', '15002002'),
(176, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'MA0003', 'AK', '15002002'),
(177, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002002'),
(178, 'AKA012029', 2011, 2, 'Genap', '030303', 'AA002', 'AK', '15002001'),
(179, 'AKA012029', 2011, 2, 'Genap', '030303', 'EA001', 'AK', '15002001'),
(180, 'AKA012001', 2011, 1, 'Ganjil', '030303', 'AP0004', 'AK', '15002002'),
(181, 'AKA012001', 2011, 1, 'Ganjil', '030303', 'ME0002', 'AK', '15002002'),
(182, 'AKA012001', 2011, 1, 'Ganjil', '030303', 'MA0003', 'AK', '15002002'),
(183, 'AKA012001', 2011, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002002'),
(185, 'AKA012002', 2011, 1, 'Ganjil', '030303', 'AP0004', 'AK', '15002002'),
(186, 'AKA012002', 2011, 1, 'Ganjil', '030303', 'ME0002', 'AK', '15002002'),
(187, 'AKA012002', 2011, 1, 'Ganjil', '030303', 'MA0003', 'AK', '15002002'),
(188, 'AKA012002', 2011, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002002'),
(198, 'AKA012003', 2011, 1, 'Ganjil', '030303', 'ME0002', 'AK', '15002002'),
(199, 'AKA012003', 2011, 1, 'Ganjil', '030303', 'MA0003', 'AK', '15002002'),
(200, 'AKA012003', 2011, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002002'),
(197, 'AKA012003', 2011, 1, 'Ganjil', '030303', 'AP0004', 'AK', '15002002'),
(201, '1011111', 2015, 1, 'Ganjil', 'J001', 'CD0005', 'MI', '15002001');

-- --------------------------------------------------------

--
-- Table structure for table `krs_temp`
--

CREATE TABLE IF NOT EXISTS `krs_temp` (
  `id_krs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `tahun` int(4) NOT NULL,
  `kdjur` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdmatkul` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nmmatkul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `sks` int(2) NOT NULL,
  `kdkelas` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `ket` varchar(6) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_krs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(18) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kdjur` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `angkatan` int(4) NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `tplhr` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tglhr` date NOT NULL,
  `jekel` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `notelp` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `asalsekolah` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `thlulus` int(4) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password`, `nama`, `kdjur`, `angkatan`, `foto`, `alamat`, `tplhr`, `tglhr`, `jekel`, `agama`, `notelp`, `asalsekolah`, `thlulus`) VALUES
('14063201016', 'd18f5e300f90103d864bb6f5daaf101e', 'Deni Juni Fitriadi', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201017', '415f8ec4101442b221940807947eb1f1', 'R.Muhammad Yunus', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201011', '63daeb50e0660c18b6e4e72ac047e727', 'Nopa Widiyanti', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201012', '0f0de1832bbbf1bd6576fcd001aa6451', 'Iis Rahayu Saputra', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201008', '83b0130d1e2e8d2e8d23ba05284a1a46', 'Venny Elza Alvionita', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201006', '06fb35d74823807e6acd276dc2094301', 'Lia Safitri', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201007', '2cd41679b2c9288f5cd9ddb855c9967a', 'Ella Rahmita', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201005', 'ad4f56c3264f14150a955f08f9a77424', 'Efriono', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201003', 'fff2b821d2873249e98e1b07f7e41c8a', 'Inggit Gracia Anggraini', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201004', 'aaedc9219f8c6f7042ef3f4389bf7045', 'Atina Kurniati', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201002', 'c0610351b7e5ed1ca388904e11375216', 'Yuni Shintiya', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201024', '2d4e6cad9287dd18e89cff00000409a6', 'Nurhalimah', '63211', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201001', 'f14b47f231a151224802b50a467bf05d', 'Yayuk', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201019', '7105bf8f2e5f51fb9b636eba20a3fbe8', 'Ike Emiliawati', '63211', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201010', '020407d1409cb863486c385bf8cc8078', 'Singgih Pandawa Sanyoto', '63211', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201013', '8103934a3fb6e4d82ae39ae92cae5c17', 'Fhad Ibnu Sina Basharahil', '63211', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201014', '262fa286c5737f70bd7dba06ed9e2e6d', 'Shaniyah', '63211', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201018', 'e9c5c06124886725947b79e50b80620c', 'Syatria Dwi Putrananda', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201020', '86d0cf469a02351acd8a1d47b6f71866', 'Raja Reni', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201025', '487f6357f216160d949c48137cf102cb', 'Adelina Mardiana', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201026', '65c2fd6b76b08c17a6147eed973230e0', 'Alparita', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201028', '8a7b43feb83b7407964f3730ee31df6f', 'Risky Arianto', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201029', 'ca8a5d40ed6cd599a215d8d68bce803c', 'Doni Dewantara', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('14063201030', 'b64459c982fbd26f3f3eecbe72f14c0b', 'Muhtadin', '63201', 2014, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201031', 'e98247ad76d35e7b2ef2adabbd8f0500', 'Vera Safitri', '63211', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201032', '177199c70dd55377a35724c619cdf856', 'Resi Trisnawati', '63211', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201033', 'b73f2bfdb5d06c613a18738984b0df16', 'Nurevi', '63211', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201034', '83a92a5c508d588c990323f95d6c8278', 'Ahmad Solohin', '63211', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201039', 'ec15e2747d359ef138fec9a388d71d8b', 'Hafizul Akbar', '63211', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201036', '2e77e5c50e1835850605ae9741d8d7c1', 'Syarifah Nurul Amiyati', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201037', 'ece2b41a4a21ab6729852eaa0b912dcc', 'Frans Sandini', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201038', '26462a9fbdb3f3fc8b5d24d23a5d7a9e', 'Soviani', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201040', '4237f17354ae29f8f2c386071b1fd891', 'Musrinah', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201041', 'be8cfc40864d6571c20f5f8f02d7e7f7', 'Joko Cahyono', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201042', 'c6ef9a382463ab25ae8034851e9dc44f', 'Eva Rustika Dewi', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201043', 'aa5c16804661caeab729d1e99553fc01', 'Said Alfian', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201044', '14adb88997b08f2559c65026ad343c57', 'Shintya Devi Istiyan  Damayanti', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201045', '6a8bbf881a50aac86db37d13d62255ba', 'Funcy Olvionica', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201046', '2cd2c3f1f8625be4dcb0ca5204838306', 'Viki Lara Sandra', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201047', '4fdeea37d7d7a5be4c0db2b6e82e268e', 'Faizal Zuhri', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201048', '068101f5c459ce315010f893cc27ca32', 'Nurhayati', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201049', '5ab7afc721d968f22bc031e54a8836ce', 'Siska Fitriani', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('15063201050', 'ae95b254d79511e804086f0f7ee7958e', 'Roheni Fathiatus Hasanah', '63201', 2015, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201051', '71ea1e7d46ea8eb2d033b862fe566e1d', 'Desi Safitri', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201052', '5984ac70960f1aa1b20a34d95edac49b', 'Rizki Aulia Rahman', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201060', '1dad011d2d05c2f1380467ae348764e9', 'Nanda Odela Pratiwi', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201065', 'fde2b6c4e9daf47e75257f65ac38954f', 'Anjelina', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201066', '180bb22a33b5400394bf59948b83906d', 'Asnira', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201067', '017e192220ffcd5c3f2bb19d1400018a', 'Miftahul Amin', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201068', 'ab0649aedcac158278b52dce983fff4b', 'Raja Abdullah', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('', 'd41d8cd98f00b204e9800998ecf8427e', '', '0', 0, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201069', '3ec2c82e046f61cba3e0ea9311140b6b', 'Nurhayati', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201070', '6d9f2c7d01248c2c87aef274454856bf', 'Ferengki', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201071', '56f14e1f337e0d3edb6691f3f13491f0', 'Irpandu', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201072', '446eeaac851728502155ebed818ae845', 'Yandri Saputra', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201073', 'f20590e186dd6ab331fd58f9d16cf4ba', 'Raih Danang Maspati', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201074', '141758647f0273436a481e1f4a7cf46a', 'Dedi Triyadi', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201075', '4e0c31aef7174482d03129d92088be13', 'Mila Sari', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201076', '669b1bbadf4e70dc613966ad0aaeeecb', 'Okta Mutiara', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201077', '2a7428e152b532da06711c034b3cf59d', 'Yuni Andriani', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201078', '1c270871dc53a8c5ebade933d5804e4a', 'Fairim', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201079', '8a453cb84ca80f752b6d3585d148d2b5', 'Mona Lisa', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201080', 'ca5b097658c05a86cffe7023af925f20', 'Fitri Yuni Yulanda', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201081', 'c583771bb7af8d07c4ee17250f745eab', 'Nikmatus Sholehah', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201082', '543281b3de3448d353ee4632a2e67877', 'Syarifah Kurniawati', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201083', '4cb38aecd9685d0352359d619f58d635', 'Siti Khotijah', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201085', '206a7bf6cfe65a3c2076ff6ca2b88f0b', 'Hery Prima Ramadhanu', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201087', 'd2aab73907836f5c15996690397b3758', 'Sinta Permata Sari', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201088', '6786c8e84af37954df744500a859d206', 'Dewi Irmayanti', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201089', '9ea500cb7100367faca23019700f1bab', 'Sasti Lestari', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201090', 'e35c627bea38ea0bd944f5e2622d9158', 'Rini Sulistiawati', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201091', 'f89a9456a6872e49f8e6a90933595bd6', 'Nadim Ersyad', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201093', '76e103439f2e82d819856b3df436b15e', 'Ummi Darai', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201096', '3dce2571398fd55f5be0be0266340f6c', 'Kahamrin', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201097', '5d91d46043ed79649dd806c1f4aa0bc5', 'Gambusja', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201098', 'bcf9c2849dc2a31778b637a06377ec7c', 'Liodi Darmawan Saputra', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201099', '54e05728134723bb106816dd417d477d', 'Ferdi Perdana', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201100', '1c050a3cd9278a83f6425ba92532448a', 'Ahmad', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201101', '3bae45361575e921434563fc917c6fee', 'Dewi Sundari', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201102', '55ccf2b5404a9dce3ac04f8add6ed847', 'Nadia Hawwin Alaina', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201104', '6d3a53606b951d72cc2a3a2af67514eb', 'Ria Nindriani', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201106', 'f3fbabb27e2c772f47e76c615ecd965f', 'Deni Firmansah', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201107', '106c9e00c73e96c84d5aa835c1ff683e', 'Ari Syafrizal', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201108', '4fe14d7c1aff3deca1dd9d844e017a09', 'Raja Idasri', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201109', '0b3a7b86ed828031b2ec110e920b3914', 'M.Razil', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201110', '9e2afbd8c2bcbaf63efafcdcae773f3a', 'Yuni Indrayani', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201111', 'e71e7fb54c71f7601a33ef47421b5506', 'Ari Prayetno', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201112', 'e0ea61af6d44ae5347e4fc92e137642b', 'Novia Ulianti', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201114', 'c66bf79528f52f8b39c70bab4098f777', 'Aan Sundari', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201115', '31dd65c6ab914f9873c0a9907acf5a0c', 'Kurnia', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201119', '8c395ae404fe9272a8935c41135f4e58', 'Nova Anjelika', '63211', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201050', 'face7bb82f2cdc2ee541202f41fd1875', 'Ayu Rizki Ananda', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201053', '84cb4ffd2c219dd6c87ad5aae1956f3e', 'Mulyadi', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201054', 'e7a6f015b3b4279f897a35b2e6855184', 'Yandri Arianto', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201055', '754043d44d338d51939ae0dad4731012', 'Epi Saputra', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201056', 'd9cbca344beab9d90751adc25ffe400e', 'Susanti', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201057', '62a4ccddaaaebefb14445fabc2af544b', 'Rina', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201058', '79c474b5039b1be968a2bc6884433f35', 'Syarifah Perawati', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201059', '627ce7a1dafb6239b650a5e36de029cc', 'Syarifah Hariati', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201061', '546e51be82286f804596489d75720b6b', 'Anggun Nabila Maria', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201062', '1e207218eb8558916a50ba6bddeb0974', 'Siti Khodijah', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201063', 'c88fcf1bdc46f3a86bb90a3598b934f0', 'Norma Ehsani', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201064', '64037cc31a7d4e9c464b4c78f0869f1d', 'Zulkarnaen', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201084', '0d075c93f9e4604da0498eadd057ec9a', 'Purwati Lestari ', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201086', 'cfaf63be5f1992cf403c145366770adf', 'Wahyu Dianingsih', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201094', 'e5cae79fbac86dc4e097c2a932e45832', 'Riski Kurniawan', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201095', 'fc89a067193027c0378d731824f9a1a3', 'Setia Jaya', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201103', '1592753dc5840556ae19fc3384c831b0', 'Didik Agus Kurniawan', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201105', '5f0b8851b772e01956e7d6cf96e4fa02', 'Eka Prasetio', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201113', '8e5e3ba684175fc26f89b1d69fa77686', 'Febrama', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201116', 'c64565f20e73600a2dd939eef8a21e95', 'Zaitun', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201117', '5f06c19b78ef7a693d11bd3ffa22ade1', 'Epa Yulianda', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201118', 'fc42a043f5a96c7f1016fab6ed713588', 'Heni Apmelianti', '63201', 2016, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0),
('16063201120', 'd0338aee6d3a85d15db0bdfdf46dbe04', 'Uswatul Hasanah', '0', 0, '', '', '', '2017-01-01', 'Pria', 'Islam', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kdmatkul` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nmmatkul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sks` int(2) NOT NULL,
  `jenis` varchar(7) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kdmatkul`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kdmatkul`, `nmmatkul`, `sks`, `jenis`) VALUES
('MAB01', 'Pengantar Ilmu Administrasi Bisnis', 3, 'Teori'),
('MWI06', 'Azas-Azas Manajemen', 3, 'Teori'),
('MWI05', 'Pengantar Ilmu Ekonomi', 3, 'Teori'),
('MWI04', 'Pengantar Ilmu Politik', 3, 'Teori'),
('MWI03', 'Bahasa Indonesia', 3, 'Teori'),
('MWI02', 'Pendidikan Pancasila dan Kewarganegaraan', 2, 'Teori'),
('MWI01', 'Pendididkan Agama', 2, 'Teori'),
('MWI07', 'Sistem Politik Indonesia', 3, 'Teori'),
('MAB02', 'Sistem Ekonomi Indonesia', 3, 'Teori'),
('MWI08', 'Bahasa Inggris', 3, 'Teori'),
('MWI09', 'Pengantar Sosiologi', 3, 'Teori'),
('MWI10', 'Pengantar Akuntansi', 3, 'Teori'),
('MWI11', 'Statistik', 3, 'Teori'),
('MWI12', 'Pengantar Ilmu Hukum', 3, 'Teori'),
('MWI13', 'Manajemen SDM', 3, 'Teori'),
('MWI14', 'Kepemimpinan', 3, 'Teori'),
('MWI15', 'Kewirausaahan', 3, 'Teori'),
('MAB03', 'Pemasaran ', 3, 'Teori'),
('MAB04', 'Akuntansi Biaya', 3, 'Teori'),
('MAB05', 'Etika Bisnis', 3, 'Teori'),
('MAB06', 'Ekonomi Makro ', 3, 'Teori'),
('MWI16', 'Metodologi Penelitian', 3, 'Teori'),
('MAB07', 'Ekonomi Mikro', 3, 'Teori'),
('MAB08', 'Teori Pengambilan Keputusan', 3, 'Teori'),
('MAB09', 'Komunikasi Bisnis', 3, 'Teori'),
('MAB10', 'Kebijakan Bisnis', 3, 'Teori'),
('MAB11', 'Filsafat Bisnis', 3, 'Teori'),
('MAB12', 'Teori Organisasi dan Administrasi', 3, 'Teori'),
('MWI17', 'Perpajakan ', 3, 'Teori'),
('MAB13', 'Manajemen Keuangan Bisnis', 3, 'Teori'),
('MAB14', 'Bisnis Internasional', 3, 'Teori'),
('MAB15', 'Perilaku Organisasi', 3, 'Teori'),
('MAB16', 'Ekonomi Kreatif dan Inovasi Bisnis', 3, 'Teori'),
('MAB17', 'Manajemen Pelayanan', 3, 'Teori'),
('MAB18', 'Perilaku Konsumsi', 3, 'Teori'),
('MAB19', 'Negosiasi Bisnis', 3, 'Teori'),
('MAB20', 'Operasi Bisnis', 3, 'Teori'),
('MAB21', 'Sistem Informasi Bisnis', 3, 'Teori'),
('MAB22', 'Analisa Bisnis', 3, 'Teori'),
('MAB23', 'Perencanaan dan Pengembangan Bisnis', 3, 'Teori'),
('MAB24', 'Bisnis Properti', 3, 'Teori'),
('MAB25', 'Bisnis Pendidikan', 3, 'Teori'),
('MAB26', 'Bisnis Hospitaliti', 3, 'Teori'),
('MAB27', 'Bisnis Perbankan', 3, 'Teori'),
('MAB28', 'Bisnis Online', 3, 'Teori'),
('MAB29', 'Bisnis UKM', 3, 'Teori'),
('MWI18', 'Magang ', 3, 'Praktek'),
('MWI19', 'Kuliah Kerja Nyata', 3, 'Praktek'),
('MWI20', 'Skripsi ', 3, 'Teori'),
('MAN01', 'Pengantar Ilmu Administrasi Negara', 3, 'Teori'),
('MAN02', 'Sistem Adm Negara Kesatuan RI', 3, 'Teori'),
('MAN03', 'Manajemen Pemerintahan & Otonomi Daerah', 3, 'Teori'),
('MAN04', 'Teori Organisasi', 3, 'Teori'),
('MAN05', 'Hukum Administrasi Negara', 3, 'Teori'),
('MAN06', 'Administrasi Pembangunan', 3, 'Teori'),
('MAN07', 'Kebijakan Publik', 3, 'Teori'),
('MAN08', 'Pengambilan Keputusan', 3, 'Teori'),
('MAN09', 'Manajemen Perkantoran', 3, 'Teori'),
('MAN10', 'Pelayanan Publik', 3, 'Teori'),
('MAN11', 'Teori Administrasi Publik', 3, 'Teori'),
('MAN12 ', 'Etika Administrasi Publik', 3, 'Teori'),
('MAN13', 'Birokrasi  ', 3, 'Teori'),
('MAN14', 'Administrasi Keuangan Publik', 3, 'Teori'),
('MAN15', 'Pembangunan Perkotaan dan Perdesaan', 3, 'Teori'),
('MAN16', 'Perbandingan Administrasi Negara', 3, 'Teori'),
('MAN17', 'Formulasi Kebijakan', 3, 'Teori'),
('MAN18', 'Perilaku Organisasi', 3, 'Teori'),
('MAN19', 'Reformasi Adm & Good Governance', 3, 'Teori'),
('MAN20', 'Pembangunan Kelembagaan', 3, 'Teori'),
('MAN21', 'Implementasi Kebijakan', 3, 'Teori'),
('MAN22', 'Kemitraan dalam Pembangunan', 3, 'Teori'),
('MAN23', 'Kebijakan & Praktek Pengentasan Kemiskinan', 3, 'Teori'),
('MAN24', 'Kebijakan Kependudukan', 3, 'Teori'),
('MAN25', 'Manajemen Bencana', 3, 'Teori'),
('MAN26', 'Monitoring Evaluasi', 3, 'Teori'),
('MAN27', 'Evaluasi Kinerja Sektor Publik', 3, 'Teori');

-- --------------------------------------------------------

--
-- Table structure for table `materibaru`
--

CREATE TABLE IF NOT EXISTS `materibaru` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `kdmatkul` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdjur` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `tahun` int(4) NOT NULL,
  `kdkelas` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `ket` enum('Genap','Ganjil') COLLATE latin1_general_ci NOT NULL DEFAULT 'Genap',
  `kode_dosen` varchar(15) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=77 ;

--
-- Dumping data for table `materibaru`
--

INSERT INTO `materibaru` (`id_materi`, `kdmatkul`, `kdjur`, `tahun`, `kdkelas`, `semester`, `ket`, `kode_dosen`) VALUES
(69, 'AA002', '030303', 2011, 'AK', 2, 'Genap', '15002001'),
(62, 'AP0004', '030303', 2011, 'AK', 1, 'Ganjil', '15002002'),
(64, 'VB0006', '030303', 2011, 'AK', 3, 'Ganjil', '15002002'),
(65, 'VF0007', '030303', 2011, 'AK', 3, 'Ganjil', '15002002'),
(66, 'CD0005', '030303', 2011, 'AK', 3, 'Ganjil', '15002002'),
(67, '3D0010', '030303', 2011, 'AK', 3, 'Ganjil', '15002002'),
(68, 'EA001', '030303', 2011, 'AK', 2, 'Genap', '15002001'),
(60, 'ME0002', '030303', 2011, 'AK', 1, 'Ganjil', '15002002'),
(61, 'MA0003', '030303', 2011, 'AK', 1, 'Ganjil', '15002002'),
(59, 'MW0001', '030303', 2011, 'AK', 1, 'Ganjil', '15002002'),
(54, 'ME0002', '030303', 2009, 'AK', 1, 'Ganjil', '15002001'),
(55, 'MA0003', '030303', 2009, 'AK', 1, 'Ganjil', '15002001'),
(63, 'AP0004', '030303', 2009, 'AK', 1, 'Ganjil', '15002001'),
(57, 'MY0009', '030303', 2010, 'AK', 2, 'Genap', '15002001'),
(58, 'DC0008', '030303', 2010, 'AK', 2, 'Genap', '15002001'),
(53, 'MW0001', '030303', 2009, 'AK', 1, 'Ganjil', '15002001'),
(71, 'MWI03', '63201', 2014, 'ADMNEGARA', 1, 'Ganjil', '1016068603'),
(72, 'MWI05', '63201', 2014, 'ADMNEGARA', 1, 'Ganjil', ''),
(73, 'MWI01', '63201', 2014, 'ADMNEGARA', 1, 'Ganjil', ''),
(74, 'MWI06', '63201', 2014, 'ADMNEGARA', 1, 'Ganjil', ''),
(75, 'MWI04', '63201', 2014, 'ADMNEGARA', 1, 'Ganjil', ''),
(76, 'MAN01', '63201', 2014, 'ADMNEGARA', 1, 'Ganjil', '');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`) VALUES
(1, 'Manajemen User', '?module=user', '', '', 'N', 'admin', 'Y', 1),
(2, 'Manajemen Modul', '?module=modul', '', '', 'N', 'admin', 'Y', 2),
(4, 'Prodi', '?module=jurusan', '', '', 'N', 'user', 'Y', 4),
(6, 'Banner', '?module=banner', '', '', 'N', 'admin', 'Y', 6),
(8, 'Kategori', '?module=kategori', '', '', 'N', 'admin', 'Y', 8),
(9, 'Mahasiswa', '?module=mahasiswa', '', '', 'N', 'user', 'Y', 9),
(10, 'Dosen', '?module=dosen', '', '', 'N', 'user', 'Y', 10),
(12, 'Mata Kuliah', '?module=matakul', '', '', 'N', 'user', 'Y', 11),
(14, 'Nilai', '?module=nilai', '', '', 'N', 'user', 'Y', 14),
(15, 'Jadwal', '?module=jadwal', '', '', 'N', 'user', 'Y', 14),
(16, 'Kurikulum', '?module=materibaru', '', '', 'N', 'user', 'Y', 11),
(17, 'Kartu Rencana Studi', '?module=krs', '', '', 'N', 'user', 'Y', 13),
(18, 'Dosen Mengajar', '?module=dosenmengajar', '', '', 'N', 'user', 'Y', 12),
(20, 'Cetak KRS', '?module=cetak_krs', '', '', 'N', 'user', 'Y', 14),
(21, 'Cetak Transkrip Nilai', '?module=cetaknilai', '', '', 'N', 'user', 'Y', 16),
(25, 'Cetak KHS', '?module=cetakkhs', '', '', 'N', 'user', 'Y', 15);

-- --------------------------------------------------------

--
-- Table structure for table `modul_dosen`
--

CREATE TABLE IF NOT EXISTS `modul_dosen` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `modul_dosen`
--

INSERT INTO `modul_dosen` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `aktif`, `urutan`) VALUES
(2, 'Jadwal Kuliah', '?module=jadwal', '', '', 'N', 'Y', 3),
(3, 'Dosen Mengajar', '?module=dosenmengajar', '', '', 'N', 'Y', 4),
(4, 'Cek Nilai', '?module=nilai', '', '', 'N', 'Y', 5),
(5, 'Cek KRS', '?module=krs', '', '', 'N', 'Y', 6),
(6, 'Data Saya', '?module=dosen', '', '', 'N', 'Y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `modul_mahasiswa` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `modul_mahasiswa`
--

INSERT INTO `modul_mahasiswa` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `aktif`, `urutan`) VALUES
(1, 'Data Saya', '?module=mahasiswa', '', '', 'N', 'Y', 1),
(2, 'Lihat Nilai', '?module=nilai', '', '', 'N', 'Y', 2),
(3, 'Kartu Rencana Studi', '?module=krs', '', '', 'N', 'Y', 3),
(4, 'Jadwal Kuliah', '?module=jadwal', '', '', 'N', 'Y', 4),
(5, 'Cetak KRS', '?module=cetak_krs', '', '', 'N', 'Y', 6),
(6, 'Cetak Transkrip Nilai', '?module=cetaknilai', '', '', 'N', 'Y', 7),
(7, 'Cetak KHS', '?module=cetakkhs', '', '', 'N', 'Y', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(18) COLLATE latin1_general_ci NOT NULL,
  `tahun` int(4) NOT NULL,
  `semester` int(2) NOT NULL,
  `ket` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `kdjur` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdmatkul` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kdkelas` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kode_dosen` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nilai` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `angka_mutu` int(1) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=75 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `tahun`, `semester`, `ket`, `kdjur`, `kdmatkul`, `kdkelas`, `kode_dosen`, `nilai`, `angka_mutu`) VALUES
(56, '020202', 2010, 1, 'Ganjil', '020202', 'ME0002', 'MI', '15002001', 'B', 3),
(60, '030303', 2010, 3, 'Ganjil', '030303', 'DC0008', 'AK', '15002002', 'A', 0),
(64, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'AP0004', 'AK', '15002002', 'A', 4),
(65, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002002', 'B', 3),
(66, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'ME0002', 'AK', '15002002', 'C', 2),
(67, 'AKA012029', 2011, 1, 'Ganjil', '030303', 'MA0003', 'AK', '15002002', 'B', 3),
(68, 'AKA012029', 2011, 2, 'Genap', '030303', 'EA001', 'AK', '15002001', 'A', 4),
(69, 'AKA012029', 2011, 2, 'Genap', '030303', 'AA002', 'AK', '15002001', 'B', 3),
(71, 'AKA012001', 2011, 1, 'Ganjil', '030303', 'MW0001', 'AK', '15002002', 'B', 4),
(74, '1011111', 2015, 1, 'Ganjil', 'J001', 'CD0005', 'MI', '15002001', 'C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'shu_99@yahoo.com', '087821228547', 'admin', 'N'),
('pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'Asep Setiawan', 'investasi.saya@gmail.com', '089657241465', 'user', 'N'),
('rina', '3aea9516d222934e35dd30f142fda18c', 'Rina Rosdiati', 'rinazhu@yahoo.com', '072547568', 'user', 'N'),
('idris', 'ee276272e30c7caf455d9bcb2834414d', 'Muhammad Idris', 'idriszufarzafar@yahoo.com', '0812777766', 'user', 'N'),
('pengajaran', 'cad430cf35b04a3d92f4b906a21ea067', 'Staff Pengajaran', 'pengajaran@yahoo.com', '0721773782', 'user', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
