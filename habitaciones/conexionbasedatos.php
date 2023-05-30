<?php
require_once "../config/dataBase.php";

// Establecer la conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel_php");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Función para obtener todas las habitaciones
function obtenerHabitaciones() {
    global $conn;
    $sql_select = "SELECT * FROM habitacion";
    $result_select = $conn->query($sql_select);
    
    if ($result_select->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th></tr>";
        
        while ($row = $result_select->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No se encontraron habitaciones.";
    }
}

// Verificar si se ha enviado el formulario de crear habitación
if (isset($_POST['crear'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Llamar a la función crearHabitacion con los valores del formulario
    crearHabitacion($id, $nombre, $descripcion);
}

// Verificar si se ha enviado el formulario de actualizar habitación
if (isset($_POST['actualizar'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Llamar a la función actualizarHabitacion con los valores del formulario
    actualizarHabitacion($id, $nombre, $descripcion);
}

// Verificar si se ha enviado el formulario de borrar habitación
if (isset($_POST['borrar'])) {
    // Obtener el dato del formulario
    $id = $_POST['id'];

    // Llamar a la función borrarHabitacion con el valor del formulario
    borrarHabitacion($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Habitaciones</title>
    <link rel="stylesheet" type="text/css" href="habitaciones.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Tabla de Habitaciones</h1>

    <h2>Crear Habitación</h2>
    <form action="" method="post">
        <input type="text" name="id" placeholder="Id">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="descripcion" placeholder="Descripción">
        <input type="submit" name="crear" value="Crear Habitación">
    </form>
    <h2>Actualizar Habitación</h2>
<form action="" method="post">
    <input type="text" name="id" placeholder="ID de la Habitación">
    <input type="text" name="nombre" placeholder="Nuevo Nombre">
    <input type="text" name="descripcion" placeholder="Nueva Descripción">
    <input type="submit" name="actualizar" value="Actualizar Habitación">
</form>

<h2>Borrar Habitación</h2>
<form action="" method="post">
    <input type="text" name="id" placeholder="ID de la Habitación">
    <input type="submit" name="borrar" value="Borrar Habitación">
</form>

<h2>Tabla de Habitaciones</h2>
<?php
// Llamar a la función obtenerHabitaciones para mostrar la tabla
obtenerHabitaciones();
?>

