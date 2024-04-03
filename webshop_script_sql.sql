-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 31 jan. 2023 à 14:27
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webshop2.0`
--

-- --------------------------------------------------------

--
-- Structure de la table `acceder`
--

DROP TABLE IF EXISTS `acceder`;
CREATE TABLE IF NOT EXISTS `acceder` (
  `idreserv` int(11) NOT NULL,
  `idmembre` int(11) NOT NULL,
  PRIMARY KEY (`idreserv`,`idmembre`),
  KEY `ACCEDER_utilisateurs0_FK` (`idmembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bonne_affaire`
--

DROP TABLE IF EXISTS `bonne_affaire`;
CREATE TABLE IF NOT EXISTS `bonne_affaire` (
  `id_bonne_affaire` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_bonne_affaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` text NOT NULL,
  `idproduit` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcat`),
  KEY `categorie_produit_FK` (`idproduit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `categorie`, `idproduit`) VALUES
(1, 'teeshirt', NULL),
(2, 'pantalon', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idcontact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`idcontact`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idcontact`, `nom`, `prenom`, `email`, `message`) VALUES
(1, 'abdou', 'Abdou', 'musbahou.abdoul@gmail.com', 'test 1234');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idproduit` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `produit` varchar(25) NOT NULL,
  `prix` int(11) NOT NULL,
  `marque` varchar(10) NOT NULL,
  `image` varchar(25) NOT NULL,
  `idcat` int(11) NOT NULL,
  PRIMARY KEY (`idproduit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idproduit`, `description`, `produit`, `prix`, `marque`, `image`, `idcat`) VALUES
(1, 'jeans bleau', 'jeans skinny', 25, 'skinny', 'jeans_skinny.jpg', 1),
(2, 'jeggings ecru', 'jeggings ecru', 50, 'maiy', 'jeggings_ecru.jpg', 1),
(3, 't-shirt rose', 't-shirt_rose', 20, 'maiy', 't-shirt_rose.jpg', 2),
(4, 't-shirt blanc', 't-shirt blanc', 20, 'maiy', 't-shirt_blanc.jpg', 2),
(5, 'Pentalon vert', 'Pentalon vert', 50, 'maiy', 'Pentalon_vert.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idreserv` int(11) NOT NULL AUTO_INCREMENT,
  `NC` int(11) NOT NULL,
  `Nomclient` varchar(100) NOT NULL,
  `Produit` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `prix` int(4) NOT NULL,
  PRIMARY KEY (`idreserv`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idreserv`, `NC`, `Nomclient`, `Produit`, `date`, `prix`) VALUES
(1, 1, 'Abdoul', 'jeans skinny', '2022-09-29', 25),
(2, 2, 'Abdoul', 'jeans skinny', '2022-09-29', 25),
(3, 3, 'Abdoul', 'jeans skinny', '2022-09-30', 25),
(4, 4, '', 't-shirt_rose', '2022-10-03', 20),
(5, 5, '', 'Pentalon vert', '2022-11-08', 50),
(6, 6, '', 'jeans skinny', '2022-11-16', 25),
(7, 7, '', 'jeans skinny', '2022-11-23', 25),
(8, 8, '', 'jeans skinny', '2022-11-23', 25),
(9, 9, '', 't-shirt_rose', '2022-11-28', 20),
(10, 10, '', 't-shirt_rose', '2023-01-25', 20),
(11, 11, '', 'jeans skinny', '2023-01-30', 25);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `idproduit` int(11) NOT NULL,
  `idreserv` int(11) NOT NULL,
  PRIMARY KEY (`idproduit`,`idreserv`),
  KEY `RESERVER_reservation0_FK` (`idreserv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `idmemebre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_role`),
  KEY `roles_utilisateurs_FK` (`idmemebre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `idmemebre`) VALUES
(1, 'Admin', NULL),
(2, 'Menbre', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idmembre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `sexe` text NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telephone` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`idmembre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idmembre`, `nom`, `prenom`, `sexe`, `age`, `adresse`, `email`, `telephone`, `password`, `id_role`) VALUES
(1, 'test', 'tewt', '', 99, '97470', 'test@gmail.com', 693028908, '', 2),
(2, 'test', 'tewt', '', 99, '97470', 'test@gmail.com', 693028908, '', 2),
(3, 'tees', 'tes', 'Madame', 99, '97470', 'test@gmail.com', 693028908, '', 2),
(4, 'tes', 'tes', 'Monsieur', 55, '97470', 'test@gmail.com', 693028908, '$2y$10$NnB7dqqFvWr3GPY3Q8n0K.WPM50oMVqySgwqIX5lH5i5Iw2/WDGza', 2),
(5, 'admin', 'admin', 'Monsieur', 25, '97470', 'admin@admin.com', 693028908, 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, 'abdou', 'Abdoul', 'Monsieur', 25, '97470', 'musbahou.abdoul@gmail.com', 693028908, '0328da4c7619dfdf90434f5cff094b5b', 2),
(7, 'mina', 'lola', 'Madame', 25, '32 rut michelle', 'mina@gmail.com', 1234567891, 'e10adc3949ba59abbe56e057f20f883e', 2),
(8, 'tata', 'tata', 'Madame', 25, '43 rue Jean Monnet', 'tata@gmail.com', 693028912, 'e10adc3949ba59abbe56e057f20f883e', 2),
(9, 'jean', 'jac', 'Monsieur', 15, '43 rue Jean Monnet', 'jac@gmail.com', 693028918, 'e10adc3949ba59abbe56e057f20f883e', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `RESERVER_produit_FK` FOREIGN KEY (`idproduit`) REFERENCES `produit` (`idproduit`),
  ADD CONSTRAINT `RESERVER_reservation0_FK` FOREIGN KEY (`idreserv`) REFERENCES `reservation` (`idreserv`);

--
-- Contraintes pour la table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_utilisateurs_FK` FOREIGN KEY (`idmemebre`) REFERENCES `utilisateurs` (`idmembre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
