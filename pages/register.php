<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 27/06/2016
 * Time: 22:55
 */

require_once '../objects/users.php';
require_once '../cfg/userfnc.php';

if(User::IsLoggedIn()){
    header("Location: dashboard.php");
}

?>


<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.css">

    <script src="../scripts/jquery.min.js"></script>
    <script src="../semantic/dist/components/form.js"></script>
    <script src="../semantic/dist/components/transition.js"></script>

    <style type="text/css">
        body {
            background-image: url('http://semantic-ui.com/images/backgrounds/6.jpg');
            background-position-x: 100%;
            background-position-y: 90%;
            overflow-y: hidden;
        }

        body > .grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 450px;
        }
    </style>

</head>
<body>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui image header">
            <div class="content" style="text-shadow: 0 1px 3px rgba(0,0,0,.5); color: #fff4e4">
                Registrar-se
            </div>
        </h2>
        <form class="ui large form" autocomplete="off" method="POST" action="">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" id="regName" name="name" placeholder="Nome" value="" autocomplete="off">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="text" id="regEmail" name="email" placeholder="E-mail" value="" autocomplete="off">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" id="regPass" name="password" placeholder="Senha" value=""
                               autocomplete="off">
                    </div>
                </div>
                <div class="ui fluid large green basic button" id="registerBTN">Registrar</div>
            </div>

            <div class="ui error message"></div>
        </form>

        <div class="ui message">
            Já possui uma conta? <a href="login.php">Logar-se</a>
        </div>
    </div>
</div>

<script src="../scripts/md5.js"></script>
<script src="../scripts/register.js"></script>
</body>

</html>
