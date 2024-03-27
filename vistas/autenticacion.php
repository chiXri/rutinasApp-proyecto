
<?php 

include "../lib/GestorBD.php";
?>

<?php 

$conexion = GestorBD::conectar();

if ($conexion){

    echo "SE ha conectado";

}
else{
    echo "No se conecta";
}

$nombre = $_GET['nombre'];
$contrasena = $_GET['contrasena'];
$query = "SELECT * FROM usuario WHERE nombre= '$nombre' AND contrasena = '$contrasena'";
$resultado = mysqli_query($conexion, $query);

if (mysqli_num_rows($resultado) == 1){

    session_start();
    $_SESSION['nombre'] = $nombre;

    header('location: index.php');
} 
else{
    echo "Nombre o contraseña incorrecta";
}

mysqli_close($conexion);




?>