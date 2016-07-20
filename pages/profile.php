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
require_once '../objects/postQuery.php';

$GetUser = new User($_GET["id"]);
$CurrentUser = GetCurrentUserInfo();

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
<div style="height: 70px;"></div>
<div class="ui raised card" style="min-width: 100%; padding: 10px;">
    <div class="ui items">
        <div class="item">
            <div class="image">
                <?php if ($GetUser->ID == '16' or $GetUser->ID == '15') { ?>
                    <div class="ui corner left black icon label"><i class="icon terminal white"></i></div>
                    <?php ;
                } ?>
                <img src=<?php echo $GetUser->Image ?>>
            </div>
            <div class="content">
                <p class="header"><?php echo $GetUser->Name ?> - </p>
                <p class="sub header"><?php echo $GetUser->Email ?></p>
                <div class="meta">
                    <span><?php echo $GetUser->Description ?></span>
                </div>
                <div class="description">
                    <div class="label ui blue">
                        <i class="facebook icon"></i>
                        Facebook
                    </div>
                    <div class="label ui green">
                        <i class="deviantart icon"></i>
                        Deviantart
                    </div>
                </div>
                <div class="extra">
                    <div class="ui horizontal list">
                    <?php if ($GetUser->ID == '16') { ?>
                        <!-- tentativa de badge-->
                        <div class="item">
                            <i class="ui icon linux circular inverted black" data-content="oi" id="#idpopup"></i>
                         </div>
                        <d
                        <?php ; } ?>
                    </div>
                </div>

            </div>
            <div class="menu right">
            <div class="item ">
                <div class="ui statistic">
                    <div class="value">
                        <i class="star icon"></i>
                        90
                    </div>
                    <div class="label">Nível</div>
                </div>
                <?php if ($CurrentUser->ID == $GetUser->ID) { ?>
                    <a href="settings.php">
                        <button class="ui button fluid basic secondary labeled icon">
                            <i class="configure icon"></i>
                            Configurações
                        </button>
                    </a>
                    <?php ;
                } else { ?>
                    <a href="settings.php">
                        <button class="ui button fluid blue  labeled icon">
                            <i class="add user icon"></i>
                            Adicionar aos amigos
                        </button>
                    </a>
                    <a href="settings.php">
                        <button class="ui button fluid red labeled icon">
                            <i class="remove icon"></i>
                            Bloquear usuario
                        </button>
                    </a>
                    <?php ;
                } ?>
            </div>

        </div>
    </div>
    </div>
</div>


<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script >
    $('.tooltip')
        .popup()
    ;
    $(document).ready(function () {
        $('#idpopup').popup();
    });
</script>
<script src="../scripts/basic.js"></script>


</body>


