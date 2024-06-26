<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>
  <script src="/rutinasApp-proyecto/assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>DAYLY ROUTINE</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="/rutinasApp-proyecto/assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/rutinasApp-proyecto/assets/css/carousel.css" rel="stylesheet">
</head>
<body>
  <!-- HEADER -->
  <?php
    include "inc/header.php";
  ?>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
      aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
          aria-pressed="true">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div>


  <main>

    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
          </svg>
          <div class="container">
            <div class="carousel-caption text-start">
              <h1>¡Comienza con Fuerza Tu Viaje Épico!</h1>
              <p class="opacity-75">En el camino hacia el éxito, cada pequeño paso cuenta. Descubre el poder de tus
                elecciones diarias y cómo, paso a paso, te acercas a grandes logros.</p>
              <p><a class="btn btn-lg btn-primary" href="/rutinasApp-proyecto/vistas/registro.php">Registrate</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
          </svg>
          <div class="container">
            <div class="carousel-caption">
              <h1>¡Tu Transformación a un Precio Increíble!</h1>
              <p>¡Haz clic para conocer nuestras opciones de suscripción y dar un paso más hacia una rutina más
                productiva!"</p>
              <p><a class="btn btn-lg btn-primary" href="#">Elige tu plan</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
          </svg>
          <div class="container">
            <div class="carousel-caption text-end">
              <h1>Opiniones: </h1>
              <p>"Daily Routine transformó mi rutina diaria. La personalización es fácil, y los testimonios inspiran.
                Ofertas y redes sociales añaden un toque especial. ¡Recomiendo esta app para mejorar la productividad y
                la rutina!"</p>
              <p><a class="btn btn-lg btn-primary" href="#">Ver más</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <!-- Marketing messaging and featurettes
  ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing"></div>

    <!-- Three columns of text below  the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="/rutinasApp-proyecto/assets/img/crecimientoPersonal.png" alt="Crecimiento Personal"
          class="bd-placeholder-img rounded-circle" width="140" height="140">
        <h2 class="fw-normal">Crecimiento Personal</h2>
        <p>Descubre rutinas que fortalecerán tu mente y fomentarán tu desarrollo personal. Desde prácticas de
          mindfulness hasta establecer objetivos diarios, estas rutinas te guiarán hacia un crecimiento positivo y una
          mentalidad enfocada.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Ver más &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="/rutinasApp-proyecto/assets/img/bienestar.png" alt="Bienestar" class="bd-placeholder-img rounded-circle" width="140"
          height="140">
        <h2 class="fw-normal">Bienestar</h2>
        <p>Explora rutinas diseñadas para mejorar tu bienestar físico y emocional. Desde ejercicios y actividades al
          aire libre hasta momentos de relajación, estas rutinas te ayudarán a mantener un equilibrio saludable en tu
          vida diaria.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Ver más &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="/rutinasApp-proyecto/assets/img/productividad.png" alt="productividad" class="bd-placeholder-img rounded-circle"
          width="140" height="140">
        <h2 class="fw-normal">Productividad</h2>
        <p>Optimiza tu día con rutinas eficientes que abordan tareas y responsabilidades diarias. Desde la mañana hasta
          la noche, estas rutinas te ayudarán a ser más productivo y organizado en tu vida cotidiana.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Ver más &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->



    <hr class="featurette-divider">

  </main>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>

  <!-- FOOTER -->
  <?php
    include "inc/footer.php";
  ?>

</body>

</html>