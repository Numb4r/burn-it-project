<?php

require_once('../cfg/core.php');
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

if (isset($_GET['id']))
{
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
    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" href="../css/post.css">
</head>

<body>


<div class="ui stackable menu" style="text-shadow: none">
    <div class="item">
        <img src="http://etc.usf.edu/presentations/extras/letters/fridge_magnets/orange/12/b-400.png">
    </div>
    <a href="dashboard.php" class="item">
        Postagens
    </a>
    <a class="item">
        Mensagens
    </a>
    <a class="item">
        Amigos
    </a>
</div>

<div class="ui container">
    <div class="ui segment" style="left:250px;width:600px;">
        <div class="ui left attached rail vertical menu" style="height: 313px;">
            <div class="item" align="center">
                <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png" class="ui tiny image" alt=""/>
                <p class="ui "><?php echo $PUser; ?></p>
            </div>
            <div class="item">
                <div class="menu">
                    <a class="item">Seguir <?php echo $PUser; ?><i class="icon add user"></i></a>
                    <a class="item">Bloquear <?php echo $PUser; ?><i class="icon remove"></i></a>
                    <a class="item">Denunciar <?php echo $PUser; ?><i class="icon fire extinguisher"></i></a>
                </div>
            </div>
            <a class="item">
                <i class="grid layout icon"></i> Ver outras discussões
            </a>
            <a class="item">
                Messanges <i class="icon mail"></i>
            </a>
        </div>
        <br/>
        <div class="ui right attached rail vertical menu" style="height: 265px;">
            <div class="item" align="center">
                <img src="../imgs/1e2378a2c82d2032674ee1f0a860a2cd1e3b902b.png" class="ui tiny image" alt=""/>
                <p class="ui oneline"><?php echo $PTitle ?></p>
            </div>
            <div class="item">
                <div class="menu">
                    <a class="item">Adicionar aos favoritos <i class="icon heart"></i></a>
                    <a class="item">Denunciar Discussao <i class="icon fire extinguisher"></i></a>
                </div>
            </div>
            <a class="item">
                <i class="grid layout icon"></i>Ver outras discussões do mesmo tema
            </a>
        </div>

        <div align="center">
            <h1 class="oneline" style="width: 350px;"><?php echo $PTitle; ?></h1>
        </div>
        <br/>
        <div class="segment">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
            et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            dolore eu
            fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
            deserunt mollit anim id est laborum.
        </div>


    </div>
</div>


<div class="ui grid">
    <div class="six wide column">
        <div class="ui comments">
            <h3 class="ui dividing header">A Favor</h3>

            <?php

            $lCo = count($PFavor);
            if ($lCo > $PComLimit) {
                $lCo = $PComLimit;
            }

            for ($x = 0; $x < $lCo; $x++) {
                $y = $PFavor[$x];
                echo ">\"" . $y->GetUser() . "</a>
                        <div class=\"metadata\">
                            <span class=\"date\">Today at 5:42PM</span>
                        </div>
                        <div class=\"text\">" . $y->GetCom() . "</div>
                        <div class=\"actions\">
                            <a class=\"reply\">Responder</a>
                        </div>
                    </div>
                    </div>";
            }
            ?>

        </div>
        <br/>
    </div>
    <br/>
    <div class="six wide column">
        <div class="ui comments">
            <h3 class="ui dividing header">Contra</h3>
            <?php
            $lCo = count($PContra);
            if ($lCo > $PComLimit) {
                $lCo = $PComLimit;
            }

            for ($x = 0; $x < $lCo; $x++) {
                $y = $PContra[$x];
                echo ">\"" . $y->GetUser() . "</a>
                        <div class=\"metadata\">
                        <span class=\"date\">Today at 5:42PM</span>
                    </div>
                        <div class=\"text\">" . $y->GetCom() . "</div>
                        <div class=\"actions\">
                        <a class=\"reply\">Responder</a>
                    </div>
                    </div>
                    </div>";
            }
            ?>
        </div>
        <br/>
    </div>
    <br/>
</div>

<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
</body>
