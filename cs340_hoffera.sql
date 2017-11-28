-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Nov 27, 2017 at 09:58 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_hoffera`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `ClassClassifier` (OUT `CountDifficultClasses` INT, OUT `CountEasyClasses` INT)  BEGIN 
declare aver int;
SELECT AVG(Difficulty) into aver from CourseStatsFinal;
SELECT COUNT(*) into CountDifficultClasses FROM CourseStatsFinal WHERE Difficulty >= aver;
SELECT COUNT(*) into CountEasyClasses FROM CourseStatsFinal WHERE Difficulty < aver;
END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `ClassHard` (IN `Coursetitle` VARCHAR(20), OUT `IsClassHard` BOOLEAN)  BEGIN 

declare averForClass int;
declare totalaver int;

SELECT AVG(Difficulty) into averForClass from CourseStatsFinal WHERE Course_Title = Coursetitle;
SELECT AVG(Difficulty) into totalaver from CourseStatsFinal;

if ( averForClass > totalaver ) then
	set IsClassHard = TRUE;
    
else 
	set IsClassHard = FALSE;
end if;

END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `ClassHard1` (IN `Coursetitle` VARCHAR(20), OUT `IsClassHard` INT)  BEGIN 
declare averForClass int; 
declare totalaver int; 
SELECT AVG(Difficulty) into averForClass from CourseStatsFinal WHERE Course_Title = Coursetitle; 
SELECT AVG(Difficulty) into totalaver from CourseStatsFinal; 
if ( averForClass > totalaver ) then set IsClassHard = 1; else set IsClassHard = 0; 
end if; 
END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `ClassHard2` (IN `Coursetitle` VARCHAR(20), OUT `IsClassHard` INTEGER)  BEGIN 
declare averForClass float; 
declare totalaver float; 
SELECT AVG(Difficulty) into averForClass from CourseStatsFinal WHERE Course_Title = Coursetitle; 
SELECT AVG(Difficulty) into totalaver from CourseStatsFinal; 

if ( averForClass > totalaver ) then set IsClassHard = 1; 
else set IsClassHard = 0; 
end if; 

END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `ClassHardClassifier` (IN `Coursetitle` VARCHAR(20), OUT `IsClassHard` BOOLEAN)  BEGIN 
declare averForClass float; 
declare totalaver float; 

SET averForClass = (SELECT AVG(Difficulty) from CourseStatsFinal WHERE Course_Title = Coursetitle); 
SET totalaver = (SELECT AVG(Difficulty) from CourseStatsFinal); 

if ( averForClass > totalaver ) 
then set IsClassHard = TRUE; 

else 
set IsClassHard = FALSE; 

end if; 
END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `classify` (IN `useremail` VARCHAR(20), IN `coursetitle` VARCHAR(20), IN `difficulty` INT, OUT `CountDifficultClasses` INT, OUT `CountEasyClasses` INT)  BEGIN
    select count(*) into CountDifficultClasses from CourseStatsFinal where Difficulty >= 3;
    select count(*) into CountEasyClasses from CourseStatsFinal where Difficulty < 3;
    
END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `easyAndHardClasses` (OUT `CountDifficultClasses` INT, OUT `CountEasyClasses` INT)  BEGIN 
select count(*) into CountDifficultClasses from CourseStatsFinal where Difficulty >= 3;
select count(*) into CountEasyClasses from CourseStatsFinal where Difficulty < 3; 
END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `simpleproc` (OUT `param1` INT)  BEGIN
    SELECT COUNT(*) FROM User_Email;
END$$

CREATE DEFINER=`cs340_hoffera`@`%` PROCEDURE `WhichClassesEasyWhichHard` (OUT `CountDifficultClasses` INT, OUT `CountEasyClasses` INT)  BEGIN 

select AVG(Difficulty) as Hard into CountDifficultClasses from CourseStatsFinal where Hard >= 3; 
select AVG(Difficulty) as Easy into CountEasyClasses from CourseStatsFinal where Easy < 3; 

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `CommentFinal`
--

CREATE TABLE `CommentFinal` (
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `User_Email` varchar(100) NOT NULL,
  `Message_Content` text NOT NULL,
  `Course_Title` varchar(100) NOT NULL,
  `Associated_DB_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CommentFinal`
--

INSERT INTO `CommentFinal` (`Timestamp`, `User_Email`, `Message_Content`, `Course_Title`, `Associated_DB_ID`) VALUES
('2017-11-08 05:52:16', 'DragonMiny', 'hi', 'Computer architecture & assembly language', 2),
('2017-11-08 05:52:28', 'fakeuser2', 'hi', 'Database management systems', 3),
('2017-11-08 05:52:44', 'fakeuser3', 'hi', 'Data structures', 4),
('2017-11-08 05:52:57', 'fakeuser4', 'hi', 'Discrete structures', 5),
('2017-11-08 05:53:12', 'fakeuser@gmail.com', 'hi', 'Introduction to computer networks', 6),
('2017-11-08 06:00:00', 'MarcelProust', 'hi4', 'Introduction to databases', 7),
('2017-11-08 06:00:14', 'GlennCraig', 'hi5', 'Introduction to usability engineering', 8),
('2017-11-08 06:00:37', 'VictorHugo', 'hi', 'Operating systems', 10),
('2017-11-08 06:01:03', 'MarcelProust', 'tree', 'Programming I', 11),
('2017-11-08 06:01:18', 'MarcelProust', 'proust', 'Software engineering I', 13),
('2017-11-08 06:01:34', 'CGJung', 'jung', 'Programming II', 12),
('2017-11-08 06:01:48', 'MarcelProust', 'mp', 'Software engineering II', 14),
('2017-11-08 06:02:14', 'GlennCraig', 'hi', 'Mobile & cloud software development', 9),
('2017-11-08 06:02:38', 'MarcelProust', 'web dev', 'Web development', 15),
('2017-11-08 08:00:00', 'CGJung', 'Hi from Algorithms DB.', 'Analysis of algorithms', 1),
('2017-11-09 05:21:43', 'DragonMiny', 'Dragon Miny again.', 'Computer architecture & assembly language', 2),
('2017-11-09 05:22:02', 'DragonMiny', 'Dragonminy here', 'Data structures', 4),
('2017-11-09 05:22:23', 'DragonMiny', 'dragonminy here too', 'Database management systems', 3),
('2017-11-09 05:22:32', 'DragonMiny', 'Dragon miny here too', 'Discrete structures', 5),
('2017-11-09 05:22:44', 'DragonMiny', 'dragon miny here too', 'Introduction to computer networks', 6),
('2017-11-09 05:23:03', 'DragonMiny', 'Marcel proust\'s friend is here', 'Introduction to databases', 7),
('2017-11-09 05:23:11', 'DragonMiny', 'here too', 'Introduction to usability engineering', 8),
('2017-11-09 05:23:18', 'DragonMiny', 'here too', 'Mobile & cloud software development', 9),
('2017-11-09 05:23:27', 'DragonMiny', 'here too', 'Operating systems', 10),
('2017-11-09 05:23:37', 'DragonMiny', 'here too', 'Programming I', 11),
('2017-11-09 05:23:46', 'DragonMiny', 'here too', 'Programming II', 12),
('2017-11-09 05:24:02', 'DragonMiny', 'i took this', 'Software engineering I', 13),
('2017-11-09 05:24:11', 'DragonMiny', 'here too', 'Software engineering II', 14),
('2017-11-09 05:24:18', 'DragonMiny', 'here too', 'Web development', 15),
('2017-11-09 17:05:50', 'DragonMiny', 'dm', 'Analysis of algorithms', 1),
('2017-11-09 23:06:29', 'hoffera@oregonstate.edu', 'Posting here', 'Analysis of algorithms', 1),
('2017-11-09 23:08:02', 'hoffera@oregonstate.edu', 'Hellllllooooooooo', 'Data structures', 4),
('2017-11-09 23:11:08', 'fakeguy2', 'This one\'s hard!!!!', 'Analysis of algorithms', 1),
('2017-11-10 21:39:37', 'LastFakeGuy', 'Agree with fakeguy2', 'Analysis of algorithms', 1),
('2017-11-28 04:43:32', 'example', 'Wow this was a really tough course', 'Data structures', 4),
('2017-11-28 04:43:47', 'example', 'How do I log off? Help???', 'Operating systems', 10),
('2017-11-28 04:44:25', 'example', 'Anyone else catch the season finale of stranger things?', 'Web development', 15);

-- --------------------------------------------------------

--
-- Table structure for table `CourseFinal`
--

CREATE TABLE `CourseFinal` (
  `Title` varchar(100) NOT NULL,
  `Code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CourseFinal`
--

INSERT INTO `CourseFinal` (`Title`, `Code`) VALUES
('Programming I', 'CS161'),
('Programming II', 'CS162'),
('Discrete structures', 'CS225'),
('Data structures', 'CS261'),
('Computer architecture & assembly language', 'CS271'),
('Web development', 'CS290'),
('Analysis of algorithms', 'CS325'),
('Introduction to databases', 'CS340'),
('Operating systems', 'CS344'),
('Introduction to usability engineering', 'CS352'),
('Software engineering I', 'CS361'),
('Software engineering II', 'CS362'),
('Introduction to computer networks', 'CS372'),
('Database management systems', 'CS440'),
('Mobile & cloud software development', 'CS496');

-- --------------------------------------------------------

--
-- Table structure for table `CourseStatsFinal`
--

CREATE TABLE `CourseStatsFinal` (
  `User_Email` varchar(100) NOT NULL,
  `Course_Title` varchar(100) NOT NULL,
  `Difficulty` int(5) DEFAULT NULL,
  `Quality` int(5) DEFAULT NULL,
  `Dependence` int(5) DEFAULT NULL,
  `Classification` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CourseStatsFinal`
--

INSERT INTO `CourseStatsFinal` (`User_Email`, `Course_Title`, `Difficulty`, `Quality`, `Dependence`, `Classification`) VALUES
('bs', 'Analysis of algorithms', 5, 0, 0, 'Hard'),
('CGJung', 'Analysis of algorithms', 5, 5, 4, 'Hard'),
('DragonMiny', 'Analysis of algorithms', 4, 5, 5, 'Hard'),
('DragonMiny', 'Computer architecture & assembly language', 5, 5, 0, 'Hard'),
('DragonMiny', 'Introduction to computer networks', 2, 2, 2, 'Easy'),
('DragonMiny', 'Mobile & cloud software development', 0, 0, 0, 'Easy'),
('DragonMiny', 'Operating systems', 5, 0, 0, 'Hard'),
('DragonMiny', 'Programming I', 2, 3, 0, 'Easy'),
('DragonMiny', 'Programming II', 5, 1, 5, 'Hard'),
('DragonMiny', 'Web development', 1, 3, 1, 'Easy'),
('DragonMiny50', 'Analysis of algorithms', 5, 0, 0, 'Hard'),
('example', 'Analysis of algorithms', 5, 1, 3, 'Hard'),
('example', 'Data structures', 4, 5, 4, 'Hard'),
('example', 'Software engineering I', 2, 2, 3, 'Easy'),
('fakeguy1', 'Analysis of algorithms', 5, 4, 5, 'Hard'),
('fakeguy1', 'Database management systems', 2, 3, 4, 'Easy'),
('fakeguy1', 'Web development', 2, 3, 0, 'Easy'),
('fakeguy2', 'Analysis of algorithms', 5, 4, 5, 'Hard'),
('fakeguy2', 'Computer architecture & assembly language', 5, 2, 0, 'Hard'),
('fakeguy2', 'Database management systems', 1, 3, 4, 'Easy'),
('fakeguy2', 'Operating systems', 4, 4, 4, 'Hard'),
('fakeguy2', 'Programming I', 3, 3, 1, 'Easy'),
('fakeguy2', 'Programming II', 5, 0, 5, 'Hard'),
('fakeguy2', 'Web development', 2, 5, 0, 'Easy'),
('fakeuser2', 'Database management systems', 2, 3, 5, 'Easy'),
('GlennCraig', 'Discrete structures', 4, 4, 4, 'Hard'),
('hoffera@oregonstate.edu', 'Analysis of algorithms', 5, 5, 5, 'Hard'),
('hoffera@oregonstate.edu', 'Mobile & cloud software development', 5, 5, 5, 'Easy'),
('hoffera@oregonstate.edu', 'Operating systems', 5, 5, 5, 'Hard'),
('hoffera@oregonstate.edu', 'Web development', 0, 0, 0, 'Easy'),
('lamarcusaldridge@gmail.com', 'Web development', 0, 3, 3, 'Easy'),
('LastFakeGuy', 'Analysis of algorithms', 0, 0, 0, 'Hard'),
('LastFakeGuy', 'Computer architecture & assembly language', 5, 1, 0, 'Hard'),
('LastFakeGuy', 'Data structures', 5, 5, 5, 'Hard'),
('LastFakeGuy', 'Programming II', 4, 5, 5, 'Hard'),
('MarcelProust', 'Data structures', 4, 1, 0, 'Hard'),
('MarcelProust', 'Introduction to computer networks', 2, 3, 1, 'Easy'),
('MarcelProust', 'Introduction to databases', 1, 3, 1, 'Easy'),
('MarcelProust', 'Introduction to usability engineering', 2, 4, 4, 'Easy'),
('MarcelProust', 'Mobile & cloud software development', 2, 2, 2, 'Easy'),
('MarcelProust', 'Operating systems', 4, 4, 4, 'Hard'),
('MarcelProust', 'Programming I', 2, 4, 0, 'Easy'),
('MarcelProust', 'Programming II', 4, 4, 4, 'Hard'),
('MarcelProust', 'Software engineering II', 2, 3, 4, 'Easy'),
('MarcelProust', 'Web development', 0, 4, 4, 'Easy'),
('VictorHugo', 'Software engineering I', 0, 0, 0, 'Easy');

--
-- Triggers `CourseStatsFinal`
--
DELIMITER $$
CREATE TRIGGER `InsertClassifier` BEFORE INSERT ON `CourseStatsFinal` FOR EACH ROW BEGIN DECLARE x FLOAT; 
DECLARE y FLOAT; 
SET x = (SELECT AVG(Difficulty) FROM CourseStatsFinal); 
SET y = (SELECT AVG(Difficulty) FROM CourseStatsFinal WHERE CourseStatsFinal.Course_Title = new.Course_Title); 
if (x > y) 
then 
SET NEW.Classification = "Easy"; 
else 
SET NEW.Classification = "Hard"; 
END IF; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateClassifier` BEFORE UPDATE ON `CourseStatsFinal` FOR EACH ROW BEGIN DECLARE x FLOAT; DECLARE y FLOAT; SET x = (SELECT AVG(Difficulty) FROM CourseStatsFinal); SET y = (SELECT AVG(Difficulty) FROM CourseStatsFinal WHERE CourseStatsFinal.Course_Title = new.Course_Title); if (x > y) then SET NEW.Classification = "Easy"; else SET NEW.Classification = "Hard"; END IF; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `DiscussionBoardFinal`
--

CREATE TABLE `DiscussionBoardFinal` (
  `Course_Title` varchar(100) NOT NULL,
  `Terms_Course_Offered` int(11) DEFAULT NULL,
  `DB_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DiscussionBoardFinal`
--

INSERT INTO `DiscussionBoardFinal` (`Course_Title`, `Terms_Course_Offered`, `DB_ID`) VALUES
('Analysis of algorithms', 4, 1),
('Computer architecture & assembly language', 4, 2),
('Database management systems', NULL, 3),
('Data structures', 4, 4),
('Discrete structures', NULL, 5),
('Introduction to computer networks', NULL, 6),
('Introduction to databases', 4, 7),
('Introduction to usability engineering', 4, 8),
('Mobile & cloud software development', NULL, 9),
('Operating systems', NULL, 10),
('Programming I', NULL, 11),
('Programming II', NULL, 12),
('Software engineering I', NULL, 13),
('Software engineering II', NULL, 14),
('Web development', NULL, 15);

-- --------------------------------------------------------

--
-- Table structure for table `UserFinal`
--

CREATE TABLE `UserFinal` (
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `UserFinal`
--

INSERT INTO `UserFinal` (`email`, `password`) VALUES
('austinsand', 'asdf'),
('bs', 'bs'),
('CGJung', 'fake'),
('DragonMiny', 'dragonminy1'),
('DragonMiny1', 'fake'),
('DragonMiny2', 'fake'),
('DragonMiny3', 'fake'),
('DragonMiny4', 'fake'),
('DragonMiny5', 'dragonminy1'),
('DragonMiny50', 'dragonminy1'),
('DragonMiny6', 'fake'),
('DragonMiny7', 'fake'),
('DragonMiny9', 'dragonminy1'),
('example', 'example'),
('fakeguy1', 'fake'),
('fakeguy100', 'fake'),
('fakeguy2', 'fake'),
('fakeguy3', 'fake'),
('fakeguy8', 'fake'),
('Fakeguy9', 'fakeguy9'),
('fakeuser2', 'fake'),
('fakeuser3', 'fake'),
('fakeuser4', 'fake'),
('fakeuser5', 'fake'),
('fakeuser@gmail.com', 'fake'),
('GlennCraig', 'fake'),
('hoffera@oregonstate.edu', 'hello'),
('lamarcusaldridge@gmail.com', 'hello'),
('LastFakeGuy', 'fake'),
('Maecraig', 'fake'),
('MarcelProust', 'fake'),
('projectSQL', 'fakepass'),
('VictorHugo', 'fake'),
('whatever', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CommentFinal`
--
ALTER TABLE `CommentFinal`
  ADD PRIMARY KEY (`Timestamp`),
  ADD KEY `Associated_DB_ID` (`Associated_DB_ID`),
  ADD KEY `Course Title_2` (`Course_Title`) USING BTREE,
  ADD KEY `User Email` (`User_Email`,`Course_Title`) USING BTREE;

--
-- Indexes for table `CourseFinal`
--
ALTER TABLE `CourseFinal`
  ADD PRIMARY KEY (`Title`),
  ADD UNIQUE KEY `Title` (`Title`),
  ADD UNIQUE KEY `Code` (`Code`);

--
-- Indexes for table `CourseStatsFinal`
--
ALTER TABLE `CourseStatsFinal`
  ADD PRIMARY KEY (`User_Email`,`Course_Title`),
  ADD KEY `UserEmailRestrict` (`User_Email`),
  ADD KEY `CourseTitleRestrict` (`Course_Title`);

--
-- Indexes for table `DiscussionBoardFinal`
--
ALTER TABLE `DiscussionBoardFinal`
  ADD PRIMARY KEY (`DB_ID`),
  ADD UNIQUE KEY `Course Title` (`Course_Title`),
  ADD KEY `DB_NUM` (`DB_ID`);

--
-- Indexes for table `UserFinal`
--
ALTER TABLE `UserFinal`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DiscussionBoardFinal`
--
ALTER TABLE `DiscussionBoardFinal`
  MODIFY `DB_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CommentFinal`
--
ALTER TABLE `CommentFinal`
  ADD CONSTRAINT `Associated_DB_Key` FOREIGN KEY (`Associated_DB_ID`) REFERENCES `DiscussionBoardFinal` (`DB_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CourseTitleConstraint` FOREIGN KEY (`Course_Title`) REFERENCES `CourseFinal` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserEmailConstraint` FOREIGN KEY (`User_Email`) REFERENCES `UserFinal` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CourseStatsFinal`
--
ALTER TABLE `CourseStatsFinal`
  ADD CONSTRAINT `CourseTitleRestrict` FOREIGN KEY (`Course_Title`) REFERENCES `CourseFinal` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserEmailRestrict` FOREIGN KEY (`User_Email`) REFERENCES `UserFinal` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DiscussionBoardFinal`
--
ALTER TABLE `DiscussionBoardFinal`
  ADD CONSTRAINT `CourseTitleRestrict1` FOREIGN KEY (`Course_Title`) REFERENCES `CourseFinal` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
