<div class="container contenido">
    <h1>Curriculums del usuario <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <form method="post" name="curriculums" action="index.php?pagina=curriculums">
                <h4><small>RECENT POSTS</small></h4>
                <hr>
                <h2>I Love Food</h2>
                <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
                <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
                <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <br><br>

                <h4><small>RECENT POSTS</small></h4>
                <hr>
                <h2>Officially Blogging</h2>
                <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
                <h5><span class="label label-success">Lorem</span></h5><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <hr>
                <div class="form-group">
                    <div class="card border-warning mb-3">
                        <div class="card-body text-warning">
                            <h5 class="card-title">Añadir Curriculum</h5>
                            <input type="file" class="form-control" id="alfabetico" name="curriculum" accept="application/pdf" multiple>
                            <small>Solamente archivos con extensión pdf</small>
                            <?php
                            if(isset($mensajeError['errorSubidaCurriculum'])){
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.$mensajeError['errorSubidaCurriculum'].'
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                            }
                            ?>
                            <br><input type="submit" name="subir" class="btn btn-warning float-right" value="Agregar archivo/s"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>