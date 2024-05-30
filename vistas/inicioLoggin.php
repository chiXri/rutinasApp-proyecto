<?php
    include_once __DIR__ . "/../modelos/servicios/servicioPublicaciones.php";

    // Crear una instancia del servicio
    $servicioPublicaciones = new servicioPublicaciones();

    // Obtener publicaciones
    $publicaciones = $servicioPublicaciones->listarPublicaciones();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Contacto</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="../assets/js/contact.js"></script>

    <!-- Custom styles for this template -->
    <link href="../assets/css/inicioLoggin.css" rel="stylesheet">

  </head>

  <body>

  
  <!-- SIDEBAR -->
  <?php
  include "inc/header.php";
  include("inc/navigatorColum.php");
  ?>
  <!-- SE MUESTRAN LAS PUBLICACIONES DE LA BASE DE DATOS  -->
  
  <div id="contenedorPublicaciones">
        <p>RUTINAS</p>
        <?php if (count($publicaciones) > 0): ?>
          <?php foreach ($publicaciones as $publicacion): ?>
            <div class="publicacion">
              <h2><?php echo htmlspecialchars($publicacion['titulo']); ?></h2>
              <p><?php echo htmlspecialchars($publicacion['descripcion']); ?></p>
              <small><?php echo htmlspecialchars($publicacion['fechaHora']); ?></small>
              <!-- Botones para compartir -->
                <div>
                    <!-- Botón para compartir en Facebook -->
                    <a class="share-button facebook" href="https://www.facebook.com/sharer/sharer.php?" target="_blank">
                        <i class="fab fa-facebook-f"></i> <!-- Icono de Facebook -->
                    </a>
                    <br>
                    <!-- Botón para compartir en Twitter -->
                    <a class="share-button twitter" href="https://twitter.com/intent/tweet?text=" target="_blank">
                        <i class="fab fa-twitter"></i> <!-- Icono de Twitter -->
                    </a>
                </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No hay publicaciones disponibles.</p>
        <?php endif; ?>  
      </div>


  
<script>
  // Evento al hacer scroll en la página
window.addEventListener("scroll", function() {
  // Verificar si el usuario ha llegado al final de la página
  if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
    cargarMasPublicaciones();
  }
});
</script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/sidebars.js"></script>

  </body>
</html>
