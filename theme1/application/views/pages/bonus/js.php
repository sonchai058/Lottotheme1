<script>
    $(document).on('click', '.modal-show', function () {
        // alert('test');
        $('#modal').modal({
            show: true, backdrop: 'static', keyboard: false, focus: false,
        }).find('.modal-dialog').load($(this).data('url'));
    });

    $(document).on("hidden.bs.modal", function (e) {
        $(e.target).removeData("bs.modal").find(".modal-content").empty();
    });
</script>