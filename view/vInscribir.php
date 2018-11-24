<?php
/**
 * Vista de la página de inscribir.
 *
 * Fichero que nos muestra un formulario en el que los usuarios pueden realizar sus inscripciones.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Inscribir.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<div class="container contenido">
    <h1>Inscripción en la Oferta</h1>
    <div class="row content">
        <div class="col-sm-12">
            <form enctype="multipart/form-data" method="post" name="curriculums" action="index.php?pagina=inscribir" id="curriculums">
                <div class="form-group row">
                    <label for="fichero" class="control-label col-sm-2">Usuario</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?php echo $_SESSION['usuario']->getCodUsuario();?>" id="usuario" name="usuario" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fichero" class="control-label col-sm-2">Oferta</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  value="<?php echo $_SESSION['oferta']->getTitulo();?>" id="oferta" name="oferta" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fichero" class="control-label col-sm-2">Curriculum</label>
                    <div class="col-sm-10">
                        <?php
                        /**
                         * Si el usuario que se va a inscribir tiene algún curriculum, se le mostrará para que lo pueda seleccionar,
                         * por el contrario se le mostrará un mensaje indicando que no tiene ninguno y un enlace a la página de añadir curriculums.
                         */
                            if ($curriculums){
                                for($i=0;$i<count($curriculums);$i++){
                                    echo "<input type='radio' aria-label='Checkbox for following text input' name='curriculum' value='".$curriculums[$i]->getCodCurriculum()."'> ".$curriculums[$i]->getPath().'<hr>';
                                }
                            }else{
                                echo "Aún no tienes ningún curriculum <a href='index.php?pagina=curriculums'>Añádelo aquí</a>";
                            }
                            if(isset($_POST['aceptar']) && $inscrito == true){
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Inscripción realizada con éxito
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               </div>';
                            }elseif (isset($_POST['aceptar']) && $inscrito == false){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Error al realizar la inscripción
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
                        <input type="submit" name="aceptar" class="btn btn-dark" value="Aceptar" <?php if(!$curriculums){echo 'disabled';}?>/>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>