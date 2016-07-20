/**
 * Created by MVMCJ on 28/06/2016.
 */

var postForm = $("#postform");
var postFormButton = $("#postbtn");

var profileImage = $("#profileImage");
var profileImageSelector = $('#file');

function Update() {

    $("#newposts").html("");
    $("#loader").removeClass("hiddenloader");
    $("#loader").addClass("loaderactive");

    $.ajax({
        url: "../cfg/postsfilter.php",
        success: function (result) {
            $("#newposts").html(result);
            $("#loader").removeClass("loaderactive");
            $("#loader").addClass("hiddenloader");
        }
    });
}

function SubmitPostform() {
    postForm.form('validate form');
    if (postForm.form('is valid')) {
        postFormButton.addClass("loading");

        $.post("../api/post.php",
            {
                Title: $("#Posttitle").val(),
                Description: $("#Postdesc").val(),
                Tags: $("#Posttags").val()
            },
            function (data, status) {
                if (data != "3") {
                    $('.modal').modal('hide');
                    $('#postmodal').form('clear');
                    Update();
                } else {
                    postForm.form('add errors', {
                        title: "O título inserido já está cadastrado."
                    });
                }

                postFormButton.removeClass("loading");
            });

    }
}

function SendVerificationEmail() {
    $.post("../api/emailvalidation.php", {}, function (data, success) {
    });
}

function SubmitPhoto() {

    if ((profileImageSelector[0].files[0]) !== null) {
        var formData = new FormData();
        formData.append('arquivo', profileImageSelector[0].files[0]);

        $('#bodyDimmer').dimmer('show');

        $.ajax({
            type: 'POST',
            url: "../api/fileUpload.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function () {
                $('#bodyDimmer').dimmer('hide');
                window.location.reload(true);
            },
            error: function (data) {
                console.log(data);
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

    $.post("../api/validemail.php",
        {},
        function (data, status) {
            if (data != 1) {

                $('.ui.modal.email')
                    .modal({closable: false}).modal('show')
                ;

                var emailCansend = true;
                var emailMessage = $("#emailMessageConfirmed");
                var emailSendButton = $("#emailResendbutton");

                emailSendButton.click(function () {
                    if (emailCansend) {
                        emailMessage.html("Email reenviado");
                        SendVerificationEmail();
                        emailMessage.transition('fade up');
                        emailCansend = false;

                        setTimeout(function () {
                            emailMessage.transition('fade up');
                            emailSendButton.addClass("disabled");
                        }, 1000);

                        setTimeout(function () {
                            emailCansend = true;
                            emailSendButton.removeClass("disabled");
                        }, 30000);
                    }
                });
            }
        });

    var timeoutId;
    profileImage.hover(function () {
            if (!timeoutId) {
                timeoutId = window.setTimeout(function () {
                    timeoutId = null;
                    profileImage.dimmer("show");
                }, 1500);
            }
        },
        function () {
            if (timeoutId) {
                window.clearTimeout(timeoutId);
                timeoutId = null;
            }
            else {
                profileImage.dimmer("hide");
            }
        });

    $('.ui.dropdown').dropdown({transition: 'fade down'});
    $('.main.menu').visibility({type: 'fixed'});
    Update();


    profileImageSelector.on('change', function (e) {
        e.preventDefault();
        SubmitPhoto();
    });

    postForm.form({
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
    });

    $(document).on("keypress", "form", function (event) {

        if (event.keyCode == 13) {
            SubmitPostform();
        }
        return event.keyCode;
    });

    postFormButton.click(function () {
        SubmitPostform();
    });
});
