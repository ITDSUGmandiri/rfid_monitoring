-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2024 at 10:19 AM
-- Server version: 8.0.40-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekneg_aset_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `aauth_groups`
--

CREATE TABLE `aauth_groups` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `aauth_groups`
--

INSERT INTO `aauth_groups` (`id`, `name`, `definition`) VALUES
(1, 'admin', 'Super User'),
(2, 'Public', 'Public Group'),
(3, 'Default', 'Default Access Group'),
(4, 'Member', 'Member Access Group');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_group_to_group`
--

CREATE TABLE `aauth_group_to_group` (
  `group_id` int UNSIGNED NOT NULL,
  `subgroup_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_login_attempts`
--

CREATE TABLE `aauth_login_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(39) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `aauth_login_attempts`
--

INSERT INTO `aauth_login_attempts` (`id`, `ip_address`, `timestamp`, `login_attempts`) VALUES
(1218, '172.70.189.166', '2024-11-06 15:56:28', 1),
(1219, '172.70.189.165', '2024-11-06 15:56:52', 1),
(1269, '172.71.81.67', '2024-11-08 13:32:19', 1),
(1291, '172.71.154.238', '2024-11-10 00:45:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perms`
--

CREATE TABLE `aauth_perms` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(122, 'menu_reader', ''),
(128, 'keys_list', ''),
(129, 'rest_edit', ''),
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
(203, 'menu_main_navigation', ''),
(204, 'lokasi_kerja_add', ''),
(205, 'lokasi_kerja_update', ''),
(206, 'lokasi_kerja_view', ''),
(207, 'lokasi_kerja_delete', ''),
(208, 'lokasi_kerja_list', ''),
(209, 'menu_area', ''),
(210, 'bmn_add', ''),
(211, 'bmn_update', ''),
(212, 'bmn_view', ''),
(213, 'bmn_delete', ''),
(214, 'bmn_list', ''),
(245, 'menu_master_asset', ''),
(246, 'menu_data_barang', ''),
(247, 'menu_data_ruangan', ''),
(253, 'menu_data_reader', ''),
(254, 'menu_data_pengguna', ''),
(255, 'menu_data_akun', ''),
(256, 'menu_data_pegawai', ''),
(257, 'tb_pegawai_master_add', ''),
(258, 'tb_pegawai_master_update', ''),
(259, 'tb_pegawai_master_view', ''),
(260, 'tb_pegawai_master_delete', ''),
(261, 'tb_pegawai_master_list', ''),
(262, 'tb_kondisi_master_add', ''),
(263, 'tb_kondisi_master_update', ''),
(264, 'tb_kondisi_master_view', ''),
(265, 'tb_kondisi_master_delete', ''),
(266, 'tb_kondisi_master_list', ''),
(267, 'menu_data_kondisi', ''),
(268, 'menu_monitoring', ''),
(269, 'menu_inventarisasi', ''),
(280, 'menu_pergerakan_aset', ''),
(286, 'menu_peminjaman', ''),
(287, 'menu_mutasi_aset', ''),
(288, 'menu_log_aktivitas', ''),
(294, 'menu_data_area', ''),
(310, 'menu_data_gedung', ''),
(326, 'tb_mutasi_asset_add', ''),
(327, 'tb_mutasi_asset_update', ''),
(328, 'tb_mutasi_asset_view', ''),
(329, 'tb_mutasi_asset_delete', ''),
(330, 'tb_mutasi_asset_list', ''),
(336, 'tb_asset_master_add', ''),
(337, 'tb_asset_master_update', ''),
(338, 'tb_asset_master_view', ''),
(339, 'tb_asset_master_delete', ''),
(340, 'tb_asset_master_list', ''),
(341, 'tb_pinjam_log_add', ''),
(342, 'tb_pinjam_log_update', ''),
(343, 'tb_pinjam_log_view', ''),
(344, 'tb_pinjam_log_delete', ''),
(345, 'tb_pinjam_log_list', ''),
(346, 'tb_log_act_add', ''),
(347, 'tb_log_act_update', ''),
(348, 'tb_log_act_view', ''),
(349, 'tb_log_act_delete', ''),
(350, 'tb_log_act_list', ''),
(351, 'tb_asset_moving_add', ''),
(352, 'tb_asset_moving_update', ''),
(353, 'tb_asset_moving_view', ''),
(354, 'tb_asset_moving_delete', ''),
(355, 'tb_asset_moving_list', ''),
(356, 'tb_pinjam_log_export', ''),
(372, 'api_tag_reader_all', ''),
(373, 'api_tag_reader_detail', ''),
(374, 'api_tag_reader_add', ''),
(375, 'api_tag_reader_update', ''),
(376, 'api_tag_reader_delete', ''),
(382, 'api_tb_room_master_all', ''),
(383, 'api_tb_room_master_detail', ''),
(384, 'api_tb_room_master_add', ''),
(385, 'api_tb_room_master_update', ''),
(386, 'api_tb_room_master_delete', ''),
(387, 'api_tb_asset_master_all', ''),
(388, 'api_tb_asset_master_detail', ''),
(389, 'api_tb_asset_master_add', ''),
(390, 'api_tb_asset_master_update', ''),
(391, 'api_tb_asset_master_delete', ''),
(392, 'tb_kelompok_kerjaan_add', ''),
(393, 'tb_kelompok_kerjaan_update', ''),
(394, 'tb_kelompok_kerjaan_view', ''),
(395, 'tb_kelompok_kerjaan_delete', ''),
(396, 'tb_kelompok_kerjaan_list', ''),
(397, 'tb_asset_master_export', ''),
(398, 'tb_category_aset_add', ''),
(399, 'tb_category_aset_update', ''),
(400, 'tb_category_aset_view', ''),
(401, 'tb_category_aset_delete', ''),
(402, 'tb_category_aset_list', ''),
(403, 'api_tag_temp_table_all', ''),
(404, 'api_tag_temp_table_detail', ''),
(405, 'api_tag_temp_table_add', ''),
(406, 'api_tag_temp_table_update', ''),
(407, 'api_tag_temp_table_delete', ''),
(408, 'tag_reader_add', ''),
(409, 'tag_reader_update', ''),
(410, 'tag_reader_view', ''),
(411, 'tag_reader_delete', ''),
(412, 'tag_reader_list', ''),
(418, 'tb_history_invent_add', ''),
(419, 'tb_history_invent_update', ''),
(420, 'tb_history_invent_view', ''),
(421, 'tb_history_invent_delete', ''),
(422, 'tb_history_invent_list', ''),
(423, 'tb_area_master_add', ''),
(424, 'tb_area_master_update', ''),
(425, 'tb_area_master_view', ''),
(426, 'tb_area_master_delete', ''),
(427, 'tb_area_master_list', ''),
(428, 'tb_gedung_master_add', ''),
(429, 'tb_gedung_master_update', ''),
(430, 'tb_gedung_master_view', ''),
(431, 'tb_gedung_master_delete', ''),
(432, 'tb_gedung_master_list', ''),
(433, 'tb_room_master_add', ''),
(434, 'tb_room_master_update', ''),
(435, 'tb_room_master_view', ''),
(436, 'tb_room_master_delete', ''),
(437, 'tb_room_master_list', ''),
(438, 'ug_mstag_add', ''),
(439, 'ug_mstag_update', ''),
(440, 'ug_mstag_view', ''),
(441, 'ug_mstag_delete', ''),
(442, 'ug_mstag_list', ''),
(443, 'menu_data_tag_rfid', ''),
(449, 'menu_register_aset', ''),
(450, 'tb_master_transaksi_add', ''),
(451, 'tb_master_transaksi_update', ''),
(452, 'tb_master_transaksi_view', ''),
(453, 'tb_master_transaksi_delete', ''),
(454, 'tb_master_transaksi_list', ''),
(455, 'tb_master_aset_add', ''),
(456, 'tb_master_aset_update', ''),
(457, 'tb_master_aset_view', ''),
(458, 'tb_master_aset_delete', ''),
(459, 'tb_master_aset_list', ''),
(460, 'menu_master_aset', ''),
(461, 'menu_master_area', ''),
(462, 'menu_master_gedung', ''),
(463, 'menu_master_ruangan', ''),
(464, 'menu_master_pegawai', ''),
(465, 'menu_master_tag_rfid', ''),
(466, 'menu_sensus', ''),
(467, 'menu_pengembalian', ''),
(468, 'menu_transaksi', ''),
(469, 'menu_mutasi', ''),
(470, 'menu_lacak_aset', ''),
(471, 'menu_regristrasi_tag_rfid', ''),
(472, 'menu_regristasi_aset', ''),
(473, 'menu_aset', ''),
(474, 'menu_laporan', ''),
(475, 'menu_pengaturan', ''),
(476, 'menu_perbaikan', ''),
(477, 'permission_edit', ''),
(478, 'table_asset_master_add', ''),
(479, 'menu_pendaftaran_rfid', '');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_group`
--

CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int NOT NULL,
  `group_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `aauth_perm_to_group`
--

INSERT INTO `aauth_perm_to_group` (`perm_id`, `group_id`) VALUES
(186, 0),
(185, 0),
(245, 1),
(161, 1),
(161, 1),
(468, 1),
(468, 6),
(474, 1),
(170, 1),
(170, 1),
(475, 1),
(1, 1),
(476, 1),
(161, 1),
(161, 1),
(467, 1),
(1, 2),
(460, 2),
(461, 2),
(462, 2),
(463, 2),
(464, 2),
(465, 2),
(479, 1),
(269, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_perm_to_user`
--

CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_pms`
--

CREATE TABLE `aauth_pms` (
  `id` int UNSIGNED NOT NULL,
  `sender_id` int UNSIGNED NOT NULL,
  `receiver_id` int UNSIGNED NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int DEFAULT NULL,
  `pm_deleted_receiver` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user`
--

CREATE TABLE `aauth_user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `aauth_users`
--

CREATE TABLE `aauth_users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `oauth_uid` text,
  `oauth_provider` varchar(100) DEFAULT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `top_secret` varchar(16) DEFAULT NULL,
  `ip_address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `aauth_users`
--

INSERT INTO `aauth_users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `pass`, `username`, `full_name`, `avatar`, `banned`, `last_login`, `last_activity`, `date_created`, `forgot_exp`, `remember_time`, `remember_exp`, `verification_code`, `top_secret`, `ip_address`) VALUES
(1, 'admin@gmail.com', NULL, NULL, '0098f77459b6d78055fb8a02879ea004f1a49f18468a6ddc69a9c57327b957f4', 'administrator', 'Administrator', '20241108091405-setkab01.jpeg', 0, '2024-12-05 16:42:01', '2024-12-05 16:42:01', '2024-05-21 05:44:44', NULL, '2024-10-27 00:00:00', '5HfWD7Gjzn4Tdtyc', NULL, NULL, '::1'),
(3, 'usersatu@gmail.com', NULL, NULL, '4b1fbcf811f49742fac555ff6ecb931ebf35a396cc933877acbd13fe369f1793', 'usersatu', 'User Satu', '20241204094816-iconars.png', 0, '2024-12-05 16:41:14', '2024-12-05 16:41:14', '2024-12-04 09:48:16', NULL, '2024-10-27 00:00:00', '5HfWD7Gjzn4Tdtyc', NULL, NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_to_group`
--

CREATE TABLE `aauth_user_to_group` (
  `user_id` int UNSIGNED NOT NULL,
  `group_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `aauth_user_to_group`
--

INSERT INTO `aauth_user_to_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(3, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `aauth_user_variables`
--

CREATE TABLE `aauth_user_variables` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `tags` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewers` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `category_id` int UNSIGNED NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `captcha_id` int UNSIGNED NOT NULL,
  `captcha_time` int DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, NULL, '::1', NULL),
(2, NULL, '::1', NULL),
(3, NULL, '::1', NULL),
(4, NULL, '::1', NULL),
(5, NULL, '::1', NULL),
(6, NULL, '::1', NULL),
(7, NULL, '::1', NULL),
(8, NULL, '::1', NULL),
(9, NULL, '::1', NULL),
(10, NULL, '::1', NULL),
(11, NULL, '::1', NULL),
(12, NULL, '::1', NULL),
(13, NULL, '::1', NULL),
(14, NULL, '::1', NULL),
(15, NULL, '::1', NULL),
(16, NULL, '::1', NULL),
(17, NULL, '::1', NULL),
(18, NULL, '::1', NULL),
(19, NULL, '::1', NULL),
(20, NULL, '::1', NULL),
(21, NULL, '::1', NULL),
(22, NULL, '::1', NULL),
(23, NULL, '::1', NULL),
(24, NULL, '::1', NULL),
(25, NULL, '::1', NULL),
(26, NULL, '::1', NULL),
(27, NULL, '::1', NULL),
(28, NULL, '::1', NULL),
(29, NULL, '::1', NULL),
(30, NULL, '::1', NULL),
(31, NULL, '::1', NULL),
(32, NULL, '::1', NULL),
(33, NULL, '::1', NULL),
(34, NULL, '::1', NULL),
(35, NULL, '::1', NULL),
(36, NULL, '::1', NULL),
(37, NULL, '::1', NULL),
(38, NULL, '::1', NULL),
(39, NULL, '::1', NULL),
(40, NULL, '::1', NULL),
(41, NULL, '::1', NULL),
(42, NULL, '::1', NULL),
(43, NULL, '::1', NULL),
(44, NULL, '::1', NULL),
(45, NULL, '::1', NULL),
(46, NULL, '::1', NULL),
(47, NULL, '::1', NULL),
(48, NULL, '::1', NULL),
(49, NULL, '::1', NULL),
(50, NULL, '::1', NULL),
(51, NULL, '::1', NULL),
(52, NULL, '::1', NULL),
(53, NULL, '::1', NULL),
(54, NULL, '::1', NULL),
(55, NULL, '::1', NULL),
(56, NULL, '::1', NULL),
(57, NULL, '::1', NULL),
(58, NULL, '::1', NULL),
(59, NULL, '::1', NULL),
(62, NULL, '::1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cc_options`
--

CREATE TABLE `cc_options` (
  `id` int UNSIGNED NOT NULL,
  `option_name` varchar(200) NOT NULL,
  `option_value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cc_options`
--

INSERT INTO `cc_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'favicon', 'default.png'),
(2, 'site_name', 'SiRiRi'),
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
(14, 'author', 'ITBS'),
(15, 'logo', ''),
(16, 'active_theme', 'cicool'),
(17, 'landing_page_id', 'login'),
(18, 'email', 'ugmandiriitbs@gmail.com'),
(19, 'google_id', ''),
(20, 'google_secret', ''),
(21, 'chat_fb_key', '8ae6728ddb0695aef98e7ef9e9f418be');

-- --------------------------------------------------------

--
-- Table structure for table `cc_session`
--

CREATE TABLE `cc_session` (
  `id` int NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int UNSIGNED NOT NULL,
  `chat_uid` varchar(100) NOT NULL,
  `user_one` int NOT NULL,
  `user_two` int NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `chat_contact`
--

CREATE TABLE `chat_contact` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `contact_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int UNSIGNED NOT NULL,
  `message_user_id` int NOT NULL,
  `chat_id` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id_config` int UNSIGNED NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `config_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `variable` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` int DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `owner` enum('web','robot','controller') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'web',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `kode`, `config_name`, `variable`, `value`, `is_active`, `owner`, `keterangan`) VALUES
(1, NULL, 'Interval memproses data', 'interval_request', 5000, 1, 'web', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int UNSIGNED NOT NULL,
  `crud_modal` varchar(20) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `sort_by` varchar(50) DEFAULT NULL,
  `sort_field` varchar(255) DEFAULT NULL,
  `javascript` text,
  `style` text,
  `javascript_setting_detail` text,
  `javascript_setting_update` text,
  `javascript_setting_create` text,
  `javascript_setting_list` text,
  `primary_key` varchar(200) NOT NULL,
  `page_read` varchar(20) DEFAULT NULL,
  `page_create` varchar(20) DEFAULT NULL,
  `page_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `crud_modal`, `title`, `subject`, `table_name`, `sort_by`, `sort_field`, `javascript`, `style`, `javascript_setting_detail`, `javascript_setting_update`, `javascript_setting_create`, `javascript_setting_list`, `primary_key`, `page_read`, `page_create`, `page_update`) VALUES
(2, '', 'Building', 'Building', 'tag_building', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'building_id', 'yes', 'yes', 'yes'),
(3, '', 'Librarian', 'Librarian', 'tag_librarian', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'librarian_id', 'yes', 'yes', 'yes'),
(4, '', 'RFID', 'RFID', 'tag_rfid', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'rfid_id', 'yes', NULL, NULL),
(6, '', 'Location', 'Location', 'tag_location', 'desc', 'location_updated', NULL, NULL, NULL, NULL, NULL, NULL, 'location_id', 'yes', 'yes', 'yes'),
(7, '', 'Label', 'Label', 'tag_label', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'label_id', 'yes', 'yes', 'yes'),
(8, '', 'Location Log', 'Location Log', 'tag_location_log', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'log_id', 'yes', 'yes', 'yes'),
(9, '', 'Anomaly', 'Anomaly', 'tag_anomaly', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'anomaly_id', 'yes', 'yes', 'yes'),
(10, '', 'Borrow', 'Borrow', 'tag_borrow', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'borrow_id', 'yes', 'yes', 'yes'),
(12, '', 'Broken', 'Broken', 'tag_broken', 'desc', 'broken_created', NULL, NULL, NULL, NULL, NULL, NULL, 'broken_id', 'yes', 'yes', NULL),
(13, '', 'Area', 'Area', 'lokasi_kerja', 'asc', 'nama_lokasi', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(14, NULL, 'Bmn', 'Bmn', 'bmn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id_bmn', 'yes', 'yes', 'yes'),
(22, '', 'Tb Pegawai Master', 'Tb Pegawai Master', 'tb_pegawai_master', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(23, NULL, 'Tb Kondisi Master', 'Tb Kondisi Master', 'tb_kondisi_master', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(34, NULL, 'Tb Mutasi Asset', 'Tb Mutasi Asset', 'tb_mutasi_asset', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(36, '', 'Tb Asset Master', 'Tb Asset Master', 'tb_asset_master', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(37, '', 'Tb Pinjam Log', 'Tb Pinjam Log', 'tb_pinjam_log', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(38, NULL, 'Tb Log Act', 'Tb Log Act', 'tb_log_act', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(39, '', 'Tb Asset Moving', 'Tb Asset Moving', 'tb_asset_moving', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(40, NULL, 'Tb Kelompok Kerjaan', 'Tb Kelompok Kerjaan', 'tb_kelompok_kerjaan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'yes', 'yes', 'yes'),
(41, NULL, 'Kategori Aset', 'Jenis Kategori Aset', 'tb_category_aset', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(42, '', 'Reader Info', 'Data Reader RFID', 'tag_reader', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'reader_id', 'yes', 'yes', 'yes'),
(44, '', 'Tb History Invent', 'Tb History Invent', 'tb_history_invent', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(45, NULL, 'Tb Area Master', 'Tb Area Master', 'tb_area_master', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id_area', 'yes', 'yes', 'yes'),
(46, '', 'Tb Gedung Master', 'Tb Gedung Master', 'tb_gedung_master', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id_gedung', 'yes', 'yes', 'yes'),
(47, '', 'Tb Room Master', 'Tb Room Master', 'tb_room_master', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id_room', 'yes', 'yes', 'yes'),
(48, '', 'Master Tag RFID', 'Master Tag RFID', 'ug_mstag', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(50, '', 'Register Aset', 'Register Aset', 'tb_master_transaksi', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes'),
(51, NULL, 'Tb Master Aset', 'Tb Master Aset', 'tb_master_aset', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'id', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `crud_action`
--

CREATE TABLE `crud_action` (
  `id` int UNSIGNED NOT NULL,
  `sort_order` int DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `crud_id` int NOT NULL,
  `action` varchar(200) NOT NULL,
  `meta` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `crud_custom_option`
--

CREATE TABLE `crud_custom_option` (
  `id` int UNSIGNED NOT NULL,
  `crud_field_id` int NOT NULL,
  `crud_id` int NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `crud_custom_option`
--

INSERT INTO `crud_custom_option` (`id`, `crud_field_id`, `crud_id`, `option_value`, `option_label`) VALUES
(206, 391, 8, 'AVAILABLE', 'AVAILABLE'),
(207, 391, 8, 'PINJAM', 'PINJAM'),
(208, 391, 8, 'KEMBALI', 'KEMBALI'),
(209, 391, 8, 'KERUSAKAN', 'KERUSAKAN'),
(210, 401, 10, 'PENDING', 'PENDING'),
(211, 401, 10, 'SUCCESS', 'SUCCESS'),
(308, 604, 9, 'not', 'not'),
(309, 604, 9, 'done', 'done'),
(841, 2202, 4, 'yes', 'Yes'),
(842, 2202, 4, 'no', 'No'),
(843, 2211, 6, 'TERSEDIA', 'TERSEDIA'),
(844, 2211, 6, 'PINJAM', 'PINJAM'),
(845, 2211, 6, 'KERUSAKAN', 'KERUSAKAN'),
(1188, 3732, 5, 'tcp', 'tcp'),
(1189, 3732, 5, 'serial', 'serial'),
(1190, 3735, 5, '/dev/cu.usbserial-1410', '/dev/cu.usbserial-1410'),
(1191, 3735, 5, '/dev/cu.usbserial-1420', '/dev/cu.usbserial-1420'),
(1192, 3735, 5, 'COM1', 'COM1'),
(1193, 3735, 5, 'COM2', 'COM2'),
(1194, 3735, 5, 'COM3', 'COM3'),
(1195, 3735, 5, 'COM4', 'COM4'),
(1196, 3735, 5, 'COM5', 'COM5'),
(1197, 3735, 5, 'COM6', 'COM6'),
(1198, 3735, 5, 'COM7', 'COM7'),
(1199, 3735, 5, 'COM8', 'COM8'),
(1200, 3735, 5, 'COM9', 'COM9'),
(1201, 3735, 5, 'COM10', 'COM10'),
(1202, 3736, 5, '9600', '9600'),
(1203, 3736, 5, '19200', '19200'),
(1204, 3736, 5, '38400', '38400'),
(1205, 3736, 5, '57600', '57600'),
(1206, 3736, 5, '115200', '115200'),
(1207, 3737, 5, '1', '1 Dbi'),
(1208, 3737, 5, '2', '2 Dbi'),
(1209, 3737, 5, '3', '3 Dbi'),
(1210, 3737, 5, '25', '25 Dbi'),
(1211, 3738, 5, '10', '10'),
(1212, 3738, 5, '100', '100'),
(1213, 3738, 5, '1000', '1000'),
(1214, 3738, 5, '2000', '2000'),
(1215, 3738, 5, '5000', '5000'),
(1216, 3738, 5, '10000', '10000'),
(1217, 3738, 5, '15000', '15000'),
(1218, 3739, 5, 'answer', 'Answer'),
(1219, 3739, 5, 'active', 'Active'),
(1220, 3744, 5, 'hw', 'HW'),
(1221, 3744, 5, 'rc', 'RC'),
(1222, 3745, 5, '0', 'DISCONNECTED'),
(1223, 3745, 5, '1', 'CONNECTED'),
(1224, 3746, 5, '1', 'IN'),
(1225, 3746, 5, '7', 'OUT'),
(1428, 3980, 36, '1', 'IN Room'),
(1429, 3980, 36, '9', 'OUT Room'),
(1434, 4055, 25, '1', 'Done'),
(1453, 4301, 37, '1', 'Selesai'),
(1454, 4301, 37, '2', 'Pinjam'),
(1455, 4348, 35, '1', 'IN'),
(1456, 4348, 35, '7', 'OUT'),
(1457, 4350, 35, 'tcp', 'tcp'),
(1458, 4350, 35, 'serial', 'serial'),
(1459, 4353, 35, '/dev/cu.usbserial-1410', '/dev/cu.usbserial-1410'),
(1460, 4353, 35, '/dev/cu.usbserial-1420', '/dev/cu.usbserial-1420'),
(1461, 4353, 35, 'COM1', 'COM1'),
(1462, 4353, 35, 'COM2', 'COM2'),
(1463, 4353, 35, 'COM3', 'COM3'),
(1464, 4353, 35, 'COM4', 'COM4'),
(1465, 4353, 35, 'COM5', 'COM5'),
(1466, 4353, 35, 'COM6', 'COM6'),
(1467, 4353, 35, 'COM7', 'COM7'),
(1468, 4353, 35, 'COM8', 'COM8'),
(1469, 4353, 35, 'COM9', 'COM9'),
(1470, 4353, 35, 'COM10', 'COM10'),
(1471, 4354, 35, '9600', '9600'),
(1472, 4354, 35, '19200', '19200'),
(1473, 4354, 35, '38400', '38400'),
(1474, 4354, 35, '57600', '57600'),
(1475, 4354, 35, '115200', '115200'),
(1476, 4356, 35, '10', '10'),
(1477, 4356, 35, '100', '100'),
(1478, 4356, 35, '1000', '1000'),
(1479, 4356, 35, '2000', '2000'),
(1480, 4356, 35, '5000', '5000'),
(1481, 4356, 35, '10000', '10000'),
(1482, 4356, 35, '15000', '15000'),
(1483, 4357, 35, 'answer', 'answer'),
(1484, 4357, 35, 'active', 'active'),
(1485, 4362, 35, 'hw', 'hw'),
(1486, 4362, 35, 'rc', 'rc'),
(1487, 4363, 35, '0', 'Disconnected'),
(1488, 4363, 35, '1', 'Connected'),
(1785, 4686, 42, '1', 'IN'),
(1786, 4686, 42, '7', 'Out'),
(1787, 4688, 42, 'tcp', 'tcp'),
(1788, 4688, 42, 'serial', 'serial'),
(1789, 4691, 42, '/dev/cu.usbserial-1410', '/dev/cu.usbserial-1410'),
(1790, 4691, 42, '/dev/cu.usbserial-1420', '/dev/cu.usbserial-1420'),
(1791, 4691, 42, 'COM1', 'COM1'),
(1792, 4691, 42, 'COM2', 'COM2'),
(1793, 4691, 42, 'COM3', 'COM3'),
(1794, 4691, 42, 'COM4', 'COM4'),
(1795, 4691, 42, 'COM5', 'COM5'),
(1796, 4691, 42, 'COM6', 'COM6'),
(1797, 4691, 42, 'COM7', 'COM7'),
(1798, 4691, 42, 'COM8', 'COM8'),
(1799, 4691, 42, 'COM9', 'COM9'),
(1800, 4691, 42, 'COM10', 'COM10'),
(1801, 4692, 42, '9600', '9600'),
(1802, 4692, 42, '19200', '19200'),
(1803, 4692, 42, '38400', '38400'),
(1804, 4692, 42, '57600', '57600'),
(1805, 4692, 42, '115200', '115200'),
(1806, 4694, 42, '10', '10'),
(1807, 4694, 42, '100', '100'),
(1808, 4694, 42, '1000', '1000'),
(1809, 4694, 42, '2000', '2000'),
(1810, 4694, 42, '5000', '5000'),
(1811, 4694, 42, '10000', '10000'),
(1812, 4694, 42, '15000', '15000'),
(1813, 4695, 42, 'answer', 'answer'),
(1814, 4695, 42, 'active', 'active'),
(1815, 4700, 42, 'hw', 'hw'),
(1816, 4700, 42, 'rc', 'rc'),
(1817, 4700, 42, 'other', 'other'),
(1818, 4701, 42, '1', 'Connected'),
(1819, 4701, 42, '9', 'Disconnected'),
(1820, 4704, 42, 'single', 'single'),
(1821, 4704, 42, 'double', 'double'),
(1822, 4705, 42, 'in', 'in'),
(1823, 4705, 42, 'out', 'out'),
(1830, 4756, 48, 'Y', 'Y'),
(1831, 4756, 48, 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field`
--

CREATE TABLE `crud_field` (
  `id` int UNSIGNED NOT NULL,
  `crud_id` int NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `input_type` varchar(200) NOT NULL,
  `help_block` text,
  `placeholder` text,
  `auto_generate_help_block` varchar(40) DEFAULT NULL,
  `wrapper_class` text,
  `show_column` varchar(10) DEFAULT NULL,
  `show_add_form` varchar(10) DEFAULT NULL,
  `show_update_form` varchar(10) DEFAULT NULL,
  `show_detail_page` varchar(10) DEFAULT NULL,
  `sort` int NOT NULL,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `crud_field`
--

INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `help_block`, `placeholder`, `auto_generate_help_block`, `wrapper_class`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(1, 1, 'building_id', 'building_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2, 1, 'building_name', 'Building Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3, 1, 'building_created', 'Building Created', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
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
(600, 9, 'anomaly_id', 'anomaly_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(601, 9, 'rfid_id', 'RFID', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(602, 9, 'anomaly_right_librarian', 'Right Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(603, 9, 'anomaly_wrong_librarian', 'Wrong Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, 'tag_librarian', 'librarian_id', 'librarian_name'),
(604, 9, 'anomaly_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(605, 9, 'anomaly_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(606, 9, 'anomaly_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(607, 9, 'anomaly_updatedby', 'Updated By', 'current_user_username', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(608, 9, 'rfid_barcode', 'rfid_barcode', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2033, 7, 'label_id', 'label_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2034, 7, 'label_supplier', 'Supplier', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2035, 7, 'label_name', 'Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2036, 7, 'label_description', 'Description', 'editor_wysiwyg', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2037, 7, 'label_image', 'Image', 'file', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2038, 7, 'label_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 6, '', '', ''),
(2039, 7, 'label_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 7, '', '', ''),
(2040, 7, 'label_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(2041, 7, 'label_updatedby', 'Updated By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(2042, 7, 'label_dimension', 'Dimension', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2043, 7, 'referensi', 'referensi', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 11, '', '', ''),
(2084, 13, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2085, 13, 'kode', 'kode', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2086, 13, 'nama_lokasi', 'nama_lokasi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2087, 13, 'keterangan', 'keterangan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2088, 13, 'alamat_lengkap', 'alamat_lengkap', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2089, 13, 'lat', 'lat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2090, 13, 'long', 'long', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2091, 13, 'user_create', 'user_create', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(2092, 13, 'create_date', 'create_date', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2093, 13, 'user_change', 'user_change', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2094, 13, 'change_date', 'change_date', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(2095, 13, 'photo', 'photo', 'file', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 12, '', '', ''),
(2139, 3, 'librarian_id', 'librarian_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2140, 3, 'librarian_name', 'Librarian Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2141, 3, 'librarian_gate', 'Librarian Gate', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2142, 3, 'librarian_condition', 'Condition Logic', 'input', '', '', 'yes', NULL, '', '', '', '', 4, '', '', ''),
(2143, 3, 'librarian_created', 'Librarian Create', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 5, '', '', ''),
(2144, 3, 'librarian_createdby', 'Librarian Create By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 6, '', '', ''),
(2145, 3, 'librarian_updated', 'Librarian Update', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(2146, 3, 'librarian_updateby', 'Librarian Update By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(2147, 3, 'building_id', 'Area', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, 'lokasi_kerja', 'id', 'nama_lokasi'),
(2198, 4, 'rfid_id', 'rfid_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2199, 4, 'label_id', 'Label Tag', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_label', 'label_id', 'label_name'),
(2200, 4, 'rfid_barcode', 'Barcode', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2201, 4, 'rfid_rfid', 'RFID', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2202, 4, 'rfid_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2203, 4, 'rfid_note', 'Note', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2204, 4, 'rfid_created', 'Created', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 7, '', '', ''),
(2205, 4, 'rfid_createdby', 'Created By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 8, '', '', ''),
(2206, 4, 'rfid_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(2207, 4, 'rfid_updatedby', 'Updated By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 10, '', '', ''),
(2208, 6, 'location_id', 'location_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2209, 6, 'rfid_id', 'RFID Tag Number', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tag_rfid', 'rfid_id', 'rfid_rfid'),
(2210, 6, 'librarian_id', 'Librarian', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tag_librarian', 'librarian_id', 'librarian_name'),
(2211, 6, 'location_status', 'Status', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2212, 6, 'location_aging', 'Aging', 'datetime', '', '', 'yes', NULL, '', '', '', '', 5, '', '', ''),
(2213, 6, 'location_created', 'Created', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', '', 'yes', 6, '', '', ''),
(2214, 6, 'location_updated', 'Updated', 'timestamp', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2215, 14, 'id_bmn', 'id_bmn', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(2216, 14, 'bagian', 'bagian', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2217, 14, 'kode_barang', 'kode_barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2218, 14, 'nama_barang', 'nama_barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2219, 14, 'nup', 'nup', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2220, 14, 'merk', 'merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2221, 14, 'tanggal_perolehan', 'tanggal_perolehan', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2222, 14, 'kategori_barang', 'kategori_barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(2223, 14, 'tahun_sensus', 'tahun_sensus', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2224, 14, 'keterangan', 'keterangan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2351, 15, '0', 'Kode Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 1, '', '', ''),
(2352, 15, '0', 'Nama Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2353, 15, '0', 'Ready Inventaris', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2354, 15, '0', 'Kode Barang', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2355, 15, 'NUP', 'NUP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2356, 15, 'RFID_code_label', 'RFID_code_label', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2357, 15, '0', 'Nama Barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2358, 15, 'Merk', 'Merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(2359, 15, 'Tipe', 'Tipe', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2360, 15, 'Kondisi', 'Kondisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2361, 15, '0', 'Umur Aset', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(2362, 15, '0', 'Intra / Extra', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(2363, 15, '0', 'Henti Guna', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(2364, 15, '0', 'Status SBSN', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(2365, 15, '0', 'Status BMN Idle', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(2366, 15, '0', 'Status Kemitraan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 16, '', '', ''),
(2367, 15, 'BPYBDS', 'BPYBDS', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(2368, 15, '0', 'Usulan Barang Hilang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(2369, 15, '0', 'Usulan Barang RB', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(2370, 15, '0', 'Usul Hapus', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 20, '', '', ''),
(2371, 15, '0', 'Hibah DKTP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(2372, 15, '0', 'Konsensi Jasa', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 22, '', '', ''),
(2373, 15, '0', 'Properti Investasi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 23, '', '', ''),
(2374, 15, '0', 'Jenis Dokumen', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 24, '', '', ''),
(2375, 15, '0', 'No Dokumen', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 25, '', '', ''),
(2376, 15, '0', 'No BPKP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 26, '', '', ''),
(2377, 15, '0', 'No Polisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 27, '', '', ''),
(2378, 15, 'Kepemilikan', 'Kepemilikan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 28, '', '', ''),
(2379, 15, '0', 'No Sertifikat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 29, '', '', ''),
(2380, 15, 'Nama', 'Nama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 30, '', '', ''),
(2381, 15, '0', 'Tanggal Buku Pertama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 31, '', '', ''),
(2382, 15, '0', 'Tanggal Perolehan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 32, '', '', ''),
(2383, 15, '0', 'Tanggal Pengapusan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 33, '', '', ''),
(2384, 15, '0', 'Nilai Perolehan Pertama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 34, '', '', ''),
(2385, 15, '0', 'Nilai Mutasi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 35, '', '', ''),
(2386, 15, '0', 'Nilai Perolehan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 36, '', '', ''),
(2387, 15, '0', 'Nilai Penyusutan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 37, '', '', ''),
(2388, 15, '0', 'Nilai Buku', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 38, '', '', ''),
(2389, 15, '0', 'Luas Tanah Seluruhnya', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 39, '', '', ''),
(2390, 15, '0', 'Luas Tanah Untuk Bangunan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 40, '', '', ''),
(2391, 15, '0', 'Luas Tanah Untuk Sarana Lingkungan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 41, '', '', ''),
(2392, 15, '0', 'Luas Lahan Kosong', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 42, '', '', ''),
(2603, 16, '0', 'Kode Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 1, '', '', ''),
(2604, 16, '0', 'Nama Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2605, 16, '0', 'Ready Inventaris', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2606, 16, '0', 'Kode Barang', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2607, 16, 'NUP', 'NUP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2608, 16, 'RFID_code_label', 'RFID_code_label', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2609, 16, '0', 'Nama Barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2610, 16, 'Merk', 'Merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(2611, 16, 'Tipe', 'Tipe', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2612, 16, 'Kondisi', 'Kondisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2613, 16, '0', 'Umur Aset', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(2614, 16, 'Intra_Extra', 'Intra_Extra', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(2615, 16, '0', 'Henti Guna', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(2616, 16, '0', 'Status SBSN', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(2617, 16, '0', 'Status BMN Idle', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(2618, 16, '0', 'Status Kemitraan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 16, '', '', ''),
(2619, 16, 'BPYBDS', 'BPYBDS', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(2620, 16, '0', 'Usulan Barang Hilang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(2621, 16, '0', 'Usulan Barang RB', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(2622, 16, '0', 'Usul Hapus', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 20, '', '', ''),
(2623, 16, '0', 'Hibah DKTP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(2624, 16, '0', 'Konsensi Jasa', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 22, '', '', ''),
(2625, 16, '0', 'Properti Investasi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 23, '', '', ''),
(2626, 16, '0', 'Jenis Dokumen', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 24, '', '', ''),
(2627, 16, '0', 'No Dokumen', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 25, '', '', ''),
(2628, 16, '0', 'No BPKP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 26, '', '', ''),
(2629, 16, '0', 'No Polisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 27, '', '', ''),
(2630, 16, 'Kepemilikan', 'Kepemilikan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 28, '', '', ''),
(2631, 16, '0', 'No Sertifikat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 29, '', '', ''),
(2632, 16, 'Nama', 'Nama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 30, '', '', ''),
(2633, 16, '0', 'Tanggal Buku Pertama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 31, '', '', ''),
(2634, 16, '0', 'Tanggal Perolehan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 32, '', '', ''),
(2635, 16, '0', 'Tanggal Pengapusan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 33, '', '', ''),
(2636, 16, '0', 'Nilai Perolehan Pertama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 34, '', '', ''),
(2637, 16, '0', 'Nilai Mutasi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 35, '', '', ''),
(2638, 16, '0', 'Nilai Perolehan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 36, '', '', ''),
(2639, 16, '0', 'Nilai Penyusutan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 37, '', '', ''),
(2640, 16, '0', 'Nilai Buku', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 38, '', '', ''),
(2641, 16, '0', 'Luas Tanah Seluruhnya', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 39, '', '', ''),
(2642, 16, '0', 'Luas Tanah Untuk Bangunan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 40, '', '', ''),
(2643, 16, '0', 'Luas Tanah Untuk Sarana Lingkungan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 41, '', '', ''),
(2644, 16, '0', 'Luas Lahan Kosong', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 42, '', '', ''),
(2687, 17, 'Kode_Satker', 'Kode_Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 1, '', '', ''),
(2688, 17, 'Nama_Satker', 'Nama_Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2689, 17, 'Ready_Inventaris', 'Ready_Inventaris', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2690, 17, 'Kode_Barang', 'Kode_Barang', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2691, 17, 'NUP', 'NUP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2692, 17, 'RFID_code_tag', 'RFID_code_tag', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2693, 17, 'Nama_Barang', 'Nama_Barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2694, 17, 'Merk', 'Merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(2695, 17, 'Tipe', 'Tipe', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2696, 17, 'Kondisi', 'Kondisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2697, 17, 'Usia', 'Usia', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(2698, 17, 'Intra_Extra', 'Intra_Extra', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(2699, 17, 'Henti_Guna', 'Henti_Guna', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(2700, 17, 'Status_SBSN', 'Status_SBSN', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(2701, 17, '0', 'Status_BMN Idle', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(2702, 17, 'Status_Kemitraan', 'Status_Kemitraan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 16, '', '', ''),
(2703, 17, 'BPYBDS', 'BPYBDS', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(2704, 17, 'Usulan_Barang_Hilang', 'Usulan_Barang_Hilang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(2705, 17, 'Usulan_Barang_RB', 'Usulan_Barang_RB', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(2706, 17, 'destroy', 'destroy', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 20, '', '', ''),
(2707, 17, 'Hibah_DKTP', 'Hibah_DKTP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(2708, 17, 'Konsensi_Jasa', 'Konsensi_Jasa', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 22, '', '', ''),
(2709, 17, 'Properti_Investasi', 'Properti_Investasi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 23, '', '', ''),
(2710, 17, 'Jenis_Dokumen', 'Jenis_Dokumen', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 24, '', '', ''),
(2711, 17, 'No_Dokumen', 'No_Dokumen', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 25, '', '', ''),
(2712, 17, 'No_BPKP', 'No_BPKP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 26, '', '', ''),
(2713, 17, 'No_Polisi', 'No_Polisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 27, '', '', ''),
(2714, 17, 'Kepemilikan', 'Kepemilikan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 28, '', '', ''),
(2715, 17, 'No_Sertifikat', 'No_Sertifikat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 29, '', '', ''),
(2716, 17, 'Nama', 'Nama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 30, '', '', ''),
(2717, 17, 'Tanggal_Buku_Pertama', 'Tanggal_Buku_Pertama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 31, '', '', ''),
(2718, 17, 'Tanggal_Perolehan', 'Tanggal_Perolehan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 32, '', '', ''),
(2719, 17, 'Tanggal_Pengapusan', 'Tanggal_Pengapusan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 33, '', '', ''),
(2720, 17, 'Nilai_Perolehan_Pertama', 'Nilai_Perolehan_Pertama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 34, '', '', ''),
(2721, 17, 'Nilai_Mutasi', 'Nilai_Mutasi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 35, '', '', ''),
(2722, 17, 'Nilai_Perolehan', 'Nilai_Perolehan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 36, '', '', ''),
(2723, 17, 'Nilai_Penyusutan', 'Nilai_Penyusutan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 37, '', '', ''),
(2724, 17, 'Nilai_Buku', 'Nilai_Buku', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 38, '', '', ''),
(2725, 17, 'Luas_Tanah', 'Luas_Tanah', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 39, '', '', ''),
(2726, 17, 'Luas_Tanah_Bangunan', 'Luas_Tanah_Bangunan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 40, '', '', ''),
(2727, 17, 'Luas_Tanah_Sarana', 'Luas_Tanah_Sarana', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 41, '', '', ''),
(2728, 17, 'Luas_Lahan_Kosong', 'Luas_Lahan_Kosong', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 42, '', '', ''),
(2743, 18, '0', 'Kode Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 1, '', '', ''),
(2744, 18, '0', 'Nama Satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2745, 18, '0', 'Ready Inventaris', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2746, 18, '0', 'Kode Barang', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2747, 18, 'NUP', 'NUP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2748, 18, 'RFID_code_label', 'RFID_code_label', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2749, 18, '0', 'Nama Barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2750, 18, 'Merk', 'Merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(2751, 18, 'Tipe', 'Tipe', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2752, 18, 'Kondisi', 'Kondisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2753, 18, '0', 'Umur Aset', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(2754, 18, '0', 'Lokasi Ruang', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(2755, 18, 'tgl_inventarisasi', 'tgl_inventarisasi', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(2756, 18, 'location_asset', 'location_asset', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(2757, 18, '0', 'Kode Satker', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(2758, 18, '0', 'Nama Satker', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 16, '', '', ''),
(2759, 18, '0', 'Ready Inventaris', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(2760, 18, '0', 'Kode Barang', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(2761, 18, '0', 'Nama Barang', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(2762, 18, '0', 'Umur Aset', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 20, '', '', ''),
(2763, 18, '0', 'Lokasi Ruang', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(2792, 19, 'kode_satker', 'kode_satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 1, '', '', ''),
(2793, 19, 'nama_satker', 'nama_satker', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(2794, 19, 'for_inventaris', 'for_inventaris', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(2795, 19, 'kode_brg', 'kode_brg', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(2796, 19, 'NUP', 'NUP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(2797, 19, 'rfid_code_label', 'rfid_code_label', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(2798, 19, 'nama_brg', 'nama_brg', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(2799, 19, 'Merk', 'Merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(2800, 19, 'Tipe', 'Tipe', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(2801, 19, 'Kondisi', 'Kondisi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(2802, 19, 'usia', 'usia', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(2803, 19, 'lokasi_id', 'lokasi_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(2804, 19, 'tgl_inventarisasi', 'tgl_inventarisasi', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(2805, 19, 'location_asset', 'location_asset', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(2806, 19, 'id', 'id', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(3154, 22, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3155, 22, 'NIP', 'NIP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3156, 22, 'Pegawai', 'Pegawai', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3157, 22, 'Jabatan', 'Jabatan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3158, 22, 'Telp', 'Telp', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3159, 22, 'Alamat', 'Alamat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(3160, 22, 'Email', 'Email', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(3161, 23, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3162, 23, 'kondisi_id', 'kondisi_id', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3163, 23, 'keterangan', 'keterangan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3191, 24, 'id', 'id', 'number', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 1, '', '', ''),
(3192, 24, 'invent_id', 'invent_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3193, 24, 'tanggal', 'tanggal', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3194, 24, 'waktu', 'waktu', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3195, 24, 'id_room', 'id_room', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3196, 24, 'id_reader', 'id_reader', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(3197, 24, 'kode_barang', 'brg_kode', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(3198, 24, 'nup_kode', 'nup_kode', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(3199, 24, 'user', 'user', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(3225, 26, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3226, 26, 'id_moving', 'id_moving', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3227, 26, 'tanggal', 'tanggal', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3228, 26, 'waktu', 'waktu', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3229, 26, 'reader_id', 'reader_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3230, 26, 'room_id', 'room_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(3231, 26, 'tag_code', 'tag_code', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(3380, 27, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3381, 27, 'borrow_id', 'borrow_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3382, 27, 'tanggal', 'tanggal', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3383, 27, 'waktu', 'waktu', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3384, 27, 'pegawai_id', 'pegawai_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3385, 27, 'peminjam', 'peminjam', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(3386, 27, 'alamat_peminjam', 'alamat_peminjam', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(3387, 27, 'noHp', 'noHp', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(3388, 27, 'tanggalpinjam', 'tanggalpinjam', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(3389, 27, 'tanggalkembali', 'tanggalkembali', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(3390, 27, 'tagCode', 'tagCode', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(3391, 27, 'Kode_Brg', 'Kode_Brg', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(3392, 27, 'NUP', 'NUP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(3393, 27, 'status', 'status', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(3478, 28, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3479, 28, 'id_area', 'id_area', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3480, 28, '0', 'area', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3481, 28, 'kota', 'kota', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3482, 28, 'alamat', 'alamat', 'number', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 5, '', '', ''),
(3498, 29, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3499, 29, 'id_area', 'id_area', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3500, 29, 'area', 'area', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3501, 29, 'kota', 'kota', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3502, 29, 'alamat', 'alamat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3508, 30, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3509, 30, 'area_id', 'area_id', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3510, 30, 'id_gedung', 'id_gedung', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3511, 30, 'gedung', 'gedung', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3544, 21, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3545, 21, 'gedung_id', 'gedung_id', 'select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tb_gedung_master', 'id_gedung', 'gedung'),
(3546, 21, 'room_id', 'room_id', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3547, 21, 'reader_id', 'reader_id', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, 'tag_reader', 'reader_id', 'reader_name'),
(3548, 21, 'name_room', 'name_room', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3549, 21, 'lat', 'lat', 'input', '', '', 'yes', NULL, '', '', '', 'yes', 6, '', '', ''),
(3550, 21, 'long', 'long', 'input', '', '', 'yes', NULL, '', '', '', 'yes', 7, '', '', ''),
(3551, 21, 'PIC', 'PIC', 'select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 8, 'tb_pegawai_master', 'NIP', 'Pegawai'),
(3560, 34, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3561, 34, 'mutasi_id', 'mutasi_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3562, 34, 'code_rfidtag', 'code_rfidtag', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3563, 34, 'id_room_old', 'id_room_old', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3564, 34, 'id_room_new', 'id_room_new', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3565, 34, 'tanggal_m', 'tanggal_m', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(3566, 34, 'waktu_m', 'waktu_m', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(3567, 34, 'pic', 'pic', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(3716, 32, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3717, 32, 'area_id', 'area_id', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tb_area_master', 'id_area', 'kota'),
(3718, 32, 'id_gedung', 'id_gedung', 'input', 'G=Gedung, 01=No Urut, IM=Inisial Nama Gedung', 'G01IM', '', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3719, 32, 'gedung', 'gedung', 'input', 'Nama Gedung', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3728, 5, 'reader_id', 'Reader ID', 'number', '', '', 'yes', NULL, 'yes', '', '', 'yes', 1, '', '', ''),
(3729, 5, 'room_id', 'room_id', 'select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tb_room_master', 'room_id', 'name_room'),
(3730, 5, 'reader_name', 'Nama Ruangan', 'chained', '', '', 'yes', NULL, '', '', '', '', 3, 'tb_room_master', 'room_id', 'name_room'),
(3731, 5, 'reader_serialnumber', 'SN', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 4, '', '', ''),
(3732, 5, 'reader_type', 'Type', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 5, '', '', ''),
(3733, 5, 'reader_ip', 'IP', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(3734, 5, 'reader_port', 'Port', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(3735, 5, 'reader_com', 'Com Port', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(3736, 5, 'reader_baudrate', 'Baud Rate', 'custom_option', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(3737, 5, 'reader_power', 'Power', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 10, '', '', ''),
(3738, 5, 'reader_interval', 'Interval', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(3739, 5, 'reader_mode', 'Mode', 'custom_select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(3740, 5, 'reader_created', 'Created', 'timestamp', '', '', '', NULL, '', 'yes', '', 'yes', 13, '', '', ''),
(3741, 5, 'reader_createdby', 'Created By', 'current_user_id', '', '', '', NULL, '', 'yes', '', 'yes', 14, '', '', ''),
(3742, 5, 'reader_updated', 'Updated', 'timestamp', '', '', '', NULL, '', 'yes', 'yes', 'yes', 15, '', '', ''),
(3743, 5, 'reader_updatedby', 'Updated By', 'current_user_id', '', '', '', NULL, '', 'yes', 'yes', 'yes', 16, '', '', ''),
(3744, 5, 'reader_family', 'reader_family', 'custom_select', '', '', '', NULL, '', 'yes', 'yes', 'yes', 17, '', '', ''),
(3745, 5, 'connecting', 'connecting', 'custom_option', '', '', '', NULL, 'yes', '', 'yes', 'yes', 18, '', '', ''),
(3746, 5, 'setfor', 'setfor', 'custom_option', 'Reader ini untuk posisi baca IN atau OUT', '', '', NULL, 'yes', '', '', 'yes', 19, '', '', ''),
(3855, 20, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3856, 20, 'kode_brg', 'KodeAset', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3857, 20, 'nup', 'NUP', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3858, 20, 'tag_code', 'TAGKode', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3859, 20, 'nama_brg', 'Barang', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3860, 20, 'Merk', 'Merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(3861, 20, 'Tipe', 'Tipe', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(3862, 20, 'Kondisi', 'Kondisi', 'input', '', '', '', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(3863, 20, 'Nilai', 'NilaiAset', 'input', '', '', '', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(3864, 20, 'Kelompok', 'Kelompok', 'input', '', '', '', NULL, '', 'yes', 'yes', 'yes', 10, '', '', ''),
(3865, 20, 'tgl_inventarisasi', 'tgl_inventarisasi', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(3866, 20, 'tglperolehan', 'tgl_perolehan', 'input', '', '', '', NULL, '', 'yes', 'yes', 'yes', 12, '', '', ''),
(3867, 20, 'Lokasi', 'Lokasi', 'select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 13, 'tb_room_master', 'room_id', 'name_room'),
(3868, 20, 'PICbarang', 'PICbarang', 'select', '', '', '', NULL, '', 'yes', 'yes', 'yes', 14, 'tb_pegawai_master', 'NIP', 'Pegawai'),
(3869, 20, 'status_id', 'status_id', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(3870, 20, 'Keterangan', 'Keterangan Status', 'textarea', '', '', '', NULL, '', 'yes', 'yes', 'yes', 16, '', '', ''),
(3967, 36, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(3968, 36, 'kode_brg', 'kode_brg', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(3969, 36, 'nup', 'nup', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(3970, 36, 'tag_code', 'tag_code', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(3971, 36, 'nama_brg', 'nama_brg', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(3972, 36, 'Merk', 'Merk', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 6, '', '', ''),
(3973, 36, 'Tipe', 'Tipe', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(3974, 36, 'Kondisi', 'Kondisi', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, 'tb_kondisi_master', 'kondisi_id', 'keterangan'),
(3975, 36, 'Nilai', 'Nilai', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(3976, 36, 'Kelompok', 'Kelompok', 'number', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 10, '', '', ''),
(3977, 36, 'tgl_inventarisasi', 'tgl_inventarisasi', 'date', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 11, '', '', ''),
(3978, 36, 'tglperolehan', 'tglperolehan', 'date', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 12, '', '', ''),
(3979, 36, 'Lokasi', 'Lokasi', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, 'tb_room_master', 'room_id', 'name_room'),
(3980, 36, 'status_id', 'status_id', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(3981, 36, 'Keterangan', 'Keterangan', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 15, '', '', ''),
(3982, 36, 'PICbarang', 'PICbarang', 'select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 16, 'tb_pegawai_master', 'NIP', 'Pegawai'),
(4047, 25, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4048, 25, 'invent_id', 'invent_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4049, 25, 'tanggal', 'tanggal', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4050, 25, 'waktu', 'waktu', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4051, 25, 'id_room', 'id_room', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, 'tb_room_master', 'room_id', 'name_room'),
(4052, 25, 'id_reader', 'id_reader', 'select', '', '', 'yes', NULL, 'yes', '', '', 'yes', 6, 'tag_reader', 'reader_id', 'reader_serialnumber'),
(4053, 25, 'rfid_code_tag', 'rfid_code_tag', 'input', '', '', '', NULL, '', 'yes', 'yes', 'yes', 7, '', '', ''),
(4054, 25, 'user', 'user', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, 'tb_pegawai_master', 'id', 'Pegawai'),
(4055, 25, 'labeling', 'labeling', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(4071, 38, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4072, 38, 'log_id', 'log_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4073, 38, 'act_id', 'act_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4074, 38, 'keterangan', 'keterangan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4075, 38, 'user', 'user', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(4076, 38, 'date', 'date', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4077, 38, 'time', 'time', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4153, 39, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4154, 39, 'tanggal', 'tanggal', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4155, 39, 'waktu', 'waktu', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4156, 39, 'reader_id', 'Reader', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, 'tag_reader', 'reader_id', 'reader_name'),
(4157, 39, 'room_id', 'Ruangan', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, 'tb_room_master', 'id_room', 'name_room'),
(4158, 39, 'tag_code', 'Aset', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, 'tb_asset_master', 'tag_code', 'nama_brg'),
(4159, 39, 'status_moving', 'status_moving', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4209, 40, 'id', 'id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 1, '', '', ''),
(4210, 40, 'kode', 'kode', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4211, 40, 'jenis', 'jenis', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4212, 40, 'kelompok', 'kelompok', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4288, 37, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4289, 37, 'pinjam_id', 'pinjam_id', 'number', '', '', 'yes', NULL, 'yes', '', '', 'yes', 2, '', '', ''),
(4290, 37, 'tanggal_proses', 'tanggal_proses', 'date', '', '', 'yes', NULL, 'yes', '', '', 'yes', 3, '', '', ''),
(4291, 37, 'tanggal_pinjam', 'tanggal_pinjam', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4292, 37, 'waktu_pinjam', 'waktu_pinjam', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(4293, 37, 'tanggal_kembali', 'tanggal_kembali', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4294, 37, 'waktu_kembali', 'waktu_kembali', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4295, 37, 'lend_id', 'lend_id', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, 'tb_pegawai_master', 'NIP', 'Pegawai'),
(4296, 37, 'peminjam', 'peminjam', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(4297, 37, 'job', 'job', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, 'tb_kelompok_kerjaan', 'kode', 'jenis'),
(4298, 37, 'alamat', 'alamat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(4299, 37, 'telp', 'telp', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(4300, 37, 'tag_code', 'Aset', 'select_multiple', 'Pilih Aset yang di Pinjam', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 13, 'tb_asset_master', 'tag_code', 'nama_brg'),
(4301, 37, 'status', 'status', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(4302, 41, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4303, 41, 'kode_kategori', 'kode_kategori', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4304, 41, 'nama', 'nama', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4346, 35, 'reader_id', 'reader_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4347, 35, 'room_id', 'room_id', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tb_room_master', 'id_room', 'name_room'),
(4348, 35, 'setfor', 'Posisi (IN/OUT)', 'custom_option', 'Reader di set untu Posisi IN atau OUT', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4349, 35, 'reader_serialnumber', 'reader_serialnumber', 'input', 'Masukan Serial Number Perangkat', '', '', NULL, '', 'yes', 'yes', 'yes', 4, '', '', ''),
(4350, 35, 'reader_type', 'reader_type', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(4351, 35, 'reader_ip', 'reader_ip', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4352, 35, 'reader_port', 'reader_port', 'input', '', '', 'yes', NULL, '', '', '', 'yes', 7, '', '', ''),
(4353, 35, 'reader_com', 'reader_com', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 8, '', '', ''),
(4354, 35, 'reader_baudrate', 'reader_baudrate', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 9, '', '', ''),
(4355, 35, 'reader_power', 'reader_power', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 10, '', '', ''),
(4356, 35, 'reader_interval', 'reader_interval', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 11, '', '', ''),
(4357, 35, 'reader_mode', 'reader_mode', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(4358, 35, 'reader_updatedby', 'reader_updatedby', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 13, '', '', ''),
(4359, 35, 'reader_updated', 'reader_updated', 'datetime', '', '', 'yes', NULL, '', '', '', 'yes', 14, '', '', '');
INSERT INTO `crud_field` (`id`, `crud_id`, `field_name`, `field_label`, `input_type`, `help_block`, `placeholder`, `auto_generate_help_block`, `wrapper_class`, `show_column`, `show_add_form`, `show_update_form`, `show_detail_page`, `sort`, `relation_table`, `relation_value`, `relation_label`) VALUES
(4360, 35, 'reader_createdby', 'reader_createdby', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 15, '', '', ''),
(4361, 35, 'reader_created', 'reader_created', 'datetime', '', '', 'yes', NULL, '', '', '', 'yes', 16, '', '', ''),
(4362, 35, 'reader_family', 'reader_family', 'custom_select', '', '', 'yes', NULL, '', '', '', 'yes', 17, '', '', ''),
(4363, 35, 'connecting', 'connecting', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(4364, 35, 'reader_name', 'reader_name', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(4365, 35, 'reader_model', 'reader_model', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 20, '', '', ''),
(4366, 35, 'reader_identity', 'reader_identity', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(4367, 35, 'reader_antena', 'reader_antena', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 22, '', '', ''),
(4368, 35, 'reader_angle', 'reader_angle', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 23, '', '', ''),
(4369, 35, 'reader_gate', 'reader_gate', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 24, '', '', ''),
(4541, 43, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4542, 43, 'invent_id', 'invent_id', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4543, 43, 'tanggal', 'tanggal', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4544, 43, 'waktu', 'waktu', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4545, 43, 'id_room', 'id_room', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, 'tb_room_master', 'id_room', 'name_room'),
(4546, 43, 'id_reader', 'id_reader', 'number', '', '', 'yes', NULL, '', '', '', '', 6, '', '', ''),
(4547, 43, 'user', 'user', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4548, 43, 'labeling', 'labeling', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(4549, 43, 'rfid_code_tag', 'rfid_code_tag', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(4593, 31, 'id_area', 'id_area', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4594, 31, 'kota', 'kota', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4595, 31, 'alamat', 'alamat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4596, 31, 'area', 'area', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4597, 45, 'id_area', 'id_area', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4598, 45, 'kota', 'kota', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4599, 45, 'alamat', 'alamat', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4600, 45, 'area', 'area', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4605, 46, 'id_gedung', 'id_gedung', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4606, 46, 'kode_gedung', 'kode_gedung', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4607, 46, 'gedung', 'gedung', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4608, 46, 'area_id', 'Area', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, 'tb_area_master', 'id_area', 'area'),
(4609, 33, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4610, 33, 'gedung_id', 'gedung_id', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tb_gedung_master', 'id_gedung', 'gedung'),
(4611, 33, 'name_room', 'name_room', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4612, 33, 'lat', 'lat', 'input', '', '', 'yes', NULL, '', '', '', 'yes', 4, '', '', ''),
(4613, 33, 'long', 'long', 'input', '', '', 'yes', NULL, '', '', '', 'yes', 5, '', '', ''),
(4614, 33, 'id_room', 'id_room', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4615, 33, 'kode_room', 'kode_room', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4616, 33, 'pic', 'pic', 'select', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 8, 'tb_pegawai_master', 'NIP', 'Pegawai'),
(4617, 33, 'area_id', 'area_id', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(4626, 47, 'id_room', 'id_room', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4627, 47, 'gedung_id', 'Gedung', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tb_gedung_master', 'id_gedung', 'gedung'),
(4628, 47, 'kode_room', 'Kode Ruangan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4629, 47, 'name_room', 'Nama Ruangan', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(4630, 47, 'lat', 'Latitude', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4631, 47, 'long', 'Longitude', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4632, 47, 'pic', 'pic', 'number', '', '', 'yes', NULL, '', '', '', '', 8, '', '', ''),
(4683, 42, 'reader_id', 'reader_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4684, 42, 'room_id', 'Ruangan', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, 'tb_room_master', 'id_room', 'name_room'),
(4685, 42, 'reader_name', 'Nama Reader', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4686, 42, 'setfor', 'posisi untuk IN/OUT?', 'custom_option', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 4, '', '', ''),
(4687, 42, 'reader_serialnumber', 'Serial Number', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(4688, 42, 'reader_type', 'Tipe', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4689, 42, 'reader_ip', 'IP Address', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4690, 42, 'reader_port', 'Port', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(4691, 42, 'reader_com', 'COM', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(4692, 42, 'reader_baudrate', 'Baudrate', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 10, '', '', ''),
(4693, 42, 'reader_power', 'Power', 'number', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 11, '', '', ''),
(4694, 42, 'reader_interval', 'Interval', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 12, '', '', ''),
(4695, 42, 'reader_mode', 'Mode', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(4696, 42, 'reader_updatedby', 'Update By', 'number', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 14, '', '', ''),
(4697, 42, 'reader_updated', 'Updated', 'datetime', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 15, '', '', ''),
(4698, 42, 'reader_createdby', 'Created By', 'number', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 16, '', '', ''),
(4699, 42, 'reader_created', 'Created', 'datetime', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 17, '', '', ''),
(4700, 42, 'reader_family', 'Reader Series', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(4701, 42, 'connecting', 'Status Reader', 'custom_option', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(4702, 42, 'reader_model', 'Model', 'input', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 20, '', '', ''),
(4703, 42, 'reader_identity', 'reader_identity', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(4704, 42, 'reader_antena', 'Antena', 'custom_select', '', '', 'yes', NULL, '', 'yes', 'yes', 'yes', 22, '', '', ''),
(4705, 42, 'reader_angle', 'Angle', 'custom_select', '', '', 'yes', NULL, '', '', '', 'yes', 23, '', '', ''),
(4706, 42, 'reader_gate', 'Gate', 'input', '', '', 'yes', NULL, '', '', '', 'yes', 24, '', '', ''),
(4707, 42, 'alias_antenna', 'Alias Antena', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 25, '', '', ''),
(4725, 44, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4726, 44, 'tanggal', 'tanggal', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4727, 44, 'waktu', 'waktu', 'time', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4728, 44, 'id_room', 'Ruangan', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, 'tb_room_master', 'id_room', 'name_room'),
(4729, 44, 'id_reader', 'id_reader', 'number', '', '', 'yes', NULL, '', '', '', '', 5, '', '', ''),
(4730, 44, 'user', 'user', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4731, 44, 'labeling', 'labeling', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4732, 44, 'rfid_code_tag', 'rfid_code_tag', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(4733, 44, 'invent_id', 'invent_id', 'input', '', '', '', NULL, '', '', '', '', 9, '', '', ''),
(4752, 48, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4753, 48, 'kode_tid', 'kode_tid', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4754, 48, 'kode_epc', 'kode_epc', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4755, 48, 'id_aset', 'id_aset', 'input', '', '', 'yes', NULL, '', '', '', '', 4, '', '', ''),
(4756, 48, 'status_tag', 'status_tag', 'custom_select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(4757, 48, 'type_tag', 'type_tag', 'number', '', '', 'yes', NULL, '', '', '', '', 6, '', '', ''),
(4758, 49, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(4759, 49, 'kode_tid', 'kode_tid', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(4760, 49, 'kode_aset', 'kode_aset', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(4761, 49, 'nup', 'nup', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(4762, 49, 'kategori', 'kategori', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(4763, 49, 'merk', 'merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(4764, 49, 'tipe', 'tipe', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(4765, 49, 'id_kondisi', 'id_kondisi', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(4766, 49, 'status', 'status', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(4767, 49, 'tipe_moving', 'tipe_moving', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(4768, 49, 'nama_aset', 'nama_aset', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(4769, 49, 'id_area', 'id_area', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(4770, 49, 'id_gedung', 'id_gedung', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(4771, 49, 'id_ruangan', 'id_ruangan', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(4772, 49, 'tgl_perolehan', 'tgl_perolehan', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(4773, 49, 'tgl_inventarisasi', 'tgl_inventarisasi', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 16, '', '', ''),
(4774, 49, 'flag_inventarisasi', 'flag_inventarisasi', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(4775, 49, 'tgl_peminjaman', 'tgl_peminjaman', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(4776, 49, 'tgl_pengembalian', 'tgl_pengembalian', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(4777, 49, 'tgl_mutasi', 'tgl_mutasi', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 20, '', '', ''),
(4778, 49, 'id_lokasi_moving', 'id_lokasi_moving', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(4779, 49, 'id_pegawai', 'id_pegawai', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 22, '', '', ''),
(5170, 51, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(5171, 51, 'kode_tid', 'kode_tid', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(5172, 51, 'kode_aset', 'kode_aset', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, '', '', ''),
(5173, 51, 'nup', 'nup', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(5174, 51, 'kategori', 'kategori', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 5, '', '', ''),
(5175, 51, 'merk', 'merk', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(5176, 51, 'tipe', 'tipe', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(5177, 51, 'id_kondisi', 'id_kondisi', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 8, '', '', ''),
(5178, 51, 'status', 'status', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(5179, 51, 'tipe_moving', 'tipe_moving', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(5180, 51, 'nama_aset', 'nama_aset', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 11, '', '', ''),
(5181, 51, 'id_area', 'id_area', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 12, '', '', ''),
(5182, 51, 'id_gedung', 'id_gedung', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, '', '', ''),
(5183, 51, 'id_ruangan', 'id_ruangan', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, '', '', ''),
(5184, 51, 'tgl_perolehan', 'tgl_perolehan', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 15, '', '', ''),
(5185, 51, 'tgl_inventarisasi', 'tgl_inventarisasi', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 16, '', '', ''),
(5186, 51, 'flag_inventarisasi', 'flag_inventarisasi', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 17, '', '', ''),
(5187, 51, 'tgl_peminjaman', 'tgl_peminjaman', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 18, '', '', ''),
(5188, 51, 'tgl_pengembalian', 'tgl_pengembalian', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 19, '', '', ''),
(5189, 51, 'tgl_mutasi', 'tgl_mutasi', 'datetime', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 20, '', '', ''),
(5190, 51, 'id_lokasi_moving', 'id_lokasi_moving', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 21, '', '', ''),
(5191, 51, 'id_pegawai', 'id_pegawai', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 22, '', '', ''),
(5207, 50, 'id', 'id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(5208, 50, 'kode_transaksi', 'kode_transaksi', 'input', '', '', 'yes', NULL, 'yes', '', '', 'yes', 2, '', '', ''),
(5209, 50, 'tipe_transaksi', 'tipe_transaksi', 'select', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 3, 'tb_master_type_transaksi', 'id', 'tipe_transaksi'),
(5210, 50, 'status_transaksi', 'status_transaksi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 4, '', '', ''),
(5211, 50, 'tgl_input', 'tgl_input', 'date', '', '', 'yes', NULL, '', '', '', '', 5, '', '', ''),
(5212, 50, 'tgl_awal_transaksi', 'tgl_awal_transaksi', 'date', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 6, '', '', ''),
(5213, 50, 'ket_transaksi', 'ket_transaksi', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', ''),
(5214, 50, 'tgl_akhir_transaksi', 'tgl_akhir_transaksi', 'date', '', '', 'yes', NULL, '', '', '', '', 8, '', '', ''),
(5215, 50, 'id_pegawai_input', 'id_pegawai_input', 'number', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 9, '', '', ''),
(5216, 50, 'nama_pegawai_input', 'nama_pegawai_input', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 10, '', '', ''),
(5217, 50, 'id_pegawai', 'id_pegawai', 'number', '', '', 'yes', NULL, '', '', '', '', 11, '', '', ''),
(5218, 50, 'nama_pegawai', 'nama_pegawai', 'input', '', '', 'yes', NULL, '', '', '', '', 12, '', '', ''),
(5219, 50, 'id_area', 'id_area', 'chained', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 13, 'tb_master_area', 'id', 'area'),
(5220, 50, 'id_gedung', 'id_gedung', 'chained', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 14, 'tb_master_gedung', 'id', 'gedung'),
(5221, 50, 'id_ruangan', 'id_ruangan', 'chained', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 15, 'tb_master_ruangan', 'id', 'ruangan'),
(5229, 2, 'building_id', 'building_id', 'number', '', '', 'yes', NULL, '', '', '', 'yes', 1, '', '', ''),
(5230, 2, 'building_name', 'Building Name', 'input', '', '', 'yes', NULL, 'yes', 'yes', 'yes', 'yes', 2, '', '', ''),
(5231, 2, 'building_created', 'Create Date', 'timestamp', '', '', 'yes', NULL, '', 'yes', '', 'yes', 3, '', '', ''),
(5232, 2, 'building_createdby', 'Create By', 'current_user_id', '', '', 'yes', NULL, '', 'yes', '', 'yes', 4, '', '', ''),
(5233, 2, 'building_updated', 'Update Date', 'timestamp', '', '', '', NULL, '', 'yes', 'yes', 'yes', 5, '', '', ''),
(5234, 2, 'building_updatedby', 'Update By', 'current_user_id', '', '', '', NULL, '', 'yes', 'yes', 'yes', 6, '', '', ''),
(5235, 2, 'kode_gedung', 'kode_gedung', 'input', '', '', '', NULL, 'yes', 'yes', 'yes', 'yes', 7, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field_condition`
--

CREATE TABLE `crud_field_condition` (
  `id` int UNSIGNED NOT NULL,
  `crud_field_id` int NOT NULL,
  `reff` text,
  `crud_id` int NOT NULL,
  `cond_field` text,
  `cond_operator` text,
  `cond_value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `crud_field_configuration`
--

CREATE TABLE `crud_field_configuration` (
  `id` int UNSIGNED NOT NULL,
  `crud_field_id` int NOT NULL,
  `crud_id` int NOT NULL,
  `group_config` varchar(200) NOT NULL,
  `config_name` text NOT NULL,
  `config_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `crud_field_configuration`
--

INSERT INTO `crud_field_configuration` (`id`, `crud_field_id`, `crud_id`, `group_config`, `config_name`, `config_value`) VALUES
(45, 5209, 50, 'stepper', 'title', 'Form Register'),
(46, 5219, 50, 'stepper', 'title', 'Pilih Area');

-- --------------------------------------------------------

--
-- Table structure for table `crud_field_validation`
--

CREATE TABLE `crud_field_validation` (
  `id` int UNSIGNED NOT NULL,
  `crud_field_id` int NOT NULL,
  `crud_id` int NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `crud_field_validation`
--

INSERT INTO `crud_field_validation` (`id`, `crud_field_id`, `crud_id`, `validation_name`, `validation_value`) VALUES
(1, 2, 1, 'required', ''),
(2, 2, 1, 'max_length', '255'),
(3, 3, 1, 'required', ''),
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
(560, 601, 9, 'required', ''),
(561, 601, 9, 'max_length', '11'),
(562, 602, 9, 'required', ''),
(563, 602, 9, 'max_length', '11'),
(564, 603, 9, 'required', ''),
(565, 603, 9, 'max_length', '11'),
(566, 604, 9, 'required', ''),
(1611, 2035, 7, 'required', ''),
(1612, 2035, 7, 'max_length', '255'),
(1613, 2036, 7, 'required', ''),
(1614, 2037, 7, 'required', ''),
(1678, 2085, 13, 'required', ''),
(1679, 2085, 13, 'max_length', '6'),
(1680, 2086, 13, 'required', ''),
(1681, 2086, 13, 'max_length', '100'),
(1682, 2087, 13, 'required', ''),
(1683, 2087, 13, 'max_length', '100'),
(1684, 2088, 13, 'required', ''),
(1685, 2088, 13, 'max_length', '200'),
(1686, 2089, 13, 'required', ''),
(1687, 2089, 13, 'max_length', '50'),
(1688, 2090, 13, 'required', ''),
(1689, 2090, 13, 'max_length', '50'),
(1690, 2091, 13, 'required', ''),
(1691, 2091, 13, 'max_length', '25'),
(1692, 2092, 13, 'required', ''),
(1693, 2093, 13, 'required', ''),
(1694, 2093, 13, 'max_length', '25'),
(1695, 2094, 13, 'required', ''),
(1696, 2095, 13, 'required', ''),
(1732, 2140, 3, 'required', ''),
(1733, 2140, 3, 'max_length', '255'),
(1734, 2141, 3, 'required', ''),
(1735, 2141, 3, 'max_length', '10'),
(1736, 2142, 3, 'required', ''),
(1737, 2142, 3, 'max_length', '20'),
(1738, 2147, 3, 'required', ''),
(1739, 2147, 3, 'max_length', '11'),
(1784, 2199, 4, 'required', ''),
(1785, 2199, 4, 'max_length', '11'),
(1786, 2200, 4, 'required', ''),
(1787, 2200, 4, 'max_length', '48'),
(1788, 2201, 4, 'required', ''),
(1789, 2201, 4, 'max_length', '96'),
(1790, 2202, 4, 'required', ''),
(1791, 2203, 4, 'required', ''),
(1792, 2203, 4, 'max_length', '255'),
(1793, 2209, 6, 'required', ''),
(1794, 2209, 6, 'max_length', '11'),
(1795, 2210, 6, 'required', ''),
(1796, 2210, 6, 'max_length', '11'),
(1797, 2211, 6, 'required', ''),
(1798, 2216, 14, 'required', ''),
(1799, 2216, 14, 'max_length', '50'),
(1800, 2217, 14, 'required', ''),
(1801, 2217, 14, 'max_length', '50'),
(1802, 2218, 14, 'required', ''),
(1803, 2218, 14, 'max_length', '150'),
(1804, 2219, 14, 'required', ''),
(1805, 2219, 14, 'max_length', '11'),
(1806, 2220, 14, 'required', ''),
(1807, 2220, 14, 'max_length', '150'),
(1808, 2221, 14, 'required', ''),
(1809, 2222, 14, 'required', ''),
(1810, 2222, 14, 'max_length', '50'),
(1811, 2223, 14, 'required', ''),
(1812, 2223, 14, 'max_length', '4'),
(1813, 2224, 14, 'required', ''),
(1814, 2224, 14, 'max_length', '255'),
(2052, 2351, 15, 'required', ''),
(2053, 2351, 15, 'max_length', '30'),
(2054, 2352, 15, 'required', ''),
(2055, 2352, 15, 'max_length', '30'),
(2056, 2353, 15, 'required', ''),
(2057, 2353, 15, 'max_length', '30'),
(2058, 2354, 15, 'required', ''),
(2059, 2354, 15, 'max_length', '11'),
(2060, 2355, 15, 'required', ''),
(2061, 2355, 15, 'max_length', '11'),
(2062, 2356, 15, 'required', ''),
(2063, 2356, 15, 'max_length', '11'),
(2064, 2357, 15, 'required', ''),
(2065, 2357, 15, 'max_length', '30'),
(2066, 2358, 15, 'required', ''),
(2067, 2358, 15, 'max_length', '30'),
(2068, 2359, 15, 'required', ''),
(2069, 2359, 15, 'max_length', '30'),
(2070, 2360, 15, 'required', ''),
(2071, 2360, 15, 'max_length', '30'),
(2072, 2361, 15, 'required', ''),
(2073, 2361, 15, 'max_length', '10'),
(2074, 2362, 15, 'required', ''),
(2075, 2362, 15, 'max_length', '30'),
(2076, 2363, 15, 'required', ''),
(2077, 2363, 15, 'max_length', '30'),
(2078, 2364, 15, 'required', ''),
(2079, 2364, 15, 'max_length', '30'),
(2080, 2365, 15, 'required', ''),
(2081, 2365, 15, 'max_length', '30'),
(2082, 2366, 15, 'required', ''),
(2083, 2366, 15, 'max_length', '30'),
(2084, 2367, 15, 'required', ''),
(2085, 2367, 15, 'max_length', '30'),
(2086, 2368, 15, 'required', ''),
(2087, 2368, 15, 'max_length', '30'),
(2088, 2369, 15, 'required', ''),
(2089, 2369, 15, 'max_length', '30'),
(2090, 2370, 15, 'required', ''),
(2091, 2370, 15, 'max_length', '30'),
(2092, 2371, 15, 'required', ''),
(2093, 2371, 15, 'max_length', '30'),
(2094, 2372, 15, 'required', ''),
(2095, 2372, 15, 'max_length', '30'),
(2096, 2373, 15, 'required', ''),
(2097, 2373, 15, 'max_length', '30'),
(2098, 2374, 15, 'required', ''),
(2099, 2374, 15, 'max_length', '30'),
(2100, 2375, 15, 'required', ''),
(2101, 2375, 15, 'max_length', '30'),
(2102, 2376, 15, 'required', ''),
(2103, 2376, 15, 'max_length', '30'),
(2104, 2377, 15, 'required', ''),
(2105, 2377, 15, 'max_length', '10'),
(2106, 2378, 15, 'required', ''),
(2107, 2378, 15, 'max_length', '30'),
(2108, 2379, 15, 'required', ''),
(2109, 2379, 15, 'max_length', '30'),
(2110, 2380, 15, 'required', ''),
(2111, 2380, 15, 'max_length', '30'),
(2112, 2381, 15, 'required', ''),
(2113, 2381, 15, 'max_length', '30'),
(2114, 2382, 15, 'required', ''),
(2115, 2382, 15, 'max_length', '30'),
(2116, 2383, 15, 'required', ''),
(2117, 2383, 15, 'max_length', '30'),
(2118, 2384, 15, 'required', ''),
(2119, 2384, 15, 'max_length', '30'),
(2120, 2385, 15, 'required', ''),
(2121, 2385, 15, 'max_length', '30'),
(2122, 2386, 15, 'required', ''),
(2123, 2386, 15, 'max_length', '30'),
(2124, 2387, 15, 'required', ''),
(2125, 2387, 15, 'max_length', '30'),
(2126, 2388, 15, 'required', ''),
(2127, 2388, 15, 'max_length', '30'),
(2128, 2389, 15, 'required', ''),
(2129, 2390, 15, 'required', ''),
(2130, 2391, 15, 'required', ''),
(2526, 2603, 16, 'required', ''),
(2527, 2603, 16, 'max_length', '30'),
(2528, 2604, 16, 'required', ''),
(2529, 2604, 16, 'max_length', '30'),
(2530, 2605, 16, 'required', ''),
(2531, 2605, 16, 'max_length', '30'),
(2532, 2606, 16, 'required', ''),
(2533, 2606, 16, 'max_length', '11'),
(2534, 2607, 16, 'required', ''),
(2535, 2607, 16, 'max_length', '11'),
(2536, 2608, 16, 'required', ''),
(2537, 2608, 16, 'max_length', '11'),
(2538, 2609, 16, 'required', ''),
(2539, 2609, 16, 'max_length', '30'),
(2540, 2610, 16, 'required', ''),
(2541, 2610, 16, 'max_length', '30'),
(2542, 2611, 16, 'required', ''),
(2543, 2611, 16, 'max_length', '30'),
(2544, 2612, 16, 'required', ''),
(2545, 2612, 16, 'max_length', '30'),
(2546, 2613, 16, 'required', ''),
(2547, 2613, 16, 'max_length', '10'),
(2548, 2614, 16, 'required', ''),
(2549, 2614, 16, 'max_length', '30'),
(2550, 2615, 16, 'required', ''),
(2551, 2615, 16, 'max_length', '30'),
(2552, 2616, 16, 'required', ''),
(2553, 2616, 16, 'max_length', '30'),
(2554, 2617, 16, 'required', ''),
(2555, 2617, 16, 'max_length', '30'),
(2556, 2618, 16, 'required', ''),
(2557, 2618, 16, 'max_length', '30'),
(2558, 2619, 16, 'required', ''),
(2559, 2619, 16, 'max_length', '30'),
(2560, 2620, 16, 'required', ''),
(2561, 2620, 16, 'max_length', '30'),
(2562, 2621, 16, 'required', ''),
(2563, 2621, 16, 'max_length', '30'),
(2564, 2622, 16, 'required', ''),
(2565, 2622, 16, 'max_length', '30'),
(2566, 2623, 16, 'required', ''),
(2567, 2623, 16, 'max_length', '30'),
(2568, 2624, 16, 'required', ''),
(2569, 2624, 16, 'max_length', '30'),
(2570, 2625, 16, 'required', ''),
(2571, 2625, 16, 'max_length', '30'),
(2572, 2626, 16, 'required', ''),
(2573, 2626, 16, 'max_length', '30'),
(2574, 2627, 16, 'required', ''),
(2575, 2627, 16, 'max_length', '30'),
(2576, 2628, 16, 'required', ''),
(2577, 2628, 16, 'max_length', '30'),
(2578, 2629, 16, 'required', ''),
(2579, 2629, 16, 'max_length', '10'),
(2580, 2630, 16, 'required', ''),
(2581, 2630, 16, 'max_length', '30'),
(2582, 2631, 16, 'required', ''),
(2583, 2631, 16, 'max_length', '30'),
(2584, 2632, 16, 'required', ''),
(2585, 2632, 16, 'max_length', '30'),
(2586, 2633, 16, 'required', ''),
(2587, 2633, 16, 'max_length', '30'),
(2588, 2634, 16, 'required', ''),
(2589, 2634, 16, 'max_length', '30'),
(2590, 2635, 16, 'required', ''),
(2591, 2635, 16, 'max_length', '30'),
(2592, 2636, 16, 'required', ''),
(2593, 2636, 16, 'max_length', '30'),
(2594, 2637, 16, 'required', ''),
(2595, 2637, 16, 'max_length', '30'),
(2596, 2638, 16, 'required', ''),
(2597, 2638, 16, 'max_length', '30'),
(2598, 2639, 16, 'required', ''),
(2599, 2639, 16, 'max_length', '30'),
(2600, 2640, 16, 'required', ''),
(2601, 2640, 16, 'max_length', '30'),
(2602, 2641, 16, 'required', ''),
(2603, 2642, 16, 'required', ''),
(2604, 2643, 16, 'required', ''),
(2684, 2687, 17, 'required', ''),
(2685, 2687, 17, 'max_length', '30'),
(2686, 2688, 17, 'required', ''),
(2687, 2688, 17, 'max_length', '30'),
(2688, 2689, 17, 'required', ''),
(2689, 2689, 17, 'max_length', '30'),
(2690, 2690, 17, 'required', ''),
(2691, 2690, 17, 'max_length', '11'),
(2692, 2691, 17, 'required', ''),
(2693, 2691, 17, 'max_length', '11'),
(2694, 2692, 17, 'required', ''),
(2695, 2692, 17, 'max_length', '11'),
(2696, 2693, 17, 'required', ''),
(2697, 2693, 17, 'max_length', '30'),
(2698, 2694, 17, 'required', ''),
(2699, 2694, 17, 'max_length', '30'),
(2700, 2695, 17, 'required', ''),
(2701, 2695, 17, 'max_length', '30'),
(2702, 2696, 17, 'required', ''),
(2703, 2696, 17, 'max_length', '30'),
(2704, 2697, 17, 'required', ''),
(2705, 2697, 17, 'max_length', '10'),
(2706, 2698, 17, 'required', ''),
(2707, 2698, 17, 'max_length', '30'),
(2708, 2699, 17, 'required', ''),
(2709, 2699, 17, 'max_length', '30'),
(2710, 2700, 17, 'required', ''),
(2711, 2700, 17, 'max_length', '30'),
(2712, 2701, 17, 'required', ''),
(2713, 2701, 17, 'max_length', '30'),
(2714, 2702, 17, 'required', ''),
(2715, 2702, 17, 'max_length', '30'),
(2716, 2703, 17, 'required', ''),
(2717, 2703, 17, 'max_length', '30'),
(2718, 2704, 17, 'required', ''),
(2719, 2704, 17, 'max_length', '30'),
(2720, 2705, 17, 'required', ''),
(2721, 2705, 17, 'max_length', '30'),
(2722, 2706, 17, 'required', ''),
(2723, 2706, 17, 'max_length', '30'),
(2724, 2707, 17, 'required', ''),
(2725, 2707, 17, 'max_length', '30'),
(2726, 2708, 17, 'required', ''),
(2727, 2708, 17, 'max_length', '30'),
(2728, 2709, 17, 'required', ''),
(2729, 2709, 17, 'max_length', '30'),
(2730, 2710, 17, 'required', ''),
(2731, 2710, 17, 'max_length', '30'),
(2732, 2711, 17, 'required', ''),
(2733, 2711, 17, 'max_length', '30'),
(2734, 2712, 17, 'required', ''),
(2735, 2712, 17, 'max_length', '30'),
(2736, 2713, 17, 'required', ''),
(2737, 2713, 17, 'max_length', '10'),
(2738, 2714, 17, 'required', ''),
(2739, 2714, 17, 'max_length', '30'),
(2740, 2715, 17, 'required', ''),
(2741, 2715, 17, 'max_length', '30'),
(2742, 2716, 17, 'required', ''),
(2743, 2716, 17, 'max_length', '30'),
(2744, 2717, 17, 'required', ''),
(2745, 2717, 17, 'max_length', '30'),
(2746, 2718, 17, 'required', ''),
(2747, 2718, 17, 'max_length', '30'),
(2748, 2719, 17, 'required', ''),
(2749, 2719, 17, 'max_length', '30'),
(2750, 2720, 17, 'required', ''),
(2751, 2720, 17, 'max_length', '30'),
(2752, 2721, 17, 'required', ''),
(2753, 2721, 17, 'max_length', '30'),
(2754, 2722, 17, 'required', ''),
(2755, 2722, 17, 'max_length', '30'),
(2756, 2723, 17, 'required', ''),
(2757, 2723, 17, 'max_length', '30'),
(2758, 2724, 17, 'required', ''),
(2759, 2724, 17, 'max_length', '30'),
(2760, 2725, 17, 'required', ''),
(2761, 2726, 17, 'required', ''),
(2762, 2727, 17, 'required', ''),
(2790, 2743, 18, 'required', ''),
(2791, 2743, 18, 'max_length', '30'),
(2792, 2744, 18, 'required', ''),
(2793, 2744, 18, 'max_length', '30'),
(2794, 2745, 18, 'required', ''),
(2795, 2745, 18, 'max_length', '30'),
(2796, 2746, 18, 'required', ''),
(2797, 2746, 18, 'max_length', '11'),
(2798, 2747, 18, 'required', ''),
(2799, 2747, 18, 'max_length', '11'),
(2800, 2748, 18, 'required', ''),
(2801, 2748, 18, 'max_length', '11'),
(2802, 2749, 18, 'required', ''),
(2803, 2749, 18, 'max_length', '30'),
(2804, 2750, 18, 'required', ''),
(2805, 2750, 18, 'max_length', '30'),
(2806, 2751, 18, 'required', ''),
(2807, 2751, 18, 'max_length', '30'),
(2808, 2752, 18, 'required', ''),
(2809, 2752, 18, 'max_length', '30'),
(2810, 2753, 18, 'required', ''),
(2811, 2753, 18, 'max_length', '10'),
(2812, 2754, 18, 'required', ''),
(2813, 2754, 18, 'max_length', '11'),
(2814, 2755, 18, 'required', ''),
(2815, 2756, 18, 'required', ''),
(2816, 2756, 18, 'max_length', '30'),
(2871, 2792, 19, 'required', ''),
(2872, 2792, 19, 'max_length', '30'),
(2873, 2793, 19, 'required', ''),
(2874, 2793, 19, 'max_length', '30'),
(2875, 2794, 19, 'required', ''),
(2876, 2794, 19, 'max_length', '30'),
(2877, 2795, 19, 'required', ''),
(2878, 2795, 19, 'max_length', '11'),
(2879, 2796, 19, 'required', ''),
(2880, 2796, 19, 'max_length', '11'),
(2881, 2797, 19, 'required', ''),
(2882, 2797, 19, 'max_length', '11'),
(2883, 2798, 19, 'required', ''),
(2884, 2798, 19, 'max_length', '30'),
(2885, 2799, 19, 'required', ''),
(2886, 2799, 19, 'max_length', '30'),
(2887, 2800, 19, 'required', ''),
(2888, 2800, 19, 'max_length', '30'),
(2889, 2801, 19, 'required', ''),
(2890, 2801, 19, 'max_length', '30'),
(2891, 2802, 19, 'required', ''),
(2892, 2802, 19, 'max_length', '10'),
(2893, 2803, 19, 'required', ''),
(2894, 2803, 19, 'max_length', '11'),
(2895, 2804, 19, 'required', ''),
(2896, 2805, 19, 'required', ''),
(2897, 2805, 19, 'max_length', '30'),
(3215, 3155, 22, 'required', ''),
(3216, 3155, 22, 'max_length', '11'),
(3217, 3156, 22, 'required', ''),
(3218, 3156, 22, 'max_length', '30'),
(3219, 3157, 22, 'required', ''),
(3220, 3157, 22, 'max_length', '30'),
(3221, 3158, 22, 'required', ''),
(3222, 3158, 22, 'max_length', '11'),
(3223, 3159, 22, 'required', ''),
(3224, 3159, 22, 'max_length', '30'),
(3225, 3160, 22, 'required', ''),
(3226, 3160, 22, 'max_length', '30'),
(3227, 3162, 23, 'required', ''),
(3228, 3162, 23, 'max_length', '255'),
(3229, 3163, 23, 'required', ''),
(3230, 3163, 23, 'max_length', '255'),
(3279, 3191, 24, 'required', ''),
(3280, 3191, 24, 'max_length', '11'),
(3281, 3192, 24, 'required', ''),
(3282, 3192, 24, 'max_length', '11'),
(3283, 3193, 24, 'required', ''),
(3284, 3194, 24, 'required', ''),
(3285, 3195, 24, 'required', ''),
(3286, 3195, 24, 'max_length', '11'),
(3287, 3196, 24, 'required', ''),
(3288, 3196, 24, 'max_length', '11'),
(3289, 3197, 24, 'required', ''),
(3290, 3197, 24, 'max_length', '30'),
(3291, 3198, 24, 'required', ''),
(3292, 3198, 24, 'max_length', '11'),
(3293, 3199, 24, 'required', ''),
(3294, 3199, 24, 'max_length', '30'),
(3333, 3227, 26, 'required', ''),
(3334, 3227, 26, 'max_length', '11'),
(3335, 3228, 26, 'required', ''),
(3336, 3228, 26, 'max_length', '11'),
(3337, 3229, 26, 'required', ''),
(3338, 3229, 26, 'max_length', '11'),
(3339, 3230, 26, 'required', ''),
(3340, 3230, 26, 'max_length', '11'),
(3341, 3231, 26, 'required', ''),
(3342, 3231, 26, 'max_length', '11'),
(3446, 3381, 27, 'required', ''),
(3447, 3381, 27, 'max_length', '11'),
(3448, 3382, 27, 'required', ''),
(3449, 3383, 27, 'required', ''),
(3450, 3384, 27, 'required', ''),
(3451, 3384, 27, 'max_length', '11'),
(3452, 3385, 27, 'required', ''),
(3453, 3385, 27, 'max_length', '255'),
(3454, 3386, 27, 'required', ''),
(3455, 3386, 27, 'max_length', '255'),
(3456, 3387, 27, 'required', ''),
(3457, 3387, 27, 'max_length', '255'),
(3458, 3388, 27, 'required', ''),
(3459, 3389, 27, 'required', ''),
(3460, 3390, 27, 'required', ''),
(3461, 3390, 27, 'max_length', '11'),
(3462, 3391, 27, 'required', ''),
(3463, 3391, 27, 'max_length', '11'),
(3464, 3392, 27, 'required', ''),
(3465, 3392, 27, 'max_length', '11'),
(3466, 3393, 27, 'required', ''),
(3467, 3393, 27, 'max_length', '11'),
(3538, 3479, 28, 'required', ''),
(3539, 3479, 28, 'max_length', '11'),
(3540, 3480, 28, 'required', ''),
(3541, 3480, 28, 'max_length', '255'),
(3542, 3481, 28, 'required', ''),
(3543, 3481, 28, 'max_length', '11'),
(3544, 3482, 28, 'required', ''),
(3545, 3482, 28, 'max_length', '11'),
(3566, 3499, 29, 'required', ''),
(3567, 3499, 29, 'max_length', '11'),
(3568, 3501, 29, 'required', ''),
(3569, 3501, 29, 'max_length', '11'),
(3570, 3502, 29, 'required', ''),
(3571, 3502, 29, 'max_length', '11'),
(3579, 3510, 30, 'required', ''),
(3580, 3510, 30, 'max_length', '11'),
(3581, 3511, 30, 'required', ''),
(3582, 3511, 30, 'max_length', '255'),
(3619, 3546, 21, 'required', ''),
(3620, 3546, 21, 'max_length', '30'),
(3621, 3547, 21, 'max_length', '30'),
(3622, 3548, 21, 'required', ''),
(3623, 3548, 21, 'max_length', '30'),
(3624, 3549, 21, 'required', ''),
(3625, 3550, 21, 'required', ''),
(3636, 3561, 34, 'required', ''),
(3637, 3561, 34, 'max_length', '11'),
(3638, 3562, 34, 'required', ''),
(3639, 3562, 34, 'max_length', '255'),
(3640, 3563, 34, 'required', ''),
(3641, 3563, 34, 'max_length', '255'),
(3642, 3564, 34, 'required', ''),
(3643, 3564, 34, 'max_length', '255'),
(3644, 3565, 34, 'required', ''),
(3645, 3566, 34, 'required', ''),
(3646, 3567, 34, 'required', ''),
(3647, 3567, 34, 'max_length', '255'),
(3751, 3717, 32, 'required', ''),
(3752, 3717, 32, 'max_length', '11'),
(3753, 3718, 32, 'required', ''),
(3754, 3718, 32, 'max_length', '255'),
(3755, 3719, 32, 'required', ''),
(3756, 3719, 32, 'max_length', '255'),
(3767, 3729, 5, 'required', ''),
(3768, 3731, 5, 'required', ''),
(3769, 3731, 5, 'max_length', '10'),
(3770, 3732, 5, 'required', ''),
(3771, 3733, 5, 'required', ''),
(3772, 3733, 5, 'max_length', '45'),
(3773, 3733, 5, 'valid_ip', ''),
(3774, 3734, 5, 'required', ''),
(3775, 3734, 5, 'max_length', '7'),
(3776, 3735, 5, 'required', ''),
(3777, 3736, 5, 'required', ''),
(3778, 3737, 5, 'required', ''),
(3779, 3738, 5, 'required', ''),
(3929, 3856, 20, 'required', ''),
(3930, 3856, 20, 'max_length', '11'),
(3931, 3857, 20, 'required', ''),
(3932, 3857, 20, 'max_length', '11'),
(3933, 3858, 20, 'required', ''),
(3934, 3858, 20, 'max_length', '11'),
(3935, 3859, 20, 'required', ''),
(3936, 3859, 20, 'max_length', '50'),
(4079, 3968, 36, 'max_length', '15'),
(4080, 3969, 36, 'max_length', '11'),
(4081, 3970, 36, 'max_length', '15'),
(4082, 3971, 36, 'max_length', '200'),
(4083, 3972, 36, 'max_length', '50'),
(4084, 3973, 36, 'max_length', '30'),
(4085, 3974, 36, 'max_length', '5'),
(4086, 3976, 36, 'max_length', '10'),
(4087, 3979, 36, 'max_length', '255'),
(4088, 3981, 36, 'max_length', '200'),
(4089, 3982, 36, 'max_length', '11'),
(4160, 4048, 25, 'required', ''),
(4161, 4048, 25, 'max_length', '11'),
(4162, 4049, 25, 'required', ''),
(4163, 4050, 25, 'required', ''),
(4164, 4051, 25, 'required', ''),
(4165, 4051, 25, 'max_length', '11'),
(4166, 4052, 25, 'max_length', '11'),
(4167, 4054, 25, 'required', ''),
(4190, 4072, 38, 'required', ''),
(4191, 4072, 38, 'max_length', '11'),
(4192, 4073, 38, 'required', ''),
(4193, 4073, 38, 'max_length', '11'),
(4194, 4074, 38, 'required', ''),
(4195, 4074, 38, 'max_length', '255'),
(4196, 4075, 38, 'required', ''),
(4197, 4075, 38, 'max_length', '255'),
(4198, 4076, 38, 'required', ''),
(4199, 4077, 38, 'required', ''),
(4269, 4154, 39, 'required', ''),
(4270, 4155, 39, 'required', ''),
(4271, 4156, 39, 'required', ''),
(4272, 4157, 39, 'required', ''),
(4273, 4158, 39, 'required', ''),
(4274, 4158, 39, 'max_length', '96'),
(4344, 4209, 40, 'required', ''),
(4345, 4210, 40, 'required', ''),
(4346, 4211, 40, 'required', ''),
(4347, 4211, 40, 'max_length', '255'),
(4348, 4212, 40, 'required', ''),
(4349, 4212, 40, 'max_length', '255'),
(4453, 4289, 37, 'required', ''),
(4454, 4289, 37, 'max_length', '11'),
(4455, 4290, 37, 'required', ''),
(4456, 4291, 37, 'required', ''),
(4457, 4292, 37, 'required', ''),
(4458, 4293, 37, 'required', ''),
(4459, 4294, 37, 'required', ''),
(4460, 4295, 37, 'required', ''),
(4461, 4295, 37, 'max_length', '255'),
(4462, 4296, 37, 'required', ''),
(4463, 4296, 37, 'max_length', '255'),
(4464, 4297, 37, 'required', ''),
(4465, 4297, 37, 'max_length', '255'),
(4466, 4298, 37, 'required', ''),
(4467, 4298, 37, 'max_length', '255'),
(4468, 4299, 37, 'required', ''),
(4469, 4299, 37, 'max_length', '11'),
(4470, 4300, 37, 'required', ''),
(4471, 4300, 37, 'max_length', '255'),
(4472, 4303, 41, 'required', ''),
(4473, 4303, 41, 'max_length', '255'),
(4474, 4304, 41, 'required', ''),
(4475, 4304, 41, 'max_length', '255'),
(4512, 4347, 35, 'required', ''),
(4513, 4347, 35, 'max_length', '255'),
(4514, 4348, 35, 'required', ''),
(4515, 4349, 35, 'required', ''),
(4516, 4349, 35, 'max_length', '10'),
(4517, 4350, 35, 'required', ''),
(4518, 4351, 35, 'required', ''),
(4519, 4351, 35, 'max_length', '45'),
(4520, 4352, 35, 'required', ''),
(4521, 4352, 35, 'max_length', '7'),
(4522, 4353, 35, 'required', ''),
(4523, 4354, 35, 'required', ''),
(4524, 4355, 35, 'required', ''),
(4525, 4355, 35, 'max_length', '2'),
(4526, 4356, 35, 'required', ''),
(4527, 4357, 35, 'required', ''),
(4528, 4358, 35, 'required', ''),
(4529, 4358, 35, 'max_length', '11'),
(4530, 4359, 35, 'required', ''),
(4531, 4360, 35, 'required', ''),
(4532, 4360, 35, 'max_length', '11'),
(4533, 4361, 35, 'required', ''),
(4534, 4362, 35, 'required', ''),
(4535, 4363, 35, 'required', ''),
(4745, 4542, 43, 'required', ''),
(4746, 4543, 43, 'required', ''),
(4747, 4544, 43, 'required', ''),
(4748, 4545, 43, 'required', ''),
(4749, 4545, 43, 'max_length', '20'),
(4750, 4546, 43, 'required', ''),
(4751, 4547, 43, 'required', ''),
(4752, 4548, 43, 'required', ''),
(4753, 4549, 43, 'required', ''),
(4754, 4549, 43, 'max_length', '96'),
(4817, 4593, 31, 'required', ''),
(4818, 4593, 31, 'max_length', '11'),
(4819, 4594, 31, 'required', ''),
(4820, 4594, 31, 'max_length', '50'),
(4821, 4595, 31, 'required', ''),
(4822, 4595, 31, 'max_length', '130'),
(4823, 4596, 31, 'max_length', '200'),
(4824, 4598, 45, 'required', ''),
(4825, 4598, 45, 'max_length', '50'),
(4826, 4599, 45, 'required', ''),
(4827, 4599, 45, 'max_length', '130'),
(4828, 4600, 45, 'required', ''),
(4829, 4600, 45, 'max_length', '200'),
(4835, 4606, 46, 'required', ''),
(4836, 4606, 46, 'max_length', '255'),
(4837, 4607, 46, 'required', ''),
(4838, 4607, 46, 'max_length', '255'),
(4839, 4608, 46, 'required', ''),
(4840, 4610, 33, 'required', ''),
(4841, 4610, 33, 'max_length', '50'),
(4842, 4611, 33, 'required', ''),
(4843, 4611, 33, 'max_length', '30'),
(4844, 4612, 33, 'required', ''),
(4845, 4613, 33, 'required', ''),
(4855, 4627, 47, 'required', ''),
(4856, 4628, 47, 'required', ''),
(4857, 4628, 47, 'max_length', '30'),
(4858, 4629, 47, 'required', ''),
(4859, 4629, 47, 'max_length', '30'),
(4860, 4630, 47, 'required', ''),
(4861, 4631, 47, 'required', ''),
(4862, 4632, 47, 'required', ''),
(4921, 4684, 42, 'required', ''),
(4922, 4685, 42, 'required', ''),
(4923, 4685, 42, 'max_length', '50'),
(4924, 4686, 42, 'required', ''),
(4925, 4687, 42, 'required', ''),
(4926, 4687, 42, 'max_length', '10'),
(4927, 4688, 42, 'required', ''),
(4928, 4689, 42, 'required', ''),
(4929, 4689, 42, 'max_length', '45'),
(4930, 4690, 42, 'required', ''),
(4931, 4690, 42, 'max_length', '7'),
(4932, 4691, 42, 'required', ''),
(4933, 4692, 42, 'required', ''),
(4934, 4693, 42, 'required', ''),
(4935, 4694, 42, 'required', ''),
(4936, 4695, 42, 'required', ''),
(4937, 4696, 42, 'required', ''),
(4938, 4697, 42, 'required', ''),
(4939, 4698, 42, 'required', ''),
(4940, 4699, 42, 'required', ''),
(4941, 4700, 42, 'required', ''),
(4942, 4702, 42, 'required', ''),
(4943, 4702, 42, 'max_length', '50'),
(4944, 4703, 42, 'required', ''),
(4945, 4703, 42, 'max_length', '50'),
(4946, 4704, 42, 'required', ''),
(4947, 4705, 42, 'required', ''),
(4948, 4706, 42, 'required', ''),
(4949, 4706, 42, 'max_length', '50'),
(4968, 4726, 44, 'required', ''),
(4969, 4727, 44, 'required', ''),
(4970, 4728, 44, 'required', ''),
(4971, 4728, 44, 'max_length', '20'),
(4972, 4729, 44, 'required', ''),
(4973, 4730, 44, 'required', ''),
(4974, 4731, 44, 'required', ''),
(4975, 4732, 44, 'required', ''),
(4976, 4732, 44, 'max_length', '96'),
(4989, 4753, 48, 'required', ''),
(4990, 4753, 48, 'max_length', '50'),
(4991, 4754, 48, 'max_length', '50'),
(4992, 4756, 48, 'required', ''),
(4993, 4759, 49, 'required', ''),
(4994, 4760, 49, 'required', ''),
(4995, 4760, 49, 'max_length', '50'),
(4996, 4761, 49, 'required', ''),
(4997, 4761, 49, 'max_length', '50'),
(4998, 4762, 49, 'required', ''),
(4999, 4763, 49, 'required', ''),
(5000, 4763, 49, 'max_length', '50'),
(5001, 4764, 49, 'required', ''),
(5002, 4764, 49, 'max_length', '50'),
(5003, 4765, 49, 'required', ''),
(5004, 4766, 49, 'required', ''),
(5005, 4767, 49, 'required', ''),
(5006, 4768, 49, 'required', ''),
(5007, 4768, 49, 'max_length', '100'),
(5008, 4769, 49, 'required', ''),
(5009, 4770, 49, 'required', ''),
(5010, 4771, 49, 'required', ''),
(5011, 4772, 49, 'required', ''),
(5012, 4773, 49, 'required', ''),
(5013, 4774, 49, 'required', ''),
(5014, 4775, 49, 'required', ''),
(5015, 4776, 49, 'required', ''),
(5016, 4777, 49, 'required', ''),
(5017, 4778, 49, 'required', ''),
(5018, 4779, 49, 'required', ''),
(5358, 5171, 51, 'required', ''),
(5359, 5172, 51, 'required', ''),
(5360, 5172, 51, 'max_length', '50'),
(5361, 5173, 51, 'required', ''),
(5362, 5173, 51, 'max_length', '50'),
(5363, 5174, 51, 'required', ''),
(5364, 5175, 51, 'required', ''),
(5365, 5175, 51, 'max_length', '50'),
(5366, 5176, 51, 'required', ''),
(5367, 5176, 51, 'max_length', '50'),
(5368, 5177, 51, 'required', ''),
(5369, 5178, 51, 'required', ''),
(5370, 5179, 51, 'required', ''),
(5371, 5180, 51, 'required', ''),
(5372, 5180, 51, 'max_length', '100'),
(5373, 5181, 51, 'required', ''),
(5374, 5182, 51, 'required', ''),
(5375, 5183, 51, 'required', ''),
(5376, 5184, 51, 'required', ''),
(5377, 5185, 51, 'required', ''),
(5378, 5186, 51, 'required', ''),
(5379, 5187, 51, 'required', ''),
(5380, 5188, 51, 'required', ''),
(5381, 5189, 51, 'required', ''),
(5382, 5190, 51, 'required', ''),
(5383, 5191, 51, 'required', ''),
(5397, 5208, 50, 'max_length', '20'),
(5398, 5209, 50, 'required', ''),
(5399, 5210, 50, 'required', ''),
(5400, 5211, 50, 'required', ''),
(5401, 5212, 50, 'required', ''),
(5402, 5213, 50, 'required', ''),
(5403, 5213, 50, 'max_length', '500'),
(5404, 5214, 50, 'required', ''),
(5405, 5216, 50, 'max_length', '100'),
(5406, 5218, 50, 'max_length', '100'),
(5407, 5219, 50, 'required', ''),
(5408, 5220, 50, 'required', ''),
(5409, 5221, 50, 'required', ''),
(5412, 5230, 2, 'required', ''),
(5413, 5230, 2, 'max_length', '255');

-- --------------------------------------------------------

--
-- Table structure for table `crud_function`
--

CREATE TABLE `crud_function` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `crud_id` int NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `crud_input_chained`
--

CREATE TABLE `crud_input_chained` (
  `id` int UNSIGNED NOT NULL,
  `chain_field` varchar(250) DEFAULT NULL,
  `chain_field_eq` varchar(250) DEFAULT NULL,
  `crud_field_id` int DEFAULT NULL,
  `crud_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `crud_input_chained`
--

INSERT INTO `crud_input_chained` (`id`, `chain_field`, `chain_field_eq`, `crud_field_id`, `crud_id`) VALUES
(13, 'id', '', 3730, 5),
(87, '', '', 5219, 50),
(88, 'id_area', 'id_area', 5220, 50),
(89, 'id_gedung', 'id_gedung', 5221, 50);

-- --------------------------------------------------------

--
-- Table structure for table `crud_input_type`
--

CREATE TABLE `crud_input_type` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `custom_value` int NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int UNSIGNED NOT NULL,
  `validation` varchar(200) NOT NULL,
  `input_able` varchar(20) NOT NULL,
  `group_input` text NOT NULL,
  `input_placeholder` text NOT NULL,
  `call_back` varchar(10) NOT NULL,
  `input_validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `form_custom_attribute`
--

CREATE TABLE `form_custom_attribute` (
  `id` int UNSIGNED NOT NULL,
  `form_field_id` int NOT NULL,
  `form_id` int NOT NULL,
  `attribute_value` text NOT NULL,
  `attribute_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `form_custom_option`
--

CREATE TABLE `form_custom_option` (
  `id` int UNSIGNED NOT NULL,
  `form_field_id` int NOT NULL,
  `form_id` int NOT NULL,
  `option_value` text NOT NULL,
  `option_label` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `form_field`
--

CREATE TABLE `form_field` (
  `id` int UNSIGNED NOT NULL,
  `form_id` int NOT NULL,
  `sort` int NOT NULL,
  `field_name` varchar(200) NOT NULL,
  `input_type` varchar(200) NOT NULL,
  `field_label` varchar(200) DEFAULT NULL,
  `placeholder` text,
  `show_detail_page` varchar(20) DEFAULT NULL,
  `show_update_form` varchar(20) DEFAULT NULL,
  `show_add_form` varchar(20) DEFAULT NULL,
  `show_column` varchar(20) DEFAULT NULL,
  `auto_generate_help_block` varchar(10) DEFAULT NULL,
  `help_block` text,
  `relation_table` varchar(200) DEFAULT NULL,
  `relation_value` varchar(200) DEFAULT NULL,
  `relation_label` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `form_field_validation`
--

CREATE TABLE `form_field_validation` (
  `id` int UNSIGNED NOT NULL,
  `form_field_id` int NOT NULL,
  `form_id` int NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`) VALUES
(1, 0, '31F95C96EBC0E56702586B638FB6CCE0', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int UNSIGNED NOT NULL,
  `label` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `icon_color` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `sort` int NOT NULL,
  `parent` int NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `menu_type_id` int NOT NULL,
  `active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `label`, `type`, `icon_color`, `link`, `sort`, `parent`, `icon`, `menu_type_id`, `active`) VALUES
(1, 'MAIN NAVIGATION', 'label', 'default', '{admin_url}/dashboard', 1, 1, '', 1, 1),
(3, 'CRUD Builder', 'menu', '', '{admin_url}/crud', 25, 0, 'fa-table', 1, 1),
(4, 'API Builder', 'menu', '', '{admin_url}/rest', 29, 0, 'fa-code', 1, 0),
(5, 'Page Builder', 'menu', '', '{admin_url}/page', 26, 0, 'fa-file-o', 1, 1),
(6, 'Form Builder', 'menu', '', '{admin_url}/form', 27, 0, 'fa-newspaper-o', 1, 0),
(7, 'Blog', 'menu', '', '{admin_url}/blog', 28, 0, 'fa-file-text-o', 1, 0),
(9, 'Auth', 'menu', '', '', 30, 0, 'fa-shield', 1, 1),
(10, 'User', 'menu', '', '{admin_url}/user', 31, 9, '', 1, 1),
(11, 'Groups', 'menu', '', '{admin_url}/group', 32, 9, '', 1, 1),
(12, 'Access', 'menu', '', '{admin_url}/access', 33, 9, '', 1, 0),
(13, 'Permission', 'menu', '', '{admin_url}/permission', 34, 9, '', 1, 1),
(14, 'API Keys', 'menu', '', '{admin_url}/keys', 35, 9, '', 1, 0),
(15, 'Extension', 'menu', '', '{admin_url}/extension', 36, 0, 'fa-puzzle-piece', 1, 0),
(16, 'Database', 'menu', '', '{admin_url}/database', 37, 0, 'fa-database', 1, 1),
(17, 'OTHER', 'label', '', '', 38, 0, '', 1, 0),
(18, 'Settings', 'menu', 'text-red', '{admin_url}/setting', 39, 0, 'fa-circle-o', 1, 1),
(19, 'Web Documentation', 'menu', 'text-blue', '{admin_url}/doc/web', 40, 0, 'fa-circle-o', 1, 0),
(20, 'API Documentation', 'menu', 'text-yellow', '{admin_url}/doc/api', 41, 0, 'fa-circle-o', 1, 0),
(21, 'Home', 'menu', '', '/', 1, 0, '', 2, 1),
(22, 'Blog', 'menu', '', 'blog', 2, 0, '', 2, 1),
(23, 'Dashboard', 'menu', '', '{admin_url}/dashboard', 3, 0, '', 2, 1),
(24, 'Master Ruangan', 'menu', 'default', '{admin_url}/tb_master_ruangan', 6, 50, 'fa-database', 1, 1),
(28, 'Master Data', 'label', 'default', '#', 3, 1, '', 1, 1),
(32, 'Pengaturan', 'label', 'default', '#', 20, 0, 'fa-gear', 1, 1),
(33, 'RFID Broken', 'menu', 'default', '{admin_url}/tag_broken', 22, 0, 'fa-barcode', 1, 0),
(34, 'RFID Borrow', NULL, 'default', '{admin_url}/tag_borrow', 23, 0, 'fa-barcode', 1, 0),
(35, 'RFID Anomaly', NULL, 'default', '{admin_url}/tag_anomaly', 24, 0, 'fa-barcode', 1, 0),
(36, 'RFID Tag', 'menu', 'default', '{admin_url}/tag_rfid', 35, 28, '', 1, 1),
(40, 'Master Data', 'menu', 'default', '#', 2, 40, 'fa-bank', 1, 1),
(41, 'Master Asset', 'menu', 'default', '{admin_url}/#', 3, 40, 'fa-bank', 1, 1),
(50, 'Master Data', 'menu', 'default', '#', 2, 0, 'fa-folder', 1, 1),
(70, 'Dashboard', 'menu', 'default', '{admin_url}/dashboard', 1, 0, 'fa-bar-chart', 1, 1),
(73, 'Menu', 'menu', 'default', '{admin_url}/menu', 21, 0, 'fa-clone', 1, 1),
(76, 'Master Pegawai', 'menu', 'default', '{admin_url}/tb_master_pegawai', 7, 50, 'fa-database', 1, 1),
(79, 'Sensus', 'menu', 'default', '{admin_url}/tb_history_invent', 13, 97, 'fa-clone', 1, 1),
(80, 'Cari Aset', 'menu', 'default', '{admin_url}/tb_asset_moving', 18, 0, 'fa-location-arrow', 1, 1),
(81, 'Peminjaman', 'menu', 'default', '{admin_url}/tb_pinjam_log', 15, 97, 'fa-book', 1, 1),
(82, 'Pemindahan', 'menu', 'default', '{admin_url}/tb_mutasi_asset', 14, 97, 'fa-exchange', 1, 1),
(84, 'Master Area', 'menu', 'default', '{admin_url}/tb_master_area', 4, 50, 'fa-database', 1, 1),
(85, 'Master Gedung', 'menu', 'default', '{admin_url}/tb_master_gedung', 5, 50, 'fa-database', 1, 1),
(86, 'Master Tag RFID', 'menu', 'default', '{admin_url}/tb_master_tag_rfid', 8, 50, 'fa-tag', 1, 1),
(87, 'Master Aset', 'menu', 'default', '{admin_url}/tb_master_aset', 3, 50, 'fa-database', 1, 1),
(88, 'Pengembalian', 'menu', 'default', '#', 16, 97, 'fa-book', 1, 1),
(92, 'Regristrasi Tag RFID', 'menu', 'default', '#', 10, 94, 'fa-edit', 1, 1),
(93, 'Regristasi Aset', 'menu', 'default', '#', 11, 94, 'fa-edit', 1, 1),
(94, 'Pendaftaran RFID', 'menu', 'default', '#', 9, 0, 'fa-archive', 1, 1),
(95, 'Laporan', 'menu', 'default', '#', 19, 0, 'fa-download', 1, 1),
(96, 'Perbaikan', 'menu', 'default', '#', 17, 97, '', 1, 1),
(97, 'Inventarisasi', 'menu', 'default', '#', 12, 0, 'fa-pencil-square-o', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `definition` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `url` text,
  `read` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `fresh_content` text NOT NULL,
  `keyword` text,
  `description` text,
  `link` varchar(200) DEFAULT NULL,
  `template` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `page_block_element`
--

CREATE TABLE `page_block_element` (
  `id` int UNSIGNED NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image_preview` varchar(200) NOT NULL,
  `block_name` varchar(200) NOT NULL,
  `content_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_sistem`
--

CREATE TABLE `pengaturan_sistem` (
  `is_system_on` tinyint UNSIGNED NOT NULL,
  `field_for_comparison` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `compare_by` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `global_integrasi_data` enum('active','passive','all') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'passive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pengaturan_sistem`
--

INSERT INTO `pengaturan_sistem` (`is_system_on`, `field_for_comparison`, `compare_by`, `global_integrasi_data`) VALUES
(1, '', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int UNSIGNED NOT NULL,
  `receipent_custom_query` text,
  `receipent_department` varchar(200) DEFAULT NULL,
  `primary_field` varchar(200) DEFAULT NULL,
  `table` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `message` text,
  `type` varchar(200) DEFAULT NULL,
  `data` text,
  `repeat_frequency` varchar(200) DEFAULT NULL,
  `receipent` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `reminder_condition`
--

CREATE TABLE `reminder_condition` (
  `id` int UNSIGNED NOT NULL,
  `cond_type` varchar(200) DEFAULT NULL,
  `cond_table` varchar(200) DEFAULT NULL,
  `cond_field` varchar(200) NOT NULL,
  `cond_operator` varchar(200) NOT NULL,
  `cond_value` varchar(255) DEFAULT NULL,
  `cond_logic` varchar(20) NOT NULL DEFAULT 'AND',
  `reminder_id` int NOT NULL,
  `group_id` int DEFAULT NULL,
  `sort_order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `reminder_cron`
--

CREATE TABLE `reminder_cron` (
  `id` int UNSIGNED NOT NULL,
  `reminder_id` int NOT NULL,
  `reff_id` int NOT NULL,
  `reff_table` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `sent_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `rest`
--

CREATE TABLE `rest` (
  `id` int UNSIGNED NOT NULL,
  `subject` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `primary_key` varchar(200) NOT NULL,
  `x_api_key` varchar(20) DEFAULT NULL,
  `x_token` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rest`
--

INSERT INTO `rest` (`id`, `subject`, `table_name`, `primary_key`, `x_api_key`, `x_token`) VALUES
(6, 'Api Location', 'tag_location', 'location_id', 'no', 'no'),
(10, 'API Reader', 'tag_reader', 'reader_id', 'no', 'yes'),
(12, 'API Room', 'tb_room_master', 'id_room', 'no', 'no'),
(13, 'API Asset Master', 'tb_asset_master', 'id', 'no', 'no'),
(14, 'API Temp Table', 'tag_temp_table', 'id_temp_table', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `rest_field`
--

CREATE TABLE `rest_field` (
  `id` int UNSIGNED NOT NULL,
  `rest_id` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rest_field`
--

INSERT INTO `rest_field` (`id`, `rest_id`, `field_name`, `field_label`, `input_type`, `show_column`, `show_add_api`, `show_update_api`, `show_detail_api`, `relation_table`, `relation_value`, `relation_label`) VALUES
(235, 6, 'location_id', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(236, 6, 'rfid_id', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(237, 6, 'librarian_id', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(238, 6, 'location_status', NULL, 'input', 'yes', 'yes', '', 'yes', '', '', ''),
(239, 6, 'location_aging', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(240, 6, 'location_created', NULL, 'timestamp', 'yes', 'yes', '', 'yes', '', '', ''),
(241, 6, 'location_updated', NULL, 'timestamp', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(362, 10, 'reader_id', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(363, 10, 'room_id', NULL, 'select', 'yes', 'yes', 'yes', 'yes', 'tb_room_master', 'id_room', 'name_room'),
(364, 10, 'reader_name', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(365, 10, 'setfor', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(366, 10, 'reader_serialnumber', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(367, 10, 'reader_type', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(368, 10, 'reader_ip', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(369, 10, 'reader_port', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(370, 10, 'reader_com', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(371, 10, 'reader_baudrate', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(372, 10, 'reader_power', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(373, 10, 'reader_interval', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(374, 10, 'reader_mode', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(375, 10, 'reader_updatedby', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(376, 10, 'reader_updated', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(377, 10, 'reader_createdby', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(378, 10, 'reader_created', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(379, 10, 'reader_family', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(380, 10, 'connecting', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(381, 10, 'reader_model', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(382, 10, 'reader_identity', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(383, 10, 'reader_antena', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(384, 10, 'reader_angle', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(385, 10, 'reader_gate', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(484, 13, 'id', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(485, 13, 'kode_brg', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(486, 13, 'nup', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(487, 13, 'tag_code', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(488, 13, 'nama_brg', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(489, 13, 'merk', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(490, 13, 'tipe', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(491, 13, 'kondisi', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(492, 13, 'nilai', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(493, 13, 'kelompok', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(494, 13, 'tgl_inventarisasi', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(495, 13, 'tglperolehan', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(496, 13, 'lokasi', NULL, 'input', '', 'yes', 'yes', 'yes', '', '', ''),
(497, 13, 'status_id', NULL, 'input', '', 'yes', 'yes', 'yes', '', '', ''),
(498, 13, 'keterangan', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(499, 13, 'pic_aset', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(500, 12, 'id_room', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(501, 12, 'gedung_id', NULL, 'input', '', 'yes', 'yes', '', '', '', ''),
(502, 12, 'kode_room', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(503, 12, 'name_room', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(504, 12, 'lat', NULL, 'input', '', 'yes', 'yes', '', '', '', ''),
(505, 12, 'long', NULL, 'input', '', 'yes', 'yes', '', '', '', ''),
(506, 12, 'pic', NULL, 'input', '', 'yes', 'yes', '', '', '', ''),
(521, 14, 'id_temp_table', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(522, 14, 'lokasi_terakhir_id', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(523, 14, 'nama_lokasi_terakhir', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(524, 14, 'room_id', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(525, 14, 'room_name', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(526, 14, 'reader_id', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(527, 14, 'reader_antena', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(528, 14, 'reader_angle', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(529, 14, 'reader_gate', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(530, 14, 'rfid_tag_number', NULL, 'input', 'yes', 'yes', 'yes', 'yes', '', '', ''),
(531, 14, 'waktu', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(532, 14, 'output', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(533, 14, 'kategori_pergerakan', NULL, 'input', 'yes', '', '', 'yes', '', '', ''),
(534, 14, 'keterangan_pergerakan', NULL, 'input', 'yes', '', '', 'yes', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rest_field_validation`
--

CREATE TABLE `rest_field_validation` (
  `id` int UNSIGNED NOT NULL,
  `rest_field_id` int NOT NULL,
  `rest_id` int NOT NULL,
  `validation_name` varchar(200) NOT NULL,
  `validation_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rest_field_validation`
--

INSERT INTO `rest_field_validation` (`id`, `rest_field_id`, `rest_id`, `validation_name`, `validation_value`) VALUES
(285, 236, 6, 'required', ''),
(286, 237, 6, 'required', ''),
(287, 238, 6, 'required', ''),
(288, 239, 6, 'required', ''),
(440, 363, 10, 'required', ''),
(441, 364, 10, 'required', ''),
(442, 364, 10, 'max_length', '50'),
(443, 365, 10, 'required', ''),
(444, 366, 10, 'required', ''),
(445, 366, 10, 'max_length', '10'),
(446, 367, 10, 'required', ''),
(447, 368, 10, 'required', ''),
(448, 368, 10, 'max_length', '45'),
(449, 369, 10, 'required', ''),
(450, 369, 10, 'max_length', '7'),
(451, 370, 10, 'required', ''),
(452, 371, 10, 'required', ''),
(453, 372, 10, 'required', ''),
(454, 373, 10, 'required', ''),
(455, 374, 10, 'required', ''),
(456, 375, 10, 'required', ''),
(457, 376, 10, 'required', ''),
(458, 377, 10, 'required', ''),
(459, 378, 10, 'required', ''),
(460, 379, 10, 'required', ''),
(461, 380, 10, 'required', ''),
(462, 381, 10, 'required', ''),
(463, 381, 10, 'max_length', '50'),
(464, 382, 10, 'required', ''),
(465, 382, 10, 'max_length', '50'),
(466, 383, 10, 'required', ''),
(467, 384, 10, 'required', ''),
(468, 385, 10, 'required', ''),
(469, 385, 10, 'max_length', '50'),
(598, 485, 13, 'required', ''),
(599, 485, 13, 'max_length', '15'),
(600, 486, 13, 'required', ''),
(601, 486, 13, 'max_length', '11'),
(602, 487, 13, 'required', ''),
(603, 487, 13, 'max_length', '96'),
(604, 488, 13, 'required', ''),
(605, 488, 13, 'max_length', '200'),
(606, 489, 13, 'required', ''),
(607, 489, 13, 'max_length', '50'),
(608, 490, 13, 'required', ''),
(609, 490, 13, 'max_length', '30'),
(610, 491, 13, 'required', ''),
(611, 492, 13, 'required', ''),
(612, 493, 13, 'required', ''),
(613, 494, 13, 'required', ''),
(614, 495, 13, 'required', ''),
(615, 496, 13, 'required', ''),
(616, 497, 13, 'required', ''),
(617, 498, 13, 'required', ''),
(618, 498, 13, 'max_length', '200'),
(619, 499, 13, 'required', ''),
(620, 501, 12, 'required', ''),
(621, 502, 12, 'required', ''),
(622, 502, 12, 'max_length', '30'),
(623, 503, 12, 'required', ''),
(624, 503, 12, 'max_length', '30'),
(625, 504, 12, 'required', ''),
(626, 505, 12, 'required', ''),
(627, 506, 12, 'required', ''),
(646, 522, 14, 'required', ''),
(647, 523, 14, 'required', ''),
(648, 523, 14, 'max_length', '50'),
(649, 524, 14, 'required', ''),
(650, 525, 14, 'required', ''),
(651, 525, 14, 'max_length', '50'),
(652, 526, 14, 'required', ''),
(653, 527, 14, 'required', ''),
(654, 528, 14, 'required', ''),
(655, 529, 14, 'required', ''),
(656, 529, 14, 'max_length', '50'),
(657, 530, 14, 'required', ''),
(658, 530, 14, 'max_length', '96'),
(659, 531, 14, 'required', ''),
(660, 532, 14, 'required', ''),
(661, 533, 14, 'required', ''),
(662, 534, 14, 'required', ''),
(663, 534, 14, 'max_length', '100');

-- --------------------------------------------------------

--
-- Table structure for table `rest_input_type`
--

CREATE TABLE `rest_input_type` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(200) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `validation_group` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
-- Table structure for table `tag_building`
--

CREATE TABLE `tag_building` (
  `building_id` int NOT NULL,
  `building_name` varchar(255) DEFAULT NULL,
  `kode_gedung` varchar(50) DEFAULT NULL,
  `building_created` datetime DEFAULT NULL,
  `building_createdby` int NOT NULL,
  `building_updated` datetime NOT NULL,
  `building_updatedby` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag_reader`
--

CREATE TABLE `tag_reader` (
  `reader_id` int NOT NULL,
  `room_id` int DEFAULT NULL,
  `reader_name` varchar(50) DEFAULT NULL,
  `setfor` int DEFAULT NULL,
  `reader_serialnumber` varchar(10) NOT NULL,
  `reader_type` enum('tcp','serial') NOT NULL DEFAULT 'tcp',
  `reader_ip` varchar(45) DEFAULT '192.168.1.0',
  `reader_port` varchar(7) NOT NULL DEFAULT '6000',
  `reader_com` enum('/dev/cu.usbserial-1410','/dev/cu.usbserial-1420','COM1','COM2','COM3','COM4','COM5','COM6','COM7','COM8','COM9','COM10') NOT NULL DEFAULT '/dev/cu.usbserial-1410',
  `reader_baudrate` enum('9600','19200','38400','57600','115200') NOT NULL DEFAULT '57600',
  `reader_power` int NOT NULL DEFAULT '25',
  `reader_interval` enum('10','100','1000','2000','5000','10000','15000') NOT NULL DEFAULT '1000',
  `reader_mode` enum('answer','active') NOT NULL DEFAULT 'answer',
  `reader_updatedby` int NOT NULL,
  `reader_updated` datetime NOT NULL,
  `reader_createdby` int NOT NULL,
  `reader_created` datetime NOT NULL,
  `reader_family` enum('hw','rc','prieds','other') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'other',
  `connecting` int NOT NULL,
  `reader_model` varchar(50) DEFAULT NULL,
  `reader_identity` varchar(50) DEFAULT NULL,
  `reader_antena` enum('single','double') DEFAULT NULL,
  `reader_angle` enum('in','out') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'in',
  `reader_gate` varchar(50) DEFAULT NULL,
  `alias_antenna` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_reader`
--

INSERT INTO `tag_reader` (`reader_id`, `room_id`, `reader_name`, `setfor`, `reader_serialnumber`, `reader_type`, `reader_ip`, `reader_port`, `reader_com`, `reader_baudrate`, `reader_power`, `reader_interval`, `reader_mode`, `reader_updatedby`, `reader_updated`, `reader_createdby`, `reader_created`, `reader_family`, `connecting`, `reader_model`, `reader_identity`, `reader_antena`, `reader_angle`, `reader_gate`, `alias_antenna`) VALUES
(1, 2, 'R. Konservasi In', 1, '34242422', 'tcp', '192.168.1.200', '2022', 'COM1', '38400', 25, '2000', 'answer', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'rc', 0, 'integrated', NULL, 'double', 'in', 'pintu depan', NULL),
(2, 2, 'R. Konservasi Out', 7, '23232342', 'tcp', '192.168.1.91', '6000', 'COM1', '19200', 25, '5000', 'answer', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'hw', 0, 'integrated', NULL, 'double', 'out', 'pintu depan', NULL),
(3, 3, 'R. Pers Out', 7, '23232342', 'tcp', '192.168.1.90', '6000', 'COM1', '19200', 25, '5000', 'answer', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'hw', 0, 'integrated', NULL, 'double', 'out', 'pintu depan', NULL),
(4, 3, 'R. Pers In', 1, '23232342', 'tcp', '192.168.1.92', '6000', 'COM1', '19200', 25, '5000', 'answer', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'hw', 0, 'integrated', NULL, 'double', 'in', 'pintu depan', NULL),
(5, 6, 'R. Kepresidenan In', 1, '23232342', 'tcp', '192.168.1.92', '6000', 'COM1', '19200', 25, '5000', 'answer', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'prieds', 0, 'integrated', NULL, 'double', 'in', 'Pintu Kaca', 'rkin'),
(6, 6, 'R. Kepresidenan Out', 7, '23232342', 'tcp', '192.168.1.92', '6000', 'COM1', '19200', 25, '5000', 'answer', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'prieds', 0, 'integrated', NULL, 'double', 'out', 'Pintu Kaca', 'rkout');

-- --------------------------------------------------------

--
-- Table structure for table `tag_temp_table`
--

CREATE TABLE `tag_temp_table` (
  `id_temp_table` int NOT NULL,
  `lokasi_terakhir_id` int DEFAULT NULL,
  `nama_lokasi_terakhir` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `room_id` int DEFAULT '0',
  `room_name` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `reader_id` int DEFAULT '0',
  `reader_antena` enum('single','double') CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `reader_angle` enum('in','out') CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `reader_gate` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `rfid_tag_number` varchar(96) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `output` tinyint DEFAULT '0',
  `kategori_pergerakan` enum('normal','anomali') CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL,
  `keterangan_pergerakan` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `tag_temp_table`
--

INSERT INTO `tag_temp_table` (`id_temp_table`, `lokasi_terakhir_id`, `nama_lokasi_terakhir`, `room_id`, `room_name`, `reader_id`, `reader_antena`, `reader_angle`, `reader_gate`, `rfid_tag_number`, `waktu`, `output`, `kategori_pergerakan`, `keterangan_pergerakan`) VALUES
(1, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E280117020001035C2030B49', '2024-11-19 10:39:15', 0, NULL, NULL),
(2, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E280117020001150C2020B49', '2024-11-19 10:39:15', 0, NULL, NULL),
(3, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E28011702000020AF3EB0B65', '2024-11-19 10:39:15', 0, NULL, NULL),
(4, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E2801170200005B2C2160B49', '2024-11-19 10:39:15', 0, NULL, NULL),
(5, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E2801170200003B0C1EE0B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(6, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E280117020001035C2030B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(7, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E280117020001147C21C0B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(8, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E280117020001150C2020B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(9, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E280117020000357C2060B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(10, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E28011702000020AF3EB0B65', '2024-11-19 10:39:16', 0, NULL, NULL),
(11, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E280117020001352C21F0B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(12, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E2801170200005B2C2160B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(13, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E2801170200003B0C1EE0B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(14, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E280117020001147C21C0B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(15, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 6, 'double', 'out', 'Pintu Kaca', 'E280117020000357C2060B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(16, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E280117020001352C21F0B49', '2024-11-19 10:39:16', 0, NULL, NULL),
(17, 6, 'Ruang Kepresidenan', 6, 'Ruang Kepresidenan', 5, 'double', 'in', 'Pintu Kaca', 'E280117020000357C2060B49', '2024-11-20 11:17:14', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_asset_moving`
--

CREATE TABLE `tb_asset_moving` (
  `id` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` datetime NOT NULL,
  `reader_id` int NOT NULL,
  `room_id` int DEFAULT NULL,
  `tag_code` varchar(96) NOT NULL,
  `status_moving` enum('In','Out') DEFAULT NULL,
  `lokasi_terakhir_id` int DEFAULT NULL,
  `lokasi_terakhir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_asset_moving`
--

INSERT INTO `tb_asset_moving` (`id`, `tanggal`, `waktu`, `reader_id`, `room_id`, `tag_code`, `status_moving`, `lokasi_terakhir_id`, `lokasi_terakhir`) VALUES
(895, '2024-11-10', '2024-11-10 18:18:28', 0, 2, '303030303130303000000000', 'In', NULL, NULL),
(896, '2024-11-10', '2024-11-10 18:23:22', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(897, '2024-11-10', '2024-11-10 20:09:59', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(898, '2024-11-10', '2024-11-10 20:10:03', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(899, '2024-11-10', '2024-11-10 20:10:06', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(900, '2024-11-10', '2024-11-10 20:10:11', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(901, '2024-11-10', '2024-11-10 20:12:04', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(902, '2024-11-10', '2024-11-10 20:12:08', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(903, '2024-11-10', '2024-11-10 20:12:12', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(904, '2024-11-10', '2024-11-10 20:18:33', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(905, '2024-11-10', '2024-11-10 20:18:37', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(906, '2024-11-10', '2024-11-10 20:18:42', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(907, '2024-11-10', '2024-11-10 20:23:16', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(908, '2024-11-10', '2024-11-10 20:23:20', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(909, '2024-11-10', '2024-11-10 20:27:32', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(910, '2024-11-10', '2024-11-10 20:27:36', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(911, '2024-11-10', '2024-11-10 20:27:40', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(912, '2024-11-10', '2024-11-10 21:21:20', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(913, '2024-11-10', '2024-11-10 21:21:26', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(914, '2024-11-10', '2024-11-10 21:30:14', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(915, '2024-11-10', '2024-11-10 21:30:19', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(916, '2024-11-10', '2024-11-10 21:30:23', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(917, '2024-11-10', '2024-11-10 21:31:17', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(918, '2024-11-10', '2024-11-10 21:31:22', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(919, '2024-11-10', '2024-11-10 21:31:26', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(920, '2024-11-10', '2024-11-10 21:31:31', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(921, '2024-11-10', '2024-11-10 21:32:23', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(922, '2024-11-10', '2024-11-10 21:32:27', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(923, '2024-11-10', '2024-11-10 21:32:31', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(924, '2024-11-10', '2024-11-10 21:32:36', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(925, '2024-11-10', '2024-11-10 21:33:07', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(926, '2024-11-10', '2024-11-10 21:33:11', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(927, '2024-11-10', '2024-11-10 21:33:16', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(928, '2024-11-10', '2024-11-10 21:33:23', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(929, '2024-11-10', '2024-11-10 21:33:28', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(930, '2024-11-10', '2024-11-10 21:41:47', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(931, '2024-11-10', '2024-11-10 21:41:53', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(932, '2024-11-10', '2024-11-10 21:41:58', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(933, '2024-11-10', '2024-11-10 21:42:55', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(934, '2024-11-10', '2024-11-10 21:43:02', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(935, '2024-11-10', '2024-11-10 21:45:11', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(936, '2024-11-10', '2024-11-10 21:45:14', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(937, '2024-11-10', '2024-11-10 21:45:19', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(938, '2024-11-10', '2024-11-10 21:46:47', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(939, '2024-11-10', '2024-11-10 21:46:53', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(940, '2024-11-10', '2024-11-10 21:46:57', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(941, '2024-11-10', '2024-11-10 21:47:04', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(942, '2024-11-10', '2024-11-10 21:48:40', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(943, '2024-11-10', '2024-11-10 21:48:44', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(944, '2024-11-10', '2024-11-10 21:48:48', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(945, '2024-11-10', '2024-11-10 21:52:09', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(946, '2024-11-10', '2024-11-10 21:52:14', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(947, '2024-11-10', '2024-11-10 21:52:18', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(948, '2024-11-10', '2024-11-10 21:52:23', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(949, '2024-11-10', '2024-11-10 21:53:31', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(950, '2024-11-10', '2024-11-10 21:53:36', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(951, '2024-11-10', '2024-11-10 21:53:40', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(952, '2024-11-10', '2024-11-10 21:53:45', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(953, '2024-11-10', '2024-11-10 22:08:40', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(954, '2024-11-10', '2024-11-10 22:08:44', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(955, '2024-11-10', '2024-11-10 22:08:46', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(956, '2024-11-10', '2024-11-10 22:09:29', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(957, '2024-11-10', '2024-11-10 22:09:31', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(958, '2024-11-10', '2024-11-10 22:09:35', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(959, '2024-11-10', '2024-11-10 22:09:35', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(960, '2024-11-10', '2024-11-10 22:09:37', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(961, '2024-11-10', '2024-11-10 22:09:49', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(962, '2024-11-10', '2024-11-10 22:09:49', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(963, '2024-11-10', '2024-11-10 22:09:57', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(964, '2024-11-10', '2024-11-10 22:33:57', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(965, '2024-11-10', '2024-11-10 22:54:53', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(966, '2024-11-10', '2024-11-10 22:54:55', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(967, '2024-11-10', '2024-11-10 22:55:11', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(968, '2024-11-10', '2024-11-10 22:55:21', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(969, '2024-11-10', '2024-11-10 22:55:26', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(970, '2024-11-10', '2024-11-10 22:55:27', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(971, '2024-11-10', '2024-11-10 22:55:27', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(972, '2024-11-10', '2024-11-10 22:55:29', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(973, '2024-11-10', '2024-11-10 23:04:42', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(974, '2024-11-10', '2024-11-10 23:04:47', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(975, '2024-11-10', '2024-11-10 23:04:48', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(976, '2024-11-10', '2024-11-10 23:05:53', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(977, '2024-11-10', '2024-11-10 23:14:31', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(978, '2024-11-10', '2024-11-10 23:14:31', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(979, '2024-11-10', '2024-11-10 23:14:33', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(980, '2024-11-10', '2024-11-10 23:14:35', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(981, '2024-11-10', '2024-11-10 23:16:18', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(982, '2024-11-10', '2024-11-10 23:17:24', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(983, '2024-11-10', '2024-11-10 23:52:23', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(984, '2024-11-10', '2024-11-10 23:52:26', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(985, '2024-11-10', '2024-11-10 23:53:59', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(986, '2024-11-10', '2024-11-10 23:54:28', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(987, '2024-11-10', '2024-11-10 23:54:53', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(988, '2024-11-11', '2024-11-11 00:02:08', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(989, '2024-11-11', '2024-11-11 00:02:14', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(990, '2024-11-11', '2024-11-11 00:08:41', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(991, '2024-11-11', '2024-11-11 00:08:42', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(992, '2024-11-11', '2024-11-11 00:09:42', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(993, '2024-11-11', '2024-11-11 00:09:47', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(994, '2024-11-11', '2024-11-11 02:55:08', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(995, '2024-11-11', '2024-11-11 02:55:13', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(996, '2024-11-11', '2024-11-11 02:57:11', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(997, '2024-11-11', '2024-11-11 02:57:16', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(998, '2024-11-11', '2024-11-11 02:57:20', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(999, '2024-11-11', '2024-11-11 03:48:46', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1000, '2024-11-11', '2024-11-11 03:48:51', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1001, '2024-11-11', '2024-11-11 03:48:55', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1002, '2024-11-11', '2024-11-11 03:52:21', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1003, '2024-11-11', '2024-11-11 03:52:27', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1004, '2024-11-11', '2024-11-11 03:53:07', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1005, '2024-11-11', '2024-11-11 03:53:17', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1006, '2024-11-11', '2024-11-11 03:55:24', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1007, '2024-11-11', '2024-11-11 03:55:29', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1008, '2024-11-11', '2024-11-11 03:55:33', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1009, '2024-11-11', '2024-11-11 03:55:38', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1010, '2024-11-11', '2024-11-11 03:55:42', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1011, '2024-11-11', '2024-11-11 03:55:47', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1012, '2024-11-11', '2024-11-11 03:55:51', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1013, '2024-11-11', '2024-11-11 03:56:41', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1014, '2024-11-11', '2024-11-11 03:56:43', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1015, '2024-11-11', '2024-11-11 03:56:48', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1016, '2024-11-11', '2024-11-11 04:01:14', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1017, '2024-11-11', '2024-11-11 04:01:47', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1018, '2024-11-11', '2024-11-11 04:07:45', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1019, '2024-11-11', '2024-11-11 04:07:51', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1020, '2024-11-11', '2024-11-11 04:09:04', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1021, '2024-11-11', '2024-11-11 04:09:10', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1022, '2024-11-11', '2024-11-11 04:09:36', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1023, '2024-11-11', '2024-11-11 04:09:43', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1024, '2024-11-11', '2024-11-11 11:23:01', 0, 2, '303030303030303700000000', 'In', NULL, NULL),
(1025, '2024-11-11', '2024-11-11 11:25:05', 0, 2, '303030303130303000000000', 'In', NULL, NULL),
(1026, '2024-11-11', '2024-11-11 11:28:20', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1027, '2024-11-11', '2024-11-11 11:28:20', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1028, '2024-11-11', '2024-11-11 11:28:21', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1029, '2024-11-11', '2024-11-11 11:28:41', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1030, '2024-11-11', '2024-11-11 11:28:50', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1031, '2024-11-11', '2024-11-11 11:28:51', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1032, '2024-11-11', '2024-11-11 11:30:33', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1033, '2024-11-11', '2024-11-11 11:30:34', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1034, '2024-11-11', '2024-11-11 11:30:49', 3, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1035, '2024-11-11', '2024-11-11 11:30:49', 3, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1036, '2024-11-11', '2024-11-11 11:30:54', 1, 2, '303030303030303700000000', 'In', NULL, NULL),
(1037, '2024-11-11', '2024-11-11 11:30:59', 2, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1038, '2024-11-11', '2024-11-11 11:31:19', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1039, '2024-11-11', '2024-11-11 11:31:34', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1040, '2024-11-11', '2024-11-11 11:32:11', 3, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1041, '2024-11-11', '2024-11-11 11:32:11', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1042, '2024-11-11', '2024-11-11 11:32:11', 4, 3, '303030303030303700000000', 'In', NULL, NULL),
(1043, '2024-11-11', '2024-11-11 11:33:45', 4, 3, '303030303030303700000000', 'In', NULL, NULL),
(1044, '2024-11-11', '2024-11-11 11:33:45', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1045, '2024-11-11', '2024-11-11 11:33:50', 3, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1046, '2024-11-11', '2024-11-11 11:33:50', 3, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1047, '2024-11-11', '2024-11-11 11:34:00', 1, 2, '303030303030303700000000', 'In', NULL, NULL),
(1048, '2024-11-11', '2024-11-11 11:34:00', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1049, '2024-11-11', '2024-11-11 11:34:05', 2, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1050, '2024-11-11', '2024-11-11 11:34:25', 2, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1051, '2024-11-11', '2024-11-11 11:34:40', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1052, '2024-11-11', '2024-11-11 11:34:40', 1, 2, '303030303030303700000000', 'In', NULL, NULL),
(1053, '2024-11-11', '2024-11-11 11:35:05', 2, 0, '303030303030303700000000', 'Out', NULL, NULL),
(1054, '2024-11-11', '2024-11-11 11:35:05', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1055, '2024-11-11', '2024-11-11 14:39:28', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1056, '2024-11-11', '2024-11-11 14:45:09', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1057, '2024-11-11', '2024-11-11 14:45:45', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1058, '2024-11-11', '2024-11-11 14:48:21', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1059, '2024-11-11', '2024-11-11 14:49:47', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1060, '2024-11-11', '2024-11-11 14:50:26', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1061, '2024-11-11', '2024-11-11 14:50:27', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1062, '2024-11-11', '2024-11-11 14:51:41', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1063, '2024-11-11', '2024-11-11 14:52:52', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1064, '2024-11-11', '2024-11-11 14:52:57', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1065, '2024-11-11', '2024-11-11 15:19:39', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1066, '2024-11-11', '2024-11-11 15:23:54', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1067, '2024-11-11', '2024-11-11 15:23:56', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1068, '2024-11-11', '2024-11-11 15:23:58', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1069, '2024-11-11', '2024-11-11 15:24:24', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1070, '2024-11-11', '2024-11-11 15:26:38', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1071, '2024-11-11', '2024-11-11 15:27:54', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1072, '2024-11-11', '2024-11-11 15:31:18', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1073, '2024-11-11', '2024-11-11 15:31:19', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1074, '2024-11-11', '2024-11-11 15:31:19', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1075, '2024-11-11', '2024-11-11 15:31:19', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1076, '2024-11-11', '2024-11-11 15:31:50', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1077, '2024-11-11', '2024-11-11 15:33:35', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1078, '2024-11-11', '2024-11-11 15:33:40', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1079, '2024-11-11', '2024-11-11 15:33:40', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1080, '2024-11-11', '2024-11-11 15:33:45', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1081, '2024-11-11', '2024-11-11 15:37:37', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1082, '2024-11-11', '2024-11-11 15:37:47', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1083, '2024-11-11', '2024-11-11 15:39:52', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1084, '2024-11-11', '2024-11-11 15:40:13', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1085, '2024-11-11', '2024-11-11 16:11:10', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1086, '2024-11-11', '2024-11-11 16:12:52', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1087, '2024-11-11', '2024-11-11 16:13:12', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1088, '2024-11-11', '2024-11-11 16:14:52', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1089, '2024-11-11', '2024-11-11 16:14:55', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1090, '2024-11-11', '2024-11-11 16:14:55', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1091, '2024-11-11', '2024-11-11 16:14:57', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1092, '2024-11-11', '2024-11-11 16:14:59', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1093, '2024-11-11', '2024-11-11 16:15:00', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1094, '2024-11-11', '2024-11-11 16:15:00', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1095, '2024-11-11', '2024-11-11 16:15:38', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1096, '2024-11-11', '2024-11-11 16:17:12', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1097, '2024-11-11', '2024-11-11 16:23:07', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1098, '2024-11-11', '2024-11-11 16:26:03', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1099, '2024-11-11', '2024-11-11 16:26:38', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1100, '2024-11-11', '2024-11-11 16:27:24', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1101, '2024-11-11', '2024-11-11 16:31:59', 2, 0, '303030303130303000000000', 'Out', NULL, NULL),
(1102, '2024-11-11', '2024-11-11 16:33:21', 4, 3, '303030303130303000000000', 'In', NULL, NULL),
(1103, '2024-11-11', '2024-11-11 16:34:02', 1, 2, '303030303130303000000000', 'In', NULL, NULL),
(1104, '2024-11-12', '2024-11-12 11:11:20', 2, 0, '303030303130303000000000', 'Out', 2, 'Ruang Konservasi'),
(1105, '2024-11-12', '2024-11-12 11:12:28', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1106, '2024-11-12', '2024-11-12 11:15:31', 2, 0, '303030303130303000000000', 'Out', 2, 'Ruang Konservasi'),
(1107, '2024-11-12', '2024-11-12 11:17:00', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1108, '2024-11-12', '2024-11-12 11:24:03', 2, 0, '303030303130303000000000', 'Out', 2, 'Ruang Konservasi'),
(1109, '2024-11-12', '2024-11-12 11:25:40', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1110, '2024-11-12', '2024-11-12 11:26:08', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1111, '2024-11-12', '2024-11-12 11:26:31', 2, 0, '303030303130303000000000', 'Out', 2, 'Ruang Konservasi'),
(1112, '2024-11-12', '2024-11-12 11:27:10', 3, 0, '303030303130303000000000', 'Out', 3, 'Ruang Pers Media'),
(1113, '2024-11-12', '2024-11-12 11:29:25', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1114, '2024-11-12', '2024-11-12 11:29:35', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1115, '2024-11-12', '2024-11-12 11:30:34', 3, 0, '303030303130303000000000', 'Out', 3, 'Ruang Pers Media'),
(1116, '2024-11-12', '2024-11-12 11:51:07', 4, 3, '303030303130303000000000', 'In', 3, 'Ruang Pers Media'),
(1117, '2024-11-12', '2024-11-12 11:51:14', 4, 3, '303030303130303000000000', 'In', 3, 'Ruang Pers Media'),
(1118, '2024-11-13', '2024-11-13 14:49:32', 3, 0, '303030303130303000000000', 'Out', 3, 'Ruang Pers Media'),
(1119, '2024-11-13', '2024-11-13 14:49:32', 3, 0, '303030303030303700000000', 'Out', 3, 'Ruang Pers Media'),
(1120, '2024-11-13', '2024-11-13 14:49:32', 3, 0, '303030303130303000000000', 'Out', 3, 'Ruang Pers Media'),
(1121, '2024-11-14', '2024-11-14 01:34:44', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1122, '2024-11-14', '2024-11-14 01:35:24', 2, 0, '303030303130303000000000', 'Out', 2, 'Ruang Konservasi'),
(1123, '2024-11-14', '2024-11-14 01:35:39', 4, 3, '303030303130303000000000', 'In', 3, 'Ruang Pers Media'),
(1124, '2024-11-14', '2024-11-14 01:37:04', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1125, '2024-11-14', '2024-11-14 01:37:48', 3, 0, '303030303130303000000000', 'Out', 3, 'Ruang Pers Media'),
(1126, '2024-11-14', '2024-11-14 09:03:38', 0, 3, '303030303130303000000000', 'In', NULL, NULL),
(1127, '2024-11-14', '2024-11-14 09:08:39', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1128, '2024-11-14', '2024-11-14 09:08:40', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1129, '2024-11-14', '2024-11-14 09:08:40', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1130, '2024-11-14', '2024-11-14 09:12:30', 0, 3, '303030303035323100000000', 'In', NULL, NULL),
(1131, '2024-11-14', '2024-11-14 09:13:40', 1, 2, '303030303035323100000000', 'In', 2, 'Ruang Konservasi'),
(1132, '2024-11-14', '2024-11-14 09:13:41', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1133, '2024-11-14', '2024-11-14 09:13:48', 0, 3, '303030303032323900000000', 'In', NULL, NULL),
(1134, '2024-11-14', '2024-11-14 09:14:55', 0, 3, '303030303039393600000000', 'In', NULL, NULL),
(1135, '2024-11-14', '2024-11-14 09:18:39', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1136, '2024-11-14', '2024-11-14 09:18:39', 3, 0, '303030303039393600000000', 'Out', 3, 'Ruang Pers Media'),
(1137, '2024-11-14', '2024-11-14 09:18:40', 1, 2, '303030303035323100000000', 'In', 2, 'Ruang Konservasi'),
(1138, '2024-11-14', '2024-11-14 09:18:40', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1139, '2024-11-14', '2024-11-14 09:18:40', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1140, '2024-11-14', '2024-11-14 09:18:41', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1141, '2024-11-14', '2024-11-14 09:18:41', 3, 0, '303030303039393600000000', 'Out', 3, 'Ruang Pers Media'),
(1142, '2024-11-14', '2024-11-14 09:18:42', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1143, '2024-11-14', '2024-11-14 09:18:42', 3, 0, '303030303039393600000000', 'Out', 3, 'Ruang Pers Media'),
(1144, '2024-11-14', '2024-11-14 09:18:42', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1145, '2024-11-14', '2024-11-14 09:18:43', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1146, '2024-11-14', '2024-11-14 09:18:43', 3, 0, '303030303032323900000000', 'Out', 3, 'Ruang Pers Media'),
(1147, '2024-11-14', '2024-11-14 09:18:43', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1148, '2024-11-14', '2024-11-14 09:18:43', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1149, '2024-11-14', '2024-11-14 09:18:44', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1150, '2024-11-14', '2024-11-14 09:18:44', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1151, '2024-11-14', '2024-11-14 09:18:44', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1152, '2024-11-14', '2024-11-14 09:18:45', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1153, '2024-11-14', '2024-11-14 09:18:45', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1154, '2024-11-14', '2024-11-14 09:18:45', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1155, '2024-11-14', '2024-11-14 09:18:46', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1156, '2024-11-14', '2024-11-14 09:18:47', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1157, '2024-11-14', '2024-11-14 09:18:47', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1158, '2024-11-14', '2024-11-14 09:18:47', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1159, '2024-11-14', '2024-11-14 09:18:48', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1160, '2024-11-14', '2024-11-14 09:18:48', 1, 2, '303030303032323900000000', 'In', 2, 'Ruang Konservasi'),
(1161, '2024-11-14', '2024-11-14 09:18:48', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1162, '2024-11-14', '2024-11-14 09:18:49', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1163, '2024-11-14', '2024-11-14 09:18:49', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1164, '2024-11-14', '2024-11-14 09:18:52', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1165, '2024-11-14', '2024-11-14 09:18:53', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1166, '2024-11-14', '2024-11-14 09:18:54', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1167, '2024-11-14', '2024-11-14 09:18:55', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1168, '2024-11-14', '2024-11-14 09:18:55', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1169, '2024-11-14', '2024-11-14 09:18:55', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1170, '2024-11-14', '2024-11-14 09:18:56', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1171, '2024-11-14', '2024-11-14 09:18:56', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1172, '2024-11-14', '2024-11-14 09:18:56', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1173, '2024-11-14', '2024-11-14 09:18:56', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1174, '2024-11-14', '2024-11-14 09:18:57', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1175, '2024-11-14', '2024-11-14 09:18:57', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1176, '2024-11-14', '2024-11-14 09:18:58', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1177, '2024-11-14', '2024-11-14 09:18:59', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1178, '2024-11-14', '2024-11-14 09:18:59', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1179, '2024-11-14', '2024-11-14 09:18:59', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1180, '2024-11-14', '2024-11-14 09:18:59', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1181, '2024-11-14', '2024-11-14 09:18:59', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1182, '2024-11-14', '2024-11-14 09:18:59', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1183, '2024-11-14', '2024-11-14 09:19:00', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1184, '2024-11-14', '2024-11-14 09:19:00', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1185, '2024-11-14', '2024-11-14 09:19:00', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1186, '2024-11-14', '2024-11-14 09:19:00', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1187, '2024-11-14', '2024-11-14 09:19:00', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1188, '2024-11-14', '2024-11-14 09:19:00', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1189, '2024-11-14', '2024-11-14 09:20:48', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1190, '2024-11-14', '2024-11-14 09:20:48', 3, 0, '303030303035323100000000', 'Out', 3, 'Ruang Pers Media'),
(1191, '2024-11-14', '2024-11-14 09:20:48', 4, 3, '303030303039393600000000', 'In', 3, 'Ruang Pers Media'),
(1192, '2024-11-14', '2024-11-14 09:21:11', 4, 3, '303030303035323100000000', 'In', 3, 'Ruang Pers Media'),
(1193, '2024-11-14', '2024-11-14 09:21:12', 4, 3, '303030303032323900000000', 'In', 3, 'Ruang Pers Media'),
(1194, '2024-11-14', '2024-11-14 09:21:12', 4, 3, '303030303039393600000000', 'In', 3, 'Ruang Pers Media'),
(1195, '2024-11-14', '2024-11-14 09:21:18', 3, 0, '303030303035323100000000', 'Out', 3, 'Ruang Pers Media'),
(1196, '2024-11-14', '2024-11-14 09:21:18', 3, 0, '303030303039393600000000', 'Out', 3, 'Ruang Pers Media'),
(1197, '2024-11-14', '2024-11-14 09:22:06', 4, 3, '303030303035323100000000', 'In', 3, 'Ruang Pers Media'),
(1198, '2024-11-14', '2024-11-14 09:22:06', 4, 3, '303030303032323900000000', 'In', 3, 'Ruang Pers Media'),
(1199, '2024-11-14', '2024-11-14 09:22:06', 4, 3, '303030303039393600000000', 'In', 3, 'Ruang Pers Media'),
(1200, '2024-11-14', '2024-11-14 09:22:47', 4, 3, '303030303039393600000000', 'In', 3, 'Ruang Pers Media'),
(1201, '2024-11-14', '2024-11-14 09:22:57', 2, 0, '303030303039393600000000', 'Out', 2, 'Ruang Konservasi'),
(1202, '2024-11-14', '2024-11-14 09:22:59', 1, 2, '303030303039393600000000', 'In', 2, 'Ruang Konservasi'),
(1203, '2024-11-14', '2024-11-14 09:23:27', 1, 2, '303030303130303000000000', 'In', 2, 'Ruang Konservasi'),
(1204, '2024-11-14', '2024-11-14 09:23:33', 2, 0, '303030303130303000000000', 'Out', 2, 'Ruang Konservasi'),
(1205, '2024-11-14', '2024-11-14 09:23:40', 4, 3, '303030303130303000000000', 'In', 3, 'Ruang Pers Media'),
(1206, '2024-11-14', '2024-11-14 09:23:46', 4, 3, '303030303130303000000000', 'In', 3, 'Ruang Pers Media'),
(1207, '2024-11-14', '2024-11-14 09:24:02', 4, 3, '303030303130303000000000', 'In', 3, 'Ruang Pers Media'),
(1208, '2024-11-14', '2024-11-14 09:24:35', 4, 3, '303030303032323900000000', 'In', 3, 'Ruang Pers Media'),
(1209, '2024-11-14', '2024-11-14 09:25:46', 4, 3, '303030303032323900000000', 'In', 3, 'Ruang Pers Media'),
(1210, '2024-11-14', '2024-11-14 09:26:36', 3, 0, '303030303032323900000000', 'Out', 3, 'Ruang Pers Media');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category_aset`
--

CREATE TABLE `tb_category_aset` (
  `id_kategori` int NOT NULL,
  `kode_kategori` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_category_aset`
--

INSERT INTO `tb_category_aset` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'S01', 'Seni'),
(2, 'E01', 'Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `kode_transaksi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kode_tid` int NOT NULL,
  `id_aset` int NOT NULL,
  `kode_aset` varchar(50) NOT NULL,
  `nup` varchar(50) NOT NULL,
  `nama_aset` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_area` int DEFAULT NULL,
  `id_gedung` int DEFAULT NULL,
  `id_ruangan` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `id_kondisi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id`, `id_transaksi`, `kode_transaksi`, `kode_tid`, `id_aset`, `kode_aset`, `nup`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `status`, `id_kondisi`) VALUES
(1, 1, '', 0, 2393, '6020202006', '69', 'Mangkok Bertutup', NULL, NULL, NULL, 1, 1),
(2, 1, '', 0, 2369, '6020202006', '45', 'Piring Hias Bermotif Cendrawasih dgn enamel polichrome', NULL, NULL, NULL, 1, 1),
(3, 1, '', 0, 2370, '6020202006', '46', 'Jambangan Bunga Celadon', NULL, NULL, NULL, 1, 1),
(4, 1, '', 0, 2371, '6020202006', '47', 'Jambangan Bunga Celadon', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_act`
--

CREATE TABLE `tb_log_act` (
  `id` int NOT NULL,
  `log_id` varchar(30) NOT NULL,
  `act_id` int NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_log_act`
--

INSERT INTO `tb_log_act` (`id`, `log_id`, `act_id`, `keterangan`, `user`, `date`, `time`) VALUES
(1, 'ACT0631am7846', 0, 'Login', '1', '2024-11-29', '10:06:31'),
(2, 'ACT1406am4587', 0, 'Logout', '1', '2024-11-29', '10:14:06'),
(3, 'ACT2758am6014', 0, 'Login', '1', '2024-11-29', '10:27:58'),
(4, 'ACT5524am6540', 0, 'Logout', '1', '2024-11-29', '10:55:24'),
(5, 'ACT5935am9818', 0, 'Login', '1', '2024-11-29', '10:59:35'),
(6, 'ACT3727am1343', 0, 'Logout', '1', '2024-11-29', '11:37:27'),
(7, 'ACT3744am5324', 0, 'Login', '1', '2024-11-29', '11:37:44'),
(8, 'ACT3048pm2211', 0, 'Login', '1', '2024-12-02', '04:30:48'),
(9, 'ACT0623am2707', 0, 'Logout', '1', '2024-12-03', '09:06:23'),
(10, 'ACT1102am2611', 0, 'Login', '1', '2024-12-03', '09:11:02'),
(11, 'ACT3951am6872', 0, 'Logout', '1', '2024-12-03', '11:39:51'),
(12, 'ACT4010am9252', 0, 'Login', '1', '2024-12-03', '11:40:10'),
(13, 'ACT4056am2978', 0, 'Login', '1', '2024-12-03', '11:40:56'),
(14, 'ACT4016pm8223', 0, 'Logout', '1', '2024-12-03', '02:40:16'),
(15, 'ACT4147pm7805', 0, 'Login', '1', '2024-12-03', '02:41:47'),
(16, 'ACT3424pm1039', 0, 'Login', '1', '2024-12-03', '05:34:24'),
(17, 'ACT4114am4397', 0, 'Login', '2', '2024-12-04', '09:41:14'),
(18, 'ACT4237am9009', 0, 'Logout', '1', '2024-12-04', '09:42:37'),
(19, 'ACT4246am1227', 0, 'Login', '2', '2024-12-04', '09:42:46'),
(20, 'ACT4553am1686', 0, 'Logout', '1', '2024-12-04', '09:45:53'),
(21, 'ACT4635am6206', 0, 'Login', '1', '2024-12-04', '09:46:35'),
(22, 'ACT4900am9677', 0, 'Login', '3', '2024-12-04', '09:49:00'),
(23, 'ACT5335am3399', 0, 'Logout', '1', '2024-12-04', '09:53:35'),
(24, 'ACT5356am8056', 0, 'Login', '3', '2024-12-04', '09:53:56'),
(25, 'ACT5646am3118', 0, 'Logout', '1', '2024-12-04', '09:56:46'),
(26, 'ACT5720am4060', 0, 'Login', '1', '2024-12-04', '09:57:20'),
(27, 'ACT5732am1895', 0, 'Login', '1', '2024-12-04', '09:57:32'),
(28, 'ACT0057am3087', 0, 'Login', '3', '2024-12-04', '10:00:57'),
(29, 'ACT0353am9191', 0, 'Logout', '1', '2024-12-04', '10:03:53'),
(30, 'ACT0359am7881', 0, 'Logout', '1', '2024-12-04', '10:03:59'),
(31, 'ACT0534am3128', 0, 'Login', '1', '2024-12-04', '10:05:34'),
(32, 'ACT2250am6001', 0, 'Login', '3', '2024-12-04', '11:22:50'),
(33, 'ACT2308am4052', 0, 'Logout', '1', '2024-12-04', '11:23:08'),
(34, 'ACT4316am2679', 0, 'Login', '1', '2024-12-05', '11:43:16'),
(35, 'ACT4500pm9927', 0, 'Logout', '1', '2024-12-05', '01:45:00'),
(36, 'ACT4510pm5175', 0, 'Login', '1', '2024-12-05', '01:45:10'),
(37, 'ACT4757pm4237', 0, 'Login', '1', '2024-12-05', '01:47:57'),
(38, 'ACT1020pm6717', 0, 'Login', '1', '2024-12-05', '02:10:20'),
(39, 'ACT1259pm8371', 0, 'Login', '1', '2024-12-05', '02:12:59'),
(40, 'ACT4049pm7280', 0, 'Logout', '1', '2024-12-05', '04:40:49'),
(41, 'ACT4114pm6803', 0, 'Login', '3', '2024-12-05', '04:41:14'),
(42, 'ACT4152pm3504', 0, 'Logout', '1', '2024-12-05', '04:41:52'),
(43, 'ACT4201pm8372', 0, 'Login', '1', '2024-12-05', '04:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_area`
--

CREATE TABLE `tb_master_area` (
  `id` int NOT NULL,
  `area` varchar(100) NOT NULL,
  `ket_area` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_area`
--

INSERT INTO `tb_master_area` (`id`, `area`, `ket_area`) VALUES
(1, 'Istana Jakarta', 'Istana Merdeka Jakara'),
(2, 'Istana Bogor', 'Istana Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_aset`
--

CREATE TABLE `tb_master_aset` (
  `id` int NOT NULL,
  `kode_tid` int NOT NULL,
  `kode_aset` varchar(50) NOT NULL,
  `nup` varchar(50) NOT NULL,
  `kategori` int NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `id_kondisi` int NOT NULL COMMENT '1 = Baik, 2 = Rusak Ringan, 3 = Rusak Berat',
  `status` int NOT NULL COMMENT '1 = Tersedia, 2 = Peminjaman, 3 = Perbaikan, 4 = Moving',
  `tipe_moving` int NOT NULL COMMENT '0 = Ilegal, 1 = Legal',
  `nama_aset` varchar(100) NOT NULL,
  `id_area` int NOT NULL,
  `id_gedung` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `tgl_perolehan` datetime NOT NULL,
  `tgl_inventarisasi` datetime NOT NULL,
  `flag_inventarisasi` int NOT NULL,
  `tgl_peminjaman` datetime NOT NULL,
  `tgl_pengembalian` datetime NOT NULL,
  `tgl_mutasi` datetime NOT NULL,
  `id_lokasi_moving` int NOT NULL COMMENT 'Perubahan Lokasi Moving',
  `id_pegawai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_aset`
--

INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(1, 0, '3050206020', '1', 0, '', '', 1, 0, 0, 'GoPro Vusion, Video Spherical 5.2K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 0, '3060102128', '22', 0, '', '', 1, 0, 0, 'Nikon D5 + Nikon AF-S 24-120 + Speedlight Nikon SB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 0, '3050206020', '3', 0, '', '', 2, 0, 0, 'Gopro HERO 5-Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 0, '3050206020', '4', 0, '', '', 2, 0, 0, 'Sony Camcorder NXCAM HXR-NX100 FULL HD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 0, '3060102061', '36', 0, '', '', 3, 0, 0, 'Nikon Mirrorless Nikkor Z 70-200mm F/2.8 VR S Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(6, 0, '3060102003', '32', 0, '', '', 3, 0, 0, 'Nikon Z7 Body Only SN=7202273', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(7, 0, '3050206020', '19', 0, '', '', 3, 0, 0, 'Sony PXW X-200 XDCAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 0, '3060102061', '42', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 70-200mm f2.8 VR S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(9, 0, '3060102061', '43', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 70-200mm f2.8 VR S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(10, 0, '3050206020', '22', 0, '', '', 0, 0, 0, 'Gopro Hero 10 Black 2021 Action 23MP 5K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(11, 0, '3050206020', '23', 0, '', '', 0, 0, 0, 'Gopro Hero 10 Black 2021 Action 23MP 5K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(12, 0, '3060102061', '44', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 24-120mm f/4 S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(13, 0, '3060102061', '45', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 24-120mm f/4 S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(14, 0, '3050206020', '26', 0, '', '', 0, 0, 0, 'Sony PXW FX6 Full Frame + SmallRig + Strap', 0, 0, 0, '0000-00-00 00:00:00', '2023-12-08 16:43:20', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(15, 0, '3050206020', '27', 0, '', '', 0, 0, 0, 'Sony FX3+ Battery+Microphone+Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(16, 0, '3050206020', '28', 0, '', '', 0, 0, 0, 'Sony FX3+ Battery+Microphone+Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(17, 0, '3060101036', '24', 0, '', '', 0, 0, 0, 'Audio Technica System 10 Pro', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(18, 0, '3060101036', '25', 0, '', '', 0, 0, 0, 'Audio Technica System 10 Pro', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(19, 0, '3060101036', '26', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(20, 0, '3060102061', '24', 0, '', '', 0, 0, 0, 'Nikon AF-S 24-120mm F/4G  VR ED N', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(21, 0, '3060101036', '28', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(22, 0, '3060101036', '29', 0, '', '', 0, 0, 0, 'Handled ULXP24 Frekuensi 748 - 784 MHz Q2', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(23, 0, '3050206020', '2', 0, '', '', 0, 0, 0, 'Sony PXW-Z280, 45121516-PKM-000593807', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(24, 0, '3050206020', '5', 0, '', '', 0, 0, 0, 'Sony Camcorder PXW-Z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(25, 0, '3050206020', '6', 0, '', '', 0, 0, 0, 'Sony Camcorder PXW-Z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(26, 0, '3050206020', '20', 0, '', '', 0, 0, 0, 'Sony Profesional; PXW-X180 HD XD CAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(27, 0, '3050206020', '21', 0, '', '', 0, 0, 0, 'Sony Profesional; PXW-X180 HD XD CAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(28, 0, '3050206020', '24', 0, '', '', 0, 0, 0, 'Sony  PXW-z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(29, 0, '3060101036', '27', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(30, 0, '3060101036', '39', 0, '', '', 0, 0, 0, 'clipon shure + Condesor WL93', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(31, 0, '3060101036', '40', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(32, 0, '3060101036', '41', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(33, 0, '3060101036', '42', 0, '', '', 0, 0, 0, 'Shure SVX14/CVL', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(34, 0, '3060101036', '43', 0, '', '', 0, 0, 0, 'Clip on shure + Condesor WL 93', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(35, 0, '3060101036', '44', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(36, 0, '3060101036', '45', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(37, 0, '3060101036', '46', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(38, 0, '3060101036', '47', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(39, 0, '3060101036', '48', 0, '', '', 0, 0, 0, 'Sennheiser EW 135-P G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(40, 0, '3060101036', '49', 0, '', '', 0, 0, 0, 'Sennheiser EW 135-P G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(41, 0, '3060101036', '50', 0, '', '', 0, 0, 0, 'Televic Microphone 40cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(42, 0, '3060101036', '30', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(43, 0, '3060101036', '31', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(44, 0, '3060101036', '53', 0, '', '', 0, 0, 0, 'Televic Microphone Uk. 40cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(45, 0, '3050206020', '1', 0, '', '', 0, 0, 0, 'GoPro Vusion, Video Spherical 5.2K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(46, 0, '3060102128', '22', 0, '', '', 0, 0, 0, 'Nikon D5 + Nikon AF-S 24-120 + Speedlight Nikon SB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(47, 0, '3050206020', '3', 0, '', '', 0, 0, 0, 'Gopro HERO 5-Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(48, 0, '3050206020', '4', 0, '', '', 0, 0, 0, 'Sony Camcorder NXCAM HXR-NX100 FULL HD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(49, 0, '3060102061', '36', 0, '', '', 0, 0, 0, 'Nikon Mirrorless Nikkor Z 70-200mm F/2.8 VR S Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(50, 0, '3060102003', '32', 0, '', '', 0, 0, 0, 'Nikon Z7 Body Only SN=7202273', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(51, 0, '3050206020', '7', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(52, 0, '3050206020', '8', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(53, 0, '3050206020', '9', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(54, 0, '3050206020', '10', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(55, 0, '3050206020', '19', 0, '', '', 0, 0, 0, 'Sony PXW X-200 XDCAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(56, 0, '3060102061', '42', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 70-200mm f2.8 VR S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(57, 0, '3060102061', '43', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 70-200mm f2.8 VR S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(58, 0, '3050206020', '22', 0, '', '', 0, 0, 0, 'Gopro Hero 10 Black 2021 Action 23MP 5K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(59, 0, '3050206020', '23', 0, '', '', 0, 0, 0, 'Gopro Hero 10 Black 2021 Action 23MP 5K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(60, 0, '3060102061', '44', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 24-120mm f/4 S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(61, 0, '3060102061', '45', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 24-120mm f/4 S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(62, 0, '3050206020', '26', 0, '', '', 0, 0, 0, 'Sony PXW FX6 Full Frame + SmallRig + Strap', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(63, 0, '3050206020', '27', 0, '', '', 0, 0, 0, 'Sony FX3+ Battery+Microphone+Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(64, 0, '3050206020', '28', 0, '', '', 0, 0, 0, 'Sony FX3+ Battery+Microphone+Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(65, 0, '3060101036', '1', 0, '', '', 0, 0, 0, 'Shure ULXD 24/Beta 87A (Microphone Wireless ) + kelengkapannya', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(66, 0, '3060101036', '24', 0, '', '', 0, 0, 0, 'Audio Technica System 10 Pro', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(67, 0, '3060101036', '25', 0, '', '', 0, 0, 0, 'Audio Technica System 10 Pro', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(68, 0, '3060101036', '26', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(69, 0, '3060102061', '24', 0, '', '', 0, 0, 0, 'Nikon AF-S 24-120mm F/4G  VR ED N', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(70, 0, '3060101036', '28', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(71, 0, '3060101036', '29', 0, '', '', 0, 0, 0, 'Handled ULXP24 Frekuensi 748 - 784 MHz Q2', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(72, 0, '3090402031', '1', 0, '', '', 0, 0, 0, '1 Set Kamera Digital Nikon Z7 + Lensa Sony 70-200 mm f', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(73, 0, '3050206020', '2', 0, '', '', 0, 0, 0, 'Sony PXW-Z280, 45121516-PKM-000593807', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(74, 0, '3050206020', '5', 0, '', '', 0, 0, 0, 'Sony Camcorder PXW-Z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(75, 0, '3050206020', '6', 0, '', '', 0, 0, 0, 'Sony Camcorder PXW-Z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(76, 0, '3050206020', '20', 0, '', '', 0, 0, 0, 'Sony Profesional; PXW-X180 HD XD CAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(77, 0, '3050206020', '21', 0, '', '', 0, 0, 0, 'Sony Profesional; PXW-X180 HD XD CAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(78, 0, '3050206020', '24', 0, '', '', 0, 0, 0, 'Sony  PXW-z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(79, 0, '3050206020', '25', 0, '', '', 0, 0, 0, 'Sony FX6 Full Frame Cinema (Body Only) + Lensa + Sony 128 GB  + Memory Card', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(80, 0, '3060101036', '27', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(81, 0, '3060101036', '39', 0, '', '', 0, 0, 0, 'clipon shure + Condesor WL93', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(82, 0, '3060101036', '40', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(83, 0, '3060101036', '41', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(84, 0, '3060101036', '42', 0, '', '', 0, 0, 0, 'Shure SVX14/CVL', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(85, 0, '3060101036', '43', 0, '', '', 0, 0, 0, 'Clip on shure + Condesor WL 93', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(86, 0, '3060101036', '44', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(87, 0, '3060101036', '45', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(88, 0, '3060101036', '46', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(89, 0, '3060101036', '47', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(90, 0, '3060101036', '48', 0, '', '', 0, 0, 0, 'Sennheiser EW 135-P G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(91, 0, '3060101036', '49', 0, '', '', 0, 0, 0, 'Sennheiser EW 135-P G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(92, 0, '3060101036', '50', 0, '', '', 0, 0, 0, 'Televic Microphone 40cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(93, 0, '3060101036', '30', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(94, 0, '3060101036', '31', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(95, 0, '3060101036', '53', 0, '', '', 0, 0, 0, 'Televic Microphone Uk. 40cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(96, 0, '3060101036', '54', 0, '', '', 0, 0, 0, 'Televic Microphone Uk. 40CM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(97, 0, '3060101036', '55', 0, '', '', 0, 0, 0, 'Televic Microphone Uk. 40 Cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(98, 0, '3060101036', '56', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(99, 0, '3060101036', '57', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(100, 0, '3060101036', '58', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(101, 0, '3060101036', '59', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(102, 0, '3060101036', '60', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(103, 0, '3060101036', '67', 0, '', '', 0, 0, 0, 'Rode RODELink Newsshooter Kit', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(104, 0, '3060101036', '68', 0, '', '', 0, 0, 0, 'Rode RODELink Newsshooter Kit', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(105, 0, '3060101036', '32', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(106, 0, '3060101036', '33', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(107, 0, '3060101036', '71', 0, '', '', 0, 0, 0, 'Shure ULXD 24/Beta 87A + kelengkapannya', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(108, 0, '3060101036', '72', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(109, 0, '3060101036', '34', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(110, 0, '3060101036', '74', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(111, 0, '3060101036', '75', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(112, 0, '3060101036', '76', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(113, 0, '3060101036', '77', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(114, 0, '3060101036', '78', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(115, 0, '3060101036', '79', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(116, 0, '3060101036', '80', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(117, 0, '3060101036', '81', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(118, 0, '3060101036', '82', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(119, 0, '3060101036', '83', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(120, 0, '3060101036', '84', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(121, 0, '3060101036', '85', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(122, 0, '3060101036', '86', 0, '', '', 0, 0, 0, 'Mic Sony CM-W2BT', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(123, 0, '3060101036', '35', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(124, 0, '3060101036', '36', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(125, 0, '3060101036', '37', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(126, 0, '3060101036', '38', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(127, 0, '3060101036', '51', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-ENG G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(128, 0, '3060101037', '1', 0, '', '', 0, 0, 0, 'Hercules BS408B Orkestra', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(129, 0, '3060101037', '3', 0, '', '', 0, 0, 0, 'Hercules BS408B Orkestra', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(130, 0, '3060101037', '4', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(131, 0, '3060101037', '5', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(132, 0, '3060101037', '6', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(133, 0, '3060101037', '7', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(134, 0, '3060101037', '8', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(135, 0, '3060101037', '9', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(136, 0, '3060101037', '10', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(137, 0, '3060101037', '11', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(138, 0, '3060101037', '12', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(139, 0, '3060101037', '13', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(140, 0, '3060101037', '14', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(141, 0, '3060101037', '15', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(142, 0, '3060101037', '16', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(143, 0, '3060101037', '17', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom)  P.12cm, D.1,5cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(144, 0, '3060101037', '18', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(145, 0, '3060101037', '19', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(146, 0, '3060101037', '22', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(147, 0, '3060101037', '23', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(148, 0, '3060101037', '25', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(149, 0, '3060101037', '26', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(150, 0, '3060101037', '27', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(151, 0, '3060101037', '28', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(152, 0, '3060101088', '12', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(153, 0, '3060101088', '13', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(154, 0, '3060101088', '14', 0, '', '', 0, 0, 0, 'Sony Voice Recorder (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(155, 0, '3060101088', '15', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(156, 0, '3060101088', '16', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(157, 0, '3060101088', '17', 0, '', '', 0, 0, 0, 'Sony Voice Recorder (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(158, 0, '3060101088', '18', 0, '', '', 0, 0, 0, 'Sony ICD-UX543F 4GB UX', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(159, 0, '3060101088', '19', 0, '', '', 0, 0, 0, 'Sony ICD-UX543F 4GB UX', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(160, 0, '3060101088', '20', 0, '', '', 0, 0, 0, 'Sony [CD-UX560F] - Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(161, 0, '3060101088', '21', 0, '', '', 0, 0, 0, 'Sony Digital (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(162, 0, '3060101088', '22', 0, '', '', 0, 0, 0, 'Sony Digital (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(163, 0, '3060101088', '23', 0, '', '', 0, 0, 0, 'Sony Digital (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(164, 0, '3060101036', '52', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-ENG G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(165, 0, '3060101088', '28', 0, '', '', 0, 0, 0, 'SONY Voice Recorder ICDUX560F- Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(166, 0, '3060101088', '29', 0, '', '', 0, 0, 0, 'Shure Adapter USB X2U Limited (Perekam Digital)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(167, 0, '3060101088', '30', 0, '', '', 0, 0, 0, 'Shure Adapter USB X2U Limited (Perekam Digital)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(168, 0, '3060101036', '69', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-Eng G4 (ME Clip-on Microphone)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(169, 0, '3060101088', '32', 0, '', '', 0, 0, 0, 'Voice Recorder Sony ICD-TX660', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(170, 0, '3060101088', '33', 0, '', '', 0, 0, 0, 'Voice Recorder Tascam Portacapture X8', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(171, 0, '3060102003', '19', 0, '', '', 0, 0, 0, 'Canon EOS 70D Kit EF-S18-55 IS STM BUILT-IN WIFI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(172, 0, '3060102003', '20', 0, '', '', 0, 0, 0, 'Canon EOS 70D Kit EF-S18-55 IS STM BUILT-IN WIFI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(173, 0, '3060102003', '21', 0, '', '', 0, 0, 0, 'DJI osmo Pocket', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(174, 0, '3060102003', '22', 0, '', '', 0, 0, 0, 'DJI osmo Pocket', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(175, 0, '3060101036', '70', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-Eng G4 (ME Clip-on Microphone)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(176, 0, '3060102003', '30', 0, '', '', 0, 0, 0, 'Nikon 27 II body + Kelengkapan Kamera  + Lowepro sling bag', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(177, 0, '3060102003', '31', 0, '', '', 0, 0, 0, 'Canon EOS R10  Mirroles Camera 18-45', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(178, 0, '3060101036', '73', 0, '', '', 0, 0, 0, 'Sennheiser EW 112P G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(179, 0, '3060102003', '33', 0, '', '', 0, 0, 0, 'Camera Sony A7S Mark III - Body Only - BPMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(180, 0, '3060102003', '34', 0, '', '', 0, 0, 0, 'Camera Sony A7S Mark III - Body Only - BPMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(181, 0, '3060101036', '87', 0, '', '', 0, 0, 0, 'Microphone Wirelles Sennheiser EW 112 PG4 MIC ES 112', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(182, 0, '3060101036', '88', 0, '', '', 0, 0, 0, 'Bodypack Wireless Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(183, 0, '3060102039', '5', 0, '', '', 0, 0, 0, 'sony', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(184, 0, '3060102039', '6', 0, '', '', 0, 0, 0, 'sony', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(185, 0, '3060102039', '8', 0, '', '', 0, 0, 0, 'Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(186, 0, '3060101036', '89', 0, '', '', 0, 0, 0, 'Sennheiser EW 500 BOOM G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(187, 0, '3060101036', '90', 0, '', '', 0, 0, 0, 'Sennheiser EW 500 BOOM G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(188, 0, '3060101036', '91', 0, '', '', 0, 0, 0, 'Sennheiser EW 500 BOOM G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(189, 0, '3060101088', '24', 0, '', '', 0, 0, 0, 'Zoom H6 Handy Recorder', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(190, 0, '3060102045', '11', 0, '', '', 0, 0, 0, 'HD4000 Stabilizer Syistem', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(191, 0, '3060102045', '12', 0, '', '', 0, 0, 0, 'Manfrotto MK Compact ADV-BK Compact Advance', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(192, 0, '3060102045', '13', 0, '', '', 0, 0, 0, 'Zhiyun Crane 3 Lab Handheld Stabilizer', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(193, 0, '3060102045', '14', 0, '', '', 0, 0, 0, 'MANFROTTO MK190XPRO 4-3W 190 Kit - alu 4-section h', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(194, 0, '3060102045', '15', 0, '', '', 0, 0, 0, 'MANFROTTO MK190XPRO 4-3W 190 Kit - alu 4-section h', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(195, 0, '3060102045', '16', 0, '', '', 0, 0, 0, 'DJI RS2 Pro Combo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(196, 0, '3060102045', '17', 0, '', '', 0, 0, 0, 'Manfrotto 504X with 2 Stage Carbon Fiber Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(197, 0, '3060102045', '18', 0, '', '', 0, 0, 0, 'Manfrotto 504X with 2 Stage Carbon Fiber Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(198, 0, '3060101088', '31', 0, '', '', 0, 0, 0, 'Zoom H6 Black handy Recoder', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(199, 0, '3060102003', '29', 0, '', '', 0, 0, 0, 'Sony Alpha A7S III + Charger Sony BC-QZ1', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(200, 0, '3060102045', '21', 0, '', '', 0, 0, 0, 'DJJ Ronin RS 3 Pro Combo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(201, 0, '3060102003', '35', 0, '', '', 0, 0, 0, 'Nikon Z9 Mirrorless Body Only + Battery + Speedlight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(202, 0, '3060102045', '23', 0, '', '', 0, 0, 0, 'Ifootage Cobra 3 CB A180T Monopod & Komodo K5', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(203, 0, '3060102003', '36', 0, '', '', 0, 0, 0, 'Nikon Z9 Mirrorless Body Only + Battery + Speedlight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(204, 0, '3060102039', '9', 0, '', '', 0, 0, 0, 'Blackmagic Design Intensity Shuttle USB 3.0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(205, 0, '3080111137', '1', 0, '', '', 0, 0, 0, 'Manfrotto MT055XPRO3 056 3-Section Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(206, 0, '3080111137', '2', 0, '', '', 0, 0, 0, 'Manfrotto MT055XPRO3 056 3-Section Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(207, 0, '3080111137', '5', 0, '', '', 0, 0, 0, 'Datvideo TP-500 B DSLR Prompter For Ipad', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(208, 0, '3060102045', '8', 0, '', '', 0, 0, 0, 'Sachtler ACE L MS Carbon-Fiber', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(209, 0, '3060102061', '20', 0, '', '', 0, 0, 0, 'Nikon AF 16 MM F/ 28D Fisheye', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(210, 0, '3060102061', '21', 0, '', '', 0, 0, 0, 'Nikon AFS 2470 MM F/2.8 G ED N', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(211, 0, '3060102061', '22', 0, '', '', 0, 0, 0, 'Sony 24-240mm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(212, 0, '3060102061', '23', 0, '', '', 0, 0, 0, 'Sony FE 85mm f/1.4 GM Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(213, 0, '3060102045', '9', 0, '', '', 0, 0, 0, 'Sachler Ace M MS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(214, 0, '3060102045', '10', 0, '', '', 0, 0, 0, 'Sachtler Ace L MS CF', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(215, 0, '3060102045', '19', 0, '', '', 0, 0, 0, 'Secced Tripot Reach Plus 4 Kit 32kg Bowl 100mm 2 Stage Carbon Leg Bag', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(216, 0, '3060102061', '27', 0, '', '', 0, 0, 0, 'Sony FE 16-35 f2.8 GM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(217, 0, '3060102045', '20', 0, '', '', 0, 0, 0, 'Secced Tripot Reach Plus 4 Kit 32kg Bowl 100mm 2 Stage Carbon Leg Bag', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(218, 0, '3060102061', '29', 0, '', '', 0, 0, 0, 'Lensa Kamera ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(219, 0, '3060102061', '30', 0, '', '', 0, 0, 0, 'Lensa Kamera', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(220, 0, '3060102061', '34', 0, '', '', 0, 0, 0, 'Lensa Sony SEL 1018 E 10-18 mm f/4 OSS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(221, 0, '3060102061', '35', 0, '', '', 0, 0, 0, 'Nikon Mirrorless Nikkor Z 24-70mm F/2.8 S Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(222, 0, '3060102045', '22', 0, '', '', 0, 0, 0, 'DJI RS 4 Pro Combo - BPMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(223, 0, '3060102061', '37', 0, '', '', 0, 0, 0, 'Nikkor Z 50 mm F/1.85', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(224, 0, '3060102045', '24', 0, '', '', 0, 0, 0, 'DJI RS 4 Pro Gimbal Stabiliser', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(225, 0, '3080111137', '3', 0, '', '', 0, 0, 0, 'Tripod Libec TH-X 30-62\"\" Height Range', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(226, 0, '3060102055', '3', 0, '', '', 0, 0, 0, 'Litepanels Astra 6X Traeler Bi-Color Trio 3_Light Kit with V Mount Battery', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(227, 0, '3060102130', '8', 0, '', '', 0, 0, 0, 'Speedlight Camera Nikon S8910', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(228, 0, '3060102061', '26', 0, '', '', 0, 0, 0, 'Nikon AF-S 70-200mm F/2,8G IF ED VR II', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(229, 0, '3050206020', '1', 0, '', '', 0, 0, 0, 'GoPro Vusion, Video Spherical 5.2K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(230, 0, '3060102128', '22', 0, '', '', 0, 0, 0, 'Nikon D5 + Nikon AF-S 24-120 + Speedlight Nikon SB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(231, 0, '3050206020', '3', 0, '', '', 0, 0, 0, 'Gopro HERO 5-Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(232, 0, '3050206020', '4', 0, '', '', 0, 0, 0, 'Sony Camcorder NXCAM HXR-NX100 FULL HD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(233, 0, '3060102061', '36', 0, '', '', 0, 0, 0, 'Nikon Mirrorless Nikkor Z 70-200mm F/2.8 VR S Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(234, 0, '3060102003', '32', 0, '', '', 0, 0, 0, 'Nikon Z7 Body Only SN=7202273', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(235, 0, '3050206020', '7', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(236, 0, '3050206020', '8', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(237, 0, '3050206020', '9', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(238, 0, '3050206020', '10', 0, '', '', 0, 0, 0, 'Kamera Gopro Hero 7 Black Telesin 170 Jaws Flex Suction Cup car Mount Holder 4 Bh + Sandisk Extreme ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(239, 0, '3050206020', '19', 0, '', '', 0, 0, 0, 'Sony PXW X-200 XDCAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(240, 0, '3060102061', '42', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 70-200mm f2.8 VR S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(241, 0, '3060102061', '43', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 70-200mm f2.8 VR S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(242, 0, '3050206020', '22', 0, '', '', 0, 0, 0, 'Gopro Hero 10 Black 2021 Action 23MP 5K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(243, 0, '3050206020', '23', 0, '', '', 0, 0, 0, 'Gopro Hero 10 Black 2021 Action 23MP 5K', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(244, 0, '3060102061', '44', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 24-120mm f/4 S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(245, 0, '3060102061', '45', 0, '', '', 0, 0, 0, 'Nikon Nikkor Z 24-120mm f/4 S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(246, 0, '3050206020', '26', 0, '', '', 0, 0, 0, 'Sony PXW FX6 Full Frame + SmallRig + Strap', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(247, 0, '3050206020', '27', 0, '', '', 0, 0, 0, 'Sony FX3+ Battery+Microphone+Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(248, 0, '3050206020', '28', 0, '', '', 0, 0, 0, 'Sony FX3+ Battery+Microphone+Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(249, 0, '3060101036', '1', 0, '', '', 0, 0, 0, 'Shure ULXD 24/Beta 87A (Microphone Wireless ) + kelengkapannya', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(250, 0, '3060101036', '24', 0, '', '', 0, 0, 0, 'Audio Technica System 10 Pro', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(251, 0, '3060101036', '25', 0, '', '', 0, 0, 0, 'Audio Technica System 10 Pro', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(252, 0, '3060101036', '26', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(253, 0, '3060102061', '24', 0, '', '', 0, 0, 0, 'Nikon AF-S 24-120mm F/4G  VR ED N', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(254, 0, '3060101036', '28', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(255, 0, '3060101036', '29', 0, '', '', 0, 0, 0, 'Handled ULXP24 Frekuensi 748 - 784 MHz Q2', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(256, 0, '3090402031', '1', 0, '', '', 0, 0, 0, '1 Set Kamera Digital Nikon Z7 + Lensa Sony 70-200 mm f', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(257, 0, '3050206020', '2', 0, '', '', 0, 0, 0, 'Sony PXW-Z280, 45121516-PKM-000593807', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(258, 0, '3050206020', '5', 0, '', '', 0, 0, 0, 'Sony Camcorder PXW-Z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(259, 0, '3050206020', '6', 0, '', '', 0, 0, 0, 'Sony Camcorder PXW-Z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(260, 0, '3050206020', '20', 0, '', '', 0, 0, 0, 'Sony Profesional; PXW-X180 HD XD CAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(261, 0, '3050206020', '21', 0, '', '', 0, 0, 0, 'Sony Profesional; PXW-X180 HD XD CAM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(262, 0, '3050206020', '24', 0, '', '', 0, 0, 0, 'Sony  PXW-z280', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(263, 0, '3050206020', '25', 0, '', '', 0, 0, 0, 'Sony FX6 Full Frame Cinema (Body Only) + Lensa + Sony 128 GB  + Memory Card', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(264, 0, '3060101036', '27', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(265, 0, '3060101036', '39', 0, '', '', 0, 0, 0, 'clipon shure + Condesor WL93', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(266, 0, '3060101036', '40', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(267, 0, '3060101036', '41', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(268, 0, '3060101036', '42', 0, '', '', 0, 0, 0, 'Shure SVX14/CVL', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(269, 0, '3060101036', '43', 0, '', '', 0, 0, 0, 'Clip on shure + Condesor WL 93', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(270, 0, '3060101036', '44', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(271, 0, '3060101036', '45', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(272, 0, '3060101036', '46', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(273, 0, '3060101036', '47', 0, '', '', 0, 0, 0, 'Shure ULXD2/B87A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(274, 0, '3060101036', '48', 0, '', '', 0, 0, 0, 'Sennheiser EW 135-P G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(275, 0, '3060101036', '49', 0, '', '', 0, 0, 0, 'Sennheiser EW 135-P G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(276, 0, '3060101036', '50', 0, '', '', 0, 0, 0, 'Televic Microphone 40cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(277, 0, '3060101036', '30', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(278, 0, '3060101036', '31', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(279, 0, '3060101036', '53', 0, '', '', 0, 0, 0, 'Televic Microphone Uk. 40cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(280, 0, '3060101036', '54', 0, '', '', 0, 0, 0, 'Televic Microphone Uk. 40CM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(281, 0, '3060101036', '55', 0, '', '', 0, 0, 0, 'Televic Microphone Uk. 40 Cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(282, 0, '3060101036', '56', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(283, 0, '3060101036', '57', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(284, 0, '3060101036', '58', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(285, 0, '3060101036', '59', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(286, 0, '3060101036', '60', 0, '', '', 0, 0, 0, 'Shure FP Series With SM 58 Capsul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(287, 0, '3060101036', '67', 0, '', '', 0, 0, 0, 'Rode RODELink Newsshooter Kit', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(288, 0, '3060101036', '68', 0, '', '', 0, 0, 0, 'Rode RODELink Newsshooter Kit', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(289, 0, '3060101036', '32', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(290, 0, '3060101036', '33', 0, '', '', 0, 0, 0, 'Senheiser EW 100-ENG G4 (ME2 Clip On)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(291, 0, '3060101036', '71', 0, '', '', 0, 0, 0, 'Shure ULXD 24/Beta 87A + kelengkapannya', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(292, 0, '3060101036', '72', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(293, 0, '3060101036', '34', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(294, 0, '3060101036', '74', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(295, 0, '3060101036', '75', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(296, 0, '3060101036', '76', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(297, 0, '3060101036', '77', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(298, 0, '3060101036', '78', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(299, 0, '3060101036', '79', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(300, 0, '3060101036', '80', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(301, 0, '3060101036', '81', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(302, 0, '3060101036', '82', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(303, 0, '3060101036', '83', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(304, 0, '3060101036', '84', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(305, 0, '3060101036', '85', 0, '', '', 0, 0, 0, 'Shure type ULXD 24 / Beta 87 + P51 ULXD4 Wireless Reciever', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(306, 0, '3060101036', '86', 0, '', '', 0, 0, 0, 'Mic Sony CM-W2BT', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(307, 0, '3060101036', '35', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(308, 0, '3060101036', '36', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(309, 0, '3060101036', '37', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(310, 0, '3060101036', '38', 0, '', '', 0, 0, 0, 'Senheiser MD46 Reporter Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(311, 0, '3060101036', '51', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-ENG G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(312, 0, '3060101037', '1', 0, '', '', 0, 0, 0, 'Hercules BS408B Orkestra', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(313, 0, '3060101037', '3', 0, '', '', 0, 0, 0, 'Hercules BS408B Orkestra', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(314, 0, '3060101037', '4', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(315, 0, '3060101037', '5', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(316, 0, '3060101037', '6', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(317, 0, '3060101037', '7', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom) Panjang 12 cm, Diameter 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(318, 0, '3060101037', '8', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(319, 0, '3060101037', '9', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(320, 0, '3060101037', '10', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(321, 0, '3060101037', '11', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(322, 0, '3060101037', '12', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(323, 0, '3060101037', '13', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(324, 0, '3060101037', '14', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(325, 0, '3060101037', '15', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(326, 0, '3060101037', '16', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom), Besi P.12 cm, D. 1.5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(327, 0, '3060101037', '17', 0, '', '', 0, 0, 0, 'Dudukan Mic (Custom)  P.12cm, D.1,5cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(328, 0, '3060101037', '18', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(329, 0, '3060101037', '19', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(330, 0, '3060101037', '22', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(331, 0, '3060101037', '23', 0, '', '', 0, 0, 0, 'Vocal Microhone +dudukan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(332, 0, '3060101037', '25', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(333, 0, '3060101037', '26', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(334, 0, '3060101037', '27', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(335, 0, '3060101037', '28', 0, '', '', 0, 0, 0, 'Dudukan Microphone Podium (Custom)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(336, 0, '3060101088', '12', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(337, 0, '3060101088', '13', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(338, 0, '3060101088', '14', 0, '', '', 0, 0, 0, 'Sony Voice Recorder (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(339, 0, '3060101088', '15', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(340, 0, '3060101088', '16', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(341, 0, '3060101088', '17', 0, '', '', 0, 0, 0, 'Sony Voice Recorder (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(342, 0, '3060101088', '18', 0, '', '', 0, 0, 0, 'Sony ICD-UX543F 4GB UX', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(343, 0, '3060101088', '19', 0, '', '', 0, 0, 0, 'Sony ICD-UX543F 4GB UX', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(344, 0, '3060101088', '20', 0, '', '', 0, 0, 0, 'Sony [CD-UX560F] - Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(345, 0, '3060101088', '21', 0, '', '', 0, 0, 0, 'Sony Digital (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(346, 0, '3060101088', '22', 0, '', '', 0, 0, 0, 'Sony Digital (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(347, 0, '3060101088', '23', 0, '', '', 0, 0, 0, 'Sony Digital (ICD-UX560F)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(348, 0, '3060101036', '52', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-ENG G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(349, 0, '3060101088', '28', 0, '', '', 0, 0, 0, 'SONY Voice Recorder ICDUX560F- Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(350, 0, '3060101088', '29', 0, '', '', 0, 0, 0, 'Shure Adapter USB X2U Limited (Perekam Digital)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(351, 0, '3060101088', '30', 0, '', '', 0, 0, 0, 'Shure Adapter USB X2U Limited (Perekam Digital)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(352, 0, '3060101036', '69', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-Eng G4 (ME Clip-on Microphone)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(353, 0, '3060101088', '32', 0, '', '', 0, 0, 0, 'Voice Recorder Sony ICD-TX660', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(354, 0, '3060101088', '33', 0, '', '', 0, 0, 0, 'Voice Recorder Tascam Portacapture X8', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(355, 0, '3060102003', '19', 0, '', '', 0, 0, 0, 'Canon EOS 70D Kit EF-S18-55 IS STM BUILT-IN WIFI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(356, 0, '3060102003', '20', 0, '', '', 0, 0, 0, 'Canon EOS 70D Kit EF-S18-55 IS STM BUILT-IN WIFI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(357, 0, '3060102003', '21', 0, '', '', 0, 0, 0, 'DJI osmo Pocket', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(358, 0, '3060102003', '22', 0, '', '', 0, 0, 0, 'DJI osmo Pocket', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(359, 0, '3060101036', '70', 0, '', '', 0, 0, 0, 'Sennheiser EW 100-Eng G4 (ME Clip-on Microphone)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(360, 0, '3060102003', '30', 0, '', '', 0, 0, 0, 'Nikon 27 II body + Kelengkapan Kamera  + Lowepro sling bag', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(361, 0, '3060102003', '31', 0, '', '', 0, 0, 0, 'Canon EOS R10  Mirroles Camera 18-45', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(362, 0, '3060101036', '73', 0, '', '', 0, 0, 0, 'Sennheiser EW 112P G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(363, 0, '3060102003', '33', 0, '', '', 0, 0, 0, 'Camera Sony A7S Mark III - Body Only - BPMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(364, 0, '3060102003', '34', 0, '', '', 0, 0, 0, 'Camera Sony A7S Mark III - Body Only - BPMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(365, 0, '3060101036', '87', 0, '', '', 0, 0, 0, 'Microphone Wirelles Sennheiser EW 112 PG4 MIC ES 112', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(366, 0, '3060101036', '88', 0, '', '', 0, 0, 0, 'Bodypack Wireless Microphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(367, 0, '3060102039', '5', 0, '', '', 0, 0, 0, 'sony', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(368, 0, '3060102039', '6', 0, '', '', 0, 0, 0, 'sony', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(369, 0, '3060102039', '8', 0, '', '', 0, 0, 0, 'Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(370, 0, '3060101036', '89', 0, '', '', 0, 0, 0, 'Sennheiser EW 500 BOOM G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(371, 0, '3060101036', '90', 0, '', '', 0, 0, 0, 'Sennheiser EW 500 BOOM G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(372, 0, '3060101036', '91', 0, '', '', 0, 0, 0, 'Sennheiser EW 500 BOOM G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(373, 0, '3060101088', '24', 0, '', '', 0, 0, 0, 'Zoom H6 Handy Recorder', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(374, 0, '3060102045', '11', 0, '', '', 0, 0, 0, 'HD4000 Stabilizer Syistem', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(375, 0, '3060102045', '12', 0, '', '', 0, 0, 0, 'Manfrotto MK Compact ADV-BK Compact Advance', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(376, 0, '3060102045', '13', 0, '', '', 0, 0, 0, 'Zhiyun Crane 3 Lab Handheld Stabilizer', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(377, 0, '3060102045', '14', 0, '', '', 0, 0, 0, 'MANFROTTO MK190XPRO 4-3W 190 Kit - alu 4-section h', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(378, 0, '3060102045', '15', 0, '', '', 0, 0, 0, 'MANFROTTO MK190XPRO 4-3W 190 Kit - alu 4-section h', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(379, 0, '3060102045', '16', 0, '', '', 0, 0, 0, 'DJI RS2 Pro Combo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(380, 0, '3060102045', '17', 0, '', '', 0, 0, 0, 'Manfrotto 504X with 2 Stage Carbon Fiber Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(381, 0, '3060102045', '18', 0, '', '', 0, 0, 0, 'Manfrotto 504X with 2 Stage Carbon Fiber Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(382, 0, '3060101088', '31', 0, '', '', 0, 0, 0, 'Zoom H6 Black handy Recoder', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(383, 0, '3060102003', '29', 0, '', '', 0, 0, 0, 'Sony Alpha A7S III + Charger Sony BC-QZ1', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(384, 0, '3060102045', '21', 0, '', '', 0, 0, 0, 'DJJ Ronin RS 3 Pro Combo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(385, 0, '3060102003', '35', 0, '', '', 0, 0, 0, 'Nikon Z9 Mirrorless Body Only + Battery + Speedlight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(386, 0, '3060102045', '23', 0, '', '', 0, 0, 0, 'Ifootage Cobra 3 CB A180T Monopod & Komodo K5', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(387, 0, '3060102003', '36', 0, '', '', 0, 0, 0, 'Nikon Z9 Mirrorless Body Only + Battery + Speedlight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(388, 0, '3060102039', '9', 0, '', '', 0, 0, 0, 'Blackmagic Design Intensity Shuttle USB 3.0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(389, 0, '3080111137', '1', 0, '', '', 0, 0, 0, 'Manfrotto MT055XPRO3 056 3-Section Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(390, 0, '3080111137', '2', 0, '', '', 0, 0, 0, 'Manfrotto MT055XPRO3 056 3-Section Tripod', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(391, 0, '3080111137', '5', 0, '', '', 0, 0, 0, 'Datvideo TP-500 B DSLR Prompter For Ipad', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(392, 0, '3060102045', '8', 0, '', '', 0, 0, 0, 'Sachtler ACE L MS Carbon-Fiber', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(393, 0, '3060102061', '20', 0, '', '', 0, 0, 0, 'Nikon AF 16 MM F/ 28D Fisheye', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(394, 0, '3060102061', '21', 0, '', '', 0, 0, 0, 'Nikon AFS 2470 MM F/2.8 G ED N', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(395, 0, '3060102061', '22', 0, '', '', 0, 0, 0, 'Sony 24-240mm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(396, 0, '3060102061', '23', 0, '', '', 0, 0, 0, 'Sony FE 85mm f/1.4 GM Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(397, 0, '3060102045', '9', 0, '', '', 0, 0, 0, 'Sachler Ace M MS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(398, 0, '3060102045', '10', 0, '', '', 0, 0, 0, 'Sachtler Ace L MS CF', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(399, 0, '3060102045', '19', 0, '', '', 0, 0, 0, 'Secced Tripot Reach Plus 4 Kit 32kg Bowl 100mm 2 Stage Carbon Leg Bag', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(400, 0, '3060102061', '27', 0, '', '', 0, 0, 0, 'Sony FE 16-35 f2.8 GM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(401, 0, '3060102045', '20', 0, '', '', 0, 0, 0, 'Secced Tripot Reach Plus 4 Kit 32kg Bowl 100mm 2 Stage Carbon Leg Bag', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(402, 0, '3060102061', '29', 0, '', '', 0, 0, 0, 'Lensa Kamera ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(403, 0, '3060102061', '30', 0, '', '', 0, 0, 0, 'Lensa Kamera', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(404, 0, '3060102061', '34', 0, '', '', 0, 0, 0, 'Lensa Sony SEL 1018 E 10-18 mm f/4 OSS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(405, 0, '3060102061', '35', 0, '', '', 0, 0, 0, 'Nikon Mirrorless Nikkor Z 24-70mm F/2.8 S Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(406, 0, '3060102045', '22', 0, '', '', 0, 0, 0, 'DJI RS 4 Pro Combo - BPMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(407, 0, '3060102061', '37', 0, '', '', 0, 0, 0, 'Nikkor Z 50 mm F/1.85', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(408, 0, '3060102045', '24', 0, '', '', 0, 0, 0, 'DJI RS 4 Pro Gimbal Stabiliser', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(409, 0, '3080111137', '3', 0, '', '', 0, 0, 0, 'Tripod Libec TH-X 30-62\"\" Height Range', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(410, 0, '3060102055', '3', 0, '', '', 0, 0, 0, 'Litepanels Astra 6X Traeler Bi-Color Trio 3_Light Kit with V Mount Battery', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(411, 0, '3060102130', '8', 0, '', '', 0, 0, 0, 'Speedlight Camera Nikon S8910', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(412, 0, '', '', 0, '', '', 0, 0, 0, 'Nikon 14-24mm f2. 8', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(413, 0, '3060102061', '26', 0, '', '', 0, 0, 0, 'Nikon AF-S 70-200mm F/2,8G IF ED VR II', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(414, 0, '3060102061', '28', 0, '', '', 0, 0, 0, 'Sony FE 24-105MM F/4 G OSS LENS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(415, 0, '3060102061', '38', 0, '', '', 0, 0, 0, 'Nikkor Z 70-200mm f/2.8 VR S', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(416, 0, '3060102061', '39', 0, '', '', 0, 0, 0, 'Nikon AF-S Nikkor 24-70mm f/2,8G ED', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(417, 0, '3060102061', '40', 0, '', '', 0, 0, 0, 'Nikkor Z 17-28mm f/2,8', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(418, 0, '3060102061', '48', 0, '', '', 0, 0, 0, 'Sony FE 70-200mm F/2.8 GM OSS II Lensa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(419, 0, '3060102061', '49', 0, '', '', 0, 0, 0, 'Sony FE 100-100mm f/4.5-5.6 GM OSS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(420, 0, '3060102061', '50', 0, '', '', 0, 0, 0, 'Sony FE 200-600mm F5.6-6.3 G OSS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(421, 0, '3060102061', '41', 0, '', '', 0, 0, 0, 'Lens Sony FE 24-105mm F/4 G OSS - BPMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(422, 0, '3060102128', '21', 0, '', '', 0, 0, 0, 'LEICA D-Lux (Type 109)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(423, 0, '3060102061', '46', 0, '', '', 0, 0, 0, 'Sony FE 24-105mm F/4 G OSS Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(424, 0, '3060102061', '47', 0, '', '', 0, 0, 0, 'Sony FE 24-105mm F/4 G OSS Lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(425, 0, '3060102128', '36', 0, '', '', 0, 0, 0, 'Nikon d610 24,3 MP DSLR Camera With 24-85 mm lens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(426, 0, '3060102128', '38', 0, '', '', 0, 0, 0, 'Canon EOS 60 D', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(427, 0, '3060102128', '39', 0, '', '', 0, 0, 0, 'Nikon D5 DSLR Camera', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(428, 0, '3060102128', '40', 0, '', '', 0, 0, 0, 'Nikon D5 DSLR Camera', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(429, 0, '3060102128', '41', 0, '', '', 0, 0, 0, 'Fuji Film XT10 KIT with XF1855MM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(430, 0, '3060102128', '42', 0, '', '', 0, 0, 0, 'Canon EOS 600D Kit', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(431, 0, '3060102128', '43', 0, '', '', 0, 0, 0, 'Fujifilm X-10', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(432, 0, '3060102128', '44', 0, '', '', 0, 0, 0, 'Sony A9 Body Only', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(433, 0, '3060102128', '45', 0, '', '', 0, 0, 0, 'DSLR Nikon D5 Body', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(434, 0, '3060102128', '46', 0, '', '', 0, 0, 0, 'Sony Alpha A7 III + Battery Charger', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(435, 0, '3060102128', '47', 0, '', '', 0, 0, 0, 'Sony Alpha A7 III + Battery Charger', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(436, 0, '3060102128', '48', 0, '', '', 0, 0, 0, 'Fujifilm XA10 Kit 16-50 OIS Card 32 GB ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(437, 0, '3060102128', '49', 0, '', '', 0, 0, 0, 'Fujifilm XA10 Kit 16-50 OIS Card 32 GB ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(438, 0, '3060102128', '50', 0, '', '', 0, 0, 0, 'Fujifilm XA10 Kit 16-50 OIS Card 32 GB ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(439, 0, '3060102128', '51', 0, '', '', 0, 0, 0, 'Fujifilm XA10 Kit 16-50 OIS Card 32 GB ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(440, 0, '3060102128', '52', 0, '', '', 0, 0, 0, 'Nikon Coolpix W100', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(441, 0, '3060102128', '53', 0, '', '', 0, 0, 0, 'Panasonic Lumix DMCLX10 LX 10 Black', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(442, 0, '3060102128', '54', 0, '', '', 0, 0, 0, 'Sony A6400 (KIT), Model Mirrorless, Video UHD 4K30p + Lensa 16-50mm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(443, 0, '3060102128', '55', 0, '', '', 0, 0, 0, 'Sony A6600, Model Mirrorless, Video UHD 4K30p + Lensa Sony E PZ 18-105mm F4 G OSS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(444, 0, '3060102128', '56', 0, '', '', 0, 0, 0, 'DSLR NIKON D6', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(445, 0, '3060102128', '64', 0, '', '', 0, 0, 0, 'Sony Alpha A7S + Charger + Microphone Sony ECM', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(446, 0, '3060102128', '69', 0, '', '', 0, 0, 0, 'Insta 360 X3 (7 Paket + Sandisk +USH', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(447, 0, '3060102128', '70', 0, '', '', 0, 0, 0, 'Insta360 Ace Pro Action Camera 8K UHD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(448, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk Seagate 2T', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(449, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk Samsung T7 2T', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(450, 0, '3060102130', '9', 0, '', '', 0, 0, 0, 'Poket Wizard Flextt 5 Nikon CE', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(451, 0, '3060102130', '10', 0, '', '', 0, 0, 0, 'Sony HVL-LBPC', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(452, 0, '3060102130', '11', 0, '', '', 0, 0, 0, 'Nikon Speedlight SB-5000 AF', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(453, 0, '3060102130', '12', 0, '', '', 0, 0, 0, 'Nikon Speedlight SB-5000 AF', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(454, 0, '3060102130', '13', 0, '', '', 0, 0, 0, 'Lampu Studio Godox DE-300', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(455, 0, '3060102130', '14', 0, '', '', 0, 0, 0, 'Litepanels Astra 6X BI-Color', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(456, 0, '3060102130', '15', 0, '', '', 0, 0, 0, 'Litepanels Astra 6X BI-Color', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(457, 0, '3060102130', '16', 0, '', '', 0, 0, 0, 'Flash Kamera Sekonic Flashmate Light Meter L-308X ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(458, 0, '3060102130', '17', 0, '', '', 0, 0, 0, 'Nikon SB-5000 AF SpeedLight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(459, 0, '3060102130', '18', 0, '', '', 0, 0, 0, 'Nikon SB-5000 AF SpeedLight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(460, 0, '3060102130', '19', 0, '', '', 0, 0, 0, 'Nikon SB-5000 AF SpeedLight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(461, 0, '3060102130', '20', 0, '', '', 0, 0, 0, 'Nikon SB-5000 AF SpeedLight', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(462, 0, '3060102130', '21', 0, '', '', 0, 0, 0, 'Nikon Speedlight SB-700 AF', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(463, 0, '3060102130', '22', 0, '', '', 0, 0, 0, 'Nikon Speedlight SB-700 AF', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(464, 0, '3060102158', '1', 0, '', '', 0, 0, 0, 'Manfrotto Xpro Aluminium Video Monopod MVMXPRO500', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(465, 0, '3060102158', '3', 0, '', '', 0, 0, 0, 'Gitzo GM5561T Traveller 6x Carbon Fiber Support 25', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(466, 0, '3060102158', '4', 0, '', '', 0, 0, 0, 'Gitzo GM5561T Traveller 6x Carbon Fiber Support 25', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(467, 0, '3060102158', '5', 0, '', '', 0, 0, 0, 'Gitzo GM5561T Traveller 6x Carbon Fiber Support 25', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(468, 0, '3060102158', '6', 0, '', '', 0, 0, 0, 'Manfrotto MVH400AH Befree Live Fluid Video Head', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(469, 0, '3060102158', '7', 0, '', '', 0, 0, 0, 'Manfrotto MVH400AH Befree Live Fluid Video Head', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(470, 0, '3060102158', '8', 0, '', '', 0, 0, 0, 'Stabilizer Kamera DJI Om 5 ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(471, 0, '3060102167', '1', 0, '', '', 0, 0, 0, 'DJI Mavic Pro 2 + Remote Smart Controller', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(472, 0, '3060102167', '2', 0, '', '', 0, 0, 0, 'DJI Mavic 2 Zoom + Smart Controller', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(473, 0, '3060102167', '3', 0, '', '', 0, 0, 0, 'Remote Smart Controller DJI Mavic 2 Pro', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(474, 0, '3060102167', '4', 0, '', '', 0, 0, 0, 'Drone (3 DJI Mavic 2 Pro, Dji FPV, Sandisk + Kelengkapan Lainnya)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(475, 0, '3060102167', '5', 0, '', '', 0, 0, 0, 'DJI MAVIC 3 Pro Fly More Combo (DJI RC Pro)   + Tas + Memory', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(476, 0, '3060102167', '6', 0, '', '', 0, 0, 0, 'DJI MAVIC 3 Pro Fly More Combo (DJI RC Pro)   + Tas + Memory', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(477, 0, '3060102167', '7', 0, '', '', 0, 0, 0, 'DJI Mavic  3 Pro Fly More Combo w/ RC PRO', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(478, 0, '3060102167', '8', 0, '', '', 0, 0, 0, 'DJI Mavic  3 Pro Fly More Combo w/ RC PRO', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(479, 0, '3060105047', '1', 0, '', '', 0, 0, 0, 'Drone DJI Mavic 2 Pro + ND Filter', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(480, 0, '3060105047', '3', 0, '', '', 0, 0, 0, 'Drone DJI Mavic 2 Zoom + ND Filter + Micro SD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(481, 0, '3060105047', '4', 0, '', '', 0, 0, 0, 'Drone DJI Mavic Mini Fly More Combo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(482, 0, '3060105047', '6', 0, '', '', 0, 0, 0, 'Drone DJI Mavic 2 Pro + ND Filter', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(483, 0, '3060105047', '7', 0, '', '', 0, 0, 0, 'Drone DJI Phantom 4 Pro Plus V2', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(484, 0, '3060105047', '8', 0, '', '', 0, 0, 0, 'Drone, DJI Mavic Air 2 Fly More Combo, Remote Controller: OccuSync 2.0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(485, 0, '3060102999', '1', 0, '', '', 0, 0, 0, 'EXINDA', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(486, 0, '3060102999', '2', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(487, 0, '3060102999', '3', 0, '', '', 0, 0, 0, 'Demodulator Pro X DM 96', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(488, 0, '3060102999', '4', 0, '', '', 0, 0, 0, 'Demodulator Pro X DM 96', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(489, 0, '3060102999', '5', 0, '', '', 0, 0, 0, 'Demodulator Pro X DM 96', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(490, 0, '3060102999', '6', 0, '', '', 0, 0, 0, 'Demodulator Pro X DM 96', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(491, 0, '3060102999', '7', 0, '', '', 0, 0, 0, 'Demodulator Pro X DM 96', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(492, 0, '3060102999', '8', 0, '', '', 0, 0, 0, 'Profesional Modulator Prevail Model C788', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(493, 0, '3060102999', '9', 0, '', '', 0, 0, 0, 'Profesional Modulator Prevail Model C788', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(494, 0, '3060102999', '10', 0, '', '', 0, 0, 0, 'Elgato HD60S+ HDMI (uneencrypted), 4Th Gerneration quad-core Intel Core i5 CPU (i5-4xxx or Commparab', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(495, 0, '3060102999', '11', 0, '', '', 0, 0, 0, 'Foto Studio', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(496, 0, '3060102999', '12', 0, '', '', 0, 0, 0, 'Matrix MTDC-16LT5010', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(497, 0, '3060102999', '13', 0, '', '', 0, 0, 0, 'Profesional Modulator Prevail Model C788', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(498, 0, '3060102999', '14', 0, '', '', 0, 0, 0, 'Profesional Modulator Prevail Model C788', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(499, 0, '3060102999', '15', 0, '', '', 0, 0, 0, 'Profesional Modulator Prevail Model C788', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(500, 0, '3060102999', '16', 0, '', '', 0, 0, 0, 'Matrix MTDC-16LT5010', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(501, 0, '3060102999', '17', 0, '', '', 0, 0, 0, 'Matrix Modulator Headend 32 Channel', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(502, 0, '3060102999', '18', 0, '', '', 0, 0, 0, 'Global Ten GT1025FO+HD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(503, 0, '3060102999', '19', 0, '', '', 0, 0, 0, 'Matrix 8 ch VM550E', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(504, 0, '3060102999', '20', 0, '', '', 0, 0, 0, 'Pro X DM 96', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(505, 0, '3060102999', '21', 0, '', '', 0, 0, 0, 'Small Rig Camera Cage Kit for Sony a 7III Series', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(506, 0, '3060102999', '22', 0, '', '', 0, 0, 0, 'A7M3 Dual DSLR Camera L Bracket  for Sony A7II A7R', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(507, 0, '3060102999', '23', 0, '', '', 0, 0, 0, 'Blackmagic Intensity Shuttle for USB 3.0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(508, 0, '3060102999', '24', 0, '', '', 0, 0, 0, 'Blackmagic Intensity Shuttle for USB 3.0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(509, 0, '', '', 0, '', '', 0, 0, 0, 'Kingstone Nucleum USB C', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(510, 0, '', '', 0, '', '', 0, 0, 0, 'Nucleum USB-C Hub', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(511, 0, '', '', 0, '', '', 0, 0, 0, 'Speedlite SB900', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(512, 0, '', '', 0, '', '', 0, 0, 0, 'Memory Card CF 64&32', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(513, 0, '', '', 0, '', '', 0, 0, 0, 'Battery Nikon EnEl18c', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(514, 0, '', '', 0, '', '', 0, 0, 0, 'HDD Seagate 2TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(515, 0, '', '', 0, '', '', 0, 0, 0, 'Nikon Battery Charger', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(516, 0, '', '', 0, '', '', 0, 0, 0, 'Card Reader CF UGreen', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(517, 0, '', '', 0, '', '', 0, 0, 0, 'MacBook Air', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(518, 0, '', '', 0, '', '', 0, 0, 0, 'Samsung .Portabel SSD T5', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(519, 0, '', '', 0, '', '', 0, 0, 0, 'Baterai Nikon EN-EL 18b', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(520, 0, '', '', 0, '', '', 0, 0, 0, 'Kamera Nikon D4s', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(521, 0, '3060102061', '25', 0, '', '', 0, 0, 0, 'Nikon AF-S 24-70mm F/2,8E ED VR', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(522, 0, '3060102128', '20', 0, '', '', 0, 0, 0, 'Nikon D5 + Nikon AF-S 24-120 + Speedlight Nikon SB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(523, 0, '3060102128', '23', 0, '', '', 0, 0, 0, 'Nikon D5 + Nikon AF-S 24-120 + Speedlight Nikon SB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(524, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Nikon 16mm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(525, 0, '', '', 0, '', '', 0, 0, 0, 'Flash SB-900', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(526, 0, '', '', 0, '', '', 0, 0, 0, 'charger Nikon MH 26H', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(527, 0, '', '', 0, '', '', 0, 0, 0, 'Batre Nikon EN-EL18c', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(528, 0, '', '', 0, '', '', 0, 0, 0, 'Charger Nikon MH 25', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(529, 0, '', '', 0, '', '', 0, 0, 0, 'batre Nikon EN-EL 15c', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(530, 0, '', '', 0, '', '', 0, 0, 0, 'SONY  ADAPTOR/CHARGER\nBaterai Camera BC-U1A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(531, 0, '', '', 0, '', '', 0, 0, 0, 'Baterai Kamera BP-U90', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(532, 0, '', '', 0, '', '', 0, 0, 0, 'Baterai BP-U60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(533, 0, '', '', 0, '', '', 0, 0, 0, 'SENNHEISER EK 100 G4 Freq. Range-A:516-558MHz', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(534, 0, '', '', 0, '', '', 0, 0, 0, 'Lighting mini LED Aputure', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(535, 0, '', '', 0, '', '', 0, 0, 0, 'Earphone sennheiser mx375', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(536, 0, '', '', 0, '', '', 0, 0, 0, 'Tas Urban Photo Sling 250', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(537, 0, '', '', 0, '', '', 0, 0, 0, 'Tas Kamera', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(538, 0, '', '', 0, '', '', 0, 0, 0, 'memory card sony sxs 64gb', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(539, 0, '', '', 0, '', '', 0, 0, 0, 'Kingston Nucleum Card Reader/Writer', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(540, 0, '', '', 0, '', '', 0, 0, 0, 'Sony CFexpress Type A/SD Card Reader', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(541, 0, '', '', 0, '', '', 0, 0, 0, 'HP Mi A2 Lite', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(542, 0, '', '', 0, '', '', 0, 0, 0, 'HP Asus Zenfone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(543, 0, '', '', 0, '', '', 0, 0, 0, 'Sony SxS Memory Card USB Reader, Model SBAC-US30', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(544, 0, '', '', 0, '', '', 0, 0, 0, 'SanDisk Extreme Pro Portable SSD, 1 TB, Model SDSSDE81- 1TOO', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(545, 0, '', '', 0, '', '', 0, 0, 0, 'CAMERA MOUNT RECEIVER SENNHEISER EK 100 G3', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(546, 0, '', '', 0, '', '', 0, 0, 0, 'PLUG-ON TRANSMITTER SENNHEISER G3 SKP100', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(547, 0, '', '', 0, '', '', 0, 0, 0, 'BATTERY CAMERA SONY BP- U60 & BP-U90', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(548, 0, '', '', 0, '', '', 0, 0, 0, 'Rain cover camera', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(549, 0, '', '', 0, '', '', 0, 0, 0, 'Battery Sony BP-U90', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(550, 0, '', '', 0, '', '', 0, 0, 0, 'Battery Sony BP-U60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(551, 0, '', '', 0, '', '', 0, 0, 0, 'Charger BC-U1A', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(552, 0, '', '', 0, '', '', 0, 0, 0, 'Sennheiser plug on transmitter SKP 100 G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(553, 0, '', '', 0, '', '', 0, 0, 0, 'Sennheiser bodypack transmitter SK 100 G4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(554, 0, '', '', 0, '', '', 0, 0, 0, 'Sennhesier Earphone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(555, 0, '', '', 0, '', '', 0, 0, 0, 'Aputure Mini LED', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(556, 0, '', '', 0, '', '', 0, 0, 0, 'Sony AC Adaptor/Charger BC- U1', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(557, 0, '', '', 0, '', '', 0, 0, 0, 'Aputure amaran AL-M9', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(558, 0, '', '', 0, '', '', 0, 0, 0, 'Battery sony BP-U90', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(559, 0, '', '', 0, '', '', 0, 0, 0, '(2) Battery sony BP -U60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(560, 0, '', '', 0, '', '', 0, 0, 0, 'Tas kamera', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(561, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series 70-200', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(562, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series 16-35', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(563, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series lensa fix 85', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(564, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series Lensa fix 50', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(565, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series 18-105', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(566, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series 100-400', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(567, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series 24-70', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(568, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Sony G Series 24-105', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(569, 0, '', '', 0, '', '', 0, 0, 0, 'Sony NP-FZ100 x8', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(570, 0, '', '', 0, '', '', 0, 0, 0, 'Printer HP LaserJet Pro MFP M1 30a', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(571, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk Mybook WD 12 TB (File Digital 2002-2017) - Alih Media 2022', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(572, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk Mybook WD 12TB (File Digital 2002-2017) - Alih Media 2022', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(573, 0, '', '', 0, '', '', 0, 0, 0, 'Seagate Backup Plus Hub 10TB (External HD Alih Media Video 2014-2017) - Alih Media 2021', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(574, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 1 Maxtor 500GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(575, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 2 Buffalo 1800GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(576, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 3 Buffalo 1800GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(577, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 4 Maxtor 150 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(578, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 5 QNAP 931 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(579, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 6 Mobile disk 300 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(580, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 7 Buffalo 2TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(581, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 8 Maxtor 80 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(582, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 9 Buffalo 1 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(583, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 10 Buffalo 1 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(584, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 11 Buffalo 1 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(585, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 12 Buffalo 1 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(586, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 13 Video Seagate 1 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(587, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 14 Mobile disk 240 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(588, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 15 WD My Book 2 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(589, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 16 Mobile disk 240 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(590, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 17 Buffalo 2 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(591, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 18 Buffalo 2+2 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(592, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 19 WD Caviar 240 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(593, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 20 WD My Book Duo 6 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(594, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 21 Seagate Free Agent Xtreme 2 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(595, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 22 Seagate 18 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(596, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 23 Lacie 400 GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(597, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 24 Seagate 10 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(598, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 25 WD My Book Duo 6 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(599, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 26 Seagate 8 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(600, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 27 Seagate 4 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(601, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 28 WD My Book 4 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(602, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 29 Seagate expansion desktop drive 4 TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(603, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 30 WD My Book Duo 6TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(604, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 31 WD My Book 10TB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(605, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 32 Lacie', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(606, 0, '', '', 0, '', '', 0, 0, 0, 'Arsip kegiatan Pak Jokowi Tahun 2018', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(607, 0, '', '', 0, '', '', 0, 0, 0, 'Arsip kegiatan Pak Jokowi Tahun 2019', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(608, 0, '', '', 0, '', '', 0, 0, 0, 'Arsip kegiatan Pak Jokowi Tahun 2020', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(609, 0, '', '', 0, '', '', 0, 0, 0, 'Arsip kegiatan Pak Jokowi Agustus - Desember Tahun 2021', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(610, 0, '', '', 0, '', '', 0, 0, 0, 'Arsip Kegiatan Pak Jokowi 2014 2017', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(611, 0, '', '', 0, '', '', 0, 0, 0, 'Arsip kegiatan Pak Jokowi Tahun 2021 - 2022', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(612, 0, '', '', 0, '', '', 0, 0, 0, 'Arsip kegiatan Pak Jokowi Tahun 2023', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(613, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 1 Video 2TB Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(614, 0, '', '', 0, '', '', 0, 0, 0, 'Hardidisk 2 Video', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(615, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 3 Video WD My Passport', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(616, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 4 Video (4TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(617, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 5 Video (4 TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(618, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 6 Video WD My Passport', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(619, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 7 Video (2TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(620, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 9 Video (4TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(621, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 10 Video (4TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(622, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 11 Video (4TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(623, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 12 Video (4TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(624, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 13 Video (10TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(625, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 14 Video (2TB) Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(626, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 15 Video Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(627, 0, '', '', 0, '', '', 0, 0, 0, 'Harddisk 16 Video WD My Book', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(628, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 17 video  WD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(629, 0, '', '', 0, '', '', 0, 0, 0, 'Hardisk 18 video 3TB Seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(630, 0, '', '', 0, '', '', 0, 0, 0, 'Hard Disk 19 Video 8 TB seagate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(631, 0, '', '', 0, '', '', 0, 0, 0, 'hard disk 20 Video 8,1TB WD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(632, 0, '', '', 0, '', '', 0, 0, 0, 'Hard Disk 21 Video Lacie', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(633, 0, '', '', 0, '', '', 0, 0, 0, 'Hard disk 22 video Lacie', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(634, 0, '', '', 0, '', '', 0, 0, 0, 'Hard disk Video 23 10TB SEAGATE', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(635, 0, '', '', 0, '', '', 0, 0, 0, 'Hard Disk video 24 WD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(636, 0, '', '', 0, '', '', 0, 0, 0, 'Hard Disk Video 25 WD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(637, 0, '', '', 0, '', '', 0, 0, 0, 'Hard disk Video 26 WD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(638, 0, '', '', 0, '', '', 0, 0, 0, 'AJA Video Systems U-TAP HDMI Capture', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(639, 0, '', '', 0, '', '', 0, 0, 0, 'Magewell Video Capture HDMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(640, 0, '', '', 0, '', '', 0, 0, 0, 'Mackie Onyx Artist 1.2', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(641, 0, '', '', 0, '', '', 0, 0, 0, 'Kabel HDMI Panjang dan Pendek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(642, 0, '', '', 0, '', '', 0, 0, 0, 'Kabel SDI Panjang dan Pendek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(643, 0, '', '', 0, '', '', 0, 0, 0, 'Kabel LAN Internet', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(644, 0, '', '', 0, '', '', 0, 0, 0, 'PC Stream-X Z490 Gaming X', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(645, 0, '', '', 0, '', '', 0, 0, 0, 'PC Stream-X Mini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(646, 0, '', '', 0, '', '', 0, 0, 0, 'Switcher Blackmagic Design Atem Television Studio Pro HD', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(647, 0, '', '', 0, '', '', 0, 0, 0, 'Recorder Blackmagic Design Hyperdeck Studio Mini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(648, 0, '', '', 0, '', '', 0, 0, 0, 'AJA Video Systems U-TAP SDI Capture', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(649, 0, '', '', 0, '', '', 0, 0, 0, 'Kabel XLR Audio', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(650, 0, '', '', 0, '', '', 0, 0, 0, 'Secced SCB20/100RP', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(651, 0, '', '', 0, '', '', 0, 0, 0, 'Lite panels 900-3031', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(652, 0, '', '', 0, '', '', 0, 0, 0, 'Prompter people', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(653, 0, '', '', 0, '', '', 0, 0, 0, 'Powerbank Jackery', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(654, 0, '', '', 0, '', '', 0, 0, 0, 'Prompter people', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(655, 0, '', '', 0, '', '', 0, 0, 0, 'ECT - 100L', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(656, 0, '', '', 0, '', '', 0, 0, 0, 'Lensa Nikon Z 50mm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(657, 0, '', '', 0, '', '', 0, 0, 0, 'Body Mirrorless Nikon Z7 mk II ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(658, 0, '', '', 0, '', '', 0, 0, 0, 'SENNHEISER G4 SKP100 Freq.Range-A:516-558MHz (dongle mic)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(659, 0, '', '', 0, '', '', 0, 0, 0, 'mic sennheisser ew skp 100 g4 ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(660, 0, '', '', 0, '', '', 0, 0, 0, 'Battery Dji Mavic 3 Pro ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(661, 0, '', '', 0, '', '', 0, 0, 0, 'Charger Dji Mavic 3 Pro ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(662, 0, '', '', 0, '', '', 0, 0, 0, 'Dock Dji Mavic 3 Pro ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(663, 0, '', '', 0, '', '', 0, 0, 0, 'SD Card Sandisk ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(664, 0, '', '', 0, '', '', 0, 0, 0, 'BODYPACK TRANSMITTER SENNHEISER G3 SK100', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(665, 0, '', '', 0, '', '', 0, 0, 0, 'MEMORY CARD SONY SXS SBS-64G1C 64GB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(666, 0, '', '', 0, '', '', 0, 0, 0, 'Card Reader MXF', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(667, 0, '', '', 0, '', '', 0, 0, 0, 'SanDisk SSD 1 TB ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(668, 0, '', '', 0, '', '', 0, 0, 0, 'Sennheiser EW100G3 Transmitter (freq 743-776MHz)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(669, 0, '', '', 0, '', '', 0, 0, 0, 'Sony multi baterry adaptor 12v NPA-MQZ1', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(670, 0, '', '', 0, '', '', 0, 0, 0, 'Sony Sotgun mic ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(671, 0, '', '', 0, '', '', 0, 0, 0, 'Blackmagic MicroConverter SDI to HDMI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(672, 0, '', '', 0, '', '', 0, 0, 0, 'Blackmagic MicroConverter HDMI to SDI 3G', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(673, 0, '', '', 0, '', '', 0, 0, 0, 'Sennheiser clip on sk 100 gt4', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(674, 0, '', '', 0, '', '', 0, 0, 0, 'Sennheiser reciver ek 100 g4 ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(675, 0, '', '', 0, '', '', 0, 0, 0, 'Secced SC V20/100RP ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(676, 0, '', '', 0, '', '', 0, 0, 0, 'MacBook Air', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(677, 0, '6010303001', '1', 0, '', '', 0, 0, 0, 'Sejauh Bangau Terbang (uk.140x110)(Ampas kopi)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(678, 0, '6010303001', '2', 0, '', '', 0, 0, 0, 'Bunga Anggrek (Repro uk.70x60)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(679, 0, '6010303001', '3', 0, '', '', 0, 0, 0, 'Capung diatas Rumpun Padi (uk.99x79) Foto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(680, 0, '6010303001', '4', 0, '', '', 0, 0, 0, 'Tangkasi/Tarsius Spectrum (Repro, uk.40x50)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(681, 0, '6010303001', '5', 0, '', '', 0, 0, 0, 'Foto Heavent on Eart Central Java (uk.40x60)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(682, 0, '6010303001', '6', 0, '', '', 0, 0, 0, 'Sketsa Kuda Terbang (uk.30x32)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(683, 0, '6010303001', '7', 0, '', '', 0, 0, 0, 'Piagam Doctor Honoris Causa (uk.74x28)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(684, 0, '6010303001', '8', 0, '', '', 0, 0, 0, 'Foto Memanggul Jeram (uk.100x78)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(685, 0, '6010303001', '9', 0, '', '', 0, 0, 0, 'Wanita Duduk Berkain Merah uk. 88 x 58', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(686, 0, '6010303001', '10', 0, '', '', 0, 0, 0, 'Lukisan gambar Ka\'bah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(687, 0, '6010303002', '1', 0, '', '', 0, 0, 0, 'Hiasan Dinding motif burung (uk.50x50)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(688, 0, '6010303002', '2', 0, '', '', 0, 0, 0, 'Sungai dan Hutan Pinus (uk.30x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(689, 0, '6010303002', '3', 0, '', '', 0, 0, 0, 'Panen Padi (uk.40x40)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(690, 0, '6010303002', '4', 0, '', '', 0, 0, 0, 'Pasar Ikan (uk,40x40)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(691, 0, '6010303002', '5', 0, '', '', 0, 0, 0, 'Penari Bali Kipas (Keramik uk.40x40)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(692, 0, '6010303002', '6', 0, '', '', 0, 0, 0, 'Kota di Arab Saudi (uk.33x100)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(693, 0, '6010303002', '7', 0, '', '', 0, 0, 0, 'R.A. Kartini (uk.51x38) CM Triplek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(694, 0, '6010303002', '8', 0, '', '', 0, 0, 0, 'Penari Bali Kipas (Keramik uk.40x40)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(695, 0, '6010303002', '9', 0, '', '', 0, 0, 0, 'Lukisan Motif Batik (uk.110x250)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(696, 0, '6010303002', '10', 0, '', '', 0, 0, 0, 'Lukisan Motif Primitif Asmat uk. 89 x 38', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(697, 0, '6010303002', '11', 0, '', '', 0, 0, 0, 'Lukisan Asmat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(698, 0, '6010303002', '12', 0, '', '', 0, 0, 0, 'Lukisan Asmat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(699, 0, '6010303002', '13', 0, '', '', 0, 0, 0, 'Lukisan Asmat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(700, 0, '6020102001', '1', 0, '', '', 0, 0, 0, '3 Burung dan 2 Bebek di Kolam (Keramik uk.105x200)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(701, 0, '6020102001', '2', 0, '', '', 0, 0, 0, 'Tari Leak (uk.95x65) Akrilik', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(702, 0, '6020102001', '3', 0, '', '', 0, 0, 0, 'Panen Padi (Akrilik uk.90x140)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(703, 0, '6020102001', '4', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(704, 0, '6020102001', '5', 0, '', '', 1, 1, 1, 'Lukisan Pasar', 1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(705, 0, '6020102001', '6', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(706, 0, '6020102001', '7', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(707, 0, '6020102001', '8', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(708, 0, '6020102001', '9', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(709, 0, '6020102001', '10', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(710, 0, '6020102001', '11', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(711, 0, '6020102001', '12', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(712, 0, '6020102001', '13', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(713, 0, '6020102001', '14', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(714, 0, '6020102001', '15', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(715, 0, '6020102001', '16', 0, '', '', 0, 0, 0, 'Penjual Buah (60x80)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(716, 0, '6020102001', '17', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(717, 0, '6020102001', '18', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(718, 0, '6020102001', '19', 0, '', '', 0, 0, 0, 'Lukisan Kawanan Domba', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(719, 0, '6020102001', '20', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(720, 0, '6020102001', '21', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(721, 0, '6020102001', '22', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(722, 0, '6020102001', '23', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(723, 0, '6020102001', '24', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(724, 0, '6020102001', '25', 0, '', '', 0, 0, 0, 'Lukisan Dua wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(725, 0, '6020102001', '26', 0, '', '', 0, 0, 0, 'Lukisan Lotus', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(726, 0, '6020102001', '27', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(727, 0, '6020102001', '28', 0, '', '', 0, 0, 0, 'Lukisan Bunga 1', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(728, 0, '6020102001', '29', 0, '', '', 0, 0, 0, 'Lukisan Gerobak Ssapi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(729, 0, '6020102001', '30', 0, '', '', 0, 0, 0, 'Lukisan Borobudur', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(730, 0, '6020102001', '31', 0, '', '', 0, 0, 0, 'Wisnu Naik Garuda (uk.45x32)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(731, 0, '6020102001', '32', 0, '', '', 0, 0, 0, 'Gatutkaca dan Pergiwa (uk.45x32)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(732, 0, '6020102001', '33', 0, '', '', 0, 0, 0, 'Empat Burung diatas pohon pisang (uk.105x195)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(733, 0, '6020102001', '34', 0, '', '', 0, 0, 0, 'Tari Kipas (uk.85x65)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(734, 0, '6020102001', '35', 0, '', '', 0, 0, 0, 'Seorang Laki-Laki (uk.60x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(735, 0, '6020102001', '36', 0, '', '', 0, 0, 0, 'Bunga Merah (uk.45x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(736, 0, '6020102001', '37', 0, '', '', 0, 0, 0, 'Penggembala Kerbau (uk.58x46)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(737, 0, '6020102001', '38', 0, '', '', 0, 0, 0, 'Adu Ayam di Bali (Akrilik uk.90x126)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(738, 0, '6020102001', '39', 0, '', '', 0, 0, 0, 'Saraswati (Akrilik uk.79x58)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(739, 0, '6020102001', '40', 0, '', '', 0, 0, 0, 'Tari Barong (uk.77x94)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(740, 0, '6020102001', '41', 0, '', '', 0, 0, 0, 'Dua Burung diatas Palem (Akrilik uk.137x152)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(741, 0, '6020102001', '42', 0, '', '', 0, 0, 0, 'Sebelas Burung diatas Bunga Soka (uk.125x200)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(742, 0, '6020102001', '43', 0, '', '', 0, 0, 0, 'Dua Burung Merak diatas Bunga (uk.105x200)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(743, 0, '6020102001', '44', 0, '', '', 0, 0, 0, '20 Burung diatas Bunga (uk.120x180)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(744, 0, '6020102001', '45', 0, '', '', 0, 0, 0, 'Sepasang Burung Merak (uk70x86)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(745, 0, '6020102001', '46', 0, '', '', 0, 0, 0, 'Sketsa Empat Perahu (uk.19x25)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(746, 0, '6020102001', '47', 0, '', '', 0, 0, 0, 'Sketsa Gereja (uk.16,5x22)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(747, 0, '6020102001', '48', 0, '', '', 0, 0, 0, 'Kehidupan di Pantai (uk.33x48)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(748, 0, '6020102001', '49', 0, '', '', 0, 0, 0, 'Sketsa Anak Duduk di Kursi (uk.26,5x19)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(749, 0, '6020102001', '50', 0, '', '', 0, 0, 0, 'Sketsa Ayam (uk.13x21)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(750, 0, '6020102001', '51', 0, '', '', 0, 0, 0, 'Bung Karno dan Ibu Fatmawati (uk.60x32)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(751, 0, '6020102001', '52', 0, '', '', 0, 0, 0, 'Penari Bali (uk.80x60)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(752, 0, '6020102001', '53', 0, '', '', 0, 0, 0, 'Dewi Saraswati (uk.65x50)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(753, 0, '6020102001', '54', 0, '', '', 0, 0, 0, 'Pasar (uk.50x40)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(754, 0, '6020102001', '55', 0, '', '', 0, 0, 0, 'Burung Gelatik Kuning diatas Padi (uk.60x80)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(755, 0, '6020102001', '56', 0, '', '', 0, 0, 0, 'Tari Legong (uk.83x63)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(756, 0, '6020102001', '57', 0, '', '', 0, 0, 0, 'Tilik Bayi (uk.40x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(757, 0, '6020102001', '58', 0, '', '', 0, 0, 0, 'Kawanan Burung diatas Ranting (uk.57x117)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(758, 0, '6020102001', '59', 0, '', '', 0, 0, 0, 'Tiga Angsa di Rawa (uk.120x175)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(759, 0, '6020102001', '60', 0, '', '', 0, 0, 0, 'Menggaru Sawah (uk.58x88)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(760, 0, '6020102001', '61', 0, '', '', 0, 0, 0, 'Banjir Jakarta (uk.22x18)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(761, 0, '6020102001', '62', 0, '', '', 0, 0, 0, 'Penari Bali ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(762, 0, '6020102001', '63', 0, '', '', 0, 0, 0, '8 Burung diatas Pohon Pisang2an (uk.134x200)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(763, 0, '6020102001', '64', 0, '', '', 0, 0, 0, 'Wanita Ghana Pergi ke Pasar (uk.68x53)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(764, 0, '6020102001', '65', 0, '', '', 0, 0, 0, 'Burung Bangau dan Jalak (uk.89x140)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(765, 0, '6020102001', '66', 0, '', '', 0, 0, 0, '7 Burung diatas Pohon (uk.100x195)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(766, 0, '6020102001', '67', 0, '', '', 0, 0, 0, '5 Burung diatas Pohon (uk.115x190)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(767, 0, '6020102001', '68', 0, '', '', 0, 0, 0, '7 Burung diatas pohon Pisang2an (uk.100x193)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(768, 0, '6020102001', '69', 0, '', '', 0, 0, 0, '4 Penari Bali di Depan Pura (uk.135x95)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(769, 0, '6020102001', '70', 0, '', '', 0, 0, 0, 'HUtan dan Sungai uk 70x90 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(770, 0, '6020102001', '71', 0, '', '', 0, 0, 0, 'uk 40x60 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(771, 0, '6020102001', '72', 0, '', '', 0, 0, 0, 'uk 45 x 45 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(772, 0, '6020102001', '73', 0, '', '', 0, 0, 0, 'uk 70 x 90 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(773, 0, '6020102001', '74', 0, '', '', 0, 0, 0, 'uk 60 x 80 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(774, 0, '6020102001', '75', 0, '', '', 0, 0, 0, 'uk 50x60 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(775, 0, '6020102001', '76', 0, '', '', 0, 0, 0, 'uk. 55x55 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(776, 0, '6020102001', '77', 0, '', '', 0, 0, 0, 'uk 40x60 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(777, 0, '6020102001', '78', 0, '', '', 0, 0, 0, 'uk 80x80', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(778, 0, '6020102001', '79', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(779, 0, '6020102001', '80', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(780, 0, '6020102001', '81', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(781, 0, '6020102001', '82', 0, '', '', 0, 0, 0, 'lukisan pemandangan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(782, 0, '6020102001', '83', 0, '', '', 0, 0, 0, 'lukisan pemandangan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(783, 0, '6020102001', '84', 0, '', '', 0, 0, 0, 'lukisan tiga wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(784, 0, '6020102001', '85', 0, '', '', 0, 0, 0, '-', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(785, 0, '6020102001', '86', 0, '', '', 0, 0, 0, '4 Burung Diatas Daun Pisang-Pisangan - Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(786, 0, '6020102001', '87', 0, '', '', 0, 0, 0, 'Empat Burung diatas pohon kelapa uk 100 x 79', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(787, 0, '6020102001', '88', 0, '', '', 0, 0, 0, 'Kaligrafi Huruf Kanji', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(788, 0, '6020102001', '89', 0, '', '', 0, 0, 0, 'Gerobak Andong', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(789, 0, '6020102001', '90', 0, '', '', 0, 0, 0, 'Pohon di Pantai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(790, 0, '6020102001', '91', 0, '', '', 0, 0, 0, 'Kipas Korea', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(791, 0, '6020102002', '1', 0, '', '', 0, 0, 0, 'Lukisan China', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(792, 0, '6020102003', '1', 0, '', '', 0, 0, 0, 'Tari Baris (uk.46x36)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(793, 0, '6020102003', '2', 0, '', '', 0, 0, 0, 'Potret Wanita (uk.69x49)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(794, 0, '6020102003', '3', 0, '', '', 0, 0, 0, 'Candi Borobudur dari Sektor Lain (uk.50x61)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(795, 0, '6020102003', '4', 0, '', '', 0, 0, 0, 'Potret Sumilah (uk.152x92)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(796, 0, '6020102003', '5', 0, '', '', 0, 0, 0, 'Sepasang Ayam Putih (uk.122x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(797, 0, '6020102003', '6', 0, '', '', 0, 0, 0, 'Beber (uk.98x110)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(798, 0, '6020102003', '7', 0, '', '', 0, 0, 0, 'Bunga Anggrek (uk.49x49)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(799, 0, '6020102003', '8', 0, '', '', 0, 0, 0, 'Jenderal Sudirman Ki Joko Wasis Mohliansa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(800, 0, '6020102003', '9', 0, '', '', 0, 0, 0, 'Kebun Teh (uk.61x91)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(801, 0, '6020102003', '10', 0, '', '', 0, 0, 0, 'Pemandangan/Perahu di sungai (45x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(802, 0, '6020102003', '11', 0, '', '', 0, 0, 0, 'Panen Dilereng Bukit (30x30 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(803, 0, '6020102003', '12', 0, '', '', 0, 0, 0, 'Pemandangan Gunung dan Sawah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(804, 0, '6020102003', '13', 0, '', '', 0, 0, 0, 'Pemandangan Tebing', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(805, 0, '6020102003', '14', 0, '', '', 0, 0, 0, 'Memancing didekat pura (30x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(806, 0, '6020102003', '15', 0, '', '', 0, 0, 0, '4 Burung (88x136 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(807, 0, '6020102003', '16', 0, '', '', 0, 0, 0, 'Pasar Tradisional (88x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(808, 0, '6020102003', '17', 0, '', '', 0, 0, 0, 'Wayang (106x257 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(809, 0, '6020102003', '18', 0, '', '', 0, 0, 0, 'Pemandangan didanau Sumbar (48x68 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(810, 0, '6020102003', '19', 0, '', '', 0, 0, 0, 'Pulang Membawa Hasil (60x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(811, 0, '6020102003', '20', 0, '', '', 0, 0, 0, 'Setiapurwaka', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(812, 0, '6020102003', '21', 0, '', '', 0, 0, 0, 'SBY', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(813, 0, '6020102003', '22', 0, '', '', 0, 0, 0, 'SBY', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(814, 0, '6020102003', '23', 0, '', '', 0, 0, 0, 'SBY', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(815, 0, '6020102003', '24', 0, '', '', 0, 0, 0, 'BUDIONO', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(816, 0, '6020102003', '25', 0, '', '', 0, 0, 0, 'Lettu Pier Tendean (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(817, 0, '6020102003', '26', 0, '', '', 0, 0, 0, 'Dr. Mawardi (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(818, 0, '6020102003', '27', 0, '', '', 0, 0, 0, 'Haji Fahrudin (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(819, 0, '6020102003', '28', 0, '', '', 0, 0, 0, 'Prof. Pringgodigdo (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(820, 0, '6020102003', '29', 0, '', '', 0, 0, 0, 'Sutan Syahrir (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(821, 0, '6020102003', '30', 0, '', '', 0, 0, 0, 'Letkol I Gusti Ngurah Rai (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(822, 0, '6020102003', '31', 0, '', '', 0, 0, 0, 'Mayjen TNI Soeprapto (CM.uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(823, 0, '6020102003', '32', 0, '', '', 0, 0, 0, 'Letkol Sugiono (CM.uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(824, 0, '6020102003', '33', 0, '', '', 0, 0, 0, 'Mayjen TNI MT Haryono (CM.uk 60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(825, 0, '6020102003', '34', 0, '', '', 0, 0, 0, 'Letjen TNI Basuki Rahmat (CM.uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(826, 0, '6020102003', '35', 0, '', '', 0, 0, 0, 'Dr. Setia BUDI (cm.UK60X45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(827, 0, '6020102003', '36', 0, '', '', 0, 0, 0, 'Komodor Yos Soedarso (CM.uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(828, 0, '6020102003', '37', 0, '', '', 0, 0, 0, 'S.A. Sangaji (CM.uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(829, 0, '6020102003', '38', 0, '', '', 0, 0, 0, 'Sukarjo Wiryopranoto (CM.uk 60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(830, 0, '6020102003', '39', 0, '', '', 0, 0, 0, 'Brigjen TNI DI Panjaitan (CM.uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(831, 0, '6020102003', '40', 0, '', '', 0, 0, 0, 'Mayjen TNI S. Parman (CM.uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(832, 0, '6020102003', '41', 0, '', '', 0, 0, 0, 'Pengeran Diponegoro (CM. uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(833, 0, '6020102003', '42', 0, '', '', 0, 0, 0, 'Sisingamangaraja (CM. uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(834, 0, '6020102003', '43', 0, '', '', 0, 0, 0, 'M. Husni Thamrin (uk.60x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(835, 0, '6020102003', '44', 0, '', '', 0, 0, 0, 'R.A. Kartini (uk.60x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(836, 0, '6020102003', '45', 0, '', '', 0, 0, 0, 'Imam Bonjol (uk.6075)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(837, 0, '6020102003', '46', 0, '', '', 0, 0, 0, 'KH. Agus Salim (uk.60x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(838, 0, '6020102003', '47', 0, '', '', 0, 0, 0, 'Kaliurang (88 x109 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(839, 0, '6020102003', '48', 0, '', '', 0, 0, 0, 'Wanita Telanjang (150 x 120 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(840, 0, '6020102003', '49', 0, '', '', 0, 0, 0, 'Menggaru Sawah Di Jawa (uk.100x270 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(841, 0, '6020102003', '50', 0, '', '', 0, 0, 0, 'Abstrak (68x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(842, 0, '6020102003', '51', 0, '', '', 0, 0, 0, 'Abstrak (64x63 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(843, 0, '6020102003', '52', 0, '', '', 0, 0, 0, 'Abstrak (57 x 78 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(844, 0, '6020102003', '53', 0, '', '', 0, 0, 0, 'Abstrak (51 x 55 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(845, 0, '6020102003', '54', 0, '', '', 0, 0, 0, 'Bangau di pematang sawah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(846, 0, '6020102003', '55', 0, '', '', 0, 0, 0, 'Bidaria I Nodora (43x32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(847, 0, '6020102003', '56', 0, '', '', 0, 0, 0, 'Bunga Kana Merah (60x48 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(848, 0, '6020102003', '57', 0, '', '', 0, 0, 0, 'Bunga Kuning dan Merah (47 x 57 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(849, 0, '6020102003', '58', 0, '', '', 0, 0, 0, 'Delapan Burung Walet dan Bunga (136 x 47 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(850, 0, '6020102003', '59', 0, '', '', 0, 0, 0, '4 Burung Di Atas Pohon - Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(851, 0, '6020102003', '60', 0, '', '', 0, 0, 0, 'Cak Gonde Dei Racin (uk.100x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(852, 0, '6020102003', '61', 0, '', '', 0, 0, 0, 'Pejuang (95x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(853, 0, '6020102003', '62', 0, '', '', 0, 0, 0, '2 Wanita Bali Mandi (64x50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(854, 0, '6020102003', '63', 0, '', '', 0, 0, 0, 'Penari Wanita (100x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(855, 0, '6020102003', '64', 0, '', '', 0, 0, 0, 'Siech Abdurrauf Syah Kuala (110x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(856, 0, '6020102003', '65', 0, '', '', 0, 0, 0, 'Pesawat Tempur (140x224 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(857, 0, '6020102003', '66', 0, '', '', 0, 0, 0, 'Mutiara (140x235 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(858, 0, '6020102003', '67', 0, '', '', 0, 0, 0, 'Pemandangan Kota (65x58 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(859, 0, '6020102003', '68', 0, '', '', 0, 0, 0, 'Gunung dan Sawah (120x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(860, 0, '6020102003', '69', 0, '', '', 0, 0, 0, '- (145x113 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(861, 0, '6020102003', '70', 0, '', '', 0, 0, 0, 'Potret Wanita (28x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(862, 0, '6020102003', '71', 0, '', '', 0, 0, 0, 'Ir Soekarno (110x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(863, 0, '6020102003', '72', 0, '', '', 0, 0, 0, 'Gara-gara gajah (39 x 52 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(864, 0, '6020102003', '73', 0, '', '', 0, 0, 0, 'Helmuth Kohl (68 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(865, 0, '6020102003', '74', 0, '', '', 0, 0, 0, 'Kereta Kencana (110 x 240 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(866, 0, '6020102003', '75', 0, '', '', 0, 0, 0, 'Mengarak Pengantin (88 x 187 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(867, 0, '6020102003', '76', 0, '', '', 0, 0, 0, 'Potret Seorang Wanita (64x64 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(868, 0, '6020102003', '77', 0, '', '', 0, 0, 0, 'Potret Megawati Soekarno Putri (145 x 87 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(869, 0, '6020102003', '78', 0, '', '', 0, 0, 0, 'Dua Ekor Angsa di atas Rumput (123 x 32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(870, 0, '6020102003', '79', 0, '', '', 0, 0, 0, 'Pohon Kaktus (132x32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(871, 0, '6020102003', '80', 0, '', '', 0, 0, 0, 'Rumah Diatas Bukit (58x63 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(872, 0, '6020102003', '81', 0, '', '', 0, 0, 0, 'Penari Bali (57x42 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(873, 0, '6020102003', '82', 0, '', '', 0, 0, 0, 'Cut Nyak Dien Srikandi Nasional (125x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(874, 0, '6020102003', '83', 0, '', '', 0, 0, 0, 'Pergiwo pergiwati (255x170 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(875, 0, '6020102003', '84', 0, '', '', 0, 0, 0, 'Pemandangan Lembah (98x197 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(876, 0, '6020102003', '85', 0, '', '', 0, 0, 0, 'Upacara pemakaman (85x105 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(877, 0, '6020102003', '86', 0, '', '', 0, 0, 0, 'Ayahanda (80x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(878, 0, '6020102003', '87', 0, '', '', 0, 0, 0, 'Berjualan Ikan (98x159 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(879, 0, '6020102003', '88', 0, '', '', 0, 0, 0, 'Wajah Jepang (14x8 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(880, 0, '6020102003', '89', 0, '', '', 0, 0, 0, 'Mengendong Anak (50 x 40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(881, 0, '6020102003', '90', 0, '', '', 0, 0, 0, 'Gatot Kaca dengan Anak-anak (255 x 170 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(882, 0, '6020102003', '91', 0, '', '', 0, 0, 0, 'Gajah Mada (125 x 100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(883, 0, '6020102003', '92', 0, '', '', 0, 0, 0, 'Teuku Cik Diktiro (120x90cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(884, 0, '6020102003', '93', 0, '', '', 0, 0, 0, 'Pangeran Diponegoro Memimpin Pertempuran', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(885, 0, '6020102003', '94', 0, '', '', 0, 0, 0, 'Imam Bonjol (120x90cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(886, 0, '6020102003', '95', 0, '', '', 0, 0, 0, 'Perkampungan di Bali (82x182cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(887, 0, '6020102003', '96', 0, '', '', 0, 0, 0, 'Pertunjukan Tari di Wilayah Borobudur (65x80cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(888, 0, '6020102003', '97', 0, '', '', 0, 0, 0, 'Istana Negara Tahun 1888 (18x24cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(889, 0, '6020102003', '98', 0, '', '', 0, 0, 0, 'Istana Merdeka Tahun 1888 (18x24cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(890, 0, '6020102003', '99', 0, '', '', 0, 0, 0, 'Pemandangan (168x255cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(891, 0, '6020102003', '100', 0, '', '', 0, 0, 0, 'Wanita Bali Menabur Bunga (124x85cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(892, 0, '6020102003', '101', 0, '', '', 0, 0, 0, 'Joged (88 x 67,5 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(893, 0, '6020102003', '102', 0, '', '', 0, 0, 0, 'Piagam Tanda Jasa  (50x65cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(894, 0, '6020102003', '103', 0, '', '', 0, 0, 0, 'Halimah Gadis Aceh (93x73 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(895, 0, '6020102003', '104', 0, '', '', 0, 0, 0, 'Ada Bunga Sepatu di Telinganya (45 x 32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(896, 0, '6020102003', '105', 0, '', '', 0, 0, 0, 'Tara (140 x 140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(897, 0, '6020102003', '106', 0, '', '', 0, 0, 0, 'Taman Sari (Yogyakarta) (70 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(898, 0, '6020102003', '107', 0, '', '', 0, 0, 0, 'Pelangi (rainbow) (59 x 86 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(899, 0, '6020102003', '108', 0, '', '', 0, 0, 0, 'MANTAN PRESIDEN SOE', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(900, 0, '6020102003', '109', 0, '', '', 0, 0, 0, 'ANI YUDHOYONO', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(901, 0, '6020102003', '110', 0, '', '', 0, 0, 0, 'HERAWATI BUDIONO', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(902, 0, '6020102003', '111', 0, '', '', 0, 0, 0, 'MANTAN PRESIDEN SOEKA', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(903, 0, '6020102003', '112', 0, '', '', 0, 0, 0, 'MANTAN PRESIDEN BJ.', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(904, 0, '6020102003', '113', 0, '', '', 0, 0, 0, 'MANTAN PRESIDEN KH', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(905, 0, '6020102003', '114', 0, '', '', 0, 0, 0, 'MANTAN PRESIDEN MEGA', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(906, 0, '6020102003', '115', 0, '', '', 0, 0, 0, 'PRESIDEN RI SUSILO BAMBA', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(907, 0, '6020102003', '116', 0, '', '', 0, 0, 0, 'PM Malaysia, Mahathir Muhammad (75 x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(908, 0, '6020102003', '117', 0, '', '', 0, 0, 0, 'PM Srilanka, R. Premadasa (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(909, 0, '6020102003', '118', 0, '', '', 0, 0, 0, 'Isteri PM Papua Nugini, Ny. Lady Chan (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(910, 0, '6020102003', '119', 0, '', '', 0, 0, 0, 'Isteri PM Malaysia,  Ny Mahathir Muhammad (75x60cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(911, 0, '6020102003', '120', 0, '', '', 0, 0, 0, 'Bebotoh Bali Pegang Ayam (45 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(912, 0, '6020102003', '121', 0, '', '', 0, 0, 0, 'Kaligrafi Al-Baqarah (80 x 120 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(913, 0, '6020102003', '122', 0, '', '', 0, 0, 0, 'Rembulan di atas Rumah (90 x 70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(914, 0, '6020102003', '123', 0, '', '', 0, 0, 0, 'Awan Berarak Jalan Bersimpang (164 x 122 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(915, 0, '6020102003', '124', 0, '', '', 0, 0, 0, 'Ngarai Sianouk (102 x 128 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(916, 0, '6020102003', '125', 0, '', '', 0, 0, 0, 'Pemandangan (66 x 78 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(917, 0, '6020102003', '126', 0, '', '', 0, 0, 0, 'Wanita Yogya (120 x 88 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(918, 0, '6020102003', '127', 0, '', '', 0, 0, 0, 'Ngarai Minangkabau (140 x 95 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(919, 0, '6020102003', '128', 0, '', '', 0, 0, 0, 'Jenderal Sudirman (164 x 122 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(920, 0, '6020102003', '129', 0, '', '', 0, 0, 0, 'Mengungsi (105 x 145 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(921, 0, '6020102003', '130', 0, '', '', 0, 0, 0, 'Pejuang Pantang Menyerah (137 x 300 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(922, 0, '6020102003', '131', 0, '', '', 0, 0, 0, 'Pemandangan Gunung dan Sawah (93 x 150 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(923, 0, '6020102003', '132', 0, '', '', 0, 0, 0, 'Pemandangan (79 x 141 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(924, 0, '6020102003', '133', 0, '', '', 0, 0, 0, 'Menunggu Hidangan (96 x 80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(925, 0, '6020102003', '134', 0, '', '', 0, 0, 0, 'Bunga Mawar (50 x 40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(926, 0, '6020102003', '135', 0, '', '', 0, 0, 0, 'Pelabuhan (57 x 82 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(927, 0, '6020102003', '136', 0, '', '', 0, 0, 0, 'PM Inggris, Margareth Thatcher (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(928, 0, '6020102003', '137', 0, '', '', 0, 0, 0, 'Istri PM Singapura, Ny Lee Kwan Yew (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(929, 0, '6020102003', '138', 0, '', '', 0, 0, 0, 'PM China, Li Peng (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(930, 0, '6020102003', '139', 0, '', '', 0, 0, 0, 'Istri PM China Ny Li Peng (75x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(931, 0, '6020102003', '140', 0, '', '', 0, 0, 0, 'PM. Prancis, F Mitterand (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(932, 0, '6020102003', '141', 0, '', '', 0, 0, 0, 'Istri PM Prancis, Ny F Mitterand (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(933, 0, '6020102003', '142', 0, '', '', 0, 0, 0, 'PM Kamboja, Norodom Sihanouk (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(934, 0, '6020102003', '143', 0, '', '', 0, 0, 0, 'Istri PM Kamboja, Ny Norodom Sihanouk (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(935, 0, '6020102003', '144', 0, '', '', 0, 0, 0, 'Pertempuran di Stasiun Tugu (80x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(936, 0, '6020102003', '145', 0, '', '', 0, 0, 0, 'Anggrek Putih (60x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(937, 0, '6020102003', '146', 0, '', '', 0, 0, 0, 'Pertunjukan Tari Baris', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(938, 0, '6020102003', '147', 0, '', '', 0, 0, 0, 'Pertunjukan Tari Baris', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(939, 0, '6020102003', '148', 0, '', '', 0, 0, 0, '4 Penari Bali', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(940, 0, '6020102003', '149', 0, '', '', 0, 0, 0, '3 Bangau Diatas Pohon (120x160 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(941, 0, '6020102003', '150', 0, '', '', 0, 0, 0, 'Kabut Pagi (40x75 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(942, 0, '6020102003', '151', 0, '', '', 0, 0, 0, 'Panen (60x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(943, 0, '6020102003', '152', 0, '', '', 0, 0, 0, 'Upacara Adat Bali (90x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(944, 0, '6020102003', '153', 0, '', '', 0, 0, 0, 'Sri Paduka Maha Raja (97x72 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(945, 0, '6020102003', '154', 0, '', '', 0, 0, 0, 'Membakti (60x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(946, 0, '6020102003', '155', 0, '', '', 0, 0, 0, 'Pasar Buah (78x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(947, 0, '6020102003', '156', 0, '', '', 0, 0, 0, 'Bermain di Halaman (54x64 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(948, 0, '6020102003', '157', 0, '', '', 0, 0, 0, 'Pemandangan Aalam Air Terjun (80x138 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(949, 0, '6020102003', '158', 0, '', '', 0, 0, 0, 'Kaligrafi Ayat Kursi (80x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(950, 0, '6020102003', '159', 0, '', '', 0, 0, 0, 'Kaligrafi Al Ikhlas (80x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(951, 0, '6020102003', '160', 0, '', '', 0, 0, 0, 'Panen Jagung (84x134 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(952, 0, '6020102003', '161', 0, '', '', 0, 0, 0, 'Padang dan Rusa (69x88 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(953, 0, '6020102003', '162', 0, '', '', 0, 0, 0, 'Kaligrafi Kalimat Sahadat (60x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(954, 0, '6020102003', '163', 0, '', '', 0, 0, 0, 'Kerang & Gurita (130x195 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(955, 0, '6020102003', '164', 0, '', '', 0, 0, 0, 'Upacara Adat Bali (80x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(956, 0, '6020102003', '165', 0, '', '', 0, 0, 0, 'Upacara Mengiring Pengantin Bali (80x130 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(957, 0, '6020102003', '166', 0, '', '', 0, 0, 0, '2 Burung & kupu diatas pohon bambu (80x45 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(958, 0, '6020102003', '167', 0, '', '', 0, 0, 0, 'Penculikan Dewi Shinta - Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(959, 0, '6020102003', '168', 0, '', '', 0, 0, 0, 'Panen Raya (99x198 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(960, 0, '6020102003', '169', 0, '', '', 0, 0, 0, 'Kaligrafi La Haula (70x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(961, 0, '6020102003', '170', 0, '', '', 0, 0, 0, 'Tari Kebyar (102x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(962, 0, '6020102003', '171', 0, '', '', 0, 0, 0, 'Pemandangan Gunung & Sawah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(963, 0, '6020102003', '172', 0, '', '', 0, 0, 0, 'Pertunjukan Tari Barong', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(964, 0, '6020102003', '173', 0, '', '', 0, 0, 0, 'LUKISAN PRESIDEN SOEKARNO (100X80 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(965, 0, '6020102003', '174', 0, '', '', 0, 0, 0, 'LUKISAN PRESIDEN SOEHARTO (100X80 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(966, 0, '6020102003', '175', 0, '', '', 0, 0, 0, 'LUKISAN PRESIDEN BJ HABIBIE (100X80 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(967, 0, '6020102003', '176', 0, '', '', 0, 0, 0, 'LUKISAN PRESIDEN GUSDUR (100X80 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(968, 0, '6020102003', '177', 0, '', '', 0, 0, 0, 'LUKISAN PRESIDEN MEGAWATI (100X80 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(969, 0, '6020102003', '178', 0, '', '', 0, 0, 0, 'LUKISAN PRESIDEN SBY (100X80 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(970, 0, '6020102003', '179', 0, '', '', 0, 0, 0, 'LUKISAN PRESIDEN DAN WAKIL', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(971, 0, '6020102003', '180', 0, '', '', 0, 0, 0, 'Danau Panjalu (120X200 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(972, 0, '6020102003', '181', 0, '', '', 0, 0, 0, 'Pantai (80X120 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(973, 0, '6020102003', '182', 0, '', '', 0, 0, 0, 'Panen Padi (100X150 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(974, 0, '6020102003', '183', 0, '', '', 0, 0, 0, 'Kopel Istana Jakarta (60 x 70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(975, 0, '6020102003', '184', 0, '', '', 0, 0, 0, 'Pantai Madura (125 x 200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(976, 0, '6020102003', '185', 0, '', '', 0, 0, 0, 'Pantai Samudera (130 x 215 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(977, 0, '6020102003', '186', 0, '', '', 0, 0, 0, 'Kapal Perang (110 x 180 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(978, 0, '6020102003', '187', 0, '', '', 0, 0, 0, 'Istana Merdeka (90 x 150 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(979, 0, '6020102003', '188', 0, '', '', 0, 0, 0, 'Penari Bali (97 x 80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(980, 0, '6020102003', '189', 0, '', '', 0, 0, 0, 'Flamboyan di Atas Sungai (60 x 90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(981, 0, '6020102003', '190', 0, '', '', 0, 0, 0, 'Masjid Merdeka (80 x 100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(982, 0, '6020102003', '191', 0, '', '', 0, 0, 0, 'Teratai (47 x 39 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(983, 0, '6020102003', '192', 0, '', '', 0, 0, 0, 'Mengarak Pengantin (70x120 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(984, 0, '6020102003', '193', 0, '', '', 0, 0, 0, 'Wanita Setengah Badan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(985, 0, '6020102003', '194', 0, '', '', 0, 0, 0, 'Ikan-Ikan (78x78 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(986, 0, '6020102003', '195', 0, '', '', 0, 0, 0, 'Pisang-Pisangan (102x186 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(987, 0, '6020102003', '196', 0, '', '', 0, 0, 0, 'Kaligrafi Basmalah (60x50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(988, 0, '6020102003', '197', 0, '', '', 0, 0, 0, 'Gambar Relief Dinding Candi (118x180 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(989, 0, '6020102003', '198', 0, '', '', 0, 0, 0, 'Bunga Anggrek Putih (70x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(990, 0, '6020102003', '199', 0, '', '', 0, 0, 0, 'Pisang-pisangan (102x186 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(991, 0, '6020102003', '200', 0, '', '', 0, 0, 0, 'Rasa Aman (94x94 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(992, 0, '6020102003', '201', 0, '', '', 0, 0, 0, 'Gerobak Sapi (89x143 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(993, 0, '6020102003', '202', 0, '', '', 0, 0, 0, 'Panen Padi (89x148 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(994, 0, '6020102003', '203', 0, '', '', 0, 0, 0, 'Buah-Buahan (88x118 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(995, 0, '6020102003', '204', 0, '', '', 0, 0, 0, 'Tari Topeng di Pura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(996, 0, '6020102003', '205', 0, '', '', 0, 0, 0, '3 Penari Bali', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(997, 0, '6020102003', '206', 0, '', '', 0, 0, 0, '2 bangau dan 2 gelatik di rawa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(998, 0, '6020102003', '207', 0, '', '', 0, 0, 0, '5 burung di pohon dan kembang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(999, 0, '6020102003', '208', 0, '', '', 0, 0, 0, 'Pangeran Philip (68 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1000, 0, '6020102003', '209', 0, '', '', 0, 0, 0, 'Pesta Adat di Bali (136 x 92 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1001, 0, '6020102003', '210', 0, '', '', 0, 0, 0, 'Ny. Helmuth Kohl (68 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1002, 0, '6020102003', '211', 0, '', '', 0, 0, 0, 'Pangeran Bernhart (74 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1003, 0, '6020102003', '212', 0, '', '', 0, 0, 0, 'PM. Kakuei Tanaka (70 x 51 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1004, 0, '6020102003', '213', 0, '', '', 0, 0, 0, 'PM. Selandia Baru (83 X 62 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1005, 0, '6020102003', '214', 0, '', '', 0, 0, 0, 'Prosopis Vidaliana (43 x 32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1006, 0, '6020102003', '215', 0, '', '', 0, 0, 0, 'Psidium Pumilum (43 x 32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1007, 0, '6020102003', '216', 0, '', '', 0, 0, 0, 'Raja Faisal (83 x 63 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1008, 0, '6020102003', '217', 0, '', '', 0, 0, 0, 'Ratu Elizabeth (68 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1009, 0, '6020102003', '218', 0, '', '', 0, 0, 0, 'Ratu Yuliana (74 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1010, 0, '6020102003', '219', 0, '', '', 0, 0, 0, 'Tiga Kuntum Bunga Merah (56 x 48 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1011, 0, '6020102003', '220', 0, '', '', 0, 0, 0, 'TN. Selandia Baru (Pria) ( 70 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1012, 0, '6020102003', '221', 0, '', '', 0, 0, 0, 'TN. Selandia Baru (Wanita) (70 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1013, 0, '6020102003', '222', 0, '', '', 0, 0, 0, 'Wanita (52 x 32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1014, 0, '6020102003', '223', 0, '', '', 0, 0, 0, 'Wanita (43 x 35 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1015, 0, '6020102003', '224', 0, '', '', 0, 0, 0, 'Wanita Telanjang Dada (100 x 70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1016, 0, '6020102003', '225', 0, '', '', 0, 0, 0, 'Tiga Penari Bali (50 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1017, 0, '6020102003', '226', 0, '', '', 0, 0, 0, 'Jendral Soeharto (70 x 55 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1018, 0, '6020102003', '227', 0, '', '', 0, 0, 0, 'Pasar Buah (80 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1019, 0, '6020102003', '228', 0, '', '', 0, 0, 0, 'Sekelompok Bebek Abu-abu (95 x 135 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1020, 0, '6020102003', '229', 0, '', '', 0, 0, 0, 'Wanita Membawa Kendi (60x35 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1021, 0, '6020102003', '230', 0, '', '', 0, 0, 0, 'Potret Anak (30x27 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1022, 0, '6020102003', '231', 0, '', '', 0, 0, 0, 'Guerilla Rakyat (115x66 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1023, 0, '6020102003', '232', 0, '', '', 0, 0, 0, 'Menjala Ikan (205x120 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1024, 0, '6020102003', '233', 0, '', '', 0, 0, 0, 'Bung Karno pd hari proklamasi (99x74 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1025, 0, '6020102003', '234', 0, '', '', 0, 0, 0, 'Penjual Buah (99x88 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1026, 0, '6020102003', '235', 0, '', '', 0, 0, 0, 'Sungai Kapuas (49 x 34 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1027, 0, '6020102003', '236', 0, '', '', 0, 0, 0, 'Empat Burung Jala Di Atas Pohon Kelapa (100 x 200', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1028, 0, '6020102003', '237', 0, '', '', 0, 0, 0, 'Dua Burung dan Pohon Rambutan (46x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1029, 0, '6020102003', '238', 0, '', '', 0, 0, 0, 'Bunga Kenangan (180x230 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1030, 0, '6020102003', '239', 0, '', '', 0, 0, 0, 'Panen Bali (100x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1031, 0, '6020102003', '240', 0, '', '', 0, 0, 0, 'Telaga Warna (65 x 90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1032, 0, '6020102003', '241', 0, '', '', 0, 0, 0, 'Dua Gadis Bali (89 x 65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1033, 0, '6020102003', '242', 0, '', '', 0, 0, 0, 'Pengembala Kerbau (120 x 200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1034, 0, '6020102003', '243', 0, '', '', 0, 0, 0, 'Model Wanita (39 x 33 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1035, 0, '6020102003', '244', 0, '', '', 0, 0, 0, 'Bunga Mawar Putih (65 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1036, 0, '6020102003', '245', 0, '', '', 0, 0, 0, 'Sewaktu di yogya (90 x 126 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1037, 0, '6020102003', '246', 0, '', '', 0, 0, 0, 'Pesisir (94 x 168 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1038, 0, '6020102003', '247', 0, '', '', 0, 0, 0, 'Tarian Muang Thai (121 x 80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1039, 0, '6020102003', '248', 0, '', '', 0, 0, 0, 'Ni Made Koppor (93 x 43 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1040, 0, '6020102003', '249', 0, '', '', 0, 0, 0, 'Wanita Sulawesi / Berbaju Hijau (119 x 81 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1041, 0, '6020102003', '250', 0, '', '', 0, 0, 0, 'Pantai Flores (120  x 185 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1042, 0, '6020102003', '251', 0, '', '', 0, 0, 0, 'Berhias (40 x 32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1043, 0, '6020102003', '252', 0, '', '', 0, 0, 0, 'Tari Pendet (90 x 65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1044, 0, '6020102003', '253', 0, '', '', 0, 0, 0, 'Alat Musik (85 x 102 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1045, 0, '6020102003', '254', 0, '', '', 0, 0, 0, 'Lingkungan Alam Laut (65 x 48 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1046, 0, '6020102003', '255', 0, '', '', 0, 0, 0, 'Mendaki Gunung (50 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1047, 0, '6020102003', '256', 0, '', '', 0, 0, 0, 'Ni Najas (58 x 42 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1048, 0, '6020102003', '257', 0, '', '', 0, 0, 0, 'Gadis Remaja (50 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1049, 0, '6020102003', '258', 0, '', '', 0, 0, 0, 'Pemandangan (90 x 125 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1050, 0, '6020102003', '259', 0, '', '', 0, 0, 0, 'Laut Nan Damai (80 x 120 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1051, 0, '6020102003', '260', 0, '', '', 0, 0, 0, 'Air Pasang (100 x 150 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1052, 0, '6020102003', '261', 0, '', '', 0, 0, 0, 'Pohon-pohon di Kebun (130 x 176 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1053, 0, '6020102003', '262', 0, '', '', 0, 0, 0, 'Empat Gadis Bali dengan Sajen (89 x 69 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1054, 0, '6020102003', '263', 0, '', '', 0, 0, 0, 'Menanam Padi (148X92 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1055, 0, '6020102003', '264', 0, '', '', 0, 0, 0, 'Di Sungai ciliwung (59 x 77 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1056, 0, '6020102003', '265', 0, '', '', 0, 0, 0, 'Dua Kepala Kerbau (55 x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1057, 0, '6020102003', '266', 0, '', '', 0, 0, 0, 'Wajah Seorang Lelaki Bali (51 x 42 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1058, 0, '6020102003', '267', 0, '', '', 0, 0, 0, 'Mencari Kutu rambut (120 x 88 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1059, 0, '6020102003', '268', 0, '', '', 0, 0, 0, 'Bunga Anggrek (85 x 71 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1060, 0, '6020102003', '269', 0, '', '', 0, 0, 0, 'Topeng-topeng (85 x 65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1061, 0, '6020102003', '270', 0, '', '', 0, 0, 0, 'Kawanan Bangau (70 x 52 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1062, 0, '6020102003', '271', 0, '', '', 0, 0, 0, 'Alam Sumatera 1999 (30 x 40 cm )', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1063, 0, '6020102003', '272', 0, '', '', 0, 0, 0, 'Tari Barong (55x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1064, 0, '6020102003', '273', 0, '', '', 0, 0, 0, 'Tari Jauk (85x56 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1065, 0, '6020102003', '274', 0, '', '', 0, 0, 0, 'Lima Jalak Bali (100x145 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1066, 0, '6020102003', '275', 0, '', '', 0, 0, 0, 'Barang dan Hanoman (34x29 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1067, 0, '6020102003', '276', 0, '', '', 0, 0, 0, 'Perahu Naga (100x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1068, 0, '6020102003', '277', 0, '', '', 0, 0, 0, 'Lima burung gelatik di pohon kelapa (50x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1069, 0, '6020102003', '278', 0, '', '', 0, 0, 0, 'kambing dan anaknya (70x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1070, 0, '6020102003', '279', 0, '', '', 0, 0, 0, 'Saraswati (40x31 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1071, 0, '6020102003', '280', 0, '', '', 0, 0, 0, 'Sekelompok Kuda (100x175 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1072, 0, '6020102003', '281', 0, '', '', 0, 0, 0, 'Bangau dan 3 bebek di rawa (63x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1073, 0, '6020102003', '282', 0, '', '', 0, 0, 0, '3 Burung diatas pohon asam (50x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1074, 0, '6020102003', '283', 0, '', '', 0, 0, 0, 'Kaligrafi Doa Subuh VIII (70X50 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1075, 0, '6020102003', '284', 0, '', '', 0, 0, 0, 'Al Fatihah (74x46 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1076, 0, '6020102003', '285', 0, '', '', 0, 0, 0, '2 Kelompok Bebek Bali (100x147 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1077, 0, '6020102003', '286', 0, '', '', 0, 0, 0, '3 Burung di atas lotus (90x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1078, 0, '6020102003', '287', 0, '', '', 0, 0, 0, '4 Burung diatas bunga sepatu (91x122 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1079, 0, '6020102003', '288', 0, '', '', 0, 0, 0, '8 Burung diatas pohon (132x186 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1080, 0, '6020102003', '289', 0, '', '', 0, 0, 0, 'Istirahat (89x69 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1081, 0, '6020102003', '290', 0, '', '', 0, 0, 0, '4 Burung bangau diatas pohon kelapa (81x100cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1082, 0, '6020102003', '291', 0, '', '', 0, 0, 0, '3 Burung Merak (180x230 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1083, 0, '6020102003', '292', 0, '', '', 0, 0, 0, 'Rumah Nelayan (70x50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1084, 0, '6020102003', '293', 0, '', '', 0, 0, 0, '4 Burung (85x134 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1085, 0, '6020102003', '294', 0, '', '', 0, 0, 0, 'Presiden Amrik Ronald Reagen (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1086, 0, '6020102003', '295', 0, '', '', 0, 0, 0, 'Istri Presiden Amrik Nancy Reagen (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1087, 0, '6020102003', '296', 0, '', '', 0, 0, 0, 'PM India (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1088, 0, '6020102003', '297', 0, '', '', 0, 0, 0, 'Istri PM India (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1089, 0, '6020102003', '298', 0, '', '', 0, 0, 0, 'Raja Belgia, Boudewijn (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1090, 0, '6020102003', '299', 0, '', '', 0, 0, 0, 'Ratu Belgia,Ny Boudewijn (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1091, 0, '6020102003', '300', 0, '', '', 0, 0, 0, 'PM. Papua Nugini,Michael Somare (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1092, 0, '6020102003', '301', 0, '', '', 0, 0, 0, 'Ny Michael Somare (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1093, 0, '6020102003', '302', 0, '', '', 0, 0, 0, 'PM Australia I (70X50 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1094, 0, '6020102003', '303', 0, '', '', 0, 0, 0, 'Istri PM Australia I (75X60 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1095, 0, '6020102003', '304', 0, '', '', 0, 0, 0, 'Lukisan Presiden RI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1096, 0, '6020102003', '305', 0, '', '', 0, 0, 0, 'Kasetpres Winata Supriatna', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1097, 0, '6020102003', '306', 0, '', '', 0, 0, 0, 'Kasetpres Nanang Djuana', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1098, 0, '6020102003', '307', 0, '', '', 0, 0, 0, 'Danau Toba (repro) 90 x 275', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1099, 0, '6020102003', '308', 0, '', '', 0, 0, 0, 'Laut & Gunung repro 120x180', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1100, 0, '6020102003', '309', 0, '', '', 0, 0, 0, 'Bunga Flamboyan 110x180', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1101, 0, '6020102003', '310', 0, '', '', 0, 0, 0, 'Pemandangan & Rumah Joglo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1102, 0, '6020102003', '311', 0, '', '', 0, 0, 0, 'Kapal Layar (Berlayar Ke Istana)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1103, 0, '6020102003', '312', 0, '', '', 0, 0, 0, 'Gembala Sapi (40x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1104, 0, '6020102003', '313', 0, '', '', 0, 0, 0, 'Anak2 Naik Perahu (40x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1105, 0, '6020102003', '314', 0, '', '', 0, 0, 0, 'Bunga Baugenville Putih  (100x150 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1106, 0, '6020102003', '315', 0, '', '', 0, 0, 0, 'Penghalau Burung', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1107, 0, '6020102003', '316', 0, '', '', 0, 0, 0, 'Bekerja Keras (80 x 59 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1108, 0, '6020102003', '317', 0, '', '', 0, 0, 0, 'Menikmati Kicau Burung (89 x 68 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1109, 0, '6020102003', '318', 0, '', '', 0, 0, 0, 'Belakang Rumah (130x85 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1110, 0, '6020102003', '319', 0, '', '', 0, 0, 0, 'Nuansa Helliconia (75,5x56 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1111, 0, '6020102003', '320', 0, '', '', 0, 0, 0, 'Menari didepan pura (120x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1112, 0, '6020102003', '321', 0, '', '', 0, 0, 0, '8 Burung nuri diatas daun (135x250 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1113, 0, '6020102003', '322', 0, '', '', 0, 0, 0, 'Kawanan bangau mencari makan (70x130 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1114, 0, '6020102003', '323', 0, '', '', 0, 0, 0, 'Keluarga Terwelu (43x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1115, 0, '6020102003', '324', 0, '', '', 0, 0, 0, '4 Burung pipit diatas dahan (60x45 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1116, 0, '6020102003', '325', 0, '', '', 0, 0, 0, 'Tari Barong (uk.99x118)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1117, 0, '6020102003', '326', 0, '', '', 0, 0, 0, 'Gerobak Sapi ditepi Sawah (uk.100x2000', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1118, 0, '6020102003', '327', 0, '', '', 0, 0, 0, 'Perahu-Perahu (uk.69x88)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1119, 0, '6020102003', '328', 0, '', '', 0, 0, 0, 'Pasar Burung (uk.69x49)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1120, 0, '6020102003', '329', 0, '', '', 0, 0, 0, 'Bunga (uk.79x59)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1121, 0, '6020102003', '330', 0, '', '', 0, 0, 0, 'Dalam Penggembalaan Yesus (uk.80x80)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1122, 0, '6020102003', '331', 0, '', '', 0, 0, 0, 'Wanita Pegang Bunga Mawar (uk.86x66)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1123, 0, '6020102003', '332', 0, '', '', 0, 0, 0, 'Lautan Jenazah (uk.222x450)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1124, 0, '6020102003', '333', 0, '', '', 0, 0, 0, 'Kaligrafi Allah (uk.68x78)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1125, 0, '6020102003', '334', 0, '', '', 0, 0, 0, 'Kaligrafi Muhammad (uk.68x78)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1126, 0, '6020102003', '335', 0, '', '', 0, 0, 0, 'Penari Sriwijaya (uk.88x59)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1127, 0, '6020102003', '336', 0, '', '', 0, 0, 0, 'Penari Bali Magis (uk.132x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1128, 0, '6020102003', '337', 0, '', '', 0, 0, 0, 'Pemandangan Bawah Laut (uk.80x100)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1129, 0, '6020102003', '338', 0, '', '', 0, 0, 0, 'Dua Ekor Ikan Arwana (uk.50x50)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1130, 0, '6020102003', '339', 0, '', '', 0, 0, 0, 'Bunga Teratai (uk.45x45) ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1131, 0, '6020102003', '340', 0, '', '', 0, 0, 0, 'Wanita (uk.49x49)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1132, 0, '6020102003', '341', 0, '', '', 0, 0, 0, 'Soeharto (uk.107x87)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1133, 0, '6020102003', '342', 0, '', '', 0, 0, 0, 'Bunga Anggrek Putih (uk.45x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1134, 0, '6020102003', '343', 0, '', '', 0, 0, 0, 'Mayjen TNI Soehardjo Hardjowardo (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1135, 0, '6020102003', '344', 0, '', '', 0, 0, 0, 'Brigjen TNI Soetikno L,BC,HK (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1136, 0, '6020102003', '345', 0, '', '', 0, 0, 0, 'Brigjen TNI Soesidarto (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1137, 0, '6020102003', '346', 0, '', '', 0, 0, 0, 'Brigjen TNI Sampurno, SH (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1138, 0, '6020102003', '347', 0, '', '', 0, 0, 0, 'M. Maftuh Basyuni (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1139, 0, '6020102003', '348', 0, '', '', 0, 0, 0, 'Lukisan Bunga Sepatu Karya K. John 80 x 60 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1140, 0, '6020102003', '349', 0, '', '', 0, 0, 0, 'Lukisan Presiden RI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1141, 0, '6020102003', '350', 0, '', '', 0, 0, 0, 'Lukisan Istri Presiden RI', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1142, 0, '6020102003', '351', 0, '', '', 0, 0, 0, 'Penangkapan Diponegoro (114 x 178 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1143, 0, '6020102003', '352', 0, '', '', 0, 0, 0, 'Lukisan Mengungsi Karya S. Sudjojono 100 x 180 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1144, 0, '6020102003', '353', 0, '', '', 0, 0, 0, 'Lukisan Perjuangan di waktu senja karya S. Sudjojo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1145, 0, '6020102003', '354', 0, '', '', 0, 0, 0, 'Lukisan Bunga Anggrek Karya Lugiono 85 x 71 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1146, 0, '6020102003', '355', 0, '', '', 0, 0, 0, 'Lukisan Laut Nan Damai Karya Basoeki Abdullah 70 x', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1147, 0, '6020102003', '356', 0, '', '', 0, 0, 0, 'Lukisan Pemandangan Gunung dan Perkampungan Karya', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1148, 0, '6020102003', '357', 0, '', '', 0, 0, 0, 'Lukisan Kawan-kawan Revolusi Karya S.Sudjojono 110', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1149, 0, '6020102003', '358', 0, '', '', 0, 0, 0, 'Lukisan Kebun Istana Presiden Sukarno sewaktu di Y', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1150, 0, '6020102003', '359', 0, '', '', 0, 0, 0, 'Lukisan Lpus dan Kupu-Kupu Karya Robby L 60 x 40 c', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1151, 0, '6020102003', '360', 0, '', '', 0, 0, 0, 'Lukisan Kebun Tea Karya Yap Hian Tjya 50 x 50 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1152, 0, '6020102003', '361', 0, '', '', 0, 0, 0, 'Lukisan Kebun Tea Karya Yap Hian Tjya 50 x 50 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1153, 0, '6020102003', '362', 0, '', '', 0, 0, 0, 'Abdul Mudjib Manan (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1154, 0, '6020102003', '363', 0, '', '', 0, 0, 0, 'Kemal Munawar, SH (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1155, 0, '6020102003', '364', 0, '', '', 0, 0, 0, 'Ratih Hardjono (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1156, 0, '6020102003', '365', 0, '', '', 0, 0, 0, 'Djoko Mulyono (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1157, 0, '6020102003', '366', 0, '', '', 0, 0, 0, 'Kemal Munawar, SH (uk.54x44)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1158, 0, '6020102003', '367', 0, '', '', 0, 0, 0, 'Penari Palembang/Menyambeak (uk.125x90)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(1159, 0, '6020102003', '368', 0, '', '', 0, 0, 0, '7 Bebek/Pitulungan (uk.120x150)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1160, 0, '6020102003', '369', 0, '', '', 0, 0, 0, 'Bermain Layang-Layang (uk.90x70)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1161, 0, '6020102003', '370', 0, '', '', 0, 0, 0, 'Sepasang Remaja (uk. 70x70)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1162, 0, '6020102003', '371', 0, '', '', 0, 0, 0, 'H.M. Soeharto (uk.157x118)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1163, 0, '6020102003', '372', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto (uk.132x100)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1164, 0, '6020102003', '373', 0, '', '', 0, 0, 0, 'Susilo Bambang Yudhoyono (uk.55x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1165, 0, '6020102003', '374', 0, '', '', 0, 0, 0, 'Susilo Bambang Yudhoyono (uk.55x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1166, 0, '6020102003', '375', 0, '', '', 0, 0, 0, 'Kaligrafi Al Qashash Ayat 88 (uk.74x74)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1167, 0, '6020102003', '376', 0, '', '', 0, 0, 0, 'Pantai Karang (uk.71x117)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1168, 0, '6020102003', '377', 0, '', '', 0, 0, 0, 'Gunung Bromo (uk.48x80)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1169, 0, '6020102003', '378', 0, '', '', 0, 0, 0, 'Abstrak (uk.99x119)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1170, 0, '6020102003', '379', 0, '', '', 0, 0, 0, 'Pemandangan Kerbau (uk.78x90)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1171, 0, '6020102003', '380', 0, '', '', 0, 0, 0, 'Membakar Jagung (uk.78x97)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1172, 0, '6020102003', '381', 0, '', '', 0, 0, 0, 'Adu Jangkrik (uk.78x98)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1173, 0, '6020102003', '382', 0, '', '', 0, 0, 0, 'Pasar Burung (uk.100x78)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1174, 0, '6020102003', '383', 0, '', '', 0, 0, 0, 'Pasar Bunga (uk.80x120)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1175, 0, '6020102003', '384', 0, '', '', 0, 0, 0, 'Pangeran Pattimura (uk,60x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1176, 0, '6020102003', '385', 0, '', '', 0, 0, 0, 'Teuku Cik Ditiro (uk. 60x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1177, 0, '6020102003', '386', 0, '', '', 0, 0, 0, 'dr. Soetomo (uk.60x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1178, 0, '6020102003', '387', 0, '', '', 0, 0, 0, 'Cut Nyak Dien (uk.60x75)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1179, 0, '6020102003', '388', 0, '', '', 0, 0, 0, 'Ibu Mufidah Jusuf Kalla', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1180, 0, '6020102003', '389', 0, '', '', 0, 0, 0, 'Ibu Ani Bambang Yudhoyono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1181, 0, '6020102003', '390', 0, '', '', 0, 0, 0, 'Prof Dr. Kusuma Atmaja (Uk 60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1182, 0, '6020102003', '391', 0, '', '', 0, 0, 0, 'Sawah (serie guanipa Anaco) 84x115 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1183, 0, '6020102003', '392', 0, '', '', 0, 0, 0, 'Pemula (100x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1184, 0, '6020102003', '393', 0, '', '', 0, 0, 0, 'Tarian Irian Jaya II (96X72 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1185, 0, '6020102003', '394', 0, '', '', 0, 0, 0, 'Tarian Irian Jaya I (94X72 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1186, 0, '6020102003', '395', 0, '', '', 0, 0, 0, 'Sungai Dalam Hutan (115x85 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1187, 0, '6020102003', '396', 0, '', '', 0, 0, 0, '5 Burung diatas daun (132x101 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1188, 0, '6020102003', '397', 0, '', '', 0, 0, 0, '3 Burung diatas bunga sepatu (45x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1189, 0, '6020102003', '398', 0, '', '', 0, 0, 0, '4 Orang (54x54 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1190, 0, '6020102003', '399', 0, '', '', 0, 0, 0, '2 Burung diatas bunga kana (60x45 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1191, 0, '6020102003', '400', 0, '', '', 0, 0, 0, 'Pengantin (45x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1192, 0, '6020102003', '401', 0, '', '', 0, 0, 0, 'Pemandangan gunung & danau (139x260 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1193, 0, '6020102003', '402', 0, '', '', 0, 0, 0, 'Pemandangan gunung & danau (139x260 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1194, 0, '6020102003', '403', 0, '', '', 0, 0, 0, 'Naik Burung Merak (95x147 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1195, 0, '6020102003', '404', 0, '', '', 0, 0, 0, 'Tari Barong di Depan Pura (62x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1196, 0, '6020102003', '405', 0, '', '', 0, 0, 0, 'Merahku Ruanganku (50x50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1197, 0, '6020102003', '406', 0, '', '', 0, 0, 0, 'Kegiatan Masyarakat Bali (140x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1198, 0, '6020102003', '407', 0, '', '', 0, 0, 0, 'Candi Prambanan (140x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1199, 0, '6020102003', '408', 0, '', '', 0, 0, 0, 'Candi Borobudur Mudjlono D (140x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1200, 0, '6020102003', '409', 0, '', '', 0, 0, 0, 'Kaligrafi Sahadat (70x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1201, 0, '6020102003', '410', 0, '', '', 0, 0, 0, '2 gadis memakai caping', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1202, 0, '6020102003', '411', 0, '', '', 0, 0, 0, 'Barong (89x89 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1203, 0, '6020102003', '412', 0, '', '', 0, 0, 0, 'Perahu di Danau (50 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1204, 0, '6020102003', '413', 0, '', '', 0, 0, 0, 'Dua Burung (86 x 70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1205, 0, '6020102003', '414', 0, '', '', 0, 0, 0, 'Doa Subuh VIII (70 x 51 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1206, 0, '6020102003', '415', 0, '', '', 0, 0, 0, 'Orang Tua Merokok (60 x 45 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1207, 0, '6020102003', '416', 0, '', '', 0, 0, 0, 'Sang Waktu (25 x 30 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1208, 0, '6020102003', '417', 0, '', '', 0, 0, 0, 'Keadaan di Bali ( 70 x 65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1209, 0, '6020102003', '418', 0, '', '', 0, 0, 0, 'Pemandangan Gunung dan Perkampungan (80x128cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1210, 0, '6020102003', '419', 0, '', '', 0, 0, 0, 'Bunga Mawar (76 x 101 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1211, 0, '6020102003', '420', 0, '', '', 0, 0, 0, 'Ipus dan kupu-kupu (70 x59 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1212, 0, '6020102003', '421', 0, '', '', 0, 0, 0, 'Pasukan Perang Kerajaan (135 x245 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1213, 0, '6020102003', '422', 0, '', '', 0, 0, 0, 'Jenderal Sudirman (77X58,5)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1214, 0, '6020102003', '423', 0, '', '', 0, 0, 0, 'Dr. Cipto Mangunkusumo (121 x 90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1215, 0, '6020102003', '424', 0, '', '', 0, 0, 0, 'Potret Ir. Soekarno (208 x 147 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1216, 0, '6020102003', '425', 0, '', '', 0, 0, 0, 'panen padi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1217, 0, '6020102003', '426', 0, '', '', 0, 0, 0, '2 bangau di rawa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1218, 0, '6020102003', '427', 0, '', '', 0, 0, 0, 'Wanita Jepang (63x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1219, 0, '6020102003', '428', 0, '', '', 0, 0, 0, 'Panen padi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1220, 0, '6020102003', '429', 0, '', '', 0, 0, 0, 'Dewi Saraswati dan gitar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1221, 0, '6020102003', '430', 0, '', '', 0, 0, 0, 'Dua Burung Diatas Pohon Pisang (130 x 85 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1222, 0, '6020102003', '431', 0, '', '', 0, 0, 0, 'Masyarakat Bali (60 x 80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1223, 0, '6020102003', '432', 0, '', '', 0, 0, 0, 'Tiga Burung di Kebon Jagung', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1224, 0, '6020102003', '433', 0, '', '', 0, 0, 0, 'Sinta Hilang (95 X 70 CM)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1225, 0, '6020102003', '434', 0, '', '', 0, 0, 0, 'Tiga Burung Diatas Daun', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1226, 0, '6020102003', '435', 0, '', '', 0, 0, 0, 'Penari Bali (90 x 65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1227, 0, '6020102003', '436', 0, '', '', 0, 0, 0, 'Upacara Di Pura (80 x 33 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1228, 0, '6020102003', '437', 0, '', '', 0, 0, 0, 'Senja di Dataran Mahat (55 x 80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1229, 0, '6020102003', '438', 0, '', '', 0, 0, 0, 'Penggilingan Padi (91 x 65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1230, 0, '6020102003', '439', 0, '', '', 0, 0, 0, 'Penari Bali (100 x 68 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1231, 0, '6020102003', '440', 0, '', '', 0, 0, 0, 'Membajak Sawah (51 x 61 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1232, 0, '6020102003', '441', 0, '', '', 0, 0, 0, 'Pohon Flamboyan (59 x 48 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1233, 0, '6020102003', '442', 0, '', '', 0, 0, 0, 'Mercusuar (111x 180cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1234, 0, '6020102003', '443', 0, '', '', 0, 0, 0, 'Pasar Gede Solo (39 x 58 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1235, 0, '6020102003', '444', 0, '', '', 0, 0, 0, 'Air Terjun (30 x 40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1236, 0, '6020102003', '445', 0, '', '', 0, 0, 0, 'Rangkaian Bunga (80 x 140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1237, 0, '6020102003', '446', 0, '', '', 0, 0, 0, 'Tiga Bangau dan Dua Gelatik (79 x 139 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1238, 0, '6020102003', '447', 0, '', '', 0, 0, 0, 'komposisi Al-ankabut (100x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1239, 0, '6020102003', '448', 0, '', '', 0, 0, 0, 'Kaligrafi Al Ikhlas (100x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1240, 0, '6020102003', '449', 0, '', '', 0, 0, 0, 'Kaligrafi (80x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1241, 0, '6020102003', '450', 0, '', '', 0, 0, 0, 'dua burung (60x50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1242, 0, '6020102003', '451', 0, '', '', 0, 0, 0, 'Tiga burung diatas pohon (65x45 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1243, 0, '6020102003', '452', 0, '', '', 0, 0, 0, 'Upacara Adat (90x136 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1244, 0, '6020102003', '453', 0, '', '', 0, 0, 0, 'Kelelawar (90x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1245, 0, '6020102003', '454', 0, '', '', 0, 0, 0, 'PM. India, Indira Gandhi (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1246, 0, '6020102003', '455', 0, '', '', 0, 0, 0, 'TN. Thailand I (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1247, 0, '6020102003', '456', 0, '', '', 0, 0, 0, 'TN Australia II (70X50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1248, 0, '6020102003', '457', 0, '', '', 0, 0, 0, 'Istri PM Australia II ( 75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1249, 0, '6020102003', '458', 0, '', '', 0, 0, 0, 'TN. Thailand II', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1250, 0, '6020102003', '459', 0, '', '', 0, 0, 0, 'PM. Vietnam , Pham Van Dong (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1251, 0, '6020102003', '460', 0, '', '', 0, 0, 0, 'TN. Thailand III (Pria) (70 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1252, 0, '6020102003', '461', 0, '', '', 0, 0, 0, 'TN. Thailand III (Wanita)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1253, 0, '6020102003', '462', 0, '', '', 0, 0, 0, 'PM Jepang, Takeo Fukuda (70 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1254, 0, '6020102003', '463', 0, '', '', 0, 0, 0, 'Sepasang Penari di Pura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1255, 0, '6020102003', '464', 0, '', '', 0, 0, 0, 'Bala Tentara Istirahat di Hutan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1256, 0, '6020102003', '465', 0, '', '', 0, 0, 0, 'Gembala Sapi di Hutan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1257, 0, '6020102003', '466', 0, '', '', 0, 0, 0, 'Wanita Penari Merak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1258, 0, '6020102003', '467', 0, '', '', 0, 0, 0, '3 Burung Kakatua putih diatas daun (80x125 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1259, 0, '6020102003', '468', 0, '', '', 0, 0, 0, '5 Burung diatas bunga pisang-pisangan (110x190 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1260, 0, '6020102003', '469', 0, '', '', 0, 0, 0, 'Buah Delima dalam vas (115x85 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1261, 0, '6020102003', '470', 0, '', '', 0, 0, 0, '4 burung bangau diatas phn (45x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1262, 0, '6020102003', '471', 0, '', '', 0, 0, 0, 'Pasar tradisional', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1263, 0, '6020102003', '472', 0, '', '', 0, 0, 0, 'Naik Burung Merak (95x147 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1264, 0, '6020102003', '473', 0, '', '', 0, 0, 0, '3 Burung diatas daun pisang (45x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1265, 0, '6020102003', '474', 0, '', '', 0, 0, 0, '4 Burung diatas daun (90x130 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1266, 0, '6020102003', '475', 0, '', '', 0, 0, 0, 'Bunga Anggrek (93x133 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1267, 0, '6020102003', '476', 0, '', '', 0, 0, 0, 'Menatap duka zaman', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1268, 0, '6020102003', '477', 0, '', '', 0, 0, 0, 'Horizon (60x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1269, 0, '6020102003', '478', 0, '', '', 0, 0, 0, 'Merangkai Sesaji (78x58 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1270, 0, '6020102003', '479', 0, '', '', 0, 0, 0, 'Burung-Burung (90x110 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1271, 0, '6020102003', '480', 0, '', '', 0, 0, 0, 'Kaligrafi Surat Al Fatihah (Pelukis:Hatta Hambalih),', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1272, 0, '6020102003', '481', 0, '', '', 0, 0, 0, 'Pasar Buah (90x133 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1273, 0, '6020102003', '482', 0, '', '', 0, 0, 0, 'Landscape Bali (75x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1274, 0, '6020102003', '483', 0, '', '', 0, 0, 0, 'Membawa Saji (59x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1275, 0, '6020102003', '484', 0, '', '', 0, 0, 0, 'Reproduksi Jalan Di Tepi Sawah (120x180 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1276, 0, '6020102003', '485', 0, '', '', 0, 0, 0, 'Kawanan Bangau disawah (115x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1277, 0, '6020102003', '486', 0, '', '', 0, 0, 0, 'Bunga Sepatu (39x59 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1278, 0, '6020102003', '487', 0, '', '', 0, 0, 0, 'Tari Leak (80x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1279, 0, '6020102003', '488', 0, '', '', 0, 0, 0, 'Bunga Anggrek (80x67 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1280, 0, '6020102003', '489', 0, '', '', 0, 0, 0, 'Pasar Buah (85x135 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1281, 0, '6020102003', '490', 0, '', '', 0, 0, 0, 'Masyarakat Madura (80x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1282, 0, '6020102003', '491', 0, '', '', 0, 0, 0, 'Bunga Sepatu (45x45 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1283, 0, '6020102003', '492', 0, '', '', 0, 0, 0, 'Jenderal Sudirman (90 x 80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1284, 0, '6020102003', '493', 0, '', '', 0, 0, 0, 'Gerobak Sapi (61 x 81 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1285, 0, '6020102003', '494', 0, '', '', 0, 0, 0, 'Kehujanan (60 x 49 cm )', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1286, 0, '6020102003', '495', 0, '', '', 0, 0, 0, 'Adu Ayam (43 x 59 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1287, 0, '6020102003', '496', 0, '', '', 0, 0, 0, 'Menyongsong Fajar (220 x 460 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1288, 0, '6020102003', '497', 0, '', '', 0, 0, 0, 'Tentara Sultan Agung Mataram (90 x 90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1289, 0, '6020102003', '498', 0, '', '', 0, 0, 0, 'Dua Burung Jalak (86 x 129 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1290, 0, '6020102003', '499', 0, '', '', 0, 0, 0, 'Tiga Orang Di Bawah Pohon (47 x 32 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1291, 0, '6020102003', '500', 0, '', '', 0, 0, 0, 'Tiga Vas Bunga (59 x 24 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1292, 0, '6020102003', '501', 0, '', '', 0, 0, 0, 'Bunga Dalam Vas (45 x53 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1293, 0, '6020102003', '502', 0, '', '', 0, 0, 0, 'Ayam dengan tiga Anaknya (60 x 75 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1294, 0, '6020102003', '503', 0, '', '', 0, 0, 0, 'Peta Batavia (26x36 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1295, 0, '6020102003', '504', 0, '', '', 0, 0, 0, 'Menjangan Istana Bogor (70x30 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1296, 0, '6020102003', '505', 0, '', '', 0, 0, 0, 'HOS Cokro Aminoto (117x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1297, 0, '6020102003', '506', 0, '', '', 0, 0, 0, 'Bunga Mawar Mekar (47x54 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1298, 0, '6020102003', '507', 0, '', '', 0, 0, 0, 'Petani Bunga (50x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1299, 0, '6020102003', '508', 0, '', '', 0, 0, 0, '2 Ekor Anjing (110x85 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1300, 0, '6020102003', '509', 0, '', '', 0, 0, 0, 'Sepasang Ayam Kate (100x55 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1301, 0, '6020102003', '510', 0, '', '', 0, 0, 0, 'Bunga Flamboyan (120x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1302, 0, '6020102003', '511', 0, '', '', 0, 0, 0, 'Sepasang ayam kate dan kutu (120x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1303, 0, '6020102003', '512', 0, '', '', 0, 0, 0, 'Tari Betawi (120x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1304, 0, '6020102003', '513', 0, '', '', 0, 0, 0, '3 Burung Jalak Putih (80x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1305, 0, '6020102003', '514', 0, '', '', 0, 0, 0, 'Dinamika (80x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1306, 0, '6020102003', '515', 0, '', '', 0, 0, 0, 'Bunga (70x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1307, 0, '6020102003', '516', 0, '', '', 0, 0, 0, 'Gadis Bali (70x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1308, 0, '6020102003', '517', 0, '', '', 0, 0, 0, '5 Burung diatas daun pisang (115x190 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1309, 0, '6020102003', '518', 0, '', '', 0, 0, 0, '8 burung kakatua dipohon kelapa (120x160 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1310, 0, '6020102003', '519', 0, '', '', 0, 0, 0, 'Kawanan burung di pohon kelapa (145x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1311, 0, '6020102003', '520', 0, '', '', 0, 0, 0, '6 burung jalak diohon kelapa (115x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1312, 0, '6020102003', '521', 0, '', '', 0, 0, 0, 'Upacara Adat Bali (80x135 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1313, 0, '6020102003', '522', 0, '', '', 0, 0, 0, 'Pemandangan siang hari', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1314, 0, '6020102003', '523', 0, '', '', 0, 0, 0, 'Seekor kuda (100x135 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1315, 0, '6020102003', '524', 0, '', '', 0, 0, 0, 'Kaligrafi Al-Ikhlas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1316, 0, '6020102003', '525', 0, '', '', 0, 0, 0, 'Perahu di Sungai (45x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1317, 0, '6020102003', '526', 0, '', '', 0, 0, 0, 'Bunga Matahari (60x49 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1318, 0, '6020102003', '527', 0, '', '', 0, 0, 0, 'Barong (50x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1319, 0, '6020102003', '528', 0, '', '', 0, 0, 0, 'Penari Bali (58x42 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1320, 0, '6020102003', '529', 0, '', '', 0, 0, 0, 'Dataran Tinggi di Bandung (100x200 cm) ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1321, 0, '6020102003', '530', 0, '', '', 0, 0, 0, 'Menara Masjid Khusus (59x79 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1322, 0, '6020102003', '531', 0, '', '', 0, 0, 0, 'Sawah dan Gunung (43x64 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1323, 0, '6020102003', '532', 0, '', '', 0, 0, 0, 'Seorang Ibu Menggendong Anak (68x29 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1324, 0, '6020102003', '533', 0, '', '', 0, 0, 0, 'Duduk Melamun (62x73 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1325, 0, '6020102003', '534', 0, '', '', 0, 0, 0, 'Keluarga Ayam & Bunga (166x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1326, 0, '6020102003', '535', 0, '', '', 0, 0, 0, 'Abstrak (160x216 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1327, 0, '6020102003', '536', 0, '', '', 0, 0, 0, 'Lukisan Kaligrafi Karya Hatta Hambali 80 x 70 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1328, 0, '6020102003', '537', 0, '', '', 0, 0, 0, 'Lukisan Kaligrafi Ayat Kursi Karya Hatta Hambali 6', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1329, 0, '6020102003', '538', 0, '', '', 0, 0, 0, 'Lukisan Kaligrafi Ayat Kursi Karya Hatta Hambali 6', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1330, 0, '6020102003', '539', 0, '', '', 0, 0, 0, 'Lukisan Kaligrafi Syahadat Karya Hatta Hambali 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1331, 0, '6020102003', '540', 0, '', '', 0, 0, 0, 'Lukisan Kaligrafi Karya Hatta Hambali 80 x 70 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1332, 0, '6020102003', '541', 0, '', '', 0, 0, 0, 'Rangkaian Bunga Karya dullah 70x130', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1333, 0, '6020102003', '542', 0, '', '', 0, 0, 0, 'Membajak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1334, 0, '6020102003', '543', 0, '', '', 0, 0, 0, 'Burung Cenderawisih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1335, 0, '6020102003', '544', 0, '', '', 0, 0, 0, 'Djaka tarub', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1336, 0, '6020102003', '545', 0, '', '', 0, 0, 0, 'Tukang Sate', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1337, 0, '6020102003', '546', 0, '', '', 0, 0, 0, 'Keluarga Petani uk 150X150', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1338, 0, '6020102003', '547', 0, '', '', 0, 0, 0, 'Sebuah Pemandangan di Sudut Jakarta', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1339, 0, '6020102003', '548', 0, '', '', 0, 0, 0, 'Sungai Musi Di Palembang Uk.135 X  88 Cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1340, 0, '6020102003', '549', 0, '', '', 0, 0, 0, 'Wage Rudolf Supratman Uk.148 x 99 Cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1341, 0, '6020102003', '550', 0, '', '', 0, 0, 0, 'Putri Penari Bali (156x93)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1342, 0, '6020102003', '551', 0, '', '', 0, 0, 0, 'Bung Karno Dgn Lambang Negara Uk.147x100', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1343, 0, '6020102003', '552', 0, '', '', 0, 0, 0, 'Lukisan Tari Baris (49x73cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1344, 0, '6020102003', '553', 0, '', '', 0, 0, 0, 'Empat Burung Diatas Pohon, (139x89cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1345, 0, '6020102003', '554', 0, '', '', 0, 0, 0, 'Panen Padi - Sunarto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1346, 0, '6020102003', '555', 0, '', '', 0, 0, 0, 'Lukisan Bapak Djumala', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1347, 0, '6020102003', '556', 0, '', '', 0, 0, 0, 'Topeng-Topeng (uk.70x90)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1348, 0, '6020102003', '557', 0, '', '', 0, 0, 0, 'Bunga Sedap Malam Dalam Vas (uk.45x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1349, 0, '6020102003', '558', 0, '', '', 0, 0, 0, 'Bunga Matahari (uk.45x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1350, 0, '6020102003', '559', 0, '', '', 0, 0, 0, 'Penari Bali (uk.80x65)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1351, 0, '6020102003', '560', 0, '', '', 0, 0, 0, 'Paspampres depan Istana Merdeka - Maria Tjui', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1352, 0, '6020102003', '561', 0, '', '', 0, 0, 0, 'Penari Wanita (uk.80x60)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1353, 0, '6020102003', '562', 0, '', '', 0, 0, 0, 'Pasar (uk.70x120)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1354, 0, '6020102003', '563', 0, '', '', 0, 0, 0, 'Susilo Bambang Yudhoyono (uk.62x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1355, 0, '6020102003', '564', 0, '', '', 0, 0, 0, 'Bambu Runcing Merah Putih (uk.200x170)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1356, 0, '6020102003', '565', 0, '', '', 0, 0, 0, 'Suami PM Inggris (uk.75x60)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1357, 0, '6020102003', '566', 0, '', '', 0, 0, 0, 'Kaligrafi Al Alaq, (uk.90x70)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1358, 0, '6020102003', '567', 0, '', '', 0, 0, 0, 'Wanita Berpakaian Hitam (Lady in Black)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1359, 0, '6020102003', '568', 0, '', '', 0, 0, 0, 'Borobudur uk 180 x 140', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1360, 0, '6020102003', '569', 0, '', '', 0, 0, 0, 'Abdul Muis (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1361, 0, '6020102003', '570', 0, '', '', 0, 0, 0, 'R. Otto Iskandar Dinata (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1362, 0, '6020102003', '571', 0, '', '', 0, 0, 0, 'Sepasang Penari Bali (100x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1363, 0, '6020102003', '572', 0, '', '', 0, 0, 0, 'Penari Bali (35x30 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1364, 0, '6020102003', '573', 0, '', '', 0, 0, 0, 'Tien Soeharto (79x53 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1365, 0, '6020102003', '574', 0, '', '', 0, 0, 0, 'Bunga Dalam Vas (79x59 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1366, 0, '6020102003', '575', 0, '', '', 0, 0, 0, 'Dewi Saraswati (90x50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1367, 0, '6020102003', '576', 0, '', '', 0, 0, 0, 'Perjalanan Di Musim Kering (25x35 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1368, 0, '6020102003', '577', 0, '', '', 0, 0, 0, 'Bunga Sepatu (25x30 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1369, 0, '6020102003', '578', 0, '', '', 0, 0, 0, 'Irama Pohon & Ruang Kelam (78x78 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1370, 0, '6020102003', '579', 0, '', '', 0, 0, 0, 'Barong (70x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1371, 0, '6020102003', '580', 0, '', '', 0, 0, 0, 'Adu Jangkrik (98x78 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1372, 0, '6020102003', '581', 0, '', '', 0, 0, 0, 'Pemandangan Gunung & Sawah (100x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1373, 0, '6020102003', '582', 0, '', '', 0, 0, 0, 'Di Depan Pura (82x137 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1374, 0, '6020102003', '583', 0, '', '', 0, 0, 0, 'Anggrek Hutan (70x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1375, 0, '6020102003', '584', 0, '', '', 0, 0, 0, 'Tamasya di Pantai (70x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1376, 0, '6020102003', '585', 0, '', '', 0, 0, 0, 'Pemandangan Pura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1377, 0, '6020102003', '586', 0, '', '', 0, 0, 0, 'Ngarai Sihanouk (70x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1378, 0, '6020102003', '587', 0, '', '', 0, 0, 0, 'RM. Suryopranoto (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1379, 0, '6020102003', '588', 0, '', '', 0, 0, 0, 'Cut Mutia (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1380, 0, '6020102003', '589', 0, '', '', 0, 0, 0, 'Brigjen TNI Soetoyo (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1381, 0, '6020102003', '590', 0, '', '', 0, 0, 0, 'Kolonel Katamso (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1382, 0, '6020102003', '591', 0, '', '', 0, 0, 0, 'Dr. Sahardjo  uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1383, 0, '6020102003', '592', 0, '', '', 0, 0, 0, 'Letjen TNI Ahmad Yani (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1384, 0, '6020102003', '593', 0, '', '', 0, 0, 0, 'Aipda K.S. Tubun (CM uk.60x45)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1385, 0, '6020102003', '594', 0, '', '', 0, 0, 0, 'Pahlawan Teuku Umar (147x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1386, 0, '6020102003', '595', 0, '', '', 0, 0, 0, 'Krakatau (150x195 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1387, 0, '6020102003', '596', 0, '', '', 0, 0, 0, 'Kawah Sebuah Gunung (121x125 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1388, 0, '6020102003', '597', 0, '', '', 0, 0, 0, 'Dr. Wahidin Soedirohoesodo duduk (138x187 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(1389, 0, '6020102003', '598', 0, '', '', 0, 0, 0, 'Kawan-Kawanku (274x156 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1390, 0, '6020102003', '599', 0, '', '', 0, 0, 0, 'Bunga Flamboyan (170x153 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1391, 0, '6020102003', '600', 0, '', '', 0, 0, 0, 'Wanita Mandi (59x91 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1392, 0, '6020102003', '601', 0, '', '', 0, 0, 0, 'Dr. Wahidin Soedirohoesodo (90x120 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1393, 0, '6020102003', '602', 0, '', '', 0, 0, 0, 'Menggendong Anak (85x170 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1394, 0, '6020102003', '603', 0, '', '', 0, 0, 0, '5 Wanita Mandi Di Pantai (189x133 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1395, 0, '6020102003', '604', 0, '', '', 0, 0, 0, 'Abstrak (197x136 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1396, 0, '6020102003', '605', 0, '', '', 0, 0, 0, 'Memikul Keranjang (98x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1397, 0, '6020102003', '606', 0, '', '', 0, 0, 0, 'Burung Diatas Dahan Pohon Delima (63x187 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1398, 0, '6020102003', '607', 0, '', '', 0, 0, 0, 'Hutan Di Gunung Merapi (219x119 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1399, 0, '6020102003', '608', 0, '', '', 0, 0, 0, 'Gembala itik (67x56 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1400, 0, '6020102003', '609', 0, '', '', 0, 0, 0, 'Burung Kakatua & 4 Burung (139x87 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1401, 0, '6020102003', '610', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto (74x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1402, 0, '6020102003', '611', 0, '', '', 0, 0, 0, 'Bapak Soeharto (74x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1403, 0, '6020102003', '612', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto (80x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1404, 0, '6020102003', '613', 0, '', '', 0, 0, 0, 'Bapak Soeharto (80x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1405, 0, '6020102003', '614', 0, '', '', 0, 0, 0, '2 Burung Diatas Pohon Kopi (180x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1406, 0, '6020102003', '615', 0, '', '', 0, 0, 0, '3 Burung Jalak Diatas Pohon Pakis (100x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1407, 0, '6020102003', '616', 0, '', '', 0, 0, 0, '2 Burung Betet Di Pohon Pakis (100x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1408, 0, '6020102003', '617', 0, '', '', 0, 0, 0, '3 Burung Madu Dng Bunga Teratai (135x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1409, 0, '6020102003', '618', 0, '', '', 0, 0, 0, '4 Burung Kutilang Diatas Bunga Cempaka (130x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1410, 0, '6020102003', '619', 0, '', '', 0, 0, 0, '5 Burung Gelatik Di Pohon Kelapa (130x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1411, 0, '6020102003', '620', 0, '', '', 0, 0, 0, '3 Burung Bangau Diatas Anggrek (123x66 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1412, 0, '6020102003', '621', 0, '', '', 0, 0, 0, '3 Burung Madu Diatas Anggrek (130x198 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1413, 0, '6020102003', '622', 0, '', '', 0, 0, 0, '4 Burung Diatas Pohon Pisang (105x190 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1414, 0, '6020102003', '623', 0, '', '', 0, 0, 0, 'Pohon Cemara dan Bunga (180x97 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1415, 0, '6020102003', '624', 0, '', '', 0, 0, 0, 'Ny. Takeo Fukuda (70 x 50 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1416, 0, '6020102003', '625', 0, '', '', 0, 0, 0, 'Hasan Bin Talal (70 x 53 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1417, 0, '6020102003', '626', 0, '', '', 0, 0, 0, 'PM Bangladesh, Ziaur Rahman (70 x 53 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1418, 0, '6020102003', '627', 0, '', '', 0, 0, 0, 'Ny. Juan Carlos (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1419, 0, '6020102003', '628', 0, '', '', 0, 0, 0, 'Raja Spanyol, Juan Carlos (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1420, 0, '6020102003', '629', 0, '', '', 0, 0, 0, 'Ny Roh Tae Woo (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1421, 0, '6020102003', '630', 0, '', '', 0, 0, 0, 'Roh Tae Woo (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1422, 0, '6020102003', '631', 0, '', '', 0, 0, 0, 'Yulius K Nyerere (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1423, 0, '6020102003', '632', 0, '', '', 0, 0, 0, 'Istri PM Jepang, Zenko Suzuki (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1424, 0, '6020102003', '633', 0, '', '', 0, 0, 0, 'PM Jepang, Zenko Suzuki (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1425, 0, '6020102003', '634', 0, '', '', 0, 0, 0, 'Istri PM Srilanka, Ny. R. Premadasa (75 x 60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1426, 0, '6020102003', '635', 0, '', '', 0, 0, 0, 'Pemandangan candi ceto (85x140 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1427, 0, '6020102003', '636', 0, '', '', 0, 0, 0, 'Perkampungan Bali (50x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1428, 0, '6020102003', '637', 0, '', '', 0, 0, 0, 'Pemandangan Sumbing (120x200 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1429, 0, '6020102003', '638', 0, '', '', 0, 0, 0, 'Pemandangan Gunung (180x240 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1430, 0, '6020102003', '639', 0, '', '', 0, 0, 0, 'Upacara Melasti', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1431, 0, '6020102003', '640', 0, '', '', 0, 0, 0, 'Bunga Sepatu Merah (55x55 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1432, 0, '6020102003', '641', 0, '', '', 0, 0, 0, 'Bunga Ceplok Piring Putih (25x30 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1433, 0, '6020102003', '642', 0, '', '', 0, 0, 0, 'lukisan gadis bali (70x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1434, 0, '6020102003', '643', 0, '', '', 0, 0, 0, 'lukisan pemand. panen', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1435, 0, '6020102003', '644', 0, '', '', 0, 0, 0, 'Lukisan Hutan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1436, 0, '6020102003', '645', 0, '', '', 0, 0, 0, 'Pemandangan gunung & sawah (88x138 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1437, 0, '6020102003', '646', 0, '', '', 0, 0, 0, 'lukisan ahmad rusdi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1438, 0, '6020102003', '647', 0, '', '', 0, 0, 0, 'lukisan winata supriatna', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1439, 0, '6020102003', '648', 0, '', '', 0, 0, 0, 'Menata Bunga Sesaji Kebudayaan (85x65 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1440, 0, '6020102003', '649', 0, '', '', 0, 0, 0, 'Pasar Bunga (68x88 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1441, 0, '6020102003', '650', 0, '', '', 0, 0, 0, 'Buah-Buahan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1442, 0, '6020102003', '651', 0, '', '', 0, 0, 0, '2 jalak dan 2 betet (135x85 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1443, 0, '6020102003', '652', 0, '', '', 0, 0, 0, 'Pemandangan sawah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1444, 0, '6020102003', '653', 0, '', '', 0, 0, 0, 'Pemandangan Danau (98x198 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1445, 0, '6020102003', '654', 0, '', '', 0, 0, 0, 'Tanah Lot (75x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1446, 0, '6020102003', '655', 0, '', '', 0, 0, 0, 'Bengawan Solo (65x75 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1447, 0, '6020102003', '656', 0, '', '', 0, 0, 0, 'Panen Padi uk 70x80', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1448, 0, '6020102003', '657', 0, '', '', 0, 0, 0, 'Membongkar Muatan Kalibaru (120x150 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1449, 0, '6020102003', '658', 0, '', '', 0, 0, 0, 'Pemandangan dan Matahari (46 x 45 Cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1450, 0, '6020102003', '659', 0, '', '', 0, 0, 0, 'Tiga Penari Betawi (85 x 105 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1451, 0, '6020102003', '660', 0, '', '', 0, 0, 0, 'Abstrak Geometri (35 x 35 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1452, 0, '6020102003', '661', 0, '', '', 0, 0, 0, 'Bunga Flamboyan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1453, 0, '6020102003', '662', 0, '', '', 0, 0, 0, 'Sembahyang di Pura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1454, 0, '6020102003', '663', 0, '', '', 0, 0, 0, 'The Poscard with the beautiful aucient (60x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1455, 0, '6020102003', '664', 0, '', '', 0, 0, 0, 'Kaligrafi Al Kautsar (46x51 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1456, 0, '6020102003', '665', 0, '', '', 0, 0, 0, '3 Burung Diatas Pohon (45x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1457, 0, '6020102003', '666', 0, '', '', 0, 0, 0, '4 Burung Diatas Bunga Soka (60x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1458, 0, '6020102003', '667', 0, '', '', 0, 0, 0, '5 Burung Diatas Bunga Sepatu (60x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1459, 0, '6020102003', '668', 0, '', '', 0, 0, 0, '5 Burung Diatas Bunga Anggrek (60x40 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1460, 0, '6020102003', '669', 0, '', '', 0, 0, 0, 'Barong Bali (200x260 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1461, 0, '6020102003', '670', 0, '', '', 0, 0, 0, 'Barong dan Leak (29x34 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1462, 0, '6020102003', '671', 0, '', '', 0, 0, 0, 'Kaligrafi Al-Imron uk 90X90', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1463, 0, '6020102003', '672', 0, '', '', 0, 0, 0, '4 Burung di Pohon (83x135 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1464, 0, '6020102003', '673', 0, '', '', 0, 0, 0, 'Bunga dalam vas(70x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1465, 0, '6020102003', '674', 0, '', '', 0, 0, 0, 'Penari Bali (100x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1466, 0, '6020102003', '675', 0, '', '', 0, 0, 0, 'Perahu Layar (60x90 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1467, 0, '6020102003', '676', 0, '', '', 0, 0, 0, 'Penari Bali (73x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1468, 0, '6020102003', '677', 0, '', '', 0, 0, 0, 'Petani Pulang dari Sawah (10 x 12 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1469, 0, '6020102003', '678', 0, '', '', 0, 0, 0, 'Pertempuran Surabaya (56 x 72 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1470, 0, '6020102003', '679', 0, '', '', 0, 0, 0, 'Wanita Berkebaya Hijau (198x120 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1471, 0, '6020102003', '680', 0, '', '', 0, 0, 0, 'Sebuah Sudut Isneg di Jkt (94x80 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1472, 0, '6020102003', '681', 0, '', '', 0, 0, 0, 'Kaligrafi Al Ikhlasi (69x69 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1473, 0, '6020102003', '682', 0, '', '', 0, 0, 0, 'Alamanda (80x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1474, 0, '6020102003', '683', 0, '', '', 0, 0, 0, 'Kehidupan Bawah Laut (48x70 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1475, 0, '6020102003', '684', 0, '', '', 0, 0, 0, '3 Burung Diatas Bunga Lotus (110x85 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1476, 0, '6020102003', '685', 0, '', '', 0, 0, 0, 'Pertunjukan Tari Barong', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1477, 0, '6020102003', '686', 0, '', '', 0, 0, 0, 'Penari Kipas (80x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1478, 0, '6020102003', '687', 0, '', '', 0, 0, 0, '5 Burung & Bunga Anggrek (80x100 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1479, 0, '6020102003', '688', 0, '', '', 0, 0, 0, '2 Burung & Anggrek Bulan (65x45 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1480, 0, '6020102003', '689', 0, '', '', 0, 0, 0, 'Pangeran Belanda, Bernhard (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1481, 0, '6020102003', '690', 0, '', '', 0, 0, 0, 'Ratu Belanda, Yuliana (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1482, 0, '6020102003', '691', 0, '', '', 0, 0, 0, 'PM Australia, Bob Hawke (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1483, 0, '6020102003', '692', 0, '', '', 0, 0, 0, 'Istri PM Australia, Ny Bob Hawke (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1484, 0, '6020102003', '693', 0, '', '', 0, 0, 0, 'PM Yugoslavia, Zvonko Planic (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1485, 0, '6020102003', '694', 0, '', '', 0, 0, 0, 'Istri PM Yugoslavia, Ny Zvonko Planinc (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1486, 0, '6020102003', '695', 0, '', '', 0, 0, 0, 'PM Thailand, Chatichai Chooniiavan (75x60cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1487, 0, '6020102003', '696', 0, '', '', 0, 0, 0, 'Istri PM Thailand, Ny Chatichai Chooniiavan (75x60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1488, 0, '6020102003', '697', 0, '', '', 0, 0, 0, 'PM Singapura, Lee Kwan Yew (75x60 cm)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1489, 0, '6020102003', '698', 0, '', '', 0, 0, 0, 'Presiden Megawati uk. 75 x 61', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1490, 0, '6020102003', '699', 0, '', '', 0, 0, 0, 'Isteri Yang dipertuan Agong Malaysia, Ny Achmad Syah Uk 75 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1491, 0, '6020102003', '700', 0, '', '', 0, 0, 0, 'Corazon C. Aquino uk. 75 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1492, 0, '6020102003', '701', 0, '', '', 0, 0, 0, 'Pendamping Ratu Belanda Uk. 75 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1493, 0, '6020102003', '702', 0, '', '', 0, 0, 0, 'Bapak dan Ibu Tien Soeharto uk. 60 x 79', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1494, 0, '6020102003', '703', 0, '', '', 0, 0, 0, 'Presiden soekarno Uk. 120 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1495, 0, '6020102003', '704', 0, '', '', 0, 0, 0, 'Yusuf Kalla Uk. 75 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1496, 0, '6020102003', '705', 0, '', '', 0, 0, 0, 'Memanah (Repro) uk 53x 53', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1497, 0, '6020102003', '706', 0, '', '', 0, 0, 0, 'Potret Wajah \"\"Kepala Sekretariat Presiden\"\" Uk. 45cm x 55 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1498, 0, '6020102003', '707', 0, '', '', 0, 0, 0, 'Seorang Sardjana Belanda Tua', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1499, 0, '6020102003', '708', 0, '', '', 0, 0, 0, 'Abstrak (Perjalanan Indonesia)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1500, 0, '6020102003', '709', 0, '', '', 0, 0, 0, 'Grup Warkop', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1501, 0, '6020102003', '710', 0, '', '', 0, 0, 0, 'Danau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1502, 0, '6020102003', '711', 0, '', '', 0, 0, 0, 'Paul Keating, Perdana Menteri Australia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1503, 0, '6020102003', '712', 0, '', '', 0, 0, 0, 'Ny. Paul Keating, Isteri PM Australia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1504, 0, '6020102003', '713', 0, '', '', 0, 0, 0, 'Sheikh Saad Al Abdallah, Putra Mahkota/ PM Kuwait', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1505, 0, '6020102003', '714', 0, '', '', 0, 0, 0, 'YM Indira Gandhi, PM India', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1506, 0, '6020102003', '715', 0, '', '', 0, 0, 0, 'Vo Van Kiet, PM Vietnam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1507, 0, '6020102003', '716', 0, '', '', 0, 0, 0, 'Ny. Vo Van Kiet, Isteri PM Vietnam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1508, 0, '6020102003', '717', 0, '', '', 0, 0, 0, 'Ny. Dan Quale, Isteri Wakil Presiden Amerika Serikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1509, 0, '6020102003', '718', 0, '', '', 0, 0, 0, 'Presiden Columbia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1510, 0, '6020102003', '719', 0, '', '', 0, 0, 0, 'Isteri Presiden Columbia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1511, 0, '6020102003', '720', 0, '', '', 0, 0, 0, 'Kim Young Sam, Presiden Korea', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1512, 0, '6020102003', '721', 0, '', '', 0, 0, 0, 'Ny. Kim Young Sam, Isteri Presiden Korea', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1513, 0, '6020102003', '722', 0, '', '', 0, 0, 0, 'JB Bolger, PM Selandia Baru', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1514, 0, '6020102003', '723', 0, '', '', 0, 0, 0, 'Ny. JB Bolger, Isteri PM Selandia Baru', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1515, 0, '6020102003', '724', 0, '', '', 0, 0, 0, 'Wee Kim Wee, Presiden Singapura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1516, 0, '6020102003', '725', 0, '', '', 0, 0, 0, 'Isteri Presiden Singapura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1517, 0, '6020102003', '726', 0, '', '', 0, 0, 0, 'Yang Sang Kun. Presiden RRC', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1518, 0, '6020102003', '727', 0, '', '', 0, 0, 0, 'Carlos Menem, Presiden Argentina', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1519, 0, '6020102003', '728', 0, '', '', 0, 0, 0, 'Kiichi Miyazawa, PM Jepang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1520, 0, '6020102003', '729', 0, '', '', 0, 0, 0, 'Jamsai Silpa Archa, PM Thailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1521, 0, '6020102003', '730', 0, '', '', 0, 0, 0, 'YM Necmettin Erbakan, PM Turki', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1522, 0, '6020102003', '731', 0, '', '', 0, 0, 0, 'Presiden India', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1523, 0, '6020102003', '732', 0, '', '', 0, 0, 0, 'Presiden Mongolia Punsalmaagiin Ochirbat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1524, 0, '6020102003', '733', 0, '', '', 0, 0, 0, 'Sharav Tsevelmaa Isteri Pendamping Mongolia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1525, 0, '6020102003', '734', 0, '', '', 0, 0, 0, 'Presiden Burhinafaso, Blaise Compaore', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1526, 0, '6020102003', '735', 0, '', '', 0, 0, 0, 'Pangeran Claus, Belanda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1527, 0, '6020102003', '736', 0, '', '', 0, 0, 0, 'Raja Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1528, 0, '6020102003', '737', 0, '', '', 0, 0, 0, 'Ny. Raja Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1529, 0, '6020102003', '738', 0, '', '', 0, 0, 0, 'Lam Vene Tiaan, Presiden Suriname', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1530, 0, '6020102003', '739', 0, '', '', 0, 0, 0, 'Ny. Lam Vene Tiaan, Isteri Presiden Suriname', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1531, 0, '6020102003', '740', 0, '', '', 0, 0, 0, 'Tamu Negara Wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1532, 0, '6020102003', '741', 0, '', '', 0, 0, 0, 'Khamtai Siphandone, PM Laos', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1533, 0, '6020102003', '742', 0, '', '', 0, 0, 0, 'Ny.Thaun Shwe, Miyanmar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1534, 0, '6020102003', '743', 0, '', '', 0, 0, 0, 'Ny. Vera Chiluba, Zambia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1535, 0, '6020102003', '744', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1536, 0, '6020102003', '745', 0, '', '', 0, 0, 0, 'Ny Margaret Whitlam, PM Australia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1537, 0, '6020102003', '746', 0, '', '', 0, 0, 0, 'Ny. Nazmiye, Turki', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1538, 0, '6020102003', '747', 0, '', '', 0, 0, 0, 'Tuan Walid Al Kurdi Yordania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1539, 0, '6020102003', '748', 0, '', '', 0, 0, 0, 'Olap Brundland, PM Kerajaan Norwegia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1540, 0, '6020102003', '749', 0, '', '', 0, 0, 0, 'Bill Clinton, Presiden Amerika Serikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1541, 0, '6020102003', '750', 0, '', '', 0, 0, 0, 'Arpad Goncz,  Presiden Hungaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1542, 0, '6020102003', '751', 0, '', '', 0, 0, 0, 'Frederick Chiluba, Presiden Zambia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1543, 0, '6020102003', '752', 0, '', '', 0, 0, 0, 'Tamu Negara Wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1544, 0, '6020102003', '753', 0, '', '', 0, 0, 0, 'Tamu Negara Wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1545, 0, '6020102003', '754', 0, '', '', 0, 0, 0, 'Ny. Zsuzsanna  Gonter, Pendamping Presiden Hungaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1546, 0, '6020102003', '755', 0, '', '', 0, 0, 0, 'Ny. N\'jaimeh Jawara, Gambia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1547, 0, '6020102003', '756', 0, '', '', 0, 0, 0, 'Ny. Noboru Takasita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1548, 0, '6020102003', '757', 0, '', '', 0, 0, 0, 'Ny. Khunying, Isteri PM Thailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1549, 0, '6020102003', '758', 0, '', '', 0, 0, 0, 'Seri Paduka Baginda Yang Dipertuan Agong Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1550, 0, '6020102003', '759', 0, '', '', 0, 0, 0, 'Ny. Leia Maria, Isteri Sekjen PBB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1551, 0, '6020102003', '760', 0, '', '', 0, 0, 0, 'Presiden Kazakhtan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1552, 0, '6020102003', '761', 0, '', '', 0, 0, 0, 'Nouhak Phoumsa Vanah, Presiden Laos', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1553, 0, '6020102003', '762', 0, '', '', 0, 0, 0, 'Asif Ali Zardari,  Pendamping PM Pakistan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1554, 0, '6020102003', '763', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1555, 0, '6020102003', '764', 0, '', '', 0, 0, 0, 'Ny. Elizabeth Bloomer Ford, Pendamping Presiden AmerikaSerikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1556, 0, '6020102003', '765', 0, '', '', 0, 0, 0, 'Tran Duc Luong, Presiden Vietnam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1557, 0, '6020102003', '766', 0, '', '', 0, 0, 0, 'Ny.Tran Duc Luong, Isteri Presiden Vietnam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1558, 0, '6020102003', '767', 0, '', '', 0, 0, 0, 'Zhu Rongji, PM China', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1559, 0, '6020102003', '768', 0, '', '', 0, 0, 0, 'Ny. Zhu Rongji, Isteri PM China', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1560, 0, '6020102003', '769', 0, '', '', 0, 0, 0, 'Gloria Macapagal  Arroyo, Presiden Philipina', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1561, 0, '6020102003', '770', 0, '', '', 0, 0, 0, 'Jose Miquel Arroyo, Pendampin Presiden Philipina', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1562, 0, '6020102003', '771', 0, '', '', 0, 0, 0, 'Omar Hassan Al Bashir', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1563, 0, '6020102003', '772', 0, '', '', 0, 0, 0, 'Nicolae Ceausescu, Presiden Rumania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1564, 0, '6020102003', '773', 0, '', '', 0, 0, 0, 'Ny. Elena  Ceausescu, Pendamping Presiden Rumania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1565, 0, '6020102003', '774', 0, '', '', 0, 0, 0, 'Jozef Moravcik, PM Slovakia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1566, 0, '6020102003', '775', 0, '', '', 0, 0, 0, 'Ny. PM Ceko & Slowakia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1567, 0, '6020102003', '776', 0, '', '', 0, 0, 0, 'Ny. Dallas Hayden,  Pendamping Gubernur Australia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1568, 0, '6020102003', '777', 0, '', '', 0, 0, 0, 'Mej. Lubbers Hongewegen, PM Belanda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1569, 0, '6020102003', '778', 0, '', '', 0, 0, 0, 'Ny. Lubbers Hooewegen Tamu Negara Belanda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1570, 0, '6020102003', '779', 0, '', '', 0, 0, 0, 'Presiden Kyrghystan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1571, 0, '6020102003', '780', 0, '', '', 0, 0, 0, 'Ny. Tamu Negara Kyrghystan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1572, 0, '6020102003', '781', 0, '', '', 0, 0, 0, 'Bautros Ghali, Sekjen PBB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1573, 0, '6020102003', '782', 0, '', '', 0, 0, 0, 'Cimorzewicz, PM Polandia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1574, 0, '6020102003', '783', 0, '', '', 0, 0, 0, 'Jean Chretien, PM Kanada', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1575, 0, '6020102003', '784', 0, '', '', 0, 0, 0, 'Chuan Leek Pai, PM Thailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1576, 0, '6020102003', '785', 0, '', '', 0, 0, 0, 'Ny. Bun Rany,  Pendamping PM Kamboja', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1577, 0, '6020102003', '786', 0, '', '', 0, 0, 0, 'P.M. Kamboja, Hun Sen', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1578, 0, '6020102003', '787', 0, '', '', 0, 0, 0, 'Presiden Maladewa, Maumoon Abdul Gayoom', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1579, 0, '6020102003', '788', 0, '', '', 0, 0, 0, 'Presiden Yaman', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1580, 0, '6020102003', '789', 0, '', '', 0, 0, 0, 'Sulayman Ramirel, Presiden Turki', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1581, 0, '6020102003', '790', 0, '', '', 0, 0, 0, 'Khunying Phanchma Yong Chaiyadh, Ny. PM Thailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1582, 0, '6020102003', '791', 0, '', '', 0, 0, 0, 'Isteri Presiden Mesir', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1583, 0, '6020102003', '792', 0, '', '', 0, 0, 0, 'Paiar Wingti, PM Papua Nugini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1584, 0, '6020102003', '793', 0, '', '', 0, 0, 0, 'PM Papua Nugini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1585, 0, '6020102003', '794', 0, '', '', 0, 0, 0, 'Ny. PM Papua Nugini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1586, 0, '6020102003', '795', 0, '', '', 0, 0, 0, 'Cun Doo Hwan Korea selatan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1587, 0, '6020102003', '796', 0, '', '', 0, 0, 0, 'Ny. Cun Doo Hwan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1588, 0, '6020102003', '797', 0, '', '', 0, 0, 0, 'Pangeran Charles', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1589, 0, '6020102003', '798', 0, '', '', 0, 0, 0, 'Lady Diana', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1590, 0, '6020102003', '799', 0, '', '', 0, 0, 0, 'Vaclav Klaus, PM Cheko', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1591, 0, '6020102003', '800', 0, '', '', 0, 0, 0, 'Ny. Livia Klausova, Isteri PM Cheko', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1592, 0, '6020102003', '801', 0, '', '', 0, 0, 0, 'Phan Krua Yongchaiyudh, PM Thailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1593, 0, '6020102003', '802', 0, '', '', 0, 0, 0, 'Rafsanjani, Republik Islam Iran', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1594, 0, '6020102003', '803', 0, '', '', 0, 0, 0, 'Tamu Negara Myanmar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1595, 0, '6020102003', '804', 0, '', '', 0, 0, 0, 'Noboru Thakesita, PM Jepang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1596, 0, '6020102003', '805', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1597, 0, '6020102003', '806', 0, '', '', 0, 0, 0, 'Ny. Selly Mugabe', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1598, 0, '6020102003', '807', 0, '', '', 0, 0, 0, 'Ny. Presiden Laos', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1599, 0, '6020102003', '808', 0, '', '', 0, 0, 0, 'Thomas Kristil, Presiden Austria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1600, 0, '6020102003', '809', 0, '', '', 0, 0, 0, 'Ny. Arne, Kerajaan Norwegia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1601, 0, '6020102003', '810', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1602, 0, '6020102003', '811', 0, '', '', 0, 0, 0, 'Ny. Sara Nazar Barjeva, Kazhaktan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1603, 0, '6020102003', '812', 0, '', '', 0, 0, 0, 'Alhaj Davda Kairaba Jawara, Gambia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1604, 0, '6020102003', '813', 0, '', '', 0, 0, 0, 'Islam Karimov, Presiden Uzbekistan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1605, 0, '6020102003', '814', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1606, 0, '6020102003', '815', 0, '', '', 0, 0, 0, 'Ny. Jean Chretien, Kanada', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1607, 0, '6020102003', '816', 0, '', '', 0, 0, 0, 'Ratu Beatric, Belanda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1608, 0, '6020102003', '817', 0, '', '', 0, 0, 0, 'Sheikh Zayed bin Sultan al Nahayat, Uni Emirat Arab', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1609, 0, '6020102003', '818', 0, '', '', 0, 0, 0, 'K. Nujoma, Presiden Namibia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1610, 0, '6020102003', '819', 0, '', '', 0, 0, 0, 'Ny. Theo Poldine K. Nujoma, Isteri Presiden Namibia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1611, 0, '6020102003', '820', 0, '', '', 0, 0, 0, 'Witlam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1612, 0, '6020102003', '821', 0, '', '', 0, 0, 0, 'Ny. Presiden Rumania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1613, 0, '6020102003', '822', 0, '', '', 0, 0, 0, 'Presiden Namibia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1614, 0, '6020102003', '823', 0, '', '', 0, 0, 0, 'Putri Basma binti Talal, Yordania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1615, 0, '6020102003', '824', 0, '', '', 0, 0, 0, 'Robert Gabriel Mugabe, Zimbabwe', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1616, 0, '6020102003', '825', 0, '', '', 0, 0, 0, 'Zlatko Matesa, PM Kroasia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(1617, 0, '6020102003', '826', 0, '', '', 0, 0, 0, 'Gubernur Australia  Bill Hayden', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1618, 0, '6020102003', '827', 0, '', '', 0, 0, 0, 'Presiden Bosnia DR. Alija Reibe Govic', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1619, 0, '6020102003', '828', 0, '', '', 0, 0, 0, 'Ny. Barbara (Polandia)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1620, 0, '6020102003', '829', 0, '', '', 0, 0, 0, 'PM.Toshiki Kaifu (Jepang)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1621, 0, '6020102003', '830', 0, '', '', 0, 0, 0, 'Seri Paduka Baginda Raja Permaisuri Agong Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1622, 0, '6020102003', '831', 0, '', '', 0, 0, 0, 'Ny. Ryutaro Hasimoto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1623, 0, '6020102003', '832', 0, '', '', 0, 0, 0, 'PM. Italia YM.Romando Prodi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1624, 0, '6020102003', '833', 0, '', '', 0, 0, 0, 'Sanja Greguric Matesa (Kroasia)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1625, 0, '6020102003', '834', 0, '', '', 0, 0, 0, 'TN Srilanka', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1626, 0, '6020102003', '835', 0, '', '', 0, 0, 0, 'Ny. Toshiki Kaifu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1627, 0, '6020102003', '836', 0, '', '', 0, 0, 0, 'Benazir Bhutto,  PM Republik IslamPakistan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1628, 0, '6020102003', '837', 0, '', '', 0, 0, 0, 'Constantinescu, Presiden Rumania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1629, 0, '6020102003', '838', 0, '', '', 0, 0, 0, 'Dan Quale, Wakil Presiden Amerika Serikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1630, 0, '6020102003', '839', 0, '', '', 0, 0, 0, 'Pieter Stambolic, PM Yugoslavia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1631, 0, '6020102003', '840', 0, '', '', 0, 0, 0, 'Tamu Negara  Wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1632, 0, '6020102003', '841', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1633, 0, '6020102003', '842', 0, '', '', 0, 0, 0, 'Gerald Rudolph  Ford, Presiden Amerika Serikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1634, 0, '6020102003', '843', 0, '', '', 0, 0, 0, 'Presiden Turki Kenan Evren', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1635, 0, '6020102003', '844', 0, '', '', 0, 0, 0, 'Piere E Trudeau, PM Kanada', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1636, 0, '6020102003', '845', 0, '', '', 0, 0, 0, 'Ny. Paiar Wingti, Isteri PM Papua Nugini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1637, 0, '6020102003', '846', 0, '', '', 0, 0, 0, 'Hosny Mubarak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1638, 0, '6020102003', '847', 0, '', '', 0, 0, 0, 'Maun Maung Kha, PM Burma', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1639, 0, '6020102003', '848', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1640, 0, '6020102003', '849', 0, '', '', 0, 0, 0, 'PM Tailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1641, 0, '6020102003', '850', 0, '', '', 0, 0, 0, 'Presiden Madagaskar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1642, 0, '6020102003', '851', 0, '', '', 0, 0, 0, 'Hun Sen, PM Kamboja', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1643, 0, '6020102003', '852', 0, '', '', 0, 0, 0, 'Ny. Ranaridh, Isteri PM I Kamboja', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1644, 0, '6020102003', '853', 0, '', '', 0, 0, 0, 'PM Radjib Ghandi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1645, 0, '6020102003', '854', 0, '', '', 0, 0, 0, 'Ny. Sonia Ghandi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1646, 0, '6020102003', '855', 0, '', '', 0, 0, 0, 'Saparmurat Niyarov', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1647, 0, '6020102003', '856', 0, '', '', 0, 0, 0, 'Abdullah Mwinyi, Presiden Tanzania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1648, 0, '6020102003', '857', 0, '', '', 0, 0, 0, 'Ny. Siti Abdallah Mwinyi, Isteri Presiden Tanzania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1649, 0, '6020102003', '858', 0, '', '', 0, 0, 0, 'Le Due Anh, Presiden Vietnam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1650, 0, '6020102003', '859', 0, '', '', 0, 0, 0, 'Ny. Presiden Vietnam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1651, 0, '6020102003', '860', 0, '', '', 0, 0, 0, 'Ny. Ibragimovich Uzbekistan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1652, 0, '6020102003', '861', 0, '', '', 0, 0, 0, 'Tofilau Eti Alasan, PM Samoa Barat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1653, 0, '6020102003', '862', 0, '', '', 0, 0, 0, 'Ny.Tofilau Eti Alasan, Isteri PM Samoa Barat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1654, 0, '6020102003', '863', 0, '', '', 0, 0, 0, 'Felipe Gonzales, PM Spanyol', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1655, 0, '6020102003', '864', 0, '', '', 0, 0, 0, 'Martti Ahtisaari, Presiden Finlandia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1656, 0, '6020102003', '865', 0, '', '', 0, 0, 0, 'Isteri Presiden Micronesia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1657, 0, '6020102003', '866', 0, '', '', 0, 0, 0, 'Ny. Hunsen, Isteri PM Kamboja II', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1658, 0, '6020102003', '867', 0, '', '', 0, 0, 0, 'Nixon, Presiden Amerika Serikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1659, 0, '6020102003', '868', 0, '', '', 0, 0, 0, 'Ny. Nixon, Isteri Presiden Amerika Serikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1660, 0, '6020102003', '869', 0, '', '', 0, 0, 0, 'Yasser Arrafat, Presiden Palistina', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1661, 0, '6020102003', '870', 0, '', '', 0, 0, 0, 'Ny. Suha Arrafat, Isteri Presiden Palestina', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1662, 0, '6020102003', '871', 0, '', '', 0, 0, 0, 'Pal Losonczi, Presiden Hungaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1663, 0, '6020102003', '872', 0, '', '', 0, 0, 0, 'Ny. Pal Losonczi, Isteri Presiden Hungaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1664, 0, '6020102003', '873', 0, '', '', 0, 0, 0, 'Sultan Iskandar Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1665, 0, '6020102003', '874', 0, '', '', 0, 0, 0, 'Permaisuri Sultan Iskandar Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1666, 0, '6020102003', '875', 0, '', '', 0, 0, 0, 'Lubber, PM Belanda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1667, 0, '6020102003', '876', 0, '', '', 0, 0, 0, 'Ny. Lubber, Isteri PM Belanda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1668, 0, '6020102003', '877', 0, '', '', 0, 0, 0, 'Javier Perez de Cuellar, Sekjen PBB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1669, 0, '6020102003', '878', 0, '', '', 0, 0, 0, 'Ny. Javier Perez de Cuellar, Isteri Sekjen PBB', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1670, 0, '6020102003', '879', 0, '', '', 0, 0, 0, 'Tamu Negara Italia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1671, 0, '6020102003', '880', 0, '', '', 0, 0, 0, 'RD Muldoon, PM Selandia Baru', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1672, 0, '6020102003', '881', 0, '', '', 0, 0, 0, 'Raja Husein Yordania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1673, 0, '6020102003', '882', 0, '', '', 0, 0, 0, 'Ratu Noor Yordania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1674, 0, '6020102003', '883', 0, '', '', 0, 0, 0, 'Yoweri Kosuta Maseveni, Presiden Uganda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1675, 0, '6020102003', '884', 0, '', '', 0, 0, 0, 'Ny. Yoweri Kosuta Maseveni, Isteri Presiden Uganda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1676, 0, '6020102003', '885', 0, '', '', 0, 0, 0, 'Prem Tin Sulanonda, PM Thailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1677, 0, '6020102003', '886', 0, '', '', 0, 0, 0, 'Ny. Naomi David Russel Lange, Isteri PM Selandia Baru', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1678, 0, '6020102003', '887', 0, '', '', 0, 0, 0, 'Hussain Muhammad, Presiden Banglades', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1679, 0, '6020102003', '888', 0, '', '', 0, 0, 0, 'Ny. Begum Raushan, Bangladesh', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1680, 0, '6020102003', '889', 0, '', '', 0, 0, 0, 'Mrs. Barbara Aghata, Republik Malta', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1681, 0, '6020102003', '890', 0, '', '', 0, 0, 0, 'Dr. Jaime Lusinchi, Presiden Venezuela', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1682, 0, '6020102003', '891', 0, '', '', 0, 0, 0, 'Mahatir Muhammad, PM Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1683, 0, '6020102003', '892', 0, '', '', 0, 0, 0, 'Taha Yassin Ramadhan, Wakil Presiden Irak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1684, 0, '6020102003', '893', 0, '', '', 0, 0, 0, 'Presiden Rumania', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1685, 0, '6020102003', '894', 0, '', '', 0, 0, 0, 'Nelson Mandela', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1686, 0, '6020102003', '895', 0, '', '', 0, 0, 0, 'Norodom Ranaridd, PM Kamboja I', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1687, 0, '6020102003', '896', 0, '', '', 0, 0, 0, 'Bailey Olter, Presiden Micronesia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1688, 0, '6020102003', '897', 0, '', '', 0, 0, 0, 'Ny. Theresa Agustine, Madagaskar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1689, 0, '6020102003', '898', 0, '', '', 0, 0, 0, 'Ny.Zia Ulhaq (Pakistan)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1690, 0, '6020102003', '899', 0, '', '', 0, 0, 0, 'PM.Jepang Yasuhiro Nakasone', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1691, 0, '6020102003', '900', 0, '', '', 0, 0, 0, 'Ny,  George Bush Isteri Presiden Amerika Serikat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1692, 0, '6020102003', '901', 0, '', '', 0, 0, 0, 'Presiden George Bush (Amerika serikat)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1693, 0, '6020102003', '902', 0, '', '', 0, 0, 0, 'Presiden Jerman Barat Carstens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1694, 0, '6020102003', '903', 0, '', '', 0, 0, 0, 'Istri Presiden Jerman Barat Ny.Veronica Carstens', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1695, 0, '6020102003', '904', 0, '', '', 0, 0, 0, 'NY.DR Siti Hasmah Mahatir Muhammad', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1696, 0, '6020102003', '905', 0, '', '', 0, 0, 0, 'PM.Papua Nugine Michael Thomas Somare', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1697, 0, '6020102003', '906', 0, '', '', 0, 0, 0, 'Ibragimovich Uzbekistan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1698, 0, '6020102003', '907', 0, '', '', 0, 0, 0, 'Presiden Pakistan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1699, 0, '6020102003', '908', 0, '', '', 0, 0, 0, 'Paias Wingti, PM Papua Nugini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1700, 0, '6020102003', '909', 0, '', '', 0, 0, 0, 'PM David Rusella Lanee Selandia Baru', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1701, 0, '6020102003', '910', 0, '', '', 0, 0, 0, 'Thabo Mbeki, Presiden Afrika Selatan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1702, 0, '6020102003', '911', 0, '', '', 0, 0, 0, 'Tamu Negara', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1703, 0, '6020102003', '912', 0, '', '', 0, 0, 0, 'PM Laos', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1704, 0, '6020102003', '913', 0, '', '', 0, 0, 0, 'John Howard, PM Australia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1705, 0, '6020102003', '914', 0, '', '', 0, 0, 0, 'Ny. John Howard, Isteri PM Australia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1706, 0, '6020102003', '915', 0, '', '', 0, 0, 0, 'Presiden Laos', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1707, 0, '6020102003', '916', 0, '', '', 0, 0, 0, 'Isteri Presiden Laos', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1708, 0, '6020102003', '917', 0, '', '', 0, 0, 0, 'Presiden Swaziland', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1709, 0, '6020102003', '918', 0, '', '', 0, 0, 0, 'Isteri Presiden Swaziland', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1710, 0, '6020102003', '919', 0, '', '', 0, 0, 0, 'PM Jepang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1711, 0, '6020102003', '920', 0, '', '', 0, 0, 0, 'PM Tailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1712, 0, '6020102003', '921', 0, '', '', 0, 0, 0, 'Presiden Namibia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1713, 0, '6020102003', '922', 0, '', '', 0, 0, 0, 'Presiden Mongolia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1714, 0, '6020102003', '923', 0, '', '', 0, 0, 0, 'Isteri Presiden Mongolia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1715, 0, '6020102003', '924', 0, '', '', 0, 0, 0, 'Presiden Kroasia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1716, 0, '6020102003', '925', 0, '', '', 0, 0, 0, 'Isteri Presiden Kroasia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1717, 0, '6020102003', '926', 0, '', '', 0, 0, 0, 'Presiden Bulgaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1718, 0, '6020102003', '927', 0, '', '', 0, 0, 0, 'Isteri Presiden Bulgaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1719, 0, '6020102003', '928', 0, '', '', 0, 0, 0, 'Raja Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1720, 0, '6020102003', '929', 0, '', '', 0, 0, 0, 'Ny. Raja Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1721, 0, '6020102003', '930', 0, '', '', 0, 0, 0, 'Tamu Negara Jerman', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1722, 0, '6020102003', '931', 0, '', '', 0, 0, 0, 'Isteri Tamu Negara Jerman', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1723, 0, '6020102003', '932', 0, '', '', 0, 0, 0, 'Kanselir Jerman', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1724, 0, '6020102003', '933', 0, '', '', 0, 0, 0, 'Sultan Brunei', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1725, 0, '6020102003', '934', 0, '', '', 0, 0, 0, 'Presiden Marambih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1726, 0, '6020102003', '935', 0, '', '', 0, 0, 0, 'Presiden Polandia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1727, 0, '6020102003', '936', 0, '', '', 0, 0, 0, 'Ny. Presiden Polandia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1728, 0, '6020102003', '937', 0, '', '', 0, 0, 0, 'PM Selandia Baru', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1729, 0, '6020102003', '938', 0, '', '', 0, 0, 0, 'Pendamping PM Selandia Baru', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1730, 0, '6020102003', '939', 0, '', '', 0, 0, 0, 'Xanana Gusmou, Presiden Timor Leste', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1731, 0, '6020102003', '940', 0, '', '', 0, 0, 0, 'Isteri Presiden Timor Leste', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1732, 0, '6020102003', '941', 0, '', '', 0, 0, 0, 'Presiden Tajikistan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1733, 0, '6020102003', '942', 0, '', '', 0, 0, 0, 'Presiden Algeria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1734, 0, '6020102003', '943', 0, '', '', 0, 0, 0, 'Tamu Negara Wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1735, 0, '6020102003', '944', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1736, 0, '6020102003', '945', 0, '', '', 0, 0, 0, 'PM Korea Selatan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1737, 0, '6020102003', '946', 0, '', '', 0, 0, 0, 'Ny. PM Kora Selatan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1738, 0, '6020102003', '947', 0, '', '', 0, 0, 0, 'PM Vietnam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1739, 0, '6020102003', '948', 0, '', '', 0, 0, 0, 'Ny. Presiden Singapura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1740, 0, '6020102003', '949', 0, '', '', 0, 0, 0, 'Presiden Gambia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1741, 0, '6020102003', '950', 0, '', '', 0, 0, 0, 'Ny. PM China', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1742, 0, '6020102003', '951', 0, '', '', 0, 0, 0, 'Raja Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1743, 0, '6020102003', '952', 0, '', '', 0, 0, 0, 'Permaisuri Raja Malaysia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1744, 0, '6020102003', '953', 0, '', '', 0, 0, 0, 'Presiden Singapura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1745, 0, '6020102003', '954', 0, '', '', 0, 0, 0, 'Pendamping Presiden Afrika Selatan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1746, 0, '6020102003', '955', 0, '', '', 0, 0, 0, 'Pendamping Presiden Hongaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1747, 0, '6020102003', '956', 0, '', '', 0, 0, 0, 'Presiden Chili', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1748, 0, '6020102003', '957', 0, '', '', 0, 0, 0, 'Presiden Iran ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1749, 0, '6020102003', '958', 0, '', '', 0, 0, 0, 'Presiden China', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1750, 0, '6020102003', '959', 0, '', '', 0, 0, 0, 'Presiden Hongaria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1751, 0, '6020102003', '960', 0, '', '', 0, 0, 0, 'Tamu Negara', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1752, 0, '6020102003', '961', 0, '', '', 0, 0, 0, 'Ne Win, Presiden Burma', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1753, 0, '6020102003', '962', 0, '', '', 0, 0, 0, 'Lee Kwan Yeuw, PM Singapura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1754, 0, '6020102003', '963', 0, '', '', 0, 0, 0, 'Ferdinand Marcos, Presiden Philipina', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1755, 0, '6020102003', '964', 0, '', '', 0, 0, 0, 'Ny. Imelda Marcos', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1756, 0, '6020102003', '965', 0, '', '', 0, 0, 0, 'Tamu Negara Pria', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1757, 0, '6020102003', '966', 0, '', '', 0, 0, 0, 'Tamu Negara Etiopia', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1758, 0, '6020102003', '967', 0, '', '', 0, 0, 0, 'Ny. Newia, Burma', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1759, 0, '6020102003', '968', 0, '', '', 0, 0, 0, 'Shah Iran', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1760, 0, '6020102003', '969', 0, '', '', 0, 0, 0, 'Ny. PM Singapura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1761, 0, '6020102003', '970', 0, '', '', 0, 0, 0, 'Presiden Iran', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1762, 0, '6020102003', '971', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1763, 0, '6020102003', '972', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1764, 0, '6020102003', '973', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1765, 0, '6020102003', '974', 0, '', '', 0, 0, 0, 'HM. Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1766, 0, '6020102003', '975', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1767, 0, '6020102003', '976', 0, '', '', 0, 0, 0, 'BA-62/Setpres/D-1/Um/PB.02/07/2022', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1768, 0, '6020102003', '977', 0, '', '', 0, 0, 0, 'Soedarmono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1769, 0, '6020102003', '978', 0, '', '', 0, 0, 0, 'BJ Habibie', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1770, 0, '6020102003', '979', 0, '', '', 0, 0, 0, 'Ibu Ainun Habibie', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1771, 0, '6020102003', '980', 0, '', '', 0, 0, 0, 'Presiden HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1772, 0, '6020102003', '981', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1773, 0, '6020102003', '982', 0, '', '', 0, 0, 0, 'Sudarmono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1774, 0, '6020102003', '983', 0, '', '', 0, 0, 0, 'Adam Malik', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1775, 0, '6020102003', '984', 0, '', '', 0, 0, 0, 'Ny. Nelly Adam Malik', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1776, 0, '6020102003', '985', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1777, 0, '6020102003', '986', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1778, 0, '6020102003', '987', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1779, 0, '6020102003', '988', 0, '', '', 0, 0, 0, 'Ibu Sudarmono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1780, 0, '6020102003', '989', 0, '', '', 0, 0, 0, ' Ibu Sudharmono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1781, 0, '6020102003', '990', 0, '', '', 0, 0, 0, 'Ny. Adam Malik', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1782, 0, '6020102003', '991', 0, '', '', 0, 0, 0, 'BJ Habibie', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1783, 0, '6020102003', '992', 0, '', '', 0, 0, 0, 'Ainun Habibie', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1784, 0, '6020102003', '993', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1785, 0, '6020102003', '994', 0, '', '', 0, 0, 0, 'Ny. Wira Hadikusuma', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1786, 0, '6020102003', '995', 0, '', '', 0, 0, 0, 'Soedarmono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1787, 0, '6020102003', '996', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1788, 0, '6020102003', '997', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1789, 0, '6020102003', '998', 0, '', '', 0, 0, 0, 'Ny. Try Sutrisno', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1790, 0, '6020102003', '999', 0, '', '', 0, 0, 0, 'Ibu Sudarmono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1791, 0, '6020102003', '1000', 0, '', '', 0, 0, 0, 'Soetikno L', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1792, 0, '6020102003', '1001', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1793, 0, '6020102003', '1002', 0, '', '', 0, 0, 0, 'Try Sutrisno', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1794, 0, '6020102003', '1003', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1795, 0, '6020102003', '1004', 0, '', '', 0, 0, 0, 'Ibu Sudarmono', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1796, 0, '6020102003', '1005', 0, '', '', 0, 0, 0, 'Umar Wirahadikusuma', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1797, 0, '6020102003', '1006', 0, '', '', 0, 0, 0, 'Ibu Umar Wirahadi kusuma', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1798, 0, '6020102003', '1007', 0, '', '', 0, 0, 0, 'Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1799, 0, '6020102003', '1008', 0, '', '', 0, 0, 0, 'MGR Sugiyo Pranoto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1800, 0, '6020102003', '1009', 0, '', '', 0, 0, 0, 'Dr. F. Lumban Tobing', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1801, 0, '6020102003', '1010', 0, '', '', 0, 0, 0, 'Ki Hajar Dewantara', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1802, 0, '6020102003', '1011', 0, '', '', 0, 0, 0, 'Marsda Adi Sutjipto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1803, 0, '6020102003', '1012', 0, '', '', 0, 0, 0, 'W.R. Soepratman', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1804, 0, '6020102003', '1013', 0, '', '', 0, 0, 0, 'HOS Tjokroaminoto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1805, 0, '6020102003', '1014', 0, '', '', 0, 0, 0, 'Supriyadi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1806, 0, '6020102003', '1015', 0, '', '', 0, 0, 0, 'H. Samanhudi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1807, 0, '6020102003', '1016', 0, '', '', 0, 0, 0, 'KH. Wahid Hasyim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1808, 0, '6020102003', '1017', 0, '', '', 0, 0, 0, 'KH. Hasyim Ashari', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1809, 0, '6020102003', '1018', 0, '', '', 0, 0, 0, 'Dr. Cipto Mangunkusumo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1810, 0, '6020102003', '1019', 0, '', '', 0, 0, 0, 'Ir. H. Juanda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1811, 0, '6020102003', '1020', 0, '', '', 0, 0, 0, 'Dr. Samratulangi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1812, 0, '6020102003', '1021', 0, '', '', 0, 0, 0, 'KH. Ahmad Dahlan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1813, 0, '6020102003', '1022', 0, '', '', 0, 0, 0, 'KH. Ahmad Dahlan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1814, 0, '6020102003', '1023', 0, '', '', 0, 0, 0, 'Jenderal Gatot Subroto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1815, 0, '6020102003', '1024', 0, '', '', 0, 0, 0, 'Prof. Muh Yamin', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1816, 0, '6020102003', '1025', 0, '', '', 0, 0, 0, 'Tengku Umar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1817, 0, '6020102003', '1026', 0, '', '', 0, 0, 0, 'KH. Mas Mansyur', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1818, 0, '6020102003', '1027', 0, '', '', 0, 0, 0, 'Hj. Sinta Nuriah Abdurrahman Wahid', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1819, 0, '6020102003', '1028', 0, '', '', 0, 0, 0, 'KH Abdurrahman Wahid', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1820, 0, '6020102003', '1029', 0, '', '', 0, 0, 0, 'Ibu Hamzah Haz', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1821, 0, '6020102003', '1030', 0, '', '', 0, 0, 0, 'Taufik Kiemas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1822, 0, '6020102003', '1031', 0, '', '', 0, 0, 0, 'Megawati Soekarnoputri', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1823, 0, '6020102003', '1032', 0, '', '', 0, 0, 0, 'Ibu Sinta Nuriah Abdurrahman Wahid', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1824, 0, '6020102003', '1033', 0, '', '', 0, 0, 0, 'Lukisan Pria berkacamata', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1825, 0, '6020102003', '1034', 0, '', '', 0, 0, 0, 'HM Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1826, 0, '6020102003', '1035', 0, '', '', 0, 0, 0, 'Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1827, 0, '6020102003', '1036', 0, '', '', 0, 0, 0, 'Soeharto dan Ibu Tien Soeharto', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1828, 0, '6020102003', '1037', 0, '', '', 0, 0, 0, 'Lukisan RA. Kartini setengah badan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1829, 0, '6020102999', '1', 0, '', '', 0, 0, 0, 'Lontar Boom uk. 43 x 30', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1830, 0, '6020102999', '2', 0, '', '', 0, 0, 0, 'Rasamala Boom Uk. 43 x 30', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1831, 0, '6020102999', '3', 0, '', '', 0, 0, 0, 'Bamboo uk. 43 x 30', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1832, 0, '6020102999', '4', 0, '', '', 0, 0, 0, 'Timbel Boom uk. 43 x 30', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1833, 0, '6020102999', '5', 0, '', '', 0, 0, 0, 'Aren Boom uk. 43 x 30', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1834, 0, '6020102999', '6', 0, '', '', 0, 0, 0, 'Waringin Boom (pensil kertas uk.43x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1835, 0, '6020102999', '7', 0, '', '', 0, 0, 0, 'Kedawong Boom (pensil kertas uk.43x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1836, 0, '6020102999', '8', 0, '', '', 0, 0, 0, 'Doerian Boom (pensil kertas uk.43x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1837, 0, '6020102999', '9', 0, '', '', 0, 0, 0, 'Pinang Boom (pensil kertas uk.43x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1838, 0, '6020102999', '10', 0, '', '', 0, 0, 0, 'Gubuk Derita (pensil kertas uk.43x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1839, 0, '6020102999', '11', 0, '', '', 0, 0, 0, 'Kampung Nan Damai (pensil kertas uk.43x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1840, 0, '6020102999', '12', 0, '', '', 0, 0, 0, 'Batang Pohon (pensil kertas uk.43x30)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1841, 0, '6020102999', '13', 0, '', '', 0, 0, 0, 'Motif-motif batik uk. 105 x 250', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1842, 0, '6020102999', '14', 0, '', '', 0, 0, 0, 'Motif-motif batik uk. 105 x 250', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1843, 0, '6020102999', '15', 0, '', '', 0, 0, 0, 'The Zipper Club', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1844, 0, '6020102999', '16', 0, '', '', 0, 0, 0, 'Dua Orang Mengendong', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1845, 0, '6020102999', '17', 0, '', '', 0, 0, 0, 'Museum', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1846, 0, '6020102999', '18', 0, '', '', 0, 0, 0, 'Lukisan Batik', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1847, 0, '6020102999', '19', 0, '', '', 0, 0, 0, 'Perahu Dayung', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1848, 0, '6020102999', '20', 0, '', '', 0, 0, 0, 'Lukisan Bali Kuno', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1849, 0, '6020102999', '21', 0, '', '', 0, 0, 0, 'Lukisan Bali Kuno', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1850, 0, '6020102999', '22', 0, '', '', 0, 0, 0, 'Lukisan Bali Kuno', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1851, 0, '6020102999', '23', 0, '', '', 0, 0, 0, 'Abstrak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1852, 0, '6020102999', '24', 0, '', '', 0, 0, 0, 'Perahu Layar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(1853, 0, '6020102999', '25', 0, '', '', 0, 0, 0, 'Lukisan India', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1854, 0, '6020102999', '26', 0, '', '', 0, 0, 0, 'Wayang-wayang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1855, 0, '6020201001', '1', 0, '', '', 0, 0, 0, 'Patung Dwarapala, uk 55x65x127 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1856, 0, '6020201001', '2', 0, '', '', 0, 0, 0, 'Patung Dwarapala, Uk. 28x37x65 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1857, 0, '6020201001', '3', 0, '', '', 0, 0, 0, 'Patung Dwarapala, Uk. 28x37x65 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1858, 0, '6020201001', '4', 0, '', '', 0, 0, 0, 'Patung Rhama, uk.35x38x130 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1859, 0, '6020201001', '5', 0, '', '', 0, 0, 0, 'Patung Banaspati, Uk. 100 x 68 x  175', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1860, 0, '6020201001', '6', 0, '', '', 0, 0, 0, 'Patung Banaspati, uk 100 x 62 x 175', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1861, 0, '6020201001', '7', 0, '', '', 0, 0, 0, 'Patung Awalokiteswara, Uk. 130X100x190', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1862, 0, '6020201001', '8', 0, '', '', 0, 0, 0, 'Patung Petani, Uk. 63 x 63 x 118', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1863, 0, '6020201001', '9', 0, '', '', 0, 0, 0, 'Patung Petani, Uk. 62 x 62 x 60 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1864, 0, '6020201001', '10', 0, '', '', 0, 0, 0, 'Patung Singa, Uk 100 x 45 x50', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1865, 0, '6020201001', '11', 0, '', '', 0, 0, 0, 'Patung Gajah Mada, Uk. 16x16x47 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1866, 0, '6020201001', '12', 0, '', '', 0, 0, 0, 'Patung Pria Setengah Badan, Uk.7x7x17,5 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1867, 0, '6020201001', '13', 0, '', '', 0, 0, 0, 'Patung Wanita Setengah Badan, Uk 7x7x17,5 Cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1868, 0, '6020201001', '14', 0, '', '', 0, 0, 0, 'Patung Singa, Uk. 100x45x50 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1869, 0, '6020201001', '15', 0, '', '', 0, 0, 0, 'Patung Wanita Membawa sesaji, uk 32x30x104', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1870, 0, '6020201001', '16', 0, '', '', 0, 0, 0, 'Patung Dhyani Bodisattva, Uk 75x83x170 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1871, 0, '6020201001', '17', 0, '', '', 0, 0, 0, 'Patung Petani Istirahat, Uk.26x26x60 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1872, 0, '6020201001', '18', 0, '', '', 0, 0, 0, 'Patung Wanita Bersimpuh, Uk 53x53x100', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1873, 0, '6020201001', '19', 0, '', '', 0, 0, 0, 'Patung Wanita Membawa Sesaji, Uk. 32x28x101', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1874, 0, '6020201001', '20', 0, '', '', 0, 0, 0, 'Patung Dewi saraswati, Uk 44x44x247', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1875, 0, '6020201001', '21', 0, '', '', 0, 0, 0, 'Patung Garuda Wisnu Kencana, Uk.86x48x177', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1876, 0, '6020201001', '22', 0, '', '', 0, 0, 0, 'Patung Raksasa, Uk 30x30x100', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1877, 0, '6020201001', '23', 0, '', '', 0, 0, 0, 'Patung Burung Hantu, uk. 40x40x150', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1878, 0, '6020201001', '24', 0, '', '', 0, 0, 0, 'Patung Dwarapala, Uk. 75x80x150', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1879, 0, '6020201001', '25', 0, '', '', 0, 0, 0, 'Patung Tiga Bersaudara, Uk. 25x20x48 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1880, 0, '6020201001', '26', 0, '', '', 0, 0, 0, 'Patung Dwarapala, uk. 70x80x147', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1881, 0, '6020201001', '27', 0, '', '', 0, 0, 0, 'Patung Dwarapala, Uk 75x85x160', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1882, 0, '6020201001', '28', 0, '', '', 0, 0, 0, 'Patung Dwarapala, Uk. 55x65x125', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1883, 0, '6020201001', '29', 0, '', '', 0, 0, 0, 'Patung Dwarapala, Uk. 70x80x138', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1884, 0, '6020201001', '30', 0, '', '', 0, 0, 0, 'Patung Ganesha,Uk. 66 x 83 x130 Cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1885, 0, '6020201001', '31', 0, '', '', 0, 0, 0, 'Patung Dwarapala, uk 55x65x126 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1886, 0, '6020201001', '32', 0, '', '', 0, 0, 0, 'Patung Dwarapala, Uk 53x63x125', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1887, 0, '6020201002', '1', 0, '', '', 0, 0, 0, 'Patung Jatayu uk. 30 x 23 x 46', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1888, 0, '6020201002', '2', 0, '', '', 0, 0, 0, 'Patung Rahwana Uk. 53 x 50 x 35', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1889, 0, '6020201002', '3', 0, '', '', 0, 0, 0, 'Patung Raksasa Bersayap Uk. 55 x 20 x 39', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1890, 0, '6020201002', '4', 0, '', '', 0, 0, 0, 'Patung Garuda Uk. 36 x 34 x 80 ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1891, 0, '6020201002', '5', 0, '', '', 0, 0, 0, 'Patung Orang Meniup Seruling uk. 20 x 19 x 20', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1892, 0, '6020201002', '6', 0, '', '', 0, 0, 0, 'Patung Penari Bali Pria Uk. 25 x 15 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1893, 0, '6020201002', '7', 0, '', '', 0, 0, 0, 'Patung Penari Janger Uk. 17 x 12 x 41', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1894, 0, '6020201002', '8', 0, '', '', 0, 0, 0, 'Patung Garuda Uk. 34 x 42 x 65', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1895, 0, '6020201002', '9', 0, '', '', 0, 0, 0, 'Patung Garuda 50 x 43 x 100', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1896, 0, '6020201002', '10', 0, '', '', 0, 0, 0, 'Patung Garuda Uk. 30 x 40 x 70', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1897, 0, '6020201002', '11', 0, '', '', 0, 0, 0, 'Dalam Pelukan Kakek uk. 48 x 29 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1898, 0, '6020201002', '12', 0, '', '', 0, 0, 0, 'Patung Rama Shinta uk. 17 x 9 x 33', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1899, 0, '6020201002', '13', 0, '', '', 0, 0, 0, 'Miniatur Candi Prambanan uk. 21 x 21 x 27', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1900, 0, '6020201002', '14', 0, '', '', 0, 0, 0, 'Patung Garuda Uk. 26 x 26 x 55', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1901, 0, '6020201002', '15', 0, '', '', 0, 0, 0, 'Patung Penari Janger Setengah Badan uk 25 x15 x 50', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1902, 0, '6020201002', '16', 0, '', '', 0, 0, 0, 'Patung Rhama dan Shinta uk 16 x 8 x 41', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1903, 0, '6020201002', '17', 0, '', '', 0, 0, 0, 'Patung Bangau uk. 24 x24 x30', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1904, 0, '6020201002', '18', 0, '', '', 0, 0, 0, 'Patung Penari Kipas uk. 38 x 54', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1905, 0, '6020201002', '19', 0, '', '', 0, 0, 0, 'Patung Rama dan Raksasa Uk. 31 x 12 x 40', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1906, 0, '6020201002', '20', 0, '', '', 0, 0, 0, 'Asbak Telapak Tangan Uk. 35 x 16', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1907, 0, '6020201002', '21', 0, '', '', 0, 0, 0, 'Patung Raksasa dan Dewa Wisnu Uk. 20 x 18 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1908, 0, '6020201002', '22', 0, '', '', 0, 0, 0, 'Patung Adam dan Hawa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1909, 0, '6020201002', '23', 0, '', '', 0, 0, 0, 'Patung Rama Shinta uk. 40 x 20 x 85', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1910, 0, '6020201002', '24', 0, '', '', 0, 0, 0, 'Patung Rama dan Shinta Uk. 19 x 33', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1911, 0, '6020201002', '25', 0, '', '', 0, 0, 0, 'Patung Penari Kipas Pria Uk. 17 x 8 x 29', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1912, 0, '6020201002', '26', 0, '', '', 0, 0, 0, 'Patung Adam dan Hawa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1913, 0, '6020201002', '27', 0, '', '', 0, 0, 0, 'Patung Garuda Uk. 90 x 190', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1914, 0, '6020201002', '28', 0, '', '', 0, 0, 0, 'Patung Lima Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1915, 0, '6020201002', '29', 0, '', '', 0, 0, 0, 'Patung Kuda 62 x 15 x 50', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1916, 0, '6020201002', '30', 0, '', '', 0, 0, 0, 'Patung Pemain Gendang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1917, 0, '6020201002', '31', 0, '', '', 0, 0, 0, 'Patung orang melahirkan Uk. 12 x 7 x 28', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1918, 0, '6020201002', '32', 0, '', '', 0, 0, 0, 'Kuda Uk. 50 x 18 x 43', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1919, 0, '6020201002', '33', 0, '', '', 0, 0, 0, 'Patung Dewi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1920, 0, '6020201002', '34', 0, '', '', 0, 0, 0, 'Patung Ikan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1921, 0, '6020201002', '35', 0, '', '', 0, 0, 0, 'Patung Ikan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1922, 0, '6020201002', '36', 0, '', '', 0, 0, 0, 'Patung Kepala Jatayu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1923, 0, '6020201002', '37', 0, '', '', 0, 0, 0, 'Tiga Burung Uk. 43 x43 x 55', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1924, 0, '6020201002', '38', 0, '', '', 0, 0, 0, 'Burung Uk. 44 x 42 x 62', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1925, 0, '6020201002', '39', 0, '', '', 0, 0, 0, 'Sapi dan Anjing uk 70 x 40 x 27', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1926, 0, '6020201002', '40', 0, '', '', 0, 0, 0, 'Patung Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1927, 0, '6020201002', '41', 0, '', '', 0, 0, 0, 'Patung Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1928, 0, '6020201002', '42', 0, '', '', 0, 0, 0, 'Patung Ikan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1929, 0, '6020201002', '43', 0, '', '', 0, 0, 0, 'Garuda Uk. 40 x 20 x 50', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1930, 0, '6020201002', '44', 0, '', '', 0, 0, 0, 'Patung Kakek Membawa Tas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1931, 0, '6020201002', '45', 0, '', '', 0, 0, 0, 'Burung Bangau Uk. 46 x 26 x 60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1932, 0, '6020201002', '46', 0, '', '', 0, 0, 0, 'Patung Meniup Seruling', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1933, 0, '6020201002', '47', 0, '', '', 0, 0, 0, 'Dua ekor burung dan anaknya Uk. 50 x 40 x 57', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1934, 0, '6020201002', '48', 0, '', '', 0, 0, 0, 'Patung Pria dan Wanita', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1935, 0, '6020201002', '49', 0, '', '', 0, 0, 0, 'Patung Kakek Membawa Kapak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1936, 0, '6020201002', '50', 0, '', '', 0, 0, 0, 'Relief Motif Ganesha', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1937, 0, '6020201002', '51', 0, '', '', 0, 0, 0, 'monyet uk. 55 x 28', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1938, 0, '6020201002', '52', 0, '', '', 0, 0, 0, 'Patung Katak Uk 18 x 10 x 37', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1939, 0, '6020201002', '53', 0, '', '', 0, 0, 0, 'Patung Rhama Meniup Terompet', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1940, 0, '6020201002', '54', 0, '', '', 0, 0, 0, 'Patung Garuda Wisnu Kencana', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1941, 0, '6020201002', '55', 0, '', '', 0, 0, 0, 'Patung Dewi Saraswati', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1942, 0, '6020201002', '56', 0, '', '', 0, 0, 0, 'Patung seorang dewi uk. 23 x 12 x 138', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1943, 0, '6020201002', '57', 0, '', '', 0, 0, 0, 'Patung Dewi Uk. 21 x 13 x 65', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1944, 0, '6020201002', '58', 0, '', '', 0, 0, 0, 'Patung 3 Ekor burung dengan 1 telur Uk. 45 x 20  x 32', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1945, 0, '6020201002', '59', 0, '', '', 0, 0, 0, 'Patung 3 ekor burung dengan 2 telur Uk. 39 x 30 x 35', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1946, 0, '6020201002', '60', 0, '', '', 0, 0, 0, 'Patung Ikan Mas Koki', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1947, 0, '6020201002', '61', 0, '', '', 0, 0, 0, 'Patung 2 Ekor Burung Bangau uk. 35 x 15 x 48', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1948, 0, '6020201002', '62', 0, '', '', 0, 0, 0, 'Patung 2 Orang Perempuan Uk. 19 x 8 x 70', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1949, 0, '6020201002', '63', 0, '', '', 0, 0, 0, 'Patung kuda bersusun', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1950, 0, '6020201002', '64', 0, '', '', 0, 0, 0, 'Patung Raksasa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1951, 0, '6020201002', '65', 0, '', '', 0, 0, 0, 'Patung Burung Garuda diatas tengkorak dan ular', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1952, 0, '6020201002', '66', 0, '', '', 0, 0, 0, 'Patung Raksasa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1953, 0, '6020201002', '67', 0, '', '', 0, 0, 0, 'Patung Asmat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1954, 0, '6020201002', '68', 0, '', '', 0, 0, 0, 'Patung sepasang Bebek uk. 19 x 12 x17', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1955, 0, '6020201002', '69', 0, '', '', 0, 0, 0, 'Patung Sepasang Bebek uk. 16 x 12 x13', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1956, 0, '6020201002', '70', 0, '', '', 0, 0, 0, 'Patung Bebek 43 x 12 x 19', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1957, 0, '6020201002', '71', 0, '', '', 0, 0, 0, 'Patung Bebek uk. 40 x 13,5 x 17', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1958, 0, '6020201002', '72', 0, '', '', 0, 0, 0, 'Patung Anjing uk 20 x 28', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1959, 0, '6020201002', '73', 0, '', '', 0, 0, 0, 'Patung Monyet Bersusun', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1960, 0, '6020201002', '74', 0, '', '', 0, 0, 0, 'Patung Singa Terbang uk ..74 x 62', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1961, 0, '6020201002', '75', 0, '', '', 0, 0, 0, 'Patung Rama Sinta 1/2 badan uk ..24 x 33', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1962, 0, '6020201002', '76', 0, '', '', 0, 0, 0, 'Burung Jatayu uk. 28 x 30 x 94', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1963, 0, '6020201002', '77', 0, '', '', 0, 0, 0, 'Penari Kipas uk 15 x 17', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1964, 0, '6020201002', '78', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1965, 0, '6020201002', '79', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1966, 0, '6020201002', '80', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1967, 0, '6020201002', '81', 0, '', '', 0, 0, 0, 'Patung Jatayu (Uk.38x30x67)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1968, 0, '6020201002', '82', 0, '', '', 0, 0, 0, 'Batara Wisnu (Uk.18x15x42)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1969, 0, '6020201002', '83', 0, '', '', 0, 0, 0, 'Patung Seorang Dewa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1970, 0, '6020201002', '84', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1971, 0, '6020201002', '85', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1972, 0, '6020201002', '86', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1973, 0, '6020201002', '87', 0, '', '', 0, 0, 0, 'Patung Raksasa Bersayap (Uk.50x34x95)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1974, 0, '6020201002', '88', 0, '', '', 0, 0, 0, 'Patung Mahatma Gandhi (Uk.18x15x31)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1975, 0, '6020201002', '89', 0, '', '', 0, 0, 0, 'Patung Garuda (Uk.40x50x85)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1976, 0, '6020201002', '90', 0, '', '', 0, 0, 0, 'Patung Jagabaya (Uk.23x11x37)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1977, 0, '6020201002', '91', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1978, 0, '6020201002', '92', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1979, 0, '6020201002', '93', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1980, 0, '6020201002', '94', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1981, 0, '6020201002', '95', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1982, 0, '6020201002', '96', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1983, 0, '6020201002', '97', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1984, 0, '6020201002', '98', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1985, 0, '6020201002', '99', 0, '', '', 0, 0, 0, 'Patung Penculikan Sinta oleh Rahwana', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1986, 0, '6020201002', '100', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1987, 0, '6020201002', '101', 0, '', '', 0, 0, 0, 'Patung Orang Meniup Seruling', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1988, 0, '6020201002', '102', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1989, 0, '6020201002', '103', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1990, 0, '6020201002', '104', 0, '', '', 0, 0, 0, 'Patung Hercules Taotaomona', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1991, 0, '6020201002', '105', 0, '', '', 0, 0, 0, 'Patung Bangau Uk.40x20x60', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1992, 0, '6020201002', '106', 0, '', '', 0, 0, 0, 'Patung Gajah Thailand', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1993, 0, '6020201002', '107', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1994, 0, '6020201002', '108', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1995, 0, '6020201002', '109', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1996, 0, '6020201002', '110', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1997, 0, '6020201002', '111', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1998, 0, '6020201002', '112', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(1999, 0, '6020201002', '113', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2000, 0, '6020201002', '114', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2001, 0, '6020201002', '115', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2002, 0, '6020201002', '116', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2003, 0, '6020201002', '117', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2004, 0, '6020201002', '118', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2005, 0, '6020201002', '119', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2006, 0, '6020201002', '120', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2007, 0, '6020201002', '121', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2008, 0, '6020201002', '122', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2009, 0, '6020201002', '123', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2010, 0, '6020201002', '124', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2011, 0, '6020201002', '125', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2012, 0, '6020201002', '126', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2013, 0, '6020201002', '127', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2014, 0, '6020201002', '128', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2015, 0, '6020201002', '129', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2016, 0, '6020201002', '130', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2017, 0, '6020201002', '131', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2018, 0, '6020201002', '132', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2019, 0, '6020201002', '133', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2020, 0, '6020201002', '134', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2021, 0, '6020201002', '135', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2022, 0, '6020201002', '136', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2023, 0, '6020201002', '137', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2024, 0, '6020201002', '138', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2025, 0, '6020201002', '139', 0, '', '', 0, 0, 0, 'Patung Budha', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2026, 0, '6020201002', '140', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2027, 0, '6020201002', '141', 0, '', '', 0, 0, 0, 'Patung Tiga Rusa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2028, 0, '6020201002', '142', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2029, 0, '6020201002', '143', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2030, 0, '6020201002', '144', 0, '', '', 0, 0, 0, 'Patung Ikan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2031, 0, '6020201002', '145', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2032, 0, '6020201002', '146', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2033, 0, '6020201002', '147', 0, '', '', 0, 0, 0, 'Patung Suku Asmat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2034, 0, '6020201002', '148', 0, '', '', 0, 0, 0, 'Patung Burung diatas tengkorak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2035, 0, '6020201002', '149', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2036, 0, '6020201002', '150', 0, '', '', 0, 0, 0, 'Patung Burung diatas tengkorak dan ular', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2037, 0, '6020201002', '151', 0, '', '', 0, 0, 0, 'Patung Wanita Menyapu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2038, 0, '6020201002', '152', 0, '', '', 0, 0, 0, 'Patung Wanita Setengah Badan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2039, 0, '6020201002', '153', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2040, 0, '6020201002', '154', 0, '', '', 0, 0, 0, 'Patung Kerbau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2041, 0, '6020201002', '155', 0, '', '', 0, 0, 0, 'Patung Wanita Mengayak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2042, 0, '6020201002', '156', 0, '', '', 0, 0, 0, 'Patung Rama & Sinta Setengah Badan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2043, 0, '6020201002', '157', 0, '', '', 0, 0, 0, 'Patung Memohon', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2044, 0, '6020201002', '158', 0, '', '', 0, 0, 0, 'Patung Manusia Bersusun', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2045, 0, '6020201002', '159', 0, '', '', 0, 0, 0, 'Patung Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2046, 0, '6020201002', '160', 0, '', '', 0, 0, 0, 'Patung Bebek Hijau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2047, 0, '6020201002', '161', 0, '', '', 0, 0, 0, 'Pulang dari pasar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2048, 0, '6020201002', '162', 0, '', '', 0, 0, 0, 'Topeng Wanita Bali uk 10 x 17', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2049, 0, '6020201002', '163', 0, '', '', 0, 0, 0, 'Topeng Pria Bali uk 11 x 15', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2050, 0, '6020201002', '164', 0, '', '', 0, 0, 0, 'Patung Garuda Wisnu Kencana uk 14 x 12 x 21', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2051, 0, '6020201002', '165', 0, '', '', 0, 0, 0, 'Patung Penganti Pria uk 14 x 10 x 24', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2052, 0, '6020201002', '166', 0, '', '', 0, 0, 0, 'Patung Garuda Wisnu Kencana uk 20 x 12 x 52', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2053, 0, '6020201002', '167', 0, '', '', 0, 0, 0, 'Burung uk 11 x 7 x 22', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2054, 0, '6020201002', '168', 0, '', '', 0, 0, 0, 'Patung Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2055, 0, '6020201002', '169', 0, '', '', 0, 0, 0, 'Patung Wanita Menyunggi Rangkaian Buah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2056, 0, '6020201002', '170', 0, '', '', 0, 0, 0, 'Patung Sepasang Angsa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2057, 0, '6020201002', '171', 0, '', '', 0, 0, 0, 'Patung Wanita Memangku Bayi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2058, 0, '6020201002', '172', 0, '', '', 0, 0, 0, 'Patung seorang kakek uk 18 x 9 x 34', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2059, 0, '6020201002', '173', 0, '', '', 0, 0, 0, 'Patung katak uk 18 x 8 x 37', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2060, 0, '6020201002', '174', 0, '', '', 0, 0, 0, 'Belalang cangcorang uk. 15 x 10 x 42', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2061, 0, '6020201002', '175', 0, '', '', 0, 0, 0, 'patung Bangau uk. 25 x 14 x 50', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2062, 0, '6020201002', '176', 0, '', '', 0, 0, 0, 'Patung wanita Telanjang Dada', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2063, 0, '6020201002', '177', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2064, 0, '6020201002', '178', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2065, 0, '6020201002', '179', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2066, 0, '6020201002', '180', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2067, 0, '6020201002', '181', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2068, 0, '6020201002', '182', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2069, 0, '6020201002', '183', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2070, 0, '6020201002', '184', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2071, 0, '6020201002', '185', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2072, 0, '6020201002', '186', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2073, 0, '6020201002', '187', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2074, 0, '6020201002', '188', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2075, 0, '6020201002', '189', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2076, 0, '6020201002', '190', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2077, 0, '6020201002', '191', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2078, 0, '6020201002', '192', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2079, 0, '6020201002', '193', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2080, 0, '6020201002', '194', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2081, 0, '6020201002', '195', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2082, 0, '6020201002', '196', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2083, 0, '6020201002', '197', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2084, 0, '6020201002', '198', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2085, 0, '6020201002', '199', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2086, 0, '6020201002', '200', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2087, 0, '6020201002', '201', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2088, 0, '6020201002', '202', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2089, 0, '6020201002', '203', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2090, 0, '6020201002', '204', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2091, 0, '6020201002', '205', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2092, 0, '6020201002', '206', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2093, 0, '6020201002', '207', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(2094, 0, '6020201002', '208', 0, '', '', 0, 0, 0, 'Patung Garuda (Uk.43x40x65)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2095, 0, '6020201002', '209', 0, '', '', 0, 0, 0, 'Patung Burung (Uk.36x46x50)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2096, 0, '6020201002', '210', 0, '', '', 0, 0, 0, 'Burung Garuda (Uk.55x60x123)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2097, 0, '6020201002', '211', 0, '', '', 0, 0, 0, 'Patung Rama Shinta (Uk.40x21x63)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2098, 0, '6020201002', '212', 0, '', '', 0, 0, 0, 'Patung Garuda (Uk.60x50x135)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2099, 0, '6020201002', '213', 0, '', '', 0, 0, 0, 'Patung Burung Bangau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2100, 0, '6020201002', '214', 0, '', '', 0, 0, 0, 'Patung Kepala Naga Bermahkota', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2101, 0, '6020201002', '215', 0, '', '', 0, 0, 0, 'Tugu Peta Indonesia (Uk.20x20x50)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2102, 0, '6020201002', '216', 0, '', '', 0, 0, 0, 'Patung Burung Hantu dan Naga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2103, 0, '6020201002', '217', 0, '', '', 0, 0, 0, 'Ukiran Bali Ceritera Ramayana', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2104, 0, '6020201002', '218', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2105, 0, '6020201002', '219', 0, '', '', 0, 0, 0, 'Patung Garuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2106, 0, '6020201002', '220', 0, '', '', 0, 0, 0, 'Ukiran Bali Pemutaran Gunung Mandara Giri', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2107, 0, '6020201002', '221', 0, '', '', 0, 0, 0, 'Ukiran Bali Cerita Ramayana', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2108, 0, '6020201002', '222', 0, '', '', 0, 0, 0, 'Patung Delapan Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2109, 0, '6020201002', '223', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2110, 0, '6020201002', '224', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2111, 0, '6020201002', '225', 0, '', '', 0, 0, 0, 'Patung Wanita Menari', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2112, 0, '6020201002', '226', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2113, 0, '6020201002', '227', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2114, 0, '6020201002', '228', 0, '', '', 0, 0, 0, 'Patung Rahwana', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2115, 0, '6020201002', '229', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2116, 0, '6020201002', '230', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2117, 0, '6020201002', '231', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2118, 0, '6020201002', '232', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2119, 0, '6020201002', '233', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2120, 0, '6020201002', '234', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2121, 0, '6020201002', '235', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2122, 0, '6020201002', '236', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2123, 0, '6020201002', '237', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2124, 0, '6020201002', '238', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2125, 0, '6020201002', '239', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2126, 0, '6020201002', '240', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2127, 0, '6020201002', '241', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2128, 0, '6020201002', '242', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2129, 0, '6020201002', '243', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2130, 0, '6020201002', '244', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2131, 0, '6020201002', '245', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2132, 0, '6020201002', '246', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2133, 0, '6020201002', '247', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2134, 0, '6020201002', '248', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2135, 0, '6020201002', '249', 0, '', '', 0, 0, 0, 'Patung Penari Bali', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2136, 0, '6020201002', '250', 0, '', '', 0, 0, 0, 'Patung Raksasa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2137, 0, '6020201002', '251', 0, '', '', 0, 0, 0, 'Patung Seorang Dewi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2138, 0, '6020201002', '252', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2139, 0, '6020201002', '253', 0, '', '', 0, 0, 0, 'Patung Tupai dan Kelapa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2140, 0, '6020201002', '254', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2141, 0, '6020201002', '255', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2142, 0, '6020201002', '256', 0, '', '', 0, 0, 0, 'Patung Kura-Kura', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2143, 0, '6020201002', '257', 0, '', '', 0, 0, 0, 'Patung Penyu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2144, 0, '6020201002', '258', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2145, 0, '6020201002', '259', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2146, 0, '6020201002', '260', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2147, 0, '6020201002', '261', 0, '', '', 0, 0, 0, 'Patung Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2148, 0, '6020201002', '262', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2149, 0, '6020201002', '263', 0, '', '', 0, 0, 0, 'Patung Ayam Jago/Pagi Nan Cerah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2150, 0, '6020201002', '264', 0, '', '', 0, 0, 0, 'Patung Bangau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2151, 0, '6020201002', '265', 0, '', '', 0, 0, 0, 'Patung Penari Kipas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2152, 0, '6020201002', '266', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2153, 0, '6020201002', '267', 0, '', '', 0, 0, 0, 'Peperangan antara Rahwana dan Laskar Rama', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2154, 0, '6020201002', '268', 0, '', '', 0, 0, 0, 'Patung Rama dan Sinta', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2155, 0, '6020201002', '269', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2156, 0, '6020201002', '270', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2157, 0, '6020201002', '271', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2158, 0, '6020201002', '272', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2159, 0, '6020201002', '273', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2160, 0, '6020201002', '274', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2161, 0, '6020201002', '275', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2162, 0, '6020201002', '276', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2163, 0, '6020201002', '277', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2164, 0, '6020201002', '278', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2165, 0, '6020201002', '279', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2166, 0, '6020201002', '280', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2167, 0, '6020201002', '281', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2168, 0, '6020201002', '282', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2169, 0, '6020201002', '283', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2170, 0, '6020201002', '284', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2171, 0, '6020201002', '285', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2172, 0, '6020201002', '286', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2173, 0, '6020201002', '287', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2174, 0, '6020201002', '288', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2175, 0, '6020201002', '289', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2176, 0, '6020201002', '290', 0, '', '', 0, 0, 0, 'Patung Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2177, 0, '6020201002', '291', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2178, 0, '6020201002', '292', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2179, 0, '6020201002', '293', 0, '', '', 0, 0, 0, 'Patung Tiga Ekor Burung', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2180, 0, '6020201002', '294', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2181, 0, '6020201002', '295', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2182, 0, '6020201002', '296', 0, '', '', 0, 0, 0, 'Patung Shinta dan Kijang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2183, 0, '6020201002', '297', 0, '', '', 0, 0, 0, 'Patung Seorang Dewi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2184, 0, '6020201002', '298', 0, '', '', 0, 0, 0, 'Patung Rama dan Sinta', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2185, 0, '6020201002', '299', 0, '', '', 0, 0, 0, 'Patung Gajah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2186, 0, '6020201002', '300', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2187, 0, '6020201002', '301', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2188, 0, '6020201002', '302', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2189, 0, '6020201002', '303', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2190, 0, '6020201002', '304', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2191, 0, '6020201002', '305', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2192, 0, '6020201002', '306', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2193, 0, '6020201002', '307', 0, '', '', 0, 0, 0, 'Patung Kepala', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2194, 0, '6020201002', '308', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2195, 0, '6020201002', '309', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2196, 0, '6020201002', '310', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2197, 0, '6020201002', '311', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2198, 0, '6020201002', '312', 0, '', '', 0, 0, 0, 'Topeng/Kedok', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2199, 0, '6020201002', '313', 0, '', '', 0, 0, 0, 'Topeng/kedok', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2200, 0, '6020201002', '314', 0, '', '', 0, 0, 0, 'Topeng', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2201, 0, '6020201002', '315', 0, '', '', 0, 0, 0, 'Topeng', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2202, 0, '6020201002', '316', 0, '', '', 0, 0, 0, 'Topeng', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2203, 0, '6020201002', '317', 0, '', '', 0, 0, 0, 'Topeng', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2204, 0, '6020201002', '318', 0, '', '', 0, 0, 0, 'Patung Penari Janger Setengah Badan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2205, 0, '6020201002', '319', 0, '', '', 0, 0, 0, 'Patung Beruang/Panda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2206, 0, '6020201002', '320', 0, '', '', 0, 0, 0, 'Patung Kerbau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2207, 0, '6020201002', '321', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2208, 0, '6020201002', '322', 0, '', '', 0, 0, 0, 'Patung Sepasang Bebek', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2209, 0, '6020201002', '323', 0, '', '', 0, 0, 0, 'Patung Dewi Sri', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2210, 0, '6020201002', '324', 0, '', '', 0, 0, 0, 'Topeng', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2211, 0, '6020201002', '325', 0, '', '', 0, 0, 0, 'Topeng Gatutkaca', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2212, 0, '6020201002', '326', 0, '', '', 0, 0, 0, 'Patung penganti wanita 13 x 9 x21', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2213, 0, '6020201002', '327', 0, '', '', 0, 0, 0, 'Patung Primitif Maluku', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2214, 0, '6020201002', '328', 0, '', '', 0, 0, 0, 'Orang Tengkurap uk 19 x 10 x 8', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2215, 0, '6020201002', '329', 0, '', '', 0, 0, 0, 'Patung Batak Primitif uk. 10 x 7 x 32', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2216, 0, '6020201002', '330', 0, '', '', 0, 0, 0, 'Gajah Kawin uk. 24 x 9 x 27', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2217, 0, '6020201002', '331', 0, '', '', 0, 0, 0, 'uk 225x300 cm', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2218, 0, '6020201002', '332', 0, '', '', 0, 0, 0, 'Patung Rhama dan Shinta', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2219, 0, '6020201002', '333', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2220, 0, '6020201002', '334', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2221, 0, '6020201002', '335', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2222, 0, '6020201002', '336', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2223, 0, '6020201002', '337', 0, '', '', 0, 0, 0, 'Patung Rhama dan Shinta', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2224, 0, '6020201002', '338', 0, '', '', 0, 0, 0, 'Patung Satu Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2225, 0, '6020201002', '339', 0, '', '', 0, 0, 0, 'Patung Dua Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2226, 0, '6020201002', '340', 0, '', '', 0, 0, 0, 'Patung Lima Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2227, 0, '6020201002', '341', 0, '', '', 0, 0, 0, 'Patung Satu Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2228, 0, '6020201002', '342', 0, '', '', 0, 0, 0, 'Patung Satu Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2229, 0, '6020201002', '343', 0, '', '', 0, 0, 0, 'Patung Empat Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2230, 0, '6020201002', '344', 0, '', '', 0, 0, 0, 'Patung Dua Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2231, 0, '6020201002', '345', 0, '', '', 0, 0, 0, 'Patung Tiga Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2232, 0, '6020201002', '346', 0, '', '', 0, 0, 0, 'Patung Dua Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2233, 0, '6020201002', '347', 0, '', '', 0, 0, 0, 'Patung Tiga Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2234, 0, '6020201002', '348', 0, '', '', 0, 0, 0, 'Patung Lima Kuda ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2235, 0, '6020201002', '349', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2236, 0, '6020201002', '350', 0, '', '', 0, 0, 0, 'Patung Kawanan Burung', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2237, 0, '6020201002', '351', 0, '', '', 0, 0, 0, 'Patung Ikan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2238, 0, '6020201002', '352', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2239, 0, '6020201002', '353', 0, '', '', 0, 0, 0, 'Patung Orang Meniup Seruling', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2240, 0, '6020201002', '354', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2241, 0, '6020201002', '355', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2242, 0, '6020201002', '356', 0, '', '', 0, 0, 0, 'Wanita Membawa Guci', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2243, 0, '6020201002', '357', 0, '', '', 0, 0, 0, 'Patung Burung Garuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2244, 0, '6020201002', '358', 0, '', '', 0, 0, 0, 'Patung Burung Hantu dan Anaknya', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2245, 0, '6020201002', '359', 0, '', '', 0, 0, 0, 'Patung Garuda Membawa Shinta', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2246, 0, '6020201002', '360', 0, '', '', 0, 0, 0, 'Satu Ekor Kuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2247, 0, '6020201002', '361', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2248, 0, '6020201002', '362', 0, '', '', 0, 0, 0, 'Patung Wanita Bali', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2249, 0, '6020201002', '363', 0, '', '', 0, 0, 0, 'Patung Wanita Bali', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2250, 0, '6020201002', '364', 0, '', '', 0, 0, 0, 'Patung Pertapa Mukti (Bambang Krisyono)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2251, 0, '6020201002', '365', 0, '', '', 0, 0, 0, 'Patung Wanita Bersanggul', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2252, 0, '6020201002', '366', 0, '', '', 0, 0, 0, 'Patung Brahmana Menggendong Anak', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2253, 0, '6020201002', '367', 0, '', '', 0, 0, 0, 'Patung Gajah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2254, 0, '6020201002', '368', 0, '', '', 0, 0, 0, 'Patung Tersesat (Bambang Krisyono)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2255, 0, '6020201002', '369', 0, '', '', 0, 0, 0, 'Patung Cinta Tak Bersyarat (Bambang Krisyono)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2256, 0, '6020201002', '370', 0, '', '', 0, 0, 0, 'Patung Kisah Menjangan Jantan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2257, 0, '6020201002', '371', 0, '', '', 0, 0, 0, 'Patung Garuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2258, 0, '6020201002', '372', 0, '', '', 0, 0, 0, 'Patung Garuda', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2259, 0, '6020201002', '373', 0, '', '', 0, 0, 0, 'Patung Bangau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2260, 0, '6020201002', '374', 0, '', '', 0, 0, 0, 'Patung Anoa', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2261, 0, '6020201002', '375', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2262, 0, '6020201002', '376', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2263, 0, '6020201002', '377', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2264, 0, '6020201002', '378', 0, '', '', 0, 0, 0, 'Patung Ukiran Kayu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2265, 0, '6020201002', '379', 0, '', '', 0, 0, 0, 'Patung Singa Terbang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2266, 0, '6020201002', '380', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2267, 0, '6020201002', '381', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2268, 0, '6020201002', '382', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2269, 0, '6020201002', '383', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2270, 0, '6020201002', '384', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2271, 0, '6020201002', '385', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2272, 0, '6020201002', '386', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2273, 0, '6020201002', '387', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2274, 0, '6020201002', '388', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2275, 0, '6020201002', '389', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2276, 0, '6020201002', '390', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2277, 0, '6020201003', '1', 0, '', '', 0, 0, 0, 'Patung Penari Bali Laki-Laki, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2278, 0, '6020201003', '2', 0, '', '', 0, 0, 0, 'Patung Penari Bali Wanita, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2279, 0, '6020201003', '3', 0, '', '', 0, 0, 0, '0', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2280, 0, '6020201003', '4', 0, '', '', 0, 0, 0, 'Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2281, 0, '6020201003', '5', 0, '', '', 0, 0, 0, 'Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2282, 0, '6020201003', '6', 0, '', '', 0, 0, 0, 'Lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2283, 0, '6020201003', '7', 0, '', '', 0, 0, 0, 'lokal', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2284, 0, '6020201003', '8', 0, '', '', 0, 0, 0, 'Sumber Kehidupan, Zsigmond Kisfaludi Strobl', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2285, 0, '6020201003', '9', 0, '', '', 0, 0, 0, 'Patung Ibu dan Anak, Zsigmond KS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2286, 0, '6020201003', '10', 0, '', '', 0, 0, 0, 'Melepas Panah, Zsigmond KS 1991', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2287, 0, '6020201003', '11', 0, '', '', 0, 0, 0, 'Patung Penunggang Kuda, Zsigmond KS', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2288, 0, '6020201003', '12', 0, '', '', 0, 0, 0, 'Patung Belajar, Trubus Sud', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2289, 0, '6020201003', '13', 0, '', '', 0, 0, 0, 'Patung Kasih Ibu, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2290, 0, '6020201003', '14', 0, '', '', 0, 0, 0, 'Patung Soko Guru Revolusi, Chairul, 1965', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2291, 0, '6020201003', '15', 0, '', '', 0, 0, 0, 'Patung Anak Bergendongan, Chairul,1965', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2292, 0, '6020201003', '16', 0, '', '', 0, 0, 0, 'Patung Anak Bermain Egrang, Zoenko Kalin, 1963', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2293, 0, '6020201003', '17', 0, '', '', 0, 0, 0, 'Bergaya, Stoyanovic', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2294, 0, '6020201003', '18', 0, '', '', 0, 0, 0, 'Patung Waspada, Greco', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2295, 0, '6020201003', '19', 0, '', '', 0, 0, 0, 'Patung Menghitung, Mikas S., ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2296, 0, '6020201003', '20', 0, '', '', 0, 0, 0, 'Patung Garuda, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2297, 0, '6020201003', '21', 0, '', '', 0, 0, 0, 'Patung Wanita Berjalan, J.S. Sulistyo, 1963', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2298, 0, '6020201003', '22', 0, '', '', 0, 0, 0, 'Patung Hulubalang, Ferri Lorenzo', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2299, 0, '6020201003', '23', 0, '', '', 0, 0, 0, 'Patung Kemenangan, Augustincic, 1959', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2300, 0, '6020201003', '24', 0, '', '', 0, 0, 0, 'Patung Ir. Soekarno Proklamator Kemerdekaan, Suhartono H., 1998', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2301, 0, '6020201003', '25', 0, '', '', 0, 0, 0, 'Patung Drs. Mohammad Hatta Proklamator Kemerdekaan, Suhartono H., 1998', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2302, 0, '6020201003', '26', 0, '', '', 0, 0, 0, 'Patung Kepala Seorang Gadis, T. Pocahauh', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2303, 0, '6020201003', '27', 0, '', '', 0, 0, 0, 'Patung Dua Kuda, T. Mitsui', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2304, 0, '6020201003', '28', 0, '', '', 0, 0, 0, 'Patung Menabur Bunga, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2305, 0, '6020201003', '29', 0, '', '', 0, 0, 0, 'Patung Penunggang Kuda / Givin\' The Boys A Show, Bill Nebeken, 1980', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2306, 0, '6020201003', '30', 0, '', '', 0, 0, 0, 'Patung Wanita 1/2 Badan, Suerry, 1962', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2307, 0, '6020201003', '31', 0, '', '', 0, 0, 0, 'Patung Kuda, PJ. Mene', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2308, 0, '6020201003', '32', 0, '', '', 0, 0, 0, 'Patung India Kuna Dewi, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2309, 0, '6020201003', '33', 0, '', '', 0, 0, 0, 'Patung Singa, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2310, 0, '6020201003', '34', 0, '', '', 0, 0, 0, 'Patung Kuda Berlari, Messina', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2311, 0, '6020201003', '35', 0, '', '', 0, 0, 0, 'Patung Dewi Sri, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2312, 0, '6020201003', '36', 0, '', '', 0, 0, 0, 'Patung Bangau, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2313, 0, '6020201003', '37', 0, '', '', 0, 0, 0, 'Patung Penari Tari Udang, Anonim', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2314, 0, '6020201003', '38', 0, '', '', 0, 0, 0, 'Patung \"\"Goddess of Wisdom\"\" Perunggu, Dimensi 160x80x20 cm, Brown Renaisance', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2315, 0, '6020202005', '1', 0, '', '', 0, 0, 0, 'Kalung  Emas 18 karat, berat:134 gr, mata 288 , emerald 22', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2316, 0, '6020202005', '2', 0, '', '', 0, 0, 0, 'Gelang Emas 18 karat, berat 56,10 gr, mata 103 berlian & 9 emerald', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2317, 0, '6020202005', '3', 0, '', '', 0, 0, 0, 'Anting emas 18 karat, berat 34,35 gr, mata 52 berlian & 4 emerald', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2318, 0, '6020202005', '4', 0, '', '', 0, 0, 0, 'Cincin Emas 18 karat, berat 15.20 gr, mata 20 berlian dan 1 emas emerald', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2319, 0, '6020202005', '5', 0, '', '', 0, 0, 0, 'Jam tangan Bovet AIEB001', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2320, 0, '6020202005', '6', 0, '', '', 0, 0, 0, 'Cincin bermata blue saphire 12,46 ct', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2321, 0, '6020202005', '7', 0, '', '', 0, 0, 0, 'Cufflink bermata blue saphire 6.63 ct dan 8.01 ct', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2322, 0, '6020202005', '8', 0, '', '', 0, 0, 0, 'Cufflink bermata blue saphire 6.63 ct dan 8.01 ct', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2323, 0, '6020202005', '9', 0, '', '', 0, 0, 0, 'Satu buah pulpen berhias diamond 17.57 ct', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2324, 0, '6020202005', '10', 0, '', '', 0, 0, 0, 'Tasbih berbahan batu mulia (diamond dan blue saphire)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2325, 0, '6020202006', '1', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2326, 0, '6020202006', '2', 0, '', '', 0, 0, 0, 'Jambangan Tinggi Besar Berkaki Lima', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2327, 0, '6020202006', '3', 0, '', '', 0, 0, 0, 'Jambangan Bunga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2328, 0, '6020202006', '4', 0, '', '', 0, 0, 0, 'Vas Bunga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2329, 0, '6020202006', '5', 0, '', '', 0, 0, 0, 'Jambangan  Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2330, 0, '6020202006', '6', 0, '', '', 0, 0, 0, 'Tempat Kembang Gula', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2331, 0, '6020202006', '7', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2332, 0, '6020202006', '8', 0, '', '', 0, 0, 0, 'Jambangan Bunga / vas bunga kuping Dua', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2333, 0, '6020202006', '9', 0, '', '', 0, 0, 0, 'Guci Motif Batik', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2334, 0, '6020202006', '10', 0, '', '', 0, 0, 0, 'Tempayan Ikan Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2335, 0, '6020202006', '11', 0, '', '', 0, 0, 0, 'Tempayan Ikan Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2336, 0, '6020202006', '12', 0, '', '', 0, 0, 0, 'Botol Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2337, 0, '6020202006', '13', 0, '', '', 0, 0, 0, 'Botol Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2338, 0, '6020202006', '14', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `tb_master_aset` (`id`, `kode_tid`, `kode_aset`, `nup`, `kategori`, `merk`, `tipe`, `id_kondisi`, `status`, `tipe_moving`, `nama_aset`, `id_area`, `id_gedung`, `id_ruangan`, `tgl_perolehan`, `tgl_inventarisasi`, `flag_inventarisasi`, `tgl_peminjaman`, `tgl_pengembalian`, `tgl_mutasi`, `id_lokasi_moving`, `id_pegawai`) VALUES
(2339, 0, '6020202006', '15', 0, '', '', 0, 0, 0, 'Vas Bunga Hijau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2340, 0, '6020202006', '16', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2341, 0, '6020202006', '17', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2342, 0, '6020202006', '18', 0, '', '', 0, 0, 0, 'Guci', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2343, 0, '6020202006', '19', 0, '', '', 0, 0, 0, 'Guci Bertutup Dinasti Kang Hsi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2344, 0, '6020202006', '20', 0, '', '', 0, 0, 0, 'Guci Bertutup Warna Bermotif Bunga dan Kupu-Kupu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2345, 0, '6020202006', '21', 0, '', '', 0, 0, 0, 'Jambangan Bunga Motif Naga Api', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2346, 0, '6020202006', '22', 0, '', '', 0, 0, 0, 'Jambangan Bunga Motif Naga Api', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2347, 0, '6020202006', '23', 0, '', '', 0, 0, 0, 'Kendi Porselin Dengan Kembang Hitam', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2348, 0, '6020202006', '24', 0, '', '', 0, 0, 0, 'Jambangan Bunga Porselin Motif Naga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2349, 0, '6020202006', '25', 0, '', '', 0, 0, 0, 'Botol Porselin Panca warna bentuk Labu Susun', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2350, 0, '6020202006', '26', 0, '', '', 0, 0, 0, 'Botol Porselin Panca warna bentuk Labu Susun', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2351, 0, '6020202006', '27', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2352, 0, '6020202006', '28', 0, '', '', 0, 0, 0, 'Vas Bunga Besar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2353, 0, '6020202006', '29', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2354, 0, '6020202006', '30', 0, '', '', 0, 0, 0, 'Jambangan Bunga  POrselin Motif Naga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2355, 0, '6020202006', '31', 0, '', '', 0, 0, 0, 'Piring Hias Panca warna', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2356, 0, '6020202006', '32', 0, '', '', 0, 0, 0, 'Vas Bunga Besar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2357, 0, '6020202006', '33', 0, '', '', 0, 0, 0, 'Guci Besar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2358, 0, '6020202006', '34', 0, '', '', 0, 0, 0, 'Kendi Porselin', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2359, 0, '6020202006', '35', 0, '', '', 0, 0, 0, 'Jambangan Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2360, 0, '6020202006', '36', 0, '', '', 0, 0, 0, 'Jambangan Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2361, 0, '6020202006', '37', 0, '', '', 0, 0, 0, 'Jambangan Bunga Bermotif Burung dan Ikan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2362, 0, '6020202006', '38', 0, '', '', 0, 0, 0, 'Kendi Ko Putih Bermotif Pecah Seribu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2363, 0, '6020202006', '39', 0, '', '', 0, 0, 0, 'Jambangan Bunga Motif Burung & Ikan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2364, 0, '6020202006', '40', 0, '', '', 0, 0, 0, 'Kendi Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2365, 0, '6020202006', '41', 0, '', '', 0, 0, 0, 'Piring Hias Famille Rose', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2366, 0, '6020202006', '42', 0, '', '', 0, 0, 0, 'Piring Hias Famille Rose', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2367, 0, '6020202006', '43', 0, '', '', 0, 0, 0, 'Jambangan Porselin Persegi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2368, 0, '6020202006', '44', 0, '', '', 0, 0, 0, 'Jambangan Porselin Persegi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2369, 0, '6020202006', '45', 0, '', '', 1, 2, 1, 'Piring Hias Bermotif Cendrawasih dgn enamel polichrome', 1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2370, 0, '6020202006', '46', 0, '', '', 1, 2, 1, 'Jambangan Bunga Celadon', 1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2371, 0, '6020202006', '47', 0, '', '', 1, 3, 1, 'Jambangan Bunga Celadon', 1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2372, 0, '6020202006', '48', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2373, 0, '6020202006', '49', 0, '', '', 0, 0, 0, 'Piring Hias Bermotif Prajurit Jepang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2374, 0, '6020202006', '50', 0, '', '', 1, 1, 1, 'Piring Hias Bermotif Prajurit Jepang', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2375, 0, '6020202006', '51', 0, '', '', 1, 4, 1, 'Piring Hias Warna Bermotif Tradisi China', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2376, 0, '6020202006', '52', 0, '', '', 0, 0, 0, 'Guci Bertutup Bermotif Bunga dan Burung (Kendi Porselin Biru Putih)', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2377, 0, '6020202006', '53', 0, '', '', 0, 0, 0, 'Jambangan Bunga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2378, 0, '6020202006', '54', 0, '', '', 0, 0, 0, 'Piring Hias Warna Putih Biru Bermotif Bunga dan Daun Sulur-Sulur', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2379, 0, '6020202006', '55', 0, '', '', 0, 0, 0, 'Piring Hias Warna Putih Biru Bermotif Bunga dan Daun Sulur-Sulur', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2380, 0, '6020202006', '56', 0, '', '', 0, 0, 0, 'Tempayan Arak Porselin Ko Kuning', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2381, 0, '6020202006', '57', 0, '', '', 0, 0, 0, 'Guci Kecil', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2382, 0, '6020202006', '58', 0, '', '', 0, 0, 0, 'Kendi Porselin Panca Warna', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2383, 0, '6020202006', '59', 0, '', '', 0, 0, 0, 'Vas Bunga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2384, 0, '6020202006', '60', 0, '', '', 0, 0, 0, 'Vas Bunga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2385, 0, '6020202006', '61', 0, '', '', 0, 0, 0, 'Tempayan Porselin Coklat', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2386, 0, '6020202006', '62', 0, '', '', 0, 0, 0, 'Tempayan  Porselin Merah Bermotif Orang China', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2387, 0, '6020202006', '63', 0, '', '', 0, 0, 0, 'Jambangan Porselin Retak Seribu', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2388, 0, '6020202006', '64', 0, '', '', 0, 0, 0, 'Kendi Porselin Kembang Merah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2389, 0, '6020202006', '65', 0, '', '', 0, 0, 0, 'Mangkok Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2390, 0, '6020202006', '66', 0, '', '', 0, 0, 0, 'Piring Hias Warna Putih Merah Bermotif Bulan dan Bunga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2391, 0, '6020202006', '67', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2392, 0, '6020202006', '68', 0, '', '', 0, 0, 0, 'Tembikar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2393, 0, '6020202006', '69', 0, '', '', 1, 4, 0, 'Mangkok Bertutup', 1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2394, 0, '6020202006', '70', 0, '', '', 0, 0, 0, 'Mangkok Bertutup', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2395, 0, '6020202006', '71', 0, '', '', 0, 0, 0, 'Mangkok Bertutup', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2396, 0, '6020202006', '72', 0, '', '', 0, 0, 0, 'Tempat Duduk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2397, 0, '6020202006', '73', 0, '', '', 0, 0, 0, 'Tempat Duduk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2398, 0, '6020202006', '74', 0, '', '', 0, 0, 0, 'Kursi Taman Motif Terawang Warna Hijau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2399, 0, '6020202006', '75', 0, '', '', 0, 0, 0, 'Kursi Taman Motif Terawang Warna Hijau', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2400, 0, '6020202006', '76', 0, '', '', 0, 0, 0, 'Tempat Buah Bermotif Ikan Mas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2401, 0, '6020202006', '77', 0, '', '', 0, 0, 0, 'Tempat Buah', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2402, 0, '6020202006', '78', 0, '', '', 0, 0, 0, 'Tempat Duduk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2403, 0, '6020202006', '79', 0, '', '', 0, 0, 0, 'Tempat Duduk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2404, 0, '6020202006', '80', 0, '', '', 0, 0, 0, 'Tempat Duduk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2405, 0, '6020202006', '81', 0, '', '', 0, 0, 0, 'Tempat Duduk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2406, 0, '6020202006', '82', 0, '', '', 0, 0, 0, 'Tempat Lilin Bentuk Pilar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2407, 0, '6020202006', '83', 0, '', '', 0, 0, 0, 'Tempat Lilin Bentuk Pilar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2408, 0, '6020202006', '84', 0, '', '', 0, 0, 0, 'Piring Hias', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2409, 0, '6020202006', '85', 0, '', '', 0, 0, 0, 'Jambangan  Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2410, 0, '6020202006', '86', 0, '', '', 0, 0, 0, 'Jambangan  Porselin Biru Putih', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2411, 0, '6020202006', '87', 0, '', '', 0, 0, 0, 'Jambangan Porselin Persegi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2412, 0, '6020202006', '88', 0, '', '', 0, 0, 0, 'Tatakan / Pilar', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2413, 0, '6020202006', '89', 0, '', '', 0, 0, 0, 'Piring', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2414, 0, '6020202006', '90', 0, '', '', 0, 0, 0, 'Tempat Duduk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2415, 0, '6020202006', '91', 0, '', '', 0, 0, 0, 'Cepuk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2416, 0, '6020202006', '92', 0, '', '', 0, 0, 0, 'Tempayan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2417, 0, '6020202006', '93', 0, '', '', 0, 0, 0, 'Vas Berkuping', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2418, 0, '6020202006', '94', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2419, 0, '6020202006', '95', 0, '', '', 0, 0, 0, 'Piring ', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2420, 0, '6020202006', '96', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2421, 0, '6020202006', '97', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2422, 0, '6020202006', '98', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2423, 0, '6020202006', '99', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2424, 0, '6020202006', '100', 0, '', '', 0, 0, 0, 'Kendi', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2425, 0, '6020202006', '101', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2426, 0, '6020202006', '102', 0, '', '', 0, 0, 0, 'Guci', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2427, 0, '6020202006', '103', 0, '', '', 0, 0, 0, 'Tempayan', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2428, 0, '6020202006', '104', 0, '', '', 0, 0, 0, 'Guci', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2429, 0, '6020202006', '105', 0, '', '', 0, 0, 0, 'Mangkuk', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2430, 0, '6020202006', '106', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2431, 0, '6020202006', '107', 0, '', '', 0, 0, 0, 'Vas', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2432, 0, '6020202006', '108', 0, '', '', 0, 0, 0, 'Vas Telur', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2433, 0, '6020202006', '109', 0, '', '', 0, 0, 0, 'Vas Telur', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2434, 0, '6020202006', '110', 0, '', '', 0, 0, 0, 'Vas Bunga', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2435, 0, '6020202006', '111', 0, '', '', 0, 0, 0, 'Peloncor Mini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2436, 0, '6020202006', '112', 0, '', '', 0, 0, 0, 'Peloncor Mini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2437, 0, '6020202006', '113', 0, '', '', 0, 0, 0, 'Peloncor Mini', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2438, 0, '6020202006', '114', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2439, 0, '6020202006', '115', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2440, 0, '6020202006', '116', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2441, 0, '6020202006', '117', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2442, 0, '6020202006', '118', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2443, 0, '6020202006', '119', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2444, 0, '6020202006', '120', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2445, 0, '6020202006', '121', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2446, 0, '6020202006', '122', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2447, 0, '6020202006', '123', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2448, 0, '6020202006', '124', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2449, 0, '6020202006', '125', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2450, 0, '6020202006', '126', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2451, 0, '6020202006', '127', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2452, 0, '6020202006', '128', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2453, 0, '6020202006', '129', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2454, 0, '6020202006', '130', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2455, 0, '6020202006', '131', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2456, 0, '6020202006', '132', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2457, 0, '6020202006', '133', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2458, 0, '6020202006', '134', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2459, 0, '6020202006', '135', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2460, 0, '6020202006', '136', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2461, 0, '6020202006', '137', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2462, 0, '6020202006', '138', 0, '', '', 0, 0, 0, 'Pot Keramik, Handmade, desain Kansai', 0, 0, 0, '0000-00-00 00:00:00', '2024-11-01 16:12:25', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_gedung`
--

CREATE TABLE `tb_master_gedung` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `gedung` varchar(100) NOT NULL,
  `ket_gedung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_gedung`
--

INSERT INTO `tb_master_gedung` (`id`, `id_area`, `gedung`, `ket_gedung`) VALUES
(1, 1, 'Gedung Konservasi dan Galeri', 'Gedung Konservasi dan Galeri Istana Jakarta'),
(2, 1, 'Gedung Biro Pers', 'Gedung Biro Pers Media Istana Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_kategori`
--

CREATE TABLE `tb_master_kategori` (
  `id` int NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `ket_kategori` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_kategori`
--

INSERT INTO `tb_master_kategori` (`id`, `kategori`, `ket_kategori`) VALUES
(1, 'Seni', 'Barang Seni'),
(2, 'Pers Media', 'Barang Pers Media');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_kondisi`
--

CREATE TABLE `tb_master_kondisi` (
  `id` int NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `ket_kondisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_kondisi`
--

INSERT INTO `tb_master_kondisi` (`id`, `kondisi`, `ket_kondisi`) VALUES
(1, 'Baik', 'Baik'),
(2, 'Rusak Ringan', 'Rusak Ringan'),
(3, 'Rusak Berat', 'Rusak Berat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_pegawai`
--

CREATE TABLE `tb_master_pegawai` (
  `id` int NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_pegawai`
--

INSERT INTO `tb_master_pegawai` (`id`, `nip`, `nama`, `jabatan`, `email`, `telp`, `alamat`) VALUES
(1, '3276081610910001', 'Ridwan Sapoetra', 'Programmer', 'sm4rtschool@gmail.com', '082113332009', 'Depok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_ruangan`
--

CREATE TABLE `tb_master_ruangan` (
  `id` int NOT NULL,
  `id_area` int NOT NULL,
  `id_gedung` int NOT NULL,
  `ruangan` varchar(100) NOT NULL,
  `ket_ruangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_ruangan`
--

INSERT INTO `tb_master_ruangan` (`id`, `id_area`, `id_gedung`, `ruangan`, `ket_ruangan`) VALUES
(1, 1, 1, 'Ruangan Konservasi', 'Ruangan Konservasi, Gedung Konservasi dan Galeri, Istana Jakarta'),
(2, 1, 2, 'Ruangan Biro Pers', 'Ruangan Biro Pers, Gedung Biro Pers Media, Istana Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_status`
--

CREATE TABLE `tb_master_status` (
  `id` int NOT NULL,
  `status` varchar(50) NOT NULL,
  `ket_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_status`
--

INSERT INTO `tb_master_status` (`id`, `status`, `ket_status`) VALUES
(1, 'Tersedia', 'Tersedia di Lokasi'),
(2, 'Peminjaman', 'Di Pinjam'),
(3, 'Perbaikan', 'Sedang diperbaiki'),
(4, 'Moving', 'Moving');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_tag_rfid`
--

CREATE TABLE `tb_master_tag_rfid` (
  `id` int NOT NULL,
  `kode_tid` varchar(50) NOT NULL DEFAULT '',
  `status_tag` varchar(5) NOT NULL COMMENT '''Y'' or ''N''',
  `type_tag` int DEFAULT NULL,
  `id_aset` int DEFAULT NULL,
  `kode_epc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_tag_rfid`
--

INSERT INTO `tb_master_tag_rfid` (`id`, `kode_tid`, `status_tag`, `type_tag`, `id_aset`, `kode_epc`) VALUES
(1, 'E280117020001150C2020B49', 'N', NULL, 2371, '4E0466CD8A8ED86F16980BD0EB97A308'),
(2, 'E280117020001147C21C0B49', 'Y', NULL, NULL, 'FD7AF0BAD362B297FF67BFFF49A71499'),
(3, 'E280117020001035C2030B49', 'Y', NULL, NULL, '45DA1829E907AD2AB69E6AFB52673633'),
(4, 'E2801170200003B0C1EE0B49', 'N', NULL, 2370, '788EBD6D221CD269D86C1FE3CBEC346B'),
(5, 'E28011702000020AF3EB0B65', 'Y', NULL, NULL, '7E4CD65DD9EA1D8CBB9A93189C0B9A87'),
(6, 'E280117020000357C2060B49', 'N', NULL, 2393, '29F3C241FE67DE7AD3D075B4546B21EF'),
(7, 'E280117020001352C21F0B49', 'N', NULL, 2369, '39841F2785FDF9218D35498B4E4D41D1'),
(8, 'E2801170200005B2C2160B49', 'Y', NULL, NULL, 'B475B8317D544DB5C928154920AA92CE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_transaksi`
--

CREATE TABLE `tb_master_transaksi` (
  `id` int NOT NULL,
  `kode_transaksi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tipe_transaksi` int NOT NULL,
  `status_transaksi` int NOT NULL COMMENT '1 = Open, 2 = Progress, 3 = Complete',
  `tgl_input` datetime NOT NULL,
  `tgl_awal_transaksi` datetime NOT NULL,
  `tgl_akhir_transaksi` datetime DEFAULT NULL,
  `id_pegawai_input` int NOT NULL,
  `nama_pegawai_input` varchar(100) NOT NULL,
  `id_pegawai` int NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_area` int NOT NULL,
  `id_gedung` int NOT NULL,
  `id_ruangan` int NOT NULL,
  `ket_transaksi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_transaksi`
--

INSERT INTO `tb_master_transaksi` (`id`, `kode_transaksi`, `tipe_transaksi`, `status_transaksi`, `tgl_input`, `tgl_awal_transaksi`, `tgl_akhir_transaksi`, `id_pegawai_input`, `nama_pegawai_input`, `id_pegawai`, `nama_pegawai`, `id_area`, `id_gedung`, `id_ruangan`, `ket_transaksi`) VALUES
(1, NULL, 2, 1, '2024-12-04 16:32:39', '2024-12-04 00:00:00', NULL, 0, '0', 0, '0', 1, 2, 2, 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_type_transaksi`
--

CREATE TABLE `tb_master_type_transaksi` (
  `id` int NOT NULL,
  `tipe_transaksi` varchar(25) NOT NULL,
  `ket_tipe_transaksi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_master_type_transaksi`
--

INSERT INTO `tb_master_type_transaksi` (`id`, `tipe_transaksi`, `ket_tipe_transaksi`) VALUES
(1, 'Register Tag Label', 'Register Tag Label Ke Master Stok Tag Label'),
(2, 'Register Aset', 'Register Aset dengan Tag Label'),
(3, 'Sensus', 'Sensus Aset'),
(4, 'Rent', 'Peminjaman Aset'),
(5, 'Mutasi', 'Perpindahan Lokasi Aset');

-- --------------------------------------------------------

--
-- Table structure for table `widgeds`
--

CREATE TABLE `widgeds` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `dashboard_id` int NOT NULL,
  `widged_uuid` varchar(255) NOT NULL,
  `widged_type` varchar(255) NOT NULL,
  `sort_number` int NOT NULL,
  `width` int NOT NULL,
  `height` int NOT NULL,
  `y` int NOT NULL,
  `x` int NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`) USING BTREE;

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
-- Indexes for table `pengaturan_sistem`
--
ALTER TABLE `pengaturan_sistem`
  ADD PRIMARY KEY (`is_system_on`) USING BTREE;

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
-- Indexes for table `tag_building`
--
ALTER TABLE `tag_building`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `tag_reader`
--
ALTER TABLE `tag_reader`
  ADD PRIMARY KEY (`reader_id`),
  ADD KEY `Gedung_ID` (`room_id`);

--
-- Indexes for table `tag_temp_table`
--
ALTER TABLE `tag_temp_table`
  ADD PRIMARY KEY (`id_temp_table`) USING BTREE;

--
-- Indexes for table `tb_asset_moving`
--
ALTER TABLE `tb_asset_moving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category_aset`
--
ALTER TABLE `tb_category_aset`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log_act`
--
ALTER TABLE `tb_log_act`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_area`
--
ALTER TABLE `tb_master_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_aset`
--
ALTER TABLE `tb_master_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_gedung`
--
ALTER TABLE `tb_master_gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_kategori`
--
ALTER TABLE `tb_master_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_kondisi`
--
ALTER TABLE `tb_master_kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_pegawai`
--
ALTER TABLE `tb_master_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_ruangan`
--
ALTER TABLE `tb_master_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_status`
--
ALTER TABLE `tb_master_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_tag_rfid`
--
ALTER TABLE `tb_master_tag_rfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_transaksi`
--
ALTER TABLE `tb_master_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_type_transaksi`
--
ALTER TABLE `tb_master_type_transaksi`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `aauth_login_attempts`
--
ALTER TABLE `aauth_login_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1381;

--
-- AUTO_INCREMENT for table `aauth_perms`
--
ALTER TABLE `aauth_perms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `aauth_pms`
--
ALTER TABLE `aauth_pms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_user`
--
ALTER TABLE `aauth_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aauth_users`
--
ALTER TABLE `aauth_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aauth_user_variables`
--
ALTER TABLE `aauth_user_variables`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `cc_options`
--
ALTER TABLE `cc_options`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_contact`
--
ALTER TABLE `chat_contact`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `crud_action`
--
ALTER TABLE `crud_action`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_custom_option`
--
ALTER TABLE `crud_custom_option`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1832;

--
-- AUTO_INCREMENT for table `crud_field`
--
ALTER TABLE `crud_field`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5236;

--
-- AUTO_INCREMENT for table `crud_field_condition`
--
ALTER TABLE `crud_field_condition`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_field_configuration`
--
ALTER TABLE `crud_field_configuration`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `crud_field_validation`
--
ALTER TABLE `crud_field_validation`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5414;

--
-- AUTO_INCREMENT for table `crud_function`
--
ALTER TABLE `crud_function`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud_input_chained`
--
ALTER TABLE `crud_input_chained`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `crud_input_type`
--
ALTER TABLE `crud_input_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `crud_input_validation`
--
ALTER TABLE `crud_input_validation`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_custom_attribute`
--
ALTER TABLE `form_custom_attribute`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_custom_option`
--
ALTER TABLE `form_custom_option`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_field_validation`
--
ALTER TABLE `form_field_validation`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_block_element`
--
ALTER TABLE `page_block_element`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan_sistem`
--
ALTER TABLE `pengaturan_sistem`
  MODIFY `is_system_on` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder_condition`
--
ALTER TABLE `reminder_condition`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminder_cron`
--
ALTER TABLE `reminder_cron`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest`
--
ALTER TABLE `rest`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rest_field`
--
ALTER TABLE `rest_field`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT for table `rest_field_validation`
--
ALTER TABLE `rest_field_validation`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=664;

--
-- AUTO_INCREMENT for table `rest_input_type`
--
ALTER TABLE `rest_input_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tag_building`
--
ALTER TABLE `tag_building`
  MODIFY `building_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag_reader`
--
ALTER TABLE `tag_reader`
  MODIFY `reader_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tag_temp_table`
--
ALTER TABLE `tag_temp_table`
  MODIFY `id_temp_table` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_asset_moving`
--
ALTER TABLE `tb_asset_moving`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1211;

--
-- AUTO_INCREMENT for table `tb_category_aset`
--
ALTER TABLE `tb_category_aset`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_log_act`
--
ALTER TABLE `tb_log_act`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_master_area`
--
ALTER TABLE `tb_master_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_master_aset`
--
ALTER TABLE `tb_master_aset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2463;

--
-- AUTO_INCREMENT for table `tb_master_gedung`
--
ALTER TABLE `tb_master_gedung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_master_kategori`
--
ALTER TABLE `tb_master_kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_master_kondisi`
--
ALTER TABLE `tb_master_kondisi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_master_pegawai`
--
ALTER TABLE `tb_master_pegawai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_master_ruangan`
--
ALTER TABLE `tb_master_ruangan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_master_status`
--
ALTER TABLE `tb_master_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_master_tag_rfid`
--
ALTER TABLE `tb_master_tag_rfid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_master_transaksi`
--
ALTER TABLE `tb_master_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_master_type_transaksi`
--
ALTER TABLE `tb_master_type_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `widgeds`
--
ALTER TABLE `widgeds`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
