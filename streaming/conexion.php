<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stream";

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else
echo "";
?>