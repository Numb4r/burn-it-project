<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 23:12
 */

require_once '../objects/users.php';
require_once '../cfg/userfnc.php';

if (User::IsLoggedIn()) {
    header("Location: dashboard.php");
}

?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Login - Burnit</title>
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">


</head>

<body>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui image header">
            <div class="content" style="text-shadow: 0 1px 3px rgba(0,0,0,.5); color: #fff4e4">
                Log-in
            </div>
        </h2>
        <form class="ui large form" autocomplete="off" id="loginForm">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="email" name="email" placeholder="E-mail" id="emailinput">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha" id="passinput">
                    </div>
                </div>
                <div class="ui fluid large basic green button" id="send">Login</div>
            </div>

            <div class="ui error message"></div>
        </form>

        <div class="ui message">
            Novo por aqui? <a href="register.php">Registre-se</a>
        </div>
    </div>
</div>

<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/md5.js"></script>

<script type="text/javascript">
    function submit() {
        $('.ui.form').form('validate form');
        if ($('.ui.form').form('is valid')) {

            $("#loginBTN").addClass("loading");
            $.post("../api/login.php",
                {
                    User: $("#emailinput").val(),
                    Pass: md5($("#passinput").val())
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

                    }
                });
        }
    }

    $("#send").click(function () {
       submit();
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

</script>
</body>

</html>
