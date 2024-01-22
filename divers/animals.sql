-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 22 jan. 2024 à 16:07
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `refuge`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `animal_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `animal_race` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mfi` tinyint UNSIGNED NOT NULL,
  `birthdate` date DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `maison` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `appartement` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `enfants` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `chiens` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `chats` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adoption_sos` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `animal_type`, `animal_race`, `mfi`, `birthdate`, `file_name`, `description`, `maison`, `appartement`, `enfants`, `chiens`, `chats`, `categorie`, `adoption_sos`) VALUES
(7, 'Michel', 'chien', 'Beagle', 1, '2023-12-13', 'beagle-g192779232-1920.jpg', 'Ceci est un test', 'Non', 'Oui', 'Non', 'Non', 'Oui', NULL, NULL),
(8, 'Roger', 'chien', 'Boxer', 1, '2023-11-16', 'choses-que-chiens-detestent-062128.jpg', 'Ceci est un autre test', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Bernadette', 'chien', NULL, 2, '2019-06-13', 'chien1.jpg', 'oui', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Jean-Eudes', 'chien', NULL, 1, '2024-01-03', 'JM6XAGGOCREQNECD4PASNKYQII.jpg', 'ergebeb', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Marie-Joséphine', 'chien', NULL, 2, '2024-01-10', 'mignon-chien-york-terrier-105758.jpg', 'gh,ghj,ghv,', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Donachien', 'chien', NULL, 1, '2023-01-02', 'top_5_chien_intelligents_vidéo.jpg', 'vbcggc n', NULL, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
