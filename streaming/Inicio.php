<?php
// Incluir el archivo de conexión a la base de datos
require 'conexion.php';

// Verificar la conexión (este paso ya está en 'conexion.php', por lo que no es necesario repetirlo aquí)

// Obtener datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Consulta para verificar el usuario y la contraseña en la tabla Stream
$sql = "SELECT * FROM stream WHERE username = '$user' AND password = '$pass'";
$result = $conexion->query($sql); // Cambia $conn por $conexion

if ($result->num_rows > 0) {
    // Usuario autenticado con éxito
    session_start();
    $_SESSION['username'] = $user;
    header("Location: index.php?user=" . urlencode($user)); // Redirige a la página principal
    exit();
} else {
    // Error de autenticación
    echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href = 'inicio.html';</script>";
}

// Cerrar la conexión
$conexion->close(); // Cambia $conn por $conexion
?>
