<?php

    Class RegistroModel{

        private $PDO;

        public function __construct(){
            require_once("../config/dataBase.php");
            $connection = new DataBase();
            $this->PDO = $connection->conectar_bd();
        }

        public function registrar_cliente ($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion){
            $stmt = $this->PDO->prepare(
                "INSERT INTO cliente (dni,correo,contrasena,nombre,apellido_1,apellido_2,telefono,direccion) 
                VALUES (:dni, :correo, :contrasena, :nombre, :apellido_1, :apellido_2, :telefono, :direccion)"
            );
            $stmt->bindParam(":dni", $dni);
            $stmt->bindParam(":correo", $email);
            $stmt->bindParam(":contrasena", $contrasena);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido_1", $apellido_1);
            $stmt->bindParam(":apellido_2", $apellido_2);
            $stmt->bindParam(":telefono", $telefono);
            $stmt->bindParam(":direccion", $direccion);
            return ($stmt->execute()) ? $dni : false;
        }

        public function comprobar_registro($dni){
            $stmt = $this->PDO->prepare("SELECT * FROM cliente where dni = :dni");
            $stmt->bindParam(':dni', $dni);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ? false : true;
        }

    }

?>