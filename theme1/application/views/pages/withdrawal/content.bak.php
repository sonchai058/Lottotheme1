<section><!-- Start section -->
	<div class="container">
		<a href="javascript:void(0)" class="white-box box-start d-flex flex-row align-items-center justify-content-start">
			<img src="assets/images/wallet.png" class="img-icon rounded-circle" alt="">
			<h3 class="no-margin font16 flex-grow-1 text-dark" style="padding-left:8px;">Wallet</h3>
			<span class="font20 text-orange" style="padding-right:15px;" id="wallet_balance">Loading...</span>
			<i class="fal fa-arrow-right fa-2x text-blue"></i>
		</a>
		<a href="<?php echo base_url('transfer');?>" class="white-box d-flex flex-row align-items-center justify-content-start">
			<img src="assets/images/slotxo.png" class="img-icon rounded-circle" alt="">
			<h3 class="no-margin font16 flex-grow-1 text-dark" style="padding-left:8px;">SlotXO</h3>
			<span class="font20 text-orange" style="padding-right:15px;" id="slotxo_balance">Loading...</span>
			<i class="fal fa-arrow-right fa-2x text-blue"></i>
		</a>
		<a href="<?php echo base_url('transfer');?>" class="white-box d-flex flex-row align-items-center justify-content-start">
			<img src="assets/images/live22.png" class="img-icon rounded-circle" alt="">
			<h3 class="no-margin font16 flex-grow-1 text-dark" style="padding-left:8px;">Live22</h3>
			<span class="font20 text-orange" style="padding-right:15px;" id="live22_balance">Loading...</span>
			<i class="fal fa-arrow-right fa-2x text-blue"></i>
		</a>

		<?php if ($allow_withdraw): ?>

		<?php $getWithdrawRemain = getWithdrawRemain(); ?>
		<?php if ($getWithdrawRemain <= 0): ?>

			<div class="d-flex justify-content-center" id="withdrawal_loading" style="margin-top:30px;padding:15px;">
				<h5 class="text-center" style="color:red;">วันนี้คุณถอนครบจำนวนครั้งต่อวันแล้วคะ</small></h5>
			</div>

		<?php else: ?>

			<?php if (($is_bonus_active == 1) && ($total_balance < $min_withdraw_amount)): ?>
			<div class="d-flex justify-content-center" id="withdrawal_loading" style="margin-top:30px;padding:15px;">
				<h5 class="text-center"><strong>ขออภัย!ไม่สามารถทำรายการได้</strong><br>เนื่องจากรับโบนัส คุณต้องทำยอดให้มากกว่าหรือเท่ากับ <span style="color:red;"><?php echo number_format($min_withdraw_amount,2) ?></span> บาท<br> จึงจะสามารถถอนเครติดได้</small></h5>
			</div>
			<?php else: ?>
			<div class="d-flex justify-content-center" id="withdrawal_loading" style="margin-top:30px;padding:15px;">
					<p class="text-center withdrawal_loading_txt">กำลังโหลดข้อมูล กรุณารอสักครู่...</p>
				</div>

				<div class="white-box animated bounceInDown slow" id="withdrawalDiv" style="padding-top:10px; padding-bottom: 0; border-radius: 8px 8px 15px 15px;display:none;">
				<form action="<?php echo base_url('Withdrawal/withdraw');?>" method="POST" id="withdrawal_form" class="form-horizontal text-center" style="margin-top:30px;">
					<label class="font12 font-weight-bold">ระบุจำนวนเงินที่ต้องการถอน</label>
					<label class="font14 font-weight-bold" style="float: right !important;display:hidden;">วันนี้ถอนไปแล้ว <span style="color:red;font-size:16px;"><?php echo getWithdrawCount();?> / <?php echo webSetting('withdraw_limit');?></span> ครั้ง</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">฿</span>
						</div>
						<input type="number" name="withdraw_amount" class="form-control form-control-lg" value="0" min="300" style="font-size:28px !important;">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
					</div>
					<p class="text-center" style="margin: -15px; padding-top: 30px;">
			            <button type="submit" class="btn btn-primary-lg btn-login" style="width: 50%; border-radius: 0 0 0 15px; float: left;">ถอนเงิน</button> 
			            <button type="reset" class="btn btn-lg btn-default" style="border-radius: 0 0 15px 0; width: 50%; float: left;">ยกเลิก</button>
			        </p>
				</form>
			</div>
			<?php endif ?>
		<?php endif ?>

		<?php else: ?>

		<div class="d-flex justify-content-center" id="withdrawal_loading" style="margin-top:30px;padding:15px;">
			<h5 class="text-center withdrawal_loading_txt">รายการขอถอนเงินจำนวน <?php echo number_format(getLastWithdraw(),2);?> บาท ของคุณกำลังดำนเนินการ<br><small>ระบบจะถอนเงินเข้าบัญชีของท่านอัตโนมัติ ภายใน 2-5 นาที</small></h5>
		</div>
		<section class="btn-withdraw-history">
		    <div class="container">
		        <button onclick="location.href='<?php echo base_url('transaction#withdraw');?>';" class="btn form-control btn-primary-lg" style="height:auto;"><i class="fas fa-history"></i> ตรวจสอบประวัติการถอนเงิน</button>
		    </div>
		</section>
		<?php endif ?>
	</div>
</section><!-- End section -->