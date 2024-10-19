<?php

require_once 'services/UsuarioService.php';

// Obtener la URI de la solicitud
$requestUri = rtrim($_SERVER['REQUEST_URI'], '/'); 
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Definir las rutas
switch ($requestUri) {
    case '/musicforall/api/usuarios':
        $usuarioService = new UsuarioService();
        $usuarioService->obtenerUsuarios();
        break;

    default:
        // Manejar caso de recurso no encontrado
        header('HTTP/1.0 404 Not Found');
        echo json_encode(array("message" => "Recurso no encontrado"));
        break;
}
