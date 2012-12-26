-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2012 at 02:15 AM
-- Server version: 5.5.15
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stegano`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image` text NOT NULL,
  `key` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `dateinsert` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image`, `key`, `emailid`, `dateinsert`) VALUES
('image/DSC_0334.png', '', 'tinbang@gmail.com', '2012-12-15'),
('image/DSC_0318.png', '', 'tinbang@gmail.com', '2012-12-15'),
('image/kami.png', 'copyright\nnajmi', 'tinbang@gmail.com', '2012-12-26'),
('image/060320121624.png', 'hakcipta\nnunjimmimya', 'tinbang@yahoo.com', '2012-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `pakej`
--

CREATE TABLE IF NOT EXISTS `pakej` (
  `pakejid` int(11) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakejdetail`
--

CREATE TABLE IF NOT EXISTS `pakejdetail` (
  `pakejid` int(11) NOT NULL,
  `pakejdetail` varchar(250) NOT NULL,
  `maxinsert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@admin.com', 'admin', 'admin'),
(2, 'tinbang@gmail.com', 'tinbang', 'customer'),
(3, 'tinbang@yahoo.com', 'yahoo', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE IF NOT EXISTS `userdetail` (
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telefon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`email`, `nama`, `alamat`, `telefon`) VALUES
('admin@admin.com', 'Saya Admin', 'KL', '23456789'),
('tinbang@gmail.com', 'Najmi', 'Shah Alam', '23458732'),
('tinbang@yahoo.com', 'yahoo', 'Pulau Indah, Klang', '55123342');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
