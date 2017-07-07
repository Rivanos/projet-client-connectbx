-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 07 Juillet 2017 à 09:35
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.4

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
-- Structure de la table `associations`
--

CREATE TABLE `associations` (
  `assoc_id` int(10) UNSIGNED NOT NULL,
  `assoc_name` varchar(30) NOT NULL,
  `assoc_descri` text NOT NULL,
  `assoc_address` varchar(200) NOT NULL,
  `assoc_phone` int(11) NOT NULL,
  `assoc_website` varchar(255) NOT NULL,
  `assoc_latitude` double NOT NULL,
  `assoc_longitude` double NOT NULL,
  `assoc_theme` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`assoc_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `associations`
--
ALTER TABLE `associations`
  MODIFY `assoc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
