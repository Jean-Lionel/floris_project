-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 28 sep. 2020 à 07:38
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

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
  `service_id` int(11) NOT NULL,
  `materiel_id` int(11) NOT NULL,
  `date_affectation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`service_id`, `materiel_id`, `date_affectation`) VALUES
(4, 19, '2020-08-01'),
(4, 27, '2020-09-05'),
(5, 19, '2020-09-15'),
(7, 19, '2020-09-15'),
(7, 23, '2020-09-15'),
(7, 28, '2020-09-15');

-- --------------------------------------------------------

--
-- Structure de la table `floris_table`
--

CREATE TABLE `floris_table` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `bith_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `floris_table`
--

INSERT INTO `floris_table` (`id`, `first_name`, `bith_date`) VALUES
(1, 'NTORE', '2020-08-04');

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
(5, '2020-08-01', 'ram endomage', 1, 1, 20),
(7, '0000-00-00', '', 1, 1, 18),
(8, '2020-08-05', '', 1, 1, 18),
(9, '2020-09-02', 'soudure du cable', 2, 1, 19),
(10, '2009-06-11', 'Laborum Vel enim si', 1, 5, 28);

-- --------------------------------------------------------

--
-- Structure de la table `manifestations`
--

CREATE TABLE `manifestations` (
  `id` int(11) NOT NULL,
  `materiel_id` int(11) DEFAULT NULL,
  `panne_id` int(11) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `manifestations`
--

INSERT INTO `manifestations` (`id`, `materiel_id`, `panne_id`, `date`, `description`) VALUES
(2, 27, 1, '1991-12-04', 'Architecto adipisci '),
(4, 23, 2, '1996-05-25', 'Aut autem quis offic');

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
(19, '000000000000000000000000', 'cable reseau', '2020-07-30', 'acer'),
(20, '1111', 'MACK BOOK', '2020-07-01', 'dell'),
(23, '7214447', 'ram', '2020-09-05', 'asus'),
(28, '79216326', 'modem', '2020-09-01', 'nikai');

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
(6, 'HEY BROTHER', 19, '2020-09-03');

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
(5, 'MAGASIN'),
(6, 'Maintenance'),
(7, 'direction informatique');

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
(5, 'Ineza', 'Elsie', '79969274', '4587/12');

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
(4, 'BUKURU', 'jean', '79526362', 'hacker', 'fea7f657f56a2a448da7d4b535ee5e279caf3d9a', 'USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`service_id`,`materiel_id`);

--
-- Index pour la table `floris_table`
--
ALTER TABLE `floris_table`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `intervantion`
--
ALTER TABLE `intervantion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `manifestations`
--
ALTER TABLE `manifestations`
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
-- AUTO_INCREMENT pour la table `floris_table`
--
ALTER TABLE `floris_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `intervantion`
--
ALTER TABLE `intervantion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `manifestations`
--
ALTER TABLE `manifestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `pannes`
--
ALTER TABLE `pannes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
