<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 30/06/2016
 * Time: 23:16
 */

require_once '../cfg/database.php';
require_once '../cfg/cookiesfnc.php';
require_once '../cfg/databasefnc.php';
require_once '../utils/postrequired.php';

UserIsLoggedIn();

function getDatetimeNow()
{
    $tz_object = new DateTimeZone("Brazil/East");

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}

if (POSTRequired(array("IsValid"))) {
    $title = $_POST["IsValid"];

    if (IsPostValid($title)) {
        echo "0";
    } else {
        echo "1";
    }
}else{

if (POSTRequired(array("Title", "Description", "Tags"))) {
    $title = $_POST["Title"];
    $desc = $_POST["Description"];
    $user = GetCurrentUserID();
    $tags = $_POST["Tags"];

    if (!IsPostValid($title)) {

        $conn = OpenCom();

        $sql = "INSERT INTO `posts`(`Title`, `Description`, `User`, `Tags`, `Date`) VALUES ('" . $title . "','" . $desc . "','" . $user . "','" . $tags . "','" . getDatetimeNow() . "')";
        if ($conn->query($sql) === false) {
            echo "2";
        } else {
            echo "1";
        }
        $conn->close();
    } else {
        echo "3";
    }

} else {
    echo "Not enough post info";
}
}

