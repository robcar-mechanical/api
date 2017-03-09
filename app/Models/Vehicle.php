<?php

namespace App\Models;

class Vehicle 
{
    private $id;
    private $placa;
    private $marca;
    private $modelo;
    private $cor;
    private $combustivel;
    private $ano;
    
    public function __construct($vehicle) 
    {
        
        if(!is_array($vehicle)) {
            throw new Exception('Veículo não é do tipo esperado');
        }
        
        $this->placa = $vehicle['placa'];
        $this->marca = $vehicle['marca'];
        $this->ano = $vehicle['ano'];
        $this->combustivel = $vehicle['combustivel'];
        $this->modelo = $vehicle['modelo'];
        $this->cor = $vehicle['cor'];
    }
    
    public function getId() 
    {
        return $this->id;
    }

    public function getPlaca() 
    {
        return $this->placa;
    }

    public function getMarca() 
    {
        return $this->marca;
    }

    public function getModelo() 
    {
        return $this->modelo;
    }

    public function getCor() 
    {
        return $this->cor;
    }

    public function getCombustivel() 
    {
        return $this->combustivel;
    }

    public function getAno() 
    {
        return $this->ano;
    }
}