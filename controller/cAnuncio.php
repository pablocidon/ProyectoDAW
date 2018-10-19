<?php
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    $oferta = Oferta::consultarOferta($_GET['codOferta']);
    $_GET['pagina']='ofertas';
    require_once('view/layout.php');
}
?>