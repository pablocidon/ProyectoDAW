<?php
/**
 * Vista de la página del mantenimiento de usuarios
 *
 * Fichero que contiene la vista de la página del mantenimiento de usuarios en la que el administrador podrá consultar y/o eliminar usuarios.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Inscripcion.
 * @package Vista.
 * @copyright 13 de noviembre de 2018
 */
?>
<script src="webroot/js/jquery.js"></script>
<script type="text/javascript">
    /**
     * Script utilizado para controlar que hay un fichero seleccionado y así eliminar el atributo disabled del botón de importar y el de eliminar.
     */
    $(document).ready(function (){
        $('#eliminar').attr('disabled', 'disabled');//Elemento cuyo ID sea eliminar añadimos el atributo 'disabled'.
        $('input[name=codUsuario]').change(function (){//Si cambia el elemento que sea un input de name 'curriculum', comprobamos que es un valor que no esté vacio y eliminamos el atributo 'disabled' del botón de eliminar.
            if ($(this).val() != ''){
                $('#eliminar').removeAttr('disabled');
            }
        });
    });
    $(document).ready(function (){
        $('#modificar').attr('disabled', 'disabled');//Elemento cuyo ID sea eliminar añadimos el atributo 'disabled'.
        $('input[name=codUsuario]').change(function (){//Si cambia el elemento que sea un input de name 'curriculum', comprobamos que es un valor que no esté vacio y eliminamos el atributo 'disabled' del botón de eliminar.
            if ($(this).val() != ''){
                $('#modificar').removeAttr('disabled');
            }
        });
    });
</script>
<div class="container contenido">
    <h1>Ofertas en las que se ha inscrito <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <?php
            if ($usuarios){
                /**
                 * En el caso de que haya inscripciones, mostraremos una tabla con el título de la oferta, y el curriculum utilizado
                 * en la inscripción. Por el contrario, si no hay inscripciones, mostraremos un mensaje diciendo que no hay inscripciones realizadas,
                 */
                ?>
                <form method="post" action="index.php?pagina=usuarios" id="usuarios">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col" style="text-align: center;">CodUsuario</th>
                            <th scope="col" style="text-align: center;">Nombre</th>
                            <th scope="col" style="text-align: center;">Apellidos</th>
                            <th scope="col" style="text-align: center;">Perfil</th>
                            <th scope="col" style="text-align: center;">Email</th>
                            <th scope="col" style="text-align: center;">Web</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for ($i=0;$i<count($usuarios);$i++){
                            echo "<tr>";
                            echo "<td style='text-align: center'><input type='radio' name='codUsuario' value=".$usuarios[$i]->getCodUsuario()."></td>";
                            echo "<td style='text-align: center'>".$usuarios[$i]->getCodUsuario()."</td>";
                            echo "<td style='text-align: center'>".$usuarios[$i]->getNombre()."</td>";
                            echo "<td style='text-align: center'>".$usuarios[$i]->getApellidos()."</td>";
                            echo "<td style='text-align: center'>".$usuarios[$i]->getPerfil()."</td>";
                            echo "<td style='text-align: center'>".$usuarios[$i]->getEmail()."</td>";
                            echo "<td style='text-align: center'>".$usuarios[$i]->getWeb()."</td>";
                            echo "</tr>";
                        }?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <div class="float-right" style="margin-bottom: 2%">
                            <input type='submit' name='modificar' class='btn btn-dark' value='Modificar' id="modificar"/>
                            <input type='submit' name='eliminar' class='btn btn-danger' value='Eliminar' id='eliminar'/>
                            <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                        </div>
                    </div>
                </form>
                <?php
            }else{
                echo "<h2> Aún no se ha registrado ningún usuario. </h2>";
            }
            ?>
        </div>
    </div>
</div>