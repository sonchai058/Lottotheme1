<style type="text/css">

    h1,h2,h3,h4,h5,h6 {
      font-family: 'Prompt', sans-serif;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    footer * {
      color: #fff !important;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
      .head_top {
        text-align:center;
      }
    }

    .nav.navbar-nav * {
      /*color: #f3ad0c !important;*/ color: #fff !important; font-weight:normal !important; 
      font-size: 16px !important;
    }
    .txt-theme {
      color: #f3ad0c !important;
    }
    .txt-theme2 {
      color: #fff !important;
    }
    .bg-theme {
      /*background-color: #4d0c09 !important;*/ background-color: transparent !important;
    }

    .btn_cleardata {
      //background-color: transparent !important;
            background-color: #3E0A07 !important;
      color: #fff !important;
      border: 1px #f3ad0c solid !important;
    }

    .btn-trans.btn_pressactive,#bt_inverse,.bt_inverse_2,.btn_pressactive_w2,.bt_inverse_22,.btn_pressactive_w22,.btn_pressactive_w2d {
      //background-color: transparent !important;
            background-color: #3E0A07 !important;
      color: #fff !important;
      border: 1px #f3ad0c solid !important;
    }
    .btn_pressactive.active,#bt_inverse.active, .btn_pressmainactive.active,.button_helpplay_press.active,.bt_inverse_2.active,.btn_pressactive_w2.active,.bt_inverse_22.active,.btn_pressactive_w22.active,.btn_pressactive_w2d.active{
      background-color: #e43912 !important;
    }
    /*
    .main_left {
      width:90%; padding: 25px; 
    }
    */
    @media screen and (min-width: 512px) {

      .main_left {
        width: 80%;
      }

    }
    @media screen and (min-width: 1678px) {
      .main_left {
        width: 70%;
      }
    }
    @media screen and (max-width: 512px) {
      /*
      .main_left {
        width: 100%;
      }
      .main_left {
        width:99%; padding: 5px; 
      }
      */
      .main_left {
        padding: 20px; 
      }
      .btn-trans {
        font-size: 9px !important;
      }
      .listFoo {
        padding: 0;
        list-style: none;
      }
      .btn-trans {
        font-size: 9px !important;
      }
    }
    .main_left > .col-xs-6.col-sm-6 {
      padding-left: 15px !important;
      padding-right: 15px !important;
    }
    .main_left .col-xs-6,.main_left .col-xs-12,.main_left .col-xs-4 {
      padding-left: 2px !important;
      padding-right: 2px !important;
    }
    .navbar-inverse {
      /*background-color: #22222242;*/ background-color: transparent; color:#000;
      /*border-color: #af9b33;*/
      border: 0 !important;
    }
    .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover {
      color: #fff;
      background-color: #2f2a2a47;
    }
    .nav.navbar-nav li.active {
      /*color: #f3ad0c !important;*/ color: #000 !important; font-weight:normal !important; 
      font-size: 16px !important;
    }
    .star {
        padding: 5px;
        padding-left: 10px;
        padding-right: 10px;
        width: 150px;
        background-color: #f3ad0c !important;
        color:#000;
        border-radius:30px;
        font-weight:bold;
        font-size: 16px;
    }
    .number {
        font-weight:bold;
        font-size: 25px;
    }
    .memberlist.active > div {
      background-color: #824522d4 !important;
    }
    .memberlist.active > div > .number {
      color: #ff8d00 !important;
    }
    .listFoo {
        padding:0;
      list-style: none;
    }
    .listFoo li {
      font-size: 13px;
    }
    .btn-warning {
        background-color: #f0b90b !important; 
        border-color: #f0b90b !important; 
    }

        </style>

<h2 class="text-center txt-theme">หวยรัฐบาล</h2>

<div class="row main_left" style="border: 3px #f3b70c solid; margin:0 auto; padding:0">
        <div class="col-xs-12" style="padding:10px; /*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; ">
            <a href="<?php echo site_url();?>" style="font-size: 16px;font-weight: bold" class="btn txt-theme">< กลับ </a>
        </div>
</div>

<div class="row main_left" style="background-color:#450B08; padding-left: 30px;padding-top:5px;border: 3px #f3b70c solid; border-radius: 10px; margin:-18px auto;">

  <div class="row"  style="padding:0">
        <div class="col-xs-12">
           <h3 class="head_top" style="color:#fff" style=""><img src="https://lotto88.com/_nuxt/img/e8227ca.png" width="40"> งวด <?php echo substr($Lotto_resultLastSuccess->date_time_closed,8,2).'/'.substr($Lotto_resultLastSuccess->date_time_closed,5,2).'/'.(substr($Lotto_resultLastSuccess->date_time_closed,0,4)+543);?> <?php if($Lotto_resultLastSuccess->date_time_closed!=''){?>(ออกผลแล้ว)<?php }else{?> ยังไม่ประกาศผล <?php }?></h3>
        </div>
  </div>
  <div class="row" style="padding:20px; margin:10px; background-color:rgba(0,0,0,0.3); border-radius:30px">
    <div class="col-xs-12"><span class="star" style="width:100%; display: block; text-align:center; font-size:22px;">ผลรางวัลที่ 1</span></div>
    <br/>
    <div class="col-xs-12"><span style="color:#f3ad0c; width:100%; display: block; text-align: center; font-size:22px; font-weight:bold; margin-top:20px;"><?php echo $Lotto_resultLastSuccess->special;?></span></span></div>
  </div>
  <div class="row" style="padding:20px; margin:10px; background-color:rgba(0,0,0,0.3);">
    <div class="col-xs-4">
      <div class="row" style="padding:20px; margin:10px; background-color:rgba(0,0,0,0.3); border-radius:30px">
        <div class="col-xs-12"><span class="star" style="width:100%; display: block; text-align:center; font-size:20px;">3 ตัวหน้า</span></div>
        <br/>
        <div class="col-xs-12"><span style="color:#fff; width:100%; display: block; text-align: center; font-size:20px; font-weight:bold; margin-top:20px;"><?php echo $Lotto_resultLastSuccess->three_front;?></span></span></div>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="row" style="padding:20px; margin:10px; background-color:rgba(0,0,0,0.3); border-radius:30px">
        <div class="col-xs-12"><span class="star" style="width:100%; display: block; text-align:center; font-size:20px;">3 ตัวล่าง</span></div>
        <br/>
        <div class="col-xs-12"><span style="color:#fff; width:100%; display: block; text-align: center; font-size:20px; font-weight:bold; margin-top:20px;"><?php echo $Lotto_resultLastSuccess->three_back;?></span></span></div>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="row" style="padding:20px; margin:10px; background-color:rgba(0,0,0,0.3); border-radius:30px">
        <div class="col-xs-12"><span class="star" style="width:100%; display: block; text-align:center; font-size:20px;">2 ตัวล่าง</span></div>
        <br/>
        <div class="col-xs-12"><span style="color:#fff; width:100%; display: block; text-align: center; font-size:20px; font-weight:bold; margin-top:20px;"><?php echo $Lotto_resultLastSuccess->two_down;?></span></span></div>
      </div>
    </div>
  </div>

</div>

<div class="row main_left" style="background-color:#450B08; padding-left: 60px; padding-top:5px;border: 3px #f3b70c solid; border-radius: 10px; margin:10px auto; padding-bottom:20px">

  <div class="row">
        <div class="col-xs-12" style="">
          <h3 class="head_top" style="color:#fff">รายชื่อผู้ถูกรางวัล</h3>
        </div>
  </div>
  <?php
  if(empty($memberList)) {
  ?>
    <div class="row memberlist active" style="margin-bottom: 20px;">
      <div class="col-xs-11" style="padding:15px; background-color:rgba(0,0,0,0.3); border-radius:5px; text-align:center">ไม่มีผู้ถูกรางวัล</div>
  </div>
  <?php
  }else{
    foreach($memberList as $key=>$data){
  ?>

  <div class="row memberlist active" style="margin-bottom: 20px;">
    <div class="col-xs-5" style="padding:15px; background-color:rgba(0,0,0,0.3); border-radius:5px; text-align:center"><span class="number" style="text-align:center;font-size:18px">อันดับที่ <?php echo ($key+1);?><br/>[<?php echo $data['description'];?>]</span></div>
    <div class="col-xs-6" style="margin-left:2px;padding:15px; background-color:rgba(0,0,0,0.3); border-radius:5px; text-align:center"><span class="number" style="text-align:center;font-size:18px">ผู้สั่งเลข: <?php echo $data['member_name'];?>[<?php echo $data['member_id'];?>] ได้ <?php echo number_format($data['amount'],0);?>x<?php echo number_format($data['reward'],0);?> = <?php echo number_format($data['price'],0);?> ฿<br/>เมื่อ: <?php echo substr($data['date_time_add'],8,2).'/'.substr($data['date_time_add'],5,2).'/'.(substr($data['date_time_add'],0,4)+543).' '.substr($data['date_time_add'],11,5);?></span></div>
  </div>

  <?php
    }
  }
  ?>
  
</div>