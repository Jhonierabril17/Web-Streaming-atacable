<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar las credenciales del administrador
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Si las credenciales son correctas, inicia sesión como administrador
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Credenciales incorrectas');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Administrador</title>
    <link rel="stylesheet" href="estilosadmin.css">
</head>
<body>
    <div class="login-contenedor">
        <h2>Admin Login</h2>
        <form action="admin.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Iniciar Sesión</button>
            <p>Ingresar entorno usuario? <a href="inicio.html">Entorno persona</a></p>
        </form>
    </div>
</body>
</html>
