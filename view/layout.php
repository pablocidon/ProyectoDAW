<!DOCTYPE html>
<?php
/**
 * Layout de la aplicación
 *
 * Fichero que contiene el layout que carga todas las vistas de la aplicación.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Layout.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
/**
 * Si hay sesión cargaremos la página de inicio, si no la de login.
 * También iremos cargando las páginas según los controladores.
 */
    if (isset($_SESSION['usuario'])){
        $vista='view/vInicio.php';
    }else{
        $vista='view/vLogin.php';
    }
    if(isset($_GET['pagina'])){
        $vista=$vistas[$_GET['pagina']];
    }?>
<html lang="es">
<head>
    <link rel="shortcut icon" href="webroot/img/favicon.png" />
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
   // if($_GET['pagina']!='login') {

        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img src="webroot/img/logo2.png" alt="Logo">
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
                    <?php if ($_SESSION['usuario']->getPerfil() == 'Usuario') {?>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'inscripciones') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=inscripciones'>Mis inscripciones</a>
                        </li>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'curriculums') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=curriculums'>Curriculums</a>
                        </li>
                   <?php } else if($_SESSION['usuario']->getPerfil() == 'Empresa'){?>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'ofertas') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=ofertas'>Mis ofertas</a>
                        </li>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'publicar') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=publicar'>Nueva Oferta</a>
                        </li>
                   <?php }else{?>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'inscripciones') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=inscripciones'>Inscripciones</a>
                        </li>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'curriculums') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=curriculums'>Curriculums</a>
                        </li>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'ofertas' || $_GET['pagina'] == 'anuncio' || ($_GET['pagina'] == 'candidatos')) {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=ofertas'>Ofertas</a>
                        </li>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'publicar') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=publicar'>Nueva Oferta</a>
                        </li>
                        <li class="nav-item <?php if ($_GET['pagina'] == 'usuarios') {
                            echo 'active';
                        } ?>">
                            <a class='nav-link' href='index.php?pagina=usuarios'>Usuarios</a>
                        </li>
                    <?php
                    }
                    }
                    ?>
                </ul>
                <span class="navbar-text">
                    <?php
                    /**
                     * Si hay sesión, cargaremos un formulario para cerrar la sesión.
                     */
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
    //}
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
