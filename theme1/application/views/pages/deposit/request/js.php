<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment-with-locales.min.js"></script>
<script>
    $(function(){

		var turn = $('#turn_amount').val();
		if (turn < 1) {
			$('#request_div').load('<?php echo base_url('deposit/request_div');?>');
		}
    	else {
			
		}

    	$('#deposit_datetime').datepickerInFullscreen({
        datepicker      : { language : 'th' },
        format          :   'YYYY-MM-DD', // YYYY-MM-DD
        closeOnChange	: true,
        fakeInput		: false
    	});

    	new Clipboard('.copy-account-kbank');
    });

    function confirmKBank()
    {
    	$('.loading').show();
    	$('#confirmKbank').html('กำลังตรวจสอบยอด <span id="con_timer">15</span>...');
    	$('#confirmKbank').prop('disabled', true);
    	$.get("<?php echo base_url('auto/bank/kbank');?>", function(data, status){});
    	var timeleft = 15;
	    var downloadTimer = setInterval(function(){
	    	timeleft--;
	    	document.getElementById("con_timer").textContent = timeleft;
	    	if(timeleft <= 0){
	    		clearInterval(downloadTimer);
	    		var request_amount = $('#confirmKbank').data('amount');
		    	$.ajax({
					type: "POST",
					url: '<?php echo base_url('deposit/checkKbank');?>',
					dataType: "json",
					data: {request_amount:request_amount},
					success: function(data)
					{
						$('.loading').hide();
						if(data == true)
						{
						    $('#summaryDiv').hide();
						    $('#successDiv').show();
						    setInterval(function(){
						    	window.location = "<?php echo base_url();?>";
							}, 5000);
						}
						else
						{
							$('#confirmKbank').html('ยืนยัน');
							$('#confirmKbank').prop('disabled', false);
							$.confirm({
							    bootstrapClasses: {
							        container: 'container',
							        containerFluid: 'container-fluid',
							        row: 'row',
							    },
							    theme: 'modern',
							    content: 
							    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
							    'ระบบยังไม่พบยอดเงินของท่าน<br>กรุณาตรวจสอบรายการโอนอีกครั้ง<br>ขอบคุณคะ',
							    buttons: {
							        no:{
							            text: 'ปิด',
							            action: function(){
							            	//
							            }
							        }
							    }
							});
						}
					}
				});
	    	}
	    },1000);
    }
</script>