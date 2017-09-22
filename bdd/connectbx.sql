-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2017 at 11:35 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectbx`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_street` varchar(50) NOT NULL,
  `address_number` int(11) NOT NULL,
  `address_post_code` int(11) NOT NULL,
  `address_post_box` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_street`, `address_number`, `address_post_code`, `address_post_box`) VALUES
(1, 'Rue John Waterloo Wilson', 37, 1000, NULL),
(3, 'Rue de Robiano', 58, 1030, NULL),
(4, 'Drève des Weigélias', 38, 1170, NULL),
(5, 'Rue du Delta', 50, 1190, NULL),
(6, 'Rue des Goujons', 152, 1070, NULL),
(7, 'Rue Breughel', 9, 1000, NULL),
(10, 'Rue de Trèves', 33, 1000, NULL),
(14, 'test', 42, 1200, NULL),
(15, 'Rue de Nadia', 21, 1083, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `assoc_id` int(10) UNSIGNED NOT NULL,
  `assoc_name` varchar(30) NOT NULL,
  `assoc_descri` text,
  `assoc_address` int(10) NOT NULL,
  `assoc_phone` varchar(13) DEFAULT NULL,
  `assoc_website` varchar(255) DEFAULT NULL,
  `assoc_latitude` double NOT NULL,
  `assoc_longitude` double NOT NULL,
  `assoc_theme` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`assoc_id`, `assoc_name`, `assoc_descri`, `assoc_address`, `assoc_phone`, `assoc_website`, `assoc_latitude`, `assoc_longitude`, `assoc_theme`) VALUES
(2, 'ConnectBxdsfsd', 'Plateforme pour les jeunes', 6, '32444444', 'connectbx.be', 50.83241169999999, 4.321692900000016, 'bonnequestion'),
(3, 'victor\'s heart', 'bla bla', 1, '897', 'bla bla', 50.8488088, 4.380595399999947, 'test'),
(4, 'becode', 'bla bla', 3, '768', 'bla bla', 50.8609978, 4.374574499999994, 'bla bla'),
(5, 'croix rouge', 'bla bla', 4, '897', 'bla bla', 50.8078806, 4.398457000000008, 'bla bla'),
(6, 'brussels together', 'bla bla', 5, '675', 'bla bla', 50.8162067, 4.323457800000028, 'bla bla'),
(8, 'Adrian', 'kddkfk', 10, 'sdkj', 'kdslj', 50.8423907, 4.3751667000000225, 'kdlsj');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_descri` text,
  `event_image` varchar(255) DEFAULT 'event_default.jpg',
  `event_priority` tinyint(1) NOT NULL,
  `event_address` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_descri`, `event_image`, `event_priority`, `event_address`) VALUES
(1, 'Jeunesse', '2017-03-03 13:15:00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\\\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Oui oui', 'Views/Images/event/evenement_jeunesse.jpg', 0, 1),
(2, 'Fin de site web (j\'espère)', '2017-05-02 18:00:00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\\\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Oui oui', 'Views/Images/event/evenement_social.jpg', 1, 5),
(3, 'Lancement de site web', '2017-09-03 16:44:00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\\\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Oui oui', 'Views/Images/event/evenement_festival.jpg', 1, 3),
(4, 'Celebrations de site', '2017-11-03 11:25:00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\\\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Oui oui', 'Views/Images/event/evenement_enfant.jpg', 1, 4),
(5, 'bouh', '2017-01-09 00:00:00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\\\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Oui oui', 'Views/Images/event/evenement_fete_de_fin_d_annee.jpg', 0, 14),
(6, 'Nadia\'s party', '2017-09-30 22:00:00', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\\\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Oui oui', 'Views/Images/event/evenement_nadia.jpg', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `town_name` varchar(25) NOT NULL,
  `town_post_code` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`town_name`, `town_post_code`) VALUES
('Anderlecht', 1070),
('Bruxelles', 1000),
('Etterbeek', 1040),
('Jette', 1090),
('Evere', 1140),
('Ganshoren', 1083),
('Ixelles', 1050),
('Koekelberg', 1081),
('Auderghem', 1160),
('Schaerbeek', 1030),
('Berchem-Sainte-Agathe', 1082),
('Saint-Gilles', 1060),
('Molenbeek-Saint-Jean', 1080),
('Saint-Josse-ten-Noode', 1210),
('Woluwe-Saint-Lambert', 1200),
('Woluwe-Saint-Pierre', 1150),
('Uccle', 1180),
('Forest', 1190),
('Watermael-Boitsfort', 1170);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `user_name` varchar(60) DEFAULT NULL,
  `user_firstname` varchar(60) DEFAULT NULL,
  `user_birthdate` datetime(1) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_pwd` varchar(50) NOT NULL DEFAULT 'pwd',
  `commentaires` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_birthdate`, `user_email`, `user_login`, `user_pwd`, `commentaires`) VALUES
(12, 'Admin', 'Admin', '1980-07-06 00:00:00.0', 't.tonneau@gmail.com', 'admin', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(13, 'Tonneau', 'Thomas', '1970-01-01 00:00:00.0', 'test@mail.com', 'test', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(14, 'User', 'User', '1999-12-02 00:00:00.0', 'user@root.be', 'user', '12dea96fec20593566ab75692c9949596833adc9', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`assoc_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `assoc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
