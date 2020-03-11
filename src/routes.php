<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response, $args) {
    $response ->getBody()->write("{\"id\": \"1\",\"name\": \"auto\",\"status\": \"0\"}");
    return $response;
});





