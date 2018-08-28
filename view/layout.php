<!DOCTYPE html>
<!--
* Autor: Pablo Cidón.
* Archivo: layout.php
* Última revisión: 16-04-2018.
-->
<?php
    if (isset($_SESSION['usuario'])){
        $vista='vista/vinicio.php';
    }else{
        $vista='vista/vlogin.php';
    }

    if(isset($_GET['pagina'])){
        $vista=$vistas[$_GET['pagina']];
    } ?>
<html lang="es">
<head>
    <link rel="shortcut icon" href="webroot/img/favicon.ico" />
    <title>EmpleSauces</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="webroot/css/pace-theme-center-radar.css">
    <link rel="stylesheet" href="webroot/css/bootstrap-grid.css">
    <link rel="stylesheet" href="webroot/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="webroot/css/bootstrap.css">
    <link rel="stylesheet" href="webroot/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>

<body>
<?php
    if($_GET['pagina']!='login') {

        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

        </nav>
        <?php
    }
?>
        <?php
            require_once $vista;
        ?>
<footer class="fixed-bottom text-center pie">
    <p style="margin-top: 2%">© 2018 Copyright: Pablo Cidón</p>
    <p>
        <i class="fa fa-linkedin"></i>
        <i class="fa fa-facebook-official"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
    </p>
</footer>
<script src="webroot/js/pace.js"></script>
<script src="webroot/js/jquery.js"></script>
<script src="webroot/js/bootstrap.js"></script>
<script src="webroot/js/bootstrap.bundle.js"></script>

</body>
</html>
