-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 04 Février 2022 à 17:20
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `locationreport`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_adresses`
--

CREATE TABLE IF NOT EXISTS `t_adresses` (
  `Adresse` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_adresses`
--

INSERT INTO `t_adresses` (`Adresse`, `Date`) VALUES
('oui', '2022-02-02 00:00:00'),
('ADRESSE', '0000-00-00 00:00:00'),
('test', 'test'),
('salut', '2018-07-22');

-- --------------------------------------------------------

--
-- Structure de la table `t_clients`
--

CREATE TABLE IF NOT EXISTS `t_clients` (
  `N` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Particulier` varchar(10) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `CP` varchar(5) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Montant_Achat` int(11) NOT NULL,
  `Total_Achats` int(11) NOT NULL,
  `Reste_a_Payer` int(11) NOT NULL,
  PRIMARY KEY (`N`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_intervention`
--

CREATE TABLE IF NOT EXISTS `t_intervention` (
  `N° Intervention` int(11) NOT NULL AUTO_INCREMENT,
  `N° Voiture` int(11) NOT NULL,
  `N° Technicien` int(11) NOT NULL,
  `type d'intervention` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Date d'intervention` date NOT NULL,
  `Heure de passage` int(11) NOT NULL,
  `Kilomètres` int(11) NOT NULL,
  PRIMARY KEY (`N° Intervention`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_techniciens`
--

CREATE TABLE IF NOT EXISTS `t_techniciens` (
  `N° Technicien` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `Civilité` varchar(255) NOT NULL,
  `Type d'intervention` varchar(255) NOT NULL,
  PRIMARY KEY (`N° Technicien`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_voiture`
--

CREATE TABLE IF NOT EXISTS `t_voiture` (
  `N° Voiture` int(11) NOT NULL AUTO_INCREMENT,
  `Carburant` varchar(255) NOT NULL,
  `Total Km` int(11) NOT NULL,
  `Puissance Fisacale` int(11) NOT NULL,
  PRIMARY KEY (`N° Voiture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
