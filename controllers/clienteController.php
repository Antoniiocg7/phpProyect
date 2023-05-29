<?php
    class ClienteController{

        private $model;

        public function __construct(){
            require_once "../../models/clienteModel.php";
            $this->model = new ClienteModel();
        }

        public function guardar($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion){
            $dni = $this->model-> insertar($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion);
            return ($dni != false) ? header("Location: show.php?dni=".$dni)  : header("Location: create.php");
        }

        public function show($dni){
            return ($this->model->show($dni) != false) ? $this->model->show($dni) : header("Location: index.php");
        }

        public function obtener_usuarios_filtro($pagina_actual, $registros_pagina, $dni_filtrado, $correo_filtrado) {
            if (isset($_GET["pagina"])) {
                $pagina_actual = $_GET["pagina"];
            }
            return $this->model->obtener_usuarios_filtro($pagina_actual, $registros_pagina, $dni_filtrado, $correo_filtrado);
        }

        public function update($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion) {
            return ($this->model->update($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion) != false) ? header( "Location: show.php?dni=".$dni ) 
            : header( "Location: index.php" );
        }

        public function delete($dni){
            return ($this->model->delete($dni)) ? header("Location: index.php") 
            : header("Location: show.php?dni=".$dni);
        }

    }
?>