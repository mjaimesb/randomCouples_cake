-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 09 jan. 2021 à 13:14
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idFirst` int(11) DEFAULT NULL,
  `idSecond` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `couples`
--

INSERT INTO `couples` (`id`, `idFirst`, `idSecond`) VALUES
(57, 5, 3),
(58, 6, 2),
(59, 7, 1),
(60, 1, 6),
(61, 2, 5),
(62, 3, 4),
(63, 4, 6),
(64, 5, 3),
(65, 1, 2),
(66, 2, 6),
(67, 3, 1),
(68, 4, 5),
(69, 5, 6),
(70, 1, 4),
(71, 2, 3),
(72, 3, 6),
(73, 4, 2),
(74, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `couples_rounds`
--

DROP TABLE IF EXISTS `couples_rounds`;
CREATE TABLE IF NOT EXISTS `couples_rounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `couple_id` int(11) NOT NULL,
  `round_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `couples_rounds`
--

INSERT INTO `couples_rounds` (`id`, `couple_id`, `round_id`) VALUES
(62, 57, 66),
(63, 58, 66),
(64, 59, 66),
(65, 60, 67),
(66, 61, 67),
(67, 62, 67),
(68, 63, 68),
(69, 64, 68),
(70, 65, 68),
(71, 66, 69),
(72, 67, 69),
(73, 68, 69),
(74, 69, 70),
(75, 70, 70),
(76, 71, 70),
(77, 72, 71),
(78, 73, 71),
(79, 74, 71);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT NULL,
  `statut` int(11) DEFAULT 0,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rounds`
--

INSERT INTO `rounds` (`id`, `name`, `statut`, `created`) VALUES
(67, 'Round 1', 1, '2021-01-06 17:02:12'),
(68, 'Round 2', 0, '2021-01-06 17:02:12'),
(69, 'Round 3', 0, '2021-01-06 17:02:12'),
(70, 'Round 4', 0, '2021-01-06 17:02:12'),
(71, 'Round 5', 0, '2021-01-06 17:02:13');

-- --------------------------------------------------------

--
-- Structure de la table `rules`
--

DROP TABLE IF EXISTS `rules`;
CREATE TABLE IF NOT EXISTS `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `active`) VALUES
(1, 'Sébastien', '5221a29502545a0cca5a7c5fe013879272c467b8', 'admin', 1),
(2, 'Céline', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 1),
(3, 'Sophie', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 1),
(4, 'Selin', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 1),
(5, 'Thaïs', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 1),
(6, 'Manuel', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 1),
(7, 'Romaric', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 0),
(8, 'Vincent', 'ab8ce82b712bda3f89580626016c0e81a56aeacf', 'user1', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
