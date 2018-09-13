<?php
if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php.
    header("Location: index.php");
}else{
    $entradaOk=true;
    $error="";
    $mensajeError="";
    if (isset($_POST['enviar'])){  //Si se ha pulsado enviar cargamos los errores
        $mensajeError["errorPassword"]= validacionFormularios::comprobarAlfaNumerico($_POST['password'], 255, 4, 0); //comprobamos el campo fecha
        $mensajeError["errorDescripcion"]= validacionFormularios::comprobarAlfabetico($_POST['descripcion'], 255, 0, 1);// comprobamos el campo nombre
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
        if(!empty($_POST['password'])){ //comprobamos si la contraseña no esta vacia
            $password=hash('sha256',$_POST['password']);
        }
        $descripcion=$_POST['descripcion'];
        if( $_SESSION['usuario']->editarUsuario($descripcion,$password)){ //comrpobamos si se puede editar el usuario
            $_SESSION['usuario']->setDescripcion($descripcion);  //cambiamos la descripcion a la actual
            header('Location: index.php');
        }else{ //si no se ha podido editar
            echo "Error al editar el Perfil";  //mostramos el error
            $_GET["pagina"]="perfil";
            include_once 'view/layout.php';
        }

    }else{
        $_GET["pagina"]="perfil";
        include_once 'view/layout.php';
    }

}
?>