<?php

    require_once "../controllers/registroController.php";
    
    $registroController = new RegistroController();
    $dni_checker = $registroController->comprobar_registro($_POST["dni"]);
    if($dni_checker==true){
        $registroController->registrar_cliente($_POST["dni"],$_POST["correo"],$_POST["contrasena"],$_POST["nombre"],
            $_POST["apellido_1"],$_POST["apellido_2"],$_POST["telefono"],$_POST["direccion"]
        );
    }else{
        header("Location: registro.php");
    }
    
?>