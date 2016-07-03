/**
 * Created by MVMCJ on 02/07/2016.
 */

$(document)
    .ready(function() {

        // fix main menu to page on passing
        $('.main.menu').visibility({
            type: 'fixed'
        });

        $('.image').visibility({
            type: 'image',
            transition: 'vertical flip in',
            duration: 500
        });

        $('.main.menu  .ui.dropdown').dropdown({
            on: 'hover'
        });
    })
;