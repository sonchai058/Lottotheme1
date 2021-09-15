<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Playgame extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

		$chk_agent1 = $this->member_md->checkuseragent1(sess_userdata('id'));
        $chk_agent2 = $this->member_md->checkuseragent2(sess_userdata('id'));
        $chk_agent3 = $this->member_md->checkuseragent3(sess_userdata('id'));
      
        $useragent1 = $chk_agent1->username;
        $countagent1 = $chk_agent1->count;
        $useragent2 = $chk_agent2->username;
        $countagent2 = $chk_agent2->count;
        $useragent3 = $chk_agent3->username;
        $countagent3 = $chk_agent3->count;
 
        $data['useragent1'] = $useragent1;
        $data['useragent2'] = $useragent2;
        $data['useragent3'] = $useragent3;
        $data['credit_agent1'] = $this->balancem->getallwallet()->agent_1_wallet;
        $data['credit_agent2'] = $this->balancem->getallwallet()->agent_2_wallet;
        $data['credit_agent3'] = $this->balancem->getallwallet()->agent_3_wallet;

        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
		$data['page_header'] = 'playgame/header';
		$data['page_content'] = 'playgame/content';
		$data['page_js'] = 'playgame/js';

		$this->load->view('layout/layout_title', $data, FALSE);
	}

	public function joker()
	{
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

		$chk_agent1 = $this->member_md->checkuseragent1(sess_userdata('id'));
        $agent_credit = $this->balancem->getallwallet()->agent_1_wallet; 
		$useragent1 = $chk_agent1->username;
		$passagent1 = $chk_agent1->password;
        $countagent1 = $chk_agent1->count;
        $data['creditagent'] = $agent_credit;
        $data['gamelist'] = $this->member_md->gamelist_api1();
		$data['useragent1'] = $useragent1;
		$data['passagent1'] = $passagent1;
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
		$data['page_header'] = 'playgame/joker/header';
		$data['page_content'] = 'playgame/joker/content';
		$data['page_js'] = 'playgame/joker/js';

	 
		$this->load->view('layout/layout_title', $data, FALSE); 
	}
    public function imi()
	{
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

        $chk_agent2 = $this->member_md->checkuseragent2(sess_userdata('id')); 
        $agent_credit = $this->balancem->getallwallet()->agent_2_wallet; 

        $useragent2 = $chk_agent2->username;
		$countagent2 = $chk_agent2->count;
        $passagent2 = $chk_agent2->password;
        $data['creditagent'] = $agent_credit;
		$data['passagent2'] = $passagent2;
		$data['useragent2'] = $useragent2;
        $data['playgame'] = $this->member_md->playgame_api2(1);
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
		$data['page_header'] = 'playgame/imi/header';
		$data['page_content'] = 'playgame/imi/content';
		$data['page_js'] = 'playgame/imi/js';
 
		$this->load->view('layout/layout_title', $data, FALSE);
	}
	public function nikigame()
	{
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

        $chk_agent2 = $this->member_md->checkuseragent2(sess_userdata('id')); 
        $agent_credit = $this->balancem->getallwallet()->agent_2_wallet; 

        $useragent2 = $chk_agent2->username;
		$countagent2 = $chk_agent2->count;
        $passagent2 = $chk_agent2->password;
        $data['creditagent'] = $agent_credit;
		$data['passagent2'] = $passagent2;
		$data['useragent2'] = $useragent2;
        $data['gamelist'] = $this->member_md->gamelist_api2();
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
		$data['page_header'] = 'playgame/nikigame/header';
		$data['page_content'] = 'playgame/nikigame/content';
		$data['page_js'] = 'playgame/nikigame/js';

	 
		$this->load->view('layout/layout_title', $data, FALSE);
	}
	public function ufabet()
	{
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

        $chk_agent3 = $this->member_md->checkuseragent3(sess_userdata('id'));
        $agent_credit = $this->balancem->getallwallet()->agent_3_wallet; 

        $useragent3 = $chk_agent3->username;
		$countagent3 = $chk_agent3->count;
        $passagent3 = $chk_agent3->password;
        $data['creditagent'] = $agent_credit;
		$data['passagent3'] = $passagent3;
        $data['useragent3'] = $useragent3;
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
		$data['page_header'] = 'playgame/ufabet/header';
		$data['page_content'] = 'playgame/ufabet/content';
		$data['page_js'] = 'playgame/ufabet/js';

	 
		$this->load->view('layout/layout_title', $data, FALSE);
	}
}

/* End of file PlayGame.php */
/* Location: ./application/controllers/PlayGame.php */