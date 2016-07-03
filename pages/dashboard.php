<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 02/07/2016
 * Time: 16:17
 */

require_once '../cfg/core.php';
require_once '../cfg/cookiesfnc.php';
require_once '../cfg/userfnc.php';
require_once '../cfg/databasefnc.php';

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
<div class="ui fixed borderless menu" style="background-color: #556270">
    <div class="ui item" style="width: 400px;">
        <div class="ui icon input">
            <input class="prompt" type="text" placeholder="Pesquisar...">
            <i class="search link icon"></i>
        </div>
        <div class="results"></div>
    </div>

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

<!-- Main Content -->
<div class="ui text container" style="padding-top: 8em;">
    <div class="ui segment basic">

        <!-- Side user menu-->
        <div class="ui left attached very close rail">
            <div class="ui sticky">

                <div class="ui card">
                    <div class="image">
                        <img
                            src="http://shop.bilocationrecords.com/bilder/produkte/gross/TRUCKFIGHTERS-Universe-clear-LP.jpg"
                            title="">
                    </div>
                    <div class="content">
                        <a class="header"><?php echo $CurrentUser->Realname ?></a>
                        <div class="meta">
                            <span class="date">Inscreveu-se em <?php

                                $datetime = new DateTime($CurrentUser->Date);

                                echo $datetime->format('Y') ?></span>
                        </div>
                        <div class="description">
                            Yuri é viadão.(sou não,se foder)
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="user icon"></i>
                            22 Amigos
                        </a>
                    </div>

                    <div class="extra content">
                        <button class="ui button fluid primary labeled icon" onclick="$('.ui.modal').modal('show')">
                            <i class="write icon"></i>
                            Escrever
                        </button>
                        <div style="height: 10px;"></div>
                        <a href="settings.php"
                        <button class="ui button fluid basic secondary labeled icon" >
                            <i class="configure icon"></i>
                            Configurações
                        </button>
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <div id="loader" class="ui basic segment hiddenloader">
            <div class="ui active loader"></div>
        </div>

        <div class="ui one cards" id="newposts">

        </div>

    </div>
</div>

<!-- Add post modal -->
<div class="ui small modal" id="postmodal">
    <div class="header" style="background-color: #556270; color: white;">
        Adicionar discussão
    </div>
    <form class="ui form basic segment">
        <div class="field">
            <label> <i class="icon tag"></i>Título</label>
            <div class="ui right icon input" id="Posttitleinput">
                <input type="text" placeholder="Título" name="title" id="Posttitle">
                <i class="icon"></i>
            </div>
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


<!-- Jquery scripts -->
<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/dashboard.js"></script>
</body>
