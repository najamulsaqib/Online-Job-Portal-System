-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 04:06 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobies`
--

-- --------------------------------------------------------

--
-- Table structure for table `appliedjobs`
--

CREATE TABLE `appliedjobs` (
  `aj_id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `experiance` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appliedjobs`
--

INSERT INTO `appliedjobs` (`aj_id`, `jobid`, `userid`, `experiance`, `status`) VALUES
(1, 1, 2, 3, 2),
(2, 2, 2, 3, 1),
(9, 1, 5, 1, 1),
(10, 3, 2, 1, 3),
(11, 4, 4, 1, 1),
(12, 5, 6, 2, 1),
(13, 3, 3, 1, 3),
(14, 5, 8, 3, 2),
(15, 7, 3, 2, 2),
(16, 7, 2, 2, 2),
(17, 1, 10, 1, 2),
(18, 4, 10, 2, 3),
(19, 5, 10, 2, 1),
(20, 5, 2, 3, 1),
(21, 1, 3, 0, 1),
(22, 5, 11, 3, 2),
(23, 7, 11, 3, 3),
(24, 1, 11, 3, 1),
(25, 4, 2, 3, 1),
(26, 26, 7, 1, 1),
(27, 23, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `institute` varchar(99) NOT NULL,
  `totalmarks` int(11) NOT NULL,
  `obtainedmarks` int(11) NOT NULL,
  `start` varchar(99) NOT NULL,
  `end` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `userid`, `title`, `institute`, `totalmarks`, `obtainedmarks`, `start`, `end`) VALUES
(1, 2, 'Software Engineering', 'Superior College Lahore', 4, 3, '08/2018', 'Present'),
(2, 2, 'ICS - Physics', 'Superior College Sargodha', 1100, 708, '05/2016', '05/2018'),
(3, 2, 'Matric', 'Govt. Higher Secondary School Lalian', 1100, 756, '03/2014', '03/2016'),
(6, 4, 'BS Software Engineering', 'Superior College Lahore', 4, 3, '08/2018', 'Present'),
(7, 4, 'FSc Pre Engineering', 'Lakar bakar College Lahore', 1100, 700, '05/2016', '05/2018'),
(8, 4, 'Matric', 'DPS Lahore', 1100, 852, '03/2016', '03/2018'),
(9, 7, 'BS Data Science', 'Punjab University Lahore', 4, 4, '08/2020', 'Present'),
(10, 7, 'ICS - Physics', 'Punjab College Lahore', 1100, 750, '05/2018', '05/2020'),
(11, 7, 'Matric', 'Lahore Grammer School', 1100, 805, '03/2015', '03/2017'),
(12, 8, 'BS Software Engineering', 'Superior College Lahore', 4, 4, '08/2018', 'Present'),
(13, 8, 'ICS - Physics', 'Degree College Shueikhu Pura', 1100, 999, '05/2016', '05/2018'),
(14, 10, 'Software Engineering', 'Superior College lahore', 4, 3, '08/2018', 'Present'),
(15, 10, 'ICs ', 'Superior College Sargodha', 1100, 708, '05/2016', '05/2018'),
(16, 11, 'Software Engineering', 'Superior University', 4, 4, '10/2018', 'Present'),
(17, 11, 'ICS Pre Medical', 'Superior Sheikhupura', 1100, 840, '04/2016', '05/2018');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `img` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `status`, `title`, `img`) VALUES
(1, 1, 'PHP - Backend developer \r\n', 'img/chair.jpg'),
(2, 0, 'Search Engine Optimizer / SEO Specialist', 'img/chart.jpg'),
(3, 0, 'Royal Tag Finance Internship October 2020', 'img/clock.jpg'),
(4, 0, 'Machine Learning / Data Science Internship', 'img/code.jpg'),
(5, 0, 'Software Engineer Intern', 'img/notes.jpg'),
(6, 1, 'Sugar Mills Jobs 2020 for Audit Manager', 'img/web.jpg'),
(7, 0, 'Laravel Developer - Senior ', 'img/chart.jpg'),
(8, 0, 'internship in Java Script', 'img/code.jpg'),
(9, 0, 'Machine Learning Internship.', 'img/clock.jpg'),
(10, 0, 'Data Science Internship', 'img/bandage.jpg'),
(11, 0, 'Call Center Job', 'img/chart.jpg'),
(12, 0, 'Ruby on Rails Developer - Full Time', 'img/clock.jpg'),
(13, 0, 'Data Science Research Assistant', 'img/sq8.jpeg'),
(14, 0, 'Customer Success Executive', 'img/code.jpg'),
(15, 0, 'Data Analyst - Data Science', 'img/sq11.jpeg'),
(16, 0, 'Assistant Network Administrator', 'img/sq1.jpg'),
(17, 0, 'Asst. Manager Revenue - Receivable Management', 'img/sq10.jpeg'),
(18, 1, 'National Program Officer: Anti-Corruption', 'img/sq5.jpeg'),
(19, 0, 'Relationship Executive Recovery', 'img/sq15.jpeg'),
(20, 0, 'Branch Manager – Lahore Branch', 'img/sq3.jpg'),
(21, 0, 'Winter Internship 2021 - Finance & Accounting', 'img/sq13.jpeg'),
(22, 0, 'Operations Analyst Manager', 'img/sq10.jpeg'),
(23, 0, 'WMO Jobs in Chiniot, Pakistan', 'img/sq3.jpg'),
(24, 1, 'Supply Chain and Order Processing', 'img/sq12.jpeg'),
(25, 0, 'Accounts Executive', 'img/sq8.jpeg'),
(26, 0, 'Requirement Engineer', 'img/sq5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `pass` varchar(99) NOT NULL,
  `address` varchar(999) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `about` varchar(3000) NOT NULL,
  `profile` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `pass`, `address`, `phone`, `about`, `profile`) VALUES
(1, 'admin', 'admin@jobies.pk', 'admin', 'Lahore.', '-----------------', 'Admin', 'img/njm.png'),
(2, 'Najam Ul Saqib', '1najamulsaqib@gmail.com', '123', 'Lalian', '03127714857', 'Jobless', 'img/njm.png'),
(3, 'Rana Hamza', 'rh5000@gmail.com', '123', 'Okara', '03000000000', 'Wehlay paa g Full time', 'img/profile.png'),
(4, 'Mian Ali', 'mapass@gmail.com', '123', 'Lahore', '03000000000', '6 din wehla ty jummay di chutti', 'img/profile.png'),
(5, 'Ahmad Khan', 'ak47@gmail.com', '123', 'Sargodha', '03000000000', 'Wehlay paa g Full time', 'img/profile.png'),
(6, 'ghazanfar Ali', 'gh@gmail.com', '123', 'Lahore', '02131231231', 'Why so serious! ', 'img/profile.png'),
(7, 'Muhammad Jibraeel', 'mjbhatti@gmail.com', '123', 'House no 301, Gali Madni Masjid, Mohalla Tariqabad Lalian.', '03333333333', 'My name is Muhammad jibraeel, pationate about doing projects on machine learning and artificial intelligence. ', 'img/clock.jpg'),
(8, 'Mubeen Ul Haq', 'mobi@gmail.com', '123', 'Sheikhu Pura', '0312741258', '6 din Wehlay ty Jummay di Chutti.', 'img/haza1881642.jpeg'),
(9, 'Haris Amin', 'haris@gmail.com', '123', 'Lahore. Cant', '03203123928', 'Wehla full', 'img/‪sq6.jpeg'),
(10, 'Wajahat Naqwi', 'wajahat@gmail.com', '123', 'Lahore', '78687687687', 'Student', 'img/profile.png'),
(11, 'Talha Waqar', 'talha@gmail.com', '123', 'Okara, Sheikhupura.', '03009988776', '6 din Wehlay ty jummay di chutti', 'img/clock8590494.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `jobtitle` varchar(99) NOT NULL,
  `company` varchar(99) NOT NULL,
  `aboutjob` varchar(3000) NOT NULL,
  `startjob` varchar(99) NOT NULL,
  `endjob` varchar(99) NOT NULL,
  `experiance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `userid`, `jobtitle`, `company`, `aboutjob`, `startjob`, `endjob`, `experiance`) VALUES
(1, 2, 'SEO-Internee', 'Muqit.com', 'Seo Internship at MuQit.com', '05/2019', '08/2019', 1),
(2, 2, 'Marketing Internship', 'Danish Munir and Co.', 'Marketing Internship at Danish Munir and Co.', '08/2019', '12/2019', 1),
(3, 2, 'PHP-Internship', 'Alpha tech', 'PHP-Internship at Alpaha Tech', '01/2020', '06/2020', 1),
(4, 4, 'SEO Internship', 'MuQit', 'SEO Internship at Muqit.co', '05/2019', '08/2019', 1),
(5, 4, 'Call Center', 'Alpha Tech', 'International Caller', '02/2020', '05/2020', 1),
(6, 7, 'Internship In Data Sciences', 'Alpha Tech', 'Sound concepts of Algorithms, OOP, Databases, Requirement Engineering and good Logic Building.', '04/2019', '08/2019', 1),
(7, 8, 'SEO - Internship', 'Muqit', 'Astagfirullah!', '06/2019', '10/2019', 1),
(8, 10, 'Laravel Initernship', 'Muqit', 'Laravel internship', '06/2018', '09/2018', 1),
(9, 11, 'SRE', 'Bentley', 'Full tame Yo scene', '03/2019', 'Present', 1),
(10, 11, 'Requirement Engineer', 'Alpha Roots', 'Full tame Yo scene', '01/2017', '01/2019', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  ADD PRIMARY KEY (`aj_id`),
  ADD KEY `jobid` (`jobid`),
  ADD KEY `jobid_2` (`jobid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  MODIFY `aj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  ADD CONSTRAINT `appliedjobs_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`jobid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appliedjobs_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
