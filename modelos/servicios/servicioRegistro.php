<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ServicioRegistro  {


    public function registroUsuario($nombre, $contrasena, $apellidos, $edad, $email, $genero){
        $errores = array();

// Realizar la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "proyectoifp");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verifica si se recibieron los datos del formulario
if (isset($_POST["nombre"]) && isset($_POST["contrasena"]) && isset($_POST["apellidos"]) && isset($_POST["edad"]) && isset($_POST["email"])&& isset($_POST["genero"])) {
    
    
    // Realiza cualquier validación adicional aquí
    if (empty($nombre) || empty($contrasena) || empty($apellidos) || empty($edad) || empty($email) || empty($genero)) {
        $errores[] = "Error: Alguno de los campos está vacío.";
        exit();
    }

    // Consulta a la base de datos para verificar si el correo electrónico ya está registrado
$sqlEmail = "SELECT COUNT(*) as count FROM usuario WHERE email = ?";
$preparacion = $conexion->prepare($sqlEmail);
$preparacion->bind_param("s", $email);
$preparacion->execute();
$result = $preparacion->get_result();
$usuario_existente = $result->fetch_assoc();

// Verificar si ya existe un usuario con el mismo correo electrónico
if ($usuario_existente['count'] > 0) {
    // El correo electrónico ya está registrado, mostrar mensaje de error
    $errores[] = "El correo electrónico ya está registrado en nuestra base de datos.";
} 

    // Validar que el nombre y los apellidos contengan solo letras y espacios y no estén vacíos
if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
    $errores[] = "Error: El nombre solo puede contener letras.";
}

if (!preg_match("/^[a-zA-Z ]+$/", $apellidos)) {
    $errores[] = "Error: Los apellidos solo pueden contener letras.";
}

//Validar que el usuario sea mayor de edad

if ($edad < 18){
    $errores[] = "La edad mínima es 18 años";
}

// Validar que el email contenga al menos una arroba
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] ="Error: El formato del correo electrónico es inválido.";
}

if (!empty($errores)) {
    // Redirigir a registro.php con los errores como parámetro GET
    $errores_encoded = urlencode(json_encode($errores)); // Codificar los errores como URL
    header("Location: ../vistas/registro.php?errores=$errores_encoded");
    exit();
}

    
    // Hash de la contraseña
    $hash_contrasena = hash('sha256', $contrasena);
    
    

    // Consulta SQL para insertar el usuario y la contraseña en la base de datos
    $sql = "INSERT INTO usuario (nombre, apellidos, edad, email, genero, contrasena) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Preparar la consulta
    $statement = $conexion->prepare($sql);
    if (!$statement) {
        die("Error al preparar la consulta: " . $conexion->error);
    }
    
    // Vincular los parámetros y ejecutar la consulta
    $statement->bind_param("ssisss", $nombre, $apellidos, $edad, $email, $genero, $hash_contrasena);
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
}
}

?>