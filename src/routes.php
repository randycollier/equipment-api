<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET');
});

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/what/what', function (Request $request, Response $response, array $args) {
    // Sample log message
    $response->withHeader('Content-type', 'application/json');
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    // return $this->renderer->render($response, 'index.phtml', $args);
    $data = array('name' => 'Bob', 'age' => 40);
    return $response->withJson($data);
});



$app->get('/equipment/list', function (Request $request, Response $response, array $args) {
	$response->withHeader('Content-type', 'application/json');

	$sql = "select equipmentID, category from equipment ";
    $pdo = $this->db;
    $query = $pdo->prepare($sql);
    $query->execute();

    $equipmentData = array();

	while($row=$query->fetch(PDO::FETCH_ASSOC)){
       $equipmentData[] = $row;
	}

	$myjson = json_encode($equipmentData);

    return $response->withJson($equipmentData, 201);
});


$app->get('/equipment/id/{id}', function (Request $request, Response $response, array $args) {
    $pdo = $this->db;
    $stmt = $pdo->prepare('SELECT * FROM equipment WHERE equipmentID = ? ');
    $stmt->execute([$args['id']]);
    $equipment = $stmt->fetch();
    return $response->withJson($equipment , 201);
});


