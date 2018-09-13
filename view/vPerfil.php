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
            <div class="form-group">
                <label for="usuario" class="control-label">Usuario</label>
                <input type="text" class="form-control" id="alfabetico" name="codUsuario" value="<?php echo $_SESSION['usuario']->getCodUsuario(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="perfil" class="control-label">Perfil</label>
                <input type="text" class="form-control" id="alfabetico" name="perfil" value="<?php echo $_SESSION['usuario']->getPerfil(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Nueva Contraseña</label>
                <input type="password" class="form-control" id="alfabetico" name="password" >
                <?php if(isset($mensajeError['errorPassword'])){echo '<span style="color:red">'.$mensajeError['errorPassword'].'</span><br>';} ?>
            </div>
            <div class="form-group">
                <label for="repPassword" class="control-label">Repetir Contraseña</label>
                <input type="password" class="form-control" id="alfabetico" name="repPassword" >
                <?php if(isset($mensajeError['errorPasswordNoIgual'])){echo '<span style="color:red">'.$mensajeError['errorPasswordNoIgual'].'</span><br>';} ?>
            </div>

            <div class="form-group">
                <div class="float-right">
                    <input type="submit" name="enviar" class="btn btn-rounded btn-success" value="Aceptar"/>
                    <a href="index.php?pagina=inicio" class="btn btn-rounded btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>