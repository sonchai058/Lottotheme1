<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Transfer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('process/Balance_model', 'balancem');
        $this->load->model('process/Logs_model', 'logsm');
        header("Content-type:application/json");
        $this->game_account = game_account();

        if (webSetting('transfer') === 'false') {
            $response['status']  = 'error';
            $response['message'] = 'ปิดระบบโยกเงินชั่วคราว ขออภัยในความไม่สะดวกคะ';
            echo json_encode($response);
            exit();
        }

    }

    public function towallet()
    {
        header('Content-Type: application/json');
        //print_r($this->input->input_stream());
        $game_provider = $this->input->input_stream('game_provider', true);
        $amount        = floatval($this->input->input_stream('game_amount', true));

        if (empty($game_provider) or empty($amount)) {
            // $response['status'] = 'error';
            // $response['message'] = 'ไม่สามารถทำรายการได้';
            // echo json_encode($response);
            exit();
        }

        if ($game_provider == 'live22') {
            $current_balance = $this->_live22_current_balance();

            $res = $this->_withdraw_live22($amount);
            //print_r($res);
            if ($res->status == 'success') {
                $this->balancem->adjustWalletBalance('+' . $amount);
                $response['status']  = 'success';
                $response['message'] = 'ทำรายการโอนเงินจาก <strong>Live22</strong> ไปยัง <strong>Wallet</strong> จำนวน <strong>' . $amount . '</strong> บาท สำเร็จ!';

                $logs = array('form' => 'Live22', 'to' => 'Wallet', 'amount' => $amount);
                $this->logsm->transfer_log($logs);

                echo json_encode($response);
                exit();
            } else {
                $response['status']  = 'error';
                $response['message'] = "ไม่สามารถทำรายการได้<br>จำนวนเงินที่สามารถทำรายการโยกจาก <strong>Live22</strong> ไปยัง <strong>Wallet</strong> สุงสุดคือ <strong>{$current_balance}</strong> G PT";
                echo json_encode($response);
                exit();
            }
        } else if ($game_provider == 'slotxo') {
            $current_balance = $this->_slotxo_current_balance();

            if ($amount > $current_balance) {
                $response['status']  = 'error';
                $response['message'] = "ไม่สามารถทำรายการได้<br>จำนวนเงินที่สามารถทำรายการโยกจาก <strong>SlotXO</strong> ไปยัง <strong>Wallet</strong> สุงสุดคือ <strong>{$current_balance}</strong> G PT";
                echo json_encode($response);
                exit();
            } else if ($amount <= 0) {
                $response['status']  = 'error';
                $response['message'] = "ไม่สามารถทำรายการได้";
                echo json_encode($response);
                exit();
            } else {
                $data = $this->_slotxo_withdraw($amount);
                if ($data->status === true) {
                    $this->balancem->adjustWalletBalance('+' . $amount);
                    $response['status']  = 'success';
                    $response['message'] = 'ทำรายการโยกเงินจาก <strong>SlotXO</strong> ไปยัง <strong>Wallet</strong> จำนวน <strong>' . $amount . '</strong> บาท สำเร็จ!';

                    $logs = array('form' => 'SlotXO', 'to' => 'Wallet', 'amount' => $amount);
                    $this->logsm->transfer_log($logs);
                } else {
                    $response['status']  = 'error';
                    $response['message'] = "ไม่สามารถทำรายการได้  ระบบ SlotXO ไม่พร้อมให้บริการ กรุณาลองใหม่ในภายหลัง";
                }

                echo json_encode($response);
                exit();
            }
        } else {
            // $response['status']  = 'error';
            // $response['message'] = 'ไม่สามารถทำรายการได้!';
            // echo json_encode($response);
            exit();
        }

    }

    public function togame()
    {
        header('Content-Type: application/json');
        $game_provider = $this->input->input_stream('game_provider', true);
        $amount        = floatval($this->input->input_stream('game_amount', true));

        if (empty($game_provider) or empty($amount)) {
            // $response['status']  = 'error';
            // $response['message'] = 'ไม่สามารถทำรายการได้';
            // echo json_encode($response);
            exit();
        }

        $current_wallet_balance = $this->balancem->currentWalletBalance();

        if ($game_provider == 'live22') {
            if ($amount > $current_wallet_balance) {
                $response['status']  = 'error';
                $response['message'] = "ไม่สามารถทำรายการได้\nจำนวนเงินที่สามารถทำรายการโยกจาก <strong>Wallet</strong> ไปยัง <strong>Live22</strong> สุงสุดคือ <strong>{$current_wallet_balance}</strong> บาท";
                echo json_encode($response);
                exit();
            } else if ($amount <= 0) {
                $response['status']  = 'error';
                $response['message'] = "ไม่สามารถทำรายการได้";
                echo json_encode($response);
                exit();
            } else {
                $amount = $current_wallet_balance;
                $res    = $this->_deposit_live22($amount);

                if ($res['status'] == 'success') {
                    $this->balancem->adjustWalletBalance('-' . $amount);
                    $response['status']  = 'success';
                    $response['message'] = 'ทำรายการโอนเงินจาก <strong>Wallet</strong> ไปยัง <strong>Live22</strong> จำนวน <strong>' . $amount . '</strong> บาท สำเร็จ!';

                    $logs = array('form' => 'Wallet', 'to' => 'Live22', 'amount' => $amount);
                    $this->logsm->transfer_log($logs);
                } else {
                    $response['status']  = 'success';
                    $response['message'] = 'ไม่สามารถทำรายการได้!';
                }

                echo json_encode($response);
                exit();
            }

        } else if ($game_provider == 'slotxo') {
            if ($amount > $current_wallet_balance) {
                $response['status']  = 'error';
                $response['message'] = "ไม่สามารถทำรายการได้ จำนวนเงินที่สามารถทำรายการโยกจาก <strong>Wallet</strong> ไปยัง <strong>SlotXO</strong> สุงสุดคือ <strong>{$current_wallet_balance}</strong> บาท";
                echo json_encode($response);
                exit();
            } else if ($amount <= 0) {
                $response['status']  = 'error';
                $response['message'] = "ทำรายการไม่สำเร็จ";
                echo json_encode($response);
                exit();
            } else {
                $amount = $current_wallet_balance;
                $data   = $this->_slotxo_deposit($amount);

                if ($data->status === true) {
                    $this->balancem->adjustWalletBalance('-' . $amount);
                    $response['status']  = 'success';
                    $response['message'] = 'ทำรายการโอนเงินจาก <strong>Wallet</strong> ไปยัง <strong>SlotXO</strong> จำนวน <strong>' . $amount . '</strong> บาท สำเร็จ!';

                    $logs = array('form' => 'Wallet', 'to' => 'SlotXO', 'amount' => $amount);
                    $this->logsm->transfer_log($logs);
                } else {
                    $response['status']  = 'error';
                    $response['message'] = "ไม่สามารถทำรายการได้";
                }

                echo json_encode($response);
                exit();
            }
        } else {
            $response['status']  = 'error';
            $response['message'] = 'ไม่สามารถทำรายการได้!';
            echo json_encode($response);
            exit();
        }
    }

    // LIVE22
    private function _deposit_live22($amount)
    {
        //$live22_api = new Client();
        //$live22_api = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/live22/']);

        /*$response = $live22_api->request('POST', 'Deposit', [
        'form_params' => [
        'username' => $this->game_account->live22->username,
        'amount' => $amount
        ]
        ]);

        return json_decode($response->getBody());*/

        error_reporting(0);
        ini_set('memory_limit', '512M');

        $username_id = $this->game_account->live22->username;

        if (empty($username_id)) {
            // $response['status']  = 'error';
            // $response['message'] = 'username is empty!';
            // echo json_encode($response);
            exit();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://siti22.com/tapi/deposit",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "{\n\t\"agent_id\":\"thslot9\",\n\t\"password\":\"Wut.16881688!@##\",\n\t\"player_id\":\"{$username_id}\",\n\t\"amount\":\"{$amount}\",\n\t\"client_ip\":\"68.183.188.75\"\n}",
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
        //print_r($json);
        if ($json['success'] == '1') {
            $data['status'] = 'success';
            return $data;
        } else {
            $data['status'] = 'false';
            return $data;
        }
        // return $json['balance'];
    }

    private function _withdraw_live22($amount)
    {
        //$live22_api = new Client();
        //$live22_api = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/live22/']);

        //$response = $live22_api->request('POST', 'Withdraw', [
        //                            'form_params' => [
        //                                'username' => $this->game_account->live22->username,
        //                                'amount' => $amount
        //                            ]
        //                        ]);

        //return json_decode($response->getBody());

        error_reporting(0);
        ini_set('memory_limit', '512M');

        $username_id = $this->game_account->live22->username;

        if (empty($username_id)) {
            // $response['status']  = 'error';
            // $response['message'] = 'username is empty!';
            // echo json_encode($response);
            exit();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://siti22.com/tapi/withdrawal",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "{\n\t\"agent_id\":\"thslot9\",\n\t\"password\":\"Wut.16881688!@##\",\n\t\"player_id\":\"{$username_id}\",\n\t\"amount\":\"{$amount}\",\n\t\"client_ip\":\"68.183.188.75\"\n}",
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
        //print_r($json);
        if ($json['success'] == '1') {
            //(object)$data['status']='success';
            $data = (object) array('status' => 'success');
            return $data;
        } else {
            //(object)$data['status']='false';
            $data = (object) array('status' => 'false');
            return $data;
        }

    }

    // SLOTXO

    private function _slotxo_withdraw($amount)
    {
        $slotxo_api = new Client();
        $slotxo_api = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/new/SlotXO/']);

        $response = $slotxo_api->request('POST', 'Withdraw', [
            'query' => [
                'username' => $this->game_account->slotxo->username,
                'amount'   => $amount,
            ],
        ]);

        return json_decode($response->getBody());
    }

    private function _slotxo_withdraw2($amount)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "http://api6.slot999.com/new/SlotXO/Withdraw",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => "{\n\t\"username\":\"{$this->game_account->slotxo->username}\",\n\t\"amount\":\"{$amount}\"}",
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
        return $json;
    }

    private function _slotxo_deposit($amount_old)
    {
        $this->load->model('process/Balance_model', 'balancem');
        $current_wallet_balance = $this->balancem->currentWalletBalance(); 

        $slotxo_api = new Client();
        $slotxo_api = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/new/SlotXO/']);

        $response = $slotxo_api->request('POST', 'Deposit', [
            'query' => [
                'username' => $this->game_account->slotxo->username,
                'amount'   => $current_wallet_balance,
            ],
        ]);

        return json_decode($response->getBody());

    }

    private function _live22_current_balance()
    {
        error_reporting(0);
        ini_set('memory_limit', '512M');

        $username_id = $this->game_account->live22->username;

        if (empty($username_id)) {
            // $response['status']  = 'error';
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
            $data = 0.00;
            return $data;
            exit();
        } else {
            $data = str_replace(',', '', $json['balance']);
            return $data;
            exit();
        }

    }

    /*private function _live22_current_balance()
    {
    $client = new Client();
    $client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/live22/']);

    $response = $client->request('GET', 'MemberInfo',['query' => ['username' => $this->game_account->live22->username]]);
    $res = json_decode($response->getBody());

    if(is_null($res->data->current_balance))
    {
    return 0;
    exit();
    }
    else
    {
    return str_replace(',', '', $res->data->current_balance);
    exit();
    }
    }*/

    private function _slotxo_current_balance()
    {
        $client = new Client();
        $client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/new/SlotXO/']);

        $response = $client->request('POST', 'GetUserCredit', ['query' => ['username' => $this->game_account->slotxo->username]]);
        $res      = json_decode($response->getBody());

        if (is_null($res->data->Credit)) {
            return 0;
            exit();
        } else {
            return $res->data->Credit;
            exit();
        }
    }

    public function trans_all_to_joker() {
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $api= $this->member_md->transfer_api_1();
        if ($api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        } 
        $summary = (object) array(
            'status' => $status,
            'msg'  => 'โยกเงินสำเร็จ'
        );


        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }

    public function trans_all_to_niki() {
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $api = $this->member_md->transfer_api_2();
        if ($api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        } 
        $summary = (object) array(
            'status' => $status,
            'msg'  => 'โยกเงินสำเร็จ'
        );

        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }

    public function trans_all_to_imi() {
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $api = $this->member_md->transfer_api_2();
        if ($api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        } 
        $summary = (object) array(
            'status' => $status,
            'msg'  => 'โยกเงินสำเร็จ'
        );

        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }
    public function trans_all_to_ufa() {
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $api = $this->member_md->transfer_api_3();
        if ($api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        } 
        $summary = (object) array(
            'status' => $status,
            'msg'  => 'โยกเงินสำเร็จ'
        );


        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }

 


}

/* End of file Transfer.php */
/* Location: ./application/controllers/api/member/Transfer.php */
