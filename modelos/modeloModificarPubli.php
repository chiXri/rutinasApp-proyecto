<?php
include_once __DIR__ . "/../modelos/servicios/servicioPublicaciones.php";
include_once __DIR__ . "/../modelos/modeloPublicacion.php";
include "./../lib/autenticacion.php"; 

// Crear una instancia del servicio
$servicioPublicaciones = new servicioPublicaciones();

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


if (!isset($_SESSION["usuario"])) {
    echo "<script>
        alert('Debes autenticarte para realizar esta acción');
        window.location.href = '../vistas/login.php';
      </script>";
    exit;
}


if (!isset($_GET["rutina_id"])) {
    echo "<script>
        alert('No se proporcionó el ID de la publicación');
        window.location.href = '../vistas/perfiluser.php';
      </script>";
    exit;
}

$rutina_id = $_GET["rutina_id"];

// Aquí deberías usar el servicio de publicaciones para obtener la publicación correspondiente al ID
$publicacion = $servicioPublicaciones->obtenerPublicacionPorId($rutina_id);

// Verifica si la publicación se obtuvo correctamente
if (!$publicacion) {
    echo "<script>
        alert('No se encontró la publicación correspondiente');
        window.location.href = '../vistas/perfiluser.php';
      </script>";
      
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Publicación</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/modificarPublicacion.css" rel="stylesheet">

</head>
<body>
<?php
  include "../vistas/inc/header.php";
  include("../vistas/inc/navigatorColum.php");
  ?>
<div class="container">
    <!-- Aquí va el formulario para modificar la publicación -->
    <?php include_once "../vistas/modificarPubli.php"?>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

