-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306:3306
-- Generation Time: Apr 25, 2018 at 06:27 PM
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
  `u_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `post_image` varchar(255) NOT NULL DEFAULT 'NULL',
  `times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`post_id`, `u_id`, `status`, `post_image`, `times`) VALUES
(2, 22, 'lkjjlklkj\r\n', 'NULL', '2018-04-24 18:57:44'),
(3, 8, 'lkdjflkjsldkjflkjsdflfjsdlkfl', 'NULL', '2018-04-25 14:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `circles`
--

CREATE TABLE `circles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circles`
--

INSERT INTO `circles` (`id`, `name`, `description`, `image`, `owner`) VALUES
(18, 'bilal', 'bilal is here ', 'circles/bilal/453214157.jpg', 22),
(23, 'Comsats', 'welcome to comsats ', 'circles/Comsats/Koala.jpg', 22);

-- --------------------------------------------------------

--
-- Table structure for table `circle_comments`
--

CREATE TABLE `circle_comments` (
  `comment_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
  `user_id` int(11) NOT NULL,
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
  `u_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `post_image` text DEFAULT NULL,
  `times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle_posts`
--

INSERT INTO `circle_posts` (`post_id`, `circle_id`, `u_id`, `status`, `post_image`, `times`) VALUES
(14, 23, 22, 'welcome to this circle ', NULL, '2018-04-23 10:22:02'),
(15, 23, 22, 'nm,mm', '1524461391/1524461391.jpg', '2018-04-23 10:29:51'),
(16, 23, 22, 'das', NULL, '2018-04-23 13:31:27'),
(17, 23, 22, 'dsa', '1524472294/1524472294.jpg', '2018-04-23 13:31:34');

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
(5, 14, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` longtext NOT NULL,
  `times` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `p_id`, `user_id`, `type`, `status`, `times`) VALUES
(32, 1, 22, 'health', 'dasd', '2018-04-24 13:24:50'),
(33, 44, 22, 'education', 'daslkjdas', '2018-04-24 13:29:38'),
(34, 2, 22, 'health', 'cc', '2018-04-24 13:32:17'),
(36, 47, 22, 'education', 'hello', '2018-04-25 10:07:54'),
(38, 48, 22, 'education', 'pasdk', '2018-04-25 16:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `comment_reply`
--

CREATE TABLE `comment_reply` (
  `reply_id` int(11) UNSIGNED NOT NULL,
  `comment_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_reply`
--

INSERT INTO `comment_reply` (`reply_id`, `comment_id`, `user_id`, `body`, `time`) VALUES
(9, 25, 22, 'hi', '2018-04-23 05:08:19'),
(10, 27, 22, 'nahvd', '2018-04-23 05:31:56'),
(11, 28, 22, 'hi', '2018-04-23 05:49:21'),
(12, 30, 22, 'hgtyigfhfhn', '2018-04-23 07:50:58'),
(13, 31, 22, 'hy', '2018-04-24 09:02:27'),
(14, 33, 22, 'dsakjdsak', '2018-04-24 13:29:42'),
(16, 36, 22, 'ajb', '2018-04-25 10:08:05'),
(17, 38, 22, 'klsa', '2018-04-25 16:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `post_image` varchar(255) NOT NULL DEFAULT 'NULL',
  `times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`post_id`, `u_id`, `status`, `post_image`, `times`) VALUES
(48, 22, 'Hy i am new in wah cantt and i want to get information about good institutions here kindly suggest any school name and location of school.', 'NULL', '2018-04-25 15:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `organized_on` date NOT NULL,
  `organizer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `address`, `isActive`, `image`, `organized_on`, `organizer_id`) VALUES
(3, 'my event', 'kldjaslkdj', 'djsajklalks', 1, '1524596046.jpg', '0000-00-00', 22),
(4, 'dsajk', 'daskjaskjdskasjdkadsljlsadkjaslkdjaslkdjsalkdsalkdjaslkdjsaldjlsakdjlaskdjlkaslkjsa', 'dsakjldasklalkjsd', 1, '1524596864.jpg', '0000-00-00', 22),
(6, 'dsaklj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the induwqeeeeeeeeeeeeeeew', 'daskjl', 1, '1524597075.jpg', '0000-00-00', 22),
(10, 'cl;kalskd', 'dslsdalk', 'ldlasd;slk', 1, '1524670471.jpg', '0000-00-00', 22),
(12, 'sad', 'kdsa', 'akjlsd', 0, '1524672208.jpg', '2018-04-26', 22);

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `post_image` varchar(255) NOT NULL DEFAULT 'NULL',
  `times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`post_id`, `u_id`, `status`, `post_image`, `times`) VALUES
(1, 22, 'djkas\r\n', '1524575860/1524575860..jpg', '2018-04-24 18:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `post_review`
--

CREATE TABLE `post_review` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `review` int(1) NOT NULL DEFAULT 2,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_review`
--

INSERT INTO `post_review` (`id`, `post_id`, `type`, `review`, `user_id`) VALUES
(5, 44, 'education', 1, 22),
(7, 25, 'education', 0, 22),
(8, 2, 'health', 0, 22),
(9, 1, 'health', 0, 22),
(10, 37, 'education', 0, 22),
(11, 3, 'business', 1, 22),
(12, 45, 'education', 1, 22),
(16, 47, 'education', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `post_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `post_image` varchar(255) NOT NULL DEFAULT 'NULL',
  `times` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`post_id`, `u_id`, `status`, `post_image`, `times`) VALUES
(1, 22, 'fdsx', '1524578661/1524578661..jpg', '2018-04-24 19:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `PhoneNo` int(13) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `image`, `password`, `PhoneNo`, `type`) VALUES
(7, 'DanialOX', 'email@email.com', 'email@email.com/1_wqYF-8Dmh7LhtLkKfERc3Q.png', 'password', 32112313, 'user'),
(22, 'nashra', 'lk@lk.com', 'lk@lk.com/download.png', 'password', 231, 'admin');

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
(27, 17, 22),
(30, 21, 22),
(32, 23, 22),
(36, 24, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
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
(8, 22, 'undefined', '1', 'Not Mentioned', 'wah cantt', 'Microsoft', 'COMSATS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `circles`
--
ALTER TABLE `circles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `image` (`image`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `circle_comments`
--
ALTER TABLE `circle_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `circle_comments_reply`
--
ALTER TABLE `circle_comments_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `circle_posts`
--
ALTER TABLE `circle_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `circle_post_review`
--
ALTER TABLE `circle_post_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `post_review`
--
ALTER TABLE `post_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`surrogate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `circles`
--
ALTER TABLE `circles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `circle_post_review`
--
ALTER TABLE `circle_post_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comment_reply`
--
ALTER TABLE `comment_reply`
  MODIFY `reply_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `health`
--
ALTER TABLE `health`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_review`
--
ALTER TABLE `post_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `surrogate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `circles`
--
ALTER TABLE `circles`
  ADD CONSTRAINT `circles_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `circle_comments_reply`
--
ALTER TABLE `circle_comments_reply`
  ADD CONSTRAINT `circle_comments_reply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `circle_posts`
--
ALTER TABLE `circle_posts`
  ADD CONSTRAINT `circle_posts_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `circle_post_review`
--
ALTER TABLE `circle_post_review`
  ADD CONSTRAINT `circle_post_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_reply`
--
ALTER TABLE `comment_reply`
  ADD CONSTRAINT `comment_reply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `post_review`
--
ALTER TABLE `post_review`
  ADD CONSTRAINT `post_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_information`
--
ALTER TABLE `user_information`
  ADD CONSTRAINT `user_information_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
