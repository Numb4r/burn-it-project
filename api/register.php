<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 30/06/2016
 * Time: 20:35
 */

require_once '../cfg/database.php';
require_once '../cfg/databasefnc.php';
require_once '../cfg/cookiesfnc.php';
require_once '../utils/postrequired.php';
UserIsNotLoggedIn();

if(POSTRequired(array("User", "Pass", "Realname")))
{
    if(!IsUserValid($_POST["User"]))
    {
        RegisterUser($_POST["User"], $_POST["Pass"], $_POST["Realname"]);
        echo "1";
    }else{
        echo "2";
    }
}
else
{
    echo "0";
}