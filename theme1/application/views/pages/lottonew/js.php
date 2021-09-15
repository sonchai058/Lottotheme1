<script>
$(document).ready(function(){
        setTimeout(function(){getBalance();},3000);
        //$('.btn-refresh').click(function(e) {
        //    $('.headTop').html('-');
        //    getBalance();
        //});
});

function getBalance()
    {
      $('#headTop').html('-');
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
                  if(!total_balance.error) {
                    console.error(total_balance.error);
                  }else {
                    console.log('some error total_balance..');
                  }
                }

                $('#headTop').html(data.total.current_balance);
                if(parseInt(data.total.current_balance)>0) {
                  $(".submit").attr("disabled",false);
                  $(".wallet_0").hide();
                }else {
                  $(".submit").attr("disabled",true);
                  $(".wallet_0").show();
                }

                <?php if($page_content=='lottonew/content' || $page_content=='lottonew/content_setnumber'){?> setSumPlay(); <?php }?>

                //if($('.btn-refresh').hasClass('fa-spin')){
                //    $('.btn-refresh').removeClass('fa-spin');
               // }
            }
        });
    }

$(".btnDel").click(function(){
  //alert($(this).data('id'));
  $.ajax({
    type: "POST",
    url: '<?php echo base_url('service/active/lottosetdelete'); ?>/'+$(this).data('id'),
    data: $("#formSave").serialize(), // serializes the form's elements.
    success: function(data)
    {
      alert(data.message);
      //console.log(data);
      if(data.status=='success') {
        location.reload();
      }else {

      }
    }
  });
});

</script>
<?php echo js_res('js/countUp.js'); ?>