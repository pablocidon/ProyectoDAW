<?php
/**
 * Vista de la página de los candidatos.
 *
 * Fichero que contiene la vista de la página que contiene los datos de los usuarios que se han inscrito en alguna oferta.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Candidatos.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<div class="container contenido">
    <h1>Candidatos de la empresa <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <?php
            /**
             * En el caso de que haya candidatos para una empresa mostraremos una oferta indicando el nombre y apellidos
             * y el curriculum que el usuario ha seleccionado para la oferta.
             * De lo contrario, mostraremos un mensaje indicando que aún no hay inscripciones para la oferta.
             */
            if ($candidatos){
                ?>
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="text-align: center;">Nombre y apellidos</th>
                        <th scope="col" style="text-align: center;">Curriculum</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0;$i<count($candidatos);$i++){
                        echo "<tr>";
                        echo "<td style='text-align: center'>".$candidatos[$i]->getUsuario()."</td>";
                        echo "<td style='text-align: center'><a href='".$candidatos[$i]->getCurriculum()."' target='_blank'>".$candidatos[$i]->getCurriculum()."</a></td>";
                        echo "</tr>";
                    }?>
                    </tbody>
                </table>
                <?php
            }else{
                echo "<h2> Aún no hay candidatos. </h2>";
            }
            ?>
        </div>
    </div>
</div>