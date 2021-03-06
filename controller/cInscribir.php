<?php
/**
 * Controlador de la inscripción.
 *
 * Fichero que contiene el controlador de la página para inscribirse.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Inscribir.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    $curriculums = Curriculum::listarMisCurriculums($_SESSION['usuario']->getCodUsuario());//Realizamos el listado de curriculums del usuario
    $inscrito = false;
    if(isset($_POST['cancelar'])){
        header("Location: index.php");//Si pulsamos en cancelar volvemos a la página de inicio.
    }
    if (isset($_POST['aceptar'])){
        if(Inscripcion::realizarInscripcion($_POST['usuario'],$_SESSION['oferta']->getCodOferta(),$_POST['curriculum'])){//En el caso de pulsar en aceptar realizaremos la inscripción en la oferta.
            $inscrito = true;
        }

    }
    $_GET['pagina']='inscribir';
    require_once('view/layout.php');
}
?>