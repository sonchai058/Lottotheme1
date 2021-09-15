<style type="text/css">
    * {
        font-size: 18px;
    }
</style>
<div class="form-lg container">
    <div class="custom-tabs">
        <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
            <!-- <li class="nav-item">
                <a class="nav-link" id="pills-deposit-tab" data-toggle="pill" href="#pills-deposit" role="tab" aria-controls="pills-deposit" aria-selected="true">ฝากเงิน</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link  active" id="pills-withdraw-tab" data-toggle="pill" href="#pills-withdraw" role="tab" aria-controls="pills-withdraw" aria-selected="true">ถอนเงิน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-bonus-tab" data-toggle="pill" href="#pills-bonus" role="tab" aria-controls="pills-bonus" aria-selected="false">โบนัส</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- <div class="tab-pane fade show active" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                
                <?php if (count($depositLogs) < 1): ?>
                    <div class="un-box d-flex flex-row align-items-center justify-content-start">
                        <div class="flex-grow-1" style="padding-right:5px;">
                            <h2 class="no-margin font14 font-weight-bold text-center" style="margin-bottom: -5px;">ไม่พบรายการฝากเงินของคุณในขณะนี้</h2>
                        </div>
                    </div>
                    <?php endif?>

                    <?php $dps_t = 0.0;?>
                    <?php foreach ($depositLogs as $row): ?>
                    <div class="un-box d-flex flex-row align-items-center justify-content-start fadeInUp animated" style="animation-delay:<?php echo $dps_t; ?>s;-moz-animation-delay:<?php echo $dps_t; ?>s;-webkit-animation-delay:<?php echo $dps_t; ?>s;-o-animation-delay:<?php echo $dps_t; ?>s;">
                        <i class="fal fa-arrow-left"></i>
                        <div class="flex-grow-1" style="padding-right:5px;">
                            <h3 class="m-0 fs-md">ฝากเงิน
                                <span class="<?php echo depositStatusClass($row->status) ?>"> [<?php echo depositStatus($row->status) ?>]</span>
                            </h3>
                            <h3 class="m-0 fs-md">ช่องทาง : <?php echo topupChannel($row->channel); ?></h3>
                            <lgall class="m-0 fs-xs text-muted"><?php echo diffForHuman($row->datetime); ?> (<?php echo thaiDateTime($row->datetime); ?>)</lgall>
                            <?php if ($row->memo != ''): ?>
                            <h3 class="m-0 fs-md"><?php echo $row->memo; ?></h3>
                            <?php endif?>
                        </div>
                        <span style="padding-left:5px;" class="font16 text-center text-success">+<?php echo number_format($row->amount, 2); ?> ฿</span>
                    </div>
                    <?php $dps_t += 0.2;?>
                <?php endforeach?>

            </div> -->
            <!-- <div class="tab-pane fade" id="pills-withdraw" role="tabpanel" aria-labelledby="pills-withdraw-tab"> -->
            <div class="tab-pane fade show active" id="pills-withdraw" role="tabpanel" aria-labelledby="pills-withdraw-tab">
                
                <?php if (count($withdrawLogs) < 1): ?>
                    <div class="d-flex flex-column justify-content-center align-items-center mt-5" style="opacity:0.1;">
						<i class="fal fa-comment-alt-times fa-4x"></i>
						<span class="mt-2">ไม่พบรายการถอนเงิน</span>
					</div>
                    <?php endif?>

                    <?php $wtd_t = 0.0;?>
                    <?php foreach ($withdrawLogs as $row): ?>
                    <div class="un-box d-flex flex-row align-items-center justify-content-start fadeInUp animated mb-2 pb-2 border-bottom" style="animation-delay:<?php echo $wtd_t; ?>s;-moz-animation-delay:<?php echo $wtd_t; ?>s;-webkit-animation-delay:<?php echo $wtd_t; ?>s;-o-animation-delay:<?php echo $wtd_t; ?>s;">
						
                        <div class="flex-grow-1" style="padding-right:5px;">
                            <h3 class="fs-md m-0">ถอนเงิน
                                <span class="<?php echo withdrawStatusClass($row->status) ?>"> [<?php echo withdrawStatus($row->status, $row->memo) ?>]</span>
                            </h3>
                            <lgall class="fs-xs text-muted"><?php echo diffForHuman($row->datetime); ?> (<?php echo thaiDateTime($row->datetime); ?>)</lgall>
                        </div>
                        <span style="padding-left:5px;" class="font16 text-center text-danger">-<?php echo number_format($row->amount, 2); ?> ฿</span>
                    </div>
                    <?php $wtd_t += 0.2;?>
                <?php endforeach?>

            </div>
            <div class="tab-pane fade" id="pills-bonus" role="tabpanel" aria-labelledby="pills-bonus-tab">

                <?php if (count($bonusLogs) < 1): ?>
                    <div class="d-flex flex-column justify-content-center align-items-center mt-5" style="opacity:0.1;">
						<i class="fal fa-comment-alt-times fa-4x"></i>
						<span class="mt-2">ไม่พบรายการรับโบนัส</span>
					</div>
                    <?php endif?>

                    <?php $bns_t = 0.0;?>
                    <?php foreach ($bonusLogs as $row): ?>
                    <div class="un-box d-flex flex-row align-items-center justify-content-start fadeInUp animated mb-2 pb-2 border-bottom" style="animation-delay:<?php echo $bns_t; ?>s;-moz-animation-delay:<?php echo $bns_t; ?>s;-webkit-animation-delay:<?php echo $bns_t; ?>s;-o-animation-delay:<?php echo $bns_t; ?>s;">

                        <div class="flex-grow-1" style="padding-right:5px;">
                            <h3 class="no-margin font14 font-weight-bold" style="margin-bottom:2px;">รับโบนัส
                                <span class="<?php echo depositStatusClass($row->status) ?>"> [<?php echo depositStatus($row->status) ?>]</span>
                            </h3>
                            <!-- <h3 class="no-margin text-blue font11" style="margin-bottom:-4px;">ช่องทาง : <?php echo topupChannel($row->channel); ?></h3> -->
                            <lgall class="no-margin text-blue font11"><?php echo diffForHuman($row->update_time); ?> (<?php echo thaiDateTime($row->update_time); ?>)</lgall>
                            <?php if ($row->memo != ''): ?>
                            <h3 class="no-margin text-blue font11"><?php echo $row->memo; ?></h3>
                            <?php endif?>
                        </div>
                        <span style="padding-left:5px;" class="font16 text-center text-success">+<?php echo number_format($row->amount, 2); ?> ฿</span>
                    </div>
                    <?php $bns_t += 0.2;?>
                <?php endforeach?>

            </div>
        </div>
    </div>
</div>

<?php echo js_res('js/jquery.min.js'); ?>
<?php echo js_res('js/bootstrap.min.js'); ?>
