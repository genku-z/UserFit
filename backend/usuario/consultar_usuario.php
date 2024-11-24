<?php

require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

// Consulta simple para obtener los datos de la tabla 'usuarios'
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Edad: " . $row["edad"]. " - Género: " . $row["genero"]. " - Nivel de actividad: " . $row["nivel_actividad"]. " - Experiencia: " . $row["experiencia"]. " - Objetivos: " . $row["objetivos"]. " - Días disponibles: " . $row["dias_disponibles"]. " - Duración de sesión: " . $row["duracion_sesion"]. " - Preferencias: " . $row["preferencias"]. " - Historial de lesiones: " . $row["historial_lesiones"]. "<br>";
    }
} else {
    echo "0 resultados, sin usuarios";
}

// Cerrar la conexión
$conn->close();
?>
