<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wheel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();

        $this->load->helper('security');
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        
        $this->load->model('process/Wheel_model', 'wheel_md');

        $this->member_id         = sess_userdata('id');

	}

    public function index() {
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;
 
        $data['title']          = "วงล้อนำโชค";
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
        
        $data['id'] = $this->wheel_md->setPointToday(10,$this->member_id);
        $data['point'] = $this->wheel_md->getPoint($this->member_id);

		$data['page_header'] = 'wheel/header';
		$data['page_content'] = 'wheel/content';
        $data['page_js'] = 'wheel/js';


		$this->load->view('layout/layout_title_wheel', $data, FALSE);
    }

    public function point() {
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;
 
        $data['title']          = "สะสมแต้ม";
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
        
        $data['id'] = $this->wheel_md->setPointToday(10,$this->member_id);
        $data['point'] = $this->wheel_md->getPoint($this->member_id);
        $data['bonus_rate'] = $this->wheel_md->getBonusRate();
        $data['count'] = $this->wheel_md->getBonusOrderCountHist($this->member_id);

		$data['page_header'] = 'point/header';
		$data['page_content'] = 'point/content';
        $data['page_js'] = 'point/js';


		$this->load->view('layout/layout_title', $data, FALSE);
    }

    public function save() {
        if($this->member_id!='') {
            $point = $this->wheel_md->getPoint($this->member_id);

            $dataList = $this->input->input_stream('dataList', true);
            $dataList = json_decode($dataList);
            if (empty($dataList)) {
                $response = array(
                    'status' => 'error',
                    'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                    'dataList'=>$dataList,
                    'rs'=>array(),
                    'point'=>$point
            );
            }else if(!($dataList->userData->score>=0 && $dataList->$userData->score<=300)) {
                $response = array(
                    'status' => 'error',
                    'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                    'dataList'=>$dataList,
                    'rs'=>array(),
                    'point'=>$point
                );
            }else {
                $rs = $this->wheel_md->setPointWin(3,$this->member_id,$dataList->userData->score);
                $point = $this->wheel_md->getPoint($this->member_id);

                $response = array(
                    'status' => 'success',
                    'message'=> 'บันทึกสำเร็จ',
                    'rs'=>$dataList,
                    'point'=>$point
                );
            }

        

            header('Content-Type: application/json');
            //$rs = $this->lottomdnew->dlt_lotto_setnumber_member($set_id);
            /*if(!empty($rs)) {
                $response = array(
                    'status' => 'success',
                    'message'=> 'ลบเสร็จสิ้น',
                );
            }else {
                $response = array(
                    'status' => 'error',
                    'message'=> 'พบข้อผิดพลาด!',
            );
            }
            */

            echo json_encode($response);
        }
    }

}

/* End of file PlayGame.php */
/* Location: ./application/controllers/PlayGame.php */