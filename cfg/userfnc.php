<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 29/06/2016
 * Time: 19:48
 */

require_once 'databasefnc.php';
require_once 'cookiesfnc.php';

function LogIn($u,$p)
{
    $password = md5($p);
    $result = IsLoginValid($u, $password);


    if($result[0])
    {
        setcookie("BUID", $result[1]->GetID(), 0, "/");
        UserIsLoggedIn();
    }
    else
    {
        return null;
    }
}

function LogOut($u,$p){
    unset($_COOKIE['BUID']);
    UserIsLoggedIn();
}

function GetCurrentUserInfo(){
    return GetUserInfo(GetCurrentUserID());
}