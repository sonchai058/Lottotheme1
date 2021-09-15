<?php
define('SITE_KEY', $site_key);
define('SECRET_KEY', $secret_key);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo strtoupper($title); ?></title>

    <meta name="description" content="<?php echo $description; ?><">
    <meta name="keywords" content="<?php echo $keywords; ?>">

    <meta property="og:url" content="<?php echo base_url(); ?>" />
    <meta property="og:type" content="game" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:image" content="<?php echo base_url(); ?>assets/images/logo.png" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scss/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-confirm.min.css?v=1">

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->

    <meta name="theme-color" content="#0e0e16">

    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>assets/images/logo.png">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png'); ?>" type="image/x-icon">

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key; ?>"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-confirm.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">
    <style type="text/css">
        .nav-header-auth .nav-link {
            padding: 7px 15px !important;
        }
        * {
            color: #fff !important;
            font-family: 'Prompt', sans-serif;
        }
        .jconfirm  *{
            color: #333 !important;
        }
        .jconfirm input {
            color: #fff !important;
        }
        .header {
            //padding: 17px !important;
            padding: 0.8rem;
            background-color: rgb(162,28,28);
            background: linear-gradient(
            0deg
            , rgba(162,28,28,1) 0%, rgba(57,15,13,1) 100%);
        }
        .header1 {
            //padding: 17px !important;
            padding: 0.8rem;
            background-color: rgb(162,28,28);
            background: linear-gradient( 
        12deg
        , rgba(162,28,28,1) 0%, rgba(57,15,13,1) 100%);
            color: #fff !important;
            font-size: 16px !important;
            font-weight: bold;
        }
        .header * {
            color: #fff !important;
            font-size: 18px !important;
        }
        .header .col-xs-12 {
            padding: 0px !important;
        }
        .col-xs-12 {
            width: 100%;
        }
        .header a.active {
            font-weight: bold !important;
        }
        .text-primary {
            color: #ffbe00 !important;
        }
        input {
            font-size: 18px !important;
            background-color:#2A2A2A !important;
            border: 0 !important;
            color: #fff !important;
            //padding: 10px !important;
            font-weight: bold !important;
            padding: 16px !important;
        }
        span.input-group-addon,.input-group-prepend i {
            background-color:#2A2A2A !important;
            color: #fff !important;
            font-size: 20px !important;
        }
        .nav-item {
            margin-right: 5px !important;
        }
        .nav-link {
                padding-left: 10px;
                padding-right: 10px;
                font-weight: 200;
                border-radius: 1rem;
                padding: .8rem 1.5rem;
                font-size: 1.1rem;
                color: white;
                border: 2px solid white;
                background: rgb(207,42,42);
                background: linear-gradient(
            180deg
            , rgba(207,42,42,1) 0%, rgba(62,15,15,1) 100%);
            font-size: 14px !important;
            border: 1.5px #fff solid !important;
            text-align: center;
            width: 100% !important;
        }
        .nav-link:hover {
            border: 2px solid white;
                background: rgb(207,42,42);
                background: linear-gradient(
            180deg
            , rgba(62,15,15,1) 0%, rgba(207,42,42,1) 100%);
                    }
        body {
            background-image: url(<?php echo base_url('assets/images/bg.png');?>);
            background-repeat: no-repeat;
            background-position: center;
            /* background-size: 2100px 1100px; */
            background-size: cover;
            background-attachment: fixed;
        }
        .alert {
            background-color :#CCA857 !important;
        }
        .alert * {
            font-size: 18px !important;
            color: #000 !important;
        }
        
        .header a.active {
            font-weight: bold !important;
        }
        .main-container.container-fluid {
            //background-color: #fff !important; 
        }
        input {
            //background-color:#F0F0F0 !important;
           // border: 0 !important;
        }
        .text-primary {
            color: #ffbe00 !important;
        }
        .btn-primary {
            background-color: #ffbe00 !important;
        }
        .btn-primary {
            background-color: #ffbe00 !important;
        }
        .navigator{
            border-radius: none !important;
            background-color:transparent !important;
            box-shadow: 0 -3px 6px rgb(0 0 0 / 8%) !important;
        }
        .sticky-top {
            padding: 1.8rem !important;
                background-color: rgb(162,28,28);
                background: linear-gradient( 
            12deg
            , rgba(162,28,28,1) 0%, rgba(57,15,13,1) 100%);
                color: #fff !important;
                font-size: 18px !important;
                font-weight: bold;
        }
        .btn-light,.btn-light *{
            color: #000 !important;
        }
        .nav-item a *{
            color: #fff !important;
            font-size: 18px !important;
        }
        .bg-dark {
            background-color: #17a4ba59 !important;
        }
        
    </style>
</head>

<body>

<div class="row header">
   <div class="d-flex justify-content-between top-bar">
      <div class="align-self-center">
            <div class="col-xs-12">
                    <ul class="nav nav-header-auth">
                        <li class="nav-item"><a style="border: 0 !important;background: transparent;" href="login" class="nav-link" target="_self"><img width="100px" src="<?php echo base_url(); ?>assets/images/logo1.png"></a></li>
                        <!--<li class="nav-item" style="padding-top: 35px;"><a href="login" class="nav-link" target="_self">เข้าสู่ระบบ</a></li>
                        <li class="nav-item" style="padding-top: 35px;"><a href="register" class="nav-link exact-active active" target="_self">สมัครสมาชิก</a></li>-->
                    </ul>
            </div>
      </div>
      <div class="align-self-center"></div>
      <div class="d-flex justify-content-center">
         <div class="align-self-center text-center mr-2 deposit-withdraw-desktop">
            <a href="login" class="nav-link" target="_self">เข้าสู่ระบบ</a> 
         </div>
         <div class="align-self-center text-center mr-2 deposit-withdraw-desktop">
            <a href="register" class="nav-link exact-active active" target="_self">สมัครสมาชิก</a>
         </div>

      </div>
   </div>
</div>

    <div id="__layout">
        <div class="main-container container-fluid">
            <div class="form-sm df-full container">
 
                <!-- ลบ style="display:none;" ออกด้วยครับ -->
                <div class="df-full">
                    <div class="py-5"> 
                        <?php if ('0' == $close_register) {
    echo '<div class="df-full d-flex align-items-center justify-content-center flex-column text-center">
    <h3 class="mt-5">'.$text_register.' <span class="text-primary">เวลาประมาณ 9.30-12.30 น.</span></h3>
    <div class="d-flex flex-column alitn-items-center justify-content-center">

    </div>
</div>';
} else {

    ?>



                        <div class="alert" role="alert" style="display: none;" id="form_alert">
                            <i class="material-icons list-icon" id="alert_icon"></i>
                            <span id="alert_text" style="font-weight:bold;"></span>
                        </div>
                        <form id="form-register" method="post"
                            action="<?php echo base_url('service/action/register'); ?>">

                            <!-- Step 1 -->
                            <div id="register-step1" style="display:block;">
                                <h3 class="text-primary">STEP 1 OF 4</h3>
                                <div class="pb-5">
                                    <h3 class="fs-lg font-weight-bold m-0">สมัครสมาชิกใหม่</h3>
                                    <p class="text-muted fs-sm m-0">กรุณากรอกเบอร์โทรศัพท์ของคุณ</p>
                                    <input type="hidden" name="know_form" value="<?php echo $referer_site;?>">
                                </div>
                                <div>
                                    <fieldset class="form-group form-group-custom">
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <span>
                                                <div role="group" class="input-group">
                                                    <div class="input-group-prepend">
                                                        <i class="fal fa-mobile-android"></i>
                                                    </div>
                                                    <input style="padding-left: 30px !important" type="tel" name="phone_otp" pattern="[0-9]{10}"
                                                        onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                                        minlength="10" maxlength="10" placeholder="เบอร์โทรศัพท์"
                                                        class="phone-input inputs name form-control form-control-lg form-control"
                                                        require="">
                                                    <input type="hidden" name="otpcode">
                                                    <input type="hidden" id="g-recaptcha-response"
                                                        name="g-recaptcha-response" />

                                                </div>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="progress mb-3" style="height:5px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 0%"></div>
                                        </div>
                                        <button class="nav-link btn btn-primary btn-lg btn-block otp" type="button"
                                            name="get_otp">ถัดไป</button>
                                    </fieldset>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div id="register-step2" style="display:none;">
                                <h3 class="text-primary">STEP 2 OF 4</h3>
                                <div class="pb-5">
                                    <h3 class="fs-lg font-weight-bold m-0">ข้อมูลบัญชี</h3>
                                    <p class="text-muted fs-sm m-0">กรุณากรอกข้อมูลจริง เพื่อใช้ในการฝากถอนเงิน</p>
                                </div>
                                <div class="form-row">
                                    <fieldset class="form-group form-group-custom col-6">
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <span>
                                                <div role="group" class="input-group">
                                                    <div class="input-group-prepend">
                                                        <i class="fal fa-user-circle"></i>
                                                    </div>
                                                    <input type="hidden" id="phone_number" name="phone_number"
                                                        require="">
                                                    <input type="text" name="name" placeholder="ชื่อจริง"
                                                        class="form-control form-control-lg form-control" require="">
                                                </div>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group form-group-custom col-6">
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <span>
                                                <div role="group" class="input-group">
                                                    <div class="input-group-prepend">
                                                        <i class="fal fa-signature"></i>
                                                    </div>
                                                    <input type="text" name="surname" placeholder="นามสกุล"
                                                        class="form-control form-control-lg form-control" require="">
                                                </div>
                                            </span>
                                        </div>
                                    </fieldset>
                                </div>
                                <fieldset class="form-group form-group-custom">
                                    <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                        <span>
                                            <div role="group" class="input-group">
                                                <div class="input-group-prepend">
                                                    <i class="fal fa-university"></i>
                                                </div>
                                                <select id="bank_id" name="bank_id" class="form-control form-control-lg"
                                                    require="">
                                                    <option value="014" selected>ธนาคารไทยพาณิชย์ จำกัด (มหาชน)</option>
                                                    <option value="002">ธนาคารกรุงเทพ จำกัด (มหาชน)</option>
                                                    <option value="004">ธนาคารกสิกรไทย จำกัด (มหาชน)</option>
                                                    <option value="006">ธนาคารกรุงไทย จำกัด (มหาชน)</option>
                                                    <option value="034">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
                                                    <option value="011">ธนาคารทหารไทย จำกัด (มหาชน)</option>
                                                    <option value="022">ธนาคาร ซีไอเอ็มบี ไทย จำกัด (มหาชน)</option>
                                                    <option value="024">ธนาคารยูโอบี จำกัด (มหาชน)</option>
                                                    <option value="025">ธนาคารกรุงศรีอยุธยา จำกัด (มหาชน)</option>
                                                    <option value="030">ธนาคารออมสิน</option>
                                                    <option value="073">ธนาคารแลนด์ แอนด์ เฮ้าส์ จำกัด (มหาชน)</option>
                                                    <option value="065">ธนาคารธนชาต จำกัด (มหาชน)</option>
                                                    <option value="067">ธนาคารทิสโก้ จำกัด (มหาชน)</option>
                                                    <option value="069">ธนาคารเกียรตินาคิน จำกัด (มหาชน)</option>
                                                </select>
                                            </div>
                                        </span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group form-group-custom">
                                    <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                        <span>
                                            <div role="group" class="input-group">
                                                <div class="input-group-prepend">
                                                    <i class="fal fa-lock"></i>
                                                </div>
                                                <input type="text" name="bank_account_number"
                                                    onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="12"
                                                    placeholder="เลขบัญชี"
                                                    class="form-control form-control-lg form-control" require="">
                                            </div>
                                        </span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group form-group-custom">
                                    <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                        <span>
                                            <div role="group" class="input-group">
                                                <div class="input-group-prepend">
                                                    <i class="fal fa-user-circle"></i>
                                                </div>
                                                <input id="identification_front" type="text"
                                                    oninput="IDCRecheck(this.value);"
                                                    onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="13"
                                                    pattern="^[0-9]{13}" name="identification_front"
                                                    placeholder="เลขบัตรประจำตัว 13 หลัก"
                                                    class="form-control form-control-lg form-control" require="">
                                            </div>
                                        </span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group form-group-custom">
                                    <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                        <span>
                                            <div role="group" class="input-group">
                                                <div class="input-group-prepend">
                                                    <i class="fal fa-lock"></i>
                                                </div>
                                                <input type="hidden" name="line_id" value="0">
                                                <input name="identification_back"
                                                    class="form-control form-control-lg form-control" autocomplete="off"
                                                    autocorrect="off" autocapitalize="off" spellcheck="false"
                                                    type="text" maxlength="14"
                                                    pattern="^[a-zA-Z]{2}[0-9]{10}|^[a-zA-Z]{2}[0-9]-[0-9]{7}-[0-9]{2}"
                                                    id="identification_back" required
                                                    oninput="this.value = this.value.toUpperCase();CIDBDetector();"
                                                    onkeyup="this.value = this.value.replace(/[^a-zA-Z0-9\s]/gi, '')"
                                                    placeholder="เลขหลังบัตรประชาชน">
                                            </div>
                                        </span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <div class="progress mb-3" style="height:5px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 50%"></div>
                                    </div>
                                    <button type="button" name="register"
                                        class="nav-link btn btn-primary btn-lg btn-block btn-register step2" disabled="disabled">
                                        กรุณายืนยัน OTP
                                    </button>
                                </fieldset>
                            </div>
                            <!-- <fieldset class="form-group form-group-custom">
                                <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                    <span>
                                        <div role="group" class="input-group">
                                            <div class="input-group-prepend">
                                             <i class="fal fa-users"></i>
                                            </div>
                                            <select name="line_id" class="form-control form-control-lg" require="">
                                                <option value="ชาย" selected>ชาย</option>
                                                <option value="หญิง">หญิง</option>
                                            </select>

                                        </div>
                                    </span>
                                </div>
                            </fieldset>
                            <fieldset class="form-group form-group-custom">
                                <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                    <span>
                                        <div role="group" class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fal fa-lock"></i>
                                            </div>
                                            <input type="text" name="password" placeholder="รหัสผ่าน" class="form-control form-control-lg form-control" require="">
                                        </div>
                                        <small class="fs-sm text-danger mt-2">* รหัสต้องมีตัวพิมพ์ใหญ่ ตัวพิมเล็กและตัวเลข เช่น Aa123456</small>
                                    </span>
                                </div>
                            </fieldset>
                            <fieldset class="form-group form-group-custom">
                                <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                    <span>
                                        <div role="group" class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="fal fa-users"></i>
                                            </div>

                                            <select name="know_form" class="form-control form-control-lg" require="">
                                            <?php if ($ref_id): ?>
                                                <option value="friend"  selected>เพื่อนแนะนำ</option>
                                                <?php else: ?>
                                                <option value="other" selected>โฆษณาอื่น ๆ</option>
                                                <option value="facebook">Facebook</option>
                                                <option value="line">Line</option>
                                                <option value="google">Google</option>
                                                <option value="instargram">Instargram</option>
                                                <option value="youtube">Youtube</option>
                                                <option value="sms">SMS</option>
                                                <?php endif?>
                                            </select>
                                        </div>
                                        <small class="fs-sm text-danger mt-2">* ช่องทางรู้จักเรา</small>
                                    </span>
                                </div>
                            </fieldset>
                            <fieldset class="form-group form-group-custom">
                                <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                    <span>
                                        <div role="group" class="input-group">
                                            <div class="input-group-prepend">
                                            <i class="fal fa-plus-circle"></i>
                                            </div>
                                            <select name="bonus_status" class="form-control form-control-lg" require="">
                                                <option value="0">รับโปรโมชั่น</option>
                                                <option value="1"  selected>ไม่รับโปรโมชั่น</option>
                                            </select>

                                        </div>
                                    </span>
                                </div>
                            </fieldset>
                            -->



                            <!-- Step3 -->
                            <div id="register-step3" style="display:none;">
                                <h3 class="text-primary">STEP 3 OF 4</h3>
                                <div class="pb-5">
                                    <h3 class="fs-lg font-weight-bold m-0">ข้อมูลเพิ่มเติม</h3>
                                    <p class="text-muted fs-sm m-0">กรุณากรอกข้อมูลเพิ่มเติม</p>
                                </div>
                                <div>

                                    <fieldset class="form-group form-group-custom">
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <span>
                                                <div role="group" class="input-group">
                                                    <div class="input-group-prepend">
                                                        <i class="fal fa-plus-circle"></i>
                                                    </div>
                                                    <select name="bonus_status" class="form-control form-control-lg"
                                                        require="">
                                                        <option value="0" selected>รับโปรโมชั่น</option>
                                                        <option value="1">ไม่รับโปรโมชั่น</option>
                                                    </select>

                                                </div>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <?php if ($ref_id): ?>
                                    <input type="hidden" name="ref_id" value="<?php echo $ref_id; ?>">
                                    <small class="fs-sm text-success mt-2 text-center">* รหัสคนแนะนำ
                                        <?php echo $ref_id; ?></small>
                                    <?php else: ?>
                                    <fieldset class="form-group form-group-custom">
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <span>
                                                <div role="group" class="input-group">
                                                    <div class="input-group-prepend">
                                                        <i class="fal fa-lock"></i>
                                                    </div>
                                                    <input type="text" name="ref_code" placeholder="Affiliate Code"
                                                        class="form-control form-control-lg form-control">
                                                </div>
                                                <small class="fs-sm text-danger mt-2">* รหัสคนแนะนำ</small>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <?php endif?>
                                    <fieldset class="form-group">
                                        <div class="progress mb-3" style="height:5px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 85%"></div>
                                        </div>
                                        <button class="nav-link btn btn-primary btn-lg btn-block step3"
                                            type="button">สมัครสมาชิก</button>
                                    </fieldset>
                                </div>
                            </div>
                            <!-- Step 4 -->
                            <div id="register-step4" style="display:none;">
                                <h3 class="text-primary">STEP 4 OF 4</h3>
                                <div class="pb-5">
                                    <h3 class="fs-lg font-weight-bold m-0">ตั้งรหัสผ่าน</h3>
                                    <p class="text-muted fs-sm m-0">รหัสต้องมีตัวพิมพ์ใหญ่ ตัวพิมเล็กและตัวเลข เช่น
                                        Aa123456</p>
                                </div>
                                <div>

                                    <fieldset class="form-group form-group-custom">
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <span>
                                                <div role="group" class="input-group">
                                                    <div class="input-group-prepend">
                                                        <i class="fal fa-lock"></i>
                                                    </div>
                                                    <input type="text" name="password" placeholder="รหัสผ่าน"
                                                        class="form-control form-control-lg form-control" require="">
                                                </div>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="progress mb-3" style="height:5px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 100%"></div>
                                        </div>
                                        <button class="nav-link btn btn-primary btn-lg btn-block step4" type="submit"
                                            disabled="disabled">ยืนยัน</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo js_res('js/jquery.min.js'); ?>
    <?php echo js_res('js/popper.min.js'); ?>
    <?php echo js_res('js/bootstrap.min.js'); ?>
    <?php echo js_res('js/jquery-confirm.min.js'); ?>
    <?php echo js_res('js/digitalKeyboard.js'); ?>
    <?php echo js_res('js/bootstrap-notify.js'); ?>
    <?php $this->load->view('layout/masterjs');?>

    <?php isset($page_js) ? $this->load->view('pages/' . $page_js, $data) : '';?>
    <script>
    $(".phone-input").keydown(function(event) {
        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || (
                event.keyCode == 8 || event.keyCode == 46)) {} else {
            event.preventDefault();
        }
    });
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo SITE_KEY; ?>', {
                action: 'register'
            })
            .then(function(token) {
                //console.log(token);
                document.getElementById('g-recaptcha-response').value = token;
            });
    });
    </script>
</body>

</html>