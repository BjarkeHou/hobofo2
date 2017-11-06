-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2017 at 03:26 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hobofo2`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `currentratings`
-- (See below for the actual view)
--
CREATE TABLE `currentratings` (
`id` int(11)
,`name` varchar(11)
,`rating` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `EloChanges`
--

CREATE TABLE `EloChanges` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `elo_change` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`id`, `tournament_id`, `group_number`, `created`) VALUES
(1, 1, 1, '2017-11-05 15:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `Matches`
--

CREATE TABLE `Matches` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `team1_score` int(11) DEFAULT NULL,
  `team2_score` int(11) DEFAULT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `matchtype_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `started` datetime DEFAULT NULL,
  `ended` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Matchtypes`
--

CREATE TABLE `Matchtypes` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Matchtypes`
--

INSERT INTO `Matchtypes` (`id`, `name`) VALUES
(1, 'Group'),
(2, 'Quarterfinal'),
(3, 'Semifinal'),
(4, 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `Memberships`
--

CREATE TABLE `Memberships` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Players`
--

CREATE TABLE `Players` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active_membership` tinyint(1) NOT NULL DEFAULT '0',
  `last_paid_membership` datetime DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `elo` int(11) NOT NULL DEFAULT '1200',
  `receive_sms` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Players`
--

INSERT INTO `Players` (`id`, `name`, `phone`, `created`, `active_membership`, `last_paid_membership`, `rating`, `elo`, `receive_sms`) VALUES
(1, 'a', '1', '2017-11-05 15:37:44', 0, NULL, 0, 1200, 1),
(2, 'b', '2', '2017-11-05 15:37:44', 0, NULL, 0, 1200, 1),
(3, 'c', '3', '2017-11-05 15:37:54', 0, NULL, 0, 1200, 1),
(4, 'd', '4', '2017-11-05 15:37:54', 0, NULL, 0, 1200, 1),
(5, 'e', '5', '2017-11-05 15:38:08', 0, NULL, 0, 1200, 1),
(6, 'f', '6', '2017-11-05 15:38:08', 0, NULL, 0, 1200, 1),
(7, 'g', '7', '2017-11-05 15:38:26', 0, NULL, 0, 1200, 1),
(8, 'h', '8', '2017-11-05 15:38:26', 0, NULL, 0, 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RatingChanges`
--

CREATE TABLE `RatingChanges` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `rating_change` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RatingChanges`
--

INSERT INTO `RatingChanges` (`id`, `tournament_id`, `player_id`, `rating_change`, `created`) VALUES
(1, 1, 1, 1200, '2017-11-05 15:40:34'),
(2, 1, 1, 1200, '2017-09-01 00:00:00'),
(3, 1, 2, 20, '2017-11-05 15:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Competent'),
(3, 'Barvagt');

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE `Teams` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `player1_id` int(11) NOT NULL,
  `player2_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tournaments`
--

CREATE TABLE `Tournaments` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `started` datetime DEFAULT NULL,
  `ended` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tournaments`
--

INSERT INTO `Tournaments` (`id`, `created`, `started`, `ended`) VALUES
(1, '2017-11-05 15:39:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(1) NOT NULL,
  `password` varchar(1) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `currentratings`
--
DROP TABLE IF EXISTS `currentratings`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `currentratings`  AS  select `players`.`id` AS `id`,`players`.`name` AS `name`,sum(`ratingchanges`.`rating_change`) AS `rating` from (`players` left join `ratingchanges` on((`players`.`id` = `ratingchanges`.`player_id`))) where (`ratingchanges`.`created` >= (curdate() - interval 8 week)) group by `players`.`id` order by `rating` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EloChanges`
--
ALTER TABLE `EloChanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Matches`
--
ALTER TABLE `Matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Matchtypes`
--
ALTER TABLE `Matchtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Memberships`
--
ALTER TABLE `Memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RatingChanges`
--
ALTER TABLE `RatingChanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tournaments`
--
ALTER TABLE `Tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EloChanges`
--
ALTER TABLE `EloChanges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Matches`
--
ALTER TABLE `Matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Matchtypes`
--
ALTER TABLE `Matchtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Memberships`
--
ALTER TABLE `Memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Players`
--
ALTER TABLE `Players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `RatingChanges`
--
ALTER TABLE `RatingChanges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Teams`
--
ALTER TABLE `Teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tournaments`
--
ALTER TABLE `Tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
