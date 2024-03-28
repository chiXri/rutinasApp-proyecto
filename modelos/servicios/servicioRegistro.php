<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica si se recibieron los datos del formulario
if (isset($_POST["nombre"]) && isset($_POST["contrasena"])) {
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    
    // Realiza cualquier validación adicional aquí
    if (empty($nombre) || empty($contrasena)) {
        echo "Error: Nombre de usuario o contraseña vacía.";
        exit();
    }
    
    // Hash de la contraseña
    $hash_contrasena = hash('sha256', $contrasena);
    
    // Realizar la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "proyectoifp");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta SQL para insertar el usuario y la contraseña en la base de datos
    $sql = "INSERT INTO usuarios (nombre, contrasena) VALUES (?, ?)";
    
    // Preparar la consulta
    $statement = $conexion->prepare($sql);
    if (!$statement) {
        die("Error al preparar la consulta: " . $conexion->error);
    }
    
    // Vincular los parámetros y ejecutar la consulta
    $statement->bind_param("ss", $nombre, $hash_contrasena);
    if ($statement->execute()) {
        echo "Usuario registrado exitosamente.<br>";
        // Redirige al usuario a la página de inicio de sesión mediante un enlace
        echo '<p>Usuario registrado exitosamente. <a href="/rutinasApp-proyecto/vistas/login.php">Ir a iniciar sesión</a></p>';
    } else {
        echo "Error al registrar el usuario: " . $statement->error . "<br>";
    }

    // Cerrar la conexión a la base de datos
    $statement->close();
    $conexion->close();
} else {
    echo "Error: No se recibieron los datos del formulario.";
}
?>
