<?php
require_once 'C:\xampp\htdocs\UserFit\funciones\conexion.php';

// Verificar que los datos del formulario están definidos
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : 0;
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$nivel_actividad = isset($_POST['nivel_actividad']) ? $_POST['nivel_actividad'] : '';
$experiencia = isset($_POST['experiencia']) ? $_POST['experiencia'] : '';
$objetivos = isset($_POST['objetivos']) ? $_POST['objetivos'] : '';
$dias_disponibles = isset($_POST['dias_disponibles']) ? $_POST['dias_disponibles'] : '';
$duracion_sesion = isset($_POST['duracion_sesion']) ? $_POST['duracion_sesion'] : '';
$preferencias = isset($_POST['preferencias']) ? $_POST['preferencias'] : '';
$historial_lesiones = isset($_POST['historial_lesiones']) ? $_POST['historial_lesiones'] : '';

try {
    $stmt = $conn->prepare("SELECT insertarUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?) AS resultado");
    $stmt->bind_param('sissssssss', $nombre, $edad, $genero, $nivel_actividad, $experiencia, $objetivos, $dias_disponibles, $duracion_sesion, $preferencias, $historial_lesiones);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row['resultado'] == 1) {
            echo "Usuario registrado con éxito.";
        } elseif ($row['resultado'] == -1) {
            echo "Error: No se puede insertar el usuario porque ya existe un registro con el mismo nombre.";
        } elseif ($row['resultado'] == -2) {
            echo "Error: No se puede registrar un usuario menor de 14 años.";
        } else {
            echo "Error desconocido al insertar el usuario.";
        }
    } else {
        throw new Exception("Error en la consulta de inserción.");
    }
} catch (mysqli_sql_exception $e) {
    echo "Error al insertar el usuario: " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
?>
