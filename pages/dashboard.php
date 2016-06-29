<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 02:31
 */
require_once '../cfg/core.php';
require_once '../cfg/sessionfnc.php';
require_once '../cfg/databasefnc.php';

if (isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['tags'])) {
    $NPTitle = $_POST['title'];
    $NPDesc = $_POST['desc'];
    $NPTags = $_POST['tags'];

    if (!empty($NPTitle) && !empty($NPDesc) && !empty($NPTags)) {
        $cUser = GetUserInfo(GetCurrentUserID());
        RegisterPost($NPTitle, $NPDesc, $NPTags, $cUser->GetRealname());
    }

    header("Location: dashboard.php");
}


?>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Burn it</title>


    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>

<body onresize="">

<div class="ui large top fixed hidden menu" style="display: none;">

    <a class="item disabled" style="font-family: 'Lobster', cursive;">
        Burn-it
    </a>
    <a class="item active">
        Postagens
    </a>
    <a class="item">
        Mensagens
    </a>
    <a class="item">
        Amigos
    </a>
</div>

<div class="ui vertical inverted sidebar menu">
    <a class="item active">Postagens</a>
    <a class="item">Mensagens</a>
    <a class="item">Amigos</a>
</div>

<div class="ui inverted vertical masthead center aligned segment landing-image" style="padding-top: 0px;">
    <div class="container">
        <div class="ui large secondary inverted pointing menu" style="border-color: transparent">
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

        <img class="ui medium image centered" src="../imgs/burnitCortadoBranco.png">
    </div>
</div>

<div class="ui divider" style="padding-bottom: 0px; padding-top: 0px;"></div>

<div align="center" style="padding-top: 10px; padding-bottom: 10px; ">
    <button class="ui positive basic button switch icon" id="postbtn" data-tooltip="Adicionar uma discussão"><i
            class="add icon"></i>
        Adicionar
    </button>

    <div class="ui selection dropdown">
        <input type="hidden" name="gender">
        <i class="dropdown icon"></i>
        <div class="default text">Ordem</div>
        <div class="menu">
            <div class="item" data-value="1">De postagem</div>
            <div class="item" data-value="0">Por categoria</div>
        </div>
    </div>
</div>

<div class="ui middle aligned center aligned grid" id="postform" style="display: none;">
    <div class="column">
        <form class="ui large form" method="POST" action="" autocomplete="off">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="title" placeholder="Título">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="file text icon"></i>
                        <input type="text" name="desc" placeholder="Descrição">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="tags icon"></i>
                        <input type="text" name="tags" placeholder="Tags">
                    </div>
                </div>
                <div class="ui buttons">
                    <div class="ui button switch">Cancelar</div>
                    <div class="or" data-text="ou"></div>
                    <button class="ui positive button" type="submit">Postar</button>
                </div>
            </div>

            <div class="ui error message"></div>
        </form>
    </div>
</div>

<div class="ui divider"></div>

<div class="ui cards posts stackable centered" style="padding-left: 10px; padding-right: 10px;">
    <?php
    include('../cfg/database.php');

    $conn = OpenCom();
    $sql = "SELECT * FROM posts ORDER BY ID DESC";
    $result = $conn->query($sql);

    function GetRandColor()
    {
        $x = rand(0, 11);
        switch ($x) {
            case 0:
                return "red";
            case 1:
                return "orange";
            case 2:
                return "yellow";
            case 3:
                return "olive";
            case 4:
                return "green";
            case 5:
                return "teal";
            case 6:
                return "blue";
            case 7:
                return "violet";
            case 8:
                return "purple";
            case 9:
                return "brown";
            default:
                return "black";
        }
        return "red";
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<a class=\"ui " . GetRandColor() . " card\" href=\"post.php?id=" . $row["ID"] . "\">
                        <div class=\"content\">
                            <div class=\"header center aligned oneline\">" . $row["Title"] . "</div>
                            <div class=\"meta\">
                                <p class=\"category segmented\">" . $row["Description"] . "</p>
                            </div>
                        </div>
                        <div class=\"extra content\">
                            <div class=\"right floated author\">
                                <img class=\"ui avatar image\" src=\"http://semantic-ui.com/images/avatar/large/helen.jpg\">" . $row["User"] . "
                            </div>
                        </div>
                    </a>";
        }
    } else {
        echo "No posts here";
    }
    $conn->close();

    ?>

</div>

<script src="../scripts/jquery.min.js"></script>
<script src="../semantic/dist/semantic.js"></script>
<script src="../scripts/dashboard.js"></script>

</body>