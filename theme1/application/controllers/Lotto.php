<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lotto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();
	}

	public function index()
	{
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        $this->load->model('process/Lotto_model', 'lottomd');
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;
 
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;

        $data['lotto_reward_type'] = $this->lottomd->get_lotto_reward_type();
		$data['page_header'] = 'lotto/header';
		$data['page_content'] = 'lotto/content';
		$data['page_js'] = 'lotto/js';

		$this->load->view('layout/layout_title', $data, FALSE);
	} 

    public function request($lotto_type) {

        header('Content-Type: application/json');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('process/Lotto_model', 'lottomd');
        $member_id         = sess_userdata('id');
        $number = $this->input->post('request_lotto_number');
        $amount = $this->input->post('request_amount');
        $lotto_reward_type = $this->input->post('lotto_reward_type');

        // check time before date_time_closed
        $date_now = date('Y-m-d H:i:s');
        $lotto_date = $this->get_lotto_date($lotto_type);
        $time_now = date('H:i:s');
        $date_now_stro = strtotime($date_now);
        $lotto_date_time_stro = strtotime($lotto_date." ".$time_now);

       
        if (empty($number) || $amount == 0 || $lotto_reward_type == 0) {
            $response['status']  = 'error';
            $response['message'] = 'กรุณาระบุข้อมูลให้ถูกต้อง';
            echo json_encode($response);
            exit();
        }
        else {
          
            $req_arr       = array(
            'number'                                 => $number,
            'amount'                                 => $amount,
            'date_time_add'                          => date('Y-m-d H:i:s'),
            'member_id'                              => $member_id,
            'lotto_type'                             => $lotto_type,
            'lotto_group'                            => $lotto_date,
            'lotto_reward_type'                      => $lotto_reward_type);
    
    
            $req_status = $this->lottomd->put_lotto_member_log($req_arr);
    
            if ($req_status === false) {
                $response['status']  = 'error';
                $response['message'] = 'พบความผิดพลาด';
                echo json_encode($response);
            } else {
    
                $response['status']  = 'success';
                $response['message'] = 'ระบบได้ทำการแจ้งไปยังพนักงานเรียบร้อยแล้ว<br>กรุณารอตรวจสอบรายการ 1-3 นาที';
                // $response['message'] = $req_arr[number]." : ".$req_arr[amount]." : ".$req_arr[date_time_add];
                echo json_encode($response);
            }
        }
       
    }

    public function get_lotto_date($lotto_type){
        $this_month = date('m');
        $this_day = date('d');
        $this_year = date('Y');
        $this_time_stro = strtotime(date('Y-m-d H:i:s'));
        $this->load->model('process/Lotto_model', 'lottomd');
        $lotto_date_time_stro = strtotime($this->lottomd->get_lotto_date_time($lotto_type));
        // select date_time_closed in db
        if ($this_month == 12 && $this_day > 16) {
            $this_year =  $this_year + 1;
        }

        if ($this_day > 1 && $this_day < 16) {
            $this_day = 16;
        }
        else if ($this_day > 16) {
            $this_day = 1;
            $this_month = $this_month + 1;
        }
        else if ($this_day == 16 && $this_time_stro >= $lotto_date_time_stro) {
            $this_day = 1;
            $this_month = $this_month + 1;
        }
        else if ($this_day == 1 && $this_time_stro >= $lotto_date_time_stro) {
            $this_day = 16;
        }
      
        $lotto_date_st = $this_year."-".$this_month."-".$this_day;
        $lotto_date = date("Y-m-d",strtotime($lotto_date_st)); 
        return $lotto_date;
    }

    public function re_check_lotto($lotto_type) {
        header('Content-Type: application/json');
        $this->load->model('process/Lotto_model', 'lottomd');
        $date = $this->get_lotto_date();
          // รางวัล
       $last_lotto_result =  $this->lottomd->get_last_lotto_result($lotto_type,$date); // เลขที่ออกหวยรัฐบาล
        $get_member_lotto = $this->lottomd->get_lotto_member($lotto_type,$date); // หวยรัฐบาลที่ซื้อ
        foreach ($get_member_lotto as $row) {
            $lotto_reward_type = $row->lotto_reward_type;
            $number = $row->number;
            $amount = $row->amount;
            $result_three_top = $this->check_result($last_lotto_result->special,'three_top'); 
            $result_three_tod = $this->check_result($last_lotto_result->special,'three_tod');
            $three_front =  explode(",", $last_lotto_result->three_front);
            $three_back =  explode(",", $last_lotto_result->three_back);
            $two_down = $last_lotto_result->two_down;
            $result_runtop = $this->check_result($last_lotto_result->special,'run_top'); 
            $result_run_under = $this->check_result($last_lotto_result->two_down,'run_under'); 

            //3   3 ตัวตรง/บน
            //4    3 ตัวโต้ด
            //5    3 ตัวหน้า
            //6    3 ตัวล่าง
            //7    2 ตัวบน
            //8    2 ตัวล่าง
            //9    วิ่งบน
            //10   วิ่งล่าง 
          
            if ($lotto_reward_type == 3) {
              
                if ($result_three_top ==  $number) {

                    // ถูก 3 ตัวโต้ด
                    $response['number_threetop'] = $number; 
                    $response['number'] = $number;
                    $response['message'] = $lotto_reward_type;
                }
            }

            else if ($lotto_reward_type == 4) {
                
                if (in_array($number, $result_three_tod)){ 
                    // ถูก 3 ตัวโต้ด
                    $response['number_threetod'] = $number; 
                }
            }


            else if ($lotto_reward_type == 5) { // เช็คตรงใน db
               if ($three_front[0] == $number || $number == $three_front[1]) {
                   // ถูก 3 ตัวหน้า
                   $response['number_threefront'] = $number; 
               }
            }

            else if ($lotto_reward_type == 6) { // เช็คตรงใน db
                if ($three_back[0] == $number || $number == $three_back[1]) {
                    // ถูก 3 ตัวหลัง
                    $response['number_threeback'] = $number; 
                }
            }

            else if ($lotto_reward_type == 8) { 
                if ($number == $two_down) {
                    // ถูก 2 ตัวล่าง
                    $response['number_twodown'] = $number; 
                }
            
            }
            else  if ($lotto_reward_type == 9) {
                // วิ่งบน
               
                if ($result_runtop ==  $number) {

                    // ถูกวิ่งบน
                    $response['number_runtop'] = $number; 
                }
            }
            else if ($lotto_reward_type == 10) {
                // วิ่งบน
               
                if ($result_run_under ==  $number) {

                    // ถูกวิ่งล่าง
                    $response['number_rununder'] = $number; 
                   
                }
            } 
            else {
                //
                $response['number_noreward'] = $number;
            }
          
            
        } 
        echo json_encode($response);
    }

    public function check_result($number, $type) {
        $lenght = strlen($number);
        $result = substr('' . $number, $lenght - 5, $lenght);

        //สามตัวบน : สามตัว นับจากขวา  xx???
        if ($type == 'three_top') {
            $result = substr($result, 2, 3);

            //สามตัว โต๊ด : สามตัว ขวาสลับกันได้ xx???
        } else if ($type == 'three_tod') {
            $result = substr($result, 2, 3);
            $arr_num = str_split($result);
            $n = 0;
            $arr_swap_num = [];
            for ($i = 0; $i < count($arr_num); $i++) {
                $tmp = $arr_num[$i];
                for ($j = 0; $j < count($arr_num); $j++) {
                    if ($i != $j) {
                        $tmp .= '' . $arr_num[$j];
                    }
                }
                if (!in_array($tmp, $arr_swap_num)) {
                    $arr_swap_num[$n++] = $tmp;
                }

                $tmp = $arr_num[$i];
                for ($j = (count($arr_num) - 1); $j >= 0; $j--) {
                    if ($i != $j) {
                        $tmp .= '' . $arr_num[$j];
                    }
                }
                if (!in_array($tmp, $arr_swap_num)) {
                    $arr_swap_num[$n++] = $tmp;
                }
            }
            return $arr_swap_num;
            //สองตัวบน : สองตัว นับจากขวา xxx??
        } else if ($type == 'two_top') {
            $result = substr($result, 3, 2);

            //สองตัวล่าง : สองตัว นับจากซ้าย ??xxx
        } else if ($type == 'two_under') {
            $result = substr($result, 0, 2);

            //วิ่งบน : มีหนึ่งใน สามตัวขวา
        } else if ($type == 'run_top') {
            $result = substr($result, 2, 3);
            $result = str_split($result);

            //วิ่งล่าง : มีหนึ่งใน สองตัวซ้าย
        } else if ($type == 'run_under') {
            $result = substr($result, 0, 2);
            $result = str_split($result);

            //อื่นๆ
        } else if ($type == 'other') {
            $result = substr('' . $this->result, 0, $lenght - 5);
        }

        return $result;
    }
}

/* End of file PlayGame.php */
/* Location: ./application/controllers/PlayGame.php */