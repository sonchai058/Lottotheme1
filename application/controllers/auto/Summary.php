<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function member_deposit()
	{
		$this->load->model('auto/Member_model');

		$data = $this->Member_model->getDeposit(933419);

		// print_r($data);
		foreach ($data as $r) {
			$total += $r->amount;
		}

		$this->Member_model->updateDeposit(933419,$total);
	}

	public function member_withdraw()
	{
		$this->load->model('auto/Member_model');

		$data = $this->Member_model->getWithdraw(933419);

		// print_r($data);
		foreach ($data as $r) {
			$total += $r->amount;
		}

		$this->Member_model->updateWithdraw(933419,$total);
	}

}

/* End of file Summary.php */
/* Location: ./application/controllers/auto/Summary.php */