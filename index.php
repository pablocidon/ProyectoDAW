<?php
/**
 * File  index.php
 * @author Pablo Cidón.
 *
 * Fichero que carga los controladores y las vistas de la aplicación
 * Fecha última revisión 16-04-2018
 */

require_once "config/conexionDB.php";
require_once "config/config.php";
require_once "model/Usuario.php";
require_once "model/Departamento.php";
require_once "core/validacionFormularios.php";
require_once "model/Opinion.php";
require_once "model/Cuestion.php";

$controladorActual=$controladores["login"];//Establecemos el controlador que va a ser el del inicio de la aplicación.

$error="";
session_start();

if(!isset($_SESSION['usuario'])){//Comprobamos que está la sesión
    if(!isset($_GET['pagina'])){//Comprobamos que hay página
        include_once $controladores['login'];//Si no hay sesión ni página, cargaremos el login
    } else if($_GET['pagina']=='registro'){
        include_once $controladores['registro'];//Cargamos la página de inicio, que no requiere de sesión
    }
}else{
    /**
     * Si hay sesión y página, cargaremos el controlador de dicha página,
     * de lo contrario cargaremos el controlador de inicio.
     */
    if(isset($_GET['pagina'])){
        include_once $controladores[$_GET['pagina']];
    }else{
        include_once $controladores['inicio'];
    }
}
?>