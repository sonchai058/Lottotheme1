<script>

// var timeleft = 10;
// var downloadTimer = setInterval(function(){
//   if(timeleft <= 0){
//     clearInterval(downloadTimer);
//   }
//   document.getElementById("progressBar").value = 10 - timeleft;
//   timeleft -= 1;
// }, 1000);
check_credit();
function gjCountAndRedirect(secounds) {

$('#gj-counter-num').text(secounds);
$('#gj-counter-box').show();

var interval = setInterval(function() {
  secounds = secounds - 1;
  $('#gj-counter-num').text(secounds);
  if (secounds == 0) {
    clearInterval(interval);
    // window.location = url;
    $('#gj-counter-box').hide();
  }
}, 1000);

$('#gj-counter-box').click(function() {
  clearInterval(interval);
//   window.location = url;
});
}





    var myVar = setInterval(check_credit, 15000);


    function myStopFunction() {
  clearInterval(myVar);
    }


    function check_credit() {
        $("#withdraw_form").load("<?php echo base_url('withdrawal/form_withdraw'); ?>");
        getBalance();
        gjCountAndRedirect(15);
    }

    function getBalance()
    {

        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('api/member/balance'); ?>',
            dataType: 'json',
            success:function(data){
              // console.log(data);
              // console.log(data.total.current_balance);
              var wallet_balance = parseInt(data.total.current_balance);
                var min_withdraw = parseInt(data.min_withdraw);
                // var wallet_balance = data.total.current_balance;
                // wallet_balance = total_balance;
                if (wallet_balance > 0) {
                    $('#wallet_balance').html(wallet_balance);
                    $('#withdraw_amount').val(wallet_balance);

                    if (wallet_balance >= min_withdraw) {
                    $('#btn_withdraw').html("ถอนเงิน(<b id='gj-counter-num'></b>)");
                    $('#btn_withdraw').removeAttr("disabled");
                    }
                    else {
                        $('#btn_withdraw').html("ยอด Credit น้อยกว่า "+min_withdraw+"ไม่สามารถถอนได้ (<b id='gj-counter-num'></b>)");
                    }
                    // myStopFunction();
                }
                else {
                    $('#wallet_balance').html('0');
                    $('#withdraw_amount').val('0');
                }
               // alert(wallet_balance);

            }
        });
    }
</script>