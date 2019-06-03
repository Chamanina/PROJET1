-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 juin 2019 à 08:37
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `photoforyou`
--

DELIMITER $$
--
-- Fonctions
--
DROP FUNCTION IF EXISTS `InitCap`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `InitCap` (`my_chaine` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET utf8 BEGIN
RETURN ( concat(upper(substr(my_chaine,1,1)), 
         lower(substr(my_chaine,2,length(my_chaine)-1))) ); 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categ` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom_categ`) VALUES
(1, 'Paysage'),
(2, 'Animaux'),
(3, 'Fleurs'),
(4, 'Véhicule'),
(5, 'Art'),
(6, 'Nourriture');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `nom_img` varchar(255) NOT NULL,
  `prix_img` float(10,1) NOT NULL,
  `lien_img` varchar(255) NOT NULL,
  `lien_php` varchar(255) NOT NULL,
  `description_img` varchar(255) NOT NULL,
  `categ_img` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `actif_img` int(11) DEFAULT NULL,
  `idAcheteur` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idImage`),
  KEY `image_ibfk_1` (`categ_img`),
  KEY `idUser` (`idUser`),
  KEY `idAcheteur` (`idAcheteur`),
  KEY `idAdmin` (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`idImage`, `nom_img`, `prix_img`, `lien_img`, `lien_php`, `description_img`, `categ_img`, `idUser`, `actif_img`, `idAcheteur`, `idAdmin`) VALUES
(1, 'Jungle Paradise', 10.0, 'image/jungle.jpg', 'imagePage/5c71a0cb96b46.php', 'test\r\n', 1, 2, 0, 3, 1),
(2, 'Tigre', 10.0, 'image/tigre.jpg', 'imagePage/5c73bf739d424.php', 'zfdsgfsdf', 2, 2, 0, 3, 1),
(3, 'Plage ', 5.0, 'image/plage.jpg', 'imagePage/5c73bf9320508.php', 'fzqfqzs', 1, 2, 0, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `NomMenu` varchar(45) DEFAULT NULL,
  `Lien` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`idMenu`, `NomMenu`, `Lien`) VALUES
(1, 'Achat des crédits', 'achatcredits.php'),
(2, 'Voir les photos', 'consulter.php'),
(3, 'Nous contacter', 'mailto:caroline.btssio@gmail.com'),
(4, 'Connexion', 'connexion.php'),
(5, 'S\'inscrire', 'inscription.php'),
(6, 'Ajouter une photo', 'ajout.php'),
(7, 'Profil', 'profil.php'),
(8, 'Voir les utilisateurs', 'user.php'),
(9, 'Deconnexion', 'deconnexion.php');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_user` varchar(45) NOT NULL,
  `nom_user` varchar(45) NOT NULL,
  `type_user` int(11) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `mdp_user` varchar(255) NOT NULL,
  `credit_user` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`email_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `prenom_user`, `nom_user`, `type_user`, `email_user`, `mdp_user`, `credit_user`) VALUES
(1, 'Admin', 'ADMIN', 3, 'admin@pfy.com', '$2y$10$OjZUjuJrykdpty3.yJnzReSGN4GRSja6vtoTxdCNM7ko08ccSFWfy', 0),
(2, 'Caroline', 'PONS', 1, 'caroline.p@live.fr', '$2y$10$/8OJYiYC2lA1fy.mQv3Xl.e7AwbbSV5uxSRmV6kxtDNvPEyW09LI6', 33),
(3, 'client', 'CLIENT', 2, 'client@pfy.com', '$2y$10$naHGbTsabI.IrKJIrY.ySeXKnVwcIfCkDj8PI569c93CAXULsn1..', 15);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `idAcheteur` FOREIGN KEY (`idAcheteur`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `idAdmin` FOREIGN KEY (`idAdmin`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
