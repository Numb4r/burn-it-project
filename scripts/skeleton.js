/**
 * Created by marco on 15/07/2016.
 */

$(document).ready(function () {

    var input = $('#iSearch');
    var uiinput = $('#iUi');

    $('.ui.dropdown').dropdown({transition: 'fade down'});

    input.focus(function () {
        uiinput.animate({width: '+=50px'});
    });

    input.focusout(function () {
        uiinput.animate({width: '-=50px'});
    });

    $('.ui.search')
        .search({
            type: 'category',
            showNoResults: true,
            apiSettings: {
                url: '../api/search.php?s={query}'
            },
            fields: {
                title: 'Title',
                url: 'Link'
            },
            error: {
                source: 'Cannot search. No source used, and Semantic API module was not included',
                noResults: 'Nenhum resultado encontrado.',
                logging: 'Error in debug logging, exiting.',
                noTemplate: 'A valid template name was not specified.',
                serverError: 'There was an issue with querying the server.',
                maxResults: 'Results must be an array to use maxResults setting',
                method: 'The method you called is not defined.'
            },
            minCharacters: 1
        })
    ;
});