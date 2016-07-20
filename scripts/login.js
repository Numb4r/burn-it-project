/**
 * Created by MVMCJ on 28/06/2016.
 */


function submit() {
    $('.ui.form').form('validate form');
    if ($('.ui.form').form('is valid')) {

        $("#loginBTN").addClass("loading");
        $.post("../api/login.php",
            {
                User: $("#emailinput").val(),
                Pass: $("#passinput").val()
            },
            function (data, status) {
                $("#loginBTN").removeClass("loading");
                if (data == "0") {
                    $(".ui.form").form('add errors', {
                        email: "O pedido de POST falhou.",
                    });
                } else if (data == "1") {
                    window.location.href = "../pages/dashboard.php";
                }
                else if (data == "2") {
                    $(".ui.form").form('add errors', {
                        email: "A combinação de usuário e senha é inexistente nos nossos servidores.",
                    });
                    $(".ui.form").form('clear');
                }


            });
    }
}

$("#loginBTN").click(function () {
    submit();
});

$(document)
    .ready(function () {
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

        $(document).on("keypress", "form", function (event) {

            if (event.keyCode == 13) {
                submit();
            }
            return event.keyCode;
        });
    })
;
