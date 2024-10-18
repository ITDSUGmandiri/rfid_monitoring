-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2024 pada 05.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tapemanagement`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'Admin', 'Superadmin Group'),
(2, 'Public', 'Public Group'),
(3, 'Default', 'Default Access Group'),
(4, 'Member', 'Member Access Group'),
(5, 'Admin', 'Superadmin Group'),
(6, 'Public', 'Public Group'),
(7, 'Default', 'Default Access Group'),
(8, 'Member', 'Member Access Group'),
(9, 'Admin', 'Superadmin Group'),
(10, 'Public', 'Public Group'),
(11, 'Default', 'Default Access Group'),
(12, 'Member', 'Member Access Group'),
(13, 'Admin', 'Superadmin Group'),
(14, 'Public', 'Public Group'),
(15, 'Default', 'Default Access Group'),
(16, 'Member', 'Member Access Group');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `aauth_perms`
--

INSERT INTO `aauth_perms` (`id`, `name`, `definition`) VALUES
(1, 'menu_dashboard', NULL),
(2, 'menu_crud_builder', NULL),
(3, 'menu_api_builder', NULL),
(4, 'menu_page_builder', NULL),
(5, 'menu_form_builder', NULL),
(6, 'menu_menu', NULL),
(7, 'menu_auth', NULL),
(8, 'menu_user', NULL),
(9, 'menu_group', NULL),
(10, 'menu_access', NULL),
(11, 'menu_permission', NULL),
(12, 'menu_api_documentation', NULL),
(13, 'menu_web_documentation', NULL),
(14, 'menu_settings', NULL),
(15, 'user_list', NULL),
(16, 'user_update_status', NULL),
(17, 'user_export', NULL),
(18, 'user_add', NULL),
(19, 'user_update', NULL),
(20, 'user_update_profile', NULL),
(21, 'user_update_password', NULL),
(22, 'user_profile', NULL),
(23, 'user_view', NULL),
(24, 'user_delete', NULL),
(25, 'blog_list', NULL),
(26, 'blog_export', NULL),
(27, 'blog_add', NULL),
(28, 'blog_update', NULL),
(29, 'blog_view', NULL),
(30, 'blog_delete', NULL),
(31, 'form_list', NULL),
(32, 'form_export', NULL),
(33, 'form_add', NULL),
(34, 'form_update', NULL),
(35, 'form_view', NULL),
(36, 'form_manage', NULL),
(37, 'form_delete', NULL),
(38, 'crud_list', NULL),
(39, 'crud_export', NULL),
(40, 'crud_add', NULL),
(41, 'crud_update', NULL),
(42, 'crud_view', NULL),
(43, 'crud_delete', NULL),
(44, 'rest_list', NULL),
(45, 'rest_export', NULL),
(46, 'rest_add', NULL),
(47, 'rest_update', NULL),
(48, 'rest_view', NULL),
(49, 'rest_delete', NULL),
(50, 'group_list', NULL),
(51, 'group_export', NULL),
(52, 'group_add', NULL),
(53, 'group_update', NULL),
(54, 'group_view', NULL),
(55, 'group_delete', NULL),
(56, 'permission_list', NULL),
(57, 'permission_export', NULL),
(58, 'permission_add', NULL),
(59, 'permission_update', NULL),
(60, 'permission_view', NULL),
(61, 'permission_delete', NULL),
(62, 'access_list', NULL),
(63, 'access_add', NULL),
(64, 'access_update', NULL),
(65, 'menu_list', NULL),
(66, 'menu_add', NULL),
(67, 'menu_update', NULL),
(68, 'menu_delete', NULL),
(69, 'menu_save_ordering', NULL),
(70, 'menu_type_add', NULL),
(71, 'page_list', NULL),
(72, 'page_export', NULL),
(73, 'page_add', NULL),
(74, 'page_update', NULL),
(75, 'page_view', NULL),
(76, 'page_delete', NULL),
(77, 'blog_list', NULL),
(78, 'blog_export', NULL),
(79, 'blog_add', NULL),
(80, 'blog_update', NULL),
(81, 'blog_view', NULL),
(82, 'blog_delete', NULL),
(83, 'setting', NULL),
(84, 'setting_update', NULL),
(85, 'dashboard', NULL),
(86, 'extension_list', NULL),
(87, 'extension_activate', NULL),
(88, 'extension_deactivate', NULL),
(89, 'chat_list', ''),
(95, 'database_list', ''),
(96, 'database_view', ''),
(97, 'database_update', ''),
(98, 'database_add', ''),
(99, 'tag_building_add', ''),
(100, 'tag_building_update', ''),
(101, 'tag_building_view', ''),
(102, 'tag_building_delete', ''),
(103, 'tag_building_list', ''),
(104, 'tag_librarian_add', ''),
(105, 'tag_librarian_update', ''),
(106, 'tag_librarian_view', ''),
(107, 'tag_librarian_delete', ''),
(108, 'tag_librarian_list', ''),
(109, 'tag_librarian_export', ''),
(110, 'menu_building', ''),
(111, 'menu_librarian', ''),
(112, 'tag_rfid_add', ''),
(113, 'tag_rfid_update', ''),
(114, 'tag_rfid_view', ''),
(115, 'tag_rfid_delete', ''),
(116, 'tag_rfid_list', ''),
(117, 'tag_reader_add', ''),
(118, 'tag_reader_update', ''),
(119, 'tag_reader_view', ''),
(120, 'tag_reader_delete', ''),
(121, 'tag_reader_list', ''),
(122, 'menu_reader', ''),
(128, 'keys_list', ''),
(129, 'rest_edit', ''),
(145, 'api_tag_reader_all', ''),
(146, 'api_tag_reader_detail', ''),
(147, 'api_tag_reader_add', ''),
(148, 'api_tag_reader_update', ''),
(149, 'api_tag_reader_delete', ''),
(150, 'tag_location_add', ''),
(151, 'tag_location_update', ''),
(152, 'tag_location_view', ''),
(153, 'tag_location_delete', ''),
(154, 'tag_location_list', ''),
(155, 'tag_label_add', ''),
(156, 'tag_label_update', ''),
(157, 'tag_label_view', ''),
(158, 'tag_label_delete', ''),
(159, 'tag_label_list', ''),
(160, 'menu_label', ''),
(161, 'menu_master_data', ''),
(162, 'menu_rfid_status', ''),
(163, 'tag_location_log_add', ''),
(164, 'tag_location_log_update', ''),
(165, 'tag_location_log_view', ''),
(166, 'tag_location_log_delete', ''),
(167, 'tag_location_log_list', ''),
(168, 'menu_location', ''),
(169, 'menu_location_log', ''),
(170, 'menu_rfid_menu', ''),
(171, 'tag_anomaly_add', ''),
(172, 'tag_anomaly_update', ''),
(173, 'tag_anomaly_view', ''),
(174, 'tag_anomaly_delete', ''),
(175, 'tag_anomaly_list', ''),
(176, 'tag_borrow_add', ''),
(177, 'tag_borrow_update', ''),
(178, 'tag_borrow_view', ''),
(179, 'tag_borrow_delete', ''),
(180, 'tag_borrow_list', ''),
(185, 'menu_rfid_broken', ''),
(186, 'menu_rfid_borrow', ''),
(187, 'menu_rfid_anomaly', ''),
(188, 'api_tag_location_all', ''),
(189, 'api_tag_location_detail', ''),
(190, 'api_tag_location_add', ''),
(191, 'api_tag_location_update', ''),
(192, 'api_tag_location_delete', ''),
(193, 'tag_broken_export', ''),
(194, 'tag_broken_add', ''),
(195, 'tag_broken_view', ''),
(196, 'tag_broken_delete', ''),
(197, 'tag_broken_list', ''),
(198, 'tag_location_log_export', ''),
(199, 'tag_anomaly_export', ''),
(200, 'tag_location_export', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `aauth_perm_to_group`
--

INSERT INTO `aauth_perm_to_group` (`perm_id`, `group_id`) VALUES
(186, 0),
(185, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `receiver_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` text DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user`
--

CREATE TABLE `aauth_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `oauth_uid` text DEFAULT NULL,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `banned` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `top_secret` varchar(16) DEFAULT NULL,
  `ip_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `pass`, `username`, `full_name`, `avatar`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `top_secret`, `ip_address`) VALUES
(1, 'fatahillah.reza@gmail.com', NULL, NULL, '0098f77459b6d78055fb8a02879ea004f1a49f18468a6ddc69a9c57327b957f4', 'fatahillahreza', 'fatahillahreza', '20240524133838-8198-1694609670.png', 0, '2024-09-02 10:46:13', '2024-07-19 16:38:31', '2024-05-21 05:44:44', NULL, NULL, NULL, NULL, NULL, '192.168.3.244');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `tags` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewers` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `content`, `image`, `tags`, `category`, `status`, `author`, `viewers`, `created_at`, `updated_at`) VALUES
(1, 'Hello Wellcome To Cicool Builder', 'Hello-Wellcome-To-Ciool-Builder', 'greetings from our team I hope to be happy! ', 'wellcome.jpg', 'greetings', '1', 'publish', 'admin', 0, '2024-05-21 05:44:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_category`
--

CREATE TABLE `blog_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Technology', ''),
(2, 'Lifestyle', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) UNSIGNED NOT NULL,
  `captcha_time` int(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_options`
--

CREATE TABLE `cc_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `cc_options`
--

INSERT INTO `cc_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'favicon', 'default.png'),
(2, 'site_name', 'Tape Management'),
(3, 'timezone', 'Asia/Bangkok'),
(4, 'chat_fb_url', ''),
(5, 'enable_disqus', NULL),
(6, 'disqus_id', ''),
(7, 'enable_crud_builder', NULL),
(8, 'enable_api_builder', NULL),
(9, 'enable_form_builder', NULL),
(10, 'enable_page_builder', NULL),
(11, 'limit_pagination', '10'),
(12, 'site_description', ''),
(13, 'keywords', ''),
(14, 'author', 'Reza Fatahillah'),
(15, 'logo', '20240526205128-2024-05-26setting205122.jpeg'),
(16, 'active_theme', 'cicool'),
(17, 'landing_page_id', 'login'),
(18, 'email', 'fatahillah.reza@gmail.com'),
(19, 'google_id', ''),
(20, 'google_secret', ''),
(21, 'chat_fb_key', '8ae6728ddb0695aef98e7ef9e9f418be');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cc_session`
--

CREATE TABLE `cc_session` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) UNSIGNED NOT NULL,
  `chat_uid` varchar(100) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_contact`
--

CREATE TABLE `chat_contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int(11) UNSIGNED NOT NULL,
  `message_user_id` int(11) NOT NULL,
  `chat_id` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_modal` varchar(20) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `sort_by` varchar(50) DEFAULT NULL,
  `sort_field` varchar(255) DEFAULT NULL,
  `javascript` text DEFAULT NULL,
  `style` text DEFAULT NULL,
  `javascript_setting_detail` text DEFAULT NULL,
  `javascript_setting_update` text DEFAULT NULL,
  `javascript_setting_create` text DEFAULT NULL,
  `javascript_setting_list` text DEFAULT NULL,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `crud`
--

INSERT INTO `crud` (`id`, `crud_modal`, `title`, `subject`, `table_name`, `sort_by`, `sort_field`, `javascript`, `style`, `javascript_setting_detail`, `javascript_setting_update`, `javascript_setting_create`, `javascript_setting_list`, `primary_key`, `page_read`, `page_create`, `page_update`) VALUES
(2, '', 'Building', 'Building', 'tag_building', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'building_id', 'yes', 'yes', 'yes'),
(3, '', 'Librarian', 'Librarian', 'tag_librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'librarian_id', 'yes', 'yes', 'yes'),
(4, '', 'RFID', 'RFID', 'tag_rfid', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'rfid_id', 'yes', 'yes', 'yes'),
(5, '', 'Reader', 'Reader', 'tag_reader', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'reader_id', 'yes', 'yes', 'yes'),
(6, '', 'Location', 'Location', 'tag_location', 'desc', 'location_updated', NULL, NULL, NULL, NULL, NULL, NULL, 'location_id', 'yes', 'yes', 'yes'),
(7, '', 'Label', 'Label', 'tag_label', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'label_id', 'yes', 'yes', 'yes'),
(8, '', 'Location Log', 'Location Log', 'tag_location_log', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'log_id', 'yes', 'yes', 'yes'),
(9, '', 'Anomaly', 'Anomaly', 'tag_anomaly', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'anomaly_id', 'yes', 'yes', 'yes'),
(10, '', 'Borrow', 'Borrow', 'tag_borrow', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'borrow_id', 'yes', 'yes', 'yes'),
(12, '', 'Broken', 'Broken', 'tag_broken', 'desc', 'broken_created', NULL, NULL, NULL, NULL, NULL, NULL, 'broken_id', 'yes', 'yes', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_action`
--

CREATE TABLE `crud_action` (
  `id` int(11) UNSIGNED NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `action` varchar(200) NOT NULL,
  `meta` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `crud_custom_option`
--

INSERT INTO `crud_custom_option` (`id`, `crud_field_id`, `crud_id`, `option_value`, `option_label`) VALUES
(129, 137, 5, 'tcp', 'tcp'),
(130, 137, 5, 'serial', 'serial'),
(131, 140, 5, '/dev/cu.usbserial-1410', '/dev/cu.usbserial-1410'),
(132, 140, 5, '/dev/cu.usbserial-1420', '/dev/cu.usbserial-1420'),
(133, 140, 5, 'COM1', 'COM1'),
(134, 140, 5, 'COM2', 'COM2'),
(135, 140, 5, 'COM3', 'COM3'),
(136, 140, 5, 'COM4', 'COM4'),
(137, 140, 5, 'COM5', 'COM5'),
(138, 140, 5, 'COM6', 'COM6'),
(139, 140, 5, 'COM7', 'COM7'),
(140, 140, 5, 'COM8', 'COM8'),
(141, 140, 5, 'COM9', 'COM9'),
(142, 140, 5, 'COM10', 'COM10'),
(143, 141, 5, '9600', '9600'),
(144, 141, 5, '19200', '19200'),
(145, 141, 5, '38400', '38400'),
(146, 141, 5, '57600', '57600'),
(147, 141, 5, '115200', '115200'),
(148, 142, 5, '1', '1 Dbi'),
(149, 142, 5, '2', '2 Dbi'),
(150, 142, 5, '3', '3 Dbi'),
(151, 142, 5, '25', '25 Dbi'),
(152, 143, 5, '10', '10'),
(153, 143, 5, '100', '100'),
(154, 143, 5, '1000', '1000'),
(155, 143, 5, '2000', '2000'),
(156, 143, 5, '5000', '5000'),
(157, 143, 5, '10000', '10000'),
(158, 143, 5, '15000', '15000'),
(159, 144, 5, 'answer', 'Answer'),
(160, 144, 5, 'active', 'Active'),
(175, 193, 3, 'true', 'true'),
(176, 193, 3, 'false', 'false'),
(187, 258, 4, 'yes', 'Yes'),
(188, 258, 4, 'no', 'No'),
(203, 370, 6, 'TERSEDIA', 'TERSEDIA'),
(204, 370, 6, 'PINJAM', 'PINJAM'),
(205, 370, 6, 'KERUSAKAN', 'KERUSAKAN'),
(206, 391, 8, 'AVAILABLE', 'AVAILABLE'),
(207, 391, 8, 'PINJAM', 'PINJAM'),
(208, 391, 8, 'KEMBALI', 'KEMBALI'),
(209, 391, 8, 'KERUSAKAN', 'KERUSAKAN'),
(210, 401, 10, 'PENDING', 'PENDING'),
(211, 401, 10, 'SUCCESS', 'SUCCESS'),
(212, 410, 9, 'not', 'not'),
(213, 410, 9, 'done', 'done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field`
--

CREATE TABLE `crud_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `help_block` text DEFAULT NULL,
  `placeholder` text DEFAULT NULL,
  `auto_generate_help_block` varchar(40) DEFAULT NULL,
  `wrapper_class` text DEFAULT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `crud_field`
--

INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `help_block`, `placeholder`, `auto_generate_help_block`, `wrapper_class`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(1, 1, 'building_id', 'building_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2, 1, 'building_name', 'Building Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3, 1, 'building_created', 'Building Created', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(58, 2, 'building_id', 'building_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(59, 2, 'building_name', 'Building Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(60, 2, 'building_created', 'Create Date', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 3, '', '', ''),
(61, 2, 'building_createdby', 'Create By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 4, '', '', ''),
(62, 2, 'building_updated', 'Update Date', 'timestamp', '', '', '', NULL, '', 'yes', 'yes', 'yes', 5, '', '', ''),
(63, 2, 'building_updatedby', 'Update By', 'current_user_id', '', '', '', NULL, '', 'yes', 'yes', 'yes', 6, '', '', ''),
(133, 5, 'reader_id', 'reader_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(134, 5, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_librarian', 'librarian_id', 'librarian_name'),
(135, 5, 'reader_name', 'Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(136, 5, 'reader_serialnumber', 'SN', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(137, 5, 'reader_type', 'Type', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(138, 5, 'reader_ip', 'IP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(139, 5, 'reader_port', 'Port', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(140, 5, 'reader_com', 'Com Port', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(141, 5, 'reader_baudrate', 'Baud Rate', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(142, 5, 'reader_power', 'Power', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(143, 5, 'reader_interval', 'Interval', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(144, 5, 'reader_mode', 'Mode', 'custom_select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(145, 5, 'reader_created', 'Created', 'timestamp', '', '', '', NULL, '', 'yes', '', 'yes', 13, '', '', ''),
(146, 5, 'reader_createdby', 'Created By', 'current_user_id', '', '', '', NULL, '', 'yes', '', 'yes', 14, '', '', ''),
(147, 5, 'reader_updated', 'Updated', 'timestamp', '', '', '', NULL, '', 'yes', 'yes', 'yes', 15, '', '', ''),
(148, 5, 'reader_updatedby', 'Updated By', 'current_user_id', '', '', '', NULL, '', 'yes', 'yes', 'yes', 16, '', '', ''),
(164, 7, 'label_id', 'label_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(165, 7, 'label_name', 'Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(166, 7, 'label_description', 'Description', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(167, 7, 'label_image', 'Image', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(168, 7, 'label_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 5, '', '', ''),
(169, 7, 'label_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(170, 7, 'label_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(171, 7, 'label_updatedby', 'Updated By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(189, 3, 'librarian_id', 'librarian_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(190, 3, 'librarian_name', 'Librarian Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(191, 3, 'librarian_gate', 'Librarian Gate', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(192, 3, 'librarian_condition', 'Condition Logic', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(193, 3, 'librarian_aging', 'Librarian Aging', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(194, 3, 'librarian_created', 'Librarian Create', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 6, '', '', ''),
(195, 3, 'librarian_createdby', 'Librarian Create By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(196, 3, 'librarian_updated', 'Librarian Update', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(197, 3, 'librarian_updateby', 'Librarian Update By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(198, 3, 'building_id', 'Building', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, 'tag_building', 'building_id', 'building_name'),
(254, 4, 'rfid_id', 'rfid_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(255, 4, 'label_id', 'Label Tag', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_label', 'label_id', 'label_name'),
(256, 4, 'rfid_barcode', 'Barcode', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(257, 4, 'rfid_rfid', 'RFID', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(258, 4, 'rfid_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(259, 4, 'rfid_note', 'Note', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(260, 4, 'rfid_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 7, '', '', ''),
(261, 4, 'rfid_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 8, '', '', ''),
(262, 4, 'rfid_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(263, 4, 'rfid_updatedby', 'Updated By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 10, '', '', ''),
(334, 11, 'broken_id', 'broken_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(335, 11, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(336, 11, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(337, 11, 'broken_laporan', 'Laporan', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 4, '', '', ''),
(338, 11, 'broken_keterangan', 'Keterangan', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 5, '', '', ''),
(339, 11, 'broken_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(340, 11, 'broken_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 7, '', '', ''),
(367, 6, 'location_id', 'location_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(368, 6, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(369, 6, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(370, 6, 'location_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(371, 6, 'location_aging', 'Aging', 'datetime', '', '', 'yes', NULL, 'yes', '', '', 'yes', 5, '', '', ''),
(372, 6, 'location_created', 'Created', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 6, '', '', ''),
(373, 6, 'location_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(381, 12, 'broken_id', 'broken_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(382, 12, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(383, 12, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(384, 12, 'broken_laporan', 'Tanggal Kerusakan', 'date', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 4, '', '', ''),
(385, 12, 'broken_keterangan', 'Keterangan  Kerusakan', 'textarea', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 5, '', '', ''),
(386, 12, 'broken_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(387, 12, 'broken_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 7, '', '', ''),
(388, 8, 'log_id', 'log_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(389, 8, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(390, 8, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(391, 8, 'log_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 4, '', '', ''),
(392, 8, 'log_created', 'Created', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 5, '', '', ''),
(393, 8, 'log_createdby', 'Created By', 'current_user_username', '', '', '', NULL, 'yes', 'yes', '', 'yes', 6, '', '', ''),
(394, 10, 'borrow_id', 'borrow_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(395, 10, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(396, 10, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(397, 10, 'borrow_keperluan', 'Keperluan', 'input', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 4, '', '', ''),
(398, 10, 'borrow_peminjam', 'Peminjam', 'input', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 5, '', '', ''),
(399, 10, 'borrow_peminjaman', 'Tgl Peminjaman', 'date', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 6, '', '', ''),
(400, 10, 'borrow_pengembalian', 'Tgl Pengembalian', 'date', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 7, '', '', ''),
(401, 10, 'borrow_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(402, 10, 'borrow_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 9, '', '', ''),
(403, 10, 'borrow_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 10, '', '', ''),
(404, 10, 'borrow_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 11, '', '', ''),
(405, 10, 'borrow_updatedby', 'Updated By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 12, '', '', ''),
(406, 9, 'anomaly_id', 'anomaly_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(407, 9, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(408, 9, 'anomaly_right_librarian', 'Right Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(409, 9, 'anomaly_wrong_librarian', 'Wrong Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, 'tag_librarian', 'librarian_id', 'librarian_name'),
(410, 9, 'anomaly_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(411, 9, 'anomaly_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(412, 9, 'anomaly_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(413, 9, 'anomaly_updatedby', 'Updated By', 'current_user_username', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_condition`
--

CREATE TABLE `crud_field_condition` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `reff` text DEFAULT NULL,
  `crud_id` int(11) NOT NULL,
  `cond_field` text DEFAULT NULL,
  `cond_operator` text DEFAULT NULL,
  `cond_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_configuration`
--

CREATE TABLE `crud_field_configuration` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `group_config` varchar(200) NOT NULL,
  `config_name` text NOT NULL,
  `config_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(1, 2, 1, 'required', ''),
(2, 2, 1, 'max_length', '255'),
(3, 3, 1, 'required', ''),
(61, 59, 2, 'required', ''),
(62, 59, 2, 'max_length', '255'),
(156, 134, 5, 'required', ''),
(157, 135, 5, 'required', ''),
(158, 135, 5, 'max_length', '255'),
(159, 136, 5, 'required', ''),
(160, 136, 5, 'max_length', '10'),
(161, 137, 5, 'required', ''),
(162, 138, 5, 'required', ''),
(163, 138, 5, 'max_length', '45'),
(164, 138, 5, 'valid_ip', ''),
(165, 139, 5, 'required', ''),
(166, 139, 5, 'max_length', '7'),
(167, 140, 5, 'required', ''),
(168, 141, 5, 'required', ''),
(169, 142, 5, 'required', ''),
(170, 143, 5, 'required', ''),
(189, 165, 7, 'required', ''),
(190, 165, 7, 'max_length', '255'),
(191, 166, 7, 'required', ''),
(192, 167, 7, 'required', ''),
(212, 190, 3, 'required', ''),
(213, 190, 3, 'max_length', '255'),
(214, 191, 3, 'required', ''),
(215, 191, 3, 'max_length', '10'),
(216, 192, 3, 'required', ''),
(217, 192, 3, 'max_length', '20'),
(218, 193, 3, 'required', ''),
(219, 198, 3, 'required', ''),
(220, 198, 3, 'max_length', '11'),
(285, 255, 4, 'required', ''),
(286, 255, 4, 'max_length', '11'),
(287, 256, 4, 'required', ''),
(288, 256, 4, 'max_length', '48'),
(289, 257, 4, 'required', ''),
(290, 257, 4, 'max_length', '96'),
(291, 258, 4, 'required', ''),
(292, 259, 4, 'required', ''),
(293, 259, 4, 'max_length', '255'),
(344, 335, 11, 'required', ''),
(345, 335, 11, 'max_length', '11'),
(346, 336, 11, 'required', ''),
(347, 336, 11, 'max_length', '11'),
(348, 338, 11, 'required', ''),
(370, 368, 6, 'required', ''),
(371, 368, 6, 'max_length', '11'),
(372, 369, 6, 'required', ''),
(373, 369, 6, 'max_length', '11'),
(374, 370, 6, 'required', ''),
(384, 382, 12, 'required', ''),
(385, 382, 12, 'max_length', '11'),
(386, 383, 12, 'required', ''),
(387, 383, 12, 'max_length', '11'),
(388, 384, 12, 'required', ''),
(389, 385, 12, 'required', ''),
(390, 389, 8, 'required', ''),
(391, 389, 8, 'max_length', '11'),
(392, 390, 8, 'required', ''),
(393, 390, 8, 'max_length', '11'),
(394, 391, 8, 'required', ''),
(395, 395, 10, 'required', ''),
(396, 395, 10, 'max_length', '11'),
(397, 396, 10, 'required', ''),
(398, 396, 10, 'max_length', '11'),
(399, 397, 10, 'required', ''),
(400, 397, 10, 'max_length', '255'),
(401, 398, 10, 'required', ''),
(402, 398, 10, 'max_length', '255'),
(403, 399, 10, 'required', ''),
(404, 400, 10, 'required', ''),
(405, 401, 10, 'required', ''),
(406, 407, 9, 'required', ''),
(407, 407, 9, 'max_length', '11'),
(408, 408, 9, 'required', ''),
(409, 408, 9, 'max_length', '11'),
(410, 409, 9, 'required', ''),
(411, 409, 9, 'max_length', '11'),
(412, 410, 9, 'required', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_function`
--

CREATE TABLE `crud_function` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_chained`
--

CREATE TABLE `crud_input_chained` (
  `id` int(11) UNSIGNED NOT NULL,
  `chain_field` varchar(250) DEFAULT NULL,
  `chain_field_eq` varchar(250) DEFAULT NULL,
  `crud_field_id` int(11) DEFAULT NULL,
  `crud_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `crud_input_type`
--

INSERT INTO `crud_input_type` (`id`, `type`, `relation`, `custom_value`, `validation_group`) VALUES
(1, 'input', '0', 0, 'input'),
(2, 'textarea', '0', 0, 'text'),
(3, 'select', '1', 0, 'select'),
(4, 'editor_wysiwyg', '0', 0, 'editor'),
(5, 'password', '0', 0, 'password'),
(6, 'email', '0', 0, 'email'),
(7, 'address_map', '0', 0, 'address_map'),
(8, 'file', '0', 0, 'file'),
(9, 'file_multiple', '0', 0, 'file_multiple'),
(10, 'datetime', '0', 0, 'datetime'),
(11, 'date', '0', 0, 'date'),
(12, 'timestamp', '0', 0, 'timestamp'),
(13, 'number', '0', 0, 'number'),
(14, 'yes_no', '0', 0, 'yes_no'),
(15, 'time', '0', 0, 'time'),
(16, 'year', '0', 0, 'year'),
(17, 'select_multiple', '1', 0, 'select_multiple'),
(18, 'checkboxes', '1', 0, 'checkboxes'),
(19, 'options', '1', 0, 'options'),
(20, 'true_false', '0', 0, 'true_false'),
(21, 'current_user_username', '0', 0, 'user_username'),
(22, 'current_user_id', '0', 0, 'current_user_id'),
(23, 'custom_option', '0', 1, 'custom_option'),
(24, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(25, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(26, 'custom_select', '0', 1, 'custom_select'),
(27, 'chained', '1', 0, 'chained'),
(28, 'input', '0', 0, 'input'),
(29, 'textarea', '0', 0, 'text'),
(30, 'select', '1', 0, 'select'),
(31, 'editor_wysiwyg', '0', 0, 'editor'),
(32, 'password', '0', 0, 'password'),
(33, 'email', '0', 0, 'email'),
(34, 'address_map', '0', 0, 'address_map'),
(35, 'file', '0', 0, 'file'),
(36, 'file_multiple', '0', 0, 'file_multiple'),
(37, 'datetime', '0', 0, 'datetime'),
(38, 'date', '0', 0, 'date'),
(39, 'timestamp', '0', 0, 'timestamp'),
(40, 'number', '0', 0, 'number'),
(41, 'yes_no', '0', 0, 'yes_no'),
(42, 'time', '0', 0, 'time'),
(43, 'year', '0', 0, 'year'),
(44, 'select_multiple', '1', 0, 'select_multiple'),
(45, 'checkboxes', '1', 0, 'checkboxes'),
(46, 'options', '1', 0, 'options'),
(47, 'true_false', '0', 0, 'true_false'),
(48, 'current_user_username', '0', 0, 'user_username'),
(49, 'current_user_id', '0', 0, 'current_user_id'),
(50, 'custom_option', '0', 1, 'custom_option'),
(51, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(52, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(53, 'custom_select', '0', 1, 'custom_select'),
(54, 'chained', '1', 0, 'chained'),
(55, 'input', '0', 0, 'input'),
(56, 'textarea', '0', 0, 'text'),
(57, 'select', '1', 0, 'select'),
(58, 'editor_wysiwyg', '0', 0, 'editor'),
(59, 'password', '0', 0, 'password'),
(60, 'email', '0', 0, 'email'),
(61, 'address_map', '0', 0, 'address_map'),
(62, 'file', '0', 0, 'file'),
(63, 'file_multiple', '0', 0, 'file_multiple'),
(64, 'datetime', '0', 0, 'datetime'),
(65, 'date', '0', 0, 'date'),
(66, 'timestamp', '0', 0, 'timestamp'),
(67, 'number', '0', 0, 'number'),
(68, 'yes_no', '0', 0, 'yes_no'),
(69, 'time', '0', 0, 'time'),
(70, 'year', '0', 0, 'year'),
(71, 'select_multiple', '1', 0, 'select_multiple'),
(72, 'checkboxes', '1', 0, 'checkboxes'),
(73, 'options', '1', 0, 'options'),
(74, 'true_false', '0', 0, 'true_false'),
(75, 'current_user_username', '0', 0, 'user_username'),
(76, 'current_user_id', '0', 0, 'current_user_id'),
(77, 'custom_option', '0', 1, 'custom_option'),
(78, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(79, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(80, 'custom_select', '0', 1, 'custom_select'),
(81, 'chained', '1', 0, 'chained'),
(82, 'input', '0', 0, 'input'),
(83, 'textarea', '0', 0, 'text'),
(84, 'select', '1', 0, 'select'),
(85, 'editor_wysiwyg', '0', 0, 'editor'),
(86, 'password', '0', 0, 'password'),
(87, 'email', '0', 0, 'email'),
(88, 'address_map', '0', 0, 'address_map'),
(89, 'file', '0', 0, 'file'),
(90, 'file_multiple', '0', 0, 'file_multiple'),
(91, 'datetime', '0', 0, 'datetime'),
(92, 'date', '0', 0, 'date'),
(93, 'timestamp', '0', 0, 'timestamp'),
(94, 'number', '0', 0, 'number'),
(95, 'yes_no', '0', 0, 'yes_no'),
(96, 'time', '0', 0, 'time'),
(97, 'year', '0', 0, 'year'),
(98, 'select_multiple', '1', 0, 'select_multiple'),
(99, 'checkboxes', '1', 0, 'checkboxes'),
(100, 'options', '1', 0, 'options'),
(101, 'true_false', '0', 0, 'true_false'),
(102, 'current_user_username', '0', 0, 'user_username'),
(103, 'current_user_id', '0', 0, 'current_user_id'),
(104, 'custom_option', '0', 1, 'custom_option'),
(105, 'custom_checkbox', '0', 1, 'custom_checkbox'),
(106, 'custom_select_multiple', '0', 1, 'custom_select_multiple'),
(107, 'custom_select', '0', 1, 'custom_select'),
(108, 'chained', '1', 0, 'chained');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud_input_validation`
--

CREATE TABLE `crud_input_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `crud_input_validation`
--

INSERT INTO `crud_input_validation` (`id`, `validation`, `input_able`, `group_input`, `input_placeholder`, `call_back`, `input_validation`) VALUES
(1, 'required', 'no', 'input, file, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes, true_false, address_map, custom_option, custom_checkbox, custom_select_multiple, custom_select, file_multiple, chained', '', '', ''),
(2, 'max_length', 'yes', 'input, number, text, select, password, email, editor, yes_no, time, year, select_multiple, options, checkboxes, address_map', '', '', 'numeric'),
(3, 'min_length', 'yes', 'input, number, text, select, password, email, editor, time, year, select_multiple, address_map', '', '', 'numeric'),
(4, 'valid_email', 'no', 'input, email', '', '', ''),
(5, 'valid_emails', 'no', 'input, email', '', '', ''),
(6, 'regex', 'yes', 'input, number, text, datetime, select, password, email, editor, date, yes_no, time, year, select_multiple, options, checkboxes', '', 'yes', 'callback_valid_regex'),
(7, 'decimal', 'no', 'input, number, text, select', '', '', ''),
(8, 'allowed_extension', 'yes', 'file, file_multiple', 'ex : jpg,png,..', '', 'callback_valid_extension_list'),
(9, 'max_width', 'yes', 'file, file_multiple', '', '', 'numeric'),
(10, 'max_height', 'yes', 'file, file_multiple', '', '', 'numeric'),
(11, 'max_size', 'yes', 'file, file_multiple', '... kb', '', 'numeric'),
(12, 'max_item', 'yes', 'file_multiple', '', '', 'numeric'),
(13, 'valid_url', 'no', 'input, text', '', '', ''),
(14, 'alpha', 'no', 'input, text, select, password, editor, yes_no', '', '', ''),
(15, 'alpha_numeric', 'no', 'input, number, text, select, password, editor', '', '', ''),
(16, 'alpha_numeric_spaces', 'no', 'input, number, text,select, password, editor', '', '', ''),
(17, 'valid_number', 'no', 'input, number, text, password, editor, true_false', '', 'yes', ''),
(18, 'valid_datetime', 'no', 'input, datetime, text', '', 'yes', ''),
(19, 'valid_date', 'no', 'input, datetime, date, text', '', 'yes', ''),
(20, 'valid_max_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(21, 'valid_min_selected_option', 'yes', 'select_multiple, custom_select_multiple, custom_checkbox, checkboxes', '', 'yes', 'numeric'),
(22, 'valid_alpha_numeric_spaces_underscores', 'no', 'input, text,select, password, editor', '', 'yes', ''),
(23, 'matches', 'yes', 'input, number, text, password, email', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(24, 'valid_json', 'no', 'input, text, editor', '', 'yes', ' '),
(25, 'valid_url', 'no', 'input, text, editor', '', 'no', ' '),
(26, 'exact_length', 'yes', 'input, text, number', '0 - 99999*', 'no', 'numeric'),
(27, 'alpha_dash', 'no', 'input, text', '', 'no', ''),
(28, 'integer', 'no', 'input, text, number', '', 'no', ''),
(29, 'differs', 'yes', 'input, text, number, email, password, editor, options, select', 'any field', 'no', 'callback_valid_alpha_numeric_spaces_underscores'),
(30, 'is_natural', 'no', 'input, text, number', '', 'no', ''),
(31, 'is_natural_no_zero', 'no', 'input, text, number', '', 'no', ''),
(32, 'less_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(33, 'less_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(34, 'greater_than', 'yes', 'input, text, number', '', 'no', 'numeric'),
(35, 'greater_than_equal_to', 'yes', 'input, text, number', '', 'no', 'numeric'),
(36, 'in_list', 'yes', 'input, text, number, select, options', '', 'no', 'callback_valid_multiple_value'),
(37, 'valid_ip', 'no', 'input, text', '', 'no', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `dashboard`
--

INSERT INTO `dashboard` (`id`, `title`, `slug`, `created_at`) VALUES
(1, 'Reza', '1-Reza', '2024-05-28 21:45:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_attribute`
--

CREATE TABLE `form_custom_attribute` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `attribute_value` text NOT NULL,
  `attribute_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_custom_option`
--

CREATE TABLE `form_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field`
--

CREATE TABLE `form_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `placeholder` text DEFAULT NULL,
  `show_detail_page` varchar(20) DEFAULT NULL,
  `show_update_form` varchar(20) DEFAULT NULL,
  `show_add_form` varchar(20) DEFAULT NULL,
  `show_column` varchar(20) DEFAULT NULL,
  `auto_generate_help_block` varchar(10) DEFAULT NULL,
  `help_block` text DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_field_validation`
--

CREATE TABLE `form_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `form_field_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, '31F95C96EBC0E56702586B638FB6CCE0', 0, 0, 0, NULL, '2024-05-20 22:44:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `icon_color` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu_type_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `label`, `type`, `icon_color`, `link`, `sort`, `parent`, `icon`, `menu_type_id`, `active`) VALUES
(1, 'MAIN NAVIGATION', 'label', '', '{admin_url}/dashboard', 1, 0, '', 1, 1),
(2, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 2, 0, 'fa-dashboard', 1, 1),
(3, 'CRUD Builder', 'menu', '', '{admin_url}/crud', 15, 0, 'fa-table', 1, 1),
(4, 'API Builder', 'menu', '', '{admin_url}/rest', 20, 0, 'fa-code', 1, 0),
(5, 'Page Builder', 'menu', '', '{admin_url}/page', 16, 0, 'fa-file-o', 1, 0),
(6, 'Form Builder', 'menu', '', '{admin_url}/form', 17, 0, 'fa-newspaper-o', 1, 0),
(7, 'Blog', 'menu', '', '{admin_url}/blog', 18, 0, 'fa-file-text-o', 1, 0),
(8, 'Menu', 'menu', '', '{admin_url}/menu', 19, 0, 'fa-bars', 1, 1),
(9, 'Auth', 'menu', '', '', 21, 0, 'fa-shield', 1, 1),
(10, 'User', 'menu', '', '{admin_url}/user', 22, 9, '', 1, 0),
(11, 'Groups', 'menu', '', '{admin_url}/group', 23, 9, '', 1, 0),
(12, 'Access', 'menu', '', '{admin_url}/access', 24, 9, '', 1, 0),
(13, 'Permission', 'menu', '', '{admin_url}/permission', 25, 9, '', 1, 0),
(14, 'API Keys', 'menu', '', '{admin_url}/keys', 26, 9, '', 1, 1),
(15, 'Extension', 'menu', '', '{admin_url}/extension', 27, 0, 'fa-puzzle-piece', 1, 0),
(16, 'Database', 'menu', '', '{admin_url}/database', 28, 0, 'fa-database', 1, 1),
(17, 'OTHER', 'label', '', '', 29, 0, '', 1, 1),
(18, 'Settings', 'menu', 'text-red', '{admin_url}/setting', 30, 0, 'fa-circle-o', 1, 1),
(19, 'Web Documentation', 'menu', 'text-blue', '{admin_url}/doc/web', 31, 0, 'fa-circle-o', 1, 0),
(20, 'API Documentation', 'menu', 'text-yellow', '{admin_url}/doc/api', 32, 0, 'fa-circle-o', 1, 1),
(21, 'Home', 'menu', '', '/', 1, 0, '', 2, 1),
(22, 'Blog', 'menu', '', 'blog', 4, 0, '', 2, 1),
(23, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 5, 0, '', 2, 1),
(24, 'Building', 'menu', 'default', '{admin_url}/tag_building', 6, 0, 'fa-building', 1, 1),
(25, 'Librarian', 'menu', 'default', '{admin_url}/tag_librarian', 7, 0, 'fa-building', 1, 1),
(26, 'Reader', 'menu', 'default', '{admin_url}/tag_reader', 5, 0, 'fa-signal', 1, 1),
(27, 'Label', 'menu', 'default', '{admin_url}/tag_label', 4, 0, 'fa-barcode', 1, 1),
(28, 'Master Data', 'label', 'default', '#', 3, 0, '', 1, 1),
(29, 'RFID Status', 'label', 'default', '#', 8, 0, '', 1, 1),
(30, 'Location', 'menu', 'default', '{admin_url}/tag_location', 9, 0, 'fa-map-pin', 1, 1),
(31, 'Location Log', 'menu', 'default', '{admin_url}/tag_location_log', 10, 0, 'fa-archive', 1, 1),
(32, 'RFID Menu', 'label', 'default', '#', 11, 0, '', 1, 1),
(33, 'RFID Broken', 'menu', 'default', '{admin_url}/tag_broken', 12, 0, 'fa-barcode', 1, 1),
(34, 'RFID Borrow', NULL, 'default', '{admin_url}/tag_borrow', 13, 0, 'fa-barcode', 1, 1),
(35, 'RFID Anomaly', NULL, 'default', '{admin_url}/tag_anomaly', 14, 0, 'fa-barcode', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id`, `name`, `definition`) VALUES
(1, 'side menu', NULL),
(2, 'top menu', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20230123115357);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification`
--

CREATE TABLE `notification` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `read` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

CREATE TABLE `page` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fresh_content` text NOT NULL,
  `keyword` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `page_block_element`
--

CREATE TABLE `page_block_element` (
  `id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_preview` varchar(200) NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `content_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) UNSIGNED NOT NULL,
  `receipent_custom_query` text DEFAULT NULL,
  `receipent_department` varchar(200) DEFAULT NULL,
  `primary_field` varchar(200) DEFAULT NULL,
  `table` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `repeat_frequency` varchar(200) DEFAULT NULL,
  `receipent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder_condition`
--

CREATE TABLE `reminder_condition` (
  `id` int(11) UNSIGNED NOT NULL,
  `cond_type` varchar(200) DEFAULT NULL,
  `cond_table` varchar(200) DEFAULT NULL,
  `cond_field` varchar(200) NOT NULL,
  `cond_operator` varchar(200) NOT NULL,
  `cond_value` varchar(255) DEFAULT NULL,
  `cond_logic` varchar(20) NOT NULL DEFAULT 'AND',
  `reminder_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder_cron`
--

CREATE TABLE `reminder_cron` (
  `id` int(11) UNSIGNED NOT NULL,
  `reminder_id` int(11) NOT NULL,
  `reff_id` int(11) NOT NULL,
  `reff_table` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `sent_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest`
--

CREATE TABLE `rest` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `x_api_key` varchar(20) DEFAULT NULL,
  `x_token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `rest`
--

INSERT INTO `rest` (`id`, `subject`, `table_name`, `primary_key`, `x_api_key`, `x_token`) VALUES
(5, 'API Reader', 'tag_reader', 'reader_id', 'no', 'yes'),
(6, 'Api Location', 'tag_location', 'location_id', 'no', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field`
--

CREATE TABLE `rest_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_id` int(11) NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_api` varchar(10) DEFAULT NULL,
  `show_update_api` varchar(10) DEFAULT NULL,
  `show_detail_api` varchar(10) DEFAULT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `rest_field`
--

INSERT INTO `rest_field` (`id`, `rest_id`, `field_name`, `field_label`, `input_type`, `show_column`, `show_add_api`, `show_update_api`, `show_detail_api`, `relation_table`, `relation_value`, `relation_label`) VALUES
(142, 5, 'reader_id', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(143, 5, 'librarian_id', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(144, 5, 'reader_name', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(145, 5, 'reader_serialnumber', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(146, 5, 'reader_type', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(147, 5, 'reader_ip', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(148, 5, 'reader_port', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(149, 5, 'reader_com', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(150, 5, 'reader_baudrate', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(151, 5, 'reader_power', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(152, 5, 'reader_interval', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(153, 5, 'reader_mode', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(154, 5, 'reader_updatedby', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(155, 5, 'reader_updated', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(156, 5, 'reader_createdby', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(157, 5, 'reader_created', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(235, 6, 'location_id', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(236, 6, 'rfid_id', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(237, 6, 'librarian_id', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(238, 6, 'location_status', NULL, 'input', 'yes', 'yes', '', 'yes', '', '', ''),
(239, 6, 'location_aging', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(240, 6, 'location_created', NULL, 'timestamp', 'yes', 'yes', '', 'yes', '', '', ''),
(241, 6, 'location_updated', NULL, 'timestamp', 'yes', 'yes', 'yes', 'yes', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_field_validation`
--

CREATE TABLE `rest_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_field_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `rest_field_validation`
--

INSERT INTO `rest_field_validation` (`id`, `rest_field_id`, `rest_id`, `validation_name`, `validation_value`) VALUES
(208, 143, 5, 'required', ''),
(209, 143, 5, 'max_length', '11'),
(210, 144, 5, 'required', ''),
(211, 144, 5, 'max_length', '255'),
(212, 145, 5, 'required', ''),
(213, 145, 5, 'max_length', '10'),
(214, 146, 5, 'required', ''),
(215, 147, 5, 'required', ''),
(216, 147, 5, 'max_length', '45'),
(217, 148, 5, 'required', ''),
(218, 148, 5, 'max_length', '7'),
(219, 149, 5, 'required', ''),
(220, 150, 5, 'required', ''),
(221, 151, 5, 'required', ''),
(222, 151, 5, 'max_length', '2'),
(223, 152, 5, 'required', ''),
(224, 153, 5, 'required', ''),
(225, 154, 5, 'required', ''),
(226, 154, 5, 'max_length', '11'),
(227, 155, 5, 'required', ''),
(228, 156, 5, 'required', ''),
(229, 156, 5, 'max_length', '11'),
(230, 157, 5, 'required', ''),
(285, 236, 6, 'required', ''),
(286, 237, 6, 'required', ''),
(287, 238, 6, 'required', ''),
(288, 239, 6, 'required', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rest_input_type`
--

CREATE TABLE `rest_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `rest_input_type`
--

INSERT INTO `rest_input_type` (`id`, `type`, `relation`, `validation_group`) VALUES
(1, 'input', '0', 'input'),
(2, 'timestamp', '0', 'timestamp'),
(3, 'file', '0', 'file'),
(4, 'select', '1', 'select'),
(5, 'input', '0', 'input'),
(6, 'timestamp', '0', 'timestamp'),
(7, 'file', '0', 'file'),
(8, 'select', '1', 'select'),
(9, 'input', '0', 'input'),
(10, 'timestamp', '0', 'timestamp'),
(11, 'file', '0', 'file'),
(12, 'select', '1', 'select'),
(13, 'input', '0', 'input'),
(14, 'timestamp', '0', 'timestamp'),
(15, 'file', '0', 'file'),
(16, 'select', '1', 'select');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_anomaly`
--

CREATE TABLE `tag_anomaly` (
  `anomaly_id` int(11) NOT NULL,
  `rfid_id` int(11) NOT NULL,
  `rfid_barcode` varchar(48) NOT NULL,
  `anomaly_right_librarian` int(11) NOT NULL,
  `anomaly_wrong_librarian` int(11) NOT NULL,
  `anomaly_status` enum('not','done') NOT NULL DEFAULT 'not',
  `anomaly_created` datetime NOT NULL,
  `anomaly_updated` datetime NOT NULL,
  `anomaly_updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tag_anomaly`
--

INSERT INTO `tag_anomaly` (`anomaly_id`, `rfid_id`, `rfid_barcode`, `anomaly_right_librarian`, `anomaly_wrong_librarian`, `anomaly_status`, `anomaly_created`, `anomaly_updated`, `anomaly_updatedby`) VALUES
(3, 3, '', 1, 3, 'not', '2024-07-16 16:33:17', '2024-07-16 16:33:17', 0),
(4, 2, '', 1, 3, 'not', '2024-07-16 16:33:37', '2024-07-16 16:33:37', 0),
(5, 4, '', 1, 3, 'not', '2024-07-16 16:34:18', '2024-07-16 16:34:18', 0),
(6, 6, '', 1, 3, 'not', '2024-07-16 16:51:57', '2024-07-16 16:51:57', 0),
(7, 1, '', 1, 2, 'not', '2024-07-16 16:52:29', '2024-07-16 16:52:29', 0),
(8, 1, '', 1, 2, 'not', '2024-07-16 16:56:58', '2024-07-16 16:56:58', 0),
(9, 4, '', 1, 3, 'not', '2024-07-16 16:56:59', '2024-07-16 16:56:59', 0),
(10, 5, '', 1, 3, 'not', '2024-07-16 16:57:00', '2024-07-16 16:57:00', 0),
(11, 3, '', 1, 3, 'not', '2024-07-16 16:57:01', '2024-07-16 16:57:01', 0),
(12, 6, '', 1, 3, 'not', '2024-07-16 16:57:03', '2024-07-16 16:57:03', 0),
(13, 1, '', 1, 3, 'not', '2024-07-16 16:57:04', '2024-07-16 16:57:04', 0),
(14, 1, '', 1, 2, 'not', '2024-07-16 16:57:06', '2024-07-16 16:57:06', 0),
(15, 1, '', 1, 3, 'not', '2024-07-16 16:57:12', '2024-07-16 16:57:12', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_borrow`
--

CREATE TABLE `tag_borrow` (
  `borrow_id` int(11) NOT NULL,
  `rfid_id` int(11) DEFAULT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `borrow_keperluan` varchar(255) NOT NULL,
  `borrow_peminjam` varchar(255) NOT NULL,
  `borrow_peminjaman` date DEFAULT NULL,
  `borrow_pengembalian` date DEFAULT NULL,
  `borrow_status` enum('PENDING','SUCCESS') NOT NULL DEFAULT 'PENDING',
  `borrow_created` datetime NOT NULL,
  `borrow_createdby` int(11) NOT NULL,
  `borrow_updated` datetime NOT NULL,
  `borrow_updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_broken`
--

CREATE TABLE `tag_broken` (
  `broken_id` int(11) NOT NULL,
  `rfid_id` int(11) DEFAULT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `broken_laporan` datetime DEFAULT NULL,
  `broken_keterangan` text DEFAULT NULL,
  `broken_created` datetime NOT NULL,
  `broken_createdby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_building`
--

CREATE TABLE `tag_building` (
  `building_id` int(11) NOT NULL,
  `building_name` varchar(255) DEFAULT NULL,
  `building_created` datetime DEFAULT NULL,
  `building_createdby` int(11) NOT NULL,
  `building_updated` datetime NOT NULL,
  `building_updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tag_building`
--

INSERT INTO `tag_building` (`building_id`, `building_name`, `building_created`, `building_createdby`, `building_updated`, `building_updatedby`) VALUES
(1, 'DC0 - LUAR GEDUNG', '2023-10-19 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'DC1 - PLAZA MANDIRI', '2023-10-19 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'DC2 - REMPOA', '2023-10-19 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_label`
--

CREATE TABLE `tag_label` (
  `label_id` int(11) NOT NULL,
  `label_name` varchar(255) DEFAULT NULL,
  `label_description` text DEFAULT NULL,
  `label_image` text DEFAULT NULL,
  `label_created` datetime NOT NULL,
  `label_createdby` int(11) NOT NULL,
  `label_updated` datetime NOT NULL,
  `label_updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tag_label`
--

INSERT INTO `tag_label` (`label_id`, `label_name`, `label_description`, `label_image`, `label_created`, `label_createdby`, `label_updated`, `label_updatedby`) VALUES
(1, 'EL-UHF-E41C-IW UHF RFID', 'EL-UHF-E41C-IW - UHF RFID Sticker Bening yang cocok untuk ditempel di berbagai permukaan. Salah satu kegunaannya untuk ditempel di kaca depan atau lampu mobil. Tidak bisa digunakan jika ditempel di permukaan logam karena akan mengganggu pembacaan sinyal RFID. # Spesifikasi Chip: Impinj Monza 4QT Protocol: ISO/IEC 18000-6C (EPC Class1 Gen2) Frequency: 860 -- 960 MHz Memory EPC: 128 Bits Memory TID: 48 Bits User Memory: 512 Bits Access Password: 32 Bits Kill Password: 32 Bits IC Life: 100,000 Programming Cycles, 10 years data retention Material: PET + Aluminum Operating Temperature: -40? -- 70? C Operating Humidity: 20% to 90% RH Non-condensingEL-UHF-E41C-IW - UHF RFID Sticker Bening yang cocok untuk ditempel di berbagai permukaan. Salah satu kegunaannya untuk ditempel di kaca depan atau lampu mobil. Tidak bisa digunakan jika ditempel di permukaan logam karena akan mengganggu pembacaan sinyal RFID. # Spesifikasi Chip: Impinj Monza 4QT Protocol: ISO/IEC 18000-6C (EPC Class1 Gen2) Frequency: 860 -- 960 MHz Memory EPC: 128 Bits Memory TID: 48 Bits User Memory: 512 Bits Access Password: 32 Bits Kill Password: 32 Bits IC Life: 100,000 Programming Cycles, 10 years data retention Material: PET + Aluminum Operating Temperature: -40? -- 70? C Operating Humidity: 20% to 90% RH Non-condensing', '20240526194321-2024-05-26tag_label194317.jpeg', '0000-00-00 00:00:00', 0, '2024-05-26 19:43:21', 1),
(2, 'EL-UHF-MT05 Anti Metal', 'UHF RFID Tag yang cocok untuk ditempel di benda logam. Desain antenna lebih baik dibanding UHF Metal Tag yang sebelumnya dijual sehingga sinyalnya lebih baik walaupun ditempel di benda logam. ?Spesifikasi fisik? Ukuran? 87 x 25 x 11 mm Bahan: ABS Cara pemasangan: Double tape atau baut IP Rating: IP68 Suhu operasional: -40C 150C ?Jarak baca? Ditempel di logam Reader 12 dBi: 5 - 10 m Reader 6 dBi: 2 - 5 m ?Spesifikasi chip? Merk: NXP Chip: UCODE 8 Protokol: ISO / IEC18000-6C, EPC Class1 Gen2 EPC: 128 Bits (RW) TID: 96 Bits (R) Password: 32 Bits Access Password, 32 Bits Kill Password (RW) User memory: 0 Bits Usia pakai: 100,000 kali tulis / 10 tahun ESD Performance: 2000V HBM', '20240526194336-2024-05-26tag_label194334.png', '0000-00-00 00:00:00', 0, '2024-05-26 19:43:36', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_librarian`
--

CREATE TABLE `tag_librarian` (
  `librarian_id` int(11) NOT NULL,
  `librarian_name` varchar(255) DEFAULT NULL,
  `librarian_gate` varchar(10) NOT NULL,
  `librarian_condition` varchar(20) NOT NULL,
  `librarian_aging` enum('true','false') NOT NULL DEFAULT 'false',
  `librarian_updateby` int(11) NOT NULL,
  `librarian_updated` datetime NOT NULL,
  `librarian_createdby` int(11) NOT NULL,
  `librarian_created` datetime NOT NULL,
  `building_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tag_librarian`
--

INSERT INTO `tag_librarian` (`librarian_id`, `librarian_name`, `librarian_gate`, `librarian_condition`, `librarian_aging`, `librarian_updateby`, `librarian_updated`, `librarian_createdby`, `librarian_created`, `building_id`) VALUES
(1, 'MOVING', '1', '0', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1),
(2, 'RUANGAN STOK - MM', '2', '0', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2),
(3, 'RUANGAN STAGING - MM\r\n', '3', '0', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2),
(4, 'RUANGAN BACKUP - MM\r\n', '4', '0', 'true', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2),
(5, 'RUANGAN < 3 BULAN - MM\r\n', '4', '0-91', 'true', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2),
(6, 'RUANGAN > 3 BULAN < 10 TAHUN - MM', '5', '91-3650', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2),
(7, 'RUANGAN STOK - R', '10', '0', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 3),
(8, 'RUANGAN STAGING - R', '9', '0', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 3),
(9, 'RUANGAN BACKUP - R', '10', '0', 'true', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 3),
(10, 'RUANGAN < 3 BULAN - R\r\n', '', '0-91', 'true', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 3),
(11, 'RUANGAN > 10 TAHUN - R', '', '3650-7300', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_location`
--

CREATE TABLE `tag_location` (
  `location_id` int(11) NOT NULL,
  `rfid_id` int(11) DEFAULT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `location_status` enum('TERSEDIA','PINJAM','KERUSAKAN') NOT NULL,
  `location_aging` date DEFAULT NULL,
  `location_created` datetime DEFAULT NULL,
  `location_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tag_location`
--

INSERT INTO `tag_location` (`location_id`, `rfid_id`, `librarian_id`, `location_status`, `location_aging`, `location_created`, `location_updated`) VALUES
(1, 1, 1, 'TERSEDIA', '2024-07-16', '2024-07-16 16:20:59', '2024-07-16 16:58:02'),
(2, 2, 1, 'TERSEDIA', '2024-07-16', '2024-07-16 16:22:57', '2024-07-16 16:57:07'),
(3, 3, 1, 'TERSEDIA', '2024-07-16', '2024-07-16 16:24:31', '2024-07-16 16:57:09'),
(4, 4, 3, 'TERSEDIA', '2024-07-16', '2024-07-16 16:25:39', '2024-07-16 16:56:59'),
(5, 5, 1, 'TERSEDIA', '2024-07-16', '2024-07-16 16:26:23', '2024-07-16 16:57:08'),
(6, 6, 1, 'TERSEDIA', '2024-07-16', '2024-07-16 16:30:25', '2024-07-16 16:57:11'),
(7, 7, 2, 'TERSEDIA', NULL, '2024-07-18 16:59:30', '2024-07-18 16:59:30'),
(8, 8, 2, 'TERSEDIA', NULL, '2024-07-18 17:01:18', '2024-07-18 17:01:18'),
(9, 9, 2, 'TERSEDIA', NULL, '2024-07-18 17:02:47', '2024-07-18 17:02:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_location1`
--

CREATE TABLE `tag_location1` (
  `tl_id` int(11) NOT NULL,
  `tm_id` int(11) DEFAULT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `tl_status` enum('TERSEDIA','PINJAM','KERUSAKAN') NOT NULL,
  `tl_created` datetime DEFAULT NULL,
  `tl_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_location_log`
--

CREATE TABLE `tag_location_log` (
  `log_id` int(11) NOT NULL,
  `rfid_id` int(11) DEFAULT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `log_status` enum('AVAILABLE','PINJAM','KEMBALI','KERUSAKAN') NOT NULL,
  `log_created` datetime DEFAULT NULL,
  `log_createdby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tag_location_log`
--

INSERT INTO `tag_location_log` (`log_id`, `rfid_id`, `librarian_id`, `log_status`, `log_created`, `log_createdby`) VALUES
(1, 1, 2, 'PINJAM', '2024-05-28 23:52:15', 'fatahillahreza'),
(2, 1, 2, 'KEMBALI', '2024-05-28 23:52:54', 'fatahillahreza'),
(3, 1, 2, 'KERUSAKAN', '2024-05-28 23:54:15', 'fatahillahreza'),
(4, 2, 1, 'KEMBALI', '0000-00-00 00:00:00', '2024-05-29 11:13:57'),
(5, 2, 2, 'PINJAM', '0000-00-00 00:00:00', '2024-05-29 11:14:34'),
(6, 2, 1, 'PINJAM', '0000-00-00 00:00:00', '2024-05-29 11:14:41'),
(7, 2, 2, 'AVAILABLE', '2024-05-29 11:17:30', 'system'),
(8, 2, 3, 'AVAILABLE', '2024-05-29 11:25:30', 'system'),
(9, 2, 3, 'AVAILABLE', '2024-05-29 11:26:10', 'system'),
(10, 2, 3, 'AVAILABLE', '2024-05-29 12:07:59', 'system'),
(11, 2, 3, 'AVAILABLE', '2024-05-29 13:34:13', 'system'),
(12, 2, 3, 'AVAILABLE', '2024-05-29 13:34:29', 'system'),
(13, 2, 4, 'AVAILABLE', '2024-05-29 13:34:37', 'system'),
(14, 2, 5, 'AVAILABLE', '2024-05-29 13:38:56', 'system'),
(15, 2, 5, 'AVAILABLE', '2024-05-29 14:55:56', 'system'),
(16, 1, 2, 'AVAILABLE', '2024-05-29 16:14:06', 'system'),
(17, 2, 2, 'AVAILABLE', '2024-05-29 16:14:06', 'system'),
(18, 1, 2, 'AVAILABLE', '2024-05-29 16:15:23', 'system'),
(19, 1, 2, 'AVAILABLE', '2024-05-29 16:15:53', 'system'),
(20, 2, 2, 'AVAILABLE', '2024-05-29 16:15:53', 'system'),
(21, 1, 2, 'AVAILABLE', '2024-05-29 16:17:46', 'system'),
(22, 2, 2, 'AVAILABLE', '2024-05-29 16:17:46', 'system'),
(23, 1, 2, 'AVAILABLE', '2024-05-29 16:18:09', 'system'),
(24, 2, 2, 'AVAILABLE', '2024-05-29 16:18:10', 'system'),
(25, 2, 2, 'AVAILABLE', '2024-05-29 16:20:42', 'system'),
(26, 2, 2, 'AVAILABLE', '2024-05-29 18:05:17', 'system'),
(27, 1, 2, 'AVAILABLE', '2024-05-29 18:05:17', 'system'),
(28, 2, 2, 'AVAILABLE', '2024-05-29 18:05:24', 'system'),
(29, 2, 2, 'AVAILABLE', '2024-05-29 18:05:37', 'system'),
(30, 2, 2, 'AVAILABLE', '2024-05-29 18:05:39', 'system'),
(31, 2, 2, 'AVAILABLE', '2024-05-29 18:05:42', 'system'),
(32, 2, 2, 'AVAILABLE', '2024-05-29 18:05:45', 'system'),
(33, 2, 2, 'AVAILABLE', '2024-05-29 18:05:46', 'system'),
(34, 2, 2, 'AVAILABLE', '2024-05-29 18:05:49', 'system'),
(35, 2, 2, 'AVAILABLE', '2024-05-29 18:05:50', 'system'),
(36, 2, 2, 'AVAILABLE', '2024-05-29 18:05:53', 'system'),
(37, 2, 2, 'AVAILABLE', '2024-05-29 18:06:08', 'system'),
(38, 2, 2, 'AVAILABLE', '2024-05-29 18:06:12', 'system'),
(39, 2, 2, 'AVAILABLE', '2024-05-29 18:06:18', 'system'),
(40, 2, 2, 'AVAILABLE', '2024-05-29 18:06:20', 'system'),
(41, 2, 2, 'AVAILABLE', '2024-05-29 18:06:22', 'system'),
(42, 2, 2, 'AVAILABLE', '2024-05-29 18:06:40', 'system'),
(43, 2, 2, 'AVAILABLE', '2024-05-29 18:08:46', 'system'),
(44, 2, 2, 'AVAILABLE', '2024-05-29 18:08:49', 'system'),
(45, 2, 2, 'AVAILABLE', '2024-05-29 18:08:52', 'system'),
(46, 2, 2, 'AVAILABLE', '2024-05-29 18:08:55', 'system'),
(47, 2, 2, 'AVAILABLE', '2024-05-29 18:09:55', 'system'),
(48, 2, 2, 'AVAILABLE', '2024-05-29 18:10:19', 'system'),
(49, 2, 2, 'AVAILABLE', '2024-05-29 18:10:24', 'system'),
(50, 2, 2, 'AVAILABLE', '2024-05-29 18:10:49', 'system'),
(51, 2, 2, 'AVAILABLE', '2024-05-29 18:12:29', 'system'),
(52, 2, 2, 'AVAILABLE', '2024-05-29 18:12:36', 'system'),
(53, 2, 2, 'AVAILABLE', '2024-05-29 18:12:38', 'system'),
(54, 2, 2, 'AVAILABLE', '2024-05-29 18:12:40', 'system'),
(55, 2, 2, 'AVAILABLE', '2024-05-29 18:12:44', 'system'),
(56, 2, 2, 'AVAILABLE', '2024-05-29 18:12:55', 'system'),
(57, 2, 2, 'AVAILABLE', '2024-05-29 18:12:57', 'system'),
(58, 2, 2, 'AVAILABLE', '2024-05-29 18:12:59', 'system'),
(59, 2, 2, 'AVAILABLE', '2024-05-29 18:13:02', 'system'),
(60, 2, 2, 'AVAILABLE', '2024-05-29 18:13:03', 'system'),
(61, 2, 2, 'AVAILABLE', '2024-05-29 18:13:05', 'system'),
(62, 2, 2, 'AVAILABLE', '2024-05-29 18:13:17', 'system'),
(63, 2, 2, 'AVAILABLE', '2024-05-29 18:13:19', 'system'),
(64, 2, 2, 'AVAILABLE', '2024-05-29 18:13:21', 'system'),
(65, 2, 2, 'AVAILABLE', '2024-05-29 18:13:24', 'system'),
(66, 2, 2, 'AVAILABLE', '2024-05-29 18:13:34', 'system'),
(67, 2, 2, 'AVAILABLE', '2024-05-29 18:13:37', 'system'),
(68, 2, 2, 'AVAILABLE', '2024-05-29 18:13:39', 'system'),
(69, 2, 2, 'AVAILABLE', '2024-05-29 18:13:43', 'system'),
(70, 2, 2, 'AVAILABLE', '2024-05-29 18:13:50', 'system'),
(71, 2, 2, 'AVAILABLE', '2024-05-29 18:13:56', 'system'),
(72, 2, 2, 'AVAILABLE', '2024-05-29 18:13:59', 'system'),
(73, 2, 2, 'AVAILABLE', '2024-05-29 18:14:00', 'system'),
(74, 2, 2, 'AVAILABLE', '2024-05-29 18:14:07', 'system'),
(75, 2, 2, 'AVAILABLE', '2024-05-29 18:14:13', 'system'),
(76, 2, 2, 'AVAILABLE', '2024-05-29 18:14:33', 'system'),
(77, 2, 2, 'AVAILABLE', '2024-05-29 18:14:35', 'system'),
(78, 2, 2, 'AVAILABLE', '2024-05-29 18:14:39', 'system'),
(79, 2, 2, 'AVAILABLE', '2024-05-29 18:14:41', 'system'),
(80, 2, 2, 'AVAILABLE', '2024-05-29 18:14:49', 'system'),
(81, 2, 2, 'AVAILABLE', '2024-05-29 18:14:57', 'system'),
(82, 2, 2, 'AVAILABLE', '2024-05-29 18:15:16', 'system'),
(83, 2, 2, 'AVAILABLE', '2024-05-29 18:15:19', 'system'),
(84, 2, 2, 'AVAILABLE', '2024-05-29 18:15:22', 'system'),
(85, 2, 2, 'AVAILABLE', '2024-05-29 18:15:48', 'system'),
(86, 2, 2, 'AVAILABLE', '2024-05-29 18:15:50', 'system'),
(87, 2, 2, 'AVAILABLE', '2024-05-29 18:15:51', 'system'),
(88, 2, 2, 'AVAILABLE', '2024-05-29 18:15:53', 'system'),
(89, 2, 2, 'AVAILABLE', '2024-05-29 18:15:58', 'system'),
(90, 2, 2, 'AVAILABLE', '2024-05-29 18:15:59', 'system'),
(91, 2, 2, 'AVAILABLE', '2024-05-29 18:16:04', 'system'),
(92, 2, 2, 'AVAILABLE', '2024-05-29 18:16:10', 'system'),
(93, 2, 2, 'AVAILABLE', '2024-05-29 18:16:12', 'system'),
(94, 2, 2, 'AVAILABLE', '2024-05-29 18:16:14', 'system'),
(95, 2, 2, 'AVAILABLE', '2024-05-29 18:16:19', 'system'),
(96, 2, 2, 'AVAILABLE', '2024-05-29 18:16:25', 'system'),
(97, 2, 2, 'AVAILABLE', '2024-05-29 18:16:30', 'system'),
(98, 2, 2, 'AVAILABLE', '2024-05-29 18:17:19', 'system'),
(99, 2, 2, 'AVAILABLE', '2024-05-29 18:17:39', 'system'),
(100, 2, 2, 'AVAILABLE', '2024-05-29 18:17:59', 'system'),
(101, 2, 2, 'AVAILABLE', '2024-05-30 10:25:20', 'system'),
(102, 1, 2, 'AVAILABLE', '2024-05-30 10:25:21', 'system'),
(103, 2, 3, 'AVAILABLE', '2024-05-30 10:27:46', 'system'),
(104, 2, 3, 'AVAILABLE', '2024-05-30 10:27:49', 'system'),
(105, 2, 3, 'AVAILABLE', '2024-05-30 10:28:27', 'system'),
(106, 1, 3, 'AVAILABLE', '2024-05-30 10:28:28', 'system'),
(107, 2, 3, 'AVAILABLE', '2024-05-30 10:28:57', 'system'),
(108, 1, 3, 'AVAILABLE', '2024-05-30 10:28:58', 'system'),
(109, 1, 3, 'AVAILABLE', '2024-07-12 11:10:50', 'system'),
(110, 1, 3, 'AVAILABLE', '2024-07-12 11:14:40', 'system'),
(111, 1, 3, 'AVAILABLE', '2024-07-12 14:18:47', 'system'),
(112, 1, 3, 'AVAILABLE', '2024-07-12 14:19:29', 'system'),
(113, 1, 2, 'AVAILABLE', '2024-07-12 17:58:59', 'system'),
(114, 1, 2, 'AVAILABLE', '2024-07-12 18:03:18', 'system'),
(115, 1, 2, 'AVAILABLE', '2024-07-12 18:04:13', 'system'),
(116, 1, 2, 'AVAILABLE', '2024-07-15 10:19:41', 'system'),
(117, 1, 2, 'AVAILABLE', '2024-07-15 10:19:43', 'system'),
(118, 1, 2, 'AVAILABLE', '2024-07-15 10:19:46', 'system'),
(119, 1, 2, 'AVAILABLE', '2024-07-15 10:19:47', 'system'),
(120, 1, 2, 'AVAILABLE', '2024-07-15 10:19:52', 'system'),
(121, 1, 2, 'AVAILABLE', '2024-07-15 10:19:53', 'system'),
(122, 1, 2, 'AVAILABLE', '2024-07-15 10:20:00', 'system'),
(123, 1, 2, 'AVAILABLE', '2024-07-15 10:20:01', 'system'),
(124, 1, 2, 'AVAILABLE', '2024-07-15 10:20:06', 'system'),
(125, 1, 2, 'AVAILABLE', '2024-07-15 10:20:09', 'system'),
(126, 1, 2, 'AVAILABLE', '2024-07-15 10:20:13', 'system'),
(127, 1, 2, 'AVAILABLE', '2024-07-15 10:20:15', 'system'),
(128, 1, 2, 'AVAILABLE', '2024-07-15 10:20:18', 'system'),
(129, 1, 2, 'AVAILABLE', '2024-07-15 10:20:27', 'system'),
(130, 1, 2, 'AVAILABLE', '2024-07-15 10:20:34', 'system'),
(131, 1, 2, 'AVAILABLE', '2024-07-15 10:20:40', 'system'),
(132, 1, 2, 'AVAILABLE', '2024-07-15 10:20:49', 'system'),
(133, 1, 2, 'AVAILABLE', '2024-07-15 10:22:02', 'system'),
(134, 1, 2, 'AVAILABLE', '2024-07-15 10:22:47', 'system'),
(135, 1, 2, 'AVAILABLE', '2024-07-15 10:23:14', 'system'),
(136, 1, 2, 'AVAILABLE', '2024-07-15 10:23:22', 'system'),
(137, 1, 2, 'AVAILABLE', '2024-07-15 10:29:36', 'system'),
(138, 1, 2, 'AVAILABLE', '2024-07-15 10:29:48', 'system'),
(139, 1, 2, 'AVAILABLE', '2024-07-15 10:30:46', 'system'),
(140, 1, 2, 'AVAILABLE', '2024-07-15 10:44:48', 'system'),
(141, 1, 2, 'AVAILABLE', '2024-07-15 10:45:31', 'system'),
(142, 1, 2, 'AVAILABLE', '2024-07-15 10:45:43', 'system'),
(143, 1, 2, 'AVAILABLE', '2024-07-15 10:45:58', 'system'),
(144, 1, 2, 'AVAILABLE', '2024-07-15 10:46:17', 'system'),
(145, 1, 2, 'AVAILABLE', '2024-07-15 10:47:08', 'system'),
(146, 1, 2, 'AVAILABLE', '2024-07-15 10:47:14', 'system'),
(147, 1, 2, 'AVAILABLE', '2024-07-15 10:48:58', 'system'),
(148, 1, 2, 'AVAILABLE', '2024-07-15 10:49:03', 'system'),
(149, 1, 2, 'AVAILABLE', '2024-07-15 11:11:59', 'system'),
(150, 1, 2, 'AVAILABLE', '2024-07-15 11:12:17', 'system'),
(151, 1, 2, 'AVAILABLE', '2024-07-15 11:12:21', 'system'),
(152, 1, 2, 'AVAILABLE', '2024-07-15 11:12:53', 'system'),
(153, 1, 2, 'AVAILABLE', '2024-07-15 11:13:17', 'system'),
(154, 1, 2, 'AVAILABLE', '2024-07-15 11:13:19', 'system'),
(155, 1, 2, 'AVAILABLE', '2024-07-15 11:13:24', 'system'),
(156, 1, 2, 'AVAILABLE', '2024-07-15 11:13:43', 'system'),
(157, 1, 2, 'AVAILABLE', '2024-07-15 11:13:48', 'system'),
(158, 1, 2, 'AVAILABLE', '2024-07-15 11:14:06', 'system'),
(159, 1, 0, 'AVAILABLE', '2024-07-15 11:59:01', 'system'),
(160, 1, 0, 'AVAILABLE', '2024-07-15 11:59:58', 'system'),
(161, 1, 0, 'AVAILABLE', '2024-07-15 12:05:36', 'system'),
(162, 1, 0, 'AVAILABLE', '2024-07-15 12:16:24', 'system'),
(163, 1, 2, 'AVAILABLE', '2024-07-15 15:30:53', 'system'),
(164, 1, 2, 'AVAILABLE', '2024-07-15 15:31:02', 'system'),
(165, 1, 3, 'AVAILABLE', '2024-07-15 15:31:12', 'system'),
(166, 1, 3, 'AVAILABLE', '2024-07-15 15:31:19', 'system'),
(167, 1, 2, 'AVAILABLE', '2024-07-15 15:31:28', 'system'),
(168, 1, 2, 'AVAILABLE', '2024-07-15 15:31:55', 'system'),
(169, 1, 3, 'AVAILABLE', '2024-07-15 15:32:02', 'system'),
(170, 1, 3, 'AVAILABLE', '2024-07-15 15:32:08', 'system'),
(171, 1, 2, 'AVAILABLE', '2024-07-15 15:32:19', 'system'),
(172, 1, 3, 'AVAILABLE', '2024-07-15 15:32:25', 'system'),
(173, 1, 3, 'AVAILABLE', '2024-07-15 15:32:41', 'system'),
(174, 1, 2, 'AVAILABLE', '2024-07-15 15:51:49', 'system'),
(175, 1, 3, 'AVAILABLE', '2024-07-15 15:51:58', 'system'),
(176, 1, 3, 'AVAILABLE', '2024-07-15 15:56:54', 'system'),
(177, 1, 2, 'AVAILABLE', '2024-07-15 15:56:59', 'system'),
(178, 1, 3, 'AVAILABLE', '2024-07-15 15:57:09', 'system'),
(179, 1, 2, 'AVAILABLE', '2024-07-16 15:25:28', 'system'),
(180, 1, 3, 'AVAILABLE', '2024-07-16 16:33:14', 'system'),
(181, 5, 3, 'AVAILABLE', '2024-07-16 16:33:16', 'system'),
(182, 3, 3, 'AVAILABLE', '2024-07-16 16:33:17', 'system'),
(183, 3, 3, 'AVAILABLE', '2024-07-16 16:33:31', 'system'),
(184, 2, 3, 'AVAILABLE', '2024-07-16 16:33:37', 'system'),
(185, 1, 3, 'AVAILABLE', '2024-07-16 16:33:51', 'system'),
(186, 1, 3, 'AVAILABLE', '2024-07-16 16:33:59', 'system'),
(187, 1, 3, 'AVAILABLE', '2024-07-16 16:34:04', 'system'),
(188, 1, 3, 'AVAILABLE', '2024-07-16 16:34:10', 'system'),
(189, 1, 3, 'AVAILABLE', '2024-07-16 16:34:15', 'system'),
(190, 4, 3, 'AVAILABLE', '2024-07-16 16:34:18', 'system'),
(191, 2, 3, 'AVAILABLE', '2024-07-16 16:34:25', 'system'),
(192, 4, 3, 'AVAILABLE', '2024-07-16 16:34:26', 'system'),
(193, 1, 3, 'AVAILABLE', '2024-07-16 16:34:27', 'system'),
(194, 1, 3, 'AVAILABLE', '2024-07-16 16:51:26', 'system'),
(195, 1, 3, 'AVAILABLE', '2024-07-16 16:51:29', 'system'),
(196, 1, 3, 'AVAILABLE', '2024-07-16 16:51:31', 'system'),
(197, 3, 3, 'AVAILABLE', '2024-07-16 16:51:37', 'system'),
(198, 5, 3, 'AVAILABLE', '2024-07-16 16:51:39', 'system'),
(199, 3, 3, 'AVAILABLE', '2024-07-16 16:51:41', 'system'),
(200, 3, 3, 'AVAILABLE', '2024-07-16 16:51:47', 'system'),
(201, 2, 3, 'AVAILABLE', '2024-07-16 16:51:53', 'system'),
(202, 5, 3, 'AVAILABLE', '2024-07-16 16:51:54', 'system'),
(203, 3, 3, 'AVAILABLE', '2024-07-16 16:51:55', 'system'),
(204, 6, 3, 'AVAILABLE', '2024-07-16 16:51:57', 'system'),
(205, 1, 3, 'AVAILABLE', '2024-07-16 16:51:58', 'system'),
(206, 2, 3, 'AVAILABLE', '2024-07-16 16:52:02', 'system'),
(207, 1, 3, 'AVAILABLE', '2024-07-16 16:52:03', 'system'),
(208, 2, 3, 'AVAILABLE', '2024-07-16 16:52:06', 'system'),
(209, 4, 3, 'AVAILABLE', '2024-07-16 16:52:07', 'system'),
(210, 5, 3, 'AVAILABLE', '2024-07-16 16:52:08', 'system'),
(211, 6, 3, 'AVAILABLE', '2024-07-16 16:52:09', 'system'),
(212, 4, 3, 'AVAILABLE', '2024-07-16 16:52:16', 'system'),
(213, 2, 3, 'AVAILABLE', '2024-07-16 16:52:17', 'system'),
(214, 5, 3, 'AVAILABLE', '2024-07-16 16:52:18', 'system'),
(215, 3, 3, 'AVAILABLE', '2024-07-16 16:52:19', 'system'),
(216, 6, 3, 'AVAILABLE', '2024-07-16 16:52:21', 'system'),
(217, 4, 2, 'AVAILABLE', '2024-07-16 16:52:23', 'system'),
(218, 1, 3, 'AVAILABLE', '2024-07-16 16:52:24', 'system'),
(219, 1, 2, 'AVAILABLE', '2024-07-16 16:52:29', 'system'),
(220, 1, 2, 'AVAILABLE', '2024-07-16 16:52:32', 'system'),
(221, 1, 2, 'AVAILABLE', '2024-07-16 16:52:37', 'system'),
(222, 5, 2, 'AVAILABLE', '2024-07-16 16:53:37', 'system'),
(223, 5, 2, 'AVAILABLE', '2024-07-16 16:53:42', 'system'),
(224, 4, 2, 'AVAILABLE', '2024-07-16 16:53:51', 'system'),
(225, 5, 2, 'AVAILABLE', '2024-07-16 16:53:52', 'system'),
(226, 6, 2, 'AVAILABLE', '2024-07-16 16:53:53', 'system'),
(227, 1, 2, 'AVAILABLE', '2024-07-16 16:53:54', 'system'),
(228, 5, 2, 'AVAILABLE', '2024-07-16 16:53:59', 'system'),
(229, 6, 2, 'AVAILABLE', '2024-07-16 16:54:00', 'system'),
(230, 1, 2, 'AVAILABLE', '2024-07-16 16:54:01', 'system'),
(231, 3, 2, 'AVAILABLE', '2024-07-16 16:54:08', 'system'),
(232, 1, 2, 'AVAILABLE', '2024-07-16 16:54:12', 'system'),
(233, 1, 2, 'AVAILABLE', '2024-07-16 16:54:16', 'system'),
(234, 4, 2, 'AVAILABLE', '2024-07-16 16:54:47', 'system'),
(235, 2, 2, 'AVAILABLE', '2024-07-16 16:54:48', 'system'),
(236, 5, 2, 'AVAILABLE', '2024-07-16 16:54:49', 'system'),
(237, 3, 2, 'AVAILABLE', '2024-07-16 16:54:50', 'system'),
(238, 6, 2, 'AVAILABLE', '2024-07-16 16:54:51', 'system'),
(239, 1, 2, 'AVAILABLE', '2024-07-16 16:54:52', 'system'),
(240, 6, 2, 'AVAILABLE', '2024-07-16 16:54:58', 'system'),
(241, 1, 2, 'AVAILABLE', '2024-07-16 16:54:59', 'system'),
(242, 3, 2, 'AVAILABLE', '2024-07-16 16:55:11', 'system'),
(243, 5, 2, 'AVAILABLE', '2024-07-16 16:55:12', 'system'),
(244, 6, 2, 'AVAILABLE', '2024-07-16 16:55:13', 'system'),
(245, 1, 2, 'AVAILABLE', '2024-07-16 16:55:14', 'system'),
(246, 3, 2, 'AVAILABLE', '2024-07-16 16:55:17', 'system'),
(247, 1, 2, 'AVAILABLE', '2024-07-16 16:55:18', 'system'),
(248, 1, 2, 'AVAILABLE', '2024-07-16 16:56:51', 'system'),
(249, 1, 3, 'AVAILABLE', '2024-07-16 16:56:53', 'system'),
(250, 2, 2, 'AVAILABLE', '2024-07-16 16:56:57', 'system'),
(251, 1, 2, 'AVAILABLE', '2024-07-16 16:56:58', 'system'),
(252, 4, 3, 'AVAILABLE', '2024-07-16 16:56:59', 'system'),
(253, 2, 3, 'AVAILABLE', '2024-07-16 16:57:00', 'system'),
(254, 5, 3, 'AVAILABLE', '2024-07-16 16:57:00', 'system'),
(255, 3, 3, 'AVAILABLE', '2024-07-16 16:57:01', 'system'),
(256, 6, 3, 'AVAILABLE', '2024-07-16 16:57:03', 'system'),
(257, 1, 3, 'AVAILABLE', '2024-07-16 16:57:04', 'system'),
(258, 1, 2, 'AVAILABLE', '2024-07-16 16:57:06', 'system'),
(259, 2, 3, 'AVAILABLE', '2024-07-16 16:57:07', 'system'),
(260, 5, 3, 'AVAILABLE', '2024-07-16 16:57:08', 'system'),
(261, 3, 3, 'AVAILABLE', '2024-07-16 16:57:09', 'system'),
(262, 6, 3, 'AVAILABLE', '2024-07-16 16:57:11', 'system'),
(263, 1, 3, 'AVAILABLE', '2024-07-16 16:57:12', 'system'),
(264, 1, 3, 'AVAILABLE', '2024-07-16 16:57:13', 'system'),
(265, 1, 3, 'AVAILABLE', '2024-07-16 16:57:32', 'system'),
(266, 1, 3, 'AVAILABLE', '2024-07-16 16:57:37', 'system'),
(267, 1, 3, 'AVAILABLE', '2024-07-16 16:57:40', 'system'),
(268, 1, 3, 'AVAILABLE', '2024-07-16 16:58:02', 'system');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_reader`
--

CREATE TABLE `tag_reader` (
  `reader_id` int(11) NOT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `reader_name` varchar(255) DEFAULT NULL,
  `reader_serialnumber` varchar(10) NOT NULL,
  `reader_type` enum('tcp','serial') NOT NULL DEFAULT 'tcp',
  `reader_ip` varchar(45) DEFAULT '192.168.1.0',
  `reader_port` varchar(7) NOT NULL DEFAULT '6000',
  `reader_com` enum('/dev/cu.usbserial-1410','/dev/cu.usbserial-1420','COM1','COM2','COM3','COM4','COM5','COM6','COM7','COM8','COM9','COM10') NOT NULL DEFAULT '/dev/cu.usbserial-1410',
  `reader_baudrate` enum('9600','19200','38400','57600','115200') NOT NULL DEFAULT '57600',
  `reader_power` int(2) NOT NULL DEFAULT 25,
  `reader_interval` enum('10','100','1000','2000','5000','10000','15000') NOT NULL DEFAULT '1000',
  `reader_mode` enum('answer','active') NOT NULL DEFAULT 'answer',
  `reader_updatedby` int(11) NOT NULL,
  `reader_updated` datetime NOT NULL,
  `reader_createdby` int(11) NOT NULL,
  `reader_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tag_reader`
--

INSERT INTO `tag_reader` (`reader_id`, `librarian_id`, `reader_name`, `reader_serialnumber`, `reader_type`, `reader_ip`, `reader_port`, `reader_com`, `reader_baudrate`, `reader_power`, `reader_interval`, `reader_mode`, `reader_updatedby`, `reader_updated`, `reader_createdby`, `reader_created`) VALUES
(1, 2, 'Reader Ruang Stok Lt.1', '23050145', 'tcp', '192.168.1.92', '6000', '/dev/cu.usbserial-1410', '57600', 25, '1000', 'answer', 1, '2024-05-26 19:55:48', 1, '2024-05-21 17:43:17'),
(2, 3, 'Reader Ruangan Staging', 'x', 'tcp', '192.168.1.91', '6000', 'COM5', '57600', 25, '1000', 'answer', 1, '2024-05-30 12:25:56', 1, '2024-05-21 17:44:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_rfid`
--

CREATE TABLE `tag_rfid` (
  `rfid_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `rfid_barcode` varchar(48) NOT NULL,
  `rfid_rfid` varchar(96) NOT NULL,
  `rfid_status` enum('yes','no') NOT NULL DEFAULT 'yes',
  `rfid_note` varchar(255) NOT NULL,
  `rfid_created` datetime NOT NULL,
  `rfid_createdby` int(11) NOT NULL,
  `rfid_updated` datetime NOT NULL,
  `rfid_updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tag_rfid`
--

INSERT INTO `tag_rfid` (`rfid_id`, `label_id`, `rfid_barcode`, `rfid_rfid`, `rfid_status`, `rfid_note`, `rfid_created`, `rfid_createdby`, `rfid_updated`, `rfid_updatedby`) VALUES
(1, 1, '12345678', '313233343536373800000000', 'yes', 'normal', '2024-07-16 16:20:59', 1, '2024-07-16 16:20:59', 1),
(2, 1, '20240002', '323032343030303200000000', 'yes', 'normal', '2024-07-16 16:22:57', 1, '2024-07-16 16:22:57', 1),
(3, 1, '00123456', '303031323334353600000000', 'yes', 'normal', '2024-07-16 16:24:31', 1, '2024-07-16 16:24:31', 1),
(4, 1, '20240003', '323032343030303300000000', 'yes', 'normal', '2024-07-16 16:25:39', 1, '2024-07-16 16:25:39', 1),
(5, 1, '20240001', '323032343030303100000000', 'yes', 'normal', '2024-07-16 16:26:23', 1, '2024-07-16 16:26:23', 1),
(6, 1, 'ug654321', '756736353433323100000000', 'yes', 'normal', '2024-07-16 16:30:25', 1, '2024-07-16 16:30:25', 1),
(7, 1, 'LZ3650L6', '4C5A333635304C3600000000', 'yes', 'normal', '2024-07-18 16:59:30', 1, '2024-07-18 16:59:30', 1),
(8, 1, 'LZ3652L6', '4C5A333635324C3600000000', 'yes', 'normal', '2024-07-18 17:01:18', 1, '2024-07-18 17:01:18', 1),
(9, 1, 'LZ3081L6', '4C5A333038314C3600000000', 'yes', 'normal', '2024-07-18 17:02:47', 1, '2024-07-18 17:02:47', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `widgeds`
--

CREATE TABLE `widgeds` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `dashboard_id` int(11) NOT NULL,
  `widged_uuid` varchar(255) NOT NULL,
  `widged_type` varchar(255) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indeks untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`user_id`,`perm_id`);

--
-- Indeks untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indeks untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indeks untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat_contact`
--
ALTER TABLE `chat_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_action`
--
ALTER TABLE `crud_action`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_condition`
--
ALTER TABLE `crud_field_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_function`
--
ALTER TABLE `crud_function`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder_condition`
--
ALTER TABLE `reminder_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reminder_cron`
--
ALTER TABLE `reminder_cron`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tag_anomaly`
--
ALTER TABLE `tag_anomaly`
  ADD PRIMARY KEY (`anomaly_id`);

--
-- Indeks untuk tabel `tag_borrow`
--
ALTER TABLE `tag_borrow`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indeks untuk tabel `tag_broken`
--
ALTER TABLE `tag_broken`
  ADD PRIMARY KEY (`broken_id`);

--
-- Indeks untuk tabel `tag_building`
--
ALTER TABLE `tag_building`
  ADD PRIMARY KEY (`building_id`);

--
-- Indeks untuk tabel `tag_label`
--
ALTER TABLE `tag_label`
  ADD PRIMARY KEY (`label_id`);

--
-- Indeks untuk tabel `tag_librarian`
--
ALTER TABLE `tag_librarian`
  ADD PRIMARY KEY (`librarian_id`),
  ADD KEY `Gedung_ID` (`building_id`);

--
-- Indeks untuk tabel `tag_location`
--
ALTER TABLE `tag_location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `tm_id` (`rfid_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Indeks untuk tabel `tag_location1`
--
ALTER TABLE `tag_location1`
  ADD PRIMARY KEY (`tl_id`),
  ADD KEY `tm_id` (`tm_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Indeks untuk tabel `tag_location_log`
--
ALTER TABLE `tag_location_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `tm_id` (`rfid_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Indeks untuk tabel `tag_reader`
--
ALTER TABLE `tag_reader`
  ADD PRIMARY KEY (`reader_id`),
  ADD KEY `Gedung_ID` (`librarian_id`);

--
-- Indeks untuk tabel `tag_rfid`
--
ALTER TABLE `tag_rfid`
  ADD PRIMARY KEY (`rfid_id`),
  ADD UNIQUE KEY `rfid_barcode` (`rfid_barcode`),
  ADD UNIQUE KEY `rfid_rfid` (`rfid_rfid`);

--
-- Indeks untuk tabel `widgeds`
--
ALTER TABLE `widgeds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=732;

--
-- AUTO_INCREMENT untuk tabel `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_user`
--
ALTER TABLE `aauth_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cc_options`
--
ALTER TABLE `cc_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chat_contact`
--
ALTER TABLE `chat_contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `crud_action`
--
ALTER TABLE `crud_action`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT untuk tabel `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT untuk tabel `crud_field_condition`
--
ALTER TABLE `crud_field_condition`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT untuk tabel `crud_function`
--
ALTER TABLE `crud_function`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_custom_option`
--
ALTER TABLE `form_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_field_validation`
--
ALTER TABLE `form_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `page_block_element`
--
ALTER TABLE `page_block_element`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reminder_condition`
--
ALTER TABLE `reminder_condition`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reminder_cron`
--
ALTER TABLE `reminder_cron`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rest_field`
--
ALTER TABLE `rest_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT untuk tabel `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT untuk tabel `rest_input_type`
--
ALTER TABLE `rest_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tag_anomaly`
--
ALTER TABLE `tag_anomaly`
  MODIFY `anomaly_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tag_borrow`
--
ALTER TABLE `tag_borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tag_broken`
--
ALTER TABLE `tag_broken`
  MODIFY `broken_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tag_building`
--
ALTER TABLE `tag_building`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tag_label`
--
ALTER TABLE `tag_label`
  MODIFY `label_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tag_librarian`
--
ALTER TABLE `tag_librarian`
  MODIFY `librarian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tag_location`
--
ALTER TABLE `tag_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tag_location1`
--
ALTER TABLE `tag_location1`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tag_location_log`
--
ALTER TABLE `tag_location_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT untuk tabel `tag_reader`
--
ALTER TABLE `tag_reader`
  MODIFY `reader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tag_rfid`
--
ALTER TABLE `tag_rfid`
  MODIFY `rfid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `widgeds`
--
ALTER TABLE `widgeds`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
