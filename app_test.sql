-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2018 at 01:20 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `created_at`, `deleted_at`) VALUES
(1, 'A+, Great Quality', 6, '2018-05-19 05:12:07', NULL),
(2, 'Good Product', 11, '2018-05-19 05:18:41', NULL),
(3, '<p>This product is&nbsp;<strong>AWESOME</strong>!</p>\r\n<p>&nbsp;</p>', 6, '2018-05-19 00:17:04', NULL),
(4, '<p>What is this?</p>', 6, '2018-05-19 00:17:33', NULL),
(5, '<p>I <strong><em>really</em></strong> like this product.</p>', 15, '2018-05-19 12:55:03', NULL),
(6, '<p>This is the sixth message</p>', 15, '2018-05-19 13:35:28', NULL),
(7, '<p>This comment has been deleted.</p>', 15, '2018-05-19 16:05:25', '2018-05-19 16:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$12$KNjpmQ.5RhJmA5uqZPO75OwwVAvWrZm/b9UNJPknxsxZ9OeNEfd4a', NULL),
(2, 'admin1', '$2y$12$ANhJS9JDyDXxdKsp./8bVeENufyUHmPzpidl/IoLXv/AdagjaSuAi', NULL),
(3, 'admin2', '$2y$12$S9/sWrwQd7TI5h7c73cv.u49JugtDKFl9y/Axv.Vw2BPNWZsgKayq', NULL),
(4, 'admin3', '$2y$12$QLVRRy1vop0q9PH7njW4VOSEydsuDfjdO93W5afTZO6Z9chGeeiSi', NULL),
(5, 'admin4', '$2y$12$OarRttkHCl1YL7ghBjMaUO1NU/bUWdizlMZQj95U6rq6AH.IZ7DDa', NULL),
(6, 'admin5', '$2y$12$IwbleO5X2VYp9wjIvzdLD..Qu6hczdRzujogNYmK0pTjPVQHcMGR.', 'admin5@example.com'),
(7, 'admin6', '$2y$12$1hLFLDGevLNSm3OhpM8esehUVK05nqUxQAMph9wThIn03BCypKaQy', ''),
(9, 'admin7', '$2y$12$4.p0vnUZaf6RmCbeyocareWhKevMztI29HokAR.kzA8DnU1Mh3yeG', ''),
(10, 'admin8', '$2y$12$s7tvMLM9M42MaJudp5aq2.H72K1Mhx/5F7pcByDZQs5d/tiwqE.xy', ''),
(11, 'John', '$2y$12$RWBuawRFdZyShhnsttQFaeaTptWGs.lk63sVxofNozpqm2RNYjsfO', ''),
(12, 'Jack', '$2y$12$UVLN770cTfS1mCoEYoyUfeh9.gdaw8An.e0l1CzYa2qiTOIcZWsA6', ''),
(13, 'Joe', '$2y$12$UVLN770cTfS1mCoEYoyUfeh9.gdaw8An.e0l1CzYa2qiTOIcZWsA6', ''),
(14, 'Tom', '$2y$12$QArUXyU5/VDvOVAqrtJ5fuyxVh6d6IVTtistGy4I/RFiHDKsK0ive', ''),
(15, 'John3', '$2y$12$/j2JVAX5YQozXTQ11nT8veOWk8S3m2YmwAR3i8GJ05EozrrQphsj2', 'John@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_users_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_uindex` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
