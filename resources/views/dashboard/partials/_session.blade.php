@if(session('success'))
<script>

    Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '{{session("success")}}',
        showConfirmButton: false,
        timer: 2000
    })
</script>
    @endif
