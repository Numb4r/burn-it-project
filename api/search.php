<?php
/**
 * Created by IntelliJ IDEA.
 * User: marco
 * Date: 18/07/2016
 * Time: 17:00
 */


require_once '../cfg/userfnc.php';
require_once '../objects/users.php';
require_once '../objects/post.php';
require_once '../objects/log.php';

class SearchObject
{
    public $Title;
    public $Link;
    public $description;

    public function __construct($title, $link, $desc)
    {
        $this->Title = $title;
        $this->Link = $link;
        $this->description = $desc;
    }
}

class Category
{
    public $name;
    public $results;

    public function __construct($name, $r)
    {
        $this->name = $name;
        $this->results = $r;
    }

}

$resultArray = array();
$userArray = array();
$postArray = array();

$conn = OpenCom();
$sql = "SELECT ID,Realname,Description FROM users WHERE Realname LIKE '%" . $_GET["s"] . "%' OR Description LIKE '%" . $_GET["s"] . "%' ORDER BY Date desc;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userArray[] = new SearchObject(ucfirst($row["Realname"]), "../pages/profile.php?id=" . $row["ID"], $row["Description"]);
    }
}


$sql = "SELECT ID,Title,Description FROM posts WHERE Title LIKE '%" . $_GET["s"] . "%' OR Description LIKE '%" . $_GET["s"] . "%' ORDER BY Date desc;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $postArray[] = new SearchObject(ucfirst($row["Title"]), "../pages/postview.php?id=" . $row["ID"], $row["Description"]);
    }
}

$conn->close();

if (!empty($userArray) || !empty($postArray)) {
    $resultVar = array("results" => array(
        "category1" =>
            new Category("Usuarios", $userArray),
        "category2" =>
            new Category("Discussões", $postArray)));
} else {
    $resultVar = array("results" => array());
}
print_r(json_encode($resultVar, JSON_PRETTY_PRINT));