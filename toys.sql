-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Dec 25, 2018 at 02:27 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `cId` int(10) UNSIGNED NOT NULL,
  `cName` varchar(50) DEFAULT NULL,
  `cDescription` varchar(200) DEFAULT NULL,
  `lastModifiedBy` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`cId`, `cName`, `cDescription`, `lastModifiedBy`) VALUES
(3, 'Espresso', 'The secret to creating a rich, delicate flavor of an Espresso coffee is a unique and elaborate blend of Arabica and Robusta coffee.', 2),
(8, 'Coffee', '', 2),
(9, 'Tea', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `iId` varchar(10) NOT NULL,
  `iName` varchar(50) DEFAULT NULL,
  `iDescription` varchar(300) DEFAULT NULL,
  `iPrice` int(10) UNSIGNED DEFAULT NULL,
  `iStatus` varchar(20) DEFAULT NULL,
  `iSize` varchar(20) DEFAULT NULL,
  `iImage` varchar(300) DEFAULT NULL,
  `catalogueId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iId`, `iName`, `iDescription`, `iPrice`, `iStatus`, `iSize`, `iImage`, `catalogueId`) VALUES
('1', 'Espresso', 'The delicious espresso is really delicious! Perfectly extracted from roasted coffee with a unique blend of premium quality Robusta coffee beans and Arabica beans.', 3, 'Coffee', 'M', '1.jpg', 8),
('2', 'Latte', 'Sweet milk coffee to forget! With a little lighter flavor than Cappuccino, our latte begins with espresso, then adds fresh milk and foam to the art. You can optionally drink hot or use with the ice.', 5, 'Coffee', 'M', '2.jpg', 3),
('3', 'Cappuccino', 'Stylish milky coffee cups! A bit more luscious than Latte, our Cappuccino started with espresso, then added the same amount of milk and milk foam for a very attractive. You can optionally drink hot or', 5, 'Coffee', 'M', '3.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uId` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uId`, `username`, `password`, `status`) VALUES
(1, 'admin', '79514018d6857b77d48122e301ce330b', '1'),
(2, 'kientran', '79514018d6857b77d48122e301ce330b', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`cId`),
  ADD KEY `lastModifiedBy` (`lastModifiedBy`),
  ADD KEY `cName` (`cName`(7));

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iId`),
  ADD KEY `iName` (`iName`(10)),
  ADD KEY `catalogueId` (`catalogueId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uId`),
  ADD KEY `username` (`username`(10));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `cId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD CONSTRAINT `catalogue_ibfk_1` FOREIGN KEY (`lastModifiedBy`) REFERENCES `user` (`uId`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`catalogueId`) REFERENCES `catalogue` (`cId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
