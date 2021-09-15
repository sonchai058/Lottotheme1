<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';

class Bay3 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$this->bank = 'BAY';
		$this->bay->username = 'Aa188199';
		$this->bay->password = 'Nd118833';
		$this->bay->account = '7841161615';
		$this->bay->acc_id = 3;
		$this->bay->cookie = FCPATH.'protected/cookie-bay-x3';

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

		// echo $html;
		// exit;

		$dom = new domDocument;
		$web_data = mb_convert_encoding($data, "UTF-8");

		$dom->loadHTML($data);
		$tables = $dom->getElementById('ctl00_pnlMenuTopBar');
		$tb_arr = preg_split("/[\s]+/", $tables->nodeValue);

		foreach ($html->find('div.accmenu') as $element) {
			foreach ($element->find('a[class=menu_link_progress]') as $el) {
				$str = ltrim($el->href,'/BAY.KOL.WebSite/Pages/');
				if (preg_match('#^MyAccount(.*)$#i', $str))
				{
					$acc_token[] = ltrim($str,'MyAccount.aspx?token=');

				}
			}
		}

		// var_dump($acc_token);
		// exit;

		curl_setopt($ch, CURLOPT_URL, 'https://www.krungsrionline.com/BAY.KOL.WebSite/Pages/MyAccount.aspx?token='.$acc_token[0]);
		$data = curl_exec($ch);
		$html = str_get_html($data);

		// echo $html;
		// exit;

		foreach ($html->find("table.deposit_accsum_table") as $table) {
			foreach($table->find('tr') as $row){
				if($row->parent->tag == 'tbody') {
				    $rowData = array();

				    foreach($row->find('td') as $cell){
				        $rowData[] = $cell->innertext;
				    }

				    // print_r($rowData);



				    $date_time = explode(' ',$rowData[0]);
				    $datetrn = DateTime::createFromFormat('d/m/Y', $date_time[0]);
				    $tr_datetime = $datetrn->format('Y-m-d').' '.$date_time[1].':00';
				    $transection_detail = explode('  ',$rowData[1]);
				    $bank_type = mb_substr($transection_detail[1], 0, 2);
				    $bank_account = substr($transection_detail[1], 2);
				    $transection_no = str_replace(array(' ','  ',':','/'),'',$rowData[1].$rowData[0]);

				    if($transection_detail[0] == 'TN')
				    {
						$last_n_min = strtotime("-20 minutes");
						$tr_timestamp = strtotime($tr_datetime);

						if($tr_timestamp >= $last_n_min)
						{
							
					    	$member_id = $this->identical_member($bank_account,$this->bay_bank_type_rename($transection_no));
					    	if($member_id)
							{

								$transection_data = array('trans_in_datetime' => $tr_datetime,
					    			  'transection_no' => md5($transection_no),
					    			  'bank_number' => $bank_account,
					    			  'bank_id' => $this->bay_bank_type_rename($transection_no),
					    			  'retrive_datetime' => date('Y-m-d H:i:s'),
					    			  'acc_id' => $this->bay->acc_id,
					    			  'member_id' => $member_id,
					    			  'topup_status' => 0,
					    			  'trans_in_bank' => $this->bank,
					    			  'amount' => str_replace(',','',$rowData[3]));

								$this->load->model('Bot_model');
								$this->Bot_model->put_manual_transection($transection_data);
							}
							else
							{

								$transection_data = array('trans_in_datetime' => $tr_datetime,
					    			  'transection_no' => md5($transection_no),
					    			  'bank_number' => $bank_account,
					    			  'bank_id' => $this->bay_bank_type_rename($transection_no),
					    			  'retrive_datetime' => date('Y-m-d H:i:s'),
					    			  'acc_id' => $this->bay->acc_id,
					    			  'member_id' => $member_id,
					    			  'topup_status' => 3,
					    			  'trans_in_bank' => $this->bank,
					    			  'amount' => str_replace(',','',$rowData[3]));

								$this->load->model('Bot_model');
								$this->Bot_model->put_unconfirm_transection($transection_data);
							}


							// print_r($transection_data);
						}
				    }
			    }
			}
		}

		echo "Run Script Success At ".time();
		
	}

	protected function clean($text)
	{
		$text = trim($text);
		$text = str_replace("&nbsp;", "", $text);
		return $text;
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

	private function identical_member($acc_number = null,$bank_id = null)
	{
		$this->load->model('process/Topup_model');
		$member_id = $this->Topup_model->identical_member($bank_id,$acc_number);

		if($member_id)
		{
			return $member_id;
		}
		else
		{
			return;
		}

		return $member_id;
	}
}

/* End of file Bank.php */
/* Location: ./application/controllers/auto/Bank.php */