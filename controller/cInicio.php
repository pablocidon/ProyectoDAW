<?php
/**
 * Controlador del inicio
 *
 * Fichero que contiene el controlador de la página de inicio.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Inicio.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
if(isset($_POST['salir'])){  //comprobamos si existe el boton salir
        unset($_SESSION['usuario']);  //si existe cerramos sesion
        session_destroy();
        header("Location: index.php"); 
}else{
    /**
     * Cargamos los filtros de búsqueda, en el caso de que no haya nada los cargaremos como vacios,
     * de lo contrario los cargaremos con el valor de los filtros de búsqueda.
     */
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
    /**
     * Realizamos el listado de ofertas según los filtros de búsqueda.
     * También realizamos los listados de las categorias y provincias en las que se encuentre alguna oferta.
     */
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

