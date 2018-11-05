<div class="container contenido">
    <h1>Ofertas en las que se ha inscrito <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <?php
            if ($inscripciones){
                for ($i=0;$i<count($inscripciones);$i++){
                    echo $inscripciones[$i]->getOferta()."<br>";
                    echo $inscripciones[$i]->getCurriculum()."<br>";
                }
            }else{
                echo "<h2> Aún no te has inscrito en ninguna oferta. </h2>";
            }
            ?>
        </div>
    </div>
</div>