-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 04:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coinwarp`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator_super_user`
--

CREATE TABLE `administrator_super_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tx_address` text NOT NULL,
  `tokens` varchar(20) NOT NULL DEFAULT '0',
  `carbon_credits` varchar(20) NOT NULL DEFAULT '0',
  `energy_units` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator_super_user`
--

INSERT INTO `administrator_super_user` (`id`, `name`, `email`, `password`, `tx_address`, `tokens`, `carbon_credits`, `energy_units`) VALUES
(1, 'Administrator', 'admin@coinwarp.io', 'Password@213', '0xAf55F3B7DC65c8f8577cf00C8C5CA7b6E8Cc4433', '1000000', '122000', '1002002');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tx_address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `value` float NOT NULL,
  `tx_hash` varchar(50) NOT NULL,
  `carbon_credits` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buy_token`
--

CREATE TABLE `buy_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tx_address` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `no_of_tokens` float NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `buy_tx_id` varchar(100) NOT NULL,
  `currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carbon_credits`
--

CREATE TABLE `carbon_credits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_tx_id` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `process` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `energy_credits`
--

CREATE TABLE `energy_credits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_tx_id` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `process` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entrc_price`
--

CREATE TABLE `entrc_price` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrc_price`
--

INSERT INTO `entrc_price` (`id`, `price`, `date`) VALUES
(1, 0.008, '2020-12-28 03:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `header` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `header`, `date`) VALUES
(1, '<p>You can Now Buy/Sell EnterCoin From&nbsp;<a href=\"http://coinexchange.io/\" target=\"_blank\">coinexchange.io</a>&nbsp;and Enjoy</p>\r\n', '2018-01-26 11:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `document_name`, `file`, `status`, `date`, `username`, `email`) VALUES
(158, 218, 'New Document Here', '1612184684OBORTECH_SAFT_112020.pdf', 'Verified', '2021-06-10 14:23:57', 'arpita', 'arpita@earth.io');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `for` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notification`, `date`, `for`, `user_id`, `status`) VALUES
(1, 'A New User Created', '2018-04-28 12:08:35', 'admin', 0, 'Read'),
(2, 'A New User Created', '2018-04-28 12:08:35', 'admin', 0, 'Read'),
(3, 'A New User Created', '2018-04-28 12:08:35', 'admin', 0, 'Read'),
(4, 'Your Profile has been Updated', '2018-04-28 12:09:08', 'user', 178, 'Unread'),
(5, 'A kyc Request Initiated', '2018-04-28 12:09:40', 'user', 178, 'Unread'),
(6, 'A kyc is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(7, 'KYC Request Has been Verified', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(8, 'Your KYC Document is Verified', '2018-04-28 12:09:55', 'user', 178, 'Unread'),
(9, 'Your Profile Photo has been changed', '2018-04-28 12:10:23', 'user', 178, 'Unread'),
(10, 'A User Updated his Profile', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(11, 'A Buy Request has Been Initiated', '2018-04-28 12:10:52', 'user', 178, 'Unread'),
(12, 'A Buy Request has been Initiated', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(13, 'Buy Token Request Approved', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(14, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2018-04-28 12:11:09', 'user', 178, 'Unread'),
(15, 'A Send Request Executed to 0x43219914067661ae53545F066C169960355C157C', '2018-04-28 12:11:54', 'user', 178, 'Unread'),
(16, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0x43219914067661ae53545F066C169960355C157C from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(17, 'Buy Token Request Approved', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(18, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2018-04-28 12:20:43', 'user', 178, 'Unread'),
(19, 'A Send Request Executed to 0xBC3608fABcF1E3f73792A4E6aba66188D78DC22B', '2018-04-28 12:25:31', 'user', 178, 'Unread'),
(20, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0xBC3608fABcF1E3f73792A4E6aba66188D78DC22B from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(21, 'A Send Request Executed to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5', '2018-04-28 12:30:37', 'user', 178, 'Unread'),
(22, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5 from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(23, 'A Send Request Executed to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5', '2018-04-28 12:31:23', 'user', 178, 'Unread'),
(24, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5 from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(25, 'A Send Request Executed to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5', '2018-04-28 12:32:57', 'user', 178, 'Unread'),
(26, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5 from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(27, 'A Send Request Executed to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5', '2018-04-28 12:33:28', 'user', 178, 'Unread'),
(28, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5 from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(29, 'A Send Request Executed to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5', '2018-04-28 12:33:47', 'user', 178, 'Unread'),
(30, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0x53415cafacb8340b1e4a9a7174f55f2fa57454a5 from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(31, 'Withdraw Requests has been made From A User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(32, 'You raised Withdraw Request of 871.32', '2018-04-28 12:34:30', 'user', 178, 'Unread'),
(33, 'Withdraw Token Request Approved', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(34, 'Your Withdraw Token Request Approved', '2018-04-28 12:34:41', 'user', 23, 'Unread'),
(35, 'A Support Request Initiated', '2018-04-28 12:35:25', 'user', 178, 'Unread'),
(36, 'A Support is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(37, 'Support Request Resolved', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(38, 'Your Support Request Resolved', '2018-04-28 12:35:34', 'user', 7, 'Unread'),
(39, 'A Support Request Was Answered', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(40, 'Your Support Ticket Was Responded', '2018-04-28 12:35:43', 'user', 178, 'Unread'),
(41, 'A New User Created', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(42, 'A New User Created', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(43, 'A kyc Request Initiated', '2018-05-04 03:43:35', 'user', 178, 'Unread'),
(44, 'A kyc is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(45, 'A kyc Request Initiated', '2018-05-04 03:49:12', 'user', 178, 'Unread'),
(46, 'A kyc is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(47, 'A New User Created', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(48, 'A kyc Request Initiated', '2018-05-04 03:57:09', 'user', 181, 'Unread'),
(49, 'A kyc is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(50, 'KYC Request Has been Verified', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(51, 'Your KYC Document is Verified', '2018-05-04 03:59:18', 'user', 181, 'Unread'),
(52, 'A Support Request Initiated', '2018-05-04 04:08:07', 'user', 181, 'Unread'),
(53, 'A Support is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(54, 'A Support Request Was Answered', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(55, 'Your Support Ticket Was Responded', '2018-05-04 04:08:38', 'user', 181, 'Unread'),
(56, 'A Support Request Initiated', '2018-05-04 04:10:46', 'user', 181, 'Unread'),
(57, 'A Support is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(58, 'A Support Request Was Answered', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(59, 'Your Support Ticket Was Responded', '2018-05-04 04:10:56', 'user', 181, 'Unread'),
(60, 'A Support Request has been Deleted', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(61, 'A Support Request has been Deleted', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(62, 'A Support Request has been Deleted', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(63, 'A kyc Request Initiated', '2018-05-04 04:23:04', 'user', 180, 'Unread'),
(64, 'A kyc is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(65, 'KYC Request Has been Verified', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(66, 'Your KYC Document is Verified', '2018-05-04 08:22:53', 'user', 180, 'Unread'),
(67, 'Your Profile has been Updated', '2018-05-04 08:31:40', 'user', 180, 'Unread'),
(68, 'Your Profile has been Updated', '2018-05-04 08:32:10', 'user', 180, 'Unread'),
(69, 'KYC Request Has been Verified', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(70, 'Your KYC Document is Verified', '2018-05-07 12:53:24', 'user', 178, 'Unread'),
(71, 'A Buy Request has Been Initiated', '2018-05-07 12:56:30', 'user', 181, 'Unread'),
(72, 'A Buy Request has been Initiated', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(73, 'Buy Token Request Approved', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(74, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2018-05-07 12:57:06', 'user', 181, 'Unread'),
(75, 'Withdraw Requests has been made From A User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(76, 'You raised Withdraw Request of 100', '2018-05-07 13:02:32', 'user', 181, 'Unread'),
(77, 'Withdraw Token Request Approved', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(78, 'Your Withdraw Token Request Approved', '2018-05-07 13:02:53', 'user', 24, 'Unread'),
(79, 'A Support Request Initiated', '2018-05-07 13:04:05', 'user', 181, 'Unread'),
(80, 'A Support is Requested from User', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(81, 'Amount has been Added to users Account', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(82, 'Amount has been Added to Your Account', '2018-05-07 13:06:33', 'user', 181, 'Unread'),
(83, 'A User has been Deleted', '2018-05-07 13:08:02', 'admin', 0, 'Read'),
(84, 'Your Profile Photo has been changed', '2018-11-21 05:02:47', 'user', 181, 'Unread'),
(85, 'A User Updated his Profile', '2018-11-21 05:03:28', 'admin', 0, 'Read'),
(86, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(87, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(88, 'Amount has been Added to Your Account', '2019-10-01 13:59:37', 'user', 181, 'Unread'),
(89, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(90, 'Amount has been Added to Your Account', '2019-10-01 13:59:56', 'user', 180, 'Unread'),
(91, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(92, 'Amount has been Added to Your Account', '2019-10-01 14:02:23', 'user', 180, 'Unread'),
(93, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(94, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(95, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(96, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(97, 'A Sum of 100 Tokens have been added to your account', '2019-10-01 14:18:12', 'user', 180, 'Unread'),
(98, 'A Sum of 100 Carbon Credits have been added to your account', '2019-10-01 14:18:12', 'user', 180, 'Unread'),
(99, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(100, 'A Sum of 100 Tokens have been added to your account', '2019-10-01 14:19:41', 'user', 180, 'Unread'),
(101, 'A Sum of 100 Carbon Credits have been added to your account', '2019-10-01 14:19:41', 'user', 180, 'Unread'),
(102, 'Amount has been Added to users Account', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(103, 'A Carbon Credit of120, Buy Request has Been Initiated from you', '2019-10-01 14:51:32', 'user', 180, 'Unread'),
(104, 'A Carbon Credit Buy Request has been Initiated', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(105, 'A Carbon Credit of145, Buy Request has Been Initiated from you', '2019-10-01 14:55:06', 'user', 180, 'Unread'),
(106, 'A Carbon Credit Buy Request has been Initiated', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(107, 'A Carbon Credit of1000, Buy Request has Been Initiated from you', '2019-10-01 14:55:34', 'user', 180, 'Unread'),
(108, 'A Carbon Credit Buy Request has been Initiated', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(109, 'A Carbon Credit Request  has been Deleted', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(110, 'Carbon Credits Token Request Approved', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(111, 'Your Carbon Credit Request of 145 Request Approved, Balance Has Been Added To Your Wallet', '2019-10-01 15:11:50', 'user', 180, 'Unread'),
(112, 'Carbon Credits Token Request Approved', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(113, 'Your Carbon Credit Request of 145 Request Approved, Balance Has Been Added To Your Wallet', '2019-10-01 15:13:21', 'user', 180, 'Unread'),
(114, 'Carbon Credits Token Request Approved', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(115, 'Your Carbon Credit Request of 145 Request Approved, Balance Has Been Added To Your Wallet', '2019-10-01 15:13:26', 'user', 180, 'Unread'),
(116, 'You Transferred 235 Carbon Credits to 0xf34d006ccc5a6170b4be62df767a7d966dba1687', '2019-10-01 15:35:11', 'user', 180, 'Unread'),
(117, 'You Recieved 235 Carbon Credits from 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', '2019-10-01 15:35:11', 'user', 181, 'Unread'),
(118, 'A Send Request Exected from 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 to 0xf34d006ccc5a6170b4be62df767a7d966dba1687 from User', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(119, 'You Transferred 100 Carbon Credits to 0xf34d006ccc5a6170b4be62df767a7d966dba1687', '2019-10-01 15:36:05', 'user', 180, 'Unread'),
(120, 'You Recieved 100 Carbon Credits from 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', '2019-10-01 15:36:05', 'user', 181, 'Unread'),
(121, 'A Send Request Exected from 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 to 0xf34d006ccc5a6170b4be62df767a7d966dba1687 from User', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(122, 'A Send Request Executed to 0xf34d006ccc5a6170b4be62df767a7d966dba1687', '2019-10-01 15:39:11', 'user', 180, 'Unread'),
(123, 'A Send Request Exected from 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 to 0xf34d006ccc5a6170b4be62df767a7d966dba1687 from User', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(124, 'Admin Account Profile Updated', '2019-10-10 11:24:36', 'admin', 0, 'Read'),
(125, 'Admin Account Profile Updated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(126, 'Admin Account Profile Updated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(127, 'A Carbon Credit of995, Buy Request has Been Initiated from you', '2019-10-10 12:31:44', 'user', 178, 'Unread'),
(128, 'A Carbon Credit Buy Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(129, 'A Carbon Credit of995, Buy Request has Been Initiated from you', '2019-10-10 12:35:46', 'user', 178, 'Unread'),
(130, 'A Carbon Credit Buy Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(131, 'A Carbon Credit of995, Buy Request has Been Initiated from you', '2019-10-10 12:37:13', 'user', 178, 'Unread'),
(132, 'A Carbon Credit Buy Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(133, 'A Carbon Credit of995, Buy Request has Been Initiated from you', '2019-10-10 12:45:40', 'user', 178, 'Unread'),
(134, 'A Carbon Credit Buy Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(135, 'A Carbon Credit of100, Exchange Request has Been Initiated from you and Approved', '2019-10-10 12:59:32', 'user', 178, 'Unread'),
(136, 'A Carbon Credit Exchange Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(137, 'A energy Credit of210, Buy Request has Been Initiated from you', '2019-10-10 13:14:58', 'user', 178, 'Unread'),
(138, 'A energy Credit Buy Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(139, 'A energy Credit of800, Exchange Request has Been Initiated from you and Approved', '2019-10-10 13:18:22', 'user', 178, 'Unread'),
(140, 'A energy Credit Exchange Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(141, 'A energy Credit of800, Buy Request has Been Initiated from you', '2019-10-10 13:19:16', 'user', 178, 'Unread'),
(142, 'A energy Credit Buy Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(143, 'A energy Credit of100, Exchange Request has Been Initiated from you and Approved', '2019-10-10 13:21:04', 'user', 178, 'Unread'),
(144, 'A energy Credit Exchange Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(145, 'You Transferred 10 energy Credits to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', '2019-10-10 13:43:51', 'user', 178, 'Unread'),
(146, 'You Recieved 10 energy Credits from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba', '2019-10-10 13:43:51', 'user', 180, 'Unread'),
(147, 'A Send Request Exected from 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 from User', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(148, 'You Transferred 20 energy Credits to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', '2019-10-10 14:07:41', 'user', 178, 'Unread'),
(149, 'You Recieved 20 energy Credits from 0xAf55F3B7DC65c8f8577cf00C8C5CA7b6E8Cc4433 : Admin', '2019-10-10 14:07:41', 'user', 180, 'Unread'),
(150, 'A Send Request Exected from 0xAf55F3B7DC65c8f8577cf00C8C5CA7b6E8Cc4433 : Admin to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 from User', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(151, 'You Transferred 20 energy Credits to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', '2019-10-10 14:11:34', 'user', 178, 'Unread'),
(152, 'You Recieved 20 energy Credits from 0xAf55F3B7DC65c8f8577cf00C8C5CA7b6E8Cc4433 : Admin', '2019-10-10 14:11:34', 'user', 180, 'Unread'),
(153, 'A Send Request Exected from 0xAf55F3B7DC65c8f8577cf00C8C5CA7b6E8Cc4433 : Admin to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 from User', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(154, 'A New User Created', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(155, 'A New User Created', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(156, 'A New User Created', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(157, 'A kyc Request Initiated', '2020-03-19 15:21:35', 'user', 184, 'Unread'),
(158, 'A kyc is Requested from User', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(159, 'Your Profile Photo has been changed', '2020-03-20 05:04:46', 'user', 184, 'Unread'),
(160, 'A User Updated his Profile', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(161, 'A Buy Request has Been Initiated', '2020-03-20 05:47:04', 'user', 184, 'Unread'),
(162, 'A Buy Request has been Initiated', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(163, 'Buy Token Request Approved', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(164, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-03-20 06:21:14', 'user', 184, 'Unread'),
(165, 'A Send Request Executed to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', '2020-03-20 06:56:25', 'user', 184, 'Unread'),
(166, 'A Send Request Exected from 0xa977de8de97d8336389c275da3ce906b079b3885 to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 from User', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(167, 'Withdraw Requests has been made From A User', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(168, 'You raised Withdraw Request of 10', '2020-03-20 06:59:17', 'user', 184, 'Unread'),
(169, 'A Support Request Initiated', '2020-03-20 07:00:14', 'user', 184, 'Unread'),
(170, 'A Support is Requested from User', '2020-04-03 09:22:11', 'admin', 0, 'Read'),
(171, 'A New User Created', '2020-06-05 14:02:47', 'admin', 0, 'Read'),
(172, 'KYC Request Has been Verified', '2020-06-05 14:02:47', 'admin', 0, 'Read'),
(173, 'Your KYC Document is Verified', '2020-06-05 08:47:37', 'user', 184, 'Unread'),
(174, 'KYC Request Has been Verified', '2020-06-05 14:02:47', 'admin', 0, 'Read'),
(175, 'Your KYC Document is Verified', '2020-06-05 08:48:12', 'user', 178, 'Unread'),
(176, 'A kyc Request Initiated', '2020-06-05 12:56:42', 'user', 189, 'Unread'),
(177, 'A kyc is Requested from User', '2020-06-05 14:02:47', 'admin', 0, 'Read'),
(178, 'KYC Request Has been Verified', '2020-06-05 14:02:47', 'admin', 0, 'Read'),
(179, 'Your KYC Document is Verified', '2020-06-05 12:58:02', 'user', 189, 'Unread'),
(180, 'Your Profile has been Updated', '2020-06-05 12:58:38', 'user', 189, 'Unread'),
(181, 'A User Account was Approved', '2020-06-05 14:02:47', 'admin', 0, 'Read'),
(182, 'Your Account Verification has Approved, Balance Has Been Added To Your Wallet', '2020-06-05 13:32:04', 'user', 186, 'Unread'),
(183, 'Admin Account Profile Updated', '2020-06-05 14:37:04', 'admin', 0, 'Read'),
(184, 'A User Account was Approved', '2020-06-05 14:37:04', 'admin', 0, 'Read'),
(185, 'A User Account was Approved', '2020-06-05 14:37:04', 'admin', 0, 'Read'),
(186, 'Your Account Verification has Approved, Balance Has Been Added To Your Wallet', '2020-06-05 14:34:17', 'user', 185, 'Unread'),
(187, 'A Buy Request has Been Initiated', '2020-06-05 14:36:57', 'user', 184, 'Unread'),
(188, 'A Buy Request has been Initiated', '2020-06-05 14:37:04', 'admin', 0, 'Read'),
(189, 'Buy Token Request Approved', '2020-06-05 14:39:02', 'admin', 0, 'Read'),
(190, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-05 14:37:12', 'user', 184, 'Unread'),
(191, 'Withdraw Requests has been made From A User', '2020-06-05 14:39:02', 'admin', 0, 'Read'),
(192, 'You raised Withdraw Request of 1000', '2020-06-05 14:38:14', 'user', 184, 'Unread'),
(193, 'Admin Account Profile Updated', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(194, 'Withdraw Token Request Approved', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(195, 'Your Withdraw Token Request Approved', '2020-06-05 14:58:24', 'user', 26, 'Unread'),
(196, 'A Sum of 100 Tokens have been added to your account', '2020-06-05 15:01:07', 'user', 184, 'Unread'),
(197, 'A Sum of  Carbon Credits have been added to your account', '2020-06-05 15:01:07', 'user', 184, 'Unread'),
(198, 'Amount has been Added to users Account', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(199, 'A Sum of 100 Tokens have been added to your account', '2020-06-05 15:01:45', 'user', 188, 'Unread'),
(200, 'A Sum of  Carbon Credits have been added to your account', '2020-06-05 15:01:45', 'user', 188, 'Unread'),
(201, 'Amount has been Added to users Account', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(202, 'A Buy Request has Been Initiated', '2020-06-05 15:05:17', 'user', 184, 'Unread'),
(203, 'A Buy Request has been Initiated', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(204, 'A Buy  Request  has been Deleted', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(205, 'A Buy  Request  has been Deleted', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(206, 'Buy Token Request Approved', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(207, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-05 15:07:08', 'user', 184, 'Unread'),
(208, 'A User Account was Approved', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(209, 'Your Account Verification has Approved, Balance Has Been Added To Your Wallet', '2020-06-05 15:55:40', 'user', 183, 'Unread'),
(210, 'A Buy Request has Been Initiated', '2020-06-05 17:41:11', 'user', 184, 'Unread'),
(211, 'A Buy Request has been Initiated', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(212, 'Buy Token Request Approved', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(213, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-05 17:43:07', 'user', 184, 'Unread'),
(214, 'A Send Request Executed to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', '2020-06-05 17:45:35', 'user', 184, 'Unread'),
(215, 'A Send Request Exected from 0xa977de8de97d8336389c275da3ce906b079b3885 to 0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12 from User', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(216, 'Withdraw Requests has been made From A User', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(217, 'You raised Withdraw Request of 56.73', '2020-06-05 17:46:54', 'user', 184, 'Unread'),
(218, 'Withdraw Token Request Approved', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(219, 'Your Withdraw Token Request Approved', '2020-06-05 17:47:09', 'user', 27, 'Unread'),
(220, 'A Send Request Executed to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97', '2020-06-05 17:52:35', 'user', 184, 'Unread'),
(221, 'A Send Request Exected from 0xa977de8de97d8336389c275da3ce906b079b3885 to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97 from User', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(222, 'A New User Created', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(223, 'A kyc Request Initiated', '2020-06-07 18:52:32', 'user', 190, 'Unread'),
(224, 'A kyc is Requested from User', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(225, 'A KYC Request  has been Deleted', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(226, 'KYC Request Has been Verified', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(227, 'Your KYC Document is Verified', '2020-06-07 18:54:14', 'user', 190, 'Unread'),
(228, 'A kyc Request Initiated', '2020-06-07 18:55:07', 'user', 190, 'Unread'),
(229, 'A kyc is Requested from User', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(230, 'A kyc Request Initiated', '2020-06-07 18:56:21', 'user', 190, 'Unread'),
(231, 'A kyc is Requested from User', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(232, 'KYC Request Has been Verified', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(233, 'Your KYC Document is Verified', '2020-06-07 18:56:47', 'user', 190, 'Unread'),
(234, 'KYC Request Has been Verified', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(235, 'Your KYC Document is Verified', '2020-06-07 18:56:53', 'user', 190, 'Unread'),
(236, 'Admin Account Profile Updated', '2020-06-07 19:16:04', 'admin', 0, 'Read'),
(237, 'Admin Account Profile Updated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(238, 'Admin Account Profile Updated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(239, 'A Buy Request has Been Initiated', '2020-06-07 19:27:33', 'user', 190, 'Unread'),
(240, 'A Buy Request has been Initiated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(241, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(242, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-07 19:27:57', 'user', 190, 'Unread'),
(243, 'A Buy Request has Been Initiated', '2020-06-07 19:31:14', 'user', 190, 'Unread'),
(244, 'A Buy Request has been Initiated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(245, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(246, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-07 19:31:33', 'user', 190, 'Unread'),
(247, 'A Send Request Executed to 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba', '2020-06-07 19:33:49', 'user', 190, 'Unread'),
(248, 'A Send Request Exected from 0xe950339bd45909441b939eab7911a5899331a91a to 0x1b6e5b5c16ac60ee58819a248f0d969f540472ba from User', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(249, 'A Buy  Request  has been Deleted', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(250, 'Withdraw Requests has been made From A User', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(251, 'You raised Withdraw Request of 1', '2020-06-07 19:44:24', 'user', 190, 'Unread'),
(252, 'Withdraw Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(253, 'Your Withdraw Token Request Approved', '2020-06-07 19:45:20', 'user', 28, 'Unread'),
(254, 'Your Profile has been Updated', '2020-06-07 19:47:18', 'user', 190, 'Unread'),
(255, 'A User Account was Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(256, 'Your Account Verification has Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:17:06', 'user', 182, 'Unread'),
(257, 'A Buy Request has Been Initiated', '2020-06-08 03:22:22', 'user', 184, 'Unread'),
(258, 'A Buy Request has been Initiated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(259, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(260, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:22:40', 'user', 184, 'Unread'),
(261, 'A Buy Request has Been Initiated', '2020-06-08 03:25:00', 'user', 184, 'Unread'),
(262, 'A Buy Request has been Initiated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(263, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(264, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:25:38', 'user', 184, 'Unread'),
(265, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(266, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:26:21', 'user', 184, 'Unread'),
(267, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(268, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:27:04', 'user', 184, 'Unread'),
(269, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(270, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:27:36', 'user', 184, 'Unread'),
(271, 'A Buy Request has Been Initiated', '2020-06-08 03:29:52', 'user', 184, 'Unread'),
(272, 'A Buy Request has been Initiated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(273, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(274, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:30:23', 'user', 184, 'Unread'),
(275, 'A Send Request Executed to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97', '2020-06-08 03:31:05', 'user', 184, 'Unread'),
(276, 'A Send Request Exected from 0xa977de8de97d8336389c275da3ce906b079b3885 to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97 from User', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(277, 'A Send Request Executed to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97', '2020-06-08 03:34:47', 'user', 184, 'Unread'),
(278, 'A Send Request Exected from 0xa977de8de97d8336389c275da3ce906b079b3885 to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97 from User', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(279, 'A Send Request Executed to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97', '2020-06-08 03:35:13', 'user', 184, 'Unread'),
(280, 'A Send Request Exected from 0xa977de8de97d8336389c275da3ce906b079b3885 to 0x483cfb0ea5629fa9ded547782d42398bd2cbba97 from User', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(281, 'A Buy Request has Been Initiated', '2020-06-08 03:36:42', 'user', 184, 'Unread'),
(282, 'A Buy Request has been Initiated', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(283, 'Buy Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(284, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-06-08 03:36:58', 'user', 184, 'Unread'),
(285, 'Withdraw Requests has been made From A User', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(286, 'You raised Withdraw Request of 972.9', '2020-06-08 03:37:31', 'user', 184, 'Unread'),
(287, 'Withdraw Token Request Approved', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(288, 'Your Withdraw Token Request Approved', '2020-06-08 03:37:41', 'user', 29, 'Unread'),
(289, 'A New User Created', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(290, 'A User has been Deleted', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(291, 'A New User Created', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(292, 'A New User Created', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(293, 'Your Profile Photo has been changed', '2020-08-31 12:06:56', 'user', 184, 'Unread'),
(294, 'A User Updated his Profile', '2020-08-31 14:47:49', 'admin', 0, 'Read'),
(295, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(296, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(297, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(298, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(299, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(300, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(301, 'A kyc Request Initiated', '2020-09-09 12:27:20', 'user', 199, 'Unread'),
(302, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(303, 'A kyc Request Initiated', '2020-09-09 12:27:45', 'user', 199, 'Unread'),
(304, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(305, 'A Buy Request has Been Initiated', '2020-09-09 12:41:49', 'user', 199, 'Unread'),
(306, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(307, 'A Buy Request has Been Initiated', '2020-09-09 12:51:23', 'user', 199, 'Unread'),
(308, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(309, 'A Buy Request has Been Initiated', '2020-09-09 12:53:46', 'user', 199, 'Unread'),
(310, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(311, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(312, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(313, 'A kyc Request Initiated', '2020-09-10 08:31:25', 'user', 201, 'Unread'),
(314, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(315, 'A kyc Request Initiated', '2020-09-10 08:31:29', 'user', 201, 'Unread'),
(316, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(317, 'A New User Created', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(318, 'A kyc Request Initiated', '2020-09-10 08:34:40', 'user', 202, 'Unread'),
(319, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(320, 'A kyc Request Initiated', '2020-09-10 08:34:43', 'user', 202, 'Unread'),
(321, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(322, 'A Buy Request has Been Initiated', '2020-09-10 08:36:42', 'user', 202, 'Unread'),
(323, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(324, 'A Send Request Executed to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2', '2020-09-10 08:49:03', 'user', 202, 'Unread'),
(325, 'A Send Request Exected from 0xA3D462eA2A2670490B28A86Ace85bB838226c71e to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2 from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(326, 'Withdraw Requests has been made From A User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(327, 'You raised Withdraw Request of 90.18', '2020-09-10 09:06:47', 'user', 202, 'Unread'),
(328, 'Withdraw Requests has been made From A User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(329, 'You raised Withdraw Request of 90.18', '2020-09-10 09:06:47', 'user', 202, 'Unread'),
(330, 'A User has been Deleted', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(331, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(332, 'Your Withdraw Token Request Approved', '2020-09-10 10:34:47', 'user', 5, 'Unread'),
(333, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(334, 'Your Withdraw Token Request Approved', '2020-09-10 10:35:47', 'user', 5, 'Unread'),
(335, 'Withdraw Requests has been made From A User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(336, 'You raised Withdraw Request of 900', '2020-09-10 10:36:50', 'user', 202, 'Unread'),
(337, 'Withdraw Requests has been made From A User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(338, 'You raised Withdraw Request of 900', '2020-09-10 10:36:50', 'user', 202, 'Unread'),
(339, 'Withdraw Requests has been made From A User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(340, 'You raised Withdraw Request of 1000', '2020-09-10 10:37:37', 'user', 202, 'Unread'),
(341, 'Withdraw Requests has been made From A User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(342, 'You raised Withdraw Request of 1000', '2020-09-10 10:37:37', 'user', 202, 'Unread'),
(343, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(344, 'Your Withdraw Token Request Approved', '2020-09-10 10:41:03', 'user', 0, 'Unread'),
(345, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(346, 'Your Withdraw Token Request Approved', '2020-09-10 10:41:40', 'user', 0, 'Unread'),
(347, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(348, 'Your Withdraw Token Request Approved', '2020-09-10 10:42:05', 'user', 202, 'Unread'),
(349, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(350, 'Your Withdraw Token Request Approved', '2020-09-10 10:42:23', 'user', 202, 'Unread'),
(351, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(352, 'Your Withdraw Token Request Approved', '2020-09-10 10:43:13', 'user', 0, 'Unread'),
(353, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(354, 'Your Withdraw Token Request Approved', '2020-09-10 10:44:03', 'user', 0, 'Unread'),
(355, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(356, 'Your Withdraw Token Request Approved', '2020-09-10 10:49:10', 'user', 202, 'Unread'),
(357, 'Withdraw Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(358, 'Your Withdraw Token Request Approved', '2020-09-10 10:50:11', 'user', 0, 'Unread'),
(359, 'A Buy Request has Been Initiated', '2020-09-10 10:50:48', 'user', 202, 'Unread'),
(360, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(361, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(362, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:51:04', 'user', 0, 'Unread'),
(363, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(364, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:51:04', 'user', 0, 'Unread'),
(365, 'A Buy Request has Been Initiated', '2020-09-10 10:52:25', 'user', 202, 'Unread'),
(366, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(367, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(368, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:53:37', 'user', 0, 'Unread'),
(369, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(370, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:53:37', 'user', 0, 'Unread'),
(371, 'A Buy Request has Been Initiated', '2020-09-10 10:54:03', 'user', 202, 'Unread'),
(372, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(373, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(374, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:54:14', 'user', 0, 'Unread'),
(375, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(376, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:54:15', 'user', 0, 'Unread'),
(377, 'A Buy Request has Been Initiated', '2020-09-10 10:55:22', 'user', 202, 'Unread'),
(378, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(379, 'A Buy Request has Been Initiated', '2020-09-10 10:57:23', 'user', 202, 'Unread'),
(380, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(381, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(382, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:58:04', 'user', 0, 'Unread'),
(383, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(384, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:58:04', 'user', 0, 'Unread'),
(385, 'A Buy Request has Been Initiated', '2020-09-10 10:59:06', 'user', 202, 'Unread'),
(386, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(387, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(388, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:59:31', 'user', 0, 'Unread'),
(389, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(390, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 10:59:31', 'user', 0, 'Unread'),
(391, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(392, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:01:23', 'user', 0, 'Unread'),
(393, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(394, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:01:23', 'user', 0, 'Unread'),
(395, 'A Buy Request has Been Initiated', '2020-09-10 11:01:52', 'user', 202, 'Unread'),
(396, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(397, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(398, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:01:59', 'user', 0, 'Unread'),
(399, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(400, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:01:59', 'user', 0, 'Unread'),
(401, 'A Buy Request has Been Initiated', '2020-09-10 11:03:38', 'user', 202, 'Unread'),
(402, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(403, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(404, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:03:52', 'user', 0, 'Unread'),
(405, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(406, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:03:52', 'user', 0, 'Unread'),
(407, 'A Buy Request has Been Initiated', '2020-09-10 11:05:41', 'user', 202, 'Unread'),
(408, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(409, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(410, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:06:00', 'user', 0, 'Unread'),
(411, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(412, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:06:00', 'user', 0, 'Unread'),
(413, 'A Buy Request has Been Initiated', '2020-09-10 11:15:16', 'user', 202, 'Unread'),
(414, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(415, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(416, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:15:26', 'user', 0, 'Unread'),
(417, 'Buy Token Request Approved', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(418, 'Your Buy Token Request Approved, Balance Has Been Added To Your Wallet', '2020-09-10 11:15:26', 'user', 0, 'Unread'),
(419, 'A Send Request Executed to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2', '2020-09-10 11:22:30', 'user', 202, 'Unread'),
(420, 'A Send Request Exected from 0xA3D462eA2A2670490B28A86Ace85bB838226c71e to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2 from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(421, 'Admin Account Profile Updated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(422, 'A User Updated his Profile', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(423, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(424, 'A kyc Request Initiated', '2020-11-19 07:39:27', 'user', 203, 'Unread'),
(425, 'A kyc is Requested from User', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(426, 'KYC Request Has been Verified', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(427, 'Your KYC Document is Verified', '2020-11-19 07:39:35', 'user', 203, 'Unread'),
(428, 'A Buy Request has Been Initiated', '2020-11-19 10:18:48', 'user', 203, 'Unread'),
(429, 'A Buy Request has been Initiated', '2020-11-19 10:27:28', 'admin', 0, 'Read'),
(430, 'Buy Token Request Approved', '2020-11-19 11:11:00', 'admin', 0, 'Read'),
(431, 'A Send Request Executed to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2', '2020-11-19 10:46:03', 'user', 203, 'Unread'),
(432, 'A Send Request Exected from 0x73AC3b78b28b1e58c094Fea1d38A053eba2f48C5 to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2 from User', '2020-11-19 11:11:00', 'admin', 0, 'Read'),
(433, 'Withdraw Requests has been made From A User', '2020-11-19 11:11:00', 'admin', 0, 'Read'),
(434, 'You raised Withdraw Request of 10', '2020-11-19 10:46:31', 'user', 203, 'Unread'),
(435, 'Withdraw Requests has been made From A User', '2020-11-19 11:11:00', 'admin', 0, 'Read'),
(436, 'You raised Withdraw Request of 10', '2020-11-19 10:46:31', 'user', 203, 'Unread'),
(437, 'A Support Request Initiated', '2020-11-19 10:51:07', 'user', 203, 'Unread'),
(438, 'A Support is Requested from User', '2020-11-19 11:11:00', 'admin', 0, 'Read'),
(439, 'Withdraw Token Request Approved', '2020-11-19 11:11:00', 'admin', 0, 'Read'),
(440, 'Your Withdraw Token Request Approved', '2020-11-19 10:51:58', 'user', 203, 'Unread'),
(441, 'A Support Request has been Deleted', '2020-11-19 11:31:49', 'admin', 0, 'Read'),
(442, 'A Buy Request has Been Initiated', '2020-11-19 11:24:20', 'user', 203, 'Unread'),
(443, 'A Buy Request has been Initiated', '2020-11-19 11:31:49', 'admin', 0, 'Read'),
(444, 'Buy Token Request Approved', '2020-11-19 11:31:49', 'admin', 0, 'Read'),
(445, 'Buy Token Request Approved', '2020-11-19 11:31:49', 'admin', 0, 'Read'),
(446, 'A New User Created', '2020-11-19 11:31:49', 'admin', 0, 'Read'),
(447, 'A New User Created', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(448, 'A kyc Request Initiated', '2020-11-19 11:35:24', 'user', 205, 'Unread'),
(449, 'A kyc is Requested from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(450, 'A kyc Request Initiated', '2020-11-19 11:37:55', 'user', 205, 'Unread'),
(451, 'A kyc is Requested from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(452, 'A kyc Request Initiated', '2020-11-19 11:39:10', 'user', 204, 'Unread'),
(453, 'A kyc is Requested from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(454, 'KYC Request Has been Verified', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(455, 'Your KYC Document is Verified', '2020-11-19 11:39:22', 'user', 204, 'Unread'),
(456, 'A kyc Request Initiated', '2020-11-19 11:39:38', 'user', 205, 'Unread'),
(457, 'A kyc is Requested from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(458, 'A Buy Request has Been Initiated', '2020-11-19 11:39:55', 'user', 204, 'Unread'),
(459, 'A Buy Request has been Initiated', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(460, 'Buy Token Request Approved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(461, 'Buy Token Request Approved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(462, 'A Send Request Executed to 0x73AC3b78b28b1e58c094Fea1d38A053eba2f48C5', '2020-11-19 11:43:26', 'user', 204, 'Unread'),
(463, 'A Send Request Exected from 0x51767326B7A5B2D0611750224314eEdE9F970E21 to 0x73AC3b78b28b1e58c094Fea1d38A053eba2f48C5 from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(464, 'KYC Request Has been Verified', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(465, 'Your KYC Document is Verified', '2020-11-19 11:44:50', 'user', 205, 'Unread'),
(466, 'KYC Request Has been Verified', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(467, 'Your KYC Document is Verified', '2020-11-19 11:44:54', 'user', 205, 'Unread'),
(468, 'KYC Request Has been Verified', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(469, 'Your KYC Document is Verified', '2020-11-19 11:44:56', 'user', 205, 'Unread'),
(470, 'A Buy Request has Been Initiated', '2020-11-19 11:45:40', 'user', 205, 'Unread'),
(471, 'A Buy Request has been Initiated', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(472, 'Buy Token Request Approved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(473, 'Buy Token Request Approved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(474, 'A Send Request Executed to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2', '2020-11-19 11:46:04', 'user', 205, 'Unread'),
(475, 'A Send Request Exected from 0xE78C93Fc2b875F556aF60860E274998F214BB0ad to 0x1CC7069234712e0e0eA266bB091ff5df70B69AC2 from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(476, 'Withdraw Requests has been made From A User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(477, 'You raised Withdraw Request of 50', '2020-11-19 11:48:20', 'user', 204, 'Unread'),
(478, 'Withdraw Requests has been made From A User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(479, 'You raised Withdraw Request of 50', '2020-11-19 11:48:20', 'user', 204, 'Unread'),
(480, 'Withdraw Token Request Approved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(481, 'Your Withdraw Token Request Approved', '2020-11-19 11:48:35', 'user', 204, 'Unread'),
(482, 'A Support Request Initiated', '2020-11-19 11:49:08', 'user', 204, 'Unread'),
(483, 'A Support is Requested from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(484, 'Support Request Resolved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(485, 'Your Support Request Resolved', '2020-11-19 11:49:35', 'user', 13, 'Unread'),
(486, 'A Support Request Was Answered', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(487, 'Your Support Ticket Was Responded', '2020-11-19 11:49:47', 'user', 204, 'Unread'),
(488, 'A Buy Request has Been Initiated', '2020-11-19 12:28:14', 'user', 204, 'Unread'),
(489, 'A Buy Request has been Initiated', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(490, 'Buy Token Request Approved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(491, 'Buy Token Request Approved', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(492, 'A Send Request Executed to 0x73AC3b78b28b1e58c094Fea1d38A053eba2f48C5', '2020-11-19 12:30:10', 'user', 204, 'Unread'),
(493, 'A Send Request Exected from 0x51767326B7A5B2D0611750224314eEdE9F970E21 to 0x73AC3b78b28b1e58c094Fea1d38A053eba2f48C5 from User', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(494, 'A New User Created', '2020-11-19 13:55:21', 'admin', 0, 'Read'),
(495, 'A Support Request Was Answered', '2020-11-20 06:01:05', 'admin', 0, 'Read'),
(496, 'Your Support Ticket Was Responded', '2020-11-20 06:00:33', 'user', 204, 'Unread'),
(497, 'Support Request Resolved', '2020-11-20 06:01:05', 'admin', 0, 'Read'),
(498, 'Your Support Request Resolved', '2020-11-20 06:00:46', 'user', 12, 'Unread'),
(499, 'A kyc Request Initiated', '2020-11-20 10:09:29', 'user', 206, 'Unread'),
(500, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(501, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(502, 'Your KYC Document is Verified', '2020-11-20 10:10:34', 'user', 206, 'Unread'),
(503, 'Your Profile has been Updated', '2020-11-20 10:12:25', 'user', 206, 'Unread'),
(504, 'Your Profile Photo has been changed', '2020-11-20 10:15:43', 'user', 206, 'Unread'),
(505, 'A User Updated his Profile', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(506, 'A Support Request Initiated', '2020-11-20 10:24:34', 'user', 206, 'Unread'),
(507, 'A Support is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(508, 'A Buy Request has Been Initiated', '2020-11-20 10:25:46', 'user', 206, 'Unread'),
(509, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(510, 'A Buy Request has Been Initiated', '2020-11-20 10:26:28', 'user', 206, 'Unread'),
(511, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(512, 'A Buy Request has Been Initiated', '2020-11-20 10:26:45', 'user', 206, 'Unread'),
(513, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(514, 'A Support Request Was Answered', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(515, 'Your Support Ticket Was Responded', '2020-11-20 10:32:19', 'user', 206, 'Unread'),
(516, 'A Buy Request has Been Initiated', '2020-11-22 11:00:46', 'user', 206, 'Unread'),
(517, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(518, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(519, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(520, 'A New User Created', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(521, 'A kyc Request Initiated', '2020-11-23 09:59:32', 'user', 207, 'Unread'),
(522, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(523, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read');
INSERT INTO `notification` (`id`, `notification`, `date`, `for`, `user_id`, `status`) VALUES
(524, 'Your KYC Document is Verified', '2020-11-23 10:00:42', 'user', 207, 'Unread'),
(525, 'A Send Request Executed to 0x3Fdf615179D79A1F3040007dB2B5C8e7d221F9fe', '2020-11-23 10:03:11', 'user', 206, 'Unread'),
(526, 'A Send Request Exected from 0x9d74d92A453Cb4F9625D35072BCef72C40269379 to 0x3Fdf615179D79A1F3040007dB2B5C8e7d221F9fe from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(527, 'A Buy Request has Been Initiated', '2020-11-23 10:04:39', 'user', 207, 'Unread'),
(528, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(529, 'A Send Request Executed to 0x9d74d92A453Cb4F9625D35072BCef72C40269379', '2020-11-23 10:04:59', 'user', 207, 'Unread'),
(530, 'A Send Request Exected from 0x3Fdf615179D79A1F3040007dB2B5C8e7d221F9fe to 0x9d74d92A453Cb4F9625D35072BCef72C40269379 from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(531, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(532, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(533, 'A kyc Request Initiated', '2020-12-03 12:47:21', 'user', 205, 'Unread'),
(534, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(535, 'A kyc Request Initiated', '2020-12-03 13:25:53', 'user', 205, 'Unread'),
(536, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(537, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(538, 'Your KYC Document is Verified', '2020-12-03 13:28:40', 'user', 205, 'Unread'),
(539, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(540, 'Your KYC Document is Verified', '2020-12-03 13:37:00', 'user', 205, 'Unread'),
(541, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(542, 'Your KYC Document is Verified', '2020-12-03 13:38:17', 'user', 205, 'Unread'),
(543, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(544, 'Your KYC Document is Verified', '2020-12-03 13:40:21', 'user', 205, 'Unread'),
(545, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(546, 'Your KYC Document is Verified', '2020-12-03 13:43:16', 'user', 205, 'Unread'),
(547, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(548, 'Your KYC Document is Verified', '2020-12-03 13:54:44', 'user', 205, 'Unread'),
(549, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(550, 'Your KYC Document is Verified', '2020-12-03 13:58:21', 'user', 205, 'Unread'),
(551, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(552, 'Your KYC Document is Verified', '2020-12-03 14:00:27', 'user', 205, 'Unread'),
(553, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(554, 'Your KYC Document is Verified', '2020-12-03 14:06:41', 'user', 205, 'Unread'),
(555, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(556, 'Your KYC Document is Verified', '2020-12-03 14:34:13', 'user', 205, 'Unread'),
(557, 'A New User Created', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(558, 'A kyc Request Initiated', '2020-12-07 14:37:34', 'user', 200, 'Unread'),
(559, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(560, 'A New User Created', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(561, 'A kyc Request Initiated', '2020-12-07 15:12:50', 'user', 209, 'Unread'),
(562, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(563, 'A kyc Request Initiated', '2020-12-07 15:19:41', 'user', 209, 'Unread'),
(564, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(565, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(566, 'Your KYC Document is Verified', '2020-12-08 07:37:52', 'user', 209, 'Unread'),
(567, 'A New User Created', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(568, 'A New User Created', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(569, 'A Buy Request has Been Initiated', '2020-12-08 10:08:08', 'user', 209, 'Unread'),
(570, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(571, 'A New User Created', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(572, 'A kyc Request Initiated', '2020-12-08 11:08:58', 'user', 212, 'Unread'),
(573, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(574, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(575, 'Your KYC Document is Verified', '2020-12-08 11:10:41', 'user', 212, 'Unread'),
(576, 'A kyc Request Initiated', '2020-12-08 11:18:04', 'user', 212, 'Unread'),
(577, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(578, 'A Buy Request has Been Initiated', '2020-12-09 02:34:09', 'user', 209, 'Unread'),
(579, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(580, 'A Buy Request has Been Initiated', '2020-12-09 02:34:38', 'user', 209, 'Unread'),
(581, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(582, 'A Buy Request has Been Initiated', '2020-12-09 02:38:11', 'user', 209, 'Unread'),
(583, 'A Buy Request has been Initiated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(584, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(585, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(586, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(587, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(588, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(589, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(590, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(591, 'Buy Token Request Approved', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(592, 'A Send Request Executed to 0x9d74d92A453Cb4F9625D35072BCef72C40269379', '2020-12-09 02:47:28', 'user', 207, 'Unread'),
(593, 'A Send Request Exected from 0x3Fdf615179D79A1F3040007dB2B5C8e7d221F9fe to 0x9d74d92A453Cb4F9625D35072BCef72C40269379 from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(594, 'A kyc Request Initiated', '2020-12-23 06:07:27', 'user', 207, 'Unread'),
(595, 'A kyc is Requested from User', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(596, 'KYC Request Has been Verified', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(597, 'Your KYC Document is Verified', '2020-12-23 06:10:47', 'user', 207, 'Unread'),
(598, 'Admin Account Profile Updated', '2020-12-23 06:16:49', 'admin', 0, 'Read'),
(599, 'A kyc Request Initiated', '2020-12-23 07:35:37', 'user', 204, 'Unread'),
(600, 'A kyc is Requested from User', '2020-12-26 04:46:04', 'admin', 0, 'Read'),
(601, 'A kyc Request Initiated', '2020-12-23 07:36:37', 'user', 204, 'Unread'),
(602, 'A kyc is Requested from User', '2020-12-26 04:46:04', 'admin', 0, 'Read'),
(603, 'Admin Account Profile Updated', '2020-12-26 04:46:04', 'admin', 0, 'Read'),
(604, 'A kyc Request Initiated', '2020-12-23 08:51:29', 'user', 207, 'Unread'),
(605, 'A kyc is Requested from User', '2020-12-26 04:46:04', 'admin', 0, 'Read'),
(606, 'Admin Account Profile Updated', '2020-12-26 04:46:04', 'admin', 0, 'Read'),
(607, 'Admin Account Profile Updated', '2020-12-26 04:46:04', 'admin', 0, 'Read'),
(608, 'Admin changed price settings ', '2020-12-27 18:28:58', 'admin', 0, 'Read'),
(609, 'Admin changed price settings ', '2020-12-27 18:28:58', 'admin', 0, 'Read'),
(610, 'Admin changed price settings ', '2020-12-27 18:28:58', 'admin', 0, 'Read'),
(611, 'Admin changed price settings ', '2020-12-27 18:28:58', 'admin', 0, 'Read'),
(612, 'Admin changed price settings ', '2020-12-27 18:28:58', 'admin', 0, 'Read'),
(613, 'A New User Created', '2020-12-29 05:47:42', 'admin', 0, 'Read'),
(614, 'Admin changed price settings ', '2020-12-29 05:47:42', 'admin', 0, 'Read'),
(615, 'A New User Created', '2020-12-30 05:12:34', 'admin', 0, 'Read'),
(616, 'A kyc Request Initiated', '2020-12-29 08:53:12', 'user', 214, 'Unread'),
(617, 'A kyc is Requested from User', '2020-12-30 05:12:34', 'admin', 0, 'Read'),
(618, 'KYC Request Has been Verified', '2020-12-30 05:16:13', 'admin', 0, 'Unread'),
(619, 'Your KYC Document is Verified', '2020-12-30 05:16:13', 'user', 214, 'Unread'),
(620, 'A Buy Request has Been Initiated', '2020-12-30 05:32:25', 'user', 214, 'Unread'),
(621, 'A Buy Request has been Initiated', '2020-12-30 05:32:25', 'admin', 0, 'Unread'),
(622, 'A Buy Request has Been Initiated', '2020-12-30 05:33:52', 'user', 214, 'Unread'),
(623, 'A Buy Request has been Initiated', '2020-12-30 05:33:52', 'admin', 0, 'Unread'),
(624, 'A Buy Request has Been Initiated', '2020-12-30 05:34:35', 'user', 214, 'Unread'),
(625, 'A Buy Request has been Initiated', '2020-12-30 05:34:35', 'admin', 0, 'Unread'),
(626, 'Buy Token Request Approved', '2020-12-30 05:47:01', 'admin', 0, 'Unread'),
(627, 'Buy Token Request Approved', '2020-12-30 05:47:01', 'admin', 0, 'Unread'),
(628, 'Buy Token Request Approved', '2020-12-30 05:47:06', 'admin', 0, 'Unread'),
(629, 'Buy Token Request Approved', '2020-12-30 05:47:06', 'admin', 0, 'Unread'),
(630, 'Buy Token Request Approved', '2020-12-30 05:47:13', 'admin', 0, 'Unread'),
(631, 'Buy Token Request Approved', '2020-12-30 05:47:13', 'admin', 0, 'Unread'),
(632, 'A Send Request Executed to 0xDa14E530cEA8Bc9e48Af7256342540435e0cd5a5', '2020-12-30 05:55:07', 'user', 214, 'Unread'),
(633, 'A Send Request Exected from 0xC24364559FbC8f2f3b3139f66E2a2816aa24d192 to 0xDa14E530cEA8Bc9e48Af7256342540435e0cd5a5 from User', '2020-12-30 05:55:07', 'admin', 0, 'Unread'),
(634, 'A Send Request Executed to 0xC24364559FbC8f2f3b3139f66E2a2816aa24d192', '2020-12-30 06:02:33', 'user', 207, 'Unread'),
(635, 'A Send Request Exected from 0x3Fdf615179D79A1F3040007dB2B5C8e7d221F9fe to 0xC24364559FbC8f2f3b3139f66E2a2816aa24d192 from User', '2020-12-30 06:02:33', 'admin', 0, 'Unread'),
(636, 'A Send Request Executed to 0x3Fdf615179D79A1F3040007dB2B5C8e7d221F9fe', '2020-12-30 06:07:28', 'user', 214, 'Unread'),
(637, 'A Send Request Exected from 0xC24364559FbC8f2f3b3139f66E2a2816aa24d192 to 0x3Fdf615179D79A1F3040007dB2B5C8e7d221F9fe from User', '2020-12-30 06:07:28', 'admin', 0, 'Unread'),
(638, 'A New User Created', '2020-12-30 11:21:41', 'admin', 0, 'Unread'),
(639, 'A kyc Request Initiated', '2020-12-30 11:25:33', 'user', 215, 'Unread'),
(640, 'A kyc is Requested from User', '2020-12-30 11:25:33', 'admin', 0, 'Unread'),
(641, 'KYC Request Has been Verified', '2020-12-30 11:27:22', 'admin', 0, 'Unread'),
(642, 'Your KYC Document is Verified', '2020-12-30 11:27:22', 'user', 215, 'Unread'),
(643, 'A Buy Request has Been Initiated', '2020-12-30 11:28:48', 'user', 215, 'Unread'),
(644, 'A Buy Request has been Initiated', '2020-12-30 11:28:48', 'admin', 0, 'Unread'),
(645, 'A Buy Request has Been Initiated', '2020-12-30 11:29:00', 'user', 215, 'Unread'),
(646, 'A Buy Request has been Initiated', '2020-12-30 11:29:00', 'admin', 0, 'Unread'),
(647, 'A Buy Request has Been Initiated', '2020-12-30 11:29:11', 'user', 215, 'Unread'),
(648, 'A Buy Request has been Initiated', '2020-12-30 11:29:11', 'admin', 0, 'Unread'),
(649, 'Buy Token Request Approved', '2020-12-30 11:31:03', 'admin', 0, 'Unread'),
(650, 'Buy Token Request Approved', '2020-12-30 11:31:03', 'admin', 0, 'Unread'),
(651, 'Buy Token Request Approved', '2020-12-30 11:31:09', 'admin', 0, 'Unread'),
(652, 'Buy Token Request Approved', '2020-12-30 11:31:09', 'admin', 0, 'Unread'),
(653, 'Buy Token Request Approved', '2020-12-30 11:31:19', 'admin', 0, 'Unread'),
(654, 'Buy Token Request Approved', '2020-12-30 11:31:19', 'admin', 0, 'Unread'),
(655, 'A New User Created', '2020-12-31 08:03:48', 'admin', 0, 'Unread'),
(656, 'A kyc Request Initiated', '2020-12-31 08:06:14', 'user', 216, 'Unread'),
(657, 'A kyc is Requested from User', '2020-12-31 08:06:14', 'admin', 0, 'Unread'),
(658, 'KYC Request Has been Verified', '2020-12-31 08:09:01', 'admin', 0, 'Unread'),
(659, 'Your KYC Document is Verified', '2020-12-31 08:09:01', 'user', 216, 'Unread'),
(660, 'A Buy Request has Been Initiated', '2020-12-31 08:12:18', 'user', 216, 'Unread'),
(661, 'A Buy Request has been Initiated', '2020-12-31 08:12:18', 'admin', 0, 'Unread'),
(662, 'A Buy Request has Been Initiated', '2020-12-31 08:13:33', 'user', 216, 'Unread'),
(663, 'A Buy Request has been Initiated', '2020-12-31 08:13:33', 'admin', 0, 'Unread'),
(664, 'A Buy Request has Been Initiated', '2020-12-31 08:14:05', 'user', 216, 'Unread'),
(665, 'A Buy Request has been Initiated', '2020-12-31 08:14:05', 'admin', 0, 'Unread'),
(666, 'Buy Token Request Approved', '2020-12-31 08:16:45', 'admin', 0, 'Unread'),
(667, 'Buy Token Request Approved', '2020-12-31 08:16:45', 'admin', 0, 'Unread'),
(668, 'Buy Token Request Approved', '2020-12-31 08:16:51', 'admin', 0, 'Unread'),
(669, 'Buy Token Request Approved', '2020-12-31 08:16:51', 'admin', 0, 'Unread'),
(670, 'Buy Token Request Approved', '2020-12-31 08:16:56', 'admin', 0, 'Unread'),
(671, 'Buy Token Request Approved', '2020-12-31 08:16:56', 'admin', 0, 'Unread'),
(672, 'A Send Request Executed to 0x516c0dA0CF49cBea7f86C205Fb669143D6c6A03d', '2020-12-31 08:28:03', 'user', 215, 'Unread'),
(673, 'A Send Request Exected from 0x514f29848A98841E8D9eBE68AD9BB2FC15a82b22 to 0x516c0dA0CF49cBea7f86C205Fb669143D6c6A03d from User', '2020-12-31 08:28:03', 'admin', 0, 'Unread'),
(674, 'A Send Request Executed to 0x514f29848A98841E8D9eBE68AD9BB2FC15a82b22', '2020-12-31 08:30:52', 'user', 216, 'Unread'),
(675, 'A Send Request Exected from 0x516c0dA0CF49cBea7f86C205Fb669143D6c6A03d to 0x514f29848A98841E8D9eBE68AD9BB2FC15a82b22 from User', '2020-12-31 08:30:52', 'admin', 0, 'Unread'),
(676, 'A Send Request Executed to 0x516c0dA0CF49cBea7f86C205Fb669143D6c6A03d', '2020-12-31 08:35:21', 'user', 215, 'Unread'),
(677, 'A Send Request Exected from 0x514f29848A98841E8D9eBE68AD9BB2FC15a82b22 to 0x516c0dA0CF49cBea7f86C205Fb669143D6c6A03d from User', '2020-12-31 08:35:21', 'admin', 0, 'Unread'),
(678, 'A New User Created', '2021-01-27 17:42:10', 'admin', 0, 'Unread'),
(679, 'A New User Created', '2021-02-01 12:49:51', 'admin', 0, 'Unread'),
(680, 'A kyc Request Initiated', '2021-02-01 13:04:44', 'user', 218, 'Unread'),
(681, 'A kyc is Requested from User', '2021-02-01 13:04:44', 'admin', 0, 'Unread'),
(682, 'KYC Request Has been Verified', '2021-02-01 13:04:54', 'admin', 0, 'Unread'),
(683, 'Your KYC Document is Verified', '2021-02-01 13:04:54', 'user', 218, 'Unread'),
(684, 'A KYC Request  has been Deleted', '2021-02-01 13:05:45', 'admin', 0, 'Unread'),
(685, 'A New User Created', '2021-02-01 15:21:25', 'admin', 0, 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell_requests`
--

CREATE TABLE `sell_requests` (
  `id` int(11) NOT NULL,
  `to_address` varchar(50) NOT NULL,
  `from_address` varchar(50) NOT NULL,
  `token` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tx_hash` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Success'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `send_carbon_credits_requests`
--

CREATE TABLE `send_carbon_credits_requests` (
  `id` int(11) NOT NULL,
  `to_address` varchar(50) NOT NULL,
  `from_address` varchar(50) NOT NULL,
  `token` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tx_hash` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Success'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `send_energy_credits_requests`
--

CREATE TABLE `send_energy_credits_requests` (
  `id` int(11) NOT NULL,
  `to_address` varchar(50) NOT NULL,
  `from_address` varchar(50) NOT NULL,
  `token` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tx_hash` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Success'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `ans` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `user_id`, `name`, `email`, `question`, `description`, `date`, `status`, `ans`) VALUES
(11, 184, 'arpita', 'arpita@ahrvo.io', 'Why my Wallet is Wiped Out?', 'Recently i logged into my account and saw all my data and coins were wiped out. Can u tell me why did this happened to me?', '2020-04-09 01:45:06', 'Resolved', ''),
(12, 203, 'priyankamodi76', 'priyankamodi76@gmail.com', 'Something is here', 'sdasds', '2020-11-20 06:00:46', 'Resolved', NULL),
(13, 204, 'y', 'y@gmail.com', 'Where are my tokens?', 'Where are my tokens?', '2020-11-20 06:00:33', 'Answered', 'Test'),
(14, 206, 'jester.crypto', 'jester.crypto@gmail.com', 'Hello?', 'Test', '2020-11-20 10:32:19', 'Answered', 'Answer to hello');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `to` varchar(70) NOT NULL,
  `from` varchar(70) NOT NULL,
  `tx_address` varchar(100) NOT NULL,
  `tokens` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL,
  `process` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'SXT'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tx_addresses`
--

CREATE TABLE `tx_addresses` (
  `id` int(11) NOT NULL,
  `tx_address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tx_addresses`
--

INSERT INTO `tx_addresses` (`id`, `tx_address`, `email`, `status`) VALUES
(1, '0xaec1b8bf6196225e5e8848e220a58867a23d5a95', 'crazykane2000@gmail.com', 'Pending'),
(2, '0xd085ad2c03f2d8dadc9d686fe2979a073b700f2f', 'crazykane2000@gmail.com', 'Pending'),
(3, '0x1b6e5b5c16ac60ee58819a248f0d969f540472ba', 'crazykane2000@gmail.com', 'Pending'),
(4, '0xb4799d2278a60958e6e4a602de4bec0bca85fd06', 'coke@outlook.co.th', 'Pending'),
(5, '0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12', 'info@solarxell.com', 'Pending'),
(6, '0xf34d006ccc5a6170b4be62df767a7d966dba1687', 'guptavinshu@gmail.com', 'Pending'),
(7, '0x1c2541b18d5345f5635f09ee2fd85fe2ca0590e5', 'squad@gmail.com', 'Pending'),
(8, '0x483cfb0ea5629fa9ded547782d42398bd2cbba97', 'kinie@ahrvo.io', 'Pending'),
(9, '0xa977de8de97d8336389c275da3ce906b079b3885', 'arpita@ahrvo.io', 'Pending'),
(10, '0xd44a5bcd12762672ceb03350233100b3baae95be', 'appo.agbamu@ahrvo.com', 'Pending'),
(11, '0x361cad0d9d8f02322af1d8c2ec0446658401e8b0', 'info@ahrvo.com', 'Pending'),
(12, '0x3173a69df2e8c24faae1fb649fa85ca82f53ad29', 'rabi@rabilive.com', 'Pending'),
(13, '0xe1e6899edc07abac87d277ec010c5f0e7292a789', 'priyankamodi76@gmail.com', 'Pending'),
(14, '0xa3b13e73627e11f7cfe520a70449700841b0305f', 'alankar@gmail.com', 'Pending'),
(15, '0xe950339bd45909441b939eab7911a5899331a91a', 'test@test.com', 'Pending'),
(16, '0x2e14120e63b49ea959a0681cb09252d5166fbd26', 'vinshu.gupta@nonceblox.com', 'Pending'),
(17, '0x00c4bc23481c04081170d91f902f732b687673b0', 'agbam002@d.umn.edu', 'Pending'),
(18, '0x6aff49e563d4898aaf65c060f0f9d4caeada7122', 'info@ahrvo.io', 'Pending'),
(19, '0x0301f04484c0991a50496ea45e9a07c204c2094b', 'sbmgcg2@gmail.com', 'Pending'),
(20, '0x7ccb20cf8728081bb54f7f4cbcfb7835d3bd28ab', 'sbmgcg2@gmail.com', 'Pending'),
(21, '0x63f6ba60768c756a4a34391933556dd3b489ed46', 'sbmgcg2@gmail.com', 'Pending'),
(22, '0x184d11bd6c5bd928a82d4572000edddb52d0ba3c', 'sbmgcg2@gmail.com', 'Pending'),
(23, '0xcbe6f7f3465fa4d3569091b30ea4dc4d1b43aa05', 'sbmgcg2@gmail.in', 'Pending'),
(24, '0x7f5b55e7490535c6112287ced2c87aa0973416c8', 'sbmgcg2@gmail.in', 'Pending'),
(25, '0xd1805ad0cad1a519744344fba1337f5972541483', 'sbmgcg2@gmail.co', 'Pending'),
(32, '0xe55dc41c52e1cf0caf5fbe2beca12c793a785a75', 'sbmgcg2@gmail.co', 'Pending'),
(27, '0xed839f2d99001f132e3b2564c9fbb1e7181691a2', 'sbmgcg2@gmail.com2', 'Pending'),
(29, '0xf1f96fafa0ce122cbeca891302fe5dd26724c3e0', 'sbmgcg2@gmail.com4', 'Pending'),
(30, '0x4ac88294385a2a0d3a073fbf9301efe509d513ee', 'sbmgcg2@gmail.comt', 'Pending'),
(31, '0xb8be6b5ce7d9b5f9ceb71c301db0887370ef576e', 'sbmgcg2@gmail.comte', 'Pending'),
(33, '0xb1c776df45ab315f3c1d87dfa1a34287d1b90d73', 'demotest@ahrvo.io', 'Pending'),
(35, '0xceecf88e206baf013eb0028250b4b3035220513d', 'demot@ahrvo.io', 'Pending'),
(36, '0x6dd51734c32e10451af2fa8f5c3f95d62f9a45ee', 'demo@ahrvo.io', 'Pending'),
(37, '0x66770cb38bef6a5e86836d81bd2df1a2e002bc10', 'sbmgcg2@gmail.comasd', 'Pending'),
(38, '0x877e4d2364067e158d06ec867f0ae5572b260858', 'demo@ahrvo.com', 'Pending'),
(39, '0xb72f3f2abbb776f54308fb2db4b77ba13b5156e3', 'batakh@gmail.com', 'Pending'),
(40, '0xe09703b59492e88c99a0aa60081f3062ee14ad68', 'test@ahrvo.io', 'Pending'),
(41, '0x26c36ce0a78cbe878592ac1b893064272f3ac09a', 'test2@ahrvo.io', 'Pending'),
(43, '0x85215d028c3c7e5ed80c6c7e3c568aaf06b4421c', 'sbmgcg2@gmail.com', 'Pending'),
(45, '0x5f84faab7dbdf7b919946ece0a12c3b823c45c04', 'test@ahrvo.io', 'Pending'),
(72, '0xd604994dc6432f93865e86e6624dc15417224883', 'y@gmail.com', 'Pending'),
(48, '0xbb0c702c5f8cd243a775890e83fc3c8ccace06ea', 'arpitabirla@gmail.com', 'Pending'),
(49, '0x04fdfe8a1f97a86cc08543fc09468548fc00e46a', 'jester.crypto@gmail.com', 'Pending'),
(50, '0x88205b8d7d51d9296b219519355a65c9d0ecf0e6', 'tamir@obortech.io', 'Pending'),
(53, '0x2ced8b532c93a447ab364847481958c4975d00e1', 'kritika.birla@gmail.com', 'Pending'),
(54, '0x0e7879110e81bddee510777e5312357275bce526', 'tamir.hariad@gmail.com', 'Pending'),
(55, '0xee3d942c22b359f19465f8d891fa073189d0e9d3', 'test@test.com', 'Pending'),
(56, '0xf0bdcaffb5e266029e3e589900c8d07f1e5f0aab', 'Gtest@hub.com', 'Pending'),
(59, '0x3023999a73874af93bf7f3ce7922be4dd82b831f', 'Ntug@ntug.mn', 'Pending'),
(60, '0x9f0cf9d402462a084924b067c3a383abfb8782a9', 'care.cookiestudio@gmail.com', 'Pending'),
(61, '0x115ceaba706b486a9c08d9bd2c9ce82f0ab7a2a7', '1001tamir@gmail.com', 'Pending'),
(71, '0x512ce33fa98038d43a89ae4c379ffa424eb8f529', 'tamir.base@gmail.com', 'Pending'),
(64, '0xcaa3dc93bb0a297c7772e5ce314d716f1df0b7aa', 'jester.crypto.long@gmail.com', 'Pending'),
(65, '0x2d45c9070ba30d92c92817b570a3b13c5c501aa8', 'vinshu.gupta@nonceblox.com', 'Pending'),
(66, '0x5283f8721f145833cab3f9ca3b074b8936807a92', 'arpita@coinnest.io', 'Pending'),
(67, '0xe9875d2ebbe1b454d66c6a1c4abd2d33e9b2bcae', 'arpita@aqua.io', 'Pending'),
(68, '0x749258932d5dfed1c4c5f3db70b01a2280bb39fd', 'c.sato.rb@gmail.com', 'Pending'),
(69, '0x21eb0cf0aa59d2670d76ee30217e65b44fbefaae', 'cyberrichhk@gmail.com', 'Pending'),
(70, '0xf28efa3943e3452257dfc210cd693183f7db7e43', 'cyberrichhk@gmail.com', 'Pending'),
(73, '0xe1d597fb9ceb7d4abfcea0a19ce024f92ad57482', 'Crazykane2000@gmail.com', 'Pending'),
(74, '0x8127681e89758465b3a36e787a8f0b09fd9bc4b2', 'fsvhiro2003@yahoo.co.jp', 'Pending'),
(75, '0x33fe59a5781f7e5664f5ac364fbd5f6e329828fe', 'noguchipintoerikson@gmail.com', 'Pending'),
(76, '0xf27f4662ef0298c0e11d6fcb35e728d63512d0cc', 'admin@bigbang.com', 'Pending'),
(77, '0x877c916e6cfdda1eea1eb1c4b8845b19e664fd98', 'wnldpdyd21@gmail.com', 'Pending'),
(78, '0x70cbea6cbfcc4cc7b90ccc63e6fcadb32f8bcc7a', 'arpitabirla@gmail.com', 'Pending'),
(79, '0xfb4f7cf92e1fdedc6bf222166d94cf5bb4215ea9', 'kishan@mailinator.com', 'Pending'),
(80, '0x53415cafacb8340b1e4a9a7174f55f2fa57454a5', 'arpitabirla@mailinator.com', 'Pending'),
(81, '0xa44f1c2c1c07867581004ee758095d087211389b', 'pchevry@gmail.com', 'Pending'),
(82, '0x0c0607ad074a629e3d4b7f3a61e9a187830faa41', 'kys58229277@gmail.com', 'Pending'),
(83, '0x371d8da09735068083245b494bd12d3f0bea63f7', 'yosikawa72@naver.com', 'Pending'),
(84, '0x3a54be99326864e43b4e2d8cc817bb850c04c1ed', 'daebak4979@gmail.com', 'Pending'),
(85, '0x392c3774658fb680c29f6edcb0470de17d79ab33', 'gin@bax-tv.com', 'Pending'),
(86, '0x2c8811af49286d20ee4b388783fab8f09d4c62a0', 'peter@fmstech.asia', 'Pending'),
(87, '0x10c3d54044803bf92a14c75a9c040494d6487d98', 'ritamg123@gmail.com', 'Pending'),
(88, '0x361de0159c63911fdb2260a1a75903f2d5d05886', 'crazykane2000@gmail.com', 'Pending'),
(89, '0xc267c4d35fb681a731410d90f69a62359e60c5b6', 'dalma929@naver.com', 'Pending'),
(90, '0x7eb989928681ee67ba8f4f5ce5890333b03697d1', 'nnnnnnnn103103@gmail.com', 'Pending'),
(91, '0x168daf5a4edf803082f61acc5402c67d65ee2ebf', 'golden_baek@naver.com', 'Pending'),
(92, '0x1c0f2405bba3aefd80354a809209d59e263226b6', 'opopyk@naver.com', 'Pending'),
(93, '0x1ebcafbc71ccc49df19ebbe37345e53fe0120aa1', 'irielife11196@gmail.com', 'Pending'),
(94, '0x524b301c5bf46f16e47667637e70d1d1a1c815ec', 'new2s@hanmail.net', 'Pending'),
(95, '0x1e7d7191da13a9a448476fcc7e28b7f0d1e2a607', 'stout2408@gmail.com', 'Pending'),
(96, '0x722f482941e4074762b3903da2f0b04df4f162f3', 'mehwa2000@gmail.com', 'Pending'),
(97, '0xdbb05cc2f6d69538c100ee32071f21dc15bd4ce9', 'pairworld@naver.com', 'Pending'),
(98, '0x23438dd8ef6e7efd30622469564d841b6934b0fa', 'perfectpeople38@gmail.com', 'Pending'),
(99, '0x7e1ec7108ffc428455ff9451c8a5000ee0450a9f', 'Kkh180407', 'Pending'),
(100, '0xd5d7d1cea8169c62e9b6d14d2e344eadb71ee552', 'kkh180407@gmail.com', 'Pending'),
(101, '0xfd32f83f1904790016ba8969449b1e733d5fa499', 'litjeong@naver.com', 'Pending'),
(102, '0xa6d382a622f8daa4a4188f655605cac89462731a', 'jtl1291@gmail.com ', 'Pending'),
(103, '0x725866e1ccac3d5309b458e18a41391c4cf4e129', 'hakmoon21@gmail.com', 'Pending'),
(104, '0x999b64caaad5ea4c99553430ae5e13cd4532b070', 'yelllim8@gmail.com', 'Pending'),
(105, '0x3392395ebc6b22f6fb67661a4ef6a946d338df6b', 'aaaa5149999@gmail.com', 'Pending'),
(106, '0xf34b4a758806b284b590aa0f149f950220bafa14', 'qkddk6@naver.com', 'Pending'),
(107, '0xe43ad26c5870ff15c506d9e8b7c1c42f718e77bf', 'jtl1291@hanmail.net', 'Pending'),
(108, '0xa9ad1eb948c9ddf0e40e446d2e19db7e32ff4cde', 'kimkj8259@gmail.com', 'Pending'),
(109, '0x3a3411dc85b8adb45fdd69a1b456cce4a97e255d', 'kkh84511@gmail.com', 'Pending'),
(110, '0xa003b76f2581f5639f4829db202c5e5e08f6058e', 'lol08070301@gmail.com', 'Pending'),
(111, '0x02d7298873779ed50a9c3c2543baa6fb0978ace6', 'hkisac@hanmail.net', 'Pending'),
(112, '0x4930ad9f47f81e7f20a411dfa59a9e052ec96807', 'a01041186602@gmail.com', 'Pending'),
(113, '0xd724a0e3ef4fa317b68909b886293d5b62603076', 'salangtu@gmail.com', 'Pending'),
(114, '0x929a639cdd638724279bedd1804f2d64d012fac1', 'wooree31311@gmail.com', 'Pending'),
(115, '0x37e541ed7f2845f047fe17fa1f021766cc26f6f0', 'youknock58@gmail.com', 'Pending'),
(116, '0x4c3a2177c83a2b5a77f546fa8ad533a6e75b735a', 'ito3135@gmail.com', 'Pending'),
(117, '0x52d100bc9e62c404bd6ff03cd41f35a81d2e05f5', 'globaldevery25@gmail.com', 'Pending'),
(118, '0xc8b31990d5a0d3024257fbccbb86dfb62297d887', 'hkshins777@gmail.com', 'Pending'),
(119, '0x226cd94d08ded63b142ce4e7c3d1ac0e1e2be4cd', 'goldmedal', 'Pending'),
(120, '0x41168e21add5d3241d89d526a23ab899cb3e8210', '7002coin@gmail.com', 'Pending'),
(121, '0x5c9ccef4999b0785a67c051ef71ac3a7593f1d23', 'tower4688 ', 'Pending'),
(122, '0x622e357c73f0e110fb2734a4d50ea77397b863b0', 'tower4688 @naver.com', 'Pending'),
(123, '0x6fef0715bcf5642b7ac67d47662010853d28ead9', 'kunihiko_okudaira@yahoo.co.jp', 'Pending'),
(124, '0x24fefd5f1863983f92dd21d72e8df7d122b4e7dc', 'tower4688@ naver.com ', 'Pending'),
(125, '0x906db5b38aa7174230557a9b936130efb48e4457', 'generation_next21a@yahoo.co.jp', 'Pending'),
(126, '0xda4f1d55cfa7f65689dc4199edc7509c95112ad0', 'watanabe@symphony-co.biz', 'Pending'),
(127, '0x9be1248878553b2351698f1ae17757dd94f58f25', '2914kanakororin@gmail.com', 'Pending'),
(128, '0xc49797a214166951c8d20dcab710d9b2793f4f8c', 'hky8520@nate.com ', 'Pending'),
(129, '0x9fa52bedf2084255fe224366a6c1188f8ed7d2ac', 'hky85200@nate.com', 'Pending'),
(130, '0x901f94c4506013c2aa0e5f6d9c52826a00360d87', 'yell-lim@hanmail.net', 'Pending'),
(131, '0xd8844f981bfbae568a78e553dfd18ebb71dc40bf', 'yelllim@naver.com', 'Pending'),
(132, '0xf8219ed450911929ad3f2051f0f3a133f6e1ea71', 'tower4688@naver.com', 'Pending'),
(133, '0x18a878940341cc0c6f9ed19f02dd28179b213c9f', '0363.masart@gmail.com', 'Pending'),
(134, '0xdde613c5651f24b7377c58b1f24967b0ce605f6b', 'jtl1291b@gmail.com', 'Pending'),
(135, '0xf2b02074db60999eef74ea47445f1fe159eda0e8', 'hyounmi8259@gmail.com', 'Pending'),
(136, '0x339a57a5730e9cacbc2411ac4818cf74966d60c7', 'hyoun8259@gmail.com', 'Pending'),
(137, '0xbc1ea64d5f52a14f33ec185ff4b489b360805bce', 'sanjihan0330@gmail.com', 'Pending'),
(138, '0x45eb2fae31a68838a403d120d1bd7afae7a16f94', 'c_sato_rb@yahoo.co.jp', 'Pending'),
(139, '0xb2dad9a644aae08f7ef1c855e4d2ded98ccb4c85', 'clanpee.sns@gmail.com', 'Pending'),
(140, '0x206504cec13d80008a9f3f75bc57ece78baf7860', 'chinka12g@gmail.com', 'Pending'),
(141, '0x220d969330131b1df955fce3b490cb1317b5519a', 'sco9626@naver.com', 'Pending'),
(142, '0x30d580d83245ab92387c75b6d18208a495d0e63d', 'oksong9626@hanmail.net', 'Pending'),
(143, '0xf160e81e82c253858f48886f586bab3762bc57af', 'nakao.rays@gmail.com', 'Pending'),
(144, '0xbec648eecb5daac5c2a7da76c8c95cf8018ab762', 'cha6588@naver.com', 'Pending'),
(145, '0xd1589cbf05f4872ebb1b8b99cbae29a5d1b05464', 'angou0802@gmail.com', 'Pending'),
(146, '0xf297b27b91dd939848a79af40b69bf9c9ed2678f', 'sanggon8009@gmail.com', 'Pending'),
(147, '0x4da88207364bf0c1b220c087d77b706ef0a877b8', 'buliliare@gmail.com', 'Pending'),
(148, '0x419575abfd690f27aa499ad8ea3162a772ee0696', 'priyankamodi76@gmail.com', 'Pending'),
(149, '0x247a891e1cc7bfe2a59a5f978ee43a943db9af42', '', 'Pending'),
(150, '0x2dd7b00abc13e4330afacff8429df53d7710d7dd', '', 'Pending'),
(151, '0xd65f4e667379896618bc849541fb37ccb55560cc', '', 'Pending'),
(152, '0x068abe765d9adbd7505bf44db210ae7a7e9bbcaa', '', 'Pending'),
(153, '0x1b3fee80f01d8b048d72596ccf10178f64c40fd8', '', 'Pending'),
(154, '0xa935503abf4ab7068c077ad1d98cb989e6bdb776', '', 'Pending'),
(155, '0x38e7a6dc722a63c6da374036c93747fcdba7e0da', '', 'Pending'),
(156, '0xc20340247d876a29b5a4d0ed19e353aa10e1478a', '', 'Pending'),
(157, '0xed249e47244ee0563420275fe0dccb8aa38ff3b5', '', 'Pending'),
(158, '0xb50267b1f756d4a600d29bd50fd66ac3b596b22e', '', 'Pending'),
(159, '0xb0d0d3349e2ef6c21c49bc2496d5e86dae6821c5', '', 'Pending'),
(160, '0x7a69c81d830a38cb50651d0d045d0a9a895d329c', '', 'Pending'),
(161, '0xb7b3899b4b15ff7f54ffdc7129d345b25a0fce30', '', 'Pending'),
(162, '0xf1a263d9f259c735929b96bbcb8ae762a6bbec0f', '', 'Pending'),
(163, '0x50747badc200aa8c432361e303e3a107c1b74ee1', '', 'Pending'),
(164, '0xa52848df48cdc91cd9ed40a3e72acc3dc2ce7c7e', '', 'Pending'),
(165, '0x4e4697452af98f3f518e6ec3e1f77165cc35079b', '', 'Pending'),
(166, '0x204b0ffdbf3419572c110d4a9dfb1e203c582f2f', '', 'Pending'),
(167, '0x91338ef98261c3b5dcd8d767bb8892515bcba9b8', '', 'Pending'),
(168, '0xd5653234f5f63d8cd6bcd94b4bf48f697047c33e', '', 'Pending'),
(169, '0x921aec0b8b87b608d283752dd85aca1e7a534912', '', 'Pending'),
(170, '0x5472f50c26cda3cd147bf9bf3189b6a5028234f4', '', 'Pending'),
(171, '0x555c472da13f5fef5b69a1411f9cae5d932b276d', '', 'Pending'),
(172, '0xd544017bba7b0bf219da92ed33f5d0e6ca15b72e', '', 'Pending'),
(173, '0xf40d9a9d7da2f011a0e7bd25aca7fb754243c2fb', '', 'Pending'),
(174, '0xc372f087e9871aba1d559a6974a28ab2b4b7368c', '', 'Pending'),
(175, '0x4a78a69782098a2328d10c0a1331ef4b14a1a931', '', 'Pending'),
(176, '0x93f7aafd88c3a0c0e989e05c0bde2ff0e305e55c', '', 'Pending'),
(177, '0x813dfeac265e30d2dd9a82780c2c73a552c55f82', '', 'Pending'),
(178, '0xd09f346685c21616c84a400da75488bf0c8d107a', '', 'Pending'),
(179, '0x17e62003da65e48dc8e205a9c65c8d6ce5b9474c', '', 'Pending'),
(180, '0x7ce13e773c381fb546f1dd01bb17e4c5bb94d6f5', '', 'Pending'),
(181, '0xd0382bfbc9a8d124b4bbbf320224bdd81d424a0a', '', 'Pending'),
(182, '0x79edef7a020dc802092ff117c88281080c2ae64c', '', 'Pending'),
(183, '0xd48c4a457d24a0033541aa23c70b312950bbd5da', '', 'Pending'),
(184, '0xa54f3b29ea3b301b4a1a835cfb04de108d508e6a', '', 'Pending'),
(185, '0x4911f3351cfc6179fe8c5c8033e118faf949d228', '', 'Pending'),
(186, '0x85417ee9e95742e400290b8c82157906c8058865', '', 'Pending'),
(187, '0xac65cdb538a7c162ae8843393660e0400632b9f9', '', 'Pending'),
(188, '0x8800626780c5e5002eb97ced5eb6d181fe972950', '', 'Pending'),
(189, '0x2f175f6ac223feef0edd6ce74477f9d7242d1509', '', 'Pending'),
(190, '0xd557753769ec8e9ef375b48c9037293b19c5c9de', '', 'Pending'),
(191, '0x5ca6d7b5dcbe8fd8c20eda52347514ce63ac47c3', '', 'Pending'),
(192, '0x25128d5574ed514cad91394bf08b3de96ede7575', '', 'Pending'),
(193, '0xe78ab7cb498be564a23a4caaa0bb1fca7c34bcfa', '', 'Pending'),
(194, '0x8f82d77c55e013b3aa5d4774841f302b3d92fae4', '', 'Pending'),
(195, '0x854ed01b4e83727aa85bec251b54278bdb4a60a1', '', 'Pending'),
(196, '0x43df2f0c928004afb1d29a36258f218796bfdbd2', '', 'Pending'),
(197, '0x8d294d053e341733556eaca86d82f33efa972084', '', 'Pending'),
(198, '0x140b96702f13ca6024a53b66cb05bf0aa96b0fb0', '', 'Pending'),
(199, '0x700af7b87fa248b17deb5071b41aa949b9197724', '', 'Pending'),
(200, '0x4293273bc0c3bcc5d1e0a20c2c8c01a1fc395587', '', 'Pending'),
(201, '0x697111812ffa20966c1ca2ffe1f71639e061f66d', '', 'Pending'),
(202, '0xac1f8a51076e192574957c1ee82a478e95015242', '', 'Pending'),
(203, '0xa77cef079806636796a5828894a0a1da6e90136f', '', 'Pending'),
(204, '0x7b21430befa31706e683ca8bdf9145d15eac31c8', '', 'Pending'),
(205, '0xe97fca87876607321796ca8b3516e1ff8eb75b12', '', 'Pending'),
(206, '0x9425385b51875d2aa650c0a8726525f690d25673', '', 'Pending'),
(207, '0x4436d6c2529c734baa961386d0debfd384e3678a', '', 'Pending'),
(208, '0x5b2b97a9166c124cabb10c16489eaf069b9fd561', '', 'Pending'),
(209, '0xa9f98d08f6dcdd1c64dc88777668dfc2778913e9', '', 'Pending'),
(210, '0x4b6380c8392ed9c4aaaef4d11040043489170c69', '', 'Pending'),
(211, '0x4f91d4dd3340b2e1064e4f0f38c0db1882588193', '', 'Pending'),
(212, '0xcdb2b8ac05b6a7d421950a84de1c1b9510755c30', '', 'Pending'),
(213, '0x1051f0bc8117b517fdecaf91063fb510300ed808', '', 'Pending'),
(214, '0xe37442ebd27def971159327b6d6e5c5adca3f11c', '', 'Pending'),
(215, '0xab2ea6a80948dff81e67773936643c91adae8542', '', 'Pending'),
(216, '0x57d3a1a45c28ba0d49c7804f5002644032e48fd4', '', 'Pending'),
(217, '0x8bed65421139e4e8a7c0eaca6076496078eb5991', '', 'Pending'),
(218, '0x4af967640453984f120052287bda32e906a12a6a', '', 'Pending'),
(219, '0x9566594167ea7336ba940f1345ed84f3ab683360', '', 'Pending'),
(220, '0xd4945c5aa2d0cda840bd141fb812d0eaadb8f126', '', 'Pending'),
(221, '0x6d516ad444f9c8d2fefd056f9fc9ed24ac641ec0', '', 'Pending'),
(222, '0xcf43d5c2caf1aefb956b5e56f0c499df71b25381', '', 'Pending'),
(223, '0xa2dbda6a1f1a9a7a068a3e1a3db165777d70e01a', '', 'Pending'),
(224, '0x5486a684d0a3208748981bbebd2b0acd5e9af9b9', '', 'Pending'),
(225, '0x0996d63f21f8ea927e89486057b71f2b48bc8517', '', 'Pending'),
(226, '0x8bba88d4dc9b0d4b4955ce14462923f22cb58d09', '', 'Pending'),
(227, '0x95230cbf06154e2e17d1d729eb8494787157b410', '', 'Pending'),
(228, '0x4c8febc310ec0d32fc2d82f97f2638771b738582', '', 'Pending'),
(229, '0x65ac6e738f1f2928efec64c0d432aced3e4c7502', '', 'Pending'),
(230, '0x28adbffe1e56d73a02bf5e77f7c9f71f63833980', '', 'Pending'),
(231, '0x92bc1905ba25abdc01e343f80ddbfa955ffb3b64', '', 'Pending'),
(232, '0x6737402dfe1e8ccbdfdda9d250df6c1f4698f9ea', '', 'Pending'),
(233, '0x99379b1d287b95ad44415fa6591a4b037c24b67c', '', 'Pending'),
(234, '0xc77bffc2d06dd3fe9b05c0ce3f02a2fd941810e3', '', 'Pending'),
(235, '0xa06198c1ea90ce402aec21aa51f572410438772e', '', 'Pending'),
(236, '0xcd7676739d5d85618c5a6e66fba4719d44330956', '', 'Pending'),
(237, '0x854d3faa4c28ffa4092621766f6e347342cce8e1', '', 'Pending'),
(238, '0x3dfdfb9a1d8e243aef859748124c5e7b5f158ad1', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tx_address` varchar(60) NOT NULL,
  `file` varchar(150) NOT NULL DEFAULT 'default.jpg',
  `gender` varchar(10) NOT NULL DEFAULT 'Male',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `verified` varchar(20) NOT NULL DEFAULT 'True',
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL DEFAULT 'Not Defined',
  `activation_code` varchar(50) NOT NULL,
  `tutorial_taken` varchar(10) NOT NULL DEFAULT 'No',
  `balance` varchar(10) NOT NULL DEFAULT '0',
  `kyc_approved` varchar(20) NOT NULL DEFAULT 'Pending',
  `g_auth_key` varchar(50) NOT NULL DEFAULT '123456987',
  `carbon_credits` float NOT NULL DEFAULT 100,
  `energy_credits` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tx_address`, `file`, `gender`, `date`, `verified`, `password`, `phone`, `activation_code`, `tutorial_taken`, `balance`, `kyc_approved`, `g_auth_key`, `carbon_credits`, `energy_credits`) VALUES
(218, 'arpita', 'arpita@coinwarp.io', '0x69BdFEF9BCe095Ea57369A1E804AD386371AC1E0', 'default.jpg', 'Male', '2021-06-10 14:41:08', 'Yes', 'pass', 'Not Defined', '6017f8efeb22d', 'Yes', '0', 'Approved', '123456987', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `withdraw_wallet_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator_super_user`
--
ALTER TABLE `administrator_super_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_token`
--
ALTER TABLE `buy_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carbon_credits`
--
ALTER TABLE `carbon_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `energy_credits`
--
ALTER TABLE `energy_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrc_price`
--
ALTER TABLE `entrc_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_requests`
--
ALTER TABLE `sell_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_carbon_credits_requests`
--
ALTER TABLE `send_carbon_credits_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_energy_credits_requests`
--
ALTER TABLE `send_energy_credits_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tx_addresses`
--
ALTER TABLE `tx_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator_super_user`
--
ALTER TABLE `administrator_super_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `buy_token`
--
ALTER TABLE `buy_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `carbon_credits`
--
ALTER TABLE `carbon_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `energy_credits`
--
ALTER TABLE `energy_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `entrc_price`
--
ALTER TABLE `entrc_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=686;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sell_requests`
--
ALTER TABLE `sell_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `send_carbon_credits_requests`
--
ALTER TABLE `send_carbon_credits_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `send_energy_credits_requests`
--
ALTER TABLE `send_energy_credits_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tx_addresses`
--
ALTER TABLE `tx_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
