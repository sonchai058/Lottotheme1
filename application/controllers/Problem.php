<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Problem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_nothave_username();
		// is_allow_browser();
	}

	public function index()
	{
		$data['page_header'] = 'problem/header';
		$data['page_content'] = 'problem/content';
		$this->load->view('layout/master', $data, FALSE);	
	}


	public function kbank()
	{
		redirect(base_url('deposit'),'refresh');
		// $data['page_header'] = 'deposit/kbank/header';
		// $data['page_content'] = 'deposit/kbank/content';
		// $data['page_js'] = 'deposit/kbank/js';
		// $this->load->view('layout/master', $data, FALSE);
	}

	public function requestKbank()
	{
		header('Content-Type: application/json');	

		$this->load->model('process/Topup_model','topupmd');
		$member_id = sess_userdata('id');
		$amount = $this->input->post('request_amount');

		// echo json_encode($this->input->post());

		if($amount == '' || $amount == 0)
		{
			$response['status'] = 'error';
			$response['message'] = 'ไม่สามารถทำรายการได้ กรุณาลองใหม่อีกครั้งค่ะ';
			echo json_encode($response);
			exit();
		}

		$resp = $this->topupmd->put_kbank_request($amount,$member_id);

		if($resp == false)
		{
			$response['status'] = 'error';
			$response['message'] = 'ไม่สามารถทำรายการได้ในขณะนี้';
			echo json_encode($response);
		}
		else
		{
			$response['status'] = 'success';
			$response['message'] = '';
			$response['data'] = $resp;
			echo json_encode($response);
		}
	}

	public function checkKbank()
	{
		header('Content-Type: application/json');
		$this->load->model('process/Topup_model','topupmd');
		$member_id = sess_userdata('id');
		$amount = $this->input->post('request_amount');
		echo json_encode($this->topupmd->check_kbank_request($member_id,$amount));
	}

	// public function testKbank()
	// {
	// 	header('Content-Type: application/json');
	// 	$this->load->model('process/Topup_model','topupmd');
	// 	$member_id = sess_userdata('id');
	// 	echo json_encode($this->topupmd->check_kbank_request($member_id,'16.01'));
	// }

	// public function kbankStep2()
	// {
	// 	$data['page_header'] = 'deposit/kbank-step-2/header';
	// 	$data['page_content'] = 'deposit/kbank-step-2/content';
	// 	$data['page_js'] = 'deposit/kbank-step-2/js';
	// 	$this->load->view('layout/master', $data, FALSE);
	// }

}

/* End of file Deposit.php */
/* Location: ./application/controllers/Deposit.php */
