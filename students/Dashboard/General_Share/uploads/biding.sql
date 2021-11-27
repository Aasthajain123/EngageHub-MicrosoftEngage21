-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 07:41 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biding`
--

-- --------------------------------------------------------

--
-- Table structure for table `pictures_holder`
--

CREATE TABLE `pictures_holder` (
  `id` int(11) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `item_details` varchar(255) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `current_price` int(11) NOT NULL,
  `current_bid_status` int(11) NOT NULL,
  `highest_bidder_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures_holder`
--

INSERT INTO `pictures_holder` (`id`, `img_src`, `item_details`, `item_title`, `current_price`, `current_bid_status`, `highest_bidder_username`) VALUES
(1, 'monitor1.jpg', 'Dell 28 Ultra HD 4K Monitor with screen showing garden', 'Dell 28 Ultra', 9000, 9000, 'George'),
(2, 'monitor2.png', '12.5 HD Anti Glare LED Backlist Display ( 1366X768)', 'HD Anti Glare', 500, 0, ''),
(3, 'computer1.jpg', 'Sumsung - Notebook 9 pro 15.6 4K Ultra HD Touch Screen Laptop Intel', 'Sumsung Notebook 9 Pro', 1200, 0, ''),
(4, 'computer2.jpg', 'Dell SE271HR 27 Full HD', 'Dell SE271HR', 500, 0, ''),
(5, 'computer3.jpg', 'Acer D2221HQ wmincz 21 Full HD All-In_One Desktop Computer with 10', 'Acer D2221HQ', 2000, 0, ''),
(6, 'computer4.jpg', 'Acer D2221HQ wmincz 21 Full HD All-In_One Desktop Computer with 10', 'Acer D2221HQ', 4000, 0, ''),
(7, 'phone1.jpg', 'BLU inspiron full HD screen', 'BLU inspiron', 200, 0, ''),
(8, 'iphone6.png', 'Iphone 6 Concept shaik', 'Iphone 6', 1000, 0, ''),
(9, 'computer5.png', 'Brand new hp laptop with no faults', 'HP 250', 1000, 0, ''),
(10, 'computer2.jpg', 'Dell SE271HR 27 Full HD', 'Dell SE271HR', 500, 0, ''),
(11, 'bag1.png', 'Brand new Moblie edge bag for sale', 'Mobile-Edge-17', 100, 0, ''),
(12, 'cam1.png', 'Brand new camera for sale', 'Digital-SLR-Camera', 4000, 0, ''),
(13, 'headset3.png', 'Brand new headset for sale', '360_Wireless_Headset_2', 500, 0, ''),
(14, 'projector4.png', 'Brand new project for sale at affordable price', 'Projector 8000_angle', 1000, 0, ''),
(15, 'computer5.png', 'Brand new hp laptop with no faults', 'HP 250', 1500, 0, ''),
(16, 'DESIRE.JPG', 'brand new desire phone for sale', 'Desire Phone', 400, 0, ''),
(17, 'headset1.png', 'Slightly used headset for sale at cool price', 's1_k_21', 250, 0, ''),
(18, 'gshock1.png', 'watch-large-prospex-patriots', 'Brand new g-shock watch for sale', 900, 0, ''),
(19, 'ipod1.png', 'iPodPhonesBlue_archigraphs', 'New ipod for sale at affordable price', 500, 0, ''),
(20, 'projector1.png', 'Crystal clear projector for sale at affordable price', 'Acer D2221HQ', 1500, 0, ''),
(21, 'phone1.jpg', 'BLU inspiron full HD screen', 'BLU inspiron', 200, 0, ''),
(22, 'iphone6.png', 'Iphone 6 Concept shaik', 'Iphone 6', 1000, 0, ''),
(23, 'computer5.png', 'Brand new hp laptop with no faults', 'HP 250', 1000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL DEFAULT 'Ghana',
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `first_name`, `last_name`, `username`, `password`, `gender`, `country`, `email`, `phone`) VALUES
(2, 'george', 'yeboah', 'sinowills', 'wills', 'male', 'accra', 'sinowills@gmail.com', '0546212527');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`) VALUES
(1, 'sino', 'wills'),
(2, 'george', 'yeboah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pictures_holder`
--
ALTER TABLE `pictures_holder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pictures_holder`
--
ALTER TABLE `pictures_holder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
