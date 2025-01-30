<?php
// upload.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upload_dir = 'uploads/'; // Directorio de destino
    $file = $_FILES['file'];
    $file_name = basename($file['name']);
    $target_path = $upload_dir . $file_name;

    /*/ Verificar el tipo de archivo (opcional, para mayor seguridad)
    $allowed_types = ['image/jpeg', 'image/png', 'video/mp4'];
    if (!in_array($file['type'], $allowed_types)) {
        echo "Tipo de archivo no permitido. Solo se permiten imágenes y videos.";
        exit;
    }*/

    // Verificar el tamaño del archivo (opcional, ajustar límite según necesidades)
    $max_size = 50 * 1024 * 1024; // 50MB
    if ($file['size'] > $max_size) {
        echo "El archivo es demasiado grande. Tamaño máximo: 50MB.";
        exit;
    }

    // Intentar mover el archivo al directorio de destino
    if (move_uploaded_file($file['tmp_name'], $target_path)) {
        echo "Archivo subido exitosamente.";
    } else {
        echo "Hubo un error al subir el archivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
    <link rel="stylesheet" href="estilosupload.css">
</head>
<body>
    <h2>Subir Archivo</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Selecciona el archivo:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Subir</button>
        <a href="perfil.php" class="logout-button">Cancelar</a>
    </form>
</body>
</html>