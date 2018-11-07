<?php
/**
 * File  config.php
 * @author Pablo Cidón.
 *
 * Fichero un array con las vistas y otro con los controladores de nuestra aplicación.
 * Fecha última revisión 07-11-2018
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
    "candidatos"=>'view/vCandidatos.php'
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
    "candidatos"=>'controller/cCandidatos.php'
];

?>