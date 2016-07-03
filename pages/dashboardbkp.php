<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 02:31
 */

require_once '../cfg/core.php';
require_once '../cfg/cookiesfnc.php';
require_once '../cfg/databasefnc.php';

UserIsLoggedIn();

$CardsLimit = 5;

?>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Burn it</title>

    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" href="../css/dashboardbkp.css">
    <link rel="stylesheet" href="../css/landingimages.css">

    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>

<body>

<!-- Main menu-->
<div class="ui inverted vertical masthead center aligned segment" id="iMasthead" style="padding-top: 0px;">
    <div class="ui pointing secondary inverted main menu" style="border-color: transparent;">
        <a class="toc item">
            <i class="sidebar icon"></i>
        </a>
        <a class="item active">Postagens</a>
        <a class="item">Mensagens</a>
        <a class="item">Amigos</a>
        <div class="item right">
            Bem vindo de volta, <?php
            $u = GetUserInfo(GetCurrentUserID());
            echo $u->GetRealname();
            ?>
        </div>
        <a class="item" href="logout.php">Sair</a>
    </div>
</div>


<!--<img class="ui medium image centered" src="../imgs/burnitCortadoBranco.png" style="  -webkit-filter: drop-shadow(0 1px 3px rgba(0, 0, 0, .5)); filter: drop-shadow(0 1px 3px rgba(0, 0, 0, .5));">-->

<!-- Swap GUI -->

<div class="ui divider" style="padding-bottom: 0px; padding-top: 0px;"></div>

<div align="center" style="padding-top: 10px; padding-bottom: 10px; ">
    <button class="ui positive basic button switch icon" data-tooltip="Adicionar uma discussão"><i
            class="add icon"></i>
        Adicionar
    </button>

    <div class="ui icon input" id="searchInputContainer">
        <input type="text" id="searchInput" placeholder="Procurar...">
        <i class="search icon"></i>
    </div>
</div>

<div class="ui divider"></div>

<!-- Swap GUI -->

<!-- Posts -->
<div class="ui cards posts stackable centered loading" style="padding-left: 10px; padding-right: 10px;" id="cards">
</div>

<!-- Add post modal -->
<div class="ui small modal">
    <div class="header">
        Adicionar discussão
    </div>
    <form class="ui form basic segment">
        <div class="field">
            <label> <i class="icon tag"></i>Título</label>
            <input type="text" placeholder="Título" name="title" id="Posttitle">
        </div>
        <div class="field">
            <label><i class="icon file text"></i>Descrição</label>
            <textarea name="desc" placeholder="Descrição" id="Postdesc"></textarea>
        </div>
        <div class="field">
            <label><i class="icon tags"></i>Tags</label>
            <input type="text" placeholder="Tags" id="Posttags" name="tags">
        </div>
        <div class="ui error message"></div>
        <div class="ui blue button" id="postbtn">Postar</div>
    </form>
</div>


<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/dashboard.js"></script>

</body>