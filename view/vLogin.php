<?php
/**
 * Vista de la página de login.
 *
 * Fichero que contiene el formulario para inciar sesión en el programa.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Login.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<script src="webroot/js/jquery.js"></script>
<script type="text/javascript">
    /*
    Crearemos una función en la que comprobaremos el tipo de input, en el caso de que esté en text,
    lo devolveremos a password y viceversa. Es un botón para mostrar la contraseña.
     */
    $(document).ready(function () {
        $(document).ready(function () {
            $('#show-pass').mousedown(function () {
                if ($('#password').attr('type') === 'text') {
                    $('#password').attr('type', 'password');
                } else {
                    $('#password').attr('type', 'text');
                }
            });
        });
    });
</script>
<div class="container-fluid contenido">
    <!--<img src="webroot/img/logo.png" class="img-fluid" alt="Responsive image" style="margin: 2% 0%">-->
    <div class="row">
        <div class="col-sm-8"  style="margin-top: 1%">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" style="height: 300px">
                    <div class="carousel-item active" style="height: 300px">
                        <img class="d-block w-100" src="webroot/img/empleo.svg">
                        <div class="carousel-caption d-none d-md-block">
                            <!--<h5>First Slide</h5>-->
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 300px">
                        <img class="d-block w-100" src="webroot/img/laboral.svg">
                        <div class="carousel-caption d-none d-md-block">
                            <!--<h5>Second Slide</h5>-->
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 300px">
                        <img class="d-block w-100" src="webroot/img/job.svg">
                        <div class="carousel-caption d-none d-md-block">
                            <!--<h5>Third Slide</h5>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4"  style="margin-top: 1%">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label class="control-label" for="usuario">Usuario</label>
                    <input type="text" class="form-control <?php if(isset($_POST['codUsuario']) && empty($mensajeError['errorUsuario'])){echo 'is-valid';}elseif (isset($_POST['codUsuario']) && $mensajeError['errorUsuario']!=null){echo 'is-invalid';}?>" name="codUsuario" placeholder="Nombre de usuario" <?php if(isset($_POST['codUsuario']) && empty($mensajeError['errorUsuario'])){ echo 'value="',$_POST['codUsuario'],'"';}?>>
                    <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorUsuario'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorUsuario'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control <?php if(isset($_POST['password']) && empty($mensajeError['errorPassword'])){echo 'is-valid';}elseif (isset($_POST['password']) && $mensajeError['errorPassword']!=null){echo 'is-invalid';}?>" name="password" id="password" placeholder="Contraseña" <?php if(isset($_POST['password']) && empty($mensajeError['errorPassword'])){ echo 'value="',$_POST['password'],'"';}?>>
                        <span class="input-group-btn">
                            <button class="btn btn-outline-dark" id="show-pass" type="button">
                                <span id="icon" class="fa fa-eye"></span>
                            </button>
                        </span>
                    </div>
                    <?php //si existe mensaje de error lo mostramos
                    if(isset($mensajeError['errorPassword'])){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorPassword'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                    }else if($error){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$error.'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <div class="float-right">
                        <input class="btn btn-dark" type="submit" name="entrar" value="Iniciar sesión">
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <p>No tiene cuenta? <a href="index.php?pagina=registro">Regístrese</a></p>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <h3 class="text-center">Algunas de nuestras empresas</h3>
    <br>
    <div class="row text-center">
        <div class="col-sm-3">
            <img src="webroot/img/gaza.jpg" class="img-responsive empresa" width="50%" alt="Image">
        </div>
        <div class="col-sm-3">
            <img src="webroot/img/renault.png" class="img-responsive empresa" width="50%" alt="Image">
        </div>
        <div class="col-sm-3">
            <img src="webroot/img/sacyl.jpg" class="img-responsive empresa" width="50%" alt="Image">
        </div>
        <div class="col-sm-3">
            <img src="webroot/img/unicef.jpg" class="img-responsive empresa" width="50%" alt="Image">
            <p>Project 4</p>
        </div>
    </div>
</div>
<footer class="container-fluid text-center footer" id="pie">
    <p style="margin-top: 1%;"><strong>© 2018 Copyright: Pablo Cidón           |
            <i class="fa fa-linkedin" style="color: deepskyblue"></i> |
            <i class="fa fa-facebook-official" style="color: blue"></i> |
            <i class="fa fa-twitter" style="color: deepskyblue"></i> |
            <i class="fa fa-instagram" style="color: purple"></i>
        </strong>
    </p>
</footer>