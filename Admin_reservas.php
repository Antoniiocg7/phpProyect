<?php
// Incluir el archivo de configuración de la base de datos
$config = require 'config/dataBase.php';

// Establecer la conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel_php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener el número de registros por página
$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

// Obtener el número total de registros
$sql_total = "SELECT COUNT(*) as total FROM reserva";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_records = $row_total['total'];

// Calcular el número total de páginas
$total_pages = ceil($total_records / $limit);

// Obtener la página actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Asegurarse de que la página actual esté dentro del rango válido
$page = max(1, min($page, $total_pages));

// Calcular el offset para la consulta SQL
$offset = ($page - 1) * $limit;

// Consultar las reservas paginadas
$sql = "SELECT * FROM reserva LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Procesar la solicitud de edición de reserva
if (isset($_POST['editar_reserva'])) {
    $reserva_id = $_POST['editar_reserva'];

    // Redirigir a la página de edición de reserva con el ID especificado
    header("Location: editar_reserva.php?id=$reserva_id");
    exit();
}

// Procesar la solicitud de eliminación de reserva
if (isset($_POST['eliminar_reserva'])) {
    $reserva_id = $_POST['eliminar_reserva'];

    // Aquí debes escribir la lógica para eliminar la reserva de la base de datos
    $sql_delete = "DELETE FROM reserva WHERE id = $reserva_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Reserva eliminada exitosamente.";
    } else {
        echo "Error al eliminar la reserva: " . $conn->error;
    }
}

?>

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
            <a href="Crear_Reserva.php">Crear Reserva</a>
        </div>
        <div class="sidebar_Derecha">
            <a href=""></a>
        </div>
        <div class="reservas">
            <div class="table-wrapper">
                <form method="POST" action="">
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
                                        <td>
                                            <button type='submit' name='eliminar_reserva' value='" . $row["id"] . "' class='delete-button'>Eliminar</button>
                                            <button type='submit' name='editar_reserva' value='" . $row["id"] . "' class='edit-button'>Editar</button>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron reservas.</td></tr>";
                        }
                        ?>
                    </table>
                </form>

                <div id="paginator">
                    <?php
                    // Botón retroceder a la primera página
                    if ($page > 1) {
                        echo "<button><a href='?page=1&limit=$limit'>&lt;&lt;</a></button>";
                    } else {
                        echo "<button disabled>&lt;&lt;</button>";
                    }

                    // Botón retroceder una página
                    if ($page > 1) {
                        $prev_page = $page - 1;
                        echo "<button><a href='?page=$prev_page&limit=$limit'>&lt;</a></button>";
                    } else {
                        echo "<button disabled>&lt;</button>";
                    }

                    // Botones de páginas
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page) {
                            echo "<button class='active'><a href='?page=$i&limit=$limit'>$i</a></button>";
                        } else {
                            echo "<button><a href='?page=$i&limit=$limit'>$i</a></button>";
                        }
                    }

                    // Botón avanzar una página
                    if ($page < $total_pages) {
                        $next_page = $page + 1;
                        echo "<button><a href='?page=$next_page&limit=$limit'>&gt;</a></button>";
                    } else {
                        echo "<button disabled>&gt;</button>";
                    }

                    // Botón avanzar a la última página
                    if ($page < $total_pages) {
                        echo "<button><a href='?page=$total_pages&limit=$limit'>&gt;&gt;</a></button>";
                    } else {
                        echo "<button disabled>&gt;&gt;</button>";
                    }
                    ?>
                </div>

                <div class="limit-selector">
                    <form method="GET" action="">
                        <label for="limit">Mostrar:</label>
                        <select name="limit" id="limit">
                            <option value="2" <?php echo $limit == 2 ? 'selected' : ''; ?>>2</option>
                            <option value="4" <?php echo $limit == 4 ? 'selected' : ''; ?>>4</option>
                            <option value="8" <?php echo $limit == 8 ? 'selected' : ''; ?>>8</option>
                            <option value="10" <?php echo $limit == 10 ? 'selected' : ''; ?>>10</option>
                        </select>
                        <input type="submit" value="Actualizar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
