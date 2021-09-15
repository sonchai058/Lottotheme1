<div class="form-sm container">
    <div class="text-center pt-4">
        <h5 class="m-0">ช่องทางเติมเงินอัตโนมัติ</h5>
        <small class="text-muted">ระบบจะเติมเงินอัตโนมัติ เข้ายูสเซอร์ของท่านภายใน 30 วินาที</small>
    </div>
    <!-- <div role="alert" class="alert alert-secondary alert-dismissible fade show">
        <strong>หมายเหตุ!</strong> สามารถโอนเข้าธนาคารไหนก็ได้ โดยใช้บัญชี และเบอร์โทรที่สมัครโอนเข้ามาเท่านั้น
    </div> -->
    <?php if ($request_deposit > 0) {?> 
                            <div style="text-align:center;">
                                <span class="btn btn-danger">ยอดค้างฝาก </span><br/><span><?php echo $request_deposit;?></span> ฿ </span>
                            </div>
                        <?php } ?>
    <?php if ($turn_amount <= 0 && $request_deposit <= 0) {?> 
    <div class="py-3">

        <?php foreach ($bank as $row): ?>

            <div class="bank-item bg-dark p-3 rounded">
                <div>
                    <img src="<?php echo base_url(); ?>assets/images/<?php echo strtolower($row->bank_company); ?>.png" alt="" class="bank-logo"> 
                    <div>
                        <h6><?php echo $row->account_name ?></h6> 
                        <small class="text-muted"> <?php echo $row->bank_company ?> </small>
                    </div>
                </div> 
                <div class="bank-account-number">
                    <span><?php echo $row->account_number ?></span> 
                    <button id="b<?php echo $row->account_number ?>" data-clipboard-text="<?php echo $row->account_number ?>" type="button" class="copy-bank btn btn-outline-primary btn-sm copy-bank">
                        <i class="fal fa-copy"></i>
                        คัดลอก
                    </button>
                </div>
            </div>

        <?php endforeach?>
        <?php foreach ($truewallet as $row): ?>

<div class="bank-item">
    <div>
        <img src="<?php echo base_url(); ?>assets/images/true-wallet.png" alt="" class="bank-logo"> 
        <div>
            <h6><?php echo $row->account_name ?></h6> 
            <small class="text-muted"> <?php echo $row->bank_company ?></small>
            <small class="text-danger">**ทรูวอเลตโอนเข้าทรูวอเลตเท่านั้น</small>
        </div>
    </div> 
    <div class="bank-account-number">
        <span><?php echo $row->account_number ?></span> 
        <button id="b<?php echo $row->account_number ?>" data-clipboard-text="<?php echo $row->account_number ?>" type="button" class="copy-bank btn btn-outline-primary btn-sm rounded-pill copy-bank">
            <i class="fal fa-copy"></i>
            คัดลอก
        </button>
    </div>
</div>

<?php endforeach?>
    </div>
    <?php }
    else {
        echo ' <div style="text-align:center;">              
        <a href="#" class="btn  btn-danger" style="height:auto;align-content: center;color:#fff;">กรุณาทำเงื่อนไขการเทิร์นโอเวอร์ให้ครบก่อน หรือมียอดเครดีตเหลือต่ำกว่า 5 ไม่เช่นนั้นจะฝากเงินแล้วไม่เข้ากระเป๋า  (ติดเทิร์น '.$turn_amount.')</a>
        </div>'; 
    } ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    
    let cb = new ClipboardJS('.copy-bank');
    $('.copy-bank').on('click', function() {
        //get a reference to the JQUERY object of the current button
        let theButton = $(this);
        var copy_id = $(this).attr('id');

        var clipboard = new ClipboardJS( '#' + copy_id );

        clipboard.on('success', function(e) {
            toastr_notify('คัดลอก เลขบัญชี เรียบร้อยแล้ว');
        });
    });
</script>
<script>
    var cards = $(".gallerycard");
    for(var i = 0; i < 10; i++){
        var target = Math.floor(Math.random() * cards.length -1) + 1;
        var target2 = Math.floor(Math.random() * cards.length -1) +1;
        cards.eq(target).before(cards.eq(target2));
    }
</script>
