<?php 

class ServicioAutenticacion{

    public static function validarUsuarioContrasena($usuario, $contrasena){
        // Debugging: Mostrar el usuario y la contraseña recibidos
        echo "Validando usuario: $usuario, contraseña: $contrasena<br>";
        
        // Debugging: Mostrar la consulta SQL
        $consultaSQL = "SELECT contrasena FROM usuario WHERE nombre = ?";
        echo "Consulta SQL: $consultaSQL<br>";

        // Realizar la consulta a la base de datos
        $resultado = GestorBD::consultaLectura($consultaSQL, $usuario);

        // Debugging: Mostrar el resultado de la consulta
        echo "Resultado de la consulta: ";
        var_dump($resultado);
        
        // Calcular el hash de la contraseña recibida
        $hash = hash('sha256', $contrasena);
        echo "Hash de la contraseña: $hash<br>";
    
        // Comparar el hash de la contraseña con el hash almacenado en la base de datos
        $validacionExitosa = count($resultado) == 1 && $resultado[0]["contrasena"] == $hash;
        
        // Debugging: Mostrar el resultado de la validación
        echo "Validación de usuario y contraseña: " . ($validacionExitosa ? "Éxito" : "Fracaso") . "<br>";
    
        return $validacionExitosa;
    }
    
}

?>
