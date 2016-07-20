<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 29/06/2016
 * Time: 19:48
 */

require_once '../objects/users.php';

function UserLogIn($u, $p)
{
    $password = md5($p);
    $result = new User("");
    $result->GetInfoFromLogin($u, $password);


    if ($result[0]) {
        setcookie("BUID", $result[1]->GetID(), 0, "/");
        UserIsLoggedIn();
    } else {
        return null;
    }
}

function UserLogOut()
{
    unset($_COOKIE['BUID']);
    UserIsLoggedIn();
}

function GetCurrentUserInfo()
{
    return new User(GetCurrentUserID());
}

function UserIsLoggedIn()
{
    if (isset($_COOKIE["BUID"]) && User::IDExists($_COOKIE["BUID"])) {
        return true;
    }

    EraseCookie("BUID");
    header("Location: login.php");
}

function EraseCookie($cookiename)
{
    if (isset($_COOKIE[$cookiename])) {
        unset($_COOKIE[$cookiename]);
        setcookie($cookiename, null, -1, '/');
    }
}

function UserIsNotLoggedIn()
{
    if (isset($_COOKIE["BUID"]) && User::IDExists($_COOKIE["BUID"])) {
        header("Location: dashboard.php");
    }
}

function CookieRegisterUser($uid)
{
    setcookie("BUID", $uid);
}

function GetCurrentUserID()
{
    UserIsLoggedIn();
    return $_COOKIE["BUID"];
}
