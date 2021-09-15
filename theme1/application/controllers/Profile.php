<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        // is_nothave_username();
        // is_allow_browser();
    }

    public function index()
    {
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
        $data['game_account']   = game_account();
        // $data['page_header'] = 'profile/header';
        $username                = db_userdata('username');
        $password                = db_userdata('password');
        $member_bonus_status     = db_userdata('bonus_status');
    
        if ($username != null ||  $username != "") {
            $game_token              = $this->Member_model->login_game($username, $password);
            // $data['game_link_start'] = 'https://pgslot.cc/games/index.html?t=' . $game_token;
            $data['game_link_start'] = $game_token;
        }
        else {

            // ส่งไป API สมัครสมาชิก

            $data['game_link_start'] = "";

        }
        $data['username'] =  $username;
        $data['bonus_status']    = $member_bonus_status;
        $data['page_content']    = 'profile/content';
        // $data['page_js'] = 'profile/js';
        $this->load->view('layout/layout_navigator', $data, false);
    }
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
