<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 27/06/2016
 * Time: 17:27
 */

require_once 'database.php';

class Comentario
{
    public $Texto;
    public $User;

    function __construct($tex, $u)
    {
        $this->Texto = $tex;
        $this->User = $u;
    }
}

class PostInfo
{
    public $Title;
    public $PostID;
    public $PostDescription;
    public $PostOriginUser;
}


class User
{
    public $ID;
    public $Email;
    public $Realname;
    public $Date;
}

function UserExists($user, $pass)
{
    $conn = OpenCom();

    $sql = "SELECT * FROM `users` WHERE `Username`=\"" . $user . "\" AND `Password`=\"" . $pass . "\"";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return true;
        }
    }

    $conn->close();

    return false;
}

function GetPostInfo($id)
{
    $conn = OpenCom();

    $sql = "SELECT * FROM `posts` WHERE `ID`='" . $id . "'";
    $result = $conn->query($sql);
    $returnItem = new PostInfo();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnItem->Title = $row["Title"];
            $returnItem->PostID = $row["ID"];
            $returnItem->PostDescription = $row["Description"];
            $returnItem->PostOriginUser = $row["User"];
        }
    }
    $conn->close();

    return $returnItem;
}

function GetPostComments($id)
{
    $conn = OpenCom();
    $PFavor = array();
    $PContra = array();

    $sql = "SELECT * FROM `coments` WHERE `PID`='" . $id . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["Favor"] == "1") {
                array_push($PFavor, new Comentario($row["Coment"], $row["User"]));
            } elseif ($row["Favor"] == "0") {
                array_push($PContra, new Comentario($row["Coment"], $row["User"]));
            }
        }
    }

    $conn->close();

    return array($PFavor, $PContra);
}

function GetUserInfo($id)
{
    $conn = OpenCom();

    $sql = "SELECT * FROM `users` WHERE `ID`='" . $id . "'";
    $result = $conn->query($sql);
    $returnItem = new User();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnItem->ID = ($row["ID"]);
            $returnItem->Email = ($row["Email"]);
            $returnItem->Realname = ($row["Realname"]);
            $returnItem->Date = ($row["Date"]);
        }
    } else {
        return null;
    }
    $conn->close();

    return $returnItem;
}

function IsLoginValid($u, $p)
{
    $conn = OpenCom();

    $sql = "SELECT * FROM `users` WHERE `Email`=\"" . $u . "\" AND `Password`=\"" . $p . "\"";;
    $result = $conn->query($sql);
    $returnItem = new User();
    $conn->close();

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $returnItem->ID = ($row["ID"]);
            $returnItem->Email = ($row["Email"]);
            $returnItem->Realname = ($row["Realname"]);
        }
    } else {
        return array(false, null);
    }

    return array(true, $returnItem);
}

function IsUserValid($u)
{
    $conn = OpenCom();

    $sql = "SELECT * FROM `users` WHERE `Email`='" . $u . "'";
    $result = $conn->query($sql);
    $conn->close();

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function IsUserIDValid($u)
{
    $conn = OpenCom();

    $sql = "SELECT * FROM `users` WHERE `ID`='" . $u . "'";
    $result = $conn->query($sql);
    $conn->close();

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function IsPostValid($postname)
{
    $conn = OpenCom();

    $sql = "SELECT * FROM `posts` WHERE `Title`='" . $postname . "'";
    $result = $conn->query($sql);
    $conn->close();

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function RegisterUser($email, $pass, $name)
{
    $conn = OpenCom();

    $sql = "INSERT INTO `users`(`Email`, `Password`, `Realname`) VALUES ('" . $email . "','" . $pass . "','" . $name . "')";

    if ($conn->query($sql) === false) {
        return false;
    } else {
        return true;
    }
    $conn->close();
}

function RegisterPost($title, $desc, $tags, $user)
{
    $conn = OpenCom();

    $sql = "INSERT INTO `posts`(`Title`, `Description`, `User`, `Tags`) VALUES ('" . $title . "','" . $desc . "','" . $user . "','" . $tags . "')";
    if ($conn->query($sql) === false) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}