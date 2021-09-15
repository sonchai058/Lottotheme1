#
# TABLE STRUCTURE FOR: ci_sessions
#

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` char(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('03cjssvjjrn9i9ic9s6s957tjtlennik', '162.158.165.195', 1631011027, '__ci_last_regenerate|i:1631011027;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0a2g8o0fecvn942c7kikr1no105goqdt', '162.158.165.195', 1629345478, '__ci_last_regenerate|i:1629345478;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0b3t76cv25e57hc36d5n6kh8iathsvok', '162.158.165.195', 1630932796, '__ci_last_regenerate|i:1630932796;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0l84dek7jbmpparq7fnod62srqsbgv50', '162.158.165.195', 1631008458, '__ci_last_regenerate|i:1631008458;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0ll9jsedk07q372bsiee5ggl6945toim', '162.158.167.247', 1630900749, '__ci_last_regenerate|i:1630900749;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('0v8bj9sstvtolm4s5bh8m2cekebmjajs', '162.158.165.195', 1629341962, '__ci_last_regenerate|i:1629341962;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('13877h6l16l30l9m3qrpgbfsrtcebn3b', '162.158.165.195', 1631024122, '__ci_last_regenerate|i:1631023973;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1f52mc0b1skeder67glcd1o7rr9fk5dt', '162.158.165.195', 1631009851, '__ci_last_regenerate|i:1631009851;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1gv30mhalno1laa0klh1k1baem6ha8tp', '162.158.165.195', 1629221716, '__ci_last_regenerate|i:1629221716;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('1ocgn8evi54u4d3do83tnehtrdkqle30', '162.158.167.231', 1630997883, '__ci_last_regenerate|i:1630997883;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2e346v0ec29vnqd2e525t10hsqelqp9v', '162.158.165.195', 1631001492, '__ci_last_regenerate|i:1631001492;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2fjf42ok4qq14f41rsqlvub262dpjpjn', '162.158.167.247', 1629370767, '__ci_last_regenerate|i:1629370543;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2i10t01r0ne972vigm8gp8gc3jru2okh', '162.158.165.195', 1629216816, '__ci_last_regenerate|i:1629216816;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2ieeam3iv37j2sqb0tcoursif86b18lh', '172.68.144.86', 1631350285, '__ci_last_regenerate|i:1631350285;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2ism2f9hvje6rbcrmldr5f4kbpgaca8e', '162.158.165.195', 1629380294, '__ci_last_regenerate|i:1629380294;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2muf039h1giqimc7ahvi3uofeganfa7h', '162.158.165.195', 1630934095, '__ci_last_regenerate|i:1630934095;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('2vi2pt5s1vqf3rep20ao2gssi4hsvtu7', '162.158.165.195', 1629219801, '__ci_last_regenerate|i:1629219801;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('33gn3aaakblimhnccluan22uvmjpkmfb', '162.158.165.195', 1630990940, '__ci_last_regenerate|i:1630990940;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('356a7ckstv7r9vrpv8ld2684m04cra61', '162.158.165.195', 1629266382, '__ci_last_regenerate|i:1629266382;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('38p8milarblpf634n3cgn3vvon0q336d', '162.158.165.195', 1630991805, '__ci_last_regenerate|i:1630991805;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3bk6rc1gstglefet11fcvh89mepu50nb', '162.158.165.195', 1630917677, '__ci_last_regenerate|i:1630917677;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3qjrklqqp940jf8o50ksqo0msece5u8s', '162.158.165.195', 1631007180, '__ci_last_regenerate|i:1631007180;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('3qqd4taeuvbm56j3me6249apnce4r9ep', '162.158.167.155', 1631685842, '__ci_last_regenerate|i:1631685842;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('41mva0c2emurk71qpquil8luvbbclc30', '162.158.165.195', 1630989602, '__ci_last_regenerate|i:1630989602;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4c9bq44tl086mu75hu4unlci5hfpueiu', '162.158.165.195', 1631002693, '__ci_last_regenerate|i:1631002693;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4fnemgfoske3rhpt1qdvsefprhslolj7', '162.158.165.195', 1630986412, '__ci_last_regenerate|i:1630986412;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4n4chg7mqsej9to5tnr4fk4bna5t567l', '162.158.166.160', 1629218348, '__ci_last_regenerate|i:1629218348;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4o2k6d0vak8gjb7f6h2o51g8us3ktrdc', '162.158.165.195', 1629276295, '__ci_last_regenerate|i:1629276295;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4sihkdmsjdemogbbbnt3sujrjjut0hbu', '162.158.166.248', 1631071095, '__ci_last_regenerate|i:1631071095;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('4v5m2889ca32fs1f5rvu0suqq85o8ism', '162.158.165.195', 1629265994, '__ci_last_regenerate|i:1629265994;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('53a3fgsnqfta3lf0cbj351cogbc48ll3', '162.158.165.67', 1630899844, '__ci_last_regenerate|i:1630899844;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('54vf73np81gq804j33br6fj5mulrtr7k', '162.158.165.195', 1631074713, '__ci_last_regenerate|i:1631074713;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5hqv08mr8df026s2q9fg11pi8c0h14rp', '162.158.167.121', 1630303870, '__ci_last_regenerate|i:1630303870;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5k413jg948v3nh52u8ijea4r1f45dsjc', '162.158.165.195', 1629218357, '__ci_last_regenerate|i:1629218357;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('5k46iv95a08mp73uhm7ubirr34mbru1k', '162.158.165.195', 1631072858, '__ci_last_regenerate|i:1631072858;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('64eskfs10dljgi9u2u99mvk7n7enqpor', '162.158.165.195', 1629381719, '__ci_last_regenerate|i:1629381719;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('65hsfdbq32mgq4pklatuqdlrib99fkhd', '162.158.165.195', 1630918653, '__ci_last_regenerate|i:1630918653;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6b1uckia39h1g70h5jo1lij4d1u54fdo', '162.158.165.195', 1629383718, '__ci_last_regenerate|i:1629383718;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6gbuv34domnvjcgejogb9caf15o296c8', '162.158.165.195', 1629278536, '__ci_last_regenerate|i:1629278536;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6gitfcn823jou009d90en23q7ubb7ss8', '162.158.165.195', 1631073991, '__ci_last_regenerate|i:1631073991;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6hdj31s9q3bt5agr1fmptvug46a3252s', '162.158.165.195', 1630904568, '__ci_last_regenerate|i:1630904568;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6jqqcjljd16fgbcldtu6vsm8s54285de', '162.158.167.231', 1630998358, '__ci_last_regenerate|i:1630998358;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6lbhi8jk6tfa5amfjnprga3g6k7uikpl', '162.158.166.160', 1629222752, '__ci_last_regenerate|i:1629222699;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6nlm0o2gtnv0nnjqciqed64e0d4ibpvf', '162.158.165.195', 1629570517, '__ci_last_regenerate|i:1629570517;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('6s6r7o4313e13pq1c7att6ok19rclkpj', '162.158.167.247', 1630304088, '__ci_last_regenerate|i:1630303890;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('70in00olekfqeok1qs21hfp2kpbnai51', '162.158.165.195', 1629264915, '__ci_last_regenerate|i:1629264915;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('74c28ttv17rq99jm4dife0n3rcmfg7au', '162.158.165.195', 1629266984, '__ci_last_regenerate|i:1629266984;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7726qnj8t3n749okscdkm7sfpsvadeir', '162.158.165.139', 1629381650, '__ci_last_regenerate|i:1629381649;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7qaq4607rsn0elee82icf7v55m4v3tic', '162.158.165.139', 1629381651, '__ci_last_regenerate|i:1629381651;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('7tj01kdtf7i3mm0mjn96ofiuqt6n3v52', '162.158.165.195', 1629384042, '__ci_last_regenerate|i:1629384042;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('80gjl398ldp4pum6rj7uag6r3i4jifc2', '162.158.165.195', 1630932447, '__ci_last_regenerate|i:1630932447;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('812s6qk7hrjed0m657cppie94g4cl3sd', '162.158.165.195', 1629345127, '__ci_last_regenerate|i:1629345127;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('82ducm9pmtiqmmgce55jnf444tuhsqf4', '162.158.167.247', 1630995206, '__ci_last_regenerate|i:1630995206;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('88fviq6q1h6bgcbqpfmotns4lhe37s26', '162.158.165.195', 1630916408, '__ci_last_regenerate|i:1630916408;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8jgvmcb4m1g0tcnno2qmdf418bj08ia3', '172.68.144.86', 1631348708, '__ci_last_regenerate|i:1631348708;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('8s0h612uqgpopfj8n3eju3l9q76vt4sc', '162.158.165.195', 1630914941, '__ci_last_regenerate|i:1630914941;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('92jug5b7lmiuf7k2ilrv3njrir1dn09l', '162.158.165.195', 1631032331, '__ci_last_regenerate|i:1631032331;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9cgdiog253vb7paoeie1j7bdulh1tta0', '162.158.165.195', 1631071813, '__ci_last_regenerate|i:1631071813;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('9nc93gtl2jsi2j1ucr93rs6mrh4dq9l6', '162.158.165.195', 1629342807, '__ci_last_regenerate|i:1629342807;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a6b6sjbbenidk5b8crhbhqnaovaunm68', '162.158.165.67', 1630305530, '__ci_last_regenerate|i:1630305530;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('a8c1alrljatrt5vq39mvffqhqs5ct8qt', '162.158.165.195', 1630930609, '__ci_last_regenerate|i:1630930609;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('aadjfrt554ncap6tah3986d2egiij4td', '162.158.165.195', 1631023357, '__ci_last_regenerate|i:1631023357;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('akp1mmg8kedafco8sh3prl8qouk6h28i', '162.158.165.195', 1629370543, '__ci_last_regenerate|i:1629370543;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('amrfujmsamggvtsovlp074vpn86c0m33', '162.158.165.195', 1629281332, '__ci_last_regenerate|i:1629281332;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('aro13m4u6ma6k95rsmb2gvcpc8idaksm', '162.158.165.195', 1631023973, '__ci_last_regenerate|i:1631023973;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('b776n4atrjdsi3ucusvfc11490umff3k', '162.158.165.195', 1629260465, '__ci_last_regenerate|i:1629260465;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('bcvd7upju1846hhngn0ea2oesskb9of3', '162.158.165.195', 1631002176, '__ci_last_regenerate|i:1631002176;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('btol506smlsd7s2l0qhifin3uqute2f9', '162.158.165.195', 1629274479, '__ci_last_regenerate|i:1629274479;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cd1f320s7duo4ioi59kjh75hqo8cia5t', '162.158.165.195', 1630916822, '__ci_last_regenerate|i:1630916822;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('coue065r1v6mjb4r6m068h7cio0o0bgi', '162.158.165.195', 1629567544, '__ci_last_regenerate|i:1629567544;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cuf6b9jj0td1b6sb2drrf019fed50kmv', '162.158.167.247', 1630305199, '__ci_last_regenerate|i:1630305199;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"new\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('cv2egq18rk1tott47r573b3iiq6vravv', '162.158.165.195', 1629258771, '__ci_last_regenerate|i:1629258771;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('d4i6q8h4cjnka9mqlp0ilevtpv1ajf5s', '162.158.165.195', 1631005077, '__ci_last_regenerate|i:1631005077;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dgfhtdf1orvgn6pd0qdogl0dldu28ds6', '162.158.165.195', 1629344071, '__ci_last_regenerate|i:1629344071;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dk5konnshpketg6akr905ot8cmfa0sb4', '162.158.165.195', 1631031961, '__ci_last_regenerate|i:1631031961;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('du0td1ardd36thdi7mit8nte4am4q3dh', '162.158.165.195', 1629271120, '__ci_last_regenerate|i:1629271120;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('dufmpg0tcl7c5i4t2ilbs9o3jktous9j', '162.158.165.139', 1630314843, '__ci_last_regenerate|i:1630314837;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e4861qlc70rskb91vrnpo5b6asjbt7nr', '162.158.165.195', 1631018831, '__ci_last_regenerate|i:1631018831;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e6b8oih0l8drpi06rmq028mb0u8mu1l1', '162.158.165.195', 1630919097, '__ci_last_regenerate|i:1630919097;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('e6vekk90mdd96lj02gmnkhppfn2e7qul', '162.158.165.19', 1630303870, '__ci_last_regenerate|i:1630303870;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ec2goem7qrfb6nq2db44musgmh8l7jrt', '162.158.167.231', 1630996976, '__ci_last_regenerate|i:1630996976;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('eqoag6pj7n66t622fi78va6kmj60o0f8', '162.158.165.67', 1629378247, '__ci_last_regenerate|i:1629378242;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f0qepq4amc1d4apf9pj014o067eabu3l', '162.158.165.195', 1631074865, '__ci_last_regenerate|i:1631074713;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f1ojspav9s1m40ocrajrttstnhbpudu7', '162.158.165.53', 1630575718, '__ci_last_regenerate|i:1630575718;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"new\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f42n30i90jf11kn5ulhhqhiusd85hj3t', '162.158.165.195', 1630925300, '__ci_last_regenerate|i:1630925300;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('f8d52pjds3k65ic73h9l1vcvrb6v2psp', '162.158.165.195', 1630931444, '__ci_last_regenerate|i:1630931444;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fefdmbvq8ee931pl7uupkffdaosdhefr', '162.158.165.195', 1629567482, '__ci_last_regenerate|i:1629567482;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('fraengovheijgbqpvah7bs85q1ik6smv', '162.158.165.195', 1630931802, '__ci_last_regenerate|i:1630931802;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('g4atetnc1rn3klaborai4bt51m7tbpnb', '162.158.167.231', 1629381404, '__ci_last_regenerate|i:1629381404;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('g5gictt6l4muq9o03e3hdi6p6k4393ah', '162.158.165.195', 1629341223, '__ci_last_regenerate|i:1629341223;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('gbklb5lbsclps1bhs4mj3sajto88dsfm', '162.158.165.195', 1630912238, '__ci_last_regenerate|i:1630912238;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('gh3ijq4486cmdmsg98btian94bhj8qsu', '162.158.165.195', 1631350285, '__ci_last_regenerate|i:1631350285;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ghttslo1krtpnjbpe5uvho2t1chcp4cf', '162.158.165.195', 1629278233, '__ci_last_regenerate|i:1629278233;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('glkocb5ptd4o6uci2og1351sqjju896f', '162.158.165.195', 1630917986, '__ci_last_regenerate|i:1630917986;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('gp8afr5tkkiarsnq99iius797i0s91mf', '162.158.165.195', 1630988810, '__ci_last_regenerate|i:1630988810;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('gqs6obq8atdmmtog4q1ed1ggeo2t8b89', '162.158.165.195', 1629272643, '__ci_last_regenerate|i:1629272643;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('gv55ur0f8de7pilj19tuhk8m9mqm2cqv', '162.158.165.195', 1629387095, '__ci_last_regenerate|i:1629387095;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('h65pv9mri88sgb40rbpvtpvh5h6uv96q', '162.158.165.195', 1629378544, '__ci_last_regenerate|i:1629378544;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('h7j0166ldarfsv14fa1qdkvg602ngd3r', '162.158.166.110', 1629216828, '__ci_last_regenerate|i:1629216816;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hb3c2gk7om8nbtdp8pjt48esq0q2b8j3', '162.158.165.195', 1630919954, '__ci_last_regenerate|i:1630919954;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hbt34apkd5k23ma2j2opi5natojcuf9c', '162.158.165.195', 1629274863, '__ci_last_regenerate|i:1629274863;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hdq1pfrsr2rquncfrlcb6kka7m353cqo', '162.158.165.195', 1630986071, '__ci_last_regenerate|i:1630986071;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hfde6c7e34lihh1vegrev7uan99o083k', '162.158.165.195', 1629281634, '__ci_last_regenerate|i:1629281634;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hid37t091imt8vkpamqeoled2s2rcjee', '162.158.165.195', 1631010960, '__ci_last_regenerate|i:1631010960;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('huc6fq34d9klib0f22uagb7o3fei28vl', '172.68.144.86', 1629870639, '__ci_last_regenerate|i:1629870639;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('hukofsq0gl5v8tqfdlrvmaima33s1rso', '162.158.166.160', 1629255656, '__ci_last_regenerate|i:1629255656;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('i76pvoh8a14hi2rhnt4gdhlauuvvb0qt', '162.158.165.195', 1630906616, '__ci_last_regenerate|i:1630906616;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('i9v016tu8mvmroneg850547vui5dbr62', '162.158.165.195', 1631516481, '__ci_last_regenerate|i:1631516481;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('i9vjhb851d1qfe389d8p2at3uoa1k8rq', '162.158.165.195', 1631018752, '__ci_last_regenerate|i:1631018654;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ie1onkn8a8fee5hbavciambgk8tfc2d1', '162.158.165.195', 1631032331, '__ci_last_regenerate|i:1631032331;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ilpnb3t8ptj13t11mmslir9si00vjofm', '162.158.165.195', 1631009851, '__ci_last_regenerate|i:1631009851;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('j39hp0eod74turmlh2r9fgbevdakqq6i', '162.158.165.195', 1630985402, '__ci_last_regenerate|i:1630985402;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('jbvv8b5tv7khetu07v5mug18lts1jgvi', '162.158.165.195', 1631010526, '__ci_last_regenerate|i:1631010526;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('jdbcotak03uraqb6fi916geu7kjsd258', '162.158.165.195', 1631073244, '__ci_last_regenerate|i:1631073244;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('jpmevo83eov21p1p12onqk9ukcr306l4', '162.158.165.195', 1629270135, '__ci_last_regenerate|i:1629270135;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('k68vmh8sgbac6qpvka8fnvb4mtl19h8o', '162.158.165.195', 1629222317, '__ci_last_regenerate|i:1629222317;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('k9d3nljf6ojvdclc57ipr5ut4uquiol7', '162.158.165.195', 1629257175, '__ci_last_regenerate|i:1629257175;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('kbfegm06fdpgivh4vq99cu6anopf3n85', '162.158.165.195', 1629378887, '__ci_last_regenerate|i:1629378887;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('kfnkklh9t3pl5gqge5bopdgjo9ghn7ia', '162.158.165.195', 1631008108, '__ci_last_regenerate|i:1631008108;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('kj9h4qm33grp30kf6mnics3h98mpq8ef', '162.158.167.231', 1629379721, '__ci_last_regenerate|i:1629379721;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('kk2e3f09hs4ulfcvuo1u1aqf995nab6k', '162.158.165.195', 1629281744, '__ci_last_regenerate|i:1629281634;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('km51r51ft7u1l03kjn8jf4a4e40gn5h6', '162.158.165.195', 1630991496, '__ci_last_regenerate|i:1630991496;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('kodoq5o01j0hulsrkt6d7tr53hanh33l', '162.158.165.195', 1629345791, '__ci_last_regenerate|i:1629345791;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ktvosvakbu22mkdf8tb8q4mfaqltk7k6', '162.158.165.195', 1630934467, '__ci_last_regenerate|i:1630934467;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('l2s12miaa3l8fdmdnkefr7nvd9lj8057', '162.158.165.195', 1629218349, '__ci_last_regenerate|i:1629218349;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('l589mn3jl3qavck3cqdaj9gc1fhmblpf', '162.158.165.195', 1629382817, '__ci_last_regenerate|i:1629382817;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('l656nk56dtaprmmkn9esjjfk2jietcdf', '162.158.165.195', 1629214936, '__ci_last_regenerate|i:1629214936;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('le3jjcambignd2okl8ufmmknldkpmu8j', '162.158.165.195', 1630915513, '__ci_last_regenerate|i:1630915513;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('lgbfo5im3th3h1s2qdqepuh8b41mdfh5', '162.158.167.155', 1631686549, '__ci_last_regenerate|i:1631686367;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('lkbeefsumvt4609frop0d5tfgd9bn8tb', '162.158.165.195', 1629264252, '__ci_last_regenerate|i:1629264252;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('lkhd5stv6ri078f3vl3v6tt5gst9u610', '162.158.165.195', 1629276700, '__ci_last_regenerate|i:1629276700;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('lljnijfl8ud7ouq4e03phlenem3kkdkb', '162.158.165.195', 1630919401, '__ci_last_regenerate|i:1630919401;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('lng2livvu521snl2o230fbcrgknnuaot', '162.158.178.134', 1629570517, '__ci_last_regenerate|i:1629570517;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('m5mclk3i3jm1sitqnfj5qjjml54rnnk5', '162.158.165.195', 1630925302, '__ci_last_regenerate|i:1630925300;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mdvanf9lnsh4fdpos44lnlmo8sgmpa7p', '162.158.165.195', 1631009056, '__ci_last_regenerate|i:1631009056;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mp2kssvhk57c2k9chmvh33vv2mrflb91', '162.158.165.195', 1631010091, '__ci_last_regenerate|i:1631010091;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mpr1hl9nnoaa7dq765h6ofcj104m3n7a', '162.158.167.231', 1630997525, '__ci_last_regenerate|i:1630997525;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mqq51flgchh41ivif9qn371gvfju5n0j', '162.158.165.195', 1629215597, '__ci_last_regenerate|i:1629215597;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('muqnkgvu4klqqdapfrukrkeca0o9ovff', '162.158.165.195', 1631031962, '__ci_last_regenerate|i:1631031961;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('mvagc5l6jjucn07vtd0ebbl1smmb5o6a', '162.158.165.195', 1629381659, '__ci_last_regenerate|i:1629381659;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('naehfc4ridlecaicumvqhm0eog8vep9a', '162.158.167.231', 1631001161, '__ci_last_regenerate|i:1631001161;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('nr9rss7jpe3uji5dut9do8pl73q40s82', '162.158.165.195', 1630918327, '__ci_last_regenerate|i:1630918327;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('o0rmci89987mblfievgicr9tv6ifif1t', '162.158.165.195', 1629270437, '__ci_last_regenerate|i:1629270437;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('o88mad66j3dk2ih70chsn9kius0m358i', '162.158.165.195', 1629265605, '__ci_last_regenerate|i:1629265605;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ob75d2nisj99qk1dpmfgn0q20venmibl', '162.158.165.195', 1631018654, '__ci_last_regenerate|i:1631018654;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('of1fkjkfm1pthkjknq1nhrjauek4085m', '162.158.165.139', 1629379389, '__ci_last_regenerate|i:1629379389;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('omg8m499jdduv2d77ov035q7ic1s46dh', '162.158.165.195', 1629341639, '__ci_last_regenerate|i:1629341639;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ou1ojs5snffgl8pot0ocaaj0s75eno7q', '162.158.165.195', 1629258909, '__ci_last_regenerate|i:1629258909;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('p770lemuug5ab32qg8q4f136ceodkngg', '162.158.165.195', 1629277181, '__ci_last_regenerate|i:1629277181;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pa3eg4cdagjiqd5p0d6c9adbk25qog94', '162.158.165.195', 1631008698, '__ci_last_regenerate|i:1631008698;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pd3ijtc5q513psmfnacl2ocfv86r4j2e', '162.158.165.195', 1629222699, '__ci_last_regenerate|i:1629222699;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pkut64vldv0o170lrt3cvleaj1t9l5cp', '162.158.166.160', 1629218349, '__ci_last_regenerate|i:1629218349;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pnkgjld8qv7b9hv58f3o9j72h7nej3qs', '162.158.165.139', 1629380675, '__ci_last_regenerate|i:1629380674;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"old\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pt03i16lm44qn13h9qjgp7fpu97646be', '162.158.165.195', 1630924256, '__ci_last_regenerate|i:1630924256;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('pv176uf4oofkai0d8c2917h4elpi470e', '162.158.167.231', 1629380294, '__ci_last_regenerate|i:1629380294;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('q00rf0b1nk1v4nlf58hg1qrggt2vfg29', '162.158.165.195', 1629342277, '__ci_last_regenerate|i:1629342277;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('q0v5s7g4oldvv41uul1nr1r6j131nhb8', '162.158.165.161', 1629254869, '__ci_last_regenerate|i:1629254843;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('q2qm87lonv9bnbjmq4nh6f0iolcn4qp1', '162.158.165.195', 1630932128, '__ci_last_regenerate|i:1630932128;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('q81rbg98qr3iadttpjdbucsvno4o34go', '162.158.165.195', 1629370158, '__ci_last_regenerate|i:1629370158;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qa2c3g976emms2feh8epc0t6q47m4diu', '162.158.165.195', 1630992726, '__ci_last_regenerate|i:1630992726;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qa2uvt11f5ejai176g7v343t4ltj4vsr', '162.158.165.37', 1631627505, '__ci_last_regenerate|i:1631627505;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"new\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qdovq2rkc83uatutgb3a0n7gkk476lmi', '162.158.165.195', 1629382055, '__ci_last_regenerate|i:1629382055;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qhcr0dcpc8rf0kjebeo25e2difgls7hk', '162.158.165.195', 1629257834, '__ci_last_regenerate|i:1629257834;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qj9vipgbpn9niim88rs53fucmm10u79j', '162.158.165.195', 1629386947, '__ci_last_regenerate|i:1629386947;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qu5h1ja3bmvbit4isj1n7qv6evpofpdi', '162.158.165.195', 1629219801, '__ci_last_regenerate|i:1629219801;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('qv036he9don9e7r9iasvh2o2vn930fp9', '162.158.165.195', 1630934735, '__ci_last_regenerate|i:1630934467;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('r2jgrd58llae91lp2p3131c8kh01kpun', '162.158.165.195', 1630909485, '__ci_last_regenerate|i:1630909485;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('rbipic9e8b1ut7uj2f3bonbi7d6ifi3t', '162.158.165.195', 1630914035, '__ci_last_regenerate|i:1630914035;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('rd1bfujpgc12eq0tplmtsnlcpq9nppnf', '162.158.165.195', 1629272944, '__ci_last_regenerate|i:1629272944;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('rjvp1od57udbn5l3et3u50agvf3erfep', '162.158.165.195', 1630990476, '__ci_last_regenerate|i:1630990476;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('s5rb3ii0mdqsjvni2hvnaiv6bl29erdm', '162.158.165.195', 1631003051, '__ci_last_regenerate|i:1631003051;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('sfj7d26ati8ev6k95qmclrlnvsv0pag7', '162.158.165.195', 1629279572, '__ci_last_regenerate|i:1629279572;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('sh64kt7sjjbs7e4r6u2c10cd1vgsh4er', '162.158.165.195', 1631017238, '__ci_last_regenerate|i:1631017238;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('smadm0qkptpoft7dt19jil9m6hfgcoe6', '162.158.165.195', 1629343678, '__ci_last_regenerate|i:1629343678;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('spk16mj324hopee191c61se5b5gs0mfp', '162.158.165.195', 1629345791, '__ci_last_regenerate|i:1629345791;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('srjcn55mjui91g5svpcgu66c2ve3m4uu', '162.158.165.195', 1629258158, '__ci_last_regenerate|i:1629258158;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('strkac0hfo8v7ob9tj8r10ursigo9vo4', '162.158.165.195', 1630933567, '__ci_last_regenerate|i:1630933567;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('t1cqpalklvhpiisi3sk3h0mb276en487', '162.158.165.195', 1631348708, '__ci_last_regenerate|i:1631348708;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('t3u720s3el0o2n9g3khcjdlh5kktg975', '162.158.165.195', 1630922638, '__ci_last_regenerate|i:1630922638;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tabpv8j2sssbof26a0pnae2spg0ufpvc', '162.158.165.195', 1630901243, '__ci_last_regenerate|i:1630901243;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tb9i0ql9ofu5cnq3ckem4vb4l57tii30', '172.68.144.86', 1630575688, '__ci_last_regenerate|i:1630575688;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tcginbm6st0i852o5kssb90nvi9k58cq', '162.158.165.195', 1631006674, '__ci_last_regenerate|i:1631006674;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ti6dj6ql31bitbgpdbuhlsnemdp4rjs0', '162.158.165.195', 1631686367, '__ci_last_regenerate|i:1631686367;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tm2qe6of2uamd293biqvke2h18e2f3sq', '162.158.166.160', 1629216511, '__ci_last_regenerate|i:1629216511;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"new\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tnpu9h8cg2hho122tlchf6duqcfp71cs', '162.158.165.195', 1630985767, '__ci_last_regenerate|i:1630985767;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('tpe4ikg2pgckd8uhr55anvlb902m6ug3', '162.158.165.195', 1629277840, '__ci_last_regenerate|i:1629277840;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('u398utegri1m5knevu0vviunauvllrkp', '162.158.165.195', 1629215377, '__ci_last_regenerate|i:1629215377;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('u48079elosrelgc5eop93ud0904vj54u', '162.158.165.195', 1630933187, '__ci_last_regenerate|i:1630933187;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('udl3572re3j39ldkfvkte33279llsq95', '162.158.165.195', 1629214772, '__ci_last_regenerate|i:1629214772;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('uiugmdtthchh37m25424fago0u73qf5b', '162.158.165.161', 1629222424, '__ci_last_regenerate|i:1629222424;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"old\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('ujqtt4ulbdjr6pl1jiuiubbkiiu65fob', '162.158.166.46', 1629870672, '__ci_last_regenerate|i:1629870672;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"new\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('uo0ijeemk40dir3okjvhkprm649cafar', '162.158.165.195', 1629384042, '__ci_last_regenerate|i:1629384042;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('uo5115e3gktp97ffjvp8u5h2bqt5b6cm', '162.158.165.195', 1629258474, '__ci_last_regenerate|i:1629258474;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('uunep719fqvfr3cf2cgtovjo5fbefcee', '162.158.165.67', 1630303866, '__ci_last_regenerate|i:1630303865;err_message|s:49:\"กรุณาเข้าสู่ระบบ!\";__ci_vars|a:1:{s:11:\"err_message\";s:3:\"old\";}');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('v8hgmp19vanvb85mh8n8l8edgcbv1m0i', '162.158.165.195', 1630922330, '__ci_last_regenerate|i:1630922330;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('vepb324c7nbhripq6fg5mficks0es5bg', '162.158.165.195', 1629382327, '__ci_last_regenerate|i:1629382327;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('vfitcnmbsppmfihskm5bvc9bvso4tvfd', '162.158.165.195', 1629382381, '__ci_last_regenerate|i:1629382381;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('vk1mf6uhrrighnl0nkqrttv5j7i2n8qe', '172.68.144.86', 1631348708, '__ci_last_regenerate|i:1631348708;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('vk9ab8u4adcjsk28h0v9ni323i19ugh3', '162.158.165.195', 1630990155, '__ci_last_regenerate|i:1630990155;');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('vnn7283ncl0td8bbkg4k835gnha759hm', '162.158.165.195', 1629277482, '__ci_last_regenerate|i:1629277482;usess|O:8:\"stdClass\":30:{s:2:\"id\";s:1:\"1\";s:12:\"phone_number\";s:10:\"0955555555\";s:4:\"name\";s:4:\"test\";s:7:\"surname\";s:10:\"testwallet\";s:7:\"line_id\";s:1:\"0\";s:10:\"regis_date\";s:19:\"2021-02-22 22:00:42\";s:8:\"regis_ip\";s:39:\"2403:6200:8853:86e8:b869:5dd3:4393:967b\";s:5:\"level\";s:1:\"0\";s:10:\"referer_id\";N;s:13:\"get_affiliate\";s:1:\"0\";s:14:\"get_affiliate2\";s:1:\"0\";s:11:\"promotion_1\";s:1:\"0\";s:11:\"promotion_2\";s:1:\"0\";s:11:\"turn_status\";s:1:\"0\";s:16:\"topup_first_time\";s:1:\"0\";s:10:\"regis_form\";s:5:\"login\";s:5:\"point\";s:1:\"0\";s:5:\"bonus\";s:1:\"0\";s:8:\"password\";s:8:\"Aa123456\";s:20:\"default_topup_wallet\";s:1:\"0\";s:6:\"status\";s:1:\"2\";s:13:\"referer_bonus\";s:1:\"0\";s:11:\"usercomment\";s:0:\"\";s:12:\"bonus_status\";s:1:\"0\";s:11:\"turn_amount\";s:1:\"0\";s:20:\"max_withdraw_by_turn\";s:1:\"0\";s:11:\"aff_booking\";s:1:\"0\";s:12:\"aff_reg_code\";s:8:\"QCCCCCCD\";s:13:\"idscode_front\";s:13:\"1597531234525\";s:12:\"idscode_back\";s:12:\"RD0111111111\";}bank_idshow|s:3:\"014\";');
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES ('vvto6ns501igft7u2pkbi5ivo2julir7', '162.158.165.195', 1630911687, '__ci_last_regenerate|i:1630911687;');


#
# TABLE STRUCTURE FOR: tb_affiliate
#

DROP TABLE IF EXISTS `tb_affiliate`;

CREATE TABLE `tb_affiliate` (
  `referer_id` int(11) NOT NULL,
  `referee_id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `regis_form` varchar(255) DEFAULT 'friend',
  `topup` decimal(11,2) DEFAULT 0.00,
  `reward` decimal(11,2) DEFAULT 0.00,
  `status` int(1) DEFAULT 0,
  `withdraw_lessthan` decimal(11,2) DEFAULT 0.00,
  `withdraw_morethan` decimal(11,2) DEFAULT 0.00,
  `allow_withdraw` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_affiliate_link_count
#

DROP TABLE IF EXISTS `tb_affiliate_link_count`;

CREATE TABLE `tb_affiliate_link_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `referer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_affiliate_link_count_detail
#

DROP TABLE IF EXISTS `tb_affiliate_link_count_detail`;

CREATE TABLE `tb_affiliate_link_count_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referer_id` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_agent_1_account
#

DROP TABLE IF EXISTS `tb_agent_1_account`;

CREATE TABLE `tb_agent_1_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL COMMENT 'relationship with id key in tb_member_account',
  `status` int(1) DEFAULT 0 COMMENT '0 inactive; 1 active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_agent_2_account
#

DROP TABLE IF EXISTS `tb_agent_2_account`;

CREATE TABLE `tb_agent_2_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL COMMENT 'relationship with id key in tb_member_account',
  `status` int(1) DEFAULT 0 COMMENT '0 inactive; 1 active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_agent_2_account` (`id`, `username`, `userid`, `password`, `member_id`, `status`) VALUES (1, 'imin7000001', '', 'Aa123456', 1, 1);


#
# TABLE STRUCTURE FOR: tb_agent_3_account
#

DROP TABLE IF EXISTS `tb_agent_3_account`;

CREATE TABLE `tb_agent_3_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL COMMENT 'relationship with id key in tb_member_account',
  `status` int(1) DEFAULT 0 COMMENT '0 inactive; 1 active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_agent_3_account` (`id`, `username`, `userid`, `password`, `member_id`, `status`) VALUES (1, 'ufiocx88s2000001', '', 'Aa123456', 1, 1);


#
# TABLE STRUCTURE FOR: tb_ban_ip
#

DROP TABLE IF EXISTS `tb_ban_ip`;

CREATE TABLE `tb_ban_ip` (
  `ip` varchar(255) DEFAULT NULL,
  `ban_time` int(20) DEFAULT NULL,
  `ban_until` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_credit_free_member
#

DROP TABLE IF EXISTS `tb_credit_free_member`;

CREATE TABLE `tb_credit_free_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `credit_id` int(11) NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `react_staffid` varchar(10) NOT NULL,
  `links` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `tb_credit_free_member` (`id`, `member_id`, `amount`, `credit_id`, `update_time`, `react_staffid`, `links`, `status`) VALUES (1, 1, '20.00', 1, '2021-07-15 18:08:21', '0', '{\"1\":\"facebook.com\\/a\",\"2\":\"facebook.com\\/b\"}', 1);


#
# TABLE STRUCTURE FOR: tb_log
#

DROP TABLE IF EXISTS `tb_log`;

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `create_date` date NOT NULL,
  `testsss` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_manual_transection
#

DROP TABLE IF EXISTS `tb_manual_transection`;

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

#
# TABLE STRUCTURE FOR: tb_member_account
#

DROP TABLE IF EXISTS `tb_member_account`;

CREATE TABLE `tb_member_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `surname` varchar(80) DEFAULT NULL,
  `line_id` varchar(80) DEFAULT NULL,
  `regis_date` datetime DEFAULT NULL,
  `regis_ip` varchar(80) DEFAULT NULL,
  `level` int(11) DEFAULT 0 COMMENT '0: ธรรมดา, 1: VIP, 2: VIP Premuim',
  `referer_id` int(11) DEFAULT NULL,
  `get_affiliate` int(11) NOT NULL COMMENT '0: ยังไม่ได้รับ,1: กดรับไปแล้ว',
  `get_affiliate2` int(11) NOT NULL COMMENT '0: ยังไม่ได้รับ,1: รับไปแล้ว',
  `promotion_1` int(22) NOT NULL DEFAULT 0,
  `promotion_2` int(22) NOT NULL DEFAULT 0,
  `turn_status` int(22) NOT NULL DEFAULT 0,
  `topup_first_time` int(1) DEFAULT 0 COMMENT '0 Not topup and get bonut yet , 1  topup first time',
  `regis_form` varchar(255) DEFAULT NULL,
  `point` int(11) DEFAULT 0,
  `bonus` int(11) DEFAULT 0 COMMENT '0 Deactive, 1 Active',
  `password` varchar(25) DEFAULT NULL,
  `default_topup_wallet` int(1) DEFAULT 0 COMMENT '0 Wallet; 1 SlotXO; 2 Live22',
  `status` int(1) DEFAULT 2,
  `referer_bonus` int(1) NOT NULL DEFAULT 0 COMMENT '1 Can Get Bonus from this User, 0 Already Get or Not allow to get.',
  `usercomment` text NOT NULL,
  `bonus_status` int(11) NOT NULL DEFAULT 0 COMMENT '0: รับ,1: ไม่รับ',
  `turn_amount` varchar(80) NOT NULL,
  `max_withdraw_by_turn` int(11) NOT NULL COMMENT 'กรณี ถอนสูงสุดของยอดเทิร์น ถ้าถอนแล้ว จะได้เท่านี้',
  `aff_booking` int(11) NOT NULL COMMENT '0: ยังไม่ได้นับเป็นการจอง, 1: นับว่าจอง ไปแล้ว',
  `aff_reg_code` varchar(80) NOT NULL COMMENT 'รหัสสมัคร affiliate',
  `idscode_front` varchar(80) NOT NULL,
  `idscode_back` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `tb_member_account` (`id`, `phone_number`, `name`, `surname`, `line_id`, `regis_date`, `regis_ip`, `level`, `referer_id`, `get_affiliate`, `get_affiliate2`, `promotion_1`, `promotion_2`, `turn_status`, `topup_first_time`, `regis_form`, `point`, `bonus`, `password`, `default_topup_wallet`, `status`, `referer_bonus`, `usercomment`, `bonus_status`, `turn_amount`, `max_withdraw_by_turn`, `aff_booking`, `aff_reg_code`, `idscode_front`, `idscode_back`) VALUES (1, '0955555555', 'test', 'testwallet', '0', '2021-02-22 22:00:42', '2403:6200:8853:86e8:b869:5dd3:4393:967b', 0, NULL, 0, 0, 0, 0, 0, 0, 'login', 0, 0, 'Aa123456', 0, 2, 0, '', 0, '0', 0, 0, 'QCCCCCCD', '1597531234525', 'RD0111111111');


#
# TABLE STRUCTURE FOR: tb_member_aff_wallet
#

DROP TABLE IF EXISTS `tb_member_aff_wallet`;

CREATE TABLE `tb_member_aff_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `wallet_balance` decimal(11,2) DEFAULT 10.00,
  `wallet_balance_2` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_member_aff_wallet` (`id`, `member_id`, `wallet_balance`, `wallet_balance_2`) VALUES (1, 1, '0.00', '0.00');


#
# TABLE STRUCTURE FOR: tb_member_bank_account
#

DROP TABLE IF EXISTS `tb_member_bank_account`;

CREATE TABLE `tb_member_bank_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_account_number` varchar(30) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_id` varchar(10) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_member_bank_account` (`id`, `bank_account_number`, `bank_name`, `bank_id`, `member_id`, `name`, `surname`) VALUES (1, '1111111111', 'SCB', '014', 1, 'test', 'testwallet');


#
# TABLE STRUCTURE FOR: tb_member_before_withdraw
#

DROP TABLE IF EXISTS `tb_member_before_withdraw`;

CREATE TABLE `tb_member_before_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_member_bonus
#

DROP TABLE IF EXISTS `tb_member_bonus`;

CREATE TABLE `tb_member_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `min_withdraw_amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_member_credit_summary
#

DROP TABLE IF EXISTS `tb_member_credit_summary`;

CREATE TABLE `tb_member_credit_summary` (
  `member_id` int(20) NOT NULL,
  `total_deposit` decimal(10,2) DEFAULT 0.00,
  `total_withdraw` decimal(10,2) DEFAULT 0.00,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_member_deposit_aff
#

DROP TABLE IF EXISTS `tb_member_deposit_aff`;

CREATE TABLE `tb_member_deposit_aff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0: ยังไม่ได้รับ,1: รับเรียบร้อยแล้ว',
  `actor_id` int(11) NOT NULL,
  `memo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_member_deposit_bonus_log
#

DROP TABLE IF EXISTS `tb_member_deposit_bonus_log`;

CREATE TABLE `tb_member_deposit_bonus_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0 Waiting; 1 Success; 2 Have problem',
  `get_bonus` int(11) NOT NULL COMMENT '0: no, 1: yes',
  `memo` text DEFAULT NULL,
  `promotion_id` int(11) NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `deposit_log_id` int(11) DEFAULT NULL,
  `react_staffid` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# TABLE STRUCTURE FOR: tb_member_deposit_log
#

DROP TABLE IF EXISTS `tb_member_deposit_log`;

CREATE TABLE `tb_member_deposit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `previous_balance` decimal(11,2) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0 Waiting; 1 Success; 2 Have problem,9 Hold',
  `memo` text DEFAULT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `is_bonus` int(1) DEFAULT 0 COMMENT '1 Used for bonus',
  `used_bonus` int(11) NOT NULL COMMENT '0: no api deposit, 1: success',
  `bonus_amount` decimal(11,2) NOT NULL,
  `is_manual` int(1) DEFAULT 0 COMMENT '0 Auto, 1 Manual',
  `manual_time` datetime DEFAULT NULL,
  `transection_no` varchar(100) DEFAULT NULL,
  `actor_id` int(3) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# TABLE STRUCTURE FOR: tb_member_history_logs
#

DROP TABLE IF EXISTS `tb_member_history_logs`;

CREATE TABLE `tb_member_history_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `success` varchar(255) NOT NULL,
  `action` varchar(1000) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `b_credit` varchar(255) NOT NULL,
  `amount` text NOT NULL,
  `a_credit` varchar(255) NOT NULL,
  `userid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (1, 'OK', 'Wallet_Update', '1', '0.00', '50.00', '50.00', 'Trigger', '2021-06-01 00:29:16');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (2, 'OK', 'Wallet_Update', '1', '50.00', '-50.00', '0.00', 'Trigger', '2021-06-01 00:29:23');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (3, 'OK', 'Wallet_Update', '1', '0.00', '20.00', '20.00', 'Trigger', '2021-07-15 23:42:21');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (4, 'OK', 'Wallet_Update', '1', '20.00', '20.00', '40.00', 'Trigger', '2021-07-15 23:49:30');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (5, 'OK', 'Wallet_Update', '1', '40.00', '-40.00', '0.00', 'Trigger', '2021-08-02 15:10:19');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (6, 'OK', 'Wallet_Update', '1', '0.00', '40.00', '40.00', 'Trigger', '2021-08-02 15:11:30');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (7, 'OK', 'Wallet_Update', '1', '40.00', '-40.00', '0.00', 'Trigger', '2021-08-02 15:11:46');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (8, 'OK', 'Wallet_Update', '1', '0.00', '40.00', '40.00', 'Trigger', '2021-08-02 15:12:35');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (9, 'OK', 'Wallet_Update', '1', '40.00', '-4.00', '36.00', 'Trigger', '2021-08-02 15:15:02');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (10, 'OK', 'Wallet_Update', '1', '36.00', '4.00', '40.00', 'Trigger', '2021-08-02 15:15:30');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (11, 'OK', 'Wallet_Update', '1', '40.00', '-3.00', '37.00', 'Trigger', '2021-08-02 15:19:23');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (12, 'OK', 'Wallet_Update', '1', '37.00', '-1.00', '36.00', 'Trigger', '2021-08-08 23:45:45');
INSERT INTO `tb_member_history_logs` (`id`, `success`, `action`, `member_id`, `b_credit`, `amount`, `a_credit`, `userid`, `time_start`) VALUES (13, 'OK', 'Wallet_Update', '1', '36.00', '-1.00', '35.00', 'Trigger', '2021-08-08 23:56:30');


#
# TABLE STRUCTURE FOR: tb_member_login_log
#

DROP TABLE IF EXISTS `tb_member_login_log`;

CREATE TABLE `tb_member_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_ip` varchar(255) DEFAULT NULL,
  `log_time` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=787 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (1, '2403:6200:8853:86e8:b869:5dd3:4393:967b', '2021-02-22 22:00:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (2, '2403:6200:8853:86e8:b869:5dd3:4393:967b', '2021-02-22 22:12:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (3, '2403:6200:8853:86e8:b869:5dd3:4393:967b', '2021-02-23 01:17:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (4, '2403:6200:8853:86e8:b869:5dd3:4393:967b', '2021-02-23 01:32:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (5, '2403:6200:8853:86e8:b869:5dd3:4393:967b', '2021-02-23 01:42:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (6, '2403:6200:8853:86e8:cd0b:a426:4f46:7677', '2021-02-24 01:18:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (7, '2403:6200:8853:86e8:cd0b:a426:4f46:7677', '2021-02-24 01:24:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (8, '2403:6200:8853:86e8:6158:fd79:d27d:9e66', '2021-05-31 23:39:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (9, '2403:6200:8853:86e8:6158:fd79:d27d:9e66', '2021-05-31 23:52:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (10, '2403:6200:8853:86e8:2833:83b3:c54c:7b1e', '2021-06-02 00:50:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (11, '162.158.166.204', '2021-06-21 16:11:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (12, '162.158.166.152', '2021-06-21 17:23:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (13, '162.158.166.152', '2021-06-21 19:53:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (14, '172.68.144.10', '2021-06-22 13:25:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (15, '162.158.167.229', '2021-06-22 15:23:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (16, '162.158.167.229', '2021-06-22 20:06:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (17, '162.158.165.165', '2021-06-22 20:45:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (18, '162.158.167.71', '2021-06-22 20:56:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (19, '162.158.167.71', '2021-06-22 20:57:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (20, '162.158.167.71', '2021-06-22 20:57:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (21, '162.158.167.229', '2021-06-22 22:03:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (22, '162.158.165.165', '2021-06-22 22:21:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (23, '162.158.167.229', '2021-06-22 22:29:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (24, '162.158.165.165', '2021-06-22 22:33:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (25, '162.158.167.229', '2021-06-22 22:37:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (26, '172.68.144.10', '2021-06-22 22:39:04', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (27, '162.158.167.229', '2021-06-22 22:42:32', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (28, '162.158.165.165', '2021-06-22 22:44:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (29, '162.158.165.165', '2021-06-22 22:46:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (30, '162.158.165.165', '2021-06-22 22:47:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (31, '162.158.165.165', '2021-06-22 22:49:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (32, '162.158.167.229', '2021-06-22 22:50:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (33, '162.158.167.229', '2021-06-22 22:57:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (34, '162.158.167.71', '2021-06-22 23:02:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (35, '162.158.167.71', '2021-06-22 23:05:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (36, '172.68.144.10', '2021-06-22 23:07:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (37, '162.158.165.165', '2021-06-22 23:11:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (38, '162.158.165.165', '2021-06-22 23:11:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (39, '162.158.165.165', '2021-06-22 23:11:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (40, '162.158.167.71', '2021-06-23 00:13:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (41, '162.158.167.71', '2021-06-23 00:13:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (42, '162.158.167.71', '2021-06-23 00:19:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (43, '162.158.165.165', '2021-06-23 00:20:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (44, '162.158.167.71', '2021-06-23 00:23:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (45, '172.68.144.10', '2021-06-23 00:25:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (46, '172.68.144.10', '2021-06-23 00:26:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (47, '162.158.167.229', '2021-06-23 09:45:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (48, '162.158.167.229', '2021-06-23 09:46:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (49, '162.158.167.229', '2021-06-23 09:48:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (50, '162.158.167.229', '2021-06-23 09:48:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (51, '162.158.167.229', '2021-06-23 09:50:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (52, '172.68.144.10', '2021-06-23 09:51:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (53, '172.68.144.10', '2021-06-23 09:53:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (54, '172.68.144.10', '2021-06-23 09:56:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (55, '172.68.144.10', '2021-06-23 09:58:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (56, '172.68.144.10', '2021-06-23 09:59:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (57, '162.158.167.229', '2021-06-23 10:08:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (58, '162.158.167.229', '2021-06-23 10:10:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (59, '162.158.167.229', '2021-06-23 10:10:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (60, '162.158.167.229', '2021-06-23 10:12:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (61, '162.158.165.165', '2021-06-23 10:21:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (62, '162.158.167.71', '2021-06-23 10:28:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (63, '162.158.165.165', '2021-06-23 10:40:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (64, '162.158.167.229', '2021-06-23 10:42:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (65, '162.158.167.229', '2021-06-23 10:49:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (66, '172.68.144.10', '2021-06-23 10:57:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (67, '162.158.165.165', '2021-06-23 10:59:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (68, '172.68.144.10', '2021-06-23 11:00:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (69, '162.158.165.165', '2021-06-23 11:02:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (70, '162.158.167.71', '2021-06-23 16:21:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (71, '172.68.144.10', '2021-06-23 16:27:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (72, '162.158.165.165', '2021-06-23 16:29:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (73, '162.158.167.71', '2021-06-23 16:32:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (74, '162.158.167.71', '2021-06-23 16:33:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (75, '172.68.144.10', '2021-06-23 23:23:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (76, '162.158.167.229', '2021-07-08 11:03:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (77, '162.158.167.71', '2021-07-08 11:15:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (78, '162.158.167.71', '2021-07-08 11:20:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (79, '162.158.167.71', '2021-07-08 11:20:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (80, '162.158.166.98', '2021-07-11 12:46:32', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (81, '172.68.144.194', '2021-07-11 12:47:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (82, '172.68.144.194', '2021-07-11 12:48:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (83, '172.68.144.176', '2021-07-11 14:09:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (84, '162.158.166.92', '2021-07-11 14:20:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (85, '172.69.135.233', '2021-07-11 14:50:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (86, '172.68.144.176', '2021-07-11 15:07:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (87, '172.68.144.176', '2021-07-11 23:26:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (88, '162.158.166.92', '2021-07-12 09:21:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (89, '172.68.144.176', '2021-07-12 09:54:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (90, '162.158.165.35', '2021-07-12 18:56:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (91, '162.158.166.92', '2021-07-14 14:03:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (92, '162.158.166.232', '2021-07-14 15:38:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (93, '162.158.166.232', '2021-07-14 15:39:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (94, '162.158.166.232', '2021-07-14 15:44:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (95, '162.158.166.232', '2021-07-14 15:44:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (96, '162.158.166.92', '2021-07-14 20:05:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (97, '172.68.144.176', '2021-07-14 20:14:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (98, '162.158.166.232', '2021-07-14 20:16:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (99, '172.68.144.176', '2021-07-14 20:17:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (100, '172.68.144.176', '2021-07-14 20:19:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (101, '172.69.135.233', '2021-07-14 20:26:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (102, '162.158.166.232', '2021-07-14 20:39:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (103, '172.69.135.233', '2021-07-14 20:41:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (104, '172.68.144.176', '2021-07-14 20:42:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (105, '162.158.166.92', '2021-07-14 20:43:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (106, '162.158.166.92', '2021-07-14 20:44:28', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (107, '162.158.166.232', '2021-07-14 20:51:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (108, '172.68.144.176', '2021-07-14 20:51:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (109, '162.158.166.92', '2021-07-14 20:56:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (110, '162.158.166.232', '2021-07-14 20:59:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (111, '162.158.166.232', '2021-07-14 21:01:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (112, '172.69.135.233', '2021-07-14 21:04:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (113, '162.158.166.92', '2021-07-14 21:07:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (114, '172.68.144.176', '2021-07-14 21:09:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (115, '172.69.135.233', '2021-07-14 21:18:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (116, '172.68.144.176', '2021-07-14 21:29:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (117, '172.69.135.233', '2021-07-14 21:32:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (118, '172.69.135.233', '2021-07-14 21:33:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (119, '162.158.166.232', '2021-07-14 21:34:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (120, '162.158.166.232', '2021-07-14 21:36:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (121, '162.158.166.92', '2021-07-14 21:43:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (122, '162.158.166.232', '2021-07-14 22:48:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (123, '172.68.144.176', '2021-07-14 22:49:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (124, '162.158.166.232', '2021-07-14 22:54:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (125, '172.69.135.233', '2021-07-14 23:15:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (126, '172.68.144.176', '2021-07-14 23:46:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (127, '172.69.135.233', '2021-07-14 23:47:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (128, '162.158.166.232', '2021-07-14 23:48:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (129, '172.68.144.176', '2021-07-14 23:51:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (130, '172.69.135.233', '2021-07-14 23:58:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (131, '162.158.166.232', '2021-07-15 00:03:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (132, '172.69.135.233', '2021-07-15 09:51:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (133, '162.158.166.92', '2021-07-15 10:06:18', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (134, '172.69.135.233', '2021-07-15 10:42:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (135, '172.69.135.233', '2021-07-15 10:43:28', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (136, '172.69.135.233', '2021-07-15 10:49:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (137, '162.158.166.232', '2021-07-15 11:19:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (138, '172.68.144.176', '2021-07-15 11:29:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (139, '162.158.166.92', '2021-07-15 11:38:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (140, '162.158.166.92', '2021-07-15 11:39:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (141, '162.158.166.232', '2021-07-15 11:47:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (142, '162.158.166.232', '2021-07-15 14:18:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (143, '172.68.144.176', '2021-07-15 14:23:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (144, '172.68.144.176', '2021-07-15 14:24:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (145, '162.158.166.92', '2021-07-15 14:25:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (146, '162.158.166.232', '2021-07-15 14:26:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (147, '172.69.135.233', '2021-07-15 14:29:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (148, '162.158.166.232', '2021-07-15 14:29:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (149, '162.158.166.92', '2021-07-15 14:30:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (150, '172.69.135.233', '2021-07-15 14:46:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (151, '172.68.144.176', '2021-07-15 14:51:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (152, '172.68.144.176', '2021-07-15 14:51:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (153, '172.68.144.176', '2021-07-15 14:51:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (154, '172.69.135.233', '2021-07-15 14:57:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (155, '162.158.166.92', '2021-07-15 14:59:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (156, '172.68.144.176', '2021-07-15 15:00:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (157, '172.68.144.176', '2021-07-15 15:02:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (158, '162.158.166.232', '2021-07-15 15:21:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (159, '162.158.166.232', '2021-07-15 15:33:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (160, '172.68.144.176', '2021-07-15 17:17:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (161, '162.158.166.232', '2021-07-15 19:24:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (162, '172.68.144.176', '2021-07-15 19:25:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (163, '162.158.166.232', '2021-07-15 19:30:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (164, '162.158.166.92', '2021-07-15 19:33:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (165, '172.68.144.176', '2021-07-15 20:12:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (166, '162.158.166.92', '2021-07-15 20:38:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (167, '162.158.167.189', '2021-07-16 10:29:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (168, '162.158.167.189', '2021-07-16 10:30:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (169, '162.158.167.189', '2021-07-16 10:30:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (170, '172.68.144.68', '2021-07-16 11:09:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (171, '172.68.144.68', '2021-07-16 11:09:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (172, '172.68.144.68', '2021-07-16 11:10:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (173, '172.68.144.68', '2021-07-16 11:10:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (174, '172.68.144.68', '2021-07-16 11:12:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (175, '162.158.166.92', '2021-07-16 11:15:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (176, '172.68.144.68', '2021-07-16 11:15:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (177, '162.158.166.92', '2021-07-16 11:16:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (178, '172.68.144.68', '2021-07-16 11:16:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (179, '172.68.144.68', '2021-07-16 11:20:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (180, '162.158.166.232', '2021-07-16 11:30:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (181, '162.158.166.232', '2021-07-16 11:30:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (182, '162.158.167.189', '2021-07-16 11:31:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (183, '172.68.144.68', '2021-07-16 13:16:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (184, '172.68.144.68', '2021-07-16 13:34:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (185, '172.68.144.68', '2021-07-16 13:34:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (186, '172.68.144.68', '2021-07-16 13:34:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (187, '172.68.144.68', '2021-07-16 13:43:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (188, '172.68.144.68', '2021-07-16 13:43:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (189, '162.158.166.92', '2021-07-16 13:44:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (190, '172.68.144.68', '2021-07-16 13:44:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (191, '172.68.144.68', '2021-07-16 13:44:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (192, '172.68.144.68', '2021-07-16 13:44:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (193, '172.68.144.68', '2021-07-16 13:45:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (194, '172.68.144.68', '2021-07-16 13:46:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (195, '172.68.144.68', '2021-07-16 13:46:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (196, '162.158.166.92', '2021-07-16 13:48:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (197, '172.68.144.68', '2021-07-16 13:49:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (198, '172.68.144.68', '2021-07-16 13:49:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (199, '172.68.144.68', '2021-07-16 13:52:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (200, '162.158.166.92', '2021-07-16 13:52:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (201, '172.68.144.68', '2021-07-16 13:53:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (202, '172.68.144.98', '2021-07-16 14:04:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (203, '172.68.144.98', '2021-07-16 14:04:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (204, '172.68.144.98', '2021-07-16 14:07:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (205, '172.68.144.98', '2021-07-16 14:08:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (206, '172.68.144.98', '2021-07-16 14:08:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (207, '172.68.146.59', '2021-07-16 14:09:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (208, '172.68.144.84', '2021-07-16 14:09:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (209, '172.68.146.59', '2021-07-16 14:09:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (210, '172.68.146.59', '2021-07-16 14:09:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (211, '172.68.144.98', '2021-07-16 14:10:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (212, '172.68.144.98', '2021-07-16 14:10:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (213, '172.68.144.98', '2021-07-16 14:10:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (214, '172.68.144.84', '2021-07-16 14:10:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (215, '172.68.146.59', '2021-07-16 14:16:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (216, '172.68.146.59', '2021-07-16 14:17:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (217, '172.68.146.59', '2021-07-16 14:17:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (218, '172.68.146.59', '2021-07-16 14:17:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (219, '172.68.146.59', '2021-07-16 14:23:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (220, '172.68.144.98', '2021-07-16 14:23:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (221, '172.68.146.59', '2021-07-16 14:23:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (222, '172.68.146.59', '2021-07-16 14:24:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (223, '172.68.146.59', '2021-07-16 14:24:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (224, '162.158.165.229', '2021-07-16 14:51:32', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (225, '162.158.165.229', '2021-07-16 16:04:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (226, '162.158.165.229', '2021-07-16 16:23:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (227, '162.158.165.229', '2021-07-16 16:26:04', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (228, '162.158.165.229', '2021-07-16 16:26:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (229, '172.68.144.136', '2021-07-16 20:10:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (230, '172.68.144.242', '2021-07-16 21:50:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (231, '172.68.144.136', '2021-07-17 14:37:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (232, '172.68.144.242', '2021-07-18 00:23:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (233, '162.158.165.229', '2021-07-18 14:17:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (234, '172.68.144.136', '2021-07-19 09:25:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (235, '162.158.165.229', '2021-07-19 12:11:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (236, '162.158.165.229', '2021-07-19 14:30:40', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (237, '162.158.165.229', '2021-07-19 14:31:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (238, '162.158.165.229', '2021-07-19 14:39:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (239, '162.158.165.229', '2021-07-19 14:39:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (240, '162.158.165.229', '2021-07-19 14:39:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (241, '162.158.165.229', '2021-07-19 14:39:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (242, '162.158.165.229', '2021-07-19 14:39:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (243, '162.158.165.229', '2021-07-19 14:43:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (244, '162.158.165.229', '2021-07-19 14:44:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (245, '172.68.144.136', '2021-07-19 19:34:18', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (246, '172.68.144.196', '2021-07-19 19:38:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (247, '172.68.144.196', '2021-07-20 09:33:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (248, '162.158.166.86', '2021-07-21 09:36:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (249, '172.68.144.168', '2021-07-21 16:28:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (250, '162.158.165.81', '2021-07-22 09:56:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (251, '162.158.166.176', '2021-07-23 09:28:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (252, '162.158.166.20', '2021-07-23 19:36:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (253, '162.158.165.243', '2021-07-23 22:07:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (254, '162.158.165.243', '2021-07-23 22:08:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (255, '162.158.165.243', '2021-07-24 10:55:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (256, '172.68.144.72', '2021-07-25 10:36:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (257, '162.158.166.92', '2021-07-27 16:47:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (258, '162.158.165.245', '2021-07-27 19:06:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (259, '172.68.254.27', '2021-07-29 11:54:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (260, '162.158.166.110', '2021-08-02 10:06:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (261, '162.158.165.161', '2021-08-02 10:19:04', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (262, '162.158.165.129', '2021-08-02 10:48:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (263, '162.158.165.161', '2021-08-02 10:54:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (264, '162.158.166.116', '2021-08-02 10:59:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (265, '162.158.166.116', '2021-08-02 11:11:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (266, '162.158.166.116', '2021-08-02 11:18:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (267, '162.158.166.116', '2021-08-02 12:18:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (268, '162.158.165.161', '2021-08-03 10:44:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (269, '162.158.166.116', '2021-08-03 13:03:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (270, '162.158.166.160', '2021-08-04 09:51:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (271, '162.158.166.160', '2021-08-04 12:44:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (272, '162.158.166.116', '2021-08-05 09:58:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (273, '162.158.165.161', '2021-08-05 12:14:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (274, '162.158.166.160', '2021-08-05 19:08:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (275, '162.158.166.160', '2021-08-05 19:08:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (276, '162.158.165.161', '2021-08-06 09:46:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (277, '162.158.166.110', '2021-08-06 13:25:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (278, '162.158.165.161', '2021-08-08 23:29:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (279, '162.158.165.161', '2021-08-08 23:32:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (280, '162.158.166.116', '2021-08-09 08:29:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (281, '162.158.165.161', '2021-08-09 08:31:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (282, '162.158.165.161', '2021-08-09 08:40:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (283, '162.158.165.161', '2021-08-09 08:41:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (284, '162.158.165.161', '2021-08-09 08:41:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (285, '162.158.165.161', '2021-08-09 08:41:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (286, '162.158.165.161', '2021-08-09 08:41:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (287, '162.158.165.161', '2021-08-09 08:42:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (288, '162.158.166.110', '2021-08-09 13:25:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (289, '162.158.166.116', '2021-08-09 15:05:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (290, '162.158.166.116', '2021-08-09 15:57:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (291, '162.158.166.160', '2021-08-09 16:16:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (292, '162.158.166.110', '2021-08-09 17:11:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (293, '162.158.166.110', '2021-08-09 20:46:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (294, '162.158.166.160', '2021-08-09 20:46:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (295, '162.158.165.161', '2021-08-09 21:11:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (296, '162.158.166.116', '2021-08-09 21:17:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (297, '162.158.166.160', '2021-08-09 21:22:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (298, '162.158.166.116', '2021-08-09 22:23:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (299, '162.158.165.161', '2021-08-09 22:27:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (300, '162.158.166.160', '2021-08-09 22:36:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (301, '162.158.165.161', '2021-08-10 11:28:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (302, '162.158.166.160', '2021-08-10 11:29:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (303, '162.158.166.110', '2021-08-10 11:34:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (304, '162.158.166.160', '2021-08-10 11:37:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (305, '162.158.166.110', '2021-08-10 11:41:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (306, '162.158.166.110', '2021-08-10 11:42:04', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (307, '162.158.166.110', '2021-08-10 11:45:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (308, '162.158.166.160', '2021-08-10 11:48:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (309, '162.158.165.161', '2021-08-10 11:50:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (310, '162.158.166.110', '2021-08-10 11:51:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (311, '162.158.166.160', '2021-08-10 11:54:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (312, '162.158.166.116', '2021-08-10 11:55:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (313, '162.158.166.110', '2021-08-10 11:58:28', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (314, '162.158.165.161', '2021-08-10 12:00:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (315, '162.158.166.110', '2021-08-10 12:01:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (316, '162.158.166.116', '2021-08-10 12:05:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (317, '162.158.166.160', '2021-08-10 12:06:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (318, '162.158.165.161', '2021-08-10 12:09:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (319, '162.158.165.161', '2021-08-10 12:13:32', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (320, '162.158.165.161', '2021-08-10 12:13:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (321, '162.158.166.160', '2021-08-10 12:14:18', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (322, '162.158.166.160', '2021-08-10 12:15:40', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (323, '162.158.165.161', '2021-08-10 12:16:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (324, '162.158.166.110', '2021-08-10 12:17:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (325, '162.158.165.161', '2021-08-10 12:19:40', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (326, '162.158.166.160', '2021-08-10 12:20:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (327, '162.158.166.110', '2021-08-10 12:25:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (328, '162.158.166.116', '2021-08-10 12:26:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (329, '162.158.165.161', '2021-08-10 12:31:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (330, '162.158.166.160', '2021-08-10 13:31:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (331, '162.158.166.116', '2021-08-10 13:32:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (332, '162.158.166.116', '2021-08-10 13:41:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (333, '162.158.166.110', '2021-08-10 13:55:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (334, '162.158.166.116', '2021-08-10 14:22:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (335, '162.158.166.160', '2021-08-10 14:26:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (336, '162.158.166.116', '2021-08-10 14:55:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (337, '162.158.165.121', '2021-08-10 14:59:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (338, '162.158.165.121', '2021-08-10 14:59:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (339, '162.158.166.116', '2021-08-10 15:43:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (340, '162.158.166.160', '2021-08-10 15:44:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (341, '162.158.165.121', '2021-08-12 23:34:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (342, '162.158.165.121', '2021-08-12 23:35:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (343, '162.158.166.116', '2021-08-12 23:36:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (344, '162.158.166.160', '2021-08-14 14:56:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (345, '162.158.166.110', '2021-08-14 15:00:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (346, '162.158.166.116', '2021-08-14 15:03:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (347, '162.158.165.161', '2021-08-14 15:04:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (348, '162.158.166.116', '2021-08-14 15:06:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (349, '162.158.166.110', '2021-08-14 15:12:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (350, '162.158.165.161', '2021-08-14 15:54:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (351, '162.158.166.110', '2021-08-14 18:17:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (352, '162.158.165.161', '2021-08-14 18:20:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (353, '162.158.165.161', '2021-08-15 11:19:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (354, '162.158.166.110', '2021-08-15 12:16:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (355, '162.158.165.161', '2021-08-15 12:55:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (356, '162.158.166.116', '2021-08-15 13:02:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (357, '162.158.165.161', '2021-08-15 13:03:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (358, '162.158.165.161', '2021-08-15 13:05:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (359, '162.158.166.116', '2021-08-15 13:07:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (360, '162.158.166.110', '2021-08-15 13:09:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (361, '162.158.166.116', '2021-08-15 13:46:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (362, '162.158.166.116', '2021-08-15 13:47:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (363, '162.158.166.110', '2021-08-15 13:47:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (364, '162.158.166.110', '2021-08-15 13:49:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (365, '162.158.166.110', '2021-08-15 13:49:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (366, '162.158.166.110', '2021-08-15 13:50:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (367, '162.158.166.110', '2021-08-15 13:51:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (368, '162.158.166.110', '2021-08-15 13:56:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (369, '162.158.166.116', '2021-08-15 13:57:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (370, '162.158.166.110', '2021-08-15 13:58:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (371, '162.158.166.160', '2021-08-15 13:59:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (372, '162.158.166.110', '2021-08-15 14:01:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (373, '162.158.165.161', '2021-08-15 14:02:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (374, '162.158.166.110', '2021-08-15 14:09:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (375, '162.158.166.116', '2021-08-15 14:13:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (376, '162.158.166.110', '2021-08-15 14:14:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (377, '162.158.166.116', '2021-08-15 14:16:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (378, '162.158.165.161', '2021-08-15 14:18:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (379, '162.158.165.161', '2021-08-15 14:19:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (380, '162.158.165.161', '2021-08-15 14:20:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (381, '162.158.166.116', '2021-08-15 14:22:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (382, '162.158.166.110', '2021-08-15 14:25:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (383, '162.158.166.110', '2021-08-15 14:25:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (384, '162.158.166.160', '2021-08-15 14:31:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (385, '162.158.166.116', '2021-08-15 14:31:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (386, '162.158.166.116', '2021-08-15 14:32:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (387, '162.158.166.160', '2021-08-15 14:36:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (388, '162.158.166.160', '2021-08-15 14:36:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (389, '162.158.166.160', '2021-08-15 14:38:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (390, '162.158.166.160', '2021-08-15 14:39:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (391, '162.158.166.116', '2021-08-15 14:40:04', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (392, '162.158.166.110', '2021-08-15 14:42:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (393, '162.158.166.110', '2021-08-15 14:45:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (394, '162.158.165.161', '2021-08-15 14:48:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (395, '162.158.165.161', '2021-08-15 14:48:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (396, '162.158.166.116', '2021-08-15 14:54:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (397, '162.158.166.160', '2021-08-15 14:55:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (398, '162.158.165.161', '2021-08-15 14:57:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (399, '162.158.165.161', '2021-08-15 14:58:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (400, '162.158.166.110', '2021-08-15 15:03:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (401, '162.158.166.110', '2021-08-15 15:04:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (402, '162.158.166.116', '2021-08-15 15:05:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (403, '162.158.166.116', '2021-08-15 15:06:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (404, '162.158.166.160', '2021-08-15 15:09:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (405, '162.158.165.161', '2021-08-15 15:10:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (406, '162.158.166.110', '2021-08-15 15:15:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (407, '162.158.166.160', '2021-08-15 15:16:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (408, '162.158.165.161', '2021-08-15 15:17:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (409, '162.158.166.116', '2021-08-15 15:22:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (410, '162.158.166.160', '2021-08-15 15:33:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (411, '162.158.165.161', '2021-08-15 15:37:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (412, '162.158.166.110', '2021-08-15 15:40:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (413, '162.158.165.161', '2021-08-15 15:42:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (414, '162.158.166.160', '2021-08-15 15:43:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (415, '162.158.166.116', '2021-08-15 16:06:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (416, '162.158.166.110', '2021-08-15 16:18:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (417, '162.158.166.160', '2021-08-15 16:56:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (418, '162.158.166.116', '2021-08-15 16:58:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (419, '162.158.166.110', '2021-08-15 16:59:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (420, '162.158.166.160', '2021-08-15 17:01:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (421, '162.158.165.161', '2021-08-15 17:05:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (422, '162.158.166.116', '2021-08-15 17:09:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (423, '162.158.166.116', '2021-08-15 17:10:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (424, '162.158.166.110', '2021-08-15 17:11:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (425, '162.158.166.110', '2021-08-15 17:12:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (426, '162.158.166.116', '2021-08-15 17:13:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (427, '162.158.166.110', '2021-08-15 17:17:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (428, '162.158.166.160', '2021-08-15 17:18:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (429, '162.158.166.110', '2021-08-15 17:25:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (430, '162.158.165.161', '2021-08-15 17:27:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (431, '162.158.166.116', '2021-08-15 17:30:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (432, '162.158.165.161', '2021-08-15 17:32:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (433, '162.158.166.116', '2021-08-15 17:54:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (434, '162.158.166.110', '2021-08-15 18:05:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (435, '162.158.166.160', '2021-08-15 18:09:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (436, '162.158.165.161', '2021-08-16 10:32:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (437, '162.158.166.160', '2021-08-16 10:33:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (438, '162.158.165.161', '2021-08-16 10:51:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (439, '162.158.166.160', '2021-08-16 10:53:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (440, '162.158.166.116', '2021-08-16 11:05:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (441, '162.158.166.110', '2021-08-16 11:08:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (442, '162.158.166.160', '2021-08-16 11:53:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (443, '162.158.166.110', '2021-08-16 11:55:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (444, '162.158.165.161', '2021-08-16 12:00:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (445, '162.158.166.160', '2021-08-16 12:01:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (446, '162.158.166.116', '2021-08-16 12:09:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (447, '162.158.166.110', '2021-08-16 12:11:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (448, '162.158.165.161', '2021-08-16 12:14:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (449, '162.158.166.116', '2021-08-16 12:16:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (450, '162.158.166.160', '2021-08-16 12:18:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (451, '162.158.165.151', '2021-08-16 14:31:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (452, '162.158.166.116', '2021-08-16 14:36:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (453, '162.158.166.110', '2021-08-16 14:37:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (454, '172.68.144.86', '2021-08-17 22:23:32', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (455, '162.158.165.161', '2021-08-17 22:27:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (456, '162.158.165.161', '2021-08-17 22:27:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (457, '162.158.166.160', '2021-08-17 22:39:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (458, '162.158.165.161', '2021-08-17 22:42:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (459, '162.158.166.160', '2021-08-17 22:49:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (460, '162.158.166.116', '2021-08-17 22:50:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (461, '162.158.166.110', '2021-08-17 22:53:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (462, '162.158.166.110', '2021-08-17 23:09:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (463, '162.158.166.110', '2021-08-17 23:13:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (464, '162.158.165.161', '2021-08-17 23:39:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (465, '162.158.165.161', '2021-08-17 23:52:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (466, '162.158.165.161', '2021-08-18 00:03:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (467, '162.158.166.116', '2021-08-18 00:35:18', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (468, '162.158.166.110', '2021-08-18 00:40:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (469, '162.158.166.116', '2021-08-18 00:45:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (470, '162.158.166.116', '2021-08-18 00:45:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (471, '162.158.166.160', '2021-08-18 00:50:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (472, '162.158.165.161', '2021-08-18 09:47:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (473, '162.158.166.116', '2021-08-18 09:50:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (474, '162.158.166.116', '2021-08-18 09:50:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (475, '162.158.166.160', '2021-08-18 10:01:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (476, '162.158.166.110', '2021-08-18 10:03:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (477, '162.158.166.116', '2021-08-18 10:05:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (478, '162.158.166.110', '2021-08-18 10:26:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (479, '162.158.166.160', '2021-08-18 10:29:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (480, '162.158.166.160', '2021-08-18 10:37:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (481, '162.158.166.110', '2021-08-18 10:40:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (482, '162.158.166.160', '2021-08-18 10:42:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (483, '162.158.166.116', '2021-08-18 10:48:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (484, '162.158.166.160', '2021-08-18 10:49:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (485, '162.158.166.116', '2021-08-18 10:50:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (486, '162.158.166.160', '2021-08-18 10:51:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (487, '162.158.165.161', '2021-08-18 10:55:18', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (488, '162.158.166.110', '2021-08-18 11:21:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (489, '162.158.166.110', '2021-08-18 12:24:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (490, '162.158.166.110', '2021-08-18 12:24:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (491, '162.158.166.116', '2021-08-18 12:35:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (492, '162.158.165.161', '2021-08-18 12:37:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (493, '162.158.166.116', '2021-08-18 12:46:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (494, '162.158.165.161', '2021-08-18 12:49:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (495, '162.158.166.160', '2021-08-18 12:49:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (496, '162.158.165.161', '2021-08-18 12:50:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (497, '162.158.166.160', '2021-08-18 12:53:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (498, '162.158.165.161', '2021-08-18 12:54:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (499, '162.158.166.160', '2021-08-18 12:55:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (500, '162.158.165.161', '2021-08-18 12:59:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (501, '162.158.166.160', '2021-08-18 13:02:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (502, '162.158.165.161', '2021-08-18 13:03:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (503, '162.158.166.116', '2021-08-18 13:09:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (504, '162.158.165.161', '2021-08-18 13:12:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (505, '162.158.166.116', '2021-08-18 13:13:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (506, '162.158.166.110', '2021-08-18 14:02:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (507, '162.158.166.160', '2021-08-18 14:03:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (508, '162.158.166.160', '2021-08-18 14:04:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (509, '162.158.165.161', '2021-08-18 14:06:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (510, '162.158.166.116', '2021-08-18 14:07:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (511, '162.158.166.110', '2021-08-18 14:10:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (512, '162.158.165.161', '2021-08-18 14:19:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (513, '162.158.166.116', '2021-08-18 14:44:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (514, '162.158.166.160', '2021-08-18 14:48:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (515, '162.158.165.161', '2021-08-18 15:14:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (516, '162.158.166.160', '2021-08-18 15:21:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (517, '162.158.166.110', '2021-08-18 15:45:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (518, '162.158.166.160', '2021-08-18 15:46:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (519, '162.158.166.110', '2021-08-18 15:51:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (520, '162.158.166.116', '2021-08-18 15:59:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (521, '162.158.166.110', '2021-08-18 16:01:32', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (522, '162.158.166.160', '2021-08-18 16:03:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (523, '162.158.166.110', '2021-08-18 16:04:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (524, '162.158.166.160', '2021-08-18 16:05:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (525, '162.158.166.110', '2021-08-18 16:06:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (526, '162.158.166.160', '2021-08-18 16:10:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (527, '162.158.166.116', '2021-08-18 16:12:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (528, '162.158.166.160', '2021-08-18 16:14:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (529, '162.158.165.161', '2021-08-18 16:14:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (530, '162.158.166.116', '2021-08-18 16:19:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (531, '162.158.166.160', '2021-08-18 16:20:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (532, '162.158.166.110', '2021-08-18 16:22:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (533, '162.158.166.160', '2021-08-18 16:23:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (534, '162.158.166.110', '2021-08-18 16:39:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (535, '162.158.166.160', '2021-08-18 16:41:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (536, '162.158.166.116', '2021-08-18 17:08:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (537, '162.158.166.160', '2021-08-18 17:10:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (538, '162.158.166.110', '2021-08-18 17:12:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (539, '162.158.166.116', '2021-08-18 17:12:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (540, '162.158.166.160', '2021-08-18 17:15:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (541, '162.158.166.160', '2021-08-18 17:15:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (542, '162.158.165.67', '2021-08-19 09:47:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (543, '162.158.167.247', '2021-08-19 09:49:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (544, '162.158.165.67', '2021-08-19 09:51:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (545, '162.158.167.231', '2021-08-19 09:56:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (546, '162.158.165.67', '2021-08-19 09:57:40', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (547, '162.158.167.231', '2021-08-19 09:58:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (548, '162.158.165.139', '2021-08-19 09:59:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (549, '162.158.167.247', '2021-08-19 10:00:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (550, '162.158.165.67', '2021-08-19 10:03:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (551, '162.158.167.231', '2021-08-19 10:04:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (552, '162.158.165.67', '2021-08-19 10:15:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (553, '162.158.165.67', '2021-08-19 10:16:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (554, '162.158.167.247', '2021-08-19 10:17:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (555, '162.158.165.67', '2021-08-19 10:28:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (556, '162.158.167.231', '2021-08-19 10:32:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (557, '162.158.167.247', '2021-08-19 10:34:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (558, '162.158.165.139', '2021-08-19 10:55:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (559, '162.158.167.231', '2021-08-19 10:56:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (560, '162.158.165.67', '2021-08-19 10:58:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (561, '162.158.165.139', '2021-08-19 11:00:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (562, '162.158.165.139', '2021-08-19 16:55:40', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (563, '162.158.167.231', '2021-08-19 17:49:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (564, '162.158.167.247', '2021-08-19 17:55:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (565, '162.158.167.247', '2021-08-19 17:57:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (566, '162.158.165.139', '2021-08-19 20:09:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (567, '162.158.165.67', '2021-08-19 20:14:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (568, '162.158.165.67', '2021-08-19 20:15:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (569, '162.158.167.247', '2021-08-19 20:17:32', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (570, '162.158.165.67', '2021-08-19 20:24:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (571, '162.158.165.67', '2021-08-19 20:25:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (572, '162.158.167.231', '2021-08-19 20:38:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (573, '162.158.167.247', '2021-08-19 20:45:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (574, '162.158.167.231', '2021-08-19 20:48:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (575, '162.158.165.67', '2021-08-19 20:50:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (576, '162.158.167.247', '2021-08-19 20:51:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (577, '162.158.167.247', '2021-08-19 20:53:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (578, '162.158.167.231', '2021-08-19 20:56:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (579, '162.158.167.247', '2021-08-19 20:58:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (580, '162.158.167.247', '2021-08-19 20:59:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (581, '162.158.165.139', '2021-08-19 21:01:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (582, '162.158.165.139', '2021-08-19 21:01:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (583, '162.158.167.231', '2021-08-19 21:02:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (584, '162.158.165.139', '2021-08-19 21:04:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (585, '162.158.167.247', '2021-08-19 21:06:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (586, '162.158.165.67', '2021-08-19 21:09:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (587, '162.158.167.231', '2021-08-19 21:12:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (588, '162.158.167.231', '2021-08-19 21:13:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (589, '162.158.165.67', '2021-08-19 21:15:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (590, '162.158.167.231', '2021-08-19 21:16:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (591, '162.158.167.247', '2021-08-19 21:17:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (592, '162.158.165.67', '2021-08-19 21:20:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (593, '162.158.165.139', '2021-08-19 21:22:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (594, '162.158.165.67', '2021-08-19 21:23:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (595, '162.158.167.231', '2021-08-19 21:34:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (596, '162.158.165.139', '2021-08-19 21:36:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (597, '162.158.167.231', '2021-08-19 21:38:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (598, '162.158.165.67', '2021-08-19 21:38:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (599, '162.158.165.67', '2021-08-19 21:39:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (600, '172.68.144.68', '2021-08-19 22:29:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (601, '162.158.167.247', '2021-08-22 00:38:04', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (602, '162.158.165.139', '2021-08-22 00:39:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (603, '162.158.167.231', '2021-08-22 00:52:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (604, '162.158.179.64', '2021-08-22 01:28:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (605, '162.158.167.247', '2021-08-30 13:11:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (606, '162.158.167.247', '2021-08-30 13:14:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (607, '162.158.165.139', '2021-09-06 11:03:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (608, '162.158.167.247', '2021-09-06 14:37:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (609, '162.158.167.247', '2021-09-06 14:39:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (610, '162.158.167.247', '2021-09-06 14:40:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (611, '162.158.167.247', '2021-09-06 14:41:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (612, '162.158.167.231', '2021-09-06 14:53:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (613, '162.158.167.231', '2021-09-06 14:55:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (614, '162.158.165.139', '2021-09-06 14:57:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (615, '162.158.165.139', '2021-09-06 15:00:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (616, '162.158.165.139', '2021-09-06 15:05:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (617, '162.158.165.67', '2021-09-06 15:20:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (618, '162.158.167.231', '2021-09-06 15:22:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (619, '162.158.167.231', '2021-09-06 15:22:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (620, '162.158.165.67', '2021-09-06 15:23:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (621, '162.158.165.67', '2021-09-06 15:26:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (622, '162.158.167.231', '2021-09-06 15:27:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (623, '162.158.165.67', '2021-09-06 15:27:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (624, '162.158.165.67', '2021-09-06 15:27:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (625, '162.158.167.247', '2021-09-06 15:41:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (626, '162.158.165.139', '2021-09-06 15:41:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (627, '162.158.167.231', '2021-09-06 15:41:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (628, '162.158.167.247', '2021-09-06 15:44:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (629, '162.158.165.67', '2021-09-06 15:44:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (630, '162.158.165.67', '2021-09-06 15:46:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (631, '162.158.167.247', '2021-09-06 15:46:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (632, '162.158.165.67', '2021-09-06 15:46:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (633, '162.158.167.231', '2021-09-06 15:47:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (634, '162.158.165.139', '2021-09-06 15:48:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (635, '162.158.167.247', '2021-09-06 15:48:49', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (636, '162.158.167.247', '2021-09-06 15:49:33', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (637, '162.158.165.139', '2021-09-06 15:52:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (638, '162.158.165.67', '2021-09-06 15:53:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (639, '162.158.165.67', '2021-09-06 15:57:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (640, '162.158.165.67', '2021-09-06 15:58:52', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (641, '162.158.165.67', '2021-09-06 16:00:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (642, '162.158.165.67', '2021-09-06 16:01:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (643, '162.158.165.139', '2021-09-06 16:04:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (644, '162.158.165.67', '2021-09-06 16:07:19', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (645, '162.158.165.139', '2021-09-06 16:09:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (646, '162.158.167.247', '2021-09-06 16:10:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (647, '162.158.165.139', '2021-09-06 16:11:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (648, '162.158.167.231', '2021-09-06 16:19:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (649, '162.158.167.231', '2021-09-06 16:19:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (650, '162.158.167.231', '2021-09-06 16:24:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (651, '162.158.167.247', '2021-09-06 16:59:10', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (652, '162.158.167.231', '2021-09-06 17:47:28', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (653, '162.158.167.231', '2021-09-06 17:48:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (654, '162.158.167.231', '2021-09-06 19:25:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (655, '162.158.167.247', '2021-09-06 19:30:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (656, '162.158.165.139', '2021-09-06 19:32:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (657, '162.158.167.247', '2021-09-06 19:35:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (658, '162.158.165.139', '2021-09-06 19:36:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (659, '162.158.167.247', '2021-09-06 19:40:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (660, '162.158.165.139', '2021-09-06 19:42:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (661, '162.158.167.247', '2021-09-06 19:43:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (662, '162.158.165.139', '2021-09-06 19:45:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (663, '162.158.167.247', '2021-09-06 19:47:40', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (664, '162.158.165.139', '2021-09-06 19:49:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (665, '162.158.167.247', '2021-09-06 19:53:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (666, '162.158.165.139', '2021-09-06 19:54:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (667, '162.158.167.231', '2021-09-06 19:55:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (668, '162.158.165.139', '2021-09-06 19:56:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (669, '162.158.165.67', '2021-09-06 19:59:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (670, '162.158.167.247', '2021-09-06 20:04:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (671, '162.158.167.231', '2021-09-06 20:06:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (672, '162.158.167.247', '2021-09-06 20:07:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (673, '162.158.165.139', '2021-09-06 20:09:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (674, '162.158.165.67', '2021-09-06 20:15:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (675, '162.158.167.231', '2021-09-06 20:17:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (676, '162.158.167.247', '2021-09-06 20:18:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (677, '162.158.165.67', '2021-09-06 20:20:03', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (678, '162.158.167.231', '2021-09-06 20:21:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (679, '162.158.165.139', '2021-09-06 20:23:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (680, '162.158.167.247', '2021-09-07 10:26:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (681, '162.158.165.139', '2021-09-07 10:30:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (682, '162.158.165.67', '2021-09-07 10:32:46', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (683, '162.158.167.247', '2021-09-07 10:35:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (684, '162.158.167.247', '2021-09-07 10:36:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (685, '162.158.165.67', '2021-09-07 10:39:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (686, '162.158.167.231', '2021-09-07 10:40:17', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (687, '162.158.165.139', '2021-09-07 10:41:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (688, '162.158.165.67', '2021-09-07 10:42:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (689, '162.158.167.231', '2021-09-07 10:44:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (690, '162.158.165.67', '2021-09-07 10:47:00', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (691, '162.158.165.139', '2021-09-07 10:49:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (692, '162.158.165.67', '2021-09-07 11:26:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (693, '162.158.167.231', '2021-09-07 11:40:09', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (694, '162.158.165.139', '2021-09-07 11:49:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (695, '162.158.165.67', '2021-09-07 11:50:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (696, '162.158.165.67', '2021-09-07 11:51:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (697, '162.158.165.67', '2021-09-07 11:52:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (698, '162.158.165.139', '2021-09-07 11:54:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (699, '162.158.167.231', '2021-09-07 11:58:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (700, '162.158.167.247', '2021-09-07 11:59:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (701, '162.158.165.67', '2021-09-07 12:02:28', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (702, '162.158.167.231', '2021-09-07 12:03:31', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (703, '162.158.165.67', '2021-09-07 12:11:42', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (704, '162.158.165.67', '2021-09-07 12:12:14', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (705, '162.158.165.67', '2021-09-07 12:13:21', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (706, '162.158.167.231', '2021-09-07 12:13:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (707, '162.158.167.231', '2021-09-07 12:14:45', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (708, '162.158.165.139', '2021-09-07 12:15:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (709, '162.158.165.67', '2021-09-07 12:15:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (710, '162.158.167.231', '2021-09-07 12:16:55', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (711, '162.158.165.67', '2021-09-07 12:17:25', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (712, '162.158.165.139', '2021-09-07 12:20:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (713, '162.158.167.231', '2021-09-07 12:23:47', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (714, '162.158.167.247', '2021-09-07 12:32:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (715, '162.158.167.247', '2021-09-07 14:52:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (716, '162.158.167.231', '2021-09-07 14:52:57', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (717, '162.158.165.139', '2021-09-07 14:53:08', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (718, '162.158.167.247', '2021-09-07 14:55:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (719, '162.158.165.139', '2021-09-07 14:57:36', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (720, '162.158.167.231', '2021-09-07 14:58:20', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (721, '162.158.165.67', '2021-09-07 15:18:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (722, '162.158.167.231', '2021-09-07 15:18:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (723, '162.158.165.139', '2021-09-07 15:19:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (724, '162.158.167.247', '2021-09-07 15:19:28', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (725, '162.158.167.247', '2021-09-07 15:22:13', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (726, '162.158.167.247', '2021-09-07 15:22:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (727, '162.158.167.231', '2021-09-07 15:22:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (728, '162.158.165.67', '2021-09-07 15:24:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (729, '162.158.165.67', '2021-09-07 15:26:16', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (730, '162.158.165.67', '2021-09-07 15:26:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (731, '162.158.165.139', '2021-09-07 15:58:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (732, '162.158.165.139', '2021-09-07 16:24:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (733, '162.158.165.139', '2021-09-07 16:24:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (734, '162.158.165.67', '2021-09-07 16:33:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (735, '162.158.165.67', '2021-09-07 16:33:26', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (736, '162.158.167.247', '2021-09-07 16:33:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (737, '162.158.165.139', '2021-09-07 16:33:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (738, '162.158.165.139', '2021-09-07 16:33:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (739, '162.158.167.231', '2021-09-07 16:34:07', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (740, '162.158.165.139', '2021-09-07 16:35:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (741, '162.158.165.139', '2021-09-07 16:50:48', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (742, '162.158.165.139', '2021-09-07 17:02:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (743, '162.158.167.231', '2021-09-07 17:08:54', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (744, '162.158.167.231', '2021-09-07 17:14:18', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (745, '162.158.167.247', '2021-09-07 17:15:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (746, '162.158.167.231', '2021-09-07 17:17:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (747, '162.158.165.67', '2021-09-07 17:21:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (748, '162.158.167.231', '2021-09-07 17:28:51', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (749, '162.158.165.67', '2021-09-07 17:36:05', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (750, '162.158.165.67', '2021-09-07 17:37:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (751, '162.158.167.231', '2021-09-07 17:40:34', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (752, '162.158.165.67', '2021-09-07 19:21:02', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (753, '162.158.165.139', '2021-09-07 19:44:29', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (754, '162.158.165.139', '2021-09-07 19:46:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (755, '162.158.166.140', '2021-09-07 20:56:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (756, '162.158.165.139', '2021-09-07 20:59:59', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (757, '162.158.165.67', '2021-09-07 21:01:01', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (758, '162.158.167.231', '2021-09-07 21:02:39', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (759, '162.158.166.108', '2021-09-07 21:07:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (760, '162.158.166.140', '2021-09-07 21:12:56', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (761, '162.158.165.67', '2021-09-07 21:15:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (762, '162.158.165.139', '2021-09-07 23:15:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (763, '162.158.165.139', '2021-09-07 23:26:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (764, '162.158.165.139', '2021-09-07 23:26:27', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (765, '162.158.166.248', '2021-09-08 10:05:37', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (766, '162.158.167.155', '2021-09-08 10:06:44', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (767, '162.158.165.37', '2021-09-08 10:18:28', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (768, '162.158.166.164', '2021-09-08 10:30:24', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (769, '162.158.165.37', '2021-09-08 10:47:43', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (770, '162.158.166.164', '2021-09-08 10:54:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (771, '162.158.166.248', '2021-09-08 10:55:58', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (772, '162.158.167.155', '2021-09-08 10:59:11', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (773, '162.158.166.164', '2021-09-08 11:06:41', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (774, '162.158.166.164', '2021-09-08 11:07:23', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (775, '162.158.166.248', '2021-09-08 11:07:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (776, '162.158.166.248', '2021-09-08 11:08:35', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (777, '162.158.166.164', '2021-09-08 11:09:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (778, '162.158.165.37', '2021-09-08 11:10:15', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (779, '162.158.167.155', '2021-09-08 11:18:50', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (780, '162.158.165.37', '2021-09-08 11:19:30', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (781, '162.158.166.164', '2021-09-08 11:19:38', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (782, '162.158.166.248', '2021-09-15 13:08:12', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (783, '162.158.165.37', '2021-09-15 13:09:06', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (784, '162.158.165.37', '2021-09-15 13:12:53', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (785, '162.158.165.37', '2021-09-15 13:13:22', 1);
INSERT INTO `tb_member_login_log` (`id`, `log_ip`, `log_time`, `member_id`) VALUES (786, '162.158.165.37', '2021-09-15 13:13:37', 1);


#
# TABLE STRUCTURE FOR: tb_member_promotion
#

DROP TABLE IF EXISTS `tb_member_promotion`;

CREATE TABLE `tb_member_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_id` int(11) NOT NULL COMMENT 'promotion_id',
  `member_id` int(11) NOT NULL COMMENT 'member_id',
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: tb_member_transfer_log
#

DROP TABLE IF EXISTS `tb_member_transfer_log`;

CREATE TABLE `tb_member_transfer_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `form` varchar(20) DEFAULT NULL,
  `to` varchar(20) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# TABLE STRUCTURE FOR: tb_member_wallet
#

DROP TABLE IF EXISTS `tb_member_wallet`;

CREATE TABLE `tb_member_wallet` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `member_id` int(8) NOT NULL,
  `wallet_balance` decimal(11,2) DEFAULT 10.00,
  `agent_1_wallet` decimal(11,2) DEFAULT 0.00,
  `agent_2_wallet` decimal(11,2) NOT NULL DEFAULT 0.00,
  `agent_3_wallet` decimal(11,2) NOT NULL DEFAULT 0.00,
  `channel` varchar(255) NOT NULL COMMENT 'DP,WT,BN,UC',
  `last_agent` int(11) NOT NULL DEFAULT 0,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_member_wallet` (`id`, `member_id`, `wallet_balance`, `agent_1_wallet`, `agent_2_wallet`, `agent_3_wallet`, `channel`, `last_agent`, `last_updated`) VALUES (1, 1, '35.00', '0.00', '0.00', '0.00', '', 0, '2021-09-15 13:16:11');


#
# TABLE STRUCTURE FOR: tb_member_withdraw_log
#

DROP TABLE IF EXISTS `tb_member_withdraw_log`;

CREATE TABLE `tb_member_withdraw_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0 Waiting; 1 Success; 2 Have problem',
  `withdraw_credit_agent` int(11) NOT NULL DEFAULT 0 COMMENT '0: no , 1 : cut credit agent',
  `memo` text DEFAULT NULL,
  `return_credit` int(11) NOT NULL DEFAULT 0 COMMENT '0:รอตรวจสอบ Credit, 1: คืน Credit,2: ยืนยัน ไม่คืน Credit',
  `update_time` datetime DEFAULT NULL,
  `react_status` varchar(10) NOT NULL,
  `react_staffid` varchar(10) NOT NULL,
  `react_date` varchar(50) NOT NULL,
  `withdraw_account_id` int(2) DEFAULT NULL,
  `is_bonus` int(2) DEFAULT 0,
  `bonus_detail` text DEFAULT NULL,
  `freeze` varchar(5) NOT NULL,
  `nocost` varchar(11) NOT NULL DEFAULT '0' COMMENT '0: ถอนปกติ,1: ถอนบันทึกไม่ตัด Credit',
  `comment` text NOT NULL,
  `attach` varchar(250) DEFAULT NULL,
  `bank_out` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# TABLE STRUCTURE FOR: tb_otp
#

DROP TABLE IF EXISTS `tb_otp`;

CREATE TABLE `tb_otp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(12) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `ref_code` varchar(5) DEFAULT NULL,
  `send_datetime` datetime DEFAULT NULL,
  `expire_datetime` datetime DEFAULT NULL,
  `verify` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (1, '0955555555', '929879', 'GJXT', '2021-02-22 22:00:04', '2021-02-22 22:15:04', '1');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (2, '0656564512', '399948', 'JITH', '2021-08-05 11:07:12', '2021-08-05 11:22:12', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (3, '0565656456', '484009', 'ENQI', '2021-08-05 11:22:43', '2021-08-05 11:37:43', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (4, '0964545454', '640665', 'PDQK', '2021-08-05 11:24:02', '2021-08-05 11:39:02', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (5, '0560656656', '204996', 'IAXJ', '2021-08-05 11:33:23', '2021-08-05 11:48:23', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (6, '0999999999', '788391', 'KGEM', '2021-08-09 15:07:01', '2021-08-09 15:22:01', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (7, '0888888888', '835450', 'YSDK', '2021-08-09 15:11:13', '2021-08-09 15:26:13', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (8, '0984456121', '625049', 'CFIL', '2021-09-06 14:30:02', '2021-09-06 14:45:02', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (9, '0984451242', '251924', 'SAEH', '2021-09-06 14:33:22', '2021-09-06 14:48:22', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (10, '0984451244', '871344', 'UZNO', '2021-09-06 14:33:56', '2021-09-06 14:48:56', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (11, '0982224411', '979163', 'UTNI', '2021-09-06 17:24:28', '2021-09-06 17:39:28', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (12, '0987754545', '963295', 'GQFH', '2021-09-06 17:25:25', '2021-09-06 17:40:25', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (13, '0988565656', '423986', 'YQNA', '2021-09-06 17:25:54', '2021-09-06 17:40:54', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (14, '0956565656', '359366', 'BTOD', '2021-09-06 17:44:11', '2021-09-06 17:59:11', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (15, '0235323232', '868702', 'GOYA', '2021-09-06 17:34:24', '2021-09-06 17:49:24', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (16, '0256565656', '292429', 'GDIX', '2021-09-06 17:36:27', '2021-09-06 17:51:27', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (17, '0654545545', '800516', 'KVRX', '2021-09-06 17:37:19', '2021-09-06 17:52:19', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (18, '0564545454', '205785', 'QSPA', '2021-09-06 17:38:09', '2021-09-06 17:53:09', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (19, '0854545454', '116756', 'POQX', '2021-09-06 17:39:18', '2021-09-06 17:54:18', '0');
INSERT INTO `tb_otp` (`id`, `phone_number`, `otp`, `ref_code`, `send_datetime`, `expire_datetime`, `verify`) VALUES (20, '0985545454', '707307', 'FGKC', '2021-09-06 17:40:32', '2021-09-06 17:55:32', '0');


#
# TABLE STRUCTURE FOR: tb_sbobet_account
#

DROP TABLE IF EXISTS `tb_sbobet_account`;

CREATE TABLE `tb_sbobet_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL COMMENT 'relationship with id key in tb_member_account',
  `status` int(1) DEFAULT 0 COMMENT '0 inactive; 1 active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `tb_sbobet_account` (`id`, `username`, `userid`, `password`, `member_id`, `status`) VALUES (1, '0955555555', '1597531234525', 'Aa123456', 1, 1);


