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
