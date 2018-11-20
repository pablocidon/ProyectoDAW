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
                            echo "<td style='text-align: center'><a href='index.php?pagina=usuario&codUsuario=".$usuarios[$i]->getCodUsuario()."'>".$usuarios[$i]->getCodUsuario()."</a></td>";
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
                            <input type='submit' name='nuevo' class='btn btn-dark' value='Nuevo'/>
                            <input type="submit" name="volver" class="btn btn-secondary" value="Volver"/>
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