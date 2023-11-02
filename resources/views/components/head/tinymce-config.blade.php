<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | code | table',
        menu: {
            file: {
                title: 'File',
                items: 'newdocument restoredraft | preview | print '
            },
            edit: {
                title: 'Edit',
                items: 'undo redo | cut copy paste | selectall | searchreplace'
            },
            view: {
                title: 'View',
                items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen'
            },
            insert: {
                title: 'Insert',
                items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime'
            },
            format: {
                title: 'Format',
                items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat'
            },
            tools: {
                title: 'Tools',
                items: 'spellchecker spellcheckerlanguage | code wordcount'
            },
            table: {
                title: 'Table',
                items: 'inserttable | cell row column | tableprops deletetable'
            },
        },
        menubar: 'favs file edit view insert format tools table',
        content_css: 'css/content.css'
    });
</script>
