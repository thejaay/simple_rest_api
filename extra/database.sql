-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Octobre 2017 à 21:45
-- Version du serveur :  5.6.17-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `api_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorite_songs`
--

CREATE TABLE IF NOT EXISTS `favorite_songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_song` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_per_favlist` (`id_user`,`id_song`),
  KEY `id_song` (`id_song`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `favorite_songs`
--

INSERT INTO `favorite_songs` (`id`, `id_user`, `id_song`) VALUES
(8, 1, 1),
(7, 1, 5),
(5, 1, 6),
(13, 6, 1),
(18, 6, 2),
(14, 6, 4),
(17, 6, 6);

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `length`) VALUES
(1, 'Ecailles de lune, Pt. 2', 'Alcest', 589),
(2, 'Enter sandman', 'Metallica', 331),
(3, 'Raining blood', 'Slayer', 255),
(4, 'Electric Crown', 'Testament', 330),
(5, 'Blacklist', 'Exodus', 376),
(6, 'Brewtal Awakening', 'Lost Society', 313);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `mail`) VALUES
(1, 'Jerome', 'jerome.duchat@gmail.com'),
(3, 'James', 'james.hetfield@gmail.com'),
(4, 'Kirk', 'kirk.hamett@gmail.com'),
(5, 'James', 'james.labrie@gmail.com'),
(6, 'Dave', 'dave.mustaine@gmail.com'),
(7, 'Gene', 'gene.simmons@gmail.com'),
(8, 'Kurt', 'kurt.cobain@gmail.com'),
(9, 'Serge', 'serge.gainsbourg@gmail.com'),
(10, 'Martin', 'martin.solveig@gmail.com');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `favorite_songs`
--
ALTER TABLE `favorite_songs`
  ADD CONSTRAINT `favorite_songs_ibfk_1` FOREIGN KEY (`id_song`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `favorite_songs_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
