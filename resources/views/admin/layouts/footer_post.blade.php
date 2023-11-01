<!--   Core JS Files   -->
<script src="{{ asset('dashboard/js/42d5adcbca.js') }}" crossorigin="anonymous"></script> <!-- Font Awesome Icons -->
<script src="{{ asset('dashboard/js/core/popper.min.js') }} "></script>
<script src="{{ asset('dashboard/js/core/bootstrap.min.js') }} "></script>
<script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }} "></script>
<script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }} "></script>
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
    const list = document.querySelectorAll('.nav-item-link')[{{ $index_nav }}].classList;
    list.add("active");
    list.add("bg-gradient-primary");

    function loadFile(event) {
        var image = document.querySelector('#box_image_post');
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
<script src="{{ asset('dashboard/js/material-dashboard.min.js?v=3.1.0') }}"></script>
