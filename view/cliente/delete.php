<?php
    require_once "../../controllers/clienteController.php";
    $usernameController = new ClienteController();
    $usernameController->delete($_GET["dni"]);
?>