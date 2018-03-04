-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 04 mars 2018 à 13:52
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`gam_id`, `gam_title`, `gam_desc`) VALUES
(14, 'Better Drunk Than Dead', '<h2>Story</h2>\r\n<p style=\"text-align: justify;\">Better Drunk Than dead is a fast paced shooter taking place during a transdimensional monsters invasion in a satrical modern world. It\'s heavily inspired by arena shooter of the 90\'s such as DOOM, Duke Nukem and Shadow Warrior.</p>\r\n<p style=\"text-align: justify;\">You are Jay, a student who wake up with huge hangover after the biggest party of his life and you doesn\'t remember anything about it. Will you where sleeping the city has been invaded and reduced to ash by some strange creatures who kill everything they met.</p>\r\n<p style=\"text-align: justify;\">Your mission will be to inverstigate to what\'s happen last night and also to clear this fucking mess.You will need to slaugther endless waves of monsters but always with style.</p>\r\n<h2>Features</h2>\r\n<ul>\r\n<li>Non-linear story</li>\r\n<li>Fast paced arena fighting with huge importance of scoring</li>\r\n<li>Alcoholic status management</li>\r\n<li>Over 30 range and melee weapons</li>\r\n<li>Various alcohol drinks which give mutiple boost</li>\r\n<li>Dual wield everything</li>\r\n<li>Randomly generated monsters</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `new_id` int(11) NOT NULL AUTO_INCREMENT,
  `new_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `new_title` text,
  `tpn_id` int(11) DEFAULT NULL,
  `new_text` text,
  `gam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`new_id`),
  KEY `tpnews_id` (`tpn_id`),
  KEY `gam_id` (`gam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`new_id`, `new_date`, `new_title`, `tpn_id`, `new_text`, `gam_id`) VALUES
(47, '2018-02-16 16:31:33', 'lclkcklcvklfvl', 5, '<p>klfkfdlkdfl</p>', NULL),
(48, '2018-02-16 16:31:33', 'Patch note example', 5, '<p style=\"text-align: justify;\">Players, as with the last patch, a new type of anti-cheat solution, which is still under development, is to be applied on the test servers. We are in a test phase with this solution, and its stability and compatibility need to be verified. We would like to collect data about potential compatibility issues, analyze it and solve any issues that may emerge.</p>\r\n<p style=\"text-align: justify;\">If the current test build is consistently crashing for you, we recommend that you play on the live servers instead. Thank you for your understanding.&nbsp;</p>\r\n<p style=\"text-align: justify;\"><iframe src=\"//www.youtube.com/embed/dQw4w9WgXcQ\" width=\"560\" height=\"314\"></iframe></p>\r\n<p style=\"text-align: justify;\">Please find the patch notes below:</p>\r\n<h3 style=\"text-align: justify;\">World</h3>\r\n<ul style=\"text-align: justify;\">\r\n<li>Miramar improvements</li>\r\n<ul>\r\n<li>Added more buildings and cover across the map to improve the engagement experience</li>\r\n<li>Added more off-road routes for easier vehicle navigation</li>\r\n<li>Upgraded the item spawn level of certain areas for loot balancing (some areas will spawn better loot)</li>\r\n</ul>\r\n</ul>\r\n<h3 style=\"text-align: justify;\">Replay</h3>\r\n<ul style=\"text-align: justify;\">\r\n<li>The replay system has now been updated to a newer version and past replay files cannot be played anymore</li>\r\n</ul>\r\n<h3 style=\"text-align: justify;\">Bug fixes</h3>\r\n<ul style=\"text-align: justify;\">\r\n<li>Fixed the issue where heal and boost items could be used underwater</li>\r\n<li>Fixed the issue where characters would get stuck in certain areas on Miramar</li>\r\n<li>Fixed the issue where wall textures on some Miramar buildings were not displaying correctly</li>\r\n<li>Fixed the issue where certain buildings near by Hacienda del Patron were not displaying correctly</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Thank you.<br /><strong>The PUBG Development and Community Team</strong></p>', 14),
(49, '2018-02-16 17:43:46', 'Test de la communauté', 2, '<p>c\'est la commu</p>', NULL),
(50, '2018-02-17 21:45:54', 'TEST YOLO', 4, '<p>Test</p>\r\n<p><iframe src=\"//www.youtube.com/embed/usBoJJxrFLs\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', NULL),
(51, '2018-02-28 15:09:54', 'YOLO', 2, '<p>GWCWCB</p>', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tpnews`
--

DROP TABLE IF EXISTS `tpnews`;
CREATE TABLE IF NOT EXISTS `tpnews` (
  `tpn_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpn_label` varchar(10) NOT NULL,
  PRIMARY KEY (`tpn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tpnews`
--

INSERT INTO `tpnews` (`tpn_id`, `tpn_label`) VALUES
(1, 'News'),
(2, 'Commu'),
(4, 'DevLog'),
(5, 'Patch note');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `vid_id` int(11) NOT NULL AUTO_INCREMENT,
  `vid_name` varchar(15) DEFAULT NULL,
  `vid_url` text,
  `gam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vid_id`),
  KEY `gam_id` (`gam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`vid_id`, `vid_name`, `vid_url`, `gam_id`) VALUES
(3, 'yolo', 'https://www.youtube.com/embed/ESIUB-NsNMg', NULL),
(7, 'Brutal doom 2', 'https://www.youtube.com/embed/9YoADewX12E', 14),
(8, 'DOOM 2016', 'https://www.youtube.com/embed/RO90omga8D4', 14),
(9, 'DOOM CINEMATIC', 'https://www.youtube.com/embed/omWEZI0cT1g', 14),
(10, 'Bill', 'https://www.youtube.com/embed/v7xn2Kj1QGA', 14);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`tpn_id`) REFERENCES `tpnews` (`tpn_id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`gam_id`) REFERENCES `game` (`gam_id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`gam_id`) REFERENCES `game` (`gam_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
