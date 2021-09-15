<script>
    $(document).ready(function(){
        getBalance();
        $('.trn-amount').focus(function() {
           $(this).select();
        });

        $('#trn-arrow').click(function(){

            if($(this).hasClass('fa-arrow-right'))
            {
                $('#trn-arrow').removeClass('fa-arrow-right').addClass('fa-arrow-left');
                $('#btn_trn_to_wallet').click();
            }

            else if($(this).hasClass('fa-arrow-left'))
            {
                $('#trn-arrow').removeClass('fa-arrow-left').addClass('fa-arrow-right');
                $('#btn_trn_to_game').click();
            }
        });

        $('#btn_trn_to_game').click(function(){

            var gpro = $('#game_provider').val();

          $(this).addClass('active');
          $('#btn_trn_to_wallet').removeClass('active');
          $('#trn-arrow').removeClass('fa-arrow-left').addClass('fa-arrow-right');
          $('.trn-form').attr('id','transfer_to_game');
          $('.trn-form').attr('name','transfer_to_game');
          $('.trn-form').attr('action','<?php echo base_url('api/member/transfer/togame'); ?>');
          $('.trn-amount').attr('name','transfer_to_game_amount');
          $.ajax({
            type: 'GET',
            url: '<?php echo base_url('api/member/balance'); ?>',
            dataType: 'json',
            success:function(data){
                if (gpro=='slotxo') {
                    $('#game_amount').val(data.wallet.current_balance);
                    $('input[name=transfer_to_game_amount]').val(data.wallet.current_balance);
                }
                else {
                    $('#game_amount').val(data.wallet.current_balance);
                    $('input[name=transfer_to_game_amount]').val(data.wallet.current_balance);
                }
                 }
        });

        });

        $('#btn_trn_to_wallet').click(function(){
            var gpro = $('#game_provider').val();
          $(this).addClass('active');
          $('#btn_trn_to_game').removeClass('active');
          $('#trn-arrow').removeClass('fa-arrow-right').addClass('fa-arrow-left');
          $('.trn-form').attr('id','transfer_to_wallet');
          $('.trn-form').attr('name','transfer_to_wallet');
          $('.trn-form').attr('action','<?php echo base_url('api/member/transfer/towallet'); ?>');
          $('.trn-amount').attr('name','transfer_to_wallet_amount');
          $.ajax({
            type: 'GET',
            url: '<?php echo base_url('api/member/balance'); ?>',
            dataType: 'json',
            success:function(data){
                if (gpro=='slotxo') {
                    $('#game_amount').val(data.slotxo.current_balance);
                    $('input[name=transfer_to_wallet_amount]').val(data.slotxo.current_balance);
                }
                else {
                    $('#game_amount').val(data.live22.current_balance);
                    $('input[name=transfer_to_wallet_amount]').val(data.live22.current_balance);
                }
                 }
        });

        });


        var transfer_to_game_form = $('#transfer_to_game');
        transfer_to_game_form.submit(function(e) {

            $('.loading').fadeIn();
            $('.btn-login').prop('disabled', true);
            $('.btn-login').html('<i class="fas fa-sync-alt fa-spin"></i>');

            e.preventDefault();

            var game_provider = $('input[name=game_provider]').val();
            if (!game_provider){

                $.confirm({
                    bootstrapClasses: {
                        container: 'container',
                        containerFluid: 'container-fluid',
                        row: 'row',
                    },
                    theme: 'modern',
                    content:
                    '<i class="fas fa-exclamation-triangle text-danger fa-3x mb-2"></i><br><h3 class="font18 text-danger">เกิดข้อผิดพลาด</h3>' + 'กรุณาเลือกเกมส์ที่ต้องการโอนเงินเข้า',
                    buttons: {
                        no:{
                            text: 'ปิด',
                            action: function(){
                            }
                        }
                    }
                });

                $('.loading').fadeOut();
                $('.btn-login').prop('disabled', false);
                $('.btn-login').html('โยกเงิน');
            }
            else
            {
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: "json",
                    data: form.serialize(),
                    success: function(data)
                    {

                        $('.span_balance').html('Loading...');
                        getBalance();

                        $('.loading').fadeOut();
                        $('.btn-login').prop('disabled', false);
                        $('.btn-login').html('โยกเงิน');

                        if(data.status == 'success')
                        {

                            $.confirm({
                                bootstrapClasses: {
                                    container: 'container',
                                    containerFluid: 'container-fluid',
                                    row: 'row',
                                },
                                theme: 'modern',
                                content:
                                '<i class="fas fa-check-circle text-success fa-3x mb-2"></i><br><h3 class="font18 text-success">ทำรายการสำเร็จ</h3>' + data.message,
                                buttons: {
                                    no:{
                                        text: 'ปิด',
                                        action: function(){
                                            $('.trn-amount').val('0');
                                        }
                                    }
                                }
                            });

                        }
                        else
                        {
                            $('.span_balance').html('<img width="24" src="<?php echo base_url('assets/images/loading.svg'); ?>">');

                            $.confirm({
                                bootstrapClasses: {
                                    container: 'container',
                                    containerFluid: 'container-fluid',
                                    row: 'row',
                                },
                                theme: 'modern',
                                content:
                                '<i class="fas fa-exclamation-triangle text-danger fa-3x mb-2"></i><br><h3 class="font18 text-danger">ขออภัยค่ะ เกิดข้อผิดพลาด!</h3>' + data.message,
                                buttons: {
                                    no:{
                                        text: 'ปิด',
                                        action: function(){
                                        }
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });

        var transfer_to_wallet_form = $('#transfer_to_wallet');
        transfer_to_wallet_form.submit(function(e) {

            $('.loading').fadeIn();
            $('.btn-login').prop('disabled', true);
            $('.btn-login').html('<i class="fas fa-sync-alt fa-spin"></i>');

            e.preventDefault();

            var game_provider = $('input[name=game_provider]').val();
            if (!game_provider){

                $.confirm({
                    bootstrapClasses: {
                        container: 'container',
                        containerFluid: 'container-fluid',
                        row: 'row',
                    },
                    theme: 'modern',
                    content:
                    '<i class="fas fa-exclamation-triangle text-danger fa-3x mb-2"></i><br><h3 class="font18 text-danger">ขออภัยค่ะ เกิดข้อผิดพลาด!</h3>' + 'กรุณาเลือกเกมส์ที่ต้องการโอนเงินเข้ากระเป๋า',
                    buttons: {
                        no:{
                            text: 'ปิด',
                            action: function(){
                            }
                        }
                    }
                });

                $('.loading').fadeOut();
                $('.btn-login').prop('disabled', false);
                $('.btn-login').html('โยกเงิน');
            }
            else
            {
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: "json",
                    data: form.serialize(),
                    success: function(data)
                    {
                        $('.loading').fadeOut();
                        $('.btn-login').prop('disabled', false);
                        $('.btn-login').html('โยกเงิน');

                        $('.span_balance').html('<img width="24" src="<?php echo base_url('assets/images/loading.svg'); ?>">');
                        getBalance();

                        if(data.status == 'success')
                        {

                            $.confirm({
                                bootstrapClasses: {
                                    container: 'container',
                                    containerFluid: 'container-fluid',
                                    row: 'row',
                                },
                                theme: 'modern',
                                content:
                                '<i class="fas fa-check-circle text-success fa-3x mb-2"></i><br><h3 class="font18 text-success">ทำรายการสำเร็จ</h3>' + data.message,
                                buttons: {
                                    no:{
                                        text: 'ปิด',
                                        action: function(){
                                            $('.trn-amount').val('0');
                                        }
                                    }
                                }
                            });

                        }
                        else
                        {


                            $.confirm({
                                bootstrapClasses: {
                                    container: 'container',
                                    containerFluid: 'container-fluid',
                                    row: 'row',
                                },
                                theme: 'modern',
                                content:
                                '<i class="fas fa-exclamation-triangle text-danger fa-3x mb-2"></i><br><h3 class="font18 text-danger">ขออภัยค่ะ เกิดข้อผิดพลาด!</h3>' + data.message,
                                buttons: {
                                    no:{
                                        text: 'ปิด',
                                        action: function(){
                                        }
                                    }
                                }
                            });

                        }
                    }
                });
            }
        });
    });

	var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiper2 = new Swiper('.swiper-container2', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    swiper.on('transitionEnd',function(){
        var provider = $('.swiper-slide-active').data('game');
        var game_balance = $('.swiper-slide-active').data('balance');

        // if($('input[name=transfer_to_wallet_amount]').length){
        //     $('input[name=transfer_to_wallet_amount]').val(game_balance);
        //     $('input[name=transfer_to_wallet_amount]').attr({'max':game_balance});
        // }

        // switch(provider)
        // {
        //     case 'slotxo':
        //         getWalletBalance();
        //         getSlotXoBalance();

        //         if($('input[name=transfer_to_wallet_amount]').length){
        //             $('input[name=transfer_to_wallet_amount]').attr({'max':game_balance});
        //             $('input[name=transfer_to_wallet_amount]').val(Math.floor(game_balance));
        //         }

        //         break;
        //     case 'live22':
        //         getWalletBalance();
        //         getLive22Balance();
        //         if($('input[name=transfer_to_wallet_amount]').length){
        //             $('input[name=transfer_to_wallet_amount]').attr({'max':game_balance});
        //             $('input[name=transfer_to_wallet_amount]').val(Math.floor(game_balance));
        //         }
        //         break;
        //     default:
        //         getWalletBalance();
        //         break;
        // }

        $('input[name=game_provider]').val(provider);

    });

    // function getWalletBalance()
    // {
    //     $.get('<?php echo base_url('api/member/balance/getWalletBalance'); ?>',function(data){
    //         $('#wallet_balance').html(data.current_balance).fadeIn();
    //         if($('input[name=transfer_to_game_amount]').length){
    //             $('input[name=transfer_to_game_amount]').attr({'max':data.current_balance});
    //             $('input[name=transfer_to_game_amount]').val(Math.floor(data.current_balance));
    //         }
    //     });
    // }

    // function getLive22Balance()
    // {
    //     $.get('<?php echo base_url('api/member/balance/getLive22Balance'); ?>',function(data){
    //         // console.log(data);
    //         if($('#slotxo_balance').length){
    //             $('#slotxo_balance').html(data.current_balance).fadeIn();
    //             $('.swiper-slotxo').data('balance',data.current_balance);
    //         }
    //     });
    // }

    // function getSlotXoBalance()
    // {
    //     $.get('<?php echo base_url('api/member/balance/getSlotXoBalance'); ?>',function(data){
    //         // console.log(data);
    //         if($('#live22_balance').length){
    //             $('#live22_balance').html(data.current_balance).fadeIn();
    //             $('.swiper-live22').data('balance',data.current_balance);
    //         }
    //     });
    // }

    function getBalance()
    {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('api/member/balance'); ?>',
            dataType: 'json',
            success:function(data){

                var wallet_balance = data.wallet.current_balance + ' ฿';
                var slotxo_balance = data.slotxo.current_balance + ' ฿';
                var live22_balance = data.live22.current_balance + ' ฿';


                $('#wallet_balance').html(wallet_balance).fadeIn();
                $('input[name=wallet_balance]').val(data.wallet.current_balance);
                $('input[name=transfer_to_game_amount]').val(data.wallet.current_balance);
                $('#game_amount').val(data.wallet.current_balance);

                if($('#slotxo_balance').length){
                    $('#slotxo_balance').html(slotxo_balance).fadeIn();
                    $('.swiper-slotxo').attr("data-balance",data.slotxo.current_balance);
                }

                if($('#live22_balance').length){
                    $('#live22_balance').html(live22_balance).fadeIn();
                    $('.swiper-live22').attr("data-balance",data.live22.current_balance);
                }

                // if($('input[name=transfer_to_wallet_amount]').length){
                //     var current_active_balance = $('.swiper-slide-active').data('balance');
                //     $('input[name=transfer_to_wallet_amount]').val(current_active_balance);
                //     $('input[name=transfer_to_wallet_amount]').attr({'max':current_active_balance});
                // }

                // if($('input[name=transfer_to_game_amount]').length){
                //     $('input[name=transfer_to_game_amount]').val(data.wallet.current_balance);
                //     $('input[name=transfer_to_game_amount]').attr({'max':data.wallet.current_balance});
                // }

                $('input[name=game_provider]').val($('.swiper-slide-active').data('game'));
            }
        });
    }
</script>