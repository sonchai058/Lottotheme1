<section><!-- Start section -->
<div class="container">
    <?php if ($current_wallet == 0): ?>
    <div class="white-box box-start d-flex flex-row align-items-center justify-content-start box-active">
        <img src="assets/images/wallet.png" class="img-icon rounded-circle" alt="">
        <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">Wallet (กระเป๋าหลัก)</h3>
        <button class="btn btn-primary-sm justify-content-end">ใช้งานอยู่ขณะนี้</button>
    </div>
    <?php else: ?>
    <div class="white-box box-start d-flex flex-row align-items-center justify-content-start">
        <img src="assets/images/wallet.png" class="img-icon rounded-circle" alt="">
        <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">Wallet (กระเป๋าหลัก)</h3>
        <button class="btn btn-outline-secondary btn-sm justify-content-end" onclick="set_default_wallet(0);">เลือก</button>
    </div>
    <?php endif ?>

    <?php if ($account->slotxo->status == 1): ?>  
        <?php if ($current_wallet == 1): ?>
        <div class="white-box d-flex flex-row align-items-center justify-content-start box-active">
            <img src="assets/images/slotxo.png" class="img-icon rounded-circle" alt="">
            <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">SlotXO</h3>
            <button class="btn btn-primary-sm justify-content-end">ใช้งานอยู่ขณะนี้</button>
        </div>
        <?php else: ?>
        <div class="white-box d-flex flex-row align-items-center justify-content-start">
            <img src="assets/images/slotxo.png" class="img-icon rounded-circle" alt="">
            <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">SlotXO</h3>
            <button class="btn btn-outline-secondary btn-sm justify-content-end" onclick="set_default_wallet(1);">เลือก</button>
        </div>
        <?php endif ?>
    <?php endif ?>


    <?php if ($account->live22->status == 1): ?>
        <?php if ($current_wallet == 2): ?>
        <div class="white-box d-flex flex-row align-items-center justify-content-start box-active">
            <img src="assets/images/live22.png" class="img-icon rounded-circle" alt="">
            <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">Live22</h3>
            <button class="btn btn-primary-sm justify-content-end">ใช้งานอยู่ขณะนี้</button>
        </div>
        <?php else: ?>
        <div class="white-box d-flex flex-row align-items-center justify-content-start">
            <img src="assets/images/live22.png" class="img-icon rounded-circle" alt="">
            <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">Live22</h3>
            <button class="btn btn-outline-secondary btn-sm justify-content-end" onclick="set_default_wallet(2);">เลือก</button>
        </div>
        <?php endif ?>
    <?php endif ?>

    <div class="white-box d-flex flex-row align-items-center justify-content-start">
        <img src="assets/images/pussy888.png" class="img-icon rounded-circle" alt="">
        <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">Pussy888</h3>
        <button class="btn btn-outline-secondary btn-sm justify-content-end disabled">เร็ว ๆ นี้</button>
    </div>
</div>
</section><!-- End section -->