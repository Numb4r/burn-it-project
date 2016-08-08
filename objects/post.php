<?php

/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 05/07/2016
 * Time: 23:19
 */

require_once 'users.php';
require_once 'database.php';
require_once 'log.php';

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

class Post
{
    public $Title;
    public $ID;
    public $Description;
    public $User;
    public $Comments;
    public $Date;

    function __construct($id)
    {
        if (!empty($id)) {
            $this->ID = $id;
            Log::LogString("Criando post: " . $id);
            $this->GetInfoByID();
        }
    }

    function GetInfoByID()
    {
        $conn = OpenCom();

        $sql = "SELECT * FROM `posts` WHERE `ID`='" . $this->ID . "'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $this->GetInfoFromResult($result);
        }
        $conn->close();

        //$this->GetComments();
    }

    function GetInfoFromResult($result)
    {
        while ($row = $result->fetch_assoc()) {
            $this->Title = $row["Title"];
            $this->ID = $row["ID"];
            $this->Description = $row["Description"];
            $this->User = new User($row["User"]);
            $this->Date = $row["Date"];

            Log::LogString("POST[" . $this->ID . "]: Informações obtidas : " . print_r($this, true));
        }
    }

    function GetComments()
    {
        $conn = OpenCom();
        $PFavor = array();
        $PContra = array();

        $sql = "SELECT * FROM `coments` WHERE `PID`='" . $this->ID . "'";
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

        $this->Comments = array($PFavor, $PContra);
    }

    public static function Exists($name)
    {
        $conn = OpenCom();

        $sql = "SELECT * FROM `posts` WHERE `Title`='" . $name . "'";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function Register($title, $desc, $tags, $user)
    {
        $conn = OpenCom();

        $sql = "INSERT INTO `posts`(`Title`, `Description`, `User`, `Tags`) VALUES ('" . $title . "','" . $desc . "','" . $user . "','" . $tags . "')";
        if ($conn->query($sql) === false) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    public static function Search($searchstr, $user)
    {
        $conn = OpenCom();

        $userpiece = !empty($user) ? "`User`=\"" . $user . "\"": "";
        $postpiece = !empty($searchstr) ? "`Title` LIKE '%" . $searchstr . "%'" : "";
        $where = "WHERE ";
        if (empty($userpiece) && empty($postpiece)) {
            $where = "";
        }

        $sql = "SELECT ID,User,Title,Date FROM posts " . $where . $userpiece . $postpiece . " ORDER BY Date desc;";

        $resultArray = array();

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $resultArray[] = json_encode(new Post($row['ID']), true);
        }
        $conn->close();

        return $resultArray;
    }
}
