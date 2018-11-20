<?php
/**
 * Controlador del mantenimiento de usuarios
 *
 * Fichero que contiene el controlador de la página del administrador para modificar un usuario
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Usuarios.
 * @package Controlador.
 * @copyright 20 de noviembre de 2018
 */
if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php.
    header("Location: index.php");
}else {
    $entradaOk = true;
    $error = "";
    $mensajeError = "";
    $nombre = "";
    $apellidos = "";
    $passwd = "";
    $repPasswd = "";
    $email = "";
    $web = "";
    $usuario = Usuario::consultarUsuario($_GET['codUsuario']);
    if(isset($_POST['eliminar'])){
        if(Usuario::borrarUsuario($_GET['codUsuario'])){
            Curriculum::eliminarDirectorio($_GET['codUsuario']);
            $_GET['pagina']="usuarios";
            include_once 'view/layout.php';
        }else{
            $errorPasswordEliminar = "No se ha podido eliminar";
            $_GET['pagina']="usuario";
            include_once 'view/layout.php';
        }
    }
    if (isset($_POST['aceptar'])){
        if(!isset($_POST['nombre'])){
            $nombre = $usuario->getNombre();
        }else{
            $nombre = $_POST['nombre'];
        }
        if(!isset($_POST['apellidos'])){
            $apellidos = $usuario->getApellidos();
        }else{
            $apellidos = $_POST['apellidos'];
        }
        if(!isset($_POST['password'])){
            $passwd = $usuario->getPassword();
        }else{
            $passwd = $_POST['password'];
        }
        if(!isset($_POST['repPassword'])){
            $repPasswd = $usuario->getPassword();
        }else{
            $repPasswd = $_POST['repPassword'];
        }
        if(!isset($_POST['email'])){
            $email = $usuario->getEmail();
        }else{
            $email = $_POST['email'];
        }
        if(!isset($_POST['web'])){
            $web = $usuario->getWeb();
        }else{
            $web = $_POST['web'];
        }
        $mensajeError['errorNombre'] = validacionFormularios::comprobarAlfabetico($nombre,20,3,0);
        $mensajeError['errorApellidos'] = validacionFormularios::comprobarAlfabetico($apellidos,50,1,0);
        $mensajeError['errorPassword']= validacionFormularios::comprobarAlfaNumerico($passwd, 255, 4, 0); //comprobamos el campo fecha
        $mensajeError['errorRepPassword'] = validacionFormularios::comprobarAlfaNumerico($repPasswd,255,4,0);
        $mensajeError['errorEmail'] = validacionFormularios::validarEmail($email,100,5,0);
        $mensajeError['errorWeb'] = validacionFormularios::validarURL($web,0);
        if ($passwd!=$repPasswd){
            $mensajeError["errorPasswordNoIgual"]="Las contraseñas tienen que ser iguales!";
        }
        /**
         * Recorremos el array de errores, en el caso de que haya alguno pondremos la variable de entrada a false.
         */
        foreach ($mensajeError as &$valor){
            if ($valor!=null){
                $entradaOk=false;
            }
        }
    }

    if (isset($_POST['aceptar']) && $entradaOk==true) {  //si se ha pulsado enviar y no ha habido errores
        if (!empty($_POST['password']) && $mensajeError['errorPasswordNoIgual'] == null) { //comprobamos si la contraseña no esta vacia
            $password = hash('sha256', $_POST['password']);//Si no está vacia, realizamos el agoritmo de encriptado.
        } else {
            $password = hash('sha256', $_SESSION['usuario']->getPassword());//De lo contrario, lo haremos con la que ya tenemos
        }
        /**
         * En el caso de que el usuario sea editado, volveremos a la página de inicio,
         * de lo contrario mostraremos un error y volveremos a cargar la página del perfil.
         */
        if (Usuario::editarUsuario($nombre, $apellidos, $password, $email, $web, $_POST['codUsuario'])) { //comrpobamos si se puede editar el usuario
            //header('Location: index.php?pagina=inicio');
            $_GET["pagina"] = "usuario";
            include_once 'view/layout.php';
        } else { //si no se ha podido editar
            $mensajeError['errorEditar'] = "Error al editar el Perfil";  //mostramos el error
            $_GET["pagina"] = "usuario";
            include_once 'view/layout.php';
        }
    }
    $_GET['pagina'] = 'usuario';
    require_once('view/layout.php');
}
?>