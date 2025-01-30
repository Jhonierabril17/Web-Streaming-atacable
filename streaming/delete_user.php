<?php
session_start();
require 'conexion.php';

// Verificar que el usuario sea un administrador
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin.php");
    exit();
}

// Verificar si se recibió el ID del usuario a eliminar
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Preparar la consulta para eliminar al usuario
    $sql = "DELETE FROM stream WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario eliminado exitosamente');</script>";
        sleep(2);
        header("Location: admin_dashboard.php");
    } else {
        echo "Error al eliminar el usuario.";
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "ID de usuario no proporcionado.";
}
?>
