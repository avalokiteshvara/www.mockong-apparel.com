// Copyright (c) 2015, Fujana Solutions - Moritz Maleck. All rights reserved.
// For licensing, see LICENSE.md

var base_url = 'http://localhost/e-board';

CKEDITOR.plugins.add( 'imageuploader', {
    init: function( editor ) {
        editor.config.filebrowserBrowseUrl = base_url + '/ckeditor/plugins/imageuploader/imgbrowser.php';
    }
});
