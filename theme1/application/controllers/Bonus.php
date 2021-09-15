<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bonus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_login();
        is_nothave_username();
        // is_allow_browser();
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
        $data['deposit_count']  = $this->Member_model->getDepositCount(sess_userdata('id'));

        $data['page_header']  = 'bonus/header';
        $data['page_content'] = 'bonus/content';
        $this->load->view('layout/layout_title', $data, false);
    }

    public function getbonus_by_id($id)
    {
        $this->load->model('process/Member_model', 'member_md');
        $this->load->model('process/Balance_model', 'balancemd');
        $this->load->model('Bonus_model', 'bonusmd');

        $deposit_count                 = $this->member_md->getDepositCount(sess_userdata('id'));
        $sum_topup                     = $this->balancemd->getSumTopup();
        $last_topup                    = $this->balancemd->getLastTopup();
        $last_week_topup               = $this->balancemd->getLastweekTopup();
        $count_used_bonus_all          = $this->bonusmd->count_used_bonus_all(sess_userdata('id'), $id);
        $count_used_bonus_per_day      = $this->bonusmd->count_used_bonus_per_day(sess_userdata('id'), $id);
        $promotion_list                = $this->bonusmd->getPromotion_by_id($id);
        $data['promotion_id']          = $promotion_list->id;
        $data['promotion_description'] = $promotion_list->promotion_des;
        $data['promotion_name']        = $promotion_list->promotion_name;
        $data['date_start']            = $promotion_list->date_start;
        $data['date_end']              = $promotion_list->date_end;
        $data['status']                = $promotion_list->status;
        $data['last_topup_data']       = $last_topup;
        $data['bonus_percen']          = $promotion_list->bonus_percen;
        $data['multipy_turn']          = $promotion_list->multipy_turn;
        $data['promotion_type']        = $promotion_list->promotion_type;
        $data['max_credit']            = $promotion_list->max_credit;
        $data['banner_url']            = $promotion_list->banner_url;
        $promotion_is_time             = $promotion_list->is_time;
        $promotion_type                = $promotion_list->promotion_type;
        $promotion_time_start          = $promotion_list->time_start;
        $promotion_time_start          = strtotime($promotion_time_start);
        $promotion_time_end            = $promotion_list->time_end;
        $promotion_time_end            = strtotime($promotion_time_end);
        $promotion_open_mon            = $promotion_list->open_mon;
        $promotion_open_tue            = $promotion_list->open_tue;
        $promotion_open_wed            = $promotion_list->open_wed;
        $promotion_open_thu            = $promotion_list->open_thu;
        $promotion_open_fri            = $promotion_list->open_fri;
        $promotion_open_sat            = $promotion_list->open_sat;
        $promotion_open_sun            = $promotion_list->open_sun;
        $member_bonus_status           = db_userdata('bonus_status');
        $date_now                      = date("Y-m-d");
        $date_name                     = date('D', strtotime($date_now));
        $pass_condition_date           = 0;
        $pass_condition_time           = 0;
        $pass_condition_type           = 0;

        // รับโบนัสไม่ได้ ถ้า ยอด ล่าสุด < ยอด Credit + 6
        // Credit ปัจจุบัน
        $pass_condition_credit = 0;
        $username_member       = $this->member_md->getUserData(sess_userdata('id'))->username;
        $last_credit           = $this->member_md->GetUserCredit($username_member);
        // Last top up
        // เปลี่ยน จาก $last_topup เป็น $sum_topup ในเงื่อนไขเช็ค
        $date_yesterday      = date("Y-m-d H:i:s", strtotime($last_topup->datetime . ' +1 day'));
        $last_topup_date     = date("Y-m-d H:i:s", strtotime($last_topup->datetime));
        $date_now_time       = date("Y-m-d H:i:s", strtotime('now'));
        $date_yesterday_sto  = strtotime($date_yesterday);
        $last_topup_date_sto = strtotime($last_topup_date);
        $date_now_time_sto   = strtotime($date_now_time);

        $date_yesterday  = thaiDateTime($date_yesterday);
        $last_topup_date = thaiDateTime($last_topup_date);

        $pass_condition_credit_time = 0;
        $show_date_compare          = 0;
        if (null != $sum_topup && $sum_topup > 0) {
            $show_date_compare = 1;
        } else {
            $show_date_compare = 0;
        }
        //เงื่อนไข รับโบนัส ไม่เกิน 1 วันหลังจากยอดโอนล่าสุด
        if ($date_now_time_sto >= $date_yesterday_sto) {
            $this->balancemd->setBonusAllUsed(sess_userdata('id'));
            $pass_condition_credit_time = 0;
        } else {
            $pass_condition_credit_time = 1;
        }

        //เงื่อนไข Credit มีการเปลี่ยนแปลง หรือเล่นไปแล้ว
        $cal_topup_credit      = abs($last_credit - $sum_topup);
        $cal_topup_credit_last = abs($last_credit - $last_topup);
        if ($cal_topup_credit <= 6 || $cal_topup_credit_last <= 6) {
            // เติมได้
            $pass_condition_credit = 1;
        } else {
            //  เติมไม่ได้
            $pass_condition_credit = 0;
        }

        //เงื่อนไขประเภทโปรโมชั่น

        if ('1' == $promotion_type && $count_used_bonus_all > 0) {
            $pass_condition_type = 1;
        }

        if ('2' == $promotion_type && $count_used_bonus_per_day > 0) {
            $pass_condition_type = 1;
        }

        if (time() >= $promotion_time_start && $promotion_time_end <= time() && '1' == $promotion_is_time) {
            // เงื่อนไขเวลา
            $pass_condition_time = 1;

        }
        if ('0' == $promotion_is_time) {
            // เงื่อนไขไม่ได้กำหนดเวลา
            $pass_condition_time = 1;
        }

        if ('Mon' == $date_name && '1' == $promotion_open_mon) {
            // เงื่อนไขวันจันทร์
            $pass_condition_date = 1;
        }
        if ('Tue' == $date_name && '1' == $promotion_open_tue) {
            // เงื่อนไขวันอังคาร
            $pass_condition_date = 1;
        }
        if ('Wed' == $date_name && '1' == $promotion_open_wed) {
            // เงื่อนไขวันพุธ
            $pass_condition_date = 1;
        }
        if ('Thu' == $date_name && '1' == $promotion_open_thu) {
            // เงื่อนไขวันพฤหัส
            $pass_condition_date = 1;
        }
        if ('Fri' == $date_name && '1' == $promotion_open_fri) {
            // เงื่อนไขวันศุกร์
            $pass_condition_date = 1;
        }
        if ('Sat' == $date_name && '1' == $promotion_open_sat) {
            // เงื่อนไขวันเสาร์
            $pass_condition_date = 1;
        }
        if ('Sun' == $date_name && '1' == $promotion_open_sun) {
            // เงื่อนไขวันอาทิตย์
            $pass_condition_date = 1;
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

        $data['member_bonus_status'] = $member_bonus_status; // 0 รับได้ : 1 ไม่สามารถรับได้
        $data['check_type']          = $pass_condition_type;
        $data['check_date_name']     = $pass_condition_date;
        $data['check_time']          = $pass_condition_time;
        $data['check_bonus_back']    = $pass_condition_credit;
        $data['deposit_count']       = $deposit_count;
        $data['yester_day']          = $date_yesterday;
        $data['date_deposit']        = $last_topup_date;
        $data['date_now']            = $date_now_time;
        $data['check_time_bonus']    = $pass_condition_credit_time;
        $data['show_date_compare']   = $show_date_compare;
        $data['page_content']        = 'bonus/byid/content';
        $data['page_js']             = 'bonus/byid/js';
        $this->load->view('layout/layout_title', $data, false);
    }

    public function apply_bonus_by_id($id)
    {
        header('Content-Type: application/json');
        $this->load->model('process/Balance_model', 'balancemd');
        $this->load->model('process/Member_model', 'membermd');
        $this->load->model('Bonus_model', 'bonusmd');
        $this->load->model('process/Topup_model', 'topupmd');
        $last_topup     = $this->balancemd->getLastTopup();
        $sum_topup      = $this->balancemd->getSumTopup();
        $promotion_list = $this->bonusmd->getPromotion_by_id($id);
        $deposit_count  = $this->membermd->getDepositCount(sess_userdata('id')); //รายการเติ่มเงิน
        $turn_amount    = $this->membermd->getUserData(sess_userdata('id'))->turn_amount;

        $count_used_bonus_all       = $this->bonusmd->count_used_bonus_all(sess_userdata('id'), $id);
        $count_used_bonus_per_day   = $this->bonusmd->count_used_bonus_per_day(sess_userdata('id'), $id);
        $promotion_name             = $promotion_list->promotion_name;
        $promotion_status           = $promotion_list->status;
        $promotion_type             = $promotion_list->promotion_type;
        $promotion_condition_status = $promotion_list->condition_status;
        $promotion_bonus_percen     = $promotion_list->bonus_percen;
        $promotion_multipy_turn     = $promotion_list->multipy_turn;
        $promotion_min_credit       = $promotion_list->min_credit;
        $promotion_max_credit       = $promotion_list->max_credit;
        $promotion_cost_fixed       = $promotion_list->cost_fixed;
        $promotion_time_start       = $promotion_list->time_start;
        $promotion_is_time          = $promotion_list->is_time;
        $promotion_time_start       = strtotime($promotion_time_start);
        $promotion_time_end         = $promotion_list->time_end;
        $promotion_time_end         = strtotime($promotion_time_end);
        $promotion_open_mon         = $promotion_list->open_mon;
        $promotion_open_tue         = $promotion_list->open_tue;
        $promotion_open_wed         = $promotion_list->open_wed;
        $promotion_open_thu         = $promotion_list->open_thu;
        $promotion_open_fri         = $promotion_list->open_fri;
        $promotion_open_sat         = $promotion_list->open_sat;
        $promotion_open_sun         = $promotion_list->open_sun;
        $promotion_duplicate_other  = $promotion_list->duplicate_other;
        $date_now                   = date("Y-m-d");
        $date_name                  = date('D', strtotime($date_now));
        $pass_condition_date        = 0;
        $pass_condition_time        = 0;
        $pass_condition_type        = 0;
        $member_bonus_status        = db_userdata('bonus_status');
        $date_yesterday             = date("Y-m-d H:i:s", strtotime($last_topup->datetime . ' +1 day'));
        $last_topup_date            = date("Y-m-d H:i:s", strtotime($last_topup->datetime));
        $date_now_time              = date("Y-m-d H:i:s", strtotime('now'));
        $date_yesterday_sto         = strtotime($date_yesterday);
        $last_topup_date_sto        = strtotime($last_topup_date);
        $date_now_time_sto          = strtotime($date_now_time);
        $pass_condition_credit_time = 0;

        //เงื่อนไข สมาชิกเลือกไม่รับโบนัสตั้งแต่แรก

        if (1 == $member_bonus_status) {
            // Clear ยอดทั้งหมดให้ไม่สามารถรับได้
            $this->balancemd->setBonusAllUsed(sess_userdata('id'));
        }
        //เงื่อนไข รับโบนัส ไม่เกิน 1 วันหลังจากยอดโอนล่าสุด
        if ($date_now_time_sto >= $date_yesterday_sto) {
            $this->balancemd->setBonusAllUsed(sess_userdata('id'));
            $pass_condition_credit_time = 0;
        } else {
            $pass_condition_credit_time = 1;
        }

        // รับโบนัสไม่ได้ ถ้า ยอด ล่าสุด < ยอด Credit + 6
        // Credit ปัจจุบัน
        $pass_condition_credit = 0;
        $username_member       = $this->membermd->getUserData(sess_userdata('id'))->username;
        $last_credit           = $this->membermd->GetUserCredit($username_member);
        // Last top up
        // เปลี่ยน จาก $last_topup เป็น $sum_topup ในเงื่อนไขเช็ค
        $cal_topup_credit      = abs($last_credit - $sum_topup);
        $cal_topup_credit_last = abs($last_credit - $last_topup);
        $date_yesterday        = date("Y-m-d H:i:s", strtotime('-1 day'));
        $last_topup_date       = $last_topup->datetime;

        if ($cal_topup_credit <= 6 || $cal_topup_credit_last <= 6) {
            // เติมได้
            $pass_condition_credit = 1;
        } else {
            //  เติมไม่ได้
            $pass_condition_credit = 0;
        }
        //เงื่อนไขประเภทโปรโมชั่น

        // 00:00:00 ไม่ได้ Set ค่า = 1588809600
        if (time() >= $promotion_time_start && $promotion_time_end <= time() && '1' == $promotion_is_time) {
            // เงื่อนไขเวลา
            $pass_condition_time = 1;

        }
        if ('0' == $promotion_is_time) {
            // เงื่อนไขไม่ได้กำหนดเวลา
            $pass_condition_time = 1;
        }
        if ('Mon' == $date_name && '1' == $promotion_open_mon) {
            // เงื่อนไขวันจันทร์
            $pass_condition_date = 1;
        }
        if ('Tue' == $date_name && '1' == $promotion_open_tue) {
            // เงื่อนไขวันอังคาร
            $pass_condition_date = 1;
        }
        if ('Wed' == $date_name && '1' == $promotion_open_wed) {
            // เงื่อนไขวันพุธ
            $pass_condition_date = 1;
        }
        if ('Thu' == $date_name && '1' == $promotion_open_thu) {
            // เงื่อนไขวันพฤหัส
            $pass_condition_date = 1;
        }
        if ('Fri' == $date_name && '1' == $promotion_open_fri) {
            // เงื่อนไขวันศุกร์
            $pass_condition_date = 1;
        }
        if ('Sat' == $date_name && '1' == $promotion_open_sat) {
            // เงื่อนไขวันเสาร์
            $pass_condition_date = 1;
        }
        if ('Sun' == $date_name && '1' == $promotion_open_sun) {
            // เงื่อนไขวันอาทิตย์
            $pass_condition_date = 1;
        }

        if (1 == $id && '1' == $promotion_status && '1' == $pass_condition_date && '1' == $pass_condition_time) {
            // โปรโมชั่นสมัครสมาชิกใหม่ รับได้ครั้งเดียว
            if ('0' == $pass_condition_credit || '0' == $pass_condition_credit_time) {
                //เติมไม่ได้
                // Update Credit ใช้ไปแล้ว ไม่ให้เติมซ้ำ
                $this->balancemd->setBonusAllUsed(sess_userdata('id'));

                $response['status']  = 'error';
                $response['message'] = 'ไม่สามารถ รับ Credit ย้อนหลัง';
                echo json_encode($response);
                die();

            }

            if ($deposit_count > 1) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ โบนัส ' . $promotion_bonus_percen . '% สำหรับการฝากเงินครั้งแรกเท่านั้น!';
                echo json_encode($response);
                die();
            }
            //$count_bonus = $this->bonusmd->checkDupBonus(sess_userdata('id'),$previous_balance,$bonus_amount);

            if ($last_topup->amount < $promotion_min_credit) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้ ยอดฝากขั้นต่ำในการรับโบนัส ' . $promotion_bonus_percen . '% คือ ' . $promotion_min_credit . ' บาท';
                echo json_encode($response);
                die();
            }

            if ('1' == $promotion_type && $count_used_bonus_all > 0) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้ โปรโมชั่นนี้ สามารถรับได้ 1 ครั้งเท่านั้น';
                echo json_encode($response);
                die();
            }

            if ('2' == $promotion_type && $count_used_bonus_per_day > 0) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้  โปรโมชั่นนี้ สามารถรับได้ 1 ครั้ง ต่อวัน เท่านั้น';
                echo json_encode($response);
                die();
            }

            if (!isActiveBonus()) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ ไม่สามารถรับโบนัสซ้ำกันได้!';
                echo json_encode($response);
                die();
            } else {

                if ('1' == $pass_condition_credit) {
                    $promotion_con_list = $this->bonusmd->getPromotion_con_by_promotion_id($id);
                    $last_topup_amount  = $last_topup->amount;
                    // เงื่อนไขพิเศษ 100-300  30%     400-900   40%     1000+   50%
                    foreach ($promotion_con_list->result_array() as $row) {
                        $con_bonus_percen  = $row['bonus_percen'];
                        $con_multiply_turn = $row['multiply_turn'];
                        $con_min_amount    = $row['min_amount'];
                        $con_max_amount    = $row['max_amount'];

                        if ('1' == $promotion_condition_status && $last_topup_amount >= $con_min_amount && $last_topup_amount <= $con_max_amount) {
                            $promotion_bonus_percen = $con_bonus_percen;
                            $promotion_multipy_turn = $con_multiply_turn;
                        }
                    }

                    $bonus_amount = ($last_topup->amount * $promotion_bonus_percen) / 100;

                    if ($bonus_amount >= $promotion_max_credit) {
                        $bonus_amount = $promotion_max_credit;
                    }

                    $data['first_topup'] = $this->balancemd->getCheckFirstBobus();
                    if (0 == $data['first_topup']->topup_first_time) {
                        // $min_withdraw = (($last_topup->amount + $bonus_amount) * $promotion_multipy_turn);
                        // แก้ไข จาก $last_topup เป็น $sum_topup
                        $min_withdraw = (($sum_topup + $bonus_amount) * $promotion_multipy_turn);

                        $old_bonus = $this->bonusmd->getMinWithdraw(sess_userdata('id'));
                        if ($old_bonus > 0) {
                            $min_withdraw = $min_withdraw;
                        }

                        $previous_balance = getMemberTotalBalance(sess_userdata('id'));

                        $count_bonus = $this->bonusmd->checkDupBonus(sess_userdata('id'), $previous_balance, $bonus_amount);
                        if ($count_bonus->bonus > 1) {
                            $response['status']  = 'error';
                            $response['message'] = 'ขออภัยคะ โบนัส ' . $promotion_bonus_percen . '% สำหรับการฝากเงินครั้งแรกเท่านั้น!';
                            echo json_encode($response);
                            die();
                        }
                        // sleep(rand(1, 10));
                        if ($promotion_cost_fixed > 0) {
                            // หาก fix ยอดจะไม่คำนวน Bonus ตาม %
                            $bonus_amount = $promotion_cost_fixed;
                        }

                        $deposit_log = array('member_id' => sess_userdata('id'),
                            'previous_balance'               => $previous_balance,
                            'amount'                         => $bonus_amount,
                            'datetime'                       => date('Y-m-d H:i:s'),
                            'status'                         => 1,
                            'channel'                        => 'BONUS',
                            'memo'                           => "ฝากครั้งแรก รับโบนัส {$promotion_bonus_percen}% ({$bonus_amount} บาท) จากยอดฝาก {$last_topup->amount} สามารถถอนได้เมื่อมียอดมากกว่า หรือเท่ากับ {$min_withdraw} บาท",
                            'is_bonus'                       => 1,
                            'friend_refer_active'            => 1);

                        $memo_log = 'รับโบนัส ' . $promotion_bonus_percen . '% (' . $bonus_amount . ' บาท) จากยอดฝาก ' . $last_topup->amount;
                        $this->topupmd->insert_deposit_logs($deposit_log);
                        $this->bonusmd->insertBonusLog($bonus_amount, $memo_log, $id, $last_topup->id);
                        $this->topupmd->update_first_time_topup(sess_userdata('id'));
                        $this->bonusmd->activeBonus($min_withdraw);
                        $this->bonusmd->setTurnWithdraw($min_withdraw);
                        $this->balancemd->setBonusUsed($last_topup->id);
                        $this->balancemd->setBonusAmount($last_topup->id, $bonus_amount);
                        // Update ยอดเก่า ให้ไม่สามารถรับโบนัสได้

                        $this->balancemd->setBonusAllUsed(sess_userdata('id'));

                        $memdata = $this->membermd->getUserData(sess_userdata('id'));

                        if ($count_bonus->bonus > 1) {
                            // status = 0 ระงับ
                            // line_push_message("รายการเบิ้ลโบนัส {$promotion_bonus_percen} ({$bonus_amount} บาท) จากยอดฝาก {$last_topup->amount} ($memdata->id):{$memdata->name} {$memdata->surname} เวลา " . date("Y-m-d H:i:s"));
                            $this->Member_model->suspended_account(sess_userdata('id'));

                            $response['status']  = 'error';
                            $response['message'] = 'มีการรับโบนัส ที่ผิดปกติ User ของคุณจะถูกระงับ กรุณาติดต่อเจ้าหน้าที่';
                            echo json_encode($response);
                            die();

                        } else {
                            // line_push_message("รับโบนัส {$promotion_bonus_percen}} ({$bonus_amount} บาท) จากยอดฝาก {$last_topup->amount} ($memdata->id):{$memdata->name} {$memdata->surname} เวลา " . date("Y-m-d H:i:s"));
                            $response['status']  = 'success';
                            $response['message'] = 'รับโบนัสสำเร็จ ขอให้โชคดีคะ';
                            echo json_encode($response);
                            die();

                        }

                    } else {
                        $response['status']  = 'error';
                        $response['message'] = 'ขออภัยคะ คุณรับโบนัสนี้ไปแล้ว!!!';
                        echo json_encode($response);
                        die();
                    }
                } else {
                    $this->balancemd->setBonusAllUsed(sess_userdata('id'));
                    $response['status']  = 'error';
                    $response['message'] = 'ไม่สามารถรับโบนัสย้อนหลัง';
                    echo json_encode($response);
                    die();
                }

            }

        } else if (2 == $id && '1' == $promotion_status && '1' == $pass_condition_date && '1' == $pass_condition_time) {
            // โปรปกติทุกยอดฝาก

            if ('0' == $pass_condition_credit || '0' == $pass_condition_credit_time) {
                //เติมไม่ได้
                // Update Credit ใช้ไปแล้ว ไม่ให้เติมซ้ำ
                $this->balancemd->setBonusAllUsed(sess_userdata('id'));

                $response['status']  = 'error';
                $response['message'] = 'ไม่สามารถ รับ Credit ย้อนหลัง';
                echo json_encode($response);
                die();

            }

            if ($last_topup->amount < $promotion_min_credit) {
                // if ($last_topup->amount < $promotion_min_credit) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้ ยอดฝากขั้นต่ำในการรับโบนัส ' . $promotion_bonus_percen . '% คือ ' . $promotion_min_credit . ' บาท ซึ่งยอดล่าสุดของคุณคือ ' . $last_topup->amount;
                echo json_encode($response);
                die();
            }
            if ('1' == $promotion_type && $count_used_bonus_all > 0) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้ โปรโมชั่นนี้ สามารถรับได้ 1 ครั้งเท่านั้น';
                echo json_encode($response);
                die();
            }

            if ('2' == $promotion_type && $count_used_bonus_per_day > 0) {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้  โปรโมชั่นนี้ สามารถรับได้ 1 ครั้ง ต่อวัน เท่านั้น';
                echo json_encode($response);
                die();
            }
            if ('1' == $pass_condition_credit) {
                // เงื่อนไขพิเศษ 100-500  10%     600-1000   15%     1100-2000+   20%
                $promotion_con_list = $this->bonusmd->getPromotion_con_by_promotion_id($id);
                $last_topup_amount  = $last_topup->amount;
                foreach ($promotion_con_list->result_array() as $row) {
                    $con_bonus_percen  = $row['bonus_percen'];
                    $con_multiply_turn = $row['multiply_turn'];
                    $con_min_amount    = $row['min_amount'];
                    $con_max_amount    = $row['max_amount'];

                    if ('1' == $promotion_condition_status && $last_topup_amount >= $con_min_amount && $last_topup_amount <= $con_max_amount) {
                        $promotion_bonus_percen = $con_bonus_percen;
                        $promotion_multipy_turn = $con_multiply_turn;
                    }
                }

                $bonus_amount = ($last_topup->amount * $promotion_bonus_percen) / 100;

                if ($bonus_amount >= $promotion_max_credit) {
                    $bonus_amount = $promotion_max_credit;
                }

                // $min_withdraw = (($last_topup->amount+$bonus_amount)*2)+$last_topup->previous_balance;

                $data['first_topup'] = $this->balancemd->getCheckFirstBobus();

                if (0 == $turn_amount) {
                    // $min_withdraw = (($last_topup->amount + $bonus_amount) * $promotion_multipy_turn);
                    // แก้ไข จาก $last_topup เป็น $sum_topup
                    $min_withdraw = (($sum_topup + $bonus_amount) * $promotion_multipy_turn);
                    $memdata      = $this->membermd->getUserData(sess_userdata('id'));
                    $count_bonus  = $this->bonusmd->checkDupBonus10(sess_userdata('id'), getMemberTotalBalance(sess_userdata('id')), $bonus_amount);

                    $date = date("Y-m-d");

                    if ('BONUS' == $count_bonus->chanel and 1 == $count_bonus->is_bonus) {
                        // line_push_message("มีการรับโบนัสก่อนหน้าแล้วจำนวน " . $count_bonus->amount . " : คุณ {$memdata->id} {$memdata->name} {$memdata->surname}: " . date("Y-m-d H:i:s"));
                        $response['status']  = 'error';
                        $response['message'] = 'ขออภัยคะ ไม่สามารถรับเครดิตได้ กรุณาติดต่อเจ้าหน้าที่!';
                        echo json_encode($response);
                        die();
                    }
                    // sleep(rand(1, 20));

                    if ($promotion_cost_fixed > 0) {
                        // หาก fix ยอดจะไม่คำนวน Bonus ตาม %
                        $bonus_amount = $promotion_cost_fixed;
                    }

                    $deposit_log = array('member_id' => sess_userdata('id'),
                        'previous_balance'               => getMemberTotalBalance(sess_userdata('id')),
                        'amount'                         => $bonus_amount,
                        'datetime'                       => date('Y-m-d H:i:s'),
                        'status'                         => 1,
                        'channel'                        => 'BONUS',
                        'memo'                           => "รับโบนัส {$promotion_bonus_percen}% ({$bonus_amount} บาท) จากยอดฝาก {$last_topup->amount} สามารถถอนได้เมื่อมียอดมากกว่า หรือเท่ากับ {$min_withdraw} บาท",
                        'is_bonus'                       => 1);
                    $memo_log = 'รับโบนัส ' . $promotion_bonus_percen . '% (' . $bonus_amount . ' บาท) จากยอดฝาก ' . $last_topup->amount;
                    $this->topupmd->insert_deposit_logs($deposit_log);
                    $this->bonusmd->insertBonusLog($bonus_amount, $memo_log, $id, $last_topup->id);
                    $this->topupmd->update_first_time_topup(sess_userdata('id'));
                    $this->bonusmd->activeBonus($min_withdraw);
                    $this->bonusmd->setTurnWithdraw($min_withdraw);
                    $this->balancemd->setBonusUsed($last_topup->id);
                    $this->balancemd->setBonusAmount($last_topup->id, $bonus_amount);
                    $this->balancemd->setBonusAllUsed(sess_userdata('id'));

                    $response['status']  = 'success';
                    $response['message'] = 'รับโบนัสสำเร็จ ขอให้โชคดีคะ';
                    // line_push_message("รับโบนัส {$promotion_bonus_percen} ({$bonus_amount} บาท) จากยอดฝาก {$last_topup->amount} ($memdata->id):{$memdata->name} {$memdata->surname} เวลา " . date("Y-m-d H:i:s"));
                    echo json_encode($response);
                } else {
                    $response['status']  = 'error';
                    $response['message'] = 'ขออภัยคะ คุณติดเทิร์น ไม่สามารถรับโบนัสนี้ได้!!! ติดเทิร์นอยู่ที่ ' . $turn_amount;
                    echo json_encode($response);
                    die();
                }

            } else {
                $this->balancemd->setBonusAllUsed(sess_userdata('id'));
                $response['status']  = 'error';
                $response['message'] = 'ไม่สามารถรับโบนัสย้อนหลังได้';
                echo json_encode($response);
                die();
            }

        } else {
            // Promotion นอกเหนือ id 1,2
            if ('1' == $promotion_status && '1' == $pass_condition_date && '1' == $pass_condition_time && '1' == $pass_condition_credit) {

                if ('1' == $promotion_type && $count_used_bonus_all > 0) {
                    $response['status']  = 'error';
                    $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้ โปรโมชั่นนี้ สามารถรับได้ 1 ครั้งเท่านั้น';
                    echo json_encode($response);
                    die();
                }

                if ('2' == $promotion_type && $count_used_bonus_per_day > 0) {
                    $response['status']  = 'error';
                    $response['message'] = 'ขออภัยคะ คุณไม่สามารถรับโบนัสนี้ได้  โปรโมชั่นนี้ สามารถรับได้ 1 ครั้ง ต่อวัน เท่านั้น';
                    echo json_encode($response);
                    die();
                }

                if ($promotion_cost_fixed > 0) {
                    // เข้าเงื่อนไข Fix Cost

                    $response['status']  = 'error';
                    $response['message'] = 'ขออภัยคะ โปรโมชั่น ยังไม่เสร็จสมบุรณ์ กำลังอยู่ระหว่างดำเนินการ';
                    echo json_encode($response);
                    die();
                } else {
                    // // เงื่อนไขพิเศษ
                    $promotion_con_list = $this->bonusmd->getPromotion_con_by_promotion_id($id);
                    $last_topup_amount  = $last_topup->amount;
                    foreach ($promotion_con_list->result_array() as $row) {
                        $con_bonus_percen  = $row['bonus_percen'];
                        $con_multiply_turn = $row['multiply_turn'];
                        $con_min_amount    = $row['min_amount'];
                        $con_max_amount    = $row['max_amount'];

                        if ('1' == $promotion_condition_status && $last_topup_amount >= $con_min_amount && $last_topup_amount <= $con_max_amount) {
                            $promotion_bonus_percen = $con_bonus_percen;
                            $promotion_multipy_turn = $con_multiply_turn;
                        }
                    }

                    $bonus_amount = ($last_topup->amount * $promotion_bonus_percen) / 100;

                    if ($bonus_amount >= $promotion_max_credit) {
                        $bonus_amount = $promotion_max_credit;
                    }

                    $min_withdraw = (($last_topup->amount + $bonus_amount) * 2) + $last_topup->previous_balance;

                    $data['first_topup'] = $this->balancemd->getCheckFirstBobus();

                    if (0 == $turn_amount) {
                        $min_withdraw = (($last_topup->amount + $bonus_amount) * $promotion_multipy_turn);
                        $memdata      = $this->membermd->getUserData(sess_userdata('id'));
                        $count_bonus  = $this->bonusmd->checkDupBonus10(sess_userdata('id'), getMemberTotalBalance(sess_userdata('id')), $bonus_amount);

                        $date = date("Y-m-d");

                        if ('BONUS' == $count_bonus->chanel and 1 == $count_bonus->is_bonus) {
                            // line_push_message("มีการรับโบนัสก่อนหน้าแล้วจำนวน " . $count_bonus->amount . " : คุณ {$memdata->id} {$memdata->name} {$memdata->surname}: " . date("Y-m-d H:i:s"));
                            $response['status']  = 'error';
                            $response['message'] = 'ขออภัยคะ ไม่สามารถรับเครดิตได้ กรุณาติดต่อเจ้าหน้าที่!';
                            echo json_encode($response);
                            die();
                        }
                        // sleep(rand(1, 20));

                        // if โปร 3 ฝากล่าสุด - ฝากปัจจุบัน
                        if (3 == $id) {

                            $date_last_week         = strtotime("-7 days");
                            $last_week_datetime     = $last_week_topup->datetime;
                            $sto_last_week_datetime = strtotime($last_week_datetime);
                            if ($sto_last_week_datetime >= $date_last_week) {
                                $response['status']  = 'error';
                                $response['message'] = 'ขออภัยคะ ยอดฝากครั้งก่อนไม่ครบ 7 วัน กรุณาติดต่อเจ้าหน้าที่!';
                                echo json_encode($response);
                                die();
                            } else {

                            }
                        } else {
                            if (4 == $id) {
                                // 4. โปร ฝากประจำ มีขั้นต่ำ
                                // เช็คเงื่อนไข ฝากประจำย้อนหลัง ตาม ยอดขั้นต่ำที่ fix หลังบ้าน
                                $con_ever_list = $this->balancemd->getever_con_by_promotion_id($id);

                                $three_days_c   = $con_ever_list->three_days;
                                $seven_days_c   = $con_ever_list->seven_days;
                                $ten_days_c     = $con_ever_list->ten_days;
                                $fifteen_days_c = $con_ever_list->fifteen_days;

                                if (1 == $promotion_duplicate_other) {
                                    // เงื่อนไขซ้ำโบนัสอื่นได้หรือไม่
                                    // รับซ้ำได้ where is_bonus == 1
                                    $count_dep_can_get = $this->balancemd->count_dep_can_get(sess_userdata('id'), '1', $promotion_min_credit);
                                    // ผ่านเงื่อนไขกี่ยอด
                                    if ($count_dep_can_get >= 3 && $count_dep_can_get < 7) {
                                        $bonus_amount = $three_days_c;
                                    }
                                    else if ($count_dep_can_get >= 7 && $count_dep_can_get < 10) {
                                        $bonus_amount = $seven_days_c;
                                    }
                                    else if ($count_dep_can_get >= 10 && $count_dep_can_get < 15) {
                                        $bonus_amount = $ten_days_c;
                                    }
                                    else if ($count_dep_can_get == 15){
                                        $bonus_amount = $fifteen_days_c;
                                    } 
                                    else {
                                        $bonus_amount = 0;
                                    }
                                     
                                } else {
                                    // รับซ้ำไม่ได้ where is_bonus == 0
                                    $count_dep_can_get = $this->balancemd->count_dep_can_get(sess_userdata('id'), '0', $promotion_min_credit);
                                
                                    if ($count_dep_can_get >= 3 && $count_dep_can_get < 7) {
                                        $bonus_amount = $three_days_c;
                                    }
                                    else if ($count_dep_can_get >= 7 && $count_dep_can_get < 10) {
                                        $bonus_amount = $seven_days_c;
                                    }
                                    else if ($count_dep_can_get >= 10 && $count_dep_can_get < 15) {
                                        $bonus_amount = $ten_days_c;
                                    }
                                    else if ($count_dep_can_get == 15){
                                        $bonus_amount = $fifteen_days_c;
                                    } 
                                    else {
                                        $bonus_amount = 0;
                                    }
                                
                                }

                                // sum ยอดแต่ละวัน >= ขั้นต่ำ $promotion_min_credit

                            } else {
                                // 5. โปร ฝากประจำ ไม่มีขั้นต่ำ
                                // เช็คเงื่อนไข ฝากประจำย้อนหลัง ตาม ยอดขั้นต่ำที่ fix หลังบ้าน
                                if (1 == $promotion_duplicate_other) {
                                    // เงื่อนไขซ้ำโบนัสอื่นได้หรือไม่
                                    // รับซ้ำได้ where is_bonus == 1
                                    $count_dep_can_get = $this->balancemd->count_dep_can_get(sess_userdata('id'), '1', '0');
                                    // ผ่านเงื่อนไขกี่ยอด

                                    if ($count_dep_can_get >= 3 && $count_dep_can_get < 7) {
                                        $bonus_amount = $three_days_c;
                                    }
                                    else if ($count_dep_can_get >= 7 && $count_dep_can_get < 10) {
                                        $bonus_amount = $seven_days_c;
                                    }
                                    else if ($count_dep_can_get >= 10 && $count_dep_can_get < 15) {
                                        $bonus_amount = $ten_days_c;
                                    }
                                    else if ($count_dep_can_get == 15){
                                        $bonus_amount = $fifteen_days_c;
                                    } 
                                    else {
                                        $bonus_amount = 0;
                                    }

                                } else {
                                    // รับซ้ำไม่ได้ where is_bonus == 0
                                    $count_dep_can_get = $this->balancemd->count_dep_can_get(sess_userdata('id'), '1', '0');
                               
                                    if ($count_dep_can_get >= 3 && $count_dep_can_get < 7) {
                                        $bonus_amount = $three_days_c;
                                    }
                                    else if ($count_dep_can_get >= 7 && $count_dep_can_get < 10) {
                                        $bonus_amount = $seven_days_c;
                                    }
                                    else if ($count_dep_can_get >= 10 && $count_dep_can_get < 15) {
                                        $bonus_amount = $ten_days_c;
                                    }
                                    else if ($count_dep_can_get == 15){
                                        $bonus_amount = $fifteen_days_c;
                                    } 
                                    else {
                                        $bonus_amount = 0;
                                    }
                                }
                                // sum ยอดแต่ละวัน > 0
                            }

                            // Set ว่ายอดใช้งาน bonus ไปแล้ว
                            $this->balancemd->setcheckbonus($last_topup->id);
                        }
                        // ยอดฝากครั้งก่อน
                        if ($promotion_cost_fixed > 0) {
                            // หาก fix ยอดจะไม่คำนวน Bonus ตาม %
                            $bonus_amount = $promotion_cost_fixed;
                        }

                        $deposit_log = array('member_id' => sess_userdata('id'),
                            'previous_balance'               => getMemberTotalBalance(sess_userdata('id')),
                            'amount'                         => $bonus_amount,
                            'datetime'                       => date('Y-m-d H:i:s'),
                            'status'                         => 1,
                            'channel'                        => 'BONUS',
                            'memo'                           => "รับโบนัส ({$bonus_amount} บาท) จากโปรโมชั่น {$promotion_name} สามารถถอนได้เมื่อมียอดมากกว่า หรือเท่ากับ {$min_withdraw} บาท",
                            'is_bonus'                       => 1);
                        $memo_log = 'รับโบนัส (' . $bonus_amount . ' บาท) จากโปรโมชั่น ' . $promotion_name;
                        $this->topupmd->insert_deposit_logs($deposit_log);
                        $this->bonusmd->insertBonusLog($bonus_amount, $memo_log, $id, $last_topup->id);
                        $this->topupmd->update_first_time_topup(sess_userdata('id'));
                        $this->bonusmd->activeBonus($min_withdraw);
                        $this->bonusmd->setTurnWithdraw($min_withdraw);
                        $this->balancemd->setBonusUsed($last_topup->id);
                        $this->balancemd->setBonusAmount($last_topup->id, $bonus_amount);
                        $this->balancemd->setBonusAllUsed(sess_userdata('id'));

                        $response['status']  = 'success';
                        $response['message'] = 'รับโบนัสสำเร็จ ขอให้โชคดีคะ';
                        // line_push_message("รับโบนัส {$promotion_bonus_percen} ({$bonus_amount} บาท) จากยอดฝาก {$last_topup->amount} ($memdata->id):{$memdata->name} {$memdata->surname} เวลา " . date("Y-m-d H:i:s"));
                        echo json_encode($response);

                    }
                }

            } else {
                $response['status']  = 'error';
                $response['message'] = 'ขออภัยคะ โปรโมชั่นไม่เปิดใช้งาน';
                echo json_encode($response);
                die();
            }

        }

    }

}
