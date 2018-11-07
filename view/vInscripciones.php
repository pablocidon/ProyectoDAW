<div class="container contenido">
    <h1>Ofertas en las que se ha inscrito <?php echo $_SESSION['usuario']->getCodUsuario();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <?php
            if ($inscripciones){
                ?>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align: center;">Oferta</th>
                    <th scope="col" style="text-align: center;">Curriculum</th>
                </tr>
                </thead>
                <tbody>
            <?php
                for ($i=0;$i<count($inscripciones);$i++){
                    echo "<tr>";
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