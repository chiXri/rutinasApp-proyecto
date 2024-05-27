<?php

    class servicioPublicaciones{

        public static function obtenerPublicaciones(){
            $resultado = MySqlBd::consultaLectura("SELECT * FROM rutina");
        
        }

    }

?>
