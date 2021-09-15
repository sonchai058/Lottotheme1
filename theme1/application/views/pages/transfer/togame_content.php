<section class="transfer"><!-- Start section -->
<div class="container">
    <div class="white-box box-start" style="padding-bottom: 0;">
        
        <div class="row text-center" style="position:relative;">
            <div class="arrow d-flex justify-content-center align-items-center" style="position:absolute; z-index:2; width: 100%;">
                <i class="fal fa-arrow-right" style="padding:10px; border-radius:50%; background:#E5A732; color: white; margin-top:50px;"></i>
            </div>
            <div class="col-6" style="border-right: 1px solid rgb(0,0,0,.05)">
                <h3 class="no-margin font14 font-weight-bold">กระเป๋าหลัก</h3>
                <img src="<?php echo base_url();?>assets/images/wallet.png" class="img-icon-md rounded-circle" alt="">
                <div class="d-flex flex-column">
                    <small class="text-blue">Wallet</small>
                    <span class="font16 span_balance" style="margin-top:-5px;" id="wallet_balance">Loading...</span>
                </div>
            </div>
            <div class="col-6 swiper-container">
                <div class="swiper-wrapper" style="display:flex;">

                    <?php if ($game_account->slotxo->status == 1): ?>
                    <div class="swiper-slide swiper-slotxo" data-game="slotxo" data-balance="">
                        <h3 class="no-margin font14 font-weight-bold">เลือกเกม</h3>
                        <img src="<?php echo base_url();?>assets/images/slotxo.png" class="img-icon-md rounded-circle" alt="">
                        <div class="d-flex flex-column">
                            <small class="text-blue">SLOTXO</small>
                            <span class="font16 span_balance" style="margin-top:-5px;" id="slotxo_balance">Loading...</span>
                        </div>
                    </div>
                    <?php endif ?>

                    <?php if ($game_account->live22->status == 1): ?>
                    <div class="swiper-slide swiper-live22" data-game="live22" data-balance="">
                        <h3 class="no-margin font14 font-weight-bold">เลือกเกม</h3>
                        <img src="<?php echo base_url();?>assets/images/live22.png" class="img-icon-md rounded-circle" alt="">
                        <div class="d-flex flex-column">
                            <small class="text-blue">LIVE22</small>
                            <span class="font16 span_balance" style="margin-top:-5px;" id="live22_balance">Loading...</span>
                        </div>
                    </div>
                    <?php endif ?>
                    
                </div>
                <div class="swiper-button-next swiper-button-black"></div>
                <div class="swiper-button-prev swiper-button-black"></div>
            </div>
        </div>
        <hr>
        <form action="<?php echo base_url('api/member/transfer/togame');?>" method="POST" name="transfer_to_game" id="transfer_to_game" class="form-horizontal text-center" style="margin-top:30px;">
            <label class="font12 font-weight-bold">ระบุจำนวนเงินที่ต้องการโยก</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">฿</span>
                </div>
                <input type="number" id="trn-input" name="transfer_to_game_amount" class="form-control form-control-lg" value="0" style="font-size:28px !important;">
                <input type="hidden" name="game_provider">
            </div>
            <p class="text-center" style="margin: -15px; padding-top: 30px;">
                <button type="submit" class="btn btn-primary-lg btn-login" style="width: 50%; border-radius: 0 0 0 15px; float: left;">โยกเงิน</button> 
                <button type="reset" class="btn btn-lg btn-default" style="border-radius: 0 0 15px 0; width: 50%; float: left;">ยกเลิก</button>
            </p>
        </form>
        
    </div>
    <div class="white-box box-start">
        
    </div>
</div>
</section><!-- End section -->