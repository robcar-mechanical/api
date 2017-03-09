<?php

namespace App\Helpers;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Healthcheck {
    
    
    public function status(Request $request, Response $response)
    {
        $response->write('API it is good!');
        return $response;
    }
}