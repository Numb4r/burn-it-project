<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 30/06/2016
 * Time: 20:35
 */

require_once '../objects/users.php';
require_once '../utils/postrequired.php';
require_once '../cfg/userfnc.php';

UserIsNotLoggedIn();

if (POSTRequired(array("User", "Pass", "Realname"))) {

    if (!User::UserExists($_POST["User"])) {
        User::Register($_POST["User"], $_POST["Pass"], $_POST["Realname"]);
        echo "1";
    } else {
        echo "2";
    }
} else {
    echo "0";
}