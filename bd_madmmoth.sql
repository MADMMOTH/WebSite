-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 27 jan. 2018 à 14:42
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_madmmoth`
--

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `gam_id` int(11) NOT NULL AUTO_INCREMENT,
  `gam_title` text,
  `gam_desc` text,
  PRIMARY KEY (`gam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`gam_id`, `gam_title`, `gam_desc`) VALUES
(1, 'g:vclm', 'lm,mldmf');

-- --------------------------------------------------------

--
-- Structure de la table `liste_page`
--

DROP TABLE IF EXISTS `liste_page`;
CREATE TABLE IF NOT EXISTS `liste_page` (
  `idPage` int(11) NOT NULL AUTO_INCREMENT,
  `urlPage` mediumtext COLLATE utf8_bin NOT NULL,
  `titrePage` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idPage`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `liste_page`
--

INSERT INTO `liste_page` (`idPage`, `urlPage`, `titrePage`) VALUES
(0, 'page/accueil.php', 'Home page'),
(1, 'page/game.php', 'Game'),
(2, 'page/news.php', 'News'),
(3, 'page/community.php', 'Community');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `new_id` int(11) NOT NULL AUTO_INCREMENT,
  `new_title` text,
  `new_text` text,
  PRIMARY KEY (`new_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_text`) VALUES
(18, 'test html', '<h2>TEST YOLO</h2>'),
(21, 'fdlfdcfl', 'klklkl'),
(22, 'cmvlfgm', 'lmmkmlklmk'),
(23, NULL, NULL),
(24, 'TETST DFFJSDKFDKSLD', 'LDFLKDFLKDFLK\r\nFDDFLKDFLK\r\nDSLDFLKDFLM'),
(25, 'fdlkfdl', 'dslkckl'),
(26, 'fdlkfdl', 'dslkckl'),
(27, 'fdlkfdl', 'dslkckl'),
(28, 'fdlkfdl', 'dslkckl'),
(29, 'fdlkfdl', 'dslkckl'),
(30, 'fdlkfdl', 'dslkckl'),
(31, 'vklcklk', 'vclvc;cv;:'),
(32, 'vklcklk', 'vclvc;cv;:'),
(33, 'vklcklk', 'vclvc;cv;:'),
(34, 'vklcklk', 'vclvc;cv;:'),
(35, 'vklcklk', 'vclvc;cv;:'),
(36, 'vklcklk', 'vclvc;cv;:');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `vid_id` int(11) NOT NULL AUTO_INCREMENT,
  `vid_url` text,
  `gam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vid_id`),
  KEY `gam_id` (`gam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`vid_id`, `vid_url`, `gam_id`) VALUES
(1, 'fddfklfkldfkl', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`gam_id`) REFERENCES `game` (`gam_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
