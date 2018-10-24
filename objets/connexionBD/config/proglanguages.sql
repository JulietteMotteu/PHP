-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 11:03 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proglanguages`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `doublejoin`
-- (See below for the actual view)
--
CREATE TABLE `doublejoin` (
`id` smallint(5) unsigned
,`name` varchar(10)
,`dateCreation` year(4)
,`lastVersion` varchar(15)
,`isOpenSource` tinyint(1)
,`creator` varchar(40)
);

-- --------------------------------------------------------

--
-- Table structure for table `t_creator`
--

CREATE TABLE `t_creator` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `creator` varchar(40) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `t_creator`
--

INSERT INTO `t_creator` (`id`, `creator`) VALUES
(1, 'Guido van Rossum'),
(2, 'Rasmus Lerdorf'),
(3, 'Jean Ichbiah'),
(4, 'Brendan Eich'),
(5, 'Netscape Communications Corporation'),
(6, 'Mozilla Foundation'),
(7, 'Yukihiro Matsumoto'),
(8, 'Brian Fox'),
(9, 'Ary Borenszweig'),
(10, 'Juan Wajnerman'),
(11, 'Brian Cardiff'),
(12, 'Luiz Henrique de Figueiredo'),
(13, 'Waldemar Celes'),
(14, 'Roberto Ierusalimschy'),
(15, 'Larry Wall'),
(16, 'Bjarne Stroustrup'),
(17, 'David Collignon'),
(18, 'Zoltan Somogyi'),
(19, 'James Gosling'),
(20, 'Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `t_langcreator`
--

CREATE TABLE `t_langcreator` (
  `id` tinyint(4) UNSIGNED NOT NULL,
  `idLang` smallint(5) UNSIGNED NOT NULL,
  `idCreator` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `t_langcreator`
--

INSERT INTO `t_langcreator` (`id`, `idLang`, `idCreator`) VALUES
(1, 10, 3),
(2, 1, 1),
(3, 2, 2),
(4, 6, 4),
(5, 6, 6),
(6, 6, 5),
(7, 8, 12),
(8, 8, 13),
(9, 8, 14),
(10, 7, 7),
(11, 5, 15),
(12, 4, 16),
(13, 13, 9),
(14, 13, 10),
(15, 13, 11),
(16, 14, 8),
(17, 9, 19),
(18, 12, 18),
(19, 11, 17),
(20, 3, 20),
(21, 15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `t_language`
--

CREATE TABLE `t_language` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `dateCreation` year(4) NOT NULL,
  `lastVersion` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `isOpenSource` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `t_language`
--

INSERT INTO `t_language` (`id`, `name`, `dateCreation`, `lastVersion`, `isOpenSource`) VALUES
(1, 'Python', 1990, '3.7.0', 1),
(2, 'PHP', 1995, '7.2.9', 1),
(3, 'C#', 2002, '7.3.0', 1),
(4, 'C++', 1985, 'C++17', 0),
(5, 'Perl', 1987, '5.26.1', 1),
(6, 'JavaScript', 1995, '8', 1),
(7, 'Ruby', 1995, '2.5.1', 1),
(8, 'Lua', 1993, '5.3.4', 1),
(9, 'Java', 1995, '10', 1),
(10, 'Ada', 1980, 'ADA2012TC1', 1),
(11, 'David', 2018, '1.0.0', 1),
(12, 'Mercury', 1995, '14.01.1', 1),
(13, 'Crystal', 2014, '0.26.1', 1),
(14, 'Bash', 1989, '4.4.23', 1),
(15, 'Visual Fox', 1984, 'v9.0 SP2', 0),
(16, 'Fantom', 2005, '1.0.70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_programminglanguage`
--

CREATE TABLE `t_programminglanguage` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Name` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `creationDate` year(4) NOT NULL,
  `latestVersion` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `isOpenSource` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `t_programminglanguage`
--

INSERT INTO `t_programminglanguage` (`ID`, `Name`, `creationDate`, `latestVersion`, `isOpenSource`) VALUES
(1, 'Python', 1990, '3.7.0', 1),
(2, 'Java', 1995, '10(18.3)', 1),
(5, 'PHP', 1995, '7.2.9', 1),
(6, 'C#', 2002, '7.3.0', 1),
(7, 'C++', 1985, 'C++17', 0),
(8, 'Perl', 1987, '5.26.2', 1),
(9, 'JavaScript', 1995, '8', 1),
(10, 'Ruby', 1995, '2.5.1', 1),
(11, 'Lua', 1993, '5.3.4', 1),
(12, 'Ada', 1980, 'Ada2012TC1', 1);

-- --------------------------------------------------------

--
-- Structure for view `doublejoin`
--
DROP TABLE IF EXISTS `doublejoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doublejoin`  AS  select `t_language`.`id` AS `id`,`t_language`.`name` AS `name`,`t_language`.`dateCreation` AS `dateCreation`,`t_language`.`lastVersion` AS `lastVersion`,`t_language`.`isOpenSource` AS `isOpenSource`,`t_creator`.`creator` AS `creator` from ((`t_language` join `t_langcreator` on((`t_language`.`id` = `t_langcreator`.`idLang`))) join `t_creator` on((`t_langcreator`.`idCreator` = `t_creator`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_creator`
--
ALTER TABLE `t_creator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_langcreator`
--
ALTER TABLE `t_langcreator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_foreignKey1` (`idCreator`),
  ADD KEY `c_foreignKey2` (`idLang`);

--
-- Indexes for table `t_language`
--
ALTER TABLE `t_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dateCreation` (`dateCreation`),
  ADD KEY `isOpenSource` (`isOpenSource`);

--
-- Indexes for table `t_programminglanguage`
--
ALTER TABLE `t_programminglanguage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_creator`
--
ALTER TABLE `t_creator`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_langcreator`
--
ALTER TABLE `t_langcreator`
  MODIFY `id` tinyint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_language`
--
ALTER TABLE `t_language`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_programminglanguage`
--
ALTER TABLE `t_programminglanguage`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_langcreator`
--
ALTER TABLE `t_langcreator`
  ADD CONSTRAINT `c_foreignKey1` FOREIGN KEY (`idCreator`) REFERENCES `t_creator` (`id`),
  ADD CONSTRAINT `c_foreignKey2` FOREIGN KEY (`idLang`) REFERENCES `t_language` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
