<?php
require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

// Obtener los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$nivel_actividad = $_POST['nivel_actividad'];
$experiencia = $_POST['experiencia'];
$objetivos = $_POST['objetivos'];
$dias_disponibles = $_POST['dias_disponibles'];
$duracion_sesion = $_POST['duracion_sesion'];
$preferencias = $_POST['preferencias'];
$historial_lesiones = $_POST['historial_lesiones'];

// Llamar a la función 
$sql = "SELECT 	editarUsuario('$id', '$nombre', $edad, '$genero', '$nivel_actividad', '$experiencia', '$objetivos', '$dias_disponibles', '$duracion_sesion', '$preferencias', '$historial_lesiones') AS resultado"; 
$result = $conn->query($sql); // Verificar si hay resultados 

if ($result->num_rows > 0) {
    echo "usuario editado";
  } else {
    echo "Error al editar usuario: " . $conn->error;
  }

// Cerrar la conexión
$conn->close();
?>
