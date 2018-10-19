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
                for ($i=0;$i<count($ofertas);$i++){
                    echo "<tr>";
                    echo "<td style='text-align: center'>".$ofertas[$i]->getCodOferta()."</td>";
                    echo "<td>".$ofertas[$i]->getTitulo()."</td>";
                    echo "<td>".$ofertas[$i]->getDescripcion()."</td>";
                    echo "<td>".$ofertas[$i]->getRequisitos()."</td>";
                    echo "<td style='text-align: center'>".$ofertas[$i]->getExperiencia()."</td>";
                    echo "<td style='text-align: center'>".$ofertas[$i]->getVacantes()."</td>";
                    echo "<td>".$ofertas[$i]->getCategoria()."</td>";
                    echo "<td>".$ofertas[$i]->getProvincia()."</td>";
                    echo "<td><span class='fa fa-eye'></span>/<span class='fa fa-pencil'></span>/<span class='fa fa-trash'></span></td>";
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
