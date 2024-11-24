<?php
require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

// ID de la notificación que deseas eliminar
$notificacion_id = $_POST['notificacion_id'];

// Preparar la consulta SQL para llamar a la función eliminarNotificacion
$sql = "SELECT eliminarNotificacion(?) AS resultado";

// Crear una declaración preparada
if ($stmt = $conn->prepare($sql)) {
    // Vincular los parámetros
    $stmt->bind_param("i", $notificacion_id);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener el resultado
    $stmt->bind_result($resultado);
    $stmt->fetch();
    
    // Mostrar el resultado
    if ($resultado == 1) {
        echo "Notificación eliminada exitosamente.";
    } else {
        echo "No se encontró la notificación con el ID proporcionado.";
    }
    
    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
