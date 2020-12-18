-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 18 déc. 2020 à 07:40
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `random_couples`
--

-- --------------------------------------------------------

--
-- Structure de la table `couples`
--

DROP TABLE IF EXISTS `couples`;
CREATE TABLE IF NOT EXISTS `couples` (
  `id` int(11) NOT NULL,
  `idFirst` int(11) DEFAULT NULL,
  `idSecond` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `couples`
--

INSERT INTO `couples` (`id`, `idFirst`, `idSecond`) VALUES
(1, 1, 2),
(2, 3, 4),
(3, 1, 3),
(4, 2, 4),
(5, 1, 4),
(6, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `couples_rounds`
--

DROP TABLE IF EXISTS `couples_rounds`;
CREATE TABLE IF NOT EXISTS `couples_rounds` (
  `couple_id` int(11) NOT NULL,
  `round_id` int(11) NOT NULL,
  PRIMARY KEY (`couple_id`,`round_id`),
  UNIQUE KEY `fk_couples_has_rounds_couples_idx` (`couple_id`),
  KEY `fk_couples_has_rounds_rounds1` (`round_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `couples_rounds`
--

INSERT INTO `couples_rounds` (`couple_id`, `round_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rounds`
--

DROP TABLE IF EXISTS `rounds`;
CREATE TABLE IF NOT EXISTS `rounds` (
  `id` int(11) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rounds`
--

INSERT INTO `rounds` (`id`, `name`, `statut`, `created`) VALUES
(1, 'Round1', 1, '2020-12-17 00:00:00'),
(2, 'Round2', 1, '2020-12-17 00:00:00'),
(3, 'Round3', 0, '2020-12-17 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL,
  `fields_linked` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `active`) VALUES
(1, 'admin', '5221a29502545a0cca5a7c5fe013879272c467b8', 'admin', 1),
(7, 'user', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `couples_rounds`
--
ALTER TABLE `couples_rounds`
  ADD CONSTRAINT `fk_couples_has_rounds_couples` FOREIGN KEY (`couple_id`) REFERENCES `couples` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_couples_has_rounds_rounds1` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
