<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 01/07/2016
 * Time: 17:21
 */

require_once '../cfg/database.php';
require_once '../cfg/databasefnc.php';
require_once '../cfg/cookiesfnc.php';
require_once '../utils/postrequired.php';

UserIsNotLoggedIn();

function LogIn($u,$p)
{
    $password = md5($p);
    $result = IsLoginValid($u, $password);

    if($result[0])
    {
        setcookie("BUID", $result[1]->ID, 0, "/");
        return true;
    }
    else
    {
        return false;
    }
}

if(POSTRequired(array("User", "Pass")))
{
    if(LogIn($_POST["User"], $_POST["Pass"])) {
        echo "1";
    }else{
        echo "2";
    }
}
else
{
    echo "0";
}
