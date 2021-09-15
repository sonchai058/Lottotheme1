<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
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
        $data['page_header']    = 'download/header';
        $data['page_content']   = 'download/content';
        $username               = db_userdata('username');
        $password               = db_userdata('password');
        // $data['game_link_start'] = '';
        $game_token              = $this->Member_model->login_game($username, $password);
        $data['game_link_start'] = $game_token;
        // $data['game_link_start'] = 'https://pgslot.cc/games/index.html?t=' . $game_token;
        $this->load->view('layout/layout_navigator', $data, false);
    }

    public function howToInstall()
    {
        $data['page_header']  = 'download/how-to-install/header';
        $data['page_content'] = 'download/how-to-install/content';
        $data['page_js']      = 'download/how-to-install/js';
        $this->load->view('layout/master', $data, false);
    }

}

/* End of file Deposit.php */
/* Location: ./application/controllers/Deposit.php */
