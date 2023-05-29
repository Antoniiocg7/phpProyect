<?php
// Incluir el archivo de configuración de la base de datos
$config = require 'config/dataBase.php';

// Establecer la conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel_php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener el último ID de reserva
$sql_last_id = "SELECT MAX(id) as last_id FROM reserva";
$result_last_id = $conn->query($sql_last_id);
$row_last_id = $result_last_id->fetch_assoc();
$last_id = $row_last_id['last_id'];
$new_id = $last_id + 1;

// Procesar la solicitud de creación de reserva
if (isset($_POST['crear_reserva'])) {
    // Obtener los datos del formulario
    $id_cliente = $_POST['id_cliente'];
    $id_habitacion = $_POST['id_habitacion'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $fecha_salida = $_POST['fecha_salida'];

    // Insertar la reserva en la base de datos
    $sql_insert = "INSERT INTO reserva (id, id_cliente, id_habitacion, fecha_entrada, fecha_salida) VALUES ('$new_id', '$id_cliente', '$id_habitacion', '$fecha_entrada', '$fecha_salida')";
    $result_insert = $conn->query($sql_insert);

    if ($result_insert) {
        // La reserva se creó correctamente, redirigir al usuario a admin_reservas.php
        header("Location: admin_reservas.php");
        exit();
    } else {
        // Ocurrió un error al crear la reserva, puedes mostrar un mensaje de error o realizar alguna otra acción
        echo "Error al crear la reserva: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Reserva</title>
    <link rel="stylesheet" href="Crear_Reserva.css">
</head>
<body class="body">
    <div class="container">
        <div class="center-container">
            <div class="form-container">
                <h1>Crear Reserva</h1>
                <form method="POST" action="">
                <label for="id_reserva">ID Reserva:</label>
                <input type="text" name="id_reserva" value="<?php echo $new_id; ?>" disabled>
                
                <label for="id_cliente">ID Cliente:</label>
                <select name="id_cliente">
                <?php
                    // Consultar los clientes de la base de datos
                    $sql_clientes = "SELECT dni, nombre FROM cliente";
                    $result_clientes = $conn->query($sql_clientes);

                    while ($row_cliente = $result_clientes->fetch_assoc()) {
                        $selected = ($row_cliente['dni'] == $reserva['id_cliente']) ? 'selected' : '';
                        echo "<option value=\"{$row_cliente['dni']}\" $selected>{$row_cliente['nombre']}</option>";
                    }
                ?>
                </select>

                <label for="id_habitacion">ID Habitación:</label>
                    <select name="id_habitacion">
                     <?php
                        // Consultar las habitaciones de la base de datos
                        $sql_habitaciones = "SELECT id, nombre FROM habitacion";
                        $result_habitaciones = $conn->query($sql_habitaciones);

                        while ($row_habitacion = $result_habitaciones->fetch_assoc()) {
                             $selected = ($row_habitacion['id'] == $reserva['id_habitacion']) ? 'selected' : '';
                            echo "<option value=\"{$row_habitacion['id']}\" $selected>{$row_habitacion['id']}</option>";
                        }
                    ?>
                    </select>
                    
                    <label for="fecha_entrada">Fecha Entrada:</label>
                    <input type="date" name="fecha_entrada">
                    
                    <label for="fecha_salida">Fecha Salida:</label>
                    <input type="date" name="fecha_salida">
                    
                    <input type="submit" name="crear_reserva" value="Crear Reserva">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
