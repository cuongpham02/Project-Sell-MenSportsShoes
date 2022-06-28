<script type="text/javascript">
    $('.btn-chang-status').click(function(){
        let status = $(this).data('status');
        let id = $(this).data('id');
        let route = $(this).data('route');
        $.ajax({
            url:"{{route('')}}",
            method:"POST",
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                status:status,
                id:id,
            },
            success:function(data){
                location.reload();
            }
        });
    });
    $(document).ready(function() {
    });
</script>
