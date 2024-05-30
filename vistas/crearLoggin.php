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
    <link href="../assets/css/crearLoggin.css" rel="stylesheet">

  </head>

  <body>

  <!-- SIDEBAR -->
  <?php
  include("inc/navigatorColum.php");
  ?>

  <!-- CABECERA CREAR PUBLICACIONES -->

  <form method="POST" action="../modelos/modeloCrearLoggin.php">
    <div id="contenedorPublicaciones">
      CREAR PUBLICACION
      <div id="container">
          <div class="caja">
              <div id="cabeceraPublicacion">
                  <div id="infoCabecera">
                      <div id="nUsuario" name="usuarioId">2</div>
                      <div id="fechaPublicacion" name="fechaHora"></div>
                  </div>
                  <div id="separadorCabecera"></div>
              </div>
              <div id="publicacion">
                <input type="text" id="tituloPublicacion" name="titulo" placeholder="Introducir Titulo">
                <textarea id="textoPublicacion" name="descripcion" placeholder="Introducir texto de la publicación"></textarea>
              </div>
          </div>
          <div id="contenedorBotones">
              <button id="publicar" value="publicar">PUBLICAR</button>
              <button id="borrar">BORRAR</button>
          </div>
      </div>
    </div>
  </form>

<script>
  // Evento al hacer scroll en la página
window.addEventListener("scroll", function() {
  // Verificar si el usuario ha llegado al final de la página
  if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
    cargarMasPublicaciones();
  }
});

/* SCRIPT PARA AÑADIR LA FECHA EN LA TABLA DE crearLoggin.php */
document.addEventListener('DOMContentLoaded', function() {
    const fechaPublicacion = document.getElementById('fechaPublicacion');
    const fechaActual = new Date();
    const opcionesFecha = {  day: 'numeric',month: 'numeric', year: 'numeric' };
    fechaPublicacion.textContent = fechaActual.toLocaleDateString('es-ES', opcionesFecha);
});
</script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/sidebars.js"></script>

  </body>
</html>
