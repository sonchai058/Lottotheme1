<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require 'vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';

class Scb5 extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
        $this->load->helper('simple_html_dom');
        $this->load->helper('curl_function');
	}

	public function run()
	{
        date_default_timezone_set('Asia/Bangkok');
        error_reporting(0);
        define('MAX_FILE_SIZE', 60000000);

        echo $PATH = dirname(__FILE__).'/';
        $COOKIEFILE = $PATH.'protect/scb-cookies';

		$this->bank = 'SCB';
		$this->cookie = FCPATH.'protected/cookie-scb-2';
		$this->username = 'Bd660553';
		$this->password = 'Dn636379';
		$this->account = '4300289861';
		$this->acc_id = '2';
		$this->ref = "https://www.scbeasy.com/online/easynet/page/firstpage.aspx";
	    $this->balance;
       $curl_by_passs = "http://api.scraperapi.com?api_key=241d23fddf97afc151b2b5d78fa5d04b&url=";
       $curl_by_passs = "";

        $USERNAME = $this->username ;
        $PASSWORD = $this->password ;
        $ACCOUNT_NAME = str_replace("-", "", $this->account);

        unlink($COOKIEFILE);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
        curl_setopt($ch, CURLOPT_CAINFO, $PATH."cacert.pem");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $COOKIEFILE);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $COOKIEFILE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);

        $acc_id = 0;

        $form_field = array();
        $form_field['LOGIN']  = $USERNAME;
        $form_field['PASSWD'] = $PASSWORD;
        $form_field['LANG'] = 'T';
        $post_string = '';
        foreach($form_field as $key => $value) {
            $post_string .= $key . '=' . urlencode($value) . '&';
        }
        $post_string = substr($post_string, 0, -1);

// login
        curl_setopt($ch, CURLOPT_URL, $curl_by_passs.'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        $data = curl_exec($ch);

        $html = str_get_html($data);
        $SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;

        $form_field = array();
        $form_field['SESSIONEASY']  = $SESSIONEASY;
        $post_string = '';
        foreach($form_field as $key => $value) {
            $post_string .= $key . '=' . urlencode($value) . '&';
        }
        $post_string = substr($post_string, 0, -1);
        curl_setopt($ch, CURLOPT_URL, $curl_by_passs.'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        $data = curl_exec($ch);

// get Balance Total
        $html = str_get_html($data);
        $table = $html->find('table#DataProcess_SaCaGridView', 0);
        foreach( $table->find('tr') as $tr){
            $bank_balance = clean($tr->find('td strong', 1)->plaintext);
        }

// get AccBal ID
        $html = str_get_html($data);
        foreach($html->find('a[id*="DataProcess_SaCaGridView_SaCa_LinkButton_"]') as $a) {
            $text = $a->outertext;
            $s = substr($ACCOUNT_NAME, 4);
            $pos = strpos($text, $s);
            if ($pos !== false) {
                // javascript:__doPostBack('ctl00$DataProcess$SaCaGridView$ctl02$SaCa_LinkButton','')
                //javascript:__doPostBack(&#39;ctl00$DataProcess$SaCaGridView$ctl02$SaCa_LinkButton&#39;,&#39;&#39;)
                $href =  htmlspecialchars_decode($a->href, ENT_QUOTES);
                $href = str_replace("javascript:__doPostBack('", '', $href);
                $href = str_replace("','')", '', $href);
                $acc_href = $href;
                break;
            }
        }

        $html = str_get_html($data);
        $form_field = array();
        foreach($html->find('form input') as $element) {
            $form_field[$element->name] = $element->value;
        }
        $form_field['__EVENTTARGET']  = $acc_href;
        $post_string = '';
        foreach($form_field as $key => $value) {
            $post_string .= $key . '=' . urlencode($value) . '&';
        }
        $post_string = substr($post_string, 0, -1);
        curl_setopt($ch, CURLOPT_URL, $curl_by_passs.'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        $data = curl_exec($ch);


// #f1 form redirect
        $html = str_get_html($data);
        $form_field = array();
        foreach($html->find('form#f1 input') as $element) {
            $form_field[$element->name] = $element->value;
        }
        $post_string = '';
        foreach($form_field as $key => $value) {
            $post_string .= $key . '=' . urlencode($value) . '&';
        }
        $post_string = substr($post_string, 0, -1);
        curl_setopt($ch, CURLOPT_URL, $curl_by_passs.'https://www.scbeasy.com/online/easynet/page/acc/acc_bnk_tst.aspx');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        $data = curl_exec($ch);

// filter table
        $html = str_get_html($data);
        $table = $html->find('table#DataProcess_GridView', 0);
        $s = 'วันที่';//iconv("windows-874", "utf-8", 'วันที่');
        $s2 = 'รวม';//iconv("windows-874", "utf-8", 'รวม');
        $total = array();
        if (!(empty($table))) {
            foreach($table->find('tr') as $tr) {
                $td1 = clean($tr->find('td',0)->plaintext);
                $pos = strpos($td1, $s);
                if ($pos !== false) continue;
                $pos = strpos($td1, $s2);
                if ($pos !== false) continue;

                $list = array();
                $list['date'] = $td1.' '.clean($tr->find('td',1)->plaintext);
                $list['in'] = (float) str_replace(',','', clean($tr->find('td',5)->plaintext));
                $list['out'] = (float) str_replace(',','', clean($tr->find('td',4)->plaintext));
                $list['info'] = clean($tr->find('td',3)->plaintext).' '.clean($tr->find('td',6)->plaintext);
                $list['get_bank'] = clean($tr->find('td',6)->plaintext);
                preg_match_all("/\\((.*?)\\)/", $list['get_bank'], $matches);
                $list['bank_type'] = ($matches[1][0] == '' ? 'SCB':$matches[1][0]);
                $get_bank_number = strtolower(clean($tr->find('td',6)->plaintext));
                $get_bank_number = explode('x', $get_bank_number);
                $clean_bank_number = preg_replace('/\D/', '', $get_bank_number[1]);
                if(strlen($clean_bank_number) > 4){
                    $bank_number = substr($clean_bank_number, -6);
                }else{
                    $bank_number = $clean_bank_number;
                }
                $list['number'] = 'x'.$bank_number;
                $list['date'] = str_replace('/', '-', $list['date']);

                if (empty($list['in'])) continue;
                $total[] = $list;

            }
        }

        print_r($total);

        //$links = db_connect($db_host, $db_account, $db_password, $db_name);

        if(!empty($SESSIONEASY)){
            $check_online = "1";
        }else{
            $check_online = "0";
        }
	}

	private function getFormData($html, $key)
    {
        preg_match('/<input.*?name="'.$key.'".*?id="'.$key.'".*?value="(.*?)".*?>/', $html, $ml);
        return $ml[1];
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

	private function identical_member($acc_number = null,$bank_id = null,$name = null)
	{
		$this->load->model('process/Topup_model');

		$member_id = $this->Topup_model->identical_member($bank_id,$acc_number,$name);

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

	// public function run()
	// {
	// 	$this->bank = 'SCB';
	// 	$this->username = 'Nd171799';
	// 	$this->password = 'Bm272718';
	// 	$this->account = '6541087894';
	// 	$this->acc_id = 2;
	// 	$this->cookie = FCPATH.'protected/cookie-scb-x2';

	// 	$response = array();
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	// 	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6');
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	// 	curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
	// 	curl_setopt($ch, CURLOPT_CAINFO, FCPATH . 'cert/cacert.pem');
	// 	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	// 	curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie);
	// 	curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookie);
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
	// 	$form_field['ctl00$cphForLogin$username'] = $this->username;
	// 	$form_field['ctl00$cphForLogin$hdPassword'] = $this->password;
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

	// 	// echo $html;
	// 	// exit;

	// 	$dom = new domDocument;
	// 	$web_data = mb_convert_encoding($data, "UTF-8");

	// 	$dom->loadHTML($data);
	// 	$tables = $dom->getElementById('ctl00_pnlMenuTopBar');
	// 	$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);

	// 	foreach ($html->find('div.accmenu') as $element) {
	// 		foreach ($element->find('a[class=menu_link_progress]') as $el) {
	// 			$str = ltrim($el->href,'/BAY.KOL.WebSite/Pages/');
	// 			if (preg_match('#^MyAccount(.*)$#i', $str))
	// 			{
	// 				$acc_token[] = ltrim($str,'MyAccount.aspx?token=');

	// 			}
	// 		}
	// 	}

	// 	// var_dump($acc_token);
	// 	// exit;

	// 	curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Pages/MyAccount.aspx?token='.$acc_token[0]);
	// 	$data = curl_exec($ch);
	// 	$html = str_get_html($data);

	// 	// echo $html;
	// 	// exit;

	// 	foreach ($html->find("table.deposit_accsum_table") as $table) {
	// 		foreach($table->find('tr') as $row){
	// 			if($row->parent->tag == 'tbody') {
	// 			    $rowData = array();

	// 			    foreach($row->find('td') as $cell){
	// 			        $rowData[] = $cell->innertext;
	// 			    }

	// 			    // print_r($rowData);



	// 			    $date_time = explode(' ',$rowData[0]);
	// 			    $datetrn = DateTime::createFromFormat('d/m/Y', $date_time[0]);
	// 			    $tr_datetime = $datetrn->format('Y-m-d').' '.$date_time[1].':00';
	// 			    $transection_detail = explode('  ',$rowData[1]);
	// 			    $bank_type = mb_substr($transection_detail[1], 0, 2);
	// 			    $bank_account = substr($transection_detail[1], 2);
	// 			    $transection_no = str_replace(array(' ','  ',':','/'),'',$rowData[1].$rowData[0]);

	// 			    if($transection_detail[0] == 'TN')
	// 			    {
	// 					$last_n_min = strtotime("-10 minutes");
	// 					$tr_timestamp = strtotime($tr_datetime);

	// 					if($tr_timestamp >= $last_n_min)
	// 					{
							
	// 				    	$member_id = $this->identical_member($bank_account,$this->bay_bank_type_rename($transection_no));
	// 				    	if($member_id)
	// 						{

	// 							$transection_data = array('trans_in_datetime' => $tr_datetime,
	// 				    			  'transection_no' => md5($transection_no),
	// 				    			  'bank_number' => $bank_account,
	// 				    			  'bank_id' => $this->bay_bank_type_rename($transection_no),
	// 				    			  'retrive_datetime' => date('Y-m-d H:i:s'),
	// 				    			  'acc_id' => $this->acc_id,
	// 				    			  'member_id' => $member_id,
	// 				    			  'topup_status' => 0,
	// 				    			  'trans_in_bank' => $this->bank,
	// 				    			  'amount' => str_replace(',','',$rowData[3]));

	// 							$this->load->model('Bot_model');
	// 							$this->Bot_model->put_manual_transection($transection_data);
	// 						}
	// 						else
	// 						{

	// 							$transection_data = array('trans_in_datetime' => $tr_datetime,
	// 				    			  'transection_no' => md5($transection_no),
	// 				    			  'bank_number' => $bank_account,
	// 				    			  'bank_id' => $this->bay_bank_type_rename($transection_no),
	// 				    			  'retrive_datetime' => date('Y-m-d H:i:s'),
	// 				    			  'acc_id' => $this->acc_id,
	// 				    			  'member_id' => $member_id,
	// 				    			  'topup_status' => 3,
	// 				    			  'trans_in_bank' => $this->bank,
	// 				    			  'amount' => str_replace(',','',$rowData[3]));

	// 							$this->load->model('Bot_model');
	// 							$this->Bot_model->put_unconfirm_transection($transection_data);
	// 						}


	// 						// print_r($transection_data);
	// 					}
	// 			    }
	// 		    }
	// 		}
	// 	}

	// 	echo "Run Script Success At ".time();
		
	// }

	// protected function clean($text)
	// {
	// 	$text = trim($text);
	// 	$text = str_replace("&nbsp;", "", $text);
	// 	return $text;
	// }

	// protected function bay_bank_type_rename($transection_str)
	// {
	// 	$bank_type = mb_substr($transection_str, 2, 2);
	// 	$bank_account = mb_substr($transection_str, 2, 10);

	// 	switch ($bank_type) {
	// 		case '25':
	// 			$bank_name = '025';
	// 			break;
	// 		case '02':
	// 			$bank_name = '002';
	// 			break;
	// 		case '06':
	// 			$bank_name = '006';
	// 			break;
	// 		case '04':
	// 			$bank_name = '004';
	// 			break;
	// 		case '69':
	// 			$bank_name = '069';
	// 			break;
	// 		case '22':
	// 			$bank_name = '022';
	// 			break;
	// 		case '18':
	// 			$bank_name = '018';
	// 			break;
	// 		case '11':
	// 			$bank_name = '011';
	// 			break;
	// 		case '67':
	// 			$bank_name = '067';
	// 			break;
	// 		case '71':
	// 			$bank_name = '071';
	// 			break;
	// 		case '14':
	// 			$bank_name = '014';
	// 			break;
	// 		case '65':
	// 			$bank_name = '065';
	// 			break;
	// 		case '34':
	// 			$bank_name = '034';
	// 			break;
	// 		case '39':
	// 			$bank_name = '039';
	// 			break;
	// 		case '24':
	// 			$bank_name = '024';
	// 			break;
	// 		case '73':
	// 			$bank_name = '073';
	// 			break;
	// 		case '20':
	// 			$bank_name = '020';
	// 			break;
	// 		case '30':
	// 			$bank_name = '030';
	// 			break;
	// 		case '33':
	// 			$bank_name = '033';
	// 			break;
	// 		case '70':
	// 			$bank_name = '070';
	// 			break;
	// 		case '31':
	// 			$bank_name = '031';
	// 			break;
	// 		default:		
	// 			$bank_name = '025';
	// 			break;
	// 	}

	// 	return $bank_name;
	// }

	// private function identical_member($acc_number = null,$bank_id = null)
	// {
	// 	$this->load->model('process/Topup_model');
	// 	$member_id = $this->Topup_model->identical_member($bank_id,$acc_number);

	// 	if($member_id)
	// 	{
	// 		return $member_id;
	// 	}
	// 	else
	// 	{
	// 		return;
	// 	}

	// 	return $member_id;
	// }
}

/* End of file Bank.php */
/* Location: ./application/controllers/auto/Bank.php */