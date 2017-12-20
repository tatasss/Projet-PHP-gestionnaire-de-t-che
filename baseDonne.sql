-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 20 Décembre 2017 à 19:32
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.1.12-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `matthias`
--

-- --------------------------------------------------------

--
-- Structure de la table `ListeTaches`
--

CREATE TABLE `ListeTaches` (
  `id` int(11) NOT NULL,
  `nom_liste` varchar(200) NOT NULL,
  `is_public` int(1) NOT NULL,
  `proprietaire` varchar(200) DEFAULT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ListeTaches`
--

INSERT INTO `ListeTaches` (`id`, `nom_liste`, `is_public`, `proprietaire`, `description`) VALUES
(1, 'La liste', 1, NULL, 'la liste est cool'),
(3, 'dzad', 1, NULL, 'dzad'),
(4, 'ma liste', 0, 'lampda', 'ceci est maliste'),
(5, 'sxqx', 0, 'lampda', 'xsx');

-- --------------------------------------------------------

--
-- Structure de la table `Tache`
--

CREATE TABLE `Tache` (
  `id` int(11) NOT NULL,
  `nom_tache` varchar(200) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `description_tache` varchar(400) NOT NULL,
  `id_liste` int(11) NOT NULL,
  `proprietaire` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Tache`
--

INSERT INTO `Tache` (`id`, `nom_tache`, `date_debut`, `date_fin`, `description_tache`, `id_liste`, `proprietaire`) VALUES
(1, 'as', NULL, NULL, 'sasasasasasa', 1, NULL),
(2, 'la tache', NULL, NULL, 'ceci est la tache', 4, 'lampda'),
(3, 'le nom', NULL, NULL, 'cecec', 3, NULL),
(4, 'asasasa', NULL, NULL, 'sas', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `nom` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`nom`, `mdp`, `role`) VALUES
('lampda', 'lampda', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ListeTaches`
--
ALTER TABLE `ListeTaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprio` (`proprietaire`);

--
-- Index pour la table `Tache`
--
ALTER TABLE `Tache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proprioTache` (`proprietaire`),
  ADD KEY `liste` (`id_liste`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`nom`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ListeTaches`
--
ALTER TABLE `ListeTaches`
  ADD CONSTRAINT `proprio` FOREIGN KEY (`proprietaire`) REFERENCES `Utilisateur` (`nom`);

--
-- Contraintes pour la table `Tache`
--
ALTER TABLE `Tache`
  ADD CONSTRAINT `liste` FOREIGN KEY (`id_liste`) REFERENCES `ListeTaches` (`id`),
  ADD CONSTRAINT `proprioTache` FOREIGN KEY (`proprietaire`) REFERENCES `Utilisateur` (`nom`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
