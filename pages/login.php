<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 23:12
 */

require_once '../cfg/core.php';
require_once '../cfg/database.php';
require_once '../cfg/databasefnc.php';

if (isset($_SESSION["UserID"])) {
    header("Location: dashboard.php");
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $user = GetUserIdfromCredentials($_POST["email"], $_POST["password"]);

    if (isset($user) && !empty($user->GetID())) {
        $_SESSION["UserID"] = $user->GetID();
        header("Location: dashboard.php");
    } else {
        echo 'U & P Wrong';
    }
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

    <script src="../scripts/jquery.min.js"></script>
    <script src="../semantic/dist/semantic.js"></script>
    <script src="../scripts/login.js"></script>


</head>

<body>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui image header">
            <div class="content" style="text-shadow: 0 1px 3px rgba(0,0,0,.5); color: #fff4e4">
                Log-in
            </div>
        </h2>
        <form class="ui large form" method="POST" action="" autocomplete="off">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="email" name="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                </div>
                <div class="ui fluid large red submit button">Login</div>
            </div>

            <div class="ui error message"></div>
        </form>

        <div class="ui message">
            Novo por aqui? <a href="register.php">Registre-se</a>
        </div>
    </div>
</div>

</body>

</html>
