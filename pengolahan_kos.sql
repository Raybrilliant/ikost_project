-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 18, 2023 at 04:26 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengolahan_kos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `biaya_kamar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `tipe_kamar`, `nomor_kamar`, `biaya_kamar`, `created_at`, `updated_at`) VALUES
(1, 'Iqbal Syahrial', 'Standart', 101, 500000, '2022-12-04 10:21:59', '2022-12-04 10:21:59'),
(2, 'Raihan Fikri', 'Exclusive', 107, 700000, '2022-12-04 03:29:29', '2022-12-04 03:29:29'),
(3, 'Alfian Permana', 'Exclusive', 109, 700000, '2022-12-04 03:29:47', '2022-12-04 03:29:47');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_12_03_081744_create_customers_table', 1),
(3, '2022_12_03_104919_create_payments_table', 1),
(4, '2022_12_03_153906_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tagihan` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cust` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `jatuh_tempo`, `tagihan`, `status`, `id_cust`, `image`, `created_at`, `updated_at`) VALUES
(1, '2022-12-04', 700000.00, 'Lunas', 2, NULL, '2022-12-04 03:32:55', '2022-12-04 03:33:41'),
(2, '2022-12-04', 700000.00, 'Lunas', 3, NULL, '2022-12-04 03:33:02', '2022-12-04 03:33:19'),
(3, '2022-12-04', 700000.00, 'Lunas', 2, NULL, '2022-12-04 03:33:07', '2022-12-04 03:33:25'),
(4, '2022-12-04', 700000.00, 'Lunas', 3, 'bukti-pembayaran/LKc4X0aOoILyEkCmsOyWM9WLRDw3JGqBsBDW7T5T.png', '2022-12-04 03:33:11', '2022-12-04 04:02:59'),
(5, '2022-12-04', 700000.00, 'Lunas', 3, NULL, '2022-12-04 03:33:32', '2022-12-04 03:33:45'),
(6, '2022-12-04', 700000.00, 'Lunas', 2, 'bukti-pembayaran/uE3IGdNIf481NOS3mP08PLqGa2QaaNpALtSwOarQ.jpg', '2022-12-04 03:33:36', '2022-12-04 04:03:02'),
(7, '2022-12-08', 700000.00, 'Lunas', 3, 'bukti-pembayaran/5bwFW5K1hMQRiV5YIxdnzHQ7NT7bFhQcPRYlmvKk.jpg', '2022-12-08 05:58:15', '2022-12-08 06:04:58'),
(8, '2022-12-08', 700000.00, 'Lunas', 2, 'bukti-pembayaran/ioMlEhGaNlpcDdBc6HRYraDiXKFdZnw89s5D2g9s.jpg', '2022-12-08 05:58:21', '2022-12-08 06:08:21'),
(9, '2022-12-08', 700000.00, 'Belum Bayar', 3, NULL, '2022-12-08 06:06:13', '2022-12-08 06:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cust` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `id_cust`, `created_at`, `updated_at`) VALUES
(1, 'Iqbal', 'admin@gmail.com', '12345', 'admin', 1, '2022-12-04 10:22:48', '2022-12-04 10:22:48'),
(2, 'Raihan', 'raihan@gmail.com', '12345', 'user', 2, '2022-12-04 10:34:00', '2022-12-04 10:34:00'),
(3, 'Alfian', 'alfian@gmail.com', '12345', 'user', 3, '2022-12-04 10:34:00', '2022-12-04 10:34:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_id_cust_foreign` (`id_cust`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id_cust_foreign` (`id_cust`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_id_cust_foreign` FOREIGN KEY (`id_cust`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_cust_foreign` FOREIGN KEY (`id_cust`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
