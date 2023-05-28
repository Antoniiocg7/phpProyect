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
            <div class="search-bar">
                <input type="text" id="search-input" placeholder="Buscar reservas...">
                <button id="search-button">Buscar</button>
            </div>
            
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>ID Reserva</th>
                        <th>ID Cliente</th>
                        <th>ID Habitación</th>
                        <th>Fecha Entrada</th>
                        <th>Fecha Salida</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["id_cliente"] . "</td>
                                    <td>" . $row["id_habitacion"] . "</td>
                                    <td>" . $row["fecha_entrada"] . "</td>
                                    <td>" . $row["fecha_salida"] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron reservas.</td></tr>";
                    }
                    ?>
                </table>

                <div id="paginator">
                    <?php
                    $limit = 10; // Número de registros por página
                    $total_records = $result->num_rows; // Total de registros
                    $total_pages = ceil($total_records / $limit); // Total de páginas

                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $start = ($page - 1) * $limit; // Registro de inicio para cada página

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page) {
                            echo "<button class='active'><a href='?page=" . $i . "'>" . $i . "</a></button>";
                        } else {
                            echo "<button><a href='?page=" . $i . "'>" . $i . "</a></button>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
