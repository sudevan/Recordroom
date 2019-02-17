-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2019 at 10:13 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recordroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `rec_bundle_record`
--

DROP TABLE IF EXISTS `rec_bundle_record`;
CREATE TABLE `rec_bundle_record` (
  `recordid` int(11) NOT NULL,
  `bundlenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `rec_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `rec_details`;
CREATE TABLE `rec_details` (
`id` int(11)
,`filenumber` varchar(50)
,`year` int(11)
,`section` varchar(5)
,`subject` varchar(500)
,`date` date
,`name` varchar(100)
,`tag` text
);

-- --------------------------------------------------------

--
-- Table structure for table `rec_location_master`
--

DROP TABLE IF EXISTS `rec_location_master`;
CREATE TABLE `rec_location_master` (
  `bundle_number` int(11) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rec_person`
--

DROP TABLE IF EXISTS `rec_person`;
CREATE TABLE `rec_person` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rec_record_master`
--

DROP TABLE IF EXISTS `rec_record_master`;
CREATE TABLE `rec_record_master` (
  `id` int(11) NOT NULL,
  `section` varchar(5) NOT NULL,
  `filenumber` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `personid` int(11) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `pages` int(11) NOT NULL,
  `ddate` date NOT NULL,
  `enteredby` int(11) NOT NULL,
  `inserttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rec_tags`
--

DROP TABLE IF EXISTS `rec_tags`;
CREATE TABLE `rec_tags` (
  `recordid` int(11) NOT NULL,
  `tag` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_loc`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_loc`;
CREATE TABLE `view_loc` (
`id` int(11)
,`filenumber` varchar(50)
,`year` int(11)
,`section` varchar(5)
,`subject` varchar(500)
,`date` date
,`name` varchar(100)
,`tag` text
,`bundlenumber` int(11)
,`location` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `rec_details`
--
DROP TABLE IF EXISTS `rec_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rec_details`  AS  select `rec_record_master`.`id` AS `id`,`rec_record_master`.`filenumber` AS `filenumber`,`rec_record_master`.`year` AS `year`,`rec_record_master`.`section` AS `section`,`rec_record_master`.`subject` AS `subject`,`rec_record_master`.`ddate` AS `date`,`rec_person`.`name` AS `name`,group_concat(`rec_tags`.`tag` separator ',') AS `tag` from ((`rec_record_master` left join `rec_person` on((`rec_record_master`.`personid` = `rec_person`.`id`))) join `rec_tags` on((`rec_record_master`.`id` = `rec_tags`.`recordid`))) group by `rec_record_master`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_loc`
--
DROP TABLE IF EXISTS `view_loc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_loc`  AS  select `rec_details`.`id` AS `id`,`rec_details`.`filenumber` AS `filenumber`,`rec_details`.`year` AS `year`,`rec_details`.`section` AS `section`,`rec_details`.`subject` AS `subject`,`rec_details`.`date` AS `date`,`rec_details`.`name` AS `name`,`rec_details`.`tag` AS `tag`,`rec_bundle_record`.`bundlenumber` AS `bundlenumber`,`rec_location_master`.`location` AS `location` from ((`rec_details` left join `rec_bundle_record` on((`rec_details`.`id` = `rec_bundle_record`.`recordid`))) left join `rec_location_master` on((`rec_bundle_record`.`bundlenumber` = `rec_location_master`.`bundle_number`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rec_bundle_record`
--
ALTER TABLE `rec_bundle_record`
  ADD UNIQUE KEY `recordnumber` (`recordid`);

--
-- Indexes for table `rec_location_master`
--
ALTER TABLE `rec_location_master`
  ADD PRIMARY KEY (`bundle_number`);

--
-- Indexes for table `rec_person`
--
ALTER TABLE `rec_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rec_record_master`
--
ALTER TABLE `rec_record_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personid` (`personid`);

--
-- Indexes for table `rec_tags`
--
ALTER TABLE `rec_tags`
  ADD KEY `recordid` (`recordid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rec_person`
--
ALTER TABLE `rec_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1630;
--
-- AUTO_INCREMENT for table `rec_record_master`
--
ALTER TABLE `rec_record_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7649;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rec_bundle_record`
--
ALTER TABLE `rec_bundle_record`
  ADD CONSTRAINT `rec_bundle_record_ibfk_1` FOREIGN KEY (`recordid`) REFERENCES `rec_record_master` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `rec_tags`
--
ALTER TABLE `rec_tags`
  ADD CONSTRAINT `rec_tags_ibfk_1` FOREIGN KEY (`recordid`) REFERENCES `rec_record_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
