-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2017 at 12:59 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `calc_elo` (IN `match_id` INT(11))  NO SQL
BEGIN
DECLARE t1 INT;
DECLARE t2 INT;
DECLARE winner INT;
DECLARE k INT;
DECLARE eloChange INT;
DECLARE t1elo INT;
DECLARE t2elo INT;
DECLARE R1 DOUBLE;
DECLARE R2 DOUBLE;
DECLARE E1 DOUBLE;
DECLARE E2 DOUBLE;

SELECT Matches.team1_id, Matches.team2_id, Matches.winner_id, Matchtypes.k
INTO t1, t2, winner, k
FROM Matches 
INNER JOIN Matchtypes ON Matches.matchtype_id = Matchtypes.id
WHERE Matches.id = match_id;

CALL get_team_elo(t1, t1elo);
CALL get_team_elo(t2, t2elo);

SET R1 = POW(10, (t1elo / 400));
SET R2 = POW(10, (t2elo / 400));

SET E1 = R1 / (R1 + R2);
SET E2 = R2 / (R2 + R1);

IF winner = t1 THEN
	SET eloChange = k*(1-E1);

	#Winners
	INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player1_id, match_id, Teams.tournament_id, eloChange
    FROM Teams WHERE Teams.id = t1;
    INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player2_id, match_id, Teams.tournament_id, eloChange
    FROM Teams WHERE Teams.id = t1;
    
    #Loosers
    INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player1_id, match_id, Teams.tournament_id, -1 * eloChange
    FROM Teams WHERE Teams.id = t2;
    INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player2_id, match_id, Teams.tournament_id, -1 * eloChange
    FROM Teams WHERE Teams.id = t2;
ELSEIF winner = t2 THEN
	SET eloChange = k*(1-E2);

	INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player1_id, match_id, Teams.tournament_id, eloChange
    FROM Teams WHERE Teams.id = t2;
    INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player2_id, match_id, Teams.tournament_id, eloChange
    FROM Teams WHERE Teams.id = t2;
    
    #Loosers
    INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player1_id, match_id, Teams.tournament_id, -1 * eloChange
    FROM Teams WHERE Teams.id = t1;
    INSERT INTO elo_changes (player_id, match_id, tournament_id, elo_change)
    SELECT Teams.player2_id, match_id, Teams.tournament_id, -1 * eloChange
    FROM Teams WHERE Teams.id = t1;
END IF;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_team_elo` (IN `team_id` INT(11), OUT `team_elo` INT(11))  NO SQL
SELECT SUM(Players.elo)
FROM Teams
INNER JOIN Players ON Teams.player1_id = Players.id OR Teams.player2_id = Players.id
WHERE Teams.id = team_id
INTO team_elo$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `current_rating`
-- (See below for the actual view)
--
CREATE TABLE `current_rating` (
`id` int(11)
,`name` varchar(11)
,`rating` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `current_ratings`
-- (See below for the actual view)
--
CREATE TABLE `current_ratings` (
`id` int(11)
,`name` varchar(11)
,`rating` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `elo_changes`
--

CREATE TABLE `elo_changes` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `elo_change` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elo_changes`
--

INSERT INTO `elo_changes` (`id`, `player_id`, `match_id`, `tournament_id`, `elo_change`, `created`) VALUES
(2, 1, 1, 1, 23, '2017-11-06 22:06:44'),
(3, 2, 1, 1, 23, '2017-11-06 22:06:44'),
(4, 3, 1, 1, -23, '2017-11-06 22:06:44'),
(5, 4, 1, 1, -23, '2017-11-06 22:06:44'),
(6, 1, 1, 1, 23, '2017-11-06 22:12:46'),
(7, 2, 1, 1, 23, '2017-11-06 22:12:46'),
(8, 3, 1, 1, -23, '2017-11-06 22:12:46'),
(9, 4, 1, 1, -23, '2017-11-06 22:12:46'),
(10, 3, 1, 1, 2, '2017-11-06 22:15:43'),
(11, 4, 1, 1, 2, '2017-11-06 22:15:43'),
(12, 1, 1, 1, -2, '2017-11-06 22:15:43'),
(13, 2, 1, 1, -2, '2017-11-06 22:15:43');

--
-- Triggers `elo_changes`
--
DELIMITER $$
CREATE TRIGGER `elo_change_update_player` AFTER INSERT ON `elo_changes` FOR EACH ROW UPDATE Players
SET Players.elo = Players.elo + NEW.elo_change
WHERE Players.id = NEW.player_id
$$
DELIMITER ;

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
  `group_id` int(11) DEFAULT NULL,
  `team1_id` int(11) DEFAULT NULL,
  `team2_id` int(11) DEFAULT NULL,
  `team1_score` int(11) DEFAULT NULL,
  `team2_score` int(11) DEFAULT NULL,
  `winner_id` int(11) DEFAULT NULL,
  `matchtype_id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `started` datetime DEFAULT NULL,
  `ended` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Matches`
--

INSERT INTO `Matches` (`id`, `tournament_id`, `group_id`, `team1_id`, `team2_id`, `team1_score`, `team2_score`, `winner_id`, `matchtype_id`, `table_id`, `created`, `started`, `ended`) VALUES
(1, 1, 1, 1, 2, 2, 7, 1, 1, 1, '2017-11-05 23:47:39', '2017-11-05 00:00:00', '2017-11-05 07:00:00');

--
-- Triggers `Matches`
--
DELIMITER $$
CREATE TRIGGER `winner_changed_update_elo` AFTER UPDATE ON `Matches` FOR EACH ROW BEGIN
DECLARE formerChanges INT;

IF OLD.winner_id != NEW.winner_id THEN 
	SELECT COUNT(*)
    FROM elo_changes
    WHERE NEW.id = elo_changes.match_id
    INTO formerChanges;
    
    IF formerChanges > 0 THEN
		INSERT INTO Users (name, password, role_id) VALUES (1, 1, 1);
	END IF;
    
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Matchtypes`
--

CREATE TABLE `Matchtypes` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Matchtypes`
--

INSERT INTO `Matchtypes` (`id`, `name`, `k`) VALUES
(1, 'FT7', 24),
(2, 'BO3', 28),
(3, 'BO5', 32);

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
-- Table structure for table `Placements`
--

CREATE TABLE `Placements` (
  `id` int(11) NOT NULL,
  `placement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Placements`
--

INSERT INTO `Placements` (`id`, `placement`) VALUES
(1, 'Vinder'),
(2, 'Tabt finale'),
(3, 'Tabt semi-finale'),
(4, 'Tabt kvart-finale'),
(5, 'Vinder Jays'),
(6, 'Tabt Jays finale'),
(7, 'Tabt Jays semi-finale'),
(8, 'Tabt Jays kvart-final'),
(9, 'Gik ikke videre');

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
(1, 'a', '1', '2017-11-05 15:37:44', 0, NULL, 0, 1221, 1),
(2, 'b', '2', '2017-11-05 15:37:44', 0, NULL, 0, 1021, 1),
(3, 'c', '3', '2017-11-05 15:37:54', 0, NULL, 0, 1379, 1),
(4, 'd', '4', '2017-11-05 15:37:54', 0, NULL, 0, 1279, 1),
(5, 'e', '5', '2017-11-05 15:38:08', 0, NULL, 0, 1200, 1),
(6, 'f', '6', '2017-11-05 15:38:08', 0, NULL, 0, 1200, 1),
(7, 'g', '7', '2017-11-05 15:38:26', 0, NULL, 0, 1200, 1),
(8, 'h', '8', '2017-11-05 15:38:26', 0, NULL, 0, 1200, 1),
(9, 'test', '1234', '2017-11-18 12:57:45', 0, NULL, 0, 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_changes`
--

CREATE TABLE `rating_changes` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `rating_change` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_changes`
--

INSERT INTO `rating_changes` (`id`, `tournament_id`, `player_id`, `rating_change`, `created`) VALUES
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
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `occupied` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `occupied`) VALUES
(1, 'Bord 1', 0),
(2, 'Bord 2', 0),
(3, 'Bord 3', 0),
(4, 'Bord 4', 0),
(5, 'Bord 5', 0);

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
  `placement_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Teams`
--

INSERT INTO `Teams` (`id`, `tournament_id`, `group_id`, `player1_id`, `player2_id`, `placement_id`, `created`) VALUES
(1, 1, 1, 1, 2, NULL, '2017-11-05 20:52:40'),
(2, 1, 1, 3, 4, NULL, '2017-11-05 20:52:40');

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

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `password`, `role_id`) VALUES
(1, '1', '1', 1);

-- --------------------------------------------------------

--
-- Structure for view `current_rating`
--
DROP TABLE IF EXISTS `current_rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `current_rating`  AS  select `players`.`id` AS `id`,`players`.`name` AS `name`,sum(`rating_changes`.`rating_change`) AS `rating` from (`players` join `rating_changes` on((`players`.`id` = `rating_changes`.`player_id`))) where (`rating_changes`.`created` >= (curdate() - interval 8 week)) group by `players`.`id` order by `rating` desc ;

-- --------------------------------------------------------

--
-- Structure for view `current_ratings`
--
DROP TABLE IF EXISTS `current_ratings`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `current_ratings`  AS  select `players`.`id` AS `id`,`players`.`name` AS `name`,sum(`rating_changes`.`rating_change`) AS `rating` from (`players` left join `rating_changes` on((`players`.`id` = `rating_changes`.`player_id`))) where (`rating_changes`.`created` >= (curdate() - interval 8 week)) group by `players`.`id` order by `rating` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elo_changes`
--
ALTER TABLE `elo_changes`
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
-- Indexes for table `Placements`
--
ALTER TABLE `Placements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_changes`
--
ALTER TABLE `rating_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `elo_changes`
--
ALTER TABLE `elo_changes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Matches`
--
ALTER TABLE `Matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Matchtypes`
--
ALTER TABLE `Matchtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Memberships`
--
ALTER TABLE `Memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Placements`
--
ALTER TABLE `Placements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Players`
--
ALTER TABLE `Players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating_changes`
--
ALTER TABLE `rating_changes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Teams`
--
ALTER TABLE `Teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Tournaments`
--
ALTER TABLE `Tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
