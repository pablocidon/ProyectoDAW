<script src="webroot/js/jquery.js"></script>
<script type="text/javascript">
    /**
     * Script utilizado para controlar que hay un fichero seleccionado y así eliminar el atributo disabled del botón de importar.
     */
    $(document).ready(function (){
        $('#añadir').attr('disabled', 'disabled');//Elemento cuyo ID sea importar añadimos el atributo 'disabled'.
        $('#fichero').change(function (){//Si cambia el elemento cuyo ID sea fichero, comprobamos que su valor sea distinto a vacío, eliminaremos el atributo 'disabled' del elemento anterior.
            if ($(this).val() != ''){
                $('#añadir').removeAttr('disabled');
            }
        });
    });

    $(document).ready(function (){
        $('#eliminar').attr('disabled', 'disabled');//Elemento cuyo ID sea importar añadimos el atributo 'disabled'.
        $('input[name=curriculum]').change(function (){//Si cambia el elemento cuyo ID sea fichero, comprobamos que su valor sea distinto a vacío, eliminaremos el atributo 'disabled' del elemento anterior.
            if ($(this).val() != ''){
                $('#eliminar').removeAttr('disabled');
            }
        });
    });
</script>
<div class="container contenido">
    <h1>Curriculums del usuario <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <form enctype="multipart/form-data" method="post" name="curriculums" action="index.php?pagina=curriculums" id="curriculums">
                <div class="form-group row">
                    <label for="fichero" class="control-label col-sm-2">Añadir curriculum</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="fichero" name="fichero" accept="application/pdf" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <div class="float-right" style="margin-bottom: 2%">
                        <input type="submit" name="añadir" class="btn btn-dark" value="Añadir" id="añadir"/>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="text-align: center;">Número</th>
                        <th scope="col" style="text-align: center;">Ruta</th>
                        <th scope="col" style="text-align: center;">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0;$i<count($curriculums);$i++){?>
                        <tr>
                            <td style='text-align: center'><input type='radio' aria-label='Checkbox for following text input' name='curriculum' id="curriculum" value='<?php echo $curriculums[$i]->getCodCurriculum();?>'> <?php echo $curriculums[$i]->getCodCurriculum();?></td>
                            <td style="text-align: center"><?php echo $curriculums[$i]->getPath();?></td>
                            <td style='text-align: center'>
                                <a href='<?php echo $curriculums[$i]->getPath();?>' target="_blank" title="Ver Curriculum">Ver curriculum</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
                if(isset($mensajeEliminar)){
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeEliminar.'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                }
                ?>
                <div class="form-group">
                    <div class="float-right" style="margin-bottom: 2%">
                        <input type="submit" name="eliminar" class="btn btn-danger" value="Eliminar" id="eliminar"/>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>