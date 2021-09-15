<script>
var lottoGroupNow = '<?php echo $lottoGroupNow;?>'; //งวด
var LottoResultSuccess = '<?php echo $LottoResultSuccess;?>'; //ออกผลแล้ว
var rateReward = JSON.parse('<?php echo $rateReward;?>');

var sumPlay = 0;

var chk_histMyNumberList = '<?php if($chkk){ echo 'true'; }else{ echo 'false'; }?>';
function getReward(unit,numtext) {
  console.log(numtext);
  unit = parseFloat(unit);
  for(ll=0;ll<rateReward.length;ll++) {
    //console.log(unit+":::"+parseFloat(rateReward[ll].min)+'::'+parseFloat(rateReward[ll].max));
    if(unit>=parseFloat(rateReward[ll].min) && unit<=parseFloat(rateReward[ll].max) && numtext==rateReward[ll].description) {
      console.log(rateReward[ll]);
      return parseFloat(rateReward[ll].reward);
    }
  }

  return 2.9;
}
$(document).ready(function(){
  renderNumberFoo();
});

 var numpaddButtonSelected = []; //Chabel ที่เลือกไว้
 var numpaddUnitSelected = ""; //จำนวนหลักที่เลือกไว้
 var displayVal = ""; //สตริงเก็บข้อมูลแสดง Display

 var itemSelected = []; //รายการที่เลือกไว้

 var fag_number = false//เลขกลับ

$(".btn_pressmainactive").click(function(){  // Chanel Select
  $(".btn_pressmainactive").removeClass("active");
  $(".btn_pressactive").removeClass("active");
  $(this).addClass("active");
});

$(".button_helpplay_press").click(function(){ //helpplay press

  for (let i = 0; i < numpaddButtonSelected.length; i++) {
    if(numpaddButtonSelected[i].numlabel.charAt(0)=='1') {
      numpaddButtonSelected.splice(i, 1);
    }else if(numpaddButtonSelected[i].numlabel.charAt(0)!='2') {
      numpaddButtonSelected.splice(i, 1);
    }
  }

  /*
  if($(this).hasClass("active")) {
    $(this).removeClass("active");
  }*/

  //$(this).removeClass("active");
  //$(".button_helpplay_press").removeClass("active");

  if(!$(this).hasClass("active")) {
    //alert('1');
    numpaddUnitSelected = $(this).data('numlabel').charAt(0);
    numpaddButtonSelected.push({'numtext':$(this).data('numtext'),'numlabel':$(this).data('numlabel')});
    $(".button_helpplay_press").removeClass("active");
    $(this).addClass("active");
  }else {
    $(".button_helpplay_press").removeClass("active");
  }

  if(!$(".button_helpplay_press").hasClass('active')) {//ถ้าไม่ได้กดปุ่มช่วยเเทงแล้ว
      $(".display_numpad:eq(0)").show(); //display 2 column
      $(".display_numpad:eq(1)").show(); //display 2 column
      $(".display_numpad:eq(2)").hide(); //display 2 column
  }else {
    $(".display_numpad:eq(1)").hide(); //display 1 column
    $(".display_numpad:eq(2)").hide(); //display 1 column
  }

}); 

$("#bt_inverse").click(function(){
  if($("#3_inverse_150").hasClass("active")) {
    $("#3_inverse_150").removeClass("active");
    for (let i = 0; i < numpaddButtonSelected.length; i++) {
      if(numpaddButtonSelected[i].numlabel=="3_inverse_150") {
        numpaddButtonSelected.splice(i, 1);
          $(".numpad").hide();

          $(this).addClass("active");
          fag_number = true;$(this).addClass("active");
          return;
      }
    }
  }else {
    if($(".btn_pressactive.ldot").hasClass("active")) {return false;}
    if($(this).hasClass("active")) {
      $(this).removeClass("active");
      fag_number = false;
    }else {
      $(this).addClass("active");
      fag_number = true;
    }
  }
});


$(".btn_pressactive").click(function(){ //กดเอง & Chanel Click
  if($(this).hasClass("active")) {
    $(this).removeClass("active");
    for (let i = 0; i < numpaddButtonSelected.length; i++) {
      if(numpaddButtonSelected[i].numlabel==$(this).data('numlabel')) {
        numpaddButtonSelected.splice(i, 1);
        if(numpaddButtonSelected.length<1) {
          $(".numpad").hide();
        }

        if(!$(".btn_pressactive").hasClass('active')) {
          $(".numpad").hide();//Show numpad 3
          $(".help_play").hide();
          $(".button_helpplay").removeClass('active');
        }  

        return;
      }
    }
  }else {
    if(numpaddUnitSelected != $(this).data('numlabel').charAt(0)){// && $(this).data('numlabel').charAt(0)!='2') {
      numpaddButtonSelected = [];
    }
    numpaddUnitSelected = $(this).data('numlabel').charAt(0);
    numpaddButtonSelected.push({'numtext':$(this).data('numtext'),'numlabel':$(this).data('numlabel')});
    displayVal = '';
  }
        
  clear3display_numpad(this);
  $(this).addClass("active");  

  //alert($(this).data('numlabel'));
});
//

$(".numpad_button").click(function(){ //Numpadd Click Event
  if($("#creditTotal").html()=='-' || $("#creditTotal").html()=='0') {
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('ระบบกำลังดึงข้อมูล เครดิตคงเหลือ กรุณาลองใหม่อีกครั้ง!');
    return;
  }
  
  if($(this).data('num')!='b') {
    displayVal+=$(this).data('num');
  
    numPaddDisplay = numpaddUnitSelected;
    if(numpaddUnitSelected=='d') {
      numPaddDisplay = 1;
    }
    //if(numpaddUnitSelected=='2') {//แก้ 19 ประตู รูดหน้า รูดหลัง
    //  numPaddDisplay = 1;
    //}

    if(displayVal.length==numPaddDisplay) {
      setTimeout(function(){setListSelect();},300);
    }
  }else {
   // alert('//2');
    displayVal = displayVal.substring(0, displayVal.length-1);
  }
  $("#display_numpad31").val(displayVal.charAt(0));
  $("#display_numpad32").val(displayVal.charAt(1));
  $("#display_numpad33").val(displayVal.charAt(2));
});

$("#3_inverse_150").click(function(){
 // alert($(this).hasClass('active'));
  if($(this).hasClass('active')){
    fag_number = false;
  }else{
    if($("#bt_inverse").hasClass("active")){fag_number=false;}else{}
  }
})//3 ตัวโต๊ดกด ยกเลิกเลขกลับ

function clear3display_numpad(node) { //Clear Display and Numpad
 // displayVal = "_";
 // $('#display_numpad31').val(displayVal);

  $( ".display_numpad").each(function( index ) {
    $( this ).val("");
    //console.log( index + ": " + $( this ).val() );
  });

  //$(".btn_pressactive").removeClass("active");
  /*
  if($(node).data('numlabel').charAt(0)=='i'){
    $("#3_inverse_150").removeClass("active"); //กดกลับแล้ว ยกเลิกกด 3 ตัวโต๊ด
    $(".ldot").removeClass("active");
    for (let i = 0; i < numpaddButtonSelected.length; i++) {
      if(numpaddButtonSelected[i].numlabel=='3_inverse_150' || numpaddButtonSelected[i].numlabel=='dot32_up_3.2' || numpaddButtonSelected[i].numlabel=='dot42_under_4.2' || numpaddButtonSelected[i].numlabel.charAt(0)=='1') {
        numpaddButtonSelected.splice(i, 1);
      }
    }

    $(".help_play").hide();
    $(".button_helpplay").removeClass('active');
  }else */if($(node).data('numlabel').charAt(0)=='3') {

    if($(node).data('numlabel')=='3_inverse_150' || $(node).data('numlabel')=='dot32_up_3.2' || $(node).data('numlabel')=='dot42_under_4.2' || $(node).data('numlabel')=='1') {//กดกลับไม่ได้
      $("#bt_inverse").removeClass("active");
      for (let i = 0; i < numpaddButtonSelected.length; i++) {
        if(numpaddButtonSelected[i].numlabel=='dot32_up_3.2' || numpaddButtonSelected[i].numlabel=='dot42_under_4.2' || numpaddButtonSelected[i].numlabel.charAt(0)=='1') {
          numpaddButtonSelected.splice(i, 1);
        }
      }
    }

    $(".btn_pressactive.l2").removeClass("active");
    $(".btn_pressactive.ldot").removeClass("active");
    $(".display_numpad").show(); //display numpad 3 column
    $(".numpad").show();//Show numpad 3

    $(".help_play").hide();
    $(".button_helpplay").removeClass('active');
  }else if($(node).data('numlabel').charAt(0)=='2') {
    $(".btn_pressactive.l3").removeClass("active");
    $(".btn_pressactive.ldot").removeClass("active");
    $(".display_numpad:eq(0)").show(); //display 2 column
    $(".display_numpad:eq(1)").show(); //display 2 column
    $(".display_numpad:eq(2)").hide(); //display 2 column
    $(".numpad").show();//Show numpad 3

    $(".help_play").show();
    //$(".button_helpplay").removeClass('active');
  }else if($(node).data('numlabel').charAt(0)=='d'){
    $(".btn_pressactive.l3").removeClass("active");
    $(".btn_pressactive.l2").removeClass("active");
    $("#bt_inverse").removeClass("active");
    $(".display_numpad:eq(1)").show(); //display 1 column
    $(".display_numpad:eq(1)").hide(); //display 1 column
    $(".display_numpad:eq(2)").hide(); //display 1 column
    $(".numpad").show();//Show numpad 3

    $(".help_play").hide();
    $(".button_helpplay").removeClass('active');
  }


}

function setListSelect() {
  if(numpaddButtonSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
  
  for(a=0;a<numpaddButtonSelected.length;a++) {//Set Item Selected

    var number = displayVal;
    var unit = 1;
    if(numpaddButtonSelected[a].numlabel.charAt(0)=='d') {
      unit = 10;
    }
    var price_arr = numpaddButtonSelected[a].numlabel.split("_");
    var price = price_arr[price_arr.length-1];

    var numlabel =  numpaddButtonSelected[a].numlabel;
    var numtext = numpaddButtonSelected[a].numtext;

    var jMax = 1;
    var tempNumber = []; 
    if(fag_number==true){ //เช็ค fag เลขกลับ
      tempNumber = switchNumber(displayVal);
      jMax = tempNumber.length;
    }else if(numlabel=='2_up_90' || numlabel=='2_under_90'){ //2 ตัวบน หรือ ล่าง
      if($("#button_helpplay_press_1_19door_90").hasClass('active')){ //ถ้ากด 19 ประตู
        tempNumber = gen19door(displayVal);
        jMax = tempNumber.length;
      }else if($("#button_helpplay_press_1_rootfront_90").hasClass('active')){ //รูดหน้า
        tempNumber = root_front(displayVal);
        jMax = tempNumber.length;
      }else if($("#button_helpplay_press_1_rootback_90").hasClass('active')){ //รูดหลัง
        tempNumber = root_back(displayVal);
        jMax = tempNumber.length;
      }
    }else if(numlabel=='1_19door_90' || numlabel=='1_rootfront_90' || numlabel=='1_rootback_90') {
      continue;
    }

    //rmList(this.3_up_900.145)
    
    /*
    else if($("#button_helpplay_press_1_19door_90").hasClass('active')){ //ถ้ากด 19 ประตู
      numlabel = '2_up_90';
      numtext = '2 ตัวบน';
      tempNumber = gen19door(displayVal);
      jMax = tempNumber.length;
    }
    */
  if($("#creditTotal").html()=='-' || $("#creditTotal").html()=='0') {
    alert('ระบบกำลังดึงข้อมูล เครดิตคงเหลือ กรุณาลองใหม่อีกครั้ง!');
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    return;
  }else if(parseInt($("#headTop").html()-sumPlay)-jMax<0){
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('เครดิตไม่พอ กรุณาเติมเงิน!');
    return;
  }

    for(k=0;k<jMax;k++){
      if(tempNumber.length>0){number=tempNumber[k];}

      price = getReward(unit,numtext);

      var deprive = false;
      var tempArr = numberFooCheck(number);
      if(tempArr.status) {
        deprive = true;
        price = tempArr.price;
      }

      itemSelected.push({
        "id":itemSelected.length,
        "numlabel" : numlabel,
        "numtext" : numtext,
        'displayVal': number,
        'unit': unit,
        'price': (unit*price),
        'deprive':deprive
      });
      //console.log(itemSelected);
      $('<div data-number="'+number+'"  class="deprive'+deprive+' ll'+(itemSelected.length-1)+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+(itemSelected.length-1)+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
    }

  }//
  displayVal = ""; //display numpad clear
  $("#display_numpad31").val("");
  $("#display_numpad32").val("");
  $("#display_numpad33").val("");

  if(numpaddUnitSelected==3) {
    $(".display_numpad").show(); //display numpad 3 column
  }else if(numpaddUnitSelected==2) {
    $(".display_numpad:eq(2)").hide(); //display 2 column
  }else {
    $(".display_numpad:eq(1)").hide(); //display 1 column
    $(".display_numpad:eq(2)").hide(); //display 1 column
  }
  $("#numItems").html(itemSelected.length);


  setTimeout(function(){setSumPlay();},1000);
}

$(".btn_cleardata").click(function(){//Clear Data
  if(!confirm('คุณต้องการล้างรายการ ทั้งหมด ใช่หรือไม่?')) {
    return false;
  }

  if(chk_histMyNumberList==true) {
    $.ajax({
      type: "POST",
      url: '<?php echo base_url('service/active/cls'); ?>',
      data: $("#formSave").serialize(), // serializes the form's elements.
      success: function(data)
      {
        alert(data.message);
        if(data.status=='success') {
          $(this).hide();
          itemSelected = [];
          $(".contentList").html("");
          $(".header").hide();
          $("#itemSelectedNull").show();
          
          $("#numItems").html(itemSelected.length);
        }else {
          
        }
      }
    });
  }else {
    $(this).hide();
    itemSelected = [];
    $(".contentList").html("");
    $(".header").hide();
    $("#itemSelectedNull").show();
          
    $("#numItems").html(itemSelected.length);

    $(".btn-listNum").removeClass('active');
  }

  $("#numItems").html(itemSelected.length);
  setSumPlay();
  //location.reload();
  $(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();

});

function gen19door(num) {
  var arr = [];
  for(i=0;i<=9;i++) { //left
    arr.push(num+''+i);
    //console.log(num+''+i+' 1x90 = 90');
  }
  for(i=0;i<=9;i++) { //right
    var chk = 0;
    for(j=0;j<arr.length;j++) {
      if(arr[j]==(i+''+num)) {
        chk = 1;
        break;
      }
    }
    if(chk==0) {
      arr.push(i+''+num);
    }
    //console.log(i+''+num+' 1x90 = 90');
  }
  //console.log(arr);
  
  return arr;
}


function root_front(num) {
  var arr = [];
  for(i=0;i<=9;i++) { //left
    arr[i] = num+''+i;
    //console.log(num+''+i+' 1x90 = 90');
  }
  return arr;
}

function root_back(num) {
  var arr = [];
  for(i=0;i<=9;i++) { //left
    arr[i] = i+''+num;
    //console.log(i+''+num+' 1x90 = 90');
  }
  return arr;
}


function genList2(numlabel,numtext,numberArr) {
  //return false;
  //  if()

  if($("#creditTotal").html()=='-' || $("#creditTotal").html()=='0') {
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('ระบบกำลังดึงข้อมูล เครดิตคงเหลือ กรุณาลองใหม่อีกครั้ง!');
    return;
  }else if(parseInt($("#headTop").html()-sumPlay)-numberArr.length<0){
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('เครดิตไม่พอ กรุณาเติมเงิน!');
    return;
  }

  if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
  
  var jMax = numberArr.length;
  var price_arr = numlabel.split("_");
  var price = price_arr[price_arr.length-1];
  var unit = 1;

  for(k=0;k<jMax;k++){
      number = numberArr[k];

      price = getReward(unit,numtext);
      
      var deprive = false;
      var tempArr = numberFooCheck(number);
      if(tempArr.status) {
        deprive = true;
        price = tempArr.price;
      }

      itemSelected.push({
        "id":itemSelected.length,
        "numlabel" : numlabel,
        "numtext" : numtext,
        'displayVal': number,
        'unit': unit,
        'price': (unit*price),
        'deprive':deprive,
      });
      //console.log(itemSelected);
      $('<div data-number="'+number+'" class="deprive'+deprive+' ll'+(itemSelected.length-1)+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:11px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+(itemSelected.length-1)+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
    }

    setSumPlay();
    $("#numItems").html(itemSelected.length);
}

function doble() {
  var arr = [];
  for(i=0;i<=9;i++) { //left
    arr[i] = i+''+i;
    //console.log(i+''+i+' 1x90 = 90');
  }
  //2_under_90
  if($("#btn_pressactive_2_up_90").hasClass("active")){//2 ตัวบน
    genList2("2_up_90","2 ตัวบน",arr);
  }
  if($("#btn_pressactive_2_under_90").hasClass("active")) {
    genList2("2_under_90","2 ตัวล่าง",arr);
  }
}

function num2under() {
  var arr = [];
  for(i=0;i<50;i++) { //left
    var txtDisplay = "";
    if(i<10) {
      txtDisplay = "0";
    }
    //console.log(txtDisplay+''+i+' 1x90 = 90');
    arr[i] = txtDisplay+''+i;
  }
  if($("#btn_pressactive_2_up_90").hasClass("active")){//2 ตัวบน
    genList2("2_up_90","2 ตัวบน",arr);
  }
  if($("#btn_pressactive_2_under_90").hasClass("active")) {
    genList2("2_under_90","2 ตัวล่าง",arr);
  }
}

function num2upper() {
  var arr = [];
  for(i=50;i<100;i++) { //left
    //console.log(i+' 1x90 = 90');
    arr[i-50] = i;
  }

  if($("#btn_pressactive_2_up_90").hasClass("active")){//2 ตัวบน
    genList2("2_up_90","2 ตัวบน",arr);
  }
  if($("#btn_pressactive_2_under_90").hasClass("active")) {
    genList2("2_under_90","2 ตัวล่าง",arr);
  }
}

function num2even() {
  var arr = [];
  for(i=0;i<100;i++) { //left
    var txtDisplay = "";
    if(i<10) {
      txtDisplay = "0";
    }
    if(i%2==0) {
       arr[i] = txtDisplay+''+i;
      //console.log(txtDisplay+i+' 1x90 = 90');
    }
  }

  var arr_temp = [];
  for(i=0;i<arr.length;i++){
    if(arr[i]!=undefined) {
      arr_temp.push(arr[i]);
    }
  }
  arr = arr_temp;

  if($("#btn_pressactive_2_up_90").hasClass("active")){//2 ตัวบน
    genList2("2_up_90","2 ตัวบน",arr);
  }
  if($("#btn_pressactive_2_under_90").hasClass("active")) {
    genList2("2_under_90","2 ตัวล่าง",arr);
  }
}

function num2odd() {
  var arr = [];
  for(i=0;i<100;i++) { //left
    var txtDisplay = "";
    if(i<10) {
      txtDisplay = "0";
    }
    if(i%2!=0) {
      arr[i] = txtDisplay+''+i;
      //console.log(txtDisplay+i+' 1x90 = 90');
    }
  }
  //return arr;

  var arr_temp = [];
  for(i=0;i<arr.length;i++){
    if(arr[i]!=undefined) {
      arr_temp.push(arr[i]);
    }
  }
  arr = arr_temp;

  if($("#btn_pressactive_2_up_90").hasClass("active")){//2 ตัวบน
    genList2("2_up_90","2 ตัวบน",arr);
  }
  if($("#btn_pressactive_2_under_90").hasClass("active")) {
    genList2("2_under_90","2 ตัวล่าง",arr);
  }
}

function switchNumber(num) {  //var num = '049'; //ตัวเลขที่ต้องการหาโต๊ด
var textnum = num.toString(); //แปลงตัวเลขเป็นตัวอักษร
var numlv1=[]; //ประกาศตัวแปลให้เป็น Array
var numlv2=[];
//จัดการ level 1 โดยการสลับตัวเลข 2 หลักซ้ายสุด
numlv1[0]=textnum.substr(0,1)+textnum.substr(1,1);
numlv1[1]=textnum.substr(1,1)+textnum.substr(0,1);
//จัดการ level 2
var endnum = textnum.substr(2,1); //จำเลขตัวสุดท้าย
var num_string = "";
for(var i=0;i <=2-1;i++){ //วนลูปการแทรกตัวเลข ทั้ง 2 ตัวเลขจาก level 1
  num = numlv1[i].substr(0,1)+' '+numlv1[i].substr(1,1);
  numlv2[0] = numlv1[i].substr(0,1); //แยกตัวเลข หลักแรกออกมา จากตัวเลข level 1
  numlv2[1] = numlv1[i].substr(1,1); //แยกตัวเลข หลักที่ 2 ออกมา จากตัวเลข level 1
  //console.log(num_string.trim()+'::'+(endnum+numlv2[0]+numlv2[1]+" "+numlv2[0]+endnum+numlv2[1]+" "+numlv2[0]+numlv2[1]+endnum));
  if(num_string.trim()!=(endnum+numlv2[0]+numlv2[1]+" "+numlv2[0]+endnum+numlv2[1]+" "+numlv2[0]+numlv2[1]+endnum)) {
    num_string = num_string+' '+endnum+numlv2[0]+numlv2[1]+" "+numlv2[0]+endnum+numlv2[1]+" "+numlv2[0]+numlv2[1]+endnum
  }
   //แทรกตัวเลขตัวสุดท้าย หน้า กลาง หลัง
   //console.log(endnum+numlv2[0]+numlv2[1]+" "+numlv2[0]+endnum+numlv2[1]+" "+numlv2[0]+numlv2[1]+endnum); //แสดงผล
}
var arr = num_string.trim().split(" ");
//console.log(arr.sort());
return arr.filter((v, i, a) => a.indexOf(v) === i).sort();
}

$("#bt_press").click(function(){//กดเอง
$(".w1").show();
$(".w2").hide();

numpaddButtonSelected = []; //Chabel ที่เลือกไว้
numpaddUnitSelected = ""; //จำนวนหลักที่เลือกไว้
displayVal = ""; 
fag_number = false//เลขกลับ

});
$("#bt_out").click(function(){ //เลือกจากแผง
$(".w1").hide();
$(".w2").show();

$("#bt_w2_3num").addClass("active");
$(".3num").addClass('active');

numpaddButtonSelected = []; //Chabel ที่เลือกไว้
numpaddUnitSelected = ""; //จำนวนหลักที่เลือกไว้
displayVal = ""; 
fag_number = false//เลขกลับ
});

$(".btn-w3-num").click(function(){ //กดจากแผง  เลือก 3ตัว 2ตัว เลขวิ่ง 
if(!$(this).hasClass('active')) {
  $(".btn-w3-num").removeClass('active'); //Clear ปุ่ม
  $(this).addClass('active');
}else {
  $(this).removeClass('active');
}

$(".3num,.2num,.runnum").hide();
$(".bt_slot_top_help").removeClass('active');
$(".btn_pressactive_w2d").removeClass("active");$(".btn_pressactive_w22").removeClass("active");$(".pad3num_list").html("");$('.runnum_list').hide();$('.pad2num_listW').hide();

if($(this).data('numlabel')=='bt_w2_3num') {
  $(".3num").show();
}else if($(this).data('numlabel')=='bt_w2_2um') {
  $(".2num").show();
}else if($(this).data('numlabel')=='bt_w2_runnum') {
  $(".runnum").show();
}

$(".btn_pressactive_w2,.bt_inverse_2,.bt_inverse_22").removeClass('active');
});

$(".btn_pressactive_w2").click(function(){ //กดจากแผง แล้วกดปุ่มด้านใน
if(!$(this).hasClass('active')) {
  //$(".btn_pressactive_w2").removeClass('active');
  $(this).addClass('active');

  $('.pad3num').show();
  if(!$(".bt_slot_top_help").hasClass('active')) {
    genSlot3Num('000');
  }
  if($(this).data('numlabel')=='3_inverse_150') {
    $(".bt_inverse_2").removeClass('active');
  }
}else {
  $(this).removeClass('active');
  if(!$(".btn_pressactive_w2").hasClass('active')){$('.pad3num').hide();}
}
});

$(".btn_pressactive_w22").click(function(){ //กดจากแผง แล้วกดปุ่มด้านใน สองตัว
if(!$(this).hasClass('active')) {
  $(this).addClass('active');

$('.pad2num').show();$(".pad2num_listW").show();
}else {
  $(this).removeClass('active');
  if(!$(".btn_pressactive_w22").hasClass('active')){$('.pad2num').hide();$(".pad2num_listW").hide();}
}

$.each($(".pad2num_list li a"),function(index,value){
    temp = numberFooCheck($(value).data('numlabel').toString());
    if(temp.status==true) {
      $(value).addClass('pri');
    }
});   
});

$(".btn_pressactive_w2d").click(function(){ //กดจากแผง แล้วกดปุ่มด้านใน เลขวิ่ง
if(!$(this).hasClass('active')) {
  $(this).addClass('active');

  $('.runnum').show();$(".runnum_list").show();
}else {
  $(this).removeClass('active');
  if(!$(".btn_pressactive_w2d").hasClass('active')){$('.runnum_list').hide();}
}
});



$(".bt_inverse_2").click(function(){ //กดจากแผง และเลือกเลขกลับ
if(!$(this).hasClass('active')) {
  $(this).addClass('active');
  $("#3_inverse_150_2").removeClass('active');
}else {
  $(this).removeClass('active');
}
});

$(".bt_inverse_22").click(function(){ //กดจากแผง 2 ตัว และเลือกเลขกลับ
if(!$(this).hasClass('active')) {
  $(this).addClass('active');
}else {
  $(this).removeClass('active');
}
});

$(".bt_slot_top_help").click(function(){
if(!$(this).hasClass('active')) {
  $(".bt_slot_top_help").removeClass('active');
  //$(this).addClass('active');

  //$(".btn-listNum").hide();
  
  genSlot3Num($(this).data('numlabel'));
  
  //alert('.listNum'+$(this).data('numlabel'));
  //$('.listNum'+$(this).data('numlabel')).show();
}else {
  $(this).removeClass('active');
  //$(".btn-listNum").hide();
  $(".pad3num_list").html("");
}
});

$(".bt_slot_top_help2").click(function(){
if(!$(this).hasClass('active')) {
  //$(".bt_slot_top_help2").removeClass('active');
  $(this).addClass('active');
  //$(".btn-listNum").hide();
  //genSlot3Num($(this).data('numlabel'));
  //alert('.listNum'+$(this).data('numlabel'));
  //$('.listNum'+$(this).data('numlabel')).show();
}else {
  $(this).removeClass('active');
  //$(".btn-listNum").hide();
  //$(".pad3num_list").html("");
}
});

function checkListSelected(num) {
for(bb=0;bb<itemSelected.length;bb++) {
  if(itemSelected[bb].displayVal==num)return true;
}
return false;
}

function genSlot3Num(num) {
$('.bt_slot_top_help.l3.l'+num).addClass('active');//set Default
$(".pad3num_list").html("");
  num = parseInt(num);
  iMax = num+100;
  var rs = "";
  for(i=num;i<iMax;i++) {
    var ans = i;
    if(i<10) {
      ans = '00'+i;
    }else if(i<100) {
      ans = '0'+i;
    }
    
    var active = "";
    if(checkListSelected(ans)) {
      active = 'active';
    }
    rs+='<li><a onclick="ListClick(this)" href="javascript:void(0)" data-numlabel="'+ans.toString()+'" data-numtext="3 ตัว" class="btn btn-listNum listNum'+ans.toString()+' '+active+'"><span>'+ans.toString()+'</span></a></li>';
  }
  $(".pad3num_list").html(rs);

  $.each($(".pad3num_list li a"),function(index,value){
    temp = numberFooCheck($(value).data('numlabel'));
    if(temp.status==true) {
      $(value).addClass('pri');
    }
});    
}


function setListSelect2(number,buttonSelected) {
  if(itemSelected.length>0 || buttonSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header

  var fag_number = false;
  if(number.length==3) {
    fag_number = $(".bt_inverse_2.l3").hasClass('active')?true:false;
  }else if(number.length==2) {
    fag_number = $(".bt_inverse_22.l2").hasClass('active')?true:false;
  }

  for(a=0;a<buttonSelected.length;a++) {//Set Item Selected

    var unit = 1;
    if(buttonSelected[a].numlabel.charAt(0)=='d') {
      unit = 10;
    }

    var price_arr = buttonSelected[a].numlabel.split("_");
    var price = price_arr[price_arr.length-1];

    var numlabel =  buttonSelected[a].numlabel;
    var numtext = buttonSelected[a].numtext;

    var jMax = 1;
    var tempNumber = []; 
    
    if(fag_number==true){ //เช็ค fag เลขกลับ
      tempNumber = switchNumber(number);
      jMax = tempNumber.length;
    }
    /*else if(numlabel=='2_up_90' || numlabel=='2_under_90'){ //2 ตัวบน หรือ ล่าง
      if($("#button_helpplay_press_1_19door_90").hasClass('active')){ //ถ้ากด 19 ประตู
        tempNumber = gen19door(displayVal);
        jMax = tempNumber.length;
      }else if($("#button_helpplay_press_1_rootfront_90").hasClass('active')){ //รูดหน้า
        tempNumber = root_front(displayVal);
        jMax = tempNumber.length;
      }else if($("#button_helpplay_press_1_rootback_90").hasClass('active')){ //รูดหลัง
        tempNumber = root_back(displayVal);
        jMax = tempNumber.length;
      }
    }else if(numlabel=='1_19door_90' || numlabel=='1_rootfront_90' || numlabel=='1_rootback_90') {
      continue;
    }
    */
    for(k=0;k<jMax;k++){
      if(tempNumber.length>0){number=tempNumber[k];}


      $(".listNum"+number).addClass('active'); //set list active

      price = getReward(unit,numtext);
      
      var deprive = false;
      var tempArr = numberFooCheck(number);
      if(tempArr.status) {
        deprive = true;
        price = tempArr.price;
      }

      itemSelected.push({
        "id":itemSelected.length,
        "numlabel" : numlabel,
        "numtext" : numtext,
        'displayVal': number,
        'unit': unit,
        'price': (unit*price),
        'deprive':deprive,
      });
      //console.log(itemSelected);
      $('<div data-number="'+number+'" class="deprive'+deprive+' ll'+(itemSelected.length-1)+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+(itemSelected.length-1)+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
    }

  }//
  //number = ""; //display numpad clear
  /*
  $("#display_numpad31").val("");
  $("#display_numpad32").val("");
  $("#display_numpad33").val("");

  if(numpaddUnitSelected==3) {
    $(".display_numpad").show(); //display numpad 3 column
  }else if(numpaddUnitSelected==2) {
    $(".display_numpad:eq(2)").hide(); //display 2 column
  }else {
    $(".display_numpad:eq(1)").hide(); //display 1 column
    $(".display_numpad:eq(2)").hide(); //display 1 column
  }
  */
  $("#numItems").html(itemSelected.length);

  setSumPlay();
}
function num3SlotCheck(num) {
var buttonSelected = [];
$.each($(".btn_pressactive_w2"),function(index,value){
  //console.log($(value).hasClass('active'));
  if($(value).hasClass('active')) {
    buttonSelected.push({'numlabel':$(value).data('numlabel'),'numtext':$(value).data('numtext')});
  }
});
//console.log(buttonSelected);
setListSelect2(num,buttonSelected);
}
function num2SlotCheck(num) {
var buttonSelected = [];
$.each($(".btn_pressactive_w22"),function(index,value){
  //console.log($(value).hasClass('active'));
  if($(value).hasClass('active')) {
    buttonSelected.push({'numlabel':$(value).data('numlabel'),'numtext':$(value).data('numtext')});
  }
});
//console.log(buttonSelected);
setListSelect2(num,buttonSelected);
}
function runnumSlotCheck(num) {
var buttonSelected = [];
$.each($(".btn_pressactive_w2d"),function(index,value){
  //console.log($(value).hasClass('active'));
  if($(value).hasClass('active')) {
    buttonSelected.push({'numlabel':$(value).data('numlabel'),'numtext':$(value).data('numtext')});
  }
});
//console.log(buttonSelected);
setListSelect2(num,buttonSelected);
}
var ListClick = function(node){
var numlabel = $(node).data('numlabel').toString();

if(!$(node).hasClass('active')) {
  $(node).addClass('active');
  if(numlabel.length==3) {
    num3SlotCheck(numlabel);
  }else if(numlabel.length==2) {
    num2SlotCheck(numlabel);
  }else if(numlabel.length==1) {
    runnumSlotCheck(numlabel);
  }
}else {
  $(node).removeClass('active');
  //console.log($(node).data('numlabel'));
  rmListByNum($(node).data('numlabel'));
}
};

/*
$("#3_inverse_150_2").click(function(){ //เลือกจากแผง กด 3 ตัวโต๊ด
if(!$(this).hasClass('active')) {
  $(".bt_inverse_2").removeClass('active');
  $(this).addClass('active');
}else {
  $(this).removeClass('active');
}
});
*/
$(".bt_slot_top_help2.fs2").click(function(){//19 ประตูเลือกจากแผง
var buttonSelected = [];
if($("#btn_pressactive_w22_2_up_90").hasClass('active')) {
  buttonSelected.push({'numlabel':'2_up_90','numtext':'2 ตัวบน'});
  //setListSelect2(22,[{'numlabel':'2_up_90','numtext':'2 ตัวบน'}]);
}
if($("#btn_pressactive_w22_2_under_90").hasClass('active')) {
  buttonSelected.push({'numlabel':'2_under_90','numtext':'2 ตัวล่าง'});
  //alert('..11');
  //setListSelect2(arr[k],[{'numlabel':'2_under_90','numtext':'2 ตัวล่าง'}]);
}

var arr = gen19door($(this).data('numlabel'));

//console.log(arr);
var check = $(this).hasClass('active');

if(check) {
  for(aa=0;aa<arr.length;aa++) {
    number = arr[aa];
    //add items
    if(itemSelected.length>0 || buttonSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    var fag_number = false;
    if(number.length==3) {
      fag_number = $(".bt_inverse_2.l2").hasClass('active')?true:false;
    }else if(number.length==2) {
      fag_number = $(".bt_inverse_22.l2").hasClass('active')?true:false;
    }
    for(a=0;a<buttonSelected.length;a++) {//Set Item Selected

      var unit = 1;
      if(buttonSelected[a].numlabel.charAt(0)=='d') {
        unit = 10;
      }
      var price_arr = buttonSelected[a].numlabel.split("_");
      var price = price_arr[price_arr.length-1];

      var numlabel =  buttonSelected[a].numlabel;
      var numtext = buttonSelected[a].numtext;

      var jMax = 1;
      var tempNumber = []; 
      
      if(fag_number==true){ //เช็ค fag เลขกลับ
        tempNumber = switchNumber(number);
        jMax = tempNumber.length;
      }
      for(k=0;k<jMax;k++){
        if(tempNumber.length>0){number=tempNumber[k];}

        price = getReward(unit,numtext);

      var deprive = false;
      var tempArr = numberFooCheck(number);
      if(tempArr.status) {
        deprive = true;
        price = tempArr.price;
      }

        itemSelected.push({
          "id":itemSelected.length,
          "numlabel" : numlabel,
          "numtext" : numtext,
          'displayVal': number,
          'unit': unit,
          'price': (unit*price),
          'deprive':deprive,
        });
        //console.log(itemSelected);
        $('<div data-number="'+number+'" class="deprive'+deprive+' ll'+(itemSelected.length-1)+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+(itemSelected.length-1)+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
      }

    }
    $("#numItems").html(itemSelected.length);
    //end add items
  }
}else {
  for(aa=0;aa<arr.length;aa++) {
    rmListByNum(arr[aa]);
  }
}

$.each($(".pad2num_list li a"),function(index,value){
      //console.log($(value).hasClass('active'));
    if(check) {
      for(k=0;k<arr.length;k++) {
        if($(value).data('numlabel')==arr[k]) {
            $(value).addClass('active');
        }
      }
      
    }else if(!check) {
      for(k=0;k<arr.length;k++) {
        if($(value).data('numlabel')==arr[k]) {
            $(value).removeClass('active');
        }
      }
    }
});

setSumPlay();

});

$(".bt_slot_top_help2.rs2").click(function(){//รูดหน้า เลือกจากแผง
var buttonSelected = [];
if($("#btn_pressactive_w22_2_up_90").hasClass('active')) {
  buttonSelected.push({'numlabel':'2_up_90','numtext':'2 ตัวบน'});
  //setListSelect2(22,[{'numlabel':'2_up_90','numtext':'2 ตัวบน'}]);
}
if($("#btn_pressactive_w22_2_under_90").hasClass('active')) {
  buttonSelected.push({'numlabel':'2_under_90','numtext':'2 ตัวล่าง'});
  //alert('..11');
  //setListSelect2(arr[k],[{'numlabel':'2_under_90','numtext':'2 ตัวล่าง'}]);
}

var arr = root_front($(this).data('numlabel'));
//console.log(arr);
var check = $(this).hasClass('active');

if(check) {
  for(aa=0;aa<arr.length;aa++) {
    number = arr[aa];
    //add items
    if(itemSelected.length>0 || buttonSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    var fag_number = false;
    if(number.length==3) {
      fag_number = $(".bt_inverse_2.l2").hasClass('active')?true:false;
    }else if(number.length==2) {
      fag_number = $(".bt_inverse_22.l2").hasClass('active')?true:false;
    }
    for(a=0;a<buttonSelected.length;a++) {//Set Item Selected

      var unit = 1;
      if(buttonSelected[a].numlabel.charAt(0)=='d') {
        unit = 10;
      }
      var price_arr = buttonSelected[a].numlabel.split("_");
      var price = price_arr[price_arr.length-1];

      var numlabel =  buttonSelected[a].numlabel;
      var numtext = buttonSelected[a].numtext;

      var jMax = 1;
      var tempNumber = []; 
      
      if(fag_number==true){ //เช็ค fag เลขกลับ
        tempNumber = switchNumber(number);
        jMax = tempNumber.length;
      }
      for(k=0;k<jMax;k++){
        if(tempNumber.length>0){number=tempNumber[k];}

        price = getReward(unit,numtext);

      var deprive = false;
      var tempArr = numberFooCheck(number);
      if(tempArr.status) {
        deprive = true;
        price = tempArr.price;
      }

        itemSelected.push({
          "id":itemSelected.length,
          "numlabel" : numlabel,
          "numtext" : numtext,
          'displayVal': number,
          'unit': unit,
          'price': (unit*price),
          'deprive':deprive,
        });
        //console.log(itemSelected);
        $('<div data-number="'+number+'" class="deprive'+deprive+' ll'+(itemSelected.length-1)+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+(itemSelected.length-1)+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
      }

    }
    $("#numItems").html(itemSelected.length);
    //end add items
  }
}

$.each($(".pad2num_list li a"),function(index,value){
      //console.log($(value).hasClass('active'));
    if(check) {
      for(k=0;k<arr.length;k++) {
        if($(value).data('numlabel')==arr[k]) {
            $(value).addClass('active');
        }
      }
    }else if(!check) {
      for(k=0;k<arr.length;k++) {
        if($(value).data('numlabel')==arr[k]) {
            $(value).removeClass('active');
        }
      }
    }
});

setSumPlay();
});
$(".bt_slot_top_help2.bs2").click(function(){//รูดหลัง เลือกจากแผง
var buttonSelected = [];
if($("#btn_pressactive_w22_2_up_90").hasClass('active')) {
  buttonSelected.push({'numlabel':'2_up_90','numtext':'2 ตัวบน'});
  //setListSelect2(22,[{'numlabel':'2_up_90','numtext':'2 ตัวบน'}]);
}
if($("#btn_pressactive_w22_2_under_90").hasClass('active')) {
  buttonSelected.push({'numlabel':'2_under_90','numtext':'2 ตัวล่าง'});
  //alert('..11');
  //setListSelect2(arr[k],[{'numlabel':'2_under_90','numtext':'2 ตัวล่าง'}]);
}

var arr = root_back($(this).data('numlabel'));
//console.log(arr);
var check = $(this).hasClass('active');

if(check) {
  for(aa=0;aa<arr.length;aa++) {
    number = arr[aa];
    //add items
    if(itemSelected.length>0 || buttonSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    var fag_number = false;
    if(number.length==3) {
      fag_number = $(".bt_inverse_2.l2").hasClass('active')?true:false;
    }else if(number.length==2) {
      fag_number = $(".bt_inverse_22.l2").hasClass('active')?true:false;
    }
    for(a=0;a<buttonSelected.length;a++) {//Set Item Selected

      var unit = 1;
      if(buttonSelected[a].numlabel.charAt(0)=='d') {
        unit = 10;
      }
      var price_arr = buttonSelected[a].numlabel.split("_");
      var price = price_arr[price_arr.length-1];

      var numlabel =  buttonSelected[a].numlabel;
      var numtext = buttonSelected[a].numtext;

      var jMax = 1;
      var tempNumber = []; 
      
      if(fag_number==true){ //เช็ค fag เลขกลับ
        tempNumber = switchNumber(number);
        jMax = tempNumber.length;
      }
      for(k=0;k<jMax;k++){
        if(tempNumber.length>0){number=tempNumber[k];}

        price = getReward(unit,numtext);

      var deprive = false;
      var tempArr = numberFooCheck(number);
      if(tempArr.status) {
        deprive = true;
        price = tempArr.price;
      }

        itemSelected.push({
          "id":itemSelected.length,
          "numlabel" : numlabel,
          "numtext" : numtext,
          'displayVal': number,
          'unit': unit,
          'price': (unit*price),
          'deprive':deprive,
        });
        //console.log(itemSelected);
        $('<div data-number="'+number+'" class="deprive'+deprive+' ll'+(itemSelected.length-1)+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+(itemSelected.length-1)+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
      }

    }
    $("#numItems").html(itemSelected.length);
    //end add items
  }
}


$.each($(".pad2num_list li a"),function(index,value){
      //console.log($(value).hasClass('active'));
    if(check) {
      for(k=0;k<arr.length;k++) {
        if($(value).data('numlabel')==arr[k]) {
            $(value).addClass('active');
        }
      }
    }else if(!check) {
      for(k=0;k<arr.length;k++) {
        if($(value).data('numlabel')==arr[k]) {
            $(value).removeClass('active');
        }
      }
    }
});

setSumPlay();
});

function rmListByNum(num) {
//console.log(num);
for(i=0;i<itemSelected.length;i++) {
  if(itemSelected[i].displayVal.localeCompare(num.toString())==0) {
    itemSelected.splice(i,1);
    $(".list"+num).remove();
    //console.log(i);
    //break;
  }
}
if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
$("#numItems").html(itemSelected.length);
}
function rmList(node,nl,nm,csd) {
//console.log(nl)
if(nl.charAt(0)=='3') {
  if(nm<100) {
    nm = '00'+nm;
  }else if(nm<10) {
    nm = '0'+nm;
  }
}else if(nl.charAt(0)=='2') {
  if(nm<10) {
    nm = '0'+nm;
  }
}

$('.listNum'+nm).removeClass('active');

//console.log(csd);
$(".ll"+csd).remove();
//console.log(itemSelected.splice(csd,1));

//console.log($(node).parent().parent().parent().parent().html());
//console.log(nl+':'+nm);
//$(node).parent().parent().parent().parent().remove()
for(i=0;i<itemSelected.length;i++) {
  if(itemSelected[i].id==csd) {
    itemSelected.splice(i,1);
    //console.log(i);
    //break;
  }
}
setSumPlay();
if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
$("#numItems").html(itemSelected.length);
}

/*
function resetListSelected() {
$()
}
*/
/*
var numberFoo = [//เลขอั้น
              {'numlabel':'2_up',
               'numtext':'2 ตัวบน',
                'num': ['05_60','09_45','13_60','14_60','15_60','17_60','19_60','24_60','25_60','26_60','27_60','28_60','29_60','31_60','38_60','39_60','41_60','42_60','47_60','49_60']
              },
              {'numlabel':'2_under',
               'numtext':'2 ตัวล่าง',
                'num': ['05_60','07_60','09_45','12_60','13_60','14_60','15_60','17_60','19_60','20_60','21_60','22_60','23_60','24_60','25_60','26_60','27_60','28_60','29_60','31_60']
              },
              {'numlabel':'3_up',
               'numtext':'3 ตัวบน',
                'num': ['005_200','011_450','013_450','038_450','050_450','051_450','059_450','079_450','094_450','095_450','097_450','101_450','110_450','113_450','115_450','119_450','131_450','147_450','150_450','151_450']
              },
              {'numlabel':'3_inverse',
               'numtext':'3 ตัวโต๊ด',
                'num': ['013_120','015_120','031_120','034_120','038_120','039_120','043_120','045_120','051_120','054_120','057_120','058_120','059_120','075_120','079_120','083_120','085_120','093_120','095_120','097_120']
              },
            ];
*/

var numberFoo = JSON.parse('<?php echo $numberFoo;?>');
function numberFooCheck(num) {
for(i=0;i<numberFoo.length;i++) {
  var numArr = numberFoo[i].num;
  for(j=0;j<numArr.length;j++) {
    var tempArr = numArr[j].split("_");
    if(num.toString().localeCompare(tempArr[0])==0) {
      return {'status':true,'number':tempArr[0],'price':parseFloat(tempArr[1])};
    }
  }
}
return {'status':false};
}
function renderNumberFoo (){
var html = "<br/>"; 
for(i=0;i<numberFoo.length;i++) {
  html+='<span class="num_top" style="font-size:16px; font-weight:bold">'+numberFoo[i].numtext+'</span><br/>';
  var numArr = numberFoo[i].num;
  for(j=0;j<numArr.length;j++) {
    var tempArr = numArr[j].split("_");
    html+='<button  data-toggle="tooltip" data-placement="top" title="จ่าย '+tempArr[1]+' บาท" data-numlabel="'+tempArr[0]+'" data-numtext="'+tempArr[0]+'" class="btn btn-info0 btn-trans btn-more" style=""><span>'+tempArr[0]+'</span></button>';
  }
  //html+='<button  data-toggle="tooltip" data-placement="top" title="ดูทั้งหมด" data-numlabel="..." data-numtext="..." class="btn btn-info0 btn-trans btn-more" style=""><span>...</span></button><br/><br/>';
  html+='<br/><br/>';
}

$(html).appendTo('#content_numberFoo');
}


function setSumPlay() {//
  sumPlay = 0;
  $.each($("input[type=text].txtList"),function(index,value){
    //console.log(parseInt($(value).val()));
    sumPlay+=parseInt($(value).val());
  }); 

  $("#sumPlay").html(sumPlay.toFixed(0)); 
  if($("#headTop").html()!='-') {
    $("#creditTotal").html((parseInt($("#headTop").html()-sumPlay)).toFixed(0));
  }
  
  if($("#headTop").html()=='-'){
    $("#creditTotal").html("-");
  }
}//

$("#btCheckNumber").click(function() {
//alert('..1');
$.each($(".listSelected"),function(index,value){
  //console.log($(value));
  $.each($(".listSelected"),function(index1,value1){
    //console.log($(value).data('number')+':::'+$(value1).data('number')+':::'+index+':::'+index1);
    if($(value).data('number')==$(value1).data('number') && index!=index1) {
      $(value1).css('background-color','#542727');
    }
  }); 
});   

setSumPlay();
});

$("#btCheckNumberCut").click(function() {
//alert('..1');
var ansArr = [];
$.each($(".listSelected"),function(index,value){
  //console.log($(value));
  var tt = 0;
  $.each($(".listSelected"),function(index1,value1){
    //console.log($(value).data('number')+':::'+$(value1).data('number')+':::'+index+':::'+index1);
    if($(value).data('number')==$(value1).data('number')) {
      if(tt!=0){$(value1).remove();ansArr.push($(value1).data('number'));}
      tt++;
    }
  }); 
}); 

for(i=0;i<itemSelected.length;i++) {
  
  for(j=0;j<ansArr.length;j++) {
    if(itemSelected[i].displayVal==ansArr[j]) {
      var tt = 0;
      for(k=0;k<itemSelected.length;k++) {
        if(itemSelected[k].displayVal==ansArr[j]) {
          if(tt!=0){itemSelected.splice(k, 1);}
          tt++;
        }
      }
      
    }
  }
}
//$('.listNum'+nm).removeClass('active');
setSumPlay();
});

function chgBYbt(unitChg) {
  if($("#creditTotal").html()=='-' || $("#creditTotal").html()=='0') {
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('ระบบกำลังดึงข้อมูล เครดิตคงเหลือ กรุณาลองใหม่อีกครั้ง!');
    return;
  }
  if(parseInt($("#headTop").html()-(itemSelected.length*unitChg))<0){
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('เครดิตไม่พอ กรุณาเติมเงิน!');
    return;
  }
$(".contentList").html("");
for(ii=0;ii<itemSelected.length;ii++) {
    itemSelected[ii].unit = unitChg;
    var arr = itemSelected[ii].numlabel.split("_");
    itemSelected[ii].price = (unitChg*arr[2]);

    var arr = itemSelected[ii].numlabel.split("_");
    var price = arr[2];
    var number = itemSelected[ii].displayVal;
    var deprive = itemSelected[ii].deprive;
    var numtext = itemSelected[ii].numtext;
    var unit = itemSelected[ii].unit;
    var numlabel = itemSelected[ii].numlabel;
    id = itemSelected[ii].id;
    //console.log(deprive);

    price = getReward(unit,numtext);

    if(deprive) {
      var tempArr = numberFooCheck(number);
      //console.log(number);
      price = tempArr.price;
    }
    $('<div data-number="'+number+'"  class="deprive'+deprive+' ll'+id+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+id+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
}

setSumPlay();
}

$("#btchageVal").click(function(){
  //alert('');
  if(!parseInt($("#txtChg").val())>0) {
    $("#txtChg").val("1");
    $("#txtChg").focus();
    return;
  }
  if($("#creditTotal").html()=='-' || $("#creditTotal").html()=='0') {
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('ระบบกำลังดึงข้อมูล เครดิตคงเหลือ กรุณาลองใหม่อีกครั้ง!');
    return;
  }
  if(parseInt($("#headTop").html()-(itemSelected.length*parseInt($("#txtChg").val())))<0){
    if(itemSelected.length>0){$("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show()}else{$(".wbtn_cleardata").hide(); $(".header").hide();$("#itemSelectedNull").show();} //Show label & Header
    alert('เครดิตไม่พอ กรุณาเติมเงิน!');
    return;
  }

  $(".contentList").html("");
  
  for(ii=0;ii<itemSelected.length;ii++) {
    itemSelected[ii].unit = $("#txtChg").val();
    var arr = itemSelected[ii].numlabel.split("_");
    itemSelected[ii].price = ($("#txtChg").val()*arr[2]);

    var arr = itemSelected[ii].numlabel.split("_");
    var price = arr[2];
    var number = itemSelected[ii].displayVal;
    var deprive = itemSelected[ii].deprive;
    var numtext = itemSelected[ii].numtext;
    var unit = itemSelected[ii].unit;
    var numlabel = itemSelected[ii].numlabel;
    id = itemSelected[ii].id;
    //console.log(deprive);

    price = getReward(unit);

    if(deprive) {
      var tempArr = numberFooCheck(number);
      //console.log(number);
      price = tempArr.price;
    }

    $('<div data-number="'+number+'"  class="deprive'+deprive+' ll'+id+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+id+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
  }

  setSumPlay();
  
});
var dataList = [];
$(document).ready(function(){
  //dataList = JSON.parse('<?php echo $dataList;?>');
  //itemSelected = dataList;
  //if(itemSelected.length>0) {
    //fetchByData();
  //}
});

function fetchByData() {
  $("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show();
  $(".contentList").html("");
  
  for(ii=0;ii<itemSelected.length;ii++) {
    var arr = itemSelected[ii].numlabel.split("_");
    itemSelected[ii].price = (itemSelected[ii].unit*arr[2]);

    var arr = itemSelected[ii].numlabel.split("_");
    var price = arr[2];
    var number = itemSelected[ii].displayVal;
    var deprive = itemSelected[ii].deprive;
    var numtext = itemSelected[ii].numtext;
    var unit = itemSelected[ii].unit;
    var numlabel = itemSelected[ii].numlabel;
    id = itemSelected[ii].id;
    //console.log(deprive);
    price = getReward(unit,numtext);
    
    if(deprive) {
      var tempArr = numberFooCheck(number);
      //console.log(number);
      price = tempArr.price;
    }

    $('<div data-number="'+number+'"  class="deprive'+deprive+' ll'+id+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+id+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
  }

  $("#numItems").html(itemSelected.length);
  setSumPlay();
  
}
function save() {
  $("#dataList").val(JSON.stringify(itemSelected));
  //alert(JSON.stringify(itemSelected));
  //console.log(itemSelected);
  //location.reload();
  $.ajax({
    type: "POST",
    url: '<?php echo base_url('service/active/lottosave'); ?>',
    data: $("#formSave").serialize(), // serializes the form's elements.
    success: function(data)
    {
      alert(data.message);
      if(data.status=='success') {
        location.reload();
      }else {

      }
    }
  });
}

function setSelectbyHist(data) {
 //console.log(data);
  if(data.length<=0)return false;
  $("#itemSelectedNull").hide();$(".header").show(); $(".wbtn_cleardata").show();
    jMax = data.length;
    for(k=0;k<jMax;k++){
      number = data[k].number;
      unit = 1;
      numlabel = data[k].numlabel;
      numtext = data[k].numtext;

      price = getReward(unit);

      var deprive = false;
      var tempArr = numberFooCheck(number);
      if(tempArr.status) {
        deprive = true;
        price = tempArr.price;
      }

      itemSelected.push({
        "id":itemSelected.length,
        "numlabel" : numlabel,
        "numtext" : numtext,
        'displayVal': number,
        'unit': unit,
        'price': (unit*price),
        'deprive':deprive
      });
      //console.log(itemSelected);
      $('<div data-number="'+number+'"  class="deprive'+deprive+' ll'+(itemSelected.length-1)+' row listSelected list'+number+'"><div class="col-xs-2"><span class="txt-theme">'+number.substr(0,3)+'</span><br/><span class="label" style="font-size:8px">('+numtext+')</span></div><div class="col-xs-3"><input readonly style="text-align:center" type="text" class="form-control txtList" value="'+unit+'"></div><div class="col-xs-5 text-left"><span style="font-size: 12px">x '+price+'</span><span style="font-size:14px" class="txt-theme listPriceTxt"> ได้: '+(price*unit)+' ฿</span></div><div class="col-xs-2"><span class="txt-theme"><i onclick="rmList(this,\''+numlabel+'\','+number+','+(itemSelected.length-1)+')" style="cursor:pointer; color:#e44444" class="fa fa-trash" aria-hidden="true"></i></span></div></div>').appendTo('.contentList');
    }

  $("#numItems").html(itemSelected.length);
  setSumPlay();

}

</script>