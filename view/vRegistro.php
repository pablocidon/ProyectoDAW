<?php
/**
 * Vista de la página de registro.
 *
 * Fichero que contiene el formulario con el que los usuarios pueden registrarse.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Registro.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<div class="container contenido">
    <h1>Página de Registro</h1>
    <div class="row content">
        <div class="col-sm-12">
            <form name="perfil" action="index.php?pagina=registro" method="post">
                <div class="form-group row">
                    <label for="usuario" class="control-label col-sm-2">Usuario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['codUsuario']) && empty($mensajeError['errorUsuario'])){echo 'is-valid';}elseif (isset($_POST['codUsuario']) && $mensajeError['errorUsuario']!=null){echo 'is-invalid';}?>" id="alfabetico" name="codUsuario" <?php if(isset($_POST['codUsuario']) && empty($mensajeError['errorUsuario'])){ echo 'value="',$_POST['codUsuario'],'"';}?>>
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
                </div>
                <div class="form-group row">
                    <label for="nombre" class="control-label col-sm-2">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['nombre']) && empty($mensajeError['errorNombre'])){echo 'is-valid';}elseif (isset($_POST['nombre']) && $mensajeError['errorNombre']!=null){echo 'is-invalid';}?>" id="alfabetico" name="nombre" <?php if(isset($_POST['nombre']) && empty($mensajeError['errorNombre'])){ echo 'value="',$_POST['nombre'],'"';}?>>
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
                        <input type="text" class="form-control <?php if(isset($_POST['apellidos']) && empty($mensajeError['errorApellidos'])){echo 'is-valid';}elseif (isset($_POST['apellidos']) && $mensajeError['errorApellidos']!=null){echo 'is-invalid';}?>" id="alfabetico" name="apellidos" <?php if(isset($_POST['apellidos']) && empty($mensajeError['errorApellidos'])){ echo 'value="',$_POST['apellidos'],'"';}?>>
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
                    <label for="password" class="control-label col-sm-2">Contraseña</label>
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
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="perfil" value="Usuario" checked>
                            <label class="form-check-label" for="usuario">Usuario</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="perfil" value="Empresa">
                            <label class="form-check-label" for="empresa">Empresa</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control <?php if(isset($_POST['email']) && empty($mensajeError['errorEmail'])){echo 'is-valid';}elseif (isset($_POST['email']) && $mensajeError['errorEmail']!=null){echo 'is-invalid';}?>" id="alfabetico" name="email" <?php if(isset($_POST['email']) && empty($mensajeError['errorEmail'])){ echo 'value="',$_POST['email'],'"';}?>>
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
                        <input type="text" class="form-control <?php if(isset($_POST['web']) && empty($mensajeError['errorWeb'])){echo 'is-valid';}elseif (isset($_POST['web']) && $mensajeError['errorWeb']!=null){echo 'is-invalid';}?>" id="alfabetico" name="web" <?php if(isset($_POST['web']) && empty($mensajeError['errorWeb'])){ echo 'value="',$_POST['web'],'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorWeb'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorWeb'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }else if (isset($mensajeError['errorUsuarioRepetido'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorUsuarioRepetido'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="float-right" style="margin-bottom: 2%">
                        <input type="submit" name="registrar" class="btn btn-dark" value="Registrar"/>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>