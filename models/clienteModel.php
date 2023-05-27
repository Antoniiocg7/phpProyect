<?php
    class ClienteModel{
        private $PDO;

        public function __construct(){
            require_once("../../config/dataBase.php");
            $connection = new DataBase();
            $this->PDO = $connection->conectar_bd();
        }

        public function insertar ($dni,$email,$contrasena,$nombre,$apellido_1,$apellido_2,$telefono,$direccion){
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

        public function show ($dni) {
            $stmt = $this->PDO->prepare("SELECT * FROM cliente where dni = :dni limit 1");
            $stmt->bindParam(":dni", $dni);
            return ($stmt->execute()) ? $stmt->fetch() : false;
        }

        public function obtener_usuarios($pagina_actual, $registros_pagina) {

            $pagina_inicio = ($pagina_actual - 1) * $registros_pagina;

            $stmt = $this->PDO->prepare("SELECT COUNT(*) FROM cliente");
            $stmt->execute();
            $total_registros = $stmt->fetchColumn();


            $stmt = $this->PDO->prepare("SELECT * FROM cliente limit :pagina_inicio, :registros_pagina");
            $stmt->bindParam(":pagina_inicio", $pagina_inicio, PDO::PARAM_INT);
            $stmt->bindParam(":registros_pagina", $registros_pagina, PDO::PARAM_INT);
            $stmt->execute();
            $pagina = $stmt->fetchAll();

            $total_paginas = ceil($total_registros/$registros_pagina);

            $paginador = array(
                "pagina_actual" => $pagina_actual,
                "registros_pagina" => $registros_pagina,
                "pagina" => $pagina,
                "total_registros" => $total_registros,
                "total_paginas" => $total_paginas
            );
            
            return $paginador;
        }

        public function update($dni, $email, $contrasena, $nombre, $apellido_1, $apellido_2, $telefono, $direccion) {
            
            $stmt = $this->PDO->prepare(
                "UPDATE cliente 
                SET correo = :correo, contrasena = :contrasena, nombre = :nombre, apellido_1 = :apellido_1, apellido_2 = :apellido_2, telefono = :telefono, direccion = :direccion
                WHERE dni = :dni"
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

        public function delete($dni){
            $stmt = $this->PDO->prepare("DELETE FROM cliente where dni = :dni");
            $stmt->bindParam(":dni", $dni);
            return ($stmt->execute()) ? true : false;
        }

        public function filtrar($nombre_filtrado){

            $nombre_filtrado = $_GET['filtro_nombre'] ?? '';

            if(!empty($_GET["filtro_nombre"])){

                $stmt = $this->PDO->prepare("SELECT * FROM cliente WHERE nombre LIKE ?");
                $nombre_filtrado = "%$nombre_filtrado%";
                $stmt->bindParam(1, $nombre_filtrado);
                $stmt->execute();
                return $stmt->fetchAll();
            }
            
        }

    }


?>