<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lottonew extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_login();

        $this->load->helper('security');
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancem');
        $this->load->model('process/Lotto_model', 'lottomd');

        $this->load->model('process/Lottonew_model', 'lottomdnew');

        $this->lottoGroupNow = $this->getLotto_result(); //ดึงวันที่งวดล่าสุด
        $this->LottoResultSuccess = $this->getLotto_resultSuccess(1,$this->lottoGroupNow); //ดึงงวดล่าสุดในตารางประกาศผล ใช่งวด ปัจจุบันหรือไม่?
        
        $this->Lotto_resultLastSuccess = $this->getLotto_resultLastSuccess(); //ดึงงวดหลังสุดที่ ประกาศรางวัล
        $this->member_id         = sess_userdata('id');

        $this->label_arr = array(
            '3 ตัวบน'=>'3_up_900',
            '3 ตัวล่าง'=>'3_under_450', 
            '3 ตัวหน้า'=>'3_front_450', 
            '3 ตัวโต๊ด'=>'3_inverse_150',
            '2 ตัวบน'=>'2_up_90', 
            '2 ตัวล่าง'=>'2_under_90', 
            'วิ่งบน'=>'dot32_up_3.2',
            'วิ่งล่าง'=>'dot42_under_4.2'); 
	}

    public function view($date='') {
        if($date!='') {
            $this->lottoGroupNow = $date;
            $this->LottoResultSuccess = $this->getLotto_resultSuccess(1,$date);
        }

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
        
        $data['lottoGroupNow'] = $this->lottoGroupNow;
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;

        $data['histBill'] = $this->getHistBill();
        $data['histMyNumber'] = $this->histMyNumber();

        $data['label_arr'] = $this->label_arr;

        $data['lotto_reward_type'] = $this->lottomdnew->get_lotto_reward_type();
        $data['numberFoo'] = json_encode($this->lottomdnew->getDeprive($this->label_arr,1,$this->lottoGroupNow));

		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content_viewhist';
		//$data['page_js_play'] = 'lottonew/js_playsetnumber';
        $data['page_js'] = 'lottonew/js';

        $dd = $this->lottomdnew->get_lotto_member(1,$this->lottoGroupNow);
        $ds = array();

        foreach($dd as $key=>$data11) {
            $lotto_type = $this->lottomdnew->get_lotto_reward_type($data11->lotto_reward_type);
            $label = $this->label_arr[$lotto_type[0]->description]; 
            $arr = explode("_",$label);
            $price = $arr[2];
            $number = $data11->number;
            if($label[0]=='3') {
                if(intval($data11->number)<10){
                    $number = '00'.$number;
                }else if(intval($data11->number)<100) {
                    $number = '0'.$number;
                }else {
                    
                }
            }else if($label[0]=='2') {
                if(intval($data11->number)<10){
                    $number = '0'.$number;
                }
            }
            $ds[] = array(
            'deprive'=> false,
            'displayVal'=> $number,
            'id'=> $key,
            'numlabel'=> $label,
            'numtext'=> $lotto_type[0]->description,
            'price'=> ($data11->amount*$price),
            'unit'=> $data11->amount,
            );
        
        }
        $data['dataList'] = $ds;
        //$data['dataList'] = json_encode($ds);

        $data['rateReward'] = json_encode($this->lottomdnew->getRateReward());

		$this->load->view('layout/layout_title_new', $data, FALSE);
    }

	public function index($date='')
	{
        if($date!='') {
            $this->lottoGroupNow = $date;
            $this->LottoResultSuccess = $this->getLotto_resultSuccess(1,$date);
        }

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
        
        $data['lottoGroupNow'] = $this->lottoGroupNow;
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;

        $data['histBill'] = $this->getHistBill();
        $data['histMyNumber'] = $this->histMyNumber();

        $data['label_arr'] = $this->label_arr;

        $data['lotto_reward_type'] = $this->lottomdnew->get_lotto_reward_type();
        $data['numberFoo'] = json_encode($this->lottomdnew->getDeprive($this->label_arr,1,$this->lottoGroupNow));

		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content';
		$data['page_js_play'] = 'lottonew/js_play';
        $data['page_js'] = 'lottonew/js';

        $dd = $this->lottomdnew->get_lotto_member(1,$this->lottoGroupNow);
        $ds = array();

        foreach($dd as $key=>$data11) {
            $lotto_type = $this->lottomdnew->get_lotto_reward_type($data11->lotto_reward_type);
            $label = $this->label_arr[$lotto_type[0]->description]; 
            $arr = explode("_",$label);
            $price = $arr[2];
            $number = $data11->number;
            if($label[0]=='3') {
                if(intval($data11->number)<10){
                    $number = '00'.$number;
                }else if(intval($data11->number)<100) {
                    $number = '0'.$number;
                }else {
                    
                }
            }else if($label[0]=='2') {
                if(intval($data11->number)<10){
                    $number = '0'.$number;
                }
            }
            $ds[] = array(
            'deprive'=> false,
            'displayVal'=> $number,
            'id'=> $key,
            'numlabel'=> $label,
            'numtext'=> $lotto_type[0]->description,
            'price'=> ($data11->amount*$price),
            'unit'=> $data11->amount,
            );
        }
        $data['dataList'] = json_encode($ds);

        $data['rateReward'] = json_encode($this->lottomdnew->getRateReward());

		$this->load->view('layout/layout_title_new', $data, FALSE);
	} 

    function ajax_save($lotto_type=1) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        $dataList = $this->input->input_stream('dataList', true);
        $dataList = json_decode($dataList);

        //map data
        $rs_lotto_reward_type = $this->lottomdnew->get_lotto_reward_type();
        $map_lotto_reward_type = array();
        foreach($rs_lotto_reward_type as $key=>$data) {
            $map_lotto_reward_type[$data->description] = $data->id;
        }
        //end map data

        if (empty($dataList)) {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                 'dataList'=>$dataList,
                 'rs'=>array()
            );
        } else {
            //$this->lottomdnew->cls_lotto_member($lotto_type,$this->lottoGroupNow);
            $data_insert = array();
            $CutCreditWallet = 0 ;// ตัวเลขที่ต้องทำไปลบ Credit ใน wallet
            foreach($dataList as $key=>$data) {
                $data_insert[] = array(
                    'number'                                 => $data->displayVal,
                    'amount'                                 => $data->unit,
                    'member_id'                              => $this->member_id,
                    'lotto_type'                             => $lotto_type,
                    'lotto_group'                            => $this->lottoGroupNow,
                    'lotto_reward_type'                      => $map_lotto_reward_type[$data->numtext],
                    'date_time_add'                          => date("Y-m-d H:i:s")
                );
                $CutCreditWallet+=$data->unit;
            }
            $this->lottomdnew->save($data_insert);
            $rs = $this->lottomdnew->get_lotto_member($lotto_type,$lotto_group);

            $this->lottomdnew->updateWallet($CutCreditWallet);// Update Wallet 
            //tb_member_wallet

            $response = array(
                'status' => 'success',
                'message'=> 'บันทึกเสร็จสิ้น',
                'dataList'=>$dataList,
                'rs'=>$rs
            );
        }
        echo json_encode($response);
    }

    function cls($lotto_type=1) {
        header('Content-Type: application/json');
        $rs = $this->lottomdnew->cls_lotto_member($lotto_type,$this->lottoGroupNow);
        if(!empty($rs)) {
            $response = array(
                'status' => 'success',
                'message'=> 'ล้างรายการเสร็จสิ้น',
            );
        }else {
            $response = array(
                'status' => 'error',
                'message'=> 'พบข้อผิดพลาด!',
           );
        }
        echo json_encode($response);
    }

    public function index2($date='') {
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

        $data['lottoGroupNow'] = $this->lottoGroupNow;
        if($date!='') {
            $data['lottoGroupNow'] = $date;
        }
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;
        $data['Lotto_resultLastSuccess'] = $this->Lotto_resultLastSuccess;

        $data['memberList'] = $this->lottomdnew->getLottoWinner(1,$data['lottoGroupNow']);

        $data['lotto_reward_type'] = $this->lottomdnew->get_lotto_reward_type();
		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content_index2';
		$data['page_js'] = 'lottonew/js';

		$this->load->view('layout/layout_title_new', $data, FALSE);
    }

    
    public function get($table='tb_lotto_member_log',$b=false) {
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
        $rs = array();
        if(!$b) {
            $rs = $this->dbb->query("SELECT * FROM $table")->result();
        }else {
            $rs = $this->dbf->query("SELECT * FROM $table")->result();
        }
        die('<pre>'.print_r($rs).'</pre>');
    }
    public function trunt($table='tb_lotto_member_log') {
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
        $rs = $this->dbb->truncate($table);
    }
    public function create(){
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
        
        //$rs = $this->dbb->query("drop table tb_game_points");

        //$rs = $this->dbb->query("CREATE TABLE IF NOT EXISTS tb_lotto_winner ( id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, member_id INT(11) NULL DEFAULT NULL, number varchar(255), amount int(11) NOT NULL, reward decimal(11,2), price decimal(11,2), lotto_type int(11) NOT NULL, lotto_reward_type int(11) NOT NULL, lotto_group date, process_time datetime, member_log int(11) NOT NULL )");
        //$rs = $this->dbb->query("CREATE TABLE `tb_game_points` ( `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'id', `datetime` datetime NOT NULL COMMENT 'วันเวลา', `point` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'แต้ม', `type` varchar(10) NOT NULL DEFAULT 'credit' COMMENT 'ชนิด credit, debit', `chanel` int(1) NOT NULL DEFAULT 1 COMMENT 'ประเภท 1 : แต้มจากเกม หรื่อ หรือได้จาก แหล่งอื่นๆ, 2 : login', `status` int(1) NOT NULL DEFAULT 1 COMMENT 'สถานะ 1 : ปกติ , 0 : hold', `member_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งาน หรือ ลูกค้า' )");
        $rs = $this->dbb->query("CREATE TABLE `tb_bonus_rate` ( `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY COMMENT 'id', `day_count` int(11) DEFAULT 1 COMMENT 'วันเวลา', `point_bonus` decimal(11,2) NOT NULL DEFAULT 0.00 COMMENT 'แต้ม') ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='config การแจกเต้ม'");
        die('<pre>'.print_r($rs).'</pre>');
    }
    
    public function depriveinsert() {
        return;
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
        $arr = array(
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'05','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'09','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'12','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'14','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'15','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'17','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'19','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'24','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'25','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'26','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'27','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'28','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'29','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'31','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'38','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'39','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'41','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'42','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'47','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>5,'number'=>'49','reward'=>2.0,'lotto_group'=>'2021-07-16'),

            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'05','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'07','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'09','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'12','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'13','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'14','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'15','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'17','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'19','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'20','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'21','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'22','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'23','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'24','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'25','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'26','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'27','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'28','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'29','reward'=>2.0,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>6,'number'=>'31','reward'=>2.0,'lotto_group'=>'2021-07-16'),


            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'005','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'011','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'013','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'038','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'050','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'051','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'059','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'079','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'094','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'095','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'097','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'101','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'110','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'113','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'115','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'119','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'131','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'147','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'150','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>1,'number'=>'151','reward'=>2.5,'lotto_group'=>'2021-07-16'),


            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'013','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'015','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'031','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'034','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'038','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'039','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'043','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'045','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'051','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'054','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'057','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'058','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'059','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'075','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'079','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'083','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'085','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'093','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'095','reward'=>2.5,'lotto_group'=>'2021-07-16'),
            array('lotto_type'=>1,'lotto_reward_type'=>2,'number'=>'097','reward'=>2.5,'lotto_group'=>'2021-07-16'),
        );
        $rs = $this->dbb->insert_batch('tb_lotto_deprive',$arr);
        die('<pre>'.print_r($rs).'</pre>');
        /*
            {'numlabel':'2_up',
                'numtext':'2 ตัวบน',
                 'num': ['05_60','09_45','13_60','14_60','15_60','17_60','19_60','24_60','25_60','26_60','27_60','28_60','29_60','31_60','38_60','39_60','41_60','42_60','47_60','49_60']
               },
               {'numlabel':'2_under',
                'numtext':'2 ตัวล่าง',
                 'num': ['05_60','07_60','09_45','12_60','13_60','14_60','15_60','17_60','19_60','20_60','21_60','22_60','23_60','24_60','25_60','26_60','27_60','28_60','29_60','31_60']
               },
               {'numlabel':'3_up',
                'numtext':'3 ตัวบน',
                 'num': ['005_200','011_450','013_450','038_450','050_450','051_450','059_450','079_450','094_450','095_450','097_450','101_450','110_450','113_450','115_450','119_450','131_450','147_450','150_450','151_450']
               },
               {'numlabel':'3_inverse',
                'numtext':'3 ตัวโต๊ด',
                 'num': ['013_120','015_120','031_120','034_120','038_120','039_120','043_120','045_120','051_120','054_120','057_120','058_120','059_120','075_120','079_120','083_120','085_120','093_120','095_120','097_120']
               },
        ]
        */
    }
    /*
    public function update() {
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
        $rs = $this->dbb->query("update tb_lotto_reward_type set description='3 ตัวบน' where name='3tong'");
        $rs = $this->dbb->query("update tb_lotto_reward_type set description='3 ตัวโต๊ด' where name='3tod'");
        die('<pre>'.print_r($rs).'</pre>');
    }
    */
    public function insert() {
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();

        //$rs = $this->dbb->query("INSERT INTO `tb_lotto_set_number` (`id`, `member_id`, `name`, `lotto_type`, `date_time_add`, `status`) VALUES (NULL, '1', 'ชุด 1', '1', '2021-07-22 11:31:54.000000', '1'), (NULL, '1', 'ชุด 2', '1', '2021-07-22 11:31:54.000000', '1');"); 
        //$rs = $this->dbb->query("INSERT INTO `tb_lotto_set_numberlist` (`id`, `set_id`, `lotto_reward_type`, `number`) VALUES (NULL, '1', '1', '524'), (NULL, '1', '5', '22');");
        // $rs = $this->dbb->query("INSERT INTO `tb_lotto_result` (`id`, `special`, `four_tong`, `three_tong`, `three_front`, `three_back`, `two_down`, `lotto_type`, `date_time_closed`) VALUES (NULL, '556725', '0000', '725', '058,174', '233,927', '70', '1', '2021-07-16 14:57:28.000000');");
        //$rs = $this->dbb->query("INSERT INTO `tb_lotto_member_log` (`id`, `member_id`, `lotto_reward_type`, `lotto_type`, `number`, `amount`, `lotto_group`, `date_time_add`) VALUES (NULL, '1', '6', '1', '70', '1', '2021-07-16', '2021-07-22 05:08:49.000000');");
        //$rs = $this->dbb->query("UPDATE `tb_lotto_result` SET `date_time_closed` = '2021-07-16 14:57:28' WHERE `tb_lotto_result`.`id` = 2;");
        //$rs = $this->dbb->query("UPDATE `tb_lotto_result` SET `date_time_closed` = '2021-07-16 14:57:28' WHERE `tb_lotto_result`.`id` = 2;");
        //$rs = $this->dbb->query("$this->dbb->query("delete from tb_lotto_member_log where number = '70'"); 
        //$rs = $this->dbb->query("INSERT INTO `tb_lotto_date` (`id`, `date_closed`,  `lotto_type`,  `status`) VALUES (NULL, '2021-01-17', '1', '1'), (NULL, '2021-02-01', '1', '1'), (NULL, '2021-02-16', '1', '1'), (NULL, '2021-03-01', '1', '1'), (NULL, '2021-03-16', '1', '1'), (NULL, '2021-04-01', '1', '1'), (NULL, '2021-04-16', '1', '1'), (NULL, '2021-05-02', '1', '1'), (NULL, '2021-05-16', '1', '1'), (NULL, '2021-06-01', '1', '1'), (NULL, '2021-06-16', '1', '1'), (NULL, '2021-07-01', '1', '1'), (NULL, '2021-07-16', '1', '1'), (NULL, '2021-08-01', '1', '1'), (NULL, '2021-08-16', '1', '1'), (NULL, '2021-09-01', '1', '1'), (NULL, '2021-09-16', '1', '1'), (NULL, '2021-10-01', '1', '1'), (NULL, '2021-10-16', '1', '1'), (NULL, '2021-11-01', '1', '1'), (NULL, '2021-11-16', '1', '1'), (NULL, '2021-12-01', '1', '1'), (NULL, '2021-12-16', '1', '1');");
        //$rs = $this->dbb->query("delete from tb_lotto_set_numberlist where set_id=8");
        //$rs = $this->dbb->query("ALTER TABLE `tb_lotto_date` DROP `member_id_add`, DROP `date_time_add`");
        //$this->dbb->query("ALTER TABLE `tb_lotto_date` CHANGE `date_time_closed` `date_closed` DATETIME NULL DEFAULT NULL; ALTER TABLE `tb_lotto_date` CHANGE `member_id` `member_id_add` INT(11) NULL DEFAULT NULL;ALTER TABLE `tb_lotto_date` CHANGE `date_closed` `date_closed` DATE NULL DEFAULT NULL;");
       // $rs = $this->dbb->query("CREATE TABLE IF NOT EXISTS tb_lotto_date ( id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, date_closed date, lotto_type int(11) NOT NULL, status int(2) DEFAULT 1 );");
       //$rs = $this->dbb->query("delete from tb_lotto_result where DATE(date_time_closed)='2021-08-01'");
       //$rs = $this->dbb->query("update tb_lotto_member_log set lotto_group='2021-08-01' ");
       //$rs = $this->dbb->query("CREATE TABLE IF NOT EXISTS tb_lotto_winner ( id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, member_id INT(11) NULL DEFAULT NULL, member_name varchar(255), number varchar(255), name varchar(255), deprive varchar(10), description varchar(255), amount int(11) NOT NULL, reward decimal(11,2), price decimal(11,2), lotto_type int(11) NOT NULL, lotto_reward_type int(11) NOT NULL, lotto_group date, member_log int(11) NOT NULL, date_time_add datetime, process_time datetime )");
    /*
       $rs = $this->dbb->insert_batch('tb_bonus_rate',array(
           array('day_count'=>1,'point_bonus'=>1),
           array('day_count'=>2,'point_bonus'=>1),
           array('day_count'=>3,'point_bonus'=>2),
           array('day_count'=>4,'point_bonus'=>2),
           array('day_count'=>5,'point_bonus'=>2),
           array('day_count'=>6,'point_bonus'=>2),
           array('day_count'=>7,'point_bonus'=>3),
           array('day_count'=>8,'point_bonus'=>3),
           array('day_count'=>9,'point_bonus'=>3),
           array('day_count'=>10,'point_bonus'=>3),
           array('day_count'=>11,'point_bonus'=>3),
           array('day_count'=>12,'point_bonus'=>3),
           array('day_count'=>13,'point_bonus'=>3),
           array('day_count'=>14,'point_bonus'=>3),
           array('day_count'=>15,'point_bonus'=>4),
           array('day_count'=>16,'point_bonus'=>4),
           array('day_count'=>17,'point_bonus'=>4),
           array('day_count'=>18,'point_bonus'=>4),
           array('day_count'=>19,'point_bonus'=>4),
           array('day_count'=>20,'point_bonus'=>4),
           array('day_count'=>21,'point_bonus'=>4),
           array('day_count'=>22,'point_bonus'=>4),
           array('day_count'=>23,'point_bonus'=>4),
           array('day_count'=>24,'point_bonus'=>4),
           array('day_count'=>25,'point_bonus'=>4),
           array('day_count'=>26,'point_bonus'=>4),
           array('day_count'=>27,'point_bonus'=>4),
           array('day_count'=>28,'point_bonus'=>4),
           array('day_count'=>29,'point_bonus'=>4),
           array('day_count'=>30,'point_bonus'=>5),
       ));
       */
       /*
      $rs = $this->dbb->insert_batch('tb_game_points',array(
        array(
            'datetime' => '2021-08-17 15:52:02',
            'point' => 1.00,
            'type' => 'debit',
            'chanel' => 2,
            'status' => 1,
            'member_id' => 1,
        ),
        array(
            'datetime' => '2021-08-16 15:52:02',
            'point' => 1.00,
            'type' => 'debit',
            'chanel' => 2,
            'status' => 1,
            'member_id' => 1,
        ),
        array(
            'datetime' => '2021-08-13 15:52:02',
            'point' => 1.00,
            'type' => 'debit',
            'chanel' => 2,
            'status' => 1,
            'member_id' => 1,
        ),
    ));
    */
    
        $rs = $this->dbb->query("delete from tb_game_points where type='credit'");
       die('<pre>'.print_r($rs).'</pre>');
    }

    public function getLotto_result() {
        $rs = $this->lottomdnew->getLotto_result();
        return $rs;
    }
    public function getLotto_resultSuccess($lotto_type=1,$date='') {
        $rs = $this->lottomdnew->getLotto_resultSuccess($lotto_type,$date);
        return $rs;
    }
    public function getLotto_resultLastSuccess() {
        $rs = $this->lottomdnew->getLotto_resultLastSuccess();
        return $rs;
    }
    public function getSuccessMemberLogResult($lotto_type=1,$date='') {
        $rs = $this->lottomdnew->getSuccessMemberLogResult($lotto_type,$date);
        return $rs;
    }
    public function getHistBill() {
        $rs = $this->lottomdnew->getHistBill(1);
        return $rs;
    }
    public function histMyNumber() {
        $rs = $this->lottomdnew->histMyNumber(1);
        return $rs;
    }
    
    public function setMainNumber()
	{
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
        
        $data['lottoGroupNow'] = $this->lottoGroupNow;
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;

        $data['mode'] = 'list'; //add list edit
        $data['histBill'] = $this->getHistBill();

        $data['histMyNumber'] = $this->lottomdnew->histMyNumber(1);
        $data['histMyNumberList'] = array();

        $data['label_arr'] = $this->label_arr;

        $data['lotto_reward_type'] = $this->lottomdnew->get_lotto_reward_type();
        $data['numberFoo'] = json_encode(array());

		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content_setmainnumber';
		//$data['page_js_play'] = 'lottonew/js_playsetnumber';
        $data['page_js'] = 'lottonew/js';

        $data['dataList'] = json_encode(array());

        $data['rateReward'] = json_encode($this->lottomdnew->getRateReward());

		$this->load->view('layout/layout_title_new', $data, FALSE);
	} 

    public function setNumber($set_id='')
	{
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
        
        $data['lottoGroupNow'] = $this->lottoGroupNow;
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;

        $data['mode'] = 'add'; //add list edit
        $data['histBill'] = $this->getHistBill();

        if($set_id=='') {
            $data['histMyNumber'] = array();
            $data['histMyNumberList'] = array();
        }else {
            $data['histMyNumber'] = $this->lottomdnew->histMyNumber(1,$set_id);
            $data['histMyNumberList'] = $this->lottomdnew->histMyNumberList($set_id);
            $data['mode'] = 'edit';
        }

        $data['label_arr'] = $this->label_arr;

        $data['lotto_reward_type'] = $this->lottomdnew->get_lotto_reward_type();
        $data['numberFoo'] = json_encode(array());

		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content_setnumber';
		$data['page_js_play'] = 'lottonew/js_playsetnumber';
        $data['page_js'] = 'lottonew/js';

        $dd = $data['histMyNumberList'];
        $ds = array();

        foreach($dd as $key=>$data11) {
            $lotto_type = $this->lottomdnew->get_lotto_reward_type($data11['lotto_reward_type']);
            $label = $this->label_arr[$lotto_type[0]->description]; 
            $arr = explode("_",$label);
            $price = $arr[2];
            $number = $data11['number'];

            $ds[] = array(
            'deprive'=> false,
            'displayVal'=> $number,
            'id'=> $key,
            'numlabel'=> $label,
            'numtext'=> $lotto_type[0]->description,
            'price'=> 0,
            'unit'=> $data11['amount'],
            );
        }
        $data['dataList'] = json_encode($ds);

        $data['rateReward'] = json_encode($this->lottomdnew->getRateReward());

		$this->load->view('layout/layout_title_new', $data, FALSE);
	} 
    public function ajax_setnum_save($lotto_type=1) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        $name = $this->input->input_stream('nameSet', true);
        $dataList = $this->input->input_stream('dataList', true);
        $set_id = $this->input->input_stream('set_id', true);
        $dataList = json_decode($dataList);

        //map data
        $rs_lotto_reward_type = $this->lottomdnew->get_lotto_reward_type();
        $map_lotto_reward_type = array();
        foreach($rs_lotto_reward_type as $key=>$data) {
            $map_lotto_reward_type[$data->description] = $data->id;
        }
        //end map data

        if (empty($dataList)) {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                 'dataList'=>$dataList,
                 'rs_head'=>array(),
                 'rs_list'=>array()
            );
        } else {
            $data_sethead = array();
            if($set_id=='') {
                $set_id = $this->lottomdnew->save_set_number(array(
                    'name'=>$name,
                    'member_id'=> $this->member_id,
                    'lotto_type'=> $lotto_type,
                    'date_time_add' => date("Y-m-d H:i:s")
                ));
            }else {
                $this->lottomdnew->cls_lotto_setnumber_member($set_id);
                $this->lottomdnew->update_set_number(array('name'=>$name),$set_id); 
            }

            $data_insert = array();
            foreach($dataList as $key=>$data) {
                $data_insert[] = array(
                    'set_id'                                 => $set_id,
                    'number'                                 => $data->displayVal,
                    'lotto_reward_type'                      => $map_lotto_reward_type[$data->numtext],
                );
            }
            $this->lottomdnew->save_set_numberList($data_insert);
            $rs_head = $this->lottomdnew->histMyNumber($set_id);
            $rs_list = $this->lottomdnew->histMyNumberList($set_id);

            $response = array(
                'status' => 'success',
                'message'=> 'บันทึกเสร็จสิ้น',
                'dataList'=>$dataList,
                'rs_head'=>$rs_head,
                'rs_list'=>$rs_list,
                'set_id'=>$set_id
            );
        }
        echo json_encode($response);
    }
    public function ajax_setnum_delete($set_id) {
        header('Content-Type: application/json');
        $rs = $this->lottomdnew->dlt_lotto_setnumber_member($set_id);
        if(!empty($rs)) {
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
        echo json_encode($response);
    }
    public function cls_listsetnum($set_id) {
        header('Content-Type: application/json');
        $rs = $this->lottomdnew->cls_lotto_setnumber_member($set_id);
        if(!empty($rs)) {
            $response = array(
                'status' => 'success',
                'message'=> 'ล้างรายการเสร็จสิ้น',
            );
        }else {
            $response = array(
                'status' => 'error',
                'message'=> 'พบข้อผิดพลาด!',
           );
        }
        echo json_encode($response);
    }

    public function deprive($date='') {
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
        
        $data['lottoGroupNow'] = $this->lottoGroupNow;
        if($date=='') {
            $date = $this->lottoGroupNow;
            redirect('lottonew/deprive/'.$date,'refresh');
        }
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;

		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content_deprive';
		//$data['page_js_play'] = 'lottonew/js_playsetnumber';
        $data['page_js'] = 'lottonew/js';

        $data['date_result'] = $this->lottomdnew->getDate_result();
        $data['label_arr'] = $this->label_arr;
        $data['dataList'] = $this->lottomdnew->getDepriveAll($this->label_arr,1,$date);

		$this->load->view('layout/layout_title_new', $data, FALSE);
    }
    function ajax_insertDeprive($lotto_type=1) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        $lotto_type = $this->input->input_stream('lotto_type', true);
        $lotto_reward_type = $this->input->input_stream('lotto_reward_type', true);
        $number = $this->input->input_stream('number', true);
        $reward = $this->input->input_stream('reward', true);
        $lotto_group = $this->input->input_stream('lotto_group', true);

        if ($lotto_type=='' || $lotto_reward_type=='' || $number=='' || $lotto_group=='') {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                 'id'=>''
            );
        } else {
            $rs = $this->lottomdnew->get_lotto_reward_type($lotto_reward_type);
            $unit = $rs[0]->description[0];
            if($rs[0]->description[0]!='3' && $rs[0]->description[0]!='2') {
                $unit = 1;
            }
            $number = substr($number,0,$unit);
            if($unit-strlen(intval($number))>0) {
                $numloop = $unit-strlen(intval($number));
                $number = intval($number);
                for($i=0;$i<$numloop;$i++) {
                    $number = '0'.$number;
                }
            }
            
            $data_insert = array(
                    'lotto_type'                              => $lotto_type,
                    'lotto_reward_type'                       => $lotto_reward_type,
                    'number'                                  => $number,
                    'reward'                                  => $reward,
                    'lotto_group'                            => $lotto_group,
            );
            $id = $this->lottomdnew->insertDeprive($data_insert);

            $response = array(
                'status' => 'success',
                'message'=> 'บันทึกเสร็จสิ้น',
                'id'=>$id
            );
        }
        echo json_encode($response);
    }
    function ajax_updateDeprive($id=0) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        $lotto_type = $this->input->input_stream('lotto_type', true);
        $lotto_reward_type = $this->input->input_stream('lotto_reward_type', true);
        $number = $this->input->input_stream('number', true);
        $reward = $this->input->input_stream('reward', true);
        $lotto_group = $this->input->input_stream('lotto_group', true);

        if ($lotto_type=='' || $lotto_reward_type=='' || $number=='' || $lotto_group=='') {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                 'id'=>''
            );
        } else {
            $rs = $this->lottomdnew->get_lotto_reward_type($lotto_reward_type);
            $unit = $rs[0]->description[0];
            if($rs[0]->description[0]!='3' && $rs[0]->description[0]!='2') {
                $unit = 1;
            }
            $number = substr($number,0,$unit);
            if($unit-strlen(intval($number))>0) {
                $numloop = $unit-strlen(intval($number));
                $number = intval($number);
                for($i=0;$i<$numloop;$i++) {
                    $number = '0'.$number;
                }
            }

            $data_update = array(
                    'lotto_type'                              => $lotto_type,
                    'lotto_reward_type'                       => $lotto_reward_type,
                    'number'                                  => $number,
                    'reward'                                  => $reward,
                    'lotto_group'                            => $lotto_group,
            );
            $rs = $this->lottomdnew->updateDeprive($data_update,$id);

            $response = array(
                'status' => 'success',
                'message'=> 'บันทึกเสร็จสิ้น',
                'id'=>$rs
            );
        }
        echo json_encode($response);
    }
    function ajax_deleteDeprive($id=0) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        if ($id=='') {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ล้มเหลว!',
                 'id'=>''
            );
        } else {
            $rs = $this->lottomdnew->deleteDeprive($id);

            $response = array(
                'status' => 'success',
                'message'=> 'ลบเสร็จสิ้น',
                'id'=>$rs
            );
        }
        echo json_encode($response);
    }


    public function lotto_date() {
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
        
        $data['lottoGroupNow'] = $this->lottoGroupNow;
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;

		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content_lotto_date';
		//$data['page_js_play'] = 'lottonew/js_playsetnumber';
        $data['page_js'] = 'lottonew/js';

        $data['dataList'] = $this->lottomdnew->getLottoDateAll();

		$this->load->view('layout/layout_title_new', $data, FALSE);
    }
    function ajax_insertLottodate($lotto_type=1) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        $date_closed = $this->input->input_stream('date_closed', true);
        $lotto_type = $this->input->input_stream('lotto_type', true);

        if ($date_closed=='' || $lotto_type=='') {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                 'id'=>''
            );
        } else {
            $data_closed = (substr($data_closed,6,4)-543).'-'.substr($data_closed,3,2).'-'.substr($data_closed,0,2);
            $data_insert = array(
                    'date_closed'                              => $date_closed,
                    'lotto_type'                               => $lotto_type,
            );
            $id = $this->lottomdnew->insertLottodate($data_insert);
            //$id = $data_insert;

            $response = array(
                'status' => 'success',
                'message'=> 'บันทึกเสร็จสิ้น',
                'id'=>$id
            );
        }
        echo json_encode($response);
    }
    function ajax_updateLottodate($id=0) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        $date_closed = $this->input->input_stream('date_closed', true);
        $lotto_type = $this->input->input_stream('lotto_type', true);

        if ($date_closed=='' || $lotto_type=='') {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง',
                 'id'=>''
            );
        } else {
            $data_closed = (substr($data_closed,6,4)-543).'-'.substr($data_closed,3,2).'-'.substr($data_closed,0,2);
            $data_update = array(
                    'date_closed'                              => $date_closed,
                    'lotto_type'                               => $lotto_type,
            );
            $rs = $this->lottomdnew->updateLottodate($data_update,$id);
            //$rs = $data_update;
            $response = array(
                'status' => 'success',
                'message'=> 'บันทึกเสร็จสิ้น',
                'id'=>$rs
            );
        }
        echo json_encode($response);
    }
    function ajax_deleteLottodate($id=0) {
        $this->load->helper('security');
        header('Content-Type: application/json');

        if ($id=='') {
             $response = array(
                 'status' => 'error',
                 'message'=> 'ล้มเหลว!',
                 'id'=>''
            );
        } else {
            $rs = $this->lottomdnew->deleteLottodate($id);

            $response = array(
                'status' => 'success',
                'message'=> 'ลบเสร็จสิ้น',
                'id'=>$rs
            );
        }
        echo json_encode($response);
    }

    public function process_result() {
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
        
        $data['lottoGroupNow'] = $this->lottoGroupNow;
        $data['LottoResultSuccess'] = $this->LottoResultSuccess;

		$data['page_header'] = 'lottonew/header';
		$data['page_content'] = 'lottonew/content_process_index';
		//$data['page_js_play'] = 'lottonew/js_playsetnumber';
        $data['page_js'] = 'lottonew/js';

        $data['date_result'] = $this->lottomdnew->getDate_result();
        $data['dataList'] = $this->lottomdnew->getLottoWinnerAll();
        //die(print_r($data['dataList']));

		$this->load->view('layout/layout_title_new', $data, FALSE);
    }

    function process_winner() {
        $this->load->helper('security');
        header('Content-Type: application/json');

        $lotto_type = $this->input->input_stream('lotto_type', true);
        $lotto_group =  $this->input->input_stream('lotto_group', true);
        $special = $this->input->input_stream('special', true);
        $three_front = $this->input->input_stream('three_front', true);
        $three_back = $this->input->input_stream('three_back', true);
        $two_down = $this->input->input_stream('two_down', true);
        $date_time_closed = $this->input->input_stream('date_time_closed', true);

        $chk = $this->getLotto_resultSuccess($lotto_type,$lotto_group); //ดึงงวดล่าสุดในตารางประกาศผล ใช่งวด ปัจจุบันหรือไม่?
        //die( $chk);
        //$chk = 0;
        if ($chk || $lotto_type=='' || $lotto_group=='' || $special=='' || $three_front=='' || $three_back=='' || $two_down=='' || $date_time_closed=='') {
            $response = array(
                 'status' => 'error',
                 'message'=> 'ข้อมูลไม่ถูกต้อง หรือ งวดที่เลือกมีการประมวลผลไปแล้ว',
                 'id'=>''
            );
        } else {
            //$data_closed = (substr($data_closed,6,4)-543).'-'.substr($data_closed,3,2).'-'.substr($data_closed,0,2);
            //$lotto_group = (substr($lotto_group,6,4)-543).'-'.substr($lotto_group,3,2).'-'.substr($lotto_group,0,2);
            $data_insert = array(
                    'special'                              => substr($special,0,6),
                    'four_tong'                             => '0000',
                    'three_tong'                             => substr($special,3,3),
                    'three_front'                              => substr($three_front,0,7),
                    'three_back'                              => substr($three_back,0,7),
                    'three_back'                              => substr($three_back,0,7),
                    'two_down'                               => substr($two_down,0,7),
                    'date_time_closed'                      => $lotto_group.' '.$date_time_closed.":00",
                    'lotto_type'                            =>$lotto_type
            );
            $id = $this->lottomdnew->insertLottoResult($data_insert);
            $processList = $this->getSuccessMemberLogResult($lotto_type,$lotto_group);
            //$id = $data_insert;

            $response = array(
                'status' => 'success',
                'message'=> 'ประมวลผลเสร็จสิ้น',
                'id'=>$id,
                'rs'=>$data_insert,
                'processList'=>$processList,
                'chk'=>$chk
            );
        }
        echo json_encode($response);
    }

}

/* End of file PlayGame.php */
/* Location: ./application/controllers/PlayGame.php */