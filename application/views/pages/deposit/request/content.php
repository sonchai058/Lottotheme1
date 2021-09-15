<section><!-- Start section -->
<div class="container">
    <div class="white-box box-start" style="box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1411764705882353);padding-bottom: 0px;" id="request_div">
        <?php if ($turn_amount > 0) {
    echo '<h2 class="text-center" style="font-family: "sukhumvit";color:"red"; ">คุณไม่สามารถเติมเงินได้ คุณจะสามารถเติมเงินได้ ก็ต่อเมื่อยอดเงินคุณเหลือเท่ากับหรือน้อยกว่า 5 บาท หรือยอดเงินเกิน turn ' . $turn_amount . '</h2>';
} else {
    echo '<h2 class="text-center" style="font-family: "sukhumvit"; ">กรุณารอสักครู่...</h2>';
}
?>

    </div>


<!--     <div class="white-box animated bounceInDown slow" id="requestDiv" style="margin-top: -20px; padding-top:30px; padding-bottom: 0; border-radius: 0 0 15px 15px;">

        <form action="<?php echo base_url('deposit/requestKbank'); ?>" id="requestKbank_form" method="POST" class="form-horizontal text-center" style="margin-top:30px;">
            <label class="font12 font-weight-bold">ระบุจำนวนเงินที่ต้องการฝาก</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">฿</span>
                </div>
                <input type="number" name="request_amount" class="form-control form-control-lg" value="0" style="font-size:28px !important;">
            </div>

        <p class="text-center" style="margin: -15px; padding-top: 30px;">
            <button type="submit" class="btn btn-primary-lg btn-login" style="width: 50%; border-radius: 0 0 0 15px; float: left;">ต่อไป</button>
            <button type="reset" class="btn btn-lg btn-default" style="border-radius: 0 0 15px 0; width: 50%; float: left;">ยกเลิก</button>
        </p>
        </form>
    </div>
    <div class="white-box animated bounceInDown slow" id="summaryDiv" style="margin-top: -20px; padding-top:30px; padding-bottom: 0; border-radius: 0 0 15px 15px;display: none;">
        <p class="text-center" style="margin:0;"><strong class="text-center text-danger font12">ยอดที่ต้องโอนเข้ามา</strong></p>
        <h1 class="display-5 text-center" style="font-weight: bold; margin:0; padding:0;" id="request_transfer_amount">0.00</h1>
        <h5 style="font-size: 12px;" class="text-center">
        <strong>คุณเหลือเวลาทำรายการอีก</strong>
        <span id="showRemain" style="color:red">0 นาที 00 วินาที</span>
        </h5>
        <p class="text-center" style="margin:0;"><strong class="text-center text-danger font15">กรุณาอย่าปิดหน้านี้จนกว่าจะทำรายการเสร็จ</strong></p>
        <p class="text-center" style="margin: -15px; padding-top: 30px;">
            <button type="button" data-amount="" id="confirmKbank" onclick="confirmKBank();" class="btn btn-primary-lg btn-login" style="width: 50%; border-radius: 0 0 0 15px; float: left;">ยืนยัน</button>
            <button class="btn btn-lg btn-login" onclick="location.reload();" style="border-radius: 0 0 15px 0; width: 50%; float: left;">ยกเลิก</button>
        </p>
    </div>
    <div class="white-box animated bounceInDown slow" id="timeoutDiv" style="margin-top: -20px; padding-top:60px; padding-bottom: 0px; border-radius: 0 0 15px 15px;display: none;">
        <p class="text-center" style="margin:0;"><strong class="text-center text-danger font20">คุณไม่ได้ทำรายการในเวลาที่กำหนด กรุณาทำรายการใหม่</strong></p>
        <p class="text-center" style="margin: -15px; padding-top: 60px;">
            <button class="btn btn-lg btn-danger" onclick="location.reload();" style="border-radius: 0 0 15px 0; width: 100%; float: left;">ทำรายการใหม่</button>
        </p>
    </div> -->
<!--     <div class="white-box animated bounceInDown slow" id="successDiv" style="margin-top: -20px; padding-top:60px; padding-bottom: 60px; border-radius: 0 0 15px 15px;display: none;">
        <p class="text-center" style="margin:0;"><strong class="text-center text-success font20">ระบบได้ทำการเติมเครดิตตามยอดที่ท่านโอนเข้ามาเรียบร้อยแล้ว ขอให้โชคดี</strong></p>
    </div> -->
</div>
</section><!-- End section -->
