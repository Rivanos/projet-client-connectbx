-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 18 Août 2017 à 16:12
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `connectbx`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_street` varchar(50) NOT NULL,
  `address_number` int(11) NOT NULL,
  `address_town` varchar(50) NOT NULL,
  `address_post_code` int(4) NOT NULL,
  `address_post_box` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `associations`
--

CREATE TABLE `associations` (
  `assoc_id` int(10) UNSIGNED NOT NULL,
  `assoc_name` varchar(30) NOT NULL,
  `assoc_descri` text NOT NULL,
  `assoc_address` varchar(200) NOT NULL,
  `assoc_town` varchar(20) NOT NULL,
  `assoc_phone` int(11) NOT NULL,
  `assoc_website` varchar(255) NOT NULL,
  `assoc_latitude` double NOT NULL,
  `assoc_longitude` double NOT NULL,
  `assoc_theme` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `associations`
--

INSERT INTO `associations` (`assoc_id`, `assoc_name`, `assoc_descri`, `assoc_address`, `assoc_town`, `assoc_phone`, `assoc_website`, `assoc_latitude`, `assoc_longitude`, `assoc_theme`) VALUES
(2, 'ConnectBxdsfsd', 'Plateforme pour les jeunes', 'Rue des Goujons 152', 'Anderlecht', 32444444, 'connectbx.be', 87987887, 7687668, 'bonnequestion');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `event_descri` text NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_priority` tinyint(1) NOT NULL,
  `event_address` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_descri`, `event_image`, `event_priority`, `event_address`) VALUES
(1, 'Jeunesse', '2017-03-03', 'la description de l\'evenement', 'image.png', 0, 'rue des goujons 33'),
(2, 'Fin de site web', '2017-05-02', 'la description de l\'evenement', 'image1.png', 1, 'rue des goujons 33'),
(3, 'Lancement de site web', '2017-09-03', 'la description de l\'evenement', 'imag2e.png', 1, 'rue des goujons 33'),
(4, 'Celebrations de site', '2017-11-03', 'la description de l\'evenement', 'image3.png', 1, 'rue des goujons 33');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_firstname` varchar(60) DEFAULT NULL,
  `user_birthdate` datetime(1) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_pwd` varchar(50) NOT NULL DEFAULT 'pwd',
  `commentaires` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_birthdate`, `user_email`, `user_login`, `user_pwd`, `commentaires`) VALUES
(3, 'Gilles', 'Thomas', '1999-09-27 00:00:00.0', 'bouh@coucou.com', 'login', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(7, 'Maria', 'Claudy', '1990-01-01 00:00:00.0', 'maria@claudy.be', 'maria', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(9, 'Adrian', 'Pablo Juan', '1924-08-16 00:00:00.0', 'adrian@pablo.ve', 'adrian', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(12, 'Admin', 'Admin', '1980-07-06 00:00:00.0', 't.tonneau@gmail.com', 'admin', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(13, 'Tonneau', 'Thomas', '1970-01-01 00:00:00.0', 'test@mail.com', 'test', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL),
(14, 'User', 'User', '1999-12-02 00:00:00.0', 'user@root.be', 'user', '12dea96fec20593566ab75692c9949596833adc9', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Index pour la table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`assoc_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `associations`
--
ALTER TABLE `associations`
  MODIFY `assoc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
