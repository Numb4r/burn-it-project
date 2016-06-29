/**
 * Created by MVMCJ on 28/06/2016.
 */
$(document)
    .ready(function () {
        $('.masthead')
            .visibility({
                once: false,
                onBottomPassed: function () {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse: function () {
                    $('.fixed.menu').transition('fade out');
                }
            })
        ;

        $('.ui.sidebar')
            .sidebar('attach events', '.toc.item')
        ;

    })
;