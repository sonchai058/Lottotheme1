<!DOCTYPE html>
<html lang="en">
    <head>
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

    <link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>assets/images/logo.png">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png'); ?>" type="image/x-icon">

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
            //color: #000 !important;
            font-family: 'Prompt', sans-serif;
        }
        /*
        .header {
            //padding: 17px !important;
            padding: 1rem;
            background-color: rgb(162,28,28);
            background: linear-gradient(
            0deg
            , rgba(162,28,28,1) 0%, rgba(57,15,13,1) 100%);
        }
        */
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
        /*
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
        */
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
        .sticky-top,.navbar.navbar-inverse {
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
        .modal-content *{
            color: #000 !important;
            text-align: left !important;
        }
        body {
            color:#fff !important;
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
<body class="bg-theme">


    <?php isset($page_header) ? $this->load->view('pages/' . $page_header, $data) : '';?>
    <?php isset($page_content) ? $this->load->view('pages/' . $page_content, $data) : '';?>

    <?php isset($page_js_play) ? $this->load->view('pages/' . $page_js_play, $data) : '';?>
    <?php isset($page_js) ? $this->load->view('pages/' . $page_js, $data) : '';?>

    
    
    <footer class="container-fluid bg-theme" style="width:80%; margin:0 auto">
    <div class="row">
        <div class="col-xs-6 col-sm-6">
        <h4 style="color:#f3ad0c;font-weight:bold; text-align:left">หวยที่ให้บริการ</h4>
        <div class="row">
            <div class="col-xs-6">
            <ul class="listFoo" style="list-style:none">
                <li>ผลหวยยี่กี</li>
                <li>หวยใต้ดิน</li>
                <li>หวยหุ้น</li>
            </ul>
            </div>
            <div class="col-xs-6">
            <ul class="listFoo" style="list-style:none">
                <li>หวยลาว</li>
                <li>หวยฮานอย</li>
                <li>หวยมาเลย์</li>
            </ul>
            </div>
        </div>
        </div>
        <div class="col-xs-6 col-sm-6">
        <h4 style="color:#f3ad0c;font-weight:bold">หวยที่ให้บริการ</h4>
        <div class="row">
            <div class="col-xs-6">
            <ul class="listFoo" style="list-style:none">
                <li>เลขเด็ด</li>
                <li>หวยซอง</li>
                <li>เว็บหวย</li>
            </ul>
            </div>
            <div class="col-xs-6">
            <ul class="listFoo" style="list-style:none">
                <li>แทงหวยออนไลน์</li>
                <li>ผลหวย</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
    <div class="row" style="margin-top:20px">
        <div class="col-12 col-sm-6 text left">
        <img src="<?php echo base_url('assets/images/logo1.png');?>" width="128" alt="lotto88" title="lotto88">
        </div>
        <div class="col-12 col-sm-6 text-right">
        © 2021 by Lottobetsvip., All Rights Reserved.
        </div>
    </div>
    </footer>
</body>
</html>
