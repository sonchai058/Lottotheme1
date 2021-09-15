<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo strtoupper($title); ?></title>

    <meta name="description" content="<?php echo $description; ?><">
    <meta name="keywords" content="<?php echo $keywords; ?>">

    <meta property="og:url" content="<?php echo base_url(); ?>" />
    <meta property="og:type" content="game" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:image" content="<?php echo base_url(); ?>assets/images/icon.png" />
    
    <link rel="manifest" href="<?php echo base_url('manifest.json'); ?>">
    <meta name="theme-color" content="#0e0e16">

    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>assets/images/logo.png">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png'); ?>" type="image/x-icon">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/wheel')?>/css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="https://lotto88.com/favicon.png">
    <link data-n-head="ssr" data-hid="shortcut-icon" rel="shortcut icon" href="https://lotto88.com/_nuxt/icons/icon_64x64.6ac489.png">

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


        .spinBtn,#spinBtn, .toast p {
            color:#fff !important;
        }
        .spinBtn,#spinBtn {
            font-size: 24px;
            font-weight: bold;  
            background-color: #15bd96;
            color:#fff; 
            font-family: Prompt;
        }
        .btn-light,.btn-light *{
            color: #000 !important;
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


	<div class="container-fluid sticky-top">
        <div class="row">
            <div style="position:absolute; left:5px; top:15px">
                <a href="<?php echo site_url();?>" class="btn-back-to text-secondary text-decoration-none font-weight-bold" target="_self">
                    <i style="font-size: 30px;" class="fa fa-chevron-left"></i>
                </a>
            </div>
            <h4 class="text-center">
                <?php echo $title;?>
            </h4>
        </div>
	</div>

<div id="container">
        <button style="" id="spinBtn" onclick="if(point>=3){$('.spinBtn').click();}else{alert('แต้มคะแนนไม่พอ จะเล่นเกมได้!')}">>> กดเพื่อหมุน</button>
        <button style="display:none" class="spinBtn">>> กดเพื่อหมุน</button>
        <div class="wheelContainer">
            <svg class="wheelSVG" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" text-rendering="optimizeSpeed" preserveAspectRatio="xMidYMin meet">
                <defs>
                    <filter id="shadow" x="-100%" y="-100%">
                        <feOffset in="SourceAlpha" dx="0" dy="0" result="offsetOut"></feOffset>
                        <feGaussianBlur stdDeviation="9" in="offsetOut" result="drop" />
                        <feColorMatrix in="drop" result="color-out" type="matrix" values="0 0 0 0   0
              0 0 0 0   0 
              0 0 0 0   0 
              0 0 0 .3 0" />
                        <feBlend in="SourceGraphic" in2="color-out" mode="normal" />
                    </filter>
                </defs>
                <g class="mainContainer">
                    <g class="wheel">
                    </g>
                </g>
                <g class="centerCircle" />
                <g class="wheelOutline" />
                <g class="pegContainer" opacity="1">
                    <path class="peg" fill="#EEEEEE" d="M22.139,0C5.623,0-1.523,15.572,0.269,27.037c3.392,21.707,21.87,42.232,21.87,42.232 s18.478-20.525,21.87-42.232C45.801,15.572,38.623,0,22.139,0z" />
                </g>
                <g class="valueContainer" />
                <g class="centerCircleImageContainer" />
            </svg>
            <div class="toast">
                <p></p>
            </div>
        </div>
        <h5><i style="color:#F1C40F !important" class="fa fa-star" aria-hidden="true"></i> คะแนน : <span id="point"> <?php echo number_format($point,2);?></span></h5>
        <hr/>
        <h6 align="center">* ใช้จำนวน 3 แต้ม ในการหมุน 1 ครั้ง / สามารถรับแต้มได้จากกิจกรรมต่าง ๆ บนเว็บไซต์<h6>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/utils/Draggable.min.js'></script>
    <script src='<?php echo base_url('assets/wheel')?>/js/ThrowPropsPlugin.min.js'></script>
    <script>
        var site_url = '<?php echo site_url();?>';
        var base_url = '<?php echo base_url();?>assets/wheel/';
        var point = '<?php echo $point;?>';
        <?php
        if($id!=false) {
        ?>
            //alert("ท่านได้รับ 10 แต้มฟรี จากการเข้าใช้งานวันนี้!");
        <?php
        }
        ?>
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/plugins/TextPlugin.min.js'></script>

</body>

  <?php isset($page_js) ? $this->load->view('pages/' . $page_js, $data) : '';?>
 
  </body>

</html>