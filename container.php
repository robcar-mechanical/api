<?php

use App\Services\VehiclesService;

$container = $app->getContainer();

$container['vehiclesService'] = function($c) {
    return new VehiclesService($c->get('vehiclesService'));
};
