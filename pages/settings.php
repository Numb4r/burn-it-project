<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 02/07/2016
 * Time: 16:17
 */

require_once '../cfg/core.php';
require_once '../cfg/userfnc.php';
require_once '../objects/users.php';

$CurrentUser = GetCurrentUserInfo();

UserIsLoggedIn();

?>


<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Dashboard - Burnit</title>

    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>

<body style="background-color: #ECE5CE">

<!-- Top Menu -->
<div id="menu"></div>


<div class="ui text container" style="padding-top: 8em;">
    <div class="ui raised segment">
        <form action="" enctype="multipart/form-data" method="POST" class="ui form">
            <div class="field">
                <div class="field">
                    <div align="center">
                        <div class="ui circular centered medium image" id="profileImage"
                             style="box-shadow: 0px 0px 15px #888888;">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <div>
                                            <label for="file" class="ui basic inverted button"
                                                   id="profileimagebtn">
                                                Alterar imagem</label>
                                            <input type="file" id="file" style="display:none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img align="center" class="ui centered aligned center" src=<?php //echo User->Image?>>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Nome</label>
                    <input type="text" placeholder=
                        <?php
                        echo $CurrentUser->Name;
                        ?>>
                </div>
                <div class="field">
                    <label>Descrição</label>
                    <input type="text" placeholder=
                        <?php
                        echo $CurrentUser->Description;
                        ?>>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" placeholder=<?php
                    echo $CurrentUser->Email;
                    ?>>
                </div>
                <div class="field">
                    <label>Senha</label>
                    <input type="password" placeholder="Senha">
                </div>
            </div>
            <button type="submit" class="ui button primary basic">Enviar</button>
        </form>
    </div>
</div>
</div>

<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/settings.js"></script>
<script src="../scripts/basic.js"></script>
</body>
