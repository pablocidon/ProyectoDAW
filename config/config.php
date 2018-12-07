<?php
/**
 * Vistas y controladores de la aplicación.
 *
 * Fichero un array con las vistas y otro con los controladores de nuestra aplicación.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Config.
 * @package Config.
 * @copyright 20 de noviembre de 2018
 */
$vistas=[
    "login"=>'view/vLogin.php',
    "inicio"=>'view/vInicio.php',
    "perfil"=>'view/vPerfil.php',
    "registro"=>'view/vRegistro.php',
    "ofertas"=>'view/vOfertas.php',
    "inscripciones"=>'view/vInscripciones.php',
    "publicar"=>'view/vPublicar.php',
    "inscribir"=>'view/vInscribir.php',
    "curriculums"=>'view/vCurriculum.php',
    "anuncio"=>'view/vAnuncio.php',
    "candidatos"=>'view/vCandidatos.php',
    "usuarios"=>'view/vUsuarios.php',
    "usuario"=>'view/vUsuario.php'
];
$controladores=[
    "login"=>'controller/cLogin.php',
    "inicio"=>'controller/cInicio.php',
    "perfil"=>'controller/cPerfil.php',
    "registro"=>'controller/cRegistro.php',
    "ofertas"=>'controller/cOfertas.php',
    "inscripciones"=>'controller/cInscripciones.php',
    "publicar"=>'controller/cPublicar.php',
    "inscribir"=>'controller/cInscribir.php',
    "curriculums"=>'controller/cCurriculum.php',
    "anuncio"=>'controller/cAnuncio.php',
    "candidatos"=>'controller/cCandidatos.php',
    "usuarios"=>'controller/cUsuarios.php',
    "usuario"=>'controller/cUsuario.php'
];
define('REGISTROSPAGINA',5);
?>