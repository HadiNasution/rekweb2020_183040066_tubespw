-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 02:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakpw`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `foto` varchar(64) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `Sinopsis` text NOT NULL,
  `genre` varchar(128) NOT NULL,
  `penerbit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `foto`, `judul`, `Sinopsis`, `genre`, `penerbit`) VALUES
(1, '1.jpg', 'Harry Potter and the Sorcerer\'s Stone', 'Awal dari kisah Harry Potter yang mendapatkan surat untuk ikut belajar disalah satu sekolah sihir terbaik didunia, yaitu Hogwart. dan masuk dalam kasus Batu Bertuah yang melegenda. ini adalah kisah pembuka dari perjalanan Harry Potter.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(2, '2.jpg', 'Harry Potter and the Chamber of Secrets', 'Seluruh Hogwart diteror oleh serangan mahluk yang dapat membuat seseorang membeku bak batu, Harry dan kawan-kawanya mencoba memcahkan kasus ini yang membawa mereka pada kamar rahasia disekolah itu dan bertemu Tom Riddle (Voldemort muda).', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(3, '3.jpg', 'Harry Potter and the Prisoner of Azkaban', 'Harry,Weasley dan Hermione lagi-lagi berada pada teror yang mengemparkan dunia sihir, karena salah satu tahanan Azkaban (penjara bagi penyihir jahat) telah kabur tanpa jejak, yang tidak lain tahanan itu adalah Sirius Black, ayah baptis dari Harry Potter yang datang untuk membalaskan dendam.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(4, '4.jpg', 'Harry Potter and the Goblet of Fire', 'Harry Potter dijebak oleh salah satu Death Eater untuk masuk dalam perlombaan terbesar penyihir yaitu Goblet of Fire, yang mana Harry akan dijadikan \"bahan utama\" untuk bangkitnya pangeran kegelapan.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru, B', 'Bloomsbury Publishing'),
(5, '5.jpg', 'Harry Potter and the Order of Phoenix', 'Dengan peringatan mereka tentang kembalinya Lord Voldemort mencemoohkan, Harry dan Dumbledore ditargetkan oleh otoritas Wizard sebagai birokrat otoriter secara perlahan merebut kekuasaan di Hogwarts.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(6, '6.jpeg', 'Harry Potter and the Half-Blood Prince', 'Harry Menemukan sebuah buku misterius milik Half-Blood prince. Sementara itu, Horace Slughorn kembali sebagai guru ramuan. Dan kini, Harry dan Dumbledore harus menelusuri masalalu kelam Voldemort.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(7, '7.jpg', 'Harry Potter and the Deathly Hallows part-1', 'Dengan Voldemort semakin kuat, Harry,Ron dan Hermione harus menemukan dan menghancurkan Horcrux, demi melindungi Hogwarts. Tapi dengan Pelahap Maut jahat mengejar mereka, akankah mereka berhasil?', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(8, '8.jpg', 'Harry Potter and the Deathly Hallows part-2', 'Harry,Ron dan Hermione berpacu dengan waktu untuk menghancurkan Horcruxes yang tersisa, Sementara itu, Para siswa dan guru Hogwarts bersatu untuk membela Hogwarts melawan Lord Voldemort dan antek-anteknya.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(9, '9.jpg', 'Fantastic Beast and Where To Find Them', 'Newt tiba di New York dengan membawa koper berisi mahluk-mahluk ajaib. Masalahpun menimpa Newt saat teman-temanya melarikan diri dan harus menghadapi penyelidikan dewan penyihir MACUSA.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing'),
(10, '10,jpg', 'Fantastic Beast the Crimes of Grindelwald', 'Kisah ke-2 ini akan melanjutkan kisah Newt Scamander (Eddie Redmayne) untuk kembali menangkap Gellert Grindelwald (Jhonny Depp) yang berhasil lolos dari penjara. Bersama Albus Dombledore (Jude Law) Newt harus bisa menghentikan Grindelwald.', 'Fiksi fantasi, Drama, Fiksi dewasa muda, Misteri, Cerita seru.', 'Bloomsbury Publishing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
