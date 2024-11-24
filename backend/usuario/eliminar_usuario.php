<?php
require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

if (isset($_POST['id'])) {
    // ID del usuario que deseas eliminar
    $usuario_id = $_POST['id'];

    // Preparar la consulta SQL para llamar a la función eliminar_usuario
    $sql = "SELECT eliminarUsuario(?) AS resultado";

    // Crear una declaración preparada
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("i", $usuario_id);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $stmt->bind_result($resultado);
        $stmt->fetch();
        
        // Mostrar el resultado
        if ($resultado == 1) {
            echo "Usuario eliminado exitosamente.";
        } else {
            echo "No se encontró el usuario con el ID proporcionado.";
        }
        
        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID de usuario.";
}

// Cerrar la conexión
$conn->close();
?>
