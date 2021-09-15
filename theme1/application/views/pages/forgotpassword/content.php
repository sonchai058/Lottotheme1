<section><!-- Start section -->
<div class="container">
    <div class="white-box box-start" style="padding:30px;">
        <small style="display:block; line-height: 14px; padding-bottom: 15px; color: #333;">* ระบบจะส่งรหัสผ่านไปที่เบอร์มือถือของท่าน</small>

        <div class="alert" role="alert" style="display: none;" id="form_alert">
            <i class="material-icons list-icon" id="alert_icon"></i>
            <span id="alert_text" style="font-weight:bold;"></span>
        </div>

        <form id="form-forgot-password" class="form-horizontal text-center" method="post" action="<?php echo base_url('service/action/forgot');?>">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fal fa-mobile-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="phone_number" placeholder="เบอร์โทรศัพท์" maxlength="10">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-register">รับรหัสผ่าน</button>
        </form>
    </div>
</div>
</section><!-- End section -->