<?php

//require_once 'model/Usuario.php';
if(isset($_POST['salir'])){  //comprobamos si existe el boton salir
        unset($_SESSION['usuario']);  //si existe cerramos sesion
        session_destroy();
        header("Location: index.php"); 
}else{
    if(!isset($_POST['categoria'])){
        $categoria='';
    }else{
        $categoria = $_POST['categoria'];
    }
    if(!isset($_POST['provincia'])){
        $provincia='';
    }else{
        $provincia = $_POST['provincia'];
    }
    if(!isset($_POST['clave'])){
        $clave='';
    }else{
        $clave = $_POST['clave'];
    }
    $ofertas = Oferta::listarOfertas($categoria,$provincia,$clave);
    $categorias = Oferta::listarCategorias();
    $provincias = Oferta::listarProvincias();
    $_GET['pagina']='inicio';
    require_once('view/layout.php');
}

if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    require_once 'view/layout.php';
} 

