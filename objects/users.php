<?php

/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 05/07/2016
 * Time: 23:01
 */

require_once 'database.php';
require_once 'MariaDB.php';

class User
{
    public $ID;
    public $Email;
    public $Name;
    public $Date;
    public $Image;
    public $vBool;
    public $Description;

    function __construct($id)
    {
        if (!empty($id)) {
            $this->ID = $id;
            $this->GetInfoByID();
        }
    }

    function GetInfoByID()
    {
        $q = new SQLSyntax(array(
            array("SELECT",
                array("ID", "Email", "Realname", "Date", "Image", "vBool", "Description")),
            array("FROM", "users"),
            array("WHERE", "ID=" . $this->ID)));

        $this->GetInfoFromResult($q->Query()->Value);
    }

    function GetInfoFromResult($result)
    {
        while ($row = $result->fetch_assoc()) {
            $this->ID = ($row["ID"]);
            $this->Email = ($row["Email"]);
            $this->Name = strip_tags($row["Realname"]);
            $this->Date = ($row["Date"]);
            $this->vBool = ($row["vBool"]);
            $this->Image = ($row["Image"]);
            $this->Description = strip_tags(($row["Description"]));
        }
    }

    function GetInfoFromLogin($u, $p)
    {
        $q = new SQLSyntax(array(
            array("SELECT",
                array("ID", "Email", "Realname", "Date", "Image", "vBool", "Description")),
            array("FROM", "users"),
            array("WHERE", array("Email='" . $u . "' AND Password='" . $p . "'"))));

        $this->GetInfoFromResult($q->Query()->Value);
    }

    function ChangeImage($newimage)
    {
        $q = new SQLSyntax(array(
            array("UPDATE", "users"),
            array("SET", array("Image='" . $newimage . "'")),
            array("WHERE", "ID=" . $this->ID)));

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
                    "Description='" . addslashes($this->Description) . "'"
                )
            ),
            array("WHERE", "ID=" . $this->ID)));
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

        $sql = "SELECT * FROM `users` WHERE BINARY `ID`='" . $id . "'";
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

        $sql = "INSERT INTO `users`(`Email`, `Password`, `Realname`) VALUES ('" . $email . "','" . md5($pass) . "','" . $name . "')";
        $resultBool = $conn->query($sql);
        $conn->close();

        if ($resultBool === false) {
            return false;
        } else {
            return true;
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