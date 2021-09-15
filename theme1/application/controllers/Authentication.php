<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->site_key   = "6LfJ9EgbAAAAAFHxUTND5ObNvxRfI4axeNiwXSBE";
        $this->secret_key = "6LfJ9EgbAAAAAFlMQejyEoFJRt8m0VMB50Qg43AC";
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    public function login()
    {

        $this->load->model('process/Member_model', 'member_md');

        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $close_login    = $web_config->close_login;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['close_login']    = $close_login;
        $data['text_register']  = $text_register;

        $data['site_key']   = $this->site_key;
        $data['secret_key'] = $this->secret_key;

        is_allow_browser();
        $this->load->view('pages/login/content', $data, false);
    }
    public function googleCaptachStore()
    {

    }

    public function logout()
    {
        $this->session->unset_userdata('usess');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    public function register($url_ref = null)
    {
        is_register();
        
        require 'vendor/Mobile_Detect.php';
        $this->detect = new Mobile_Detect;
        $this->load->model('process/Member_model', 'member_md');

        $domainname = $_SERVER['SERVER_NAME'];
        $domain_nohttp = str_replace('https://','',$domainname);
        $domain_nohttp = str_replace('http://','',$domain_nohttp);

        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $close_login    = $web_config->close_login;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords; 
        $this->sess_delete_after_browser_close = true;
        $url_ref = str_replace('?tag=','',$url_ref);
        $url_ref = str_replace('?url=','',$url_ref);
        if ($url_ref != null) {

            $data_ref['ref_site'] = $url_ref;
            $this->session->set_userdata($data_ref);
        
            redirect('https://'.$domain_nohttp.'/register', 'refresh');
        }
        else {
            $url_domain_ref = trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST));
            $path_ref = trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH));
            $full_ref = parse_url($_SERVER['HTTP_REFERER']);
            $home_page_url = str_replace("wallet.","",$domain_nohttp);
            if (trim($url_domain_ref) != trim($domain_nohttp) && trim($url_domain_ref) != trim($home_page_url)) {
                $url_ref = $url_domain_ref;
            }
            else {
                $url_ref = trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH));
                if ($url_ref == "/") {
                    $url_ref = "homepage";
                }
                else {
                    $url_ref = str_replace("/","",$url_ref);
                    $pos_aff_check = substr($url_ref,0,3);
                    if ($pos_aff_check == 'aff') {
                        $url_ref = 'affiliate';
                    }
                }
            }
           
        }
        // $not_support = array("[FB_IAB", "Line", "[FBAN");
        // if (in_array($agent[0], $not_support)) {

        //     if ($this->detect->isAndroidOS()) {
        //         redirect('googlechrome://'.$domain_nohttp.'/register', 'refresh');
        //         exit();
        //     }

        //     if ($this->detect->isiOS()) {
        //         redirect('googlechrome://'.$domain_nohttp.'/register', 'refresh');
        //         exit();
        //     }
        // }
     
        $data['referer_site'] = strtolower(trim(($this->session->userdata('ref_site') == "" || $this->session->userdata('ref_site') == null) ? $url_ref : $this->session->userdata('ref_site')));
        // $data['referer_site'] =  $agent[0];
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['close_login']    = $close_login;
        $data['text_register']  = $text_register;

        $data['site_key']   = $this->site_key;
        $data['secret_key'] = $this->secret_key;

        is_allow_browser();
        $data['page_js'] = 'register/js';
        $this->load->view('layout/master_register', $data, false);
    }

    public function aff_encode($id)
    {
        $id_str = (string) $id;
        // $offset = rand(0, 9);
        $offset  = 9;
        $encoded = chr(79 + $offset);
        for ($i = 0, $len = strlen($id_str); $i < $len; ++$i) {
            $encoded .= chr(65 + $id_str[$i] + $offset);
        }
        return $encoded;
    }

    public function aff_decode($encoded)
    {
        $offset  = ord($encoded[0]) - 79;
        $encoded = substr($encoded, 1);
        for ($i = 0, $len = strlen($encoded); $i < $len; ++$i) {
            $encoded[$i] = ord($encoded[$i]) - $offset - 65;
        }
        return (int) $encoded;
    }
    public function aff($ref_id)
    {
        require 'vendor/Mobile_Detect.php';
        $this->detect = new Mobile_Detect;
        $this->load->model('process/Member_model', 'member_md');

        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;
        $aff_status  = $web_config->affiliate_status;
        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

        $data['site_key']   = $this->site_key;
        $data['secret_key'] = $this->secret_key;
        
        $domainname = $_SERVER['SERVER_NAME'];
        $domain_nohttp = str_replace('https://','',$domainname);
        $domain_nohttp = str_replace('http://','',$domain_nohttp);
        if (trim($ref_id) == "" || $aff_status == 0) {
            redirect('https://'.$domain_nohttp.'/register/', 'refresh');
            exit();
        }
  

        $not_support = array("[FB_IAB", "Line", "[FBAN");
        if (in_array($agent[0], $not_support)) {

            if ($this->detect->isAndroidOS()) {
                redirect('intent://'.$domain_nohttp.'/aff/' . $ref_id . '#Intent;scheme=http;package=com.android.chrome;end', 'refresh');
                exit();
            }

            if ($this->detect->isiOS()) {
                redirect('googlechrome://'.$domain_nohttp.'/aff/' . $ref_id, 'refresh');
                exit();
            }
        }
 
        // $ref_id = $this->aff_decode($ref_id); 
        $ref_id =  $this->member_md->find_aff_code($ref_id);
        if ($ref_id != null && trim($ref_id) != "" && $aff_status == 1) {
        
            $this->load->model('Aff_model');
            $this->Aff_model->count_up_ref_link($ref_id);

            $aff_click = array('referer_id' => $ref_id,
                'datetime'                      => date('Y-m-d H:i:s'));
            $this->Aff_model->aff_click($aff_click);

            // $data                                  = array('ref_id' => $ref_id);
            $data['ref_id'] = $ref_id;
            // $this->session->sess_expiration        = '600';
            // $this->sess_delete_after_browser_close = true;
            // $this->session->set_userdata($data);
        } else {
            redirect('https://'.$domain_nohttp.'/register/', 'refresh');
            exit();
        }

   
        $arr    = explode(" ", $this->agent->agent);
        $lastEl = array_values(array_slice($arr, -1))[0];
        $agent  = explode("/", $lastEl);

        $data['referer_site'] = 'affiliate';
        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
        is_allow_browser();
        $data['page_js'] = 'register/js';
        $this->load->view('layout/master_register', $data, false);

    }

    public function forgotpassword()
    {
        is_allow_browser();
        $data['page_header']  = 'forgotpassword/header';
        $data['page_content'] = 'forgotpassword/content';
        $data['page_js']      = 'forgotpassword/js';
        $this->load->view('layout/master', $data, false);
    }

    public function ajax_login_main()
    {
        $this->load->helper('security');
        header('Content-Type: application/json');
        $this->load->model('process/Member_model', 'member_md');

        $phone_no = $this->input->input_stream('phone_number', true);
        $password = $this->input->input_stream('password', true);

        if (empty($phone_no) || empty($password)) {
            // $response = array('status' => 'error',
            //                   'message' => 'ข้อมูลไม่ครบถ้วน กรุณาใส่ข้อมูลให้ถูกต้อง');
        } else {
            $user_data = $this->member_md->chk_login($phone_no, $password);

            if (count($user_data) > 0) {
                if ($user_data->status != 2) {
                    $response = array('status' => 'error',
                        'message'                  => 'ไม่สามารถเข้าใช้งานระบบได้ เนื่องจากกระทำผิดกฏ หากมีข้อสงสัยกรุณาติดต่อเจ้าหน้าที่ ขอบคุณคะ');
                    echo json_encode($response);
                } else {
                    $array = array('usess' => $user_data);
                    $this->session->set_userdata($array);
                    $this->member_md->login_log($user_data->id);

                    $response = array('status' => 'success',
                        'message'                  => 'เรากำลังพาคุณเข้าสู่ระบบ กรุณารอสักครู่',
                        'member_id'                => $user_data->id);
                    echo json_encode($response);
                }
            } else {
                $response = array('status' => 'error',
                    'message'                  => 'เบอร์โทรศัพท์ หรือ รหัสผ่าน ไม่ถูกต้อง!!');
                echo json_encode($response);
            }
        }

        // echo json_encode($response);
    }

    public function ajax_login()
    {
        $this->load->helper('security');
        header('Content-Type: application/json');
        $this->load->model('process/Member_model', 'member_md');
        //print_r($this->input->input_stream);
        $phone_no = $this->input->input_stream('phone_number', true);
        $password = $this->input->input_stream('password', true);

        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

        $secret = $this->secret_key;

        $captcha = trim($this->input->post('g-recaptcha-response'));
        $userIp  = $this->input->ip_address();

        $url  = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secret, 'response' => $captcha);

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context = stream_context_create($options);
        $output  = file_get_contents($url, false, $context);

        $status_gg = json_decode($output, true);

        if (empty($phone_no) || empty($password)) {
        } else {
            if ($status_gg['success']) {
                $user_data = $this->member_md->chk_login($phone_no, $password);
                if (count($user_data) > 0) {
                    if ($user_data->status != 2) {
                        $response = array('status' => 'error',
                            'message'                  => 'ไม่สามารถเข้าใช้งานระบบได้<br>เนื่องจากกระทำผิดกฏ<br>หากมีข้อสงสัยกรุณาติดต่อเจ้าหน้าที่ ขอบคุณคะ');
                        echo json_encode($response);
                    } else {
                        if ($this->input->input_stream('remember_login') == 'remember') {
                            // $this->session->sess_expiration = 7200;
                        }

                        $array = array('usess' => $user_data);
                        $this->session->set_userdata($array);

                        $this->member_md->login_log($user_data->id);

                        $response = array('status' => 'success',
                            'message'                  => 'เรากำลังพาคุณเข้าสู่ระบบ กรุณารอสักครู่',
                            'member_id'                => $user_data->id);
                        echo json_encode($response);
                    }
                } else {
                    $response = array('status' => 'error',
                        'message'                  => 'เบอร์โทรศัพท์ หรือ รหัสผ่าน ไม่ถูกต้อง!!');
                    echo json_encode($response);

                }
            } else {
                $response = array('status' => 'error',
                    'message'                  => 'ไม่สามารถเข้าใช้งานระบบได้<br> Google Recaptcha ไม่ถูกต้อง');
                echo json_encode($response);
            }
        }

        // echo json_encode($response);
    }

    public function ajax_forgotpassword()
    {
        header('Content-Type: application/json');
        $this->load->model('process/Member_model', 'member_md');

        $phone_no = $this->input->input_stream('phone_number');

        if (empty($phone_no)) {
            // $response = array('status' => 'error',
            //     'message'                  => 'กรุณากรอกเบอร์มือถือ!');
            // echo json_encode($response);

            // $response = array('status' => '',
            //     'message'                  => '');
            // echo json_encode($response);
            exit();
        } else {
            $user_data = $this->member_md->chk_forgotpass($phone_no);
            if (count($user_data) > 0) {
                $this->_send_forgot_pass($phone_no);
                $response = array('status' => 'success',
                    'message'                  => 'ระบบได้ทำการส่งรหัสผ่านไปยังเบอร์มือถือของคุณเรียบร้อยแล้ว!');
                echo json_encode($response);
            } else {
                $response = array('status' => 'error',
                    'message'                  => 'ไม่พบข้อมูลในระบบ');
                echo json_encode($response);
            }
        }

        // echo json_encode($response);
    }

    public function ajax_register()
    {
        header('Content-Type: application/json');
        $phone_no            = $this->input->post('phone_number');
        $bank_account_number = $this->input->post('bank_account_number');
        $bank_id             = $this->input->post('bank_account_number');
        $response            = "";
        $recaptchaResponse   = trim($this->input->post('g-recaptcha-response'));

        $secret  = $this->secret_key;
        $captcha = trim($this->input->post('g-recaptcha-response'));
        $userIp  = $this->input->ip_address();

        $url  = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secret, 'response' => $captcha);

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context   = stream_context_create($options);
        $output    = file_get_contents($url, false, $context);
        $status_gg = json_decode($output, true);

        // if ($status_gg['success']) {
        if (!$this->input->input_stream()) {
            // echo $response;
            exit();
        } else {

            $this->_validate_register();

            header('Content-Type: application/json');
            $this->load->model('process/Member_model', 'member_md');

            if ($this->member_md->chk_dup_phoneno($this->input->input_stream('phone_number', true))) {
                if ($this->member_md->chk_dup_bank($bank_account_number, $bank_id)) {
                    $bank_data = $this->_checkbank($this->input->input_stream('bank_account_number', true), $this->input->input_stream('bank_id', true));

                    if ($bank_data['status'] == 'success') {
                        // เชคทุกอย่างไม่ซ้ำเรียบร้อยแล้ว

                        $regis_status = $this->member_md->register($this->input->input_stream());
                        if ($regis_status) {
                            $response = array('status' => 'success',
                                'message'                  => 'ลงทะเบียนสำเร็จ');
                            echo json_encode($response);

                        } else {
                            $response = array('status' => 'error',
                                'message'                  => 'มีบางอย่างผิดปกติ');
                            echo json_encode($response);
                        }

                    } else {
                        $response = array('status' => 'error',
                            'message'                  => 'ข้อมูลบัญชีธนาคารไม่ถูกต้อง กรุณาตรวจสอบข้อมูลอีกครั้ง');
                        echo json_encode($response);
                    }
                } else {
                    $response = array('status' => 'error',
                        'message'                  => 'ข้อมูลบัญชีธนาคารนี้เคยทำการลงทะเบียนไปแล้ว!');
                    echo json_encode($response);
                }
            } else {
                $response = array('status' => 'error',
                    'message'                  => 'เบอร์โทรศัพท์นี้เคยทำการลงทะเบียนไปแล้ว!');
                echo json_encode($response);
            }
        }
        // } else {
        //     $response = array('status' => 'error',
        //         'message'                  => 'ไม่สามารถเข้าใช้งานระบบได้<br> Google Recaptcha ไม่ถูกต้อง');
        //     echo json_encode($response);
        // }

    }

    public function ajax_send_otp()
    {
        header('Content-Type: application/json');
        $phone_number = $this->input->input_stream('phone_number', true);
        $this->load->model('process/Member_model', 'member_md');

        if (empty($phone_number) || !is_numeric($phone_number) || strlen($phone_number) < 10) {
            $response['status']  = 'error';
            $response['message'] = 'เบอร์มือถือไม่ถูกต้อง กรุณาตรวจสอบใหม่อีกครั้ง';
        } else {
            if ($this->member_md->chk_dup_phoneno($phone_number)) {
                $data                = $this->_send_otp($phone_number);

                if ($data['result'] == 1) {
                    $response['status']  = 'success';
                $response['message'] = "เราได้ทำการส่ง OTP ไปยังหมายเลข {$phone_number} เรียบร้อยแล้ว";
                $response['data']    = $data;
                $response['result']  = $data['result'];
                }
                else {
                    $response['status']  = 'error';
                    $response['message'] = 'พบปัญหาการส่ง SMS กรุณาลองใหม่ภายหลัง';
                }
               
              
            } else {
                $response['status']  = 'error';
                $response['message'] = 'เบอร์มือถือนี้ได้ถูกใช้ลงทะเบียนแล้ว';
            }
        }

        echo json_encode($response);
    }
    public function ajax_check_dup_bank()
    {
        header('Content-Type: application/json');
        $this->load->model('process/Member_model', 'member_md');
        $bank_account_number = $this->input->input_stream('bank_account_number', true);
        $bank_id             = $this->input->input_stream('bank_id', true);
        $idf = $this->input->input_stream('idf', true);


        // add check dup idf
        if ($this->member_md->chk_dup_idf($idf)) {
          
        // check dup bank
        if (empty($bank_account_number) || !is_numeric($bank_account_number) || strlen($bank_account_number) < 10) {
            $response['status']  = 'error';
            $response['message'] = 'เลขบัญชีไม่ถูกต้อง กรุณาตรวจสอบใหม่อีกครั้ง';
        } else {

            if ($this->member_md->chk_dup_bank($bank_account_number, $bank_id)) {
                $response['status']  = 'success';
                $response['message'] = 'ดำเนินการต่อ';
            } else {
                $response['status']  = 'error';
                $response['message'] = 'เลขบัญชีนี้ได้ถูกใช้ลงทะเบียนแล้ว';
            }
        }
        
        }
        else {
            $response['status']  = 'error';
            $response['message'] = 'เลขบัตรนี้ได้ถูกใช้ลงทะเบียนแล้ว';
        }


        echo json_encode($response);
    }

    public function ajax_confirm_otp()
    {
        header('Content-Type: application/json');
        $this->load->model('process/Member_model', 'member_md');
        $phone_number = $this->input->input_stream('phone_number');
        $otp          = $this->input->input_stream('otp');

        $num_rows = $this->member_md->check_otp($phone_number, $otp);

        if ($num_rows > 0) {
            $response['status']  = 'success';
            $response['message'] = 'ยืนยันเบอร์มือถือสำเร็จ';
        } else {
            $response['status']  = 'error';
            $response['message'] = 'OTP ไม่ถูกต้องกรุณาตรวจสอบใหม่อีกครั้ง';
        }

        echo json_encode($response);
    }
    // private function _send_otp($mobile_number)
    // {
    //     $this->load->model('process/Member_model', 'member_md');
    //     $ROOT_PATH = FCPATH . '/'; 
    //     include $ROOT_PATH . 'vendor/thaibulksms/bulksms.class.php';
    //     $bulksms  = new bulksms;
    //     $otp_rand = mt_rand(100000, 999999);
    //     $ref_rand = strtoupper(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4));
 
    //     $phone       = '+66' . substr($mobile_number, 1, strlen($mobile_number));
    //     $unicode_msg = "รหัส OTP คือ {$otp_rand} \r\n REF : {$ref_rand}";
    //     $post_body   = $bulksms->unicode_sms($unicode_msg, $phone);
    //     $result      = $bulksms->send_message($post_body); 
     

    //     if ($result == 1) {
    //         $this->member_md->put_otp($mobile_number, $otp_rand, $ref_rand);
 
    //     }
       
    //     $response = array('result' =>  $result,
    //         'phone_number'             => $mobile_number,
    //         'ref'                      => $ref_rand.$result);

    //     return $response;
    // }
    // แก้ไข OTP SMS service
    private function _send_otp($mobile_number)
    {
        $this->load->model('process/Member_model', 'member_md');
     
        $otp_rand = mt_rand(100000, 999999);
        $ref_rand = strtoupper(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4));
        $phone       = '+66' . substr($mobile_number, 1, strlen($mobile_number));
        $unicode_msg = "รหัส OTP คือ {$otp_rand} \r\n REF : {$ref_rand}";

        // SMS MKT
        $result = $this->smsmkt($unicode_msg, $mobile_number,"psgame888","Mike1234"); // username, password

        // SMS BULKSMS
        // $result = $this->bulksms($unicode_msg, $mobile_number,"slot678","oros.16881688"); // username, password

        // SMS THSMS
        // $result = $this->thsms($unicode_msg, $mobile_number,"slotonline","3a69f6"); // username, password


       
        if ($result == 1) { // if return true
            $this->member_md->put_otp($mobile_number, $otp_rand, $ref_rand);
         
        }

        $response = array('result' => $result,
            'phone_number'             => $mobile_number,
            'ref'                      => $ref_rand);

        return $response;
    }


    private function thsms($msg,$phone,$username,$password) {
        $ROOT_PATH = FCPATH . '/'; 
        include $ROOT_PATH . 'vendor/thaibulksms/thsms.class.php';
        $thsms  = new thsms;
        $credit = $thsms->getCredit($username,$password);

        if ($credit > 0) {
        $result      = $thsms->send_message('0000',$phone,$msg,$username,$password); 
            return $result;
        }
        else {
            return false;
        }
            
    }

    private function bulksms($msg,$phone,$username,$password) {
        $ROOT_PATH = FCPATH . '/'; 
        include $ROOT_PATH . 'vendor/thaibulksms/bulksms.class.php'; 
        $bulksms         = new bulksms;

        $post_body   = $bulksms->unicode_sms($msg, $phone,$username,$password);
        $result      = $bulksms->send_message($post_body); 

        return $result ; // api return true,false
       
    }

    public function smsmkt_check($username,$password) {
        $Username	= $username; 	 			
        $Password	= $password; 	
        
        $Parameter	=	"User=$Username&Password=$Password";
        $API_URL		=	"http://member.smsmkt.com/SMSLink/GetCredit/index.php";
        
        $ch = curl_init();   
        curl_setopt($ch,CURLOPT_URL,$API_URL);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch,CURLOPT_POST,1); 
        curl_setopt($ch,CURLOPT_POSTFIELDS,$Parameter);
        
        $Result = curl_exec($ch);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        $return_data = (explode(",",$Result));
        $credit_return = $return_data[1];
        $credit_return = str_replace(",","",$credit_return);
        $credit_return = preg_replace('/[^0-9]/', '', $credit_return);
        return $credit_return; 

    }
    private function smsmkt($msg,$phone,$username,$password) 
    {

        $Username	= $username; 	 			
        $Password	= $password; 	 			
        $PhoneList	= $phone.";";
        $Message		= urlencode($msg);
        
        $Sender		= "SMS.";
        
        $Parameter	=	"User=$Username&Password=$Password&Msnlist=$PhoneList&Msg=$Message&Sender=$Sender";
        $API_URL		=	"https://api.smsmkt.com/SMSLink/SendMsg/index.php";
        

        $check = $this->smsmkt_check($username,$password);
        if ($check > 0) {
            $ch = curl_init();   
            curl_setopt($ch,CURLOPT_URL,$API_URL);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
            curl_setopt($ch,CURLOPT_POST,1); 
            curl_setopt($ch,CURLOPT_POSTFIELDS,$Parameter);
            
            $Result = curl_exec($ch);
            $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
            curl_close($ch);
            // return $Result;
            if ($http_code == 200) {
                if ($Result[status] == 0) {
                    return true;
                }
                else {
    
                    return false;
                }
    
            }
            else {
                return false;
            }  
        }
        else {
            return false;
        }
       
    }




    private function _send_forgot_pass($mobile_number)
    {
        $this->load->model('process/Member_model', 'member_md');
        $ROOT_PATH = FCPATH . '/';
        // require_once $ROOT_PATH . 'vendor/thaibulksms/sms.class.php';
        // require_once $ROOT_PATH . 'vendor/thaibulksms/bulksms.class.php';
        $otp_rand = mt_rand(100000, 999999);
        $ref_rand = strtoupper(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4));
        include $ROOT_PATH . 'vendor/thaibulksms/bulksms.class.php';
        // require 'vendor/thaibulksms/bulksms.class.php';
        $bulksms         = new bulksms;
        $member_password = $this->member_md->getPassword($mobile_number);
        // $message           = "รหัสผ่านของคุณคือ : {$member_password}";
        // $sender            = "REMINDER";
        // $ScheduledDelivery = date('ymdhi');
        // $force             = 'standard';
        $phone       = '+66' . substr($mobile_number, 1, strlen($mobile_number));
        $unicode_msg = "รหัสผ่านของคุณคือ คือ {$member_password}";
        $post_body   = $bulksms->unicode_sms($unicode_msg, $phone);
        $result      = $bulksms->send_message($post_body); 
        // $result = sms::send_sms('0634460502','520757',$mobile_number,$message,$sender,$ScheduledDelivery,$force);
        // $result = sms::send_sms('0', '0', $mobile_number, $message, $sender, $ScheduledDelivery, $force);
        // $this->member_md->put_otp($mobile_number,$otp_rand,$ref_rand);

        $response = array('result' => $result ,
            'phone_number'             => $mobile_number,
            'post_body'                => $post_body,
            'ref'                      => $ref_rand);

        return $response;
    }

    private function _validate_register()
    {
        header('Content-Type: application/json');
        $this->load->model('process/Member_model', 'member_md');
        $data                 = array();
        $data['error_string'] = array();
        $data['inputerror']   = array();
        $data['status']       = 'success';

        if ($this->input->input_stream('name') == '') {
            $data['inputerror'][]   = 'name';
            $data['error_string'][] = 'กรุณาใส่ขื่อ';
            $data['status']         = 'error';
        }

        if ($this->input->input_stream('surname') == '') {
            $data['inputerror'][]   = 'surname';
            $data['error_string'][] = 'กรุณาใส่นามสกุล';
            $data['status']         = 'error';
        }

        if ($this->input->input_stream('bank_id') == '') {
            $data['inputerror'][]   = 'bank_id';
            $data['error_string'][] = 'กรุณาเลือกธนาคาร';
            $data['status']         = 'error';
        }

        if ($this->input->input_stream('bank_account_number') == '') {
            $data['inputerror'][]   = 'bank_account_number';
            $data['error_string'][] = 'กรุณาระบุหมายเลขบัญชีธนาคาร';
            $data['status']         = 'error';
        }

        if (!is_numeric($this->input->input_stream('bank_account_number'))) {
            $data['inputerror'][]   = 'bank_account_number';
            $data['error_string'][] = 'กรุณากรอกเลขบัญชีธนาคารเป็นตัวเลขเท่านั้น';
            $data['status']         = 'error';
        }

        if ($this->input->input_stream('phone_number') == '') {
            $data['inputerror'][]   = 'phone_number';
            $data['error_string'][] = 'กรุณาใส่เบอร์โทร';
            $data['status']         = 'error';
        }

        if (!is_numeric($this->input->input_stream('phone_number')) && strlen($this->input->input_stream('phone_number')) != 10) {
            $data['inputerror'][]   = 'phone_number';
            $data['error_string'][] = 'รูปแบบเบอร์โทรไม่ถูกต้อง';
            $data['status']         = 'error';
        }

        if ($this->input->input_stream('line_id') == '') {
            $data['inputerror'][]   = 'line_id';
            $data['error_string'][] = 'กรุณาใส่ LINE ID';
            $data['status']         = 'error';
        }

        if ($this->input->input_stream('password') == '') {
            $data['inputerror'][]   = 'password';
            $data['error_string'][] = 'กรุณาใส่รหัสผ่าน';
            $data['status']         = 'error';
        }

        // $pw_uppercase = preg_match('@[A-Z]@', $this->input->input_stream('password'));
        // $pw_lowercase = preg_match('@[a-z]@', $this->input->input_stream('password'));
        // $pw_number    = preg_match('@[0-9]@', $this->input->input_stream('password'));

        // if (!$pw_uppercase || !$pw_lowercase || !$pw_number || strlen($this->input->input_stream('password')) < 8) {
        //     $data['inputerror'][]   = 'password';
        //     $data['error_string'][] = 'รูปแบบของรหัสผ่านไม่ถูกต้อง';
        //     $data['status']         = 'error';
        // }

        if ($this->input->input_stream('know_form') == '') {
            $data['inputerror'][]   = 'know_form';
            $data['error_string'][] = 'รู้จักเราผ่านช่องทางใด?';
            $data['status']         = 'error';
        }

        // if($this->input->input_stream('otpcode') == '')
        // {
        //     $data['inputerror'][] = 'phone_number';
        //     $data['error_string'][] = 'กรุณายืนยันเบอร์มือถือ!';
        //     $data['status'] = 'error';
        // }

        if (!$this->member_md->isvalid_otp($this->input->input_stream('phone_number'))) {
            $data['inputerror'][]   = 'phone_number';
            $data['error_string'][] = 'กรุณายืนยันเบอร์มือถือ!';
            $data['status']         = 'error';
        }

        //       $str_name_th = $this->input->input_stream('name');
        // $str_name_th = iconv('UTF-8','TIS-620', $str_name_th);
        // if(!preg_match("/^[ก-ฮ]+$/",$str_name_th)){
        //     $data['inputerror'][] = 'name';
        //           $data['error_string'][] = 'กรุณาใช้ชื่อภาษาไทยเท่านั้น';
        //           $data['status'] = 'error';
        // }

        // $str_surname_th = $this->input->input_stream('surname');
        // $str_surname_th = iconv('UTF-8','TIS-620', $str_surname_th);
        // if(!preg_match("/^[ก-ฮ]+$/",$str_surname_th)){
        //     $data['inputerror'][] = 'surname';
        //           $data['error_string'][] = 'กรุณาใช้นามสกุลภาษาไทยเท่านั้น';
        //           $data['status'] = 'error';
        // }

        if ($data['status'] === 'error') {
            $data['message'] = 'กรุณาตรวจสอบข้อมูลของคุณอีกครั้ง';
            echo json_encode($data);
            exit();
        }
    }

    private function _checkbank($bank_number, $bank_id)
    {
        // $txtCustAccNo = $bank_number;
        // $ddlCustBankCode = $bank_id;

        // $ROOT_PATH = FCPATH.'/';

        // require_once $ROOT_PATH.'vendor/simple-html-dom/simple-html-dom/simple_html_dom.php';
        // $COOKIEFILE = $ROOT_PATH.'protected/scb-cookie';

        // $USERNAME = 'yoodever';
        // $PASSWORD = 'Mysecret2532';
        // $ACCOUNT_NAME = '160-406516-5';

        // $response = array();

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        // curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
        // curl_setopt($ch, CURLOPT_CAINFO, $ROOT_PATH . "cert/cacert.pem");
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // curl_setopt($ch, CURLOPT_COOKIEJAR, $COOKIEFILE);
        // curl_setopt($ch, CURLOPT_COOKIEFILE, $COOKIEFILE);
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // $acc_id = 0;

        // $form_field = array();
        // $form_field['LOGIN'] = $USERNAME;
        // $form_field['PASSWD'] = $PASSWORD;
        // $form_field['LANG'] = 'T';
        // $post_string = '';
        // foreach ($form_field as $key => $value) {
        //     $post_string .= $key . '=' . urlencode($value) . '&';
        // }
        // $post_string = substr($post_string, 0, -1);

        // // login
        // curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/lgn/login.aspx');
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        // $data = curl_exec($ch);
        // $html = str_get_html($data);
        // $SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;

        // $form_field = array();
        // $form_field['SESSIONEASY'] = $SESSIONEASY;
        // $post_string = '';
        // foreach ($form_field as $key => $value) {
        //     $post_string .= $key . '=' . urlencode($value) . '&';
        // }

        // if($ddlCustBankCode == "014")
        // {
        //     // SCB Bank
        //     curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/prf/prf_ara_s3p.aspx');
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        //     $data = curl_exec($ch);
        //     $html = str_get_html($data);

        //     $form_field = array();
        //     foreach ($html->find('form input') as $element) {
        //         $form_field[$element->name] = $element->value;
        //     }

        //     $form_field['__EVENTTARGET'] = 'ctl00$DataProcess$lnkAdd';
        //     $form_field['ctl00$DataProcess$txtCustAccNo'] = $txtCustAccNo;
        //     // $form_field['ctl00$DataProcess$ddlCustBank'] = $ddlCustBankCode;
        //     $form_field['ctl00$DataProcess$txtCustAccNickname'] = 'tempx';
        //     $form_field['ctl00$DataProcess$rblGetOTP'] = 'S';
        //     $form_field['ctl00$DataProcess$ddlCustMobile'] = '0';

        //     $post_string = '';
        //     foreach ($form_field as $key => $value) {
        //         $post_string .= $key . '=' . urlencode($value) . '&';
        //     }
        //     $post_string = substr($post_string, 0, -1);
        //     curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/prf/prf_ara_s3p.aspx');
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        //     $data = curl_exec($ch);
        //     $html = str_get_html($data);

        //     $SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;
        //     $form_field = array();
        //     $form_field['SESSIONEASY'] = $SESSIONEASY;
        //     $post_string = '';
        //     foreach ($form_field as $key => $value) {
        //         $post_string .= $key . '=' . urlencode($value) . '&';
        //     }
        //     $post_string = substr($post_string, 0, -1);
        //     curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/prf/prf_ara_s3p_add_st1.aspx');
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        //     $data = curl_exec($ch);
        //     $html = str_get_html($data);

        //     // echo $html;
        //     $arr = array();
        //     $space_txt = array("                          ","    ");
        //     foreach ($html->find('td[class=bd_th_blk_11]') as $element) {
        //         $res_text = $element->innertext;
        //         $arr[] .= str_replace($space_txt,"",$res_text);
        //     }

        //     $bank_detail = array('014','ธนาคารไทยพาณิชย์ จำกัด (มหาชน)');
        // }
        // else
        // {
        //     // Other Bank

        //     curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/prf/prf_ara_o3p.aspx');
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        //     $data = curl_exec($ch);

        //     $html = str_get_html($data);

        //     $form_field = array();
        //     foreach ($html->find('form input') as $element) {
        //         $form_field[$element->name] = $element->value;
        //     }

        //     $form_field['__EVENTTARGET'] = 'ctl00$DataProcess$lnkAdd';
        //     $form_field['ctl00$DataProcess$txtCustAccNo'] = $txtCustAccNo;
        //     $form_field['ctl00$DataProcess$ddlCustBank'] = $ddlCustBankCode;
        //     $form_field['ctl00$DataProcess$txtCustAccNickname'] = 'tempx';
        //     $form_field['ctl00$DataProcess$rblGetOTP'] = 'S';
        //     $form_field['ctl00$DataProcess$ddlCustMobile'] = '0';

        //     $post_string = '';
        //     foreach ($form_field as $key => $value) {
        //         $post_string .= $key . '=' . urlencode($value) . '&';
        //     }
        //     $post_string = substr($post_string, 0, -1);
        //     curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/prf/prf_ara_o3p.aspx');
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        //     $data = curl_exec($ch);
        //     $html = str_get_html($data);

        //     //echo $html;

        //     $SESSIONEASY = $html->find('input[name="SESSIONEASY"]', 0)->value;
        //     $form_field = array();
        //     $form_field['SESSIONEASY'] = $SESSIONEASY;
        //     $post_string = '';
        //     foreach ($form_field as $key => $value) {
        //         $post_string .= $key . '=' . urlencode($value) . '&';
        //     }
        //     $post_string = substr($post_string, 0, -1);
        //     curl_setopt($ch, CURLOPT_URL, 'https://www.scbeasy.com/online/easynet/page/prf/prf_ara_o3p_add_st1.aspx');
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        //     $data = curl_exec($ch);
        //     $html = str_get_html($data);

        //     // echo $html;

        //     $arr = array();
        //     $space_txt = array("                          ","    ");
        //     foreach ($html->find('td[class=bd_th_blk_11]') as $element) {
        //         $res_text = $element->innertext;
        //         $arr[] .= str_replace($space_txt,"",$res_text);
        //     }
        //     $bank_detail = explode(" - ",iconv("windows-874","utf-8",$arr[2]));
        // }

        // if(empty($arr[0]))
        // {
        //     $res = array('status' => 'error',
        //                  'data' => null,
        //                  'message' => 'Error : Invalid Bank account number.');
        //     return $res;
        //     exit;
        // }

        // $res = array('status' => 'success',
        //                     'data' => array('account_number' => iconv("windows-874","utf-8",$arr[1]),
        //                            'account_name' => iconv("windows-874","utf-8",$arr[0]),
        //                            'bank_code' => $bank_detail[0],
        //                            'bank_name' => $bank_detail[1]),
        //                     'message' => 'Retrieve Bank account data Successfully');

        $res = array('status' => 'success',
            'message'             => 'Retrieve Bank account data Successfully');

        return $res;

    }

}

/* End of file Authentication.php */
/* Location: ./application/controllers/Authentication.php */
