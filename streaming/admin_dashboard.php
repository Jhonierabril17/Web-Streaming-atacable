<?php
session_start();
include 'conexion.php';

/*/ Verificar si el administrador ha iniciado sesión
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin.php");
    exit();
}
*/
// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM stream";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="estilosadmin.css">
</head>
<body>
    <div class="admin-dashboard">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Correo Electrónico</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . ($row['email'] ?? 'No especificado') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="logout-button-container">
        <a href="Actualizar_admin.php" class="update-button">Actualizar o Eliminar</a>
        </div>
        <div class="logout-button-container">
        <a href="admin_logout.php" class="logout-button">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
