<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/test/{temperature, humidity}', function (Request $request, Response $response, $args) {
$temp = $request->getAttribute('humidity');

$response ->getBody()->write($temp);
return $response; 

});
