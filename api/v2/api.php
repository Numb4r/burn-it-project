<?php
require_once '../../vendor/autoload.php';
require_once '../../objects/users.php';
require_once '../../objects/MariaDB.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Application;

$app = new Silex\Application();

$app->GET('/mysql/select', function(Application $app, Request $request) {
    $table = $request->get('table');
    $json = json_encode(MariaDB::Select($table, "*"), JSON_PRETTY_PRINT);

    return new Response("<pre>".$json."</pre>");
});

$app->GET('/user', function(Application $app, Request $request) {
    $id = $request->get('id');
    $client = new User($id);
    $json = json_encode($client, JSON_PRETTY_PRINT);
    return new Response("<pre>".$json."</pre>");
});


$app->run();
