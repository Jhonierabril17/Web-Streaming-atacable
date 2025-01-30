<?php
session_start();
$user = isset($_GET['user']) ? $_GET['user'] : (isset($_SESSION['username']) ? $_SESSION['username'] : '');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Sitio de Streaming</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
 
  <header>
    <nav class="navbar">
      <h1 class="logo">StreamFlix</h1>
      <ul class="nav-links">
      <li><a href="index.php?user=<?php echo $_GET['user']; ?>">Inicio</a></li>
        <li><a href="#">Películas</a></li>
        <li><a href="#">Series</a></li>
        <li><a href="#">Novedades</a></li>
        <li><a href="perfil.php">Perfil</a></li>
        <li><a href="inicio.html">Cerrar sesion</a></li>
      </ul>
      <input type="text" placeholder="Buscar..." class="search-bar">
    </nav>
  </header>

  <section>
    <h2>Bienvenido, <?php echo $_GET['user']; ?> a StreamFlix</h2>
  </section>

  <section class="featured">
    <h2>Películas Destacadas</h2>
    <div class="movie-grid">
      <div class="movie-card">
        <img src="imagenes/imagen1.jpg" alt="Película 1">
        <h3>Spider-Verse</h3>
      </div>
      <div class="movie-card">
        <img src="imagenes/pelicula1.jpg" alt="Película 2">
        <h3>Rebel Ridge</h3>
      </div>
      <div class="movie-card">
        <img src="imagenes/pelicula2.jpg" alt="Película 3">
        <h3>Acuaman</h3>
      </div>
      <div class="movie-card">
        <img src="imagenes/pelicula3.jpg" alt="Película 3">
        <h3>Mision Imposible</h3>
      </div>
      <div class="movie-card">
        <img src="imagenes/pelicula4.png" alt="Película 3">
        <h3>Destino Final 3</h3>
      </div>
      <div class="movie-card">
        <img src="imagenes/pelicula5.png" alt="Película 3">
        <h3>Accidente</h3>
      </div>
    </div>
  </section>

  <section class="categories">
    <h2>Categorías</h2>
    <div class="category-grid">
      <div class="category-card">Acción</div>
      <div class="category-card">Comedia</div>
      <div class="category-card">Drama</div>
      <div class="category-card">Documentales</div>
    </div>
  </section>

  <footer>
    <p>&copy; 2024 StreamFlix. Todos los derechos reservados.</p>
    <p><a href="#">Términos de Uso</a> | <a href="#">Política de Privacidad</a></p>
  </footer>
</body>
</html>
