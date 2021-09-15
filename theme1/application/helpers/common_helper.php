<?php defined('BASEPATH') or exit('No direct script access allowed');

use Carbon\Carbon;

function thaiDateTime($strDate)
{
    $strYear      = date("Y", strtotime($strDate)) + 543;
    $strMonth     = date("n", strtotime($strDate));
    $strDay       = date("j", strtotime($strDate));
    $strHour      = date("H", strtotime($strDate));
    $strMinute    = date("i", strtotime($strDate));
    $strSeconds   = date("s", strtotime($strDate));
    $strMonthCut  = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}

function thaiDate($strDate)
{
    $strYear      = date("Y", strtotime($strDate)) + 543;
    $strMonth     = date("n", strtotime($strDate));
    $strDay       = date("j", strtotime($strDate));
    $strHour      = date("H", strtotime($strDate));
    $strMinute    = date("i", strtotime($strDate));
    $strSeconds   = date("s", strtotime($strDate));
    $strMonthCut  = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

function getSetting()
{
    $setting = "";
    return json_decode($setting);
}

function webSetting($field)
{
    $setting = getSetting();

    return $setting->$field;
}

function diffForHuman($datetime)
{
    $str_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->locale('th')->diffForHumans();
    return $str_datetime;
}

function ymdhiFormat($datetime)
{
    $str_datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->locale('th')->format('l jS \\of F Y h:i:s A');
    return $str_datetime;
}

function withdrawStatus($status, $reason = null)
{
    switch ($status) {
        case '0':
            return "รอดำเนินการ";
            break;
        case '1':
            return "สำเร็จ";
            break;
        case '9':
            return "กำลังดำเนินการ";
            break;
        case '2':
            return "ไม่สำเร็จ : {$reason}";
            break;
        default:
            return "รอดำเนินการ";
            break;
    }
}

function withdrawStatusClass($status)
{
    switch ($status) {
        case '0':
            return "text-warning";
            break;
        case '1':
            return "text-success";
            break;
        case '2':
            return "text-danger";
            break;
        case '9':
            return "text-info";
            break;
        default:
            return "text-muted";
            break;
    }
}

function depositStatus($status)
{
    switch ($status) {
        case '0':
            return "รอดำเนินการ";
            break;
        case '1':
            return "สำเร็จ";
            break;
        case '2':
            return "ไม่สำเร็จ";

        case '9':
            return "ยอดค้าง";

        default:
            return "รอดำเนินการ";
            break;
    }
}

function depositStatusClass($status)
{
    switch ($status) {
        case '0':
            return "text-warning";
            break;
        case '1':
            return "text-success";
            break;
        case '2':
            return "text-danger";
            break;
        case '9':
            return "text-danger";
            break;
        default:
            return "text-muted";
            break;
    }
}

function topupChannel($channel)
{
    switch ($channel) {
        case 'BAY':
            return 'ธนาคารกรุงศรีอยุธยา (BAY)';
            break;
        case 'SCB':
            return 'ธนาคารไทยพาณิชย์ (SCB)';
            break;
        case 'KBANK':
            return 'ธนาคารกสิกรไทย (KBANK)';
            break;
        case 'MANUAL':
            return 'แจ้งเติมเงินผ่านพนักงาน';
            break;
        case 'BONUS':
            return 'รับโบนัส';
            break;
        default:
            return 'ไม่ระบุช่องทาง';
            break;
    }
}

function hold_deposit()
{
    $CI = &get_instance();
    $CI->load->model('process/Balance_model', 'balancem');

    $hold_data = $CI->balancem->holdDeposit();

    return $hold_data;
}

function getReferer()
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model', 'member');
    $ref_id      = $CI->session->userdata('ref_id');
    $member_data = $CI->member->getUserData($ref_id);

    if (count($member_data) > 0) {
        $referer_data = "คุณ" . $member_data->name . " " . $member_data->surname . " (" . $member_data->id . ")";
        return $referer_data;
    }
}

function getMemberTotalBalance($member_id)
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model');
    $CI->load->model('process/Balance_model');
    $member_detail    = $CI->Member_model->getMemberDetail($member_id);
    $data_res->wallet = $CI->Balance_model->getMemberWalletBalance($member_id);
    $wallet_balance   = $data_res->wallet->wallet_balance;

    return $wallet_balance;
}

function getWithdrawRemain()
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model', 'member');
    // $getSetting = getSetting();
    $withdraw_count  = $CI->member->withdraw_count(sess_userdata('id'));
    $withdraw_limit  = $CI->member->withdraw_remain_from_config(1); // หาจาก ID = 1
    $withdraw_remain = $withdraw_limit - $withdraw_count;
    return $withdraw_remain;
}

function getWithdrawstatus()
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model', 'member');
    // $getSetting = getSetting();
    $withdraw_status = $CI->member->withdraw_status_from_config(1); // หาจาก ID = 1
    return $withdraw_status;
}

function getWithdrawConfig()
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model', 'member');
    // $getSetting = getSetting();
    $withdraw = $CI->member->withdraw_config(1); // หาจาก ID = 1
    return $withdraw;
}

function getWithdrawCount()
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model', 'member');
    // $getSetting     = getSetting();
    $withdraw_count = $CI->member->withdraw_count(sess_userdata('id'));
    return $withdraw_count;
}

function getMaxWithdrawPerDay()
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model', 'member');
    $withdraw_per_day = $CI->member->withdraw_remain_from_config(1);
    return $withdraw_per_day;

}

function is_allow_browser()
{
    $CI     = &get_instance();
    $arr    = explode(" ", $CI->agent->agent);
    $lastEl = array_values(array_slice($arr, -1))[0];
    $agent  = explode("/", $lastEl);

    $not_support = array("[FB_IAB", "Line", "[FBAN");
    if (in_array($agent[0], $not_support)) {
        redirect(base_url('browser-not-allow'), 'refresh');
    }
}

function getBankName($str_bnk)
{
    if (!get_magic_quotes_gpc()) {
        $str_bnk = addslashes($str_bnk);
    }
    $str_bnk = str_replace("000", "ทำรายการผ่านตู้ ATM", $str_bnk);
    $str_bnk = str_replace("014", "ไทยพาณิชย์ (SCB)", $str_bnk);
    $str_bnk = str_replace("002", "กรุงเทพ (BBL)", $str_bnk);
    $str_bnk = str_replace("004", "กสิกรไทย (KBANK)", $str_bnk);
    $str_bnk = str_replace("006", "กรุงไทย (KTB)", $str_bnk);
    $str_bnk = str_replace("034", "ธกส. (BAAC)", $str_bnk);
    $str_bnk = str_replace("011", "ทหารไทย (TMB)", $str_bnk);
    $str_bnk = str_replace("022", "(SCIB)", $str_bnk);
    $str_bnk = str_replace("024", "ยูโอบี (UOB)", $str_bnk);
    $str_bnk = str_replace("025", "กรุงศรีอยุธยา(BAY)", $str_bnk);
    $str_bnk = str_replace("030", "ออมสิน (GSB)", $str_bnk);
    $str_bnk = str_replace("073", "แลนด์แอนเฮาส์ (LHBANK)", $str_bnk);
    $str_bnk = str_replace("065", "ธนชาติ (TBANK)", $str_bnk);
    $str_bnk = str_replace("067", "ทิสโก้ (TISCO)", $str_bnk);
    $str_bnk = str_replace("069", "เกียรตินาคิน (KK)", $str_bnk);
    return $str_bnk;
}
