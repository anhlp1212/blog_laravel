<script>
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
</script>
