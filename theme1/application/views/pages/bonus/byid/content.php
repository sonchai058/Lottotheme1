
    <?php if ($member_bonus_status == 1) {
   echo '<div class="sticky-top title-header text-center py-3">
   <div class="container-fluid">
       <div class="position-relative"><div role="alert" class="alert alert-danger alert-dismissible fade show" style="text-align:center;">
   คุณยังไม่เข้าเงื่อนไขที่รับโบนัสได้
    </div></div></div></div>';
    }
    else {
  ?>  
<div class="sticky-top title-header text-center py-3">
	<div class="container-fluid">
		<div class="position-relative">
			<a href="<?php echo base_url(); ?>bonus" class="btn-back-to text-secondary text-decoration-none font-weight-bold" target="_self">
				<i class="fal fa-chevron-left fa-2x"></i>
			</a>
			<h6 class="text-center mb-0 text-muted text-truncate px-5">
                <?php echo $promotion_name ?>
			</h6>
		</div>
	</div>
</div>
<div class="form-sm df-full m-container">
    <div class="text-center py-3">

            <img src="<?php echo $banner_url ?>" width="150" alt="">
            <h3 class="fs-lg py-3"><?php echo $promotion_name ?></h3>
            <div class="p-3">
                <div class="p-3 text-left">

                    <h3 class="fs-sm text-muted">เงื่อนไขโปรโมชั่น</h3>
                    <?php 
                    if($show_date_compare == '1') {
                        echo 'เวลาสิ้นสุด  :  '.$yester_day.'<br/>เวลายอดโอนล่าสุด  :  '.$date_deposit;

                    }
                    ?>
                
                    <hr>

                    <ul class="text-white font14 text-left">
                        <?php
if ($deposit_count > 1 && $promotion_id == '1') {

} else {
    $previous_balance  = $last_topup_data->previous_balance;
    $last_topup_amount = $last_topup_data->amount;
    $bonus_amount      = ($last_topup_amount * 50) / 100;

    if ($bonus_amount >= 500) {
        $bonus_amount = 500;
    }

    $total_overtern = (($last_topup_amount + $bonus_amount) * 2) + $previous_balance;
}

?>
<?php if ($status == '1') {

} else {
    echo 'ประกาศ !! ปิดปรังปรุงระบบโบนัสชั่วคราว ขออภัยในความไม่สะดวก';
}
?>
                                            <li><?php echo $promotion_description ?></li>
                                            <!-- <li>รับทันที โบนัส (<?php echo number_format($bonus_percen, 2); ?>)% จากยอดฝาก</li>
                                            <li>ต้องทำยอด (<?php echo number_format($multipy_turn, 2); ?> เท่า) ถึงจะสามารถถอนเงินได้</li> -->
                                            <?php
if ($promotion_type != 0) {
    if ($promotion_type == 1 && $check_type == 0) {
        echo '<li>รับได้แค่จำนวน 1 ครั้งเท่านั้น</li>';
    }
    if ($promotion_type == 2 && $check_type == 0) {
        echo '<li>รับได้แค่จำนวน 1 ครั้ง ต่อ 1 วัน</li>';
    }
} else {
    echo '<li>รับโบนัสได้ตลอด</li>';
}
?>
                    </ul>

                    <input type="hidden" id="promotion_id" name="promotion_id" value="<?php echo $promotion_id; ?>" />

                    <?php if ($deposit_count > 1 && $promotion_id == '1') {
    echo '<div role="alert" class="alert alert-danger alert-dismissible fade show">
                        ไม่สามารถ รับโบนัส (รับไปแล้ว)
                        </div>';
} else {

    if ($check_date_name == '1' && $check_time == '1' && $status == '1' && $check_bonus_back == '1' && $check_time_bonus == '1') {
        echo '<button type="submit" id="apply_bonus_id" class="btn btn-lg btn-block btn-primary rounded-lg">
        รับโบนัส
    </button>';
    } else {
        echo '<div role="alert" class="alert alert-danger alert-dismissible fade show" style="text-align:center;">
                       คุณยังไม่เข้าเงื่อนไขที่รับโบนัสได้
                        </div>';
    }
}
?>

                </div>
            </div>
    </div>
</div>
<? }?>