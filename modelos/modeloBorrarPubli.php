<?php 
include "../lib/GestorBD.php";
include "./servicios/servicioPublicaciones.php";

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
        window.location.href = '../vistas/perfilLoggin.php';
      </script>";
    exit;
}

$rutina_id = $_POST["rutina_id"];
$publicacion = new servicioPublicaciones();

$resultado = $publicacion->borrarPublicacion($rutina_id);

if ($resultado) {
    echo "<script>
        alert('Publicación borrada correctamente');
        window.location.href = '../vistas/perfilUser.php';
      </script>";
} else {
    echo "<script>
        alert('Error al borrar la publicación');
        window.location.href = '../vistas/perfilUser.php';
      </script>";
}
?>