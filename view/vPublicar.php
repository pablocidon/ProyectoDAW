<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on('ready',function (){

        $.getJSON('core/provincias.json', function(data) {
            $.each(data, function(nm, nombre) {
                $("#provincias").append('<option value="' + nm + '">' + nombre + '</option>');
            }); // close each()
        }); // close getJSON()
    });
</script>-->
<?php
/**
 * Vista de la página de publicar.
 *
 * Fichero que contiene el formulario para publicar las diferentes ofertas
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Publicar.
 * @package Vista.
 * @copyright 09 de noviembre de 2018
 */
?>
<div class="container-fluid contenido">
    <h1>Publicar Nueva Oferta</h1>
    <div class="row content">
        <div class="col-sm-12">
            <form name="perfil" action="index.php?pagina=publicar" method="post">
                <div class="form-group row">
                    <label for="titulo" class="control-label col-sm-2">Título</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['titulo']) && empty($mensajeError['errorTitulo'])){echo 'is-valid';}elseif (isset($_POST['titulo']) && $mensajeError['errorTitulo']!=null){echo 'is-invalid';}?>" id="alfabetico" name="titulo" <?php if(isset($_POST['titulo']) && empty($mensajeError['errorTitulo'])){ echo 'value="',$_POST['titulo'],'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorTitulo'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorTitulo'].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="empresa" class="control-label col-sm-2">Empresa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['empresa']) && empty($mensajeError['errorEmpresa'])){echo 'is-valid';}elseif (isset($_POST['empresa']) && $mensajeError['errorEmpresa']!=null){echo 'is-invalid';}?>" id="alfabetico" name="empresa" <?php if(isset($_POST['empresa']) && empty($mensajeError['errorEmpresa'])){ echo 'value="',$_POST['empresa'],'"';}else{echo 'value="',$_SESSION['usuario']->getNombre(),'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorEmpresa'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorEmpresa'].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="descripcion" class="control-label col-sm-2">Descripción</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?php if(isset($_POST['descripcion']) && empty($mensajeError['errorDescripcion'])){echo 'is-valid';}elseif (isset($_POST['descripcion']) && $mensajeError['errorDescripcion']!=null){echo 'is-invalid';}?>" id="exampleTextarea" rows="5" name="descripcion"><?php if(isset($_POST['descripcion']) && empty($mensajeError['errorDescripcion'])){ echo $_POST['descripcion'];}?></textarea>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorDescripcion'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorDescripcion'].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="requisitos" class="control-label col-sm-2">Requisitos</label>
                    <div class="col-sm-10">
                        <textarea class="form-control <?php if(isset($_POST['requisitos']) && empty($mensajeError['errorRequisitos'])){echo 'is-valid';}elseif (isset($_POST['requisitos']) && $mensajeError['errorRequisitos']!=null){echo 'is-invalid';}?>" id="exampleTextarea" rows="5" name="requisitos"><?php if(isset($_POST['requisitos']) && empty($mensajeError['errorRequisitos'])){ echo $_POST['requisitos'];}?></textarea>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorRequisitos'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorRequisitos'].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="experiencia" class="control-label col-sm-2">Experiencia</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?php if(isset($_POST['experiencia']) && empty($mensajeError['errorExperiencia'])){echo 'is-valid';}elseif (isset($_POST['experiencia']) && $mensajeError['errorExperiencia']!=null){echo 'is-invalid';}?>" id="alfabetico" name="experiencia" min="0" <?php if(isset($_POST['experiencia']) && empty($mensajeError['errorExperiencia'])){ echo 'value="',$_POST['experiencia'],'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorExperiencia'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorExperiencia'].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="vacantes" class="control-label col-sm-2">Vacantes</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?php if(isset($_POST['vacantes']) && empty($mensajeError['errorVacantes'])){echo 'is-valid';}elseif (isset($_POST['vacantes']) && $mensajeError['errorVacantes']!=null){echo 'is-invalid';}?>" id="alfabetico" name="vacantes" min="1" <?php if(isset($_POST['vacantes']) && empty($mensajeError['errorVacantes'])){ echo 'value="',$_POST['vacantes'],'"';}?>>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorVacantes'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorVacantes'].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="categoria" class="control-label col-sm-2">Categoría</label>
                    <div class="col-sm-10">
                        <select name="categoria" class="custom-select <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria'])){echo 'is-valid';}elseif (isset($_POST['categoria']) && $mensajeError['errorCategoria']!=null){echo 'is-invalid';}?>">
                            <!--
                                Comprobaremos que está definido, que no hay mensaje de error y el valor que se habia seleccionado para
                                así mantener la selección el caso de que haya algún error en algún otro campo.
                            -->
                            <option <?php if (!isset($_POST['categoria']) || $mensajeError['errorCategoria']!=null){echo 'selected';}?>>Seleccione una categoría</option>
                            <option value="1" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="1"){echo 'selected';}?>>Administración de empresas </option>
                            <option value="2" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="2"){echo 'selected';}?>>Administración pública</option>
                            <option value="3" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="3"){echo 'selected';}?>>Atención a clientes</option>
                            <option value="4" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="4"){echo 'selected';}?>>Calidad, producción e I+D</option>
                            <option value="5" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="5"){echo 'selected';}?>>Comercial y ventas</option>
                            <option value="6" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="6"){echo 'selected';}?>>Compras logística y almacen</option>
                            <option value="7" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="7"){echo 'selected';}?>>Diseño y artes gráficas</option>
                            <option value="8" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="8"){echo 'selected';}?>>Educación y formación</option>
                            <option value="9" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="9"){echo 'selected';}?>>Finanzas y banca</option>
                            <option value="10" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="10"){echo 'selected';}?>>Informática y telecomunicaciones</option>
                            <option value="11" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="11"){echo 'selected';}?>>Ingenieros y técnicos</option>
                            <option value="12" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="12"){echo 'selected';}?>>Inmobiliario y construcción</option>
                            <option value="13" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="13"){echo 'selected';}?>>Legal</option>
                            <option value="14" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="14"){echo 'selected';}?>>Marketing y comunicación</option>
                            <option value="15" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="15"){echo 'selected';}?>>Profesiones, artes y oficios</option>
                            <option value="16" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="16"){echo 'selected';}?>>Recursos humanos</option>
                            <option value="17" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="17"){echo 'selected';}?>>Sanidad y salud</option>
                            <option value="18" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="18"){echo 'selected';}?>>Sector farmaceútico</option>
                            <option value="19" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="19"){echo 'selected';}?>>Turismo y restauración</option>
                            <option value="20" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="20"){echo 'selected';}?>>Ventas al detalle</option>
                            <option value="21" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="21"){echo 'selected';}?>>Otros</option>
                        </select>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorCategoria'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorCategoria'].'<br>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="provincia" class="control-label col-sm-2">Provincia</label>
                    <div class="col-sm-10">
                        <select name="provincia" class="custom-select <?php if(isset($_POST['provincia']) && empty($mensajeError['errorProvincia'])){echo 'is-valid';}elseif (isset($_POST['provincia']) && $mensajeError['errorProvincia']!=null){echo 'is-invalid';}?>" id="provincias">
                            <!--
                                Comprobaremos que está definido, que no hay mensaje de error y el valor que se habia seleccionado para
                                así mantener la selección el caso de que haya algún error en algún otro campo.
                            -->
                            <option <?php if (!isset($_POST['provincia']) || $mensajeError['errorProvincia']!=null){echo 'selected';}?>>Seleccione una provincia</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Ávila"){echo 'selected';}?>>Ávila</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Burgos"){echo 'selected';}?>>Burgos</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="León"){echo 'selected';}?>>León</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Palencia"){echo 'selected';}?>>Palencia</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Salamanca"){echo 'selected';}?>>Salamanca</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Segovia"){echo 'selected';}?>>Segovia</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Soria"){echo 'selected';}?>>Soria</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Valladolid"){echo 'selected';}?>>Valladolid</option>
                            <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Zamora"){echo 'selected';}?>>Zamora</option>
                        </select>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorProvincia'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorProvincia'].'<br>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }elseif (isset($mensajeError['errorPublicar'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorPublicar'].'<br>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="float-right" style="margin-bottom: 2%">
                        <input type="submit" name="publicar" class="btn btn-dark" value="Publicar"/>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="container-fluid text-center footer" id="pie">
    <p style="margin-top: 1%;"><strong>© 2018 Copyright: Pablo Cidón           |
            <i class="fa fa-linkedin" style="color: deepskyblue"></i> |
            <i class="fa fa-facebook-official" style="color: blue"></i> |
            <i class="fa fa-twitter" style="color: deepskyblue"></i> |
            <i class="fa fa-instagram" style="color: purple"></i>
        </strong>
    </p>
</footer>