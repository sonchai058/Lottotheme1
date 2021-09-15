<script>

	$(function(){
	  var link_copy = new Clipboard('#copy-aff-link');

	  link_copy.on('success', function(e) {

	  		toastr_notify('คัดลอกลิงค์แนะนำไปยัง Clipboard เรียบร้อยแล้ว');

		    e.clearSelection();
		});

		var affiliate_copy = new Clipboard('#copy-affiliate');

		affiliate_copy.on('success', function(e) {

		toastr_notify('คัดลอกลิงค์แนะนำไปยัง Clipboard เรียบร้อยแล้ว');

	  e.clearSelection();
  });
	});


	$(document).ready(function(){

		$('#aff-withdraw-btn').click(function(e) {


			$.confirm({
			    bootstrapClasses: {
			        container: 'container',
			        containerFluid: 'container-fluid',
			        row: 'row',
			    },
			    theme: 'modern',
			    content: 
			    '<h3 class="text-dark font18">ยืนยันการถอนเงินเข้ากระเป๋าหลัก</h3>' +
			    'ใช่หรือไม่!',
			    buttons: {
			        yes:{
			            text: 'ยอมรับเงื่อนไข และถอนเงินเข้ากระเป๋าหลัก',
			            btnClass: 'btn-red',
			            action: function(){

			            	$('.loading').fadeIn();

			                $.ajax({
			                    type: "GET",
			                    url: "<?php echo base_url('affiliate/apply_aff_reward')?>",
			                    dataType: "json",
			                    success: function(data)
			                    {
			                    	$('.loading').fadeOut();
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
			                                '<h3 class="text-dark font18">ทำรายการสำเร็จ รอการตรวจสอบจากผู้ดูแลระบบ</h3>' + data.message,
			                                buttons: {
			                                    no:{
			                                        text: 'ปิด',
			                                        action: function(){
			                                        	window.location.replace('<?php echo base_url();?>');
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
			                                '<h3 class="text-dark font18">ทำรายการไม่สำเร็จ!</h3>' + data.message,
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
			        },
			        no:{
			            text: 'ปิด',
			            action: function(){
			            	//
			            }
			        }
			    }
			});
		});

	});
</script>