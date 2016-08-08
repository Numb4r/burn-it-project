<?php
require_once '../../vendor/autoload.php';
require_once '../../objects/users.php';
require_once '../../objects/MariaDB.php';
require_once '../../utils/postrequired.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

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


function SendEmail($CurrentUser){


    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->CharSet = 'UTF-8';
    $mail->Username = "burnitweb@gmail.com";
    $mail->Password = "88134165";
    $mail->setFrom('noreply@burnit.com', 'Burn-it');
    $mail->addAddress($CurrentUser->Email, 'Usuário burn-it');
    $mail->Subject = 'Verificação do burn-it';
    $mail->msgHTML(
        "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
  <title>PHPMailer Test</title>
</head>
<body>
<div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;\">
  <div align=\"center\">
    <a href=\"http://burn-it.ddns.net\"><img src=\"http://burn-it.ddns.net/imgs/burnitOutlined.png\" height='300'></a>
 </a>
  </div>
  <div align='center'>
  <h3>Por favor, verifique seu e-mail clicando <a href=\"http://burn-it.ddns.net/pages/dashboard.php?verif=". User::GetvKey($CurrentUser->ID)."\">aqui</a>.</h3>
</div>
</div>
</body>
</html>");

    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

function Search($str)
{

    $resultArray = array();
    $userArray = array();
    $postArray = array();
    $searchString = $str;

    $conn = OpenCom();
    $sql = "SELECT UID,Realname,Description FROM users WHERE Realname LIKE '%" . $searchString . "%' OR Description LIKE '%" . $searchString . "%' ORDER BY Date desc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userArray[] = new SearchObject(ucfirst($row["Realname"]), "../pages/profile.php?id=" . $row["UID"], $row["Description"]);
        }
    }


    $sql = "SELECT ID,Title,Description FROM posts WHERE Title LIKE '%" . $searchString . "%' OR Description LIKE '%" . $searchString . "%' ORDER BY Date desc;";
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
    return json_encode($resultVar, JSON_PRETTY_PRINT);
}


$app = new Silex\Application();
$app['debug'] = true;

$app->GET('/user/{id}', function(Application $app, Request $request) {
    $id = $request->get('id');
    $client = new User($id);
    $json = json_encode($client, JSON_PRETTY_PRINT);
    $response = new Response($json);
    $response->headers->set('Content-Type', 'application/json');
    return $response;
});

$app->GET('/user/sendemail/', function(Application $app, Request $request) {
    if(User::IsLoggedIn()) {
        $CurrentUser = User::GetCurrentInfo();
        if($CurrentUser->vBool != "1") {
            $emailRequest = SendEmail($CurrentUser);
            $json = json_encode(array("success" => ($emailRequest ? "true" : "false")), JSON_PRETTY_PRINT);
            $response = new Response($json);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }
    $app->abort(330, "User is not logged in or is already verified.");
});

$app->GET('/user/register/', function(Application $app, Request $request) {
    $email = $request->get('e');
    $passw = $request->get('p');
    $name = $request->get('n');

    if (!isset($email) || !isset($passw) || !isset($name)) {
        $app->abort(404, "Not enough data provided.");
    }


    User::Register($email,$passw,$name);
    $json = json_encode(array("success" => "true"), JSON_PRETTY_PRINT);
    $response = new Response($json);
    $response->headers->set('Content-Type', 'application/json');
    return $response;
});

$app->GET('/search', function(Application $app, Request $request) {
    $searchstr = $request->get('s');

    if (!isset($searchstr)) {
        $app->abort(404, "Not enough data provided.");
    }
    $response = new Response(Search($searchstr));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
});


$app->run();

?>

