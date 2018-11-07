<?php
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    $curriculums = Curriculum::listarMisCurriculums($_SESSION['usuario']->getCodUsuario());
    $inscrito = false;
    if(isset($_POST['cancelar'])){
        header("Location: index.php");
    }
    if (isset($_POST['aceptar'])){
        if(Inscripcion::realizarInscripcion($_POST['usuario'],$_SESSION['oferta']->getCodOferta(),$_POST['curriculum'])){
            $inscrito = true;
        }

    }
    $_GET['pagina']='inscribir';
    require_once('view/layout.php');
}
?>