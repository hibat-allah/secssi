-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-abaoubw.alwaysdata.net
-- Generation Time: Dec 17, 2021 at 10:41 PM
-- Server version: 10.5.11-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abaoubw_g12`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles informatique`
--

CREATE TABLE `articles informatique` (
  `codeA` varchar(3) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nbr_dunites` smallint(2) NOT NULL,
  `codeM` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles informatique`
--

INSERT INTO `articles informatique` (`codeA`, `type`, `nbr d'unités`, `codeM`) VALUES
('77x', 'claviers', 40, 's20'),
('99x', 'monitors', 22, 's20');

-- --------------------------------------------------------

--
-- Table structure for table `articles_electromenager`
--

CREATE TABLE `articles électroménager` (
  `codeE` varchar(3) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nombre_dunitees` smallint(2) NOT NULL,
  `codeM` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles_electromenager`
--

INSERT INTO `articles électroménager` (`codeE`, `type`, `nombre_dunitees`, `codeM`) VALUES
('44x', 'Lave-linge', 4, 's20'),
('55x', 'TV', 8, 's20');

-- --------------------------------------------------------

--
-- Table structure for table `Fournisseur elec`
--

CREATE TABLE `Fournisseur elec` (
  `codeFe` varchar(3) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `codeE` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Fournisseur elec`
--

INSERT INTO `Fournisseur elec` (`codeFe`, `nom`, `codeE`) VALUES
('3', 'brandt', '44x'),
('4', 'IRIS', '55x');

-- --------------------------------------------------------

--
-- Table structure for table `Fournisseurs info`
--

CREATE TABLE `Fournisseurs info` (
  `codeFi` varchar(3) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `codeA` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Fournisseurs info`
--

INSERT INTO `Fournisseurs info` (`codeFi`, `nom`, `codeA`) VALUES
('1', 'ASUS', '99x'),
('2', 'Hp', '77x');

-- --------------------------------------------------------

--
-- Table structure for table `Magasin`
--

CREATE TABLE `Magasin` (
  `codeM` varchar(3) NOT NULL,
  `nom_du_magasin` varchar(10) NOT NULL,
  `articles_informatiques` varchar(3) NOT NULL,
  `articles_electromenager` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Magasin`
--

INSERT INTO `Magasin` (`codeM`, `nom_du_magasin`, `articles_informatiques`, `articles_electromenager`) VALUES
('s20', 'walid info', '1x', '2x');

-- --------------------------------------------------------

--
-- Table structure for table `mouvements de stocks elec`
--

CREATE TABLE `mouvements de stocks elec` (
  `date_dentree` date NOT NULL,
  `date_de_sortie` date NOT NULL,
  `codeE` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mouvements de stocks elec`
--

INSERT INTO `mouvements de stocks elec` (`date_dentree`, `date_de_sortie`, `codeE`) VALUES
('2019-02-02', '2021-01-06', '44x'),
('2019-09-07', '2021-05-06', '55x');

-- --------------------------------------------------------

--
-- Table structure for table `mouvements de stocks info`
--

CREATE TABLE `mouvements de stocks info` (
  `date_dentree` date NOT NULL,
  `date_de_sortie` date NOT NULL,
  `codeA` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mouvements de stocks info`
--

INSERT INTO `mouvements de stocks info` (`date_dentree`, `date_de_sortie`, `codeA`) VALUES
('2020-10-15', '2021-02-16', '77x'),
('2020-10-16', '2021-02-10', '99x');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles informatique`
--
ALTER TABLE `articles informatique`
  ADD PRIMARY KEY (`codeA`),
  ADD KEY `codeM` (`codeM`);

--
-- Indexes for table `articles_electromenager`
--
ALTER TABLE `articles électroménager`
  ADD PRIMARY KEY (`codeE`),
  ADD KEY `codeM` (`codeM`);

--
-- Indexes for table `Fournisseur elec`
--
ALTER TABLE `Fournisseur elec`
  ADD PRIMARY KEY (`codeFe`),
  ADD KEY `codeE` (`codeE`);

--
-- Indexes for table `Fournisseurs info`
--
ALTER TABLE `Fournisseurs info`
  ADD PRIMARY KEY (`codeFi`),
  ADD KEY `codeA` (`codeA`);

--
-- Indexes for table `Magasin`
--
ALTER TABLE `Magasin`
  ADD PRIMARY KEY (`codeM`);

--
-- Indexes for table `mouvements de stocks elec`
--
ALTER TABLE `mouvements de stocks elec`
  ADD PRIMARY KEY (`date_dentree`),
  ADD KEY `codeE` (`codeE`);

--
-- Indexes for table `mouvements de stocks info`
--
ALTER TABLE `mouvements de stocks info`
  ADD PRIMARY KEY (`date_dentree`),
  ADD KEY `codeA` (`codeA`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles informatique`
--
ALTER TABLE `articles informatique`
  ADD CONSTRAINT `articles informatique_ibfk_1` FOREIGN KEY (`codeM`) REFERENCES `Magasin` (`codeM`);

--
-- Constraints for table `articles_electromenager`
--
ALTER TABLE `articles électroménager`
  ADD CONSTRAINT `articles_electromenager_ibfk_1` FOREIGN KEY (`codeM`) REFERENCES `Magasin` (`codeM`);

--
-- Constraints for table `Fournisseur elec`
--
ALTER TABLE `Fournisseur elec`
  ADD CONSTRAINT `Fournisseur elec_ibfk_1` FOREIGN KEY (`codeE`) REFERENCES `articles électroménager` (`codeE`);

--
-- Constraints for table `Fournisseurs info`
--
ALTER TABLE `Fournisseurs info`
  ADD CONSTRAINT `Fournisseurs info_ibfk_1` FOREIGN KEY (`codeA`) REFERENCES `articles informatique` (`codeA`);

--
-- Constraints for table `mouvements de stocks elec`
--
ALTER TABLE `mouvements de stocks elec`
  ADD CONSTRAINT `mouvements de stocks elec_ibfk_1` FOREIGN KEY (`codeE`) REFERENCES `articles électroménager` (`codeE`);

--
-- Constraints for table `mouvements de stocks info`
--
ALTER TABLE `mouvements de stocks info`
  ADD CONSTRAINT `mouvements de stocks info_ibfk_1` FOREIGN KEY (`codeA`) REFERENCES `articles informatique` (`codeA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
