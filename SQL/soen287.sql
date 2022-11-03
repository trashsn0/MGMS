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
DROP PROCEDURE IF EXISTS `CreateCourse`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateCourse` (IN `teacherIdInput` INT, IN `courseNameInput` VARCHAR(255), IN `startDateInput` DATE, IN `endDateInput` DATE)  BEGIN
	INSERT INTO course VALUES(DEFAULT, teacherIdInput, courseNameInput, startDateInput, endDateInput, DEFAULT);
END$$

DROP PROCEDURE IF EXISTS `GetAllTeachers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllTeachers` ()  BEGIN
	SELECT id, firstName, lastName FROM user WHERE accessLevel = 1;
END$$

DROP PROCEDURE IF EXISTS `GetAllUsers`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUsers` ()  BEGIN
	SELECT * FROM user;
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
		INSERT INTO user VALUES(DEFAULT, accessLevelInput, usernameInput, passwordInput, firstNameInput, lastNameInput);
        SET isCreated = TRUE;
    ELSE
		SET isCreated = FALSE;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `teacherId` int(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 == Active\r\n1 == Innactive',
  PRIMARY KEY (`id`),
  KEY `teacherId` (`teacherId`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollment`
--

DROP TABLE IF EXISTS `course_enrollment`;
CREATE TABLE IF NOT EXISTS `course_enrollment` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userid` int(255) NOT NULL,
  `courseId` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseId` (`courseId`),
  KEY `userid` (`userid`)
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
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
