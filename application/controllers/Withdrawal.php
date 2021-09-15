<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Withdrawal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        is_nothave_username();
        // is_allow_browser();

        // $this->total_balance = getMemberTotalBalance(sess_userdata('id'));

        $this->load->model('process/Balance_model', 'balancem');
        $this->load->model('process/Logs_model', 'logsm');
        $this->load->model('process/Member_model', 'membermd');
        $this->load->model('Bonus_model', 'bonusm');
        // $this->game_account = game_account();
        // $this->withdraw_queue = FCPATH . '/withdraw_queue.json';

    }

    public function index()
    {
        $this->load->model('process/Member_model', 'member_md');
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
        $data['page_header']    = 'withdrawal/header';
        $data['page_content']   = 'withdrawal/content';
        $data['page_js']        = 'withdrawal/js';
        $data['turn_amount']    = db_userdata('turn_amount');

        $this->load->view('layout/layout_title', $data, false);
    }

    public function withdraw()
    {
        header('Content-Type: application/json');

        $is_bonus_active = $this->bonusm->check_if_bonus_active();
        $withdraw_status = getWithdrawstatus();

        // เพิ่ม เงื่อนไขพิเศษ : เรียบร้อย // ปล ยังไม่ได้ test
        // นับยอดฝากทั้งหมด ถ้า มากกว่า 1 ให้หลุดเงื่อนไข โปรโมชั่น สมัครใหม่
        // ถ้าติดเงื่อนไข ให้ ถ้า $withdraw_amount > $is_promotion_max_withdraw ให้ $withdraw_amount = $is_promotion_max_withdraw
        // นับยอดถอนทั้งหมด/วัน ถ้าจำนวน amount > $max_withdraw_amount_per_day ให้ไม่สามารถถอนได้
        $username = db_userdata('username');
        $max_withdraw_by_turn = db_userdata('max_withdraw_by_turn');
        // จำนวนยอดฝาก
        $count_deposit = $this->membermd->getDepositCount(sess_userdata('id'));
        // นับยอดถอนทั้งหมดต่อวัน
        $sum_withdraw = $this->membermd->withdraw_sum(sess_userdata('id'));
        //ถอนมากสุดต่อ ครั้ง
        $max_withdraw_amount = getWithdrawConfig()->max_withdraw_amount;
        //ถอนมากสุดต่อ วัน
        $max_withdraw_amount_per_day = getWithdrawConfig()->max_withdraw_amount_per_day;
        //ติดโปรโมชั่น 1 สมัครใหม่ ถอนได้มากสุด
        $is_promotion_max_withdraw = getWithdrawConfig()->is_promotion_max_withdraw;

        if ($withdraw_status == '1') {
            $withdraw_amount       = $this->input->post('withdraw_amount', true);
            $wall_0 = $this->balancem->getallwallet()->wallet_balance;
            $wall_1 = $this->balancem->getallwallet()->agent_1_wallet;
            $wall_2 = $this->balancem->getallwallet()->agent_2_wallet;
            $wall_3 = $this->balancem->getallwallet()->agent_3_wallet;
            // $current_wallet_amount = $this->balancem->currentWalletBalance();
            $current_wallet_amount = $wall_0 + $wall_1+$wall_2+$wall_3;
            $allow_withdraw        = $this->balancem->isAllowWithdraw();
            $new_register          = 1;
            $min_withdraw          = $this->bonusm->getMinWithdraw(sess_userdata('id'));
            // ถ้าติดเงื่อนไข AFF1 มีค่า max_withdraw_by_turn จะทำให้ถอนขั้นต่ำ
            if ($max_withdraw_by_turn !=0) {
                $min_withdraw  = $max_withdraw_by_turn;
            }
            if ($count_deposit > 1) {
                // หลุดเงื่อนไขสมาชิกใหม่
                $new_register = 0;
            } else {

                $new_register = 1;
            }

            // if ($sum_withdraw > $max_withdraw_amount_per_day) {
            //     $response['status']  = 'error';
            //     $response['message'] = 'ไม่สามารถถอนเงินได้ คุณถอนครบกำหนดจำนวน '.$max_withdraw_amount_per_day.' ต่อวัน เรียบร้อยแล้ว';
            //     echo json_encode($response);
            //     exit();
            // }

            if ($withdraw_amount == 0) {
                $response['status']  = 'error';
                $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดเงินไม่ถูกต้อง';
                echo json_encode($response);
                exit();
            }

            if ($withdraw_amount > $max_withdraw_amount) {
                $response['status']  = 'error';
                $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดถอนสูงสุดต่อครั้งคือ <strong style="color:red;">' . $max_withdraw_amount . '</strong> บาท';
                echo json_encode($response);
                exit();
            }

            if (empty($withdraw_amount)) {
                $response['status']  = 'error';
                $response['message'] = 'กรุณากรอกจำนวนเงินที่ต้องการถอน';
                echo json_encode($response);
                exit();
            }

            if ($withdraw_amount < $min_withdraw) {
                $response['status']  = 'error';
                $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดถอนขั้นต่ำของคุณคือ <strong style="color:red;">' . $min_withdraw . '</strong> บาท';
                echo json_encode($response);
                exit();
            }

            if (!$allow_withdraw) {
                $response['status']  = 'error';
                $response['message'] = 'กรุณารอเจ้าหน้าที่ทำรายการสักครู่';
                echo json_encode($response);
                exit();
            }
            if ($withdraw_amount > $current_wallet_amount || floor(floatval($withdraw_amount)) != floor(floatval($current_wallet_amount))) {
                $response['status']  = 'error';
                $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดเงินของคุณคือ ' . $current_wallet_amount . ' บาท';
                echo json_encode($response);
                exit();
            } else if ($withdraw_amount < 0 || floor($withdraw_amount) < floor($current_wallet_amount)) {
                $response['status']  = 'error';
                $response['message'] = 'น้อยกว่า 0 ไม่สามารถถอนได้ ยอดเงินของคุณคือ ' . $current_wallet_amount . ' บาท';
                echo json_encode($response);
                exit();
            } else {
                if ($is_bonus_active == 0) {

                    $min_withdraw = $this->bonusm->getMinWithdraw(sess_userdata('id'));
                    if ($max_withdraw_by_turn !=0) {
                        $min_withdraw  = $max_withdraw_by_turn;
                    }
                    if ($withdraw_amount < $min_withdraw) {
                        $response['status']  = 'error';
                        $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดถอนขั้นต่ำของคุณคือ ' . $min_withdraw . ' บาท';
                        echo json_encode($response);
                        exit();
                    }

                    if ($withdraw_amount <= 0) {
                        $response['status']  = 'error';
                        $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดถอนขั้นต่ำของคุณคือ ' . $min_withdraw . ' บาท';
                        echo json_encode($response);
                        exit();
                    }

                    $withdraw_amount = intval($withdraw_amount);

                    // ตัด Credit Agent
                    // $lastest_credit         = $this->membermd->GetUserCredit($username);
                    // $lastest_credit         = intval($lastest_credit);
                    // $check_withdraw_success = 0;
                    // while ($lastest_credit >= 1) {
                    //     $return_credit  = $this->membermd->getWithdrawCredit($withdraw_amount);
                    //     $lastest_credit = $this->membermd->GetUserCredit($username);
                    //     if ($return_credit == 0 && $lastest_credit <= 1) {
                    //         $lastest_credit         = intval($lastest_credit);
                    //         $check_withdraw_success = 1;
                    //     }

                    // }
                    $before_withdraw = $this->membermd->before_withdraw($withdraw_amount);
                    $return_credit   = $this->membermd->getWithdrawCredit($withdraw_amount);
                    // ถ้าเข้าเงื่อนไขสมาชิกใหม่ ติด ยอดถอนสูงสุด
                    if ($new_register == '1' && $withdraw_amount > $is_promotion_max_withdraw && $is_promotion_max_withdraw > 0) {
                        $withdraw_amount = $is_promotion_max_withdraw;
                    }
                    $withdraw_amount = floor($withdraw_amount);

                    // เงื่อนไขถ้าติด max_withdraw_by_turn ให้ถอนสูงสุด = max_withdraw_by_turn
                    if ($max_withdraw_by_turn != 0) {
                       $withdraw_amount =  $max_withdraw_by_turn;

                    }
                    $logs = array('amount' => $withdraw_amount, 'is_bonus' => 0);
                    if ($return_credit == '0') {
                        if ($this->logsm->withdraw_log($logs)) {
                            $this->balancem->resetBonusUsed();
                            $this->balancem->adjustWalletBalance('-' . $withdraw_amount);
                            //$this->bonusm->deactiveBonus();

                            // แจ้งเตือน Line Notify // ใน pg ยังไม่ได้ ตั้งค่า line api
                            // $user_detail = sess_userdata('name')." ".sess_userdata('surname')." (".sess_userdata('id').")";
                            // $str = "\nขอถอน ".number_format($withdraw_amount)." บาท\nUSER : ".$user_detail."\nบัญชีธนาคาร : ".sess_userdata('name')." ".sess_userdata('surname')."\nเลขที่บัญชี : ".sess_bankdata('bank_account_number')."\nธนาคาร : ".sess_bankdata('bank_name')."\nเวลาที่แจ้งถอน : ".date("Y-m-d H:i:s")."\nหมายเหตุ : ลูกค้ารับโบนัส";
                            // $this->notify($str);
                            //$this->notif_admin($str);

                            $response['status']  = 'success';
                            $response['message'] = 'แจ้งถอนเงินสำเร็จ กรุณารอเจ้าหน้าที่ทำรายการสักครู่!  ';
                            $response['amount']  = $withdraw_amount;
                            echo json_encode($response);
                            exit();
                        }

                    } else {
                        // ต่อ API Error
                        $lastest_credit = $this->membermd->GetUserCredit($username);
                         // เงื่อนไขถ้าติด max_withdraw_by_turn ให้ถอนสูงสุด = max_withdraw_by_turn
                        if ($max_withdraw_by_turn != 0) {
                            $withdraw_amount =  $max_withdraw_by_turn;
    
                        }
                        $logs = array('amount' => $withdraw_amount, 'is_bonus' => 0);
                        if ($lastest_credit <= 1) {
                            if ($this->logsm->withdraw_log($logs)) {
                                //$this->balancem->resetBonusUsed();

                                $this->balancem->adjustWalletBalance('-' . $withdraw_amount);
                                //$this->bonusm->deactiveBonus();

                                // แจ้งเตือน Line Notify // ใน pg ยังไม่ได้ ตั้งค่า line api
                                // $user_detail = sess_userdata('name')." ".sess_userdata('surname')." (".sess_userdata('id').")";
                                // $str = "\nขอถอน ".number_format($withdraw_amount)." บาท\nUSER : ".$user_detail."\nบัญชีธนาคาร : ".sess_userdata('name')." ".sess_userdata('surname')."\nเลขที่บัญชี : ".sess_bankdata('bank_account_number')."\nธนาคาร : ".sess_bankdata('bank_name')."\nเวลาที่แจ้งถอน : ".date("Y-m-d H:i:s")."\nหมายเหตุ : ลูกค้ารับโบนัส";
                                // $this->notify($str);
                                //$this->notif_admin($str);
                                $response['status']  = 'success';
                                $response['message'] = 'แจ้งถอนเงินสำเร็จ กรุณารอเจ้าหน้าที่ทำรายการสักครู่!  ' . $lastest_credit;
                                $response['amount']  = $withdraw_amount;
                                echo json_encode($response);
                                exit();
                            }
                        } else {
                            $response['status']  = 'error';
                            $response['message'] = 'ไม่สามารถทำรายการได้ กรุณาทำรายการใหม่อีกครั้ง';
                            $response['amount']  = $withdraw_amount;
                            echo json_encode($response);
                            exit();
                        }
                    }
                } else {
                    $min_withdraw = $this->bonusm->getMinWithdraw(sess_userdata('id'));
                    if ($max_withdraw_by_turn !=0) {
                        $min_withdraw  = $max_withdraw_by_turn;
                    }
                    if ($withdraw_amount < $min_withdraw) {
                        $response['status']  = 'error';
                        $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดถอนขั้นต่ำของคุณคือ ' . $min_withdraw . ' บาท';
                        echo json_encode($response);
                        exit();
                    } else if ($withdraw_amount < 0 || floor($withdraw_amount) < floor($current_wallet_amount)) {
                        $response['status']  = 'error';
                        $response['message'] = 'ไม่สามารถถอนเงินได้ ยอดถอนขั้นต่ำของคุณคือ ' . $min_withdraw . ' บาท';
                        echo json_encode($response);
                        exit();
                    } else {

                        $withdraw_amount = intval($withdraw_amount);
                        // ตัด Credit Agent

                        // $lastest_credit         = $this->membermd->GetUserCredit($username);
                        // $lastest_credit         = intval($lastest_credit);
                        // $check_withdraw_success = 0;
                        // while ($lastest_credit >= 1) {
                        //     $return_credit  = $this->membermd->getWithdrawCredit($withdraw_amount);
                        //     $lastest_credit = $this->membermd->GetUserCredit($username);
                        //     if ($return_credit == 0 && $lastest_credit <= 1) {
                        //         $lastest_credit         = intval($lastest_credit);
                        //         $check_withdraw_success = 1;
                        //     }

                        // }
                        $before_withdraw = $this->membermd->before_withdraw($withdraw_amount);
                        $return_credit   = $this->membermd->getWithdrawCredit($withdraw_amount);
                        // ถ้าเข้าเงื่อนไขสมาชิกใหม่ ติด ยอดถอนสูงสุด
                        if ($new_register == '1' && $withdraw_amount > $is_promotion_max_withdraw && $is_promotion_max_withdraw > 0) {
                            $withdraw_amount = $is_promotion_max_withdraw;
                        }
                        $withdraw_amount = floor($withdraw_amount);

                        $withdrawal_detail = $this->bonusm->getBonusWithdrawDetail();
                       
                        if ($return_credit == '0') {
                                // เงื่อนไขถ้าติด max_withdraw_by_turn ให้ถอนสูงสุด = max_withdraw_by_turn
                                if ($max_withdraw_by_turn != 0) {
                                    $withdraw_amount =  $max_withdraw_by_turn;

                                }
                                $logs              = array('amount' => $withdraw_amount, 'is_bonus' => 1, 'bonus_detail' => $withdrawal_detail);

                            if ($this->logsm->withdraw_log($logs)) {
                                //$this->balancem->resetBonusUsed();

                                $this->balancem->adjustWalletBalance('-' . $withdraw_amount);
                                //$this->bonusm->deactiveBonus();

                                // แจ้งเตือน Line Notify // ใน pg ยังไม่ได้ ตั้งค่า line api
                                // $user_detail = sess_userdata('name')." ".sess_userdata('surname')." (".sess_userdata('id').")";
                                // $str = "\nขอถอน ".number_format($withdraw_amount)." บาท\nUSER : ".$user_detail."\nบัญชีธนาคาร : ".sess_userdata('name')." ".sess_userdata('surname')."\nเลขที่บัญชี : ".sess_bankdata('bank_account_number')."\nธนาคาร : ".sess_bankdata('bank_name')."\nเวลาที่แจ้งถอน : ".date("Y-m-d H:i:s")."\nหมายเหตุ : ลูกค้ารับโบนัส";
                                // $this->notify($str);
                                //$this->notif_admin($str);
                                $response['status']  = 'success';
                                $response['message'] = 'แจ้งถอนเงินสำเร็จ กรุณารอเจ้าหน้าที่ทำรายการสักครู่!  ';
                                $response['amount']  = $withdraw_amount;
                                echo json_encode($response);
                                exit();
                            }

                        } else {
                            // ต่อ API Error
                            $lastest_credit = $this->membermd->GetUserCredit($username);
                            if ($lastest_credit <= 1) {
                                         // เงื่อนไขถ้าติด max_withdraw_by_turn ให้ถอนสูงสุด = max_withdraw_by_turn
                                         if ($max_withdraw_by_turn != 0) {
                                            $withdraw_amount =  $max_withdraw_by_turn;
        
                                        }
                                        $logs              = array('amount' => $withdraw_amount, 'is_bonus' => 1, 'bonus_detail' => $withdrawal_detail);
        
                                if ($this->logsm->withdraw_log($logs)) {
                                    //$this->balancem->resetBonusUsed();

                                    $this->balancem->adjustWalletBalance('-' . $withdraw_amount);
                                    //$this->bonusm->deactiveBonus();

                                    // แจ้งเตือน Line Notify // ใน pg ยังไม่ได้ ตั้งค่า line api
                                    // $user_detail = sess_userdata('name')." ".sess_userdata('surname')." (".sess_userdata('id').")";
                                    // $str = "\nขอถอน ".number_format($withdraw_amount)." บาท\nUSER : ".$user_detail."\nบัญชีธนาคาร : ".sess_userdata('name')." ".sess_userdata('surname')."\nเลขที่บัญชี : ".sess_bankdata('bank_account_number')."\nธนาคาร : ".sess_bankdata('bank_name')."\nเวลาที่แจ้งถอน : ".date("Y-m-d H:i:s")."\nหมายเหตุ : ลูกค้ารับโบนัส";
                                    // $this->notify($str);
                                    //$this->notif_admin($str);
                                    $response['status']  = 'success';
                                    $response['message'] = 'แจ้งถอนเงินสำเร็จ กรุณารอเจ้าหน้าที่ทำรายการสักครู่!  ' . $lastest_credit;
                                    $response['amount']  = $withdraw_amount;
                                    echo json_encode($response);
                                    exit();
                                }
                            } else {
                                $response['status']  = 'error';
                                $response['message'] = 'ไม่สามารถทำรายการได้ กรุณาทำรายการใหม่อีกครั้ง';
                                $response['amount']  = $withdraw_amount;
                                echo json_encode($response);
                                exit();
                            }

                        }

                    }
                }
            }
        } else {
            $response['status']  = 'error';
            $response['message'] = 'ปิดระบบถอนเงินชั่วคราว ขออภัยในความไม่สะดวกคะ';
            echo json_encode($response);
            exit();
        }

    }

    // private function send_notification($log)
    // {
    //     $withdraw_queue = json_encode($log);
    //     file_put_contents($this->withdraw_queue, $withdraw_queue);
    // }

    private function notify($message)
    {
        define('LINE_API', "https://notify-api.line.me/api/notify");

        $token = "JBnykksG4USxnDHit9zA00uVM3gb67J7P2I8oVF7HTj";

        $queryData     = array('message' => $message);
        $queryData     = http_build_query($queryData, '', '&');
        $headerOptions = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $token . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData,
            ),
        );
        $context = stream_context_create($headerOptions);
        $result  = file_get_contents(LINE_API, false, $context);

        $withdraw_queue = json_encode(time());
        file_put_contents($this->withdraw_queue, $withdraw_queue);
        // print_r($result);
    }

    public function notif_admin($sms)
    {

        $strAccessToken = "407J+3y2IvTK1h/rHwNQYCCX1jS8o+VbYwFTvQ7yWI+orpbtpJ2qMNDPpTjKNEaKnvsqA+PQP715tcPqtlIU2GM4m9f9uh6ZsAbbyCo75sUzyRdOkfzM4zKPurTx2FBtWzkVni7ERt4dExsJ8rDjkAdB04t89/1O/w1cDnyilFU=";

        $content = file_get_contents('php://input');

        $arrJson = json_decode($content, true);

        //$strUrl = "https://api.line.me/v2/bot/message/reply";

        $arrHeader   = array();
        $arrHeader[] = "Content-Type: application/json";
        $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

        $arrPostData                        = array();
        $arrPostData['to']                  = "C8b8c80add7a96a7b10bb21fec124008c";
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "{$sms}";
        $strUrl                             = "https://api.line.me/v2/bot/message/push";
        $this->sendCURL($strUrl, $arrHeader, $arrPostData);
    }

    private function sendCURL($strUrl, $arrHeader, $arrPostData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);

        // $file = fopen("test.txt","w");

        // fwrite($file,print_r($arrHeader,true));
        // fclose($file);
        curl_close($ch);
    }

    public function form_withdraw()
    {
        $isAllowWithdraw = $this->balancem->isAllowWithdraw();
        $withdraw_remain = getWithdrawRemain();

        $is_bonus_active     = $this->bonusm->check_if_bonus_active();
        $min_withdraw_amount = $this->bonusm->getMinWithdraw(sess_userdata('id'));
        $walletBalance       = $this->balancem->getwalletBalance();

        $affWithdraw = $this->balancem->affWithdraw();
        if (isset($affWithdraw)) {
            $total_balance = getMemberTotalBalance(sess_userdata('id'));
            if ($total_balance > $affWithdraw->withdraw_lessthan && $total_balance < $affWithdraw->withdraw_morethan) {
                ?>
				<div class="d-flex justify-content-center animated fadeIn" id="withdrawal_loading" style="margin-top:30px;padding:15px;">
					<h5 class="text-center" style="font-family: 'sukhumvit';"><strong>ขออภัย!ไม่สามารถทำรายการได้</strong><br>คุณต้องมียอดให้มากกว่า <span style="color:red;"><?php echo number_format($affWithdraw->withdraw_morethan, 2); ?></span> บาท<br> หรือน้อยกว่า <span style="color:red;"><?php echo number_format($affWithdraw->withdraw_lessthan, 2); ?></span> บาท จึงจะสามารถถอนเครติดได้</small></h5>
				</div>
				<?php
exit();
            } else {
                $this->balancem->deactiveAffWithdraw();
            }
        }

        if ($is_bonus_active == 1) {
            $total_balance = getMemberTotalBalance(sess_userdata('id'));
        }

        if ($isAllowWithdraw):
            if ($withdraw_remain <= 0):
            ?>
																																																								<div class="d-flex justify-content-center animated fadeIn" id="withdrawal_loading" style="margin-top:30px;padding:15px;">
																																																								<h5 class="text-center" style="color:red;">วันนี้คุณถอนครบจำนวนครั้งต่อวันแล้วคะ</small></h5>
																																																								</div>
																																																							<?php
else:
            if (($is_bonus_active == 1) && ($total_balance < $min_withdraw_amount)):
            ?>
																																																								<div class="d-flex justify-content-center animated fadeIn" id="withdrawal_loading" style="margin-top:30px;padding:15px;">
																																																								<h5 class="text-center" style="font-family: 'sukhumvit';"><strong>ขออภัย!ไม่สามารถทำรายการได้</strong><br>เนื่องจากรับโบนัส คุณต้องทำยอดให้มากกว่าหรือเท่ากับ <span style="color:red;"><?php echo number_format($min_withdraw_amount, 2) ?></span> บาท<br> จึงจะสามารถถอนเครติดได้</small></h5>
																																																						    	</div>
																																																								<?php
else:
        ?>
				<div class="white-box" id="withdrawalDiv" style="padding-top:10px; padding-bottom: 0; border-radius: 8px 8px 15px 15px;">
					<form action="<?php echo base_url('Withdrawal/withdraw'); ?>" method="POST" id="withdrawal_form">
						<div class="p-3">
							<div class="d-flex flex-row justify-content-between py-3">
								<div class="d-flex flex-column">
									<span class="text-muted">จำนวนเงินที่ถอนได้</span>
									<span class="fs-xl">
										<strong id="wallet_balance" class="text-primary">
										Loading.......
										</strong>
										<small>THB</small>
									</span>
								</div>
								<div class="d-flex flex-column align-items-end">
									<span class="text-muted">รอบการถอน</span>
									<span class="fs-xl">
										<strong class="text-primary"><?php echo getWithdrawCount(); ?></strong> / <?php echo getMaxWithdrawPerDay(); ?>
									</span>
								</div>
							</div>
						</div>
						<input type="hidden" id="withdraw_amount" name="withdraw_amount" class="form-control form-control-lg" value="<?php echo number_format($walletBalance, 0); ?>" style="font-size:28px !important;">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
						<!-- <progress value="0" max="10" id="progressBar"></progress> -->
                        <div class="b-overlay-wrap position-relative">
							<button id="btn_withdraw" type="submit" class="btn mt-3 btn-primary btn-lg btn-block rounded-pill btn-login" disabled>
								กำลังตรวจสอบยอด ....... (<b id="gj-counter-num"></b>)
							</button>
						</div>
					</form>

				</div>

				<?php
endif;
        ?>
			<?php
endif;
        else:
        ?>
		<div class="d-flex justify-content-center animated fadeIn slow" style="margin-top:30px;padding:15px;">
			<h4 class="text-center withdrawal_loading_txt" style="font-family: 'sukhumvit'">รายการขอถอนเงินจำนวน <?php echo number_format(getLastWithdraw(), 2); ?> บาท ของคุณกำลังดำเนินการ<br><small>ระบบจะถอนเงินเข้าบัญชีของท่านอัตโนมัติ ภายใน 2-5 นาที</small></h4>
		</div>
		<section class="btn-withdraw-history animated fadeIn slow">
		    <div class="container">
		        <button onclick="location.href='<?php echo base_url('transaction#withdraw'); ?>';" class="btn form-control btn-primary-lg" style="height:auto;"><i class="fas fa-history"></i> ตรวจสอบประวัติการถอนเงิน</button>
		    </div>
		</section>
		<?php
endif;

        ?>
		<script type="text/javascript">
			var withdrawal_form = $('#withdrawal_form');
	        withdrawal_form.submit(function(e) {

	            $('.loading').fadeIn();
	            $('.btn-login').prop('disabled', true);
	            $('.btn-login').html('<i class="fa fa-circle-o-notch fa-spin"></i> กำลังดำเนินการ กรุณารอสักครู่...');

	            e.preventDefault();

	            var withdraw_amount = $('input[name=withdraw_amount]').val();
	            if (!withdraw_amount){
	                $.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'กรุณาใส่จำนวนเงินที่ต้องการถอน'
	                });

	                $('.loading').fadeOut();
	                $('.btn-login').prop('disabled', false);
	                $('.btn-login').html('ถอนเงิน');
	            }
	            else
	            {
	                var form = $(this);
	                var url = form.attr('action');
	                $.ajax({
	                    type: "POST",
	                    url: url,
	                    dataType: "json",
	                    data: form.serialize(),
	                    success: function(data)
	                    {
	                        $('.loading').fadeOut();
	                        $('.btn-login').prop('disabled', false);
	                        $('.btn-login').html('ถอนเงิน');

	                        console.log(data);

	                        if(data.status == 'success')
	                        {

	                            getBalance();
	                            $.alert({
	                                bootstrapClasses: {
	                                    container: 'container',
	                                    containerFluid: 'container-fluid',
	                                    row: 'row',
	                                },
	                                theme: 'modern',
	                                content:
	                                '<h3 class="text-dark font18">แจ้งถอนสำเร็จ</h3>' +
	                                'คุณได้ถอนเครดิต<br>จำนวน : <span style="color:red;font-weight:bolder;">'+withdraw_amount+'</span> บาท เรียบร้อยแล้ว<br>กรุณารอเจ้าหน้าที่ทำรายการสักครู่.<br>เมื่อตรวจสอบเรียบร้อย<br>พนักงานจะทำการโอนยอดเงินที่แจ้งถอน<br>ไปยังหมายเลขบัญชีที่ลงทะเบียนไว้'
                                    // data.message
                                });

	                            setTimeout(function() {
	                            	$("#withdraw_form").load("<?php echo base_url('withdrawal/form_withdraw'); ?>");
	                                getBalance();
	                            }, 500);
	                        }
	                        else
	                        {
	                            getBalance();
	                            $.alert({
	                                bootstrapClasses: {
	                                    container: 'container',
	                                    containerFluid: 'container-fluid',
	                                    row: 'row',
	                                },
	                                theme: 'modern',
	                                content:
	                                '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3><br>' + data.message,
								});

	                            setTimeout(function() {
	                            	$("#withdraw_form").load("<?php echo base_url('withdrawal/form_withdraw'); ?>");
	                            	getBalance();
	                            }, 500);
	                        }
	                    }
	                });
	            }
	        });
		</script>
		<?php
}

    // public function afff()
    // {
    //     var_dump($this->aff());
    // }

}

/* End of file Withdrawal.php */
/* Location: ./application/controllers/Withdrawal.php */