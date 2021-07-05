-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 09:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productvalidation`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `product_id`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 1, '#ff4747', '2021-07-05 14:41:25', '2021-07-05 14:41:25'),
(2, 1, '#4229ff', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(3, 1, '#000000', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(4, 2, '#ff0f0f', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(5, 2, '#000000', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(6, 2, '#3dfffc', '2021-07-05 14:45:05', '2021-07-05 14:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `color_images`
--

CREATE TABLE `color_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_images`
--

INSERT INTO `color_images` (`id`, `color_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '162547088676.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(2, 1, '1625470886827.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(3, 1, '1625470886778.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(4, 2, '1625470886957.jpeg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(5, 2, '1625470886696.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(6, 2, '1625470886917.jpeg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(7, 2, '1625470886359.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(8, 3, '1625470886700.png', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(9, 3, '162547088621.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(10, 3, '1625470886723.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(11, 3, '1625470886392.jpg', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(12, 4, '1625471105322.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(13, 4, '162547110546.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(14, 4, '1625471105274.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(15, 4, '1625471105532.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(16, 5, '162547110546.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(17, 5, '1625471105782.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(18, 5, '1625471105219.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(19, 5, '1625471105798.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(20, 6, '1625471105538.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(21, 6, '1625471105721.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(22, 6, '1625471105508.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(23, 6, '162547110527.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(24, 6, '1625471105255.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(25, 6, '1625471105114.jpg', '2021-07-05 14:45:05', '2021-07-05 14:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_23_044219_create_products_table', 1),
(5, '2021_06_23_044435_create_colors_table', 1),
(6, '2021_06_23_044451_create_sizes_table', 1),
(7, '2021_06_29_141919_create_color_images_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Nike Shows For Sell in Bangladesh', NULL, '2021-07-05 14:41:25', '2021-07-05 14:41:25'),
(2, 'Vivo S1 Mobile for sell in Bangladesh. 32 GB and 64 GB', NULL, '2021-07-05 14:45:05', '2021-07-05 14:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `color_id`, `size`, `sku`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, '34', 'KBC-974624', '3000', '10', '2021-07-05 14:41:25', '2021-07-05 14:41:25'),
(2, 1, '35', 'KBC-864222', '3100', '15', '2021-07-05 14:41:25', '2021-07-05 14:41:25'),
(3, 1, '36', 'KBC-802567', '3200', NULL, '2021-07-05 14:41:25', '2021-07-05 14:41:25'),
(4, 2, '37', 'KBC-307406', '2500', '15', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(5, 2, '38', 'KBC-226907', '2600', '15', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(6, 2, '39', 'KBC-221437', '2800', '25', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(7, 2, '40', 'KBC-892970', '3000', '20', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(8, 3, '32', 'KBC-652743', '2000', '12', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(9, 3, '33', 'KBC-333269', '2100', '13', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(10, 3, '34', 'KBC-83175', '2200', '14', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(11, 3, '35', 'KBC-917091', '2300', '20', '2021-07-05 14:41:26', '2021-07-05 14:41:26'),
(12, 4, '64 GB', 'KBC-606872', '30000', '5', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(13, 4, '32 GB', 'KBC-366086', '28000', '5', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(14, 4, '16 GB', 'KBC-675612', '25000', '5', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(15, 5, '32 GB', 'KBC-299806', '25000', '10', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(16, 5, '64 GB', 'KBC-329896', '28000', '8', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(17, 5, '16 BG', 'KBC-938573', '25000', '5', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(18, 6, '256 GB', 'KBC-56767', '56000', '5', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(19, 6, '128 GB', 'KBC-58826', '48000', '10', '2021-07-05 14:45:05', '2021-07-05 14:45:05'),
(20, 6, '64 GB', 'KBC-424494', '36000', NULL, '2021-07-05 14:45:05', '2021-07-05 14:45:05');

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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_images`
--
ALTER TABLE `color_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_images_color_id_foreign` (`color_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_color_id_foreign` (`color_id`);

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
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color_images`
--
ALTER TABLE `color_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `color_images`
--
ALTER TABLE `color_images`
  ADD CONSTRAINT `color_images_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
