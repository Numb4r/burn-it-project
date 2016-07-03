<?php

require_once('../cfg/core.php');
require_once('../cfg/cookiesfnc.php');
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
    $PTitle = $Info->Title();
    $PID = $Info->PostID();
    $PDesc = $Info->PostDescription();
    $PUser = GetUserInfo($Info->PostOriginUser)->Realname;

    $Coments = GetPostComments($_GET['id']);
    $PFavor = $Coments[0];
    $PContra = $Coments[1];
} else {
    header("Location: 404.php");
}

?>

<head>
    <title>Post - Burnit</title>

    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" href="../css/post.css">
</head>

<body style="background-color: #ECE5CE">

<!-- Top Menu -->
<div class="ui fixed borderless menu" style="background-color: #556270">
    <a class="ui item" style="color: white;" href="dashboard.php">
       <i class="ui icon home outline"></i>
        Home
    </a>

    <div class="right menu">
        <div class="ui item icon dropdown">
            <i class="alarm outline icon" style="color: white;"></i>
            <div class="menu">
                <div class="header">
                    <i class="tags icon"></i>
                    Filter by tag
                </div>
                <div class="divider"></div>
                <div class="item">
                    <i class="attention icon"></i>
                    Important
                </div>
                <div class="item">
                    <i class="comment icon"></i>
                    Announcement
                </div>
                <div class="item">
                    <i class="conversation icon"></i>
                    Discussion
                </div>
            </div>
        </div>

        <div class="ui item dropdown" style="padding-bottom: 5px; padding-top: 5px; padding-right: 2px;">
            <img src="http://shop.bilocationrecords.com/bilder/produkte/gross/TRUCKFIGHTERS-Universe-clear-LP.jpg"
                 class="ui circular mini image">
            <i class="icon caret down" style="color: white;"></i>
            <div class="menu">
                <div class="item">New</div>
                <div class="item">
                    <span class="description">ctrl + o</span>
                    Open...
                </div>
                <div class="item">
                    <span class="description">ctrl + s</span>
                    Save as...
                </div>
                <div class="item">
                    <span class="description">ctrl + r</span>
                    Rename
                </div>
                <div class="item">Make a copy</div>
                <div class="item">
                    <i class="folder icon"></i>
                    Move to folder
                </div>
                <div class="item">
                    <i class="trash icon"></i>
                    Move to trash
                </div>
                <div class="divider"></div>
                <div class="item">Download As...</div>
                <div class="item">
                    <i class="dropdown icon"></i>
                    Publish To Web
                    <div class="menu">
                        <div class="item">Google Docs</div>
                        <div class="item">Google Drive</div>
                        <div class="item">Dropbox</div>
                        <div class="item">Adobe Creative Cloud</div>
                        <div class="item">Private FTP</div>
                        <div class="item">Another Service...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="height: 40px;"></div>

<div class="ui raised very padded text container segment" style="max-width: 900px; ">

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
</div>


<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/post.js"></script>
<script src="../scripts/menu.js"></script>
</body>
