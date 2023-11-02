<!--   Core JS Files   -->
<script src="{{ mix('/js/font-awesome-icons.js') }}" crossorigin="anonymous"></script> <!-- Font Awesome Icons -->
<script src="{{ mix('/js/core/popper.min.js') }} "></script>
<script src="{{ mix('/js/core/bootstrap.min.js') }} "></script>
<script src="{{ mix('/js/plugins/perfect-scrollbar.min.js') }} "></script>
<script src="{{ mix('/js/plugins/smooth-scrollbar.min.js') }} "></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script>
    function loadFile(event) {
        var image = document.querySelector('#box_image_post');
        console.log(event.target);
        if (event.target.files[0] != null) {
            image.src = URL.createObjectURL(event.target.files[0]);
            return true;
        } else {
            image.src = "";
            return false;
        }
    };
</script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ mix('/js/material-dashboard.min.js') }}"></script>
