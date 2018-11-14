<?php
/**
 * Controlador del perfil.
 *
 * Fichero que contiene el controlador de la página del perfil.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Perfil.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php.
    header("Location: index.php");
}else{
    $entradaOk=true;
    $error="";
    $mensajeError="";
    $nombre = "";
    $apellidos = "";
    $passwd = "";
    $repPasswd = "";
    $email = "";
    $web = "";
    if(isset($_POST['cancelar'])){
        header("Location: index.php?pagina=inicio");//Si pulsamos cancelar volveremos a la página de inicio.
    }
    if(isset($_POST['eliminar'])){
        /**
         * En caso de pulsar eliminar realizaremos la validación del usuario, ya que para eliminar hemos solicitado su contraseña,
         * en el caso de que sea válido también eliminaremos su directorio con todo lo que haya dentro y cerraremos la sesión del mismo.
         * De lo contrario mostraremos un mensaje de error, y volveremos a mostrar la página del perfil.
         */
        if($_SESSION['usuario']->validarUsuario($_POST['codUsuario'],$_POST['passwordEliminar'])){
            if(!$_SESSION['usuario']->borrarUsuario($_SESSION['usuario']->getCodUsuario())){
                Curriculum::eliminarDirectorio($_SESSION['usuario']->getCodUsuario());
                unset($_SESSION['usuario']);
                session_destroy();
                header('Location: index.php');
            }else{
                $errorPasswordEliminar = "No se ha podido eliminar";
                $_GET['pagina']="perfil";
                include_once 'view/layout.php';
            }
        }else{
            $errorPasswordEliminar = "Contraseña incorrecta";
            $_GET['pagina']="perfil";
            include_once 'view/layout.php';
        }
    }
    /**
     * En el caso de pulsar en aceptar, realizaremos la validación de los campos y en caso de que haya errores, los cargaremos en un array de errores.
     * Para la validación pasaremos como parametros la cadena a validar, la longitud máxima y mínima y si es o no obligatorio.
     */
    if (isset($_POST['aceptar'])){
        if(!isset($_POST['nombre'])){
            $nombre = $_SESSION['usuario']->getNombre();
        }else{
            $nombre = $_POST['nombre'];
        }
        if(!isset($_POST['apellidos'])){
            $apellidos = $_SESSION['usuario']->getApellidos();
        }else{
            $apellidos = $_POST['apellidos'];
        }
        if(!isset($_POST['password'])){
            $passwd = $_SESSION['usuario']->getPassword();
        }else{
            $passwd = $_POST['password'];
        }
        if(!isset($_POST['repPassword'])){
            $repPasswd = $_SESSION['usuario']->getPassword();
        }else{
            $repPasswd = $_POST['repPassword'];
        }
        if(!isset($_POST['email'])){
            $email = $_SESSION['usuario']->getEmail();
        }else{
            $email = $_POST['email'];
        }
        if(!isset($_POST['web'])){
            $web = $_SESSION['usuario']->getWeb();
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

    if (isset($_POST['aceptar']) && $entradaOk==true){  //si se ha pulsado enviar y no ha habido errores
        if(!empty($_POST['password']) && $mensajeError['errorPasswordNoIgual']==null){ //comprobamos si la contraseña no esta vacia
            $password=hash('sha256',$_POST['password']);//Si no está vacia, realizamos el agoritmo de encriptado.
        }else{
            $password=hash('sha256',$_SESSION['usuario']->getPassword());//De lo contrario, lo haremos con la que ya tenemos
        }
        /**
         * En el caso de que el usuario sea editado, volveremos a la página de inicio,
         * de lo contrario mostraremos un error y volveremos a cargar la página del perfil.
         */
        if($_SESSION['usuario']->editarUsuario($nombre,$apellidos,$password,$email,$web,$_POST['codUsuario'])){ //comrpobamos si se puede editar el usuario
            header('Location: index.php?pagina=inicio');
        }else{ //si no se ha podido editar
            $mensajeError['errorEditar'] = "Error al editar el Perfil";  //mostramos el error
            $_GET["pagina"]="perfil";
            include_once 'view/layout.php';
        }
    }else{
        $_GET["pagina"]="perfil";
        include_once 'view/layout.php';
    }

}
?>