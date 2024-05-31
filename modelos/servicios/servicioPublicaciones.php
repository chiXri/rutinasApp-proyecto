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

        public function listarPublicaciones() {
            // Realizar la conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "proyectoifp");
        
            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
        
            // Consulta SQL para listar las rutinas junto con el nombre del usuario
         // Consulta SQL para listar las rutinas junto con el nombre del usuario y ordenar por fecha descendente
            $sql = "SELECT rutina.*, usuario.nombre AS usuario 
            FROM rutina 
            JOIN usuario ON rutina.user_id = usuario.user_id
            ORDER BY rutina.fechaHora DESC";

        
            $result = $conexion->query($sql);
        
            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                $publicaciones = array();
                while ($row = $result->fetch_assoc()) {
                    $publicaciones[] = $row;
                }
                $conexion->close();
                return $publicaciones;
            } else {
                $conexion->close();
                return array();
            }
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

        public function borrarPublicacion($id_publicacion) {
            // Realizar la conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "proyectoifp");
        
            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
        
            // Consulta SQL para borrar la publicación en la base de datos
            $sql = "DELETE FROM rutina WHERE rutina_id = ?";
        
            // Preparar la consulta
            $statement = $conexion->prepare($sql);
            if (!$statement) {
                die("Error al preparar la consulta: " . $conexion->error);
            }
        
            // Vincular el parámetro de ID de publicación
            $statement->bind_param("i", $id_publicacion);
        
            // Ejecutar la consulta
            $resultado = $statement->execute();
        
            // Verificar si la consulta se ejecutó correctamente
            if ($resultado) {
                // La publicación se eliminó correctamente
                return true;
            } else {
                // Ocurrió un error al eliminar la publicación
                die("Error al eliminar la publicación: " . $statement->error);
            }
        
            // Cerrar la consulta y la conexión
            $statement->close();
            $conexion->close();
        }
        
        public function modificarPublicacion($publicacion) {
            // Realizar la conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "proyectoifp");
        
            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
        
            // Consulta SQL para actualizar la publicación en la base de datos
            $sql = "UPDATE rutina SET titulo = ?, descripcion = ?, fechaHora = ? WHERE rutina_id = ?";
        
            // Preparar la consulta
            $statement = $conexion->prepare($sql);
            if (!$statement) {
                die("Error al preparar la consulta: " . $conexion->error);
            }
        
            // Vincular los parámetros
            $statement->bind_param("sssi", $publicacion->getTitulo(), $publicacion->getDescripcion(), $publicacion->getFechaHora(), $publicacion->getId());
        
            // Ejecutar la consulta
            $resultado = $statement->execute();
        
            // Verificar si la consulta se ejecutó correctamente
            if ($resultado) {
                $statement->close();
                $conexion->close();
                return true;
            } else {
                $statement->close();
                $conexion->close();
                return false;
            }
        }

        public function obtenerPublicacionPorId($id) {
            // Realizar la conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "proyectoifp");
        
            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
        
            // Consulta SQL para obtener la publicación por ID y usuario
            $sql = "SELECT * FROM rutina WHERE rutina_id = ?";
        
            // Preparar la consulta
            $statement = $conexion->prepare($sql);
            if (!$statement) {
                die("Error al preparar la consulta: " . $conexion->error);
            }
        
            // Vincular los parámetros
            $statement->bind_param("i", $id);
        
            // Ejecutar la consulta
            $statement->execute();
        
            // Obtener el resultado
            $resultado = $statement->get_result();
            $publicacion = $resultado->fetch_assoc();
        
            // Cerrar la consulta y la conexión
            $statement->close();
            $conexion->close();
        
            // Devolver el resultado como un objeto de la clase Publicacion
            if ($publicacion) {
                return new Publicacion(
                    $publicacion['rutina_id'],
                    $publicacion['titulo'],
                    $publicacion['descripcion'],
                    $publicacion['fechaHora'],
                    $publicacion['user_id']
                );
            } else {
                return null;
            }
        }
        
        
        
        
        

       
    }
    
?>
