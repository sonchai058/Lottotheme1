<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require 'vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';

class Scb2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$this->bank = 'SCB';
		$this->cookie = FCPATH.'protected/cookie-scb-2';
		$this->username = 'Bd660553';
		$this->password = 'Dn636379';
		$this->account = '4300289861';
		$this->acc_id = '2';
		$this->ref = "https://www.scbeasy.com/online/easynet/page/firstpage.aspx";
	    $this->balance;


		$this->ch = curl_init();
		curl_setopt ($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($this->ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array( 'Expect:' ));
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/v1.4/site/presignon/index.asp'); // เข้าหน้าแรกเพื่อทำการดึงข้อมูล ทำการ login
        /*if($_SERVER['REMOTE_ADDR']=='127.0.0.1'){
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($this->ch, CURLOPT_PROXY, '127.0.0.1:8888');
        }*/
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, $this->cookie);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.101 Safari/537.36');
        $temp=curl_exec($this->ch);

        ////////////////////////////////////////////////Login เข้าธนาคาร
        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, 'https://www.scbeasy.com/v1.4/site/presignon/index.asp');
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, ('LANG=T&LOGIN='.$this->username.'&PASSWD='.$this->password.'&lgin.x=24&lgin.y=21'));
        $temp = curl_exec($this->ch);
        if (preg_match('/error_signon.aspx/', $temp)) {
            die;
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


        curl_setopt($this->ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/acc/acc_mpg.aspx');
        curl_setopt($this->ch, CURLOPT_REFERER, $this->ref);
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, ('SESSIONEASY='.$this->SESSIONEASY.'&undefined=undefined'));
        $html = curl_exec($this->ch);

        preg_match('/inp_value = new Array\(\'(.*?)\'\);/', $html, $ml);
        $this->SESSIONEASY=$ml[1];
        if (!preg_match('/'.$this->account.'/', $html)) {
            die("Not found that account.");
        }

        preg_match('/View\$ctl(.*?)\$SaCa_LinkButton.*?'.$this->account.'/', $html, $temp);
        $this->accid=$temp[1];
        $html2=str_replace(array("\r","\t","\n"), "", $html);




        preg_match('/'.$this->account.'(.*?)<\/tr>/', $html2, $temp);
        preg_match('/[0-9,]{1,}\.[0-9]{2}/', $temp[1], $temp);

        $this->balance=$temp[0];
        $this->balance=floatval(preg_replace('/[^0-9\.\+\-]/','', $this->balance));
        $__EVENTTARGET='ctl00$DataProcess$SaCaGridView$ctl'.$this->accid.'$SaCaView_LinkButton';
        $__EVENTARGUMENT='';
        $__VIEWSTATE=$this->getFormData($html, "__VIEWSTATE");
        $__VIEWSTATEGENERATOR=$this->getFormData($html, "__VIEWSTATEGENERATOR");

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
        preg_match('/value="(.*?)".*?'.$this->account.'/', $html, $temp);
        $DDLAcctNo=$temp[1];

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
				}

		preg_match_all('/<tr( style="background\-color:White;")?>.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?">(.*?)<\/.*?<\/tr>/', $temp[1], $temp);
        for ($i=0;$i<count($temp[0]);$i++) {
            //print_r($temp);
            $data[$i]['time']=strtotime(str_replace('/', '-', $temp[2][$i]).'T'.$temp[3][$i].':00+0700');
            $data[$i]['channel']=$temp[5][$i].' ('.$temp[4][$i].')';
            $data[$i]['detail']=$temp[8][$i];
			$data[$i]['value'] = preg_replace('/[^0-9\.\+\-]/','',($temp[6][$i]=='&nbsp;')?$temp[7][$i]:$temp[6][$i]);
            $data[$i]['tranection_no'] = ($data[$i]['time'] . $data[$i]['value'] . $data[$i]['channel'] . $data[$i]['detail']);
            $data[$i]['tranection_no'] = md5($data[$i]['tranection_no']);
			preg_match('/X[0-9]{6}/',$data[$i]['detail'],$tempacc);
			$data[$i]['acc_num']=str_replace('X','****',@$tempacc[0]);
        }
        if (isset($data[0])) {

        	$last_n_min = strtotime("-10 minutes");


       		foreach ($data as $r) {

       			if($r['value'] > 0)
       			{
       				if($last_n_min < $r['time'])
       				{
       					$r['detail'] = explode(' ', $r['detail']);
       					$r['detail'][1] = $this->scb_bank_type_rename(str_replace(array('(',')'), '', $r['detail'][1]));
       					$r['detail'][2] = str_replace(array('x','/X'), '', $r['detail'][2]);

       					$r['value'] = intval($r['value']);

       					$detail = $r['detail'];
                        
       					$member_id = $this->identical_member($detail[2],$detail[1],$detail[4]);

       					if($member_id)
       					{

       						$transection_data = array('trans_in_datetime' => date('Y-m-d H:i:s',$r['time']),
					    			  'transection_no' => $r['tranection_no'],
					    			  'bank_number' => $detail[2],
					    			  'bank_id' => $detail[1],
					    			  'retrive_datetime' => date('Y-m-d H:i:s'),
					    			  'acc_id' => $this->acc_id,
					    			  'member_id' => $member_id,
					    			  'topup_status' => 0,
					    			  'trans_in_bank' => $this->bank,
					    			  'amount' => $r['value']);

								$this->load->model('Bot_model');
								$this->Bot_model->put_manual_transection($transection_data);
       					}
       					else
       					{
       						$transection_data = array('trans_in_datetime' => date('Y-m-d H:i:s',$r['time']),
					    			  'transection_no' => $r['tranection_no'],
					    			  'bank_number' => $detail[2],
					    			  'bank_id' => $detail[1],
					    			  'retrive_datetime' => date('Y-m-d H:i:s'),
					    			  'acc_id' => $this->acc_id,
					    			  'member_id' => $member_id,
					    			  'topup_status' => 0,
					    			  'trans_in_bank' => $this->bank,
					    			  'amount' => $r['value']);

       						// print_r($transection_data);

								$this->load->model('Bot_model');
								$this->Bot_model->put_unconfirm_transection($transection_data);
       					}

       					// print_r($r);
       				}
       			}
       		}
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