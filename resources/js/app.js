import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';

// .. After imports init TinyMCE ..
window.addEventListener('DOMContentLoaded', () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
});

import Popper from 'popper.js';
import Bootstrap from 'bootstrap';

import $ from "jquery";
window.$ = $;
window.jQuery = $;
