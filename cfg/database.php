<?php

require_once 'core.php';

$servername = "burn-it.ddns.net";
$username = "redbaty";
$password = "88134165";
$dbname = "burnit";

function OpenCom()
{
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

