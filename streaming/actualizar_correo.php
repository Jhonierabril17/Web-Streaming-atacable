<?php
// Iniciar sesión
session_start();

// Incluir el archivo de conexión a la base de datos
require 'conexion.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: inicio.html"); // Redirigir a la página de inicio si no ha iniciado sesión
    exit();
}

// Obtener el nombre de usuario de la sesión
$username = $_SESSION['username'];

// Obtener el nuevo correo electrónico del formulario
$new_email = $_POST['email'];

// Actualizar el correo electrónico en la base de datos
$sql = "UPDATE stream SET email = '$new_email' WHERE username = '$username'";

if ($conexion->query($sql) === TRUE) {
    echo "<script>alert('Correo electrónico actualizado con éxito.'); window.location.href = 'perfil.php';</script>";
} else {
    echo "<script>alert('Error al actualizar el correo: " . $conexion->error . "'); window.location.href = 'perfil.php';</script>";
}

// Cerrar la conexión
$conexion->close();
?>