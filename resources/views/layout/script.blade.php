<script>
    function logout(){
        let url = "{{url('auth/login')}}";
        if (confirm("Keluar aplikasi ?") == true) {
            window.location.replace(url);
        }
    }
</script>
