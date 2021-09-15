<?php
ini_set('max_execution_time', 0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->dbf = $this->load->database('db_front', TRUE);
	}

	public function index()
	{
		// ini_set('max_execution_time', 0);

		$q = $this->dbf->query("SELECT id,name,surname FROM tb_member_account WHERE id IN(SELECT member_id FROM tb_member_bank_account WHERE bank_id = 014 AND name IS NULL) ORDER BY id DESC LIMIT 200")->result();

		// print_r($q);
		foreach ($q as $r) {
			$this->dbf->where('member_id', $r->id);
			$this->dbf->update('tb_member_bank_account', array('name' => $r->name,'surname' => $r->surname));

			print_r(array('name' => $r->name,'surname' => $r->surname));
		}
	}

}

/* End of file Migrate.php */
/* Location: ./application/controllers/Migrate.php */