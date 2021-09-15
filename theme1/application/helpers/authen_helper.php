<?php
function is_login()
{
    $CI      = &get_instance();
    $session = $CI->session->userdata('usess');
  
    if (empty($session)) {
        // echo "test";
        //  print_r($session);
        // die();
        $CI->session->set_flashdata('err_message', 'กรุณาเข้าสู่ระบบ!');
        redirect(base_url('login'), 'refresh');
    }

    $brownser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

    if ($brownser == 'IE' || $brownser == 'Firefox' || $brownser == 'Opera' || $brownser == 'Edge') {
        $CI->session->set_flashdata('err_message', 'กรุณาใช้ Google Chorme!!');
        redirect(base_url('login'), 'refresh');
    }

}

function is_register()
{
    $CI       = &get_instance();
    $brownser = get_browser_name($_SERVER['HTTP_USER_AGENT']);

    if ($brownser == 'IE' || $brownser == 'Firefox' || $brownser == 'Opera' || $brownser == 'Edge') {
        $CI->session->set_flashdata('err_message', 'กรุณาใช้ Google Chorme!!');
        redirect(base_url('login'), 'refresh');
    }

}

function is_nothave_username() {
    $CI = &get_instance();
    $CI->load->model('process/Member_model');
    $username = $CI->Member_model->getUserData(sess_userdata('id'))->username;

    if ($username != null || $username != "") {

    }
    else {
        $CI->session->set_flashdata('err_message', 'กรุณาทำการร้องขอบัญชีให้เรียบร้อย');
         redirect(base_url('/'), 'refresh');
    }


}

function get_browser_name($user_agent)
{
    // Make case insensitive.
    $t = strtolower($user_agent);

    // If the string *starts* with the string, strpos returns 0 (i.e., FALSE). Do a ghetto hack and start with a space.
    // "[strpos()] may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE."
    //     http://php.net/manual/en/function.strpos.php
    $t = " " . $t;

    // Humans / Regular Users
    if (strpos($t, 'opera') || strpos($t, 'opr/')) {
        return 'Opera';
    } elseif (strpos($t, 'edge')) {
        return 'Edge';
    } elseif (strpos($t, 'chrome')) {
        return 'Chrome';
    } elseif (strpos($t, 'safari')) {
        return 'Safari';
    } elseif (strpos($t, 'firefox')) {
        return 'Firefox';
    } elseif (strpos($t, 'msie') || strpos($t, 'trident/7')) {
        return 'IE';
    }

}

function getLastLogin()
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model');
    $datetime = $CI->Member_model->getLastLogin(sess_userdata('id'));

    if (!empty($datetime)) {
        return $datetime;
    } else {
        return date('Y-m-d H:i:s');
    }
}

function sess_userdata($field)
{
    $CI      = &get_instance();
    $session = $CI->session->userdata('usess');

    return $session->$field;
}

function db_userdata($field)
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model');

    $userdata = $CI->Member_model->getUserData(sess_userdata('id'));
    return $userdata->$field;
}

function sess_bankdata($field = null)
{
    $CI = &get_instance();
    $CI->load->model('process/Member_model');

    $bank_data = $CI->Member_model->getMemberBankDetail(sess_userdata('id'));

    if (!empty($bank_data->$field)) {
        return $bank_data->$field;
    } else {
        return 'ไม่มีข้อมูล';
    }
}

function game_account()
{
    $CI      = &get_instance();
    $session = $CI->session->userdata('game_account');

    if ($session) {
        $acc = $session;
        return $acc;
    } else {
        $m_id  = sess_userdata('id');
        $m_wpd = sess_userdata('password');

        if (empty($m_id)) {
            return false;
            exit();
        }

        $CI->load->model('process/Member_model');

        $slotxo_acc = $CI->Member_model->GetSlotXO($m_id, $m_wpd);
        $live22_acc = $CI->Member_model->GetLive22($m_id, $m_wpd);

        $arr = (object) array('slotxo' => $slotxo_acc,
            'live22'                       => $live22_acc);

        $game_account = (object) array('game_account' => (object) array('slotxo' => $slotxo_acc,
            'live22'                                                                 => $live22_acc));

        $CI->session->set_userdata($game_account);

        return $arr;
    }
}

function getLastWithdraw()
{
    $CI = &get_instance();
    $CI->load->model('process/Logs_model');
    $data = $CI->Logs_model->getLastWithdrawLogs();

    return $data->amount;
}

function isActiveBonus()
{
    $CI = &get_instance();
    $CI->load->model('process/Topup_model');
    $CI->load->model('Bonus_model');

    $status = $CI->Topup_model->check_if_bonus_active(sess_userdata('id'));

    if ($status === true) {
        return true;
    } else {
        return false;
    }

}

function getMinWithdrawAmount()
{
    $CI = &get_instance();
    $CI->load->model('Bonus_model');

    $minWithdraw = $CI->Bonus_model->getMinWithdraw(sess_userdata('id'));

    if (is_null($minWithdraw)) {
        return 300;
        exit();
    }

    return $minWithdraw;
}

function error_attemp()
{
    $CI      = &get_instance();
    $attempt = $CI->session->userdata('err_attempt');
    $attempt++;
    $CI->session->sess_expiration = '30';
    $CI->session->set_userdata('err_attempt', $attempt);

    if ($attempt == 5) {
        $CI->session->unset_userdata('usess');
        $CI->session->unset_userdata('err_attempt');
        $CI->session->set_flashdata('err_message', 'คุณทำรายการผิดเกินจำนวนครั้งที่กำหนด!');
        redirect('login', 'refresh');
    }
}
