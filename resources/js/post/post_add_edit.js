function loadFile(event) {
    var image = document.querySelector('#box_image_post');
    if (event.target.files[0] != null) {
        image.src = URL.createObjectURL(event.target.files[0]);
        return true;
    } else {
        image.src = "";
        return false;
    }
}

document.addEventListener("DOMContentLoaded", function () {
    tinymce.init({
        selector: 'textarea',

        /* TinyMCE configuration options */
        skin: false,
        content_css: false,
        plugins: 'code table lists autoresize image preview',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        //paste Core plugin options
        paste_block_drop: false,
        paste_data_images: true,
        paste_as_text: true,
    });

    $('#image_post').on('change', loadFile)
});