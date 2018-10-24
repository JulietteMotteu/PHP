-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 11 oct. 2018 à 15:49
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
-- Base de données :  `web07_langprog`
--

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `madoublejointure`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `madoublejointure` (
`id` tinyint(3) unsigned
,`name` varchar(10)
,`dateCreation` year(4)
,`lastVersion` varchar(10)
,`isFloss` tinyint(1)
,`creator` varchar(40)
);

-- --------------------------------------------------------

--
-- Structure de la table `t_creator`
--

CREATE TABLE `t_creator` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `creator` varchar(40) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `t_creator`
--

INSERT INTO `t_creator` (`id`, `creator`) VALUES
(1, 'Guido van Rossum'),
(2, 'Rasmus Lerdorf'),
(3, 'Microsoft'),
(4, 'Brendan Eich'),
(5, 'Netscape Communications Corporation'),
(6, 'Sarah La Rosa');

-- --------------------------------------------------------

--
-- Structure de la table `t_langage`
--

CREATE TABLE `t_langage` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `dateCreation` year(4) NOT NULL,
  `lastVersion` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `isFloss` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `t_langage`
--

INSERT INTO `t_langage` (`id`, `name`, `dateCreation`, `lastVersion`, `isFloss`) VALUES
(1, 'Python', 1994, '3.7.0', 1),
(2, 'PHP', 1991, '7.2.8', 1),
(3, 'C#', 2002, '7.3', 1),
(4, 'JavaScript', 1988, '8', 1),
(5, 'Java', 1995, '10', 1),
(6, 'C++', 1983, 'C++17', 0),
(7, 'Ruby', 1995, '2.5.1', 1),
(8, 'Juliette', 2018, '1.0.0', 1),
(10, 'Ada', 1980, 'ADA2012TC1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_langcreator`
--

CREATE TABLE `t_langcreator` (
  `id` int(10) UNSIGNED NOT NULL,
  `idLang` tinyint(3) UNSIGNED NOT NULL,
  `idCreator` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `t_langcreator`
--

INSERT INTO `t_langcreator` (`id`, `idLang`, `idCreator`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la vue `madoublejointure`
--
DROP TABLE IF EXISTS `madoublejointure`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `madoublejointure`  AS  select `t_langage`.`id` AS `id`,`t_langage`.`name` AS `name`,`t_langage`.`dateCreation` AS `dateCreation`,`t_langage`.`lastVersion` AS `lastVersion`,`t_langage`.`isFloss` AS `isFloss`,`t_creator`.`creator` AS `creator` from (`t_creator` left join (`t_langcreator` left join `t_langage` on((`t_langage`.`id` = `t_langcreator`.`idLang`))) on((`t_creator`.`id` = `t_langcreator`.`idCreator`))) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_creator`
--
ALTER TABLE `t_creator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_langage`
--
ALTER TABLE `t_langage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_langcreator`
--
ALTER TABLE `t_langcreator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_FK1` (`idCreator`),
  ADD KEY `c_FK2` (`idLang`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_creator`
--
ALTER TABLE `t_creator`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_langage`
--
ALTER TABLE `t_langage`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `t_langcreator`
--
ALTER TABLE `t_langcreator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_langcreator`
--
ALTER TABLE `t_langcreator`
  ADD CONSTRAINT `c_FK1` FOREIGN KEY (`idCreator`) REFERENCES `t_creator` (`id`),
  ADD CONSTRAINT `c_FK2` FOREIGN KEY (`idLang`) REFERENCES `t_langage` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
