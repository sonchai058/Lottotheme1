<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Balance extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->game_account = game_account();
    }

    public function index()
    {
        // $this->load->model('Bonus_model','bonusm');
        $this->load->model('process/Balance_model', 'balancem');
        $this->load->model('process/Member_model', 'membermd'); 
        $_agent  = $this->_agent();
        $_withdraw_min = $this->_min_withdraw();
        // $is_bonus_active = $this->bonusm->check_if_bonus_active();
        $max_withdraw_by_turn = db_userdata('max_withdraw_by_turn');
        // Update Credit All
        $this->membermd->update_all_agent_credit();
        $wallet = $_agent;
        // $wallet = 0;
        $agent1 = $this->balancem->getallwallet()->agent_1_wallet;
        $agent2 = $this->balancem->getallwallet()->agent_2_wallet;
        $agent3 = $this->balancem->getallwallet()->agent_3_wallet; 


        $sum_current = $wallet+$agent1+$agent2+$agent3;
        // $sum_current = $wallet;
        // $sum_current = 0;
        // เพิ่ม ถ้ามีค่า max_withdraw_by_turn ให้ใช้ถอนขั้นต่ำ = max_withdraw_by_turn
        if ($max_withdraw_by_turn != 0) {
            $_withdraw_min = $max_withdraw_by_turn;
        }
        
            $total_balance   = (object) array('current_balance' => $sum_current);
            $summary_balance = (object) array(
                'total'  => $total_balance,
                'min_withdraw' => $_withdraw_min,
                'wallet_balance' => $wallet);
    
        // if($is_bonus_active == 1)
        // {
        //     // $min_withdraw_amount = $this->bonusm->getMinWithdraw(sess_userdata('id'));

        //     // if($total_balance < 5)
        //     // {
        //     //     $this->bonusm->deactiveBonus();
        //     // }
        // }

        header('Content-Type: application/json');
        echo json_encode($summary_balance);
        exit();
    }

    public function releaseHold()
    {
        $this->load->model('process/Topup_model', 'topupm');
        $this->load->model('Bonus_model', 'bonusm');
        $this->load->model('process/Balance_model', 'balancem');

        $_wallet = $this->_wallet();
        // $_live22 = $this->get_live22_balalnce();
        // $_slotxo = $this->_slotxo_n();
        $_agent  = $this->_agent();
        // $sum_current = $_wallet->current_balance + $_live22->current_balance + $_slotxo->current_balance;
        $sum_current = $_agent->current_balance;
        if (!$this->topupm->check_if_bonus_active(sess_userdata('id'))) {
            if ($sum_current <= 5) {
                $total_hold = 0;
                foreach ($this->balancem->holdDeposit() as $row) {
                    $total_hold += $row->amount;
                }
                $this->topupm->addWalletBalance($total_hold, sess_userdata('id'));
                $this->topupm->update_hold_balance(sess_userdata('id'));
                $this->bonusm->deactiveBonus();
                $response['status']  = 'success';
                $response['message'] = 'ระบบทำการโอนเงินเข้ากระเป๋าหลักเรียบร้อยแล้ว';

            } else {
                $response['status']  = 'error';
                $response['message'] = 'กรุณาทำเงื่อนไขการเทิร์นโอเวอร์ให้ครบก่อน หรือมียอดเครดิตเหลือต่ำกว่า 5 จึงจะสามารถโอนเครดิตเข้ากระเป๋าหลักได้';
            }
        } else {
            // $total_hold = $this->_total_hold();
            $total_hold = 0;
            foreach ($this->balancem->holdDeposit() as $row) {
                $total_hold += $row->amount;
            }

            $this->topupm->addWalletBalance($total_hold, sess_userdata('id'));
            $this->topupm->update_hold_balance(sess_userdata('id'));
            $response['status']  = 'success';
            $response['message'] = 'ระบบทำการโอนเงินเข้ากระเป๋าหลักเรียบร้อยแล้ว';
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private function _total_hold()
    {
        $this->load->model('process/Balance_model', 'balancem');

        $total_hold = 0;
        foreach ($this->balancem->holdDeposit() as $row) {
            $total_hold += $row->amount;
        }

        return $total_hold;
    }

    public function getWalletBalance()
    {
        header('Content-Type: application/json');
        $res = $this->_wallet();
        echo json_encode($res);
    }

    public function getLive22Balance()
    {
        // header('Content-Type: application/json');
        // $res = $this->get_live22_balalnce();
        // echo json_encode($res);
    }

    public function getSlotXoBalance()
    {
        // header('Content-Type: application/json');
        // $res = $this->_slotxo_n();
        // echo json_encode($res);
    }

    private function _wallet()
    {
        $this->load->model('process/Balance_model', 'balancem');
        $res  = $this->balancem->walletBalance();
        $data = (object) array('current_balance' => str_replace(",", "", $res->wallet_balance));
        return $data;
    }
    private function _agent()
    { 
        $this->load->model('process/Balance_model', 'balancem');
        $res  = $this->balancem->getwalletBalance(); 
        return $res;
    }

    private function check_credit($agent,$username) {

        if($agent != "") {
             $this->load->model('process/Member_model', 'membermd');
          
      
            if ($agent == "1") {
                $credit  = $this->membermd->GetUserCredit_api1($username);
            }
            else if ($agent == "2") {
                $credit  = $this->membermd->GetUserCredit_api2($username);

            }
            else if ($agent == "3") {
                $credit  = $this->membermd->GetUserCredit_api3($username);
            }
            else {
                $credit =  0;
            }
            return $credit;
        }


    }

    private function _slotxo_n()
    { 
    }
    private function _min_withdraw()
    {
        $this->load->model('Bonus_model', 'bnmd');
        $res  = $this->bnmd->withdraw_min_from_config();
        return $res;
    }
    private function get_live22_balalnce()
    {
        
    }

    private function _live22_n()
    {
        
    }
}

/* End of file Wallet.php */
/* Location: ./application/controllers/api/member/Wallet.php */
