<?php

    class servicioPublicaciones{

        public function crearPublicacion($id_usuario, $titulo, $descripcion, $fecha){

            // Realizar la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "proyectoifp");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para insertar el formulario de contacto en la base de datos
        $sql = "INSERT INTO rutina (user_id, titulo, descripcion, fechaHora) VALUES (?, ?, ?, ?)";


        // Preparar la consulta
       $statement = $conexion->prepare($sql);
       if (!$statement) {
           die("Error al preparar la consulta: " . $conexion->error);
       }

       $statement->bind_param("isss",$id_usuario, $titulo, $descripcion,$fecha);

       $statement->execute();

       $statement->close();

       $conexion->close();


        }

       
    }
    
?>
