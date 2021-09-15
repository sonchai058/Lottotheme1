<?php
define('SITE_KEY', $site_key);
define('SECRET_KEY', $secret_key);

?>
<!DOCTYPE html>
<html lang="th">
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-confirm.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <meta name="theme-color" content="#0e0e16">
    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>assets/images/logo.png">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png'); ?>" type="image/x-icon">

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
        .header {
            //padding: 17px !important;
            padding: 1rem;
            background-color: rgb(162,28,28);
            background: linear-gradient(
            0deg
            , rgba(162,28,28,1) 0%, rgba(57,15,13,1) 100%);
        }
        .header1 {
            //padding: 17px !important;
            padding: 1rem;
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
            padding: 10px !important;
            font-weight: bold !important;
            padding: 22px !important;
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
            font-size: 16px !important;
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
    </style>
</head>
<body>





    <div class="container-fluid" id="__layout">

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
            <a href="login" class="nav-link exact-active active" target="_self">เข้าสู่ระบบ</a> 
         </div>
         <div class="align-self-center text-center mr-2 deposit-withdraw-desktop">
            <a href="register" class="nav-link" target="_self">สมัครสมาชิก</a>
         </div>

      </div>
   </div>
</div>
 

            <div class="row header1" style="margin-top:3px;">
                <div class="col-xs-12 text-center">
                 รวมทุกสิ่ง ในสิ่งเดียว&nbsp;<?php echo strtoupper('lottobetsvip');?>	
                </div>
            </div>

            <div class="" id="login">
                <!-- <div class="logo text-center mb-3"><img src="assets/images/logo.png" alt="Logo" class="animated bounce w-100"></div>-->
                <?php if ($close_login == '0') {
    echo '<i class="material-icons list-icon" id="alert_icon"></i>
                    <span style="font-weight:bold;text-align:center;color:red;">' . $text_login . '</span>';
} else {
    ?>

                <form id="formLogin" class="p-3 my-3" id="form-login" class="form-horizontal" method="post" action="<?php echo base_url('service/action/login'); ?>" style="padding: 30px 70px !important;">
                    <div class="row">
                        <div class="col-xs-12" style="font-size: 18px; font-weight:bold">
                            เข้าสู่ระบบ    
                        </div> 
                        <br/>
                        <div class="col-xs-12" style="rgb(0 0 0 / 50%) !important;">
                            ระบุเบอร์โทรศัพท์ / รหัสผ่าน      
                        </div> 
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert" role="alert" style="display: none;" id="form_alert">
                                <i class="material-icons list-icon" id="alert_icon"></i>
                                <span id="alert_text" style="font-weight:bold;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon" style="border: 0;"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="tel" placeholder="เบอร์โทรศัพท์" maxlength="10" name="phone_number" required="required" trim="" class="form-control form-control-lg" style="padding: 24px !important;">
                    </div>
                    <br/>

                    <div class="input-group">
                        <span class="input-group-addon" style="border: 0;"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" placeholder="รหัสผ่าน" name="password" require="" trim="" class="form-control form-control-lg" style="padding: 24px !important;">
                    </div>
                    <br/>

                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                    <div class="row">
                        <div class="col-xs-12">
                            <button type="button" onclick="formLoginSub()" class="nav-link btn btn-warning btn-lg btn-block btn-login" style="">
                                เข้าสู่ระบบ
                            </button>
                        </div>
                    </div>
                </form>
                <?php }
?>
                <hr/>
                <div class="row">
                    <div class="col-xs-12 text-center" style="font-size: 16px">
                        <span>ต้องการสมัครสมาชิกใช่ไหม? </span>
                        <a href="register" target="_self" class="text-warning" style="font-weight:bold; text-decoration: underline !important">
                            สมัครสมาชิก
                        </a>
                    </div>
                </div>
                
            </div>

    </div>

    <script>
    grecaptcha.ready(function() {
    grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'login'})
    .then(function(token) {
        document.getElementById('g-recaptcha-response').value=token;
    });
    });
    </script>

    <script>
        //eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$("8").a("9",5(e){2 1});$(b).h(5(0){3(0.4==g){2 1}6 3(0.7&&0.f&&0.4==c){2 1}6 3(0.7&&0.4==d){2 1}});',18,18,'event|false|return|if|keyCode|function|else|ctrlKey|html|contextmenu|on|document|73|85||shiftKey|123|keydown'.split('|'),0,{}))
        <?php if ($this->session->flashdata('err_message')) {?>
        $('#form_alert').attr('class', 'alert alert-danger');
        $('#alert_text').html('<?php echo $this->session->flashdata('err_message'); ?>');
        $("#form_alert").fadeTo(5000, 1000).slideUp(1000, function(){
            $("#form_alert").slideUp(1000);
        });
        <?php }?>
        //eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(E).F(\'D\',\'o#o-1\',8(e){$(\'.2-1\').6(\'กรุณารอสักครู่ <i 4="0 0-c 0-d 0-f"></i>\');$(\'.2-1\').j(\'l\',h);e.I();$.C({y:$(g).a(\'z\'),B:$(g).a(\'A\'),b:$(g).N(),J:{Q:8(){$(\'.2-1\').6(\'<i 4="0 0-q-r" t-s="h"></i> เข้าสู่ระบบ\');$(\'.2-1\').j(\'l\',p);$(\'#3\').a(\'4\',\'7 7-u\');$(\'#n\').6(\'R ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง\');k.w();$("#3").m(x,5).9(5,8(){$("#3").9(5)})}},v:8(b){S(b.O==\'K\'){$(\'.2-1\').6(\'<i 4="0 0-q-r" t-s="h"></i> เข้าสู่ระบบ\');$(\'.2-1\').j(\'l\',p);$(\'#3\').a(\'4\',\'7 7-u\');$(\'#n\').6(b.M);k.w();$("#3").m(x,5).9(5,8(){$("#3").9(5)})}L{$(\'.2-1\').6(\'กำลังตรวจสอบข้อมูล <i 4="0 0-c 0-d 0-f"></i>\');$(\'#3\').a(\'4\',\'7 7-v\');$(\'.2-1\').6(\'เสร็จสิ้น <i 4="0 0-c 0-d 0-f"></i>\');$(\'.2-1\').6(\'กำลังพาคุณเข้าสู่ระบบ <i 4="0 0-c 0-d 0-f"></i>\');$(\'#n\').6(\'กรุณารอสักครู่ กำลังพาคุณเข้าสู่ระบบ\');$("#3").m(G,5).9(5,8(){$("#3").9(5);H.k.P(\'/\')})}}})});',55,55,'fa|login|btn|form_alert|class|1000|html|alert|function|slideUp|attr|data|spinner|pulse||fw|this|true||prop|location|disabled|fadeTo|alert_text|form|false|unlock|alt|hidden|aria|danger|success|reload|7000|type|method|action|url|ajax|submit|document|on|2000|window|preventDefault|statusCode|error|else|message|serialize|status|replace|403|Token|if'.split('|'),0,{}))
        function formLoginSub() {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url('service/action/login'); ?>',
                data: $("#formLogin").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log(data); // show response from the php script.
                    if(data.status=='success') {
                        $('#form_alert').attr('class', 'alert alert-success');
                        $('#alert_text').html(data.message);
                        $("#form_alert").fadeTo(5000, 1000).slideUp(1000, function(){
                            $("#form_alert").slideUp(1000);
                        });
                        window.location.replace('<?php echo base_url('main');?>');
                    }else {
                        $('#form_alert').attr('class', 'alert alert-danger');
                        $('#alert_text').html(data.message);
                        $("#form_alert").fadeTo(5000, 1000).slideUp(1000, function(){
                            $("#form_alert").slideUp(1000);
                        });
                        setTimeout(function(){location.reload()},1000);
                    }
                }
            });
        }
    </script>
</body>
</html>