<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



$app->get('/mode', function (Request $request, Response $response, $args) {
    $sql = "SELECT  * FROM modes where status = 1";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $mode = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $mode = json_encode($mode[0]);
        $response->getBody()->write("$mode");
        return $response;
    } catch(PDOException $e){
        $errorMessage = '{"error": {"text": '.$e->getMessage().'}';
        $response->getBody()->write("$errorMessage");
        return $response;
    }
});