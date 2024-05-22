<?php

class servicioContacto {

    public function registroContacto($nombre, $email, $mensaje, $fecha, $id_usuario){



        // Realizar la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "proyectoifp");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }


        $errores = array();

        // Validaciones del servidor
        if (empty($nombre) || empty($email) || empty($mensaje)) {
            $errores[] = "Error: Alguno de los campos está vacío.";
        }

        // Validar que el nombre solo contenga letras y espacios
        if (!preg_match("/^[a-zA-Z ]+$/", $nombre)) {
            $errores[] = "Error: El nombre solo puede contener letras y espacios.";
        }

        // Validar que el email tenga un formato válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Error: El formato del correo electrónico es inválido.";
        }

        if (!empty($errores)) {
            // Redirigir a contacto.php con los errores como parámetro GET
            $errores_encoded = urlencode(json_encode($errores)); // Codificar los errores como URL
            header("Location: ../vistas/contact.php?errores=$errores_encoded");
            exit();
        }
        // Consulta SQL para insertar el formulario de contacto en la base de datos
        $sql = "INSERT INTO contacto (asunto, email, mensaje, fecha_envio, user_id) VALUES (?, ?, ?, ?, ?)";


        // Preparar la consulta
       $statement = $conexion->prepare($sql);
       if (!$statement) {
           die("Error al preparar la consulta: " . $conexion->error);
       }

       $statement->bind_param("ssssi", $nombre, $email, $mensaje, $fecha, $id_usuario);

       $statement->execute();

       $statement->close();

       $conexion->close();









    }
}


?>