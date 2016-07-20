<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 01/07/2016
 * Time: 17:21
 */


require_once '../utils/postrequired.php';
require_once '../cfg/userfnc.php';
require_once '../objects/users.php';

UserIsNotLoggedIn();

function LogIn($u, $p)
{
    $password = md5($p);
    $result = new User("");
    $result->GetInfoFromLogin($u, $password);

    if ($result) {
        setcookie("BUID", $result->ID, 2000000000, "/");
        return true;
    } else {
        return false;
    }
}

if (POSTRequired(array("User", "Pass"))) {
    if (LogIn($_POST["User"], $_POST["Pass"])) {
        echo "1";
    } else {
        echo "2";
    }
} else {
    echo "0";
}
