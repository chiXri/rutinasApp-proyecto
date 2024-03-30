

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
    
  </head>

  <body>

  <?php
  include "inc/navigatorColum.php";
  ?>
  <!-- FORM -->
  <div class="container">
    <div class="contact-info">
        <form action="#" method="POST">
            <div class="form-group">
                <img id="logoContainer" src="../assets/img/logo.png" alt="logoForm">
            </div>
            <div class="form-group">
              <b>Teléfono:</b>
              <a> +34 999-999-999</a>
            </div>
            <div class="form-group">
              <b>eMail:</b>
              <a>info@dailyroutine.com</a>                
            </div>
            <div class="form-group">
              <b>Horario:</b>
                <a>Lunes - Viernes</a>
                <a>08:00 - 20:00</a>
            </div>
        </form>
    </div>
    <div class="contact-form">
      <h2>Formulario de Contacto</h2>
      <form action="#" method="POST" id="formularioContacto">
          <div class="form-group">
              <label for="nombre">Nombre:</label>
              <input type="text" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
              <label for="mensaje">Mensaje:</label>
              <textarea id="mensaje" name="mensaje" required></textarea>
          </div>
          <button type="submit">Enviar</button>
      </form>
  </div>
</div>
    

</main>




<script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/sidebars.js"></script>
    </div>

  </body>
</html>
