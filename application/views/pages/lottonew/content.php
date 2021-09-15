<style type="text/css">
    * {
      font-family: 'Prompt', sans-serif;
      color: #fff;
    }
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
      color: #f3ad0c !important;
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
    .label {
          width:100%;
          position:absolute;
          bottom:-15px;
          font-weight: normal;
          left:0;
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
      color: #000;
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
        font-size: 11px;
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
      .btn.btn-warning {
        font-size: 11px !important;
        height: 30px !important;
        margin: 2px !important; 
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
            //background: transparent;
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
            color: #f3ad0c !important;
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
              //background-color: #f0b90b !important; 
              //border-color: #f0b90b !important; 
          }

        </style>

<h2 class="text-center txt-theme">หวยรัฐบาล</h2>
    <div class="row main_left" style="border: 3px #f3b70c solid; /*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; border-radius: 10px; margin:0 auto; padding: 10px;">
      <div class="col-xs-6 col-sm-6 text-left" style="">
        <a href="<?php echo site_url();?>" style="font-size: 16px;font-weight: bold" class="btn txt-theme">< กลับ </a>
      </div>
      <div class="col-xs-6 col-sm-6 text-right" style="">
      <span style="font-size: 18px;color:#eee !important">งวด <?php echo substr($lottoGroupNow,8,2).'/'.substr($lottoGroupNow,5,2).'/'.(substr($lottoGroupNow,0,4)+543);?> <?php if($LottoResultSuccess){?>ออกผลแล้ว<?php }?></span>
      <button data-toggle="modal" data-target="#myModal0" id="" class="btn btn-warning btn_pressmainactive" style="font-size:16px;">กติกา <i class="fa fa-external-link" aria-hidden="true"></i></button>
      
      
                      <!-- Modal -->
                      <div class="modal fade" id="myModal0" role="dialog">
                        <div class="modal-dialog modal-lg">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header" style="border:0">
                              <button type="button" class="close" data-dismiss="modal"><i  style="color:#333" class="fa fa-times" aria-hidden="true"></i></button>
                            </div>
                            <div class="modal-body modal-p" style="">

                            <div class="row"><div class="col-xs-12" style="text-align:left;padding-left: 30px;padding-right: 30px;"><h1 class="font-weight-bold font-title text-h5">
                                กติกา การแทงหวยรัฐบาลไทย <?php echo $title;?>
                              </h1> <div></div> <article class="content py-4"><span><p>กติกาการแทงหวยรัฐบาลไทย บนเว็บหวยออนไลน์ <?php echo $title;?> มีดังนี้</p>
                              <ul>
                              <li>หวยรัฐบาล หรือ หวยใต้ดิน เปิดรับแทงล่วงหน้า 5 วัน ก่อนวันหวยออก</li>
                              <li>แทงหวยได้ตลอด 24 ชั่วโมง หลังจากเว็บไซต์เปิดระบบรับแทง</li>
                              <li>เปิดรับแทงตั้งแต่เวลา 01:00 น.</li>
                              <li>ปิดรับแทงหวย เวลา 15:20 น. ของวันหวยออก</li>
                              <li>ออกผลหวยประมาณ 14:30 – 16:00น. (ตามเวลาประเทศไทย)</li>
                              <li>ออกผลหวย ในวันที่ 1 และ 16 ของทุกเดือน (กรณีตรงวันหยุดนักขัตฤกษ์ จะเลื่อนวันประกาศผลรางวัลตามกองสลาก)</li>
                              <li>สามารถยกเลิกโพยหวยได้ภายใน 5 นาที หลังกดยืนยันส่งโพย จำนวน 5 โพยต่อวันเท่านั้น</li>
                              <li>รับแทงขั้นต่ำตัวละ 1 บาท และ สูงสุดตัวละ 2,000 บาท</li>
                              </ul>
                              <p><strong>วันที่มีการเลื่อนออกผลรางวัลเป็นประจำทุกปี</strong></p>
                              <ul>
                              <li>งวด 1 มกราคม เลื่อนมาออกวันที่ 30 ธันวาคม ของปีก่อนหน้า เนื่องจากเป็นวันขึ้นปีใหม่</li>
                              <li>งวด 16 มกราคม เลื่อนไปออกวันที่ 17 มกราคม เนื่องจากเป็นวันครู</li>
                              <li>และ งวด 1 พฤษภาคม เลื่อนไปออกวันที่ 2 พฤษภาคม เนื่องจากเป็นวันแรงงานแห่งชาติ</li>
                              </ul>
                              <h2 class="text-h6 font-title font-weight-bold">เงื่อนไข เลขเต็ม และ เลขอั้น เป็นอย่างไร?</h2>
                              <h3 class="font-title font-weight-bold my-0">กรณี เลขอั้น</h3>
                              <ul class="mb-4">
                              <li>เลขอั้น คือ ตัวเลขที่ไม่ได้ปิดรับแทง แต่จะมีการปรับเปลี่ยนราคา เป็นการจ่ายครึ่งราคา หรือมีอัตราจ่ายที่น้อยลงกว่าปกติ ตามแต่เว็บจะกำหนด</li>
                              <li>ทางเว็บจะแจ้งเลขอั้น พร้อมอัตราจ่ายที่หน้าแทง ก่อนวันหวยออก 2 วัน</li>
                              <li>หากท่านใดที่ซื้อเลขอั้นเข้ามา ก่อนที่ทางเว็บจะประกาศ โพยหวยของท่านจะไม่ถูกยกเลิก หรือไม่ถูกปรับลดราคาจ่าย และยังคงขึ้นสถานะรับแทง</li>
                              <li>ยกเว้นเลขอั้นตัวนั้นจะเป็น เลขดัง หวยดัง เลขเด็ดจริงๆ ที่ไม่มีเจ้ามือเจ้าไหนกล้ารับแทง เราก็จะทำการยกเลิกโพยของท่านทันที และติดต่อกลับเพื่อแจ้งให้ทราบโดยด่วน</li>
                              <li>กรุณาเช็คอัตราจ่ายก่อนส่งโพยทุกครั้ง เพราะราคาแต่ละตัวอาจจะถูกปรับลดไม่เท่ากัน</li>
                              </ul>
                              <h3 class="font-title font-weight-bold my-0">กรณี เลขเต็ม</h3>
                              <ul class="mb-4">
                              <li>เลขเต็ม อาจจะประกาศในช่วงเวลา 12:00 – 15:20 น.</li>
                              <li>หรืองวดนั้นๆ อาจจะไม่มีเลขเต็มก็ได้</li>
                              <li>สำหรับคนที่ซื้อไปก่อนหน้า ที่ทางเว็บจะประกาศเลขเต็ม โพยของท่านจะได้ราคาเต็ม และไม่มีการปรับราคาอัตราจ่ายใดๆ ทั้งสิ้น</li>
                              <li>กรุณาตรวจสอบราคาจ่ายทุกตัวก่อนกดส่งโพย</li>
                              </ul>
                              <h2 class="text-h6 font-title font-weight-bold">อัตราจ่ายหวยรัฐบาล LOTTO88</h2>
                              <div class="v-data-table theme--light">
                              <div class="v-data-table__wrapper">
                              <table style="height: 251px;" width="947">
                              <thead>
                              <tr>
                              <th>ประเภทหวย</th>
                              <th>อัตราจ่าย (บาทละ)</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                              <td style="text-align: center;">3 ตัวบน / 3 ตัวตรง</td>
                              <td style="text-align: center;">900</td>
                              </tr>
                              <tr>
                              <td style="text-align: center;">3 ตัวโต๊ด</td>
                              <td style="text-align: center;">150</td>
                              </tr>
                              <tr>
                              <td style="text-align: center;">3 ตัวล่าง หมุน 2 ครั้ง</td>
                              <td style="text-align: center;">450</td>
                              </tr>
                              <tr>
                              <td style="text-align: center;">3 ตัวหน้า หมุน 2 ครั้ง</td>
                              <td style="text-align: center;">450</td>
                              </tr>
                              <tr>
                              <td style="text-align: center;">2 ตัวบน</td>
                              <td style="text-align: center;">90</td>
                              </tr>
                              <tr>
                              <td style="text-align: center;">2 ตัวล่าง</td>
                              <td style="text-align: center;">90</td>
                              </tr>
                              <tr>
                              <td style="text-align: center;">เลขวิ่ง 3 ตัวบน</td>
                              <td style="text-align: center;">3.2</td>
                              </tr>
                              <tr>
                              <td style="text-align: center;">เลขวิ่ง 2 ตัวล่าง</td>
                              <td style="text-align: center;">4.2</td>
                              </tr>
                              </tbody>
                              </table>
                              </div>
                              </div>
                              <p>*หมายเหตุ หากมีการปรับเปลี่ยนราคา ทางเว็บจะเเจ้งให้ทราบล่วงหน้าก่อนมีการเปลี่ยนเเปลง 1 สัปดาห์</p>
                              <h2 class="text-h6 font-title font-weight-bold">วิธีดูผลหวย ตรวจผลรางวัล หวยรัฐบาล LOTTO88</h2>
                              <p><img loading="lazy" class="" src="https://cms.lotto88.com/wp-content/uploads/2021/01/วิธีดูผลหวยรัฐบาล-lotto88-1024x531.jpg" alt="วิธีดูผลหวยรัฐบาล-<?php echo $title;?>" width="100%"></p>
                              <ul>
                              <li>เลข 3 ตัวบน หรือ 3 ตัวตรง คือ เลข 3 ตัวท้าย ของรางวัลที่ 1</li>
                              <li>เลข 3 ตัวโต๊ด คือ เลข3 ตัวท้าย ของรางวัลที่ 1 (สลับตำแหน่งได้)</li>
                              <li>3 ตัวล่าง คือ รางวัลเลขท้าย 3 ตัว หมุน 2 ครั้ง</li>
                              <li>3 ตัวหน้า คือ รางวัลเลขหน้า 3 ตัว หมุน 2 ครั้ง</li>
                              <li>2 ตัวบน คือ เลข 2 ตัวท้าย ของรางวัลที่ 1</li>
                              <li>2 ตัวล่าง คือ รางวัลเลขท้าย 2 ตัว</li>
                              <li>เลขวิ่ง 3 ตัวบน คือ การแทงหวย 1 ตัว ให้ตรงกับเลขใดก็ได้ ในเลข 3 ตัวท้าย ของรางวัลที่ 1</li>
                              <li>เลขวิ่ง 2 ตัวล่าง คือ การแทงหวย 1 ตัว ให้ตรงกับเลขใดก็ได้ ในรางวัลเลขท้าย 2 ตัว</li>
                              </ul>
                              <p>ลิงค์ทางเข้า : <a href="https://lotto88.com/home/result">ตรวจผลหวยรัฐบาลไทย</a></p>
                              </span></article></div></div>

                            </div>
                          </div>
                          
                        </div>
                      </div>
      </div>
    </div>
    <br/>
    <div class="row main_left" style="min-height: 350px; /*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; border: 3px #f3b70c solid; border-radius: 10px; margin:-18px auto">
      <div class="col-xs-12 col-sm-6" style="min-height:250px;/*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; padding-bottom: 30px">
        
        <div class="row">
          <div class="col-xs-6">
            <button id="bt_press" class="btn btn-warning btn_pressmainactive active" style="width:100%;font-size:16px; font-weight:bold">กดเอง</button>
          </div>
          <div class="col-xs-6">
          <button id="bt_out" class="btn btn-warning btn_pressmainactive" style="width:100%;font-size:16px; font-weight:bold">เลือกจากแผง</button>
          </div>
        </div>
        <hr style="border:0.5px #777 solid !important" />
        
        <div class="w1">
          <div class="row">
            <div class="col-xs-12">
              <button id="bt_inverse" data-numlabel='i_inverse_32' data-numtext="เลขกลับ" class="btn btn-warning btn-trans" style="width:100%">
                <i class="fa fa-random txt-theme" aria-hidden="true"></i> เลขกลับ</button>
            </div>
          </div>
          <div class="row" style="margin-top: 3px;">
            <div class="col-xs-6 col-sm-4">
                  <button id="" data-numlabel='3_up_900' data-numtext="3 ตัวบน" class="btn btn-warning btn-trans btn_pressactive l3" style="width:100%">
                  3 ตัวบน [900]</button>
            </div>
            <div class="col-xs-6 col-sm-4">
                  <button id="3_inverse_150" data-numlabel='3_inverse_150' data-numtext="3 ตัวโต๊ด" class="btn btn-warning btn-trans btn_pressactive l3" style="width:100%">
                  3 ตัวโต๊ด [150]</button>
            </div>
            <div class="col-xs-6 col-sm-4">
                  <button id="" data-numlabel='3_front_450' data-numtext="3 ตัวหน้า" class="btn btn-warning btn-trans btn_pressactive l3" style="width:100%">
                  3 ตัวหน้า [450]</button>
            </div>

            <div class="col-xs-6 col-sm-4">
                  <button id="" data-numlabel='3_under_450' data-numtext="3 ตัวล่าง" class="btn btn-warning btn-trans btn_pressactive l3" style="width:100%">
                  3 ตัวล่าง [450]</button>
            </div>
            <div class="col-xs-4 col-sm-4">
                  <button id="btn_pressactive_2_up_90" data-numlabel='2_up_90' data-numtext="2 ตัวบน" class="btn btn-warning btn-trans btn_pressactive l2" style="width:100%">
                  2 ตัวบน [90]</button>
            </div>
            <div class="col-xs-4 col-sm-4">
                  <button id="btn_pressactive_2_under_90" data-numlabel='2_under_90' data-numtext="2 ตัวล่าง" class="btn btn-warning btn-trans btn_pressactive l2" style="width:100%">
                  2 ตัวล่าง [90]</button>
            </div>

            <div class="col-xs-4 col-sm-6">
                  <button id="" data-numlabel='dot32_up_3.2' data-numtext="วิ่งบน" class="btn btn-warning btn-trans btn_pressactive ldot" style="width:100%">
                  วิ่งบน [3.2]</button>
            </div>
            <div class="col-xs-12 col-sm-6">
                  <button id="" data-numlabel='dot42_under_4.2' data-numtext="วิ่งล่าง" class="btn btn-warning btn-trans btn_pressactive ldot" style="width:100%">
                  วิ่งล่าง [4.2]</button>
            </div>
          </div>
          
          <div class="row numpad" id="numpad3" style="display:none">
              <div class="help_play" style="display:none">
                <h4 class="txt-theme">ตัวช่วยแทง</h4>
                <div class="row" style="padding-left:10px">
                  <div class="col-xs-12">
                    <button type="button" onclick="" data-numlabel='1_19door_90' data-numtext="19 ประตู" class="button_helpplay button_helpplay_press" name="" id="button_helpplay_press_1_19door_90">19 ประตู</button>
                    <button type="button" onclick="" data-numlabel='1_rootfront_90' data-numtext="รูดหน้า" class="button_helpplay button_helpplay_press" name="" id="button_helpplay_press_1_rootfront_90">รูดหน้า</button>
                    <button type="button" onclick="" data-numlabel='1_rootback_90' data-numtext="รูดหลัง" class="button_helpplay button_helpplay_press" name="" id="button_helpplay_press_1_rootback_90">รูดหลัง</button>
                    <button type="button" onclick="if(confirm('คุณต้องการแทง เลขเบิ้ล ใช่หรือไม่?')){doble()}else{return false}" data-numlabel='2_double_90' data-numtext="เลขเบิ้ล" class="button_helpplay" name="button_double" id="button_double">เลขเบิ้ล</button>
                    <button type="button" onclick="if(confirm('คุณต้องการแทง สองตัวต่ำ ใช่หรือไม่?')){num2under()}else{return false}" data-numlabel='2_2number_under_90'  data-numtext="สองตัวต่ำ" class="button_helpplay" name="button_2number_under" id="button_2number_under">สองตัวต่ำ</button>
                    <button type="button" onclick="if(confirm('คุณต้องการแทง สองตัวสูง ใช่หรือไม่?')){num2upper()}else{return false}" data-numlabel='2_2number_up_90'  data-numtext="สองตัวสูง" class="button_helpplay" name="button_2number_up" id="button_2number_up">สองตัวสูง</button>
                  </div>
                </div>
                <div class="row" style="margin-top:5px;padding-left:10px">
                  <div class="col-xs-6">
                  <button style="width:90%" type="button" onclick="if(confirm('คุณต้องการแทง สองตัวคู่ ใช่หรือไม่?')){num2even()}else{return false}" data-numlabel='2numberEven' class="button_helpplay" name="button_2numberEven" id="button_2numberEven">2 ตัวคู่</button>
                  </div>
                  <div class="col-xs-6">
                  <button style="width:90%" type="button" onclick="if(confirm('คุณต้องการแทง สองตัวคี่ ใช่หรือไม่?')){num2odd()}else{return false}" data-numlabel='2numberOdd' class="button_helpplay" name="button_2numberOdd" id="button_2numberOdd">2 ตัวคี่</button>
                  </div>
                </div>
              </div>

              <div class="content">
                <input type="text" readonly data-displaylabel="1" maxlength="1" onkeyup="" class="display_numpad" name="display_numpad31" id="display_numpad31">
                <input type="text" readonly data-displaylabel="2" maxlength="1" onkeyup="" class="display_numpad" name="display_numpad32" id="display_numpad32">
                <input type="text" readonly data-displaylabel="3" maxlength="1" onkeyup="" class="display_numpad" name="display_numpad33" id="display_numpad33">
              </div>
              <div class="content2">
                <button type="button" onclick="" data-numlabel='3' data-num="1" class="numpad_button" name="button_numpad311" id="button_numpad311">1</button>
                <button type="button" onclick="" data-numlabel='3' data-num="2" class="numpad_button" name="button_numpad312" id="button_numpad312">2</button>
                <button type="button" onclick="" data-numlabel='3' data-num="3" class="numpad_button" name="button_numpad313" id="button_numpad313">3</button>
                <button type="button" onclick="" data-numlabel='3' data-num="4" class="numpad_button" name="button_numpad321" id="button_numpad321">4</button>
                <button type="button" onclick="" data-numlabel='3' data-num="5" class="numpad_button" name="button_numpad322" id="button_numpad322">5</button>
                <button type="button" onclick="" data-numlabel='3' data-num="6" class="numpad_button" name="button_numpad323" id="button_numpad323">6</button>
                <button type="button" onclick="" data-numlabel='3' data-num="7" class="numpad_button" name="button_numpad331" id="button_numpad331">7</button>
                <button type="button" onclick="" data-numlabel='3' data-num="8" class="numpad_button" name="button_numpad332" id="button_numpad332">8</button>
                <button type="button" onclick="" data-numlabel='3' data-num="9" class="numpad_button" name="button_numpad333" id="button_numpad333">9</button>
                <button type="button" onclick="return false;" data-num="_" class="numpad_button disabled" name="button_numpad341" id="button_numpad341">_</button>
                <button type="button" onclick="" data-numlabel='3' data-num="0" class="numpad_button" name="button_numpad342" id="button_numpad342">0</button>
                <button type="button" onclick="" data-numlabel='3' data-num="b" class="numpad_button" name="button_numpad343" id="button_numpad343"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
                
              </div>
          </div>
        </div>
        <style type="text/css">
        .btn-w3-num {
          width: 100%;
          color: #202020;
          background-color: #fff;
          border-radius: 50px;
          font-size: 20px;
          font-weight: bold;
          padding-top: 10px;
          padding-bottom: 10px;
          border:0;
        }
        .btn-w3-num.active {
         background-color: #DCA83C;
        }
        .bt_slot_top_help {
          background-color:#976F1B;
          text-align: center;
          border: 0;
          padding-top: 10px;
          padding-bottom: 10px;
        }
        .bt_slot_top_help.active {
          background-color:#1796BD;
        }
        .pad3num_list {
          width: 100%;
          max-width:500px;
          margin: 5px auto;
          list-style: none;
          padding: 0px;
        }
        .pad3num_list li {
          float: left;
          margin-right: 3px;
          margin-bottom: 3px;
          width: 40px;
          height: 40px;
        }
        .pad3num_list li a{
          width: 100%;
          height: 100%;
          display: block;
          background-color: #fff;
          text-align: center;
          border-radius: 50%;
          position: relative;
        }
        .pad3num_list li a span {
          width: 100%;
          color: #000 !important;
          position:absolute;
          top:10px;
          left:0px;
          font-size: 12px;
          font-weight: bold;
          text-align: center;
          display: inline-block;
        }
        .pad3num_list li a.pri {
          background-color: #62270E;
          border: 1px #A0651D solid;
        }
        .pad3num_list li a.pri span{
          color: #fff !important;
        }
        .pad3num_list li a.active{
          background-color: #259CC1;
        }
        .pad3num_list li a.active span{
          color: #fff !important;
        }

        .bt_slot_top_help:hover {
          color: #fff;
        }

        .runnum_list {
          width: 90%;
          margin: 5px auto;
          list-style: none;
          padding: 0px;
        }
        .runnum_list li {
          float: left;
          margin-right: 3px;
          margin-bottom: 3px;
          width: 50px;
          height: 50px;
        }
        .runnum_list li a{
          width: 100%;
          height: 100%;
          display: block;
          background-color: #fff;
          text-align: center;
          border-radius: 50%;
          position: relative;
        }
        .runnum_list li a span {
          width: 100%;
          color: #000 !important;
          position:absolute;
          top: 14px;
          left:0px;
          font-size: 16px;
          font-weight: bold;
          text-align: center;
          display: inline-block;
        }
        .runnum_list li a.active{
          background-color: #259CC1;
        }
        .runnum_list li a.active span{
          color: #fff !important;
        }
        .runnum_list li a.pri {
          background-color: #62270E !important;
          border: 1px #A0651D solid !important;
        }
        
        .pad2num_list {
          width: 95%;
          max-width: 470px;
          margin: 5px auto;
          list-style: none;
          padding: 0px;
        }
        .pad2num_list li {
          float: left;
          margin-right: 3px;
          margin-bottom: 3px;
          width: 40px;
          height: 40px;
        }
        .pad2num_list li a{
          width: 100%;
          height: 100%;
          display: block;
          background-color: #fff;
          text-align: center;
          border-radius: 50%;
          position: relative;
        }
        .pad2num_list li a span {
          width: 100%;
          color: #000 !important;
          position:absolute;
          top: 8px;
          left:0px;
          font-size: 16px;
          font-weight: bold;
          text-align: center;
          display: inline-block;
        }
        .pad2num_list li a.pri {
          background-color: #62270E;
          border: 1px #A0651D solid;
        }
        .pad2num_list li a.pri span{
          color: #fff !important;
        }
        .pad2num_list li a.active{
          background-color: #259CC1;
        }
        .pad2num_list li a.active span{
          color: #fff !important;
        }
        
        .pad2num_listW .col-xs-3{
          margin-bottom : 3px;
          padding: 2px;
        }        
        .bt_slot_top_help2 {
          background-color:#976F1B;
          text-align: center;
          border: 0;
          padding-top: 10px;
          padding-bottom: 10px;
        }
        .bt_slot_top_help2.active {
          background-color:#1796BD;
        }
        .btn-warning {
            height: 35px;
            font-size: 16px;
            margin: 2px !important; 
          }
        
        </style>
        <div class="w2" style="display:none;">
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-xs-4">
              <button id="bt_w2_3num" data-numlabel='bt_w2_3num' data-numtext="3 ตัว" class="btn btn-warning btn-w3-num" style="">
              3 ตัว 
              </button>
            </div>
            <div class="col-xs-4">
              <button id="bt_w2_2num" data-numlabel='bt_w2_2um' data-numtext="2 ตัว" class="btn btn-warning btn-w3-num" style="">
              2 ตัว 
              </button>
            </div>
            <div class="col-xs-4">
              <button id="bt_w2_runnum" data-numlabel='bt_w2_runnum' data-numtext="เลขวิ่ง" class="btn btn-warning btn-w3-num" style="">
              เลขวิ่ง
              </button>
            </div>
          </div>

          <div class="row 3num">
              <div class="col-xs-12">
                <button data-numlabel='i_inverse_32' data-numtext="เลขกลับ" class="btn btn-warning btn-trans bt_inverse_2 l3" style="width:100%">
                  <i class="fa fa-random txt-theme" aria-hidden="true"></i> เลขกลับ</button>
              </div>
          </div>
          <div class="row 3num" style="margin-top: 3px;">
            <div class="col-xs-4">
                  <button id="btn_pressactive_w2_3_up_900" onclick="" data-numlabel='3_up_900' data-numtext="3 ตัวบน" class="btn btn-warning btn-trans btn_pressactive_w2 l3" style="width:100%">
                  3 ตัวบน [900]</button>
            </div>
            <div class="col-xs-4">
                  <button id="btn_pressactive_w2_3_under_450" data-numlabel='3_under_450' data-numtext="3 ตัวล่าง" class="btn btn-warning btn-trans btn_pressactive_w2 l3" style="width:100%">
                  3 ตัวล่าง [450]</button>
            </div>
            <div class="col-xs-4">
                  <button id="btn_pressactive_w2_3_front_450" data-numlabel='3_front_450' data-numtext="3 ตัวหน้า" class="btn btn-warning btn-trans btn_pressactive_w2 l3" style="width:100%">
                  3 ตัวหน้า [450]</button>
            </div>
            <div class="col-xs-12" style="margin-top:3px">
                  <button id="3_inverse_150_2" data-numlabel='3_inverse_150' data-numtext="3 ตัวโต๊ด" class="btn btn-warning btn-trans btn_pressactive_w2 l3" style="width:100%">
                  3 ตัวโต๊ด [150]</button>
            </div>

            <br/><br/><br/><br/>

            <div class="row pad3num" style="margin-left: 20px !important; display:none">

              <div class="col-xs-2" style="padding: 1px !important;">
                <button id="" data-numlabel='000' data-numtext="000" class="btn btn-trans bt_slot_top_help l3 l000" style="width:100%">
                  000 </button>
              </div>
              <div class="col-xs-2" style="padding: 1px !important;">
                <button id="" data-numlabel='100' data-numtext="100" class="btn btn-trans bt_slot_top_help l3 l100" style="width:100%">
                  100 </button>
              </div>
              <div class="col-xs-2" style="padding: 1px !important;">
                <button id="" data-numlabel='200' data-numtext="200" class="btn btn-trans bt_slot_top_help l3 l200" style="width:100%">
                  200 </button>
              </div>
              <div class="col-xs-2" style="padding: 1px !important;">
                <button id="" data-numlabel='300' data-numtext="300" class="btn btn-trans bt_slot_top_help l3 l300" style="width:100%">
                  300 </button>
              </div>
              <div class="col-xs-2" style="padding: 1px !important;">
                <button id="" data-numlabel='400' data-numtext="400" class="btn btn-trans bt_slot_top_help l3 l400" style="width:100%">
                  400 </button>
              </div>
            </div>
            <div class="row pad3num" style="margin-left: 20px !important;margin-top:5px; display:none">

              <div class="col-xs-2" style="padding: 1px !important;">
                  <button id="" data-numlabel='500' data-numtext="500" class="btn btn-trans bt_slot_top_help l3 l500" style="width:100%">
                    500 </button>
                </div>
                <div class="col-xs-2" style="padding: 1px !important;">
                  <button id="" data-numlabel='600' data-numtext="600" class="btn btn-trans bt_slot_top_help l3 l600" style="width:100%">
                    600 </button>
                </div>
                <div class="col-xs-2" style="padding: 1px !important;">
                  <button id="" data-numlabel='700' data-numtext="700" class="btn btn-trans bt_slot_top_help l3 l700" style="width:100%">
                    700 </button>
                </div>
                <div class="col-xs-2" style="padding: 1px !important;">
                  <button id="" data-numlabel='800' data-numtext="800" class="btn btn-trans bt_slot_top_help l3 l800" style="width:100%">
                    800 </button>
                </div>
                <div class="col-xs-2" style="padding: 1px !important;">
                  <button id="" data-numlabel='900' data-numtext="900" class="btn btn-trans bt_slot_top_help l3 l900" style="width:100%">
                    900 </button>
                </div>
            </div>

          </div>

          <div class="row pad3num" style="margin-left: 0px !important;margin-top:5px;margin-bottom:5px;">
            <ul class="pad3num_list">

            </ul>
          </div>

          <div class="row 2num" style="display:none">
              <div class="col-xs-12">
                <button data-numlabel='i_inverse_32' data-numtext="เลขกลับ" class="btn btn-warning btn-trans bt_inverse_22 l2" style="width:100%">
                  <i class="fa fa-random txt-theme" aria-hidden="true"></i> เลขกลับ</button>
              </div>
          </div>
          <div class="row 2num" style="display:none; margin-top: 3px;">
            <div class="col-xs-6">
                    <button id="btn_pressactive_w22_2_up_90" data-numlabel='2_up_90' data-numtext="2 ตัวบน" class="btn btn-warning btn-trans btn_pressactive_w22 l2" style="width:100%">
                    2 ตัวบน [90]</button>
              </div>
              <div class="col-xs-6">
                    <button id="btn_pressactive_w22_2_under_90" data-numlabel='2_under_90' data-numtext="2 ตัวล่าง" class="btn btn-warning btn-trans btn_pressactive_w22 l2" style="width:100%">
                    2 ตัวล่าง [90]</button>
              </div>
          </div>
          <div class="row 2num" style="display:none; margin-left: 0px !important;margin-top:5px;">
            <div class="pad2num_listW" style="display:none; padding-left: 5px;">
              <div class="row">
                <div class="col-xs-4">
                  <h5>19 ประตู</h5>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='0' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f0" style="width:100%">0</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='1' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f1" style="width:100%">1</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='2' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f2" style="width:100%">2</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='3' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f3" style="width:100%">3</button>
                    </div>
                  </div>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='7' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f7" style="width:100%">7</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='4' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f4" style="width:100%">4</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='5' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f5" style="width:100%">5</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='6' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f6" style="width:100%">6</button>
                    </div>
                  </div>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='8' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f8" style="width:100%">8</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='9' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 fs2 f9" style="width:100%">9</button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <h5>รูดหน้า</h5>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='0' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r0" style="width:100%">0</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='1' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r1" style="width:100%">1</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='2' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r2" style="width:100%">2</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='3' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r3" style="width:100%">3</button>
                    </div>
                  </div>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='4' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r4" style="width:100%">4</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='5' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r5" style="width:100%">5</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='6' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r6" style="width:100%">6</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='7' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r7" style="width:100%">7</button>
                    </div>
                  </div>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='8' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r8" style="width:100%">8</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='9' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 rs2 r9" style="width:100%">9</button>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <h5>รูดหลัง</h5>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='0' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b0" style="width:100%">0</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='1' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b1" style="width:100%">1</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='2' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b2" style="width:100%">2</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='3' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b3" style="width:100%">3</button>
                    </div>
                  </div>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='4' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b4" style="width:100%">4</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='5' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b5" style="width:100%">5</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='6' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b6" style="width:100%">6</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='7' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b7" style="width:100%">7</button>
                    </div>
                  </div>
                  <div class="row" style="width:95%;">
                    <div class="col-xs-3">
                      <button id="" data-numlabel='8' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b8" style="width:100%">8</button>
                    </div>
                    <div class="col-xs-3">
                      <button id="" data-numlabel='9' data-numtext="2 ตัว" class="btn btn-trans bt_slot_top_help2 bs2 b9" style="width:100%">9</button>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="pad2num_list">
                <li><a onclick="ListClick(this)" data-numlabel="00" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum00"><span>00</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="01" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum01"><span>01</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="02" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum02"><span>02</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="03" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum03"><span>03</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="04" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum04"><span>04</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="05" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum05"><span>05</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="06" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum06"><span>06</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="07" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum07"><span>07</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="08" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum08"><span>08</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="09" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum09"><span>09</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="10" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum10"><span>10</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="11" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum11"><span>11</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="12" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum12"><span>12</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="13" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum13"><span>13</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="14" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum14"><span>14</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="15" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum15"><span>15</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="16" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum16"><span>16</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="17" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum17"><span>17</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="18" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum18"><span>18</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="19" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum19"><span>19</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="20" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum20"><span>20</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="21" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum21"><span>21</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="22" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum22"><span>22</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="23" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum23"><span>23</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="24" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum24"><span>24</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="25" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum25"><span>25</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="26" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum26"><span>26</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="27" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum27"><span>27</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="28" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum28"><span>28</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="29" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum29"><span>29</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="30" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum30"><span>30</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="31" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum31"><span>31</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="32" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum32"><span>32</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="33" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum33"><span>33</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="34" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum34"><span>34</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="35" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum35"><span>35</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="36" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum36"><span>36</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="37" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum37"><span>37</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="38" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum38"><span>38</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="39" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum39"><span>39</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="40" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum40"><span>40</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="41" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum41"><span>41</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="42" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum42"><span>42</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="43" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum43"><span>43</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="44" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum44"><span>44</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="45" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum45"><span>45</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="46" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum46"><span>46</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="47" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum47"><span>47</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="48" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum48"><span>48</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="49" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum49"><span>49</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="50" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum50"><span>50</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="51" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum51"><span>51</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="52" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum52"><span>52</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="53" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum53"><span>53</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="54" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum54"><span>54</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="55" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum55"><span>55</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="56" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum56"><span>56</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="57" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum57"><span>57</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="58" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum58"><span>58</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="59" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum59"><span>59</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="60" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum60"><span>60</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="61" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum61"><span>61</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="62" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum62"><span>62</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="63" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum63"><span>63</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="64" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum64"><span>64</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="65" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum65"><span>65</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="66" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum66"><span>66</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="67" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum67"><span>67</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="68" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum68"><span>68</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="69" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum69"><span>69</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="70" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum70"><span>70</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="71" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum71"><span>71</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="72" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum72"><span>72</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="73" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum73"><span>73</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="74" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum74"><span>74</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="75" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum75"><span>75</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="76" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum76"><span>76</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="77" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum77"><span>77</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="78" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum78"><span>78</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="79" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum79"><span>79</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="80" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum80"><span>80</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="81" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum81"><span>81</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="82" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum82"><span>82</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="83" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum83"><span>83</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="84" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum84"><span>84</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="85" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum85"><span>85</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="86" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum86"><span>86</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="87" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum87"><span>87</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="88" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum88"><span>88</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="89" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum89"><span>89</span></a></li></li>

                <li><a onclick="ListClick(this)" data-numlabel="90" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum90"><span>90</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="91" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum91"><span>91</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="92" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum92"><span>92</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="93" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum93"><span>93</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="94" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum94"><span>94</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="95" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum95"><span>95</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="96" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum96"><span>96</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="97" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum97"><span>97</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="98" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum98"><span>98</span></a></li></li>
                <li><a onclick="ListClick(this)" data-numlabel="99" data-numtext="2 ตัว" href="javascript:void(0)" class="btn btn-listNum listNum99"><span>99</span></a></li></li>
              </ul>
            </div>
          </div>

          <div class="row runnum" style="display:none; margin-top: 3px;">
            <div class="col-xs-6">
                    <button id="btn_pressactive_w2d_dot32_up_32" data-numlabel='dot32_up_3.2' data-numtext="วิ่งบน" class="btn btn-warning btn-trans btn_pressactive_w2d ldot" style="width:100%">
                    วิ่งบน [3.2]</button>
              </div>
              <div class="col-xs-6">
                    <button id="btn_pressactive_w2d_dot42_under_42" data-numlabel='dot42_under_4.2' data-numtext="วิ่งล่าง" class="btn btn-warning btn-trans btn_pressactive_w2d ldot" style="width:100%">
                    วิ่งล่าง [4.2]</button>
              </div>
          </div>
          <div class="row runnum" style="margin-left: 0px !important;margin-top:5px;margin-bottom:5px;">
            <ul class="runnum_list" style="display:none; ">
            <li><a onclick="ListClick(this)" data-numlabel="0" data-numtext="เลขวิ่ง"  href="javascript:void(0)" class="btn btn-listNum listNum0"><span>0</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="1" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum1"><span>1</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="2" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum2"><span>2</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="3" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum3"><span>3</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="4" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum4"><span>4</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="5" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum5"><span>5</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="6" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum6"><span>6</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="7" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum7"><span>7</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="8" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum8"><span>8</span></a></li>
              <li><a onclick="ListClick(this)" data-numlabel="9" data-numtext="เลขวิ่ง" href="javascript:void(0)" class="btn btn-listNum listNum9"><span>9</span></a></li>
            </ul>
          </div>
        </div>


      </div>
      <div class="col-xs-12 col-sm-6" style="padding-bottom: 10px">
        <div class="row">
              <div class="col-xs-8 col-sm-8">
                <h4 class="text-left txt-theme">รายการแทงทั้งหมด <span id="numItems">0</span> รายการ</h4>
              </div>
              <div class="col-xs-4 col-sm-4">
                <h4 class="text-right txt-theme"><button class="btn btn-warning" data-toggle="modal" data-target="#myModal">ดึงโพย <i class="fa fa-file-text" aria-hidden="true"></i></button></h4>
             
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog modal-lg">
                  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header" style="border:0">
                        <button type="button" class="close" data-dismiss="modal"><i  style="color:#333" class="fa fa-times" aria-hidden="true"></i></button>
                      </div>
                      <div class="modal-body">
                        <h1 style="color:#4d0c09; font-weight: bold;text-align:center">เลขชุด - ดึงโพย</h1>


                        <ul class="nav nav-tabs" style="font-weight: bold;color:#000">
                          <li class="active" style="width: 50%;"><a style="text-align:center;font-size:14px;" data-toggle="tab" href="#home">เลขชุด</a></li>
                          <li style="width: 50%;"><a style="text-align:center;font-size:14px;" data-toggle="tab" href="#menu1">ดึงโพย</a></li>
                        </ul>

                        <div class="tab-content" style="background-color:#990000;  min-height:300px;">
                          <div id="home" class="tab-pane fade in active" style="padding:20px;">
                            <div class="row">
                              <div class="col-xs-12 text-right" style="">
                                <button  onclick="window.location.replace('<?php echo site_url('lottonew/setMainNumber')?>');" data-numlabel='5' data-numtext="5" class="btn btn-warning btn-trans" style="font-weight:bold">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> จัดการเลขชุด</button>
                                   <button  onclick="window.location.replace('<?php echo site_url('lottonew/setNumber')?>');" data-numlabel='5' data-numtext="5" class="btn btn-warning btn-trans" style="font-weight:bold">
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i> สร้างเลขชุด</button>
                              </div>
                            </div>
                            <div class="row" style=" border-bottom:1px solid #A52A2A;">
                              <div class="col-xs-3 text-center" style="font-weight:bold">
                                <i class="fa fa-book" aria-hidden="true"></i> ชื่อชุด
                              </div>
                              <div class="col-xs-4 text-left" style="font-weight:bold">
                                <i class="fa fa-calendar" aria-hidden="true"></i> เวลาสร้าง
                              </div>
                              <div class="col-xs-5 text-left" style="font-weight:bold">
                                <i class="fa fa-usd" aria-hidden="true"></i> เลข
                              </div>
                            </div>
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

                            <?php }else{
                                    $chkk = false;
                                    foreach($histMyNumber as $key=>$data) {  
                                      $arr = array();
                                      $numarr = array();
                                      $rows = $this->lottomdnew->histMyNumberList($data['id']);
                                      foreach($rows as $key00=>$data00) {
                                        $arr[] = $data00['number'];
                                        $numarr[] = array('numlabel'=>$label_arr[$data00['description']],'number'=>$data00['number'],'numtext'=>$data00['description']);
                                        $chkk=true;
                                      }
                            ?>
                                    <div onclick="" class="row" style="cursor: pointer;margin-top:5px;padding:5px;     background-color: #381a1a26;">
                                        <div class="col-xs-3 text-center" style="font-weight:normal">
                                          <div class="row">
                                            <div class="col-xs-12 col-md-4">
                                              <input onclick="if($(this).data('dataset').length){setSelectbyHist($(this).data('dataset')); $('#myModal').modal('toggle')}" data-dataset='<?php echo json_encode($numarr);?>' type="button" class="btn btn-warning btn-play" value="แทงชุดนี้" style="margin-top:-5px">
                                            </div>
                                            <div class="col-xs-12 col-md-8"><?php echo $data['name'];?></div>
                                          </div>
                                        </div>
                                        <div class="col-xs-4 text-left" style="">
                                        <?php echo substr($data['date_time_add'],8,2).'/'.substr($data['date_time_add'],5,2).'/'.substr($data['date_time_add'],0,4).' '.substr($data['date_time_add'],11,5);?>
                                        </div>
                                        <div class="col-xs-5 text-left" style="">
                                        <?php 
                                          echo implode(',',$arr);
                                        ?>
                                        </div>
                                    </div>

                            <?php
                              } 
                            }?>
                          </div>
                          <div id="menu1" class="tab-pane fade" style="padding:20px;" >
                            <div class="row" style=" border-bottom:1px solid #A52A2A;">
                                <div class="col-xs-3 text-center" style="font-weight:bold">
                                  <i class="fa fa-book" aria-hidden="true"></i> โพย
                                </div>
                                <div class="col-xs-4 text-left" style="font-weight:bold">
                                  <i class="fa fa-calendar" aria-hidden="true"></i> เวลาสร้าง
                                </div>
                                <div class="col-xs-5 text-left" style="font-weight:bold">
                                ฿ จำนวน
                                </div>
                            </div>
                            <?php if(empty($histBill)){?>
                            <div class="row" style="margin-top:5px;background-color:#660000; min-height: 250px;  overflow-y:scroll; overflow-x:non; ">
                                <h4 style="margin-top:100px; color:#FF9900; font-weight:bold; text-align:center">ไม่พบข้อมูล</h4>
                            </div>
                            <?php }else {
                                    foreach($histBill as $key=>$data) {  
                            ?>
                                    <div onclick="window.location.replace('<?php echo site_url('lottonew/view/'.$data->lotto_group);?>')" class="row" style="cursor: pointer;margin-top:5px;padding:5px;     background-color: #381a1a26;">
                                        <div class="col-xs-3 text-center" style="font-weight:normal">
                                          <?php 
                                          echo substr($data->lotto_group,8,2).substr($data->lotto_group,5,2).substr($data->lotto_group,0,4).'0'.$this->lottomdnew->getHistBillOnce($data->lotto_group);
                                          ?>
                                        </div>
                                        <div class="col-xs-4 text-left" style="">
                                          <?php echo substr($data->date_time_add,8,2).'/'.substr($data->date_time_add,5,2).'/'.substr($data->date_time_add,0,4).' '.substr($data->date_time_add,11,5);?>
                                        </div>
                                        <div class="col-xs-5 text-left" style="">
                                          <?php echo $this->lottomdnew->getHistBillSum($data->lotto_group);?>
                                        </div>
                                    </div>
                            <?php 
                                    }
                            }?>
                            <!--
                            <div class="row" style="margin-top:10px">
                              <div class="col-xs-12 text-center" style="">
                                <button  data-numlabel='<' data-numtext="<" class="btn btn-danger btn-trans" style="font-weight:bold">
                                 < </button>
                                <button  data-numlabel='>' data-numtext=">" class="btn btn-danger btn-trans" style="font-weight:bold">
                                 > </button>
                              </div>
                            </div>
                            -->

                          </div>
                        </div>

                      </div>
                    </div>
                    
                  </div>
                </div>
             
              </div>
        </div>
        <div class="row" style="border-top: 1px #777 solid;min-height: 80px;">
          <br/>
          <h5 id="itemSelectedNull" class="text-center"color="#fff">ยังไม่มีรายการแทง</h5>


          <div class="row wbtn_cleardata" style="width:99%; margin: 0px auto; margin-top:-10px; margin-bottom: 5px; padding: 0px; display:none">
            <div class="row" style="margin-top:5px">
              <div class="col-xs-3 col-sm-2 text-left" style="">
                <span style="color:#fff;font-size:16px;padding-left:5px;">ใส่ราคา:</span>
              </div>
              <div class="col-xs-9 col-sm-10 text-right">
                <button  onclick="chgBYbt(5)" data-numlabel='5' data-numtext="5" class="btn btn-info btn-trans" style="">
                    <span>5</span></button>
                <button  onclick="chgBYbt(10)" data-numlabel='5' data-numtext="5" class="btn btn-info btn-trans" style="">
                  <span>10</span></button>
                <button  onclick="chgBYbt(50)" data-numlabel='5' data-numtext="5" class="btn btn-info btn-trans" style="">
                  <span>50</span></button>
                <button  onclick="chgBYbt(100)" data-numlabel='5' data-numtext="5" class="btn btn-info btn-trans" style="">
                  <span>100</span></button>
              </div>
            </div>
          </div>

          <div class="row header" style="display:none">
            <div class="col-xs-2">
              <span class="txt-theme">ตัวเลข</span>
            </div>
            <div class="col-xs-3">
            <span class="txt-theme">ราคาแทง</span>
            </div>
            <div class="col-xs-5">
            <span class="txt-theme">เรทชนะ</span>
            </div>
            <div class="col-xs-2">
            <span class="txt-theme"><i class="fa fa-chevron-up" aria-hidden="true"></i></span>
            </div>
          </div>
          
          <div class="contentList">

          </div>


          <div class="row wbtn_cleardata" style="/*background-color:rgba(0,0,0,0.2);*/background-color:#370906; padding: 30px; width:99%; margin: 5px auto; padding: 20px; display:none">
            <div class="col-xs-6 text-center">
              <button id="btCheckNumber" data-numlabel='' data-numtext="" class="btn btn-warning btn-trans" style="width:100%">
              <i class="fa fa-eye" aria-hidden="true"></i> ดูเลขซ้ำ</button>
            </div>
            <div class="col-xs-6 text-center">
              <button id="btCheckNumberCut" data-numlabel='' data-numtext="" class="btn btn-warning btn-trans" style="width:100%">
              <i class="fa fa-scissors" aria-hidden="true"></i> ตัดเลขซ้ำออก</button>
            </div>
          </div>

          <div class="row wbtn_cleardata" style="/*background-color:rgba(0,0,0,0.2);*/background-color:#370906; padding: 30px; width:99%; margin: 5px auto; padding: 20px; display:none">
            <div class="row" style="">
              <div class="col-xs-12 text-left">
                <span class="txt-theme" style="font-size:14px; font-weight:bold">ตั้งราคาเดิมพันเท่ากัน</span>
              </div>
              <div class="col-xs-7 text-left">
                <input id="txtChg" style="text-align:left" value="1" onchange="($(this).val().length); if($(this).val().length>0){$('#btchageVal').attr('disabled',false)}else{$('#btchageVal').attr('disabled',true)}" onkeyup="" placeholder="กรอกราคาเดิมพันเท่ากัน" type="number" min=1 class="form-control txtList" value="1">
              </div>
              <div class="col-xs-5 text-left">
                <button disabled="true" id="btchageVal" data-numlabel='' data-numtext="" class="btn btn-warning btn-trans" style="width:100%">
                    เดิมพันเท่ากัน</button>
              </div>
            </div>
            <div class="row" style="margin-top:5px">
              <div class="col-xs-12 text-center">
                <button  onclick="chgBYbt(1)" data-numlabel='1' data-numtext="แทงขั้นต่ำ" class="btn btn-info1 btn-trans" style="">
                    แทงขั้นต่ำ</button>
                <button  onclick="chgBYbt(5)" data-numlabel='5' data-numtext="5" class="btn btn-info1 btn-trans" style="">
                    5</button>
                <button  onclick="chgBYbt(10)" data-numlabel='5' data-numtext="5" class="btn btn-info1 btn-trans" style="">
                    10</button>
                <button  onclick="chgBYbt(50)" data-numlabel='5' data-numtext="5" class="btn btn-info1 btn-trans" style="">
                    50</button>
                <button  onclick="chgBYbt(100)" data-numlabel='5' data-numtext="5" class="btn btn-info1 btn-trans" style="">
                    100</button>
              </div>
            </div>
          </div>

          <div class="row wbtn_cleardata" style="/*background-color:rgba(0,0,0,0.2);*/background-color:#370906; padding: 30px; width:99%; margin: 5px auto; padding: 20px; display:none">
            <div class="col-xs-6 text-center">
              <span class="txt-theme">ยอดเดิมพันทั้งหมด</span><br/>
              <span style="font-size: 18px; font-weight:bold"><span id="sumPlay">0</span> ฿</span>
            </div>
            <div class="col-xs-6 text-center">
              <span class="txt-theme">เครดิตคงเหลือ</span><br/>
              <span style="font-size: 18px; font-weight:bold; color:green"><span id="creditTotal">0</span> ฿</span>
            </div>
          </div>

          <div class="row wallet_0" style="/*background-color:rgba(0,0,0,0.2);*/background-color:#370906; padding: 30px; width:99%; margin: 5px auto; padding: 20px; display:none">
            <div class="col-xs-12 text-center">
              ยอดเงินของคุณไม่เพียงพอ, <a href="<?php echo site_url('deposit')?>" style="text-decoration:underline; color:#0033CC">กรุณาฝากเงิน</a>
            </div>
          </div>

          <div class="row wbtn_cleardata" style="width:99%; margin:0 auto; padding: 5px; display:none">
            <div class="col-xs-12">
              <?php if(!$LottoResultSuccess){?>
              <button class="btn btn-warning btn_cleardata " style="width:100%; color:#fff; font-size: 16px;"><i style="color:#fff" class="fa fa-times-circle" aria-hidden="true"></i> ล้างข้อมูล</button>
              <?php }?>
            </div>

            <br/>
            <div class="col-xs-12 text-center submit" style="margin-top:5px;">
              <form class="p-3 my-3" id="formSave" class="form-horizontal" method="post" action="">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                <input type="hidden" id="dataList" name="dataList" value="">
                <?php if(!$LottoResultSuccess){?>
                <button id="bt_submit" onclick="if(confirm('ยืนยันข้อมูล?')){save();return false;}else{return false;}" class="btn btn-warning " style="width:100%; color:#B22222; font-size: 18px; font-weight:bold"><i style="color:#B22222" class="fa fa-floppy-o" aria-hidden="true"></i>  บันทึก</button>
                <?php }?>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row main_left" style="border: 3px #f3b70c solid; /*background-color:rgba(0,0,0,0.1);*/background-color:#450B08;  border-radius: 10px; margin:10px auto;">
      <div class="col-xs-12" style=";min-height:250px;">
        <div class="col-xs-8">
          <h4 class="text-left txt-theme">รายการเลขอั้น</h4>
        </div>
      <!-- 
        <div class="col-xs-4">
          <h4 class="text-right txt-theme"><button class="btn btn-warning">ทั้งหมด <i class="fa fa-external-link" aria-hidden="true"></i></button></h4>
        </div>
      -->
        <div class="row" style="width:99%; margin:0 auto">
          <div class="col-xs-12" style="border-top: 1px solid #5d2828 !important;">
            <div class="col-xs-12 text-left" id="content_numberFoo">


              </div>
          </div>
        </div>
      </div>
    </div>

 