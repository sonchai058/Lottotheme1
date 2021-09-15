<script>

	$("html").on("contextmenu",function(e){
		return false;
	});
	$(document).keydown(function (event) {
		if (event.keyCode == 123) {
			return false;
		} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
		    return false;
		}
		else if (event.ctrlKey && event.keyCode == 85) {
		    return false;
		}
	});

	<?php if (count(hold_deposit()) > 0): ?>
	function holdDeposit(){
		$.confirm({
		    theme: 'supervan',
		    animation: 'zoom',
		    title: 'ยอดโอนค้าง!',
		    content: '' +
		        '<form action="">' +
		        '<div class="form-group">' +
		        '<small>* กรุณาทำเงื่อนไขการเทิร์นโอเวอร์ให้ครบก่อน หรือมียอดเครดิตเหลือต่ำกว่า 5 <br>ไม่เช่นนั้นท่านจะฝากเงินแล้วไม่เข้ากระเป๋า</small><br>' +
		        '<div class="container">' +
		        '<table class="table">' +
		        <?php foreach (hold_deposit() as $row): ?>
		        '<tr><td><?php echo thaiDateTime($row->datetime); ?></td><td><?php echo $row->amount; ?> ฿</td></tr>' +
		        <?php endforeach?>
		        '</table>' +
		        '</div>' +
		        '</div>' +
		        '</form>',
		    buttons: {
		        yes: {
		            text: 'โอนเข้ากระเป๋า',
		            btnClass: 'btn-blue',
		            action: function() {

		            	var yesButton = this.buttons.yes;

		            	yesButton.disable();
		            	$('.loading').show();


		                $.ajax({
				            type: 'GET',
				            url: '<?php echo base_url('api/member/balance/releaseHold'); ?>',
				            dataType: 'json',
				            success:function(data){
				            	$('.loading').hide();

				            	yesButton.enable();

				            	if(data.status == 'success')
				            	{
				            		$.alert({
									    bootstrapClasses: {
									        container: 'container',
									        containerFluid: 'container-fluid',
									        row: 'row',
									    },
									    theme: 'modern',
									    content:
									    '<h3 class="text-dark font18">ทำรายการสำเร็จ</h3>' + data.message,
									    buttons: {
									        no:{
									            text: 'ปิด',
									            action: function(){
									            	location.reload();
									            }
									        }
									    }
									});
				            	}
				            	else
				            	{
				            		$.alert({
									    bootstrapClasses: {
									        container: 'container',
									        containerFluid: 'container-fluid',
									        row: 'row',
									    },
									    theme: 'modern',
									    content:
									    '<h3 class="text-dark font18">ไม่สามารถทำรายการได้</h3>' + data.message,
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
				        return false;
		            }
		        },
		        no: {
		            text: 'ปิด',
		            btnClass: 'btn-blue',
		            action: function() {

		            }
		        },
		    }
		});
	}

    <?php endif?>

	$(window).on('load',function() {
		$('.loading').fadeOut();
	});

	// $(document).ready(function(){
	// 	// server_status();
	// 	getJackpot();
	// 	$(".isnumeric").keydown(function(event) {
	//         if ( event.keyCode == 46 || event.keyCode == 8 ) {
	//         }
	//         else {
	//             if (event.keyCode < 48 || event.keyCode > 57 ) {
	//                 event.preventDefault();
	//             }
	//         }
	//     });
	// });


	// var interval_id;
	// $(window).on("blur focus", function(e) {
	// 	var prevType = $(this).data("prevType");

	// 	if (prevType != e.type) {
	// 		switch (e.type) {
	// 		    case "blur":
	// 		        clearInterval(interval_id);
  //   				interval_id = 0;
	// 		        break;
	// 	        case "focus":
	// 	        if (!interval_id)
  //       			interval_id = setInterval(function(){getJackpot()},3000);
	// 		        break;
	// 		    }
	// 		}
	//     $(this).data("prevType", e.type);
	// });

	// function getJackpot()
	// {
	// 	$.get("<?php echo base_url('Jackpot/last_jackpot'); ?>", function(data) {
	// 		if(typeof(data.message) != "undefined" && data.message !== null) {

	// 			$.notify({
	// 			    message: data.message
	// 			}, {
	// 			    type: 'dark',
	// 			    placement: {
	// 			        from: "top",
	// 			        align: "center"
	// 			    },
	// 			    offset: 0,
	// 			    spacing: 0,
	// 			    delay: 7000,
	// 			    z_index: 99999,
	// 			    animate: {
	// 			        enter: 'animated slideInDown',
	// 			        exit: 'animated slideOutUp'
	// 			    },
	// 			    template: '<div data-notify="container" class="col-11 col-sm-3 alert alert-{0}" role="alert" style="background-color:#FFF !important;color:#323232 !important;border:0 !important;text-align:center;font-family:sukhumvit;width:90% !important;margin-top:20px !important;box-shadow: 0 10px 20px rgba(0,0,0,.2);">' +
	// 			        '<span data-notify="icon"></span> ' +
	// 			        '<span data-notify="title">{1}</span> ' +
	// 			        '<span data-notify="message">{2}</span>' +
	// 			        '<div class="progress" data-notify="progressbar">' +
	// 			        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
	// 			        '</div>' +
	// 			        '<a href="{3}" target="{4}" data-notify="url"></a>' +
	// 			        '</div>'
	// 			});

	// 		}
	// 	});
	// }

	function toastr_notify(msg)
	{
		$.notify({
		    message: msg
		}, {
		    type: 'dark',
		    placement: {
		        from: "bottom",
		        align: "center"
		    },
		    offset: 0,
		    spacing: 0,
		    delay: 2000,
		    z_index: 99999,
		    animate: {
		        enter: 'animated slideInUp',
		        exit: 'animated slideOutDown'
		    },
		    template: '<div data-notify="container" class="col-11 col-sm-3 alert alert-{0}" role="alert" style="background-color:#323232 !important;color:#FFF !important;border:0 !important;text-align:center;font-family:sukhumvit;">' +
		        '<span data-notify="icon"></span> ' +
		        '<span data-notify="title">{1}</span> ' +
		        '<span data-notify="message">{2}</span>' +
		        '<div class="progress" data-notify="progressbar">' +
		        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
		        '</div>' +
		        '<a href="{3}" target="{4}" data-notify="url"></a>' +
		        '</div>'
		});
	}



    function goBack() {
        window.history.back();
    }

    function logout(){
    	$.confirm({
		    bootstrapClasses: {
		        container: 'container',
		        containerFluid: 'container-fluid',
		        row: 'row',
		    },
		    theme: 'modern',
		    content:
		    '<h3 class="text-dark font18">ออกจากระบบ</h3>' +
		    'คุณต้องการออกจากระบบ ใช่หรือไม่!',
		    buttons: {
		        yes:{
		            text: 'ใช่',
		            btnClass: 'btn-red',
		            action: function(){
		                window.location.replace("<?php echo base_url('logout'); ?>");
		            }
		        },
		        no:{
		            text: 'ปิด',
		            action: function(){
		            	//
		            }
		        }
		    }
		});
    }
</script>