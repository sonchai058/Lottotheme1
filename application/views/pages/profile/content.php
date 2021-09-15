<div class="main-container container-fluid">
            <div class="form-lg df-full m-container">
                <div class="py-4 px-3">
                    <div class="user-profile">
                        <div>
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <div>
                                    <h5 class="fs-md m-0 font-weight-bold">
                                        <?php echo sess_userdata('name'); ?> <?php echo sess_userdata('surname'); ?>
                                    </h5>
                                    <p class="m-0">
                                        <span class="text-muted">เบอร์โทร:</span>
                                        <span><?php echo sess_userdata('phone_number'); ?></span>
                                    </p>
                                </div>
                                <a class="nav-link" href="logout" style="width:200px !important">
                                        <i class="fas fa-power-off"></i>
                                        ออกจากระบบ
                                </a>
                            </div>
                            <hr>
                            <div class="fs-lg text-muted">
                                ข้อมูลเข้าเล่นเกมส์
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2 pt-3">
                                <div>
                                    <span class="text-muted">ยูสเซอร์: </span> 
                                    <span id="usergame"><?php echo $game_account->slotxo->username; ?></span>
                                </div>  
                                <button data-clipboard-target="#usergame" type="button" class="copy-usergame btn btn-outline-primary btn-lg">
                                    <i class="fal fa-copy"></i>
                                    คัดลอก
                                </button>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted">รหัสผ่าน: </span> 
                                    <span id="pwdgame"><?php echo $game_account->slotxo->password; ?></span>
                                </div>
                                <button data-clipboard-target="#pwdgame" type="button" class="copy-pwdgame btn btn-outline-primary btn-lg">
                                    <i class="fal fa-copy"></i>
                                    คัดลอก
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-dark bank-account p-3 rounded">
                    <h3 class="fs-lg text-muted mb-3">ข้อมูลบัญชีธนาคาร</h3>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="d-flex flex-row align-items-center justify-content-start">
                            <!-- <img src="assets/icons/banks/kbank.svg" alt="" class="mr-2 bank-logo" style="background: rgb(19, 143, 45);">  -->
                            <div>
                                <h6 class="m-0"><?php echo sess_userdata('name'); ?> <?php echo sess_userdata('surname'); ?></h6>
                                <lgall class="text-muted"> <?php echo getBankName(sess_bankdata('bank_id')); ?></lgall>
                            </div>
                        </div>
                        <div class="bank-account-number fs-lg">
                        <?php echo sess_bankdata('bank_account_number'); ?>
                        </div>
                    </div>
                </div>

                <div class="menu-other p-3">
                    <div class="fs-lg text-muted">
                        ตั้งค่า
                    </div>
                    <div>
                        <ul>
                            <li>
                                <div>
                                    <a class="text-white not-link" href="#" target="_self">
                                        <i class="fal fa-gift mr-2"></i>
                                        <span><?php if($bonus_status == '0') {
                                            echo 'รับโปรโมชั่นอัตโนมัติ';
                                        }
                                        else {
                                            echo 'ปิดรับโปรโมชั่น';
                                        }
                                        ?></span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a target="_self" href="#" class="text-white not-link">
                                        <i class="fal fa-file-alt mr-2"></i>
                                        <span>คู่มือการใช้งาน</span>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a rel="noopener" target="_blank" href="https://line.me/R/ti/p/%40pgslot678" class="text-white">
                                        <i class="fas fa-headset mr-2"></i>
                                        <span>ติดต่อเจ้าหน้าที่</span>
                                    </a>
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-lg">
                                    <i class="fal fa-clock"></i>
										ตลอด 24 ขม.
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if ($username != null ||  $username != "") {?> 
            <nav class="navigator-screen fixed-bottom">
                <div class="container-fluid">
                    <ul class="navigator">
                        <li class="nav-item">
                            <a href="<?php echo site_url();?>" class="nav-link" target="_self">
                                <i class="fas fa-home"></i>
                                <span>หน้าหลัก</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="download" class="nav-link" target="_self">
                                <i class="fas fa-download"></i> 
                                <span>ดาวน์โหลด</span>
                            </a>
                        </li>
                        <li class="nav-item middle-item">
                            <a href="<?=$game_link_start;?>" target="_blank" class="nav-link active">
                                <i style="color: #fff !important; background-color: #ffbe00;" class="fas fa-crown fa-3x animated tada delay-5s"></i>
                                <span style="">เล่นเกมส์</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://line.me/R/ti/p/%40pgslot678" class="nav-link" target="_blank">
                                <i class="fab fa-line"></i> 
                                <span>แจ้งปัญหา</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="profile" class="nav-link exact-active active" target="_self">
                                <i class="fas fa-user-circle"></i>
                                <span>บัญชี</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php } else { ?>
                <nav class="navigator-screen fixed-bottom">
                <div class="container-fluid">
                    <ul class="navigator">
                        <li class="nav-item">
                            <a href="<?php echo site_url();?>" class="nav-link" target="_self">
                                <i class="fas fa-home"></i>
                                <span>หน้าหลัก</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://line.me/R/ti/p/%40pgslot678" class="nav-link" target="_blank">
                                <i class="fab fa-line"></i> 
                                <span>แจ้งปัญหา</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="profile" class="nav-link exact-active active" target="_self">
                                <i class="fas fa-user-circle"></i>
                                <span>บัญชี</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php } ?>
        </div>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(function(){
        new Clipboard('.copy-usergame');
    });
    $(function(){
        new Clipboard('.copy-pwdgame');
    });
    $('.copy-usergame').on('click', function(){
        toastr_notify('คัดลอก User เรียบร้อยแล้ว');
    });
    $('.copy-pwdgame').on('click', function(){
        toastr_notify('คัดลอก รหัสผ่าน เรียบร้อยแล้ว');
    });
</script>