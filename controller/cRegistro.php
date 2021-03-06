<?php
/**
 * Controlador de la página de registro.
 *
 * Fichero que contiene el controlador de la página de registrar los usuarios.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Registrar.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
$entradaOk=true;
$error="";

if(isset($_POST['cancelar'])){
    header('Location: index.php');//Si cancelamos, volveremos a la página de login.
}
/**
 * Si pulsamos en registrar, realizaremos la validación de los campos, pasando como parámetros las cadenas,
 * las longitudes máximas y mínimas y si el campo es o no obligatorio.
 */
if(isset($_POST['registrar'])){
    $mensajeError["errorUsuario"]= validacionFormularios::comprobarAlfaNumerico($_POST['codUsuario'], 10, 1, 1);// comprobamos el campo nombre
    $mensajeError['errorNombre'] = validacionFormularios::comprobarAlfabetico($_POST['nombre'],20,3,1);
    $mensajeError['errorApellidos'] = validacionFormularios::comprobarAlfabetico($_POST['apellidos'],50,1,0);
    $mensajeError['errorPassword']= validacionFormularios::comprobarAlfaNumerico($_POST['password'], 255, 4, 1); //comprobamos el campo fecha
    $mensajeError['errorRepPassword'] = validacionFormularios::comprobarAlfaNumerico($_POST['repPassword'],255,4,1);
    $mensajeError['errorEmail'] = validacionFormularios::validarEmail($_POST['email'],100,5,0);
    $mensajeError['errorWeb'] = validacionFormularios::validarURL($_POST['web'],0);
    if ($_POST['password']!=$_POST['repPassword']){
        $mensajeError["errorPasswordNoIgual"]="Las contraseñas tienen que ser iguales!";
    }
    if(Usuario::comprobarExisteUsuario($_POST['codUsuario'])){
        $mensajeError["errorUsuarioRepetido"]="El usuario ya existe";//Comprobamos que el identificador de usuario no está cogido.
    }
    foreach ($mensajeError as &$valor){ //recorremos los mensajes de error
        if ($valor!=null){ //si el mensaje de error NO esta vacio
            $entradaOk=false; // la variable de tratamiento de errores sera falsa y mostraremos los errores
        }
    }
}

if (isset($_POST['registrar']) && $entradaOk){
    /**
     * Si todo está correcto, realizaremos el cifrado de la contraseña,
     * registraremos el usuario y crearemos el directorio del usuario.
     */
    $password=hash('sha256',$_POST['password']);
    $directorio = $_POST['codUsuario'];
    $usuario=Usuario::registrarUsuario($_POST['codUsuario'],$_POST['nombre'],$_POST['apellidos'],$password,$_POST['perfil'],$_POST['email'],$_POST['web']); //creamos el usuario
    if (is_null($usuario)){
        /**
         * Si el usuario no es creado, volveremos a mostrar la página de registro
         */
        $_GET['pagina']='registro';
        require_once 'view/layout.php';
    }else{
        /**
         * En el caso de que el usuario sea registrado, lo cargaremos en la sesión,
         * crearemos el directorio con su identificador de usuario y lo enviaremos a la página de inicio.
         */
        if(!isset($_SESSION['usuario'])){
            $_SESSION['usuario']=$usuario;
            if($_SESSION['usuario']->getPerfil()=="Usuario"){
                mkdir($directorio,0777,true);
            }
            $_GET['pagina']='inicio';
            header("Location: index.php?pagina=inicio");
        }else{
            if($usuario->getPerfil()=="Usuario"){
                mkdir($directorio,0777,true);
            }
            $_GET['pagina']='usuarios';
            header("Location: index.php?pagina=usuarios");
        }

    }
}
$_GET['pagina']='registro';
require_once('view/layout.php');
?>