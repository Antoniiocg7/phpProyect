<?php
    require_once "../controllers/loginController.php";

    $loginController = new LoginController();
    $usuario_existe_checker = $loginController->usuario_existe($_POST["login_dni"],$_POST["login_pass"]);
    if($usuario_existe_checker==true){
        session_start();
        $_SESSION["dni_cliente"] = $_POST["login_dni"];
        $loginController->es_admin($_POST["login_dni"]);
        
    }else{
        session_start();
        $_SESSION["dni_cliente"] = $_POST["login_dni"];
        header("Location: login.php");
    }
    
?>