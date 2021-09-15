<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_nothave_username();
		// is_allow_browser();
	}

	public function index()
	{
		$data['page_header'] = 'setting/header';
		$data['page_content'] = 'setting/main';
		$data['page_js'] = 'setting/js';
		$this->load->view('layout/master', $data, FALSE);
	}

	public function content()
	{
		$this->load->model('process/Member_model');
		$data['account'] = game_account();
		$data['current_wallet'] = $this->Member_model->currentWallet();
		$this->load->view('pages/setting/content', $data);
	}

	public function setDefault()
	{
		header('Content-Type: application/json');
		$wallet_id = $this->input->post('wallet_id');
		$this->load->model('process/Member_model');
		
		$this->Member_model->setDefaultWallet($wallet_id);

		switch ($wallet_id) {
			case '0':
				$wallet_name = "Wallet (กระเป๋าหลัก)";
				break;
			case '1':
				$wallet_name = "เกมส์ SlotXo";
				break;
			case '2':
				$wallet_name = "เกมส์ Live22";
				break;
			
			default:
				$wallet_name = "Wallet (กระเป๋าหลัก)";
				break;
		}

		$response['status'] = true;
		$response['message'] = 'ระบบได้ทำการเปลี่ยนกระเป๋าหลักในการฝากเงินของคุณเป็น <strong>'.$wallet_name.'</strong> เรียบร้อยแล้ว!';

		echo json_encode($response);
	}

	public function acc()
	{
		// $acc = game_account();

		// print_r($acc);
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */