<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on('ready',function (){

        $.getJSON('core/provincias.json', function(data) {
            $.each(data, function(nm, nombre) {
                $("#provincias").append('<option value="' + nm + '">' + nombre + '</option>');
            }); // close each()
        }); // close getJSON()
    });
</script>
<div class="container contenido">
    <h1>Publicar Nueva Oferta</h1>
    <div class="row content">
        <div class="col-sm-12">
            <form name="perfil" action="index.php?pagina=publicar" method="post">
                <div class="form-group row">
                    <label for="titulo" class="control-label col-sm-2">Título</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alfabetico" name="titulo">
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
                        <input type="text" class="form-control" id="alfabetico" name="empresa">
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
                        <textarea class="form-control" id="exampleTextarea" rows="5" name="descripcion"></textarea>
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
                        <textarea class="form-control" id="exampleTextarea" rows="5" name="requisitos"></textarea>
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
                        <input type="number" class="form-control" id="alfabetico" name="experiencia" min="0">
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
                        <input type="number" class="form-control" id="alfabetico" name="puestos" min="1">
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
                        <select name="categoria" class="custom-select">
                            <option selected>Seleccione una categoría</option>
                            <option value="1">Administración de empresas </option>
                            <option value="2">Administración pública</option>
                            <option value="3">Atención a clientes</option>
                            <option value="4">Calidad, producción e I+D</option>
                            <option value="5">Comercial y ventas</option>
                            <option value="6">Compras logística y almacen</option>
                            <option value="7">Diseño y artes gráficas</option>
                            <option value="8">Educación y formación</option>
                            <option value="9">Finanzas y banca</option>
                            <option value="11">Informática y telecomunicaciones</option>
                            <option value="12">Ingenieros y técnicos</option>
                            <option value="13">Inmobiliario y construcción</option>
                            <option value="14">Legal</option>
                            <option value="15">Marketing y comunicación</option>
                            <option value="16">Profesiones, artes y oficios</option>
                            <option value="17">Recursos humanos</option>
                            <option value="18">Sanidad y salud</option>
                            <option value="19">Sector farmaceútico</option>
                            <option value="20">Turismo y restauración</option>
                            <option value="21">Ventas al detalle</option>
                            <option value="22">Otros</option>
                        </select>
                        <?php //si existe mensaje de error lo mostramos
                        if(isset($mensajeError['errorCategoria'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorCategoria'].'
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
                        <select name="provincia" class="custom-select" id="provincias">
                            <option selected>Seleccione una provincia</option>
                        </select>
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