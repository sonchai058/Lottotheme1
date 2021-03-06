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
<meta property="og:image" content="<?php echo base_url(); ?>assets/images/chinese-character.png" />

<link rel="icon" sizes="192x192" href="<?php echo base_url(); ?>assets/images/logo.png">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png'); ?>" type="image/x-icon">


    <?php echo css_res('css/bootstrap.min.css'); ?>
    <?php echo css_res('css/animate.min.css'); ?>
    <?php echo css_res('css/swiper.min.css'); ?>
    <?php echo css_res('css/form-page.css'); ?>
    <?php echo css_res('css/all.min.css'); ?>
    <?php echo css_res('css/main.css'); ?>
    <?php echo css_res('css/jquery-confirm.min.css'); ?>

    <meta name="theme-color" content="#383b47">
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>


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
  <body class="fadeIn animated">
  <div class="modal fade" id="modal">
      <div class="modal-dialog"></div>
  </div>
    <?php if (!empty($this->session->userdata('usess'))): ?>
    <!-- Start navigation -->
<div class="navigation">
        <div class="container">
            <!-- <ul>
                <li><a href="<?php echo base_url(); ?>"><i class="fal fa-home"></i><p class="font11" style="margin:-5px 0 0 0;">?????????????????????</p></a></li>
                <li><a href="<?php echo base_url('Deposit'); ?>"><i class="fal fa-wallet"></i><p class="font11" style="margin:-5px 0 0 0;">????????????????????????</p></a></li>
                <li><a href="<?php echo base_url('withdrawal'); ?>"><i class="fal fa-usd-circle"></i><p class="font11" style="margin:-5px 0 0 0;">?????????????????????</p></a></li>
                <li><a href="<?php echo base_url('transfer-to-game'); ?>"><i class="fal fa-exchange"></i><p class="font11" style="margin:-5px 0 0 0;">?????????????????????</p></a></li>
                <li><a href="<?php echo base_url('Profile'); ?>"><i class="fal fa-user"></i><p class="font11" style="margin:-5px 0 0 0;">???????????????</p></a></li>
            </ul> -->
        </div>
    </div>
    <!-- End navigation -->
    <?php endif?>

    <!-- <div class="bg-main"> -->
    <?php $this->load->view('layout/nav_header', $data);?>
    <!-- </div> -->
        <?php isset($page_content) ? $this->load->view('pages/' . $page_content, $data) : '';?>

    <div class="space-bottom"></div>

    <div class="loading"><img src="<?php echo base_url(); ?>assets/images/loading.svg" alt=""></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <?php echo js_res('js/jquery.min.js'); ?>
    <?php echo js_res('js/popper.min.js'); ?>
    <?php echo js_res('js/bootstrap.min.js'); ?>
    <?php echo js_res('js/jquery-confirm.min.js'); ?>
    <?php echo js_res('js/swiper.min.js'); ?>
    <?php echo js_res('js/clipboard.min.js'); ?>
    <?php echo js_res('js/bootstrap-notify.js'); ?>
    <?php $this->load->view('layout/masterjs');?>
    <?php isset($page_js) ? $this->load->view('pages/' . $page_js, $data) : '';?>
  </body>
</html>
