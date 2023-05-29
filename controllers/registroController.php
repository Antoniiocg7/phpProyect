<?php
    Class RegistroController{

        private $model;

        public function __construct(){
            require_once "../models/registroModel.php";
            $this->model = new RegistroModel();
        }

        public function registrar_cliente($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion){
            $dni = $this->model-> registrar_cliente($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion);
            return ($dni != false) ? header("Location: ../login/login.php")  : header("Location: ../registro/registro.php");
        }

        public function comprobar_registro($dni){
            $dni = $this->model->comprobar_registro($dni);
            return $dni;
        }
    }
?>