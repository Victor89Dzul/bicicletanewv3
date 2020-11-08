<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Config;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../Config/datebase.php';

$app = AppFactory::create();
$app ->setBasePath('/bicicletav3/api');

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/user', function (Request $request, Response $response, $args) {
    $users = Capsule::table('users')->get();
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();