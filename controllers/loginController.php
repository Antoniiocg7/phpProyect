<?php
    Class LoginController{

        private $model;

        public function __construct(){
            require_once __DIR__."/../models/loginModel.php";
            $this->model = new LoginModel();
        }

        public function es_admin($dni){
            $url_base = "http://localhost/phpProyect";

            $url_destino_admin = $url_base . "/view/cliente/index.php";
            $url_destino_cliente = $url_base . "/view/cliente/show.php?dni=".$dni;

            return ($this->model->es_admin($dni)!=false) ? header("Location: " . $url_destino_admin) : header("Location: " . $url_destino_cliente);
        }

        public function usuario_existe($dni, $pass){
            return ($this->model->usuario_existe($dni, $pass)!=false) ? true : false; 
        }
    }
?>