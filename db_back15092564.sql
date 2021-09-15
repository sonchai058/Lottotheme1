#
# TABLE STRUCTURE FOR: adjust_balance_log
#

DROP TABLE IF EXISTS `adjust_balance_log`;

CREATE TABLE `adjust_balance_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `previous_balance` decimal(12,2) NOT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `actor_id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `creditcom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `adjust_balance_log` (`id`, `previous_balance`, `amount`, `member_id`, `type`, `actor_id`, `datetime`, `creditcom`) VALUES (1, '0.00', '300.00', 10038, 'in', 1, '2021-01-11 15:23:36', 'test');


#
# TABLE STRUCTURE FOR: bank_botstat
#

DROP TABLE IF EXISTS `bank_botstat`;

CREATE TABLE `bank_botstat` (
  `bot_id` int(11) NOT NULL,
  `bot_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bot_stat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bot_add` int(11) NOT NULL,
  `bot_comt` varchar(250) CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `bot_id` (`bot_id`),
  KEY `bot_name` (`bot_name`,`bot_stat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bank_botstat` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`) VALUES (1, 'kbank', '1', 0, 'KBANK');
INSERT INTO `bank_botstat` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`) VALUES (2, 'scb', '1', 0, 'SCB');
INSERT INTO `bank_botstat` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`) VALUES (3, 'bbl', '0', 0, 'BBL');
INSERT INTO `bank_botstat` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`) VALUES (4, 'bay', '0', 0, 'BAY');
INSERT INTO `bank_botstat` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`) VALUES (5, 'ktb', '0', 0, 'KTB');


#
# TABLE STRUCTURE FOR: bank_logcheck
#

DROP TABLE IF EXISTS `bank_logcheck`;

CREATE TABLE `bank_logcheck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(20) NOT NULL,
  `dateedit` varchar(30) NOT NULL,
  `useredit_name` varchar(10) NOT NULL,
  `useredit_id` varchar(10) NOT NULL,
  `useredit_user` varchar(20) NOT NULL,
  `userip` varchar(20) NOT NULL,
  `user_bankid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_admin_bank_account
#

DROP TABLE IF EXISTS `tb_admin_bank_account`;

CREATE TABLE `tb_admin_bank_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `auto_deposit` int(2) NOT NULL DEFAULT 0 COMMENT 'ปิด ปิด เติมเงิน Auto',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_admin_bank_account` (`id`, `account_number`, `account_name`, `bank_company`, `re_check_money_link`, `last_checked`, `category`, `deposit_in_db`, `withdraw_in_db`, `deposit_in_bank`, `withdraw_in_bank`, `status`, `primary_bank`, `user_name`, `password`, `account_code`, `access_token`, `auto_bot`, `check_mobile`, `check_curl`, `check_sms`, `auto_deposit`) VALUES (1, '2222222222', 'test', 'KBANK', '', NULL, 'deposit', NULL, NULL, NULL, NULL, 1, 1, '', '', '', NULL, 0, 0, 0, 0, 1);


#
# TABLE STRUCTURE FOR: tb_admin_bank_withdraw
#

DROP TABLE IF EXISTS `tb_admin_bank_withdraw`;

CREATE TABLE `tb_admin_bank_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(11,2) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_admin_credit
#

DROP TABLE IF EXISTS `tb_admin_credit`;

CREATE TABLE `tb_admin_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_credit_fix` decimal(11,2) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_admin_turn_edit
#

DROP TABLE IF EXISTS `tb_admin_turn_edit`;

CREATE TABLE `tb_admin_turn_edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `before_turn` int(11) NOT NULL,
  `after_turn` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_admin_turn_edit` (`id`, `before_turn`, `after_turn`, `member_id`, `admin_id`, `update_time`, `comment`) VALUES (1, 2016, 0, 10038, 1, '2021-01-11 15:23:21', 'test');


#
# TABLE STRUCTURE FOR: tb_auto_notify_deposit
#

DROP TABLE IF EXISTS `tb_auto_notify_deposit`;

CREATE TABLE `tb_auto_notify_deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_bank_total_balance
#

DROP TABLE IF EXISTS `tb_bank_total_balance`;

CREATE TABLE `tb_bank_total_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_acc_comp` varchar(255) NOT NULL,
  `bank_type` varchar(255) NOT NULL COMMENT 'deposit,withdraw',
  `log_date` datetime NOT NULL,
  `total_balance` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_bank_transaction
#

DROP TABLE IF EXISTS `tb_bank_transaction`;

CREATE TABLE `tb_bank_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `account_no` varchar(15) NOT NULL,
  `bank_name` varchar(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `tranferer` varchar(200) NOT NULL,
  `datein` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_bank_transfers_log
#

DROP TABLE IF EXISTS `tb_bank_transfers_log`;

CREATE TABLE `tb_bank_transfers_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL COMMENT 'admin id',
  `from_pid` int(11) NOT NULL COMMENT 'จากเอกสารไหน',
  `from_bank` varchar(255) NOT NULL COMMENT 'Bank Account',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_bay_transection
#

DROP TABLE IF EXISTS `tb_bay_transection`;

CREATE TABLE `tb_bay_transection` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `transection_no` varchar(50) DEFAULT NULL,
  `trans_in_datetime` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `bank_id` varchar(10) DEFAULT NULL,
  `bank_number` varchar(15) DEFAULT NULL,
  `retrive_datetime` datetime DEFAULT NULL,
  `member_id` int(5) DEFAULT 0,
  `topup_status` int(5) DEFAULT 0,
  `acc_id` int(1) DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `bay_trn_idx` (`transection_no`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_bonus_rate
#

DROP TABLE IF EXISTS `tb_bonus_rate`;

CREATE TABLE `tb_bonus_rate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `day_count` int(11) DEFAULT 1 COMMENT 'วันเวลา',
  `point_bonus` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'แต้ม',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='config การแจกเต้ม';

INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (1, 1, '1.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (2, 2, '1.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (3, 3, '2.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (4, 4, '2.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (5, 5, '2.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (6, 6, '2.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (7, 7, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (8, 8, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (9, 9, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (10, 10, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (11, 11, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (12, 12, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (13, 13, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (14, 14, '3.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (15, 15, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (16, 16, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (17, 17, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (18, 18, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (19, 19, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (20, 20, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (21, 21, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (22, 22, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (23, 23, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (24, 24, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (25, 25, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (26, 26, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (27, 27, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (28, 28, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (29, 29, '4.00');
INSERT INTO `tb_bonus_rate` (`id`, `day_count`, `point_bonus`) VALUES (30, 30, '5.00');


#
# TABLE STRUCTURE FOR: tb_bot_auto
#

DROP TABLE IF EXISTS `tb_bot_auto`;

CREATE TABLE `tb_bot_auto` (
  `bot_id` int(11) NOT NULL,
  `bot_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bot_stat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bot_add` int(11) NOT NULL,
  `bot_comt` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bot_description` varchar(255) CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `bot_id` (`bot_id`),
  KEY `bot_name` (`bot_name`,`bot_stat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (1, 'kbank', '1', 0, 'kbank', 'Bot เติมเงิน Bank KBANK');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (2, 'oth', '1', 0, 'oth', 'Bot เติมเงิน Bank SCB');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (3, 'bonus', '1', 0, 'bonus', 'Bot เติมเงิน BONUS');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (4, 'smskbank', '1', 0, 'smskbank', 'Bot เติมเงิน SMS KBANK\r\n');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (5, 'smsoth', '1', 0, 'smsoth', 'Bot เติมเงิน SMS SCB');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (6, 'scbtoscb', '0', 0, 'smsscbotscb', 'Bot เติมเงิน SMS SCB TO SCB');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (7, 'sms', '1', 0, 'sms', 'Ture wallet');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (8, 'checkbank', '0', 0, 'checkbank', 'Check Clear Bank');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (9, 'scbtoscbs', '0', 0, 'scbtoscbs', 'Bot เติมเงิน SCB TO SCB');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (10, 'bay', '0', 0, 'bay', 'Bot เติมเงิน Bank bay');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (11, 'checkbankkbank', '0', 0, 'checkbankkbank', 'Check Clear kBank');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (12, 'checkbankscb', '0', 0, 'checkbankscb', 'Check Clear SCB');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (13, 'checksmskbank', '0', 0, 'checksmskbank', 'Check Clear sms kBank');
INSERT INTO `tb_bot_auto` (`bot_id`, `bot_name`, `bot_stat`, `bot_add`, `bot_comt`, `bot_description`) VALUES (14, 'checksmsscb', '0', 0, 'checksmsscb', 'Check Clear sms SCB');


#
# TABLE STRUCTURE FOR: tb_bot_port
#

DROP TABLE IF EXISTS `tb_bot_port`;

CREATE TABLE `tb_bot_port` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `port_no` int(11) NOT NULL,
  `bot_code_user` varchar(255) DEFAULT NULL,
  `used_by` varchar(255) DEFAULT NULL,
  `used_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_bot_user
#

DROP TABLE IF EXISTS `tb_bot_user`;

CREATE TABLE `tb_bot_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bot_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_credit_free_list
#

DROP TABLE IF EXISTS `tb_credit_free_list`;

CREATE TABLE `tb_credit_free_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_credit_free_list` (`id`, `credit_free_name`, `amount`, `description`, `status`, `img`, `pre_balance`, `bonus_amount`, `withdraw_amount`, `links_amount`, `turn_amount`, `create_date`) VALUES (1, 'แชร์ Facebook รับฟรี 20 Credit', '20', 'แชร์ Facebook รับฟรี 20 Credit', 1, 'https://miro.medium.com/max/1400/1*E9gYGwScJ1fE6SNR5VNbLg.jpeg', '0.00', '0.00', '0.00', 2, '0', '2021-07-10 15:09:01');


#
# TABLE STRUCTURE FOR: tb_deposit_bank_account
#

DROP TABLE IF EXISTS `tb_deposit_bank_account`;

CREATE TABLE `tb_deposit_bank_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_fix_agent_account
#

DROP TABLE IF EXISTS `tb_fix_agent_account`;

CREATE TABLE `tb_fix_agent_account` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_frontend_config
#

DROP TABLE IF EXISTS `tb_frontend_config`;

CREATE TABLE `tb_frontend_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `affiliate_max_per_people` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_frontend_config` (`id`, `url_wallet`, `max_withdraw_per_day`, `status`, `min_withdraw_amount`, `max_withdraw_amount`, `max_withdraw_amount_per_day`, `is_promotion_max_withdraw`, `close_login`, `close_register`, `show_topic`, `text_login`, `text_register`, `text_topic`, `front_title`, `front_description`, `front_keywords`, `min_deposit_aff`, `bonus_per_aff`, `bonus_percen_aff`, `max_deposit_aff`, `turn_amount_aff`, `min_deposit_aff_2`, `bonus_percen_aff_2`, `max_deposit_aff_2`, `turn_amount_aff_2`, `condition_aff_1`, `condition_aff_2`, `bonus_per_aff_2`, `affiliate_status`, `aff_promotion_np`, `affiliate_max_per_people`) VALUES (1, 'https://wallet.lottobetsvip.com', 5, 1, '300', '100000', '300000', '0', 1, 1, 1, 'ระงับใช้การเข้าสู่ระบบ ชั่วคราว', 'ปิดปรุบปรังระบบชั่วคราว จะเปิดให้สมัครอีกรอบ', 'แจ้งเตือน กรุณางดฝากเงินผ่านธนาคารไทยพาณิชย์ช่วงเวลา 22:30 - 00:00 ของทุกวัน', 'lottobetsvip.com ฝากเร็ว จ่ายจริง ปลอดภัย 100%', 'lottobetsvip.com ฝากเร็ว จ่ายจริง ปลอดภัย 100%', 'lottobetvip', '300', '50', '0.00', 500, '6', 0, '0.00', 500, 6, 0, 0, 10, 0, 1, 20);


#
# TABLE STRUCTURE FOR: tb_game_points
#

DROP TABLE IF EXISTS `tb_game_points`;

CREATE TABLE `tb_game_points` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `datetime` datetime NOT NULL COMMENT 'วันเวลา',
  `point` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'แต้ม',
  `type` varchar(10) NOT NULL DEFAULT 'credit' COMMENT 'ชนิด credit, debit',
  `chanel` int(1) NOT NULL DEFAULT 1 COMMENT 'ประเภท 1 : แต้มจากเกม หรื่อ หรือได้จาก แหล่งอื่นๆ, 2 : login',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะ 1 : ปกติ , 0 : hold',
  `member_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน หรือ ลูกค้า',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (1, '2021-08-17 15:52:02', '1.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (2, '2021-08-16 15:52:02', '1.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (4, '2021-08-18 17:15:57', '2.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (6, '2021-08-19 10:16:19', '2.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (8, '2021-08-19 20:53:48', '0.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (10, '2021-08-19 20:58:31', '0.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (12, '2021-08-19 21:05:05', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (14, '2021-08-19 21:05:23', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (16, '2021-08-19 21:09:38', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (18, '2021-08-19 21:09:53', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (20, '2021-08-19 21:10:09', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (22, '2021-08-19 21:22:38', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (24, '2021-08-19 21:22:56', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (26, '2021-08-19 21:39:16', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (28, '2021-08-19 21:39:31', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (30, '2021-08-19 21:40:04', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (32, '2021-08-19 21:40:27', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (33, '2021-08-19 22:29:24', '-3.00', 'credit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (34, '2021-08-19 22:29:24', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (35, '2021-08-19 22:29:41', '-3.00', 'credit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (36, '2021-08-19 22:29:41', '0.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (37, '2021-08-19 22:29:56', '-3.00', 'credit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (38, '2021-08-19 22:29:56', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (39, '2021-08-22 00:38:04', '2.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (40, '2021-08-30 13:14:51', '1.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (41, '2021-08-30 13:17:23', '-3.00', 'credit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (42, '2021-08-30 13:17:23', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (43, '2021-08-30 13:17:43', '-3.00', 'credit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (44, '2021-08-30 13:17:43', '1.00', 'debit', 1, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (45, '2021-09-06 11:03:09', '1.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (46, '2021-09-07 10:26:16', '1.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (47, '2021-09-08 10:05:37', '1.00', 'debit', 2, 1, 1);
INSERT INTO `tb_game_points` (`id`, `datetime`, `point`, `type`, `chanel`, `status`, `member_id`) VALUES (48, '2021-09-15 13:08:12', '2.00', 'debit', 2, 1, 1);


#
# TABLE STRUCTURE FOR: tb_game_setting
#

DROP TABLE IF EXISTS `tb_game_setting`;

CREATE TABLE `tb_game_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tb_game_setting` (`id`, `game_name`, `status`, `update_time`) VALUES (1, 'joker', 0, '2021-07-16 21:27:22');
INSERT INTO `tb_game_setting` (`id`, `game_name`, `status`, `update_time`) VALUES (2, 'imi', 0, '2021-07-16 21:27:22');
INSERT INTO `tb_game_setting` (`id`, `game_name`, `status`, `update_time`) VALUES (3, 'ufabet', 1, '2021-07-16 21:27:52');


#
# TABLE STRUCTURE FOR: tb_log
#

DROP TABLE IF EXISTS `tb_log`;

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_admin` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_lotto_date
#

DROP TABLE IF EXISTS `tb_lotto_date`;

CREATE TABLE `tb_lotto_date` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_closed` date DEFAULT NULL,
  `lotto_type` int(11) NOT NULL,
  `status` int(2) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (1, '2021-01-17', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (2, '2021-02-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (3, '2021-02-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (4, '2021-03-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (5, '2021-03-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (6, '2021-04-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (7, '2021-04-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (8, '2021-05-02', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (9, '2021-05-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (10, '2021-06-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (11, '2021-06-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (12, '2021-07-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (13, '2021-07-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (14, '2021-08-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (15, '2021-08-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (16, '2021-09-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (17, '2021-09-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (18, '2021-10-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (19, '2021-10-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (20, '2021-11-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (21, '2021-11-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (22, '2021-12-01', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (23, '2021-12-16', 1, 1);
INSERT INTO `tb_lotto_date` (`id`, `date_closed`, `lotto_type`, `status`) VALUES (24, '2021-12-30', 1, 0);


#
# TABLE STRUCTURE FOR: tb_lotto_deprive
#

DROP TABLE IF EXISTS `tb_lotto_deprive`;

CREATE TABLE `tb_lotto_deprive` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lotto_type` int(11) NOT NULL,
  `lotto_reward_type` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `reward` decimal(11,2) DEFAULT NULL,
  `lotto_group` date DEFAULT NULL,
  `status` int(2) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (1, 1, 5, '05', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (2, 1, 5, '09', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (3, 1, 5, '12', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (4, 1, 5, '14', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (5, 1, 5, '15', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (6, 1, 5, '17', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (7, 1, 5, '19', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (8, 1, 5, '24', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (9, 1, 5, '25', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (10, 1, 5, '26', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (11, 1, 5, '27', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (12, 1, 5, '28', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (13, 1, 5, '29', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (14, 1, 5, '31', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (15, 1, 5, '38', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (16, 1, 5, '39', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (17, 1, 5, '41', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (18, 1, 5, '42', '2.00', '2021-07-16', 0);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (19, 1, 5, '47', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (20, 1, 5, '49', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (21, 1, 6, '05', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (22, 1, 6, '07', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (23, 1, 6, '09', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (24, 1, 6, '12', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (25, 1, 6, '13', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (26, 1, 6, '14', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (27, 1, 6, '15', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (28, 1, 6, '17', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (29, 1, 6, '19', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (30, 1, 6, '20', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (31, 1, 6, '21', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (32, 1, 6, '22', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (33, 1, 6, '23', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (34, 1, 6, '24', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (35, 1, 6, '25', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (36, 1, 6, '26', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (37, 1, 6, '27', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (38, 1, 6, '28', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (39, 1, 6, '29', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (40, 1, 6, '31', '2.00', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (41, 1, 1, '005', '2.51', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (42, 1, 1, '011', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (43, 1, 1, '013', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (44, 1, 1, '038', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (45, 1, 1, '050', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (46, 1, 1, '051', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (47, 1, 1, '059', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (48, 1, 1, '079', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (49, 1, 1, '094', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (50, 1, 1, '095', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (51, 1, 1, '097', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (52, 1, 1, '101', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (53, 1, 1, '110', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (54, 1, 1, '113', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (55, 1, 1, '115', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (56, 1, 1, '119', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (57, 1, 1, '131', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (58, 1, 1, '147', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (59, 1, 1, '150', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (60, 1, 1, '151', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (61, 1, 2, '013', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (62, 1, 2, '015', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (63, 1, 2, '031', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (64, 1, 2, '034', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (65, 1, 2, '038', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (66, 1, 2, '039', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (67, 1, 2, '043', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (68, 1, 2, '045', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (69, 1, 2, '051', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (70, 1, 2, '054', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (71, 1, 2, '057', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (72, 1, 2, '058', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (73, 1, 2, '059', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (74, 1, 2, '075', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (75, 1, 2, '079', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (76, 1, 2, '083', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (77, 1, 2, '085', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (78, 1, 2, '093', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (79, 1, 2, '095', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (80, 1, 2, '097', '2.50', '2021-07-16', 1);
INSERT INTO `tb_lotto_deprive` (`id`, `lotto_type`, `lotto_reward_type`, `number`, `reward`, `lotto_group`, `status`) VALUES (81, 1, 6, '50', '500.00', '2021-07-16', 0);


#
# TABLE STRUCTURE FOR: tb_lotto_member_log
#

DROP TABLE IF EXISTS `tb_lotto_member_log`;

CREATE TABLE `tb_lotto_member_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `lotto_reward_type` int(11) NOT NULL,
  `lotto_type` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `lotto_group` date NOT NULL,
  `reward` decimal(11,2) NOT NULL,
  `date_time_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_lotto_result
#

DROP TABLE IF EXISTS `tb_lotto_result`;

CREATE TABLE `tb_lotto_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `special` varchar(11) NOT NULL,
  `four_tong` varchar(5) NOT NULL,
  `three_tong` varchar(5) NOT NULL,
  `three_front` varchar(11) NOT NULL,
  `three_back` varchar(11) NOT NULL,
  `two_down` varchar(5) NOT NULL,
  `lotto_type` int(11) NOT NULL COMMENT 'ประเภทหวย',
  `date_time_closed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_result` (`id`, `special`, `four_tong`, `three_tong`, `three_front`, `three_back`, `two_down`, `lotto_type`, `date_time_closed`) VALUES (1, '910261', '0000', '261', '307,103', '004,785', '69', 1, '2021-08-01 15:20:00');
INSERT INTO `tb_lotto_result` (`id`, `special`, `four_tong`, `three_tong`, `three_front`, `three_back`, `two_down`, `lotto_type`, `date_time_closed`) VALUES (2, '000000', '0000', '000', '000,000', '000,000', '00', 1, '2021-09-01 15:20:00');


#
# TABLE STRUCTURE FOR: tb_lotto_reward_config
#

DROP TABLE IF EXISTS `tb_lotto_reward_config`;

CREATE TABLE `tb_lotto_reward_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotto_type` int(11) NOT NULL,
  `lotto_reward_type` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `reward` decimal(11,2) NOT NULL,
  `status` int(2) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (1, 1, 1, 1, 500, '900.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (2, 1, 1, 501, 999, '800.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (3, 1, 2, 1, 999, '150.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (4, 1, 2, 1000, 9999, '100.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (5, 1, 4, 1, 999, '450.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (6, 1, 4, 1000, 9999, '400.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (7, 1, 5, 1, 999, '90.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (8, 1, 5, 1000, 9999, '45.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (9, 1, 6, 1, 999, '90.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (10, 1, 6, 1000, 9999, '45.00', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (11, 1, 7, 1, 999, '3.20', 1);
INSERT INTO `tb_lotto_reward_config` (`id`, `lotto_type`, `lotto_reward_type`, `min`, `max`, `reward`, `status`) VALUES (12, 1, 8, 1, 999, '4.20', 1);


#
# TABLE STRUCTURE FOR: tb_lotto_reward_type
#

DROP TABLE IF EXISTS `tb_lotto_reward_type`;

CREATE TABLE `tb_lotto_reward_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (1, '3tong', '3 ตัวบน');
INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (2, '3tod', '3 ตัวโต๊ด');
INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (3, '3front', '3 ตัวหน้า');
INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (4, '3down', '3 ตัวล่าง');
INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (5, '2up', '2 ตัวบน');
INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (6, '2down', '2 ตัวล่าง');
INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (7, 'runup', 'วิ่งบน');
INSERT INTO `tb_lotto_reward_type` (`id`, `name`, `description`) VALUES (8, 'rundown', 'วิ่งล่าง');


#
# TABLE STRUCTURE FOR: tb_lotto_set_number
#

DROP TABLE IF EXISTS `tb_lotto_set_number`;

CREATE TABLE `tb_lotto_set_number` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `lotto_type` int(11) NOT NULL,
  `date_time_add` datetime DEFAULT NULL,
  `status` int(2) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_set_number` (`id`, `name`, `member_id`, `lotto_type`, `date_time_add`, `status`) VALUES (1, 'test', 1, 1, '2021-07-27 19:24:35', 1);


#
# TABLE STRUCTURE FOR: tb_lotto_set_numberlist
#

DROP TABLE IF EXISTS `tb_lotto_set_numberlist`;

CREATE TABLE `tb_lotto_set_numberlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `set_id` int(11) DEFAULT NULL,
  `lotto_reward_type` int(11) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_set_numberlist` (`id`, `set_id`, `lotto_reward_type`, `number`) VALUES (1, 1, 7, '1');
INSERT INTO `tb_lotto_set_numberlist` (`id`, `set_id`, `lotto_reward_type`, `number`) VALUES (2, 1, 7, '5');


#
# TABLE STRUCTURE FOR: tb_lotto_type
#

DROP TABLE IF EXISTS `tb_lotto_type`;

CREATE TABLE `tb_lotto_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_type` (`id`, `name`, `date_created`, `admin_id`) VALUES (1, 'หวยรัฐบาล', '2021-06-21 20:56:40', 1);
INSERT INTO `tb_lotto_type` (`id`, `name`, `date_created`, `admin_id`) VALUES (2, 'หวยลาว', '2021-06-21 20:56:40', 1);
INSERT INTO `tb_lotto_type` (`id`, `name`, `date_created`, `admin_id`) VALUES (3, 'หวยออมสิน', '2021-06-21 10:47:49', 1);


#
# TABLE STRUCTURE FOR: tb_lotto_winner
#

DROP TABLE IF EXISTS `tb_lotto_winner`;

CREATE TABLE `tb_lotto_winner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deprive` varchar(10) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `reward` decimal(11,2) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `lotto_type` int(11) NOT NULL,
  `lotto_reward_type` int(11) NOT NULL,
  `lotto_group` date DEFAULT NULL,
  `member_log` int(11) NOT NULL,
  `date_time_add` datetime DEFAULT NULL,
  `process_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tb_lotto_winner` (`id`, `member_id`, `member_name`, `number`, `name`, `deprive`, `description`, `amount`, `reward`, `price`, `lotto_type`, `lotto_reward_type`, `lotto_group`, `member_log`, `date_time_add`, `process_time`) VALUES (1, 1, '09555****', '261', '3tong', '0', '3 ตัวบน', 1, '900.00', '900.00', 1, 1, '2021-08-01', 1, '2021-08-02 15:19:23', '2021-08-04 19:25:54');
INSERT INTO `tb_lotto_winner` (`id`, `member_id`, `member_name`, `number`, `name`, `deprive`, `description`, `amount`, `reward`, `price`, `lotto_type`, `lotto_reward_type`, `lotto_group`, `member_log`, `date_time_add`, `process_time`) VALUES (2, 1, '09555****', '69', '2down', '0', '2 ตัวล่าง', 1, '900.00', '900.00', 1, 6, '2021-08-01', 2, '2021-08-02 15:19:23', '2021-08-04 19:25:54');


#
# TABLE STRUCTURE FOR: tb_manual_transection
#

DROP TABLE IF EXISTS `tb_manual_transection`;

CREATE TABLE `tb_manual_transection` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `attach` varchar(250) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `trnx_idx` (`transection_no`) USING BTREE,
  KEY `id` (`id`,`transection_no`),
  KEY `id_2` (`id`,`transection_no`,`bank_id`),
  KEY `id_3` (`id`,`transection_no`,`bank_id`,`bank_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_manual_transection_dellog
#

DROP TABLE IF EXISTS `tb_manual_transection_dellog`;

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
  `attach` varchar(250) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id_4` (`id`),
  UNIQUE KEY `trnx_idx` (`transection_no`) USING BTREE,
  KEY `id` (`id`,`transection_no`),
  KEY `id_2` (`id`,`transection_no`,`bank_id`),
  KEY `id_3` (`id`,`transection_no`,`bank_id`,`bank_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_manual_transection_dup
#

DROP TABLE IF EXISTS `tb_manual_transection_dup`;

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
  `attach` varchar(250) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `trnx_idx` (`transection_no`) USING BTREE,
  KEY `id` (`id`,`transection_no`),
  KEY `id_2` (`id`,`transection_no`,`bank_id`),
  KEY `id_3` (`id`,`transection_no`,`bank_id`,`bank_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_max_wallet_aff
#

DROP TABLE IF EXISTS `tb_max_wallet_aff`;

CREATE TABLE `tb_max_wallet_aff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unused_wallet` int(11) NOT NULL COMMENT 'wallet ที่เหลือ',
  `used_wallet` int(11) NOT NULL COMMENT 'wallet ที่ใช้ไปแล้ว (จองไปแล้ว)',
  `max_wallet` int(11) NOT NULL COMMENT 'ค่าสูงสุด',
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 'admin id',
  `max_aff_per_member` int(11) NOT NULL COMMENT 'จำนวนที่สามารถรับได้จากหัว affiliate',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_max_wallet_aff` (`id`, `unused_wallet`, `used_wallet`, `max_wallet`, `create_date`, `create_by`, `max_aff_per_member`) VALUES (1, 0, 0, 4000000, '2020-07-10 01:57:19', 0, 50);


#
# TABLE STRUCTURE FOR: tb_member_auto_problem
#

DROP TABLE IF EXISTS `tb_member_auto_problem`;

CREATE TABLE `tb_member_auto_problem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(22) NOT NULL,
  `datein` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `bank_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bank_payment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bank_payment_id` (`bank_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `tb_member_auto_problem` (`id`, `amount`, `datein`, `status`, `member_id`, `bank`, `bank_number`, `username`, `bank_payment_id`, `comment`) VALUES (1, 1, '2021-07-13 17:42:00', 3, 0, 'KBANK', '111111', '1', 2, 't');
INSERT INTO `tb_member_auto_problem` (`id`, `amount`, `datein`, `status`, `member_id`, `bank`, `bank_number`, `username`, `bank_payment_id`, `comment`) VALUES (2, 1, '2021-07-13 17:43:00', 3, 0, 'KBANK', '111111', '1', 3, 'a');
INSERT INTO `tb_member_auto_problem` (`id`, `amount`, `datein`, `status`, `member_id`, `bank`, `bank_number`, `username`, `bank_payment_id`, `comment`) VALUES (3, 1, '2021-07-13 17:45:00', 0, 0, 'KBANK', '111111', '1', 4, 'test');


#
# TABLE STRUCTURE FOR: tb_password_pin
#

DROP TABLE IF EXISTS `tb_password_pin`;

CREATE TABLE `tb_password_pin` (
  `id` int(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_auto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tb_password_pin` (`id`, `password`, `password_auto`) VALUES (1, '088880', '099990');


#
# TABLE STRUCTURE FOR: tb_promotion
#

DROP TABLE IF EXISTS `tb_promotion`;

CREATE TABLE `tb_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `withdraw_amount` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'ยอดถอนหลังรับโบนัส',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `tb_promotion` (`id`, `promotion_name`, `bonus_percen`, `multipy_turn`, `min_credit`, `max_credit`, `level_player`, `promotion_type`, `promotion_des`, `banner_url`, `date_start`, `date_end`, `open_mon`, `open_tue`, `open_wed`, `open_thu`, `open_fri`, `open_sat`, `open_sun`, `is_time`, `time_start`, `time_end`, `cost_fixed`, `status`, `condition_status`, `duplicate_other`, `update_date`, `pre_balance`, `bonus_amount`, `withdraw_amount`) VALUES (1, 'โปรสมัครสมาชิกใหม่', 60, 6, 100, 500, 0, 1, 'ฝากยอดที่กำหนด รับเพิ่ม ตามเงื่อนไขดังรูป', 'https://pgslot678.com/_nuxt/img/promotion1.443cacf.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 1, 0, 0, '2020-11-13 00:09:55', '0.00', '0.00', '0.00');
INSERT INTO `tb_promotion` (`id`, `promotion_name`, `bonus_percen`, `multipy_turn`, `min_credit`, `max_credit`, `level_player`, `promotion_type`, `promotion_des`, `banner_url`, `date_start`, `date_end`, `open_mon`, `open_tue`, `open_wed`, `open_thu`, `open_fri`, `open_sat`, `open_sun`, `is_time`, `time_start`, `time_end`, `cost_fixed`, `status`, `condition_status`, `duplicate_other`, `update_date`, `pre_balance`, `bonus_amount`, `withdraw_amount`) VALUES (2, 'โปรทุกยอดฝาก', 12, 6, 300, 500, 0, 0, 'ฝากยอดที่กำหนด รับเพิ่ม ตามเงื่อนไขดังรูป', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 1, 0, 0, '2020-11-26 00:37:04', '0.00', '0.00', '0.00');
INSERT INTO `tb_promotion` (`id`, `promotion_name`, `bonus_percen`, `multipy_turn`, `min_credit`, `max_credit`, `level_player`, `promotion_type`, `promotion_des`, `banner_url`, `date_start`, `date_end`, `open_mon`, `open_tue`, `open_wed`, `open_thu`, `open_fri`, `open_sat`, `open_sun`, `is_time`, `time_start`, `time_end`, `cost_fixed`, `status`, `condition_status`, `duplicate_other`, `update_date`, `pre_balance`, `bonus_amount`, `withdraw_amount`) VALUES (3, 'โปรฝากหลังไม่ได้ฝาก 7 วัน', 30, 6, 300, 500, 0, 0, 'กลับมาฝากหลังฝากครบ 7 วันรับโบนัสพิเศษ', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 0, 0, 0, '2020-11-22 19:41:35', '0.00', '0.00', '0.00');
INSERT INTO `tb_promotion` (`id`, `promotion_name`, `bonus_percen`, `multipy_turn`, `min_credit`, `max_credit`, `level_player`, `promotion_type`, `promotion_des`, `banner_url`, `date_start`, `date_end`, `open_mon`, `open_tue`, `open_wed`, `open_thu`, `open_fri`, `open_sat`, `open_sun`, `is_time`, `time_start`, `time_end`, `cost_fixed`, `status`, `condition_status`, `duplicate_other`, `update_date`, `pre_balance`, `bonus_amount`, `withdraw_amount`) VALUES (4, 'โปรโมชั่นฝากประจำ มีขั้นต่ำ', 30, 10, 300, 3000, 0, 0, 'โปรโมชั่นฝากประจำ มีขั้นต่ำ', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 1, 0, 0, '2020-11-26 01:08:04', '0.00', '0.00', '0.00');
INSERT INTO `tb_promotion` (`id`, `promotion_name`, `bonus_percen`, `multipy_turn`, `min_credit`, `max_credit`, `level_player`, `promotion_type`, `promotion_des`, `banner_url`, `date_start`, `date_end`, `open_mon`, `open_tue`, `open_wed`, `open_thu`, `open_fri`, `open_sat`, `open_sun`, `is_time`, `time_start`, `time_end`, `cost_fixed`, `status`, `condition_status`, `duplicate_other`, `update_date`, `pre_balance`, `bonus_amount`, `withdraw_amount`) VALUES (5, 'โปรโมชั่นฝากประจำ ไม่มีขั้นต่ำ', 30, 10, 0, 3000, 0, 0, 'โปรโมชั่นฝากประจำ ไม่มีขั้นต่ำ', 'https://pgslot678.com/_nuxt/img/promotion2.5bdbcc7.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1, 0, '00:00:00', '00:00:00', 0, 0, 0, 0, '2020-11-26 01:08:10', '0.00', '0.00', '0.00');


#
# TABLE STRUCTURE FOR: tb_promotion_condition
#

DROP TABLE IF EXISTS `tb_promotion_condition`;

CREATE TABLE `tb_promotion_condition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `min_amount` int(11) NOT NULL,
  `max_amount` int(11) NOT NULL,
  `multiply_turn` int(11) NOT NULL,
  `bonus_percen` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `tb_promotion_condition` (`id`, `min_amount`, `max_amount`, `multiply_turn`, `bonus_percen`, `promotion_id`) VALUES (1, 100, 599, 6, 10, 2);
INSERT INTO `tb_promotion_condition` (`id`, `min_amount`, `max_amount`, `multiply_turn`, `bonus_percen`, `promotion_id`) VALUES (2, 600, 1099, 6, 15, 2);
INSERT INTO `tb_promotion_condition` (`id`, `min_amount`, `max_amount`, `multiply_turn`, `bonus_percen`, `promotion_id`) VALUES (3, 1100, 2000, 6, 20, 2);
INSERT INTO `tb_promotion_condition` (`id`, `min_amount`, `max_amount`, `multiply_turn`, `bonus_percen`, `promotion_id`) VALUES (4, 100, 399, 6, 30, 1);
INSERT INTO `tb_promotion_condition` (`id`, `min_amount`, `max_amount`, `multiply_turn`, `bonus_percen`, `promotion_id`) VALUES (5, 400, 999, 6, 40, 1);
INSERT INTO `tb_promotion_condition` (`id`, `min_amount`, `max_amount`, `multiply_turn`, `bonus_percen`, `promotion_id`) VALUES (6, 1000, 2000, 6, 50, 1);


#
# TABLE STRUCTURE FOR: tb_promotion_condition_ever
#

DROP TABLE IF EXISTS `tb_promotion_condition_ever`;

CREATE TABLE `tb_promotion_condition_ever` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `three_days` decimal(11,2) NOT NULL COMMENT 'ครบ 3 วันได้เท่าไร',
  `seven_days` decimal(11,2) NOT NULL COMMENT 'ครบ 7 วันได้เท่าไร',
  `ten_days` decimal(11,2) NOT NULL COMMENT 'ครบ 10 วันได้เท่าไร',
  `fifteen_days` decimal(11,2) NOT NULL COMMENT 'ครบ 15 วันได้เท่าไร',
  `thirty_days` decimal(11,2) NOT NULL COMMENT 'ครบ 30 วันได้เท่าไร',
  `promotion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tb_promotion_condition_ever` (`id`, `three_days`, `seven_days`, `ten_days`, `fifteen_days`, `thirty_days`, `promotion_id`) VALUES (1, '200.00', '500.00', '1000.00', '2000.00', '3000.00', 4);
INSERT INTO `tb_promotion_condition_ever` (`id`, `three_days`, `seven_days`, `ten_days`, `fifteen_days`, `thirty_days`, `promotion_id`) VALUES (2, '200.00', '500.00', '1000.00', '2000.00', '3000.00', 5);


#
# TABLE STRUCTURE FOR: tb_rank_list
#

DROP TABLE IF EXISTS `tb_rank_list`;

CREATE TABLE `tb_rank_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_name` varchar(155) NOT NULL,
  `min_deposit` int(11) NOT NULL,
  `max_deposit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (1, 'Herald', 1, 100000);
INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (2, 'Guadian', 100001, 500000);
INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (3, 'Crusader', 500001, 1000000);
INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (4, 'Archon', 1000001, 2000000);
INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (5, 'Legend', 2000001, 3000000);
INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (6, 'Ancient', 3000001, 4000000);
INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (7, 'Divine', 4000001, 5000000);
INSERT INTO `tb_rank_list` (`id`, `rank_name`, `min_deposit`, `max_deposit`) VALUES (8, 'Immortal', 5000000, 999999999);


#
# TABLE STRUCTURE FOR: tb_request_topup_transection
#

DROP TABLE IF EXISTS `tb_request_topup_transection`;

CREATE TABLE `tb_request_topup_transection` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `attach` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`,`transection_no`),
  KEY `member_id` (`member_id`),
  KEY `amount` (`amount`),
  KEY `deposit_bank_id` (`deposit_bank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_request_topup_transection_dellog
#

DROP TABLE IF EXISTS `tb_request_topup_transection_dellog`;

CREATE TABLE `tb_request_topup_transection_dellog` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `attach` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`,`transection_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_sms_setting
#

DROP TABLE IF EXISTS `tb_sms_setting`;

CREATE TABLE `tb_sms_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(1) NOT NULL COMMENT '1: smsmkt, 2: thsms, 3: bulksms',
  `username` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `status` int(1) NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `tb_sms_setting` (`id`, `service_id`, `username`, `password`, `credit`, `status`, `update_time`) VALUES (1, 1, 'psgame888', 'dds', '0.00', 1, '2021-07-16 20:48:45');
INSERT INTO `tb_sms_setting` (`id`, `service_id`, `username`, `password`, `credit`, `status`, `update_time`) VALUES (2, 2, 'slotonline', '2sd', '0.00', 0, '2021-07-16 20:49:05');


#
# TABLE STRUCTURE FOR: tb_tracking
#

DROP TABLE IF EXISTS `tb_tracking`;

CREATE TABLE `tb_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `budget` decimal(11,2) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 'Admin_id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `link_url` (`link_url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_tracking` (`id`, `description`, `budget`, `link_url`, `create_date`, `create_by`) VALUES (1, 'Line@', '50000.00', 'line', '2020-12-04 02:14:07', 1);


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `using_url` varchar(255) NOT NULL,
  `used_time` int(11) DEFAULT NULL,
  `expire_time` int(11) DEFAULT NULL,
  `stay_time` int(11) NOT NULL DEFAULT 2,
  `active` tinyint(1) unsigned DEFAULT NULL,
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
  `report_finance` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `uc_email` (`email`) USING BTREE,
  UNIQUE KEY `uc_activation_selector` (`activation_selector`) USING BTREE,
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`) USING BTREE,
  UNIQUE KEY `uc_remember_selector` (`remember_selector`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `newpass`, `usergroup`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `using_url`, `used_time`, `expire_time`, `stay_time`, `active`, `first_name`, `last_name`, `company`, `phone`, `is_active`, `lineid`, `bank_name`, `bank_id`, `userplus`, `usermwd`, `usertel`, `userreport`, `usersnl`, `userbankedit`, `userbsearch`, `usermedit`, `userreact`, `userbankonoff`, `userviewdeposit`, `userautostaff`, `userrecredit`, `userreduce`, `usernchange`, `userbyid`, `userupdatecredit`, `report_finance`) VALUES (0, '0', 'autobank', 'autobank', 'pgslotsDAS@#!$!@%SDFSDF', '1', 'autobank', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 0, 5, 1, 'ระบบอัตโนมัติ', '', NULL, '', 1, '', '014', '', '1', '1', '1', '1111111', '1', '1', '1', '1', '', '1', '1', '1', '0', '1', '1', 1, '1', 1);
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `newpass`, `usergroup`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `using_url`, `used_time`, `expire_time`, `stay_time`, `active`, `first_name`, `last_name`, `company`, `phone`, `is_active`, `lineid`, `bank_name`, `bank_id`, `userplus`, `usermwd`, `usertel`, `userreport`, `usersnl`, `userbankedit`, `userbsearch`, `usermedit`, `userreact`, `userbankonoff`, `userviewdeposit`, `userautostaff`, `userrecredit`, `userreduce`, `usernchange`, `userbyid`, `userupdatecredit`, `report_finance`) VALUES (1, '', 'admin', 'slo1', 'pgslot', '9', 'admin@dadas.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'credit_free_by_id_', 1626368529, 1626368649, 5, 1, 'Oh', 'Admin', NULL, '', 1, '', '014', '', '1', '1', '1', '1111111', '1', '1', '1', '1', '', '1', '1', '1', '1', '1', '1', 1, '1', 1);


