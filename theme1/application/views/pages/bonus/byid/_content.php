<style>
    section.gift-box-bonus {
        /*display: flex;
        justify-content: center;
        align-items: center;
        flex: 10;
        flex-direction: column;*/
        margin-top: 50px;
        width: 100%;
    }

    section.gift-box-bonus .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    section.gift-box-bonus img {
        width: 100%;
        max-width: 180px;
    }

</style>

<section class="gift-box-bonus" ><!-- Start login -->
    <div class="container">
        <h1 class="text-white font20 text-center" style="margin-bottom:30px;"><?php echo $promotion_name ?></h1>
        <div style="border: 5px solid #f9e200;
    border-radius: 20px;
    padding: 30px 15px;
    text-align: center;
    background: #c70000;">
            <p>
              <img src="<?php echo $banner_url ?>" class="animated infinite pulse" alt="">
            </p>
            <h3 class="text-white font14">เงื่อนไขการถอนเงิน</h3>
            <p>
                <ul class="text-white font14 text-left">
                    <?php
                    if ($deposit_count > 1 && $promotion_id == '1') {


                    }
                    else {
                        $previous_balance  = $last_topup_data->previous_balance;
                        $last_topup_amount = $last_topup_data->amount;
                        $bonus_amount      = ($last_topup_amount * 50) / 100;
                        
                        if ($bonus_amount >= 500) {
                            $bonus_amount = 500;
                        }
                        
                        $total_overtern = (($last_topup_amount + $bonus_amount) * 2) + $previous_balance;
                    }

?>

                    <li><?php echo $promotion_description ?></li>
                    <!-- <li>รับทันที โบนัส (<?php echo number_format($bonus_percen, 2); ?>)% จากยอดฝาก</li>
                    <li>ต้องทำยอด (<?php echo number_format($multipy_turn, 2); ?> เท่า) ถึงจะสามารถถอนเงินได้</li> -->
                    <?php
if ($promotion_type != 0) {
    if ($promotion_type == 1) {
        echo '<li>รับได้แค่จำนวน 1 ครั้งเท่านั้น</li>';
    }
    if ($promotion_type == 2) {
        echo '<li>รับได้แค่จำนวน 1 ครั้ง ต่อ 1 วัน</li>';
    }
} else {
    echo '<li>รับโบนัสได้ตลอด</li>';
}
?>
                </ul>
            </p>

            <input type="hidden" id="promotion_id" name="promotion_id" value="<?php echo $promotion_id; ?>" />
            <?php if ($deposit_count > 1 && $promotion_id == '1') {
                echo '<a class="btn btn-primary-lg text-center" style="margin-top:-25px;color:red;">ไม่สามารถ รับโบนัส (รับไปแล้ว)</a>';
            }
            else {
                echo '<button type="button" class="btn btn-primary-lg text-center" id="apply_bonus_id" style="margin-top:-25px;" >รับโบนัส</button>';
            }
            ?>
        </div>

        

    </div>
</section><!-- End login -->