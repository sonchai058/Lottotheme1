<style type="text/css">
 /*
 .navigator{
    border-radius: none !important;
    background-color:#ddd;
    box-shadow: 0 -3px 6px rgb(0 0 0 / 8%) !important;
 }
 */
 .container-fluid {
     padding: 0 !important;
 }
 .col-xs-6.left *,col-xs-6.right *{
     color:#000 !important;
     font-size: 25px !important;
    font-weight: bold !important;
 }
 .hot-menu1 {
    width: 100%;
    display: table;
    margin: auto;
    padding-bottom: 0px;
 }
 .hot-menu1 a {
     display: block;
     border: 0;
     background-color:#ddd;
     border-radius: 10px;
     padding-top: 10px;
     padding-bottom: 10px;
 }
 .list {
     text-align: center;
     margin-bottom: 10px !important;
 }
 .list:hover {
     opacity: 0.7;
 }
 .list span{
    display : block;
 }
 .list a span {
    color: #757575 !important;
 }
 .list a i {
     color: #f0b90b !important;
     font-size: 16px;
 }
 .activity {
    padding-bottom: 80px;
 }
 .aclist {
     padding: 15px;
     margin: -5px !important;
 }
 .aclist a {
     display: block;
     width: 100%;
     height:100%;
     padding: 15px;
     background-color:#ddd;
     border-radius: 10px;
 }
 .aclist h4{
    font-size: 16px;
    font-weight:bold;
    height: 16px;
    overflow: hidden;
 }
 img {
     border-radius : 10px !important;
 }
 .carousel-control {
    background-image : none !important;
 }
 .btn-warning {
    background-color: #f0b90b !important; 
    border-color: #f0b90b !important; 
 }

 .dropdown-toggle::after {
     display: none !important;
 }
</style>
<div class="row" style="background-color: transparent;
padding-top:5px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;">

<div class="col-xs-12 right text-right" style="padding-right: 5%; ">





</div>
<div class="col-xs-12" style="padding-left: 5%; padding-right: 5%; ">
<a href="lottonew">
                    <button type="button" class="btn btn-warning btn-lg btn-block rounded-pill" style="border: 1px ##f0b90b solid !important; font-weight:bold; background-color:#f0b90b !important; font-size:16px;font-weight:bold;border-radius: 5px !important;">
                        แทงหวย
                    </button>
</a>
<br/>
</div>
<div class="col-xs-12" style="    padding-left: 5% !important;
    padding-right: 5% !important;">
	
    <div class="hot-menu1">
        <div class="col-xs-3 list">
					<?php if ($turn_amount > 0) {?> 
                    	<a href="deposit" class="not-link" target="_self" disabled='disabled'>
                        <?php } else { ?>
						<a href="deposit" target="_self">
					<?php } ?>
                        <i class="fal fa-arrow-to-bottom fa-2x"></i> 
                        <span>ฝากเงิน</span>
                    </a> 
        </div>
        <div class="col-xs-3 list">
               
					<?php if ($turn_amount > 0) {?> 
                    	<a href="withdrawal" class="not-link" target="_self" disabled='disabled'>
                        <?php } else { ?>
						<a href="withdrawal" class="" target="_self">
					<?php } ?>
                        <i class="fal fa-money-bill fa-2x"></i> 
                        <span>ถอนเงิน</span>
                    </a> 
        </div>
        <div class="col-xs-3 list">
                    <a href="transaction" class="" target="_self">
                        <i class="fal fa-history fa-2x"></i> 
                        <span>ประวัติ</span>
                    </a> 
        </div>
        <div class="col-xs-3 list">
                    <?php if ($bonus_status == 0) {?> 
                        <a href="bonus" class="" target="_self">
                        <i class="fal fa-gift fa-2x"></i> 
                        <span>โบนัส</span>
                    </a> 
					<?php } else { ?>
						
					<?php } ?>
        </div>
        <div class="col-xs-3 list">
                    <a href="#" class="" target="_self">
                        <i class="fa fa-user-plus fa-2x"></i> 
                        <span>ชวนเพื่อน</span>
                    </a> 
        </div>
        <div class="col-xs-3 list">
                    <a href="<?php echo site_url('wheel/point');?>" class="" target="_self">
                        <i class="fa fa-calendar fa-2x"></i> 
                        <span>สะสมแต้ม</span>
                    </a> 
        </div>
        <div class="col-xs-3 list">
                    <a href="<?php echo site_url('wheel')?>" class="" target="_self">
                        <i class="fa fa-tire fa-2x"></i> 
                        <span>วงล้อ
                        <span style="position:absolute;top:-4px;right:5px;color:#fff !important;padding:3px;background-color: #f6475d !important;
    border-color: #f6475d !important; border-radius:10px;">New</span></span>
                        
                    </a> 
        </div>
        <div class="col-xs-3 list">
                    <a href="#" class="" target="_self">
                        <i class="fa fa-bars fa-2x"></i> 
                        <span>เพิ่มเติม</span>
                    </a> 
        </div>
        
                    
                    <!-- <a href="affiliate" target="_self">
                            <i class="fas fa-users"></i> 
                            แนะนำเพื่อน
                    </a>  -->
    </div>
</div>
<div class="col-xs-12 activity" style="    padding-left: 5% !important;
    padding-right: 5% !important;">
    <div class="col-xs-6 col-sm-3 aclist">
        <a href="#" class="" target="_self">
            <img class="img-responsive" src="<?php echo base_url('assets/images/a1.jpg');?>">
            <h4>VIP เครดิตหมดกดรับที่นี่</h4>
            <div>ไม่จำกัด | รับแล้ว 12 ท่าน</div>
        </a> 
    </div>
    <div class="col-xs-6 col-sm-3 aclist">
        <a href="#" class="" target="_self">
            <img class="img-responsive" src="<?php echo base_url('assets/images/a2.jpg');?>">
            <h4>เเจกฟรี!! เพชรนำโชคตามเเรงค์</h4>
            <div>ไม่จำกัด | รับแล้ว 37 ท่าน</div>
        </a> 
    </div>
    <div class="col-xs-6 col-sm-3 aclist">
        <a href="#" class="" target="_self">
            <img class="img-responsive" src="<?php echo base_url('assets/images/a3.jpg');?>">
            <h4>อัดคลิปรีวิวเว็บไซต์ลงในช่องยูทูปของตนเอง รับฟรี 1080 บาท</h4>
            <div>ไม่จำกัด | รับแล้ว 1 ท่าน</div>
        </a> 
    </div>
    <div class="col-xs-6 col-sm-3 aclist">
        <a href="#" class="" target="_self">
            <img class="img-responsive" src="<?php echo base_url('assets/images/a4.jpg');?>">
            <h4>อัดคลิปรีวิวเว็บไซต์ลงในช่องยูทูปของตนเอง รับฟรี 550 บาท</h4>
            <div>ไม่จำกัด | รับแล้ว 2 ท่าน</div>
        </a> 
    </div>
    <br/>
    <div class="col-xs-12 text-center">
        <a href="#" class="btn btn-light" style="margin-top:10px;padding: 12px; width:100%; background-color:#ddd;font-size: 16px; font-weight:bold">ดูกิจกรรมทั้งหมด <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </div>
</div>


    </div>

<!--
            <nav class="navigator-screen fixed-bottom">
                <div class="container-fluid">
                    <ul class="navigator">
                        <li class="nav-item">
                            <a href="/" class="nav-link exact-active active" target="_self">
                                <i class="fas fa-wallet"></i> 
                                <span>กระเป๋า</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="activity" class="nav-link" target="_self">
                                <i class="fas fa-star"></i> 
                                <span>กิจกรรม</span>
                            </a>
                        </li> 
                        <li class="nav-item middle-item">
                            <a href="playgame" target="_blank" class="nav-link active">
                                <i class="fas fa-crown fa-3x animated tada delay-5s"></i> 
                                <span>เล่นเกมส์</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="" target="_self" class="nav-link" >
                            <i class="fas fa-users"></i> 
                            <span>แนะนำเพื่อน</span></a> 
                        </li> 
                        
                        <li class="nav-item">
                            <a href="profile" class="nav-link" target="_self">
                                <i class="fas fa-user-circle"></i> 
                                <span>บัญชี</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
-->
<br/><br/>
<style type="text/css">
.footer-logo {
    margin : 5px;
}
</style>
                    <footer style="background-color: #000; width:100%" class="">
                        <div class="container text-center mb-2">
                            <div class="d-flex justify-content-center mx-auto">
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/aksport.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/sbobet.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/ts911.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/sa.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/wm.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/ae.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/ia_esport.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/dg.png" alt="" />
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mx-auto">
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/pg.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/joker.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/sg.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/km.png" alt="" />
                                </div>
                                 <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/yl.png" alt="">
                                </div> 
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/fa-chai.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/xe.png" alt="" />
                                </div>
                                <div class="footer-logo align-self-center text-center">
                                    <img style="width:128px" class="img-responsive" src="https://ak47max.com/assets/images/logo_game/allbet.png" alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-white mb-3 footer-text">
                            LOTTOBETSVIP คาสิโนออนไลน์ที่ดีที่สุด มีระบบที่ปลอดภัย และการเงินที่มั่นคง<br />
                            พร้อมกับรูปแบบการเดิมพันที่หลากหลาย และบริการชั้นเยี่ยมตลอด 24 ชม.
                        </div>
                        <div class="text-center footer-text">
                            Copyright 2021 © LOTTOBETSVIP | All Rights Reserved
                        </div>
                    </footer>