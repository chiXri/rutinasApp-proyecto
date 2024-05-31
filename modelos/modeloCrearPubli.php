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
        alert('Debes autenticarte para crear una publicación');
        window.location.href = '../vistas/login.php';
      </script>";
}

$titulo = $_POST["categoria"];
$descripcion = $_POST["descripcion"];

$fecha = date("Y-m-d H:i:s");


$query = "SELECT user_id FROM usuario WHERE nombre = '$usuario'";
$resultado = mysqli_query($conexion->conectar(), $query);
$fila = mysqli_fetch_array($resultado);
$usuario_id =  $fila["user_id"];


$publicacion = new servicioPublicaciones();

$publicacion->crearPublicacion($usuario_id, $titulo, $descripcion, $fecha);

echo "<script>
        alert('Publicación creada correctamente');
        window.location.href = '../vistas/inicioLoggin.php';
      </script>";

?>

