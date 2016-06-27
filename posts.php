<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 02:31
 */ ?>

<head>
    <meta charset="utf-8">
    <title>Burn it</title>

    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="semantic/dist/semantic.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>

<body onresize="ResizeFnc()">

<script>
    function ResizeFnc() {
        if (w < window.outerWidth) {
            $('.posts').addClass('centered');
        } else {
            if ($('.posts').hasClass('centered')) {
                $('.posts').removeClass('centered');
            }
        }
    }
</script>
<div class="container">
    <!-- Header -->
    <div class="ui stackable menu">
        <div class="item">
            <img src="http://etc.usf.edu/presentations/extras/letters/fridge_magnets/orange/12/b-400.png">
        </div>
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


    <!-- Posts -->
    <div class="ui cards posts stackable" style="padding-left: 10px; padding-right: 10px;">
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "burnit";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM posts";
        $result = $conn->query($sql);

        function GetRandColor()
        {

            /**
             * red
             * orange
             * yellow
             * olive
             * green
             * teal
             * blue
             * violet
             * purple
             * pink
             * brown
             * grey
             * black
             */

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
                <img class=\"ui avatar image\" src=\"http://semantic-ui.com/images/avatar/large/helen.jpg\">".$row["User"]."
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
</div>

<script src="jquery.min.js"></script>

</body>