<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// $this->dbf = $this->load->database('db_front', TRUE);
		$this->dbb = $this->load->database('db_back', TRUE);

		// $this->dbf->cache_on();
		$this->dbb->cache_on();
	}

	public function identical_member($bank_id = null,$bank_number = null,$name = '')
	{
		$this->dbf = $this->load->database('db_front', TRUE);
		$this->dbf->cache_on();

		if(is_null($bank_number))
		{
			return;
		}

		if(is_null($bank_id))
		{
			return;
		}

		if(empty($name))
		{
			$q = $this->dbb->query("SELECT member_id FROM `tb_member_bank_account` WHERE `bank_account_number` LIKE '%$bank_number' AND `bank_id` = '$bank_id' AND `name` = '$name' LIMIT 1");
		}
		else
		{
			$q = $this->dbb->query("SELECT member_id FROM `tb_member_bank_account` WHERE `bank_account_number` LIKE '%$bank_number' AND `bank_id` = '$bank_id' LIMIT 1");
		}

		if($q->num_rows() > 0)
		{
			$userinfo = $q->row();
			return $userinfo->member_id;
		}
		else
		{
			return;
		}
	}

	public function put_manual_transection($data)
	{
		$this->dbb = $this->load->database('db_back', TRUE);
		//$this->dbb->cache_on();

		$this->dbb->where('transection_no', $data['transection_no']);
	    $query = $this->dbb->get('tb_manual_transection');
	    $count_row = $query->num_rows();
	    if($count_row < 1){
	    	$this->dbb->insert('tb_manual_transection', $data);
	   	}
	}

	public function put_unconfirm_transection($data)
	{
		$this->dbb = $this->load->database('db_back', TRUE);
		//$this->dbb->cache_on();

		$this->dbb->where('transection_no', $data['transection_no']);
	    $query = $this->dbb->get('tb_unconfirmed_transection');
	    $count_row = $query->num_rows();
	    if($count_row < 1){
	    	$this->dbb->insert('tb_unconfirmed_transection', $data);
	   	}
	}


	// protected function insert_unconfirm_transection($data)
	// {
	// 	$this->dbb->insert('tb_unconfirmed_transection', $data);
	// 	return $data['transection_no'];
	// }

	

}

/* End of file Bot_model.php */
/* Location: ./application/models/Bot_model.php */