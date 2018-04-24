-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306:3306
-- Generation Time: Apr 18, 2018 at 11:59 AM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `community`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `post_id` int(11) NOT NULL,
  `user_id` int(40) NOT NULL,
  `status` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`post_id`, `user_id`, `status`, `time`) VALUES
(1, 1, ' nh', '2017-12-27 08:15:02'),
(2, 1, ' Hello ', '2018-01-02 18:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `circles`
--

CREATE TABLE `circles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circles`
--

INSERT INTO `circles` (`id`, `name`, `description`, `image`) VALUES
(1, 'My Circle', 'pdsppadsas', ''),
(3, 'VCX', 'dsalk;dsakl;', 'circles/VCX/valeriy-andrushko-406370.jpg'),
(4, 'Hello World', 'dasl;kdaslk', 'circles/Hello World/valeriy-andrushko-406370.jpg'),
(5, 'faltoo group', 'faltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo groupfaltoo group', ''),
(6, 'COMSATS wah', 'd;lasdlkas;dkas', 'circles/COMSATS wah/1_wqYF-8Dmh7LhtLkKfERc3Q.png'),
(12, 'sdkaadskl;7', 'dsasd', 'circles/sdkaadskl;7/1_wqYF-8Dmh7LhtLkKfERc3Q.png'),
(13, 'dadsd', 'dsdsa', 'circles/dadsd/117bf50c48714124fda1c9dbba29e49a.jpg'),
(14, 'npmiopm', 'dadsas', 'circles/npmiopm/a993ab60e875afc1eb3becf98749767e.gif'),
(15, 'dsdsaladsl;k', 'sla;daslkqkl', 'circles/dsdsaladsl;k/29683542_727076164348085_3112233497107003180_n.jpg'),
(16, 'dsaasd', 'dlkasdsakj', 'circles/dsaasd/etienne-beauregard-riverin-365040-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `circle_comments`
--

CREATE TABLE `circle_comments` (
  `comment_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(40) NOT NULL,
  `status` longtext NOT NULL,
  `times` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `circle_comments_reply`
--

CREATE TABLE `circle_comments_reply` (
  `reply_id` int(11) UNSIGNED NOT NULL,
  `circle_id` int(11) NOT NULL,
  `comment_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `body` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `circle_posts`
--

CREATE TABLE `circle_posts` (
  `post_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `u_id` int(40) NOT NULL,
  `status` text NOT NULL,
  `post_image` text DEFAULT NULL,
  `times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle_posts`
--

INSERT INTO `circle_posts` (`post_id`, `circle_id`, `u_id`, `status`, `post_image`, `times`) VALUES
(6, 2, 20, 'Danial\r\n', NULL, '2018-04-16 22:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `circle_post_review`
--

CREATE TABLE `circle_post_review` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `review` int(1) NOT NULL DEFAULT 2,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle_post_review`
--

INSERT INTO `circle_post_review` (`id`, `post_id`, `review`, `user_id`) VALUES
(1, 36, 1, 20),
(2, 33, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(40) NOT NULL,
  `status` longtext NOT NULL,
  `times` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `p_id`, `user_id`, `status`, `times`) VALUES
(1, 5, 2, 'This is my first comment', '2018-01-31 19:00:00'),
(2, 3, 5, 'Hello WOrld', '2018-02-06 19:00:00'),
(3, 20, 2, 'dsads', '2018-02-28 11:33:09'),
(4, 20, 2, 'dsads', '2018-02-28 11:33:21'),
(5, 16, 2, 'hello everyone', '2018-02-28 11:34:17'),
(6, 10, 2, 'Danialdasd', '2018-02-28 11:35:13'),
(7, 21, 2, 'That is nice view', '2018-02-28 11:37:13'),
(8, 22, 2, 'Comsats Wah Cantt Commented', '2018-02-28 11:37:54'),
(9, 23, 2, 'No Big Deal, Losing and winning is part of the game, Keep on rocking Lahore Qalandars!', '2018-02-28 11:40:52'),
(10, 23, 2, 'adsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjadsadsnnasdkjads', '2018-02-28 11:41:11'),
(11, 23, 2, 'dklsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaadklsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2018-02-28 11:47:36'),
(12, 17, 2, 'xxxx', '2018-02-28 11:48:02'),
(13, 15, 2, 'ZEUS LORD', '2018-02-28 11:48:26'),
(14, 24, 2, 'Welcome Raheel Bro! Love From Quetta', '2018-02-28 11:49:39'),
(15, 23, 2, 'I am supporting PSL 2018 (zalmi)', '2018-02-28 12:50:50'),
(16, 25, 5, 'ok ', '2018-03-01 07:48:04'),
(17, 25, 5, 'jkdkjsa', '2018-03-01 07:48:23'),
(18, 25, 5, 'jkdkjsa', '2018-03-01 07:48:23'),
(19, 25, 5, 'xxxx', '2018-03-01 07:48:34'),
(20, 26, 2, 'kdjskadjs', '2018-03-07 06:41:12'),
(21, 27, 2, 'Awesome!', '2018-03-07 14:31:16'),
(22, 27, 2, 'jdasdlakjsd', '2018-04-04 12:35:11'),
(23, 27, 8, 'dasjkdsa', '2018-04-05 18:08:43'),
(24, 27, 8, 'dasjkdsa', '2018-04-05 18:08:43'),
(25, 27, 20, 'ajsddskjalsadk]', '2018-04-07 18:02:44'),
(26, 28, 20, 'daskdsalkda', '2018-04-07 18:02:48'),
(27, 35, 1, 'zdfsghfggjklkhgff', '2018-04-16 11:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE `comment_reply` (
  `reply_id` int(11) UNSIGNED NOT NULL,
  `comment_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `body` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_reply`
--

INSERT INTO `comment_reply` (`reply_id`, `comment_id`, `user_id`, `body`, `time`) VALUES
(1, 21, 2, 'kjjkl', '2018-04-04 12:30:20'),
(2, 21, 2, 'dsksadksa', '2018-04-04 12:33:55'),
(3, 20, 2, 'sdsakdaksd', '2018-04-04 12:34:03'),
(4, 20, 2, 'sddsa', '2018-04-04 12:34:09'),
(5, 21, 2, 'dkaldjla', '2018-04-04 12:34:59'),
(6, 22, 2, 'dadkjasdjkla', '2018-04-04 12:35:17'),
(7, 10, 8, 'dasjdsajk', '2018-04-05 18:08:38'),
(8, 22, 8, 'dsklsdal', '2018-04-05 18:08:51'),
(9, 26, 20, 'sadlkksadklasd', '2018-04-07 18:02:51'),
(10, 26, 20, 'dsakdjsa', '2018-04-07 18:02:55'),
(11, 27, 1, 'dfghjhgfd', '2018-04-16 11:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `post_id` int(11) NOT NULL,
  `u_id` int(40) NOT NULL,
  `status` text NOT NULL,
  `post_image` text DEFAULT 'NULL',
  `times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`post_id`, `u_id`, `status`, `post_image`, `times`) VALUES
(1, 1, ' Hello everyone ', 'NULL', '2018-01-02 17:57:11'),
(2, 2, ' Salam to all friends ', 'NULL', '2018-01-02 17:58:37'),
(3, 1, ' Education ', 'NULL', '2018-01-03 06:12:43'),
(4, 1, ' Huma ka name bhans hai ', 'NULL', '2018-01-03 08:10:03'),
(5, 1, ' jjjjjjjjjjjjjjj', 'NULL', '2018-01-03 08:47:17'),
(6, 2, 'bananananan', 'NULL', '2018-02-27 18:56:10'),
(7, 2, 'dskldsakjlasd\r\n', 'NULL', '2018-02-27 18:56:59'),
(8, 2, '', 'NULL', '2018-02-27 19:11:01'),
(9, 2, '', 'NULL', '2018-02-27 19:11:35'),
(10, 2, 'dsadsa', 'NULL', '2018-02-27 19:12:58'),
(11, 2, 'dsasdsa', 'NULL', '2018-02-27 19:13:14'),
(12, 2, 'dsasdsa', 'NULL', '2018-02-27 19:13:22'),
(13, 2, 'dsasdsa', 'NULL', '2018-02-27 19:13:37'),
(14, 2, '', '1519742049/1519742049..jpg', '2018-02-27 19:34:09'),
(15, 2, 'Played Hell Of A Lot Of Skyrim!!!', '1519742580/1519742580..jpg', '2018-02-27 19:43:00'),
(16, 2, 'Only God can judge me now', '1519742621/1519742621..jpg', '2018-02-27 19:43:41'),
(17, 4, 'Za maraa', 'NULL', '2018-02-27 19:58:58'),
(18, 4, 'za mara biya waraksha nazar maatay', 'NULL', '2018-02-27 19:59:44'),
(19, 4, 'dakjslasdkladkjadkslj', '1519743594/1519743594..jpeg', '2018-02-27 19:59:54'),
(20, 4, 'I am on a weed! hurr  hurr', '1519743637/1519743637..jpg', '2018-02-27 20:00:37'),
(21, 2, 'Bilal Ihsan-8B and Danial Shabbir BSE-4B  First Post', '1519817780/1519817780..jpg', '2018-02-28 16:36:20'),
(22, 2, 'Second Post Dummy', '1519817860/1519817860..png', '2018-02-28 16:37:40'),
(23, 2, 'Lahore Qalandars, hahaha lost once again!', '1519818006/1519818006..jpg', '2018-02-28 16:40:06'),
(24, 2, 'Raheel Raza Is Here', '1519818547/1519818547..jpg', '2018-02-28 16:49:07'),
(25, 5, 'Hello i am here', '1519890452/1519890452..jpg', '2018-03-01 12:47:32'),
(26, 2, 'Shams is great in spirtuality!', '1520404861/1520404861..jpg', '2018-03-07 11:41:01'),
(27, 2, 'Hello World!', '1520433061/1520433061..jpg', '2018-03-07 19:31:01'),
(29, 20, 'dasdsa', '1523870488/1523870488..jpg', '2018-04-16 14:21:28'),
(33, 20, 'sdasad', 'NULL', '2018-04-16 14:32:14'),
(36, 20, 'dlkjasda\r\n', 'NULL', '2018-04-18 14:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `post_id` int(11) NOT NULL,
  `user_id` int(40) NOT NULL,
  `status` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `post_id` int(11) NOT NULL,
  `user_id` int(40) NOT NULL,
  `status` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`post_id`, `user_id`, `status`, `time`) VALUES
(1, 1, ' fdsfsd', '2018-02-08 07:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `post_review`
--

CREATE TABLE `post_review` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `review` int(1) NOT NULL DEFAULT 2,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_review`
--

INSERT INTO `post_review` (`id`, `post_id`, `review`, `user_id`) VALUES
(28, 36, 0, 20),
(29, 33, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `post_id` int(11) NOT NULL,
  `user_id` int(40) NOT NULL,
  `status` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`post_id`, `user_id`, `status`, `time`) VALUES
(1, 1, 'This is my first post in this category', '2017-12-26 16:24:35'),
(2, 1, ' HEllo everyone ', '2017-12-26 18:56:45'),
(3, 1, ' hello i am warda kaghzi', '2017-12-27 08:41:05'),
(4, 1, ' hello i am warda kaghzi', '2017-12-27 08:41:26'),
(6, 1, ' hello', '2017-12-27 11:41:42'),
(7, 1, ' hello i am bilal and i am feeling crazy', '2017-12-27 11:42:15'),
(8, 1, ' gfgfjj', '2018-01-03 06:08:58'),
(9, 1, ' laskjdlaksjdla', '2018-01-03 06:12:22'),
(10, 1, ' adsadsasasdsdadsadsasd  sdfdfasfsd sdfsdfs', '2018-01-03 07:14:21'),
(11, 1, ' Maheen is here', '2018-01-03 08:09:44'),
(13, 1, ' g,fg,fgs,g,ss', '2018-02-08 07:16:33'),
(14, 1, ' Hello umair ', '2018-02-11 19:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `password` text NOT NULL,
  `PhoneNo` int(13) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `image`, `password`, `PhoneNo`, `type`) VALUES
(1, 'Bilal', 'metalcool07@yahoo.com', 'metalcool07@yahoo.com/ffff.jpeg', 'password', 1234, 'admin'),
(2, 'Warda Kazmix', 'wardakazmi5051@gmail.com', 'wardakazmi5051@gmail.com/paul-larkin-524582.jpg', 'password', 312312, 'user'),
(3, 'Amjad Usman', 'Amjad@app.com', 'AVATAR', 'password', 312312, 'user'),
(4, 'Wasif Khan', 'wasifkhan@gmail.com', 'wasifkhan@gmail.com/nicole-harrington-516250.jpg', '123456789', 123456789, 'user'),
(5, 'Shamsuddin Gellani', 'shams@app.com', 'shams@app.com/valeriy-andrushko-406370.jpg', 'password', 12345, 'user'),
(6, 'DanialOX', 'metalcool076@yahoo.com', 'metalcool076@yahoo.com/117bf50c48714124fda1c9dbba29e49a.jpg', 'password', 321312321, 'user'),
(7, 'DanialOX', 'email@email.com', 'email@email.com/1_wqYF-8Dmh7LhtLkKfERc3Q.png', 'password', 32112313, 'user'),
(8, 'Me', 'me@me.com', 'me@me.com/117bf50c48714124fda1c9dbba29e49a.jpg', 'password', 32, 'user'),
(19, 'xxx', 'xxx@xxx.xxx', 'AVATAR', 'password', 31233, 'user'),
(20, 'vvv', 'vv@vv.vv', 'AVATAR.png', 'password', 123, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `surrogate_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`surrogate_id`, `group_id`, `user_id`) VALUES
(1, 3, 2),
(2, 1, 2),
(5, 2, 2),
(6, 4, 2),
(7, 4, 1),
(8, 3, 2),
(9, 4, 2),
(10, 4, 2),
(11, 4, 2),
(12, 4, 2),
(13, 5, 2),
(14, 6, 2),
(15, 12, 2),
(16, 14, 2),
(17, 15, 2),
(18, 13, 8),
(19, 1, 1),
(20, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `cover_image` varchar(255) NOT NULL DEFAULT 'undefined',
  `gender` varchar(255) NOT NULL DEFAULT 'Not Mentioned',
  `total_circles` varchar(255) NOT NULL DEFAULT 'Not Mentioned',
  `address` varchar(255) NOT NULL DEFAULT 'Not Mentioned',
  `works_at` varchar(255) NOT NULL DEFAULT 'Not Mentioned',
  `studied_at` varchar(255) NOT NULL DEFAULT 'Not Mentioned',
  `isUndergraduate` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_id`, `cover_image`, `gender`, `total_circles`, `address`, `works_at`, `studied_at`, `isUndergraduate`) VALUES
(1, 20, 'undefined', '1', 'Not Mentioned', 'dsadads', 'sdadsad', 'dsasadasd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `circles`
--
ALTER TABLE `circles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `circle_comments`
--
ALTER TABLE `circle_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `circle_comments_reply`
--
ALTER TABLE `circle_comments_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `circle_posts`
--
ALTER TABLE `circle_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `circle_post_review`
--
ALTER TABLE `circle_post_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_review`
--
ALTER TABLE `post_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`surrogate_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `circles`
--
ALTER TABLE `circles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `circle_comments`
--
ALTER TABLE `circle_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circle_comments_reply`
--
ALTER TABLE `circle_comments_reply`
  MODIFY `reply_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circle_posts`
--
ALTER TABLE `circle_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `circle_post_review`
--
ALTER TABLE `circle_post_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comment_reply`
--
ALTER TABLE `comment_reply`
  MODIFY `reply_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_review`
--
ALTER TABLE `post_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `surrogate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
