<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bonus_model extends CI_Model
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

    public function check_if_bonus_active()
    {
        $q = $this->dbf->query("SELECT bonus FROM tb_member_account WHERE id = {$this->member_id}")->row();

        return $q->bonus;
    }
    public function withdraw_min_from_config()
    {
        $q = $this->dbb->query("SELECT * FROM tb_frontend_config WHERE id = '1'")->row();
        return $q->min_withdraw_amount;
    }

    public function activeBonus($min_withdraw)
    {
        $this->dbf->where('id', $this->member_id);
        $this->dbf->update('tb_member_account', array('bonus' => 1));

        $this->setBonus($min_withdraw);
    }

    public function getMinWithdraw($member_id)
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_bonus WHERE member_id = '{$member_id}' order by id desc")->row();

        if (isActiveBonus()) {
            return 300;
        } else {
            return $q->min_withdraw_amount;
        }
    }

    public function setTurnWithdraw($amount)
    {
        $this->dbf->where('id', $this->member_id);
        $this->dbf->update('tb_member_account', array('turn_amount' => $amount));

    }
    public function promotion_by_memberid($member_id)
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_promotion
        WHERE member_id = '{$member_id}' order by id desc limit 1")->row();
        return $q;
    }

    public function getPromotionlist()
    {
        $q = $this->dbb->query("SELECT * FROM tb_promotion
        WHERE status = '1'")->row();
        return $q;

    }

    public function getPromotion_by_id($id)
    {
        $q = $this->dbb->query("SELECT * FROM tb_promotion
        WHERE status = '1' and id='{$id}'")->row();
        return $q;

    }
    public function getPromotion_con_by_promotion_id($id)
    {
        $q = $this->dbb->query("SELECT * FROM tb_promotion_condition
        WHERE promotion_id='{$id}'");
        return $q;

    }
    public function getever_con_by_promotion_id($id)
    {
        $q = $this->dbb->query("SELECT * FROM tb_promotion_condition_ever
        WHERE promotion_id='{$id}'");
        return $q;

    }

    
    public function count_used_bonus($member_id, $promotion_id)
    {
        $q = $this->dbf->query("SELECT count(promotion_id) as count_promotion FROM `tb_member_deposit_bonus_log` where member_id = '{$member_id}' AND get_bonus = 1 and promotion_id = '{$promotion_id}'")->row();
        return $q->count_promotion;
    }

    public function count_used_bonus_all($member_id, $promotion_id)
    {
        $q = $this->dbf->query("SELECT count(promotion_id) as count_promotion FROM `tb_member_deposit_bonus_log` where member_id = '{$member_id}' AND get_bonus = 1 and promotion_id = '{$promotion_id}'")->row();
        return $q->count_promotion;
    }

    public function count_used_bonus_per_day($member_id, $promotion_id)
    {
        $date = date("Y-m-d");
        $q    = $this->dbf->query("SELECT count(promotion_id) as count_promotion FROM `tb_member_deposit_bonus_log`
        where member_id = '{$member_id}' AND DATE(update_time)=DATE('$date') AND get_bonus = 1 and promotion_id = '{$promotion_id}'")->row();
        return $q->count_promotion;
    }

    public function checkDupBonus($member_id, $previous_balance, $amount)
    {
        $date = date("Y-m-d");

        $q = $this->dbf->query("SELECT COUNT(*) bonus FROM tb_member_deposit_log
                                        WHERE member_id = '{$member_id}'
                                            AND previous_balance = '{$previous_balance}'
                                            AND amount = '{$amount}'
                                            AND DATE(datetime)=DATE('$date') AND channel = 'BONUS'")->row();
        return $q;

    }
    public function checkDupBonus10($member_id, $previous_balance, $amount)
    {
        $date = date("Y-m-d");

        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_log
                                        WHERE member_id = '{$member_id}'
                                            AND previous_balance = '{$previous_balance}'
                                            AND amount = '{$amount}'
                                            AND DATE(datetime)=DATE('$date')  order by id desc limit 1")->row();
        return $q;

    }

    public function getBonusWithdrawDetail()
    {
        $q = $this->dbf->query("SELECT * FROM tb_member_deposit_bonus_log WHERE member_id = '{$this->member_id}' AND status='1' ORDER BY id DESC LIMIT 1")->row()->memo;
        return $q;
    }

    public function setTopupFirstTime($member_id)
    {
        $topup_first_time = $this->dbf->query("SELECT * FROM tb_member_account WHERE id = '{$member_id}'")->row()->topup_first_time;

        if (($topup_first_time == 0) || ($topup_first_time == 1)) {
            $this->dbf->where('id', $member_id);
            $this->dbf->update('tb_member_account', array('topup_first_time' => '2'));
        }
    }

    protected function setBonus($min_withdraw)
    {
        $object = array('member_id' => $this->member_id,
            'min_withdraw_amount'       => $min_withdraw);
        $this->dbf->insert('tb_member_bonus', $object);
    }

    public function insertBonusLog($amount, $memo, $promotion_id, $deposit_log_id)
    {
        $date   = date("Y-m-d H:i:s");
        $object = array(
            'member_id'      => $this->member_id,
            'amount'         => $amount,
            'status'         => '1',
            'memo'           => $memo,
            'update_time'    => $date,
            'react_staffid'  => '0',
            'promotion_id'   => $promotion_id,
            'deposit_log_id' => $deposit_log_id,
        );
        $this->dbf->insert('tb_member_deposit_bonus_log', $object);
    }

    public function deactiveBonus()
    {
        $this->dbf->where('id', $this->member_id);
        $this->dbf->update('tb_member_account', array('bonus' => '0'));
        $this->resetBonus();
    }

    protected function resetBonus()
    {
        $this->dbf->where('member_id', $this->member_id);
        $this->dbf->delete('tb_member_bonus');
    }
}
/* End of file Bonus_model.php */
/* Location: ./application/models/Bonus_model.php */
