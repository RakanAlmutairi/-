-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 أبريل 2021 الساعة 23:41
-- إصدار الخادم: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- بنية الجدول `done`
--

CREATE TABLE `done` (
  `work_num` int(11) NOT NULL,
  `place` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `num_people` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `job_type`
--

CREATE TABLE `job_type` (
  `work_num` int(11) NOT NULL,
  `job_des` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `num_people` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `join_need`
--

CREATE TABLE `join_need` (
  `join_need` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `ID` varchar(10) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `num_need` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `join_work`
--

CREATE TABLE `join_work` (
  `join_id` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `ID` varchar(10) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `work_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `need`
--

CREATE TABLE `need` (
  `num_need` int(11) NOT NULL,
  `place` varchar(30) NOT NULL,
  `type_need` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `Name` varchar(50) NOT NULL,
  `ID` varchar(10) NOT NULL,
  `Phone_number` varchar(10) NOT NULL,
  `Pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `done`
--
ALTER TABLE `done`
  ADD KEY `doneing` (`work_num`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`work_num`);

--
-- Indexes for table `join_need`
--
ALTER TABLE `join_need`
  ADD PRIMARY KEY (`join_need`);

--
-- Indexes for table `join_work`
--
ALTER TABLE `join_work`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`num_need`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `work_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_need`
--
ALTER TABLE `join_need`
  MODIFY `join_need` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_work`
--
ALTER TABLE `join_work`
  MODIFY `join_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `need`
--
ALTER TABLE `need`
  MODIFY `num_need` int(11) NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `done`
--
ALTER TABLE `done`
  ADD CONSTRAINT `doneing` FOREIGN KEY (`work_num`) REFERENCES `job_type` (`work_num`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
