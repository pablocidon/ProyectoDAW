<div class="row col-md-12 ">
    <?php
    echo "<div class='row col-md-12'><h2>Welcome ",$_SESSION['usuario']->getCodUsuario(),"!</h2></div><br>";
    echo "<br><br>";
    echo "<div class='row col-md-12'><h2>El perfil de este usuario es ",$_SESSION['usuario']->getPerfil(),"</h2></div><br>";
    echo "<br><br>";
    echo "<div class='row col-md-12'><h2>Descripcion: ",$_SESSION['usuario']->getDescripcion(),"</h2></div><br>";
    echo "<br><br>";
    echo "<div class='row col-md-12'><h2>Ultima visita: ",$_SESSION['usuario']->getUltimaConexion(),"</h2></div><br>";
    echo "<br><br>";
    echo "<div class='row col-md-12'><h2>Numero de visitas: ",$_SESSION['usuario']->getNumeroAccesos(),"</h2></div><br>";
    ?>
</div>
<br><br>
