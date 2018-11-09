<?php
if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php.
    header("Location: index.php");
}else{
    $entradaOk=true;
    $error="";
    $mensajeError="";
    if(isset($_POST['cancelar'])){
        header("Location: index.php?pagina=inicio");
    }
    if(isset($_POST['eliminar'])){
        if($_SESSION['usuario']->validarUsuario($_POST['codUsuario'],$_POST['passwordEliminar'])){
            if(!$_SESSION['usuario']->borrarUsuario($_SESSION['usuario']->getCodUsuario())){
                Curriculum::removeDirectory($_SESSION['usuario']->getCodUsuario());
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
    if (isset($_POST['enviar'])){  //Si se ha pulsado enviar cargamos los errores
        $mensajeError['errorNombre'] = validacionFormularios::comprobarAlfabetico($_POST['nombre'],20,3,0);
        $mensajeError['errorApellidos'] = validacionFormularios::comprobarAlfabetico($_POST['apellidos'],50,1,0);
        $mensajeError['errorPassword']= validacionFormularios::comprobarAlfaNumerico($_POST['password'], 255, 4, 0); //comprobamos el campo fecha
        $mensajeError['errorRepPassword'] = validacionFormularios::comprobarAlfaNumerico($_POST['repPassword'],255,4,0);
        $mensajeError['errorEmail'] = validacionFormularios::validarEmail($_POST['email'],100,5,0);
        $mensajeError['errorWeb'] = validacionFormularios::validarURL($_POST['web'],0);
        if ($_POST['password']!=$_POST['repPassword']){
            $mensajeError["errorPasswordNoIgual"]="Las contraseñas tienen que ser iguales!";
        }

        foreach ($mensajeError as &$valor){
            if ($valor!=null){
                $entradaOk=false;
            }
        }
    }

    if (isset($_POST['enviar']) && $entradaOk==true){  //si se ha pulsado enviar y no ha habido errores
        if(!empty($_POST['password']) && $mensajeError['errorPasswordNoIgual']==null){ //comprobamos si la contraseña no esta vacia
            $password=hash('sha256',$_POST['password']);
        }else{
            $password=hash('sha256',$_SESSION['usuario']->getPassword());
        }
        if($_SESSION['usuario']->editarUsuario($_POST['nombre'],$_POST['apellidos'],$password,$_POST['email'],$_POST['web'],$_POST['codUsuario'])){ //comrpobamos si se puede editar el usuario
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