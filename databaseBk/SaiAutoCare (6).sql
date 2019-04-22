-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2018 at 12:57 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.1.22-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SaiAutoCare`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_01_121108_add_workshop_dettail', 2),
(4, '2018_12_04_113018_supplier_datail', 3),
(5, '2018_12_05_113313_purchase_datail', 4),
(6, '2018_12_05_113358_product_datail', 4),
(7, '2018_12_10_061055_submited_part_detail', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` double(10,2) DEFAULT NULL,
  `gst` double(10,2) DEFAULT NULL,
  `stock_in` double(10,2) DEFAULT NULL,
  `stock_out` double(10,2) DEFAULT NULL,
  `stock_available` double(10,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `company_name`, `model_number`, `hsn`, `unit_price`, `gst`, `stock_in`, `stock_out`, `stock_available`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'rtghrt', 'dfhg', '3454', '435', 4354.00, 345.00, 3461.00, NULL, 3453.00, NULL, '2018-12-06 06:39:29', '2018-12-06 15:01:18'),
(4, 'fdyh', 'rsdgt', '56', '456', 54645.00, 656.00, 1006.00, NULL, 1001.00, NULL, '2018-12-06 13:45:51', '2018-12-06 15:01:18'),
(5, 'dfg', 'sdf', 'dsf', '435', 435.00, 345.00, 581.00, NULL, 578.00, NULL, '2018-12-06 13:51:54', '2018-12-06 14:59:14'),
(6, 'dfg', 'sdf', 'dsf', '435', 435.00, 345.00, 550.00, NULL, 546.00, NULL, '2018-12-06 14:12:45', '2018-12-06 15:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_num` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hsn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` double(10,2) DEFAULT NULL,
  `quantity` double(10,2) DEFAULT NULL,
  `gst` double(10,2) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_name`, `bill_num`, `bill_date`, `product_id`, `company_name`, `model_number`, `hsn`, `unit_price`, `quantity`, `gst`, `discount`, `total_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, '6', '456', NULL, 5, '75', '7', '585', 85.00, 8.00, 58.00, 5.00, 578.00, NULL, '2018-12-06 01:33:00', '2018-12-07 00:16:17'),
(3, '6', '7877097', '2018-12-10', 87, '6786', '8765', '87687', 67.00, 86.00, 78.00, 456.00, 456.00, NULL, '2018-12-06 01:35:14', '2018-12-06 01:35:14'),
(4, '6', '7877097', '2018-12-10', 578, '578', '7', '58', 5.00, 875.00, 875.00, 785.00, 78.00, NULL, '2018-12-06 01:35:14', '2018-12-06 01:35:14'),
(5, '6', '7877097', '2018-12-10', 5, '87', '587', '5', 875.00, 87.00, 57.00, 85.00, 8.00, NULL, '2018-12-06 01:35:14', '2018-12-06 01:35:14'),
(6, '6', '7877097', '2018-12-10', 546, '578', '578', '8', 57.00, 578.00, 58.00, 5.00, 87.00, NULL, '2018-12-06 01:35:14', '2018-12-06 01:35:14'),
(7, '6', '7877097', '2018-12-10', 87, '6786', '8765', '87687', 67.00, 86.00, 78.00, 456.00, 456.00, NULL, '2018-12-06 01:47:25', '2018-12-06 01:47:25'),
(9, '4', '7877097', '2018-12-10', 1111, '87868763', '587', '5', 875.00, 87.00, 57.00, 1111.00, 8.00, '2018-12-06 05:27:13', '2018-12-06 01:47:25', '2018-12-06 05:27:13'),
(10, '6', '7877097', '2018-12-10', 546, '578', '578', '8', 57.00, 578.00, 58.00, 5.00, 87.00, '2018-12-06 05:27:19', '2018-12-06 01:47:26', '2018-12-06 05:27:19'),
(11, '6', '7877097', '2018-12-10', 87, '6786', '8765', '87687', 67.00, 86.00, 78.00, 456.00, 456.00, NULL, '2018-12-06 03:07:13', '2018-12-06 03:07:13'),
(12, '5', '777777777777', '2018-12-10', 578, '578', '7', '58', 5.00, 875.00, 875.00, 578.00, 78.00, NULL, '2018-12-06 03:07:13', '2018-12-06 05:32:02'),
(13, '6', '7877097', '2018-12-10', 5, '87', '587', '5', 875.00, 87.00, 57.00, 85.00, 8.00, NULL, '2018-12-06 03:07:13', '2018-12-06 03:07:13'),
(14, '6', '7877097', '2018-12-10', 546, '578', '578', '8', 57.00, 578.00, 58.00, 5.00, 87.00, NULL, '2018-12-06 03:07:13', '2018-12-06 03:07:13'),
(15, '6', '7877097', '2018-12-10', 87, '6786', '8765', '87687', 67.00, 86.00, 78.00, 456.00, 456.00, NULL, '2018-12-06 03:22:03', '2018-12-06 03:22:03'),
(16, '6', '7877097', '2018-12-10', 578, '578', '7', '58', 5.00, 875.00, 875.00, 785.00, 78.00, NULL, '2018-12-06 03:22:03', '2018-12-06 03:22:03'),
(17, '6', '7877097', '2018-12-10', 5, '87', '587', '5', 875.00, 87.00, 57.00, 85.00, 8.00, NULL, '2018-12-06 03:22:03', '2018-12-06 03:22:03'),
(18, '6', '7877097', '2018-12-10', 546, '578', '578', '8', 57.00, 578.00, 58.00, 5.00, 87.00, NULL, '2018-12-06 03:22:03', '2018-12-06 03:22:03'),
(19, '5', '56756', '2018-12-19', 3454, '35435', '4543', '5', 765476.00, 567.00, 567.00, 567.00, 67.00, NULL, '2018-12-06 05:29:42', '2018-12-06 05:29:42'),
(20, '5', '56756', '2018-12-19', 56756, '5678', '575', '78578', 5785.00, 78578.00, 578.00, 57.00, 85.00, NULL, '2018-12-06 05:29:43', '2018-12-06 05:29:43'),
(21, '5', '56756', '2018-12-19', 78, '57', '5', '785', 785.00, 78.00, 578.00, 5.00, 785.00, NULL, '2018-12-06 05:29:43', '2018-12-06 05:29:43'),
(22, '5', '56756', '2018-12-19', 5, '75', '8', '57', 58.00, 5.00, 78.00, 57.00, 85.00, NULL, '2018-12-06 05:29:43', '2018-12-06 05:29:43'),
(23, '5', '56756', '2018-12-19', 3454, '35435', '4543', '5', 765476.00, 567.00, 567.00, 567.00, 67.00, NULL, '2018-12-06 05:31:46', '2018-12-06 05:31:46'),
(24, '5', '56756', '2018-12-19', 56756, '5678', '575', '78578', 5785.00, 78578.00, 578.00, 57.00, 85.00, NULL, '2018-12-06 05:31:46', '2018-12-06 05:31:46'),
(25, '5', '56756', '2018-12-19', 78, '57', '5', '785', 785.00, 78.00, 578.00, 5.00, 785.00, NULL, '2018-12-06 05:31:46', '2018-12-06 05:31:46'),
(26, '5', '56756', '2018-12-19', 5, '75', '8', '57', 58.00, 5.00, 78.00, 57.00, 85.00, '2018-12-06 05:53:30', '2018-12-06 05:31:46', '2018-12-06 05:53:30'),
(27, '6', '567567', '2018-12-11', 2, '5644', '655', 't67', 57.00, 65765.00, 5.00, 78578.00, 5.00, NULL, '2018-12-06 07:01:18', '2018-12-06 07:01:18'),
(28, '5', '8888888888', '2018-12-11', 888888, 'yyyyyyyyyyyyh', '45', '45', 4554.00, 45.00, 45.00, 546.00, 4.00, NULL, '2018-12-06 07:01:18', '2018-12-06 07:01:53'),
(29, '6', '567567', '2018-12-11', 56, 'jkluh', '8', '7', 7.00, 7.00, 7.00, 7.00, 7.00, NULL, '2018-12-06 07:01:18', '2018-12-06 07:01:18'),
(30, '5', NULL, '2018-12-11', 4, '2435', NULL, '57', 5675.00, 67.00, 578.00, 6578.00, 578.00, NULL, '2018-12-06 14:59:14', '2018-12-06 14:59:14'),
(31, '5', NULL, '2018-12-11', 5, '578', '578', '578', 578.00, 578.00, 578.00, 578.00, 5785.00, NULL, '2018-12-06 14:59:14', '2018-12-06 14:59:14'),
(32, '5', NULL, '2018-12-11', 4, '578', '578', '578', 5785.00, 78.00, 578.00, 578.00, 587.00, NULL, '2018-12-06 14:59:15', '2018-12-06 14:59:15'),
(33, '4', '67', '2018-12-05', 4, 'fh', '657', '3', 355.00, 333.00, 33.00, 367.00, 367.00, NULL, '2018-12-06 15:01:18', '2018-12-06 15:01:18'),
(34, '4', '67', '2018-12-05', 4, 'fg', '567', '546', 6789.00, 456.00, 67.00, 546.00, 67.00, NULL, '2018-12-06 15:01:18', '2018-12-06 15:01:18'),
(35, '4', '67', '2018-12-05', 6, 'fg', '345', '68', 6.00, 546.00, 346.00, 657.00, 435.00, NULL, '2018-12-06 15:01:18', '2018-12-06 15:01:18'),
(36, '4', '67', '2018-12-05', 2, 'fg', '3678', '3345', 3789.00, 3453.00, 378.00, 4356.00, 7896.00, NULL, '2018-12-06 15:01:18', '2018-12-06 15:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `submiter_part_details`
--

CREATE TABLE `submiter_part_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `part_name` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob_num` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gstin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `mob_num`, `address`, `email`, `email_verified_at`, `gstin`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa', '456345', 'dfhdf', 'df@sdfhg.dfg', NULL, '654645', NULL, '2018-12-04 08:20:45', '2018-12-04 06:40:24', '2018-12-04 08:20:45'),
(4, 'aaaaaaaaaa', '45675', 'kkkkkkkkk', 'dfhjfg@dfh.dryt', NULL, '4564565678567', NULL, NULL, '2018-12-04 08:20:02', '2018-12-04 08:21:56'),
(5, 'bbbbbbbbbbbbb', NULL, 'cgfjmfgh', 'fdtjh@dfh.ruj', NULL, '56756', NULL, NULL, '2018-12-04 08:27:11', '2018-12-06 13:17:21'),
(6, 'wetger', '4567546', 'dfghdf', 'dfhgdf@sdfgh.dsg', NULL, '456', NULL, NULL, '2018-12-04 08:27:49', '2018-12-04 08:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin@admin.com', NULL, '$2y$10$KK.W.XV.H3fqpFpSuOjDIOw5dMfOv22kEMFMs3t5slYvb3jYctbZy', 'Hi5lquBPglL2yCciKCW4KPrzRuV89q1rERlsXmWYNIl6s1QnIxexU4os90uo', '2018-12-02 14:06:40', '2018-12-02 14:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_reg_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odometer_reading` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_in` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_out` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advisor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_price` float(10,2) DEFAULT NULL,
  `submited_part` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others_submited_part` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `name`, `reference`, `company`, `gst_no`, `mobile`, `landline`, `email`, `address`, `city`, `state`, `pin`, `vehicle_reg_number`, `model_year`, `company_name`, `model_number`, `vin`, `reg_number`, `odometer_reading`, `color`, `fuel_type`, `engine_number`, `key_number`, `due_in`, `due_out`, `status`, `advisor`, `notes`, `expected_price`, `submited_part`, `others_submited_part`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'bbbbbbbbbbbbbb', 'bbbbbbb', '56756', '45454', '456', '45645645', 'sdgsdf@sdg.sdfgdrf', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', 'w3456', '34634', 'drfgdr', '4356', '3456', NULL, '345', 'dfg', 'dfgh', '3456', '345', '2018-12-13', '2018-12-24', '435', '345', '345', NULL, NULL, NULL, '2018-12-03 06:28:14', '2018-12-01 05:08:39', '2018-12-02 06:28:14'),
(5, 'edrgyh', NULL, NULL, NULL, NULL, NULL, NULL, 'aaaa', NULL, 'ddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vgbn', NULL, NULL, NULL, NULL, NULL, '2018-12-03 06:36:56', '2018-12-04 08:24:03'),
(6, 'dtyujtyduj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:34:33', '2018-12-03 20:34:33'),
(7, 'tyjhktdk', 'dryuj', 'druyj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:34:40', '2018-12-03 20:34:40'),
(8, 'hrsyhsrdyhr', NULL, 'dh tyyyyd dy6ujdujdtyujtdyujdtyuj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:34:48', '2018-12-03 20:34:48'),
(9, 'srusru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:34:52', '2018-12-03 20:34:52'),
(10, '567ytgfbh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:34:57', '2018-12-03 20:34:57'),
(11, 'fgch6756rf', NULL, 'rtuyhrt', NULL, '45645645', NULL, NULL, 'dfjh', 'dfgh', 'odisha', '761008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:35:04', '2018-12-04 06:36:29'),
(12, 'fgmnjuyo78967', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:35:09', '2018-12-03 20:35:09'),
(13, 'i678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:35:18', '2018-12-03 20:35:18'),
(14, 'fgjhyf', NULL, 'fghnfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:35:48', '2018-12-03 20:35:48'),
(15, 'rftghrjh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:35:52', '2018-12-03 20:35:52'),
(16, 'rftujhrf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:35:57', '2018-12-03 20:35:57'),
(17, 'srtfhjur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-03 20:36:01', '2018-12-03 20:36:01'),
(18, 'cvbn', 'xcvnb', 'xcv', '546546', '456456', NULL, 'dfhsr@sdg.ghkjh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 05:11:12', '2018-12-04 05:11:12'),
(19, 'fgjfgj', 'gmkhj', 'hgk', '56756', '56756', '45654', 'gfmgj@dfh.sdg', 'dfjh', '456', 'dfgh', '4567456', 'dfgh456', '4567456', 'fgjh', 'fgh54', '67546546', '2018-12-13', 'fgh', 'rtyu', '54456', '456', '456546', '2018-12-18', '2018-12-12', 'fgjh', 'ftgh', 'fgh', NULL, NULL, NULL, NULL, '2018-12-04 08:23:48', '2018-12-04 08:23:48'),
(20, 'ashu', 'iiiiiiiiiii', 'jjjjjjjjjjjjjjjj', '57457', '457457457', '6567567', 'gcjmgf@dgjh.gh', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', '567567', '2013', 'kkkkkkkk', '56756', '657657', '2018-12-10', 'lllllllllllllll', 'gjk', 'ghkj', 'ghkj', '5678567', '2018-12-19', '2018-12-19', 'ghkgh', 'fghjk', 'mmmmmmmmmmmmmm', NULL, NULL, NULL, NULL, '2018-12-07 00:51:12', '2018-12-07 00:51:49'),
(21, 'ashu', 'drg', 'tyji', NULL, '6567567', NULL, 'gcjmgf@dgjh.gh', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-08 18:41:39', '2018-12-08 18:41:39'),
(22, 'hyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-08 20:07:30', '2018-12-08 20:07:30'),
(23, 'hyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-08 20:09:32', '2018-12-08 20:09:32'),
(24, 'hyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-08 20:10:04', '2018-12-08 20:10:04'),
(25, 'hyu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-08 20:11:46', '2018-12-08 20:11:46'),
(26, 'ew', 'wsegf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 345.00, 'Music System', 'drgt', NULL, '2018-12-09 12:43:26', '2018-12-09 12:43:26'),
(27, 'ew', 'wsegf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 345.00, 'Music System', 'drgt', NULL, '2018-12-09 12:48:10', '2018-12-09 12:48:10'),
(28, 'ew', 'wsegf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 345.00, 'Music System', 'drgt', NULL, '2018-12-09 12:48:40', '2018-12-09 12:48:40'),
(29, 'er54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-09 14:24:29', '2018-12-09 14:24:29'),
(30, 'er54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-09 14:26:06', '2018-12-09 14:26:06'),
(31, 'ertger', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-09 14:31:58', '2018-12-09 14:31:58'),
(32, 'ashutoshkumar choubey', 'subrat malik', 'phoenix', '3434', '9658476170', '9006179447', 'ashutoshkumarchoubey@gmail.com', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', '567567', '2013', 'tata', '67', '567', '2018-12-03', '78787', 'red', 'Disel', '567567', '5667', '2018-12-12', '2018-12-29', 'pending', 'ashu', 'under progress', 500000.00, 'Music System', 'tyre,nut.bolt,vehical', NULL, '2018-12-10 00:15:20', '2018-12-10 01:12:56'),
(33, 'dfgh', 'dfg', 'dfg', NULL, '6567567', NULL, 'gcjmgf@dgjh.gh', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Music System', NULL, NULL, '2018-12-10 01:24:46', '2018-12-10 01:24:46'),
(34, 'ashutoshkumar choubey', NULL, 'dfg', NULL, '6567567', NULL, 'gcjmgf@dgjh.gh', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 01:28:42', '2018-12-10 01:28:42'),
(35, 'ashutoshkumar choubey', NULL, 'phoenix', NULL, '9006179447', NULL, 'ashutoshkumarchoubey@gmail.com', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 01:29:41', '2018-12-10 01:29:41'),
(36, 'ashutoshkumar choubey', NULL, 'phoenix', NULL, '9006179447', NULL, 'ashutoshkumarchoubey@gmail.com', 'bhumikhal', 'bhubaneswar', 'odisha', '761008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-10 01:33:00', '2018-12-10 01:33:00');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submiter_part_details`
--
ALTER TABLE `submiter_part_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `submiter_part_details`
--
ALTER TABLE `submiter_part_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
