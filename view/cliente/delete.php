<?php
    require_once "../../controllers/clienteController.php";
    require_once '../../config/sessionManager.php';

    SessionManager::restringir_acceso();
    
    $clienteController = new ClienteController();
    $clienteController->delete($_GET["dni"]);
?>