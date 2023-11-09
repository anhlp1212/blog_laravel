import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';

// .. After imports init TinyMCE ..
window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: 'textarea',

        /* TinyMCE configuration options */
        skin: false,
        content_css: false,
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    });

});

import Popper from 'popper.js';
import Bootstrap from 'bootstrap';

import $ from "jquery";
window.$ = $;
window.jQuery = $;
