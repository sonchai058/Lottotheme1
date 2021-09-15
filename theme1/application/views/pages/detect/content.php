<?php require 'vendor/Mobile_Detect.php'; ?>
<?php $detect = new Mobile_Detect; ?>
<div class="chinese-character">
    <img src="<?php echo base_url();?>assets/images/chinese-character-google.png" alt="" style="margin-top:30px;">
</div>
<section class="" style="    display: block;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 80px 0;
    flex: none;
    flex-direction: none;
    background: url(https://slot999.com/new/assets/images/bg-login.png) center top repeat-x;
    background-size: cover;
    margin-top: -80px;">
    <!-- Start login -->
    <div class="container">
        <p class="text-white font20 text-center" style="padding: 15px; font-weight:100;">ขออภัย! Browser ของคุณไม่รองรับการใช้งาน กรุณาเข้าใช้งานผ่าน Google Chrome หรือ Safari เท่านั้นนะคร๊าฟ</p>
        <p class="text-center">

            <?php
                $ref_link = str_replace('https://','',$this->agent->referrer()); 
            ?>

            <?php if ($detect->isAndroidOS()): ?>
                <?php redirect('intent://'.$ref_link.'#Intent;scheme=http;package=com.android.chrome;end'); ?>
                <a class="btn btn-primary-lg text-center" href="intent://slot999.com/new#Intent;scheme=http;package=com.android.chrome;end">เปิด Google Chrome คลิก</a>
            <?php endif ?>

            <?php if ($detect->isiOS()): ?>
                <?php redirect('googlechrome://'.$ref_link); ?>
                <a class="btn btn-primary-lg text-center" href="googlechrome://slot999.com/new">เปิด Google Chrome คลิก</a>
                <a class="btn btn-primary-lg text-center" href="x-web-search://?SLOT999 รวมเกม สล็อต slotxo, live22 ฝาก-ถอนอัตโนมัติ 24 ชม" style="margin-top:10px;">เปิด Safari คลิก</a>
            <?php endif ?>
    	</p>
    </div>
</section><!-- End login -->
