<?php
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    $ofertas = Oferta::verMisOfertas($_SESSION['usuario']->getCodUsuario());
$_GET['pagina']='ofertas';
require_once('view/layout.php');
}
?>