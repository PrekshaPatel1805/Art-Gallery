-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 10:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mf_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comments`) VALUES
(1, 'Painting is silent poetry'),
(2, 'Painting is just another way of keeping diary.'),
(3, 'Painting is by nature a luminous language.'),
(4, 'Be confident,have patience and paint.');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_path` varchar(200) NOT NULL,
  `image_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_path`, `image_desc`) VALUES
('download.png', 'Mr.xyz has developed this painting.'),
('download1.png', 'Mrs.abc has developed this painting.'),
('download2.png', 'Mr.pqr has developed this painting.'),
('download3.png', 'Mr.mmn has developed this painting.');

-- --------------------------------------------------------

--
-- Table structure for table `img_gallery`
--

CREATE TABLE IF NOT EXISTS `img_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `img_gallery`
--

INSERT INTO `img_gallery` (`id`, `path`) VALUES
(1, '1.png'),
(2, '2.png'),
(3, '3.png'),
(4, '4.png'),
(5, '5.png'),
(6, '6.png'),
(7, '7.png'),
(8, '8.png'),
(9, '9.png'),
(10, '10.png'),
(11, '11.png'),
(12, '12.png'),
(13, '13.png'),
(14, '14.png'),
(15, '15.png'),
(16, '16.png'),
(17, '17.png'),
(18, '18.png'),
(19, '19.png'),
(20, '20.png'),
(21, '21.png'),
(22, '22.png'),
(23, '23.png'),
(24, '24.png'),
(25, '25.png'),
(26, '26.png'),
(27, '27.png'),
(28, '28.png'),
(29, '29.png'),
(30, '30.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
