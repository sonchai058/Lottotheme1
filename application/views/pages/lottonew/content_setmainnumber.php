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

    .nav.navbar-nav * {
      /*color: #f3ad0c !important;*/ color: #fff !important; font-weight:normal !important; 
      font-size: 16px !important;
    }
    .nav.navbar-nav li.active {
      /*color: #f3ad0c !important;*/ color: #000 !important; font-weight:normal !important; 
      font-size: 16px !important;
    }
    .txt-theme {
      /*color: #f3ad0c !important;*/color: #f3ad0c !important;
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
      font-weight: normal;
    }
    .btn_pressactive.active,#bt_inverse.active,.btn_pressmainactive.active,.button_helpplay_press.active,.bt_inverse_2.active,.btn_pressactive_w2.active,.bt_inverse_22.active,.btn_pressactive_w22.active,.btn_pressactive_w2d.active{
      background-color: #e43912 !important;
    }
    .btn-warning,.btn-warning i,.btn-warning.btn-trans,.btn-warning.btn-trans i {
      color: #111;
    }
    
    /*
    .btn_pressactive {
      background-color:#ec971f; 
    }
    .btn_pressmainactive.active{
      background-color:#131313 !important;
    }
    */
    .btn-warning.active {
      color: #111 !important;
    }
    .listSelected {
      width: 90px !important;
      height: 90px !important;
      float: left !important;
      margin-left: 2px !important;
      position: relative !important;
    }
    .listSelected .content .txt-theme {
      font-size: 22px;
      
    }

    .txtList {
      font-size: 18px !important; 
    }

    .main_left {
      width:90%; padding: 25px; 
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
      
    }

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
    @media screen and (max-width: 983px) {
      /*
      .main_left {
        width: 100%;
      }*/
      /*
      .main_left {
        width:99%; padding: 20px; 
      }*/
      .main_left {
        padding: 20px; 
      }
      .btn-trans {
        font-size: 9px !important;
      }
      .listFoo {
        padding:0;
      list-style: none;
    }
    .listFoo li {
      font-size: 13px;
    }

      .btn_pressactive,.btn_pressactive_w2  {
        font-size: 13px;
        padding: 8px;
      }
      .bt_slot_top_help2  {
        padding:1px;
        margin-left:1px;
      }
      .col-xs-8.col-sm-8 .text-left.txt-theme{
        font-size: 12px;
      }
      .row.header .txt-theme{
        font-size: 11px;
      }
      .listSelected div{
        padding: 0;
      }
      .listSelected .txt-theme {
        font-size: 11px;
      }
      .listPriceTxt {
        font-size: 10px !important;
      }
      .btn.btn-warning {
        font-size: 11px !important;
        height: 30px !important;
        margin: 2px !important; 
      }
      #itemSelectedNull {
        font-size: 11px;
      }
      .btn_pressmainactive  {
        font-size: 15px;
      }
      .txtList {
        font-size: 14px !important; 
        padding:2px;
      }
      .label {
        left: -10px;
      }
      
    }
    .main_left > .col-xs-6.col-sm-6 {
      padding-left: 15px !important;
      padding-right: 15px !important;
    }
    .main_left > .col-xs-12.col-sm-6 .col-xs-6.col-sm-4,.main_left > .col-xs-12.col-sm-6 .col-xs-12.col-sm-4,.main_left > .col-xs-12.col-sm-6 .col-xs-4.col-sm-4,.main_left > .col-xs-12.col-sm-6 .col-xs-12,.main_left > .col-xs-12.col-sm-6 .col-xs-4.col-sm-6,.main_left > .col-xs-12.col-sm-6 .col-xs-6 ,.main_left > .col-xs-12.col-sm-6 .col-xs-4 {
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

    .help_play {
      min-height:150px;
      /*background-color:rgba(0,0,0,0.2);*/background-color:#370906;
      width:90%;
      margin: 10px auto;
      border-radius: 10px;
      padding: 10px;
    }

          .numpad {
            margin-top:10px;
          }
          .numpad .content {
            display:table;  margin:0 auto;
          }
          input.display_numpad{
            width: 50px;
            float: left;
            height: 70px;
            border: 2px #fff solid;
            margin-right: 5px;
            //background-color: transparent !important;
            background-color: #3E0A07 !important;
            font-size: 28px;
            text-align: center;
            color:#fff;
          }
          .content2 {
            width:100%; max-width:230px; margin:5px auto; clear: both;
            margin-bottom: 10px;
          }
          .numpad_button {
            width: 70px;
            float: left;
            height: 50px;
            border: 2px #fff solid;
            margin-right: 5px;
            background: #fff;
            font-size: 28px;
            text-align: center;
            color: #000;
            margin-top: 5px;
            border-radius: 3px;
          }
          .numpad_button i {
            color: #000;
          }
          .numpad_button.disabled {
            background-color: #ccc;
            color: #aaa;
            border: 2px #ccc solid;
            border-radius: 3px;
          }
          .header {
            text-align: center;
            margin-bottom: 20px;
          }
          .listSelected {
            text-align: center;
            font-size: 20px;
            background-color: rgba(0,0,0,0.2);
            width: 99%;
            padding: 8px;
            margin: 5px auto;
          }
          
          .button_helpplay {
            //background-color: transparent !important;
            background-color: #3E0A07 !important;
            color: #fff !important;
            border: 1px #f3ad0c solid !important;
            border-radius: 10px;
            padding: 6px;
          }
          .button_helpplay.active {
            background-color: #e43912 !important;
          }
          /*
          .btn-warning ,.btn-warning i{
            color: #000 !important;
          }
          */
          .btn-info0 {
            background-color: #663300 !important;
            
            border: 1px #FFCC66 solid;
            border-radius: 50%;
            width:40px;
            height:40px;
            position:relative;
            margin-right: 4px;
          }
          .btn-info0 span{
            width: 100%;
            display: block;
            text-align: center;
            font-size: 15px;
            color: #fff !important;
            position: absolute;
            top:8px;
            left:0;

          }
          .btn-info {
            //background-color: transparent !important;
            background-color: #3E0A07 !important;
            
            border: 1px #f3ad0c solid;
            border-radius: 50%;
            width:32px;
            height:32px;
            position:relative;
          }
          .btn-info span{
            width: 100%;
            display: block;
            text-align: center;
            font-size: 14px;
            /*color: #f3ad0c !important;*/color: #f3ad0c !important;
            position: absolute;
            top:5px;
            left:0;

          }
          .btn-info1 {
            background-color: #996633 !important;
            color: #fff !important;
            border: 0;
            border-radius: 30px;
            font-size: 14px;
          }

          .deprivetrue div span.txt-theme,.deprivetrue div.col-xs-5 span {
            /*background-color: #993300 !important;*/
            color: #FF9933 !important;
          }
          /*
          .deprivetrue div.col-xs-5 span {
            color: #FF9933 !important;
          }
          */

          .btn-warning {
            height: 35px;
            font-size: 16px;
            margin: 2px !important; 
          }
          .btn-warning {
              background-color: #f0b90b !important; 
              border-color: #f0b90b !important; 
          }
        </style>

<h1 class="text-center txt-theme">ตั้งค่าเลขชุด</h1>

    <div class="row main_left" style="border: 3px #f3b70c solid;/*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; border-radius: 10px; margin:0 auto; padding: 10px;">
      <div class="col-xs-6 col-sm-6 text-left" style="">
        <a href="#" style="font-size: 20px;font-weight: bold" class="btn txt-theme"><i class="fa fa-book" aria-hidden="true"></i> จัดการเลขชุด </a>
      </div>
      <div class="col-xs-6 col-sm-6 text-right" style="">
        <button  onclick="window.location.replace('<?php echo site_url('lottonew/setNumber')?>');" class="btn btn-warning btn-trans" style="font-weight:bold">
                                    <i class="fa fa-plus-square-o" aria-hidden="true"></i> เพิ่มเลขชุด</button>
        </div>
        <div class="col-xs-12 col-sm-12" style="min-height:250px;/*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; padding-bottom: 30px; margin-top:10px;">

        <?php if(empty($histMyNumber)){?>
                            
                            <div class="row" style="margin-top:5px;background-color:#660000; min-height: 250px; max-height:500px; overflow-y:scroll; overflow-x:none">
                                <h4 style="margin-top:100px; color:#FF9900; font-weight:bold; text-align:center">ไม่พบข้อมูล</h4>
                            </div>
                                  <!--
                                    <div onclick="window.location.replace('<?php echo site_url();?>')" class="row" style="cursor: pointer;margin-top:5px;padding-top:5px; ">
                                        <div class="col-xs-3 text-center" style="font-weight:normal">
                                          <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                              <input type="button" class="btn btn-warning btn-play" value="แทงชุดนี้" style="margin-top:-5px">
                                            </div>
                                            <div class="col-xs-12 col-md-8">ชุด 1</div>
                                          </div>
                                        </div>
                                        <div class="col-xs-4 text-left" style="">
                                        22/07/2021 14:33:20
                                        </div>
                                        <div class="col-xs-5 text-left" style="">
                                        124
                                        </div>
                                    </div>
                                    -->

                            <?php }else{?>
                                <div class="row" style="width:135%">
                            <?php
                                    foreach($histMyNumber as $key=>$data) {  
                                      $arr = array();
                                      $numarr = array();
                                      $rows = $this->lottomdnew->histMyNumberList($data['id']);
                                      foreach($rows as $key00=>$data00) {
                                        $arr[] = $data00['number'];
                                        $numarr[] = array('numlabel'=>$label_arr[$data00['description']],'number'=>$data00['number'],'numtext'=>$data00['description']);
                                      }
                            ?>
                                        <div class="col-xs-5 col-md-3" style="border-radius:10px;font-weight:normal; background-color:rgba(0,0,0,0.4); border:1px #f0ad4e solid; height:150px; margin:0px 0px 1px 1px; padding:10px;">
                                            <div class="row">
                                                <div class="col-xs-5 col-md-4"><span style="font-weight:bold">ชื่อชุด</span></div><div class="col-xs-7 col-md-8"><?php echo $data['name'];?></div>
                                                <div class="col-xs-5 col-md-4"><span style="font-weight:bold">วันที่สร้าง</span></div><div class="col-xs-7 col-md-8"> <?php echo substr($data['date_time_add'],8,2).'/'.substr($data['date_time_add'],5,2).'/'.substr($data['date_time_add'],0,4).' '.substr($data['date_time_add'],11,5);?></div>
                                                <div class="col-xs-5 col-md-4"><span style="font-weight:bold">เลข</span></div><div class="col-xs-7 col-md-8" style="word-wrap: break-word;"><?php echo implode(',',$arr);?></div>
                                                <div class="col-xs-12 text-right">
                                                    <a class="btn btn-warning" href="<?php echo site_url('lottonew/setnumber/'.$data['id'])?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a>
                                                    <a onclick="return false;" data-id="<?php echo $data['id'];?>" class="btn btn-danger btnDel" href="#"><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } 
                                    ?>
                              </div>
                            <?php
                            }?>


      </div>
    </div>


 