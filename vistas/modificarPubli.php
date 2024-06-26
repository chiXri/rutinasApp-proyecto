<?php
include_once "../modelos/servicios/servicioPublicaciones.php";
include_once "../modelos/modeloPublicacion.php";
include_once "../lib/autenticacion.php"; 

// Crear una instancia del servicio
$servicioPublicaciones = new servicioPublicaciones();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    echo "<script>
        alert('Debes autenticarte para realizar esta acción');
        window.location.href = 'vistas/login.php';
      </script>";
    exit;
}

$usuarioId = $_SESSION["usuario"];

if (!isset($_GET["rutina_id"])) {
    echo "<script>
        alert('No se proporcionó el ID de la publicación');
        window.location.href = 'vistas/perfilLoggin.php';
      </script>";
    exit;
}

$rutina_id = $_GET["rutina_id"];
$publicacion = $servicioPublicaciones->obtenerPublicacionPorId($rutina_id, $usuarioId);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Publicación asf</title>


  </head>
  <body>
    <div id="contenedor">
    <div class="" >
    <div id="tituloCrearRutinas">MODIFICAR PUBLICACION</div>
      <form method="POST" action="../modelos/procesarModificacionPubli.php">
        <input type="hidden" name="rutina_id" value="<?php echo htmlspecialchars($publicacion->getId()); ?>">
        <div class="mb-3">
          <label for="titulo" class="form-label">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($publicacion->getTitulo()); ?>" required>
        </div>
        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo htmlspecialchars($publicacion->getDescripcion()); ?></textarea>
        </div>
        <div class="mb-3">
          <label for="fechaHora" class="form-label">Fecha y Hora</label>
          <input type="datetime-local" class="form-control" id="fechaHora" name="fechaHora" value="<?php echo htmlspecialchars($publicacion->getFechaHora()); ?>" required>
        </div>
        <div id="botones">
            <button id="botonModificar" class="boton" type="submit">Guardar cambios</button>
            <a href="../vistas/perfilUser.php" id="botonCancelar" class="boton">Cancelar</a>
        </div>

      </form>
    </div>
    </div>

    <script src="../assets/js/perfilUser.js"></script>
  </body>
</html>
