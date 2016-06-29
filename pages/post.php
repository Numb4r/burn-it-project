<?php

require_once('../cfg/core.php');
require_once('../cfg/sessionfnc.php');
require_once('../cfg/database.php');
require_once('../cfg/databasefnc.php');

global $PTitle;
global $PID;
global $PDesc;
global $PUser;
global $PFavor;
global $PContra;
global $PComLimit;

$PComLimit = 5;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $Info = GetPostInfo($_GET['id']);
    $PTitle = $Info->GetTitle();
    $PID = $Info->GetId();
    $PDesc = $Info->GetDescription();
    $PUser = $Info->GetPostOriginUser();

    $Coments = GetPostComments($_GET['id']);
    $PFavor = $Coments[0];
    $PContra = $Coments[1];
}

?>

<head>
    <title>Post - Burnit</title>

    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" href="../css/post.css">
</head>

<body>


<div class="container">
    <!-- Header -->
    <div class="ui large secondary pointing menu stackable" style="border-color: transparent">
        <p class="item disabled active">
            Post
        </p>

        <a class="item" href="dashboard.php">
            Postagens
        </a>
        <a class="item">
            Mensagens
            <div class="ui small blue label">1</div>
        </a>
        <a class="item">
            Amigos
        </a>

        <div class="item right">
            Bem vindo de volta, <?php
            $u = GetUserInfo(GetCurrentUserID());
            echo $u->GetRealname();
            ?>
        </div>
        <a class="ui item" href="logout.php">Sair</a>
    </div>
</div>

<div class="ui raised very padded text container segment" style="padding-top: 50px; max-width: 900px; ">

    <div class="ui middle aligned divided list">
        <div class="item">
            <div class="right floated content">

                <div class="ui basic buttons">
                    <button class="ui icon button" data-content="Adicionar aos favoritos"><i
                            class="align heart icon"></i></button>
                    <button class="ui icon button" data-content="Denunciar discussão"><i
                            class="align fire extinguisher icon"></i></button>
                </div>
            </div>

            <img class="ui avatar image" src="../imgs/phoenix.png">
            <div class="content">
                <?php echo $PUser; ?>
            </div>

            <div class="ui icon buttons middle aligned">
                <button class="ui icon button basic" data-content="Adicionar como amigo"><i
                        class="align add user icon"></i></button>
                <button class="ui icon button basic" data-content="Denunciar usuário"><i
                        class="align fire extinguisher icon"></i></button>
                <button class="ui icon button basic" data-content="Bloquear usuário"><i
                        class="align remove icon"></i>
                </button>
            </div>
        </div>
    </div>

        <p><?php echo $PDesc; ?></p>


    <script src="../scripts/jquery.min.js"></script>
    <script src="../semantic/dist/semantic.js"></script>
    <script src="../scripts/post.js"></script>
</body>
