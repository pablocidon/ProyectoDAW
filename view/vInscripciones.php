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
<div class="container contenido">
    <h1>Ofertas en las que se ha inscrito <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
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
                    echo "<tr>";
                    if($_SESSION['usuario']->getPerfil()=='Administrador'){
                        echo "<td style='text-align: center;'>".$inscripciones[$i]->getUsuario()."</td>";
                    }
                    echo "<td style='text-align: center'>".$inscripciones[$i]->getOferta()."</td>";
                    echo "<td style='text-align: center'><a href='".$inscripciones[$i]->getCurriculum()."' target='_blank'>".$inscripciones[$i]->getCurriculum()."</a></td>";
                    echo "</tr>";
                }?>
                </tbody>
            </table>
            <?php
            }else{
                echo "<h2> Aún no te has inscrito en ninguna oferta. </h2>";
            }
            ?>
        </div>
    </div>
</div>