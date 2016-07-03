/**
 * Created by MVMCJ on 28/06/2016.
 */
$(document)
    .ready(function () {
        $("#iMasthead").addClass("landing-image"+Math.floor((Math.random() * 16) + 1));
        
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