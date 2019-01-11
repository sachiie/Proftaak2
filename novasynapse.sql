-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 02:21 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novasynapse`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_details`
--

CREATE TABLE `game_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `games_won` int(191) NOT NULL,
  `games_lost` int(191) NOT NULL,
  `games_played` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_details`
--

INSERT INTO `game_details` (`id`, `user_id`, `games_won`, `games_lost`, `games_played`) VALUES
(1, 2, 4, 19, 23),
(2, 4, 14, 7, 21),
(3, 9, 13, 17, 30);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_16_090045_user_details', 1),
(4, '2018_11_16_090736_game_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$2VpIUwgksm5C2abOGPhVo.uIq6bRCCvbXtlda95vS8h7hLzZq12Ky', 'FjJ1z2MgQGQHEEvBwyngG7MEXtsQPeyznWFwuuz476r7cY9NH7v9IQMxmCvf', '2018-11-22 06:52:40', '2018-11-22 06:52:40'),
(3, 'test', 'testaccount@test.com', NULL, '$2y$10$6lBL3SzqbClHCTPnYobHj.Kgps/XWu5eBtCpp7jZsu6dd.S3Skheu', 'QmAgz0OUnWLTxSlMgg3KhW3ehshBvzhI4LLCw7cse6zQrgsEzZ5nUYnmBmdg', '2018-11-22 09:36:28', '2018-11-22 09:36:28'),
(4, 'admin2', 'admin2@admin.com', NULL, '$2y$10$9v1tfJrpQtWI5RWu.rMEVeUQ/5NJSttA7znb16QMa10KHl0WELGfC', 'mQJFMsNEWI353OCoYIgcJdIOmqrxdx6tbW2279aqyWChruFIBRzFBaTxycMW', '2018-11-22 09:40:55', '2018-11-22 09:40:55'),
(5, 'test2', 'testaccount@test.com2', NULL, '$2y$10$3zr6HV4TISDTFXOGCz0qW.fONXRsGqvHRFti/Ue8ikcDt4Ci/uwgK', 'CqOZyjAX03xM1cGyHWfkpsR4W11GP6qTpffpTbRtVjTM9N2Ia7rybfVB212a', '2018-11-22 09:43:10', '2018-11-22 09:43:10'),
(6, 'tester', 'tester@test.com', NULL, '$2y$10$1Sjd3i10isFy6cFLtu.CjuLd7cU2g7yuX2nFYPqG4VjQrantFc0cC', 'FzhtrVegT569f7iuKkNpMurIu9moQcC4ICSQQUxVFjp2HhmyqQSQP63vOQQF', '2018-11-22 09:49:01', '2018-11-22 09:49:01'),
(7, 'testacc', 'testacc@mail.com', NULL, '$2y$10$0wyfw7KpCGzcs3Yo6UYj9.1iUl3v6PA3vCr7hrn3VYhWYw3znrqiq', NULL, '2018-11-28 10:25:33', '2018-11-28 10:25:33'),
(8, 'admin test naam', 'admin4@admin.com', NULL, '$2y$10$spWaMNdojkMk5dd813AFI.sd3amjf.gOaq0y56w6q23SyfI.I9YYG', 'wtVL4ccdM3Ly1mwiHpfhwyvyTWS0YGS3I95LMLFw43EShPofkZHlevfhhq0L', '2018-12-18 11:18:06', '2018-12-18 11:18:06'),
(9, 'edge', 'edge@gmail.com', NULL, '$2y$10$yod/TEexZsvxY8sDWMyEfOQut01VJqZRSM4VhyzVSYKEztId1keZS', 'x1IEc4RqX7C1vOy7OwoO6hCb5LARE8ubjLmE7swYtKI8zlaUoyqyzTkX1u5S', '2019-01-08 11:20:51', '2019-01-08 11:20:51'),
(10, 'fox', 'fox@gmail.com', NULL, '$2y$10$JKThPnqK33q5QOvttpoNOurTHMge7ZIW8znM5onDfO0Zxb9Gup3oG', NULL, '2019-01-08 11:43:15', '2019-01-08 11:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `profile_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_bio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `profile_name`, `profile_bio`) VALUES
(2, 'administrator', 'well hello there'),
(3, 'tt', 'w'),
(4, 'andere naam', 'dit is een langere biographie'),
(5, 'tt', 'w'),
(6, 'tt', 'w'),
(7, 'testacc', 'nobio'),
(8, 'admin test naam', 'nobio'),
(9, 'bedge', 'please fill in a bio'),
(10, 'fox', 'lmao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_details`
--
ALTER TABLE `game_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_details`
--
ALTER TABLE `game_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
