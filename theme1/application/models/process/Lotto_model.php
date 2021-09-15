<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use GuzzleHttp\Pool;
// use GuzzleHttp\Client;
// use GuzzleHttp\Psr7\Request;

class Lotto_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
    }
 
    public function put_lotto_member_log($data)
    { 
        if ($this->dbb->insert('tb_lotto_member_log', $data)) {
            return true;
        }
        else {
            return false;
        } 
    } 

    public function get_lotto_member($lotto_type,$date) {
        // $lotto_reward_type
        // $lotto_type
        $member_id = sess_userdata('id');
        // $date_time
        $q = $this->dbb->query("SELECT * FROM tb_lotto_member_log where  member_id = {$member_id} and lotto_type = {$lotto_type} and DATE(lotto_group) = '$date'");
        return $q->result();
    }

    public function get_last_lotto_result($lotto_type,$date) {

        $q = $this->dbb->query("SELECT * FROM tb_lotto_result where lotto_type = {$lotto_type} and DATE(date_time_closed) = '$date'");
        return $q->row();
    }

    public function get_lotto_reward_type() {

        $q = $this->dbb->query("SELECT * FROM tb_lotto_reward_type");
        return $q->result();
    }

    public function get_lotto_date_time($lotto_type) {
        $q = $this->dbb->query("SELECT * FROM tb_lotto_result where lotto_type = {$lotto_type} ORDER BY date_time_closed DESC LIMIT 1");
        return $q->row()->date_time_closed;
    }
}

/* End of file Lotto_model.php */
/* Location: ./application/models/process/Lotto_model.php */
