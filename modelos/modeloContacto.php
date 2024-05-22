<?php

include "../lib/GestorBD.php";

include "./servicios/servicioContacto.php";

session_start();
$conexion = new GestorBD();

$conexion->conectar();

if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
} else {
    echo "<script>
        alert('Debes autenticarte para enviar el formulario');
        window.location.href = '../vistas/login.php';
      </script>";
}

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];
$fecha = date("Y-m-d H:i:s");


$query = "SELECT user_id FROM usuario WHERE nombre = '$usuario'";
$resultado = mysqli_query($conexion->conectar(), $query);
$fila = mysqli_fetch_array($resultado);
$usuario_id =  $fila["user_id"];





$contacto = new servicioContacto();

$contacto->registroContacto($nombre, $email, $mensaje, $fecha, $usuario_id);

echo "<script>
        alert('Formulario enviado correctamente');
        window.location.href = '../vistas/inicioLoggin.php';
      </script>";

?>