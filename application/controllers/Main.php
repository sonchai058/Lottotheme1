<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->dbb = $this->load->database('db_back', true);
        // is_allow_browser();
    }

    public function index()
    {
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Member_model');
        $data['game_account']     = game_account();
        $data['turn_amount']      = db_userdata('turn_amount');
        $data['topup_first_time'] = db_userdata('topup_first_time');
        $data['bonus_status']     = db_userdata('bonus_status');
        $promotion_list           = $this->dbb->query("SELECT * FROM tb_promotion WHERE status='1' and id <> 1");
        //print_r($promotion_list->num_rows());
        $data['deposit_count']   = $this->Member_model->getDepositCount(sess_userdata('id'));
        $data['count_promotion'] = $promotion_list->num_rows();
        $data['request_deposit'] = $this->Member_model->getRequestDeposit(sess_userdata('id'));
        $web_config              = $this->member_md->withdraw_config(1);
        $close_register          = $web_config->close_register;
        $text_register           = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;


        $this->load->model('process/Wheel_model', 'wheel_md');
        $data['id'] = $this->wheel_md->setPointToday(10,sess_userdata('id'));
        $data['point'] = $this->wheel_md->getPoint($this->member_id);


        // $chk_agent1 = $this->member_md->checkuseragent1(sess_userdata('id'));
        // $chk_agent2 = $this->member_md->checkuseragent2(sess_userdata('id'));
        // $chk_agent3 = $this->member_md->checkuseragent3(sess_userdata('id'));
        // $chk_agent4 = $this->member_md->checkuseragent4(sess_userdata('id'));
        // // ตอนนี้ติดปัญหา Login เครื่องซ้อนกัน รอแก้ต่อไป
      
        // $useragent1 = $chk_agent1->username;
        // $countagent1 = $chk_agent1->count;

        // $useragent2 = $chk_agent2->username;
        // $countagent2 = $chk_agent2->count;

        // $useragent3 = $chk_agent3->username;
        // $countagent3 = $chk_agent3->count;

        // $useragent4 = $chk_agent4->username;
        // $countagent4 = $chk_agent4->count;

        // $data['useragent1'] = $useragent1;
        // $data['useragent2'] = $useragent2;
        // $data['useragent3'] = $useragent3;
        // $data['useragent4'] = $useragent4;

        // update credit agent to db
        $this->member_md->update_all_agent_credit();
        $data['game_link_start'] = "";
        $data['title']           = $front_title;
        $data['description']     = $front_description;
        $data['keywords']        = $front_keywords;
        $data['close_register']  = $close_register;
        $data['text_register']   = $text_register;
        $data['page_header']     = 'main/header';
        $data['page_content']    = 'main/content';
        $data['page_js']         = 'main/js';
        
        $this->load->view('layout/layout_wallet', $data, false);
    }

    public function acc()
    {
        $data = $this->session->userdata('game_account');
        print_r($data);
    }
}
