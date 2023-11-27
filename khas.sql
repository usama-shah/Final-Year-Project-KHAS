-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 07:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `photo`, `role`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Syed Mushahid', 'syedmk600@gmail.com', '03099779706', '$2y$10$28Q/nKCl4GOVUjMnvjtc4uNgSjiKLVAtUSRgrCQ5hdAJN3fx3YJVy', '/storage/profile_photos/1685339718.jpg', 'Admin', '2023-07-11 14:01:22', '2023-05-29 05:39:14', '2023-07-11 09:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2023-05-29 05:39:14', '2023-05-29 05:39:14'),
(2, 'Samsung', '2023-05-29 05:39:14', '2023-05-29 05:39:14'),
(3, 'Huawei', '2023-05-29 05:39:15', '2023-05-29 05:39:15'),
(4, 'Xiaomi', '2023-05-29 05:39:15', '2023-05-29 05:39:15'),
(5, 'OnePlus', '2023-05-29 05:39:15', '2023-05-29 05:39:15'),
(6, 'Sony', '2023-05-29 05:39:15', '2023-05-29 05:39:15'),
(7, 'LG', '2023-05-29 05:39:15', '2023-05-29 05:39:15'),
(8, 'Nokia', '2023-05-29 05:39:15', '2023-05-29 05:39:15'),
(9, 'Motorola', '2023-05-29 05:39:15', '2023-05-29 05:39:15'),
(10, 'Google', '2023-05-29 05:39:15', '2023-05-29 05:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `parent_id`, `created_at`, `updated_at`, `column_name`, `prefix`, `suffix`) VALUES
(1, 'Ram', NULL, NULL, '2023-05-29 05:54:25', '2023-05-29 05:54:25', 'ram', NULL, NULL),
(2, '1', NULL, 1, '2023-05-29 05:54:41', '2023-05-29 05:54:41', NULL, NULL, 'GB'),
(3, '2', NULL, 1, '2023-05-29 05:54:53', '2023-05-29 05:54:53', NULL, NULL, 'GB'),
(4, '3', NULL, 1, '2023-05-29 05:55:05', '2023-05-29 05:55:05', NULL, NULL, 'GB');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery` bigint(20) UNSIGNED NOT NULL,
  `inspection_fee` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `delivery`, `inspection_fee`) VALUES
(1, 200, 2);

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `phone_id`, `created_at`, `updated_at`) VALUES
(1, 102, 101, '2023-05-29 06:33:13', '2023-05-29 06:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE `inspection` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED NOT NULL,
  `inspected_by` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `storage_capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `original_packaging` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `purchase_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `warranty_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `battery_health` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `accessories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `reason_for_selling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `front_screen_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `back_cover_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `frame_edges_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `buttons_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `ports_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `touchscreen_functionality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `screen_damage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `water_damage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `battery_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `camera_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `audio_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `connectivity_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `sensor_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `software_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `imei` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `pta_approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `sim_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inspection`
--

INSERT INTO `inspection` (`id`, `phone_id`, `inspected_by`, `brand`, `model`, `price`, `color`, `storage_capacity`, `ram`, `original_packaging`, `condition`, `purchase_date`, `purchase_proof`, `warranty_status`, `operating_system`, `battery_health`, `accessories`, `reason_for_selling`, `front_screen_condition`, `back_cover_condition`, `frame_edges_condition`, `buttons_condition`, `ports_condition`, `touchscreen_functionality`, `screen_damage`, `water_damage`, `battery_issues`, `camera_issues`, `audio_issues`, `connectivity_issues`, `sensor_issues`, `software_issues`, `description`, `images`, `deleted_at`, `imei`, `pta_approved`, `sim_status`, `status`, `message`, `created_at`, `updated_at`) VALUES
(1, 101, 1, 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', '2023-05-29 07:08:22', '2023-05-29 07:08:22'),
(2, 4, 1, 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', '2023-05-29 07:18:46', '2023-05-29 07:18:46');

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
(5, '2023_04_11_102504_create_admins_table', 1),
(6, '2023_04_17_021505_modules', 1),
(7, '2023_04_18_173504_roles', 1),
(8, '2023_04_18_173602_permissions', 1),
(9, '2023_04_26_220038_category', 1),
(10, '2023_04_26_225902_brands', 1),
(11, '2023_04_30_182229_create_phones_table', 1),
(12, '2023_04_30_202822_add_deleted_at_column_to_phones_table', 1),
(13, '2023_05_04_003758_create_favorites_table', 1),
(14, '2023_05_07_142623_create_carts_table', 1),
(15, '2023_05_07_191809_purchases', 1),
(16, '2023_05_07_230627_phones_in_order', 1),
(17, '2023_05_08_015828_add_stripe_transaction_id_to_purchases_table', 1),
(18, '2023_05_16_162736_add_wallet_balance_in_user', 1),
(19, '2023_05_16_163729_transactions', 1),
(20, '2023_05_17_014251_create_payment_methods_table', 1),
(21, '2023_05_23_145705_payment_hold_column', 1),
(22, '2023_05_23_152812_order_data_in_transacrtions', 1),
(23, '2023_05_23_215647_add_table_comun_namein_categories', 1),
(24, '2023_05_23_221158_add_table_prefix_suffix_categories', 1),
(25, '2023_05_24_151136_add_delete_reason_column', 1),
(26, '2023_05_25_105543_inpection_table', 1),
(27, '2023_05_25_115059_add_pta_approved_in_phones', 1),
(28, '2023_05_25_121330_add_imie_in_phones', 1),
(29, '2023_05_25_172431_charges', 1),
(30, '2023_05_28_145830_returns', 1),
(31, '2023_05_28_160358_add_return_file_in_returns', 1),
(32, '2023_05_28_172342_return_completed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `user_id`, `bank_name`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 102, 'UBL', '77881212121213', '2023-05-29 06:45:42', '2023-05-29 06:45:42');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imei` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pta_approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `storage_capacity` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `camera` int(11) DEFAULT NULL,
  `original_packaging` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `operating_system` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_health` int(11) DEFAULT NULL,
  `accessories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`accessories`)),
  `reason_for_selling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_screen_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_cover_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frame_edges_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buttons_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ports_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `touchscreen_functionality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_damage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water_damage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connectivity_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sensor_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software_issues` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additional_images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `delete_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `user_id`, `title`, `brand`, `model`, `price`, `color`, `imei`, `sim_status`, `pta_approved`, `status`, `storage_capacity`, `ram`, `camera`, `original_packaging`, `condition`, `purchase_date`, `purchase_proof`, `warranty_status`, `expiration_date`, `operating_system`, `battery_health`, `accessories`, `reason_for_selling`, `front_screen_condition`, `back_cover_condition`, `frame_edges_condition`, `buttons_condition`, `ports_condition`, `touchscreen_functionality`, `screen_damage`, `water_damage`, `battery_issues`, `camera_issues`, `audio_issues`, `connectivity_issues`, `sensor_issues`, `software_issues`, `description`, `main_image`, `additional_images`, `created_at`, `updated_at`, `deleted_at`, `delete_reason`, `delete_message`) VALUES
(1, 101, 'Et iure exercitationem veniam.', 2, 'cumque commodi', 50611, 'olive', NULL, NULL, NULL, 'Sold', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Iste corporis quisquam nostrum tenetur. Doloribus qui molestiae omnis quis iste distinctio. Rerum soluta dolores est assumenda.', 'https://via.placeholder.com/640x480.png/00cc55?text=sapiente', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005544?text=nemo\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0099bb?text=iure\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088dd?text=placeat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002211?text=ut\"]', '2023-05-29 05:39:15', '2023-05-29 06:09:30', NULL, NULL, NULL),
(2, 101, 'Harum occaecati necessitatibus.', 4, 'eos magni', 98642, 'fuchsia', NULL, NULL, NULL, 'Available', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Expedita sed explicabo eum totam voluptatibus consequatur sapiente. Tempore culpa veniam est quia dignissimos.', 'https://via.placeholder.com/640x480.png/0000dd?text=rerum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001111?text=quia\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077cc?text=in\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003388?text=est\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022ee?text=quam\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(3, 101, 'Magni ipsum sit earum nesciunt iusto.', 6, 'illo non', 77215, 'lime', NULL, NULL, NULL, 'Available', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cumque earum a asperiores amet quia mollitia. Repellat iusto reprehenderit dolorem temporibus.', 'https://via.placeholder.com/640x480.png/0033aa?text=aut', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077ff?text=nihil\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008888?text=odio\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000ff?text=amet\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaff?text=aperiam\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(4, 101, 'Voluptatem assumenda architecto ea voluptas.', 5, 'numquam amet', 3875, 'navy', NULL, NULL, NULL, 'Sold', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Asperiores officia error praesentium et alias. Repudiandae consectetur ut et sed minima. Et pariatur ipsa amet placeat vel.', 'https://via.placeholder.com/640x480.png/004499?text=fuga', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeee?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077bb?text=sit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005511?text=eum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc88?text=corporis\"]', '2023-05-29 05:39:15', '2023-05-29 07:17:40', NULL, NULL, NULL),
(5, 101, 'Provident quibusdam consequuntur debitis sed.', 3, 'eius voluptates', 5608, 'blue', NULL, NULL, NULL, 'Available', 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Recusandae dolorem voluptates facilis sed. Maxime atque consequatur consectetur possimus. Exercitationem est eum sequi iusto.', 'https://via.placeholder.com/640x480.png/00ff11?text=dolores', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001133?text=minus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003300?text=iusto\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff99?text=ut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee55?text=quibusdam\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(6, 101, 'Nulla doloremque qui quidem in.', 2, 'voluptatem ea', 1010, 'teal', NULL, NULL, NULL, 'Available', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Omnis qui quasi labore porro est. Deleniti hic voluptas non nihil. Est autem ut consequatur explicabo ea maxime.', 'https://via.placeholder.com/640x480.png/0099ff?text=et', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004477?text=porro\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003388?text=itaque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008888?text=delectus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009966?text=qui\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(7, 101, 'Porro ut voluptatem et molestiae.', 1, 'vel qui', 37747, 'lime', NULL, NULL, NULL, 'Available', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quis qui est repellat quis pariatur. Et voluptatum omnis ut. Aut deserunt nesciunt et quidem.', 'https://via.placeholder.com/640x480.png/00bb33?text=omnis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007722?text=eos\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb88?text=vel\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee00?text=tenetur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006688?text=quas\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(8, 101, 'Qui sint quod dolores.', 8, 'consequatur quidem', 2856, 'green', NULL, NULL, NULL, 'Available', 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sed repellat reiciendis sed sequi omnis ut. Dolorem qui iste atque veniam.', 'https://via.placeholder.com/640x480.png/002222?text=provident', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005555?text=dolorum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066aa?text=placeat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ddcc?text=eos\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaff?text=hic\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(9, 101, 'Neque atque est.', 7, 'odit quidem', 1284, 'black', NULL, NULL, NULL, 'Available', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Blanditiis beatae rerum quam voluptatem tempore repellat ea. Enim neque id vero aut recusandae. Numquam sit dolores repellat quae qui suscipit harum et.', 'https://via.placeholder.com/640x480.png/009933?text=totam', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee55?text=eum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005577?text=consectetur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003377?text=suscipit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055bb?text=rerum\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(10, 101, 'Quisquam corporis corrupti.', 8, 'ut ea', 66362, 'olive', NULL, NULL, NULL, 'Available', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laboriosam ea aut enim minus. Quod suscipit fugit sunt temporibus provident.', 'https://via.placeholder.com/640x480.png/004422?text=minima', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002299?text=tenetur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffcc?text=eum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002266?text=eveniet\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005599?text=eos\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(11, 101, 'Velit minima voluptates nihil.', 6, 'molestiae blanditiis', 9588, 'purple', NULL, NULL, NULL, 'Available', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et voluptas ab eos. Suscipit quod molestiae nihil reprehenderit. Laboriosam et qui et pariatur aut.', 'https://via.placeholder.com/640x480.png/0066ff?text=in', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee55?text=autem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008855?text=provident\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aacc?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077ff?text=consectetur\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(12, 101, 'Magnam inventore et hic quidem vel.', 3, 'officia veniam', 2223, 'yellow', NULL, NULL, NULL, 'Available', 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aperiam esse eum illo odit. Expedita omnis commodi quia esse omnis. Nihil placeat molestiae deleniti eligendi laudantium dolore quo veritatis.', 'https://via.placeholder.com/640x480.png/002244?text=iusto', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003377?text=ex\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000011?text=esse\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000022?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbff?text=culpa\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(13, 101, 'Adipisci neque vitae quibusdam repellat.', 10, 'et quo', 8043, 'gray', NULL, NULL, NULL, 'Available', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nesciunt ut dolore qui dolorem. Non eaque laudantium similique inventore qui ipsa vitae. Consequuntur facilis voluptatem excepturi velit quaerat sunt dolores.', 'https://via.placeholder.com/640x480.png/00bb44?text=reiciendis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007788?text=totam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ddbb?text=dicta\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccbb?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dddd?text=maiores\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(14, 101, 'Non ullam sed labore.', 10, 'inventore quia', 71224, 'green', NULL, NULL, NULL, 'Available', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ut provident rerum aut fuga porro eos. Corrupti fugit nisi aut ut magni non laudantium. Reiciendis repudiandae quos eos deserunt ut aliquam.', 'https://via.placeholder.com/640x480.png/002222?text=est', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaff?text=ad\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa44?text=sed\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004455?text=eum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffee?text=et\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(15, 101, 'Et ut soluta omnis ut.', 9, 'dolor odit', 3332, 'aqua', NULL, NULL, NULL, 'Available', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laborum eius architecto accusantium eius itaque. Rerum reiciendis neque sit. Ipsa sit sint nihil voluptatem.', 'https://via.placeholder.com/640x480.png/003399?text=molestiae', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc44?text=eum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff66?text=natus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=dolorem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009933?text=blanditiis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(16, 101, 'Atque illo maiores.', 7, 'facilis nemo', 58108, 'white', NULL, NULL, NULL, 'Available', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Est repellendus odit consequuntur aut. Porro est et facilis ex laudantium asperiores. Blanditiis dolorum necessitatibus qui eligendi voluptatem dolorem sit voluptas.', 'https://via.placeholder.com/640x480.png/0077ee?text=est', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002211?text=accusantium\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbcc?text=maxime\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006633?text=odit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008833?text=eius\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(17, 101, 'Ut perferendis debitis omnis quod totam.', 5, 'alias praesentium', 7234, 'yellow', NULL, NULL, NULL, 'Available', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nihil perspiciatis pariatur aliquid. Nobis sunt sint provident. In quas accusamus laudantium modi nihil illum.', 'https://via.placeholder.com/640x480.png/00ee88?text=amet', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000088?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011ff?text=nam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009955?text=consequatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033bb?text=saepe\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(18, 101, 'Sunt iusto ipsam eligendi temporibus a.', 8, 'quod quasi', 62141, 'white', NULL, NULL, NULL, 'Available', 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Voluptatibus quo enim eveniet dicta. Quia molestiae eveniet reprehenderit velit.', 'https://via.placeholder.com/640x480.png/00dd99?text=aut', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaff?text=minus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003333?text=occaecati\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077aa?text=quisquam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022dd?text=ullam\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(19, 101, 'Commodi accusantium nemo libero.', 9, 'tenetur omnis', 41385, 'yellow', NULL, NULL, NULL, 'Available', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nulla aut et eum ut ut nemo ut quod. Atque ea ullam nemo nostrum qui esse. Provident accusamus veniam libero minus.', 'https://via.placeholder.com/640x480.png/005555?text=sint', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009977?text=eos\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb55?text=corrupti\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006666?text=reiciendis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb11?text=qui\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(20, 101, 'Perferendis ipsa delectus ea tempore.', 5, 'aut tempora', 57325, 'gray', NULL, NULL, NULL, 'Available', 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In labore optio reiciendis ab perspiciatis quae. Consequatur dicta aliquid suscipit excepturi fugiat et. Sunt vel quis ex quod rerum.', 'https://via.placeholder.com/640x480.png/000055?text=ut', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033dd?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055cc?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066dd?text=veritatis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007700?text=porro\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(21, 101, 'Quam id necessitatibus doloremque autem suscipit.', 10, 'modi nesciunt', 30310, 'silver', NULL, NULL, NULL, 'Available', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et quos et quos. Voluptatem quia esse qui necessitatibus earum. Harum ratione soluta dolore totam consequatur laudantium tempora.', 'https://via.placeholder.com/640x480.png/00dd99?text=accusantium', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa33?text=minus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002222?text=deserunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011dd?text=natus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004466?text=et\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(22, 101, 'Voluptas rem voluptatem odio libero.', 4, 'quae quia', 4576, 'purple', NULL, NULL, NULL, 'Available', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quod porro consequuntur perferendis eum expedita autem alias eaque. Neque ad sed sit consequuntur.', 'https://via.placeholder.com/640x480.png/0077ff?text=quasi', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd55?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccbb?text=provident\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbdd?text=molestias\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff99?text=vel\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(23, 101, 'Iusto quasi et dignissimos quo.', 6, 'dignissimos sed', 2129, 'white', NULL, NULL, NULL, 'Available', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dolorem aliquam commodi ducimus aut quisquam optio eos voluptatibus. Voluptatem nulla at provident occaecati quisquam. Quibusdam et voluptatem sit saepe animi dignissimos.', 'https://via.placeholder.com/640x480.png/0044ee?text=inventore', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff33?text=sunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002222?text=consequatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000011?text=iste\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008800?text=dolorem\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(24, 101, 'Autem iusto tempora enim at.', 3, 'ratione ipsum', 2098, 'gray', NULL, NULL, NULL, 'Available', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Necessitatibus suscipit facilis et dolorum voluptas. Molestiae non molestiae quasi. Nobis mollitia cupiditate aut numquam.', 'https://via.placeholder.com/640x480.png/002288?text=nam', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaff?text=fugiat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb00?text=aut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbaa?text=dolores\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000066?text=cupiditate\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(25, 101, 'Corporis et deleniti corrupti rerum.', 6, 'aut tenetur', 7667, 'aqua', NULL, NULL, NULL, 'Available', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sapiente excepturi ea aperiam vero sunt. Qui omnis asperiores aut exercitationem sunt id.', 'https://via.placeholder.com/640x480.png/0077ee?text=ipsum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033cc?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc55?text=voluptatem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=sunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb22?text=eos\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(26, 101, 'Aspernatur minima occaecati eos non velit.', 9, 'dolor ducimus', 52451, 'gray', NULL, NULL, NULL, 'Available', 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Qui quia ut corrupti et iusto quia nobis. Ipsa et fugiat nihil nostrum et omnis non. Illum minima accusamus sed modi incidunt.', 'https://via.placeholder.com/640x480.png/002299?text=et', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000ff?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0099aa?text=omnis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001100?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000bb?text=est\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(27, 101, 'Voluptas id praesentium.', 4, 'nostrum velit', 3296, 'green', NULL, NULL, NULL, 'Available', 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Impedit voluptatum odit rerum ut. Occaecati ut quidem illo porro laborum.', 'https://via.placeholder.com/640x480.png/00aa22?text=dolor', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007700?text=ipsa\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd33?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033aa?text=ullam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001188?text=voluptatem\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(28, 101, 'Tempora quo ex voluptatem natus.', 4, 'nihil eum', 799, 'fuchsia', NULL, NULL, NULL, 'Available', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Modi accusamus vitae saepe enim dolorem. Quia explicabo autem rerum veniam delectus et. Eveniet quidem nostrum aut.', 'https://via.placeholder.com/640x480.png/0044cc?text=sed', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc77?text=adipisci\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002288?text=totam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002211?text=aperiam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb00?text=in\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(29, 101, 'Aspernatur ex sunt.', 2, 'et ullam', 51171, 'gray', NULL, NULL, NULL, 'Available', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Unde quibusdam error numquam cum totam quis. Pariatur consectetur aspernatur atque. Quis in vero consequatur sapiente.', 'https://via.placeholder.com/640x480.png/003333?text=tempora', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ddee?text=quis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004444?text=iusto\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066aa?text=exercitationem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaaa?text=doloremque\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(30, 101, 'Voluptate aut corrupti doloremque.', 5, 'sunt alias', 37049, 'green', NULL, NULL, NULL, 'Available', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quasi rerum tenetur iure laborum molestias. Quidem rerum velit mollitia suscipit amet quam autem.', 'https://via.placeholder.com/640x480.png/00eeff?text=est', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088dd?text=dicta\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006633?text=accusamus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008822?text=impedit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011bb?text=minima\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(31, 101, 'Ipsa unde cum nihil facere.', 5, 'ullam nulla', 62324, 'maroon', NULL, NULL, NULL, 'Available', 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Soluta consequuntur culpa qui odit deserunt dolores rerum. Modi quasi beatae qui.', 'https://via.placeholder.com/640x480.png/00aaee?text=ut', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb77?text=ut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa99?text=non\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088ee?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008811?text=ad\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(32, 101, 'Ducimus accusantium magnam quos qui dolor.', 9, 'quaerat ut', 7501, 'purple', NULL, NULL, NULL, 'Available', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ea qui voluptas debitis alias quasi ut. Consequatur beatae itaque tempore architecto. A ipsa sed ad harum.', 'https://via.placeholder.com/640x480.png/00ee55?text=qui', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009977?text=harum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005566?text=vitae\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb77?text=recusandae\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000011?text=quia\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(33, 101, 'Et minima laboriosam magni quis.', 7, 'odit qui', 2407, 'green', NULL, NULL, NULL, 'Available', 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Temporibus atque ut at qui magnam. Tenetur consequatur qui saepe sit voluptate error veniam harum. Suscipit optio qui omnis at maiores necessitatibus facilis.', 'https://via.placeholder.com/640x480.png/00ff66?text=quo', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff66?text=repellat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066cc?text=perferendis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055dd?text=doloremque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eedd?text=eos\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(34, 101, 'Sint sunt iure totam cum illo.', 9, 'ea esse', 1213, 'aqua', NULL, NULL, NULL, 'Available', 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dolorum doloribus in temporibus quo earum laborum. Officiis eum beatae corporis ullam voluptates recusandae ipsa.', 'https://via.placeholder.com/640x480.png/00bb88?text=molestiae', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa55?text=aut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb00?text=consequatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aacc?text=quod\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa44?text=veritatis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(35, 101, 'Magni molestias corrupti voluptatem a deleniti.', 10, 'consequatur dicta', 4154, 'green', NULL, NULL, NULL, 'Available', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Itaque commodi nihil hic aliquam. Sunt quis facilis tempore eius repudiandae. Repellendus ratione voluptate natus dolorem voluptatem quasi.', 'https://via.placeholder.com/640x480.png/00aa00?text=doloribus', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006622?text=veniam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066bb?text=repudiandae\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee11?text=necessitatibus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005533?text=nesciunt\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(36, 101, 'Nobis perspiciatis in repellat.', 4, 'voluptatem laboriosam', 80688, 'black', NULL, NULL, NULL, 'Available', 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Error dolores ipsa rerum ex consequatur aut. Consectetur fuga dolorem doloremque reprehenderit rerum voluptas. Necessitatibus illo corporis eveniet quibusdam.', 'https://via.placeholder.com/640x480.png/00ee66?text=repellendus', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc66?text=inventore\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009944?text=doloremque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffee?text=est\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000077?text=blanditiis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(37, 101, 'Qui veritatis voluptatum repudiandae rerum laudantium.', 6, 'animi dolores', 33019, 'lime', NULL, NULL, NULL, 'Available', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rem enim iste quia. Sed consequatur temporibus saepe deserunt voluptatem sint.', 'https://via.placeholder.com/640x480.png/00aa00?text=laboriosam', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004444?text=placeat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000011?text=deleniti\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc99?text=occaecati\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccdd?text=delectus\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(38, 101, 'Ut et id dolorem mollitia.', 2, 'rerum porro', 2410, 'green', NULL, NULL, NULL, 'Available', 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nesciunt in rerum corrupti expedita nulla. Et in similique reiciendis quo architecto molestias non. Officia qui aut reprehenderit voluptas sed sed.', 'https://via.placeholder.com/640x480.png/006611?text=totam', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002233?text=omnis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff33?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd77?text=exercitationem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008855?text=molestiae\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(39, 101, 'Repellat ab consequatur iusto.', 3, 'accusamus voluptas', 99662, 'aqua', NULL, NULL, NULL, 'Available', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Deleniti recusandae voluptatibus expedita exercitationem et vel assumenda quia. Totam dolores ipsa quo qui itaque. Reiciendis non eos excepturi debitis consequatur quam.', 'https://via.placeholder.com/640x480.png/00bbaa?text=placeat', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005566?text=animi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccff?text=corrupti\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aacc?text=est\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022ff?text=culpa\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(40, 101, 'Possimus aperiam eum quis.', 9, 'aut dolores', 6844, 'teal', NULL, NULL, NULL, 'Available', 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Corporis ea omnis asperiores quia ad et. Eius aut ut ducimus numquam sit odit. Occaecati molestias nostrum aliquam facere et.', 'https://via.placeholder.com/640x480.png/00aaff?text=a', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccff?text=delectus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aacc?text=assumenda\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa99?text=consequatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee33?text=veritatis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(41, 101, 'Quis a laudantium voluptatem.', 1, 'dolor totam', 2339, 'gray', NULL, NULL, NULL, 'Available', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Accusamus perferendis quod veritatis porro aut. Rerum aut numquam earum necessitatibus voluptatem natus id. Sunt enim et praesentium debitis facilis illo repellat.', 'https://via.placeholder.com/640x480.png/0066ee?text=omnis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd66?text=asperiores\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022bb?text=ut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd22?text=fugiat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd00?text=distinctio\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(42, 101, 'Officiis nisi consequatur.', 8, 'et qui', 96515, 'blue', NULL, NULL, NULL, 'Available', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ut quasi similique ipsam sint voluptates necessitatibus et. Temporibus veritatis dolorum laboriosam vero qui exercitationem.', 'https://via.placeholder.com/640x480.png/003311?text=iste', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022aa?text=quas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaaa?text=tempore\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088dd?text=soluta\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000044?text=ea\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(43, 101, 'Rerum at vel placeat dolor.', 1, 'aut voluptatem', 8385, 'navy', NULL, NULL, NULL, 'Available', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aspernatur numquam porro placeat veniam nulla dolores voluptate. Natus vel qui corrupti consequatur facere harum officiis. Et velit earum cupiditate debitis ut ipsam.', 'https://via.placeholder.com/640x480.png/00ee55?text=dolore', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd99?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0099cc?text=iste\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000022?text=fugiat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008877?text=natus\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(44, 101, 'Eaque sunt inventore iure est.', 9, 'accusantium consequatur', 53707, 'navy', NULL, NULL, NULL, 'Available', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Explicabo corporis voluptatem et velit. Molestias vero vero nesciunt sint aut aperiam.', 'https://via.placeholder.com/640x480.png/003377?text=reiciendis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004433?text=iusto\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002222?text=quaerat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055aa?text=sequi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee11?text=quia\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(45, 101, 'Alias alias architecto.', 1, 'blanditiis qui', 1957, 'silver', NULL, NULL, NULL, 'Available', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ab quis natus est consectetur cupiditate. Placeat ullam perspiciatis est vero aut minima autem. Non et saepe cum qui asperiores eligendi.', 'https://via.placeholder.com/640x480.png/00bbbb?text=quisquam', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003355?text=cum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaee?text=eos\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008800?text=aut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005555?text=qui\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(46, 101, 'Iste aperiam adipisci praesentium velit.', 9, 'esse enim', 32797, 'green', NULL, NULL, NULL, 'Available', 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quia amet totam cupiditate deleniti nulla voluptatibus. Minima autem quis nesciunt iusto sed debitis. Dicta quo earum et exercitationem et at qui magnam.', 'https://via.placeholder.com/640x480.png/00aabb?text=expedita', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022bb?text=illum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077dd?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001122?text=possimus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa99?text=praesentium\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(47, 101, 'Facere ea maxime quam.', 8, 'dolorum pariatur', 9669, 'maroon', NULL, NULL, NULL, 'Available', 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sed veritatis quia perferendis impedit. Veniam occaecati ab est nisi.', 'https://via.placeholder.com/640x480.png/009933?text=et', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc11?text=fugiat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002200?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff44?text=sapiente\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd22?text=necessitatibus\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(48, 101, 'Vel earum quisquam cumque asperiores similique.', 1, 'tenetur dolorum', 40901, 'black', NULL, NULL, NULL, 'Available', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Eaque error quam sit dolorem natus qui. Quas rem voluptate quis nesciunt dolore. Corporis sit nesciunt incidunt voluptate est omnis velit magnam.', 'https://via.placeholder.com/640x480.png/00ddaa?text=voluptas', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007700?text=laudantium\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055aa?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088ff?text=neque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd44?text=officiis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(49, 101, 'Consequatur corporis est maxime qui id.', 4, 'earum dolor', 21612, 'silver', NULL, NULL, NULL, 'Available', 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Provident inventore aliquid veniam nisi quo voluptatum molestias. Animi qui voluptates consequatur quibusdam qui cum corporis corporis. Cupiditate inventore ut in aut possimus qui quibusdam.', 'https://via.placeholder.com/640x480.png/007777?text=iure', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007799?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005577?text=nulla\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000cc?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005533?text=tenetur\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(50, 101, 'Suscipit mollitia odio.', 2, 'saepe possimus', 75924, 'lime', NULL, NULL, NULL, 'Available', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sunt qui explicabo quod cum aut minima eum. Suscipit quibusdam facilis voluptas porro delectus alias itaque. Fugiat minus consequatur sed id atque sint.', 'https://via.placeholder.com/640x480.png/001166?text=dolor', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee33?text=non\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055ff?text=provident\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd77?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011ff?text=modi\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(51, 101, 'Omnis qui itaque itaque.', 8, 'quaerat consequatur', 99201, 'green', NULL, NULL, NULL, 'Available', 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Placeat debitis expedita qui magni. Eos omnis sunt possimus et sapiente cumque.', 'https://via.placeholder.com/640x480.png/0099bb?text=aspernatur', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008866?text=enim\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066dd?text=minima\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aabb?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee88?text=consequuntur\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(52, 101, 'Cupiditate similique architecto sint occaecati dignissimos.', 2, 'aperiam tempora', 42332, 'gray', NULL, NULL, NULL, 'Available', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et qui ratione vitae culpa nostrum a. Quo aut adipisci ab ex doloremque quia alias. Recusandae iure placeat voluptas sequi ab commodi ut.', 'https://via.placeholder.com/640x480.png/00aa55?text=quia', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004444?text=ratione\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd99?text=itaque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ee?text=earum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066aa?text=autem\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(53, 101, 'Quia ut repellendus temporibus facere dolor.', 3, 'necessitatibus veritatis', 9800, 'white', NULL, NULL, NULL, 'Available', 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Inventore consequatur sit assumenda recusandae similique corrupti. Commodi dolores libero saepe voluptas quos accusamus.', 'https://via.placeholder.com/640x480.png/00aadd?text=sed', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006677?text=asperiores\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003333?text=consequatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066bb?text=quibusdam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb00?text=est\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(54, 101, 'Sed tenetur autem voluptatum.', 4, 'asperiores quia', 3759, 'olive', NULL, NULL, NULL, 'Available', 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quis quo odit maiores vel cupiditate reiciendis saepe. Perspiciatis praesentium totam necessitatibus labore ea.', 'https://via.placeholder.com/640x480.png/00ddcc?text=molestiae', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008888?text=molestias\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088ee?text=sed\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbee?text=error\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033bb?text=dolorum\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(55, 101, 'Suscipit iste neque.', 4, 'delectus consequatur', 7165, 'blue', NULL, NULL, NULL, 'Available', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Temporibus porro unde fuga laborum labore iste sunt. Unde saepe ratione nisi occaecati. Voluptatem vero iusto iure vel necessitatibus dignissimos.', 'https://via.placeholder.com/640x480.png/00bb22?text=quod', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066ff?text=quo\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088bb?text=voluptatum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003399?text=tempore\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee44?text=velit\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(56, 101, 'Praesentium occaecati illo illo quo.', 1, 'deleniti qui', 52332, 'white', NULL, NULL, NULL, 'Available', 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Consequatur aut quia et ea asperiores dolore dolorem. Magnam corrupti et nesciunt consequatur sed. Quia est et nemo similique.', 'https://via.placeholder.com/640x480.png/001144?text=reprehenderit', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd88?text=omnis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001199?text=iusto\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008888?text=eligendi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee33?text=atque\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(57, 101, 'Voluptas hic consequatur eius soluta accusamus.', 8, 'ab sed', 34288, 'fuchsia', NULL, NULL, NULL, 'Available', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laboriosam ut dolorem dignissimos et magnam est ullam. Ut sed ipsa placeat expedita sunt aliquam sit.', 'https://via.placeholder.com/640x480.png/00dd44?text=minima', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006633?text=sunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004466?text=porro\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffdd?text=accusamus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc33?text=nisi\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(58, 101, 'Accusantium eius nisi et et.', 9, 'rem occaecati', 8493, 'navy', NULL, NULL, NULL, 'Available', 5, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Saepe ut modi soluta. Eveniet et enim non ut quia dignissimos tempore non.', 'https://via.placeholder.com/640x480.png/00eecc?text=quia', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088bb?text=voluptatem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cccc?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005522?text=culpa\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011ee?text=minus\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(59, 101, 'Nobis accusamus rerum.', 3, 'quia cumque', 8314, 'blue', NULL, NULL, NULL, 'Available', 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Delectus sit omnis facere quo. Ex quia doloribus iure atque soluta.', 'https://via.placeholder.com/640x480.png/0000bb?text=ipsum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066cc?text=excepturi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000ee?text=blanditiis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccee?text=atque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007700?text=iure\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(60, 101, 'Veniam quaerat voluptas cum odio.', 8, 'facilis et', 650, 'blue', NULL, NULL, NULL, 'Available', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In tenetur sit ipsam debitis. Ut non ratione quisquam odit cupiditate temporibus. Eos delectus a nesciunt dignissimos laboriosam natus.', 'https://via.placeholder.com/640x480.png/0044ff?text=explicabo', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007777?text=magni\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006688?text=consequatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eebb?text=sit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000022?text=facere\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(61, 101, 'Voluptatem distinctio ipsum accusantium.', 7, 'saepe beatae', 95532, 'white', NULL, NULL, NULL, 'Available', 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rerum ipsam tenetur quia pariatur. Quisquam hic maxime minus assumenda. Modi voluptatem pariatur in magni.', 'https://via.placeholder.com/640x480.png/007744?text=quas', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066dd?text=autem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000088?text=at\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004422?text=odit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002211?text=pariatur\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL);
INSERT INTO `phones` (`id`, `user_id`, `title`, `brand`, `model`, `price`, `color`, `imei`, `sim_status`, `pta_approved`, `status`, `storage_capacity`, `ram`, `camera`, `original_packaging`, `condition`, `purchase_date`, `purchase_proof`, `warranty_status`, `expiration_date`, `operating_system`, `battery_health`, `accessories`, `reason_for_selling`, `front_screen_condition`, `back_cover_condition`, `frame_edges_condition`, `buttons_condition`, `ports_condition`, `touchscreen_functionality`, `screen_damage`, `water_damage`, `battery_issues`, `camera_issues`, `audio_issues`, `connectivity_issues`, `sensor_issues`, `software_issues`, `description`, `main_image`, `additional_images`, `created_at`, `updated_at`, `deleted_at`, `delete_reason`, `delete_message`) VALUES
(62, 101, 'Hic accusamus asperiores.', 8, 'repudiandae aut', 86624, 'black', NULL, NULL, NULL, 'Available', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nihil sed perferendis occaecati earum. Aliquid esse dicta maiores suscipit veniam ea dolor.', 'https://via.placeholder.com/640x480.png/00bbcc?text=suscipit', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee77?text=quidem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066aa?text=sapiente\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff00?text=in\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000011?text=ipsa\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(63, 101, 'Dolor sapiente vel temporibus natus.', 3, 'voluptatibus dolorem', 54509, 'maroon', NULL, NULL, NULL, 'Available', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Facilis rerum dolorem quo est rerum natus. Vero ipsam dolorum itaque. Dolores minus asperiores deleniti ea vero adipisci nulla.', 'https://via.placeholder.com/640x480.png/002255?text=excepturi', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ddaa?text=veritatis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aabb?text=eius\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aabb?text=ratione\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd33?text=facilis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(64, 101, 'Molestiae qui maxime rem.', 4, 'exercitationem eos', 7935, 'white', NULL, NULL, NULL, 'Available', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Commodi rerum expedita praesentium odio et pariatur. Nobis omnis iste neque id quod atque. Officia velit sunt et repellendus.', 'https://via.placeholder.com/640x480.png/007777?text=cum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008800?text=nihil\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffcc?text=iste\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffff?text=alias\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004466?text=ipsum\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(65, 101, 'Quas voluptatem enim.', 10, 'blanditiis iure', 6149, 'aqua', NULL, NULL, NULL, 'Available', 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Vel quis omnis fugit sunt. Sapiente asperiores qui ut velit dolorem cupiditate. Quia inventore aut quasi impedit.', 'https://via.placeholder.com/640x480.png/0000cc?text=qui', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffcc?text=nam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008877?text=saepe\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dddd?text=minima\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff66?text=magni\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(66, 101, 'Corporis autem nulla.', 4, 'in quia', 48062, 'aqua', NULL, NULL, NULL, 'Available', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Officiis qui enim modi ut. Sunt dolor sit rerum a autem est. Aliquam et voluptates ad veniam.', 'https://via.placeholder.com/640x480.png/00ccaa?text=temporibus', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0044ee?text=est\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088bb?text=aut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=ea\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb66?text=quo\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(67, 101, 'Vero est similique exercitationem.', 10, 'omnis similique', 4703, 'teal', NULL, NULL, NULL, 'Available', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Veritatis dolorem voluptas veritatis nostrum. Aut eaque laboriosam aut labore possimus omnis ut atque.', 'https://via.placeholder.com/640x480.png/006666?text=esse', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005566?text=quasi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003388?text=occaecati\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022bb?text=repellat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc66?text=vel\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(68, 101, 'Fuga vel perspiciatis minus assumenda consequatur.', 9, 'nemo voluptatibus', 6094, 'aqua', NULL, NULL, NULL, 'Available', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Est beatae fugit modi provident laborum quo. Et deleniti et adipisci. Illo fugit ad necessitatibus aperiam ex molestiae dolores.', 'https://via.placeholder.com/640x480.png/0099cc?text=debitis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001122?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088dd?text=expedita\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011ff?text=adipisci\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033cc?text=mollitia\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(69, 101, 'Vitae neque eos culpa mollitia ex.', 7, 'veniam dolore', 77846, 'lime', NULL, NULL, NULL, 'Available', 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quam est enim praesentium incidunt. Debitis architecto rem fuga qui et voluptate. Ipsam ratione rem harum voluptatem sed dolorum.', 'https://via.placeholder.com/640x480.png/00aa55?text=consequuntur', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb44?text=dolorem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011ff?text=ut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004499?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccaa?text=error\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(70, 101, 'Ratione nulla saepe ut.', 1, 'delectus at', 6501, 'purple', NULL, NULL, NULL, 'Available', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Accusantium fuga et et id. Atque dolores deleniti qui hic. Placeat ut veritatis ea explicabo et impedit commodi dolore.', 'https://via.placeholder.com/640x480.png/00cc88?text=fugiat', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002266?text=pariatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000ee?text=unde\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0044ee?text=distinctio\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee44?text=quia\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(71, 101, 'Eius adipisci nihil.', 5, 'ratione eius', 8979, 'teal', NULL, NULL, NULL, 'Available', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Explicabo cupiditate illo aut dolorem. Sunt error laudantium incidunt quo.', 'https://via.placeholder.com/640x480.png/005533?text=corrupti', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ee?text=voluptatem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee44?text=nisi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009977?text=culpa\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009933?text=aperiam\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(72, 101, 'Et nam quis impedit provident.', 7, 'voluptas doloremque', 32675, 'lime', NULL, NULL, NULL, 'Available', 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Voluptatum dolor ut harum ipsum. Id inventore asperiores exercitationem veniam quis.', 'https://via.placeholder.com/640x480.png/00dd66?text=quis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055dd?text=reiciendis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff11?text=explicabo\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd33?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000ff?text=et\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(73, 101, 'Et doloremque corrupti rerum facilis.', 3, 'explicabo et', 4134, 'olive', NULL, NULL, NULL, 'Available', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sed sint error voluptas qui. Quam rerum libero aut reiciendis. Similique corrupti accusantium voluptatem quis eos facilis.', 'https://via.placeholder.com/640x480.png/00ee88?text=tempore', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009922?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbbb?text=quas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee88?text=neque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb55?text=qui\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(74, 101, 'Temporibus sapiente iure et.', 5, 'minus et', 8251, 'fuchsia', NULL, NULL, NULL, 'Available', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Praesentium fugit veritatis dolorem est consequatur. Repudiandae perspiciatis sint id voluptatem dolorem.', 'https://via.placeholder.com/640x480.png/0088bb?text=doloribus', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003333?text=hic\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011ee?text=aliquam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb77?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc22?text=dolor\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(75, 101, 'Molestias asperiores facilis.', 4, 'mollitia dicta', 6906, 'maroon', NULL, NULL, NULL, 'Available', 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et alias quis beatae quo. Qui natus voluptas ut ut praesentium illum cupiditate. Cum id qui saepe officiis.', 'https://via.placeholder.com/640x480.png/007722?text=quia', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008866?text=est\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002288?text=cum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088aa?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022ee?text=deserunt\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(76, 101, 'Tenetur aut voluptatum totam inventore.', 8, 'ea dolorum', 2027, 'olive', NULL, NULL, NULL, 'Available', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et rerum itaque explicabo totam aut aut repellendus. Molestiae sed a alias pariatur ea est.', 'https://via.placeholder.com/640x480.png/005522?text=esse', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011ee?text=ut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff33?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaee?text=sunt\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff66?text=cupiditate\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(77, 101, 'Eius ut aut ad quaerat perspiciatis.', 7, 'numquam tempora', 15, 'silver', NULL, NULL, NULL, 'Available', 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quos qui dolorem ducimus distinctio debitis fuga iusto vel. Odio sunt ipsam quod quasi.', 'https://via.placeholder.com/640x480.png/0033ff?text=quas', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb22?text=nam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd11?text=iure\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003388?text=aut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/004400?text=quo\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(78, 101, 'Sit veritatis molestiae excepturi ut.', 6, 'ratione nesciunt', 60765, 'white', NULL, NULL, NULL, 'Available', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ut voluptatem temporibus possimus omnis. Voluptatem aliquam repellat quae qui.', 'https://via.placeholder.com/640x480.png/0000ff?text=animi', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005577?text=distinctio\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009999?text=tenetur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077aa?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd00?text=tempora\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(79, 101, 'Voluptatum et ducimus dolor quo.', 1, 'odit voluptatum', 3257, 'black', NULL, NULL, NULL, 'Available', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Suscipit voluptas et soluta debitis modi eos ut. Suscipit ea quia provident animi tenetur velit numquam. Ullam nihil itaque repellat impedit non deleniti qui.', 'https://via.placeholder.com/640x480.png/00ee44?text=eum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006677?text=molestiae\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000088?text=tempore\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077dd?text=vero\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002299?text=labore\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(80, 101, 'Suscipit odio dolorem iusto doloremque sunt.', 2, 'pariatur error', 6817, 'purple', NULL, NULL, NULL, 'Available', 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sed voluptatem similique culpa architecto sed commodi. Nihil id eos perspiciatis qui.', 'https://via.placeholder.com/640x480.png/008866?text=voluptas', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc99?text=omnis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ddcc?text=labore\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005555?text=nihil\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000099?text=enim\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(81, 101, 'Numquam maiores magnam.', 5, 'facere nemo', 9193, 'fuchsia', NULL, NULL, NULL, 'Available', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rem commodi fugit unde ut vel corrupti. Et quibusdam aliquid error distinctio voluptates sit quia. Laudantium nostrum at eum magni qui soluta maiores.', 'https://via.placeholder.com/640x480.png/00bb66?text=dolor', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001155?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009900?text=doloribus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002266?text=dolores\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002277?text=harum\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(82, 101, 'Omnis natus qui nihil corporis.', 3, 'tempora laudantium', 5598, 'black', NULL, NULL, NULL, 'Available', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quia autem quisquam totam doloremque maiores quam. Illum sunt nisi et vero autem quod.', 'https://via.placeholder.com/640x480.png/00ccaa?text=et', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa99?text=vel\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc88?text=explicabo\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005511?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd88?text=eos\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(83, 101, 'Blanditiis veniam ad ad.', 7, 'voluptas sint', 9571, 'white', NULL, NULL, NULL, 'Available', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Harum maxime veritatis dolores odit molestiae ut. Ullam facilis sint voluptas corrupti omnis qui consectetur.', 'https://via.placeholder.com/640x480.png/003311?text=ut', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002200?text=nostrum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ee?text=quia\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd00?text=perspiciatis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008844?text=doloribus\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(84, 101, 'Cum quis adipisci ut harum.', 3, 'qui deleniti', 73187, 'blue', NULL, NULL, NULL, 'Available', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In aut veniam odit repellendus inventore. Earum quaerat magni officia alias voluptatem qui voluptatem molestiae. Et autem vitae tempore sapiente.', 'https://via.placeholder.com/640x480.png/00bbff?text=ipsa', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009922?text=aperiam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/005511?text=aut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa77?text=laboriosam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006633?text=nulla\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(85, 101, 'Et eum repudiandae fuga voluptatem.', 4, 'possimus aut', 21869, 'white', NULL, NULL, NULL, 'Available', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nostrum molestiae maiores blanditiis qui error. Rerum exercitationem nulla quia perferendis. Quia dolor totam eum ut sit fugit.', 'https://via.placeholder.com/640x480.png/00dd55?text=ut', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001100?text=tempora\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066ff?text=aperiam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011cc?text=dolorem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002244?text=est\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(86, 101, 'Similique tenetur nam.', 9, 'et aut', 8942, 'silver', NULL, NULL, NULL, 'Available', 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Excepturi quam corrupti et praesentium qui in cumque illum. Provident quo ut sit id dolores. Odio rerum iste tempora sit eum impedit.', 'https://via.placeholder.com/640x480.png/001122?text=provident', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc11?text=rerum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/001100?text=temporibus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011cc?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ccee?text=cum\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(87, 101, 'Aut excepturi maiores ab voluptates.', 10, 'voluptate aliquam', 59931, 'lime', NULL, NULL, NULL, 'Available', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Et asperiores eligendi optio et. Ut qui laudantium tempore quam repellat tenetur officiis. Cupiditate pariatur similique tempora cupiditate dolor explicabo.', 'https://via.placeholder.com/640x480.png/00aa88?text=ipsum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0022bb?text=voluptates\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000088?text=distinctio\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011aa?text=saepe\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee99?text=cupiditate\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(88, 101, 'Rerum dolorum velit quisquam aut.', 7, 'illo excepturi', 97392, 'fuchsia', NULL, NULL, NULL, 'Available', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quas repudiandae asperiores enim. Cumque aliquam asperiores voluptatibus molestiae.', 'https://via.placeholder.com/640x480.png/00bb88?text=at', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009900?text=temporibus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa11?text=error\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=temporibus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009900?text=ea\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(89, 101, 'Corporis cum ipsam.', 7, 'perferendis at', 4673, 'lime', NULL, NULL, NULL, 'Available', 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ipsum doloremque laboriosam voluptatem in temporibus nostrum quam. Deleniti omnis inventore est. Voluptatem consequatur dolorem nam et.', 'https://via.placeholder.com/640x480.png/004422?text=cupiditate', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0055bb?text=nulla\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009955?text=blanditiis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb66?text=temporibus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd88?text=quo\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(90, 101, 'At maxime pariatur.', 3, 'deleniti voluptas', 8969, 'teal', NULL, NULL, NULL, 'Available', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Corrupti ut debitis est laboriosam culpa quia dolor id. Doloremque doloribus cupiditate doloremque alias quibusdam.', 'https://via.placeholder.com/640x480.png/000033?text=non', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaaa?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00dd44?text=quidem\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006600?text=rerum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ee33?text=ut\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(91, 101, 'Molestias qui ea eos.', 4, 'esse sint', 7058, 'black', NULL, NULL, NULL, 'Available', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Iste eius id ad qui quibusdam omnis quis. Consequatur laborum iure hic nemo vero commodi incidunt. Doloribus voluptatem dolorum corporis autem omnis.', 'https://via.placeholder.com/640x480.png/001199?text=quia', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008800?text=alias\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000cc?text=atque\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033ff?text=non\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008888?text=sit\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(92, 101, 'Eos sint voluptas quia molestiae quas.', 5, 'et harum', 4148, 'fuchsia', NULL, NULL, NULL, 'Available', 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aut voluptatum odit sit quasi eaque. Amet quidem voluptas laudantium quo voluptas et vel accusantium. Tempora provident et assumenda voluptatum enim eveniet.', 'https://via.placeholder.com/640x480.png/007711?text=rerum', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088dd?text=pariatur\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bb22?text=soluta\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff99?text=non\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/002277?text=velit\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(93, 101, 'Corporis quam ut pariatur aut.', 3, 'officia autem', 3135, 'silver', NULL, NULL, NULL, 'Available', 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Non eum aut nesciunt ducimus sunt ut. Dicta dolorem in sunt dolorum.', 'https://via.placeholder.com/640x480.png/008822?text=repellendus', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/009966?text=impedit\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008844?text=vitae\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0000dd?text=non\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0033aa?text=quidem\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(94, 101, 'Et est qui tenetur.', 4, 'est voluptas', 1489, 'lime', NULL, NULL, NULL, 'Available', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ut eos atque ad voluptas autem facilis possimus. Qui officia voluptas vel est nemo. Blanditiis sed neque quae exercitationem aut.', 'https://via.placeholder.com/640x480.png/0088ff?text=voluptas', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006655?text=aut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066dd?text=repellat\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006655?text=qui\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0077bb?text=sed\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(95, 101, 'Veritatis recusandae velit ut qui eum.', 2, 'beatae vel', 44653, 'maroon', NULL, NULL, NULL, 'Available', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mollitia beatae qui ipsum ullam harum perspiciatis officiis. Quidem non et est dolorem et sit. Dolorem fugiat veritatis quia animi illo.', 'https://via.placeholder.com/640x480.png/0022dd?text=nihil', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008811?text=tempora\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0088aa?text=omnis\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ffaa?text=occaecati\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eeff?text=ab\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(96, 101, 'Deleniti suscipit corporis beatae illo.', 2, 'aut nemo', 83255, 'blue', NULL, NULL, NULL, 'Available', 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ut quasi et libero. Fugit asperiores sit nihil aut voluptas odit consequatur. Nesciunt deleniti beatae culpa quia incidunt excepturi qui accusamus.', 'https://via.placeholder.com/640x480.png/0022bb?text=facilis', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007700?text=rerum\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaee?text=in\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006633?text=natus\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066bb?text=est\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(97, 101, 'Id sit quod architecto.', 4, 'aut corporis', 24594, 'teal', NULL, NULL, NULL, 'Available', 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Est quos minima incidunt eaque reiciendis. Ut consequatur accusantium porro consequatur dicta non.', 'https://via.placeholder.com/640x480.png/008833?text=est', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00bbcc?text=quibusdam\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00ff55?text=dicta\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0044bb?text=eligendi\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/008866?text=nostrum\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(98, 101, 'Quae omnis ea quo.', 3, 'exercitationem doloribus', 42642, 'green', NULL, NULL, NULL, 'Available', 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ab fugiat officiis nisi et non. Magni aperiam ipsum dolorem fugit nesciunt.', 'https://via.placeholder.com/640x480.png/005599?text=maxime', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/007722?text=voluptas\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aaaa?text=et\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066bb?text=ut\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0011dd?text=perspiciatis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(99, 101, 'Aliquid atque et ipsum ducimus repellendus.', 7, 'error facilis', 9804, 'fuchsia', NULL, NULL, NULL, 'Available', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laboriosam at amet aperiam ea hic laudantium. Id delectus placeat quia dolore.', 'https://via.placeholder.com/640x480.png/0033dd?text=eligendi', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00eedd?text=quo\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/0066ff?text=dolore\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00cc66?text=dolores\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003311?text=omnis\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(100, 101, 'Qui rerum explicabo consequuntur.', 5, 'aut repudiandae', 7343, 'fuchsia', NULL, NULL, NULL, 'Available', 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ut quia possimus molestias aperiam qui. Ratione dolores assumenda sunt tempora est. Saepe exercitationem ut adipisci quia.', 'https://via.placeholder.com/640x480.png/00dd22?text=totam', '[\"https:\\/\\/via.placeholder.com\\/640x480.png\\/00aa88?text=molestias\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/006622?text=facere\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/003333?text=iusto\",\"https:\\/\\/via.placeholder.com\\/640x480.png\\/000000?text=inventore\"]', '2023-05-29 05:39:15', '2023-05-29 05:39:15', NULL, NULL, NULL),
(101, 101, 'iPHONE 6s', 1, '6s', 10000, 'black', '2345678121721', 'Working', 'Not Approved', 'Sold', 16, 2, NULL, 'Yes', 'Like New', '2023-05-16', '/storage/purchase_proofs/1685341833_blog-recent-4.jpg', 'active', '2023-11-23', 'Apple', 80, '[\"Charger\",\"Headphones\",\"Case\"]', 'want to buy another phone', 'No scratches', 'No scratches', 'No scratches', 'Fully functional', 'Excellent', 'Fully functional', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'None', 'test', '/storage/thumbnails/1685341833_app-3.jpg', '[\"\\/storage\\/additional_images\\/1685341833_0.png\",\"\\/storage\\/additional_images\\/1685341833_1.png\",\"\\/storage\\/additional_images\\/1685341833_2.png\",\"\\/storage\\/additional_images\\/1685341833_3.png\"]', '2023-05-29 06:30:33', '2023-05-29 06:49:40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recivers_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recivers_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recivers_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recivers_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recivers_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recivers_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `total_price` decimal(10,2) NOT NULL,
  `stripe_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`, `recivers_name`, `recivers_email`, `recivers_phone`, `recivers_address`, `recivers_city`, `recivers_zip_code`, `delivery_option`, `status`, `total_price`, `stripe_transaction_id`, `created_at`, `updated_at`) VALUES
(1, 102, 'Talha', 'talhakhizar5@gmail.com', '03475411533', 'house no 70', 'Rawalpindi', '12345', 'Default', 'Pending', '50611.00', 'ch_3NCzGtFQ2jDbAq4D1YBtrHz8', '2023-05-29 06:09:24', '2023-05-29 06:09:30'),
(2, 102, 'Talha', 'talhakhizar5@gmail.com', '03475411533', 'house no 70', 'Rawalpindi', '12345', 'Default', 'Pending', '10000.00', 'Khas_Iquv62pGEzu84q1RAEi', '2023-05-29 06:49:40', '2023-05-29 06:49:40'),
(3, 102, 'Talha', 'talhakhizar5@gmail.com', '03475411533', 'house no 70', 'Rawalpindi', '12345', 'Default', 'Pending', '3875.00', 'Khas_8FNPFbTPbhIxvvHVgKU', '2023-05-29 07:17:40', '2023-05-29 07:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_phones`
--

CREATE TABLE `purchased_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Purchased',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchased_phones`
--

INSERT INTO `purchased_phones` (`id`, `user_id`, `phone_id`, `purchase_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 102, 1, 1, 'Delivered', '2023-05-29 06:09:24', '2023-05-29 06:10:33'),
(2, 102, 101, 2, 'Returned', '2023-05-29 06:49:40', '2023-05-29 07:14:12'),
(3, 102, 4, 3, 'ordered', '2023-05-29 07:17:40', '2023-05-29 07:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`id`, `phone_id`, `user_id`, `reason`, `message`, `return_file`, `status`, `replay`, `created_at`, `updated_at`) VALUES
(1, 101, 102, 'Wrong Item Received', 'wrong', NULL, 'Pending', NULL, '2023-05-29 06:52:49', '2023-05-29 06:52:49'),
(2, 4, 102, 'Wrong Item Received', 'ere', NULL, 'Accepted', NULL, '2023-05-29 07:19:14', '2023-05-29 07:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `return_completed`
--

CREATE TABLE `return_completed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_completed`
--

INSERT INTO `return_completed` (`id`, `phone_id`, `user_id`, `transaction_id`, `return_by`, `status`, `payment`, `created_at`, `updated_at`) VALUES
(1, 101, 102, NULL, '1', 'Returned', 'Refunded', '2023-05-29 07:14:12', '2023-05-29 07:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_permision`
--

CREATE TABLE `roles_permision` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `create` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `update` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delete` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `view` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_by` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `phone_id`, `purchase_id`, `amount`, `transaction_type`, `status`, `reason`, `message`, `method`, `action_by`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 101, 1, 1, '50611.00', 'sold', 'on hold', NULL, NULL, 'Card', NULL, 'ch_3NCzGtFQ2jDbAq4D1YBtrHz8', '2023-05-29 06:09:30', '2023-05-29 06:09:30'),
(2, 102, 1, 1, '50611.00', 'purchase', 'success', NULL, NULL, 'Card', NULL, 'ch_3NCzGtFQ2jDbAq4D1YBtrHz8', '2023-05-29 06:09:30', '2023-05-29 06:09:30'),
(3, 102, NULL, NULL, '50000.00', 'deposit', 'success', NULL, NULL, NULL, NULL, 'ch_3NCzjIFQ2jDbAq4D0NwUlcGE', '2023-05-29 06:38:51', '2023-05-29 06:38:51'),
(4, 101, 101, 2, '10000.00', 'sold', 'on hold', NULL, NULL, 'Wallet', NULL, 'Khas_Iquv62pGEzu84q1RAEi', '2023-05-29 06:49:40', '2023-05-29 06:49:40'),
(5, 102, 101, 2, '10000.00', 'purchase', 'success', NULL, NULL, 'Wallet', NULL, 'Khas_Iquv62pGEzu84q1RAEi', '2023-05-29 06:49:40', '2023-05-29 06:49:40'),
(6, 102, 101, 2, '10000.00', 'refund', 'success', NULL, NULL, 'Wallet', NULL, 'Khas_wJDW0Tz2WqIKoIvLJly', '2023-05-29 07:14:12', '2023-05-29 07:14:12'),
(7, 101, 4, 3, '3875.00', 'sold', 'on hold', NULL, NULL, 'Wallet', NULL, 'Khas_8FNPFbTPbhIxvvHVgKU', '2023-05-29 07:17:40', '2023-05-29 07:17:40'),
(8, 102, 4, 3, '3875.00', 'purchase', 'success', NULL, NULL, 'Wallet', NULL, 'Khas_8FNPFbTPbhIxvvHVgKU', '2023-05-29 07:17:40', '2023-05-29 07:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `banned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_sent_timestamp` timestamp NULL DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT 0.00,
  `onhold` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `city`, `zip_code`, `phone`, `photo`, `email`, `default_address`, `banned`, `verification_code`, `email_verified_at`, `email_sent_timestamp`, `email_verification_token`, `password`, `google_id`, `last_login`, `remember_token`, `created_at`, `updated_at`, `balance`, `onhold`) VALUES
(1, 'Mauricio Runolfsdottir', 'Dortha Langworth', '974 Odie Walk Apt. 764\nHerthaburgh, UT 91854-8757', NULL, '08851-8442', '(754) 253-9188', 'https://picsum.photos/200/300', 'vframi@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ATOEo9iJCw', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(2, 'Lynn Beatty MD', 'Willow Hagenes', '7851 Schuster Falls Apt. 631\nPort Zackeryland, VT 34317', NULL, '51554', '+1 (934) 490-6391', 'https://picsum.photos/200/300', 'estelle59@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '5SgEW9FHsM', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(3, 'Prof. Josefa Dietrich', 'D\'angelo Wyman', '307 Doyle Isle Suite 167\nAndersonbury, MA 00433-1449', NULL, '67841-1252', '346-714-1095', 'https://picsum.photos/200/300', 'kenya38@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'kqmMIgZtGO', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(4, 'Mr. Travis Witting', 'Mr. Cortez Thompson DVM', '947 Legros Well\nNew Zariatown, IL 56636', NULL, '58915-1124', '303.229.9236', 'https://picsum.photos/200/300', 'melba.raynor@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '6E777W6xQc', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(5, 'Dasia Kiehn PhD', 'Prof. Noelia O\'Conner Sr.', '110 Carolyn Green Apt. 786\nLeximouth, NH 33653', NULL, '88913', '+1-702-661-4310', 'https://picsum.photos/200/300', 'esta.wisoky@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'KXn6tw9fmc', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(6, 'Michel Vandervort', 'Triston Johnson', '37646 Bruce Mountain Apt. 702\nSouth Chaim, LA 32736-1766', NULL, '42037', '364.241.2267', 'https://picsum.photos/200/300', 'roberto25@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '4n3h6c1ykZ', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(7, 'Ms. Bailee Reichert MD', 'Prof. Robyn Gerhold', '744 Auer Mission Apt. 660\nFritschstad, WV 23245-6911', NULL, '64656', '618-775-9029', 'https://picsum.photos/200/300', 'frederic30@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'FBXQLydFOk', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(8, 'Miss Karina Cassin', 'Trey Schowalter', '794 Guadalupe Curve Apt. 217\nWunschberg, IL 83932', NULL, '08375-0866', '+1-765-278-3597', 'https://picsum.photos/200/300', 'bhermann@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'vs68eu4RyL', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(9, 'Prof. Donato Kirlin', 'Mr. Richie Goldner DDS', '84732 Drake Villages Suite 006\nNew Elnora, MO 92382-9588', NULL, '16398', '+12482528389', 'https://picsum.photos/200/300', 'schmeler.darron@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'GaWAGaaNft', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(10, 'Marguerite Bayer Sr.', 'Mylene Kihn', '140 Citlalli Square Apt. 296\nSavannahland, NJ 68837-7265', NULL, '58586', '(406) 630-5493', 'https://picsum.photos/200/300', 'eli.koss@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'eXjyjJAUJu', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(11, 'Jeff Jakubowski DVM', 'Blake Douglas', '6464 Rowe Plaza\nDelphiaview, IL 50954-2319', NULL, '70658-0684', '1-763-259-8242', 'https://picsum.photos/200/300', 'rohan.sunny@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '7IdkYoIKKV', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(12, 'Delfina Konopelski', 'Lysanne Hyatt', '1256 Kulas Hollow Suite 048\nMillerville, NM 35149', NULL, '55620-7706', '+15717373677', 'https://picsum.photos/200/300', 'ansel.cassin@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '0PKHol4Cjy', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(13, 'Prof. Grover Feeney DDS', 'Ila Cormier', '2557 Spencer Heights\nLubowitztown, IL 13525-9881', NULL, '14952-2699', '774.569.1102', 'https://picsum.photos/200/300', 'kaleigh.will@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'KBmtrfbgRV', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(14, 'Dr. Ari Lehner DDS', 'Cassidy Gottlieb', '9608 Maxwell Inlet Apt. 043\nEast Genoveva, SC 85354-9322', NULL, '34387', '580-238-9321', 'https://picsum.photos/200/300', 'cathy.boyer@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'uWywpgMgSn', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(15, 'Alvena Shanahan', 'Albin Kuhn', '327 Cayla Views\nWest Marquise, TN 73704-6562', NULL, '88678-4704', '(252) 653-4040', 'https://picsum.photos/200/300', 'emory.heathcote@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'YaF9MwqU4C', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(16, 'Novella Toy', 'Birdie Swaniawski', '26299 Alivia Route\nJavierchester, AL 98324-8713', NULL, '44050', '1-225-683-7340', 'https://picsum.photos/200/300', 'eparisian@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'dA8EmUEl6z', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(17, 'Bridget Mertz', 'Emil O\'Conner', '744 Little Squares Apt. 592\nEast Otho, MS 37557', NULL, '05060-9502', '+14194632461', 'https://picsum.photos/200/300', 'zboncak.bradley@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'T0e3gC3CTa', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(18, 'Cyrus Ondricka', 'Reva Gerlach IV', '82625 Jada Lakes Apt. 853\nNew Kylie, UT 52206-4902', NULL, '21573', '+1-470-565-6138', 'https://picsum.photos/200/300', 'morissette.sheridan@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '7waDdM0wQ8', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(19, 'Mauricio Reynolds', 'Carley Boyle', '39390 Yessenia Meadow\nErnsershire, NC 02905', NULL, '96680-2227', '+1-860-341-1637', 'https://picsum.photos/200/300', 'lang.velma@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'k7wd1rm8BQ', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(20, 'Lauriane Price DVM', 'Susie Rutherford DDS', '4230 Marisa Island Suite 044\nLake Brandonchester, WV 52858', NULL, '01418-7840', '+1-814-928-8716', 'https://picsum.photos/200/300', 'beverly13@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'y4f12pfmlN', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(21, 'Brianne Stamm', 'Miss Evelyn Beier Sr.', '201 Agnes Street Apt. 522\nSouth Sadiemouth, OR 88925-9977', NULL, '10964-8494', '+1.715.991.2721', 'https://picsum.photos/200/300', 'ckuhlman@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'WS9GuNf9Ld', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(22, 'Travis Will I', 'Urban Koch', '638 Amiya Path Suite 816\nAshleefort, RI 57541-2931', NULL, '71542', '(731) 445-6242', 'https://picsum.photos/200/300', 'aurelie07@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'kMLtlJTRth', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(23, 'Jesus Okuneva', 'Candelario Schimmel', '7167 Nienow Estate Suite 726\nSengerbury, NH 06533-8546', NULL, '86227', '463.374.9212', 'https://picsum.photos/200/300', 'mazie71@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'XDI6jEhDDK', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(24, 'Marley Feil', 'Jakob O\'Keefe', '9029 Berge Lodge Suite 937\nBernhardhaven, WV 08805', NULL, '43559', '1-380-428-2234', 'https://picsum.photos/200/300', 'kris.aliza@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'rfDCGy4kxQ', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(25, 'Jeffrey Gleason', 'Prof. Dahlia McKenzie', '7974 Jordi Lights\nTaureanport, MI 42637-1414', NULL, '82378-3039', '919.992.2824', 'https://picsum.photos/200/300', 'schneider.amos@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '6OnQGkds5e', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(26, 'Lori Sauer', 'Dr. Julien Hammes', '60131 Bailee Summit Suite 383\nWiegandhaven, NY 68164', NULL, '57750', '1-740-438-2489', 'https://picsum.photos/200/300', 'laurianne.abshire@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ZOYaeBFAc9', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(27, 'Morton Daugherty', 'Annette Wisozk', '5098 Rocky Gardens Apt. 381\nLake Newtonton, SD 83338', NULL, '14750-3869', '520-587-0035', 'https://picsum.photos/200/300', 'lorna.konopelski@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'wnI15xnxtx', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(28, 'Chaim Koepp', 'Theresa McGlynn DVM', '4159 Langosh Fork Apt. 847\nPort Shanelle, IL 00253', NULL, '84684-6889', '(678) 549-9147', 'https://picsum.photos/200/300', 'sprohaska@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '8cW6XTOdCE', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(29, 'Dejah Abbott', 'Yadira Dare III', '8380 Gutkowski Harbors\nOberbrunnerberg, FL 10345-9483', NULL, '41062', '+1.240.480.1515', 'https://picsum.photos/200/300', 'gottlieb.logan@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'SStF3UMnZZ', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(30, 'Ada Rempel', 'Modesta Brekke', '7123 Itzel Field\nNew Howell, PA 65675-9151', NULL, '44748-0697', '283.327.4024', 'https://picsum.photos/200/300', 'vhane@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '1OSaMbORRo', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(31, 'Roman Wilkinson', 'Dr. Laney Fritsch II', '24009 Gulgowski Well\nWalshchester, MN 18315-4761', NULL, '11245-0717', '+1-505-219-9239', 'https://picsum.photos/200/300', 'llangosh@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Ohd3yrmGJ8', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(32, 'Ms. Catharine Cronin', 'Nels Purdy', '243 Adeline Overpass\nOrnport, LA 20811', NULL, '16280-0872', '+1-678-959-3918', 'https://picsum.photos/200/300', 'fthompson@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'lRml2krSDf', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(33, 'Katelynn Waters', 'Jamaal Stokes', '49593 Larkin Cliff Apt. 470\nDinaberg, TN 24017-7721', NULL, '20172', '(734) 849-4408', 'https://picsum.photos/200/300', 'zschroeder@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'fK1jgLURQa', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(34, 'Hadley Huels', 'Mrs. Bryana Mueller', '672 Mertz Villages\nBoyerfurt, AK 60766', NULL, '48481-8467', '+1-737-925-6080', 'https://picsum.photos/200/300', 'kovacek.andre@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'IC5HDCn6ws', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(35, 'Buddy Hackett', 'Ottis Grady', '3890 Alvah Rue Apt. 529\nNorth Elroyshire, NM 22817', NULL, '00901', '+1-423-250-8939', 'https://picsum.photos/200/300', 'kaleb22@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'lKUkYk1JLn', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(36, 'Prof. Winnifred Upton II', 'Nellie Wuckert II', '454 Bernhard Bridge\nNorth Eldon, PA 22598-1430', NULL, '51956-3428', '+15858641032', 'https://picsum.photos/200/300', 'schimmel.zoey@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'LVF91I0OXG', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(37, 'Mr. Dillan Rau', 'Angie Renner', '6739 Renee Circles\nEdmondshire, IA 40440-9844', NULL, '66611', '(386) 909-9641', 'https://picsum.photos/200/300', 'altenwerth.salvador@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '672dvQ5Td8', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(38, 'Leif Cronin', 'Martina Marquardt', '19571 Goodwin Mountains\nNew Rosetta, AL 70508-6306', NULL, '54072', '+15029668383', 'https://picsum.photos/200/300', 'lon13@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'FM5DHjw1Ml', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(39, 'Alverta Harber', 'Mrs. Hermina Ebert', '936 Luther Trail\nLake Garlandport, AL 14969-4505', NULL, '00687', '(724) 650-1272', 'https://picsum.photos/200/300', 'stroman.wellington@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'QUNoH4XP9J', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(40, 'Dr. Jayme Koss III', 'Colleen Braun MD', '8309 Emmerich Spur\nWest Jerrold, VA 74374-4499', NULL, '38365', '540.827.2134', 'https://picsum.photos/200/300', 'kschaefer@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'XRHSKszALW', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(41, 'Bobbie Crist', 'Scot Goyette', '644 Marquis Pines\nAngelinaville, IL 81148', NULL, '41433-1901', '+15515989607', 'https://picsum.photos/200/300', 'jjaskolski@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'z9lAZYz2YG', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(42, 'Ms. Kaci Kilback III', 'Maureen Jakubowski IV', '368 Schuyler Walks\nDavonteshire, NE 17623', NULL, '27679-1284', '+1-878-273-2056', 'https://picsum.photos/200/300', 'carter.roger@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'LZJ5EMun1M', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(43, 'Dr. Brandt Haley Sr.', 'Dannie Gerlach I', '2070 Kshlerin Valleys Apt. 363\nRomagueraport, OH 20251', NULL, '85901', '1-773-382-1995', 'https://picsum.photos/200/300', 'epollich@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'asjNFA6pMq', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(44, 'Dr. Simone Lockman', 'Justyn Purdy', '92935 Krajcik Oval Apt. 619\nNew Laurenceshire, MD 86373-7423', NULL, '70510', '+1.843.333.1790', 'https://picsum.photos/200/300', 'asa71@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '8APOa2PFF6', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(45, 'Elaina Wyman', 'Dr. Carleton O\'Reilly DVM', '2019 Miller Forges Apt. 859\nD\'Amorehaven, CT 59272', NULL, '46826', '+1-930-850-0556', 'https://picsum.photos/200/300', 'fern86@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'BmGXu749Yy', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(46, 'Ms. Kattie Rolfson', 'Dr. Damien Steuber DVM', '3785 Daisy Turnpike Suite 083\nNorth Derickborough, AR 18918-5187', NULL, '00185', '+1-743-484-1061', 'https://picsum.photos/200/300', 'imonahan@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '66mR64CFxk', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(47, 'Frida Cummings', 'Mrs. Emmie Rodriguez Jr.', '5044 Von Isle Apt. 636\nNorth Libbieton, UT 06699-2247', NULL, '57271', '1-562-485-2809', 'https://picsum.photos/200/300', 'daphney.oreilly@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'jXCmbfun1y', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(48, 'Miss Mylene Lang II', 'Stacy Kuphal', '5203 Langosh Passage Suite 121\nBuckridgemouth, SD 36221', NULL, '11624', '626-844-7212', 'https://picsum.photos/200/300', 'rlebsack@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'YprcfxdlhR', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(49, 'Nettie Connelly', 'Miss Meggie Russel Sr.', '701 Rutherford Wells Apt. 114\nGaylordview, AL 43580', NULL, '97656', '+1-970-679-6461', 'https://picsum.photos/200/300', 'ogulgowski@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'emTm984RgL', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(50, 'Bernadine Gislason', 'Leland Stokes III', '7872 Berry Field Apt. 151\nSouth Rita, MO 32390', NULL, '81434-3087', '(757) 586-9584', 'https://picsum.photos/200/300', 'sasha33@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'KYnpZEC9A0', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(51, 'Ms. Novella Dare', 'Gardner Lind', '39428 Purdy Station\nJaymebury, NH 51538-8334', NULL, '11313-6302', '970.970.6018', 'https://picsum.photos/200/300', 'dickinson.caterina@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'zj4Cr8qfZN', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(52, 'Victoria Mills', 'Frankie Krajcik', '238 Ledner View\nWest Meaganhaven, ME 99825-6114', NULL, '56634', '+1-972-918-5733', 'https://picsum.photos/200/300', 'nils28@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '2FgMkFqTgw', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(53, 'Mrs. Amira Schroeder IV', 'Selmer Erdman', '3330 Kemmer Overpass Apt. 308\nNaderstad, MD 18613-9579', NULL, '63175-4966', '(872) 763-2595', 'https://picsum.photos/200/300', 'johanna79@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '4OXXUTnPAp', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(54, 'Wilbert Rau', 'Brook Braun', '2078 Dillan Springs\nPort Ewald, MT 22436', NULL, '62181-5378', '534.766.4344', 'https://picsum.photos/200/300', 'charles.heathcote@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'WG4cj13rZ9', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(55, 'Muriel Harvey', 'Prof. Kip Wisozk', '5992 King Parkways Apt. 908\nVerlafort, GA 62930-3454', NULL, '63121', '854-563-6159', 'https://picsum.photos/200/300', 'zwisozk@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'jdD0NcEqvA', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(56, 'Ursula Parisian PhD', 'Jameson McCullough', '28584 Brandi Road Apt. 385\nWest Camilaborough, SC 28509-2672', NULL, '26852-6842', '(832) 596-5809', 'https://picsum.photos/200/300', 'sophia98@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'xnjP2wly0i', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(57, 'Dr. Amiya Friesen I', 'Conner Dooley', '860 Lesch Shoals Apt. 233\nLake Ellsworthfurt, AK 95557-5638', NULL, '09692-9822', '(803) 847-0937', 'https://picsum.photos/200/300', 'kertzmann.luella@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '5ITXQSIotO', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(58, 'Dr. Toby Koss IV', 'Josie Hirthe', '663 Diamond Plaza\nNorth Lulutown, IL 75077-2072', NULL, '66016-1504', '+1 (725) 392-5462', 'https://picsum.photos/200/300', 'rebeka55@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'O6mrgg16te', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(59, 'Shanna Schaden', 'Laisha Bernier', '1725 Jerome Parkway Suite 872\nWest Dorcasfort, WA 76849', NULL, '53380', '908-677-2542', 'https://picsum.photos/200/300', 'vmertz@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Vy9gzXZPxM', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(60, 'Gertrude Armstrong', 'Therese Vandervort', '750 Gianni Circles\nHarrishaven, MD 62992', NULL, '82061', '820.956.2236', 'https://picsum.photos/200/300', 'katlynn.auer@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'FvODkMevKu', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(61, 'Ms. Judy Koch V', 'Elnora Miller', '569 Gertrude Pass\nLake Bennietown, KY 50222', NULL, '70502', '(856) 856-6021', 'https://picsum.photos/200/300', 'dbernhard@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'MWPabZVXH2', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(62, 'Bell Tromp', 'Jovany Runolfsson PhD', '7675 Bernie Ramp Apt. 293\nJaquelinside, RI 99236', NULL, '30597', '(727) 208-6940', 'https://picsum.photos/200/300', 'kovacek.jammie@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '6Eiwx4JjYv', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(63, 'Ms. Ena Harvey', 'Dr. Asia Streich', '78372 Dell Parkways\nRolandomouth, SD 79232-3483', NULL, '67717-1357', '601.476.1435', 'https://picsum.photos/200/300', 'eusebio36@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'nhjonqJyCN', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(64, 'Mr. Miguel Gutmann Jr.', 'Hassie Bernhard I', '66078 Wolf Vista\nPearliefurt, TX 35764', NULL, '63978', '+1-503-207-0772', 'https://picsum.photos/200/300', 'estevan.haag@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'r7qKxe9WIX', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(65, 'Elias Glover', 'Ms. Liza Christiansen I', '74950 Pagac Skyway\nGradyview, WV 67455-0240', NULL, '63240', '+18104237574', 'https://picsum.photos/200/300', 'rziemann@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'kKqTe2WOAN', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(66, 'Stefan Harris DVM', 'Nolan Mohr', '5672 McKenzie Causeway\nUllrichborough, GA 56958-9818', NULL, '46196-8695', '+1 (773) 400-0125', 'https://picsum.photos/200/300', 'albertha64@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'lVvkWbkaLu', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(67, 'Dr. Neal Brekke', 'Camilla Roberts', '7629 Oberbrunner Unions\nJohnnyland, VT 25111-0145', NULL, '60091', '+1-781-885-6527', 'https://picsum.photos/200/300', 'gilbert39@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'aQIHUzWLou', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(68, 'Ms. Alena Bogan Jr.', 'Prof. Kelli Williamson V', '8451 Schroeder Keys Suite 953\nNew Johnnybury, NC 76324', NULL, '71403-5317', '505-445-5734', 'https://picsum.photos/200/300', 'zokeefe@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'hthKM79EYJ', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(69, 'Dorothea Kunze III', 'Scarlett Auer', '6968 Monroe Trace\nRainafort, IL 96546', NULL, '76408', '502-376-0948', 'https://picsum.photos/200/300', 'yreichert@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'GWuqJXYAXI', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(70, 'Arjun Gottlieb', 'Dr. Chase Marvin', '188 Mitchell Island\nNorth Esperanzaview, SC 61412-2900', NULL, '37043', '916.464.8110', 'https://picsum.photos/200/300', 'yoshiko44@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'zaku9lWHu9', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(71, 'Caesar Schmidt', 'Vella Greenholt DDS', '39008 Gulgowski Extensions\nMarinaborough, OK 24764-2353', NULL, '34021-7415', '(309) 800-0740', 'https://picsum.photos/200/300', 'weimann.pansy@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'olOV85vH9J', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(72, 'Ada Nitzsche', 'Natasha Lindgren I', '136 Huel Motorway Apt. 666\nEast Georgianahaven, NV 31034-6392', NULL, '76227-3868', '1-520-908-3721', 'https://picsum.photos/200/300', 'lew85@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'sMlYrW2yQC', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(73, 'Mrs. Janis Balistreri V', 'Marquis Jast', '81967 DuBuque Club\nPort Lucienne, NM 17731-1082', NULL, '11025', '+1.423.370.0038', 'https://picsum.photos/200/300', 'malika.rohan@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'dxzvsSCFGT', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(74, 'Prof. Horacio Roberts', 'Sammie Hane DVM', '728 Weissnat Place\nHanemouth, ID 29084', NULL, '08272-4301', '1-240-577-2762', 'https://picsum.photos/200/300', 'ignacio44@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'orUp8awJnj', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(75, 'Gene Prosacco', 'Mr. Edwardo Nicolas II', '64551 Tyler Row\nVeumport, ND 09060', NULL, '53646', '534-956-2490', 'https://picsum.photos/200/300', 'colin68@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'IFoJIZ9N8J', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(76, 'Lauretta Koch I', 'Gregoria Breitenberg IV', '86453 Hickle Pass Suite 290\nSouth Emelieberg, UT 70461', NULL, '58497-9343', '(484) 389-7043', 'https://picsum.photos/200/300', 'gladys.kuhn@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'BwUnDkwSr4', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(77, 'Mr. Columbus Mann II', 'Juston Schaden', '472 Pfannerstill Parkways\nNorth Darrickville, KS 04631-8699', NULL, '31827-3961', '1-540-733-6189', 'https://picsum.photos/200/300', 'cole.asia@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '7PZiLWKHyF', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(78, 'Fannie Pfannerstill', 'Cynthia Zulauf', '8309 Stanford Circles\nToystad, VT 42700', NULL, '05016-5342', '1-678-794-1014', 'https://picsum.photos/200/300', 'gust.torphy@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'h9ouKoFDNm', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(79, 'Prof. Raven Champlin MD', 'Chauncey Crooks', '509 Leonora Hollow\nLake Emil, MS 38318-8535', NULL, '54414', '+1-435-822-5032', 'https://picsum.photos/200/300', 'ocormier@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'JLAgBZOcfq', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(80, 'Arturo Franecki', 'Prof. Helga Jaskolski Sr.', '74844 Halvorson Forge\nNorth Zora, NV 31313-6990', NULL, '25988-8262', '580.262.1840', 'https://picsum.photos/200/300', 'luettgen.judy@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '9T1mAUbyLI', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(81, 'Tyler Braun', 'Zack Pollich', '95053 Predovic Mountain\nKamrontown, MA 11486', NULL, '97933', '+1 (858) 710-3711', 'https://picsum.photos/200/300', 'schulist.aletha@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'FDyEU2CnYl', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(82, 'Marianne Fritsch Sr.', 'Ashlee Goyette', '20814 Wiza Locks Apt. 659\nNew Denis, NV 83718-3038', NULL, '94728', '+1-949-913-7009', 'https://picsum.photos/200/300', 'mann.kailee@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'zv5IMQ77vE', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(83, 'Keven Jacobi', 'Mr. Abe Senger MD', '23410 Kub Summit Suite 538\nSwaniawskifort, ME 82898', NULL, '99995', '+1-785-220-7622', 'https://picsum.photos/200/300', 'weldon99@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'ynXtFcdVlN', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(84, 'Sterling Farrell', 'Pete Ullrich', '7599 Runolfsdottir Junctions Apt. 752\nNorth Sidborough, NM 90006', NULL, '62397-5777', '+18389789765', 'https://picsum.photos/200/300', 'pking@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'siZS93BHaP', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(85, 'Mr. Wade Collier MD', 'Hailie Nader', '9960 Wolff Knolls\nCreminfort, NV 40233-6444', NULL, '06501-4075', '+16605138641', 'https://picsum.photos/200/300', 'uturcotte@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '1e9dEAyzPq', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(86, 'Gerardo Heller', 'Henry Rutherford', '835 Reilly Harbor Apt. 148\nDevanfurt, WY 54813-7525', NULL, '18351-8520', '929.407.7801', 'https://picsum.photos/200/300', 'hmorar@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'mESkGHYJsA', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(87, 'Prof. Mylene Haag Sr.', 'Brock Lang', '607 D\'Amore Mews\nFeestmouth, NY 78121', NULL, '36004', '(520) 976-8788', 'https://picsum.photos/200/300', 'dixie.price@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'tgh792PMbF', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(88, 'Shaina Carroll I', 'Jesus Howell Jr.', '198 Bashirian Plaza\nJuniorton, MS 20805-8498', NULL, '68506-1475', '1-205-939-9349', 'https://picsum.photos/200/300', 'ycarroll@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'lDGDKTDalX', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(89, 'Eden Goldner', 'Dr. Alf Willms DVM', '982 Devan Loop\nLake Oswaldo, HI 43879-0966', NULL, '57192-1063', '484.913.3579', 'https://picsum.photos/200/300', 'bbogan@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'hIhIu8yX8P', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(90, 'Carey Gottlieb', 'Robin Treutel', '902 Durward Field\nWest Vicente, WI 37078', NULL, '06032-8528', '803-383-9944', 'https://picsum.photos/200/300', 'shanna68@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'YRzeBUeYRf', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(91, 'Gabrielle Rodriguez', 'Mrs. Brandy Barrows III', '9841 Kemmer Mountain Apt. 459\nPort Jacebury, AL 60948-2192', NULL, '22718-9926', '442.296.7162', 'https://picsum.photos/200/300', 'gerhold.velda@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'nUtwCjZAmU', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(92, 'Miss Loraine Cruickshank I', 'Melany Jaskolski', '6486 Donnelly Junction\nHeidenreichhaven, SC 03787', NULL, '53214-7827', '+1-336-244-3148', 'https://picsum.photos/200/300', 'santa67@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'b7uLvyRsCG', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(93, 'Hailie Orn', 'Mr. Charley Jast Jr.', '60616 Swift Falls\nWest Faytown, OR 57524-5248', NULL, '22005', '+13464905697', 'https://picsum.photos/200/300', 'kuhn.alphonso@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'Wefwa0369K', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(94, 'Prof. Bulah Cole', 'Brandt Kilback', '7567 Jamey Landing\nConnmouth, WA 64086-7105', NULL, '65219-2801', '+1.740.521.9548', 'https://picsum.photos/200/300', 'purdy.jettie@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '7hw81KxFOk', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(95, 'Dr. Russ Considine', 'Eryn D\'Amore', '87228 Tristin Shores\nKatlynnton, NC 41117', NULL, '34885-8803', '820-759-7379', 'https://picsum.photos/200/300', 'gabe.rolfson@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'XRWBlc6Rb1', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(96, 'Dina Schimmel', 'Mrs. Alva Feil II', '98013 Minerva Walks Apt. 766\nPourosmouth, CA 82584-5042', NULL, '30998', '1-785-799-5469', 'https://picsum.photos/200/300', 'reilly.santiago@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'XqANen2DlV', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(97, 'Destany Durgan I', 'Armani Auer I', '655 Kilback Course\nNorth Jakayla, NC 48774-7194', NULL, '29764-3964', '(281) 795-7593', 'https://picsum.photos/200/300', 'nova83@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'A63ZroDVak', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(98, 'Mariah Schumm', 'Mr. Lucas Jakubowski DDS', '1305 Reginald Islands Suite 046\nOvaburgh, WI 85208-9888', NULL, '93335', '(435) 331-3078', 'https://picsum.photos/200/300', 'samir.rowe@example.com', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'P3kiebNy83', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(99, 'Reginald McKenzie MD', 'Prof. Davin Kunze DDS', '20128 Brayan Islands\nSouth Damienstad, GA 10545-0411', NULL, '88648', '(360) 603-8796', 'https://picsum.photos/200/300', 'flatley.erin@example.net', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, 'tCjNmepc8s', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(100, 'Arden Beer', 'Joany Pouros IV', '710 Marvin Springs\nSatterfieldport, KS 79847-7055', NULL, '19568', '+1.425.238.4487', 'https://picsum.photos/200/300', 'nolson@example.org', '1', '0', NULL, '2023-05-29 05:39:14', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '3qNyC04tZk', '2023-05-29 05:39:14', '2023-05-29 05:39:14', '0.00', '0.00'),
(101, 'Syed Mushahid Kazmi', NULL, NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AAcHTtdg7xdTM5dAsu6EC4NWSbDrAgwhPbjTz5Cpt8KY=s96-c', 'syedmk600@gmail.com', '1', '0', NULL, '2023-05-29 05:49:52', NULL, NULL, NULL, '117757186895610940060', '2023-07-11 13:58:07', 'BnTuAG6RD0cuMD68Hy5DZ9wUum7tOQOeK1tOYdhymQCfbmwsGKfC2BJKQBdl', '2023-05-29 05:49:52', '2023-07-11 08:58:07', '50611.00', '3875.00'),
(102, 'Talha', 'Khizar', NULL, NULL, NULL, '03475411533', '/storage/profile_photos/default_profile_photo.jpg', 'talhakhizar5@gmail.com', '1', '0', NULL, '2023-05-29 06:08:16', '2023-05-29 06:07:44', NULL, '$2y$10$Pyiz25lpfiYEoxLt7zuZQOweXrbhaqCVyITPwYAsqK3/ldzhLySGu', NULL, '2023-05-29 11:31:21', NULL, '2023-05-29 06:07:44', '2023-05-29 07:17:40', '45925.00', '0.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_phone_id_foreign` (`phone_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_phone_id_foreign` (`phone_id`);

--
-- Indexes for table `inspection`
--
ALTER TABLE `inspection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inspection_phone_id_foreign` (`phone_id`),
  ADD KEY `inspection_inspected_by_foreign` (`inspected_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_methods_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phones_user_id_foreign` (`user_id`),
  ADD KEY `phones_brand_foreign` (`brand`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchased_phones`
--
ALTER TABLE `purchased_phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchased_phones_user_id_foreign` (`user_id`),
  ADD KEY `purchased_phones_phone_id_foreign` (`phone_id`),
  ADD KEY `purchased_phones_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returns_user_id_foreign` (`user_id`),
  ADD KEY `returns_phone_id_foreign` (`phone_id`);

--
-- Indexes for table `return_completed`
--
ALTER TABLE `return_completed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_completed_user_id_foreign` (`user_id`),
  ADD KEY `return_completed_phone_id_foreign` (`phone_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permision`
--
ALTER TABLE `roles_permision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_permision_roles_id_foreign` (`roles_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_action_by_foreign` (`action_by`),
  ADD KEY `transactions_purchase_id_foreign` (`purchase_id`),
  ADD KEY `transactions_phone_id_foreign` (`phone_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inspection`
--
ALTER TABLE `inspection`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchased_phones`
--
ALTER TABLE `purchased_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `return_completed`
--
ALTER TABLE `return_completed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles_permision`
--
ALTER TABLE `roles_permision`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `inspection_inspected_by_foreign` FOREIGN KEY (`inspected_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `inspection_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_brand_foreign` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `phones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchased_phones`
--
ALTER TABLE `purchased_phones`
  ADD CONSTRAINT `purchased_phones_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`),
  ADD CONSTRAINT `purchased_phones_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_phones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`),
  ADD CONSTRAINT `returns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `return_completed`
--
ALTER TABLE `return_completed`
  ADD CONSTRAINT `return_completed_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`),
  ADD CONSTRAINT `return_completed_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `roles_permision`
--
ALTER TABLE `roles_permision`
  ADD CONSTRAINT `roles_permision_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_action_by_foreign` FOREIGN KEY (`action_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `transactions_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`),
  ADD CONSTRAINT `transactions_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
