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
    <!--<link rel="stylesheet" href="webroot/css/pace-theme-center-radar.css">-->
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php?pagina=inicio">
                <img src="/webroot/img/logo2.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <?php if(isset($_SESSION['usuario'])){ ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item  <?php if ($_GET['pagina'] == 'inicio') {
                        echo 'active';
                    } ?>">
                        <a class="nav-link" href="index.php?pagina=inicio">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if ($_SESSION['usuario']->getPerfil() == 'Usuario') {
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='index.php?pagina=inscripciones'>Mis inscripciones</a>
                        </li>";
                    } else {
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='index.php?pagina=ofertas'>Mis ofertas</a>
                        </li>";
                    }
                    }
                    ?>
                </ul>
                <span class="navbar-text">
                    <?php //si existe mensaje de error lo mostramos
                    if(isset($_SESSION['usuario'])){
                        echo '<form name="salida" method="post" action="index.php?pagina=inicio">
                         <a href="index.php?pagina=perfil"><button type="button" name="perfil" class="btn btn-link" style="color: white"><span class="fa fa-user"></span>'.' '.$_SESSION["usuario"]->getCodUsuario().'</button></a>
                    <button type="submit" name="salir" class="btn btn-link" style="color: white"><span class="fa fa-sign-out"></span> Cerrar Sesión</button>
                    </form>';
                    }
                    ?>
                </span>
            </div>
        </nav>
        <?php
    }
?>
        <?php
            require_once $vista;
        ?>

<footer class="container-fluid text-center" id="pie">
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
