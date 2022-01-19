-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 déc. 2021 à 14:50
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pets`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login_admin` varchar(30) NOT NULL,
  `mdp_admin` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login_admin`, `mdp_admin`) VALUES
(1, 'karim', 'lelelecc');

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

DROP TABLE IF EXISTS `animaux`;
CREATE TABLE IF NOT EXISTS `animaux` (
  `id_animaux` int(11) NOT NULL AUTO_INCREMENT,
  `nom_animaux` varchar(30) NOT NULL,
  `age_animaux` int(11) NOT NULL,
  `espece_animaux` varchar(20) NOT NULL,
  `race_animaux` varchar(20) NOT NULL,
  `genre_animaux` varchar(20) NOT NULL,
  `description_animaux` text NOT NULL,
  `image_animaux` varchar(50) DEFAULT NULL,
  `enfant_animaux` int(11) NOT NULL,
  `dateaccuell_animaux` date DEFAULT NULL,
  `date_adoption_animaux` date DEFAULT NULL,
  `fk_refuge` int(11) DEFAULT NULL,
  `fk_clients` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_animaux`),
  KEY `animaux_refuge_FK` (`fk_refuge`),
  KEY `animaux_clients0_FK` (`fk_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id_animaux`, `nom_animaux`, `age_animaux`, `espece_animaux`, `race_animaux`, `genre_animaux`, `description_animaux`, `image_animaux`, `enfant_animaux`, `dateaccuell_animaux`, `date_adoption_animaux`, `fk_refuge`, `fk_clients`) VALUES
(2, 'fluffy', 2, 'rongeur', 'hamster', 'Femeel', 'la cochonne', 'hamster_fluffy.jpg', 1, NULL, NULL, 1, NULL),
(12, 'zefzf', 89, 'efzef', 'zef', 'm', 'efzef', 'aef', 1, NULL, NULL, 1, 3),
(15, 'z', 5, 'ze', 'ed', 'm', 'zef', 'zef', 1, NULL, NULL, 2, 13),
(16, 'zdz', 45, 'zd', 'zd', 'm', 'zd', 'zdÂ²Â²', 1, NULL, NULL, 1, NULL),
(18, 'zef', 55, 'aefef', 'qdf', 'm', 'zefz', 'zefz', 0, NULL, NULL, 1, NULL),
(19, 'aefef', 64461, 'zdzd', 'zdz', 'l', 'zdz', 'zd', 0, NULL, NULL, NULL, NULL),
(20, 'df', 25, 'sdfdfa', 'zrf', 'rg', 'zrg', 'rg', 0, NULL, NULL, NULL, NULL),
(21, 'aef', 646, 'aef', 'aef', 'ae', 'ae', 'ae', 0, NULL, NULL, 1, NULL),
(24, 'zef', 5, 'efe', 'ef', 'edf', 'zd', 'ed', 0, NULL, NULL, 1, NULL),
(25, 'jack', 0, 'zde', 'e', 'f', 'zd', 'zd', 0, NULL, NULL, 1, NULL),
(26, 'rob', 2, 'efe', 'ef', 'efd', 'zd', 'zd', 0, NULL, NULL, 1, NULL),
(27, 'ef', 5, 'fef', 'efd', 'ee', 'ed', 'ef', 0, NULL, NULL, 1, NULL),
(28, 'cristoph', 5, 'ef', 'edf', 'ef', 'ef', 'ef', 0, NULL, NULL, 2, NULL),
(33, 'dfdf', 5, 'fdef', 'efef', 'efd', 'efd', 'ef', 0, NULL, NULL, 1, NULL),
(36, 'fdg', 0, 'fef', 'efe', 'zef', 'ef', 'azd', 0, NULL, NULL, NULL, NULL),
(38, 'zef', 5, 'ze', 'zef', 'ze', 'ze', 'zef', 0, NULL, NULL, 2, NULL),
(39, 'fz', 5, 'zef', 'zef', 'aef', 'aef', 'ef', 0, NULL, NULL, 1, 11),
(40, 'sds', 5, 'sdfs', 'dfs', 'gs', 'sdf', 'sd', 0, NULL, NULL, 2, 14),
(41, 'popol', 5, 'zef', 'zef', 'hhj', 'zef', 'zej', 0, NULL, NULL, 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_clients` int(11) NOT NULL AUTO_INCREMENT,
  `nom_clients` varchar(30) NOT NULL,
  `prenom_clients` varchar(30) NOT NULL,
  `age_clients` int(11) NOT NULL,
  `email_clients` varchar(20) NOT NULL,
  `mdp_clients` varchar(20) NOT NULL,
  `adresse_clients` varchar(20) NOT NULL,
  `cp_clients` varchar(6) NOT NULL,
  `ville_clients` varchar(10) NOT NULL,
  PRIMARY KEY (`id_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_clients`, `nom_clients`, `prenom_clients`, `age_clients`, `email_clients`, `mdp_clients`, `adresse_clients`, `cp_clients`, `ville_clients`) VALUES
(1, 'leopold', 'poldo', 25, 'leopoldo@gmail.com', 'alekdalk', 'azk,d,', 'azkld,', 'azmdl'),
(3, 'elise', 'reclus', 25, 'd', 'zrf', 'e', 'd', 'ezf'),
(4, 'ezz', 'dc', 25, 'd', 'zrf', 'e', 'd', 'ezf'),
(8, 'de a vega', 'zoro', 25, 'zoro@gmail.com', 'zoro123', '35 rue de lagrotte', '69150', 'decines'),
(9, 'belzebut', 'karim', 99, 'belzebut@enfer.fr', 'zefkjzef', '35 rue du chatiment', '01000', 'Enfer'),
(11, 'heinz', 'karl', 25, 'karlheinz@kj.fr', 'zfzk', 'amzla', '35656', 'zefzef'),
(13, 'ef', 'frze', 464, 'zf@rf.fzf', 'zf', 'zf', 'ze', 'z'),
(14, 'gabi', 'zez', 45, 'aed', 'ef', 'edze', 'aed', 'ze');

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

DROP TABLE IF EXISTS `commenter`;
CREATE TABLE IF NOT EXISTS `commenter` (
  `fk_clients` int(11) NOT NULL,
  `fk_animaux` int(11) NOT NULL,
  `datecommentaire_commenter` date NOT NULL,
  `contenu_commenter` text NOT NULL,
  PRIMARY KEY (`fk_clients`,`fk_animaux`),
  KEY `commenter_animaux0_FK` (`fk_animaux`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `refuge`
--

DROP TABLE IF EXISTS `refuge`;
CREATE TABLE IF NOT EXISTS `refuge` (
  `id_refuge` int(11) NOT NULL AUTO_INCREMENT,
  `nom_refuge` varchar(30) NOT NULL,
  `adresse_refuge` varchar(50) NOT NULL,
  `cp_refuge` varchar(6) NOT NULL,
  `ville_refuge` varchar(30) NOT NULL,
  `tel_refuge` varchar(10) NOT NULL,
  `email_refuge` varchar(20) NOT NULL,
  `nbplaces_refuge` int(11) NOT NULL,
  PRIMARY KEY (`id_refuge`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `refuge`
--

INSERT INTO `refuge` (`id_refuge`, `nom_refuge`, `adresse_refuge`, `cp_refuge`, `ville_refuge`, `tel_refuge`, `email_refuge`, `nbplaces_refuge`) VALUES
(1, 'SPA des betes', '74 route de lyon', '69680', 'saint priest', '0123456789', 'spabetes@gmail.com', 55),
(2, 'arche de noe', '104 rue de la republique', '69330', 'Meyzieu', '9876543210', 'arche2noe@gmail.com', 35);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `animaux_clients0_FK` FOREIGN KEY (`fk_clients`) REFERENCES `clients` (`id_clients`),
  ADD CONSTRAINT `animaux_refuge_FK` FOREIGN KEY (`fk_refuge`) REFERENCES `refuge` (`id_refuge`);

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_animaux0_FK` FOREIGN KEY (`fk_animaux`) REFERENCES `animaux` (`id_animaux`),
  ADD CONSTRAINT `commenter_clients_FK` FOREIGN KEY (`fk_clients`) REFERENCES `clients` (`id_clients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
