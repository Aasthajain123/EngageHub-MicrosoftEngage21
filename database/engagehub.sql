-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 10:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engagehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `img`) VALUES
(1, 'Aastha Jain', 'MicrosoftEngage', 'profile_picture/61a299ba5ede9HeadLogo.png');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(20) NOT NULL,
  `depname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `depname`) VALUES
(2, 'Computer Science'),
(3, 'Information Tech.'),
(7, 'Biomedical');

-- --------------------------------------------------------

--
-- Table structure for table `general_announcement`
--

DROP TABLE IF EXISTS `general_announcement`;
CREATE TABLE `general_announcement` (
  `id` int(11) NOT NULL,
  `message_title` varchar(255) NOT NULL,
  `message_body` mediumtext NOT NULL,
  `sender` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_announcement`
--

INSERT INTO `general_announcement` (`id`, `message_title`, `message_body`, `sender`, `date`) VALUES
(6, 'Microsoft Engage!', 'Guys this is a really amazing program, Do Register.', 'Aastha', '2021-11-26 11:49:27'),
(8, 'FTE Opportunity!', 'There would be an FTE opportunity via Microsoft Engage, Amazing! :)', 'Aastha', '2021-11-26 11:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id` int(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `mdate` date NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

DROP TABLE IF EXISTS `noticeboard`;
CREATE TABLE `noticeboard` (
  `id` int(20) NOT NULL,
  `file` varchar(500) NOT NULL,
  `dis` varchar(50) NOT NULL,
  `ndatetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public_messages`
--

DROP TABLE IF EXISTS `public_messages`;
CREATE TABLE `public_messages` (
  `Msg_ID` int(11) NOT NULL,
  `Sender` tinytext NOT NULL,
  `Message` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_messages`
--

INSERT INTO `public_messages` (`Msg_ID`, `Sender`, `Message`, `date`) VALUES
(9, 'Aastha', 'Hey Guys!\n', '2021-11-26 11:51:55'),
(10, 'Aastha', 'Have you all heard about this really cool program called Microsoft Engage!', '2021-11-26 11:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `id` int(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `quizdate` date NOT NULL,
  `quiztitle` varchar(20) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `op1` varchar(200) NOT NULL,
  `op2` varchar(200) NOT NULL,
  `op3` varchar(200) NOT NULL,
  `op4` varchar(200) NOT NULL,
  `rightans` varchar(20) NOT NULL,
  `quiztime` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quizresult`
--

DROP TABLE IF EXISTS `quizresult`;
CREATE TABLE `quizresult` (
  `id` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `quizid` int(20) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `id` int(20) NOT NULL,
  `department` int(20) NOT NULL,
  `session` int(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester` (
  `id` int(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `session` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `session`, `department`) VALUES
(12, '7', '23', '2'),
(13, '7', '24', '3'),
(14, '7', '26', '7'),
(15, '5', '27', '2'),
(16, '5', '28', '3'),
(17, '5', '30', '7');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` int(20) NOT NULL,
  `session` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `department`) VALUES
(23, '2018-2022', '2'),
(24, '2018-2022', '3'),
(26, '2018-2022', '7'),
(27, '2019-2023', '2'),
(28, '2019-2023', '3'),
(30, '2019-2023', '7');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `fathername` varchar(20) NOT NULL,
  `rollnum` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `stdemail` varchar(50) NOT NULL,
  `session` int(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `snumber` varchar(20) NOT NULL,
  `img` varchar(300) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `fathername`, `rollnum`, `password`, `stdemail`, `session`, `gender`, `dep`, `snumber`, `img`, `address`) VALUES
(6, 'Aastha', 'Jain', 'Sanmati Jain', '45', 'aasthajain', 'aasthajain@gmail.com', 23, 'female', '2', '+919461572889', 'suploads/61a29b9ef3340WhatsApp Image 2021-07-30 at 4.18.18 PM.jpeg', 'H.N 345, Talwandi Kota'),
(7, 'Anisha ', 'Jain', 'Vijay Jain', '56', 'anishajain', 'anishajain@gmail.com', 24, 'female', '3', '+918209246666', 'suploads/61a0c579a1cf35.jpg', 'S.K. Vihar Kunhadi Kota'),
(8, 'Aarchie', 'Jain', 'Rahul Vijay', '15', 'aarchiejain', 'aarchiejain@gmail.com', 30, 'female', '7', '+918209456380', 'suploads/61a0c5ef6fd547.jpg', 'H.N. 67, Block 3 shashtri vihar, Meera road, Mahar'),
(9, 'Satkar', 'Sharma', 'Vishal Sharma', '23', 'satkarsharma', 'satkarsharma@gmail.com', 23, 'male', '2', '+918345246380', 'suploads/61a0c6c27d3323.jpg', 'H.N. 89 Kanya Vihar, J&K India'),
(10, 'Rayansh', 'Singh', 'Rajnish Singh', '86', 'rayanshsingh', 'rayanshsingh@gmail.com', 30, 'male', '7', '+918209768945', 'suploads/61a0c932eb26311.jpg', 'B.K. Colony Block 9 Kunhadi Kota');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sname`, `department`, `session`, `semester`) VALUES
(2, 'C++', '2', '23', '12'),
(3, 'Data Structures ', '2', '23', '12'),
(5, 'Operating System', '2', '23', '12'),
(6, 'Compiler Design', '3', '24', '13'),
(7, 'Algorithms', '3', '24', '13'),
(8, 'Database Management', '3', '24', '13'),
(9, 'Physics', '7', '26', '14'),
(10, 'Chemistry', '7', '26', '14'),
(11, 'Reactions', '7', '26', '14'),
(12, 'Basics of C', '2', '27', '15'),
(13, 'C Lab', '2', '27', '15'),
(14, 'Computer Fundamental', '2', '27', '15');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE `subscribe` (
  `id` int(20) NOT NULL,
  `emails` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `emails`) VALUES
(1, 'aasthajain@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_uploads`
--

DROP TABLE IF EXISTS `tbl_general_uploads`;
CREATE TABLE `tbl_general_uploads` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` varchar(100) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `tecnumber` varchar(20) NOT NULL,
  `emailfld` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dep` varchar(30) NOT NULL,
  `img` varchar(300) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `firstname`, `lastname`, `tecnumber`, `emailfld`, `password`, `gender`, `dep`, `img`, `address`, `status`) VALUES
(39, 'Savitaa', 'Sharma', '+919466754655', 'savitasharma@gmail.com', 'savitasharma', 'female', '2', 'uploads/61a0c0a124e3d2.jpg', 'H.N. 536 Vigyan Nagar, Pune Maharashtra', '1'),
(40, 'Anita', 'Jain', '+918209246380', 'anitajain@gmail.com', 'anitajain', 'female', '2', 'uploads/61a299e88dbe92.jpg', 'P.V. Plaza Vigyan Nagar Kota , Rajasthan', '1'),
(41, 'Parul ', 'Agarwal', '+919888892891', 'parulagarwal@gmail.com', 'parulagarwal', 'female', '3', 'uploads/61a0c3bc1c2b96.jpg', 'Somaiya Vihar, Jaipur Rajasthan', '1'),
(42, 'Vikas', 'Jain', '+919461572765', 'vikasjain@gmail.com', 'vikasjain', 'male', '3', 'uploads/61a0c41f4a3bb3.jpg', 'G.S Block 3 Vadodra Gujarat, India', '1'),
(43, 'Rahul', 'Sharma', '+918209246367', 'rahulsharma@gmail.com', 'rahulsharma', 'male', '3', 'uploads/61a0c4ae661865.jpg', 'VJ Nagar, H.N. 45, Punjab India', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
CREATE TABLE `users_online` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
CREATE TABLE `users_table` (
  `Users_ID` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Profile_Picture` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`Users_ID`, `user_fname`, `user_lname`, `Password`, `Profile_Picture`, `date`) VALUES
(11, 'Aastha', 'Jain', 'aasthajain', '', '2021-11-26 11:29:58'),
(12, 'Anisha ', 'Jain', 'anishajain', '', '2021-11-26 11:31:05'),
(13, 'Aarchie', 'Jain', 'aarchiejain', '', '2021-11-26 11:33:03'),
(14, 'Satkar', 'Sharma', 'satkarsharma', '', '2021-11-26 11:36:34'),
(15, 'Rayansh', 'Singh', 'rayanshsingh', '', '2021-11-26 11:46:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_announcement`
--
ALTER TABLE `general_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_messages`
--
ALTER TABLE `public_messages`
  ADD PRIMARY KEY (`Msg_ID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_general_uploads`
--
ALTER TABLE `tbl_general_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`Users_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `general_announcement`
--
ALTER TABLE `general_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `public_messages`
--
ALTER TABLE `public_messages`
  MODIFY `Msg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_general_uploads`
--
ALTER TABLE `tbl_general_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `Users_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
