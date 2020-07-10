-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 09 juil. 2020 à 21:09
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projectsymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE `avion` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transporteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vitesse` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avion`
--

INSERT INTO `avion` (`id`, `nom`, `type`, `transporteur`, `destination`, `vitesse`, `image`) VALUES
(1, 'SuperSonic Avion', 'AirFrance', 'AirFrance', '', 400, '');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `auther` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compagnie`
--

CREATE TABLE `compagnie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiffredaffair` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compagnie`
--

INSERT INTO `compagnie` (`id`, `nom`, `origine`, `chiffredaffair`, `description`, `datecreation`, `logo`) VALUES
(1, 'AirFrance', 'France', '', 'Une compagnie aérienne Francaise', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `vole_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `users_id`, `vole_id`, `date`) VALUES
(1, 1, 1, '2020-07-09 21:07:44'),
(2, 1, NULL, '2020-07-09 21:07:44'),
(3, 1, NULL, '2020-07-09 21:07:45'),
(4, 1, 1, '2020-07-09 21:07:48'),
(5, 1, NULL, '2020-07-09 21:07:48'),
(6, 1, NULL, '2020-07-09 21:07:49');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `tel`, `email`, `password`) VALUES
(1, 'TEDALDI', 'lAMBERT', '06458471', 'lambert.tedaldi@gmail.com', '$2y$13$XY7w/nHHSfR5FUi7KHLMyeqve3Kp2zC1RYkvt.fnPH4/GKQ/QYhxW');

-- --------------------------------------------------------

--
-- Structure de la table `vole`
--

CREATE TABLE `vole` (
  `id` int(11) NOT NULL,
  `avion_id` int(11) DEFAULT NULL,
  `compagnie_id` int(11) DEFAULT NULL,
  `heurdepart` datetime NOT NULL,
  `heurearrive` datetime NOT NULL,
  `aeroport_depart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aeroport_arrive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vole`
--

INSERT INTO `vole` (`id`, `avion_id`, `compagnie_id`, `heurdepart`, `heurearrive`, `aeroport_depart`, `aeroport_arrive`) VALUES
(1, 1, 1, '2020-07-16 10:00:00', '2020-07-18 12:00:00', 'Paris ', 'Munich'),
(2, 1, 1, '2020-07-10 10:00:00', '2020-07-11 11:00:00', 'Paris', 'Calvi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_42C8495567B3B43D` (`users_id`),
  ADD KEY `IDX_42C84955224C06BF` (`vole_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vole`
--
ALTER TABLE `vole`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D80B1D3D80BBB841` (`avion_id`),
  ADD KEY `IDX_D80B1D3D52FBE437` (`compagnie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avion`
--
ALTER TABLE `avion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compagnie`
--
ALTER TABLE `compagnie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `vole`
--
ALTER TABLE `vole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C84955224C06BF` FOREIGN KEY (`vole_id`) REFERENCES `vole` (`id`),
  ADD CONSTRAINT `FK_42C8495567B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `vole`
--
ALTER TABLE `vole`
  ADD CONSTRAINT `FK_D80B1D3D52FBE437` FOREIGN KEY (`compagnie_id`) REFERENCES `compagnie` (`id`),
  ADD CONSTRAINT `FK_D80B1D3D80BBB841` FOREIGN KEY (`avion_id`) REFERENCES `avion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
