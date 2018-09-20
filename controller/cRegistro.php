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
$_GET['pagina']='registro';
require_once('view/layout.php');
?>