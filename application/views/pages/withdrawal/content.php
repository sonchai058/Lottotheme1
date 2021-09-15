<div class="form-sm container">
	<div class="text-center pt-4 pb-2">
		<h5 class="m-0">ระบบถอนเงินอัตโนมัติ</h5>
		<small class="text-muted">ระบบจะถอนเงินทั้งหมด และโอนเงินเข้าบัญชีของท่าน 
			<strong class="text-primary">ภายใน 5 - 20 นาที</strong>
		</small>
	</div>

	<div class="bank-account my-3 p-4 bg-dark rounded-sm">
		<h3 class="fs-sm text-muted mb-3">ถอนเงินเข้าบัญชี</h3>
		<div class="d-flex flex-row justify-content-between align-items-center">
			<div class="d-flex flex-row align-items-center justify-content-start">
				<!-- <img src="assets/icons/banks/kbank.svg" alt="" class="mr-2 bank-logo" style="background: rgb(19, 143, 45);">  -->
				<div>
				<h6 class="m-0"><?php echo sess_userdata('name');?> <?php echo sess_userdata('surname');?></h6> 
				<small class="text-muted"> <?php echo getBankName(sess_bankdata('bank_id'));?></small>
				</div>
			</div> 
			<div class="bank-account-number fs-lg">
				<?php echo sess_bankdata('bank_account_number');?>
			</div>
		</div>
	</div>

	<div id="withdraw_form"><div class="text-center pt-4"><i class="fal fa-sync fa-spin"></i> กรุณารอสักครู่..</div></div>

</div>