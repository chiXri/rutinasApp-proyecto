<?php
include_once __DIR__ . "/../../lib/GestorBD.php";
include_once __DIR__ . "/../entidad/publicacion.php";


    class servicioPublicaciones{

        public static function obtenerPublicaciones(){
            $resultado = GestorBD::consultaLectura("SELECT user_id, titulo, descripcion, fecha, imagen FROM rutina");
            
            $retorno=array();
            foreach($resultado as $fila){
                $fecha = new DateTime($fila["fecha"]);
                $publicacion= new Publicacion($fila["user_id"], $fila["titulo"], $fila["descripcion"],$fecha, $fila["imagen"] );

                array_push($retorno,$publicacion);
            }

/*             var_dump($retorno);
 */
            return $retorno;

            

        }
        

    }

/*     $retorno=servicioPublicaciones::obtenerPublicaciones();
 */
?>
