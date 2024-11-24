<?php
require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

// Consulta para obtener las notificaciones de un usuario específico (puedes cambiar el ID del usuario)
$sql = "SELECT * FROM notificaciones";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada notificación
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Mensaje: " . $row["mensaje"]. " - Fecha de envío: " . $row["fecha_envio"]. "<br>";
    }
} else {
    echo "No hay notificaciones para este usuario.";
}

// Cerrar la conexión
$conn->close();