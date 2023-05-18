-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 02:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ABC Company', 'abc@example.com', '123-456-7890', '123 Main St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(2, 'XYZ Corporation', 'xyz@example.com', '555-123-4567', '789 Elm St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(3, 'Acme Co.', 'acme@example.com', '888-555-1212', '456 Oak St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(4, 'Smith & Co.', 'smithco@example.com', '555-987-6543', '321 Maple St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(5, 'Globe Enterprises', 'globe@example.com', '555-555-5555', '987 Pine St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(6, 'Baker Industries', 'baker@example.com', '555-555-1212', '555 Walnut St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(7, 'Jones Manufacturing', 'jonesco@example.com', '555-555-1212', '777 Cedar St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(8, 'Global Industries', 'global@example.com', '555-555-1212', '111 Market St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(9, 'Johnson & Co.', 'johnsonco@example.com', '555-555-1212', '222 Main St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(10, 'Simpson Ltd.', 'simpson@example.com', '555-555-1212', '444 Oak St, Anytown USA', '2023-04-29 21:20:26', '2023-04-29 21:20:26'),
(12, 'dasdsd', 'dfdfdfdfdfdf@dddf.com', '3343443', 'dfdfdfdfdfdfdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_jobs`
--

CREATE TABLE `email_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('queued','processing','sent','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'queued',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_jobs`
--

INSERT INTO `email_jobs` (`id`, `recipient_email`, `status`, `created_at`, `updated_at`) VALUES
(23, 'shubham972@yahoo.com', 'sent', NULL, '2023-05-18 06:20:24'),
(24, 'ff@mailinator.com', 'sent', NULL, '2023-05-18 06:19:58'),
(25, 'ff@mailinator.com', 'sent', NULL, '2023-05-18 06:19:58'),
(26, 'rr@mailinator.com', 'sent', NULL, '2023-05-18 06:20:03'),
(27, 'osp@gmail.com', 'sent', NULL, '2023-05-18 06:20:11'),
(28, 'osp@gmail.com', 'sent', NULL, '2023-05-18 06:20:11'),
(29, 'typ@mailinator.com', 'sent', NULL, '2023-05-18 06:20:15'),
(30, 'dd@mailinator.com', 'sent', NULL, '2023-05-18 06:20:19'),
(31, 'shubham972@yahoo.com', 'sent', NULL, '2023-05-18 06:20:24'),
(32, 'dsdsd@mailinator.com', 'sent', NULL, '2023-05-18 06:20:28'),
(33, 'knkn@mailinator.com', 'sent', NULL, '2023-05-18 06:20:33'),
(34, 'dfdf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:23'),
(35, 'mdm@mailinator.com', 'sent', NULL, '2023-05-18 06:21:01'),
(36, 'fkedmfdkf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:06'),
(37, 'dfdf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:23'),
(38, 'fff@mailinator.com', 'sent', NULL, '2023-05-18 06:21:15'),
(39, 'dfd@mailinator.com', 'sent', NULL, '2023-05-18 06:21:19'),
(40, 'dfdf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:23'),
(41, 'open@mailinator.com', 'sent', NULL, '2023-05-18 06:21:28'),
(42, 'fnjnj@mailinator.com', 'sent', NULL, '2023-05-18 06:21:33'),
(43, 'shubh@mailinator.com', 'sent', NULL, '2023-05-18 06:21:39'),
(44, 'plk@mailinator.com', 'sent', NULL, '2023-05-18 06:21:44'),
(45, 'shubham972@yahoo.com', 'sent', NULL, '2023-05-18 06:20:24'),
(46, 'ff@mailinator.com', 'sent', NULL, '2023-05-18 06:19:58'),
(47, 'ff@mailinator.com', 'sent', NULL, '2023-05-18 06:19:58'),
(48, 'rr@mailinator.com', 'sent', NULL, '2023-05-18 06:20:03'),
(49, 'osp@gmail.com', 'sent', NULL, '2023-05-18 06:20:11'),
(50, 'osp@gmail.com', 'sent', NULL, '2023-05-18 06:20:11'),
(51, 'typ@mailinator.com', 'sent', NULL, '2023-05-18 06:20:15'),
(52, 'dd@mailinator.com', 'sent', NULL, '2023-05-18 06:20:19'),
(53, 'shubham972@yahoo.com', 'sent', NULL, '2023-05-18 06:20:24'),
(54, 'dsdsd@mailinator.com', 'sent', NULL, '2023-05-18 06:20:28'),
(55, 'knkn@mailinator.com', 'sent', NULL, '2023-05-18 06:20:33'),
(56, 'dfdf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:23'),
(57, 'mdm@mailinator.com', 'sent', NULL, '2023-05-18 06:21:01'),
(58, 'fkedmfdkf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:06'),
(59, 'dfdf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:23'),
(60, 'fff@mailinator.com', 'sent', NULL, '2023-05-18 06:21:15'),
(61, 'dfd@mailinator.com', 'sent', NULL, '2023-05-18 06:21:19'),
(62, 'dfdf@mailinator.com', 'sent', NULL, '2023-05-18 06:21:23'),
(63, 'open@mailinator.com', 'sent', NULL, '2023-05-18 06:21:28'),
(64, 'fnjnj@mailinator.com', 'sent', NULL, '2023-05-18 06:21:33'),
(65, 'shubh@mailinator.com', 'sent', NULL, '2023-05-18 06:21:39'),
(66, 'plk@mailinator.com', 'sent', NULL, '2023-05-18 06:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `dob`, `address`, `created_at`, `updated_at`) VALUES
(1, 'John Dog', 'john.doe@ggexample.comg', '545455587', '1990-01-01', 'fdfgdfgfdg', '2023-04-29 10:12:23', '2023-05-01 00:22:46'),
(3, 'Bob Johnson', 'bob.johnson@example.com', '3456789012', '1985-03-03', '789 Elm St', '2023-04-29 10:12:23', '2023-04-29 10:12:23'),
(5, 'Mike Williams', 'mike.williams@example.com', '5678901234', '1991-05-05', '654 Pine Ave', '2023-04-29 10:12:23', '2023-04-29 10:12:23'),
(6, 'Emily Davis', 'emily.davis@example.com', '6789012345', '1988-06-06', '987 Cedar Rd', '2023-04-29 10:12:23', '2023-04-29 10:12:23'),
(7, 'David Brown', 'david.brown@example.com', '7890123456', '1993-07-07', '246 Oak Ave', '2023-04-29 10:12:23', '2023-04-29 10:12:23'),
(8, 'Jessica Wilson', 'jessica.wilson@example.com', '8901234567', '1994-08-08', '135 Main St', '2023-04-29 10:12:23', '2023-04-29 10:12:23'),
(9, 'Chris Taylor', 'chris.taylor@example.com', '9012345678', '1986-09-09', '864 Maple St', '2023-04-29 10:12:23', '2023-04-29 10:12:23'),
(10, 'Jennifer Green', 'jennifer.green@example.com', '0123456789', '1997-10-10', '753 Pine Ave', '2023-04-29 10:12:23', '2023-04-29 10:12:23'),
(11, 'dsdsd', 'shubham972@yaho.com', '32323233', '2023-04-11', 'fsfdf', '2023-04-29 09:36:18', '2023-04-29 09:36:18'),
(12, 'dddd', 'rrer@kfmkm.com', '43324324', '2023-04-12', 'wewfewfwef', '2023-04-29 13:57:21', '2023-04-29 13:57:21'),
(13, 'dd', 'ddd@fjfj.com', '343434', '2023-05-03', 'fdfdf', '2023-04-30 23:08:24', '2023-04-30 23:08:24'),
(14, 'Shubham', 'opopo@jvnjvnfj.com', '98848484', '2023-05-18', 'fndkndgkdnkn', '2023-05-01 00:20:13', '2023-05-01 00:20:13');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_29_094911_create_employees_table', 1),
(6, '2023_04_29_204414_create_companies_table', 2),
(7, '2023_04_29_231632_create_products_table', 3),
(8, '2023_05_16_195147_create_email_jobs_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `company_id` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `company_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', '10.99', 1, 100, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(2, 'Product 2', '15.99', 2, 50, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(3, 'Produjfjf', '20.90', 3, 200, '2023-04-29 23:30:09', '2023-04-30 03:40:25'),
(4, 'Product 4', '12.99', 4, 75, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(5, 'Product 5', '18.99', 5, 150, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(6, 'Product 6', '8.99', 6, 80, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(7, 'Product 7', '24.99', 7, 25, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(8, 'Product 8', '17.99', 8, 120, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(9, 'Product 9', '9.99', 9, 90, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(10, 'Product 10', '14.99', 10, 60, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(11, 'Product 11', '16.99', 1, 80, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(12, 'Product 12', '22.99', 2, 40, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(13, 'Product 13', '11.99', 3, 110, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(14, 'Product 14', '19.99', 4, 70, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(15, 'Product 15', '13.99', 5, 100, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(16, 'Product 16', '21.99', 6, 60, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(17, 'Product 17', '7.99', 7, 150, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(18, 'Product 18', '23.99', 8, 30, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(19, 'Product 19', '10.99', 9, 120, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(20, 'Product 20', '15.99', 10, 50, '2023-04-29 23:30:09', '2023-04-29 23:30:09'),
(22, 'fff', '44.00', 8, 555, '2023-04-29 19:07:23', '2023-04-29 19:07:23'),
(23, 'fdfdf', '44.00', 12, 55, '2023-04-30 04:42:58', '2023-04-30 04:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `remember_token`, `password`, `created_at`, `updated_at`, `profile_image`) VALUES
(1, 'Shubham', 's@mailinator.com', '87878787', 'kmdkdmks sdnsdjs dsjdnsjdnsd', NULL, '$2a$10$cNTGmZ/dGl/v/p8dCTQdHeU60ey35A/4okhG7ZThF/qrWovV7VezS', '2023-04-30 16:05:36', '2023-05-17 16:12:59', '1683884463r819312.png'),
(6, 'Shubh', 'shubham972@yahoo.com', NULL, 'Address Line 1, 870 City', NULL, '$2y$10$IH/V6eAjcb2JTWB.RJfuJOGdFnA87UbzskRFcLFvb6ktR6Af93/zy', '2023-04-30 19:04:27', '2023-05-17 01:43:34', NULL),
(7, 'Shubh', 'ff@mailinator.com', NULL, 'Address Line 1, 916 City', NULL, '$2y$10$/x5yomJdVQU9mgu5DGGp5uF/XdyWiU6q27KfOkEgGqm5rBAQZY./m', '2023-04-30 19:12:08', '2023-05-17 16:12:59', NULL),
(8, 'Shubh', 'ff@mailinator.com', NULL, 'Address Line 1, 970 City', NULL, '$2y$10$fwK4uIWKrfMgD3io2CM3lOaXhF7xj1zRkey.fVEd5Ui6u63s8/.62', '2023-04-30 19:12:58', '2023-05-17 16:12:59', NULL),
(9, 'Shubham Khanna', 'rr@mailinator.com', NULL, 'Address Line 1, 104 City', NULL, '$2y$10$WJAbV1tvWcyCPqGS/mwtb.aC/gSee1igfb28tpsltQp1oIrdEcQZW', '2023-04-30 19:14:51', '2023-05-17 16:12:59', NULL),
(10, 'Osanan', 'osp@gmail.com', NULL, 'Address Line 1, 609 City', NULL, '$2y$10$oWi3REYQ3Os9iAyOSRN3c.JtohFOQChmAc7vWWwhiP4Mlu3XZbLNm', '2023-04-30 19:20:48', '2023-05-17 01:43:34', NULL),
(11, 'Osanan', 'osp@gmail.com', NULL, 'Address Line 1, 736 City', NULL, '$2y$10$lQdKMN7TZazFC0IwBeQU6OK88pwmefq5sdl.qTiSXExuwAqzilb/G', '2023-04-30 19:21:14', '2023-05-17 16:13:20', NULL),
(12, 'Shubham Khanna', 'typ@mailinator.com', NULL, 'Address Line 1, 850 City', NULL, '$2y$10$gtAOt5GvbYryLVU9gqbk4OMl3LDW5sNhNuwjtpzr4wsc0cFjafHW.', '2023-04-30 19:22:17', '2023-05-17 16:12:59', NULL),
(13, 'fdfs44', 'dd@mailinator.com', NULL, 'Address Line 1, 44 City', NULL, '$2y$10$DY.f1ki4BhIdMQo7pfUqVuCFP4pFiuI3vbjfhNUQuMIDX84BnKTiS', '2023-04-30 19:25:29', '2023-05-17 16:12:59', NULL),
(14, 'ffdf', 'shubham972@yahoo.com', NULL, 'Address Line 1, 669 City', NULL, '$2y$10$DbRDhd0vBAMYAccI06y4qum.5OxbzsskchRIP45.fxWcHuz77ZJt6', '2023-04-30 19:45:14', '2023-05-17 16:13:25', NULL),
(15, 'Shubham Khanna', 'dsdsd@mailinator.com', NULL, 'Address Line 1, 213 City', NULL, '$2y$10$coeVDZxaqukz7wNISdbaxuzKke.81gADTDqwgmqjo/BIRK41phD6y', '2023-04-30 19:52:41', '2023-05-17 16:12:59', NULL),
(16, 'lkmkm', 'knkn@mailinator.com', NULL, 'Address Line 1, 59 City', NULL, '$2y$10$NnFNpPVCFfPJI3PRZdbuM.dJUnn.u.B9ay5JRsW.TO5MLuJ4GoJAC', '2023-04-30 20:00:31', '2023-05-17 16:12:59', NULL),
(17, 'Shubham Khanna', 'dfdf@mailinator.com', NULL, 'Address Line 1, 658 City', NULL, '$2y$10$AmHZhnHj/WyJZvhVAFrC7eqk1dynAB72/wTtxaEXAFMGnk.5Ec/.C', '2023-04-30 20:01:18', '2023-05-17 16:12:59', NULL),
(18, 'dkmsdk', 'mdm@mailinator.com', NULL, 'Address Line 1, 114 City', NULL, '$2y$10$12oRPa8OrhPV/rK0xEsn8Oo//7Rcedo2qdfTftbWEynCxEH2BPxfO', '2023-04-30 20:05:22', '2023-05-17 16:12:59', NULL),
(19, 'Shubham Khanna', 'fkedmfdkf@mailinator.com', NULL, 'Address Line 1, 595 City', NULL, '$2y$10$Z4E4te3x.O8wYfjbnua2LuU13n.s6sPTlMO3VIZbEYF.ikV52N7g.', '2023-04-30 20:06:36', '2023-05-17 16:12:59', NULL),
(20, 'lflflf', 'dfdf@mailinator.com', NULL, 'Address Line 1, 632 City', NULL, '$2y$10$zxVlJyMQziJzlfi/ZCZdJeAzoCZSL1aEecEXDcATOJHqV2gyaVism', '2023-04-30 20:14:55', '2023-05-17 16:12:59', NULL),
(21, 'Shubham Khanna', 'fff@mailinator.com', NULL, 'Address Line 1, 376 City', NULL, '$2y$10$.ZlOqbYxX2wAZaM9dq7OEODzIEiUg1j.4uNfs2/XPDsFKeYFuTDBi', '2023-04-30 20:20:58', '2023-05-17 16:12:59', NULL),
(22, 'fdfdf', 'dfd@mailinator.com', NULL, 'Address Line 1, 985 City', NULL, '$2y$10$dmDLI/TYErzZtBy2qRmhhuCa/WASFZa4mD.LJzTJWogsRJk6Nh2tO', '2023-04-30 20:25:39', '2023-05-17 16:12:59', NULL),
(23, 'dffd', 'dfdf@mailinator.com', NULL, 'Address Line 1, 797 City', NULL, '$2y$10$IVg0rNehffA2U9j5QEeTOedDRDSSZPw/jnkFEwb6aCktQJPvwaT1m', '2023-04-30 20:31:32', '2023-05-17 16:12:59', NULL),
(24, 'fdfdf', 'open@mailinator.com', NULL, 'Address Line 1, 32 City', NULL, '$2y$10$fa6gzOnQPIyLpkJJ548NIeCpFS4UUOqhLOB83CsFR9DBvE4FNvLjK', '2023-05-01 07:37:05', '2023-05-17 16:12:59', NULL),
(25, 'l,lm', 'fnjnj@mailinator.com', NULL, 'Address Line 1, 769 City', NULL, '$2y$10$pjI.BJlHJ.m2b6E3PyqNyOshZQYZyoFHlDS6MbdQog3hAMy75y6VG', '2023-05-01 08:03:19', '2023-05-17 16:12:59', NULL),
(26, 'Shubh', 'shubh@mailinator.com', NULL, 'Address Line 1, 748 City', NULL, '$2y$10$QJB70PdW/SEUcufLZjsA6.GnQqBdvi.KnFfgE2lJqJhSMXs0lfIKO', '2023-05-01 11:03:33', '2023-05-17 16:12:59', NULL),
(27, 'Shubham Khanna', 'plk@mailinator.com', NULL, 'Address Line 1, 434 City', NULL, '$2y$10$X4QZYU4dRAwlO5NcdqTLoeFboqL7Fe9yWXYLGmRSBY/sDY83sWcse', '2023-05-12 09:39:00', '2023-05-17 16:12:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `email_jobs`
--
ALTER TABLE `email_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `email_jobs`
--
ALTER TABLE `email_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
