<?php
include_once __DIR__ . "/../../lib/GestorBD.php";
include_once __DIR__ . "/../entidad/publicacion.php";


    class servicioPublicaciones{

        /** FUNCION PARA OBTENER LAS PUBLICACIONES DE LA BD */
        public static function obtenerPublicaciones(){
            $resultado = GestorBD::consultaLectura("SELECT user_id, titulo, descripcion, fechaHora FROM rutina");
            
            $retorno=array();
            foreach($resultado as $fila){
                $fecha = new DateTime($fila["fechaHora"]);
                $publicacion= new Publicacion($fila["user_id"], $fila["titulo"], $fila["descripcion"],$fecha );

                array_push($retorno,$publicacion);
            }

/*             var_dump($retorno);
 */
            return $retorno;
        }
    }
        /** FUNCION PARA INSERTAR OFERTAS EN LA BD */

/*     $retorno=servicioPublicaciones::obtenerPublicaciones();
 */
?>
