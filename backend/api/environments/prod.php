<?php

class ProdEnvironment {
    private $host = "localhost";  
    private $db_name = "musicforall"; 
    private $username = "jandroco_musicforall";  
    private $password = "musicforall";  

    
    public function getConnectionConfig() {
        return [
            'host' => $this->host,
            'db_name' => $this->db_name,
            'username' => $this->username,
            'password' => $this->password
        ];
    }
}
