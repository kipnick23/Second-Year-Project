-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 08:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectid` int(11) NOT NULL,
  `projectname` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `response` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=new\r\n1=in progress\r\n2=closed',
  `emp_id` int(11) DEFAULT NULL,
  `emp_by` int(10) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectid`, `projectname`, `description`, `response`, `status`, `emp_id`, `emp_by`, `date_created`, `date_updated`) VALUES
(2, 'Documentation', 'write recomendation letter', '', 0, NULL, NULL, '0000-00-00 00:00:00', NULL),
(23, 'proj1', 'description 1', '', 0, 29, NULL, '0000-00-00 00:00:00', NULL),
(24, 'proj2', 'description 2', '', 0, 30, NULL, '0000-00-00 00:00:00', NULL),
(25, 'Task1', 'urgent', '', 0, 0, 40, '0000-00-00 00:00:00', '2022-05-17 12:44:26'),
(26, 'Task2', '', '', 1, 0, 40, '0000-00-00 00:00:00', '2022-05-17 12:31:51'),
(27, 'Task3', 'I have finished', '', 2, 44, 40, '0000-00-00 00:00:00', '2022-05-17 12:36:14'),
(28, 'task', 'Updated!', '', 1, 44, 40, '0000-00-00 00:00:00', '2022-05-17 12:35:52'),
(30, 'task for kevin 2', 'Updated', '', 1, 44, 40, '2022-05-17 14:55:43', '2022-05-17 14:59:48'),
(31, '', '', 'updated again', 1, 43, 40, '2022-05-17 22:00:18', '2022-05-17 22:19:08'),
(32, 'task', 'The Dean of Students and Career Services in partnership with Confucius Institute at the University of Nairobi (CIUON) has organised a linking platform between the business enterprises and potential employees. \r\nIn order to help various enterprises fill job vacancies and provide employment', 'DONE', 2, 43, 40, '2022-05-17 22:27:43', '2022-05-17 22:29:26'),
(33, 'task 2', 'new', '', 0, 43, 40, '2022-05-17 22:58:00', NULL),
(34, 'TASK', 'new task', '', 0, 45, 40, '2022-05-18 09:35:45', NULL),
(35, 'Task', 'task for emp2', 'Will do it tomorrow', 1, 42, 40, '2022-05-18 13:48:07', '2022-05-18 13:49:07'),
(36, 'Task for victor', 'description', '', 0, 47, 46, '2022-05-18 21:29:50', NULL),
(37, 'Task2 for victor', 'description', 'DONE', 2, 47, 46, '2022-05-18 21:30:11', '2022-05-18 21:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usercode` int(30) NOT NULL,
  `userid` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `emp_by` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `type` tinyint(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usercode`, `userid`, `firstname`, `lastname`, `username`, `gender`, `email`, `department`, `emp_by`, `password`, `date_created`, `date_updated`, `type`) VALUES
(1, 32139646, 'Kipngetich', 'Nickson', 'kipnick.sci22', 'male', 'kipnicksci22@gmail.com', '', '', '$2y$10$hAAtKxMeLmj4d3afywT8ueI0Id1iOV42n5o9tFQFVD5Ikgltnx4Di', '2022-05-02 11:29:31', '2022-05-16 16:26:03', 0),
(29, 0, 'Emp1', '', 'Emp1.22', 'male', '', 'HR', '1', '$2y$10$xokicTrS9pqw1.O43Yf..O5P08rI.wfG1HHmHd8UU8b1E0rBzH/Bq', '2022-05-16 19:05:47', NULL, 2),
(30, 0, 'Emp2', '', 'Emp2.22', 'female', '', 'Legal', '1', '$2y$10$f6jcPABuFC/IRyWN6k58M.DGOfVeqF0Vq0PAxUVlrqfDCx5wK.8pK', '2022-05-16 20:46:11', NULL, 2),
(31, 0, 'Emp3', '', 'Emp3.22', 'female', '', '', '1', '$2y$10$32dsPgwvHfSpSVhu5QE98u6A6.gcI7/iJux8Bd4lWi5Q5WcnKcVQa', '2022-05-16 20:46:52', NULL, 2),
(32, 0, 'Emp4', '', 'Emp4.22', 'female', '', '', '1', '$2y$10$iS7TdIPMAzI7IOzA49ivjuHjtkgG31AKMXfKvSGyNeEqd2zzh4TlO', '2022-05-16 20:47:17', NULL, 2),
(33, 0, 'Emp5', '', 'Emp5.22', 'male', '', '', '1', '$2y$10$9TBX1LqTuuqcAu1Z8sEf7uM3s2QHD0FMaU/SCp7.Aqh0XlTGNrnUm', '2022-05-16 20:48:01', NULL, 2),
(34, 0, 'Emp6', '', 'Emp6.22', 'male', '', '', '1', '$2y$10$HHqJpqGgK4aPVEY3Mv/dMOQPZWdTjEF9PMfSFZRUPpjwhyZtvvFDa', '2022-05-16 20:54:47', NULL, 2),
(35, 0, 'Mercy', 'Employer2', 'Mercy.22', 'female', 'mercy22@gmail.com', '', '', '$2y$10$BIQ4ZiyjBZNe8QHQddmM1.QZy0B1wr2tl8St.lYWe03/Pw4KlpKWa', '2022-05-16 21:44:41', NULL, 1),
(36, 0, '', '', 'MercyEmp1', 'female', '', '', '35', '$2y$10$MhC0qikF7L/CJd4F8QUEw.pKeWicY152gb4GBL0F9.CDaY0NNVk1C', '2022-05-16 21:46:23', NULL, 2),
(37, 0, '', '', 'MercyEmp2', 'male', '', '', '35', '$2y$10$xuO0tF.TzTLpYUAWVj1StOlvEiEm1ErZP3GCLK17D2FJBVxoO5vB.', '2022-05-16 21:46:41', NULL, 2),
(38, 0, '', '', 'MercyEmp3', 'female', '', '', '35', '$2y$10$oEJieyOnU0KEo.07ogX0KuyHIaxNrqGRvX.W/EO3M4hRreQGrtZo6', '2022-05-16 21:47:04', NULL, 2),
(39, 0, '', '', 'MercyEmp4', 'male', '', '', '35', '$2y$10$.MkPlV64J2m8iWPXO/JWyO5E4hvTOn.0HTnvjqvoejcgdty2Py3fq', '2022-05-16 21:48:07', NULL, 2),
(40, 32123343, 'Kevin', 'EMployer3', 'Kevin.22', 'male', 'kevin22@gmail.com', 'HR', '', '$2y$10$.K29H.J6F2lNXx5nGM/6Z.tJDBZNbyNzRdj8l6/n6Tu.720SarSqq', '2022-05-16 21:57:53', '2022-05-18 13:43:49', 1),
(41, 0, '', '', 'KevinEmp1', 'male', '', 'HR', '40', '$2y$10$S0Kiffz8yrOMWVAGNiDLpe2KA6TcolcTGpRKRv4UOhEfcA2fZs2GC', '2022-05-16 21:58:59', '2022-05-18 13:37:44', 2),
(42, 0, '', '', 'KevinEmp2', 'female', '', '', '40', '$2y$10$f8vduFF0gRb7aDz2NUk6nOQrP73ywVS31ydhnF076QpBAjBiphAcu', '2022-05-16 21:59:32', NULL, 2),
(45, 0, '', '', 'KevinEmp3', 'female', '', 'Legal', '40', '$2y$10$QhyhqzlyF1SzPDMZF7qhFOLcRkFx4PEg3HnPqIdyRhDk3ZFtR1ejC', '2022-05-17 11:09:28', NULL, 2),
(46, 32123432, 'Kipngetich', 'Nicky', 'kipnicky.sci22', 'male', 'kipnicky22@gmail.com', '', '', '$2y$10$4CUp0LkuJCEuQIwEcmE0M.R4nOINXVm87HJVHLYRpt4wTQ0MbAF..', '2022-05-18 21:27:18', '2022-05-18 21:28:01', 1),
(47, 21321312, 'Victor', 'Kiptoo', 'KipVick22', 'male', 'kipvick@gmail.com', 'Human Resource', '46', '$2y$10$p7DLr8fkntkVZaAcXuZK/.DCrqOYfFov4Wjp9o32EbComswh6MFie', '2022-05-18 21:29:18', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usercode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usercode` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
