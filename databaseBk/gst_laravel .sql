-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 07:57 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gst_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_debit_details`
--

CREATE TABLE `credit_debit_details` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `item_discription` text,
  `is_credit` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_debit_details`
--

INSERT INTO `credit_debit_details` (`id`, `user_id`, `item`, `item_discription`, `is_credit`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'card', 'bodyupdated', 1, 102, '2019-01-22 12:16:50', '2019-01-22 12:16:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(6) NOT NULL,
  `customer_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_contact_number` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_alt_number` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_gstin` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_contact_number`, `customer_alt_number`, `customer_email`, `customer_address`, `customer_gstin`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ashutosh Kumar Choubey', '9658476170', NULL, 'ashutoshkumarchoubey@gmail.com', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'DHFJ%^&*(', 1, 1, '2019-02-02 00:05:17', '2019-02-02 00:05:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` int(100) NOT NULL,
  `menu_id` int(100) DEFAULT NULL,
  `title_name` varchar(200) DEFAULT NULL,
  `heading` varchar(200) DEFAULT NULL,
  `discription` text,
  `documentation` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `header_links`
--

CREATE TABLE `header_links` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(100) DEFAULT NULL,
  `link_title` varchar(100) DEFAULT NULL,
  `link_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `item` varchar(100) DEFAULT NULL,
  `item_discription` text NOT NULL,
  `quantity` int(100) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `parent_id` int(5) DEFAULT '0',
  `sort` int(1) DEFAULT '0',
  `has_submenu` smallint(1) DEFAULT '0',
  `role_id` varchar(255) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modals`
--

CREATE TABLE `modals` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `product_name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_model` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_brand` int(11) DEFAULT NULL,
  `product_color` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_hsn` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` float(90,2) DEFAULT NULL,
  `product_igst` float(90,2) DEFAULT NULL,
  `product_cgst` float(90,2) DEFAULT NULL,
  `product_sgst` float(90,2) DEFAULT NULL,
  `product_gst` float(90,2) DEFAULT NULL,
  `product_price_without_gst` float(100,2) DEFAULT NULL,
  `product_salling_price` float(90,2) DEFAULT NULL,
  `stock_in` float(100,2) DEFAULT NULL,
  `stock_out` int(100) DEFAULT NULL,
  `available_stock` float(100,2) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `product_discription` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `product_type`, `product_model`, `product_brand`, `product_color`, `product_code`, `product_hsn`, `product_unit`, `product_price`, `product_igst`, `product_cgst`, `product_sgst`, `product_gst`, `product_price_without_gst`, `product_salling_price`, `stock_in`, `stock_out`, `available_stock`, `created_by`, `product_discription`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'bike', '2', '1', 1, '2', 'dert1234', '46789123', '2', 124000.00, 8.00, 8.00, 8.00, 24.00, 100000.00, 120000.00, 23.00, NULL, 23.00, 1, 'this is new item in stock', 1, '2019-01-22 12:37:30', '2019-01-22 12:49:31', NULL),
(2, 1, 'birla product', '3', '4', 2, '3', 'v5454', '3455gx', '3', 120.00, 5.00, 5.00, 10.00, 20.00, 100.00, 120.00, 20.00, NULL, 20.00, 1, 'birla ka packet', 1, '2019-01-22 12:39:42', '2019-01-22 12:43:27', NULL),
(3, 1, 'dfgdxf bhd fh', '2', '3', 1, '1', 'dfgd', 'dfgdfxbg45645', '1', 4345.00, 34.00, 3.00, 4.00, 41.00, 3081.56, 3534534.00, NULL, NULL, NULL, 1, 'dfgdf', 1, '2019-02-02 00:07:52', '2019-02-02 00:07:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` int(6) NOT NULL,
  `brand_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `brand_name`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tata', 1, 1, '2019-01-22 12:28:30', '2019-01-22 12:28:30', NULL),
(2, 'birla', 1, 1, '2019-01-22 12:29:58', '2019-01-22 12:29:58', NULL),
(3, 'phoenix', 1, 1, '2019-01-22 12:30:07', '2019-01-22 12:30:07', NULL),
(4, 'reliance', 1, 1, '2019-01-22 12:30:31', '2019-01-22 12:30:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(6) NOT NULL,
  `color_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_code` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `color_name`, `color_code`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'red', '123', 1, 1, '2019-01-22 12:22:51', '2019-01-22 12:22:51', NULL),
(2, 'green', '852', 1, 1, '2019-01-22 12:23:05', '2019-01-22 12:23:05', NULL),
(3, 'blue', '147', 1, 1, '2019-01-22 12:23:16', '2019-01-22 12:23:16', NULL),
(4, 'yello', '456', 1, 1, '2019-01-22 12:23:30', '2019-01-22 12:23:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_models`
--

CREATE TABLE `product_models` (
  `id` int(6) NOT NULL,
  `brand_id` int(100) DEFAULT NULL,
  `model_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_number` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_models`
--

INSERT INTO `product_models` (`id`, `brand_id`, `model_name`, `model_number`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'honda', '123', 1, 1, '2019-01-22 12:30:51', '2019-01-22 12:30:51', NULL),
(2, 1, 'motor', '999', 1, 1, '2019-01-22 12:31:13', '2019-01-22 12:31:13', NULL),
(3, 1, 'kuch bhi', '879', 1, 1, '2019-01-22 12:32:11', '2019-01-22 12:32:11', NULL),
(4, 2, 'idea', '890', 1, 1, '2019-01-22 12:32:34', '2019-01-22 12:32:34', NULL),
(5, 2, 'birla model', '456', 1, 1, '2019-01-22 12:32:59', '2019-01-22 12:32:59', NULL),
(6, 3, 'software', '4546789', 1, 1, '2019-01-22 12:33:20', '2019-01-22 12:33:20', NULL),
(7, 4, 'petrol', '3243567', 1, 1, '2019-01-22 12:33:36', '2019-01-22 12:33:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` int(6) NOT NULL,
  `type_name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `type_name`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mobile', 1, 1, '2019-01-22 12:25:06', '2019-01-22 12:25:58', NULL),
(2, 'machinary', 1, 1, '2019-01-22 12:25:15', '2019-01-22 12:26:17', NULL),
(3, 'tea stall', 1, 1, '2019-01-22 12:25:32', '2019-01-22 12:27:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_units`
--

CREATE TABLE `product_units` (
  `id` int(6) NOT NULL,
  `unit_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_units`
--

INSERT INTO `product_units` (`id`, `unit_name`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kg', 1, 1, '2019-01-22 12:27:29', '2019-01-22 12:27:29', NULL),
(2, 'pic', 1, 1, '2019-01-22 12:27:39', '2019-01-22 12:27:39', NULL),
(3, 'litter', 1, 1, '2019-01-22 12:27:58', '2019-01-22 12:27:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_invoice_id` int(100) NOT NULL,
  `supplier_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_mob_num` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_address` text COLLATE utf8mb4_unicode_ci,
  `supplier_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_invoice_number` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_invoice_date` date DEFAULT NULL,
  `purchase_invoice_amount` double(10,2) DEFAULT NULL,
  `purchase_tax_amount` double(10,2) DEFAULT NULL,
  `purchase_discription` text COLLATE utf8mb4_unicode_ci,
  `payment_type` int(155) DEFAULT NULL COMMENT '1=>By Cash,2=>By Internate Banking,3=>By Cheque',
  `product_name` int(11) DEFAULT NULL,
  `product_code` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` int(100) DEFAULT NULL,
  `product_model` int(100) DEFAULT NULL,
  `product_brand` int(100) DEFAULT NULL,
  `product_type` int(100) DEFAULT NULL,
  `product_discription` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_hsn` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_gst` double(10,2) DEFAULT NULL,
  `product_sgst` double(10,2) DEFAULT NULL,
  `product_cgst` double(10,2) DEFAULT NULL,
  `product_igst` double(10,2) DEFAULT NULL,
  `product_quantity` double(10,2) DEFAULT NULL,
  `product_unit` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_salling_price` float(100,4) DEFAULT NULL,
  `product_price_withoutgst` float(100,4) DEFAULT NULL,
  `product_price_withgst` double(10,4) DEFAULT NULL,
  `product_total_amount` double(10,2) DEFAULT NULL,
  `product_tax_amount` double(10,2) DEFAULT NULL,
  `product_total_tax_amount` float(100,3) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `purchase_invoice_id`, `supplier_name`, `supplier_mob_num`, `supplier_address`, `supplier_email`, `purchase_invoice_number`, `purchase_invoice_date`, `purchase_invoice_amount`, `purchase_tax_amount`, `purchase_discription`, `payment_type`, `product_name`, `product_code`, `product_color`, `product_model`, `product_brand`, `product_type`, `product_discription`, `product_hsn`, `product_gst`, `product_sgst`, `product_cgst`, `product_igst`, `product_quantity`, `product_unit`, `product_salling_price`, `product_price_withoutgst`, `product_price_withgst`, `product_total_amount`, `product_tax_amount`, `product_total_tax_amount`, `created_by`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'ashutosh kumar choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'ashutoshkumarchoubey@gmail.com', '456dfg', '2019-01-17', 200000.00, NULL, 'dfvdfdf', 2, 1, 'dert1234', 2, 1, 1, 2, 'this is new item in stock', '46789123', 24.00, 8.00, 8.00, 8.00, 10.00, '2', 120000.0000, 100000.0000, 124000.0000, 1240000.00, 24000.00, 240000.000, 1, 1, '2019-01-22 12:43:27', '2019-01-22 12:43:27', NULL),
(2, 1, 2, 'ashutosh kumar choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'ashutoshkumarchoubey@gmail.com', '456dfg', '2019-01-17', 200000.00, NULL, 'dfvdfdf', 2, 2, 'v5454', 3, 4, 2, 3, 'birla ka packet', '3455gx', 20.00, 10.00, 5.00, 5.00, 20.00, '3', 120.0000, 100.0000, 120.0000, 2400.00, 20.00, 400.000, 1, 1, '2019-01-22 12:43:27', '2019-01-22 12:43:27', NULL),
(3, 1, 3, 'ashutosh kumar choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'ashutoshkumarchoubey@gmail.com', '34534543', '2019-01-15', 454644.00, NULL, 'dfgdfg', 3, 1, 'dert1234', 2, 1, 1, 2, 'this is new item in stock', '46789123', 24.00, 8.00, 8.00, 8.00, 3.00, '2', 120000.0000, 100000.0000, 124000.0000, 372000.00, 24000.00, 72000.000, 1, 1, '2019-01-22 12:49:31', '2019-01-22 12:49:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `id` int(155) NOT NULL,
  `supplier_id` int(155) NOT NULL,
  `purchase_invoice_number` varchar(155) NOT NULL,
  `purchase_invoice_date` date DEFAULT NULL,
  `purchase_invoice_amount` float(155,4) DEFAULT NULL COMMENT 'original amount',
  `purchase_discription` text,
  `payment_type` int(11) DEFAULT NULL,
  `total_purchase_amount` float(155,4) DEFAULT NULL COMMENT 'our calculation for alll product',
  `purchase_due_amount` float(155,4) DEFAULT NULL COMMENT 'remaing amount for supplier for this purchase invoice',
  `satus` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(155) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_invoices`
--

INSERT INTO `purchase_invoices` (`id`, `supplier_id`, `purchase_invoice_number`, `purchase_invoice_date`, `purchase_invoice_amount`, `purchase_discription`, `payment_type`, `total_purchase_amount`, `purchase_due_amount`, `satus`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, '456dfg', '2019-01-17', 200000.0000, 'dfvdfdf', 2, 1242400.0000, 100000.0000, 1, 1, '2019-01-22 12:43:26', '2019-01-22 12:43:26', NULL),
(3, 1, '34534543', '2019-01-15', 454644.0000, 'dfgdfg', 3, 372000.0000, 56575.0000, 1, 1, '2019-01-22 12:49:31', '2019-01-22 12:49:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(6) NOT NULL,
  `role_name` varchar(191) DEFAULT NULL,
  `role_code` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_code`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'SUP', 1, '2019-01-01 16:01:58', '0000-00-00 00:00:00', NULL),
(2, 'marketing', 'MKT', 1, '2019-01-01 16:01:54', '0000-00-00 00:00:00', NULL),
(4, 'Pubic', 'PLC', 1, '2019-01-02 02:09:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob_num` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_supplier_balance` float(100,2) DEFAULT NULL,
  `total_supplier_credit` float(100,2) DEFAULT NULL,
  `total_supplier_debit` float(100,2) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gstin` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `supplier_name`, `mob_num`, `address`, `email`, `total_supplier_balance`, `total_supplier_credit`, `total_supplier_debit`, `email_verified_at`, `gstin`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'ashutosh kumar choubey', '9658476170', 'ashutoshkumarchoubey@gmail,com\r\nplot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'ashutoshkumarchoubey@gmail.com', -2854400.00, NULL, 2854400.00, NULL, '34ccdfb', 1, NULL, '2019-01-22 12:34:28', '2019-01-22 12:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_debit_logs`
--

CREATE TABLE `supplier_debit_logs` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `supplier_id` int(100) NOT NULL,
  `purchase_id` int(100) DEFAULT NULL,
  `debit_amount` float(100,2) DEFAULT NULL,
  `total_amount` float(100,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_debit_logs`
--

INSERT INTO `supplier_debit_logs` (`id`, `user_id`, `supplier_id`, `purchase_id`, `debit_amount`, `total_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1240000.00, NULL, '2019-01-22 12:43:27', '2019-01-22 12:43:27', NULL),
(2, 1, 1, 2, 2400.00, NULL, '2019-01-22 12:43:27', '2019-01-22 12:43:27', NULL),
(3, 1, 1, 3, 372000.00, NULL, '2019-01-22 12:49:31', '2019-01-22 12:49:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_logs`
--

CREATE TABLE `supplier_payment_logs` (
  `id` int(155) NOT NULL,
  `user_id` int(155) DEFAULT NULL,
  `supplier_id` int(155) DEFAULT NULL,
  `credit_amount` float(100,4) DEFAULT NULL,
  `payment_type` varchar(155) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hint` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `avatar` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `password_hint`, `remember_token`, `role_id`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Ashutosh Kumar Choubey', 'admin@admin.com', NULL, '$2y$10$IDRlMIiXorKrci4p0poPPOxducGKbdLV/gExYtbjb6QtsuytjOXMW', '111111', 'L8FEYAIm4wLwrWFE8GrMqxlOYNF2JUntcGcMEVAKx7vRgo4MGnYm9pWG6UDN', 1, NULL, '2018-12-29 08:16:09', '2019-01-08 23:27:54'),
(2, 'Sai Auto Care', 'saiautocare18@gmail.com', NULL, '$2y$10$9ZwtUlXD.yJInd17D/GMCeo5/zCqjtBjXK4wIxJcZEjZLiGyvEOFS', NULL, NULL, 1, NULL, '2018-12-24 08:19:51', '2018-12-24 08:19:51'),
(16, 'Marketing', 'marketing@marketing.com', NULL, '$2y$10$Sn/tpLjRgWFoI5XvydQ83.gxmkkt1v/sV.bxk9i3jXZBWleMNrS.2', 'marketing', NULL, 2, NULL, '2019-01-08 22:32:33', '2019-01-08 22:32:33'),
(17, 'Hemanta parida', 'hemantaparida@gmail.com', NULL, '$2y$10$7yi1BPyRSihrhX8D/ssnwerkIKVoe6LsD0xGxvY7sUo83cD6916zW', NULL, '9H2PJ1bXKGscHs3rFCzesrbxzRHQKHGapZvN0QDDsv5OLVvPYSbNyW23R04A', 2, NULL, '2019-01-09 20:02:02', '2019-01-09 20:02:02'),
(18, 'susanta panda', 'susantapanda@gmail.com', NULL, '$2y$10$Z0Nt2Xaqeg7TYU2QiqEVfuqucG7ZiRGBfQfsM4g0xcyVUFkJQHJdm', NULL, 'kdqDRHC3AoWz71IxhvPqmGZyfyfOAIuqG2h5p2Xiw8SG8bpdr1GbaVkkFLFl', 2, NULL, '2019-01-09 20:07:15', '2019-01-09 20:18:15'),
(19, 'aaaaaaaaaaa', 'aaaaa@gmail.com', NULL, '$2y$10$mXOoD2Q8ZZrf2l2cNcPRNu75zTVrwQ16pUdCwarrazUxbdZbin1B6', 'aaaaa', NULL, 4, NULL, '2019-01-11 13:53:22', '2019-01-11 19:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) NOT NULL,
  `users_id` int(10) DEFAULT NULL,
  `employee_gender` varchar(1000) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(200) DEFAULT NULL,
  `specimen_of_full_signature` varchar(255) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `users_id`, `employee_gender`, `Address`, `office_address`, `mobile_number`, `bank_account_name`, `bank_account_no`, `bank_ifsc_code`, `specimen_of_full_signature`, `department_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1, 'male', 'plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', 'plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', '9658476170', NULL, NULL, NULL, NULL, 'administrative', '2019-01-08 16:27:54', '2019-01-08 16:27:54', NULL),
(12, 17, 'male', 'bhubaneswar', NULL, '7683855014', NULL, NULL, NULL, NULL, 'administrative', '2019-01-09 13:02:02', '2019-01-09 13:02:02', NULL),
(13, 18, 'male', NULL, NULL, '7978262599', NULL, NULL, NULL, NULL, 'other', '2019-01-09 13:07:15', '2019-01-09 13:18:15', NULL),
(14, 19, 'male', 'ashutoshkumarchoubey@gmail,com', 'plot No-GA,430 Chandrasekharpur, Axis Bank ATM, Sailashree Vihar', '9658476170', 'Ashutosh Kumar Choubey', '5555', '5555', NULL, 'other', '2019-01-11 19:23:22', '2019-01-12 00:33:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_debit_details`
--
ALTER TABLE `credit_debit_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_links`
--
ALTER TABLE `header_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modals`
--
ALTER TABLE `modals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_name` (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_models`
--
ALTER TABLE `product_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_units`
--
ALTER TABLE `product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_debit_logs`
--
ALTER TABLE `supplier_debit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment_logs`
--
ALTER TABLE `supplier_payment_logs`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_debit_details`
--
ALTER TABLE `credit_debit_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_links`
--
ALTER TABLE `header_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modals`
--
ALTER TABLE `modals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_models`
--
ALTER TABLE `product_models`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_units`
--
ALTER TABLE `product_units`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_debit_logs`
--
ALTER TABLE `supplier_debit_logs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_payment_logs`
--
ALTER TABLE `supplier_payment_logs`
  MODIFY `id` int(155) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
