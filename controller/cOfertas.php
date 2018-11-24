<?php
/**
 * Controlador de las ofertas
 *
 * Fichero que contiene el controlador de la página de las ofertas
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Ofertas.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    if(isset($_POST['volver'])){
        header('Location: index.php');
    }
    if(isset($_POST['nueva'])){
        header('Location: index.php?pagina=publicar');
    }
    if($_SESSION['usuario']->getPerfil()!="Administrador"){
        $ofertas = Oferta::verMisOfertas($_SESSION['usuario']->getCodUsuario());//Realizamos el listado de las ofertas según el usuario
    }else{
        $ofertas = Oferta::verMisOfertas('%');//Realizamos el listado de las ofertas según el usuario

        $inscripciones = Inscripcion::listarMisInscripciones('%');//Realizamos el listado de las inscripciones por el usuario
    }
$_GET['pagina']='ofertas';
require_once('view/layout.php');
}
?>