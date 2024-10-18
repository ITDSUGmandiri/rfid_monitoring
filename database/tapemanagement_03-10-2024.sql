-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 03, 2024 at 10:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
-- Table structure for table `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aauth_groups`
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
-- Table structure for table `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `subgroup_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aauth_perms`
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
(200, 'tag_location_export', ''),
(201, 'menu_rfid_tracking', ''),
(202, 'menu_rfid_tag', ''),
(203, 'menu_main_navigation', '');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aauth_perm_to_group`
--

INSERT INTO `aauth_perm_to_group` (`perm_id`, `group_id`) VALUES
(186, 0),
(185, 0);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_pms`
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
-- Table structure for table `aauth_user`
--

CREATE TABLE `aauth_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_users`
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
-- Dumping data for table `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `pass`, `username`, `full_name`, `avatar`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `top_secret`, `ip_address`) VALUES
(1, 'admin@gmail.com', NULL, NULL, '0098f77459b6d78055fb8a02879ea004f1a49f18468a6ddc69a9c57327b957f4', 'administrator', 'Administrator', '20240524133838-8198-1694609670.png', 0, '2024-10-01 10:35:56', '2024-10-01 10:35:56', '2024-05-21 05:44:44', NULL, NULL, NULL, NULL, NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
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
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `content`, `image`, `tags`, `category`, `status`, `author`, `viewers`, `created_at`, `updated_at`) VALUES
(1, 'Hello Wellcome To Cicool Builder', 'Hello-Wellcome-To-Ciool-Builder', 'greetings from our team I hope to be happy! ', 'wellcome.jpg', 'greetings', '1', 'publish', 'admin', 0, '2024-05-21 05:44:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Technology', ''),
(2, 'Lifestyle', '');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) UNSIGNED NOT NULL,
  `captcha_time` int(10) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cc_options`
--

CREATE TABLE `cc_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cc_options`
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
(14, 'author', 'Ridwan Sapoetra'),
(15, 'logo', '20240526205128-2024-05-26setting205122.jpeg'),
(16, 'active_theme', 'cicool'),
(17, 'landing_page_id', 'login'),
(18, 'email', 'sm4rtschool@gmail.com'),
(19, 'google_id', ''),
(20, 'google_secret', ''),
(21, 'chat_fb_key', '8ae6728ddb0695aef98e7ef9e9f418be');

-- --------------------------------------------------------

--
-- Table structure for table `cc_session`
--

CREATE TABLE `cc_session` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
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
-- Table structure for table `chat_contact`
--

CREATE TABLE `chat_contact` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
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
-- Table structure for table `crud`
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
-- Dumping data for table `crud`
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
-- Table structure for table `crud_action`
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
-- Table structure for table `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `crud_custom_option`
--

INSERT INTO `crud_custom_option` (`id`, `crud_field_id`, `crud_id`, `option_value`, `option_label`) VALUES
(187, 258, 4, 'yes', 'Yes'),
(188, 258, 4, 'no', 'No'),
(206, 391, 8, 'AVAILABLE', 'AVAILABLE'),
(207, 391, 8, 'PINJAM', 'PINJAM'),
(208, 391, 8, 'KEMBALI', 'KEMBALI'),
(209, 391, 8, 'KERUSAKAN', 'KERUSAKAN'),
(210, 401, 10, 'PENDING', 'PENDING'),
(211, 401, 10, 'SUCCESS', 'SUCCESS'),
(248, 435, 5, 'tcp', 'tcp'),
(249, 435, 5, 'serial', 'serial'),
(250, 438, 5, '/dev/cu.usbserial-1410', '/dev/cu.usbserial-1410'),
(251, 438, 5, '/dev/cu.usbserial-1420', '/dev/cu.usbserial-1420'),
(252, 438, 5, 'COM1', 'COM1'),
(253, 438, 5, 'COM2', 'COM2'),
(254, 438, 5, 'COM3', 'COM3'),
(255, 438, 5, 'COM4', 'COM4'),
(256, 438, 5, 'COM5', 'COM5'),
(257, 438, 5, 'COM6', 'COM6'),
(258, 438, 5, 'COM7', 'COM7'),
(259, 438, 5, 'COM8', 'COM8'),
(260, 438, 5, 'COM9', 'COM9'),
(261, 438, 5, 'COM10', 'COM10'),
(262, 439, 5, '9600', '9600'),
(263, 439, 5, '19200', '19200'),
(264, 439, 5, '38400', '38400'),
(265, 439, 5, '57600', '57600'),
(266, 439, 5, '115200', '115200'),
(267, 440, 5, '1', '1 Dbi'),
(268, 440, 5, '2', '2 Dbi'),
(269, 440, 5, '3', '3 Dbi'),
(270, 440, 5, '25', '25 Dbi'),
(271, 441, 5, '10', '10'),
(272, 441, 5, '100', '100'),
(273, 441, 5, '1000', '1000'),
(274, 441, 5, '2000', '2000'),
(275, 441, 5, '5000', '5000'),
(276, 441, 5, '10000', '10000'),
(277, 441, 5, '15000', '15000'),
(278, 442, 5, 'answer', 'Answer'),
(279, 442, 5, 'active', 'Active'),
(280, 447, 5, 'hw', 'HW'),
(281, 447, 5, 'rc', 'RC'),
(306, 592, 3, 'true', 'true'),
(307, 592, 3, 'false', 'false'),
(308, 604, 9, 'not', 'not'),
(309, 604, 9, 'done', 'done'),
(815, 1948, 6, 'TERSEDIA', 'TERSEDIA'),
(816, 1948, 6, 'PINJAM', 'PINJAM'),
(817, 1948, 6, 'KERUSAKAN', 'KERUSAKAN');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field`
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
-- Dumping data for table `crud_field`
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
(431, 5, 'reader_id', 'reader_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(432, 5, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_librarian', 'librarian_id', 'librarian_name'),
(433, 5, 'reader_name', 'Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(434, 5, 'reader_serialnumber', 'SN', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(435, 5, 'reader_type', 'Type', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(436, 5, 'reader_ip', 'IP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(437, 5, 'reader_port', 'Port', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(438, 5, 'reader_com', 'Com Port', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(439, 5, 'reader_baudrate', 'Baud Rate', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(440, 5, 'reader_power', 'Power', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(441, 5, 'reader_interval', 'Interval', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(442, 5, 'reader_mode', 'Mode', 'custom_select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(443, 5, 'reader_created', 'Created', 'timestamp', '', '', '', NULL, '', 'yes', '', 'yes', 13, '', '', ''),
(444, 5, 'reader_createdby', 'Created By', 'current_user_id', '', '', '', NULL, '', 'yes', '', 'yes', 14, '', '', ''),
(445, 5, 'reader_updated', 'Updated', 'timestamp', '', '', '', NULL, '', 'yes', 'yes', 'yes', 15, '', '', ''),
(446, 5, 'reader_updatedby', 'Updated By', 'current_user_id', '', '', '', NULL, '', 'yes', 'yes', 'yes', 16, '', '', ''),
(447, 5, 'reader_family', 'reader_family', 'custom_select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(588, 3, 'librarian_id', 'librarian_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(589, 3, 'librarian_name', 'Librarian Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(590, 3, 'librarian_gate', 'Librarian Gate', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(591, 3, 'librarian_condition', 'Condition Logic', 'input', '', '', 'yes', NULL, '', '', '', '', 4, '', '', ''),
(592, 3, 'librarian_aging', 'Librarian Aging', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(593, 3, 'librarian_created', 'Librarian Create', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 6, '', '', ''),
(594, 3, 'librarian_createdby', 'Librarian Create By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(595, 3, 'librarian_updated', 'Librarian Update', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(596, 3, 'librarian_updateby', 'Librarian Update By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(597, 3, 'building_id', 'Building', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, 'tag_building', 'building_id', 'building_name'),
(598, 3, 'librarian_age_start', 'librarian_age_start', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(599, 3, 'librarian_age_end', 'librarian_age_end', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(600, 9, 'anomaly_id', 'anomaly_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(601, 9, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(602, 9, 'anomaly_right_librarian', 'Right Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(603, 9, 'anomaly_wrong_librarian', 'Wrong Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, 'tag_librarian', 'librarian_id', 'librarian_name'),
(604, 9, 'anomaly_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(605, 9, 'anomaly_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(606, 9, 'anomaly_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(607, 9, 'anomaly_updatedby', 'Updated By', 'current_user_username', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(608, 9, 'rfid_barcode', 'rfid_barcode', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(1945, 6, 'location_id', 'location_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(1946, 6, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(1947, 6, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(1948, 6, 'location_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(1949, 6, 'location_aging', 'Aging', 'datetime', '', '', 'yes', NULL, 'yes', '', '', 'yes', 5, '', '', ''),
(1950, 6, 'location_created', 'Created', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 6, '', '', ''),
(1951, 6, 'location_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(1952, 6, 'rfid_barcode', 'Barcode', 'select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 8, 'tag_rfid', 'rfid_id', 'rfid_barcode'),
(2022, 7, 'label_id', 'label_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2023, 7, 'label_supplier', 'Supplier', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2024, 7, 'label_name', 'Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2025, 7, 'label_description', 'Description', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2026, 7, 'label_image', 'Image', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2027, 7, 'label_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(2028, 7, 'label_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 7, '', '', ''),
(2029, 7, 'label_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(2030, 7, 'label_updatedby', 'Updated By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(2031, 7, 'label_dimension', 'label_dimension', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2032, 7, 'referensi', 'referensi', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 11, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field_condition`
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
-- Table structure for table `crud_field_configuration`
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
-- Table structure for table `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `crud_field_id` int(11) NOT NULL,
  `crud_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(1, 2, 1, 'required', ''),
(2, 2, 1, 'max_length', '255'),
(3, 3, 1, 'required', ''),
(61, 59, 2, 'required', ''),
(62, 59, 2, 'max_length', '255'),
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
(428, 432, 5, 'required', ''),
(429, 433, 5, 'required', ''),
(430, 433, 5, 'max_length', '255'),
(431, 434, 5, 'required', ''),
(432, 434, 5, 'max_length', '10'),
(433, 435, 5, 'required', ''),
(434, 436, 5, 'required', ''),
(435, 436, 5, 'max_length', '45'),
(436, 436, 5, 'valid_ip', ''),
(437, 437, 5, 'required', ''),
(438, 437, 5, 'max_length', '7'),
(439, 438, 5, 'required', ''),
(440, 439, 5, 'required', ''),
(441, 440, 5, 'required', ''),
(442, 441, 5, 'required', ''),
(551, 589, 3, 'required', ''),
(552, 589, 3, 'max_length', '255'),
(553, 590, 3, 'required', ''),
(554, 590, 3, 'max_length', '10'),
(555, 591, 3, 'required', ''),
(556, 591, 3, 'max_length', '20'),
(557, 592, 3, 'required', ''),
(558, 597, 3, 'required', ''),
(559, 597, 3, 'max_length', '11'),
(560, 601, 9, 'required', ''),
(561, 601, 9, 'max_length', '11'),
(562, 602, 9, 'required', ''),
(563, 602, 9, 'max_length', '11'),
(564, 603, 9, 'required', ''),
(565, 603, 9, 'max_length', '11'),
(566, 604, 9, 'required', ''),
(1572, 1946, 6, 'required', ''),
(1573, 1946, 6, 'max_length', '11'),
(1574, 1947, 6, 'required', ''),
(1575, 1947, 6, 'max_length', '11'),
(1576, 1948, 6, 'required', ''),
(1577, 1952, 6, 'required', ''),
(1578, 1952, 6, 'max_length', '11'),
(1607, 2024, 7, 'required', ''),
(1608, 2024, 7, 'max_length', '255'),
(1609, 2025, 7, 'required', ''),
(1610, 2026, 7, 'required', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud_function`
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
-- Table structure for table `crud_input_chained`
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
-- Table structure for table `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int(11) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `crud_input_type`
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
-- Table structure for table `crud_input_validation`
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
-- Dumping data for table `crud_input_validation`
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
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `title`, `slug`, `created_at`) VALUES
(1, 'Reza', '1-Reza', '2024-05-28 21:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_custom_attribute`
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
-- Table structure for table `form_custom_option`
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
-- Table structure for table `form_field`
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
-- Table structure for table `form_field_validation`
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
-- Table structure for table `keys`
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
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, '31F95C96EBC0E56702586B638FB6CCE0', 0, 0, 0, NULL, '2024-05-20 22:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `log`
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
-- Table structure for table `menu`
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
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `label`, `type`, `icon_color`, `link`, `sort`, `parent`, `icon`, `menu_type_id`, `active`) VALUES
(1, 'MAIN NAVIGATION', 'label', 'default', '{admin_url}/dashboard', 1, 1, '', 1, 1),
(2, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 1, 0, 'fa-dashboard', 1, 1),
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
(22, 'Blog', 'menu', '', 'blog', 2, 0, '', 2, 1),
(23, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 3, 0, '', 2, 1),
(24, 'Building', 'menu', 'default', '{admin_url}/tag_building', 6, 0, 'fa-building', 1, 1),
(25, 'Librarian', 'menu', 'default', '{admin_url}/tag_librarian', 7, 0, 'fa-building', 1, 1),
(26, 'Reader', 'menu', 'default', '{admin_url}/tag_reader', 5, 0, 'fa-signal', 1, 1),
(27, 'Label', 'menu', 'default', '{admin_url}/tag_label', 3, 0, 'fa-barcode', 1, 1),
(28, 'Master Data', 'label', 'default', '#', 3, 1, '', 1, 1),
(29, 'RFID Tracking', 'label', 'default', '#', 8, 0, '', 1, 1),
(30, 'Location', 'menu', 'default', '{admin_url}/tag_location', 9, 0, 'fa-map-pin', 1, 1),
(31, 'Location Log', 'menu', 'default', '{admin_url}/tag_location_log', 10, 0, 'fa-archive', 1, 1),
(32, 'RFID Menu', 'label', 'default', '#', 11, 0, '', 1, 1),
(33, 'RFID Broken', 'menu', 'default', '{admin_url}/tag_broken', 12, 0, 'fa-barcode', 1, 1),
(34, 'RFID Borrow', NULL, 'default', '{admin_url}/tag_borrow', 13, 0, 'fa-barcode', 1, 1),
(35, 'RFID Anomaly', NULL, 'default', '{admin_url}/tag_anomaly', 14, 0, 'fa-barcode', 1, 1),
(36, 'RFID Tag', 'menu', 'default', '{admin_url}/tag_rfid', 35, 28, '', 1, 1),
(38, 'RFID Tag', 'menu', 'default', '{admin_url}/tag_rfid', 4, 0, 'fa-th-large', 1, 1),
(39, 'Master Data', 'label', 'default', '#', 2, 0, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `definition` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id`, `name`, `definition`) VALUES
(1, 'side menu', NULL),
(2, 'top menu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20230123115357);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
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
-- Table structure for table `page`
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
-- Table structure for table `page_block_element`
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
-- Table structure for table `reminder`
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
-- Table structure for table `reminder_condition`
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
-- Table structure for table `reminder_cron`
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
-- Table structure for table `rest`
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
-- Dumping data for table `rest`
--

INSERT INTO `rest` (`id`, `subject`, `table_name`, `primary_key`, `x_api_key`, `x_token`) VALUES
(5, 'API Reader', 'tag_reader', 'reader_id', 'no', 'yes'),
(6, 'Api Location', 'tag_location', 'location_id', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `rest_field`
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
-- Dumping data for table `rest_field`
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
-- Table structure for table `rest_field_validation`
--

CREATE TABLE `rest_field_validation` (
  `id` int(11) UNSIGNED NOT NULL,
  `rest_field_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rest_field_validation`
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
-- Table structure for table `rest_input_type`
--

CREATE TABLE `rest_input_type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rest_input_type`
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
-- Table structure for table `tag_anomaly`
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
-- Dumping data for table `tag_anomaly`
--

INSERT INTO `tag_anomaly` (`anomaly_id`, `rfid_id`, `rfid_barcode`, `anomaly_right_librarian`, `anomaly_wrong_librarian`, `anomaly_status`, `anomaly_created`, `anomaly_updated`, `anomaly_updatedby`) VALUES
(1, 1, '', 1, 3, 'not', '2024-09-05 14:29:54', '2024-09-05 14:29:54', 0),
(2, 10, '', 1, 3, 'not', '2024-09-05 14:29:55', '2024-09-05 14:29:55', 0),
(3, 7, '', 1, 3, 'not', '2024-09-05 14:29:56', '2024-09-05 14:29:56', 0),
(4, 8, '', 1, 3, 'not', '2024-09-05 16:30:10', '2024-09-05 16:30:10', 0),
(5, 8, '', 1, 4, 'not', '2024-09-05 16:32:19', '2024-09-05 16:32:19', 0),
(6, 1, '', 1, 3, 'not', '2024-09-05 16:34:04', '2024-09-05 16:34:04', 0),
(7, 8, '', 1, 3, 'not', '2024-09-05 16:34:36', '2024-09-05 16:34:36', 0),
(8, 6, '', 1, 3, 'not', '2024-09-05 16:34:39', '2024-09-05 16:34:39', 0),
(9, 4, '', 1, 3, 'not', '2024-09-05 16:36:12', '2024-09-05 16:36:12', 0),
(10, 9, '', 1, 4, 'not', '2024-09-05 16:40:05', '2024-09-05 16:40:05', 0),
(11, 2, '', 1, 4, 'not', '2024-09-05 16:40:06', '2024-09-05 16:40:06', 0),
(12, 3, '', 1, 4, 'not', '2024-09-05 16:40:09', '2024-09-05 16:40:09', 0),
(13, 11, '', 1, 4, 'not', '2024-09-05 16:40:10', '2024-09-05 16:40:10', 0),
(14, 5, '', 1, 4, 'not', '2024-09-05 16:40:11', '2024-09-05 16:40:11', 0),
(15, 14, '', 1, 2, 'not', '2024-09-10 15:51:56', '2024-09-10 15:51:56', 0),
(16, 15, '', 1, 2, 'not', '2024-09-10 20:11:39', '2024-09-10 20:11:39', 0),
(17, 21, '', 1, 2, 'not', '2024-09-11 10:26:04', '2024-09-11 10:26:04', 0),
(18, 2, '', 1, 2, 'not', '2024-09-12 03:35:10', '2024-09-12 03:35:10', 0),
(19, 20, '', 1, 2, 'not', '2024-09-12 07:51:32', '2024-09-12 07:51:32', 0),
(20, 17, '', 1, 2, 'not', '2024-09-12 08:33:29', '2024-09-12 08:33:29', 0),
(21, 2, '', 1, 11, 'not', '2024-09-15 17:58:55', '2024-09-15 17:58:55', 0),
(22, 3, '', 1, 11, 'not', '2024-09-15 17:59:20', '2024-09-15 17:59:20', 0),
(23, 1, '', 1, 11, 'not', '2024-09-15 17:59:24', '2024-09-15 17:59:24', 0),
(24, 4, '', 1, 11, 'not', '2024-09-15 17:59:24', '2024-09-15 17:59:24', 0),
(25, 5, '', 1, 11, 'not', '2024-09-15 17:59:27', '2024-09-15 17:59:27', 0),
(26, 19, '', 1, 11, 'not', '2024-09-15 18:00:59', '2024-09-15 18:00:59', 0),
(27, 20, '', 1, 11, 'not', '2024-09-15 18:01:13', '2024-09-15 18:01:13', 0),
(28, 17, '', 1, 11, 'not', '2024-09-15 18:16:15', '2024-09-15 18:16:15', 0),
(29, 17, '', 1, 2, 'not', '2024-09-15 18:16:19', '2024-09-15 18:16:19', 0),
(30, 17, '', 1, 11, 'not', '2024-09-15 18:16:19', '2024-09-15 18:16:19', 0),
(31, 17, '', 1, 2, 'not', '2024-09-15 18:16:53', '2024-09-15 18:16:53', 0),
(32, 17, '', 1, 11, 'not', '2024-09-15 18:17:57', '2024-09-15 18:17:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag_borrow`
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
-- Table structure for table `tag_broken`
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
-- Table structure for table `tag_building`
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
-- Dumping data for table `tag_building`
--

INSERT INTO `tag_building` (`building_id`, `building_name`, `building_created`, `building_createdby`, `building_updated`, `building_updatedby`) VALUES
(1, 'LUAR GEDUNG', '2023-10-19 00:00:00', 0, '2024-09-06 08:43:46', 1),
(2, 'DC1 - PLAZA MANDIRI', '2023-10-19 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'DC2 - REMPOA', '2023-10-19 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'MENARA MANDIRI', '2024-09-06 08:43:24', 1, '2024-09-06 08:45:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag_label`
--

CREATE TABLE `tag_label` (
  `label_id` int(11) NOT NULL,
  `label_supplier` varchar(50) DEFAULT NULL,
  `label_name` varchar(255) DEFAULT NULL,
  `referensi` varchar(150) DEFAULT NULL,
  `label_dimension` varchar(50) DEFAULT NULL,
  `label_description` text DEFAULT NULL,
  `label_image` text DEFAULT NULL,
  `label_created` datetime NOT NULL,
  `label_createdby` int(11) NOT NULL,
  `label_updated` datetime NOT NULL,
  `label_updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tag_label`
--

INSERT INTO `tag_label` (`label_id`, `label_supplier`, `label_name`, `referensi`, `label_dimension`, `label_description`, `label_image`, `label_created`, `label_createdby`, `label_updated`, `label_updatedby`) VALUES
(1, 'Electron', 'EL-UHF-E41C-IW UHF RFID', NULL, '', 'EL-UHF-E41C-IW - UHF RFID Sticker Bening yang cocok untuk ditempel di berbagai permukaan. Salah satu kegunaannya untuk ditempel di kaca depan atau lampu mobil. Tidak bisa digunakan jika ditempel di permukaan logam karena akan mengganggu pembacaan sinyal RFID. # Spesifikasi Chip: Impinj Monza 4QT Protocol: ISO/IEC 18000-6C (EPC Class1 Gen2) Frequency: 860 -- 960 MHz Memory EPC: 128 Bits Memory TID: 48 Bits User Memory: 512 Bits Access Password: 32 Bits Kill Password: 32 Bits IC Life: 100,000 Programming Cycles, 10 years data retention Material: PET + Aluminum Operating Temperature: -40? -- 70? C Operating Humidity: 20% to 90% RH Non-condensingEL-UHF-E41C-IW - UHF RFID Sticker Bening yang cocok untuk ditempel di berbagai permukaan. Salah satu kegunaannya untuk ditempel di kaca depan atau lampu mobil. Tidak bisa digunakan jika ditempel di permukaan logam karena akan mengganggu pembacaan sinyal RFID. # Spesifikasi Chip: Impinj Monza 4QT Protocol: ISO/IEC 18000-6C (EPC Class1 Gen2) Frequency: 860 -- 960 MHz Memory EPC: 128 Bits Memory TID: 48 Bits User Memory: 512 Bits Access Password: 32 Bits Kill Password: 32 Bits IC Life: 100,000 Programming Cycles, 10 years data retention Material: PET + Aluminum Operating Temperature: -40? -- 70? C Operating Humidity: 20% to 90% RH Non-condensing', '20240526194321-2024-05-26tag_label194317.jpeg', '0000-00-00 00:00:00', 0, '2024-10-03 14:29:19', 1),
(2, 'Electron', 'EL-UHF-MT05 Anti Metal', NULL, '', 'UHF RFID Tag yang cocok untuk ditempel di benda logam. Desain antenna lebih baik dibanding UHF Metal Tag yang sebelumnya dijual sehingga sinyalnya lebih baik walaupun ditempel di benda logam. ?Spesifikasi fisik? Ukuran? 87 x 25 x 11 mm Bahan: ABS Cara pemasangan: Double tape atau baut IP Rating: IP68 Suhu operasional: -40C 150C ?Jarak baca? Ditempel di logam Reader 12 dBi: 5 - 10 m Reader 6 dBi: 2 - 5 m ?Spesifikasi chip? Merk: NXP Chip: UCODE 8 Protokol: ISO / IEC18000-6C, EPC Class1 Gen2 EPC: 128 Bits (RW) TID: 96 Bits (R) Password: 32 Bits Access Password, 32 Bits Kill Password (RW) User memory: 0 Bits Usia pakai: 100,000 kali tulis / 10 tahun ESD Performance: 2000V HBM', '20240526194336-2024-05-26tag_label194334.png', '0000-00-00 00:00:00', 0, '2024-10-03 14:30:57', 1),
(3, 'Electron', 'UHF WET INLAY RFID TAG ALIEN WITH ADHESIVE LABEL FOR ASSET MANAGEMENT', 'https://www.tokopedia.com/focusstore/uhf-wet-inlay-rfid-tag-alien-with-adhesive-label-for-asset-management', '2,3 x 7,4 cm', 'UHF Label dengan sticker 3M ORIGINAL<br />\r\nChip : Alien H3<br />\r\nMemory : 512-Bits<br />\r\nFrequency : 860-960Mhz<br />\r\nProtocol ISO18000-6C (EPC Class 1 Gen 2)<br />\r\nMaterial : PET<br />\r\nAdhesive : Original 3M Sticker<br />\r\nSize Dimension : 23 x 74mm', '20241003144516-2024-10-03tag_label144512.jpg', '2024-10-03 14:45:16', 1, '2024-10-03 14:47:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag_librarian`
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
  `building_id` int(11) DEFAULT NULL,
  `librarian_age_start` int(10) NOT NULL DEFAULT 0,
  `librarian_age_end` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tag_librarian`
--

INSERT INTO `tag_librarian` (`librarian_id`, `librarian_name`, `librarian_gate`, `librarian_condition`, `librarian_aging`, `librarian_updateby`, `librarian_updated`, `librarian_createdby`, `librarian_created`, `building_id`, `librarian_age_start`, `librarian_age_end`) VALUES
(1, 'MOVING', '1', '0', 'false', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, 0, 0),
(2, 'R. STOK - PM', '2', '0', 'false', 1, '2024-09-06 09:02:53', 1, '2024-09-06 09:02:53', 2, 0, 0),
(3, 'R. STAGING - PM', '3', '0', 'false', 1, '2024-09-06 09:03:10', 1, '2024-09-06 09:03:10', 2, 0, 0),
(4, 'R. BACKUP RESTORE - PM', '4', '0', 'true', 1, '2024-09-06 09:03:24', 1, '2024-09-06 09:03:24', 2, 0, 0),
(7, 'R. < 1 TAHUN - RM', '5', '0', 'false', 1, '2024-10-01 10:46:47', 1, '2024-10-01 10:46:47', 3, 0, 0),
(8, 'R. BACKUP RESTORE - RM', '6', '0', 'true', 1, '2024-10-01 10:46:53', 1, '2024-10-01 10:46:53', 3, 0, 0),
(9, 'R. > 1 TAHUN - RM', '7', '0', 'false', 1, '2024-10-01 10:47:01', 1, '2024-10-01 10:47:01', 3, 0, 0),
(11, 'R. < 3 BULAN - MM', '8', '0-91', 'false', 1, '2024-10-01 10:49:22', 1, '2024-10-01 10:49:22', 8, 0, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tag_location`
--

CREATE TABLE `tag_location` (
  `location_id` int(11) NOT NULL,
  `rfid_id` int(11) DEFAULT NULL,
  `librarian_id` int(11) DEFAULT NULL,
  `location_status` enum('TERSEDIA','PINJAM','KERUSAKAN') NOT NULL,
  `location_aging` date DEFAULT NULL,
  `location_created` datetime DEFAULT NULL,
  `location_updated` datetime DEFAULT NULL,
  `rfid_barcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag_location`
--

INSERT INTO `tag_location` (`location_id`, `rfid_id`, `librarian_id`, `location_status`, `location_aging`, `location_created`, `location_updated`, `rfid_barcode`) VALUES
(1, 1, 11, 'TERSEDIA', '2024-09-05', '2024-09-05 14:09:54', '2024-09-15 18:00:17', ''),
(2, 2, 11, 'TERSEDIA', NULL, '2024-09-05 14:10:46', '2024-09-15 17:59:19', ''),
(3, 3, 1, 'TERSEDIA', NULL, '2024-09-05 14:12:17', '2024-09-15 18:06:39', ''),
(4, 4, 11, 'TERSEDIA', '2024-09-05', '2024-09-05 14:12:42', '2024-09-15 17:59:24', ''),
(5, 5, 1, 'TERSEDIA', NULL, '2024-09-05 14:13:07', '2024-09-15 17:59:29', ''),
(6, 6, 4, 'TERSEDIA', '2024-09-05', '2024-09-05 14:13:34', '2024-09-05 16:40:07', ''),
(7, 7, 4, 'TERSEDIA', '2024-09-05', '2024-09-05 14:14:06', '2024-09-05 16:40:08', ''),
(8, 8, 4, 'TERSEDIA', '2024-09-05', '2024-09-05 14:14:38', '2024-09-05 16:40:09', ''),
(9, 9, 4, 'TERSEDIA', NULL, '2024-09-05 14:14:58', '2024-09-05 16:40:05', ''),
(10, 10, 4, 'TERSEDIA', '2024-09-05', '2024-09-05 14:15:19', '2024-09-05 16:40:07', ''),
(11, 11, 4, 'TERSEDIA', NULL, '2024-09-05 14:15:40', '2024-09-05 16:40:10', ''),
(12, 12, 2, 'TERSEDIA', NULL, '2024-09-09 15:51:51', '2024-09-09 15:51:51', ''),
(13, 13, 2, 'TERSEDIA', NULL, '2024-09-09 15:54:50', '2024-09-12 03:37:40', ''),
(14, 14, 11, 'TERSEDIA', NULL, '2024-09-10 08:58:30', '2024-09-15 17:59:29', ''),
(15, 15, 2, 'TERSEDIA', NULL, '2024-09-10 09:01:48', '2024-09-12 08:33:13', ''),
(16, 17, 1, 'TERSEDIA', NULL, '2024-09-10 10:31:24', '2024-10-01 11:51:37', ''),
(17, 18, 4, 'TERSEDIA', NULL, '2024-09-10 10:59:15', '2024-09-10 10:59:15', ''),
(18, 19, 1, 'TERSEDIA', NULL, '2024-09-10 11:00:59', '2024-09-15 18:01:01', ''),
(19, 20, 1, 'TERSEDIA', NULL, '2024-09-10 11:04:35', '2024-09-15 18:01:38', ''),
(20, 21, 1, 'TERSEDIA', NULL, '2024-09-10 11:06:23', '2024-09-11 10:26:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `tag_location1`
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
-- Table structure for table `tag_location_log`
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
-- Dumping data for table `tag_location_log`
--

INSERT INTO `tag_location_log` (`log_id`, `rfid_id`, `librarian_id`, `log_status`, `log_created`, `log_createdby`) VALUES
(1, 1, 3, 'AVAILABLE', '2024-09-05 14:29:54', 'system'),
(2, 10, 3, 'AVAILABLE', '2024-09-05 14:29:55', 'system'),
(3, 7, 3, 'AVAILABLE', '2024-09-05 14:29:56', 'system'),
(4, 1, 3, 'AVAILABLE', '2024-09-05 14:30:12', 'system'),
(5, 1, 3, 'AVAILABLE', '2024-09-05 14:30:27', 'system'),
(6, 1, 3, 'AVAILABLE', '2024-09-05 14:30:38', 'system'),
(7, 1, 3, 'AVAILABLE', '2024-09-05 14:31:04', 'system'),
(8, 1, 3, 'AVAILABLE', '2024-09-05 14:34:30', 'system'),
(9, 1, 3, 'AVAILABLE', '2024-09-05 14:34:33', 'system'),
(10, 1, 3, 'AVAILABLE', '2024-09-05 14:34:37', 'system'),
(11, 1, 3, 'AVAILABLE', '2024-09-05 14:34:40', 'system'),
(12, 1, 3, 'AVAILABLE', '2024-09-05 14:34:57', 'system'),
(13, 1, 3, 'AVAILABLE', '2024-09-05 14:35:04', 'system'),
(14, 1, 3, 'AVAILABLE', '2024-09-05 14:35:05', 'system'),
(15, 1, 3, 'AVAILABLE', '2024-09-05 14:35:07', 'system'),
(16, 1, 3, 'AVAILABLE', '2024-09-05 14:35:11', 'system'),
(17, 1, 3, 'AVAILABLE', '2024-09-05 14:35:19', 'system'),
(18, 1, 3, 'AVAILABLE', '2024-09-05 14:35:23', 'system'),
(19, 1, 3, 'AVAILABLE', '2024-09-05 14:35:33', 'system'),
(20, 1, 3, 'AVAILABLE', '2024-09-05 14:35:39', 'system'),
(21, 1, 3, 'AVAILABLE', '2024-09-05 14:36:09', 'system'),
(22, 1, 3, 'AVAILABLE', '2024-09-05 14:36:15', 'system'),
(23, 1, 3, 'AVAILABLE', '2024-09-05 14:47:07', 'system'),
(24, 1, 3, 'AVAILABLE', '2024-09-05 14:49:31', 'system'),
(25, 1, 3, 'AVAILABLE', '2024-09-05 14:49:33', 'system'),
(26, 1, 3, 'AVAILABLE', '2024-09-05 14:49:35', 'system'),
(27, 1, 3, 'AVAILABLE', '2024-09-05 14:52:50', 'system'),
(28, 8, 3, 'AVAILABLE', '2024-09-05 16:30:10', 'system'),
(29, 1, 3, 'AVAILABLE', '2024-09-05 16:31:29', 'system'),
(30, 1, 3, 'AVAILABLE', '2024-09-05 16:31:32', 'system'),
(31, 1, 3, 'AVAILABLE', '2024-09-05 16:31:43', 'system'),
(32, 1, 4, 'AVAILABLE', '2024-09-05 16:32:19', 'system'),
(33, 8, 4, 'AVAILABLE', '2024-09-05 16:32:19', 'system'),
(34, 1, 3, 'AVAILABLE', '2024-09-05 16:34:04', 'system'),
(35, 1, 3, 'AVAILABLE', '2024-09-05 16:34:11', 'system'),
(36, 8, 3, 'AVAILABLE', '2024-09-05 16:34:36', 'system'),
(37, 6, 3, 'AVAILABLE', '2024-09-05 16:34:39', 'system'),
(38, 10, 3, 'AVAILABLE', '2024-09-05 16:34:47', 'system'),
(39, 7, 3, 'AVAILABLE', '2024-09-05 16:34:57', 'system'),
(40, 6, 3, 'AVAILABLE', '2024-09-05 16:35:21', 'system'),
(41, 8, 3, 'AVAILABLE', '2024-09-05 16:35:21', 'system'),
(42, 6, 3, 'AVAILABLE', '2024-09-05 16:35:25', 'system'),
(43, 6, 3, 'AVAILABLE', '2024-09-05 16:35:33', 'system'),
(44, 6, 3, 'AVAILABLE', '2024-09-05 16:35:35', 'system'),
(45, 6, 3, 'AVAILABLE', '2024-09-05 16:35:53', 'system'),
(46, 6, 3, 'AVAILABLE', '2024-09-05 16:35:55', 'system'),
(47, 8, 3, 'AVAILABLE', '2024-09-05 16:36:09', 'system'),
(48, 4, 3, 'AVAILABLE', '2024-09-05 16:36:12', 'system'),
(49, 6, 3, 'AVAILABLE', '2024-09-05 16:36:16', 'system'),
(50, 6, 3, 'AVAILABLE', '2024-09-05 16:36:25', 'system'),
(51, 6, 3, 'AVAILABLE', '2024-09-05 16:36:57', 'system'),
(52, 4, 3, 'AVAILABLE', '2024-09-05 16:36:58', 'system'),
(53, 8, 3, 'AVAILABLE', '2024-09-05 16:36:58', 'system'),
(54, 6, 3, 'AVAILABLE', '2024-09-05 16:37:02', 'system'),
(55, 4, 3, 'AVAILABLE', '2024-09-05 16:37:02', 'system'),
(56, 4, 3, 'AVAILABLE', '2024-09-05 16:37:09', 'system'),
(57, 6, 3, 'AVAILABLE', '2024-09-05 16:37:26', 'system'),
(58, 4, 3, 'AVAILABLE', '2024-09-05 16:37:26', 'system'),
(59, 6, 3, 'AVAILABLE', '2024-09-05 16:37:29', 'system'),
(60, 4, 3, 'AVAILABLE', '2024-09-05 16:37:29', 'system'),
(61, 6, 3, 'AVAILABLE', '2024-09-05 16:37:39', 'system'),
(62, 9, 4, 'AVAILABLE', '2024-09-05 16:40:05', 'system'),
(63, 2, 4, 'AVAILABLE', '2024-09-05 16:40:06', 'system'),
(64, 4, 4, 'AVAILABLE', '2024-09-05 16:40:06', 'system'),
(65, 10, 4, 'AVAILABLE', '2024-09-05 16:40:07', 'system'),
(66, 6, 4, 'AVAILABLE', '2024-09-05 16:40:07', 'system'),
(67, 7, 4, 'AVAILABLE', '2024-09-05 16:40:08', 'system'),
(68, 8, 4, 'AVAILABLE', '2024-09-05 16:40:09', 'system'),
(69, 3, 4, 'AVAILABLE', '2024-09-05 16:40:09', 'system'),
(70, 11, 4, 'AVAILABLE', '2024-09-05 16:40:10', 'system'),
(71, 5, 4, 'AVAILABLE', '2024-09-05 16:40:11', 'system'),
(72, 1, 4, 'AVAILABLE', '2024-09-05 16:40:12', 'system'),
(73, 14, 2, 'AVAILABLE', '2024-09-10 15:51:56', 'system'),
(74, 14, 2, 'AVAILABLE', '2024-09-10 15:52:03', 'system'),
(75, 14, 2, 'AVAILABLE', '2024-09-10 15:56:27', 'system'),
(76, 14, 2, 'AVAILABLE', '2024-09-10 15:58:30', 'system'),
(77, 14, 2, 'AVAILABLE', '2024-09-10 15:58:46', 'system'),
(78, 14, 2, 'AVAILABLE', '2024-09-10 16:03:09', 'system'),
(79, 15, 2, 'AVAILABLE', '2024-09-10 20:11:39', 'system'),
(80, 15, 2, 'AVAILABLE', '2024-09-10 20:11:49', 'system'),
(81, 15, 2, 'AVAILABLE', '2024-09-10 20:11:56', 'system'),
(82, 15, 2, 'AVAILABLE', '2024-09-10 20:11:59', 'system'),
(83, 15, 2, 'AVAILABLE', '2024-09-10 20:12:06', 'system'),
(84, 15, 2, 'AVAILABLE', '2024-09-10 20:12:07', 'system'),
(85, 15, 2, 'AVAILABLE', '2024-09-10 20:12:14', 'system'),
(86, 21, 2, 'AVAILABLE', '2024-09-11 10:26:04', 'system'),
(87, 21, 2, 'AVAILABLE', '2024-09-11 10:26:29', 'system'),
(88, 13, 2, 'AVAILABLE', '2024-09-11 10:27:29', 'system'),
(89, 13, 2, 'AVAILABLE', '2024-09-11 10:29:23', 'system'),
(90, 13, 2, 'AVAILABLE', '2024-09-11 10:29:42', 'system'),
(91, 13, 2, 'AVAILABLE', '2024-09-11 10:29:47', 'system'),
(92, 13, 2, 'AVAILABLE', '2024-09-11 10:29:58', 'system'),
(93, 13, 2, 'AVAILABLE', '2024-09-11 10:30:07', 'system'),
(94, 13, 2, 'AVAILABLE', '2024-09-11 10:30:09', 'system'),
(95, 13, 2, 'AVAILABLE', '2024-09-11 10:30:12', 'system'),
(96, 13, 2, 'AVAILABLE', '2024-09-11 10:30:13', 'system'),
(97, 13, 2, 'AVAILABLE', '2024-09-11 10:30:18', 'system'),
(98, 13, 2, 'AVAILABLE', '2024-09-11 10:30:32', 'system'),
(99, 13, 2, 'AVAILABLE', '2024-09-11 10:30:44', 'system'),
(100, 13, 2, 'AVAILABLE', '2024-09-11 10:30:57', 'system'),
(101, 13, 2, 'AVAILABLE', '2024-09-11 10:31:05', 'system'),
(102, 13, 2, 'AVAILABLE', '2024-09-11 10:32:51', 'system'),
(103, 13, 2, 'AVAILABLE', '2024-09-12 03:35:10', 'system'),
(104, 2, 2, 'AVAILABLE', '2024-09-12 03:35:10', 'system'),
(105, 13, 2, 'AVAILABLE', '2024-09-12 03:36:50', 'system'),
(106, 13, 2, 'AVAILABLE', '2024-09-12 03:36:58', 'system'),
(107, 13, 2, 'AVAILABLE', '2024-09-12 03:37:31', 'system'),
(108, 13, 2, 'AVAILABLE', '2024-09-12 03:37:40', 'system'),
(109, 15, 2, 'AVAILABLE', '2024-09-12 07:48:26', 'system'),
(110, 20, 2, 'AVAILABLE', '2024-09-12 07:51:32', 'system'),
(111, 20, 2, 'AVAILABLE', '2024-09-12 07:54:04', 'system'),
(112, 20, 2, 'AVAILABLE', '2024-09-12 07:54:59', 'system'),
(113, 20, 2, 'AVAILABLE', '2024-09-12 07:55:30', 'system'),
(114, 20, 2, 'AVAILABLE', '2024-09-12 08:04:35', 'system'),
(115, 20, 2, 'AVAILABLE', '2024-09-12 08:05:00', 'system'),
(116, 20, 2, 'AVAILABLE', '2024-09-12 08:05:24', 'system'),
(117, 20, 2, 'AVAILABLE', '2024-09-12 08:05:46', 'system'),
(118, 20, 2, 'AVAILABLE', '2024-09-12 08:05:53', 'system'),
(119, 20, 2, 'AVAILABLE', '2024-09-12 08:09:39', 'system'),
(120, 20, 2, 'AVAILABLE', '2024-09-12 08:09:52', 'system'),
(121, 20, 2, 'AVAILABLE', '2024-09-12 08:16:37', 'system'),
(122, 20, 2, 'AVAILABLE', '2024-09-12 08:26:58', 'system'),
(123, 20, 2, 'AVAILABLE', '2024-09-12 08:27:01', 'system'),
(124, 20, 2, 'AVAILABLE', '2024-09-12 08:32:53', 'system'),
(125, 20, 2, 'AVAILABLE', '2024-09-12 08:32:56', 'system'),
(126, 15, 2, 'AVAILABLE', '2024-09-12 08:33:13', 'system'),
(127, 20, 2, 'AVAILABLE', '2024-09-12 08:33:29', 'system'),
(128, 17, 2, 'AVAILABLE', '2024-09-12 08:33:29', 'system'),
(129, 20, 2, 'AVAILABLE', '2024-09-12 08:33:45', 'system'),
(130, 17, 2, 'AVAILABLE', '2024-09-12 08:33:45', 'system'),
(131, 20, 2, 'AVAILABLE', '2024-09-12 08:33:55', 'system'),
(132, 20, 2, 'AVAILABLE', '2024-09-12 08:34:48', 'system'),
(133, 17, 2, 'AVAILABLE', '2024-09-12 08:34:48', 'system'),
(134, 20, 2, 'AVAILABLE', '2024-09-12 08:35:45', 'system'),
(135, 17, 2, 'AVAILABLE', '2024-09-12 08:35:46', 'system'),
(136, 20, 2, 'AVAILABLE', '2024-09-13 11:27:42', 'system'),
(137, 20, 2, 'AVAILABLE', '2024-09-13 11:28:23', 'system'),
(138, 14, 11, 'AVAILABLE', '2024-09-15 17:58:54', 'system'),
(139, 2, 11, 'AVAILABLE', '2024-09-15 17:58:55', 'system'),
(140, 14, 11, 'AVAILABLE', '2024-09-15 17:59:04', 'system'),
(141, 2, 11, 'AVAILABLE', '2024-09-15 17:59:04', 'system'),
(142, 2, 11, 'AVAILABLE', '2024-09-15 17:59:06', 'system'),
(143, 2, 11, 'AVAILABLE', '2024-09-15 17:59:08', 'system'),
(144, 14, 11, 'AVAILABLE', '2024-09-15 17:59:19', 'system'),
(145, 2, 11, 'AVAILABLE', '2024-09-15 17:59:19', 'system'),
(146, 3, 11, 'AVAILABLE', '2024-09-15 17:59:20', 'system'),
(147, 14, 11, 'AVAILABLE', '2024-09-15 17:59:20', 'system'),
(148, 3, 11, 'AVAILABLE', '2024-09-15 17:59:24', 'system'),
(149, 1, 11, 'AVAILABLE', '2024-09-15 17:59:24', 'system'),
(150, 4, 11, 'AVAILABLE', '2024-09-15 17:59:24', 'system'),
(151, 5, 11, 'AVAILABLE', '2024-09-15 17:59:27', 'system'),
(152, 5, 11, 'AVAILABLE', '2024-09-15 17:59:29', 'system'),
(153, 14, 11, 'AVAILABLE', '2024-09-15 17:59:29', 'system'),
(154, 1, 11, 'AVAILABLE', '2024-09-15 18:00:11', 'system'),
(155, 1, 11, 'AVAILABLE', '2024-09-15 18:00:17', 'system'),
(156, 3, 11, 'AVAILABLE', '2024-09-15 18:00:59', 'system'),
(157, 17, 11, 'AVAILABLE', '2024-09-15 18:00:59', 'system'),
(158, 19, 11, 'AVAILABLE', '2024-09-15 18:00:59', 'system'),
(159, 19, 11, 'AVAILABLE', '2024-09-15 18:01:01', 'system'),
(160, 20, 11, 'AVAILABLE', '2024-09-15 18:01:13', 'system'),
(161, 17, 11, 'AVAILABLE', '2024-09-15 18:01:14', 'system'),
(162, 17, 11, 'AVAILABLE', '2024-09-15 18:01:15', 'system'),
(163, 17, 11, 'AVAILABLE', '2024-09-15 18:01:24', 'system'),
(164, 20, 11, 'AVAILABLE', '2024-09-15 18:01:38', 'system'),
(165, 17, 11, 'AVAILABLE', '2024-09-15 18:01:39', 'system'),
(166, 17, 11, 'AVAILABLE', '2024-09-15 18:04:17', 'system'),
(167, 17, 11, 'AVAILABLE', '2024-09-15 18:04:18', 'system'),
(168, 17, 11, 'AVAILABLE', '2024-09-15 18:04:26', 'system'),
(169, 17, 11, 'AVAILABLE', '2024-09-15 18:04:37', 'system'),
(170, 17, 11, 'AVAILABLE', '2024-09-15 18:04:44', 'system'),
(171, 17, 11, 'AVAILABLE', '2024-09-15 18:05:08', 'system'),
(172, 17, 11, 'AVAILABLE', '2024-09-15 18:05:14', 'system'),
(173, 17, 11, 'AVAILABLE', '2024-09-15 18:05:43', 'system'),
(174, 3, 11, 'AVAILABLE', '2024-09-15 18:06:39', 'system'),
(175, 17, 11, 'AVAILABLE', '2024-09-15 18:06:44', 'system'),
(176, 17, 11, 'AVAILABLE', '2024-09-15 18:06:53', 'system'),
(177, 17, 11, 'AVAILABLE', '2024-09-15 18:07:11', 'system'),
(178, 17, 11, 'AVAILABLE', '2024-09-15 18:07:20', 'system'),
(179, 17, 11, 'AVAILABLE', '2024-09-15 18:11:56', 'system'),
(180, 17, 2, 'AVAILABLE', '2024-09-15 18:14:33', 'system'),
(181, 17, 2, 'AVAILABLE', '2024-09-15 18:14:58', 'system'),
(182, 17, 2, 'AVAILABLE', '2024-09-15 18:15:22', 'system'),
(183, 17, 2, 'AVAILABLE', '2024-09-15 18:15:45', 'system'),
(184, 17, 2, 'AVAILABLE', '2024-09-15 18:16:14', 'system'),
(185, 17, 11, 'AVAILABLE', '2024-09-15 18:16:15', 'system'),
(186, 17, 2, 'AVAILABLE', '2024-09-15 18:16:19', 'system'),
(187, 17, 11, 'AVAILABLE', '2024-09-15 18:16:19', 'system'),
(188, 17, 2, 'AVAILABLE', '2024-09-15 18:16:53', 'system'),
(189, 17, 2, 'AVAILABLE', '2024-09-15 18:17:02', 'system'),
(190, 17, 2, 'AVAILABLE', '2024-09-15 18:17:21', 'system'),
(191, 17, 11, 'AVAILABLE', '2024-09-15 18:17:57', 'system'),
(192, 17, 11, 'AVAILABLE', '2024-09-15 18:18:07', 'system');

-- --------------------------------------------------------

--
-- Table structure for table `tag_reader`
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
  `reader_created` datetime NOT NULL,
  `reader_family` enum('hw','rc') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tag_reader`
--

INSERT INTO `tag_reader` (`reader_id`, `librarian_id`, `reader_name`, `reader_serialnumber`, `reader_type`, `reader_ip`, `reader_port`, `reader_com`, `reader_baudrate`, `reader_power`, `reader_interval`, `reader_mode`, `reader_updatedby`, `reader_updated`, `reader_createdby`, `reader_created`, `reader_family`) VALUES
(1, 2, 'Reader Ruang Stok Lt.1', '23050145', 'tcp', '192.168.1.91', '6000', '/dev/cu.usbserial-1410', '57600', 25, '1000', 'answer', 1, '2024-09-05 15:59:45', 1, '2024-05-21 17:43:17', 'hw'),
(2, 3, 'Reader Ruangan Staging', 'x', 'tcp', '192.168.1.90', '6000', 'COM5', '57600', 25, '1000', 'answer', 1, '2024-09-03 13:47:24', 1, '2024-05-21 17:44:50', 'hw'),
(3, 4, 'Reader Backup Restore', 'x', 'tcp', '192.168.1.92', '6000', 'COM3', '57600', 25, '1000', 'answer', 1, '2024-09-05 16:10:53', 1, '2024-09-05 16:10:53', 'hw'),
(4, 11, 'Reader Ruangan Arsip - MM', 'x', 'tcp', '192.168.1.200', '2022', 'COM3', '9600', 25, '1000', 'answer', 1, '2024-09-13 15:08:43', 1, '2024-09-13 15:08:43', 'rc');

-- --------------------------------------------------------

--
-- Table structure for table `tag_rfid`
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
-- Dumping data for table `tag_rfid`
--

INSERT INTO `tag_rfid` (`rfid_id`, `label_id`, `rfid_barcode`, `rfid_rfid`, `rfid_status`, `rfid_note`, `rfid_created`, `rfid_createdby`, `rfid_updated`, `rfid_updatedby`) VALUES
(1, 1, '20240901', '323032343039303100000000', 'yes', 'normal', '2024-09-05 14:09:54', 1, '2024-09-05 14:09:54', 1),
(2, 1, '20240902', '323032343039303200000000', 'yes', 'normal', '2024-09-05 14:10:46', 1, '2024-09-05 14:10:46', 1),
(3, 1, '20240903', '323032343039303300000000', 'yes', 'normal', '2024-09-05 14:12:17', 1, '2024-09-05 14:12:17', 1),
(4, 1, '20240904', '323032343039303400000000', 'yes', 'normal', '2024-09-05 14:12:42', 1, '2024-09-05 14:12:42', 1),
(5, 1, '20240905', '323032343039303500000000', 'yes', 'normal', '2024-09-05 14:13:07', 1, '2024-09-05 14:13:07', 1),
(6, 1, '20240906', '323032343039303600000000', 'yes', 'normal', '2024-09-05 14:13:34', 1, '2024-09-05 14:13:34', 1),
(7, 1, '20240907', '323032343039303700000000', 'yes', 'normal', '2024-09-05 14:14:06', 1, '2024-09-05 14:14:06', 1),
(8, 1, '20240908', '323032343039303800000000', 'yes', 'normal', '2024-09-05 14:14:38', 1, '2024-09-05 14:14:38', 1),
(9, 1, '20240909', '323032343039303900000000', 'yes', 'normal', '2024-09-05 14:14:58', 1, '2024-09-05 14:14:58', 1),
(10, 1, '20240910', '323032343039313000000000', 'yes', 'normal', '2024-09-05 14:15:19', 1, '2024-09-05 14:15:19', 1),
(11, 1, '20240911', '323032343039313100000000', 'yes', 'normal', '2024-09-05 14:15:40', 1, '2024-09-05 14:15:40', 1),
(12, 1, '20240912', '323032343039313200000000', 'yes', 'normal', '2024-09-09 15:51:51', 1, '2024-09-09 15:51:51', 1),
(13, 1, '20240913', '323032343039313300000000', 'yes', 'normal', '2024-09-09 15:54:50', 1, '2024-09-09 15:54:50', 1),
(14, 1, '20240006', '323032343030303600000000', 'yes', 'normal', '2024-09-10 08:58:30', 1, '2024-09-10 08:58:30', 1),
(15, 1, 'UG654321', '554736353433323100000000', 'yes', 'normal', '2024-09-10 09:01:48', 1, '2024-09-10 09:01:48', 1),
(17, 1, '20240001', '323032343030303100000000', 'yes', 'normal', '2024-09-10 10:31:24', 1, '2024-09-10 10:31:24', 1),
(18, 1, 'UG223344', '554732323333343400000000', 'yes', 'normal', '2024-09-10 10:59:15', 1, '2024-09-10 10:59:15', 1),
(19, 1, '20240002', '323032343030303200000000', 'yes', 'normal', '2024-09-10 11:00:59', 1, '2024-09-10 11:00:59', 1),
(20, 1, '20240914', '323032343039313400000000', 'yes', 'normal', '2024-09-10 11:04:35', 1, '2024-09-10 11:04:35', 1),
(21, 1, '20240915', '323032343039313500000000', 'yes', 'normal', '2024-09-10 11:06:23', 1, '2024-09-10 11:06:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `widgeds`
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
-- Indexes for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_group_to_group`
--
ALTER TABLE `aauth_group_to_group`
  ADD PRIMARY KEY (`group_id`,`subgroup_id`);

--
-- Indexes for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_perm_to_user`
--
ALTER TABLE `aauth_perm_to_user`
  ADD PRIMARY KEY (`user_id`,`perm_id`);

--
-- Indexes for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user`
--
ALTER TABLE `aauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_users`
--
ALTER TABLE `aauth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aauth_user_to_group`
--
ALTER TABLE `aauth_user_to_group`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `cc_options`
--
ALTER TABLE `cc_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_contact`
--
ALTER TABLE `chat_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_action`
--
ALTER TABLE `crud_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field`
--
ALTER TABLE `crud_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field_condition`
--
ALTER TABLE `crud_field_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_function`
--
ALTER TABLE `crud_function`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_input_type`
--
ALTER TABLE `crud_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_custom_option`
--
ALTER TABLE `form_custom_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field_validation`
--
ALTER TABLE `form_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_block_element`
--
ALTER TABLE `page_block_element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder_condition`
--
ALTER TABLE `reminder_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder_cron`
--
ALTER TABLE `reminder_cron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest`
--
ALTER TABLE `rest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_field`
--
ALTER TABLE `rest_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_input_type`
--
ALTER TABLE `rest_input_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_anomaly`
--
ALTER TABLE `tag_anomaly`
  ADD PRIMARY KEY (`anomaly_id`);

--
-- Indexes for table `tag_borrow`
--
ALTER TABLE `tag_borrow`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `tag_broken`
--
ALTER TABLE `tag_broken`
  ADD PRIMARY KEY (`broken_id`);

--
-- Indexes for table `tag_building`
--
ALTER TABLE `tag_building`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `tag_label`
--
ALTER TABLE `tag_label`
  ADD PRIMARY KEY (`label_id`);

--
-- Indexes for table `tag_librarian`
--
ALTER TABLE `tag_librarian`
  ADD PRIMARY KEY (`librarian_id`),
  ADD KEY `Gedung_ID` (`building_id`);

--
-- Indexes for table `tag_location`
--
ALTER TABLE `tag_location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `tm_id` (`rfid_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Indexes for table `tag_location1`
--
ALTER TABLE `tag_location1`
  ADD PRIMARY KEY (`tl_id`),
  ADD KEY `tm_id` (`tm_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Indexes for table `tag_location_log`
--
ALTER TABLE `tag_location_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `tm_id` (`rfid_id`),
  ADD KEY `librarian_id` (`librarian_id`);

--
-- Indexes for table `tag_reader`
--
ALTER TABLE `tag_reader`
  ADD PRIMARY KEY (`reader_id`),
  ADD KEY `Gedung_ID` (`librarian_id`);

--
-- Indexes for table `tag_rfid`
--
ALTER TABLE `tag_rfid`
  ADD PRIMARY KEY (`rfid_id`),
  ADD UNIQUE KEY `rfid_barcode` (`rfid_barcode`),
  ADD UNIQUE KEY `rfid_rfid` (`rfid_rfid`);

--
-- Indexes for table `widgeds`
--
ALTER TABLE `widgeds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aauth_groups`
--
ALTER TABLE `aauth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=941;

--
-- AUTO_INCREMENT for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_user`
--
ALTER TABLE `aauth_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cc_options`
--
ALTER TABLE `cc_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_contact`
--
ALTER TABLE `chat_contact`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crud_action`
--
ALTER TABLE `crud_action`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=818;

--
-- AUTO_INCREMENT for table `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2033;

--
-- AUTO_INCREMENT for table `crud_field_condition`
--
ALTER TABLE `crud_field_condition`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1611;

--
-- AUTO_INCREMENT for table `crud_function`
--
ALTER TABLE `crud_function`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_custom_option`
--
ALTER TABLE `form_custom_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_field_validation`
--
ALTER TABLE `form_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_block_element`
--
ALTER TABLE `page_block_element`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder_condition`
--
ALTER TABLE `reminder_condition`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder_cron`
--
ALTER TABLE `reminder_cron`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rest_field`
--
ALTER TABLE `rest_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `rest_input_type`
--
ALTER TABLE `rest_input_type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tag_anomaly`
--
ALTER TABLE `tag_anomaly`
  MODIFY `anomaly_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tag_borrow`
--
ALTER TABLE `tag_borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag_broken`
--
ALTER TABLE `tag_broken`
  MODIFY `broken_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag_building`
--
ALTER TABLE `tag_building`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tag_label`
--
ALTER TABLE `tag_label`
  MODIFY `label_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag_librarian`
--
ALTER TABLE `tag_librarian`
  MODIFY `librarian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tag_location`
--
ALTER TABLE `tag_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tag_location1`
--
ALTER TABLE `tag_location1`
  MODIFY `tl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag_location_log`
--
ALTER TABLE `tag_location_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `tag_reader`
--
ALTER TABLE `tag_reader`
  MODIFY `reader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag_rfid`
--
ALTER TABLE `tag_rfid`
  MODIFY `rfid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `widgeds`
--
ALTER TABLE `widgeds`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
