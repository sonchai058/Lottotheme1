<?php if (empty($this->session->userdata('usess'))): ?>
<!-- <a href="<?php echo base_url('logout'); ?>">
<div style="width: 100%;
    height: 100%;
    position: absolute;
    z-index: 9999;"></div>
</a> -->
<header id="main-header"><!-- Start main-header -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <div class="container">
        <div class="logo" style="flex:3;">
            <img src="<?php echo base_url(); ?>assets/images/logo-slot-main.png" alt="สล็อต ยิงปลา บาคาร่าออนไลน์ Slotxo, Live22">
            <a href="<?php echo base_url(); ?>">
                <span>PGSLOT</span><br>
                <small>สล็อต ยิงปลา บาคาร่าออนไลน์</small>
            </a>
        </div>


        <?php if ($this->uri->segment(1) == 'register'): ?>
        <div class="menu-header">
            <ul>
                <li><a href="<?php echo base_url('login'); ?>"><i class="fal fa-sign-in-alt"></i> <span class="font12">เข้าสู่ระบบ</span></a></li>
            </ul>
        </div>
        <?php endif?>
        <?php if ($this->uri->segment(1) == 'forgot-password'): ?>
        <div class="menu-header">
            <ul>
                <li><a href="<?php echo base_url('login'); ?>"><i class="fal fa-sign-in-alt"></i> <span class="font12">เข้าสู่ระบบ</span></a></li>
            </ul>
        </div>
        <?php endif?>
    </div>
</header><!-- End main-header-->

<?php else: ?>
<!-- <a href="<?php echo base_url('logout'); ?>">
<div style="width: 100%;
    height: 100%;
    position: absolute;
    z-index: 9999;"></div>
</a> -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

<header id="main-header"><!-- Start main-header -->
    <div class="container">
        <?php if ($this->uri->segment(1) == 'main' or empty($this->uri->segment(1))): ?>
        <a class="back" href="<?php echo base_url('profile'); ?>">
            <i class="far fa-user-alt"></i>
        </a>
        <?php else: ?>
        <a class="back" onclick="goBack()">
            <i class="fal fa-chevron-left"></i> กลับ
        </a>
        <?php endif?>

        <div class="logo-wallet text-light text-center" style="opacity:0.55; line-height:3px;"><h6 style="margin-bottom:0;">pgslot</h6><br><small style="font-size:11px;">WALLET</small></div>

        <div class="menu-header">
            <ul>
                <li class="btn-massage">
                    <a href="#"><i class="far fa-bell"></i></a>
                    <!-- <span class="has-massage"></span> -->
                </li>
                <!-- <li><a href="<?php echo base_url('setting'); ?>"><i class="fal fa-cog"></i></a></li> -->
                <li><a href="#" onclick="logout()"><i class="far fa-power-off"></i></a></li>
            </ul>
        </div>
    </div>
</header><!-- End main-header-->
<?php endif?>

<style>
    section.notice {
        font-size: 13px;
        color: white;
        display:flex;
        flex-direction: row;
        padding: 10px 15px;
        background: #2d303d;
        margin-bottom: 15px;
    }
    section.notice i {
        padding-right: 10px;
        color: #fdc759;
    }
</style>

<section class="notice">
    <i class="fas fa-bullhorn"></i>
    <!-- <marquee scrolldelay="150">ประกาศ!! <span class="text-danger">ยกเลิกใช้งานบัญชี ธนบูรณ์</span> ทั้ง SCB และ BAY หากโอนเข้าเข้ามาทางเราจะไม่รับผิดชอบทุกกรณี</marquee> -->
</section>
