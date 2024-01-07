-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 03:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `PostDescription` text NOT NULL,
  `postContent` text DEFAULT NULL,
  `postImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postTitle`, `PostDescription`, `postContent`, `postImage`) VALUES
(4, ' Long Lost Childhood Games - Lagori / Pittu', ' Lagori is called by different names in different parts of the country like Pittu (Haryana),  Yedu penkulata, Dikori or Pittu (Andhra Pradesh), dabba kali (Kerala),\"ezhu kallu) Tamil Nadu), sitoliya (Rajasthan), or satodiyu (Gujarat) etc.', 'Rules of the game:\r\n1. Two teams of equal players are to be formed. One team is Hitters(A), the other team chases(B).\r\n2. At the start of the game, a stack of seven stones is piled up at the center of the field. A player from one team tries to hit the ball from a distance(after a crease line) with the aim to knock down the pile. A player from the opposite team stands as a wicket keeper beyond the pile at a convenient position to catch the ball.\r\n3. Each player gets 3 chances to hit the pile. If the player(A) hits the pile and the opposite player(B) catches the ball, the entire team is out and the teams switch places.\r\n', 'img2.jpg'),
(5, 'Lagori / Pittu Garam / Seven Stones', 'Lagori is a team sport that originated in Southern part of India. The sport is a popular playground game, played only at a recreational level. The sport goes by many names, including Pittu Garam (meaning 7 stones), dikori, lingocha, pitto or Satoliya (Rajasthan).', 'Lagori, dikori or lagoori, also known as Lingocha, Pithu (Punjabi), Palli Patti (Karimnagar), Pitto (Rajasthan), Pittu (Bengal) or Satoliya(Madhya Pradesh).\r\n\r\nLagori is a team sport that originated in Southern part of India. The sport is played only at a recreational level, a popular playground game. The sport goes buy many names, including Pittu Garam (meaning 7 stones).\r\nLagori is played between two teams, with a minimum of 3 players and a maximum of nine on each team, using seven stones and a rubber ball. Each team gets nine chances, 3 players taking 3 chances each, to knock down the stones that are stacked vertically, from a distance of about 20ft. If one team is unable to knock down the stones the next team gets the chance to throw.\r\nIf the throwing team knocks down the stones, the objective of the team is to stack all the seven stones back. The objective of the defensive team is to strike any player of the throwing team with the ball, below knee level. Players on the defensive team are not allowed to run with the ball and have to pass between players to move the ball.\r\nIf the offensive team successfully stacks the stones first, the team receives a point, and gets to throw the ball again. If the defensive team is able to strike a player first below the knee, there is a change in possession.\r\nThere are no fixed rules for number of players or match durations. Matches are usually played for a fixed number of points, about 7 to 10.', 'img5.jpg'),
(6, ' Marcus Mergulhao / TNN / Updated: Feb 11, 2023, 11:57 IST SHARE AA +TEXT SIZE Small Medium Large ', 'PANAJI: Many have played lagori or seven stones during their younger days or at least tried their hand at it.', 'If some had persisted with the traditional sport known by different names in different parts of the country, chances are you can win a medal for the state at the National Games later this year.\r\nDuring a joint meeting between the state government and the Indian Olympic Association (IOA) early this week in Delhi, sports minister Govind Gaude recommended the inclusion of three sports, including lagori, as a medal sport.', 'img3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Ni_dpn', 'nk@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
