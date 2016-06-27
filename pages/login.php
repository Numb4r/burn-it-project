<?php
/**
 * Created by PhpStorm.
 * User: MVMCJ
 * Date: 26/06/2016
 * Time: 23:12
 */
require 'core.php';
require 'database.php';
$conn = OpenCom();

if(isset($_SESSION["UserID"])){
    echo 'XD: '.$_SESSION["UserID"];
}

if (isset($_POST["uid"]) && isset($_POST["pass"])) {
    $user = $_POST["uid"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM `users` WHERE `Username`=\"" . $user . "\" AND `Password`=\"" . $pass . "\"";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["UserID"] = $row["ID"];
            echo 'Logged in';
        }
    } else {
        echo 'U & P Wrong';
    }

    $conn->close();
}

?>

<form action="login.php" method="POST">
    Username: <input type="text" name="uid" id="uid">
    Password: <input type="text" name="pass" id="pass">
    <input type="submit" value="Log in">
</form>
