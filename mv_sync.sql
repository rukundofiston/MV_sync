-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2012 at 02:27 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mv_sync`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id_compte` int(11) NOT NULL AUTO_INCREMENT,
  `id_delegue` int(11) DEFAULT NULL,
  `login` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `passwd` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `droit` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `etat` int(11) NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_compte`),
  KEY `id_delegue` (`id_delegue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`id_compte`, `id_delegue`, `login`, `passwd`, `droit`, `etat`, `type`) VALUES
(1, 5, 'yass', 'e10adc3949ba59abbe56e057f20f883e', 'rapports|delegue|stats', 0, 'Superviseur'),
(2, 6, 'bachir', 'e10adc3949ba59abbe56e057f20f883e', 'delegue|medecin|', 0, 'Delegue'),
(5, 10, 'AZERTYUI', 'e10adc3949ba59abbe56e057f20f883e', 'delegue|medecin|', 0, 'Delegue'),
(6, 11, 'Yassine', 'e10adc3949ba59abbe56e057f20f883e', 'delegue|medecin|', 0, 'Delegue');

-- --------------------------------------------------------

--
-- Table structure for table `delegue`
--

CREATE TABLE IF NOT EXISTS `delegue` (
  `id_delegue` int(11) NOT NULL AUTO_INCREMENT,
  `Del_id_delegue` int(11) DEFAULT NULL,
  `id_compte` int(11) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `dataNaissance` date DEFAULT NULL,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `prenom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `adresse` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `fax` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `tel` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(60) CHARACTER SET latin1 NOT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_delegue`),
  KEY `Del_id_delegue` (`Del_id_delegue`),
  KEY `id_compte` (`id_compte`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `delegue`
--

INSERT INTO `delegue` (`id_delegue`, `Del_id_delegue`, `id_compte`, `dateEmbauche`, `dataNaissance`, `nom`, `prenom`, `adresse`, `fax`, `tel`, `email`, `image_url`) VALUES
(5, NULL, 1, '2012-12-02', NULL, 'ELQANDILI', 'Yassine', '21 Q ELIKHLASS SAFI', '0525005612', '0524059010', 'y.elqanili1@gmail', 'Hydrangeas.jpg'),
(6, 6, 2, '2012-07-01', '1987-01-06', 'ELQANDIL', 'Ahmed', '21 Q ELIKHLASS SAFI', '0525005612', '0524059010', 'ahmed.elqandili@gmail.com', 'Desert.jpg'),
(7, NULL, NULL, NULL, NULL, 'AZERTYUI', NULL, NULL, NULL, NULL, '', NULL),
(10, NULL, 5, '2012-12-31', NULL, 'azert', 'AZERTYU', 'AZERTYUIO', '123456789', '123456789', 'yass-ado@hotmail.fr', 'theatre_masks_mattlx.jpg'),
(11, 6, 6, '2012-12-26', '1987-01-06', 'azerty', 'azeRTY', 'azertyu', '0525005612', '0524059010', 'yass-ado@hotmail.fr', '168867_182496635113617_182496408446973_530741_599374_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
  `id_demande` int(11) NOT NULL AUTO_INCREMENT,
  `id_delegue` int(11) DEFAULT NULL,
  `id_visite` int(11) DEFAULT NULL,
  `description` varchar(254) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `objet` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id_demande`),
  KEY `id_delegue` (`id_delegue`),
  KEY `id_visite` (`id_visite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`id_demande`, `id_delegue`, `id_visite`, `description`, `etat`, `objet`) VALUES
(1, 5, 228, 'aszertyu', 2, '-1');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `id_delegue` int(11) DEFAULT NULL,
  `titre` varchar(60) DEFAULT NULL,
  `dataD` date DEFAULT NULL,
  `dateF` date DEFAULT NULL,
  `heureD` time DEFAULT NULL,
  `heureF` time DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `lieu` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `id_delegue` (`id_delegue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `id_delegue`, `titre`, `dataD`, `dateF`, `heureD`, `heureF`, `description`, `lieu`) VALUES
(1, 5, NULL, '2012-12-26', '2012-12-31', '12:40:00', '13:40:00', 'AZERTYU', 'Marrakech'),
(2, 6, NULL, '2012-12-26', '2012-12-28', '12:40:00', '13:40:00', 'AZERT', 'MArrakehc'),
(3, 7, NULL, '2012-12-26', '2012-12-29', '12:40:00', '12:40:00', 'AZER', 'AEZR'),
(4, 5, NULL, '2012-12-28', '2012-12-29', '12:40:00', '12:40:00', 'AZER', 'AEZR'),
(5, 5, 'undefined', '2012-12-26', '2012-12-26', '12:30:00', '16:30:00', 'AZERTY', 'FSTG'),
(6, 6, 'Yassine', '2012-12-26', '2012-12-26', '12:40:00', '13:40:00', 'AZERTAZERTY', 'AZERT');

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int(11) NOT NULL AUTO_INCREMENT,
  `id_secteur` int(11) DEFAULT NULL,
  `lng` decimal(10,6) DEFAULT NULL,
  `lat` decimal(10,6) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `nom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `prenom` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `adresse` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `fax` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `tel` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `sexe` char(1) CHARACTER SET latin1 NOT NULL,
  `civilite` varchar(4) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(60) CHARACTER SET latin1 NOT NULL,
  `id_type1` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`),
  KEY `id_secteur` (`id_secteur`),
  KEY `id_type1` (`id_type1`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `id_secteur`, `lng`, `lat`, `etat`, `nom`, `prenom`, `adresse`, `fax`, `tel`, `sexe`, `civilite`, `photo`, `email`, `id_type1`) VALUES
(1, 1, '-8.066930', '31.642494', 0, 'ELQANDI', 'Yas', 'Q ELIKHLASS SAFI', '2222222222222', '111111111111', 'h', 'mr', '', 'akermouch_sm@hotmail.c', 1),
(2, 2, '-8.066930', '31.642494', 0, 'AMIL', 'Yassine', 'Agadir, inzegane', '0523102405', '0523102405', 'f', 'Mlle', 'Photo0537.jpg', 'yassine.amil@gmail.com', 2),
(3, 1, '31.652797', '-8.017940', -2, 'AKERMOUCH', 'Badr', 'Sup de co, Marrakech', NULL, '0644001036', 'h', 'M', '', 'badr.akermouch@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `medicament`
--

CREATE TABLE IF NOT EXISTS `medicament` (
  `id_medicament` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `desctiption` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `etat` int(1) DEFAULT '0',
  PRIMARY KEY (`id_medicament`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `medicament`
--

INSERT INTO `medicament` (`id_medicament`, `libelle`, `prix`, `desctiption`, `etat`) VALUES
(1, 'RhinophÃ©brale', '20.00', 'Anti Rhume', 0),
(2, 'Amoxil', '45.00', 'Anti biotique ', 0),
(20, 'VoltarÃ¨ne', '38.00', 'Pour les os', 0);

-- --------------------------------------------------------

--
-- Table structure for table `med_type`
--

CREATE TABLE IF NOT EXISTS `med_type` (
  `id_medecin` int(11) NOT NULL DEFAULT '0',
  `id_type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_medecin`,`id_type`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `id_delegue` int(11) DEFAULT NULL,
  `note` float DEFAULT NULL,
  `description` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_note`),
  KEY `id_delegue` (`id_delegue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `note`
--


-- --------------------------------------------------------

--
-- Table structure for table `rapport`
--

CREATE TABLE IF NOT EXISTS `rapport` (
  `id_rapport` int(11) NOT NULL AUTO_INCREMENT,
  `id_delegue` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `conclusion` text CHARACTER SET latin1,
  `introduction` text CHARACTER SET latin1,
  PRIMARY KEY (`id_rapport`),
  KEY `rapport_delegue_fk` (`id_delegue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `rapport`
--

INSERT INTO `rapport` (`id_rapport`, `id_delegue`, `date`, `conclusion`, `introduction`) VALUES
(16, 6, '2012-12-24', NULL, NULL),
(17, 6, '2012-12-25', 'Conclusion', 'Introduction'),
(18, 6, '2012-12-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `secteur`
--

CREATE TABLE IF NOT EXISTS `secteur` (
  `id_secteur` int(11) NOT NULL AUTO_INCREMENT,
  `Sec_id_secteur` int(11) DEFAULT NULL,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_secteur`),
  KEY `Sec_id_secteur` (`Sec_id_secteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `secteur`
--

INSERT INTO `secteur` (`id_secteur`, `Sec_id_secteur`, `libelle`) VALUES
(1, NULL, 'Marrakech'),
(2, 1, 'Sidi Youssef Ben Ali'),
(3, 1, 'Daoudiate');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(254) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `libelle`) VALUES
(1, 'Cardiologue'),
(2, 'Hospitalier');

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `id_vente` int(11) NOT NULL AUTO_INCREMENT,
  `id_medicament` int(11) NOT NULL,
  `id_secteur` int(11) DEFAULT NULL,
  `qte` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_vente`),
  KEY `id_medicament_fk` (`id_medicament`),
  KEY `id_secteur_fk` (`id_secteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`id_vente`, `id_medicament`, `id_secteur`, `qte`, `date`) VALUES
(9, 2, 2, 101, '2012-12-28'),
(10, 2, 2, 30, '2012-12-15'),
(12, 2, 2, 90, '2012-12-24'),
(13, 2, 2, 300, '2012-12-21'),
(14, 1, 1, 90, '2012-12-17'),
(15, 1, 1, 100, '2012-12-23'),
(16, 1, 1, 130, '2012-12-22'),
(17, 2, 2, 1030, '2012-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `visite`
--

CREATE TABLE IF NOT EXISTS `visite` (
  `id_visite` int(11) NOT NULL AUTO_INCREMENT,
  `id_delegue` int(11) DEFAULT NULL,
  `id_medecin` int(11) DEFAULT NULL,
  `id_rapport` int(11) DEFAULT NULL,
  `priorite` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `note` varchar(254) DEFAULT NULL,
  `vue` int(11) NOT NULL DEFAULT '-1',
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id_visite`),
  KEY `id_delegue` (`id_delegue`),
  KEY `id_medecin` (`id_medecin`),
  KEY `raport_id` (`id_rapport`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=249 ;

--
-- Dumping data for table `visite`
--

INSERT INTO `visite` (`id_visite`, `id_delegue`, `id_medecin`, `id_rapport`, `priorite`, `date`, `etat`, `note`, `vue`, `time`) VALUES
(216, 6, 1, 16, 3, '2012-12-24', 0, NULL, 0, NULL),
(217, 6, 2, 16, 1, '2012-12-24', 0, NULL, 0, NULL),
(218, 6, 3, 16, 2, '2012-12-24', 0, NULL, 0, NULL),
(219, 6, 1, 16, 2, '2012-12-24', 0, NULL, 0, NULL),
(220, 6, 2, 16, 1, '2012-12-24', 0, NULL, 0, NULL),
(221, 6, 3, 16, 3, '2012-12-24', 0, NULL, 0, NULL),
(222, 6, 1, 16, 1, '2012-12-24', 0, NULL, 0, NULL),
(223, 6, 1, 16, 3, '2012-12-24', 0, NULL, 0, NULL),
(224, 6, 2, NULL, 2, '2012-12-24', -1, NULL, -1, NULL),
(225, 6, 1, NULL, 4, '2012-12-24', -1, NULL, -1, NULL),
(226, 6, 2, NULL, 1, '2012-12-24', -1, NULL, -1, NULL),
(227, 5, 1, 17, 1, '2012-12-25', 0, NULL, 0, NULL),
(228, 5, 2, NULL, 2, '2012-12-25', -2, 'KAYN', -1, NULL),
(229, 6, 1, 17, 1, '2012-12-25', 0, NULL, 0, NULL),
(230, 5, 1, NULL, 1, '2012-12-25', -1, NULL, -1, NULL),
(231, 5, 3, NULL, 2, '2012-12-25', -1, '4*-*', -1, NULL),
(232, 6, 2, NULL, 1, '2012-12-25', 0, NULL, 0, NULL),
(233, 6, 1, NULL, 1, '2012-12-25', 0, NULL, 0, NULL),
(234, 6, 3, NULL, 1, '2012-12-25', 0, NULL, 0, NULL),
(235, 6, 2, NULL, 1, '2012-12-25', 0, NULL, 0, NULL),
(236, 6, 3, NULL, 1, '2012-12-25', 0, NULL, 0, NULL),
(237, 5, 3, NULL, 3, '2012-12-20', 0, NULL, 0, NULL),
(238, 6, 3, NULL, 1, '2012-12-25', 0, NULL, 0, NULL),
(239, 6, 2, NULL, 1, '2012-12-25', 0, NULL, 0, NULL),
(240, 6, 1, 18, 1, '2012-12-26', 0, NULL, 0, '01:00:39'),
(241, 5, 1, NULL, 1, '2012-12-25', -1, NULL, -1, NULL),
(242, 5, 1, NULL, 1, '2012-12-25', -1, NULL, -1, NULL),
(243, 5, 1, 18, 1, '2012-12-26', 0, NULL, -1, '10:53:28'),
(244, 6, 1, 18, 1, '2012-12-26', 0, NULL, 0, '01:00:55'),
(245, 6, 3, 18, 1, '2012-12-26', 0, NULL, 0, '01:01:18'),
(246, 5, 2, NULL, 1, '2012-12-27', -1, NULL, -1, NULL),
(247, 5, 1, NULL, 1, '2012-12-26', -1, NULL, -1, NULL),
(248, 5, 2, NULL, 2, '2012-12-26', -1, NULL, -1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vis_med`
--

CREATE TABLE IF NOT EXISTS `vis_med` (
  `id_medicament` int(11) NOT NULL DEFAULT '0',
  `id_visite` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_medicament`,`id_visite`),
  KEY `id_visite` (`id_visite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vis_med`
--

INSERT INTO `vis_med` (`id_medicament`, `id_visite`) VALUES
(1, 231),
(1, 243),
(2, 243),
(20, 243);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delegue`
--
ALTER TABLE `delegue`
  ADD CONSTRAINT `delegue_ibfk_2` FOREIGN KEY (`Del_id_delegue`) REFERENCES `delegue` (`id_delegue`),
  ADD CONSTRAINT `delegue_ibfk_3` FOREIGN KEY (`id_compte`) REFERENCES `compte` (`id_compte`),
  ADD CONSTRAINT `FK_association1` FOREIGN KEY (`Del_id_delegue`) REFERENCES `delegue` (`id_delegue`);

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`id_delegue`) REFERENCES `delegue` (`id_delegue`),
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`id_visite`) REFERENCES `visite` (`id_visite`);

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`id_delegue`) REFERENCES `delegue` (`id_delegue`);

--
-- Constraints for table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_1` FOREIGN KEY (`id_secteur`) REFERENCES `secteur` (`id_secteur`),
  ADD CONSTRAINT `medecin_ibfk_2` FOREIGN KEY (`id_type1`) REFERENCES `type` (`id_type`);

--
-- Constraints for table `med_type`
--
ALTER TABLE `med_type`
  ADD CONSTRAINT `med_type_ibfk_1` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `med_type_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_delegue`) REFERENCES `delegue` (`id_delegue`);

--
-- Constraints for table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_ibfk_1` FOREIGN KEY (`id_delegue`) REFERENCES `delegue` (`id_delegue`);

--
-- Constraints for table `secteur`
--
ALTER TABLE `secteur`
  ADD CONSTRAINT `secteur_ibfk_2` FOREIGN KEY (`Sec_id_secteur`) REFERENCES `secteur` (`id_secteur`);

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`id_secteur`) REFERENCES `secteur` (`id_secteur`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`id_medicament`) REFERENCES `medicament` (`id_medicament`);

--
-- Constraints for table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `visite_ibfk_1` FOREIGN KEY (`id_delegue`) REFERENCES `delegue` (`id_delegue`),
  ADD CONSTRAINT `visite_ibfk_2` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `visite_ibfk_3` FOREIGN KEY (`id_rapport`) REFERENCES `rapport` (`id_rapport`);

--
-- Constraints for table `vis_med`
--
ALTER TABLE `vis_med`
  ADD CONSTRAINT `vis_med_ibfk_1` FOREIGN KEY (`id_medicament`) REFERENCES `medicament` (`id_medicament`),
  ADD CONSTRAINT `vis_med_ibfk_2` FOREIGN KEY (`id_visite`) REFERENCES `visite` (`id_visite`);
