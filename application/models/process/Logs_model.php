<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logs_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->dbf       = $this->load->database('db_front', true);
        $this->dbb       = $this->load->database('db_back', true);
        $this->member_id = sess_userdata('id');

        $this->dbf->cache_on();
        $this->dbb->cache_on();
    }

    public function transfer_log($data)
    {
        $object = array('member_id' => $this->member_id,
            'form'                      => $data['form'],
            'to'                        => $data['to'],
            'datetime'                  => date('Y-m-d H:i:s'),
            'ip'                        => $this->input->ip_address(),
            'amount'                    => $data['amount']);

        $this->dbf->insert('tb_member_transfer_log', $object);
        return $this->dbf->insert_id();
    }

    public function withdraw_log($data)
    {
        $object = array('member_id' => $this->member_id,
            'datetime'                  => date('Y-m-d H:i:s'),
            'status'                    => 0,
            'update_time'               => date('Y-m-d H:i:s'),
            'amount'                    => $data['amount'],
            'is_bonus'                  => $data['is_bonus'],
            'bonus_detail'              => $data['bonus_detail'],
            'withdraw_account_id'       => $this->getWithdrawAccount(),
        );

        $this->dbf->insert('tb_member_withdraw_log', $object);
        $this->addWithdrawQueue($this->getWithdrawAccount());
        return $this->dbf->insert_id();
    }

    private function addWithdrawQueue($account_id)
    {
        $this->dbb->set('queue', '`queue`+1', false);
        $this->dbb->where('id', $account_id);
        $this->dbb->update('tb_withdraw_bank_account');
    }

    private function getAvaliableWithdraw()
    {
        $q = $this->dbb->query("SELECT id FROM tb_withdraw_bank_account WHERE status = 1")->result();

        $account_id = '';
        foreach ($q as $row) {
            $account_id .= $row->id . ",";
        }

        substr($account_id, 0, -1);
        return substr($account_id, 0, -1);
    }

    private function getWithdrawAccount()
    {
        // $account_id = $this->getAvaliableWithdraw();
        // $q = $this->dbf->query("SELECT count(*) AS 'total_transection',withdraw_account_id AS 'account_id' FROM tb_member_withdraw_log WHERE withdraw_account_id IN({$account_id}) GROUP BY withdraw_account_id ORDER BY total_transection ASC LIMIT 1")->row();
        // return $q->account_id;
        $q = $this->dbb->query("SELECT id FROM tb_withdraw_bank_account WHERE status = 1 ORDER BY queue ASC LIMIT 1")->row();
        return $q->id;
    }

    public function getLastWithdrawLogs()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_withdraw_log WHERE member_id = '{$this->member_id}' AND status = 0 ORDER BY id DESC LIMIT 1");
        return $q->row();
    }

    public function getLastDepositLogs()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_log WHERE member_id = '{$this->member_id}' AND status = 1 ORDER BY id DESC LIMIT 1");
        return $q->row();
    }

    public function getBonusLogs()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_bonus_log WHERE member_id = '{$this->member_id}' AND status = '1' ORDER BY id DESC LIMIT 10");
        return $q->result();
    }

    public function getTransferLogs()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_transfer_log WHERE member_id = '{$this->member_id}' ORDER BY id DESC LIMIT 10");
        return $q->result();
    }

    public function getWithdrawLogs()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_withdraw_log WHERE member_id = '{$this->member_id}' ORDER BY id DESC LIMIT 10");
        return $q->result();
    }

    public function getDepositLogs()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_log WHERE member_id = '{$this->member_id}' AND channel != 'BONUS' ORDER BY id DESC LIMIT 10");
        return $q->result();
    }
}

/* End of file Logs_model.php */
/* Location: ./application/models/process/Logs_model.php */
