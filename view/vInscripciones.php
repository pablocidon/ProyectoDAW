<?php
/**
 * Vista de la página de inscripciones.
 *
 * Fichero que contiene la vista de la página de inscripciones en la que los usuario podrán consultar en que ofertas se han inscrito.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Inscripcion.
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
        $('#eliminar').attr('disabled', 'disabled');//Elemento cuyo ID sea eliminar añadimos el atributo 'disabled'.
        $('input[name=codOferta]').change(function (){//Si cambia el elemento que sea un input de name 'curriculum', comprobamos que es un valor que no esté vacio y eliminamos el atributo 'disabled' del botón de eliminar.
            if ($(this).val() != ''){
                $('#eliminar').removeAttr('disabled');
            }
        });
    });
</script>
<div class="container-fluid contenido">
    <?php if($_SESSION['usuario']=="Usuario"){?>
        <h1 style="text-align: center">Ofertas en las que se ha inscrito <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <?php }else{
        echo "<h1 style='text-align: center'>Inscripciones de la apliaciación</h1>";
    }?>
    <div class="row content">
        <div class="col-sm-12">
            <form method="post" action="index.php?pagina=inscripciones" id="inscripciones">
            <?php
            if ($inscripciones){
                /**
                 * En el caso de que haya inscripciones, mostraremos una tabla con el título de la oferta, y el curriculum utilizado
                 * en la inscripción. Por el contrario, si no hay inscripciones, mostraremos un mensaje diciendo que no hay inscripciones realizadas,
                 */
                ?>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th></th>
                    <?php if($_SESSION['usuario']->getPerfil()=='Administrador'){
                        echo "<th scope='col' style='text-align: center;'>Usuario</th>";
                    }?>
                    <th scope="col" style="text-align: center;">Oferta</th>
                    <th scope="col" style="text-align: center;">Curriculum</th>
                </tr>
                </thead>
                <tbody>
            <?php
                for ($i=0;$i<count($inscripciones);$i++){
                    $oferta = explode(" ",$inscripciones[$i]->getOferta());
                    echo "<tr>";
                    echo "<td style='text-align: center'><input type='radio' name='codOferta' id='codOferta' aria-label='Checkbox for following text input' value='$oferta[0]'></td>";
                    if($_SESSION['usuario']->getPerfil()=='Administrador'){
                        echo "<td style='text-align: center;'><input type='hidden' name='usuario' value=".$inscripciones[$i]->getUsuario().">".$inscripciones[$i]->getUsuario()."</td>";
                    }
                    echo "<td style='text-align: center'>".$oferta[1]."</td>";
                    echo "<td style='text-align: center'><a href='".$inscripciones[$i]->getCurriculum()."' target='_blank'>".$inscripciones[$i]->getCurriculum()."</a></td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table>
                <div class="form-group">
                    <div class="float-right" style="margin-bottom: 2%">
                        <input type="submit" name="eliminar" class="btn btn-danger" value="Eliminar" id="eliminar"/>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
            <?php
            }else{
                echo "<h2>No se han obtenido resultados</h2>";
            }
            ?>
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