<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 27/06/2016
 * Time: 19:53
 */

require_once '../cfg/core.php';

function UserIsLoggedIn()
{
    if (isset($_COOKIE["BUID"]) && IsUserIDValid($_COOKIE["BUID"])) {
        return true;
    } elseif (isset($_COOKIE["BUID"])) {
        unset($_COOKIE['BUID']);
    }

    header("Location: login.php");
}

function UserIsNotLoggedIn()
{
    if (isset($_COOKIE["BUID"]) && IsUserIDValid($_COOKIE["BUID"])) {
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