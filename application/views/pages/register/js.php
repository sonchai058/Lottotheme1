<script>
function CIDBDetector(){
    var idb = $("#identification_back").val();

        if (idb.length == 12 && idb[0].match(/[A-Z]/g) != null && idb[1].match(/[A-Z]/g) != null && idb[2].match(/[0-9]/g) && idb[3].match(/[0-9]/g) && idb[4].match(/[0-9]/g) && idb[5].match(/[0-9]/g) && idb[6].match(/[0-9]/g) && idb[7].match(/[0-9]/g) && idb[8].match(/[0-9]/g) && idb[9].match(/[0-9]/g)) {
                $("button[name=register]").removeAttr('disabled').addClass('btn-success');
                return true;
        } else {
            if ($("#identification_back").val().length >= 12) {
            $('#form_alert').attr('class', 'alert alert-danger');
            $('#alert_text').html("เลขหลังบัตรประจำตัวประชาชนไม่ถูกต้อง");
            $("#form_alert").fadeTo(2000, 1000);
            $("#form_alert").slideUp(1000);
            return false;
            }
        }
    }



    function IDCRecheck(IDC) {

        var n = IDC.length;
        if (n == 13) {
            var ids1 =
            (IDC[0]*13)+
            (IDC[1]*12)+
            (IDC[2]*11)+
            (IDC[3]*10)+
            (IDC[4]*9)+
            (IDC[5]*8)+
            (IDC[6]*7)+
            (IDC[7]*6)+
            (IDC[8]*5)+
            (IDC[9]*4)+
            (IDC[10]*3)+
            (IDC[11]*2);

        ids1 = ids1 % 11;
        ids1 = 11 - ids1;

        if (ids1 >= 10) {
            ids1 -= 10;
        }

        if (ids1 == IDC[12]) {
            return true;
        } else {
            $('#form_alert').attr('class', 'alert alert-danger');
            $('#alert_text').html("หมายเลขบัตรประจำตัวประชาชนไม่ถูกต้อง");
            $("#form_alert").fadeTo(2000, 1000);
            $("#form_alert").slideUp(1000);
            $("#identification_front").val('');
            return false;
        }
        }
        else {
            return false;
        }


}


    $(document).on('submit', 'form#form-register', function(e) {
        var submit_button = $("button[type=submit]");
        var password =  $("input[name=password]").val();

        if (password != "") {
            submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...').prop('disabled', true);
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                submit_button.html('สมัครสมาชิก').prop('disabled', true);
                console.log(data);

                if (data.status == 'error') {

                    submit_button.html('สมัครสมาชิก').prop('disabled', false);

                    $('#form_alert').attr('class', 'alert alert-danger');
                    $('#alert_text').html(data.message);
                    $("#form_alert").fadeTo(20000, 1000).slideUp(1000, function() {
                        $("#form_alert").slideUp(1000);
                        window.location.reload();
                    });

                    if(typeof data.inputerror !== 'undefined')
                    {
                        var items = [];
                        for (var i = 0; i < data.inputerror.length; i++){
                            $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid');
                            items.push('<li>'+ data.error_string[i] +'</li>');
                        }

                        $('#alert_text').append(items.join(''));
                    }
                } else {

                    $('#form_alert').attr('class', 'alert alert-success');
                    $('#alert_text').html(data.message);
                    $("#form_alert").fadeTo(2000, 1000).slideUp(1000, function() {
                        $("#form_alert").slideUp(1000);
                        window.location.replace("<?php echo base_url(); ?>");
                    });
                }

            }
        });
        }
        else {
            $('#form_alert').attr('class', 'alert alert-danger');
            $('#alert_text').html("กรุณากรอกรหัสผ่าน !!");
            $("#form_alert").fadeTo(2000, 1000);
            $("#form_alert").slideUp(1000);
            return false;
        }
    });

    $('button.step2').click(function(e) {
       var name =  $("input[name=name]").val();
       var surname =  $("input[name=surname]").val();
       var bank_id =  $("#bank_id").val();
       var bank_account_number =  $("input[name=bank_account_number]").val();
       var identification_front =  $("input[name=identification_front]").val();
       var identification_back =  $("input[name=identification_back]").val();


        if (name != "" && surname != "" && bank_id != "" && bank_account_number != "" && identification_front != "" && identification_back != "") {


            $.ajax({
                        url: "<?php echo base_url('service/action/checkbank'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {bank_account_number:bank_account_number,bank_id:bank_id,idf:identification_front},
                        success: function (data){
                            if(data.status == 'success')
                            {
                            $("#register-step2").attr('style','display:none;');
                            $("#register-step3").removeAttr('style');

                                return true;
                            }
                            else
                            {
                            $('#form_alert').attr('class', 'alert alert-danger');
                            $('#alert_text').html("เลขบัญชี / เลขบัตรประจำตัวประชาชน ซ้ำ !!");
                            $("#form_alert").fadeTo(2000, 1000);
                            $("#form_alert").slideUp(1000);
                            return false;

                            }
                        }
                    });

        }
        else {
            $('#form_alert').attr('class', 'alert alert-danger');
            $('#alert_text').html("กรุณากรอกข้อมูลให้ครบถ้วน !!");
            $("#form_alert").fadeTo(2000, 1000);
            $("#form_alert").slideUp(1000);
            return false;
        }
    });


    $('button.step3').click(function(e) {
        $("#register-step3").attr('style','display:none;');
        $("#register-step4").removeAttr('style');
        $('button.step4').removeAttr('disabled');
    });


    $('button.otp').confirm({
            bootstrapClasses: {
            container: 'container',
            containerFluid: 'container-fluid',
            row: 'row',
            },
            theme: 'modern',
            animation: 'zoom',
            title: 'ยืนยัน OTP!',
            content: '' +
            '<form method="post" action="<?php echo base_url('service/action/confirm-otp'); ?>">' +
            '<div class="form-group">' +
            '<small>กรุณากรอก OTP ที่ได้รับจากข้อความ SMS</small>' +
            '<div class="container">' +
            '<div class="row">' +
            // '<input type="tel" pattern="[0-9]" name="o1" class="otp-input name form-control text-center col-2 inputs otp-first-input" maxlength="1" required />' +
            '<input type="tel" pattern="[0-9]" name="o1" class="otp-input name form-control text-center col-2 inputs otp-first-input" maxlength="1" required />' +
            '<input type="tel" pattern="[0-9]" name="o2" class="otp-input name form-control text-center col-2 inputs" maxlength="1" required />' +
            '<input type="tel" pattern="[0-9]" name="o3" class="otp-input name form-control text-center col-2 inputs" maxlength="1" required />' +
            '<input type="tel" pattern="[0-9]" name="o4" class="otp-input name form-control text-center col-2 inputs" maxlength="1" required />' +
            '<input type="tel" pattern="[0-9]" name="o5" class="otp-input name form-control text-center col-2 inputs" maxlength="1" required />' +
            '<input type="tel" pattern="[0-9]" name="o6" class="otp-input name form-control text-center col-2 inputs" maxlength="1" required />' +
            '<input type="hidden" name="phone_otp"/>' +
            '</div>' +
            '</div>' +
            '<br><p style="color:red;" id="otp_alert"></p>' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'ยืนยัน',
                    btnClass: 'btn-blue',
                    action: function () {

                        var self = this;
                        var o1 = this.$content.find('input[name=o1]').val();
                        var o2 = this.$content.find('input[name=o2]').val();
                        var o3 = this.$content.find('input[name=o3]').val();
                        var o4 = this.$content.find('input[name=o4]').val();
                        var o5 = this.$content.find('input[name=o5]').val();
                        var o6 = this.$content.find('input[name=o6]').val();
                        var phone_number = this.$content.find('input[name=phone_otp]').val();
                        var otp_comp = o1+o2+o3+o4+o5+o6;
                        // var otp_comp = o1;
                        if(!otp_comp || otp_comp.length < 6){
                            $.alert('กรุณากรอกเลข OTP ที่คุณได้รับจาก SMS');
                            return false;
                        }
                        else
                        {
                            $.ajax({
                                url: "<?php echo base_url('service/action/confirm-otp'); ?>",
                                type: "POST",
                                dataType: "json",
                                data: {phone_number:phone_number,otp:otp_comp},
                                success: function (data)
                                {
                                    if(data.status == 'success')
                                    {
                                        // $.alert(data.message);

                                        self.close();
                                        $("button[name=get_otp]").attr('disabled','disabled');
                                        $("button[name=get_otp]").html('ยืนยัน OTP สำเร็จ');
                                        $("button[name=get_otp]").removeAttr('btn-secondary').addClass('btn-success');
                                        $("button[name=register]").html('ถัดไป');
                                        // $("button[name=register]").removeAttr('disabled').addClass('btn-success');
                                        $("#register-step1").attr('style','display:none');
                                        $("#register-step2").removeAttr('style');
                                        $("#phone_number").val(phone_number);
                                        $("input[name=otpcode]").val(otp_comp);
                                    }
                                    else
                                    {
                                        $.alert(data.message);
                                        return false;
                                    }
                                }
                            });
                            return false;
                        }
                    }
                },
                close: {
                    text: 'ยกเลิก',
                    btnClass: 'btn-red',
                    keys: ['esc'],
                    action: function(){
                    }
                },
            },
            onOpenBefore: function () {

                $('.otp-first-input').focus();
                var phone_number = $("input[name=phone_otp]").val();
                var self = this;

                if(!phone_number || phone_number.length < 10 || phone_number.charAt(0) != 0){
                    self.close();
                    $.alert('กรุณากรอกเบอร์โทรให้ถูกต้อง');
                    return false;
                }
                else
                {
                    $.ajax({
                        url: "<?php echo base_url('service/action/get-otp'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {phone_number:phone_number},
                        success: function (data){
                            if(data.status == 'success')
                            {
                                // $.alert(data.message);
                                self.$content.find('input[name=phone_otp]').val(data.data.phone_number);
                                $("#otp_alert").text('Ref : ' + data.data.ref);
                                $('.otp-first-input').focus();
                                // console.log(data);
                                return false;
                            }
                            else
                            {
                                self.close();
                                $.alert(data.message);

                            }
                        }
                    });
                    return false;
                }

            },
            onContentReady: function () {
                $('.otp-first-input').focus();
                $(".inputs").keyup(function () {
                    if (this.value.length == this.maxLength) {
                    $(this).next('.inputs').focus();
                    }
                });

                $(".otp-input").keydown(function(event) {
                    if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || (event.keyCode == 8 || event.keyCode == 46)) {


                    }
                    else {
                        event.preventDefault();
                    }
                    // if ( event.keyCode == 46 || event.keyCode == 8 ) {
                    // }
                    // else {
                    //     if ((event.keyCode >= 48 || event.keyCode <= 57) || (event.keyCode >= 96 || event.keyCode <= 105)) {
                    //         event.preventDefault();
                    //     }
                    // }
                });

                $(".otp-input").on("click", function () {
                   $(this).select();
                });
            },onClose: function () {
                $("#otp_alert").text();
            }
        });
</script>
