<?php
/**
 * Controlador del login
 *
 * Fichero que contiene el controlador de la página para entrar.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Login.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */

$entradaOk=true;
$error="";

if(isset($_POST['entrar'])){ //si existe enviar enviamos el usuario y cotraseña introducidos
    $mensajeError["errorUsuario"]= validacionFormularios::comprobarAlfabetico($_POST['codUsuario'], 10, 1, 1);// comprobamos el campo nombre
    $mensajeError["errorPassword"]= validacionFormularios::comprobarAlfaNumerico($_POST['password'], 255, 4, 1); //comprobamos el campo fecha

    foreach ($mensajeError as &$valor){ //recorremos los mensajes de error
        if ($valor!=null){ //si el mensaje de error NO esta vacio
            $entradaOk=false; // la variable de tratamiento de errores sera falsa y mostraremos los errores
        }
    }
}
if (isset($_POST['entrar']) && $entradaOk==true){
    $codUsuario = $_POST['codUsuario'];
    $password=$_POST['password'];
    $usuario= Usuario::validarUsuario($codUsuario, $password); //comprobamos si el usuario y la contraseña son correctos

    if(is_null($usuario)){ //si el usuario no existe, guardamos un mensaje de error
        $error="usuario o contraseña incorrectos";
        $_GET['pagina']='login';
        require_once 'view/layout.php';
    }else{
        $_SESSION['usuario']=$usuario;//
        header("Location: index.php?pagina=inicio");
    }

}
$_GET['pagina']='login';
require_once('view/layout.php');
?>