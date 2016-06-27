<?php

require 'core.php';

$servername = "localhost";
$username = "root";
$password = "88134165";
$dbname = "burnit";

function OpenCom(){
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>