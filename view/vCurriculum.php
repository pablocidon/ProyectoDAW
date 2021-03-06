<?php
/**
 * Vista de la página de los curriculums.
 *
 * Fichero que contiene la vista de las página que contiene los curriculums que tiene cada usuario.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Curriculums.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<script src="webroot/js/jquery.js"></script>
<script type="text/javascript">
    /**
     * Script utilizado para controlar que hay un fichero seleccionado y así eliminar el atributo disabled del botón de importar y el de eliminar.
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
        $('#eliminar').attr('disabled', 'disabled');//Elemento cuyo ID sea eliminar añadimos el atributo 'disabled'.
        $('input[name=curriculum]').change(function (){//Si cambia el elemento que sea un input de name 'curriculum', comprobamos que es un valor que no esté vacio y eliminamos el atributo 'disabled' del botón de eliminar.
            if ($(this).val() != ''){
                $('#eliminar').removeAttr('disabled');
            }
        });
    });
</script>
<div class="container-fluid contenido">
    <?php if($_SESSION['usuario']=="Usuario"){?>
        <h1 style="text-align: center">Curriculums del usuario <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <?php }else{
        echo "<h1 style='text-align: center'>Curriculums de la aplicación</h1>";
    }?>
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
                <?php if ($curriculums){?>
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" style="text-align: center;">Número</th>
                        <th scope="col" style="text-align: center;">Usuario</th>
                        <th scope="col" style="text-align: center;">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0;$i<count($curriculums);$i++) {
                        /**
                         * Recorremos un bucle mostrando cada uno de los curriculums obtenidos en una tabla, indicando el identificador,
                         * la ruta en la que se encuentran y un enlace para visualizarlo.
                         */
                        ?>
                        <tr>
                            <td style='text-align: center'><input type='radio'
                                                                  aria-label='Checkbox for following text input'
                                                                  name='curriculum' id="curriculum"
                                                                  value='<?php echo $curriculums[$i]->getCodCurriculum(); ?>'></td>
                            <td style='text-align: center'><?php echo $curriculums[$i]->getCodCurriculum(); ?></td>
                            <td style="text-align: center"><input type="hidden" name="usuario"
                                                                  value="<?php echo $curriculums[$i]->getCodUsuario(); ?>"><?php echo $curriculums[$i]->getCodUsuario(); ?>
                            </td>
                            <td style='text-align: center'>
                                <input type="hidden" name="path"
                                       value="<?php echo $curriculums[$i]->getPath(); ?>">
                                <a href='<?php echo $curriculums[$i]->getPath(); ?>' target="_blank"
                                   title="Ver Curriculum">Ver curriculum</a>
                            </td>
                        </tr>
                        <?php
                    }
                    }else{
                        echo "<h1> No se han obtenido resultados </h1>";
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
<footer class="container-fluid text-center footer" id="pie" style="position: absolute;">
    <p style="margin-top: 1%;"><strong>© 2018 Copyright: Pablo Cidón           |
            <i class="fa fa-linkedin" style="color: deepskyblue"></i> |
            <i class="fa fa-facebook-official" style="color: blue"></i> |
            <i class="fa fa-twitter" style="color: deepskyblue"></i> |
            <i class="fa fa-instagram" style="color: purple"></i>
        </strong>
    </p>
</footer>