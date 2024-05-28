<?php

    class servicioPublicaciones{

        public static function obtenerPublicaciones(){
            $resultado = MySqlBd::consultaLectura("SELECT * FROM rutina");
            print_r(json_encode($resultado));
        
        }

    }

?>
