-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2016 at 11:47 PM
-- Server version: 5.6.29
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handymantools`
--

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `Login` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clerk`
--

INSERT INTO `clerk` (`Login`, `LastName`, `FirstName`, `Password`) VALUES
('c1@gmail.com', 'clerk', 'Clerk', 'c1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Login` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `WorkphoneAreacode` varchar(3) DEFAULT NULL,
  `WorkphoneLocalcode` varchar(7) DEFAULT NULL,
  `HomephoneAreacode` varchar(3) DEFAULT NULL,
  `HomephoneLocalcode` varchar(7) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Login`, `LastName`, `FirstName`, `Password`, `WorkphoneAreacode`, `WorkphoneLocalcode`, `HomephoneAreacode`, `HomephoneLocalcode`, `Address`) VALUES
('1@gmail.com', 'Liu', 'Qingwei', '1', '333', '4444333', '480', '3342432', 'az, usa'),
('2@gmail.com', 'Cai', 'yy', '2', '334', '3323432', '333', '3334444', NULL),
('daniel@123.com', 'Cai', 'Daniel', '123', '234', '4566776', '123', '3556677', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `powertoolaccessories`
--

CREATE TABLE `powertoolaccessories` (
  `ToolID` varchar(50) NOT NULL,
  `Accessories` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `powertoolaccessories`
--

INSERT INTO `powertoolaccessories` (`ToolID`, `Accessories`) VALUES
('20160417114901', 'acc1'),
('20160417120414', 'pt3 acc1'),
('20160417120616', 'acc1'),
('20160417230654', 'acc1'),
('20160417230654', 'acc2'),
('20160417230654', 'acc3');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ReservationNumber` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `CustomerLogin` varchar(50) NOT NULL,
  `DropoffClerkLogin` varchar(50) DEFAULT NULL,
  `DropoffDate` date DEFAULT NULL,
  `PickupClerkLogin` varchar(50) DEFAULT NULL,
  `PickupDate` date DEFAULT NULL,
  `CreditCardNumber` varchar(16) DEFAULT NULL,
  `CreditCardExpirationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ReservationNumber`, `StartDate`, `EndDate`, `CustomerLogin`, `DropoffClerkLogin`, `DropoffDate`, `PickupClerkLogin`, `PickupDate`, `CreditCardNumber`, `CreditCardExpirationDate`) VALUES
('0223', '2016-04-01', '2016-04-05', '1@gmail.com', 'c1@gmail.com', '2016-04-05', 'c1@gmail.com', '2016-04-01', '32321412431324', '2018-06-30'),
('0304', '2016-03-16', '2016-04-19', '1@gmail.com', 'c1@gmail.com', '2016-04-17', 'c1@gmail.com', '2016-04-16', '19327409137401', '2016-11-02'),
('035', '2016-04-16', '2016-04-17', '2@gmail.com', NULL, NULL, 'c1@gmail.com', '2016-04-16', '3124313143134143', '2016-04-06'),
('20160417222940', '2016-04-15', '2016-04-17', '2@gmail.com', NULL, NULL, 'c1@gmail.com', '2016-04-17', '4325235243523452', '2016-04-22'),
('20160417223012', '2016-04-20', '2016-04-22', '2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
('20160417225949', '2016-04-08', '2016-04-10', '1@gmail.com', 'c1@gmail.com', '2016-04-17', NULL, '2016-04-16', '9237917304917340', '2016-11-03'),
('20160417232347', '2016-04-08', '2016-04-10', '1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservationtooldetails`
--

CREATE TABLE `reservationtooldetails` (
  `ReservationNumber` varchar(50) NOT NULL,
  `ToolId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservationtooldetails`
--

INSERT INTO `reservationtooldetails` (`ReservationNumber`, `ToolId`) VALUES
('0223', '20160413112717'),
('0223', '20160413112937'),
('20160417225949', '20160413112937'),
('20160417223012', '20160413113035'),
('0304', '20160414081932'),
('20160417222940', '20160416193726'),
('035', '20160417114901'),
('20160417225949', '20160417114901'),
('20160417232347', '20160417115049'),
('035', '20160417115345'),
('20160417232347', '20160417115345');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `ToolId` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `EstimatedCost` float NOT NULL,
  `FilloutClerkLogin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`ToolId`, `StartDate`, `EndDate`, `EstimatedCost`, `FilloutClerkLogin`) VALUES
('20160414081932', '2016-04-14', '2016-04-15', 45, 'c1@gmail.com'),
('20160414081932', '2016-04-16', '2016-04-22', 50, 'c1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `ID` varchar(50) NOT NULL,
  `PurchasePrice` float NOT NULL,
  `AbbreviatedDescription` varchar(50) NOT NULL,
  `FullDescription` varchar(1000) NOT NULL,
  `Deposit` float NOT NULL,
  `PricePerDay` float NOT NULL,
  `ToolType` enum('PowerTool','HandyTool','ConstructionEquipment') NOT NULL,
  `SaleClerkLogin` varchar(50) DEFAULT NULL,
  `SaleDate` date DEFAULT NULL,
  `SalePrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`ID`, `PurchasePrice`, `AbbreviatedDescription`, `FullDescription`, `Deposit`, `PricePerDay`, `ToolType`, `SaleClerkLogin`, `SaleDate`, `SalePrice`) VALUES
('20160413112717', 33, 'rake', 'rake for your garden work', 33, 10, 'HandyTool', 'c1@gmail.com', NULL, 0),
('20160413112859', 40, 'hoe', 'hoe for your garden', 40, 10, 'HandyTool', 'c1@gmail.com', NULL, 0),
('20160413112937', 100, 'ladder', 'ladder for construction work', 100, 20, 'HandyTool', 'c1@gmail.com', NULL, 0),
('20160413113035', 150, 'mixer', 'cement mixer', 150, 30, 'ConstructionEquipment', 'c1@gmail.com', NULL, 0),
('20160414081932', 33, 'ht1', 'ht1', 33, 4, 'HandyTool', NULL, NULL, NULL),
('20160416193726', 20, 'shavel', 'dig holes', 20, 5, 'HandyTool', NULL, NULL, 0),
('20160416194139', 60, 'ct1', 'ct1', 60, 15, 'ConstructionEquipment', NULL, NULL, 0),
('20160417114901', 60, 'pt1', 'pt1', 60, 5, 'PowerTool', NULL, NULL, NULL),
('20160417115049', 60, 'pt1', 'pt1', 60, 5, 'PowerTool', NULL, NULL, NULL),
('20160417115345', 60, 'pt1', 'pt1', 60, 5, 'PowerTool', NULL, NULL, NULL),
('20160417115455', 60, 'pt1', 'pt1', 60, 5, 'PowerTool', NULL, NULL, NULL),
('20160417115729', 60, 'pt1', 'pt1', 60, 5, 'PowerTool', NULL, NULL, NULL),
('20160417115935', 60, 'pt1', 'pt1', 60, 5, 'PowerTool', NULL, NULL, NULL),
('20160417115948', 60, 'pt2', '', 60, 5, 'PowerTool', NULL, NULL, NULL),
('20160417120414', 60, 'pt3', 'pt3', 60, 15, 'PowerTool', NULL, NULL, NULL),
('20160417120510', 20, 'ht1', 'hand tool 1', 20, 5, 'HandyTool', NULL, NULL, NULL),
('20160417120616', 100, 'pt5', '', 100, 30, 'PowerTool', NULL, NULL, NULL),
('20160417230654', 36, 'pt7', 'pt7', 36, 12, 'PowerTool', 'c1@gmail.com', '2016-04-22', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`Login`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Login`);

--
-- Indexes for table `powertoolaccessories`
--
ALTER TABLE `powertoolaccessories`
  ADD PRIMARY KEY (`ToolID`,`Accessories`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ReservationNumber`),
  ADD KEY `CustomerLogin` (`CustomerLogin`),
  ADD KEY `DropoffClerkLogin` (`DropoffClerkLogin`),
  ADD KEY `PickupClerkLogin` (`PickupClerkLogin`);

--
-- Indexes for table `reservationtooldetails`
--
ALTER TABLE `reservationtooldetails`
  ADD PRIMARY KEY (`ReservationNumber`,`ToolId`),
  ADD KEY `ToolId` (`ToolId`);

--
-- Indexes for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD PRIMARY KEY (`ToolId`,`StartDate`),
  ADD KEY `FilloutClerkLogin` (`FilloutClerkLogin`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SaleClerkLogin` (`SaleClerkLogin`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `powertoolaccessories`
--
ALTER TABLE `powertoolaccessories`
  ADD CONSTRAINT `powertoolaccessories_ibfk_1` FOREIGN KEY (`ToolID`) REFERENCES `tool` (`ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CustomerLogin`) REFERENCES `customer` (`Login`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`DropoffClerkLogin`) REFERENCES `clerk` (`Login`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`PickupClerkLogin`) REFERENCES `clerk` (`Login`);

--
-- Constraints for table `reservationtooldetails`
--
ALTER TABLE `reservationtooldetails`
  ADD CONSTRAINT `reservationtooldetails_ibfk_1` FOREIGN KEY (`ReservationNumber`) REFERENCES `reservation` (`ReservationNumber`),
  ADD CONSTRAINT `reservationtooldetails_ibfk_2` FOREIGN KEY (`ToolId`) REFERENCES `tool` (`ID`);

--
-- Constraints for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD CONSTRAINT `servicerequest_ibfk_1` FOREIGN KEY (`ToolId`) REFERENCES `tool` (`ID`),
  ADD CONSTRAINT `servicerequest_ibfk_2` FOREIGN KEY (`FilloutClerkLogin`) REFERENCES `clerk` (`Login`);

--
-- Constraints for table `tool`
--
ALTER TABLE `tool`
  ADD CONSTRAINT `tool_ibfk_1` FOREIGN KEY (`SaleClerkLogin`) REFERENCES `clerk` (`Login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
