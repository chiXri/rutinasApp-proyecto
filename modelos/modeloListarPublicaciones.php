<?php 

include "../lib/GestorBD.php";

include "./servicios/servicioPublicaciones.php";

session_start();
$conexion = new GestorBD();

$conexion->conectar();

if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
} else {
    echo "<script>
        alert('Debes autenticarte para poder ver las publicaciones');
        window.location.href = '../vistas/login.php';
      </script>";
}



$publicaciones = new servicioPublicaciones();

$publicaciones->listarPublicaciones();






?>