-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 28 sep. 2020 à 10:33
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cgbox`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `privilege` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `planId` int(11) NOT NULL,
  `downloadId` int(11) NOT NULL,
  `modelId` int(11) NOT NULL,
  `patternId` int(11) NOT NULL,
  `downloadDate` date NOT NULL,
  `coinSpent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rating` float NOT NULL,
  `dateSubmission` date NOT NULL,
  `totalDownloads` int(11) NOT NULL,
  `numberFaces` int(11) NOT NULL,
  `perimetre` float NOT NULL,
  `scalable` tinyint(1) NOT NULL,
  `cost` float NOT NULL,
  `3dRenderWireframe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `model_download`
--

CREATE TABLE `model_download` (
  `id` int(11) NOT NULL,
  `downloadId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `modelId` int(11) NOT NULL,
  `patternId` int(11) NOT NULL,
  `downloadDate` date NOT NULL,
  `coinSpent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `model_pics`
--

CREATE TABLE `model_pics` (
  `id` int(11) NOT NULL,
  `3dRender` varchar(200) NOT NULL,
  `model_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `model_save`
--

CREATE TABLE `model_save` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `modelId` int(11) NOT NULL,
  `patternId` int(11) NOT NULL,
  `modelChanges` varchar(400) NOT NULL,
  `patternChanges` varchar(400) NOT NULL,
  `creationDate` date NOT NULL,
  `downloaded` tinyint(1) NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pattern`
--

CREATE TABLE `pattern` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rating` float NOT NULL,
  `dateSubmission` date NOT NULL,
  `cost` float NOT NULL,
  `totalDownloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `monthlyPrice` float NOT NULL,
  `annualyPrice` float NOT NULL,
  `savingPerMonth` float NOT NULL,
  `coins` int(11) NOT NULL,
  `commercialUse` varchar(200) NOT NULL,
  `saveProject` varchar(200) NOT NULL,
  `fileOutput` varchar(200) NOT NULL,
  `projectRecovery` varchar(200) NOT NULL,
  `3dPreview` varchar(200) NOT NULL,
  `hud_estimatedTime` varchar(200) NOT NULL,
  `featuredDesigns` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `transactionId` int(11) NOT NULL,
  `planId` int(11) NOT NULL,
  `transactionDate` date NOT NULL,
  `paymentMethod` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `currency` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `country` varchar(100) NOT NULL,
  `currentPlan` varchar(200) NOT NULL,
  `purchaseDate` date NOT NULL,
  `expectedPlanEnd` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `colorCut` varchar(200) NOT NULL,
  `colorEngraving` varchar(200) NOT NULL,
  `colorTracing` varchar(200) NOT NULL,
  `cutSpeed` float NOT NULL,
  `payementMethod` varchar(200) NOT NULL,
  `transaction` tinyint(1) NOT NULL,
  `coins` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_download`
--
ALTER TABLE `model_download`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_pics`
--
ALTER TABLE `model_pics`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_save`
--
ALTER TABLE `model_save`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `model_download`
--
ALTER TABLE `model_download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `model_pics`
--
ALTER TABLE `model_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `model_save`
--
ALTER TABLE `model_save`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
