<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\VehiclesService;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\Vehicle;

class VehiclesController extends Controller
{
    
    private $vehiclesService;
    
    public function __construct($container) 
    {
        $this->vehiclesService = $container['vehiclesService'];
    }

    public function getVehicles(Request $request, Response $response)
    {
        $get = $this->vehiclesService->getAll();
        
        $response->write($get);
        return $response;
    }
    
    public function newVehicle(Request $request, Response $response)
    {
        $post = $request->getBody();

        $post = [
            'placa' => 'AEP-1234',
            'marca' => 'Fiat',
            'ano' => '2015',
            'combustivel' => 'Flex',
            'modelo' => 'Uno',
            'cor' => 'Branco'
        ];
        
        $this->vehiclesService->create(new Vehicle($post));
        
        $response->write($post);
        
        return $response;
    }
    
    public function getVehicle(Request $request, Response $response)
    {
        $response = $request->getAttribute('id');
        return $response;
    }
    
    public function editVehicle(Request $request, Response $response)
    {
        $response = $request->getAttribute('id');
        return $response;
    }
    
    public function deleteVehicle(Request $request, Response $response)
    {
        $response = $request->getAttribute('id');
        return $response;
    }
    
}