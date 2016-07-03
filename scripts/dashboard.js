/**
 * Created by MVMCJ on 28/06/2016.
 */

function Update($searchstr) {

    $("#newposts").html("");
    $("#loader").removeClass("hiddenloader");
    $("#loader").addClass("loaderactive");

    $.ajax({
        url: "../cfg/postsfilter.php?search=" + $searchstr,
        success: function (result) {
            $("#newposts").html(result);
            $("#loader").removeClass("loaderactive");
            $("#loader").addClass("hiddenloader");
        }
    });
}

function submit() {
    $('.ui.form').form('validate form');
    if ($('.ui.form').form('is valid')) {
        $("#postbtn").addClass("loading");

        $.post("../api/post.php",
            {
                Title: $("#Posttitle").val(),
                Description: $("#Postdesc").val(),
                Tags: $("#Posttags").val()
            },
            function (data, status) {
                if (data != "3") {
                    $("#postbtn").removeClass("loading");
                    $('.modal').modal('hide')
                    $('.ui.form').form('clear');
                    Update("");
                } else {
                    $("#postbtn").removeClass("loading");
                    $(".ui.form").form('add errors', {
                        title: "O título inserido já está cadastrado."
                    });
                }
            });

    }
}

$(document).ready(function () {
    /*--------------
     Variables
     --------------*/

    /*--------------
     Initializer
     ---------------*/

    $('.ui.dropdown').dropdown({transition: 'fade down'});
    $('.main.menu').visibility({type: 'fixed'});

    Update("");

    /*--------------
     Menu
     ---------------*/

    /*--------------
     Form validation
     ---------------*/

    $('.ui.form')
        .form({
            fields: {
                title: {
                    identifier: 'title',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Por favor coloque um título.'
                        }
                    ]
                },
                desc: {
                    identifier: 'desc',
                    rules: [
                        {
                            type: 'minLength[10]',
                            prompt: 'Por favor escreva uma descrição de no minimo 10 caracteres.'
                        }
                    ]
                },
                tags: {
                    identifier: 'tags',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Por favor escreva uma tag.'
                        }
                    ]
                }
            },
            keyboardShortcuts: false
        })
    ;

    /*-------------------
     Form submit overlay
     ------------------*/

    $(document).on("keypress", "form", function (event) {

        if (event.keyCode == 13) {
            submit();
        }
        return event.keyCode;
    });
    $("#postbtn").click(function () {
        submit();
    });
});