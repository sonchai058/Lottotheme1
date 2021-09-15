<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aff_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->dbf       = $this->load->database('db_front', true);
        $this->dbb       = $this->load->database('db_back', true);
        $this->member_id = sess_userdata('id');

        $this->dbf->cache_off();
        $this->dbb->cache_off();
    }

    public function get_lick_click_count()
    {
        $q = $this->dbf->query("SELECT * FROM tb_affiliate_link_count WHERE referer_id = $this->member_id")->row()->count;
        return $q;
    }

    public function get_aff_links() {
        $q = $this->dbf->query("SELECT aff_reg_code FROM tb_member_account WHERE id = $this->member_id")->row()->aff_reg_code;
        return $q;
    }

    
    public function referee_count()
    {
        $q = $this->dbf->query("SELECT COUNT(*) AS 'total_referee' FROM tb_member_account WHERE referer_id = $this->member_id")->row()->total_referee;
        return $q;
    }

    public function referee_topup_count()
    {
        $q = $this->dbf->query("SELECT SUM(b.amount) as sum_amount FROM tb_member_account as a INNER JOIN (select id,member_id,amount from tb_member_deposit_log WHERE channel<>'BONUS' GROUP BY member_id order by id asc) as b on a.id = b.member_id WHERE referer_id='$this->member_id'")->row()->sum_amount;
        return $q;
    }

    public function referee_list()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_account WHERE referer_id=$this->member_id")->result();

        return $q;
    }

    public function insert_logs($data)
    {

        $this->dbf->insert('tb_member_deposit_aff', $data);
        $this->auto_aff_dep();
        return $this->dbf->affected_rows();
    }

    public function clear_aff_wallet()
    {
        $this->dbf->where('member_id', $this->member_id);
        $object = array('wallet_balance' => '0',
            'wallet_balance_2'               => '0');
        $this->dbf->update('tb_member_aff_wallet', $object);
    }

    public function aff_wallet_balance()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_aff_wallet WHERE member_id = $this->member_id")->row();
        return $q;
    }

    private function auto_aff_dep() {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://loginbackend.betclicone.com/auto/auto_bot_deposit_affiliate.php');
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post_field));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $http_header);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_REFERER, 'https://pay.betclicone.com');
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36');
        $result = curl_exec($curl);
        curl_close($curl);
      
        return 0;
    }

    public function aff_withdraw()
    {
        $this->dbf->where('referer_id', $this->member_id);
        $this->dbf->update('tb_affiliate', array('status' => '2'));
    }

    public function count_up_ref_link($referer_id = null)
    {
        $r_ref = $this->dbf->query("SELECT * FROM tb_affiliate_link_count WHERE referer_id = $referer_id")->row();

        if (count($r_ref) < 1) {
            $obj = array('referer_id' => $referer_id, 'count' => 1);
            $this->dbf->insert('tb_affiliate_link_count', $obj);
        } else {
            $this->dbf->set('count', 'count+1', false);
            $this->dbf->where('referer_id', $referer_id);
            $this->dbf->update('tb_affiliate_link_count');
        }

        return $this->dbf->affected_rows();
    }

    public function aff_click($data)
    {
        $this->dbf->insert('tb_affiliate_link_count_detail', $data);
        return $this->dbf->affected_rows();
    }



}

/* End of file Aff_model.php */
/* Location: ./application/models/Aff_model.php */
