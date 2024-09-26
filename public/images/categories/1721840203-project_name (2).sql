-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 09:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_name`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Tarik saf', '1717798855-Layer 4.png', 'd', '2024-06-07 19:20:55', '2024-06-07 19:20:55'),
(2, 'ttt', '1717851025-UI-UX differences-bro.png', 'hbjdffhiofdhcboispjf', '2024-06-08 09:50:25', '2024-06-08 09:50:25'),
(3, 'hhhh', '1717851093-Privacy policy-amico.png', 'kzlnk\\nbz', '2024-06-08 09:51:33', '2024-06-08 09:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`, `image`, `desc`, `created_by`, `created_at`, `updated_at`) VALUES
(19, 'المكملات الغذائية', '91869', '1721027806-4.jpg', NULL, 1, '2024-07-15 04:16:46', '2024-07-15 04:16:46'),
(21, 'المسكنات', '32543', '1721027871-close-up-hand-writing-notebook-top-.png', NULL, 1, '2024-07-15 04:17:51', '2024-07-15 04:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_store` text NOT NULL,
  `store_features` text NOT NULL,
  `store_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `whatsapp_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `homePage_image` varchar(255) DEFAULT NULL,
  `aboutUs_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `about_store`, `store_features`, `store_address`, `phone`, `email`, `facebook_link`, `whatsapp_link`, `instagram_link`, `homePage_image`, `aboutUs_image`, `created_at`, `updated_at`) VALUES
(2, 'الصيدلية الاولى من نوعها في الشمال السوري', 'سرعة في التوصيل', 'الباب/ الجامع الكبير', '3246785643542', 'rgf@frs.s', 'https://werg.sf', 'https://werg.sf', 'https://werg.sf', '1716925672-Privacy policy-amico.png', '1716925672-Privacy policy-amico.png', NULL, '2024-07-12 11:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '0001_01_01_000000_create_users_table', 1),
(20, '0001_01_01_000001_create_cache_table', 1),
(21, '0001_01_01_000002_create_jobs_table', 1),
(22, '2024_05_27_214621_create_categories_table', 1),
(23, '2024_05_27_214641_create_brands_table', 1),
(24, '2024_05_27_214658_create_products_table', 1),
(25, '2024_06_08_120135_create_patient_follow_up_schedules_table', 2),
(31, '2024_06_10_211956_create_personal_access_tokens_table', 3),
(32, '2024_06_25_123556_create_prescriptions_table', 4),
(33, '2024_07_08_195132_create_contents_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_follow_up_schedules`
--

CREATE TABLE `patient_follow_up_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `measurement` varchar(255) NOT NULL,
  `action_taken` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_follow_up_schedules`
--

INSERT INTO `patient_follow_up_schedules` (`id`, `user_id`, `date`, `measurement`, `action_taken`, `notes`, `created_at`, `updated_at`) VALUES
(3, 2, '2024-06-08', '45', 'test', 'test', '2024-06-08 10:06:30', '2024-06-08 10:06:30'),
(4, 2, '2024-06-11', '45', 'tall', 'this is the firs schedule', '2024-06-10 17:22:40', '2024-06-10 17:22:40'),
(5, 2, '2024-06-21', '14', 'الحالة سليمة', 'لا يحتاج الى اجراءات', '2024-06-21 16:35:05', '2024-06-21 16:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `drug_image` varchar(255) DEFAULT NULL,
  `drug_description` text NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `offer` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `scientific_name` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount_price`, `image`, `short_description`, `long_description`, `in_stock`, `offer`, `featured`, `scientific_name`, `manufacturer`, `category_id`, `brand_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'آر-جين متمم غذائي', 0.00, NULL, 'A002.png', 'متمم غذائي', 'يحفز تحرير هرمون النمو ويحافظ على مستوى الكوليستيرول طبيعي في الجسم ويدعم الجهاز القلبي الوعائي\nتحتوي العلبة على 30 كبسولة ', 0, 1, 0, 'كل كبسولة تحوي على:\nأرجينين هيدروكلوريد 602 ملغ\nبما يعادل أرجينين 500 ملغ', NULL, 19, 1, NULL, NULL, NULL),
(2, 'زنكو بلس', 1.50, 1.38, 'A003.png', 'فيتامين c + زنك', 'فيامين سي منشط للجسم', 0, 1, 0, 'كل كبسولة تحوي على:\nحمض الاسكوربيك (فيتامين سي) 400 ملغ\nزنك (كسلفات الزنك) 50 ملغ', NULL, 19, 1, NULL, NULL, NULL),
(3, 'فيتامين سي فوار', 1.40, 1.10, 'A004.png', 'أقراص فوار فيتامين سي', 'منشط للجسم', 0, 1, 0, 'كل قرص فيتامين سي فوار يحوي على\nفيتامين سي  1000 ملغ', NULL, 19, 1, NULL, NULL, NULL),
(4, 'باراسيتامول حب 1000', 0.75, 0.60, 'A005.png', 'خافض حرارة ومسكن للآلام', 'مسكن فعال للآلام يستعمل للتسكين', 0, 1, 0, 'كل مضغوطة تحتوي على:\nباراسيتامول 1000ملغ', NULL, 21, 1, NULL, NULL, NULL),
(5, 'سوبرافين حب 400 ملغ', 1.10, 0.90, 'A006.png', 'مسكن للآلام', 'مسكن فعال للآلام يستعمل للتسكين', 0, 1, 0, 'كل مضغوطة تحتوي على: \nإيبروفين  400 ملغ', NULL, 21, 1, NULL, NULL, NULL),
(6, 'بروفيو حب 400', 0.75, 0.60, 'A007.png', 'مسكن للآلام', 'مسكن فعال للآلام يستعمل للتسكين', 0, 1, 0, 'كل مضغوطة تحتوي على: \nإيبروفين  400 ملغ', NULL, 21, 1, NULL, NULL, NULL),
(7, 'بروفيو حب 600', 0.75, 0.60, 'A008.png', 'مسكن للآلام', 'مسكن فعال للآلام يستعمل للتسكين', 0, 1, 0, 'كل مضغوطة تحتوي على: \nإيبروفين  600 ملغ', NULL, 21, 1, NULL, NULL, NULL),
(8, 'سيتامول ريفا حب 1000', 0.75, 0.60, 'A009.png', 'مسكن للآلام', 'مسكن فعال للآلام يستعمل لتسكين آلام الرأس', 0, 1, 0, 'كل مضغوطة تحتوي على:\nباراسيتامول 1000ملغ', NULL, 21, 1, NULL, NULL, NULL),
(9, 'بانادول حب', 0.75, 0.60, 'A010.png', 'مسكن للآلام', 'مسكن فعال للآلام يستعمل لتسكين آلام الرأس', 0, 1, 0, 'كل مضغوطة تحتوي على:\nباراسيتامول 500 ملغ', NULL, 21, 1, NULL, NULL, NULL),
(10, 'بانيدول اكسترا حب', 0.75, 0.60, 'A011.PNG', 'مسكن للآلام', 'مسكن فعال للآلام يستعمل لتسكين آلام الرأس', 0, 1, 0, 'كل مضغوطة تحتوي على:\nباراسيتامول 500 ملغ\nكافئين  65 ملغ', NULL, 21, 1, NULL, NULL, NULL),
(11, 'ريليف حب', 0.25, 0.15, 'A012.png', 'مسكن للآلام', 'مسكن فعال للآلام يستعمل لتسكين آلام الرأس', 0, 1, 0, 'كل مضغوطة تحتوي على:\nباراسيتامول  325 ملغ\nديكلوفينات الصوديوم  50 ملغ\nمنغنيزيوم 100 ملغ\nكلورفينارمين  4 ملغ', NULL, 21, 1, NULL, NULL, NULL),
(12, 'سيتامول حب 500', 0.25, 0.15, 'A001.png', 'مسكن للآلام', 'تحتوي كل علبة على 10 ظروف (( يمكن طلب أقل من علبة))', 0, 1, 0, 'كل مضغوطة تحتوي على:\nباراسيتامول 500 ملغ', NULL, 21, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0pPmC1HZ4dOdxb8IwkM2OfIz2VnKYDETXMGeJY2o', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUlBMQUJIOERZT2h6RmYxY3VEOUZBbHBaOUs1ckc0NldCZXlPdHlJQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0L2l0ZW0tY291bnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vY29udGVudHMvMS9lZGl0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImNhcnQiO2E6MTp7aTo5O2E6NDp7czo0OiJuYW1lIjtzOjIxOiLYrdin2LXYsdin2Kog2KjZitiq2KciO3M6ODoicXVhbnRpdHkiO2k6MTtzOjU6InByaWNlIjtzOjU6IjU1LjAwIjtzOjU6ImltYWdlIjtzOjExNToiMTcxODkwMTAyOS1NZWRpY2luZSBDbGlwYXJ0IFRyYW5zcGFyZW50IEJhY2tncm91bmQsIE1lZGljaW5lLCBQaWxsLCBDYXBzdWxlLCBEcnVncyBQTkcgSW1hZ2UgRm9yIEZyZWUgRG93bmxvYWQuamZpZiI7fX19', 1720796188),
('QnvqWK2NiQbEie0htLqxtpqrPpkEs8NDaZtMiCf1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidnNOZzNBSEhaRkgwUUNCUWkxYTJnR3N4MzlSUHpwVHNPdVptVE82RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0L2l0ZW0tY291bnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiY2FydCI7YToxOntpOjU7YTo0OntzOjQ6Im5hbWUiO3M6MzI6Itiz2YjYqNix2KfZgdmK2YYg2K3YqCA0MDAg2YXZhNi6IjtzOjg6InF1YW50aXR5IjtpOjE7czo1OiJwcmljZSI7czo0OiIxLjEwIjtzOjU6ImltYWdlIjtzOjg6IkEwMDYucG5nIjt9fX0=', 1721029516);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `usertype`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@example.com', NULL, '$2y$12$6924EMUI12xY88kpaW/UCuubaeoe7Yk2Oh0Eslg21Bg6K13h4ZfGy', NULL, '2024-06-06 20:31:58', '2024-06-06 20:31:58'),
(2, 'user', 'user', 'user@example.com', NULL, '$2y$12$TEJaGRt5K2esfPj4Fno3nekognof0apEy5YfsgfcrEnq2K1wlgW6K', NULL, '2024-06-08 09:38:15', '2024-06-08 09:38:15'),
(3, 'احمد', 'user', 'fd@gmail.com', NULL, '$2y$12$RVAvERTpnEK3pNRQS.Kw4.FqenTsAYxIgXj.1EpPZhNzFJDIB4Hn6', NULL, '2024-06-21 16:36:11', '2024-06-21 16:36:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_code_unique` (`code`),
  ADD KEY `categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient_follow_up_schedules`
--
ALTER TABLE `patient_follow_up_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_follow_up_schedules_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `patient_follow_up_schedules`
--
ALTER TABLE `patient_follow_up_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_follow_up_schedules`
--
ALTER TABLE `patient_follow_up_schedules`
  ADD CONSTRAINT `patient_follow_up_schedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
