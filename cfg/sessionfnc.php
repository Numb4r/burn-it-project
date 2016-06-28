<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 27/06/2016
 * Time: 19:53
 */

require_once '../cfg/core.php';

function IsLogged(){
    if(isset($_SESSION["UserID"]) && GetUserInfo($_SESSION["UserID"]) != null){
        return true;
    }

    return false;
}

function RegisterUserInSession($uid){
    $_SESSION[$uid];
}

function GetCurrentUserID(){
    if(IsLogged()){return $_SESSION["UserID"];}
    else{
        header("Location: login.php");
    }
}