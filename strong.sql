-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 11 Avril 2016 à 09:51
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `strong`
--
CREATE DATABASE IF NOT EXISTS `strong` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `strong`;

-- --------------------------------------------------------

--
-- Structure de la table `carnets`
--

CREATE TABLE IF NOT EXISTS `carnets` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `type_epreuve_id` int(11) NOT NULL,
  `type_activite_id` int(11) NOT NULL,
  `type_exercice_id` int(11) NOT NULL,
  `valeur` int(11) NOT NULL COMMENT 'valeur de l''exercice',
  `unite_id` int(11) NOT NULL,
  `sensations` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `conditions` varchar(255) NOT NULL,
  `commentaires` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `echanges`
--

CREATE TABLE IF NOT EXISTS `echanges` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `type_echange_id` int(11) NOT NULL,
  `reponse_id` int(11) NOT NULL,
  `echange` text NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `echanges_images`
--

CREATE TABLE IF NOT EXISTS `echanges_images` (
  `id_echange` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `ref_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `reponse` text NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle`) VALUES
(0, 'admin'),
(6, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_validite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_activite`
--

CREATE TABLE IF NOT EXISTS `type_activite` (
  `id` int(11) NOT NULL,
  `activité` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_echange`
--

CREATE TABLE IF NOT EXISTS `type_echange` (
  `id` int(11) NOT NULL,
  `type_echange` varchar(255) NOT NULL,
  `codecouleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_epreuve`
--

CREATE TABLE IF NOT EXISTS `type_epreuve` (
  `id` int(11) NOT NULL,
  `epreuve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_exercice`
--

CREATE TABLE IF NOT EXISTS `type_exercice` (
  `id` int(11) NOT NULL,
  `exercice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `unité`
--

CREATE TABLE IF NOT EXISTS `unité` (
  `id` int(11) NOT NULL,
  `unite` varchar(50) NOT NULL COMMENT 'km, kilo, '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `actif`) VALUES
(16, 'le brigand', 'le brigand', 'yvan.lebrigand@gmail.com', '$2y$10$FnwoPJZFES8P/xMVa7DD.OiFtOrxu8fbVAOS9IaSCGWHPxfuywZFu', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_roles`
--

CREATE TABLE IF NOT EXISTS `utilisateurs_roles` (
  `utilisateur_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs_roles`
--

INSERT INTO `utilisateurs_roles` (`utilisateur_id`, `role_id`) VALUES
(16, 0),
(16, 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `carnets`
--
ALTER TABLE `carnets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `echanges`
--
ALTER TABLE `echanges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_activite`
--
ALTER TABLE `type_activite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_echange`
--
ALTER TABLE `type_echange`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_epreuve`
--
ALTER TABLE `type_epreuve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_exercice`
--
ALTER TABLE `type_exercice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `unité`
--
ALTER TABLE `unité`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `carnets`
--
ALTER TABLE `carnets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `echanges`
--
ALTER TABLE `echanges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_activite`
--
ALTER TABLE `type_activite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_echange`
--
ALTER TABLE `type_echange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_epreuve`
--
ALTER TABLE `type_epreuve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_exercice`
--
ALTER TABLE `type_exercice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `unité`
--
ALTER TABLE `unité`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
