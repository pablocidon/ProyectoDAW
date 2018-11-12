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
    <h1>Ofertas de la empresa <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">Número</th>
                    <th scope="col" style="text-align: center;">Título</th>
                    <th scope="col" style="text-align: center;">Descripción</th>
                    <th scope="col" style="text-align: center;">Requisitos</th>
                    <th scope="col" style="text-align: center;">Experiencia</th>
                    <th scope="col" style="text-align: center;">Vacantes</th>
                    <th scope="col" style="text-align: center;">Categoria</th>
                    <th scope="col" style="text-align: center;">Provincia</th>
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
        </div>
    </div>
</div>
