<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

function live22_member_data()
{
	$game_account = game_account();
	$client = new Client();
	$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/live22/']);

	$response = $client->request('GET', 'MemberInfo',['query' => ['username' => $game_account->live22->username]]);
	$res = json_decode($response->getBody());
	return $res;
}

function slotxo_member_data()
{
	$game_account = game_account();
	$client = new Client();
	$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/Agent/']);

	$response = $client->request('GET', 'MemberInfo',['query' => ['username' => $game_account->slotxo->username]]);
	$res = json_decode($response->getBody());
	return $res;
}

function slotxo_member_data_n()
{
	$game_account = game_account();
	$client = new Client();
	$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/Agent/']);

	$response = $client->request('GET', 'GetMemberDetail',['query' => ['username' => $game_account->slotxo->username]]);
	$res = json_decode($response->getBody());
	return $res;
}

function get_slotxo_member_data($username)
{
	$client = new Client();
	$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/Agent/']);

	$response = $client->request('GET', 'MemberInfo',['query' => ['username' => $username]]);
	$res = json_decode($response->getBody());
	return $res;
}

function get_slotxo_member_data_n($username)
{
	$client = new Client();
	$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/Agent/']);

	$response = $client->request('GET', 'GetMemberDetail',['query' => ['username' => $username]]);
	$res = json_decode($response->getBody());
	return $res;
}

function get_live22_member_data($username)
{
	$client = new Client();
	$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/live22/']);

	$response = $client->request('GET', 'MemberInfo',['query' => ['username' => $username]]);
	$res = json_decode($response->getBody());
	return $res;
}

function get_live22_member_data2($username)
{
	error_reporting(0);
        ini_set('memory_limit', '512M');
        // require_once 'function/simple_html_dom.php';
        //header('Content-Type: application/json');
	$game_account = game_account();

        $username_id =  $game_account->live22->username;

        if(empty($username_id))
        {
            $response['status'] = 'error';
            $response['message'] = 'username is empty!';
            echo json_encode($response);
            exit();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://siti22.com/tapi/getbalance",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"agent_id\":\"thslot9\",\n\t\"password\":\"Wut.16881688!@##\",\n\t\"player_id\":\"{$username_id}\",\n\t\"client_ip\":\"68.183.188.75\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $json = json_decode($response, true);
        curl_close($curl);
       // return $json['balance'];


        if(is_null($json['balance']))
        {
            $data = (object)array('current_balance' => 0.00);
            return $data;
            exit();
        }
        else
        {
            $data = (object)array('current_balance' => str_replace(',', '', $json['balance']));
            return $data;
            exit();
        }
}

function get_slotxo_balance($username)
{
	$client = new Client();
	$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/new/SlotXO/']);

	$response = $client->request('GET', 'GetUserCredit',['query' => ['username' => $username]]);
	$res = json_decode($response->getBody());
	return $res;
}

function getMemberTotalBalance($member_id)
{
    $CI =&get_instance();
    $CI->load->model('process/Member_model');
    $CI->load->model('process/Balance_model');
    $member_detail = $CI->Member_model->getMemberDetail($member_id);


    // return $member_detail;

    $m_id = $member_detail->id;
	$m_wpd = $member_detail->password;

    $slotxo_acc = $CI->Member_model->GetSlotXO($m_id,$m_wpd);
    $live22_acc = $CI->Member_model->GetLive22($m_id,$m_wpd);

    $arr = (object)array('slotxo' => $slotxo_acc,
                         'live22' => $live22_acc);

    $data_res->wallet = $CI->Balance_model->getMemberWalletBalance($member_id);
    $data_res->slotxo = get_slotxo_balance($arr->slotxo->username);
    $data_res->live22 = get_live22_member_data2($arr->live22->username);

    $wallet_balance = $data_res->wallet->wallet_balance;
    $slotxo_balance = $data_res->slotxo->data->Credit;
    $live22_balance = $data_res->live22->data->current_balance;

    $total_balance = $wallet_balance+$slotxo_balance+$live22_balance;

    return $total_balance;
}
function line_push_message($message){

    // $strAccessToken = 'n98EOvJUEtJGcQ6hCP0h2aCAAEt8g24ioEFlMtdRKki';
    $strAccessToken = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
    $chOne = curl_init();
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $chOne, CURLOPT_POST, 1);
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message");
    curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);

    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$strAccessToken, );  // หลังคำว่า Bearer ใส่ line authen code ไป
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $chOne );

    curl_close( $chOne );
}
?>