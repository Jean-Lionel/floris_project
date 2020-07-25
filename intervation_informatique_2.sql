- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 25 juil. 2020 à 10:16
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `intervantion_informatique`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `service_id` int(11) DEFAULT NULL,
  `materiel_id` int(11) DEFAULT NULL,
  `date_affectation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`service_id`, `materiel_id`, `date_affectation`) VALUES
(1, 1, '2020-06-29'),
(2, 2, '2020-06-29'),
(2, 2, '2020-06-29'),
(4, 4, '2020-06-29'),
(1, 1, '2020-07-25'),
(3, 3, '2020-07-25');

-- --------------------------------------------------------

--
-- Structure de la table `intervantion`
--

CREATE TABLE `intervantion` (
  `id` int(11) NOT NULL,
  `date_intervation` date NOT NULL,
  `resultat` text NOT NULL,
  `panne_id` int(11) NOT NULL,
  `techinicien_id` int(11) NOT NULL,
  `materiel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `intervantion`
--

INSERT INTO `intervantion` (`id`, `date_intervation`, `resultat`, `panne_id`, `techinicien_id`, `materiel_id`) VALUES
(1, '2020-07-15', 'DJDJDJDJDJDJDJDJDJ', 1, 1, 1),
(2, '2020-07-13', 'Une panne simple ', 2, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

CREATE TABLE `materiels` (
  `id` int(11) NOT NULL,
  `numero_serie` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `date_fabrication` date DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `materiels`
--

INSERT INTO `materiels` (`id`, `numero_serie`, `nom`, `date_fabrication`, `marque`) VALUES
(18, '0.0.0000.1', 'NZEYIMANA ', '2020-07-14', 'TEST'),
(19, '000000000000000000000000', 'Iradukunda', '2020-07-13', 'acer'),
(20, '1111', 'peter', '2020-07-01', 'dell'),
(21, '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Structure de la table `pannes`
--

CREATE TABLE `pannes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `materiel_id` int(6) DEFAULT NULL,
  `date_panne` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pannes`
--

INSERT INTO `pannes` (`id`, `nom`, `materiel_id`, `date_panne`) VALUES
(1, 'PANNES DE DISK DUR', 1, '2020-06-02'),
(2, 'PROCESSEUR', 3, '2020-06-02'),
(3, 'INFORMATIQUE', NULL, NULL),
(4, '', 6, '2020-06-24');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`) VALUES
(1, 'INFORMATIQUE'),
(2, 'SECRETARIAR'),
(3, 'CIRCULAIRE'),
(4, 'INFORMATIQUE BASE II'),
(5, 'MAGASIN');

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

CREATE TABLE `techniciens` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `techniciens`
--

INSERT INTO `techniciens` (`id`, `nom`, `prenom`, `telephone`, `matricule`) VALUES
(1, 'Delice', 'Delice', '79614', '02022'),
(2, 'Arakaza', 'Aubin', '71207396', '1212'),
(3, 'Ntore', 'Floris', '79000', '2500');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `telephone`, `login`, `password`, `role`) VALUES
(1, 'NTWARI', 'Raoul', '79201420', 'ntwari', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'USER'),
(2, 'Ntore', 'Floris', '71207396', 'florintore', '8fc5894eb5d43d53d90ef15ca9e0bd651887b635', 'ADMIN'),
(3, 'Ingabire ', 'Delly Drice', '72502325', 'moubarak', '011c945f30ce2cbafc452f39840f025693339c42', 'USER'),
(4, 'BUKURU', 'jean', '79526362', 'hacker', 'fea7f657f56a2a448da7d4b535ee5e279caf3d9a', 'USER'),
(5, 'Jean', 'Lionel', '79614036', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ADMIN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `intervantion`
--
ALTER TABLE `intervantion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pannes`
--
ALTER TABLE `pannes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `intervantion`
--
ALTER TABLE `intervantion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `pannes`
--
ALTER TABLE `pannes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
