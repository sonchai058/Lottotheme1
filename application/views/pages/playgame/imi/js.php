<script>
function register_api_2() {

// alert('TEST register API ');
var submit_button = $("#register_api_2");

submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...');
submit_button.attr('disabled','disabled');
$.ajax({
    type: 'POST',
    url: '<?php echo base_url('api/member/register/api2'); ?>',
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

function trans_all_to_imi() {

// alert('TEST register API ');
var submit_button = $("#trans_all_to_imi");

submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังตรวจสอบข้อมูล...');
submit_button.attr('disabled','disabled');
$.ajax({
    type: 'POST',
    url: '<?php echo base_url('api/member/transfer/trans_all_to_imi'); ?>',
    dataType: 'json',
    success:function(data){
        // console.log(data);
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


function playgame(game_code) { 
    var tgame_code = game_code.trim();
    var submit_button = $("#playgame"+tgame_code);

submit_button.html('<i class="fas fa-spinner fa-spin"></i> กำลังโหลดเกม...');
submit_button.attr('disabled','disabled');
    $.ajax({
    type: 'GET',
    url: '<?php echo base_url('api/member/playgame/playimi/'); ?>'+game_code,
    dataType: 'json',
    success:function(data){
        // alert(data);
        if (data != '') { 
            submit_button.html('เล่นเลย');
            window.open(data, "_blank"); 
        }
        else {
            submit_button.html('ไม่สามารถเล่นเกมนี้ได้ !!');
        }


    }
});
}

</script>