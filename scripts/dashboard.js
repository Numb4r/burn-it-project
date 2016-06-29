/**
 * Created by MVMCJ on 28/06/2016.
 */
$('.switch').click(function () {
    trocarEstado('postbtn', 'postform')
});

function trocarEstado(id1, id2) {
    var element1 = $('#' + id1);
    var element2 = $('#' + id2);

    if (element1.is(':visible')) {
        element1.transition({
            animation: 'scale',
            delay: 10000,
            onComplete: setTimeout(function () {
                element2.transition({
                    animation: 'scale',
                })
            }, 100)
        });
    }
    else {
        element2.transition({
            animation: 'scale',

            onComplete: setTimeout(function () {

                element1.transition({
                    animation: 'scale',
                })
            }, 100)
        });
    }
}

$('.ui.dropdown')
    .dropdown()
;

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