<?php
// incluir el archivo de la configuracion de la base de datos
$config = require '/config/dataBase.php';

// Crear una instancia de la clase DataBase
$db = new DataBase();

//establecer la conexion
$conn = new mysqli("localhost", "root", "", "hotel_php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}



?>