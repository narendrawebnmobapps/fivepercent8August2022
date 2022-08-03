-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2022 at 11:33 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websiwvj_fivepercent`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `set_user_maximum_profitability`
--

CREATE TABLE `set_user_maximum_profitability` (
  `id` int(10) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '0',
  `percentage` float NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_user_maximum_profitability`
--

INSERT INTO `set_user_maximum_profitability` (`id`, `level`, `percentage`, `created_on`) VALUES
(1, 1, 7, '2021-06-23 09:57:40'),
(2, 2, 8, '2021-06-23 09:57:40'),
(3, 3, 9, '2021-06-23 09:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `password_token` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `name`, `email`, `city`, `state`, `password_token`, `created_on`, `updated_on`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', 'Testing Patient', 'pankajmobapps@gmail.com', 'Noida', 'uttar Pradesh', 'gadjagsdjhgaak5a7dasd7as7dasad7a5daqw876gzx', '2019-03-30 11:26:31', '2019-03-30 11:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_age_percent`
--

CREATE TABLE `tbl_admin_age_percent` (
  `id` int(10) NOT NULL,
  `start_point` int(10) NOT NULL,
  `end_point` int(10) NOT NULL,
  `percent_value` int(10) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_age_percent`
--

INSERT INTO `tbl_admin_age_percent` (`id`, `start_point`, `end_point`, `percent_value`, `created_on`) VALUES
(1, 25, 40, 20, '2021-07-19 15:21:48'),
(2, 41, 55, 15, '2019-07-05 06:47:05'),
(4, 56, 100, 10, '2019-11-01 12:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_broker_document`
--

CREATE TABLE `tbl_admin_broker_document` (
  `id` int(10) NOT NULL,
  `broker_id` int(10) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_broker_document`
--

INSERT INTO `tbl_admin_broker_document` (`id`, `broker_id`, `document`, `created_on`, `updated_on`) VALUES
(1, 31, 'Tax Identification Number (TIN)', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(2, 31, 'Passport', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(3, 31, 'Certification of identification', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(4, 32, 'Adhar Card', '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(5, 32, 'Pan Card', '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(6, 32, 'Residence Certifiacte', '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(7, 32, 'Income Certificate', '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(8, 55, 'Test', '2019-10-29 11:42:28', '2019-11-13 11:39:34'),
(9, 56, 'Test', '2019-10-29 15:14:17', '2019-11-13 11:38:37'),
(10, 114, 'asdf', '2021-05-06 17:32:45', '2021-05-06 17:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_broker_services`
--

CREATE TABLE `tbl_admin_broker_services` (
  `id` int(10) NOT NULL,
  `broker_id` int(10) NOT NULL,
  `service` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_broker_services`
--

INSERT INTO `tbl_admin_broker_services` (`id`, `broker_id`, `service`, `created_on`, `updated_on`) VALUES
(1, 31, 'Futures', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(2, 31, 'CFD', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(3, 31, 'Option', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(4, 31, 'Commodities', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(5, 31, 'Currencies', '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(6, 32, 'Home Loan', '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(7, 32, 'Car Loan', '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(8, 32, 'wedding loan', '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(9, 55, 'Test2', '2019-10-29 11:42:28', '2019-11-13 11:39:34'),
(10, 56, 'asdf', '2019-10-29 15:14:17', '2019-11-13 11:38:37'),
(11, 114, 'asdew', '2021-05-06 17:32:45', '2021-05-06 17:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_investments`
--

CREATE TABLE `tbl_admin_investments` (
  `investments_id` int(11) NOT NULL,
  `fund_name` varchar(225) NOT NULL,
  `investment_file` text,
  `fund_commission` double NOT NULL,
  `fund_type` varchar(111) NOT NULL,
  `fund_description` text NOT NULL,
  `dividend` float NOT NULL DEFAULT '0',
  `interest_rate` float NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `investments_type` int(11) NOT NULL COMMENT '1=>IBEX35,2=>VN30	'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_job_type_percent`
--

CREATE TABLE `tbl_admin_job_type_percent` (
  `id` int(10) NOT NULL,
  `job_type` int(10) NOT NULL,
  `percent_value` int(10) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_job_type_percent`
--

INSERT INTO `tbl_admin_job_type_percent` (`id`, `job_type`, `percent_value`, `created_on`) VALUES
(1, 1, 20, '2019-11-07 14:28:41'),
(2, 2, 10, '2019-07-05 08:35:40'),
(3, 3, 10, '2019-07-05 08:35:52'),
(4, 4, 20, '2019-07-05 08:36:00'),
(6, 1, 11, '2021-05-06 15:25:29'),
(7, 1, 23, '2021-05-06 15:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_knowledge_percent`
--

CREATE TABLE `tbl_admin_knowledge_percent` (
  `id` int(11) NOT NULL,
  `start_point` int(11) NOT NULL,
  `end_point` int(11) NOT NULL,
  `percent_value` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_knowledge_percent`
--

INSERT INTO `tbl_admin_knowledge_percent` (`id`, `start_point`, `end_point`, `percent_value`, `created_on`) VALUES
(1, 50, 100, 20, '2019-07-09 07:36:14'),
(2, 30, 49, 15, '2019-07-09 07:36:40'),
(3, 20, 29, 10, '2019-07-09 07:37:37'),
(5, 10, 19, 6, '2019-07-09 07:42:42'),
(6, 0, 9, 34, '2021-07-19 15:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_live_news`
--

CREATE TABLE `tbl_admin_live_news` (
  `id` int(10) NOT NULL,
  `section` int(2) NOT NULL DEFAULT '0' COMMENT '0=>user,1=>Advisor',
  `news_title` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_live_news`
--

INSERT INTO `tbl_admin_live_news` (`id`, `section`, `news_title`, `news_content`, `image`, `category`, `created_on`, `updated_on`) VALUES
(1, 0, 'Capital Goods index 123', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '296607322_10_19021008.jpg', 0, '2019-10-22 13:47:58', '2019-10-22 14:09:34'),
(3, 0, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '295569722_10_19021013.jpg', 0, '2019-10-22 14:13:04', '2019-10-22 14:13:04'),
(4, 0, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '221809522_10_19021013.jpg', 0, '2019-10-22 14:13:30', '2019-10-22 14:13:30'),
(5, 0, 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '490636122_10_19021014.jpg', 0, '2019-10-22 14:14:01', '2019-10-22 14:14:01'),
(6, 0, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '777407022_10_19021014.jpg', 0, '2019-10-22 14:14:25', '2019-10-22 14:14:25'),
(7, 0, '1914 translation by H. Rackham', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', '332617722_10_19021015.png', 0, '2019-10-22 14:15:00', '2019-10-22 14:15:00'),
(8, 1, '1914 translation by H. Rackham', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure', '651698324_03_20010310.jpg', 0, '2020-03-24 13:10:51', '2020-03-24 13:10:51'),
(9, 1, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '275333924_03_20010323.jpg', 0, '2020-03-24 13:23:54', '2020-03-24 13:23:54'),
(10, 0, 'Test may', '  Testing in lock down may', '784915406_05_21050544.jpg', 0, '2021-05-06 15:31:35', '2021-05-06 17:44:52'),
(11, 1, 'Hope TMC gundaraj ends\' say families of slain Bengal BJP workers as they throng for Modi\'s swearing-in', 'New Delhi: The families of BJP workers who were killed in the last one year in political violence in West Bengal arrived in the national capital on Thursday morning to attend the swearing-in ceremony of Prime Minister Narendra Modi this evening.\r\n\r\nSpeaking to ABP News, most family members of the slain BJP workers said it was a matter of pride for them to attend the ceremony and hoped for “TMC gundaraj” to end in the state, a charge the ruling party has vigorously denied.\r\n\r\nThe BJP believes it is a \"gesture of showing respect to our martyrs\". The party has booked their train tickets and informed them personally, BJP leader Mukul Roy had said. The families had received the invitation from the prime minister’s officer, a BJP worker said.\r\n\r\nThe invitation to the kin prompted West Bengal CM to skip the swearing-in ceremony, citing \"untrue\" claims made by the BJP that 54 of its workers were killed in political violence in Bengal. She had earlier expressed her desire to attend the function citing \"constitutional courtesy\" after having spoken to a couple of chief ministers of other states.', '532280707_05_21040551.jpg', 0, '2021-05-07 16:51:43', '2021-05-07 16:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_maritial_status_percent`
--

CREATE TABLE `tbl_admin_maritial_status_percent` (
  `id` int(10) NOT NULL,
  `maritail_status` varchar(50) NOT NULL,
  `no_of_child` int(10) NOT NULL DEFAULT '0',
  `percent_value` int(10) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_maritial_status_percent`
--

INSERT INTO `tbl_admin_maritial_status_percent` (`id`, `maritail_status`, `no_of_child`, `percent_value`, `created_on`) VALUES
(1, 'Single', 0, 20, '2019-07-05 09:50:10'),
(2, 'Married', 1, 18, '2019-07-05 10:28:20'),
(3, 'Divorced', 1, 18, '2019-07-05 10:28:28'),
(5, 'Married', 2, 15, '2019-07-05 10:29:11'),
(6, 'Divorced', 2, 15, '2019-07-05 10:29:27'),
(7, 'Married', 3, 10, '2019-07-05 10:29:46'),
(8, 'Divorced', 3, 10, '2019-07-05 10:29:55'),
(10, 'Single', 0, 12, '2021-05-06 15:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_referral_code`
--

CREATE TABLE `tbl_admin_referral_code` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `referral_code` varchar(255) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_referral_code`
--

INSERT INTO `tbl_admin_referral_code` (`id`, `user_id`, `referral_code`, `status`, `created_on`) VALUES
(2, 27, 'F20200109171647', 1, '2020-01-09 17:16:47'),
(3, 26, 'F20200109171653', 1, '2020-01-09 17:16:53'),
(4, 67, 'F20200109171659', 1, '2020-01-09 17:16:59'),
(5, 69, 'F20200109171712', 1, '2020-01-09 17:17:12'),
(8, 25, 'F20200109181930', 1, '2020-01-09 18:19:30'),
(9, 28, 'F20200122152800', 1, '2020-01-22 15:28:00'),
(10, 71, 'F20200124083904', 1, '2020-01-24 08:39:04'),
(11, 66, 'F20200124144539', 1, '2020-01-24 14:45:39'),
(12, 68, 'F20200124144837', 1, '2020-01-24 14:48:37'),
(13, 58, 'F20200124144857', 1, '2020-01-24 14:48:57'),
(14, 64, 'F20200124144936', 1, '2020-01-24 14:49:36'),
(15, 73, 'F20200127103254', 1, '2020-01-27 10:32:54'),
(16, 74, 'F20200127105051', 1, '2020-01-27 10:50:51'),
(17, 78, 'F20200128111225', 1, '2020-01-28 11:12:25'),
(18, 81, 'F20200128123556', 1, '2020-01-28 12:35:56'),
(19, 82, 'F20200128124436', 1, '2020-01-28 12:44:36'),
(20, 83, 'F20200129075928', 1, '2020-01-29 07:59:28'),
(21, 86, 'F20200129112840', 1, '2020-01-29 11:28:40'),
(22, 79, 'F20200129121831', 1, '2020-01-29 12:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_stock`
--

CREATE TABLE `tbl_admin_stock` (
  `id` int(10) NOT NULL,
  `stock_type` int(10) NOT NULL COMMENT '1=>IBEX35,2=>VN30',
  `stock_name` varchar(255) NOT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `stock_file` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `volatility` float NOT NULL DEFAULT '0',
  `beta` float NOT NULL DEFAULT '0',
  `dividend` float NOT NULL DEFAULT '0',
  `interest_rate` float NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '1',
  `industry_id` int(10) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nonCurrentAssets` float NOT NULL DEFAULT '0',
  `currentAssets` float NOT NULL DEFAULT '0',
  `cash` float NOT NULL DEFAULT '0',
  `netReceivable` float NOT NULL DEFAULT '0',
  `inventory` float NOT NULL DEFAULT '0',
  `otherCurrentAssets` float NOT NULL DEFAULT '0',
  `equity` float NOT NULL DEFAULT '0',
  `nonCurrentLiabilities` float NOT NULL DEFAULT '0',
  `currentLiabilities` float NOT NULL DEFAULT '0',
  `debtBorrowing` float NOT NULL DEFAULT '0',
  `debtQuality` float NOT NULL DEFAULT '0',
  `liquidityLiquidity` float NOT NULL DEFAULT '0',
  `liquidityTreasury` float NOT NULL DEFAULT '0',
  `liquidityAcidTest` float NOT NULL DEFAULT '0',
  `forwardPE_PER` float NOT NULL DEFAULT '0',
  `pegRatio_PEG` float NOT NULL DEFAULT '0',
  `otherBeta` float NOT NULL DEFAULT '0',
  `otherDividendRate` float NOT NULL DEFAULT '0',
  `otherOperatingMargin` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_stock`
--

INSERT INTO `tbl_admin_stock` (`id`, `stock_type`, `stock_name`, `symbol`, `stock_file`, `price`, `volatility`, `beta`, `dividend`, `interest_rate`, `status`, `industry_id`, `created_on`, `nonCurrentAssets`, `currentAssets`, `cash`, `netReceivable`, `inventory`, `otherCurrentAssets`, `equity`, `nonCurrentLiabilities`, `currentLiabilities`, `debtBorrowing`, `debtQuality`, `liquidityLiquidity`, `liquidityTreasury`, `liquidityAcidTest`, `forwardPE_PER`, `pegRatio_PEG`, `otherBeta`, `otherDividendRate`, `otherOperatingMargin`) VALUES
(62, 2, 'Repsol, S.A.', 'REPYY', 'e4d1d917f1fc6cb399a248ae724b05ec.csv', 12.225, 2.27, 0, 0, 0, 1, 5, '2022-03-16 11:21:54', 75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 2, 'ICICI Bank Limited', 'ICICIBANK.NS', '7ab5a8de4aa74cde02cd4f9325c81954.csv', 284, 2.07, 0, 0, 0, 1, 1, '2022-03-16 11:19:19', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 2, 'Ho Chi Minh City Development Joint Stock Commercial Bank', 'HDB', '7684d3ef17473ceadf392dea0c36ff41.csv', 25650, 2.58, 0, 0, 0, 1, 10, '2022-03-16 11:37:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 2, 'Apple Inc.', 'AAPL', '7a79f6e8be1a6a8b8ad26c916a4f3281.csv', 72.45, 6.4, 0, 0, 0, 1, 6, '2022-03-16 11:17:05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 2, 'Core Scientific, Inc.', 'CORZ', '9bc21d339a0f02c1e3463b47be5443be.csv', 7.35, 4.29, 0, 0, 0, 1, 6, '2022-03-16 11:23:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 2, 'ALPHABET CLASSE A', 'GOOGL.MI', 'dfbe14dd2477301f3e239c48df84adc6.csv', 2519.02, 1.87, 0, 0, 0, 1, 12, '2022-03-16 11:24:33', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 1, 'Acerinox', 'ACX.MC', 'eb1915f5210670ce433c9b330a8f07ed.csv', 10, 2.38, 0, 0, 0, 1, 5, '2022-05-26 15:07:59', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 1, ' ACS', 'ACS.MC', 'a9660826822fcefdd846b01a6c17e05c.csv', 10.2167, 1.23, 0, 0, 0, 1, 6, '2022-05-13 15:16:46', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 1, 'AENA', 'AENA.MC', '5ba1ff17493dd4807366eb1d570d3044.csv', 65.1, 1.46, 0, 0, 0, 1, 6, '2022-05-26 15:17:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 1, 'Amadeus', 'AMS.MC', 'a2ba98bd0e5beea89b19d56d2b7e17ec.csv', 11, 1.68, 0, 0, 0, 1, 6, '2022-05-26 15:19:08', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 1, 'ArcelorMittal', 'MTS.MC', 'a0f378d0af836a3a0148ee77a38ee5e8.csv', 57.0019, 3.78, 0, 0, 0, 1, 4, '2022-05-26 15:21:10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 1, 'Bankinter', 'BKT.MC', 'a756d2fd184489cf87b60fc58041a8d5.csv', 48.9103, 11.3, 0, 0, 0, 1, 5, '2022-05-26 15:29:44', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 1, 'Bankia', 'SAN.MC', 'b83f1bc0d5b6e4802e37772a0e940f5e.csv', 9.95326, 2.6, 0, 0, 0, 1, 7, '2022-05-26 15:27:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 1, 'BBVA', 'BBVA.MC', 'd4fb8a86aa59b446e6fcd14ede7cfbc9.csv', 13.6906, 2.32, 0, 0, 0, 1, 9, '2022-05-26 15:31:34', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 1, 'CaixaBank', 'CABK.MC', '93b92c70b73a7073e717d390369c442b.csv', 5.44, 2.19, 0, 0, 0, 1, 14, '2022-05-26 15:34:53', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 1, 'Cellnex Telecom', 'CLNX.MC', '4a56b89f05450e0e7aade340782536ce.csv', 13.6703, 1.47, 0, 0, 0, 1, 9, '2022-05-26 15:36:39', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 1, 'Cie Automotive', 'CIE.MC', '5510984b606cca59edcd5b8a96eff3e3.csv', 1.2487, 2, 0, 0, 0, 1, 6, '2022-05-13 16:52:33', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 1, 'Colonial', 'COL.MC', '1b856f35b701f57f51eb4cec8a358e27.csv', 146.059, 3.38, 0, 0, 0, 1, 8, '2022-05-26 15:39:53', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 1, 'Enagas', 'ENG.MC', '55296229c479d04a7e8113d17964ecda.csv', 6.15, 1.3, 0, 0, 0, 1, 14, '2022-05-26 15:43:17', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 1, 'Ence', 'ENC.MC', '94b2bc61d21ecee1af19779bf4457690.csv', 1.86444, 1.37, 0, 0, 0, 1, 1, '2022-05-13 17:03:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 1, 'Endesa', 'ELE.MC', '87dc2119681442a084d62a101433db93.csv', 19.7, 1.96, 0, 0, 0, 1, 4, '2022-05-13 17:06:56', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 1, 'Ferrovial', 'FER.MC', '6275268aa9795a5f77dd3b90d9052e2e.csv', 16, 2.21, 0, 0, 0, 1, 5, '2022-05-13 17:09:34', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 1, 'Grifols', 'GRF.MC', '8aba4036b3dc9fa5ad7493191d97c2c7.csv', 2.49, 2.67, 0, 0, 0, 1, 9, '2022-05-26 16:00:46', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 1, 'IAG', 'IAG.MC', '27ea09cc5362e0767f45a539a5893296.csv', 3.25, 2.31, 0, 0, 0, 1, 7, '2022-05-26 15:57:16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 1, 'Iberdrola', 'IBE.MC', '0eaa7b71c5d208ca6f9d997bed183cba.csv', 3.4125, 1.55, 0, 0, 0, 1, 7, '2022-05-13 17:28:14', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 1, ' IBEX 35', '^IBEX', 'de59516b4b35e6533e4beb499dd8dd1b.csv', 2826.8, 0.87, 0, 0, 0, 1, 2, '2022-05-13 17:30:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 1, 'Inditex', 'ITX.MC', 'aa1c89979b09e70a709d670917e2176d.csv', 3.6, 2.1, 0, 0, 0, 1, 1, '2022-05-26 15:53:24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 1, 'Indra Sistemas', 'IDR.MC', '3a9a2af2b0818caf08ddbd9e03e86c91.csv', 12.2, 2.65, 0, 0, 0, 1, 7, '2022-05-13 17:35:45', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, 1, 'Mapfre', 'MAP.MC', '9f20e312d248f384e277748eaf8e2760.csv', 1.28632, 1.78, 0, 0, 0, 1, 7, '2022-05-13 18:55:23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, 1, 'Mediaset Espana', 'TL5.MC', '832b289cf2bcc62d3555e64a38179331.csv', 10.8581, 1.69, 0, 0, 0, 1, 8, '2022-05-16 10:16:36', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, 1, 'Melia Hotels', 'MEL.MC', '8e775f044196a376306b5c1f8d16b01a.csv', 11.6, 2.32, 0, 0, 0, 1, 13, '2022-05-16 10:19:32', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 1, 'Merlin Properties Socimi', 'MRL.MC', 'e124e05f6b652b8236813c0fea5bb742.csv', 8.81195, 1.49, 0, 0, 0, 1, 9, '2022-05-16 10:30:38', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 1, 'Naturgy Energy Group', 'NTGY.MC', 'c22c4685b944a3aad2e96f6c76447921.csv', 19.4765, 1.92, 0, 0, 0, 1, 4, '2022-05-16 10:33:57', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(101, 1, 'Red Electrica', 'RED.MC', '664374f90a35cd19343a9e712809eb54.csv', 1.5225, 2.17, 0, 0, 0, 1, 5, '2022-07-06 15:46:44', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 1, 'Repsol', 'REP.MC', '659251d49a39936d06d53a176f7e4833.csv', 23, 2.24, 0, 0, 0, 1, 1, '2022-05-16 10:49:06', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, 1, 'Santander', 'SAN.MC', '92dae4f734f7f1fcadab851da0d62e19.csv', 2.74, 2.42, 0, 0, 0, 1, 8, '2022-06-15 13:58:39', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(104, 1, 'Siemens Gamesa', 'SGRE.MC', '451334a577cf386df714bdc7fdb09361.csv', 4.90332, 1.93, 0, 0, 0, 1, 1, '2022-05-16 11:00:48', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 1, 'Telefonica', 'TEF.MC', '92b9035bc83d82df2031a4e55bd5f186.csv', 25.5572, 2.74, 0, 0, 0, 1, 4, '2022-05-26 15:47:09', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 1, 'Viscofan', 'VIS.MC', '75d50d0b81df6a02afb47224228931b7.csv', 7.98, 2.22, 0, 0, 0, 1, 4, '2022-05-16 11:04:42', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, 1, 'Acciona', 'ANA.MC', 'eb5de4f3e7e5b1efc3f1d69dab40e5cb.csv', 55.6, 2, 0, 0, 0, 1, 1, '2022-05-26 15:02:23', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, 2, 'Commercial Bank for Trade of Vietnam', '', '653b743b7a356defe87b7f30597f5137.csv', 70.5, 1.93, 0, 0, 0, 1, 4, '2022-05-16 12:23:02', 60, 40, 20, 10, 5, 5, 40, 30, 30, 0, 0, 0, 0, 0, 10, 5, 1.5, 0.69, 10.26),
(109, 2, 'Cotec Construction JSC', '', '62548caa50e21701779b56f9b5b83099.csv', 102.4, 1.94, 0, 0, 0, 1, 14, '2022-05-16 12:24:53', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(110, 2, 'DHG Pharmaceutical JSC', '', '584ed8db26d2a092fb2989d483308777.csv', 106.2, 1.93, 0, 0, 0, 1, 4, '2022-05-16 12:26:20', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(111, 2, 'Faros Construction Corp', '', '057ac2696d5892ef68b57a9f990a6f90.csv', 29.95, 3.5, 0, 0, 0, 1, 1, '2022-05-16 12:27:44', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, 2, 'FPT Corp', '', 'd2c635987290cd4e0f353bcc5236e3df.csv', 46.15, 1.64, 0, 0, 0, 1, 4, '2022-05-16 12:28:57', 30, 70, 20, 20, 20, 10, 60, 30, 10, 70, 29, 4, 1, 2.5, 10, 3, 2.5, 1.2, 2),
(113, 2, 'Gemadept Corp', '', 'bbe12d76cdee9a1dad33e0c0fe8ba189.csv', 26.4, 2.01, 0, 0, 0, 1, 1, '2022-05-16 12:30:03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, 2, 'Ho Chi Minh City Commercial Bank', '', '243af4a8b75004c2e3cc8881c53caf89.csv', 26.6, 2.31, 0, 0, 0, 1, 6, '2022-05-16 12:31:55', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(115, 2, 'Ho Chi Minh City Infraestructure Investment', '', '2bd60a6cf4480ac98270cb110a55e876.csv', 22.45, 1.91, 0, 0, 0, 1, 12, '2022-05-16 12:33:05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, 2, 'Hoa Phat Group', '', '50d5612cae981c761e3dc2b75a183fa6.csv', 22.9, 2.44, 0, 0, 0, 1, 6, '2022-05-16 12:34:44', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, 2, 'Masan Group Corp', '', 'ca56a497b303e7c6eb95940ed0c8888d.csv', 85.5, 1.94, 0, 0, 0, 1, 6, '2022-05-16 12:35:39', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, 2, 'Military Commercial Bank', '', 'a05a715b9783118386e180f02f491797.csv', 20.85, 1.87, 0, 0, 0, 1, 10, '2022-05-16 12:37:22', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, 2, 'Mobile World Investment Corp', '', '08f97e82720dcc8dda5fc4d2e673fc9a.csv', 92.8, 2.16, 0, 0, 0, 1, 8, '2022-05-16 12:39:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, 2, 'No Va Land Investment Group Corp', '', '8946cbeb325f4208b788cb4f99631e85.csv', 59.9, 2.07, 0, 0, 0, 1, 9, '2022-05-16 12:40:08', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(121, 2, 'PetroVietnam Fertilizer and Chemicals Corp', '', '088c637dcd05891245eb157e22f300ef.csv', 15.65, 1.58, 0, 0, 0, 1, 8, '2022-05-16 12:40:59', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(122, 2, 'Petrovietnam Gas JSC', '', '6c3d11dfce3fdd1c8f94653f50a2a4c0.csv', 104.7, 2.36, 0, 0, 0, 1, 7, '2022-05-16 12:43:07', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(123, 2, 'Phu Nhuan Jewelry JSC', '', 'caf4ddbcb0fce4fcc19c470918279dd3.csv', 72.8, 2.66, 0, 0, 0, 1, 2, '2022-05-16 12:44:05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 2, 'Refrigeration Electrical Engineering Corp', '', '9b8d9cd97549d2d32cef6d3e38f6aa2b.csv', 32, 1.68, 0, 0, 0, 1, 10, '2022-05-16 12:45:28', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, 2, 'Sai Gon Thuong Tin Commercial Bank', '', '127b7ac8965ff77807518d4e5c1a38b7.csv', 11.5, 2.3, 0, 0, 0, 1, 12, '2022-05-16 12:47:04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, 2, 'Saigon Beer Alcohol Beverage Corp', '', '93226d8ebd1501cf77bf68579a8478ad.csv', 282, 1.91, 0, 0, 0, 1, 14, '2022-05-16 12:48:06', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, 2, 'Saigon Securities Incorporation', '', 'fe7770d48dd30e1a67d404640aefb189.csv', 24.8, 1.92, 0, 0, 0, 1, 9, '2022-05-16 12:49:39', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, 2, 'Thanh Thanh Cong Tay Ninh', '', '0a737c59d02a219d783f1a0c18fa7577.csv', 17.15, 2.21, 0, 0, 0, 1, 1, '2022-05-16 12:50:52', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, 2, 'Vietjet Aviation', '', 'd3d1587646539dcafe7287b6ec090c87.csv', 124.2, 1.92, 0, 0, 0, 1, 5, '2022-05-16 12:53:50', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, 2, 'Vietnam Commercial Bank for Industry and Trade', '', '4de607ab703d05023b93fb20cf75bba3.csv', 20.9, 2.14, 0, 0, 0, 1, 8, '2022-05-16 12:55:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, 2, 'Vietnam Dairy Products', '', '68ea7b99b5b9c75c68e9dbc97a07598a.csv', 123.5, 1.66, 0, 0, 0, 1, 2, '2022-05-16 12:56:35', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, 2, 'Vietnam Export Import Commercial Bank', '', '65a1f09022525fcbb81183d855356a8c.csv', 18.45, 2, 0, 0, 0, 1, 9, '2022-05-16 12:57:40', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 2, 'Vietnam Prosperity Commercial Bank', '', 'ab73af563be16ca60ba589ad522c5866.csv', 18.1, 2.41, 0, 0, 0, 1, 7, '2022-05-16 12:58:55', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, 2, 'Vietnam Technological And Commercial Bank', '', '0e098b1310da67f56bddd0987c114f94.csv', 20.4, 1.94, 0, 0, 0, 1, 6, '2022-05-16 13:08:05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, 2, 'Vincom Retail', '', 'c3719cff5dc1effa35504000667952bb.csv', 34.35, 2.5, 0, 0, 0, 1, 1, '2022-05-16 13:09:24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 2, 'Vingroup', '', 'b5149774a3757ad1390aaebabcb855cf.csv', 116.9, 1.81, 0, 0, 0, 1, 12, '2022-05-16 13:11:38', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, 2, 'Vinhomes', '', 'cd792ffb09132a457166ef1526f20900.csv', 79, 2.29, 0, 0, 0, 1, 9, '2022-05-16 13:12:38', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, 2, 'VN 30', '', '69ccb75cae30e64b08705a9023009c8e.csv', 86681, 89.07, 0, 0, 0, 1, 12, '2022-05-16 13:14:35', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, 1, 'BancoSabadell', 'SAB.MC', '2128ff66b9b1d04369e51c17db1eaa81.csv', 2.74141, 1.77, 0, 0, 0, 1, 1, '2022-05-26 15:23:36', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_stock_configuration`
--

CREATE TABLE `tbl_admin_stock_configuration` (
  `id` int(11) NOT NULL,
  `typeOfRisk` varchar(50) NOT NULL,
  `startPoint` float NOT NULL DEFAULT '0',
  `endPoint` float NOT NULL DEFAULT '0',
  `riskCheck` int(2) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_stock_configuration`
--

INSERT INTO `tbl_admin_stock_configuration` (`id`, `typeOfRisk`, `startPoint`, `endPoint`, `riskCheck`, `created_on`) VALUES
(1, 'CONSERVATIVE', 0, 10, 1, '2020-10-19 11:04:10'),
(2, 'MODERATE', 10, 20, 2, '2020-10-19 11:04:10'),
(3, 'RISKY', 20, 50, 3, '2020-10-19 11:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_stock_historical_data`
--

CREATE TABLE `tbl_admin_stock_historical_data` (
  `id` bigint(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `historical_date` date NOT NULL,
  `price` float NOT NULL,
  `open` float NOT NULL,
  `high` float NOT NULL,
  `low` float NOT NULL,
  `volume` varchar(50) NOT NULL,
  `change_percent` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_stock_industries`
--

CREATE TABLE `tbl_admin_stock_industries` (
  `id` int(10) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_stock_industries`
--

INSERT INTO `tbl_admin_stock_industries` (`id`, `industry`, `created_on`, `updated_on`) VALUES
(1, 'Financials', '2021-03-11 18:36:04', '2021-03-15 18:37:43'),
(2, 'Utilities', '2021-03-11 18:36:12', '2021-03-09 18:37:52'),
(3, 'Consumer Staples', '2021-03-11 18:36:18', '2021-03-06 18:45:45'),
(4, 'Energy', '2021-03-03 18:36:24', '2021-03-17 18:45:51'),
(5, 'Healthcare', '2021-03-02 18:36:32', '2021-03-21 18:45:57'),
(6, 'Industrials', '2021-03-02 18:36:47', '2021-03-01 18:46:03'),
(7, 'Technology', '2021-03-07 18:37:00', '2021-03-30 18:46:07'),
(8, 'Telecom', '2021-03-31 18:37:08', '2021-03-31 18:46:12'),
(9, 'Materials', '2021-03-02 18:37:16', '2021-03-09 18:46:17'),
(10, 'Real Estate', '2021-03-08 18:37:22', '2021-03-02 18:46:25'),
(12, 'Online Marketing', '2020-07-19 15:12:52', '2020-07-06 15:19:50'),
(13, 'QAS', '2021-05-06 15:33:35', '2021-05-06 15:33:44'),
(14, 'Index', '2021-07-21 16:02:06', '2021-07-21 16:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_stock_news`
--

CREATE TABLE `tbl_admin_stock_news` (
  `id` int(10) NOT NULL,
  `news_title` text NOT NULL,
  `news_content` text NOT NULL,
  `image` text NOT NULL,
  `news_date` date DEFAULT NULL,
  `actual` varchar(50) NOT NULL,
  `forecast` varchar(50) NOT NULL,
  `previous` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Currency,2=>Microeconomical,3=>Oil,4=>Portfolio,5=>Learning',
  `category` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_stock_news`
--

INSERT INTO `tbl_admin_stock_news` (`id`, `news_title`, `news_content`, `image`, `news_date`, `actual`, `forecast`, `previous`, `link`, `type`, `category`, `status`, `created_on`) VALUES
(1, 'War on terror not ending, must go on spree like Americans after 9/11 attack: CDS Gen Bipin Rawat', 'Chief of Defence Staff (CDS) General Bipin Rawat has said the war on terror is nowhere near an end and in order to put an end to it, the roots of terrorism need to be understood.\r\n\r\nSpeaking at an event in Delhi on Thursday, General Bipin Rawat said, \"The war on terror is not ending, it is something which is going to continue, we will have to live with it, until we understand and get to the roots of terrorism.\"\r\n\r\nGeneral Rawat also called for the international isolation of Pakistan.\r\n\r\n\"We have to bring an end to terrorism and that can only happen the way Americans started after the 9/11 terror attack. They said let\'s go on a spree on global war on terror. To do that you have to isolate the terrorists and anybody who is sponsoring terrorism has to be taken to task,\" the Chief of Defence Staff observed.\r\n\r\nThe CDS went on to add, \"Terrorism is here to stay so long as there are going to be states that are going to sponsor terrorism and they are going to use terrorists as proxies, make weapons available to them, make funding for them, then we can\'t control terrorism.\"\r\n\r\nGen Bipin Rawat also lauded the efforts of international terror watchdog, Financial Action Task Force (FATF), and said countries sponsoring terrorism must be taken to task.\r\n\r\n\"Any country which is sponsoring terrorism has to be taken to task. I feel one of the measures adopted is of blacklisting by Financial Action Task Force (FATF) is one good measure. Diplomatic isolation, you have to do this,\" Gen Rawat said.', '540266216_01_20120140.jpg', '2020-02-06', '205%', '0.5%', '6.0%', '', 1, 0, 1, '0000-00-00 00:00:00'),
(3, 'War on terror not ending, must go on spree like Americans after 9/11 attack: CDS Gen Bipin Rawat', 'Chief of Defence Staff (CDS) General Bipin Rawat has said the war on terror is nowhere near an end and in order to put an end to it, the roots of terrorism need to be understood.\r\n\r\nSpeaking at an event in Delhi on Thursday, General Bipin Rawat said, \"The war on terror is not ending, it is something which is going to continue, we will have to live with it, until we understand and get to the roots of terrorism.\"\r\n\r\nGeneral Rawat also called for the international isolation of Pakistan.\r\n\r\n\"We have to bring an end to terrorism and that can only happen the way Americans started after the 9/11 terror attack. They said let\'s go on a spree on global war on terror. To do that you have to isolate the terrorists and anybody who is sponsoring terrorism has to be taken to task,\" the Chief of Defence Staff observed.\r\n\r\nThe CDS went on to add, \"Terrorism is here to stay so long as there are going to be states that are going to sponsor terrorism and they are going to use terrorists as proxies, make weapons available to them, make funding for them, then we can\'t control terrorism.\"\r\n\r\nGen Bipin Rawat also lauded the efforts of international terror watchdog, Financial Action Task Force (FATF), and said countries sponsoring terrorism must be taken to task.\r\n\r\n\"Any country which is sponsoring terrorism has to be taken to task. I feel one of the measures adopted is of blacklisting by Financial Action Task Force (FATF) is one good measure. Diplomatic isolation, you have to do this,\" Gen Rawat said.', '499806516_01_20010100.jpg', '2020-02-17', '', '', '', '', 2, 0, 1, '2020-01-16 12:59:35'),
(4, 'Astonishing story of Australian camels. Why thousands of them are shot dead routinely', 'The year was 1606. Europe by now had established itself as the leader in the \'age of discovery\'. Undertaking long overseas expeditions to \'discover\' unvisited distant lands had gained currency by then. India was already \'discovered\' via sea route, so were Africa, North and South Americas. It was in this backdrop that Dutch explorer Willem Janszoon made landfall in Australia on February 26, 1606 and became the first European to reach the continent.\r\n\r\nIn his first visit, Janszoon barely stayed in Australia, which back then was sparsely inhabited by the Aboriginals. Had he stayed put and ventured into the vast arid outback Australia, his experience of seeing the terrain may not have been very different from a similar venture today, albeit a major exception--Camels.\r\n\r\nFour-hundred-and-forty-four years ago when Janszoon landed in Australia, the humped mammals were nowhere to be seen on the continent. Not a single one of them existed back then.\r\n\r\nCut to 2020, Australia has the world\'s largest herd of wild camels and their population is estimated to be about 3,00,000, spread across 37 per cent of the Australian mainland. Fed up with its camels, Australia has declared them to be a \"pest\" and treats them as an alien invasive species that must be urgently stopped from spreading.\r\n\r\nThe most widely used method to check their population is aerial culling in which thousands of wild camels are shot down by snipers using helicopters.', '805739616_01_20010111.jpg', '2020-04-30', '', '', '', '', 2, 0, 1, '2020-01-16 13:11:16'),
(5, '84% foreign-educated doctors flunk screening test required to practice in India', 'earth of MBBS seats along with difficulty in getting admissions in medical colleges is forcing aspiring Indian doctors to explore learning opportunities abroad. Thousands of such aspiring doctors have enrolled in foreign universities over the years, spent lakhs of rupees as tuition and accommodation fee, and dedicated 5-6 years pursuing the course. But latest data show this investment is proving to be unproductive for a majority with nearly 84 per cent failing to clear the mandatory test required to practice in India.\r\n\r\nIndian laws allow students to pursue MBBS courses from universities abroad. But in order to get a license to practice in India, they are required to qualify the Foreign Medical Graduate Examination (FMGE) conducted by the National Board of Examination (NBE).\r\n\r\nClearing FMGE test is mandatory for all doctors who have earned their MBBS degree from a foreign country. Only those who earn their MBBS and post-graduate degrees from Australia, Canada, New Zealand, the UK and the US are exempted from this test. Besides earning their degrees from these five countries, these students (in case they want to practice in India) also have to be recognised for enrollment as medical practioners in the respective countries.\r\n\r\nReplying to written questions in the Lok Sabha on November 29 and December 6 during the Winter Session of Parliament, the Union health ministry accepted that a majority of foreign-educated doctors are finding it hard to qualify the screening test.\r\n\r\nCalling out these institutions for poor performance of their students, the government said they \"admit Indian students without proper assessment\" of the students\' academic ability to cope up with medical education, resulting in a situation where many students fail to qualify the screening', '549562116_01_20010112.jpg', '2020-03-18', '', '', '', '', 3, 0, 1, '2020-01-16 13:12:39'),
(6, 'Get Your Time Zone', 'If the time you got back from the code is not correct, it\'s probably because your server is in another country or set up for a different timezone.\r\n\r\nSo, if you need the time to be correct according to a specific location, you can set the timezone you want to use.\r\n\r\nThe example below sets the timezone to \"America/New_York\", then outputs the current time in the specified format:', '417400116_01_20020102.jpg', '2020-04-30', '', '', '', '', 4, 0, 1, '2020-01-16 14:02:55'),
(7, 'What is a coronavirus? Here is your complete visual guide', 'On January 30, the World Health Organisation (WHO) declared the new coronavirus epidemic a Public Health Emergency of International Concern, or PHEIC. The same alert was issued for Ebola in the Democratic Republic of Congo last year, and for Zika in 2016.\r\nOn January 30, the World Health Organisation (WHO) declared the new coronavirus epidemic a Public Health Emergency of International Concern, or PHEIC. The same alert was issued for Ebola in the Democratic Republic of Congo last year, and for Zika in 2016.\r\nOn January 30, the World Health Organisation (WHO) declared the new coronavirus epidemic a Public Health Emergency of International Concern, or PHEIC. The same alert was issued for Ebola in the Democratic Republic of Congo last year, and for Zika in 2016.', '236534001_02_20030247.jpg', '2020-02-29', '', '', '', 'http://mobileandwebsitedevelopment.com/fivepercent/users/dashboard/stock_news_details/Nw==', 5, 0, 1, '2020-02-01 15:47:37'),
(8, 'No one in BJP worthy of becoming CM of Delhi: Arvind Kejriwal', 'No one in the BJP is worthy of becoming the chief minister of Delhi, AAP supremo and Chief Minister Arvind Kejriwal said on Thursday, the last day of campaigning before the February 8 assembly elections.\r\n\r\nPeople want to know who will be the BJP\'s chief ministerial candidate, Kejriwal told PTI in an interview, and asked what if the party chooses Sambit Patra or Anurag Thakur for the post.\r\n\r\nHe said the Bharatiya Janata Party had tried to polarise the assembly polls, and asserted that results will show if it succeeded or not.\r\n\r\n\"AAP voters are those who want good education, medical treatment, modern roads, 24-hour electricity,\" Kejriwal said.\r\n\r\nDiscussing the anti-CAA protests at Shaheen Bagh, the AAP national convener alleged that the BJP has not cleared the Shaheen Bagh road because of the assembly elections.\r\n\r\n\"What stopped Union Home Minister Amit Shah from clearing the stretch. What is Amit Shah\'s interest in keeping the road blocked? Why do they want to trouble the people of Delhi and do dirty politics over the protests?\" Kejriwal asked.\r\n\r\nContinuing his attack on the BJP, he added that the saffron party\'s leaders have \"completely forgotten\" the city\'s unauthorised colonies and are misleading the people.\r\n\r\n\"Delhi government\'s \'free schemes\' will continue if AAP voted back to power, we will introduce more schemes if needed,\" said Kejriwal.', '830295306_02_20030252.png', '2020-11-16', '502', '12%', '0.5%', '', 1, 0, 1, '2020-02-06 15:52:19'),
(9, 'learning news', 'jhg ahsfgjh ahsgdhjags', '510167713_03_20100345.jpg', '2020-10-10', '10', '10', '50', '', 5, 0, 1, '2020-03-13 10:45:42'),
(10, 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK', 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK', '523134118_03_20120348.PNG', '2020-03-28', '', '', '', '#', 1, 0, 1, '2020-03-18 12:48:26'),
(11, 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK', 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKvvA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UKA Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK', '552262918_03_20120349.PNG', '2020-03-10', '23', '22', '3', '#', 1, 0, 1, '2020-03-18 12:49:14'),
(12, 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK', 'a', '240347318_03_20120351.PNG', '2020-03-30', '', '', '', '', 2, 0, 1, '2020-03-18 12:51:25'),
(13, 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK	', 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK	', '687718918_03_20030300.PNG', '2020-04-10', '22', '3', '2', '#', 1, 0, 1, '2020-03-18 15:00:18'),
(14, 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK	', 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK	', '844430318_03_20030300.PNG', '2020-04-22', '2', '4', '6', '#', 1, 0, 1, '2020-03-18 15:00:52'),
(15, 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK	', 'A Chilling British Study Predicted 22 Lakh Coronavirus Deaths in US, 5 Lakh in UK	', '491198118_03_20030301.PNG', '2020-02-20', '3', '4', '32', '#', 1, 0, 1, '2020-03-18 15:01:25'),
(16, 'codenn/valid.txt at master sriniiyer/codenn GitHub 7100995 ...', 'codenn/valid.txt at master sriniiyer/codenn GitHub 7100995 ...', '867566219_03_20020334.PNG', '2020-03-28', '234', '23', '234', '23', 1, 0, 1, '2020-03-19 14:34:55'),
(17, 'UK public inquiry on COVID response? Not yet but sometime, minister says', 'LONDON, March 18 (Reuters) - British Housing Secretary Robert Jenrick said it was not yet the time to have a formal public inquiry into the government\'s handling of the COVID-19 pandemic but that there might be a time in the future to look back to learn lessons.\r\n\r\nAsked about a public inquiry, Jenrick said the government\'s focus right now had to be the rollout of the vaccine.\r\n\r\n\"We are capable of learning lessons,\" Jenrick told BBC radio. \"There will come a time when we can do something more formal and look back and learn the lessons.\"', '320275618_03_21020312.png', '2021-03-31', '3.5', '5', '6', '3.3', 1, 0, 1, '2021-03-18 14:12:44'),
(18, 'German DAX hits record high as automakers rally', '(For a Reuters live blog on U.S., UK and European stock markets, click LIVE/ or type LIVE/ in a news window)\r\n\r\nMarch 18 (Reuters) - Automakers lifted the German DAX to a record high on Thursday, while euro zone blue-chip stocks jumped to pre-pandemic levels after the U.S. Federal Reserve vowed to keep interest rates low despite forecasting a surge in economic growth.\r\n\r\nAn index of euro zone\'s top 50 companies .STOXX50E gained 0.3% in early trading, briefly surpassing its peak hit in February last year before the COVID-19 pandemic hammered financial markets.\r\n\r\nGermany\'s blue-chip DAX .GDAXI rose 0.7%, France\'s CAC 40 .FCHI was up 0.2%, while UK\'s FTSE 100 .FTSE slipped 0.1% ahead of the Bank of England\'s monetary policy decision due later in the day. wider pan-European STOXX 600 .STOXX rose 0.3% and was trading less than 2% below its all-time high.\r\n\r\nWith the 10-year U.S. Treasury yield US10YT=RR rising in after the Fed decision, economically sensitive sectors such as automakers .SXAP , banks .SX7P , miners .SXPP and travel & leisure .SXTP led the gains in Europe. VOWG_p.DE jumped 6.1%, sealing its position as the most valuable company in Germany\'s DAX after it overtook software maker SAP SAPG.DE on Wednesday. considered as bond-proxies such as utilities .SX6P , food & beverage .SX3P and healthcare stocks .SXDP were trading lower.', '619149118_03_21020320.jpg', '2021-03-27', '5', '4', '3', 'https://in.investing.com/news/german-dax-hits-record-high-as-automakers-rally-2652364', 5, 0, 1, '2021-03-18 14:20:13'),
(19, 'Mamata Banerjee Appeals For Calm After 12 Killed In Post-Poll Violence', 'Mamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll ViolenceMamata Banerjee Appeals For Calm After 12 Killed In Post-Poll Violence', '449667106_05_21050520.jpg', '2021-05-13', '12', '123', '24343', 'https://www.ndtv.com/india-news/bengal-election-results-2021-centre-', 1, 0, 1, '2021-05-04 16:44:50'),
(20, 'BJP won the ASSAM elections', 'Bjp won the election with high seats thre are 126 seats in ASSAm and they won 75. For majority it needs 50%+1 seats ', '613747206_05_21050535.png', '2021-05-03', '12', '1', '34', 'https://www.flipkart.com/search?q=luminous+battery&sid=b8s%2C5cy&as=on&as-show=on&otracker=AS_QueryStore_OrganicAutoSuggest_1_13_na_na_na&otracker1=AS_QueryStore_OrganicAutoSuggest_1_13_na_na_na&as-pos=1&as-type=RECENT&suggestionId=luminous+battery%7CSola', 2, 0, 1, '2021-05-06 17:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_strategies`
--

CREATE TABLE `tbl_admin_strategies` (
  `id` int(10) NOT NULL,
  `strategy` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_strategies`
--

INSERT INTO `tbl_admin_strategies` (`id`, `strategy`, `created_on`, `updated_on`) VALUES
(3, 'Ichimoku', '2019-09-30 09:02:23', '2020-01-24 09:02:51'),
(4, 'EMA crossing', '2019-09-30 09:02:30', '2020-01-24 09:03:06'),
(6, 'Heikin Ashi', '2020-01-24 09:03:45', '2020-01-24 09:03:45'),
(7, 'Bollinger Bands', '2020-01-24 09:03:58', '2020-01-24 09:03:58'),
(8, 'QAS', '2021-05-06 15:30:17', '2021-05-06 15:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_subscription_feature`
--

CREATE TABLE `tbl_admin_subscription_feature` (
  `id` int(10) NOT NULL,
  `subs_id` int(10) NOT NULL,
  `feature_name` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_subscription_feature`
--

INSERT INTO `tbl_admin_subscription_feature` (`id`, `subs_id`, `feature_name`, `created_on`, `updated_on`) VALUES
(1, 1, 'Questioniarie', '2019-07-04 12:27:12', '2019-09-17 11:19:59'),
(3, 1, 'Risk profile', '2019-07-04 12:27:12', '2019-09-17 11:19:59'),
(4, 1, 'Advisor', '2019-07-04 12:27:12', '2019-09-17 11:19:59'),
(5, 2, 'Questioniarie', '2019-07-04 12:28:09', '2019-09-17 11:21:20'),
(6, 2, 'Risk profile', '2019-07-04 12:28:09', '2019-09-17 11:21:20'),
(7, 2, 'Balance Sheet', '2019-07-04 12:28:09', '2019-09-17 11:21:20'),
(8, 2, 'Calendar (Training)', '2019-07-04 12:28:09', '2019-09-17 11:21:20'),
(9, 2, 'Dashboard', '2019-07-04 12:28:09', '2019-09-17 11:21:20'),
(10, 3, 'Questioniarie', '2019-07-04 12:29:18', '2022-02-07 13:07:06'),
(16, 4, 'Questioniarie', '2019-07-04 12:30:24', '2022-02-07 13:07:19'),
(23, 1, 'Test', '2019-09-17 11:06:12', '2019-09-17 11:19:59'),
(24, 1, 'Learning', '2019-09-17 11:06:12', '2019-09-17 11:19:59'),
(25, 2, 'Portfolio', '2019-09-17 11:09:10', '2019-09-17 11:21:20'),
(26, 2, 'Advisor', '2019-09-17 11:09:10', '2019-09-17 11:21:20'),
(27, 2, 'Test', '2019-09-17 11:09:10', '2019-09-17 11:21:20'),
(28, 2, 'Learning', '2019-09-17 11:09:10', '2019-09-17 11:21:20'),
(29, 3, 'Risk profile', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(30, 3, 'Balance Sheet', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(31, 3, 'Calendar', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(32, 3, 'Dashboard', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(33, 3, 'Portfolio', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(34, 3, 'Analysis', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(35, 3, 'Brokers', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(36, 3, 'Advisor', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(37, 3, 'Test', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(38, 3, 'Learning', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(39, 3, 'Trading Diary', '2019-09-17 11:13:12', '2022-02-07 13:07:06'),
(40, 2, 'Analysis (Statistic |  Seasonal)', '2019-09-17 11:14:22', '2019-09-17 11:21:20'),
(41, 4, 'Risk profile', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(42, 4, 'Balance Sheet', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(43, 4, 'Calendar (Economical Events)', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(44, 4, 'Dashboard', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(45, 4, 'Portfolio (Stock,Fixed,Options)', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(46, 4, 'Analysis', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(47, 4, 'Brokers', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(48, 4, 'Trading Diary', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(49, 4, 'Money Management', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(50, 4, 'News', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(51, 4, 'Result Attribution', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(52, 4, 'Advisor', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(53, 4, 'Test', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(54, 4, 'Learning', '2019-09-17 11:18:28', '2022-02-07 13:07:19'),
(55, 1, 'Balance Sheet', '2019-09-17 11:19:59', '2019-09-17 11:19:59'),
(56, 5, 'Dashboard', '2019-10-07 15:38:58', '2019-10-07 15:38:58'),
(57, 5, ' My Profile', '2019-10-07 15:38:58', '2019-10-07 15:38:58'),
(58, 5, 'Clients', '2019-10-07 15:38:58', '2019-10-07 15:38:58'),
(59, 5, 'Learning', '2019-10-07 15:38:58', '2019-10-07 15:38:58'),
(60, 5, 'Test', '2019-10-07 15:38:58', '2019-10-07 15:38:58'),
(61, 6, 'Dashboard', '2019-10-07 15:40:14', '2019-10-07 15:40:14'),
(62, 6, 'My Profile', '2019-10-07 15:40:14', '2019-10-07 15:40:14'),
(63, 6, 'Clients', '2019-10-07 15:40:14', '2019-10-07 15:40:14'),
(64, 6, 'Advisor Diary', '2019-10-07 15:40:14', '2019-10-07 15:40:14'),
(65, 6, 'Tax Law', '2019-10-07 15:40:14', '2019-10-07 15:40:14'),
(66, 6, 'Learning', '2019-10-07 15:40:14', '2019-10-07 15:40:14'),
(67, 6, 'Test', '2019-10-07 15:40:14', '2019-10-07 15:40:14'),
(68, 7, 'Testing', '2019-10-29 14:45:44', '2019-10-29 14:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_subscription_plan`
--

CREATE TABLE `tbl_admin_subscription_plan` (
  `id` int(10) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_subscription_plan`
--

INSERT INTO `tbl_admin_subscription_plan` (`id`, `plan_name`, `price`, `type`, `created_on`, `updated_on`) VALUES
(1, 'Free', 0, 0, '2019-07-04 12:27:12', '2019-07-04 12:27:12'),
(2, 'Basic', 49, 0, '2019-07-04 12:28:09', '2019-07-04 12:28:09'),
(3, 'Premium', 149, 0, '2019-07-04 12:29:18', '2019-07-04 12:29:18'),
(4, 'Advanced', 197, 0, '2019-07-04 12:30:24', '2019-07-04 12:30:24'),
(5, 'Basic', 200, 1, '2019-10-07 15:38:58', '2019-10-07 15:38:58'),
(6, 'Premium', 250, 1, '2019-10-07 15:40:14', '2019-10-07 15:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_tax_law`
--

CREATE TABLE `tbl_admin_tax_law` (
  `id` int(10) NOT NULL,
  `document_name` varchar(252) NOT NULL,
  `doc_file` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=>user,1=>advisor',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_tax_law`
--

INSERT INTO `tbl_admin_tax_law` (`id`, `document_name`, `doc_file`, `status`, `type`, `created_on`, `updated_on`) VALUES
(2, 'Advisor Term', '724184809_10_19011043.pdf', 1, 1, '2019-10-09 12:33:06', '2019-10-09 13:43:26'),
(3, 'Terms and Condition', '39651909_10_19011042.pdf', 1, 1, '2019-10-09 13:21:20', '2019-10-09 13:42:07'),
(4, 'Advisor Regularity', '275886109_10_19011042.pdf', 1, 1, '2019-10-09 13:32:49', '2019-10-09 13:42:38'),
(5, 'testing', '292840206_05_21050553.jpg', 1, 1, '2021-05-06 17:24:29', '2021-05-06 17:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_test_questions`
--

CREATE TABLE `tbl_admin_test_questions` (
  `id` int(10) NOT NULL,
  `pos` int(10) NOT NULL,
  `type` int(10) NOT NULL DEFAULT '0' COMMENT '1=>user,2=>Advisor',
  `test_number` int(10) NOT NULL DEFAULT '0',
  `question_type` int(10) NOT NULL,
  `question` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_test_questions`
--

INSERT INTO `tbl_admin_test_questions` (`id`, `pos`, `type`, `test_number`, `question_type`, `question`, `created_on`, `updated_on`) VALUES
(1, 0, 1, 1, 1, 'The software, which allows you to view the webpage, is called - ', '2019-09-04 18:56:39', '2019-09-04 18:56:39'),
(2, 0, 1, 1, 1, 'Which of the following is not an output device? ', '2019-09-04 18:56:47', '2019-09-04 18:56:47'),
(4, 0, 1, 1, 1, 'Who is the inventor of www?', '2019-09-04 18:57:00', '2019-09-04 18:57:00'),
(6, 0, 1, 1, 1, 'In the context of computer security, crackers are also known as - ', '2019-09-04 18:57:09', '2019-09-04 18:57:09'),
(8, 0, 1, 1, 1, 'Ethernet is an example of - ', '2019-09-04 18:58:06', '2019-09-04 18:58:06'),
(11, 0, 2, 1, 1, 'Which of the following is an extremely fast, small memory between CPU and main memory? ', '2019-09-04 18:59:48', '2019-09-04 18:59:48'),
(12, 0, 2, 2, 1, 'Television transmission is an example of which of the following? ', '2019-09-04 18:59:30', '2019-09-04 18:59:30'),
(13, 0, 2, 2, 1, 'The set of protocols, which defines all transmission exchanges across the internet is called - ', '2019-09-04 18:59:38', '2019-09-04 18:59:38'),
(14, 0, 1, 2, 1, 'The metal present in Vitamin B12 is -', '2019-09-05 12:21:43', '2019-09-05 12:21:43'),
(15, 0, 1, 2, 1, 'The growth of bacteria is measured by -', '2019-09-05 12:23:32', '2019-09-05 12:23:32'),
(17, 0, 1, 3, 1, 'what is eithernet', '2021-05-01 12:53:51', '2021-05-01 12:53:51'),
(18, 0, 1, 3, 1, 'Capital of India', '2021-05-01 12:53:41', '2021-05-01 12:53:41'),
(19, 0, 1, 4, 1, 'Capital Of Bihar', '2021-05-01 12:54:36', '2021-05-01 12:54:36'),
(20, 0, 1, 4, 1, 'Capital Of Jharkhand', '2021-05-01 12:54:27', '2021-05-01 12:54:27'),
(21, 0, 1, 4, 1, 'Who was the first Prime Minister of India?', '2021-05-01 12:54:19', '2021-05-01 12:54:19'),
(22, 0, 1, 4, 1, 'Which one is not a output device', '2021-05-01 12:54:08', '2021-05-01 12:54:08'),
(23, 0, 2, 3, 1, 'Tom is eating a burger having chicken, tomato and onions.\r\nTom is a/an  _____.', '2021-03-12 10:35:48', '2021-03-12 10:35:48'),
(24, 0, 2, 3, 1, 'Which among the following is a beverage crop?', '2021-03-12 10:36:36', '2021-03-12 10:36:36'),
(25, 0, 2, 3, 1, 'What is the purpose of ploughing in farming?', '2021-03-12 10:37:19', '2021-03-12 10:37:19'),
(26, 0, 2, 3, 1, 'What is sowing?', '2021-03-12 10:38:13', '2021-03-12 10:38:13'),
(27, 0, 2, 3, 1, 'Which of the following does not directly give birth to young ones?\r\n\r\nNote - This question can have more than one correct answer.', '2021-03-12 10:39:25', '2021-03-12 10:39:25'),
(28, 0, 2, 3, 1, 'Select the reasons why animals use their ears', '2021-03-12 10:40:17', '2021-03-12 10:40:17'),
(29, 0, 2, 3, 1, 'Select the characteristics of a tiger.', '2021-03-12 10:41:05', '2021-03-12 10:41:05'),
(30, 0, 2, 3, 1, 'The habitat of plants and animals that live in water is called _____ habitat.', '2021-03-12 10:41:50', '2021-03-12 10:41:50'),
(31, 0, 2, 3, 1, 'Select an animal whose ear size is large as compared to its head.', '2021-03-12 10:43:16', '2021-03-12 10:43:16'),
(32, 0, 2, 3, 1, 'Pick the correct option based on the diet of the given animals:', '2021-03-12 10:44:11', '2021-03-12 10:44:11'),
(33, 0, 2, 4, 1, 'what is rice', '2021-03-17 17:14:10', '2021-03-17 17:14:10'),
(34, 0, 1, 12, 1, 'CM of Assam', '2021-05-06 17:28:30', '2021-05-06 17:28:30'),
(35, 0, 2, 12, 1, 'Father of computer science?', '2021-05-06 17:30:40', '2021-05-06 17:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_test_question_options`
--

CREATE TABLE `tbl_admin_test_question_options` (
  `id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `options` text NOT NULL,
  `correct_option` int(10) DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_test_question_options`
--

INSERT INTO `tbl_admin_test_question_options` (`id`, `question_id`, `options`, `correct_option`, `created_on`, `updated_on`) VALUES
(1, 1, 'Website ', 0, '2019-09-02 11:43:48', '2019-09-04 18:56:39'),
(2, 1, 'Web Browser ', 0, '2019-09-02 11:43:48', '2019-09-04 18:56:39'),
(3, 1, 'Interpreter', 1, '2019-09-02 11:43:48', '2019-09-04 18:56:39'),
(4, 1, 'Operating System', 0, '2019-09-02 11:43:48', '2019-09-04 18:56:39'),
(5, 2, 'Plotter ', 0, '2019-09-02 11:50:00', '2019-09-04 18:56:47'),
(6, 2, 'Printer ', 0, '2019-09-02 11:50:00', '2019-09-04 18:56:47'),
(7, 2, 'Monitor ', 0, '2019-09-02 11:50:00', '2019-09-04 18:56:47'),
(8, 2, 'Scanner', 1, '2019-09-02 11:50:00', '2019-09-04 18:56:47'),
(13, 4, 'Bill Gates', 0, '2019-09-02 11:51:48', '2019-09-04 18:57:00'),
(14, 4, 'Tim Berners-Lee', 0, '2019-09-02 11:51:48', '2019-09-04 18:57:00'),
(15, 4, 'Timothy Bil', 1, '2019-09-02 11:51:48', '2019-09-04 18:57:00'),
(16, 4, 'Ray Tomlinson', 0, '2019-09-02 11:51:48', '2019-09-04 18:57:00'),
(21, 6, 'black hat hackers ', 0, '2019-09-02 11:53:45', '2019-09-04 18:57:09'),
(22, 6, 'white hat hackers ', 0, '2019-09-02 11:53:45', '2019-09-04 18:57:09'),
(23, 6, 'elite hackers', 1, '2019-09-02 11:53:45', '2019-09-04 18:57:09'),
(24, 6, 'script kiddie', 0, '2019-09-02 11:53:45', '2019-09-04 18:57:09'),
(29, 8, 'MAN ', 0, '2019-09-02 11:55:50', '2019-09-04 18:58:06'),
(30, 8, 'LAN', 0, '2019-09-02 11:55:50', '2019-09-04 18:58:06'),
(31, 8, 'WAN', 1, '2019-09-02 11:55:50', '2019-09-04 18:58:06'),
(32, 8, 'Wi-Fi', 0, '2019-09-02 11:55:50', '2019-09-04 18:58:06'),
(45, 11, 'Main RAM and ROM ', 0, '2019-09-02 12:37:12', '2019-09-04 18:59:48'),
(46, 11, 'Cache memory', 0, '2019-09-02 12:37:12', '2019-09-04 18:59:48'),
(47, 11, 'Secondary memory', 1, '2019-09-02 12:37:12', '2019-09-04 18:59:48'),
(48, 11, 'None of the above', 0, '2019-09-02 12:37:12', '2019-09-04 18:59:48'),
(49, 12, 'Simplex Communication', 0, '2019-09-02 12:38:07', '2019-09-04 18:59:30'),
(50, 12, 'Half-duplex Communication', 0, '2019-09-02 12:38:07', '2019-09-04 18:59:30'),
(51, 12, 'Full-duplex Communication', 1, '2019-09-02 12:38:07', '2019-09-04 18:59:30'),
(52, 12, ' None of the above', 0, '2019-09-02 12:38:07', '2019-09-04 18:59:30'),
(53, 13, 'CSMA/ CD ', 0, '2019-09-02 12:38:50', '2019-09-04 18:59:38'),
(54, 13, 'TCP/ IP', 0, '2019-09-02 12:38:50', '2019-09-04 18:59:38'),
(55, 13, 'FDDI ', 1, '2019-09-02 12:38:50', '2019-09-04 18:59:38'),
(56, 13, 'None of the above', 0, '2019-09-02 12:38:50', '2019-09-04 18:59:38'),
(57, 14, 'Cobalt', 1, '2019-09-05 12:21:43', '2019-09-05 12:21:43'),
(58, 14, 'Magnesium', 0, '2019-09-05 12:21:43', '2019-09-05 12:21:43'),
(59, 14, 'Iron', 0, '2019-09-05 12:21:43', '2019-09-05 12:21:43'),
(60, 14, 'Copper', 0, '2019-09-05 12:21:43', '2019-09-05 12:21:43'),
(61, 15, 'hemacytometer', 0, '2019-09-05 12:23:32', '2019-09-05 12:23:32'),
(62, 15, 'spectrophotometer', 1, '2019-09-05 12:23:32', '2019-09-05 12:23:32'),
(63, 15, 'calorimeter', 0, '2019-09-05 12:23:32', '2019-09-05 12:23:32'),
(64, 15, 'auxanometer', 0, '2019-09-05 12:23:32', '2019-09-05 12:23:32'),
(69, 17, 'WAN', 0, '2021-03-12 10:22:13', '2021-05-01 12:53:51'),
(70, 17, 'LAN', 0, '2021-03-12 10:22:13', '2021-05-01 12:53:51'),
(71, 17, 'MAN', 1, '2021-03-12 10:22:13', '2021-05-01 12:53:51'),
(72, 17, 'OTHER', 0, '2021-03-12 10:22:13', '2021-05-01 12:53:51'),
(73, 18, 'Delhi', 1, '2021-03-12 10:24:45', '2021-05-01 12:53:41'),
(74, 18, 'Patna', 0, '2021-03-12 10:24:45', '2021-05-01 12:53:41'),
(75, 18, 'Mumbai', 0, '2021-03-12 10:24:45', '2021-05-01 12:53:41'),
(76, 18, 'Bangalore', 0, '2021-03-12 10:24:45', '2021-05-01 12:53:41'),
(77, 19, 'Motihari', 0, '2021-03-12 10:26:22', '2021-05-01 12:54:36'),
(78, 19, 'Patna', 1, '2021-03-12 10:26:22', '2021-05-01 12:54:36'),
(79, 19, 'Muzaffarpur', 0, '2021-03-12 10:26:22', '2021-05-01 12:54:36'),
(80, 19, 'Darbhanga', 0, '2021-03-12 10:26:22', '2021-05-01 12:54:36'),
(81, 20, 'Dumka', 0, '2021-03-12 10:27:41', '2021-05-01 12:54:27'),
(82, 20, 'Ranchi', 1, '2021-03-12 10:27:41', '2021-05-01 12:54:27'),
(83, 20, 'Dhanbad', 0, '2021-03-12 10:27:41', '2021-05-01 12:54:27'),
(84, 20, 'Jamshedpur', 0, '2021-03-12 10:27:41', '2021-05-01 12:54:27'),
(85, 21, 'Narendra Modi', 0, '2021-03-12 10:29:52', '2021-05-01 12:54:19'),
(86, 21, 'Indira Gandhi', 0, '2021-03-12 10:29:52', '2021-05-01 12:54:19'),
(87, 21, 'Rajiv Gandhi', 0, '2021-03-12 10:29:52', '2021-05-01 12:54:19'),
(88, 21, 'Jawahar Lal Nehru', 1, '2021-03-12 10:29:52', '2021-05-01 12:54:19'),
(89, 22, 'Keyboard', 1, '2021-03-12 10:30:53', '2021-05-01 12:54:08'),
(90, 22, 'Monitor', 0, '2021-03-12 10:30:53', '2021-05-01 12:54:08'),
(91, 22, 'Printer', 0, '2021-03-12 10:30:53', '2021-05-01 12:54:08'),
(92, 22, 'Joystic', 0, '2021-03-12 10:30:53', '2021-05-01 12:54:08'),
(93, 23, 'herbivore', 0, '2021-03-12 10:35:48', '2021-03-12 10:35:48'),
(94, 23, 'omnivore', 0, '2021-03-12 10:35:48', '2021-03-12 10:35:48'),
(95, 23, 'carnivore', 0, '2021-03-12 10:35:48', '2021-03-12 10:35:48'),
(96, 23, 'scavenger', 1, '2021-03-12 10:35:48', '2021-03-12 10:35:48'),
(97, 24, 'Jute', 1, '2021-03-12 10:36:36', '2021-03-12 10:36:36'),
(98, 24, 'Rice', 0, '2021-03-12 10:36:36', '2021-03-12 10:36:36'),
(99, 24, 'Cotton', 0, '2021-03-12 10:36:36', '2021-03-12 10:36:36'),
(100, 24, 'Coffee', 0, '2021-03-12 10:36:36', '2021-03-12 10:36:36'),
(101, 25, 'Mixing up the soil', 0, '2021-03-12 10:37:19', '2021-03-12 10:37:19'),
(102, 25, 'Getting more water', 0, '2021-03-12 10:37:19', '2021-03-12 10:37:19'),
(103, 25, 'Getting good quality crops', 0, '2021-03-12 10:37:19', '2021-03-12 10:37:19'),
(104, 25, 'Saving water', 1, '2021-03-12 10:37:19', '2021-03-12 10:37:19'),
(105, 26, 'Watering crops', 1, '2021-03-12 10:38:13', '2021-03-12 10:38:13'),
(106, 26, 'Planting seeds in soil', 0, '2021-03-12 10:38:13', '2021-03-12 10:38:13'),
(107, 26, 'Mixing the soil', 0, '2021-03-12 10:38:13', '2021-03-12 10:38:13'),
(108, 26, 'Choosing the seeds', 0, '2021-03-12 10:38:13', '2021-03-12 10:38:13'),
(109, 27, 'Cats', 0, '2021-03-12 10:39:25', '2021-03-12 10:39:25'),
(110, 27, 'Birds', 0, '2021-03-12 10:39:25', '2021-03-12 10:39:25'),
(111, 27, 'Cows', 0, '2021-03-12 10:39:25', '2021-03-12 10:39:25'),
(112, 27, 'Frogs', 1, '2021-03-12 10:39:25', '2021-03-12 10:39:25'),
(113, 28, 'To protect themselves.', 1, '2021-03-12 10:40:17', '2021-03-12 10:40:17'),
(114, 28, 'To find prey.', 0, '2021-03-12 10:40:17', '2021-03-12 10:40:17'),
(115, 28, 'To communicate.', 0, '2021-03-12 10:40:17', '2021-03-12 10:40:17'),
(116, 28, 'To listen.', 0, '2021-03-12 10:40:17', '2021-03-12 10:40:17'),
(117, 29, 'National animal of India', 1, '2021-03-12 10:41:05', '2021-03-12 10:41:05'),
(118, 29, 'Hair on skin', 0, '2021-03-12 10:41:05', '2021-03-12 10:41:05'),
(119, 29, 'Visible ears', 0, '2021-03-12 10:41:05', '2021-03-12 10:41:05'),
(120, 29, 'Lay eggs', 0, '2021-03-12 10:41:05', '2021-03-12 10:41:05'),
(121, 30, 'desert', 0, '2021-03-12 10:41:50', '2021-03-12 10:41:50'),
(122, 30, 'aquatic', 1, '2021-03-12 10:41:50', '2021-03-12 10:41:50'),
(123, 30, 'terrestrial', 0, '2021-03-12 10:41:50', '2021-03-12 10:41:50'),
(124, 30, 'polar', 0, '2021-03-12 10:41:50', '2021-03-12 10:41:50'),
(125, 31, 'Goat', 1, '2021-03-12 10:43:16', '2021-03-12 10:43:16'),
(126, 31, 'Cat', 0, '2021-03-12 10:43:16', '2021-03-12 10:43:16'),
(127, 31, 'Camel', 0, '2021-03-12 10:43:16', '2021-03-12 10:43:16'),
(128, 31, 'Horse', 0, '2021-03-12 10:43:16', '2021-03-12 10:43:16'),
(129, 32, '1. Carnivore; 2. Parasite', 1, '2021-03-12 10:44:11', '2021-03-12 10:44:11'),
(130, 32, '1. Omnivore; 2. Herbivore', 0, '2021-03-12 10:44:11', '2021-03-12 10:44:11'),
(131, 32, '1. Carnivore; 2. Herbivore', 0, '2021-03-12 10:44:11', '2021-03-12 10:44:11'),
(132, 32, '1. Omnivore; 2. Parasite', 0, '2021-03-12 10:44:11', '2021-03-12 10:44:11'),
(133, 33, 'Grocry', 1, '2021-03-17 17:14:10', '2021-03-17 17:14:10'),
(134, 33, 'asda', 0, '2021-03-17 17:14:10', '2021-03-17 17:14:10'),
(135, 33, 'asdas', 0, '2021-03-17 17:14:10', '2021-03-17 17:14:10'),
(136, 33, 'asdasd', 0, '2021-03-17 17:14:10', '2021-03-17 17:14:10'),
(137, 34, 'Biswa sharma', 0, '2021-05-06 17:28:30', '2021-05-06 17:28:30'),
(138, 34, 'Sarvanand sonowal', 1, '2021-05-06 17:28:30', '2021-05-06 17:28:30'),
(139, 34, 'Tarun gogoi', 0, '2021-05-06 17:28:30', '2021-05-06 17:28:30'),
(140, 34, 'mohammad faruq', 0, '2021-05-06 17:28:30', '2021-05-06 17:28:30'),
(141, 35, 'Wright brothers ', 0, '2021-05-06 17:30:26', '2021-05-06 17:30:40'),
(142, 35, 'Alexnder graham bell', 0, '2021-05-06 17:30:26', '2021-05-06 17:30:40'),
(143, 35, 'A m turing ', 0, '2021-05-06 17:30:26', '2021-05-06 17:30:40'),
(144, 35, 'Charles babbgae', 1, '2021-05-06 17:30:26', '2021-05-06 17:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_time_slot`
--

CREATE TABLE `tbl_admin_time_slot` (
  `id` int(10) NOT NULL,
  `start_time_end_time` varchar(255) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_time_slot`
--

INSERT INTO `tbl_admin_time_slot` (`id`, `start_time_end_time`, `start_time`, `end_time`) VALUES
(1, '01:00:00 - 01:30:00', '01:00:00', '01:30:00'),
(2, '01:30:00 - 02:00:00', '01:30:00', '02:00:00'),
(3, '02:00:00 - 02:30:00', '02:00:00', '02:30:00'),
(4, '02:30:00 - 03:00:00', '02:30:00', '03:00:00'),
(5, '03:00:00 - 03:30:00', '03:00:00', '03:30:00'),
(6, '03:30:00 - 04:00:00', '03:30:00', '04:00:00'),
(7, '04:00:00 - 04:30:00', '04:00:00', '04:30:00'),
(8, '04:30:00 - 05:00:00', '04:30:00', '05:00:00'),
(9, '05:00:00 - 05:30:00', '05:00:00', '05:30:00'),
(10, '05:30:00 - 06:00:00', '05:30:00', '06:00:00'),
(11, '06:00:00 - 06:30:00', '06:00:00', '06:30:00'),
(12, '06:30:00 - 07:00:00', '06:30:00', '07:00:00'),
(13, '07:00:00 - 07:30:00', '07:00:00', '07:30:00'),
(14, '07:30:00 - 08:00:00', '07:30:00', '08:00:00'),
(15, '08:00:00 - 08:30:00', '08:00:00', '08:30:00'),
(16, '08:30:00 - 09:00:00', '08:30:00', '09:00:00'),
(17, '09:00:00 - 09:30:00', '09:00:00', '09:30:00'),
(18, '09:30:00 - 10:00:00', '09:30:00', '10:00:00'),
(19, '10:00:00 - 10:30:00', '10:00:00', '10:30:00'),
(20, '10:30:00 - 11:00:00', '10:30:00', '11:00:00'),
(21, '11:00:00 - 11:30:00', '11:00:00', '11:30:00'),
(22, '11:30:00 - 12:00:00', '11:30:00', '12:00:00'),
(23, '12:00:00 - 12:30:00', '12:00:00', '12:30:00'),
(24, '12:30:00 - 13:00:00', '12:30:00', '13:00:00'),
(25, '13:00:00 - 13:30:00', '13:00:00', '13:30:00'),
(26, '13:30:00 - 14:00:00', '13:30:00', '14:00:00'),
(27, '14:00:00 - 14:30:00', '14:00:00', '14:30:00'),
(28, '14:30:00 - 15:00:00', '14:30:00', '15:00:00'),
(29, '15:00:00 - 15:30:00', '15:00:00', '15:30:00'),
(30, '15:30:00 - 16:00:00', '15:30:00', '16:00:00'),
(31, '16:00:00 - 16:30:00', '16:00:00', '16:30:00'),
(32, '16:30:00 - 17:00:00', '16:30:00', '17:00:00'),
(33, '17:00:00 - 17:30:00', '17:00:00', '17:30:00'),
(34, '17:30:00 - 18:00:00', '17:30:00', '18:00:00'),
(35, '18:00:00 - 18:30:00', '18:00:00', '18:30:00'),
(36, '18:30:00 - 19:00:00', '18:30:00', '19:00:00'),
(37, '19:00:00 - 19:30:00', '19:00:00', '19:30:00'),
(38, '19:30:00 - 20:00:00', '19:30:00', '20:00:00'),
(39, '20:00:00 - 20:30:00', '20:00:00', '20:30:00'),
(40, '20:30:00 - 21:00:00', '20:30:00', '21:00:00'),
(41, '21:00:00 - 21:30:00', '21:00:00', '21:30:00'),
(42, '21:30:00 - 22:00:00', '21:30:00', '22:00:00'),
(43, '22:00:00 - 22:30:00', '22:00:00', '22:30:00'),
(44, '22:30:00 - 23:00:00', '22:30:00', '23:00:00'),
(45, '23:00:00 - 23:30:00', '23:00:00', '23:30:00'),
(46, '23:30:00 - 24:00:00', '23:30:00', '24:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_warning_alert`
--

CREATE TABLE `tbl_admin_warning_alert` (
  `id` int(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Active,2=>inactive',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_warning_alert`
--

INSERT INTO `tbl_admin_warning_alert` (`id`, `subject`, `description`, `status`, `created_on`, `updated_on`) VALUES
(3, 'Where can I get some?', 'here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, '2020-03-24 12:30:01', '2020-03-24 12:30:01'),
(2, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, '2020-03-24 12:27:50', '2020-03-24 12:27:50'),
(4, 'Test in lockdon may', ' Testing in lockdown in may...yes', 1, '2021-05-06 15:32:59', '2021-05-06 15:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisor_availability_slots_datewise`
--

CREATE TABLE `tbl_advisor_availability_slots_datewise` (
  `id` bigint(20) NOT NULL,
  `advisor_id` int(10) DEFAULT NULL,
  `dates` varchar(255) DEFAULT NULL,
  `start_time` varchar(200) DEFAULT '',
  `start_time_am_pm` varchar(5) DEFAULT 'AM',
  `end_time` varchar(255) DEFAULT '',
  `end_time_am_pm` varchar(5) DEFAULT 'AM',
  `is_availability` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advisor_availability_slots_datewise`
--

INSERT INTO `tbl_advisor_availability_slots_datewise` (`id`, `advisor_id`, `dates`, `start_time`, `start_time_am_pm`, `end_time`, `end_time_am_pm`, `is_availability`, `created_at`) VALUES
(933, 27, '2021-04-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(932, 27, '2021-04-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(931, 27, '2021-04-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(930, 27, '2021-04-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(929, 27, '2021-04-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(928, 27, '2021-04-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(927, 27, '2021-04-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(926, 27, '2021-04-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(925, 27, '2021-03-31', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(924, 27, '2021-03-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(923, 27, '2021-03-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(922, 27, '2021-03-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(921, 27, '2021-03-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(920, 27, '2021-03-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(919, 27, '2021-03-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(918, 27, '2021-03-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(917, 27, '2021-03-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(916, 27, '2021-03-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(915, 27, '2021-03-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(914, 27, '2021-03-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(913, 27, '2021-03-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(908, 27, '2021-03-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(909, 27, '2021-03-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(910, 27, '2021-03-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(911, 27, '2021-03-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(912, 27, '2021-03-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(864, 25, '2022-01-05', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(865, 25, '2022-01-06', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(866, 25, '2022-01-07', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(867, 25, '2022-01-08', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(868, 25, '2022-01-09', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(869, 25, '2022-01-10', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(870, 25, '2022-01-11', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(871, 25, '2022-01-12', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(872, 25, '2022-01-13', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(873, 25, '2022-01-14', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(874, 25, '2022-01-15', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(875, 25, '2022-01-22', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:07'),
(876, 25, '2022-01-29', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:07'),
(877, 25, '2022-01-30', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:07'),
(878, 25, '2022-01-31', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:07'),
(879, 25, '2022-08-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(880, 25, '2022-08-02', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(881, 25, '2022-08-03', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(882, 25, '2022-08-04', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(883, 25, '2022-08-05', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(884, 25, '2022-08-06', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(885, 25, '2022-08-07', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(886, 25, '2022-08-08', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(887, 25, '2022-08-09', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(888, 25, '2022-08-10', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(889, 25, '2022-08-11', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(890, 25, '2022-08-12', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(891, 25, '2022-08-13', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 06:02:43'),
(892, 27, '1970-01-01', '', '', '', '', 0, '2021-03-10 12:25:52'),
(893, 27, '2021-03-10', '', '', '', '', 0, '2021-03-10 12:25:52'),
(894, 27, '2021-03-11', '', '', '', '', 0, '2021-03-10 12:25:52'),
(895, 27, '2021-03-12', '', '', '', '', 0, '2021-03-10 12:25:52'),
(896, 27, '2021-03-13', '', '', '', '', 0, '2021-03-10 12:25:52'),
(897, 27, '2021-03-14', '', '', '', '', 0, '2021-03-10 12:25:52'),
(898, 27, '2021-03-15', '', '', '', '', 0, '2021-03-10 12:25:52'),
(899, 27, '2021-03-16', '', '', '', '', 0, '2021-03-10 12:25:52'),
(900, 27, '2021-03-17', '', '', '', '', 0, '2021-03-10 12:25:52'),
(901, 27, '2021-03-18', '', '', '', '', 0, '2021-03-10 12:25:52'),
(902, 27, '2021-03-19', '', '', '', '', 0, '2021-03-10 12:25:52'),
(903, 27, '2021-03-20', '', '', '', '', 0, '2021-03-10 12:25:52'),
(904, 27, '2021-03-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(905, 27, '2021-03-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(906, 27, '2021-03-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(168, 28, '2020-01-22', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(169, 28, '2020-01-23', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(170, 28, '2020-01-24', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(171, 28, '2020-01-25', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(172, 28, '2020-01-26', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(173, 28, '2020-01-27', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(174, 28, '2020-01-28', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(175, 28, '2020-01-29', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(176, 28, '2020-01-30', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(177, 28, '2020-01-31', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(178, 28, '2020-02-01', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(179, 28, '2020-02-02', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(907, 27, '2021-03-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(180, 28, '2020-02-03', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(181, 28, '2020-02-04', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(182, 28, '2020-02-05', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(183, 28, '2020-02-06', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(184, 28, '2020-02-07', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(185, 28, '2020-02-08', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(186, 28, '2020-02-09', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(187, 28, '2020-02-10', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(188, 28, '2020-02-11', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(189, 28, '2020-02-12', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(190, 28, '2020-02-13', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(191, 28, '2020-02-14', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(192, 28, '2020-02-15', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(193, 28, '2020-02-16', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(194, 28, '2020-02-17', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(195, 28, '2020-02-18', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(196, 28, '2020-02-19', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(197, 28, '2020-02-20', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(198, 28, '2020-02-21', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(199, 28, '2020-02-22', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(200, 28, '2020-02-23', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(201, 28, '2020-02-24', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(202, 28, '2020-02-25', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(203, 28, '2020-02-26', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(204, 28, '2020-02-27', '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(205, 74, '1970-01-01', '', '', '', '', 0, '2020-01-27 05:23:23'),
(206, 74, '2020-02-06', '', '', '', '', 0, '2020-01-27 05:23:23'),
(207, 74, '2020-02-07', '', '', '', '', 0, '2020-01-27 05:23:23'),
(208, 74, '2020-02-08', '', '', '', '', 0, '2020-01-27 05:23:23'),
(209, 74, '2020-02-11', '', '', '', '', 0, '2020-01-27 05:23:23'),
(210, 74, '2020-02-13', '', '', '', '', 0, '2020-01-27 05:23:23'),
(211, 74, '2020-02-14', '', '', '', '', 0, '2020-01-27 05:23:23'),
(863, 25, '2022-01-04', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(862, 25, '2022-01-03', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(861, 25, '2022-01-02', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(860, 25, '2022-01-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:42'),
(859, 25, '2022-02-28', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:24'),
(858, 25, '2022-02-27', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:24'),
(857, 25, '2022-02-26', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:24'),
(856, 25, '2022-02-25', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:24'),
(855, 25, '2022-02-24', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:24'),
(854, 25, '2022-02-23', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:24'),
(853, 25, '2021-10-09', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(852, 25, '2021-10-08', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(851, 25, '2021-10-07', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(850, 25, '2021-10-06', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(849, 25, '2021-10-05', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(848, 25, '2021-10-04', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(847, 25, '2021-10-03', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(846, 25, '2021-10-02', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(845, 25, '2021-10-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-10 05:59:12'),
(844, 25, '2021-09-04', '', 'AM', '24:00:00', 'AM', 1, '2021-03-08 12:50:15'),
(843, 25, '2021-09-03', '', 'AM', '24:00:00', 'AM', 1, '2021-03-08 12:50:15'),
(842, 25, '2021-09-02', '', 'AM', '24:00:00', 'AM', 1, '2021-03-08 12:50:15'),
(841, 25, '2021-09-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-08 12:50:15'),
(839, 25, '2021-08-31', '', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:35'),
(838, 25, '2021-08-30', '', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:35'),
(837, 25, '2021-08-29', '', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:35'),
(836, 25, '2021-08-28', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(835, 25, '2021-08-27', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(834, 25, '2021-08-26', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(833, 25, '2021-08-25', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(832, 25, '2021-08-24', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(831, 25, '2021-08-23', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(830, 25, '2021-08-22', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(829, 25, '2021-08-21', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(828, 25, '2021-08-20', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(827, 25, '2021-08-19', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(826, 25, '2021-08-18', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(825, 25, '2021-08-17', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(824, 25, '2021-08-16', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(823, 25, '2021-08-15', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(822, 25, '2021-08-14', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(821, 25, '2021-08-13', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(820, 25, '2021-08-12', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(819, 25, '2021-08-11', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(818, 25, '2021-08-10', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(817, 25, '2021-08-09', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(816, 25, '2021-08-08', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(815, 25, '2021-08-07', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(814, 25, '2021-08-06', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(813, 25, '2021-08-05', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(812, 25, '2021-08-04', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(811, 25, '2021-08-03', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(810, 25, '2021-08-02', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(352, 86, '2020-02-03', '', '', '', '', 0, '2020-01-29 06:09:10'),
(351, 86, '2020-02-02', '', '', '', '', 0, '2020-01-29 06:09:10'),
(350, 86, '2020-02-01', '', '', '', '', 0, '2020-01-29 06:09:10'),
(349, 86, '2020-01-31', '', '', '', '', 0, '2020-01-29 06:09:10'),
(348, 86, '2020-01-30', '', '', '', '', 0, '2020-01-29 06:09:10'),
(347, 86, '2020-01-29', '', '', '', '', 0, '2020-01-29 06:09:10'),
(346, 86, '1970-01-01', '', '', '', '', 0, '2020-01-29 06:09:10'),
(345, 83, '2020-02-01', '', '', '', '', 0, '2020-01-29 02:47:18'),
(344, 83, '1970-01-01', '', '', '', '', 0, '2020-01-29 02:47:18'),
(343, 73, '2020-01-30', '14:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 06:40:08'),
(342, 73, '2020-01-29', '14:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 06:40:08'),
(281, 78, '2020-01-30', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(280, 78, '2020-01-29', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(282, 78, '2020-01-31', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(283, 78, '2020-02-01', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(284, 78, '2020-02-02', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(285, 78, '2020-02-03', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(286, 78, '2020-02-04', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(287, 78, '2020-02-05', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(288, 78, '2020-02-06', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(289, 78, '2020-02-07', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(290, 78, '2020-02-08', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(809, 25, '2021-08-01', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(808, 25, '2021-07-31', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(807, 25, '2021-07-30', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(806, 25, '2021-07-29', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(805, 25, '2021-07-28', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(804, 25, '2021-07-27', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(803, 25, '2021-07-26', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(802, 25, '2021-07-25', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(801, 25, '2021-07-24', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(800, 25, '2021-07-23', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(799, 25, '2021-07-22', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(798, 25, '2021-07-21', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(797, 25, '2021-07-20', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(796, 25, '2021-07-19', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(795, 25, '2021-07-18', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(794, 25, '2021-07-17', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(793, 25, '2021-07-16', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(792, 25, '2021-07-15', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(791, 25, '2021-07-14', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(790, 25, '2021-07-13', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(789, 25, '2021-07-12', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(788, 25, '2021-07-11', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(787, 25, '2021-07-10', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(786, 25, '2021-07-09', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(785, 25, '2021-07-08', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(784, 25, '2021-07-07', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(783, 25, '2021-07-06', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(782, 25, '2021-07-05', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(781, 25, '2021-07-04', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(780, 25, '2021-07-03', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(779, 25, '2021-07-02', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(778, 25, '2021-07-01', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(777, 25, '2021-06-30', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(776, 25, '2021-06-29', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(775, 25, '2021-06-28', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(774, 25, '2021-06-27', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(773, 25, '2021-06-26', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(772, 25, '2021-06-25', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(771, 25, '2021-06-24', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(770, 25, '2021-06-23', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(769, 25, '2021-06-22', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(768, 25, '2021-06-21', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(767, 25, '2021-06-20', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(766, 25, '2021-06-19', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(765, 25, '2021-06-18', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(764, 25, '2021-06-17', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(763, 25, '2021-06-16', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(762, 25, '2021-06-15', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(761, 25, '2021-06-14', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(760, 25, '2021-06-13', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(759, 25, '2021-06-12', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(758, 25, '2021-06-11', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(757, 25, '2021-06-10', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(756, 25, '2021-06-09', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(755, 25, '2021-06-08', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(754, 25, '2021-06-07', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(753, 25, '2021-06-06', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(752, 25, '2021-06-05', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(751, 25, '2021-06-04', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(750, 25, '2021-06-03', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(749, 25, '2021-06-02', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(748, 25, '2021-06-01', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(747, 25, '2021-05-31', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(746, 25, '2021-05-30', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(745, 25, '2021-05-29', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(744, 25, '2021-05-28', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(743, 25, '2021-05-27', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(742, 25, '2021-05-26', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(741, 25, '2021-05-25', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(740, 25, '2021-05-24', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(739, 25, '2021-05-23', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(738, 25, '2021-05-22', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(737, 25, '2021-05-21', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(736, 25, '2021-05-20', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(735, 25, '2021-05-19', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(734, 25, '2021-05-18', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(733, 25, '2021-05-17', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(732, 25, '2021-05-16', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(731, 25, '2021-05-15', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(730, 25, '2021-05-14', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(729, 25, '2021-05-13', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(728, 25, '2021-05-12', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(727, 25, '2021-05-11', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(726, 25, '2021-05-10', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(725, 25, '2021-05-09', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(724, 25, '2021-05-08', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(723, 25, '2021-05-07', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(722, 25, '2021-05-06', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(721, 25, '2021-05-05', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(720, 25, '2021-05-04', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(719, 25, '2021-05-03', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(718, 25, '2021-05-02', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(717, 25, '2021-05-01', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(716, 25, '2021-04-30', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(715, 25, '2021-04-29', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(714, 25, '2021-04-28', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(713, 25, '2021-04-27', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(712, 25, '2021-04-26', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(711, 25, '2021-04-25', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(710, 25, '2021-04-24', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(709, 25, '2021-04-23', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(708, 25, '2021-04-22', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(707, 25, '2021-04-21', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(706, 25, '2021-04-20', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(705, 25, '2021-04-19', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(704, 25, '2021-04-18', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(703, 25, '2021-04-17', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(702, 25, '2021-04-16', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(701, 25, '2021-04-15', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(700, 25, '2021-04-14', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(699, 25, '2021-04-13', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(698, 25, '2021-04-12', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(697, 25, '2021-04-11', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(696, 25, '2021-04-10', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(695, 25, '2021-04-09', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(694, 25, '2021-04-08', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(693, 25, '2021-04-07', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(692, 25, '2021-04-06', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(691, 25, '2021-04-05', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(690, 25, '2021-04-04', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(689, 25, '2021-04-03', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(688, 25, '2021-04-02', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(687, 25, '2021-04-01', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(686, 25, '2021-03-31', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(685, 25, '2021-03-30', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(684, 25, '2021-03-29', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(683, 25, '2021-03-28', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(682, 25, '2021-03-27', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(681, 25, '2021-03-26', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(680, 25, '2021-03-25', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(679, 25, '2021-03-24', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(678, 25, '2021-03-23', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(677, 25, '2021-03-22', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(676, 25, '2021-03-21', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(675, 25, '2021-03-20', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(674, 25, '2021-03-19', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(673, 25, '2021-03-18', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(672, 25, '2021-03-17', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(671, 25, '2021-03-16', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(670, 25, '2021-03-15', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(622, 25, '2021-01-26', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(623, 25, '2021-01-27', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(624, 25, '2021-01-28', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(625, 25, '2021-01-29', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(626, 25, '2021-01-30', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(627, 25, '2021-01-31', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(628, 25, '2021-02-01', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(629, 25, '2021-02-02', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(630, 25, '2021-02-03', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(631, 25, '2021-02-04', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(632, 25, '2021-02-05', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(633, 25, '2021-02-06', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(634, 25, '2021-02-07', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(635, 25, '2021-02-08', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(636, 25, '2021-02-09', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(637, 25, '2021-02-10', '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(638, 25, '2021-02-11', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(639, 25, '2021-02-12', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(640, 25, '2021-02-13', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(641, 25, '2021-02-14', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(642, 25, '2021-02-15', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(643, 25, '2021-02-16', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(644, 25, '2021-02-17', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(645, 25, '2021-02-18', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(646, 25, '2021-02-19', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(647, 25, '2021-02-20', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(648, 25, '2021-02-21', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(649, 25, '2021-02-22', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(650, 25, '2021-02-23', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(651, 25, '2021-02-24', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(652, 25, '2021-02-25', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(653, 25, '2021-02-26', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(654, 25, '2021-02-27', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(655, 25, '2021-02-28', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(656, 25, '2021-03-01', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(657, 25, '2021-03-02', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(658, 25, '2021-03-03', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(659, 25, '2021-03-04', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(660, 25, '2021-03-05', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(661, 25, '2021-03-06', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(662, 25, '2021-03-07', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(663, 25, '2021-03-08', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(664, 25, '2021-03-09', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(665, 25, '2021-03-10', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(666, 25, '2021-03-11', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(667, 25, '2021-03-12', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(668, 25, '2021-03-13', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(669, 25, '2021-03-14', '01:00:00', 'AM', '24:00:00', 'AM', 1, '2021-01-25 13:13:07'),
(948, 27, '2021-04-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(947, 27, '2021-04-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(946, 27, '2021-04-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(945, 27, '2021-04-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(944, 27, '2021-04-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(943, 27, '2021-04-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(942, 27, '2021-04-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(941, 27, '2021-04-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(940, 27, '2021-04-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(939, 27, '2021-04-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(840, 25, '2021-01-25', '', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:14:14'),
(938, 27, '2021-04-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(937, 27, '2021-04-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(936, 27, '2021-04-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(935, 27, '2021-04-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(934, 27, '2021-04-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(949, 27, '2021-04-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(950, 27, '2021-04-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(951, 27, '2021-04-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(952, 27, '2021-04-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(953, 27, '2021-04-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(954, 27, '2021-04-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(955, 27, '2021-04-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(956, 27, '2021-05-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(957, 27, '2021-05-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(958, 27, '2021-05-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(959, 27, '2021-05-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(960, 27, '2021-05-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(961, 27, '2021-05-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(962, 27, '2021-05-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(963, 27, '2021-05-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(964, 27, '2021-05-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(965, 27, '2021-05-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(966, 27, '2021-05-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(967, 27, '2021-05-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(968, 27, '2021-05-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(969, 27, '2021-05-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(970, 27, '2021-05-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(971, 27, '2021-05-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(972, 27, '2021-05-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(973, 27, '2021-05-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(974, 27, '2021-05-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(975, 27, '2021-05-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(976, 27, '2021-05-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(977, 27, '2021-05-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(978, 27, '2021-05-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(979, 27, '2021-05-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(980, 27, '2021-05-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(981, 27, '2021-05-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(982, 27, '2021-05-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(983, 27, '2021-05-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(984, 27, '2021-05-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(985, 27, '2021-05-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(986, 27, '2021-05-31', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(987, 27, '2021-06-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(988, 27, '2021-06-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(989, 27, '2021-06-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(990, 27, '2021-06-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(991, 27, '2021-06-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(992, 27, '2021-06-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(993, 27, '2021-06-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(994, 27, '2021-06-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(995, 27, '2021-06-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(996, 27, '2021-06-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(997, 27, '2021-06-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(998, 27, '2021-06-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(999, 27, '2021-06-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1000, 27, '2021-06-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1001, 27, '2021-06-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1002, 27, '2021-06-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1003, 27, '2021-06-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1004, 27, '2021-06-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1005, 27, '2021-06-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1006, 27, '2021-06-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1007, 27, '2021-06-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1008, 27, '2021-06-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1009, 27, '2021-06-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1010, 27, '2021-06-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1011, 27, '2021-06-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1012, 27, '2021-06-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1013, 27, '2021-06-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1014, 27, '2021-06-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1015, 27, '2021-06-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1016, 27, '2021-06-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1017, 27, '2021-07-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1018, 27, '2021-07-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1019, 27, '2021-07-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1020, 27, '2021-07-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1021, 27, '2021-07-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1022, 27, '2021-07-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1023, 27, '2021-07-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1024, 27, '2021-07-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1025, 27, '2021-07-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1026, 27, '2021-07-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1027, 27, '2021-07-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1028, 27, '2021-07-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1029, 27, '2021-07-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1030, 27, '2021-07-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1031, 27, '2021-07-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1032, 27, '2021-07-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1033, 27, '2021-07-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1034, 27, '2021-07-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1035, 27, '2021-07-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1036, 27, '2021-07-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1037, 27, '2021-07-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1038, 27, '2021-07-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1039, 27, '2021-07-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1040, 27, '2021-07-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1041, 27, '2021-07-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1042, 27, '2021-07-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1043, 27, '2021-07-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1044, 27, '2021-07-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1045, 27, '2021-07-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1046, 27, '2021-07-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1047, 27, '2021-07-31', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1048, 27, '2021-08-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1049, 27, '2021-08-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1050, 27, '2021-08-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1051, 27, '2021-08-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1052, 27, '2021-08-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1053, 27, '2021-08-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1054, 27, '2021-08-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1055, 27, '2021-08-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1056, 27, '2021-08-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1057, 27, '2021-08-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1058, 27, '2021-08-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1059, 27, '2021-08-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1060, 27, '2021-08-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1061, 27, '2021-08-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1062, 27, '2021-08-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1063, 27, '2021-08-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1064, 27, '2021-08-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1065, 27, '2021-08-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1066, 27, '2021-08-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1067, 27, '2021-08-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1068, 27, '2021-08-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1069, 27, '2021-08-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1070, 27, '2021-08-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1071, 27, '2021-08-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1072, 27, '2021-08-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1073, 27, '2021-08-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1074, 27, '2021-08-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1075, 27, '2021-08-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1076, 27, '2021-08-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1077, 27, '2021-08-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1078, 27, '2021-08-31', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1079, 27, '2021-09-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1080, 27, '2021-09-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1081, 27, '2021-09-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1082, 27, '2021-09-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1083, 27, '2021-09-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1084, 27, '2021-09-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1085, 27, '2021-09-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1086, 27, '2021-09-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1087, 27, '2021-09-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1088, 27, '2021-09-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1089, 27, '2021-09-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1090, 27, '2021-09-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1091, 27, '2021-09-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1092, 27, '2021-09-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1093, 27, '2021-09-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1094, 27, '2021-09-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1095, 27, '2021-09-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1096, 27, '2021-09-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1097, 27, '2021-09-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1098, 27, '2021-09-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1099, 27, '2021-09-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1100, 27, '2021-09-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1101, 27, '2021-09-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1102, 27, '2021-09-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1103, 27, '2021-09-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1104, 27, '2021-09-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1105, 27, '2021-09-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1106, 27, '2021-09-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1107, 27, '2021-09-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1108, 27, '2021-09-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1109, 27, '2021-10-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1110, 27, '2021-10-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1111, 27, '2021-10-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1112, 27, '2021-10-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1113, 27, '2021-10-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1114, 27, '2021-10-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1115, 27, '2021-10-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1116, 27, '2021-10-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1117, 27, '2021-10-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1118, 27, '2021-10-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1119, 27, '2021-10-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1120, 27, '2021-10-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1121, 27, '2021-10-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1122, 27, '2021-10-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1123, 27, '2021-10-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1124, 27, '2021-10-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1125, 27, '2021-10-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1126, 27, '2021-10-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1127, 27, '2021-10-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1128, 27, '2021-10-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1129, 27, '2021-10-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1130, 27, '2021-10-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1131, 27, '2021-10-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1132, 27, '2021-10-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1133, 27, '2021-10-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1134, 27, '2021-10-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1135, 27, '2021-10-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1136, 27, '2021-10-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1137, 27, '2021-10-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1138, 27, '2021-10-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1139, 27, '2021-10-31', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1140, 27, '2021-11-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1141, 27, '2021-11-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1142, 27, '2021-11-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1143, 27, '2021-11-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1144, 27, '2021-11-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1145, 27, '2021-11-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1146, 27, '2021-11-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1147, 27, '2021-11-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1148, 27, '2021-11-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1149, 27, '2021-11-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1150, 27, '2021-11-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1151, 27, '2021-11-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25');
INSERT INTO `tbl_advisor_availability_slots_datewise` (`id`, `advisor_id`, `dates`, `start_time`, `start_time_am_pm`, `end_time`, `end_time_am_pm`, `is_availability`, `created_at`) VALUES
(1152, 27, '2021-11-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1153, 27, '2021-11-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1154, 27, '2021-11-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1155, 27, '2021-11-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1156, 27, '2021-11-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1157, 27, '2021-11-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1158, 27, '2021-11-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1159, 27, '2021-11-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1160, 27, '2021-11-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1161, 27, '2021-11-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1162, 27, '2021-11-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1163, 27, '2021-11-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1164, 27, '2021-11-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1165, 27, '2021-11-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1166, 27, '2021-11-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1167, 27, '2021-11-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1168, 27, '2021-11-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1169, 27, '2021-11-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1170, 27, '2021-12-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1171, 27, '2021-12-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1172, 27, '2021-12-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1173, 27, '2021-12-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1174, 27, '2021-12-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1175, 27, '2021-12-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1176, 27, '2021-12-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1177, 27, '2021-12-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1178, 27, '2021-12-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1179, 27, '2021-12-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1180, 27, '2021-12-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1181, 27, '2021-12-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1182, 27, '2021-12-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1183, 27, '2021-12-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1184, 27, '2021-12-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1185, 27, '2021-12-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1186, 27, '2021-12-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1187, 27, '2021-12-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1188, 27, '2021-12-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1189, 27, '2021-12-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1190, 27, '2021-12-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1191, 27, '2021-12-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1192, 27, '2021-12-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1193, 27, '2021-12-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1194, 27, '2021-12-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1195, 27, '2021-12-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1196, 27, '2021-12-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1197, 27, '2021-12-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1198, 27, '2021-12-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1199, 27, '2021-12-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1200, 27, '2021-12-31', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1201, 27, '2022-01-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1202, 27, '2022-01-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1203, 27, '2022-01-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1204, 27, '2022-01-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1205, 27, '2022-01-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1206, 27, '2022-01-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1207, 27, '2022-01-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1208, 27, '2022-01-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1209, 27, '2022-01-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1210, 27, '2022-01-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1211, 27, '2022-01-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1212, 27, '2022-01-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1213, 27, '2022-01-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1214, 27, '2022-01-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1215, 27, '2022-01-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1216, 27, '2022-01-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1217, 27, '2022-01-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1218, 27, '2022-01-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1219, 27, '2022-01-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1220, 27, '2022-01-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1221, 27, '2022-01-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1222, 27, '2022-01-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1223, 27, '2022-01-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1224, 27, '2022-01-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1225, 27, '2022-01-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1226, 27, '2022-01-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1227, 27, '2022-01-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1228, 27, '2022-01-28', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1229, 27, '2022-01-29', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1230, 27, '2022-01-30', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1231, 27, '2022-01-31', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1232, 27, '2022-02-01', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1233, 27, '2022-02-02', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1234, 27, '2022-02-03', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1235, 27, '2022-02-04', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1236, 27, '2022-02-05', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1237, 27, '2022-02-06', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1238, 27, '2022-02-07', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1239, 27, '2022-02-08', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1240, 27, '2022-02-09', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1241, 27, '2022-02-10', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1242, 27, '2022-02-11', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1243, 27, '2022-02-12', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1244, 27, '2022-02-13', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1245, 27, '2022-02-14', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1246, 27, '2022-02-15', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1247, 27, '2022-02-16', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1248, 27, '2022-02-17', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1249, 27, '2022-02-18', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1250, 27, '2022-02-19', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1251, 27, '2022-02-20', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1252, 27, '2022-02-21', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1253, 27, '2022-02-22', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1254, 27, '2022-02-23', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1255, 27, '2022-02-24', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1256, 27, '2022-02-25', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1257, 27, '2022-02-26', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1258, 27, '2022-02-27', '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25'),
(1321, 25, '2021-10-19', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1322, 25, '2021-10-20', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1323, 25, '2021-10-21', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1324, 25, '2021-10-22', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1325, 25, '2021-10-23', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1326, 25, '2021-10-24', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1327, 25, '2021-10-25', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1320, 25, '2021-10-18', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1319, 25, '2021-10-17', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1318, 25, '2021-10-16', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1317, 25, '2021-10-15', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1316, 25, '2021-10-14', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1315, 25, '2021-10-13', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1314, 25, '2021-10-12', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1313, 25, '2021-10-11', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1312, 25, '2021-10-10', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1311, 25, '2022-01-28', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1310, 25, '2022-01-27', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1309, 25, '2022-01-26', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1308, 25, '2022-01-25', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1307, 25, '2022-01-24', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1306, 25, '2022-01-23', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1305, 25, '2022-01-21', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1304, 25, '2022-01-20', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1303, 25, '2022-01-19', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1302, 25, '2022-01-18', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1301, 25, '2022-01-17', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1300, 25, '2022-01-16', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:52'),
(1299, 25, '2022-05-31', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1298, 25, '2022-05-30', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1297, 25, '2022-05-29', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1296, 25, '2022-05-28', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1295, 25, '2022-05-27', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1294, 25, '2022-05-26', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1293, 25, '2022-05-25', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1292, 25, '2022-05-24', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1291, 25, '2022-05-23', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1290, 25, '2022-05-22', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1289, 25, '2022-05-21', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1288, 25, '2022-05-20', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1287, 25, '2022-05-19', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1286, 25, '2022-05-18', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1285, 25, '2022-05-17', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1284, 25, '2022-05-16', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1283, 25, '2022-05-15', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1282, 25, '2022-05-14', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1281, 25, '2022-05-13', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1280, 25, '2022-05-12', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1279, 25, '2022-05-11', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1278, 25, '2022-05-10', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1277, 25, '2022-05-09', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1276, 25, '2022-05-08', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1275, 25, '2022-05-07', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1274, 25, '2022-05-06', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1273, 25, '2022-05-05', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1272, 25, '2022-05-04', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1271, 25, '2022-05-03', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1270, 25, '2022-05-02', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1269, 25, '2022-05-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:38:34'),
(1268, 27, '2022-05-31', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1267, 27, '2022-05-30', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1266, 27, '2022-05-29', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1265, 27, '2022-05-07', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1264, 27, '2022-05-06', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1263, 27, '2022-05-05', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1262, 27, '2022-05-04', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1261, 27, '2022-05-03', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1260, 27, '2022-05-02', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1259, 27, '2022-05-01', '', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:30:33'),
(1328, 25, '2021-10-26', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1329, 25, '2021-10-27', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1330, 25, '2021-10-28', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1331, 25, '2021-10-29', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1332, 25, '2021-10-30', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1333, 25, '2021-10-31', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:39:43'),
(1334, 25, '2022-02-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1335, 25, '2022-02-02', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1336, 25, '2022-02-03', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1337, 25, '2022-02-04', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1338, 25, '2022-02-05', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1339, 25, '2022-02-06', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1340, 25, '2022-02-07', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1341, 25, '2022-02-08', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1342, 25, '2022-02-09', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1343, 25, '2022-02-10', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1344, 25, '2022-02-11', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1345, 25, '2022-02-12', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1346, 25, '2022-02-13', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1347, 25, '2022-02-14', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1348, 25, '2022-02-15', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1349, 25, '2022-02-16', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1350, 25, '2022-02-17', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1351, 25, '2022-02-18', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1352, 25, '2022-02-19', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1353, 25, '2022-02-20', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1354, 25, '2022-02-21', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1355, 25, '2022-02-22', '', 'AM', '24:00:00', 'AM', 1, '2021-03-15 08:41:08'),
(1400, 28, '2021-09-07', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1399, 28, '2021-09-05', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1398, 28, '2021-08-21', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1397, 28, '2021-08-20', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1356, 28, '2021-03-16', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:18:01'),
(1357, 28, '2021-03-17', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:18:01'),
(1358, 28, '2021-03-18', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:18:01'),
(1359, 28, '2021-03-19', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:18:01'),
(1360, 28, '2021-03-20', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:18:01'),
(1396, 28, '2021-08-19', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1395, 28, '2021-08-18', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1394, 28, '2021-08-17', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1393, 28, '2021-08-09', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1361, 28, '2021-03-21', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1362, 28, '2021-03-22', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1363, 28, '2021-03-23', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1364, 28, '2021-03-24', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1365, 28, '2021-03-25', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1366, 28, '2021-03-26', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1367, 28, '2021-03-27', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1368, 28, '2021-03-28', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1369, 28, '2021-03-29', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1370, 28, '2021-03-30', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1371, 28, '2021-03-31', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:29:22'),
(1392, 28, '2021-07-21', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1391, 28, '2021-07-20', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1390, 28, '2021-07-17', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1389, 28, '2021-07-16', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1372, 28, '2021-04-27', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1373, 28, '2021-04-30', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1374, 28, '2021-05-20', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1375, 28, '2021-05-21', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1376, 28, '2021-05-22', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1377, 28, '2021-05-24', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1378, 28, '2021-05-26', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1379, 28, '2021-06-15', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1380, 28, '2021-06-16', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1381, 28, '2021-06-17', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1382, 28, '2021-06-18', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1383, 28, '2021-06-23', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1384, 28, '2021-06-24', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1385, 28, '2021-07-12', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1386, 28, '2021-07-13', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1387, 28, '2021-07-14', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1388, 28, '2021-07-15', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1401, 28, '2021-09-08', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1402, 28, '2021-09-09', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1403, 28, '2021-09-10', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1404, 28, '2021-09-11', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1405, 28, '2021-09-13', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1406, 28, '2021-09-14', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1407, 28, '2021-09-15', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1408, 28, '2021-10-06', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1409, 28, '2021-10-07', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1410, 28, '2021-10-08', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1411, 28, '2021-10-10', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1412, 28, '2021-10-12', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1413, 28, '2021-10-20', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1414, 28, '2021-10-21', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1415, 28, '2021-11-15', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1416, 28, '2021-11-17', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1417, 28, '2021-11-18', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1418, 28, '2021-11-20', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1419, 28, '2021-11-22', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1420, 28, '2021-11-26', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1421, 28, '2021-12-08', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1422, 28, '2021-12-09', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1423, 28, '2021-12-10', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1424, 28, '2021-12-11', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1425, 28, '2021-12-12', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1426, 28, '2021-12-13', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1427, 28, '2021-12-14', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1428, 28, '2021-12-15', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1429, 28, '2021-12-16', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1430, 28, '2021-12-17', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1431, 28, '2021-12-18', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1432, 28, '2022-01-11', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1433, 28, '2022-01-12', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1434, 28, '2022-01-13', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1435, 28, '2022-02-14', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1436, 28, '2022-02-15', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1437, 28, '2022-02-17', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1438, 28, '2022-02-18', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1439, 28, '2022-02-19', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1440, 28, '2022-02-21', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1441, 28, '2022-02-22', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1442, 28, '2022-02-23', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1443, 28, '2022-02-26', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1444, 28, '2022-02-27', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1445, 28, '2022-02-28', '', NULL, '19:30:00', NULL, 0, '2021-03-15 13:32:49'),
(1446, 25, '2021-11-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-17 07:45:25'),
(1447, 25, '2021-12-01', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1448, 25, '2021-12-02', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1449, 25, '2021-12-03', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1450, 25, '2021-12-04', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1451, 25, '2021-12-05', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1452, 25, '2021-12-06', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1453, 25, '2021-12-07', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1454, 25, '2021-12-08', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1455, 25, '2021-12-09', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1456, 25, '2021-12-10', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1457, 25, '2021-12-11', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1458, 25, '2021-12-12', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1459, 25, '2021-12-13', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1460, 25, '2021-12-14', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1461, 25, '2021-12-15', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1462, 25, '2021-12-16', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1463, 25, '2021-12-17', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1464, 25, '2021-12-18', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1465, 25, '2021-12-19', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1466, 25, '2021-12-20', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1467, 25, '2021-12-21', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1468, 25, '2021-12-22', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1469, 25, '2021-12-23', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1470, 25, '2021-12-24', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1471, 25, '2021-12-25', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1472, 25, '2021-12-26', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1473, 25, '2021-12-27', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1474, 25, '2021-12-28', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1475, 25, '2021-12-29', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1476, 25, '2021-12-30', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1477, 25, '2021-12-31', '', 'AM', '24:00:00', 'AM', 1, '2021-03-23 10:30:38'),
(1478, 25, '2021-09-09', '', 'AM', '24:00:00', 'AM', 1, '2021-03-25 06:50:02'),
(1479, 25, '2021-11-29', '', 'AM', '24:00:00', 'AM', 1, '2021-03-25 06:50:02'),
(1480, 25, '2022-03-03', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1481, 25, '2022-03-04', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1482, 25, '2022-03-05', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1483, 25, '2022-03-10', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1484, 25, '2022-03-11', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1485, 25, '2022-03-12', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1486, 25, '2022-03-17', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1487, 25, '2022-03-18', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1488, 25, '2022-03-19', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1489, 25, '2022-03-24', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1490, 25, '2022-03-25', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1491, 25, '2022-03-26', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1492, 25, '2022-03-30', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1493, 25, '2022-03-31', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:57:14'),
(1494, 25, '2022-03-01', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1495, 25, '2022-03-02', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1496, 25, '2022-03-06', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1497, 25, '2022-03-07', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1498, 25, '2022-03-08', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1499, 25, '2022-03-09', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1500, 25, '2022-03-13', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1501, 25, '2022-03-14', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1502, 25, '2022-03-15', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1503, 25, '2022-03-16', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1504, 25, '2022-03-20', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1505, 25, '2022-03-21', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1506, 25, '2022-03-22', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1507, 25, '2022-03-23', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1508, 25, '2022-03-27', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1509, 25, '2022-03-28', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1510, 25, '2022-03-29', '', 'AM', '24:00:00', 'AM', 1, '2021-04-15 04:58:11'),
(1519, 27, '2023-01-25', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1520, 27, '2023-01-26', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1521, 27, '2023-01-27', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1522, 27, '2023-01-28', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1523, 27, '2023-01-29', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1524, 27, '2023-01-30', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1525, 27, '2023-01-31', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1514, 27, '2023-01-01', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1513, 27, '2022-04-30', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:31:27'),
(1515, 27, '2023-01-16', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1512, 27, '2022-04-02', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:31:27'),
(1511, 27, '2022-04-01', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:31:27'),
(1518, 27, '2023-01-24', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1517, 27, '2023-01-23', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1516, 27, '2023-01-22', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:13'),
(1532, 27, '2023-01-17', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1534, 27, '2023-01-19', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:58'),
(1533, 27, '2023-01-18', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1535, 27, '2023-01-20', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:58'),
(1531, 27, '2023-01-11', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1530, 27, '2023-01-10', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1536, 27, '2023-01-21', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:58'),
(1529, 27, '2023-01-09', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1528, 27, '2023-01-04', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1527, 27, '2023-01-03', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1537, 27, '2023-01-05', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50'),
(1526, 27, '2023-01-02', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:33:49'),
(1538, 27, '2023-01-06', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50'),
(1539, 27, '2023-01-07', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50'),
(1540, 27, '2023-01-08', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50'),
(1541, 27, '2023-01-12', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50'),
(1542, 27, '2023-01-13', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50'),
(1543, 27, '2023-01-14', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50'),
(1544, 27, '2023-01-15', '', 'AM', '11:00:00', 'AM', 0, '2022-02-04 10:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisor_availability_time_slots`
--

CREATE TABLE `tbl_advisor_availability_time_slots` (
  `id` int(255) NOT NULL,
  `advisor_id` int(10) DEFAULT NULL,
  `repeated` varchar(555) DEFAULT NULL,
  `start_date` varchar(555) DEFAULT NULL,
  `end_date` varchar(555) DEFAULT NULL,
  `sunday` int(10) NOT NULL DEFAULT '0',
  `monday` int(10) NOT NULL DEFAULT '0',
  `tuesday` int(10) NOT NULL DEFAULT '0',
  `wednesday` int(10) NOT NULL DEFAULT '0',
  `thursday` int(10) NOT NULL DEFAULT '0',
  `friday` int(10) NOT NULL DEFAULT '0',
  `saturday` int(10) NOT NULL DEFAULT '0',
  `start_time` varchar(100) DEFAULT NULL,
  `start_time_am_pm` varchar(5) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL,
  `end_time_am_pm` varchar(5) DEFAULT NULL,
  `emergency_status` int(10) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advisor_availability_time_slots`
--

INSERT INTO `tbl_advisor_availability_time_slots` (`id`, `advisor_id`, `repeated`, `start_date`, `end_date`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `start_time`, `start_time_am_pm`, `end_time`, `end_time_am_pm`, `emergency_status`, `created_at`) VALUES
(19, 25, 'daily', '26-01-2021', '29-08-2021', 0, 0, 0, 0, 0, 0, 0, '01:00:00', 'AM', '24:00:00', 'AM', 0, '2021-01-25 13:13:07'),
(5, 28, 'daily', '22-01-2020', '28-02-2020', 1, 1, 1, 0, 0, 0, 0, '07:30:00', NULL, '19:30:00', NULL, 0, '2020-01-22 12:34:58'),
(17, 73, 'daily', '29-01-2020', '31-01-2020', 0, 0, 0, 0, 0, 0, 0, '14:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 06:40:08'),
(10, 78, 'daily', '29-01-2020', '09-02-2020', 1, 1, 1, 1, 1, 1, 1, '01:00:00', 'AM', '24:00:00', 'AM', 0, '2020-01-28 05:53:40'),
(13, 79, 'daily', '30-01-2020', '29-01-2020', 0, 0, 0, 0, 1, 1, 0, '05:00:00', 'AM', '18:00:00', 'AM', 0, '2020-01-28 06:20:29'),
(20, 27, 'daily', '10-03-2021', '28-02-2022', 1, 1, 1, 1, 1, 1, 1, '01:00:00', 'AM', '11:00:00', 'AM', 0, '2021-03-10 12:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisor_rating_reviews`
--

CREATE TABLE `tbl_advisor_rating_reviews` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `rating` float NOT NULL,
  `review` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advisor_rating_reviews`
--

INSERT INTO `tbl_advisor_rating_reviews` (`id`, `user_id`, `client_id`, `rating`, `review`, `created_on`, `updated_on`) VALUES
(1, 18, 27, 4, 'hhhh', '2019-11-12 18:26:27', '2019-11-19 14:18:28'),
(2, 18, 25, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-11-12 18:30:09', '2020-05-08 11:59:25'),
(3, 18, 26, 1, 'sdfsdf', '2019-11-12 18:53:43', '2019-11-12 18:53:43'),
(4, 18, 50, 5, 'fgh', '2019-11-12 18:54:29', '2019-11-12 18:54:29'),
(5, 18, 51, 5, 'sdafsdaf', '2019-11-12 18:55:23', '2019-11-12 18:55:23'),
(6, 36, 26, 2, 'sdfsdf', '2019-11-12 18:56:36', '2019-11-12 18:56:36'),
(7, 45, 25, 4, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2019-11-13 11:53:57', '2019-11-13 11:53:57'),
(8, 18, 42, 4, 'hi', '2019-11-14 10:56:42', '2019-11-14 10:56:42'),
(11, 18, 31, 1, '123', '2019-11-19 14:58:17', '2019-11-19 15:16:52'),
(13, 18, 32, 4, 'dfg', '2019-11-19 15:22:31', '2019-11-20 11:07:53'),
(14, 50, 31, 2, 'ok', '2019-11-30 10:50:05', '2019-11-30 10:50:05'),
(15, 46, 31, 3, 'hiii', '2020-01-24 10:25:53', '2020-01-24 10:25:53'),
(16, 46, 25, 5, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '2020-01-24 10:31:10', '2020-01-24 10:31:10'),
(18, 36, 27, 2.23611, 'Ada	dd', '2020-05-06 17:41:50', '2022-04-18 17:45:16'),
(23, 9, 28, 3.81944, 'type message...', '2020-06-24 18:39:39', '2020-06-24 18:39:39'),
(25, 36, 64, 1, 'very bad', '2021-03-01 12:32:13', '2021-03-01 12:32:13'),
(27, 108, 25, 1, 'In this, we learn how to show bootstrap star empty glyphicon in a webpage, How do i increase its size and change color.\r\n\r\nAnd how to use this icon using its unicode.', '2021-03-15 17:53:50', '2021-03-15 17:56:26'),
(28, 18, 28, 5, 'What helped me was setting the style of the table to style=\"table-layout: fixed\". After this, the column widths of my table stayed the same, whether an icon was shown next to the column header or not.', '2021-03-15 18:46:25', '2021-03-15 18:46:25'),
(29, 110, 25, 2, 'fFine advisor', '2021-04-27 17:25:52', '2021-04-27 17:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisor_user_funds`
--

CREATE TABLE `tbl_advisor_user_funds` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `fund_id` int(10) NOT NULL,
  `removeStatus` int(2) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advisor_user_funds`
--

INSERT INTO `tbl_advisor_user_funds` (`id`, `user_id`, `client_id`, `fund_id`, `removeStatus`, `created_on`, `updated_on`) VALUES
(6, 25, 18, 7, 1, '2020-04-04 11:00:56', '2021-04-23 15:13:41'),
(7, 25, 18, 8, 1, '2020-10-10 11:00:58', '2021-04-23 15:13:38'),
(8, 25, 18, 3, 1, '2021-01-22 07:37:42', '2021-04-23 15:14:57'),
(9, 25, 36, 3, 1, '2021-03-22 09:32:06', '2021-04-22 15:39:19'),
(10, 25, 36, 8, 1, '2021-02-22 09:32:14', '2021-04-22 09:32:14'),
(11, 25, 36, 7, 1, '2020-05-22 09:34:27', '2021-04-22 09:34:27'),
(12, 25, 36, 7, 1, '2020-12-22 09:54:55', '2021-04-22 09:54:55'),
(13, 25, 36, 3, 1, '2020-05-22 09:56:54', '2021-04-22 15:39:19'),
(14, 25, 36, 8, 1, '2020-06-02 09:58:53', '2021-04-22 09:58:53'),
(15, 25, 36, 3, 1, '2020-07-01 10:00:24', '2021-04-22 15:39:19'),
(16, 25, 36, 7, 1, '2021-01-05 10:02:11', '2021-04-22 10:02:11'),
(17, 25, 36, 8, 0, '2020-11-02 10:04:01', '2021-04-22 10:04:01'),
(18, 25, 36, 3, 1, '2020-09-01 10:05:31', '2021-04-22 15:39:19'),
(19, 25, 36, 7, 0, '2020-08-05 10:06:51', '2021-04-22 10:06:51'),
(20, 25, 36, 3, 0, '2021-01-02 10:11:03', '2021-04-22 10:11:03'),
(21, 25, 18, 7, 0, '2021-04-23 09:43:48', '2021-04-23 09:43:48'),
(22, 25, 18, 8, 0, '2021-04-23 09:43:51', '2021-04-23 09:43:51'),
(23, 27, 110, 6, 0, '2022-02-04 10:27:24', '2022-02-04 10:27:24'),
(24, 27, 18, 3, 1, '2022-02-19 10:07:01', '2022-02-21 14:28:36'),
(25, 27, 18, 7, 1, '2022-02-19 10:07:04', '2022-02-19 16:14:57'),
(26, 27, 18, 8, 1, '2022-02-19 10:07:15', '2022-02-19 16:14:59'),
(27, 27, 18, 3, 1, '2022-02-19 10:45:05', '2022-02-21 14:28:36'),
(28, 27, 18, 7, 0, '2022-02-19 10:47:27', '2022-02-19 10:47:27'),
(29, 27, 18, 8, 0, '2022-02-19 10:47:29', '2022-02-19 10:47:29'),
(30, 27, 18, 3, 0, '2022-02-21 08:58:39', '2022-02-21 08:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_ussage`
--

CREATE TABLE `tbl_app_ussage` (
  `id` int(11) NOT NULL,
  `uses` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_app_ussage`
--

INSERT INTO `tbl_app_ussage` (`id`, `uses`, `created_on`) VALUES
(1, 'Investing', '2019-06-20 18:39:29'),
(2, 'Planning', '2019-06-20 18:39:29'),
(3, 'Demo', '2019-06-20 18:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatting`
--

CREATE TABLE `tbl_chatting` (
  `id` int(10) NOT NULL,
  `user_one` int(10) NOT NULL,
  `user_two` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chatting`
--

INSERT INTO `tbl_chatting` (`id`, `user_one`, `user_two`, `status`, `message`, `created_on`) VALUES
(93, 18, 28, 1, 'hi\n', '2021-03-15 18:44:21'),
(94, 28, 18, 1, 'hi\n', '2021-03-15 18:44:30'),
(95, 28, 18, 1, 'ggggg\n', '2021-03-15 18:44:44'),
(96, 18, 28, 0, 'okay\n', '2021-03-15 18:46:01'),
(123, 110, 78, 0, 'hey', '2021-04-27 16:53:32'),
(124, 110, 78, 0, 'Are u fine', '2021-04-27 16:53:41'),
(125, 110, 78, 0, 'What\n', '2021-04-27 16:53:50'),
(126, 110, 78, 0, 'redgdfg\n', '2021-04-27 16:53:56'),
(127, 110, 78, 0, 'ghjghj\n', '2021-04-27 16:54:00'),
(131, 110, 25, 1, 'hgjnghj', '2021-04-27 17:21:43'),
(132, 25, 110, 1, 'gfhgvbh', '2021-04-27 17:21:56'),
(133, 25, 115, 0, 'Hmmmmm', '2021-05-31 12:38:27'),
(134, 25, 108, 0, 'Rewrqwet', '2021-06-28 14:54:14'),
(135, 25, 108, 0, 'Erteqrteqt', '2021-06-28 14:54:17'),
(136, 25, 108, 0, 'Retest rtyq3e v45tq', '2021-06-28 14:54:21'),
(137, 25, 108, 0, 'Drt34qete tertyewrt', '2021-06-28 17:17:46'),
(138, 36, 27, 1, 'hi', '2022-01-31 09:52:54'),
(139, 27, 36, 1, 'how are you?\n', '2022-02-04 15:59:34'),
(140, 36, 27, 1, 'good\n', '2022-02-04 15:59:48'),
(141, 27, 36, 1, 'okay\n', '2022-02-04 16:00:00'),
(142, 36, 27, 1, 'how are you?\n', '2022-02-04 16:00:12'),
(143, 27, 110, 0, 'Io', '2022-02-04 18:01:18'),
(144, 27, 110, 0, 'hhh', '2022-02-09 10:05:21'),
(145, 27, 18, 0, 'hi how are you\n', '2022-02-19 16:17:47'),
(146, 27, 36, 1, 'hii', '2022-02-22 15:46:59'),
(147, 36, 27, 1, 'hi', '2022-02-22 15:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_investments_purchase_information`
--

CREATE TABLE `tbl_investments_purchase_information` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `broker_id` int(10) NOT NULL,
  `investments_id` int(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_investments_purchase_information`
--

INSERT INTO `tbl_investments_purchase_information` (`id`, `user_id`, `broker_id`, `investments_id`, `created_on`, `updated_on`) VALUES
(1, 18, 28, 0, '2019-08-19 17:11:35', '2019-08-19 17:11:35'),
(2, 18, 28, 16, '2019-08-19 17:23:01', '2019-08-19 17:23:01'),
(3, 9, 28, 20, '2019-08-23 10:39:10', '2019-08-23 10:39:10'),
(4, 9, 28, 21, '2019-08-23 11:51:58', '2019-08-23 11:51:58'),
(5, 9, 28, 22, '2019-08-23 11:58:21', '2019-08-23 11:58:21'),
(6, 9, 28, 17, '2019-08-23 12:05:59', '2019-08-23 12:05:59'),
(7, 9, 28, 23, '2019-08-23 12:32:30', '2019-08-23 12:32:30'),
(8, 9, 28, 17, '2019-08-23 14:14:16', '2019-08-23 14:14:16'),
(9, 9, 28, 19, '2019-08-23 14:19:34', '2019-08-23 14:19:34'),
(10, 9, 28, 29, '2019-08-23 14:19:56', '2019-08-23 14:19:56'),
(11, 9, 28, 14, '2019-08-23 14:20:22', '2019-08-23 14:20:22'),
(12, 9, 28, 21, '2019-08-23 15:44:55', '2019-08-23 15:44:55'),
(13, 9, 28, 17, '2019-08-23 16:09:03', '2019-08-23 16:09:03'),
(14, 9, 28, 4, '2019-08-23 16:09:13', '2019-08-23 16:09:13'),
(15, 9, 28, 14, '2019-08-23 16:09:35', '2019-08-23 16:09:35'),
(16, 9, 28, 3, '2019-08-23 16:57:57', '2019-08-23 16:57:57'),
(17, 9, 28, 27, '2019-08-23 16:58:06', '2019-08-23 16:58:06'),
(18, 9, 28, 31, '2019-08-23 16:58:21', '2019-08-23 16:58:21'),
(19, 9, 28, 21, '2019-08-23 18:12:55', '2019-08-23 18:12:55'),
(20, 9, 28, 16, '2019-08-26 17:14:35', '2019-08-26 17:14:35'),
(21, 18, 28, 21, '2019-08-26 18:48:58', '2019-08-26 18:48:58'),
(22, 9, 28, 3, '2019-08-27 11:43:40', '2019-08-27 11:43:40'),
(23, 9, 28, 21, '2019-08-27 11:47:16', '2019-08-27 11:47:16'),
(24, 9, 28, 17, '2019-08-27 14:24:20', '2019-08-27 14:24:20'),
(25, 9, 28, 28, '2019-08-27 14:24:34', '2019-08-27 14:24:34'),
(26, 9, 28, 27, '2019-08-27 14:25:04', '2019-08-27 14:25:04'),
(27, 9, 28, 31, '2019-08-27 14:25:15', '2019-08-27 14:25:15'),
(28, 9, 28, 21, '2019-08-27 14:25:26', '2019-08-27 14:25:26'),
(29, 9, 28, 21, '2019-08-27 18:10:14', '2019-08-27 18:10:14'),
(30, 9, 28, 4, '2019-08-28 11:02:17', '2019-08-28 11:02:17'),
(31, 9, 28, 26, '2019-08-29 16:29:42', '2019-08-29 16:29:42'),
(32, 9, 28, 19, '2019-08-29 16:31:00', '2019-08-29 16:31:00'),
(33, 9, 28, 29, '2019-08-29 16:42:47', '2019-08-29 16:42:47'),
(34, 9, 28, 3, '2019-08-30 14:38:09', '2019-08-30 14:38:09'),
(35, 30, 28, 4, '2019-08-30 21:36:16', '2019-08-30 21:36:16'),
(36, 18, 28, 4, '2019-09-19 14:28:30', '2019-09-19 14:28:30'),
(37, 18, 28, 21, '2019-09-19 14:28:51', '2019-09-19 14:28:51'),
(38, 35, 28, 25, '2019-09-20 18:15:14', '2019-09-20 18:15:14'),
(39, 35, 28, 3, '2019-09-20 18:16:34', '2019-09-20 18:16:34'),
(40, 36, 28, 17, '2019-09-23 14:04:41', '2019-09-23 14:04:41'),
(41, 9, 28, 21, '2019-09-26 11:10:37', '2019-09-26 11:10:37'),
(42, 9, 28, 17, '2019-09-26 11:34:10', '2019-09-26 11:34:10'),
(43, 9, 28, 19, '2019-09-26 12:05:43', '2019-09-26 12:05:43'),
(44, 9, 28, 21, '2019-09-26 12:06:58', '2019-09-26 12:06:58'),
(45, 9, 28, 11, '2019-09-26 12:07:14', '2019-09-26 12:07:14'),
(46, 9, 28, 14, '2019-09-26 12:07:30', '2019-09-26 12:07:30'),
(47, 9, 28, 14, '2019-09-26 12:14:32', '2019-09-26 12:14:32'),
(48, 9, 28, 4, '2019-09-26 12:18:32', '2019-09-26 12:18:32'),
(49, 9, 28, 17, '2019-09-26 12:18:47', '2019-09-26 12:18:47'),
(50, 9, 28, 3, '2019-09-26 12:41:55', '2019-09-26 12:41:55'),
(51, 9, 28, 29, '2019-09-26 12:42:12', '2019-09-26 12:42:12'),
(52, 9, 28, 26, '2019-09-26 12:43:12', '2019-09-26 12:43:12'),
(53, 9, 28, 19, '2019-09-26 12:43:27', '2019-09-26 12:43:27'),
(54, 9, 28, 14, '2019-09-26 12:45:59', '2019-09-26 12:45:59'),
(55, 9, 28, 16, '2019-09-26 12:46:19', '2019-09-26 12:46:19'),
(56, 18, 28, 21, '2019-09-26 17:08:29', '2019-09-26 17:08:29'),
(57, 40, 28, 4, '2019-09-28 13:49:58', '2019-09-28 13:49:58'),
(58, 37, 28, 17, '2019-10-10 11:46:33', '2019-10-10 11:46:33'),
(59, 43, 28, 3, '2019-10-16 04:07:06', '2019-10-16 04:07:06'),
(60, 49, 28, 3, '2019-10-25 12:18:10', '2019-10-25 12:18:10'),
(61, 49, 28, 29, '2019-10-25 12:24:01', '2019-10-25 12:24:01'),
(62, 49, 28, 10, '2019-10-25 12:24:21', '2019-10-25 12:24:21'),
(63, 18, 28, 19, '2019-10-29 15:37:03', '2019-10-29 15:37:03'),
(64, 50, 28, 3, '2019-10-30 10:49:53', '2019-10-30 10:49:53'),
(65, 50, 28, 29, '2019-10-30 10:54:18', '2019-10-30 10:54:18'),
(66, 36, 28, 21, '2019-10-30 11:20:10', '2019-10-30 11:20:10'),
(67, 50, 28, 4, '2019-11-04 13:04:18', '2019-11-04 13:04:18'),
(68, 50, 28, 14, '2019-11-04 14:45:45', '2019-11-04 14:45:45'),
(69, 50, 28, 16, '2019-11-04 14:46:16', '2019-11-04 14:46:16'),
(70, 18, 28, 4, '2019-11-04 15:01:05', '2019-11-04 15:01:05'),
(71, 50, 28, 19, '2019-11-04 15:01:41', '2019-11-04 15:01:41'),
(72, 50, 28, 26, '2019-11-04 15:02:04', '2019-11-04 15:02:04'),
(73, 18, 28, 17, '2019-11-04 15:02:31', '2019-11-04 15:02:31'),
(74, 50, 28, 31, '2019-11-04 17:21:45', '2019-11-04 17:21:45'),
(75, 50, 28, 28, '2019-11-04 17:31:26', '2019-11-04 17:31:26'),
(76, 50, 28, 12, '2019-11-04 17:31:43', '2019-11-04 17:31:43'),
(77, 50, 28, 25, '2019-11-04 17:32:02', '2019-11-04 17:32:02'),
(78, 50, 28, 15, '2019-11-04 17:32:17', '2019-11-04 17:32:17'),
(79, 50, 28, 18, '2019-11-04 17:32:30', '2019-11-04 17:32:30'),
(80, 50, 28, 23, '2019-11-04 17:32:44', '2019-11-04 17:32:44'),
(81, 50, 28, 20, '2019-11-04 17:33:00', '2019-11-04 17:33:00'),
(82, 50, 28, 24, '2019-11-04 17:33:14', '2019-11-04 17:33:14'),
(83, 50, 28, 30, '2019-11-04 17:49:00', '2019-11-04 17:49:00'),
(84, 18, 28, 3, '2019-11-05 18:07:40', '2019-11-05 18:07:40'),
(85, 18, 28, 19, '2019-11-05 18:07:51', '2019-11-05 18:07:51'),
(86, 18, 28, 31, '2019-11-05 18:08:01', '2019-11-05 18:08:01'),
(87, 18, 28, 6, '2019-11-05 18:08:12', '2019-11-05 18:08:12'),
(88, 18, 28, 21, '2019-11-05 18:08:23', '2019-11-05 18:08:23'),
(89, 18, 28, 21, '2019-11-08 11:26:31', '2019-11-08 11:26:31'),
(90, 18, 28, 19, '2019-11-08 11:26:46', '2019-11-08 11:26:46'),
(91, 18, 28, 14, '2019-11-08 11:45:24', '2019-11-08 11:45:24'),
(92, 18, 28, 11, '2019-11-08 11:45:43', '2019-11-08 11:45:43'),
(93, 18, 28, 4, '2019-11-08 12:46:23', '2019-11-08 12:46:23'),
(94, 18, 28, 21, '2019-11-11 17:35:40', '2019-11-11 17:35:40'),
(95, 18, 28, 4, '2019-11-11 17:35:50', '2019-11-11 17:35:50'),
(96, 18, 28, 27, '2019-11-11 17:36:00', '2019-11-11 17:36:00'),
(97, 18, 28, 19, '2019-11-21 14:26:56', '2019-11-21 14:26:56'),
(98, 50, 28, 11, '2019-11-27 16:51:15', '2019-11-27 16:51:15'),
(99, 50, 28, 3, '2019-11-30 14:19:46', '2019-11-30 14:19:46'),
(100, 18, 28, 19, '2020-02-07 15:27:24', '2020-02-07 15:27:24'),
(101, 18, 28, 17, '2020-02-07 15:27:40', '2020-02-07 15:27:40'),
(102, 18, 28, 21, '2020-02-07 15:36:02', '2020-02-07 15:36:02'),
(103, 18, 28, 29, '2020-02-07 15:36:14', '2020-02-07 15:36:14'),
(104, 18, 28, 14, '2020-02-07 17:52:42', '2020-02-07 17:52:42'),
(105, 18, 28, 16, '2020-02-07 17:53:02', '2020-02-07 17:53:02'),
(106, 18, 28, 11, '2020-02-07 17:54:41', '2020-02-07 17:54:41'),
(107, 18, 28, 15, '2020-02-07 17:58:52', '2020-02-07 17:58:52'),
(108, 18, 28, 31, '2020-02-07 18:16:18', '2020-02-07 18:16:18'),
(109, 18, 28, 4, '2020-02-07 18:16:36', '2020-02-07 18:16:36'),
(110, 18, 28, 29, '2020-02-07 18:25:15', '2020-02-07 18:25:15'),
(111, 18, 28, 6, '2020-02-07 18:25:27', '2020-02-07 18:25:27'),
(112, 18, 28, 16, '2020-02-07 18:25:38', '2020-02-07 18:25:38'),
(113, 18, 28, 30, '2020-02-07 18:25:57', '2020-02-07 18:25:57'),
(114, 18, 28, 21, '2020-02-07 18:30:11', '2020-02-07 18:30:11'),
(115, 18, 28, 6, '2020-02-07 18:37:01', '2020-02-07 18:37:01'),
(116, 18, 28, 31, '2020-02-07 18:37:12', '2020-02-07 18:37:12'),
(117, 18, 28, 24, '2020-02-07 18:37:26', '2020-02-07 18:37:26'),
(118, 18, 28, 21, '2020-02-07 18:47:49', '2020-02-07 18:47:49'),
(119, 18, 28, 11, '2020-02-07 18:48:00', '2020-02-07 18:48:00'),
(120, 18, 28, 30, '2020-02-07 18:48:17', '2020-02-07 18:48:17'),
(121, 18, 28, 16, '2020-02-07 18:50:42', '2020-02-07 18:50:42'),
(122, 18, 28, 14, '2020-02-07 18:55:49', '2020-02-07 18:55:49'),
(123, 18, 28, 3, '2020-02-07 18:56:51', '2020-02-07 18:56:51'),
(124, 18, 28, 4, '2020-02-07 18:57:03', '2020-02-07 18:57:03'),
(125, 18, 28, 4, '2020-02-20 17:03:48', '2020-02-20 17:03:48'),
(126, 1, 28, 19, '2020-02-26 14:10:14', '2020-02-26 14:10:14'),
(127, 1, 28, 21, '2020-02-26 14:10:42', '2020-02-26 14:10:42'),
(128, 1, 28, 3, '2020-02-26 14:11:33', '2020-02-26 14:11:33'),
(129, 1, 28, 19, '2020-02-26 17:03:59', '2020-02-26 17:03:59'),
(130, 1, 28, 4, '2020-02-26 18:31:04', '2020-02-26 18:31:04'),
(131, 1, 28, 19, '2020-02-27 11:24:25', '2020-02-27 11:24:25'),
(132, 1, 28, 29, '2020-02-27 11:26:16', '2020-02-27 11:26:16'),
(133, 1, 28, 7, '2020-02-27 12:57:50', '2020-02-27 12:57:50'),
(134, 1, 28, 12, '2020-02-27 15:53:10', '2020-02-27 15:53:10'),
(135, 1, 28, 8, '2020-02-27 15:53:34', '2020-02-27 15:53:34'),
(136, 1, 28, 6, '2020-02-27 16:17:07', '2020-02-27 16:17:07'),
(137, 46, 28, 12, '2020-02-27 17:36:29', '2020-02-27 17:36:29'),
(138, 18, 28, 7, '2020-03-12 10:15:41', '2020-03-12 10:15:41'),
(139, 18, 28, 8, '2020-03-13 11:45:04', '2020-03-13 11:45:04'),
(140, 18, 28, 7, '2020-03-13 12:45:00', '2020-03-13 12:45:00'),
(141, 9, 28, 7, '2020-03-13 15:09:45', '2020-03-13 15:09:45'),
(142, 9, 28, 6, '2020-03-13 16:56:58', '2020-03-13 16:56:58'),
(143, 9, 28, 8, '2020-03-13 17:18:20', '2020-03-13 17:18:20'),
(144, 9, 28, 6, '2020-03-13 18:38:02', '2020-03-13 18:38:02'),
(145, 9, 28, 8, '2020-03-13 18:39:17', '2020-03-13 18:39:17'),
(146, 9, 28, 7, '2020-03-14 10:36:29', '2020-03-14 10:36:29'),
(147, 18, 28, 6, '2020-03-23 15:09:52', '2020-03-23 15:09:52'),
(148, 36, 28, 6, '2020-12-15 12:45:48', '2020-12-15 12:45:48'),
(149, 36, 28, 7, '2020-12-15 12:46:03', '2020-12-15 12:46:03'),
(150, 18, 28, 12, '2021-04-16 10:13:43', '2021-04-16 10:13:43'),
(151, 36, 28, 12, '2022-02-19 14:19:32', '2022-02-19 14:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

CREATE TABLE `tbl_job_type` (
  `id` int(10) NOT NULL,
  `jobtype` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_type`
--

INSERT INTO `tbl_job_type` (`id`, `jobtype`, `created_on`) VALUES
(1, 'Employee', '2019-06-20 18:34:23'),
(2, 'Unemployed', '2019-06-20 18:34:23'),
(3, 'Freelance', '2019-06-20 18:34:23'),
(4, 'Employer', '2019-06-20 18:34:23'),
(5, 'Other', '2019-06-20 18:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(10) NOT NULL,
  `user_one` int(10) NOT NULL DEFAULT '0',
  `user_two` int(10) NOT NULL DEFAULT '0',
  `type` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '0',
  `notification` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`id`, `user_one`, `user_two`, `type`, `status`, `notification`, `created_on`, `updated_on`) VALUES
(1, 0, 50, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2019-11-12 12:27:12', '0000-00-00 00:00:00'),
(2, 0, 50, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2019-11-12 12:28:30', '0000-00-00 00:00:00'),
(3, 0, 50, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2019-11-12 14:58:55', '0000-00-00 00:00:00'),
(4, 0, 18, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2019-11-12 15:56:43', '0000-00-00 00:00:00'),
(5, 0, 25, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2019-11-13 10:47:39', '0000-00-00 00:00:00'),
(6, 0, 45, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2019-11-13 11:53:03', '0000-00-00 00:00:00'),
(7, 0, 36, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2019-11-14 11:05:57', '0000-00-00 00:00:00'),
(8, 0, 57, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2019-11-27 16:32:12', '0000-00-00 00:00:00'),
(9, 0, 61, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2019-11-27 17:27:27', '0000-00-00 00:00:00'),
(10, 0, 62, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2019-11-27 18:14:04', '0000-00-00 00:00:00'),
(11, 0, 64, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2019-11-28 15:10:43', '0000-00-00 00:00:00'),
(12, 0, 65, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2019-11-28 15:29:49', '0000-00-00 00:00:00'),
(13, 0, 67, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2019-11-28 15:39:49', '0000-00-00 00:00:00'),
(14, 0, 69, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2019-12-16 10:23:22', '0000-00-00 00:00:00'),
(15, 0, 70, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-10 12:35:17', '0000-00-00 00:00:00'),
(16, 0, 27, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2020-01-10 14:12:08', '0000-00-00 00:00:00'),
(21, 70, 27, 2, 0, 'Hi <b>Katapa MS</b> Sent you request to be your client', '2020-01-10 14:57:58', '0000-00-00 00:00:00'),
(22, 27, 70, 2, 0, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You  both communicate each other', '2020-01-10 16:18:37', '0000-00-00 00:00:00'),
(28, 18, 27, 2, 0, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2020-01-10 17:36:28', '0000-00-00 00:00:00'),
(29, 27, 18, 2, 1, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2020-01-10 17:37:20', '0000-00-00 00:00:00'),
(30, 36, 25, 2, 1, 'Hi <b>Nuchu Teli</b> Sent you request to be your client', '2020-01-10 17:58:28', '0000-00-00 00:00:00'),
(31, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-01-10 17:59:29', '0000-00-00 00:00:00'),
(32, 45, 25, 2, 1, 'Hi <b>Amitabh Suman</b> Sent you request to be your client', '2020-01-10 18:31:12', '0000-00-00 00:00:00'),
(33, 25, 45, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-01-10 18:31:53', '0000-00-00 00:00:00'),
(34, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-01-21', '2020-01-20 16:12:12', '0000-00-00 00:00:00'),
(35, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-01-20', '2020-01-20 16:12:41', '0000-00-00 00:00:00'),
(36, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2029-01-19', '2020-01-23 10:51:06', '0000-00-00 00:00:00'),
(37, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-01-23', '2020-01-23 10:54:37', '0000-00-00 00:00:00'),
(38, 9, 25, 3, 1, 'Hi <b> </b> Scheduled Appointment with you on 2020-01-24', '2020-01-23 15:10:27', '0000-00-00 00:00:00'),
(39, 9, 28, 3, 1, 'Hi <b> </b> Scheduled Appointment with you on 2020-01-23', '2020-01-23 15:57:59', '0000-00-00 00:00:00'),
(40, 0, 72, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-24 09:10:12', '0000-00-00 00:00:00'),
(41, 0, 46, 1, 1, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-24 10:18:37', '0000-00-00 00:00:00'),
(42, 46, 25, 2, 1, 'Hi <b>Avdesh Kumar</b> Sent you request to be your client', '2020-01-24 10:31:26', '0000-00-00 00:00:00'),
(43, 25, 46, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-01-24 10:33:40', '0000-00-00 00:00:00'),
(44, 46, 25, 3, 1, 'Hi <b>Avdesh Kumar</b> Scheduled Appointment with you on 2020-01-24', '2020-01-24 10:40:57', '0000-00-00 00:00:00'),
(45, 46, 27, 2, 0, 'Hi <b>Avdesh Kumar</b> Sent you request to be your client', '2020-01-24 16:22:26', '0000-00-00 00:00:00'),
(46, 27, 46, 2, 1, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2020-01-24 16:23:13', '0000-00-00 00:00:00'),
(47, 18, 28, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2020-01-24 18:02:27', '0000-00-00 00:00:00'),
(48, 28, 18, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-01-24 18:18:04', '0000-00-00 00:00:00'),
(49, 0, 73, 1, 1, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-27 10:34:46', '0000-00-00 00:00:00'),
(50, 0, 74, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-27 10:49:32', '0000-00-00 00:00:00'),
(51, 18, 73, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2020-01-27 10:57:40', '0000-00-00 00:00:00'),
(52, 73, 18, 2, 1, 'Hi <b>Dilip Ghosh</b> Accepted your request. Now You both communicate each other', '2020-01-27 10:58:00', '0000-00-00 00:00:00'),
(53, 9, 27, 2, 0, 'Hi <b>testing patient</b> Sent you request to be your client', '2020-01-27 12:33:15', '0000-00-00 00:00:00'),
(54, 27, 9, 2, 1, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2020-01-27 12:33:37', '0000-00-00 00:00:00'),
(55, 0, 9, 1, 1, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2020-01-27 12:35:27', '0000-00-00 00:00:00'),
(56, 9, 28, 2, 1, 'Hi <b>Pkk Ram</b> Sent you request to be your client', '2020-01-27 12:35:58', '0000-00-00 00:00:00'),
(57, 28, 9, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-01-27 12:36:20', '0000-00-00 00:00:00'),
(58, 18, 73, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-01-28', '2020-01-28 10:19:04', '0000-00-00 00:00:00'),
(59, 0, 48, 1, 0, 'Please take all feature plan to access everything with fivepercent', '2020-01-28 10:22:13', '0000-00-00 00:00:00'),
(60, 36, 73, 3, 1, 'Hi <b>Nuchu Teli</b> Scheduled Appointment with you on 2020-01-28', '2020-01-28 10:23:56', '0000-00-00 00:00:00'),
(61, 0, 77, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-28 10:36:44', '0000-00-00 00:00:00'),
(62, 0, 78, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-28 11:16:16', '0000-00-00 00:00:00'),
(63, 0, 79, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-28 11:42:18', '0000-00-00 00:00:00'),
(64, 0, 80, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-28 12:38:36', '0000-00-00 00:00:00'),
(65, 0, 81, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-28 12:40:16', '0000-00-00 00:00:00'),
(66, 0, 82, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-28 12:46:31', '0000-00-00 00:00:00'),
(67, 0, 84, 1, 1, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-29 08:06:43', '0000-00-00 00:00:00'),
(68, 0, 83, 1, 1, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-29 08:10:01', '0000-00-00 00:00:00'),
(69, 0, 85, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-29 11:12:27', '0000-00-00 00:00:00'),
(70, 85, 73, 2, 1, 'Hi <b>Rajesh Singh</b> Sent you request to be your client', '2020-01-29 11:16:17', '0000-00-00 00:00:00'),
(71, 0, 86, 1, 0, 'You are using basic plan. Please take Premium plan to access everything with fivepercent', '2020-01-29 11:28:25', '0000-00-00 00:00:00'),
(72, 0, 60, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-29 11:51:07', '0000-00-00 00:00:00'),
(73, 0, 53, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-29 12:30:38', '0000-00-00 00:00:00'),
(74, 53, 86, 2, 0, 'Hi <b>Vinu sinha</b> Sent you request to be your client', '2020-01-29 12:31:18', '0000-00-00 00:00:00'),
(75, 53, 80, 2, 0, 'Hi <b>Vinu sinha</b> Sent you request to be your client', '2020-01-29 12:33:25', '0000-00-00 00:00:00'),
(76, 80, 53, 2, 0, 'Hi <b>Rajiv  Singh</b> Accepted your request. Now You both communicate each other', '2020-01-29 12:33:52', '0000-00-00 00:00:00'),
(77, 0, 88, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-01-30 12:18:02', '0000-00-00 00:00:00'),
(78, 73, 85, 2, 0, 'Hi <b>Dilip Ghosh</b> Accepted your request. Now You both communicate each other', '2020-02-01 11:07:25', '0000-00-00 00:00:00'),
(79, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-02-01', '2020-02-01 12:49:59', '0000-00-00 00:00:00'),
(80, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2020-02-07 14:55:28', '0000-00-00 00:00:00'),
(81, 25, 18, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-02-07 14:57:00', '0000-00-00 00:00:00'),
(82, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2020-02-07 14:58:14', '0000-00-00 00:00:00'),
(83, 25, 18, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-02-07 15:00:41', '0000-00-00 00:00:00'),
(84, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2020-02-07 15:15:50', '0000-00-00 00:00:00'),
(85, 25, 18, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-02-07 15:16:31', '0000-00-00 00:00:00'),
(86, 18, 80, 2, 0, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2020-02-20 17:08:13', '0000-00-00 00:00:00'),
(87, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-02-21', '2020-02-20 17:10:25', '0000-00-00 00:00:00'),
(88, 0, 1, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-02-25 15:06:39', '0000-00-00 00:00:00'),
(89, 0, 40, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-02-26 11:33:58', '0000-00-00 00:00:00'),
(90, 0, 6, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-02-26 13:20:04', '0000-00-00 00:00:00'),
(91, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-03-17', '2020-03-16 18:44:39', '0000-00-00 00:00:00'),
(92, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-03-16', '2020-03-16 18:50:11', '0000-00-00 00:00:00'),
(93, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-03-23', '2020-03-23 15:45:46', '0000-00-00 00:00:00'),
(94, 18, 25, 3, 1, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2020-03-24', '2020-03-23 15:45:57', '0000-00-00 00:00:00'),
(95, 0, 21, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-04-06 11:10:30', '0000-00-00 00:00:00'),
(96, 1, 25, 2, 1, 'Hi <b>testing patient</b> Sent you request to be your client', '2020-04-06 11:24:35', '0000-00-00 00:00:00'),
(97, 25, 1, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-04-06 11:25:10', '0000-00-00 00:00:00'),
(98, 21, 25, 2, 1, 'Hi <b>Sanjeet Kumar</b> Sent you request to be your client', '2020-04-06 11:26:06', '0000-00-00 00:00:00'),
(99, 25, 21, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-04-06 11:26:22', '0000-00-00 00:00:00'),
(100, 0, 90, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-04-15 11:46:49', '0000-00-00 00:00:00'),
(101, 0, 2, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2020-04-16 17:41:12', '0000-00-00 00:00:00'),
(102, 0, 2, 2, 0, 'Your account is going to deactive winthin 10 or 15 days. Please upgrade subscription plan to access all the fivepercent feature', '2020-04-16 17:41:12', '0000-00-00 00:00:00'),
(103, 36, 27, 2, 0, 'Hi <b>Nuchu Teli</b> Sent you request to be your client', '2020-04-25 13:17:27', '0000-00-00 00:00:00'),
(104, 36, 28, 2, 1, 'Hi <b>Nuchu Teli</b> Sent you request to be your client', '2020-04-25 13:19:29', '0000-00-00 00:00:00'),
(105, 21, 25, 2, 1, 'Hi <b>Sanjeet Kumar</b> Sent you request to be your client', '2020-04-25 15:57:49', '0000-00-00 00:00:00'),
(106, 25, 21, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-04-25 15:58:34', '0000-00-00 00:00:00'),
(107, 9, 25, 3, 1, 'Hi <b> </b> Scheduled Appointment with you on 2020-05-07', '2020-05-06 16:37:21', '0000-00-00 00:00:00'),
(108, 36, 25, 2, 1, 'Hi <b>Nuchu Teli</b> Sent you request to be your client', '2020-05-11 12:10:20', '0000-00-00 00:00:00'),
(109, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2020-05-11 12:10:49', '0000-00-00 00:00:00'),
(110, 9, 58, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-24 11:45:39', '0000-00-00 00:00:00'),
(111, 9, 25, 2, 1, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-24 14:00:55', '0000-00-00 00:00:00'),
(112, 9, 76, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-24 14:51:52', '0000-00-00 00:00:00'),
(113, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-24 15:56:49', '0000-00-00 00:00:00'),
(114, 9, 25, 2, 1, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-24 16:07:52', '0000-00-00 00:00:00'),
(115, 9, 27, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-24 16:08:03', '0000-00-00 00:00:00'),
(116, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-24 18:29:16', '0000-00-00 00:00:00'),
(117, 28, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-24 18:29:34', '0000-00-00 00:00:00'),
(118, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-24 18:36:25', '0000-00-00 00:00:00'),
(119, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-24 18:37:26', '0000-00-00 00:00:00'),
(120, 9, 28, 2, 1, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 17:07:35', '0000-00-00 00:00:00'),
(121, 28, 9, 2, 1, 'Hi <b>pk Ram</b> Declined you request', '2020-06-25 17:09:27', '0000-00-00 00:00:00'),
(122, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 17:10:56', '0000-00-00 00:00:00'),
(123, 9, 73, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 17:11:21', '0000-00-00 00:00:00'),
(124, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-25 17:11:58', '0000-00-00 00:00:00'),
(125, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 17:27:11', '0000-00-00 00:00:00'),
(126, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-25 17:27:54', '0000-00-00 00:00:00'),
(127, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 17:34:04', '0000-00-00 00:00:00'),
(128, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-25 17:34:41', '0000-00-00 00:00:00'),
(129, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 17:51:47', '0000-00-00 00:00:00'),
(130, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-25 17:52:20', '0000-00-00 00:00:00'),
(131, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 17:55:14', '0000-00-00 00:00:00'),
(132, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-25 17:59:42', '0000-00-00 00:00:00'),
(133, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 18:02:15', '0000-00-00 00:00:00'),
(134, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-25 18:03:22', '0000-00-00 00:00:00'),
(135, 9, 28, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-06-25 18:45:54', '0000-00-00 00:00:00'),
(136, 28, 9, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2020-06-26 11:39:34', '0000-00-00 00:00:00'),
(137, 0, 93, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2020-06-29 11:10:24', '0000-00-00 00:00:00'),
(138, 36, 25, 3, 1, 'Hi <b>Nuchu Teli</b> Scheduled Appointment with you on 2020-08-19', '2020-08-18 13:07:47', '0000-00-00 00:00:00'),
(139, 36, 98, 2, 0, 'Hi <b>Nuchu Teli</b> Sent you request to be your client', '2020-09-07 19:01:43', '0000-00-00 00:00:00'),
(140, 9, 69, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-11-27 12:58:00', '0000-00-00 00:00:00'),
(141, 9, 98, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-11-27 13:02:23', '0000-00-00 00:00:00'),
(142, 9, 64, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-11-27 15:14:06', '0000-00-00 00:00:00'),
(143, 9, 80, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-12-02 18:45:10', '0000-00-00 00:00:00'),
(144, 102, 28, 2, 0, 'Hi <b>Kk Kk</b> Sent you request to be your client', '2020-12-03 12:03:58', '0000-00-00 00:00:00'),
(145, 102, 27, 2, 0, 'Hi <b>Kk Kk</b> Sent you request to be your client', '2020-12-03 16:17:53', '0000-00-00 00:00:00'),
(146, 102, 87, 2, 0, 'Hi <b>Kk Kk</b> Sent you request to be your client', '2020-12-03 16:20:55', '0000-00-00 00:00:00'),
(147, 9, 79, 2, 0, 'Hi <b>Pk Ram</b> Sent you request to be your client', '2020-12-15 13:16:29', '0000-00-00 00:00:00'),
(148, 25, 9, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-01-25 18:27:23', '0000-00-00 00:00:00'),
(149, 0, 105, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2021-02-05 11:31:59', '0000-00-00 00:00:00'),
(150, 0, 106, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2021-02-05 13:13:28', '0000-00-00 00:00:00'),
(151, 0, 107, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2021-02-14 19:07:23', '0000-00-00 00:00:00'),
(152, 36, 64, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-01 12:32:23', '0000-00-00 00:00:00'),
(153, 36, 58, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-01 12:33:57', '0000-00-00 00:00:00'),
(154, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-02 12:06:59', '0000-00-00 00:00:00'),
(155, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-03 16:41:45', '0000-00-00 00:00:00'),
(156, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-03 16:42:25', '0000-00-00 00:00:00'),
(157, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-05', '2021-03-05 12:15:41', '0000-00-00 00:00:00'),
(158, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-06', '2021-03-05 12:17:30', '0000-00-00 00:00:00'),
(159, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-06', '2021-03-05 12:33:34', '0000-00-00 00:00:00'),
(160, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-05', '2021-03-05 12:34:46', '0000-00-00 00:00:00'),
(161, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 12:57:32', '0000-00-00 00:00:00'),
(162, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-05 13:01:44', '0000-00-00 00:00:00'),
(163, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 13:02:17', '0000-00-00 00:00:00'),
(164, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 17:39:31', '0000-00-00 00:00:00'),
(165, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 17:52:21', '0000-00-00 00:00:00'),
(166, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 17:52:44', '0000-00-00 00:00:00'),
(167, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 17:56:26', '0000-00-00 00:00:00'),
(168, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 17:57:38', '0000-00-00 00:00:00'),
(169, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-05 18:13:24', '0000-00-00 00:00:00'),
(170, 36, 27, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 10:16:39', '0000-00-00 00:00:00'),
(171, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-10', '2021-03-06 13:05:04', '0000-00-00 00:00:00'),
(172, 36, 69, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 14:05:02', '0000-00-00 00:00:00'),
(173, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 14:24:02', '0000-00-00 00:00:00'),
(174, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 14:25:43', '0000-00-00 00:00:00'),
(175, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 14:26:41', '0000-00-00 00:00:00'),
(176, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 14:52:42', '0000-00-00 00:00:00'),
(177, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 15:03:42', '0000-00-00 00:00:00'),
(178, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 15:05:41', '0000-00-00 00:00:00'),
(179, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 15:06:17', '0000-00-00 00:00:00'),
(180, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 15:08:50', '0000-00-00 00:00:00'),
(181, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 15:40:06', '0000-00-00 00:00:00'),
(182, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 15:40:47', '0000-00-00 00:00:00'),
(183, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 15:41:43', '0000-00-00 00:00:00'),
(184, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 15:51:09', '0000-00-00 00:00:00'),
(185, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 16:18:42', '0000-00-00 00:00:00'),
(186, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 16:33:49', '0000-00-00 00:00:00'),
(187, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 16:35:08', '0000-00-00 00:00:00'),
(188, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 16:45:25', '0000-00-00 00:00:00'),
(189, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-06 16:47:24', '0000-00-00 00:00:00'),
(190, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-06 16:47:36', '0000-00-00 00:00:00'),
(191, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-08 16:03:27', '0000-00-00 00:00:00'),
(192, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-08 16:34:13', '0000-00-00 00:00:00'),
(193, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-08 16:50:59', '0000-00-00 00:00:00'),
(194, 25, 18, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-08 17:03:02', '0000-00-00 00:00:00'),
(195, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-08 17:03:31', '0000-00-00 00:00:00'),
(196, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-08 17:03:55', '0000-00-00 00:00:00'),
(197, 25, 18, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-08 17:04:03', '0000-00-00 00:00:00'),
(198, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-08 17:28:44', '0000-00-00 00:00:00'),
(199, 25, 18, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-08 17:28:57', '0000-00-00 00:00:00'),
(200, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-08 18:05:22', '0000-00-00 00:00:00'),
(201, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-08 18:05:37', '0000-00-00 00:00:00'),
(202, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-13', '2021-03-08 18:12:09', '0000-00-00 00:00:00'),
(203, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-09-01', '2021-03-08 18:20:40', '0000-00-00 00:00:00'),
(204, 0, 108, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2021-03-09 10:39:06', '0000-00-00 00:00:00'),
(205, 0, 109, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2021-03-09 10:56:36', '0000-00-00 00:00:00'),
(206, 108, 25, 2, 1, 'Hi <b>Palak Kumar</b> Sent you request to be your client', '2021-03-09 12:40:52', '0000-00-00 00:00:00'),
(207, 25, 108, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-09 12:52:03', '0000-00-00 00:00:00'),
(208, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-09 14:08:03', '0000-00-00 00:00:00'),
(209, 25, 18, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-09 14:08:19', '0000-00-00 00:00:00'),
(210, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-10', '2021-03-10 15:30:54', '0000-00-00 00:00:00'),
(211, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-11', '2021-03-10 15:46:03', '0000-00-00 00:00:00'),
(212, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-10', '2021-03-10 15:52:22', '0000-00-00 00:00:00'),
(213, 36, 27, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-10 17:56:11', '0000-00-00 00:00:00'),
(214, 27, 36, 2, 1, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2021-03-10 17:56:24', '0000-00-00 00:00:00'),
(215, 36, 27, 3, 0, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2022-05-04', '2021-03-10 18:01:02', '0000-00-00 00:00:00'),
(216, 18, 27, 2, 0, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-10 18:06:16', '0000-00-00 00:00:00'),
(217, 27, 18, 2, 0, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2021-03-10 18:06:47', '0000-00-00 00:00:00'),
(218, 36, 58, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-12 11:56:57', '0000-00-00 00:00:00'),
(219, 36, 58, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-12 11:57:38', '0000-00-00 00:00:00'),
(220, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-15 14:24:59', '0000-00-00 00:00:00'),
(221, 25, 18, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-15 14:25:25', '0000-00-00 00:00:00'),
(222, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-15 14:59:27', '0000-00-00 00:00:00'),
(223, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-15 15:00:45', '0000-00-00 00:00:00'),
(224, 108, 25, 2, 1, 'Hi <b>Palak Kumar</b> Sent you request to be your client', '2021-03-15 17:53:02', '0000-00-00 00:00:00'),
(225, 25, 108, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-15 17:53:13', '0000-00-00 00:00:00'),
(226, 0, 28, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2021-03-15 18:42:38', '0000-00-00 00:00:00'),
(227, 18, 28, 2, 0, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-15 18:43:43', '0000-00-00 00:00:00'),
(228, 28, 18, 2, 0, 'Hi <b>pk Ram</b> Accepted your request. Now You both communicate each other', '2021-03-15 18:43:55', '0000-00-00 00:00:00'),
(229, 18, 28, 3, 0, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2021-03-16', '2021-03-15 18:48:15', '0000-00-00 00:00:00'),
(230, 18, 28, 3, 0, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2021-03-19', '2021-03-15 18:53:27', '0000-00-00 00:00:00'),
(231, 18, 28, 3, 0, 'Hi <b>Gobind Kumar</b> Scheduled Appointment with you on 2021-03-25', '2021-03-15 19:00:00', '0000-00-00 00:00:00'),
(232, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-17', '2021-03-16 12:58:45', '0000-00-00 00:00:00'),
(233, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-16 16:19:39', '0000-00-00 00:00:00'),
(234, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-16 17:35:41', '0000-00-00 00:00:00'),
(235, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-18', '2021-03-17 10:58:21', '0000-00-00 00:00:00'),
(236, 36, 28, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-17 14:35:22', '0000-00-00 00:00:00'),
(237, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-18 18:02:41', '0000-00-00 00:00:00'),
(238, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-03-18 18:03:23', '0000-00-00 00:00:00'),
(239, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-19 11:10:05', '0000-00-00 00:00:00'),
(240, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-19', '2021-03-19 14:15:54', '0000-00-00 00:00:00'),
(241, 25, 18, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 16:47:30', '0000-00-00 00:00:00'),
(242, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 17:32:17', '0000-00-00 00:00:00'),
(243, 36, 103, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 17:32:56', '0000-00-00 00:00:00'),
(244, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 17:34:23', '0000-00-00 00:00:00'),
(245, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 17:35:06', '0000-00-00 00:00:00'),
(246, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 17:36:49', '0000-00-00 00:00:00'),
(247, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 17:36:58', '0000-00-00 00:00:00'),
(248, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-03-19 17:42:14', '0000-00-00 00:00:00'),
(249, 25, 18, 2, 0, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 17:46:46', '0000-00-00 00:00:00'),
(250, 25, 18, 2, 0, 'Hi <b>Testing Advisor</b> Declined you request', '2021-03-19 17:49:17', '0000-00-00 00:00:00'),
(251, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 17:51:23', '0000-00-00 00:00:00'),
(252, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 17:54:24', '0000-00-00 00:00:00'),
(253, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:00:59', '0000-00-00 00:00:00'),
(254, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:01:21', '0000-00-00 00:00:00'),
(255, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:02:24', '0000-00-00 00:00:00'),
(256, 36, 98, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:12:28', '0000-00-00 00:00:00'),
(257, 36, 98, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:13:03', '0000-00-00 00:00:00'),
(258, 36, 76, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:16:47', '0000-00-00 00:00:00'),
(259, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 18:23:14', '0000-00-00 00:00:00'),
(260, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:27:48', '0000-00-00 00:00:00'),
(261, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 18:28:58', '0000-00-00 00:00:00'),
(262, 36, 64, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:33:44', '0000-00-00 00:00:00'),
(263, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-19 18:49:25', '0000-00-00 00:00:00'),
(264, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-19 18:58:07', '0000-00-00 00:00:00'),
(265, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-20 12:18:06', '0000-00-00 00:00:00'),
(266, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Declined you request', '2021-03-20 12:18:30', '0000-00-00 00:00:00'),
(267, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-20 12:20:40', '0000-00-00 00:00:00'),
(268, 25, 36, 2, 1, 'Hi <b>Testing Advisor</b> Declined you request', '2021-03-20 12:20:53', '0000-00-00 00:00:00'),
(269, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-20 12:21:00', '0000-00-00 00:00:00'),
(270, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-20 12:21:09', '0000-00-00 00:00:00'),
(271, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-22 18:09:26', '0000-00-00 00:00:00'),
(272, 36, 98, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-23 13:14:14', '0000-00-00 00:00:00'),
(273, 25, 36, 2, 1, 'Hi <b> </b> Accepted your request. Now You both communicate each other', '2021-03-23 14:35:24', '0000-00-00 00:00:00'),
(274, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-03-23', '2021-03-23 15:58:22', '0000-00-00 00:00:00'),
(275, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-12-04', '2021-03-23 16:00:59', '0000-00-00 00:00:00'),
(276, 36, 28, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-03-24 14:40:36', '0000-00-00 00:00:00'),
(277, 108, 25, 2, 1, 'Hi <b>Palak Kumar</b> Sent you request to be your client', '2021-04-02 14:46:04', '0000-00-00 00:00:00'),
(278, 25, 108, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-04-02 14:46:18', '0000-00-00 00:00:00'),
(279, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-04-02 14:46:46', '0000-00-00 00:00:00'),
(280, 25, 18, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-04-02 14:46:57', '0000-00-00 00:00:00'),
(281, 108, 27, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-15 11:28:14', '0000-00-00 00:00:00'),
(282, 27, 108, 2, 0, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2021-04-15 11:28:40', '0000-00-00 00:00:00'),
(283, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-04-15', '2021-04-15 18:49:13', '0000-00-00 00:00:00'),
(284, 0, 110, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2021-04-22 19:04:30', '0000-00-00 00:00:00'),
(285, 110, 111, 2, 0, 'Hi <b>nirajk Singh</b> Sent you request to be your client', '2021-04-23 19:04:54', '0000-00-00 00:00:00'),
(286, 110, 111, 2, 0, 'Hi <b>niraj v Singh</b> Sent you request to be your client', '2021-04-27 16:47:31', '0000-00-00 00:00:00'),
(287, 110, 27, 2, 0, 'Hi <b>niraj v Singh</b> Sent you request to be your client', '2021-04-27 17:02:33', '0000-00-00 00:00:00'),
(288, 110, 25, 2, 1, 'Hi <b>niraj v Singh</b> Sent you request to be your client', '2021-04-27 17:05:16', '0000-00-00 00:00:00'),
(289, 25, 110, 2, 0, 'Hi <b>Testing Advisor</b> Accepted your request. Now You both communicate each other', '2021-04-27 17:05:43', '0000-00-00 00:00:00'),
(290, 110, 25, 3, 1, 'Hi <b>niraj v Singh</b> Scheduled Appointment with you on 2021-04-27', '2021-04-27 17:06:36', '0000-00-00 00:00:00'),
(291, 110, 25, 2, 1, 'Hi <b>niraj v Singh</b> Sent you request to be your client', '2021-04-27 17:20:13', '0000-00-00 00:00:00'),
(292, 110, 25, 2, 1, 'Hi <b>niraj v Singh</b> Sent you request to be your client', '2021-04-27 17:20:44', '0000-00-00 00:00:00'),
(293, 25, 110, 2, 0, 'Hi <b>Testingg Advisor</b> Accepted your request. Now You both communicate each other', '2021-04-27 17:21:21', '0000-00-00 00:00:00'),
(294, 110, 25, 3, 1, 'Hi <b>niraj v Singh</b> Scheduled Appointment with you on 2021-04-27', '2021-04-27 17:22:22', '0000-00-00 00:00:00'),
(295, 108, 27, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 16:41:14', '0000-00-00 00:00:00'),
(296, 108, 25, 2, 1, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:18:56', '0000-00-00 00:00:00'),
(297, 25, 108, 2, 0, 'Hi <b>Testingg Advisor</b> Accepted your request. Now You both communicate each other', '2021-04-28 18:19:07', '0000-00-00 00:00:00'),
(298, 108, 25, 2, 1, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:19:54', '0000-00-00 00:00:00'),
(299, 108, 64, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:33:26', '0000-00-00 00:00:00'),
(300, 108, 113, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:33:34', '0000-00-00 00:00:00'),
(301, 108, 27, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:34:09', '0000-00-00 00:00:00'),
(302, 108, 25, 2, 1, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:34:21', '0000-00-00 00:00:00'),
(303, 108, 25, 2, 1, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:35:43', '0000-00-00 00:00:00'),
(304, 108, 28, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:36:37', '0000-00-00 00:00:00'),
(305, 25, 108, 2, 0, 'Hi <b>Testingg Advisor</b> Accepted your request. Now You both communicate each other', '2021-04-28 18:37:21', '0000-00-00 00:00:00'),
(306, 108, 64, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:48:51', '0000-00-00 00:00:00'),
(307, 108, 113, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2021-04-28 18:48:56', '0000-00-00 00:00:00'),
(308, 36, 27, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-04-29 17:38:37', '0000-00-00 00:00:00'),
(309, 36, 80, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-04-29 17:46:26', '0000-00-00 00:00:00'),
(310, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-05-06', '2021-05-06 14:59:42', '0000-00-00 00:00:00'),
(311, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-05-07 14:39:53', '0000-00-00 00:00:00'),
(312, 25, 36, 2, 1, 'Hi <b>Testingg Advisor</b> Accepted your request. Now You both communicate each other', '2021-05-07 14:40:21', '0000-00-00 00:00:00'),
(313, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-05-07 14:40:43', '0000-00-00 00:00:00'),
(314, 18, 25, 2, 1, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2021-05-07 14:48:54', '0000-00-00 00:00:00'),
(315, 25, 36, 2, 1, 'Hi <b>Testingg Advisor</b> Accepted your request. Now You both communicate each other', '2021-05-07 14:53:19', '0000-00-00 00:00:00'),
(316, 25, 18, 2, 0, 'Hi <b>Testingg Advisor</b> Accepted your request. Now You both communicate each other', '2021-05-07 14:53:24', '0000-00-00 00:00:00'),
(317, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-05-07', '2021-05-07 14:54:15', '0000-00-00 00:00:00'),
(318, 36, 25, 2, 1, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-05-07 16:37:33', '0000-00-00 00:00:00'),
(319, 25, 36, 2, 1, 'Hi <b>Testingg Advisor</b> Accepted your request. Now You both communicate each other', '2021-05-07 16:37:56', '0000-00-00 00:00:00'),
(320, 0, 115, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2021-05-07 17:08:44', '0000-00-00 00:00:00'),
(321, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-05-11', '2021-05-11 15:02:26', '0000-00-00 00:00:00'),
(322, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-05-12', '2021-05-11 15:15:14', '0000-00-00 00:00:00'),
(323, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-05-13', '2021-05-11 15:15:31', '0000-00-00 00:00:00'),
(324, 36, 25, 3, 1, 'Hi <b>Sudhir BJP</b> Scheduled Appointment with you on 2021-05-15', '2021-05-15 12:48:02', '0000-00-00 00:00:00'),
(325, 36, 98, 2, 0, 'Hi <b>Sudhir BJP</b> Sent you request to be your client', '2021-06-18 15:40:50', '0000-00-00 00:00:00'),
(326, 27, 110, 2, 0, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2021-06-22 10:23:39', '0000-00-00 00:00:00'),
(327, 27, 108, 2, 0, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2021-06-22 10:23:46', '0000-00-00 00:00:00'),
(328, 27, 36, 2, 1, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2021-06-22 10:23:52', '0000-00-00 00:00:00'),
(329, 0, 116, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2021-07-19 12:55:12', '0000-00-00 00:00:00'),
(330, 0, 117, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2021-07-19 13:15:44', '0000-00-00 00:00:00'),
(331, 36, 28, 2, 0, 'Hi <b>Sudhir Kumar</b> Sent you request to be your client', '2022-01-10 14:44:17', '0000-00-00 00:00:00'),
(332, 36, 27, 3, 0, 'Hi <b>Sudhir Kumar</b> Scheduled Appointment with you on 2022-02-01', '2022-01-31 09:53:41', '0000-00-00 00:00:00'),
(333, 36, 83, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2022-02-04 12:49:02', '0000-00-00 00:00:00'),
(334, 36, 27, 3, 0, 'Hi <b>Palak Maharaj</b> Scheduled Appointment with you on 2022-02-06', '2022-02-04 12:56:13', '0000-00-00 00:00:00'),
(335, 36, 27, 3, 0, 'Hi <b>Palak Maharaj</b> Scheduled Appointment with you on 2022-02-04', '2022-02-04 15:58:45', '0000-00-00 00:00:00'),
(336, 0, 118, 1, 0, 'You are using demo account or free plan. Please renew your plan to access everything with fivepercent', '2022-02-07 10:07:49', '0000-00-00 00:00:00'),
(337, 0, 120, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2022-02-07 14:50:38', '0000-00-00 00:00:00'),
(338, 36, 27, 3, 0, 'Hi <b>Palak Maharaj</b> Scheduled Appointment with you on 2022-02-18', '2022-02-10 08:44:55', '0000-00-00 00:00:00'),
(339, 18, 27, 2, 0, 'Hi <b>Gobind Kumar</b> Sent you request to be your client', '2022-02-19 13:11:33', '0000-00-00 00:00:00'),
(340, 27, 18, 2, 0, 'Hi <b>Advisor Kumar</b> Accepted your request. Now You both communicate each other', '2022-02-19 13:11:47', '0000-00-00 00:00:00'),
(341, 0, 121, 1, 0, 'Hooray You are using all feature of Five Percent. You can do anything smoothly', '2022-02-22 12:34:21', '0000-00-00 00:00:00'),
(342, 36, 27, 3, 0, 'Hi <b>Palak Maharaj</b> Scheduled Appointment with you on 2022-02-23', '2022-02-22 16:19:34', '0000-00-00 00:00:00'),
(343, 36, 27, 3, 0, 'Hi <b>Palak Maharaj</b> Scheduled Appointment with you on 2022-02-22', '2022-02-22 16:19:48', '0000-00-00 00:00:00'),
(344, 36, 27, 3, 0, 'Hi <b>Palak Maharaj</b> Scheduled Appointment with you on 2022-02-22', '2022-02-22 16:32:36', '0000-00-00 00:00:00'),
(345, 0, 109, 2, 0, 'Your account is going to deactive winthin 10 or 15 days. Please upgrade subscription plan to access all the fivepercent feature', '2022-03-04 19:36:23', '0000-00-00 00:00:00'),
(346, 36, 28, 2, 0, 'Hi <b>Palak Maharaj</b> Sent you request to be your client', '2022-04-14 14:30:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `id` int(10) NOT NULL,
  `pos` int(10) NOT NULL,
  `lang_id` int(10) NOT NULL COMMENT '1=>english,2=>spanish,3=>vietnamese',
  `question` text NOT NULL,
  `question_type` int(10) NOT NULL,
  `question_category` int(10) NOT NULL COMMENT '1=>Financial Situation,2=>Investment Objective,3=>Knowledge &amp; Experience,4=>Understanding Fiancial commetements',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `question_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`id`, `pos`, `lang_id`, `question`, `question_type`, `question_category`, `created_on`, `updated_on`, `question_code`) VALUES
(32, 1, 1, 'What is the source of your periodic income?', 3, 1, '2019-09-19 17:29:31', '2019-09-19 17:29:31', ''),
(33, 2, 1, 'What is the composition of your total patrimony?', 3, 1, '2019-09-19 17:30:12', '2019-09-19 17:30:12', ''),
(34, 3, 1, 'Do you have any loans?', 4, 1, '2019-09-19 16:55:28', '2019-09-19 16:55:28', ''),
(35, 0, 1, 'The more questions you answer, the better service we can provide. You don´t need to be accurate.', 5, 1, '2019-11-27 16:43:41', '2019-11-27 16:43:41', ''),
(36, 0, 1, 'How long do you want to invest?', 1, 2, '2019-09-19 17:20:51', '2019-09-19 17:20:51', ''),
(37, 0, 1, 'What is the purpose of your investments?', 1, 2, '2019-09-19 17:21:33', '2019-09-19 17:21:33', ''),
(38, 0, 1, 'With which of the following investment products you feel more comfortable?', 1, 3, '2019-11-01 11:29:10', '2019-11-01 11:29:10', ''),
(39, 0, 1, 'What is your financial knowledge?', 1, 3, '2019-09-19 17:06:16', '2019-09-19 17:06:16', ''),
(40, 0, 1, 'How long have you been investing?', 1, 3, '2019-09-19 17:13:18', '2019-09-19 17:13:18', ''),
(41, 0, 1, 'If you think in the word \"risk\", which one of the following comes to your mind?', 1, 4, '2019-09-19 17:10:22', '2019-09-19 17:10:22', ''),
(42, 0, 1, 'If you portfolio is losing 10%, What would you do?', 1, 4, '2019-09-19 17:12:06', '2019-09-19 17:12:06', ''),
(43, 0, 1, 'What profitability do you want?', 1, 2, '2019-09-19 17:27:15', '2019-09-19 17:27:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_options`
--

CREATE TABLE `tbl_question_options` (
  `id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `options` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question_options`
--

INSERT INTO `tbl_question_options` (`id`, `question_id`, `options`, `created_on`, `updated_on`) VALUES
(178, 32, 'Work activity', '2019-09-19 16:45:28', '2019-09-19 17:29:31'),
(179, 32, 'Capital income, financial investments and stocks', '2019-09-19 16:45:28', '2019-09-19 17:29:31'),
(180, 32, 'Business activity', '2019-09-19 16:45:28', '2019-09-19 17:29:31'),
(181, 32, 'Others', '2019-09-19 16:45:28', '2019-09-19 17:29:31'),
(182, 33, 'Financial assets', '2019-09-19 16:48:24', '2019-09-19 17:30:12'),
(183, 33, 'Retirement plans', '2019-09-19 16:48:24', '2019-09-19 17:30:12'),
(184, 33, 'Real estate assets', '2019-09-19 16:48:24', '2019-09-19 17:30:12'),
(185, 33, 'Others ', '2019-09-19 16:48:24', '2019-09-19 17:30:12'),
(186, 34, 'Porcentaje of total asset', '2019-09-19 16:55:28', '2019-09-19 16:55:28'),
(187, 35, 'How much is your monthly income?', '2019-09-19 16:59:11', '2019-11-27 16:43:41'),
(188, 35, 'How much are your monthly expenses?', '2019-09-19 16:59:11', '2019-11-27 16:43:41'),
(189, 36, 'Less than 1 year', '2019-09-19 17:01:12', '2019-09-19 17:20:51'),
(190, 36, 'Between 1 and 2 years', '2019-09-19 17:01:12', '2019-09-19 17:20:51'),
(191, 36, 'Between 2 and 5 years', '2019-09-19 17:01:12', '2019-09-19 17:20:51'),
(192, 36, 'More than 5 years', '2019-09-19 17:01:12', '2019-09-19 17:20:51'),
(193, 37, 'Keep of purchasing power', '2019-09-19 17:03:32', '2019-09-19 17:21:33'),
(194, 37, 'Moderate growth and I admit some risk', '2019-09-19 17:03:32', '2019-09-19 17:21:33'),
(195, 37, 'Growth with some risk', '2019-09-19 17:03:32', '2019-09-19 17:21:33'),
(196, 37, 'Growth with high fluctuations', '2019-09-19 17:03:32', '2019-09-19 17:21:33'),
(197, 37, 'Trading with very high fluctuatioins', '2019-09-19 17:03:32', '2019-09-19 17:21:33'),
(198, 38, 'Bank deposits', '2019-09-19 17:05:36', '2019-11-01 11:29:10'),
(199, 38, 'Fix income', '2019-09-19 17:05:36', '2019-11-01 11:29:10'),
(200, 38, 'Stocks, funds', '2019-09-19 17:05:36', '2019-11-01 11:29:10'),
(201, 38, 'Complex products (Like financial options)', '2019-09-19 17:05:36', '2019-11-01 11:29:10'),
(202, 38, 'I prefer to be adviced', '2019-09-19 17:05:36', '2019-11-01 11:29:10'),
(203, 39, 'Basic', '2019-09-19 17:06:16', '2019-09-19 17:06:16'),
(204, 39, 'Medium', '2019-09-19 17:06:16', '2019-09-19 17:06:16'),
(205, 39, 'Advanced', '2019-09-19 17:06:16', '2019-09-19 17:06:16'),
(206, 40, 'Less than 1 year', '2019-09-19 17:07:15', '2019-09-19 17:13:18'),
(207, 40, 'Between 1 and 5 years', '2019-09-19 17:07:15', '2019-09-19 17:13:18'),
(208, 40, 'More than 5 years', '2019-09-19 17:07:15', '2019-09-19 17:13:18'),
(209, 41, 'Uncertainty', '2019-09-19 17:10:22', '2019-09-19 17:10:22'),
(210, 41, 'Opportunity', '2019-09-19 17:10:22', '2019-09-19 17:10:22'),
(211, 41, 'Thrill', '2019-09-19 17:10:22', '2019-09-19 17:10:22'),
(212, 41, 'Loss', '2019-09-19 17:10:22', '2019-09-19 17:10:22'),
(213, 42, 'Sell everything', '2019-09-19 17:12:06', '2019-09-19 17:12:06'),
(214, 42, 'Sell some', '2019-09-19 17:12:06', '2019-09-19 17:12:06'),
(215, 42, 'Keep', '2019-09-19 17:12:06', '2019-09-19 17:12:06'),
(216, 42, 'Buy more', '2019-09-19 17:12:06', '2019-09-19 17:12:06'),
(217, 35, 'How much money you intend to invest?', '2019-09-19 17:17:58', '2019-11-27 16:43:41'),
(218, 43, 'Maximum possible', '2019-09-19 17:25:32', '2019-09-19 17:27:15'),
(219, 43, 'Between 5 - 6% per year.', '2019-09-19 17:25:32', '2019-09-19 17:27:15'),
(220, 43, 'Between 3 - 4% per year', '2019-09-19 17:25:32', '2019-09-19 17:27:15'),
(221, 43, ' Between 1 - 2% per year', '2019-09-19 17:25:32', '2019-09-19 17:27:15'),
(222, 43, 'I don´t care about profitability, I don´t want to lose money in any case', '2019-09-19 17:25:32', '2019-09-19 17:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simulation_count_with_user_level`
--

CREATE TABLE `tbl_simulation_count_with_user_level` (
  `id` int(10) NOT NULL,
  `level` int(10) NOT NULL DEFAULT '0',
  `numberOfSimulation` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_simulation_count_with_user_level`
--

INSERT INTO `tbl_simulation_count_with_user_level` (`id`, `level`, `numberOfSimulation`) VALUES
(1, 2, 1000),
(2, 3, 5000),
(3, 4, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock_purchase_information`
--

CREATE TABLE `tbl_stock_purchase_information` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `broker_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock_purchase_information`
--

INSERT INTO `tbl_stock_purchase_information` (`id`, `user_id`, `broker_id`, `stock_id`, `created_on`, `updated_on`) VALUES
(1, 36, 28, 43, '2021-03-05 18:47:33', '2021-03-05 18:47:33'),
(2, 36, 28, 17, '2021-03-06 10:23:37', '2021-03-06 10:23:37'),
(3, 36, 28, 17, '2021-03-06 10:29:53', '2021-03-06 10:29:53'),
(4, 36, 28, 21, '2021-03-06 10:37:17', '2021-03-06 10:37:17'),
(5, 36, 28, 21, '2021-03-06 10:51:24', '2021-03-06 10:51:24'),
(6, 36, 28, 21, '2021-03-06 10:59:38', '2021-03-06 10:59:38'),
(7, 36, 28, 21, '2021-03-06 10:59:44', '2021-03-06 10:59:44'),
(8, 36, 28, 21, '2021-03-06 11:03:02', '2021-03-06 11:03:02'),
(9, 36, 28, 21, '2021-03-06 11:07:24', '2021-03-06 11:07:24'),
(10, 36, 28, 21, '2021-03-06 11:20:42', '2021-03-06 11:20:42'),
(11, 36, 28, 3, '2021-03-06 11:23:29', '2021-03-06 11:23:29'),
(12, 36, 28, 21, '2021-03-12 11:46:31', '2021-03-12 11:46:31'),
(13, 36, 28, 43, '2021-03-12 11:47:09', '2021-03-12 11:47:09'),
(14, 36, 28, 4, '2021-03-12 15:13:56', '2021-03-12 15:13:56'),
(15, 36, 28, 19, '2021-03-12 15:53:19', '2021-03-12 15:53:19'),
(16, 36, 28, 14, '2021-03-12 15:53:33', '2021-03-12 15:53:33'),
(17, 109, 28, 3, '2021-03-24 10:32:18', '2021-03-24 10:32:18'),
(18, 109, 28, 4, '2021-03-24 10:33:05', '2021-03-24 10:33:05'),
(19, 36, 28, 17, '2021-03-24 12:25:40', '2021-03-24 12:25:40'),
(20, 36, 28, 3, '2021-03-24 12:27:13', '2021-03-24 12:27:13'),
(21, 36, 28, 4, '2021-03-24 13:01:30', '2021-03-24 13:01:30'),
(22, 36, 28, 17, '2021-03-24 13:04:06', '2021-03-24 13:04:06'),
(23, 36, 28, 4, '2021-03-24 13:04:55', '2021-03-24 13:04:55'),
(24, 36, 28, 3, '2021-03-24 14:04:36', '2021-03-24 14:04:36'),
(25, 36, 28, 29, '2021-03-24 14:05:24', '2021-03-24 14:05:24'),
(26, 36, 28, 21, '2021-03-24 14:06:25', '2021-03-24 14:06:25'),
(27, 36, 28, 21, '2021-03-24 14:07:45', '2021-03-24 14:07:45'),
(28, 36, 28, 19, '2021-03-24 14:08:06', '2021-03-24 14:08:06'),
(29, 36, 28, 19, '2021-03-24 14:08:31', '2021-03-24 14:08:31'),
(30, 36, 28, 11, '2021-03-24 14:17:27', '2021-03-24 14:17:27'),
(31, 36, 28, 11, '2021-03-24 14:17:45', '2021-03-24 14:17:45'),
(32, 36, 28, 11, '2021-03-24 14:17:47', '2021-03-24 14:17:47'),
(33, 36, 28, 17, '2021-03-24 17:44:29', '2021-03-24 17:44:29'),
(34, 36, 28, 43, '2021-03-24 17:44:54', '2021-03-24 17:44:54'),
(35, 36, 28, 17, '2021-03-25 18:27:12', '2021-03-25 18:27:12'),
(36, 36, 28, 14, '2021-04-06 16:09:08', '2021-04-06 16:09:08'),
(37, 36, 28, 19, '2021-04-06 16:09:31', '2021-04-06 16:09:31'),
(38, 36, 28, 17, '2021-04-06 17:10:40', '2021-04-06 17:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topFiveInvestmentFunds`
--

CREATE TABLE `tbl_topFiveInvestmentFunds` (
  `id` int(10) NOT NULL,
  `fundID` int(10) NOT NULL DEFAULT '0',
  `referenceLink` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_topFiveInvestmentFunds`
--

INSERT INTO `tbl_topFiveInvestmentFunds` (`id`, `fundID`, `referenceLink`, `created_at`, `updated_at`) VALUES
(3, 7, 'https://www.w3schools.com/icons/fontawesome_icons_currency.asp', '2022-02-23 06:48:10', '2022-02-23 06:48:10'),
(4, 3, 'https://www.w3schools.com/icons/fontawesome_icons_currency.asp', '2022-02-23 06:51:28', '2022-02-23 06:51:28'),
(5, 6, 'https://www.w3schools.com/icons/fontawesome_icons_currency.asp', '2022-02-23 06:53:51', '2022-02-23 06:53:51'),
(6, 8, 'https://www.w3schools.com/icons/fontawesome_icons_currency.asp', '2022-02-23 06:53:58', '2022-02-23 06:53:58'),
(7, 12, 'https://fontawesome.com/v4/icon/money', '2022-02-23 07:04:32', '2022-02-23 07:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `user_type` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `password_token` varchar(255) NOT NULL,
  `device_token` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `onlineStatus` int(2) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_type`, `password`, `email`, `dob`, `status`, `password_token`, `device_token`, `ip_address`, `onlineStatus`, `created_on`, `updated_on`) VALUES
(1, 0, '51cceafee3e2329af9522255baaaa5ed', 'pankajmobapps@gmail.com', '08/08/1990', 1, '660gf030F6fxCffF6va0n4HpO', '1234', '::1', 0, '2019-06-11 07:14:40', '2019-06-11 07:14:40'),
(2, 0, '1d6d2c11afb383f4eedc7e3a9e32b6e8', 'rajukirhi@gmail.com', '08/08/1990', 1, 'POUfbId9RVflIPns6if6sKcI0', '', '::1', 0, '2019-06-14 07:03:04', '2019-06-14 07:03:04'),
(3, 0, '1e6bda6d4ae116ec8cba636ee9bf255e', 'halahoudali2@hotmail.com', '08/08/1990', 1, '2NkM5BU4r0f6NsyIX4stFt6ds', '', '::1', 0, '2019-06-20 09:15:27', '2019-06-20 09:15:27'),
(6, 0, '51cceafee3e2329af9522255baaaa5ed', 'sanjeet@gmail.com', '07/22/1994', 1, 'fApSWs8d4DdUsK4Yy2301YyJO', '', '::1', 0, '2019-06-20 14:31:02', '2019-06-20 14:31:02'),
(9, 0, 'e10adc3949ba59abbe56e057f20f883e', 'Pk@gmail.com', '01/01/1990', 1, 'UO0dgZKs0610lESQ0Xsb0E000', '1234', '182.69.89.4', 0, '2019-06-28 06:56:16', '2019-06-28 06:56:16'),
(10, 0, 'fbc9c27b16720c685dbea4963ed35f4d', 'Parm@gmail.com', '08/27/2002', 1, '4sm6J65sFaE5gfdfK1f54dzfK', '', '182.69.89.4', 0, '2019-06-28 10:02:21', '2019-06-28 10:02:21'),
(11, 0, 'fbc9c27b16720c685dbea4963ed35f4d', 'Jai@gmail.com', '09/27/2007', 1, 'fIp5fQ41dR0Gs1sdIW71a4vqn', '', '182.69.89.4', 0, '2019-06-28 10:08:57', '2019-06-28 10:08:57'),
(13, 0, 'c4ca4238a0b923820dcc509a6f75849b', 'aasdasd@gmail.com', '01/25/1992', 1, 'cdQWlrRffYio0XWB9DvdKdEsZ', '', '103.47.13.38', 0, '2019-07-03 12:00:07', '2019-07-03 12:00:07'),
(14, 0, 'c4ca4238a0b923820dcc509a6f75849b', 'aasdasdfdfd@gmail.com', '01/25/1992', 1, 'f4irsQmq52sK2ICdsf6045g0O', '', '103.47.13.38', 0, '2019-07-03 12:00:35', '2019-07-03 12:00:35'),
(15, 0, 'c4ca4238a0b923820dcc509a6f75849b', 'aasdasdfdgfd@gmail.com', '01/25/1992', 1, 'vf10dsfZfD4zCe6Oe0Grs6fm5', '', '103.47.13.38', 0, '2019-07-03 12:01:10', '2019-07-03 12:01:10'),
(16, 0, 'c4ca4238a0b923820dcc509a6f75849b', 'aasdasdfdggggfd@gmail.com', '01/25/1992', 1, 'Kc5Ub44ljGfkd0dp7sdw4jeJv', '', '103.47.13.38', 0, '2019-07-03 12:02:02', '2019-07-03 12:02:02'),
(17, 0, 'fbc9c27b16720c685dbea4963ed35f4d', 'Avtar@gmail.com', '08/27/1998', 1, 'ksYbeUsD00RXs59l01o46dK4L', '', '122.176.14.85', 0, '2019-07-03 13:14:25', '2019-07-03 13:14:25'),
(18, 0, '51cceafee3e2329af9522255baaaa5ed', 'gobind9211@gmail.com', '02/02/1990', 1, 'd40551dhlY4sdfsd0WQ02b54P', '1234', '103.47.13.38', 0, '2019-07-04 09:11:24', '2019-07-04 09:11:24'),
(21, 0, '51cceafee3e2329af9522255baaaa5ed', 'mobappssolutions128@gmail.com', '02/13/1990', 1, 'HT0dsfv5df5fiL8bhSssvxzcD', '', '103.47.13.38', 0, '2019-07-20 16:41:25', '2019-07-20 16:41:25'),
(23, 0, 'fbc9c27b16720c685dbea4963ed35f4d', 'Avtarpal@gmail.com', '08/06/1990', 1, 'dykl6T324Pffh2dQdnxdUd5ZS', '1234', '182.69.180.42', 0, '2019-07-22 10:28:41', '2019-07-22 10:28:41'),
(25, 1, '51cceafee3e2329af9522255baaaa5ed', 'advisor@gmail.com', '01/01/1980', 1, 'hfr86de0047Etgfs670SN4GbV', '1234', '103.47.13.38', 1, '2019-07-22 18:23:05', '2019-07-22 18:23:05'),
(27, 1, '51cceafee3e2329af9522255baaaa5ed', 'advisor9211@gmail.com', '01/25/1980', 1, '2W65X6i6d3mdj1R402Yf60fg8', '1234', '103.47.13.38', 1, '2019-07-24 10:48:29', '2019-07-24 10:48:29'),
(28, 1, 'decd710b61c31aaae6c81747fbea0f88', 'Pkram@gmail.com', '06/28/1998', 1, 'xN0bf6fssn3qRxRp0j0kgff04', '1234', '45.248.24.56', 0, '2019-07-25 12:38:33', '2019-07-25 12:38:33'),
(31, 2, '', 'ibroker@gmail.com', '06/10/1980', 1, '', '', '', 0, '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(32, 2, '', 'interactivebroker@gmail.com', '06/21/1988', 1, '', '', '', 0, '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(34, 0, '9137958e225bba003a8f0cf582d06524', 'narendraomshiv1234@gmail.com', '07/01/1990', 1, 'f6s014d6TD5jfz3Z6d5sx08fm', '', '182.77.123.138', 0, '2019-09-16 20:52:01', '2019-09-16 20:52:01'),
(35, 0, '51cceafee3e2329af9522255baaaa5ed', 'rajanyadav@gmail.com', '01/10/1990', 1, 'BWi25dA0zfsf1663s5s4dggt1', '', '103.47.13.38', 0, '2019-09-20 18:00:44', '2019-09-20 18:00:44'),
(36, 0, '51cceafee3e2329af9522255baaaa5ed', 'nuchuteli@gmail.com', '01/25/1992', 1, 'Kn6WVHEQGuF6dQXfsOufx4dSD', '1234', '103.47.13.38', 1, '2019-09-23 13:01:07', '2019-09-23 13:01:07'),
(40, 0, '5a918f490aac0171add61292d5bec429', 'rafahuong@gmail.com', '04/20/1989', 1, 'wpZf6y4oK4542OQNG4OEQ4tf0', '1234', '182.229.228.148', 0, '2019-09-28 13:46:30', '2019-09-28 13:46:30'),
(45, 0, '51cceafee3e2329af9522255baaaa5ed', 'amitabhsuman@gmail.com', '01/10/1990', 1, 'ddt33TdKsmRsJ5f9MfdLi00q0', '', '103.47.13.38', 0, '2019-10-21 18:18:22', '2019-10-21 18:18:22'),
(46, 0, '51cceafee3e2329af9522255baaaa5ed', 'avdhesh123@gmail.com', '01/01/2000', 1, '6mfff4soIs71FzwOsGFWudfG6', '1234', '182.69.174.27', 0, '2019-10-22 15:10:28', '2019-10-22 15:10:28'),
(49, 0, 'eb4a90ea556ea35cf1a36da0e3981cc0', 'harshitkirhi@gmail.com', '10/09/2000', 1, 'dN5JdAT506Hl2ddsf2L5eedQI', '', '103.47.13.38', 0, '2019-10-24 11:56:33', '2019-10-24 11:56:33'),
(50, 0, '0e7517141fb53f21ee439b355b5a1d0a', 'bulbulkirhi@gmail.com', '10/16/2000', 1, 'fO0O6i12G0lR5st9s15TA0v3d', '1234', '103.47.13.38', 0, '2019-10-24 14:49:26', '2019-10-24 14:49:26'),
(53, 0, '0e7517141fb53f21ee439b355b5a1d0a', 'vinu@gmail.com', '10/15/1999', 1, '5O153cCr8m9304fzdUdUdN0vV', '', '103.47.13.38', 0, '2019-10-24 18:08:28', '2019-10-24 18:08:28'),
(55, 2, '', 'sandeep@gmail.com', '06/05/1973', 1, '', '', '', 0, '2019-11-13 11:39:34', '2019-11-13 11:39:34'),
(56, 2, '', 'sanjeev@gmail.com', '01/25/1984', 1, '', '', '', 0, '2019-11-13 11:38:37', '2019-11-13 11:38:37'),
(58, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'varun@gmail.com', '10/15/1999', 1, '4n0jU0Eua5CsuHC58zj8fhg15', '', '103.47.13.38', 0, '2019-11-07 12:49:56', '2019-11-07 12:49:56'),
(60, 0, '0e7517141fb53f21ee439b355b5a1d0a', 'visukirhi@gmail.com', '11/16/2010', 1, '50EOs8fmh8s6N5mA0m056t0dH', '', '103.47.13.38', 0, '2019-11-11 16:07:05', '2019-11-11 16:07:05'),
(61, 0, '0e7517141fb53f21ee439b355b5a1d0a', 'sazx@gmail.com', '10/20/1999', 1, '654gdCdfddf4K20z56fRwmjdd', '', '103.47.13.38', 0, '2019-11-27 17:24:35', '2019-11-27 17:24:35'),
(64, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'tinolee139@gmail.com', '10/10/1999', 1, '46K0Psu3xikfKXddWId9MN46j', '', '103.47.13.38', 0, '2019-11-28 15:01:02', '2019-11-28 15:01:02'),
(69, 1, '51cceafee3e2329af9522255baaaa5ed', 'mohankumar@gmail.com', '12/28/1990', 1, 'P0kv5061ksm6EN4sdM3ldtsfO', '1234', '103.47.13.38', 0, '2019-12-16 10:18:29', '2019-12-16 10:18:29'),
(73, 1, '51cceafee3e2329af9522255baaaa5ed', 'dilipghosh@gmail.com', '01/03/1990', 1, 'V69d9Hv00Uv0tcqiK2ssz3zsV', '', '103.47.13.38', 0, '2020-01-27 10:27:45', '2020-01-27 10:27:45'),
(76, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'bulbulharshit@gmail.com', '01/27/2020', 1, '0XddKiJB3T46Vf49f8In7hSs6', '', '103.47.13.38', 0, '2020-01-28 10:28:11', '2020-01-28 10:28:11'),
(78, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'ansukirhi@gmail.com', '01/27/2020', 1, 'd60slaC5v7s0dRbMdb4PFsP9H', '1234', '103.47.13.38', 0, '2020-01-28 11:09:10', '2020-01-28 11:09:10'),
(79, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'mobappssolutions133@gmail.com', '01/13/2020', 1, 'z5d090sqshsdg61O0dTfwTyYO', '', '103.47.13.38', 0, '2020-01-28 11:31:59', '2020-01-28 11:31:59'),
(80, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'qwert@gmail.com', '01/20/2020', 1, '3fshCiD4kD0i6504gQ4s69FFF', '', '103.47.13.38', 0, '2020-01-28 12:30:55', '2020-01-28 12:30:55'),
(81, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'qazxc@gmail.com', '01/27/2020', 1, '0h6sss0Cd3d0omSY0476mStjn', '', '103.47.13.38', 0, '2020-01-28 12:35:29', '2020-01-28 12:35:29'),
(82, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'aswe@gmail.com', '01/27/2020', 1, 'j46js3y60voHsf0daa64dAvf5', '', '103.47.13.38', 0, '2020-01-28 12:43:34', '2020-01-28 12:43:34'),
(83, 1, '64f9e46e8d12751fd8061dd1388e6c5c', 'rbarretojob1@gmail.com', '04/22/1975', 1, 'KKQa5cFBAMydCTdsA4rx1fCc6', '', '115.74.39.138', 0, '2020-01-29 07:59:09', '2020-01-29 07:59:09'),
(84, 0, '64f9e46e8d12751fd8061dd1388e6c5c', 'rbarretojob2@gmail.com', '04/22/1975', 1, 'IJgfamVd39udt086s6G6q5i4L', '1234', '115.74.39.138', 0, '2020-01-29 08:05:24', '2020-01-29 08:05:24'),
(85, 0, '0e7517141fb53f21ee439b355b5a1d0a', 'rajesh@gmail.com', '01/28/2020', 1, '3se42IZfffdK8ga9fejdDJv5o', '', '103.47.13.38', 0, '2020-01-29 11:11:23', '2020-01-29 11:11:23'),
(86, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'aswx@gmail.com', '01/12/2020', 1, '7C04PJ9Hfis11m0390e1j6X45', '', '103.47.13.38', 0, '2020-01-29 11:26:12', '2020-01-29 11:26:12'),
(87, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'rahul@gmail.com', '01/06/2020', 1, 'P5kL52Rod4csyQY4UFnCCERdi', '', '103.47.13.38', 0, '2020-01-29 12:21:43', '2020-01-29 12:21:43'),
(88, 0, '65529f13888e49f61e8a274601f97f0f', 'huongtran0420@gmail.com', '04/20/1989', 1, 's0k62rf7sosSJ71tGw6065ds6', '', '115.74.39.138', 0, '2020-01-30 12:12:18', '2020-01-30 12:12:18'),
(89, 0, '51cceafee3e2329af9522255baaaa5ed', 'avdheshkumar@gmail.com', '04/05/1988', 1, 'ZR60bdq600AzIGZOF5sd5f46X', '', '103.226.225.94', 0, '2020-04-15 11:28:25', '2020-04-15 11:28:25'),
(90, 0, '51cceafee3e2329af9522255baaaa5ed', 'palakkumar@gmail.com', '01/25/1980', 1, 'FB9FWI3f4I01GfUF405daw3Af', '', '103.226.225.94', 0, '2020-04-15 11:44:48', '2020-04-15 11:44:48'),
(91, 1, '51cceafee3e2329af9522255baaaa5ed', 'rambhakt@gmail.com', '10/19/1988', 1, '304dCnU4sd82sBxn5s5Zs4Mus', '', '103.226.225.94', 0, '2020-04-15 11:48:56', '2020-04-15 11:48:56'),
(92, 0, '51cceafee3e2329af9522255baaaa5ed', 'ritik@gmail.com', '11/11/1992', 1, 'ffs3g34dI44scb5V9s9jjSx03', '', '103.47.13.38', 0, '2020-06-16 11:26:20', '2020-06-16 11:26:20'),
(93, 0, 'f925916e2754e5e03f75dd58a5733251', 'mobappssolutions138@gmail.com', '04/03/1991', 1, 'wt0dqp3d7a0dg0dDEvdeMXvG1', '1234', '182.69.184.68', 0, '2020-06-26 18:27:08', '2020-06-26 18:27:08'),
(94, 0, 'f925916e2754e5e03f75dd58a5733251', 'Mk@gmail.com', '01/31/1990', 1, 'SunfdMgBVtx5s83p101Dz46fC', '1234', '182.69.123.100', 0, '2020-06-29 12:46:21', '2020-06-29 12:46:21'),
(95, 0, 'f925916e2754e5e03f75dd58a5733251', 'Plan2@gmail.com', '01/01/1989', 1, '4rdEufKx16rwe60h2sb0Z4rCX', '1234', '182.69.123.100', 0, '2020-06-29 13:01:21', '2020-06-29 13:01:21'),
(96, 1, 'f925916e2754e5e03f75dd58a5733251', 'T@gmail.com', '06/27/1997', 1, 'l4IDnX4153S67kmg060fuh4az', '1234', '182.69.123.100', 0, '2020-06-29 17:36:40', '2020-06-29 17:36:40'),
(97, 0, '24780214eac5297e08da75a44c5f0480', 'rp790533@gmail.com', '01/01/1989', 1, '43lsAFUakBKbL064sJkQh5Ud6', '1234', '122.180.17.209', 0, '2020-08-07 12:06:15', '2020-08-07 12:06:15'),
(98, 1, '24780214eac5297e08da75a44c5f0480', 'Rp790533pg@gmail.com', '06/27/2001', 1, '5Trsd4a3td0Ym10dBsP3u6om0', '1234', '122.180.17.209', 0, '2020-08-07 12:29:30', '2020-08-07 12:29:30'),
(99, 0, '5c428d8875d2948607f3e3fe134d71b4', 'Mobappssolutions132@gmail.com', '01/02/1990', 1, 'sp5sgo44iTCdZt066dt01MCsd', '1234', '122.162.249.14', 0, '2020-12-02 15:13:48', '2020-12-02 15:13:48'),
(100, 0, '5c428d8875d2948607f3e3fe134d71b4', 'Mobapps@gmail.com', '01/02/1990', 1, 'NfuDyssGnWfjrBg0200K25dr4', '1234', '122.176.177.132', 0, '2020-12-03 10:17:16', '2020-12-03 10:17:16'),
(101, 0, '5c428d8875d2948607f3e3fe134d71b4', 'Abc@gmail.com', '01/01/1992', 1, '2tr6506KNrK6odnsYZ500Nqr5', '', '122.176.177.132', 0, '2020-12-03 10:20:05', '2020-12-03 10:20:05'),
(102, 0, 'f925916e2754e5e03f75dd58a5733251', 'Opl@gmail.com', '01/01/1992', 1, 'YEd50bs50fVdfu934540tPPd0', '1234', '122.176.177.132', 0, '2020-12-03 10:25:01', '2020-12-03 10:25:01'),
(103, 1, 'fbc9c27b16720c685dbea4963ed35f4d', 'Mobapps135@gmail.com', '06/27/1999', 1, 'dfsd1ZwZ6fsSdH0ExsYo1efe2', '1234', '182.69.86.224', 0, '2020-12-15 11:45:38', '2020-12-15 11:45:38'),
(104, 0, '0c48b399fdd31a7c667343422a844367', 'hh@gmail.com', '02/15/1998', 1, '6sVC58d4KA6dfJqddB1t8Io0s', '1234', '122.162.104.195', 0, '2021-01-22 11:26:11', '2021-01-22 11:26:11'),
(105, 0, '51cceafee3e2329af9522255baaaa5ed', 'amarjeet8520@gmail.com', '04/23/1992', 1, '4f6SErHgK6ysTdfk64ffdbudK', '', '43.230.197.227', 0, '2021-02-05 11:30:17', '2021-02-05 11:30:17'),
(106, 0, '51cceafee3e2329af9522255baaaa5ed', 'raman8520@gmail.com', '02/11/1986', 1, 'smsf55lf3eAY6Jo4L6d253yKu', '', '43.230.197.227', 0, '2021-02-05 11:41:23', '2021-02-05 11:41:23'),
(107, 0, '51cceafee3e2329af9522255baaaa5ed', 'lokesh@gmail.com', '02/08/1990', 1, '3wMs621MSF05Xe60iOmJoslsS', '', '103.83.70.96', 0, '2021-02-14 19:05:39', '2021-02-14 19:05:39'),
(108, 0, '51cceafee3e2329af9522255baaaa5ed', 'palakkumar9211@gmail.com', '01/25/1990', 1, 'm2rdDYvg4sW0ESa6wd05PVsai', '', '103.49.234.38', 1, '2021-03-09 10:34:14', '2021-03-09 10:34:14'),
(109, 0, '64f9e46e8d12751fd8061dd1388e6c5c', 'rafabarretoplasencia@gmail.com', '04/22/1975', 1, 'sdr024OfZ05smij3f5fHedb6z', '1234', '171.250.184.41', 1, '2021-03-09 10:40:51', '2021-03-09 10:40:51'),
(110, 0, '912ec803b2ce49e4a541068d495ab570', 'mobappssolutions131@gmail.com', '04/13/2005', 1, '0f42f9YsdpddjffKdsos4xC0l', '', '1.38.184.135', 0, '2021-04-22 19:03:23', '2021-04-22 19:03:23'),
(111, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'bulbulkirhi1@gmail.com', '04/13/1998', 1, '56E04410OGE4UKQmPQ1njd4p1', '', '1.38.52.157', 0, '2021-04-23 18:41:35', '2021-04-23 18:41:35'),
(112, 0, '0e7517141fb53f21ee439b355b5a1d0a', 'asewqsa@gmail.com', '10/05/2010', 1, '4d4adfl3WQl152MsmvKsIsj1w', '', '1.38.52.157', 0, '2021-04-23 18:47:06', '2021-04-23 18:47:06'),
(113, 1, '0e7517141fb53f21ee439b355b5a1d0a', 'anjanasinha292@gmail.com', '04/09/2003', 1, 'dVsf0Gifdl0gdghsnCt0ayE6i', '', '42.111.30.81', 0, '2021-04-27 16:38:25', '2021-04-27 16:38:25'),
(114, 2, '', 'bulbulkirhi@gmail.com', '05/17/2011', 1, '', '', '', 0, '2021-05-06 17:33:15', '2021-05-06 17:33:15'),
(115, 0, '51cceafee3e2329af9522255baaaa5ed', 'maymonth@gmail.com', '05/08/1990', 1, 'Ix55Jf05dfKb3fg6yfk6PvC40', '', '103.83.70.35', 0, '2021-05-07 17:06:52', '2021-05-07 17:06:52'),
(116, 0, '51cceafee3e2329af9522255baaaa5ed', 'santoshkumar@gmail.com', '07/03/1990', 1, 'g6DDT7h56sdxsud3h0kX4lfoW', '', '223.233.65.84', 0, '2021-07-19 12:52:27', '2021-07-19 12:52:27'),
(117, 0, '51cceafee3e2329af9522255baaaa5ed', 'maheshkumar@gmail.com', '07/13/1988', 1, '2qfb40L4xx0sz0p5Lxf62s0j0', '', '223.233.65.84', 0, '2021-07-19 13:14:02', '2021-07-19 13:14:02'),
(118, 0, 'eb4a90ea556ea35cf1a36da0e3981cc0', 'narendra@appsandwebsolutions.com', '04/10/1990', 1, 'ddrfhWb404nMT0IQtOB9IA6dR', '', '103.158.174.118', 0, '2022-02-07 10:03:51', '2022-02-07 10:03:51'),
(119, 0, '51cceafee3e2329af9522255baaaa5ed', 'palalala@gmail.com', '02/03/2022', 1, '0su80sa5d5qgd0f5f4ml4082N', '', '103.158.174.118', 0, '2022-02-07 14:08:48', '2022-02-07 14:08:48'),
(120, 0, '51cceafee3e2329af9522255baaaa5ed', 'pankajmobapps11@gmail.com', '02/15/1994', 1, 'spd08B3s56mfdj4fQ3H3oZe6s', '', '103.158.174.118', 0, '2022-02-07 14:45:13', '2022-02-07 14:45:13'),
(121, 1, '51cceafee3e2329af9522255baaaa5ed', 'mohandas@gmail.com', '02/12/1986', 1, 'dsQbp000Ddg0CjfAfaV06NFsi', '', '103.158.174.118', 0, '2022-02-22 12:33:03', '2022-02-22 12:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_brokers_management`
--

CREATE TABLE `tbl_users_brokers_management` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `broker_id` int(10) NOT NULL,
  `terms` int(10) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_brokers_management`
--

INSERT INTO `tbl_users_brokers_management` (`id`, `user_id`, `broker_id`, `terms`, `created_on`, `updated_on`) VALUES
(3, 18, 31, 1, '2019-09-07 11:50:57', '2019-09-07 11:50:57'),
(4, 30, 31, 1, '2019-09-08 14:58:53', '2019-09-08 14:58:53'),
(5, 9, 31, 1, '2019-09-16 16:58:45', '2019-09-16 16:58:45'),
(6, 33, 31, 1, '2019-09-16 20:57:00', '2019-09-16 20:57:00'),
(7, 30, 32, 1, '2019-09-16 21:21:27', '2019-09-16 21:21:27'),
(9, 40, 31, 1, '2019-09-28 13:50:21', '2019-09-28 13:50:21'),
(10, 9, 32, 1, '2019-10-16 15:29:53', '2019-10-16 15:29:53'),
(11, 50, 32, 1, '2019-10-30 11:08:53', '2019-10-30 11:08:53'),
(12, 18, 32, 1, '2019-11-02 14:14:54', '2019-11-02 14:14:54'),
(13, 50, 31, 1, '2019-11-04 14:29:42', '2019-11-04 14:29:42'),
(14, 36, 31, 1, '2019-11-14 12:06:50', '2019-11-14 12:06:50'),
(15, 46, 31, 1, '2020-01-24 10:25:24', '2020-01-24 10:25:24'),
(16, 36, 32, 1, '2020-06-15 14:28:14', '2020-06-15 14:28:14'),
(17, 97, 31, 1, '2020-08-07 12:24:49', '2020-08-07 12:24:49'),
(18, 93, 31, 1, '2020-11-30 16:35:08', '2020-11-30 16:35:08'),
(19, 99, 31, 1, '2020-12-02 16:00:12', '2020-12-02 16:00:12'),
(20, 99, 32, 1, '2020-12-02 16:42:10', '2020-12-02 16:42:10'),
(21, 102, 31, 1, '2020-12-03 11:44:50', '2020-12-03 11:44:50'),
(22, 102, 32, 1, '2020-12-03 12:41:03', '2020-12-03 12:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_experience`
--

CREATE TABLE `tbl_users_experience` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `startMonth` varchar(100) NOT NULL,
  `startYear` varchar(100) NOT NULL,
  `endMonth` varchar(100) NOT NULL,
  `endYear` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_experience`
--

INSERT INTO `tbl_users_experience` (`id`, `user_id`, `companyName`, `startMonth`, `startYear`, `endMonth`, `endYear`, `created_on`) VALUES
(1, 25, 'Leadingdots Pvt Ltd.', 'November', '2016', 'June', '2017', '2022-07-30 11:17:40'),
(4, 28, 'Mobapp', 'February', '2017', 'April', '2019', '2021-03-15 18:58:31'),
(21, 52, 'Mobapps', 'December', '2019', 'December', '2019', '2019-10-29 12:43:52'),
(23, 69, 'Chetu Solutions Pvt Ltd', 'January', '2017', 'October', '2019', '2019-12-16 10:26:04'),
(24, 27, 'Alpha college of Engg. Bnagalore', 'August', '2015', 'July', '2019', '2022-02-04 18:03:24'),
(25, 74, 'TimeBuyers LTD', 'January', '2017', 'January', '2020', '2020-01-27 10:51:24'),
(26, 78, 'Mobapps Solutions', 'March', '1902', 'May', '2020', '2020-06-06 14:12:41'),
(27, 79, 'Coffee Cafe Day', 'May', '2017', 'May', '2020', '2020-01-28 11:43:14'),
(28, 86, 'Hcl', 'January', '2016', 'August', '2020', '2020-01-29 11:38:23'),
(29, 28, 'WebNmobapps solutions', 'March', '2019', 'March', '2021', '2021-03-15 18:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_extra_settings`
--

CREATE TABLE `tbl_users_extra_settings` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `StockPickingBasedOn` int(5) NOT NULL COMMENT '1=>Beta,2=>Volatility',
  `created_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_extra_settings`
--

INSERT INTO `tbl_users_extra_settings` (`id`, `user_id`, `StockPickingBasedOn`, `created_on`) VALUES
(1, 25, 1, '2020-02-01 15:40:26'),
(2, 28, 2, '2020-05-11 15:11:40'),
(3, 78, 0, '2020-06-05 18:00:29'),
(4, 27, 1, '2022-02-04 16:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_trading_diary`
--

CREATE TABLE `tbl_users_trading_diary` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_in` varchar(255) DEFAULT NULL,
  `product` int(10) NOT NULL DEFAULT '0',
  `order_type` varchar(50) DEFAULT NULL,
  `price_in` float NOT NULL DEFAULT '0',
  `date_out` varchar(255) DEFAULT NULL,
  `price_out` float NOT NULL DEFAULT '0',
  `broker` int(10) NOT NULL DEFAULT '0',
  `pl` varchar(255) NOT NULL DEFAULT '0',
  `volume` int(10) NOT NULL DEFAULT '0',
  `final_volume` int(10) NOT NULL DEFAULT '0',
  `remainingVolume` float NOT NULL DEFAULT '0',
  `comment` text,
  `startegy` int(10) NOT NULL DEFAULT '0',
  `portfolio_id` int(10) NOT NULL DEFAULT '0',
  `reference_id` int(10) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_trading_diary`
--

INSERT INTO `tbl_users_trading_diary` (`id`, `user_id`, `date_in`, `product`, `order_type`, `price_in`, `date_out`, `price_out`, `broker`, `pl`, `volume`, `final_volume`, `remainingVolume`, `comment`, `startegy`, `portfolio_id`, `reference_id`, `created_on`, `updated_on`) VALUES
(8, 36, '05/08/2021', 43, 'Market', 5, '05/20/2021', 6, 31, '1', 50, 25, 0, 'testing', 7, 109, 0, '2021-05-29 13:42:03', '2021-05-29 13:42:30'),
(9, 36, '05/08/2021', 43, 'Market', 5, '05/21/2021', 4, 31, '0', 25, 20, 0, 'testing', 7, 109, 8, '2021-05-29 13:42:30', '2021-05-29 13:43:13'),
(10, 36, '05/08/2021', 43, 'Market', 5, '05/21/2021', 0, 31, '0', 5, 0, 5, 'testing', 7, 109, 9, '2021-05-29 13:43:13', '2021-05-29 13:43:13'),
(11, 36, '05/06/2021', 3, 'Market', 6, '05/20/2021', 7, 31, '1', 60, 40, 0, 'testing dev', 7, 74, 0, '2021-05-29 14:17:37', '2021-05-29 14:18:34'),
(12, 36, '05/06/2021', 3, 'Market', 6, '05/20/2021', 0, 31, '1', 20, 0, 20, 'testing dev', 7, 74, 11, '2021-05-29 14:18:34', '2021-05-29 14:18:34'),
(13, 36, '05/10/2021', 11, 'Limited', 5, '05/21/2021', 4, 31, '0', 50, 20, 0, 'hiii', 3, 110, 0, '2021-05-29 14:27:43', '2021-05-29 14:28:06'),
(14, 36, '05/10/2021', 11, 'Limited', 5, '05/21/2021', 8, 31, '1', 30, 20, 0, 'hiii', 3, 110, 13, '2021-05-29 14:28:06', '2021-05-29 14:29:11'),
(15, 36, '05/10/2021', 11, 'Limited', 5, '05/21/2021', 0, 31, '1', 10, 0, 10, 'hiii', 3, 110, 14, '2021-05-29 14:29:11', '2021-05-29 14:29:11'),
(16, 36, '05/06/2021', 10, 'Limited', 5, '05/21/2021', 3, 31, '0', 20, 10, 0, 'testing', 4, 113, 0, '2021-05-29 15:58:44', '2021-05-29 15:59:14'),
(17, 36, '05/06/2021', 10, 'Limited', 5, '05/21/2021', 0, 31, '0', 10, 0, 10, 'testing', 4, 113, 16, '2021-05-29 15:59:14', '2021-05-29 15:59:14'),
(18, 36, '06/10/2021', 43, 'Market', 1.2, '06/10/2021', 2, 32, '1', 100, 20, 0, 'test', 7, 109, 0, '2021-06-16 10:26:08', '2021-06-16 10:26:33'),
(19, 36, '06/10/2021', 43, 'Market', 1.2, '06/10/2021', 3, 32, '1', 80, 20, 0, 'test', 4, 109, 18, '2021-06-16 10:26:33', '2021-06-16 10:27:57'),
(20, 36, '06/10/2021', 43, 'Market', 1.2, '06/10/2021', 1, 32, '0', 60, 30, 0, 'test', 4, 109, 19, '2021-06-16 10:27:57', '2021-06-17 09:55:43'),
(21, 36, '06/10/2021', 43, 'Market', 1.2, '06/10/2021', 3, 32, '1', 30, 20, 0, 'testing on 22 june 2021', 4, 109, 20, '2021-06-17 09:55:43', '2021-06-22 10:10:04'),
(22, 36, '06/10/2021', 43, 'Market', 1.2, '06/10/2021', 0, 32, '1', 10, 0, 10, 'testing on 22 june 2021', 4, 109, 21, '2021-06-22 10:10:04', '2021-06-22 10:10:04'),
(23, 36, '06/02/2021', 3, 'Market', 10, '06/09/2021', 30, 32, '1', 500, 200, 0, 'test byy dev', 4, 74, 0, '2021-06-22 16:33:37', '2021-06-21 16:33:59'),
(24, 36, '06/02/2021', 3, 'Market', 10, '06/09/2021', 2, 32, '0', 300, 100, 0, 'test byy dev', 4, 74, 23, '2021-06-22 16:33:59', '2021-06-22 16:36:09'),
(25, 36, '06/02/2021', 3, 'Market', 10, '02/04/2022', 5, 32, '0', 200, 100, 0, 'test byy dev', 4, 74, 24, '2021-06-22 16:36:09', '2022-02-04 11:25:19'),
(26, 108, '06/02/2021', 3, 'Limited', 2, '06/10/2021', 1, 0, '0', 100, 10, 0, 'test', 7, 114, 0, '2021-06-22 18:13:19', '2021-06-18 18:13:53'),
(27, 108, '06/02/2021', 3, 'Limited', 2, '06/10/2021', 3, 0, '1', 90, 10, 0, 'test', 7, 114, 26, '2021-06-22 18:13:53', '2021-06-19 18:16:30'),
(28, 108, '06/02/2021', 3, 'Limited', 2, '06/10/2021', 4, 0, '1', 80, 10, 0, 'test', 7, 114, 27, '2021-06-22 18:16:30', '2021-06-20 18:19:44'),
(29, 108, '06/02/2021', 3, 'Limited', 2, '06/10/2021', 1, 0, '0', 70, 10, 0, 'test', 7, 114, 28, '2021-06-22 18:19:44', '2021-06-21 18:28:18'),
(30, 108, '06/02/2021', 3, 'Limited', 2, '06/10/2021', 1, 0, '0', 60, 10, 0, 'test', 7, 114, 29, '2021-06-22 18:28:18', '2021-06-22 18:29:25'),
(31, 108, '06/02/2021', 3, 'Limited', 2, '06/10/2021', 0, 0, '0', 50, 0, 50, 'test', 7, 114, 30, '2021-06-22 18:29:25', '2021-06-22 18:29:25'),
(32, 36, '08/01/2021', 43, 'Market', 1.5, '08/15/2021', 2, 31, '1', 50, 20, 0, 'testing by developer', 7, 109, 0, '2021-08-17 10:00:07', '2021-08-17 10:01:20'),
(33, 36, '08/01/2021', 43, 'Market', 1.5, '08/15/2021', 0, 31, '1', 30, 0, 30, 'testing by developer', 7, 109, 32, '2021-08-17 10:01:20', '2021-08-17 10:01:20'),
(34, 36, '06/02/2021', 3, 'Market', 10, '02/04/2022', 0, 32, '0', 100, 0, 100, 'test byy dev', 4, 74, 25, '2022-02-04 11:25:19', '2022-02-04 11:25:19'),
(35, 36, '02/01/2022', 43, 'Market', 12, '02/03/2022', 13, 31, '1', 22, 10, 0, 'test', 7, 109, 0, '2022-02-04 16:44:41', '2022-02-04 16:45:09'),
(36, 36, '02/01/2022', 43, 'Market', 12, '02/03/2022', 0, 31, '1', 12, 0, 12, 'test', 7, 109, 35, '2022-02-04 16:45:09', '2022-02-04 16:45:09'),
(37, 36, '05/04/2022', 68, 'Market', 10, '05/12/2022', 11, 31, '1', 1000, 100, 0, '', 7, 179, 0, '2022-05-13 10:10:20', '2022-05-13 10:10:53'),
(38, 36, '05/04/2022', 68, 'Market', 10, '05/12/2022', 0, 31, '1', 900, 0, 900, '', 7, 179, 37, '2022-05-13 10:10:53', '2022-05-13 10:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_about_me`
--

CREATE TABLE `tbl_user_about_me` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `homeTown` varchar(255) NOT NULL,
  `aboutYourSelf` text NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_about_me`
--

INSERT INTO `tbl_user_about_me` (`id`, `user_id`, `city`, `homeTown`, `aboutYourSelf`, `created_on`) VALUES
(1, 25, '', '', 'hii man how are you\r\n<br>\r\nThis is the second item\'s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the .accordion-body, though the transition does limit overflow.\r\nThis is the second item\'s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the .accordion-body, though the transition does limit overflow.\r\nThis is the second item\'s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the .accordion-body, though the transition does limit overflow.', '2019-08-05 12:14:38'),
(2, 28, '', '', 'The order function sets the orderType and flips orderReverse. With the help of ng-show, an arrow is shown on the header only if the table is sorted by that column. No need for an invisible glyphicon or anything like that.', '2019-08-09 11:33:48'),
(3, 52, '', '', '', '2019-10-29 13:06:28'),
(4, 69, '', '', '', '2019-12-16 10:26:16'),
(5, 27, '', '', 'hello jaiivjj hhhj', '2020-01-13 11:55:34'),
(6, 74, '', '', '', '2020-01-27 10:51:41'),
(7, 78, '', '', '', '2020-01-28 11:20:39'),
(8, 79, '', '', '', '2020-01-28 11:43:17'),
(9, 86, '', '', '', '2020-01-29 11:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_adviser_referral_code_connectivity`
--

CREATE TABLE `tbl_user_adviser_referral_code_connectivity` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `advisor_id` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_adviser_referral_code_connectivity`
--

INSERT INTO `tbl_user_adviser_referral_code_connectivity` (`id`, `user_id`, `advisor_id`, `status`, `created_on`, `updated_on`) VALUES
(22, 36, 58, 0, '2021-03-12 11:57:38', '2021-03-12 11:57:38'),
(26, 18, 28, 1, '2021-03-15 18:43:43', '2021-03-15 18:43:43'),
(32, 36, 103, 0, '2021-03-19 17:32:56', '2021-03-19 17:32:56'),
(41, 36, 76, 0, '2021-03-19 18:16:47', '2021-03-19 18:16:47'),
(43, 36, 64, 0, '2021-03-19 18:33:44', '2021-03-19 18:33:44'),
(54, 110, 78, 1, '2021-04-22 19:03:23', '2021-04-22 19:03:23'),
(56, 110, 111, 0, '2021-04-27 16:47:31', '2021-04-27 16:47:31'),
(57, 110, 27, 1, '2021-04-27 17:02:33', '2021-04-27 17:02:33'),
(60, 110, 25, 1, '2021-04-27 17:20:44', '2021-04-27 17:20:44'),
(66, 108, 27, 1, '2021-04-28 18:34:09', '2021-04-28 18:34:09'),
(68, 108, 25, 1, '2021-04-28 18:35:43', '2021-04-28 18:35:43'),
(69, 108, 28, 0, '2021-04-28 18:36:37', '2021-04-28 18:36:37'),
(70, 108, 64, 0, '2021-04-28 18:48:51', '2021-04-28 18:48:51'),
(71, 108, 113, 0, '2021-04-28 18:48:56', '2021-04-28 18:48:56'),
(72, 36, 27, 1, '2021-04-29 17:38:37', '2021-04-29 17:38:37'),
(73, 36, 80, 0, '2021-04-29 17:46:26', '2021-04-29 17:46:26'),
(77, 36, 25, 1, '2021-05-07 16:37:33', '2021-05-07 16:37:33'),
(78, 115, 25, 1, '2021-05-07 17:06:52', '2021-05-07 17:06:52'),
(79, 36, 98, 0, '2021-06-18 15:40:50', '2021-06-18 15:40:50'),
(81, 36, 83, 0, '2022-02-04 12:49:02', '2022-02-04 12:49:02'),
(82, 18, 27, 1, '2022-02-19 13:11:33', '2022-02-19 13:11:33'),
(83, 36, 28, 0, '2022-04-14 14:30:18', '2022-04-14 14:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_advisor_connectivity`
--

CREATE TABLE `tbl_user_advisor_connectivity` (
  `id` int(10) NOT NULL,
  `advisor_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_advisor_learning`
--

CREATE TABLE `tbl_user_advisor_learning` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>user,2=>advisor',
  `questions` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_advisor_learning`
--

INSERT INTO `tbl_user_advisor_learning` (`id`, `type`, `questions`, `answer`, `created_on`, `updated_on`) VALUES
(1, 1, 'Where does it come from ?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections  and  Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section.', '2019-08-30 08:49:33', '2019-08-30 10:51:07'),
(3, 1, 'Why do we use it ?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2019-08-30 10:49:53', '2019-08-30 10:51:23'),
(4, 2, 'Where can I get some ?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2019-08-30 11:08:34', '2019-08-30 11:16:50'),
(6, 1, 'Ano ang Lorem Ipsum?', 'Ang Lorem Ipsum ay ginagamit na modelo ng industriya ng pagpriprint at pagtytypeset. Ang Lorem Ipsum ang naging regular na modelo simula pa noong 1500s, noong may isang di kilalang manlilimbag and kumuha ng galley ng type at ginulo ang pagkaka-ayos nito upang makagawa ng libro ng mga type specimen. Nalagpasan nito hindi lang limang siglo, kundi nalagpasan din nito ang paglaganap ng electronic typesetting at nanatiling parehas. Sumikat ito noong 1960s kasabay ng pag labas ng Letraset sheets na mayroong mga talata ng Lorem Ipsum, at kamakailan lang sa mga desktop publishing software tulad ng Aldus Pagemaker ginamit ang mga bersyon ng Lorem Ipsum.', '2019-08-30 13:27:36', '2019-08-30 14:06:46'),
(7, 1, 'Saan ako makakakuha?', 'Maraming klase ng mga talata ng Lorem Ipsum and pwedeng magamit, pero ang karamihan ay nabago, dahil sa mga katatawanan, o ang mga ginulong mga salitang mahirap paniwalaan. Kung ikaw ay gagamit ng talata galing Lorem Ipsum, kailangan mong siguraduhin na walang nakakahiyang nakasulat sa gitna nito. Lahat ng mga gumagawa ng Lorem Ipsum sa Internet ay may ugali na ulitin and mga tipak hanggang sa kinakailangan, dahilan upang ito ang maging pinaka unang totoong tagagawa sa Internet, Gumagamit ito ng diksiyunaryo na may humigit 200 na salitang Latin, sinamahan ng isang dakot ng mga modelong pangungusap na straktura, upang makagawa ng Lorem Ipsum na mukang makatwiran.', '2019-08-30 13:38:32', '2019-08-30 14:07:16'),
(8, 2, '1914 translation by H. Rackham', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', '2019-08-30 13:59:42', '2019-08-30 13:59:42'),
(9, 2, '1914 translation by H. Rackham', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', '2019-08-30 14:00:10', '2019-08-30 14:00:10'),
(10, 2, 'The standard Lorem Ipsum passage, used since the 1500s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-08-30 14:01:45', '2019-08-30 14:01:45'),
(11, 2, 'Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '2019-08-30 14:02:54', '2019-08-30 14:02:54'),
(12, 1, 'The standard chunk of Lorem Ipsum used since the 1500s', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2019-08-30 14:05:35', '2019-08-30 14:05:35'),
(13, 1, 'Test', 'testng in lockdown may', '2021-05-06 17:25:13', '2021-05-06 17:25:25'),
(14, 2, 'what?', 'full', '2021-05-06 17:25:38', '2021-05-06 17:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_advisor_schedule_appointment`
--

CREATE TABLE `tbl_user_advisor_schedule_appointment` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `advisor_id` int(10) NOT NULL,
  `schedule_date` date NOT NULL,
  `slot_id` int(10) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_advisor_schedule_appointment`
--

INSERT INTO `tbl_user_advisor_schedule_appointment` (`id`, `user_id`, `advisor_id`, `schedule_date`, `slot_id`, `created_on`) VALUES
(11, 9, 28, '2020-01-23', 27, '2020-01-23 15:57:59'),
(13, 18, 73, '2020-01-28', 24, '2020-01-28 10:19:04'),
(14, 36, 73, '2020-01-28', 20, '2020-01-28 10:23:56'),
(34, 18, 28, '2021-03-16', 37, '2021-03-15 18:48:15'),
(35, 18, 28, '2021-03-19', 37, '2021-03-15 18:53:27'),
(36, 18, 28, '2021-03-25', 36, '2021-03-15 19:00:00'),
(44, 110, 25, '2021-04-27', 10, '2021-04-27 17:22:22'),
(47, 36, 25, '2021-05-11', 43, '2021-05-11 15:02:26'),
(48, 36, 25, '2021-05-12', 44, '2021-05-11 15:15:14'),
(49, 36, 25, '2021-05-13', 23, '2021-05-11 15:15:31'),
(50, 36, 25, '2021-05-15', 45, '2021-05-15 12:48:02'),
(51, 36, 27, '2022-02-01', 17, '2022-01-31 09:53:41'),
(52, 36, 27, '2022-02-06', 3, '2022-02-04 12:56:13'),
(53, 36, 27, '2022-02-04', 20, '2022-02-04 15:58:45'),
(54, 36, 27, '2022-02-18', 4, '2022-02-10 08:44:55'),
(55, 36, 27, '2022-02-23', 18, '2022-02-22 16:19:34'),
(56, 36, 27, '2022-02-22', 16, '2022-02-22 16:19:48'),
(57, 36, 27, '2022-02-22', 20, '2022-02-22 16:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_balance_sheet`
--

CREATE TABLE `tbl_user_balance_sheet` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `type` int(10) NOT NULL COMMENT '1=>income,2=>Expense,3=>Assets,4=>Liabilities',
  `parameters` varchar(255) NOT NULL,
  `value` float NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_balance_sheet`
--

INSERT INTO `tbl_user_balance_sheet` (`id`, `user_id`, `type`, `parameters`, `value`, `created_on`, `updated_on`) VALUES
(1, 19, 1, 'House Rent', 3000, '2019-07-17 08:29:04', '2019-07-17 11:59:04'),
(2, 19, 1, 'Salary', 30000, '2019-07-17 08:29:53', '2019-07-17 11:59:53'),
(3, 19, 1, 'Bank Interest', 10000, '2019-07-17 08:30:14', '2019-07-17 12:00:14'),
(4, 19, 1, 'Extra Income', 10000, '2019-07-17 08:30:35', '2019-07-17 12:00:35'),
(5, 19, 2, 'Extra Expense', 10000, '2019-07-17 08:31:08', '2019-07-17 12:01:08'),
(6, 19, 2, 'Room Rent', 10000, '2019-07-17 08:31:19', '2019-07-17 12:01:19'),
(7, 19, 2, 'Food', 1000, '2019-07-17 08:31:39', '2019-07-17 12:01:39'),
(8, 19, 2, 'Convenience', 1500, '2019-07-17 08:33:04', '2019-07-17 12:03:04'),
(9, 19, 2, 'Electric', 500, '2019-07-17 08:34:16', '2019-07-17 12:04:16'),
(10, 19, 3, 'stock market', 3000, '2019-07-17 08:35:00', '2019-07-17 12:05:00'),
(11, 19, 3, 'Real Estate', 90000, '2019-07-17 08:35:21', '2019-07-17 12:05:21'),
(12, 19, 3, 'Property', 20000, '2019-07-17 08:35:48', '2019-07-17 12:05:48'),
(13, 19, 4, 'Car Loan', 7000, '2019-07-17 08:37:01', '2019-07-17 12:07:01'),
(14, 19, 4, 'Insurance', 3000, '2019-07-17 08:37:47', '2019-07-17 12:07:47'),
(15, 19, 4, 'Credit Card', 2000, '2019-07-17 08:38:09', '2019-07-17 12:08:09'),
(16, 19, 1, 'Water', 3000, '2019-07-20 06:50:02', '2019-07-20 06:50:02'),
(17, 19, 1, 'Jai ram', 2000, '2019-07-20 06:52:03', '2019-07-20 06:52:03'),
(18, 19, 1, 'Ram', 2000, '2019-07-20 06:53:16', '2019-07-20 06:53:16'),
(19, 19, 1, 'Pk', 5000, '2019-07-20 12:33:51', '2019-07-20 07:03:51'),
(20, 19, 2, 'Jai ho', 5600, '2019-07-20 12:54:54', '2019-07-20 07:24:54'),
(21, 19, 4, 'Puja ki deyae', 600, '2019-07-20 12:55:42', '2019-07-20 07:25:42'),
(22, 19, 1, 'Gghhh', 7000, '2019-07-20 12:57:00', '2019-07-20 07:27:00'),
(23, 19, 2, 'Hhhh', 4555, '2019-07-20 12:57:59', '2019-07-20 07:27:59'),
(24, 19, 2, 'Fhjcf', 5677, '2019-07-20 02:38:49', '2019-07-20 09:08:49'),
(28, 9, 2, 'Jai ho', 6000, '2019-07-20 03:37:41', '2019-07-20 10:07:41'),
(32, 21, 1, 'Salary', 50000, '2019-07-20 17:07:12', '2019-07-20 11:37:12'),
(35, 1, 1, 'test', 50000, '2019-07-20 06:32:48', '2019-07-20 13:02:48'),
(42, 1, 1, 'Salary', 50000, '2019-09-02 12:26:38', '2019-09-02 06:56:38'),
(43, 30, 1, 'Salary', 10000, '2019-09-04 08:47:33', '2019-09-04 03:17:33'),
(44, 30, 2, 'Rental', 1000, '2019-09-04 08:47:51', '2019-09-04 03:17:51'),
(45, 30, 2, 'food', 1000, '2019-09-04 08:48:04', '2019-09-04 03:18:04'),
(46, 30, 2, 'Electricity', 200, '2019-09-04 08:48:19', '2019-09-04 03:18:19'),
(48, 33, 1, 'Salary', 10000, '2019-09-16 08:50:56', '2019-09-16 15:20:56'),
(49, 33, 2, 'House', 1000, '2019-09-16 08:51:10', '2019-09-16 15:21:10'),
(50, 33, 2, 'Electricity', 100, '2019-09-16 08:51:29', '2019-09-16 15:21:29'),
(51, 33, 2, 'Food', 1000, '2019-09-16 08:51:40', '2019-09-16 15:21:40'),
(56, 9, 1, 'Test', 1000, '2019-09-23 02:16:52', '2020-06-08 03:32:33'),
(57, 9, 2, 'Jjjj', 6788, '2019-09-23 04:44:10', '2019-09-23 11:14:10'),
(58, 37, 1, 'Salary', 10000, '2019-09-23 21:04:26', '2019-09-23 15:34:26'),
(59, 37, 2, 'Rent', 1000, '2019-09-24 09:39:31', '2019-09-24 04:09:31'),
(60, 43, 1, 'Salary ', 10000, '2019-10-16 04:04:42', '2019-10-15 22:34:42'),
(61, 43, 2, 'Housing', 1000, '2019-10-16 04:04:55', '2019-10-15 22:34:55'),
(62, 43, 3, 'App', 48000, '2019-10-16 04:05:10', '2019-10-15 22:35:10'),
(71, 46, 1, 'Income', 50000, '2019-10-22 15:36:11', '2019-10-22 10:06:11'),
(72, 46, 2, 'Expense', 20000, '2019-10-22 15:36:11', '2019-10-22 10:06:11'),
(77, 18, 1, 'Income', 30000, '2019-10-22 15:53:07', '2019-11-19 16:43:50'),
(78, 18, 2, 'Expense', 5000, '2019-10-22 15:53:07', '2019-10-29 15:54:17'),
(79, 0, 1, 'Income', 0, '2019-10-22 16:04:18', '2019-10-22 10:34:18'),
(80, 0, 2, 'Expense', 0, '2019-10-22 16:04:18', '2019-10-22 10:34:18'),
(81, 34, 1, 'Income', 0, '2019-10-22 16:11:34', '2019-10-22 10:41:34'),
(82, 34, 2, 'Expense', 0, '2019-10-22 16:11:34', '2019-10-22 10:41:34'),
(83, 47, 1, 'Income', 10000, '2019-10-23 12:53:57', '2019-10-23 07:23:57'),
(84, 47, 2, 'Expense', 3000, '2019-10-23 12:53:57', '2019-10-23 07:23:57'),
(87, 49, 1, 'Income', 100, '2019-10-25 12:03:50', '2019-10-25 12:04:18'),
(88, 49, 2, 'Expense', 0, '2019-10-25 12:03:50', '2019-10-25 06:33:50'),
(89, 49, 1, '10', 100, '2019-10-25 12:04:01', '2019-10-25 06:34:01'),
(90, 49, 3, '200', 50, '2019-10-25 12:04:49', '2019-10-25 12:10:14'),
(91, 49, 3, '300', 210, '2019-10-25 12:05:06', '2019-10-25 06:35:06'),
(92, 49, 4, '300', 500, '2019-10-25 12:10:34', '2019-10-25 12:11:23'),
(93, 49, 4, '100', 300, '2019-10-25 12:11:11', '2019-10-25 06:41:11'),
(95, 49, 2, '200', 600, '2019-10-25 12:15:14', '2019-10-25 06:45:14'),
(96, 44, 1, 'Income', 10000, '2019-10-29 18:25:25', '2019-10-29 12:55:25'),
(97, 44, 2, 'Expense', 3000, '2019-10-29 18:25:25', '2019-10-29 12:55:25'),
(98, 18, 3, 'test', 8000, '2019-11-13 10:29:16', '2019-11-13 04:59:16'),
(99, 18, 4, 'test', 6000, '2019-11-13 10:29:38', '2019-11-13 04:59:38'),
(100, 45, 1, 'Income', 50000, '2019-11-13 11:52:10', '2019-11-13 06:22:10'),
(101, 45, 2, 'Expense', 30000, '2019-11-13 11:52:10', '2019-11-13 06:22:10'),
(102, 45, 3, 'test', 800, '2019-11-13 12:00:01', '2019-11-13 06:30:01'),
(103, 2, 1, 'Income', 0, '2019-11-14 11:03:43', '2019-11-14 05:33:43'),
(104, 2, 2, 'Expense', 0, '2019-11-14 11:03:43', '2019-11-14 05:33:43'),
(105, 7, 1, 'Income', 0, '2019-11-14 11:03:47', '2019-11-14 05:33:47'),
(106, 7, 2, 'Expense', 0, '2019-11-14 11:03:47', '2019-11-14 05:33:47'),
(107, 8, 1, 'Income', 0, '2019-11-14 11:04:10', '2019-11-14 05:34:10'),
(108, 8, 2, 'Expense', 0, '2019-11-14 11:04:10', '2019-11-14 05:34:10'),
(109, 17, 1, 'Income', 0, '2019-11-14 11:04:27', '2019-11-14 05:34:27'),
(110, 17, 2, 'Expense', 0, '2019-11-14 11:04:27', '2019-11-14 05:34:27'),
(111, 23, 1, 'Income', 0, '2019-11-14 11:04:40', '2019-11-14 05:34:40'),
(112, 23, 2, 'Expense', 0, '2019-11-14 11:04:40', '2019-11-14 05:34:40'),
(113, 35, 1, 'Income', 100000, '2019-11-14 11:05:26', '2019-11-14 05:35:26'),
(114, 35, 2, 'Expense', 50000, '2019-11-14 11:05:26', '2019-11-14 05:35:26'),
(116, 62, 1, 'Income', 0, '2019-11-27 18:14:19', '2019-11-27 12:44:19'),
(117, 62, 2, 'Expense', 0, '2019-11-27 18:14:19', '2019-11-27 12:44:19'),
(118, 65, 1, 'Income', 0, '2020-01-10 12:47:08', '2020-01-10 12:47:08'),
(119, 65, 2, 'Expense', 0, '2020-01-10 12:47:08', '2020-01-10 12:47:08'),
(120, 70, 1, 'Income', 50000, '2020-01-10 13:01:34', '2020-01-10 16:03:52'),
(121, 70, 2, 'Expense', 0, '2020-01-10 13:01:34', '2020-01-10 13:01:34'),
(122, 48, 1, 'Income', 0, '2020-01-28 10:22:54', '2020-01-28 04:52:54'),
(123, 48, 2, 'Expense', 0, '2020-01-28 10:22:54', '2020-01-28 04:52:54'),
(124, 84, 1, 'Income', 10000, '2020-01-29 08:11:53', '2020-01-29 02:41:53'),
(125, 84, 2, 'Expense', 3000, '2020-01-29 08:11:53', '2020-01-29 02:41:53'),
(126, 85, 1, 'Income', 0, '2020-01-29 11:15:14', '2020-01-29 05:45:14'),
(127, 85, 2, 'Expense', 0, '2020-01-29 11:15:14', '2020-01-29 05:45:14'),
(128, 60, 1, 'Income', 0, '2020-01-29 11:59:37', '2020-01-29 06:29:37'),
(129, 60, 2, 'Expense', 0, '2020-01-29 11:59:37', '2020-01-29 06:29:37'),
(130, 53, 1, 'Income', 0, '2020-01-29 12:33:38', '2020-01-29 07:03:38'),
(131, 53, 2, 'Expense', 0, '2020-01-29 12:33:38', '2020-01-29 07:03:38'),
(132, 88, 1, 'Income', 500, '2020-01-30 12:17:33', '2020-01-30 06:47:33'),
(133, 88, 2, 'Expense', 300, '2020-01-30 12:17:33', '2020-01-30 06:47:33'),
(134, 40, 1, 'Income', 1000, '2020-02-26 11:34:07', '2020-02-26 06:04:07'),
(135, 40, 2, 'Expense', 200, '2020-02-26 11:34:07', '2020-02-26 06:04:07'),
(136, 90, 1, 'Income', 40000, '2020-04-15 11:47:05', '2020-04-15 06:17:05'),
(137, 90, 2, 'Expense', 5000, '2020-04-15 11:47:05', '2020-04-15 06:17:05'),
(146, 9, 3, 'Ok', 78, '2020-06-16 11:11:34', '2020-06-16 05:41:34'),
(158, 9, 1, 'Tyyy', 1111, '2020-06-22 02:26:07', '2020-06-22 02:48:20'),
(162, 9, 1, 'Test', 1111, '2020-06-26 12:51:50', '2020-06-26 12:54:06'),
(165, 93, 1, 'Income', 0, '2020-06-29 12:12:31', '2020-06-29 06:42:31'),
(166, 93, 2, 'Expense', 0, '2020-06-29 12:12:31', '2020-06-29 06:42:31'),
(171, 95, 1, 'Income', 0, '2020-06-29 14:46:27', '2020-06-29 09:16:27'),
(172, 95, 2, 'Expense', 0, '2020-06-29 14:46:27', '2020-06-29 09:16:27'),
(173, 95, 1, 'Test', 11, '2020-06-29 02:47:19', '2020-06-29 09:17:19'),
(174, 95, 2, 'Rrrr', 11, '2020-06-29 02:47:35', '2020-06-29 09:17:35'),
(175, 1, 2, 'Testing ', 123, '2020-07-04 15:25:08', '2020-07-04 09:55:08'),
(176, 9, 4, 'Test', 1234, '2020-07-10 03:15:04', '2020-07-10 09:45:04'),
(177, 97, 1, 'Income', 100000000, '2020-08-07 12:10:43', '2020-08-07 12:12:43'),
(178, 97, 2, 'Expense', 0, '2020-08-07 12:10:43', '2020-08-07 06:40:43'),
(179, 97, 1, 'Job', 100000000, '2020-08-07 12:10:58', '2020-08-07 12:13:03'),
(180, 97, 2, '10000000', 120000, '2020-08-07 12:11:17', '2020-08-07 06:41:17'),
(181, 97, 3, 'Newspaper ', 11, '2020-08-07 12:11:29', '2020-08-07 12:12:24'),
(182, 97, 4, 'Milk', 5555, '2020-08-07 12:11:40', '2020-08-07 12:12:11'),
(184, 99, 1, 'Income', 40000, '2020-12-02 17:28:57', '2020-12-02 11:58:57'),
(185, 99, 2, 'Expense', 0, '2020-12-02 17:28:57', '2020-12-02 11:58:57'),
(186, 102, 1, 'Income', 0, '2020-12-03 14:23:47', '2020-12-03 08:53:47'),
(187, 102, 2, 'Expense', 0, '2020-12-03 14:23:47', '2020-12-03 08:53:47'),
(188, 105, 1, 'Income', 0, '2021-02-05 11:32:44', '2021-02-05 06:02:44'),
(189, 105, 2, 'Expense', 0, '2021-02-05 11:32:44', '2021-02-05 06:02:44'),
(190, 106, 1, 'Income', 0, '2021-02-05 13:13:31', '2021-02-05 07:43:31'),
(191, 106, 2, 'Expense', 0, '2021-02-05 13:13:31', '2021-02-05 07:43:31'),
(192, 107, 1, 'Income', 100000, '2021-02-14 19:26:49', '2021-02-14 13:56:49'),
(193, 107, 2, 'Expense', 50000, '2021-02-14 19:26:49', '2021-02-14 13:56:49'),
(194, 36, 1, 'Income', 100000, '2021-02-15 12:31:25', '2021-02-15 07:01:25'),
(196, 36, 1, 'Extra Income', 20000, '2021-02-23 17:22:09', '2021-02-23 11:52:09'),
(197, 36, 3, 'Assets', 10000, '2021-02-23 17:25:18', '2021-02-23 11:55:18'),
(198, 36, 4, 'Liability', 5000, '2021-02-23 17:25:34', '2021-02-23 11:55:34'),
(200, 109, 1, 'Income', 6000, '2021-03-09 10:57:06', '2022-02-23 18:33:37'),
(201, 109, 2, 'Expense', 3000, '2021-03-09 10:57:06', '2022-02-23 18:33:52'),
(202, 108, 1, 'Income', 50000, '2021-03-09 12:10:18', '2021-03-09 06:40:18'),
(203, 108, 2, 'Expense', 40000, '2021-03-09 12:10:18', '2021-03-09 06:40:18'),
(205, 18, 1, 'Extra income', 5000, '2021-03-19 11:38:52', '2021-03-19 06:08:52'),
(206, 18, 2, 'Beer', 1000, '2021-03-19 11:40:02', '2021-03-19 06:10:02'),
(207, 18, 2, 'School Fee', 1000, '2021-03-19 11:40:20', '2021-03-19 06:10:20'),
(208, 18, 2, 'Tution Fee', 1000, '2021-03-19 11:40:46', '2021-03-19 06:10:46'),
(209, 18, 1, 'Cashback', 1000, '2021-03-19 11:41:41', '2021-03-19 06:11:41'),
(210, 18, 1, 'Paytm', 1000, '2021-03-19 11:42:25', '2021-03-19 06:12:25'),
(211, 18, 1, 'Bank Interest', 2000, '2021-03-19 11:42:40', '2021-03-19 06:12:40'),
(212, 18, 2, 'Bus Expenses', 1000, '2021-03-19 11:43:47', '2021-03-19 06:13:47'),
(213, 18, 2, 'Petrol Expenses', 1000, '2021-03-19 11:44:11', '2021-03-19 06:14:11'),
(214, 50, 1, '12', 125, '2021-04-27 15:03:59', '2021-04-27 09:33:59'),
(215, 50, 2, '12', 23, '2021-04-27 15:05:01', '2021-04-27 09:35:01'),
(216, 50, 3, '10', 20, '2021-04-27 15:05:37', '2021-04-27 09:35:37'),
(217, 110, 1, 'Income', 0, '2021-04-27 17:05:36', '2021-04-27 11:35:36'),
(218, 110, 2, 'Expense', 0, '2021-04-27 17:05:36', '2021-04-27 11:35:36'),
(219, 115, 1, 'Income', 100000, '2021-05-07 17:11:14', '2021-05-07 11:41:14'),
(220, 115, 2, 'Expense', 40000, '2021-05-07 17:11:14', '2021-05-07 11:41:14'),
(221, 36, 1, 'Ok Cash', 20000, '2021-05-26 06:24:10', '2022-02-04 12:43:15'),
(222, 117, 1, 'Income', 0, '2021-07-19 13:15:53', '2021-07-19 07:45:53'),
(223, 117, 2, 'Expense', 0, '2021-07-19 13:15:53', '2021-07-19 07:45:53'),
(224, 36, 2, 'School', 1000, '2022-02-04 12:43:54', '2022-02-04 07:13:54'),
(225, 118, 1, 'Income', 20000, '2022-02-07 10:14:52', '2022-02-07 04:44:52'),
(226, 118, 2, 'Expense', 1000, '2022-02-07 10:14:52', '2022-02-07 04:44:52'),
(227, 109, 3, 'App', 29000, '2022-02-23 18:34:20', '2022-02-23 13:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_broker_document`
--

CREATE TABLE `tbl_user_broker_document` (
  `id` int(10) NOT NULL,
  `document_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `broker_id` int(10) NOT NULL,
  `doc_file` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_broker_document`
--

INSERT INTO `tbl_user_broker_document` (`id`, `document_id`, `user_id`, `broker_id`, `doc_file`, `created_on`, `updated_on`) VALUES
(1, 3, 24, 30, '210029806_09_19030918.jpg', '2019-09-06 15:18:13', '2019-09-06 15:18:13'),
(2, 4, 24, 30, '987884606_09_19030925.jpg', '2019-09-06 15:25:36', '2019-09-06 15:25:36'),
(3, 5, 24, 30, '134286006_09_19030927.jpg', '2019-09-06 15:27:03', '2019-09-06 15:27:03'),
(4, 1, 18, 31, '274426107_09_19110957.jpg', '2019-09-07 11:57:21', '2019-09-07 11:57:21'),
(5, 1, 9, 31, '764699230_06_20110650.JPG', '2019-09-16 16:31:25', '2020-06-30 11:50:23'),
(6, 1, 9, 31, '764699230_06_20110650.JPG', '2019-09-16 16:32:37', '2020-06-30 11:50:23'),
(7, 2, 9, 31, '', '2019-09-16 16:33:21', '2020-06-30 11:50:00'),
(8, 1, 9, 31, '764699230_06_20110650.JPG', '2019-09-16 17:32:46', '2020-06-30 11:50:23'),
(9, 3, 9, 31, '321893326_09_19010904.JPG', '2019-09-16 17:34:09', '2019-09-26 13:04:42'),
(10, 1, 9, 31, '764699230_06_20110650.JPG', '2019-09-16 18:15:57', '2020-06-30 11:50:23'),
(11, 2, 18, 31, '179234719_09_19060945.jpg', '2019-09-19 18:45:53', '2019-09-19 18:45:53'),
(12, 3, 18, 31, '706701419_09_19060946.jpg', '2019-09-19 18:46:01', '2019-09-19 18:46:01'),
(13, 4, 18, 32, '380764119_09_19060959.jpg', '2019-09-19 18:59:10', '2019-09-19 18:59:10'),
(14, 1, 50, 31, '297929405_11_19031158.xlsx', '2019-11-05 15:58:56', '2019-11-05 15:58:56'),
(15, 1, 46, 31, '167065324_01_20100126.jpg', '2020-01-24 10:26:29', '2020-01-24 10:26:29'),
(16, 2, 46, 31, '548334924_01_20100126.jpg', '2020-01-24 10:26:49', '2020-01-24 10:26:49'),
(17, 3, 46, 31, '60016024_01_20100127.jpg', '2020-01-24 10:27:07', '2020-01-24 10:27:07'),
(18, 2, 99, 31, '882329002_12_20051215.JPG', '2020-12-02 17:15:37', '2020-12-02 17:15:37'),
(19, 5, 99, 32, '984284902_12_20051221.JPG', '2020-12-02 17:21:06', '2020-12-02 17:21:06'),
(20, 5, 102, 32, '28807003_12_20121241.JPG', '2020-12-03 12:41:20', '2020-12-03 12:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_educations`
--

CREATE TABLE `tbl_user_educations` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `collegeUniversity` varchar(255) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `passingYear` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_educations`
--

INSERT INTO `tbl_user_educations` (`id`, `user_id`, `collegeUniversity`, `degree`, `passingYear`, `created_on`) VALUES
(1, 27, 'Alpha college', 'Btech', '2015', '2019-08-02 15:25:18'),
(4, 27, 'RNSIT Bangalore', 'Mtech', '2018', '2019-08-03 08:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_investments_management`
--

CREATE TABLE `tbl_user_investments_management` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `investments_id` int(10) NOT NULL,
  `value` float NOT NULL DEFAULT '0',
  `fund_type` varchar(100) DEFAULT '',
  `amount` float NOT NULL DEFAULT '0',
  `investments_type` int(10) NOT NULL DEFAULT '0' COMMENT '1=>IBEX35,2=>VN30',
  `insert_type` int(10) NOT NULL DEFAULT '0',
  `is_suggested` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_investments_management`
--

INSERT INTO `tbl_user_investments_management` (`id`, `user_id`, `investments_id`, `value`, `fund_type`, `amount`, `investments_type`, `insert_type`, `is_suggested`, `created_on`, `updated_on`) VALUES
(343, 46, 8, 0, 'Risky funds', 12, 1, 0, 1, '2020-03-09 16:42:46', '2020-02-28 10:02:31'),
(344, 46, 7, 0, 'moderate funds', 0, 1, 0, 1, '2020-02-28 15:32:31', '2020-02-28 10:02:31'),
(345, 46, 6, 0, 'Conservative funds', 0, 1, 0, 1, '2020-02-28 15:32:31', '2020-02-28 10:02:31'),
(346, 1, 8, 0, 'Risky funds', 0, 1, 0, 1, '2020-03-03 10:15:37', '2020-03-03 04:45:37'),
(347, 1, 7, 0, 'moderate funds', 0, 1, 0, 1, '2020-03-03 10:15:37', '2020-03-03 04:45:37'),
(348, 1, 6, 0, 'Conservative funds', 0, 1, 0, 1, '2020-03-03 10:15:37', '2020-03-03 04:45:37'),
(357, 9, 6, 0, 'Conservative funds', 800, 1, 0, 0, '2020-03-14 11:09:27', '2020-03-13 13:08:02'),
(359, 9, 7, 0, 'Moderate funds', 55555, 1, 0, 0, '2020-03-14 10:36:29', '2020-03-14 05:06:29'),
(362, 18, 7, 0, 'Moderate funds', 20, 1, 0, 1, '2020-03-19 12:37:42', '2020-03-17 04:49:59'),
(363, 18, 6, 0, 'Conservative funds', 25, 1, 0, 0, '2020-03-23 15:09:52', '2020-03-23 09:39:52'),
(364, 36, 6, 0, 'Conservative funds', 234, 1, 0, 0, '2020-12-15 12:45:48', '2020-12-15 07:15:48'),
(365, 36, 7, 0, 'Moderate funds', 520, 1, 0, 0, '2020-12-15 12:46:03', '2020-12-15 07:16:03'),
(366, 18, 12, 0, 'Risky funds', 10, 1, 0, 0, '2021-04-16 10:13:43', '2021-04-16 04:43:43'),
(367, 36, 12, 0, 'Risky funds', 88, 1, 0, 0, '2022-02-19 14:19:32', '2022-02-19 08:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_payments`
--

CREATE TABLE `tbl_user_payments` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `plan_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_payments`
--

INSERT INTO `tbl_user_payments` (`id`, `user_id`, `plan_id`, `amount`, `txn_id`, `currency`, `payer_email`, `payment_status`, `created_on`, `updated_on`) VALUES
(1, 35, 2, 49, '1UC83387YW447364V', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-09-20 18:08:50', '2019-09-20 18:08:50'),
(2, 36, 2, 49, '3WH664086S745205T', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-09-23 13:19:18', '2019-09-23 13:19:18'),
(3, 36, 2, 49, '50S75376990262158', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-09-23 17:20:04', '2019-09-23 17:20:04'),
(4, 36, 3, 90, '5XN77904AU513294S', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-09-23 17:28:24', '2019-09-23 17:28:24'),
(5, 36, 4, 170, '8ET93608FP5538705', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-09-23 17:30:05', '2019-09-23 17:30:05'),
(6, 18, 4, 170, '1LB2996509691953D', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-09-24 18:25:34', '2019-09-24 18:25:34'),
(7, 18, 4, 170, '666407369G032660V', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-09-26 17:04:28', '2019-09-26 17:04:28'),
(8, 25, 5, 200, '1RK60458PH768063U', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-10-07 15:42:14', '2019-10-07 15:42:14'),
(9, 25, 6, 250, '6DV06235CX155214U', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-10-07 16:13:29', '2019-10-07 16:13:29'),
(10, 27, 5, 200, '0LJ64158YM9392254', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-10-07 16:24:31', '2019-10-07 16:24:31'),
(11, 27, 6, 250, '2V1493145Y567991L', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-10-07 16:29:29', '2019-10-07 16:29:29'),
(12, 41, 5, 200, '34144713PR1573805', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2019-10-07 19:01:02', '2019-10-07 19:01:02'),
(13, 49, 4, 170, '6YT76626LA7873118', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-10-24 12:54:42', '2019-10-24 12:54:42'),
(14, 51, 5, 200, '7CA33600NS150303A', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-10-24 15:39:08', '2019-10-24 15:39:08'),
(15, 52, 5, 200, '54380868DK5467108', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-10-29 12:00:00', '2019-10-29 12:00:00'),
(16, 50, 4, 170, '7EA85164T6488612L', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-10-30 11:03:57', '2019-10-30 11:03:57'),
(17, 54, 5, 200, '5J704500MC865953U', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-11-01 12:05:10', '2019-11-01 12:05:10'),
(18, 57, 5, 200, '8LV73611AF305862J', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-11-05 16:12:44', '2019-11-05 16:12:44'),
(19, 58, 5, 200, '19K92816NP650274P', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-11-07 12:51:14', '2019-11-07 12:51:14'),
(20, 64, 5, 200, '9E4074313L2673621', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-11-28 15:10:29', '2019-11-28 15:10:29'),
(21, 67, 5, 200, '4VY88839833130326', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-11-28 15:39:14', '2019-11-28 15:39:14'),
(22, 69, 6, 250, '97K257826W725792Y', 'USD', 'sudhir1994@gmail.com', 'Completed', '2019-12-16 10:20:14', '2019-12-16 10:20:14'),
(23, 46, 4, 170, '63335713HR196210Y', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2020-01-24 10:20:08', '2020-01-24 10:20:08'),
(24, 73, 5, 200, '7R973125RS195870S', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2020-01-27 10:34:40', '2020-01-27 10:34:40'),
(25, 74, 5, 200, '81095553RE5514625', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2020-01-27 10:48:43', '2020-01-27 10:48:43'),
(26, 48, 3, 90, '4B691173SM348020G', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 10:17:55', '2020-01-28 10:17:55'),
(27, 48, 4, 170, '6J007422UV456083L', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 10:26:10', '2020-01-28 10:26:10'),
(28, 77, 5, 200, '78D21777T70128412', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 10:35:12', '2020-01-28 10:35:12'),
(29, 78, 5, 200, '94X13272V0046152T', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 11:14:45', '2020-01-28 11:14:45'),
(30, 79, 5, 200, '8YE881987M429622P', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 11:41:50', '2020-01-28 11:41:50'),
(31, 80, 5, 200, '53H19723HV129124M', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 12:34:25', '2020-01-28 12:34:25'),
(32, 81, 5, 200, '1N838926LA196540B', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 12:38:12', '2020-01-28 12:38:12'),
(33, 82, 5, 200, '7S3168119E112744B', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-28 12:46:23', '2020-01-28 12:46:23'),
(34, 83, 5, 200, '0UM87985XB775882L', 'USD', 'tinolee139-buyer@gmail.com', 'Completed', '2020-01-29 08:03:14', '2020-01-29 08:03:14'),
(35, 86, 5, 200, '3JD37998PH834663B', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-01-29 11:28:13', '2020-01-29 11:28:13'),
(36, 1, 4, 170, '8HK78134B6992401W', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-02-26 13:00:42', '2020-02-26 13:00:42'),
(37, 93, 2, 49, '1P783423EB953682R', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-06-29 14:53:38', '2020-06-29 14:53:38'),
(38, 93, 4, 170, '07E1745201121145B', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-06-29 14:55:02', '2020-06-29 14:55:02'),
(39, 1, 4, 170, '4V079957UJ404243G', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-07-04 15:23:11', '2020-07-04 15:23:11'),
(40, 36, 4, 170, '6R7267155X324300H', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-09-25 10:03:32', '2020-09-25 10:03:32'),
(41, 18, 4, 170, '71N97751W7598594C', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-11-07 10:38:38', '2020-11-07 10:38:38'),
(42, 25, 6, 250, '4PF86791TV4366459', 'USD', 'sudhir1994@gmail.com', 'Completed', '2020-12-15 12:25:26', '2020-12-15 12:25:26'),
(43, 105, 4, 170, '0KJ37372SY958873W', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-02-05 11:31:11', '2021-02-05 11:31:11'),
(44, 106, 4, 170, '87176769536669841', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-02-05 13:12:23', '2021-02-05 13:12:23'),
(45, 106, 4, 170, '21554327D57779739', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-02-05 13:13:12', '2021-02-05 13:13:12'),
(46, 107, 4, 170, '12M12371T13423321', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-02-14 19:06:42', '2021-02-14 19:06:42'),
(47, 108, 4, 170, '9NN51284ER897445E', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-03-09 10:36:02', '2021-03-09 10:36:02'),
(48, 109, 4, 170, '2R561406UW081442B', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-03-09 10:54:32', '2021-03-09 10:54:32'),
(49, 27, 6, 250, '7WS77892HD742160E', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-03-10 17:54:53', '2021-03-10 17:54:53'),
(50, 28, 6, 250, '7KS982878W873205J', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-03-15 18:42:09', '2021-03-15 18:42:09'),
(51, 113, 5, 200, '303742512T347084E', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-04-27 16:48:43', '2021-04-27 16:48:43'),
(52, 78, 5, 200, '6SX845532U298964U', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-04-27 17:01:55', '2021-04-27 17:01:55'),
(53, 116, 2, 49, '61180493T2213700D', 'USD', 'sudhir1994@gmail.com', 'Completed', '2021-07-19 13:00:44', '2021-07-19 13:00:44'),
(54, 120, 4, 197, '98L19900TX7608644', 'USD', 'sudhir1994@gmail.com', 'Completed', '2022-02-07 14:45:56', '2022-02-07 14:45:56'),
(55, 25, 6, 250, '2PK67698XC726920M', 'USD', 'sudhir1994@gmail.com', 'Completed', '2022-02-17 10:15:51', '2022-02-17 10:15:51'),
(56, 121, 6, 250, '5FF36424F75448455', 'USD', 'sudhir1994@gmail.com', 'Completed', '2022-02-22 12:33:58', '2022-02-22 12:33:58'),
(57, 109, 4, 197, '362405504V208224A', 'USD', 'sudhir1994@gmail.com', 'Completed', '2022-03-21 15:01:57', '2022-03-21 15:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_personel_info`
--

CREATE TABLE `tbl_user_personel_info` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `martial_status` varchar(255) NOT NULL,
  `expYears` varchar(50) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `certificate` text NOT NULL,
  `no_of_child` int(10) NOT NULL DEFAULT '0',
  `job_type` int(10) NOT NULL COMMENT '1=>Employee,2=>Unemployed,3=>Freelance,4=>Employer,5=>Other',
  `country` varchar(50) NOT NULL,
  `app_usage` int(10) NOT NULL DEFAULT '0',
  `talk_to_advisor` int(5) NOT NULL DEFAULT '0',
  `profile_image` varchar(255) NOT NULL DEFAULT 'profile-image-demo.jpg',
  `terms_conditions` text NOT NULL,
  `stop_loss` float NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_personel_info`
--

INSERT INTO `tbl_user_personel_info` (`id`, `user_id`, `first_name`, `last_name`, `phone_number`, `date_of_birth`, `martial_status`, `expYears`, `speciality`, `certificate`, `no_of_child`, `job_type`, `country`, `app_usage`, `talk_to_advisor`, `profile_image`, `terms_conditions`, `stop_loss`, `created_on`, `updated_on`) VALUES
(1, 1, 'testing', 'patient', '', '01/15/1992', 'Single', '', '', '', 1, 1, '101', 1, 1, '89077604_07_20030719.png', '', 0, '2020-07-04 15:34:48', '2020-07-04 15:34:48'),
(5, 2, 'Raju', 'Kumar', '', '06/12/1990', '', '', '', '', 0, 1, '101', 2, 1, '', '', 0, '2019-06-14 07:26:25', '2019-06-14 07:26:25'),
(7, 9, 'Pk', 'Ram', '7503359688', '', 'Single', '', '', '', 0, 4, '6', 3, 1, '791224827_11_20011103.JPG', '', 0, '2020-11-27 01:03:02', '2020-11-27 01:03:02'),
(9, 18, 'Gobind', 'Kumar', '8860063789', '', 'Single', '', '', '', 1, 1, '101', 3, 1, '442058207_03_20110309.JPG', '', 4, '2021-04-02 14:59:33', '2021-04-02 14:59:33'),
(10, 17, 'Avtar', 'Pal', '7503359688', '', '', '', '', '', 0, 3, '2', 3, 0, 'profile-image-demo.jpg', '', 0, '2019-07-03 13:14:25', '2019-07-03 13:14:25'),
(14, 21, 'Sanjeet', 'Kumar', '7217638830', '', 'Single', '', '', '', 1, 3, '101', 1, 1, '379294120_07_19040750.png', '', 0, '2020-04-06 11:09:43', '2020-04-06 11:09:43'),
(16, 23, 'Avtar', 'Pal', '7503359688', '', 'Married', '', '', '', 4, 1, '101', 2, 1, '897119622_07_19120700.JPG', '', 0, '2019-07-22 12:00:55', '2019-07-22 12:00:55'),
(18, 25, 'Testing', 'Advisor', '8860063787', '', '', '2', 'trading', '469367630_07_22110716.JPG', 0, 0, '238', 0, 0, '35110930_07_22110716.JPG', '', 0, '2021-05-07 18:26:06', '2022-07-30 11:16:56'),
(20, 27, 'Advisor', 'Kumar', '918860063789', '', '', '5', 'trading', '337851404_02_22040252.JPG', 0, 0, '101', 0, 0, '161977104_02_22040252.JPG', '', 0, '2021-03-10 17:56:56', '2022-02-04 16:52:26'),
(21, 28, 'pk', 'Ram', '9964350059', '', '', '5', 'trending', '292022426_11_20021141.JPG', 0, 0, '4', 0, 0, '660835826_11_20021141.JPG', '', 0, '2019-07-25 12:38:33', '2020-11-26 14:41:19'),
(24, 31, 'I', 'Broker', '7217638855', '', '', '12', '', '', 0, 0, '102', 0, 0, '650196306_09_19030951.jpg', 'Select lists are used if you want to allow the user to pick from multiple options. The following example contains a dropdown list (select list): Radio buttons are used if you want to limit the user to just one selection from a list of preset options. The following example contains three radio buttons. The first option is checked by default and the last option is disabled: Checkboxes are used if you want the user to select any number of options from a list of preset options. The following example contains three checkboxes. The last option is disabled:', 0, '2019-09-06 15:51:25', '2019-09-06 15:51:25'),
(25, 32, 'Interactive', 'Broker', '7218668830', '', '', '10', '', '', 0, 0, '101', 0, 0, '651532106_09_19030953.jpg', 'Select lists are used if you want to allow the user to pick from multiple options. The following example contains a dropdown list (select list): Radio buttons are used if you want to limit the user to just one selection from a list of preset options. The following example contains three radio buttons. The first option is checked by default and the last option is disabled: Checkboxes are used if you want the user to select any number of options from a list of preset options. The following example contains three checkboxes. The last option is disabled:', 0, '2019-09-06 15:53:48', '2019-09-06 15:53:48'),
(27, 34, 'Narendra', 'Kumar', '7042231040', '', '', '', '', '', 0, 4, '101', 3, 0, 'profile-image-demo.jpg', '', 0, '2019-09-16 20:52:01', '2019-09-16 20:52:01'),
(28, 35, 'Rajan', 'Yadav', '7217635522', '', 'Single', '', '', '', 1, 1, '11', 2, 1, '775666120_09_19060913.jpg', '', 0, '2019-09-20 18:13:45', '2019-09-20 18:13:45'),
(29, 36, 'Palak', 'Maharaj', '8860063785', '', 'Single', '', '', '', 1, 1, '101', 1, 1, '92855216_04_22060451.JPG', '', 1.9, '2022-06-20 10:16:04', '2022-06-20 10:16:04'),
(33, 40, 'Huong', 'Tran', '1234567890', '', 'Married', '', '', '', 1, 2, '238', 1, 0, '460696028_09_19010953.JPG', '', 0, '2019-09-28 01:53:38', '2019-09-28 01:53:38'),
(38, 45, 'Amitabh', 'Suman', '7217638830', '', 'Single', '', '', '', 1, 1, '101', 3, 1, 'profile-image-demo.jpg', '', 0, '2019-10-21 18:19:36', '2019-10-21 18:19:36'),
(39, 46, 'Avdesh', 'Kumar', '8860063789', '', 'Single', '', '', '', 1, 2, '3', 3, 1, 'profile-image-demo.jpg', '', 0, '2019-10-22 15:18:29', '2019-10-22 15:18:29'),
(42, 49, 'Harshit', 'Singh', '2008003007', '', 'Single', '', '', '', 1, 1, '101', 3, 0, '811747524_10_19111057.jpg', '', 0, '2019-10-25 11:55:12', '2019-10-25 11:55:12'),
(43, 50, 'Bulbul k', 'Singh ', '5214563254', '', 'Single', '', '', '', 1, 1, '101', 2, 1, '144076106_11_19051106.JPG', '', 0, '2021-04-27 12:36:06', '2021-04-27 12:36:06'),
(46, 53, 'Vinu', 'sinha', '1236541102', '', 'Single', '', '', '', 1, 1, '4', 2, 1, 'profile-image-demo.jpg', '', 0, '2020-01-29 12:30:20', '2020-01-29 12:30:20'),
(48, 55, 'Sandeep', 'Singh ', '5412365412', '', '', '2 years', '', '', 0, 0, '101', 0, 0, '74785829_10_19111042.xlsx', 'Testing ', 0, '2019-11-13 11:39:34', '2019-11-13 11:39:34'),
(49, 56, 'Sanjeev', 'Sinha ', '8860063789', '', '', '12', '', '', 0, 0, '17', 0, 0, '371386029_10_19031014.xlsx', 'asdfg', 0, '2019-11-13 11:38:37', '2019-11-13 11:38:37'),
(51, 58, 'Varun ', 'Singh ', '1012014562', '', '', '2', '1', '138693207_11_19011106.pdf', 0, 0, '7', 0, 0, '206767507_11_19031136.jpg', '', 0, '2019-11-07 15:36:08', '2019-11-07 15:36:08'),
(53, 60, 'Visu', 'Singh', '1236541254', '', 'Single', '', '', '', 1, 3, '11', 1, 1, '325402529_01_20110153.jpg', '', 0, '2020-01-29 11:53:28', '2020-01-29 11:53:28'),
(54, 61, 'DFDG', 'DFGDG', '1235487452', '', '', '', '', '', 0, 3, '12', 2, 0, 'profile-image-demo.jpg', '', 0, '2019-11-27 17:24:35', '2019-11-27 17:24:35'),
(57, 64, 'kittu', 'Singh', '5002003008', '', '', '12', '12', '796850228_11_19031126.docx', 0, 0, '7', 0, 0, 'profile-image-demo.jpg', '', 0, '2019-11-28 15:26:19', '2019-11-28 15:26:19'),
(62, 69, 'Mohan', 'Kumar', '8866552211', '', '', '5', 'Trading', '78672016_12_19101225.xps', 0, 0, '101', 0, 0, '515566816_12_19101230.jpg', '', 0, '2019-12-16 10:30:35', '2019-12-16 10:30:35'),
(66, 73, 'Dilip', 'Ghosh', '8866221133', '', '', '4', 'Business', '588729527_01_20100147.jpg', 0, 0, '101', 0, 0, 'profile-image-demo.jpg', '', 0, '2020-01-27 10:48:06', '2020-01-27 10:48:06'),
(69, 76, 'Bulbul', 'Singh', '2356987451', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2020-01-28 10:28:11', '2020-01-28 10:28:11'),
(71, 78, 'Ansu', 'Singh', '23455', '', '', '5', 'Managing Director', '805687206_06_20020607.JPG', 0, 0, '2', 0, 0, '626453706_06_20020607.JPG', '', 0, '2020-01-28 11:18:51', '2020-06-06 14:07:25'),
(72, 79, 'Vikash', 'asa', '5214786587', '', '', '23', 'qwerty', '544130628_01_20110142.docx', 0, 0, '14', 0, 0, '165188429_01_20120118.jpg', '', 0, '2020-01-29 12:18:02', '2020-01-29 12:18:02'),
(73, 80, 'Rajiv ', 'Singh', '8965741236', '', '', '23', 'qa test', '589742129_01_20120128.docx', 0, 0, '2', 0, 0, 'profile-image-demo.jpg', '', 0, '2020-01-29 12:28:40', '2020-01-29 12:28:40'),
(74, 81, 'asdad', 'sds', '5623987412', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2020-01-28 12:35:29', '2020-01-28 12:35:29'),
(75, 82, 'edf', 'defd', '2365120012', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2020-01-28 12:43:34', '2020-01-28 12:43:34'),
(76, 83, 'Rafa', 'Barreto', '0123456789', '', '', '2', 'Personal Finance', '686461930_01_20120123.JPG', 0, 0, '238', 0, 0, '522621930_01_20120123.JPG', '', 0, '2020-01-30 12:23:37', '2020-01-30 12:23:37'),
(77, 84, 'Rafa', 'Plasencia', '0123456789', '', 'Married', '', '', '', 2, 3, '205', 1, 1, '560634202_02_20120202.JPG', '', 0, '2020-02-02 12:02:33', '2020-02-02 12:02:33'),
(78, 85, 'Rajesh', 'Singh', '5632897457', '', 'Single', '', '', '', 1, 1, '101', 1, 1, 'profile-image-demo.jpg', '', 0, '2020-01-29 11:11:58', '2020-01-29 11:11:58'),
(79, 86, 'Avinash Singh', 'Rajput', '5210012012', '', '', '12', 'Testing', '448646229_01_20110131.docx', 0, 0, '8', 0, 0, '789381329_01_20110143.jpg', '', 0, '2020-01-29 11:43:29', '2020-01-29 11:43:29'),
(80, 87, 'Rahul ', 'Singh', '5632415987', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2020-01-29 12:21:43', '2020-01-29 12:21:43'),
(81, 88, 'Huong', 'Tran', '1267863696', '', 'Married', '', '', '', 1, 3, '238', 1, 1, '545555730_01_20120121.jpeg', '', 0, '2020-01-30 12:21:13', '2020-01-30 12:21:13'),
(82, 6, 'Sanjeet', 'Kumar', '', '', 'Single', '', '', '', 1, 1, '101', 3, 1, '', '', 0, '2020-02-26 14:33:06', '2020-02-26 14:33:06'),
(83, 89, 'pankaj', 'kumar', '5588996600', '', '', '', '', '', 0, 1, '13', 3, 0, 'profile-image-demo.jpg', '', 0, '2020-04-15 11:28:25', '2020-04-15 11:28:25'),
(84, 90, 'kumar', 'Palak', '8877995522', '', 'Single', '', '', '', 1, 1, '15', 1, 1, 'profile-image-demo.jpg', '', 0, '2020-04-15 11:45:38', '2020-04-15 11:45:38'),
(85, 91, 'Ram', 'Bhakt', '4488996633', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2020-04-15 11:48:56', '2020-04-15 11:48:56'),
(86, 92, 'Ritik', 'Kumar', '8899556622', '', '', '', '', '', 0, 2, '1', 1, 0, 'profile-image-demo.jpg', '', 0, '2020-06-16 11:26:20', '2020-06-16 11:26:20'),
(87, 93, 'Ankush', 'Chauhan', '9761304015', '', 'Single', '', '', '', 1, 1, '101', 3, 1, 'profile-image-demo.jpg', '', 0, '2020-06-29 11:10:03', '2020-06-29 11:10:03'),
(88, 94, 'Test', 'T', '1234566', '', '', '', '', '', 0, 1, '20', 2, 0, 'profile-image-demo.jpg', '', 0, '2020-06-29 12:46:21', '2020-06-29 12:46:21'),
(89, 95, 'Second ', 'Test', '5454545', '', '', '', '', '', 0, 3, '3', 1, 0, 'profile-image-demo.jpg', '', 0, '2020-06-29 13:01:21', '2020-06-29 13:01:21'),
(90, 96, 'T', 'K', '1234566', '', '', '22', 'Test', '904238229_06_20060612.JPG', 0, 0, '2', 0, 0, '241208229_06_20060612.JPG', '', 0, '2020-06-29 17:36:40', '2020-06-29 18:12:57'),
(91, 97, 'Rohit', 'Prajapathi ', '7905335400', '', '', '', '', '', 0, 1, '30', 3, 0, 'profile-image-demo.jpg', '', 0, '2020-08-07 12:06:15', '2020-08-07 12:06:15'),
(92, 98, 'Aman', 'Kumar', '8354830255', '', '', '5', 'Developers ', '511293807_08_20010801.JPG', 0, 0, '3', 0, 0, '90294007_08_20010801.JPG', '', 0, '2020-08-07 12:29:30', '2020-08-07 13:01:42'),
(93, 99, 'Hareram', 'K', '9761304015', '', 'Single', '', '', '', 0, 1, '3', 2, 1, '601199602_12_20031246.JPG', '', 0, '2020-12-02 03:46:08', '2020-12-02 03:46:08'),
(94, 100, 'ABC', 'DEF', '123456', '', '', '', '', '', 0, 4, '12', 2, 0, 'profile-image-demo.jpg', '', 0, '2020-12-03 10:17:16', '2020-12-03 10:17:16'),
(95, 101, 'TYU', 'IOP', '67890', '', '', '', '', '', 0, 1, '17', 1, 0, 'profile-image-demo.jpg', '', 0, '2020-12-03 10:20:05', '2020-12-03 10:20:05'),
(96, 102, 'Kk', 'Kk', '456123', '', '', '', '', '', 0, 1, '12', 1, 0, 'profile-image-demo.jpg', '', 0, '2020-12-03 10:25:01', '2020-12-03 10:25:01'),
(97, 103, 'Avtar', 'Pal', '7503359688', '', '', '5', 'Jai ho', '370184419_12_20111203.JPG', 0, 0, '101', 0, 0, '296892519_12_20111203.JPG', '', 0, '2020-12-15 11:45:38', '2020-12-19 11:03:10'),
(98, 104, 'Hh', 'Yadav', '7065206666', '', '', '', '', '', 0, 5, '101', 3, 0, 'profile-image-demo.jpg', '', 0, '2021-01-22 11:26:11', '2021-01-22 11:26:11'),
(99, 105, 'Amar', 'Jeet', '8860063789', '', 'Single', '', '', '', 1, 1, '101', 1, 1, 'profile-image-demo.jpg', '', 0, '2021-02-05 11:31:41', '2021-02-05 11:31:41'),
(100, 106, 'raman', 'singh', '8860063789', '', '', '', '', '', 0, 1, '1', 2, 0, 'profile-image-demo.jpg', '', 0, '2021-02-05 11:41:23', '2021-02-05 11:41:23'),
(101, 107, 'Lokesh', 'Kumar', '8860063789', '', 'Single', '', '', '', 1, 1, '10', 1, 1, 'profile-image-demo.jpg', '', 0, '2021-02-14 19:07:08', '2021-02-14 19:07:08'),
(102, 108, 'Palak', 'Maharaj', '8860063789', '', 'Single', '', '', '', 1, 1, '238', 1, 1, '460085609_03_21120309.jpg', '', 2, '2021-04-03 10:38:56', '2021-04-03 10:38:56'),
(103, 109, 'Rafael', 'Barreto', '0918735032', '', 'Married', '', '', '', 2, 3, '205', 1, 1, 'profile-image-demo.jpg', '', 2, '2022-06-15 14:03:48', '2022-06-15 14:03:48'),
(104, 110, 'niraj v', 'Singh', '54512541250', '', 'Married', '', '', '', 1, 2, '101', 1, 1, 'profile-image-demo.jpg', '', 0, '2021-04-27 12:34:38', '2021-04-27 12:34:38'),
(105, 111, 'Bulbul', 'Singh', '2356235124', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2021-04-23 18:41:35', '2021-04-23 18:41:35'),
(106, 112, 'ghfjgf', 'gfhg', '', '', '', '', '', '', 0, 1, '18', 1, 0, 'profile-image-demo.jpg', '', 0, '2021-04-23 18:47:06', '2021-04-23 18:47:06'),
(107, 113, 'Sanu', 'Singh', '1232121212', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2021-04-27 16:38:25', '2021-04-27 16:38:25'),
(108, 114, 'Bulbul ', 'Singh rajput', '9431424612', '', '', '2', '', '', 0, 0, '101', 0, 0, '239949606_05_21050532.PNG', 'Should be starting price over 100 dollar.', 0, '2021-05-06 17:33:15', '2021-05-06 17:33:15'),
(109, 115, 'May', 'Month', '8855221144', '', 'Single', '', '', '', 1, 1, '1', 1, 1, 'profile-image-demo.jpg', '', 0, '2021-05-07 17:07:12', '2021-05-07 17:07:12'),
(110, 116, 'Santosh', 'Kumar', '5522114455', '', 'Single', '', '', '', 1, 1, '101', 1, 1, 'profile-image-demo.jpg', '', 0, '2021-07-19 13:12:45', '2021-07-19 13:12:45'),
(111, 117, 'Mahesh', 'Kumar', '8860063789', '', 'Single', '', '', '', 1, 1, '2', 1, 1, 'profile-image-demo.jpg', '', 0, '2021-07-19 13:14:16', '2021-07-19 13:14:16'),
(112, 118, 'Narendra', 'Kumar', '7042231040', '', 'Married', '', '', '', 1, 1, '101', 1, 1, 'profile-image-demo.jpg', '', 0, '2022-02-07 10:05:55', '2022-02-07 10:05:55'),
(113, 119, 'Plakak', 'kumar', '8855221122', '', '', '', '', '', 0, 2, '16', 1, 0, 'profile-image-demo.jpg', '', 0, '2022-02-07 14:08:48', '2022-02-07 14:08:48'),
(114, 120, 'Pankaj', 'Kumar', '8860063789', '', 'Single', '', '', '', 1, 1, '101', 1, 1, 'profile-image-demo.jpg', '', 0, '2022-02-07 14:49:18', '2022-02-07 14:49:18'),
(115, 121, 'Mohan ', 'Das', '8855221144', '', '', '', '', '', 0, 0, '', 0, 0, 'profile-image-demo.jpg', '', 0, '2022-02-22 12:33:03', '2022-02-22 12:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rf_rv_options_values`
--

CREATE TABLE `tbl_user_rf_rv_options_values` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rf` int(10) NOT NULL,
  `rv` int(10) NOT NULL,
  `options` int(10) NOT NULL,
  `all_money` int(10) NOT NULL DEFAULT '0' COMMENT '0=>use all moeny,1=>custom calculation',
  `money_use_percentage` varchar(255) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_rf_rv_options_values`
--

INSERT INTO `tbl_user_rf_rv_options_values` (`id`, `user_id`, `rf`, `rv`, `options`, `all_money`, `money_use_percentage`, `created_on`, `updated_on`) VALUES
(1, 9, 29, 31, 40, 1, '50', '2020-12-17 14:58:46', '2019-07-16 09:23:59'),
(3, 21, 34, 46, 20, 0, '100', '2019-07-20 17:38:07', '2019-07-20 11:31:20'),
(4, 1, 52, 24, 24, 1, '68', '2019-09-02 12:26:21', '2019-07-20 13:04:40'),
(5, 23, 30, 60, 10, 0, '100', '2019-07-22 12:02:30', '2019-07-22 06:06:23'),
(7, 24, 50, 30, 20, 1, '65', '2019-08-19 09:14:07', '2019-07-22 11:29:43'),
(8, 18, 25, 50, 25, 1, '69', '2020-10-15 16:20:38', '2019-07-26 11:14:22'),
(9, 30, 46, 55, 0, 0, '100', '2019-09-23 20:47:11', '2019-08-30 15:17:51'),
(10, 33, 48, 51, 1, 0, '100', '2019-09-16 21:19:18', '2019-09-16 15:20:37'),
(11, 37, 27, 73, 0, 1, '75', '2019-10-15 19:38:55', '2019-09-23 15:29:01'),
(12, 40, 30, 60, 10, 0, '100', '2019-09-28 13:48:45', '2019-09-28 08:18:45'),
(13, 43, 30, 70, 0, 0, '100', '2019-10-16 04:04:16', '2019-10-15 14:19:10'),
(14, 44, 31, 69, 0, 0, '100', '2019-10-29 18:25:19', '2019-10-21 11:19:56'),
(15, 47, 36, 60, 4, 1, '100', '2019-10-23 13:02:29', '2019-10-23 07:24:16'),
(16, 49, 26, 47, 27, 0, '100', '2019-10-25 12:03:33', '2019-10-25 06:32:59'),
(17, 50, 42, 53, 5, 1, '100', '2019-11-26 17:51:52', '2019-11-01 09:05:03'),
(18, 36, 25, 50, 25, 1, '50', '2022-02-18 12:45:19', '2019-11-14 05:42:07'),
(19, 46, 54, 43, 3, 0, '100', '2020-02-28 11:03:39', '2020-01-24 04:59:29'),
(20, 84, 45, 50, 5, 1, '69', '2020-02-02 12:03:17', '2020-02-02 06:33:17'),
(21, 97, 40, 42, 18, 1, '24', '2020-08-07 12:18:35', '2020-08-07 06:46:51'),
(22, 105, 20, 60, 20, 1, '50', '2021-02-05 11:45:50', '2021-02-05 06:15:50'),
(23, 107, 20, 60, 20, 1, '57', '2021-02-14 19:28:18', '2021-02-14 13:58:18'),
(24, 109, 45, 50, 5, 0, '100', '2021-03-20 07:17:03', '2021-03-09 05:27:02'),
(25, 108, 20, 60, 20, 1, '60', '2021-04-12 18:51:29', '2021-03-09 06:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_skilss`
--

CREATE TABLE `tbl_user_skilss` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_stock_management`
--

CREATE TABLE `tbl_user_stock_management` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL DEFAULT '0',
  `value` float NOT NULL DEFAULT '0',
  `order_type` varchar(100) DEFAULT '',
  `number` int(10) NOT NULL DEFAULT '0',
  `remainingNumber` int(10) NOT NULL DEFAULT '0',
  `s_type` int(10) NOT NULL DEFAULT '0' COMMENT '1=>V stock,2=>R Stock,3=>Options',
  `insert_type` int(10) NOT NULL DEFAULT '0',
  `is_suggested` tinyint(1) NOT NULL DEFAULT '0',
  `stock_name` varchar(255) DEFAULT NULL,
  `stock_price` float NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_stock_management`
--

INSERT INTO `tbl_user_stock_management` (`id`, `user_id`, `stock_id`, `value`, `order_type`, `number`, `remainingNumber`, `s_type`, `insert_type`, `is_suggested`, `stock_name`, `stock_price`, `created_on`, `updated_on`) VALUES
(24, 108, 11, 0, '', 210, 0, 1, 0, 0, NULL, 0, '2021-04-09 17:25:27', '2021-04-09 09:47:53'),
(63, 36, 17, 0, '', 15, 0, 1, 0, 0, NULL, 0, '2021-04-12 18:22:57', '2021-04-12 12:49:24'),
(64, 108, 9, 0, '', 20, 0, 1, 0, 1, NULL, 0, '2021-04-12 18:52:46', '2021-04-12 13:21:29'),
(67, 36, 22, 0, '', 10, 0, 1, 0, 0, NULL, 0, '2021-04-15 14:56:34', '2021-04-15 09:26:34'),
(77, 36, 4, 0, '', 175, 0, 1, 0, 0, NULL, 0, '2021-05-06 14:53:29', '2021-05-06 09:23:29'),
(105, 36, 8, 0, '', 30, 0, 1, 0, 0, NULL, 0, '2021-05-17 15:41:14', '2021-05-17 10:11:14'),
(107, 108, 21, 0, '', 100, 0, 1, 0, 0, NULL, 0, '2021-05-29 12:18:40', '2021-05-18 12:33:38'),
(108, 108, 21, 0, '', 100, 0, 1, 0, 0, NULL, 0, '2021-05-29 12:18:40', '2021-05-29 06:06:12'),
(114, 108, 3, 0, '', 50, 0, 1, 0, 0, NULL, 0, '2021-06-22 18:13:19', '2021-06-22 12:43:19'),
(117, 36, 47, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2021-07-18 08:34:57', '2021-07-18 03:04:57'),
(118, 36, 48, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2021-07-21 16:08:03', '2021-07-21 10:38:03'),
(120, 36, 50, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2021-07-26 11:45:03', '2021-07-26 06:15:03'),
(122, 36, 0, 0, '', 1, 0, 3, 0, 0, 'IBEX35', 8300, '2021-08-09 17:36:28', '2021-08-09 12:06:28'),
(125, 36, 0, 0, 'Market', 500, 0, 3, 0, 0, 'Test Option', 20, '2022-01-28 15:16:00', '2022-01-28 09:46:00'),
(126, 36, 0, 0, 'Market', 1, 0, 3, 0, 0, 'SP500', 4589, '2022-02-03 06:26:05', '2022-02-03 00:56:05'),
(130, 36, 10, 0, '', 0, 0, 1, 1, 1, NULL, 0, '2022-02-04 12:29:03', '2022-02-04 06:59:03'),
(133, 18, 21, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-07 11:53:46', '2022-02-07 06:23:46'),
(134, 36, 16, 0, '', 0, 0, 1, 0, 1, NULL, 0, '2022-02-18 12:45:19', '2022-02-18 07:15:19'),
(136, 18, 13, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-18 18:02:47', '2022-02-18 12:32:47'),
(137, 18, 9, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-18 18:02:57', '2022-02-18 12:32:57'),
(138, 18, 43, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-18 18:03:05', '2022-02-18 12:33:05'),
(143, 36, 27, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-19 12:11:27', '2022-02-19 06:41:27'),
(144, 18, 46, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-19 12:11:36', '2022-02-19 06:41:36'),
(146, 36, 3, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-19 12:11:55', '2022-02-19 06:41:55'),
(148, 36, 21, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-19 13:05:32', '2022-02-19 07:35:32'),
(153, 109, 57, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-23 19:14:01', '2022-02-23 13:44:01'),
(156, 109, 60, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-23 19:36:37', '2022-02-23 14:06:37'),
(157, 109, 53, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 10:25:20', '2022-02-24 04:55:20'),
(158, 109, 58, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 10:29:25', '2022-02-24 04:59:25'),
(159, 36, 57, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 11:40:21', '2022-02-24 06:10:21'),
(160, 36, 53, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 12:01:35', '2022-02-24 06:31:35'),
(161, 36, 54, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 12:22:08', '2022-02-24 06:52:08'),
(163, 36, 58, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 13:08:32', '2022-02-24 07:38:32'),
(164, 36, 60, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 13:09:03', '2022-02-24 07:39:03'),
(165, 36, 56, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-24 13:09:45', '2022-02-24 07:39:45'),
(166, 36, 62, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-25 16:58:08', '2022-02-25 11:28:08'),
(167, 36, 63, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-25 18:32:22', '2022-02-25 13:02:22'),
(168, 36, 64, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-25 18:54:32', '2022-02-25 13:24:32'),
(169, 109, 0, 0, 'Market', 1, 0, 3, 0, 0, 'IBEX35', 8500, '2022-02-26 08:31:54', '2022-02-26 03:01:54'),
(170, 109, 65, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-26 20:30:04', '2022-02-26 15:00:04'),
(171, 36, 66, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-02-28 10:24:11', '2022-02-28 04:54:11'),
(172, 109, 54, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-04 19:45:27', '2022-03-04 14:15:27'),
(173, 109, 64, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-04 19:45:35', '2022-03-04 14:15:35'),
(174, 109, 66, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-04 19:48:04', '2022-03-04 14:18:04'),
(175, 109, 62, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-04 19:50:38', '2022-03-04 14:20:38'),
(176, 36, 67, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-15 15:47:53', '2022-03-15 10:17:53'),
(177, 36, 69, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-15 16:00:56', '2022-03-15 10:30:56'),
(178, 36, 70, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-15 16:01:04', '2022-03-15 10:31:04'),
(179, 36, 68, 0, '', 900, 0, 1, 0, 0, NULL, 0, '2022-05-13 10:10:20', '2022-03-15 10:32:52'),
(180, 36, 71, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-03-15 16:05:33', '2022-03-15 10:35:33'),
(181, 109, 69, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-04-02 08:55:49', '2022-04-02 03:25:49'),
(182, 36, 72, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-13 11:51:21', '2022-05-13 06:21:21'),
(185, 36, 112, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-18 14:10:31', '2022-05-18 08:40:31'),
(186, 36, 119, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-18 14:11:26', '2022-05-18 08:41:26'),
(187, 36, 108, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-19 10:41:48', '2022-05-19 05:11:48'),
(189, 36, 109, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:37:49', '2022-05-25 12:07:49'),
(190, 36, 110, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:38:14', '2022-05-25 12:08:14'),
(191, 36, 111, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:39:02', '2022-05-25 12:09:02'),
(192, 36, 113, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:40:40', '2022-05-25 12:10:40'),
(193, 36, 114, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:41:21', '2022-05-25 12:11:21'),
(194, 36, 115, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:41:52', '2022-05-25 12:11:52'),
(195, 36, 116, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:46:36', '2022-05-25 12:16:36'),
(196, 36, 117, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:46:42', '2022-05-25 12:16:42'),
(197, 36, 118, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:46:48', '2022-05-25 12:16:48'),
(198, 36, 120, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:46:53', '2022-05-25 12:16:53'),
(199, 36, 121, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:46:59', '2022-05-25 12:16:59'),
(200, 36, 122, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:47:05', '2022-05-25 12:17:05'),
(201, 36, 123, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:47:10', '2022-05-25 12:17:10'),
(202, 36, 124, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:47:21', '2022-05-25 12:17:21'),
(203, 36, 125, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:47:27', '2022-05-25 12:17:27'),
(204, 36, 126, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:47:33', '2022-05-25 12:17:33'),
(205, 36, 127, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:47:39', '2022-05-25 12:17:39'),
(206, 36, 128, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:48:44', '2022-05-25 12:18:44'),
(207, 36, 129, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:48:51', '2022-05-25 12:18:51'),
(208, 36, 130, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:48:56', '2022-05-25 12:18:56'),
(209, 36, 131, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:49:05', '2022-05-25 12:19:05'),
(210, 36, 132, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:49:13', '2022-05-25 12:19:13'),
(211, 36, 133, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:49:20', '2022-05-25 12:19:20'),
(212, 36, 134, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:49:47', '2022-05-25 12:19:47'),
(213, 36, 135, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:49:55', '2022-05-25 12:19:55'),
(214, 36, 136, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:50:01', '2022-05-25 12:20:01'),
(215, 36, 137, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:50:09', '2022-05-25 12:20:09'),
(216, 36, 138, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-05-25 17:50:15', '2022-05-25 12:20:15'),
(217, 109, 103, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-06-15 14:04:05', '2022-06-15 08:34:05'),
(225, 36, 74, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:27:48', '2022-07-06 09:57:48'),
(226, 36, 107, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:29:10', '2022-07-06 09:59:10'),
(227, 36, 73, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:29:16', '2022-07-06 09:59:16'),
(228, 36, 75, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:29:22', '2022-07-06 09:59:22'),
(229, 36, 76, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:29:28', '2022-07-06 09:59:28'),
(230, 36, 77, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:29:34', '2022-07-06 09:59:34'),
(231, 36, 139, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:30:25', '2022-07-06 10:00:25'),
(232, 36, 80, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:30:30', '2022-07-06 10:00:30'),
(233, 36, 79, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:30:36', '2022-07-06 10:00:36'),
(234, 36, 81, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:30:42', '2022-07-06 10:00:42'),
(235, 36, 82, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:30:48', '2022-07-06 10:00:48'),
(236, 36, 83, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:30:54', '2022-07-06 10:00:54'),
(237, 36, 84, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:30:59', '2022-07-06 10:00:59'),
(238, 36, 85, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:31:04', '2022-07-06 10:01:04'),
(239, 36, 86, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:31:10', '2022-07-06 10:01:10'),
(240, 36, 87, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:31:30', '2022-07-06 10:01:30'),
(241, 36, 88, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:31:36', '2022-07-06 10:01:36'),
(242, 36, 89, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:32:01', '2022-07-06 10:02:01'),
(243, 36, 90, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:32:08', '2022-07-06 10:02:08'),
(244, 36, 91, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:32:14', '2022-07-06 10:02:14'),
(245, 36, 92, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:32:19', '2022-07-06 10:02:19'),
(246, 36, 94, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:32:24', '2022-07-06 10:02:24'),
(247, 36, 95, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:32:30', '2022-07-06 10:02:30'),
(248, 36, 96, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:32:46', '2022-07-06 10:02:46'),
(249, 36, 97, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:33:36', '2022-07-06 10:03:36'),
(250, 36, 98, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:34:14', '2022-07-06 10:04:14'),
(251, 36, 99, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:34:21', '2022-07-06 10:04:21'),
(252, 36, 100, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:35:05', '2022-07-06 10:05:05'),
(253, 36, 101, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:36:49', '2022-07-06 10:06:49'),
(254, 36, 102, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:36:56', '2022-07-06 10:06:56'),
(255, 36, 103, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:37:01', '2022-07-06 10:07:01'),
(256, 36, 104, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:37:07', '2022-07-06 10:07:07'),
(257, 36, 105, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:38:21', '2022-07-06 10:08:21'),
(258, 36, 106, 0, '', 0, 0, 1, 0, 0, NULL, 0, '2022-07-06 15:38:27', '2022-07-06 10:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_subscription_plan`
--

CREATE TABLE `tbl_user_subscription_plan` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `plan_id` int(10) NOT NULL,
  `status` int(5) DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_subscription_plan`
--

INSERT INTO `tbl_user_subscription_plan` (`id`, `user_id`, `plan_id`, `status`, `created_on`, `updated_on`) VALUES
(2, 0, 3, 0, '2019-07-05 13:32:47', '2019-07-05 13:32:47'),
(3, 21, 3, 1, '2019-07-20 16:41:42', '2020-04-06 11:09:43'),
(4, 9, 4, 0, '2020-07-09 04:28:47', '2020-07-09 04:28:47'),
(5, 24, 1, 0, '2019-07-25 16:39:14', '2019-07-25 16:39:14'),
(6, 30, 2, 0, '2019-08-30 21:31:01', '2019-09-23 15:11:49'),
(7, 1, 4, 1, '2019-09-02 12:21:39', '2020-07-04 15:23:11'),
(8, 34, 1, 0, '2019-09-16 21:04:23', '2019-09-16 21:04:23'),
(9, 33, 1, 0, '2019-09-16 21:15:29', '2019-09-16 21:15:29'),
(11, 35, 2, 1, '2019-09-20 18:08:50', '2019-09-20 18:08:50'),
(14, 36, 4, 1, '2022-02-02 04:32:09', '2022-02-02 04:32:09'),
(17, 18, 1, 1, '2021-03-20 10:24:45', '2021-03-20 10:24:45'),
(18, 37, 1, 0, '2019-09-26 20:49:25', '2019-09-26 20:49:29'),
(19, 25, 6, 1, '2019-10-07 15:42:14', '2022-02-17 10:15:51'),
(20, 27, 6, 1, '2019-10-07 16:24:31', '2021-03-10 17:54:53'),
(21, 41, 5, 1, '2019-10-07 19:01:02', '2019-10-07 19:01:02'),
(22, 44, 0, 0, '2019-10-21 16:46:38', '2019-10-21 16:46:48'),
(23, 45, 1, 1, '2019-10-21 18:18:33', '2019-10-21 18:19:36'),
(24, 46, 4, 1, '2019-10-22 15:18:18', '2020-01-24 10:20:08'),
(25, 47, 1, 0, '2019-10-23 12:47:40', '2019-10-23 12:47:51'),
(26, 49, 4, 1, '2019-10-24 11:56:40', '2019-10-25 11:53:53'),
(27, 50, 1, 1, '2019-10-24 14:52:06', '2021-04-27 12:35:13'),
(28, 51, 5, 1, '2019-10-24 15:39:08', '2019-10-24 15:39:08'),
(29, 52, 5, 1, '2019-10-29 12:00:00', '2019-10-29 12:00:00'),
(30, 54, 5, 1, '2019-11-01 12:05:10', '2019-11-01 12:05:10'),
(31, 57, 5, 1, '2019-11-05 16:12:44', '2019-11-05 16:12:44'),
(32, 58, 5, 1, '2019-11-07 12:51:14', '2019-11-07 12:51:14'),
(33, 59, 1, 0, '2019-11-11 15:59:41', '2019-11-11 15:59:55'),
(34, 60, 1, 0, '2019-11-11 16:07:11', '2019-11-11 16:07:29'),
(35, 61, 1, 0, '2019-11-27 17:24:50', '2019-11-27 17:24:50'),
(36, 62, 1, 0, '2019-11-27 18:13:09', '2019-11-27 18:13:29'),
(37, 64, 5, 1, '2019-11-28 15:10:29', '2019-11-28 15:10:29'),
(38, 65, 1, 0, '2019-11-28 15:27:57', '2019-11-28 15:29:10'),
(39, 67, 5, 1, '2019-11-28 15:39:14', '2019-11-28 15:39:14'),
(40, 69, 6, 1, '2019-12-16 10:20:14', '2019-12-16 10:20:14'),
(41, 70, 1, 0, '2020-01-10 12:34:32', '2020-01-10 12:34:42'),
(42, 72, 1, 0, '2020-01-24 09:08:43', '2020-01-24 09:08:43'),
(43, 73, 5, 1, '2020-01-27 10:34:40', '2020-01-27 10:34:40'),
(44, 74, 5, 1, '2020-01-27 10:48:43', '2020-01-27 10:48:43'),
(45, 48, 4, 1, '2020-01-28 10:17:55', '2020-01-28 10:26:10'),
(46, 77, 5, 1, '2020-01-28 10:35:12', '2020-01-28 10:35:12'),
(47, 78, 5, 1, '2020-01-28 11:14:45', '2021-04-27 17:01:55'),
(48, 79, 5, 1, '2020-01-28 11:41:50', '2020-01-28 11:41:50'),
(49, 80, 5, 1, '2020-01-28 12:34:25', '2020-01-28 12:34:25'),
(50, 81, 5, 1, '2020-01-28 12:38:12', '2020-01-28 12:38:12'),
(51, 82, 5, 1, '2020-01-28 12:46:23', '2020-01-28 12:46:23'),
(52, 83, 5, 1, '2020-01-29 08:03:14', '2020-01-29 08:03:14'),
(53, 84, 1, 0, '2020-01-29 08:05:31', '2020-01-29 08:05:31'),
(54, 85, 1, 0, '2020-01-29 11:11:39', '2020-01-29 11:11:58'),
(55, 86, 5, 1, '2020-01-29 11:28:13', '2020-01-29 11:28:13'),
(56, 53, 1, 0, '2020-01-29 12:30:09', '2020-01-29 12:30:20'),
(57, 88, 1, 0, '2020-01-30 12:12:43', '2020-01-30 12:13:33'),
(58, 40, 1, 0, '2022-02-26 11:32:14', '2022-02-20 11:33:54'),
(59, 6, 1, 0, '2020-02-26 13:14:53', '2020-02-26 14:33:06'),
(60, 90, 1, 0, '2020-04-15 11:45:24', '2020-04-15 11:45:38'),
(61, 93, 4, 1, '2020-06-26 18:27:09', '2020-06-29 14:55:02'),
(62, 94, 4, 0, '2020-06-29 05:55:14', '2020-06-29 05:55:14'),
(63, 95, 2, 0, '2020-06-29 01:02:36', '2020-06-29 01:02:36'),
(64, 97, 4, 0, '2020-08-07 12:18:31', '2020-08-07 12:18:31'),
(65, 99, 4, 0, '2020-12-02 03:35:16', '2020-12-02 03:35:16'),
(66, 100, 2, 0, '2020-12-03 10:18:06', '2020-12-03 10:18:06'),
(67, 102, 4, 0, '2020-12-03 10:57:48', '2020-12-03 10:57:48'),
(68, 105, 4, 1, '2021-02-05 11:31:11', '2021-02-05 11:31:41'),
(69, 106, 4, 1, '2021-02-05 13:12:23', '2021-02-05 13:13:17'),
(70, 107, 4, 1, '2021-02-14 19:06:42', '2021-02-14 19:07:08'),
(71, 108, 4, 1, '2021-03-09 10:36:02', '2021-03-09 10:36:55'),
(72, 109, 4, 1, '2022-04-09 10:54:32', '2022-04-22 15:01:57'),
(73, 28, 6, 1, '2021-03-15 18:42:09', '2021-03-15 18:42:09'),
(74, 110, 1, 0, '2021-04-22 19:03:34', '2021-04-22 19:03:46'),
(75, 113, 5, 1, '2021-04-27 16:48:43', '2021-04-27 16:48:43'),
(76, 115, 1, 0, '2021-05-07 17:07:02', '2021-05-07 17:07:12'),
(77, 116, 1, 1, '2021-07-19 12:54:17', '2021-07-19 13:12:45'),
(78, 117, 1, 0, '2021-07-19 13:14:09', '2021-07-19 13:14:16'),
(79, 118, 1, 0, '2022-02-07 10:05:37', '2022-02-07 10:05:55'),
(80, 120, 4, 1, '2022-02-07 14:45:56', '2022-02-07 14:49:18'),
(81, 121, 6, 1, '2022-02-22 12:33:58', '2022-02-22 12:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `users_test_question_answers`
--

CREATE TABLE `users_test_question_answers` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `q_type` int(10) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_test_question_answers`
--

INSERT INTO `users_test_question_answers` (`id`, `user_id`, `question_id`, `q_type`, `created_on`, `updated_on`) VALUES
(1, 18, 1, 0, '2019-09-06 10:19:53', '2019-09-06 10:19:53'),
(2, 18, 2, 0, '2019-09-06 10:19:53', '2019-09-06 10:19:53'),
(3, 18, 4, 0, '2019-09-06 10:19:53', '2019-09-06 10:19:53'),
(4, 18, 6, 0, '2019-09-06 10:19:53', '2019-09-06 10:19:53'),
(5, 18, 8, 0, '2019-09-06 10:19:53', '2019-09-06 10:19:53'),
(6, 18, 9, 0, '2019-09-06 10:19:53', '2019-09-06 10:19:53'),
(7, 9, 14, 0, '2019-09-06 10:26:35', '2019-09-06 10:26:35'),
(8, 9, 15, 0, '2019-09-06 10:26:35', '2019-09-06 10:26:35'),
(9, 27, 11, 0, '2019-09-06 11:18:27', '2019-09-06 11:18:27'),
(10, 25, 11, 0, '2019-10-07 16:18:15', '2019-10-07 16:18:15'),
(11, 27, 12, 0, '2019-10-07 16:30:40', '2019-10-07 16:30:40'),
(12, 27, 13, 0, '2019-10-07 16:30:40', '2019-10-07 16:30:40'),
(13, 52, 12, 0, '2019-10-29 16:23:00', '2019-10-29 16:23:00'),
(14, 52, 13, 0, '2019-10-29 16:23:00', '2019-10-29 16:23:00'),
(15, 18, 14, 0, '2019-11-08 10:57:07', '2019-11-08 10:57:07'),
(16, 18, 15, 0, '2019-11-08 10:57:07', '2019-11-08 10:57:07'),
(17, 9, 1, 0, '2019-12-16 17:55:15', '2019-12-16 17:55:15'),
(18, 9, 2, 0, '2019-12-16 17:55:15', '2019-12-16 17:55:15'),
(19, 9, 8, 0, '2019-12-16 17:55:15', '2019-12-16 17:55:15'),
(20, 25, 12, 0, '2020-05-04 11:45:47', '2020-05-04 11:45:47'),
(21, 25, 13, 0, '2020-05-04 11:45:47', '2020-05-04 11:45:47'),
(22, 36, 1, 0, '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(23, 36, 2, 0, '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(24, 36, 4, 0, '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(25, 36, 6, 0, '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(26, 36, 8, 0, '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(27, 36, 9, 0, '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(28, 36, 14, 0, '2020-06-17 07:43:29', '2020-06-17 07:43:29'),
(29, 36, 15, 0, '2020-06-17 07:43:29', '2020-06-17 07:43:29'),
(30, 1, 1, 0, '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(31, 1, 2, 0, '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(32, 1, 4, 0, '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(33, 1, 6, 0, '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(34, 1, 8, 0, '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(35, 1, 9, 0, '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(36, 1, 14, 0, '2020-07-04 15:32:39', '2020-07-04 15:32:39'),
(37, 1, 15, 0, '2020-07-04 15:32:39', '2020-07-04 15:32:39'),
(38, 227, 14, 0, '2020-07-06 16:24:43', '2020-07-06 16:24:43'),
(39, 97, 1, 0, '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(40, 97, 2, 0, '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(41, 97, 4, 0, '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(42, 97, 6, 0, '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(43, 97, 8, 0, '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(44, 97, 9, 0, '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(45, 97, 14, 0, '2020-08-07 12:24:15', '2020-08-07 12:24:15'),
(46, 97, 15, 0, '2020-08-07 12:24:15', '2020-08-07 12:24:15'),
(47, 28, 1, 0, '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(48, 28, 2, 0, '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(49, 28, 4, 0, '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(50, 28, 6, 0, '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(51, 28, 9, 0, '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(52, 103, 1, 0, '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(53, 103, 2, 0, '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(54, 103, 4, 0, '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(55, 103, 6, 0, '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(56, 103, 8, 0, '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(57, 103, 9, 0, '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(58, 103, 14, 0, '2020-12-16 13:09:15', '2020-12-16 13:09:15'),
(59, 103, 15, 0, '2020-12-16 13:09:15', '2020-12-16 13:09:15'),
(60, 107, 1, 0, '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(61, 107, 2, 0, '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(62, 107, 4, 0, '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(63, 107, 6, 0, '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(64, 107, 8, 0, '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(65, 107, 9, 0, '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(66, 107, 16, 0, '2021-02-14 19:16:08', '2021-02-14 19:16:08'),
(67, 36, 17, 0, '2021-03-12 10:22:50', '2021-03-12 10:22:50'),
(68, 36, 19, 0, '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(69, 36, 20, 0, '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(70, 36, 21, 0, '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(71, 36, 22, 0, '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(72, 25, 23, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(73, 25, 24, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(74, 25, 25, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(75, 25, 26, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(76, 25, 27, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(77, 25, 28, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(78, 25, 29, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(79, 25, 30, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(80, 25, 31, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(81, 25, 32, 0, '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(82, 36, 34, 0, '2021-03-17 17:17:23', '2021-03-17 17:17:23'),
(83, 25, 33, 0, '2021-03-17 17:17:45', '2021-03-17 17:17:45'),
(84, 25, 17, 0, '2021-03-18 14:15:56', '2021-03-18 14:15:56'),
(85, 25, 18, 0, '2021-03-18 14:15:56', '2021-03-18 14:15:56'),
(86, 25, 19, 0, '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(87, 25, 20, 0, '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(88, 25, 21, 0, '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(89, 25, 22, 0, '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(90, 25, 35, 0, '2021-05-31 18:14:49', '2021-05-31 18:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `users_test_question_options`
--

CREATE TABLE `users_test_question_options` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `options` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_test_question_options`
--

INSERT INTO `users_test_question_options` (`id`, `user_id`, `question_id`, `options`, `value`, `created_on`, `updated_on`) VALUES
(1, 18, 1, '1', '1', '2019-09-06 10:19:53', '2019-09-06 10:19:53'),
(2, 9, 14, '59', '1', '2019-09-06 10:26:35', '2019-09-06 10:26:35'),
(3, 9, 15, '61', '1', '2019-09-06 10:26:35', '2019-09-06 10:26:35'),
(4, 27, 11, '45', '1', '2019-09-06 11:18:27', '2019-09-06 11:18:27'),
(5, 25, 11, '45', '1', '2019-10-07 16:18:15', '2019-10-07 16:18:15'),
(6, 27, 12, '50', '1', '2019-10-07 16:30:40', '2019-10-07 16:30:40'),
(7, 27, 13, '55', '1', '2019-10-07 16:30:40', '2019-10-07 16:30:40'),
(8, 18, 14, '57', '1', '2019-11-08 10:57:07', '2019-11-08 10:57:07'),
(9, 9, 1, '2', '1', '2019-12-16 17:55:15', '2019-12-16 17:55:15'),
(10, 9, 2, '5', '1', '2019-12-16 17:55:15', '2019-12-16 17:55:15'),
(11, 9, 8, '29', '1', '2019-12-16 17:55:15', '2019-12-16 17:55:15'),
(12, 25, 12, '49', '1', '2020-05-04 11:45:47', '2020-05-04 11:45:47'),
(13, 25, 13, '55', '1', '2020-05-04 11:45:47', '2020-05-04 11:45:47'),
(14, 36, 1, '1', '1', '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(15, 36, 2, '7', '1', '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(16, 36, 4, '13', '1', '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(17, 36, 6, '22', '1', '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(18, 36, 8, '30', '1', '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(19, 36, 9, '34', '1', '2020-06-09 17:54:00', '2020-06-09 17:54:00'),
(20, 36, 14, '57', '1', '2020-06-17 07:43:29', '2020-06-17 07:43:29'),
(21, 36, 15, '63', '1', '2020-06-17 07:43:29', '2020-06-17 07:43:29'),
(22, 1, 1, '1', '1', '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(23, 1, 2, '5', '1', '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(24, 1, 4, '13', '1', '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(25, 1, 8, '32', '1', '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(26, 1, 9, '34', '1', '2020-07-04 15:30:22', '2020-07-04 15:30:22'),
(27, 1, 14, '57', '1', '2020-07-04 15:32:39', '2020-07-04 15:32:39'),
(28, 1, 15, '64', '1', '2020-07-04 15:32:39', '2020-07-04 15:32:39'),
(29, 227, 14, '59', '1', '2020-07-06 16:24:43', '2020-07-06 16:24:43'),
(30, 97, 1, '2', '1', '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(31, 97, 2, '6', '1', '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(32, 97, 4, '14', '1', '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(33, 97, 6, '22', '1', '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(34, 97, 8, '30', '1', '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(35, 97, 9, '34', '1', '2020-08-07 12:22:59', '2020-08-07 12:22:59'),
(36, 97, 14, '59', '1', '2020-08-07 12:24:15', '2020-08-07 12:24:15'),
(37, 97, 15, '62', '1', '2020-08-07 12:24:15', '2020-08-07 12:24:15'),
(38, 28, 1, '4', '1', '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(39, 28, 2, '5', '1', '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(40, 28, 4, '16', '1', '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(41, 28, 6, '24', '1', '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(42, 28, 9, '33', '1', '2020-11-24 17:09:06', '2020-11-24 17:09:06'),
(43, 103, 1, '3', '1', '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(44, 103, 2, '8', '1', '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(45, 103, 4, '16', '1', '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(46, 103, 6, '23', '1', '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(47, 103, 8, '30', '1', '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(48, 103, 9, '35', '1', '2020-12-16 13:08:31', '2020-12-16 13:08:31'),
(49, 103, 14, '58', '1', '2020-12-16 13:09:15', '2020-12-16 13:09:15'),
(50, 103, 15, '62', '1', '2020-12-16 13:09:15', '2020-12-16 13:09:15'),
(51, 107, 1, '2', '1', '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(52, 107, 2, '8', '1', '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(53, 107, 4, '16', '1', '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(54, 107, 6, '23', '1', '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(55, 107, 8, '30', '1', '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(56, 107, 9, '33', '1', '2021-02-14 19:11:42', '2021-02-14 19:11:42'),
(57, 107, 16, '67', '1', '2021-02-14 19:16:08', '2021-02-14 19:16:08'),
(58, 36, 17, '71', '1', '2021-03-12 10:22:50', '2021-03-12 10:22:50'),
(59, 36, 19, '78', '1', '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(60, 36, 20, '82', '1', '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(61, 36, 21, '88', '1', '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(62, 36, 22, '89', '1', '2021-03-12 10:31:31', '2021-03-12 10:31:31'),
(63, 25, 23, '93', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(64, 25, 24, '97', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(65, 25, 25, '102', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(66, 25, 26, '108', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(67, 25, 27, '112', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(68, 25, 28, '113', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(69, 25, 29, '117', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(70, 25, 30, '122', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(71, 25, 31, '125', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(72, 25, 32, '129', '1', '2021-03-12 10:47:08', '2021-03-12 10:47:08'),
(73, 36, 34, '137', '1', '2021-03-17 17:17:23', '2021-03-17 17:17:23'),
(74, 25, 33, '133', '1', '2021-03-17 17:17:45', '2021-03-17 17:17:45'),
(75, 25, 17, '71', '1', '2021-03-18 14:15:56', '2021-03-18 14:15:56'),
(76, 25, 18, '73', '1', '2021-03-18 14:15:56', '2021-03-18 14:15:56'),
(77, 25, 19, '78', '1', '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(78, 25, 20, '82', '1', '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(79, 25, 21, '88', '1', '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(80, 25, 22, '89', '1', '2021-03-18 14:16:26', '2021-03-18 14:16:26'),
(81, 25, 35, '141', '1', '2021-05-31 18:14:49', '2021-05-31 18:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_question_answer`
--

CREATE TABLE `user_question_answer` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `q_type` int(10) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_question_answer`
--

INSERT INTO `user_question_answer` (`id`, `user_id`, `question_id`, `q_type`, `created_on`, `updated_on`) VALUES
(1, 9, 2, 1, '2019-07-17 09:58:59', '2019-07-17 09:58:59'),
(2, 9, 8, 2, '2019-07-17 09:58:59', '2019-07-17 09:58:59'),
(3, 9, 9, 3, '2019-07-17 09:58:59', '2019-07-17 09:58:59'),
(4, 9, 11, 4, '2019-07-17 09:58:59', '2019-07-17 09:58:59'),
(5, 9, 12, 5, '2019-07-17 09:58:59', '2019-07-17 09:58:59'),
(6, 9, 32, 5, '2019-07-17 09:58:59', '2019-07-17 09:58:59'),
(7, 9, 3, 1, '2019-07-17 09:59:21', '2019-07-17 09:59:21'),
(8, 9, 4, 2, '2019-07-17 09:59:21', '2019-07-17 09:59:21'),
(9, 9, 5, 3, '2019-07-17 09:59:21', '2019-07-17 09:59:21'),
(10, 9, 6, 4, '2019-07-17 09:59:21', '2019-07-17 09:59:21'),
(11, 9, 14, 5, '2019-07-17 09:59:21', '2019-07-17 09:59:21'),
(12, 9, 15, 1, '2019-07-17 09:59:42', '2019-07-17 09:59:42'),
(13, 9, 16, 2, '2019-07-17 09:59:42', '2019-07-17 09:59:42'),
(14, 9, 18, 3, '2019-07-17 09:59:42', '2019-07-17 09:59:42'),
(15, 9, 19, 4, '2019-07-17 09:59:42', '2019-07-17 09:59:42'),
(16, 9, 20, 5, '2019-07-17 09:59:42', '2019-07-17 09:59:42'),
(17, 9, 7, 1, '2019-07-17 09:59:59', '2019-07-17 09:59:59'),
(18, 9, 24, 2, '2019-07-17 09:59:59', '2019-07-17 09:59:59'),
(19, 9, 25, 3, '2019-07-17 09:59:59', '2019-07-17 09:59:59'),
(20, 9, 26, 4, '2019-07-17 09:59:59', '2019-07-17 09:59:59'),
(21, 9, 27, 5, '2019-07-17 09:59:59', '2019-07-17 09:59:59'),
(22, 21, 2, 0, '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(23, 21, 8, 0, '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(24, 21, 9, 0, '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(25, 21, 11, 0, '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(26, 21, 12, 0, '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(27, 21, 3, 0, '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(28, 21, 4, 0, '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(29, 21, 5, 0, '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(30, 21, 6, 0, '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(31, 21, 14, 0, '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(32, 21, 15, 0, '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(33, 21, 16, 0, '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(34, 21, 18, 0, '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(35, 21, 19, 0, '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(36, 21, 20, 0, '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(37, 21, 7, 0, '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(38, 21, 24, 0, '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(39, 21, 25, 0, '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(40, 21, 26, 0, '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(41, 21, 27, 0, '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(42, 22, 2, 1, '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(43, 22, 8, 2, '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(44, 22, 9, 3, '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(45, 22, 11, 4, '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(46, 22, 12, 5, '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(47, 22, 3, 1, '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(48, 22, 4, 2, '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(49, 22, 5, 3, '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(50, 22, 6, 4, '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(51, 22, 15, 1, '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(52, 22, 16, 2, '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(53, 22, 18, 3, '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(54, 22, 19, 4, '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(55, 22, 7, 1, '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(56, 22, 24, 2, '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(57, 22, 25, 3, '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(58, 22, 26, 4, '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(59, 23, 2, 1, '2019-07-22 10:31:41', '2019-07-22 10:31:41'),
(60, 23, 8, 2, '2019-07-22 10:31:41', '2019-07-22 10:31:41'),
(61, 23, 9, 3, '2019-07-22 10:31:41', '2019-07-22 10:31:41'),
(62, 23, 11, 4, '2019-07-22 10:31:41', '2019-07-22 10:31:41'),
(63, 23, 12, 5, '2019-07-22 10:31:41', '2019-07-22 10:31:41'),
(64, 23, 3, 1, '2019-07-22 10:32:24', '2019-07-22 10:32:24'),
(65, 23, 4, 2, '2019-07-22 10:32:24', '2019-07-22 10:32:24'),
(66, 23, 5, 3, '2019-07-22 10:32:24', '2019-07-22 10:32:24'),
(67, 23, 6, 4, '2019-07-22 10:32:24', '2019-07-22 10:32:24'),
(68, 23, 14, 5, '2019-07-22 10:32:24', '2019-07-22 10:32:24'),
(69, 23, 15, 1, '2019-07-22 10:32:46', '2019-07-22 10:32:46'),
(70, 23, 16, 2, '2019-07-22 10:32:46', '2019-07-22 10:32:46'),
(71, 23, 18, 3, '2019-07-22 10:32:46', '2019-07-22 10:32:46'),
(72, 23, 19, 4, '2019-07-22 10:32:46', '2019-07-22 10:32:46'),
(73, 23, 20, 5, '2019-07-22 10:32:46', '2019-07-22 10:32:46'),
(74, 23, 7, 1, '2019-07-22 10:33:18', '2019-07-22 10:33:18'),
(75, 23, 24, 2, '2019-07-22 10:33:18', '2019-07-22 10:33:18'),
(76, 23, 25, 3, '2019-07-22 10:33:18', '2019-07-22 10:33:18'),
(77, 23, 26, 4, '2019-07-22 10:33:18', '2019-07-22 10:33:18'),
(78, 23, 27, 5, '2019-07-22 10:33:18', '2019-07-22 10:33:18'),
(79, 24, 2, 1, '2019-07-22 16:58:02', '2019-07-22 16:58:02'),
(80, 24, 8, 2, '2019-07-22 16:58:02', '2019-07-22 16:58:02'),
(81, 24, 9, 3, '2019-07-22 16:58:02', '2019-07-22 16:58:02'),
(82, 24, 3, 1, '2019-07-22 16:58:13', '2019-07-22 16:58:13'),
(83, 24, 4, 2, '2019-07-22 16:58:13', '2019-07-22 16:58:13'),
(84, 24, 15, 1, '2019-07-22 16:58:27', '2019-07-22 16:58:27'),
(85, 24, 16, 2, '2019-07-22 16:58:27', '2019-07-22 16:58:27'),
(86, 24, 18, 3, '2019-07-22 16:58:27', '2019-07-22 16:58:27'),
(87, 24, 7, 1, '2019-07-22 16:58:45', '2019-07-22 16:58:45'),
(88, 24, 24, 2, '2019-07-22 16:58:45', '2019-07-22 16:58:45'),
(89, 24, 11, 0, '2019-07-25 16:40:50', '2019-07-25 16:40:50'),
(90, 24, 12, 0, '2019-07-25 16:40:50', '2019-07-25 16:40:50'),
(91, 24, 5, 0, '2019-07-25 16:40:55', '2019-07-25 16:40:55'),
(92, 24, 6, 0, '2019-07-25 16:40:55', '2019-07-25 16:40:55'),
(93, 24, 14, 0, '2019-07-25 16:40:55', '2019-07-25 16:40:55'),
(94, 24, 19, 0, '2019-07-25 16:40:59', '2019-07-25 16:40:59'),
(95, 24, 20, 0, '2019-07-25 16:40:59', '2019-07-25 16:40:59'),
(96, 24, 25, 0, '2019-07-25 16:41:04', '2019-07-25 16:41:04'),
(97, 24, 26, 0, '2019-07-25 16:41:04', '2019-07-25 16:41:04'),
(98, 24, 27, 0, '2019-07-25 16:41:04', '2019-07-25 16:41:04'),
(99, 18, 2, 1, '2019-07-26 16:43:29', '2019-07-26 16:43:29'),
(100, 18, 8, 2, '2019-07-26 16:43:29', '2019-07-26 16:43:29'),
(101, 18, 3, 1, '2019-07-26 16:43:37', '2019-07-26 16:43:37'),
(102, 18, 4, 2, '2019-07-26 16:43:37', '2019-07-26 16:43:37'),
(103, 18, 24, 2, '2019-07-26 16:43:50', '2019-07-26 16:43:50'),
(104, 18, 9, 0, '2019-07-26 18:16:01', '2019-07-26 18:16:01'),
(105, 18, 11, 0, '2019-07-26 18:16:01', '2019-07-26 18:16:01'),
(106, 18, 12, 0, '2019-07-26 18:16:01', '2019-07-26 18:16:01'),
(107, 18, 5, 0, '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(108, 18, 6, 0, '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(109, 18, 14, 0, '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(110, 18, 15, 0, '2019-07-26 18:17:53', '2019-07-26 18:17:53'),
(111, 18, 16, 0, '2019-07-26 18:17:53', '2019-07-26 18:17:53'),
(112, 18, 18, 0, '2019-07-26 18:17:53', '2019-07-26 18:17:53'),
(113, 18, 19, 0, '2019-07-26 18:17:53', '2019-07-26 18:17:53'),
(114, 18, 20, 0, '2019-07-26 18:17:53', '2019-07-26 18:17:53'),
(115, 18, 7, 0, '2019-07-26 18:18:12', '2019-07-26 18:18:12'),
(116, 18, 25, 0, '2019-07-26 18:18:12', '2019-07-26 18:18:12'),
(117, 18, 26, 0, '2019-07-26 18:18:12', '2019-07-26 18:18:12'),
(118, 18, 27, 0, '2019-07-26 18:18:12', '2019-07-26 18:18:12'),
(119, 30, 2, 1, '2019-08-30 20:45:23', '2019-08-30 20:45:23'),
(120, 30, 8, 2, '2019-08-30 20:45:23', '2019-08-30 20:45:23'),
(121, 30, 9, 3, '2019-08-30 20:45:23', '2019-08-30 20:45:23'),
(122, 30, 11, 4, '2019-08-30 20:45:23', '2019-08-30 20:45:23'),
(123, 30, 3, 1, '2019-08-30 20:45:42', '2019-08-30 20:45:42'),
(124, 30, 4, 2, '2019-08-30 20:45:42', '2019-08-30 20:45:42'),
(125, 30, 5, 3, '2019-08-30 20:45:42', '2019-08-30 20:45:42'),
(126, 30, 15, 1, '2019-08-30 20:46:00', '2019-08-30 20:46:00'),
(127, 30, 16, 2, '2019-08-30 20:46:00', '2019-08-30 20:46:00'),
(128, 30, 18, 3, '2019-08-30 20:46:00', '2019-08-30 20:46:00'),
(129, 30, 12, 0, '2019-08-30 21:31:39', '2019-08-30 21:31:39'),
(130, 30, 7, 0, '2019-08-30 21:32:11', '2019-08-30 21:32:11'),
(131, 30, 24, 0, '2019-08-30 21:32:11', '2019-08-30 21:32:11'),
(132, 30, 25, 0, '2019-08-30 21:32:11', '2019-08-30 21:32:11'),
(133, 30, 26, 0, '2019-08-30 21:32:11', '2019-08-30 21:32:11'),
(134, 30, 27, 0, '2019-08-30 21:32:11', '2019-08-30 21:32:11'),
(135, 1, 2, 0, '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(136, 1, 8, 0, '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(137, 1, 9, 0, '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(138, 1, 11, 0, '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(139, 1, 12, 0, '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(140, 1, 3, 0, '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(141, 1, 4, 0, '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(142, 1, 5, 0, '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(143, 1, 6, 0, '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(144, 1, 14, 0, '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(145, 1, 15, 0, '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(146, 1, 16, 0, '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(147, 1, 18, 0, '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(148, 1, 19, 0, '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(149, 1, 20, 0, '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(150, 1, 7, 0, '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(151, 1, 24, 0, '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(152, 1, 25, 0, '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(153, 1, 26, 0, '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(154, 1, 27, 0, '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(155, 30, 6, 0, '2019-09-14 06:30:10', '2019-09-14 06:30:10'),
(156, 30, 19, 0, '2019-09-14 06:30:28', '2019-09-14 06:30:28'),
(157, 33, 8, 1, '2019-09-16 20:48:28', '2019-09-16 20:48:28'),
(158, 33, 2, 3, '2019-09-16 20:48:28', '2019-09-16 20:48:28'),
(159, 33, 9, 3, '2019-09-16 20:48:28', '2019-09-16 20:48:28'),
(160, 33, 11, 4, '2019-09-16 20:48:28', '2019-09-16 20:48:28'),
(161, 33, 12, 5, '2019-09-16 20:48:28', '2019-09-16 20:48:28'),
(162, 33, 3, 1, '2019-09-16 20:49:20', '2019-09-16 20:49:20'),
(163, 33, 6, 1, '2019-09-16 20:49:20', '2019-09-16 20:49:20'),
(164, 33, 15, 1, '2019-09-16 20:49:55', '2019-09-16 20:49:55'),
(165, 33, 16, 1, '2019-09-16 20:49:55', '2019-09-16 20:49:55'),
(166, 33, 19, 1, '2019-09-16 20:49:55', '2019-09-16 20:49:55'),
(167, 33, 18, 1, '2019-09-16 20:50:17', '2019-09-16 20:50:17'),
(168, 33, 25, 1, '2019-09-16 20:50:17', '2019-09-16 20:50:17'),
(169, 33, 4, 0, '2019-09-16 21:15:44', '2019-09-16 21:15:44'),
(170, 9, 28, 5, '2019-09-17 17:32:15', '2019-09-17 17:32:15'),
(171, 18, 29, 0, '2019-09-17 18:25:41', '2019-09-17 18:25:41'),
(172, 18, 30, 0, '2019-09-17 18:25:41', '2019-09-17 18:25:41'),
(173, 18, 31, 0, '2019-09-17 18:25:41', '2019-09-17 18:25:41'),
(174, 9, 33, 1, '2019-09-19 16:56:20', '2019-09-19 16:56:20'),
(175, 9, 34, 4, '2019-09-19 16:56:20', '2019-09-19 16:56:20'),
(176, 18, 32, 0, '2019-09-19 18:44:44', '2019-09-19 18:44:44'),
(177, 18, 33, 0, '2019-09-19 18:44:44', '2019-09-19 18:44:44'),
(178, 18, 34, 0, '2019-09-19 18:44:44', '2019-09-19 18:44:44'),
(179, 18, 35, 0, '2019-09-19 18:44:44', '2019-09-19 18:44:44'),
(180, 18, 36, 0, '2019-09-19 18:44:58', '2019-09-19 18:44:58'),
(181, 18, 37, 0, '2019-09-19 18:44:58', '2019-09-19 18:44:58'),
(182, 18, 43, 0, '2019-09-19 18:44:58', '2019-09-19 18:44:58'),
(183, 18, 38, 0, '2019-09-19 18:45:07', '2019-09-19 18:45:07'),
(184, 18, 39, 0, '2019-09-19 18:45:07', '2019-09-19 18:45:07'),
(185, 18, 40, 0, '2019-09-19 18:45:07', '2019-09-19 18:45:07'),
(186, 18, 41, 0, '2019-09-19 18:45:13', '2019-09-19 18:45:13'),
(187, 18, 42, 0, '2019-09-19 18:45:13', '2019-09-19 18:45:13'),
(188, 30, 32, 3, '2019-09-19 19:24:55', '2019-09-19 19:24:55'),
(189, 30, 33, 3, '2019-09-19 19:24:55', '2019-09-19 19:24:55'),
(190, 35, 32, 0, '2019-09-20 18:10:19', '2019-09-20 18:10:19'),
(191, 35, 33, 0, '2019-09-20 18:10:19', '2019-09-20 18:10:19'),
(192, 35, 34, 0, '2019-09-20 18:10:19', '2019-09-20 18:10:19'),
(193, 35, 35, 0, '2019-09-20 18:10:19', '2019-09-20 18:10:19'),
(194, 35, 36, 0, '2019-09-20 18:10:40', '2019-09-20 18:10:40'),
(195, 35, 37, 0, '2019-09-20 18:10:40', '2019-09-20 18:10:40'),
(196, 35, 43, 0, '2019-09-20 18:10:40', '2019-09-20 18:10:40'),
(197, 35, 38, 0, '2019-09-20 18:10:59', '2019-09-20 18:10:59'),
(198, 35, 39, 0, '2019-09-20 18:10:59', '2019-09-20 18:10:59'),
(199, 35, 40, 0, '2019-09-20 18:10:59', '2019-09-20 18:10:59'),
(200, 35, 41, 0, '2019-09-20 18:11:04', '2019-09-20 18:11:04'),
(201, 35, 42, 0, '2019-09-20 18:11:04', '2019-09-20 18:11:04'),
(202, 30, 34, 0, '2019-09-21 21:22:42', '2019-09-21 21:22:42'),
(203, 30, 35, 0, '2019-09-21 21:22:42', '2019-09-21 21:22:42'),
(204, 36, 32, 0, '2019-09-23 13:01:46', '2019-09-23 13:01:46'),
(205, 36, 33, 0, '2019-09-23 13:01:46', '2019-09-23 13:01:46'),
(206, 36, 34, 0, '2019-09-23 13:01:46', '2019-09-23 13:01:46'),
(207, 36, 35, 0, '2019-09-23 13:01:46', '2019-09-23 13:01:46'),
(208, 36, 36, 0, '2019-09-23 13:01:54', '2019-09-23 13:01:54'),
(209, 36, 37, 0, '2019-09-23 13:01:54', '2019-09-23 13:01:54'),
(210, 36, 43, 0, '2019-09-23 13:01:54', '2019-09-23 13:01:54'),
(211, 36, 38, 0, '2019-09-23 13:02:00', '2019-09-23 13:02:00'),
(212, 36, 39, 0, '2019-09-23 13:02:00', '2019-09-23 13:02:00'),
(213, 36, 40, 0, '2019-09-23 13:02:00', '2019-09-23 13:02:00'),
(214, 36, 41, 0, '2019-09-23 13:02:07', '2019-09-23 13:02:07'),
(215, 36, 42, 0, '2019-09-23 13:02:07', '2019-09-23 13:02:07'),
(216, 30, 36, 0, '2019-09-23 15:12:45', '2019-09-23 15:12:45'),
(217, 30, 37, 0, '2019-09-23 15:12:45', '2019-09-23 15:12:45'),
(218, 30, 43, 0, '2019-09-23 15:12:45', '2019-09-23 15:12:45'),
(219, 30, 38, 0, '2019-09-23 15:13:02', '2019-09-23 15:13:02'),
(220, 30, 39, 0, '2019-09-23 15:13:02', '2019-09-23 15:13:02'),
(221, 30, 40, 0, '2019-09-23 15:13:02', '2019-09-23 15:13:02'),
(222, 30, 41, 0, '2019-09-23 15:13:10', '2019-09-23 15:13:10'),
(223, 30, 42, 0, '2019-09-23 15:13:10', '2019-09-23 15:13:10'),
(224, 9, 35, 5, '2019-09-23 18:58:06', '2019-09-23 18:58:06'),
(225, 37, 32, 0, '2019-09-23 20:58:25', '2019-09-23 20:58:25'),
(226, 37, 33, 0, '2019-09-23 20:58:25', '2019-09-23 20:58:25'),
(227, 37, 34, 0, '2019-09-23 20:58:25', '2019-09-23 20:58:25'),
(228, 37, 35, 0, '2019-09-23 20:58:25', '2019-09-23 20:58:25'),
(229, 37, 36, 0, '2019-09-23 20:58:28', '2019-09-23 20:58:28'),
(230, 37, 37, 0, '2019-09-23 20:58:28', '2019-09-23 20:58:28'),
(231, 37, 43, 0, '2019-09-23 20:58:28', '2019-09-23 20:58:28'),
(232, 37, 38, 0, '2019-09-23 20:58:32', '2019-09-23 20:58:32'),
(233, 37, 39, 0, '2019-09-23 20:58:32', '2019-09-23 20:58:32'),
(234, 37, 40, 0, '2019-09-23 20:58:32', '2019-09-23 20:58:32'),
(235, 37, 41, 0, '2019-09-23 20:58:35', '2019-09-23 20:58:35'),
(236, 37, 42, 0, '2019-09-23 20:58:35', '2019-09-23 20:58:35'),
(237, 9, 41, 0, '2019-09-25 14:51:15', '2019-09-25 14:51:15'),
(238, 9, 42, 0, '2019-09-25 14:51:15', '2019-09-25 14:51:15'),
(239, 9, 36, 0, '2019-09-25 14:51:53', '2019-09-25 14:51:53'),
(240, 9, 37, 0, '2019-09-25 14:51:53', '2019-09-25 14:51:53'),
(241, 9, 43, 0, '2019-09-25 14:51:53', '2019-09-25 14:51:53'),
(242, 9, 38, 0, '2019-09-25 14:52:00', '2019-09-25 14:52:00'),
(243, 9, 39, 0, '2019-09-25 14:52:00', '2019-09-25 14:52:00'),
(244, 9, 40, 0, '2019-09-25 14:52:00', '2019-09-25 14:52:00'),
(245, 40, 32, 3, '2019-09-28 13:47:44', '2019-09-28 13:47:44'),
(246, 40, 33, 3, '2019-09-28 13:47:44', '2019-09-28 13:47:44'),
(247, 40, 36, 1, '2019-09-28 13:48:07', '2019-09-28 13:48:07'),
(248, 40, 37, 1, '2019-09-28 13:48:07', '2019-09-28 13:48:07'),
(249, 40, 43, 1, '2019-09-28 13:48:07', '2019-09-28 13:48:07'),
(250, 40, 38, 1, '2019-09-28 13:48:20', '2019-09-28 13:48:20'),
(251, 40, 39, 1, '2019-09-28 13:48:20', '2019-09-28 13:48:20'),
(252, 40, 40, 1, '2019-09-28 13:48:20', '2019-09-28 13:48:20'),
(253, 40, 41, 1, '2019-09-28 13:48:32', '2019-09-28 13:48:32'),
(254, 40, 42, 1, '2019-09-28 13:48:32', '2019-09-28 13:48:32'),
(255, 40, 34, 4, '2019-09-28 13:54:09', '2019-09-28 13:54:09'),
(256, 40, 35, 5, '2019-09-28 13:54:09', '2019-09-28 13:54:09'),
(257, 43, 32, 3, '2019-10-15 19:48:23', '2019-10-15 19:48:23'),
(258, 43, 33, 3, '2019-10-15 19:48:23', '2019-10-15 19:48:23'),
(259, 43, 34, 4, '2019-10-15 19:48:23', '2019-10-15 19:48:23'),
(260, 43, 35, 5, '2019-10-15 19:48:23', '2019-10-15 19:48:23'),
(261, 43, 36, 1, '2019-10-15 19:48:36', '2019-10-15 19:48:36'),
(262, 43, 37, 1, '2019-10-15 19:48:36', '2019-10-15 19:48:36'),
(263, 43, 43, 1, '2019-10-15 19:48:36', '2019-10-15 19:48:36'),
(264, 43, 38, 1, '2019-10-15 19:48:48', '2019-10-15 19:48:48'),
(265, 43, 39, 1, '2019-10-15 19:48:48', '2019-10-15 19:48:48'),
(266, 43, 40, 1, '2019-10-15 19:48:48', '2019-10-15 19:48:48'),
(267, 43, 41, 1, '2019-10-15 19:48:56', '2019-10-15 19:48:56'),
(268, 43, 42, 1, '2019-10-15 19:48:56', '2019-10-15 19:48:56'),
(269, 44, 32, 0, '2019-10-21 16:47:18', '2019-10-21 16:47:18'),
(270, 44, 33, 0, '2019-10-21 16:47:18', '2019-10-21 16:47:18'),
(271, 44, 34, 0, '2019-10-21 16:47:18', '2019-10-21 16:47:18'),
(272, 44, 35, 0, '2019-10-21 16:47:18', '2019-10-21 16:47:18'),
(273, 44, 36, 0, '2019-10-21 16:47:35', '2019-10-21 16:47:35'),
(274, 44, 37, 0, '2019-10-21 16:47:35', '2019-10-21 16:47:35'),
(275, 44, 43, 0, '2019-10-21 16:47:35', '2019-10-21 16:47:35'),
(276, 44, 38, 0, '2019-10-21 16:47:48', '2019-10-21 16:47:48'),
(277, 44, 39, 0, '2019-10-21 16:47:48', '2019-10-21 16:47:48'),
(278, 44, 40, 0, '2019-10-21 16:47:48', '2019-10-21 16:47:48'),
(279, 44, 41, 0, '2019-10-21 16:47:56', '2019-10-21 16:47:56'),
(280, 44, 42, 0, '2019-10-21 16:47:56', '2019-10-21 16:47:56'),
(281, 45, 32, 0, '2019-10-21 18:20:56', '2019-10-21 18:20:56'),
(282, 45, 33, 0, '2019-10-21 18:20:56', '2019-10-21 18:20:56'),
(283, 45, 34, 0, '2019-10-21 18:20:56', '2019-10-21 18:20:56'),
(284, 45, 35, 0, '2019-10-21 18:20:56', '2019-10-21 18:20:56'),
(285, 45, 36, 0, '2019-10-21 18:29:51', '2019-10-21 18:29:51'),
(286, 45, 37, 0, '2019-10-21 18:29:51', '2019-10-21 18:29:51'),
(287, 45, 43, 0, '2019-10-21 18:29:51', '2019-10-21 18:29:51'),
(288, 45, 38, 0, '2019-10-21 18:30:21', '2019-10-21 18:30:21'),
(289, 45, 39, 0, '2019-10-21 18:30:21', '2019-10-21 18:30:21'),
(290, 45, 40, 0, '2019-10-21 18:30:21', '2019-10-21 18:30:21'),
(291, 45, 41, 0, '2019-10-21 18:30:35', '2019-10-21 18:30:35'),
(292, 45, 42, 0, '2019-10-21 18:30:35', '2019-10-21 18:30:35'),
(293, 46, 35, 5, '2019-10-22 15:14:25', '2019-10-22 15:14:25'),
(294, 46, 34, 4, '2019-10-22 15:15:08', '2019-10-22 15:15:08'),
(295, 46, 32, 3, '2019-10-22 15:15:20', '2019-10-22 15:15:20'),
(296, 46, 33, 0, '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(297, 46, 36, 0, '2019-10-22 15:18:37', '2019-10-22 15:18:37'),
(298, 46, 37, 0, '2019-10-22 15:18:37', '2019-10-22 15:18:37'),
(299, 46, 43, 0, '2019-10-22 15:18:37', '2019-10-22 15:18:37'),
(300, 46, 38, 0, '2019-10-22 15:18:42', '2019-10-22 15:18:42'),
(301, 46, 39, 0, '2019-10-22 15:18:42', '2019-10-22 15:18:42'),
(302, 46, 40, 0, '2019-10-22 15:18:42', '2019-10-22 15:18:42'),
(303, 46, 41, 0, '2019-10-22 15:18:46', '2019-10-22 15:18:46'),
(304, 46, 42, 0, '2019-10-22 15:18:46', '2019-10-22 15:18:46'),
(305, 47, 32, 0, '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(306, 47, 33, 0, '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(307, 47, 34, 0, '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(308, 47, 35, 0, '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(309, 47, 36, 0, '2019-10-23 12:49:31', '2019-10-23 12:49:31'),
(310, 47, 37, 0, '2019-10-23 12:49:31', '2019-10-23 12:49:31'),
(311, 47, 43, 0, '2019-10-23 12:49:31', '2019-10-23 12:49:31'),
(312, 47, 38, 0, '2019-10-23 12:49:48', '2019-10-23 12:49:48'),
(313, 47, 39, 0, '2019-10-23 12:49:48', '2019-10-23 12:49:48'),
(314, 47, 40, 0, '2019-10-23 12:49:48', '2019-10-23 12:49:48'),
(315, 47, 41, 0, '2019-10-23 12:50:01', '2019-10-23 12:50:01'),
(316, 47, 42, 0, '2019-10-23 12:50:01', '2019-10-23 12:50:01'),
(317, 49, 41, 0, '2019-10-24 12:30:24', '2019-10-24 12:30:24'),
(318, 49, 42, 0, '2019-10-24 12:30:24', '2019-10-24 12:30:24'),
(319, 50, 32, 0, '2019-10-24 14:53:26', '2019-10-24 14:53:26'),
(320, 50, 33, 0, '2019-10-24 14:53:26', '2019-10-24 14:53:26'),
(321, 50, 34, 0, '2019-10-24 14:53:26', '2019-10-24 14:53:26'),
(322, 50, 35, 0, '2019-10-24 14:53:26', '2019-10-24 14:53:26'),
(323, 50, 41, 0, '2019-10-24 14:54:53', '2019-10-24 14:54:53'),
(324, 50, 42, 0, '2019-10-24 14:54:53', '2019-10-24 14:54:53'),
(325, 50, 36, 0, '2019-10-30 14:28:23', '2019-10-30 14:28:23'),
(326, 50, 37, 0, '2019-10-30 14:28:23', '2019-10-30 14:28:23'),
(327, 50, 43, 0, '2019-10-30 14:28:23', '2019-10-30 14:28:23'),
(328, 50, 38, 0, '2019-10-30 14:28:31', '2019-10-30 14:28:31'),
(329, 50, 39, 0, '2019-10-30 14:28:31', '2019-10-30 14:28:31'),
(330, 50, 40, 0, '2019-10-30 14:28:31', '2019-10-30 14:28:31'),
(331, 59, 32, 0, '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(332, 59, 33, 0, '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(333, 59, 34, 0, '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(334, 59, 35, 0, '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(335, 59, 36, 0, '2019-11-11 16:00:18', '2019-11-11 16:00:18'),
(336, 59, 37, 0, '2019-11-11 16:00:18', '2019-11-11 16:00:18'),
(337, 59, 43, 0, '2019-11-11 16:00:18', '2019-11-11 16:00:18'),
(338, 59, 38, 0, '2019-11-11 16:00:27', '2019-11-11 16:00:27'),
(339, 59, 39, 0, '2019-11-11 16:00:27', '2019-11-11 16:00:27'),
(340, 59, 40, 0, '2019-11-11 16:00:27', '2019-11-11 16:00:27'),
(341, 59, 41, 0, '2019-11-11 16:00:30', '2019-11-11 16:00:30'),
(342, 59, 42, 0, '2019-11-11 16:00:30', '2019-11-11 16:00:30'),
(343, 60, 32, 0, '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(344, 60, 33, 0, '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(345, 60, 34, 0, '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(346, 60, 35, 0, '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(347, 60, 36, 0, '2019-11-11 16:07:49', '2019-11-11 16:07:49'),
(348, 60, 37, 0, '2019-11-11 16:07:49', '2019-11-11 16:07:49'),
(349, 60, 43, 0, '2019-11-11 16:07:49', '2019-11-11 16:07:49'),
(350, 60, 38, 0, '2019-11-11 16:07:57', '2019-11-11 16:07:57'),
(351, 60, 39, 0, '2019-11-11 16:07:57', '2019-11-11 16:07:57'),
(352, 60, 40, 0, '2019-11-11 16:07:57', '2019-11-11 16:07:57'),
(353, 60, 41, 0, '2019-11-11 16:08:02', '2019-11-11 16:08:02'),
(354, 60, 42, 0, '2019-11-11 16:08:02', '2019-11-11 16:08:02'),
(355, 61, 41, 0, '2019-11-27 17:27:27', '2019-11-27 17:27:27'),
(356, 61, 42, 0, '2019-11-27 17:27:27', '2019-11-27 17:27:27'),
(357, 62, 32, 0, '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(358, 62, 33, 0, '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(359, 62, 34, 0, '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(360, 62, 35, 0, '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(361, 62, 36, 0, '2019-11-27 18:13:50', '2019-11-27 18:13:50'),
(362, 62, 37, 0, '2019-11-27 18:13:50', '2019-11-27 18:13:50'),
(363, 62, 43, 0, '2019-11-27 18:13:50', '2019-11-27 18:13:50'),
(364, 62, 38, 0, '2019-11-27 18:13:57', '2019-11-27 18:13:57'),
(365, 62, 39, 0, '2019-11-27 18:13:57', '2019-11-27 18:13:57'),
(366, 62, 40, 0, '2019-11-27 18:13:57', '2019-11-27 18:13:57'),
(367, 62, 41, 0, '2019-11-27 18:14:04', '2019-11-27 18:14:04'),
(368, 62, 42, 0, '2019-11-27 18:14:04', '2019-11-27 18:14:04'),
(369, 65, 41, 0, '2019-11-28 15:29:49', '2019-11-28 15:29:49'),
(370, 65, 42, 0, '2019-11-28 15:29:49', '2019-11-28 15:29:49'),
(371, 70, 32, 0, '2020-01-10 12:34:57', '2020-01-10 12:34:57'),
(372, 70, 33, 0, '2020-01-10 12:34:57', '2020-01-10 12:34:57'),
(373, 70, 34, 0, '2020-01-10 12:34:57', '2020-01-10 12:34:57'),
(374, 70, 35, 0, '2020-01-10 12:34:57', '2020-01-10 12:34:57'),
(375, 70, 36, 0, '2020-01-10 12:35:04', '2020-01-10 12:35:04'),
(376, 70, 37, 0, '2020-01-10 12:35:04', '2020-01-10 12:35:04'),
(377, 70, 43, 0, '2020-01-10 12:35:04', '2020-01-10 12:35:04'),
(378, 70, 38, 0, '2020-01-10 12:35:10', '2020-01-10 12:35:10'),
(379, 70, 39, 0, '2020-01-10 12:35:10', '2020-01-10 12:35:10'),
(380, 70, 40, 0, '2020-01-10 12:35:10', '2020-01-10 12:35:10'),
(381, 70, 41, 0, '2020-01-10 12:35:17', '2020-01-10 12:35:17'),
(382, 70, 42, 0, '2020-01-10 12:35:17', '2020-01-10 12:35:17'),
(383, 72, 32, 0, '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(384, 72, 33, 0, '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(385, 72, 34, 0, '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(386, 72, 35, 0, '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(387, 72, 36, 0, '2020-01-24 09:09:43', '2020-01-24 09:09:43'),
(388, 72, 37, 0, '2020-01-24 09:09:43', '2020-01-24 09:09:43'),
(389, 72, 43, 0, '2020-01-24 09:09:43', '2020-01-24 09:09:43'),
(390, 72, 38, 0, '2020-01-24 09:10:03', '2020-01-24 09:10:03'),
(391, 72, 39, 0, '2020-01-24 09:10:03', '2020-01-24 09:10:03'),
(392, 72, 40, 0, '2020-01-24 09:10:03', '2020-01-24 09:10:03'),
(393, 72, 41, 0, '2020-01-24 09:10:12', '2020-01-24 09:10:12'),
(394, 72, 42, 0, '2020-01-24 09:10:12', '2020-01-24 09:10:12'),
(395, 48, 32, 0, '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(396, 48, 33, 0, '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(397, 48, 34, 0, '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(398, 48, 35, 0, '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(399, 48, 36, 0, '2020-01-28 10:22:00', '2020-01-28 10:22:00'),
(400, 48, 37, 0, '2020-01-28 10:22:00', '2020-01-28 10:22:00'),
(401, 48, 43, 0, '2020-01-28 10:22:00', '2020-01-28 10:22:00'),
(402, 48, 38, 0, '2020-01-28 10:22:09', '2020-01-28 10:22:09'),
(403, 48, 39, 0, '2020-01-28 10:22:09', '2020-01-28 10:22:09'),
(404, 48, 40, 0, '2020-01-28 10:22:09', '2020-01-28 10:22:09'),
(405, 48, 41, 0, '2020-01-28 10:22:13', '2020-01-28 10:22:13'),
(406, 48, 42, 0, '2020-01-28 10:22:13', '2020-01-28 10:22:13'),
(407, 84, 32, 0, '2020-01-29 08:06:00', '2020-01-29 08:06:00'),
(408, 84, 33, 0, '2020-01-29 08:06:00', '2020-01-29 08:06:00'),
(409, 84, 34, 0, '2020-01-29 08:06:00', '2020-01-29 08:06:00'),
(410, 84, 35, 0, '2020-01-29 08:06:00', '2020-01-29 08:06:00'),
(411, 84, 36, 0, '2020-01-29 08:06:15', '2020-01-29 08:06:15'),
(412, 84, 37, 0, '2020-01-29 08:06:15', '2020-01-29 08:06:15'),
(413, 84, 43, 0, '2020-01-29 08:06:15', '2020-01-29 08:06:15'),
(414, 84, 38, 0, '2020-01-29 08:06:31', '2020-01-29 08:06:31'),
(415, 84, 39, 0, '2020-01-29 08:06:31', '2020-01-29 08:06:31'),
(416, 84, 40, 0, '2020-01-29 08:06:31', '2020-01-29 08:06:31'),
(417, 84, 41, 0, '2020-01-29 08:06:43', '2020-01-29 08:06:43'),
(418, 84, 42, 0, '2020-01-29 08:06:43', '2020-01-29 08:06:43'),
(419, 85, 32, 0, '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(420, 85, 33, 0, '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(421, 85, 34, 0, '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(422, 85, 35, 0, '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(423, 85, 36, 0, '2020-01-29 11:12:16', '2020-01-29 11:12:16'),
(424, 85, 37, 0, '2020-01-29 11:12:16', '2020-01-29 11:12:16'),
(425, 85, 43, 0, '2020-01-29 11:12:16', '2020-01-29 11:12:16'),
(426, 85, 38, 0, '2020-01-29 11:12:22', '2020-01-29 11:12:22'),
(427, 85, 39, 0, '2020-01-29 11:12:22', '2020-01-29 11:12:22'),
(428, 85, 40, 0, '2020-01-29 11:12:22', '2020-01-29 11:12:22'),
(429, 85, 41, 0, '2020-01-29 11:12:27', '2020-01-29 11:12:27'),
(430, 85, 42, 0, '2020-01-29 11:12:27', '2020-01-29 11:12:27'),
(431, 53, 32, 0, '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(432, 53, 33, 0, '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(433, 53, 34, 0, '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(434, 53, 35, 0, '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(435, 53, 36, 0, '2020-01-29 12:30:32', '2020-01-29 12:30:32'),
(436, 53, 37, 0, '2020-01-29 12:30:32', '2020-01-29 12:30:32'),
(437, 53, 43, 0, '2020-01-29 12:30:32', '2020-01-29 12:30:32'),
(438, 53, 38, 0, '2020-01-29 12:30:36', '2020-01-29 12:30:36'),
(439, 53, 39, 0, '2020-01-29 12:30:36', '2020-01-29 12:30:36'),
(440, 53, 40, 0, '2020-01-29 12:30:36', '2020-01-29 12:30:36'),
(441, 53, 41, 0, '2020-01-29 12:30:38', '2020-01-29 12:30:38'),
(442, 53, 42, 0, '2020-01-29 12:30:38', '2020-01-29 12:30:38'),
(443, 88, 32, 0, '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(444, 88, 33, 0, '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(445, 88, 34, 0, '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(446, 88, 35, 0, '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(447, 88, 36, 0, '2020-01-30 12:17:36', '2020-01-30 12:17:36'),
(448, 88, 37, 0, '2020-01-30 12:17:36', '2020-01-30 12:17:36'),
(449, 88, 43, 0, '2020-01-30 12:17:36', '2020-01-30 12:17:36'),
(450, 88, 38, 0, '2020-01-30 12:17:54', '2020-01-30 12:17:54'),
(451, 88, 39, 0, '2020-01-30 12:17:54', '2020-01-30 12:17:54'),
(452, 88, 40, 0, '2020-01-30 12:17:54', '2020-01-30 12:17:54'),
(453, 88, 41, 0, '2020-01-30 12:18:01', '2020-01-30 12:18:01'),
(454, 88, 42, 0, '2020-01-30 12:18:01', '2020-01-30 12:18:01'),
(455, 1, 41, 0, '2020-02-25 15:06:39', '2020-02-25 15:06:39'),
(456, 1, 42, 0, '2020-02-25 15:06:39', '2020-02-25 15:06:39'),
(457, 6, 41, 0, '2020-02-26 13:14:59', '2020-02-26 13:14:59'),
(458, 6, 42, 0, '2020-02-26 13:14:59', '2020-02-26 13:14:59'),
(459, 21, 32, 0, '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(460, 21, 33, 0, '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(461, 21, 34, 0, '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(462, 21, 35, 0, '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(463, 21, 36, 0, '2020-04-06 11:10:12', '2020-04-06 11:10:12'),
(464, 21, 37, 0, '2020-04-06 11:10:12', '2020-04-06 11:10:12'),
(465, 21, 43, 0, '2020-04-06 11:10:12', '2020-04-06 11:10:12'),
(466, 21, 38, 0, '2020-04-06 11:10:22', '2020-04-06 11:10:22'),
(467, 21, 39, 0, '2020-04-06 11:10:22', '2020-04-06 11:10:22'),
(468, 21, 40, 0, '2020-04-06 11:10:22', '2020-04-06 11:10:22'),
(469, 21, 41, 0, '2020-04-06 11:10:30', '2020-04-06 11:10:30'),
(470, 21, 42, 0, '2020-04-06 11:10:30', '2020-04-06 11:10:30'),
(471, 1, 32, 0, '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(472, 1, 33, 0, '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(473, 1, 34, 0, '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(474, 1, 35, 0, '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(475, 1, 36, 0, '2020-04-06 11:17:43', '2020-04-06 11:17:43'),
(476, 1, 37, 0, '2020-04-06 11:17:43', '2020-04-06 11:17:43'),
(477, 1, 43, 0, '2020-04-06 11:17:43', '2020-04-06 11:17:43'),
(478, 1, 38, 0, '2020-04-06 11:18:04', '2020-04-06 11:18:04'),
(479, 1, 39, 0, '2020-04-06 11:18:04', '2020-04-06 11:18:04'),
(480, 1, 40, 0, '2020-04-06 11:18:04', '2020-04-06 11:18:04'),
(481, 90, 32, 0, '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(482, 90, 33, 0, '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(483, 90, 34, 0, '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(484, 90, 35, 0, '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(485, 90, 36, 0, '2020-04-15 11:46:38', '2020-04-15 11:46:38'),
(486, 90, 37, 0, '2020-04-15 11:46:38', '2020-04-15 11:46:38'),
(487, 90, 43, 0, '2020-04-15 11:46:38', '2020-04-15 11:46:38'),
(488, 90, 38, 0, '2020-04-15 11:46:44', '2020-04-15 11:46:44'),
(489, 90, 39, 0, '2020-04-15 11:46:44', '2020-04-15 11:46:44'),
(490, 90, 40, 0, '2020-04-15 11:46:44', '2020-04-15 11:46:44'),
(491, 90, 41, 0, '2020-04-15 11:46:49', '2020-04-15 11:46:49'),
(492, 90, 42, 0, '2020-04-15 11:46:49', '2020-04-15 11:46:49'),
(493, 93, 32, 0, '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(494, 93, 33, 0, '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(495, 93, 34, 0, '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(496, 93, 35, 0, '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(497, 93, 36, 0, '2020-06-29 11:10:15', '2020-06-29 11:10:15'),
(498, 93, 37, 0, '2020-06-29 11:10:15', '2020-06-29 11:10:15'),
(499, 93, 43, 0, '2020-06-29 11:10:15', '2020-06-29 11:10:15'),
(500, 93, 38, 0, '2020-06-29 11:10:20', '2020-06-29 11:10:20'),
(501, 93, 39, 0, '2020-06-29 11:10:20', '2020-06-29 11:10:20'),
(502, 93, 40, 0, '2020-06-29 11:10:20', '2020-06-29 11:10:20'),
(503, 93, 41, 0, '2020-06-29 11:10:24', '2020-06-29 11:10:24'),
(504, 93, 42, 0, '2020-06-29 11:10:24', '2020-06-29 11:10:24'),
(505, 95, 36, 1, '2020-06-29 14:50:05', '2020-06-29 14:50:05'),
(506, 95, 37, 1, '2020-06-29 14:50:05', '2020-06-29 14:50:05'),
(507, 95, 43, 1, '2020-06-29 14:50:05', '2020-06-29 14:50:05'),
(508, 97, 41, 1, '2020-08-07 12:25:56', '2020-08-07 12:25:56'),
(509, 99, 33, 3, '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(510, 99, 32, 3, '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(511, 99, 35, 5, '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(512, 99, 36, 1, '2020-12-02 17:27:24', '2020-12-02 17:27:24'),
(513, 99, 37, 1, '2020-12-02 17:27:24', '2020-12-02 17:27:24'),
(514, 99, 43, 1, '2020-12-02 17:27:24', '2020-12-02 17:27:24'),
(515, 99, 38, 1, '2020-12-02 17:27:52', '2020-12-02 17:27:52'),
(516, 99, 39, 1, '2020-12-02 17:27:52', '2020-12-02 17:27:52'),
(517, 99, 40, 1, '2020-12-02 17:27:52', '2020-12-02 17:27:52'),
(518, 99, 41, 1, '2020-12-02 17:28:18', '2020-12-02 17:28:18'),
(519, 99, 42, 1, '2020-12-02 17:28:18', '2020-12-02 17:28:18'),
(520, 105, 32, 0, '2021-02-05 11:31:50', '2021-02-05 11:31:50'),
(521, 105, 33, 0, '2021-02-05 11:31:50', '2021-02-05 11:31:50'),
(522, 105, 34, 0, '2021-02-05 11:31:50', '2021-02-05 11:31:50'),
(523, 105, 35, 0, '2021-02-05 11:31:50', '2021-02-05 11:31:50'),
(524, 105, 36, 0, '2021-02-05 11:31:53', '2021-02-05 11:31:53'),
(525, 105, 37, 0, '2021-02-05 11:31:53', '2021-02-05 11:31:53'),
(526, 105, 43, 0, '2021-02-05 11:31:53', '2021-02-05 11:31:53'),
(527, 105, 38, 0, '2021-02-05 11:31:56', '2021-02-05 11:31:56'),
(528, 105, 39, 0, '2021-02-05 11:31:56', '2021-02-05 11:31:56'),
(529, 105, 40, 0, '2021-02-05 11:31:56', '2021-02-05 11:31:56'),
(530, 105, 41, 0, '2021-02-05 11:31:59', '2021-02-05 11:31:59'),
(531, 105, 42, 0, '2021-02-05 11:31:59', '2021-02-05 11:31:59'),
(532, 106, 41, 0, '2021-02-05 13:13:28', '2021-02-05 13:13:28'),
(533, 106, 42, 0, '2021-02-05 13:13:28', '2021-02-05 13:13:28'),
(534, 107, 32, 0, '2021-02-14 19:07:14', '2021-02-14 19:07:14'),
(535, 107, 33, 0, '2021-02-14 19:07:14', '2021-02-14 19:07:14'),
(536, 107, 34, 0, '2021-02-14 19:07:14', '2021-02-14 19:07:14'),
(537, 107, 35, 0, '2021-02-14 19:07:14', '2021-02-14 19:07:14'),
(538, 107, 36, 0, '2021-02-14 19:07:17', '2021-02-14 19:07:17'),
(539, 107, 37, 0, '2021-02-14 19:07:17', '2021-02-14 19:07:17'),
(540, 107, 43, 0, '2021-02-14 19:07:17', '2021-02-14 19:07:17'),
(541, 107, 38, 0, '2021-02-14 19:07:20', '2021-02-14 19:07:20'),
(542, 107, 39, 0, '2021-02-14 19:07:20', '2021-02-14 19:07:20'),
(543, 107, 40, 0, '2021-02-14 19:07:20', '2021-02-14 19:07:20'),
(544, 107, 41, 0, '2021-02-14 19:07:23', '2021-02-14 19:07:23'),
(545, 107, 42, 0, '2021-02-14 19:07:23', '2021-02-14 19:07:23'),
(546, 108, 32, 0, '2021-03-09 10:37:47', '2021-03-09 10:37:47'),
(547, 108, 33, 0, '2021-03-09 10:37:47', '2021-03-09 10:37:47'),
(548, 108, 34, 0, '2021-03-09 10:37:47', '2021-03-09 10:37:47'),
(549, 108, 35, 0, '2021-03-09 10:37:47', '2021-03-09 10:37:47'),
(550, 108, 36, 0, '2021-03-09 10:38:11', '2021-03-09 10:38:11'),
(551, 108, 37, 0, '2021-03-09 10:38:11', '2021-03-09 10:38:11'),
(552, 108, 43, 0, '2021-03-09 10:38:11', '2021-03-09 10:38:11'),
(553, 108, 38, 0, '2021-03-09 10:38:38', '2021-03-09 10:38:38'),
(554, 108, 39, 0, '2021-03-09 10:38:38', '2021-03-09 10:38:38'),
(555, 108, 40, 0, '2021-03-09 10:38:38', '2021-03-09 10:38:38'),
(556, 108, 41, 0, '2021-03-09 10:39:06', '2021-03-09 10:39:06'),
(557, 108, 42, 0, '2021-03-09 10:39:06', '2021-03-09 10:39:06'),
(558, 109, 32, 0, '2021-03-09 10:55:36', '2021-03-09 10:55:36'),
(559, 109, 33, 0, '2021-03-09 10:55:36', '2021-03-09 10:55:36'),
(560, 109, 34, 0, '2021-03-09 10:55:36', '2021-03-09 10:55:36'),
(561, 109, 35, 0, '2021-03-09 10:55:36', '2021-03-09 10:55:36'),
(562, 109, 36, 0, '2021-03-09 10:56:04', '2021-03-09 10:56:04'),
(563, 109, 37, 0, '2021-03-09 10:56:04', '2021-03-09 10:56:04'),
(564, 109, 43, 0, '2021-03-09 10:56:04', '2021-03-09 10:56:04'),
(565, 109, 38, 0, '2021-03-09 10:56:23', '2021-03-09 10:56:23'),
(566, 109, 39, 0, '2021-03-09 10:56:23', '2021-03-09 10:56:23'),
(567, 109, 40, 0, '2021-03-09 10:56:23', '2021-03-09 10:56:23'),
(568, 109, 41, 0, '2021-03-09 10:56:36', '2021-03-09 10:56:36'),
(569, 109, 42, 0, '2021-03-09 10:56:36', '2021-03-09 10:56:36'),
(570, 110, 32, 0, '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(571, 110, 33, 0, '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(572, 110, 34, 0, '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(573, 110, 35, 0, '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(574, 110, 36, 0, '2021-04-22 19:04:15', '2021-04-22 19:04:15'),
(575, 110, 37, 0, '2021-04-22 19:04:15', '2021-04-22 19:04:15'),
(576, 110, 43, 0, '2021-04-22 19:04:15', '2021-04-22 19:04:15'),
(577, 110, 38, 0, '2021-04-22 19:04:23', '2021-04-22 19:04:23'),
(578, 110, 39, 0, '2021-04-22 19:04:23', '2021-04-22 19:04:23'),
(579, 110, 40, 0, '2021-04-22 19:04:23', '2021-04-22 19:04:23'),
(580, 110, 41, 0, '2021-04-22 19:04:29', '2021-04-22 19:04:29'),
(581, 110, 42, 0, '2021-04-22 19:04:29', '2021-04-22 19:04:29'),
(582, 115, 44, 0, '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(583, 115, 32, 0, '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(584, 115, 33, 0, '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(585, 115, 34, 0, '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(586, 115, 35, 0, '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(587, 115, 36, 0, '2021-05-07 17:08:30', '2021-05-07 17:08:30'),
(588, 115, 37, 0, '2021-05-07 17:08:30', '2021-05-07 17:08:30'),
(589, 115, 43, 0, '2021-05-07 17:08:30', '2021-05-07 17:08:30'),
(590, 115, 38, 0, '2021-05-07 17:08:37', '2021-05-07 17:08:37'),
(591, 115, 39, 0, '2021-05-07 17:08:37', '2021-05-07 17:08:37'),
(592, 115, 40, 0, '2021-05-07 17:08:37', '2021-05-07 17:08:37'),
(593, 115, 41, 0, '2021-05-07 17:08:43', '2021-05-07 17:08:43'),
(594, 115, 42, 0, '2021-05-07 17:08:43', '2021-05-07 17:08:43'),
(595, 116, 32, 0, '2021-07-19 12:54:52', '2021-07-19 12:54:52'),
(596, 116, 33, 0, '2021-07-19 12:54:52', '2021-07-19 12:54:52'),
(597, 116, 34, 0, '2021-07-19 12:54:52', '2021-07-19 12:54:52'),
(598, 116, 35, 0, '2021-07-19 12:54:52', '2021-07-19 12:54:52'),
(599, 116, 36, 0, '2021-07-19 12:55:01', '2021-07-19 12:55:01'),
(600, 116, 37, 0, '2021-07-19 12:55:01', '2021-07-19 12:55:01'),
(601, 116, 43, 0, '2021-07-19 12:55:01', '2021-07-19 12:55:01'),
(602, 116, 38, 0, '2021-07-19 12:55:07', '2021-07-19 12:55:07'),
(603, 116, 39, 0, '2021-07-19 12:55:07', '2021-07-19 12:55:07'),
(604, 116, 40, 0, '2021-07-19 12:55:07', '2021-07-19 12:55:07'),
(605, 116, 41, 0, '2021-07-19 12:55:11', '2021-07-19 12:55:11'),
(606, 116, 42, 0, '2021-07-19 12:55:11', '2021-07-19 12:55:11'),
(607, 117, 32, 0, '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(608, 117, 33, 0, '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(609, 117, 34, 0, '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(610, 117, 35, 0, '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(611, 117, 36, 0, '2021-07-19 13:15:34', '2021-07-19 13:15:34'),
(612, 117, 37, 0, '2021-07-19 13:15:34', '2021-07-19 13:15:34'),
(613, 117, 43, 0, '2021-07-19 13:15:34', '2021-07-19 13:15:34'),
(614, 117, 38, 0, '2021-07-19 13:15:37', '2021-07-19 13:15:37'),
(615, 117, 39, 0, '2021-07-19 13:15:37', '2021-07-19 13:15:37'),
(616, 117, 40, 0, '2021-07-19 13:15:37', '2021-07-19 13:15:37'),
(617, 117, 41, 0, '2021-07-19 13:15:41', '2021-07-19 13:15:41'),
(618, 117, 42, 0, '2021-07-19 13:15:41', '2021-07-19 13:15:41'),
(619, 118, 32, 0, '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(620, 118, 33, 0, '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(621, 118, 34, 0, '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(622, 118, 35, 0, '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(623, 118, 36, 0, '2022-02-07 10:07:17', '2022-02-07 10:07:17'),
(624, 118, 37, 0, '2022-02-07 10:07:17', '2022-02-07 10:07:17'),
(625, 118, 43, 0, '2022-02-07 10:07:17', '2022-02-07 10:07:17'),
(626, 118, 38, 0, '2022-02-07 10:07:31', '2022-02-07 10:07:31'),
(627, 118, 39, 0, '2022-02-07 10:07:31', '2022-02-07 10:07:31'),
(628, 118, 40, 0, '2022-02-07 10:07:31', '2022-02-07 10:07:31'),
(629, 118, 41, 0, '2022-02-07 10:07:49', '2022-02-07 10:07:49'),
(630, 118, 42, 0, '2022-02-07 10:07:49', '2022-02-07 10:07:49'),
(631, 120, 32, 0, '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(632, 120, 33, 0, '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(633, 120, 34, 0, '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(634, 120, 35, 0, '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(635, 120, 36, 0, '2022-02-07 14:50:21', '2022-02-07 14:50:21'),
(636, 120, 37, 0, '2022-02-07 14:50:21', '2022-02-07 14:50:21'),
(637, 120, 43, 0, '2022-02-07 14:50:21', '2022-02-07 14:50:21'),
(638, 120, 38, 0, '2022-02-07 14:50:30', '2022-02-07 14:50:30'),
(639, 120, 39, 0, '2022-02-07 14:50:30', '2022-02-07 14:50:30'),
(640, 120, 40, 0, '2022-02-07 14:50:30', '2022-02-07 14:50:30'),
(641, 120, 41, 0, '2022-02-07 14:50:37', '2022-02-07 14:50:37'),
(642, 120, 42, 0, '2022-02-07 14:50:37', '2022-02-07 14:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_question_options`
--

CREATE TABLE `user_question_options` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  `options` varchar(255) NOT NULL,
  `value` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_question_options`
--

INSERT INTO `user_question_options` (`id`, `user_id`, `question_id`, `options`, `value`, `created_on`, `updated_on`) VALUES
(1254, 21, 2, '5', '1', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1255, 21, 8, '32', '1', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1256, 21, 8, '33', '1', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1257, 21, 9, '38', '1', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1258, 21, 9, '138', '1', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1259, 21, 11, '47', '19%', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1260, 21, 11, '48', '22%', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1261, 21, 11, '49', '21%', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1262, 21, 11, '136', '24%', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1263, 21, 12, '50', '500', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1264, 21, 12, '51', '300', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1265, 21, 12, '52', '600', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1266, 21, 12, '53', '7000', '2019-07-20 16:50:41', '2019-07-20 16:50:41'),
(1267, 21, 3, '9', '1', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1268, 21, 4, '13', '1', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1269, 21, 4, '14', '1', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1270, 21, 5, '18', '1', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1271, 21, 6, '22', '28%', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1272, 21, 6, '23', '20%', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1273, 21, 6, '24', '', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1274, 21, 6, '25', '', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1275, 21, 14, '60', '', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1276, 21, 14, '61', '', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1277, 21, 14, '62', '', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1278, 21, 14, '147', '', '2019-07-20 16:51:01', '2019-07-20 16:51:01'),
(1279, 21, 15, '64', '1', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1280, 21, 16, '70', '1', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1281, 21, 18, '79', '1', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1282, 21, 18, '80', '1', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1283, 21, 19, '83', '38%', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1284, 21, 19, '84', '21%', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1285, 21, 19, '85', '14%', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1286, 21, 20, '87', '', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1287, 21, 20, '88', '20', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1288, 21, 20, '89', '20', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1289, 21, 20, '90', '', '2019-07-20 16:51:17', '2019-07-20 16:51:17'),
(1290, 21, 7, '28', '1', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1291, 21, 24, '103', '1', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1292, 21, 24, '104', '1', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1293, 21, 25, '109', '1', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1294, 21, 26, '111', '18%', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1295, 21, 26, '112', '14%', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1296, 21, 26, '113', '13%', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1297, 21, 26, '114', '17%', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1298, 21, 27, '115', '8000', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1299, 21, 27, '116', '', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1300, 21, 27, '117', '', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1301, 21, 27, '118', '', '2019-07-20 16:51:35', '2019-07-20 16:51:35'),
(1609, 22, 2, '5', '1', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1610, 22, 8, '31', '1', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1611, 22, 9, '138', '1', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1612, 22, 11, '47', '30 %', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1613, 22, 11, '48', '%', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1614, 22, 11, '49', '%', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1615, 22, 11, '136', '%', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1616, 22, 12, '50', '10000', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1617, 22, 12, '51', '', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1618, 22, 12, '52', '', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1619, 22, 12, '53', '', '2019-07-20 21:13:48', '2019-07-20 21:13:48'),
(1620, 22, 3, '10', '1', '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(1621, 22, 4, '16', '1', '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(1622, 22, 5, '17', '1', '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(1623, 22, 6, '22', '%', '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(1624, 22, 6, '23', '100 %', '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(1625, 22, 6, '24', '%', '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(1626, 22, 6, '25', '%', '2019-07-20 21:14:22', '2019-07-20 21:14:22'),
(1627, 22, 15, '65', '1', '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(1628, 22, 16, '70', '1', '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(1629, 22, 18, '80', '1', '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(1630, 22, 19, '83', '%', '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(1631, 22, 19, '84', '%', '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(1632, 22, 19, '85', '100 %', '2019-07-20 21:15:04', '2019-07-20 21:15:04'),
(1633, 22, 7, '26', '1', '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(1634, 22, 24, '103', '1', '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(1635, 22, 25, '107', '1', '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(1636, 22, 26, '111', '%', '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(1637, 22, 26, '112', '%', '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(1638, 22, 26, '113', '%', '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(1639, 22, 26, '114', '100 %', '2019-07-20 21:15:51', '2019-07-20 21:15:51'),
(2420, 23, 2, '7', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2421, 23, 8, '31', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2422, 23, 8, '32', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2423, 23, 8, '33', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2424, 23, 9, '36', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2425, 23, 9, '38', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2426, 23, 9, '39', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2427, 23, 9, '138', '1', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2428, 23, 11, '47', '18 %', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2429, 23, 11, '48', '21 %', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2430, 23, 11, '49', '24 %', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2431, 23, 11, '136', '22 %', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2432, 23, 12, '50', '44', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2433, 23, 12, '51', '22', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2434, 23, 12, '52', '11', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2435, 23, 12, '53', '44', '2019-07-22 12:00:58', '2019-07-22 12:00:58'),
(2436, 23, 3, '8', '1', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2437, 23, 4, '13', '1', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2438, 23, 4, '14', '1', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2439, 23, 5, '18', '1', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2440, 23, 5, '19', '1', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2441, 23, 6, '22', '29 %', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2442, 23, 6, '23', '25 %', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2443, 23, 6, '24', '12 %', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2444, 23, 6, '25', '23 %', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2445, 23, 14, '60', '55', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2446, 23, 14, '61', '77', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2447, 23, 14, '62', '33', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2448, 23, 14, '147', '99', '2019-07-22 12:01:00', '2019-07-22 12:01:00'),
(2449, 23, 15, '66', '1', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2450, 23, 16, '68', '1', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2451, 23, 16, '69', '1', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2452, 23, 16, '70', '1', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2453, 23, 18, '78', '1', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2454, 23, 18, '79', '1', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2455, 23, 18, '80', '1', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2456, 23, 19, '83', '20 %', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2457, 23, 19, '84', '20 %', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2458, 23, 19, '85', '%', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2459, 23, 20, '87', '55', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2460, 23, 20, '88', '', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2461, 23, 20, '89', '44', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2462, 23, 20, '90', '11', '2019-07-22 12:01:02', '2019-07-22 12:01:02'),
(2463, 23, 7, '28', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2464, 23, 24, '103', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2465, 23, 24, '104', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2466, 23, 24, '105', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2467, 23, 24, '106', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2468, 23, 25, '107', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2469, 23, 25, '108', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2470, 23, 25, '109', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2471, 23, 25, '110', '1', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2472, 23, 26, '111', '20 %', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2473, 23, 26, '112', '20 %', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2474, 23, 26, '113', '22 %', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2475, 23, 26, '114', '20 %', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2476, 23, 27, '115', '55', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2477, 23, 27, '116', '22', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2478, 23, 27, '117', '44', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2479, 23, 27, '118', '33', '2019-07-22 12:01:05', '2019-07-22 12:01:05'),
(2794, 18, 4, '14', '1', '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(2795, 18, 5, '18', '1', '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(2796, 18, 5, '19', '1', '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(2801, 18, 14, '60', '10000', '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(2802, 18, 14, '61', '11', '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(2803, 18, 14, '62', '41', '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(2804, 18, 14, '147', '45', '2019-07-26 18:17:27', '2019-07-26 18:17:27'),
(3405, 24, 2, '5', '1', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3406, 24, 8, '31', '1', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3407, 24, 9, '36', '1', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3408, 24, 9, '38', '1', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3409, 24, 11, '47', '', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3410, 24, 11, '48', '', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3411, 24, 11, '49', '', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3412, 24, 11, '136', '', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3413, 24, 12, '50', '11000', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3414, 24, 12, '51', '', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3415, 24, 12, '52', '', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3416, 24, 12, '53', '', '2019-08-19 09:13:27', '2019-08-19 09:13:27'),
(3417, 24, 3, '10', '1', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3418, 24, 4, '15', '1', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3419, 24, 6, '22', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3420, 24, 6, '23', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3421, 24, 6, '24', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3422, 24, 6, '25', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3423, 24, 14, '60', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3424, 24, 14, '61', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3425, 24, 14, '62', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3426, 24, 14, '147', '', '2019-08-19 09:13:31', '2019-08-19 09:13:31'),
(3427, 24, 15, '65', '1', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3428, 24, 16, '70', '1', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3429, 24, 18, '80', '1', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3430, 24, 19, '83', '', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3431, 24, 19, '84', '', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3432, 24, 19, '85', '', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3433, 24, 20, '87', '', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3434, 24, 20, '88', '', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3435, 24, 20, '89', '', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3436, 24, 20, '90', '', '2019-08-19 09:13:36', '2019-08-19 09:13:36'),
(3437, 24, 7, '26', '1', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3438, 24, 24, '103', '1', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3439, 24, 26, '111', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3440, 24, 26, '112', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3441, 24, 26, '113', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3442, 24, 26, '114', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3443, 24, 27, '115', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3444, 24, 27, '116', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3445, 24, 27, '117', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3446, 24, 27, '118', '', '2019-08-19 09:13:38', '2019-08-19 09:13:38'),
(3455, 18, 20, '87', '100', '2019-08-19 17:03:12', '2019-08-19 17:03:12'),
(3456, 18, 20, '88', '00', '2019-08-19 17:03:12', '2019-08-19 17:03:12'),
(3457, 18, 20, '89', '100', '2019-08-19 17:03:12', '2019-08-19 17:03:12'),
(3458, 18, 20, '90', '111', '2019-08-19 17:03:12', '2019-08-19 17:03:12'),
(3459, 18, 7, '27', '1', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3460, 18, 24, '104', '1', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3462, 18, 26, '111', '33%', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3463, 18, 26, '112', '20%', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3464, 18, 26, '113', '19%', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3465, 18, 26, '114', '23%', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3466, 18, 27, '115', '111', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3467, 18, 27, '116', '111', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3468, 18, 27, '117', '11', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3469, 18, 27, '118', '111', '2019-08-19 17:03:27', '2019-08-19 17:03:27'),
(3773, 1, 2, '5', '1', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3774, 1, 8, '31', '1', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3775, 1, 9, '37', '1', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3776, 1, 11, '47', '40%', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3777, 1, 11, '48', '25%', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3778, 1, 11, '49', '22%', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3779, 1, 11, '136', '20%', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3780, 1, 12, '50', '50', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3781, 1, 12, '51', '10', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3782, 1, 12, '52', '12', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3783, 1, 12, '53', '145', '2019-09-02 12:23:56', '2019-09-02 12:23:56'),
(3784, 1, 3, '9', '1', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3785, 1, 4, '14', '1', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3786, 1, 5, '18', '1', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3787, 1, 6, '22', '28%', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3788, 1, 6, '23', '18%', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3789, 1, 6, '24', '16%', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3790, 1, 6, '25', '10%', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3791, 1, 14, '60', '55', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3792, 1, 14, '61', '45', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3793, 1, 14, '62', '20', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3794, 1, 14, '147', '14', '2019-09-02 12:24:15', '2019-09-02 12:24:15'),
(3795, 1, 15, '63', '1', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3796, 1, 16, '68', '1', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3797, 1, 18, '78', '1', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3798, 1, 19, '83', '15%', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3799, 1, 19, '84', '8%', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3800, 1, 19, '85', '29%', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3801, 1, 20, '87', '801', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3802, 1, 20, '88', '444', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3803, 1, 20, '89', '55', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3804, 1, 20, '90', '4545', '2019-09-02 12:24:33', '2019-09-02 12:24:33'),
(3805, 1, 7, '26', '1', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3806, 1, 24, '103', '1', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3807, 1, 25, '109', '1', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3808, 1, 25, '110', '1', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3809, 1, 26, '111', '14%', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3810, 1, 26, '112', '14%', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3811, 1, 26, '113', '14%', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3812, 1, 26, '114', '5%', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3813, 1, 27, '115', '455', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3814, 1, 27, '116', '4545', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3815, 1, 27, '117', '4547', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3816, 1, 27, '118', '78545', '2019-09-02 12:24:58', '2019-09-02 12:24:58'),
(3910, 30, 5, '17', '1', '2019-09-13 19:09:29', '2019-09-13 19:09:29'),
(3914, 30, 7, '28', '1', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3915, 30, 24, '104', '1', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3917, 30, 26, '111', '57%', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3918, 30, 26, '112', '49%', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3919, 30, 26, '113', '', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3920, 30, 26, '114', '', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3921, 30, 27, '115', '44444', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3922, 30, 27, '116', '', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3923, 30, 27, '117', '', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(3924, 30, 27, '118', '', '2019-09-13 19:09:34', '2019-09-13 19:09:34'),
(4010, 33, 8, '31', '1', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4011, 33, 2, '5', '1', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4012, 33, 2, '135', '1', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4013, 33, 9, '138', '1', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4014, 33, 11, '47', '41 %', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4015, 33, 12, '50', '10000', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4016, 33, 12, '51', '3000', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4017, 33, 12, '52', '', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4018, 33, 12, '53', '', '2019-09-16 21:15:40', '2019-09-16 21:15:40'),
(4019, 33, 3, '10', '1', '2019-09-16 21:15:44', '2019-09-16 21:15:44'),
(4020, 33, 6, '22', '1', '2019-09-16 21:15:44', '2019-09-16 21:15:44'),
(4021, 33, 4, '13', '', '2019-09-16 21:15:44', '2019-09-16 21:15:44'),
(4022, 33, 15, '65', '1', '2019-09-16 21:15:48', '2019-09-16 21:15:48'),
(4023, 33, 16, '70', '1', '2019-09-16 21:15:48', '2019-09-16 21:15:48'),
(4024, 33, 19, '84', '1', '2019-09-16 21:15:48', '2019-09-16 21:15:48'),
(4025, 33, 18, '80', '1', '2019-09-16 21:15:53', '2019-09-16 21:15:53'),
(4026, 33, 25, '108', '1', '2019-09-16 21:15:53', '2019-09-16 21:15:53'),
(4036, 30, 3, '10', '1', '2019-09-16 21:24:31', '2019-09-16 21:24:31'),
(4037, 30, 6, '22', '1', '2019-09-16 21:24:31', '2019-09-16 21:24:31'),
(4038, 30, 4, '13', '', '2019-09-16 21:24:31', '2019-09-16 21:24:31'),
(4327, 18, 3, '9', '1', '2019-09-17 18:16:00', '2019-09-17 18:16:00'),
(4328, 18, 15, '64', '1', '2019-09-17 18:16:03', '2019-09-17 18:16:03'),
(4329, 18, 16, '68', '1', '2019-09-17 18:16:03', '2019-09-17 18:16:03'),
(4330, 18, 16, '69', '1', '2019-09-17 18:16:03', '2019-09-17 18:16:03'),
(4331, 18, 19, '83', '1', '2019-09-17 18:16:03', '2019-09-17 18:16:03'),
(4332, 18, 19, '84', '1', '2019-09-17 18:16:03', '2019-09-17 18:16:03'),
(4333, 18, 19, '85', '1', '2019-09-17 18:16:03', '2019-09-17 18:16:03'),
(4355, 18, 18, '78', '1', '2019-09-17 18:22:32', '2019-09-17 18:22:32'),
(4356, 18, 18, '79', '1', '2019-09-17 18:22:32', '2019-09-17 18:22:32'),
(4357, 18, 25, '107', '1', '2019-09-17 18:22:32', '2019-09-17 18:22:32'),
(4362, 18, 29, '169', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4363, 18, 30, '171', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4364, 18, 30, '172', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4365, 18, 30, '173', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4366, 18, 31, '174', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4367, 18, 31, '175', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4368, 18, 31, '176', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4369, 18, 31, '177', '1', '2019-09-17 18:28:11', '2019-09-17 18:28:11'),
(4370, 18, 8, '164', '1', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4371, 18, 2, '5', '1', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4372, 18, 2, '152', '1', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4373, 18, 2, '157', '1', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4374, 18, 2, '158', '1', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4375, 18, 2, '159', '1', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4376, 18, 11, '47', '58%', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4377, 18, 11, '155', '55%', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4378, 18, 12, '50', '842', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4379, 18, 12, '156', '500', '2019-09-17 18:29:25', '2019-09-17 18:29:25'),
(4380, 30, 8, '31', '1', '2019-09-19 08:18:31', '2019-09-19 08:18:31'),
(4381, 30, 2, '5', '1', '2019-09-19 08:18:31', '2019-09-19 08:18:31'),
(4382, 30, 9, '36', '1', '2019-09-19 08:18:31', '2019-09-19 08:18:31'),
(4383, 30, 11, '47', '40%', '2019-09-19 08:18:31', '2019-09-19 08:18:31'),
(4384, 30, 12, '50', '5000', '2019-09-19 08:18:31', '2019-09-19 08:18:31'),
(4385, 30, 15, '65', '1', '2019-09-19 08:18:45', '2019-09-19 08:18:45'),
(4386, 30, 16, '70', '1', '2019-09-19 08:18:45', '2019-09-19 08:18:45'),
(4387, 30, 19, '84', '1', '2019-09-19 08:18:45', '2019-09-19 08:18:45'),
(4388, 30, 18, '80', '1', '2019-09-19 08:18:56', '2019-09-19 08:18:56'),
(4389, 30, 25, '109', '1', '2019-09-19 08:18:56', '2019-09-19 08:18:56'),
(4425, 35, 36, '189', '1', '2019-09-20 18:10:40', '2019-09-20 18:10:40'),
(4426, 35, 37, '193', '1', '2019-09-20 18:10:40', '2019-09-20 18:10:40'),
(4427, 35, 43, '220', '1', '2019-09-20 18:10:40', '2019-09-20 18:10:40'),
(4428, 35, 38, '198', '1', '2019-09-20 18:10:59', '2019-09-20 18:10:59'),
(4429, 35, 39, '204', '1', '2019-09-20 18:10:59', '2019-09-20 18:10:59'),
(4430, 35, 40, '207', '1', '2019-09-20 18:10:59', '2019-09-20 18:10:59'),
(4431, 35, 41, '210', '1', '2019-09-20 18:11:04', '2019-09-20 18:11:04'),
(4432, 35, 42, '215', '1', '2019-09-20 18:11:04', '2019-09-20 18:11:04'),
(4433, 35, 32, '178', '1', '2019-09-20 18:27:22', '2019-09-20 18:27:22'),
(4434, 35, 33, '182', '1', '2019-09-20 18:27:22', '2019-09-20 18:27:22'),
(4435, 35, 34, '186', '50%', '2019-09-20 18:27:22', '2019-09-20 18:27:22'),
(4436, 35, 35, '187', '100000', '2019-09-20 18:27:22', '2019-09-20 18:27:22'),
(4437, 35, 35, '188', '50000', '2019-09-20 18:27:22', '2019-09-20 18:27:22'),
(4438, 35, 35, '217', '20000', '2019-09-20 18:27:22', '2019-09-20 18:27:22'),
(4486, 30, 32, '178', '1', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4487, 30, 32, '179', '1', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4488, 30, 33, '182', '1', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4489, 30, 33, '184', '1', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4490, 30, 34, '186', '20%', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4491, 30, 35, '187', '10000', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4492, 30, 35, '188', '3000', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4493, 30, 35, '217', '10000', '2019-09-23 19:07:22', '2019-09-23 19:07:22'),
(4494, 30, 36, '189', '1', '2019-09-23 19:07:38', '2019-09-23 19:07:38'),
(4495, 30, 37, '195', '1', '2019-09-23 19:07:38', '2019-09-23 19:07:38'),
(4496, 30, 43, '218', '1', '2019-09-23 19:07:38', '2019-09-23 19:07:38'),
(4497, 30, 38, '200', '1', '2019-09-23 19:07:45', '2019-09-23 19:07:45'),
(4498, 30, 39, '205', '1', '2019-09-23 19:07:45', '2019-09-23 19:07:45'),
(4499, 30, 40, '207', '1', '2019-09-23 19:07:45', '2019-09-23 19:07:45'),
(4500, 30, 41, '210', '1', '2019-09-23 19:07:50', '2019-09-23 19:07:50'),
(4501, 30, 42, '215', '1', '2019-09-23 19:07:50', '2019-09-23 19:07:50'),
(4868, 40, 36, '189', '1', '2019-09-28 13:48:07', '2019-09-28 13:48:07'),
(4869, 40, 37, '193', '1', '2019-09-28 13:48:07', '2019-09-28 13:48:07'),
(4870, 40, 43, '218', '1', '2019-09-28 13:48:07', '2019-09-28 13:48:07'),
(4871, 40, 38, '200', '1', '2019-09-28 13:48:20', '2019-09-28 13:48:20'),
(4872, 40, 39, '203', '1', '2019-09-28 13:48:20', '2019-09-28 13:48:20'),
(4873, 40, 40, '206', '1', '2019-09-28 13:48:20', '2019-09-28 13:48:20'),
(4883, 40, 32, '180', '1', '2019-09-28 13:54:27', '2019-09-28 13:54:27'),
(4884, 40, 32, '181', '1', '2019-09-28 13:54:27', '2019-09-28 13:54:27'),
(4885, 40, 33, '184', '1', '2019-09-28 13:54:27', '2019-09-28 13:54:27'),
(4886, 40, 34, '186', '30', '2019-09-28 13:54:27', '2019-09-28 13:54:27'),
(4887, 40, 35, '187', '1000', '2019-09-28 13:54:27', '2019-09-28 13:54:27'),
(4888, 40, 35, '188', '200', '2019-09-28 13:54:27', '2019-09-28 13:54:27'),
(4889, 40, 35, '217', '4000', '2019-09-28 13:54:27', '2019-09-28 13:54:27'),
(4988, 37, 32, '178', '1', '2019-10-15 19:38:18', '2019-10-15 19:38:18'),
(4989, 37, 33, '182', '1', '2019-10-15 19:38:18', '2019-10-15 19:38:18'),
(4990, 37, 33, '185', '1', '2019-10-15 19:38:18', '2019-10-15 19:38:18'),
(4991, 37, 34, '186', '52', '2019-10-15 19:38:18', '2019-10-15 19:38:18'),
(4992, 37, 35, '187', '10000', '2019-10-15 19:38:18', '2019-10-15 19:38:18'),
(4993, 37, 35, '188', '3000', '2019-10-15 19:38:18', '2019-10-15 19:38:18'),
(4994, 37, 35, '217', '10000', '2019-10-15 19:38:18', '2019-10-15 19:38:18'),
(4995, 37, 36, '189', '1', '2019-10-15 19:38:24', '2019-10-15 19:38:24'),
(4996, 37, 37, '195', '1', '2019-10-15 19:38:24', '2019-10-15 19:38:24'),
(4997, 37, 43, '218', '1', '2019-10-15 19:38:24', '2019-10-15 19:38:24'),
(4998, 37, 38, '200', '1', '2019-10-15 19:38:30', '2019-10-15 19:38:30'),
(4999, 37, 39, '205', '1', '2019-10-15 19:38:30', '2019-10-15 19:38:30'),
(5000, 37, 40, '207', '1', '2019-10-15 19:38:30', '2019-10-15 19:38:30'),
(5001, 37, 41, '210', '1', '2019-10-15 19:38:37', '2019-10-15 19:38:37'),
(5002, 37, 42, '215', '1', '2019-10-15 19:38:37', '2019-10-15 19:38:37'),
(5018, 43, 32, '178', '1', '2019-10-16 04:03:56', '2019-10-16 04:03:56'),
(5019, 43, 32, '181', '1', '2019-10-16 04:03:56', '2019-10-16 04:03:56'),
(5020, 43, 33, '184', '1', '2019-10-16 04:03:56', '2019-10-16 04:03:56'),
(5021, 43, 34, '186', '20', '2019-10-16 04:03:56', '2019-10-16 04:03:56'),
(5022, 43, 35, '187', '10000', '2019-10-16 04:03:56', '2019-10-16 04:03:56'),
(5023, 43, 35, '188', '2000', '2019-10-16 04:03:56', '2019-10-16 04:03:56'),
(5024, 43, 35, '217', '50000', '2019-10-16 04:03:56', '2019-10-16 04:03:56'),
(5025, 43, 36, '189', '1', '2019-10-16 04:03:59', '2019-10-16 04:03:59'),
(5026, 43, 37, '195', '1', '2019-10-16 04:03:59', '2019-10-16 04:03:59'),
(5027, 43, 43, '218', '1', '2019-10-16 04:03:59', '2019-10-16 04:03:59'),
(5028, 43, 38, '200', '1', '2019-10-16 04:04:02', '2019-10-16 04:04:02'),
(5029, 43, 39, '205', '1', '2019-10-16 04:04:02', '2019-10-16 04:04:02'),
(5030, 43, 40, '207', '1', '2019-10-16 04:04:02', '2019-10-16 04:04:02'),
(5031, 43, 41, '210', '1', '2019-10-16 04:04:05', '2019-10-16 04:04:05'),
(5032, 43, 42, '216', '1', '2019-10-16 04:04:05', '2019-10-16 04:04:05'),
(5130, 45, 36, '190', '1', '2019-10-21 18:29:51', '2019-10-21 18:29:51'),
(5131, 45, 37, '195', '1', '2019-10-21 18:29:51', '2019-10-21 18:29:51'),
(5132, 45, 43, '219', '1', '2019-10-21 18:29:51', '2019-10-21 18:29:51'),
(5133, 45, 38, '198', '1', '2019-10-21 18:30:21', '2019-10-21 18:30:21'),
(5134, 45, 39, '203', '1', '2019-10-21 18:30:21', '2019-10-21 18:30:21'),
(5135, 45, 40, '206', '1', '2019-10-21 18:30:21', '2019-10-21 18:30:21'),
(5136, 45, 41, '209', '1', '2019-10-21 18:30:35', '2019-10-21 18:30:35'),
(5152, 45, 32, '179', '1', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5153, 45, 32, '180', '1', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5154, 45, 32, '181', '1', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5155, 45, 33, '183', '1', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5156, 45, 34, '186', '', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5157, 45, 35, '187', '50000', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5158, 45, 35, '188', '30000', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5159, 45, 35, '217', '20000', '2019-10-21 18:57:18', '2019-10-21 18:57:18'),
(5174, 46, 32, '178', '1', '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(5175, 46, 32, '179', '1', '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(5176, 46, 32, '181', '1', '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(5177, 46, 34, '186', '33', '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(5178, 46, 35, '187', '50000', '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(5179, 46, 35, '188', '20000', '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(5180, 46, 35, '217', '10000', '2019-10-22 15:18:34', '2019-10-22 15:18:34'),
(5199, 47, 32, '178', '1', '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(5200, 47, 32, '180', '1', '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(5201, 47, 33, '185', '1', '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(5202, 47, 34, '186', '20%', '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(5203, 47, 35, '187', '10000', '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(5204, 47, 35, '188', '3000', '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(5205, 47, 35, '217', '10000', '2019-10-23 12:48:43', '2019-10-23 12:48:43'),
(5206, 47, 36, '189', '1', '2019-10-23 12:49:31', '2019-10-23 12:49:31'),
(5207, 47, 37, '195', '1', '2019-10-23 12:49:31', '2019-10-23 12:49:31'),
(5208, 47, 43, '218', '1', '2019-10-23 12:49:31', '2019-10-23 12:49:31'),
(5209, 47, 38, '200', '1', '2019-10-23 12:49:48', '2019-10-23 12:49:48'),
(5210, 47, 39, '205', '1', '2019-10-23 12:49:48', '2019-10-23 12:49:48'),
(5211, 47, 40, '207', '1', '2019-10-23 12:49:48', '2019-10-23 12:49:48'),
(5212, 47, 41, '211', '1', '2019-10-23 12:50:01', '2019-10-23 12:50:01'),
(5213, 47, 42, '215', '1', '2019-10-23 12:50:01', '2019-10-23 12:50:01'),
(5232, 49, 41, '211', '1', '2019-10-25 11:55:02', '2019-10-25 11:55:02'),
(5233, 49, 42, '213', '1', '2019-10-25 11:55:02', '2019-10-25 11:55:02'),
(5313, 44, 32, '178', '1', '2019-10-29 18:24:04', '2019-10-29 18:24:04'),
(5314, 44, 32, '180', '1', '2019-10-29 18:24:04', '2019-10-29 18:24:04'),
(5315, 44, 33, '184', '1', '2019-10-29 18:24:04', '2019-10-29 18:24:04'),
(5316, 44, 34, '186', '20%', '2019-10-29 18:24:04', '2019-10-29 18:24:04'),
(5317, 44, 35, '187', '10000', '2019-10-29 18:24:04', '2019-10-29 18:24:04'),
(5318, 44, 35, '188', '3000', '2019-10-29 18:24:04', '2019-10-29 18:24:04'),
(5319, 44, 35, '217', '10000', '2019-10-29 18:24:04', '2019-10-29 18:24:04'),
(5320, 44, 36, '189', '1', '2019-10-29 18:24:09', '2019-10-29 18:24:09'),
(5321, 44, 37, '196', '1', '2019-10-29 18:24:09', '2019-10-29 18:24:09'),
(5322, 44, 43, '218', '1', '2019-10-29 18:24:09', '2019-10-29 18:24:09'),
(5323, 44, 38, '200', '1', '2019-10-29 18:24:13', '2019-10-29 18:24:13'),
(5324, 44, 39, '205', '1', '2019-10-29 18:24:13', '2019-10-29 18:24:13'),
(5325, 44, 40, '207', '1', '2019-10-29 18:24:13', '2019-10-29 18:24:13'),
(5326, 44, 41, '210', '1', '2019-10-29 18:24:16', '2019-10-29 18:24:16'),
(5327, 44, 42, '216', '1', '2019-10-29 18:24:16', '2019-10-29 18:24:16'),
(5583, 50, 32, '178', '1', '2019-11-06 17:06:20', '2019-11-06 17:06:20'),
(5584, 50, 33, '182', '1', '2019-11-06 17:06:20', '2019-11-06 17:06:20'),
(5585, 50, 34, '186', '37%', '2019-11-06 17:06:20', '2019-11-06 17:06:20'),
(5586, 50, 35, '187', '70000', '2019-11-06 17:06:20', '2019-11-06 17:06:20'),
(5587, 50, 35, '188', '10000', '2019-11-06 17:06:20', '2019-11-06 17:06:20'),
(5588, 50, 35, '217', '5000', '2019-11-06 17:06:20', '2019-11-06 17:06:20'),
(5589, 50, 36, '189', '1', '2019-11-06 17:06:25', '2019-11-06 17:06:25'),
(5590, 50, 37, '193', '1', '2019-11-06 17:06:25', '2019-11-06 17:06:25'),
(5591, 50, 43, '218', '1', '2019-11-06 17:06:25', '2019-11-06 17:06:25'),
(5697, 59, 32, '178', '1', '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(5698, 59, 33, '182', '1', '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(5699, 59, 34, '186', '23%', '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(5700, 59, 35, '187', '', '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(5701, 59, 35, '188', '', '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(5702, 59, 35, '217', '', '2019-11-11 16:00:08', '2019-11-11 16:00:08'),
(5703, 59, 43, '219', '1', '2019-11-11 16:00:18', '2019-11-11 16:00:18'),
(5704, 59, 38, '198', '1', '2019-11-11 16:00:27', '2019-11-11 16:00:27'),
(5705, 59, 39, '203', '1', '2019-11-11 16:00:27', '2019-11-11 16:00:27'),
(5706, 60, 32, '178', '1', '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(5707, 60, 34, '186', '31%', '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(5708, 60, 35, '187', '', '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(5709, 60, 35, '188', '', '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(5710, 60, 35, '217', '', '2019-11-11 16:07:38', '2019-11-11 16:07:38'),
(5711, 60, 36, '189', '1', '2019-11-11 16:07:49', '2019-11-11 16:07:49'),
(5712, 60, 37, '195', '1', '2019-11-11 16:07:49', '2019-11-11 16:07:49'),
(5713, 60, 43, '218', '1', '2019-11-11 16:07:49', '2019-11-11 16:07:49'),
(5714, 60, 38, '198', '1', '2019-11-11 16:07:57', '2019-11-11 16:07:57'),
(5715, 60, 39, '203', '1', '2019-11-11 16:07:57', '2019-11-11 16:07:57'),
(5716, 60, 40, '206', '1', '2019-11-11 16:07:57', '2019-11-11 16:07:57'),
(5717, 60, 41, '209', '1', '2019-11-11 16:08:02', '2019-11-11 16:08:02'),
(5718, 60, 42, '213', '1', '2019-11-11 16:08:02', '2019-11-11 16:08:02'),
(5825, 62, 32, '178', '1', '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(5826, 62, 33, '183', '1', '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(5827, 62, 34, '186', '19%', '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(5828, 62, 35, '187', '', '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(5829, 62, 35, '188', '', '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(5830, 62, 35, '217', '', '2019-11-27 18:13:41', '2019-11-27 18:13:41'),
(5831, 62, 36, '189', '1', '2019-11-27 18:13:50', '2019-11-27 18:13:50'),
(5832, 62, 37, '193', '1', '2019-11-27 18:13:50', '2019-11-27 18:13:50'),
(5833, 62, 43, '218', '1', '2019-11-27 18:13:50', '2019-11-27 18:13:50'),
(5834, 62, 38, '198', '1', '2019-11-27 18:13:57', '2019-11-27 18:13:57'),
(5835, 62, 39, '203', '1', '2019-11-27 18:13:57', '2019-11-27 18:13:57'),
(5836, 62, 40, '206', '1', '2019-11-27 18:13:57', '2019-11-27 18:13:57'),
(5837, 62, 41, '209', '1', '2019-11-27 18:14:04', '2019-11-27 18:14:04'),
(5838, 62, 42, '213', '1', '2019-11-27 18:14:04', '2019-11-27 18:14:04'),
(5839, 50, 38, '200', '1', '2019-11-30 14:18:30', '2019-11-30 14:18:30'),
(5840, 50, 39, '203', '1', '2019-11-30 14:18:30', '2019-11-30 14:18:30'),
(5841, 50, 40, '207', '1', '2019-11-30 14:18:30', '2019-11-30 14:18:30'),
(6135, 70, 36, '190', '1', '2020-01-10 12:35:04', '2020-01-10 12:35:04'),
(6136, 70, 37, '194', '1', '2020-01-10 12:35:04', '2020-01-10 12:35:04'),
(6137, 70, 43, '219', '1', '2020-01-10 12:35:04', '2020-01-10 12:35:04'),
(6138, 70, 38, '199', '1', '2020-01-10 12:35:10', '2020-01-10 12:35:10'),
(6139, 70, 39, '203', '1', '2020-01-10 12:35:10', '2020-01-10 12:35:10'),
(6140, 70, 40, '208', '1', '2020-01-10 12:35:10', '2020-01-10 12:35:10'),
(6141, 70, 41, '210', '1', '2020-01-10 12:35:17', '2020-01-10 12:35:17'),
(6142, 70, 42, '213', '1', '2020-01-10 12:35:17', '2020-01-10 12:35:17'),
(6143, 70, 32, '179', '1', '2020-01-10 16:04:42', '2020-01-10 16:04:42'),
(6144, 70, 33, '183', '1', '2020-01-10 16:04:42', '2020-01-10 16:04:42'),
(6145, 70, 34, '186', '28%', '2020-01-10 16:04:42', '2020-01-10 16:04:42'),
(6146, 70, 35, '187', '40000', '2020-01-10 16:04:42', '2020-01-10 16:04:42'),
(6147, 70, 35, '188', '', '2020-01-10 16:04:42', '2020-01-10 16:04:42'),
(6148, 70, 35, '217', '', '2020-01-10 16:04:42', '2020-01-10 16:04:42'),
(6167, 72, 32, '178', '1', '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(6168, 72, 32, '180', '1', '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(6169, 72, 33, '185', '1', '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(6170, 72, 34, '186', '', '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(6171, 72, 35, '187', '10000', '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(6172, 72, 35, '188', '3000', '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(6173, 72, 35, '217', '10000', '2020-01-24 09:09:26', '2020-01-24 09:09:26'),
(6174, 72, 36, '189', '1', '2020-01-24 09:09:43', '2020-01-24 09:09:43'),
(6175, 72, 37, '195', '1', '2020-01-24 09:09:43', '2020-01-24 09:09:43'),
(6176, 72, 43, '218', '1', '2020-01-24 09:09:43', '2020-01-24 09:09:43'),
(6177, 72, 38, '200', '1', '2020-01-24 09:10:03', '2020-01-24 09:10:03'),
(6178, 72, 39, '205', '1', '2020-01-24 09:10:03', '2020-01-24 09:10:03'),
(6179, 72, 40, '207', '1', '2020-01-24 09:10:03', '2020-01-24 09:10:03'),
(6180, 72, 41, '210', '1', '2020-01-24 09:10:12', '2020-01-24 09:10:12'),
(6181, 72, 42, '215', '1', '2020-01-24 09:10:12', '2020-01-24 09:10:12'),
(6182, 48, 32, '178', '1', '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(6183, 48, 33, '182', '1', '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(6184, 48, 34, '186', '', '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(6185, 48, 35, '187', '', '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(6186, 48, 35, '188', '', '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(6187, 48, 35, '217', '', '2020-01-28 10:21:47', '2020-01-28 10:21:47'),
(6188, 48, 36, '189', '1', '2020-01-28 10:22:00', '2020-01-28 10:22:00'),
(6189, 48, 37, '193', '1', '2020-01-28 10:22:00', '2020-01-28 10:22:00'),
(6190, 48, 43, '218', '1', '2020-01-28 10:22:00', '2020-01-28 10:22:00'),
(6191, 48, 38, '198', '1', '2020-01-28 10:22:09', '2020-01-28 10:22:09'),
(6192, 48, 39, '203', '1', '2020-01-28 10:22:09', '2020-01-28 10:22:09'),
(6193, 48, 40, '206', '1', '2020-01-28 10:22:09', '2020-01-28 10:22:09'),
(6194, 48, 41, '209', '1', '2020-01-28 10:22:13', '2020-01-28 10:22:13'),
(6195, 48, 42, '213', '1', '2020-01-28 10:22:13', '2020-01-28 10:22:13'),
(6211, 85, 32, '178', '1', '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(6212, 85, 33, '182', '1', '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(6213, 85, 34, '186', '', '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(6214, 85, 35, '187', '', '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(6215, 85, 35, '188', '', '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(6216, 85, 35, '217', '', '2020-01-29 11:12:08', '2020-01-29 11:12:08'),
(6217, 85, 36, '189', '1', '2020-01-29 11:12:16', '2020-01-29 11:12:16'),
(6218, 85, 37, '193', '1', '2020-01-29 11:12:16', '2020-01-29 11:12:16'),
(6219, 85, 43, '218', '1', '2020-01-29 11:12:16', '2020-01-29 11:12:16'),
(6220, 85, 38, '198', '1', '2020-01-29 11:12:22', '2020-01-29 11:12:22'),
(6221, 85, 39, '203', '1', '2020-01-29 11:12:22', '2020-01-29 11:12:22'),
(6222, 85, 40, '206', '1', '2020-01-29 11:12:22', '2020-01-29 11:12:22'),
(6223, 85, 41, '209', '1', '2020-01-29 11:12:27', '2020-01-29 11:12:27'),
(6224, 85, 42, '213', '1', '2020-01-29 11:12:27', '2020-01-29 11:12:27'),
(6225, 53, 32, '178', '1', '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(6226, 53, 33, '182', '1', '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(6227, 53, 34, '186', '', '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(6228, 53, 35, '187', '', '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(6229, 53, 35, '188', '', '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(6230, 53, 35, '217', '', '2020-01-29 12:30:26', '2020-01-29 12:30:26'),
(6231, 53, 36, '189', '1', '2020-01-29 12:30:32', '2020-01-29 12:30:32'),
(6232, 53, 37, '193', '1', '2020-01-29 12:30:32', '2020-01-29 12:30:32'),
(6233, 88, 32, '180', '1', '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(6234, 88, 33, '182', '1', '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(6235, 88, 34, '186', '37%', '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(6236, 88, 35, '187', '500', '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(6237, 88, 35, '188', '300', '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(6238, 88, 35, '217', '2000', '2020-01-30 12:16:21', '2020-01-30 12:16:21'),
(6239, 88, 36, '189', '1', '2020-01-30 12:17:36', '2020-01-30 12:17:36'),
(6240, 88, 37, '195', '1', '2020-01-30 12:17:36', '2020-01-30 12:17:36'),
(6241, 88, 43, '219', '1', '2020-01-30 12:17:36', '2020-01-30 12:17:36'),
(6242, 88, 38, '198', '1', '2020-01-30 12:17:54', '2020-01-30 12:17:54'),
(6243, 88, 39, '203', '1', '2020-01-30 12:17:54', '2020-01-30 12:17:54'),
(6244, 88, 40, '206', '1', '2020-01-30 12:17:54', '2020-01-30 12:17:54'),
(6245, 88, 41, '209', '1', '2020-01-30 12:18:01', '2020-01-30 12:18:01'),
(6246, 88, 42, '213', '1', '2020-01-30 12:18:01', '2020-01-30 12:18:01'),
(6247, 84, 32, '178', '1', '2020-02-02 12:02:39', '2020-02-02 12:02:39'),
(6248, 84, 32, '180', '1', '2020-02-02 12:02:39', '2020-02-02 12:02:39'),
(6249, 84, 33, '184', '1', '2020-02-02 12:02:39', '2020-02-02 12:02:39'),
(6250, 84, 34, '186', '', '2020-02-02 12:02:39', '2020-02-02 12:02:39'),
(6251, 84, 35, '187', '10000', '2020-02-02 12:02:39', '2020-02-02 12:02:39'),
(6252, 84, 35, '188', '3000', '2020-02-02 12:02:39', '2020-02-02 12:02:39'),
(6253, 84, 35, '217', '10000', '2020-02-02 12:02:39', '2020-02-02 12:02:39'),
(6254, 84, 36, '189', '1', '2020-02-02 12:02:43', '2020-02-02 12:02:43'),
(6255, 84, 37, '195', '1', '2020-02-02 12:02:43', '2020-02-02 12:02:43'),
(6256, 84, 43, '218', '1', '2020-02-02 12:02:43', '2020-02-02 12:02:43'),
(6257, 84, 38, '200', '1', '2020-02-02 12:02:47', '2020-02-02 12:02:47'),
(6258, 84, 39, '205', '1', '2020-02-02 12:02:47', '2020-02-02 12:02:47'),
(6259, 84, 40, '207', '1', '2020-02-02 12:02:47', '2020-02-02 12:02:47'),
(6260, 84, 41, '210', '1', '2020-02-02 12:02:50', '2020-02-02 12:02:50'),
(6261, 84, 42, '215', '1', '2020-02-02 12:02:50', '2020-02-02 12:02:50'),
(6279, 40, 41, '209', '1', '2020-02-26 11:33:58', '2020-02-26 11:33:58'),
(6280, 40, 42, '214', '1', '2020-02-26 11:33:58', '2020-02-26 11:33:58'),
(6349, 46, 36, '190', '1', '2020-03-25 09:55:11', '2020-03-25 09:55:11'),
(6350, 46, 37, '195', '1', '2020-03-25 09:55:11', '2020-03-25 09:55:11'),
(6351, 46, 43, '218', '1', '2020-03-25 09:55:11', '2020-03-25 09:55:11'),
(6355, 46, 38, '200', '1', '2020-03-25 09:56:11', '2020-03-25 09:56:11'),
(6356, 46, 39, '205', '1', '2020-03-25 09:56:11', '2020-03-25 09:56:11'),
(6357, 46, 40, '207', '1', '2020-03-25 09:56:11', '2020-03-25 09:56:11'),
(6358, 46, 41, '210', '1', '2020-03-25 09:56:21', '2020-03-25 09:56:21'),
(6359, 46, 42, '216', '1', '2020-03-25 09:56:21', '2020-03-25 09:56:21'),
(6360, 21, 32, '179', '1', '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(6361, 21, 33, '183', '1', '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(6362, 21, 34, '186', '56%', '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(6363, 21, 35, '187', '80000', '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(6364, 21, 35, '188', '10000', '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(6365, 21, 35, '217', '1000', '2020-04-06 11:10:05', '2020-04-06 11:10:05'),
(6366, 21, 36, '190', '1', '2020-04-06 11:10:12', '2020-04-06 11:10:12'),
(6367, 21, 37, '194', '1', '2020-04-06 11:10:12', '2020-04-06 11:10:12'),
(6368, 21, 43, '220', '1', '2020-04-06 11:10:12', '2020-04-06 11:10:12'),
(6369, 21, 38, '200', '1', '2020-04-06 11:10:22', '2020-04-06 11:10:22'),
(6370, 21, 39, '204', '1', '2020-04-06 11:10:22', '2020-04-06 11:10:22'),
(6371, 21, 40, '207', '1', '2020-04-06 11:10:22', '2020-04-06 11:10:22'),
(6372, 21, 41, '210', '1', '2020-04-06 11:10:30', '2020-04-06 11:10:30'),
(6373, 21, 42, '214', '1', '2020-04-06 11:10:30', '2020-04-06 11:10:30'),
(6391, 1, 32, '178', '1', '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(6392, 1, 32, '180', '1', '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(6393, 1, 33, '183', '1', '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(6394, 1, 34, '186', '57%', '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(6395, 1, 35, '187', '50000', '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(6396, 1, 35, '188', '10000', '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(6397, 1, 35, '217', '1000', '2020-04-06 11:17:30', '2020-04-06 11:17:30'),
(6398, 1, 36, '191', '1', '2020-04-06 11:17:43', '2020-04-06 11:17:43'),
(6399, 1, 37, '195', '1', '2020-04-06 11:17:43', '2020-04-06 11:17:43'),
(6400, 1, 43, '220', '1', '2020-04-06 11:17:43', '2020-04-06 11:17:43'),
(6401, 1, 38, '201', '1', '2020-04-06 11:18:04', '2020-04-06 11:18:04'),
(6402, 1, 39, '204', '1', '2020-04-06 11:18:04', '2020-04-06 11:18:04'),
(6403, 1, 40, '208', '1', '2020-04-06 11:18:04', '2020-04-06 11:18:04'),
(6404, 1, 41, '210', '1', '2020-04-06 11:18:09', '2020-04-06 11:18:09'),
(6405, 1, 42, '215', '1', '2020-04-06 11:18:09', '2020-04-06 11:18:09'),
(6406, 90, 32, '178', '1', '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(6407, 90, 33, '183', '1', '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(6408, 90, 34, '186', '72%', '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(6409, 90, 35, '187', '40000', '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(6410, 90, 35, '188', '5000', '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(6411, 90, 35, '217', '2000', '2020-04-15 11:46:31', '2020-04-15 11:46:31'),
(6412, 90, 36, '192', '1', '2020-04-15 11:46:38', '2020-04-15 11:46:38'),
(6413, 90, 37, '193', '1', '2020-04-15 11:46:38', '2020-04-15 11:46:38'),
(6414, 90, 43, '221', '1', '2020-04-15 11:46:38', '2020-04-15 11:46:38'),
(6415, 90, 38, '199', '1', '2020-04-15 11:46:44', '2020-04-15 11:46:44'),
(6416, 90, 39, '204', '1', '2020-04-15 11:46:44', '2020-04-15 11:46:44'),
(6417, 90, 40, '208', '1', '2020-04-15 11:46:44', '2020-04-15 11:46:44'),
(6418, 90, 41, '211', '1', '2020-04-15 11:46:49', '2020-04-15 11:46:49'),
(6419, 90, 42, '214', '1', '2020-04-15 11:46:49', '2020-04-15 11:46:49'),
(6420, 18, 32, '180', '1', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6421, 18, 32, '181', '1', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6422, 18, 33, '182', '1', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6423, 18, 33, '183', '1', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6424, 18, 33, '184', '1', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6425, 18, 34, '186', '28%', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6426, 18, 35, '187', '30000', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6427, 18, 35, '188', '5000', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6428, 18, 35, '217', '5000', '2020-05-12 11:34:17', '2020-05-12 11:34:17'),
(6429, 18, 36, '192', '1', '2020-05-12 11:34:23', '2020-05-12 11:34:23'),
(6430, 18, 37, '196', '1', '2020-05-12 11:34:23', '2020-05-12 11:34:23'),
(6431, 18, 43, '221', '1', '2020-05-12 11:34:23', '2020-05-12 11:34:23'),
(6432, 18, 38, '202', '1', '2020-05-12 11:34:27', '2020-05-12 11:34:27'),
(6433, 18, 39, '203', '1', '2020-05-12 11:34:27', '2020-05-12 11:34:27'),
(6434, 18, 40, '207', '1', '2020-05-12 11:34:27', '2020-05-12 11:34:27'),
(6435, 18, 41, '212', '1', '2020-05-12 11:34:29', '2020-05-12 11:34:29'),
(6436, 18, 42, '215', '1', '2020-05-12 11:34:29', '2020-05-12 11:34:29'),
(7605, 93, 34, '186', '', '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(7606, 93, 35, '187', '', '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(7607, 93, 35, '188', '', '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(7608, 93, 35, '217', '', '2020-06-29 11:10:10', '2020-06-29 11:10:10'),
(7609, 95, 36, '189', '1', '2020-06-29 14:50:05', '2020-06-29 14:50:05'),
(7610, 95, 37, '193', '1', '2020-06-29 14:50:05', '2020-06-29 14:50:05'),
(7611, 95, 43, '219', '1', '2020-06-29 14:50:05', '2020-06-29 14:50:05'),
(7709, 9, 36, '192', '1', '2020-07-09 12:39:37', '2020-07-09 12:39:37'),
(7710, 9, 37, '195', '1', '2020-07-09 12:39:37', '2020-07-09 12:39:37'),
(7711, 9, 43, '220', '1', '2020-07-09 12:39:37', '2020-07-09 12:39:37'),
(7734, 97, 41, '212', '1', '2020-08-07 12:25:56', '2020-08-07 12:25:56'),
(7735, 9, 38, '200', '1', '2020-11-30 14:02:03', '2020-11-30 14:02:03'),
(7736, 9, 39, '203', '1', '2020-11-30 14:02:03', '2020-11-30 14:02:03'),
(7737, 9, 40, '207', '1', '2020-11-30 14:02:03', '2020-11-30 14:02:03'),
(7738, 99, 33, '184', '1', '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(7739, 99, 32, '180', '1', '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(7740, 99, 35, '187', '40000', '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(7741, 99, 35, '188', '', '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(7742, 99, 35, '217', '', '2020-12-02 17:27:03', '2020-12-02 17:27:03'),
(7743, 99, 36, '189', '1', '2020-12-02 17:27:24', '2020-12-02 17:27:24'),
(7744, 99, 37, '193', '1', '2020-12-02 17:27:24', '2020-12-02 17:27:24'),
(7745, 99, 43, '218', '1', '2020-12-02 17:27:24', '2020-12-02 17:27:24'),
(7746, 99, 38, '198', '1', '2020-12-02 17:27:52', '2020-12-02 17:27:52'),
(7747, 99, 39, '204', '1', '2020-12-02 17:27:52', '2020-12-02 17:27:52'),
(7748, 99, 40, '207', '1', '2020-12-02 17:27:52', '2020-12-02 17:27:52'),
(7749, 99, 41, '209', '1', '2020-12-02 17:28:18', '2020-12-02 17:28:18'),
(7750, 99, 42, '215', '1', '2020-12-02 17:28:18', '2020-12-02 17:28:18'),
(7763, 9, 33, '182', '1', '2020-12-16 17:28:33', '2020-12-16 17:28:33'),
(7764, 9, 33, '185', '1', '2020-12-16 17:28:33', '2020-12-16 17:28:33'),
(7765, 9, 32, '180', '1', '2020-12-16 17:28:33', '2020-12-16 17:28:33'),
(7766, 9, 34, '186', '79', '2020-12-16 17:28:33', '2020-12-16 17:28:33'),
(7767, 9, 35, '187', '44655', '2020-12-16 17:28:33', '2020-12-16 17:28:33'),
(7768, 9, 35, '188', '225555', '2020-12-16 17:28:33', '2020-12-16 17:28:33'),
(7769, 9, 35, '217', '772255', '2020-12-16 17:28:33', '2020-12-16 17:28:33'),
(7770, 9, 41, '210', '1', '2020-12-16 17:31:09', '2020-12-16 17:31:09'),
(7771, 9, 42, '214', '1', '2020-12-16 17:31:09', '2020-12-16 17:31:09'),
(7772, 105, 34, '186', '', '2021-02-05 11:31:50', '2021-02-05 11:31:50'),
(7773, 105, 35, '187', '', '2021-02-05 11:31:50', '2021-02-05 11:31:50');
INSERT INTO `user_question_options` (`id`, `user_id`, `question_id`, `options`, `value`, `created_on`, `updated_on`) VALUES
(7774, 105, 35, '188', '', '2021-02-05 11:31:50', '2021-02-05 11:31:50'),
(7775, 105, 35, '217', '', '2021-02-05 11:31:50', '2021-02-05 11:31:50'),
(7780, 107, 34, '186', '', '2021-02-14 19:26:39', '2021-02-14 19:26:39'),
(7781, 107, 35, '187', '100000', '2021-02-14 19:26:39', '2021-02-14 19:26:39'),
(7782, 107, 35, '188', '50000', '2021-02-14 19:26:39', '2021-02-14 19:26:39'),
(7783, 107, 35, '217', '40000', '2021-02-14 19:26:39', '2021-02-14 19:26:39'),
(7799, 108, 38, '198', '1', '2021-03-09 10:38:38', '2021-03-09 10:38:38'),
(7800, 108, 39, '204', '1', '2021-03-09 10:38:38', '2021-03-09 10:38:38'),
(7801, 108, 40, '206', '1', '2021-03-09 10:38:38', '2021-03-09 10:38:38'),
(7802, 108, 41, '209', '1', '2021-03-09 10:39:06', '2021-03-09 10:39:06'),
(7803, 108, 42, '215', '1', '2021-03-09 10:39:06', '2021-03-09 10:39:06'),
(7890, 110, 32, '178', '1', '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(7891, 110, 33, '183', '1', '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(7892, 110, 34, '186', '', '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(7893, 110, 35, '187', 'dfvsdvfb', '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(7894, 110, 35, '188', 'dxszvdxv', '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(7895, 110, 35, '217', 'xzcvxzv', '2021-04-22 19:04:07', '2021-04-22 19:04:07'),
(7896, 110, 37, '194', '1', '2021-04-22 19:04:15', '2021-04-22 19:04:15'),
(7898, 110, 39, '205', '1', '2021-04-22 19:04:23', '2021-04-22 19:04:23'),
(7906, 36, 36, '190', '1', '2021-04-23 10:04:26', '2021-04-23 10:04:26'),
(7907, 36, 37, '194', '1', '2021-04-23 10:04:26', '2021-04-23 10:04:26'),
(7908, 36, 43, '218', '1', '2021-04-23 10:04:26', '2021-04-23 10:04:26'),
(7918, 50, 41, '209', '1', '2021-04-27 15:03:35', '2021-04-27 15:03:35'),
(7919, 50, 42, '213', '1', '2021-04-27 15:03:35', '2021-04-27 15:03:35'),
(7922, 110, 42, '215', '1', '2021-05-06 17:50:51', '2021-05-06 17:50:51'),
(7923, 115, 44, '225', '1', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7924, 115, 32, '178', '1', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7925, 115, 32, '179', '1', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7926, 115, 33, '183', '1', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7927, 115, 34, '186', '50%', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7928, 115, 35, '187', '100000', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7929, 115, 35, '188', '40000', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7930, 115, 35, '217', '10000', '2021-05-07 17:08:14', '2021-05-07 17:08:14'),
(7931, 115, 36, '189', '1', '2021-05-07 17:08:30', '2021-05-07 17:08:30'),
(7932, 115, 37, '193', '1', '2021-05-07 17:08:30', '2021-05-07 17:08:30'),
(7933, 115, 43, '218', '1', '2021-05-07 17:08:30', '2021-05-07 17:08:30'),
(7934, 115, 38, '198', '1', '2021-05-07 17:08:37', '2021-05-07 17:08:37'),
(7935, 115, 39, '204', '1', '2021-05-07 17:08:37', '2021-05-07 17:08:37'),
(7936, 115, 40, '207', '1', '2021-05-07 17:08:37', '2021-05-07 17:08:37'),
(7937, 115, 41, '210', '1', '2021-05-07 17:08:43', '2021-05-07 17:08:43'),
(7938, 115, 42, '214', '1', '2021-05-07 17:08:43', '2021-05-07 17:08:43'),
(7958, 108, 32, '179', '1', '2021-06-22 18:14:59', '2021-06-22 18:14:59'),
(7959, 108, 33, '182', '1', '2021-06-22 18:14:59', '2021-06-22 18:14:59'),
(7960, 108, 34, '186', '73%', '2021-06-22 18:14:59', '2021-06-22 18:14:59'),
(7961, 108, 35, '187', '100000', '2021-06-22 18:14:59', '2021-06-22 18:14:59'),
(7962, 108, 35, '188', '40000', '2021-06-22 18:14:59', '2021-06-22 18:14:59'),
(7963, 108, 35, '217', '100', '2021-06-22 18:14:59', '2021-06-22 18:14:59'),
(7979, 108, 36, '192', '1', '2021-06-23 16:21:28', '2021-06-23 16:21:28'),
(7980, 108, 37, '196', '1', '2021-06-23 16:21:28', '2021-06-23 16:21:28'),
(7981, 108, 43, '218', '1', '2021-06-23 16:21:28', '2021-06-23 16:21:28'),
(7995, 116, 32, '181', '1', '2021-07-19 13:12:50', '2021-07-19 13:12:50'),
(7996, 116, 33, '184', '1', '2021-07-19 13:12:50', '2021-07-19 13:12:50'),
(7997, 116, 34, '186', '56%', '2021-07-19 13:12:50', '2021-07-19 13:12:50'),
(7998, 116, 35, '187', '50000', '2021-07-19 13:12:50', '2021-07-19 13:12:50'),
(7999, 116, 35, '188', '10000', '2021-07-19 13:12:50', '2021-07-19 13:12:50'),
(8000, 116, 35, '217', '20000', '2021-07-19 13:12:50', '2021-07-19 13:12:50'),
(8001, 116, 36, '190', '1', '2021-07-19 13:12:53', '2021-07-19 13:12:53'),
(8002, 116, 37, '195', '1', '2021-07-19 13:12:53', '2021-07-19 13:12:53'),
(8003, 116, 43, '222', '1', '2021-07-19 13:12:53', '2021-07-19 13:12:53'),
(8004, 116, 38, '199', '1', '2021-07-19 13:12:57', '2021-07-19 13:12:57'),
(8005, 116, 39, '203', '1', '2021-07-19 13:12:57', '2021-07-19 13:12:57'),
(8006, 116, 41, '210', '1', '2021-07-19 13:12:59', '2021-07-19 13:12:59'),
(8007, 116, 42, '214', '1', '2021-07-19 13:12:59', '2021-07-19 13:12:59'),
(8008, 117, 34, '186', '', '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(8009, 117, 35, '187', '', '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(8010, 117, 35, '188', '', '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(8011, 117, 35, '217', '', '2021-07-19 13:15:31', '2021-07-19 13:15:31'),
(8012, 36, 38, '200', '1', '2022-02-04 11:09:31', '2022-02-04 11:09:31'),
(8013, 36, 39, '205', '1', '2022-02-04 11:09:31', '2022-02-04 11:09:31'),
(8014, 36, 40, '207', '1', '2022-02-04 11:09:31', '2022-02-04 11:09:31'),
(8017, 36, 41, '210', '1', '2022-02-04 11:09:54', '2022-02-04 11:09:54'),
(8018, 36, 42, '215', '1', '2022-02-04 11:09:54', '2022-02-04 11:09:54'),
(8027, 118, 32, '178', '1', '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(8028, 118, 33, '182', '1', '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(8029, 118, 34, '186', '52%', '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(8030, 118, 35, '187', '20000', '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(8031, 118, 35, '188', '1000', '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(8032, 118, 35, '217', '10000', '2022-02-07 10:07:00', '2022-02-07 10:07:00'),
(8033, 118, 36, '189', '1', '2022-02-07 10:07:17', '2022-02-07 10:07:17'),
(8034, 118, 37, '194', '1', '2022-02-07 10:07:17', '2022-02-07 10:07:17'),
(8035, 118, 43, '220', '1', '2022-02-07 10:07:17', '2022-02-07 10:07:17'),
(8036, 118, 38, '198', '1', '2022-02-07 10:07:31', '2022-02-07 10:07:31'),
(8037, 118, 39, '204', '1', '2022-02-07 10:07:31', '2022-02-07 10:07:31'),
(8038, 118, 40, '207', '1', '2022-02-07 10:07:31', '2022-02-07 10:07:31'),
(8039, 118, 41, '210', '1', '2022-02-07 10:07:49', '2022-02-07 10:07:49'),
(8040, 118, 42, '214', '1', '2022-02-07 10:07:49', '2022-02-07 10:07:49'),
(8041, 120, 32, '178', '1', '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(8042, 120, 33, '184', '1', '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(8043, 120, 34, '186', '90%', '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(8044, 120, 35, '187', '600000', '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(8045, 120, 35, '188', '62000', '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(8046, 120, 35, '217', '400000', '2022-02-07 14:50:07', '2022-02-07 14:50:07'),
(8047, 120, 36, '190', '1', '2022-02-07 14:50:21', '2022-02-07 14:50:21'),
(8048, 120, 37, '194', '1', '2022-02-07 14:50:21', '2022-02-07 14:50:21'),
(8049, 120, 43, '220', '1', '2022-02-07 14:50:21', '2022-02-07 14:50:21'),
(8050, 120, 38, '198', '1', '2022-02-07 14:50:30', '2022-02-07 14:50:30'),
(8051, 120, 39, '205', '1', '2022-02-07 14:50:30', '2022-02-07 14:50:30'),
(8052, 120, 40, '207', '1', '2022-02-07 14:50:30', '2022-02-07 14:50:30'),
(8053, 120, 41, '210', '1', '2022-02-07 14:50:37', '2022-02-07 14:50:37'),
(8054, 120, 42, '214', '1', '2022-02-07 14:50:37', '2022-02-07 14:50:37'),
(8079, 109, 32, '178', '1', '2022-03-21 15:00:50', '2022-03-21 15:00:50'),
(8080, 109, 32, '180', '1', '2022-03-21 15:00:50', '2022-03-21 15:00:50'),
(8081, 109, 33, '182', '1', '2022-03-21 15:00:50', '2022-03-21 15:00:50'),
(8082, 109, 34, '186', '', '2022-03-21 15:00:50', '2022-03-21 15:00:50'),
(8083, 109, 35, '187', '6000', '2022-03-21 15:00:50', '2022-03-21 15:00:50'),
(8084, 109, 35, '188', '3000', '2022-03-21 15:00:50', '2022-03-21 15:00:50'),
(8085, 109, 35, '217', '10000', '2022-03-21 15:00:50', '2022-03-21 15:00:50'),
(8086, 109, 36, '189', '1', '2022-03-21 15:00:53', '2022-03-21 15:00:53'),
(8087, 109, 37, '195', '1', '2022-03-21 15:00:53', '2022-03-21 15:00:53'),
(8088, 109, 43, '218', '1', '2022-03-21 15:00:53', '2022-03-21 15:00:53'),
(8089, 109, 38, '201', '1', '2022-03-21 15:00:57', '2022-03-21 15:00:57'),
(8090, 109, 39, '205', '1', '2022-03-21 15:00:57', '2022-03-21 15:00:57'),
(8091, 109, 40, '208', '1', '2022-03-21 15:00:57', '2022-03-21 15:00:57'),
(8092, 109, 41, '210', '1', '2022-03-21 15:00:59', '2022-03-21 15:00:59'),
(8093, 109, 42, '216', '1', '2022-03-21 15:00:59', '2022-03-21 15:00:59'),
(8094, 36, 32, '178', '1', '2022-07-30 11:12:11', '2022-07-30 11:12:11'),
(8095, 36, 32, '179', '1', '2022-07-30 11:12:11', '2022-07-30 11:12:11'),
(8096, 36, 33, '183', '1', '2022-07-30 11:12:11', '2022-07-30 11:12:11'),
(8097, 36, 34, '186', '12%', '2022-07-30 11:12:11', '2022-07-30 11:12:11'),
(8098, 36, 35, '187', '100000', '2022-07-30 11:12:11', '2022-07-30 11:12:11'),
(8099, 36, 35, '188', '40000', '2022-07-30 11:12:11', '2022-07-30 11:12:11'),
(8100, 36, 35, '217', '50000', '2022-07-30 11:12:11', '2022-07-30 11:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privacy` enum('public','private') COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube_video_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `youtube_oauth`
--

CREATE TABLE `youtube_oauth` (
  `id` int(10) NOT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_user_maximum_profitability`
--
ALTER TABLE `set_user_maximum_profitability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_age_percent`
--
ALTER TABLE `tbl_admin_age_percent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_broker_document`
--
ALTER TABLE `tbl_admin_broker_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_broker_services`
--
ALTER TABLE `tbl_admin_broker_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_investments`
--
ALTER TABLE `tbl_admin_investments`
  ADD PRIMARY KEY (`investments_id`);

--
-- Indexes for table `tbl_admin_job_type_percent`
--
ALTER TABLE `tbl_admin_job_type_percent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_knowledge_percent`
--
ALTER TABLE `tbl_admin_knowledge_percent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_live_news`
--
ALTER TABLE `tbl_admin_live_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_maritial_status_percent`
--
ALTER TABLE `tbl_admin_maritial_status_percent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_referral_code`
--
ALTER TABLE `tbl_admin_referral_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_stock`
--
ALTER TABLE `tbl_admin_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_stock_configuration`
--
ALTER TABLE `tbl_admin_stock_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_stock_historical_data`
--
ALTER TABLE `tbl_admin_stock_historical_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_stock_industries`
--
ALTER TABLE `tbl_admin_stock_industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_stock_news`
--
ALTER TABLE `tbl_admin_stock_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_strategies`
--
ALTER TABLE `tbl_admin_strategies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_subscription_feature`
--
ALTER TABLE `tbl_admin_subscription_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_subscription_plan`
--
ALTER TABLE `tbl_admin_subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_tax_law`
--
ALTER TABLE `tbl_admin_tax_law`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_test_questions`
--
ALTER TABLE `tbl_admin_test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_test_question_options`
--
ALTER TABLE `tbl_admin_test_question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `question_id_2` (`question_id`),
  ADD KEY `question_id_3` (`question_id`);

--
-- Indexes for table `tbl_admin_time_slot`
--
ALTER TABLE `tbl_admin_time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_warning_alert`
--
ALTER TABLE `tbl_admin_warning_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advisor_availability_slots_datewise`
--
ALTER TABLE `tbl_advisor_availability_slots_datewise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advisor_availability_time_slots`
--
ALTER TABLE `tbl_advisor_availability_time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advisor_rating_reviews`
--
ALTER TABLE `tbl_advisor_rating_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advisor_user_funds`
--
ALTER TABLE `tbl_advisor_user_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_app_ussage`
--
ALTER TABLE `tbl_app_ussage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_investments_purchase_information`
--
ALTER TABLE `tbl_investments_purchase_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question_options`
--
ALTER TABLE `tbl_question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_simulation_count_with_user_level`
--
ALTER TABLE `tbl_simulation_count_with_user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock_purchase_information`
--
ALTER TABLE `tbl_stock_purchase_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_topFiveInvestmentFunds`
--
ALTER TABLE `tbl_topFiveInvestmentFunds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_brokers_management`
--
ALTER TABLE `tbl_users_brokers_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_experience`
--
ALTER TABLE `tbl_users_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_extra_settings`
--
ALTER TABLE `tbl_users_extra_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_trading_diary`
--
ALTER TABLE `tbl_users_trading_diary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_about_me`
--
ALTER TABLE `tbl_user_about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_adviser_referral_code_connectivity`
--
ALTER TABLE `tbl_user_adviser_referral_code_connectivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_advisor_connectivity`
--
ALTER TABLE `tbl_user_advisor_connectivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_advisor_learning`
--
ALTER TABLE `tbl_user_advisor_learning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_advisor_schedule_appointment`
--
ALTER TABLE `tbl_user_advisor_schedule_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_balance_sheet`
--
ALTER TABLE `tbl_user_balance_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_broker_document`
--
ALTER TABLE `tbl_user_broker_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_educations`
--
ALTER TABLE `tbl_user_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_investments_management`
--
ALTER TABLE `tbl_user_investments_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_payments`
--
ALTER TABLE `tbl_user_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_personel_info`
--
ALTER TABLE `tbl_user_personel_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_rf_rv_options_values`
--
ALTER TABLE `tbl_user_rf_rv_options_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_skilss`
--
ALTER TABLE `tbl_user_skilss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_stock_management`
--
ALTER TABLE `tbl_user_stock_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_subscription_plan`
--
ALTER TABLE `tbl_user_subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_test_question_answers`
--
ALTER TABLE `users_test_question_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_test_question_options`
--
ALTER TABLE `users_test_question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_question_answer`
--
ALTER TABLE `user_question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_question_options`
--
ALTER TABLE `user_question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_oauth`
--
ALTER TABLE `youtube_oauth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `set_user_maximum_profitability`
--
ALTER TABLE `set_user_maximum_profitability`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin_age_percent`
--
ALTER TABLE `tbl_admin_age_percent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin_broker_document`
--
ALTER TABLE `tbl_admin_broker_document`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin_broker_services`
--
ALTER TABLE `tbl_admin_broker_services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_admin_investments`
--
ALTER TABLE `tbl_admin_investments`
  MODIFY `investments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_admin_job_type_percent`
--
ALTER TABLE `tbl_admin_job_type_percent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin_knowledge_percent`
--
ALTER TABLE `tbl_admin_knowledge_percent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin_live_news`
--
ALTER TABLE `tbl_admin_live_news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_admin_maritial_status_percent`
--
ALTER TABLE `tbl_admin_maritial_status_percent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_admin_referral_code`
--
ALTER TABLE `tbl_admin_referral_code`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_admin_stock`
--
ALTER TABLE `tbl_admin_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbl_admin_stock_configuration`
--
ALTER TABLE `tbl_admin_stock_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin_stock_historical_data`
--
ALTER TABLE `tbl_admin_stock_historical_data`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=579;

--
-- AUTO_INCREMENT for table `tbl_admin_stock_industries`
--
ALTER TABLE `tbl_admin_stock_industries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin_stock_news`
--
ALTER TABLE `tbl_admin_stock_news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_admin_strategies`
--
ALTER TABLE `tbl_admin_strategies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin_subscription_feature`
--
ALTER TABLE `tbl_admin_subscription_feature`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_admin_subscription_plan`
--
ALTER TABLE `tbl_admin_subscription_plan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin_tax_law`
--
ALTER TABLE `tbl_admin_tax_law`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin_test_questions`
--
ALTER TABLE `tbl_admin_test_questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_admin_test_question_options`
--
ALTER TABLE `tbl_admin_test_question_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `tbl_admin_time_slot`
--
ALTER TABLE `tbl_admin_time_slot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_admin_warning_alert`
--
ALTER TABLE `tbl_admin_warning_alert`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_advisor_availability_slots_datewise`
--
ALTER TABLE `tbl_advisor_availability_slots_datewise`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1545;

--
-- AUTO_INCREMENT for table `tbl_advisor_availability_time_slots`
--
ALTER TABLE `tbl_advisor_availability_time_slots`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_advisor_rating_reviews`
--
ALTER TABLE `tbl_advisor_rating_reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_advisor_user_funds`
--
ALTER TABLE `tbl_advisor_user_funds`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_app_ussage`
--
ALTER TABLE `tbl_app_ussage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tbl_investments_purchase_information`
--
ALTER TABLE `tbl_investments_purchase_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_question_options`
--
ALTER TABLE `tbl_question_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `tbl_simulation_count_with_user_level`
--
ALTER TABLE `tbl_simulation_count_with_user_level`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_stock_purchase_information`
--
ALTER TABLE `tbl_stock_purchase_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_topFiveInvestmentFunds`
--
ALTER TABLE `tbl_topFiveInvestmentFunds`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_users_brokers_management`
--
ALTER TABLE `tbl_users_brokers_management`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_users_experience`
--
ALTER TABLE `tbl_users_experience`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_users_extra_settings`
--
ALTER TABLE `tbl_users_extra_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users_trading_diary`
--
ALTER TABLE `tbl_users_trading_diary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_user_about_me`
--
ALTER TABLE `tbl_user_about_me`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user_adviser_referral_code_connectivity`
--
ALTER TABLE `tbl_user_adviser_referral_code_connectivity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_user_advisor_connectivity`
--
ALTER TABLE `tbl_user_advisor_connectivity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_advisor_learning`
--
ALTER TABLE `tbl_user_advisor_learning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user_advisor_schedule_appointment`
--
ALTER TABLE `tbl_user_advisor_schedule_appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_user_balance_sheet`
--
ALTER TABLE `tbl_user_balance_sheet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `tbl_user_broker_document`
--
ALTER TABLE `tbl_user_broker_document`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user_educations`
--
ALTER TABLE `tbl_user_educations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_investments_management`
--
ALTER TABLE `tbl_user_investments_management`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `tbl_user_payments`
--
ALTER TABLE `tbl_user_payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_user_personel_info`
--
ALTER TABLE `tbl_user_personel_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tbl_user_rf_rv_options_values`
--
ALTER TABLE `tbl_user_rf_rv_options_values`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user_skilss`
--
ALTER TABLE `tbl_user_skilss`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_stock_management`
--
ALTER TABLE `tbl_user_stock_management`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `tbl_user_subscription_plan`
--
ALTER TABLE `tbl_user_subscription_plan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users_test_question_answers`
--
ALTER TABLE `users_test_question_answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users_test_question_options`
--
ALTER TABLE `users_test_question_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_question_answer`
--
ALTER TABLE `user_question_answer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

--
-- AUTO_INCREMENT for table `user_question_options`
--
ALTER TABLE `user_question_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8101;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `youtube_oauth`
--
ALTER TABLE `youtube_oauth`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
