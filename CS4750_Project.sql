-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2023 at 09:04 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tjr3nzh_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `belongs_to`
--

CREATE TABLE `belongs_to` (
  `courseID` varchar(10) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `belongs_to`
--

INSERT INTO `belongs_to` (`courseID`, `departmentName`) VALUES
('COMM1800', 'Commerce'),
('COMM2010', 'Commerce'),
('COMM2020', 'Commerce'),
('COMM2730', 'Commerce'),
('COMM3010', 'Commerce'),
('COMM3020', 'Commerce'),
('COMM3030', 'Commerce'),
('COMM3110', 'Commerce'),
('COMM3200', 'Commerce'),
('COMM3220', 'Commerce'),
('COMM3230', 'Commerce'),
('COMM3330', 'Commerce'),
('COMM3410', 'Commerce'),
('COMM3420', 'Commerce'),
('COMM3720', 'Commerce'),
('COMM3880', 'Commerce'),
('COMM4263', 'Commerce'),
('COMM4310', 'Commerce'),
('COMM4351', 'Commerce'),
('COMM4371', 'Commerce'),
('COMM4380', 'Commerce'),
('COMM4450', 'Commerce'),
('COMM4559', 'Commerce'),
('COMM4620', 'Commerce'),
('COMM4643', 'Commerce'),
('COMM4644', 'Commerce'),
('COMM4660', 'Commerce'),
('COMM4680', 'Commerce'),
('COMM4690', 'Commerce'),
('COMM4710', 'Commerce'),
('COMM4720', 'Commerce'),
('COMM4741', 'Commerce'),
('COMM4790', 'Commerce'),
('COMM4899', 'Commerce'),
('COMM5130', 'Commerce'),
('COMM5140', 'Commerce'),
('COMM5700', 'Commerce'),
('CS1110', 'Computer Science'),
('CS2100', 'Computer Science'),
('CS2120', 'Computer Science'),
('CS2130', 'Computer Science'),
('CS2910', 'Computer Science'),
('CS3100', 'Computer Science'),
('CS3120', 'Computer Science'),
('CS3130', 'Computer Science'),
('CS3140', 'Computer Science'),
('CS3205', 'Computer Science'),
('CS3240', 'Computer Science'),
('CS3250', 'Computer Science'),
('CS3710', 'Computer Science'),
('CS4414', 'Computer Science'),
('CS4457', 'Computer Science'),
('CS4610', 'Computer Science'),
('CS4630', 'Computer Science'),
('CS4640', 'Computer Science'),
('CS4710', 'Computer Science'),
('CS4720', 'Computer Science'),
('CS4730', 'Computer Science'),
('CS4740', 'Computer Science'),
('CS4750', 'Computer Science'),
('CS4760', 'Computer Science'),
('ECON2010', 'Economics'),
('ECON2020', 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `courseID` varchar(10) NOT NULL,
  `courseName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`courseID`, `courseName`) VALUES
('COMM1800', 'Foundations of Commerce'),
('COMM2010', 'Introduction to Financial Accounting'),
('COMM2020', 'Introduction to Management Accounting'),
('COMM2730', 'Personal Finance'),
('COMM3010', 'Strategy and Systems'),
('COMM3020', 'Behavioral Issues in Marketing and Management'),
('COMM3030', 'Quantitative and Financial Analysis'),
('COMM3110', 'Intermediate Accounting I'),
('COMM3200', 'Project and Product Management'),
('COMM3220', 'Database Management Systems and Business Intelligence'),
('COMM3230', 'Managing Innovation'),
('COMM3330', 'Marketing Research & Analytic Techniques'),
('COMM3410', 'Commercial Law I'),
('COMM3420', 'Commercial Law II'),
('COMM3720', 'Intermediate Corporate Finance'),
('COMM3880', 'Global Sustainability'),
('COMM4263', 'Cybersecurity as a Business Risk'),
('COMM4310', 'Global Marketing'),
('COMM4351', 'Marketing Analytics for Big Data'),
('COMM4371', 'Strategic Brand Consulting and Communications'),
('COMM4380', 'Consumer Behavior and Marketing Strategy'),
('COMM4450', 'Federal Taxation'),
('COMM4559', 'New Course in Commerce'),
('COMM4620', 'Strategic Leadership'),
('COMM4643', 'Advanced Business Speaking'),
('COMM4644', 'Persuasion & Influence'),
('COMM4660', 'Management Consulting and Advisory Services'),
('COMM4680', 'Entrepreneurship'),
('COMM4690', 'Global Management'),
('COMM4710', 'Intermediate Investments'),
('COMM4720', 'Advanced Corporate Finance: Valuation and Restructuring'),
('COMM4741', 'Foundations of Global Commerce'),
('COMM4790', 'Fundamentals of Real Estate Analysis'),
('COMM4899', 'Cross Cultural Experience'),
('COMM5130', 'Advanced Financial Accounting'),
('COMM5140', 'Accounting for Decision Making and Control'),
('COMM5700', 'Financial Trading'),
('CS1110', 'Introduction to Programming'),
('CS2100', 'Data Structures and Algorithms 1'),
('CS2120', 'Discrete Mathematics and Theory 1'),
('CS2130', 'Computer Systems and Organization 1'),
('CS2910', 'CS Education Practicum'),
('CS3100', 'Data Structures and Algorithms 2'),
('CS3120', 'Discrete Mathematics and Theory 2'),
('CS3130', 'Computer Systems and Organization 2'),
('CS3140', 'Software Development Essentials'),
('CS3205', 'HCI in Software Development'),
('CS3240', 'Advanced Software Development Techniques'),
('CS3250', 'Software Testing'),
('CS3710', 'Introduction to Cybersecurity'),
('CS4414', 'Operating Systems'),
('CS4457', 'Computer Networks'),
('CS4610', 'Programming Languages'),
('CS4630', 'Defense Against the Dark Arts'),
('CS4640', 'Programming Languages for Web Applications'),
('CS4710', 'Artificial Intelligence'),
('CS4720', 'Mobile Application Development'),
('CS4730', 'Computer Game Design'),
('CS4740', 'Cloud Computing'),
('CS4750', 'Database Systems'),
('CS4760', 'Network Security'),
('ECON2010', 'Principles of Economics: Microeconomics'),
('ECON2020', 'Principles of Economics: Macroeconomics');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `departmentName` varchar(255) NOT NULL,
  `departmentAbbreviation` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`departmentName`, `departmentAbbreviation`) VALUES
('Commerce', 'COMM'),
('Computer Science', 'CS'),
('Economics', 'ECON');

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `feedbackID` int(11) NOT NULL,
  `notesID` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`feedbackID`, `notesID`, `description`) VALUES
(1, 1, 'The notes provided were clear and concise, making it easy to understand the key points.'),
(2, 2, 'I found the notes to be well-organized, which helped me stay on track with my studies.'),
(3, 4, 'The notes were a valuable resource for reviewing the material, and I appreciate the effort put into creating them.'),
(4, 2, 'I liked the format of the notes; they were easy to read and visually appealing.'),
(5, 5, 'The notes served as an excellent supplement to the lectures, enhancing my comprehension of the subject matter.'),
(6, 12, 'The quality of the notes was impressive, and I would recommend them to my peers.'),
(7, 15, 'The notes were a time-saver, allowing me to focus on understanding the content rather than taking extensive notes.'),
(8, 10, 'Im grateful for the notes, which helped me prepare for exams and assignments more efficiently.'),
(9, 9, 'The notes were a great reference for quick revisions, and Im thankful for having access to them.'),
(10, 6, 'Overall, the notes were a helpful study aid that contributed to my academic success.'),
(11, 7, 'The notes were a game-changer in my study routine, streamlining my learning process.'),
(12, 2, 'I appreciated the detailed notes, as they clarified complex topics and improved my grasp of the subject.'),
(13, 14, 'The notes were instrumental in my academic progress, providing a valuable resource for self-study.'),
(14, 8, 'I found the notes to be user-friendly and easily accessible, making my study sessions more productive.'),
(15, 5, 'The inclusion of examples and illustrations in the notes greatly enhanced my understanding of the material.'),
(16, 3, 'The notes were a lifesaver during a hectic semester, helping me stay organized and prepared for assessments.'),
(17, 12, 'I would like to extend my gratitude for the well-prepared notes, which contributed to my overall learning experience.'),
(18, 14, 'I am going to refer students to your notes!');

-- --------------------------------------------------------

--
-- Table structure for table `Notes`
--

CREATE TABLE `Notes` (
  `notesID` int(11) NOT NULL,
  `averageRating` decimal(3,2) DEFAULT NULL,
  `studentID` varchar(15) DEFAULT NULL,
  `notesURL` varchar(255) DEFAULT NULL,
  `dateCreated` date DEFAULT NULL,
  `courseID` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Notes`
--

INSERT INTO `Notes` (`notesID`, `averageRating`, `studentID`, `notesURL`, `dateCreated`, `courseID`, `description`) VALUES
(1, NULL, 'ay3xqa', 'https://docs.google.com/document/d/1nWe3kN9As3XgMpPRdRt2Tbiyr1R2zge9VQ97MwHZlC8/edit?usp=sharing', '2022-03-23', 'COMM3410', 'Miderm Exam Notes'),
(2, NULL, 'ay3xqa', 'https://docs.google.com/document/d/18H9EU2pbdkEzGcCJca4wW_g8MjdC_3nPBDdYBivYDuE/edit?usp=sharing', '2021-05-02', 'COMM1800', 'Final Exam Study Guide'),
(3, NULL, 'ay3xqa', 'https://docs.google.com/document/d/1PxRc4FEb-dWqN1f0VvjiGp5d-LYzqp8n0Q94Y9mOCkk/edit?usp=sharing', '2022-04-03', 'CS3205', 'Midterm Exam Notes'),
(4, NULL, 'eyk8uup', 'https://docs.google.com/document/d/1y-LboBl6cK-ZzsvQUcuynmc3VFl_y5AFEL9SXTLSiqs/edit?usp=sharing', '2020-10-03', 'ECON2010', 'Midterm Notes'),
(5, NULL, 'eyk8uup', 'https://docs.google.com/document/d/1bEpqI8BvDBSAu8HxNeKDTZwZyZoxOhLB2S_NGfC6CZY/edit?usp=sharing', '2021-03-14', 'ECON2020', 'Midterm Notes'),
(6, NULL, 'eyk8uup', 'https://docs.google.com/document/d/1T9m_-tq9K1NbjieOEEk6U1e1VbLml2gOGA6U8FgWNCY/edit?usp=sharing', '2022-05-01', 'COMM3410', 'Final Study Guide'),
(7, NULL, 'eyk8uup', 'https://docs.google.com/document/d/1QliYfutVmsuTYi42mBQWamk-5gVTTo-0cP9UXZFVb-s/edit?usp=sharing', '2023-02-27', 'COMM3720', 'Midterm Study Guide'),
(8, NULL, 'ay3xqa', 'https://docs.google.com/document/d/13un3kO64c5PnyDzQu2jB0zDkYn-PLcKQ16MfrfamIn8/edit?usp=sharing', '2023-10-05', 'CS4750', 'Midterm Study Guide'),
(9, NULL, 'ay3xqa', 'https://docs.google.com/document/d/19GtFMip8qa3af_ClwtqA-HjMpc8THB4FpDIVbAwCvD4/edit?usp=sharing', '2023-10-17', 'COMM2010', 'Exam 1 Study Guide'),
(10, NULL, 'ks9xv', 'https://docs.google.com/document/d/1jiUGtyY01WCHnVKe6vjhHJDIpV9irYV7b9t1ZIlhZ20/edit?usp=sharing', '2022-05-10', 'COMM1800', 'Midterm Study Guide'),
(11, NULL, 'ks9xv', 'https://docs.google.com/document/d/1RBYmg-fiWvgxraht37pTxoNqyXtlEwomTc7T4OLHkDE/edit?usp=sharing', '2023-10-22', 'COMM2010', 'Exam 3 Study Guide'),
(12, NULL, 'eyk8uup', 'https://docs.google.com/document/d/1mxvyKAg207HClESWogXSvgI5Toj2HOZubZzl79UZzbM/edit?usp=sharing', '2023-09-18', 'COMM2010', 'Exam 2 Study Guide'),
(13, NULL, 'ks9xv', 'https://docs.google.com/document/d/1UtNtEk4Y7U_LHDfbpye_V1CsncpX-fD3JDj9_Tw5QK4/edit?usp=drive_link', '2023-09-15', 'ECON2010', 'Midterm Notes'),
(14, NULL, 'ks9xv', 'https://docs.google.com/document/d/1YdNrOpSGO22UUUzK-SPFeKJUoPiK6F-yfma_-8ppdUc/edit?usp=drive_link', '2023-09-27', 'ECON2020', 'Midterm Notes'),
(15, NULL, 'ks9xv', 'https://docs.google.com/document/d/1zFhogMWMoKsT_t96sXtBhmO4wt0DDoN59hyrANZndnU/edit?usp=drive_link', '2022-11-27', 'COMM3410', 'Final Study Guide');

-- --------------------------------------------------------

--
-- Table structure for table `Professor`
--

CREATE TABLE `Professor` (
  `professorEmail` varchar(255) NOT NULL,
  `pswd` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Professor`
--

INSERT INTO `Professor` (`professorEmail`, `pswd`, `first_name`, `last_name`) VALUES
('aar5u@virginia.edu', 'Secret567', 'Andrea', 'Roberts'),
('ac3cq@virginia.edu', 'RandomPass', 'Amar', 'Cheema'),
('ado4v@virginia.edu', 'SamplePass', 'Angela', 'Orebaugh'),
('asb2t@virginia.edu', '987Pa$$word', 'Aaron', 'Bloomfield'),
('asg3b@virginia.edu', 'LetMeIn456', 'Ann', 'Backof'),
('awk2k@virginia.edu', 'LetMeIn1234', 'Adelaide', 'King'),
('brl6m@virginia.edu', '987Pa$$word', 'Bryan', 'Lewis'),
('bw7ee@virginia.edu', '3SecurePwd', 'Bingyun', 'Wang'),
('cad7q@virginia.edu', 'Secure1234', 'Carter', 'Doyle'),
('cay2m@virginia.edu', 'Secure123!', 'Christopher', 'Yung'),
('cbx8wm@virginia.edu', 'Passw0rdABC', 'Yen-Ling', 'Kuo'),
('cle9y@virginia.edu', 'LetMeIn1234', 'Christopher', 'Elliott'),
('clh6xz@virginia.edu', '3SecurePwd', 'Charlotte', 'Hoopes'),
('cll5r@virginia.edu', 'XYZPassword', 'Christi', 'Lockwood'),
('cmh8p@virginia.edu', 'P@ssw0rd1', 'Carrie', 'Heilman'),
('cpz6n@virginia.edu', 'Secure1234', 'Carl', 'Zeithaml'),
('cqx3bu@virginia.edu', '12345Random', 'Chang', 'Lou'),
('cr4bd@virginia.edu', '1Password!', 'Charles', 'Reiss'),
('cs2dz@virginia.edu', 'XYZPassword', 'Carola', 'Schenone'),
('csm9y@virginia.edu', 'P@ssword!', 'Chris', 'Maurer'),
('cva8qh@virginia.edu', 'LetMeIn123', 'Dorothy', 'Leidner'),
('dck2w@virginia.edu', 'Passw0rd12', 'Dorothy', 'Kelly'),
('dfd6r@virginia.edu', 'ABCPa$$123', 'Derick', 'Davis'),
('dgg6b@virginia.edu', '9876Secret', 'Daniel', 'Graham'),
('djs6d@virginia.edu', 'RandomPass', 'Derrick', 'Stone'),
('dwl5w@virginia.edu', 'Random987', 'David', 'Lehman'),
('em5dq@virginia.edu', 'ABCPa$$123', 'Eric', 'Martin'),
('emo7bf@virginia.edu', '1234LetMeIn', 'Elizabeth', 'Orrico'),
('eyz7t@virginia.edu', 'ABCD123456', 'Emma', 'Zhao'),
('fm2v@virginia.edu', '2PassWord', 'Felicia', 'Marston'),
('fnh9zj@virginia.edu', 'LetMeIn123', 'Jing', 'Gong'),
('gab4qu@virginia.edu', 'MySecurePwd', 'Gary', 'Ballinger'),
('ge2a@virginia.edu', '1Password!', 'Gayle', 'Erwin'),
('grg9tx@virginia.edu', 'SecurePass!', 'Yu', 'Tse'),
('ivk9yu@virginia.edu', 'SamplePass', 'Irina', 'Kozlenkova'),
('jeb4n@virginia.edu', 'Random987', 'James', 'Burroughs'),
('jh2jf@virginia.edu', 'MyP@ssw0rd', 'Robbie', 'Hott'),
('jjm4p@virginia.edu', '12345Secure', 'Jeremy', 'Marcel'),
('jm9nb@virginia.edu', 'Secret567', 'Jill', 'Mitchell'),
('jwd@virginia.edu', 'LetMeIn456', 'Jack', 'Davidson'),
('ka6x@virginia.edu', 'ABCD123456', 'Kiera', 'Allison'),
('kem4cx@virginia.edu', '2PassWord', 'Katie', 'McDermott'),
('kl4uk@virginia.edu', '1234LetMeIn', 'Kisha', 'Lashley'),
('lc7p@virginia.edu', '2PassWord', 'Lee', 'Coppock'),
('map5cx@virginia.edu', 'P@ssw0rd1', 'Arohi', 'Khargonkar'),
('maw3u@virginia.edu', 'RandomPass', 'Mark', 'White'),
('mlp6h@virginia.edu', 'P@ssword12', 'Marcia', 'Pentz'),
('mrf8t@virginia.edu', 'LetMeIn123', 'Mark', 'Floryan'),
('mss2x@virginia.edu', 'SecurePass!', 'Mark', 'Sherriff'),
('nb3f@virginia.edu', 'ABCD123456', 'Nada', 'Basit'),
('nn4pj@virginia.edu', 'MySecurePwd', 'Rich', 'Nguyen'),
('pa7xu@virginia.edu', 'P@ssword12', 'Panagiotis', 'Apostolellis'),
('pam5x@virginia.edu', '3SecurePwd', 'Peter', 'Maillet'),
('pc4v@virginia.edu', 'ABC12345', 'Phoebe', 'Crisman'),
('phg4c@virginia.edu', '1234Pass', 'Peter', 'Gray'),
('pm8fc@virginia.edu', 'ABC12345', 'Paul', 'McBurney'),
('ps7wx@virginia.edu', 'MyP@ssw0rd', 'Paul', 'Seaborn'),
('pvs6f@virginia.edu', 'Secure123!', 'Patrik', 'Sandas'),
('rep2z@virginia.edu', 'ABC12345', 'Robert', 'Patterson'),
('riw4j@virginia.edu', 'P@ssw0rd1', 'Robert', 'Webb'),
('rp6zr@virginia.edu', 'Password123', 'Raymond', 'Pettit'),
('rrn2n@virginia.edu', '123Pa$$word', 'Russell', 'Nelson'),
('se4ja@virginia.edu', 'ABCPa$$123', 'Sebastian', 'Elbaum'),
('sg6m@virginia.edu', '123Pa$$word', 'Stefano', 'Grazioli'),
('sk6ux@virginia.edu', 'Secure1234', 'Sanket', 'Korgaonkar'),
('sk7nn@virginia.edu', '1234Pass', 'Sheisha', 'Kulkarni'),
('sl5xv@virginia.edu', 'P@ssw0rd!', 'Sarah', 'Lebovitz'),
('slp7m@virginia.edu', '1Password!', 'Susan', 'Porter'),
('spe8x@virginia.edu', 'PasswordXYZ', 'Sherri', 'Moore'),
('sqm6hx@virginia.edu', 'LetMeIn1234', 'Christine', 'Kim'),
('szw7en@virginia.edu', 'Password123', 'David', 'Schuff'),
('tcr5zr@virginia.edu', 'PasswordXYZ', 'Hyojoon', 'Kim'),
('ufp9zu@virginia.edu', 'MyP@ssw0rd', 'Reeves', 'Johnson'),
('up3f@virginia.edu', 'Random987', 'Upsorn', 'Praphamontripong'),
('usv8ch@virginia.edu', '9876Secret', 'Sarah', 'Memmi'),
('whd3vr@virginia.edu', 'SamplePass', 'Aaron', 'Noland'),
('wxt4gm@virginia.edu', 'Secure123!', 'Briana', 'Morrison'),
('xl6yq@virginia.edu', '2PassWord', 'Felix', 'Lin'),
('yj3fs@virginia.edu', 'XYZPassword', 'Yangfeng', 'Ji'),
('ynf8a@virginia.edu', 'PasswordXYZ', 'Natasha', 'Foutz'),
('ysk3we@virginia.edu', '987Pa$$word', 'Polina', 'Landgraf'),
('yy5p@virginia.edu', 'P@ssword!', 'Yingri', 'YU');

-- --------------------------------------------------------

--
-- Table structure for table `Provides`
--

CREATE TABLE `Provides` (
  `professorEmail` varchar(255) NOT NULL,
  `feedbackID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Provides`
--

INSERT INTO `Provides` (`professorEmail`, `feedbackID`) VALUES
('ado4v@virginia.edu', 17),
('cr4bd@virginia.edu', 10),
('dgg6b@virginia.edu', 5),
('djs6d@virginia.edu', 3),
('emo7bf@virginia.edu', 4),
('jh2jf@virginia.edu', 7),
('map5cx@virginia.edu', 1),
('mrf8t@virginia.edu', 9),
('mss2x@virginia.edu', 13),
('mss2x@virginia.edu', 15),
('nb3f@virginia.edu', 6),
('nn4pj@virginia.edu', 11),
('pa7xu@virginia.edu', 12),
('rp6zr@virginia.edu', 8),
('se4ja@virginia.edu', 14),
('up3f@virginia.edu', 16),
('wxt4gm@virginia.edu', 2),
('xl6yq@virginia.edu', 18);

-- --------------------------------------------------------

--
-- Table structure for table `Rates`
--

CREATE TABLE `Rates` (
  `studentID` varchar(15) NOT NULL,
  `notesID` int(11) NOT NULL,
  `ratingScore` int(11) DEFAULT NULL CHECK (`ratingScore` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `Rates` and `Notes`
--
DELIMITER $$
CREATE TRIGGER `update_averageRating` AFTER INSERT ON `Rates` FOR EACH ROW UPDATE Notes
	SET averageRating = 
(SELECT AVG(ratingScore) FROM Rates
            WHERE notesID = NEW.notesID)
	WHERE notesID = NEW.notesID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_averageRating_onUpdates` AFTER UPDATE ON `Rates` FOR EACH ROW BEGIN
    UPDATE Notes
    SET averageRating = (SELECT AVG(ratingScore) FROM Rates WHERE notesID = NEW.notesID)
    WHERE notesID = NEW.notesID;
END
$$
DELIMITER ;

--
-- Dumping data for table `Rates`
--

INSERT INTO `Rates` (`studentID`, `notesID`, `ratingScore`) VALUES
('ay3xqa', 1, 3),
('ay3xqa', 2, 4),
('ay3xqa', 3, 5),
('ay3xqa', 8, 3),
('ay3xqa', 9, 5),
('eyk8uup', 4, 4),
('eyk8uup', 5, 1),
('eyk8uup', 6, 3),
('eyk8uup', 7, 4),
('eyk8uup', 12, 5),
('ks9xv', 10, 1),
('ks9xv', 11, 2),
('ks9xv', 13, 3),
('ks9xv', 14, 3),
('ks9xv', 15, 5);



-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `studentID` varchar(15) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pswd` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`studentID`, `email`, `pswd`, `first_name`, `last_name`, `year`) VALUES
('abc0klm', 'abc0klm@virginia.edu', 'SamplePass', 'Benjamin', 'Garcia', 2025),
('abc1xyz', 'abc1xyz@virginia.edu', 'Password1!', 'John', 'Smith', 2024),
('abc7klm', 'abc7klm@virginia.edu', '12345Secure', 'Caleb', 'Lawson', 2024),
('abc8klm', 'abc8klm@virginia.edu', '1234LetMeIn', 'Abigail', 'Cook', 2027),
('abc9klm', 'abc9klm@virginia.edu', 'PasswordXYZ', 'Mia', 'Brooks', 2026),
('ay3xqa', 'ay3xqa@virginia.edu', 'ABC12345', 'Alex', 'Yu', 2024),
('chf2pn', 'chf2pn@virginia.edu', 'Random987', 'Charlie', 'Fish', 2024),
('def0nop', 'def0nop@virginia.edu', '123Pa$$word', 'Aiden', 'Clark', 2027),
('def1nop', 'def1nop@virginia.edu', 'Random987', 'Sophia', 'Martinez', 2026),
('def2lmn', 'def2lmn@virginia.edu', 'Secure123', 'Emily', 'Johnson', 2025),
('def8nop', 'def8nop@virginia.edu', 'Secure1234', 'Leah', 'Wagner', 2025),
('def9nop', 'def9nop@virginia.edu', 'P@ssword12', 'Caleb', 'Fisher', 2024),
('eyk8uup', 'eyk8uup@virginia.edu', 'Passw0rd!', 'Esther', 'Kim', 2024),
('ghi0qrs', 'ghi0qrs@virginia.edu', 'XYZPassword', 'Grace', 'Ellis', 2025),
('ghi1qrs', 'ghi1qrs@virginia.edu', 'SecurePass!', 'Henry', 'Wood', 2024),
('ghi2qrs', 'ghi2qrs@virginia.edu', 'Pa$$w0rd', 'James', 'Hernandez', 2027),
('ghi3pqr', 'ghi3pqr@virginia.edu', '2PassWord', 'Michael', 'Davis', 2026),
('ghi9qrs', 'ghi9qrs@virginia.edu', 'LetMeIn1234', 'Eli', 'Banks', 2026),
('jkl0tuv', 'jkl0tuv@virginia.edu', '9876Pass!', 'Riley', 'Lambert', 2027),
('jkl1tuv', 'jkl1tuv@virginia.edu', '987Pa$$word', 'Jackson', 'Wallace', 2026),
('jkl2tuv', 'jkl2tuv@virginia.edu', 'Passw0rdABC', 'Scarlett', 'Foster', 2025),
('jkl3tuv', 'jkl3tuv@virginia.edu', '1234Pass', 'Amelia', 'Lopez', 2024),
('jkl4stu', 'jkl4stu@virginia.edu', 'RandomPass', 'Sarah', 'Wilson', 2027),
('ks9xv', 'ks9xv@virginia.edu', '3SecurePwd', 'Kerti', 'Sadassivam', 2024),
('mno1wxy', 'mno1wxy@virginia.edu', 'Passw0rd!1', 'Savannah', 'Maxwell', 2024),
('mno2wxy', 'mno2wxy@virginia.edu', 'Secret1234', 'Victoria', 'Coleman', 2027),
('mno3wxy', 'mno3wxy@virginia.edu', '9876Secret', 'Lily', 'Phillips', 2026),
('mno4wxy', 'mno4wxy@virginia.edu', 'SecurePwd1', 'Ethan', 'Perez', 2025),
('mno5vwx', 'mno5vwx@virginia.edu', 'Secret567', 'Jessica', 'Brown', 2024),
('pqr3zab', 'pqr3zab@virginia.edu', 'ABCD123456', 'Samuel', 'Peters', 2024),
('pqr4zab', 'pqr4zab@virginia.edu', '12345Random', 'Daniel', 'Reed', 2027),
('pqr5zab', 'pqr5zab@virginia.edu', '98765Pass', 'Chloe', 'Lewis', 2026),
('pqr6zab', 'pqr6zab@virginia.edu', 'Password123', 'William', 'Jones', 2025),
('ps5um', 'ps5um@virginia.edu', 'Pa$$w0rd', 'Pranav', 'Singh', 2024),
('stu4cde', 'stu4cde@virginia.edu', 'LetMeIn456', 'Sophie', 'Griffin', 2025),
('stu5cde', 'stu5cde@virginia.edu', '1Password!', 'Oliver', 'Peterson', 2024),
('stu6cde', 'stu6cde@virginia.edu', 'Passw0rd12', 'Ava', 'Collins', 2027),
('stu7bcd', 'stu7bcd@virginia.edu', 'ABC12345', 'Jennifer', 'Lee', 2026),
('tjr3nzh', 'tjr3nzh@virginia.edu', 'SamplePass', 'Ty', 'Reichard', 2024),
('uvw5efg', 'uvw5efg@virginia.edu', 'RandomPass1', 'Luke', 'Page', 2026),
('uvw6efg', 'uvw6efg@virginia.edu', 'MySecurePwd', 'Grace', 'Howard', 2025),
('uvw7efg', 'uvw7efg@virginia.edu', 'MyP@ssw0rd', 'Liam', 'Turner', 2024),
('uvw8efg', 'uvw8efg@virginia.edu', 'Passw0rd!', 'David', 'Miller', 2027),
('xyz6hij', 'xyz6hij@virginia.edu', 'P@ssword123', 'Zoey', 'Fuller', 2027),
('xyz7hij', 'xyz7hij@virginia.edu', 'ABCPa$$123', 'Elijah', 'Hayes', 2026),
('xyz8hij', 'xyz8hij@virginia.edu', 'LetMeIn123', 'Harper', 'Morris', 2025),
('xyz9hij', 'xyz9hij@virginia.edu', '3SecurePwd', 'Olivia', 'Anderson', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `Student_Major`
--

CREATE TABLE `Student_Major` (
  `studentID` varchar(15) NOT NULL,
  `major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student_Major`
--

INSERT INTO `Student_Major` (`studentID`, `major`) VALUES
('abc0klm', 'Computer Science'),
('abc1xyz', 'Commerce'),
('abc1xyz', 'Computer Science'),
('abc7klm', 'Computer Science'),
('abc7klm', 'Economics'),
('abc9klm', 'Computer Science'),
('abc9klm', 'Economics'),
('def0nop', 'Economics'),
('def1nop', 'Commerce'),
('def1nop', 'Computer Science'),
('def2lmn', 'Commerce'),
('def8nop', 'Economics'),
('ghi1qrs', 'Commerce'),
('ghi1qrs', 'Computer Science'),
('ghi2qrs', 'Commerce'),
('ghi3pqr', 'Computer Science'),
('ghi9qrs', 'Computer Science'),
('jkl0tuv', 'Computer Science'),
('jkl2tuv', 'Computer Science'),
('jkl2tuv', 'Economics'),
('jkl3tuv', 'Economics'),
('jkl4stu', 'Commerce'),
('mno1wxy', 'Commerce'),
('mno3wxy', 'Commerce'),
('mno4wxy', 'Computer Science'),
('mno5vwx', 'Computer Science'),
('mno5vwx', 'Economics'),
('pqr4zab', 'Commerce'),
('pqr4zab', 'Computer Science'),
('pqr5zab', 'Computer Science'),
('pqr5zab', 'Economics'),
('pqr6zab', 'Commerce'),
('stu5cde', 'Computer Science'),
('stu5cde', 'Economics'),
('stu6cde', 'Commerce'),
('stu7bcd', 'Commerce'),
('uvw6efg', 'Commerce'),
('uvw7efg', 'Commerce'),
('uvw7efg', 'Computer Science'),
('uvw8efg', 'Computer Science'),
('uvw8efg', 'Economics'),
('xyz7hij', 'Computer Science'),
('xyz8hij', 'Commerce'),
('xyz9hij', 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `professorEmail` varchar(255) NOT NULL,
  `courseID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`professorEmail`, `courseID`) VALUES
('aar5u@virginia.edu', 'COMM5140'),
('ac3cq@virginia.edu', 'COMM4380'),
('ado4v@virginia.edu', 'CS3710'),
('asb2t@virginia.edu', 'CS4760'),
('asg3b@virginia.edu', 'COMM3110'),
('awk2k@virginia.edu', 'COMM3010'),
('brl6m@virginia.edu', 'COMM4263'),
('bw7ee@virginia.edu', 'COMM3110'),
('cay2m@virginia.edu', 'COMM3030'),
('cbx8wm@virginia.edu', 'CS4710'),
('cle9y@virginia.edu', 'COMM4899'),
('clh6xz@virginia.edu', 'COMM1800'),
('cll5r@virginia.edu', 'COMM3020'),
('cmh8p@virginia.edu', 'COMM4371'),
('cpz6n@virginia.edu', 'COMM3010'),
('cqx3bu@virginia.edu', 'CS4740'),
('cr4bd@virginia.edu', 'CS3130'),
('cs2dz@virginia.edu', 'COMM3720'),
('cs2dz@virginia.edu', 'COMM4720'),
('csm9y@virginia.edu', 'COMM3010'),
('cva8qh@virginia.edu', 'COMM4559'),
('dck2w@virginia.edu', 'COMM2730'),
('dfd6r@virginia.edu', 'COMM3020'),
('dgg6b@virginia.edu', 'CS2130'),
('djs6d@virginia.edu', 'CS2100'),
('dwl5w@virginia.edu', 'COMM3020'),
('em5dq@virginia.edu', 'COMM3230'),
('em5dq@virginia.edu', 'COMM4680'),
('emo7bf@virginia.edu', 'CS2120'),
('eyz7t@virginia.edu', 'COMM4620'),
('fm2v@virginia.edu', 'COMM4720'),
('fnh9zj@virginia.edu', 'COMM3220'),
('gab4qu@virginia.edu', 'COMM3020'),
('ge2a@virginia.edu', 'COMM3030'),
('grg9tx@virginia.edu', 'COMM3020'),
('ivk9yu@virginia.edu', 'COMM3330'),
('ivk9yu@virginia.edu', 'COMM4310'),
('jeb4n@virginia.edu', 'COMM3330'),
('jh2jf@virginia.edu', 'CS3100'),
('jh2jf@virginia.edu', 'CS4640'),
('jjm4p@virginia.edu', 'COMM3010'),
('jm9nb@virginia.edu', 'COMM2010'),
('jm9nb@virginia.edu', 'COMM2020'),
('jwd@virginia.edu', 'CS4630'),
('ka6x@virginia.edu', 'COMM3020'),
('ka6x@virginia.edu', 'COMM4644'),
('kem4cx@virginia.edu', 'COMM3110'),
('kl4uk@virginia.edu', 'COMM3010'),
('map5cx@virginia.edu', 'CS1110'),
('maw3u@virginia.edu', 'COMM3030'),
('mlp6h@virginia.edu', 'COMM3020'),
('mlp6h@virginia.edu', 'COMM4643'),
('mrf8t@virginia.edu', 'CS3120'),
('mss2x@virginia.edu', 'CS3240'),
('nb3f@virginia.edu', 'CS2910'),
('nn4pj@virginia.edu', 'CS3140'),
('pa7xu@virginia.edu', 'CS3205'),
('pam5x@virginia.edu', 'COMM4741'),
('pc4v@virginia.edu', 'COMM3880'),
('phg4c@virginia.edu', 'COMM3010'),
('pm8fc@virginia.edu', 'CS4720'),
('pm8fc@virginia.edu', 'CS4730'),
('ps7wx@virginia.edu', 'COMM4660'),
('ps7wx@virginia.edu', 'COMM4690'),
('pvs6f@virginia.edu', 'COMM4710'),
('rep2z@virginia.edu', 'COMM3020'),
('riw4j@virginia.edu', 'COMM3030'),
('riw4j@virginia.edu', 'COMM5700'),
('rp6zr@virginia.edu', 'CS3100'),
('rp6zr@virginia.edu', 'CS4610'),
('rrn2n@virginia.edu', 'COMM3010'),
('se4ja@virginia.edu', 'CS3240'),
('sg6m@virginia.edu', 'COMM3220'),
('sk6ux@virginia.edu', 'COMM4790'),
('sk7nn@virginia.edu', 'COMM4710'),
('sl5xv@virginia.edu', 'COMM3010'),
('slp7m@virginia.edu', 'COMM4450'),
('spe8x@virginia.edu', 'COMM3410'),
('spe8x@virginia.edu', 'COMM3420'),
('sqm6hx@virginia.edu', 'COMM3020'),
('sqm6hx@virginia.edu', 'COMM3330'),
('szw7en@virginia.edu', 'COMM3200'),
('tcr5zr@virginia.edu', 'CS4457'),
('ufp9zu@virginia.edu', 'COMM3030'),
('up3f@virginia.edu', 'CS3250'),
('up3f@virginia.edu', 'CS4750'),
('usv8ch@virginia.edu', 'COMM3020'),
('whd3vr@virginia.edu', 'COMM3020'),
('wxt4gm@virginia.edu', 'CS2100'),
('xl6yq@virginia.edu', 'CS4414'),
('yj3fs@virginia.edu', 'CS4710'),
('ynf8a@virginia.edu', 'COMM3020'),
('ynf8a@virginia.edu', 'COMM4351'),
('ysk3we@virginia.edu', 'COMM3030'),
('yy5p@virginia.edu', 'COMM5130');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD PRIMARY KEY (`courseID`,`departmentName`),
  ADD KEY `departmentName` (`departmentName`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`departmentName`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `fk_fbni` (`notesID`);

--
-- Indexes for table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`notesID`);

--
-- Indexes for table `Professor`
--
ALTER TABLE `Professor`
  ADD PRIMARY KEY (`professorEmail`);

--
-- Indexes for table `Provides`
--
ALTER TABLE `Provides`
  ADD PRIMARY KEY (`professorEmail`,`feedbackID`),
  ADD KEY `feedbackID` (`feedbackID`);

--
-- Indexes for table `Rates`
--
ALTER TABLE `Rates`
  ADD PRIMARY KEY (`studentID`,`notesID`),
  ADD KEY `notesID` (`notesID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Student_Major`
--
ALTER TABLE `Student_Major`
  ADD PRIMARY KEY (`studentID`,`major`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`professorEmail`,`courseID`),
  ADD KEY `courseID` (`courseID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD CONSTRAINT `belongs_to_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `Course` (`courseID`),
  ADD CONSTRAINT `belongs_to_ibfk_2` FOREIGN KEY (`departmentName`) REFERENCES `Department` (`departmentName`);

--
-- Constraints for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD CONSTRAINT `fk_fbni` FOREIGN KEY (`notesID`) REFERENCES `Notes` (`notesID`)
  ON DELETE CASCADE;

--
-- Constraints for table `Provides`
--
ALTER TABLE `Provides`
  ADD CONSTRAINT `Provides_ibfk_1` FOREIGN KEY (`professorEmail`) REFERENCES `Professor` (`professorEmail`),
  ADD CONSTRAINT `Provides_ibfk_2` FOREIGN KEY (`feedbackID`) REFERENCES `Feedback` (`feedbackID`)
  ON DELETE CASCADE;

--
-- Constraints for table `Rates`
--
ALTER TABLE `Rates`
  ADD CONSTRAINT `Rates_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`),
  ADD CONSTRAINT `Rates_ibfk_2` FOREIGN KEY (`notesID`) REFERENCES `Notes` (`notesID`)
  ON DELETE CASCADE;

--
-- Constraints for table `Student_Major`
--
ALTER TABLE `Student_Major`
  ADD CONSTRAINT `Student_Major_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Student` (`studentID`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`professorEmail`) REFERENCES `Professor` (`professorEmail`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `Course` (`courseID`);


COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
