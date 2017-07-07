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
(3, 'Gilles', 'Thomas', '2010-09-20 00:00:00.0', 'bouh@coucou.com', 'login', 'password', NULL),
(5, 'Emily', 'Eric', '2017-06-23 00:00:00.0', 'caca@pipi', 'login', 'pwd', NULL),
(6, 'Gary', 'Nadia', '0001-01-01 00:00:00.0', 'gary@nadia', 'gary', 'dskl', NULL),
(7, 'Maria', 'Claudy', '0001-01-01 00:00:00.0', 'maria@claudy', 'maria', '90531f9b27cfda8119ebf6fb37c8e57af767811d', NULL),
(9, 'Adrian', 'Pablo', '0001-01-01 00:00:00.0', 'adrian@pablo', 'adrian', '707d14912bb250caf67dfe0ea4035681fbfc4f56', NULL),
(12, 'Admin', 'Admin', '2017-07-06 00:00:00.0', 't.tonneau@gmail.com', 'admin', '00d70c561892a94980befd12a400e26aeb4b8599', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
