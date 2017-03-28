-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2017 at 06:54 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(10) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(50) NOT NULL,
  `viewCount` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `slug`, `modified`, `user_id`, `viewCount`) VALUES
(1, 'CakePHP Schema Files', '', '2017-03-20 04:31:05', 'cakephp-schema-files', '2017-03-22 05:17:45', 0, 1),
(2, 'news', 'Often in web applications, you will need to display a one-time notification message to the user after processing a form or acknowledging data. In CakePHP, these are referred to as â€œflash messagesâ€. You can set flash message with the SessionComponent and display them with the SessionHelper::flash(). To set a message, use setFlash:', '2017-03-20 05:17:09', 'news', '2017-03-24 07:58:07', 0, 9),
(4, 'gsdg', 'When using named parameters, use the array syntax and include names for ALL parameters in the URL. Using the string syntax for paramters (i.e. â€œrecipes/view/6/comments:falseâ€) will result in the colon characters being HTML escaped and the link will not work as desired.', '2017-03-21 03:27:58', 'gsdg', '2017-03-23 10:51:40', 0, 26),
(6, 'The latest new', 'ahihi ahihi ahihi ahuhu ahuhu ahehe', '2017-03-21 07:48:27', 'the-latest-new', '2017-03-22 05:17:45', 0, 35),
(7, 'sdfgsfg', 'sdf asuhf uau siufa sdf uia sf as f as fsgd fgasgfysda', '2017-03-21 07:49:39', 'sdfgsfg', '2017-03-22 05:17:46', 0, 20),
(8, 'someone like you', 'type Type of media element to generate, valid values are â€œaudioâ€ or â€œvideoâ€. If type is not provided media type is guessed based on fileâ€™s mime type.\r\ntext Text to include inside the audio/video tag\r\npathPrefix Path prefix to use for relative URLs, defaults to â€˜files/â€™\r\nfullBase If set to true, the src attribute will get a full address including domain name', '2017-03-21 07:58:14', 'áº»yery', '2017-03-23 11:09:54', 0, 3),
(10, 'BÃ¨o dáº¡t mÃ¢y trÃ´i', 'Má»i mÃ²n Ä‘Ãªm thÃ¢u suá»‘t nÄƒm canh', '2017-03-21 08:27:45', 'beo-dáº¡t-may-troi', '2017-03-22 05:17:46', 0, 1),
(11, 'Láº·ng im', 'cÅ©ng theo ngÆ°á»i Ä‘i mÃ£i rá»“i.', '2017-03-21 08:42:26', 'láº·ng-im', '2017-03-22 05:17:46', 0, 0),
(12, 'ghh', 'nothing for sharing free', '2017-03-21 09:24:58', 'ghh', '2017-03-22 05:17:46', 0, 0),
(13, 'bien rong', 'la lÃ¡ fd asdf ashdf dfffa', '2017-03-21 09:41:03', 'bien-rong', '2017-03-22 05:17:46', 0, 8),
(14, 'song dai', 'Ã¡d', '2017-03-21 09:42:38', 'song-dai', '2017-03-22 05:17:46', 0, 13),
(15, 'ery rg', 'ryry áº» áº» y hdf ', '2017-03-21 09:45:17', 'ery-rg', '2017-03-22 05:17:46', 0, 1),
(16, '12 jhs ', 'sdf ash uhs f sd a sdfggd gf ygfg  gygdgg ff', '2017-03-21 10:19:52', '12-jhs', '2017-03-22 05:17:46', 0, 8),
(18, 'miu le', 'Táº¡o 1 trang list tin tá»©c, vÃ  click vÃ o link Ä‘á»ƒ xem chi tiáº¿t tin tá»©c, má»—i link trÃªn toÃ n site pháº£i sá»­ dá»¥ng dáº¡ng ', '2017-03-21 10:25:56', 'miu-le', '2017-03-22 05:17:46', 0, 4),
(25, 'huong dan cho nguoi moi', 'Create .po file with command prompt for multi language site.', '2017-03-24 09:45:07', 'huong-dan-cho-nguoi-moi', '2017-03-24 09:45:07', 0, 30),
(26, 'sdfg', ' sg', '2017-03-27 09:36:02', 'sdfg', '2017-03-27 09:36:02', 1, 0),
(27, 'latest event', 'CakePHP is a wonderful framework. Unfortunately, like a lot of software, documentation is severly lacking. The effort is definitely there, but with an API containing the occassional "Enter description here... unknown_type", it definitely makes things a bit more difficult. Especially for someone who adopted the RTFM mantra many years ago.\r\n\r\nFor this article, we''re going to try and figure out how to get AJAX and cake to work together without having to comb cake''s manual, wiki, the bakery, users'' sites and tutorials and Google groups.\r\n\r\nFirst things first - you''ll need to have cake installed and running.\r\n\r\nNext things second - you''ll need to get the scriptaculous and prototype libraries. (I haven''t tried any other AJAX libraries, but these seem to work just fine for now).\r\n\r\nNote: there was an issue where the code crashed firefox that turned out to be caused by the prototype.js that''s included in scriptaculous being the incorrect version. Therefore, I recommend downloading them separately.\r\nYou''ll need to place the scriptaculous and prototype files in /app/webroot/js directory.\r\n\r\nNow you need to add the following inside the <head> tag of your layout file (/app/views/layout/default.thtml) to make them available:', '2017-03-27 09:36:36', 'latest-event', '2017-03-27 09:36:36', 1, 8),
(28, 'contact', 'im trying to do is to send 2 values from view to controller using .... show 10 more comments .... Geographic Information Systems Â· Electrical Engineering Â· Android Enthusiasts Â· Information Security Â· Database Administrators ...', '2017-03-27 10:03:48', 'contact', '2017-03-27 10:03:48', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `schema_migrations`
--

CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schema_migrations`
--

INSERT INTO `schema_migrations` (`id`, `class`, `type`, `created`) VALUES
(1, 'InitMigrations', 'Migrations', '2017-03-20 04:45:12'),
(2, 'ConvertVersionToClassNames', 'Migrations', '2017-03-20 04:45:12'),
(3, 'IncreaseClassNameLength', 'Migrations', '2017-03-20 04:45:13'),
(4, 'Q', 'app', '2017-03-20 04:46:10'),
(15, 'InitialMigration', 'app', '2017-03-21 04:13:10'),
(16, 'Ver1Migration', 'app', '2017-03-21 04:13:10'),
(17, 'Ver2Migration', 'app', '2017-03-21 04:16:04'),
(18, 'Ver4migration', 'app', '2017-03-21 04:16:07'),
(19, 'Ver8Migration', 'app', '2017-03-21 04:16:08'),
(20, 'UpdateUser', 'app', '2017-03-21 04:31:44'),
(21, 'Updatedob', 'app', '2017-03-21 04:38:18'),
(22, 'UpdateSlug', 'app', '2017-03-21 09:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `dob`, `created`, `modified`) VALUES
(1, 'nhaidt', '$2a$10$SnHKsy09yPHDvBIhGYk4xenDdqG40k4XHjAqYqMF.X9cZd9C3t9yG', 'admin', '1997-02-20', '2017-03-20 05:26:57', '2017-03-27 04:31:36'),
(2, 'phuongnc', '$2a$10$fUEpvKiULuk6SdilJoYCP../qtoWJJv3clLr42pXc9LZXVCy0EQDS', 'admin', '1997-06-28', '2017-03-20 09:15:29', '2017-03-21 04:46:33'),
(3, 'hahaha', '$2a$10$qUUhDwu4ni3q5Pn55q9eGuF4pG6ysOZat5FTOyAKXNHXIdKQSIhZq', 'author', '2017-03-21', '2017-03-21 04:47:00', '2017-03-21 05:00:25'),
(6, 'duongnhai', '$2a$10$JXlEunHXuEbEwOnJaB/GBeTC1UzimWjZfLuXko/nMReLDQFFuSbWW', 'admin', '2017-03-21', '2017-03-21 06:50:07', '2017-03-21 06:50:07'),
(7, 'nganntt', '$2a$10$85DLKA3Lp0FyXPgruqZIl.KbvoEYsTpFRwFfGP/nPMK66cyqh1vn6', 'admin', '2017-03-28', '2017-03-28 05:22:05', '2017-03-28 05:22:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locale` (`locale`),
  ADD KEY `model` (`model`),
  ADD KEY `row_id` (`foreign_key`),
  ADD KEY `field` (`field`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schema_migrations`
--
ALTER TABLE `schema_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `schema_migrations`
--
ALTER TABLE `schema_migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
