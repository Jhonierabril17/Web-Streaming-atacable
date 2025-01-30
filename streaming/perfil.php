<?php
// Iniciar la sesión
session_start();

// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: inicio.html"); // Redirigir al inicio si no está autenticado
    exit();
}

// Obtener el nombre de usuario desde la sesión
$username = $_SESSION['username'];

// Consulta para obtener los datos del usuario
$sql = "SELECT username, password, email FROM stream WHERE username = '$username'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $user_data = $result->fetch_assoc();
} else {
    echo "No se encontraron datos del usuario.";
    exit(); // Salir si no hay datos
}

// Cerrar la conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="estilosperfil.css">
</head>
<body>
    <div class="profile-container">
        <h2>Perfil de Usuario</h2>
        <!-- Mostrar los datos del usuario directamente sin escape para pruebas de inyección -->
        <p>Usuario: <?php echo $user_data['username']; ?></p>
        <p>Contraseña: <?php echo $user_data['password']; ?></p>
        <p>Correo Electrónico: <?php echo $user_data['email'] ?? 'No especificado'; ?></p>

        <form action="actualizar_correo.php" method="POST">
            <label for="email">Actualizar Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Nuevo Correo Electrónico">
            <button type="submit">Actualizar</button>
        </form>
        <a href="index.php?user=<?php echo urlencode($_SESSION['username']); ?>">Volver al inicio</a>
        <div class="contenedor_upload">
        <a href="upload.php" class="upload-button">Sube tu archivo</a>
        </div>
    </div>
</body>
</html>
