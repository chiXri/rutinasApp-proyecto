<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errores = array();

// Verifica si se recibieron los datos del formulario
if (isset($_POST["nombre"]) && isset($_POST["contrasena"]) && isset($_POST["apellidos"]) && isset($_POST["edad"]) && isset($_POST["email"])&& isset($_POST["genero"])) {
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $genero = $_POST["genero"];
    
    // Realiza cualquier validación adicional aquí
    if (empty($nombre) || empty($contrasena) || empty($apellidos) || empty($edad) || empty($email) || empty($genero)) {
        $errores[] = "Error: Alguno de los campos está vacío.";
        exit();
    }

    // Validar que el nombre y los apellidos contengan solo letras y no estén vacíos
if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
    $errores[] = "Error: El nombre solo puede contener letras.";
}

if (!preg_match("/^[a-zA-Z ]+$/", $apellidos)) {
    $errores[] = "Error: Los apellidos solo pueden contener letras.";
}

// Validar que el email contenga al menos una arroba
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] ="Error: El formato del correo electrónico es inválido.";
}

if (!empty($errores)) {
    // Mostrar errores en un push up
    echo '<div style="color: red; margin-top: 10px;">';
    echo '<strong>Errores:</strong><br>';
    foreach ($errores as $error) {
        echo $error . '<br>';
    }
    echo '</div>';
    // Detener la ejecución del script si hay errores
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
    $sql = "INSERT INTO usuario (nombre, apellidos, edad, email, genero, contrasena) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Preparar la consulta
    $statement = $conexion->prepare($sql);
    if (!$statement) {
        die("Error al preparar la consulta: " . $conexion->error);
    }
    
    // Vincular los parámetros y ejecutar la consulta
    $statement->bind_param("ssisis", $nombre, $apellidos, $edad, $email, $genero, $hash_contrasena);
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
