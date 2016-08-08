<?php

/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 05/07/2016
 * Time: 23:01
 */

require_once 'database.php';
require_once 'MariaDB.php';

class Badge
{
    public $Class;
    public $Color;
    public $Description;

    public function __construct($c, $d, $color = "black")
    {
        $this->Class = $c;
        $this->Description = $d;
        $this->Color = $color;
    }
}

class User
{
    public $ID;
    public $Email;
    public $Name;
    public $Date;
    public $Image;
    public $vBool;
    public $Description;
    public $Level;
    public $Badges;
    public $Theme;

    private $SelectSyntaxes = array(
        "all" => array("UID", "Email", "Realname", "Date", "Image", "vBool", "Description", "Level", "Badges", "Theme")
    );

    function __construct($id)
    {
        if (!empty($id)) {
            $this->ID = $id;
            $this->GetInfoByID();
        }
    }

    function GetInfoByID()
    {
        $q = new SQLSyntax(array(array("SELECT", $this->SelectSyntaxes["all"]), array("FROM", "users"),
            array("WHERE", "UID=\"" . $this->ID . "\"")));


        $this->GetInfoFromResult($q->Query());
    }


    function GetInfoFromResult($queryResult)
    {
        if (!isset($queryResult) || $queryResult->Value === false) {
            die($queryResult->Error . "<br/>" . $queryResult->SQLString);
        }

        $result = $queryResult->Value;

        while ($row = $result->fetch_assoc()) {
            $this->ID = ($row["UID"]);
            $this->Email = ($row["Email"]);
            $this->Name = strip_tags($row["Realname"]);
            $this->Date = ($row["Date"]);
            $this->vBool = ($row["vBool"]);
            $this->Image = ($row["Image"]);
            $this->Description = strip_tags(($row["Description"]));
            $this->Level = ($row["Level"]);
            $this->Badges = json_decode($row["Badges"]);
            $this->Theme = ($row["Theme"]);
        }
    }

    function GetInfoFromLogin($u, $p)
    {
        $q = new SQLSyntax(array(
            array("SELECT", $this->SelectSyntaxes["all"]),
            array("FROM", "users"),
            array("WHERE", array("Email='" . $u . "' AND Password='" . $p . "'"))));

        $this->GetInfoFromResult($q->Query());
    }

    function ChangeImage($newimage)
    {
        $q = new SQLSyntax(array(
            array("UPDATE", "users"),
            array("SET", array("Image='" . $newimage . "'")),
            array("WHERE", "UID=\"" . $this->ID . "\"")));

        $q->Query();
    }

    function Save()
    {
        $q = new SQLSyntax(array(
            array("UPDATE", "users"),
            array("SET",
                array(
                    "Image='" . $this->Image . "'",
                    "Realname='" . addslashes($this->Name) . "'",
                    "Date='" . $this->Date . "'",
                    "Description='" . addslashes($this->Description) . "'",
                    "Badges='" . json_encode($this->Badges) . "'"
                )
            ),
            array("WHERE", "UID=\"" . $this->ID . "\"")));
        $q->Query();
    }


    public static function Exists($user, $pass)
    {
        $conn = OpenCom();

        $sql = "SELECT * FROM `users` WHERE `Username`=\"" . $user . "\" AND `Password`=\"" . $pass . "\"";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        $conn->close();

        return false;
    }

    public static function UserExists($user)
    {
        $conn = OpenCom();

        $sql = "SELECT * FROM `users` WHERE `Email`='" . $user . "'";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function IDExists($id)
    {
        $conn = OpenCom();

        $sql = "SELECT * FROM `users` WHERE BINARY `UID`='" . $id . "'";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function Register($email, $pass, $name)
    {
        $conn = OpenCom();

        $sql = "INSERT INTO `users`(`Email`, `Password`, `Realname`) VALUES ('" . $email . "','" . $pass . "','" . $name . "')";
        $resultBool = $conn->query($sql);
        $conn->close();

        if ($resultBool === false) {
            return false;
        } else {
            return true;
        }
    }

    public static function IsLoggedIn()
    {
        if (isset($_COOKIE["BUID"]) && User::IDExists($_COOKIE["BUID"])) {
            return true;
        } else {
            return false;
        }
    }

    public static function LogOut()
    {
        setcookie("BUID", "", time() - 3600, "/");
        header("Location: /index.php");
    }

    public static function GetCurrentInfo()
    {
        if (self::IsLoggedIn()) {
            return new User(self::GetCurrentID());
        }
    }

    public static function GetvKey($id)
    {
        $q = new SQLSyntax(array(
            array("SELECT",
                array("vKey")),
            array("FROM", "users"),
            array("WHERE", "UID=\"" . $id . "\"")));

        while ($row = $q->Query()->Value->fetch_assoc()) {
            return $row["vKey"];
        }
    }

    public static function GetCurrentID()
    {
        if (self::IsLoggedIn()) {
            return $_COOKIE["BUID"];
        }
    }

    public static function ValidateEmail($key)
    {
        $conn = OpenCom();

        $sql = "UPDATE `users` SET `vBool` = 1 WHERE vKey = '" . $key . "'";
        if ($conn->query($sql) === false) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}