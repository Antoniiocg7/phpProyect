<?php
// Obtener los valores del formulario y aplicarle la limpieza adecuada
$numeroCamas = isset($_POST['numero-camas']) && is_numeric($_POST['numero-camas']) ? (int)$_POST['numero-camas'] : null;
$maximoPersonas = isset($_POST['maximo-personas']) && is_numeric($_POST['maximo-personas']) ? (int)$_POST['maximo-personas'] : null;
$precioMin = isset($_POST['precio-min']) && is_numeric($_POST['precio-min']) ? (float)$_POST['precio-min'] : null;
$precioMax = isset($_POST['precio-max']) && is_numeric($_POST['precio-max']) ? (float)$_POST['precio-max'] : null;

// Verificar si los valores son válidos
if ($numeroCamas === null || $maximoPersonas === null || $precioMin === null || $precioMax === null) {
    die('Los valores ingresados no son válidos.');
}

// Realizar la conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'hotel_php');

// Verificar si la conexión fue exitosa
if ($conexion->connect_errno) {
    die('Error al conectar con la base de datos: ' . $conexion->connect_error);
}

// Consulta preparada para buscar las habitaciones que cumplen con las condiciones
$sql = "SELECT * FROM habitacion WHERE numero_camas = ? 
        AND max_personas = ? 
        AND precio >= ? AND precio <= ?";

// Preparar la consulta
$stmt = $conexion->prepare($sql);

// Verificar si la preparación de la consulta fue exitosa
if (!$stmt) {
    die('Error al preparar la consulta: ' . $conexion->error);
}

// Vincular los parámetros a la consulta preparada
$stmt->bind_param('iiii', $numeroCamas, $maximoPersonas, $precioMin, $precioMax);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado de la consulta
$resultado = $stmt->get_result();

// Verificar si se encontraron habitaciones
if ($resultado->num_rows > 0) {
    // Mostrar los resultados
    while ($fila = $resultado->fetch_assoc()) {
        echo 'ID: ' . $fila['id'];
        echo 'Nombre: ' . $fila['nombre'] ;
        echo 'Número de camas: ' . $fila['numero_camas'] ;
        echo 'Máximo de personas: ' . $fila['max_personas'] ;
        echo 'Precio: ' . $fila['precio'] ;
        echo 'Descripción: ' . $fila['descripcion'] ;
    }
} else {
    echo 'No se encontraron habitaciones que cumplan con los criterios de búsqueda.';
}

// Cerrar el resultado
$resultado->close();

// Cerrar la consulta preparada
$stmt->close();

// Cerrar la conexión a la base de datos
$conexion->close();
?>
