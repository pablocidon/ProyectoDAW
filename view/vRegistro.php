<div class="container contenido">
    <div class="row content">
        <div class="col-sm-12 sidenav">
            <form name="perfil" action="index.php?pagina=registro" method="post">
                <div class="form-group">
                    <label for="usuario" class="control-label">Usuario</label>
                    <input type="text" class="form-control" id="alfabetico" name="codUsuario">
                </div>
                <div class="form-group">
                    <label for="nombre" class="control-label">Nombre</label>
                    <input type="text" class="form-control" id="alfabetico" name="nombre">
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
                <div class="form-group">
                    <label for="apellidos" class="control-label">Apellidos</label>
                    <input type="text" class="form-control" id="alfabetico" name="apellidos">
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
                <div class="form-group">
                    <label for="password" class="control-label">Contraseña</label>
                    <input type="password" class="form-control" id="alfabetico" name="password" >
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
                <div class="form-group">
                    <label for="repPassword" class="control-label">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="alfabetico" name="repPassword" >
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
                <div class="form-group">
                    <label for="perfil" class="control-label">Perfil</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="perfil" value="Usuario" checked>
                        <label class="form-check-label" for="usuario">Usuario</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="perfil" value="Empresa">
                        <label class="form-check-label" for="empresa">Empresa</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="alfabetico" name="email">
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
                <div class="form-group">
                    <label for="web" class="control-label">Sitio Web</label>
                    <input type="text" class="form-control" id="alfabetico" name="web">
                    <?php //si existe mensaje de error lo mostramos
                    if(isset($mensajeError['errorWeb'])){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorWeb'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <div class="float-right">
                        <input type="submit" name="aceptar" class="btn btn-dark" value="Aceptar"/>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>