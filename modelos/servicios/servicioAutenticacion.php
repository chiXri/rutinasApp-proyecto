<?php 

    class ServicioAutenticacion{

        public static function validarUsuarioContrasena($usuario, $contrasena){
            
            $resultado = GestorBD::consultaLectura("SELECT contrasena FROM usuarios WHERE nombre = ?", $usuario);

            $hash = hash('sha256', $contrasena);

            return count($resultado) == 1 && $resultado[0]["contrasena"] == $hash;

        }
    }

?>