<?php
    require_once "../../controllers/clienteController.php";
    $clienteController = new ClienteController();
    $clienteController->delete($_GET["dni"]);
?>