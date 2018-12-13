<?php
/**
 * Vista de la página de usuario.
 *
 * Fichero que contiene un formulario en el que el administrador podrá realizar modificaciones en un perfil.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Perfil.
 * @package Vista.
 * @copyright 20 de noviembre de 2018
 */
?>
<div class="container contenido">
    <div class="row content">
        <div class="col-sm-3">
            <h4><?php echo $_GET['codUsuario']?></h4>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#section1">Home</a></li>
                <li><a href="#section2">Friends</a></li>
                <li><a href="#section3">Family</a></li>
                <li><a href="#section3">Photos</a></li>
            </ul><br>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Blog..">
                <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
            </div>
        </div>

        <div class="col-sm-9 sidenav">
            <form name="usuario" action="index.php?pagina=usuario&codUsuario=<?php echo $_GET['codUsuario'];?>" method="post">
                <div class="form-group row">
                    <label for="usuario" class="control-label col-sm-2">Usuario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alfabetico" name="codUsuario" value="<?php echo $usuario->getCodUsuario(); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nombre" class="control-label col-sm-2">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['nombre']) && empty($mensajeError['errorNombre'])){echo 'is-valid';}elseif (isset($_POST['nombre']) && $mensajeError['errorNombre']!=null){echo 'is-invalid';}?>" id="alfabetico" name="nombre" <?php if(isset($_POST['nombre']) && empty($mensajeError['errorNombre'])){ echo 'value="',$_POST['nombre'],'"';}else{echo 'value="',$usuario->getNombre(),'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorNombre'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorNombre'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apellidos" class="control-label col-sm-2">Apellidos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['apellidos']) && empty($mensajeError['errorApellidos'])){echo 'is-valid';}elseif (isset($_POST['apellidos']) && $mensajeError['errorApellidos']!=null){echo 'is-invalid';}?>" id="alfabetico" name="apellidos" <?php if(isset($_POST['apellidos']) && empty($mensajeError['errorApellidos'])){ echo 'value="',$_POST['apellidos'],'"';}else{echo 'value="',$usuario->getApellidos(),'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorApellidos'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorApellidos'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="control-label col-sm-2">Nueva Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?php if(isset($_POST['password']) && empty($mensajeError['errorPassword'])){echo 'is-valid';}elseif (isset($_POST['password']) && $mensajeError['errorPassword']!=null){echo 'is-invalid';}?>" id="alfabetico" name="password" <?php if(isset($_POST['password']) && empty($mensajeError['errorPassword'])){ echo 'value="',$_POST['password'],'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorPassword'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorPassword'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="repPassword" class="control-label col-sm-2">Repetir Contraseña</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?php if(isset($_POST['repPassword']) && empty($mensajeError['errorRepPassword']) && empty($mensajeError['errorPasswordNoIgual'])){echo 'is-valid';}elseif (isset($_POST['password']) && $mensajeError['errorPassword']!=null || $mensajeError['errorPasswordNoIgual']!=null ){echo 'is-invalid';}?>" id="alfabetico" name="repPassword" <?php if(isset($_POST['repPassword']) && empty($mensajeError['errorRepPassword']) && empty($mensajeError['errorPasswordNoIgual'])){ echo 'value="',$_POST['repPassword'],'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorPasswordNoIgual'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorPasswordNoIgual'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }else if (isset($mensajeError['errorRepPassword'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorRepPassword'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="perfil" class="control-label col-sm-2">Perfil</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alfabetico" name="perfil" value="<?php echo $usuario->getPerfil(); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control <?php if(isset($_POST['email']) && empty($mensajeError['errorEmail'])){echo 'is-valid';}elseif (isset($_POST['email']) && $mensajeError['errorEmail']!=null){echo 'is-invalid';}?>" id="alfabetico" name="email"  <?php if(isset($_POST['email']) && empty($mensajeError['errorEmail'])){ echo 'value="',$_POST['email'],'"';}else{ echo 'value="',$usuario->getEmail(),'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorEmail'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorEmail'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="web" class="control-label col-sm-2">Sitio Web</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['web']) && empty($mensajeError['errorWeb'])){echo 'is-valid';}elseif (isset($_POST['web']) && $mensajeError['errorWeb']!=null){echo 'is-invalid';}?>" id="alfabetico" name="web" <?php if(isset($_POST['web']) && empty($mensajeError['errorWeb'])){ echo 'value="',$_POST['web'],'"';}else{echo 'value="',$usuario->getWeb(),'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorWeb'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorWeb'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }else if(isset($mensajeError['errorEditar'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorEditar'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="float-right">
                        <input type="submit" name="aceptar" class="btn btn-dark" value="Aceptar"/>
                        <a href="index.php?pagina=usuarios"><input type="button" name="cancelar" class="btn btn-secondary" value="Cancelar"/></a>
                        <input type="submit" name="eliminar" class="btn btn-danger" value="Eliminar Usuario"/>
                    </div>
                </div>
            </form>
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