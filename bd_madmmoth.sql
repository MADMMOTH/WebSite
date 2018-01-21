-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 jan. 2018 à 06:31
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`new_id`, `new_title`, `new_text`) VALUES
(4, 'TEST NEWS 1', 'Bonjour ceci est une news mdr lol'),
(5, 'TEST NEWS 2', 'TEST MDR LOL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
