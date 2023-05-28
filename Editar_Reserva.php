<?php
// Incluir el archivo de configuración de la base de datos
$config = require 'config/dataBase.php';

// Establecer la conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel_php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener el ID de la reserva desde la URL
$reserva_id = $_GET['id'];

// Consultar la reserva con el ID especificado
$sql_select = "SELECT * FROM reserva WHERE id = $reserva_id";
$result_select = $conn->query($sql_select);

if ($result_select->num_rows == 1) {
    $reserva = $result_select->fetch_assoc();

    // Procesar la solicitud de actualización de reserva
    if (isset($_POST['actualizar_reserva'])) {
        // Obtener los datos actualizados del formulario
        $id_cliente = $_POST['id_cliente'];
        $id_habitacion = $_POST['id_habitacion'];
        $fecha_entrada = $_POST['fecha_entrada'];
        $fecha_salida = $_POST['fecha_salida'];

        // Actualizar los datos de la reserva en la base de datos
        $sql_update = "UPDATE reserva SET id_cliente = '$id_cliente', id_habitacion = '$id_habitacion', fecha_entrada = '$fecha_entrada', fecha_salida = '$fecha_salida' WHERE id = $reserva_id";
        $result_update = $conn->query($sql_update);

        if ($result_update) {
            // La reserva se actualizó correctamente, redirigir al usuario a admin_reservas.php
            header("Location: admin_reservas.php");
            exit();
        } else {
            // Ocurrió un error al actualizar la reserva, puedes mostrar un mensaje de error o realizar alguna otra acción
            echo "Error al actualizar la reserva: " . $conn->error;
        }
    }

    // Mostrar el formulario de edición
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Reserva</title>
    </head>
    <body>
        <h2>Editar Reserva</h2>
        <form method="POST" action="">
            <label for="id_cliente">ID Cliente:</label>
            <input type="text" name="id_cliente" value="<?php echo $reserva['id_cliente']; ?>" readonly><br>

            <label for="id_habitacion">ID Habitación:</label>
            <input type="text" name="id_habitacion" value="<?php echo $reserva['id_habitacion']; ?>"readonly><br>

            <label for="fecha_entrada">Fecha de Entrada:</label>
            <input type="date" name="fecha_entrada" value="<?php echo $reserva['fecha_entrada']; ?>"><br>

            <label for="fecha_salida">Fecha de Salida:</label>
            <input type="date" name="fecha_salida" value="<?php echo $reserva['fecha_salida']; ?>"><br>

            <input type="submit" name="actualizar_reserva" value="Actualizar Reserva">
        </form>
    </body>
    </html>
    <?php
} else {
    echo "No se encontró la reserva.";
}
?>
