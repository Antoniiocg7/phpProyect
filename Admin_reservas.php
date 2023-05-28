<?php
// incluir el archivo de la configuracion de la base de datos
$config = require 'config/dataBase.php';

// Crear una instancia de la clase DataBase
$db = new DataBase();

//establecer la conexion
$conn = new mysqli("localhost", "root", "", "hotel_php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_Administrador_reservas.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Gestion reservas - Admin</h1>
        <p>Bienvenido al panel de administración de reservas</p>
    </header> 
    
</body>
</html>