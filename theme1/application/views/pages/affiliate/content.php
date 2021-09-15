<div class="container">
    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="affiliate-tab" data-toggle="pill" href="#affiliate" role="tab" aria-controls="affiliate" aria-selected="true">ชวนเพื่อน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="affiliate-list-tab" data-toggle="pill" href="#affiliate-list" role="tab" aria-controls="affiliate-list" aria-selected="false">ผังงาน</a>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <!-- Affiliate Invert -->
        <div class="tab-pane fade show active" id="affiliate" role="tabpanel" aria-labelledby="affiliate-tab">
            <div class="bg-dark rounded mt-3 p-3">
            <div class="point d-flex flex-row align-items-center justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <i class="fal fa-wallet fa-2x mr-3"></i>
                    <div class="d-flex flex-column">
                        <span class="fs-xs text-muted">เครดิตที่ได้รับ</span>
                        <span class="fs-lg"><?php echo number_format($aff_wallet_balance, 2); ?>
                            <small>THB</small>
                        </span>
                    </div>
                </div> 
                <div class="mr-2">
                <?php if ($aff_wallet_balance < 1 || $aff_status == 0 || $turn_amount > 0): ?>
                 
                    <button type="button" class="btn btn-primary btn-sm" disabled="disabled">
                        โอนเข้ากระเป๋า
                    </button>
                <?php else: ?>
                    <?php if ($sum_aff > $max_aff_amount): ?>
                        <button type="button" class="btn btn-primary btn-sm" disabled="disabled">
                        คุณรับครบกำหนดแล้ว
                    </button>
                    <?php else: ?>
                    <button type="button" class="btn btn-primary btn-sm" id="aff-withdraw-btn">
                        โอนเข้ากระเป๋า
                    </button>
                    <?php endif?>
                <?php endif?>
                </div>
            </div>
            <hr>
            
            <span class="mr-3 text-muted fs-sm">หากกดโอนเข้ากระเป๋าหลัก ต้องทำเทิร์น <?php echo ($turn_aff);?> เท่า</span>
            <small class="fs-xs text-danger">* แนะนำได้สูงสุด <?php echo ($aff_max);?> คน</small>
            
            <?php if ($aff_status == 0): ?>
                 <br>
            <span class="fs-lg text-danger"> ขณะนี้หมดระยะเวลากิจกรรมเครดิตฟรีแล้วนะคะ</span>
            <?php else: ?>
            <?php endif?>
        </div>
        <div class="border-bottom pb-2">
            <h3 class="fs-sm text-muted pt-3">รหัสชวนเพื่อน</h3>
            <div class="d-flex flex-row align-items-center justify-content-between">
                <h3 id="affiliate_code" class="mb-0 fs-lg text-primary"><?php echo $aff_links; ?></h3>
                <!-- <input id="affiliate_code" type="text" class="mb-0 fs-lg text-primary form-control form-control-lg" value="<?php echo $aff_links; ?>"> -->
                <button data-clipboard-target="#affiliate_code" id="copy-affiliate" type="button" class="btn btn-primary fs-sm">
                    <i class="fal fa-copy"></i>
                    คัดลอก
                </button>
            </div>
        </div>
        <div>
            <div class="d-flex flex-row align-items-center justify-content-between pt-3 mb-2">
                <h3 class="fs-sm text-muted m-0">ลิงค์ชวนเพื่อนของคุณ</h3>
                <small class="text-muted">จำนวนการกดลิงค์: <?php echo $click_count ?> ครั้ง</small>
            </div>
            <fieldset class="form-group form-group-custom">
                <div tabindex="-1" role="group" class="bv-no-focus-ring">
                    <div role="group" class="input-group">
                        <div class="input-group-prepend">
                            <i class="fal fa-link"></i>
                        </div> 
                        <input id="aff_link" type="text" class="form-control form-control-lg" value="<?php echo base_url() . "aff/" . $aff_links; ?>">
                    </div> 
                    <button data-clipboard-target="#aff_link" id="copy-aff-link" type="button" class="btn mt-2 btn-primary fs-sm btn-block">
                        <i class="fal fa-copy"></i>
                        คัดลอก
                    </button>
                </div>
            </fieldset>
        </div>
        <div class="container bg-dark mt-3 rounded p-3">
            <h3 class="fs-sm text-muted m-0 mb-2">ช่องทางแนะนำอื่น ๆ</h3>
            <div class="row pt-3">
                <div class="col-4 text-center">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . "aff/" . $aff_links; ?>">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <br>
                    <span>Facebook</span>
                </div>
                <div class="col-4 text-center">
                    <a target="_blank" href="https://social-plugins.line.me/lineit/share?url=<?php echo base_url() . "aff/" . $aff_links; ?>">
                    <i class="fab fa-line fa-2x"></i>
                    </a>
                    <br>
                    <span>Line</span>
                </div>
                <div class="col-4 text-center">
                    <a target="_blank" href="fb-messenger://share/?link=<?php echo base_url() . "aff/" . $aff_links; ?>">
                        <i class="fab fa-facebook-messenger fa-2x"></i>
                    </a>
                    <br>
                    <span>Messenger</span>
                </div>
            </div>
        </div>
        </div>

        <!-- Affiliate Lists -->
        <div class="tab-pane fade" id="affiliate-list" role="tabpanel" aria-labelledby="affiliate-list-tab">
            <div class="p-3 bg-dark rounded mb-3">
                <div class="d-flex flex-row justify-content-between">
                    <strong>แนะนำสมาชิกทั้งหมด</strong>
                    <span><?php echo $total_referee."/".$max_aff_refer; ?> User</span>
                </div> 
                <!-- <div class="d-flex flex-row justify-content-between">
                    <strong>สมาชิกที่รับโบนัสสมัครใหม่</strong>
                    <span><?php echo $total_referee_topup; ?> User</span>
                </div> -->
            </div>
            <div class="px-3 pb-3">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <span class="text-muted fs-sm">USER / สถานะ</span>
                    <span class="text-muted fs-sm">เครดิตที่ได้รับ</span>
                </div>
            </div>
            <div class="px-3">
            <?php if (count($referee_list) > 0): ?>
                <?php foreach ($referee_list as $r): ?>

                <div class="ranking-item">
                    <div class="ranking-item-info">
                        <div>
                            <h5>[
                                <?php
                                if ($r->get_affiliate == 0) {
                                    echo "<span class='text-success'>รอถอนเงินเข้าประเป๋าหลัก</span>";
                                } else if ($r->get_affiliate == 1) {
                                    echo "<span class='text-success'>สำเร็จ : ได้รับเงินแล้ว</span>";
                                } else {
                                    echo "<span class='text-warning'>รอฝาก</span>";
                                }
                                ?>
                            ] USER ID: <?php echo $r->id; ?></h5>
                            <small class="text-muted"><?php echo diffForHuman($r->regis_date); ?> (<?php echo thaiDateTime($r->regis_date); ?>)</small>
                        </div>
                    </div>
                    <div>
                        <span class="fs-lg"><?php echo $bonus_per_aff;?></span>
                        <small class="fs-sm">THB</small>
                    </div>
                </div>

                <?php endforeach?>
            <?php endif?>
            </div>
        </div>
    </div>
</div>
