<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model {

 public function __construct() {
  parent::__construct();
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);
 
        $this->dbf->cache_on();
        $this->dbb->cache_on();
 }

 public function getOlduserlist() {
  $q = $this->dbf->get('t_member_account');
  return $q->result();
 }

 public function getPassword($phone_number) {
  $q = $this->dbf->query("SELECT password FROM tb_member_account WHERE phone_number = '{$phone_number}'")->row();

  if ($q != '') {
   return $q->password;
  } else {
   return false;
  }
 }

 public function getUserData($member_id) {
  $q = $this->dbf->query("SELECT a.*,b.userid,b.username FROM tb_member_account as a INNER JOIN tb_sbobet_account as b on a.id = b.member_id WHERE a.id = '{$member_id}'");
  return $q->row();
 }

 public function getUserData_mem($member_id) {
  $q = $this->dbf->query("SELECT * FROM tb_member_account WHERE id = '{$member_id}'");
  return $q->row();
 }

 public function chk_login($phone_no, $password) {
  $q = $this->dbf->query("SELECT * FROM tb_member_account WHERE phone_number = '{$phone_no}' AND password = '{$password}'");
  return $q->row();
 }

 public function chk_forgotpass($phone_no) {
  $q = $this->dbf->query("SELECT * FROM tb_member_account WHERE phone_number = '{$phone_no}' LIMIT 1");
  return $q->row();
 }

 public function chk_dup_bank($account_number, $bank_id) {
  $q = $this->dbf->query("SELECT bank_account_number,bank_id FROM tb_member_bank_account WHERE bank_account_number = '{$account_number}' AND bank_id = '{$bank_id}'");

  if ($q->num_rows() > 0) {
   return false;
  } else {
   return true;
  }
 }

 public function chk_dup_idf($idf) {
  $q = $this->dbf->query("SELECT idscode_front FROM tb_member_account WHERE idscode_front = '{$idf}'");

  if ($q->num_rows() > 0) {
   return false;
  } else {
   return true;
  }
 }

 public function amount_sum_affiliate() {
  $member_id = sess_userdata('id');
  $q = $this->dbf->query("SELECT SUM(amount) as sum_amount FROM `tb_member_deposit_aff` WHERE `member_id` = '$member_id' AND status='1' GROUP BY member_id");
  return $q->row()->sum_amount;

}

 public function chk_dup_phoneno($phone_no) {
  $q = $this->dbf->query("SELECT phone_number FROM tb_member_account WHERE phone_number = '{$phone_no}'");

  if ($q->num_rows() > 0) {
   return false;
  } else {
   return true;
  }
 }

 public function login_log($userid) {
  $object = array('log_ip' => $this->input->ip_address(),
   'log_time'               => date('Y-m-d H:i:s'),
   'member_id'              => $userid);
  $this->dbf->insert('tb_member_login_log', $object);

  session_start();
  $q                       = $this->dbf->query("SELECT bank_id FROM tb_member_bank_account WHERE member_id = '$userid'")->row();
  $_SESSION["bank_idshow"] = $q->bank_id;

  // $this->dbf->query("DELETE FROM tb_member_login_log WHERE member_id = $userid AND id NOT IN (SELECT id FROM (SELECT id FROM tb_member_login_log WHERE member_id = $userid ORDER BY log_time DESC LIMIT 10) x )");
 }

 public function before_withdraw($amount) {
  $member_id = sess_userdata('id');
  $object    = array('amount' => $amount,
   'update_date'               => date('Y-m-d H:i:s'),
   'member_id'                 => $member_id);
  $this->dbf->insert('tb_member_before_withdraw', $object);
  return $this->dbf->affected_rows();

 }

 public function getLastLogin($member_id) {
  $q = $this->dbf->query("SELECT log_time FROM tb_member_login_log WHERE member_id = '{$member_id}' ORDER BY id DESC LIMIT 1")->row();
  return $q->log_time;
 }

 public function getMemberDetail($member_id) {
  $q = $this->dbf->query("SELECT * FROM tb_member_account WHERE id = {$member_id}");
  return $q->row();
 }

 public function getMemberBankDetail($member_id) {
  $q = $this->dbf->query("SELECT * FROM tb_member_bank_account WHERE member_id = {$member_id}");
  return $q->row();
 }

 public function suspended_account($member_id) {
  $this->dbf->where('id', $this->member_id);
  $this->dbf->update('tb_member_account', array('status' => '0'));

 }
 public function put_otp($phone_number, $otp, $ref) {
  $nr = $this->dbf->query("SELECT * FROM tb_otp WHERE phone_number = '{$phone_number}'")->num_rows();

  $nowdatetime     = date('Y-m-d H:i:s');
  $nowstr          = strtotime($nowdatetime);
  $fivenow         = $nowstr + (60 * 15);
  $expire_datetime = date("Y-m-d H:i:s", $fivenow);

  if ($nr > 0) {
   $object = array('otp' => $otp,
    'ref_code'            => $ref,
    'send_datetime'       => $nowdatetime,
    'expire_datetime'     => $expire_datetime,
    'verify'              => '0');
   $this->dbf->where('phone_number', $phone_number);
   $this->dbf->update('tb_otp', $object);
  } else {
   $object = array('phone_number' => $phone_number,
    'otp'                          => $otp,
    'ref_code'                     => $ref,
    'send_datetime'                => $nowdatetime,
    'expire_datetime'              => $expire_datetime,
    'verify'                       => '0');
   $this->dbf->insert('tb_otp', $object);
  }
  return $this->dbf->affected_rows();
 }

 public function check_otp($phone_number, $otp) {
  $q  = $this->dbf->query("SELECT * FROM tb_otp WHERE phone_number = '{$phone_number}' AND otp = '{$otp}'");
  $nr = $q->num_rows();
  if ($nr > 0) {
   $this->dbf->where('phone_number', $phone_number);
   $this->dbf->update('tb_otp', array('verify' => '1'));
  }
  return $nr;
 }

 public function isvalid_otp($phone_number) {
  return true;
  // $q = $this->dbf->query("SELECT * FROM tb_otp WHERE phone_number = '{$phone_number}' AND verify = '1'")->num_rows();

  // if($q > 0)
  // {
  //     return true;
  // }
  // else
  // {
  //     return false;
  // }
 }

 public function GetSlotXO($member_id, $password = null) {
  //var_dump($this->dbf);
  $q  = $this->dbf->query("SELECT * FROM tb_sbobet_account WHERE member_id = {$member_id}");
  $nr = $q->num_rows();

  if ($nr < 1) {

   return '';
  } else {
   return $q->row();
  }
 }

 public function GetLive22($member_id, $password = null) {
  $q  = $this->dbf->query("SELECT * FROM tb_sbobet_account WHERE member_id = {$member_id}");
  $nr = $q->num_rows();

  if ($nr < 1) {
   return '';
  } else {
   return $q->row();
  }
 }

 public function aff_encode($id) {
  $id     = sprintf('%07d', $id);
  $id_str = (string) $id;
  $offset = rand(0, 9);
  // $offset  = 9;
  $encoded = chr(79 + $offset);
  for ($i = 0, $len = strlen($id_str); $i < $len; ++$i) {
   $encoded .= chr(65 + $id_str[$i] + $offset);
  }
  return $encoded;
 }

 public function find_aff_code($code) {
  $q  = $this->dbf->query("SELECT id FROM tb_member_account WHERE aff_reg_code = '{$code}'");
  $nr = $q->num_rows();

  if ($nr < 1) {

   return null;
  } else {
   return $q->row()->id;
  }

 }

 public function register($data) {
  $ref_id   = $this->session->userdata('ref_id');
  $ref_id   = $data['ref_id'];
  $ref_code = $data['ref_code'];
  $name     = $data['name'] . " " . $data['surname'];
  $phone_no = $data['phone_number'];
  $password = $data['password'];

  //select find ref_id
  if ($ref_code != "") {
   $ref_id = $this->find_aff_code($ref_code);
  }
  if (trim($ref_id) == "" || $ref_id == "0") {
   $ref_id = null;
  }

  // $api_data = array();
  // $api_data = $this->CreateMember($password, $phone_no, $name);

  // $api_data = json_decode($api_data, true);
  // // print_r($api_data['status']);

  // if ($api_data['status'] == 'true') {
  $api_return_username   = $api_data['username'];
  $api_return_account_id = $api_data['account_id'];
  $api_return_password   = $api_data['password'];
  $obj                   = array();
  $obj                   = array('phone_number' => $data['phone_number'],
   'name'                                        => $data['name'],
   'surname'                                     => $data['surname'],
   'line_id'                                     => $data['line_id'],
   'referer_id'                                  => $ref_id,
   'regis_date'                                  => date('Y-m-d H:i:s'),
   'regis_ip'                                    => $this->input->ip_address(),
   'regis_form'                                  => $data['know_form'],
   'bonus_status'                                => $data['bonus_status'],
   'referer_bonus'                               => '0',
   'idscode_front'                               => $data['identification_front'],
   'idscode_back'                                => $data['identification_back'],
   'password'                                    => $data['password']);

  if ($this->session->userdata('ref_id')) {
   $obj['referer_bonus'] = '1';
  }

  $this->dbf->insert('tb_member_account', $obj);
  $member_id = $this->dbf->insert_id();

  // เพิ่มยอด wallet aff กรณี config == aff1
  if ($ref_id != null) {
   $check_aff1    = $this->withdraw_config(1)->aff_promotion_np;
   $bonus_per_aff = $this->withdraw_config(1)->bonus_per_aff;
   if ($check_aff1 == 1) {
    // เข้าเงื่อนไข AFF1

    // insert log bonus หากต้องการให้ admin อนุมัติก่อน
    // $aff_log = $this->insert_aff_log_auto($member_id, $bonus_per_aff);
   }
  }

  $obsbo = array();
  $obsbo = array('username' => $data['phone_number'],
      'password'                => $data['password'],
      'userid'                  => $data['identification_front'],
      'member_id'               => $member_id,
      'status'                  => 1,
  );
  $this->dbf->insert('tb_sbobet_account', $obsbo);

  $object_wallet_aff = array('member_id' => $member_id,
   'wallet_balance'                       => '0',
   'wallet_balance_2'                     => '0');
  $this->dbf->insert('tb_member_aff_wallet', $object_wallet_aff);

  $objwallet = array('member_id' => $member_id,
   'wallet_balance'               => 0);
  $this->dbf->insert('tb_member_wallet', $objwallet);

  switch ($data['bank_id']) {
  case '014':
   $bank_name = "SCB";
   break;
  case '002':
   $bank_name = "BBL";
   break;
  case '004':
   $bank_name = "KBANK";
   break;
  case '006':
   $bank_name = "KTB";
   break;
  case '034':
   $bank_name = "BAAC";
   break;
  case '011':
   $bank_name = "TMB";
   break;
  case '022':
   $bank_name = "CIMB";
   break;
  case '024':
   $bank_name = "UOB";
   break;
  case '025':
   $bank_name = "BAY";
   break;
  case '030':
   $bank_name = "GSB";
   break;
  case '073':
   $bank_name = "LHBANK";
   break;
  case '065':
   $bank_name = "TBANK";
   break;
  case '067':
   $bank_name = "TISCO";
   break;
  case '069':
   $bank_name = "KKP";
   break;

  default:
   $bank_name = "NULL";
   break;
  }

  $account_obj = array('bank_account_number' => $data['bank_account_number'],
   'bank_name'                                => $bank_name,
   'bank_id'                                  => $data['bank_id'],
   'member_id'                                => $member_id,
   'name'                                     => $data['name'],
   'surname'                                  => $data['surname']);

  $this->dbf->insert('tb_member_bank_account', $account_obj);

  $aff_code = $this->aff_encode($member_id);
  $this->dbf->where('id', $member_id);
  $this->dbf->update('tb_member_account', array('aff_reg_code' => $aff_code));

  if ($this->session->userdata('ref_id')) {
   $aff_data = array('referer_id' => $this->session->userdata('ref_id'),
    'referee_id'                   => $member_id,
    'regis_form'                   => $data['know_form'],
    'datetime'                     => date('Y-m-d H:i:s'));
   $this->dbf->insert('tb_affiliate', $aff_data);
  }

  $this->_login($member_id);
  $this->session->unset_userdata('ref_id');

  return true;
  // } else {
  //     return false;
  // }
 }

 public function register_api_1()
 {

     $member_id = sess_userdata('id');

     $user_data = $this->getUserData_mem($member_id);
     $password  = $user_data->password;
     $phone_no  = $user_data->phone_number;
     $name      = $user_data->name;
     $ref_id    = $user_data->referer_id;

     $api_data  = array();
     $api_data  = $this->CreateMember_api1($password, $phone_no, $name,$member_id);
     $api_data  = json_decode($api_data, true);
     // print_r($api_data['status']);

     if ($api_data['status'] == 'true') {

         $api_return_username   = $api_data['username'];
         $api_return_account_id = $api_data['account_id'];
         $api_return_password   = $api_data['password'];

         $obsbo = array();
         $obsbo = array('username' => $api_return_username,
             'password'                => $api_return_password,
             'userid'                  => $api_return_account_id,
             'member_id'               => $member_id,
             'status'                  => 1,
         );
         $this->dbf->insert('tb_agent_1_account', $obsbo);

  
         return true;
     } else {
         return false;
     }
 }
 public function register_api_2()
 {

     $member_id = sess_userdata('id');

     $user_data = $this->getUserData_mem($member_id);
     $password  = $user_data->password;
     $phone_no  = $user_data->phone_number;
     $name      = $user_data->name;
     $ref_id    = $user_data->referer_id;
     $api_data  = array();
     $api_data  = $this->CreateMember_api2($password, $phone_no, $name,$member_id);
     $api_data  = json_decode($api_data, true);
     // print_r($api_data['status']);

     if ($api_data['status'] == 'true') {

         $api_return_username   = $api_data['username'];
         $api_return_account_id = $api_data['account_id'];
         $api_return_password   = $api_data['password'];

         $obsbo = array();
         $obsbo = array('username' => $api_return_username,
             'password'                => $api_return_password,
             'userid'                  => $api_return_account_id,
             'member_id'               => $member_id,
             'status'                  => 1,
         );
         $this->dbf->insert('tb_agent_2_account', $obsbo);

         return true;
     } else {
         return false;
     }
 }
 public function register_api_3()
 {

     $member_id = sess_userdata('id');

     $user_data = $this->getUserData_mem($member_id);
     $password  = $user_data->password;
     $phone_no  = $user_data->phone_number;
     $name      = $user_data->name;
     $ref_id    = $user_data->referer_id;
    
     $api_data  = array();
     $api_data  = $this->CreateMember_api3($password, $phone_no, $name,$member_id);
     $api_data  = json_decode($api_data, true);
     // print_r($api_data['status']);

     if ($api_data['status'] == 'true') {

         $api_return_username   = $api_data['username'];
         $api_return_account_id = $api_data['account_id'];
         $api_return_password   = $api_data['password'];

         $obsbo = array();
         $obsbo = array('username' => $api_return_username,
             'password'                => $api_return_password,
             'userid'                  => $api_return_account_id,
             'member_id'               => $member_id,
             'status'                  => 1,
         );
         $this->dbf->insert('tb_agent_3_account', $obsbo);

         return true;
     } else {
         return false;
     }
 }
 public function register_api_4()
 {

     $member_id = sess_userdata('id');

     $user_data = $this->getUserData_mem($member_id);
     $password  = $user_data->password;
     $phone_no  = $user_data->phone_number;
     $name      = $user_data->name;
     $ref_id    = $user_data->referer_id;
     $api_data  = array();
     $api_data  = $this->CreateMember_api4($password, $phone_no, $name,$member_id);
     $api_data  = json_decode($api_data, true);
     // print_r($api_data['status']);

     if ($api_data['status'] == 'true') {

         $api_return_username   = $api_data['username'];
         $api_return_account_id = $api_data['account_id'];
         $api_return_password   = $api_data['password'];

         $obsbo = array();
         $obsbo = array('username' => $api_return_username,
             'password'                => $api_return_password,
             'userid'                  => $api_return_account_id,
             'member_id'               => $member_id,
             'status'                  => 1,
         );
         $this->dbf->insert('tb_agent_4_account', $obsbo);

   
         return true;
     } else {
         return false;
     }
 }

 public function insert_aff_log_auto($member_id, $amount) {

  $aff_log = array('member_id' => $member_id,
   'amount'                     => $amount,
   'datetime'                   => date('Y-m-d H:i:s'),
   'status'                     => '0',
   'actor_id'                   => '0',
   'memo'                       => "เงื่อนไข Aff1 ยอดอัตโนมัติ",
  );

  $this->dbf->insert('tb_member_deposit_aff', $aff_log);
  return $this->dbf->affected_rows();
 }

 public function checkuseragent1($member_id) {
  $q = $this->dbf->query("SELECT COUNT(*) AS 'count',username,password FROM tb_agent_1_account WHERE member_id = '{$member_id}'")->row();
  return $q;
}
public function checkuseragent2($member_id) {
  $q = $this->dbf->query("SELECT COUNT(*) AS 'count',username,password FROM tb_agent_2_account WHERE member_id = '{$member_id}'")->row();
  return $q;
}
public function checkuseragent3($member_id) {
  $q = $this->dbf->query("SELECT COUNT(*) AS 'count',username,password FROM tb_agent_3_account WHERE member_id = '{$member_id}'")->row();
  return $q;
}
// public function checkuseragent4($member_id) {
//   $q = $this->dbf->query("SELECT COUNT(*) AS 'count',username,password FROM tb_agent_4_account WHERE member_id = '{$member_id}'")->row();
//   return $q;
// }




 public function update_aff_code($member_id) {

  $member_id = sess_userdata('id');
  $aff_code  = $this->aff_encode($member_id);
  $this->dbf->where('id', $member_id);
  $this->dbf->update('tb_member_account', array('aff_reg_code' => $aff_code));
  return $this->dbf->affected_rows();

 }

 public function member_dep_aff_count($member_id) {
  $q = $this->dbf->query("SELECT COUNT(*) AS 'count' FROM tb_member_deposit_aff WHERE member_id = '{$member_id}'")->row();
  return $q->count;
 }

 public function withdraw_count($member_id) {
  $q = $this->dbf->query("SELECT COUNT(*) AS 'count' FROM tb_member_withdraw_log WHERE member_id = '{$member_id}' AND DATE(datetime) = DATE(NOW())")->row();
  return $q->count;
 }

 public function withdraw_sum($member_id) {
  $q = $this->dbf->query("SELECT SUM(amount) AS 'sum_amount' FROM tb_member_withdraw_log WHERE member_id = '{$member_id}' AND DATE(datetime) = DATE(NOW())")->row();
  return $q->sum_amount;
 }

 public function withdraw_remain_from_config($id) {
  $q = $this->dbb->query("SELECT * FROM tb_frontend_config WHERE id = '{$id}'")->row();
  return $q->max_withdraw_per_day;
 }

 public function withdraw_status_from_config($id) {
  $q = $this->dbb->query("SELECT * FROM tb_frontend_config WHERE id = '{$id}'")->row();
  return $q->status;
 }

 public function withdraw_config($id) {
  $q = $this->dbb->query("SELECT * FROM tb_frontend_config WHERE id = '{$id}'")->row();
  return $q;
 }

 private function _login($member_id = null) {
  if ($member_id != null) {
   $user_data = $this->dbf->query("SELECT * FROM tb_member_account WHERE id = " . $member_id)->row();
   $array     = array('usess' => $user_data);
   $this->login_log($member_id);
   $this->session->set_userdata($array);
  }
 }

 public function getDepositCount($member_id) {
  $q = $this->dbf->query("SELECT id FROM tb_member_deposit_log WHERE member_id = $member_id AND channel != 'BONUS'")->num_rows();
  return $q;
 }

 public function getRequestDeposit($member_id) {
  $q = $this->dbb->query("SELECT SUM(amount) as amount FROM tb_member_auto_problem WHERE status = 0 AND member_id = " . $member_id)->row();
  return $q->amount;
 }

 public function getBonusCount($member_id) {
  $q = $this->dbf->query("SELECT id FROM tb_member_deposit_log WHERE member_id = $member_id AND channel == 'BONUS'")->num_rows();
  return $q;
 }

 public function currentWallet() {
  $member_id = sess_userdata('id');
  $q         = $this->dbf->query("SELECT default_topup_wallet FROM tb_member_account WHERE id = " . $member_id)->row();
  return $q->default_topup_wallet;
 }

 public function setDefaultWallet($wallet_id) {
  $member_id = sess_userdata('id');
  $this->dbf->where('id', $member_id);
  $this->dbf->update('tb_member_account', array('default_topup_wallet' => $wallet_id));
  return $this->dbf->affected_rows();
 }

 public function getWithdrawCredit($amount) {
  // ยิงไป api ถอน ทั้ง 3
  $member_id  = sess_userdata('id');
  $q          = $this->dbf->query("SELECT * FROM tb_member_wallet WHERE member_id = " . $member_id)->row();

  $qu1          = $this->dbf->query("SELECT username FROM tb_agent_1_account WHERE member_id = " . $member_id)->row();
  $uagent1   = $qu1->username;

  $qu2          = $this->dbf->query("SELECT username FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
  $uagent2   = $qu2->username;

  $qu3          = $this->dbf->query("SELECT username FROM tb_agent_3_account WHERE member_id = " . $member_id)->row();
  $uagent3   = $qu3->username;

  $db1 = $q->agent_1_wallet;
  $db2 = $q->agent_2_wallet;
  $db3 = $q->agent_3_wallet; 

  $credit_agent1 = $db1;
  $credit_agent2 = $db2;
  $credit_agent3 = $db3;
    $wd1 = true;
    $wd2 = true;
    $wd3 = true; 
  $sum_credit = $db1 + $db2 + $db3;
  if ($sum_credit == $amount) {
      if ($credit_agent1 > 0) {
          // withdraw api
          $wd1 =  $this->withdraw_api_1($uagent1,$credit_agent1);
      }
      if ($credit_agent2 > 0) {
            // withdraw api
      $wd2 =  $this->withdraw_api_2($uagent2,$credit_agent2);
      }
      if ($credit_agent3 > 0) {
            // withdraw api
      $wd3 =  $this->withdraw_api_3($uagent3,$credit_agent3);
      }

        
      if ($wd1 == true && $wd2 == true && $wd3 == true) {
              // update credit = 0
      $this->dbf->where('member_id', $member_id);
      $this->dbf->update('tb_member_wallet', array('wallet_balance' => '0','agent_1_wallet' => '0','agent_2_wallet' => '0','agent_3_wallet' => '0','last_updated' => date('Y-m-d H:i:s')));

      return '0';
      }
      else {
          return '1';
      }

    }
    else {
      return '1';
    }
  

 }

 private function updateWallet($amount) {
  $member_id = sess_userdata('id');
  $datenow   = date('Y-m-d H:i:s');
  $this->dbf->where('member_id', $member_id);
  $this->dbf->update('tb_member_wallet', array('wallet_balance' => $amount, 'last_updated' => $datenow));

  $usdata      = $this->getUserData($member_id);
  $turn_amount = $usdata->turn_amount;

  if ($amount >= $turn_amount || $amount < 6) {
    $this->clearTurnAmount();
    $this->clearMinWithdraw();
    $this->clearoldDeposit();
}
return $this->dbf->affected_rows();
}

private function clearoldDeposit() {
$member_id = sess_userdata('id');
$this->dbf->where('id', $member_id);
$this->dbf->update('tb_member_deposit_log', array('is_bonus' => 1));
return $this->dbf->affected_rows();

}

 private function clearTurnAmount() {
  $member_id = sess_userdata('id');
  $this->dbf->where('id', $member_id);
  $this->dbf->update('tb_member_account', array('turn_amount' => 0,'max_withdraw_by_turn' => 0));
  return $this->dbf->affected_rows();

 }
 private function clearMinWithdraw() {
  $member_id = sess_userdata('id');
  $this->dbf->where('member_id', $member_id);
  $this->dbf->update('tb_member_bonus', array('min_withdraw_amount' => 0));
  return $this->dbf->affected_rows();

 }
  
 public function GetUserCredit($username) {
  $member_id = sess_userdata('id');
  return 0;
 }

 private function new_user_regis_aff($member_id) {
  $member_id = sess_userdata('id');

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://loginbackend.betclicone.com/update_affiliate_credit.php?new_user=true&aid=0&mid=' . $member_id);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_field));
  curl_setopt($curl, CURLOPT_HTTPHEADER, $http_header);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_REFERER, 'https://pay.betclicone.com');
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36');
  $result = curl_exec($curl);
  curl_close($curl);

  return 0;

 }

 
 private function aff_bonus_check($mid) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://loginbackend.betclicone.com/update_affiliate_credit.php?aid=0&mid=' . $mid);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_field));
  curl_setopt($curl, CURLOPT_HTTPHEADER, $http_header);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_REFERER, 'https://pay.betclicone.com');
  curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36');
  $result = curl_exec($curl);
  curl_close($curl);

  return 0;
 }

 private function WithdrawCredit($username, $accountID, $amount) {
  $data = [
    "accountID" => $accountID,
    "amount"    => $amount,
];
return 0;

 }

 public function update_all_agent_credit() {
      
  $member_id = sess_userdata('id');
  $datenow   = date('Y-m-d H:i:s');

  //check all in db if > 0 check api
$q = $this->dbf->query("SELECT * FROM tb_member_wallet WHERE member_id = {$member_id}")->row();
  $db1 = $q->agent_1_wallet;
  $db2 = $q->agent_2_wallet;
  $db3 = $q->agent_3_wallet;


  $qu1          = $this->dbf->query("SELECT username FROM tb_agent_1_account WHERE member_id = " . $member_id)->row();
  $uagent1   = $qu1->username;

  $qu2          = $this->dbf->query("SELECT username FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
  $uagent2   = $qu2->username;

  $qu3          = $this->dbf->query("SELECT username FROM tb_agent_3_account WHERE member_id = " . $member_id)->row();
  $uagent3   = $qu3->username;

  //get credit agent 1
  if ($uagent1 != "" && $db1 > 0) {
      $agent_credit_1 = $this->GetUserCredit_api1($uagent1);
  }
  else {
     $agent_credit_1 = 0;
  }
  //get credit agent 2
  if ($uagent2 != "" && $db2 > 0) {
      $agent_credit_2 = $this->GetUserCredit_api2($uagent2);
  }
  else {
     $agent_credit_2 = 0;
  }

  //get credit agent 3
  if ($uagent3 != "" && $db3 > 0) {
      $agent_credit_3 = $this->GetUserCredit_api3($uagent3);
  }
  else {
     $agent_credit_3 = 0;
  } 

  // update tb_member_wallet
  $this->dbf->where('member_id', $member_id);
  $this->dbf->update('tb_member_wallet', array('agent_1_wallet' => $agent_credit_1,'agent_2_wallet' => $agent_credit_2,'agent_3_wallet' => $agent_credit_3, 'last_updated' => $datenow));

  return $this->dbf->affected_rows();

}

 public function login_game($username, $password) { ///partner/launch
  $post_field = array(
    'username' => $username,
    'password' => $password,
);
return 0; 
 }
 public function generateRandomNumber($length = 1) {
  return substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length);
 }

 public function generate_username($member_id,$agent) {
       
  $member_id = intval($member_id);
  $number = sprintf('%06d', $member_id); 
  $number_gen = $this->generateRandomNumber();
  $gennumber  = $agent . $number_gen . $number;
  //return
  return $gennumber; 
}

 public function getRandomUserName() {

  $q         = $this->dbf->query("SELECT COALESCE(id, 0) as id FROM tb_member_account ORDER BY id desc limit 1")->row();
  $member_id = $q->id;
  $member_id = intval($member_id) + 1;
  // 2211000001
  $number_gen = $this->generateRandomNumber();
  $number     = sprintf('%06d', $member_id);
  // $gennumber = $this->agent_username.$number;
  $gennumber = $this->AppID . $number_gen . $number;
  //return
  return $gennumber;

 }

 private function CreateMember($password, $mobile, $name) {
  // Create User
  $username = $this->getRandomUserName();
  $request   = '';
  $sig      = '';
  $post = [
    'username' => $username,
    'cmd' => 'register',
    'password' => $password,
];
$response = $this->_p($sig,$request,$post);
  return $response;

 }


 private function CreateMember_api1($password, $mobile, $name,$member_id)
 {
      
     include $ROOT_PATH . 'application/controllers/api/agent/Joker.php';
     $api  = new joker;
     $username = $this->generate_username($member_id,"j");
     $register = $api->register($username,$password);

     if ($register == true) {
         $response = array(
             'status'     => 'true',
             'message'    => 'Create Member Success',
             'username'   =>  $username,
             'password'   => $password,
             'account_id' => '',
         );  
         return json_encode($response);
     }
     else {
         $response = array(
             'status'     => 'false',
             'message'    => 'Error',
         );  
         return json_encode($response);
     }
         
      

 }





 public function GetUserCredit_api1($username) {

     include $ROOT_PATH . 'application/controllers/api/agent/Joker.php';
     $api  = new joker;
     $result = $api->getCredit($username);
      return $result;
 }
 public function deposit_api_1($username,$amount)
 {

     include $ROOT_PATH . 'application/controllers/api/agent/Joker.php';
     $api  = new joker;
     $result = $api->deposit($username,$amount);

     if ($result == true) {
         return true;
     }
     else {
         return false;
     }
 }

 public function withdraw_api_1($username,$amount)
 {

     include $ROOT_PATH . 'application/controllers/api/agent/Joker.php';
     $api  = new joker;
     $result = $api->withdraw($username,$amount);

     if ($result == true) {
       return true;
     }
     else {
         return  false;
     }
 }

 public function gamelist_api1() {
     include $ROOT_PATH . 'application/controllers/api/agent/Joker.php';
     $api  = new joker;
     $gamelist = $api->gamelist();
     return $gamelist;
 }



 private function CreateMember_api2($password, $mobile, $name,$member_id)
 {
    //  include $ROOT_PATH . 'application/controllers/api/agent/Ag.php';
    //  $api  = new ag;
    //  $username = $this->generate_username($member_id,"nk");
    //  $register = $api->register($username,$password,$name,'nk',$mobile,'nk@gmail.com'); 

    //  if ($register == true) {
    //      $response = array(
    //          'status'     => 'true',
    //          'message'    => 'Create Member Success',
    //          'username'   =>  $username,
    //          'password'   => $password,
    //          'account_id' => '',
    //      );  
    //      return json_encode($response);
    //  }
    //  else {
    //      $response = array(
    //          'status'     => 'false',
    //          'message'    => 'Error',
    //      );  
    //      return json_encode($response);
    //  }
         

     include $ROOT_PATH . 'application/controllers/api/agent/Imi.php';
     $api  = new imi;
     $username = $this->generate_username($member_id,"imin");
     $register = $api->register($username,$password,$mobile,$name); 
   
     if ($register == true) {
         $response = array(
             'status'     => 'true',
             'message'    => 'Create Member Success',
             'username'   =>  $username,
             'password'   => $password,
             'account_id' => '',
         );  
         return json_encode($response);
     }
     else {
         $response = array(
             'status'     => 'false',
             'message'    => 'Error',
         );  
         return json_encode($response);
     }
         
        
 }

 public function GetUserCredit_api2($username) {
     include $ROOT_PATH . 'application/controllers/api/agent/Ag.php';
     $api  = new ag;
     $member_id = sess_userdata('id');
     $qu2          = $this->dbf->query("SELECT password FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
     $password   = $qu2->password;

     $result = $api->balance($username,$password);
       // ถ้า return credit มาเลย
    return $result;


 }
 public function withdraw_api_2($username,$amount)
 { 
    //  include $ROOT_PATH . 'application/controllers/api/agent/Ag.php';
    //  $api  = new ag;
    //  $member_id = sess_userdata('id');
    //  $qu2          = $this->dbf->query("SELECT password FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
    //  $password   = $qu2->password;
    //  $result = $api->withdraw($username,$password,$amount);

    //  if ($result == true) {
    //      return true;
    //  }
    //  else {
    //      return false;
    //  }

    include $ROOT_PATH . 'application/controllers/api/agent/Imi.php';
     $api  = new imi;
     $member_id = sess_userdata('id');
     $qu2          = $this->dbf->query("SELECT password FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
     $password   = $qu2->password;
     $result = $api->withdraw($username,$amount);

     if ($result == true) {
         return true;
     }
     else {
         return false;
     }


 }
 public function deposit_api_2($username,$amount)
 { 
    //  include $ROOT_PATH . 'application/controllers/api/agent/Ag.php';
    //  $api  = new ag;
    //  $member_id = sess_userdata('id');
    //  $qu2          = $this->dbf->query("SELECT password FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
    //  $password   = $qu2->password;
    //  $result =  $api->deposit($username,$password,$amount);

    //  if ($result == true) {
    //     return true;
    //  }
    //  else {
    //      return false;
    //  }

     include $ROOT_PATH . 'application/controllers/api/agent/Imi.php';
     $api  = new imi;
     $member_id = sess_userdata('id');
     $qu2          = $this->dbf->query("SELECT password FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
     $password   = $qu2->password;
     $result = $api->deposit($username,$amount);

     if ($result == true) {
         return true;
     }
     else {
         return false;
     }
 }

 public function gamelist_api2() {
     include $ROOT_PATH . 'application/controllers/api/agent/Ag.php';
     $api  = new ag;
     $gamelist = $api->gamelist();
     return $gamelist;
 }


 public function playgame_api2($game_code) {
    //  include $ROOT_PATH . 'application/controllers/api/agent/Ag.php';
    //  $api  = new ag;
    //  $member_id = sess_userdata('id');
    //  $qu2          = $this->dbf->query("SELECT username,password FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
    //  $username   = $qu2->username;
    //  $password   = $qu2->password;

    //  $gamelist = $api->play_game($user_name,$password,$game_code);
    //  return $gamelist;
    include $ROOT_PATH . 'application/controllers/api/agent/Imi.php';
     $api  = new imi;
     $member_id = sess_userdata('id');
     $qu2          = $this->dbf->query("SELECT username,password FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
     $username   = $qu2->username;
     $password   = $qu2->password;

     $gamelist = $api->play_game($username,$password);
     return $gamelist;
     
 }

 private function CreateMember_api3($password, $mobile, $name,$member_id)
 {
     include $ROOT_PATH . 'application/controllers/api/agent/Ufa.php';
     $api  = new ufa;  
     $username = $this->generate_username($member_id,"ufiqlp1");
     $register = $api->CreateMember($password,$username); 

     if ($register == true) {
         $response = array(
             'status'     => 'true',
             'message'    => 'Create Member Success',
             'username'   =>  $username,
             'password'   => $password,
             'account_id' => '',
         );  
         return json_encode($response);
     }
     else {
         $response = array(
             'status'     => 'false',
             'message'    => 'Error',
         );  
         return json_encode($response);
     }
         
        
 }

 public function GetUserCredit_api3($username) { 
     include $ROOT_PATH . 'application/controllers/api/agent/Ufa.php';
     $api  = new ufa;  

     $result = $api->GetUserCredit($username);
       // ถ้า return credit มาเลย
    return $result;


    
 }

 public function deposit_api_3($username,$amount) {
     include $ROOT_PATH . 'application/controllers/api/agent/Ufa.php';
     $api  = new ufa; 
     $result =  $api->deposit($username,$amount);

     if ($result == true) {
        return true;
     }
     else {
         return false;
     }


 }

 public function withdraw_api_3($username,$amount)
 { 
     include $ROOT_PATH . 'application/controllers/api/agent/Ufa.php';
     $api  = new ufa; 
     $result =  $api->withdraw($username,$amount);

     if ($result == true) {
        return true;
     }
     else {
         return false;
     }

 }


 public function transfer_api_1() {
     $member_id = sess_userdata('id');

     // get credit from wallet
     $q = $this->dbf->query("SELECT * FROM tb_member_wallet WHERE member_id = {$member_id}")->row();
     $db1 = $q->agent_1_wallet;
     $db2 = $q->agent_2_wallet;
     $db3 = $q->agent_3_wallet;
     $wallet_balance   = $q->wallet_balance;
     
     $qu1          = $this->dbf->query("SELECT username FROM tb_agent_1_account WHERE member_id = " . $member_id)->row();
     $uagent1   = $qu1->username;

     $qu2          = $this->dbf->query("SELECT username FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
     $uagent2   = $qu2->username;

     $qu3          = $this->dbf->query("SELECT username FROM tb_agent_3_account WHERE member_id = " . $member_id)->row();
     $uagent3   = $qu3->username;

     // get credit from 2,3
     // $credit_agent1 = ($uagent1 != "") ? $this->GetUserCredit_api1($uagent1) : 0;
     $credit_agent2 = $db2;
     $credit_agent3 = $db3;
     // withdraw credit 2,3
     $wd2 = true;
     $wd3 = true;
     $agent_from = 'WALLET';
     $agent_to = 'JOKER';
     if ($credit_agent2 > 0) {
         // withdraw api
         $wd2 =  $this->withdraw_api_2($uagent2,$credit_agent2);
         $agent_from = 'NIKIGAME';
     }
     if ($credit_agent3 > 0) {
         // withdraw api
         $wd3 =  $this->withdraw_api_3($uagent3,$credit_agent3);
         $agent_from = 'UFABET';
     }
     // return true;
     // // sum credit
     $sum_credit =  $wallet_balance + $credit_agent2 + $credit_agent3; // sum all credit
     // deposit 1
     $amount_from = $db1;
     $amount_to = $db1 + $sum_credit;
     // api deposit 1
     if ($wd2 == true || $wd3 == true) {
         $api_deposit1 = $this->deposit_api_1($uagent1,$sum_credit);
         if ($api_deposit1 == true && $sum_credit > 0) {
             $datenow   = date('Y-m-d H:i:s');
             $this->dbf->where('member_id', $member_id);
             $this->dbf->update('tb_member_wallet', array('agent_1_wallet' => $sum_credit,'wallet_balance' => '0','agent_2_wallet' => '0','agent_3_wallet' => '0', 'last_updated' => $datenow));
             $this->dbf->affected_rows();

             $this->insert_transfer_agent_log($amount_from,$amount_to,$agent_from,$agent_to,$sum_credit);
             return true;
          }
           
          else {
             return false;
         }
     }
     else {
         return false;
     }

    


 }

 public function transfer_api_2() {
     $member_id = sess_userdata('id');

     // get credit from wallet
     $q = $this->dbf->query("SELECT * FROM tb_member_wallet WHERE member_id = {$member_id}")->row();
     $db1 = $q->agent_1_wallet;
     $db2 = $q->agent_2_wallet;
     $db3 = $q->agent_3_wallet;
     $wallet_balance   = $q->wallet_balance;

     $qu1          = $this->dbf->query("SELECT username FROM tb_agent_1_account WHERE member_id = " . $member_id)->row();
     $uagent1   = $qu1->username;

     $qu2          = $this->dbf->query("SELECT username FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
     $uagent2   = $qu2->username;

     $qu3          = $this->dbf->query("SELECT username FROM tb_agent_3_account WHERE member_id = " . $member_id)->row();
     $uagent3   = $qu3->username;
  
     // get credit from 2,3 
     $credit_agent1 = $db1;
     // $credit_agent2 = ($uagent2 != "") ? $this->GetUserCredit_api2($uagent2) : 0;
     $credit_agent3 = $db3;
     // withdraw credit 2,3
     $wd1 = true;
     $wd3 = true;
     $agent_from = 'WALLET';
     $agent_to = 'NIKIGAME';
     if ($credit_agent1 > 0) {
         // withdraw api
         $wd1 =  $this->withdraw_api_1($uagent1,$credit_agent1);
         $agent_from = 'JOKER';
     }
     if ($credit_agent3 > 0) {
         // withdraw api
         $wd3 =  $this->withdraw_api_3($uagent3,$credit_agent3);
         $agent_from = 'UFABET';
     }
     // sum credit
     $sum_credit =  $wallet_balance + $credit_agent1 + $credit_agent3; // sum all credit
     // deposit 2
     $amount_from = $db1;
     $amount_to = $db1 + $sum_credit;
     // api deposit 2
     if ($wd1 == true || $wd3 == true) {
     $api_deposit2 = $this->deposit_api_2($uagent2,$sum_credit);
     if ($api_deposit2 == true && $sum_credit > 0) {
       
         $datenow   = date('Y-m-d H:i:s');
         $this->dbf->where('member_id', $member_id);
         $this->dbf->update('tb_member_wallet', array('agent_2_wallet' => $sum_credit,'wallet_balance' => '0','agent_1_wallet' => '0','agent_3_wallet' => '0', 'last_updated' => $datenow));
         $this->dbf->affected_rows();
         $this->insert_transfer_agent_log($amount_from,$amount_to,$agent_from,$agent_to,$sum_credit);
         return true;
      }
       
      else {
         return false;
     }
     }
     else {
         return false;
     }
    

 }

 public function transfer_api_3() {
     $member_id = sess_userdata('id');

     // get credit from wallet
     $q = $this->dbf->query("SELECT * FROM tb_member_wallet WHERE member_id = {$member_id}")->row();
     $db1 = $q->agent_1_wallet;
     $db2 = $q->agent_2_wallet;
     $db3 = $q->agent_3_wallet;
     $wallet_balance   = $q->wallet_balance;

     $qu1          = $this->dbf->query("SELECT username FROM tb_agent_1_account WHERE member_id = " . $member_id)->row();
     $uagent1   = $qu1->username;

     $qu2          = $this->dbf->query("SELECT username FROM tb_agent_2_account WHERE member_id = " . $member_id)->row();
     $uagent2   = $qu2->username;

     $qu3          = $this->dbf->query("SELECT username FROM tb_agent_3_account WHERE member_id = " . $member_id)->row();
     $uagent3   = $qu3->username;
     // update credit = 0
    
     // get credit from 1,2
     $credit_agent1 = $db1;
     $credit_agent2 = $db2;
     // $credit_agent1 = ($uagent1 != "" && $db1 > 0) ? $this->GetUserCredit_api1($uagent1) : 0;
     // $credit_agent2 = ($uagent2 != "" && $db2 > 0) ? $this->GetUserCredit_api2($uagent2) : 0;
     // $credit_agent3 = ($uagent2 != "") ? $this->GetUserCredit_api3($uagent3) : 0;
     // withdraw credit 1,2
     $wd1 = true;
     $wd2 = true;
     $agent_from = 'WALLET';
     $agent_to = 'UFABET';
     if ($credit_agent1 > 0) {
         // withdraw api
        $wd1 =  $this->withdraw_api_1($uagent1,$credit_agent1);
        $agent_from = 'JOKER';

     }
     if ($credit_agent2 > 0) {
         // withdraw api
         $wd2 =  $this->withdraw_api_2($uagent2,$credit_agent2);
         $agent_from = 'NIKIGAME';
     }
     // sum credit
     
     $sum_credit =  $wallet_balance + $credit_agent1 + $credit_agent2; // sum all credit
     // deposit 1
     $amount_from = $db1;
     $amount_to = $db1 + $sum_credit;
     // api deposit 1
     if ($wd1 == true || $wd2 == true) {
     $api_deposit3 = $this->deposit_api_3($uagent3,$sum_credit);
     if ($api_deposit3 == true && $sum_credit > 0) {
         $datenow   = date('Y-m-d H:i:s');
         $this->dbf->where('member_id', $member_id);
         $this->dbf->update('tb_member_wallet', array('agent_3_wallet' => $sum_credit,'wallet_balance' => '0','agent_1_wallet' => '0','agent_2_wallet' => '0', 'last_updated' => $datenow));
         $this->dbf->affected_rows();
         $this->insert_transfer_agent_log($amount_from,$amount_to,$agent_from,$agent_to,$sum_credit);
         return true;
      }
       
      else {
         return false;
     }
     }
     else {
         return false;
     }
   



 }



}

/* End of file Member_model.php */
/* Location: ./application/models/process/Member_model.php */
