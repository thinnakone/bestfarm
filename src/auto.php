<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



$app->get('/auto', function (Request $request, Response $response, $args) {
    $sql = "SELECT  * FROM autos ";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $auto = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $auto = json_encode($auto[0]);
        $response->getBody()->write("$auto");
        return $response;
    } catch(PDOException $e){
        $errorMessage = '{"error": {"text": '.$e->getMessage().'}';
        $response->getBody()->write("$errorMessage");
        return $response;
    }
});