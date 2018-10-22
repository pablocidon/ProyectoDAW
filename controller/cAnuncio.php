<?php
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    if(isset($_POST['cancelar'])){
        header("Location: index.php");
    }
    if (isset($_POST['inscribir'])){

    }
    if (isset($_POST['modificar'])){
        Oferta::editarOferta($_POST['titulo'],$_POST['empresa'],$_POST['descripcion'],$_POST['requisitos'],$_POST['experiencia'],$_POST['vacantes'],$_POST['categoria'],$_POST['provincia'],$_GET['codOferta']);
        header('Location: index.php?pagina=anuncio&codOferta='.$_GET['codOferta']);
    }
    if(isset($_POST['eliminar'])){
        Oferta::eliminarOferta($_GET['codOferta'],$_SESSION['usuario']->getCodUsuario());
        header('Location: index.php');
    }
    $oferta = Oferta::consultarOferta($_GET['codOferta']);
    $_GET['pagina']='anuncio';
    require_once('view/layout.php');
}
?>