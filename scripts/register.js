/**
 * Created by MVMCJ on 01/07/2016.
 */

function submit() {
    $('.ui.form').form('validate form');
    if ($('.ui.form').form('is valid')) {


        $("#registerBTN").addClass("loading");
        $.post("../api/register.php",
            {
                User: $("#regEmail").val(),
                Pass: md5($("#regPass").val()),
                Realname: $("#regName").val()
            },
            function (data, status) {
                if (data == "0") {
                    $(".ui.form").form('add errors', {
                        email: "O pedido de POST falhou.",
                    });
                } else if (data == "1") {
                    window.location.href = "../pages/login.php";
                }
                else if (data == "2") {
                    $(".ui.form").form('add errors', {
                        email: "Este email já é cadastrado.",
                    });
                    $(".ui.form").form('clear');
                }

                $("#registerBTN").removeClass("loading");
            });
    }
}

$(document)
    .ready(function () {

        console.log("Pagina de registro");

        $(document).on("keypress", "form", function (event) {

            if (event.keyCode == 13) {
                submit();
            }
            return event.keyCode;
        });

        $('.ui.form')
            .form({
                fields: {
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Por favor insira um e-mail'
                            },
                            {
                                type: 'email',
                                prompt: 'Por favor insira um e-mail válido'
                            }
                        ]
                    },
                    name: {
                        identifier: 'name',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Por favor insira um nome'
                            }
                        ]
                    },
                    password: {
                        identifier: 'password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Por favor insira uma senha'
                            },
                            {
                                type: 'length[6]',
                                prompt: 'Sua senha deve ter no minimo 6 caracteres.'
                            }
                        ]
                    }
                },
                keyboardShortcuts: false
            })
        ;
    })
;

$("#registerBTN").click(function () {
    submit();
});