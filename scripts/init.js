$('.ui.dropdown').dropdown();

var jumboHeight = $('.jumbotron').outerHeight();
function parallax(){
    var scrolled = $(window).scrollTop();
    $('.bg').css('height', (jumboHeight-scrolled) + 'px');
}

$(window).scroll(function () {
    parallax();
});

$('#xd').click(function () {
    $('.leaf').transition('fade up')
});