<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Affiliate extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_nothave_username();
        is_login();
    }

    public function index()
    {
        $this->load->model('Aff_model');
        $this->load->model('process/Member_model', 'member_md');

        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
        $data['click_count']         = $this->Aff_model->get_lick_click_count();
        $data['total_referee']       = $this->Aff_model->referee_count();
        $data['total_referee_topup'] = $this->Aff_model->referee_topup_count();
        $data['referee_list']        = $this->Aff_model->referee_list();
        $aff_wallet_1  = $this->Aff_model->aff_wallet_balance()->wallet_balance;
        $aff_wallet_2  = $this->Aff_model->aff_wallet_balance()->wallet_balance_2;
        // add check max per aff
        $affiliate_status = $web_config->affiliate_status; // 1 เปิด 0 ปิด
        $aff_promotion_version = $web_config->aff_promotion_np; // 1 แบบชั้นเดียว , 2 แบบสองชั้น
        $bonus_per_aff_1 = $web_config->bonus_per_aff; // aff 1
        $bonus_per_aff_2  = $web_config->bonus_per_aff_2; // aff 2
        $turn_amount_aff = $web_config->turn_amount_aff;
        $turn_amount_aff_2 = $web_config->turn_amount_aff_2;
        $amount_sum_aff = $this->member_md->amount_sum_affiliate(); // รับแล้วรวม
        $max_aff_per = $web_config->affiliate_max_per_people; // 50
        if ($aff_promotion_version == 1) {
          $turn_aff = $turn_amount_aff;
          $bonus_per_aff = $bonus_per_aff_1;
        }
        else {
          $turn_aff = $turn_amount_aff_2;
          $bonus_per_aff = $bonus_per_aff_2;
        }
        $turn_amount      = db_userdata('turn_amount');
        $max_aff_amount = $max_aff_per * $bonus_per_aff;
         // add check max per aff
        //  $max_aff_amount = 2500;
        // $number_mid = sprintf('%07d', sess_userdata('id'));
        // $aff_links = $this->aff_encode($number_mid);
        // $de_aff_links = $this->aff_decode($aff_links);
        $aff_links = $this->Aff_model->get_aff_links();
        $data['turn_amount'] = $turn_amount;
        $data['max_aff_refer'] = $max_aff_per;
        $data['bonus_per_aff'] =  $bonus_per_aff;
        $data['max_aff_amount'] = $max_aff_amount;
        $data['sum_aff'] = $amount_sum_aff;
        $data['turn_aff'] = $turn_aff;
        $data['aff_max'] = $max_aff_per;
        $data['aff_status'] = $affiliate_status;
        $data['aff_links'] = $aff_links;
        $data['de_aff_links'] = $aff_links;
        $data['aff_wallet_balance'] = $aff_wallet_1 + $aff_wallet_2;
        $data['page_header']         = 'affiliate/header';
        $data['page_content']        = 'affiliate/content';
        $data['page_js']             = 'affiliate/js';
        $this->load->view('layout/layout_navigator', $data, false);
    }
    public function aff_encode($id) {
        $id_str = (string) $id;
        // $offset = rand(0, 9);
        $offset = 9;
        $encoded = chr(79 + $offset);
        for ($i = 0, $len = strlen($id_str); $i < $len; ++$i) {
          $encoded .= chr(65 + $id_str[$i] + $offset);
        }
        return $encoded;
      }
      
    public function aff_decode($encoded) {
        $offset = ord($encoded[0]) - 79;
        $encoded = substr($encoded, 1);
        for ($i = 0, $len = strlen($encoded); $i < $len; ++$i) {
          $encoded[$i] = ord($encoded[$i]) - $offset - 65;
        }
        return (int) $encoded;
      }
    public function apply_aff_reward()
    {
        header('Content-Type: application/json');
        $this->load->model('Aff_model');
        $this->load->model('process/Member_model', 'member_md');
        $web_config     = $this->member_md->withdraw_config(1);
        $aff_wallet_1  = $this->Aff_model->aff_wallet_balance()->wallet_balance;
        $aff_wallet_2  = $this->Aff_model->aff_wallet_balance()->wallet_balance_2;
        $turn_amount      = db_userdata('turn_amount');
        $sum_aff_wallet = $aff_wallet_1 + $aff_wallet_2; // ยังไม่ได้รับ
         // add check max per aff
        $affiliate_status = $web_config->affiliate_status; // 1 เปิด 0 ปิด
        $aff_promotion_version = $web_config->aff_promotion_np; // 1 แบบชั้นเดียว , 2 แบบสองชั้น
        $bonus_per_aff_1 = $web_config->bonus_per_aff; // aff 1
        $bonus_per_aff_2  = $web_config->bonus_per_aff_2; // aff 2
        $turn_amount_aff = $web_config->turn_amount_aff;
        $turn_amount_aff_2 = $web_config->turn_amount_aff_2;
        $amount_sum_aff = $this->member_md->amount_sum_affiliate(); // รับแล้วรวม
        $max_aff_per = $web_config->affiliate_max_per_people; // 50
        if ($aff_promotion_version == 1) {
          $turn_aff = $turn_amount_aff;
          $bonus_per_aff = $bonus_per_aff_1;
        }
        else {
          $turn_aff = $turn_amount_aff_2;
          $bonus_per_aff = $bonus_per_aff_2;
        }
        $max_aff_amount = $max_aff_per * $bonus_per_aff;
        $amount_aff_remain = $max_aff_amount - $amount_sum_aff; // มากสุดรับได้

        if ($sum_aff_wallet > $amount_aff_remain) {
          $sum_aff_wallet = $amount_aff_remain; 
        }
      
       
         // add check max per aff
        if ($affiliate_status == 1 && $sum_aff_wallet > 1 && $turn_amount == 0 && $amount_sum_aff < $max_aff_amount) {
          // add หลังบ้าน

            if ($sum_aff_wallet > $amount_aff_remain) {
              $sum_aff_wallet = $amount_aff_remain;
            }

              $aff_log = array('member_id' => sess_userdata('id'),
              'amount'                         => $sum_aff_wallet,
              'datetime'                       => date('Y-m-d H:i:s'),
              'status'                         => '0',
              'actor_id'                        => '0',
              'memo'                           => "แจ้งรับ Affiliate จำนวน $sum_aff_wallet บาท",
            );
              $this->Aff_model->insert_logs($aff_log); // เดี๋ยวไปดัก auto ตรงนี้
              $this->Aff_model->clear_aff_wallet();
              $response['status']  = 'success';
              $response['message'] = 'แจ้งขอรับถุงเงินเรียบร้อยแล้ว ขอให้โชคดีคะ';
        }
        else {
          if ($affiliate_status == 0) {
            $response['status']  = 'error';
            $response['message'] = 'ขณะนี้หมดระยะเวลากิจกรรมเครดิตฟรีแล้วนะคะ ติดตามกิจกรรมเครดิตฟรีในรอบถัดไปได้ที่ @PGSLOT789 !';
            echo json_encode($response);
            exit();
          }

          if ($amount_aff_remain == 0 ) {
            $response['status']  = 'error';
            $response['message'] = 'ขออภัยค่ะ สิทธิ์ในการรับโปรโมชั่นได้สิ้นสุด';
            echo json_encode($response);
            exit();
          }
  
          if ($turn_amount > 0 ) {
            $response['status']  = 'error';
            $response['message'] = 'ขออภัยค่ะ คุณติดเทิร์นไม่สามารถทำรายการได้';
            echo json_encode($response);
            exit();
          }
  
          if ($sum_aff_wallet < 1) {
              $response['status']  = 'error';
              $response['message'] = 'ขออภัยค่ะ ยังไม่สามารถรับถุงเงินได้ในขณะนี้<br>เนื่องจากคุณยังทำเงือนไขการรับโบนัสก่อนหน้านี้ไม่สำเร็จ!';
              echo json_encode($response);
              exit();
          }
        }
      
        echo json_encode($response);
    }
 
}

/* End of file Deposit.php */
/* Location: ./application/controllers/Deposit.php */
