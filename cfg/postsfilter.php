<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 29/06/2016
 * Time: 21:37
 */

require_once '../cfg/core.php';
require_once '../cfg/cookiesfnc.php';
require_once '../cfg/databasefnc.php';

$conn = OpenCom();
if ($_GET["search"] == "") {
    $sql = "SELECT * FROM burnit.posts ORDER BY Date desc;";
} else {
    $sql = "SELECT * FROM posts WHERE `Description` LIKE \"%" . $_GET["search"] . "%\" OR `User` LIKE \"%" . $_GET["search"] . "%\" OR `Title` LIKE \"%" . $_GET["search"] . "%\";";
}
$result = $conn->query($sql);

function GetRandColor()
{
    $x = rand(1, 11);
    $colors = array('1' => "red",
        '2' => "orange",
        '3' => "yellow",
        '4' => "olive",
        '5' => "green",
        '6' => "teal",
        '7' => "blue",
        '8' => "violet",
        '9' => "purple",
        '10' => "brown",
        '11' => "black"
    );
    return $colors[$x];
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
//        echo "<a class=\"ui " . GetRandColor() . " card\" href=\"postview.php?id=" . $row["ID"] . "\">
//                        <div class=\"content\">
//                            <div class=\"header center aligned oneline\">" . $row["Title"] . "</div>
//                            <div class=\"meta\">
//                                <p class=\"category segmented fivelines\">" . $row["Description"] . "</p>
//                            </div>
//                        </div>
//                        <div class=\"extra content\">
//                            <div class=\"right floated author\">
//                                <img class=\"ui avatar image\" src=\"http://semantic-ui.com/images/avatar/large/helen.jpg\">" . $row["User"] . "
//                            </div>
//                        </div>
//                    </a>";
        $user = GetUserInfo($row["User"]);

        echo "        
<div class=\"ui card raised\" style=\"padding: 0px; margin: 6px; margin-top: 0px; border-radius: 0px;\">
<div class=\"content\">
   <a class=\"header\" href=\"postview.php?id=" . $row["ID"] . "\">".ucfirst($row["Title"])."</a>
   <div class=\"meta\">
      <a>".$user->Realname."</a>
   </div>
   <div class=\"description fivelines\">
      <p>".$row["Description"]."</p>
    </div>
</div>
<div class=\"extra content\">
   <span>
   Enviado em ".$row["Date"]."
   </span>
</div>
</div>
";
    }
} else {
    echo "Nenhum post encontrado.";
}
$conn->close();