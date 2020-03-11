<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



$app->get('/data', function (Request $request, Response $response, $args) {
    $sql = "SELECT * FROM datas";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        $data = json_encode($data[0]);
        $response->getBody()->write("$data");
        return $response;
    } catch(PDOException $e){
        $errorMessage = '{"error": {"text": '.$e->getMessage().'}';
        $response->getBody()->write("$errorMessage");
        return $response;
    }
});