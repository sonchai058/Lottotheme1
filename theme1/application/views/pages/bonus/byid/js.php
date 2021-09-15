<script>

    $(document).ready(function(){
        //alert('test');
        $('#apply_bonus').click(function(e) {

            $.confirm({
                bootstrapClasses: {
                    container: 'container',
                    containerFluid: 'container-fluid',
                    row: 'row',
                },
                theme: 'modern',
                content:
                    '<h3 class="text-dark font18">ยืนยันรับ Bonus เพิ่มอีก 50% ยอดฝากครั้งแรก</h3>' +
                    'ใช่หรือไม่!',
                buttons: {
                    yes:{
                        text: 'ยอมรับเงื่อนไข และรับโบนัส',
                        btnClass: 'btn-red',
                        action: function(){
                            $('.loading').fadeIn();
                            $.ajax({
                                type: "GET",
                                url: "<?php echo base_url('bonus/apply_bonus_50_percent') ?>",
                                dataType: "json",
                                beforeSend: function(){
                                    // สำหรับควบคุม beforeSend event
                                    $('.btn-red').prop('disabled', true);
                                    confirm('ยืนยันการรับโบนัส');
                                },
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
                                                '<h3 class="text-dark font18">รับโบนัสสำเร็จ</h3>' + data.message,
                                            buttons: {
                                                no:{
                                                    text: 'ปิด',
                                                    action: function(){
                                                        window.location.replace('<?php echo base_url(); ?>');
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
                                                '<h3 class="text-dark font18">ไม่สามารถรับโบนัสได้!</h3>' + data.message,
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


    $(document).ready(function(){

        $('#apply_bonus_id').click(function(e) {
            var promotion_id = $('#promotion_id').val();
            $.confirm({
                bootstrapClasses: {
                    container: 'container',
                    containerFluid: 'container-fluid',
                    row: 'row',
                },
                theme: 'modern',
                content:
                    '<h3 class="text-dark font18">ยืนยันรับ Bonus </h3>' +
                    'ใช่หรือไม่!',
                buttons: {
                    yes:{
                        text: 'ยอมรับเงื่อนไข และรับโบนัส',
                        btnClass: 'btn-red',
                        action: function(){
                            $('.loading').fadeIn();
                            $.ajax({
                                type: "GET",
                                url: "<?php echo base_url('bonus/apply_bonus_by_id/') ?>"+promotion_id,
                                dataType: "json",
                                beforeSend: function(){
                                    // สำหรับควบคุม beforeSend event
                                    $('.btn-red').prop('disabled', true);
                                    confirm('ยืนยันการรับโบนัส');
                                },
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
                                                '<h3 class="text-dark font18">รับโบนัสสำเร็จ</h3>' + data.message,
                                            buttons: {
                                                no:{
                                                    text: 'ปิด',
                                                    action: function(){
                                                        window.location.replace('<?php echo base_url(); ?>');
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
                                                '<h3 class="text-dark font18">ไม่สามารถรับโบนัสได้!</h3>' + data.message,
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