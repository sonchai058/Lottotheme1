<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use GuzzleHttp\Pool;
// use GuzzleHttp\Client;
// use GuzzleHttp\Psr7\Request;

class Topup_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
    }

    public function put_scb_transection($data)
    {
        if ($this->check_scb_exist_trn($data['transection_no']) === true) {
            $now      = strtotime(date('Y-m-d'));
            $trn_date = strtotime(date('Y-m-d', strtotime(date($data['trans_in_datetime']))));

            if ($trn_date > $now) {

            } else {
                $trn_no = $this->insert_scb_transection($data);
            }
        }
    }

    public function put_bay_transection($data)
    {
        if ($this->check_bay_exist_trn($data['transection_no']) === true) {
            $trn_no = $this->insert_bay_transection($data);
        }
    }

    public function put_kbank_transection($data)
    {
        if ($this->check_kbank_exist_trn($data['transection_no']) === true) {
            $trn_no = $this->insert_kbank_transection($data);
        }
    }

    public function put_unconfirm_transection($data)
    {
        if ($this->check_unconfirm_exist_trn($data['transection_no']) === true) {
            $trn_no = $this->insert_unconfirm_transection($data);
            // $now = strtotime(date('Y-m-d'));
            // $trn_date = strtotime(date('Y-m-d', strtotime(date($data['trans_in_datetime']))));

            // if($trn_date > $now)
            // {

            // }
            // else
            // {
            //     $trn_no = $this->insert_scb_transection($data);
            // }
        }
    }

    // public function put_confirm_transection($data)
    // {
    //     $this->db->where('email_id', $email_id);

    //     $query = $this->db->get('my_registration_table');

    //     $count_row = $query->num_rows();

    //     if ($count_row > 0) {
    //       //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
    //         return FALSE; // here I change TRUE to false.
    //      } else {
    //       // doesn't return any row means database doesn't have this email
    //         return TRUE; // And here false to TRUE
    //      }
    // }

    public function put_request_transection($data)
    {
        if ($this->check_request_exist_trn($data['transection_no']) === true) {
            $trn_no = $this->insert_request_transection($data);
            return true;
        } else {
            return false;
        }
    }

    public function put_kbank_request($amount, $member_id)
    {
        $current_datetime = date('Y-m-d H:i');
        $future_datetime  = date('Y-m-d H:i', strtotime($current_datetime) + (60 * 6));

        $q = $this->dbb->query("SELECT * FROM tb_kbank_request WHERE request_amount ='{$amount}' AND topup_status = 0 ORDER BY request_stang DESC")->row();
        if (isset($q)) {
            $request_stang = $q->request_stang + 0.01;
            $total_amount  = $amount + $request_stang;

            $object = array('request_amount' => $amount,
                'request_stang'                  => $request_stang,
                'request_datetime'               => $current_datetime,
                'request_expire_datetime'        => $future_datetime,
                'topup_status'                   => 0,
                'member_id'                      => $member_id,
                'amount'                         => number_format($total_amount, 2));

            $this->dbb->insert('tb_kbank_request', $object);

            $object['request_expire_datetime'] = strtotime($future_datetime);
            return $object;
        } else {
            $request_stang = 0.01;
            $total_amount  = $amount + $request_stang;

            $object = array('request_amount' => $amount,
                'request_stang'                  => $request_stang,
                'request_datetime'               => $current_datetime,
                'request_expire_datetime'        => $future_datetime,
                'topup_status'                   => 0,
                'member_id'                      => $member_id,
                'amount'                         => number_format($total_amount, 2));

            $this->dbb->insert('tb_kbank_request', $object);

            $object['request_expire_datetime'] = strtotime($future_datetime);
            return $object;
        }
    }

    public function check_kbank_request($member_id, $amount)
    {
        $q1 = $this->dbb->query("SELECT * FROM tb_kbank_request WHERE member_id = '{$member_id}' AND topup_status = 0 ORDER BY id DESC LIMIT 1")->row();

        $q2 = $this->dbb->query("SELECT * FROM tb_kbank_transection WHERE trans_in_datetime >= '{$q1->request_datetime}' AND trans_in_datetime <= '{$q1->request_expire_datetime}' AND amount = '{$q1->amount}' AND topup_status = 0");

        if ($q2->num_rows() == 1) {
            $trn_data = $q2->row();
            $ins_log  = array('member_id' => $member_id,
                'previous_balance'            => $this->getUserBalance($member_id),
                'amount'                      => $trn_data->amount,
                'datetime'                    => $trn_data->trans_in_datetime,
                'status'                      => '1',
                'channel'                     => 'KBANK');
            $this->insert_deposit_logs($ins_log);
            $this->update_kbank_transection('1', $trn_data->id);
            $this->update_kbank_request('1', $q1->id);
            return true;
        } else {
            return false;
        }
    }

    public function scb_topup_wait_list()
    {
        $this->dbb->from('tb_scb_transection');
        $this->dbb->where('topup_status', '0');
        $query = $this->dbb->get();
        return $query->result();
    }

    public function bay_topup_wait_list()
    {
        $this->dbb->from('tb_bay_transection');
        $this->dbb->where('topup_status', '0');
        $query = $this->dbb->get();
        return $query->result();
    }

    public function find_user($bank_id, $bank_number, $name = null)
    {
        if ($name != null) {
            $q = $this->dbf->query("SELECT tb_member_bank_account.member_id AS 'member_id' FROM tb_member_account INNER JOIN tb_member_bank_account ON tb_member_account.id = tb_member_bank_account.member_id WHERE tb_member_bank_account.bank_account_number LIKE '%{$bank_number}' AND tb_member_bank_account.bank_id = '{$bank_id}' AND tb_member_account.name = '{$name}'");
        } else {
            $q = $this->dbf->query("SELECT member_id FROM tb_member_bank_account WHERE bank_account_number LIKE '%{$bank_number}' AND bank_id = '{$bank_id}' LIMIT 1");
        }

        if ($q->num_rows() > 0) {
            $userinfo = $q->row();
            return $userinfo->member_id;
        } else {
            $qs = $this->dbf->query("SELECT tb_member_bank_account.member_id AS 'member_id' FROM tb_member_account INNER JOIN tb_member_bank_account ON tb_member_account.id = tb_member_bank_account.member_id WHERE tb_member_bank_account.bank_account_number LIKE '%{$bank_number}' AND tb_member_bank_account.bank_id = '{$bank_id}' AND tb_member_account.name = '{$name}'");

            if ($qs->num_rows() > 0) {
                $userinfo = $qs->row();
                return $userinfo->member_id;
            } else {
                return false;
            }
        }
    }

    public function identical_member($bank_id = null, $bank_number = null, $name = '')
    {

        if ($bank_number == null) {
            return false;
            exit();
        }

        if ($bank_id == null) {
            return false;
            exit();
        }

        if ($name != '') {
            $q = $this->dbf->query("SELECT member_id FROM `tb_member_bank_account` WHERE `bank_account_number` LIKE '%$bank_number' AND `bank_id` = '$bank_id' AND `name` = '$name' LIMIT 1");
        } else {
            $q = $this->dbf->query("SELECT member_id FROM `tb_member_bank_account` WHERE `bank_account_number` LIKE '%$bank_number' AND `bank_id` = '$bank_id' LIMIT 1");
        }

        if ($q->num_rows() > 0) {
            $userinfo = $q->row();
            return $userinfo->member_id;
        } else {
            return false;
            exit();
        }
    }

    public function set_expired_kbank_request()
    {
        $object = array('topup_status' => '3');
        $this->dbb->where('topup_status', '0');
        $this->dbb->where('request_expire_datetime <', date('Y-m-d H:i:s'));
        $this->dbb->update('tb_kbank_request', $object);
        // $this->dbb->close();
    }

    protected function insert_scb_transection($data)
    {
        $this->dbb->insert('tb_scb_transection', $data);
        // $this->dbb->close();
        return $data['transection_no'];
    }

    protected function insert_bay_transection($data)
    {
        $this->dbb->insert('tb_bay_transection', $data);
        // $this->dbb->close();
        return $data['transection_no'];
    }

    protected function insert_kbank_transection($data)
    {
        $this->dbb->insert('tb_kbank_transection', $data);
        return $data['transection_no'];
    }

    protected function insert_unconfirm_transection($data)
    {
        $this->dbb->insert('tb_unconfirmed_transection', $data);
        return $data['transection_no'];
    }

    protected function insert_request_transection($data)
    {
        $this->dbb->insert('tb_request_topup_transection', $data);
        return $data['transection_no'];
    }

    public function update_scb_transection($status, $user_id = 0, $id)
    {
        $data = array('topup_status' => $status,
            'member_id'                  => $user_id);
        $this->dbb->where('id', $id);
        $this->dbb->update('tb_scb_transection', $data);
        // $this->dbb->close();
    }

    public function change_scb_trn_status($status, $transection_no)
    {
        $data = array('topup_status' => $status);
        $this->dbb->where('transection_no', $transection_no);
        $this->dbb->update('tb_scb_transection', $data);
    }

    public function update_bay_transection($status, $user_id = 0, $id)
    {
        $data = array('topup_status' => $status,
            'member_id'                  => $user_id);
        $this->dbb->where('id', $id);
        $this->dbb->update('tb_bay_transection', $data);
        // $this->dbb->close();
    }

    public function update_kbank_transection($status, $id)
    {
        $data = array('topup_status' => $status);
        $this->dbb->where('id', $id);
        $this->dbb->update('tb_kbank_transection', $data);
    }

    public function update_kbank_request($status, $id)
    {
        $data = array('topup_status' => $status);
        $this->dbb->where('id', $id);
        $this->dbb->update('tb_kbank_request', $data);
    }

    public function insert_deposit_logs($data)
    {
        if ($this->exist_deposit_log($data) === true) {
            if ($this->isRefererGetBonus($data['member_id'])) {
                $this->update_aff_list($data);
            }

            if (!$this->check_if_bonus_active($data['member_id'])) {
                $memberTotalBalance = $data['previous_balance'];

                if ($memberTotalBalance <= 5) {
                    $this->deactiveMemberBonus($data['member_id']);
                    $this->dbf->insert('tb_member_deposit_log', $data);
                    $this->addWalletBalance($data['amount'], $data['member_id']);
                    return $this->dbf->affected_rows();
                } else {
                    $data['status'] = '9';
                    $this->dbf->insert('tb_member_deposit_log', $data);
                    return $this->dbf->affected_rows();
                }
            } else {
                $this->dbf->insert('tb_member_deposit_log', $data);
                $this->addWalletBalance($data['amount'], $data['member_id']);
                return $this->dbf->affected_rows();
            }
        } else {
            return false;
        }
    }

    protected function exist_deposit_log($data)
    {
        $this->dbf->cache_on();
        //$this->dbb->cache_on();
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_log WHERE amount = '{$data['amount']}' AND `datetime` = '{$data['datetime']}' AND member_id = '{$data['member_id']}' LIMIT 100");

        $nr = $q->num_rows();

        if ($nr > 0) {
            return false;
        } else {
            return true;
        }
        // return true;
    }

    public function check_scb_exist_trn($trn_num)
    {
        $this->dbb->from('tb_scb_transection');
        $this->dbb->where('transection_no', $trn_num);
        $query = $this->dbb->get();
        $nr    = $query->num_rows();
        if ($nr > 0) {
            return false;
        } else {
            return true;
        }
    }

    protected function check_bay_exist_trn($trn_num)
    {
        $this->dbb->from('tb_bay_transection');
        $this->dbb->where('transection_no', $trn_num);
        $query = $this->dbb->get();
        $nr    = $query->num_rows();
        if ($nr >= 1) {
            return false;
        } else {
            return true;
        }
    }

    protected function check_kbank_exist_trn($trn_num)
    {
        $this->dbb->from('tb_kbank_transection');
        $this->dbb->where('transection_no', $trn_num);
        $query = $this->dbb->get();
        $nr    = $query->num_rows();
        if ($nr >= 1) {
            return false;
        } else {
            return true;
        }
    }

    protected function check_unconfirm_exist_trn($trn_num)
    {
        $this->dbb->from('tb_unconfirmed_transection');
        $this->dbb->where('transection_no', $trn_num);
        $query = $this->dbb->get();
        $nr    = $query->num_rows();
        if ($nr > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function wait_request_transection($member_id)
    {
        $this->dbb->from('tb_request_topup_transection');
        $this->dbb->where('member_id', $member_id);
        $this->dbb->where('topup_status', '0');
        $query = $this->dbb->get();
        $nr    = $query->num_rows();
        if ($nr > 0) {
            return false;
        } else {
            return true;
        }
    }

    protected function check_request_exist_trn($trn_num)
    {
        $this->dbb->from('tb_request_topup_transection');
        $this->dbb->where('transection_no', $trn_num);
        $query = $this->dbb->get();
        $nr    = $query->num_rows();
        if ($nr > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function check_if_bonus_active($member_id)
    {
        $q = $this->dbf->query("SELECT bonus FROM tb_member_account WHERE id = '{$member_id}'")->row();

        if ($q->bonus != 0) {
            return false;
        } else {
            return true;
        }
    }

    public function deactiveMemberBonus($member_id)
    {
        $this->dbf->where('id', $member_id);
        $this->dbf->update('tb_member_account', array('bonus' => '0'));
        $this->resetMemberBonus($member_id);
    }

    protected function resetMemberBonus($member_id)
    {
        $this->dbf->where('member_id', $member_id);
        $this->dbf->delete('tb_member_bonus');
    }

    public function update_first_time_topup($member_id)
    {
        $status = $this->dbf->query("SELECT * FROM tb_member_account WHERE id = '{$member_id}'")->row()->topup_first_time;

        if ($status == 1) {
            $this->dbf->where('id', $member_id);
            $this->dbf->update('tb_member_account', array('topup_first_time' => '2'));
        } else if ($status == 0) {
            $this->dbf->where('id', $member_id);
            $this->dbf->update('tb_member_account', array('topup_first_time' => '2'));
        } else {
            $this->dbf->where('id', $member_id);
            $this->dbf->update('tb_member_account', array('topup_first_time' => '2'));
        }
    }

    public function update_hold_balance($member_id)
    {
        $this->dbf->set('status', '1', false);
        $this->dbf->where('status', '9');
        $this->dbf->where('member_id', $member_id);
        $this->dbf->update('tb_member_deposit_log');
        return $this->dbf->affected_rows();
    }

    public function addWalletBalance($amount, $member_id)
    {
        $this->update_first_time_topup($member_id);
        // $currentWallet = $this->getMemberCurrentWallet($member_id);

        // if($currentWallet == 0)
        // {
        $adjust_balance = 'wallet_balance+' . $amount;
        $this->dbf->set('wallet_balance', $adjust_balance, false);
        $this->dbf->where('member_id', $member_id);
        $this->dbf->update('tb_member_wallet');
        return $this->dbf->affected_rows();
        // }

        // if($currentWallet == 1)
        // {
        //     $this->deposit_slotxo($member_id,$amount);
        // }

        // if($currentWallet == 2)
        // {
        //     $this->deposit_live22($member_id,$amount);
        // }
    }

    private function getMemberCurrentWallet($member_id)
    {
        $q = $this->dbf->query("SELECT default_topup_wallet FROM tb_member_account WHERE id = $member_id")->row();
        return $q->default_topup_wallet;
    }

    protected function setTopupFirstTime($member_id)
    {
        $topup_first_time = $this->dbf->query("SELECT * FROM tb_member_account WHERE id = '{$member_id}'")->row()->topup_first_time;

        if (($topup_first_time == 0) || ($topup_first_time == 1)) {
            $this->dbf->where('id', $member_id);
            $this->dbf->update('tb_member_account', array('topup_first_time' => '2'));
        }
    }

    private function isRefererGetBonus($member_id)
    {
        $referer_bonus = $this->dbf->query("SELECT referer_bonus FROM tb_member_account WHERE id = $member_id")->row()->referer_bonus;

        if ($referer_bonus == 1) {
            return true;
        } else {
            return false;
        }
    }

    protected function updateRefererBonusStatus($member_id)
    {
        $this->dbf->where('id', $member_id);
        $this->dbf->update('tb_member_account', array('referer_bonus' => '0'));
    }

    protected function update_aff_list($data)
    {
        if ($data['channel'] != 'BONUS') {
            $reward_amount = $data['amount'] / 100 * 50;

            if ($reward_amount > 500) {
                $reward_amount = 500;
            }
            $withdraw_lessthan = $data['amount'] - $reward_amount;
            $withdraw_morethan = $data['amount'] + $reward_amount;

            $object = array('topup' => $data['amount'],
                'reward'                => $reward_amount,
                'withdraw_lessthan'     => $withdraw_lessthan,
                'withdraw_morethan'     => $withdraw_morethan,
                'allow_withdraw'        => '0',
                'status'                => '1');
            $this->dbf->where('referee_id', $data['member_id']);
            $this->dbf->update('tb_affiliate', $object);

            $this->updateRefererBonusStatus($data['member_id']);
        }
    }

    private function getLive22_account($member_id)
    {
        $username = $this->dbf->query("SELECT username FROM tb_live22_account WHERE member_id = $member_id")->row()->username;
        return $username;
    }

    private function getSlotxo_account($member_id)
    {
        $username = $this->dbf->query("SELECT username FROM tb_slotxo_account WHERE member_id = $member_id")->row()->username;
        return $username;
    }

    private function getUserBalance($member_id)
    {

        $wallet_balance = $this->dbf->query("SELECT * FROM tb_member_wallet WHERE member_id = $member_id")->row()->wallet_balance;

        $balance = $wallet_balance;

        return $balance;
    }

    public function get_member_bank_by_id($id)
    {
        // echo '<script>console.log(' .$id. ')</script>';
        $bank = $this->dbf->query("SELECT * FROM tb_member_bank_account WHERE member_id = $id")->row();
        return $bank;
    }

    public function get_deposit_all_bank()
    {
        $bank = $this->dbb->query("SELECT * FROM tb_admin_bank_account WHERE category='deposit' AND status='1'");
        return $bank->result();
    }
    public function get_admin_bank_from_bank_name($bank_name)
    {
        $bank = $this->dbb->query("SELECT * FROM tb_admin_bank_account WHERE bank_company = '{$bank_name}' AND category='deposit' AND status='1'");
        return $bank->result();
    }

    public function get_admin_primary_bank()
    {
        $bank = $this->dbb->query("SELECT bank_company FROM tb_admin_bank_account WHERE category='deposit' AND status='1' AND primary_bank = '1'")->row();
        return $bank->bank_company;
    }

    public function get_deposit_bank($id)
    {
        $bank = $this->dbb->query("SELECT * FROM tb_admin_bank_account WHERE id = $id");
        return $bank->result();
    }
}

/* End of file Topup_model.php */
/* Location: ./application/models/process/Topup_model.php */
