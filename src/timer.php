<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



$app->get('/timer', function (Request $request, Response $response, $args) {
    $sql = "SELECT  * FROM timers";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $timer = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $timer = json_encode($timer[0]);
        $response->getBody()->write("$timer");
        return $response;
    } catch(PDOException $e){
        $errorMessage = '{"error": {"text": '.$e->getMessage().'}';
        $response->getBody()->write("$errorMessage");
        return $response;
    }
});