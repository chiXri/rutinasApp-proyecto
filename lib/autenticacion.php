<?php 
include "../modelos/servicios/servicioAutenticacion.php";
    class Autenticacion{

        const claveUsuario = "usuario";
        const cookieUsuario = "usuario";

        public static function estaAutenticado(){
            return isset($_SESSION[self::claveUsuario]);
        }

        public static function obtenerUsuario(){

            if (self::estaAutenticado()){

                return $_SESSION[self::claveUsuario];
            }
            else{
                return '';
            }
        }

        public static function autenticar($nombre, $contrasena){
            if (ServicioAutenticacion::validarUsuarioContrasena($nombre, $contrasena)){
                $_SESSION[self::claveUsuario] = $nombre;
                setcookie(self::cookieUsuario, $nombre);
                return true;
            }
            else{
                echo "Autenticación fallida<br>";
                return false;
            }
        }
        
        public static function obtenerCookieUsuario(){

            if (isset($_COOKIE[self::cookieUsuario])){
                return $_COOKIE[self::cookieUsuario];
            }
            else{
                return '';
            }
        }
    }
?>