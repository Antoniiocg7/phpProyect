<?php
    require_once "../controllers/loginController.php";

    $loginController = new LoginController();
    $usuario_existe_checker = $loginController->usuario_existe($_POST["login_dni"],$_POST["login_pass"]);
    if($usuario_existe_checker==true){
        session_start();
        $_SESSION["dni_cliente"] = $_POST["login_dni"];
        if($loginController->es_admin($_POST["login_dni"])!=false){
            header("Location: ../view/cliente/index.php");
        }else{
            header("Location: ../../../phpProyect/view/cliente/show.php?dni=".$_POST["login_dni"]);
        }
        
    }else{
        session_start();
        header("Location: login.php");
    }
    
?>