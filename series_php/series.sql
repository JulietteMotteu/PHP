-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 11 oct. 2018 à 15:48
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `series`
--

-- --------------------------------------------------------

--
-- Structure de la table `creator`
--

CREATE TABLE `creator` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `creator` varchar(60) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `creator`
--

INSERT INTO `creator` (`id`, `creator`) VALUES
(1, 'Brian Yorkey '),
(2, 'Charlie Brooker'),
(3, 'Charlie Covell'),
(4, 'Tom Kapinos'),
(5, 'Bruno Heller'),
(6, 'Matt Duffer');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `mes_series`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `mes_series` (
`id` smallint(6)
,`nom` varchar(100)
,`nb_saison` tinyint(4)
,`date_sortie` year(4)
,`nb_episode` tinyint(4)
);

-- --------------------------------------------------------

--
-- Structure de la table `series_netflix`
--

CREATE TABLE `series_netflix` (
  `id` smallint(6) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `nb_saison` tinyint(4) NOT NULL,
  `date_sortie` year(4) NOT NULL,
  `nb_episode` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `series_netflix`
--

INSERT INTO `series_netflix` (`id`, `nom`, `nb_saison`, `date_sortie`, `nb_episode`) VALUES
(1, '13 Reasons Why', 2, 2017, 26),
(2, 'Black Mirror', 4, 2011, 19),
(3, 'The end of the f***ing world', 1, 2017, 8),
(4, 'Lucifer', 3, 2016, 57),
(5, 'Gotham', 4, 2014, 88),
(6, 'Stranger Things', 2, 2016, 17),
(7, 'The Innocents', 1, 2018, 8),
(8, 'Orange is the new black', 6, 2013, 78),
(9, 'The Crown', 2, 2016, 20),
(10, 'Good Girls', 1, 2018, 10),
(11, 'Things', 3, 2018, 56);

-- --------------------------------------------------------

--
-- Structure de la table `t_creator_serie`
--

CREATE TABLE `t_creator_serie` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `idSerie` smallint(6) NOT NULL,
  `idCreator` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `t_creator_serie`
--

INSERT INTO `t_creator_serie` (`id`, `idSerie`, `idCreator`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Structure de la vue `mes_series`
--
DROP TABLE IF EXISTS `mes_series`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mes_series`  AS  select `series_netflix`.`id` AS `id`,`series_netflix`.`nom` AS `nom`,`series_netflix`.`nb_saison` AS `nb_saison`,`series_netflix`.`date_sortie` AS `date_sortie`,`series_netflix`.`nb_episode` AS `nb_episode` from ((`series_netflix` join `t_creator_serie` on((`t_creator_serie`.`idSerie` = `series_netflix`.`id`))) join `creator` on((`t_creator_serie`.`idCreator` = `creator`.`id`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series_netflix`
--
ALTER TABLE `series_netflix`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_creator_serie`
--
ALTER TABLE `t_creator_serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1` (`idSerie`),
  ADD KEY `FK2` (`idCreator`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `creator`
--
ALTER TABLE `creator`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `series_netflix`
--
ALTER TABLE `series_netflix`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_creator_serie`
--
ALTER TABLE `t_creator_serie`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_creator_serie`
--
ALTER TABLE `t_creator_serie`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`idSerie`) REFERENCES `series_netflix` (`id`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`idCreator`) REFERENCES `creator` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
