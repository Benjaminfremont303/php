-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 mai 2023 à 15:02
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paiement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `paiement`, `valide`, `date`) VALUES
(1, 'Comptant', 1, '2023-04-23 16:45:01'),
(2, 'mastercard', 1, '0000-00-00 00:00:00'),
(3, 'Master', 1, '0000-00-00 00:00:00'),
(4, 'Master', 1, '0000-00-00 00:00:00'),
(5, 'Master', 1, '0000-00-00 00:00:00'),
(6, 'Master', 1, '2023-05-05 08:15:00'),
(7, 'Master', 1, '2023-05-05 08:15:35'),
(8, 'Master', 1, '2023-05-05 09:08:59'),
(9, 'Master', 1, '2023-05-05 09:11:45'),
(10, 'Master', 1, '2023-05-05 09:12:01'),
(11, 'Master', 1, '2023-05-05 09:12:26'),
(12, 'Master', 1, '2023-05-05 09:13:01'),
(13, 'Master', 1, '2023-05-05 09:13:27'),
(14, 'MasterCard', 1, '2023-05-05 09:14:00'),
(15, 'MasterCard', 1, '2023-05-05 11:43:44'),
(16, 'MasterCard', 1, '2023-05-05 11:45:28'),
(17, 'MasterCard', 1, '2023-05-05 11:52:45'),
(18, 'Paypal', 1, '2023-05-05 14:17:52'),
(19, 'MasterCard', 1, '2023-05-05 14:30:46'),
(20, 'Bitcoin', 1, '2023-05-05 14:33:09'),
(21, 'Bitcoin', 1, '2023-05-05 14:43:05'),
(22, 'Bitcoin', 1, '2023-05-05 14:43:48'),
(23, 'Bitcoin', 1, '2023-05-05 14:44:41'),
(24, 'Bitcoin', 1, '2023-05-05 14:45:57'),
(25, 'Bitcoin', 1, '2023-05-05 14:46:06'),
(26, 'Bitcoin', 1, '2023-05-05 14:46:18'),
(27, 'Bitcoin', 1, '2023-05-05 14:48:14'),
(28, 'Bitcoin', 1, '2023-05-05 14:48:59'),
(29, 'Bitcoin', 1, '2023-05-05 14:49:23'),
(30, 'Bitcoin', 1, '2023-05-05 14:49:53'),
(31, 'Bitcoin', 1, '2023-05-05 14:50:10'),
(32, 'Bitcoin', 1, '2023-05-05 14:51:58'),
(33, 'Bitcoin', 1, '2023-05-05 14:52:23'),
(34, 'Bitcoin', 1, '2023-05-05 15:04:51'),
(35, 'Bitcoin', 1, '2023-05-05 15:05:44'),
(36, 'Bitcoin', 1, '2023-05-05 15:06:28'),
(37, 'Bitcoin', 1, '2023-05-05 15:12:36'),
(38, 'Bitcoin', 1, '2023-05-05 15:13:51'),
(39, 'Bitcoin', 1, '2023-05-05 15:14:17'),
(40, 'Bitcoin', 1, '2023-05-05 15:14:36'),
(41, 'Bitcoin', 1, '2023-05-05 15:15:08'),
(42, 'Bitcoin', 1, '2023-05-05 15:16:46'),
(43, 'Bitcoin', 1, '2023-05-05 15:18:01'),
(44, 'Bitcoin', 1, '2023-05-05 15:19:15'),
(45, 'Bitcoin', 1, '2023-05-05 15:20:14'),
(46, 'Bitcoin', 1, '2023-05-05 15:20:58'),
(47, 'Bitcoin', 1, '2023-05-05 15:21:21'),
(48, 'Bitcoin', 1, '2023-05-05 15:23:38'),
(49, 'Bitcoin', 1, '2023-05-05 15:23:53'),
(50, 'Bitcoin', 1, '2023-05-05 15:24:08'),
(51, 'Bitcoin', 1, '2023-05-05 15:24:52'),
(52, 'Bitcoin', 1, '2023-05-05 15:25:19'),
(53, 'Bitcoin', 1, '2023-05-05 15:28:01'),
(54, 'Bitcoin', 1, '2023-05-05 15:41:21'),
(55, 'Bitcoin', 1, '2023-05-05 15:41:42'),
(56, 'Bitcoin', 1, '2023-05-05 15:42:12'),
(57, 'Bitcoin', 1, '2023-05-05 15:42:43'),
(58, 'Bitcoin', 1, '2023-05-05 15:44:42'),
(59, 'MasterCard', 1, '2023-05-05 15:46:59'),
(60, 'MasterCard', 1, '2023-05-05 15:47:31'),
(61, 'MasterCard', 1, '2023-05-05 15:48:11'),
(62, 'MasterCard', 1, '2023-05-05 16:24:34'),
(63, 'MasterCard', 1, '2023-05-05 16:26:51'),
(64, 'MasterCard', 1, '2023-05-05 16:27:25'),
(65, 'MasterCard', 1, '2023-05-05 16:28:31'),
(66, 'MasterCard', 1, '2023-05-05 16:46:42'),
(67, 'MasterCard', 1, '2023-05-05 16:51:30'),
(68, 'MasterCard', 1, '2023-05-05 16:54:38'),
(69, 'MasterCard', 1, '2023-05-05 16:55:25'),
(70, 'MasterCard', 1, '2023-05-05 16:56:27'),
(71, 'MasterCard', 1, '2023-05-05 17:00:45'),
(72, 'MasterCard', 1, '2023-05-05 17:01:20');

-- --------------------------------------------------------

--
-- Structure de la table `commandes_menus`
--

DROP TABLE IF EXISTS `commandes_menus`;
CREATE TABLE IF NOT EXISTS `commandes_menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_menus` int NOT NULL,
  `id_commandes` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commandes` (`id_commandes`),
  KEY `id_menus` (`id_menus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes_menus`
--

INSERT INTO `commandes_menus` (`id`, `id_menus`, `id_commandes`) VALUES
(1, 1, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes_produits`
--

DROP TABLE IF EXISTS `commandes_produits`;
CREATE TABLE IF NOT EXISTS `commandes_produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produits` int NOT NULL,
  `id_commandes` int NOT NULL,
  `quantite` int NOT NULL DEFAULT '1',
  `prix` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_produits_2` (`id_produits`,`id_commandes`),
  KEY `id_commandes` (`id_commandes`),
  KEY `id_produits` (`id_produits`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes_produits`
--

INSERT INTO `commandes_produits` (`id`, `id_produits`, `id_commandes`, `quantite`, `prix`) VALUES
(3, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etoiles` varchar(50) DEFAULT NULL,
  `texte` varchar(50) DEFAULT NULL,
  `commande_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_id` (`commande_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `etoiles`, `texte`, `commande_id`) VALUES
(2, '4', 'super horrible', 1);

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prix` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `best_seller` tinyint(1) DEFAULT NULL,
  `points` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `nom`, `image`, `prix`, `description`, `best_seller`, `points`) VALUES
(1, 'Menu de fête', NULL, 158011, 'Super génial', 1, 120);

-- --------------------------------------------------------

--
-- Structure de la table `menus_produits`
--

DROP TABLE IF EXISTS `menus_produits`;
CREATE TABLE IF NOT EXISTS `menus_produits` (
  `id_menus` int NOT NULL,
  `id_produits` int NOT NULL,
  PRIMARY KEY (`id_menus`,`id_produits`),
  KEY `id_produits` (`id_produits`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `menus_produits`
--

INSERT INTO `menus_produits` (`id_menus`, `id_produits`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `fidelite` varchar(50) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `adresse`, `email`, `fidelite`, `pass`) VALUES
(14, 'Alain', 'Proviste', 'Nulle part', 'toto@ala_cantine', '-1', '$2y$10$YjvApDxmN6aehCW74tRSduG7Pyu/J0kuwgG4q33ivixfYSAvnutUu'),
(15, 'Proviste', 'Alain', 'Pas ici', 'aprov2@yahoo.fr', '-1', '$2y$10$50w/k7CXC8s5xBsrM9aHj.M1VeAxoP/vK98OI24f9t1aTt9ldNxPS');

-- --------------------------------------------------------

--
-- Structure de la table `personnes_commandes`
--

DROP TABLE IF EXISTS `personnes_commandes`;
CREATE TABLE IF NOT EXISTS `personnes_commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_personnes` int NOT NULL,
  `id_commandes` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commandes` (`id_commandes`),
  KEY `id_personnes` (`id_personnes`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personnes_commandes`
--

INSERT INTO `personnes_commandes` (`id`, `id_personnes`, `id_commandes`) VALUES
(1, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prix` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `points` int DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `best_seller` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `type`, `nom`, `prix`, `description`, `points`, `image`, `best_seller`) VALUES
(1, 'pizza', 'Anchois', 1000, 'Super pizza', 10, '', 0),
(2, 'pizza', 'pizza ananas', 1500, 'une pizza avec des morceaux d\'ananas.', 15, '', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes_menus`
--
ALTER TABLE `commandes_menus`
  ADD CONSTRAINT `commandes_menus_ibfk_1` FOREIGN KEY (`id_commandes`) REFERENCES `commandes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commandes_menus_ibfk_2` FOREIGN KEY (`id_menus`) REFERENCES `menus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commandes_produits`
--
ALTER TABLE `commandes_produits`
  ADD CONSTRAINT `commandes_produits_ibfk_1` FOREIGN KEY (`id_commandes`) REFERENCES `commandes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commandes_produits_ibfk_2` FOREIGN KEY (`id_produits`) REFERENCES `produits` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `menus_produits`
--
ALTER TABLE `menus_produits`
  ADD CONSTRAINT `menus_produits_ibfk_1` FOREIGN KEY (`id_menus`) REFERENCES `menus` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `menus_produits_ibfk_2` FOREIGN KEY (`id_produits`) REFERENCES `produits` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `personnes_commandes`
--
ALTER TABLE `personnes_commandes`
  ADD CONSTRAINT `personnes_commandes_ibfk_1` FOREIGN KEY (`id_commandes`) REFERENCES `commandes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `personnes_commandes_ibfk_2` FOREIGN KEY (`id_personnes`) REFERENCES `personnes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
