<?php
require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

// Obtener los datos del formulario
$id = $_POST['id'];
$mensaje = $_POST['mensaje'];
$fecha_envio = $_POST['fecha_envio'];

// Llamar a la función 
$sql = "SELECT editarNotificacion('$id', '$mensaje', '$fecha_envio') AS resultado"; 
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result) {
    $row = $result->fetch_assoc();
    if ($row['resultado']) {
        echo "Notificación editada";
    } else {
        echo "No se pudo editar la notificación.";
    }
} else {
    echo "Error al editar notificación: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
