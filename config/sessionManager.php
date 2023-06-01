<?php
    class SessionManager{

        public static function esta_logueado() {
            session_start();
            return isset($_SESSION['dni_cliente']);
        }
    
        public static function restringir_acceso() {
            if (!self::esta_logueado()) {
                header("Location: ../../login/login.php");
                exit;
            }
        }
    }
?>