<?php echo js_res('js/countUp.js'); ?>
<script>
    $(document).ready(function(){
        getBalance();

        $('.btn-refresh').click(function(e) {
            $('.btn-refresh').addClass('fa-spin');
            getBalance();
        });

        // var swiper = new Swiper('.swiper-container', {
        //     slidesPerView: 3,
        //     spaceBetween: 8,
        //     pagination: {
        //         el: '.swiper-pagination',
        //         clickable: true,
        //     },
        // });
    });

    function register_api() {

        // alert('TEST register API ');
        var submit_button = $("#register_api");

        submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...');
        submit_button.attr('disabled','disabled');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('api/member/register'); ?>',
            dataType: 'json',
            success:function(data){

                if (data.status == 'true') {
                    // สมัครสำเร็จ
                    $('#form_alert').attr('class', 'alert alert-success');
                    $('#alert_text').html('ดำเนินการสำเร็จ กรุณารอสักครู่');
                    $("#form_alert").fadeTo(1000, 1000).slideUp(1000, function() {
                        $("#form_alert").slideUp(1000);
                        window.location.reload();
                    });

                }
                else {
                    $('#form_alert').attr('class', 'alert alert-danger');
                    $('#alert_text').html('พบปัญหาบางอย่างกรุณาทำรายการใหม่');
                    $("#form_alert").fadeTo(1000, 1000).slideUp(1000, function() {
                        $("#form_alert").slideUp(1000);
                        // window.location.reload();
                        submit_button.html('ร้องขอบัญชีเล่นเกม ใหม่ !');
                        submit_button.removeAttr('disabled')
                    });

                }


            }
        });

    }


    function getBalance()
    {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('api/member/balance'); ?>',
            dataType: 'json',
            success:function(data){

                var options = {
                    useEasing: true,
                    useGrouping: true,
                    separator: ',',
                    decimal: '.',
                };

                var total_balance = new CountUp("total_balance", 0, data.total.current_balance, 2, 2.5, options);
                if(!total_balance.error){
                    total_balance.start();
                    console.log(total_balance)
                }else{
                    console.error(total_balance.error);
                }

                $('#bl_wallet').html(data.total.current_balance);

                if($('.btn-refresh').hasClass('fa-spin')){
                    $('.btn-refresh').removeClass('fa-spin');
                }
            }
        });
        // $.get('<?php echo base_url('affiliate/balance'); ?>', function(data, status){
        //     var options = {
        //         useEasing: true,
        //         useGrouping: true,
        //         separator: ',',
        //         decimal: '.',
        //     };

        //     var total_aff_balance = new CountUp("total_aff_balance", 0, data.aff_wallet_balance, 2, 2.5, options);
        //     if(!total_aff_balance.error){
        //         total_aff_balance.start();
        //     }else
        //     {
        //         console.error(total_aff_balance.error);
        //     }

        // });
    }

    // var swiper = new Swiper('.swiper-wallet', {
    //     slidesPerView: 'auto',
    //     centeredSlides: true,
    //     spaceBetween: 30,
    //     pagination: {
    //         el: '.swiper-pagination',
    //         clickable: true,
    //     },
    // });
    // var swiper = new Swiper('.swiper-promotion', {
    //     slidesPerView: 2,
    //     spaceBetween: 30,
    //     freeMode: true,
    //     pagination: {
    //         el: '.swiper-pagination',
    //         clickable: true,
    //     },
    // });


    // function playgame(){
    //     $.confirm({
    //         bootstrapClasses: {
    //             container: 'container',
    //             containerFluid: 'container-fluid',
    //             row: 'row',
    //         },
    //         backgroundDismiss: true,
    //         theme: 'modern',
    //         content:
    //                     '<div style="">' +
    //                     '<div class="row" style="margin:0;">' +
    //                     '<div class="col-6">' +
    //                     '<div class="product-item">' +
    //                     '<ul style="padding:0; margin:0; list-style:none;">' +
    //                     '<li><a href="<?php echo base_url('PlayGame/SlotXO'); ?>"><img src="https://slot999.com/new/assets/images/slotxo.png" alt=""></a><br></li>' +
    //                     '<li><h3 class="font13">SLOTXO</h3></li>' +
    //                     '</ul>' +
    //                     '</div>' +
    //                     '</div>' +
    //                     '<div class="col-6">' +
    //                     '<div class="product-item">' +
    //                     '<ul style="padding:0; margin:0; list-style:none;">' +
    //                     '<li><a href="<?php echo base_url('PlayGame/Live22'); ?>"><img src="https://slot999.com/new/assets/images/live22.png" alt=""></a><br></li>' +
    //                     '<li><h3 class="font13">LIVE22</h3></li>' +
    //                     '</ul>' +
    //                     '</div>' +
    //                     '</div>' +
    //                     '</div>' +
    //                     '</div>' +
    //                     '</div>' ,
    //         buttons: {
    //             no:{
    //                 text: 'ปิด',
    //                 action: function(){
    //                     //
    //                 }
    //             }
    //         }
    //     });
    // }

    $(function(){
	  new Clipboard('.copy-user-slotxo');
	  new Clipboard('.copy-password-slotxo');

	  new Clipboard('.copy-user-live22');
	  new Clipboard('.copy-password-live22');
	});

</script>

<script type="text/javascript">
$('.copy-user-slotxo').on('click', function(){
	toastr_notify('คัดลอกไปยัง Clipboard เรียบร้อยแล้ว');
});
$('.copy-password-slotxo').on('click', function(){
	toastr_notify('คัดลอกไปยัง Clipboard เรียบร้อยแล้ว');
});
$('.copy-user-live22').on('click', function(){
	toastr_notify('คัดลอกไปยัง Clipboard เรียบร้อยแล้ว');
});
$('.copy-password-live22').on('click', function(){
	toastr_notify('คัดลอกไปยัง Clipboard เรียบร้อยแล้ว');
});


$(".menu-bar a").click(function(){
    //alert($(this).data('id'));
    if($(this).data('id')=='5' || $(this).data('id')=='6' ) {
        return;
    }else {
        $(".menu-bar").removeClass('active');
        $(this).parent().addClass("active");
        $(".center-menu").hide();
        $("#tab"+$(this).data('id')).show(350);
    }
});
</script>
