<?php
// Actualizar_admin.php
session_start();
require 'conexion.php';

/*/ Verificar que el usuario sea un administrador
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin.php");
    exit();
}
*/
// Obtener todos los usuarios de la tabla "stream"
$sql = "SELECT * FROM stream";
$result = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lista de Usuarios</title>
    <link rel="stylesheet" href="estilosadmin.css">
</head>
<body>
    <div class="usuarios-container">
        <h2 class="title">Lista de Usuarios</h2>
        <table>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Correo Electrónico</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <form action="update_user.php" method="POST">
                        <td><input type="text" name="username" value="<?php echo htmlspecialchars($row['username']); ?>"></td>
                        <td><input type="text" name="password" value="<?php echo htmlspecialchars($row['password']); ?>"></td>
                        <td><input type="text" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"></td>
                        <td>
                            <!-- Campo oculto para identificar al usuario a actualizar -->
                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="update-button">Actualizar</button>
                        </td>
                    </form>
                    <td>
                    <form method="POST" action="delete_user.php" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="delete-button">Eliminar</button>
                    </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <div class="logout-button-container">
            <a href="admin_dashboard.php" class="logout-button">Cancelar</a>
        </div>
        <div class="logout-button-container">
            <a href="admin_logout.php" class="logout-button">Cerrar sesión</a>
        </div>
        
    </div>
</body>
</html>
