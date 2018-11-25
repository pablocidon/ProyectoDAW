<?php
/**
 * Vista de la página de ofertas.
 *
 * Fichero que contiene las ofertas pertenecientes a una determinada empresa.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Ofertas.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<div class="container contenido">
    <?php if($_SESSION['usuario']=="Empresa"){?>
        <h1 style="text-align: center">Ofertas de la empresa <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <?php }else{
        echo "<h1 style='text-align: center'>Ofertas de la aplicación</h1>";
    }?>
    <div class="row content">
        <div class="col-sm-12">
            <form method="post" action="index.php?pagina=ofertas" id="ofertas">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">Nº</th>
                    <th scope="col" style="text-align: center;">Título</th>
                    <th scope="col" style="text-align: center;">Descripción</th>
                    <th scope="col" style="text-align: center;">Requisitos</th>
                    <th scope="col" style="text-align: center;">Experiencia</th>
                    <th scope="col" style="text-align: center;">Vacantes</th>
                    <th scope="col" style="text-align: center;">Categoria</th>
                    <th scope="col" style="text-align: center;">Provincia</th>
                    <th scope="col" style="text-align: center;">Empresa</th>
                    <th scope="col" style="text-align: center;">Opciones</th>
                </tr>
                </thead>
                <tbody>
            <?php
            /**
             * Recorreremos cada uno de los registros obtenidos, mostrándolos en una tabla,
             * así como un enlace al anuncio y otro para ver quienes se han inscrito en dicha oferta.
             */
                for ($i=0;$i<count($ofertas);$i++){?>
                    <tr>
                    <td style='text-align: center'><?php echo $ofertas[$i]->getCodOferta();?></td>
                    <td><?php echo $ofertas[$i]->getTitulo();?></td>
                    <td><?php echo $ofertas[$i]->getDescripcion();?></td>
                    <td><?php echo $ofertas[$i]->getRequisitos();?></td>
                    <td style='text-align: center'><?php echo $ofertas[$i]->getExperiencia();?></td>
                    <td style='text-align: center'><?php echo $ofertas[$i]->getVacantes();?></td>
                        <td><?php echo $ofertas[$i]->getCategoria();?></td>
                        <td><?php echo $ofertas[$i]->getProvincia();?></td>
                        <td><?php echo $ofertas[$i]->getCodEmpresa();?></td>
                    <td style='text-align: center'>
                        <a href='index.php?pagina=anuncio&codOferta=<?php echo $ofertas[$i]->getCodOferta();?>' title="Ver Oferta"><span class='fa fa-eye'></span></a> /
                        <a href='index.php?pagina=candidatos&codOferta=<?php echo $ofertas[$i]->getCodOferta();?>' title="Ver Candidatos"><span class='fa fa-group'></span></a>
                    </td>
                    </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
            <div class="form-group">
                <div class="float-right" style="margin-bottom: 2%">
                    <input type='submit' name='nueva' class='btn btn-dark' value='Nueva'/>
                    <input type="submit" name="volver" class="btn btn-secondary" value="Volver"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
