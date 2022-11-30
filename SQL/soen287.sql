-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2022 at 06:54 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

CREATE DATABASE IF NOT EXISTS `soen287` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `soen287`;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soen287`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `ChangePassword`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ChangePassword` (IN `userIdInput` INT, IN `passwordInput` VARCHAR(255))  BEGIN
	UPDATE user SET password = passwordInput WHERE id = userIdInput;
END$$

DROP PROCEDURE IF EXISTS `CreateAssessment`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateAssessment` (IN `nameInput` VARCHAR(255), IN `weightInput` INT, IN `numberOfQuestionsInput` INT, IN `dueDateInput` DATE, OUT `isCreated` BOOLEAN)  BEGIN
	IF NOT EXISTS(SELECT * FROM `assessments` WHERE name = nameInput) THEN
		INSERT INTO assessments VALUES(NULL, nameInput, weightInput, numberOfQuestionsInput, dueDateInput);
        SET isCreated = TRUE;
    ELSE
		SET isCreated = FALSE;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `CreateOrUpdateGrade`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateOrUpdateGrade` (IN `studentIdInput` INT, IN `assessmentIdInput` INT, IN `questionNumberInput` INT, IN `gradeInput` INT, OUT `isUpdated` BOOLEAN)  BEGIN

	# Set to false by default
	SET isUpdated = FALSE;
    
	IF EXISTS(SELECT * FROM `questions` WHERE assessmentId  = assessmentIdInput AND userId = studentIdInput AND questionNumber = questionNumberInput) THEN
		UPDATE `questions`
        SET grade = gradeInput
        WHERE assessmentId  = assessmentIdInput AND userId = studentIdInput AND questionNumber = questionNumberInput;
        SET isUpdated = TRUE;
    ELSE
		INSERT INTO `questions` VALUES(NULL, assessmentIdInput, studentIdInput, questionNumberInput, gradeInput);
        SET isUpdated = TRUE;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `GetAllAssessments`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllAssessments` ()  BEGIN
	SELECT * FROM assessments
    ORDER BY dueDate ASC;
END$$

DROP PROCEDURE IF EXISTS `GetAllQuestionsByUserId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllQuestionsByUserId` (IN `userIdInput` INT)  BEGIN
	SELECT * FROM questions WHERE userId = userIdInput
    ORDER BY assessmentId , questionNumber;
END$$

DROP PROCEDURE IF EXISTS `GetAllQuestionsByUserIdAndAssessmentId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllQuestionsByUserIdAndAssessmentId` (IN `userIdInput` INT, IN `assessmentIdInput` INT)  BEGIN
	SELECT * FROM questions WHERE userID = userIdInput AND assessmentId = assessmentIdInput
    ORDER BY questionNumber;
END$$

DROP PROCEDURE IF EXISTS `GetAllStudents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllStudents` ()  BEGIN
	SELECT id, firstName, lastName FROM user WHERE accessLevel = 0
    ORDER BY id;
END$$

DROP PROCEDURE IF EXISTS `GetAllTeachers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllTeachers` ()  BEGIN
	SELECT id, firstName, lastName FROM user WHERE accessLevel = 1;
END$$

DROP PROCEDURE IF EXISTS `GetAllUsers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUsers` ()  BEGIN
	SELECT * FROM user;
END$$

DROP PROCEDURE IF EXISTS `GetNumberOfQuestions`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetNumberOfQuestions` (IN `assessmentIdInput` INT)  BEGIN
	SELECT numberOfQuestions FROM assessments WHERE id = assessmentIdInput;
END$$

DROP PROCEDURE IF EXISTS `GetUserById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserById` (IN `userId` INT(255))  BEGIN
	SELECT * FROM `user` WHERE id = userId;
END$$

DROP PROCEDURE IF EXISTS `GetUserByUsername`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUserByUsername` (IN `usernameInput` VARCHAR(255))  BEGIN
	SELECT * FROM `user` WHERE username = usernameInput;
END$$

DROP PROCEDURE IF EXISTS `RegisterUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegisterUser` (IN `accessLevelInput` INT(255), IN `usernameInput` VARCHAR(255), IN `passwordInput` VARCHAR(255), IN `firstNameInput` VARCHAR(255), IN `lastNameInput` VARCHAR(255), OUT `isCreated` BOOLEAN)  BEGIN
	IF NOT EXISTS(SELECT * FROM `user` WHERE username = usernameInput) THEN
		INSERT INTO user VALUES(NULL, accessLevelInput, usernameInput, passwordInput, firstNameInput, lastNameInput);
        SET isCreated = TRUE;
    ELSE
		SET isCreated = FALSE;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `UpdateUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUser` (IN `userIdInput` INT, IN `usernameInput` VARCHAR(255), IN `firstNameInput` VARCHAR(255), IN `lastNameInput` VARCHAR(255), OUT `isUpdated` BOOLEAN)  BEGIN
	IF NOT EXISTS(SELECT * FROM `user` WHERE username = usernameInput) THEN
		UPDATE user SET username = usernameInput, firstName = firstNameInput, lastName = lastNameInput WHERE id = userIdInput;
        SET isUpdated = TRUE;
    ELSE
		SET isUpdated = FALSE;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

DROP TABLE IF EXISTS `assessments`;
CREATE TABLE IF NOT EXISTS `assessments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `numberOfQuestions` int(11) NOT NULL,
  `dueDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessmentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `questionNumber` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assessmentId` (`assessmentId`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `accessLevel` int(255) NOT NULL DEFAULT '0' COMMENT '0 == Student\r\n1 == Teacher',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;