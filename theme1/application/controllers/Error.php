<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('user_agent');
	}

	public function not_found()
	{
		$data['page_content'] = 'error/404/content';
		$data['page_js'] = 'error/404/js';
		// $this->load->view('layout/master_register', $data, FALSE);
		$this->load->view('pages/login/content', $data, false);
	}

}

/* End of file Detect.php */
/* Location: ./application/controllers/Detect.php */