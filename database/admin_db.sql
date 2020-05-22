-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2020 at 02:07 AM
-- Server version: 10.2.31-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ball_history`
--

CREATE TABLE `ball_history` (
  `id` int(11) NOT NULL,
  `bowler_id` int(30) NOT NULL,
  `batting_player_id` int(30) NOT NULL,
  `runs` int(30) NOT NULL,
  `run_type` varchar(30) NOT NULL,
  `out_player_id` int(30) NOT NULL,
  `new_player_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ball_history`
--

INSERT INTO `ball_history` (`id`, `bowler_id`, `batting_player_id`, `runs`, `run_type`, `out_player_id`, `new_player_id`) VALUES
(1, 17, 1, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `battingtable`
--

CREATE TABLE `battingtable` (
  `id` int(30) NOT NULL,
  `player_id` int(30) NOT NULL,
  `match_id` int(30) NOT NULL,
  `fours` int(30) DEFAULT NULL,
  `sixes` int(30) DEFAULT NULL,
  `strike_rate` decimal(2,0) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `runs` int(30) NOT NULL,
  `ball_faced` int(30) DEFAULT NULL,
  `fifties` int(30) DEFAULT NULL,
  `hundreds` int(30) DEFAULT NULL,
  `currentPlayer` int(11) NOT NULL,
  `striker_status` int(30) NOT NULL,
  `r` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `battingtable`
--

INSERT INTO `battingtable` (`id`, `player_id`, `match_id`, `fours`, `sixes`, `strike_rate`, `status`, `runs`, `ball_faced`, `fifties`, `hundreds`, `currentPlayer`, `striker_status`, `r`) VALUES
(1, 1, 0, 6, 1, 99, '1', 30, 10, NULL, NULL, 0, 1, 0.00),
(2, 2, 0, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, 0, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `bettable`
--

CREATE TABLE `bettable` (
  `id` int(11) NOT NULL,
  `teamAv1` int(11) NOT NULL,
  `teamAv2` int(11) NOT NULL,
  `sessionOverV1` int(11) NOT NULL,
  `sessionOverV2` int(11) NOT NULL,
  `xBollV1` varchar(50) NOT NULL,
  `xBollV2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bettable`
--

INSERT INTO `bettable` (`id`, `teamAv1`, `teamAv2`, `sessionOverV1`, `sessionOverV2`, `xBollV1`, `xBollV2`) VALUES
(1, 0, 0, 0, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bowlingtable`
--

CREATE TABLE `bowlingtable` (
  `id` int(30) NOT NULL,
  `player_id` int(30) NOT NULL,
  `match_id` int(30) DEFAULT NULL,
  `overs` varchar(30) NOT NULL,
  `economy_rate` decimal(2,0) DEFAULT NULL,
  `wickets` int(11) DEFAULT NULL,
  `runs` int(30) DEFAULT NULL,
  `balls_bowled` int(30) DEFAULT NULL,
  `extras` int(10) DEFAULT NULL,
  `status` int(30) NOT NULL,
  `maidenballs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bowlingtable`
--

INSERT INTO `bowlingtable` (`id`, `player_id`, `match_id`, `overs`, `economy_rate`, `wickets`, `runs`, `balls_bowled`, `extras`, `status`, `maidenballs`) VALUES
(1, 13, NULL, '1.1', 20, NULL, 22, 7, NULL, 0, 0),
(2, 14, NULL, '0.2', 20, NULL, 4, 2, NULL, 0, 0),
(3, 17, NULL, '0.1', 40, NULL, 4, 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cteam`
--

CREATE TABLE `cteam` (
  `id` int(11) NOT NULL,
  `teamAName` varchar(32) NOT NULL,
  `teamBName` varchar(32) NOT NULL,
  `stadium` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cteam`
--

INSERT INTO `cteam` (`id`, `teamAName`, `teamBName`, `stadium`) VALUES
(1, 'pakistan', 'india', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `team` int(30) NOT NULL,
  `toss` int(30) NOT NULL,
  `over` int(11) NOT NULL,
  `decision` varchar(20) NOT NULL,
  `stadium` varchar(60) NOT NULL,
  `status` varchar(60) DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL,
  `won_by_team` int(30) DEFAULT NULL,
  `start_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `team`, `toss`, `over`, `decision`, `stadium`, `status`, `result`, `won_by_team`, `start_time`) VALUES
(1, 1, 1, 10, '1', 'lahore', 'Match Will Start at 2pm', NULL, NULL, '2020-05-23 14:00:00'),
(2, 2, 0, 10, '0', 'lahore', 'Match Will Start at 2pm', NULL, NULL, '2020-05-23 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `player_name` varchar(60) NOT NULL,
  `team_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `team_id`, `position`, `status`) VALUES
(1, 'A', 1, 1, 1),
(2, 'B', 1, 2, 1),
(3, 'C', 1, 3, 1),
(4, 'D', 1, 4, 0),
(5, 'E', 1, 5, 0),
(6, 'F', 1, 6, 0),
(7, 'G', 1, 7, 0),
(8, 'H', 1, 8, 0),
(9, 'I', 1, 9, 0),
(10, 'J', 1, 10, 0),
(11, 'K', 1, 11, 0),
(12, 'L', 1, 12, 0),
(13, 'AA', 2, 1, 0),
(14, 'BB', 2, 2, 0),
(15, 'CC', 2, 3, 0),
(16, 'DD', 2, 4, 0),
(17, 'EE', 2, 5, 0),
(18, 'FF', 2, 6, 0),
(19, 'GG', 2, 7, 0),
(20, 'HH', 2, 8, 0),
(21, 'II', 2, 9, 0),
(22, 'JJ', 2, 10, 0),
(23, 'KK', 2, 11, 0),
(24, 'LL', 2, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `score_board`
--

CREATE TABLE `score_board` (
  `id` int(11) NOT NULL,
  `team_id` int(30) NOT NULL,
  `match_id` int(30) NOT NULL,
  `fours` int(30) NOT NULL,
  `sixes` int(30) NOT NULL,
  `run_rate` decimal(2,0) NOT NULL,
  `extras` int(30) NOT NULL,
  `overs` varchar(30) NOT NULL,
  `balls` int(30) NOT NULL,
  `target` int(30) NOT NULL,
  `runs` int(30) NOT NULL,
  `no_of_outs` int(11) NOT NULL,
  `match_status` varchar(60) NOT NULL,
  `rrr` varchar(60) NOT NULL,
  `remainingball` varchar(60) NOT NULL,
  `remainingruns` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score_board`
--

INSERT INTO `score_board` (`id`, `team_id`, `match_id`, `fours`, `sixes`, `run_rate`, `extras`, `overs`, `balls`, `target`, `runs`, `no_of_outs`, `match_status`, `rrr`, `remainingball`, `remainingruns`) VALUES
(1, 1, 0, 6, 1, 21, 0, '1.4', 10, 0, 30, 0, '', '', '50', ''),
(2, 2, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sixballs`
--

CREATE TABLE `sixballs` (
  `id` int(11) NOT NULL,
  `b1` varchar(120) NOT NULL,
  `b2` varchar(120) NOT NULL,
  `b3` varchar(120) NOT NULL,
  `b4` varchar(120) NOT NULL,
  `b5` varchar(120) NOT NULL,
  `b6` varchar(120) NOT NULL,
  `last_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sixballs`
--

INSERT INTO `sixballs` (`id`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `last_status`) VALUES
(1, '4', '4', '', '4', '', '4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(43) NOT NULL,
  `user_pass` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_name`, `user_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(30) NOT NULL,
  `teamName` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `teamName`, `location`, `status`) VALUES
(1, 'Team A', 'Faslabad', 1),
(2, 'Team B', 'Lahore', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ball_history`
--
ALTER TABLE `ball_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `battingtable`
--
ALTER TABLE `battingtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bettable`
--
ALTER TABLE `bettable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bowlingtable`
--
ALTER TABLE `bowlingtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cteam`
--
ALTER TABLE `cteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_board`
--
ALTER TABLE `score_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sixballs`
--
ALTER TABLE `sixballs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ball_history`
--
ALTER TABLE `ball_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `battingtable`
--
ALTER TABLE `battingtable`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bettable`
--
ALTER TABLE `bettable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bowlingtable`
--
ALTER TABLE `bowlingtable`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cteam`
--
ALTER TABLE `cteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `score_board`
--
ALTER TABLE `score_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sixballs`
--
ALTER TABLE `sixballs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
