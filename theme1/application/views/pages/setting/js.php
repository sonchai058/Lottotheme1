<script type="text/javascript">
$(document).ready(function() {
	$('#content').load('<?php echo base_url('setting/content');?>');
});

function set_default_wallet(wallet_id)
{
	$.post("<?php echo base_url('setting/setDefault');?>",{wallet_id:wallet_id},function(data, status){

		$.confirm({
			bootstrapClasses: {container: 'container', containerFluid: 'container-fluid', row: 'row'},
			theme: 'modern',
			content: '<i class="fas fa-check-circle text-success fa-3x mb-2"></i><br><h3 class="text-success font18">สำเร็จ!</h3>' + data.message,
		    buttons: {
		        	no:{
		        		text: 'ปิด', action: function(){
		        			$('#content').load('<?php echo base_url('setting/content');?>');
		        		}
		        	}
		    	}
			}
		
		);

	});
}
</script>