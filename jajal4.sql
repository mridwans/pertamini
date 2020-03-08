-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 08:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jajal4`
--

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
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(24, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 38, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_08_141112_create_konsumen_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabung`
--

CREATE TABLE `tabung` (
  `id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabung`
--

INSERT INTO `tabung` (`id`, `jenis`, `created_at`, `update_at`) VALUES
(1, 'Elpiji 3Kg', NULL, NULL),
(2, 'Elpiji 12Kg', NULL, NULL),
(3, 'Bright 5,5Kg', NULL, NULL),
(4, 'Bright 12Kg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tabung_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `kons_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tabung_id`, `jumlah`, `lokasi`, `latitude`, `longitude`, `kons_id`, `user_id`, `updated_at`, `created_at`) VALUES
(7, 1, 20, '', 'jogja', '', 24, 1, '2020-03-03 03:51:36', '2020-03-03 03:51:36'),
(9, 1, 10, '', 'jogja', '', 32, 24, '2020-03-02 22:38:57', '2020-03-02 22:38:57'),
(10, 1, 10, '', 'jogja', '', 33, 24, '2020-03-02 22:41:51', '2020-03-02 22:41:51'),
(11, 2, 20, '', 'jogja', '', 24, 1, '2020-03-03 00:03:16', '2020-03-03 00:03:16'),
(13, 1, 20, '', 'jogja', '', 33, 24, '2020-03-03 00:15:19', '2020-03-03 00:15:19'),
(14, 1, 10, '', 'jogja', '', 25, 1, '2020-03-04 10:17:26', '2020-03-04 10:17:26'),
(15, 1, 10, '', NULL, NULL, 25, 1, '2020-03-04 12:00:55', '2020-03-04 12:00:55'),
(16, 1, 10, '', NULL, NULL, 25, 1, '2020-03-04 12:03:12', '2020-03-04 12:03:12'),
(17, 1, 10, '', NULL, NULL, 25, 1, '2020-03-04 12:06:56', '2020-03-04 12:06:56'),
(18, 1, 20, '', NULL, NULL, 24, 1, '2020-03-04 12:08:16', '2020-03-04 12:08:16'),
(19, 1, 5, '', NULL, NULL, 25, 1, '2020-03-04 22:55:52', '2020-03-04 22:55:52'),
(20, 1, 5, '', NULL, NULL, 25, 1, '2020-03-04 22:58:44', '2020-03-04 22:58:44'),
(21, 1, 5, '', NULL, NULL, 25, 1, '2020-03-04 23:01:51', '2020-03-04 23:01:51'),
(22, 1, 5, '', NULL, NULL, 25, 1, '2020-03-04 23:03:24', '2020-03-04 23:03:24'),
(23, 1, 5, '', NULL, NULL, 36, 24, '2020-03-04 23:45:06', '2020-03-04 23:45:06'),
(24, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 01:00:29', '2020-03-05 01:00:29'),
(25, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 01:05:43', '2020-03-05 01:05:43'),
(26, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 01:07:21', '2020-03-05 01:07:21'),
(27, 1, 60, '', NULL, NULL, 36, 24, '2020-03-05 01:11:06', '2020-03-05 01:11:06'),
(28, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 01:15:03', '2020-03-05 01:15:03'),
(29, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 01:16:53', '2020-03-05 01:16:53'),
(30, 1, 0, '', NULL, NULL, 36, 24, '2020-03-05 01:26:17', '2020-03-05 01:26:17'),
(31, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 01:47:42', '2020-03-05 01:47:42'),
(32, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 01:52:54', '2020-03-05 01:52:54'),
(33, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 02:07:25', '2020-03-05 02:07:25'),
(34, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 02:11:12', '2020-03-05 02:11:12'),
(35, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 02:12:23', '2020-03-05 02:12:23'),
(36, 1, 10, '', NULL, NULL, 36, 24, '2020-03-05 02:37:49', '2020-03-05 02:37:49'),
(37, 1, 5, 'jogja', NULL, NULL, 36, 24, '2020-03-05 13:36:26', '2020-03-05 13:36:26'),
(38, 1, 5, 'jogja', NULL, NULL, 36, 24, '2020-03-05 16:16:02', '2020-03-05 16:16:02'),
(39, 1, 5, 'jogja', NULL, NULL, 36, 24, '2020-03-05 16:18:03', '2020-03-05 16:18:03'),
(40, 1, 5, 'jogja', NULL, NULL, 36, 24, '2020-03-05 16:26:19', '2020-03-05 16:26:19'),
(41, 1, 5, 'jogja', NULL, NULL, 36, 24, '2020-03-05 16:27:48', '2020-03-05 16:27:48'),
(42, 1, 5, 'jogja', NULL, NULL, 36, 24, '2020-03-05 16:29:16', '2020-03-05 16:29:16'),
(43, 1, 5, 'jogja', NULL, NULL, 36, 24, '2020-03-05 16:33:48', '2020-03-05 16:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_maker` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_maker`, `name`, `email`, `email_verified_at`, `password`, `role`, `jenis_kelamin`, `alamat`, `telepon`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ridwan', 'ridwan@mail.com', NULL, '$2y$10$w0gghooNvfznY4hq.zdSp.rw/nhLlLI1JOkjGKQ5b7VTODzjAC0sm', 'admin', 'Laki-laki', 'Jogja', '085729496066', 'Ut4Bf6OtPZYrIXAyRnFTnQfQ4wrbHq8tMoyWxqjc90f6VMEZFG92jykrOkei', '2020-02-15 21:43:35', '2020-02-15 21:43:35'),
(24, 1, 'agen satu', 'agen1@mail.com', NULL, '$2y$10$l7QD87rQVa.HqVAsqM7Vbeu8W.RX14ooVFeE3w8r3hj2wOs/L6Fae', 'agen', 'Perempuan', 'jogja', '098765432123', 'UPfA0LDBgKhVAy9tDUm8RMjiDgpuwTPInrnbgxi7h9VtPLQSkCJ5Z9LRbIeE', '2020-03-01 22:15:47', '2020-03-02 01:35:47'),
(25, 1, 'agen dua', 'agen2@mail.com', NULL, '$2y$10$vSTCdNN1y2hqS5v.u0G7Ne40klWyxr/Rvd9C7DRC6QJ7yoJTVfhmm', 'agen', 'Laki-laki', 'Sleman', '098765432122', NULL, '2020-03-01 22:30:45', '2020-03-01 22:30:45'),
(31, 25, 'konsumen satu', 'konsumen1@mail.com', NULL, '$2y$10$NwULXldi6pxXco9FFfIH0.vjjNAdy5nmhSE74X7S77x5Iq5WFuckm', 'konsumen', 'Perempuan', 'Bantul', '098765432124', NULL, '2020-03-02 01:00:47', '2020-03-02 01:16:46'),
(32, 25, 'konsumen dua', 'konsumen2@mail.com', NULL, '$2y$10$hANxH15DTtBlAPZjEvo6sOHbPnhhwsZogvBEfcZ1RT1yLadUQo98G', 'konsumen', 'Perempuan', 'Bantul', '098765432121', NULL, '2020-03-02 01:19:16', '2020-03-02 01:19:33'),
(33, 24, 'konsumen tiga', 'konsumen3@mail.com', NULL, '$2y$10$3/SgH5ER2XD0sO8D5GkQpehTc8AGlpo3MsF9hgiKAjpqLVgl20o8q', 'konsumen', 'Perempuan', 'Bantul', '098765432122', NULL, '2020-03-02 22:39:33', '2020-03-02 22:39:33'),
(36, 24, 'sales satu satu', 'sales1.1@mail.com', NULL, '$2y$10$rditOuxisd.7yW3Y05RqcuoXy9VwbSQhUR6TBZ7jqPp66hy37NqQ.', 'sales', 'Laki-laki', 'Wonosari', '098765432121', NULL, '2020-03-04 07:08:46', '2020-03-04 07:08:46'),
(38, 25, 'sales dua dua', 'sales2.2@mail.com', NULL, '$2y$10$izusQS71nRY2tLx5K7mlIu0BFuWFM/PoORHdnmLXGdXFTFVnF6BgS', 'sales', 'Laki-laki', 'Sleman', '098765432124', NULL, '2020-03-04 07:16:41', '2020-03-04 07:16:41');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `konsumen` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO `konsumen`(`id`, `user_id`, `created_at`, `updated_at`) VALUES (NEW.id,NEW.id,'','')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kons` (`user_id`);

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
-- Indexes for table `tabung`
--
ALTER TABLE `tabung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabung` (`tabung_id`),
  ADD KEY `kons_beli` (`kons_id`),
  ADD KEY `user_jual` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabung`
--
ALTER TABLE `tabung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD CONSTRAINT `kons` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `kons_beli` FOREIGN KEY (`kons_id`) REFERENCES `konsumen` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tabung` FOREIGN KEY (`tabung_id`) REFERENCES `tabung` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_jual` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
