-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 03:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ars`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getflightinfo` (IN `passport_number` INT)  BEGIN
SELECT DISTINCT f.*, a.name, s.seat_number,r.price
FROM seats AS s JOIN reservation AS r ON r.reservation_number = s.reservation_number 
JOIN flight AS f ON f.flight_number = s.flight_number JOIN airline AS a ON a.id = f.airline_id 
WHERE r.passport_id = passport_number;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`id`, `name`) VALUES
(1, 'Royal jordinian'),
(2, 'Qatar airways'),
(3, 'gulf air'),
(4, 'emirates'),
(5, 'etihad airline');

-- --------------------------------------------------------

--
-- Stand-in structure for view `filghts`
-- (See below for the actual view)
--
CREATE TABLE `filghts` (
`flight_number` int(11)
,`airline_id` int(11)
,`departure_time` time
,`departure_date` date
,`arrival_time` time
,`arrival_date` date
,`flight_type` varchar(15)
,`arrival_country` varchar(25)
,`departure_country` varchar(25)
,`arrival_airport` varchar(20)
,`departure_airport` varchar(30)
,`name` varchar(30)
,`seat_number` int(11)
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_number` int(11) NOT NULL,
  `airline_id` int(11) DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `flight_type` varchar(15) DEFAULT NULL,
  `arrival_country` varchar(25) DEFAULT NULL,
  `departure_country` varchar(25) DEFAULT NULL,
  `arrival_airport` varchar(20) DEFAULT NULL,
  `departure_airport` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_number`, `airline_id`, `departure_time`, `departure_date`, `arrival_time`, `arrival_date`, `flight_type`, `arrival_country`, `departure_country`, `arrival_airport`, `departure_airport`) VALUES
(123, 2, '10:55:00', '2022-03-26', '22:00:00', '2022-04-09', 'economy', 'paris', 'amman', 'CDG', 'AMM'),
(153, 4, '12:00:00', '2022-04-10', '14:00:00', '2022-04-15', 'economy', 'Dubai', 'amman', 'DXB', 'AMM'),
(154, 5, '22:30:00', '2022-05-04', '01:30:00', '2022-05-15', 'economy', 'Doha', 'amman', 'DOH', 'AMM'),
(234, 5, '02:30:00', '2022-04-04', '06:30:00', '2022-05-15', 'first class', 'Jeddah', 'amman', 'JED', 'AMM'),
(334, 2, '13:30:00', '2022-04-05', '15:30:00', '2022-05-15', 'first class', 'Jeddah', 'amman', 'JED', 'AMM');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passport_id` int(11) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) NOT NULL,
  `pass_word` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passport_id`, `gender`, `nationality`, `DOB`, `phone_number`, `email`, `fname`, `mname`, `lname`, `pass_word`) VALUES
(1888, 'F', 'Jordanian', '2002-03-26', 7922223, 'lamis.smara@htu.edu.jo', 'lamis', '', 'smara', '764456a30b11a0231ed4405a45ffc1a4'),
(1928, 'M', 'Jordanian', '2001-04-09', 790290514, 'saifedeen@htu.edu.jo', 'saifedeen', 'mohammed', 'kharouf', '4d0c5af710fb34ba9877183bf7e05b15'),
(1998, 'F', 'Jordanian', '2002-08-13', 792222323, 'shahed.nwasieh@htu.edu.jo', 'shahed', '', 'nwasieh', 'a44987440c0b9efdbd270eb6e4afe279'),
(24440, 'M', 'jordanian', '2000-03-05', 7894500, 'hussein.tariq@htu.edu.com', 'hussien', 'tareq', 'emad', 'a1285459e416a3c2fc3b67025265fe4e'),
(27985, 'M', 'jordanian', '2001-02-23', 79258211, 'mohammed.masharqa@htu.edu.com', 'mohammed', 'saleh', 'masharqa', 'cd2cbd0a7d28268acfa68c32fcd6bcd6'),
(36999, 'M', 'jordainian', '2001-04-09', 790290514, 'kharoofsaif@htu.edu.jo', 'fahed', 'moh', 'hossam', '4d0c5af710fb34ba9877183bf7e05b15'),
(222222, 'F', 'jordainian', '2021-12-30', 7902984, 'omar.jerab@htu.edu.jo', 'omar', '', 'jerab', 'a44987440c0b9efdbd270eb6e4afe279'),
(5556699, 'M', 'jordainian', '2001-05-08', 790825205, 'test@gmail.com', 'd39b0de0981258dd62ff', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_number` int(11) NOT NULL,
  `passport_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_number`, `passport_id`, `price`) VALUES
(111, 1888, 500),
(1234, 1888, 500),
(3434, 1998, 200),
(5234, 1928, 1000),
(55887, 24440, 600),
(789456, 27985, 300),
(104477782, NULL, 500),
(165015105, 1928, 200),
(269277178, NULL, 500),
(935136265, 36999, 600),
(1017811072, 36999, 500),
(1295601626, NULL, 300),
(1297894366, 36999, 500),
(1388333324, NULL, 500),
(2016984856, NULL, 200),
(2027625559, 36999, 500);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `reservation_number` int(11) NOT NULL,
  `flight_number` int(11) NOT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `seat_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`reservation_number`, `flight_number`, `seat_number`, `seat_type`) VALUES
(111, 123, 125, 'eco'),
(1234, 123, 45, 'economy'),
(3434, 153, 35, 'economy'),
(5234, 154, 25, 'first class'),
(55887, 234, 65, 'first-class'),
(789456, 334, 75, 'first-class'),
(104477782, 123, 45, 'economy'),
(165015105, 153, 35, 'economy'),
(269277178, 123, 125, 'economy'),
(935136265, 234, 65, 'first class'),
(1017811072, 123, 125, 'economy'),
(1295601626, 334, 75, 'first class'),
(2027625559, 123, 45, 'economy');

-- --------------------------------------------------------

--
-- Structure for view `filghts`
--
DROP TABLE IF EXISTS `filghts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `filghts`  AS SELECT DISTINCT `f`.`flight_number` AS `flight_number`, `f`.`airline_id` AS `airline_id`, `f`.`departure_time` AS `departure_time`, `f`.`departure_date` AS `departure_date`, `f`.`arrival_time` AS `arrival_time`, `f`.`arrival_date` AS `arrival_date`, `f`.`flight_type` AS `flight_type`, `f`.`arrival_country` AS `arrival_country`, `f`.`departure_country` AS `departure_country`, `f`.`arrival_airport` AS `arrival_airport`, `f`.`departure_airport` AS `departure_airport`, `a`.`name` AS `name`, `s`.`seat_number` AS `seat_number`, `r`.`price` AS `price` FROM (((`seats` `s` join `reservation` `r` on(`r`.`reservation_number` = `s`.`reservation_number`)) join `flight` `f` on(`f`.`flight_number` = `s`.`flight_number`)) join `airline` `a` on(`a`.`id` = `f`.`airline_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_number`),
  ADD KEY `airline_id` (`airline_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passport_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_number`),
  ADD KEY `passport_id` (`passport_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`reservation_number`,`flight_number`),
  ADD KEY `flight_number` (`flight_number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`airline_id`) REFERENCES `airline` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`passport_id`) REFERENCES `passenger` (`passport_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`reservation_number`) REFERENCES `reservation` (`reservation_number`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seats_ibfk_2` FOREIGN KEY (`flight_number`) REFERENCES `flight` (`flight_number`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seats_ibfk_3` FOREIGN KEY (`flight_number`) REFERENCES `flight` (`flight_number`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
