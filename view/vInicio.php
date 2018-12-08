<?php
/**
 * Vista de la página de inicio.
 *
 * Fichero que contiene la vista de la página de inicio.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Inicio.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<div class="container contenido">
    <div class="row content">
        <div class="col-sm-3">
            <form name="busqueda" method="post" action="index.php?pagina=inicio">
                <h4>Palabra Clave</h4>
                <div class="input-group">
                    <input type="text" class="form-control" name="clave" placeholder="Palabra clave" <?php if (isset($_POST['buscar'])||isset($_POST['filtros'])){echo 'value="',$_POST['clave'],'"';}?>>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="buscar">
                            <span class="fa fa-search"></span>
                        </button>
                    </span>
                </div>
                <hr>
                <h4>Provincia</h4>
                <div class="input-group-prepend">
                    <ul class="list-group">
                        <?php
                        /**
                         * Realizamos un bucle que nos vaya mostrando cada una de las provincias en las que se encuentre alguna de las ofertas.
                         */
                        echo "<li class='list-group-item'>
                            <input type='radio' aria-label='Checkbox for following text input' name='provincia' value='' checked> ".'Todas'."
                        </li>";
                        for ($i=0;$i<count($provincias);$i++){
                            echo "<li class='list-group-item'>
                            <input type='radio' aria-label='Checkbox for following text input' name='provincia' value=".$provincias[$i]['Provincia']."> ".$provincias[$i]['Provincia']."
                        </li>";
                        }?>
                    </ul>
                </div>
                <hr>
                <h4>Categoría</h4>
                <div class="input-group-prepend" style="margin-bottom: 5%">
                    <ul class="list-group">
                        <?php
                        /**
                         * Realizamos un bucle que nos vaya mostrando cada una de las categorías en las que se encuentra alguna de las ofertas.
                         */
                        echo "<li class='list-group-item'>
                            <input type='radio' aria-label='Checkbox for following text input' name='categoria' value=''checked> ".'Todas'."
                        </li>";
                        for ($i=0;$i<count($categorias);$i++){
                            echo "<li class='list-group-item'>
                            <input type='radio' aria-label='Checkbox for following text input' name='categoria' value='".$categorias[$i]['Categoria']."'> ".$categorias[$i]['Categoria']."
                        </li>";
                        }?>
                    </ul>
                </div>
                <button class="btn btn-dark" type="submit" style="margin-bottom: 5%" name="filtros">
                    <span class="fa fa-sliders"></span> Aplicar filtros
                </button>
            </form>
        </div>

        <div class="col-sm-9 sidenav">
            <?php
            /**
             * Realizamos un bucle que nos vaya mostrando el título como enlace para la oferta,
             * la categoría y la provincia de las mismas.
             */
            for ($i=0;$i<count($ofertas);$i++){?>
                <a href='index.php?pagina=anuncio&codOferta=<?php echo $ofertas[$i]->getCodOferta();?>'><h3><?php echo $ofertas[$i]->getTitulo(); ?></h3></a>
            <?php
                echo "<h6>".$ofertas[$i]->getCategoria()."</h6>";
            echo "<h6>".$ofertas[$i]->getProvincia()."</h6>";
            echo "<hr>";
            }?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php
                    if($_GET['numeroPagina']==1){
                        ?>
                        <li class="page-item disabled"><a class="page-link">&laquo;</a></li>

                        <li class="page-item active"><a class="page-link"><?php echo $_GET['numeroPagina'].' de '.$numeroPaginas;?></a></li>
                        <li class="page-item <?php if($numeroPaginas==1 || $numeroPaginas==0){echo 'disabled';}?>"><a class="page-link" href="index.php?pagina=inicio&numeroPagina=<?php echo $_GET['numeroPagina']+1;?>">&raquo;</a></li>
                        <?php
                    }elseif ($_GET['numeroPagina']<$numeroPaginas){
                        ?>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=inicio&numeroPagina=<?php echo $_GET['numeroPagina']-1;?>">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href=""><?php echo $_GET['numeroPagina'].' de '.$numeroPaginas;?></a></li>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=inicio&numeroPagina=<?php echo $_GET['numeroPagina']+1;?>">&raquo;</a></li>
                        <?php
                    }elseif ($_GET['numeroPagina']==$numeroPaginas){
                        ?>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=inicio&numeroPagina=<?php echo $_GET['numeroPagina']-1;?>">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href=""><?php echo $_GET['numeroPagina'].' de '.$numeroPaginas;?></a></li>
                        <li class="page-item disabled"><a class="page-link" href="">&raquo;</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
