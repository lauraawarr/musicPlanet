-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 06, 2016 at 06:26 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicPlanet`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `singer_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`singer_id`, `comment`) VALUES
(2, 'He seems nice'),
(4, 'They rock'),
(4, 'They rock'),
(4, 'I like them'),
(4, 'I like them'),
(4, 'I like them'),
(4, 'I like them'),
(4, 'I like them'),
(4, 'I like them'),
(1, 'She\'s pretty'),
(1, 'She\'s pretty'),
(1, 'She\'s pretty'),
(1, 'Love her voice'),
(1, 'Love her voice'),
(1, 'HELLO'),
(1, 'HELLO'),
(0, 'It\'s me'),
(0, 'It\'s me'),
(1, 'It\'s me'),
(1, 'She seems nice'),
(1, 'I like her hair');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(1, 'R&B'),
(2, 'Pop'),
(3, 'Soul'),
(4, 'Rock'),
(5, 'Hip Hop'),
(6, 'Punk'),
(7, 'Electronic'),
(8, 'Dance');

-- --------------------------------------------------------

--
-- Table structure for table `genres_to_singers`
--

CREATE TABLE `genres_to_singers` (
  `genre_id` int(11) NOT NULL,
  `singer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres_to_singers`
--

INSERT INTO `genres_to_singers` (`genre_id`, `singer_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(5, 2),
(4, 3),
(6, 3),
(4, 4),
(6, 4),
(2, 5),
(7, 5),
(8, 5),
(5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

CREATE TABLE `singers` (
  `singer_id` int(11) NOT NULL,
  `singer_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`singer_id`, `singer_name`) VALUES
(1, 'Adele'),
(2, 'Drake'),
(3, 'Green Day'),
(4, 'Simple Plan'),
(5, 'Lady Gaga'),
(6, 'Eminem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`singer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `singers`
--
ALTER TABLE `singers`
  MODIFY `singer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
