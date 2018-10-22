<div class="container contenido">
    <div class="row content">
        <div class="col-sm-3">
            <form name="busqueda" method="post" action="index.php?pagina=inicio">
                <h4>Palabra Clave</h4>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Palabra clave">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="fa fa-search"></span>
                        </button>
                    </span>
                </div>
                <hr>
                <h4>Provincia</h4>
                <div class="input-group-prepend">
                    <ul class="list-group">
                        <!--<li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="provincia">
                        </li>
                        <li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="provincia">
                        </li>
                        <li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="provincia">
                        </li>
                        <li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="provincia">
                        </li>-->
                        <?php for ($i=1;$i<count($provincias);$i++){
                            echo "<li class='list-group-item'>
                            <input type='radio' aria-label='Checkbox for following text input' name='provincia'> $provincias[$i]
                        </li>";
                        }?>
                    </ul>
                </div>
                <hr>
                <h4>Categoría</h4>
                <div class="input-group-prepend">
                    <ul class="list-group">
                        <!--<li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="categoria">
                        </li>
                        <li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="categoria">
                        </li>
                        <li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="categoria">
                        </li>
                        <li class="list-group-item">
                            <input type="radio" aria-label="Checkbox for following text input" name="categoria">
                        </li>-->
                        <?php for ($i=1;$i<count($categorias);$i++){
                           echo "<li class='list-group-item'>
                            <input type='radio' aria-label='Checkbox for following text input' name='categoria'> $categorias[$i]
                        </li>";
                        }?>
                    </ul>
                </div>
            </form>
        </div>

        <div class="col-sm-9 sidenav">
            <?php
            for ($i=0;$i<count($ofertas);$i++){?>
                <a href='index.php?pagina=anuncio&codOferta=<?php echo $ofertas[$i]->getCodOferta();?>'><h3><?php echo $ofertas[$i]->getTitulo(); ?></h3></a>
            <?php
                echo "<h6>".$ofertas[$i]->getCategoria()."</h6>";
            echo "<h6>".$ofertas[$i]->getProvincia()."</h6>";
            echo "<hr>";
            }?>
        </div>
    </div>
</div>
