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

    <script src="../assets/js/contact.js"></script>

    <!-- Custom styles for this template -->
    <link href="../assets/css/inicioLoggin.css" rel="stylesheet">

  </head>

  <body>

  <!-- SIDEBAR -->
  <?php
  include("inc/navigatorColum.php");
  ?>


  <!-- BODY PUBLICACIONES -->
  <div id="container">

  <!-- CABECERA CREAR PUBLICACIONES -->
  <div id="cabeceraLoggin">
    CREAR PUBLICACION
  </div>
  <div id="barraCab"></div>

    <div class="caja">
      <div id="nUsuario">Jefferson V.</div>
      <div id="publicacion">
        <textarea id="textoPublicacion"></textarea>
      </div>
    </div>
    <div id="contenedorBotones">
      <button id="publicar">PUBLICAR</button>
      <button id="borrar">BORRAR</button>
    </div>

    <div class="publicaciones">
      <div id="nUsuario">Jefferson V.</div>
      <div id="publicacion">
        Esta es una publicación de ejemplo
      </div>
    </div>
    <div id="contenedorBotones">
      <button id="borrar">BORRAR</button>
    </div>  
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