<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">

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
          select option {
                margin: 40px;
                background: rgba(0, 0, 0, 0.3);
                color: #fff;
                text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
            }
            table, th, td,.odd ,tbody tr, thead tr{
                border: 1px solid black;
                border-collapse: collapse;
                background-color: rgba(0,0,0,0.1) !important;
            }
            .btn-warning {
                background-color: #f0b90b !important; 
                border-color: #f0b90b !important; 
            }
        </style>

<h1 class="text-center txt-theme">ประมวลผลผู้ถูกรางวัล</h1>

    <div class="row main_left" style="border: 3px #f3b70c solid; /*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; border-radius: 10px; margin:0 auto; padding: 10px;">
      <div class="col-xs-6 col-sm-6 text-left" style="">
      <a href="#" onclick="window.location.replace('<?php echo site_url('lottonew');?>')" style="font-size: 20px;font-weight: bold" class="btn txt-theme">< กลับ </a>
      </div>
      <div class="col-xs-6 col-sm-6 text-right" style="">
        <button  data-toggle="modal" data-target="#myModal0" onclick="return false"  class="btn btn-warning btn-trans" style="font-weight:bold">
            <i class="fa fa-plus-square-o" aria-hidden="true"></i> สร้างการประมวลผล
        </button>
                      <!-- Modal -->
                      <div class="modal fade" id="myModal0" role="dialog">
                        <div class="modal-dialog modal-lg">
                        
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-body modal-p" style="">
                                <div class="row">
                                    <div class="col-xs-12 text-center" style="padding-left: 30px;padding-right: 30px;">
                                        <h2 style="text-align:center" class="font-weight-bold font-title text-h5 text-center">สร้างการประมวลผล</h2>
                                    </div>
                                </div>
                                <form id="formAdd" method="post">
                                    <input type="hidden" name="lotto_type" value="1"/>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>งวดวันที่</label>
                                            <select class="form-control" name="lotto_group" value="<?php echo $lottoGroupNow;?>">
                                            <!-- <option value="">เลือกงวด</option> -->
                                            <?php foreach($date_result as $key=>$data){?>
                                                    <option <?php if(substr($data['date_closed'],0,10)==$lottoGroupNow){?> selected <?php }?> value="<?php echo substr($data['date_closed'],0,10);?>"><?php echo substr($data['date_closed'],8,2).'/'.substr($data['date_closed'],5,2).'/'.substr($data['date_closed'],0,4);?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div> 
                                    <br/>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>ผลรางวัลที่ 1</label>
                                            <input type="text" class="form-control" maxlength="6" name="special" placeholder="ผลรางวัลที่ 1 XXXXXX (6 หลัก)" value="000000">
                                        </div>
                                    </div> 
                                    <div class="row">
                                    <br/>
                                        <div class="col-xs-12">
                                            <label>3 ตัวหน้า 2 เบอร์ ขั้นด้วย ,</label>
                                            <input type="text" class="form-control" maxlength="7" name="three_front" placeholder="3 ตัวหน้า 2 เบอร์ XXX,XXX (3 หลัก) ขั้นด้วย ," value="000,000">
                                        </div>
                                    </div> 
                                    <div class="row">
                                    <br/>
                                        <div class="col-xs-12">
                                            <label>3 ตัวล่าง 2 เบอร์ ขั้นด้วย ,</label>
                                            <input type="text" class="form-control" maxlength="7" name="three_back" placeholder="3 ตัวล่าง 2 เบอร์ XXX,XXX (3 หลัก) ขั้นด้วย ," value="000,000">
                                        </div>
                                    </div> 
                                    <div class="row">
                                    <br/>
                                        <div class="col-xs-12">
                                            <label>2 ตัวล่าง</label>
                                            <input type="text" class="form-control" maxlength="2" name="two_down" placeholder="2 ตัวล่าง XX (2 หลัก)" value="00">
                                        </div>
                                    </div>
                                    <div class="row">
                                    <br/>
                                        <div class="col-xs-12">
                                            <label>เวลาปิด</label>
                                            <input type="time" class="form-control" maxlength="2" name="date_time_closed" placeholder="เวลาปิด" value="15:20">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-xs-12 text-center" style="text-align:center">
                                            <a href="#" id="bt_addSubmit" class="btn btn-warning"><i class="fa fa-save"></i> บันทึก/ประมวลผล</a>
                                            <a href="#" class="btn btn-danger" data-dismiss="modal"><i  style="color:#333" class="fa fa-times" aria-hidden="true"></i> ยกเลิก</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          
                         </div>
                        </div>
                    </div>
      </div>

        <div class="col-xs-12 col-sm-12" style="min-height:250px;/*background-color:rgba(0,0,0,0.1);*/background-color:#450B08; padding-bottom: 30px; margin-top:10px;">

                                <div class="row" style="">
                                    <div class="col-xs-12">
                                            <table class="table table-striped table-bordered" id="example" style="width:100%">
                                            <thead><tr><th width="5%">ลำดับ</th><th>งวดวันที่</th><th>จำนวนผู้ถูกรางวัล</th><th>วันเวลาประมวลผล</th><th>#</th></tr></thead>
                                            <tbody>
                                        <?php
                                            if(empty($dataList)){
                                        ?>
                                                <tr><td colspan="4" align="center">ไม่พบข้อมูล</td></tr>
                                        <?php
                                            }else{

                                                //die(print_r($dataList));
                                                foreach($dataList as $key=>$data) {  
                                        ?>
                                                <tr>
                                                    <td><?php echo ($key+1);?></td><td><?php echo substr($data['lotto_group'],8,2).'/'.substr($data['lotto_group'],5,2).'/'.substr($data['lotto_group'],0,4);?></td><td><?php echo $data['num'];?></td><td><?php echo substr($data['process_time'],8,2).'/'.substr($data['process_time'],5,2).'/'.substr($data['process_time'],0,4).' '.substr($data['process_time'],11,5);?></td>
                                                    <td width="20%"><a data-id="<?php echo $data['lotto_group'];?>" class="btn btn-warning btnEdit" href="<?php echo site_url('lottonew/index2/'.$data['lotto_group']);?>"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
                                                </tr>
            <?php /*echo substr($data['date_time_add'],8,2).'/'.substr($data['date_time_add'],5,2).'/'.substr($data['date_time_add'],0,4).' '.substr($data['date_time_add'],11,5);*/?>

                                        <?php
                                                }
                                            }
                                        ?>
                                            </tbody>
                                            </table>
                                </div>
                              </div>


      </div>
    </div>

<script>
$(document).ready(function() {
    $('#example').DataTable({"pageLength": 25});
} );

$("#bt_addSubmit").click(function(){

  var chk = true;
  //protection
  if($("input[name='special']").val().length!=6 || !isNumeric($("input[name='special']").val())) {
    alert('กรุณากรอกข้อมูลให้ถูกต้อง !');
    $("input[name='special']").focus();
    chk = false;
    return false;
  }
  if($("input[name='two_down']").val().length!=2 || !isNumeric($("input[name='two_down']").val())) {
    alert('กรุณากรอกข้อมูลให้ถูกต้อง !');
    $("input[name='two_down']").focus();
    chk = false;
    return false;
  }
  var myArr = $("input[name='three_front']").val().split(",");
  if($("input[name='three_front']").val().length!=7 || myArr[0].length!=3 || myArr[1].length!=3 || !isNumeric(myArr[0]) || !isNumeric(myArr[1])) {
    alert('กรุณากรอกข้อมูลให้ถูกต้อง !');
    $("input[name='three_front']").focus();
    chk = false;
    return false;
  }
  var myArr = $("input[name='three_back']").val().split(",");
  if($("input[name='three_back']").val().length!=7 || myArr[0].length!=3 || myArr[1].length!=3 || !isNumeric(myArr[0]) || !isNumeric(myArr[1])) {
    alert('กรุณากรอกข้อมูลให้ถูกต้อง !');
    $("input[name='three_back']").focus();
    chk = false;
    return false;
  }
  //protection

  if(chk) {
      //protection
      $.ajax({
      type: "POST",
      url: '<?php echo base_url('lottonew/process_winner');?>',
      data: $("#formAdd").serialize(), // serializes the form's elements.
      success: function(data)
      {
        alert(data.message);
        
        if(data.processList.length<1){alert('ไม่พบผู้ถูกรางวัล!');}

        if(data.status=='success') {
          location.reload();
        }else {
          //$("#myModal0").modal("toggle");
        }
      }
    });
      //console.log($("#formAdd").serialize());
      //alert('saved!');
  }
});

function isNumeric(str) {
  if (typeof str != "string") return false // we only process strings!  
  return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
         !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}

</script>
    


 