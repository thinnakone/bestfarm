<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);


require '../src/routes.php';
require '../src/mode.php';
require '../src/auto.php';
require '../src/data.php';
require '../src/manual.php';
require '../src/timer.php';
require '../src/insert.php';
require '../src/test.php';






$app->run();