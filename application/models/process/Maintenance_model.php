<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->dbf = $this->load->database('db_front', TRUE);
		$this->dbb = $this->load->database('db_back', TRUE);
		// 
	}

	public function clear_temp_trn()
	{
		$this->dbb->where('trans_in_datetime <= (CURDATE() - INTERVAL 1 DAY)');
		$this->dbb->delete('tb_scb_transection');

		$this->dbb->where('trans_in_datetime <= (CURDATE() - INTERVAL 1 DAY)');
		$this->dbb->delete('tb_bay_transection');

		$this->dbb->where('trans_in_datetime <= (CURDATE() - INTERVAL 1 DAY)');
		$this->dbb->delete('tb_unconfirmed_transection');
	}

	

}

/* End of file Maintenance_model.php */
/* Location: ./application/models/process/Maintenance_model.php */