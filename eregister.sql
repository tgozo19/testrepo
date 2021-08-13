-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2021 at 12:35 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `classRef` varchar(1000) NOT NULL,
  `classFromSchool` varchar(1000) NOT NULL,
  `classFromLevel` varchar(1000) NOT NULL,
  `className` varchar(1000) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `classTeacher` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classRef`, `classFromSchool`, `classFromLevel`, `className`, `picture`, `classTeacher`) VALUES
(1, '1', '8', '1', 'Form 1 South', 'photo3.jpg', ''),
(2, '2', '8', '1', 'Grade 1A', 'photo1.jpg', ''),
(3, 'd14a135734c38b76b4cee7f6241915e7', '8', '1', 'My Class', 'Untitled16211832862112276731.jpg', ''),
(4, 'd3f5712051411298c430b36dcfac9f29', '8', '1', 'New Class', 'mp16211837586149259.jpg', 'Takudzwa Gozo'),
(5, 'ba34a8a7bfe3a1bbe1c6e6e0b558d1c1', '8', '1', 'My Class 11111', 'reg1621339540623059572.jpg', 'Takudzwa Gozo'),
(6, '32a04c703a9974dc5826ac99ef5a38bc', '8', '2', 'Zvaita', 'swish1621508408901377126.jpg', 'Tawanda Bozho'),
(7, '8424f72d65fd71e8ce0fb35439fa2499', '16', '304f6006d64fd5ee1985206d59f01270', 'First Class', 'swish16216074811291760205.jpg', 'Takudzwa Gozo'),
(8, '913f90212b3846022b6026a414fb8f70', '16', '304f6006d64fd5ee1985206d59f01270', 'Second Class', 'mp16216075081468945122.jpg', 'Takudzwa Gozo'),
(9, '8ec43dbc004cbb5128d52548a6f58ee2', '22', 'cb91174ea21ed9de7f451bc28abd4f0a', 'Form 1 North', 'swish1621865311869675399.jpg', 'New Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `levelFrom` varchar(1000) NOT NULL,
  `levelRef` varchar(1000) NOT NULL,
  `levelName` varchar(1000) NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `levelFrom`, `levelRef`, `levelName`, `picture`) VALUES
(1, '8', '1', 'Form 1', 'photo5.jpg'),
(2, '8', '2', 'Form 2', 'photo7.jpg'),
(3, '9', '9', 'Form 3', 'photo5.jpg'),
(26, '17', '358067644f5475d3b0cbfb99a3fb5a2f', 'Grade 1', 'Untitled16211813581723820034.jpg'),
(12, '8', '8fd033d7cd1782866e07c2cf1f1214d2', 'Level 1', 'mp16213394982018069326.jpg'),
(11, '8', '3881eb2448c9eb929f75364c1460996a', 'New Level', 'Untitled16211813581723820034.jpg'),
(25, '16', 'ea1c71b2db26b5b4fe838dcb96896f01', 'Form 6', 'Untitled16211813581723820034.jpg'),
(24, '16', 'f09a0864537143dc5f569ad554f4684b', 'Form 5', 'Untitled16211813581723820034.jpg'),
(23, '16', '4905293115aa6b62441f6b999ebcd620', 'Form 4', 'Untitled16211813581723820034.jpg'),
(22, '16', '093443ffbc84c04fa578e2c46ba90019', 'Form 3', 'Untitled16211813581723820034.jpg'),
(21, '16', '4383e296f5fac8bbd9e24369ff691211', 'Form 2', 'Untitled16211813581723820034.jpg'),
(20, '16', '304f6006d64fd5ee1985206d59f01270', 'Form 1', 'Untitled16211813581723820034.jpg'),
(27, '17', '40ff7cadb55a7704e5dd837d40f6b339', 'Grade 2', 'Untitled16211813581723820034.jpg'),
(28, '17', 'f2eab26fe07eeee93af3a8012fecf0eb', 'Grade 3', 'Untitled16211813581723820034.jpg'),
(29, '17', '952390522a5c003ffb3c69ed638b9baf', 'Grade 4', 'Untitled16211813581723820034.jpg'),
(30, '17', '67a25754dab1ae3d559fb236b89018cc', 'Grade 5', 'Untitled16211813581723820034.jpg'),
(31, '17', '0d721d106d0d01e11077fc954af97be3', 'Grade 6', 'Untitled16211813581723820034.jpg'),
(32, '17', '929fac8f5fa90d71815ed20ce897eb1c', 'Grade 7', 'Untitled16211813581723820034.jpg'),
(33, '18', 'cb8b543555c08fc04f1aee6a2b7a9ab3', 'Form 1', 'Untitled16211813581723820034.jpg'),
(34, '18', '8d29333265c5ad340e238167bf146909', 'Form 2', 'Untitled16211813581723820034.jpg'),
(35, '18', '4b7175443e3035eb23bae553c04466ef', 'Form 3', 'Untitled16211813581723820034.jpg'),
(36, '18', '611349e1a44e700d59b62b5b14cd54b2', 'Form 4', 'Untitled16211813581723820034.jpg'),
(37, '18', 'ca6c66babfaa8616c67a372751e3961a', 'Form 5', 'Untitled16211813581723820034.jpg'),
(38, '18', '086e41ad2e22c426617369fbdc835673', 'Form 6', 'Untitled16211813581723820034.jpg'),
(39, '19', 'd551eeea5e7ef5962f69259fa1a73784', 'Grade 1', 'Untitled16211813581723820034.jpg'),
(40, '19', 'd0dedaf1d000afff31227bca59992025', 'Grade 2', 'Untitled16211813581723820034.jpg'),
(41, '19', 'd9e34d8b5339b24345039306b2bd2a67', 'Grade 3', 'Untitled16211813581723820034.jpg'),
(42, '19', '0690ff9e9bd0c8d937393b7c79ebf21e', 'Grade 4', 'Untitled16211813581723820034.jpg'),
(43, '19', 'bd85bce336c0cc5eae52d00d2e6807fc', 'Grade 5', 'Untitled16211813581723820034.jpg'),
(44, '19', '1d71baa8968b36f8affc09c9df3b890a', 'Grade 6', 'Untitled16211813581723820034.jpg'),
(45, '19', '3b5a959f61310f91385fdde6bdf0da2c', 'Grade 7', 'Untitled16211813581723820034.jpg'),
(46, '20', '0e429e5d13f6975eacd34660f9570da7', 'Form 1', '1.png'),
(47, '20', 'fa334978ea7a22b1f240eeaefe8e3b38', 'Form 2', '2.png'),
(48, '20', '086748b3e9ddc7431e977d0dbcd0951a', 'Form 3', '3.png'),
(49, '20', 'bd48be5e35e68a2248652e9d4a2704ce', 'Form 4', '4.png'),
(50, '20', '4863a3907bc3add1e643c7f8e2e53487', 'Form 5', '5.png'),
(51, '20', 'b8ccca18c350ad81d136760249718f1f', 'Form 6', '6.png'),
(52, '21', '132df3162e34e9417145e5b53af3b8e0', 'Grade 1', '1.png'),
(53, '21', '885545c2d25de59a9de07556b23cc975', 'Grade 2', '2.png'),
(54, '21', '6927b73a8c67ecfd9af9825d6d1435cd', 'Grade 3', '3.png'),
(55, '21', '18402ad3ce992bf464d28f48b7f725a6', 'Grade 4', '4.png'),
(56, '21', 'a374358326d2a9eed5a70a11e8128ab1', 'Grade 5', '5.png'),
(57, '21', '6433825220d52be3c27f69d5d74eaacb', 'Grade 6', '6.png'),
(58, '21', '9fa98982de7a0e1a89e184baaac98b68', 'Grade 7', '7.png'),
(59, '22', 'cb91174ea21ed9de7f451bc28abd4f0a', 'Form 1', '1.png'),
(60, '22', '9fee481e5410ae2469384aa34df42cac', 'Form 2', '2.png'),
(61, '22', '8824869b9c4ff857eaa0c57ce8de5dab', 'Form 3', '3.png'),
(62, '22', 'c60dc554c16d28285b92b20dfd2b13da', 'Form 4', '4.png'),
(63, '22', '4f03a4bc475bde83d315d899537b909f', 'Form 5', '5.png'),
(64, '22', '3213d54d7760ffbd9e942528eed56735', 'Form 6', '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `logForSchool` varchar(100) NOT NULL,
  `logForClass` varchar(100) NOT NULL,
  `logForStudent` varchar(100) NOT NULL,
  `logForDate` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `arrivedAt` varchar(10) NOT NULL,
  `leftAt` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2621 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `logForSchool`, `logForClass`, `logForStudent`, `logForDate`, `status`, `arrivedAt`, `leftAt`) VALUES
(1, '8', '1', '1910', '2 February 2021', '1', '09:00', '14:45'),
(2, '8', '1', '1911', '2 February 2021', '', '12:00', '16:00'),
(3, '8', '1', '1910', '3 February 2021', '', '09:00', '14:45'),
(4, '8', '1', '1911', '6 December 2020', '', '12:00', '16:00'),
(2520, '16', '8424f72d65fd71e8ce0fb35439fa2499', '6', '2021 January 7', '1', '-', '-'),
(2521, '16', '8424f72d65fd71e8ce0fb35439fa2499', '6', '2021 January 6', '0', '-', '-'),
(2522, '16', '8424f72d65fd71e8ce0fb35439fa2499', '6', '2021 January 5', '0', '-', '-'),
(2523, '16', '8424f72d65fd71e8ce0fb35439fa2499', '6', '2021 January 1', '0', '-', '-'),
(2524, '16', '8424f72d65fd71e8ce0fb35439fa2499', '6', '2021 January 4', '0', '-', '-'),
(2525, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 12', '0', '-', '-'),
(2526, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 12', '0', '-', '-'),
(2527, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 12', '0', '-', '-'),
(2528, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 13', '0', '-', '-'),
(2529, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 13', '0', '-', '-'),
(2530, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 13', '0', '-', '-'),
(2531, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 14', '0', '-', '-'),
(2532, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 14', '0', '-', '-'),
(2533, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 14', '0', '-', '-'),
(2534, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 17', '0', '-', '-'),
(2535, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 17', '0', '-', '-'),
(2536, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 17', '0', '-', '-'),
(2537, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 18', '0', '-', '-'),
(2538, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 18', '0', '-', '-'),
(2539, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 18', '0', '-', '-'),
(2540, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 19', '0', '-', '-'),
(2541, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 19', '0', '-', '-'),
(2542, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 19', '0', '-', '-'),
(2543, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 20', '0', '-', '-'),
(2544, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 20', '0', '-', '-'),
(2545, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 20', '0', '-', '-'),
(2546, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 21', '0', '-', '-'),
(2547, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 21', '0', '-', '-'),
(2548, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 21', '0', '-', '-'),
(2549, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 24', '0', '-', '-'),
(2550, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 24', '0', '-', '-'),
(2551, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 24', '0', '-', '-'),
(2552, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 25', '0', '-', '-'),
(2553, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 25', '0', '-', '-'),
(2554, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 25', '0', '-', '-'),
(2555, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 26', '0', '-', '-'),
(2556, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 26', '0', '-', '-'),
(2557, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '1911111', '2021 May 26', '0', '-', '-'),
(2588, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 12', '0', '-', '-'),
(2589, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 12', '0', '-', '-'),
(2590, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 12', '0', '-', '-'),
(2591, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 13', '0', '-', '-'),
(2592, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 13', '0', '-', '-'),
(2593, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 13', '0', '-', '-'),
(2594, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 14', '0', '-', '-'),
(2595, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 14', '0', '-', '-'),
(2596, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 14', '0', '-', '-'),
(2597, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 17', '0', '-', '-'),
(2598, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 17', '0', '-', '-'),
(2599, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 17', '0', '-', '-'),
(2600, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 18', '0', '-', '-'),
(2601, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 18', '0', '-', '-'),
(2602, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 18', '0', '-', '-'),
(2603, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 19', '0', '-', '-'),
(2604, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 19', '0', '-', '-'),
(2605, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 19', '0', '-', '-'),
(2606, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 20', '0', '-', '-'),
(2607, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 20', '0', '-', '-'),
(2608, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 20', '0', '-', '-'),
(2609, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 21', '0', '-', '-'),
(2610, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 21', '0', '-', '-'),
(2611, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 21', '0', '-', '-'),
(2612, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 24', '0', '-', '-'),
(2613, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 24', '0', '-', '-'),
(2614, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 24', '0', '-', '-'),
(2615, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 25', '0', '-', '-'),
(2616, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 25', '0', '-', '-'),
(2617, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 25', '0', '-', '-'),
(2618, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 26', '0', '-', '-'),
(2619, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 26', '0', '-', '-'),
(2620, '22', '8ec43dbc004cbb5128d52548a6f58ee2', '35673', '2021 May 26', '0', '-', '-'),
(2004, '16', '8424f72d65fd71e8ce0fb35439fa2499', '191015', '2021 January 7', '0', '-', '-'),
(2003, '16', '1', '1915', '2021 January 7', '0', '-', '-'),
(2002, '16', '8424f72d65fd71e8ce0fb35439fa2499', '191015', '2021 January 6', '0', '-', '-'),
(2001, '16', '1', '1915', '2021 January 6', '0', '-', '-'),
(1999, '16', '1', '1915', '2021 January 5', '0', '-', '-'),
(2000, '16', '8424f72d65fd71e8ce0fb35439fa2499', '191015', '2021 January 5', '0', '-', '-'),
(1995, '16', '1', '1915', '2021 January 1', '0', '-', '-'),
(1996, '16', '8424f72d65fd71e8ce0fb35439fa2499', '191015', '2021 January 1', '0', '-', '-'),
(1997, '16', '1', '1915', '2021 January 4', '0', '-', '-'),
(1998, '16', '8424f72d65fd71e8ce0fb35439fa2499', '191015', '2021 January 4', '0', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nameOfSchool` varchar(1000) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `accStatus` varchar(10) NOT NULL,
  `dateRegistered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `headName` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `headEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `nameOfSchool`, `picture`, `email`, `phone`, `userName`, `password`, `type`, `address`, `accStatus`, `dateRegistered`, `headName`, `gender`, `headEmail`) VALUES
(8, 'Nyatsime College', 'photo3.jpg', 'thetakudzwagozo@gmail.com', '0785991512', 't.gozo19', '61bbbb337a271c31c223d0fa12af4f08', 'Secondary', '1432 Granary Estate Park', '0', '2021-05-11 22:11:43', 'Takudzwa Gozo', 'male', 'thetakudzwagozo@gmail.com'),
(16, 'New School', 'photo3.jpg', 'h190141t@hit.ac.zw', '0785991512', 't.gozo1910', '61bbbb337a271c31c223d0fa12af4f08', 'Secondary', '1432 Granary Estate Park', '0', '2021-05-21 16:21:59', 'Mr Gozo', 'male', 'h190141t@hit.ac.zw'),
(17, 'Priiiiiiiiiiii', 'photo3.jpg', 'H190669W@hit.ac.zw', '07859915120', 't.gozo19100', '61bbbb337a271c31c223d0fa12af4f08', 'Primary', '1432 Granary Estate Park', '0', '2021-05-22 17:09:34', 'Takudzwa Gozob', 'Mr', 'h190141t@hit.ac.zwb'),
(20, 'I am New', 'photo3.jpg', 'thetakudzwagozo@gmail.comm', '0785991512', 'new', '61bbbb337a271c31c223d0fa12af4f08', 'Secondary', '1432 Granary Estate Park', '0', '2021-05-23 12:20:59', 'Takudzwa Gozo', 'Mr', 'thetakudzwagozo@gmail.com'),
(21, 'I am New', 'photo3.jpg', 'thetakudzwagozo@gmail.comnm', '0785991512', 'neww', 'cd233c31671c99060a43fa0f038ebc23', 'Primary', '1432 Granary Estate Park', '0', '2021-05-23 12:22:17', 'Takudzwa Gozo', 'Mr', 'thetakudzwagozo@gmail.com'),
(22, 'Kuwadzana 1 High School', 'guest-user.jpg', 'tawandazexo@gmail.com', '0785991512', 'tt', '61bbbb337a271c31c223d0fa12af4f08', 'Secondary', '1432 Granary Estate Park', '0', '2021-05-24 16:04:54', 'Takudzwa Gozo', 'Mr', 'thetakudzwagozo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cardNumber` varchar(1000) NOT NULL,
  `studentFromSchool` varchar(1000) NOT NULL,
  `studentFromLevel` varchar(1000) NOT NULL,
  `studentFromClass` varchar(1000) NOT NULL,
  `nameOfStudent` varchar(1000) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `idNumber` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `nextOfKeen` varchar(100) NOT NULL,
  `nextOfKeenNumber` varchar(1000) NOT NULL,
  `relationToNextOfKeen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `cardNumber`, `studentFromSchool`, `studentFromLevel`, `studentFromClass`, `nameOfStudent`, `picture`, `email`, `phoneNumber`, `age`, `gender`, `idNumber`, `address`, `nextOfKeen`, `nextOfKeenNumber`, `relationToNextOfKeen`) VALUES
(1, '1910', '8', '1', '1', 'Takudzwa Gozooooo', 'uy', 'thetakudzwagozo@gmail.com', '785991512', '36558', 'M', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '779922618', 'Son'),
(2, '1911', '8', '1', '1', 'Takudzwa Gozooooo', 'guest-user.jpg', '', '785991513', '36559', 'M', '63-2156646N13', '1433 Granary Estate Park', 'Lungford Gozo', '779922619', 'Son'),
(6, '1915', '16', '1', '1', 'Takudzwa Gozo', 'Untitled1621187397299056763.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '0779922618', 'Son'),
(7, '191015', '16', '304f6006d64fd5ee1985206d59f01270', '8424f72d65fd71e8ce0fb35439fa2499', 'Takudzwa Gozo', '41621609343983639551.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '0779922618', 'Son'),
(8, '6', '16', '304f6006d64fd5ee1985206d59f01270', '8424f72d65fd71e8ce0fb35439fa2499', 'Takudzwa Gozo', 'localhost_19006_1621695205867488071.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '0779922618', 'Son'),
(9, '6', '16', '304f6006d64fd5ee1985206d59f01270', '8424f72d65fd71e8ce0fb35439fa2499', 'Takudzwa Gozo', 'localhost_19006_16216953921007692051.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '', 'Lungford Gozo', '0779922618', 'Son'),
(10, '1911111', '22', 'cb91174ea21ed9de7f451bc28abd4f0a', '8ec43dbc004cbb5128d52548a6f58ee2', 'Takudzwa Gozo', 'mp1621865506572735709.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '0779922618', 'Son'),
(11, '1911111', '22', 'cb91174ea21ed9de7f451bc28abd4f0a', '8ec43dbc004cbb5128d52548a6f58ee2', 'Takudzwa Gozo', 'mp1621865576303693535.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '0779922618', 'Son'),
(12, '1911111', '22', 'cb91174ea21ed9de7f451bc28abd4f0a', '8ec43dbc004cbb5128d52548a6f58ee2', 'Takudzwa Gozo', 'mp16218655791393625094.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '0779922618', 'Son'),
(59, '35673', '22', 'cb91174ea21ed9de7f451bc28abd4f0a', '8ec43dbc004cbb5128d52548a6f58ee2', 'Takudzwa Gozo', 'chat-img11622031115979278167.jpg', 'thetakudzwagozo@gmail.com', '0785991512', '21', 'male', '63-2156646N12', '1432 Granary Estate Park', 'Lungford Gozo', '0779922618', 'Son'),
(57, '1912', '22', 'cb91174ea21ed9de7f451bc28abd4f0a', '8ec43dbc004cbb5128d52548a6f58ee2', 'Takudzwa Gozo', 'guest-user.jpg', '', '785991514', '36560', 'M', '63-2156646N14', '1434 Granary Estate Park', 'Lungford Gozo', '779922620', 'Son'),
(58, '1913', '22', 'cb91174ea21ed9de7f451bc28abd4f0a', '8ec43dbc004cbb5128d52548a6f58ee2', 'Takudzwa Gozo', 'guest-user.jpg', '', '785991515', '36561', 'M', '63-2156646N15', '1435 Granary Estate Park', 'Lungford Gozo', '779922621', 'Son');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacherFrom` varchar(100) NOT NULL,
  `teacherRef` varchar(100) NOT NULL,
  `idNumber` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `age` varchar(10) NOT NULL,
  `title` varchar(10) NOT NULL,
  `class` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacherFrom`, `teacherRef`, `idNumber`, `name`, `address`, `phoneNumber`, `age`, `title`, `class`, `picture`) VALUES
(1, '8', 'tawanda-bozho', '', 'Tawanda Bozho', '', '', '', '', '', 'photo2.jpg'),
(2, '16', 'takudzwa-gozo', '', 'Takudzwa Gozo', '', '', '', '', '', 'photo1.jpg'),
(6, '22', '355a67ca87647216b17c47d6640435e5', '63-2156646N12', 'New Teacher', ' 1432 Granary Estate Park ', '0785991512', '21', 'Mr', '', 'Untitled16218652681077547854.jpg'),
(5, '16', '407075dcfc6d7355dccc5cf71a989303', '63-2156646N12', 'New Teacher', '    1432 Granary Estate Park    ', '0785991512', '21', 'Mr', 'Second Class', 'localhost_19006_16216781751397115996.jpg'),
(7, '22', '3173ec533918843331ee061fd4279f1e', '63-2156646N12', 'New Teacher', '1432 Granary Estate Park', '0785991512', '21', 'Mr', '', 'Untitled1621865270401186568.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `termFor` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `begins` varchar(100) NOT NULL,
  `ends` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `termFor`, `name`, `year`, `begins`, `ends`) VALUES
(1, '16', 'First Term', '2021', '12 May 2021', '25 May 2021'),
(2, '16', 'First Term', '2021', '12 June 2021', '04 July 2021'),
(4, '16', 'First Term', '2022', '20 May 2021', '24 May 2021'),
(5, '16', 'First Term', '2021', '01 January 2021', '31 December 2021'),
(6, '16', 'First Term', '2021', '01 January 2021', '31 December 2021'),
(7, '16', 'First Term', '2021', '01 January 2021', '31 December 2021'),
(8, '16', 'First Term', '2021', '01 January 2021', '31 December 2021'),
(9, '16', 'First Term', '2021', '01 January 2021', '31 December 2021'),
(10, '16', 'First Term', '2021', '01 January 2021', '21 May 2021'),
(11, '17', 'First Term', '2021', '21 May 2021', '21 May 2021'),
(12, '17', 'First Term', '2020', '12 May 2021', '13 May 2021'),
(13, '22', 'First Term', '2021', '12 May 2021', '26 May 2021');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
