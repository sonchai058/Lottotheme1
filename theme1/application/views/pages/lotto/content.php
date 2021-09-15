
                
<div class="form-sm container">
    <div class="custom-tabs">

        <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  active"  data-toggle="pill" role="tab" aria-controls="pills-withdraw" aria-selected="true">Lotto</a>
            </li>
           
        </ul>
       <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-withdraw-tab">
                <div class="tab-content" >
               
                </div>
                <div role="tabpanel" aria-hidden="false" class="tab-pane active"><div><div class="transfer"><div class="transfer-list">
                
                <form action="<?php echo base_url('service/action/thailotto'); ?>" id="request" method="POST" class="form-horizontal text-center" style="margin-top:30px;">
                <div class="alert" role="alert" style="display: none;" id="form_alert">
                        <i class="material-icons list-icon" id="alert_icon"></i>
                        <span id="alert_text" style="font-weight:bold;"></span>
                    </div>
                <label class="font12 font-weight-bold">กรอกหมายเลขที่ต้องการซื้อ Lotery</label>
            <div class="input-group mb-6">
                <div class="input-group-prepend"> 
                </div>
                <input id="request_lotto_number" type="text" style="text-align:center;font-size:500%" placeholder="-" onkeyup="this.value=this.value.replace(/[^\d]/,'')" maxlength="1" name="request_lotto_number" class="form-control form-control-lg" style="font-size:28px !important;">
            </div>
            <div class="input-group mb-6">
                <div class="input-group-prepend"> 
                </div>
                <select onchange="changeValue(this);" class="form-control form-control-lg"   id="lotto_reward_type" name="lotto_reward_type">
                <option value="0" selected>-- ประเภทแทง --</option>
                <?php foreach ($lotto_reward_type as $row): ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->description ?></option>
                <?php endforeach?>
            </div> 
            <div class="input-group mb-6">
                <div class="input-group-prepend"> 
                </div>
                <input type="text" placeholder="จำนวนบาท"  onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="request_amount" class="form-control form-control-lg" style="font-size:28px !important;">
            </div>
        <p class="text-center" style="padding-top: 30px;">
            <button id="btn-submit" type="submit" class="btn btn-primary btn-lg btn-block btn-submit" style="border-radius: 0 0 15px 0; float: left;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ยืนยัน</button>
            <button type="reset" class="btn btn-danger btn-lg btn-block" style="border-radius: 0 0 15px 0; float: left;">ยกเลิก</button>
        </p>
        </form>
            </div> 
        </div>
    </div>
</div>
<script type="text/javascript">
            function changeValue(dropdown) {
                var option = dropdown.options[dropdown.selectedIndex].value,
                field = document.getElementById('request_lotto_number');

                if (option == '3' || option == '4' || option == '5' || option == '6') {
                    field.value = field.value.substr(0, 3); // before reducing the maxlength, make sure it contains at most two characters; you could also reset the value altogether
                    field.maxLength = 3;
                    field.placeholder = 'xxx';
                } else if (option == '7' || option == '8'){
                    field.value = field.value.substr(0, 2);
                    field.maxLength = 2;
                    field.placeholder = 'xx';
                }
                else if (option == '9' || option == '10'){
                    field.value = field.value.substr(0, 1);
                    field.maxLength = 1;
                    field.placeholder = 'x';
                }
                else {
                    field.maxLength = 0;
                    field.placeholder = 'กรุณาเลือกประเภท';
                }
            }
        </script>
<script>
      
      <?php if ($this->session->flashdata('err_message')) {?>
        $('#form_alert').attr('class', 'alert alert-danger');
        $('#alert_text').html('<?php echo $this->session->flashdata('err_message'); ?>');
        $("#form_alert").fadeTo(5000, 1000).slideUp(1000, function(){
            $("#form_alert").slideUp(1000);
        });
        <?php }?>

        $(document).on('submit','form#request',function(e){
            $('.btn-submit').html('กรุณารอสักครู่ <i class="fa fa-spinner fa-pulse fa-fw"></i>');
            $('.btn-submit').prop('disabled', true);

            e.preventDefault();

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                statusCode: {
                   403: function() {
                        $('.btn-submit').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> ยืนยัน');
                        $('.btn-submit').prop('disabled', false);
                        $('#form_alert').attr('class', 'alert alert-danger');
                        $('#alert_text').html('Token ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');
                        location.reload();
                        $("#form_alert").fadeTo(7000, 1000).slideUp(1000, function(){
                            $("#form_alert").slideUp(1000);
                        });
                   }
                },
                success: function(data){

                    if(data.status == 'error')
                    {
                        $('.btn-submit').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> ยืนยัน');
                        $('.btn-submit').prop('disabled', false);
                        $('#form_alert').attr('class', 'alert alert-danger');
                        $('#alert_text').html(data.message); 
                        $("#form_alert").fadeTo(5000, 1000).slideUp(1000, function(){
                            // $("#form_alert").slideUp(1000);
                        });
                    }
                    else
                    {
                        $('.btn-submit').html('กำลังตรวจสอบข้อมูล <i class="fa fa-spinner fa-pulse fa-fw"></i>');
                        $('#form_alert').attr('class', 'alert alert-success');
                        $('.btn-submit').html('เสร็จสิ้น <i class="fa fa-spinner fa-pulse fa-fw"></i>');
                        $('#alert_text').html('สั่งซื้อเรียบร้อย');
                        $("#form_alert").fadeTo(3000, 1000).slideUp(1000, function(){
                            // $("#form_alert").slideUp(1000);
                            $('.btn-submit').prop('disabled', false);
                            $('.btn-submit').html('<i class="fa fa-shopping-cart" aria-hidden="true"></i> ยืนยัน');
                            field = document.getElementById('request_lotto_number');
                            field.value = '';
                            // window.location.replace("<?php echo base_url('lotto'); ?>");
                        });
                    }
                }
            });
        });
    </script>
<?php echo js_res('js/jquery.min.js'); ?>
<?php echo js_res('js/bootstrap.min.js'); ?>
