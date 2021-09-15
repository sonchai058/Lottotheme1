<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Notify extends CI_Controller {

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


		$this->line_token = 'BPpR6ernoVfi0GH21wV6wuaHw7KZhTAiJw10xh4xzkO';

		$this->db_back = $this->load->database('db_back', TRUE);
	}

	public function trn_scb()
	{
		ini_set('max_execution_time', 0);

		$response = array();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
		curl_setopt($ch, CURLOPT_CAINFO, FCPATH . "cert/cacert.pem");
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->scb->cookie);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->scb->cookie);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);

		$headers = array();
		$headers[] = 'Cache-Control: no-cache';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$acc_id = 0;

		$form_field = array();
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

		$form_field = array();
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
		    $s = substr($this->scb->account, 4);
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
		$form_field = array();

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
		$form_field = array();
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

		$dom = new domDocument;
		$web_data = mb_convert_encoding($data, "UTF-8");
		$dom->loadHTML($data);
		$tables = $dom->getElementById('Data');
		$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);
		file_put_contents(FCPATH.'bankjson/scb_current',json_encode(array('current_balance' => $tb_arr[22],'updatetime' => time())));
		// curl_close($ch);
		
		#f1 form redirect
		$html = str_get_html($data);
		$form_field = array();
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

		$list = array();

		foreach ($rows as $row) {
		    $cols = $row->getElementsByTagName('td');
		    if ($cols->item(1)->nodeValue != '' and $cols->item(0)->nodeValue != '???') {
		        $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
		        $list['out'] = (float) str_replace(array(',','-'), '', $this->clean($cols->item(4)->nodeValue));
		        $list_arr[] = $list;
		    }
		}

		$b_date = new DateTime(date('Y-m-d').' 23:00:00');
		$b_date->modify('-1 day');


		$total_sum_db = $this->db_back->query("SELECT SUM(amount) AS 'total_deposit_db' FROM tb_scb_transection WHERE UNIX_TIMESTAMP(trans_in_datetime) >= UNIX_TIMESTAMP('".$b_date->format('Y-m-d H:i:s')."') AND acc_id = 1")->row()->total_deposit_db;

		array_pop($list_arr);
		$sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($list_arr as $r) {
			$sum['in'] += $r['in'];
			$sum['out'] += $r['out'];
		}

		$response['account_name'] = 'SCB ตาริ';
		$response['total_deposit'] = $sum['in'];
		$response['total_withdraw'] = $sum['out'];
		$response['total_deposit_db'] = $total_sum_db;
		return $response;
	}

	public function trn_scb_secound()
	{
		ini_set('max_execution_time', 0);

		$response = array();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
		curl_setopt($ch, CURLOPT_CAINFO, FCPATH . "cert/cacert.pem");
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->scb2->cookie);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->scb2->cookie);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);

		$headers = array();
		$headers[] = 'Cache-Control: no-cache';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$acc_id = 0;

		$form_field = array();
		$form_field['LOGIN'] = $this->scb2->username;
		$form_field['PASSWD'] = $this->scb2->password;
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

		$form_field = array();
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
		    $s = substr($this->scb2->account, 4);
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
		$form_field = array();

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
		$form_field = array();
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

		$dom = new domDocument;
		$web_data = mb_convert_encoding($data, "UTF-8");
		$dom->loadHTML($data);
		$tables = $dom->getElementById('Data');
		$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);
		file_put_contents(FCPATH.'bankjson/scb_current_2',json_encode(array('current_balance' => $tb_arr[22],'updatetime' => time())));
		// curl_close($ch);
		
		#f1 form redirect
		$html = str_get_html($data);
		$form_field = array();
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

		$list = array();

		foreach ($rows as $row) {
		    $cols = $row->getElementsByTagName('td');
		    if ($cols->item(1)->nodeValue != '' and $cols->item(0)->nodeValue != '???') {
		        $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
		        $list['out'] = (float) str_replace(array(',','-'), '', $this->clean($cols->item(4)->nodeValue));
		        $list_arr[] = $list;
		    }
		}

		$b_date = new DateTime(date('Y-m-d').' 23:00:00');
		$b_date->modify('-1 day');


		$total_sum_db = $this->db_back->query("SELECT SUM(amount) AS 'total_deposit_db' FROM tb_scb_transection WHERE UNIX_TIMESTAMP(trans_in_datetime) >= UNIX_TIMESTAMP('".$b_date->format('Y-m-d H:i:s')."') AND acc_id = 2")->row()->total_deposit_db;

		array_pop($list_arr);
		$sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($list_arr as $r) {
			$sum['in'] += $r['in'];
			$sum['out'] += $r['out'];
		}

		$response['account_name'] = 'SCB ลัดดาวัลย์';
		$response['total_deposit'] = $sum['in'];
		$response['total_withdraw'] = $sum['out'];
		$response['total_deposit_db'] = $total_sum_db;
		return $response;

	}

	public function trn_bay()
	{

		ini_set('max_execution_time', 0);
		$response = array();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
		curl_setopt($ch, CURLOPT_CAINFO, FCPATH . 'cert/cacert.pem');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->bay->cookie);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->bay->cookie);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);


		curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Common/Login.aspx');
		$data = curl_exec($ch);
		$html = str_get_html($data);

		$form_field = array();
		foreach ($html->find('form input') as $element) {
		    $form_field[$element->name] = $element->value;
		}

		$form_field['__EVENTTARGET'] = 'ctl00$cphForLogin$lbtnLoginNew';
		$form_field['password'] = '';
		$form_field['ctl00$cphForLogin$username'] = $this->bay->username;
		$form_field['ctl00$cphForLogin$hdPassword'] = $this->bay->password;
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

		$dom = new domDocument;
		$web_data = mb_convert_encoding($data, "UTF-8");
		// libxml_use_internal_errors(true);
		$dom->loadHTML($data);
		$tables = $dom->getElementById('ctl00_pnlMenuTopBar');
		$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);
		file_put_contents(FCPATH.'bankjson/bay_current',json_encode(array('current_balance' => '+'.$tb_arr[123],'updatetime' => time())));

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

		$prv_stamp = file_get_contents(FCPATH.'bankstamp/bay.json');
		$arr_prv = json_decode($prv_stamp);

		foreach ($html->find("table.deposit_accsum_table") as $table) {
			foreach($table->find('tr') as $row){
				if($row->parent->tag == 'tbody') {
				    $rowData = array();

				    foreach($row->find('td') as $cell){
				        $rowData[] = $cell->innertext;
				    }

				    $transection_data = array(
				    			  'out' => (float)str_replace(',','',$this->clean($rowData[2])),
				    			  'in' => (float)str_replace(',','',$this->clean($rowData[3])));
				   	$transection_arr[] = $transection_data;
			    }
			}
		}

		$total_sum_db = $this->db_back->query("SELECT SUM(amount) AS 'total_deposit_db' FROM tb_bay_transection WHERE UNIX_TIMESTAMP(trans_in_datetime) >= UNIX_TIMESTAMP('".date('Y-m-d')." 00:00:00')")->row()->total_deposit_db;

		$sum['in'] = 0;
		$sum['out'] = 0;
		foreach ($transection_arr as $r) {
			$sum['in'] += $r['in'];
			$sum['out'] += $r['out'];
		}

		$response['account_name'] = 'BAY ตาริ';
		$response['total_deposit'] = $sum['in'];
		$response['total_withdraw'] = $sum['out'];
		$response['total_deposit_db'] = $total_sum_db;
		return $response;

	}

	public function get()
	{

		ini_set('max_execution_time', 0);
		$data[0] = $this->trn_scb();
		$data[1] = $this->trn_scb_secound();
		$data[2] = $this->trn_bay();

		$message = 'ประจำวันที่ '.date('d/m/Y H:i:s');
		$this->notify($message);
		// echo $message;

		$message = '';
		$sum_deposit = 0;
		$sum_deposit_db = 0;
		$sum_withdraw = 0;
		foreach ($data as $r) {
			$sum_deposit += (float)$r['total_deposit'];
			$sum_deposit_db += (float)$r['total_deposit_db'];
			$sum_withdraw += (float)$r['total_withdraw'];
			$message .= "\nบัญชี : ".$r['account_name']."\nยอดฝากทั้งหมด : ".number_format($r['total_deposit'],2)."\nยอดฝากในระบบ : ".number_format($r['total_deposit_db'],2)."\nยอดโอนออกทั้งหมด : ".number_format($r['total_withdraw'],2)."\n--------------------";
		}

		$message .= "\nรวมยอดฝากทั้งหมด : ".number_format($sum_deposit,2)."\nรวมยอดฝากในระบบทั้งหมด : ".number_format($sum_deposit_db,2)."\nรวมยอดโอนออกทั้งหมด : ".number_format($sum_withdraw,2)."\n--------------------";

		// echo $message;

		$this->notify($message);
	}

	// public function convtime()
	// {
	// 	$date = new DateTime(date('Y-m-d H:i').':00');
	// 	$date->modify('-1 day');
	// 	echo $date->format('Y-m-d H:i:s');
	// }


	// public function scb()
	// {
	// 	if(webSetting('scb_deposit') === 'false')
	// 	{
	// 		echo "SCB is Under Construction";
	// 		exit();
	// 	}

	// 	$response = array();
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	// 	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	// 	curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
	// 	curl_setopt($ch, CURLOPT_CAINFO, FCPATH . "cert/cacert.pem");
	// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	// 	curl_setopt($ch, CURLOPT_COOKIEJAR, $this->scb->cookie);
	// 	curl_setopt($ch, CURLOPT_COOKIEFILE, $this->scb->cookie);
	// 	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 	curl_setopt($ch, CURLOPT_TIMEOUT, 120);

	// 	$headers = array();
	// 	$headers[] = 'Cache-Control: no-cache';
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	// 	$acc_id = 0;

	// 	$form_field = array();
	// 	$form_field['LOGIN'] = $this->scb->username;
	// 	$form_field['PASSWD'] = $this->scb->password;
	// 	$form_field['LANG'] = 'T';
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	// login
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);
	// 	$html = str_get_html($data);
	// 	$SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;

	// 	$form_field = array();
	// 	$form_field['SESSIONEASY'] = $SESSIONEASY;
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	// get AccBal ID
	// 	$html = str_get_html($data);
	// 	foreach ($html->find('a[id*="DataProcess_SaCaGridView_SaCa_LinkButton_"]') as $a) {
	// 	    $text = $a->outertext;
	// 	    $s = substr($this->scb->account, 4);
	// 	    $pos = strpos($text, $s);
	// 	    if ($pos !== false) {
	// 	        $href = htmlspecialchars_decode($a->href, ENT_QUOTES);
	// 	        $href = str_replace("javascript:__doPostBack('", '', $href);
	// 	        $href = str_replace("','')", '', $href);
	// 	        $acc_href = $href;
	// 	        break;
	// 	    }
	// 	}
	
	// 	$html = str_get_html($data);
	// 	$form_field = array();

	// 	foreach ($html->find('form input') as $element) {
	// 	    $form_field[$element->name] = $element->value;
	// 	}

	// 	$form_field['__EVENTTARGET'] = $acc_href;
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}

	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	// Get Current Balance
	// 	$html = str_get_html($data);
	// 	$form_field = array();
	// 	foreach ($html->find('form input') as $element) {
	// 	    $form_field[$element->name] = $element->value;
	// 	}
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	$dom = new domDocument;
	// 	$web_data = mb_convert_encoding($data, "UTF-8");
	// 	$dom->loadHTML($data);
	// 	$tables = $dom->getElementById('Data');
	// 	$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);
	// 	file_put_contents(FCPATH.'bankjson/scb_current',json_encode(array('current_balance' => $tb_arr[22],'updatetime' => time())));
	// 	// curl_close($ch);
		
	// 	#f1 form redirect
	// 	$html = str_get_html($data);
	// 	$form_field = array();
	// 	foreach ($html->find('form input') as $element) {
	// 	    $form_field[$element->name] = $element->value;
	// 	}
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	$dom = new domDocument;
	// 	$web_data = mb_convert_encoding($data, "UTF-8");
	// 	$dom->loadHTML($data);

	// 	$tables = $dom->getElementById('DataProcess_GridView');

	// 	// echo $tables;

	// 	if(!empty($tables)){
	// 	    $rows = $tables->getElementsByTagName('tr');
	// 	}

	// 	$list = array();

	// 	$prv_stamp = file_get_contents(FCPATH.'bankjson/scb.json');
	// 	$arr_prv = json_decode($prv_stamp);

	// 	foreach ($rows as $row) {
	// 	    $cols = $row->getElementsByTagName('td');
	// 	    $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
	// 	    if ($cols->item(1)->nodeValue != '' and $cols->item(0)->nodeValue != '???' and $list['in'] != '') {
	// 	        $list['date'] = $this->clean($cols->item(0)->nodeValue);
	// 	        $list['time'] = $this->clean($cols->item(1)->nodeValue);
	// 	        $list['type'] = $this->clean($cols->item(3)->nodeValue);
	// 	        $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
	// 	        $list['info'] = $this->clean($cols->item(6)->nodeValue);
	// 	        preg_match('/x([^"])*\d{4}/', $list['info'], $list['bank']);
	// 	        $list['bank_type'] = array('SCB');
	// 	        $list['bank'] = str_replace('x', '', $list['bank']);

	// 	        if (!$list['bank']) {
	// 	            preg_match('/X([^"]*)/', $list['info'], $list['bank']);
	// 	            preg_match('/\((.*)\)/', $list['info'], $list['bank_type']);
	// 	        }

	// 	        if (count($list['bank']) > 1) {
	// 	            array_shift($list['bank']);
	// 	        }
	// 	        if (count($list['bank_type']) > 1) {
	// 	            array_shift($list['bank_type']);
	// 	        }
		        
	// 	        $list['bank'] = $list['bank'][0];
	// 	        $list['bank_type'] = $list['bank_type'][0];

	// 	        $list['bank_type'] = $this->scb_bank_type_rename($list['bank_type']);
	// 	        $date = explode("/", $list['date']);
	// 	        $list_c['date'] = $date[2] . '-' . $date[1] . '-' . $date[0];
	// 	        $list['in'] = bcadd($list['in'], 0, 2);


	// 	        $conv_datetime = $date[2].'-'.$date[1].'-'.$date[0]." ".$list['time'].":00";
	// 	        $clean_time = str_replace(':','',$list['time']);

	// 	        // Create Transection ID
	// 	        $list['transection_id'] = md5($list['type'].$list['bank_type'].$list['bank'].$date[2].$date[1].$date[0].$clean_time.substr($list['in'],0,-3));

	// 	        // Create Timestamp
	// 	        $trn_timestamp = strtotime($conv_datetime);
	// 	        $trn_hrs = date('H', $trn_timestamp);
	// 	        if($trn_hrs == 23)
	// 	        {
	// 	        	$list['trn_in'] = date('Y-m-d H:i:s',(strtotime('-1 day',strtotime($conv_datetime))));
	// 	        }
	// 	        else
	// 	        {
	// 	        	$list['trn_in'] = $conv_datetime;
	// 	        }

	// 	        //Check Transection of today Only

	// 	        $today_date = date('d/m/Y');
	// 	        $tmr_date = date('d/m/Y',strtotime(date('d-m-Y')."+1 days"));

	// 	        if($list['date'] == $today_date || $list['date'] == $tmr_date)
	// 	        {
	// 	            $list_arr[] = (object)$list;
	// 	        }
	// 	    }
	// 	}

	// 	foreach ($list_arr as $row) {

	// 		if($this->topupmd->check_scb_exist_trn($row->transection_id) === true)
	// 		{
	// 			array_push($list_arr,$row);
	// 			file_put_contents(FCPATH.'bankjson/scb.json',json_encode($list_arr));

	// 			// print_r($row);

	// 			$prefix_name = array('นาย','นาง','นางสาว');
	// 			$info_trn = explode(' ',$row->info);

	// 			$name = $info_trn[4];
	// 			if(in_array($name,$prefix_name))
	// 			{
	// 				$name = $info_trn[5];
	// 			}

	// 			$member_id = $this->identical_member($row->bank,$row->bank_type,$name);

	// 			if($member_id)
	// 			{
	// 				$trn_arr = array('transection_no' => $row->transection_id,
	// 							 'trans_in_datetime' => $row->trn_in,
	// 							 'amount' => $row->in,
	// 							 'bank_id' => $row->bank_type,
	// 							 'bank_number' => $row->bank,
	// 							 'name' => $name,
	// 							 'retrive_datetime' => date('Y-m-d H:i:s'),
	// 							 'member_id' => $member_id,
	// 							 'topup_status' => 1,
	// 							 'acc_id' => 1);
	// 			}
	// 			else
	// 			{
	// 				$trn_arr = array('transection_no' => $row->transection_id,
	// 							 'trans_in_datetime' => $row->trn_in,
	// 							 'amount' => $row->in,
	// 							 'bank_id' => $row->bank_type,
	// 							 'bank_number' => $row->bank,
	// 							 'name' => $name,
	// 							 'retrive_datetime' => date('Y-m-d H:i:s'),
	// 							 'member_id' => 0,
	// 							 'topup_status' => 3,
	// 							 'acc_id' => 1);
					
	// 				$unf_trn_arr = array('transection_no' => $trn_arr['transection_no'],
	// 							 'trans_in_datetime' => $trn_arr['trans_in_datetime'],
	// 							 'amount' => $trn_arr['amount'],
	// 						 	 'bank_id' => $trn_arr['bank_id'],
	// 							 'bank_number' => $trn_arr['bank_number'],
	// 							 'name' => $trn_arr['name'],
	// 							 'retrive_datetime' => $trn_arr['retrive_datetime'],
	// 							 'trans_in_bank' => 'SCB');
	// 				$this->topupmd->put_unconfirm_transection($unf_trn_arr);
	// 			}

	// 			$this->topupmd->put_scb_transection($trn_arr);


	// 			$now = strtotime(date('Y-m-d'));
	// 			$trn_date = strtotime(date('Y-m-d', strtotime(date($trn_arr['trans_in_datetime']))));

	// 			if($trn_date > $now)
	// 			{
	// 				$trans_in_datetime_n = strtotime('-1 day',strtotime($trn_arr['trans_in_datetime']));
	// 				$trans_in_datetime_n = date('Y-m-d H:i:s',$trans_in_datetime_n);
					
	// 				$ins_log = array('member_id' => $member_id,
	// 								 'previous_balance' => $this->getUserBalance($member_id),
	// 								 'amount' => $trn_arr['amount'],
	// 								 'datetime' => $trans_in_datetime_n,
	// 								 'status' => '1',
	// 								 'channel' => 'SCB',
	// 								 'transection_no' => $trn_arr['transection_no']);
	// 				$this->topupmd->insert_deposit_logs($ins_log);
	// 			}
	// 			else
	// 			{

	// 				$ins_log = array('member_id' => $member_id,
	// 								 'previous_balance' => $this->getUserBalance($member_id),
	// 								 'amount' => $trn_arr['amount'],
	// 								 'datetime' => $trn_arr['trans_in_datetime'],
	// 								 'status' => '1',
	// 								 'channel' => 'SCB',
	// 								 'transection_no' => $trn_arr['transection_no']);
	// 				$this->topupmd->insert_deposit_logs($ins_log);

	// 			}
	// 		}
	// 	}
	// }

	// public function scb_secound()
	// {
	// 	if(webSetting('scb_deposit') === 'false')
	// 	{
	// 		echo "SCB is Under Construction";
	// 		exit();
	// 	}

	// 	$response = array();
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	// 	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	// 	curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
	// 	curl_setopt($ch, CURLOPT_CAINFO, FCPATH . "cert/cacert.pem");
	// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	// 	curl_setopt($ch, CURLOPT_COOKIEJAR, $this->scb2->cookie);
	// 	curl_setopt($ch, CURLOPT_COOKIEFILE, $this->scb2->cookie);
	// 	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 	curl_setopt($ch, CURLOPT_TIMEOUT, 120);

	// 	$headers = array();
	// 	$headers[] = 'Cache-Control: no-cache';
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	// 	$acc_id = 0;

	// 	$form_field = array();
	// 	$form_field['LOGIN'] = $this->scb2->username;
	// 	$form_field['PASSWD'] = $this->scb2->password;
	// 	$form_field['LANG'] = 'T';
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	// login
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);
	// 	$html = str_get_html($data);
	// 	$SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;

	// 	$form_field = array();
	// 	$form_field['SESSIONEASY'] = $SESSIONEASY;
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	// get AccBal ID
	// 	$html = str_get_html($data);
	// 	foreach ($html->find('a[id*="DataProcess_SaCaGridView_SaCa_LinkButton_"]') as $a) {
	// 	    $text = $a->outertext;
	// 	    $s = substr($this->scb->account, 4);
	// 	    $pos = strpos($text, $s);
	// 	    if ($pos !== false) {
	// 	        $href = htmlspecialchars_decode($a->href, ENT_QUOTES);
	// 	        $href = str_replace("javascript:__doPostBack('", '', $href);
	// 	        $href = str_replace("','')", '', $href);
	// 	        $acc_href = $href;
	// 	        break;
	// 	    }
	// 	}
	
	// 	$html = str_get_html($data);
	// 	$form_field = array();

	// 	foreach ($html->find('form input') as $element) {
	// 	    $form_field[$element->name] = $element->value;
	// 	}

	// 	$form_field['__EVENTTARGET'] = $acc_href;
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}

	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	// Get Current Balance
	// 	$html = str_get_html($data);
	// 	$form_field = array();
	// 	foreach ($html->find('form input') as $element) {
	// 	    $form_field[$element->name] = $element->value;
	// 	}
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_bln.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	$dom = new domDocument;
	// 	$web_data = mb_convert_encoding($data, "UTF-8");
	// 	$dom->loadHTML($data);
	// 	$tables = $dom->getElementById('Data');
	// 	$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);
	// 	file_put_contents(FCPATH.'bankjson/scb_current_2',json_encode(array('current_balance' => $tb_arr[22],'updatetime' => time())));
	// 	// curl_close($ch);
		
	// 	#f1 form redirect
	// 	$html = str_get_html($data);
	// 	$form_field = array();
	// 	foreach ($html->find('form input') as $element) {
	// 	    $form_field[$element->name] = $element->value;
	// 	}
	// 	$post_string = '';
	// 	foreach ($form_field as $key => $value) {
	// 	    $post_string .= $key . '=' . urlencode($value) . '&';
	// 	}
	// 	$post_string = substr($post_string, 0, -1);
	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	$data = curl_exec($ch);

	// 	$dom = new domDocument;
	// 	$web_data = mb_convert_encoding($data, "UTF-8");
	// 	$dom->loadHTML($data);

	// 	$tables = $dom->getElementById('DataProcess_GridView');

	// 	if(!empty($tables)){
	// 	    $rows = $tables->getElementsByTagName('tr');
	// 	}

	// 	$list = array();

	// 	$prv_stamp = file_get_contents(FCPATH.'bankjson/scb2.json');
	// 	$arr_prv = json_decode($prv_stamp);

	// 	foreach ($rows as $row) {

	// 	    $cols = $row->getElementsByTagName('td');

	// 	    $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
	// 	    if ($cols->item(1)->nodeValue != '' and $cols->item(0)->nodeValue != '???' and $list['in'] != '') {

	// 	        $list['date'] = $this->clean($cols->item(0)->nodeValue);
	// 	        $list['time'] = $this->clean($cols->item(1)->nodeValue);
	// 	        $list['type'] = $this->clean($cols->item(3)->nodeValue);
	// 	        $list['in'] = (float) str_replace(',', '', $this->clean($cols->item(5)->nodeValue));
	// 	        $list['info'] = $this->clean($cols->item(6)->nodeValue);
	// 	        preg_match('/x([^"])*\d{4}/', $list['info'], $list['bank']);
	// 	        $list['bank_type'] = array('SCB');
	// 	        $list['bank'] = str_replace('x', '', $list['bank']);

	// 	        if (!$list['bank']) {
	// 	            preg_match('/X([^"]*)/', $list['info'], $list['bank']);
	// 	            preg_match('/\((.*)\)/', $list['info'], $list['bank_type']);
	// 	        }

	// 	        if (count($list['bank']) > 1) {
	// 	            array_shift($list['bank']);
	// 	        }
	// 	        if (count($list['bank_type']) > 1) {
	// 	            array_shift($list['bank_type']);
	// 	        }
		        
	// 	        $list['bank'] = $list['bank'][0];
	// 	        $list['bank_type'] = $list['bank_type'][0];

	// 	        $list['bank_type'] = $this->scb_bank_type_rename($list['bank_type']);
	// 	        $date = explode("/", $list['date']);
	// 	        $list_c['date'] = $date[2] . '-' . $date[1] . '-' . $date[0];
	// 	        $list['in'] = bcadd($list['in'], 0, 2);


	// 	        $conv_datetime = $date[2].'-'.$date[1].'-'.$date[0]." ".$list['time'].":00";
	// 	        $clean_time = str_replace(':','',$list['time']);

	// 	        // Create Transection ID
	// 	        $list['transection_id'] = md5($list['type'].$list['bank_type'].$list['bank'].$date[2].$date[1].$date[0].$clean_time.substr($list['in'],0,-3));

	// 	        // Create Timestamp
	// 	        $trn_timestamp = strtotime($conv_datetime);
	// 	        $trn_hrs = date('H', $trn_timestamp);
	// 	        if($trn_hrs == 23)
	// 	        {
	// 	        	$list['trn_in'] = date('Y-m-d H:i:s',(strtotime('-1 day',strtotime($conv_datetime))));
	// 	        }
	// 	        else
	// 	        {
	// 	        	$list['trn_in'] = $conv_datetime;
	// 	        }

	// 	        //Check Transection of today Only

	// 	        $today_date = date('d/m/Y');
	// 	        $tmr_date = date('d/m/Y',strtotime(date('d-m-Y')."+1 days"));

	// 	        if($list['date'] == $today_date || $list['date'] == $tmr_date)
	// 	        {
	// 	            $list_arr[] = (object)$list;
	// 	        }
	// 	    }
	// 	}

	// 	foreach ($list_arr as $row) {

	// 		if($this->topupmd->check_scb_exist_trn($row->transection_id) === true)
	// 		{
	// 			array_push($list_arr,$row);
	// 			file_put_contents(FCPATH.'bankjson/scb2.json',json_encode($list_arr));

	// 			// print_r($row);

	// 			$prefix_name = array('นาย','นาง','นางสาว');
	// 			$info_trn = explode(' ',$row->info);

	// 			$name = $info_trn[4];
	// 			if(in_array($name,$prefix_name))
	// 			{
	// 				$name = $info_trn[5];
	// 			}

	// 			$member_id = $this->identical_member($row->bank,$row->bank_type,$name);

	// 			if($member_id)
	// 			{
	// 				$trn_arr = array('transection_no' => $row->transection_id,
	// 							 'trans_in_datetime' => $row->trn_in,
	// 							 'amount' => $row->in,
	// 							 'bank_id' => $row->bank_type,
	// 							 'bank_number' => $row->bank,
	// 							 'name' => $name,
	// 							 'retrive_datetime' => date('Y-m-d H:i:s'),
	// 							 'member_id' => $member_id,
	// 							 'topup_status' => 1,
	// 							 'acc_id' => 2);
	// 			}
	// 			else
	// 			{
	// 				$trn_arr = array('transection_no' => $row->transection_id,
	// 							 'trans_in_datetime' => $row->trn_in,
	// 							 'amount' => $row->in,
	// 							 'bank_id' => $row->bank_type,
	// 							 'bank_number' => $row->bank,
	// 							 'name' => $name,
	// 							 'retrive_datetime' => date('Y-m-d H:i:s'),
	// 							 'member_id' => 0,
	// 							 'topup_status' => 3,
	// 							 'acc_id' => 2);
					
	// 				$unf_trn_arr = array('transection_no' => $trn_arr['transection_no'],
	// 							 'trans_in_datetime' => $trn_arr['trans_in_datetime'],
	// 							 'amount' => $trn_arr['amount'],
	// 						 	 'bank_id' => $trn_arr['bank_id'],
	// 							 'bank_number' => $trn_arr['bank_number'],
	// 							 'name' => $trn_arr['name'],
	// 							 'retrive_datetime' => $trn_arr['retrive_datetime'],
	// 							 'trans_in_bank' => 'SCB');
	// 				$this->topupmd->put_unconfirm_transection($unf_trn_arr);
	// 			}

	// 			$this->topupmd->put_scb_transection($trn_arr);


	// 			$now = strtotime(date('Y-m-d'));
	// 			$trn_date = strtotime(date('Y-m-d', strtotime(date($trn_arr['trans_in_datetime']))));

	// 			if($trn_date > $now)
	// 			{
	// 				$trans_in_datetime_n = strtotime('-1 day',strtotime($trn_arr['trans_in_datetime']));
	// 				$trans_in_datetime_n = date('Y-m-d H:i:s',$trans_in_datetime_n);
					
	// 				$ins_log = array('member_id' => $member_id,
	// 								 'previous_balance' => $this->getUserBalance($member_id),
	// 								 'amount' => $trn_arr['amount'],
	// 								 'datetime' => $trans_in_datetime_n,
	// 								 'status' => '1',
	// 								 'channel' => 'SCB',
	// 								 'transection_no' => $trn_arr['transection_no']);
	// 				$this->topupmd->insert_deposit_logs($ins_log);
	// 			}
	// 			else
	// 			{

	// 				$ins_log = array('member_id' => $member_id,
	// 								 'previous_balance' => $this->getUserBalance($member_id),
	// 								 'amount' => $trn_arr['amount'],
	// 								 'datetime' => $trn_arr['trans_in_datetime'],
	// 								 'status' => '1',
	// 								 'channel' => 'SCB',
	// 								 'transection_no' => $trn_arr['transection_no']);
	// 				$this->topupmd->insert_deposit_logs($ins_log);

	// 			}
	// 		}
	// 	}
	// }

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


	public function maintenance()
	{
		$this->load->model('process/Maintenance_model');

		$this->Maintenance_model->clear_temp_trn();
	}

	protected function find_exist_scb_trn($prv_arr, $val)
	{
	   foreach($prv_arr as $key => $trn)
	   {
	      if ($trn->transection_id === $val)
	         return true;
	   }
	   return false;
	}

	protected function find_exist_bay_trn($prv_arr, $val)
	{
	   foreach($prv_arr as $key => $trn)
	   {
	      if ($trn->transection_no === $val)
	         return true;
	   }
	   return false;
	}

	protected function find_exist_kbank_trn($prv_arr, $val)
	{
	   foreach($prv_arr as $key => $trn)
	   {
	      if ($trn->transection_no === $val)
	         return true;
	   }
	   return false;
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

		// switch ($bank_type) {
		// 	case '25':
		// 		$bank_name = '025';
		// 		break;
		// 	case '02':
		// 		$bank_name = '002';
		// 		break;
		// 	case '06':
		// 		$bank_name = '006';
		// 		break;
		// 	case '04':
		// 		$bank_name = '004';
		// 		break;
		// 	case '69':
		// 		$bank_name = '069';
		// 		break;
		// 	case '17':
		// 		$bank_name = '017';
		// 		break;
		// 	case '22':
		// 		$bank_name = '022';
		// 		break;
		// 	case '18':
		// 		$bank_name = '018';
		// 		break;
		// 	case '11':
		// 		$bank_name = '011';
		// 		break;
		// 	case '67':
		// 		$bank_name = '067';
		// 		break;
		// 	case '71':
		// 		$bank_name = '071';
		// 		break;
		// 	case '14':
		// 		$bank_name = '014';
		// 		break;
		// 	case '65':
		// 		$bank_name = '065';
		// 		break;
		// 	case '34':
		// 		$bank_name = '034';
		// 		break;
		// 	case '39':
		// 		$bank_name = '039';
		// 		break;
		// 	case '24':
		// 		$bank_name = '024';
		// 		break;
		// 	case '73':
		// 		$bank_name = '073';
		// 		break;
		// 	case '20':
		// 		$bank_name = '020';
		// 		break;
		// 	case '30':
		// 		$bank_name = '030';
		// 		break;
		// 	case '33':
		// 		$bank_name = '033';
		// 		break;
		// 	case '70':
		// 		$bank_name = '070';
		// 		break;
		// 	case '31':
		// 		$bank_name = '031';
		// 		break;
			
		// 	default:	
		// 		$bank_name = '025';
		// 		break;
		// }

		return '0'.$bank_type;
	}

	private function identical_member($acc_number = null,$bank_id = null,$name = null)
	{
		$member_id = $this->topupmd->identical_member($bank_id,$acc_number,$name);

		if($member_id)
		{
			return $member_id;
		}
		else
		{
			return false;
		}

		return $member_id;
	}

	private function getUserBalance($member_id)
	{
		$this->db_front = $this->load->database('db_front', TRUE);
		
		$slotxo = $this->db_front->query("SELECT * FROM tb_slotxo_account WHERE member_id = $member_id")->row();
		$live22 = $this->db_front->query("SELECT * FROM tb_live22_account WHERE member_id = $member_id")->row();
		$wallet_balance = $this->db_front->query("SELECT * FROM tb_member_wallet WHERE member_id = $member_id")->row()->wallet_balance;

		$live22_balance = $this->live22_balance($live22->username);
		$slotxo_balance = $this->slotxo_balance($slotxo->username);

		$balance = $live22_balance+$slotxo_balance+$wallet_balance;

		return $balance;
	}
	private function live22_balance($username)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://api6.slot999.com/live22/MemberInfo?username=$username");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close ($ch);
		$response = json_decode($response);
		return $response->data->current_balance;
	}

	private function slotxo_balance($username)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://api6.slot999.com/new/SlotXO/GetUserCredit?username=$username");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close ($ch);
		$response = json_decode($response);
		return $response->data->Credit;
	}

}

/* End of file Bank.php */
/* Location: ./application/controllers/auto/Bank.php */