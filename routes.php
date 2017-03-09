<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

/**
 * Middleware to add application/json in header
 */
$app->add(function ($request, $response, $next) {
    $response = $next($request, $response);
    $response = $response->withHeader('Content-type', 'application/json');
    
    return $response;
});


/**
 * Healthcheck from API
 */
$app->get('/', 'App\Helpers\Healthcheck:status');

/**
 * Vechiles group, contain all vehicles possibilities
 */
$app->group('/vehicles', function () {
    $this->post('/', 'App\Controllers\VehiclesController:newVehicle');
    $this->get('/', 'App\Controllers\VehiclesController:getVehicles');
    $this->get('/{id}', 'App\Controllers\VehiclesController:getVehicle');
    $this->put('/{id}', 'App\Controllers\VehiclesController:editVehicle');
    $this->delete('/{id}', 'App\Controllers\VehiclesController:deleteVehicle');
});