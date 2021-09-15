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

        $_wallet = $this->_wallet();
        $_live22 = $this->get_live22_balalnce();
        $_slotxo = $this->_slotxo_n();

        // $is_bonus_active = $this->bonusm->check_if_bonus_active();

        $sum_current     = $_wallet->current_balance + $_live22->current_balance + $_slotxo->current_balance;
        $total_balance   = (object) array('current_balance' => $sum_current);
        $summary_balance = (object) array(
            'total'  => $total_balance,
            'wallet' => $_wallet,
            'live22' => $_live22,
            'slotxo' => $_slotxo);

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

        $_wallet     = $this->_wallet();
        $_live22     = $this->get_live22_balalnce();
        $_slotxo     = $this->_slotxo_n();
        $sum_current = $_wallet->current_balance + $_live22->current_balance + $_slotxo->current_balance;

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
        header('Content-Type: application/json');
        $res = $this->get_live22_balalnce();
        echo json_encode($res);
    }

    public function getSlotXoBalance()
    {
        header('Content-Type: application/json');
        $res = $this->_slotxo_n();
        echo json_encode($res);
    }

    private function _wallet()
    {
        $this->load->model('process/Balance_model', 'balancem');
        $res  = $this->balancem->walletBalance();
        $data = (object) array('current_balance' => str_replace(",", "", $res->wallet_balance));
        return $data;
    }

    private function _slotxo_n()
    {
        $client = new Client();
        $client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/new/SlotXO/']);

        $response = $client->request('GET', 'GetUserCredit', ['query' => ['username' => $this->game_account->slotxo->username]]);
        $res      = json_decode($response->getBody());

        if (is_null($res->data->Credit)) {
            $data = (object) array('current_balance' => 0.00);
            return $data;
            exit();
        } else {
            $data = (object) array('current_balance' => $res->data->Credit);
            return $data;
            exit();
        }
    }

    private function get_live22_balalnce()
    {
        error_reporting(0);
        ini_set('memory_limit', '512M');
        // require_once 'function/simple_html_dom.php';
        //header('Content-Type: application/json');

        $username_id = $this->game_account->live22->username;

        if (empty($username_id)) {
            // $response['status'] = 'error';
            // $response['message'] = 'username is empty!';
            // echo json_encode($response);
            exit();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://siti22.com/tapi/getbalance",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "{\n\t\"agent_id\":\"thslot9\",\n\t\"password\":\"Wut.16881688!@##\",\n\t\"player_id\":\"{$username_id}\",\n\t\"client_ip\":\"68.183.188.75\"\n}",
            CURLOPT_HTTPHEADER     => array(
                "Accept: */*",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        $err      = curl_error($curl);
        $json     = json_decode($response, true);
        curl_close($curl);
        // return $json['balance'];

        if (is_null($json['balance'])) {
            $data = (object) array('current_balance' => 0.00);
            return $data;
            exit();
        } else {
            $data = (object) array('current_balance' => str_replace(',', '', $json['balance']));
            return $data;
            exit();
        }

    }

    private function _live22_n()
    {
        $client = new Client();
        $client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/live22/']);

        $response = $client->request('GET', 'MemberInfo.php', ['query' => ['username' => $this->game_account->live22->username]]);
        $res      = json_decode($response->getBody());

        if (is_null($res->data->current_balance)) {
            $data = (object) array('current_balance' => 0.00);
            return $data;
            exit();
        } else {
            $data = (object) array('current_balance' => str_replace(',', '', $res->data->current_balance));
            return $data;
            exit();
        }
    }
}

/* End of file Wallet.php */
/* Location: ./application/controllers/api/member/Wallet.php */
