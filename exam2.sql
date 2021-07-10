-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 10:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `correct_ans` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `attempts` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `q_head` text NOT NULL,
  `choice_1` varchar(255) NOT NULL,
  `choice_2` varchar(255) NOT NULL,
  `choice_3` varchar(255) NOT NULL,
  `choice_4` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `q_mark` int(1) NOT NULL,
  `station` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `quiz_id`, `q_head`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `correct_answer`, `q_mark`, `station`) VALUES
(1, 1, ' Vehicle steering systems must not have excessive slack or binding at any point in its movement, and must have the ability to steer:', 'In a circle with a radius of 50’.', 'In a figure 8.', 'In a circle with a diameter of 25’.', 'In a circle with a diameter of 50’.', '1-a', 1, '1'),
(2, 1, ' A vehicle must have brakes that are:', 'Mechanical and located on at least one wheel.', 'Hydraulically actuated.', 'Located on both left and right sides of the vehicle at either front or rear sets of\r\nwheels, and have independent connections, which may be allowed to connect to\r\na single lever or pedal.', 'Regenerative and/or mechanical on all wheels.', '2-c', 1, '1'),
(3, 1, ' Battery packs must:', 'Weigh no more than 73 lbs.', 'Weigh more than the heaviest driver.\r\n', 'Weigh more than the rolling chassis of the vehicle.', 'Weigh more than 73 Kg.', '3-a', 1, '1'),
(4, 1, 'An Isolation switch:', 'Can be located anywhere on the vehicle as long as it is marked properly.', 'Must be accessible from a person outside the vehicle.', 'Must be accessible by the driver while belted in.', 'All of the above.', '4-d', 1, '1'),
(5, 1, 'Mirrors are required to provide visibility on both sides of the vehicle to the rear and:', 'Must be a minimum of 8 square inches total area, which can be provided with\r\none or multiple mirrors.', 'Have no tinting or distortion.', 'Have a minimum of 4 square inches per mirror.', 'Are not required as long as the driver can turn their head to look behind them.', '5-a', 1, '1'),
(6, 1, 'Drivers must be able to exit the vehicle:', 'In under 1 minute unassisted.', 'In under 30 seconds unassisted.', 'In under 20 seconds unassisted.', 'In under 15 seconds.', '6-c', 1, '1'),
(7, 1, 'Drivers must be:', 'Any age as long as they are a student.', '16 years of age.', '16 years of age and should hold either a learners permit or a drivers license.', 'There are no requirements for drivers.', '7-c', 1, '1'),
(8, 1, 'Vehicles must be able to come to a stop:', 'in 40 feet or less from 25mph.', 'from full speed within 40 feet.', 'In 25 feet or less from 40mph', 'In 25 feet or less from 25mph.', '8-a', 1, '1'),
(9, 1, 'Wheel configuration:', 'Must be a three-wheel design.', 'Must be a four-wheel design.', 'Can only be a three-wheel or four-wheel design.', 'Can be any configuration.', '9-c', 1, '1'),
(10, 1, 'The operating battery voltage of the drive system', 'Must be 48 V.', 'Must be either 24 V or 48 V.', 'Must be 24 V.', 'Can be any voltage.', '10-d', 1, '1'),
(11, 1, 'Teams are allowed to charge batteries from an outside source at what time?', 'Any time during the competition if you run out of energy.', 'Only during breaks between heats.', 'Not at all.', 'Only prior to the beginning of the first race.', '11-d', 1, '1'),
(12, 1, 'How often MUST teams change drivers?', 'Teams must change drivers at least once during the allowable driver change window between minute 12 and 18 of each heat.', 'Teams are not required to change drivers at all.', 'Teams must have a new driver for each heat.', 'Teams must change drivers a minimum of five times during the event.', '12-a', 1, '1'),
(13, 1, 'How many people are allowed in the PIT area during a driver change?\r\n', 'As many people as will fit provided they are wearing safety vests.', 'A Maximum of 4, two of which are the drivers.', 'None.', 'Only the Safety Specialist.', '13-b', 1, '1'),
(14, 1, 'What determines the winner of the event?', 'The team with the fastest lap.', 'The team that averages the best lap time.', 'The team that completes the most laps within the allowable race time.', 'None of the above.', '14-c', 1, '1'),
(15, 1, 'What does a RED flag mean?', 'It means that the heat has ended and driver should return to the pit.', 'It means that drivers should not pass any cars until the red flag has been lifted.', 'It means there is an incident on the track that is unsafe so drivers must bring\r\ntheir car to a safe controlled stop as soon as possible.', 'It means that there is two minutes left in the heat.', '15-c', 1, '1'),
(16, 1, 'What is the minimum number of drivers that a team requires?\r\n', 'Four drivers.', 'One driver.', 'Two drivers.', 'Three drivers.', '16-c', 1, '1'),
(17, 1, 'Who are required to wear safety vests?', 'Only the drivers.', 'Any person that assists a car on the track or helps with driver change other than\r\nthe drivers.', 'Any person that is not wearing yellow.', 'Only the team safety specialists.', '17-b', 1, '1'),
(18, 1, 'How fast should a driver go while observing a yellow flag?', 'Not more than 20 mph\r\n', 'Not more than walking speed', 'Fast enough to prevent other driver’s from passing them.', ' A speed that they feel is safe given the circumstances, but never fast enough to', '18-d', 1, '1'),
(19, 1, 'What must drivers check before leaving the pits?', 'That their helmet is on, and they have the correct ballast.', 'That their helmet is on and batteries are charged.', 'That their helmet is on and buckled with visor down, safety belts are buckled, and\r\nthey have the correct ballast.', 'That their radio works.', '19-c', 1, '1'),
(20, 1, 'The following variables affect vehicle efficiency.', 'aerodynamics.', 'Vehicle weight.', 'Quality of crimped connections on high power cables.', 'All of the above.', '20-d', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `carnumber` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `carnumber`, `username`, `password`) VALUES
(1, 'High School 1', '1001', 'user1', 'user1'),
(2, 'High School 2', '1002', 'user2', 'user2'),
(3, 'Benjamin Banneker Academic High School', '01', 'Banneker01', 'EweRYsTR'),
(4, 'Francis L. Cardozo Education Campus', '12', 'cardozoengineers2020', 'pReCtAId'),
(5, 'Friendship Tech Prep Academy', '62', 'TPEVClub', 'turEkinA'),
(6, 'McKinley Technology High School', '99', 'mthsEV', 'eVeRlIVe'),
(7, 'Phelps ACE High School', '04', 'PhelpsPanthers704', 'ERphotLa'),
(8, 'Wilson High School', '14', 'WilsonEV', 'TIngenZa'),
(9, 'H.D. Woodson STEM High School', '55', 'Woodsonwarriors', 'oDsmERap'),
(10, 'School Without Walls', '42', 'DoctorWho', 'WEincemE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qid` (`qid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
