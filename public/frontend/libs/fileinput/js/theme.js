/*!
 * bootstrap-fileinput v5.2.1
 * http://plugins.krajee.com/file-input
 *
 * Font Awesome icon theme configuration for bootstrap-fileinput. Requires font awesome assets to be loaded.
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2021, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD-3-Clause
 * https://github.com/kartik-v/bootstrap-fileinput/blob/master/LICENSE.md
 */
(function ($) {
    "use strict";

    $.fn.fileinputThemes.mdi = {
        fileActionSettings: {
            removeIcon: '<i class="mdi mdi-trash-can"></i>',
            uploadIcon: '<i class="mdi mdi-upload"></i>',
            uploadRetryIcon: '<i class="mdi mdi-repeat"></i>',
            downloadIcon: '<i class="mdi mdi-download"></i>',
            zoomIcon: '<i class="mdi mdi-search-web"></i>',
            dragIcon: '<i class="mdi mdi-image-search"></i>',
            indicatorNew: '<i class="mdi fa-plus-circle text-warning"></i>',
            indicatorSuccess: '<i class="mdi fa-check-circle text-success"></i>',
            indicatorError: '<i class="mdi fa-exclamation-circle text-danger"></i>',
            indicatorLoading: '<i class="mdi fa-hourglass text-muted"></i>',
            indicatorPaused: '<i class="mdi fa-pause text-info"></i>'
        },
        layoutTemplates: {
            fileIcon: '<i class="mdi fa-file kv-caption-icon"></i> '
        },
        previewZoomButtonIcons: {
            prev: '<i class="mdi fa-caret-left fa-lg"></i>',
            next: '<i class="mdi fa-caret-right fa-lg"></i>',
            toggleheader: '<i class="mdi fa-fw fa-arrows-v"></i>',
            fullscreen: '<i class="mdi fa-fw fa-arrows-alt"></i>',
            borderless: '<i class="mdi fa-fw fa-external-link"></i>',
            close: '<i class="mdi fa-fw fa-remove"></i>'
        },
        previewFileIcon: '<i class="mdi fa-file"></i>',
        browseIcon: '<i class="mdi fa-folder-open"></i>',
        removeIcon: '<i class="mdi fa-trash"></i>',
        cancelIcon: '<i class="mdi fa-ban"></i>',
        pauseIcon: '<i class="mdi fa-pause"></i>',
        uploadIcon: '<i class="mdi fa-upload"></i>',
        msgValidationErrorIcon: '<i class="mdi fa-exclamation-circle"></i> '
    };
})(window.jQuery);
