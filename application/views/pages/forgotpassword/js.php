<script>
    $(document).on('submit', 'form#form-forgot-password', function(e) {
        $('.loading').fadeIn();
        $('.btn-register').prop('disabled',true);
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('.loading').fadeOut();

                if (data.status == 'error') {
                    $('#form_alert').attr('class', 'alert alert-danger');
                    $('#alert_text').html(data.message);
                    $("#form_alert").fadeTo(5000, 1000).slideUp(1000, function() {
                        $('.btn-register').prop('disabled',false);
                        $("#form_alert").slideUp(1000);
                    });
                } else {
                    $('#form_alert').attr('class', 'alert alert-success');
                    $('#alert_text').html(data.message);
                    $("#form_alert").fadeTo(2000, 1000).slideUp(1000, function() {
                        $("#form_alert").slideUp(1000);
                    });
                }
            }
        });
    });
</script>