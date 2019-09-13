-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 03:04 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacanzadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Aniqa', 'azk007'),
('Mastura', 'khushboo'),
('Tahsin', 'idontcare');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billid` int(10) NOT NULL,
  `date` date NOT NULL,
  `discount` int(6) NOT NULL,
  `totalamount` int(6) NOT NULL,
  `tax` int(6) NOT NULL,
  `ticket` int(4) NOT NULL,
  `netpayable` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `busid` int(10) NOT NULL,
  `busname` varchar(40) NOT NULL,
  `from_city` varchar(20) NOT NULL,
  `to_city` varchar(20) NOT NULL,
  `d_time` time NOT NULL,
  `fare` int(4) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `airportname` varchar(50) NOT NULL,
  `airportcode` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city`, `country`, `airportname`, `airportcode`) VALUES
('Dhaka', 'Bangladesh', 'Hazrat Shahjalal International Airport', 1),
('Delhi', 'India', 'Indira Gandhi International Ai', 2),
('Tokyo', 'Japan', 'Narita International Airport', 3),
('Bangkok', 'Thailand', 'Suvarnabhumi Airport', 4),
('Sylhet', 'Bangladesh', 'Osmani International Airport', 5),
('Chittagong', 'Bangladesh', 'Shah Amanat International Airport', 6),
('Kolkata', 'India', 'Netaji Subhas Chandra Bose Airport', 7),
('Mumbai', 'India', 'Chhatrapati Shivaji International Airport', 8),
('Beijing', 'China', 'Beijing Capital International Airport', 9),
('Kuala Lumpur', 'Malaysia', 'Kuala Lumpur International Airport', 10),
('Thimphu', 'Bhutan', 'Paro International Airport', 11),
('Chennai', 'India', 'Chennai International Airport', 12),
('Male', 'Maldives', 'Velana International Airport', 13),
('Kathmandu', 'Nepal', 'Tribhuvan International Airport', 14),
('Jakarta', 'Indonesia', 'Soekarno–Hatta International Airport', 15),
('Changi', 'Singapore', 'Singapore Changi Airport ', 16);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment` text NOT NULL,
  `rating` int(1) NOT NULL,
  `userid` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment`, `rating`, `userid`) VALUES
('Good service, a very helpful website', 4, 15101107),
('User-friendly website', 4, 15101108),
('Best place to buy tickets!', 5, 15101109);

-- --------------------------------------------------------

--
-- Table structure for table `flies`
--

CREATE TABLE `flies` (
  `userid` int(14) NOT NULL,
  `flightno` int(8) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flightno` int(8) NOT NULL,
  `airlines` varchar(30) NOT NULL,
  `d_time` time NOT NULL,
  `a_time` time NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flightno`, `airlines`, `d_time`, `a_time`, `duration`) VALUES
(140101, 'Novo Air', '10:00:00', '10:50:00', '00:32:00'),
(140201, 'US Bangla', '12:00:00', '12:45:00', '00:25:00'),
(150001, 'Bangladesh Biman', '08:00:00', '08:45:00', '00:25:00'),
(150101, 'Novo Air', '10:00:00', '10:40:00', '00:23:00'),
(170001, 'Bangladesh Biman', '09:00:00', '10:00:00', '00:45:00'),
(170101, 'Novo Air', '12:00:00', '13:05:00', '00:48:00'),
(170201, 'US Bangla', '14:00:00', '14:50:00', '00:35:00'),
(170501, 'Air India', '17:00:00', '18:10:00', '00:50:00'),
(170801, 'Thailand Air', '09:00:00', '14:00:00', '04:30:00'),
(170901, 'Deluxe Airlines', '07:00:00', '12:30:00', '05:00:00'),
(171201, 'Japan Airlines', '13:00:00', '18:10:00', '04:50:00'),
(171401, 'Malindo Air', '09:00:00', '14:00:00', '04:35:00'),
(270001, 'Bangladesh Biman', '10:30:00', '11:40:00', '00:40:00'),
(270101, 'Novo Air', '13:40:00', '14:55:00', '00:40:00'),
(270201, 'US Bangla', '15:00:00', '16:00:00', '00:40:00'),
(270501, 'Air India', '15:35:00', '16:45:00', '00:40:00'),
(370901, 'Deluxe Airlines', '01:30:00', '06:45:00', '05:10:00'),
(371201, 'Japan Airlines', '07:20:00', '12:40:00', '05:10:00'),
(470801, 'Thailand Air', '03:30:00', '08:00:00', '04:25:00'),
(471401, 'Malindo Air', '14:30:00', '19:00:00', '04:20:00'),
(550001, 'Bangladesh Biman', '09:00:00', '09:40:00', '00:20:00'),
(550101, 'Novo Air', '11:00:00', '11:40:00', '00:26:00'),
(640101, 'Novo Air', '11:00:00', '12:00:00', '00:45:00'),
(640201, 'US Bangla', '13:00:00', '13:40:00', '00:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offerid` int(6) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `prerequisite` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerid`, `discount`, `prerequisite`) VALUES
(1001, '10', 10),
(1002, '15', 20),
(2001, '20', 40),
(2002, '25', 80);

-- --------------------------------------------------------

--
-- Table structure for table `offers_available`
--

CREATE TABLE `offers_available` (
  `offerid` int(6) NOT NULL,
  `userid` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers_available`
--

INSERT INTO `offers_available` (`offerid`, `userid`) VALUES
(1001, 15101108),
(1001, 15101110),
(2002, 15101107);

-- --------------------------------------------------------

--
-- Table structure for table `previoustrips`
--

CREATE TABLE `previoustrips` (
  `date` date NOT NULL,
  `flightno` int(8) NOT NULL,
  `userid` int(14) NOT NULL,
  `t_bought` int(4) NOT NULL,
  `amount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `previoustrips`
--

INSERT INTO `previoustrips` (`date`, `flightno`, `userid`, `t_bought`, `amount`) VALUES
('2016-10-10', 4376001, 15101109, 2, 3000),
('2016-11-01', 4108375, 15101109, 2, 2800),
('2016-12-14', 4830582, 15101108, 5, 2500),
('2016-12-28', 7630582, 15101108, 5, 4500),
('2017-01-15', 6852176, 15101110, 8, 4800),
('2017-01-20', 1002176, 15101110, 8, 3200),
('2017-03-14', 171201, 15101107, 40, 2500),
('2017-03-14', 371201, 15101107, 48, 2400);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `D_airportcode` int(6) NOT NULL,
  `A_airportcode` int(6) NOT NULL,
  `flightno` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`D_airportcode`, `A_airportcode`, `flightno`) VALUES
(1, 2, 170001),
(1, 2, 170101),
(1, 2, 170201),
(1, 2, 170501),
(1, 3, 170901),
(1, 3, 171201),
(1, 4, 170801),
(1, 4, 171401),
(1, 5, 150001),
(1, 5, 150101),
(1, 6, 140101),
(1, 6, 140201),
(2, 1, 270001),
(2, 1, 270101),
(2, 1, 270201),
(2, 1, 270501),
(3, 1, 370901),
(3, 1, 371201),
(4, 1, 470801),
(4, 1, 471401),
(5, 1, 550001),
(5, 1, 550101),
(6, 1, 640101),
(6, 1, 640201);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_flight`
--

CREATE TABLE `ticket_flight` (
  `airlinesname` varchar(30) NOT NULL,
  `ticketclass` varchar(8) NOT NULL,
  `fare` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_flight`
--

INSERT INTO `ticket_flight` (`airlinesname`, `ticketclass`, `fare`) VALUES
('Air China', 'Business', 350),
('Air China', 'Economy', 260),
('Air India', 'Business', 250),
('Air India', 'Economy', 195),
('Air Malaysia', 'Business', 350),
('Air Malaysia', 'Economy', 280),
('Bangladesh Biman', 'Business', 180),
('Bangladesh Biman', 'Economy', 120),
('Deluxe Airlines', 'Business', 280),
('Deluxe Airlines', 'Economy', 210),
('Druk Air', 'Business', 160),
('Druk Air', 'Economy', 120),
('Emirates', 'Business', 380),
('Emirates', 'Economy', 250),
('Etihad Airways', 'Business', 390),
('Etihad Airways', 'Economy', 280),
('IndiGo', 'Business', 230),
('IndiGo', 'Economy', 160),
('Japan Airlines', 'Business', 300),
('Japan Airlines', 'Economy', 230),
('Jet Airways', 'Business', 180),
('Jet Airways', 'Economy', 130),
('Malaysian Airlines', 'Business', 220),
('Malaysian Airlines', 'Economy', 130),
('Malindo Air', 'Business', 250),
('Malindo Air', 'Economy', 180),
('Novo Air', 'Business', 150),
('Novo Air', 'Economy', 95),
('Singapore Airlines', 'Business', 330),
('Singapore Airlines', 'Economy', 250),
('Thailand Air', 'Business', 280),
('Thailand Air', 'Economy', 200),
('US Bangla', 'Business', 160),
('US Bangla', 'Economy', 110);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(14) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `address` text,
  `contact` int(11) NOT NULL,
  `alert` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `middlename`, `surname`, `email`, `pass`, `gender`, `dob`, `address`, `contact`, `alert`) VALUES
(15101106, 'Aniqa', 'Zaida', 'Khanom', 'azkhanom@gmail.com', 'azk_007', 'Female', '1995-01-15', 'Somewhere on Earth', 1611532440, 'Yes'),
(15101107, 'Elton', 'Hercules', 'John', 'ising@grammywinner.com', 'iamgay', 'Male', '1947-03-25', 'Pinner, Middlesex, England, UK', 1653428654, 'No'),
(15101108, 'John', 'Butler', 'Smith', 'J.smith@gmail.com', 'jsmith', 'male', '1947-03-21', '4795 9th Ave\r\nLethbridge, AB T1J 2J7', 530424596, 'Yes'),
(15101109, 'Eleanor', 'Madison', 'Douglas', 'D.eleanor@gmail.com', 'france', 'female', '1953-06-05', '5, rue Pierre De Coubertin 31300 TOULOUSE', 539613265, 'Yes'),
(15101110, 'Kristin', NULL, 'Hertz', 'khertz@hotmail.com', 'kristin', 'female', '1978-04-22', 'Urzáiz, 75\r\n44200 Calamocha', 633976936, 'No'),
(15101111, 'Hayley', 'Burt', 'McAlpine', 'h.burt@hotmail.com', 'hayleymcalpine', 'female', '1954-12-27', '4158 184th Street\r\nEdmonton, AB T5J 2R4', 809146275, 'No'),
(15101112, 'Brock', NULL, ' Langton', 'l.brock@gmail.com', 'brock', 'male', '1980-01-03', '247 Currey Crescent\r\nCastor Bay\r\nNorth Shore 0620', 286729082, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`airportcode`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `flies`
--
ALTER TABLE `flies`
  ADD PRIMARY KEY (`userid`,`flightno`),
  ADD KEY `userid` (`userid`,`flightno`),
  ADD KEY `flightno` (`flightno`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flightno`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offerid`);

--
-- Indexes for table `offers_available`
--
ALTER TABLE `offers_available`
  ADD PRIMARY KEY (`offerid`,`userid`),
  ADD KEY `offerid` (`offerid`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `previoustrips`
--
ALTER TABLE `previoustrips`
  ADD PRIMARY KEY (`date`,`flightno`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`flightno`),
  ADD KEY `D_airportcode` (`D_airportcode`,`A_airportcode`,`flightno`),
  ADD KEY `A_airportcode` (`A_airportcode`);

--
-- Indexes for table `ticket_flight`
--
ALTER TABLE `ticket_flight`
  ADD PRIMARY KEY (`airlinesname`,`ticketclass`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `busid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `airportcode` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15101113;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flies`
--
ALTER TABLE `flies`
  ADD CONSTRAINT `flies_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flies_ibfk_2` FOREIGN KEY (`flightno`) REFERENCES `flight` (`flightno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers_available`
--
ALTER TABLE `offers_available`
  ADD CONSTRAINT `offers_available_ibfk_1` FOREIGN KEY (`offerid`) REFERENCES `offer` (`offerid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_available_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `previoustrips`
--
ALTER TABLE `previoustrips`
  ADD CONSTRAINT `previoustrips_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`D_airportcode`) REFERENCES `city` (`airportcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`A_airportcode`) REFERENCES `city` (`airportcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`flightno`) REFERENCES `flight` (`flightno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
