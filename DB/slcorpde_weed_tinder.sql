-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2015 at 02:02 AM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slcorpde_weed_tinder`
--
CREATE DATABASE IF NOT EXISTS `slcorpde_weed_tinder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `slcorpde_weed_tinder`;

-- --------------------------------------------------------

--
-- Table structure for table `chatTest`
--

DROP TABLE IF EXISTS `chatTest`;
CREATE TABLE IF NOT EXISTS `chatTest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `to_user_id` int(5) NOT NULL,
  `from_user_id` int(5) NOT NULL,
  `chat_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2acfa1fb1bba9ff03fda44ff2265f817', '46.105.156.90', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:34.0) Gecko/20100101 Firefox/34.0', 1431399933, ''),
('f46ba23825eb7de5db8a1622cf204cdc', '110.224.213.46', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.3', 1431370014, '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
CREATE TABLE IF NOT EXISTS `cms_pages` (
  `pageId` varchar(16) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tenantId` varchar(16) NOT NULL,
  `AssignedUserId` varchar(16) NOT NULL,
  `dateAdded` date NOT NULL,
  `dateModified` date NOT NULL,
  `modifiedBy` varchar(16) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`pageId`, `title`, `slug`, `content`, `tenantId`, `AssignedUserId`, `dateAdded`, `dateModified`, `modifiedBy`, `deleted`, `status`) VALUES
('a3dfa384-211d-86', 'jQuery moving car!', 'Moving-Car', '<p>jQuery moving car!</p>', '1', '', '2014-07-22', '2015-04-21', 'epu10001', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `contactId` varchar(16) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `alpha_2` varchar(2) NOT NULL DEFAULT '',
  `alpha_3` varchar(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `alpha_2`, `alpha_3`) VALUES
(1, 'Afghanistan', 'af', 'afg'),
(2, 'Aland Islands', 'ax', 'ala'),
(3, 'Albania', 'al', 'alb'),
(4, 'Algeria', 'dz', 'dza'),
(5, 'American Samoa', 'as', 'asm'),
(6, 'Andorra', 'ad', 'and'),
(7, 'Angola', 'ao', 'ago'),
(8, 'Anguilla', 'ai', 'aia'),
(9, 'Antarctica', 'aq', ''),
(10, 'Antigua and Barbuda', 'ag', 'atg'),
(11, 'Argentina', 'ar', 'arg'),
(12, 'Armenia', 'am', 'arm'),
(13, 'Aruba', 'aw', 'abw'),
(14, 'Australia', 'au', 'aus'),
(15, 'Austria', 'at', 'aut'),
(16, 'Azerbaijan', 'az', 'aze'),
(17, 'Bahamas', 'bs', 'bhs'),
(18, 'Bahrain', 'bh', 'bhr'),
(19, 'Bangladesh', 'bd', 'bgd'),
(20, 'Barbados', 'bb', 'brb'),
(21, 'Belarus', 'by', 'blr'),
(22, 'Belgium', 'be', 'bel'),
(23, 'Belize', 'bz', 'blz'),
(24, 'Benin', 'bj', 'ben'),
(25, 'Bermuda', 'bm', 'bmu'),
(26, 'Bhutan', 'bt', 'btn'),
(27, 'Bolivia, Plurinational State of', 'bo', 'bol'),
(28, 'Bonaire, Sint Eustatius and Saba', 'bq', 'bes'),
(29, 'Bosnia and Herzegovina', 'ba', 'bih'),
(30, 'Botswana', 'bw', 'bwa'),
(31, 'Bouvet Island', 'bv', ''),
(32, 'Brazil', 'br', 'bra'),
(33, 'British Indian Ocean Territory', 'io', ''),
(34, 'Brunei Darussalam', 'bn', 'brn'),
(35, 'Bulgaria', 'bg', 'bgr'),
(36, 'Burkina Faso', 'bf', 'bfa'),
(37, 'Burundi', 'bi', 'bdi'),
(38, 'Cambodia', 'kh', 'khm'),
(39, 'Cameroon', 'cm', 'cmr'),
(40, 'Canada', 'ca', 'can'),
(41, 'Cape Verde', 'cv', 'cpv'),
(42, 'Cayman Islands', 'ky', 'cym'),
(43, 'Central African Republic', 'cf', 'caf'),
(44, 'Chad', 'td', 'tcd'),
(45, 'Chile', 'cl', 'chl'),
(46, 'China', 'cn', 'chn'),
(47, 'Christmas Island', 'cx', ''),
(48, 'Cocos (Keeling) Islands', 'cc', ''),
(49, 'Colombia', 'co', 'col'),
(50, 'Comoros', 'km', 'com'),
(51, 'Congo', 'cg', 'cog'),
(52, 'Congo, The Democratic Republic of the', 'cd', 'cod'),
(53, 'Cook Islands', 'ck', 'cok'),
(54, 'Costa Rica', 'cr', 'cri'),
(55, 'Cote d''Ivoire', 'ci', 'civ'),
(56, 'Croatia', 'hr', 'hrv'),
(57, 'Cuba', 'cu', 'cub'),
(58, 'Curacao', 'cw', 'cuw'),
(59, 'Cyprus', 'cy', 'cyp'),
(60, 'Czech Republic', 'cz', 'cze'),
(61, 'Denmark', 'dk', 'dnk'),
(62, 'Djibouti', 'dj', 'dji'),
(63, 'Dominica', 'dm', 'dma'),
(64, 'Dominican Republic', 'do', 'dom'),
(65, 'Ecuador', 'ec', 'ecu'),
(66, 'Egypt', 'eg', 'egy'),
(67, 'El Salvador', 'sv', 'slv'),
(68, 'Equatorial Guinea', 'gq', 'gnq'),
(69, 'Eritrea', 'er', 'eri'),
(70, 'Estonia', 'ee', 'est'),
(71, 'Ethiopia', 'et', 'eth'),
(72, 'Falkland Islands (Malvinas)', 'fk', 'flk'),
(73, 'Faroe Islands', 'fo', 'fro'),
(74, 'Fiji', 'fj', 'fji'),
(75, 'Finland', 'fi', 'fin'),
(76, 'France', 'fr', 'fra'),
(77, 'French Guiana', 'gf', 'guf'),
(78, 'French Polynesia', 'pf', 'pyf'),
(79, 'French Southern Territories', 'tf', ''),
(80, 'Gabon', 'ga', 'gab'),
(81, 'Gambia', 'gm', 'gmb'),
(82, 'Georgia', 'ge', 'geo'),
(83, 'Germany', 'de', 'deu'),
(84, 'Ghana', 'gh', 'gha'),
(85, 'Gibraltar', 'gi', 'gib'),
(86, 'Greece', 'gr', 'grc'),
(87, 'Greenland', 'gl', 'grl'),
(88, 'Grenada', 'gd', 'grd'),
(89, 'Guadeloupe', 'gp', 'glp'),
(90, 'Guam', 'gu', 'gum'),
(91, 'Guatemala', 'gt', 'gtm'),
(92, 'Guernsey', 'gg', 'ggy'),
(93, 'Guinea', 'gn', 'gin'),
(94, 'Guinea-Bissau', 'gw', 'gnb'),
(95, 'Guyana', 'gy', 'guy'),
(96, 'Haiti', 'ht', 'hti'),
(97, 'Heard Island and McDonald Islands', 'hm', ''),
(98, 'Holy See (Vatican City State)', 'va', 'vat'),
(99, 'Honduras', 'hn', 'hnd'),
(100, 'Hong Kong', 'hk', 'hkg'),
(101, 'Hungary', 'hu', 'hun'),
(102, 'Iceland', 'is', 'isl'),
(103, 'India', 'in', 'ind'),
(104, 'Indonesia', 'id', 'idn'),
(105, 'Iran, Islamic Republic of', 'ir', 'irn'),
(106, 'Iraq', 'iq', 'irq'),
(107, 'Ireland', 'ie', 'irl'),
(108, 'Isle of Man', 'im', 'imn'),
(109, 'Israel', 'il', 'isr'),
(110, 'Italy', 'it', 'ita'),
(111, 'Jamaica', 'jm', 'jam'),
(112, 'Japan', 'jp', 'jpn'),
(113, 'Jersey', 'je', 'jey'),
(114, 'Jordan', 'jo', 'jor'),
(115, 'Kazakhstan', 'kz', 'kaz'),
(116, 'Kenya', 'ke', 'ken'),
(117, 'Kiribati', 'ki', 'kir'),
(118, 'Korea, Democratic People''s Republic of', 'kp', 'prk'),
(119, 'Korea, Republic of', 'kr', 'kor'),
(120, 'Kuwait', 'kw', 'kwt'),
(121, 'Kyrgyzstan', 'kg', 'kgz'),
(122, 'Lao People''s Democratic Republic', 'la', 'lao'),
(123, 'Latvia', 'lv', 'lva'),
(124, 'Lebanon', 'lb', 'lbn'),
(125, 'Lesotho', 'ls', 'lso'),
(126, 'Liberia', 'lr', 'lbr'),
(127, 'Libyan Arab Jamahiriya', 'ly', 'lby'),
(128, 'Liechtenstein', 'li', 'lie'),
(129, 'Lithuania', 'lt', 'ltu'),
(130, 'Luxembourg', 'lu', 'lux'),
(131, 'Macao', 'mo', 'mac'),
(132, 'Macedonia, The former Yugoslav Republic of', 'mk', 'mkd'),
(133, 'Madagascar', 'mg', 'mdg'),
(134, 'Malawi', 'mw', 'mwi'),
(135, 'Malaysia', 'my', 'mys'),
(136, 'Maldives', 'mv', 'mdv'),
(137, 'Mali', 'ml', 'mli'),
(138, 'Malta', 'mt', 'mlt'),
(139, 'Marshall Islands', 'mh', 'mhl'),
(140, 'Martinique', 'mq', 'mtq'),
(141, 'Mauritania', 'mr', 'mrt'),
(142, 'Mauritius', 'mu', 'mus'),
(143, 'Mayotte', 'yt', 'myt'),
(144, 'Mexico', 'mx', 'mex'),
(145, 'Micronesia, Federated States of', 'fm', 'fsm'),
(146, 'Moldova, Republic of', 'md', 'mda'),
(147, 'Monaco', 'mc', 'mco'),
(148, 'Mongolia', 'mn', 'mng'),
(149, 'Montenegro', 'me', 'mne'),
(150, 'Montserrat', 'ms', 'msr'),
(151, 'Morocco', 'ma', 'mar'),
(152, 'Mozambique', 'mz', 'moz'),
(153, 'Myanmar', 'mm', 'mmr'),
(154, 'Namibia', 'na', 'nam'),
(155, 'Nauru', 'nr', 'nru'),
(156, 'Nepal', 'np', 'npl'),
(157, 'Netherlands', 'nl', 'nld'),
(158, 'New Caledonia', 'nc', 'ncl'),
(159, 'New Zealand', 'nz', 'nzl'),
(160, 'Nicaragua', 'ni', 'nic'),
(161, 'Niger', 'ne', 'ner'),
(162, 'Nigeria', 'ng', 'nga'),
(163, 'Niue', 'nu', 'niu'),
(164, 'Norfolk Island', 'nf', 'nfk'),
(165, 'Northern Mariana Islands', 'mp', 'mnp'),
(166, 'Norway', 'no', 'nor'),
(167, 'Oman', 'om', 'omn'),
(168, 'Pakistan', 'pk', 'pak'),
(169, 'Palau', 'pw', 'plw'),
(170, 'Palestinian Territory, Occupied', 'ps', 'pse'),
(171, 'Panama', 'pa', 'pan'),
(172, 'Papua New Guinea', 'pg', 'png'),
(173, 'Paraguay', 'py', 'pry'),
(174, 'Peru', 'pe', 'per'),
(175, 'Philippines', 'ph', 'phl'),
(176, 'Pitcairn', 'pn', 'pcn'),
(177, 'Poland', 'pl', 'pol'),
(178, 'Portugal', 'pt', 'prt'),
(179, 'Puerto Rico', 'pr', 'pri'),
(180, 'Qatar', 'qa', 'qat'),
(181, 'Reunion', 're', 'reu'),
(182, 'Romania', 'ro', 'rou'),
(183, 'Russian Federation', 'ru', 'rus'),
(184, 'Rwanda', 'rw', 'rwa'),
(185, 'Saint Barthelemy', 'bl', 'blm'),
(186, 'Saint Helena, Ascension and Tristan Da Cunha', 'sh', 'shn'),
(187, 'Saint Kitts and Nevis', 'kn', 'kna'),
(188, 'Saint Lucia', 'lc', 'lca'),
(189, 'Saint Martin (French Part)', 'mf', 'maf'),
(190, 'Saint Pierre and Miquelon', 'pm', 'spm'),
(191, 'Saint Vincent and The Grenadines', 'vc', 'vct'),
(192, 'Samoa', 'ws', 'wsm'),
(193, 'San Marino', 'sm', 'smr'),
(194, 'Sao Tome and Principe', 'st', 'stp'),
(195, 'Saudi Arabia', 'sa', 'sau'),
(196, 'Senegal', 'sn', 'sen'),
(197, 'Serbia', 'rs', 'srb'),
(198, 'Seychelles', 'sc', 'syc'),
(199, 'Sierra Leone', 'sl', 'sle'),
(200, 'Singapore', 'sg', 'sgp'),
(201, 'Sint Maarten (Dutch Part)', 'sx', 'sxm'),
(202, 'Slovakia', 'sk', 'svk'),
(203, 'Slovenia', 'si', 'svn'),
(204, 'Solomon Islands', 'sb', 'slb'),
(205, 'Somalia', 'so', 'som'),
(206, 'South Africa', 'za', 'zaf'),
(207, 'South Georgia and The South Sandwich Islands', 'gs', ''),
(208, 'South Sudan', 'ss', 'ssd'),
(209, 'Spain', 'es', 'esp'),
(210, 'Sri Lanka', 'lk', 'lka'),
(211, 'Sudan', 'sd', 'sdn'),
(212, 'Suriname', 'sr', 'sur'),
(213, 'Svalbard and Jan Mayen', 'sj', 'sjm'),
(214, 'Swaziland', 'sz', 'swz'),
(215, 'Sweden', 'se', 'swe'),
(216, 'Switzerland', 'ch', 'che'),
(217, 'Syrian Arab Republic', 'sy', 'syr'),
(218, 'Taiwan, Province of China', 'tw', ''),
(219, 'Tajikistan', 'tj', 'tjk'),
(220, 'Tanzania, United Republic of', 'tz', 'tza'),
(221, 'Thailand', 'th', 'tha'),
(222, 'Timor-Leste', 'tl', 'tls'),
(223, 'Togo', 'tg', 'tgo'),
(224, 'Tokelau', 'tk', 'tkl'),
(225, 'Tonga', 'to', 'ton'),
(226, 'Trinidad and Tobago', 'tt', 'tto'),
(227, 'Tunisia', 'tn', 'tun'),
(228, 'Turkey', 'tr', 'tur'),
(229, 'Turkmenistan', 'tm', 'tkm'),
(230, 'Turks and Caicos Islands', 'tc', 'tca'),
(231, 'Tuvalu', 'tv', 'tuv'),
(232, 'Uganda', 'ug', 'uga'),
(233, 'Ukraine', 'ua', 'ukr'),
(234, 'United Arab Emirates', 'ae', 'are'),
(235, 'United Kingdom', 'gb', 'gbr'),
(236, 'United States', 'us', 'usa'),
(237, 'United States Minor Outlying Islands', 'um', ''),
(238, 'Uruguay', 'uy', 'ury'),
(239, 'Uzbekistan', 'uz', 'uzb'),
(240, 'Vanuatu', 'vu', 'vut'),
(241, 'Venezuela, Bolivarian Republic of', 've', 'ven'),
(242, 'Viet Nam', 'vn', 'vnm'),
(243, 'Virgin Islands, British', 'vg', 'vgb'),
(244, 'Virgin Islands, U.S.', 'vi', 'vir'),
(245, 'Wallis and Futuna', 'wf', 'wlf'),
(246, 'Western Sahara', 'eh', 'esh'),
(247, 'Yemen', 'ye', 'yem'),
(248, 'Zambia', 'zm', 'zmb'),
(249, 'Zimbabwe', 'zw', 'zwe');

-- --------------------------------------------------------

--
-- Table structure for table `login_information`
--

DROP TABLE IF EXISTS `login_information`;
CREATE TABLE IF NOT EXISTS `login_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(16) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `userAgentHistory` varchar(255) NOT NULL,
  `loginTime` datetime NOT NULL,
  `logoutTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceId` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tenantId` varchar(16) NOT NULL,
  `AssignedUserId` varchar(16) NOT NULL,
  `dateAdded` date NOT NULL,
  `dateModified` date NOT NULL,
  `modifiedBy` varchar(16) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`serviceId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `title`, `slug`, `content`, `tenantId`, `AssignedUserId`, `dateAdded`, `dateModified`, `modifiedBy`, `deleted`, `status`) VALUES
('3de14702-fb17-6a95-2404-55361163a37b', 'Test', 'test', '<p>Testing</p>', '1', '', '2015-04-21', '2015-04-21', 'epu10001', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE IF NOT EXISTS `tenant` (
  `tenantId` varchar(16) NOT NULL,
  `tenantName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` enum('0','1') NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  PRIMARY KEY (`tenantId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenantId`, `tenantName`, `status`, `deleted`, `dateAdded`, `dateModified`) VALUES
('1', 'Admin', 1, '0', '0000-00-00 00:00:00', '2014-04-25 08:22:14'),
('dc9ae939-79c0-5c', 'Rajesh Saha', 1, '0', '2014-06-28 08:26:56', '2014-06-28 08:26:56'),
('b6b0019e-b9dd-a6', 'Sayan Mukherjee', 1, '0', '2014-06-28 07:57:42', '2014-06-28 07:57:42'),
('4f6c090a-d118-56', 'Sourav RoyChowdhury', 1, '0', '2014-06-28 07:24:55', '2014-06-28 07:26:26'),
('aeba75aa-e255-ce', 'Subarna Bhattachariya', 1, '0', '2014-06-28 05:54:06', '2014-06-28 06:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `workId` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `addedOn` datetime NOT NULL,
  `modifiedBy` varchar(255) NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`workId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` varchar(255) NOT NULL,
  `tenantId` varchar(16) NOT NULL,
  `assignedUserId` varchar(16) NOT NULL,
  `userTypeId` varchar(16) NOT NULL,
  `deleted` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_online` int(11) NOT NULL,
  `addedOn` datetime NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addedBy` varchar(255) NOT NULL,
  `modifiedBy` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `tenantId`, `assignedUserId`, `userTypeId`, `deleted`, `userName`, `password`, `status`, `is_online`, `addedOn`, `modifiedOn`, `addedBy`, `modifiedBy`) VALUES
('epu10001', '1', '', 'ut1', 0, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, '0000-00-00 00:00:00', '2015-04-20 11:38:01', '', ''),
('bc2d0cdf-01c5-08', '', '', 'ut2', 0, 'admin@slt.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, '2015-04-28 08:26:48', '2015-04-28 02:56:48', '', ''),
('5ac60dd7-7bb9-857c-1f50-554acdecc7cb', '', '', '', 0, 'vvvvv', '05f59f175b8961c00305e4ee7c88f9f2', 1, 0, '2015-05-07 02:27:59', '2015-05-07 02:27:59', '', ''),
('9493f2e6-58ce-5096-d4cb-554ad443c9c5', '', '', '', 0, 'vb v', '3621d77408498f9c0b833923029ebbf3', 1, 0, '2015-05-07 02:56:39', '2015-05-07 02:56:39', '', ''),
('d4c3aa93-f6c0-985c-e42a-554ad5433673', '', '', '', 0, 'gfgfgfc', '22b463bb118ecf343b2c5eb19594f569', 1, 0, '2015-05-07 02:59:16', '2015-05-07 02:59:16', '', ''),
('953e6a9d-ce91-a810-70a5-554adbad5101', '', '', '', 0, 'dddd', '77963b7a931377ad4ab5ad6a9cd718aa', 1, 0, '2015-05-07 03:24:53', '2015-05-07 03:24:53', '', ''),
('9fb2fcb4-949f-d060-f31b-554ae671add2', '', '', '', 0, 'cccc', '67c762276bced09ee4df0ed537d164ea', 1, 0, '2015-05-07 04:15:46', '2015-05-07 04:15:46', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_chat`
--

DROP TABLE IF EXISTS `user_chat`;
CREATE TABLE IF NOT EXISTS `user_chat` (
  `chat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `chat` longtext NOT NULL,
  `chat_key` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`),
  KEY `chat_id` (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_friends`
--

DROP TABLE IF EXISTS `user_friends`;
CREATE TABLE IF NOT EXISTS `user_friends` (
  `friend_id` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `chat_key` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=accept , 0=decline',
  `blocked` int(11) NOT NULL DEFAULT '0',
  `deleted` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`friend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `userProfileId` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `userProfileName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `ph_no` varchar(255) NOT NULL,
  `cityId` varchar(16) NOT NULL,
  `countryId` varchar(255) NOT NULL,
  `stateId` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `work` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `view_count` int(11) NOT NULL,
  `theme_id` varchar(16) NOT NULL,
  `profile_image` longtext NOT NULL,
  `profile_banner_image` varchar(255) NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` varchar(255) NOT NULL,
  `q1` int(11) NOT NULL COMMENT 'Q1="My energy level when using Cannabis is? ";1=''High'',2=''Medium'',3=''Low''',
  `q2` int(11) NOT NULL COMMENT 'Q2="When consuming Cannabis I prefer :" 1=''Smoking'', 2 = ''Vaporizing'' , 3=''Edibles'' , 4=''Its all Good''',
  `q3` int(11) NOT NULL COMMENT 'Q3 = "I want to meet other HighThere users who like :" ; 1=''Outdoors'' ,2=''Music'' , 3=''Tv/Movies'' , 4=''Culture'' , 5 = ''Gaming'' , 6= ''Food''',
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `dist` float NOT NULL,
  `min_age` text NOT NULL,
  `max_age` text NOT NULL,
  `diatance` text NOT NULL,
  `search_gender` text NOT NULL,
  PRIMARY KEY (`userProfileId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userProfileId`, `userId`, `fname`, `lname`, `userProfileName`, `email`, `email2`, `gender`, `dob`, `address`, `ph_no`, `cityId`, `countryId`, `stateId`, `pincode`, `description`, `work`, `tag`, `view_count`, `theme_id`, `profile_image`, `profile_banner_image`, `modifiedOn`, `modifiedBy`, `q1`, `q2`, `q3`, `lat`, `lon`, `dist`, `min_age`, `max_age`, `diatance`, `search_gender`) VALUES
('up1', 'epu10001', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '2014-07-21 09:35:54', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
('bc680e6c-1ff5-33', 'bc2d0cdf-01c5-08', 'S', 'LT', '', 'admin@slt.com', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '2015-04-28 02:56:48', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
('5ace1103-aa5e-fc02-b201-554acd49fdc7', '5ac60dd7-7bb9-857c-1f50-554acdecc7cb', 'gfgf', 'vvvv', '', 'vvvvv', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '2015-05-07 02:27:59', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
('949c6adf-b443-490f-6862-554ad4e408ff', '9493f2e6-58ce-5096-d4cb-554ad443c9c5', 'jhgyug', 'bvbv', '', 'vb v', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '2015-05-07 02:56:39', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
('d4ca1aff-e4a0-b5f6-38df-554ad5773fb0', 'd4c3aa93-f6c0-985c-e42a-554ad5433673', 'vv', 'jbjhbjh', '', 'gfgfgfc', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '2015-05-07 02:59:16', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
('9547975e-2add-d893-4c5e-554adbd9d32a', '953e6a9d-ce91-a810-70a5-554adbad5101', 'dddd', 'dddd', '', 'dddd', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '2015-05-07 03:24:53', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
('9fba395f-2011-f03a-7dca-554ae66dda49', '9fb2fcb4-949f-d060-f31b-554ae671add2', 'ccc', 'cccc', '', 'cccc', '', '', '0000-00-00', '', '', '', '', '', 0, '', '', '', 0, '', '', '', '2015-05-07 04:15:46', '', 0, 0, 0, 0, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_search_partners`
--

DROP TABLE IF EXISTS `user_search_partners`;
CREATE TABLE IF NOT EXISTS `user_search_partners` (
  `search_id` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `user_from` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=accept , 0=decline',
  `deleted` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`search_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

DROP TABLE IF EXISTS `user_settings`;
CREATE TABLE IF NOT EXISTS `user_settings` (
  `userSettingsId` varchar(16) NOT NULL,
  `userId` varchar(16) NOT NULL,
  `photo_access` int(11) NOT NULL,
  `share_stuff` int(11) NOT NULL,
  `tag_by_people` int(11) NOT NULL,
  `hide_profile_in_search` int(11) NOT NULL,
  `email_show` int(11) NOT NULL,
  `name_show` int(11) NOT NULL,
  `city_show` int(11) NOT NULL,
  `ph_show` int(11) NOT NULL,
  `comment_show` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `modifiedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `userTypeId` varchar(16) NOT NULL,
  `userTypeName` varchar(255) NOT NULL,
  `tenantId` varchar(16) NOT NULL,
  `assignedUserId` varchar(16) NOT NULL,
  `modifiedBy` varchar(16) NOT NULL,
  `deleted` enum('0','1') NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`userTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`userTypeId`, `userTypeName`, `tenantId`, `assignedUserId`, `modifiedBy`, `deleted`, `dateAdded`, `dateModified`, `status`) VALUES
('ut1', 'Administrator', '1', '', 'ept10001', '0', '2014-04-16 12:16:00', '2014-04-16 12:16:03', 1),
('ut2', 'User', '1', '', 'ept10001', '0', '2014-07-21 12:16:00', '2014-07-21 12:16:03', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
