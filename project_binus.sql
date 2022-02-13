-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `account_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `gender_id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_flag` int(11) DEFAULT NULL,
  `modified_at` date DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `accounts` (`account_id`, `role_id`, `gender_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `display_picture`, `deleted_flag`, `modified_at`, `modified_by`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'Syahrizal a',	'izal aja',	'as',	'al@gmail.com',	'$2y$10$NqFnibZ/fkUAo8GN6G2wJe1GRp/bzO0t.Ms2e3U1.vloEM0b0vOlm',	'assets/display_picture/Habbuhrxiqdm3UkKfYeV5tqYg75Nx0JY55HczWCy.jpg',	NULL,	NULL,	'1',	'2022-02-12 11:57:17',	'2022-02-12 23:56:20'),
(3,	2,	1,	'testing',	NULL,	'Alisadikin',	'alisadikinsyahrizal@gmail.com',	'$2y$10$4p.rWzF/lAopxRXnnpZn4uukE/rAC6RV3ljB6ZOxea8xEFH9WyooS',	'assets/display_picture/IGpoWJpa9ZZT15he2YHViZpMdzekyUAchZcF4s1o.jpg',	NULL,	NULL,	NULL,	'2022-02-13 00:03:05',	'2022-02-13 00:15:42'),
(4,	1,	1,	'testing',	NULL,	'aja',	'test@gmail.com',	'$2y$10$3DnAXZdvbii1cRIj66ub9OzjYRXG9xXP5CM4E.8zZfpZLrVKz91P2',	'assets/display_picture/sMR48y3wAOgP3VCRDADoVu9eW0gvuqi4CNgQG54R.jpg',	NULL,	NULL,	NULL,	'2022-02-13 00:05:16',	'2022-02-13 00:05:16');

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `cart_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ebook_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`cart_id`, `ebook_id`, `account_id`, `created_at`, `updated_at`) VALUES
(11,	2,	3,	'2022-02-13 00:14:13',	'2022-02-13 00:14:13');

DROP TABLE IF EXISTS `e_books`;
CREATE TABLE `e_books` (
  `ebook_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ebook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `e_books` (`ebook_id`, `title`, `author`, `description`, `created_at`, `updated_at`) VALUES
(1,	'novel',	'author 1',	'menilis',	NULL,	NULL),
(2,	'pemograman',	'author 2',	'pemograman dasar',	NULL,	NULL);

DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders` (
  `gender_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_desc` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `genders` (`gender_id`, `role_desc`, `created_at`, `updated_at`) VALUES
(1,	'Male',	NULL,	NULL),
(2,	'Female',	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(2,	'2022_02_12_164451_create_e_books_table',	1),
(5,	'2022_02_12_164559_create_roles_table',	1),
(6,	'2022_02_12_164612_create_genders_table',	1),
(7,	'2022_02_12_164544_create_accounts_table',	2),
(8,	'2022_02_13_021423_create_carts_table',	3),
(9,	'2022_02_12_164520_create_orders_table',	4);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `ebook_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`order_id`, `account_id`, `ebook_id`, `order_date`, `created_at`, `updated_at`) VALUES
(8,	1,	2,	'2022-02-13',	'2022-02-12 21:01:22',	'2022-02-12 21:01:22'),
(9,	1,	1,	'2022-02-13',	'2022-02-12 21:01:22',	'2022-02-12 21:01:22'),
(10,	1,	2,	'2022-02-13',	'2022-02-12 21:02:44',	'2022-02-12 21:02:44'),
(11,	1,	2,	'2022-02-13',	'2022-02-12 21:03:39',	'2022-02-12 21:03:39'),
(12,	1,	2,	'2022-02-13',	'2022-02-12 23:54:51',	'2022-02-12 23:54:51');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_desc` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`role_id`, `role_desc`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	NULL,	NULL),
(2,	'User',	NULL,	NULL);

-- 2022-02-13 07:22:09
