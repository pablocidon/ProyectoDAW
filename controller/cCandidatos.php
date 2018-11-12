<?php
/**
 * Controlador de los candidatos.
 *
 * Fichero que contiene el controlador de la página de los candidatos a una oferta.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Candidatos.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
//Realizamos el listado de candidatos según el identificador de la oferta en la que se han inscrito
$candidatos = Inscripcion::listarInscripcionesPorOferta($_GET['codOferta']);
$_GET['pagina']='candidatos';
require_once('view/layout.php');
?>