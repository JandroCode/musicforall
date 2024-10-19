<?php

require_once 'environments/dev.php';
require_once 'environments/prod.php';

class Database {
    private $devEnvironment;
    private $prodEnvironment;

    public $conn; 


    public function __construct() {
        $this->devEnvironment = new DevEnvironment();
        // $this->prodEnvironment = new ProdEnvironment(); 
        // $config = $this->devEnvironment->getConnectionConfig(); 
        $config = $this->devEnvironment->getConnectionConfig(); 

        // Asignar las propiedades de la conexión
        $this->host = $config['host'];
        $this->db_name = $config['db_name'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }

    public function obtenerConexion() {
        $this->conn = null;  

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");

        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
