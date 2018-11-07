<?php
$candidatos = Inscripcion::listarInscripcionesPorOferta($_GET['codOferta']);
$_GET['pagina']='candidatos';
require_once('view/layout.php');
?>