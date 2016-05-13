-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Mars 2016 à 13:22
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `roadtriphelper`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `date` datetime NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date`, `categorie_id`) VALUES
(2, 'Mon Titre', 'There, now he''s trapped in a book I wrote: a crummy world of plot holes and spelling errors! And so we say goodbye to our beloved pet, Nibbler, who''s gone to a place where I, too, hope one day to go. The toilet.\n\n    All I want is to be a monkey of moderate intelligence who wears a suit… that''s why I''m transferring to business school!You wouldn''t. Ask anyway! So, how ''bout them Knicks? No argument here.\n\nIt must be wonderful. For one beautiful night I knew what it was like to be a grandmother. Subjugated, yet honored. Michelle, I don''t regret this, but I both rue and lament it. Yep, I remember. They came in last at the Olympics, then retired to promote alcoholic beverages!', '2015-11-23 17:51:39', 2),
(3, 'Mon Titre', 'There, now he''s trapped in a book I wrote: a crummy world of plot holes and spelling errors! And so we say goodbye to our beloved pet, Nibbler, who''s gone to a place where I, too, hope one day to go. The toilet.\n\n    All I want is to be a monkey of moderate intelligence who wears a suit… that''s why I''m transferring to business school!', '2015-11-23 17:51:43', 2),
(7, 'Mon Titre', 'There, now he''s trapped in a book I wrote: a crummy world of plot holes and spelling errors! And so we say goodbye to our beloved pet, Nibbler, who''s gone to a place where I, too, hope one day to go. The toileI don''t regret this, but I both rue and lament it. Yep, I remember. They came in last at the Olympics, then retired to promote alcoholic beverages!', '2015-11-23 17:52:41', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `titre`) VALUES
(1, 'Piscine & co'),
(2, 'Longboard'),
(4, 'tryTheRaimbow');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
