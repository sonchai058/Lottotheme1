<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balance_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->member_id = sess_userdata('id');

        $this->dbf->cache_on();
        $this->dbb->cache_on();
    }

    public function walletBalance()
    {
        $q = $this->dbf->query("SELECT wallet_balance FROM tb_member_wallet WHERE member_id = {$this->member_id}");

        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            $object = array('member_id' => $this->member_id,
                'wallet_balance'            => 0);
            $this->dbf->insert('tb_member_wallet', $object);

            return (object) $object;
        }
    }

    public function getwalletBalance()
    {
        $q = $this->dbf->query("SELECT wallet_balance FROM tb_member_wallet WHERE member_id = {$this->member_id}");
        return $q->row()->wallet_balance;
    }
    
    public function getallwallet()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_wallet WHERE member_id = {$this->member_id}");
        return $q->row();
    }


    public function getMemberWalletBalance($member_id)
    {
        $q = $this->dbf->query("SELECT wallet_balance FROM tb_member_wallet WHERE member_id = {$member_id}");

        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            $object = array('member_id' => $member_id,
                'wallet_balance'            => 0);
            $this->dbf->insert('tb_member_wallet', $object);

            return (object) $object;
        }
    }

    public function currentWalletBalance()
    {
        $q = $this->dbf->query("SELECT wallet_balance FROM tb_member_wallet WHERE member_id = {$this->member_id}");

        if ($q->num_rows() > 0) {
            $data = $q->row();
            return $data->wallet_balance;
        } else {
            return 0;
        }
    }

    public function getLastTopup()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_log WHERE member_id = {$this->member_id} AND status = 1 AND channel != 'BONUS' AND is_bonus != 1 ORDER BY id DESC LIMIT 1")->row();
        return $q;
    }

    public function getLastweekTopup()
    {
        $date_last_week = strtotime("-7 days");
        $date_last_week  = date("Y-m-d",$date_last_week);
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_log WHERE member_id = {$this->member_id} AND status = 1 AND channel != 'BONUS' AND datetime <= '$date_last_week' ORDER BY id DESC LIMIT 1")->row();
        return $q;
    }


    public function getSumTopup()
    {
        $q = $this->dbf->query("SELECT sum(amount) as sum_amount FROM tb_member_deposit_log WHERE member_id = {$this->member_id} AND status = 1 AND channel != 'BONUS' AND is_bonus != 1")->row();
        return $q->sum_amount;
    }

    public function getCheckFirstBobus()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_account WHERE id = {$this->member_id}")->row();
        return $q;
    }

    public function setBonusUsed($deposit_id)
    {
        $this->dbf->where('id', $deposit_id);
        $this->dbf->update('tb_member_deposit_log', array('is_bonus' => 1));
    }

    public function setcheckbonus($deposit_id){
        $this->dbf->where('id', $deposit_id);
        $this->dbf->update('tb_member_deposit_log', array('used_bonus' => 1));
    }

    public function count_dep_can_get($member_id,$check_is_bonus,$amount)
    {
        $date_now = date("Y-m-d");
        $date_last = strtotime("-15 days");
        $date_last  = date("Y-m-d",$date_last);
        $q = $this->dbf->query("SELECT member_id,amount,datetime FROM tb_member_deposit_log WHERE member_id = {$member_id} and amount > {$amount} and status = 1 AND channel != 'BONUS' AND is_bonus != 1 and DATE(datetime) BETWEEN DATE('$date_last') and DATE('$date_now') GROUP BY member_id,DATE(datetime)")->row();
        return $q->num_rows();
    }


    public function setBonusAmount($deposit_id, $amount)
    {
        $this->dbf->where('id', $deposit_id);
        $this->dbf->update('tb_member_deposit_log', array('bonus_amount' => $amount));
    }

    public function setBonusAllUsed($member_id)
    {
        $this->dbf->where('member_id', $member_id);
        $this->dbf->update('tb_member_deposit_log', array('is_bonus' => 1));
    }

    public function resetBonusUsed()
    {
        $this->dbf->where('member_id', $this->member_id);
        $this->dbf->update('tb_member_deposit_log', array('is_bonus' => 0));
    }

    public function adjustWalletBalance($amount)
    {
        $adjust_balance = 'wallet_balance' . $amount;
        $this->dbf->set('wallet_balance', $adjust_balance, false);
        $this->dbf->where('member_id', $this->member_id);
        $this->dbf->update('tb_member_wallet');
        return $this->dbf->affected_rows();
    }

    public function holdDeposit()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_log WHERE member_id = '{$this->member_id}' AND status = '9'");
        return $q->result();
    }

    public function affWithdraw()
    {
        $q = $this->dbf->query("SELECT * FROM tb_affiliate WHERE referee_id = {$this->member_id} AND allow_withdraw = 0");
        return $q->row();
    }

    public function deactiveAffWithdraw()
    {
        $this->dbf->where('referee_id', $this->member_id);
        $this->dbf->update('tb_affiliate', array('allow_withdraw' => 1));
    }

    public function isAllowWithdraw()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_withdraw_log WHERE member_id = {$this->member_id} AND status IN(0,9)");

        $nr = $q->num_rows();

        if ($nr > 0) {
            return false;
        } else {
            return true;
        }
    }

}

/* End of file Wallet_model.php */
/* Location: ./application/models/process/Wallet_model.php */
