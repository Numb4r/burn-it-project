<?php
/**
 * Created by IntelliJ IDEA.
 * User: marco
 * Date: 15/07/2016
 * Time: 20:44
 */

require_once '../cfg/userfnc.php';
require_once '../objects/users.php';

$CurrentUser = new User(GetCurrentUserID());
?>

<head>
    <link rel="stylesheet" type="text/css" href="../semantic/dist/semantic.css">
</head>
<body>
<div class="ui top fixed menu">

    <a class="ui item back" href="../pages/dashboard.php">
        <i class="angle large left icon"></i>
    </a>

    <div class="ui borderless item">
        <div class="ui search">
            <div class="ui icon input" id="iUi" style="width: 400px;">
                <input class="prompt" type="text" ID="iSearch" placeholder="Pesquisar..."
                       style="-webkit-border-radius: 0 !important;-moz-border-radius: 0 !important; border-radius: 0 !important;">
                <i class="search link icon"></i>
            </div>
            <div class="results"></div>
        </div>
    </div>


    <div class="right menu">
        <div class="borderless item">
            <button class="circular basic primary ui dropdown icon button">
                <i class="icon alarm outline"></i>
                <div class="floating ui red label">2</div>

                <div class="menu">
                    <div class="item">
                        <span class="text">Notificação 1</span>
                    </div>
                    <div class="item">
                        <span class="text">Notificação 2</span>
                    </div>
                </div>
            </button>
        </div>

        <div class="ui item dropdown" style="padding-bottom: 5px; padding-top: 5px; padding-right: 2px;">
            <img src=<?php echo $CurrentUser->Image ?>
                 class="ui avatar image">
            <i class="icon caret down"></i>
            <div class="menu">
                <a class="item" href="../pages/settings.php">Configurações</a>
                <div class="divider"></div>
                <a class="item" href="../pages/logout.php">Sair</a>
            </div>
        </div>

    </div>
</div>

<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/skeleton.js"></script>

</body>
