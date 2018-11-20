<?php
/**
 * Controlador del mantenimiento de usuarios
 *
 * Fichero que contiene el controlador de la página del administrador de usuarios.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Usuarios.
 * @package Controlador.
 * @copyright 13 de noviembre de 2018
 */
$usuarios = Usuario::listarUsuarios();
if(isset($_POST['volver'])){
    header('Location: index.php');
}
if(isset($_POST['nuevo'])){
    header('Location: index.php?pagina=registro');
}
$_GET['pagina']='usuarios';
require_once('view/layout.php');
?>