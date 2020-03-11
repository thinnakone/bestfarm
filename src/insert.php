<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/insert/{temperature}/{humidity}/{soilmoiture}/{light}', function (Request $request, Response $response, $args) {
    date_default_timezone_set("Asia/Vientiane");
    $today = date("Y-m-d H:i:s");
    $temp = $request->getAttribute('temperature');
    $hum = $request->getAttribute('humidity');
    $soi = $request->getAttribute('soilmoiture');
    $ldr = $request->getAttribute('light');
    $sql = "INSERT INTO datas (id,date, temperature, humidity, soilmoiture, light )
    VALUES ('','$today', '$temp','$hum', '$soi', '$ldr')";

    try{
        $db = new db();
        $db = $db->connect();
        $stmt = $db->query($sql);
        $db = null;
        $response->getBody()->write("Successful");
        return $response;
    } catch(PDOException $e){
        $errorMessage = '{"error": {"text": '.$e->getMessage().'}';
        $response->getBody()->write(".$errorMessage.");
        return $response;
    }
});
