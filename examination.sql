-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 14, 2021 at 11:35 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `eId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `tId` int(11) NOT NULL,
  `subId` int(11) NOT NULL,
  `eName` varchar(44) NOT NULL,
  `totalmark` int(11) NOT NULL DEFAULT '0',
  `flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eId`),
  KEY `tId` (`tId`,`subId`),
  KEY `subId` (`subId`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`eId`, `date`, `startTime`, `endTime`, `tId`, `subId`, `eName`, `totalmark`, `flag`) VALUES
(17, '2020-11-26', '18:59:00', '19:59:00', 4, 2, 'First Exam', 3, 0),
(18, '2020-12-14', '22:17:00', '10:17:00', 4, 2, 'secand', 1, 0),
(19, '2021-10-14', '08:00:00', '19:00:00', 4, 2, 'final', 6, 1),
(21, '2020-11-28', '17:21:00', '18:21:00', 1, 1, 'First Exam', 5, 0),
(34, '2021-09-10', '13:14:00', '22:14:00', 3, 4, 'englishfinal', 2, 1),
(40, '2021-10-05', '11:13:00', '12:13:00', 1, 1, 'e2', 3, 0),
(53, '2021-10-15', '08:47:00', '10:47:00', 1, 1, 'exam10', 4, 0),
(54, '2021-10-22', '10:02:00', '11:02:00', 1, 1, 'exam11', 5, 0),
(56, '2021-10-15', '17:33:00', '20:33:00', 4, 2, 'exam', 0, 0),
(57, '2021-10-23', '14:04:00', '23:00:00', 1, 1, 'test1', 5, 0),
(59, '2021-10-23', '05:09:00', '23:09:00', 1, 1, 'test2', 0, 0),
(60, '2021-10-17', '20:01:00', '22:45:00', 1, 1, 'test3', 0, 0),
(61, '2021-10-17', '07:56:00', '18:56:00', 1, 1, 'test4', 0, 0),
(63, '2021-10-19', '17:02:00', '18:02:00', 1, 1, 'ex', 0, 0),
(67, '2021-10-20', '16:58:00', '23:58:00', 1, 1, 'fruits', 3, 0),
(68, '2021-10-23', '17:00:00', '18:00:00', 1, 1, 'test6', 3, 0),
(70, '2021-10-23', '17:30:50', '17:30:50', 1, 1, 'test7', 0, 0),
(71, '2021-10-23', '17:33:00', '18:33:00', 1, 1, 'test7', 3, 0),
(72, '2021-10-23', '17:37:00', '18:37:00', 1, 1, 'test8', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `eId` int(11) NOT NULL,
  `stuId` int(11) NOT NULL,
  `eMark` float DEFAULT NULL,
  PRIMARY KEY (`eId`,`stuId`),
  KEY `stuId` (`stuId`),
  KEY `eId` (`eId`,`stuId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`eId`, `stuId`, `eMark`) VALUES
(34, 1, 2),
(34, 2, 2),
(34, 3, 2),
(34, 4, 2),
(34, 5, 2),
(34, 6, 2),
(34, 7, 2),
(34, 8, 2),
(34, 9, 2),
(34, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `qText` text NOT NULL,
  `qAnswer` text NOT NULL,
  `qNummark` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  PRIMARY KEY (`qId`),
  KEY `eId` (`eId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qId`, `qText`, `qAnswer`, `qNummark`, `eId`) VALUES
(7, 'define car?', 'a four-wheeled road vehicle that is powered by an engine and is able to carry a small number of people.', 1, 17),
(9, 'define cat?', 'a small domesticated carnivorous mammal with soft fur, a short snout, and retractable claws. It is widely kept as a pet or for catching mice, and many breeds have been developed.', 1, 17),
(10, 'define chair', 'a separate seat for one person, typically with a back and four legs.', 1, 17),
(13, 'define cat?', 'a small domesticated carnivorous mammal with soft fur, a short snout, and retractable claws. It is widely kept as a pet or for catching mice, and many breeds have been developed.', 1, 19),
(14, 'define dog?', 'a domesticated carnivorous mammal that typically has a long snout, an acute sense of smell, non-retractable claws, and a barking, howling, or whining voice.', 1, 19),
(15, 'what are the colors of the rainbow?', 'The seven colors of the rainbow are red, orange, yellow, green, blue, indigo, and violet.', 2, 19),
(16, 'what do the colors of the palestinian flag represent?', 'The flag of Palestine is a tricolor of three equal horizontal stripes (black, white, and green from top to bottom) overlaid by a red triangle issuing from the hoist. This flag is derived from the Pan-Arab colors and is used to represent the State of Palestine and the Palestinian people.', 2, 19),
(19, 'define verb?', 'a word used to describe an action, state, or occurrence, and forming the main part of the predicate of a sentence, such as hear, become, happen.', 1, 18),
(24, 'what is the car?', 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate.', 2, 34),
(28, 'what is snack?', 'A snack is a small portion of food generally eaten between meals. Snacks come in a variety of forms including packaged snack foods and other processed foods, as well as items made from fresh ingredients at home.', 3, 21),
(60, 'q1', 'q1 answer', 1, 40),
(61, 'q2', 'q2 answer', 1, 40),
(62, 'q3', 'q3 answer', 1, 40),
(63, 'q1', 'q1 answer', 1, 21),
(64, 'q2', 'q2 answer', 1, 21),
(79, 'what is the apple?', 'An apple is an edible fruit produced by an apple tree (Malus domestica). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', 2, 53),
(80, 'what is the banana?', 'A banana is an elongated, edible fruit – botanically a berry – produced by several kinds of large herbaceous flowering plants in the genus Musa.', 2, 53),
(81, 'q1', 'q1 answer', 2, 54),
(83, 'q2', 'q2 answer', 2, 54),
(84, 'q3', 'q3 answer', 1, 54),
(85, 'what is the banana?', 'A banana is an elongated, edible fruit – botanically a berry produced by several kinds of large herbaceous flowering plants in the genus Musa.', 2, 57),
(86, 'what is the apple?', 'An apple is an edible fruit produced by an apple tree (Malus domestica). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', 2, 57),
(87, 'what is the milk?', 'Milk is a nutrient-rich liquid food produced by the mammary glands of mammals. It is the primary source of nutrition for young mammals, including breastfed human infants before they are able to digest solid food.', 1, 57),
(88, 'what is the caw?', 'caw', 1, 59),
(90, 'what is the apple?', 'apple.', 1, 67),
(91, 'what is the banana?', 'banana.', 1, 67),
(92, 'what is the melon?', 'melon', 1, 67),
(93, 'q1', 'q1 answer', 1, 68),
(94, 'q2', 'q2 answer', 1, 68),
(95, 'q3', 'q3 answer', 1, 68),
(96, 'q1 ', 'q1 answer', 1, 71),
(97, 'q2', 'q2 answer', 1, 71),
(98, 'q3', 'q3 answer', 1, 71),
(99, 'q1', 'q1 answer', 1, 72);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `eId` int(11) NOT NULL,
  `stuId` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`eId`,`stuId`),
  KEY `eId` (`eId`),
  KEY `stuId` (`stuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`eId`, `stuId`, `status`) VALUES
(19, 1, 1),
(34, 1, 1),
(34, 2, 1),
(34, 3, 1),
(34, 4, 1),
(34, 5, 1),
(34, 6, 1),
(34, 7, 1),
(34, 8, 1),
(34, 9, 1),
(34, 10, 1),
(67, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stuanswers`
--

DROP TABLE IF EXISTS `stuanswers`;
CREATE TABLE IF NOT EXISTS `stuanswers` (
  `stuId` int(11) NOT NULL,
  `qId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `stuAnswer` text,
  `qMark` float DEFAULT NULL,
  PRIMARY KEY (`stuId`,`qId`,`eId`),
  KEY `stuId` (`stuId`,`qId`,`eId`),
  KEY `qId` (`qId`),
  KEY `eId` (`eId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stuanswers`
--

INSERT INTO `stuanswers` (`stuId`, `qId`, `eId`, `stuAnswer`, `qMark`) VALUES
(1, 13, 19, 'a small domesticated carnivorous mammal with soft fur, a short snout, and retractable claws. It is widely kept as a pet or for catching mice, and many breeds have been developed.', 1),
(1, 14, 19, 'a domesticated carnivorous mammal that typically has a long snout, an acute sense of smell, non-retractable claws, and a barking, howling, or whining voice.', 1),
(1, 15, 19, 'The seven colors of the rainbow are red, orange, yellow, green, blue, indigo, and violet.', 2),
(1, 16, 19, 'The flag of Palestine is derived from the Pan-Arab flag, so that flag provided the Palestine flag meaning. The red section represents Khawarij movement, the black stripe stands for Muhammad at the Rashidun Caliphate, the white stands for the Ummayad Caliphate, and the green stripe represents the Fatimid Caliphate.', 1),
(1, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(2, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(3, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(4, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(4, 88, 59, '', NULL),
(5, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(6, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(6, 85, 57, '', NULL),
(6, 86, 57, '', NULL),
(6, 90, 67, 'apple', NULL),
(6, 91, 67, 'banana', NULL),
(6, 92, 67, 'melon', NULL),
(7, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(8, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(9, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2),
(10, 24, 34, 'The Car is a 1977 American horror film[2][3] directed by Elliot Silverstein and written by Michael Butler, Dennis Shryack and Lane Slate. ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `stuId` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(44) NOT NULL,
  `lName` varchar(44) NOT NULL,
  `stuUsername` varchar(44) NOT NULL,
  `stuPassword` varchar(44) NOT NULL,
  PRIMARY KEY (`stuId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stuId`, `fName`, `lName`, `stuUsername`, `stuPassword`) VALUES
(1, 'Maryam', 'Ali', 'm.h.ali', '123'),
(2, 'Ali', 'Mohammed', 'a.m.mohammed', '123'),
(3, 'Zina', 'Ali', 'z.a.ali', '123'),
(4, 'Abeer', 'Mohammed', 'a.r.mohammed', '123'),
(5, 'Amir', 'Ibrahim', 'a.b.ibrahim', '123'),
(6, 'Abbas', 'Hussam', 'a.r.hussam', '123'),
(7, 'Waleed', 'Adnan', 'w.g.adnan', '123'),
(8, 'Laila', 'Salem', 'l.s.salem', '123'),
(9, 'Reem', 'Alaa', 'r.a.alaa', '123'),
(10, 'Hadeel', 'Omar', 'h.m.omar', '123');

-- --------------------------------------------------------

--
-- Table structure for table `stusubjects`
--

DROP TABLE IF EXISTS `stusubjects`;
CREATE TABLE IF NOT EXISTS `stusubjects` (
  `stuId` int(11) NOT NULL,
  `subId` int(11) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`),
  KEY `stuId` (`stuId`),
  KEY `subId` (`subId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stusubjects`
--

INSERT INTO `stusubjects` (`stuId`, `subId`, `Id`) VALUES
(9, 2, 1),
(9, 3, 2),
(9, 4, 3),
(8, 3, 4),
(8, 4, 5),
(7, 2, 6),
(7, 4, 7),
(6, 1, 8),
(6, 3, 9),
(6, 4, 10),
(5, 1, 11),
(5, 3, 12),
(5, 4, 13),
(4, 1, 14),
(4, 3, 15),
(4, 4, 16),
(3, 4, 17),
(3, 2, 18),
(10, 4, 19),
(10, 3, 20),
(1, 2, 21),
(1, 3, 22),
(1, 4, 23),
(2, 4, 24),
(2, 2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subId` int(11) NOT NULL AUTO_INCREMENT,
  `subName` varchar(44) NOT NULL,
  `tId` int(11) NOT NULL,
  PRIMARY KEY (`subId`),
  KEY `tId` (`tId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subId`, `subName`, `tId`) VALUES
(1, 'English 1', 1),
(2, 'English 2', 4),
(3, 'Palestinian Issue', 2),
(4, 'Database', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `tId` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(44) NOT NULL,
  `lName` varchar(44) NOT NULL,
  `tUsername` varchar(44) NOT NULL,
  `tPassword` varchar(44) NOT NULL,
  PRIMARY KEY (`tId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tId`, `fName`, `lName`, `tUsername`, `tPassword`) VALUES
(1, 'Abdullah', 'Ibrahim', 'a.a.ibrahim', '123'),
(2, 'Anwar', 'Hussam', 'a.h.hussam', '123'),
(3, 'Sabrin', 'Mohammed', 's.a.mohammed', '123'),
(4, 'Ahmad', 'Ali', 'a.k.ali', '123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`tId`) REFERENCES `teachers` (`tId`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`subId`) REFERENCES `subjects` (`subId`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`eId`) REFERENCES `exams` (`eId`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`stuId`) REFERENCES `students` (`stuId`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`eId`) REFERENCES `exams` (`eId`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`eId`) REFERENCES `exams` (`eId`),
  ADD CONSTRAINT `states_ibfk_2` FOREIGN KEY (`stuId`) REFERENCES `students` (`stuId`);

--
-- Constraints for table `stuanswers`
--
ALTER TABLE `stuanswers`
  ADD CONSTRAINT `stuanswers_ibfk_1` FOREIGN KEY (`stuId`) REFERENCES `students` (`stuId`),
  ADD CONSTRAINT `stuanswers_ibfk_2` FOREIGN KEY (`qId`) REFERENCES `questions` (`qId`),
  ADD CONSTRAINT `stuanswers_ibfk_3` FOREIGN KEY (`eId`) REFERENCES `exams` (`eId`);

--
-- Constraints for table `stusubjects`
--
ALTER TABLE `stusubjects`
  ADD CONSTRAINT `stusubjects_ibfk_1` FOREIGN KEY (`stuId`) REFERENCES `students` (`stuId`),
  ADD CONSTRAINT `stusubjects_ibfk_2` FOREIGN KEY (`subId`) REFERENCES `subjects` (`subId`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`tId`) REFERENCES `teachers` (`tId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
