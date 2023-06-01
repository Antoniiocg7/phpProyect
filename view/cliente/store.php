<?php

    require_once "../../controllers/clienteController.php";
    require_once '../../config/sessionManager.php';

    SessionManager::restringir_acceso();
    
    $clienteController = new ClienteController();
    $clienteController->guardar($_POST["dni"],$_POST["correo"],$_POST["contrasena"],$_POST["nombre"],
        $_POST["apellido_1"],$_POST["apellido_2"],$_POST["telefono"],$_POST["direccion"]
    );
?>