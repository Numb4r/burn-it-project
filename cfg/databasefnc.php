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
    var $Texto;
    var $User;

    function Comentario($tex, $u)
    {
        $this->Texto = $tex;
        $this->User = $u;
    }

    function GetUser()
    {
        return $this->User;
    }

    function GetCom()
    {
        return $this->Texto;
    }
}

class PostInfo
{
    public $Title;
    public $PostID;
    public $PostDescription;
    public $PostOriginUser;

    function GetTitle()
    {
        return $this->Title;
    }

    function GetId()
    {
        return $this->PostID;
    }

    function GetDescription()
    {
        return $this->PostDescription;
    }

    function GetPostOriginUser()
    {
        return $this->PostOriginUser;
    }

    function SetTitle($value)
    {
        $this->Title = $value;
    }

    function SetId($value)
    {
        $this->PostID = $value;
    }

    function SetDescription($value)
    {
        $this->PostDescription = $value;
    }

    function SetPostOriginUser($value)
    {
        $this->PostOriginUser = $value;
    }
}

class User
{
    public $ID;
    public $Username;
    public $Realname;

    function SetID($value)
    {
        $this->ID = $value;
    }

    function SetUsername($value)
    {
        $this->Username = $value;
    }

    function SetRealname($value)
    {
        $this->Realname = $value;
    }

    function GetID()
    {
        return $this->ID;
    }

    function GetUsername()
    {
        return $this->Username;
    }

    function GetRealname()
    {
        return $this->Realname;
    }
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

    $sql = "SELECT * FROM `posts` WHERE `ID`=" . $_GET["id"];
    $result = $conn->query($sql);
    $returnItem = new PostInfo();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnItem->SetTitle($row["Title"]);
            $returnItem->SetId($row["ID"]);
            $returnItem->SetDescription($row["Description"]);
            $returnItem->SetPostOriginUser($row["User"]);
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

    $sql = "SELECT * FROM `coments` WHERE `PID`=" . $id;
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

    $sql = "SELECT * FROM `users` WHERE `ID`=" . $id;
    $result = $conn->query($sql);
    $returnItem = new User();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $returnItem->SetID($row["ID"]);
            $returnItem->SetUsername($row["Username"]);
            $returnItem->SetRealname($row["Realname"]);
        }
    }
    $conn->close();

    return $returnItem;
}