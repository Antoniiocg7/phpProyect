<?php
    Class LoginModel{
        
        private $PDO;

        public function __construct(){
            require_once(__DIR__."/../config/dataBase.php");
            $connection = new DataBase();
            $this->PDO = $connection->conectar_bd();
        }

        public function es_admin($dni){
            $stmt = $this->PDO->PREPARE("SELECT administrador from cliente where dni = :dni");
            $stmt->bindParam(":dni", $dni);
            IF ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['administrador'] == 1;
            }else{
                return false;
            }
        }

        public function usuario_existe($dni, $pass){
            $stmt = $this->PDO->prepare("SELECT * from cliente where dni = :dni and contrasena = :pass");
            $stmt->bindParam(":dni", $dni);
            $stmt->bindParam(":pass", $pass);
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return ($result !== false);
            } else {
                return false;
            }
        }
    }
?>