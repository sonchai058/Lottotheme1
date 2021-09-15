<script>
	
	<?php if ($game_account->live22->status == 0): ?>
	$('#btn_apply_live22').click(function(){

		$(this).hide();
		$('#live22_wait_regis').fadeIn();
		$.ajax({ 
            type: 'GET', 
            url: '<?php echo base_url('api/agent/Live22/info');?>',
            dataType: 'json',
            success:function(data){
            	//console.log(data);
            	if(data.status == 'error')
            	{
            		$.confirm({
			            theme: 'supervan',
			            animation: 'zoom',
			            title: 'ตั้งรหัสผ่านใหม่!',
			            content: '' +
			            '<form action="">' +
			            '<div class="form-group">' +
			            '<small>กรุณาตั้งรหัสสำหรับเข้าเล่นเกม</small>' +
			            '<div class="container">' +
			            '<input type="text" class="apply_password form-control text-center" value="<?php echo sess_userdata('password');?>"  required/>' +
			            '</div>' +
			            '<small>รูปแบบการตั้งรหัสผ่าน</small><br>' +
			            '<small>* รหัสผ่านต้องยาวมากกว่า 8 ตัวอักษร และไม่เกิน 16 ตัวอักษร</small><br>' +
			            '<small>* มีตัวเลขอย่างน้อย 1 ตัวอักษร</small><br>' +
			            '<small>* มีอักษระ A-Z อย่างน้อย 1 ตัวอักษร</small><br>' +
			            '<small>* มีอักษระ a-z อย่างน้อย 1 ตัวอักษร</small>' +
			            '</div>' +
			            '</form>',
			            buttons: {
			                formSubmit: {
			                    text: 'ยืนยัน',
			                    btnClass: 'btn-blue',
			                    action: function () {
			                    	var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
			                        var password = this.$content.find('.apply_password').val();

			                        if(!pattern.test(password)){
								        $.alert('รหัสผ่านของคุณไม่ตรงตามรูปแบบที่กำหนด กรุณาลองใหม่อีกครั้ง');
								        return false;
								    }

			                        	$.ajax({ 
											type: 'POST', 
											url: '<?php echo base_url('api/agent/Live22/register');?>',
											data: {password:password},
											dataType: 'json',
											success:function(data){
												if(data.status == 'success')
												{
													$('#live22_wait_regis').html('<img src="https://slot999.com/new/assets/images/loading.svg" width="25" alt=""><small>กำลังอัพเดทข้อมูล..</small>');

													$.get("<?php echo base_url('api/agent/Live22/info');?>",function(data){
														$('#live22_wait_regis').hide();
														$.alert('ระบบได้ทำการสมัครบัญชีเกมส์ Live22 ให้คุณเรียบร้อยแล้ว!');
														setTimeout(function() {
							                                location.reload();
							                            }, 3000);
													});
												}
												else
												{
													$.alert(data.message);
													return false;
												}
											}
										});

			                    }
			                },
			                formClose: {
			                    text: 'ปิด',
			                    btnClass: 'btn-red',
			                    action: function () {

			                    }
			                }
			            }
			        });
            	}
            	else
            	{
            		$.confirm({
					    title: 'สำเร็จ!',
					    content: 'ระบบได้ทำการสมัครบัญชีเกมส์ Live22 ให้คุณเรียบร้อยแล้ว!',
					    buttons: {
					        conf: {
					            text: 'ปิด',
					            btnClass: 'btn-blue',
					            action: function(){
					                location.reload();
					            }
					        }
					    }
					});
            	}
            }
        });
	});
	<?php endif ?>

	<?php if ($game_account->slotxo->status == 0): ?>
	$('#btn_apply_slotxo').click(function(){

		$(this).hide();
		$('#slotxo_wait_regis').fadeIn();
		$.ajax({ 
            type: 'GET', 
            url: '<?php echo base_url('api/agent/Slotxo/info');?>',
            dataType: 'json',
            success:function(data){
            	// console.log(data);
            	if(data.status == 'error')
            	{
            		$.confirm({
			            theme: 'supervan',
			            animation: 'zoom',
			            title: 'ตั้งรหัสผ่านใหม่!',
			            content: '' +
			            '<form action="">' +
			            '<div class="form-group">' +
			            '<small>กรุณาตั้งรหัสสำหรับเข้าเล่นเกม</small>' +
			            '<div class="container">' +
			            '<input type="text" class="apply_password form-control text-center" value="<?php echo sess_userdata('password');?>"  required/>' +
			            '</div>' +
			            '<small>รูปแบบการตั้งรหัสผ่าน</small><br>' +
			            '<small>* รหัสผ่านต้องยาวมากกว่า 8 ตัวอักษร และไม่เกิน 16 ตัวอักษร</small><br>' +
			            '<small>* มีตัวเลขอย่างน้อย 1 ตัวอักษร</small><br>' +
			            '<small>* มีอักษระ A-Z อย่างน้อย 1 ตัวอักษร</small><br>' +
			            '<small>* มีอักษระ a-z อย่างน้อย 1 ตัวอักษร</small>' +
			            '</div>' +
			            '</form>',
			            buttons: {
			                formSubmit: {
			                    text: 'ยืนยัน',
			                    btnClass: 'btn-blue',
			                    action: function () {
			                    	var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
			                        var password = this.$content.find('.apply_password').val();

			                        if(!pattern.test(password)){
								        $.alert('รหัสผ่านของคุณไม่ตรงตามรูปแบบที่กำหนด กรุณาลองใหม่อีกครั้ง');
								        return false;
								    }

			                        	$.ajax({ 
											type: 'POST', 
											url: '<?php echo base_url('api/agent/Slotxo/register');?>',
											data: {password:password},
											dataType: 'json',
											success:function(data){
												if(data.status == 'success')
												{
						      						$('#slotxo_wait_regis').html('<img src="https://wallet.pussy888.lifeassets/images/loading.svg" width="25" alt=""><small>กำลังอัพเดทข้อมูล..</small>');

													$.get("<?php echo base_url('api/agent/Slotxo/info');?>",function(data){
														$('#slotxo_wait_regis').hide();
														$.alert('ระบบได้ทำการสมัครบัญชีเกมส์ SlotXO ให้คุณเรียบร้อยแล้ว!');
														setTimeout(function() {
							                                location.reload();
							                            }, 3000);
													});
												}
												else
												{
													return false;
												}
											}
										});

			                    }
			                },
			                formClose: {
			                    text: 'ปิด',
			                    btnClass: 'btn-red',
			                    action: function () {

			                    }
			                }
			            }
			        });
            	}
            	else
            	{
            		$.confirm({
					    title: 'สำเร็จ!',
					    content: 'ระบบได้ทำการสัมครบัญชีเกมส์ SlotXO ให้คุณเรียบร้อยแล้ว!',
					    buttons: {
					        conf: {
					            text: 'ปิด',
					            btnClass: 'btn-blue',
					            action: function(){
					                location.reload();
					            }
					        }
					    }
					});
            	}
            }
        });
	});
	<?php endif ?>

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
</script>