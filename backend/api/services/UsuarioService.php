<?php

include_once 'config/database.php';
include_once 'config/headers.php';
include_once 'DAOs/usuarioDAO.php';

class UsuarioService {

    private $usuarioDAO;

    // Constructor de la clase UsuarioService
    public function __construct() {

        $con = new DataBase();
        $db = $con->obtenerConexion();


        $this->usuarioDAO = new UsuarioDAO($db);


        $method = $_SERVER['REQUEST_METHOD'];
        $input = json_decode(file_get_contents("php://input"));

     
    }

    public function obtenerUsuarios() {
        $stmt = $this->usuarioDAO->obtenerUsuarios();
        $usuariosArray = [];  // Asegúrate de inicializar este array

        // Recorrer los resultados y agregar a la lista de usuarios como objetos
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Formatear cada usuario como un objeto anónimo
            $user_item = (object) [
                "id" => $row['id'],
                "username" => $row['username']
            ];
            array_push($usuariosArray, $user_item);
        }

        // Asegurarse de enviar el header correcto para JSON
        header('Content-Type: application/json');
        
        // Devolver los usuarios en formato JSON como un array de objetos
        echo json_encode($usuariosArray);
    }
}





