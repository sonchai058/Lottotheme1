<div id="header_menu" class="header">
   <div class="d-flex justify-content-between top-bar">
      <div class="align-self-center">
            <div class="col-xs-12">
                    <ul class="nav nav-header-auth">
                        <li class="nav-item"><a style="padding: 0px !important;border: 0 !important;background: transparent;" href="login" class="nav-link" target="_self"><img width="100px" src="<?php echo base_url(); ?>assets/images/logo1.png"></a></li>
                        <!--<li class="nav-item" style="padding-top: 35px;"><a href="login" class="nav-link" target="_self">เข้าสู่ระบบ</a></li>
                        <li class="nav-item" style="padding-top: 35px;"><a href="register" class="nav-link exact-active active" target="_self">สมัครสมาชิก</a></li>-->
                    </ul>
            </div>
      </div>
      <div class="align-self-center"></div>
      <div class="d-flex justify-content-center">
         <div class="align-self-center text-center mr-2 deposit-withdraw-desktop">
            <!--<a href="login" class="nav-link" target="_self">ฝากเงิน</a>-->
            <?php if ($turn_amount > 0) {?> 
                <a href="deposit" class="nav-link" target="_self" disabled='disabled'>
                        <?php } else { ?>
						<a href="deposit" class="nav-link" target="_self">
					<?php } ?>
                        ฝากเงิน
                </a> 
         </div>
         <div class="align-self-center text-center mr-2 deposit-withdraw-desktop">
             <!--<a href="login" class="nav-link" target="_self">ถอนเงิน</a>-->
             <?php if ($turn_amount > 0) {?> 
                    	<a href="withdrawal" class="nav-link" target="_self" disabled='disabled'>
                        <?php } else { ?>
						<a href="withdrawal" class="nav-link" target="_self">
					<?php } ?>
                        ถอนเงิน
                    </a> 

         </div>
         <div class="align-self-center mx-1">
            <div class="d-flex align-self-center text-center">
               <div class="align-self-top-center mr-2"><a href="javascript:{}" title="รีเฟรชเครดิต"><img src="https://ak47max.com/assets/images/refresh.svg" height="auto" width="20" class="img-fluid"></a></div>
               <div class="align-self-center text-white text-wallet mt-1">
                  <a href="javascript(void)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="d-flex text-white text-decoration-none dropdown-toggle">
                     <div class="align-self-center mr-1">
                        <div class="pb-2 text-white">
                            <a href="transaction" class="text-white w_total_balance" target="_self" style="font-size: 12px !important">
                                <!--฿-->
                                <span id="total_balance" class="fs-xl" style="font-size: 12px !important">
                                    <i class="fal fa-sync fa-spin"></i>
                                </span>
                            </a>
                            <small class="text-center">
                                <a style="font-size: 12px !important" onclick="getBalance()" target="_self" href="javascript:void(0)" class="text-muted">
                                    <i class="fal fa-sync" style="font-size: 9px !important"></i>
                                </a>
                            </small>
                    </div>
                     </div>
                  </a>
                  <div class="dropdown-menu dropdown-wallet">
                     <div class="dropdown-divider"></div>
                     <a data-toggle="modal" data-target="#logoutModal" class="dropdown-item btn text-center">ออกจากระบบ</a>
                  </div>
               </div>
            </div>
            <div class="text-white">
               <div class="text-center">
                   <small style="font-size:12px !important; font-weight:bold;"><i class="fa fa-user" style=" font-size:12px !important"></i> <?php if($username!=''){echo $username;}else{echo 'User';}?></small>                   
                   <?php if ($show_notify > 0) {?> 
                    <div class="p-3">
                        <div class="alert alert-success fs-xs mb-n4" role="alert">
                            <i class="fas fa-exclamation-circle"></i> <strong><?=$text_notify;?></strong></div>
                    </div>
                    <?php } ?>

                    <?php if ($turn_amount > 0) {?> 
                    <div class="p-3">
                        <div class="alert alert-danger fs-xs mb-n4" role="alert">
                            <i class="fas fa-exclamation-circle"></i> <strong>กรุณาทำเงื่อนไข</strong> การเทิร์นโอเวอร์ให้ครบก่อน <strong>ต้องมียอดเครดิตเหลือต่ำกว่า 5 หรือมากกว่า <?=$turn_amount;?></strong> ไม่เช่นนั้นจะไม่สามารถทำธุรกรรมได้
                        </div>
                    </div>

                    <?php } ?>
                    <?php if ($request_deposit > 0) {?> 
                        <div style="text-align:center;">
                            <span class="btn btn-danger">ยอดค้างฝาก </span><br/><span><?=$request_deposit;?></span> ฿ </span>
                        </div>
                        <?php } ?>
                </div>
            </div>
         </div>

         <div class="align-self-center mx-1"><img src="https://ak47max.com/assets/images/line.png" alt="" height="80" class="top-line"></div>
         <div class="btn-group align-self-top-center text-center mx-1">
            <div class="" style="width:auto;float:left;font-size:16px; border-radius:30px; text-align:center;padding:5px;">
                            <i class="far fa-gem primary--text mr-1 text-warning" style="font-size: 12px !important"></i> 
                            <small style="font-size: 12px !important">0</small>
                        </div>
                        <div class="" style="margin-right:10px;width:auto;float:left;font-size:16px; border-radius:30px; text-align:center;padding:5px;">
                            <small style="font-size: 12px !important" class="white rounded-xl px-2 mr-1 text-sm font-weight-bold">ถุงเงิน</small>
                            <small style="font-size: 12px !important" class="white--text"><!--฿--> 0.00</small>
            </div>
         </div>

      </div>
   </div>
</div>

            <div class="row header1" style="margin-top:3px;">
                <div class="col-xs-12">
                 รวมทุกสิ่ง ในสิ่งเดียว&nbsp;<?php echo strtoupper('lottobetsvip');?>	
                    <a href="logout" class="nav-link" style="padding:5px 10px; position:absolute; width:100px !important; font-size: 13px !important; top:-3px; right: 5px;">ออกจากระบบ</a>
                </div>
            </div>
<!--
    <header class="app-header py-3 d-flex flex-row justify-content-between align-items-center" style="padding: 10px 5%; background-color: #ddd;">
        <div class="app-header-icon">
            <a href="profile" class="text-white" target="_self">
                <i class="fal fa-user-circle fa-2x"></i>
            </a>
        </div>
        <div class="app-header-icon">
            <a class="text-white" target="_self">
                <i class="fal fa-bell fa-2x"></i>
            </a>
        </div>
    </header>
    <div class="d-flex flex-row justify-content-between align-items-center" style="margin-top: -20px; padding: 10px 5%; background-color: #ddd;">
        <div class="d-flex flex-column">
            <span class="text-dark fs-xs">USER</span>
            <span><?php echo $username;?></span>
        </div>
        <a href="gift" class="text-dark" target="_self">
            <div class="fs-lg">
                <strong>0</strong> LP
            </div>
        </a>
    </div>
-->
    <!--
    <div class="row" style="background-color: #ddd; padding: 0px 5%">
        <div class="col-xs-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo base_url('assets/images/1.jpg');?>" alt="" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="<?php echo base_url('assets/images/2.jpg');?>" alt="" style="width:100%;">
                    </div>
                    
                    <div class="item">
                        <img src="<?php echo base_url('assets/images/3.jpg');?>" alt="" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="<?php echo base_url('assets/images/4.jpg');?>" alt="" style="width:100%;">
                    </div>
                    
                    <div class="item">
                        <img src="<?php echo base_url('assets/images/5.jpg');?>" alt="" style="width:100%;">
                    </div>
                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br/>
    </div>
-->
    <style type="text/css">
    /*
    .foo_head {
        font-size: 15px;
        font-weight:bold;
        background-color: #ddd; padding: 0px 5%; padding-top:10px; padding-bottom:10px;
    }
    .foo_head * {
        color:#494b4e !important;
    }
    .foo_head .iconhead {
        position: absolute;
    }
    .foo_head ul {
        list-style: none;
    }
    .foo_head ul li a {
        
    }
    */
    </style>
    <!--
    <div class="row foo_head" style="">
            <div class="col-xs-11">
                <i class="iconhead glyphicon glyphicon-volume-up"></i>
                <ul>
                    <li style="display:block"><a href="#">กงล้อมหาสนุก</li>
                    <li style="display:none"><a href="#">HAPPY TIME 20:00-22:00</a></li>
                </ul>
            </div>
            <div class="col-xs-1 text-right"><a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i></a></div>
    </div>
-->
