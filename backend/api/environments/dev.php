<?php

class DevEnvironment {
    private $host = "localhost";  
    private $db_name = "musicforall"; 
    private $username = "root";  
    private $password = "";  

    
    public function getConnectionConfig() {
        return [
            'host' => $this->host,
            'db_name' => $this->db_name,
            'username' => $this->username,
            'password' => $this->password
        ];
    }
}
