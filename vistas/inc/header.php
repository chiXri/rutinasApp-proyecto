<!-- CABECERA -->    
<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <img src="/rutinasApp-proyecto/assets/img/logo.png" style="width: 10%; padding: 5px;"/>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/rutinasApp-proyecto/index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/rutinasApp-proyecto/vistas/contact.php">CONTACTO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">SOCIAL</a>
          </li>
        </ul>
       
      </div>
      -->

      <?php
session_start();

// Función para comprobar si el usuario está autenticado
function usuario_autenticado() {
    return isset($_SESSION['usuario']); 
}
?>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if (usuario_autenticado()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/rutinasApp-proyecto/vistas/logout.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rutinasApp-proyecto/vistas/contact.php">Contacto</a>
                </li>
            <?php else: 
                header('Location: ./login.php');
                exit();
              ?>
                
            <?php endif; ?>
        </ul>
    </div>
    </div>

  </nav>
</header>