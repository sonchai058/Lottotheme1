<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->dbf = $this->load->database('db_front', TRUE);
		$this->dbb = $this->load->database('db_back', TRUE);
	}


	public function getDeposit($member_id)
	{
		$q = $this->dbf->query("SELECT * FROM tb_member_deposit_log WHERE member_id = $member_id AND channel != 'BONUS'");
		return $q->result();
	}

	public function getWithdraw($member_id)
	{
		$q = $this->dbf->query("SELECT * FROM tb_member_withdraw_log WHERE member_id = $member_id AND status = 1");
		return $q->result();
	}

	public function updateDeposit($member_id,$amount)
	{
		$this->dbf->select('*');
		$this->dbf->where('member_id',$member_id);
		$query = $this->dbf->get('tb_member_credit_summary');
		$num = $query->num_rows();

		if($num == 0)
		{
			$object = array('member_id' => $member_id,'total_deposit' => $amount,'last_update' => date('Y-m-d H:i:s'));
			$this->dbf->insert('tb_member_credit_summary', $object);
		}
		else
		{
			$object = array('total_deposit' => $amount,'last_update' => date('Y-m-d H:i:s'));
			$this->dbf->where('member_id', $member_id);
			$q = $this->dbf->update('tb_member_credit_summary', $object);
		}
	}

	public function updateWithdraw($member_id,$amount)
	{
		$this->dbf->select('*');
		$this->dbf->where('member_id',$member_id);
		$query = $this->dbf->get('tb_member_credit_summary');
		$num = $query->num_rows();

		if($num == 0)
		{
			$object = array('member_id' => $member_id,'total_withdraw' => $amount,'last_update' => date('Y-m-d H:i:s'));
			$this->dbf->insert('tb_member_credit_summary', $object);
		}
		else
		{
			$object = array('total_withdraw' => $amount,'last_update' => date('Y-m-d H:i:s'));
			$this->dbf->where('member_id', $member_id);
			$q = $this->dbf->update('tb_member_credit_summary', $object);
		}
	}

	

}

/* End of file Member_model.php */
/* Location: ./application/models/auto/Member_model.php */