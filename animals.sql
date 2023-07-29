-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2023 at 01:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE19_CR5_animal_adoption_Nawras`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `vaccinated` varchar(3) DEFAULT 'No',
  `status` varchar(10) DEFAULT 'Available',
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `species`, `age`, `size`, `picture`, `vaccinated`, `status`, `location`) VALUES
(1, 'Fluffy', 'Cat', 3, 'Small', 'https://cdn.pixabay.com/photo/2017/11/09/21/41/cat-2934720_1280.jpg', 'yes', 'Available', 'Mariahilfer Straße 250'),
(2, 'Buddy', 'Dog', 6, 'Large', 'https://cdn.pixabay.com/photo/2018/05/07/10/48/husky-3380548_1280.jpg', 'No', 'Available', 'Kärntner Straße 23'),
(3, 'Nemo', 'Fish', 1, 'Small', 'https://cdn.pixabay.com/photo/2016/12/31/21/22/discus-fish-1943755_1280.jpg', 'No', 'Adopted', 'Graben 55'),
(4, 'Max', 'Dog', 10, 'Large', 'https://cdn.pixabay.com/photo/2017/09/01/21/51/golden-retriever-2705639_1280.jpg', 'yes', 'Adopted', 'Landstraßer 4'),
(5, 'Coco', 'Parrot', 25, 'Small', 'https://cdn.pixabay.com/photo/2010/12/23/13/36/bird-4078_1280.jpg', 'No', 'Available', 'Stephansplatz 12'),
(6, 'Rocky', 'Dog', 4, 'Large', 'https://cdn.pixabay.com/photo/2016/10/15/12/01/dog-1742295_1280.jpg', 'yes', 'Available', 'Laengenfeldgasse 4'),
(7, 'Whiskers', 'Cat', 8, 'Small', 'https://cdn.pixabay.com/photo/2018/11/29/23/34/cat-3846780_1280.jpg', 'yes', 'Available', 'Trauengasse 45'),
(8, 'Luna', 'Cat', 5, 'Small', 'https://cdn.pixabay.com/photo/2018/01/28/12/37/cat-3113513_1280.jpg', 'No', 'Adopted', 'Sechshauserstrasse 9'),
(9, 'Duke', 'Dog', 12, 'Large', 'https://cdn.pixabay.com/photo/2015/11/03/12/58/dalmatian-1020790_1280.jpg', 'No', 'Available', 'Ringstraße 88'),
(10, 'Kiwi', 'Parrot', 15, 'Small', 'https://cdn.pixabay.com/photo/2018/05/22/17/33/parrot-3421965_1280.jpg', 'No', 'Adopted', 'Landstraßer Hauptstraße');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
