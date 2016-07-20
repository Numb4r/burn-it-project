<?php
/**
 * Created by IntelliJ IDEA.
 * User: marco
 * Date: 18/07/2016
 * Time: 13:12
 */

require_once '../utils/postrequired.php';
require_once '../cfg/userfnc.php';

UserIsLoggedIn();

$CurrentUser = new User(GetCurrentUserID());

if(POSTRequired(array("Desc"))){
    $CurrentUser->Description = $_POST["Desc"];
    $CurrentUser->Save();
}elseif(POSTRequired(array("GET"))){
    echo $CurrentUser->Description;
}