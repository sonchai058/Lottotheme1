<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jackpot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		
	}

	public function index()
	{
		
	}

	// public function last_jackpot()
	// {
	// 	header("Content-type:application/json");
	// 	$jackpot = file_get_contents('http://admins.slot999.com/new/jackpot_noti.json');
	// 	$data = json_decode($jackpot);

	// 	if($data->id > $this->input->cookie('last_jackpot_id',true))
	// 	{

	// 		$cookie = array(

	//            'name'   => 'last_jackpot_id',
	//            'value'  => $data->id,                          
	//            'expire' => '500',                                                                                   
	//            'secure' => TRUE

	//        );

	//        $this->input->set_cookie($cookie);

	//        // $message = "แจ็กพอตแตก คุณ".$data->member_name." (".$data->member_id.") ได้รับ ".number_format($data->amount,2)." บาท";
	//        if($data->amount >= 5000)
	//        {
	//        		$message = "<strong><span style='color:red !important;'>Jackpot แตก!!!</span>  ขอแสดงความยินดี คุณ".$data->member_name." (".$data->member_id.")<br>ได้รับ <span style='color:red !important;font-size:20px;'>".number_format($data->amount)."</span> บาท</strong>";
	//        }
	//        else
	//        {
	//        		$message = "<strong>คุณ".$data->member_name." (".$data->member_id.")<br>ได้รับ <span style='color:red !important;'>".number_format($data->amount)."</span> บาท</strong>";
	//        }

	//        $jackpot_arr = array('message' => $message);

	//        echo json_encode($jackpot_arr);
	// 	}

	// }

	// public function get()
	// {
	// 	$last_jackpot_id = 0;
	// 	if($this->input->cookie('last_jackpot_id',true) != '')
	// 	{
	// 		$last_jackpot_id = $this->input->cookie('last_jackpot_id',true);
	// 	}

	// 	echo $last_jackpot_id;
	// }

	// public function set($last_id)
	// {
	// 	$cookie = array(

  //          'name'   => 'last_jackpot_id',
  //          'value'  => $last_id,                          
  //          'expire' => '300',                                                                                   
  //          'secure' => TRUE

  //      );

  //      $this->input->set_cookie($cookie);
	// }

	// public function delete()
	// {
	// 	delete_cookie('last_jackpot_id');
	// }

}

/* End of file Jackpot.php */
/* Location: ./application/controllers/Jackpot.php */