-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 avr. 2025 à 17:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pension`
--

-- --------------------------------------------------------

--
-- Structure de la table `conjoint`
--

CREATE TABLE `conjoint` (
  `num_Pension` varchar(15) NOT NULL,
  `NomConjoint` varchar(15) NOT NULL,
  `PrenomConjoint` varchar(25) NOT NULL,
  `DatenaisConjoint` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `conjoint`
--

INSERT INTO `conjoint` (`num_Pension`, `NomConjoint`, `PrenomConjoint`, `DatenaisConjoint`) VALUES
('1', 'KAY', 'Adr', '2025-03-16'),
('20', 'KAMI', 'Andreas', '2025-02-07'),
('21', 'M', 'Sarah', '2025-03-30'),
('33', 'XAVIER', 'Rasoa', '1999-12-02'),
('99', 'AGUERO', 'Kun', '2025-03-15');

-- --------------------------------------------------------

--
-- Structure de la table `payer`
--

CREATE TABLE `payer` (
  `idPayer` int(15) NOT NULL,
  `IM` varchar(15) NOT NULL,
  `num_tarif` varchar(25) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `payer`
--

INSERT INTO `payer` (`idPayer`, `IM`, `num_tarif`, `Date`) VALUES
(7, '10', '20O', '2025-03-06'),
(10, '22', '23456', '2025-03-18'),
(15, '22', '1', '2025-04-16'),
(16, '20', '4', '2025-05-09'),
(17, '7', '1', '2025-08-17'),
(19, '15', '1', '2025-05-17'),
(20, '32', '5', '2025-11-10'),
(22, '9', '7', '2025-05-18'),
(216, 'CJ991744040202', 'TAR1744040202', '2025-04-07'),
(218, 'CJ211744088593', 'TAR1744088593', '2025-04-08'),
(230, '33', '33', '2025-04-08'),
(231, 'CJ331744099872', 'TAR1744099872', '2025-04-08'),
(232, 'CJ331744099920', 'TAR1744099920', '2025-04-08');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `IM` varchar(15) NOT NULL,
  `Nom` varchar(15) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Datenais` date NOT NULL,
  `Contact` varchar(13) NOT NULL,
  `Statut` varchar(15) NOT NULL,
  `Situation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`IM`, `Nom`, `Prenom`, `Datenais`, `Contact`, `Statut`, `Situation`) VALUES
('03', 'RAELISON', 'Andriann', '2025-03-16', '034898859', 'Vivant', 'Marié(e)'),
('10', 'LEO', 'Messi', '2025-03-01', '22896', 'Vivant', 'Marié(e)'),
('15', 'ANDRIATINA', 'Rns', '2025-03-08', '212222', 'Vivant', 'Marié(e)'),
('20', 'RASH', 'Junior', '2025-03-06', '0345240845', 'Vivant', 'Marié(e)'),
('21', 'CADDY', 'Rasolonjatovo', '2024-08-09', '02155', 'Decedé', 'Marié(e)'),
('22', 'DIMARIA', 'Angel', '2025-03-15', '5111231', 'Vivant', 'Divorcé(e)'),
('28', 'JUNIOR', 'Hermann', '2025-03-02', '03265659', 'Vivant', 'Divorcé(e)'),
('33', 'XAVIER', 'Rakoto', '1999-12-02', '036466652', 'Decedé', 'Marié(e)'),
('56', 'MICHEL', 'Mihary', '2025-07-12', '035659', 'Vivant', 'Marié(e)'),
('66', 'ALEXANDER ', 'Arnold', '2025-03-27', '2451561116', 'Vivant', 'Marié(e)'),
('7', 'CRISTIANO', 'Ronaldo', '2025-03-09', '023262', 'Vivant', 'Divorcé(e)'),
('9', 'ROI', 'Pélé', '1970-05-12', '89653', 'Vivant', 'Divorcé(e)'),
('99', 'DIEGO', 'Maradona', '1970-03-02', '021554856', 'Decedé', 'Marié(e)'),
('CJ331744099820', 'XAVIER', 'Rasoa', '1999-12-02', '0321599555', 'Vivant', 'Conjoint'),
('CJ331744099872', 'XAVIER', 'Rasoa', '1999-12-02', '0321599555', 'Vivant', 'Conjoint'),
('CJ331744099920', 'XAVIER', 'Rasoa', '1999-12-02', '0321599555', 'Vivant', 'Conjoint');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `num_Tarif` varchar(15) NOT NULL,
  `Diplome` varchar(25) NOT NULL,
  `Categorie` varchar(25) NOT NULL,
  `Montant` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`num_Tarif`, `Diplome`, `Categorie`, `Montant`) VALUES
('1', 'Pas de Categorie', 'Niveau 1', 250000),
('2', 'Brevet des College', 'Niveau 2', 300000),
('3', 'CAP,BEP', 'Niveau 3', 350000),
('33', 'Doctorat', 'Niveau 7', 5000000),
('4', 'BACC', 'Niveau 4', 400000),
('5', 'BTS', 'Niveau 5', 450000),
('6', 'License', 'Niveau 6', 600000),
('7', 'Master', 'Niveau 7', 1000000),
('TAR1744099820', 'Conjoint Pension', 'Conjoint', 2000000),
('TAR1744099872', 'Conjoint Pension', 'Conjoint', 2000000),
('TAR1744099920', 'Conjoint Pension', 'Conjoint', 2000000);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conjoint`
--
ALTER TABLE `conjoint`
  ADD PRIMARY KEY (`num_Pension`);

--
-- Index pour la table `payer`
--
ALTER TABLE `payer`
  ADD PRIMARY KEY (`idPayer`),
  ADD KEY `IM` (`IM`),
  ADD KEY `num_tarif` (`num_tarif`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`IM`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`num_Tarif`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `payer`
--
ALTER TABLE `payer`
  MODIFY `idPayer` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
