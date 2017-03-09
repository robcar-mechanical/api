<?php

namespace App\Helpers;

class Connection
{
    private static $instance;
    private $pdo;
    
    /**
     * Get an PDO instance
     * @return callable
     */
    public function getPdo()
    {
        if (!$this->pdo) {
            try {
                $this->pdo = new \PDO('mysql:host=localhost;dbname=api;charset=utf8', 'root', 'vagrant');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }
        
        return $this->pdo;
    }
    
    /**
     * Get an unique PDO instance
     * @return callable
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        
        return self::$instance;
    }
}