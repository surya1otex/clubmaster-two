-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 01:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubmaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_masters`
--

CREATE TABLE `club_masters` (
  `club_id` int(10) UNSIGNED NOT NULL,
  `club_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_masters`
--

INSERT INTO `club_masters` (`club_id`, `club_name`, `created_at`, `updated_at`) VALUES
(1, 'Mumbai Indians', '2022-10-26 08:37:04', '2022-10-26 08:37:04'),
(2, 'Kolkata Knight Riders', '2022-10-26 08:37:20', '2022-10-26 08:37:20'),
(3, 'Chennai Super Kings', '2022-10-26 08:37:32', '2022-10-26 08:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_10_26_071049_create_club_masters_table', 1),
(4, '2022_10_26_071200_create_sports_masters_table', 1),
(5, '2022_10_26_072647_create_registation_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registation_details`
--

CREATE TABLE `registation_details` (
  `registation_id` int(10) UNSIGNED NOT NULL,
  `applicant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registation_details`
--

INSERT INTO `registation_details` (`registation_id`, `applicant_name`, `email_id`, `mobile_no`, `gender`, `dob`, `image_path`, `club_id`, `sports_id`, `created_at`, `updated_at`) VALUES
(1, 'Jeevan Bhuyan', 'admin@gmail.com', '7877480144', 'male', '1980-01-10', 'placeholder.jpg', 1, 1, '2022-10-27 01:53:00', '2022-10-27 01:53:00'),
(2, 'Raghav', 'raghav@gmail.com', '8007475877', 'male', '1993-03-11', 'placeholder.jpg', 2, 5, '2022-10-27 01:57:26', '2022-10-27 01:57:26'),
(3, 'Surajeet', 'surajeet@gmail.com', '8900741477', 'male', '1995-02-27', 'placeholder.jpg', 2, 5, '2022-10-27 01:59:54', '2022-10-27 01:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `sports_masters`
--

CREATE TABLE `sports_masters` (
  `sports_id` int(10) UNSIGNED NOT NULL,
  `sports_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` int(11) NOT NULL,
  `fees` double(15,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_masters`
--

INSERT INTO `sports_masters` (`sports_id`, `sports_name`, `club_id`, `fees`, `created_at`, `updated_at`) VALUES
(1, 'Cricket', 1, 7500.00000000, '2022-10-26 08:38:12', '2022-10-26 08:38:12'),
(2, 'Table Tenis', 1, 5800.00000000, '2022-10-26 08:38:32', '2022-10-26 08:38:32'),
(3, 'Football', 2, 6000.00000000, '2022-10-26 08:38:57', '2022-10-26 08:38:57'),
(4, 'Kabaddi', 2, 2500.00000000, '2022-10-26 08:40:15', '2022-10-26 08:40:15'),
(5, 'Shooting', 2, 4000.00000000, '2022-10-26 08:40:36', '2022-10-26 08:40:36'),
(6, 'Volleyball', 3, 8000.00000000, '2022-10-26 08:41:13', '2022-10-26 08:41:13'),
(7, 'Weightlifting', 3, 10000.00000000, '2022-10-26 08:41:35', '2022-10-26 08:41:35'),
(8, 'Hockey', 3, 14000.00000000, '2022-10-26 08:42:04', '2022-10-26 08:42:04'),
(9, 'Golf', 3, 15000.00000000, '2022-10-26 08:42:45', '2022-10-26 08:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_masters`
--
ALTER TABLE `club_masters`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registation_details`
--
ALTER TABLE `registation_details`
  ADD PRIMARY KEY (`registation_id`);

--
-- Indexes for table `sports_masters`
--
ALTER TABLE `sports_masters`
  ADD PRIMARY KEY (`sports_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club_masters`
--
ALTER TABLE `club_masters`
  MODIFY `club_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registation_details`
--
ALTER TABLE `registation_details`
  MODIFY `registation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sports_masters`
--
ALTER TABLE `sports_masters`
  MODIFY `sports_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
