<?php
$inscripciones = Inscripcion::listarMisInscripciones($_SESSION['usuario']->getCodUsuario());
$_GET['pagina']='inscripciones';
require_once('view/layout.php');
?>