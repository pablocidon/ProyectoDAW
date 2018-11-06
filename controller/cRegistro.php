<?php

/*
 * autor: Lucia Rodriguez Alvarez
 * fecha creacion: 2018-04-06
 * fecha ultima modificacion:
 * nombre fichero: clogin.php
 */

$entradaOk=true;
$error="";

if(isset($_POST['cancelar'])){
    header('Location: index.php');
}
if(isset($_POST['registrar'])){ //si existe enviar enviamos el usuario y cotraseña introducidos
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
        $mensajeError["errorUsuarioRepetido"]="El usuario ya existe";
    }
    foreach ($mensajeError as &$valor){ //recorremos los mensajes de error
        if ($valor!=null){ //si el mensaje de error NO esta vacio
            $entradaOk=false; // la variable de tratamiento de errores sera falsa y mostraremos los errores
        }
    }
}

if (isset($_POST['registrar']) && $entradaOk){  //si se ha pulsado registrar y todo esta bien
    $password=hash('sha256',$_POST['password']);

    $usuario=Usuario::registrarUsuario($_POST['codUsuario'],$_POST['nombre'],$_POST['apellidos'],$password,$_POST['perfil'],$_POST['email'],$_POST['web']); //creamos el usuario
    if (is_null($usuario)){
        $_GET['pagina']='login';
        require_once 'view/layout.php';
    }else{ //si el usuario se ha registrado corrctamente iniciamos la sesion
        $_SESSION['usuario']=$usuario;
        $_GET['pagina']='inicio';
        header("Location: index.php?pagina=inicio");
    }
}
$_GET['pagina']='registro';
require_once('view/layout.php');
?>