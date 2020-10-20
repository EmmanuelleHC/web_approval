-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 08:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `approval`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval_master`
--

CREATE TABLE `approval_master` (
  `ID` int(11) NOT NULL,
  `ID_APP` int(11) NOT NULL,
  `ORG_ID` int(11) NOT NULL,
  `AMOUNT_FROM` int(11) DEFAULT NULL,
  `AMOUNT_TO` int(11) DEFAULT NULL,
  `ID_APPR_1` int(11) NOT NULL,
  `ID_APPR_2` int(11) NOT NULL,
  `ID_APPR_3` int(11) DEFAULT NULL,
  `ID_APPR_4` int(11) DEFAULT NULL,
  `ID_APPR_5` int(11) DEFAULT NULL,
  `ID_APPR_6` int(11) DEFAULT NULL,
  `ID_APPR_7` int(11) DEFAULT NULL,
  `ID_APPR_8` int(11) DEFAULT NULL,
  `ID_APPR_9` int(11) DEFAULT NULL,
  `ID_APPR_10` int(11) DEFAULT NULL,
  `ID_APPR_11` int(11) DEFAULT NULL,
  `ID_APPR_12` int(11) DEFAULT NULL,
  `ID_APPR_13` int(11) DEFAULT NULL,
  `ID_APPR_14` int(11) DEFAULT NULL,
  `ID_APPR_15` int(11) DEFAULT NULL,
  `ACTIVE_FLAG` varchar(255) NOT NULL,
  `PRIMARY_FLAG` varchar(255) NOT NULL,
  `CREATED_BY` varchar(255) NOT NULL,
  `UPDATED_BY` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval_master`
--

INSERT INTO `approval_master` (`ID`, `ID_APP`, `ORG_ID`, `AMOUNT_FROM`, `AMOUNT_TO`, `ID_APPR_1`, `ID_APPR_2`, `ID_APPR_3`, `ID_APPR_4`, `ID_APPR_5`, `ID_APPR_6`, `ID_APPR_7`, `ID_APPR_8`, `ID_APPR_9`, `ID_APPR_10`, `ID_APPR_11`, `ID_APPR_12`, `ID_APPR_13`, `ID_APPR_14`, `ID_APPR_15`, `ACTIVE_FLAG`, `PRIMARY_FLAG`, `CREATED_BY`, `UPDATED_BY`, `created_at`, `updated_at`) VALUES
(1, 1, 889, 0, 0, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y', '', '1', '1', '2020-10-15 17:00:00', '2020-10-15 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE `emp_master` (
  `ID` int(11) NOT NULL,
  `EMP_NUMBER` int(11) NOT NULL,
  `EMP_NAME` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `EMAIL_USER` varchar(255) NOT NULL,
  `EMAIL_OTP` varchar(255) NOT NULL,
  `COMPANY_ID` int(11) NOT NULL,
  `ORG_ID` int(11) NOT NULL,
  `ACTIVE_FLAG` varchar(255) NOT NULL,
  `INACTIVE_DATE` date DEFAULT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_BY` varchar(255) NOT NULL,
  `UPDATED_BY` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_master`
--

INSERT INTO `emp_master` (`ID`, `EMP_NUMBER`, `EMP_NAME`, `DESCRIPTION`, `EMAIL_USER`, `EMAIL_OTP`, `COMPANY_ID`, `ORG_ID`, `ACTIVE_FLAG`, `INACTIVE_DATE`, `USER_ID`, `CREATED_BY`, `UPDATED_BY`, `created_at`, `updated_at`) VALUES
(1, 2015050225, 'EMMA', 'LALALLA', 'emma@indomaret.co.id', '', 1, 81, 'Y', NULL, 2, '1', '1', '2020-10-14 17:00:00', '2020-10-14 17:00:00'),
(2, 2015050226, 'YIHA', '', 'emma@indomaret.co.id', '', 1, 889, 'Y', NULL, 6, '1', '1', '2020-10-14 17:00:00', '2020-10-14 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `ID` int(11) NOT NULL,
  `ID_TRX` bigint(20) NOT NULL,
  `ID_APP` int(11) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `APPROVAL_TYPE` varchar(255) NOT NULL,
  `REASON_APPROVAL` varchar(255) DEFAULT NULL,
  `EMP_ID` int(11) NOT NULL,
  `APPROVAL_KE` int(11) NOT NULL,
  `CREATED_BY` varchar(255) NOT NULL,
  `UPDATED_BY` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`ID`, `ID_TRX`, `ID_APP`, `DESCRIPTION`, `APPROVAL_TYPE`, `REASON_APPROVAL`, `EMP_ID`, `APPROVAL_KE`, `CREATED_BY`, `UPDATED_BY`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'APPROVE', 'P3AT', '', 2, 1, '1', '1', '2020-10-14 17:00:00', '2020-10-14 17:00:00'),
(2, 2, 1, 'Approve', 'P3AT', NULL, 2, 1, '6', '6', '2020-10-19 04:46:42', '2020-10-19 04:46:42'),
(3, 2, 1, 'Approve', 'P3AT', NULL, 2, 1, '6', '6', '2020-10-19 04:51:38', '2020-10-19 04:51:38'),
(4, 2, 1, 'Approve', 'P3AT', 'jijijijijiji', 2, 1, '6', '6', '2020-10-19 07:21:04', '2020-10-19 07:21:04'),
(5, 2, 1, 'Approve', 'P3AT', 'TES', 2, 1, '6', '6', '2020-10-19 07:28:57', '2020-10-19 07:28:57'),
(6, 2, 1, 'Rejected', 'P3AT', 'uuhuhu', 2, 1, '6', '6', '2020-10-19 07:35:31', '2020-10-19 07:35:31'),
(7, 1, 1, 'Approve', 'P3AT', 'TEST', 2, 1, '6', '6', '2020-10-20 03:03:33', '2020-10-20 03:03:33'),
(8, 1, 1, 'Approve', 'P3AT', 'YES', 1, 2, '2', '2', '2020-10-20 03:03:56', '2020-10-20 03:03:56'),
(9, 1, 1, 'Approve', 'P3AT', '', 2, 1, '6', '6', '2020-10-20 03:43:27', '2020-10-20 03:43:27'),
(10, 1, 1, 'Approve', 'P3AT', '', 2, 1, '6', '6', '2020-10-20 03:49:45', '2020-10-20 03:49:45'),
(11, 1, 1, 'Approve', 'P3AT', '', 2, 1, '6', '6', '2020-10-20 03:50:51', '2020-10-20 03:50:51'),
(12, 1, 1, 'Approve', 'P3AT', '', 2, 1, '6', '6', '2020-10-20 03:53:32', '2020-10-20 03:53:32');

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
(2, '2020_10_06_063131_p3at_trx', 1),
(4, '2020_10_11_093615_add_log_history', 3),
(5, '2020_10_11_094117_add_approval_master', 3),
(6, '2020_10_11_093046_add_app_master', 4),
(7, '2020_10_15_115859_add_emp_master-to_table', 5),
(9, '2020_10_20_032240_add_sys_ref_num_otp', 6);

-- --------------------------------------------------------

--
-- Table structure for table `p3at_master_trx`
--

CREATE TABLE `p3at_master_trx` (
  `ID` bigint(20) NOT NULL,
  `COMPANY_ID` int(11) NOT NULL,
  `ORG_ID` bigint(20) NOT NULL,
  `P3AT_NUMBER` varchar(255) NOT NULL,
  `P3AT_DATE` date NOT NULL,
  `ASSET_NUMBER` varchar(11) NOT NULL,
  `ASSET_NAME` varchar(255) NOT NULL,
  `EFFECTIVE_DATE` date NOT NULL,
  `QTY_ASSET` int(11) NOT NULL,
  `ASSET_PRICE` int(11) NOT NULL,
  `ASSET_LOCATION` varchar(255) NOT NULL,
  `COST_OF_REMOVAL` int(11) NOT NULL,
  `BOOKS_PRICE` int(11) NOT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `REASON_REMOVAL` varchar(255) NOT NULL,
  `CREATED_BY` varchar(255) NOT NULL,
  `UPDATED_BY` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p3at_master_trx`
--

INSERT INTO `p3at_master_trx` (`ID`, `COMPANY_ID`, `ORG_ID`, `P3AT_NUMBER`, `P3AT_DATE`, `ASSET_NUMBER`, `ASSET_NAME`, `EFFECTIVE_DATE`, `QTY_ASSET`, `ASSET_PRICE`, `ASSET_LOCATION`, `COST_OF_REMOVAL`, `BOOKS_PRICE`, `STATUS`, `REASON_REMOVAL`, `CREATED_BY`, `UPDATED_BY`, `created_at`, `updated_at`) VALUES
(1, 1, 889, '0830/P3AT-GA PRG/07/20', '2020-07-02', '1', 'ALAT TULIS', '2014-11-20', 1, 1000000, 'INDONESIA', 30000, 50000, 'New', '', '1120', '6', '2020-10-05 17:00:00', '2020-10-20 03:53:32'),
(2, 1, 889, '0830/P3AT-GA PRG/07/20', '2020-07-02', 'C08.010011', 'KOMPUTER WS BASIC ZYREX TACZ01 WIN 7 QHJT7', '2014-11-20', 1, 5130000, '08.T21K.000000.00000000', 0, 0, 'New', 'Rusak, Biaya Perbaikan Tinggi', '1130', '6', NULL, '2020-10-20 03:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `sys_app_master`
--

CREATE TABLE `sys_app_master` (
  `ID` int(11) NOT NULL,
  `APP_NAME` varchar(255) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_app_master`
--

INSERT INTO `sys_app_master` (`ID`, `APP_NAME`, `CREATED_BY`, `UPDATED_BY`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'P3AT APPROVAL', 1130, 1130, '2020-10-14 04:12:09', '2020-10-14 04:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `sys_branch`
--

CREATE TABLE `sys_branch` (
  `BRANCH_ID` int(11) NOT NULL,
  `BRANCH_CODE` varchar(6) NOT NULL,
  `BRANCH_NAME` varchar(255) NOT NULL,
  `ALTERNATE_NAME` varchar(30) NOT NULL,
  `ORG_ID` int(11) NOT NULL,
  `SOB_ID` int(11) DEFAULT NULL,
  `ORG_TYPE` varchar(30) NOT NULL,
  `COMPANY_ID` int(11) NOT NULL,
  `FTP_PATH` varchar(255) NOT NULL,
  `ADDRESS1` varchar(200) DEFAULT NULL,
  `ADDRESS2` varchar(200) DEFAULT NULL,
  `ADDRESS3` varchar(200) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `VAT_REGISTRATION_NUM` varchar(50) DEFAULT NULL,
  `TGL_NPWP` date DEFAULT NULL,
  `ADDRESS_PKP` varchar(255) DEFAULT NULL,
  `POSTAL_CODE` varchar(255) DEFAULT NULL,
  `PHONE` varchar(100) DEFAULT NULL,
  `FAX` varchar(100) DEFAULT NULL,
  `MANAGER` varchar(100) DEFAULT NULL,
  `FLAG_GRAFIK` varchar(100) DEFAULT NULL,
  `ATTRIBUTE1` varchar(255) DEFAULT NULL,
  `ATTRIBUTE2` varchar(255) DEFAULT NULL,
  `ATTRIBUTE3` varchar(255) DEFAULT NULL,
  `ATTRIBUTE4` varchar(255) DEFAULT NULL,
  `ATTRIBUTE5` varchar(255) DEFAULT NULL,
  `ATTRIBUTE6` varchar(255) DEFAULT NULL,
  `ATTRIBUTE7` varchar(255) DEFAULT NULL,
  `ATTRIBUTE8` varchar(255) DEFAULT NULL,
  `ATTRIBUTE9` varchar(255) DEFAULT NULL,
  `ATTRIBUTE10` varchar(255) DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_UPDATE_BY` int(11) NOT NULL,
  `LAST_UPDATE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_branch`
--

INSERT INTO `sys_branch` (`BRANCH_ID`, `BRANCH_CODE`, `BRANCH_NAME`, `ALTERNATE_NAME`, `ORG_ID`, `SOB_ID`, `ORG_TYPE`, `COMPANY_ID`, `FTP_PATH`, `ADDRESS1`, `ADDRESS2`, `ADDRESS3`, `CITY`, `PROVINCE`, `VAT_REGISTRATION_NUM`, `TGL_NPWP`, `ADDRESS_PKP`, `POSTAL_CODE`, `PHONE`, `FAX`, `MANAGER`, `FLAG_GRAFIK`, `ATTRIBUTE1`, `ATTRIBUTE2`, `ATTRIBUTE3`, `ATTRIBUTE4`, `ATTRIBUTE5`, `ATTRIBUTE6`, `ATTRIBUTE7`, `ATTRIBUTE8`, `ATTRIBUTE9`, `ATTRIBUTE10`, `CREATED_BY`, `CREATED_DATE`, `LAST_UPDATE_BY`, `LAST_UPDATE_DATE`) VALUES
(1, '001', 'HEAD OFFICE', 'HO', 81, 1, 'HO', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TEST ALAMAT', '112233', NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-04 19:02:29', 1, '2018-03-04 19:02:29'),
(2, '001', 'HEAD OFFICE ', 'HO ', 888, 2, 'HO', 2, 'C:', 'JL. RAYA SERPONG SEKTOR IV BSD, KOTA TANGERANG SELATAN', 'BSD CITY', '', 'BSD', 'BANTEN', '01.583.034.2-415.000', '2015-08-12', 'JL. RAYA SERPONG SEKTOR IV BSD, KOTA TANGERANG SELATAN', '112233', '021-5371171', '021-5371182', 'RICKY SETIAWAN', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-07-02 06:59:44', 1, '2019-09-20 02:06:31'),
(3, '002', 'Cabang', 'Cbg-JKT', 889, 2, 'HO', 2, 'C:', 'JL. RAYA SERPONG SEKTOR IV BSD, KOTA TANGERANG SELATAN', 'BSD CITY', '', 'BSD', 'BANTEN', '01.583.034.2-415.000', '2015-08-12', 'JL. RAYA SERPONG SEKTOR IV BSD, KOTA TANGERANG SELATAN', '112233', '021-5371171', '021-5371182', 'RICKY SETIAWAN', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-07-02 06:59:44', 1, '2019-09-20 02:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `sys_company`
--

CREATE TABLE `sys_company` (
  `COMPANY_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(255) NOT NULL,
  `COMPANY_CODE` varchar(6) NOT NULL,
  `ACTIVE_FLAG` varchar(1) NOT NULL DEFAULT 'Y',
  `ACTIVE_DATE` date NOT NULL,
  `INACTIVE_DATE` date DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_UPDATE_BY` int(11) NOT NULL,
  `UPDATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_company`
--

INSERT INTO `sys_company` (`COMPANY_ID`, `COMPANY_NAME`, `COMPANY_CODE`, `ACTIVE_FLAG`, `ACTIVE_DATE`, `INACTIVE_DATE`, `CREATED_BY`, `CREATED_AT`, `LAST_UPDATE_BY`, `UPDATED_AT`) VALUES
(1, 'PT INDOMARCO PRISMATAMA', '01', 'Y', '2019-01-15', NULL, 1, '2018-03-05 07:14:44', 1, '2019-01-15 04:26:38'),
(2, 'PT INDOREALTY SURYAPERSADA', '02', 'Y', '2018-07-02', '2020-10-02', 1, '2018-07-02 06:44:18', 1, '2020-10-02 10:43:35'),
(3, 'TEST', '03', 'Y', '2020-10-02', NULL, 1, '2020-10-02 10:46:32', 1, '2020-10-02 10:47:18'),
(4, 'TEST2', '04', 'Y', '2020-10-02', NULL, 1, '2020-10-02 10:47:29', 1, '2020-10-05 07:22:24'),
(6, 'EEDSDSD', '05', 'Y', '2020-10-02', NULL, 1, '2020-10-02 10:48:11', 1, '2020-10-02 10:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE `sys_menu` (
  `MENU_ID` int(11) NOT NULL,
  `MENU_NAME` varchar(50) NOT NULL,
  `MENU_DESC` varchar(150) DEFAULT NULL,
  `SEQ` int(11) NOT NULL,
  `URL` varchar(200) DEFAULT NULL,
  `ACTIVE_FLAG` varchar(1) NOT NULL DEFAULT 'Y',
  `ACTIVE_DATE` date NOT NULL,
  `INACTIVE_DATE` date DEFAULT NULL,
  `ATTRIBUTE1` varchar(255) DEFAULT NULL,
  `ATTRIBUTE2` varchar(255) DEFAULT NULL,
  `ATTRIBUTE3` varchar(255) DEFAULT NULL,
  `ATTRIBUTE4` varchar(255) DEFAULT NULL,
  `ATTRIBUTE5` varchar(255) DEFAULT NULL,
  `IS_DETAIL` varchar(1) DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_UPDATE_BY` int(11) NOT NULL,
  `UPDATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`MENU_ID`, `MENU_NAME`, `MENU_DESC`, `SEQ`, `URL`, `ACTIVE_FLAG`, `ACTIVE_DATE`, `INACTIVE_DATE`, `ATTRIBUTE1`, `ATTRIBUTE2`, `ATTRIBUTE3`, `ATTRIBUTE4`, `ATTRIBUTE5`, `IS_DETAIL`, `CREATED_BY`, `CREATED_AT`, `LAST_UPDATE_BY`, `UPDATED_AT`) VALUES
(1, 'Admin', 'Administration', 10, 'Home/C_Admin', 'Y', '2018-03-05', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 1, '2018-03-05 07:33:58', 1, '2018-05-28 01:23:18'),
(2, 'Transaction', 'Transaction', 10, NULL, 'Y', '2020-10-05', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 1, '2020-10-05 12:21:29', 1, '2020-10-05 13:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu_detail`
--

CREATE TABLE `sys_menu_detail` (
  `MENU_DETAIL_ID` int(11) NOT NULL,
  `MENU_ID` int(11) NOT NULL,
  `MENU_DETAIL_NAME` varchar(50) NOT NULL,
  `MENU_DETAIL_DESC` varchar(150) DEFAULT NULL,
  `SUB_MENU_DETAIL` int(11) DEFAULT NULL,
  `SEQ` int(11) DEFAULT NULL,
  `URL` varchar(200) DEFAULT NULL,
  `ACTIVE_FLAG` varchar(1) NOT NULL DEFAULT 'Y',
  `ACTIVE_DATE` date NOT NULL,
  `INACTIVE_DATE` date DEFAULT NULL,
  `ATTRIBUTE1` varchar(255) DEFAULT NULL,
  `ATTRIBUTE2` varchar(255) DEFAULT NULL,
  `ATTRIBUTE3` varchar(255) DEFAULT NULL,
  `ATTRIBUTE4` varchar(255) DEFAULT NULL,
  `ATTRIBUTE5` varchar(255) DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_UPDATE_BY` int(11) NOT NULL,
  `LAST_UPDATE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_menu_detail`
--

INSERT INTO `sys_menu_detail` (`MENU_DETAIL_ID`, `MENU_ID`, `MENU_DETAIL_NAME`, `MENU_DETAIL_DESC`, `SUB_MENU_DETAIL`, `SEQ`, `URL`, `ACTIVE_FLAG`, `ACTIVE_DATE`, `INACTIVE_DATE`, `ATTRIBUTE1`, `ATTRIBUTE2`, `ATTRIBUTE3`, `ATTRIBUTE4`, `ATTRIBUTE5`, `CREATED_BY`, `CREATED_DATE`, `LAST_UPDATE_BY`, `LAST_UPDATE_DATE`) VALUES
(1, 1, 'Role Management', 'Role Management', NULL, 20, 'Admin/C_Admin/menu_manage', 'Y', '2018-03-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-05 08:01:57', 1, '2018-03-15 01:54:22'),
(2, 1, 'User Management', 'User Management', NULL, 30, 'Admin/C_Admin/user_manage', 'Y', '2018-03-05', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-05 08:04:15', 1, '2018-03-15 01:54:27'),
(3, 1, 'Company Management', 'Company Management', NULL, 40, NULL, 'Y', '2020-10-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-10-01 10:50:34', 1, '2020-10-01 10:50:34'),
(4, 1, 'Branch Management', 'Branch Management', NULL, 50, NULL, 'Y', '2020-10-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-10-01 10:52:50', 1, '2020-10-01 10:52:50'),
(5, 1, 'Resp Management', 'Resp Management', NULL, 60, NULL, 'Y', '2020-10-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-10-01 10:53:36', 1, '2020-10-01 10:53:36'),
(6, 1, 'Menu Management', 'Menu Management', NULL, 10, NULL, 'Y', '2020-10-05', NULL, NULL, NULL, NULL, NULL, NULL, 1130, '2020-10-05 10:59:58', 1130, '2020-10-05 10:59:58'),
(7, 2, 'P3AT Inquiry', 'P3AT Inquiry', NULL, 10, NULL, 'Y', '2020-10-06', NULL, NULL, NULL, NULL, NULL, NULL, 1130, '2020-10-06 07:12:59', 1130, '2020-10-06 07:12:59'),
(8, 2, 'P3AT Approval', 'P3AT Approval', NULL, 60, NULL, 'Y', '2020-10-07', NULL, NULL, NULL, NULL, NULL, NULL, 1130, '2020-10-07 00:10:08', 1130, '2020-10-07 00:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `sys_ref_num_otp`
--

CREATE TABLE `sys_ref_num_otp` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `REF_NUM` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OTP_NUM` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ACTIVE_DATE` date NOT NULL,
  `INACTIVE_DATE` date NOT NULL,
  `USABLE_FLAG` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_responsibility`
--

CREATE TABLE `sys_responsibility` (
  `RESPONSIBILITY_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) DEFAULT NULL,
  `MENU_ID` int(11) NOT NULL,
  `RESPONSIBILITY_NAME` varchar(100) NOT NULL,
  `RESPONSIBILITY_DESC` varchar(150) DEFAULT NULL,
  `BRANCH_ID` int(11) NOT NULL,
  `ACTIVE_FLAG` varchar(1) DEFAULT NULL,
  `ACTIVE_DATE` date DEFAULT NULL,
  `INACTIVE_DATE` date DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_UPDATE_BY` int(11) NOT NULL,
  `UPDATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_responsibility`
--

INSERT INTO `sys_responsibility` (`RESPONSIBILITY_ID`, `ROLE_ID`, `MENU_ID`, `RESPONSIBILITY_NAME`, `RESPONSIBILITY_DESC`, `BRANCH_ID`, `ACTIVE_FLAG`, `ACTIVE_DATE`, `INACTIVE_DATE`, `CREATED_BY`, `CREATED_AT`, `LAST_UPDATE_BY`, `UPDATED_AT`) VALUES
(1, 1, 1, 'ADMIN HO', 'ADMIN HO', 1, 'Y', '2018-02-01', NULL, 1, '2018-03-05 07:52:22', 1, '2018-07-03 01:49:53'),
(5, 2, 2, 'APPROVAL HO', 'APPROVAL HO', 1, 'Y', '2019-01-11', NULL, 1, '2019-01-11 11:07:14', 1, '2019-01-11 11:07:14'),
(9, 2, 2, 'APPROVAL JAKARTA', 'APPROVAL JAKARTA', 3, 'Y', '2019-01-11', NULL, 1, '2019-01-11 11:09:56', 1, '2019-01-11 11:09:56'),
(13, 2, 2, 'SUPP ISP ADMIN', 'SUPP ISP ADMIN', 2, 'N', '2019-01-11', '2020-10-05', 1, '2019-01-11 11:09:56', 1, '2020-10-05 09:23:45'),
(14, 1, 1, 'test', 'tetststs', 1, 'Y', '2020-10-05', NULL, 1, '2020-10-05 08:22:30', 1, '2020-10-05 09:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `sys_responsibility_tmp`
--

CREATE TABLE `sys_responsibility_tmp` (
  `TMP_ID` int(11) NOT NULL,
  `UNIQ_ID_TMP` double DEFAULT NULL,
  `RESPONSIBILITY_ID` int(11) NOT NULL,
  `RESPONSIBILITY_NAME` varchar(100) NOT NULL,
  `RESPONSIBILITY_DESC` varchar(150) DEFAULT NULL,
  `ACTIVE_FLAG` varchar(1) DEFAULT NULL,
  `ACTIVE_DATE` date DEFAULT NULL,
  `INACTIVE_DATE` date DEFAULT NULL,
  `SYS_ID_RESP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sys_role`
--

CREATE TABLE `sys_role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(100) NOT NULL,
  `ROLE_DESC` varchar(150) DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_UPDATE_BY` int(11) NOT NULL,
  `UPDATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_role`
--

INSERT INTO `sys_role` (`ROLE_ID`, `ROLE_NAME`, `ROLE_DESC`, `CREATED_BY`, `CREATED_AT`, `LAST_UPDATE_BY`, `UPDATED_AT`) VALUES
(1, 'DEV', 'DEV', 1, '2018-03-05 06:37:18', 1, '2018-07-17 01:29:25'),
(2, 'SUPPORT', 'SUPPORT', 1, '2018-07-01 17:00:00', 1, '2018-07-02 07:27:39'),
(3, 'USER', 'USER', 3, '2019-01-13 17:00:00', 3, '2019-01-14 04:25:57'),
(4, 'test', 'test12', 1, '2020-10-01 09:57:55', 1, '2020-10-01 10:41:48'),
(5, 'test2', 'test23', 1, '2020-10-01 09:58:33', 1, '2020-10-05 07:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE `sys_user` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TOKEN` varchar(255) DEFAULT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `ACTIVE_FLAG` varchar(1) NOT NULL DEFAULT 'Y',
  `ACTIVE_DATE` date NOT NULL,
  `USER_EXPR` varchar(1) DEFAULT NULL,
  `USER_EXPR_COUNTER` int(11) DEFAULT NULL,
  `INACTIVE_DATE` date DEFAULT NULL,
  `RESET_FLAG` varchar(1) DEFAULT 'N',
  `ATTRIBUTE1` varchar(255) DEFAULT NULL,
  `ATTRIBUTE2` varchar(255) DEFAULT NULL,
  `ATTRIBUTE3` varchar(255) DEFAULT NULL,
  `ATTRIBUTE4` varchar(255) DEFAULT NULL,
  `ATTRIBUTE5` varchar(255) DEFAULT NULL,
  `ATTRIBUTE6` varchar(255) DEFAULT NULL,
  `ATTRIBUTE7` varchar(255) DEFAULT NULL,
  `ATTRIBUTE8` varchar(255) DEFAULT NULL,
  `ATTRIBUTE9` varchar(255) DEFAULT NULL,
  `ATTRIBUTE10` varchar(255) DEFAULT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_UPDATE_BY` int(11) NOT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `USER_EXPR_NOTE` int(11) DEFAULT NULL,
  `EMAIL` varchar(45) DEFAULT NULL,
  `CREATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`ID`, `USERNAME`, `PASSWORD`, `TOKEN`, `ROLE_ID`, `ACTIVE_FLAG`, `ACTIVE_DATE`, `USER_EXPR`, `USER_EXPR_COUNTER`, `INACTIVE_DATE`, `RESET_FLAG`, `ATTRIBUTE1`, `ATTRIBUTE2`, `ATTRIBUTE3`, `ATTRIBUTE4`, `ATTRIBUTE5`, `ATTRIBUTE6`, `ATTRIBUTE7`, `ATTRIBUTE8`, `ATTRIBUTE9`, `ATTRIBUTE10`, `CREATED_BY`, `CREATED_AT`, `LAST_UPDATE_BY`, `UPDATED_AT`, `USER_EXPR_NOTE`, `EMAIL`, `CREATED_DATE`) VALUES
(1, 'DEV', '$2b$10$xWrux0bDk7k9VJWzA7K.cuc4ZePzxkht0JMZ/njVuGNRu8TmTEP1e', 'UUtPfadZTdiXMHG3hD0d6Msptq0JYjY3z3EFyljHw3EwjBlvyHYZ0P336S6HeTNiQKpeVsXaVC8dyMl8', 1, 'Y', '2020-10-07', 'N', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-25 00:00:00', 1, '2020-10-01 08:03:03', NULL, 'ASAS@ASAS.COM', '2020-10-01 00:00:00'),
(2, 'APPROVAL2', '$2b$10$xWrux0bDk7k9VJWzA7K.cuc4ZePzxkht0JMZ/njVuGNRu8TmTEP1e', NULL, 2, 'Y', '2020-09-25', NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2020-09-25 10:03:26', 2, '2020-09-28 07:16:00', NULL, 'emma2@indomaret.co.id', '2020-09-28 00:00:00'),
(6, 'APPROVAL1', '$2b$10$xWrux0bDk7k9VJWzA7K.cuc4ZePzxkht0JMZ/njVuGNRu8TmTEP1e', NULL, 2, 'Y', '2020-10-07', NULL, NULL, NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-10-01 07:59:10', 1, '2020-10-01 08:05:42', NULL, 'ASAS@ASAS.COM', '2020-10-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_resp`
--

CREATE TABLE `sys_user_resp` (
  `SYS_ID_RESP` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `RESP_ID` int(11) NOT NULL,
  `ACTIVE_DATE` date DEFAULT NULL,
  `INACTIVE_DATE` int(11) DEFAULT NULL,
  `ACTIVE_FLAG` varchar(1) NOT NULL DEFAULT 'Y',
  `CREATED_BY` int(11) DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `LAST_UPDATE_BY` int(11) DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_user_resp`
--

INSERT INTO `sys_user_resp` (`SYS_ID_RESP`, `USER_ID`, `RESP_ID`, `ACTIVE_DATE`, `INACTIVE_DATE`, `ACTIVE_FLAG`, `CREATED_BY`, `CREATED_AT`, `LAST_UPDATE_BY`, `UPDATED_AT`) VALUES
(28, 2, 5, '2020-09-25', NULL, 'Y', 1, '2020-10-01 07:52:43', 1, '2020-10-01 07:52:43'),
(30, 1, 1, '2019-01-11', NULL, 'Y', 1, '2020-10-01 07:58:27', 1, '2020-10-01 07:58:27'),
(35, 6, 9, '2019-01-11', NULL, 'Y', 1, '2020-10-01 08:05:42', 1, '2020-10-01 08:05:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval_master`
--
ALTER TABLE `approval_master`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `F_APP_ID` (`ID_APP`);

--
-- Indexes for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMP_NUMBER` (`EMP_NUMBER`),
  ADD KEY `F_ORG_ID` (`ORG_ID`),
  ADD KEY `F_COMPANY_ID` (`COMPANY_ID`),
  ADD KEY `F_USER_ID` (`USER_ID`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `F_ID_TRX` (`ID_TRX`),
  ADD KEY `F_ID_APP` (`ID_APP`),
  ADD KEY `F_EMP_ID` (`EMP_ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p3at_master_trx`
--
ALTER TABLE `p3at_master_trx`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sys_app_master`
--
ALTER TABLE `sys_app_master`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sys_branch`
--
ALTER TABLE `sys_branch`
  ADD PRIMARY KEY (`BRANCH_ID`),
  ADD UNIQUE KEY `Index 4` (`ORG_ID`),
  ADD KEY `FK_sys_branch_sys_company` (`COMPANY_ID`),
  ADD KEY `FK_sys_branch_sys_sob` (`SOB_ID`);

--
-- Indexes for table `sys_company`
--
ALTER TABLE `sys_company`
  ADD PRIMARY KEY (`COMPANY_ID`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`MENU_ID`);

--
-- Indexes for table `sys_menu_detail`
--
ALTER TABLE `sys_menu_detail`
  ADD PRIMARY KEY (`MENU_DETAIL_ID`),
  ADD KEY `FK_sys_menu_detail_sys_menu` (`MENU_ID`),
  ADD KEY `FK_sys_menu_detail_sys_menu_2` (`SUB_MENU_DETAIL`);

--
-- Indexes for table `sys_ref_num_otp`
--
ALTER TABLE `sys_ref_num_otp`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `sys_ref_num_otp_otp_num_unique` (`OTP_NUM`),
  ADD KEY `sys_ref_num_otp_user_id_foreign` (`USER_ID`);

--
-- Indexes for table `sys_responsibility`
--
ALTER TABLE `sys_responsibility`
  ADD PRIMARY KEY (`RESPONSIBILITY_ID`),
  ADD KEY `FK_sys_responsibility_sys_menu` (`MENU_ID`),
  ADD KEY `FK_sys_responsibility_sys_role` (`ROLE_ID`),
  ADD KEY `FK_sys_responsibility_sys_branch` (`BRANCH_ID`);

--
-- Indexes for table `sys_responsibility_tmp`
--
ALTER TABLE `sys_responsibility_tmp`
  ADD PRIMARY KEY (`TMP_ID`);

--
-- Indexes for table `sys_role`
--
ALTER TABLE `sys_role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `sys_user`
--
ALTER TABLE `sys_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sys_user_resp`
--
ALTER TABLE `sys_user_resp`
  ADD PRIMARY KEY (`SYS_ID_RESP`),
  ADD UNIQUE KEY `sys_user_resp_user_id_idx` (`USER_ID`,`RESP_ID`) USING BTREE,
  ADD KEY `sys_user_resp_active_flag_idx` (`ACTIVE_FLAG`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval_master`
--
ALTER TABLE `approval_master`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `p3at_master_trx`
--
ALTER TABLE `p3at_master_trx`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_branch`
--
ALTER TABLE `sys_branch`
  MODIFY `BRANCH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_company`
--
ALTER TABLE `sys_company`
  MODIFY `COMPANY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `MENU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sys_menu_detail`
--
ALTER TABLE `sys_menu_detail`
  MODIFY `MENU_DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sys_ref_num_otp`
--
ALTER TABLE `sys_ref_num_otp`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_responsibility`
--
ALTER TABLE `sys_responsibility`
  MODIFY `RESPONSIBILITY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sys_responsibility_tmp`
--
ALTER TABLE `sys_responsibility_tmp`
  MODIFY `TMP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_role`
--
ALTER TABLE `sys_role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sys_user`
--
ALTER TABLE `sys_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sys_user_resp`
--
ALTER TABLE `sys_user_resp`
  MODIFY `SYS_ID_RESP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval_master`
--
ALTER TABLE `approval_master`
  ADD CONSTRAINT `F_APP_ID` FOREIGN KEY (`ID_APP`) REFERENCES `sys_app_master` (`ID`);

--
-- Constraints for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD CONSTRAINT `F_COMPANY_ID` FOREIGN KEY (`COMPANY_ID`) REFERENCES `sys_company` (`COMPANY_ID`),
  ADD CONSTRAINT `F_ORG_ID` FOREIGN KEY (`ORG_ID`) REFERENCES `sys_branch` (`ORG_ID`),
  ADD CONSTRAINT `F_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `sys_user` (`ID`);

--
-- Constraints for table `log_history`
--
ALTER TABLE `log_history`
  ADD CONSTRAINT `F_EMP_ID` FOREIGN KEY (`EMP_ID`) REFERENCES `emp_master` (`ID`),
  ADD CONSTRAINT `F_ID_APP` FOREIGN KEY (`ID_APP`) REFERENCES `sys_app_master` (`ID`),
  ADD CONSTRAINT `F_ID_TRX` FOREIGN KEY (`ID_TRX`) REFERENCES `p3at_master_trx` (`ID`);

--
-- Constraints for table `sys_branch`
--
ALTER TABLE `sys_branch`
  ADD CONSTRAINT `FK_sys_branch_sys_company` FOREIGN KEY (`COMPANY_ID`) REFERENCES `sys_company` (`COMPANY_ID`) ON UPDATE NO ACTION;

--
-- Constraints for table `sys_menu_detail`
--
ALTER TABLE `sys_menu_detail`
  ADD CONSTRAINT `FK_sys_menu_detail_sys_menu` FOREIGN KEY (`MENU_ID`) REFERENCES `sys_menu` (`MENU_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sys_menu_detail_sys_menu_2` FOREIGN KEY (`SUB_MENU_DETAIL`) REFERENCES `sys_menu` (`MENU_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `sys_ref_num_otp`
--
ALTER TABLE `sys_ref_num_otp`
  ADD CONSTRAINT `sys_ref_num_otp_user_id_foreign` FOREIGN KEY (`USER_ID`) REFERENCES `sys_user` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `sys_responsibility`
--
ALTER TABLE `sys_responsibility`
  ADD CONSTRAINT `FK_sys_responsibility_sys_branch` FOREIGN KEY (`BRANCH_ID`) REFERENCES `sys_branch` (`BRANCH_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sys_responsibility_sys_menu` FOREIGN KEY (`MENU_ID`) REFERENCES `sys_menu` (`MENU_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
