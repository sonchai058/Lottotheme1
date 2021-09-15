<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_nothave_username();
		// is_allow_browser();
	}

	public function index()
	{
		// $data['game_account'] = game_account();
		$data['page_header'] = 'transfer/header';
		$data['page_content'] = 'transfer/content';
		$data['page_js'] = 'transfer/js';
		$this->load->view('layout/master', $data, FALSE);
	}

	public function togame()
	{
		redirect(base_url('transfer'),'refresh');
		// $data['game_account'] = game_account();
		// $data['page_header'] = 'transfer/togame_header';
		// $data['page_content'] = 'transfer/togame_content';
		// $data['page_js'] = 'transfer/js';
		// $this->load->view('layout/master', $data, FALSE);
	}

	public function towallet()
	{
		redirect(base_url('transfer'),'refresh');
		// $data['game_account'] = game_account();
		// $data['page_header'] = 'transfer/towallet_header';
		// $data['page_content'] = 'transfer/towallet_content';
		// $data['page_js'] = 'transfer/js';
		// $this->load->view('layout/master', $data, FALSE);
	}
}

/* End of file Transfer.php */
/* Location: ./application/controllers/Transfer.php */