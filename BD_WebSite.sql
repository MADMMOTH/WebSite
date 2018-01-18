-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 18 Janvier 2018 à 21:49
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--  *********** ETAPE 1 : crée la BD *************
--
-- Base de données :  `bd_madmmoth`
--

CREATE DATABASE bd_madmmoth;

-- --------------------------------------------------------

--  *********** ETAPE 2 : crée Table dans bd_madmmoth *************

--
-- Structure de la table `liste_page`
--

CREATE TABLE `liste_page` (
  `idPage` int(11) NOT NULL,
  `urlPage` mediumtext COLLATE utf8_bin NOT NULL,
  `titrePage` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `liste_page`
--

INSERT INTO `liste_page` (`idPage`, `urlPage`, `titrePage`) VALUES
(0, 'page/accueil.php', 'Home page'),
(1, 'page/game.php', 'Game'),
(2, 'page/news.php', 'News'),
(3, 'page/community.php', 'Community');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `liste_page`
--
ALTER TABLE `liste_page`
  ADD PRIMARY KEY (`idPage`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `liste_page`
--
ALTER TABLE `liste_page`
  MODIFY `idPage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
  

--  *********** ETAPE 3 : privilege dans bd_madmmoth ************* 
-- ***( regarde dans librairie/f_connectBD.php ! ) ***
  
  ---------------------
  
  # Privilèges pour `admin`@`localhost`

GRANT USAGE ON *.* TO 'admin'@'localhost' IDENTIFIED BY PASSWORD '*CFB4BA826E6621440B4EF238BA0336C6F19E5151';

GRANT ALL PRIVILEGES ON `bd_madmmoth`.* TO 'admin'@'localhost' WITH GRANT OPTION;
