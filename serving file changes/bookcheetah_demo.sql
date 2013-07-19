-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2013 at 11:17 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookcheetah_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookshelves`
--

CREATE TABLE IF NOT EXISTS `bookshelves` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `bookname` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_semester` int(11) NOT NULL,
  `spring_semester` int(11) NOT NULL,
  `professor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_number`, `course_name`, `fall_semester`, `spring_semester`, `professor`, `book`, `created_at`, `updated_at`) VALUES
(1, 'e238sj', 'Enterprenual Executions', 45, 6, 'James Howard', 'Aliens', '2013-07-10 03:57:46', '2013-07-10 03:57:46'),
(2, 'e2THVSj', 'Principals of Microelectronics', 26, 96, 'Idris Doord', 'Pirates', '2013-07-10 03:57:46', '2013-07-10 03:57:46'),
(3, 'e238sj', 'Enterprenual Executions', 45, 6, 'James Howard', 'Aliens', '2013-07-17 08:35:47', '2013-07-17 08:35:47'),
(4, 'e2THVSj', 'Principals of Microelectronics', 26, 96, 'Idris Doord', 'Pirates', '2013-07-17 08:35:47', '2013-07-17 08:35:47'),
(5, 'e238sj', 'Enterprenual Executions', 45, 6, 'James Howard', 'Aliens', '2013-07-17 08:37:09', '2013-07-17 08:37:09'),
(6, 'e2THVSj', 'Principals of Microelectronics', 26, 96, 'Idris Doord', 'Pirates', '2013-07-17 08:37:09', '2013-07-17 08:37:09'),
(7, 'e238sj', 'Enterprenual Executions', 45, 6, 'James Howard', 'Aliens', '2013-07-17 08:40:56', '2013-07-17 08:40:56'),
(8, 'e2THVSj', 'Principals of Microelectronics', 26, 96, 'Idris Doord', 'Pirates', '2013-07-17 08:40:56', '2013-07-17 08:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forum_description` text COLLATE utf8_unicode_ci NOT NULL,
  `topics` int(11) NOT NULL,
  `posts` int(11) NOT NULL,
  `last_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `forum_title`, `forum_description`, `topics`, `posts`, `last_post`, `created_at`, `updated_at`) VALUES
(1, 'Book Pirate', 'This is the Pirates book description book', 2, 6723, 'by John kamau', '0000-00-00 00:00:00', '2013-07-13 11:40:02'),
(2, 'Book Shouls', 'This is the Shouls book description book', 245, 63, 'by Geen Talo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Book Pirates', 'This is the Pirates book description book', 2, 6723, 'by John kamau', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Book Pirates', 'This is the Pirates book description book', 2, 6723, 'by John kamau', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Book Shouls', 'This is the Shouls book description book', 245, 63, 'by Geen Talo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Book Pirates', 'This is the Pirates book description book', 2, 6723, 'by John kamau', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Book Shouls', 'This is the Shouls book description book', 245, 63, 'by Geen Talo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Book Pirates', 'This is the Pirates book description book', 2, 6723, 'by John kamau', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Book Shouls', 'This is the Shouls book description book', 245, 63, 'by Geen Talo', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_07_07_122717_create_courses_table', 1),
('2013_07_08_162026_create_forums_table', 1),
('2013_06_30_121635_create_colleges_table', 2),
('2013_07_18_053111_create_bookshelves_table', 2),
('2013_07_18_053337_create_wishlists_table', 2),
('2013_07_17_124826_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `password_confirmation`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Lee', 'Ibrah', 'lee@trascope.com', '$2y$08$hps3mueE.JFnoH73XYDrSue0C4gjSidjU.P/GSXDHaylxs3oH/XSe', '', '', '2013-07-18 04:29:52', '2013-07-18 04:29:52'),
(2, 'Timothy', 'tim', 'techytimo@gmail.com', '$2y$08$udXd6Jxr4edkQzRXk/s1xeXOEn/wN9Ix/BFWY4NMEtZ/U85IgBs1O', '', '', '2013-07-18 06:17:03', '2013-07-18 06:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `bookname` int(11) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
