<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



$app->get('/manual', function (Request $request, Response $response, $args) {
    $sql = "SELECT  * FROM manuals ";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $manual = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $manual = json_encode($manual[0]);
        $response->getBody()->write("$manual");
        return $response;
    } catch(PDOException $e){
        $errorMessage = '{"error": {"text": '.$e->getMessage().'}';
        $response->getBody()->write("$errorMessage");
        return $response;
    }
});