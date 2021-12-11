-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 04:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lewansys`
--

-- --------------------------------------------------------

--
-- Table structure for table `clg_ins_bookmark_jobs`
--

CREATE TABLE `clg_ins_bookmark_jobs` (
  `id` int(10) NOT NULL,
  `clg_ins_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `college_institution`
--

CREATE TABLE `college_institution` (
  `id` int(10) NOT NULL,
  `type` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `category` varchar(100) NOT NULL,
  `about_us` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `college_institution_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `google` varchar(200) NOT NULL,
  `twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_institution`
--

INSERT INTO `college_institution` (`id`, `type`, `username`, `mobile`, `profile`, `address`, `category`, `about_us`, `image`, `video`, `college_institution_name`, `email`, `password`, `facebook`, `google`, `twitter`) VALUES
(2, 'institution', 'rahul123', '', 'upload/images/5960-2021-12-10.jpg', '', '', '', 'upload/images/0440-2021-12-10.jpg', '', '', 'rahul@gmail.com', '1234', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `category` varchar(100) NOT NULL,
  `about_us` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `google` varchar(20) NOT NULL,
  `twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `username`, `mobile`, `profile`, `address`, `category`, `about_us`, `image`, `video`, `company_name`, `email`, `password`, `facebook`, `google`, `twitter`) VALUES
(1, 'jpmart', '08778624681', 'upload/images/0539-2021-11-24.jpg', 'Rahul Nagar, damodarpur, Muzaffarpur, Bihar', '', '', '', '', 'BooksBear', 'harisudhan05@gmail.com', '344555', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `job_location` varchar(200) NOT NULL,
  `job_type` varchar(200) NOT NULL,
  `job_experience` varchar(200) NOT NULL,
  `job_salary_range` varchar(200) NOT NULL,
  `job_qualification` varchar(200) NOT NULL,
  `job_gender` varchar(20) NOT NULL,
  `job_vacancy` int(5) NOT NULL,
  `job_last_date` varchar(50) NOT NULL,
  `job_description` varchar(400) NOT NULL,
  `responsibilities` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `other_benefits` varchar(300) NOT NULL,
  `country` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `web_address` varchar(100) NOT NULL,
  `company_profile` varchar(300) NOT NULL,
  `package` varchar(200) NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `job_title`, `job_category`, `job_location`, `job_type`, `job_experience`, `job_salary_range`, `job_qualification`, `job_gender`, `job_vacancy`, `job_last_date`, `job_description`, `responsibilities`, `education`, `other_benefits`, `country`, `city`, `pincode`, `location`, `company_name`, `web_address`, `company_profile`, `package`, `payment_method`, `status`) VALUES
(1, 1, 'Manager', 'Health Care', 'Bangalore', 'Part Time', 'Experience (Optional)', 'ghf', 'Qualification', 'Gender', 0, '21-01-2021', '', '', '', '', 'Country', 'City', '', '', '', '', '', '1', '', 'active'),
(2, 1, 'Team Leader', 'Select Category', 'Chennai', 'Freelancer', 'Experience (Optional)', '', 'Qualification', 'Gender', 0, '01-11-2021', '', '', '', '', 'Country', 'City', '', '', '', '', '', '1', '', ''),
(3, 1, 'Team Leader', 'Select Category', 'Chennai', 'Freelancer', 'Experience (Optional)', '', 'Qualification', 'Gender', 0, '01-11-2021', '', '', '', '', 'Country', 'City', '', '', '', '', '', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `college_institution` int(10) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `profile` varchar(300) NOT NULL,
  `age` int(3) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `job_type` varchar(200) DEFAULT NULL,
  `experience` varchar(200) DEFAULT NULL,
  `salary_range` varchar(200) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `skill` varchar(250) DEFAULT NULL,
  `about` varchar(200) DEFAULT NULL,
  `work_experience` varchar(300) DEFAULT NULL,
  `spl_qualification` varchar(250) DEFAULT NULL,
  `cv_file` varchar(250) DEFAULT NULL,
  `cover_letter` varchar(300) DEFAULT NULL,
  `social_portfolio` varchar(300) DEFAULT NULL,
  `pd_name` varchar(250) DEFAULT NULL,
  `pd_father_name` varchar(300) DEFAULT NULL,
  `pd_mother_name` varchar(300) DEFAULT NULL,
  `pd_dob` varchar(200) DEFAULT NULL,
  `pd_nationality` varchar(250) DEFAULT NULL,
  `pd_sex` varchar(250) DEFAULT NULL,
  `pd_address` varchar(300) DEFAULT NULL,
  `pd_age` int(3) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `google` varchar(300) DEFAULT NULL,
  `linkedin` varchar(300) DEFAULT NULL,
  `pinterest` varchar(300) DEFAULT NULL,
  `instagram` varchar(300) DEFAULT NULL,
  `behance` varchar(300) DEFAULT NULL,
  `dribbble` varchar(300) DEFAULT NULL,
  `github` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `college_institution`, `username`, `email`, `password`, `mobile`, `address`, `profile`, `age`, `name`, `category`, `location`, `job_type`, `experience`, `salary_range`, `qualification`, `gender`, `dob`, `skill`, `about`, `work_experience`, `spl_qualification`, `cv_file`, `cover_letter`, `social_portfolio`, `pd_name`, `pd_father_name`, `pd_mother_name`, `pd_dob`, `pd_nationality`, `pd_sex`, `pd_address`, `pd_age`, `facebook`, `twitter`, `google`, `linkedin`, `pinterest`, `instagram`, `behance`, `dribbble`, `github`) VALUES
(1, 0, 'ramesh', 'ramesh@gmail.com', '12345678', '', '', 'upload/images/6476-2021-11-28.jpg', 23, 'Ramesh', 'Developer', 'Chennai', 'Job Type', '3 Years', '40k', 'Engineering', 'male', '', 'Android,IOS,WEB', 'am jp yes', '', 'developer,designer', '', '', '', 'JP', 'Rajesh', 'Radha', '01-11-2000', 'Indian', 'Male', 'Street East', 23, 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://accounts.google.com/', 'https://www.linkedin.com/in/tim-cook-47522b6', '', '', '', 'dr', 'gi'),
(2, 0, 'dfdg', 'gfgf', NULL, '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(3, 0, NULL, NULL, NULL, '', '', '', 0, 'fgfrhfr', 'Health Care', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(4, 0, NULL, NULL, NULL, '', '', '', 0, 'swswds', 'Garments / Textile', '', 'Job Type', 'Experience (Optional)', '', 'Qualification', 'Gender', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sex', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(6, 2, '', 'prasad@gmail.com', '12345678', '797886786', 'hrgbfb fgbgf gf gfnfg', 'upload/images/8435-2021-11-25.jpg', 0, 'jaya prasad', 'Developer', 'Bangalore', NULL, NULL, NULL, NULL, NULL, NULL, 'design,developer', '', NULL, NULL, 'upload/images/3075-2021-11-25.jpg', 'upload/images/2607-2021-11-25.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(7, 0, 'vicky', 'vicky@gmail.com', '12345678', '9827328', '', 'upload/images/5479-2021-11-29.jpg', 23, 'Vicky Kumar', 'Designer', 'Chennai', 'Part Time', '5 Year', '20k - 40k', 'Engineering', 'male', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, '', 'surya@gmail.com', '12345678', '2434343', 'street west', 'upload/images/4596-2021-12-01.jpg', 24, 'surya surya', 'designer', 'Chennai', 'Part Time', '2 years', '20k to 40 k', 'Engineering', 'male', NULL, 'developer', 'am surya as developer', NULL, 'web development', 'upload/images/1719-2021-12-01.sql', 'upload/images/5231-2021-12-01.php', NULL, 'JP', 'Rajesh', 'Radha', '01-11-2000', 'Indian', 'Male', 'Street East', 23, 'https://www.facebook.com/', '', '', '', '', '', '', '', ''),
(41, 0, NULL, NULL, NULL, '', '', '', 0, '', 'Select Category', '', 'Job Type', 'Experience (Optional)', '', 'Qualification', 'Gender', '', '', '', NULL, '', 'upload/images/6510-2021-12-10.', '', NULL, 'jp am', '', '', '', '', 'Sex', '', NULL, '', '', '', '', '', '', '', '', ''),
(42, 0, NULL, NULL, NULL, '', '', '', 0, '', 'Select Category', '', 'Job Type', 'Experience (Optional)', '', 'Qualification', 'Gender', '', '', '', NULL, '', 'upload/images/1871-2021-12-10.php', '', NULL, 'hi', '', '', '', '', 'Sex', '', NULL, '', '', '', '', '', '', '', '', ''),
(43, 2, NULL, NULL, NULL, '', '', '', 0, 'armstrong', 'Select Category', '', 'Job Type', 'Experience (Optional)', '', 'Qualification', 'Gender', '', '', '', NULL, '', 'upload/images/0127-2021-12-10.', '', NULL, '', '', '', '', '', 'Sex', '', NULL, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_job`
--

CREATE TABLE `student_job` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_job`
--

INSERT INTO `student_job` (`id`, `student_id`, `job_id`, `status`) VALUES
(7, 1, 1, 'applied'),
(8, 1, 2, 'applied'),
(9, 1, 3, 'applied');

-- --------------------------------------------------------

--
-- Table structure for table `stu_bookmark_jobs`
--

CREATE TABLE `stu_bookmark_jobs` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stu_edu`
--

CREATE TABLE `stu_edu` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `edu_designation` varchar(230) NOT NULL,
  `edu_institute` varchar(230) NOT NULL,
  `edu_period` varchar(230) NOT NULL,
  `edu_description` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_edu`
--

INSERT INTO `stu_edu` (`id`, `student_id`, `edu_designation`, `edu_institute`, `edu_period`, `edu_description`) VALUES
(6, 1, 'Computer Science Engineering', 'Harward University', '2018 - present', '   cdcfd f fdfd'),
(14, 9, 'edudes', 'jpins', 'eduper', 'edudes'),
(16, 0, 'des 1', 'ins 1', 'per 1', 'desc 1'),
(17, 0, 'des 2', 'ins 2', 'per 2', 'des 2'),
(18, 0, 'des 1', 'ins 1', 'per 1', 'hn'),
(19, 33, 'des 1', 'ins 1', 'per 1', 'jkhgk'),
(20, 33, 'des 2', 'ins 2', 'per 2', 'sfdsvdvd'),
(21, 33, '', '', '', ''),
(22, 34, '', '', '', ''),
(23, 35, '', '', '', ''),
(24, 36, '', '', '', ''),
(25, 37, '', '', '', ''),
(26, 38, '', '', '', ''),
(27, 39, '', '', '', ''),
(28, 40, '', '', '', ''),
(29, 41, '', '', '', ''),
(30, 42, '', '', '', ''),
(31, 43, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stu_port`
--

CREATE TABLE `stu_port` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `port_title` varchar(230) NOT NULL,
  `port_image` varchar(230) NOT NULL,
  `port_link` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_port`
--

INSERT INTO `stu_port` (`id`, `student_id`, `port_title`, `port_image`, `port_link`) VALUES
(1, 1, 'fefcdsc', 'upload/images/1480-2021-12-02.jpg', 'https://www.geeksforgeeks.org/how-to-get-multiple-selected-values-of-select-box-in-php/'),
(2, 1, 'fefcdsc', 'upload/images/0499-2021-12-02.png', 'https://www.panasonic.com/in/consumer/home-entertainment/televisions.html'),
(3, 40, 'kum port', 'upload/images/3340-2021-12-09.jpg', 'dsc d ds  fs fd '),
(4, 41, '', 'upload/images/0053-2021-12-10.', ''),
(5, 42, '', 'upload/images/9831-2021-12-10.', ''),
(6, 43, '', 'upload/images/7639-2021-12-10.', '');

-- --------------------------------------------------------

--
-- Table structure for table `stu_prof`
--

CREATE TABLE `stu_prof` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `pro_designation` varchar(230) NOT NULL,
  `pro_title` varchar(230) NOT NULL,
  `pro_value` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_prof`
--

INSERT INTO `stu_prof` (`id`, `student_id`, `pro_designation`, `pro_title`, `pro_value`) VALUES
(2, 1, 'Developer', 'App Developer', 70),
(3, 1, 'We Designer', 'Web Development', 90),
(4, 34, '', '', 0),
(5, 35, '', '', 0),
(6, 36, '', '', 0),
(7, 37, '', '', 0),
(8, 38, '', '', 0),
(9, 39, '', '', 0),
(10, 40, '', '', 0),
(11, 41, '', '', 0),
(12, 42, '', '', 0),
(13, 43, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stu_work_exp`
--

CREATE TABLE `stu_work_exp` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `exp_title` varchar(300) NOT NULL,
  `exp_company_name` varchar(300) NOT NULL,
  `exp_period` varchar(300) NOT NULL,
  `exp_description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_work_exp`
--

INSERT INTO `stu_work_exp` (`id`, `student_id`, `exp_title`, `exp_company_name`, `exp_period`, `exp_description`) VALUES
(3, 1, 'Developer', 'GOOGLE', '2019-2024', 'Am Developer'),
(4, 34, '', '', '', ''),
(5, 35, '', '', '', ''),
(6, 36, '', '', '', ''),
(7, 37, '', '', '', ''),
(8, 38, '', '', '', ''),
(9, 39, '', '', '', ''),
(10, 40, '', '', '', ''),
(11, 41, '', '', '', ''),
(12, 42, '', '', '', ''),
(13, 43, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clg_ins_bookmark_jobs`
--
ALTER TABLE `clg_ins_bookmark_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_institution`
--
ALTER TABLE `college_institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_job`
--
ALTER TABLE `student_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_bookmark_jobs`
--
ALTER TABLE `stu_bookmark_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_edu`
--
ALTER TABLE `stu_edu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_port`
--
ALTER TABLE `stu_port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_prof`
--
ALTER TABLE `stu_prof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_work_exp`
--
ALTER TABLE `stu_work_exp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clg_ins_bookmark_jobs`
--
ALTER TABLE `clg_ins_bookmark_jobs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `college_institution`
--
ALTER TABLE `college_institution`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `student_job`
--
ALTER TABLE `student_job`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stu_bookmark_jobs`
--
ALTER TABLE `stu_bookmark_jobs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stu_edu`
--
ALTER TABLE `stu_edu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `stu_port`
--
ALTER TABLE `stu_port`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stu_prof`
--
ALTER TABLE `stu_prof`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stu_work_exp`
--
ALTER TABLE `stu_work_exp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
