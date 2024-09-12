-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 10 déc. 2022 à 14:38
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `glese`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--
glesegleseprojetlaravelglese
CREATE TABLE `candidature` (
  `idCandidature` int(11) NOT NULL,
  `idOffreF` int(11) NOT NULL,
  `idUserF` int(11) NOT NULL,
  `dateCandidature` varchar(25) NOT NULL,
  `etatCandidature` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`idCandidature`, `idOffreF`, `idUserF`, `dateCandidature`, `etatCandidature`) VALUES
(1, 4, 3, '03-12-2022 16:58', -1),
(2, 6, 3, '03-12-2022 18:04', -1),
(3, 4, 4, '10-12-2022 14:09', -1);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dateOffre` varchar(25) NOT NULL,
  `competence` text NOT NULL,
  `numero` varchar(25) NOT NULL,
  `etatOffre` int(11) NOT NULL DEFAULT 0,
  `typeOffre` varchar(50) NOT NULL,
  `datePublication` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `poste`, `description`, `dateOffre`, `competence`, `numero`, `etatOffre`, `typeOffre`, `datePublication`) VALUES
(1, 'Docteur', 'je suis dentiste', '05-11-2022 19:11', 'Chirurgien', 'off_05112022191153', 1, 'emploi', '12-11-2022 18:15'),
(2, 'delinquant', 'voleur', '12-11-2022 16:42', 'fort', 'off_12112022164225', 0, 'emploi', ''),
(3, 'Professeur', 'enseigner', '12-11-2022 16:43', 'fort', 'off_12112022164345', 0, 'emploi', ''),
(4, 'Joueur', 'attaquant', '12-11-2022 16:51', 'frappe', 'off_12112022165137', 1, 'emploi', '12-11-2022 18:15'),
(5, 'Eleve', 'dfvd', '12-11-2022 17:34', 'dvfdv', 'off_12112022173444', 0, 'stage', ''),
(6, 'Charger d\'affaire etrangere', 'lmöl', '12-11-2022 17:47', '651', 'off_12112022174751', 1, 'emploi', '12-11-2022 18:15'),
(7, 'uih', 'mjbjb', '26-11-2022 16:18', 'kj', 'off_26112022161823', 1, 'emploi', '26-11-2022 16:18');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `idProfil` int(11) NOT NULL,
  `nomProfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`idProfil`, `nomProfil`) VALUES
(1, 'admin'),
(2, 'Thiam'),
(3, 'RH'),
(4, 'candidat');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `fichierCV` varchar(255) NOT NULL,
  `etatUser` int(11) NOT NULL DEFAULT 1,
  `idProfilF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `prenom`, `nom`, `email`, `login`, `mdp`, `tel`, `adresse`, `fichierCV`, `etatUser`, `idProfilF`) VALUES
(1, 'Madiop', 'Thiam', 'madioptiam90@gmail.com', 'tboy92i', '123456', '771681526', 'DAKAR', '', 1, 1),
(2, 'Mr', 'LO', 'ppbbdiallo@gmail.com', 'bamba', '123456', '77868465', 'DAKAR', '', 1, 3),
(3, 'candidat', 'candidat', 'candidat@gmail.com', 'candidat', '123456', '771234567', 'Dakar', '', 1, 4),
(4, 'candidat', 'candidat', 'candidat1@gmail.com', 'candidat1', '123456', '771234567', 'Dakar', '', 1, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`idCandidature`),
  ADD KEY `idOffreF` (`idOffreF`),
  ADD KEY `idUserF` (`idUserF`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idProfil`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idProfilF` (`idProfilF`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `idCandidature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidature`
--
ALTER TABLE `candidature`
  ADD CONSTRAINT `candidature_ibfk_1` FOREIGN KEY (`idOffreF`) REFERENCES `offre` (`idOffre`),
  ADD CONSTRAINT `candidature_ibfk_2` FOREIGN KEY (`idUserF`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idProfilF`) REFERENCES `profil` (`idProfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
