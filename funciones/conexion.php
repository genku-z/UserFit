<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fitness_app";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//echo "Conexión exitosa a la base de datos. ";
?>


