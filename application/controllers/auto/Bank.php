<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Bank extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// ini_set('max_execution_time', 0);

		$this->load->model('process/Topup_model','topupmd');
		
	}

	public function index()
	{
		// echo webSetting('bay_deposit');
	}

	public function bay_third()
	{

		if(webSetting('bay_deposit') === 'false')
		{
			echo "BAY is Under Construction";
			exit();
		}

		$this->bay3->cookie = FCPATH.'protected/cookie-bay3';
		$this->bay3->username = 'Rn727261';
		$this->bay3->password = 'Tn2525791';
		$this->bay3->account = '7111245644';


		// ini_set('max_execution_time', 0);
		$response = array();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
		curl_setopt($ch, CURLOPT_CAINFO, FCPATH . 'cert/cacert.pem');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->bay3->cookie);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->bay3->cookie);
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
		$form_field['ctl00$cphForLogin$username'] = $this->bay3->username;
		$form_field['ctl00$cphForLogin$hdPassword'] = $this->bay3->password;
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

		$prv_stamp = file_get_contents(FCPATH.'bankstamp/bay2.json');
		$arr_prv = json_decode($prv_stamp);

		foreach ($html->find("table.deposit_accsum_table") as $table) {
			foreach($table->find('tr') as $row){
				if($row->parent->tag == 'tbody') {
				    $rowData = array();

				    foreach($row->find('td') as $cell){
				        $rowData[] = $cell->innertext;
				    }

				    $date_time = explode(' ',$rowData[0]);
				    $datetrn = DateTime::createFromFormat('d/m/Y', $date_time[0]);
				    $tr_datetime = $datetrn->format('Y-m-d').' '.$date_time[1].':00';
				    $transection_detail = explode('  ',$rowData[1]);
				    $bank_type = mb_substr($transection_detail[1], 0, 2);
				    $bank_account = substr($transection_detail[1], 2);
				    $transection_no = str_replace(array(' ','  ',':','/'),'',$rowData[1].$rowData[0]);

				    // $transection_no = md5($transection_no.$date_time[1].$rowData[3]);

				    if($transection_detail[0] == 'TN')
				    {
				    	$transection_data = array('trans_in_datetime' => $tr_datetime,
				    			  'transection_no' => $transection_no,
				    			  'bank_number' => $bank_account,
				    			  'bank_id' => $this->bay_bank_type_rename($transection_no),
				    			  'retrive_datetime' => date('Y-m-d H:i:s'),
				    			  'amount' => str_replace(',','',$rowData[3]));
				    	$transection_arr[] = (object)$transection_data;
				    }
			    }
			}

			// print_r($transection_data);
			// exit();

			$fp = fopen(FCPATH.'bankstamp/bay3.json', 'w');
			fwrite($fp, json_encode($transection_arr));
			fclose($fp);
		}

		// THIS

		foreach ($transection_arr as $row) {
			if($this->find_exist_bay_trn($arr_prv,$row->transection_no) === false)
			{

				$trn_arr = array('transection_no' => $row->transection_no,
								 'trans_in_datetime' => $row->trans_in_datetime,
								 'amount' => $row->amount,
								 'bank_id' => $row->bank_id,
								 'bank_number' => $row->bank_number,
								 'acc_id' => 3,
								 'retrive_datetime' => $row->retrive_datetime);
				$this->topupmd->put_bay_transection($trn_arr);
			}
		}

		$topup_wait_list = $this->topupmd->bay_topup_wait_list();

		foreach ($topup_wait_list as $row) {
			$userid = $this->identical_member($row->bank_number,$row->bank_id);
			if($userid != '')
			{
				$ins_log = array('member_id' => $userid,
								 'previous_balance' => $this->getUserBalance($userid),
								 'amount' => $row->amount,
								 'datetime' => $row->trans_in_datetime,
								 'status' => '1',
								 'channel' => 'BAY',
								 'transection_no' => $row->transection_no);
				$this->topupmd->insert_deposit_logs($ins_log);
				$this->topupmd->update_bay_transection('1',$userid,$row->id);
			}
			else
			{
				$this->topupmd->update_bay_transection('3','0',$row->id);

				$trn_arr = array('transection_no' => $row->transection_no,
							 'trans_in_datetime' => $row->trans_in_datetime,
							 'amount' => $row->amount,
						 	 'bank_id' => $row->bank_id,
							 'bank_number' => $row->bank_number,
							 'name' => $row->name,
							 'retrive_datetime' => $row->retrive_datetime,
							 'trans_in_bank' => 'BAY');
				$this->topupmd->put_unconfirm_transection($trn_arr);
			}
		}

		// THIS
		// exit();

	}

	// public function bay()
	// {

	// 	if(webSetting('bay_deposit') === 'false')
	// 	{
	// 		echo "BAY is Under Construction";
	// 		exit();
	// 	}


	// 	// ini_set('max_execution_time', 0);
	// 	$response = array();
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	// 	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6');
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	// 	curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
	// 	curl_setopt($ch, CURLOPT_CAINFO, FCPATH . 'cert/cacert.pem');
	// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	// 	curl_setopt($ch, CURLOPT_COOKIEJAR, $this->bay->cookie);
	// 	curl_setopt($ch, CURLOPT_COOKIEFILE, $this->bay->cookie);
	// 	curl_setopt($ch, CURLOPT_HEADER, 0);
	// 	curl_setopt($ch, CURLOPT_TIMEOUT, 120);


	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Common/Login.aspx');
	// 	$data = curl_exec($ch);
	// 	$html = str_get_html($data);

	// 	$form_field = array();
	// 	foreach ($html->find('form input') as $element) {
	// 	    $form_field[$element->name] = $element->value;
	// 	}

	// 	$form_field['__EVENTTARGET'] = 'ctl00$cphForLogin$lbtnLoginNew';
	// 	$form_field['password'] = '';
	// 	$form_field['ctl00$cphForLogin$username'] = $this->bay->username;
	// 	$form_field['ctl00$cphForLogin$hdPassword'] = $this->bay->password;
	// 	$form_field['ctl00$cphForLogin$hddLanguage'] = 'TH';
	// 	$password = '';
	// 	$user = '';


	// 	$post_string = '__EVENTTARGET='.urlencode($form_field['__EVENTTARGET']).'&__EVENTARGUMENT='.urlencode($form_field['__EVENTARGUMENT']).'&__VIEWSTATE='.urlencode($form_field['__VIEWSTATE']).'&__VIEWSTATEGENERATOR='.urlencode($form_field['__VIEWSTATEGENERATOR']).'&__EVENTVALIDATION='.urlencode($form_field['__EVENTVALIDATION']).'&user='.$user.'&password='.$password.'&username='.$user.'&password='.$password.'&ctl00%24cphForLogin%24username='.urlencode($form_field['ctl00$cphForLogin$username']).'&ctl00%24cphForLogin%24password='.urlencode($form_field['ctl00$cphForLogin$password']).'&ctl00%24cphForLogin%24hdPassword='.urlencode($form_field['ctl00$cphForLogin$hdPassword']).'&ctl00%24cphForLogin%24hddLanguage='.urlencode($form_field['ctl00$cphForLogin$hddLanguage']).'';


	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Common/Login.aspx');
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	$data = curl_exec($ch);
	// 	$html = str_get_html($data);

	// 	$dom = new domDocument;
	// 	$web_data = mb_convert_encoding($data, "UTF-8");
	// 	// libxml_use_internal_errors(true);
	// 	$dom->loadHTML($data);
	// 	$tables = $dom->getElementById('ctl00_pnlMenuTopBar');
	// 	$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);
	// 	file_put_contents(FCPATH.'bankjson/bay_current',json_encode(array('current_balance' => '+'.$tb_arr[123],'updatetime' => time())));

	// 	foreach ($html->find('div.accmenu') as $element) {
	// 		foreach ($element->find('a[class=menu_link_progress]') as $el) {
	// 			$str = ltrim($el->href,'/BAY.KOL.WebSite/Pages/');
	// 			if (preg_match('#^MyAccount(.*)$#i', $str))
	// 			{
	// 				$acc_token[] = ltrim($str,'MyAccount.aspx?token=');

	// 			}
	// 		}
	// 	}

	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Pages/MyAccount.aspx?token='.$acc_token[0]);
	// 	$data = curl_exec($ch);
	// 	$html = str_get_html($data);

	// 	$prv_stamp = file_get_contents(FCPATH.'bankstamp/bay.json');
	// 	$arr_prv = json_decode($prv_stamp);

	// 	foreach ($html->find("table.deposit_accsum_table") as $table) {
	// 		foreach($table->find('tr') as $row){
	// 			if($row->parent->tag == 'tbody') {
	// 			    $rowData = array();

	// 			    foreach($row->find('td') as $cell){
	// 			        $rowData[] = $cell->innertext;
	// 			    }

	// 			    $date_time = explode(' ',$rowData[0]);
	// 			    $datetrn = DateTime::createFromFormat('d/m/Y', $date_time[0]);
	// 			    $tr_datetime = $datetrn->format('Y-m-d').' '.$date_time[1].':00';
	// 			    $transection_detail = explode('  ',$rowData[1]);
	// 			    $bank_type = mb_substr($transection_detail[1], 0, 2);
	// 			    $bank_account = substr($transection_detail[1], 2);
	// 			    $transection_no = str_replace(array(' ','  ',':','/'),'',$rowData[1].$rowData[0]);

	// 			    // $transection_no = md5($transection_no.$date_time[1].$rowData[3]);

	// 			    if($transection_detail[0] == 'TN')
	// 			    {
	// 			    	$transection_data = array('trans_in_datetime' => $tr_datetime,
	// 			    			  'transection_no' => $transection_no,
	// 			    			  'bank_number' => $bank_account,
	// 			    			  'bank_id' => $this->bay_bank_type_rename($transection_no),
	// 			    			  'retrive_datetime' => date('Y-m-d H:i:s'),
	// 			    			  'amount' => str_replace(',','',$rowData[3]));
	// 			    	$transection_arr[] = (object)$transection_data;
	// 			    }
	// 		    }
	// 		}

	// 		// print_r($transection_data);
	// 		// exit();

	// 		$fp = fopen(FCPATH.'bankstamp/bay.json', 'w');
	// 		fwrite($fp, json_encode($transection_arr));
	// 		fclose($fp);
	// 	}

	// 	// THIS

	// 	foreach ($transection_arr as $row) {
	// 		if($this->find_exist_bay_trn($arr_prv,$row->transection_no) === false)
	// 		{

	// 			$trn_arr = array('transection_no' => $row->transection_no,
	// 							 'trans_in_datetime' => $row->trans_in_datetime,
	// 							 'amount' => $row->amount,
	// 							 'bank_id' => $row->bank_id,
	// 							 'bank_number' => $row->bank_number,
	// 							 'retrive_datetime' => $row->retrive_datetime);
	// 			$this->topupmd->put_bay_transection($trn_arr);
	// 		}
	// 	}

	// 	$topup_wait_list = $this->topupmd->bay_topup_wait_list();

	// 	foreach ($topup_wait_list as $row) {
	// 		$userid = $this->identical_member($row->bank_number,$row->bank_id);
	// 		if($userid != '')
	// 		{
	// 			$ins_log = array('member_id' => $userid,
	// 							 'previous_balance' => $this->getUserBalance($userid),
	// 							 'amount' => $row->amount,
	// 							 'datetime' => $row->trans_in_datetime,
	// 							 'status' => '1',
	// 							 'channel' => 'BAY',
	// 							 'transection_no' => $row->transection_no);
	// 			$this->topupmd->insert_deposit_logs($ins_log);
	// 			$this->topupmd->update_bay_transection('1',$userid,$row->id);
	// 		}
	// 		else
	// 		{
	// 			$this->topupmd->update_bay_transection('3','0',$row->id);

	// 			$trn_arr = array('transection_no' => $row->transection_no,
	// 						 'trans_in_datetime' => $row->trans_in_datetime,
	// 						 'amount' => $row->amount,
	// 					 	 'bank_id' => $row->bank_id,
	// 						 'bank_number' => $row->bank_number,
	// 						 'name' => $row->name,
	// 						 'retrive_datetime' => $row->retrive_datetime,
	// 						 'trans_in_bank' => 'BAY');
	// 			$this->topupmd->put_unconfirm_transection($trn_arr);
	// 		}
	// 	}

	// 	// THIS
	// 	// exit();

	// }

	public function bay_secound()
	{

		$this->bay2->cookie = FCPATH.'protected/cookie-bay2';
		$this->bay2->username = 'Nd171799';
		$this->bay2->password = 'Bm272718';
		$this->bay2->account = '6541087894';

		if(webSetting('bay_deposit') === 'false')
		{
			echo "BAY is Under Construction";
			exit();
		}


		// ini_set('max_execution_time', 0);
		$response = array();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
		curl_setopt($ch, CURLOPT_CAINFO, FCPATH . 'cert/cacert.pem');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEJAR, $this->bay2->cookie);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $this->bay2->cookie);
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
		$form_field['ctl00$cphForLogin$username'] = $this->bay2->username;
		$form_field['ctl00$cphForLogin$hdPassword'] = $this->bay2->password;
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

		$prv_stamp = file_get_contents(FCPATH.'bankstamp/bay2.json');
		$arr_prv = json_decode($prv_stamp);

		foreach ($html->find("table.deposit_accsum_table") as $table) {
			foreach($table->find('tr') as $row){
				if($row->parent->tag == 'tbody') {
				    $rowData = array();

				    foreach($row->find('td') as $cell){
				        $rowData[] = $cell->innertext;
				    }

				    $date_time = explode(' ',$rowData[0]);
				    $datetrn = DateTime::createFromFormat('d/m/Y', $date_time[0]);
				    $tr_datetime = $datetrn->format('Y-m-d').' '.$date_time[1].':00';
				    $transection_detail = explode('  ',$rowData[1]);
				    $bank_type = mb_substr($transection_detail[1], 0, 2);
				    $bank_account = substr($transection_detail[1], 2);
				    $transection_no = str_replace(array(' ','  ',':','/'),'',$rowData[1].$rowData[0]);

				    // $transection_no = md5($transection_no.$date_time[1].$rowData[3]);

				    if($transection_detail[0] == 'TN')
				    {
				    	$transection_data = array('trans_in_datetime' => $tr_datetime,
				    			  'transection_no' => $transection_no,
				    			  'bank_number' => $bank_account,
				    			  'bank_id' => $this->bay_bank_type_rename($transection_no),
				    			  'retrive_datetime' => date('Y-m-d H:i:s'),
				    			  'amount' => str_replace(',','',$rowData[3]));
				    	$transection_arr[] = (object)$transection_data;
				    }
			    }
			}

			// print_r($transection_data);
			// exit();

			$fp = fopen(FCPATH.'bankstamp/bay2.json', 'w');
			fwrite($fp, json_encode($transection_arr));
			fclose($fp);
		}

		// THIS

		foreach ($transection_arr as $row) {
			if($this->find_exist_bay_trn($arr_prv,$row->transection_no) === false)
			{

				$trn_arr = array('transection_no' => $row->transection_no,
								 'trans_in_datetime' => $row->trans_in_datetime,
								 'amount' => $row->amount,
								 'bank_id' => $row->bank_id,
								 'bank_number' => $row->bank_number,
								 'acc_id' => 2,
								 'retrive_datetime' => $row->retrive_datetime);
				$this->topupmd->put_bay_transection($trn_arr);
			}
		}

		$topup_wait_list = $this->topupmd->bay_topup_wait_list();

		foreach ($topup_wait_list as $row) {
			$userid = $this->identical_member($row->bank_number,$row->bank_id);
			if($userid != '')
			{
				$ins_log = array('member_id' => $userid,
								 'previous_balance' => $this->getUserBalance($userid),
								 'amount' => $row->amount,
								 'datetime' => $row->trans_in_datetime,
								 'status' => '1',
								 'channel' => 'BAY',
								 'transection_no' => $row->transection_no);
				$this->topupmd->insert_deposit_logs($ins_log);
				$this->topupmd->update_bay_transection('1',$userid,$row->id);
			}
			else
			{
				$this->topupmd->update_bay_transection('3','0',$row->id);

				$trn_arr = array('transection_no' => $row->transection_no,
							 'trans_in_datetime' => $row->trans_in_datetime,
							 'amount' => $row->amount,
						 	 'bank_id' => $row->bank_id,
							 'bank_number' => $row->bank_number,
							 'name' => $row->name,
							 'retrive_datetime' => $row->retrive_datetime,
							 'trans_in_bank' => 'BAY');
				$this->topupmd->put_unconfirm_transection($trn_arr);
			}
		}

		// THIS
		// exit();

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

	protected function check_bank($no)
	{

		$form_field['accNo'] = $no;
		$form_field['bankNo'] = '025';

		$post_string = '';
		foreach ($form_field as $key => $value) {
		    $post_string .= $key . '=' . urlencode($value) . '&';
		}
		$post_string = substr($post_string, 0, -1);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://api.slot999.com/api/check_bank/check.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		curl_setopt($ch, CURLOPT_POST, 1);
		$data = curl_exec($ch);

		$data = json_decode($data);

		if($data->status === 'success')
		{
			return true;
		}
		else
		{
			return false;
		}
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