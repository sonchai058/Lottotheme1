<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Carbon\Carbon;

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		// is_allow_browser();
		$this->load->model('process/Logs_model','logsm');
	}

	public function index()
	{
		
		$data['page_header'] = 'transaction/header';
		$data['page_content'] = 'transaction/content';
		$data['page_js'] = 'transaction/js';
        $this->load->model('process/Member_model', 'member_md');

		$web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $close_login    = $web_config->close_login;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

		$data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['close_login']    = $close_login;
        $data['text_register']  = $text_register;
		$data['withdrawLogs'] = $this->logsm->getWithdrawLogs();
		$data['depositLogs'] = $this->logsm->getDepositLogs();
		$data['transferLogs'] = $this->logsm->getTransferLogs();
		$data['bonusLogs'] = $this->logsm->getBonusLogs();
		$this->load->view('layout/layout_title', $data, FALSE);
	}
}

/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */