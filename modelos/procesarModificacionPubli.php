<?php
include "../lib/GestorBD.php";
include "./servicios/servicioPublicaciones.php";
include "./modeloPublicacion.php";

session_start();

if (!isset($_SESSION["usuario"])) {
    echo "<script>
        alert('Debes autenticarte para realizar esta acción');
        window.location.href = '../vistas/login.php';
      </script>";
    exit;
}

if (!isset($_POST["rutina_id"])) {
    echo "<script>
        alert('No se proporcionó el ID de la publicación');
        window.location.href = '../vistas/perfilUser.php';
      </script>";
    exit;
}

$rutina_id = $_POST["rutina_id"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$fechaHora = $_POST["fechaHora"];

$publicacion = new Publicacion($rutina_id, $titulo, $descripcion, $fechaHora);
$servicioPublicaciones = new servicioPublicaciones();

$resultado = $servicioPublicaciones->modificarPublicacion($publicacion);

if ($resultado) {
    echo "<script>
        alert('Publicación modificada correctamente');
        window.location.href = '../vistas/perfilUser.php';
      </script>";
} else {
    echo "<script>
        alert('Error al modificar la publicación');
        window.location.href = '../vistas/perfilUser.php';
      </script>";
}
?>

