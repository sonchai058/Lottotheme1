<script>
function register_api_3() {

// alert('TEST register API ');
var submit_button = $("#register_api_3");

submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...');
submit_button.attr('disabled','disabled');
$.ajax({
    type: 'POST',
    url: '<?php echo base_url('api/member/register/api3'); ?>',
    dataType: 'json',
    success:function(data){

      
        if (data.status == 'true') {
            submit_button.html('ดำเนินการสำเร็จ'); 
            window.location.reload(); 
        }
        else {
                submit_button.html('กรุณาทำรายการใหม่');
                submit_button.removeAttr('disabled');
        }



    }
});

}


function trans_all_to_ufa() {

// alert('TEST register API ');
var submit_button = $("#trans_all_to_ufa");

submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...');
submit_button.attr('disabled','disabled');
$.ajax({
    type: 'POST',
    url: '<?php echo base_url('api/member/transfer/trans_all_to_ufa'); ?>',
    dataType: 'json',
    success:function(data){

        if (data.status == 'true') {
            submit_button.html('ดำเนินการสำเร็จ'); 
            window.location.reload(); 

        }
        else {
                submit_button.html('กรุณาทำรายการใหม่');
                submit_button.removeAttr('disabled');
        }



    }
});

}


</script>