<?php
/**
 * File  config.php
 * @author Pablo Cidón.
 *
 * Fichero un array con las vistas y otro con los controladores de nuestra aplicación.
 * Fecha última revisión 13-09-2018
 */
$vistas=[
    "login"=>'view/vLogin.php',
    "inicio"=>'view/vInicio.php',
    "perfil"=>'view/vPerfil.php',
    "registro"=>'view/vRegistro.php'
];
$controladores=[
    "login"=>'controller/cLogin.php',
    "inicio"=>'controller/cInicio.php',
    "perfil"=>'controller/cPerfil.php',
    "registro"=>'controller/cRegistro.php'
];

?>