<?php $game_account = game_account();?>
<section class="transfer"><!-- Start section -->
<div class="container">
<!-- <p class="white-box text-danger">
    <strong>ประกาศ!! ยกเลิกใช้งานบัญชี ธนบูรณ์ ทั้ง SCB และ BAY หากโอนเข้าเข้ามาทางเราจะไม่รับผิดชอบทุกกรณี</strong>
  </p> -->
<p>
    <ul class="nav nav-pills nav-transaction" id="pills-tab" role="tablist">
        <li class="nav-item col-6 text-center">
            <a class="nav-link active" href="javascript:void(0)" id="btn_trn_to_game">โยกเข้าเกม</a>
        </li>
        <li class="nav-item col-6 text-center">
            <a class="nav-link" href="javascript:void(0)" id="btn_trn_to_wallet">โยกเข้ากระเป๋า</a>
        </li>
    </ul>
</p>
    <div class="white-box" style="padding-bottom: 0;">

        <div class="row text-center" style="position:relative;">
            <div class="arrow d-flex justify-content-center align-items-center" style="position:absolute; z-index:2; width: 100%;">
                <i id="trn-arrow" class="fal fa-arrow-right" style="padding:10px; border-radius:50%; background:#E5A732; color: white; margin-top:50px;"></i>
            </div>
            <div class="col-6" style="border-right: 1px solid rgb(0,0,0,.05)">
                <h3 class="no-margin font14 font-weight-bold">กระเป๋าหลัก</h3>
                <img src="<?php echo base_url(); ?>assets/images/wallet.png" class="img-icon-md rounded-circle" alt="">
                <div class="d-flex flex-column">
                    <small class="text-blue">Wallet</small>
                    <span class="font16 span_balance" style="margin-top:-5px;" id="wallet_balance"><img width="24" src="<?php echo base_url('assets/images/loading.svg'); ?>"></span>
                </div>
            </div>
            <div class="col-6 swiper-container">
                <div class="swiper-wrapper" style="display:flex;">

                    <?php if ($game_account->slotxo->status == 1): ?>
                    <div class="swiper-slide swiper-slotxo" data-game="slotxo" data-balance="">
                        <h3 class="no-margin font14 font-weight-bold">เลือกเกม</h3>
                        <img src="<?php echo base_url(); ?>assets/images/slotxo.png" class="img-icon-md rounded-circle" alt="">
                        <div class="d-flex flex-column">
                            <small class="text-blue">SLOT</small>
                            <span class="font16 span_balance" style="margin-top:-5px;" id="slotxo_balance"><img width="24" src="<?php echo base_url('assets/images/loading.svg'); ?>"></span>
                        </div>
                    </div>
                    <?php endif?>

                    <?php if ($game_account->live22->status == 1): ?>
                    <div class="swiper-slide swiper-live22" data-game="live22" data-balance="">
                        <h3 class="no-margin font14 font-weight-bold">เลือกเกม</h3>
                        <img src="<?php echo base_url(); ?>assets/images/live22.png" class="img-icon-md rounded-circle" alt="">
                        <div class="d-flex flex-column">
                            <small class="text-blue">LIVE22</small>
                            <span class="font16 span_balance" style="margin-top:-5px;" id="live22_balance"><img width="24" src="<?php echo base_url('assets/images/loading.svg'); ?>"></span>
                        </div>
                    </div>
                    <?php endif?>

                </div>
                <div class="swiper-button-next swiper-button-black"></div>
                <div class="swiper-button-prev swiper-button-black"></div>
            </div>
        </div>
        <hr>
        <form action="<?php echo base_url('api/member/transfer/togame'); ?>" method="POST" name="transfer_to_game" id="transfer_to_game" class="form-horizontal text-center trn-form" style="margin-top:30px;">
            <label class="font12 font-weight-bold">จำนวนเงินทั้งหมดที่จะโยก</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">฿</span>
                </div>
                <input type="text" name="transfer_to_game_amount" class="form-control form-control-lg trn-amount" style="font-size:28px !important;" disabled>
                <input type="hidden" id="game_provider" name="game_provider">
                <input type="hidden" name="wallet_balance">
                <input type="hidden" id="game_amount" name="game_amount">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
            </div>
            <p class="text-center" style="margin: -15px; padding-top: 30px;">
                <button type="submit" class="btn btn-primary-lg btn-login" style="width: 50%; border-radius: 0 0 0 15px; float: left;">โยกเงิน</button>
                <button type="reset" class="btn btn-lg btn-default" style="border-radius: 0 0 15px 0; width: 50%; float: left;">ยกเลิก</button>
            </p>
        </form>

    </div>
</div>
</section><!-- End section -->