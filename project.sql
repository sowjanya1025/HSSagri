-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 11:43 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_onboarding`
--

CREATE TABLE `client_onboarding` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `cl_clienttype` int(10) DEFAULT NULL,
  `cl_code` varchar(50) DEFAULT NULL,
  `cl_name` varchar(50) DEFAULT NULL,
  `cl_mobile` bigint(20) DEFAULT NULL,
  `cl_email` varchar(255) DEFAULT NULL,
  `cl_kyc` text DEFAULT NULL,
  `cl_agreementcopy` varchar(100) DEFAULT NULL,
  `cl_bank_acctholdername` varchar(100) DEFAULT NULL,
  `cl_bank_acctnumber` varchar(255) DEFAULT NULL,
  `cl_bank_ifsccode` varchar(100) DEFAULT NULL,
  `cl_bank_branchname` varchar(100) DEFAULT NULL,
  `cl_bank_cancelcheq` varchar(100) DEFAULT NULL,
  `cl_regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_onboarding`
--

INSERT INTO `client_onboarding` (`id`, `user_id`, `cl_clienttype`, `cl_code`, `cl_name`, `cl_mobile`, `cl_email`, `cl_kyc`, `cl_agreementcopy`, `cl_bank_acctholdername`, `cl_bank_acctnumber`, `cl_bank_ifsccode`, `cl_bank_branchname`, `cl_bank_cancelcheq`, `cl_regdate`) VALUES
(2, NULL, 2, 'CL002', 'saki', 9916612349, 'sakethchepuri@gmail.com', 'a:1:{i:0;s:34:\"or_kyc_1_260824082515_96945931.png\";}', 'or_agrcopy_1_260824082515_1235926315.png', 'cvcvb', '2342423', 'cvb', 'cvb', 'or_calche_1_260824082515_641487987.png', '2024-08-26 06:25:15'),
(3, '1', 4, 'CL003', 'sakethch', 991661233, 'saa@gmail.com', 'a:1:{i:0;s:36:\"gt_kyc_1_260824083315_1017827659.gif\";}', 'gt_agrcopy_1_260824083315_1124709436.png', 'sowjnaya', '2147483647', 'qwewe343434', 'sarjaour', 'gt_calche_1_260824083315_97829341.png', '2024-08-26 06:33:15'),
(4, NULL, 4, 'CL004', 'sakethch', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:35:\"rt_kyc_1_260824084442_440669360.png\";}', 'rt_agrcopy_1_260824084442_300424839.gif', 'sowjnaya', 'qwqw232323232', 'qwewe343434', '3453345', 'rt_calche_1_260824084442_2104173600.jpg', '2024-08-26 06:44:42'),
(5, NULL, 4, 'CL005', 'sakethch', 991661233, 'sa@gmail.com', 'a:1:{i:0;s:36:\"rt_kyc_1_260824084605_1024748298.png\";}', 'rt_agrcopy_1_260824084605_1944748527.png', 'sowjnaya', '2342423', 'xcv', 'sarjaour', 'rt_calche_1_260824084605_970284809.jpg', '2024-08-26 06:46:05'),
(6, NULL, 1, 'CL006', 'sakethch', 991661235, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:21:\"mt_kyc1_305596372.pdf\";}', '', '', 'qwaszx123456', '', '', '', '2024-09-16 11:53:21'),
(7, '1', 1, 'CL007', 'modern1', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:21:\"mt_kyc1_801254750.gif\";}', 'mt_agrcopy_1_1073930241.png', 'sowjnaya', '12313123123123123', 'asasas112121221', 'xcv', '', '2024-09-17 09:15:45'),
(8, '1', 4, 'CL008', 'reatil1', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:36:\"rt_kyc_1_170924111753_1406157824.png\";}', 'rt_agrcopy_1_170924111753_811280179.png', '', '', '', '', '', '2024-09-17 09:17:53'),
(9, '1', 1, 'CL009', 'modern1', 9916612338, 'sakethchepuri7@gmail.com', 'a:3:{i:0;s:22:\"mt_kyc1_1007470898.png\";i:1;s:22:\"mt_kyc1_1491579400.gif\";i:2;s:21:\"mt_kyc1_812351819.png\";}', 'mt_agrcopy_1_1218777516.gif', '', '', '', '', '', '2024-09-17 11:10:12'),
(10, '1', 2, 'CL010', 'oraca', 991661233, 'sakethchepuri7@gmail.com', 'a:3:{i:0;s:36:\"or_kyc_1_170924012038_1329281042.png\";i:1;s:36:\"or_kyc_1_170924012038_1500109374.gif\";i:2;s:36:\"or_kyc_1_170924012038_1740101761.png\";}', 'or_agrcopy_1_170924012038_1232659847.png', '', 'qwas2345', '', '', '', '2024-09-17 11:20:38'),
(11, '1', 1, '\"MT\"011', 'modern2', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:22:\"mt_kyc1_1613146164.pdf\";}', 'mt_agrcopy_1_1708218457.jpeg', '', '', '', '', '', '2024-09-27 06:49:40'),
(12, '1', 1, '$codetype001', 'asasas', 991661233, 'swjnambati@gmail.com', 'a:1:{i:0;s:22:\"mt_kyc1_1584861699.pdf\";}', 'mt_agrcopy_1_775412636.jpg', '', '', '', '', '', '2024-09-27 06:51:19'),
(13, '1', 1, 'MT001', 'sasd', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:21:\"mt_kyc1_138137264.pdf\";}', 'mt_agrcopy_1_32744446.jpg', '', '', '', '', '', '2024-09-27 06:54:47'),
(14, '1', 1, 'MT002', 'saki', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:21:\"mt_kyc1_251819672.pdf\";}', 'mt_agrcopy_1_1774226192.jpeg', '', '', '', '', '', '2024-09-27 06:56:01'),
(15, '1', 2, 'OR003', 'orea', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:36:\"or_kyc_1_270924085856_1899928387.pdf\";}', 'or_agrcopy_1_270924085856_835409963.png', '', '', '', '', '', '2024-09-27 06:58:56'),
(16, '1', 2, 'OR004', 'sakethch', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:35:\"or_kyc_1_270924090247_587160190.pdf\";}', 'or_agrcopy_1_270924090247_1447436477.jpg', '', '', '', '', '', '2024-09-27 07:02:47'),
(19, '1', 3, 'GT001', 'modern1', 991661233, 'sakethchepuri7@gmail.com', 'a:1:{i:0;s:35:\"gt_kyc_1_270924090634_598868920.pdf\";}', 'gt_agrcopy_1_270924090634_362005848.jpeg', '', '', '', '', '', '2024-09-27 07:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `company_onboarding`
--

CREATE TABLE `company_onboarding` (
  `id` int(11) NOT NULL,
  `user_id` text DEFAULT NULL,
  `cm_code` varchar(50) DEFAULT NULL,
  `cm_name` varchar(100) DEFAULT NULL,
  `cm_pan` varchar(100) DEFAULT NULL,
  `cm_reg` varchar(100) DEFAULT NULL,
  `cm_gst` varchar(100) DEFAULT NULL,
  `cm_adhar` varchar(100) DEFAULT NULL,
  `cm_cheque` varchar(100) DEFAULT NULL,
  `cm_kyc` text DEFAULT NULL,
  `cm_regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_onboarding`
--

INSERT INTO `company_onboarding` (`id`, `user_id`, `cm_code`, `cm_name`, `cm_pan`, `cm_reg`, `cm_gst`, `cm_adhar`, `cm_cheque`, `cm_kyc`, `cm_regdate`) VALUES
(4, NULL, 'C001', 'msa', 'BE565656', '121asw1', '1212121', '6578234590901', 'cm_1_488736843.png', 'a:2:{i:0;s:26:\"cm_kyc10109_2092381316.pdf\";i:1;s:27:\"cm_kyc10109_1753996583.jpeg\";}', '2024-08-20 05:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_onboarding`
--

CREATE TABLE `farmer_onboarding` (
  `id` int(11) NOT NULL,
  `user_id` int(25) DEFAULT NULL,
  `fr_code` varchar(50) DEFAULT NULL,
  `fr_name` varchar(250) DEFAULT NULL,
  `fr_contact` bigint(20) DEFAULT NULL,
  `fr_email` varchar(255) DEFAULT NULL,
  `fr_pan` varchar(100) DEFAULT NULL,
  `fr_adhar` varchar(100) DEFAULT NULL,
  `fr_image` varchar(100) DEFAULT NULL,
  `fr_kyc` text DEFAULT NULL,
  `fr_regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_onboarding`
--

INSERT INTO `farmer_onboarding` (`id`, `user_id`, `fr_code`, `fr_name`, `fr_contact`, `fr_email`, `fr_pan`, `fr_adhar`, `fr_image`, `fr_kyc`, `fr_regdate`) VALUES
(3, NULL, 'F001', 'saketh chepuri', 9945100436, 'sa@gmail.com', 'BE565656', '657823459090', 'fr_1_1815792680.jpg', 'a:2:{i:0;s:25:\"fr_kyc10109_226568835.pdf\";i:1;s:26:\"fr_kyc10109_650818697.jpeg\";}', '2024-08-20 05:19:51'),
(4, NULL, 'F002', 'srihaaschepuri', 991661233, 'srihaaschepuri@gmail.com', 'BE565656', '6578234590901', '', 'a:2:{i:0;s:22:\"fr_kyc1_1073950374.pdf\";i:1;s:22:\"fr_kyc1_1316349112.jpg\";}', '2024-09-06 10:28:54'),
(6, 1, 'F003', 'saketh', 991661233, '', '', '657823459090', '', 'a:3:{i:0;s:21:\"fr_kyc1_620570952.jpg\";i:1;s:22:\"fr_kyc1_1470206123.jpg\";i:2;s:21:\"fr_kyc1_771190281.jpg\";}', '2024-10-01 12:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `goods_receive_note`
--

CREATE TABLE `goods_receive_note` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `collection_center` varchar(255) DEFAULT NULL,
  `farmers_id` bigint(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `items_code` varchar(255) DEFAULT NULL,
  `items_code_id` bigint(20) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `totalamt` decimal(10,2) DEFAULT NULL,
  `approval_status` int(11) DEFAULT 2,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods_receive_note`
--

INSERT INTO `goods_receive_note` (`id`, `user_id`, `collection_center`, `farmers_id`, `item_name`, `items_code`, `items_code_id`, `quantity`, `price`, `totalamt`, `approval_status`, `regdate`) VALUES
(19, '1', NULL, 3, NULL, 'oni001', 55, '55.00', '55.00', '3025.00', 1, '2024-09-05 09:02:06'),
(20, NULL, NULL, 4, NULL, 'bee001', 2, '250.00', '500.00', '125000.00', 2, '2024-09-06 10:29:23'),
(21, NULL, NULL, 3, NULL, 'oni001', 55, '67.00', '56.00', '3752.00', 0, '2024-09-06 11:27:48'),
(22, '1', NULL, 5, NULL, 'oni001', 55, '65.00', '5.00', '325.00', 2, '2024-09-20 05:38:59'),
(23, NULL, NULL, 5, NULL, 'oni001', 55, '45.00', '33.00', '1485.00', 2, '2024-09-20 05:39:42'),
(24, NULL, 'Chikballapur CC', 3, NULL, 'oni001', 55, '2.50', '1.40', '3.50', 2, '2024-09-20 05:46:34'),
(25, '1', 'sarjapur', 5, NULL, 'bee001', 2, '34.50', '67.70', '2335.00', 1, '2024-09-20 05:49:49'),
(26, '1', 'bvrm', 5, NULL, 'oni001', 55, '36.00', '6.00', '216.00', 2, '2024-09-23 12:21:09'),
(27, '1', 'sar1', 3, 'Onion', 'ONI001', 55, '2.00', '4.00', '8.00', 2, '2024-09-25 12:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `goods_supply_bill`
--

CREATE TABLE `goods_supply_bill` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `collection_center` varchar(255) DEFAULT NULL,
  `client_type` int(50) DEFAULT NULL,
  `clients_id` bigint(20) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `items_code` varchar(255) DEFAULT NULL,
  `items_code_id` bigint(20) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `totalamt` decimal(10,2) DEFAULT NULL,
  `approval_status` int(11) DEFAULT 2,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goods_supply_bill`
--

INSERT INTO `goods_supply_bill` (`id`, `user_id`, `collection_center`, `client_type`, `clients_id`, `item_name`, `items_code`, `items_code_id`, `quantity`, `price`, `totalamt`, `approval_status`, `regdate`) VALUES
(2, '1', 'Chikballapur CC', 1, 7, 'Tomato-Hybrid', 'TOM001', 57, '78.00', '54.00', '4212.00', 1, '2024-09-25 10:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `item_category` int(25) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `item_quantity` varchar(255) DEFAULT NULL,
  `item_image` text DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `item_category`, `item_name`, `item_code`, `item_quantity`, `item_image`, `regdate`) VALUES
(1, NULL, NULL, 'Ash Gourd', 'ASH001', NULL, '[\"item_1_130824023359_1851810294.webp\",\"item_1_130824023359_975122421.webp\"]', '2024-08-13 12:33:59'),
(2, NULL, NULL, 'Beetroot', 'BEE001', NULL, '[\"item_1_130824023440_1327195374.webp\",\"item_1_130824023440_1047963659.webp\"]', '2024-08-13 12:34:40'),
(3, NULL, NULL, 'Bitter Gourd', 'BIT001', NULL, '[\"item_1_130824023502_1643576581.webp\",\"item_1_130824023502_1653726342.webp\"]', '2024-08-13 12:35:02'),
(4, NULL, NULL, 'Bottle Gourd', 'BOT001', NULL, '[\"item_1_130824023524_827420870.webp\",\"item_1_130824023524_1799482104.webp\"]', '2024-08-13 12:35:24'),
(5, NULL, NULL, 'Brinjal', 'BRI001', NULL, '[\"item_1_130824023549_980690316.webp\",\"item_1_130824023549_1043475616.webp\"]', '2024-08-13 12:35:49'),
(6, NULL, NULL, 'Bhendi', 'BHE001', NULL, '[\"item_1_130824023616_354262076.webp\",\"item_1_130824023616_2129478430.webp\"]', '2024-08-13 12:36:16'),
(7, NULL, NULL, 'Cabbage', 'CAB001', NULL, '[\"item_1_130824023649_1006663356.webp\",\"item_1_130824023649_1184342922.webp\"]', '2024-08-13 12:36:49'),
(8, NULL, NULL, 'Capsicum Green', 'CAPR001', NULL, '[\"item_1_130824023714_987846972.webp\",\"item_1_130824023714_558474836.webp\"]', '2024-08-13 12:37:14'),
(9, NULL, NULL, 'Carrot Local', 'CARL001', NULL, '[\"item_1_130824023739_1123183096.webp\",\"item_1_130824023739_2070764814.webp\"]', '2024-08-13 12:37:39'),
(10, NULL, NULL, 'Carrot Ooty', 'CARO001', NULL, '[\"item_1_130824023756_175682319.webp\",\"item_1_130824023756_1731288517.webp\"]', '2024-08-13 12:37:56'),
(11, NULL, NULL, 'Cauliflower', 'CAU001', NULL, '[\"item_1_130824023818_1669916487.webp\",\"item_1_130824023818_1081873771.webp\"]', '2024-08-13 12:38:18'),
(12, NULL, NULL, 'Beans Cluster', 'BEAC001', NULL, '[\"item_1_130824023916_359165200.webp\",\"item_1_130824023916_634634674.webp\"]', '2024-08-13 12:39:16'),
(13, NULL, NULL, 'Coconut Dry', 'COC001', NULL, '[\"item_1_130824023944_1681361058.webp\",\"item_1_130824023944_1196411777.webp\"]', '2024-08-13 12:39:44'),
(14, NULL, NULL, 'Colocasia', 'COL001', NULL, '[\"item_1_130824024100_1729326880.webp\",\"item_1_130824024101_1285949864.webp\"]', '2024-08-13 12:41:01'),
(15, NULL, NULL, 'Cucumber Hybrid', 'CUC001', NULL, '[\"item_1_130824024151_364271571.webp\",\"item_1_130824024151_1882520993.webp\"]', '2024-08-13 12:41:51'),
(16, NULL, NULL, 'Cucumber Sambar', 'CUCS001', NULL, '[\"item_1_130824024215_362775867.webp\",\"item_1_130824024215_1258862109.webp\"]', '2024-08-13 12:42:15'),
(17, NULL, NULL, 'Drumsticks', 'DRU001', NULL, '[\"item_1_130824024243_1188853976.webp\",\"item_1_130824024243_1079124554.webp\"]', '2024-08-13 12:42:43'),
(18, NULL, NULL, 'Beans French', 'BEAF001', NULL, '[\"item_1_130824024306_1077314465.webp\",\"item_1_130824024306_99278361.webp\"]', '2024-08-13 12:43:06'),
(19, NULL, NULL, 'Beans Haricot', 'BEAH001', NULL, '[\"item_1_130824024326_1564968297.webp\",\"item_1_130824024326_1664897920.webp\"]', '2024-08-13 12:43:26'),
(20, NULL, NULL, 'Gooseberry', 'GSE001', NULL, '[\"item_1_130824024347_853102462.webp\",\"item_1_130824024347_377667573.webp\"]', '2024-08-13 12:43:47'),
(21, NULL, NULL, 'Green Chilli', 'GRE001', NULL, '[\"item_1_130824024439_999873717.webp\",\"item_1_130824024439_1788982448.webp\"]', '2024-08-13 12:44:39'),
(22, NULL, NULL, 'Pointed Gourd', 'POI001', NULL, '[\"item_1_130824024458_107593793.webp\",\"item_1_130824024458_698779432.webp\"]', '2024-08-13 12:44:58'),
(23, NULL, NULL, 'Lemon', 'LEM001', NULL, '[\"item_1_130824024517_62212004.webp\",\"item_1_130824024517_1111956644.webp\"]', '2024-08-13 12:45:17'),
(24, NULL, NULL, 'Peas', 'PEA001', NULL, '[\"item_1_130824024541_1756450996.webp\",\"item_1_130824024541_388447729.webp\"]', '2024-08-13 12:45:41'),
(25, NULL, NULL, 'Pumpkin Green', 'PUPG001', NULL, '[\"item_1_130824024622_2023785148.webp\",\"item_1_130824024622_965990645.webp\"]', '2024-08-13 12:46:22'),
(26, NULL, NULL, 'Pumpkin Disco', 'PUMD001', NULL, '[\"item_1_130824024716_1995751138.webp\",\"item_1_130824024716_1136014398.webp\"]', '2024-08-13 12:47:16'),
(27, NULL, NULL, 'Radish', 'RAD001', NULL, '[\"item_1_130824024744_1346351380.webp\",\"item_1_130824024744_1902410815.webp\"]', '2024-08-13 12:47:44'),
(28, NULL, NULL, 'Raw Mango', 'RMAN001', NULL, '[\"item_1_130824024822_1428960703.webp\",\"item_1_130824024822_1490221186.webp\"]', '2024-08-13 12:48:22'),
(29, NULL, NULL, 'Ridge Gourd', 'RID001', NULL, '[\"item_1_130824024856_888879039.webp\",\"item_1_130824024856_1708540726.webp\"]', '2024-08-13 12:48:56'),
(30, NULL, NULL, 'Sweet Corn', 'COR001', NULL, '[\"item_1_130824024938_1706082158.webp\",\"item_1_130824024938_51680013.webp\"]', '2024-08-13 12:49:38'),
(32, NULL, NULL, 'Yams', 'YAM001', NULL, '[\"item_1_130824025042_538656250.webp\",\"item_1_130824025042_306584939.webp\"]', '2024-08-13 12:50:42'),
(33, NULL, NULL, 'Tamarind', 'TAM001', NULL, '[\"item_1_130824025106_1586387353.webp\"]', '2024-08-13 12:51:06'),
(34, NULL, NULL, 'Sweet Potato', 'SWP001', NULL, '[\"item_1_130824025218_462192527.webp\",\"item_1_130824025218_819488435.webp\"]', '2024-08-13 12:52:18'),
(35, NULL, NULL, 'Amaranth Leaves', 'AMRL001', NULL, '[\"item_1_190824104132_1655835907.webp\",\"item_1_190824104132_1305385953.webp\"]', '2024-08-19 08:41:32'),
(36, NULL, NULL, 'Coriander Leaves', 'CORL001', NULL, '[\"item_1_190824104201_1045754862.webp\",\"item_1_190824104201_2046674533.webp\"]', '2024-08-19 08:42:01'),
(42, NULL, NULL, 'Curry Leaves', 'CURL001', NULL, '[\"item_1_190824110217_1262128221.webp\",\"item_1_190824110217_1334010787.webp\"]', '2024-08-19 09:02:17'),
(43, NULL, NULL, 'Dill Leaves', 'DILL001', NULL, '[\"item_1_190824110308_1869376983.webp\"]', '2024-08-19 09:03:08'),
(44, NULL, NULL, 'Fenugreek Leaves', 'FENL001', NULL, '[\"item_1_190824110349_564379862.webp\",\"item_1_190824110349_183890021.webp\"]', '2024-08-19 09:03:49'),
(45, NULL, NULL, 'Mint Leaves', 'MINL001', NULL, '[\"item_1_190824110516_1677635611.webp\",\"item_1_190824110516_1363656293.webp\"]', '2024-08-19 09:05:16'),
(46, NULL, NULL, 'Spinach Leaves', 'SPIL001', NULL, '[\"item_1_190824110557_1486762395.webp\",\"item_1_190824110557_1708642299.webp\"]', '2024-08-19 09:05:57'),
(47, NULL, NULL, 'Spring Onion', 'SPRL001', NULL, '[\"item_1_190824110648_1445209096.webp\",\"item_1_190824110648_545391179.webp\"]', '2024-08-19 09:06:48'),
(48, NULL, NULL, 'Broccoli', 'BROC001', NULL, '[\"item_1_190824110921_626506250.webp\",\"item_1_190824110921_1180589111.webp\"]', '2024-08-19 09:09:21'),
(49, NULL, NULL, 'Capsicum Red', 'CAPR002', NULL, '[\"item_1_190824111000_1845729877.webp\",\"item_1_190824111000_1995512705.webp\"]', '2024-08-19 09:10:00'),
(50, NULL, NULL, 'Capsicum Yellow', 'CAPY003', NULL, '[\"item_1_190824111041_1697699621.webp\",\"item_1_190824111041_1387370922.webp\"]', '2024-08-19 09:10:41'),
(52, NULL, NULL, 'Garlic', 'GAR001', NULL, '[\"item_1_190824111245_1122205224.webp\",\"item_1_190824111245_1728141269.webp\",\"item_1_190824111245_108817802.webp\"]', '2024-08-19 09:12:45'),
(53, NULL, NULL, 'Ginger', 'GIN001', NULL, '[\"item_1_190824111304_1136615804.webp\",\"item_1_190824111304_1790183712.webp\"]', '2024-08-19 09:13:04'),
(54, NULL, NULL, 'Mushroom', 'MUS001', NULL, '[\"item_1_190824111329_63179753.webp\",\"item_1_190824111329_2032169963.webp\"]', '2024-08-19 09:13:29'),
(55, NULL, NULL, 'Onion', 'ONI001', NULL, '[\"item_1_190824111402_1080887906.webp\",\"item_1_190824111402_383684887.webp\"]', '2024-08-19 09:14:02'),
(56, NULL, NULL, 'Potato', 'POE001', NULL, '[\"item_1_190824111439_612960139.webp\",\"item_1_190824111439_824792511.webp\"]', '2024-08-19 09:14:39'),
(57, NULL, NULL, 'Tomato-Hybrid', 'TOM001', NULL, '[\"item_1_190824111508_456394111.webp\",\"item_1_190824111508_2052813305.webp\"]', '2024-08-19 09:15:08'),
(58, NULL, NULL, 'Tomato-Local', 'TOM002', NULL, '[\"item_1_190824111533_1759839527.webp\",\"item_1_190824111533_332890597.webp\"]', '2024-08-19 09:15:33'),
(60, NULL, 6, 'Apple-Indian', 'APP001', NULL, '[\"item_1_270824084818_1775263788.webp\",\"item_1_270824084818_1567715512.webp\"]', '2024-08-27 06:48:18'),
(61, NULL, 6, 'Banana-Robusta', 'BANR001', NULL, '[\"item_1_270824102737_1349846271.webp\",\"item_1_270824102737_1027795582.webp\"]', '2024-08-27 08:27:37'),
(62, NULL, 6, 'Banana-Yelakki', 'BANY001', NULL, '[\"item_1_270824121015_176865138.webp\",\"item_1_270824121015_271430877.webp\"]', '2024-08-27 10:10:15'),
(63, NULL, 6, 'Banana-Nendran', 'BANN001', NULL, '[\"item_1_270824121635_823744510.webp\",\"item_1_270824121635_1389775250.webp\"]', '2024-08-27 10:16:35'),
(64, NULL, 6, 'Orange-Nagpur', 'ORAN001', NULL, '[\"item_1_270824121735_673228568.webp\",\"item_1_270824121735_1888916578.webp\"]', '2024-08-27 10:17:35'),
(65, NULL, 6, 'Grapes-Sonaka', 'GRA001', NULL, '[\"item_1_270824121821_1834999878.webp\",\"item_1_270824121821_1436548029.webp\"]', '2024-08-27 10:18:21'),
(66, NULL, 6, 'Strawberry', 'SWB001', NULL, '[\"item_1_270824121905_636616915.webp\",\"item_1_270824121905_1479898704.webp\"]', '2024-08-27 10:19:05'),
(67, NULL, 6, 'Pineapple', 'PIN001', NULL, '[\"item_1_270824121950_2011762815.webp\",\"item_1_270824121950_286303293.webp\"]', '2024-08-27 10:19:50'),
(68, NULL, 6, 'Watermelon', 'WAT001', NULL, '[\"item_1_270824122032_2038561316.webp\",\"item_1_270824122032_1148753395.webp\"]', '2024-08-27 10:20:32'),
(69, NULL, 6, 'Pomegranate', 'POM001', NULL, '[\"item_1_270824122126_1984455161.webp\",\"item_1_270824122126_330712833.webp\"]', '2024-08-27 10:21:26'),
(70, NULL, 6, 'Guava', 'GUA001', NULL, '[\"item_1_270824122253_1049744978.webp\",\"item_1_270824122253_1549671703.webp\"]', '2024-08-27 10:22:53'),
(71, NULL, 6, 'Pear', 'PER001', NULL, '[\"item_1_270824122338_1485643210.webp\",\"item_1_270824122338_1474436238.webp\"]', '2024-08-27 10:23:38'),
(72, NULL, 6, 'Cherry', 'RRY001', NULL, '[\"item_1_270824122506_1200296492.webp\",\"item_1_270824122506_491381512.webp\"]', '2024-08-27 10:25:06'),
(73, NULL, 6, 'Papaya', 'PAP001', NULL, '[\"item_1_270824122536_719839602.webp\",\"item_1_270824122536_1117903448.webp\"]', '2024-08-27 10:25:36'),
(74, NULL, 6, 'Lychee', 'LYC001', NULL, '[\"item_1_270824122605_837716805.webp\",\"item_1_270824122605_2034456575.webp\"]', '2024-08-27 10:26:05'),
(75, NULL, 6, 'Avacado', 'AVA001', NULL, '[\"item_1_270824122649_160307184.webp\",\"item_1_270824122649_1193826623.webp\"]', '2024-08-27 10:26:49'),
(76, NULL, 6, 'PassionFruit', 'PAS001', NULL, '[\"item_1_270824122738_1744166285.webp\",\"item_1_270824122738_1761481631.webp\"]', '2024-08-27 10:27:38'),
(77, NULL, 6, 'Custard Apple', 'CUS001', NULL, '[\"item_1_270824122809_1500119962.webp\",\"item_1_270824122809_1261186366.webp\"]', '2024-08-27 10:28:09'),
(78, NULL, 6, 'sweet Tamarind', 'TAM010', NULL, '[\"item_1_270824122847_822143466.webp\",\"item_1_270824122847_974812746.webp\"]', '2024-08-27 10:28:47'),
(79, NULL, 6, 'Sapota', 'SAP001', NULL, '[\"item_1_270824122915_1442553142.webp\",\"item_1_270824122915_602055813.webp\"]', '2024-08-27 10:29:15'),
(80, NULL, 6, 'Peaches', 'PEC001', NULL, '[\"item_1_270824122959_1630069861.webp\",\"item_1_270824122959_141288969.webp\"]', '2024-08-27 10:29:59'),
(81, NULL, 6, 'Jamun', 'JAM001', NULL, '[\"item_1_270824123029_1128748214.webp\",\"item_1_270824123029_1944623376.webp\"]', '2024-08-27 10:30:29'),
(82, NULL, 6, 'Rambutan', 'RAM001', NULL, '[\"item_1_270824123103_1400425786.webp\",\"item_1_270824123103_312699194.webp\"]', '2024-08-27 10:31:03'),
(83, NULL, 6, 'Muskmelon', 'MUK001', NULL, '[\"item_1_270824123129_1123116447.webp\",\"item_1_270824123129_49508563.webp\"]', '2024-08-27 10:31:29'),
(84, NULL, 7, 'Apple-Imported', 'API001', NULL, '[\"item_1_270824123207_1895062760.webp\",\"item_1_270824123207_1979245653.webp\"]', '2024-08-27 10:32:07'),
(85, NULL, 7, 'Orange-Imported', 'ORAN002', NULL, '[\"item_1_270824123253_1402511292.webp\",\"item_1_270824123253_884210041.webp\"]', '2024-08-27 10:32:53'),
(86, NULL, 7, 'Grapes-RedGlobe', 'GRA002', NULL, '[\"item_1_270824123342_1316508987.webp\",\"item_1_270824123342_628933128.webp\"]', '2024-08-27 10:33:42'),
(87, NULL, 7, 'Guava-Thai', 'GUA002', NULL, '[\"item_1_270824123412_756682657.webp\",\"item_1_270824123412_1025702712.webp\"]', '2024-08-27 10:34:12'),
(88, NULL, 7, 'Kiwi', 'KIW001', NULL, '[\"item_1_270824123442_1574345266.webp\",\"item_1_270824123442_1903350988.webp\"]', '2024-08-27 10:34:42'),
(89, NULL, 7, 'Cherry-Imported', 'CHY001', NULL, '[\"item_1_270824123547_251154925.webp\",\"item_1_270824123547_915473910.webp\"]', '2024-08-27 10:35:47'),
(90, NULL, 7, 'Apricot', 'APR001', NULL, '[\"item_1_270824123837_250822733.webp\",\"item_1_270824123837_1957585983.webp\"]', '2024-08-27 10:38:37'),
(91, NULL, 7, 'DragonFruit', 'DRG001', NULL, '[\"item_1_270824123907_1681652900.webp\",\"item_1_270824123907_106588765.webp\"]', '2024-08-27 10:39:07'),
(92, NULL, 7, 'Dates', 'DAT001', NULL, '[\"item_1_270824123934_1773655394.webp\",\"item_1_270824123934_760328210.webp\"]', '2024-08-27 10:39:34'),
(93, NULL, 8, 'Mango-Alphanso', 'ALP001', NULL, '[\"item_1_270824124047_1863457858.webp\",\"item_1_270824124047_137367111.webp\"]', '2024-08-27 10:40:47'),
(94, NULL, 8, 'Mango-Banganpalli', 'BAN002', NULL, '[\"item_1_270824124142_1653425280.webp\",\"item_1_270824124142_366839887.webp\"]', '2024-08-27 10:41:42'),
(95, NULL, 7, 'Mango-Mallika', 'MAL001', NULL, '[\"item_1_270824124215_280115423.webp\",\"item_1_270824124215_257130122.webp\"]', '2024-08-27 10:42:15'),
(96, NULL, 8, 'Mango-SugarBaby', 'SUG001', NULL, '[\"item_1_270824124301_1422617799.webp\",\"item_1_270824124301_1918679626.webp\"]', '2024-08-27 10:43:01'),
(97, NULL, 8, 'Mango-Raspuri', 'RAS002', NULL, '[\"item_1_270824124343_1859804114.webp\",\"item_1_270824124343_1722447599.webp\"]', '2024-08-27 10:43:43'),
(98, NULL, 8, 'Mango-Sindhura', 'SIN001', NULL, '[\"item_1_270824124417_1123136467.webp\",\"item_1_270824124417_345198640.webp\"]', '2024-08-27 10:44:17'),
(99, NULL, 8, 'Mango-Neelam', 'NEE001', NULL, '[\"item_1_270824124450_1958219199.webp\",\"item_1_270824124450_618822288.webp\"]', '2024-08-27 10:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `items_categories`
--

CREATE TABLE `items_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_categories`
--

INSERT INTO `items_categories` (`id`, `category_name`) VALUES
(1, 'vegetables'),
(2, 'leafy vegetables'),
(3, 'exotic vegetables'),
(4, 'spices'),
(5, 'bulk'),
(6, 'fruits'),
(7, 'imported fruits'),
(8, 'mango');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mobile`, `email`, `reset_token`, `reset_expires`, `regdate`) VALUES
(1, NULL, 'c3284d0f94606de1fd2af172aba15bf3', NULL, 'admin@admin.com', '5c817b86dbc803f3da72bd23a937cf4647262385d7f104ec0c1627b1818dc50e9c8a69796e224c77be185e2e0098bc40a4fa', '0000-00-00 00:00:00', '2024-07-25 10:39:25'),
(2, NULL, '573187c17c531ec07d8a3ad9e933bbc2', NULL, 'sakethchepuri7@gmail.com', '8c1f4ad87640ec77e5ab08494b54783bae4233669d7eb3266974777178683ca057afdf8f5ece77fdc34710d6797b168684f5', '2024-09-30 13:31:06', '2024-07-25 10:55:47'),
(3, NULL, 'b76630951fe6842f8cdb634ad6a74bbf', NULL, 'swjnambati@gmail.com', NULL, NULL, '2024-09-17 11:27:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_onboarding`
--
ALTER TABLE `client_onboarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_onboarding`
--
ALTER TABLE `company_onboarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer_onboarding`
--
ALTER TABLE `farmer_onboarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_receive_note`
--
ALTER TABLE `goods_receive_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_supply_bill`
--
ALTER TABLE `goods_supply_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_categories`
--
ALTER TABLE `items_categories`
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
-- AUTO_INCREMENT for table `client_onboarding`
--
ALTER TABLE `client_onboarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `company_onboarding`
--
ALTER TABLE `company_onboarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farmer_onboarding`
--
ALTER TABLE `farmer_onboarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goods_receive_note`
--
ALTER TABLE `goods_receive_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `goods_supply_bill`
--
ALTER TABLE `goods_supply_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `items_categories`
--
ALTER TABLE `items_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
