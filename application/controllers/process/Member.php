<?php
ini_set('memory_limit', '-1');
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('process/Member_model','member_md');
	}

	public function index()
	{
		$olduser = $this->member_md->getOlduserlist();

		print_r($olduser);
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/process/Member.php */