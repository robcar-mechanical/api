<?php

namespace App\Services;

use App\Helpers\Connection as Connection;
use App\Services\Service;

use App\Models\Vehicle;

class VehiclesService extends Service 
{
    public function getAll()
    {

    }
    
    public function create(Vehicle $vehicle)
    {
        $pdo = Connection::getInstance()->getPdo();
        
        $query = 'INSERT INTO veiculo VALUES(:marca, :ano, :placa, :combustivel, :modelo, :cor)';
        
        $result = $pdo->prepare($query);
        
        $result->bindValue(':marca', $vehicle->getMarca(), PDO::PARAM_STR);
        $result->bindValue(':ano', $vehicle->getAno(), PDO::PARAM_STR);
        $result->bindValue(':placa', $vehicle->getPlaca(), PDO::PARAM_STR);
        $result->bindValue(':combustivel', $vehicle->getCombustivel(), PDO::PARAM_STR);
        $result->bindValue(':modelo', $vehicle->getModelo(), PDO::PARAM_STR);
        $result->bindValue(':cor', $vehicle->getCor(), PDO::PARAM_STR);
        
        $result->execute();
    }
}