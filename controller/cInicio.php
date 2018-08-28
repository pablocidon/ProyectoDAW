<?php

require_once 'model/Usuario.php';
if(isset($_POST['salir'])){  //comprobamos si existe el boton salir
        unset($_SESSION['usuario']);  //si existe cerramos sesion
        session_destroy();
        header("Location: index.php"); 
}

if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no existe nos manda registrarnos
} else{
    require_once 'view/layout.php';
} 

