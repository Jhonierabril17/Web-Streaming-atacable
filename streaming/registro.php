<?php
// Iniciar sesión
session_start();

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Construir la consulta SQL sin usar declaraciones preparadas o escapado de caracteres
$sql = "INSERT INTO Stream (username, password) VALUES ('$username', '$password')";

// Intentar ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    // Redirigir al usuario a la página de inicio con un mensaje de éxito
    header("Location: inicio.html?status=success");
    exit();
} else {
    // Mostrar un mensaje de error si la consulta falla
    echo "<script>alert('Error al registrar usuario: " . $conexion->error . "'); window.location.href = 'registro.html';</script>";
}

// Cerrar la conexión
$conexion->close();
?>
