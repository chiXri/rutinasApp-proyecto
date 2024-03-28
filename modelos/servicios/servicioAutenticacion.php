<?php 

    class ServicioAutenticacion{

        public static function validarUsuarioContrasena($usuario, $contrasena){
            // Debugging: Mostrar el usuario y la contraseña recibidos
            echo "Validando usuario: $usuario, contraseña: $contrasena<br>";
            
            $resultado = GestorBD::consultaLectura("SELECT contrasena FROM usuario WHERE nombre = ?", $usuario);
            var_dump($resultado); // Debugging: Mostrar el resultado de la consulta
        
            $hash = hash('sha256', $contrasena);
            echo "Hash de la contraseña: $hash<br>";
        
            return count($resultado) == 1 && $resultado[0]["contrasena"] == $hash;
        }
        
    }

?>