-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2024 at 09:47 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recyco-hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `Article_ID` varchar(100) NOT NULL,
  `Artical_Title` varchar(100) NOT NULL,
  `Discription` varchar(100) NOT NULL,
  `Published_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Data` varchar(100) NOT NULL,
  `Partner_ID` varchar(100) NOT NULL,
  `Status` enum('Published','Flaged','Band','Unpublished','') NOT NULL,
  PRIMARY KEY (`Article_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`Article_ID`, `Artical_Title`, `Discription`, `Published_Date`, `Data`, `Partner_ID`, `Status`) VALUES
('A001', 'The Importance of Recycling', 'Exploring the environmental benefits of recycling', '2023-11-25 02:30:00', 'Lorem ipsum dolor sit amet', 'P001', 'Published'),
('A002', 'Tips for Eco-Friendly Living', 'Small changes for a greener lifestyle', '2023-11-26 05:00:00', 'Consectetur adipiscing elit', 'P002', 'Published'),
('A003', 'Biodiversity and Conservation', 'Preserving nature\'s variety for a sustainable future', '2023-11-27 09:15:00', 'Sed do eiusmod tempor incididunt', 'P003', 'Published'),
('A004', 'Recycling at Home: A How-To Guide', 'Practical steps for effective recycling in households', '2023-11-28 10:50:00', 'Ut labore et dolore magna aliqua', 'P002', 'Published'),
('A005', 'The Beauty of National Parks', 'Exploring the wonders of protected natural areas', '2023-11-29 06:45:00', 'Duis aute irure dolor in reprehenderit', 'P001', 'Published'),
('A006', 'Reducing Waste: A Green Challenge', 'Strategies for minimizing waste in daily life', '2023-11-30 04:15:00', 'Lorem ipsum dolor sit amet', 'P003', 'Published'),
('A007', 'Ocean Cleanup Initiatives', 'Efforts to tackle plastic pollution in our oceans', '2023-12-01 05:30:00', 'Consectetur adipiscing elit', 'P002', 'Published'),
('A008', 'The Cycle of Recycling: From Bin to Product', 'Understanding the recycling process', '2023-12-02 08:00:00', 'Sed do eiusmod tempor incididunt', 'P001', 'Published'),
('A009', 'Green Technology for a Sustainable Future', 'Innovative tech solutions for environmental conservation', '2023-12-03 10:15:00', 'Ut labore et dolore magna aliqua', 'P003', 'Published'),
('A010', 'Urban Gardens: Bringing Nature to the City', 'Creating green spaces in urban environments', '2023-12-04 08:50:00', 'Duis aute irure dolor in reprehenderit', 'P002', 'Published'),
('A011', 'The Impact of Deforestation on Climate Change', 'Examining the consequences of widespread tree removal', '2023-12-05 04:45:00', 'Lorem ipsum dolor sit amet', 'P001', 'Published'),
('A012', 'Eco-Friendly Travel: Exploring Nature Responsibly', 'Tips for sustainable travel and ecotourism', '2023-12-06 06:30:00', 'Consectetur adipiscing elit', 'P003', 'Published'),
('A013', 'The Role of Bees in Ecosystems', 'Understanding the importance of pollinators', '2023-12-07 04:00:00', 'Sed do eiusmod tempor incididunt', 'P002', 'Published'),
('A014', 'Renewable Energy: Powering a Greener World', 'Exploring sustainable energy sources', '2023-12-08 03:15:00', 'Ut labore et dolore magna aliqua', 'P001', 'Published'),
('A015', 'E-Waste Recycling: Safely Disposing of Electronics', 'Proper disposal methods for electronic waste', '2023-12-09 08:40:00', 'Duis aute irure dolor in reprehenderit', 'P003', 'Published'),
('A016', 'Conserving Water: A Vital Resource', 'Tips for reducing water consumption and waste', '2023-12-10 10:30:00', 'Lorem ipsum dolor sit amet', 'P002', 'Published'),
('A017', 'The Green Revolution: Agriculture and Sustainability', 'Innovations in sustainable farming practices', '2023-12-11 06:15:00', 'Consectetur adipiscing elit', 'P001', 'Published'),
('A018', 'Wildlife Preservation: Protecting Endangered Species', 'Efforts to safeguard at-risk animal populations', '2023-12-12 07:50:00', 'Sed do eiusmod tempor incididunt', 'P003', 'Published'),
('A019', 'Composting: Turning Kitchen Waste into Gold', 'A guide to composting for a healthier garden', '2023-12-13 05:00:00', 'Ut labore et dolore magna aliqua', 'P002', 'Published'),
('A020', 'Green Building Practices for Sustainable Architecture', 'Designing eco-friendly structures for a better future', '2023-12-14 06:45:00', 'Duis aute irure dolor in reprehenderit', 'P001', 'Published'),
('dfb', 'sfdv', 'sdvsdv', '2023-12-08 02:23:45', 'sdvsdv', 'sdvsdv', 'Published'),
('grfdfd', 'bdgbxbgf', 'bgxxgfbgfx', '2023-12-07 10:54:37', 'gbgfgbbgfx', 'gbgfbgfbgf', '');

-- --------------------------------------------------------

--
-- Table structure for table `automated_inventory_generation`
--

DROP TABLE IF EXISTS `automated_inventory_generation`;
CREATE TABLE IF NOT EXISTS `automated_inventory_generation` (
  `ID` varchar(5) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Time` time NOT NULL,
  `Repetition` varchar(100) NOT NULL,
  `Size` int(11) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Title` (`Title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `automated_inventory_generation`
--

INSERT INTO `automated_inventory_generation` (`ID`, `Title`, `Time`, `Repetition`, `Size`, `Status`) VALUES
('12', 'Moring Generation', '08:00:00', 'Daily', 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `collected_inventory`
--

DROP TABLE IF EXISTS `collected_inventory`;
CREATE TABLE IF NOT EXISTS `collected_inventory` (
  `Invetory_ID` varchar(6) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Collecter_ID` varchar(6) NOT NULL,
  `User_ID` varchar(6) NOT NULL,
  PRIMARY KEY (`Invetory_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collector`
--

DROP TABLE IF EXISTS `collector`;
CREATE TABLE IF NOT EXISTS `collector` (
  `Collector_ID` varchar(10) NOT NULL,
  `Vehicle_NO` varchar(10) NOT NULL,
  `sector_ID` text NOT NULL,
  `User_ID` varchar(60) NOT NULL,
  `Collections` text NOT NULL,
  `Status` enum('Active','suspended') NOT NULL,
  PRIMARY KEY (`Collector_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collector`
--

INSERT INTO `collector` (`Collector_ID`, `Vehicle_NO`, `sector_ID`, `User_ID`, `Collections`, `Status`) VALUES
('BXrNGD', 'ABC-4565', 'Colombo7', 'BXrNGD', '[2,6,9,6,7,3,5,6,6,8,6]', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `Complaint_ID` varchar(10) NOT NULL,
  `Subject` text NOT NULL,
  `Details` text NOT NULL,
  `Partner_ID` varchar(6) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Complaint_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_ID` varchar(10) NOT NULL,
  `Credits` json DEFAULT NULL,
  `Credit_History` json DEFAULT NULL,
  `User_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`Customer_ID`),
  KEY `User_Coustomer_IDfk` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Credits`, `Credit_History`, `User_ID`) VALUES
('Cus001', '{}', '[{\"Date\": \"2024-01-11 02:22:18\", \"Items\": {\"Zinc\": {\"Price\": \"225\", \"Weight\": 30}, \"Copper\": {\"Price\": \"1500\", \"Weight\": 10}, \"Aluminium\": {\"Price\": \"206\", \"Weight\": 20}}, \"Inventory_ID\": \"Inven1703354856BxTC\"}, {}]', 'liT62t');

--
-- Triggers `customer`
--
DROP TRIGGER IF EXISTS `before_customer_update`;
DELIMITER $$
CREATE TRIGGER `before_customer_update` BEFORE UPDATE ON `customer` FOR EACH ROW BEGIN
    -- Check if the Credit_History is NULL and initialize it as an empty array
    IF NEW.Credit_History IS NULL THEN
        SET NEW.Credit_History = JSON_ARRAY();
    END IF;

    -- Append the existing Credit_History to the new Credit_History array
    SET NEW.Credit_History = JSON_ARRAY_APPEND(
        NEW.Credit_History,
        '$',
        COALESCE(OLD.Credit_History, JSON_ARRAY())
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `Event_ID` varchar(6) NOT NULL,
  `Event_Title` text NOT NULL,
  `Discription` text NOT NULL,
  `Event_Mode` enum('Physical','Online','Semi') NOT NULL,
  `Event_location` text NOT NULL,
  `Event_Data` timestamp NOT NULL,
  `Publish_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('UpComing','Finished','Postponed','OnGoing') NOT NULL DEFAULT 'UpComing',
  `Partner_ID` text NOT NULL,
  PRIMARY KEY (`Event_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_ID`, `Event_Title`, `Discription`, `Event_Mode`, `Event_location`, `Event_Data`, `Publish_Date`, `Status`, `Partner_ID`) VALUES
('', 'ergergerg', 'ergerg', 'Physical', '', '2023-11-02 18:19:47', '2023-11-29 22:38:18', 'Finished', 'ergerg'),
('E001', 'Green Recycling Expo', 'Explore sustainable recycling practices and eco-friendly solutions.', 'Online', 'Virtual Event', '2023-12-01 04:30:00', '2023-11-28 08:00:00', 'Finished', '123abc'),
('E002', 'Nature Cleanup Day', 'Join us for a community cleanup day to preserve and protect our local natural environment.', 'Physical', 'Local Park', '2023-12-10 03:30:00', '2023-11-29 09:30:00', 'Finished', '123abc'),
('E003', 'Waste Reduction Workshop', 'Learn practical tips and strategies to reduce waste in your daily life.', 'Semi', 'Hybrid (Physical and Online)', '2023-12-05 08:30:00', '2023-11-30 12:00:00', 'Finished', '456def'),
('E004', 'Eco-Friendly Art Exhibition', 'An exhibition showcasing artwork made from recycled materials to promote environmental awareness.', 'Physical', 'Art Gallery', '2023-12-08 08:00:00', '2023-12-01 10:00:00', 'Finished', '789ghi'),
('E005', 'Digital Eco-Conference', 'An online conference discussing the latest innovations in sustainable technologies and environmental conservation.', 'Online', 'Virtual Conference', '2023-12-03 06:00:00', '2023-12-02 08:00:00', 'Finished', '456def'),
('E006', 'Tree Planting Marathon', 'Contribute to the greenery by participating in a tree planting event.', 'Physical', 'City Arboretum', '2023-12-07 04:30:00', '2023-12-03 09:30:00', 'Finished', '123abc'),
('E007', 'Recycled Fashion Show', 'A fashion show featuring clothing created from recycled materials, promoting sustainable fashion.', 'Physical', 'Fashion Center', '2023-12-12 12:30:00', '2023-12-04 14:00:00', 'Finished', '789ghi'),
('E008', 'Ocean Cleanup Expedition', 'Join a team to clean up plastic and debris from our oceans to protect marine life.', 'Semi', 'Coastal Cleanup Zone', '2023-12-06 02:30:00', '2023-12-05 12:00:00', 'Finished', '456def'),
('E009', 'Green Technology Symposium', 'Explore the role of technology in building a sustainable future.', 'Online', 'Virtual Symposium', '2023-12-02 09:30:00', '2023-12-06 09:30:00', 'Finished', '123abc'),
('E010', 'Recycle and Reuse Fair', 'A fair promoting the importance of recycling and showcasing creative ways to reuse materials.', 'Physical', 'Community Center', '2023-12-09 06:30:00', '2023-12-07 10:00:00', 'Finished', '789ghi');

-- --------------------------------------------------------

--
-- Table structure for table `generalmanager`
--

DROP TABLE IF EXISTS `generalmanager`;
CREATE TABLE IF NOT EXISTS `generalmanager` (
  `GeneralManager_ID` varchar(10) NOT NULL,
  `User_ID` varchar(10) NOT NULL,
  `SortingCenter_ID` varchar(6) NOT NULL,
  PRIMARY KEY (`GeneralManager_ID`),
  KEY `User_IDfk` (`User_ID`),
  KEY `Sorting_CenterFK` (`SortingCenter_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalmanager`
--

INSERT INTO `generalmanager` (`GeneralManager_ID`, `User_ID`, `SortingCenter_ID`) VALUES
('GM96sdf', 'MWNwhG', 'SC001');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Inventory_ID` varchar(60) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'New',
  `Type` varchar(20) DEFAULT 'New',
  `Weight` int(11) NOT NULL DEFAULT '0',
  `Weight_After_Sorting` json DEFAULT NULL,
  `Batch_ID` varchar(20) NOT NULL,
  `Sorting_Job_ID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Inventory_ID`),
  KEY `Batch_ID` (`Batch_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_ID`, `Status`, `Type`, `Weight`, `Weight_After_Sorting`, `Batch_ID`, `Sorting_Job_ID`) VALUES
('Inven1703353515c7Pl', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353515Cl4H', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353515iRKV', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353515nUY5', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353515oxag', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353516cuFa', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353516Il4M', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353516JV7i', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353516S4dZ', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven1703353516XpYp', 'New', 'New', 0, '0', 'Batch1703353515XV3s', NULL),
('Inven17033548565y69', 'Collected', 'Colored Plastic', 5, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856bsnj', 'Copper', 'New', 0, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856BxTC', 'Sorted', 'New', 0, '{\"Zinc\": 30, \"Copper\": 10, \"Aluminium\": 20}', 'Batch1703354856hjMe', NULL),
('Inven1703354856lVan', 'Collected', 'New', 0, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856LXai', 'Collected', 'New', 0, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856NmZI', 'Collected', 'Cloth', 5, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856p36R', 'Sorting', 'Metal', 5, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856Rpwr', 'In whorehouse', 'Metal', 10, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856T6bM', 'In whorehouse', 'Colored Plastic', 2, '0', 'Batch1703354856hjMe', NULL),
('Inven1703354856TbDv', 'In whorehouse', 'Metal', 1500, '0', 'Batch1703354856hjMe', NULL),
('Inven17034269120uEG', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven17034269122OzM', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912dozR', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912EiFA', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912gyDb', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912SHgv', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912TAb0', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912Tq31', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912v1u8', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912vtyB', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven1703426912xr4A', 'Assigned', 'New', 0, '0', 'Batch1703426912lWWI', NULL),
('Inven17034272425xNC', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven17034272427Gzt', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242ACPa', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242aEd9', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242axyj', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242ibBq', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242iBl5', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242Lofd', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242SGQt', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven1703427242wRYd', 'Assigned', 'New', 0, '0', 'Batch1703427242dtpv', NULL),
('Inven170351560167vu', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601dzHG', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601E6yb', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601JnAU', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601mkIB', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601O4g2', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601uIeN', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601Vtfs', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601wRIe', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven1703515601ZFTZ', 'New', 'New', 0, '0', 'Batch1703515601gdTe', NULL),
('Inven17066034854MuV', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven17066034858m1y', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485AoUE', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485DvFs', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485hUk1', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485JdlF', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485PAdy', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485Tzrg', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485xGGv', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven1706603485zqOc', 'New', 'New', 0, NULL, 'Batch1706603485p2II', NULL),
('Inven17068651235SNG', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven1706865123c4od', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven1706865123GNur', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven1706865123KqZO', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven1706865123L86A', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven1706865123Zsan', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven17068651245PQJ', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven17068651246OFY', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven1706865124cbC5', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL),
('Inven1706865124nSZK', 'New', 'New', 0, NULL, 'Batch1706865123Z5Hl', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_batch`
--

DROP TABLE IF EXISTS `inventory_batch`;
CREATE TABLE IF NOT EXISTS `inventory_batch` (
  `Batch_ID` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `User_ID` varchar(60) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'New',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Collector_ID` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Batch_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_batch`
--

INSERT INTO `inventory_batch` (`Batch_ID`, `Description`, `User_ID`, `Status`, `Date`, `Collector_ID`) VALUES
('Batch1703353515XV3s', 'Test Data', 'MWNwhG', 'Assigned', '2023-12-23 17:45:15', 'BXrNGD'),
('Batch1703354856hjMe', 'davadv', 'MWNwhG', 'Assigned', '2023-12-23 18:07:36', 'BXrNGD'),
('Batch1703426912lWWI', 'Test 10', 'MWNwhG', 'Assigned', '2023-12-24 14:08:32', 'BXrNGD'),
('Batch1703427242dtpv', 'Test 20', 'MWNwhG', 'Assigned', '2023-12-24 14:14:02', 'BXrNGD'),
('Batch1703515601gdTe', 'sdcsdc', 'MWNwhG', 'New', '2023-12-25 14:46:41', NULL),
('Batch1706603485p2II', 'sfdsldjfsdodhflrsd.hfblerdbfvlsdkfblisdbfls,dzfbsld,fkbs,dfkb,sdf', 'MWNwhG', 'New', '2024-01-30 08:31:25', NULL),
('Batch1706865123Z5Hl', 'RecycoEvent', 'MWNwhG', 'New', '2024-02-02 09:12:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

DROP TABLE IF EXISTS `machine`;
CREATE TABLE IF NOT EXISTS `machine` (
  `Machine_ID` varchar(10) NOT NULL,
  `Location` text NOT NULL,
  `Machine_Type` text NOT NULL,
  `Status` enum('Operational','OnRepair','OnService','InOperational') NOT NULL DEFAULT 'Operational',
  `Next_Service` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Machine_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`Machine_ID`, `Location`, `Machine_Type`, `Status`, `Next_Service`) VALUES
('MID001', 'Colombo', 'TypeA', 'Operational', '2024-02-01 02:30:00'),
('MID002', 'Colombo', 'TypeB', 'OnService', '2024-02-03 05:00:00'),
('MID003', 'Colombo', 'TypeC', 'Operational', '2024-02-05 09:15:00'),
('MID004', 'Colombo', 'TypeA', 'OnRepair', '2024-02-07 03:45:00'),
('MID005', 'Colombo', 'TypeB', 'Operational', '2024-02-09 06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `Notifications_ID` varchar(10) NOT NULL,
  `User_ID` varchar(10) NOT NULL,
  `Title` text NOT NULL,
  `Status` enum('Unread','read') NOT NULL,
  `Description` text NOT NULL,
  `Link` text NOT NULL,
  PRIMARY KEY (`Notifications_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Notifications_ID`, `User_ID`, `Title`, `Status`, `Description`, `Link`) VALUES
('1', 'MWNwhG', 'Notification 1', 'Unread', 'This is the first notification.', 'https://example.com/1'),
('10', 'MWNwhG', 'Notification 10', 'Unread', 'This is the tenth notification.', 'https://example.com/10'),
('2', 'MWNwhG', 'Notification 2', 'Unread', 'This is the second notification.', 'https://example.com/2'),
('3', 'MWNwhG', 'Notification 3', 'Unread', 'This is the third notification.', 'https://example.com/3'),
('4', 'MWNwhG', 'Notification 4', 'Unread', 'This is the fourth notification.', 'https://example.com/4'),
('5', 'MWNwhG', 'Notification 5', 'Unread', 'This is the fifth notification.', 'https://example.com/5'),
('6', 'MWNwhG', 'Notification 6', 'Unread', 'This is the sixth notification.', 'https://example.com/6'),
('7', 'MWNwhG', 'Notification 7', 'Unread', 'This is the seventh notification.', 'https://example.com/7'),
('8', 'MWNwhG', 'Notification 8', 'Unread', 'This is the eighth notification.', 'https://example.com/8'),
('9', 'MWNwhG', 'Notification 9', 'Unread', 'This is the ninth notification.', 'https://example.com/9');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

DROP TABLE IF EXISTS `otp`;
CREATE TABLE IF NOT EXISTS `otp` (
  `User_ID` varchar(100) NOT NULL,
  `OTP` int(6) NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `Partner_ID` varchar(6) NOT NULL,
  `Company_Name` text NOT NULL,
  `WebsiteLink` text,
  `Events` text NOT NULL,
  `User_ID` varchar(10) NOT NULL,
  `Articles` text NOT NULL,
  `Status` text NOT NULL,
  `JoinDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Reg_No` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Partner_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`Partner_ID`, `Company_Name`, `WebsiteLink`, `Events`, `User_ID`, `Articles`, `Status`, `JoinDate`, `Reg_No`) VALUES
('123abc', 'EcoTech', NULL, '1,3,4,9,15,26,31,40,55,61', 'user321', '7,9,18,23,29,36,47,52,60,72', 'Active', '2023-11-28 16:11:44', NULL),
('456def', 'EnviroCorp', NULL, '2,5,10,17,25,33,41,50,62,79', 'user654', '1,4,6,8,15,28,34,42,59,68', 'Inactive', '2023-11-28 16:11:44', NULL),
('789ghi', 'SustainableTech', NULL, '4,8,14,18,26,32,40,51,67,73', 'user987', '3,7,12,17,22,30,45,54,61,78', 'Active', '2023-11-28 16:11:44', NULL),
('abc123', 'Tech Innovators', NULL, '2,4,11,14,20,31,44,50,66,72', 'user456', '3,7,13,19,26,37,48,53,61,75', 'Inactive', '2023-11-28 16:11:44', NULL),
('abc456', 'GreenEnergyCo', NULL, '2,7,11,14,23,31,40,55,61,78', 'userabc', '1,6,9,17,26,37,45,52,67,72', 'Active', '2023-11-28 16:11:44', NULL),
('cdv', 'Recyco-HUB', NULL, '1,5,6,10,15,22,33,40,55,63', '323dv', '6,8,9,12,18,27,35,42,57,68', 'Active', '2023-11-28 16:11:44', NULL),
('def123', 'EcoInnovations', NULL, '1,6,10,15,20,27,32,41,55,63', 'userdef', '7,8,12,18,28,36,47,50,66,71', 'Pending', '2023-11-28 16:11:44', NULL),
('ghi789', 'EnviroSolutions', NULL, '3,5,12,18,24,30,41,48,55,60', 'userghi', '2,7,11,14,27,36,47,53,69,74', 'Inactive', '2023-11-28 16:11:44', NULL),
('jkl123', 'SustainableSolutions', NULL, '1,7,11,16,22,30,40,55,62,71', 'userjkl', '3,9,14,19,25,37,46,51,68,74', 'Pending', '2023-11-28 16:11:44', NULL),
('lmn789', 'RenewablePower', NULL, '3,8,12,16,22,30,46,52,66,71', 'userlmn', '2,7,11,19,25,34,49,53,68,73', 'Inactive', '2023-11-28 16:11:44', NULL),
('mno456', 'GreenSolutionsInc', NULL, '1,7,10,15,20,28,33,42,55,62', 'userxyz', '6,8,14,19,25,37,48,53,60,71', 'Inactive', '2023-11-28 16:11:44', NULL),
('pqr123', 'EcoInnovate', NULL, '2,6,11,16,22,30,40,52,66,70', 'userpqr', '3,9,15,18,27,35,46,51,64,79', 'Pending', '2023-11-28 16:11:44', NULL),
('stu789', 'EcoFriendlyTech', NULL, '3,5,10,14,21,29,38,45,57,63', 'userstu', '2,7,12,16,25,31,47,50,69,74', 'Active', '2023-11-28 16:11:44', NULL),
('vwx123', 'GreenTechSolutions', NULL, '2,7,12,17,23,31,42,48,55,62', 'uservwx', '1,6,9,14,27,36,41,53,67,72', 'Inactive', '2023-11-28 16:11:44', NULL),
('xyz789', 'Green Solutions', NULL, '3,6,12,16,21,30,41,58,64,70', 'user789', '2,5,8,14,24,32,45,51,67,74', 'Pending', '2023-11-28 16:11:44', NULL),
('yz456', 'CleanEnergyCorp', NULL, '1,4,9,14,20,26,32,41,55,61', 'useryz', '7,8,12,18,29,37,44,50,65,78', 'Active', '2023-11-28 16:11:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partner_contact_person`
--

DROP TABLE IF EXISTS `partner_contact_person`;
CREATE TABLE IF NOT EXISTS `partner_contact_person` (
  `Partner_ID` varchar(6) NOT NULL,
  `Name` text NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Title` text NOT NULL,
  PRIMARY KEY (`Phone`) USING BTREE,
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner_contact_person`
--

INSERT INTO `partner_contact_person` (`Partner_ID`, `Name`, `Phone`, `Email`, `Title`) VALUES
('123abc', 'Prasanna', '0714479775', 'example@gmail.com', 'AD PR'),
('123abc', 'Lahiru Jayathilake', '0718696971', 'lahiruthpala@gmail.com', 'Director PR');

-- --------------------------------------------------------

--
-- Table structure for table `pending_partnership`
--

DROP TABLE IF EXISTS `pending_partnership`;
CREATE TABLE IF NOT EXISTS `pending_partnership` (
  `Application_ID` varchar(6) NOT NULL,
  `Data` text NOT NULL,
  `Application_Date` int(11) NOT NULL,
  `Status` text NOT NULL,
  `Company_ID` varchar(6) NOT NULL,
  PRIMARY KEY (`Application_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_partnership`
--

INSERT INTO `pending_partnership` (`Application_ID`, `Data`, `Application_Date`, `Status`, `Company_ID`) VALUES
('A001', 'Interested in collaborating on sustainable packaging solutions.', 1640985600, '', 'C001'),
('A002', 'Exploring partnership opportunities for eco-friendly product promotion.', 1641100800, '', 'C002'),
('A003', 'Application for joint recycling program to reduce environmental impact.', 1641216000, '', 'C003'),
('A004', 'Seeking collaboration for a tree planting initiative in urban areas.', 1641331200, '', 'C004'),
('A005', 'Application for joint research project on waste-to-energy technologies.', 1641446400, '', 'C005'),
('A006', 'Interested in partnering for a community-based environmental education program.', 1641561600, '', 'C006'),
('A007', 'Exploring joint initiatives for sustainable water conservation projects.', 1641676800, '', 'C007'),
('A008', 'Application for collaboration on promoting responsible e-waste recycling.', 1641792000, '', 'C008'),
('A009', 'Seeking partnership for a green transportation project using electric vehicles.', 1641907200, '', 'C009'),
('A010', 'Interested in joint efforts to reduce carbon footprint in manufacturing processes.', 1642022400, '', 'C010');

-- --------------------------------------------------------

--
-- Table structure for table `pickups`
--

DROP TABLE IF EXISTS `pickups`;
CREATE TABLE IF NOT EXISTS `pickups` (
  `collectorId` varchar(20) NOT NULL,
  `pickupId` varchar(20) NOT NULL,
  `Assigned_date` datetime NOT NULL,
  `Status` varchar(20) NOT NULL,
  `AssignedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pickupId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickups`
--

INSERT INTO `pickups` (`collectorId`, `pickupId`, `Assigned_date`, `Status`, `AssignedDate`) VALUES
('25435', 'P123', '2023-12-09 10:15:57', 'Accepted', '2023-12-10 13:46:10'),
('25435', 'P124', '2023-12-09 10:16:52', 'Accepted', '2023-12-10 13:46:10'),
('25435', 'P125', '2023-12-09 10:17:20', 'Assigned', '2023-12-10 13:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_request`
--

DROP TABLE IF EXISTS `pickup_request`;
CREATE TABLE IF NOT EXISTS `pickup_request` (
  `pickupId` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Pending',
  `pickup_address` text NOT NULL,
  `waste_type` varchar(20) NOT NULL,
  `Requested_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Completed_Date` timestamp NULL DEFAULT NULL,
  `Review` text,
  `Job_ID` varchar(20) DEFAULT NULL,
  `InventoryId` varchar(20) DEFAULT NULL,
  `Customer_ID` varchar(20) NOT NULL,
  `Collector_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`pickupId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup_request`
--

INSERT INTO `pickup_request` (`pickupId`, `weight`, `Status`, `pickup_address`, `waste_type`, `Requested_Date`, `Completed_Date`, `Review`, `Job_ID`, `InventoryId`, `Customer_ID`, `Collector_ID`) VALUES
('P123', 68, 'Assigned', 'fgh', 'plastic', '2023-12-03 05:18:57', '2023-12-03 12:09:08', '****', 'Pending', 'IN12', '', ''),
('P1233', 45, 'Assigned', 'dfff', 'metal', '2023-12-03 05:18:57', '2023-12-02 18:30:00', '', 'Assigned', 'IN34', '', ''),
('P1232', 45, 'Assigned', 'Colombo', 'plastic', '2023-12-04 23:31:42', '2023-12-06 03:51:35', 'Not reviewed Yet', 'Pending', 'IN56', '', ''),
('P1231', 15, 'Assigned', 'Colombo', 'metal', '2023-12-04 23:32:46', '2023-12-07 18:30:00', 'Not reviewed Yet', 'Pending', 'IN67', '', ''),
('P124', 5, 'Collected', 'Colombo', 'Colored Plastic', '2023-12-04 23:33:47', '2023-12-04 23:33:47', 'Not reviewed Yet', 'Collected', 'Inven1703354856BxTC', 'liT62t', ''),
('pick17045548064sNM', 10, 'Pending', '63/1 Dolakanaththa Junction, Nampamunuwa, Piliyandala', 'Metal', '2024-01-06 15:26:46', NULL, NULL, NULL, NULL, 'MWNwhG', 'BXrNGD');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_request_jobs`
--

DROP TABLE IF EXISTS `pickup_request_jobs`;
CREATE TABLE IF NOT EXISTS `pickup_request_jobs` (
  `Job_ID` int(11) NOT NULL,
  `Collector_ID` int(11) NOT NULL,
  `Creation_Date` int(11) NOT NULL,
  PRIMARY KEY (`Job_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presets`
--

DROP TABLE IF EXISTS `presets`;
CREATE TABLE IF NOT EXISTS `presets` (
  `PreSet_ID` varchar(10) NOT NULL,
  `Warehouse_Capacity` int(11) NOT NULL,
  PRIMARY KEY (`PreSet_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presets`
--

INSERT INTO `presets` (`PreSet_ID`, `Warehouse_Capacity`) VALUES
('Pre001', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
CREATE TABLE IF NOT EXISTS `prices` (
  `Type_Name` varchar(100) NOT NULL,
  `Transaction` enum('Buying','Selling') NOT NULL,
  `Price` int(11) NOT NULL,
  PRIMARY KEY (`Type_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`Type_Name`, `Transaction`, `Price`) VALUES
('Aluminium_B', 'Buying', 206),
('Copper_B', 'Buying', 1500),
('Copper_S', 'Selling', 1800),
('Zinc_B', 'Buying', 225);

-- --------------------------------------------------------

--
-- Table structure for table `reg_users`
--

DROP TABLE IF EXISTS `reg_users`;
CREATE TABLE IF NOT EXISTS `reg_users` (
  `User_ID` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `pwd` text NOT NULL,
  `Address` text,
  `Role` text NOT NULL,
  `Status` enum('Active','Inactive','Banned','UnVerified') NOT NULL DEFAULT 'Active',
  `Phone` int(11) DEFAULT NULL,
  `Phone_verify` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_users`
--

INSERT INTO `reg_users` (`User_ID`, `UserName`, `Email`, `FirstName`, `LastName`, `pwd`, `Address`, `Role`, `Status`, `Phone`, `Phone_verify`) VALUES
('BXrNGD', 'collector1', 'collector1@gmail.com', 'Lahiru', 'Jayathilake', '$2y$10$vmsh25zD9f2zP2IGC5wRLOWsM36EkmzvIPcLIap3A9uFKTWuvC3sC', '63/1 Dolekanaththa junction, Nampamunuwa, Piliyandala', 'collector', 'Active', NULL, 0),
('CORy8F', 'Admin', 'Admin@gmail.com', 'Admin', '1', '$2y$10$jFBRMohY1Lfk0Tx1B3VRIe2vld1ogPNH7RuK2ISjjvnIUBMp3J9AC', '245/Colombo/Sorting Center 1', 'Admin', 'Active', 718696971, 1),
('liT62t', 'luthira', 'luthira@gmail.com', 'luthira', 'Geesilu', '$2y$10$7wDuZiSaW24ZUcrqlnADb.31CfP0186nr0SY.5T3bQVgy73q1Aqb.', 'svdh656hd35', 'customer', 'Active', NULL, 0),
('MWNwhG', 'lahiru', 'lahiruthpala@gmail.com', 'Lahiru', 'Jayathilake', '$2y$10$jFBRMohY1Lfk0Tx1B3VRIe2vld1ogPNH7RuK2ISjjvnIUBMp3J9AC', 'svdh656hd35', 'SortingManager', 'Active', NULL, 0),
('nm5AQS', 'partner1', 'partner1@gmail.com', '0', '0', '$2y$10$DMA50psS9MM2scI4M3/5ren/oqvzlekcuWaw6aIZitLvjDD2ViiQa', 'svdh656hd35', 'Partner', 'Active', NULL, 0),
('tWEimz', 'user', 'user@gmail.com', '0', '0', '$2y$10$Jp2NmoTcRDBgfVY5rmGsEOE/LUkwnJzTrQ/SvP3fOGprUN1NiDCl2', 'svdh656hd35', 'customer', 'Active', NULL, 0),
('VEBUCD', 'cvdf', 'dfdfvfdvdvvd@gmail.com', '0', '0', '$2y$10$pk2PlK9kCwpCLi3dqzkoUOOQ3f30Z8NlptpVa81M7GSps0VOtUL86', 'svdh656hd35', 'customer', 'Active', NULL, 0),
('XRADgi', 'evgfv', 'dfdvvd@gmail.com', '0', '0', '$2y$10$oYwzaFZ6QU8SLaSJAI1EyuY3PjRtQfci3uf7uMssRAoh6nRgz5m/y', 'svdh656hd35', 'customer', 'Active', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

DROP TABLE IF EXISTS `remarks`;
CREATE TABLE IF NOT EXISTS `remarks` (
  `ID` int(11) NOT NULL,
  `Partner_ID` varchar(6) NOT NULL,
  `Note` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User_ID` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`ID`, `Partner_ID`, `Note`, `Date`, `User_ID`) VALUES
(1, '123abc', 'This is a sample note for Partner 123abc.', '2023-11-29 12:00:00', 'user1'),
(2, '123abc', 'Another remark for Partner 123abc.', '2023-11-29 12:30:00', 'user2'),
(3, '123abc', 'A third remark for Partner 123abc.', '2023-11-29 13:00:00', 'user3');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `sector_ID` varchar(5) NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `radius` int(11) NOT NULL,
  `Collector_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`sector_ID`),
  KEY `Collector_IDfk` (`Collector_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`sector_ID`, `latitude`, `longitude`, `radius`, `Collector_ID`) VALUES
('S001', '6.902041987828156', '79.86116500114315', 5, 'BXrNGD');

-- --------------------------------------------------------

--
-- Table structure for table `sorting_center`
--

DROP TABLE IF EXISTS `sorting_center`;
CREATE TABLE IF NOT EXISTS `sorting_center` (
  `SortingCenter_ID` varchar(6) NOT NULL,
  `capacity` int(11) NOT NULL,
  `location` text NOT NULL,
  PRIMARY KEY (`SortingCenter_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sorting_center`
--

INSERT INTO `sorting_center` (`SortingCenter_ID`, `capacity`, `location`) VALUES
('SC001', 10000, '6.812692, 79.905443');

-- --------------------------------------------------------

--
-- Table structure for table `sorting_job`
--

DROP TABLE IF EXISTS `sorting_job`;
CREATE TABLE IF NOT EXISTS `sorting_job` (
  `Sorting_Job_ID` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'In_Progerss',
  `Start_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `End_Date` timestamp NULL DEFAULT NULL,
  `Line_No` varchar(5) NOT NULL DEFAULT '1',
  `User_ID` varchar(60) NOT NULL,
  `Description` text,
  PRIMARY KEY (`Sorting_Job_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sorting_job`
--

INSERT INTO `sorting_job` (`Sorting_Job_ID`, `Status`, `Start_Date`, `End_Date`, `Line_No`, `User_ID`, `Description`) VALUES
('0BuzQi', 'In_Progress', '2024-01-01 05:21:07', NULL, '1', 'MWNwhG', ''),
('6iysZU', 'In_Progerss', '2024-01-02 08:01:13', NULL, '1', 'MWNwhG', ''),
('6racWh', 'Sorted', '2023-11-03 03:46:55', NULL, 'Z1', 'MWNwhG', ''),
('8mcC3H', 'Sorted', '2024-01-02 08:03:48', NULL, '1', 'MWNwhG', ''),
('B5ZEZg', 'In_Progress', '2023-11-02 22:28:56', NULL, 'A2', 'XNB8wp', ''),
('DniErc', 'In_Progress', '2023-11-03 02:32:21', NULL, 'A4', 'MWNwhG', ''),
('KMOOki', 'In_Progress', '2023-12-21 09:06:31', NULL, '1', 'MWNwhG', ''),
('LSYq7E', 'Sorted', '2023-11-02 22:10:23', NULL, 'A1', 'XNB8wp', ''),
('N2ra2d', 'In_Progerss', '2024-01-02 08:08:48', NULL, '1', 'MWNwhG', ''),
('Sort1704186976ppWo', 'In_Progerss', '2024-01-02 09:16:16', NULL, 'A9', 'MWNwhG', 'test'),
('Sort1704187632g4y9', 'In_Progerss', '2024-01-02 09:27:12', NULL, '1', 'MWNwhG', NULL),
('Sort1704187632OUrr', 'In_Progerss', '2024-01-02 09:27:12', NULL, '1', 'MWNwhG', NULL),
('Sort1704189671gd7X', 'In_Progerss', '2024-01-02 10:01:11', NULL, 'sd4', 'MWNwhG', 'dffdfd'),
('Sort1704190436HgSb', 'In_Progerss', '2024-01-02 10:13:56', NULL, 'fvf', 'MWNwhG', 'vefvsfdv'),
('Sort1704191094FKry', 'In_Progerss', '2024-01-02 10:24:54', NULL, 'A9', 'MWNwhG', 'sdgsdfg'),
('Sort1704191140mqyz', 'In_Progerss', '2024-01-02 10:25:40', NULL, 'as', 'MWNwhG', 'Asd'),
('Sort1704191183MhaG', 'In_Progerss', '2024-01-02 10:26:23', NULL, 'ef', 'MWNwhG', 'ewf'),
('Sort17041913780E2I', 'In_Progerss', '2024-01-02 10:29:38', NULL, 'ef', 'MWNwhG', 'ewf'),
('Sort1704191562GzOo', 'In_Progerss', '2024-01-02 10:32:42', NULL, 'sdc', 'MWNwhG', 'sdcscd'),
('Sort1704191595v3XC', 'In_Progerss', '2024-01-02 10:33:15', NULL, 'csdc', 'MWNwhG', 'wefwef'),
('Sort17041916484HMe', 'In_Progerss', '2024-01-02 10:34:08', NULL, 'A9', 'MWNwhG', 'srgs'),
('Sort1704191719oZN9', 'In_Progerss', '2024-01-02 10:35:19', NULL, 'ghj,', 'MWNwhG', ',,gh,gh'),
('XNEDrp', 'Sorted', '2023-11-03 04:18:24', NULL, 'Z1', 'MWNwhG', ''),
('YOv6m1', 'In_Progerss', '2024-01-02 08:59:03', NULL, '1', 'MWNwhG', ''),
('ztXXDs', 'Sorted', '2023-11-03 05:09:34', NULL, 'LIne1', 'MWNwhG', '');

-- --------------------------------------------------------

--
-- Table structure for table `sorting_machines`
--

DROP TABLE IF EXISTS `sorting_machines`;
CREATE TABLE IF NOT EXISTS `sorting_machines` (
  `M_ID` varchar(10) NOT NULL,
  `SortingCenter_ID` varchar(6) NOT NULL,
  `Verification_Number` varchar(10) NOT NULL,
  `Code` text NOT NULL,
  `Status` text NOT NULL,
  PRIMARY KEY (`M_ID`),
  KEY `SortingCenter_fk` (`SortingCenter_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `Stock_ID` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Inventory_ID` varchar(6) NOT NULL,
  PRIMARY KEY (`Stock_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

DROP TABLE IF EXISTS `verify`;
CREATE TABLE IF NOT EXISTS `verify` (
  `Email` varchar(200) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserName` varchar(100) NOT NULL,
  `pwd` text NOT NULL,
  PRIMARY KEY (`Email`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `User_Coustomer_IDfk` FOREIGN KEY (`User_ID`) REFERENCES `reg_users` (`User_ID`);

--
-- Constraints for table `generalmanager`
--
ALTER TABLE `generalmanager`
  ADD CONSTRAINT `Sorting_CenterFK` FOREIGN KEY (`SortingCenter_ID`) REFERENCES `sorting_center` (`SortingCenter_ID`),
  ADD CONSTRAINT `User_IDfk` FOREIGN KEY (`User_ID`) REFERENCES `reg_users` (`User_ID`);

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `Collector_IDfk` FOREIGN KEY (`Collector_ID`) REFERENCES `collector` (`Collector_ID`);

--
-- Constraints for table `sorting_machines`
--
ALTER TABLE `sorting_machines`
  ADD CONSTRAINT `SortingCenter_fk` FOREIGN KEY (`SortingCenter_ID`) REFERENCES `sorting_center` (`SortingCenter_ID`) ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
DROP EVENT IF EXISTS `auto_update_data`$$
CREATE DEFINER=`lahiru`@`%` EVENT `auto_update_data` ON SCHEDULE EVERY 1 HOUR STARTS '2023-12-08 13:09:59' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
  DELETE FROM verify
  WHERE expires < CURRENT_TIMESTAMP;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
