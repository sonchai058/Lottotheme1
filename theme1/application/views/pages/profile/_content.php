<style type="text/css">
.userdetailcopy{
    background: #bdbdbd !important;
    font-weight: bolder;
    border: 0;
    color: #333333;
    text-align: center;
    border-radius: 4px 0 0 4px !important;
    font-family: 'sukhumvit';
}
</style>

<section><!-- Start section -->
    <div class="container">
        <div class="un-box box-start" style="line-height:11px;">
            <table class="table table-borderless table-sm font12">
                <tr>
                    <th class="text-right" width="50%">UID</th>
                    <td><?php echo sess_userdata('id');?></td>
                </tr>
                <tr>
                    <th class="text-right" width="50%">ชื่อ - นามสกุล</th>
                    <td>คุณ<?php echo sess_userdata('name');?> <?php echo sess_userdata('surname');?></td>
                </tr>
                <tr>
                    <th class="text-right" width="50%">เลขบัญชี</th>
                    <td><?php echo sess_bankdata('bank_account_number');?></td>
                </tr>
                <tr>
                    <th class="text-right" width="50%">ธนาคาร</th>
                    <td><?php echo getBankName(sess_bankdata('bank_id'));?></td>
                </tr>
            </table>
            <hr>
            <table class="table table-borderless table-sm font12">
                <tr>
                    <th class="text-right" width="50%">เบอร์โทรศัพท์</th>
                    <td><?php echo sess_userdata('phone_number');?></td>
                </tr>
            </table>
            <hr>
            <table class="table table-borderless table-sm font12">
                <tr>
                    <th class="text-right" width="50%">เข้าสู่ระบบล่าสุดเมื่อ</th>
                    <td><?php echo thaiDate(getLastLogin());?> (<?php echo diffForHuman(getLastLogin());?>)</td>
                </tr>
            </table>
        </div>

        <?php if ($game_account->slotxo->status == 1): ?>
        <div class="black-box d-flex flex-row align-items-center justify-content-start">
            <img src="<?php echo base_url();?>assets/images/slotxo.png" class="img-icon rounded-circle" alt="">
            <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">PGSLOT</h3>
            <button class="btn btn-primary-sm justify-content-end" data-toggle="collapse" href="#collapseSlotxo" role="button" aria-expanded="false" aria-controls="collapseSlotxo">ดูข้อมูล</button>
        </div>
        <div class="collapse" id="collapseSlotxo">
            <div class="white-box" style="background: rgb(153,155,168,.2); border-radius: 0 0 15px 15px; box-shadow:none;">
                <table class="table table-borderless table-sm font12" style="margin-bottom: 0;">
                    <tr>
                        <td>
                            <div class="input-group">
                                <div class="input-group-append" style="width:100px;">
                                    <button class="btn btn-secondary btn-sm" type="button" style="background:#e2e2e4;color:black;border: 0;border-radius: 4px 0 0 4px;width:100px;text-transform: uppercase;">Username</button>
                                </div>
                                <input type="text" id="user-slotxo" class="form-control form-control-sm userdetailcopy" value="<?php echo $game_account->slotxo->username;?>" readonly>
                                <div class="input-group-append">
                                    <button data-clipboard-target="#user-slotxo" class="copy-user-slotxo btn btn-secondary btn-sm" type="button" style="background:#f6e015;border:0;border-radius: 0 4px 4px 0;color:#333;">คัดลอก</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <div class="input-group-append" style="width:100px;">
                                    <button class="btn btn-secondary btn-sm" type="button" style="background:#e2e2e4;color:black;border: 0;border-radius: 4px 0 0 4px;width:100px;text-transform: uppercase;">Password</button>
                                </div>
                                <input type="text" id="password-slotxo" class="form-control form-control-sm userdetailcopy" value="<?php echo $game_account->slotxo->password;?>" readonly>
                                <div class="input-group-append">
                                    <button data-clipboard-target="#password-slotxo" class="copy-password-slotxo btn btn-secondary btn-sm" type="button" style="background:#f6e015;border:0;border-radius: 0 4px 4px 0;color:#333;">คัดลอก</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <?php else: ?>
        <div class="black-box d-flex flex-row align-items-center justify-content-start">
            <img src="<?php echo base_url();?>assets/images/slotxo.png" class="img-icon rounded-circle" alt="">
            <h3 class="no-margin font16 flex-grow-1" style="padding-left:8px;">PGSLOT</h3>
            <button class="btn btn-primary-sm btn-sm justify-content-end" id="btn_apply_slotxo">สมัครสมาชิก</button><span id="slotxo_wait_regis" style="display: none;"><img src="<?php echo base_url();?>assets/images/loading.svg" width="25" alt=""> <small>กรุณารอสักครู่..</small></span>
        </div>
        <?php endif ?> 
    </div>
</section><!-- End section -->