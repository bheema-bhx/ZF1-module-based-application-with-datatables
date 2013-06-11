-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2013 at 07:17 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zendreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'employer'),
(3, 'Trainer'),
(4, 'Sponsor'),
(5, 'Verification'),
(6, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `firstname`, `lastname`, `username`, `password`, `email`, `approved`) VALUES
(1, 'bheema', 'shankar', 'bheema53', '59632211', 'admin@cf.com', 1),
(11, 'siva', 'ganesh', 'siva', '123456', 'verifier@cf.com', 1),
(15, 'venkey', 'venkatesh', 'venkey', '121212', 'venkey7@yahoo.com', 1),
(16, 'ganesh', 'ganesh', 'ganesh', '123456', 'ganesh@gmail.com', 1),
(40, 'kirthi', 'kirthi', 'kirthi', '123456', 'kirthi@gmail.com', 1),
(41, 'Sruthi', 'M', 'sruthi', '123456', 'sruthik_nyros@yahoo.com', 1),
(42, 'sivanarayana', 'sivanarayana', 'sssss', '123456', 'siva@gmail.com', 1),
(43, 'bs', 'bs', 'bbbbb', '123456', 'bheema_p63@yahoo.com', 1),
(44, 'dhana53', 'dhana53', 'dhana53', '123456', 'ds@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `ur_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`ur_id`),
  KEY `u_id` (`u_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`ur_id`, `u_id`, `role_id`) VALUES
(1, 41, 1),
(2, 1, 2),
(3, 15, 3),
(4, 11, 4),
(5, 16, 5),
(6, 40, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
