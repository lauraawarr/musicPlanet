-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2016 at 11:17 AM
-- Server version: 5.5.52-cll
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `warrla_musicPlanet`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `singer_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`singer_id`, `comment`) VALUES
(2, 'hello'),
(2, 'I like his music'),
(1, 'I like her hair'),
(1, 'Great concerts!'),
(20, 'Sweet look'),
(20, 'Awesome hair'),
(23, 'Wonderful!'),
(41, 'Very relaxing'),
(41, 'Weird hair...'),
(11, 'sexy voice'),
(5, 'crazyyyy'),
(5, '头太白啦!!!!!'),
(5, 'lalalala'),
(34, 'Cool face'),
(34, 'Big head'),
(34, 'HERO!'),
(34, 'Wear clothes!!'),
(34, 'Classic!'),
(34, 'Ni hao!'),
(34, 'AMAZING!!!'),
(5, 'yeeeeeeeeeeeeeee'),
(4, 'happy to see u'),
(6, 'Love him!'),
(6, 'Very cool'),
(31, 'so gangsta'),
(15, 'so vicious'),
(23, 'jazzzzy'),
(9, 'metaaallll'),
(36, 'groovy baby'),
(50, 'wicked beats '),
(50, 'sweet vibes');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(30) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
(8, 'Dance'),
(9, 'Metal'),
(10, 'Reggae'),
(12, 'Indie'),
(13, 'Jazz'),
(14, 'Country'),
(15, 'Blues');

-- --------------------------------------------------------

--
-- Table structure for table `genres_to_singers`
--

CREATE TABLE IF NOT EXISTS `genres_to_singers` (
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
(5, 6),
(6, 7),
(4, 7),
(4, 8),
(6, 8),
(6, 9),
(9, 9),
(4, 10),
(6, 10),
(4, 11),
(6, 11),
(10, 12),
(6, 12),
(4, 12),
(6, 13),
(4, 13),
(6, 14),
(4, 14),
(6, 15),
(4, 15),
(4, 16),
(1, 17),
(2, 17),
(1, 18),
(8, 18),
(2, 18),
(3, 18),
(2, 19),
(2, 20),
(12, 20),
(12, 21),
(2, 22),
(13, 23),
(3, 23),
(2, 23),
(2, 24),
(4, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(2, 30),
(5, 30),
(1, 31),
(5, 31),
(10, 31),
(1, 32),
(5, 32),
(4, 33),
(14, 33),
(4, 34),
(6, 34),
(4, 35),
(2, 36),
(4, 36),
(14, 36),
(15, 36),
(15, 34),
(15, 37),
(4, 37),
(14, 37),
(4, 39),
(1, 40),
(2, 40),
(4, 40),
(1, 41),
(1, 42),
(2, 42),
(3, 42),
(1, 43),
(2, 43),
(3, 44),
(13, 44),
(3, 45),
(13, 45),
(15, 45),
(7, 46),
(2, 47),
(14, 47),
(14, 48),
(14, 49),
(7, 50),
(15, 35);

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

CREATE TABLE IF NOT EXISTS `singers` (
  `singer_id` int(11) NOT NULL AUTO_INCREMENT,
  `singer_name` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  PRIMARY KEY (`singer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`singer_id`, `singer_name`, `image`) VALUES
(1, 'Adele', 'Adele.png'),
(2, 'Drake', 'Drake.png'),
(3, 'Green Day', 'GreenDay.png'),
(4, 'Simple Plan', 'SimplePlan.png'),
(5, 'Lady Gaga', 'LadyGaga.png'),
(6, 'Eminem', 'Eminem.png'),
(7, 'Billy Joe Armstrong', 'BillieJoeArmstrong.png'),
(8, 'Elvis Costello', 'ElvisCostello.png'),
(9, 'Henry Rollins', 'HenryRollins.png'),
(10, 'Ian MacKaye', 'IanMacKaye.png'),
(11, 'Iggy Pop', 'IggyPop.png'),
(12, 'Joe Strummer', 'JoeStrummer.png'),
(13, 'Patti Smith', 'PattiSmith.png'),
(14, 'John Lydon', 'JohnLydon.png'),
(15, 'Sid Vicious', 'SidVicious.png'),
(16, 'Kurt Cobain', 'KurtCobain.png'),
(17, 'Beyonce', 'Beyonce.png'),
(18, 'Christina Aguilera', 'ChristinaAguilera.png'),
(19, 'Christina Grimmie', 'ChristinaGrimmie.png'),
(20, 'Colette Carr', 'ColetteCarr.png'),
(21, 'Ellie Goulding', 'EllieGoulding.png'),
(22, 'Louis Tomlinson', 'LouisTomlinson.png'),
(23, 'Stevie Wonder', 'StevieWonder.png'),
(24, 'Michael Bolton', 'MichaelBolton.png'),
(25, 'Dr. Dre', 'DrDre.png'),
(26, 'Jay Z', 'JayZ.png'),
(27, 'Kanye West', 'KanyeWest.png'),
(28, 'Kendrick Lamar', 'KendrickLamar.png'),
(29, 'Lil Wayne', 'LilWayne.png'),
(30, 'Nicki Minaj', 'NickiMinaj.png'),
(31, 'Snoop Dogg', 'SnoopDogg.png'),
(32, 'P. Diddy', 'PDiddy.png'),
(33, 'Bob Dylan', 'BobDylan.png'),
(34, 'David Bowie', 'DavidBowie.png'),
(35, 'Elton John', 'EltonJohn.png'),
(36, 'Elvis Presley', 'ElvisPresley.png'),
(37, 'Jimi Hendrix', 'JimiHendrix.png'),
(38, 'Neil Young', 'NeilYoung.png'),
(39, 'Paul McCartney', 'PaulMcCartney.png'),
(40, 'Prince', 'Prince.png'),
(41, 'The Weeknd', 'TheWeeknd.png'),
(42, 'Sam Smith', 'SamSmith.png'),
(43, 'Justin Bieber', 'JustinBieber.png'),
(44, 'Aretha Franklin', 'ArethaFranklin.png'),
(45, 'Ray Charles', 'RayCharles.png'),
(46, 'deadmau5', 'deadmau5.png'),
(47, 'Taylor Swift', 'TaylorSwift.png'),
(48, 'Brad Paisley', 'BradPaisley.png'),
(49, 'Keith Urban', 'KeithUrban.png'),
(50, 'Daft Punk', 'DaftPunk.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
