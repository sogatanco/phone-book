-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Agu 2018 pada 08.58
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `fb` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `ig` varchar(50) NOT NULL,
  `yt` varchar(50) NOT NULL,
  `noun` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`fb`, `twitter`, `ig`, `yt`, `noun`) VALUES
('https://web.facebook.com/wahyudin.al', 'https://twitter.com/gense_art', 'https://www.instagram.com/wahyudi98.ww/', 'https://www.youtube.com/channel/UCrNTr7_wMbV0LuWFr', '<b>anoun 345</b> Plase meet in room 3 at noun directly');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phone_list`
--

CREATE TABLE `phone_list` (
  `id` smallint(6) NOT NULL,
  `number` varchar(20) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `location` varchar(100) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `phone_list`
--

INSERT INTO `phone_list` (`id`, `number`, `contact_name`, `location`) VALUES
(9, '082285658594', 'team2dev', 'Bireuen'),
(10, '065126333', 'GAPURA ANGKASA', 'Bandara SIM'),
(11, '065121555', 'GARUDA INDONESIA', 'Jl. TGK Daud Beureueh No. 9 Ba'),
(12, '065121341', 'Kantor Administrasi', 'Bandar udara Sultan Iskandar M'),
(13, '0216326036', 'LION AIR', 'Jl. Gajah mada No. 7 Lion Towe'),
(14, '1500 138  ', 'Contact Center ', 'Sultan Iskandar Muda Internati'),
(15, '(021) 314-3169', ' kedutaan Afghanistan ', 'Jl. Dr. Kusumaatmaja S.H. 15, '),
(16, '(021) 3435-9000', 'Kedutaan Besar Amerika Serikat', 'Jl. Medan Merdeka Selatan No. '),
(17, '(021) 522-7111', 'Kedutaan Besar Australia', 'Jl. H.R. Rasuna Said, Kav. C15-16'),
(18, '(021) 525-1986', 'Kedutaan Besar Bangladesh', 'Jl. Denpasar Raya 3, Block A-13'),
(19, '(021) 525-1515', 'Kedutaan Besar Belanda', 'Jl. H.R. Rasuna Said Kav. S-3, Jakarta 12950');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `phone_list`
--
ALTER TABLE `phone_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phone_list`
--
ALTER TABLE `phone_list`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
