-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2021 at 04:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_back`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjust_balance_log`
--

CREATE TABLE `adjust_balance_log` (
  `id` int(11) NOT NULL,
  `previous_balance` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `creditcom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adjust_balance_log`
--

INSERT INTO `adjust_balance_log` (`id`, `previous_balance`, `amount`, `member_id`, `type`, `actor_id`, `datetime`, `creditcom`) VALUES
(1, '0.00', '300.00', 10038, 'in', 1, '2021-01-11 15:23:36', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `bank_botstat`
--

CREATE TABLE `bank_botstat` (
  `bot_id` int(11) NOT NULL,
  `bot_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bot_stat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bot_add` int(11) NOT NULL,
  `bot_comt` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_botstat`
--

INSERT INTO `bank_botstat` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`) VALUES
(1, 'kbank', '1', 0, 'KBANK'),
(2, 'scb', '1', 0, 'SCB'),
(3, 'bbl', '0', 0, 'BBL'),
(4, 'bay', '0', 0, 'BAY'),
(5, 'ktb', '0', 0, 'KTB');

-- --------------------------------------------------------

--
-- Table structure for table `bank_logcheck`
--

CREATE TABLE `bank_logcheck` (
  `id` int(11) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `dateedit` varchar(30) NOT NULL,
  `useredit_name` varchar(10) NOT NULL,
  `useredit_id` varchar(10) NOT NULL,
  `useredit_user` varchar(20) NOT NULL,
  `userip` varchar(20) NOT NULL,
  `user_bankid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_bank_account`
--

CREATE TABLE `tb_admin_bank_account` (
  `id` int(11) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_company` varchar(255) NOT NULL,
  `re_check_money_link` varchar(255) DEFAULT NULL,
  `last_checked` datetime DEFAULT NULL,
  `category` varchar(255) NOT NULL COMMENT 'category = withdraw,deposit',
  `deposit_in_db` int(11) DEFAULT NULL,
  `withdraw_in_db` int(11) DEFAULT NULL,
  `deposit_in_bank` int(11) DEFAULT NULL,
  `withdraw_in_bank` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0: disable , 1: enable',
  `primary_bank` int(11) NOT NULL COMMENT '1: กำหนดเป็น Bank หลัก',
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `account_code` varchar(255) NOT NULL COMMENT 'รหัส บางอย่าง',
  `access_token` text DEFAULT NULL,
  `auto_bot` int(1) DEFAULT NULL,
  `check_mobile` int(2) NOT NULL DEFAULT 0 COMMENT 'เปิด ปิด App มือถือ',
  `check_curl` int(2) NOT NULL DEFAULT 0 COMMENT 'เปิด ปิด Curl Web',
  `check_sms` int(2) NOT NULL DEFAULT 0 COMMENT 'เปิด ปิด SMS',
  `auto_deposit` int(2) NOT NULL DEFAULT 0 COMMENT 'ปิด ปิด เติมเงิน Auto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin_bank_account`
--

INSERT INTO `tb_admin_bank_account` (`id`, `account_number`, `account_name`, `bank_company`, `re_check_money_link`, `last_checked`, `category`, `deposit_in_db`, `withdraw_in_db`, `deposit_in_bank`, `withdraw_in_bank`, `status`, `primary_bank`, `user_name`, `password`, `account_code`, `access_token`, `auto_bot`, `check_mobile`, `check_curl`, `check_sms`, `auto_deposit`) VALUES
(1, '2222222222', 'test', 'KBANK', '', NULL, 'deposit', NULL, NULL, NULL, NULL, 1, 1, '', '', '', NULL, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_bank_withdraw`
--

CREATE TABLE `tb_admin_bank_withdraw` (
  `id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_credit`
--

CREATE TABLE `tb_admin_credit` (
  `id` int(11) NOT NULL,
  `start_credit_fix` decimal(11,2) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_turn_edit`
--

CREATE TABLE `tb_admin_turn_edit` (
  `id` int(11) NOT NULL,
  `before_turn` int(11) NOT NULL,
  `after_turn` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin_turn_edit`
--

INSERT INTO `tb_admin_turn_edit` (`id`, `before_turn`, `after_turn`, `member_id`, `admin_id`, `update_time`, `comment`) VALUES
(1, 2016, 0, 10038, 1, '2021-01-11 15:23:21', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_auto_notify_deposit`
--

CREATE TABLE `tb_auto_notify_deposit` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank_total_balance`
--

CREATE TABLE `tb_bank_total_balance` (
  `id` int(11) NOT NULL,
  `bank_acc_comp` varchar(255) NOT NULL,
  `bank_type` varchar(255) NOT NULL COMMENT 'deposit,withdraw',
  `log_date` datetime NOT NULL,
  `total_balance` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank_transaction`
--

CREATE TABLE `tb_bank_transaction` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `account_no` varchar(15) NOT NULL,
  `bank_name` varchar(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `tranferer` varchar(200) NOT NULL,
  `datein` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank_transfers_log`
--

CREATE TABLE `tb_bank_transfers_log` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'admin id',
  `from_pid` int(11) NOT NULL COMMENT 'จากเอกสารไหน',
  `from_bank` varchar(255) NOT NULL COMMENT 'Bank Account'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bay_transection`
--

CREATE TABLE `tb_bay_transection` (
  `id` int(5) NOT NULL,
  `transection_no` varchar(50) DEFAULT NULL,
  `trans_in_datetime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank_id` varchar(10) DEFAULT NULL,
  `bank_number` varchar(15) DEFAULT NULL,
  `retrive_datetime` datetime DEFAULT NULL,
  `member_id` int(5) DEFAULT 0,
  `topup_status` int(5) DEFAULT 0,
  `acc_id` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bot_auto`
--

CREATE TABLE `tb_bot_auto` (
  `bot_id` int(11) NOT NULL,
  `bot_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bot_stat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bot_add` int(11) NOT NULL,
  `bot_comt` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bot_description` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bot_auto`
--

INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES
(1, 'kbank', '1', 0, 'kbank', 'Bot เติมเงิน Bank KBANK'),
(2, 'oth', '1', 0, 'oth', 'Bot เติมเงิน Bank SCB'),
(3, 'bonus', '1', 0, 'bonus', 'Bot เติมเงิน BONUS'),
(4, 'smskbank', '1', 0, 'smskbank', 'Bot เติมเงิน SMS KBANK\r\n'),
(5, 'smsoth', '1', 0, 'smsoth', 'Bot เติมเงิน SMS SCB'),
(6, 'scbtoscb', '0', 0, 'smsscbotscb', 'Bot เติมเงิน SMS SCB TO SCB'),
(7, 'sms', '1', 0, 'sms', 'Ture wallet'),
(8, 'checkbank', '0', 0, 'checkbank', 'Check Clear Bank'),
(9, 'scbtoscbs', '0', 0, 'scbtoscbs', 'Bot เติมเงิน SCB TO SCB'),
(10, 'bay', '0', 0, 'bay', 'Bot เติมเงิน Bank bay'),
(11, 'checkbankkbank', '0', 0, 'checkbankkbank', 'Check Clear kBank'),
(12, 'checkbankscb', '0', 0, 'checkbankscb', 'Check Clear SCB'),
(13, 'checksmskbank', '0', 0, 'checksmskbank', 'Check Clear sms kBank'),
(14, 'checksmsscb', '0', 0, 'checksmsscb', 'Check Clear sms SCB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bot_port`
--

CREATE TABLE `tb_bot_port` (
  `id` int(11) NOT NULL,
  `port_no` int(11) NOT NULL,
  `bot_code_user` varchar(255) DEFAULT NULL,
  `used_by` varchar(255) DEFAULT NULL,
  `used_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bot_user`
--

CREATE TABLE `tb_bot_user` (
  `id` int(11) NOT NULL,
  `bot_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_credit_free_list`
--

CREATE TABLE `tb_credit_free_list` (
  `id` int(11) NOT NULL,
  `credit_free_name` varchar(255) NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `img` varchar(255) NOT NULL,
  `pre_balance` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'จำนวนยอดก่อนรับกิจกรรม',
  `bonus_amount` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'จำนวนโบนัสที่รับ',
  `withdraw_amount` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'ยอดถอนหลังรับโบนัส',
  `links_amount` int(11) NOT NULL DEFAULT 0 COMMENT 'จำนวนลิ้งที่ส่งจากหน้าบ้าน',
  `turn_amount` decimal(11,0) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_credit_free_list`
--

INSERT INTO `tb_credit_free_list` (`id`, `credit_free_name`, `amount`, `description`, `status`, `img`, `pre_balance`, `bonus_amount`, `withdraw_amount`, `links_amount`, `turn_amount`, `create_date`) VALUES
(1, 'แชร์ Facebook รับฟรี 20 Credit', '20', 'แชร์ Facebook รับฟรี 20 Credit', 1, 'https://miro.medium.com/max/1400/1*E9gYGwScJ1fE6SNR5VNbLg.jpeg', '0.00', '0.00', '0.00', 2, '0', '2021-07-10 15:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_deposit_bank_account`
--

CREATE TABLE `tb_deposit_bank_account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_fix_agent_account`
--

CREATE TABLE `tb_fix_agent_account` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_frontend_config`
--

CREATE TABLE `tb_frontend_config` (
  `id` int(11) NOT NULL,
  `url_wallet` varchar(255) NOT NULL,
  `max_withdraw_per_day` int(11) NOT NULL COMMENT 'จำนวนการถอน ต่อ 1 วัน',
  `status` int(11) NOT NULL COMMENT '0: ปิดไม่ให้ถอน, 1: ถอนได้ตามเงื่อนไข',
  `min_withdraw_amount` decimal(11,0) NOT NULL COMMENT 'ถอนขั้นต่ำต่อครั้ง',
  `max_withdraw_amount` decimal(11,0) NOT NULL COMMENT 'ถอนได้มากสุดต่อครั้ง',
  `max_withdraw_amount_per_day` decimal(11,0) NOT NULL COMMENT 'ถอนได้มากสุดต่อวัน',
  `is_promotion_max_withdraw` decimal(11,0) NOT NULL COMMENT ' ถ้าเป็น 0 หมายถึงถอนได้ไม่จำกัด หรือ = ค่าสูงสุง',
  `close_login` int(11) NOT NULL COMMENT '0: ปิด (Show text), 1:เปิดการใช้งานอยู่',
  `close_register` int(11) NOT NULL COMMENT '0: ปิด (Show text), 1:เปิดการใช้งานอยู่',
  `show_topic` int(11) NOT NULL COMMENT '0: ปิด text, 1: Show Text',
  `text_login` varchar(255) NOT NULL,
  `text_register` varchar(255) NOT NULL,
  `text_topic` varchar(255) NOT NULL,
  `front_title` varchar(255) NOT NULL,
  `front_description` varchar(255) NOT NULL,
  `front_keywords` varchar(255) NOT NULL,
  `min_deposit_aff` decimal(11,0) NOT NULL,
  `bonus_per_aff` decimal(11,0) NOT NULL,
  `bonus_percen_aff` decimal(11,2) NOT NULL COMMENT 'จะได้รับ กี่ % ของยอดฝากครั้งแรก',
  `max_deposit_aff` int(11) NOT NULL COMMENT 'ยอดฝากสูงสุดที่รับได้',
  `turn_amount_aff` decimal(11,0) NOT NULL,
  `min_deposit_aff_2` int(11) NOT NULL,
  `bonus_percen_aff_2` decimal(11,2) NOT NULL COMMENT '	จะได้รับ กี่ % ของยอดฝากครั้งแรก	',
  `max_deposit_aff_2` int(11) NOT NULL,
  `turn_amount_aff_2` int(11) NOT NULL,
  `condition_aff_1` int(11) NOT NULL COMMENT '0: Fix ยอด, 1: คิดตาม %',
  `condition_aff_2` int(11) NOT NULL COMMENT '0: Fix ยอด, 1: คิดตาม %',
  `bonus_per_aff_2` int(11) NOT NULL,
  `affiliate_status` int(11) NOT NULL COMMENT '0: ปิด , 1: เปิด',
  `aff_promotion_np` int(11) NOT NULL COMMENT '1:โปรได้ 50 ทั้งคนสมัครต่อ (ชั้นเดียว) ,  2: มีสองชั้น',
  `affiliate_max_per_people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_frontend_config`
--

INSERT INTO `tb_frontend_config` (`id`, `url_wallet`, `max_withdraw_per_day`, `status`, `min_withdraw_amount`, `max_withdraw_amount`, `max_withdraw_amount_per_day`, `is_promotion_max_withdraw`, `close_login`, `close_register`, `show_topic`, `text_login`, `text_register`, `text_topic`, `front_title`, `front_description`, `front_keywords`, `min_deposit_aff`, `bonus_per_aff`, `bonus_percen_aff`, `max_deposit_aff`, `turn_amount_aff`, `min_deposit_aff_2`, `bonus_percen_aff_2`, `max_deposit_aff_2`, `turn_amount_aff_2`, `condition_aff_1`, `condition_aff_2`, `bonus_per_aff_2`, `affiliate_status`, `aff_promotion_np`, `affiliate_max_per_people`) VALUES
(1, 'https://wallet.lottobetsvip.com', 5, 1, '300', '100000', '300000', '0', 1, 1, 1, 'ระงับใช้การเข้าสู่ระบบ ชั่วคราว', 'ปิดปรุบปรังระบบชั่วคราว จะเปิดให้สมัครอีกรอบ', 'แจ้งเตือน กรุณางดฝากเงินผ่านธนาคารไทยพาณิชย์ช่วงเวลา 22:30 - 00:00 ของทุกวัน', 'lottobetsvip.com ฝากเร็ว จ่ายจริง ปลอดภัย 100%', 'lottobetsvip.com ฝากเร็ว จ่ายจริง ปลอดภัย 100%', 'lottobetvip', '300', '50', '0.00', 500, '6', 0, '0.00', 500, 6, 0, 0, 10, 0, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_game_setting`
--

CREATE TABLE `tb_game_setting` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_game_setting`
--

INSERT INTO `tb_game_setting` (`id`, `game_name`, `status`, `update_time`) VALUES
(1, 'joker', 0, '2021-07-16 21:27:22'),
(2, 'imi', 0, '2021-07-16 21:27:22'),
(3, 'ufabet', 1, '2021-07-16 21:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL,
  `user_admin` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_deprive`
--

CREATE TABLE `tb_lotto_deprive` (
  `id` int(11) UNSIGNED NOT NULL,
  `lotto_type` int(11) NOT NULL,
  `lotto_reward_type` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `reward` decimal(11,2) DEFAULT NULL,
  `lotto_group` date DEFAULT NULL,
  `status` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_deprive`
--

INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES
(1, 1, 5, '05', '2.00', '2021-07-16', 1),
(2, 1, 5, '09', '2.00', '2021-07-16', 1),
(3, 1, 5, '12', '2.00', '2021-07-16', 1),
(4, 1, 5, '14', '2.00', '2021-07-16', 1),
(5, 1, 5, '15', '2.00', '2021-07-16', 1),
(6, 1, 5, '17', '2.00', '2021-07-16', 1),
(7, 1, 5, '19', '2.00', '2021-07-16', 1),
(8, 1, 5, '24', '2.00', '2021-07-16', 1),
(9, 1, 5, '25', '2.00', '2021-07-16', 1),
(10, 1, 5, '26', '2.00', '2021-07-16', 1),
(11, 1, 5, '27', '2.00', '2021-07-16', 1),
(12, 1, 5, '28', '2.00', '2021-07-16', 1),
(13, 1, 5, '29', '2.00', '2021-07-16', 1),
(14, 1, 5, '31', '2.00', '2021-07-16', 1),
(15, 1, 5, '38', '2.00', '2021-07-16', 1),
(16, 1, 5, '39', '2.00', '2021-07-16', 1),
(17, 1, 5, '41', '2.00', '2021-07-16', 1),
(18, 1, 5, '42', '2.00', '2021-07-16', 1),
(19, 1, 5, '47', '2.00', '2021-07-16', 1),
(20, 1, 5, '49', '2.00', '2021-07-16', 1),
(21, 1, 6, '05', '2.00', '2021-07-16', 1),
(22, 1, 6, '07', '2.00', '2021-07-16', 1),
(23, 1, 6, '09', '2.00', '2021-07-16', 1),
(24, 1, 6, '12', '2.00', '2021-07-16', 1),
(25, 1, 6, '13', '2.00', '2021-07-16', 1),
(26, 1, 6, '14', '2.00', '2021-07-16', 1),
(27, 1, 6, '15', '2.00', '2021-07-16', 1),
(28, 1, 6, '17', '2.00', '2021-07-16', 1),
(29, 1, 6, '19', '2.00', '2021-07-16', 1),
(30, 1, 6, '20', '2.00', '2021-07-16', 1),
(31, 1, 6, '21', '2.00', '2021-07-16', 1),
(32, 1, 6, '22', '2.00', '2021-07-16', 1),
(33, 1, 6, '23', '2.00', '2021-07-16', 1),
(34, 1, 6, '24', '2.00', '2021-07-16', 1),
(35, 1, 6, '25', '2.00', '2021-07-16', 1),
(36, 1, 6, '26', '2.00', '2021-07-16', 1),
(37, 1, 6, '27', '2.00', '2021-07-16', 1),
(38, 1, 6, '28', '2.00', '2021-07-16', 1),
(39, 1, 6, '29', '2.00', '2021-07-16', 1),
(40, 1, 6, '31', '2.00', '2021-07-16', 1),
(41, 1, 1, '005', '2.50', '2021-07-16', 1),
(42, 1, 1, '011', '2.50', '2021-07-16', 1),
(43, 1, 1, '013', '2.50', '2021-07-16', 1),
(44, 1, 1, '038', '2.50', '2021-07-16', 1),
(45, 1, 1, '050', '2.50', '2021-07-16', 1),
(46, 1, 1, '051', '2.50', '2021-07-16', 1),
(47, 1, 1, '059', '2.50', '2021-07-16', 1),
(48, 1, 1, '079', '2.50', '2021-07-16', 1),
(49, 1, 1, '094', '2.50', '2021-07-16', 1),
(50, 1, 1, '095', '2.50', '2021-07-16', 1),
(51, 1, 1, '097', '2.50', '2021-07-16', 1),
(52, 1, 1, '101', '2.50', '2021-07-16', 1),
(53, 1, 1, '110', '2.50', '2021-07-16', 1),
(54, 1, 1, '113', '2.50', '2021-07-16', 1),
(55, 1, 1, '115', '2.50', '2021-07-16', 1),
(56, 1, 1, '119', '2.50', '2021-07-16', 1),
(57, 1, 1, '131', '2.50', '2021-07-16', 1),
(58, 1, 1, '147', '2.50', '2021-07-16', 1),
(59, 1, 1, '150', '2.50', '2021-07-16', 1),
(60, 1, 1, '151', '2.50', '2021-07-16', 1),
(61, 1, 2, '013', '2.50', '2021-07-16', 1),
(62, 1, 2, '015', '2.50', '2021-07-16', 1),
(63, 1, 2, '031', '2.50', '2021-07-16', 1),
(64, 1, 2, '034', '2.50', '2021-07-16', 1),
(65, 1, 2, '038', '2.50', '2021-07-16', 1),
(66, 1, 2, '039', '2.50', '2021-07-16', 1),
(67, 1, 2, '043', '2.50', '2021-07-16', 1),
(68, 1, 2, '045', '2.50', '2021-07-16', 1),
(69, 1, 2, '051', '2.50', '2021-07-16', 1),
(70, 1, 2, '054', '2.50', '2021-07-16', 1),
(71, 1, 2, '057', '2.50', '2021-07-16', 1),
(72, 1, 2, '058', '2.50', '2021-07-16', 1),
(73, 1, 2, '059', '2.50', '2021-07-16', 1),
(74, 1, 2, '075', '2.50', '2021-07-16', 1),
(75, 1, 2, '079', '2.50', '2021-07-16', 1),
(76, 1, 2, '083', '2.50', '2021-07-16', 1),
(77, 1, 2, '085', '2.50', '2021-07-16', 1),
(78, 1, 2, '093', '2.50', '2021-07-16', 1),
(79, 1, 2, '095', '2.50', '2021-07-16', 1),
(80, 1, 2, '097', '2.50', '2021-07-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_member_log`
--

CREATE TABLE `tb_lotto_member_log` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `lotto_reward_type` int(11) NOT NULL,
  `lotto_type` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `lotto_group` date NOT NULL,
  `reward` decimal(11,2) NOT NULL,
  `date_time_add` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_member_log`
--

INSERT INTO `tb_lotto_member_log` (`id`, `member_id`, `lotto_reward_type`, `lotto_type`, `number`, `amount`, `lotto_group`, `reward`, `date_time_add`) VALUES
(5, 1, 6, 1, 25, 1, '2021-08-01', '0.00', '2021-07-27 19:42:16'),
(6, 1, 7, 1, 1, 1, '2021-08-01', '0.00', '2021-07-27 19:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_result`
--

CREATE TABLE `tb_lotto_result` (
  `id` int(11) NOT NULL,
  `special` varchar(11) NOT NULL,
  `four_tong` varchar(5) NOT NULL,
  `three_tong` varchar(5) NOT NULL,
  `three_front` varchar(11) NOT NULL,
  `three_back` varchar(11) NOT NULL,
  `two_down` varchar(5) NOT NULL,
  `lotto_type` int(11) NOT NULL COMMENT 'ประเภทหวย',
  `date_time_closed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_result`
--

INSERT INTO `tb_lotto_result` (`id`, `special`, `four_tong`, `three_tong`, `three_front`, `three_back`, `two_down`, `lotto_type`, `date_time_closed`) VALUES
(1, '655456', '5564', '655', '654,421', '412,122', '28', 1, '2021-07-01 15:20:00'),
(2, '556725', '5567', '725', '174,058', '927,233', '70', 1, '2021-07-16 14:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_reward_config`
--

CREATE TABLE `tb_lotto_reward_config` (
  `id` int(11) NOT NULL,
  `lotto_type` int(11) NOT NULL,
  `lotto_reward_type` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `reward` decimal(11,2) NOT NULL,
  `status` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_reward_config`
--

INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES
(1, 1, 1, 1, 500, '900.00', 1),
(2, 1, 1, 501, 999, '800.00', 1),
(3, 1, 2, 1, 999, '150.00', 1),
(4, 1, 2, 1000, 9999, '100.00', 1),
(5, 1, 4, 1, 999, '450.00', 1),
(6, 1, 4, 1000, 9999, '400.00', 1),
(7, 1, 5, 1, 999, '90.00', 1),
(8, 1, 5, 1000, 9999, '45.00', 1),
(9, 1, 6, 1, 999, '90.00', 1),
(10, 1, 6, 1000, 9999, '45.00', 1),
(11, 1, 7, 1, 999, '3.20', 1),
(12, 1, 8, 1, 999, '4.20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_reward_type`
--

CREATE TABLE `tb_lotto_reward_type` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_reward_type`
--

INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES
(1, '3tong', '3 ตัวบน'),
(2, '3tod', '3 ตัวโต๊ด'),
(3, '3front', '3 ตัวหน้า'),
(4, '3down', '3 ตัวล่าง'),
(5, '2up', '2 ตัวบน'),
(6, '2down', '2 ตัวล่าง'),
(7, 'runup', 'วิ่งบน'),
(8, 'rundown', 'วิ่งล่าง');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_set_number`
--

CREATE TABLE `tb_lotto_set_number` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `lotto_type` int(11) NOT NULL,
  `date_time_add` datetime DEFAULT NULL,
  `status` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_set_number`
--

INSERT INTO `tb_lotto_set_number` (`id`, `name`, `member_id`, `lotto_type`, `date_time_add`, `status`) VALUES
(1, 'test', 1, 1, '2021-07-27 19:24:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_set_numberlist`
--

CREATE TABLE `tb_lotto_set_numberlist` (
  `id` int(11) UNSIGNED NOT NULL,
  `set_id` int(11) DEFAULT NULL,
  `lotto_reward_type` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_set_numberlist`
--

INSERT INTO `tb_lotto_set_numberlist` (`id`, `set_id`, `lotto_reward_type`, `number`) VALUES
(1, 1, 7, '1'),
(2, 1, 7, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lotto_type`
--

CREATE TABLE `tb_lotto_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lotto_type`
--

INSERT INTO `tb_lotto_type` (`id`, `name`, `date_created`, `admin_id`) VALUES
(1, 'หวยรัฐบาล', '2021-06-21 20:56:40', 1),
(2, 'หวยลาว', '2021-06-21 20:56:40', 1),
(3, 'หวยออมสิน', '2021-06-21 10:47:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_manual_transection`
--

CREATE TABLE `tb_manual_transection` (
  `id` int(5) NOT NULL,
  `transection_no` varchar(100) DEFAULT NULL,
  `trans_in_datetime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT '000',
  `bank_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `retrive_datetime` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT 0,
  `topup_status` int(5) DEFAULT 0,
  `trans_in_bank` varchar(5) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  `actor_id` int(11) DEFAULT 0,
  `acc_id` int(5) DEFAULT NULL,
  `staffadd_id` varchar(10) NOT NULL,
  `staffadd_date` varchar(30) NOT NULL,
  `freeze` varchar(5) NOT NULL,
  `comment` text NOT NULL,
  `attach` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_manual_transection_dellog`
--

CREATE TABLE `tb_manual_transection_dellog` (
  `id` int(5) NOT NULL,
  `transection_no` varchar(100) DEFAULT NULL,
  `trans_in_datetime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT '000',
  `bank_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `retrive_datetime` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT 0,
  `topup_status` int(5) DEFAULT 0,
  `trans_in_bank` varchar(5) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  `actor_id` int(11) DEFAULT 0,
  `acc_id` int(5) DEFAULT NULL,
  `staffadd_id` varchar(10) NOT NULL,
  `staffadd_date` varchar(30) NOT NULL,
  `freeze` varchar(5) NOT NULL,
  `comment` text NOT NULL,
  `attach` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_manual_transection_dup`
--

CREATE TABLE `tb_manual_transection_dup` (
  `id` int(5) NOT NULL,
  `transection_no` varchar(100) DEFAULT NULL,
  `trans_in_datetime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT '000',
  `bank_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `retrive_datetime` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT 0,
  `topup_status` int(5) DEFAULT 0,
  `trans_in_bank` varchar(5) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  `actor_id` int(11) DEFAULT 0,
  `acc_id` int(5) DEFAULT NULL,
  `staffadd_id` varchar(10) NOT NULL,
  `staffadd_date` varchar(30) NOT NULL,
  `freeze` varchar(5) NOT NULL,
  `comment` text NOT NULL,
  `attach` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_max_wallet_aff`
--

CREATE TABLE `tb_max_wallet_aff` (
  `id` int(11) NOT NULL,
  `unused_wallet` int(11) NOT NULL COMMENT 'wallet ที่เหลือ',
  `used_wallet` int(11) NOT NULL COMMENT 'wallet ที่ใช้ไปแล้ว (จองไปแล้ว)',
  `max_wallet` int(11) NOT NULL COMMENT 'ค่าสูงสุด',
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 'admin id',
  `max_aff_per_member` int(11) NOT NULL COMMENT 'จำนวนที่สามารถรับได้จากหัว affiliate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_max_wallet_aff`
--

INSERT INTO `tb_max_wallet_aff` (`id`, `unused_wallet`, `used_wallet`, `max_wallet`, `create_date`, `create_by`, `max_aff_per_member`) VALUES
(1, 0, 0, 4000000, '2020-07-10 01:57:19', 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member_auto_problem`
--

CREATE TABLE `tb_member_auto_problem` (
  `id` int(11) NOT NULL,
  `amount` int(22) NOT NULL,
  `datein` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `bank_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bank_payment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_member_auto_problem`
--

INSERT INTO `tb_member_auto_problem` (`id`, `amount`, `datein`, `status`, `member_id`, `bank`, `bank_number`, `username`, `bank_payment_id`, `comment`) VALUES
(1, 1, '2021-07-13 17:42:00', 3, 0, 'KBANK', '111111', '1', 2, 't'),
(2, 1, '2021-07-13 17:43:00', 3, 0, 'KBANK', '111111', '1', 3, 'a'),
(3, 1, '2021-07-13 17:45:00', 0, 0, 'KBANK', '111111', '1', 4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_password_pin`
--

CREATE TABLE `tb_password_pin` (
  `id` int(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_auto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_password_pin`
--

INSERT INTO `tb_password_pin` (`id`, `password`, `password_auto`) VALUES
(1, '088880', '099990');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion`
--

CREATE TABLE `tb_promotion` (
  `id` int(11) NOT NULL,
  `promotion_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bonus_percen` int(11) NOT NULL,
  `multipy_turn` int(11) NOT NULL DEFAULT 1,
  `min_credit` int(11) NOT NULL COMMENT 'จำนวนขั้นต่ำที่สามารถรับได้',
  `max_credit` int(11) NOT NULL COMMENT 'Credit สูงสุดที่รับได้',
  `level_player` int(22) NOT NULL DEFAULT 0 COMMENT '0: ปกติ,  1:VIP,  2:Premuim',
  `promotion_type` int(22) NOT NULL COMMENT '0: normal, 1 : one time, 2 : once a day',
  `promotion_des` varchar(255) NOT NULL,
  `banner_url` varchar(255) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `open_mon` int(11) NOT NULL DEFAULT 0,
  `open_tue` int(11) NOT NULL DEFAULT 0,
  `open_wed` int(11) NOT NULL DEFAULT 0,
  `open_thu` int(11) NOT NULL DEFAULT 0,
  `open_fri` int(11) NOT NULL DEFAULT 0,
  `open_sat` int(11) NOT NULL DEFAULT 0,
  `open_sun` int(11) NOT NULL DEFAULT 0,
  `is_time` int(11) NOT NULL DEFAULT 0 COMMENT '0: ไม่ใช้ช่วงเวลา,1:เปิดใช้งาน',
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `cost_fixed` int(11) NOT NULL DEFAULT 0 COMMENT 'fix ยอดไหม ถ้า fix ไม่สามารถเพิ่มเงื่อนไขพิเศษได้',
  `status` int(11) NOT NULL DEFAULT 0,
  `condition_status` int(11) DEFAULT 0 COMMENT '0: ปิดใช้เงื่อนไขพิเศษ, 1: เปิดใช้เงื่อนไขพิเศษ',
  `duplicate_other` int(2) NOT NULL DEFAULT 0 COMMENT '0: ปิด, 1: เปิดใช้งาน',
  `update_date` datetime DEFAULT NULL,
  `pre_balance` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT '	จำนวนยอดก่อนรับกิจกรรม',
  `bonus_amount` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'จำนวนโบนัสที่รับ',
  `withdraw_amount` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'ยอดถอนหลังรับโบนัส'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promotion`
--

INSERT INTO `tb_promotion` (`id`, `promotion_name`, `bonus_percen`, `multipy_turn`, `min_credit`, `max_credit`, `level_player`, `promotion_type`, `promotion_des`, `banner_url`, `date_start`, `date_end`, `open_mon`, `open_tue`, `open_wed`, `open_thu`, `open_fri`, `open_sat`, `open_sun`, `is_time`, `time_start`, `time_end`, `cost_fixed`, `status`, `condition_status`, `duplicate_other`, `update_date`, `pre_balance`, `bonus_amount`, `withdraw_amount`) VALUES
(1, 'โปรสมัครสมาชิกใหม่', 60, 6, 100, 500, 0, 1, 'ฝากยอดที่กำหนด รับเพิ่ม ตามเงื่อนไขดังรูป', 'https://pgslot678.com/_nuxt/img/promotion1.443cacf.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 1, 0, 0, '2020-11-13 00:09:55', '0.00', '0.00', '0.00'),
(2, 'โปรทุกยอดฝาก', 12, 6, 300, 500, 0, 0, 'ฝากยอดที่กำหนด รับเพิ่ม ตามเงื่อนไขดังรูป', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 1, 0, 0, '2020-11-26 00:37:04', '0.00', '0.00', '0.00'),
(3, 'โปรฝากหลังไม่ได้ฝาก 7 วัน', 30, 6, 300, 500, 0, 0, 'กลับมาฝากหลังฝากครบ 7 วันรับโบนัสพิเศษ', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 0, 0, 0, '2020-11-22 19:41:35', '0.00', '0.00', '0.00'),
(4, 'โปรโมชั่นฝากประจำ มีขั้นต่ำ', 30, 10, 300, 3000, 0, 0, 'โปรโมชั่นฝากประจำ มีขั้นต่ำ', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 1, 0, 0, '2020-11-26 01:08:04', '0.00', '0.00', '0.00'),
(5, 'โปรโมชั่นฝากประจำ ไม่มีขั้นต่ำ', 30, 10, 0, 3000, 0, 0, 'โปรโมชั่นฝากประจำ ไม่มีขั้นต่ำ', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 0, 0, 0, '2020-11-26 01:08:10', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion_condition`
--

CREATE TABLE `tb_promotion_condition` (
  `id` int(11) NOT NULL,
  `min_amount` int(11) NOT NULL,
  `max_amount` int(11) NOT NULL,
  `multiply_turn` int(11) NOT NULL,
  `bonus_percen` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promotion_condition`
--

INSERT INTO `tb_promotion_condition` (`id`, `min_amount`, `max_amount`, `multiply_turn`, `bonus_percen`, `promotion_id`) VALUES
(1, 100, 599, 6, 10, 2),
(2, 600, 1099, 6, 15, 2),
(3, 1100, 2000, 6, 20, 2),
(4, 100, 399, 6, 30, 1),
(5, 400, 999, 6, 40, 1),
(6, 1000, 2000, 6, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_promotion_condition_ever`
--

CREATE TABLE `tb_promotion_condition_ever` (
  `id` int(11) NOT NULL,
  `three_days` decimal(11,2) NOT NULL COMMENT 'ครบ 3 วันได้เท่าไร',
  `seven_days` decimal(11,2) NOT NULL COMMENT 'ครบ 7 วันได้เท่าไร',
  `ten_days` decimal(11,2) NOT NULL COMMENT 'ครบ 10 วันได้เท่าไร',
  `fifteen_days` decimal(11,2) NOT NULL COMMENT 'ครบ 15 วันได้เท่าไร',
  `thirty_days` decimal(11,2) NOT NULL COMMENT 'ครบ 30 วันได้เท่าไร',
  `promotion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_promotion_condition_ever`
--

INSERT INTO `tb_promotion_condition_ever` (`id`, `three_days`, `seven_days`, `ten_days`, `fifteen_days`, `thirty_days`, `promotion_id`) VALUES
(1, '200.00', '500.00', '1000.00', '2000.00', '3000.00', 4),
(2, '200.00', '500.00', '1000.00', '2000.00', '3000.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rank_list`
--

CREATE TABLE `tb_rank_list` (
  `id` int(11) NOT NULL,
  `rank_name` varchar(155) NOT NULL,
  `min_deposit` int(11) NOT NULL,
  `max_deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rank_list`
--

INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES
(1, 'Herald', 1, 100000),
(2, 'Guadian', 100001, 500000),
(3, 'Crusader', 500001, 1000000),
(4, 'Archon', 1000001, 2000000),
(5, 'Legend', 2000001, 3000000),
(6, 'Ancient', 3000001, 4000000),
(7, 'Divine', 4000001, 5000000),
(8, 'Immortal', 5000000, 999999999);

-- --------------------------------------------------------

--
-- Table structure for table `tb_request_topup_transection`
--

CREATE TABLE `tb_request_topup_transection` (
  `id` int(5) NOT NULL,
  `transection_no` varchar(100) DEFAULT NULL,
  `trans_in_datetime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT '000',
  `bank_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `retrive_datetime` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT 0,
  `topup_status` int(5) DEFAULT 0 COMMENT '0 : Waiting, 1 : Success, 2 : Has problem, 7 : Cancle, 10 : Auto, 11 : Add by user, 12 : Add by admin',
  `trans_in_bank` varchar(55) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  `acc_id` int(5) DEFAULT NULL,
  `actor_id` int(5) DEFAULT NULL,
  `staffadd_id` varchar(10) NOT NULL,
  `staffadd_date` varchar(30) NOT NULL,
  `freeze` varchar(5) NOT NULL,
  `nocost` varchar(11) NOT NULL DEFAULT '0' COMMENT '0: ฝากปกติ,1: ฝากบันทึกไม่เพิ่ม Credit',
  `comment` text NOT NULL,
  `premium_deposit` int(11) NOT NULL DEFAULT 0 COMMENT '0: ปกติ, 1: ฝากแบบพิเศษ',
  `deposit_bank_id` int(11) DEFAULT NULL,
  `attach` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_request_topup_transection_dellog`
--

CREATE TABLE `tb_request_topup_transection_dellog` (
  `id` int(5) NOT NULL,
  `transection_no` varchar(100) DEFAULT NULL,
  `trans_in_datetime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank_id` varchar(100) DEFAULT '000',
  `bank_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `retrive_datetime` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT 0,
  `topup_status` varchar(10) DEFAULT '0',
  `trans_in_bank` varchar(5) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  `acc_id` int(5) DEFAULT NULL,
  `actor_id` int(5) DEFAULT NULL,
  `staffadd_id` varchar(10) NOT NULL,
  `staffadd_date` varchar(30) NOT NULL,
  `freeze` varchar(5) NOT NULL,
  `comment` text NOT NULL,
  `attach` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sms_setting`
--

CREATE TABLE `tb_sms_setting` (
  `id` int(11) NOT NULL,
  `service_id` int(1) NOT NULL COMMENT '1: smsmkt, 2: thsms, 3: bulksms',
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sms_setting`
--

INSERT INTO `tb_sms_setting` (`id`, `service_id`, `username`, `password`, `credit`, `status`, `update_time`) VALUES
(1, 1, 'psgame888', 'dds', '0.00', 1, '2021-07-16 20:48:45'),
(2, 2, 'slotonline', '2sd', '0.00', 0, '2021-07-16 20:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tracking`
--

CREATE TABLE `tb_tracking` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `budget` decimal(11,2) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 'Admin_id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tracking`
--

INSERT INTO `tb_tracking` (`id`, `description`, `budget`, `link_url`, `create_date`, `create_by`) VALUES
(1, 'Line@', '50000.00', 'line', '2020-12-04 02:14:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `newpass` varchar(50) NOT NULL,
  `usergroup` varchar(10) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `using_url` varchar(255) NOT NULL,
  `used_time` int(11) DEFAULT NULL,
  `expire_time` int(11) DEFAULT NULL,
  `stay_time` int(11) NOT NULL DEFAULT 2,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `lineid` varchar(150) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `bank_id` varchar(250) NOT NULL,
  `userplus` varchar(10) NOT NULL,
  `usermwd` varchar(10) NOT NULL,
  `usertel` varchar(10) NOT NULL,
  `userreport` varchar(10) NOT NULL,
  `usersnl` varchar(10) NOT NULL,
  `userbankedit` varchar(10) NOT NULL,
  `userbsearch` varchar(10) NOT NULL,
  `usermedit` varchar(10) NOT NULL,
  `userreact` varchar(10) NOT NULL,
  `userbankonoff` varchar(10) NOT NULL,
  `userviewdeposit` varchar(10) NOT NULL,
  `userautostaff` varchar(10) NOT NULL,
  `userrecredit` varchar(10) NOT NULL,
  `userreduce` varchar(10) NOT NULL,
  `usernchange` varchar(10) NOT NULL,
  `userbyid` int(11) NOT NULL DEFAULT 0,
  `userupdatecredit` varchar(11) DEFAULT '0',
  `report_finance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `newpass`, `usergroup`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `using_url`, `used_time`, `expire_time`, `stay_time`, `active`, `first_name`, `last_name`, `company`, `phone`, `is_active`, `lineid`, `bank_name`, `bank_id`, `userplus`, `usermwd`, `usertel`, `userreport`, `usersnl`, `userbankedit`, `userbsearch`, `usermedit`, `userreact`, `userbankonoff`, `userviewdeposit`, `userautostaff`, `userrecredit`, `userreduce`, `usernchange`, `userbyid`, `userupdatecredit`, `report_finance`) VALUES
(0, '0', 'autobank', 'autobank', 'pgslotsDAS@#!$!@%SDFSDF', '1', 'autobank', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 0, 5, 1, 'ระบบอัตโนมัติ', '', NULL, '', 1, '', '014', '', '1', '1', '1', '1111111', '1', '1', '1', '1', '', '1', '1', '1', '0', '1', '1', 1, '1', 1),
(1, '', 'admin', 'slo1', 'pgslot', '9', 'admin@dadas.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'credit_free_by_id_', 1626368529, 1626368649, 5, 1, 'Oh', 'Admin', NULL, '', 1, '', '014', '', '1', '1', '1', '1111111', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', 1, '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjust_balance_log`
--
ALTER TABLE `adjust_balance_log`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `bank_botstat`
--
ALTER TABLE `bank_botstat`
  ADD UNIQUE KEY `bot_id` (`bot_id`),
  ADD KEY `bot_name` (`bot_name`,`bot_stat`);

--
-- Indexes for table `bank_logcheck`
--
ALTER TABLE `bank_logcheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_admin_bank_account`
--
ALTER TABLE `tb_admin_bank_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tb_admin_bank_withdraw`
--
ALTER TABLE `tb_admin_bank_withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_admin_credit`
--
ALTER TABLE `tb_admin_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin_turn_edit`
--
ALTER TABLE `tb_admin_turn_edit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_auto_notify_deposit`
--
ALTER TABLE `tb_auto_notify_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bank_total_balance`
--
ALTER TABLE `tb_bank_total_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bank_transaction`
--
ALTER TABLE `tb_bank_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bank_transfers_log`
--
ALTER TABLE `tb_bank_transfers_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bay_transection`
--
ALTER TABLE `tb_bay_transection`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `bay_trn_idx` (`transection_no`) USING BTREE;

--
-- Indexes for table `tb_bot_auto`
--
ALTER TABLE `tb_bot_auto`
  ADD UNIQUE KEY `bot_id` (`bot_id`),
  ADD KEY `bot_name` (`bot_name`,`bot_stat`);

--
-- Indexes for table `tb_bot_port`
--
ALTER TABLE `tb_bot_port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bot_user`
--
ALTER TABLE `tb_bot_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_credit_free_list`
--
ALTER TABLE `tb_credit_free_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_deposit_bank_account`
--
ALTER TABLE `tb_deposit_bank_account`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_fix_agent_account`
--
ALTER TABLE `tb_fix_agent_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_frontend_config`
--
ALTER TABLE `tb_frontend_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_game_setting`
--
ALTER TABLE `tb_game_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_lotto_deprive`
--
ALTER TABLE `tb_lotto_deprive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lotto_member_log`
--
ALTER TABLE `tb_lotto_member_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lotto_result`
--
ALTER TABLE `tb_lotto_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lotto_reward_config`
--
ALTER TABLE `tb_lotto_reward_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lotto_reward_type`
--
ALTER TABLE `tb_lotto_reward_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lotto_set_number`
--
ALTER TABLE `tb_lotto_set_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lotto_set_numberlist`
--
ALTER TABLE `tb_lotto_set_numberlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lotto_type`
--
ALTER TABLE `tb_lotto_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_manual_transection`
--
ALTER TABLE `tb_manual_transection`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `trnx_idx` (`transection_no`) USING BTREE,
  ADD KEY `id` (`id`,`transection_no`),
  ADD KEY `id_2` (`id`,`transection_no`,`bank_id`),
  ADD KEY `id_3` (`id`,`transection_no`,`bank_id`,`bank_number`);

--
-- Indexes for table `tb_manual_transection_dellog`
--
ALTER TABLE `tb_manual_transection_dellog`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_4` (`id`),
  ADD UNIQUE KEY `trnx_idx` (`transection_no`) USING BTREE,
  ADD KEY `id` (`id`,`transection_no`),
  ADD KEY `id_2` (`id`,`transection_no`,`bank_id`),
  ADD KEY `id_3` (`id`,`transection_no`,`bank_id`,`bank_number`);

--
-- Indexes for table `tb_manual_transection_dup`
--
ALTER TABLE `tb_manual_transection_dup`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `trnx_idx` (`transection_no`) USING BTREE,
  ADD KEY `id` (`id`,`transection_no`),
  ADD KEY `id_2` (`id`,`transection_no`,`bank_id`),
  ADD KEY `id_3` (`id`,`transection_no`,`bank_id`,`bank_number`);

--
-- Indexes for table `tb_max_wallet_aff`
--
ALTER TABLE `tb_max_wallet_aff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member_auto_problem`
--
ALTER TABLE `tb_member_auto_problem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bank_payment_id` (`bank_payment_id`);

--
-- Indexes for table `tb_password_pin`
--
ALTER TABLE `tb_password_pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_promotion_condition`
--
ALTER TABLE `tb_promotion_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_promotion_condition_ever`
--
ALTER TABLE `tb_promotion_condition_ever`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rank_list`
--
ALTER TABLE `tb_rank_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_request_topup_transection`
--
ALTER TABLE `tb_request_topup_transection`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`,`transection_no`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `amount` (`amount`),
  ADD KEY `deposit_bank_id` (`deposit_bank_id`);

--
-- Indexes for table `tb_request_topup_transection_dellog`
--
ALTER TABLE `tb_request_topup_transection_dellog`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`,`transection_no`);

--
-- Indexes for table `tb_sms_setting`
--
ALTER TABLE `tb_sms_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tracking`
--
ALTER TABLE `tb_tracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link_url` (`link_url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_email` (`email`) USING BTREE,
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`) USING BTREE,
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`) USING BTREE,
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjust_balance_log`
--
ALTER TABLE `adjust_balance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_logcheck`
--
ALTER TABLE `bank_logcheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin_bank_account`
--
ALTER TABLE `tb_admin_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_admin_bank_withdraw`
--
ALTER TABLE `tb_admin_bank_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin_credit`
--
ALTER TABLE `tb_admin_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin_turn_edit`
--
ALTER TABLE `tb_admin_turn_edit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_auto_notify_deposit`
--
ALTER TABLE `tb_auto_notify_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bank_total_balance`
--
ALTER TABLE `tb_bank_total_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bank_transaction`
--
ALTER TABLE `tb_bank_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bank_transfers_log`
--
ALTER TABLE `tb_bank_transfers_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bay_transection`
--
ALTER TABLE `tb_bay_transection`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bot_port`
--
ALTER TABLE `tb_bot_port`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bot_user`
--
ALTER TABLE `tb_bot_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_credit_free_list`
--
ALTER TABLE `tb_credit_free_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_deposit_bank_account`
--
ALTER TABLE `tb_deposit_bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_frontend_config`
--
ALTER TABLE `tb_frontend_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_game_setting`
--
ALTER TABLE `tb_game_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lotto_deprive`
--
ALTER TABLE `tb_lotto_deprive`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tb_lotto_member_log`
--
ALTER TABLE `tb_lotto_member_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_lotto_result`
--
ALTER TABLE `tb_lotto_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_lotto_reward_config`
--
ALTER TABLE `tb_lotto_reward_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_lotto_reward_type`
--
ALTER TABLE `tb_lotto_reward_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_lotto_set_number`
--
ALTER TABLE `tb_lotto_set_number`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lotto_set_numberlist`
--
ALTER TABLE `tb_lotto_set_numberlist`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_lotto_type`
--
ALTER TABLE `tb_lotto_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_manual_transection`
--
ALTER TABLE `tb_manual_transection`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_max_wallet_aff`
--
ALTER TABLE `tb_max_wallet_aff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_member_auto_problem`
--
ALTER TABLE `tb_member_auto_problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_promotion`
--
ALTER TABLE `tb_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_promotion_condition`
--
ALTER TABLE `tb_promotion_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_promotion_condition_ever`
--
ALTER TABLE `tb_promotion_condition_ever`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_rank_list`
--
ALTER TABLE `tb_rank_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_request_topup_transection`
--
ALTER TABLE `tb_request_topup_transection`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_request_topup_transection_dellog`
--
ALTER TABLE `tb_request_topup_transection_dellog`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sms_setting`
--
ALTER TABLE `tb_sms_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tracking`
--
ALTER TABLE `tb_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
