<div class="container contenido">
    <h1 class="display-1">EmpleSauces</h1>
    <div class="row">
        <div class="col-sm-8">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="webroot/img/job.png">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First Slide</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="webroot/img/job.png">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second Slide</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="webroot/img/job.png">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third Slide</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="codUsuario" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
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
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            <p>Project 1</p>
        </div>
        <div class="col-sm-3">
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            <p>Project 2</p>
        </div>
        <div class="col-sm-3">
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            <p>Project 3</p>
        </div>
        <div class="col-sm-3">
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
            <p>Project 4</p>
        </div>
    </div>
</div>

