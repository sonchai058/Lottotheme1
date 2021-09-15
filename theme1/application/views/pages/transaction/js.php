<script>
$(document).ready(function(){
	var active_tab = window.location.hash.substr(1);
	if(active_tab == 'withdraw'){$('#pills-withdrawal-tab').click();}
	if(active_tab == 'deposit'){$('#pills-deposit-tab').click();}
	if(active_tab == 'transfer'){$('#pills-transfer-tab').click();}
	if(active_tab == 'bonus'){$('#pills-bonus-tab').click();}
});
</script>