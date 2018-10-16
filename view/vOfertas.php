<div class="container contenido">
    <h1>Ofertas de la empresa <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <?php
                for ($i=0;$i<count($ofertas);$i++){
                    echo $ofertas[$i]->getCodOferta().'<br>';
                    echo $ofertas[$i]->getTitulo().'<br>';
                    echo $ofertas[$i]->getDescripcion().'<br>';
                    echo $ofertas[$i]->getRequisitos().'<br>';
                    echo $ofertas[$i]->getExperiencia().'<br>';
                    echo $ofertas[$i]->getVacantes().'<br>';
                    echo $ofertas[$i]->getCategoria().'<br>';
                    echo $ofertas[$i]->getProvincia().'<br>';
                    echo $ofertas[$i]->getCodEmpresa().'<br>';
                }
            ?>
        </div>
    </div>
</div>
