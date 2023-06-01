<?php
    Class LoginController{

        private $model;

        public function __construct(){
            require_once __DIR__."/../models/loginModel.php";
            $this->model = new LoginModel();
        }

        public function es_admin($dni){

            return ($this->model->es_admin($dni)!=false) ? true : false; 
        }

        public function usuario_existe($dni, $pass){
            return ($this->model->usuario_existe($dni, $pass)!=false) ? true : false; 
        }
    }
?>