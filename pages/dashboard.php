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
?>

<head>
    <meta charset="utf-8">
    <title>Burn it</title>

    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../semantic/dist/semantic.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>

<body onresize="">

<div class="ui inverted vertical masthead center aligned segment" style="padding-top: 0px;">
    <div class="container" >
        <!-- Header -->
        <div class="ui large secondary inverted pointing menu stackable" >
            <a class="item active">
                Postagens
            </a>
            <a class="item">
                Mensagens
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

        <img class="ui medium image centered" src="../imgs/burnitCortadoBranco.png">
    </div>
</div>

<div class="ui divider"></div>

<div class="ui cards posts stackable centered" style="padding-left: 10px; padding-right: 10px;">
    <?php
    include('../cfg/database.php');

    $conn = OpenCom();
    $sql = "SELECT * FROM posts";
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
        // output data of each row
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

</body>