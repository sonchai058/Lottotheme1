<?php
function check_bank($account_no,$bank_id)
{
	return 0;	
}

function CURL_AGENT($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,'http://api6.slot999.com/'.$url); 
	$data = curl_exec($ch);
	return $data;
}
?>