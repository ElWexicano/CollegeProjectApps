-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2011 at 11:24 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE IF NOT EXISTS `collections` (
  `collectionId` int(10) NOT NULL AUTO_INCREMENT,
  `collectionAddress` varchar(200) NOT NULL,
  `collectionDate` datetime NOT NULL,
  `collectionStatus` varchar(9) NOT NULL DEFAULT 'Waiting',
  PRIMARY KEY (`collectionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collectionId`, `collectionAddress`, `collectionDate`, `collectionStatus`) VALUES
(2, 'Butlersland, New Ross, Co. Wexford', '2011-04-02 00:00:00', 'Completed'),
(4, 'The Creamery, Wexford, Co. Wexford', '2011-04-01 12:06:59', 'Cancelled'),
(6, 'Orchard Road, Clonmel, Co. Tipperary', '2011-04-18 12:07:46', 'Waiting'),
(7, 'Rosslare Harbour, Rosslare, Co. Wexford', '2011-04-18 00:00:00', 'Waiting'),
(8, 'Butlersland, New Ross, Co. Wexford', '2011-10-04 00:00:00', 'Waiting'),
(9, 'Butlersland, New Ross, Co. Wexford', '2011-10-03 00:00:00', 'Waiting'),
(10, 'Guinness Factory, Waterford City', '2011-10-03 00:00:00', 'Waiting'),
(11, 'Dunganstown, New Ross, Co. Wexford', '2011-10-03 00:00:00', 'Waiting'),
(12, 'Soem Address', '2011-10-05 00:00:00', 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerId` int(6) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(50) NOT NULL,
  `customerAddress` varchar(200) NOT NULL,
  `customerTelephone1` char(15) NOT NULL,
  `customerTelephone2` char(15) DEFAULT NULL,
  `customerEmail` varchar(200) NOT NULL,
  PRIMARY KEY (`customerId`),
  KEY `telephoneNumber` (`customerTelephone1`),
  KEY `emailAddress` (`customerEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `customerAddress`, `customerTelephone1`, `customerTelephone2`, `customerEmail`) VALUES
(1, 'Lake Region', 'Butlersland, New Ross, Co. Wexford', '051120033', NULL, 'sales@lakeregion.ie'),
(2, 'Finches', 'Butlersland, New Ross, Co. Wexford', '051120001', NULL, 'sales@finches.ie'),
(3, 'Steele''s', 'North Street, New Ross, Co. Wexford', '051120004', NULL, 'sales@steele''s.ie'),
(4, 'Staffords', 'Port of New Ross, New Ross, Co. Wexford', '051120333', '051120331', 'sales@staffords.ie'),
(5, 'Bulmers', 'Orchard Road, Clonmel, Co. Tipperary', '041122221', NULL, 'sales@bulmers.ie');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
  `deliveryId` int(10) NOT NULL AUTO_INCREMENT,
  `deliveryAddress` varchar(200) NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `deliveryStatus` varchar(9) NOT NULL DEFAULT 'Waiting',
  PRIMARY KEY (`deliveryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`deliveryId`, `deliveryAddress`, `deliveryDate`, `deliveryStatus`) VALUES
(2, '19 Warehouse, Dublin Port, Dublin', '2011-04-05 00:00:00', 'Completed'),
(5, 'Butlersland, New Ross, Co. Wexford', '2011-04-03 18:06:59', 'Cancelled'),
(6, 'Butlersland, New Ross, Co. Wexford', '2011-04-21 12:16:16', 'Waiting'),
(7, 'North Street, New Ross, Co. Wexford', '2011-04-21 00:00:00', 'Waiting'),
(8, 'Butlersland, New Ross, Co. Wexford', '2011-10-04 00:00:00', 'Waiting'),
(9, 'Butlersland, New Ross, Co. Wexford', '2011-10-03 00:00:00', 'Waiting'),
(10, 'Joyces, New Ross, Co. Wexford', '2011-10-04 00:00:00', 'Waiting'),
(11, 'Another Address', '2011-10-12 00:00:00', 'Waiting');

-- --------------------------------------------------------

--
-- Stand-in structure for view `jobdetailslist`
--
CREATE TABLE IF NOT EXISTS `jobdetailslist` (
`jobId` int(10)
,`jobDate` date
,`jobCost` decimal(10,0)
,`jobStatus` varchar(11)
,`truckReg` varchar(15)
,`trailerReg` varchar(15)
,`customerName` varchar(50)
,`collectionAddress` varchar(200)
,`collectionDate` datetime
,`collectionStatus` varchar(9)
,`deliveryAddress` varchar(200)
,`deliveryDate` datetime
,`deliveryStatus` varchar(9)
);
-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `jobId` int(10) NOT NULL AUTO_INCREMENT,
  `jobCost` decimal(10,0) NOT NULL,
  `jobDate` date NOT NULL,
  `jobStatus` varchar(11) NOT NULL DEFAULT 'Waiting',
  `collectionId` int(10) DEFAULT NULL,
  `deliveryId` int(10) DEFAULT NULL,
  `customerId` int(6) NOT NULL,
  `truckReg` varchar(15) DEFAULT NULL,
  `trailerReg` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`jobId`),
  KEY `collectionId` (`collectionId`),
  KEY `deliveryId` (`deliveryId`),
  KEY `customerId` (`customerId`),
  KEY `truckReg` (`truckReg`),
  KEY `trailerReg` (`trailerReg`),
  KEY `jobDate` (`jobDate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobId`, `jobCost`, `jobDate`, `jobStatus`, `collectionId`, `deliveryId`, `customerId`, `truckReg`, `trailerReg`) VALUES
(13, 1200, '2011-09-14', 'Completed', 2, 2, 1, '07WX2001', '07WX2007'),
(14, 0, '2011-09-14', 'Cancelled', 4, 5, 2, '07WX2001', '07WX2008'),
(16, 1100, '2011-09-14', 'Waiting', 6, 6, 5, '07WX2004', '07WX2009'),
(17, 802, '2011-09-14', 'In Progress', 7, 7, 3, '07WX2002', '07WX2005'),
(20, 100, '2011-10-03', 'Waiting', 11, 10, 4, '07WX2002', '07WX2008'),
(21, 1000, '2011-10-03', 'Waiting', 12, 11, 4, '08WX9002', '07WX2010');

-- --------------------------------------------------------

--
-- Table structure for table `trailers`
--

CREATE TABLE IF NOT EXISTS `trailers` (
  `trailerReg` varchar(15) NOT NULL,
  `trailerType` varchar(7) NOT NULL DEFAULT 'Curtain',
  PRIMARY KEY (`trailerReg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trailers`
--

INSERT INTO `trailers` (`trailerReg`, `trailerType`) VALUES
('07WX2005', 'Curtain'),
('07WX2006', 'Curtain'),
('07WX2007', 'Curtain'),
('07WX2008', 'Fridge'),
('07WX2009', 'Fridge'),
('07WX2010', 'Fridge');

-- --------------------------------------------------------

--
-- Stand-in structure for view `trailerslist`
--
CREATE TABLE IF NOT EXISTS `trailerslist` (
`trailerReg` varchar(15)
,`trailerYear` year(4)
,`trailerStatus` varchar(8)
,`trailerType` varchar(7)
);
-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE IF NOT EXISTS `trucks` (
  `truckReg` varchar(15) NOT NULL,
  `truckMake` varchar(50) NOT NULL,
  `truckDOE` tinyint(1) NOT NULL DEFAULT '0',
  `truckTaxed` tinyint(1) NOT NULL DEFAULT '0',
  `truckInsured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`truckReg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`truckReg`, `truckMake`, `truckDOE`, `truckTaxed`, `truckInsured`) VALUES
('07WX2001', 'Volvo', 1, 1, 1),
('07WX2002', 'Volvo', 1, 1, 1),
('07WX2003', 'Maan', 1, 1, 1),
('08WX9002', 'Daft', 0, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `truckslist`
--
CREATE TABLE IF NOT EXISTS `truckslist` (
`truckReg` varchar(15)
,`truckYear` year(4)
,`truckStatus` varchar(8)
,`truckMake` varchar(50)
,`truckDOE` tinyint(1)
,`truckTaxed` tinyint(1)
,`truckInsured` tinyint(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('Clodagh', 'Power'),
('Shane', 'Doyle');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `vehicleReg` varchar(15) NOT NULL,
  `vehicleYear` year(4) NOT NULL,
  `vehicleStatus` varchar(8) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`vehicleReg`),
  KEY `vehicleYear` (`vehicleYear`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicleReg`, `vehicleYear`, `vehicleStatus`) VALUES
('00KK777', 2000, 'Active'),
('03D900', 2003, 'Active'),
('07WX2001', 2007, 'Active'),
('07WX2002', 2007, 'Active'),
('07WX2003', 2007, 'Active'),
('07WX2004', 2007, 'Active'),
('07WX2005', 2007, 'Active'),
('07WX2006', 2007, 'Active'),
('07WX2007', 2007, 'Active'),
('07WX2008', 2007, 'Active'),
('07WX2009', 2007, 'Active'),
('07WX2010', 2007, 'Active'),
('08KK2991', 2008, 'Inactive'),
('08WX9002', 2008, 'Inactive');

-- --------------------------------------------------------

--
-- Structure for view `jobdetailslist`
--
DROP TABLE IF EXISTS `jobdetailslist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jobdetailslist` AS select `j`.`jobId` AS `jobId`,`j`.`jobDate` AS `jobDate`,`j`.`jobCost` AS `jobCost`,`j`.`jobStatus` AS `jobStatus`,`j`.`truckReg` AS `truckReg`,`j`.`trailerReg` AS `trailerReg`,`c`.`customerName` AS `customerName`,`col`.`collectionAddress` AS `collectionAddress`,`col`.`collectionDate` AS `collectionDate`,`col`.`collectionStatus` AS `collectionStatus`,`del`.`deliveryAddress` AS `deliveryAddress`,`del`.`deliveryDate` AS `deliveryDate`,`del`.`deliveryStatus` AS `deliveryStatus` from (((`jobs` `j` left join `customers` `c` on((`j`.`customerId` = `c`.`customerId`))) left join `collections` `col` on((`j`.`collectionId` = `col`.`collectionId`))) left join `deliveries` `del` on((`j`.`deliveryId` = `del`.`deliveryId`)));

-- --------------------------------------------------------

--
-- Structure for view `trailerslist`
--
DROP TABLE IF EXISTS `trailerslist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trailerslist` AS select `vehicles`.`vehicleReg` AS `trailerReg`,`vehicles`.`vehicleYear` AS `trailerYear`,`vehicles`.`vehicleStatus` AS `trailerStatus`,`trailers`.`trailerType` AS `trailerType` from (`vehicles` join `trailers` on((`trailers`.`trailerReg` = `vehicles`.`vehicleReg`))) order by `vehicles`.`vehicleReg`;

-- --------------------------------------------------------

--
-- Structure for view `truckslist`
--
DROP TABLE IF EXISTS `truckslist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `truckslist` AS select `vehicles`.`vehicleReg` AS `truckReg`,`vehicles`.`vehicleYear` AS `truckYear`,`vehicles`.`vehicleStatus` AS `truckStatus`,`trucks`.`truckMake` AS `truckMake`,`trucks`.`truckDOE` AS `truckDOE`,`trucks`.`truckTaxed` AS `truckTaxed`,`trucks`.`truckInsured` AS `truckInsured` from (`vehicles` join `trucks` on((`trucks`.`truckReg` = `vehicles`.`vehicleReg`))) order by `vehicles`.`vehicleReg`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trailers`
--
ALTER TABLE `trailers`
  ADD CONSTRAINT `trailers_ibfk_1` FOREIGN KEY (`trailerReg`) REFERENCES `vehicles` (`vehicleReg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trucks`
--
ALTER TABLE `trucks`
  ADD CONSTRAINT `trucks_ibfk_1` FOREIGN KEY (`truckReg`) REFERENCES `vehicles` (`vehicleReg`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;