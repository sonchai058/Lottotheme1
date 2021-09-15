<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Curl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('process/Topup_model','topupmd');
		

		//SCB ACCOUNT
		$this->scb->cookie = FCPATH.'protected/cookie-scb';
		$this->scb->username = 'Tn111269';
		$this->scb->password = 'Bn158158';
		$this->scb->account = '2482461256';

		//SCB ACCOUNT 2
		$this->scb2->cookie = FCPATH.'protected/cookie-scb-2';
		$this->scb2->username = 'Nd171799';
		$this->scb2->password = 'Bm272763';
		$this->scb2->account = '4170293749';


		//BAY ACCOUNT
		$this->bay->cookie = FCPATH.'protected/cookie-bay';
		$this->bay->username = 'tn111268';
		$this->bay->password = 'bn158158';
		$this->bay->account = '3321451676';

		//KBANK ACCOUNT
		$this->kbank->cookie = FCPATH.'protected/cookie-kbank';
		$this->kbank->username = 'Gg111888';
		$this->kbank->password = 'mon778899';
		$this->kbank->account = '023-2-79289-2';

		$this->bbl->cookie = FCPATH.'protected/cookie-bbl';
		$this->bbl->username = 'Ngg888999';
		$this->bbl->password = 'gt113388';
		$this->bbl->account = '0588019109';

		$this->ktb->cookie = FCPATH.'protected/cookie-ktb';
		$this->ktb->username = 'Ngg888999';
		$this->ktb->password = 'gt113388';
		$this->ktb->account = '9843830547';

		$this->kbank->cookie = FCPATH.'protected/cookie-kbank';
		$this->kbank->username = 'Ngg888999';
		$this->kbank->password = 'gt113388';
		$this->kbank->account = '011-1-56933-9';


		$this->line_token = 'BPpR6ernoVfi0GH21wV6wuaHw7KZhTAiJw10xh4xzkO';

		$this->db_back = $this->load->database('db_back', TRUE);
	}

	public function test()
	{
		ini_set('max_execution_time', 0);

		// ม้าริทยะ
		// $withdraw_acc1[0] = array('account_username' => 'Ngg888999',
		// 					   'account_password' => 'gt113388',
		// 					   'account_name' => 'ม้าริทยะ',
		// 					   'account_number' => '0000000000',
		// 					   'account_bank' => 'KBANK');
		$withdraw_acc1[1] = array('account_username' => 'Ngg888999',
							   'account_password' => 'gt113388',
							   'account_name' => 'ม้าริทยะ',
							   'account_number' => '9843830547',
							   'account_bank' => 'KTB');
		// $withdraw_acc1[2] = array('account_username' => 'Ngg888999',
		// 					   'account_password' => 'gt113388',
		// 					   'account_name' => 'ม้าริทยะ',
		// 					   'account_number' => '0000000000',
		// 					   'account_bank' => 'BBL');
		// $withdraw_acc1[3] = array('account_username' => 'Ngg888999',
		// 					   'account_password' => 'Gt113388',
		// 					   'account_name' => 'ม้าริทยะ',
		// 					   'account_number' => '0000000000',
		// 					   'account_bank' => 'SCB');
		$withdraw_acc1[4] = array('account_username' => 'Ngg888999',
							   'account_password' => 'gt113388',
							   'account_name' => 'ม้าริทยะ',
							   'account_number' => '7861009590',
							   'account_bank' => 'BAY');

		// นันทวุฒิ
		$withdraw_acc2[0] = array('account_username' => 'tm776699',
							   'account_password' => 'pa475622',
							   'account_name' => 'นันทวุฒิ',
							   'account_number' => '032-8-23733-4',
							   'account_bank' => 'KBANK');
		$withdraw_acc2[1] = array('account_username' => 'tm776699',
							   'account_password' => 'Pa472288',
							   'account_name' => 'นันทวุฒิ',
							   'account_number' => '4930585562',
							   'account_bank' => 'KTB');
		$withdraw_acc2[2] = array('account_username' => 'tm776699',
							   'account_password' => 'Pa4752237',
							   'account_name' => 'นันทวุฒิ',
							   'account_number' => '088075647',
							   'account_bank' => 'BBL');
		$withdraw_acc2[3] = array('account_username' => 'tm776699',
							   'account_password' => 'Pa475633',
							   'account_name' => 'นันทวุฒิ',
							   'account_number' => '3572895824',
							   'account_bank' => 'SCB');
		$withdraw_acc2[4] = array('account_username' => 'tm776699',
							   'account_password' => 'pa479479',
							   'account_name' => 'นันทวุฒิ',
							   'account_number' => '4631487521',
							   'account_bank' => 'BAY');

		// Deposit Account
		$deposit_acc[0] = array('account_username' => 'Tn111269',
							   'account_password' => 'Bn158158',
							   'account_name' => 'ตาริ',
							   'account_number' => '2482461256',
							   'account_bank' => 'SCB');
		$deposit_acc[1] = array('account_username' => 'Nd171799',
							   'account_password' => 'Bm272763',
							   'account_name' => 'ลัดดาวัลย์',
							   'account_number' => '4170293749',
							   'account_bank' => 'SCB');
		$deposit_acc[2] = array('account_username' => 'tn111268',
							   'account_password' => 'bn158158',
							   'account_name' => 'ตาริ',
							   'account_number' => '3321451676',
							   'account_bank' => 'BAY');


		// $this->notify("ประจำวันที่ ".date('d/m/Y'));

		// foreach ($deposit_acc as $r_1) {

			print_r($this->get_trn($deposit_acc[1]));
			print_r($this->get_trn($deposit_acc[0]));

		// 	// $data_r = $this->get_trn($r);
		// 	// print_r($data_r);
		// 	// $sum_deposit = 0;
		// 	// $sum_withdraw = 0;
		// 	// $rt_r = [];
		// 	// $rt_r['account_name'] = $r['account_name'];
		// 	// $rt_r['account_number'] = $r['account_number'];
		// 	// $rt_r['account_bank'] = $r['account_bank'];
		// 	// foreach ($data_r as $rr) {
		// 	// 	$rt_r['total_deposit'] += (float)$rr['total_deposit'];
		// 	// 	$rt_r['total_withdraw'] += (float)$rr['total_withdraw'];
		// 	// }
		// }

		// print_r($rt_r);

		// $message = '';
		// $sum_deposit = 0;
		// $sum_withdraw = 0;

		// $message .= "\n\n-----บัญชีฝาก-----\n";
		// foreach ($trn_arr as $r) {
		// 	$message = '';
		// 	$sum_deposit += (float)$r['total_deposit'];
		// 	$sum_withdraw += (float)$r['total_withdraw'];
		// 	$message .= "\nบัญชี : ".$r['account_bank']." - ".$r['account_name']." (".$r['account_number'].")\nยอดโอนเข้าทั้งหมด : ".number_format($r['total_deposit'],2)."\nยอดโอนออกทั้งหมด : ".number_format($r['total_withdraw'],2)."\n--------------------";
		// 	echo $message;
		// }

		// $message .= "\nรวมยอดโอนเข้าทั้งหมด : ".number_format($sum_deposit,2)."\nรวมยอดโอนออกทั้งหมด : ".number_format($sum_withdraw,2)."\n--------------------";
		// $this->notify($message);



		// $trn_arr = [];
		// foreach ($withdraw_acc1 as $r) {
		// 	$trn_arr[] = $this->get_trn($r);
		// }

		// foreach ($withdraw_acc2 as $r) {
		// 	$trn_arr[] = $this->get_trn($r);
		// }

		// $message = '';
		// $sum_deposit = 0;
		// $sum_withdraw = 0;

		// $message .= "\n\n-----บัญชีถอน-----\n";
		// echo $message;
		// foreach ($trn_arr as $r) {
		// 	$message = '';
		// 	$sum_deposit += (float)$r['total_deposit'];
		// 	$sum_withdraw += (float)$r['total_withdraw'];
		// 	$message .= "\nบัญชี : ".$r['account_bank']." - ".$r['account_name']." (".$r['account_number'].")\nยอดโอนเข้าทั้งหมด : ".number_format($r['total_deposit'],2)."\nยอดโอนออกทั้งหมด : ".number_format($r['total_withdraw'],2)."\n--------------------";
		// 	echo $message;
		// }

		// $message .= "\nรวมnยอดโอนเข้าทั้งหมด : ".number_format($sum_deposit,2)."\nรวมยอดโอนออกทั้งหมด : ".number_format($sum_withdraw,2)."\n--------------------";
		// $this->notify($message);

	}

	private function curl_kbank($input_arr)
	{
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_URL, 'https://online.kasikornbankgroup.com/K-Online/preLogin/popupPreLogin.jsp?lang=en');
        curl_setopt($ch, CURLOPT_COOKIEJAR, FCPATH."protected/cookie-".$input_arr['account_bank']."-".$input_arr['account_number']);
        curl_setopt($ch, CURLOPT_COOKIEFILE, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'isConfirm=T');
        curl_exec($ch);
        curl_setopt($ch, CURLOPT_URL, 'https://online.kasikornbankgroup.com/K-Online/login.jsp?lang=en');
        curl_setopt($ch, CURLOPT_POST, 0);
        $html = curl_exec($ch);
        $html = str_replace(array(
                                    "\r",
                                    "\t",
                                    "\n"
                                ), "", $html);
        preg_match('/(\<input type="hidden" name="tokenId" id="tokenId" value=")(.*?)("\/\>)/', $html, $temp);
        $sessid = $temp[2];
        curl_setopt($ch, CURLOPT_URL, 'https://online.kasikornbankgroup.com/K-Online/login.do');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'tokenId=' . $sessid . '&userName=' . $input_arr['account_username'] . '&password=' . $input_arr['account_password'] . '&cmd=authenticate&locale=en&app=0');
        $temp = curl_exec($ch);
        if (preg_match('/.*?Invalid User ID or Password.*?/', $temp)) {
            // return false;
            die('Invalid User ID or Password');
        }
        curl_setopt($ch, CURLOPT_URL, 'https://online.kasikornbankgroup.com/K-Online/indexHome.jsp');
        curl_setopt($ch, CURLOPT_POST, 0);
        $temp = curl_exec($ch);
        curl_setopt($ch, CURLOPT_URL, 'https://online.kasikornbankgroup.com/K-Online/ib/redirectToIB.jsp?r=' . rand(1000, 9999));
        curl_setopt($ch, CURLOPT_POST, 0);
        $html = curl_exec($ch);
        $html = str_replace(array(
            "\r",
            "\t",
            "\n"
        ), "", $html);
        preg_match('/(\<input type="hidden" name="txtParam" value=")(.*?)(" \/\>)/', $html, $temp);
        $txtParam = $temp[2];
        curl_setopt($ch, CURLOPT_URL, 'https://ebank.kasikornbankgroup.com/retail/security/Welcome.do');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'txtParam=' . $txtParam);
        $html = curl_exec($ch);
        if (preg_match('/.*?Unsuccessful Login.*?/', $html)) {
            // return false;
            die('Unsuccessful Login');
        }
        curl_setopt($ch, CURLOPT_URL, 'https://ebank.kasikornbankgroup.com/retail/RetailWelcome.do');
        curl_setopt($ch, CURLOPT_POST, 0);
        $html=curl_exec($ch);
        $html=str_replace(array("\r","\t","\n"), "", $html);
        // echo $html;
				preg_match_all('/<table.*Available<br>Balance(.*)apply_web_card_en/', $html, $temp);
        preg_match_all('/<td(.*?)>(.*?)<\/td>/', $temp[1][0], $temp);
        // return true;

        curl_setopt($ch, CURLOPT_URL, 'https://ebank.kasikornbankgroup.com/retail/cashmanagement/TodayAccountStatementInquiry.do');
        curl_setopt($ch, CURLOPT_POST, 0);
        $html = curl_exec($ch);
        $html = str_replace(array(
            "\r",
            "\t",
            "\n"
        ), "", $html);

        // echo $html;

        preg_match('/(\<input type="hidden" name="org.apache.struts.taglib.html.TOKEN" value=")(.*?)("\>)/', $html, $temp);
        $TOKEN = $temp[2];
        preg_match_all('/(\<option value=\")([0-9]{5,})(\"\>' . $input_arr['account_number'] . ')/', $html, $temp);
        if (count($temp) == 0) {
            // die("Not found that account.");
        }

        $ACCNUM = $temp[2][0];
        curl_setopt($ch, CURLOPT_URL, 'https://online.kasikornbankgroup.com/K-Online/checkSession.jsp');
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_exec($ch);
        curl_setopt($ch, CURLOPT_URL, 'https://ebank.kasikornbankgroup.com/retail/cashmanagement/TodayAccountStatementInquiry.do');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'org.apache.struts.taglib.html.TOKEN=' . $TOKEN . '&acctId=' . $ACCNUM . '&action=detail&st=0');
        $html = curl_exec($ch);
        $html = str_replace(array(
            "\r",
            "\t",
            "\n"
        ), "", $html);

        preg_match('/\<table bordercolor=#ffffff cellspacing=0 cellpadding=0 width=\"100%\"  border=1 rules=\"rows\"\>.+?\<\/table\>/', $html, $temp);
        preg_match_all('/(\<tr\>)(.*?)(\<\/tr\>)/', $temp[0], $temp);
        
        $data = [];
        foreach ($temp[2] as $mkey => $val) {
            if ($mkey != 0 && (!preg_match('/.*?Record not found.*?/', $val))) {
                preg_match_all('/<td class=inner_table_.*?>\s?(.*?)<\/td>/', $val, $temp2);
                foreach ($temp2[1] as $key => $val) {
                    switch ($key) {
                        case 0:
                            $data[$mkey - 1]['time'] = $val;
                            $data[$mkey - 1]['time'] = str_replace('/', '-', $data[$mkey - 1]['time']);
                            $data[$mkey - 1]['time'] = str_replace('<br>', '', $data[$mkey - 1]['time']);
                            preg_match('/([0-9]{2})-([0-9]{2})-([0-9]{2})\s{30}([0-9]{2}:[0-9]{2}:[0-9]{2})/', $data[$mkey - 1]['time'], $ar);
                            $data[$mkey - 1]['time'] = strtotime($ar[1] . '-' . $ar[2] . '-20' . $ar[3] . 'T' . $ar[4] . '+0700');
                            break;
                        case 1:
                            $data[$mkey - 1]['channel'] = $val;
                            break;
                        case 2:
                            $data[$mkey - 1]['detail'] = $val;
                            break;
                        case 3:
                            if ($val != '') {
                                $data[$mkey - 1]['value'] = (0 - floatval(preg_replace('/[^0-9\.\+\-]/','', $val)));
                            }
                            break;
                        case 4:
                            if ($val != '') {
                                $data[$mkey - 1]['value'] = floatval(preg_replace('/[^0-9\.\+\-]/','', $val));
                            }
                            break;
                        case 5:
                            $data[$mkey - 1]['fee'] = floatval(preg_replace('/[^0-9\.\+\-]/','', $val));
                            break;
                        case 6:
                            $data[$mkey - 1]['acc_num'] = str_replace(array('x','-'), array('*',''),$val);
                            break;
                        case 7:
                            $data[$mkey - 1]['detail'] .= ' (' . $val . ')';
                            break;
                    }
                }
                $data[$mkey - 1]['tx_hash'] = md5($data[$mkey - 1]['time'] . $data[$mkey - 1]['value']);
            }
        }

        $sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($data as $r) {

			if($r['value'] > 0)
			{
				$sum['in'] += $r['value'];
			}
			else
			{
				$sum['out'] -= $r['value'];
			}
		}

		$response = [];
		$response['account_name'] = $input_arr['account_name'];
		$response['account_number'] = $input_arr['account_number'];
		$response['account_bank'] = $input_arr['account_bank'];
		$response['total_deposit'] = $sum['in'];
		$response['total_withdraw'] = $sum['out'];
		return $response;
	}

	private function curl_ktb($input_arr)
	{
		ini_set('max_execution_time', 0);
		$response = [];
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/');
        curl_setopt($ch, CURLOPT_COOKIEJAR, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
        curl_setopt($ch, CURLOPT_COOKIEFILE, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36');
        curl_exec($ch);
        $CaptchaMP3 = '';
        while ($CaptchaMP3 === '') {
            curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/captcha/verifyImg');
            $CaptchaImage = curl_exec($ch);
            curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/CaptchaSound');
            $CaptchaMP3 = curl_exec($ch);
        }
        $CaptchaText = $this->DecodeMP3($CaptchaMP3);
        curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/Login.do');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'cmd=login&imageCode=' . $CaptchaText . '&userId=' . $input_arr['account_username'] . '&password=' . $input_arr['account_password']);
        $html = curl_exec($ch);

        curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/main.jsp');
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.ktbnetbank.com/consumer/Login.do');
        curl_setopt($ch, CURLOPT_POST, 0);
        $html = curl_exec($ch);
        preg_match('/(sessionKey = \')(.*?)(\';)/', $html, $sess);
        $sessionkey = $sess[2];


        //////
        curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/main.jsp');
        curl_setopt($ch, CURLOPT_POST, 0);
				if($this->firstget){
					curl_setopt($ch, CURLOPT_REFERER, 'https://www.ktbnetbank.com/consumer/Login.do');
					$this->firstget=false;
				}else{
					curl_setopt($ch, CURLOPT_REFERER, 'https://www.ktbnetbank.com/consumer/Menu.do?cmd=homePage');
				}
        $html = curl_exec($ch);
        preg_match('/(sessionKey = \')(.*?)(\';)/', $html, $sess);
        $sessionkey = $sess[2];
        if ($this->is_netbank) {
            curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/NetSavingAccount.do?cmd=init&sessId=' . urlencode($sessionkey));
        } else {
            curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/SavingAccount.do?cmd=init&sessId=' . urlencode($sessionkey));
        }
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.ktbnetbank.com/consumer/main.jsp');
        $html          = curl_exec($ch);
        $this->accdata = $this->xml2array(simplexml_load_string($html));
        $this->accdata = $this->accdata['DATA'];

            curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/SavingAccount.do?cmd=showDetails');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'from_date=&to_date=&radios=&specific_peroid=&accountNo=' . urlencode($this->accdata['ACCOUNTNO']) . '&accountNoDisp=' . urlencode($this->accdata['ACCOUNTNODISPLAY']) . '&newAliasName=&oldAliasName=&avaliableBalance=' . urlencode($this->accdata['AMOUNT']) . '&accountSelectedItem=%5Bobject%20Object%5D&amount=&radiosEditAmount=&note=&sessId=' . urlencode($sessionkey));
            curl_exec($ch);
            curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/Netbank/myaccount/saving/saving_accountdetail.jsp?sessId=' . urlencode($sessionkey));
            curl_setopt($ch, CURLOPT_REFERER, 'https://www.ktbnetbank.com/consumer/main.jsp');
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_exec($ch);
            curl_setopt($ch, CURLOPT_URL, 'https://www.ktbnetbank.com/consumer/SavingAccount.do?cmd=viewStatement');
            curl_setopt($ch, CURLOPT_REFERER, 'https://www.ktbnetbank.com/consumer/main.jsp');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'from_date=' . date('d-m-o', strtotime('-1 days')) . '&to_date=' . date('d-m-o') . '&radios=date_peroid&specific_peroid=currentMonth&accountNo=' . urlencode($this->accdata['ACCOUNTNO']) . '&accountNoDisp=' . urlencode($this->accdata['ACCOUNTNODISPLAY']) . '&newAliasName=&oldAliasName=&avaliableBalance=' . urlencode($this->accdata['AMOUNT']) . '&accountSelectedItem=%5Bobject%20Object%5D&amount=&radiosEditAmount=&note=&sessId=' . urlencode($sessionkey));
        $txlist = $this->xml2array((simplexml_load_string(curl_exec($ch))));
        $txlist = $txlist['DATA'];
        if (isset($txlist['ERRORMESSAGE'])) {
            return array();
        }
        if (isset($txlist['DATE'])) {
            $txlist = array(
                $txlist
            );
        }
        foreach ($txlist as $key => $val) {
            $val['time']      = strtotime($val['DATE']);
            $val['tran_type'] = ($val['TRANSACTION']);
            $val['detail']    = (is_array($val['DESCRIPTION'])) ? json_encode($val['DESCRIPTION']) : $val['DESCRIPTION'];
            $val['channel']   = ($val['BRANCH']);
            $val['value']     = preg_replace('/[^0-9\.\+\-]/','',$val['AMOUNT']);
            $val['tx_hash']   = md5(strtotime($val['DATE']) . $val['AMOUNT'] . $val['BALANCE']);
			preg_match('/[0-9]{10}/',$val['detail'],$tempacc);
			$val['acc_num']=@$tempacc[0];
            unset($val['DATE']);
            unset($val['CHEQUE_NO']);
            unset($val['PERIOD']);
            unset($val['FEE']);
            unset($val['CURRENTAMT']);
            unset($val['PRINCIPALAMT']);
            unset($val['PENALTYAMT']);
            unset($val['DUEDATE']);
            unset($val['INTERESTAMT']);
            unset($val['TAX']);
            unset($val['TRANSACTION']);
            unset($val['DESCRIPTION']);
            unset($val['BRANCH']);
            unset($val['AMOUNT']);
            unset($val['BALANCE']);
            $txlist[$key] = $val;
        }

        $sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($txlist as $r) {

			if($r['value'] > 0)
			{
				$sum['in'] += $r['value'];
			}
			else
			{
				$sum['out'] -= $r['value'];
			}
		}

		$response = [];
		$response['account_name'] = $input_arr['account_name'];
		$response['account_number'] = $input_arr['account_number'];
		$response['account_bank'] = $input_arr['account_bank'];
		$response['total_deposit'] = $sum['in'];
		$response['total_withdraw'] = $sum['out'];
		return $response;
	}

	private function curl_bbl($input_arr)
	{
		unlink($this->bbl->cookie);
		ini_set('max_execution_time', 0);
		$response = [];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
		curl_setopt($ch, CURLOPT_CAINFO, FCPATH . 'cert/cacert.pem');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
		curl_setopt($ch, CURLOPT_COOKIEFILE, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
		curl_setopt($ch, CURLOPT_HEADER, 0);


		curl_setopt($ch, CURLOPT_URL, 'https://ibanking.bangkokbank.com/SignOn.aspx');
		$data = curl_exec($ch);
		$html = str_get_html($data);

		$form_field = [];
		foreach ($html->find('input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$form_field['DES_Group'] = 'GROUPMAIN';
		$form_field['txtID'] = $input_arr['account_username'];
		$form_field['txtPwd'] = $input_arr['account_password'];


		$post_string = "__EVENTTARGET=".urlencode($form_field['__EVENTTARGET'])."&__EVENTARGUMENT=".urlencode($form_field['__EVENTARGUMENT'])."&DES_Group=".urlencode($form_field['DES_Group'])."&__VIEWSTATE=".urlencode($form_field['__VIEWSTATE'])."&__VIEWSTATEGENERATOR=".urlencode($form_field['__VIEWSTATEGENERATOR'])."&__EVENTVALIDATION=".urlencode($form_field['__EVENTVALIDATION'])."&txtID=".urlencode($form_field['txtID'])."&txtPwd=".urlencode($form_field['txtPwd'])."&btnLogOn=".urlencode($form_field['btnLogOn']);

		curl_setopt($ch, CURLOPT_URL, 'https://ibanking.bangkokbank.com/SignOn.aspx');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		curl_setopt($ch, CURLOPT_POST, 1);
		$data = curl_exec($ch);
		$html = str_get_html($data);

		// // echo $html;

		$form_field = [];
		foreach ($html->find('input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$form_field['AcctID'] = $this->bbl->account;
		$form_field['AcctIndex'] = '1';

		$post_string = http_build_query($form_field);

		curl_setopt($ch, CURLOPT_URL, 'https://ibanking.bangkokbank.com/workspace/16AccountActivity/wsp_AccountActivity_Saving_Current.aspx');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		curl_setopt($ch, CURLOPT_POST, 1);
		$data = curl_exec($ch);
		$html = str_get_html($data);
		$tables = $html->find('#ctl00_ctl00_C_CW_gvAccountTrans',0);

		$trn_arr = [];
		foreach ($tables->children as $row) {
			$rowData = [];
			foreach($row->find('td') as $cell){
				$rowData[] = preg_replace('/\s+/', '',$cell->plaintext);
			}
			$trn_arr[] = $rowData;
		}

		$trn_arr = array_slice($trn_arr, 1, -1);

		$sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($trn_arr as $r) {

			if($r['value'] > 0)
			{
				$sum['in'] += $r[4];
			}
			else
			{
				$sum['out'] += $r[3];
			}
		}

		$response = [];
		$response['account_name'] = $input_arr['account_name'];
		$response['account_number'] = $input_arr['account_number'];
		$response['account_bank'] = $input_arr['account_bank'];
		$response['total_deposit'] = $sum['in'];
		$response['total_withdraw'] = $sum['out'];
		return $response;
	}

	private function curl_scb($input_arr)
	{
		ini_set('max_execution_time', 0);
		$response = [];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
		curl_setopt($ch, CURLOPT_COOKIEFILE, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Expect:' ));

		$acc_id = 0;

		$form_field = [];
		$form_field['LOGIN'] = $input_arr['account_username'];
		$form_field['PASSWD'] = $input_arr['account_password'];
		$form_field['LANG'] = 'T';
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		// login
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);
		$html = str_get_html($data);
		$SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;

		$form_field = [];
		$form_field['SESSIONEASY'] = $SESSIONEASY;
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		// get AccBal ID
		$html = str_get_html($data);
		foreach ($html->find('a[id*="DataProcess_SaCaGridView_SaCa_LinkButton_"]') as $a) {
		    $text = $a->outertext;
		    $s = substr($input_arr['account_number'], 4);
		    $pos = strpos($text, $s);
		    if ($pos !== false) {
		        $href = htmlspecialchars_decode($a->href, ENT_QUOTES);
		        $href = str_replace("javascript:__doPostBack('", '', $href);
		        $href = str_replace("','')", '', $href);
		        $acc_href = $href;
		        break;
		    }
		}
	
		$html = str_get_html($data);
		$form_field = [];

		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$form_field['__EVENTTARGET'] = $acc_href;
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}

		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		// Get Current Balance
		$html = str_get_html($data);
		$form_field = [];
		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		#f1 form redirect
		$html = str_get_html($data);
		$form_field = [];
		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		$dom = new domDocument;
		$web_data = mb_convert_encoding($data, "UTF-8");
		$dom->loadHTML($data);

		$tables = $dom->getElementById('DataProcess_GridView');

		// echo $tables;

		if(!empty($tables)){
		    $rows = $tables->getElementsByTagName('tr');
		}

		$list = [];
		$list_arr = [];
		$sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($rows as $row) {
		    $cols = $row->getElementsByTagName('td');
		    if ($cols->item(1)->nodeValue != '' and $cols->item(0)->nodeValue != '???') {
		        // $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
		        // $list['out'] = (float) str_replace(array(',','-'), '', $this->clean($cols->item(4)->nodeValue));
		        // $list_arr[] = $list;

		        $sum['in'] += (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
				$sum['out'] += (float) str_replace(array(',','-'), '', $this->clean($cols->item(4)->nodeValue));
		    }
		}

		print_r($sum);

		// $response['account_name'] = $input_arr['account_name'];
		// $response['account_number'] = $input_arr['account_number'];
		// $response['account_bank'] = $input_arr['account_bank'];
		// $response['total_deposit'] = $sum['in'];
		// $response['total_withdraw'] = $sum['out'];
		// return $response;
	}

	private function curl_bay($input_arr)
	{

		ini_set('max_execution_time', 0);
		$response = [];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
		curl_setopt($ch, CURLOPT_CAINFO, FCPATH . 'cert/cacert.pem');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
		curl_setopt($ch, CURLOPT_COOKIEFILE, FCPATH."protected/cookie-".$input_arr['account_bank']."".$input_arr['account_number']);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// curl_setopt($ch, CURLOPT_TIMEOUT, 120);


		curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Common/Login.aspx');
		$data = curl_exec($ch);
		$html = str_get_html($data);

		$form_field = [];
		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$form_field['__EVENTTARGET'] = 'ctl00$cphForLogin$lbtnLoginNew';
		$form_field['password'] = '';
		$form_field['ctl00$cphForLogin$username'] = $input_arr['account_username'];
		$form_field['ctl00$cphForLogin$hdPassword'] = $input_arr['account_password'];
		$form_field['ctl00$cphForLogin$hddLanguage'] = 'TH';
		$password = '';
		$user = '';


		$post_string = '__EVENTTARGET='.urlencode($form_field['__EVENTTARGET']).'&__EVENTARGUMENT='.urlencode($form_field['__EVENTARGUMENT']).'&__VIEWSTATE='.urlencode($form_field['__VIEWSTATE']).'&__VIEWSTATEGENERATOR='.urlencode($form_field['__VIEWSTATEGENERATOR']).'&__EVENTVALIDATION='.urlencode($form_field['__EVENTVALIDATION']).'&user='.$user.'&password='.$password.'&username='.$user.'&password='.$password.'&ctl00%24cphForLogin%24username='.urlencode($form_field['ctl00$cphForLogin$username']).'&ctl00%24cphForLogin%24password='.urlencode($form_field['ctl00$cphForLogin$password']).'&ctl00%24cphForLogin%24hdPassword='.urlencode($form_field['ctl00$cphForLogin$hdPassword']).'&ctl00%24cphForLogin%24hddLanguage='.urlencode($form_field['ctl00$cphForLogin$hddLanguage']).'';


		curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Common/Login.aspx');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		curl_setopt($ch, CURLOPT_POST, 1);
		$data = curl_exec($ch);
		$html = str_get_html($data);

		foreach ($html->find('div.accmenu') as $element) {
			foreach ($element->find('a[class=menu_link_progress]') as $el) {
				$str = ltrim($el->href,'/BAY.KOL.WebSite/Pages/');
				if (preg_match('#^MyAccount(.*)$#i', $str))
				{
					$acc_token[] = ltrim($str,'MyAccount.aspx?token=');

				}
			}
		}

		curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Pages/MyAccount.aspx?token='.$acc_token[0]);
		$data = curl_exec($ch);
		$html = str_get_html($data);

		$transection_arr = [];
		foreach ($html->find("table.deposit_accsum_table") as $table) {
			$sum = [];
			foreach($table->find('tr') as $row){
				if($row->parent->tag == 'tbody') {
				    $rowData = [];

				    foreach($row->find('td') as $cell){
				        $rowData[] = $cell->innertext;
				    }

				   	$sum['in'] += (float)str_replace(',','',$this->clean($rowData[2]));
					$sum['out'] += (float)str_replace(',','',$this->clean($rowData[3]));
			    }
			}
		}

		$response['account_name'] = $input_arr['account_name'];
		$response['account_number'] = $input_arr['account_number'];
		$response['account_bank'] = $input_arr['account_bank'];
		$response['total_deposit'] = $sum['in'];
		$response['total_withdraw'] = $sum['out'];
		return $response;

	}

	private function get_trn($r)
	{
		$resp = [];
		switch ($r['account_bank']) {
			case 'KBANK':
				$resp = $this->curl_kbank($r);
				break;
			case 'KTB':
				$resp = $this->curl_ktb($r);
				break;
			case 'BBL':
				$resp = $this->curl_bbl($r);
				break;
			case 'SCB':
				$resp = $this->curl_scb($r);
				break;
			case 'BAY':
				$resp = $this->curl_bay($r);
				break;
			default:
				$resp = false;
				break;
		}

		return $resp;
	}


	// public function get()
	// {

	// 	ini_set('max_execution_time', 0);
	// 	$data[0] = $this->trn_scb();
	// 	$data[1] = $this->trn_scb_secound();
	// 	$data[2] = $this->trn_bay();

	// 	$message = 'ประจำวันที่ '.date('d/m/Y H:i:s');
	// 	$this->notify($message);
	// 	// echo $message;

	// 	$message = '';
	// 	$sum_deposit = 0;
	// 	$sum_deposit_db = 0;
	// 	$sum_withdraw = 0;
	// 	foreach ($data as $r) {
	// 		$sum_deposit += (float)$r['total_deposit'];
	// 		$sum_deposit_db += (float)$r['total_deposit_db'];
	// 		$sum_withdraw += (float)$r['total_withdraw'];
	// 		$message .= "\nบัญชี : ".$r['account_name']."\nยอดฝากทั้งหมด : ".number_format($r['total_deposit'],2)."\nยอดฝากในระบบ : ".number_format($r['total_deposit_db'],2)."\nยอดโอนออกทั้งหมด : ".number_format($r['total_withdraw'],2)."\n--------------------";
	// 	}

	// 	$message .= "\nรวมยอดฝากทั้งหมด : ".number_format($sum_deposit,2)."\nรวมยอดฝากในระบบทั้งหมด : ".number_format($sum_deposit_db,2)."\nรวมยอดโอนออกทั้งหมด : ".number_format($sum_withdraw,2)."\n--------------------";

	// 	// echo $message;

	// 	$this->notify($message);
	// }

	public function old_scb()
	{
		$time_start = microtime(true); 
		
		$this->scb->cookie = FCPATH.'protected/cookie-scb-new';
		$this->scb->username = 'Tn111269';
		$this->scb->password = 'Bn158158';
		$this->scb->account = '2482461256';
		// $this->ref='https://www.scbeasy.com/online/easynet/page/firstpage.aspx';

		ini_set('max_execution_time', 0);
		$response = [];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2049.0 Safari/537.36");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->scb->cookie);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->scb->cookie);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Expect:' ));

		$acc_id = 0;

		$form_field = [];
		$form_field['LOGIN'] = $this->scb->username;
		$form_field['PASSWD'] = $this->scb->password;
		$form_field['LANG'] = 'T';
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		// login
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);
		$html = str_get_html($data);
		$SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;

		$form_field = [];
		$form_field['SESSIONEASY'] = $SESSIONEASY;
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		// get AccBal ID
		$html = str_get_html($data);
		foreach ($html->find('a[id*="DataProcess_SaCaGridView_SaCa_LinkButton_"]') as $a) {
		    $text = $a->outertext;
		    $s = substr($input_arr['account_number'], 4);
		    $pos = strpos($text, $s);
		    if ($pos !== false) {
		        $href = htmlspecialchars_decode($a->href, ENT_QUOTES);
		        $href = str_replace("javascript:__doPostBack('", '', $href);
		        $href = str_replace("','')", '', $href);
		        $acc_href = $href;
		        break;
		    }
		}
	
		$html = str_get_html($data);
		$form_field = [];

		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$form_field['__EVENTTARGET'] = $acc_href;
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}

		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		// Get Current Balance
		$html = str_get_html($data);
		$form_field = [];
		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}
		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		#f1 form redirect
		$html = str_get_html($data);
		$form_field = [];
		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);
		curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		$data = curl_exec($ch);

		$dom = new domDocument;
		$web_data = mb_convert_encoding($data, "UTF-8");
		$dom->loadHTML($data);

		$tables = $dom->getElementById('DataProcess_GridView');

		// echo $tables;

		if(!empty($tables)){
		    $rows = $tables->getElementsByTagName('tr');
		}

		$list = [];
		$list_arr = [];
		$sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($rows as $row) {
		    $cols = $row->getElementsByTagName('td');
		    if ($cols->item(1)->nodeValue != '' and $cols->item(0)->nodeValue != '???') {
		        // $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
		        // $list['out'] = (float) str_replace(array(',','-'), '', $this->clean($cols->item(4)->nodeValue));
		        // $list_arr[] = $list;

		        $sum['in'] += (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
				$sum['out'] += (float) str_replace(array(',','-'), '', $this->clean($cols->item(4)->nodeValue));
		    }
		}

		$time_end = microtime(true);
		$execution_time = ($time_end - $time_start)/60;
		echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	}

	public function new_scb()
	{

		$time_start = microtime(true); 


		$this->scb->cookie = FCPATH.'protected/cookie-scb-new';
		$this->scb->username = 'Tn111269';
		$this->scb->password = 'Bn158158';
		$this->scb->account = '2482461256';
		$this->ref='https://www.scbeasy.com/online/easynet/page/firstpage.aspx';

		$this->ch = curl_init();
		curl_setopt ($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($this->ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array( 'Expect:' ));
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/v1.4/site/presignon/index.asp');
        /*if($_SERVER['REMOTE_ADDR']=='127.0.0.1'){
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($this->ch, CURLOPT_PROXY, '127.0.0.1:8888');
        }*/
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, $this->scb->cookie);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.101 Safari/537.36');
        $temp=curl_exec($this->ch);
        ////////////////////////////////////////////////
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/v1.4/site/presignon/index.asp');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, ('LANG=T&LOGIN='.$this->scb->username.'&PASSWD='.$this->scb->password.'&lgin.x=24&lgin.y=21'));
        $temp = curl_exec($this->ch);
        if (preg_match('/error_signon.aspx/', $temp)) {
            // return false;
        }
        preg_match('/<INPUT TYPE="HIDDEN" NAME="SESSIONEASY" VALUE="(.*?)">/', $temp, $ml);
        $this->SESSIONEASY=$ml[1];

        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/firstpage.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, ('SESSIONEASY='.$this->SESSIONEASY));
        $temp=curl_exec($this->ch);


        preg_match('/inp_value = new Array\(\'(.*?)\'\);/', $temp, $ml);
        $this->SESSIONEASY=$ml[1];

        // echo $this->SESSIONEASY;
        // exit();

        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, $this->ref);
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, ('SESSIONEASY='.$this->SESSIONEASY));
        $html = curl_exec($this->ch);

        preg_match('/inp_value = new Array\(\'(.*?)\'\);/', $html, $ml);
        $this->SESSIONEASY=$ml[1];
        if (!preg_match('/'.$this->scb->account.'/', $html)) {
            die("Not found that account.");
        }



        
        preg_match('/View\$ctl(.*?)\$SaCa_LinkButton.*?'.$this->scb->account.'/', $html, $temp);
        $this->accid=$temp[1];
        $html2=str_replace(array("\r","\t","\n"), "", $html);
        preg_match('/'.$this->scb->account.'(.*?)<\/tr>/', $html2, $temp);
        preg_match('/[0-9,]{1,}\.[0-9]{2}/', $temp[1], $temp);
        $this->balance=$temp[0];
        $this->balance=floatval(preg_replace('/[^0-9\.\+\-]/','', $this->balance));
        $__EVENTTARGET='ctl00$DataProcess$SaCaGridView$ctl'.$this->accid.'$SaCaView_LinkButton';
        $__EVENTARGUMENT='';
        $__VIEWSTATE=$this->getFormData($html, "__VIEWSTATE");
        $__VIEWSTATEGENERATOR=$this->getFormData($html, "__VIEWSTATEGENERATOR");
        ////////////////////////////////////////////////
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,
        '__EVENTTARGET='.urlencode($__EVENTTARGET).
        '&__EVENTARGUMENT='.urlencode($__EVENTARGUMENT).
        '&__VIEWSTATE='.urlencode($__VIEWSTATE).
        '&SESSIONEASY='.$this->SESSIONEASY.
        '&__VIEWSTATEGENERATOR='.urlencode($__VIEWSTATEGENERATOR)
        );
        $temp=curl_exec($this->ch);
        preg_match('/<INPUT TYPE="HIDDEN" NAME="SESSIONEASY" VALUE="(.*?)">/', $temp, $ml);
        $this->SESSIONEASY=$ml[1];
        ////////////////////////////////////////////////
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, ('SESSIONEASY='.$this->SESSIONEASY));
        $html = curl_exec($this->ch);
        $__EVENTTARGET='ctl00$DataProcess$Link2';
        $__EVENTARGUMENT='';
        $__VIEWSTATE=$this->getFormData($html, "__VIEWSTATE");
        $__VIEWSTATEGENERATOR=$this->getFormData($html, "__VIEWSTATEGENERATOR");
        preg_match('/inp_value = new Array\(\'(.*?)\'\);/', $html, $ml);
        $this->SESSIONEASY=$ml[1];
        preg_match('/value="(.*?)".*?'.$this->scb->account.'/', $html, $temp);
        $DDLAcctNo=$temp[1];
        ////////////////////////////////////////////////
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS,
        '__EVENTTARGET='.urlencode($__EVENTTARGET).
        '&__EVENTARGUMENT='.urlencode($__EVENTARGUMENT).
        '&__VIEWSTATE='.urlencode($__VIEWSTATE).
        '&__LASTFOCUS='.
        '&'.urlencode('ctl00$DataProcess$DDLAcctNo').'='.urlencode($DDLAcctNo).
        '&SESSIONEASY='.$this->SESSIONEASY.
        '&__VIEWSTATEGENERATOR='.urlencode($__VIEWSTATEGENERATOR)
        );
        $temp=curl_exec($this->ch);
        preg_match('/<INPUT TYPE="HIDDEN" NAME="SESSIONEASY" VALUE="(.*?)">/', $temp, $ml);
        $this->SESSIONEASY=$ml[1];
        ////////////////////////////////////////////////
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, ('SESSIONEASY='.$this->SESSIONEASY));
        $html = iconv('TIS-620', 'UTF-8', curl_exec($this->ch));
				$__EVENTTARGET='ctl00$DataProcess$Link2';
        $__EVENTARGUMENT='';
        $__VIEWSTATE=$this->getFormData($html, "__VIEWSTATE");
        $__VIEWSTATEGENERATOR=$this->getFormData($html, "__VIEWSTATEGENERATOR");
        preg_match('/inp_value = new Array\(\'(.*?)\'\);/', $html, $ml);
        $this->SESSIONEASY=$ml[1];
        $html=str_replace(array("\r","\t","\n"), "", $html);
        preg_match('/<table cellspacing="0" id="DataProcess_GridView" style="width:100%;border-collapse:collapse;">(.*?)<\/table>/', $html, $temp);
        if (!isset($temp[1])) {
						$this->ref='https://www.scbeasy.com/online/easynet/page/err/err_post.aspx';
						curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/err/err_post.aspx');
		        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
		        curl_setopt($this->ch, CURLOPT_POST, 1);
		        curl_setopt($this->ch, CURLOPT_POSTFIELDS,
		        '__EVENTTARGET='.urlencode($__EVENTTARGET).
		        '&__EVENTARGUMENT='.urlencode($__EVENTARGUMENT).
		        '&__VIEWSTATE='.urlencode($__VIEWSTATE).
		        '&__LASTFOCUS='.
		        '&'.urlencode('ctl00$DataProcess$DDLAcctNo').'='.urlencode($DDLAcctNo).
		        '&SESSIONEASY='.$this->SESSIONEASY.
		        '&__VIEWSTATEGENERATOR='.urlencode($__VIEWSTATEGENERATOR)
		        );
		        $tempt=curl_exec($this->ch);
						preg_match('/inp_value = new Array\(\'(.*?)\'\);/', $html, $ml);
		        $this->SESSIONEASY=$ml[1];
						return array();
		        ////////////////////////////////////////////////
        }else{
					$this->ref='https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx';
					curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
					curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
					curl_setopt($this->ch, CURLOPT_POST, 1);
					curl_setopt($this->ch, CURLOPT_POSTFIELDS,
					'__EVENTTARGET='.urlencode($__EVENTTARGET).
					'&__EVENTARGUMENT='.urlencode($__EVENTARGUMENT).
					'&__VIEWSTATE='.urlencode($__VIEWSTATE).
					'&__LASTFOCUS='.
					'&'.urlencode('ctl00$DataProcess$DDLAcctNo').'='.urlencode($DDLAcctNo).
					'&SESSIONEASY='.$this->SESSIONEASY.
					'&__VIEWSTATEGENERATOR='.urlencode($__VIEWSTATEGENERATOR)
					);
					$tempt=curl_exec($this->ch);
					preg_match('/<INPUT TYPE="HIDDEN" NAME="SESSIONEASY" VALUE="(.*?)">/', $tempt, $ml);
					$this->SESSIONEASY=$ml[1];
					////////////////////////////////////////////////
				}
        preg_match_all('/<tr( style="background\-color:White;")?>.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?<\/tr>/', $temp[1], $temp);
        for ($i=0;$i<count($temp[0]);$i++) {
            $data[$i]['time']=strtotime(str_replace('/', '-', $temp[2][$i]).'T'.$temp[3][$i].':00+0700');
            $data[$i]['channel']=$temp[5][$i].' ('.$temp[4][$i].')';
            $data[$i]['detail']=$temp[8][$i];
			$data[$i]['value'] = preg_replace('/[^0-9\.\+\-]/','',($temp[6][$i]=='&nbsp;')?$temp[7][$i]:$temp[6][$i]);
            $data[$i]['tx_hash'] = ($data[$i]['time'] . $data[$i]['value'] . $data[$i]['channel'] . $data[$i]['detail']);
            $data[$i]['tx_hash'] = md5($data[$i]['tx_hash']);
			preg_match('/X[0-9]{6}/',$data[$i]['detail'],$tempacc);
			$data[$i]['acc_num']=str_replace('X','****',@$tempacc[0]);
        }

        

        $time_end = microtime(true);
		$execution_time = ($time_end - $time_start)/60;
		echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	}

	private function xml2array($xmlObject)
    {
        $out = json_decode(json_encode((array) $xmlObject), true);
        return $out;
    }



	private function notify($message)
	{
		define('LINE_API',"https://notify-api.line.me/api/notify");
 
		$token = $this->line_token;

		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData,'','&');
		$headerOptions = array( 
			        'http'=>array(
			           'method'=>'POST',
			           'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
			                      ."Authorization: Bearer ".$token."\r\n"
			                      ."Content-Length: ".strlen($queryData)."\r\n",
			            'content' => $queryData
			         ),
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents(LINE_API,FALSE,$context);
	}

	private function DecodeMP3($filedata)
    {
		$identity=json_decode(	'{"2":"e057e9a897cacb1596205118e2ba9b8d","3":"cf3d460f2f16b6f6c56b65141b3827d1","4":"7760c9eb71e5f5729bc9c51a0288b1e9","5":"3ff6cbb8c2a8036e92f8368d93a00315","7":"91df6e89d5f946381053650754d79d64","8":"16a73e1a176c1b82fbcf5477ce3729a9","c":"5fee818964b452e31ea4d67f483c7aa8","d":"ba1678ad48d1ad3400e7ac4a0137a164","e":"6004c643fec157c8d4438fe1f48f65e1","f":"85996b22fa5c6886f9d21a11c477a9e2","g":"e970e2577c100a5c8ccd93ee228910ef","h":"89e6c72a1b90c198a7937fea796684e8","k":"367ddfb729c291061093f79128b03fc1","m":"cb8afdd2e8e75be262952e8464e1cb58","n":"4a4a7862266f34b2d5a7e64b8a3ed2d1","p":"3d43199d035125b6488fea96a530c739","r":"ee87cee7e2d7d97d2773f8f81e0f0c69","w":"9aa06e6e93ee5fc28c166937521de595","x":"7d890a76bacdb9f3bac537b97c726343","y":"08065cbea0392e3ee1d589989f48bc49"}'	,true);
		$nulltext="";
		for($i=1;$i<=346;$i++){
			$nulltext.="\0";
		}
		$mp3split=explode($nulltext,$filedata);
		if(count($mp3split)===7){
			$captcha="";
			foreach($mp3split as $key => $val){
				if($key!=6&&(array_search(md5($val),$identity)===FALSE))
				{
					return('ERROR2');
				}else{
					$captcha.=array_search(md5($val),$identity);
				}
			}
			return($captcha);
		}
		return('ERROR3');

    }

    private function getFormData($html, $key)
    {
        preg_match('/<input.*?name="'.$key.'".*?id="'.$key.'".*?value="(.*?)".*?>/', $html, $ml);
        return $ml[1];
    }


	protected function clean($text)
	{
		$text = trim($text);
		$text = str_replace("&nbsp;", "", $text);
		return $text;
	}

	protected function scb_bank_type_rename($str_bnk)
	{
	    if (!get_magic_quotes_gpc()) {
	        $str_bnk = addslashes($str_bnk);
	    }
	    $str_bnk = str_replace("SCB", "014", $str_bnk);
	    $str_bnk = str_replace("BBL", "002", $str_bnk);
	    $str_bnk = str_replace("KBANK", "004", $str_bnk);
	    $str_bnk = str_replace("KTB", "006", $str_bnk);
	    $str_bnk = str_replace("BAAC", "034", $str_bnk);
	    $str_bnk = str_replace("TMB", "011", $str_bnk);
	    $str_bnk = str_replace("SCIB", "022", $str_bnk);
	    $str_bnk = str_replace("UOB", "024", $str_bnk);
	    $str_bnk = str_replace("BAY", "025", $str_bnk);
	    $str_bnk = str_replace("GSB", "030", $str_bnk);
	    $str_bnk = str_replace("LHBANK", "073", $str_bnk);
	    $str_bnk = str_replace("TBANK", "065", $str_bnk);
	    $str_bnk = str_replace("TISCO", "067", $str_bnk);
	    $str_bnk = str_replace("KK", "069", $str_bnk);
	    $str_bnk = str_replace("CIMB", "022", $str_bnk);

	    $allow_bank = array('014','002','004','006','034','011','022','024','025','030','073','065','067','069');

	    if (!in_array($str_bnk, $allow_bank)) {
	    	return "000";
	    	exit();
		}

	    return $str_bnk;
	}

	protected function bay_bank_type_rename($transection_str)
	{
		$bank_type = mb_substr($transection_str, 2, 2);
		$bank_account = mb_substr($transection_str, 2, 10);

		switch ($bank_type) {
			case '25':
				$bank_name = '025';
				break;
			case '02':
				$bank_name = '002';
				break;
			case '06':
				$bank_name = '006';
				break;
			case '04':
				$bank_name = '004';
				break;
			case '69':
				$bank_name = '069';
				break;
			case '17':
				$bank_name = '017';
				break;
			case '22':
				$bank_name = '022';
				break;
			case '18':
				$bank_name = '018';
				break;
			case '11':
				$bank_name = '011';
				break;
			case '67':
				$bank_name = '067';
				break;
			case '71':
				$bank_name = '071';
				break;
			case '14':
				$bank_name = '014';
				break;
			case '65':
				$bank_name = '065';
				break;
			case '34':
				$bank_name = '034';
				break;
			case '39':
				$bank_name = '039';
				break;
			case '24':
				$bank_name = '024';
				break;
			case '73':
				$bank_name = '073';
				break;
			case '20':
				$bank_name = '020';
				break;
			case '30':
				$bank_name = '030';
				break;
			case '33':
				$bank_name = '033';
				break;
			case '70':
				$bank_name = '070';
				break;
			case '31':
				$bank_name = '031';
				break;
			
			default:	
				$bank_name = '025';
				break;
		}

		return $bank_name;
	}

}

/* End of file Bank.php */
/* Location: ./application/controllers/auto/Bank.php */