-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2022 at 12:21 AM
-- Server version: 5.7.37-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseunits_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `status` smallint(2) NOT NULL,
  `modified` datetime NOT NULL,
  `attempt` int(11) NOT NULL,
  `activation_status` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`id`, `username`, `password`, `email`, `ip_address`, `slug`, `created`, `status`, `modified`, `attempt`, `activation_status`) VALUES
(1, 'courseunits', '$2y$10$Kx2j85mvR2is7r3DD2PFcOtpPG95bqO/v6e5Xta/Thj.2/HS8ljAC', 'admin@courseunits.com', NULL, '', '2016-06-10 00:00:00', 1, '2018-07-02 17:51:51', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banners`
--

INSERT INTO `tbl_banners` (`id`, `name`, `created_at`, `updated_at`, `slug`, `status`) VALUES
(1, 'banner.jpg', '2020-04-02 06:34:43', '2020-10-19 13:14:13', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `later_course_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_carts`
--

INSERT INTO `tbl_carts` (`id`, `session_id`, `user_id`, `course_id`, `quantity`, `created_at`, `updated_at`, `slug`, `later_course_flag`) VALUES
(161, 'fwsmNTYkPnEQe3MuJwWLTF8iDUBtuhZPJOsANsyn', 136, 4, 1, NULL, NULL, 'cart-5943864251', 0),
(160, 'xOHbYAsdoLlIIw47gwbZbnrNM5fJrqCCuPtNQezr', 0, 4, 1, NULL, NULL, 'cart-7274487825', 0),
(159, '6YKAZE5FFiu5p5OGYvARcdYEzzdg6doTopga1CX7', 0, 3, 1, NULL, NULL, 'cart-9974430091', 0),
(158, 'I4GyruoBMDzufv7kAAUusd1RG9FcVl71ArKeOQzC', 0, 14, 1, NULL, NULL, 'cart-7292838087', 0),
(25, 'JZxk5iRxBN6l7gmiwwAQdzq538hXzdFaKtML74St', 18, 6, 1, NULL, NULL, 'cart-2439725242', 0),
(149, 'GvskfgEdRcHdVIegqEaeoSHOhyUvDozTsNExxR3c', 14, 10, 1, NULL, NULL, 'cart-3397039113', 0),
(147, 'E4GkeZgc6frONULYBnGFNLEMRr86YGBsveOoPQuH', 118, 4, 1, NULL, NULL, 'cart-8729916566', 0),
(154, 'omUd7kOwsMhpHUus5ua0HsiO3tWbgRIF5pzKRbdu', 128, 10, 1, NULL, NULL, 'cart-5357156004', 0),
(33, '8H5BXWg3HIUOs6CJc5SKbitJh3iQQsbxNqwUHWQf', 23, 5, 0, NULL, NULL, 'cart-4408499275', 0),
(44, 'UT6fhVVzJ3DyPW0Kq693TIYOCELzyKVqFK91A0p0', 30, 9, 0, NULL, NULL, 'cart-2878347249', 0),
(40, 'H0lyRQTbc9wX6Q5AP0MIzUcTYvKxdMVvwYUq2cUO', 26, 3, 0, NULL, NULL, 'cart-9216264532', 0),
(41, 'bRYHD3ujXITdrXprzNnnfNVtmYBL37hb4qyKepPN', 16, 6, 0, NULL, NULL, 'cart-8282250918', 1),
(42, 'QvMqu2qNzV0yPjlmmzbzlUUNNQgmfBzWldb246Fm', 16, 3, 0, NULL, NULL, 'cart-1227190695', 1),
(43, 'itiTxXfuxI2QGmOzP22gceAcxzKU7VDIyJMwQkTV', 27, 3, 0, NULL, NULL, 'cart-1817484659', 0),
(45, 'dS789GlacXg7ryj7ptWGNXcrFkqPYzIy9xPPGFIN', 30, 7, 0, NULL, NULL, 'cart-6958946323', 0),
(88, 'DsZYYPDtBgDpYp5e13CuIno4ZKYITAADhZ6M1tnk', 5, 5, 0, NULL, NULL, 'cart-5047859960', 0),
(153, 'omUd7kOwsMhpHUus5ua0HsiO3tWbgRIF5pzKRbdu', 0, 16, 1, NULL, NULL, 'cart-4534836315', 0),
(121, 'sDrQpw8PGYh81LtL09PDvTGwqgTJbDrkD2tlfx7F', 21, 4, 0, NULL, NULL, 'cart-5496321021', 0),
(55, 'mPeR0rclp4GPxgYBkheIoaW4xhrYmikRpvkAZl5B', 35, 3, 1, NULL, NULL, 'cart-7534552225', 0),
(138, 'UH4MsImyoKCpwoB88u8jcqom8hNgNp2rQ8yaonOB', 80, 3, 0, NULL, NULL, 'cart-3806178701', 0),
(86, 'h2uVyOyelykgvldVC9dTCpNOdrIjCkTi2JR3Kjgq', 40, 3, 0, NULL, NULL, 'cart-3333413678', 0),
(155, 'omUd7kOwsMhpHUus5ua0HsiO3tWbgRIF5pzKRbdu', 128, 8, 1, NULL, NULL, 'cart-4466055199', 0),
(156, 'omUd7kOwsMhpHUus5ua0HsiO3tWbgRIF5pzKRbdu', 128, 7, 1, NULL, NULL, 'cart-6357361201', 0),
(148, 'J6HHPGR6Kgp5I27C8j8U6e2bsh1rVCpIafSuGsHC', 124, 27, 1, NULL, NULL, 'cart-3587570407', 0),
(150, 'k2hWGRoGwsLhkZbVfWtQWqmaoTTPIOSW6uinPdLX', 127, 3, 0, NULL, NULL, 'cart-3144347339', 0),
(152, 'fwsmNTYkPnEQe3MuJwWLTF8iDUBtuhZPJOsANsyn', 29, 7, 1, NULL, NULL, 'cart-6210370628', 0),
(90, 'AgbED7GjqpVOOX2ZQd0YFVGAAfx3hGjTMYY0RNxG', 19, 2, 0, NULL, NULL, 'cart-4237998974', 0),
(132, 'Hk0FqjY03PGTNo7gO3s6w0NTwaULXMTPeCdy2T2S', 14, 4, 1, NULL, NULL, 'cart-8756841204', 0),
(133, 'rfGCLumetVNMtUYAaFVIEBidHwHvRyG6bl99gZa4', 71, 3, 0, NULL, NULL, 'cart-2174724491', 0),
(157, 'I4GyruoBMDzufv7kAAUusd1RG9FcVl71ArKeOQzC', 0, 24, 1, NULL, NULL, 'cart-4783836970', 0),
(122, 'OKl8Sn7hUug1qgZ8o1SJPCgqrvUQDwAoGcbhA6D8', 62, 4, 0, NULL, NULL, 'cart-8748661267', 0),
(141, '71MoZJYnQomyP3wUJBA2nC2xbvGDEf0wfJostBdO', 14, 14, 1, NULL, NULL, 'cart-9182494278', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `home_image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` smallint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `parent_id`, `image`, `sub_title`, `home_image`, `slug`, `status`, `created_at`, `updated_at`, `description`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(1, 'Marketing', 0, NULL, NULL, 'b941407a_category-img1.png', 'marketing', 1, '2020-11-05 09:01:29', '2020-11-05 09:01:29', 'Marketing', NULL, NULL, NULL),
(2, 'Design', 0, NULL, NULL, 'fac8e55e_category-img2.png', 'design', 1, '2020-11-05 09:01:29', '2020-11-05 09:01:29', 'Design', NULL, NULL, NULL),
(3, 'Development', 0, NULL, NULL, 'ad4a69eb_category-img3.png', 'development', 1, '2020-11-05 09:01:29', '2020-11-05 09:01:29', 'Development', NULL, NULL, NULL),
(4, 'IT & Software', 0, NULL, NULL, '1059a05e_category-img4.png', 'it-software', 1, '2020-11-05 09:01:29', '2020-11-05 09:01:29', 'IT & Software', NULL, NULL, NULL),
(5, 'Personal Development', 0, NULL, NULL, '7fedfd41_category-img5.png', 'personal-development', 1, '2020-11-05 09:01:29', '2020-11-05 09:01:29', 'Personal Development', NULL, NULL, NULL),
(6, 'Photography', 0, NULL, NULL, '39ad06ec_category-img6.png', 'photography', 1, '2020-11-05 09:01:29', '2020-11-05 09:01:29', 'Photography', NULL, NULL, NULL),
(7, 'Business', 0, NULL, NULL, '03e8b58b_category-img7.png', 'business', 1, '2020-11-05 09:01:29', '2020-11-05 09:01:29', 'Business', NULL, NULL, NULL),
(8, 'Music', 0, NULL, 'music', 'f9073a05_category-img8.png', 'music', 1, '2022-04-08 09:46:38', '2022-04-08 09:46:38', 'Music', NULL, NULL, NULL),
(9, 'Digital Marketing', 1, NULL, NULL, NULL, 'digital-marketing', 1, '2020-09-22 07:22:19', '2020-09-22 07:22:19', NULL, NULL, NULL, NULL),
(10, 'Social Media Marketing', 1, NULL, NULL, NULL, 'social-media-marketing', 1, '2020-09-22 07:22:33', '2020-09-22 07:22:33', NULL, NULL, NULL, NULL),
(11, 'Facebook Ads', 1, NULL, NULL, NULL, 'facebook-ads', 1, '2020-09-22 07:22:46', '2020-09-22 07:22:46', NULL, NULL, NULL, NULL),
(12, 'Google Ads (Adwords)', 1, NULL, NULL, NULL, 'google-ads-adwords', 1, '2020-09-22 07:24:23', '2020-09-22 07:24:23', NULL, NULL, NULL, NULL),
(13, 'Marketing Strategy', 1, NULL, NULL, NULL, 'marketing-strategy', 1, '2020-09-22 07:24:36', '2020-09-22 07:24:36', NULL, NULL, NULL, NULL),
(14, 'Instagram Marketing', 1, NULL, NULL, NULL, 'instagram-marketing', 1, '2020-09-22 07:24:47', '2020-09-22 07:24:47', NULL, NULL, NULL, NULL),
(15, 'SEO', 1, NULL, NULL, NULL, 'seo', 1, '2020-09-22 07:25:00', '2020-09-22 07:25:00', NULL, NULL, NULL, NULL),
(16, 'Facebook Marketing', 1, NULL, NULL, NULL, 'facebook-marketing', 1, '2020-09-22 07:25:12', '2020-09-22 07:25:12', NULL, NULL, NULL, NULL),
(17, 'Copywriting', 1, NULL, NULL, NULL, 'copywriting', 1, '2020-09-22 07:25:25', '2020-09-22 07:25:25', NULL, NULL, NULL, NULL),
(18, 'Google Analytics', 1, NULL, NULL, NULL, 'google-analytics', 1, '2020-09-22 07:25:46', '2020-09-22 07:25:46', NULL, NULL, NULL, NULL),
(19, 'Web Design', 2, NULL, NULL, NULL, 'web-design', 1, '2020-09-22 08:50:25', '2020-09-22 08:50:25', NULL, NULL, NULL, NULL),
(20, 'Graphic Design', 2, NULL, NULL, NULL, 'graphic-design', 1, '2020-09-22 08:50:38', '2020-09-22 08:50:38', NULL, NULL, NULL, NULL),
(21, 'Design Tools', 2, NULL, NULL, NULL, 'design-tools', 1, '2020-09-22 08:50:50', '2020-09-22 08:50:50', NULL, NULL, NULL, NULL),
(22, 'Game Design', 2, NULL, NULL, NULL, 'game-design', 1, '2020-09-22 08:51:02', '2020-09-22 08:51:02', NULL, NULL, NULL, NULL),
(23, '3D & Animation', 2, NULL, NULL, NULL, '3d-animation', 1, '2020-09-22 08:51:14', '2020-09-22 08:51:14', NULL, NULL, NULL, NULL),
(24, 'Web Development', 3, NULL, NULL, NULL, 'web-development', 1, '2020-09-22 09:26:44', '2020-09-22 09:26:44', NULL, NULL, NULL, NULL),
(25, 'Data Science', 3, NULL, NULL, NULL, 'data-science', 1, '2020-09-22 09:26:56', '2020-09-22 09:26:56', NULL, NULL, NULL, NULL),
(26, 'Mobile Apps', 3, NULL, NULL, NULL, 'mobile-apps', 1, '2020-09-22 09:27:05', '2020-09-22 09:27:05', NULL, NULL, NULL, NULL),
(27, 'Programming Languages', 3, NULL, NULL, NULL, 'programming-languages', 1, '2020-09-22 09:27:15', '2020-09-22 09:27:15', NULL, NULL, NULL, NULL),
(28, 'Game Development', 3, NULL, NULL, NULL, 'game-development', 1, '2020-09-22 09:27:25', '2020-09-22 09:27:25', NULL, NULL, NULL, NULL),
(29, 'IT Certification', 4, NULL, NULL, NULL, 'it-certification', 1, '2020-09-22 09:27:54', '2020-09-22 09:27:54', NULL, NULL, NULL, NULL),
(30, 'Network & Security', 4, NULL, NULL, NULL, 'network-security', 1, '2020-09-22 09:28:04', '2020-09-22 09:28:04', NULL, NULL, NULL, NULL),
(31, 'Hardware', 4, NULL, NULL, NULL, 'hardware', 1, '2020-09-22 09:28:15', '2020-09-22 09:28:15', NULL, NULL, NULL, NULL),
(32, 'Operating Systems', 4, NULL, NULL, NULL, 'operating-systems', 1, '2020-09-22 09:28:24', '2020-09-22 09:28:24', NULL, NULL, NULL, NULL),
(33, 'Other', 4, NULL, NULL, NULL, 'other', 1, '2020-09-22 09:28:35', '2020-09-22 09:28:35', NULL, NULL, NULL, NULL),
(34, 'Personal Transformation', 5, NULL, NULL, NULL, 'personal-transformation', 1, '2020-09-22 09:29:07', '2020-09-22 09:29:07', NULL, NULL, NULL, NULL),
(35, 'Productivity', 5, NULL, NULL, NULL, 'productivity', 1, '2020-09-22 09:29:17', '2020-09-22 09:29:17', NULL, NULL, NULL, NULL),
(36, 'Leadership', 5, NULL, NULL, NULL, 'leadership', 1, '2020-09-22 09:29:27', '2020-09-22 09:29:27', NULL, NULL, NULL, NULL),
(37, 'Personal Finance', 5, NULL, NULL, NULL, 'personal-finance', 1, '2020-09-22 09:29:38', '2020-09-22 09:29:38', NULL, NULL, NULL, NULL),
(38, 'Career Development', 5, NULL, NULL, NULL, 'career-development', 1, '2020-09-22 09:29:49', '2020-09-22 09:29:49', NULL, NULL, NULL, NULL),
(39, 'Digital Photography', 6, NULL, NULL, NULL, 'digital-photography', 1, '2020-09-22 09:30:34', '2020-09-22 09:30:34', NULL, NULL, NULL, NULL),
(40, 'Photography Fundamentals', 6, NULL, NULL, NULL, 'photography-fundamentals', 1, '2020-09-22 09:30:45', '2020-09-22 09:30:45', NULL, NULL, NULL, NULL),
(41, 'Portraits', 6, NULL, NULL, NULL, 'portraits', 1, '2020-09-22 09:30:54', '2020-09-22 09:30:54', NULL, NULL, NULL, NULL),
(42, 'Photography Tools', 6, NULL, NULL, NULL, 'photography-tools', 1, '2020-09-22 09:31:03', '2020-09-22 09:31:03', NULL, NULL, NULL, NULL),
(43, 'Other', 6, NULL, NULL, NULL, 'other-3b6b444f5057', 1, '2020-09-22 09:31:44', '2020-09-22 09:31:44', NULL, NULL, NULL, NULL),
(44, 'Finance', 7, NULL, NULL, NULL, 'finance', 1, '2020-09-22 09:32:11', '2020-09-22 09:32:11', NULL, NULL, NULL, NULL),
(45, 'Entrepreneurship', 7, NULL, NULL, NULL, 'entrepreneurship', 1, '2020-09-22 09:32:21', '2020-09-22 09:32:21', NULL, NULL, NULL, NULL),
(46, 'Communications', 7, NULL, NULL, NULL, 'communications', 1, '2020-09-22 09:32:30', '2020-09-22 09:32:30', NULL, NULL, NULL, NULL),
(47, 'Management', 7, NULL, NULL, NULL, 'management', 1, '2020-09-22 09:32:42', '2020-09-22 09:32:42', NULL, NULL, NULL, NULL),
(48, 'Sales', 7, NULL, NULL, NULL, 'sales', 1, '2020-09-22 09:32:56', '2020-09-22 09:32:56', NULL, NULL, NULL, NULL),
(49, 'Instruments', 8, NULL, NULL, NULL, 'instruments', 1, '2020-09-22 09:33:20', '2020-09-22 09:33:20', NULL, NULL, NULL, NULL),
(50, 'Production', 8, NULL, NULL, NULL, 'production', 1, '2020-09-22 09:33:30', '2020-09-22 09:33:30', NULL, NULL, NULL, NULL),
(51, 'Music Fundamentals', 8, NULL, NULL, NULL, 'music-fundamentals', 1, '2020-09-22 09:33:40', '2020-09-22 09:33:40', NULL, NULL, NULL, NULL),
(52, 'Vocal', 8, NULL, NULL, NULL, 'vocal', 1, '2020-09-22 09:33:50', '2020-09-22 09:33:50', NULL, NULL, NULL, NULL),
(53, 'Music Techniques', 8, NULL, NULL, NULL, 'music-techniques', 1, '2022-04-08 09:47:36', '2022-04-08 09:47:36', NULL, NULL, NULL, NULL),
(54, 'Email Marketing', 9, NULL, NULL, NULL, 'email-marketing', 1, '2020-09-22 10:27:34', '2020-09-22 10:27:34', NULL, NULL, NULL, NULL),
(55, 'Internet Marketing', 9, NULL, NULL, NULL, 'internet-marketing', 1, '2020-09-22 10:27:35', '2020-09-22 10:27:35', NULL, NULL, NULL, NULL),
(56, 'Arts', 0, NULL, NULL, 'f7c0d70b_Voices_Arts_main-760x378.jpg', 'arts', 0, '2022-04-22 13:12:28', '2022-04-22 20:12:28', 'Art is a category i which everyone wants to learn something creative', NULL, NULL, NULL),
(57, 'Data Science Certification', 29, NULL, NULL, '84bf5877_download (4).jpg', 'data-science-certification', 1, '2020-12-16 13:50:15', '2020-12-16 13:50:15', NULL, NULL, NULL, NULL),
(58, 'SMM', 10, NULL, NULL, '828fa6ce_My Post.png', 'smm', 1, '2021-02-20 20:51:21', '2021-02-20 20:51:21', NULL, NULL, NULL, NULL),
(59, 'Engineering', 0, NULL, 'Electrical', 'f830c34e_engineering3.png', 'engineering', 0, '2022-04-22 13:12:26', '2022-04-22 20:12:26', 'Details education technical engineering', NULL, NULL, NULL),
(60, 'Civil Engineering', 59, NULL, NULL, 'eebc1bca_engineering3.png', 'civil-engineering', 1, '2021-06-22 13:28:12', '2021-06-22 13:28:12', NULL, NULL, NULL, NULL),
(61, 'Electrical Engineering', 59, NULL, NULL, '194e1a6f_engineering3.png', 'electrical-engineering', 1, '2021-06-22 13:28:33', '2021-06-22 13:28:33', NULL, NULL, NULL, NULL),
(62, 'Mechanical Engineering', 59, NULL, NULL, '8b39814d_engineering3.png', 'mechanical-engineering', 1, '2021-06-22 13:28:49', '2021-06-22 13:28:49', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(3) NOT NULL,
  `name` varchar(44) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Afghanistan', 'afghanistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(10, 'Albania', 'albania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(11, 'Algeria', 'algeria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(12, 'American Samoa', 'american-samoa', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(13, 'Andorra', 'andorra', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(14, 'Angola', 'angola', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(15, 'Anguilla', 'anguilla', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(16, 'Antarctica', 'antarctica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(17, 'Antigua and Barbuda', 'antigua-and-barbuda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(18, 'Argentina', 'argentina', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(19, 'Armenia', 'armenia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(20, 'Aruba', 'aruba', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(21, 'Ashmore and Cartier', 'ashmore-and-cartier', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(3, 'Australia', 'australia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(23, 'Austria', 'austria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(24, 'Azerbaijan', 'azerbaijan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(26, 'Bahrain', 'bahrain', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(27, 'Baker Island', 'baker-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(28, 'Bangladesh', 'bangladesh', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(29, 'Barbados', 'barbados', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(30, 'Bassas da India', 'bassas-da-india', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(31, 'Belarus', 'belarus', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(32, 'Belgium', 'belgium', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(33, 'Belize', 'belize', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(34, 'Benin', 'benin', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(35, 'Bermuda', 'bermuda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(36, 'Bhutan', 'bhutan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(37, 'Bolivia', 'bolivia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(38, 'Bosnia and Herzegovina', 'bosnia-and-herzegovina', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(39, 'Botswana', 'botswana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(40, 'Bouvet Island', 'bouvet-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(41, 'Brazil', 'brazil', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(42, 'British Indian Ocean Territory', 'british-indian-ocean-territory', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(43, 'British Virgin Islands', 'british-virgin-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(44, 'Brunei Darussalam', 'brunei-darussalam', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(45, 'Bulgaria', 'bulgaria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(46, 'Burkina Faso', 'burkina-faso', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(47, 'Burma', 'burma', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(48, 'Burundi', 'burundi', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(49, 'Cambodia', 'cambodia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(50, 'Cameroon', 'cameroon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(4, 'Canada', 'canada', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(52, 'Cape Verde', 'cape-verde', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(53, 'Cayman Islands', 'cayman-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(54, 'Central African Republic', 'central-african-republic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(55, 'Chad', 'chad', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(56, 'Chile', 'chile', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(57, 'China', 'china', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(58, 'Christmas Island', 'christmas-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(59, 'Clipperton Island', 'clipperton-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(60, 'Cocos (Keeling) Islands', 'cocos-keeling-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(61, 'Colombia', 'colombia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(62, 'Comoros', 'comoros', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(63, 'Congo, Democratic Republic of the', 'congo-democratic-republic-of-the', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(64, 'Congo, Republic of the', 'congo-republic-of-the', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(65, 'Cook Islands', 'cook-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(66, 'Coral Sea Islands', 'coral-sea-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(67, 'Costa Rica', 'costa-rica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(68, 'Cote d\'Ivoire', 'cote-d-ivoire', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(69, 'Croatia', 'croatia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(70, 'Cuba', 'cuba', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(71, 'Cyprus', 'cyprus', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(72, 'Czech Republic', 'czech-republic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(73, 'Denmark', 'denmark', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(74, 'Djibouti', 'djibouti', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(75, 'Dominica', 'dominica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(76, 'Dominican Republic', 'dominican-republic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(77, 'East Timor', 'east-timor', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(78, 'Ecuador', 'ecuador', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(79, 'Egypt', 'egypt', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(80, 'El Salvador', 'el-salvador', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(81, 'Equatorial Guinea', 'equatorial-guinea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(82, 'Eritrea', 'eritrea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(83, 'Estonia', 'estonia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(84, 'Ethiopia', 'ethiopia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(85, 'Europa Island', 'europa-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(86, 'Falkland Islands (Islas Malvinas)', 'falkland-islands-islas-malvinas', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(87, 'Faroe Islands', 'faroe-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(88, 'Fiji', 'fiji', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(89, 'Finland', 'finland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(90, 'France', 'france', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(91, 'France, Metropolitan', 'france-metropolitan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(92, 'French Guiana', 'french-guiana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(93, 'French Polynesia', 'french-polynesia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(94, 'French Southern and Antarctic Lands', 'french-southern-and-antarctic-lands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(95, 'Gabon', 'gabon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(97, 'Gaza Strip', 'gaza-strip', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(98, 'Georgia', 'georgia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(99, 'Germany', 'germany', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(100, 'Ghana', 'ghana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(101, 'Gibraltar', 'gibraltar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(102, 'Glorioso Islands', 'glorioso-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(103, 'Greece', 'greece', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(104, 'Greenland', 'greenland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(105, 'Grenada', 'grenada', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(106, 'Guadeloupe', 'guadeloupe', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(107, 'Guam', 'guam', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(108, 'Guatemala', 'guatemala', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(109, 'Guernsey', 'guernsey', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(110, 'Guinea', 'guinea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(111, 'Guinea-Bissau', 'guinea-bissau', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(112, 'Guyana', 'guyana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(113, 'Haiti', 'haiti', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(114, 'Heard Island and McDonald Islands', 'heard-island-and-mcdonald-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(115, 'Holy See (Vatican City)', 'holy-see-vatican-city', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(116, 'Honduras', 'honduras', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(117, 'Hong Kong (SAR)', 'hong-kong-sar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(118, 'Howland Island', 'howland-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(119, 'Hungary', 'hungary', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(120, 'Iceland', 'iceland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(8, 'India', 'india', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(122, 'Indonesia', 'indonesia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(123, 'Iran', 'iran', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(124, 'Iraq', 'iraq', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(125, 'Ireland', 'ireland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(126, 'Israel', 'israel', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(127, 'Italy', 'italy', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(128, 'Jamaica', 'jamaica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(129, 'Jan Mayen', 'jan-mayen', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(130, 'Japan', 'japan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(131, 'Jarvis Island', 'jarvis-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(132, 'Jersey', 'jersey', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(133, 'Johnston Atoll', 'johnston-atoll', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(134, 'Jordan', 'jordan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(135, 'Juan de Nova Island', 'juan-de-nova-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(136, 'Kazakhstan', 'kazakhstan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(137, 'Kenya', 'kenya', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(138, 'Kingman Reef', 'kingman-reef', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(139, 'Kiribati', 'kiribati', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(140, 'Korea, North', 'korea-north', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(141, 'Korea, South', 'korea-south', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(142, 'Kuwait', 'kuwait', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(143, 'Kyrgyzstan', 'kyrgyzstan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(144, 'Laos', 'laos', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(145, 'Latvia', 'latvia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(146, 'Lebanon', 'lebanon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(147, 'Lesotho', 'lesotho', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(148, 'Liberia', 'liberia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(149, 'Libya', 'libya', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(150, 'Liechtenstein', 'liechtenstein', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(151, 'Lithuania', 'lithuania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(152, 'Luxembourg', 'luxembourg', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(153, 'Macao', 'macao', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(154, 'Macedonia, The Former Yugoslav Republic of', 'macedonia-the-former-yugoslav-repu', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(155, 'Madagascar', 'madagascar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(156, 'Malawi', 'malawi', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(157, 'Malaysia', 'malaysia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(158, 'Maldives', 'maldives', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(159, 'Mali', 'mali', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(160, 'Malta', 'malta', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(161, 'Man, Isle of', 'man-isle-of', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(162, 'Marshall Islands', 'marshall-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(163, 'Martinique', 'martinique', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(164, 'Mauritania', 'mauritania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(165, 'Mauritius', 'mauritius', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(166, 'Mayotte', 'mayotte', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(167, 'Mexico', 'mexico', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(168, 'Micronesia, Federated States of', 'micronesia-federated-states-of', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(169, 'Midway Islands', 'midway-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(170, 'Miscellaneous (French)', 'miscellaneous-french', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(171, 'Moldova', 'moldova', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(172, 'Monaco', 'monaco', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(173, 'Mongolia', 'mongolia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(174, 'Montenegro', 'montenegro', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(175, 'Montserrat', 'montserrat', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(176, 'Morocco', 'morocco', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(177, 'Mozambique', 'mozambique', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(178, 'Myanmar', 'myanmar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(179, 'Namibia', 'namibia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(180, 'Nauru', 'nauru', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(181, 'Navassa Island', 'navassa-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(182, 'Nepal', 'nepal', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(183, 'Netherlands', 'netherlands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(184, 'Netherlands Antilles', 'netherlands-antilles', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(185, 'New Caledonia', 'new-caledonia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(7, 'New Zealand', 'new-zealand', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(187, 'Nicaragua', 'nicaragua', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(188, 'Niger', 'niger', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(189, 'Nigeria', 'nigeria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(190, 'Niue', 'niue', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(191, 'Norfolk Island', 'norfolk-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(192, 'Northern Mariana Islands', 'northern-mariana-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(193, 'Norway', 'norway', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(194, 'Oman', 'oman', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(195, 'Pakistan', 'pakistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(196, 'Palau', 'palau', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(197, 'Palmyra Atoll', 'palmyra-atoll', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(198, 'Panama', 'panama', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(199, 'Papua New Guinea', 'papua-new-guinea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(200, 'Paracel Islands', 'paracel-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(201, 'Paraguay', 'paraguay', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(202, 'Peru', 'peru', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(203, 'Philippines', 'philippines', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(204, 'Pitcairn Islands', 'pitcairn-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(205, 'Poland', 'poland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(206, 'Portugal', 'portugal', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(207, 'Puerto Rico', 'puerto-rico', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(208, 'Qatar', 'qatar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(209, 'R', 'r', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(210, 'Romania', 'romania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(211, 'Russia', 'russia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(212, 'Rwanda', 'rwanda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(213, 'Saint Helena', 'saint-helena', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(214, 'Saint Kitts and Nevis', 'saint-kitts-and-nevis', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(215, 'Saint Lucia', 'saint-lucia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(216, 'Saint Pierre and Miquelon', 'saint-pierre-and-miquelon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(217, 'Saint Vincent and the Grenadines', 'saint-vincent-and-the-grenadines', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(218, 'Samoa', 'samoa', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(219, 'San Marino', 'san-marino', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(220, 'S', 's', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(221, 'Saudi Arabia', 'saudi-arabia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(222, 'Senegal', 'senegal', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(223, 'Serbia', 'serbia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(224, 'Serbia and Montenegro', 'serbia-and-montenegro', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(225, 'Seychelles', 'seychelles', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(226, 'Sierra Leone', 'sierra-leone', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(227, 'Singapore', 'singapore', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(228, 'Slovakia', 'slovakia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(229, 'Slovenia', 'slovenia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(230, 'Solomon Islands', 'solomon-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(231, 'Somalia', 'somalia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(232, 'South Africa', 'south-africa', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(233, 'South Georgia and the South Sandwich Islands', 'south-georgia-and-the-south-sandwic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(234, 'Spain', 'spain', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(235, 'Spratly Islands', 'spratly-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(236, 'Sri Lanka', 'sri-lanka', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(237, 'Sudan', 'sudan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(238, 'Suriname', 'suriname', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(239, 'Svalbard', 'svalbard', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(240, 'Swaziland', 'swaziland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(241, 'Sweden', 'sweden', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(242, 'Switzerland', 'switzerland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(243, 'Syria', 'syria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(244, 'Taiwan', 'taiwan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(245, 'Tajikistan', 'tajikistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(246, 'Tanzania', 'tanzania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(247, 'Thailand', 'thailand', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(25, 'The Bahamas', 'the-bahamas', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(96, 'The Gambia', 'the-gambia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(248, 'Togo', 'togo', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(249, 'Tokelau', 'tokelau', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(250, 'Tonga', 'tonga', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(251, 'Trinidad and Tobago', 'trinidad-and-tobago', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(252, 'Tromelin Island', 'tromelin-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(253, 'Tunisia', 'tunisia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(254, 'Turkey', 'turkey', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(255, 'Turkmenistan', 'turkmenistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(256, 'Turks and Caicos Islands', 'turks-and-caicos-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(257, 'Tuvalu', 'tuvalu', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(258, 'Uganda', 'uganda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(259, 'Ukraine', 'ukraine', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(260, 'United Arab Emirates', 'united-arab-emirates', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(5, 'United Kingdom', 'united-kingdom', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(2, 'United States', 'united-states', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(263, 'United States Minor Outlying Islands', 'united-states-minor-outlying-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(264, 'Uruguay', 'uruguay', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(265, 'Uzbekistan', 'uzbekistan', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(266, 'Vanuatu', 'vanuatu', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(267, 'Venezuela', 'venezuela', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(268, 'Vietnam', 'vietnam', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(269, 'Virgin Islands', 'virgin-islands', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(270, 'Virgin Islands (UK)', 'virgin-islands-uk', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(271, 'Virgin Islands (US)', 'virgin-islands-us', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(272, 'Wake Island', 'wake-island', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(273, 'Wallis and Futuna', 'wallis-and-futuna', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(274, 'West Bank', 'west-bank', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(275, 'Western Sahara', 'western-sahara', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(276, 'Western Samoa', 'western-samoa', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(277, 'World', 'world', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(278, 'Yemen', 'yemen', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(279, 'Yugoslavia', 'yugoslavia', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(280, 'Zaire', 'zaire', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(281, 'Zambia', 'zambia', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(282, 'Zimbabwe', 'zimbabwe', 1, '2015-02-02 07:00:00', '2022-04-22 19:50:39'),
(298, 'Somaliland', 'somaliland', 1, '2022-03-26 12:39:38', '2022-04-22 19:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coursecontents`
--

CREATE TABLE `tbl_coursecontents` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `lecture_title` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `video_time` varchar(255) DEFAULT NULL,
  `lecture_description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coursecontents`
--

INSERT INTO `tbl_coursecontents` (`id`, `course_id`, `user_id`, `section_id`, `lecture_title`, `video`, `video_time`, `lecture_description`, `slug`, `status`, `created_at`, `updated_at`, `video_status`) VALUES
(60, 3, 1, 50, 'Introduction', '49d6f0dc_Video 2.mp4', '0:21', 'Welcome to this course! Let me introduce myself and give you a first impression of the course content! Content for testing.', 'content31-7aa01db8a4c1', 1, '2021-06-17 13:55:54', '2021-06-17 13:55:54', 1),
(61, 4, 1, 51, 'Introduction', '300ce086_Video 2.mp4', '0:21', 'Welcome to the course, amazing to have you on board of this JavaScript course! Let me walk you through the content of this complete JavaScript course and explain what you\'re going to learn!', 'content41', 1, '2021-06-17 13:13:25', '2021-06-17 13:13:25', 1),
(62, 4, 1, 51, 'What is JavaScript?', 'b27d12ca_Video 2.mp4', '0:21', 'Let\'s dig deeper into the core fundamentals of JavaScript and add it our first little web application! Let\'s dig deeper into the core fundamentals of JavaScript and add it our first little web application!', 'content41-b2d9578189d5', 1, '2020-11-03 11:09:37', NULL, 0),
(63, 4, 1, 52, 'Module Introduction', NULL, NULL, 'Let\'s dig deeper into the core fundamentals of JavaScript and add it our first little web application! Let\'s dig deeper into the core fundamentals of JavaScript and add it our first little web application!', 'content42', 1, '2020-11-03 11:09:37', NULL, 0),
(64, 5, 1, 49, 'Let\'s Start This Amazing Journey!', '81a3b114_Video 2.mp4', '0:21', 'Let\'s Start This Amazing Journey! Let\'s Start This Amazing Journey!', 'content51-fe828e483a70', 1, '2020-11-06 06:52:05', NULL, 0),
(65, 5, 1, 49, 'READ BEFORE YOU START!', '15d8f71a_Video 2.mp4', '0:21', 'READ BEFORE YOU START! READ BEFORE YOU START! READ BEFORE YOU START!', 'content51', 1, '2020-11-06 06:52:05', NULL, 0),
(66, 5, 1, 53, 'Download the Code', '4af1297b_Video 2.mp4', '0:21', 'Download the Code Download the Code Download the Code', 'content52-e52847249d81', 1, '2020-11-06 06:52:05', NULL, 0),
(67, 5, 1, 54, 'Getting started with CSS', '63a662b7_Video 2.mp4', '0:21', 'Getting started with CSS Getting started with CSS Getting started with CSS', 'content53-44f1a36db4b5', 1, '2020-11-06 06:52:05', NULL, 0),
(68, 6, 1, 55, 'Let me introduce myself', 'eaed5fed_LOGICSPICE-HD720p.mp4', '0:46', 'I have got the right experience.I have got the rig', 'content61', 1, '2021-06-17 13:09:32', '2021-06-17 13:09:32', 1),
(69, 6, 1, 55, '2. Chapter two', 'faaa24f1_LOGICSPICE-original.mp4', '0:46', 'Can you please focus, we are working over it with', 'content61-872c49d43a20', 1, '2021-06-17 13:11:07', '2021-06-17 13:11:07', 1),
(70, 7, 14, 56, 'Lesson 1: My Introduction', '3e0c1104_iPhone-SE-Apple.mp4', '0:58', 'Lesson 1: My Introduction', 'content71-4250a8810714', 1, '2021-03-22 11:15:07', NULL, 0),
(71, 7, 14, 56, 'Lesson 2 : Let\'s Get Started Lesson 1', '47b8db49_iPhone-SE-Apple.mp4', '0:58', 'Lesson 2 : Let\'s Get Started Lesson 1', 'content71-8149f1aff9ed', 1, '2021-03-22 11:15:07', NULL, 0),
(72, 7, 14, 56, 'cvsdgfsd', NULL, NULL, 'sdfdsfssdfsfdsfdsfdsfdsfs', 'content71-65c265c8285a', 1, '2021-03-22 11:15:07', NULL, 0),
(73, 7, 14, 57, 'Lesson 1: My Introduction', '40ed1aad_iPhone-SE-Apple.mp4', '0:58', 'Lesson 1: My Introduction', 'content72-38dde2e770f5', 1, '2021-03-22 11:15:07', NULL, 0),
(74, 7, 14, 57, 'Lesson 2 : Let\'s Get Started Lesson 1', '0077a9d7_iPhone-SE-Apple.mp4', '0:58', 'Lesson 2 : Let\'s Get Started Lesson 1', 'content72-48e8bda17f32', 1, '2021-03-22 11:15:07', NULL, 0),
(75, 7, 14, 57, 'cvsdgfsd', NULL, NULL, 'sdfdsfssdfsfdsfdsfdsfdsfs', 'content72', 1, '2021-03-22 11:15:07', NULL, 0),
(76, 7, 14, 57, 'sdfsfdssdfdsfdsfsd', NULL, NULL, 'adsadsafasfsafafafafasfafasfa', 'content72-7fdaa01b8e28', 1, '2021-03-22 11:15:07', NULL, 0),
(77, 8, 1, 58, 'jjhjjhhhhh', '8a7e67ff_big_buck_bunny_720p_1mb.mp4', '0:05', 'jhhhhhhhhh iure jiotw wiot ewlk', 'content81-1d44502dc57d', 1, '2021-07-06 08:52:09', '2021-07-06 08:52:09', 1),
(78, 9, 14, 59, 'Introduction', '4a508db1_720.mp4', '0:52', 'Introssdggagdzsgsgsdgdgsd', 'content91', 1, '2021-03-22 11:14:32', NULL, 0),
(79, 10, 1, 60, 'Advanced Java Programming', NULL, NULL, 'Advanced Java Programming', 'content101', 1, '2021-03-22 11:06:16', NULL, 0),
(80, 11, 1, 61, 'fghrthrth', NULL, NULL, 'srtrtjhrthrtht rthhrthrthrth erger', 'content111', 1, '2021-03-22 10:13:15', NULL, 0),
(81, 13, 14, 62, 'Design', NULL, NULL, 'I\'m a full-stack web developer and designe.', 'content131', 1, '2021-03-23 09:16:01', NULL, 0),
(82, 14, 14, 63, 'UX Design', NULL, NULL, 'I\'m a full-stack web developer and designer.', 'content141', 1, '2021-03-23 09:21:02', NULL, 0),
(83, 15, 13, 64, 'why python?', 'aed46d90_healthybotlle.mp4', '0:15', 'why chhosing python as first programming language?', 'content151', 1, '2021-03-24 10:51:53', NULL, 0),
(84, 15, 13, 64, 'print', NULL, NULL, 'learn to use print function', 'content151-2e817e4a07c6', 1, '2021-03-24 10:51:53', NULL, 0),
(85, 16, 13, 65, 'why python?', '5a628649_healthybotlle.mp4', '0:15', 'why starting learning to programm by using python?', 'content161', 1, '2021-03-24 10:58:22', NULL, 0),
(86, 16, 13, 65, 'print', 'cc152596_RTpTzyvvLAUWuemRJsH@@hd.mp4', '0:15', 'learn to use prbuil print function inpython', 'content161-8fb962217d50', 1, '2021-03-24 10:58:22', NULL, 0),
(87, 16, 13, 66, 'classes', '5f445864_healthybotlle.mp4', '0:15', 'what are classes in python?', 'content162', 1, '2021-03-24 10:58:22', NULL, 0),
(88, 17, 14, 67, 'Lecture 001', '09d875df_SampleVideo_1280x720_1mb.mp4', '0:05', 'Sample lecture 001 for mech engineering', 'content171', 1, '2022-01-30 19:35:15', NULL, 0),
(89, 18, 14, 68, 'dgetgws', '60ad1047_WIN_20211008_13_31_43_Pro.mp4', '0:03', 'gdtgbwsreqasfgwsfwfesfdvdsad', 'content181', 1, '2022-03-26 13:45:14', NULL, 0),
(90, 18, 14, 69, 'dgetgws', '55eddba6_WIN_20211008_13_31_43_Pro.mp4', '0:03', 'gdtgbwsreqasfgwsfwfesfdvdsad', 'content182-bf21f6c033a7', 1, '2022-03-26 13:45:14', NULL, 0),
(91, 18, 14, 69, 'ertgetgetgg', '65823b4c_WIN_20211008_13_31_43_Pro.mp4', '0:03', 'retereryehrytyhhtrththh', 'content182', 1, '2022-03-26 13:45:14', NULL, 0),
(92, 24, 14, 70, 'Test Title', 'f9cdbca0_Clinical RESTORE Video FINAL.mp4', '1:19', 'Test descriptionTest descriptionTest descriptionT', 'content241', 1, '2022-04-14 05:17:20', NULL, 0),
(93, 17, 14, 67, 'aaaaa', NULL, NULL, 'kj?ki?j?ll?l?ik?lki?kl?ik', 'content171-7ae5efd982ac', 1, '2022-01-30 19:35:15', NULL, 0),
(94, 26, 114, 71, 'Basic of QA', 'd4d459ff_122821 SignupNoPopupSR.mp4', '0:17', 'Basics of Quality Assurance', 'content261', 1, '2022-04-08 11:43:20', NULL, 0),
(95, 27, 124, 72, 'Topic 1', 'ea1f2171_flowers_yellow_blossom_windy_nature_434.mp4', '0:12', 'Topic 1topic 2topic 2topic 2vv', 'content271', 1, '2022-04-14 10:52:25', NULL, 0),
(96, 27, 124, 73, 'topic 2', '54b9d705_flowers_yellow_blossom_windy_nature_434.mp4', '0:12', 'topic 2topic 2topic 2topic 2topic 2', 'content272', 1, '2022-04-14 10:52:25', NULL, 0),
(97, 28, 14, 74, 'finance', 'c65cfa20_videoplayback (9) (online-video-cutter.com).mp4', '1:08', 'dcfhjnmkl;,k ioiluktfgyhijl; gjk', 'content281', 1, '2022-04-21 09:10:06', NULL, 0),
(98, 28, 14, 75, 'uiobu8p9;pin', '7cf671fa_videoplayback (9) (online-video-cutter.com).mp4', '1:08', 'rfv789uno;ionoybnilubyonij', 'content282', 1, '2022-04-21 09:10:06', NULL, 0),
(99, 30, 128, 76, 'Procurement And Sourcing', NULL, NULL, 'Procurement And Sourcing', 'content301', 1, '2022-04-22 13:36:26', NULL, 0),
(100, 30, 128, 76, 'Value And Risk Mapping And E- Procurement', NULL, NULL, 'Value And Risk Mapping And E- Procurement', 'content301-72fbf51b1d1e', 1, '2022-04-22 13:36:26', NULL, 0),
(101, 30, 128, 77, 'The Sourcing Process', NULL, NULL, 'The Sourcing Process', 'content302', 1, '2022-04-22 13:36:26', NULL, 0),
(102, 31, 128, 78, 'Risk Management in Supply Chain Management', 'd28a4eae_videoplayback (9) (online-video-cutter.com) (2).mp4', '1:08', 'What to know before watching', 'content311', 1, '2022-04-26 11:14:26', NULL, 0),
(103, 31, 128, 79, 'Risk Management in Supply Chain Management', '78c8a819_videoplayback (9) (online-video-cutter.com) (2).mp4', '1:08', 'What to know before watching', 'content311-1e84b4b1941e', 1, '2022-04-26 11:15:09', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `id` int(10) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `sample_video` varchar(255) DEFAULT NULL,
  `sample_video_time` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`id`, `user_id`, `title`, `category_id`, `subcategory_id`, `subsubcategory_id`, `tags`, `description`, `image`, `sample_video`, `sample_video_time`, `sub_title`, `price`, `level`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(3, 1, 'React - The Complete Guide (incl Hooks, React Router, Redux)', '3', 27, NULL, '', '<ul>\r\n	<li>\r\n	<p>Build powerful, fast, user-friendly and reactive web apps</p>\r\n	</li>\r\n	<li>\r\n	<p>Provide amazing user experiences by leveraging the power of JavaScript with ease</p>\r\n	</li>\r\n	<li>\r\n	<p>Apply for high-paid jobs or work as a freelancer in one the most-demanded sectors you can find in web dev right now</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn React Hooks & Class-based Components</p>\r\n	</li>\r\n</ul>', '756b0beb_1362070_b9a1_2.jpg', '193233db_Video 2.mp4', NULL, 'Dive in and learn React.js from scratch! Learn Reactjs, Hooks, Redux, React Routing, Animations, Next.js and way more!', '65', '2', 1, 'test-test', '2020-11-03 10:57:40', '2020-11-05 09:00:21'),
(4, 1, 'JavaScript - The Complete Guide 2020 (Beginner + Advanced)', '3', 26, NULL, '', '<ul>\r\n	<li>\r\n	<p>JavaScript from scratch - beginner to advanced</p>\r\n	</li>\r\n	<li>\r\n	<p>All core features and concepts you need to know in modern JavaScript development</p>\r\n	</li>\r\n	<li>\r\n	<p>Everything you need to become a JavaScript expert and apply for JavaScript jobs</p>\r\n	</li>\r\n	<li>\r\n	<p>Project-driven learning with plenty of examples</p>\r\n	</li>\r\n	<li>\r\n	<p>All about variables, functions, objects and arrays</p>\r\n	</li>\r\n	<li>\r\n	<p>Object-oriented programming</p>\r\n	</li>\r\n	<li>\r\n	<p>Deep dives into prototypes, JavaScript engines &amp; how it works behind the scenes</p>\r\n	</li>\r\n	<li>\r\n	<p>Manipulating web pages (= the DOM) with JavaScript</p>\r\n	</li>\r\n	<li>\r\n	<p>Event handling, asynchronous coding and Http requests</p>\r\n	</li>\r\n	<li>\r\n	<p>Meta-programming, performance optimization, memory leak busting</p>\r\n	</li>\r\n	<li>\r\n	<p>Testing, security and deployment</p>\r\n	</li>\r\n	<li>\r\n	<p>And so much more!</p>\r\n	</li>\r\n</ul>', 'd3e40da7_2508942_11d3.jpg', 'f100ea2a_Video 2.mp4', '0:21', 'Modern JavaScript from the beginning - all the way up to JS expert level! THE must-have JavaScript resource in 2020.', '25', '1', 1, 'javascript-the-complete-guide-2020-beginner-advanced', '2020-11-03 11:09:58', '2020-11-05 09:00:21'),
(5, 1, 'Build Responsive Real World Websites with HTML5 and CSS3', '4', 33, NULL, '', '<ul>\r\n	<li>\r\n	<p>Real-world skills to build real-world websites: professional, beautiful and truly responsive websites</p>\r\n	</li>\r\n	<li>\r\n	<p>A huge project that will teach you everything you need to know to get started with HTML5 and CSS3</p>\r\n	</li>\r\n	<li>\r\n	<p>The proven 7 real-world steps from complete scratch to a fully functional and optimized website</p>\r\n	</li>\r\n	<li>\r\n	<p>Simple-to-use web design guidelines and tips to make your website stand out from the crowd</p>\r\n	</li>\r\n	<li>\r\n	<p>Learn super cool jQuery effects like animations, scroll effects and \"sticky\" navigation</p>\r\n	</li>\r\n	<li>\r\n	<p>Downloadable lectures, code and design assets for the entire project</p>\r\n	</li>\r\n	<li>\r\n	<p>Get helpful support in the course Q&A</p>\r\n	</li>\r\n</ul>', '9ce831bb_437398_46c3_9.jpg', '97e2415b_Video 2.mp4', '0:21', 'The easiest way to learn modern web design, HTML5 and CSS3 step-by-step from scratch. Design AND code a huge project.', '50', '3', 1, 'build-responsive-real-world-websites-with-html5-and-css3', '2021-01-18 07:29:07', '2021-01-18 07:29:07'),
(7, 14, 'Web Development', '4', 29, NULL, '', '<p>TestTestTestTestTestTest</p>', '95f99f49_Top-10-Web-Development-Companies-In-Australia-800x480.png', '7ed325aa_VID-20200411-WA0006.mp4', '0:15', 'Test Test', '5', '2', 1, 'test-test-233d54873ff4', '2022-03-26 13:27:42', '2022-03-26 13:27:42'),
(8, 1, 'Software Development', '4', 29, 57, '', '<p>ui</p>', '06abac47_software-development.jpg', 'c5c8f28a_big_buck_bunny_720p_1mb.mp4', '0:05', 'Software Development', '10', '1', 1, 'uiiiiiiiiiiiiiy', '2021-03-23 04:38:12', '2021-03-23 04:38:12'),
(9, 14, 'Social Media Management', '1', 10, 58, '', '<p>Social Media Management</p>', '141fa102_iStock-599703424.jpg', '5f6ac7f0_720.mp4', '0:52', 'Social Media Management', '20', '1', 1, 'social-media-management', '2021-03-22 11:23:47', '2021-03-22 11:23:47'),
(10, 1, 'Advanced Java Programming', '4', 29, 57, '', '<p>Advanced Java Programming</p>', 'a186cd53_programming-java.jpg', '43118bbe_193233db_Video 2.mp4', '0:21', 'Advanced Java Programming', '80', '1', 1, 'advanced-java-programming', '2021-03-22 11:07:03', '2021-03-22 11:07:03'),
(14, 14, 'UI/UX Design', '2', 20, NULL, '', '<p>UI/UX Design I\'m a full-stack web developer and designer with a passion for building beautiful things from scratch. I\'ve been building websites and apps since 2007 and also have a Master\'s degree in Engineering.</p>', '5edf86c5_8F8EE587-5EFB-4116-AB4F-2E9AAD80CB60.png', '07979ea4_Apple Ad - Intention.mp4', '1:31', 'Design', '50', '2', 1, 'ui-ux-design', '2022-03-26 13:51:23', '2022-03-26 13:51:23'),
(16, 13, 'basic programming with python', '3', 27, NULL, '', '<p>int this course you\'ll learn how to build you first programs using programming language as python</p>', 'b63a8dc3_Apprendre A CODER avec PYTHON_ Les bases.jpg', '6647e4b9_final-healthybotlle.mp4', '0:15', 'learn programming with python', '30', '1', 1, 'basic-programming-with-python', '2021-12-02 08:40:53', '2021-12-02 08:40:53'),
(17, 14, 'Mech Engineering', '59', 62, NULL, '', '<p>Sample text of mech engineering course</p>', 'd23b1583_engineering.png', 'd6d13e0b_SampleVideo_1280x720_1mb.mp4', '0:05', '101 of Mechanics', '20', '1', 1, 'mech-engineering', '2022-01-30 19:35:15', '2022-01-30 19:35:15'),
(18, 14, 'testt', '59', 61, NULL, '', '<p>testttt</p>', '696a4d0c_2021215.jpg', '4839f8d1_WIN_20211008_13_31_43_Pro.mp4', '0:03', 'testt', '20', '3', 1, 'testt', '2022-03-26 13:45:30', '2022-03-26 13:45:30'),
(19, 13, 'prueba', '8', 51, NULL, '', '<p>este es un curso de prueba</p>', '56280a6f_image018.png', 'f6acab81_cierre para videos.mp4', '0:02', 'prueba', '660', '1', 0, 'prueba', '2021-10-21 19:21:40', '2021-10-21 19:21:40'),
(21, 14, 'Computer Science Courses', '3', 25, NULL, '', '<p>Computer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science Courses</p>', '9d687417_Category 2.png', 'a752c5f7_#2019 Digital Marketing _ SEO _ Spark studios.mp4', '1:19', 'Computer Science Courses', '10', '1', 0, 'computer-science-courses', '2021-11-02 20:07:47', '2021-11-02 20:07:47'),
(22, 14, 'Computer Science Courses learning', '3', 25, NULL, '', '<p>Computer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science CoursesComputer Science Courses</p>', '21302251_Category 2.png', 'f1890241_Digital Marketing Course To Became Exper.mp4', '1:21', 'Computer Science Courses111', '85', '2', 0, 'computer-science-courses-learning', '2021-11-02 20:12:03', '2021-11-02 20:12:03'),
(23, 72, 'website designing', '3', 24, NULL, '', '<p>website designing with html5 and css</p>', 'f05ca89c_download.jpg', '88226947_file_example_MP4_480_1_5MG.mp4', '0:31', 'website designing with html5 and css', '25', '1', 0, 'website-designing', '2021-12-01 12:47:50', '2021-12-01 12:47:50'),
(24, 14, 'Test Course', '2', 23, NULL, '', '<p>Just TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust Testing</p>\r\n\r\n<p>Just TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust Testing</p>\r\n\r\n<p>Just TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust Testing</p>\r\n\r\n<p>Just TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust Testing</p>\r\n\r\n<p>Just TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust TestingJust Testing</p>', '6463f966_Christmas.png', '8798c390_Clinical RESTORE Video FINAL.mp4', '1:19', 'Just Testing', '15', '3', 1, 'test-course', '2022-04-14 05:20:33', '2022-04-14 05:20:33'),
(28, 14, 'Finance Global', '59', 61, NULL, '', '<p>du;kljhvnbhbnm</p>', '12fd9e7f_yyyy.jpg', '887d49f7_videoplayback (9) (online-video-cutter.com).mp4', '1:08', 'Financial Derivatives', '55', '1', 1, 'finance-global', '2022-04-21 09:10:32', '2022-04-21 09:10:32'),
(29, 29, 'asddas', '4', 29, 57, '', '<p>sadddddd</p>', 'e1f4e167_9ae2f9e0_tennis.jpg', '57820daf_122821 SignupNoPopupAccountOnly.mp4', '0:16', 'asdasddas', '65', '2', 0, 'asddas', '2022-04-22 20:27:05', '2022-04-22 20:27:05'),
(30, 128, 'Module 1: Supply Chain Procurement Optimization', '7', 44, NULL, '', '<ul>\r\n	<li>What you&#39;ll learn</li>\r\n	<li>\r\n	<p>Optimization and effects of constraints</p>\r\n	</li>\r\n	<li>\r\n	<p>Economies of Scope</p>\r\n	</li>\r\n	<li>\r\n	<p>System Attributes Constraints</p>\r\n	</li>\r\n	<li>\r\n	<p>Procurement And Strategy</p>\r\n	</li>\r\n	<li>\r\n	<p>Value And Risk Mapping And E- Procurement</p>\r\n	</li>\r\n	<li>\r\n	<p>Combinatorial Bids</p>\r\n	</li>\r\n	<li>\r\n	<p>The Sourcing Process</p>\r\n	</li>\r\n	<li>\r\n	<p>Mapping The Buy</p>\r\n	</li>\r\n	<li>\r\n	<p>Value Based Sourcing</p>\r\n	</li>\r\n	<li>\r\n	<p>Handling Volatility</p>\r\n	</li>\r\n	<li>\r\n	<p>Supplier Relationships</p>\r\n	</li>\r\n	<li>\r\n	<p>Physical Hedging</p>\r\n	</li>\r\n	<li>\r\n	<p>Capital Goods</p>\r\n	</li>\r\n	<li>\r\n	<p>Outsourcing</p>\r\n	</li>\r\n	<li>\r\n	<p>Purchasing Social Responsibility</p>\r\n	</li>\r\n	<li>\r\n	<p>Supply Chain Procurement</p>\r\n	</li>\r\n	<li>\r\n	<p>Tactical Buying , Leverage Buying , Critical Buy , Strategic Buy</p>\r\n	</li>\r\n	<li>\r\n	<p>e- Markets</p>\r\n	</li>\r\n	<li>\r\n	<p>Evaluating Suppliers</p>\r\n	</li>\r\n	<li>\r\n	<p>Feedback Loops</p>\r\n	</li>\r\n	<li>\r\n	<p>Volatile Component Pricing</p>\r\n	</li>\r\n	<li>\r\n	<p>Financial Hedging</p>\r\n	</li>\r\n	<li>\r\n	<p>Purchasing Dichotomy</p>\r\n	</li>\r\n	<li>\r\n	<p>&ldquo;Make&rdquo; vs &ldquo;Buy&rdquo;</p>\r\n	</li>\r\n	<li>\r\n	<p>Advantages of Outsourcing</p>\r\n	</li>\r\n	<li>\r\n	<p>Problems with Offshore Outsourcing</p>\r\n	</li>\r\n	<li>\r\n	<p>The Strategic Risk</p>\r\n	</li>\r\n	<li>\r\n	<p>Complete Cost Consideration</p>\r\n	</li>\r\n	<li>\r\n	<p>Hierarchy of Procurement CSR</p>\r\n	</li>\r\n	<li>\r\n	<p>Optimization based procurement</p>\r\n	</li>\r\n	<li>\r\n	<p>Level of Service in Procurement Optimization</p>\r\n	</li>\r\n	<li>\r\n	<p>Certification when you finish the course successfully.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Description</p>\r\n\r\n<p>In this module , we are going to talk about procurement. In other words, how do companies buy? The way companies buy is not like you and me are buying, because they buy in large quantity. In fact, most of the expenses, most of the cost of companies. we will look at many different methods to forward the procurement process with optimization through spreadsheets.</p>\r\n\r\n<p>is in what they buy. Very few companies make everything themselves, so they buy a lot of stuff. Parts, they buy material. They buy what&#39;s so-called non-direct material , material that doesn&#39;t go directly into production. We will talk about how to do it. And you think about why do you need to talk about it, because there are various types of buying. It is different if you decide to buy new machines, some three or four trucks, or to buy a new plant. This is a long-term buy. Of course, it&#39;s different if you decide to buy a million of something, a million chips or a million screws.</p>\r\n\r\n<p>You&#39;re not going to put the same type of process for a one-time buy as to buying in large numbers.</p>\r\n\r\n<p>Furthermore, if you&#39;re buying number 2 pens just something that is not expensive, and you buy a lot of it, it doesn&#39;t go into production, and the inventory carrying costs are not high,you&#39;re not going to worry about that much. So you do different processes for different types of procurement. Some things, however, may be the same for all types of procurement, all types of buys. And they always start with collecting information about the market. You want to collect information about your internal customers, the stakeholders who are going to use the stuff that you buy. You want to collect information about the market.</p>\r\n\r\n<p>who is out there? and about the suppliers.</p>\r\n\r\n<p>So both about market prices and who are the good suppliers. So you collect information. Then you have to develop strategy.</p>\r\n\r\n<p>What does it mean develop strategy? You want to develop the specification of the product , how exactly you need it, what kind of details you need in the product or in the service that you are looking for.</p>\r\n\r\n<p>And you also want to talk about the levers of power. Can you use your scale? Can you use knowledge of the market? Can you use other levers to get low cost and high value? Once you&#39;re finished with this, you are going through the bid process itself. Procurement is basically an auction process. So what you want to do, you want to first of all evaluate or develop the evaluation criteria. How are you going to judge which supply is better than others? And it&#39;s not straightforward, because some supplier may be better than others on certain dimensions, while others are better on other dimensions.</p>\r\n\r\n<p>Then you want to develop the request for proposal RFQ . This is how you communicate all this to the suppliers and to the marketplace. And then you actually conduct the auction process. We&#39;ll talk in detail about how to do it. And then you go into some negotiation process with this short list. In this negotiation process, you may point out</p>\r\n\r\n<p>to some of the bidders why they fall short in some areas and you give them an opportunity to fix their bid. Or you negotiate further over price showing them that there are good bidders, but the price is too high, whatever. Once you finish the negotiation process, you go through the implementation. and so on .</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>This module will teach you the best procurement strategies and methods of optimization available and useful&nbsp; procurement Strategy with introduction to the optimization part using spreadsheets.</strong></p>\r\n\r\n<p>Who this course is for:</p>\r\n\r\n<ul>\r\n	<li>Beginners in Supply Chain</li>\r\n	<li>Beginners in Procurement</li>\r\n	<li>Supply Chain Professionals</li>\r\n	<li>Students</li>\r\n	<li>Consultants</li>\r\n	<li>Management Consultants</li>\r\n	<li>Business Analysts</li>\r\n	<li>Supply Chain Managers</li>\r\n	<li>Business owners</li>\r\n	<li>Aspiring Procurement managers already working in a industry</li>\r\n	<li>People who wants a career in procurement</li>\r\n</ul>', '0c14a0b5_yyyy.jpg', '44e25dbf_videoplayback (9) (online-video-cutter.com).mp4', '1:08', 'The role of procurement in supply chain helps businesses maximize profits, and help manage compliance and reduce risks.', '5', '4', 1, 'module-1-supply-chain-procurement-optimization', '2022-04-22 20:36:32', '2022-04-22 20:36:32'),
(31, 128, 'Procurement and Supply Chain', '7', 47, NULL, '', '<p>The more complex a project is, the more likely it is that you&#39;ll need help from outside vendors and partners. Procurement is the process of planning, managing, and executing purchases of outside goods and services for your organization. In this course, author, speaker, and trainer Oliver Yarbrough explains what procurement management is and why it&rsquo;s essential to your success as a project manager. Review key concepts, pitfalls, critical success factors, and implementation best practices. Learn how to collaborate more effectively with your vendors and contract management team by understanding different procurement contract types. Plus, explore emerging trends such as rapid procurement and micro-purchases, which help speed up procurements.</p>', 'ef1fc098_Infographic-web-p31z6mu5un9b8t4bt17oyo5kvt1f1jwzj7o95p3w48.jpg', '48bda44c_videoplayback (9) (online-video-cutter.com) (2).mp4', '1:08', 'Risks in Supply chain Management', '10', '2', 0, 'procurement-and-supply-chain', '2022-04-26 18:15:09', '2022-04-26 18:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coursesections`
--

CREATE TABLE `tbl_coursesections` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coursesections`
--

INSERT INTO `tbl_coursesections` (`id`, `course_id`, `user_id`, `section_title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(49, 5, 1, 'Course introduction', 'section51-3f4c876da80a', 1, '2020-11-06 06:52:05', NULL),
(50, 3, 1, 'Getting Started', 'section31-de08addd7af6', 1, '2020-11-03 10:56:47', NULL),
(51, 4, 1, 'Introduction', 'section41', 1, '2020-11-03 11:09:36', NULL),
(52, 4, 1, 'Basics: Variables, Data Types, Operators & Functions', 'section42', 1, '2020-11-03 11:09:37', NULL),
(53, 5, 1, 'Dive into HTML', 'section52-c5cd9574c5d2', 1, '2020-11-06 06:52:05', NULL),
(54, 5, 1, 'Formatting with CSS', 'section53-70610861d0a8', 1, '2020-11-06 06:52:05', NULL),
(55, 6, 1, 'First chapter 1', 'section61', 1, '2021-03-22 11:49:24', NULL),
(56, 7, 14, 'Section 1 Introduction', 'section71-0ef2200fdcc1', 1, '2021-03-22 11:15:07', NULL),
(57, 7, 14, 'Section 2 Introduction', 'section72', 1, '2021-03-22 11:15:07', NULL),
(58, 8, 1, 'jhhhhh', 'section81-00f21b37573e', 1, '2021-03-22 06:28:19', NULL),
(59, 9, 14, 'Introduction', 'section91', 1, '2021-03-22 11:14:32', NULL),
(60, 10, 1, 'Advanced Java Programming', 'section101', 1, '2021-03-22 11:06:16', NULL),
(61, 11, 1, 'fthrt', 'section111', 1, '2021-03-22 10:13:15', NULL),
(62, 13, 14, 'UI/Ux Design', 'section131', 1, '2021-03-23 09:16:01', NULL),
(63, 14, 14, 'UI/UX Design', 'section141', 1, '2021-03-23 09:21:02', NULL),
(64, 15, 13, 'Introduction', 'section151', 1, '2021-03-24 10:51:53', NULL),
(65, 16, 13, 'Introduction', 'section161', 1, '2021-03-24 10:58:22', NULL),
(66, 16, 13, 'Section11', 'section162', 1, '2021-03-24 10:58:22', NULL),
(67, 17, 14, 'Section 1', 'section171', 1, '2022-01-30 19:35:15', NULL),
(68, 18, 14, 'trtyr', 'section181', 1, '2022-03-26 13:45:14', NULL),
(69, 18, 14, 'trtyr', 'section182-fc4bbb0f0352', 1, '2022-03-26 13:45:14', NULL),
(70, 24, 14, 'Test Section', 'section241', 1, '2022-04-14 05:17:20', NULL),
(71, 26, 114, 'Section 1', 'section261', 1, '2022-04-08 11:43:19', NULL),
(72, 27, 124, 'title', 'section271', 1, '2022-04-14 10:52:25', NULL),
(73, 27, 124, 'topic 2', 'section272', 1, '2022-04-14 10:52:25', NULL),
(74, 28, 14, 'ftfj,un;oliukyb', 'section281', 1, '2022-04-21 09:10:06', NULL),
(75, 28, 14, 'e65crkt8lyvkp', 'section282', 1, '2022-04-21 09:10:06', NULL),
(76, 30, 128, 'Procurement Strategy', 'section301', 1, '2022-04-22 13:36:26', NULL),
(77, 30, 128, 'Value And Risk Mapping And E- Procurement', 'section302', 1, '2022-04-22 13:36:26', NULL),
(78, 31, 128, 'Risk Management', 'section311', 1, '2022-04-26 11:14:25', NULL),
(79, 31, 128, 'Risk Management', 'section311-1168594fdad8', 1, '2022-04-26 11:15:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emailtemplates`
--

CREATE TABLE `tbl_emailtemplates` (
  `id` int(11) NOT NULL,
  `static_email_heading` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(150) CHARACTER SET utf8 NOT NULL,
  `template` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_emailtemplates`
--

INSERT INTO `tbl_emailtemplates` (`id`, `static_email_heading`, `title`, `subject`, `template`) VALUES
(1, 'admin_forgot', 'Admin Forgot Password', 'Admin Forgot Password', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Hi</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You have successfully retrieved login credentials!</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><a href=\"[!HTTP_PATH!]/admin/admins/login\" style=\"color:#434343;\">Click Here</a> To Login.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Username:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Password:</strong> [!password!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(2, 'user_added_from_admin', 'Register Added From Admin', 'Welcome on [!SITE_TITLE!]', '<table><tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Hi</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Your customer account has been created successfully by admin on [!SITE_TITLE!]</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Details are below :</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Password:</strong> [!password!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(3, 'user_register', 'User Registration', 'Welcome to [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#000000; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343; margin:0px 0 0;\">We are pleased to announce that your account has been created successfully.</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>   \r\n            <p style=\"color:#434343; margin:10px 0 0;\">Please click the link below to verify your Email address. </p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><a style=\"text-decoration:underline;\" href=\"[!link!]\">Click here</a> to verify your Email address. </p>\r\n\r\n        </td>\r\n    </tr>\r\n</table>'),
(4, 'forgot_password', 'Forgot Password', '[!SITE_TITLE!] Reset password', '<table>\r\n    <tr>\r\n        <td style=\"color:#000000; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Please reset your Password on <a href=\"<?php echo HTTP_PATH;?>\" style=\"color:#eb2f23;text-decoration: underline;\"></a> [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><a href=\"[!link!]\" style=\"color:#434343; \">Click here</a> to reset your account password.</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(5, 'user_register_social', 'User Registration by Social', 'Welcome on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#000000; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Welcome to</b> [!SITE_TITLE!]</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\">We are pleased to announce that your account has been created using [!login_type!] successfully.</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><strong style=\"width:150px;\">Password:</strong> [!password!]</p>    \r\n        </td>\r\n    </tr>\r\n</table>'),
(6, 'contact_email', 'Contact email send to admin', '[!name!] send Enquiry on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Hi</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Soneone send enquiry on [!SITE_TITLE!] via contact us with below details</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Name:</strong> [!name!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Contact Number:</strong> [!contact!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Message:</strong> [!message!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(7, 'offer_sent_buyer', 'Offer detail sent to buyer', '[!name!] has sent offer for your service request on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!name!]</b> has sent an offer on your service request <b>[!title!]</b>  on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Name:</strong> [!name!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Deliver in:</strong> [!deliver_in!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Message:</strong> [!message!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(8, 'offer_rejected_email', 'Offer rejected by buyer', 'Your offer has been rejected by buyer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Your offer on service request <b>[!title!]</b> has been rejected by buyer on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(9, 'offer_accepted_email', 'Offer accepted by buyer', 'Your offer has been accepted by buyer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Your offer on service request <b>[!title!]</b> has been accepted by buyer on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(10, 'service_accept_paypal_payment_user', 'Email sent to user when accept service request and pay using PayPal', 'You have successfully accepted offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You have successfully accepted seller offer and made payment on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(11, 'service_accept_paypal_payment_admin', 'Email sent to admin when accept service request and pay using PayPal', '[!username!] has accepted offer and mad payment via [!paymenttype!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has accepted seller offer and made payment on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Buyer Name:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(12, 'service_accept_paypal_payment_seller', 'Email sent to seller when accept service request and pay using PayPal', '[!username!] has accepted your offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!sellername!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has accepted your offer sent by you on service request <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n          </td>\r\n    </tr>\r\n</table>'),
(13, 'gig_paypal_payment_user', 'Email sent to user when purchase gig and pay using PayPal', 'You have successfully purchased gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You have successfully purchased gig on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(14, 'gig_payment_paypal_payment_admin', 'Email sent to admin when user purchase gig and pay using PayPal', '[!username!] has purchased gig and made payment via [!paymenttype!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has purchased gig and made payment on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Buyer Name:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(15, 'gig_purchase_paypal_payment_seller', 'Email sent to seller when purchase gig and pay using PayPal', '[!username!] has purchased your gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!sellername!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has purchased your gig <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Buyer Name:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(16, 'gig_mark_as_completed_by_buyer', 'Gig mark as completed by Buyer', 'Gig marked as completed by buyer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has marked your gig <b>[!title!]</b> as completed on [!SITE_TITLE!]. So please login on [!SITE_TITLE!] and give review rating to buyer.</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(17, 'rating_for_gig_by_buyer', 'Email sent to seller when buyer rate seller for Gig', 'Buyer give review rating for your completed gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has given review and rating for your recently completed gig <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(18, 'rating_for_gig_by_seller', 'Email sent to buyer when seller rate buyer for Gig', 'Seller give review rating for your purchased gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has given review and rating for your purchased gig <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(19, 'request_mark_as_completed_by_seller', 'Service request mark as completed by seller', 'Service request marked as completed by seller on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has marked service request <b>[!title!]</b> as completed on [!SITE_TITLE!]. So please login on [!SITE_TITLE!] and give review rating to seller.</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(20, 'wallet_credited_for_request_completion', 'Wallet credited for service completion', 'Your wallet is credited with amount [!amount!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>Your wallet is credited with amount <b>[!amount!]</b> on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Service Request Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(21, 'message_send', 'Message send to seller/buyer', '[!username!] has sent a message on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has sent a message on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Name:</strong> [!username!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Message:</strong> [!message!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(22, 'offer_send', 'Offer send to buyer', 'You just received an order from [!username!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You\'ve just received an order from [!username!] Feels good, right?\r\nOrder is due [!duedate!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(23, 'offer_accept_by_buyer', 'Offer accept by buyer', '[!username!] just accepted an offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">[!username!] have just accepted an offer on [!SITE_TITLE!] Feels good, right?</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(24, 'offer_reject_by_buyer', 'Offer reject by buyer', '[!username!] just rejected an offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">[!username!] have just rejected an offer on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(25, 'offer_withdrawn_by_seller', 'Offer withdrawn by seller', '[!username!] just withdrawn an offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">[!username!] have just withdrawn an offer on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `main` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `course_id`, `name`, `created_at`, `updated_at`, `status`, `main`) VALUES
(1, 1, 'f1990ed9_write-seo-friendly-content.png', '2018-09-28 10:11:42', '0000-00-00 00:00:00', 1, 0),
(2, 1, '6102ba2c_csc_templat.jpg', '2018-12-04 05:54:12', '0000-00-00 00:00:00', 1, 0),
(3, 3, '3817237c_image.jpeg', '2018-09-28 10:26:24', '0000-00-00 00:00:00', 1, 0),
(4, 2, '3c877d3f_aas.jpg', '2018-09-28 10:33:01', '0000-00-00 00:00:00', 1, 0),
(5, 4, 'a98828e4_be-your-professional-social-media-manager.jpg', '2018-09-28 10:36:23', '0000-00-00 00:00:00', 1, 0),
(6, 5, 'e549d8ae_llll.jpg', '2018-09-28 10:39:59', '0000-00-00 00:00:00', 1, 0),
(7, 5, '304fab7d_ass.png', '2018-09-28 10:39:59', '0000-00-00 00:00:00', 1, 0),
(8, 6, 'c5ab866f_produce-beautiful-food-photography-for-your-brand-1214.jpg', '2018-09-28 10:42:18', '0000-00-00 00:00:00', 1, 0),
(9, 7, '59ba3079_ssd.jpeg', '2018-09-28 10:46:52', '0000-00-00 00:00:00', 1, 0),
(10, 9, '087b24a8_create-an-excel-macro-with-excel-vba.png.jpeg', '2018-09-28 10:53:06', '0000-00-00 00:00:00', 1, 0),
(11, 8, '7cf75ba7_dfdf.jpeg', '2018-09-28 10:53:43', '0000-00-00 00:00:00', 1, 0),
(12, 10, 'e350175a_sas.jpg', '2018-09-28 11:02:14', '0000-00-00 00:00:00', 1, 0),
(13, 10, '6971f81e_ffddf.png', '2018-09-28 11:02:14', '0000-00-00 00:00:00', 1, 0),
(14, 11, '15877889_website.jpeg', '2018-09-28 11:03:57', '0000-00-00 00:00:00', 1, 0),
(15, 12, '7e5cc01a_dgdg.jpg', '2018-09-28 11:14:34', '0000-00-00 00:00:00', 1, 0),
(16, 13, '6fdd3b25_music.jpeg', '2018-09-28 11:20:08', '0000-00-00 00:00:00', 1, 0),
(17, 14, '09f2a4af_music.jpg', '2018-09-28 11:20:25', '0000-00-00 00:00:00', 1, 0),
(18, 16, 'db165c00_write-killer-sales-pages-that-explode-profits.png.jpeg', '2018-09-28 11:25:46', '0000-00-00 00:00:00', 1, 0),
(19, 15, '62d9e21b_fun.png', '2018-09-28 11:25:52', '0000-00-00 00:00:00', 1, 0),
(20, 19, 'd25b8994_sass.jpg', '2018-09-28 13:07:06', '0000-00-00 00:00:00', 1, 0),
(25, 15, 'c9bec5e1_job_recruitment_job_apply_online-512.png', '2018-12-24 06:46:18', '0000-00-00 00:00:00', 1, 0),
(26, 15, '81f3cfb6_trofis_img.png', '2018-12-24 06:46:18', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `time` bigint(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `sender_id`, `receiver_id`, `message`, `attachment`, `status`, `created_at`, `updated_at`, `slug`, `time`) VALUES
(3, 3, 1, 'test', NULL, NULL, '2018-12-24 01:07:45', '2018-12-24 01:07:45', '3', NULL),
(4, 3, 1, 'hi', '', 0, '2018-12-24 01:17:02', '2018-12-24 01:17:02', '31154563402277', 1545634022),
(5, 4, 3, 'test', NULL, NULL, '2019-01-25 07:02:35', '2019-01-25 07:02:35', '4', NULL),
(6, 4, 3, 'hiii', '', 0, '2019-02-05 04:07:19', '2019-02-05 04:07:19', '43154935943948', 1549359439),
(7, 4, 3, 'hiii', '', 0, '2019-02-05 04:12:47', '2019-02-05 04:12:47', '43154935976757', 1549359767),
(8, 4, 3, 'hi', '', 0, '2019-02-05 04:12:56', '2019-02-05 04:12:56', '43154935977664', 1549359776),
(9, 4, 3, 'hii', '', 0, '2019-02-05 04:13:06', '2019-02-05 04:13:06', '43154935978640', 1549359786),
(10, 4, 3, 'test', '', 0, '2019-02-05 04:13:24', '2019-02-05 04:13:24', '43154935980435', 1549359804),
(11, 4, 3, 'wait', '', 0, '2019-02-05 04:14:01', '2019-02-05 04:14:01', '43154935984120', 1549359841),
(12, 4, 3, 'good job', '', 0, '2019-02-05 04:15:34', '2019-02-05 04:15:34', '43154935993488', 1549359934),
(13, 3, 4, 'hi', '', 0, '2019-07-02 03:16:37', '2019-07-02 03:16:38', '34156205719763', 1562057197),
(14, 8, 4, 'hi', '', 0, '2019-07-02 03:16:37', '2019-07-02 03:16:38', '34156205719763', 1562057197),
(15, 4, 8, 'testing', '', 0, '2019-07-19 07:27:56', '2019-07-19 07:27:56', '48156354107681', 1563541076),
(16, 4, 8, 'testing', '', 0, '2019-07-26 07:04:42', '2019-07-26 07:04:42', '48156414448263', 1564144482),
(17, 4, 8, 'testing', '9c3d4cc8_Image Pasted at 2019-7-25 11-14.png', 0, '2019-07-26 07:17:37', '2019-07-26 07:17:37', '48156414525778', 1564145257),
(18, 4, 8, '', '6a5e8d4d_Image Pasted at 2019-7-25 11-14.png', 0, '2019-07-26 07:19:39', '2019-07-26 07:19:39', '48156414537972', 1564145379),
(19, 3, 1, 'test', NULL, NULL, '2019-07-30 07:11:22', '2019-07-30 07:11:22', '3-0d5abe1b0a7f', NULL),
(20, 37, 37, 'Hello !', NULL, NULL, '2019-10-02 20:08:16', '2019-10-02 20:08:16', '37', NULL),
(21, 37, 1, 'Hi', NULL, NULL, '2019-10-02 20:08:51', '2019-10-02 20:08:51', '37-931128de2d40', NULL),
(22, 3, 1, 'Test?', '', 0, '2019-10-08 21:21:45', '2019-10-08 21:21:45', '31157056970591', 1570569705),
(23, 3, 1, 'hello', '9dee321d_homeimprovements.gif', 0, '2019-10-09 13:17:44', '2019-10-09 13:17:44', '31157062706458', 1570627064),
(24, 3, 1, 'test', '', 0, '2019-10-16 16:52:54', '2019-10-16 16:52:54', '31157124477469', 1571244774),
(25, 50, 8, 'tgththyhh', NULL, NULL, '2019-11-01 13:47:29', '2019-11-01 13:47:29', '50', NULL),
(26, 50, 8, 'thrh', '', 0, '2019-11-01 13:47:38', '2019-11-01 13:47:38', '508157261605832', 1572616058),
(27, 3, 1, 'What do you think about that', '', 0, '2019-11-03 22:58:32', '2019-11-03 22:58:32', '31157282191226', 1572821912),
(28, 3, 1, 'hi', '', 0, '2019-11-10 08:12:27', '2019-11-10 08:12:27', '31157337354715', 1573373547),
(29, 4, 3, 'Hello , can you help me', NULL, NULL, '2019-11-10 08:58:53', '2019-11-10 08:58:53', '4-e451b3536b9f', NULL),
(30, 3, 4, 'yes how i can help u ?', '', 0, '2019-11-10 08:59:34', '2019-11-10 08:59:34', '34157337637414', 1573376374),
(31, 4, 3, 'with this', '', 0, '2019-11-10 09:00:01', '2019-11-10 09:00:01', '43157337640134', 1573376401),
(32, 3, 4, 'hellooo', '', 0, '2019-11-10 09:03:41', '2019-11-10 09:03:41', '34157337662133', 1573376621),
(33, 4, 3, 'yes', '', 0, '2019-11-10 09:03:59', '2019-11-10 09:03:59', '43157337663947', 1573376639),
(34, 4, 3, 'lolsqdqsdqsdlsq,dqs', '', 0, '2019-11-10 09:05:37', '2019-11-10 09:05:37', '43157337673738', 1573376737),
(35, 54, 3, 'hello i can help u with found girl', NULL, NULL, '2019-11-10 12:34:08', '2019-11-10 12:34:08', '54', NULL),
(36, 54, 3, 'lets discuss', '', 0, '2019-11-10 12:34:42', '2019-11-10 12:34:42', '543157338928298', 1573389282),
(37, 54, 3, 'ok', '', 0, '2019-11-10 12:35:21', '2019-11-10 12:35:21', '543157338932184', 1573389321),
(38, 3, 54, 'jkkjkjkj', NULL, NULL, '2019-11-10 13:39:58', '2019-11-10 13:39:58', '3-e61ea6c49202', NULL),
(39, 3, 4, 'Cool.', '', 0, '2019-11-19 19:47:13', '2019-11-19 19:47:13', '34157419283335', 1574192833),
(40, 3, 1, 'custom idea request. teset', NULL, NULL, '2019-11-19 22:24:11', '2019-11-19 22:24:11', '3-252620cf6f37', NULL),
(41, 3, 1, 'hi', '', 0, '2019-11-20 08:48:26', '2019-11-20 08:48:26', '31157423970656', 1574239706),
(42, 3, 1, 'Hi', '', 0, '2019-11-22 18:52:11', '2019-11-22 18:52:11', '31157444873156', 1574448731),
(43, 65, 8, 'asdd', NULL, NULL, '2019-12-30 19:25:56', '2019-12-30 19:25:56', '65', NULL),
(44, 65, 8, 'sdad', '', 0, '2019-12-30 19:26:05', '2019-12-30 19:26:05', '658157773396553', 1577733965),
(45, 3, 8, 'mn ,m', NULL, NULL, '2020-01-02 22:09:06', '2020-01-02 22:09:06', '3-cd779c729da4', NULL),
(46, 4, 3, 'jhkjhk', '', 0, '2020-01-14 23:06:29', '2020-01-14 23:06:29', '43157904318952', 1579043189),
(47, 3, 8, 'Hi', '', 0, '2020-01-21 17:26:04', '2020-01-21 17:26:04', '38157962756483', 1579627564),
(48, 3, 1, 'hi\r\nthis is a test', '', 0, '2020-02-07 16:43:59', '2020-02-07 16:43:59', '31158109383944', 1581093839),
(49, 3, 1, 'sdfsadfasdf', '', 0, '2020-02-07 16:44:07', '2020-02-07 16:44:07', '31158109384767', 1581093847),
(50, 94, 8, 'hi', NULL, NULL, '2020-02-29 14:08:24', '2020-02-29 14:08:24', '94', NULL),
(51, 3, 4, 'hi', '', 0, '2020-03-09 20:22:20', '2020-03-09 20:22:20', '34158378534072', 1583785340),
(52, 3, 1, 'hello', '', 0, '2020-03-24 13:28:45', '2020-03-24 13:28:45', '31158505652516', 1585056525),
(53, 3, 1, 'Ciao ', '', 0, '2020-03-25 21:02:51', '2020-03-25 21:02:51', '31158517017149', 1585170171),
(54, 3, 1, 'test', '', 0, '2020-03-29 18:56:04', '2020-03-29 18:56:04', '31158550816436', 1585508164),
(55, 3, 3, 'Hello, \r\nAre you available to do this task? \r\nWaiting to hear from you.\r\nThanks', NULL, NULL, '2020-03-31 06:16:53', '2020-03-31 06:16:53', '3-e67cd799656e', NULL),
(56, 3, 3, 'hey', '', 0, '2020-04-01 02:39:20', '2020-04-01 02:39:20', '33158570876031', 1585708760),
(57, 3, 4, 'who\'s this', '', 0, '2020-04-01 02:39:43', '2020-04-01 02:39:43', '34158570878374', 1585708783),
(58, 3, 3, 'who\'s this', '', 0, '2020-04-01 02:40:04', '2020-04-01 02:40:04', '33158570880489', 1585708804),
(59, 3, 3, 'hello..', '', 0, '2020-04-01 02:40:15', '2020-04-01 02:40:15', '33158570881538', 1585708815),
(60, 3, 4, 'n', 'f058e600_Captura de ecrã 2020-04-08, às 00.16.42.png', 0, '2020-04-08 02:26:59', '2020-04-08 02:26:59', '34158631281947', 1586312819),
(82, 3, 1, 'hi', '', 0, '2020-05-22 03:29:38', '2020-05-22 03:29:38', '31159011817853', 1590118178),
(62, 4, 4, 'hi', NULL, NULL, '2020-04-12 02:22:45', '2020-04-12 02:22:45', '4-593fe508d338', NULL),
(63, 4, 4, 'ok', '', 0, '2020-04-12 02:22:58', '2020-04-12 02:22:58', '44158665817848', 1586658178),
(64, 3, 1, 'hi', '', 0, '2020-04-26 11:12:24', '2020-04-26 11:12:24', '31158789954497', 1587899544),
(65, 3, 4, 'Test', '', 0, '2020-04-26 11:12:41', '2020-04-26 11:12:41', '34158789956197', 1587899561),
(66, 3, 4, 'hello', '0b38f58d_Ketchup.png', NULL, '2020-04-27 02:11:44', '2020-04-27 02:11:44', '3-9c2b8b596f83', NULL),
(67, 4, 3, 'how', '', 0, '2020-04-27 02:12:15', '2020-04-27 02:12:15', '43158795353528', 1587953535),
(68, 3, 4, 'merci', '', 0, '2020-04-27 02:12:44', '2020-04-27 02:12:44', '34158795356434', 1587953564),
(81, 3, 4, 'thanks', '', 0, '2020-05-21 17:37:22', '2020-05-21 17:37:22', '34159008264246', 1590082642),
(80, 3, 1, 'hi there', '', 0, '2020-05-17 22:11:45', '2020-05-17 22:11:45', '31158975350595', 1589753505),
(72, 4, 8, 'Hello', '', 0, '2020-05-04 07:54:00', '2020-05-04 07:54:00', '48158857884039', 1588578840),
(73, 3, 4, 'f', NULL, NULL, '2020-05-04 15:58:55', '2020-05-04 15:58:55', '3-5e1ebcb6f374', NULL),
(74, 3, 1, 'WASSUp', '', 0, '2020-05-04 15:59:12', '2020-05-04 15:59:12', '31158860795218', 1588607952),
(75, 3, 1, 'da', '', 0, '2020-05-04 15:59:15', '2020-05-04 15:59:15', '31158860795554', 1588607955),
(76, 119, 3, 'HELLO, I want to do for me a test work.', '20cd62f2_1zf.png', NULL, '2020-05-05 13:12:44', '2020-05-05 13:12:44', '119', NULL),
(77, 3, 119, 'yes...welcome', '', 0, '2020-05-05 13:14:37', '2020-05-05 13:14:37', '3119158868447788', 1588684477),
(78, 3, 119, 'please provide more details...', '', 0, '2020-05-05 13:15:47', '2020-05-05 13:15:47', '3119158868454782', 1588684547),
(79, 119, 3, 'testing custom offer', 'bd9480ca_F_ZF.jpg', 0, '2020-05-05 13:36:20', '2020-05-05 13:36:20', '1193158868578083', 1588685780),
(83, 3, 54, 'ok', '', 0, '2020-05-22 03:30:09', '2020-05-22 03:30:09', '354159011820937', 1590118209),
(84, 3, 4, 'kk', '', 0, '2020-05-25 15:09:39', '2020-05-25 15:09:39', '34159041937987', 1590419379),
(85, 4, 3, 'hi', '', 0, '2020-05-27 09:04:54', '2020-05-27 09:04:54', '43159057029411', 1590570294),
(86, 3, 1, 'hi', '', 0, '2020-06-07 11:25:52', '2020-06-07 11:25:52', '31159152915215', 1591529152),
(87, 3, 4, 'hi', '', 0, '2020-06-07 11:26:05', '2020-06-07 11:26:05', '34159152916548', 1591529165),
(88, 3, 4, 'hi', NULL, NULL, '2020-06-17 11:41:29', '2020-06-17 11:41:29', '3-f7726530198c', NULL),
(89, 3, 1, 'sadvasdv', '', 0, '2020-06-22 08:42:10', '2020-06-22 08:42:10', '31159281533057', 1592815330),
(90, 3, 1, 'sadvasdv', '', 0, '2020-06-22 08:42:31', '2020-06-22 08:42:31', '31159281535146', 1592815351),
(91, 3, 4, 'ghukyuk', '', 0, '2020-06-22 08:45:04', '2020-06-22 08:45:04', '34159281550462', 1592815504),
(92, 3, 4, 'hi', NULL, NULL, '2020-07-05 07:32:02', '2020-07-05 07:32:02', '3-ba2e4dd1ed72', NULL),
(93, 3, 1, 'Hi', '', 0, '2020-07-07 06:23:28', '2020-07-07 06:23:28', '31159410300888', 1594103008),
(94, 4, 3, 'Make payment to my account ASAP?', '', 0, '2020-07-09 20:18:36', '2020-07-09 20:18:36', '43159432591627', 1594325916),
(95, 3, 4, 'Hi', '', 0, '2020-07-18 22:20:28', '2020-07-18 22:20:28', '34159511082872', 1595110828);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_myorders`
--

CREATE TABLE `tbl_myorders` (
  `id` int(11) NOT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `buyer_id` bigint(20) NOT NULL,
  `amount` float(12,2) DEFAULT NULL,
  `total_amount` float(12,2) DEFAULT NULL,
  `revenue` float(12,2) DEFAULT NULL,
  `admin_amount` float(12,2) DEFAULT NULL,
  `admin_commission` float(12,2) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT NULL,
  `paypal_trn_id` varchar(50) DEFAULT NULL,
  `wallet_trn_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` int(5) NOT NULL,
  `is_seller_rate` int(2) DEFAULT '0',
  `is_buyer_rate` int(2) DEFAULT '0',
  `buyer_location` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_myorders`
--

INSERT INTO `tbl_myorders` (`id`, `course_id`, `buyer_id`, `amount`, `total_amount`, `revenue`, `admin_amount`, `admin_commission`, `quantity`, `pay_type`, `paypal_trn_id`, `wallet_trn_id`, `created_at`, `updated_at`, `slug`, `status`, `is_seller_rate`, `is_buyer_rate`, `buyer_location`) VALUES
(12, '4,3', 8, 90.00, 90.00, 90.00, 0.00, 0.00, 2, 'PayPal', '93C45408WM374803U', NULL, '2020-11-04 10:06:46', '2020-11-04 10:06:46', '1348c9479f96d92599694c2e7f62b5b9820d05fd', 1, 0, 0, ''),
(13, '6', 1, 20.00, 20.00, 20.00, 0.00, 0.00, 1, 'PayPal', '3TJ79649M6307481P', NULL, '2020-11-04 10:44:17', '2020-11-04 10:44:17', '417cfad3780e8a99b00e9844c861cc90b844981f', 1, 0, 0, ''),
(14, '5,4,3', 1, 140.00, 140.00, 140.00, 0.00, 0.00, 3, 'PayPal', '6U45959161072393P', NULL, '2020-11-06 06:18:09', '2020-11-06 06:18:09', 'b39e6a1582ce81bff9520ea3b08881a3b72734d9', 1, 0, 0, ''),
(15, '3', 14, 65.00, 65.00, 65.00, 0.00, 0.00, 1, 'PayPal', '5DV17763L7523274H', NULL, '2021-01-05 04:13:24', '2021-01-05 04:13:24', '6526c938e379dfac2eecb514b4a33bb2ca314f44', 1, 0, 0, ''),
(16, '6,4', 21, 45.00, 45.00, 45.00, 0.00, 0.00, 2, 'PayPal', '2CR31226U2350371Y', NULL, '2021-05-26 05:07:06', '2021-05-26 05:07:06', '52d68cc0b311453f14b93286422f02b01fd7ff69', 1, 0, 0, ''),
(17, '3,8', 21, 75.00, 75.00, 75.00, 0.00, 0.00, 2, 'PayPal', '37G55101H58168050', NULL, '2021-05-26 05:10:07', '2021-05-26 05:10:07', '34ceca47d1a50e02511c3cfcfeaa6797598dab92', 1, 0, 0, ''),
(18, '3,4', 29, 90.00, 90.00, 90.00, 0.00, 0.00, 2, NULL, '7UL669987N547282U', NULL, '2021-06-09 04:10:26', '2021-06-09 04:10:26', '94c11d7ddcd9075065a8bf913fa91f818e7d5137', 1, 0, 0, ''),
(19, '3,4', 29, 90.00, 90.00, 90.00, 0.00, 0.00, 2, NULL, '4F379583SX9179347', NULL, '2021-06-09 04:10:31', '2021-06-09 04:10:31', '6ce383298b01eb7960baf9d2348a48c4519e2c61', 1, 0, 0, ''),
(20, '3,4', 29, 90.00, 90.00, 90.00, 0.00, 0.00, 2, NULL, '17H895756T5630719', NULL, '2021-06-09 04:10:34', '2021-06-09 04:10:34', '6be50e3681414d920b36a454d4e011459a978f6d', 1, 0, 0, ''),
(21, '3,4', 29, 90.00, 90.00, 90.00, 0.00, 0.00, 2, NULL, '3ST220310U6789420', NULL, '2021-06-09 04:10:43', '2021-06-09 04:10:43', '20387ea1d5c72e805db0a41787b6ab196cc96f04', 1, 0, 0, ''),
(22, '3,4', 29, 90.00, 90.00, 90.00, 0.00, 0.00, 2, NULL, '58B69496AK009972W', NULL, '2021-06-09 04:10:45', '2021-06-09 04:10:45', '712e5a28d1ef33a84520bd8c53813196120340c3', 1, 0, 0, ''),
(23, '9,14,14', 1, 120.00, 120.00, 120.00, 0.00, 0.00, 3, NULL, '6V878846CS639904A', NULL, '2021-06-23 04:10:47', '2021-06-23 04:10:47', '705f5e9e3c0c086a4489e396d3aed9f86c67072a', 1, 0, 0, ''),
(24, '9,14,14', 1, 120.00, 120.00, 120.00, 0.00, 0.00, 3, NULL, '9ES893801K773740F', NULL, '2021-06-23 04:10:52', '2021-06-23 04:10:52', '28c23e09bb4f68cc7dbbd1edc853108469c2247d', 1, 0, 0, ''),
(25, '16', 1, 30.00, 30.00, 30.00, 0.00, 0.00, 1, NULL, '5FL01108T90794405', NULL, '2021-06-23 04:12:53', '2021-06-23 04:12:53', 'd66871ef14f8577224c673f8ac9e48cb43c85d96', 1, 0, 0, ''),
(26, '3,4,', 21, 22.00, 22.00, 22.00, 0.00, 0.00, 3, 'PayPal', '78965412325', NULL, '2021-07-20 12:12:27', '2021-07-20 12:12:27', '13766d39bc12278748ca76afbd6b262ff0f5738a', 1, 0, 0, 'Aurangabad'),
(27, '3,4,', 21, 22.00, 22.00, 22.00, 0.00, 0.00, 3, 'PayPal', '78965412325', NULL, '2021-07-20 12:13:11', '2021-07-20 12:13:11', '809304749496d2214a98303588872e0b6c109fab', 1, 0, 0, 'Aurangabad'),
(28, '7,14', 21, 70.00, 70.00, 70.00, 0.00, 0.00, 2, 'PayPal', 'bb18abe1-1369-0522-7a69-71be07c7a841', NULL, '2021-07-20 12:15:29', '2021-07-20 12:15:29', '9b0a2b91b97ef8a1327659184131dce3a941bfc8', 1, 0, 0, 'Karnataka,India'),
(29, '5', 21, 50.00, 50.00, 50.00, 0.00, 0.00, 1, 'PayPal', '71e6934c-65d9-040f-6ae1-3be808f77af1', NULL, '2021-07-20 12:26:20', '2021-07-20 12:26:20', 'd46da343696b16b5bd2bdc02e2f63ca50ff89e1d', 1, 0, 0, 'Karnataka,India'),
(30, '5', 21, 50.00, 50.00, 50.00, 0.00, 0.00, 1, 'PayPal', '71e6934c-65d9-040f-6ae1-3be808f77af1', NULL, '2021-07-20 12:27:34', '2021-07-20 12:27:34', '58112ba49d83879e7f2191b38fc84a921e6fddf8', 1, 0, 0, 'Karnataka,India'),
(31, '5', 21, 50.00, 50.00, 50.00, 0.00, 0.00, 1, 'PayPal', '71e6934c-65d9-040f-6ae1-3be808f77af1', NULL, '2021-07-20 12:38:45', '2021-07-20 12:38:45', 'b0ac68fac4c184df601f39f2e0c7ec0e033a6275', 1, 0, 0, 'Karnataka,India'),
(32, '5', 21, 50.00, 50.00, 50.00, 0.00, 0.00, 1, 'PayPal', '71e6934c-65d9-040f-6ae1-3be808f77af1', NULL, '2021-07-20 12:39:18', '2021-07-20 12:39:18', 'f5fb24d00aa2cf3b78c3dba7f65dd17e9880c2db', 1, 0, 0, 'Karnataka,India'),
(33, '3,4,', 21, 22.00, 22.00, 22.00, 0.00, 0.00, 3, 'PayPal', '78965412325', NULL, '2021-07-20 12:59:35', '2021-07-20 12:59:35', '1ac3e57e141358673ba8df58cf8b0d0a39a5e246', 1, 0, 0, 'Aurangabad'),
(34, '5', 21, 50.00, 50.00, 50.00, 0.00, 0.00, 1, 'PayPal', '7UW367353D370371L', NULL, '2021-07-20 13:08:45', '2021-07-20 13:08:45', '284d11bbdf4e638bea4c0e0811e28df3c0316f36', 1, 0, 0, ''),
(35, '8', 21, 10.00, 10.00, 10.00, 0.00, 0.00, 1, 'PayPal', '78524507-7639-0141-7460-12240f5d910b', NULL, '2021-08-02 12:53:35', '2021-08-02 12:53:35', '4b35fe285ac71c0d76f05633ce521712cd1a4d75', 1, 0, 0, 'California,United States'),
(38, '7', 21, 20.00, 20.00, 20.00, 0.00, 0.00, 1, 'PayPal', 'af90b99d-162b-0161-5e02-a6fa09a0dca1', NULL, '2021-08-10 09:23:03', '2021-08-10 09:23:03', '19bab94d79a9d62a6462e6994148a8858c007c20', 1, 0, 0, 'Karnataka,India'),
(39, '7', 21, 20.00, 20.00, 20.00, 0.00, 0.00, 1, 'PayPal', 'af90b99d-162b-0161-5e02-a6fa09a0dca1', NULL, '2021-08-10 09:25:38', '2021-08-10 09:25:38', 'ee8d012acc82953ecad7719aca74b140fb09bbbf', 1, 0, 0, 'Karnataka,India'),
(40, '7', 21, 20.00, 20.00, 20.00, 0.00, 0.00, 1, 'PayPal', 'af90b99d-162b-0161-5e02-a6fa09a0dca1', NULL, '2021-08-10 09:26:13', '2021-08-10 09:26:13', '446d2a0bd0a4b9302ea651a603e17765e6e8fd0f', 1, 0, 0, 'Karnataka,India'),
(41, '9', 21, 20.00, 20.00, 20.00, 0.00, 0.00, 1, 'PayPal', 'fd4d3c08-67bd-0726-7e6d-c8da81f18706', NULL, '2021-08-10 09:28:39', '2021-08-10 09:28:39', '5ed7959e279e1b424fcc153ebf93ac09919f22e9', 1, 0, 0, 'Karnataka,India'),
(42, '5', 16, 50.00, 50.00, 50.00, 0.00, 0.00, 1, 'PayPal', '4f49b966-1919-0f94-581b-6429aafcb0d8', NULL, '2021-08-12 07:28:32', '2021-08-12 07:28:32', '408c2a6a1f2813a89e0c2a69e91b51f2a6cf2491', 1, 0, 0, 'Maharashtra,India'),
(43, '3', 21, 65.00, 65.00, 65.00, 0.00, 0.00, 1, 'PayPal', 'tokencc_bh_jx2fd7_5x7qsk_zq39qr_sx4ndv_jqy', NULL, '2021-10-26 10:26:56', '2021-10-26 10:26:56', 'e51c2dee86203ddf0daf068db899639187fdc67e', 1, 0, 0, 'Uttar Pradesh,India'),
(44, '3', 21, 65.00, 65.00, 65.00, 0.00, 0.00, 1, 'PayPal', '5fe3735d-b616-0e41-6b04-3ec176fe382e', NULL, '2021-10-28 09:46:22', '2021-10-28 09:46:22', '27c89b70c2eabf3032547bf0126609f684dbdad8', 1, 0, 0, 'Uttar Pradesh,India'),
(45, '3', 13, 65.00, 65.00, 65.00, 0.00, 0.00, 1, NULL, '4NJ36245FU1879800', NULL, '2021-11-29 21:46:53', '2021-11-29 21:46:53', 'c816a0ee81f4d79d552add9a7ec9dd6198cfaa62', 1, 0, 0, ''),
(46, '3', 13, 65.00, 65.00, 65.00, 0.00, 0.00, 1, NULL, '2KS576609P235003P', NULL, '2021-11-29 21:46:54', '2021-11-29 21:46:54', 'f3203ae418bc6e83cb3aca50de175d3f7e8b729b', 1, 0, 0, ''),
(47, '3', 13, 65.00, 65.00, 65.00, 0.00, 0.00, 1, NULL, '08516581Y6586092H', NULL, '2021-11-29 21:47:03', '2021-11-29 21:47:03', 'd1fe2698738cdcb376b2da83b6d78927fa29581e', 1, 0, 0, ''),
(48, '3', 13, 65.00, 65.00, 65.00, 0.00, 0.00, 1, NULL, '93L55612KG8665211', NULL, '2021-11-29 21:47:03', '2021-11-29 21:47:03', 'ca86d5aed5790ab826a6575ab4806928980ba52d', 1, 0, 0, ''),
(49, '3', 13, 65.00, 65.00, 65.00, 0.00, 0.00, 1, NULL, '12M95184XF885714Y', NULL, '2021-11-29 21:47:04', '2021-11-29 21:47:04', '8bd3de2e2a126630484c847bc789a0afa4921217', 1, 0, 0, ''),
(50, '3', 21, 65.00, 65.00, 65.00, 0.00, 0.00, 1, 'PayPal', '40cb5da5-ff07-071c-7b5b-422093595e09', NULL, '2022-01-12 08:57:31', '2022-01-12 08:57:31', '6957917336b50592d5e45e0d13e0c671c9120a50', 1, 0, 0, 'Maharashtra,India'),
(51, '3', 21, 65.00, 65.00, 65.00, 0.00, 0.00, 1, 'PayPal', '74f1cb0b-e93c-0be4-6633-529de7d15c7d', NULL, '2022-01-28 06:24:25', '2022-01-28 06:24:25', 'df7e7d4eeeccb77500b359e895ef0ead5f14da3e', 1, 0, 0, 'Karnataka,India'),
(52, 'course_id', 21, 0.00, 0.00, 0.00, 0.00, 0.00, 1, 'Card', 'a651eee8-1c9e-072c-6144-0f633874d6f1', NULL, '2022-01-31 09:16:49', '2022-01-31 09:16:49', '35d02a5dcdc80d198857328558ea300065baf755', 1, 0, 0, 'Abu Dhabi'),
(53, 'course_id', 21, 0.00, 0.00, 0.00, 0.00, 0.00, 1, 'Card', 'a651eee8-1c9e-072c-6144-0f633874d6f1', NULL, '2022-01-31 09:19:37', '2022-01-31 09:19:37', '7a7db27fb9068a90591f86d1dc77107d9a053ffa', 1, 0, 0, 'Abu Dhabi'),
(54, 'course_id', 21, 0.00, 0.00, 0.00, 0.00, 0.00, 1, 'Card', 'a651eee8-1c9e-072c-6144-0f633874d6f1', NULL, '2022-03-24 12:12:22', '2022-03-24 12:12:22', '58903fd48a352612476d1f598781259eb3d23dea', 1, 0, 0, 'Abu Dhabi'),
(55, '5', 29, 50.00, 50.00, 50.00, 0.00, 0.00, 1, 'PayPal', '06F11889FU080160G', NULL, '2022-04-22 20:18:25', '2022-04-22 20:18:25', 'b72143b0570be19930ff247a5c85c83e89a23bb3', 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` bigint(20) NOT NULL,
  `from_name` varchar(60) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`id`, `from_name`, `user_id`, `message`, `url`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Madan Saini', 1, 'User purchased a course testing', 'selling-orders', 1, '2020-10-30 11:16:32', '2020-11-05 11:29:21', '73aec06b9f160405659264'),
(2, 'Admin', 1, 'Your payment completed successfully for your order.', 'purchase-history', 1, '2020-10-30 11:16:32', '2020-11-06 07:33:50', '03a4883059160405659256'),
(3, 'Madan Saini', 1, 'User purchased a course test test', 'selling-orders', 1, '2020-10-30 11:25:47', '2020-11-05 11:29:21', '80601e0ad4160405714736'),
(4, 'Madan Saini', 1, 'User purchased a course testing', 'selling-orders', 1, '2020-10-30 11:25:47', '2020-11-05 11:29:21', '2c39268e85160405714760'),
(5, 'Admin', 1, 'Your payment completed successfully for your order.', 'purchase-history', 1, '2020-10-30 11:25:47', '2020-11-06 07:33:50', '89bc2e2cba160405714710'),
(6, 'Programmer Logicspice', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 1, '2020-11-04 10:06:46', '2020-11-05 11:29:21', '3dd6461b87160448440627'),
(7, 'Programmer Logicspice', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 1, '2020-11-04 10:06:46', '2020-11-05 11:29:21', 'd47c6de9c8160448440653'),
(8, 'Admin', 8, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2020-11-04 10:06:46', '2020-11-04 10:06:46', '8211f0f72a160448440625'),
(9, 'Madan Saini', 1, 'User purchased a course Python by an Expert', 'selling-orders', 1, '2020-11-04 10:44:17', '2020-11-05 11:29:21', '0c85cc343b160448665797'),
(10, 'Admin', 1, 'Your payment completed successfully for your order.', 'purchase-history', 1, '2020-11-04 10:44:17', '2020-11-06 07:33:50', 'f7601900e7160448665737'),
(11, 'Madan Saini', 1, 'User purchased a course Build Responsive Real World Websites with HTML5 and CSS3', 'selling-orders', 0, '2020-11-06 06:18:09', '2020-11-06 06:18:09', '94f435b688160464348939'),
(12, 'Madan Saini', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 0, '2020-11-06 06:18:09', '2020-11-06 06:18:09', 'cfe9517041160464348964'),
(13, 'Madan Saini', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2020-11-06 06:18:09', '2020-11-06 06:18:09', 'd589c3a9b5160464348997'),
(14, 'Admin', 1, 'Your payment completed successfully for your order.', 'purchase-history', 1, '2020-11-06 06:18:09', '2020-11-06 07:33:50', '9b0e35cd37160464348936'),
(15, 'Walt Ond', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-01-05 04:13:25', '2021-01-05 04:13:25', '794cc4f187160982000575'),
(16, 'Admin', 14, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-01-05 04:13:26', '2021-01-05 04:13:26', 'abaa8585a2160982000677'),
(17, 'William Henr', 1, 'User purchased a course Python by an Expert', 'selling-orders', 0, '2021-05-26 05:07:06', '2021-05-26 05:07:06', '114c6aef78162200562633'),
(18, 'William Henr', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 0, '2021-05-26 05:07:06', '2021-05-26 05:07:06', 'd29fffd133162200562680'),
(19, 'Admin', 21, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-05-26 05:07:06', '2021-05-26 05:07:06', '2ee7fc703b162200562651'),
(20, 'William Henr', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-05-26 05:10:07', '2021-05-26 05:10:07', '08d10139ed162200580717'),
(21, 'William Henr', 1, 'User purchased a course Software Development', 'selling-orders', 0, '2021-05-26 05:10:07', '2021-05-26 05:10:07', '27385cb7a6162200580745'),
(22, 'Admin', 21, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-05-26 05:10:08', '2021-05-26 05:10:08', 'ff5f52cfd1162200580880'),
(23, 'Juliya Sec', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-06-09 04:10:29', '2021-06-09 04:10:29', 'e907c25231162321182998'),
(24, 'Juliya Sec', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 0, '2021-06-09 04:10:30', '2021-06-09 04:10:30', 'c9b22172e0162321183059'),
(25, 'Juliya Sec', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-06-09 04:10:33', '2021-06-09 04:10:33', '3ab51b317f162321183373'),
(26, 'Admin', 29, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-09 04:10:34', '2021-06-09 04:10:34', 'b838687305162321183475'),
(27, 'Juliya Sec', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 0, '2021-06-09 04:10:34', '2021-06-09 04:10:34', '70c6b3c8c4162321183469'),
(28, 'Juliya Sec', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-06-09 04:10:36', '2021-06-09 04:10:36', 'e046dd90c5162321183692'),
(29, 'Admin', 29, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-09 04:10:37', '2021-06-09 04:10:37', '818a30a25c162321183781'),
(30, 'Juliya Sec', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 0, '2021-06-09 04:10:38', '2021-06-09 04:10:38', '58dbb1b1e4162321183858'),
(31, 'Admin', 29, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-09 04:10:41', '2021-06-09 04:10:41', 'c94bda443d162321184182'),
(32, 'Juliya Sec', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-06-09 04:10:46', '2021-06-09 04:10:46', '484b564b71162321184615'),
(33, 'Juliya Sec', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-06-09 04:10:47', '2021-06-09 04:10:47', '688f4211ad162321184772'),
(34, 'Juliya Sec', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 0, '2021-06-09 04:10:47', '2021-06-09 04:10:47', 'ada24bddea162321184738'),
(35, 'Juliya Sec', 1, 'User purchased a course JavaScript - The Complete Guide 2020 (Beginner + Advanced)', 'selling-orders', 0, '2021-06-09 04:10:48', '2021-06-09 04:10:48', 'b9c8c220fd162321184879'),
(36, 'Admin', 29, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-09 04:10:50', '2021-06-09 04:10:50', 'bd96bd4bea162321185015'),
(37, 'Admin', 29, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-09 04:10:51', '2021-06-09 04:10:51', '20a263c48c162321185176'),
(38, 'James Smith', 14, 'User purchased a course Social Media Management', 'selling-orders', 1, '2021-06-23 04:10:47', '2022-03-07 15:09:10', '69cb7af65c162442144762'),
(39, 'James Smith', 14, 'User purchased a course UI/UX Design', 'selling-orders', 1, '2021-06-23 04:10:48', '2022-03-07 15:09:10', 'be6ebff862162442144841'),
(40, 'James Smith', 14, 'User purchased a course UI/UX Design', 'selling-orders', 1, '2021-06-23 04:10:48', '2022-03-07 15:09:10', 'c294ee9a2f162442144879'),
(41, 'Admin', 1, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-23 04:10:48', '2021-06-23 04:10:48', 'ea2a043b19162442144871'),
(42, 'James Smith', 14, 'User purchased a course Social Media Management', 'selling-orders', 1, '2021-06-23 04:10:52', '2022-03-07 15:09:10', '6912df2f83162442145252'),
(43, 'James Smith', 14, 'User purchased a course UI/UX Design', 'selling-orders', 1, '2021-06-23 04:10:52', '2022-03-07 15:09:10', 'a53c33dd88162442145228'),
(44, 'James Smith', 14, 'User purchased a course UI/UX Design', 'selling-orders', 1, '2021-06-23 04:10:52', '2022-03-07 15:09:10', '670f6462d7162442145296'),
(45, 'Admin', 1, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-23 04:10:52', '2021-06-23 04:10:52', '11633c405c162442145290'),
(46, 'James Smith', 13, 'User purchased a course basic programming with python', 'selling-orders', 0, '2021-06-23 04:12:54', '2021-06-23 04:12:54', '099d511796162442157417'),
(47, 'Admin', 1, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-06-23 04:12:54', '2021-06-23 04:12:54', 'fff4f21e9b162442157481'),
(48, 'William Henr', 1, 'User purchased a course Build Responsive Real World Websites with HTML5 and CSS3', 'selling-orders', 0, '2021-07-20 13:08:45', '2021-07-20 13:08:45', '10aacbe00b162678652591'),
(49, 'Admin', 21, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-07-20 13:08:45', '2021-07-20 13:08:45', '46f19fa2bf162678652515'),
(50, 'Mark 2021 Wafo', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-11-29 21:46:53', '2021-11-29 21:46:53', '094d13312f163822241358'),
(51, 'Admin', 13, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-11-29 21:46:53', '2021-11-29 21:46:53', '6256b8ef10163822241311'),
(52, 'Mark 2021 Wafo', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-11-29 21:46:54', '2021-11-29 21:46:54', '6b6d1e0d49163822241447'),
(53, 'Admin', 13, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-11-29 21:46:55', '2021-11-29 21:46:55', '3be77b1428163822241594'),
(54, 'Mark 2021 Wafo', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-11-29 21:47:03', '2021-11-29 21:47:03', '1f7ad9bb92163822242344'),
(55, 'Admin', 13, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-11-29 21:47:03', '2021-11-29 21:47:03', 'b1d3794010163822242356'),
(56, 'Mark 2021 Wafo', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-11-29 21:47:04', '2021-11-29 21:47:04', '3ae651c86b163822242471'),
(57, 'Admin', 13, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-11-29 21:47:04', '2021-11-29 21:47:04', '4e5e84c345163822242433'),
(58, 'Mark 2021 Wafo', 1, 'User purchased a course React - The Complete Guide (incl Hooks, React Router, Redux)', 'selling-orders', 0, '2021-11-29 21:47:04', '2021-11-29 21:47:04', '12e02c39f9163822242447'),
(59, 'Admin', 13, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2021-11-29 21:47:04', '2021-11-29 21:47:04', '0b033aaf99163822242415'),
(60, 'Juliya Sec', 1, 'User purchased a course Build Responsive Real World Websites with HTML5 and CSS3', 'selling-orders', 0, '2022-04-22 20:18:25', '2022-04-22 20:18:25', 'f86e7484af165063350525'),
(61, 'Admin', 29, 'Your payment completed successfully for your order.', 'purchase-history', 0, '2022-04-22 20:18:25', '2022-04-22 20:18:25', 'bcc60ce5d1165063350565');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderitems`
--

CREATE TABLE `tbl_orderitems` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `amount` float(12,2) DEFAULT NULL,
  `total_amount` float(12,2) DEFAULT NULL,
  `revenue` float(12,2) DEFAULT NULL,
  `admin_amount` float(12,2) DEFAULT NULL,
  `admin_commission` float(12,2) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT NULL,
  `paypal_trn_id` varchar(50) DEFAULT NULL,
  `wallet_trn_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` int(5) NOT NULL,
  `is_seller_rate` int(2) DEFAULT '0',
  `is_buyer_rate` int(2) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderitems`
--

INSERT INTO `tbl_orderitems` (`id`, `course_id`, `order_id`, `buyer_id`, `seller_id`, `amount`, `total_amount`, `revenue`, `admin_amount`, `admin_commission`, `quantity`, `pay_type`, `paypal_trn_id`, `wallet_trn_id`, `created_at`, `updated_at`, `slug`, `status`, `is_seller_rate`, `is_buyer_rate`) VALUES
(19, 3, 14, 1, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, 'PayPal', '6U45959161072393P', NULL, '2020-11-06 06:18:09', '2020-11-06 06:18:09', '4da3ab0ca9a91d48196e63fe0b5fe7f9780f59f4', 1, 0, 0),
(18, 4, 14, 1, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, 'PayPal', '6U45959161072393P', NULL, '2020-11-06 06:18:09', '2020-11-06 06:18:09', '4022bd5fb52a54e46f4ec24cdd27232b3b872052', 1, 0, 0),
(14, 4, 12, 8, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, 'PayPal', '93C45408WM374803U', NULL, '2020-11-04 10:06:46', '2020-11-04 10:06:46', 'e07d76196e906154297ec5bd9fc7cdbad711a673', 1, 0, 0),
(17, 5, 14, 1, 1, 50.00, 250.00, 50.00, 0.00, 0.00, 1, 'PayPal', '6U45959161072393P', NULL, '2020-11-06 06:18:09', '2020-11-06 06:18:09', 'aeb6a2ffdad320097b4d4c55ffa270c059d59aa4', 1, 0, 0),
(16, 6, 13, 1, 1, 20.00, 220.00, 20.00, 0.00, 0.00, 1, 'PayPal', '3TJ79649M6307481P', NULL, '2020-11-04 10:44:17', '2020-11-04 10:44:17', '11a362a53b66fba2eecafaf2c7ed71cb742e254e', 1, 0, 0),
(20, 3, 15, 14, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, 'PayPal', '5DV17763L7523274H', NULL, '2021-01-05 04:13:24', '2021-01-05 04:13:24', 'f632df6fabb77a007907b66f08ffb2fe8c25f971', 1, 0, 0),
(21, 6, 16, 21, 1, 20.00, 220.00, 20.00, 0.00, 0.00, 1, 'PayPal', '2CR31226U2350371Y', NULL, '2021-05-26 05:07:06', '2021-05-26 05:07:06', '24e50fc1f235a4817a141b4cc9e672869bec71f6', 1, 0, 0),
(22, 4, 16, 21, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, 'PayPal', '2CR31226U2350371Y', NULL, '2021-05-26 05:07:06', '2021-05-26 05:07:06', 'd7f6fffbd7bf5ce7474898e0a7d9f6851e402dd7', 1, 0, 0),
(23, 3, 17, 21, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, 'PayPal', '37G55101H58168050', NULL, '2021-05-26 05:10:07', '2021-05-26 05:10:07', 'c64ce8f84bf3937e07acfc70be8972f10a17bca2', 1, 0, 0),
(24, 8, 17, 21, 1, 10.00, 210.00, 10.00, 0.00, 0.00, 1, 'PayPal', '37G55101H58168050', NULL, '2021-05-26 05:10:07', '2021-05-26 05:10:07', '7dcf5a6ea4bdbc06b425397c18e21ece614a67c1', 1, 0, 0),
(25, 3, 18, 29, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '7UL669987N547282U', NULL, '2021-06-09 04:10:26', '2021-06-09 04:10:26', '397611b3bf8830061c4954dc13d9a5c3dbf0cf1c', 1, 0, 0),
(26, 4, 18, 29, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, NULL, '7UL669987N547282U', NULL, '2021-06-09 04:10:29', '2021-06-09 04:10:29', 'b1018c36a426eccb9a2793b186c130b8413171f2', 1, 0, 0),
(27, 3, 19, 29, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '4F379583SX9179347', NULL, '2021-06-09 04:10:31', '2021-06-09 04:10:31', '86afe6cda8fa3aec65d7b083cb68304c907a8814', 1, 0, 0),
(28, 4, 19, 29, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, NULL, '4F379583SX9179347', NULL, '2021-06-09 04:10:33', '2021-06-09 04:10:33', '54cd7791d8cfc3cdd66781ff90d4bfe46ba4c121', 1, 0, 0),
(29, 3, 20, 29, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '17H895756T5630719', NULL, '2021-06-09 04:10:34', '2021-06-09 04:10:34', '4f24920caf9724f9ece76037b351902fffdba1e3', 1, 0, 0),
(30, 4, 20, 29, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, NULL, '17H895756T5630719', NULL, '2021-06-09 04:10:36', '2021-06-09 04:10:36', '8cd2722654e022d91689745a8e8d0bca28e219c8', 1, 0, 0),
(31, 3, 21, 29, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '3ST220310U6789420', NULL, '2021-06-09 04:10:43', '2021-06-09 04:10:43', '2c035e6918cdc63e4ba4f08338a0424740648f4f', 1, 0, 0),
(32, 3, 22, 29, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '58B69496AK009972W', NULL, '2021-06-09 04:10:45', '2021-06-09 04:10:45', '228209c9daeadc88c0bb8887245f8b0e586c70a5', 1, 0, 0),
(33, 4, 21, 29, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, NULL, '3ST220310U6789420', NULL, '2021-06-09 04:10:46', '2021-06-09 04:10:46', '568afd2db1980a303ab26769774d8d613626e0bb', 1, 0, 0),
(34, 4, 22, 29, 1, 25.00, 225.00, 25.00, 0.00, 0.00, 1, NULL, '58B69496AK009972W', NULL, '2021-06-09 04:10:47', '2021-06-09 04:10:47', '6dafb40eee86b2e5c2ffbe709c3b27c6189f18a8', 1, 0, 0),
(35, 9, 23, 1, 14, 20.00, 220.00, 20.00, 0.00, 0.00, 1, NULL, '6V878846CS639904A', NULL, '2021-06-23 04:10:47', '2021-06-23 04:10:47', '52c0d7f2de02df8dec27fbfe6cc24849678d38d8', 1, 0, 0),
(36, 14, 23, 1, 14, 50.00, 250.00, 50.00, 0.00, 0.00, 1, NULL, '6V878846CS639904A', NULL, '2021-06-23 04:10:47', '2021-06-23 04:10:47', '5a6b68f311c086d16b6bdb17fa261beeddd1ecf0', 1, 0, 0),
(37, 14, 23, 1, 14, 50.00, 250.00, 50.00, 0.00, 0.00, 1, NULL, '6V878846CS639904A', NULL, '2021-06-23 04:10:48', '2021-06-23 04:10:48', '7f4699e706242b0879a46821c09f1733ad51330a', 1, 0, 0),
(38, 9, 24, 1, 14, 20.00, 220.00, 20.00, 0.00, 0.00, 1, NULL, '9ES893801K773740F', NULL, '2021-06-23 04:10:52', '2021-06-23 04:10:52', '5a840df7564c0a5c49b92468bb05a7edc6184afa', 1, 0, 0),
(39, 14, 24, 1, 14, 50.00, 250.00, 50.00, 0.00, 0.00, 1, NULL, '9ES893801K773740F', NULL, '2021-06-23 04:10:52', '2021-06-23 04:10:52', '543ee5bc4b9688373e4a20b75e532174c93873a8', 1, 0, 0),
(40, 14, 24, 1, 14, 50.00, 250.00, 50.00, 0.00, 0.00, 1, NULL, '9ES893801K773740F', NULL, '2021-06-23 04:10:52', '2021-06-23 04:10:52', '762ba340e5109fa386704d08d90cd4dcc5c2e024', 1, 0, 0),
(41, 16, 25, 1, 13, 30.00, 230.00, 30.00, 0.00, 0.00, 1, NULL, '5FL01108T90794405', NULL, '2021-06-23 04:12:53', '2021-06-23 04:12:53', 'a39a6af4e8d692c856acbd759fa3ca3626919f2b', 1, 0, 0),
(42, 5, 34, 21, 1, 50.00, 250.00, 50.00, 0.00, 0.00, 1, 'PayPal', '7UW367353D370371L', NULL, '2021-07-20 13:08:45', '2021-07-20 13:08:45', '1cfe473d938f5f2afeabe0042915d09467576a2b', 1, 0, 0),
(43, 7, 40, 21, 0, 20.00, 220.00, 20.00, 0.00, 0.00, 1, 'PayPal', '3d2477072da10cc9ec71', NULL, '2021-08-10 09:26:13', '2021-08-10 09:26:13', '42e432a18581ba7063125ec60d9683716759b2cc', 1, 0, 0),
(44, 9, 41, 21, 0, 20.00, 220.00, 20.00, 0.00, 0.00, 1, 'PayPal', '90f0fcbedca1f6a3dd92', NULL, '2021-08-10 09:28:39', '2021-08-10 09:28:39', 'fcf43330c0019556fa00be15e69c8a1f41804a7b', 1, 0, 0),
(45, 5, 42, 16, 0, 50.00, 250.00, 50.00, 0.00, 0.00, 1, 'PayPal', '5a32e81747189e09bccb', NULL, '2021-08-12 07:28:32', '2021-08-12 07:28:32', '09c49c1299307ab648e89f785b27aa15e56357be', 1, 0, 0),
(46, 3, 43, 21, 0, 65.00, 265.00, 65.00, 0.00, 0.00, 1, 'PayPal', 'ec98324d22cb5361223d', NULL, '2021-10-26 10:26:56', '2021-10-26 10:26:56', '689673356afc137319f49d51c2c15f2ab61a542d', 1, 0, 0),
(47, 3, 44, 21, 0, 65.00, 265.00, 65.00, 0.00, 0.00, 1, 'PayPal', '0aa2590bb9b278764516', NULL, '2021-10-28 09:46:22', '2021-10-28 09:46:22', '25c220d0eeb3467b3badbc5f49a2b369cbd37f5e', 1, 0, 0),
(48, 3, 45, 13, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '4NJ36245FU1879800', NULL, '2021-11-29 21:46:53', '2021-11-29 21:46:53', '5a049c216f045a6ef5949d08c890a0de190cc870', 1, 0, 0),
(49, 3, 46, 13, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '2KS576609P235003P', NULL, '2021-11-29 21:46:54', '2021-11-29 21:46:54', 'e3464008a25826290a5c4eb3ce4092f855e03988', 1, 0, 0),
(50, 3, 47, 13, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '08516581Y6586092H', NULL, '2021-11-29 21:47:03', '2021-11-29 21:47:03', '624b4701bb53dbcdfe8c093002da07355c2a0905', 1, 0, 0),
(51, 3, 48, 13, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '93L55612KG8665211', NULL, '2021-11-29 21:47:03', '2021-11-29 21:47:03', '0150d50403479d423efcede46467e2eef177dc75', 1, 0, 0),
(52, 3, 49, 13, 1, 65.00, 265.00, 65.00, 0.00, 0.00, 1, NULL, '12M95184XF885714Y', NULL, '2021-11-29 21:47:04', '2021-11-29 21:47:04', 'f5b14544004885b722d19e2625ef055d52bb9999', 1, 0, 0),
(53, 3, 50, 21, 0, 65.00, 265.00, 65.00, 0.00, 0.00, 1, 'PayPal', '1d2944d914dca6d3603d', NULL, '2022-01-12 08:57:31', '2022-01-12 08:57:31', '67f3ca7bd04703d70a7bdc1323cfc30be819bcba', 1, 0, 0),
(54, 3, 51, 21, 0, 65.00, 265.00, 65.00, 0.00, 0.00, 1, 'PayPal', 'ecf904f242ee03bb5cde', NULL, '2022-01-28 06:24:25', '2022-01-28 06:24:25', 'a602f69b2680d731bd18c1d0cb871b3992f049c1', 1, 0, 0),
(55, 0, 53, 21, 0, 0.00, 200.00, 0.00, 0.00, 0.00, 1, 'PayPal', '2ed5db173b2c1f17d872', NULL, '2022-01-31 09:19:37', '2022-01-31 09:19:37', '417a3c233236a5bb7b825adb2514868419b441a7', 1, 0, 0),
(56, 0, 54, 21, 0, 0.00, 200.00, 0.00, 0.00, 0.00, 1, 'PayPal', '8079015e505fab62812e', NULL, '2022-03-24 12:12:22', '2022-03-24 12:12:22', '342f18ac79fbe3af8c36c926aee78ae640261bbe', 1, 0, 0),
(57, 5, 55, 29, 1, 50.00, 250.00, 50.00, 0.00, 0.00, 1, 'PayPal', '06F11889FU080160G', NULL, '2022-04-22 20:18:25', '2022-04-22 20:18:25', '570b4c0a12a7beb70a186eed3dcdc391f55717fa', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `slug` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `title`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', '<p>These Website Terms of Use (&ldquo;Terms of Use&rdquo;) are applicable to the websites of Egreea and all affiliates and subsidiaries. In addition to the Websites, these Terms of Use are also applicable to all tools, documents, applications (including mobile applications), and other services, including the services offered under. Please read this document carefully as it is a legally binding agreement between you and your heirs and representatives (collectively, &ldquo;you&rdquo; or &ldquo;your&rdquo;), and Egreea (together with any Egreea affiliates and subsidiaries, &ldquo;we,&rdquo; &ldquo;our,&rdquo; or &ldquo;us,&rdquo; or the &ldquo;Company&rdquo;).</p>\r\n\r\n<p><strong>1. ACCEPTING THESE TERMS OF USE AND CHANGES TO THESE TERMS OF USE</strong><br />\r\nBy accessing or using the Services, you are agreeing to these Terms of Use and entering into a legally binding agreement with us. If you do not agree to these Terms of Use, including the binding arbitration clause and class action waiver contained in Section 14 below, you may not use the Services or create an account (&ldquo;Egreea Account&rdquo;).</p>\r\n\r\n<p>As our business grows and improves, we may from time to time change these Terms of Use and will post a revised copy on this page. We encourage you to check regularly for any updates. If we make any material changes to these Terms of Use, we will notify you via email or on the Services as appropriate. Otherwise, your continued use of the Services following such changes will constitute your acceptance of the new Terms of Use.</p>\r\n\r\n<p><strong>2. ELIGIBILITY AND REGISTRATION</strong><br />\r\nYou must be at least 18 years old or, if in your jurisdiction the age of majority is above 18 years old, you must be above the age of majority in your jurisdiction, to use the Services. If you may choose to create a Egreea Account, you must provide certain information, including a valid email address and a password and a photo identification. If you want to participate in any marketing or transaction event through the Services, you will have to register with us. You agree to only provide information that is accurate and truthful, and to keep it accurate and updated. It is your responsibility to maintain the confidentiality and security of your account information, and to notify us immediately if you learn of any unauthorized use of your account or information. You may not share your password with unaffiliated third parties. You are fully responsible for all uses of your password, Egreea Account and username, or registration, whether by you or others. We are authorized to act on instructions received through use of your Ten-X Account or registration, and are not liable for any loss or damage arising from your failure to comply with this Section. Your registration and Community participation are subject to our review and approval and we reserve the right not to approve, or withdraw our approval of, your registration or Community participation for any reason or no reason.</p>\r\n\r\n<p>By providing your information, you consent to us contacting you about your interest in us or the Services by email, phone, or through any other contact information you have chosen to provide. You may opt out of marketing by following the instructions in our Privacy Statement.</p>\r\n\r\n<p><strong>3. INTELLECTUAL PROPERTY</strong><br />\r\nAll parts of the Services, including the selection, compilation, arrangement, and presentation of all materials and the Websites, tools, documents and applications, are copyrighted by us or our licensors and content suppliers, and are protected by Australian and international laws. You agree to abide by all applicable copyright laws, as well as copyright notices or restrictions posted on the Services, and you acknowledge that use of any content of the Services without our express prior written permission is strictly prohibited.</p>\r\n\r\n<p>You may not use any of our trademarks, trade names, service marks, copyrights, or logos in any manner which creates the impression that such items belong to or are associated with you, unless you have our written consent, and you acknowledge that you have no ownership rights in or to any of such items.</p>\r\n\r\n<p>You may not frame the Websites. You may link to the Websites, provided that you acknowledge and agree that you will not link the Websites to any website containing any inappropriate, profane, defamatory, infringing, obscene, indecent, or unlawful topic, name, material, or information or that violates any intellectual property, proprietary, privacy, or publicity rights.</p>\r\n\r\n<p><strong>4. YOUR LICENSE TO USE THE SERVICES</strong><br />\r\nThe Services are owned exclusively by us. However, we grant you a limited, non-exclusive, non-transferable license to access and use the Services only as expressly permitted in these Terms of Use. You will not use, copy, adapt, modify, prepare derivative works based upon, distribute, license, sell, transfer, publicly display, publicly perform, transmit, broadcast or otherwise exploit the Services, except as expressly permitted in these Terms of Use. Any violation by you of these license provisions may result in the immediate termination of your right to use the Services. We reserve all right, title and interest not expressly granted under this license to the fullest extent possible under applicable laws.</p>\r\n\r\n<p><strong>5. SERVICE RULES</strong><br />\r\nThere are a number of rules you must follow to use the Services. You agree not to use the Services in any way that:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Violates these Terms of Use;</p>\r\n	</li>\r\n	<li>\r\n	<p>Allows you to scrape, monitor, or copy any part of the Services in an automated way, using any robot, scraper, or other method of access other than manually accessing the publicly-available portions of the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Violates the restrictions in any robot exclusion headers of the Services, or bypasses or circumvents other measures to prevent or limit access to the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Creates any derivative works from the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Competes with our business or impacts our revenue;</p>\r\n	</li>\r\n	<li>\r\n	<p>Impairs our computer systems or transmits software viruses, worms, or other harmful files;</p>\r\n	</li>\r\n	<li>\r\n	<p>Interferes with any other party&rsquo;s use and enjoyment of the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Attempts to gain unauthorized access to the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Uses any part of the Services in unsolicited mailings or spam material;</p>\r\n	</li>\r\n	<li>\r\n	<p>Violates any third party&rsquo;s rights, including copyright, trademark, privacy rights, or any other intellectual property or proprietary rights;</p>\r\n	</li>\r\n	<li>\r\n	<p>Threatens, stalks, harms, or harasses others, misleads or deceives others, promotes bigotry or discrimination, defames others, or is otherwise objectionable; solicits personal information, promotes illegal substances, or submits or transmits pornography; or</p>\r\n	</li>\r\n	<li>\r\n	<p>Violates any laws.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>6. YOUR CONTENT AND SUBMISSIONS</strong><br />\r\nYou are solely responsible for all content that you post, publish, transmit, upload, distribute or otherwise make available or submit to or through the Services, including without limitation to or through the Community (collectively, &ldquo;Submissions&rdquo;). Your Submissions may be identified by your actual name and/or your username, and may be linked to your Egreea Account and Community profile. You acknowledge that once published, you cannot withdraw such Submissions. Unless we indicate otherwise, you grant us, our subsidiaries, and affiliates a nonexclusive, transferrable, royalty-free, perpetual, irrevocable, and fully sub licensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, copy, and display any Submissions throughout the world in any form.</p>\r\n\r\n<p>You represent and warrant that you own or otherwise control all of the rights to your Submissions and that your Submissions will not violate these Terms of Use or cause injury to any other person or entity. We take no responsibility and assume no liability for any material, content, opinion, recommendation, or advice provided by you in your Submissions or by any third party. We have no obligation to post any of your Submissions, and reserve the right to post our own versions of that content (including, but not limited to, photos of properties or property descriptions) instead of yours in our sole discretion.</p>\r\n\r\n<p>You assign us the right to pursue enforcement of copyright and other intellectual property claims against third parties that have, without authorization, and in violation of these Terms of Use, scraped, copied, or distributed content from your Submissions and for which you have not granted such third parties a separate license to use.</p>\r\n\r\n<p>Please review our Privacy Statement prior to making any Submissions. If you do not agree with our Privacy Statement, you may not make any Submissions.</p>\r\n\r\n<p>In addition to complying with the rules specified in these Terms of Use, you agree to comply with the following rules when participating in the Community and/or making any Submissions. This list is not meant to be exhaustive, and we reserve the right to determine what types of conduct we consider to be inappropriate use of the Services. In the case of inappropriate use, we may take such measures as we determine appropriate, in our sole discretion. By way of example, and not as limitation, you agree to abide by the following rules when participating in the Community and/or making any Submissions:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>You will remain polite and civil to other users, even if you disagree with content that you come across through your use of the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not be off topic or contain promotions of or solicitations for other products, services or fundraising activities;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not infringe or violate our rights or the rights of a third party;</p>\r\n	</li>\r\n	<li>\r\n	<p>You will not impersonate anyone else, misrepresent your identity or affiliation, or make Submissions from fake or anonymous profiles;</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that we are not liable for Submissions made by you or others;</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that we have the right to remove or edit any content and any Submissions in our sole discretion;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not consist of any inappropriate content, including without limitation personal attacks, offensive remarks, obscenities or any language that we consider foul, vulgar or fraudulent;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not contain images of any person, unless you have received their permission, or the permission of their parent or guardian if the person is under the age of 18 or unable to provide consent for any reason;</p>\r\n	</li>\r\n	<li>\r\n	<p>You will not share viruses or files that have the capability of causing damage to another&rsquo;s computer;</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that we have the right to delete, modify or remove any Submissions, at any time in our sole discretion and that you are solely responsible to backup any such content; and</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that when you use the Services you do so at your own risk and that you understand that Submissions that you see may not be accurate. While we may monitor Submissions, we are under no obligation to do so.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>7. REPORTING COPYRIGHT INFRINGEMENT</strong><br />\r\nWe have adopted and implemented a policy that provides for the termination in appropriate circumstances of subscribers and account holders of our Services who are copyright infringers. If you believe your copyright or the copyright of a person on whose behalf you are authorized to act has been infringed, you may provide us with a written Notice of Alleged Infringement (&ldquo;Notice&rdquo;). You must do all of the following in your written Notice for it to be valid:</p>\r\n\r\n<p>A. Identify the copyrighted work that you claim has been infringed, or &ndash; if multiple copyrighted works are covered by this Notice &ndash; you may provide a representative list of the copyrighted works that you claim have been infringed.</p>\r\n\r\n<p>B. Identify the material that you claim is infringing (or to be the subject of infringing activity) and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit us to locate the material, including (if the Content is on our website) the URL of the link shown on the website where such material may be found.</p>\r\n\r\n<p>C. Include your mailing address, telephone number, and, if available, email address.</p>\r\n\r\n<p>D. Include both of the following statements in the body of the Notice (if these statements are untrue, you cannot submit the Notice):</p>\r\n\r\n<p>&ldquo;I have a good faith belief that the disputed use of the copyrighted material is not authorized by the copyright owner, its agent, or the law (e.g., as a fair use).&rdquo;</p>\r\n\r\n<p>&ldquo;The information in this Notice is accurate and, under penalty of perjury, I affirm that I am the owner, or authorized to act on behalf of the owner, of the copyright or of an exclusive right under the copyright that is allegedly infringed.&rdquo;</p>\r\n\r\n<p>E. Provide your full legal name and your electronic or physical signature.</p>\r\n\r\n<p>Deliver this Notice, with all items completed, to Company&rsquo;s Copyright Agent:</p>\r\n\r\n<p><strong>8. DISCLAIMER OF WARRANTIES</strong><br />\r\nYou agree that your use of the services is at your sole risk and acknowledge that all information contained in the services is provided &ldquo;as is&rdquo; and &ldquo;as available,&rdquo; and that we disclaim all warranties, either express or implied, as to the services, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, title and non-infringement. We make no representations or guarantees that the Services are compatible with your equipment or that the Services, or that any electronic communications sent by us or our affiliates, are error-free or will be free from loss, destruction, damage, interruption, corruption, attack, viruses, worms, or other harmful, invasive, or corrupted files, interference, hacking, or other security intrusion, and we disclaim any liability relating thereto. You agree that we have the right to change the content or technical specifications of any aspect of the Services at any time in our sole discretion. You further agree that such changes may result in you being unable to access the Services.</p>\r\n\r\n<p>We make no guarantees, representations, or warranties that the Services or information available through the Services, or that the use of or result of the use of the Services, will be accurate, reliable, complete, current, uninterrupted, or without errors. Any documents, pictures, or other information available on the Services are for informational purposes only, and may not represent the current condition of a property or the condition of the property at the time of sale. The posting of pictures on the Services does not constitute a guarantee that any items represented in the pictures will be present when a buyer takes possession of a property. You are encouraged to conduct your own due diligence and investigate all matters relating to any properties. It is recommended that you seek independent advice, including legal advice, to perform your due diligence and that you use good faith efforts in determining that the content of all information provided to or obtained by you is accurate.</p>\r\n\r\n<p>You understand and acknowledge that the information provided through the Services is subject to change. You should check back frequently for updated information as to the properties and/or mortgage notes available, marketing or transaction events, times and locations, relevant terms, and other matters which may be made available by us or our clients.</p>\r\n\r\n<p>Some of the available content, services, and information may include materials that belong to or that are submitted by third parties. You acknowledge that we assume no responsibility for such content, services, or information. The content of other websites, services, goods, or advertisements that may be linked to or from the Services is not maintained or controlled by us. We do not: (i) make any warranty, express or implied, with respect to the use of the links provided on, or to, the Services; (ii) guarantee the accuracy, completeness, usefulness or adequacy of any other websites, services, or goods, that may be linked to or from the Services; or (iii) make any endorsement of any other websites, services, or goods that may be linked to or from the Services.</p>\r\n\r\n<p>You understand and acknowledge that you are capable of evaluating the merits and risks of purchasing or selling a property using the Services, and are able to bear any such risks. You also acknowledge that you have consulted with, had the opportunity to consult with, or waive the right to consult with, legal and tax professionals relating to the legal and tax consequences of any documents used in connection with the Services.</p>\r\n\r\n<p><strong>9. LIMITATIONS OF LIABILITY</strong><br />\r\nUnder no circumstances, including but not limited to negligence, shall we, our subsidiaries, or affiliates be liable to you or any third party for direct, indirect, incidental, consequential, special, punitive, or exemplary damages, arising from use of or inability to use the services, including those caused by any failure of performance, error, omission, interruption, defect, delay in operation of transmission, computer virus, or line failure in connection with your use of the services, even if we have been advised of the possibility of such damages. applicable law may not allow the limitation or exclusion of liability or incidental or consequential damages, so the above exclusions and limitations may or may not apply to you.</p>\r\n\r\n<p><strong>10. INDEMNITY</strong><br />\r\nYou agree to indemnify, defend, and hold us, our subsidiaries, and affiliates harmless, including costs, liabilities and legal fees, from any claim or demand made by any third party arising out of or relating to: (i) your access to or use of the Services; (ii) your violation of any third party right, including without limitation any copyright, property, or privacy right; (iii) the content of your Submissions; or (iv) your breach of these Terms of Use. We reserve the right, at your expense, to assume the exclusive defence and control of any matter subject to indemnification by you, and you agree to cooperate in such defence. You agree not to settle any matter in which you have indemnity obligations without our prior written consent. We will use reasonable efforts to notify you of any such claim, action or proceeding upon becoming aware of it.</p>\r\n\r\n<p><strong>11. PRIVACY STATEMENT</strong><br />\r\nOur use of your information is governed at all times by our Privacy Statement. Our Privacy Statement explains our practices relating to the collection and use of your information in connection with the Services, and is incorporated into these Terms of Use. By using the Services, you consent to the collection and use of your information as set forth in the Privacy Statement.</p>\r\n\r\n<p><strong>12. TERMINATION OR STOPPING USE OF THE SERVICES</strong><br />\r\nYou can stop using the Services at any time and for any reason.</p>\r\n\r\n<p>Without prior notice, we may revoke your registration, suspend your ability to use certain parts of the Services, and/or terminate your access to the Services at any time in our discretion. We may also modify, suspend, or discontinue the Services.<br />\r\nIf you breach or threaten to breach any provision of these Terms of Use, in addition to terminating your right to use the Services, we shall be entitled to seek injunctive relief to enforce the provisions hereof, but nothing herein shall preclude us from pursuing any action or other remedy for breach or threatened breach of these Terms of Use. If we prevail in such action, we shall be entitled to recover from you all reasonable costs, expenses, and attorneys&rsquo; fees incurred in connection therewith.<br />\r\nIn order to protect the Services, we reserve the right at any time to block users from certain IP addresses from accessing and using the Services. We may also request that you stop accessing or permanently destroy certain content or information available through the Services.</p>\r\n\r\n<p><strong>13. Transaction and Negotiations</strong><br />\r\nServices offered by Egreea are exclusively to facilitate a real estate transaction between vendors (sellers) and purchasers (buyers). Egreea holds no liability to negotiating on behalf of the vendor or the purchaser in the process of title transfer between the parties, which holds no accountability for Egreea on achieving a desired price point for the parties involved in the transaction. Parties may seek third party advisors to assist in conducting the transaction process, however Egreea outlines the process and provides the platform for transactions to occur but does not participate in communication, negotiation or persuasion of any kind to produce a price outcome for the parties.<br />\r\n<br />\r\n<strong>14. BINDING ARBITRATION AGREEMENT AND CLASS ACTION WAIVER</strong><br />\r\nPlease read this section carefully &ndash; it may significantly affect your legal rights, including your right to file a lawsuit in court and to have a jury hear your claims.</p>\r\n\r\n<p>By using the Services, you irrevocably agree: (i) to waive all rights to trial in a court before a judge or jury on any claim, action or dispute with us or relating in any way to your use of the Services or the interpretation, applicability, enforceability or formation of these Terms of Use including, but not limited to, any claim that all or any part of this agreement is void or voidable (&ldquo;Claims&rdquo;); (ii) that all Claims will be determined exclusively by final and binding arbitration in Orange County, California before one arbitrator; and (iii) that the arbitrator will not have the authority to consolidate the Claims of other users of the Services (&ldquo;Users&rdquo;) and will not have the authority to fashion a proceeding as a class or collective action or to award relief to a group or class of Users in one arbitration proceeding.</p>\r\n\r\n<p>The arbitration shall be administered in by a third party in pursuant to its Comprehensive Arbitration Rules and Procedures (&ldquo;Rules&rdquo;) and in accordance with the Expedited Procedures in those Rules. Notwithstanding these Rules, however, such proceeding shall be governed by the laws of the State of California. All parties shall maintain the confidential nature of the arbitration proceeding and the award, including the hearing, except as may be necessary to prepare for or conduct the arbitration hearing on the merits, or except as may be necessary in connection with a court application for a preliminary remedy, a judicial challenge to an award or its enforcement, or unless otherwise required by law or judicial decision.</p>\r\n\r\n<p>The arbitrator, and not any federal, state, or local court or agency, shall have exclusive authority to resolve any Claims. However, nothing in this section shall prevent us from enforcing our intellectual property rights and/or remedy unfair competition, misappropriation of trade secrets, unauthorized access, fraud or computer fraud, and/or industrial espionage in court.</p>\r\n\r\n<p>Judgment on any arbitration award may be entered in any court having jurisdiction. The prevailing party shall be entitled to an award of costs and lawyer fees reasonably incurred (a) in connection with any arbitration arising out of or related to these Terms of Use, or (b) to enforce the terms of these Terms of Use to arbitrate. If a party is deemed to be a prevailing party under circumstances where the prevailing party won on some but not all of the claims and counterclaims, the prevailing party may be awarded an appropriate percentage of the costs and attorneys&rsquo; fees reasonably incurred in connection with the arbitration or action.</p>\r\n\r\n<p><strong>15. SERVICES AUDITING AND MONITORING</strong><br />\r\nWe reserve the right to audit and monitor (manually or through automated means) the use of the Services to ensure compliance with these Terms of Use and to maintain and improve the provision of the Services. We also may, but are not required to, monitor the content on the Services using manual review or technical measures to screen, block, filter, edit or remove content. We may terminate or suspend users&rsquo; of Egreea or delete, edit or remove content that we, in our sole discretion, deem illegal, offensive, abusive, in violation of these Terms of Use or our other policies, or otherwise inappropriate or unacceptable. All enforcement determinations are made in our sole discretion, and we will not incur any liability or responsibility if we choose to remove or delete any content.</p>\r\n\r\n<p>You acknowledge, consent, and agree that we may access, preserve, and disclose information about your use of the Services, including your communications and content you submit, if required to do so by law or in a good faith believe that such access, preservation, or disclosure is reasonably necessary to: (i) comply with legal process; (ii) enforce these Terms of Use; (iii) respond to claims that any content you submit violates the rights of third parties; (iv) respond to your requests for customer service; or (v) protect the rights, property or personal safety of us, our users and the public.</p>\r\n\r\n<p><strong>16. SUBMITTING A BID OR OFFER </strong><br />\r\nRegistered buyers (&ldquo;purchasers&rdquo;) using Egreea to conduct negotiations with the seller (&ldquo;vendor&rdquo;), are obligated to fulfil their contractual duties of their states jurisdiction in purchasing a property estate. These obligations and requirements to be performed are outlined in the &lsquo;property listing&rsquo;s&rsquo; relevant forms for the buyer to populate before or after submitting an offer to the seller. It is the buyer&rsquo;s duty to complete these documents for their offer or bidding submission, however can indicate to the seller their interested price without first populating these documents, but by consenting with the submissions &lsquo;I agree&rsquo; terms and conditions of fulfilling their obligations to populate the forms at the later date when their offer is accepted. The buyer will be held binding to their offer submission with or without the relevant forms filled out and held responsible for carrying through with their obligations in continuance of the real estate process thereafter mutual consent to proceed from both the buyer and seller. By using Egreea as a buyer, you agree that you will fulfil your contractual obligations following the purchase of property thereafter your legally binding offer has or has not been accepted.</p>\r\n\r\n<p><strong>17. GENERAL TERMS</strong><br />\r\nA. Force Majeure. No party shall be liable to the other for any default resulting from force majeure, which includes any circumstances beyond the reasonable control of the parties.</p>\r\n\r\n<p>B. Notices and Electronic Communications. We may provide you with notices, including those regarding changes to these Terms of Use by email, regular mail, telephone or communications though the Services. When you use the Services, you consent to receive communications from us electronically and through each of the foregoing methods. By engaging in any telephone conversation with our agents or employees, you consent to our recording such telephone call. You agree that all notices, disclosures, and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing. You agree that you have the ability to store electronic communications such that they remain accessible to you in an unchanged form.</p>\r\n\r\n<p>C. Compliance with Applicable Laws: The Services are controlled within Australia and directed to individuals residing in the Australia. We do not represent that the materials in the Services are appropriate or available for use in any particular location. Those who choose to access the Services do so on their own initiative and are responsible for compliance with all applicable laws in their own jurisdiction. We reserve the right to limit the availability of the Services to any person, geographic area or jurisdiction at any time in our sole discretion.</p>\r\n\r\n<p>D. Miscellaneous. You acknowledge that these Terms of Use, any other policies or terms incorporated herein, either in their entirety or by explicit reference, and any other terms and conditions on the Services, constitute the entire agreement between you and us and govern your use of the Services. Australian law governs use of the Services and will be applied in any legal action or arbitration involving use of the Services. If any provision of these Terms of Use is found invalid or unenforceable, that provision will be enforced to the maximum extent permissible by law, and the other provisions of these Terms of Use will remain in force. Our failure to exercise or enforce any right or provision of these Terms of Use shall not constitute a waiver of such right or provision unless acknowledged and agreed by us in writing. You may not assign these Terms of Use or the rights hereunder without our prior written consent. We may assign these Terms of Use and delegate certain responsibilities, obligations, and duties under or in connection with these Terms of Use in our sole discretion.</p>', 'terms-and-condition', '2022-04-27 10:54:31', '0000-00-00 00:00:00');
INSERT INTO `tbl_pages` (`id`, `title`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Privacy & Cookie Notice', '<a href=\"javascript:void(0);\" onclick=\"sccc(1);\" style=\"color: #00afaa; width: 100%; float: left; margin-bottom: 3px;\" >1. Scope of Privacy Statement</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(2);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >2. Commitment to Privacy</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(3);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >3. Collection of Your Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(4);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >4. Use of Your Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(5);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >5. Tailored Advertising</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(6);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >6. Do Not Track Signals</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(7);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" > 7. Disclosure of Your Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(8);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >8. Opting Out of Communications from Us</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(9);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >9. Notice of Privacy Rights of California Residents</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(10);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >10. Security and Account Protection</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(11);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >11. Children’s Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(12);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >12. Accessing, Reviewing, and Changing Personal Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(13);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >13. Third Party Links and Services</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(14);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >14. Amendments to Privacy Statement</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(15);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >15. International Transfers of Information</a>\r\n                <div class=\"clr\"></div>\r\n                \r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step1\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">1. Scope of Privacy Statement</p>\r\n                    This Privacy Statement (“Privacy Statement”) describes how Egreea, and its affiliates and subsidiaries (collectively, “we,” “us,” “our,” or the “Company”) handle your personal information when you (collectively, “you” or “your”) use the Company’s websites (egree.com and egreea.com.au) and any other website where this Privacy Statement is posted), tools, documents and applications (including mobile applications), and other services, including the services offered. By using the Services, you expressly consent to our collection, storage, use and disclosure of your personal information as described in this Privacy Statement.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step2\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">2. Commitment to Privacy</p>\r\n                    The Company has a strong commitment to providing information tailored to your individual needs while providing excellent service to all of our visitors and customers, including respecting concerns about privacy. We understand that you may have questions about whether and how we collect and use information. This Privacy Statement details the steps we take to respect your privacy concerns.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step3\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">3. Collection of Your Information</p>\r\n                    <u style=\"font-weight:600;\" >Personal Information.</u> We do not collect personal information (such as names, addresses, telephone numbers, email addresses, or financial account information) from you when you browse the Services, unless you have specifically and knowingly provided us with personal information, e.g., by creating an account through the Services (“Egreea”), updating your Egreea Account profile, registering for or participating on the website to submit a legally binding offer or a transaction event and completing online forms or questionnaires.  This information may include, without limitation, information such as your first and last name, e-mail address, telephone number, username, password, billing information, and other information exchanged in connection with real estate transactions. We also may acquire personal information from other sources such as offline records, publicly available information, or from third parties. We use this information to provide the Services and as discussed in this Privacy Statement.\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >Automatically-Collected Information.</u> We may automatically collect information about the computer or devices (including mobile devices) you use to access the Services, and your interactions with the Services. For example, we may collect and store information such as your browser type, IP address, language, operating system, location of your wireless device (e.g., latitude and longitude), the state or country from which you accessed the Services, unique device identifier (e.g., a UDID or IDFA on Apple devices like the iPhone, iPad and iTouch), the pages you view, length of time spent on pages, communications with other users through the Services, the Services you use and the manner in which you use such Services (e.g., the content you access, view, click on, search for, post, favourite, vote, follow, share, upload, or tag), the date and time of your visit, the websites you visited immediately before and after visiting our Company websites, error logs, and other hardware and software information, as well as other geographic and demographic information. We may use third party analytics providers and technologies, including cookies and similar tools, to assist in collecting this information. We may use this information to formulate statistical models about use of the Services, enhance the Services for our users, and provide you with information about new opportunities, and tailored content, advertising, marketing and as otherwise discussed in this Privacy Statement. To the extent that such information is maintained in a manner that identifies your name or contact information, it will be treated as personal information; otherwise, such information will be treated as non-personal information.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p>  <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >Our Use of Cookies.</u> The Services use “cookie” technology and similar online tools, such as web beacons and web pixels. “Cookies” are small files that a website stores on a user’s computer or device. The Services use cookies to keep the information you enter on multiple pages together. A majority of cookies we use are “session” cookies, meaning that they are automatically deleted from your hard drive after you close your browser at the end of your session. Session cookies are used to optimize performance of the Services and to limit the amount of redundant data that is downloaded during a single session. We also use “persistent” cookies, which remain on your computer or device unless deleted by you (or by your browser settings). We use persistent cookies for statistical analysis of performance to ensure the ongoing quality of our services. In either case, we do not use cookies to obtain or retain any personal information about you apart from what you voluntarily provide us. Most web browsers automatically accept cookies, but you may set your browser to block cookies (consult the instructions for your particular browser on how to do this). Please note that if you decide to block cookies, this may interfere with your ability to perform certain transactions, use certain functionality, and access certain content on the Services.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >Google Analytics.</u> The Company websites may use Google Analytics, a vendor’s service that uses cookies, web beacons, web pixels and/or similar technology to collect and store anonymous information about you, which may include non-personal information described above. You can read Google Analytics’ privacy policy at http://www.google.com/analytics/learn/privacy.html and Google Analytics Terms of Use at http://www.google.com/analytics/tos.html. You can opt-out from being tracked by Google Analytics in the future by downloading and installing Google Analytics Opt-out Browser Add-on for your current web browser at http://tools.google.com/dlpage/gaoptout?hl=en.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >User-Initiated Communication.</u> From time to time, portions of the Services, including, without limitation, Services available through the Community, may enable you to send emails and other types of messages to us or to third parties and to participate in bulletin boards and discussion groups. We reserve the right to use reproduce, modify, adapt, publish, translate, create derivative works from, distribute, copy, and display all such emails, messages and discussion groups throughout the world in any form, pursuant to Section 6 of the Terms of Use. Among other things, this right allows us to review your messages with other users to enforce our Terms of Use. Whenever you choose to initiate these kinds of communication with us, or anyone else, you may be contacted in return. Such communications may be identified by your actual name and/or your username, and may be linked to your Community profile. Please use your discretion when deciding whether and what to post and whom to contact and message. We reserve the right, in our sole discretion, to monitor, edit or delete postings from our bulletin boards and discussion groups. This reservation of rights shall not under any circumstances obligate us to conduct such edits or deletions, nor shall it cause us to be liable for any such edits or deletions.\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    The Services may also contain social plugins for other websites, such as Facebook, Twitter, YouTube, LinkedIn and Google+. We recommend reviewing the privacy policies with respect to the social plugins for each of these websites, prior to clicking on such plugins.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step4\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">4. Use of Your Information</p>\r\n                    We will use your information for the purpose for which you provided it, and we may also use your information for a number of purposes such as to:\r\n                    \r\n                    <ul style=\"float:left; width:100%; margin-top:12px; list-style-type:disc; padding-left:15px;\">\r\n                   <li style=\"float:left; width:100%; margin-bottom:10px;\"> Create and maintain your Egreea and account profile, your Community profile, registration information and communication preferences;\r\n                    Enhance the user experience;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\"> Perform research and analytics; </li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Customize and personalize the content and advertising that you see on the Services;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Respond to and fulfil your requests for Services (including qualification to make bids or offers) or other 					                    inquiries;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Determine your eligibility for certain marketing or transaction events, services, gifts, prizes, and special features of the Services;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Call, email or otherwise contact you to facilitate marketing or transaction events for which you are registered;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Call, email or otherwise contact you regarding new opportunities relating to marketing or transaction events or our other Services;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Administer, register or enrol you in, or facilitate your participation in recreational, educational or entertainment activities; surveys or questionnaires; 		   promotions or sweepstakes, or any other services, events or activities sponsored by us or third parties, or offered in connection with our Services;</li>\r\n                  \r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Send you prizes and gifts;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Enforce our Terms of Use;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Send you information about topics that may be of interest to you; and</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Send you communications related to your Ten-X Account and to alert you to the latest developments and features of the Services.</li>\r\n                    </ul>\r\n                    \r\n                    \r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step5\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">5. Tailored Advertising</p>\r\n                   The Services may include third party tailored ad technology which enables customized and targeted ads to be displayed to you through the Services and on third party websites. We do not share personal information with these third parties; however, when you use the Services, we or third parties operating the ad serving technology may use non-personal information that is collected through cookies, anonymous identifiers, such as an IDFA on iOS devices, web beacons, pixels, or clear GIFs to ensure that appropriate ads are presented and to perform analytics concerning your use of the Services and other websites tracked by these third parties. These technologies also may control the number of times you see a given ad, deliver ads that relate to your interests, and measure the effectiveness of ad campaigns. To the extent any of this information is collected by third parties, you acknowledge and agree that such collection and use is governed by those third parties’ privacy policies and we are not responsible for the privacy practices of such third parties.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step6\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">6. Do Not Track Signals</p>\r\n                  We do not respond to or alter our practices detailed herein based upon your selection of the “Do Not Track” setting or other “opt out” setting or feature that may be offered by your browser; however, we reserve the right to do so in the future.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step7\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">7. Disclosure of Your Information</p>\r\n                    We may share your information in the following ways:\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    We may make information collected through the Services available to subsidiaries and affiliated companies that are under common ownership or control within the Company family.\r\n           			<p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />          \r\n                If you download information on assets listed on our Services or make a bid or offer on a particular asset, the seller and its affiliates and representatives are given access to your information.    \r\n                   <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />      \r\n                    \r\n                    We may share information about our visitors, customers, or former customers with the following types of companies that perform services on our behalf or with whom we have joint marketing agreements:\r\n                    \r\n                      <ul style=\"float:left; width:100%; margin-top:12px; list-style-type:disc; padding-left:15px;\">\r\n                   <li style=\"float:left; width:100%; margin-bottom:10px;\"> \r\n                   Non-financial companies such as envelope stuffers, fulfillment service providers, payment processors, data processors, customer/support services, etc.\r\n                    Enhance the user experience;</li>\r\n                    \r\n				<li>Financial service providers such as companies engaged in banking, mortgage lending, consumer finance, securities, and insurance. </li>                    \r\n                  </ul>\r\n                   <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />      \r\n                  We may share or sell, as allowed by law, information about you with other companies who we believe may have products and services of interest to you. If you would like to opt-out of our sharing of your information with these other companies for their direct marketing purposes, please follow our Third Party Opt-Out Policy described in Section 9 below.\r\n                   \r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />  \r\n                   We may share your information with any person or entity where we believe in good faith that such disclosure is necessary to: (a) comply with the law or in response to a court order, government request, or other legal process; (b) produce relevant documents or information in connection with litigation, arbitration, mediation, adjudication, government or internal investigations, or other legal or administrative proceedings; (c) protect the interests, rights, safety, or property of the Company or others; (d) enforce the Terms of Use on the Services; (e) provide users of the Services with the services they request; (f) provide you with special offers or promotions from us; (g) allow another company that acquires the Company or some or all of its assets to continue to serve you; or (h) operate the Company’s systems properly.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br /> \r\n                   We may share your information with any person or entity when we have your consent.\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br /> \r\n                    We may use and share non-personal information about you or use of the Services, including any de-identified and aggregated data with third parties without limitation.\r\n                    \r\n                    \r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step8\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">8. Opting Out of Communications from Us</p>\r\n                    By creating a Egreea account or registering for or participating in any marketing or transaction event on one of our Company websites, you agree to receive direct mail, email newsletters and other promotional email communications, as well as promotional telephone communications. Similarly, by creating a Community profile you agree to receive email newsletters and other promotional email communications. For example, from time to time we may send you email notices or news updates alerting you to new features, products, promotions, or services pertaining to offerings from us, new opportunities, surveys or our other Services, and, if you have created a Egreea Account or registered for a marketing or transaction on one of our Company websites, we may send you direct mail or call you with respect to same.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step9\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">9. Notice of Privacy Rights of Australian Residents</p>\r\n                    We have adopted a policy of not sharing your personal information with third parties for their direct marketing purposes if you request that we do not do so (“Third Party Opt-Out Policy”). You may make such a request by sending us an email. When contacting us, please indicate your name, address, email address, and what personal information you do not want us to share with third parties for their direct marketing purposes. Please note that there is no charge for controlling the sharing of your personal information or for processing this request.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step10\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">10. Security and Account Protection</p>\r\n                   We have implemented commercially reasonable physical, administrative, technical, and electronic security measures to protect against the loss, misuse, and alteration of your personal information. Despite our best efforts, however, no security measures are perfect or impenetrable. We appreciate your help in safeguarding the integrity of your own and others’ privacy. We encourage you to let us know immediately if you suspect that any personal information you shared with us is being used contrary to this Privacy Statement.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step11\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">11. Children’s Information</p>\r\n                    The Services are not directed toward persons under 18 years of age. We do not knowingly market to or collect any personal information from children under the age of 18. If you are under 18, you are not permitted to submit any personal information to us or the Services. If you provide information to us through the Services, you represent that you are 18 years of age or older. \r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step12\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">12. Accessing, Reviewing, and Changing Personal Information</p>\r\n                   If your personal information changes or is inaccurate, you agree to update your information by updating the account information located in your Egreea Account profile.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step13\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">13. Third Party Links and Services</p>\r\n                    The Services may contain links to third-party websites, including identity verification and social networking websites. Your use of these features may result in the collection or sharing of information about you, depending on the feature. Please be aware that we are not responsible for the content or privacy practices of other websites or services to which we link. We do not endorse or make any representations about third-party websites or services. The personal information you choose to provide to or that is collected by these third parties is not covered by our Privacy Statement. We strongly encourage you to read such third parties’ privacy statements.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step14\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">14. Amendments to Privacy Statement</p>\r\n                   We may amend this Privacy Statement at any time by posting the amended terms on the Services. Any changes to this Privacy Statement will become effective upon posting. Your continued use of the Services following these changes means that you accept such revisions. If we make any material changes to this Privacy Statement, we will post the changes here and notify you in the manner and to the extent required by law.\r\n                </div>\r\n                \r\n                 <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step15\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">15. International Transfers of Information</p>\r\n                   Some of the uses and disclosures mentioned in this Privacy Statement may involve the transfer of your personal information to various countries around the world that may have different levels of privacy protection than your country. By submitting your personal information, you consent to such transfers. By using the Services, or by submitting your personal information to us, you expressly consent to the storage and processing of your personal information in accordance with the laws of Australia, or in the users designated jurisdiction.\r\n                </div>', 'privacy-policy', '2022-04-27 10:57:22', '0000-00-00 00:00:00'),
(3, 'Thank You', 'Thank You', 'thank-you', '2018-08-20 12:55:47', '0000-00-00 00:00:00'),
(4, 'How it works?', '<p>How It Works</p>', 'how-it-works', '2022-04-27 10:54:52', '2020-06-04 16:02:38'),
(5, 'FAQ', '<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>', 'faqs', '2020-06-04 16:02:08', '2020-06-04 16:02:08'),
(6, 'Press and News', '<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>', 'press-and-news', '2022-04-27 11:10:01', '2020-06-04 16:01:27'),
(7, 'Trust & Safety', '<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>', 'trust-and-safety', '2022-04-22 12:51:50', '2022-04-22 19:51:50'),
(8, 'About US', '<p><strong>We Believe In Action. Community. Quality.</strong></p>\r\n\r\n<p>Siamo un&rsquo;azienda, ma soprattutto un insieme di persone che hanno in comune una grandissima passione.&nbsp;Ci ispiriamo agli stessi principi cui fanno riferimento le startup di successo: rapidit&agrave;, capacit&agrave; di adattamento e propensione all&#39;ascolto. Sono i nostri pilastri.</p>\r\n\r\n<p>Proponiamo ai nostri clienti soluzioni efficaci e corrette, con la spinta innovativa e le forti competenze che ci contraddistinguono, fin da quando eravamo una realt&agrave; piccola, ma piena di sogni ed entusiasmo.</p>', 'about-us', '2022-04-27 11:09:35', '2020-06-04 15:54:13'),
(9, 'Help Center', 'Help Center', 'help-center', '2018-08-20 09:26:35', '0000-00-00 00:00:00'),
(10, 'How to shop courses on Course Units Global?', 'How to shop courses on Course Units Global?', 'how-to-shop-courses-on-course-units-global', '2018-08-20 09:26:35', '0000-00-00 00:00:00'),
(11, 'Corporate Account', 'Corporate Account', 'corporate-account', '2018-08-20 12:55:47', '0000-00-00 00:00:00'),
(12, 'Advertise with Course Units Global', 'Advertise with Course Units Global', 'advertise-with-course-units-global', '2020-06-04 16:02:38', '2020-06-04 16:02:38'),
(13, 'Report a Product', 'Report a Product', 'report-a-product', '2020-06-04 16:02:08', '2020-06-04 16:02:08'),
(14, 'Sell courses on Course Units Global', 'Sell courses on Course Units Global', 'sell-courses-on-course-units-global', '2020-06-04 16:01:27', '2020-06-04 16:01:27'),
(15, 'Become a Tutor', 'Become a Tutor', 'become-a-tutor', '2022-04-22 12:51:50', '2022-04-22 19:51:50'),
(16, 'Become an Affiliate', 'Become an Affiliate', 'become-an-affiliate', '2020-06-04 15:54:13', '2020-06-04 15:54:13'),
(17, 'Course Units Global Partner Program', 'Course Units Global Partner Program', 'course-units-global-partner-program', '2018-08-20 09:26:35', '0000-00-00 00:00:00'),
(18, 'Join us on social media', 'Join us on social media', 'join-us-on-social-media', '2018-08-20 12:55:47', '0000-00-00 00:00:00'),
(19, 'Investor Relations', 'Investor Relations', 'investor-relations', '2020-06-04 16:02:38', '2020-06-04 16:02:38'),
(20, 'Payment methods', 'Payment methods', 'payment-methods', '2020-06-04 16:02:08', '2020-06-04 16:02:08'),
(21, 'Get to Know Us', 'Get to Know Us', 'get-to-know-us', '2020-06-04 16:01:27', '2020-06-04 16:01:27'),
(22, 'Careers@ Course Units Global', 'Careers@ Course Units Global', 'careers-course-units-global', '2022-04-22 12:51:50', '2022-04-22 19:51:50'),
(23, 'Blog', 'Blog', 'blog', '2020-06-04 15:54:13', '2020-06-04 15:54:13'),
(24, 'Place & Track Order', 'Place & Track Order', 'place-track-order', '2020-06-04 15:54:13', '2020-06-04 15:54:13'),
(25, 'Order Cancellation', 'Order Cancellation', 'order-cancellation', '2020-06-04 15:54:13', '2020-06-04 15:54:13'),
(26, 'Returns & Refunds', 'Returns & Refunds', 'returns-refunds', '2020-06-04 15:54:13', '2020-06-04 15:54:13'),
(27, 'Payment & Course Units Account', 'Payment & Course Units Account', 'payment-course-units-account', '2020-06-04 15:54:13', '2020-06-04 15:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `amount` float(12,2) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `order_slug` varchar(100) DEFAULT NULL,
  `order_number` varchar(20) DEFAULT NULL,
  `buyer_location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `user_id`, `course_id`, `order_id`, `amount`, `transaction_id`, `order_slug`, `order_number`, `buyer_location`, `created_at`, `updated_at`, `status`, `slug`) VALUES
(12, 8, '4,3', 12, 90.00, '93C45408WM374803U', '1a973d862d1dba52e2a57bc7f03f01fdf6600b49f95c77f914e69b2eac5c', '93C45408WM374803U', NULL, '2020-11-04 10:06:46', '2020-11-04 10:06:46', 1, '9d47d11371f17c94b111d13428dd3c27c9feee32fd1551b7ea79949e6f06'),
(13, 1, '6', 13, 20.00, '3TJ79649M6307481P', 'ddaa4f59fe9f8829d5cf1260f8de03f40cd28e0164b49518765d8e5ab62d', '3TJ79649M6307481P', NULL, '2020-11-04 10:44:17', '2020-11-04 10:44:17', 1, 'c0cb37f82235476203113ca95cbc6add86a5093ed5944c406ee94a104c51'),
(14, 1, '5,4,3', 14, 140.00, '6U45959161072393P', 'f8472f6ee0b5da25af0ce943e898d1ffe4311229b13b90bae3d902226699', '6U45959161072393P', NULL, '2020-11-06 06:18:09', '2020-11-06 06:18:09', 1, '6e410aa98ab1ef13f14879e63af4e43251caf1d62630c1d74c3e9d8dcb40'),
(15, 14, '3', 15, 65.00, '5DV17763L7523274H', '714ca3d55294f910ca863c7528935681cb5fe52ad1de400c7500aae45985', '5DV17763L7523274H', NULL, '2021-01-05 04:13:24', '2021-01-05 04:13:24', 1, '648316cf012595710bd23e82a3094af7d23afab8f8e5af126959fbde23d1'),
(16, 21, '6,4', 16, 45.00, '2CR31226U2350371Y', 'bf35cb91283af818785c4506e9512a41ede7c77c9c056757d9806596dce6', '2CR31226U2350371Y', NULL, '2021-05-26 05:07:06', '2021-05-26 05:07:06', 1, 'e799e20d19f5258f06bd9e73a611c2c1d0620b13bdea5c68653787e0fe1f'),
(17, 21, '3,8', 17, 75.00, '37G55101H58168050', 'c5070dff7dad53d38908cd2b7a7b0bb787a76a40986ab831e342632a32b6', '37G55101H58168050', NULL, '2021-05-26 05:10:07', '2021-05-26 05:10:07', 1, '977e6b8e85c30cb9b534f069aa9ed63d05e1dadfa118839cfacbb3930c9e'),
(18, 29, '3,4', 18, 90.00, '7UL669987N547282U', 'f941ec43c97b99785b6c57f5f85c044a9fdef5edbd65d7dba9cc272ae7ce', '7UL669987N547282U', NULL, '2021-06-09 04:10:26', '2021-06-09 04:10:26', 1, '0b85cca7743ad3167aaf1ccbd4c5574d01137ba52ea880d67f06d4af25ce'),
(19, 29, '3,4', 19, 90.00, '4F379583SX9179347', 'ced44498153f8d5270cd441b11e407f87f9d115f9c8ba259bde95dc2f580', '4F379583SX9179347', NULL, '2021-06-09 04:10:31', '2021-06-09 04:10:31', 1, '22233989140ac3e2ff457885be90e2be0a0baee94553ab3ddec044cd70d4'),
(20, 29, '3,4', 20, 90.00, '17H895756T5630719', '42cfb59124679c5f915ec6fe2eb101d3845353a3aca212856cc33d1a2551', '17H895756T5630719', NULL, '2021-06-09 04:10:34', '2021-06-09 04:10:34', 1, '6ad07a58bc60475317e90b8e1068f425e8b8186512756dc3bba732e7ba3f'),
(21, 29, '3,4', 21, 90.00, '3ST220310U6789420', 'd418631c9ed4f342212bd710882f452b9d933995a1ab5cfef8faf86cf972', '3ST220310U6789420', NULL, '2021-06-09 04:10:43', '2021-06-09 04:10:43', 1, '29f631ee3b42b88f798a4f673b32f89c2ced26fc6fca1328b7b4d34de1dd'),
(22, 29, '3,4', 22, 90.00, '58B69496AK009972W', 'f7c7d988c29f000ea04e243b0496881d4b2072cebb22087ec9c955f6efc9', '58B69496AK009972W', NULL, '2021-06-09 04:10:45', '2021-06-09 04:10:45', 1, 'd1f48bda156773bb9c49265c9c2afcdfc47071aab62297fc5472a5022225'),
(23, 1, '9,14,14', 23, 120.00, '6V878846CS639904A', 'baaff4d6e39e3f094410462629dc83150e162601c64e95c824554d3632e5', '6V878846CS639904A', NULL, '2021-06-23 04:10:47', '2021-06-23 04:10:47', 1, '1dbe4d5291661bba96606b27acf3d27e7631b82e7bf16f148592bebaab53'),
(24, 1, '9,14,14', 24, 120.00, '9ES893801K773740F', '1017301c561cf7821fa5d12ec933b996dd2853e4277ae213db623349fd55', '9ES893801K773740F', NULL, '2021-06-23 04:10:52', '2021-06-23 04:10:52', 1, '3c4a2f320d3bfdc552bad93375c5360fe63d27f184946a2a922100b52ba4'),
(25, 1, '16', 25, 30.00, '5FL01108T90794405', '50d202b5c38976505c5ccc2f3e2897f2b3b85350d7c136961a04864dee9e', '5FL01108T90794405', NULL, '2021-06-23 04:12:53', '2021-06-23 04:12:53', 1, 'a589450da52a69384fbcdc3bcaaa4992f3a9a9917a15d6639f623729606a'),
(26, 21, '3,4,', 26, 22.00, '78965412325', '73ae74a3754f463c233c078d61355793ddcd1f0a52e7a130a76de37a4529', 'cc53f93c82df46b44b40', NULL, '2021-07-20 12:12:27', '2021-07-20 12:12:27', 1, '9dd9e42187c0b611133abe974e937ff4fd862420637f1e94a561b5728f7a'),
(27, 21, '3,4,', 27, 22.00, '78965412325', 'f728f92da300c54b4a962ab2dd6526ef8536ae77543f6c6e59a24048ce65', 'bf970e0bbf7e209c0fca', NULL, '2021-07-20 12:13:11', '2021-07-20 12:13:11', 1, '687ebf54a10926b655d1f31b7c06a55f22d95153120a6d44afa96866bf2b'),
(28, 21, '7,14', 28, 70.00, 'bb18abe1-1369-0522-7a69-71be07c7a841', '2c9fe68af7ffac75821343d5256ee86e166550b22c1317eacaf0b31e3547', '71a0dc154ab4e8251128', NULL, '2021-07-20 12:15:30', '2021-07-20 12:15:30', 1, '42db1c2ac5268b57b7dca10dbc8eed1de2ef2e100af5989053c282a1940d'),
(29, 21, '5', 29, 50.00, '71e6934c-65d9-040f-6ae1-3be808f77af1', '0c2d158b94b268565c57c59bcb89c084cf223669e40c7eb9fcafe96be7b7', '131a3b0ddee164f74e28', NULL, '2021-07-20 12:26:20', '2021-07-20 12:26:20', 1, '8c5a5bb5e756040ab60664d35572ee369319a6072327b36a67949ebedd6a'),
(30, 21, '5', 30, 50.00, '71e6934c-65d9-040f-6ae1-3be808f77af1', 'efe19ff656fa5d5685016c8bdbcb26b0933723c697695f9942e6004d1b2c', 'b03697a3fccc2f96284a', NULL, '2021-07-20 12:27:34', '2021-07-20 12:27:34', 1, '911b8d037f70887bf5062269506837a3af99b8b49452f2ea26e6f05fef0e'),
(31, 21, '5', 31, 50.00, '71e6934c-65d9-040f-6ae1-3be808f77af1', '5a9a38e2142a8162b5fa39317f6476d464a792bc2bf3c239793fbce23e3b', '0d762031eeacc4c5562b', NULL, '2021-07-20 12:38:45', '2021-07-20 12:38:45', 1, '329d4f547293460a8108bffebc87ce3f45dfcd4899d295381f91c624c8e8'),
(32, 21, '5', 32, 50.00, '71e6934c-65d9-040f-6ae1-3be808f77af1', '6e697e1800d0191e28ab70e66d4cfd21fcd2f7f32e10abad0d2e9b5b34f4', '975ab473af4397330b99', NULL, '2021-07-20 12:39:18', '2021-07-20 12:39:18', 1, 'e4bf5b319e360d02cc0d738fb646ef8409e735c12921acf0dd6d26b69800'),
(33, 21, '3,4,', 33, 22.00, '78965412325', 'd3471ac117ef51bb33e44ec4800c3bb49f4ca34e34cad7fc5bd84c69647c', '97f9c95a503fdb964dc0', NULL, '2021-07-20 12:59:35', '2021-07-20 12:59:35', 1, '0b12701548610bce26108f9ac33188f2aee9733ab337b5b4a4282033f152'),
(34, 21, '5', 34, 50.00, '7UW367353D370371L', '940fb672202e46c67ac9ddf36b8411909a36cceebd48ad990a26d7d5af01', '7UW367353D370371L', NULL, '2021-07-20 13:08:45', '2021-07-20 13:08:45', 1, 'e29f3591d9bd08dd99d93d6a305037f4b901157db691bc9418f692510a96'),
(35, 21, '8', 35, 10.00, '78524507-7639-0141-7460-12240f5d910b', '4e1c1c7c5127ad9db4c245378a385f3c2a6a69661712221963432a773001', '9ebefaca355421f1358b', NULL, '2021-08-02 12:53:35', '2021-08-02 12:53:35', 1, '0c73e8f04c9f99d24b3c588589b52a35f6fd39b11dcdf2382f9b58cfeb62'),
(39, 21, '7', 39, 20.00, 'af90b99d-162b-0161-5e02-a6fa09a0dca1', '37e42ae4d78741c22346d4366a3a43e033d53560f08def9e9517aa6f9ba4', 'e1b3ba371fd3cd18f694', NULL, '2021-08-10 09:25:38', '2021-08-10 09:25:38', 1, '0abf70687452141b9e21b5ca057f67a7319c603f67a40794208cfafdbfc2'),
(38, 21, '7', 38, 20.00, 'af90b99d-162b-0161-5e02-a6fa09a0dca1', 'f22e6ccb59d5eb9bbc48ec07cb8957c13709ac71ed08647259b038046925', '7898c3ede1686007b879', NULL, '2021-08-10 09:23:03', '2021-08-10 09:23:03', 1, '1e7419bf8b8184b7da6e0d2a708a5dc207c24e266a196ecead8056e32748'),
(40, 21, '7', 40, 20.00, 'af90b99d-162b-0161-5e02-a6fa09a0dca1', '7ca081a1de220342aee81b64a13179e43a7378e68ef66c6283a99a6cfb6b', '3d2477072da10cc9ec71', NULL, '2021-08-10 09:26:13', '2021-08-10 09:26:13', 1, '420b7e8f80c093b0c1a3803b7c296d33e0f5fd2d9199f1a77dcdcdbd868e'),
(41, 21, '9', 41, 20.00, 'fd4d3c08-67bd-0726-7e6d-c8da81f18706', '4066413aa0b7712ebc97b3f5e95fbc5ef0c6c4ccb97ca83380c78e265e90', '90f0fcbedca1f6a3dd92', NULL, '2021-08-10 09:28:39', '2021-08-10 09:28:39', 1, 'a0c66e812d0b31baa408ab233ef7337e180f27d824f4de5f53f8e6cf5412'),
(42, 16, '5', 42, 50.00, '4f49b966-1919-0f94-581b-6429aafcb0d8', '5a49b616296143f19e4a698fbe7cee2512b0ef9af075ecbd54ba0ebaa469', '5a32e81747189e09bccb', NULL, '2021-08-12 07:28:32', '2021-08-12 07:28:32', 1, 'f3c50dd36dc08756778afafa7d1190aa1819559f75460ffb5a5bd322dcb8'),
(43, 21, '3', 43, 65.00, 'tokencc_bh_jx2fd7_5x7qsk_zq39qr_sx4ndv_jqy', '84b1ee61606ab0e6c817f5addf81cc7428d55af8f4ebe30d9bfc8bb0c380', 'ec98324d22cb5361223d', NULL, '2021-10-26 10:26:56', '2021-10-26 10:26:56', 1, '5a68c5787478a955e8fa768fa62f37ad29b159030b368546f0f5a5a219cf'),
(44, 21, '3', 44, 65.00, '5fe3735d-b616-0e41-6b04-3ec176fe382e', '5db65665b91f971fc89851620ebec3684d785de8edf9469d516cb9fa10b3', '0aa2590bb9b278764516', NULL, '2021-10-28 09:46:22', '2021-10-28 09:46:22', 1, '50c8c14f231d99fbed50ae01b5a27297e5e62cddaeb74d10736a880d814e'),
(45, 13, '3', 45, 65.00, '4NJ36245FU1879800', '9fee65ccb45f996d2626ac445cfe3a8ad63fd0afddd09e3842886b8231e7', '4NJ36245FU1879800', NULL, '2021-11-29 21:46:53', '2021-11-29 21:46:53', 1, 'b0bbc9f70303dc686ed467f8f1fc34a27c7de9aefcc57013195a5c673a9c'),
(46, 13, '3', 46, 65.00, '2KS576609P235003P', '8e676fb960ad719836eaef444e9c643dbbc7feb656ff008c755b01d77345', '2KS576609P235003P', NULL, '2021-11-29 21:46:54', '2021-11-29 21:46:54', 1, '52c1236ddb3cae0f51625032abb331af51faf9a014c6360323c6c97a7270'),
(47, 13, '3', 47, 65.00, '08516581Y6586092H', '12b37f821fa5cdca928d73927afdfa0411fc144354131e2caa1acac22183', '08516581Y6586092H', NULL, '2021-11-29 21:47:03', '2021-11-29 21:47:03', 1, '935e537d5739b0e8432d7fcf17a110b2439ee98b914a1047145cdfc7bc2c'),
(48, 13, '3', 48, 65.00, '93L55612KG8665211', 'e5e8f13bd3e51d5305c2286d5763f92604413944253e9a2f0c488c525792', '93L55612KG8665211', NULL, '2021-11-29 21:47:03', '2021-11-29 21:47:03', 1, '8f99fdd0b958452adf85d903896971e6c9131c43dff864706b1e879ca85b'),
(49, 13, '3', 49, 65.00, '12M95184XF885714Y', 'aa56315f77e928bb4bc8ed26807bfe34c3e7f0ca17c7164add5f1fe1d68a', '12M95184XF885714Y', NULL, '2021-11-29 21:47:04', '2021-11-29 21:47:04', 1, '6130b1d1ea44e38af5d533db3a8a2a7c6ebd4d44a3804024e6b37820f342'),
(50, 21, '3', 50, 65.00, '40cb5da5-ff07-071c-7b5b-422093595e09', '6dadd7615333796c6e91445e538fed14577c8dd2c252414ac6194d41f719', '1d2944d914dca6d3603d', NULL, '2022-01-12 08:57:31', '2022-01-12 08:57:31', 1, 'c58ef7970b3cf8a1b8a98ca018a12c611cb15f270f7fb65b3c61067fd69c'),
(51, 21, '3', 51, 65.00, '74f1cb0b-e93c-0be4-6633-529de7d15c7d', '30cfffb12d4cd644bb3e23c72fc086e86004e06ea3c02cf9f9e3858de7bf', 'ecf904f242ee03bb5cde', NULL, '2022-01-28 06:24:25', '2022-01-28 06:24:25', 1, 'a7912cbc99d9d10f32215521bf03784b543982dfbe45c60b1648edcb4b11'),
(52, 21, 'course_id', 0, 0.00, 'a651eee8-1c9e-072c-6144-0f633874d6f1', '67cde45ca95cf444109c4e19f81fe33040c5fb74bb37aeea70920a44742f', '754ee1c940454b20392d', 'Abu Dhabi', '2022-01-31 09:10:21', '2022-01-31 09:10:21', 1, '31e3d01edf00d95636500e1d62f5e2de88312a47cde5a9bcbaaf748e6f6b'),
(53, 21, 'course_id', 0, 0.00, 'a651eee8-1c9e-072c-6144-0f633874d6f1', 'd04a7c7de2f6c41f84b453a8fe86e509fed2f66b3dce44a20081d3d99388', 'af45467302768f90aede', 'Abu Dhabi', '2022-01-31 09:11:30', '2022-01-31 09:11:30', 1, '1109057444e2eab694ca872014d2c9bcd91557c78926e70a4553f93e287d'),
(54, 21, 'course_id', 0, 0.00, 'a651eee8-1c9e-072c-6144-0f633874d6f1', '4615ce90251f9c19b2a48c27faa81505e100563153ef724c220bb2ef6e07', '573401e6ed05ad58c50b', 'Abu Dhabi', '2022-01-31 09:12:50', '2022-01-31 09:12:50', 1, 'eba3db5b93d45d67e8aef3b724abae16c82edadbe1356226a2fdb1c7878f'),
(55, 21, 'course_id', 52, 0.00, 'a651eee8-1c9e-072c-6144-0f633874d6f1', 'd358462ca155991625fdc1a8fde07b46a3d4d88e9592fe7c9bc5d7fa954d', '88868b28dee7e58dcf35', 'Abu Dhabi', '2022-01-31 09:16:49', '2022-01-31 09:16:49', 1, '4a661588dc5738238584d53c397e4e6668d04c9553797a47373e1c977729'),
(56, 21, 'course_id', 53, 0.00, 'a651eee8-1c9e-072c-6144-0f633874d6f1', 'd6335e7ff206684fdc7d11053ffe4f374946f26b2dad983e1883f0f9ca83', '2ed5db173b2c1f17d872', 'Abu Dhabi', '2022-01-31 09:19:37', '2022-01-31 09:19:37', 1, '4b8d908b875b14461b52d8e0c4278db511bc188499ac4ab9c93c1894c4e4'),
(57, 21, 'course_id', 54, 0.00, 'a651eee8-1c9e-072c-6144-0f633874d6f1', '86dc208b962be1c95cb2caa4644823c2e66a6f37a674a5f675c42d0898c4', '8079015e505fab62812e', 'Abu Dhabi', '2022-03-24 12:12:22', '2022-03-24 12:12:22', 1, 'a3164093be0c55f10eb5ddfc34e84ee5e0980282fe3a6fbedf6d500ce497'),
(58, 29, '5', 55, 50.00, '06F11889FU080160G', '6884a28593df0e798b49af157fcbcdf7a86a91575f5039da2e7efbdfdac2', '06F11889FU080160G', NULL, '2022-04-22 13:18:25', '2022-04-22 20:18:25', 1, 'dbbcda4352b621a1c68926bc583b048a1a136ea01fe58d578c6073224419');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdfs`
--

CREATE TABLE `tbl_pdfs` (
  `id` bigint(20) NOT NULL,
  `gig_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `main` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pdfs`
--

INSERT INTO `tbl_pdfs` (`id`, `gig_id`, `name`, `created_at`, `updated_at`, `status`, `main`) VALUES
(1, 1, '69b57_Untitled_Document.pdf', '2018-09-04 09:09:40', '0000-00-00 00:00:00', 1, 0),
(3, 1, '1f380_5bf8b_6b4384722d995c6ebdc55c7af9e45b5e.jpg', '2018-09-04 09:09:43', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgmlangs`
--

CREATE TABLE `tbl_pgmlangs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pgmlangs`
--

INSERT INTO `tbl_pgmlangs` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'java', '2021-02-05 10:09:46', '2021-02-05 10:09:46', 0),
(2, 'react', '2021-02-05 10:16:24', '2021-02-05 10:10:12', 0),
(3, 'c#', '2021-02-05 10:16:32', '2021-02-05 10:10:12', 0),
(4, 'aws', '2021-02-05 10:16:43', '2021-02-05 10:11:12', 0),
(5, 'python', '2021-02-05 10:16:57', '2021-02-05 10:11:12', 0),
(6, 'sql', '2021-02-05 10:17:04', '2021-02-05 10:17:04', 0),
(7, 'php', '2021-02-05 10:17:39', '0000-00-00 00:00:00', 0),
(8, 'unity', '2021-02-05 10:17:51', '0000-00-00 00:00:00', 0),
(9, 'javascript', '2021-02-05 10:18:20', '0000-00-00 00:00:00', 0),
(10, 'wordpress', '2021-02-05 10:18:20', '0000-00-00 00:00:00', 0),
(11, 'photoshop', '2021-02-05 10:18:44', '0000-00-00 00:00:00', 0),
(12, 'excel', '2021-02-05 10:18:44', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualifications`
--

CREATE TABLE `tbl_qualifications` (
  `id` int(3) NOT NULL,
  `name` varchar(44) DEFAULT NULL,
  `slug` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_qualifications`
--

INSERT INTO `tbl_qualifications` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'B.E.', 'be', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(2, 'B.A.', 'b.a.', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(3, 'B.Sc.', 'b.sc.', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(4, 'B.Arch.', 'barch', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(5, 'M.A.', 'm.a.', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(6, 'M.Sc.', 'm.sc.', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(7, 'M.D.', 'm.d.', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(8, 'Ph.D', 'ph.d', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(9, 'LLB', 'llb', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(10, 'LLM', 'llm', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25'),
(11, 'Police clearance', 'police-clearance', 0, '2020-05-25 14:38:25', '2020-05-25 14:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int(11) NOT NULL,
  `as_a` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `otheruser_id` int(11) DEFAULT NULL,
  `rating` float(3,1) DEFAULT NULL,
  `comment` text,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `servicesoffer_id` int(11) NOT NULL,
  `myorder_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `as_a`, `user_id`, `otheruser_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`, `slug`, `course_id`, `servicesoffer_id`, `myorder_id`) VALUES
(8, 'seller', 1, 12, 4.0, 'best', 1, '2020-12-22 06:47:31', '2020-12-22 06:47:31', '822fc370e1257acee2e7', 6, 0, NULL),
(9, 'seller', 1, 12, 4.0, 'best', 1, '2020-12-22 06:47:51', '2020-12-22 06:47:51', '21b6ff79e255db881dbf', 3, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_savedcourses`
--

CREATE TABLE `tbl_savedcourses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_ids` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_savedcourses`
--

INSERT INTO `tbl_savedcourses` (`id`, `user_id`, `course_ids`, `created_at`, `updated_at`) VALUES
(19, 1, '9', '2021-03-26 05:07:37', '2020-10-21 13:33:02'),
(20, 5, '3', '2020-11-03 11:35:40', '2020-11-03 11:35:31'),
(21, 8, '', '2021-06-10 10:47:28', '2020-11-06 06:54:55'),
(22, 16, '', '2021-08-12 07:37:31', '2020-12-16 12:46:33'),
(23, 21, '3', '2022-01-28 06:25:05', '2021-03-04 10:24:35'),
(24, 23, '5', '2021-03-06 09:06:01', '2021-03-06 09:06:01'),
(25, 26, '3', '2021-03-12 12:23:43', '2021-03-11 13:07:50'),
(26, 27, '4', '2021-03-16 16:34:00', '2021-03-16 16:34:00'),
(27, 13, '', '2021-04-04 13:31:39', '2021-03-24 10:58:42'),
(28, 14, '', '2021-03-24 12:30:35', '2021-03-24 12:30:32'),
(29, 36, '', '2021-07-26 09:37:01', '2021-06-26 04:56:48'),
(30, 40, '3', '2021-07-07 09:26:12', '2021-07-07 09:26:12'),
(31, 29, '', '2022-04-22 13:22:53', '2021-07-08 08:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicemessages`
--

CREATE TABLE `tbl_servicemessages` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `servicesoffer_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `time` bigint(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servicemessages`
--

INSERT INTO `tbl_servicemessages` (`id`, `service_id`, `servicesoffer_id`, `sender_id`, `receiver_id`, `message`, `attachment`, `status`, `created_at`, `updated_at`, `slug`, `time`) VALUES
(5, 4, 2, 3, 4, 'hi', '', 0, '2018-12-14 02:22:35', '2018-12-14 02:22:35', '434154477395568', 1544773955),
(6, 4, 2, 4, 3, 'hi', '', 0, '2018-12-14 02:30:22', '2018-12-14 02:30:22', '443154477442231', 1544774422),
(7, 4, 2, 4, 3, 'hello', '', 0, '2018-12-14 02:31:02', '2018-12-14 02:31:02', '443154477446262', 1544774462),
(8, 4, 2, 3, 4, 'test', '', 0, '2018-12-14 02:31:07', '2018-12-14 02:31:07', '434154477446782', 1544774467);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `day` int(10) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `attachment` varchar(150) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `serviceoffer_slug` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `is_completed` int(2) NOT NULL DEFAULT '0',
  `pay_type` varchar(20) DEFAULT NULL,
  `payment_status` int(2) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `user_id`, `title`, `description`, `category_id`, `subcategory_id`, `day`, `price`, `attachment`, `status`, `slug`, `created_at`, `updated_at`, `serviceoffer_slug`, `is_completed`, `pay_type`, `payment_status`) VALUES
(1, 4, 'Classified Craigslist ad posting experts urgently needed', 'Classified Craigslist ad posting experts needed Urgently Am in need of the services of a classified ad poster on Craigslist. Health and Beauty sections for our company product advertisement. Poster should have all working tools. Poster should have experiences in Craigslist ads posting. Am willing to pay whatever it takes as long as i get good services rendered. If interested Kindly contact me via Skype at moneyorder4', 6, 61, 3, 50, '474c2ecd_ppp.jpg', 1, 'classified-craigslist-ad-posting-experts-urgently-needed', '2018-09-28 04:15:47', '2018-09-28 04:15:47', NULL, 0, NULL, 0),
(2, 4, 'I need Drupal developer', 'A PHP developer is responsible for writing server-side web application logic. PHP developers usually develop back-end components, connect the application with the other (often third-party) web services, and support the front-end developers by integrating their work with the application. Drupal developer with strong back-and front-end experience.', 6, 53, 4, 20, NULL, 1, 'i-need-drupal-developer', '2018-09-28 04:17:41', '2018-09-28 04:17:41', NULL, 0, NULL, 0),
(6, 4, 'Need graphic presentation', 'Graphic Presentation. BIBLIOGRAPHY. Graphic presentation represents a highly developed body of techniques for elucidating, interpreting, and analyzing numerical facts by means of points, lines, areas, and other geometric forms and symbols.', 3, 33, 2, NULL, '79a710d4_Screenshot 2018-11-20 at 12.20.14 PM.png', 1, 'need-graphic-presentation', '2018-11-21 04:15:17', '2018-11-21 04:15:17', NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicesoffers`
--

CREATE TABLE `tbl_servicesoffers` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_user_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(15) DEFAULT NULL,
  `deliver_in` int(5) DEFAULT NULL,
  `revisions` int(5) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  `total_amount` float(12,2) DEFAULT NULL,
  `admin_amount` float(12,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servicesoffers`
--

INSERT INTO `tbl_servicesoffers` (`id`, `service_id`, `service_user_id`, `user_id`, `amount`, `deliver_in`, `revisions`, `message`, `created_at`, `updated_at`, `status`, `slug`, `time`, `total_amount`, `admin_amount`) VALUES
(3, 6, 4, 3, 23, 5, 4, 'offer test', '2020-04-25 22:51:01', '2020-04-25 22:51:01', 2, 'ce71ded5987ce6580b632bf74d8fc70cc6be21c7c8bcc79a40', 1542793610, NULL, NULL),
(6, 1, 4, 3, 56, 56, 5, '546456', '2018-12-13 04:35:10', '2018-12-13 04:35:10', 0, '01bb4cedc6490cb869c02cb2d3e46f77838490aab6405444ea', 1544692670, NULL, NULL),
(10, 2, 4, 3, 23, 6, 2, 'Good', '2020-06-26 17:28:07', '2020-06-26 17:28:07', 0, '77f6a8441ac92d55c18d122521ac9301402c285896f25a0b7d', 1544783424, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(2) NOT NULL,
  `site_title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `tag_line` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `address` text NOT NULL,
  `facebook_link` varchar(200) DEFAULT NULL,
  `twitter_link` varchar(200) DEFAULT NULL,
  `google_link` varchar(200) DEFAULT NULL,
  `instagram_link` varchar(200) DEFAULT NULL,
  `linkedin_link` varchar(200) DEFAULT NULL,
  `pinterest_link` varchar(200) DEFAULT NULL,
  `youtube_link` varchar(50) DEFAULT NULL,
  `home_logo` varchar(255) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `payment_mode` int(2) DEFAULT '0',
  `paypal_email_address` varchar(50) DEFAULT NULL,
  `api_username` varchar(255) DEFAULT NULL,
  `api_password` varchar(255) DEFAULT NULL,
  `api_signature` varchar(255) DEFAULT NULL,
  `admin_commission` float(7,2) NOT NULL,
  `commission_admin` float(12,2) DEFAULT NULL,
  `final_commission` float(12,2) NOT NULL DEFAULT '0.00',
  `minimum_withdraw_amount` float(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nextupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `site_title`, `tag_line`, `company_name`, `contact_number`, `contact_email`, `address`, `facebook_link`, `twitter_link`, `google_link`, `instagram_link`, `linkedin_link`, `pinterest_link`, `youtube_link`, `home_logo`, `logo`, `favicon`, `payment_mode`, `paypal_email_address`, `api_username`, `api_password`, `api_signature`, `admin_commission`, `commission_admin`, `final_commission`, `minimum_withdraw_amount`, `created_at`, `updated_at`, `nextupdate`) VALUES
(1, 'Course Units', NULL, 'Course Units', '9876543210', 'info@courseunits.com', 'Box 861 00100 Narok, kenya 00100', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.instagram.com/', 'https://www.linkedin.com', NULL, NULL, 'logo.png', 'logo.png', 'favicon.ico', 1, 'mnyambega@gmail.com', 'mnyambega_api1.gmail.com', 'EHSQSE7CSXKLGKW4', 'At7M.vjpvoOSoEuUejMvbAJc494kADLPbogfbm30Zl1sZR0hd7Yy1enL', 10.00, 18.00, 28.00, 10.00, '2020-07-13 10:41:20', '2022-04-28 13:53:13', '2020-08-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`id`, `name`, `user_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Java', 0, 'java', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(2, '3D Max', 0, '3d-max', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(3, 'IOS', 0, 'ios', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(4, 'AngularJS', 0, 'angularJS', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(5, 'Automotive Repair', 0, 'automotive-repair', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(6, 'Computer Programming', 0, 'computer-programming', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(7, 'Pharmacy', 0, 'Pharmacy', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(8, 'Nodejs', 0, 'nodejs', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(9, 'SAP HR', 0, 'sap-hr', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(10, 'Magento', 0, 'magento', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(11, 'SAP MM', 0, 'sap-mm', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(12, 'SAP SD', 0, 'sap-sd', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(13, 'Codeigniter', 0, 'codeigniter', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(14, 'SAP Security', 0, 'sap-security', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(15, '.Net', 0, 'net', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(16, 'Banking', 0, 'banking', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(17, 'Biotechnology', 0, 'biotechnology', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(18, 'Teaching', 0, 'teaching', 1, '2018-08-22 07:25:27', '2018-08-22 01:55:27'),
(19, 'Finance', 0, 'finance', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(20, 'Nursing', 0, 'nursing', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(21, 'Animation', 0, 'animation', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(22, 'Accounts', 0, 'accounts', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(23, 'Graphic Design', 0, 'graphic-design', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(24, 'Journalism', 0, 'journalism', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(25, 'Writing', 0, 'writing', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(26, 'Photography', 0, 'photography', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(27, 'Advertising', 0, 'advertising', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(28, 'Interior Design', 0, 'interior-design', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(29, 'Architecture', 0, 'architecture', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(30, 'Education', 0, 'education', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(31, 'Visual Merchandising', 0, 'visual-merchandising', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(32, 'Manufacturing', 0, 'manufacturing', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(33, 'SAP Basis', 0, 'sap-basis', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(34, 'SAS', 0, 'sas', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(35, 'CISCO', 0, 'cisco', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(36, 'Dataentry', 0, 'dataentry', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(37, 'VLSI', 0, 'vlsi', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(38, 'Web Designing', 0, 'web-designing', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(39, 'Informatica', 0, 'informatica', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(40, 'Linux', 0, 'linux', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(41, 'Plc', 0, 'plc', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(42, 'ASP.NET', 0, 'asp-net', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(43, 'Datastage', 0, 'datastage', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(44, 'Finacle', 0, 'finacle', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(45, 'SAP CRM', 0, 'sap-crm', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(46, 'Tally', 0, 'tally', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(47, 'Tibco', 0, 'tibco', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(48, 'CATIA', 0, 'catia', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(49, 'Cognos', 0, 'cognos', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(50, 'ITIL', 0, 'itil', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(51, 'Multimedia', 0, 'multimedia', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(52, 'Photoshop', 0, 'photoshop', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(53, 'PRO E', 0, 'pro-e', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(54, 'Backend', 0, 'backend', 1, '2018-08-22 07:25:28', '2018-08-22 01:55:28'),
(55, 'DTP', 0, 'dtp', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(56, 'ERP', 0, 'erp', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(57, 'Siebel', 0, 'siebel', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(58, 'Video Editing', 0, 'video-editing', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(59, 'AbInitio', 0, 'abinitio', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(60, 'CAD/CAM', 0, 'cad-cam', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(61, 'Digital Marketing', 0, 'digital-marketing', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(62, 'Editing', 0, 'editing', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(63, 'Back Office', 0, 'back-office', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(64, 'Online Marketing', 0, 'online-marketing', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(65, 'Manual Testing', 0, 'manual-testing', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(66, 'CCIE', 0, 'ccie', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(67, 'PeopleSoft', 0, 'peoplesoft', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(68, 'Oracle Apps', 0, 'oracle-apps', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(69, 'Perl', 0, 'perl', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(70, 'Python', 0, 'python', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(71, 'SAP PP', 0, 'sap-pp', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(72, 'SAP PS', 0, 'sap-ps', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(73, 'SQL Server', 0, 'sql-server', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(74, 'Database', 0, 'database', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(75, 'MCSE', 0, 'mcse', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(76, 'PPC', 0, 'ppc', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(77, 'QTP', 0, 'qtp', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(78, 'SAP PM', 0, 'sap-pm', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(79, 'Teradata', 0, 'teradata', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(80, 'CRM', 0, 'crm', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(81, 'Data Warehousing', 0, 'data-warehousing', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(82, 'Flexcube', 0, 'flexcube', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(83, 'MATLAB', 0, 'matlab', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(84, 'PowerBuilder', 0, 'powerbuilder', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(85, 'SAP BW', 0, 'sap-bw', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(86, 'Solaris', 0, 'solaris', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(87, 'AIX', 0, 'aix', 1, '2018-08-22 07:25:29', '2018-08-22 01:55:29'),
(88, 'ArchiCAD', 0, 'archicad', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(89, 'Business Objects', 0, 'business-objects', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(90, 'Documentum', 0, 'documentum', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(91, 'FACT', 0, 'fact', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(92, 'Hyperion', 0, 'hyperion', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(93, 'SCADA', 0, 'scada', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(94, 'UniGraphics', 0, 'unigraphics', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(95, 'Unix', 0, 'unix', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(96, 'Vision Plu', 0, 'vision-plu', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(97, 'VSAT', 0, 'vsat', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(98, 'WebMethods', 0, 'webmethods', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(99, 'Auto CAD', 0, 'auto-cad', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(100, 'Datawarehousing', 0, 'datawarehousing', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(101, 'Flash', 0, 'flash', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(102, 'Lotus Notes', 0, 'lotus-notes', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(103, 'Automation Testing', 0, 'automation-testing', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(104, 'Delphi', 0, 'delphi', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(105, 'J2EE', 0, 'j2ee', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(106, 'MySQL', 0, 'mysql', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(107, 'RedHat', 0, 'redhat', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(108, 'SAP EP', 0, 'sap-ep', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(109, 'SAP SRM', 0, 'sap-srm', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(110, 'TPF', 0, 'tpf', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(111, 'VB.NET', 0, 'vb-net', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(112, 'VOIP', 0, 'voip', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(113, 'WebLogic', 0, 'weblogic', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(114, 'WebSphere', 0, 'websphere', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(115, 'Active Directory', 0, 'active-directory', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(116, 'Ansys', 0, 'ansys', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(117, 'Data Analysis', 0, 'data-analysis', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(118, 'Documentation', 0, 'documentation', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(119, 'DSP', 0, 'dsp', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(120, 'IMS', 0, 'ims', 1, '2018-08-22 07:25:30', '2018-08-22 01:55:30'),
(121, 'Remedy', 0, 'remedy', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(122, 'SAP QM', 0, 'sap-qm', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(123, 'SPSS', 0, 'spss', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(124, 'Sybase', 0, 'sybase', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(125, 'TLM', 0, 'tlm', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(126, 'ASIC', 0, 'asic', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(127, 'Blackberry', 0, 'blackberry', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(128, 'Corel Draw', 0, 'corel-draw', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(129, 'CSS', 0, 'css', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(130, 'DB2', 0, 'db2', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(131, 'Embedded C', 0, 'embedded-c', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(132, 'FileNet', 0, 'filenet', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(133, 'FoxPro', 0, 'foxpro', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(134, 'FPGA', 0, 'fpga', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(135, 'J2ME', 0, 'j2me', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(136, 'MCSA', 0, 'mcsa', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(137, 'Murex', 0, 'murex', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(138, 'SAP XI', 0, 'sap-xi', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(139, 'WPF', 0, 'wpf', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(140, 'DCA', 0, 'dca', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(141, 'Distribution', 0, 'distribution', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(142, 'Natural Adabas', 0, 'natural-adabas', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(143, 'ORCAD', 0, 'orcad', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(144, 'Progress 4GL', 0, 'progress-4gl', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(145, 'SAP SCM', 0, 'sap-scm', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(146, 'Silverlight', 0, 'silverlight', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(147, 'Switching', 0, 'switching', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(148, 'Android Development', 0, 'android-development', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(149, 'Calypso', 0, 'calypso', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(150, 'GSM', 0, 'gsm', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(151, 'Load Runner', 0, 'load-runner', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(152, 'MCP', 0, 'mcp', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(153, 'MicroStation', 0, 'microstation', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(154, 'MSCIT', 0, 'mscit', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(155, 'Savvion', 0, 'savvion', 1, '2018-08-22 07:25:31', '2018-08-22 01:55:31'),
(156, 'Shell Scripting', 0, 'shell-scripting', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(157, 'Spring', 0, 'spring', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(158, 'Affiliate Marketing', 0, 'affiliate-marketing', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(159, 'Eclipse', 0, 'eclipse', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(160, 'Focus', 0, 'focus', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(161, 'ForTran', 0, 'fortran', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(162, 'HP UNIX', 0, 'hp-unix', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(163, 'JSF', 0, 'jsf', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(164, 'MFC', 0, 'mfc', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(165, 'SAP IS-Utilities', 0, 'sap-is-utilities', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(166, 'Verilog', 0, 'verilog', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(167, 'Visual Foxpro', 0, 'visual-foxpro', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(168, 'WCF', 0, 'wcf', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(169, 'Website Development', 0, 'website-development', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(170, 'Dreamweaver', 0, 'dreamweaver', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(171, 'IIS', 0, 'iis', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(172, 'JSP', 0, 'jsp', 1, '2018-08-22 07:25:32', '2018-08-22 01:55:32'),
(173, 'Nortel', 0, 'nortel', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(174, 'RDO', 0, 'rdo', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(175, 'ActiveX', 0, 'activex', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(176, 'AJAX', 0, 'ajax', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(177, 'ALE', 0, 'ale', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(178, 'Ant', 0, 'ant', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(179, 'Apache Commons', 0, 'apache-commons', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(180, 'Apache Tomcat', 0, 'apache-tomcat', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(181, 'Apache Web Server', 0, 'apache-web-server', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(182, 'AS 400', 0, 'as-400', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(183, 'Assembly Language', 0, 'assembly-language', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(184, 'ATL', 0, 'atl', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(185, 'AutoLISP', 0, 'autolisp', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(186, 'AWT', 0, 'awt', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(187, 'Bluetooth', 0, 'bluetooth', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(188, 'BPCS', 0, 'bpcs', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(189, 'BREW', 0, 'brew', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(190, 'CDMA', 0, 'cdma', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(191, 'Chordiant', 0, 'chordiant', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(192, 'CLDC', 0, 'cldc', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(193, 'Clipper', 0, 'clipper', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(194, 'COM/COM+/DCOM', 0, 'com-com-dcom', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(195, 'CORBA', 0, 'corba', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(196, 'Csharp', 0, 'csharp', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(197, 'Data Structures', 0, 'data-structures', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(198, 'Database Administration', 0, 'database-administration', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(199, 'Db4o', 0, 'db4o', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(200, 'DBase', 0, 'dbase', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(201, 'DCOM', 0, 'dcom', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(202, 'Derby', 0, 'derby', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(203, 'Developer/D2K', 0, 'developer-d2k', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(204, 'DHCP', 0, 'dhcp', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(205, 'DHTML', 0, 'dhtml', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(206, 'DNS', 0, 'dns', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(207, 'DOS', 0, 'dos', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(208, 'Downstream', 0, 'downstream', 1, '2018-08-22 07:25:33', '2018-08-22 01:55:33'),
(209, 'EJB', 0, 'ejb', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(210, 'Ethernet', 0, 'ethernet', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(211, 'Expeditor', 0, 'expeditor', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(212, 'Finone', 0, 'finone', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(213, 'Firewall', 0, 'firewall', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(214, 'Fireworks', 0, 'fireworks', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(215, 'FlashLite', 0, 'flashlite', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(216, 'FreeBSD', 0, 'freebsd', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(217, 'FTP', 0, 'ftp', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(218, 'GLOSS', 0, 'gloss', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(219, 'Hibernate', 0, 'hibernate', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(220, 'Humming Bird', 0, 'humming-bird', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(221, 'IBatis', 0, 'ibatis', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(222, 'Ideas', 0, 'ideas', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(223, 'ImageReady', 0, 'imageready', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(224, 'Impromptu', 0, 'impromptu', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(225, 'Informix', 0, 'informix', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(226, 'Ingres', 0, 'ingres', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(227, 'Installshield', 0, 'installshield', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(228, 'ISDN', 0, 'isdn', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(229, 'J2SE', 0, 'j2se', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(230, 'Java2D', 0, 'java2d', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(231, 'JavaCard', 0, 'javacard', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(232, 'JavaSE', 0, 'javase', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(233, 'JBoss', 0, 'jboss', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(234, 'JBoss Seam', 0, 'jboss-seam', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(235, 'JCL', 0, 'jcl', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(236, 'JDBC', 0, 'jdbc', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(237, 'JDOM', 0, 'jdom', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(238, 'JFace', 0, 'jface', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(239, 'Jini', 0, 'jini', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(240, 'JIRA', 0, 'jira', 1, '2018-08-22 07:25:34', '2018-08-22 01:55:34'),
(241, 'JMock', 0, 'jmock', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(242, 'JMS', 0, 'jms', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(243, 'JNI', 0, 'jni', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(244, 'JPA', 0, 'jpa', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(245, 'JSE', 0, 'jse', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(246, 'JUnit', 0, 'junit', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(247, 'Kickboxing', 0, 'kickboxing', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(248, 'KSH', 0, 'ksh', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(249, 'LAN', 0, 'lan', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(250, 'LINQ', 0, 'linq', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(251, 'Log4j', 0, 'log4j', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(252, 'Mac OS', 0, 'mac-os', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(253, 'Maven', 0, 'maven', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(254, 'MIDP', 0, 'midp', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(255, 'MIS Reports', 0, 'mis-reports', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(256, 'MOSS', 0, 'moss', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(257, 'Motif', 0, 'motif', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(258, 'MS DOS', 0, 'ms-dos', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(259, 'MS Project', 0, 'ms-project', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(260, 'MS SQL Server', 0, 'ms-sql-server', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(261, 'MS Visio', 0, 'ms-visio', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(262, 'Multithreading', 0, 'multithreading', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(263, 'MVS', 0, 'mvs', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(264, 'NetWeaver', 0, 'netweaver', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(265, 'Novell', 0, 'novell', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(266, 'ODBC', 0, 'odbc', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(267, 'Office Operations', 0, 'office-operations', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(268, 'OOPS', 0, 'oops', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(269, 'OpenGL ES', 0, 'opengl-es', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(270, 'Operating Systems', 0, 'operating-systems', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(271, 'Oracle WareHouse Builder', 0, 'oracle-warehouse-builder', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(272, 'PASCAL', 0, 'pascal', 1, '2018-08-22 07:25:35', '2018-08-22 01:55:35'),
(273, 'PL/SQL', 0, 'pl-sql', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(274, 'PL/1', 0, 'pl-1', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(275, 'PostgreSQL', 0, 'postgresql', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(276, 'PowerPlay', 0, 'powerplay', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(277, 'Pro*C', 0, 'pro-c', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(278, 'PVCS', 0, 'pvcs', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(279, 'Quality Assurance/QA', 0, 'quality-assurance-qa', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(280, 'Remoting', 0, 'remoting', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(281, 'REXX', 0, 'rexx', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(282, 'RichFaces', 0, 'richfaces', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(283, 'RMI', 0, 'rmi', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(284, 'Routing', 0, 'routing', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(285, 'RTOS', 0, 'rtos', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(286, 'S60', 0, 's60', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(287, 'SAP Bl', 0, 'sap-bl', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(288, 'SAP COPA', 0, 'sap-copa', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(289, 'SAP Idocs', 0, 'sap-idocs', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(290, 'SAP IS-GAS/OIL', 0, 'sap-is-gas-oil', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(291, 'SAP Practice', 0, 'sap-practice', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(292, 'SAP SEM', 0, 'sap-sem', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(293, 'SAP WMS', 0, 'sap-wms', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(294, 'Seam', 0, 'seam', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(295, 'Sharepoint Server', 0, 'sharepoint-server', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(296, 'SMARTY', 0, 'smarty', 1, '2018-08-22 07:25:36', '2018-08-22 01:55:36'),
(297, 'SMTP', 0, 'smtp', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(298, 'SoundForge', 0, 'soundforge', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(299, 'Struts', 0, 'struts', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(300, 'SunOS', 0, 'sunos', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(301, 'SWT', 0, 'swt', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(302, 'Symbian C++', 0, 'symbian-c', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(303, 'SyncML', 0, 'syncml', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(304, 'T SQL', 0, 't-sql', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(305, 'TCP/IP', 0, 'tcp-ip', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(306, 'TELNET', 0, 'telnet', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(307, 'TOAD', 0, 'toad', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(308, 'Turbo Pascal', 0, 'turbo-pascal', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(309, 'Tuxedo', 0, 'tuxedo', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(310, 'UIQ', 0, 'uiq', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(311, 'UML', 0, 'uml', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(312, 'Upstream', 0, 'upstream', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(313, 'Vignette', 0, 'vignette', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(314, 'Visual C++', 0, 'visual-c', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(315, 'Visual Interdev', 0, 'visual-interdev', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(316, 'VMS', 0, 'vms', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(317, 'VPN', 0, 'vpn', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(318, 'VSS/Clearcase', 0, 'vss-clearcase', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(319, 'VxWorks', 0, 'vxworks', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(320, 'WAN', 0, 'wan', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(321, 'WAP', 0, 'wap', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(322, 'Winform', 0, 'winform', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(323, 'Winrunner', 0, 'winrunner', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(324, 'WML', 0, 'wml', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(325, 'XDoclet', 0, 'xdoclet', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(326, 'Xenix', 0, 'xenix', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(327, 'XHTML', 0, 'xhtml', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(328, 'XStream', 0, 'xstream', 1, '2018-08-22 07:25:37', '2018-08-22 01:55:37'),
(329, 'Yantra', 0, 'yantra', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(330, 'Designing', 0, 'designing', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(331, 'SMO', 0, 'smo', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(332, 'VAX/VMS', 0, 'vax-vms', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(333, 'TCL/TK', 0, 'tcl-tk', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(334, 'OS/2', 0, 'os-2', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(335, 'SAP BI', 0, 'sap-bi', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(336, 'Sharepoint MOSS', 0, 'sharepoint-moss', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(337, 'Accounting', 0, 'accounting', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(338, 'Administration', 0, 'administration', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(339, 'Vendor Management', 0, 'vendor-management', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(340, 'Analysis', 0, 'analysis', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(341, 'Banking Insurance', 0, 'banking-insurance', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(342, 'Office Management', 0, 'office-management', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(343, 'Accounts Management', 0, 'accounts-management', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(344, 'Advertisement Sales', 0, 'advertisement-sales', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(345, 'Advertising Account Management', 0, 'advertising-account-management', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(346, 'Advertising Art Direction', 0, 'advertising-art-direction', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(347, 'Advisory', 0, 'advisory', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(348, 'Aquisitions', 0, 'aquisitions', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(349, 'Art Therapy', 0, 'art-therapy', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(350, 'Authoring', 0, 'authoring', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(351, 'Body Art', 0, 'body-art', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(352, 'Bookbinding', 0, 'bookbinding', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(353, 'Busines Analysis', 0, 'busines-analysis', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(354, 'Buying', 0, 'buying', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(355, 'Channel Account Management', 0, 'channel-account-management', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(356, 'Chartered Accountancy', 0, 'chartered-accountancy', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(357, 'Cloth Design', 0, 'cloth-design', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(358, 'Company Laws', 0, 'company-laws', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(359, 'Composing', 0, 'composing', 1, '2018-08-22 07:25:38', '2018-08-22 01:55:38'),
(360, 'Curating', 0, 'curating', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(361, 'Customer Relations', 0, 'customer-relations', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(362, 'Document Administration', 0, 'document-administration', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(363, 'Electrical Distribution', 0, 'electrical-distribution', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(364, 'Floristry', 0, 'floristry', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(365, 'Guest Service', 0, 'guest-service', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(366, 'Hairdressing', 0, 'hairdressing', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(367, 'Headhunting', 0, 'headhunting', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(368, 'Image Consulting', 0, 'image-consulting', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(369, 'Industrial Designing', 0, 'industrial-designing', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(370, 'Key Accounts Management', 0, 'key-accounts-management', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(371, 'Landscape Gardening', 0, 'landscape-gardening', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(372, 'Make Up Art', 0, 'make-up-art', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(373, 'Map Making', 0, 'map-making', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(374, 'Mathematical', 0, 'mathematical', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(375, 'Merchandise', 0, 'merchandise', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(376, 'Mergers', 0, 'mergers', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(377, 'Motivating Skill', 0, 'motivating-skill', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(378, 'Negotiating Skill', 0, 'negotiating-skill', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(379, 'Personal Services', 0, 'personal-services', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(380, 'Planning And Organising', 0, 'planning-and-organising', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(381, 'Private Tutoring', 0, 'private-tutoring', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(382, 'Producing', 0, 'producing', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(383, 'Record Producing', 0, 'record-producing', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(384, 'Sales Accounting', 0, 'sales-accounting', 1, '2018-08-22 07:25:39', '2018-08-22 01:55:39'),
(385, 'Sales Planning', 0, 'sales-planning', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(386, 'Store Planning', 0, 'store-planning', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(387, 'Supervising', 0, 'supervising', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(388, 'Tax Audits', 0, 'tax-audits', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(389, 'Tax Laws', 0, 'tax-laws', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(390, 'Instructing', 0, 'instructing', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(391, 'Telling', 0, 'telling', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(392, 'Therapy', 0, 'therapy', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(393, 'Trade Execution', 0, 'trade-execution', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(394, 'Upholstery', 0, 'upholstery', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(395, 'Vehicle Operating', 0, 'vehicle-operating', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(396, 'Visa Expat Management', 0, 'visa-expat-management', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(397, 'Wine Making', 0, 'wine-making', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(398, 'Adobe Photoshop', 0, 'adobe-photoshop', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(399, 'Maximo', 0, 'maximo', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(400, 'Primavera', 0, 'primavera', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(401, 'SAP IS-Retail', 0, 'sap-is-retail', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(402, 'Autosys', 0, 'autosys', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(403, 'COBOL', 0, 'cobol', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(404, 'ColdFusion', 0, 'coldfusion', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(405, 'Maya', 0, 'maya', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(406, 'Programming', 0, 'programming', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(407, 'RIM', 0, 'rim', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(408, 'SAP MDM   XML', 0, 'sap-mdm-xml', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(409, 'C#', 0, 'c', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(410, 'DSP   IMS', 0, 'dsp-ims', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(411, 'ASP', 0, 'asp', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(412, 'Visual Basic', 0, 'visual-basic', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(413, 'Microsoft Excel', 0, 'microsoft-excel', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(414, 'ADO', 0, 'ado', 1, '2018-08-22 07:25:40', '2018-08-22 01:55:40'),
(415, 'Adobe Illustrator', 0, 'adobe-illustrator', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(416, 'Adobe Pagemaker', 0, 'adobe-pagemaker', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(417, 'BASIC', 0, 'basic', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(418, 'BPEL', 0, 'bpel', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(419, 'CICS', 0, 'cics', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(420, 'CoreJava', 0, 'corejava', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(421, 'Crystal Report', 0, 'crystal-report', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(422, 'Ingres   Installshield', 0, 'ingres-installshield', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(423, 'J++', 0, 'j', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(424, 'JavaFX', 0, 'javafx', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(425, 'Microcontrollers', 0, 'microcontrollers', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(426, 'Microsoft Access', 0, 'microsoft-access', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(427, 'Microsoft Exchange', 0, 'microsoft-exchange', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(428, 'Microsoft Office', 0, 'microsoft-office', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(429, 'Installshield  . ISDN', 0, 'installshield-isdn', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(430, 'Cakephp', 0, 'cakephp-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(431, 'C++', 0, 'c-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(432, 'Drupal', 0, 'drupal-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(433, 'Testing', 0, 'testing-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(434, 'Dotnet', 0, 'dotnet-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(435, 'Wordpress', 0, 'wordpress-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(436, 'Joomla', 0, 'joomla-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(437, 'Qa', 0, 'qa-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(438, 'Bootstrap', 0, 'bootstrap', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(439, 'Ecommerce Developer', 0, 'ecommerce-developer', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(440, 'PSD To WordPress', 0, 'psd-to-wordpress', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(441, 'Social Media Marketing', 0, 'social-media-marketing', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(442, 'C# Programming', 0, 'c-programming', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(443, 'Copy Typing', 0, 'copy-typing', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(444, 'Logo', 0, 'logo', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(445, 'Website Design', 0, 'website-design', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(446, 'Ghostwriting', 0, '', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(447, 'Article Writing', 0, 'article-writing', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(448, 'Copywriting', 0, 'copywriting-1', 1, '2018-08-22 07:25:41', '2018-08-22 01:55:41'),
(449, 'PHP', 0, 'php-1', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(450, 'ECommerce', 0, 'ecommerce-1', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(451, 'Swift', 0, 'swift', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(452, 'Objective C', 0, 'objective-c', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(453, 'IPhone App Development', 0, 'iphone-app-development', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(454, 'Link Building', 0, 'link-building', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(455, 'SEO', 0, 'seo-1', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(456, 'On-Page SEO', 0, 'on-page-seo', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(457, 'Off-Page SEO', 0, 'off-page-seo', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(458, 'Logo Design', 0, 'logo-design', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(459, 'Photo Editing', 0, 'photo-editing', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(460, '3D Designer', 0, '3d-designer', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(461, 'Game Designer', 0, 'game-designer', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(462, 'Graphic Designer', 0, 'graphic-designer', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(463, 'Javascript', 0, 'javascript-1', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(464, 'Laravel', 0, 'laravel', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(465, 'Web Development', 0, 'web-development', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(466, 'E-commerce', 0, 'e-commerce', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(467, 'XML', 0, 'xml', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(468, 'Html', 0, 'html-1', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(469, 'Brochure Design', 0, 'brochure-design', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(470, 'Web Banners Design', 0, 'web-banners-design', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(471, 'Catalogues Design', 0, 'catalogues-design', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(472, 'E-book Cover Design', 0, 'e-book-cover-design', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(473, 'Graphics Designing', 0, 'graphics-designing', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(474, 'Online Chatting/Messaging App', 0, 'online-chatting-messaging-app', 1, '2018-08-22 07:25:42', '2018-08-22 01:55:42'),
(475, 'GoogleMap/GPS App', 0, 'googlemap-gps-app', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(476, 'Photo/camera/Video/Audio App', 0, 'photo-camera-video-audio-app', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(477, 'Web Service API(PHP /MySQL/ JSON/XML/...)', 0, 'web-service-api-php-mysql-json-xml', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(478, 'On Page Optimization', 0, 'on-page-optimization', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(479, 'SEO Audit', 0, 'seo-audit', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(480, 'Keyword Research', 0, 'keyword-research', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(481, 'Responsive Web Design', 0, 'responsive-web-design', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(482, 'Jquery', 0, 'jquery-2', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(483, 'Content', 0, 'content', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(484, 'Content Marketing', 0, 'content-marketing', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(485, 'UI Design', 0, 'ui-design', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(486, 'UX Design', 0, 'ux-design', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(487, 'Cinema 4d', 0, 'cinema-4d', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(488, 'Software Development', 0, 'software-development', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(489, 'API Integration', 0, 'api-integration', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(490, 'CORE PHP', 0, 'core-php', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(491, 'HTML5', 0, 'html5', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(492, 'Woocommerce', 0, 'woocommerce', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(493, 'Yii', 0, 'yii', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(494, 'App Development', 0, 'app-development', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(495, 'Mobile Apps', 0, 'mobile-apps', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(496, 'Atom', 0, 'atom', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(497, 'ANDROID SDK', 0, 'android-sdk', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(498, 'GOOGLE MAP MAKER', 0, 'google-map-maker', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(499, 'GOOGLE MAPS API', 0, 'google-maps-api', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(500, 'Writer', 0, 'writer', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(501, 'Editor', 0, 'editor', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(502, 'Sports Writing', 0, 'sports-writing', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(503, 'Creative Writing', 0, 'creative-writing', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(504, 'Sales Writing', 0, 'sales-writing', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(505, 'Mobile App', 0, 'mobile-app', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(506, 'Android App Development', 0, 'android-app-development', 1, '2018-08-22 07:25:43', '2018-08-22 01:55:43'),
(507, 'Ios App Development', 0, 'ios-app-development', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(508, 'CSS3', 0, 'css3', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(509, 'PSD To Html', 0, 'psd-to-html', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(510, 'Autodesk Maya', 0, 'autodesk-maya', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(511, 'Email Handling', 0, 'email-handling', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(512, 'Virtal Assistant', 0, 'virtal-assistant', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(513, 'Internet Research', 0, 'internet-research', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(514, 'Lead Generation', 0, 'lead-generation', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(515, 'Blog Writing', 0, 'blog-writing', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(516, 'SEO Writing', 0, 'seo-writing', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(517, 'Speech Writing', 0, 'speech-writing', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(518, 'SEM', 0, 'sem', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(519, 'Mobile App Developers', 0, 'mobile-app-developers', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(521, 'App Developers', 0, 'app-developers', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(522, 'Front End Developer', 0, 'front-end-developer', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(523, 'Website', 0, 'website', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(524, 'React', 0, 'react', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(525, 'App Developer', 0, 'app-developer', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(526, 'Mobile App Development', 0, 'mobile-app-development', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(527, 'Hybrid', 0, 'hybrid', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(528, 'Iphone Development', 0, 'iphone-development', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(529, 'Mobile Development', 0, 'mobile-development', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(530, 'Unity3d', 0, 'unity3d', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(531, 'IOS Development', 0, 'ios-development', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(532, 'Unity 3d Development', 0, 'unity-3d-development', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(533, 'Logo Designing', 0, 'logo-designing', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(534, 'Packaging Design', 0, 'packaging-design', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(535, 'Branding', 0, 'branding', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(536, 'Digital Photography', 0, 'digital-photography', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(537, 'Product Development', 0, 'product-development', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(538, 'IPhone', 0, 'iphone', 1, '2018-08-22 07:25:44', '2018-08-22 01:55:44'),
(539, 'React Js', 0, 'react-js', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(541, 'Ipad', 0, 'ipad', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(542, 'Mobile App Dvelopment', 0, 'mobile-app-dvelopment', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(543, 'IOS Apps', 0, 'ios-apps', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(544, 'Shopping Carts', 0, 'shopping-carts', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(545, 'Shopify', 0, 'shopify', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(546, 'Android', 0, 'android', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(547, 'Google Map', 0, 'google-map', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(548, 'Banner Design', 0, 'banner-design', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(549, 'Illustrator', 0, 'illustrator', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(550, 'Mobile Application', 0, 'mobile-application', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(551, 'Hybrid App Development', 0, 'hybrid-app-development', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(552, 'Hybrid App', 0, 'hybrid-app', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(553, 'Legal', 0, 'legal', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(554, 'Business', 0, 'business', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(555, 'Bulk Marketing', 0, 'bulk-marketing', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(556, 'Email Marketing', 0, 'email-marketing', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(557, 'Internet Marketing', 0, 'internet-marketing', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(558, 'Marketing', 0, 'marketing', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(559, 'Sales', 0, 'sales', 1, '2018-08-22 07:25:45', '2018-08-22 01:55:45'),
(560, 'Bookkeeping', 0, 'bookkeeping', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(561, 'Financial Analysis', 0, 'financial-analysis', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(562, 'Financial Reporting', 0, 'financial-reporting', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(563, 'Software', 0, 'software', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(564, '3D Animation', 0, '3d-animation', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(565, '3D Modelling', 0, '3d-modelling', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(566, 'Unity 3D', 0, 'unity-3d', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(567, 'Game Development', 0, 'game-development', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(568, 'Creative Designer', 0, 'creative-designer', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(569, 'Motion Graphics', 0, 'motion-graphics', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(570, 'Mobile Application Development', 0, 'mobile-application-development', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(571, 'Application Developer', 0, 'application-developer', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(572, 'Mobile App Developer', 0, 'mobile-app-developer', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(573, 'Software Architecture', 0, 'software-architecture', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(574, 'Prestashop', 0, 'prestashop', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(575, '2D/3D Design', 0, '2d-3d-design', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(576, 'App Design', 0, 'app-design', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(577, 'Java Script', 0, 'java-script', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(578, 'FACEBOOK ADS', 0, 'facebook-ads', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(579, 'Templates', 0, 'templates', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(580, 'Content Writing', 0, 'content-writing', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(581, 'Technical Writing', 0, 'technical-writing', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(582, 'App Designer', 0, 'app-designer', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(583, 'Coral Draw', 0, 'coral-draw', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(584, 'Xcode', 0, 'xcode', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(585, 'Graphics Designer', 0, 'graphics-designer', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(586, 'Logos', 0, 'logos', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(587, 'Business Card', 0, 'business-card', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(588, 'Design Templates', 0, 'design-templates', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(589, 'Color Correction', 0, 'color-correction', 1, '2018-08-22 07:25:46', '2018-08-22 01:55:46'),
(590, 'Excel', 0, 'excel', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(591, 'Power Point Presentation', 0, 'power-point-presentation', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(592, 'Publishing', 0, 'publishing', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(593, 'Proofreading', 0, 'proofreading', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47');
INSERT INTO `tbl_skills` (`id`, `name`, `user_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(594, 'Mobile App Develoment', 0, 'mobile-app-develoment', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(595, 'Software Testing', 0, 'software-testing', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(596, 'Web Hosting', 0, 'web-hosting', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(597, 'Web Service', 0, 'web-service', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(598, 'Mobile App Development Company', 0, 'mobile-app-development-company', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(599, 'Database Management', 0, 'database-management', 1, '2018-08-22 07:25:47', '2018-08-22 01:55:47'),
(600, 'cdsc', 3, 'cdsc', 0, '2020-04-12 09:12:48', '0000-00-00 00:00:00'),
(601, 'dsc', 3, 'dsc', 0, '2020-04-12 09:12:48', '0000-00-00 00:00:00'),
(602, 'ssss', 3, 'ssss', 0, '2020-04-12 09:12:48', '0000-00-00 00:00:00'),
(603, 'translation', 3, 'translation', 1, '2020-05-12 21:51:22', '2020-05-12 21:51:22'),
(604, 'Jon', 3, 'ben', 1, '2020-06-04 12:17:34', '2020-06-04 12:17:34'),
(605, '123', 3, '123', 0, '2020-06-15 09:45:23', '0000-00-00 00:00:00'),
(606, '34', 3, '34', 0, '2020-06-15 09:45:23', '0000-00-00 00:00:00'),
(607, '23423', 3, '23423', 0, '2020-06-15 09:45:23', '0000-00-00 00:00:00'),
(608, 'tag fff', 3, 'tag-fff', 0, '2020-07-05 15:26:19', '0000-00-00 00:00:00'),
(609, 'ggggggg', 3, 'ggggggg', 0, '2020-07-05 15:26:19', '0000-00-00 00:00:00'),
(610, 'jjjjjjjjjj', 3, 'jjjjjjjjjj', 0, '2020-07-05 15:26:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `country_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Arkansas', 'maharashtra', 1, '2020-05-06 12:08:34', '2020-07-04 03:38:41'),
(2, 2, 'Arizona', 'gujrat-945f3f6f52a7', 1, '2020-05-06 07:05:03', '2020-07-04 03:38:12'),
(4, 2, 'Alaska', 'punjab', 1, '2020-05-07 11:38:45', '2020-07-04 03:37:49'),
(5, 2, 'Alabama', 'adsfas', 1, '2020-05-07 11:38:45', '2020-07-04 03:37:28'),
(6, 2, 'California', 'california', 1, '2020-07-04 03:39:13', '2020-07-04 03:39:13'),
(7, 2, 'Colorado', 'colorado', 1, '2020-07-04 03:39:49', '2020-07-04 03:39:49'),
(8, 2, 'Conneticut', 'conneticut', 1, '2020-07-04 03:40:21', '2020-07-04 03:40:21'),
(9, 2, 'Delaware', 'delaware', 1, '2020-07-04 03:40:49', '2020-07-04 03:40:49'),
(14, 2, 'Florida', 'florida', 1, '2020-07-04 04:33:14', '2020-07-04 04:33:14'),
(15, 2, 'Georgia', 'georgia', 1, '2020-07-04 04:35:55', '2020-07-04 04:35:55'),
(16, 2, 'Hawaii', 'hawaii', 1, '2020-07-04 04:38:28', '2020-07-04 04:38:28'),
(17, 2, 'Idaho', 'idaho', 1, '2020-07-04 04:43:48', '2020-07-04 04:43:48'),
(18, 2, 'Illinois', 'illinois', 1, '2020-07-04 04:46:27', '2020-07-04 04:46:27'),
(19, 2, 'Indiana', 'indiana', 1, '2020-07-05 13:38:54', '2020-07-05 13:38:54'),
(20, 2, 'Iowa', 'iowa', 1, '2020-07-05 13:41:11', '2020-07-05 13:41:11'),
(21, 2, 'Kansas', 'kansas', 1, '2020-07-05 13:43:32', '2020-07-05 13:43:32'),
(22, 2, 'Kentucky', 'kentucky', 1, '2020-07-05 14:02:01', '2020-07-05 14:02:01'),
(23, 2, 'Louisiana', 'louisiana', 1, '2020-07-05 14:15:01', '2020-07-05 14:15:01'),
(24, 2, 'Maine', 'maine', 1, '2020-07-05 14:17:44', '2020-07-05 14:17:44'),
(25, 2, 'Maryland', 'maryland', 1, '2020-07-09 04:53:58', '2020-07-09 04:53:58'),
(26, 2, 'Massachusetts', 'massachusetts', 1, '2020-07-09 05:08:46', '2020-07-09 05:08:46'),
(27, 2, 'Michigan', 'michigan', 1, '2020-07-09 05:12:20', '2020-07-09 05:12:20'),
(28, 2, 'Minnesota', 'minnesota', 1, '2020-07-09 05:16:37', '2020-07-09 05:16:37'),
(29, 2, 'Mississippi', 'mississippi', 1, '2020-07-09 05:23:39', '2020-07-09 05:23:39'),
(30, 2, 'Missouri', 'missouri', 1, '2020-07-09 05:30:56', '2020-07-09 05:30:56'),
(31, 2, 'Montana', 'montana', 1, '2020-07-09 05:35:20', '2020-07-09 05:35:20'),
(32, 2, 'Nebraska', 'nebraska', 1, '2020-07-10 19:19:55', '2020-07-10 19:19:55'),
(33, 2, 'Nevada', 'neavada', 1, '2020-07-10 19:22:52', '2020-07-10 19:23:11'),
(34, 2, 'New Hampshire', 'new-hampshire', 1, '2020-07-10 19:27:35', '2020-07-10 19:27:35'),
(35, 2, 'New Jersey', 'new-jersey', 1, '2020-07-10 19:30:11', '2020-07-10 19:30:11'),
(36, 2, 'New Mexico', 'new-mexico', 1, '2020-07-22 01:43:28', '2020-07-22 01:43:28'),
(37, 2, 'New York', 'new-york', 1, '2020-07-22 01:47:56', '2020-07-22 01:47:56'),
(38, 2, 'North Carolina', 'north-carolina', 1, '2020-07-22 04:09:38', '2020-07-22 04:09:38'),
(39, 2, 'North Dakota', 'north-dakota', 1, '2020-07-22 04:26:24', '2020-07-22 04:26:24'),
(40, 2, 'Ohio', 'ohio', 1, '2020-07-22 04:27:41', '2020-07-22 04:27:41'),
(41, 2, 'Oklahoma', 'oklahoma', 1, '2020-07-22 04:31:25', '2020-07-22 04:31:25'),
(42, 2, 'Oregon', 'oregon', 1, '2020-07-22 04:42:21', '2020-07-22 04:42:21'),
(43, 2, 'Pennsylvania', 'pennsylvania', 1, '2020-07-22 04:49:09', '2020-07-22 04:49:09'),
(44, 2, 'Rhode Island', 'rhode-island', 1, '2020-07-22 04:55:28', '2020-07-22 04:55:28'),
(45, 2, 'South Carolina', 'south-carolina', 1, '2020-07-22 05:17:21', '2020-07-22 05:17:21'),
(46, 2, 'South Dakota', 'south-dakota', 1, '2020-07-24 04:17:01', '2020-07-24 04:17:01'),
(47, 2, 'Tennessee', 'tennessee', 1, '2020-07-24 04:21:21', '2020-07-24 04:21:21'),
(48, 2, 'Texas', 'texas', 1, '2020-07-24 04:25:08', '2020-07-24 04:25:08'),
(49, 2, 'Utah', 'utah', 1, '2020-07-24 04:25:19', '2020-07-24 04:25:19'),
(50, 2, 'Vermont', 'vermont', 1, '2020-07-24 04:25:35', '2020-07-24 04:25:35'),
(51, 2, 'Virginia', 'virginia', 1, '2020-07-24 04:25:49', '2020-07-24 04:25:49'),
(52, 2, 'Washington', 'washington', 1, '2020-07-24 04:25:59', '2020-07-24 04:25:59'),
(53, 2, 'West Virginia', 'west-virginia', 1, '2020-07-24 04:26:16', '2020-07-24 04:26:16'),
(54, 2, 'Wisconsin', 'wisconsin', 1, '2020-07-24 04:26:28', '2020-07-24 04:26:28'),
(55, 2, 'Wyoming', 'wyoming', 1, '2020-07-24 04:26:43', '2020-07-24 04:26:43'),
(56, 2, 'Washington DC', 'washington-dc', 1, '2020-07-24 04:27:30', '2020-07-24 04:27:30'),
(57, 8, 'Rajasthan', 'rajasthan', 1, '2020-10-30 05:45:52', '2020-10-30 05:52:22'),
(58, 67, 'As', 'as', 1, '2022-04-22 19:48:33', '2022-04-22 19:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` smallint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_testimonials`
--

INSERT INTO `tbl_testimonials` (`id`, `title`, `description`, `client_name`, `country`, `image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Photography', 'A big thank you to LS Gigger who help me to find a photographer and DJ for my function. Exceptional support from Alexandra who really put me in trust!', 'Mark Smith', 'Newyork,  USA', '194530e9_user-2.png', 'wedding-photography', 1, '2020-11-03 10:44:50', '2020-11-03 10:44:50'),
(2, 'Car Service', 'I love the approachable best service and the fact that they provide for my service for better work.', 'Hallen Mark', 'Sydney, Australia', '468da37b_add-video-img.png', 'car-service', 1, '2020-11-03 10:49:37', '2020-11-03 10:49:37'),
(3, 'Resume Writing', 'The writer assigned to my resume did an excellent job with my resume and he  provided honest feedback and insight .', 'Dena Marry', 'NSW, Australia', 'eefa98a9_user-3.png', 'resume-writing', 1, '2020-11-03 10:49:08', '2020-11-03 10:49:08'),
(4, 'Facebook Marketing', 'LS Academy has given me the opportunity to reach a global audience for my classes that wouldn’t have been possible otherwise.', 'Jessica Smith', 'Watercolorist', 'adabc317_user-1.png', 'facebook-marketing', 1, '2021-03-24 09:12:53', '2021-03-24 09:12:53'),
(5, 'Contents Writer', 'contents writer', 'Stalin', 'newzealand', '51a30234_ios7-home-outline_icon-icons.com_50254.png', 'contents-writer', 1, '2021-09-20 18:48:50', '2021-09-20 18:48:50'),
(6, 'Demo', 'Demo Testimonials\r\nThis is demo testimonials which is created only for testing purpose.\r\nthis is demo testimonials which is created only for testing purpose.\r\nThis is demo testimonials which is created only for testing purpose.\r\nhi\r\nthis is testing testimonials.\r\nThis is testing testimonials', 'Demo Client', 'India', '2ac7ad34_WhatsApp Image 2022-03-02 at 11.18.50 AM.jpeg', 'demo', 0, '2022-04-22 12:51:26', '2022-04-22 19:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zipcode` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `forget_password_status` tinyint(4) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` smallint(4) DEFAULT NULL,
  `user_status` varchar(255) DEFAULT 'Offline',
  `activation_status` smallint(4) DEFAULT NULL,
  `last_login` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `google_id` varchar(50) DEFAULT NULL,
  `facebook_id` varchar(50) DEFAULT NULL,
  `linkedin_id` varchar(100) DEFAULT NULL,
  `unique_key` varchar(100) DEFAULT NULL,
  `about` text,
  `about_short` varchar(255) DEFAULT NULL,
  `languages` text,
  `skills` text,
  `educations` text,
  `certifications` text,
  `paypal_email` varchar(100) DEFAULT NULL,
  `average_rating` float(10,1) NOT NULL,
  `total_review` int(11) NOT NULL,
  `buyer_rating` float(10,2) DEFAULT NULL,
  `buyer_count` int(11) DEFAULT NULL,
  `seller_rating` float(10,2) DEFAULT NULL,
  `seller_count` int(11) DEFAULT NULL,
  `device_type` varchar(15) DEFAULT NULL,
  `device_id` varchar(100) DEFAULT NULL,
  `hide_weekend` tinyint(2) NOT NULL DEFAULT '0',
  `accept_orders` tinyint(2) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `user_type`, `contact`, `dob`, `gender`, `email_address`, `password`, `profile_image`, `address`, `city`, `country_id`, `zipcode`, `forget_password_status`, `slug`, `status`, `user_status`, `activation_status`, `last_login`, `created_at`, `updated_at`, `google_id`, `facebook_id`, `linkedin_id`, `unique_key`, `about`, `about_short`, `languages`, `skills`, `educations`, `certifications`, `paypal_email`, `average_rating`, `total_review`, `buyer_rating`, `buyer_count`, `seller_rating`, `seller_count`, `device_type`, `device_id`, `hide_weekend`, `accept_orders`, `token`) VALUES
(1, 'James', 'Smith', 'Instructor', '15065550160', NULL, NULL, 'james.smith01@gmail.com', '$2y$10$wMYegOFIiGchd2Er2chwfu6f9O3vL47eSruNg5wawfNHIX1Zwwvpi', 'f09ab56b_GettyImages-500394316.jpg', 'test 123', NULL, 13, NULL, 1, 'madan-saini', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, 'a14a3367fe7a26925e2b5b8912276331e379e17811e57ca859', '<p>Hi, I&#39;m Jonas! I have been identified as one of Udemy&#39;s Top Instructors and all my premium courses have recently earned the best-selling status for outstanding performance and student satisfaction.</p>\r\n\r\n<p>I&#39;m a full-stack web developer and designer with a passion for building beautiful things from scratch. I&#39;ve been building websites and apps since 2007 and also have a Master&#39;s degree in Engineering.</p>\r\n\r\n<p>It was in college where I first discovered my passion for teaching and helping others by sharing all I knew. And that passion brought me to Udemy in 2015, where my students love the fact that I take the time to explain important concepts in a way that everyone can easily understand.</p>\r\n\r\n<p><strong><em>Do you want to learn how to build awesome websites with advanced HTML&nbsp;and CSS?</em></strong></p>\r\n\r\n<p><strong><em>Looking for a complete JavaScript course that takes you from beginner to advanced developer?</em></strong></p>\r\n\r\n<p><strong><em>Or maybe you want to build modern and fast back-end applications with Node.js?</em></strong></p>\r\n\r\n<p>Then don&#39;t waste your time with random tutorials or incomplete videos. All my courses are easy-to-follow, all-in-one packages that will take your skills to the next level.</p>\r\n\r\n<p><em>These courses are exactly the courses I wish I had when I was first getting into web development!</em></p>\r\n\r\n<p>So see for yourself, enroll in one of my courses (or all of them :D) and join my 500,000+ happy students today.</p>', 'Web Developer, Designer, and Teacher', NULL, NULL, NULL, NULL, 'Madan.saini@logicspice.com', 4.0, 4, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(2, 'Michael', 'Smith', 'User', '9874563210', NULL, NULL, 'micheal.smith06@gmail.com', '$2y$10$DWY/mLeV2XnHn6O3xxJqvOnFIirXdiQWtEZLLoUY2xsnk4TBqcm16', 'ec7e0407_5709e_57c92_3bc85_5eb54_profile_pictures_for_facebook_13.jpg', 'test', NULL, 13, NULL, NULL, 'madan-saini-e6b6e2d12b0d', 1, 'Offline', 1, NULL, '2021-03-23 12:15:10', '2021-03-22 06:20:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(5, 'Jacob', 'Thom', 'Instructor', '5065550145', NULL, NULL, 'sam.mikal@gmail.com', '$2y$10$V7ORSfMV6rxqrSQMO/Ufpu1CA2P.TPf3uo6yID0Mybo374Ct1vNs6', NULL, 'Sargam Society Lane No.1', NULL, 8, NULL, NULL, 'praveen1-kulharee1', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, '2d47f265cdf9b9956db2c10bfa22ec25237f595013e0f97551', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(8, 'Alexander', 'Jac', 'User', '5065550164', NULL, NULL, 'programmer@logicspice.com', '$2y$10$VETS5sUfD/eC9lLaeMtg5efg6wCQKS.iPEOYGRb4lVT2TXu1o7cCK', 'e3737233_22c9a5f7_inbound968763767713140009.jpg', '61064 Rollin Avenue Apt. 927', NULL, 117, NULL, NULL, 'programmer-logicspice', 1, 'Offline', 1, NULL, '2021-03-24 05:59:34', '2021-03-24 05:59:34', '116383069393393718292', '', '', NULL, '<p>I&nbsp;am passionate about teaching people Android, Java and Flutter development.&nbsp; I have taught over<strong> 80,000 students in 175 countries worldwide.</strong></p>\r\n\r\n<p>I have a degree in Computer Science from Whitworth University, and I love programming and teaching!&nbsp;</p>\r\n\r\n<p>I have extensive experience in Mobile App Development (Android and iOS) and Web Development.&nbsp;</p>\r\n\r\n<p>I am also the founder of Build Apps With Paulo, where students are equipped with tools they need to become well-rounded developers - <strong>developers who have soft and technical skills.</strong></p>\r\n\r\n<p>Showing students how to make amazing applications/software is an extremely rewarding experience for me.&nbsp; That&#39;s why I have been teaching online for the past 5 years.</p>', 'Android, Java, Flutter Developer and Teacher', NULL, NULL, NULL, NULL, 'Madan.saini@logicspice.com', 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(13, 'Mark 2021', 'Wafo', 'Student', '735544554354', NULL, NULL, 'mark123@gmail.com', '$2y$10$mcGh3O6QXfan1M7.noKpMOsY773uOfW6k2oLDT9.oc475EEyFqxKS', 'fa3f11d6_FEDERLE-Michele-Profile-picture.jpg', '705 white squre', NULL, 12, NULL, NULL, 'mark-mathew', 1, 'Offline', 1, NULL, '2022-03-25 11:12:27', '2022-03-25 11:12:27', NULL, NULL, NULL, NULL, '', 'Little be about e', NULL, NULL, NULL, NULL, 'Martialo218@gmail.com', 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEzLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MTY2MDI4NTUsImV4cCI6MTYxNjYwNjQ1NSwibmJmIjoxNjE2NjAyODU1LCJqdGkiOiJ2dlBRdm45MFlBYlRoQ1dMIn0.eEq0yuqs48xHSp5f4xxiSqny4x'),
(14, 'Walt', 'Ond', 'Instructor', '9839849432443', NULL, NULL, 'Waltond2@gmail.com', '$2y$10$KiLm9lpre72wEzRdjbOEPu0SjWyQ/9iFrQzv/j634C2KCe9vzQfE.', 'b52e290c_free-profile-photo-whatsapp-4.png', '36-Avenue', NULL, 3, NULL, NULL, 'walt-ond', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MTcxMDI4NDIsImV4cCI6MTYxNzEwNjQ0MiwibmJmIjoxNjE3MTAyODQyLCJqdGkiOiI4TWQ2YURQdWQwYnJEdmN1In0.IPgFav45OwAmt8qc5JdgiUdLb-'),
(17, 'Oliver', 'Sen', 'Instructor', '14165550266', NULL, NULL, 'oliversen11@gmail.com', '$2y$10$X6vtiw.IWphsad3pJWItLuYIM4nmBPxYzqHTuv69/tym7zIlfvIIe', '55c10d5f_download (2).jpg', 'Fairfield Road, MARKET HARBOROUGH, LE16 7', NULL, 61, NULL, NULL, 'himesh-mane', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, '23fbb2f3d04f64daec5e3271a72d560e9bca56ad2865593d01', '<p>This is test profile added for test</p>', 'Test bio', NULL, NULL, NULL, NULL, 'Himesh.mane11@gmail.com', 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE3LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MTU1NDM4NTcsImV4cCI6MTYxNTU0NzQ1NywibmJmIjoxNjE1NTQzODU3LCJqdGkiOiJmNTZITEZEeXBHSnlwRWgyIn0.GkbloEFoqh3ypnNHmIgtAqtFvS'),
(18, 'Alam', 'Wibowo', 'User', NULL, NULL, NULL, 'alamhafidz64@gmail.com', '$2y$10$6G47CIQKO1Ppql6vKo686umaaNtDA/xFXkwXo3VIxQxXxJr0YSo2K', NULL, NULL, NULL, NULL, NULL, NULL, 'alam-wibowo', 1, 'Offline', 1, NULL, '2021-01-05 03:41:24', '2021-01-05 03:41:24', NULL, NULL, NULL, '98169db33052e390b989f9ea0cf58b5d6503dff68288167d3f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(20, 'Shiv', 'Khodade', 'User', '74185296321', NULL, NULL, 'shivannaik95@gmail.com', '$2y$10$T9KHbLcDNbW7dZza8PaFnOmqRJriEdPAfOVwKIpenxM52YHo7x1.O', '66551d26_Tulips.jpg', NULL, NULL, NULL, NULL, NULL, 'shiv-khodade', 1, '0', 1, NULL, '2021-03-04 09:55:14', '2021-03-04 09:55:14', NULL, NULL, NULL, '5017cd324327431a048d2d8440de1fa586106d276391342a66', '', 'BE', NULL, NULL, NULL, NULL, 'Shivannaik95@gmail.com', 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIwLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MTQ4NDQxMjcsImV4cCI6MTYxNDg0NzcyNywibmJmIjoxNjE0ODQ0MTI3LCJqdGkiOiJrdXV3Q3p5bE5oZFF0aXA3In0.cHxmgs4x-LBi1IeSWAxDOuPTOU'),
(21, 'William ', 'Henr', 'User', '7972801914', NULL, NULL, 'devendrac706@gmail.com', '$2y$10$T9KHbLcDNbW7dZza8PaFnOmqRJriEdPAfOVwKIpenxM52YHo7x1.O', '4841ae6e_file_avatar.jpg', '', NULL, 9, NULL, NULL, 'devendra-k-chavan', 1, '1', 1, NULL, '2022-03-15 21:47:57', '2022-03-15 21:47:57', NULL, NULL, NULL, 'da98ca970e9d3adb91a74e16fa40a459ccb3d1b5e784af8d3a', 'demo about me pp', 'demo bio', NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'iphone', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIxLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MTQ4NTI4NTksImV4cCI6MTYxNDg1NjQ1OSwibmJmIjoxNjE0ODUyODU5LCJqdGkiOiJrb0psdUNzWFNqQ3E2a3NtIn0.dmxWKYRc_wFP_Z57RuiE0Tvvel'),
(23, 'Harry', 'Mason', 'User', '5065550158', NULL, NULL, 'jyotirathod9513@gmail.com', 'a24a8fc3bbfb515d73918c61b6d9e9a0', NULL, '61064 Rollin Avenue Apt. 927', NULL, 205, NULL, NULL, 'jyoti-rathod', 1, '1', 1, NULL, '2021-03-24 05:48:44', '2021-03-24 05:48:44', NULL, NULL, NULL, '2efc8270f083026215551af08caeb7c697c273596bf722f3ce', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIzLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MTUwMjE1MDIsImV4cCI6MTYxNTAyNTEwMiwibmJmIjoxNjE1MDIxNTAyLCJqdGkiOiJIcEFTa05SbFdvMjB5TTRLIn0.yw4fcTo2VDRVvrM2MM'),
(24, 'Luana', 'Teles', 'User', NULL, NULL, NULL, 'luannatelles1295@gmail.com', '332533ffdbf7c04487a3a09cfef58430', NULL, NULL, NULL, NULL, NULL, NULL, 'luana-teles', 1, '1', 1, NULL, '2021-03-24 15:58:57', '2021-03-24 15:58:57', NULL, NULL, NULL, '59dd4ee5770d4051d05c6fb1261df9ac6567413f27d48ae73b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI0LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MTUzMTE2MDcsImV4cCI6MTYxNTMxNTIwNywibmJmIjoxNjE1MzExNjA3LCJqdGkiOiJFaDdZM1drTTI0REI3a2UyIn0.S1RSieOKQH2L65UpBf'),
(25, 'sayali', 'gurav', 'Customer', NULL, NULL, NULL, 'guravsayali2930@gmail.com', '$2y$10$kWFfUqiui79h8bPYyVjSleb8/.K5GA23rZ6YuxURmasVCye7Og4r6', NULL, NULL, NULL, NULL, NULL, NULL, 'sayali-gurav', 1, '0', 1, NULL, '2021-03-11 12:54:58', '2021-03-11 12:54:58', NULL, NULL, NULL, '9f39f80e1f49ab33fc5177fafde87cf0ac86cf0610bd2ac0b2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(26, 'dev', 'chavan', 'Customer', '7972801914', NULL, NULL, 'devenchavan25@gmail.com', '$2y$10$pBCW9nCcgiaOOXZ3Tz84UOXw9rAdoQHZu6wu9ItZgaONtnLfhXlP6', '85f3c3aa_file_avatar.jpg', '', NULL, NULL, NULL, NULL, 'dev-chavan', 1, '0', 1, NULL, '2021-03-16 06:55:41', '2021-03-16 06:55:41', NULL, NULL, NULL, '68c44e5a5c74b69b76932655704e1e6542b77cc5d788a890a2', 'tata bye', 'okay', NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI2LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MTU0NjczODgsImV4cCI6MTYxNTQ3MDk4OCwibmJmIjoxNjE1NDY3Mzg4LCJqdGkiOiJIQ1pUY2ZXUUUwSWo1V1F3In0.rXyGG6lIqQUcO35Sp_OFg-tPsL'),
(27, 'Nuage', 'Laboratoire', 'User', NULL, NULL, NULL, 'nuage.laborat@cloudtestlabaccounts.com', '6f84bc9fdc5c0e9e3046eac8a5288987', NULL, NULL, NULL, NULL, NULL, NULL, 'nuage-laboratoire', 1, '1', 1, NULL, '2021-03-23 12:21:03', '2021-03-16 16:29:53', NULL, NULL, NULL, 'dfac9632a8729a44fd62aa5341f6d2ad979cde87d3e3428083', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI3LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MTU1MjkyMTksImV4cCI6MTYxNTUzMjgxOSwibmJmIjoxNjE1NTI5MjE5LCJqdGkiOiJodkdEVWRiaWVkcFVGZ09pIn0.JXIZc6nSitniwruAbv'),
(28, 'samirul', 'islam', 'Customer', NULL, NULL, NULL, 'samirulislam2050@gmail.com', '$2y$10$CipWkBh46LdBCoBJZW4hW.RnKcxWS3j6FrN.5/QLVpbnSLm1ODkha', NULL, NULL, NULL, NULL, NULL, NULL, 'samirul-islam', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '38d289052ad8c01618abaf7a0f8897d724ba616740a6f3702b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(29, 'Juliya', 'Sec', 'User', '92389283', NULL, NULL, 'jayshree.akhare@logicspice.com', '$2y$10$s/hWKHucYSErP/XbmQBgBecRry7GctwOMs0L5Z7JKSM3kKvR9/FWO', '662bdd57_depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg', '', NULL, 20, NULL, NULL, 'jayshree-akhare', 1, '1', 1, NULL, '2022-04-22 13:15:59', '2022-04-22 20:15:59', NULL, NULL, NULL, '22965cc9148cac42fceb503cf2b371e95dd82a90552279923d', '<p>This is the description added for test</p>', 'This is test profile added for testing purpose', NULL, NULL, NULL, NULL, 'Test@gmail.com', 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MTU4Nzc2MzIsImV4cCI6MTYxNTg4MTIzMiwibmJmIjoxNjE1ODc3NjMyLCJqdGkiOiJaNDB1NXF0ZkUzZW53MXZuIn0.SbrXoE9HVHAyjewjFn'),
(30, 'Daniel', 'Sen', 'User', '5065550100', NULL, NULL, 'samitasumita5@gmail.com', '318ae4a93682b78c9262ab2b0a321ea1', '8b257305_Drew-Summers.jpg', '61064 Rollin Avenue Apt. 927', NULL, 11, NULL, NULL, 'सुमित-समित', 1, '1', 1, NULL, '2021-03-24 09:11:27', '2021-03-24 09:11:27', NULL, NULL, NULL, 'dc0ffbfd0479ec0335488ba44b6aae6955bf7f647a79642fb7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMwLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MTYwNjMzMDAsImV4cCI6MTYxNjA2NjkwMCwibmJmIjoxNjE2MDYzMzAwLCJqdGkiOiJ0enl2Z09yNjFGTnliV3lFIn0.njktj2LS1tWQd3gci_'),
(31, 'Shubham', 'Mahalkar', 'Customer', NULL, NULL, NULL, 'shubham@gmail.com', '$2y$10$bFBiOW8uI69DCyJAsp61suRm0nHY9kKI5zEZUxmqRZCNrJtjG8G1a', NULL, NULL, NULL, NULL, NULL, NULL, 'shubham-mahalkar', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'f443f5028c4a82ba76ff65703190d580a793eb8872fe4138e5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(32, 'Shubham', 'Mahalkar', 'Customer', NULL, NULL, NULL, 'mahalkars23@gmail.com', '$2y$10$nd.vgPN5/ZTeaJI4fsCq/uLBGew7a7AeqzbEGkXnxb09dNoWhD082', NULL, NULL, NULL, NULL, NULL, NULL, 'shubham-mahalkar-246dd99ddec1', 1, '0', 1, NULL, '2021-03-20 16:15:40', '2021-03-20 16:15:40', NULL, NULL, NULL, '3296ffc1a5443d9923999587bfb20f1323633938877ce01623', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMyLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MTYyNTY5NDAsImV4cCI6MTYxNjI2MDU0MCwibmJmIjoxNjE2MjU2OTQwLCJqdGkiOiJ6aTFiakw5SlRIVnQ1bU5tIn0.tssD9gBZni5n0pIMD2CYDdFjcX'),
(33, 'Danilza', 'Teixera', 'Customer', NULL, NULL, NULL, 'danilzast1@gmail.com', '$2y$10$xl0E/0mccfr90HeRaZ8gvO0s/ELuChRZUXbwLMKNApK0Dwp4NadfK', NULL, NULL, NULL, NULL, NULL, NULL, 'danilza-teixera', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'd31168d8ac1349be1f1977c3915fdd39cdb5182df2485f8952', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(34, 'Patrick', 'Guttenthaler', 'User', NULL, NULL, NULL, 'patrickguttenthaler33@gmail.com', 'b8d33f3d4db8ec32da8f226d59b4f751', NULL, NULL, NULL, NULL, NULL, NULL, 'patrick-guttenthaler', 1, '1', 1, NULL, '2021-04-09 07:48:15', '2021-04-09 07:48:15', NULL, NULL, NULL, '92123cacb8fca5242328d833922a90ef3765b35905bc6d4425', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM0LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MTc4MDA5NTYsImV4cCI6MTYxNzgwNDU1NiwibmJmIjoxNjE3ODAwOTU2LCJqdGkiOiJGMjZMTW9DTTU5NXRrdFlmIn0.hCqVG4e-EsupSYltIh'),
(35, 'Rohit', 'Kumar', 'User', NULL, NULL, NULL, 'xotejeh163@whyflkj.com', '$2y$10$iT5pMhkmvQM/2wCb26aeLOinqLzNwg6Hx.n/i.KNiRc7Sbrh9W2Oy', NULL, NULL, NULL, NULL, NULL, NULL, 'rohit-kumar', 1, 'Offline', 1, NULL, '2021-04-08 06:49:22', '2021-04-08 06:49:22', NULL, NULL, NULL, '2d4308f06ad54fd68905cef4b01ed16cfb02069463cde7b99c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(36, 'Nuage', 'Laboratoire', 'User', NULL, NULL, NULL, 'B7J7IFPLVICI7ZNNFILQDR2ALI-00@cloudtestlabaccounts.com', '6f84bc9fdc5c0e9e3046eac8a5288987', NULL, NULL, NULL, NULL, NULL, NULL, 'nuage-laboratoire-d202cf763198', 1, '1', 1, NULL, '2021-07-26 09:36:12', '2021-07-26 09:36:12', NULL, NULL, NULL, 'ac181fff40615fca5792787beed356337fa4330abb320aa479', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM2LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MTkzMzg4MDksImV4cCI6MTYxOTM0MjQwOSwibmJmIjoxNjE5MzM4ODA5LCJqdGkiOiJJUHB5N3BWTk0xMFR4TjVUIn0.Hcno7qtk3h_1bRAGP-'),
(37, 'Sidney', 'Gomes RJ', 'User', NULL, NULL, NULL, 'sigos46@gmail.com', 'fe1be0be9b8c7b81d8c37f29df2f883a', NULL, NULL, NULL, NULL, NULL, NULL, 'sidney-gomes-rj', 1, '1', 1, NULL, '2021-05-15 15:20:58', '2021-05-15 15:20:58', NULL, NULL, NULL, '11d54a95ab3a32d55ca2c6ae8d19e85a02d2d22b6fb3c2900d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM3LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjA5OTU2OTgsImV4cCI6MTYyMDk5OTI5OCwibmJmIjoxNjIwOTk1Njk4LCJqdGkiOiI0VVVPYUlaQjZZQVhHckZUIn0.f7Y7NumxMjOHkAFLCC'),
(38, 'Ana Luísa', 'Pereira', 'User', NULL, NULL, NULL, 'pereiraanaluisa154@gmail.com', '7da3568996d9c95cd4219ec706766c29', NULL, NULL, NULL, NULL, NULL, NULL, 'ana-luisa-pereira', 1, '1', 1, NULL, '2021-06-23 21:00:08', '2021-06-23 21:00:08', NULL, NULL, NULL, '211cb3aeb24dabfcd3e42241c0a9cf51a38de48a6c3c9347fd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM4LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjQ0ODIwMDgsImV4cCI6MTYyNDQ4NTYwOCwibmJmIjoxNjI0NDgyMDA4LCJqdGkiOiJ2ZUFJbHdEQjRqQXg4ZWlxIn0.6UQi6YcTKzBTxCadUB'),
(39, 'Buntheoun', 'Theom', 'User', NULL, NULL, NULL, 'theombuntheoun@gmail.com', '0f6ca1f2c5006194a177881033f53ee3', NULL, NULL, NULL, NULL, NULL, NULL, 'buntheoun-theom', 1, '1', 1, NULL, '2021-07-03 01:05:31', '2021-07-03 01:05:31', NULL, NULL, NULL, '7c2c0c4745e09134bb90c988ac839e1345fe01b6a2fd08cb20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM5LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjUyNzQzMTIsImV4cCI6MTYyNTI3NzkxMiwibmJmIjoxNjI1Mjc0MzEyLCJqdGkiOiJQZXVkamtrZHNBOGFTaWhCIn0.UV-UToFP5BsLb5olLX'),
(40, 'Anil', 'Moud', 'User', NULL, NULL, NULL, 'anil.moud@logicspice.com', 'dae25370b4b2cd9c9d8483059950cdf4', NULL, NULL, NULL, NULL, NULL, NULL, 'anil-moud', 1, '1', 1, NULL, '2021-07-07 09:22:54', '2021-07-07 09:22:54', NULL, NULL, NULL, 'c4523419119f0e32c061a9356b54082fab4e66cbc86fedb4cd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQwLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjU2NDkzOTIsImV4cCI6MTYyNTY1Mjk5MiwibmJmIjoxNjI1NjQ5MzkyLCJqdGkiOiJMMGd1c1c0Wm5Pdm9hdkNxIn0.HdCEY6yvCAg2Tzu9zf'),
(41, 'anshu', 'anand', 'Customer', NULL, NULL, NULL, 'tosslabsinfo@gmail.com', '$2y$10$O92NILYqKsko9GYf9LZYjuOsm9NzavnX1A8Xg.e7OZh3rXc0GCwZe', NULL, NULL, NULL, NULL, NULL, NULL, 'anshu-anand', 1, '0', 1, NULL, '2021-07-11 09:40:34', '2021-07-11 09:40:34', NULL, NULL, NULL, '238deadaa972cba1a9c9cae1d4c821b10d9734b8459fbbc370', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQxLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2MjU5OTY0MzQsImV4cCI6MTYyNjAwMDAzNCwibmJmIjoxNjI1OTk2NDM0LCJqdGkiOiJ2UlpkM0FTbk1UT29LTnNNIn0.QIDQFphCG6K0eZkesDUQLZ2VD-'),
(42, 'Wego Music', 'TV', 'User', NULL, NULL, NULL, 'lajoyasounds@gmail.com', '0b0b36e48837375dccac73c2c515a319', NULL, NULL, NULL, NULL, NULL, NULL, 'wego-music-tv', 1, '1', 1, NULL, '2021-07-15 21:44:07', '2021-07-15 21:44:07', NULL, NULL, NULL, '8c7ff007168133e1ff2b1e3af1886016cd7e37a06abc02307a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQyLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjYzODU0MDgsImV4cCI6MTYyNjM4OTAwOCwibmJmIjoxNjI2Mzg1NDA4LCJqdGkiOiJLN09tbDFVUkIwUko1TXNzIn0.iONP4OK26dfURn6CkG'),
(43, 'Andrew', 'KaleAndrew', 'Instructor', '0020120121212', NULL, NULL, 'anlixempire@gmail.com', '$2y$10$FwuYucHYITnOPSi4DFkS6euN5JNKWlqZcVaTt2v/WNv0Rz3j2g/LG', '774aa52e_AdobeStock_350280605.jpeg', 'arminea', NULL, 19, NULL, NULL, 'andrew-kale', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, '95640b54196e9b168782430be1fde7672614bce8609140b676', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(44, 'Natan', 'Meunier', 'User', NULL, NULL, NULL, 'natanmeuniertr@gmail.com', 'a199a569d37e9b3d1ada45e3f4820d5d', NULL, NULL, NULL, NULL, NULL, NULL, 'natan-meunier', 1, '1', 1, NULL, '2021-07-19 14:51:42', '2021-07-19 14:51:42', NULL, NULL, NULL, '3485dd7a4d77360ceb04badb89c790f1c1452479f70602edd1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ0LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjY3MDYyOTcsImV4cCI6MTYyNjcwOTg5NywibmJmIjoxNjI2NzA2Mjk3LCJqdGkiOiJyRkp4dkRqZHFQNld3TlZJIn0.ctSf6mHwm5ir6DuxxN'),
(45, 'ramnarayan', 'nitharwal', 'User', NULL, NULL, NULL, 'ramnarayannitharwal@gmail.com', 'dae21ec4bff9260ed656743073b5042a', NULL, NULL, NULL, NULL, NULL, NULL, 'ramnarayan-nitharwal', 1, '1', 1, NULL, '2021-07-29 13:57:15', '2021-07-29 13:57:15', NULL, NULL, NULL, 'dd92406bf8ce1ab8c1c255694564c218f8de8518a0dcf8f6e3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ1LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2Mjc1NjcwMjUsImV4cCI6MTYyNzU3MDYyNSwibmJmIjoxNjI3NTY3MDI1LCJqdGkiOiJsTmNvZ1pxRDh1YnhERG1KIn0.ggLJ4W5TpVbglEfpV8'),
(46, 'Devendra ', 'Kisan Chavan', 'User', '7972801914', NULL, NULL, 'devendra.kisan@logicspice.com', '3671e08b6828de3a99bd649cce665d95', '1b1321e3_file_avatar.jpg', '', NULL, NULL, NULL, NULL, 'devendra-kisan-chavan', 1, '1', 1, NULL, '2021-08-06 05:50:33', '2021-08-06 05:50:33', NULL, NULL, NULL, '7e01f71b0c6a881f5ff0707af2c424e451d98a69e640e5a247', 'about me', 'demo', NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ2LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjgyMjg5MDMsImV4cCI6MTYyODIzMjUwMywibmJmIjoxNjI4MjI4OTAzLCJqdGkiOiJWb0FNZmFNcHRXbll6UGJ4In0.TplWfiigiQBHdalMp3'),
(47, 'fly', 'flyer', 'User', NULL, NULL, NULL, 'bradbach76@icloud.com', '$2y$10$zheFUPwjLd3B7ZJqiX3Pmuw4ebVm7KPIp8NdGeO1R9HWshgJQosmq', NULL, NULL, NULL, NULL, NULL, NULL, 'fly-flyer', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'e0c4ca55a42022805277082d550011407b76d71809fc40ecc5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'iphone', '123', 0, 0, ''),
(48, 'Apple', 'John', 'Customer', NULL, NULL, NULL, 'n4zrpkntyv@privaterelay.appleid.com', '927c042b8578da6ba24ff61594bdf06e', NULL, NULL, NULL, NULL, NULL, NULL, 'apple-john', 1, '1', 1, NULL, '2021-08-07 17:50:58', '2021-08-07 17:50:58', NULL, NULL, NULL, 'ac873301b1f9fe8265b69e7cd8e144ad66b8b1395105980582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ4LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MjgzNTg2NTgsImV4cCI6MTYyODM2MjI1OCwibmJmIjoxNjI4MzU4NjU4LCJqdGkiOiJPNU13a2xtcDJ6V1NtanplIn0.TmC5NswzQqzbBXLhVm'),
(49, 'fly', 'flyer', 'User', NULL, NULL, NULL, 'bradbach76@icloud.com', '$2y$10$kST75yZkM0FVBc3GxHMg/.DlEvERCCy/b/yAzSu0Ft3MOHdVRUz5e', NULL, NULL, NULL, NULL, NULL, NULL, 'fly-flyer-cdb4b7f5b527', 1, '0', 1, NULL, '2021-08-25 21:59:24', '2021-08-25 21:59:24', NULL, NULL, NULL, '2867488af5f7bc35ba72d55e4e3c9cef29287a12b2e8903da1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'iphone', '123', 0, 0, ''),
(50, 'kartik', 'paliwal', 'User', NULL, NULL, NULL, 'kartik.paliwal@mailinator.com', '$2y$10$xpOi0lScOm/IbvEDPlgVxO6vE8np7a/sLrHvGPuV/XZAoO5eweI9K', NULL, NULL, NULL, NULL, NULL, NULL, 'kartik-paliwal', 1, '0', 1, NULL, '2021-08-26 12:12:56', '2021-08-26 12:12:56', NULL, NULL, NULL, 'f295bdbf7557326970693caba87dee88b7d6e2aa4cd8fe9fb6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'iphone', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUwLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvbG9naW4iLCJpYXQiOjE2Mjk5Nzk5NzYsImV4cCI6MTYyOTk4MzU3NiwibmJmIjoxNjI5OTc5OTc2LCJqdGkiOiIzY05lQUJjNkFoZWhKY002In0.D5UhTONqeAkouox10Yy2EJXpPd'),
(51, 'Brajesh', 'Yadav', 'Customer', NULL, NULL, NULL, 'brajeshyadav7054@gmail.com', '$2y$10$GJDtf9JLGhufhpTbplmWbe.yi8i87LgQyjSJ7YJ6udTKzhuz.AzNS', NULL, NULL, NULL, NULL, NULL, 1, 'brajesh-yadav', 0, '0', 0, NULL, '2021-08-31 10:21:49', '2021-08-31 10:21:49', NULL, NULL, NULL, 'ddad2eacfc768c965a3a412486cbd883a1bb2f8c9301ba8fb5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(52, 'Brajesh', 'Yadav', 'Customer', NULL, NULL, NULL, 'brajeshyadav7054@gmail.com', '$2y$10$IWDm3LCoAXxyk8u3mC1hk.FrkUi2WG7iKrMY.HWLVZoORUdGbUVDm', NULL, NULL, NULL, NULL, NULL, NULL, 'brajesh-yadav-9eeb37617841', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '55d9a2e17fb1a5b586822d8794016782f21d9c623de0d20cbc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(53, 'Brajesh', 'Yadav', 'Customer', NULL, NULL, NULL, 'brajeshyadav7054@gmail.com', '$2y$10$iO3lelVcTZbwlzxz/Hzct.QDfwegmktqhso2D8Nl.6DyDlGHLRCgi', NULL, NULL, NULL, NULL, NULL, NULL, 'brajesh-yadav-b35590563055', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '75ef63d383bf3563e4ea9560ac57e17e2032a0890a052ddaf2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(54, 'Brajesh', 'Yadav', 'Customer', NULL, NULL, NULL, 'brajeshyadav7054@gmail.com', '$2y$10$2fVmX2ExThxcgOQOTAjO6uDh2IqSD4WD7hrTQ/6s6ABcSMwb8z9/6', NULL, NULL, NULL, NULL, NULL, NULL, 'brajesh-yadav-1260351dc0e0', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '3ee62d2e47cc99e852992d194094d3bdae705d4d3cf2f89f67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(55, 'Sumit', 'sharma', 'User', NULL, NULL, NULL, 'www.sumitsharma1976@gmail.com', '637534835cb265c5e844f6d2e76a79b0', NULL, NULL, NULL, NULL, NULL, NULL, 'sumit-sharma', 1, '1', 1, NULL, '2021-09-01 11:09:25', '2021-09-01 11:09:25', NULL, NULL, NULL, '0f4833934d1b01b894bbd10c8c62b8bc2004d191969bd60fd2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU1LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzA0OTQzMzIsImV4cCI6MTYzMDQ5NzkzMiwibmJmIjoxNjMwNDk0MzMyLCJqdGkiOiJJNnh5eVEwT3dRallTYnBNIn0.MLEzaINwlmHum3gdPl'),
(56, 'Delight English By', 'Arvind Sir', 'User', NULL, NULL, NULL, 'arvindk.6964@gmail.com', '79779dfed32453a2363fddd88c2e21fd', NULL, NULL, NULL, NULL, NULL, NULL, 'delight-english-by-arvind-sir', 1, '1', 1, NULL, '2021-09-04 04:15:51', '2021-09-04 04:15:51', NULL, NULL, NULL, '95fcc4d31493da8eb6cbfe201c8b98cad982e75cb874f87d28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU2LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzA3Mjg5NDYsImV4cCI6MTYzMDczMjU0NiwibmJmIjoxNjMwNzI4OTQ2LCJqdGkiOiJ6WGdMSEZqQkE0ZG15cGVxIn0.S_perD6xr3AIAbfvt9'),
(57, 'Danilza', 'Souza ', 'Customer', NULL, NULL, NULL, 'danilzast1@gmail.com', '$2y$10$X6FUZbDlsHDOZRodOph4U.igEEoZrG3RGkYMvnfm6oSqUuhD4B5A.', NULL, NULL, NULL, NULL, NULL, NULL, 'danilza-souza', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'fedc5dc691e8a432e859547961451cdec4847c66fe3486027f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(58, 'Danilza ', 'Souza', 'Customer', NULL, NULL, NULL, 'danilzast2@gmail.com', '$2y$10$jlY4LQ4cxhafQcVwCCEdx.xs1QTM57bEhzZh5BA2yBIzr8zORHvtS', NULL, NULL, NULL, NULL, NULL, NULL, 'danilza-souza-bb999660090f', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '8cd168918dc9777638a16e10b9d6fd23c99c4ad317f5a775f8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(59, 'Mohammed', 'Ali', 'User', NULL, NULL, NULL, 'aalialabbasi@gmail.com', '$2y$10$ASRxiMM4MECMUqKWNT7LiuuufY09q5QvXN765RyUrmNqCi8UuKFtW', NULL, NULL, NULL, NULL, NULL, NULL, 'mohammed-ali', 1, 'Offline', 1, NULL, '2021-09-20 18:56:23', '2021-09-20 18:56:23', NULL, NULL, NULL, 'f3cbc031ff05180c1bb82724ffef76b5a2918375b3e426b1eb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(60, 'Sadhana', 'Bind', 'User', NULL, NULL, NULL, 'sadhanabind513@gmail.com', 'c3ec2c9419c4ec1e93ab5d893637d2c5', NULL, NULL, NULL, NULL, NULL, NULL, 'sadhana-bind', 1, '1', 1, NULL, '2021-09-30 11:16:07', '2021-09-30 11:16:07', NULL, NULL, NULL, '233d62013172b02654feec952ad8771e2b4edd8e696db23cb5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYwLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzMwMDA1NTAsImV4cCI6MTYzMzAwNDE1MCwibmJmIjoxNjMzMDAwNTUwLCJqdGkiOiJYUU1rc2NEanZJNWpib3gzIn0.1FVIiyr3qF0vNpfrFN'),
(61, 'Paulo', 'Leal Albuquerque', 'User', NULL, NULL, NULL, 'paulolealalbuquerque@gmail.com', 'fb96b68f2150498ec322cd1987120658', NULL, NULL, NULL, NULL, NULL, NULL, 'paulo-leal-albuquerque', 1, '1', 1, NULL, '2021-10-03 01:12:59', '2021-10-03 01:12:59', NULL, NULL, NULL, 'fed77a4b8300f67a9239ab5f092575e56f3a891ba7b03a04f0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYxLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzMyMjM1NTgsImV4cCI6MTYzMzIyNzE1OCwibmJmIjoxNjMzMjIzNTU4LCJqdGkiOiJvVmFyU3J5VWo1SXNxTjdEIn0.Kb6jW7JbxBWxpVQzjA'),
(62, 'Cleotildes', 'Alves da Silva Perei', 'User', '19988498394', NULL, NULL, 'cleotildesalvesdasilvapereira@gmail.com', '4a4e3909a13e071e09f9faea951ee932', NULL, '', NULL, NULL, NULL, NULL, 'cleotildes-alves-da-silva-pereira', 1, '1', 1, NULL, '2021-10-09 01:45:11', '2021-10-09 01:45:11', NULL, NULL, NULL, 'a72ef6e2f50c75f742172cf6384ca12a7a2ab0ce0db52de284', 'amore4321', 'cleotildes psic', NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYyLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzM3NDM4MTksImV4cCI6MTYzMzc0NzQxOSwibmJmIjoxNjMzNzQzODE5LCJqdGkiOiJYUmdMS2o4TXdVTm1xTGk0In0.nyImPpvvX_JxM8S77k'),
(63, 'Sharad', 'Yadav', 'User', NULL, NULL, NULL, 'sharadrocks97@gmail.com', 'dfb0b1fba5630397c79624f491e30c2d', NULL, NULL, NULL, NULL, NULL, NULL, 'sharad-yadav', 1, '1', 1, NULL, '2021-10-12 17:56:16', '2021-10-12 17:56:16', NULL, NULL, NULL, 'f0e61fe6cd52f20869fef577ba0bf4c08a802cdd1af7bcf716', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjYzLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzQwNjEzNzYsImV4cCI6MTYzNDA2NDk3NiwibmJmIjoxNjM0MDYxMzc2LCJqdGkiOiJMV3NUTUZiV2NlbFA3TzVCIn0.Ir5vrn_aUsEU4aFiNN'),
(64, 'Sharad', 'Test', 'Customer', NULL, NULL, NULL, 'sharadtest@gmail.com', '$2y$10$h4B.1Lawpzal85JBz52A3.dOtxldPc6ZiHPHo0AfXrCqwmqbrtCL.', NULL, NULL, NULL, NULL, NULL, NULL, 'sharad-test', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '90e0defe948fb730e195ca759bc578af99985cac859f3edaed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(65, 'Daniele', 'Melo', 'User', NULL, NULL, NULL, 'danibmelo07@gmail.com', '20f1b32c36468b3671c86384a3142e47', NULL, NULL, NULL, NULL, NULL, NULL, 'daniele-melo', 1, '1', 1, NULL, '2021-10-30 16:02:54', '2021-10-30 16:02:54', NULL, NULL, NULL, '42c0518b5103fbd9e1a1a8d229739300cdbbf416bcf5bf14f4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY1LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzU2MDk3NjgsImV4cCI6MTYzNTYxMzM2OCwibmJmIjoxNjM1NjA5NzY4LCJqdGkiOiJ2Nm5qRzdXTWl0c3pyVnU1In0.5QLAA12FabwNXQNuEb'),
(66, 'ahmed', 'shalash', 'Instructor', '201121212121', NULL, NULL, 'ashalash18@hotmail.com', '$2y$10$Ve92.D7AQOuVbuRWjMGt0.vAx/xPI0nNiK9CpJcGxrHfcAk2ErtVO', '9768e1ed_button_buy_blank[1].png', 'ryedfgdfg', NULL, 79, NULL, NULL, 'ahmed-shalash', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(68, 'Jozilene - Leninha', 'Oliveira', 'User', NULL, NULL, NULL, 'leninhamelo0307@gmail.com', '046b0c9d8aab2695dd2570adeb58fb26', NULL, NULL, NULL, NULL, NULL, NULL, 'jozilene-leninha-oliveira', 1, '1', 1, NULL, '2021-11-08 14:34:43', '2021-11-08 14:34:43', NULL, NULL, NULL, 'ac95f115a5b44b8a3a6b5dfb792393b5a8e02064963e1fa7e2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY4LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzYzODIwODMsImV4cCI6MTYzNjM4NTY4MywibmJmIjoxNjM2MzgyMDgzLCJqdGkiOiJSWVVUUVo2Q0w2MmFBTjV2In0.6B0tfufUNXaHVfNyk7'),
(69, 'Hasan', 'Sk', 'User', NULL, NULL, NULL, 'hasansekh733@gmail.com', '19602395382d4cbd587df30430120145', NULL, NULL, NULL, NULL, NULL, NULL, 'hasan-sk', 1, '1', 1, NULL, '2021-11-18 02:02:50', '2021-11-18 02:02:50', NULL, NULL, NULL, '24af8509d501b8b912e95459c1e7ce0a8d6ca2c5deb3781840', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjY5LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzcyMDA5NzAsImV4cCI6MTYzNzIwNDU3MCwibmJmIjoxNjM3MjAwOTcwLCJqdGkiOiJKeEtPR2NEZGdIa25oSmFJIn0.2KmZs4T3BkJDTn4bmJ'),
(70, 'Bakary', 'Dembélé', 'Customer', NULL, NULL, NULL, 'bakyd79@gmail.com', '$2y$10$feCbzOAM31n7xL562vMqgOgKZ1FxfbR9zSWYbYJdfAoBudqFgisPa', NULL, NULL, NULL, NULL, NULL, NULL, 'bakary-dembele', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'f13b601ae602038df218b1c4d252631c81da192e1fb1414f8a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(71, 'Vegan', 'Sun', 'User', NULL, NULL, NULL, 'connectus@gmail.com', '29b3064a1cf831bc2871b8ae2c947c97', NULL, NULL, NULL, NULL, NULL, NULL, 'vegan-sun', 1, '1', 1, NULL, '2021-11-29 12:49:55', '2021-11-29 12:49:55', NULL, NULL, NULL, '0173616e00e845d1b828f639cc69814c2b846c791755763882', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcxLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzgxOTAxODksImV4cCI6MTYzODE5Mzc4OSwibmJmIjoxNjM4MTkwMTg5LCJqdGkiOiJOUWFUWDJ0QkRpNHFFdGE1In0.p_lq5nVxEW1OCH7FEn'),
(72, 'Simone', 'Ashley', 'Instructor', '87897978987', NULL, NULL, 'regu@mailinator.com', '$2y$10$UMCc/uYRw1TZcel74G.xWO96xWZgAAZlknGtxXOcjQcveK/hzaCoy', 'a129913b_download.png', 'Aliquam cum dolore r', NULL, 229, NULL, NULL, 'simone-ashley', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(73, 'Army', 'Lover', 'User', NULL, NULL, NULL, 'armylover8719@gmail.com', '2f140428e2c3d2291b64bfa321882d9c', NULL, NULL, NULL, NULL, NULL, NULL, 'army-lover', 1, '1', 1, NULL, '2021-12-01 12:40:56', '2021-12-01 12:40:56', NULL, NULL, NULL, '734237d3369c3e8b215b0260066d5ffacc2e29496712d431e9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjczLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzgzNjI0NDQsImV4cCI6MTYzODM2NjA0NCwibmJmIjoxNjM4MzYyNDQ0LCJqdGkiOiJGWUV2Slc0dlRrc2RGd0d2In0.1DUDpgD8cHUlTatbSP'),
(74, 'Bassam', 'S', 'User', NULL, NULL, NULL, 'sbassam452@gmail.com', '6dad5dc0ed28ec8403be18abaf93f93b', NULL, NULL, NULL, NULL, NULL, NULL, 'bassam-s', 1, '1', 1, NULL, '2021-12-04 19:02:45', '2021-12-04 19:02:45', NULL, NULL, NULL, '52c1b3071078ab8d90a6c5b74c300ae51fa8c1ec59f2b4e70a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc0LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2Mzg2NDQ1NTksImV4cCI6MTYzODY0ODE1OSwibmJmIjoxNjM4NjQ0NTU5LCJqdGkiOiI4eUxMVDlNdVZsVktkT1BNIn0.Ykb4N-SVxo-yhKRmIJ'),
(75, 'Mahmoud', 'Abdel Galeel', 'User', NULL, NULL, NULL, 'galileopharma2008@gmail.com', 'c262b2c40268ec969c89e4576754e123', NULL, NULL, NULL, NULL, NULL, NULL, 'mahmoud-abdel-galeel', 1, '1', 1, NULL, '2021-12-07 03:52:37', '2021-12-07 03:52:37', NULL, NULL, NULL, '94e413487878527b97932c1a3dc7ec1d6273875809c36d90a7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc1LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2Mzg4NDkxNTcsImV4cCI6MTYzODg1Mjc1NywibmJmIjoxNjM4ODQ5MTU3LCJqdGkiOiJkSTBSQzh3bnJ6aTF4Y0syIn0.NTBgAZ0CUoejlbtpiT'),
(76, 'Greicy', 'Vilhena', 'User', NULL, NULL, NULL, 'greicyvilhena.hair@gmail.com', '0d2db44dfb254fa505d42e4d675caec3', NULL, NULL, NULL, NULL, NULL, NULL, 'greicy-vilhena', 1, '1', 1, NULL, '2021-12-08 18:33:09', '2021-12-08 18:33:09', NULL, NULL, NULL, 'b8fdf9dbea25f44ac3b3d4e87225599de7a74f3fc9a510a7b4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc2LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2Mzg5ODgzNjQsImV4cCI6MTYzODk5MTk2NCwibmJmIjoxNjM4OTg4MzY0LCJqdGkiOiJqRWlRZGxPUThOZlBsTHNRIn0.fw4n-rGpGOTs6eh54J'),
(77, 'Façon Valley', 'Enterprise', 'User', NULL, NULL, NULL, 'faconvalley@gmail.com', '512fbcf4081720994b1f1544ea7f72a9', NULL, NULL, NULL, NULL, NULL, NULL, 'facon-valley-enterprise', 1, '1', 1, NULL, '2021-12-13 09:32:39', '2021-12-13 09:32:39', NULL, NULL, NULL, '65c7e44f57c3f8f5ebba4725c3da64d400e24362daaeaeaa88', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc3LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2MzkzODc5NTksImV4cCI6MTYzOTM5MTU1OSwibmJmIjoxNjM5Mzg3OTU5LCJqdGkiOiJKODI4MDhLWG5aY2V3NjBTIn0.fu26WdUk5yIhrJJPm7'),
(78, 'Bhagirath', 'aiap', 'Customer', NULL, NULL, NULL, 'ganpatramr21@gmail.com', '$2y$10$TC3bxVwQFkxZbJNJuIh0dOPUUeD5osxqkswySe.CfjR77FWTUXyWe', NULL, NULL, NULL, NULL, NULL, NULL, 'bhagirath-aiap', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '4220987049f6aa033f02631dc26bfe321a1c7fd671dd5ecc59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(79, 'Ashmit', 'Sharma', 'User', NULL, NULL, NULL, '2004ashmitsharma.math@gmail.com', '80aed085e3be44882c2691c1cd4457ed', NULL, NULL, NULL, NULL, NULL, NULL, 'ashmit-sharma', 1, '1', 1, NULL, '2021-12-23 06:44:06', '2021-12-23 06:44:06', NULL, NULL, NULL, '9334e1a4ea79b5938f66528f2636c8dac53b7ef99d06bca194', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjc5LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDAyNDE4NDYsImV4cCI6MTY0MDI0NTQ0NiwibmJmIjoxNjQwMjQxODQ2LCJqdGkiOiJMQThybmhYY1RMYld2OXBBIn0.cUEfLsqowVCR_yOkAo'),
(80, 'Sharad', 'Yadav', 'User', NULL, NULL, NULL, 'shruyadav97@gmail.com', 'dfb0b1fba5630397c79624f491e30c2d', NULL, NULL, NULL, NULL, NULL, NULL, 'sharad-yadav-79ff5d915eea', 1, '1', 1, NULL, '2022-01-20 14:36:00', '2022-01-20 14:36:00', NULL, NULL, NULL, '61337c75c288b19a22c6c03fd02724a844bb7f59cb17e7d697', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgwLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDIwNzc4ODksImV4cCI6MTY0MjA4MTQ4OSwibmJmIjoxNjQyMDc3ODg5LCJqdGkiOiJjVkUwNlBzNHdQSGRFYUloIn0.PrPx9wst22GFJ6XJni'),
(81, 'Sharad', 'Yadav', 'User', NULL, NULL, NULL, 'sharadyadav7797@gmail.com', 'dfb0b1fba5630397c79624f491e30c2d', NULL, NULL, NULL, NULL, NULL, NULL, 'sharad-yadav-d214ddc8e916', 1, '1', 1, NULL, '2022-01-13 12:48:19', '2022-01-13 12:48:19', NULL, NULL, NULL, 'e83e46b6b24d45a281e4dda8f509b6d4455edbfb5981ee75a0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgxLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDIwNzgwNDAsImV4cCI6MTY0MjA4MTY0MCwibmJmIjoxNjQyMDc4MDQwLCJqdGkiOiJDbFJyT2pjeWRXVHFlVUlZIn0.TEsizEYW7RklY08rPn'),
(82, 'Prince', 'Bethel', 'User', NULL, NULL, NULL, 'princebethel715@gmail.com', 'e4cd965813bcdd73e3e9f07727b034dc', NULL, NULL, NULL, NULL, NULL, NULL, 'prince-bethel', 1, '1', 1, NULL, '2022-01-14 23:15:51', '2022-01-14 23:15:51', NULL, NULL, NULL, '4e17116fae8bdaef815e025f9a2e90d7c92a42287ba0600077', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgyLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDIyMDIxNDMsImV4cCI6MTY0MjIwNTc0MywibmJmIjoxNjQyMjAyMTQzLCJqdGkiOiI4UERZUk5UbHpobVdzUU5WIn0.9IEg95A8jldw5S52e1'),
(83, 'Deys', 'Oliveira', 'User', NULL, NULL, NULL, 'deys2013macedo@gmail.com', 'f893367bb6ae765a22e76c7c003ec296', NULL, NULL, NULL, NULL, NULL, NULL, 'deys-oliveira', 1, '1', 1, NULL, '2022-01-15 14:59:41', '2022-01-15 14:59:41', NULL, NULL, NULL, '5538e6e6901ee020b7b19f19116bf62fa3f01fb9f53c7fced5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '121', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgzLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDIyNTgxNTMsImV4cCI6MTY0MjI2MTc1MywibmJmIjoxNjQyMjU4MTUzLCJqdGkiOiJGRUc1NGQ5TGFTb2V5bG5JIn0.vmc4hTQzilWNQeEWfs'),
(84, 'Divya rawat', 'Divya rawat', 'User', NULL, NULL, NULL, 'divyarawatdivyarawat46@gmail.com', '2b50269a5f9e59fdaeb01feef3e11b22', NULL, NULL, NULL, NULL, NULL, NULL, 'divya-rawat-divya-rawat', 1, '1', 1, NULL, '2022-02-04 02:16:56', '2022-02-04 02:16:56', NULL, NULL, NULL, '95bea5347a7beefbf5137b382d9c9dc876c333d63fcfdfacfb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg0LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDM5NDA5OTcsImV4cCI6MTY0Mzk0NDU5NywibmJmIjoxNjQzOTQwOTk3LCJqdGkiOiJMUWJValdFTU1BVEdGSGJ4In0.lPD21Wb6OwRr4CB9Tn'),
(85, 'Veersinghgarasiya', 'Garasiya', 'User', NULL, NULL, NULL, 'veersinghgarasiyag@gmail.com', '1f3642a913369a2986cbb8497bd3eadf', NULL, NULL, NULL, NULL, NULL, NULL, 'veersinghgarasiya-garasiya', 1, '1', 1, NULL, '2022-02-04 11:02:44', '2022-02-04 11:02:44', NULL, NULL, NULL, '6a88dffe44282aecea25645ae1b1d3621d164bc645602de77b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg1LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDM5NzI1NDAsImV4cCI6MTY0Mzk3NjE0MCwibmJmIjoxNjQzOTcyNTQwLCJqdGkiOiJOYTA1RVlpdWJ2bGdEcU45In0.VgV1YlV9YmYP9Jceb9'),
(87, 'Ls', 'Dev', 'Instructor', NULL, NULL, NULL, 'logicspice.developer@gmail.com', '$2y$10$Pfhe5FU.SQg93S.NE75O1Oo3MG6whaEG6WcrmgayGMcoCE/5ky4i2', NULL, NULL, NULL, NULL, NULL, NULL, 'ls-dev', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, '4799e4f162fd2510b7440d0fc45a7e3f9b3cc2bd1d581f7bba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(88, 'Marion', 'Brum', 'User', NULL, NULL, NULL, 'marion1234brum@gmail.com', 'a6fd8290c2f90783b67f9a954c0bf9bc', NULL, NULL, NULL, NULL, NULL, NULL, 'marion-brum', 1, '1', 1, NULL, '2022-02-09 21:34:35', '2022-02-09 21:34:35', NULL, NULL, NULL, 'b84701e847373da2e647ce575941f14f097c0a0bca100852c2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg4LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDQ0NDI0NzUsImV4cCI6MTY0NDQ0NjA3NSwibmJmIjoxNjQ0NDQyNDc1LCJqdGkiOiJrTFZHcWlJczZYUDZyb2hOIn0.CI8GORapAqqzClA2SX'),
(89, 'Sabrina', 'Lima', 'User', NULL, NULL, NULL, 'sabrina.limapinto@gmail.com', '883f7fdb464b460f0b82f2a117d0e35d', NULL, NULL, NULL, NULL, NULL, NULL, 'sabrina-lima', 1, '1', 1, NULL, '2022-02-13 18:01:13', '2022-02-13 18:01:13', NULL, NULL, NULL, '0f47a75703c26c5a093cba133c42e4b886cb793d461e9785eb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjg5LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDQ3NzUyNzMsImV4cCI6MTY0NDc3ODg3MywibmJmIjoxNjQ0Nzc1MjczLCJqdGkiOiJQUFoyQW9jNE5sREw1dFo2In0.l6PsLRIudtTsFaovYJ'),
(90, 'Nelrique', 'Felizardo', 'User', NULL, NULL, NULL, 'nelrique@prof.educacao.sp.gov.br', '6c29678ffbc93298020d51eddc0f454b', NULL, NULL, NULL, NULL, NULL, NULL, 'nelrique-felizardo', 1, '1', 1, NULL, '2022-02-17 12:53:17', '2022-02-17 12:53:17', NULL, NULL, NULL, 'a05d0871f34e18d4b04f0f073a8400ecdd0e1fd770b8df5f38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjkwLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDUxMDIzODcsImV4cCI6MTY0NTEwNTk4NywibmJmIjoxNjQ1MTAyMzg3LCJqdGkiOiJLTXdONVN3Rm9lNjlrVWJ2In0.7ExzpRhNT6KHtYWdhp'),
(91, 'BHARADWAJ', 'MUMMIDI', 'Customer', NULL, NULL, NULL, 'b17ec015@nitm.ac.in', '$2y$10$iWumQHO/tFInGYTBIp4yE.l9Lt4QML23X4G4HQybOOLBe1/kBe/Jm', NULL, NULL, NULL, NULL, NULL, NULL, 'bharadwaj-mummidi', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '23acdc44d04888594321168ecf72a011d69a87612e12cbd30c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(92, 'Duarda', 'Bacelar', 'User', NULL, NULL, NULL, 'efb.j11h3e28@gmail.com', '81a537af735bcde6b8bf0e0afda2a480', NULL, NULL, NULL, NULL, NULL, NULL, 'duarda-bacelar', 1, '1', 1, NULL, '2022-02-25 02:17:46', '2022-02-25 02:17:46', NULL, NULL, NULL, 'f226c0c7aa01c49bf386482b9aad17ead52719542e85218990', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjkyLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDU3NTU0NjEsImV4cCI6MTY0NTc1OTA2MSwibmJmIjoxNjQ1NzU1NDYxLCJqdGkiOiJTUlRaMmw5OThhS1htOUZjIn0.NUj01ptfKUnN7QzR8S');
INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `user_type`, `contact`, `dob`, `gender`, `email_address`, `password`, `profile_image`, `address`, `city`, `country_id`, `zipcode`, `forget_password_status`, `slug`, `status`, `user_status`, `activation_status`, `last_login`, `created_at`, `updated_at`, `google_id`, `facebook_id`, `linkedin_id`, `unique_key`, `about`, `about_short`, `languages`, `skills`, `educations`, `certifications`, `paypal_email`, `average_rating`, `total_review`, `buyer_rating`, `buyer_count`, `seller_rating`, `seller_count`, `device_type`, `device_id`, `hide_weekend`, `accept_orders`, `token`) VALUES
(93, 'Victor', 'Siqueira', 'User', NULL, NULL, NULL, 'victor.siqtj@gmail.com', 'caaa9e4f6b6f7a319aff5105fb247337', NULL, NULL, NULL, NULL, NULL, NULL, 'victor-siqueira', 1, '1', 1, NULL, '2022-02-27 01:47:33', '2022-02-27 01:47:33', NULL, NULL, NULL, '44c75b44f5921b45f5e6cec1d3c652458084db50995c93b042', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjkzLCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDU5MjY0NDUsImV4cCI6MTY0NTkzMDA0NSwibmJmIjoxNjQ1OTI2NDQ1LCJqdGkiOiJ3azUwZllGWWlnSGs4dzhVIn0.oxrvSnNtTifqUMk81S'),
(94, 'rahul', 'kumar', 'User', NULL, NULL, NULL, 'rk8028061@gmail.com', 'ebaaba27b32928a25f2ad6185fc0cc74', NULL, NULL, NULL, NULL, NULL, NULL, 'rahul-kumar', 1, '1', 1, NULL, '2022-03-23 04:57:53', '2022-03-23 04:57:53', NULL, NULL, NULL, '918e037137a318f41df642a1738dfdebd96f527913b3c983d1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjk0LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDgwMTE0NjUsImV4cCI6MTY0ODAxNTA2NSwibmJmIjoxNjQ4MDExNDY1LCJqdGkiOiJIcHVNcno4SFNySHY3YWs2In0.Wzn3WcL2fX9m2PyqC2'),
(95, 'Priyanka', 'Bhardwaj', 'User', NULL, NULL, NULL, 'priyanka.bhardwaj@wedigtech.com', 'e3c16bbf71a1bdc44ad03f18a8a63bc5', NULL, NULL, NULL, NULL, NULL, NULL, 'priyanka-bhardwaj', 1, '1', 1, NULL, '2022-03-25 11:11:49', '2022-03-25 11:11:49', NULL, NULL, NULL, 'f6001819bac26aa574e570536d938328efdca54eb2a177ac01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjk1LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDgyMDY3MDksImV4cCI6MTY0ODIxMDMwOSwibmJmIjoxNjQ4MjA2NzA5LCJqdGkiOiIwU2VRM05lWklQVFBmRE5jIn0.b0OD1xn5qmbZuJjQJW'),
(96, 'p.s.sisodiya', 'sisodiya', 'Customer', NULL, NULL, NULL, 'p.s.sisodiya80023@gmail.com', '$2y$10$jvNl/GjmCwtrlJ9NTYocTeZN9fIYAA1LhAunPPethN8H964O6FVem', NULL, NULL, NULL, NULL, NULL, NULL, 'p-s-sisodiya-sisodiya', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '14f7c6b20e0d0e3a92ad51e3fe8ac3d8fd1e691bf600b2728f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(97, 'Ismail Ibrahim', 'Mohamed', 'User', NULL, NULL, NULL, 'ismoibro1@gmail.com', '44bc13153c5dd66fcdec20ffe4f7d073', NULL, NULL, NULL, NULL, NULL, NULL, 'ismail-ibrahim-mohamed', 1, '1', 1, NULL, '2022-03-27 19:42:56', '2022-03-27 19:42:56', NULL, NULL, NULL, '0723c8a7337d0b4c9944fc51fa7e43b0437c474c4bb9017cb7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjk3LCJpc3MiOiJodHRwczovL2xzYWNhZGVteS5sb2dpY3NwaWNlLmNvbS9hcGkvdXNlcnMvc29jaWFsbG9naW4iLCJpYXQiOjE2NDg0MTAxNDgsImV4cCI6MTY0ODQxMzc0OCwibmJmIjoxNjQ4NDEwMTQ4LCJqdGkiOiJzdWtJMmFzblhHQkRhemZVIn0.xkHT3xUQ4sSePsYzH1'),
(98, 'Mohd', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$We4ir6YPHMJDhzvl5e3PHOoYiAds2OZ13pFqiNZuQJdkrFlUF3nlm', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'ff50f893c632c42d9541cba88b50cb649c95f6a03c51dfbe4e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(99, 'Mohd', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$4VYr4PwDX4YrFw1Ewa4dS.ahXN9EaT06nJdGyaF.Hs6XcHWJN6v26', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-3ae007be36b2', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '4b5582d06416e648c475d90d8f6581869de8c51b91db77ba47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(100, 'Mohd', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$JfNvnRpxW5qDLB6l5tGN4uxICN1i6rb.3wa4Y5yz0Gf5rcXcYHMTa', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-4a1fd6d9a034', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '8ac2f1f9b86cb2872a18d928b7a062470e0a6fc3a1ee427bde', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(101, 'Mohd ', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$OjtwjkbJ35MCSWW6t6/Nj.VS.ZVdyemsztK46xcteqLXm6qHWLlUW', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-77a867633d6f', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'e1a5f7a5074d90b8661aec72bf3c490d8960e5a2c150c789b4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(102, 'Mohd ', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$Ej.LesEqCMa9pm5eJOg4QuueVkk9Pj7XFOMbwDVXykAtj0uGtKZI.', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-f2b6bd034136', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'ba95b50b4506d8f389db981ad2e8edc48f1f7ee3fa787b714f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(103, 'Mohd ', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$ujvTfz9wBYN2IO5wCXTa3ekc4HvjLoDwg32zGDiKprDNi.uQjxwvW', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-677352c453a5', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '6caf32d98b90b56ec4ed78661f7da398a513bf769ed45b2971', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(104, 'Mohd ', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$6wyc3yHjGvZ5BXTR5FSpO.CLXtABf3rk.JSN1guj8XCiIux24uyBm', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-ac80e6d91f89', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '1094f5b2a4d3a2127a04dc65426ed00403d707f074a3dc5ca1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(105, 'Mohd', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$f0FJEWpImwAOrRMdY2D4DuSoNjI8yyJD.RDfZFwe9rvTRZejJeJPy', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-9089b9ae6132', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '7f741f6c491db1efec792a1d2c4ca5a40ecc86c80715d267e2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(106, 'Mohd', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$wRYp9VjUN5RZmJt5uztUf.vSgqE9h.GBW5/ZzFt655wKJHEgeftM6', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-7d40f113fc39', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '1ce667409d70de474a371b07152384bdaa17638f3be06a4712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(107, 'Mohd', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$TknkZxgrWHBuSQlw1yFS3OGJXonGNBlCJCiHZ9L2VjidVimv9x2B2', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-e3fdd1961605', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, 'bf653e01debb41aef3c0bbf7f9e57dd542063a492d1f1e4701', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(108, 'Mohd', 'Nasir', 'Customer', NULL, NULL, NULL, 'mnsabri401@gmail.com', '$2y$10$h0ldj4mNyC9QuH74IxtZD.qSQoSI0IQ2dU67/BFA42di8u5IxhIh6', NULL, NULL, NULL, NULL, NULL, NULL, 'mohd-nasir-a584ac7084e5', 0, '0', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '93fc70b998e259fef403c6e67af8390fe2e02406f97b578428', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'Android', '123', 0, 0, ''),
(113, 'Praveen', 'Test', 'User', NULL, NULL, NULL, 'praveen.kulharee+03@logicspice.com', '$2y$10$F40LuPEWQOieLeka0qWcLOT7oeknulHRNBmahIMyDk1P0wykf33Jq', NULL, NULL, NULL, NULL, NULL, NULL, 'praveen-test', 1, 'Offline', 1, NULL, '2022-04-22 12:24:23', '2022-04-22 19:24:23', NULL, NULL, NULL, 'b0942713430732abcfd54183292778a510f41f15e55eeccd84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(117, 'Dinesh', 'Dhaker', 'User', '2323231321', NULL, NULL, 'dinesh.dhaker@logicspice.com', '$2y$10$XdyKVtyl9Gx7TjorvTRNA.4cK.6HZpRPGD33uuSaNtSkf9dxgZq7G', '0cc667a4_pexels-photo-220453.jpeg', 'sd', NULL, 14, NULL, NULL, 'dinesh-dhaker', 1, 'Offline', 1, NULL, '2022-04-22 12:32:29', '2022-04-22 19:32:29', '', '1985724768266650', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(124, 'Test', 'User', 'User', 'Asdasd', NULL, NULL, 'user@mailinator.com', '$2y$10$10mJhtAW6wdqsi6L6HihU.iaNIcgO3uirCsOVIWj283Y0CGddKLC6', '71d8d28c_sun-10 1.png', NULL, NULL, NULL, NULL, NULL, 'test-user-fdd27a471148', 1, 'Offline', 1, NULL, '2022-04-14 10:50:19', '2022-04-14 10:50:19', NULL, NULL, NULL, '5b33b32164b7c9bda74ccb0784ceabf538f27785786667e64a', '', 'Asdas', NULL, NULL, NULL, NULL, 'Eee@mailinator.com', 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(125, 'Krish', 'Raj', 'User', NULL, NULL, NULL, 'krishamanraj2712@gmail.com', 'ead7961c8b95caccae68091fe66409b1', NULL, NULL, NULL, NULL, NULL, NULL, 'krish-raj', 1, '1', 1, NULL, '2022-04-18 06:13:25', '2022-04-18 06:13:25', NULL, NULL, NULL, 'c0ec238b795015b8ed6f2380b5602826709b73b1260bdfff13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyNSwiaXNzIjoiaHR0cHM6Ly9sc2FjYWRlbXkubG9naWNzcGljZS5jb20vYXBpL3VzZXJzL3NvY2lhbGxvZ2luIiwiaWF0IjoxNjUwMjYyNDA1LCJleHAiOjE2NTAyNjYwMDUsIm5iZiI6MTY1MDI2MjQwNSwianRpIjoiYmxVZHpIR0hQSk5aajdPSyJ9.wxlP9o6Ys_DhuHs9D'),
(126, 'Mrityunjay', 'Dixit', 'User', NULL, NULL, NULL, 'mrityunjaydixit5@gmail.com', 'fa4c353ddf2a0f76d72d1384de29ff1e', NULL, NULL, NULL, NULL, NULL, NULL, 'mrityunjay-dixit', 1, '1', 1, NULL, '2022-04-18 14:19:21', '2022-04-18 14:19:21', NULL, NULL, NULL, 'ca1cf9231ad03e184d11a6a92d8b0fe1a01207aad7eb65a8c6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyNiwiaXNzIjoiaHR0cHM6Ly9sc2FjYWRlbXkubG9naWNzcGljZS5jb20vYXBpL3VzZXJzL3NvY2lhbGxvZ2luIiwiaWF0IjoxNjUwMjkxNTQ3LCJleHAiOjE2NTAyOTUxNDcsIm5iZiI6MTY1MDI5MTU0NywianRpIjoiblZUMjBXVkxHaVZHbVZ0VSJ9.HJXPjePNY837ud4pW'),
(127, 'mose', 'ondieki', 'User', NULL, NULL, NULL, 'mnyambega@gmail.com', '06c1f315d83bf7eda753110b77cf785e', NULL, NULL, NULL, NULL, NULL, NULL, 'mose-ondieki', 1, '1', 1, NULL, '2022-04-21 09:20:41', '2022-04-21 09:20:41', NULL, NULL, NULL, '9aba6a92574028784f3ff0582034dcb099cc96bf755e689901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, 'android', '123', 0, 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyNywiaXNzIjoiaHR0cHM6Ly9sc2FjYWRlbXkubG9naWNzcGljZS5jb20vYXBpL3VzZXJzL3NvY2lhbGxvZ2luIiwiaWF0IjoxNjUwNTMyODMwLCJleHAiOjE2NTA1MzY0MzAsIm5iZiI6MTY1MDUzMjgzMCwianRpIjoiOEhtR1BGUFAyOWdiNEM3MCJ9.pzwp7yKUFyVVta2mA'),
(128, 'Francis', 'Moegh', 'Instructor', '0726863449', NULL, NULL, 'fnyaribo@yahoo.com', '$2y$10$6Pi9j8hsr45QX3GF7cQny.o6M7OwHA2UurvyJD4zXhcOrGZFT8vlS', '92aac813_nobius 3.jpg', NULL, NULL, NULL, NULL, NULL, 'francis-moegh', 1, 'Offline', 1, NULL, '2022-04-22 13:21:20', '2022-04-22 20:21:20', NULL, NULL, NULL, '3050a9a85e6c8a6829353e0c882ea4f5dc9620c5e1eefa9309', '', 'Procurement expert', NULL, NULL, NULL, NULL, 'Fnyaribo@yahoo.com', 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(129, 'Jayshree', 'Akhare', 'Instructor', '092309234', NULL, NULL, 'jayshree.akhare123@logicspice.com', '$2y$10$4/hf4eW1jvv.TnYd7ld1/OZR3zMz6cLxjpQKW325LX2RkBiHcmWiK', '86a22c87_depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg', 'Sargam Society lane no-1', NULL, 8, NULL, NULL, 'jayshree-akhare-a1e2f7221538', 1, 'Offline', 1, NULL, '2022-04-22 12:23:26', '2022-04-22 19:23:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(130, 'Mangesh', 'Patil', 'Student', '923809320', NULL, NULL, 'mangesh.patil@gmail.com', '$2y$10$d7C5b37hDF04QxE6GVTS1OwQgbV84OPvaAvenIRO09InQSINtYaLK', 'df4eee7c_pexels-photo-220453.jpeg', 'Sargam Society Lane No.-1', NULL, 8, NULL, NULL, 'mangesh-patil', 1, 'Offline', 1, NULL, '2022-04-22 19:25:49', '2022-04-22 19:25:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(131, 'fsd', 'sfd', 'Student', '323232324', NULL, NULL, 'sadd@sd.das', '$2y$10$2P4SVHuiTsm3PIcC/s14Y.U3YlSO1HBr2oCVbYWSSDoUiIyLQprwO', 'f7c4969a_9ae2f9e0_tennis.jpg', 'sdd', NULL, 23, NULL, NULL, 'fsd-sfd', 1, 'Offline', 1, NULL, '2022-04-22 19:27:08', '2022-04-22 19:27:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(135, '', '', 'User', NULL, NULL, NULL, 'swapnil.bhute333@gmail.com', '$2y$10$CUX4w8m7zqBJjUUeAjHMZuvyfMHWITwAWhV.dIZeHlzprQIaEwyrG', NULL, NULL, NULL, NULL, NULL, NULL, 'swapnil-bhute333', 1, 'Offline', 1, NULL, '2022-04-27 11:26:30', '0000-00-00 00:00:00', '117922857670479165511', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, ''),
(136, '', '', 'User', NULL, NULL, NULL, 'logicspice.developer2@gmail.com', '$2y$10$yk77KDrCTMMFCb0YbXJCZ.aelutN28JBFqvS1AO/4E9Tle3xo31Ni', NULL, NULL, NULL, NULL, NULL, NULL, 'logicspice-developer2', 1, 'Offline', 1, NULL, '2022-04-28 07:11:58', '0000-00-00 00:00:00', '106026224447264349134', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallets`
--

CREATE TABLE `tbl_wallets` (
  `id` int(11) NOT NULL,
  `type` int(5) DEFAULT NULL,
  `add_minus` int(2) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `gig_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `revenue` float(12,2) DEFAULT NULL,
  `admin_commission` float(12,2) DEFAULT NULL,
  `commission_admin` float(12,2) DEFAULT NULL,
  `trn_id` varchar(20) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `source` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wallets`
--

INSERT INTO `tbl_wallets` (`id`, `type`, `add_minus`, `user_id`, `service_id`, `gig_id`, `amount`, `revenue`, `admin_commission`, `commission_admin`, `trn_id`, `slug`, `created_at`, `updated_at`, `source`, `status`) VALUES
(1, 6, 1, 1, NULL, 2, 17, 15.00, 1.50, NULL, '35G30672BR6415028', '1c49519366e29cd9c705be6a35d82a969e800dd8', '2018-09-28 11:36:33', '0000-00-00 00:00:00', 'From Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(2, 0, 1, 1, 5, NULL, 4, 3.60, 0.40, NULL, '201809289964EDA893', 'b5db3234f4f20107106c977cc1ed32a99bb25ac3', '2018-10-01 05:43:25', '0000-00-00 00:00:00', 'From Request: <b>I will write killer sales pages that explode profits</b>', 1),
(3, 6, 1, 8, NULL, 3, 11, 10.00, 1.00, NULL, '3B7510977B87B76E', '04b3f03174ee43352958f464e113d8c7bacc8cdc', '2018-09-28 13:01:20', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(7, 3, 0, 1, 0, NULL, 12, -12.00, 0.00, NULL, '20191008WTB32445FE', '0ba2187ed8e2819e2ec38502bc56842c7da94b38', '2019-10-08 21:25:16', '2019-10-08 21:25:16', 'Withdraw Amount</b>', 1),
(8, 0, 1, 4, 4, NULL, 160, 144.00, 16.00, NULL, '2018112106F33778C1', '525754d6a40f553390f2cbd71ff14366bc049156', '2018-11-21 09:39:02', '0000-00-00 00:00:00', 'From Request: <b>Experienced craigslist Ad poster Needed Urgently</b>', 1),
(5, 6, 1, 4, NULL, 13, 33, 30.00, 3.00, NULL, '86R17702YP212370M', '58f6defe770d11849c9573261420354d25477bfa', '2018-09-28 13:13:42', '0000-00-00 00:00:00', 'From Gig: <b>I will record you professional electric guitar tracks</b>', 1),
(6, 6, 1, 3, NULL, 12, 44, 40.00, 4.00, NULL, '6DS5665110630733E', 'ecbb022d3b19ecabfb5c1e0c98c55685ea87bf98', '2018-09-28 13:17:49', '0000-00-00 00:00:00', 'From Gig: <b>I will create custom responsive HTML website designs</b>', 1),
(9, 0, 1, 3, 3, NULL, 35, 31.50, 3.50, NULL, '2018112311623E738A', 'a3b1cda6a43644d77dc88a0f5877c3ba11a8b13a', '2018-11-23 04:50:47', '0000-00-00 00:00:00', 'From Request: <b>We need a devlopment php app</b>', 1),
(10, 3, 0, 3, 0, NULL, 50, -50.00, 0.00, NULL, '20190903WT43A46215', 'e4068bcb029b412711d0b504b2e8721198ee7705', '2019-09-03 15:48:33', '2019-09-03 15:48:33', 'Withdraw Amount</b>', 1),
(11, 6, 1, 1, NULL, 7, 17, 15.00, 1.50, NULL, 'AC91A38BAF18625C', '9e94bc9942f7f5f8ef25c6740e8bb2b0e8e5feb0', '2018-12-17 05:29:39', '0000-00-00 00:00:00', 'From Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(12, 5, 0, 3, NULL, 7, 17, -16.50, 0.00, NULL, 'AC91A38BAF18625C', 'cfeea15361908768334d5bc91048a8e3e6d1cc5b', '2018-12-17 05:29:39', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(13, 6, 1, 1, NULL, 19, 105, 95.00, 9.50, NULL, '1TF22364SM886921L', 'eef5d7c1ec912a00629ca7b6d4876361ccd9cca7', '2018-12-17 09:24:52', '0000-00-00 00:00:00', 'From Gig: <b>I will design and build a beautiful, bespoke website</b>', 1),
(14, 6, 1, 1, NULL, 19, 105, 95.00, 9.50, NULL, '8L468151FT8878907', '269f869bdddc64eeea79b925a9a2769d040c3bf2', '2018-12-17 09:37:15', '0000-00-00 00:00:00', 'From Gig: <b>I will design and build a beautiful, bespoke website</b>', 1),
(15, 6, 1, 3, NULL, 24, 55, 50.00, 5.00, NULL, '8C3A770067DE4385', '7a74b0ca65bbecdfcdfda89bd194ca2b41dd4568', '2018-12-20 04:30:54', '0000-00-00 00:00:00', 'From Gig: <b>hdg  tdhgcj</b>', 1),
(16, 5, 0, 4, NULL, 24, 55, -55.00, 0.00, NULL, '8C3A770067DE4385', 'bf68f0f29f770bc0e1c189fd0f9fff8d6cc3e2e6', '2018-12-20 04:30:54', '0000-00-00 00:00:00', 'Pay for Gig: <b>hdg  tdhgcj</b>', 1),
(17, 6, 1, 8, NULL, 16, 18, 15.00, 2.25, NULL, '2D9D7F06986775F9', '62a602fde95db3b847ac785a676608a54af87abd', '2019-01-24 05:04:07', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(18, 5, 0, 4, NULL, 16, 18, -18.00, 2.25, NULL, '2D9D7F06986775F9', '8bbcc895491c75342c7386449a46df1911748076', '2019-01-24 05:04:07', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(19, 6, 1, 8, NULL, 16, 54, 38.25, 6.75, NULL, 'D85C1D264082160D', '84b865075885f1ab9e92cd996b55e491145b4eb7', '2019-01-24 05:09:45', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(20, 5, 0, 4, NULL, 16, 54, -54.00, 6.75, NULL, 'D85C1D264082160D', 'a2187abadc558e9acf7f6921d26ff9aae8ef7e25', '2019-01-24 05:09:45', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(21, 6, 1, 8, NULL, 16, 66, 55.00, 8.25, NULL, '8WE16329NX4983800', '2098113b4221b9b4a0f907b68191d71c006dd857', '2019-01-24 05:16:10', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(22, 6, 1, 8, NULL, 16, 18, 15.00, 2.25, NULL, '346ADF68CD67F14D', '6e1670bef947d15e348f5890e290b770b8f06ffd', '2019-01-24 05:54:54', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(23, 5, 0, 4, NULL, 16, 18, -18.00, 2.25, NULL, '346ADF68CD67F14D', '35487dc7136efae75c38b36124d73aa7860c4d65', '2019-01-24 05:54:54', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(24, 6, 1, 8, NULL, 16, 18, 12.75, 3.00, 2.25, '621C6FF0F69A454A', 'bcc52b12f9d0557af5269fde5a53cd24102e1bba', '2019-01-24 06:01:11', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(25, 5, 0, 4, NULL, 16, 18, 15.00, 0.00, NULL, '621C6FF0F69A454A', '58c2930d19bbb6b2a2899e74df5f7a4f7bb85c19', '2019-01-24 06:04:28', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(26, 6, 1, 4, NULL, 11, 12, 8.50, 1.50, NULL, 'TT456456456', '2b18858336c616ed0fadef791ac89381217d428f', '2019-07-19 08:00:24', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(27, 6, 1, 4, NULL, 11, 12, 8.50, 1.50, NULL, 'TT456456456', '25df734bc159ac323ec4c59c31367b98c505b907', '2019-07-19 08:00:52', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(28, 6, 1, 1, NULL, 2, 18, 12.75, 3.00, 2.25, '4342B511BA93E00A', 'e153e45b894ad355b7d959e5fa72af0073404d44', '2019-08-30 08:00:20', '0000-00-00 00:00:00', 'From Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(29, 5, 0, 3, NULL, 2, 18, 18.00, 0.00, NULL, '4342B511BA93E00A', '215053947f5f756fa8aaec9e7038a9d49dec36ea', '2019-08-30 08:00:20', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(30, 6, 1, 8, NULL, 3, 12, 8.50, 2.00, 1.50, 'C8BB4F489E97CAF2', 'c9bf83ac717781dea150e794289fad34384cee02', '2019-09-03 15:45:25', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(31, 5, 0, 3, NULL, 3, 12, 12.00, 0.00, NULL, 'C8BB4F489E97CAF2', '30b7604fd51248b7f3a3db0f0c35e211c271a9a6', '2019-09-03 15:45:25', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(32, 6, 1, 4, NULL, 34, 60, 42.50, 10.00, 7.50, '24F0E7EFE743C405', '3174351d6c76fe6dcd2e7f3fec14bfbc7ca80251', '2019-09-05 18:53:01', '0000-00-00 00:00:00', 'From Gig: <b>54656</b>', 1),
(33, 5, 0, 3, NULL, 34, 60, 60.00, 0.00, NULL, '24F0E7EFE743C405', 'b00617290a095fe782ffc1c564cfeb6635617d7e', '2019-09-05 18:53:01', '0000-00-00 00:00:00', 'Pay for Gig: <b>54656</b>', 1),
(34, 6, 1, 4, NULL, 38, 6, 4.25, 0.75, NULL, '7E162318MV7995340', '86dc31d35f3608bebe85760d613adb0e9014af33', '2019-09-06 04:30:38', '0000-00-00 00:00:00', 'From Gig: <b>Vou fazer uma Linda Intro!</b>', 1),
(35, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20191122WT0628BB58', '7a8cbf60317b9fc58ae07a8246c9f61081356c16', '2019-11-22 18:49:12', '2019-11-22 18:49:12', 'Withdraw Amount</b>', 1),
(36, 6, 1, 3, NULL, 42, 0, 0.00, 0.00, 0.00, 'tokencc_bd_hbtm6c_6d', 'ee28230af19e30cbed0df60a071adda84334c3ed', '2019-09-24 04:09:39', '0000-00-00 00:00:00', 'From Gig: <b>This is test gig</b>', 1),
(37, 5, 0, 32, NULL, 26, 0, 0.00, 0.00, NULL, '5A41FEB05BB80806', 'a0dfdf8b13be46abf62a7233cab7c6b7a473a9b6', '2019-09-25 09:54:56', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write SEO friendly content for a Website</b>', 1),
(38, 6, 1, 3, NULL, 26, 0, 0.00, 0.00, 0.00, '5A41FEB05BB80806', 'fab28c3d4e45ea90ad38831482364b6d1cc6053e', '2019-09-25 09:54:56', '0000-00-00 00:00:00', 'From Gig: <b>I will write SEO friendly content for a Website</b>', 1),
(39, 6, 1, 8, NULL, 16, 0, 0.00, 0.00, 0.00, 'tokencc_bj_jj5npq_wz', '322470d840c8027ac5fc925f274bab5df33ad33b', '2019-10-01 10:30:03', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(40, 6, 1, 8, NULL, 6, 0, 0.00, 0.00, 0.00, 'tokencc_bj_cv9dpr_xd', '356e692088261921ec8c8bb50a87be07ac52229d', '2019-10-01 10:38:23', '0000-00-00 00:00:00', 'From Gig: <b>I will produce beautiful food photography for your brand</b>', 1),
(41, 6, 1, 8, NULL, 16, 18, 12.75, 3.00, 2.25, '062106103F50EBB2', '6c540acfb9a72d6a5134d3de9c568802885b6477', '2019-10-08 18:22:57', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(42, 5, 0, 3, NULL, 16, 18, 18.00, 0.00, NULL, '062106103F50EBB2', 'e4959f9bbaed9225cc4b429197a6f24d5bbbae9d', '2019-10-08 18:22:57', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(43, 6, 1, 4, NULL, 11, 12, 10.00, 2.00, 0.00, '31DB61B3D651E3C1', '655e47e940471fc7af813b8c698fb077e3ac79b8', '2019-10-16 16:56:11', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(44, 5, 0, 3, NULL, 11, 12, 12.00, 0.00, NULL, '31DB61B3D651E3C1', '2d3b575d89babec20b5051eba7e4100439d72564', '2019-10-16 16:56:11', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design your professional wix website</b>', 1),
(46, 6, 1, 1, NULL, 2, 18, 15.00, 0.00, NULL, '97X21722TX772390K', 'afa4ed7200e073b977b74b6c32431e22717e8112', '2019-12-09 07:31:21', '0000-00-00 00:00:00', 'From Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(47, 6, 1, 3, NULL, 23, 6, 5.00, 1.00, 0.00, '735DACCF707E777C', '77a1b374badb64a0032ab0f3e1efc63a42bc7e81', '2019-12-09 18:11:30', '0000-00-00 00:00:00', 'From Gig: <b>PHP developer</b>', 1),
(48, 5, 0, 4, NULL, 23, 6, 6.00, 0.00, NULL, '735DACCF707E777C', '65b1840a9f3c68229691028862cde7417623d5c6', '2019-12-09 18:11:30', '0000-00-00 00:00:00', 'Pay for Gig: <b>PHP developer</b>', 1),
(49, 6, 1, 1, NULL, 2, 24, 20.00, 4.00, 0.00, 'CC0B92F1C7E47107', '26dc89c21c12b20e1d21fcb56431bd29fd3edee1', '2019-12-25 06:45:13', '0000-00-00 00:00:00', 'From Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(50, 5, 0, 3, NULL, 2, 24, 24.00, 0.00, NULL, 'CC0B92F1C7E47107', 'bcab634e5c0969e1ecc518c614d55833e7252f20', '2019-12-25 06:45:13', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(93, 5, 0, 3, NULL, 3, 82, -82.50, 0.00, NULL, 'FFDA4E22410FC336', '2b20d26e3cd9d6d7c9cd131534dea49d7dc5300f', '2020-07-30 09:02:21', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(53, 6, 1, 1, NULL, 7, 18, 1.80, 3.00, 13.20, '5D2DB3DFCE51F3E5', 'e631787e583b67c8e0d7184e32429b3f09e45cda', '2020-01-15 15:56:38', '0000-00-00 00:00:00', 'From Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(54, 5, 0, 3, NULL, 7, 18, 18.00, 0.00, NULL, '5D2DB3DFCE51F3E5', 'cc1d9c2cb3e7eb9d2759abba5812ba5cf5f8caca', '2020-01-15 15:56:38', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(55, 6, 1, 8, NULL, 3, 48, 4.80, 8.00, 35.20, '048785A3DC7394D6', '5d941887bd2d53a2c66e6a0ae21c4a91f08dda59', '2020-01-20 08:14:05', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(56, 5, 0, 3, NULL, 3, 48, 48.00, 0.00, NULL, '048785A3DC7394D6', 'e2bf0d76ab7f204cf3c02a9d1a85fa2655bf6a82', '2020-01-20 08:14:05', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(57, 6, 1, 1, NULL, 5, 30, 3.00, 5.00, 22.00, '5DFF1079A4F114C8', '89a2b21f3c0a0b1d1550ef4d3c0316ecacef5d9c', '2020-01-20 15:40:55', '0000-00-00 00:00:00', 'From Gig: <b>I will make stupendous 3d logo with copyrights</b>', 1),
(58, 5, 0, 4, NULL, 5, 30, 30.00, 0.00, NULL, '5DFF1079A4F114C8', '218e90d3a84ba3800c56ac12db2c6d36f0e8e466', '2020-01-20 15:40:55', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will make stupendous 3d logo with copyrights</b>', 1),
(59, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20200324WTE1B0CF0A', '4c5a5a95f26657d46b8bb5a7d2b10f3765b1bf5a', '2020-03-24 17:09:17', '2020-03-24 17:09:17', 'Withdraw Amount</b>', 1),
(60, 6, 1, 8, NULL, 3, 48, 4.80, 8.00, 35.20, '430EE67CF68E6C7E', '55d5218069302ac552b5cc0f3278b4886a6544a3', '2020-02-03 17:40:47', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(61, 5, 0, 4, NULL, 3, 48, 48.00, 0.00, NULL, '430EE67CF68E6C7E', '74e288a21078f84c3edb8efe7fa122da9c1e0da9', '2020-02-03 17:40:47', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(62, 6, 1, 8, NULL, 3, 12, 1.20, 2.00, 8.80, 'C41DFD385EC903BE', 'ea68e3e32cbe1c5d24feb9089adf8e0735a7929c', '2020-02-15 05:50:36', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(63, 5, 0, 3, NULL, 3, 12, 12.00, 0.00, NULL, 'C41DFD385EC903BE', 'a218d23520d28eb3648c5bbbbdb8b0f0eea6b86c', '2020-02-15 05:50:36', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(64, 6, 1, 8, NULL, 3, 12, 1.20, 8.80, NULL, '0GW663381V2240044', 'ae0075c5ef68e3498b5545cc35973373de8b8561', '2020-03-25 07:17:50', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(65, 6, 1, 8, NULL, 6, 18, 1.80, 3.00, 13.20, '08600F02E29A52FB', '4c6c84fc2da43aa4b2e7eed24f151a72a84e45ea', '2020-03-26 12:32:36', '0000-00-00 00:00:00', 'From Gig: <b>I will produce beautiful food photography for your brand</b>', 1),
(66, 5, 0, 3, NULL, 6, 18, 18.00, 0.00, NULL, '08600F02E29A52FB', 'cb97460884193144f3c491b59c2ff3f612647295', '2020-03-26 12:32:36', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will produce beautiful food photography for your brand</b>', 1),
(67, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20200327WT31774394', '01688cba9bd6ce07490d140c6b890c5c8e6a7040', '2020-03-27 22:37:50', '2020-03-27 22:37:50', 'Withdraw Amount</b>', 1),
(68, 6, 1, 8, NULL, 3, 12, 1.20, 2.00, 8.80, '92F53183E4B1FA8E', 'ec3e25e5da5b63ef86c48bcaa3e17cca90ddde62', '2020-03-27 22:27:10', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(69, 5, 0, 3, NULL, 3, 12, 12.00, 0.00, NULL, '92F53183E4B1FA8E', '6cb5556e76f98cb03a156cec013d35ad99b8de51', '2020-03-27 22:27:10', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(70, 6, 1, 8, NULL, 16, 18, 1.80, 3.00, 13.20, '0E8E001729560C1D', '2a76adeb91152289e654dba84cb6939931942042', '2020-03-29 18:56:39', '0000-00-00 00:00:00', 'From Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(71, 5, 0, 3, NULL, 16, 18, 18.00, 0.00, NULL, '0E8E001729560C1D', '1587418b449c3cae6ff985e687035adb4abd2fe5', '2020-03-29 18:56:39', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(72, 6, 1, 8, NULL, 3, 12, 1.20, 2.00, 8.80, '161C916C93707FA7', '9366c21bbfed5e54f2adcc34258b03ceda90c9b6', '2020-04-06 18:46:41', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(73, 5, 0, 4, NULL, 3, 12, 12.00, 0.00, NULL, '161C916C93707FA7', 'eb0ce3131b274a7497130bd03821b3b17e305712', '2020-04-06 18:46:41', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(74, 6, 1, 1, NULL, 7, 18, 1.80, 3.00, 13.20, '62B21DF710228A8A', '5296e9d175a53030d914927fe332c77b1cfcf0a7', '2020-04-10 15:07:20', '0000-00-00 00:00:00', 'From Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(75, 5, 0, 3, NULL, 7, 18, 18.00, 0.00, NULL, '62B21DF710228A8A', '0f440bb06615be5f0adde6ace45a83b0a70a5f6a', '2020-04-10 15:07:20', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(76, 6, 1, 91, NULL, 115, 6, 0.60, 1.00, 4.40, '763898AEF4311940', 'dad858feedfb95a9435c7e006ec3596886785ee5', '2020-04-12 02:24:49', '0000-00-00 00:00:00', 'From Gig: <b>Marki</b>', 1),
(77, 5, 0, 4, NULL, 115, 6, 6.00, 0.00, NULL, '763898AEF4311940', 'fe66c8a430d360aea0ef9ccc7090ccb50fb1ebfa', '2020-04-12 02:24:49', '0000-00-00 00:00:00', 'Pay for Gig: <b>Marki</b>', 1),
(82, 6, 1, 96, NULL, 122, 6, 0.60, 1.00, 4.40, '9CA688A30509F9A9', '582376e40214836c243db034101807db58def379', '2020-04-14 01:47:07', '0000-00-00 00:00:00', 'From Gig: <b>I will do ui design for web and mobile device within 24 hours a day</b>', 1),
(83, 5, 0, 4, NULL, 122, 6, 6.00, 0.00, NULL, '9CA688A30509F9A9', '7647384d6d81db6e66e6cbd714494869b1c35e60', '2020-04-14 01:47:07', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will do ui design for web and mobile device within 24 hours a day</b>', 1),
(84, 5, 0, 4, NULL, 115, 6, -5.50, 0.00, NULL, '29191A0245D82F78', 'e194f695f9a061483d284c7201cfe2c0ad96aa4c', '2020-04-28 23:07:26', '0000-00-00 00:00:00', 'Pay for Gig: <b>Marki</b>', 1),
(85, 6, 1, 3, NULL, 1, 22, 2.40, 2.00, 17.60, 'tokencc_bh_5bzkwc_t2', 'b32ce409b4a76d6f115681fde275f48b3becae96', '2020-05-01 05:15:34', '0000-00-00 00:00:00', 'From Gig: <b>I will write SEO friendly content for a Website</b>', 1),
(86, 5, 0, 3, NULL, 140, 0, 0.00, 0.00, NULL, '4CE4340C3AD8996D', '4eb856552e7d96fb01df11304f533b90c0dbd620', '2020-05-22 05:59:06', '0000-00-00 00:00:00', 'Pay for Gig: <b>رررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررر</b>', 1),
(87, 6, 1, 4, NULL, 140, 0, 0.00, 0.00, 0.00, '4CE4340C3AD8996D', '99746326fe7d6de6ddd62d9b3bd2b1683850da03', '2020-05-22 05:59:06', '0000-00-00 00:00:00', 'From Gig: <b>رررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررر</b>', 1),
(88, 6, 1, 8, NULL, 3, 48, 40.00, 35.20, NULL, '048785A3DC7394D6', '2095aff10e85053587a6995a58f32cc4ec024617', '2020-05-25 15:12:52', '0000-00-00 00:00:00', 'From Gig: <b>I will be your social media marketing manager</b>', 1),
(89, 6, 1, 4, NULL, 140, 0, 0.00, 0.00, NULL, '4CE4340C3AD8996D', '266b1dffd389e1e73a222583c8f4323fa9cf2a06', '2020-05-26 06:57:08', '0000-00-00 00:00:00', 'From Gig: <b>رررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررررر</b>', 1),
(90, 3, 0, 4, 0, NULL, 47, -47.00, 0.00, NULL, '20200620WTEB8B97AB', '58ae01bdaa9a8dca1d5f884d2bfa84e72efeffe7', '2020-06-20 06:13:12', '2020-06-20 06:13:12', 'Withdraw Amount</b>', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coursecontents`
--
ALTER TABLE `tbl_coursecontents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_coursesections`
--
ALTER TABLE `tbl_coursesections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_emailtemplates`
--
ALTER TABLE `tbl_emailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `church_id` (`course_id`),
  ADD KEY `ticket_id` (`course_id`),
  ADD KEY `ad_id` (`course_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_myorders`
--
ALTER TABLE `tbl_myorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orderitems`
--
ALTER TABLE `tbl_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_pdfs`
--
ALTER TABLE `tbl_pdfs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `church_id` (`gig_id`),
  ADD KEY `ticket_id` (`gig_id`),
  ADD KEY `ad_id` (`gig_id`);

--
-- Indexes for table `tbl_pgmlangs`
--
ALTER TABLE `tbl_pgmlangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_savedcourses`
--
ALTER TABLE `tbl_savedcourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_servicemessages`
--
ALTER TABLE `tbl_servicemessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_servicesoffers`
--
ALTER TABLE `tbl_servicesoffers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wallets`
--
ALTER TABLE `tbl_wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `tbl_coursecontents`
--
ALTER TABLE `tbl_coursecontents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_coursesections`
--
ALTER TABLE `tbl_coursesections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_emailtemplates`
--
ALTER TABLE `tbl_emailtemplates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_myorders`
--
ALTER TABLE `tbl_myorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_orderitems`
--
ALTER TABLE `tbl_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_pdfs`
--
ALTER TABLE `tbl_pdfs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pgmlangs`
--
ALTER TABLE `tbl_pgmlangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_savedcourses`
--
ALTER TABLE `tbl_savedcourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_servicemessages`
--
ALTER TABLE `tbl_servicemessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_servicesoffers`
--
ALTER TABLE `tbl_servicesoffers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=611;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tbl_wallets`
--
ALTER TABLE `tbl_wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD CONSTRAINT `tbl_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
