<?php
// incluir el archivo de la configuración de la base de datos
$config = require 'config/dataBase.php';

// Crear una instancia de la clase DataBase
$db = new DataBase();

// Establecer la conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel_php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Consultar las reservas de la tabla "reserva"
$sql = "SELECT * FROM reserva";
$result = $conn->query($sql);
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

    <div class="content">
        <div class="sidebar">
            <ul>
                <li><a href="#">Agregar Reserva</a></li>
                <li><a href="#">Editar Reservas</a></li>
                <li><a href="#">Eliminar Reservas</a></li>
                <li><a href="#">Salir al Menú</a></li>
            </ul>
        </div>

        <div class="reservas">
            <?php
            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>ID Cliente</th>
                            <th>ID Habitación</th>
                            <th>Fecha Entrada</th>
                            <th>Fecha Salida</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["id_cliente"] . "</td>
                            <td>" . $row["id_habitacion"] . "</td>
                            <td>" . $row["fecha_entrada"] . "</td>
                            <td>" . $row["fecha_salida"] . "</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No se encontraron reservas.";
            }
            ?>
        </div>
    </div>
</body>
</html>
