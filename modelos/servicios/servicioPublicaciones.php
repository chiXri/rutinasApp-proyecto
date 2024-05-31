<?php

    class servicioPublicaciones{

        public function crearPublicacion($id_usuario, $titulo, $descripcion, $fecha){

                // Realizar la conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "proyectoifp");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta SQL para insertar la rutina en la base de datos
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


        public function listarPublicaciones(){

               // Realizar la conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "proyectoifp");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta SQL para listar las rutinas en la base de datos
            $sql = "SELECT * FROM rutina";

            $result = $conexion->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            $publicaciones = array();
            while ($row = $result->fetch_assoc()) {
                $publicaciones[] = $row;
            }
            return $publicaciones;
        } else {
            return array();
        }

        $conexion->close();




        }

        public function listarPublicacionesUsuario($nombreUsuario) {
            // Realizar la conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "proyectoifp");
        
            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
        
            // Consulta SQL para listar las publicaciones del usuario con el nombre especificado
            $sql = "SELECT rutina.* FROM rutina 
                    INNER JOIN usuario ON rutina.user_id = usuario.user_id 
                    WHERE usuario.nombre = ?";
        
            // Preparar la declaración SQL
            $stmt = $conexion->prepare($sql);
            if ($stmt === false) {
                die("Error al preparar la consulta: " . $conexion->error);
            }
        
            // Vincular el parámetro del nombre del usuario
            $stmt->bind_param("s", $nombreUsuario);
        
            // Ejecutar la consulta
            $stmt->execute();
        
            // Obtener el resultado
            $result = $stmt->get_result();
        
            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                $publicaciones = array();
                while ($row = $result->fetch_assoc()) {
                    $publicaciones[] = $row;
                }
                $stmt->close();
                $conexion->close();
                return $publicaciones;
            } else {
                $stmt->close();
                $conexion->close();
                return array();
            }
        }
        
        
        

       
    }
    
?>
