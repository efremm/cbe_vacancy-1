-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 09:53 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cbe_vacancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_catagory`
--

CREATE TABLE `job_catagory` (
  `Job_catagory_id` int(10) NOT NULL,
  `catagory_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `inserted_by` varchar(30) NOT NULL,
  `date_inserted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_catagory`
--

INSERT INTO `job_catagory` (`Job_catagory_id`, `catagory_name`, `description`, `inserted_by`, `date_inserted`) VALUES
(1, 'programming and system adminsinstration', 'programming and system adminsinstration\r\nprogramming and system adminsinstration', 'birhan', '2018-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE `tbl_applicant` (
  `Applicant_id` int(10) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`Applicant_id`, `FirstName`, `MiddleName`, `LastName`, `Mobile`, `Gender`, `DOB`, `picture`) VALUES
(8, 'Birhan', 'Nega', 'Mohammed', '+251925479078', 'Male', '1983-09-12', ''),
(9, 'ebrahim', 'meeruf', 'Mohammed', '+251925479077', 'Male', '1983-09-12', ''),
(10, 'birhan', 'Mekuanint', 'cheru', '+251925479078', 'Male', '1983-09-12', ''),
(11, 'birhan', 'Nega', 'Mohammed', '+251925479078', 'Male', '1983-09-12', ''),
(12, 'birhan', 'Nega', 'Mohammed', '+251925479078', 'Male', '1983-09-12', ''),
(13, 'seid ', 'nur', 'Abdela', '+251925479078', 'Male', '1983-09-12', ''),
(14, 'efrem', 'mulu', 'areya', '+251925479077', 'Male', '1986-09-12', 'dawud.JPG'),
(15, 'tekr', 'dino', 'Mohammed', '+251925479078', 'Male', '1967-05-11', 'dawud1.JPG'),
(16, 'hana ', 'Getahun', 'meeruf', '+251925479078', 'FeMale', '1983-09-12', 'android_new.jpg'),
(17, 'tesfaye', 'desalegn', 'Mohammed', '+251925479078', 'Male', '1996-05-12', 'android_new1.jpg'),
(18, 'birhan', 'nega', 'cheru', '+251925479078', 'Male', '1996-05-11', 'dawud4.JPG'),
(19, 'jemila', 'mustofa', 'Mohammed', '+251925479078', 'FeMale', '1996-05-08', 'std21.jpg'),
(20, 'birhan', 'Nega', 'Mohammed', '+251925479078', 'FeMale', '1987-09-12', 'std61.jpg'),
(21, 'tesfaye', 'seifu', 'seify', '0925479078', 'Male', '1993-05-03', 'android_new2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_address`
--

CREATE TABLE `tbl_applicant_address` (
  `Region_id` int(10) NOT NULL,
  `zone_id` int(10) NOT NULL,
  `wereda_name` varchar(30) NOT NULL,
  `Applicant_id` int(10) NOT NULL,
  `kebele` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant_address`
--

INSERT INTO `tbl_applicant_address` (`Region_id`, `zone_id`, `wereda_name`, `Applicant_id`, `kebele`) VALUES
(0, 0, 'mekdela', 9, '020'),
(1, 0, 'mekdela', 13, '020'),
(1, 0, 'mekdela', 14, '020'),
(1, 0, 'mekdela', 15, '020'),
(2, 0, 'mekdela', 16, '020'),
(1, 0, 'mekdela', 17, '020'),
(1, 0, 'mekdela', 18, '020'),
(1, 0, 'mekdela', 19, '020'),
(3, 0, 'mekdela', 20, '020'),
(3, 1, 'mekdela', 21, '020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_educational_background`
--

CREATE TABLE `tbl_applicant_educational_background` (
  `Applicant_id` int(10) NOT NULL,
  `Institution` text NOT NULL,
  `department_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant_educational_background`
--

INSERT INTO `tbl_applicant_educational_background` (`Applicant_id`, `Institution`, `department_id`, `start_date`, `end_date`, `id`) VALUES
(14, 'Adama science and technology university', 0, '2016-05-24', '2018-05-25', 1),
(15, '', 0, '0000-00-00', '0000-00-00', 2),
(16, 'Haromaya university', 0, '2018-05-11', '2018-05-11', 3),
(17, 'Addis ababa university', 0, '2018-05-15', '2018-05-11', 4),
(19, 'Kotebe metroplitan university', 0, '2018-05-10', '2018-05-11', 5),
(20, 'Adama science and technology university', 0, '2018-05-12', '2018-05-12', 6),
(21, 'Adama science and technology university', 0, '2018-05-11', '2018-05-13', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_user_account`
--

CREATE TABLE `tbl_applicant_user_account` (
  `Applicant_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_inserted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant_user_account`
--

INSERT INTO `tbl_applicant_user_account` (`Applicant_id`, `username`, `password`, `date_inserted`) VALUES
(14, 'efrem', 'efrem', '0000-00-00'),
(15, 'tenkr', 'tenkr', '0000-00-00'),
(16, 'hana', 'hana', '0000-00-00'),
(17, 'tes', 'tes', '0000-00-00'),
(19, 'jimi', 'jimi', '0000-00-00'),
(20, 'birhan', 'birhan', '0000-00-00'),
(21, 'tes', 'tes', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regions`
--

CREATE TABLE `tbl_regions` (
  `Region_id` int(10) NOT NULL,
  `regionName` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_regions`
--

INSERT INTO `tbl_regions` (`Region_id`, `regionName`, `description`) VALUES
(1, 'Tigray', 'tigray regional state'),
(2, 'Afar', 'afar regional state'),
(3, 'Amhara', 'Amhara regional state'),
(4, 'oromia', 'oromia regional state'),
(5, 'somalia', 'somalia region'),
(6, 'Benishangul gumz', 'Benishangul gumz regional state'),
(7, 'SNNPr', 'southern nations nationalities and peoples '),
(8, 'Gambellla ', 'GAMBELA REGIONAL STATE'),
(9, 'HARERI', 'HARERI REGIONAL STATE'),
(10, 'ADDIS ABABAB CITY ADMINISTRATION', 'ADDIS ABABAB CITY ADMINISTRATION'),
(11, 'DIRE DAWA CITY ADMINISTRATION', 'DIRE DAWA CITY ADMINISTRATION');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `Staff_ID` int(10) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `Staff_ID` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Account_status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`Staff_ID`, `Username`, `password`, `Account_status`) VALUES
(1, 'birhan', 'birhan', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacancy`
--

CREATE TABLE `tbl_vacancy` (
  `job_title` varchar(100) NOT NULL,
  `minumum_salary` int(10) NOT NULL,
  `Maximum_salary` int(10) NOT NULL,
  `Job_catagory_id` int(10) NOT NULL,
  `required_experience` varchar(10) NOT NULL,
  `Job_posted` date NOT NULL,
  `maximum_age` int(10) NOT NULL,
  `cumulative_GPA` double NOT NULL,
  `Brief_Description` text NOT NULL,
  `Detailed_Description` text NOT NULL,
  `Additional_Details` text NOT NULL,
  `vacancy_type` varchar(15) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `vacancy_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vacancy`
--

INSERT INTO `tbl_vacancy` (`job_title`, `minumum_salary`, `Maximum_salary`, `Job_catagory_id`, `required_experience`, `Job_posted`, `maximum_age`, `cumulative_GPA`, `Brief_Description`, `Detailed_Description`, `Additional_Details`, `vacancy_type`, `qualification`, `specialization`, `vacancy_id`) VALUES
('Database admin needed urgently', 4500, 7500, 1, '3', '2018-05-12', 35, 2.9, 'Would you like to be a part of purposeful work that saves lives?\r\n\r\nFor 35 years, in 100 countries, IntraHealth International has empowered health workers to better serve communities in need. IntraHealth fosters local solutions to health care challenges by improving health worker performance, strengthening health systems, harnessing technology, and leveraging partnerships.', 'Would you like to be a part of purposeful work that saves lives?\r\n\r\nFor 35 years, in 100 countries, IntraHealth International has empowered health workers to better serve communities in need. IntraHealth fosters local solutions to health care challenges by improving health worker performance, strengthening health systems, harnessing technology, and leveraging partnerships.', 'Would you like to be a part of purposeful work that saves lives?\r\n\r\nFor 35 years, in 100 countries, IntraHealth International has empowered health workers to better serve communities in need. IntraHealth fosters local solutions to health care challenges by improving health worker performance, strengthening health systems, harnessing technology, and leveraging partnerships.', 'permanent', 'Bsc', 'database management', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_experience`
--

CREATE TABLE `tbl_work_experience` (
  `Applicant_id` int(10) NOT NULL,
  `organization` text NOT NULL,
  `Postion_Id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `experince_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_work_experience`
--

INSERT INTO `tbl_work_experience` (`Applicant_id`, `organization`, `Postion_Id`, `start_date`, `end_date`, `experince_id`) VALUES
(14, 'federal police commission', 0, '2018-05-11', '2018-05-10', 1),
(15, 'federal police commission', 0, '2016-05-17', '2018-05-11', 2),
(16, 'federal police commission', 0, '2018-05-11', '2018-05-11', 3),
(17, 'federal police commission', 0, '2018-05-17', '2018-05-12', 4),
(19, 'federal police commission', 0, '2016-05-24', '2018-05-01', 5),
(20, 'federal police commission', 0, '2018-05-12', '2018-05-12', 6),
(21, 'federal police commission', 0, '2018-05-13', '2018-05-13', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zone`
--

CREATE TABLE `tbl_zone` (
  `zone_id` int(10) NOT NULL,
  `zone_name` text NOT NULL,
  `zone_description` text NOT NULL,
  `Region_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_zone`
--

INSERT INTO `tbl_zone` (`zone_id`, `zone_name`, `zone_description`, `Region_id`) VALUES
(1, 'north wello', 'south wello zonal administration', 3),
(2, 'south welllo', 'south welllo zone administration', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_catagory`
--
ALTER TABLE `job_catagory`
  ADD PRIMARY KEY (`Job_catagory_id`);

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`Applicant_id`);

--
-- Indexes for table `tbl_applicant_address`
--
ALTER TABLE `tbl_applicant_address`
  ADD KEY `Applicant_id` (`Applicant_id`);

--
-- Indexes for table `tbl_applicant_educational_background`
--
ALTER TABLE `tbl_applicant_educational_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_applicant_user_account`
--
ALTER TABLE `tbl_applicant_user_account`
  ADD KEY `Applicant_id` (`Applicant_id`);

--
-- Indexes for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  ADD PRIMARY KEY (`Region_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `tbl_vacancy`
--
ALTER TABLE `tbl_vacancy`
  ADD PRIMARY KEY (`vacancy_id`),
  ADD KEY `Job_catagory_id` (`Job_catagory_id`);

--
-- Indexes for table `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  ADD PRIMARY KEY (`experince_id`),
  ADD KEY `Applicant_id` (`Applicant_id`);

--
-- Indexes for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `region_id` (`Region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `Applicant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_applicant_educational_background`
--
ALTER TABLE `tbl_applicant_educational_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_regions`
--
ALTER TABLE `tbl_regions`
  MODIFY `Region_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `Staff_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_vacancy`
--
ALTER TABLE `tbl_vacancy`
  MODIFY `vacancy_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  MODIFY `experince_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  MODIFY `zone_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_applicant_address`
--
ALTER TABLE `tbl_applicant_address`
  ADD CONSTRAINT `tbl_applicant_address_ibfk_1` FOREIGN KEY (`Applicant_id`) REFERENCES `tbl_applicant` (`Applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_applicant_user_account`
--
ALTER TABLE `tbl_applicant_user_account`
  ADD CONSTRAINT `tbl_applicant_user_account_ibfk_1` FOREIGN KEY (`Applicant_id`) REFERENCES `tbl_applicant` (`Applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vacancy`
--
ALTER TABLE `tbl_vacancy`
  ADD CONSTRAINT `tbl_vacancy_ibfk_1` FOREIGN KEY (`Job_catagory_id`) REFERENCES `job_catagory` (`Job_catagory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_work_experience`
--
ALTER TABLE `tbl_work_experience`
  ADD CONSTRAINT `tbl_work_experience_ibfk_1` FOREIGN KEY (`Applicant_id`) REFERENCES `tbl_applicant` (`Applicant_id`);

--
-- Constraints for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD CONSTRAINT `tbl_zone_ibfk_1` FOREIGN KEY (`Region_id`) REFERENCES `tbl_regions` (`Region_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
