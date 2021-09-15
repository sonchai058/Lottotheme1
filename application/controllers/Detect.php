<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detect extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('user_agent');
	}

	public function index()
	{
		$arr = explode(" ", $this->agent->agent);
		$lastEl = array_values(array_slice($arr, -1))[0];
		$agent = explode("/", $lastEl);

		$data['page_content'] = 'detect/content';
		$data['page_js'] = 'detect/js';
		$this->load->view('layout/master_detect', $data, FALSE);
	}

	public function get()
	{
		$arr = explode(" ", $this->agent->agent);
		$lastEl = array_values(array_slice($arr, -1))[0];
		$agent = explode("/", $lastEl);

		print_r($agent);
		// if($agent[0] != "Line"){
		// 	redirect(base_url(),'refresh');
		// }
	}

	public function get_segment()
	{
		// print_r($this->uri->segment(2));
	}


	public function get_referer()
	{
		echo $this->agent->referrer();
	}

	public function not_found()
	{
		$data['page_content'] = 'error/404/content';
		$data['page_js'] = 'error/404/js';
		// $this->load->view('layout/master_detect', $data, FALSE);
		// $this->load->view('pages/login/content', $data, false);
		$url = base_url();
		redirect($url.'login', 'refresh');
		exit();
	}


}

/* End of file Detect.php */
/* Location: ./application/controllers/Detect.php */