<script>
function register_api_1() {

// alert('TEST register API ');
var submit_button = $("#register_api_1");

submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...');
submit_button.attr('disabled','disabled');
$.ajax({
    type: 'POST',
    url: '<?php echo base_url('api/member/register/api1'); ?>',
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

function trans_all_to_joker() {

// alert('TEST register API ');
var submit_button = $("#trans_all_to_joker");

submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...');
submit_button.attr('disabled','disabled');
$.ajax({
    type: 'POST',
    url: '<?php echo base_url('api/member/transfer/trans_all_to_joker'); ?>',
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