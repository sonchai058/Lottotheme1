 
<script>
//     $(document).ready(function(){
//         getBalance();

//         $('.btn-refresh').click(function(e) {
//             $('.btn-refresh').addClass('fa-spin');
//             getBalance();
//         });

//     });
//  function getBalance()
//     {
//         $.ajax({
//             type: 'GET',
//             url: '<?php echo base_url('api/member/balance'); ?>',
//             dataType: 'json',
//             success:function(data){

//                 var options = {
//                     useEasing: true,
//                     useGrouping: true,
//                     separator: ',',
//                     decimal: '.',
//                 };

//                 var total_balance = new CountUp("total_balance", 0, data.total.current_balance, 2, 2.5, options);
//                 if(!total_balance.error){
//                     total_balance.start();
//                     console.log(total_balance)
//                 }else{
//                     console.error(total_balance.error);
//                 }

//                 $('#bl_wallet').html(data.wallet.current_balance);

//                 if($('.btn-refresh').hasClass('fa-spin')){
//                     $('.btn-refresh').removeClass('fa-spin');
//                 }
//             }
//         });
     
//     }
</script>