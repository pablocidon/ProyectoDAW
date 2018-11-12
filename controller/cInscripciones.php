<?php
/**
 * Controlador de las inscripciones.
 *
 * Fichero que contiene el controlador de la página que muestra las inscripciones
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Inscripcion.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
$inscripciones = Inscripcion::listarMisInscripciones($_SESSION['usuario']->getCodUsuario());//Realizamos el listado de las inscripciones por el usuario
$_GET['pagina']='inscripciones';
require_once('view/layout.php');
?>