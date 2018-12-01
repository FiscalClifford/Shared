-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Nov 27, 2018 at 01:36 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_gilesbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

DROP TABLE IF EXISTS `Author`;
CREATE TABLE `Author` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Info` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`ID`, `Name`, `Info`) VALUES
(7, 'JK Rowling', 'no info given yet'),
(8, 'bobby', 'no info given yet'),
(9, 'fred', 'no info given yet'),
(10, 'Harold Grundlesnak', 'no info given yet'),
(11, 'Larry King', 'no info given yet'),
(12, 'Grad Student with no credentials', 'no info given yet'),
(13, 'testauthor', 'no info given yet'),
(14, 'Billy Esquire', 'no info given yet'),
(15, 'Freddy Mercury', 'no info given yet'),
(16, 'Brennan Giles', 'no info given yet'),
(17, 'Brennan Giles', 'no info given yet'),
(18, 'Broseph Broheim', 'no info given yet'),
(19, 'Lizardman Larry', 'no info given yet'),
(20, 'Chuck Norris', 'no info given yet'),
(21, 'Lonely Housewife', 'no info given yet'),
(22, 'Lonely Housewife', 'no info given yet'),
(23, 'Hotlinebling', 'no info given yet'),
(24, 'hotlinebling', 'no info given yet'),
(25, 'Drake', 'no info given yet'),
(26, 'Drake', 'no info given yet'),
(27, 'devil', 'no info given yet'),
(28, '', 'no info given yet'),
(29, 'devil', 'no info given yet');

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

DROP TABLE IF EXISTS `Book`;
CREATE TABLE `Book` (
  `ID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Topic` varchar(100) NOT NULL,
  `Seller` varchar(200) NOT NULL,
  `SellLocation` int(11) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`ID`, `Title`, `Topic`, `Seller`, `SellLocation`, `Price`) VALUES
(21, 'Harry Potter', 'fantasy', 'brennan', 1, 43),
(23, 'test', 'Science', 'brennan', 1, 5),
(24, 'Life of Pie', 'Cooking', 'sarah', 2, 101),
(25, 'Bob Barker: unsung hero', 'fiction', 'sarah', 2, 333),
(26, 'Required Textbook', 'Math', 'sarah', 2, 500),
(28, 'TA Test 1', 'Science', 'forTA', 1, 20),
(29, 'TA Test 2', 'Music', 'forTA', 1, 99),
(31, 'TA Test 3', 'How to build a website ', 'forTA', 1, 1),
(32, 'Big Book Bro', 'Lifting 101', 'BookSeller99', 3, 42),
(33, 'Godzilla Attacks', 'Drama', 'BookSeller99', 3, 99),
(34, 'How to Be Fun', 'Life Improvement', 'FunGuy', 2, 15),
(40, 'How to Dance like a BOSS 2: The Dance-pocalypse', 'Life Improvement', 'drake', 3, 150),
(43, 'human centipede', 'satan', 'Chivo', 3, 666);

-- --------------------------------------------------------

--
-- Table structure for table `BookAuth`
--

DROP TABLE IF EXISTS `BookAuth`;
CREATE TABLE `BookAuth` (
  `BookID` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BookAuth`
--

INSERT INTO `BookAuth` (`BookID`, `AuthorID`) VALUES
(21, 7),
(23, 9),
(24, 10),
(25, 11),
(26, 12),
(28, 14),
(29, 15),
(31, 17),
(32, 18),
(33, 19),
(34, 20),
(40, 26),
(43, 29);

-- --------------------------------------------------------

--
-- Table structure for table `Place`
--

DROP TABLE IF EXISTS `Place`;
CREATE TABLE `Place` (
  `LocationID` int(11) NOT NULL,
  `Location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Place`
--

INSERT INTO `Place` (`LocationID`, `Location`) VALUES
(1, 'Corvallis'),
(2, 'Portland'),
(3, 'Hollywood');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Username`, `Password`, `Location`) VALUES
('Ashleylynn26', '$2y$10$nfTmo2SrZ0oRoT7qW5I9o.Zw/c4JB/DAKiRGh72OZFTaHWzW6c/1m', 2),
('bigbuttmcgee', '$2y$10$QQCf8PENLL6HtNuVh8O9KeOB4rMqUP.Pt5wQlqzTYFkF9fdZRYPE2', 1),
('BookSeller99', '$2y$10$YwHSjz7QB6TL4tpNE2oYXul84lOlDsw6jrqsFLRTNIdCSaAods6v.', 3),
('Brennan', '$2y$10$XukVstjpd8O9u7a3QZRiYuv/Gxso7pV2vOpgg2h/Af41OusveR6pu', 1),
('Chivo', '$2y$10$fkku8tER3edexscP0GkuXOXAJul7RkflVagFU7b7sqXwTRRxJJaRK', 3),
('Drake', '$2y$10$ChPOCSbyMZxN/fTdFrx0G.BEFvwCauyHnOtxbBj4BkpmFsBwuQfwi', 3),
('forTA', '$2y$10$WwWkBg2px/aMIesRLazZOO9Wfd0sQ8kOZU..K61aY2k0XZmbu7oHm', 2),
('FunGuy', '$2y$10$mjH.l6V..EgOFgK0u89rnuh5MGVSfK33icqhOO3prXIxF8fQokAI6', 2),
('meghasin', '$2y$10$CZvsQLl7uT8qR.uy0BwRmuJoaQZpG2arDybLPUHlKR2YYluTI9wQC', 1),
('Sarah', '$2y$10$hK.SO9KlxIz6MnA4OYrZq.6L1pj7x4LQ98kzxJSbYr2O3H2WLw4qy', 2),
('Tgiles', '$2y$10$W3J8LSmzCVDkaMX2kc7jbeBD9EwsvSKqd.oPHRBtN2MFhGnXhPj7q', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Book_ibfk_1` (`Seller`),
  ADD KEY `Book_ibfk_2` (`SellLocation`);

--
-- Indexes for table `BookAuth`
--
ALTER TABLE `BookAuth`
  ADD PRIMARY KEY (`BookID`,`AuthorID`),
  ADD KEY `BookAuth_ibfk_1` (`AuthorID`);

--
-- Indexes for table `Place`
--
ALTER TABLE `Place`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Location` (`Location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `Book_ibfk_1` FOREIGN KEY (`Seller`) REFERENCES `User` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Book_ibfk_2` FOREIGN KEY (`SellLocation`) REFERENCES `Place` (`LocationID`) ON UPDATE CASCADE;

--
-- Constraints for table `BookAuth`
--
ALTER TABLE `BookAuth`
  ADD CONSTRAINT `BookAuth_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `Author` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BookAuth_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `Book` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`Location`) REFERENCES `Place` (`LocationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
