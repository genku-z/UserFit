<?php

require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

//usuario_id, mensaje, fecha_envio

// Obtener los datos del formulario
$usuario_id = $_POST['usuario_id'];
$mensaje = $_POST['mensaje'];
$fecha_envio = $_POST['fecha_envio'];

// Llamar a la función 
$sql = "SELECT 	insertarNotificacion('$usuario_id', '$mensaje', '$fecha_envio') AS resultado"; 
$result = $conn->query($sql); // Verificar si hay resultados 

if ($result->num_rows > 0) {
  echo "Nueva notificacion insertada";
} else {
  echo "Error al insertar notificacion: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
