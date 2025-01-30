<?php
// update_user.php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Consulta para actualizar los datos del usuario
    $sql = "UPDATE stream SET username = '$username', password = '$password', email = '$email' WHERE id = $user_id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: admin_dashboard.php?status=updated"); // Redirige al dashboard con un mensaje de éxito
    } else {
        echo "Error al actualizar el usuario: " . $conexion->error;
    }

    $conexion->close();
}
?>
