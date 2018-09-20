<div class="container contenido">
    <div class="row content">
        <div class="col-sm-3">
            <h4><?php echo $_SESSION['usuario']->getCodUsuario();?></h4>
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
            <form name="perfil" action="index.php?pagina=perfil" method="post">
                <div class="form-group">
                    <label for="usuario" class="control-label">Usuario</label>
                    <input type="text" class="form-control" id="alfabetico" name="codUsuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nombre" class="control-label">Nombre</label>
                    <input type="text" class="form-control" id="alfabetico" name="nombre" value="<?php echo $_SESSION['usuario']->getNombre(); ?>">
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
                    <input type="text" class="form-control" id="alfabetico" name="apellidos" value="<?php echo $_SESSION['usuario']->getApellidos(); ?>">
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
                    <label for="password" class="control-label">Nueva Contraseña</label>
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
                    <input type="text" class="form-control" id="alfabetico" name="perfil" value="<?php echo $_SESSION['usuario']->getPerfil(); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" class="form-control" id="alfabetico" name="email" value="<?php echo $_SESSION['usuario']->getEmail(); ?>">
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
                    <input type="text" class="form-control" id="alfabetico" name="web" value="<?php echo $_SESSION['usuario']->getWeb(); ?>">
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
                <div class="form-group">
                    <div class="float-right">
                        <input type="submit" name="enviar" class="btn btn-dark" value="Aceptar"/>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="card border-danger mb-3">
                        <div class="card-body text-danger">
                            <h5 class="card-title">Eliminar cuenta</h5>
                            <label for="passwordEliminar" class="control-label">Introduzca su contraseña</label>
                            <input type="password" class="form-control" id="alfabetico" name="passwordEliminar" >
                            <?php //si existe mensaje de error lo mostramos
                            if(isset($mensajeError['errorPasswordEliminar'])){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorPasswordEliminar'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                            }
                            ?>
                            <br><input type="submit" name="eliminar" class="btn btn-danger float-right" value="Eliminar Cuenta"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>