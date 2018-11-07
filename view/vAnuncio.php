<div class="container contenido">
    <h1><?php echo $_SESSION['oferta']->getTitulo();?></h1>
    <div class="row content">
        <div class="col-sm-12">
            <form name="perfil" action="index.php?pagina=anuncio&codOferta=<?php echo $_GET['codOferta'];?>" method="post">
                <div class="form-group row">
                    <label for="titulo" class="control-label col-sm-2">Título</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?php if(isset($_POST['titulo']) && empty($mensajeError['errorTitulo'])){echo 'is-valid';}elseif (isset($_POST['titulo']) && $mensajeError['errorTitulo']!=null){echo 'is-invalid';}?>" id="alfabetico" name="titulo" <?php if(isset($_POST['titulo']) && empty($mensajeError['errorTitulo'])){ echo 'value="',$_POST['titulo'],'"';}else{echo 'value="',$_SESSION['oferta']->getTitulo(),'"';} if($_SESSION['usuario']->getPerfil()=='Usuario'){echo 'readonly';}?>>
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
                        <input type="text" class="form-control <?php if(isset($_POST['empresa']) && empty($mensajeError['errorEmpresa'])){echo 'is-valid';}elseif (isset($_POST['empresa']) && $mensajeError['errorEmpresa']!=null){echo 'is-invalid';}?>" id="alfabetico" name="empresa" <?php if(isset($_POST['empresa']) && empty($mensajeError['errorEmpresa'])){ echo 'value="',$_POST['empresa'],'"';}else{echo 'value="',$_SESSION['oferta']->getEmpresa(),'"';} if($_SESSION['usuario']->getPerfil()=='Usuario'){echo 'readonly';}?>>
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
                        <textarea class="form-control <?php if(isset($_POST['descripcion']) && empty($mensajeError['errorDescripcion'])){echo 'is-valid';}elseif (isset($_POST['descripcion']) && $mensajeError['errorDescripcion']!=null){echo 'is-invalid';}?>" id="exampleTextarea" rows="5" name="descripcion" <?php if($_SESSION['usuario']->getPerfil()=='Usuario'){echo 'readonly';}?>><?php if(isset($_POST['descripcion']) && empty($mensajeError['errorDescripcion'])){ echo $_POST['descripcion'];}else{echo $_SESSION['oferta']->getDescripcion();}?></textarea>
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
                        <textarea class="form-control <?php if(isset($_POST['requisitos']) && empty($mensajeError['errorRequisitos'])){echo 'is-valid';}elseif (isset($_POST['requisitos']) && $mensajeError['errorRequisitos']!=null){echo 'is-invalid';}?>" id="exampleTextarea" rows="5" name="requisitos" value="" <?php if($_SESSION['usuario']->getPerfil()=='Usuario'){echo 'readonly';}?>><?php if(isset($_POST['requisitos']) && empty($mensajeError['errorRequisitos'])){ echo $_POST['requisitos'];}else{echo $_SESSION['oferta']->getRequisitos();}?></textarea>
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
                        <input type="number" class="form-control <?php if(isset($_POST['experiencia']) && empty($mensajeError['errorExperiencia'])){echo 'is-valid';}elseif (isset($_POST['experiencia']) && $mensajeError['errorExperiencia']!=null){echo 'is-invalid';}?>" id="alfabetico" name="experiencia" min="0" <?php if(isset($_POST['experiencia']) && empty($mensajeError['errorExperiencia'])){ echo 'value="',$_POST['experiencia'],'"';}else{echo 'value="',$_SESSION['oferta']->getExperiencia(),'"';} if($_SESSION['usuario']->getPerfil()=='Usuario'){echo 'readonly';}?>>
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
                        <input type="number" class="form-control <?php if(isset($_POST['vacantes']) && empty($mensajeError['errorVacantes'])){echo 'is-valid';}elseif (isset($_POST['vacantes']) && $mensajeError['errorVacantes']!=null){echo 'is-invalid';}?>" id="alfabetico" name="vacantes" min="1"  <?php if(isset($_POST['vacantes']) && empty($mensajeError['errorVacantes'])){ echo 'value="',$_POST['vacantes'],'"';}else{ echo 'value="',$_SESSION['oferta']->getVacantes(),'"';} if($_SESSION['usuario']->getPerfil()=='Usuario'){echo 'readonly';}?>>
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
                        <?php if($_SESSION['usuario']->getPerfil()=='Usuario'){?>
                           <input type='text' class='form-control' id='alfabetico' name='categoria' readonly value="<?php echo $_SESSION['oferta']->getCategoria();?>">
                        <?php }else { ?>
                            <select name="categoria" class="custom-select <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria'])){echo 'is-valid';}elseif (isset($_POST['categoria']) && $mensajeError['errorCategoria']!=null){echo 'is-invalid';}?>">
                                <option <?php if (!isset($_POST['categoria']) || $mensajeError['errorCategoria']!=null){echo 'selected';}?>>Seleccione una categoría</option>
                                <option value="1" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="1"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Administracion de empresas "){echo 'selected';}?>>Administración de empresas </option>
                                <option value="2" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="2"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Administracion publica"){echo 'selected';}?>>Administración pública</option>
                                <option value="3" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="3"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Atencion a clientes"){echo 'selected';}?>>Atención a clientes</option>
                                <option value="4" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="4"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Calidad, produccion e I+D"){echo 'selected';}?>>Calidad, producción e I+D</option>
                                <option value="5" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="5"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Comercial y ventas"){echo 'selected';}?>>Comercial y ventas</option>
                                <option value="6" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="6"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Compras logistica y almacen"){echo 'selected';}?>>Compras logística y almacen</option>
                                <option value="7" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="7"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Diseño y artes graficas"){echo 'selected';}?>>Diseño y artes gráficas</option>
                                <option value="8" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="8"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Educacion y formacion"){echo 'selected';}?>>Educación y formación</option>
                                <option value="9" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="9"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Finanzas y banca"){echo 'selected';}?>>Finanzas y banca</option>
                                <option value="10" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="10"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Informatica y telecomunicaciones"){echo 'selected';}?>>Informática y telecomunicaciones</option>
                                <option value="11" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="11"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Ingenieros y tecnicos"){echo 'selected';}?>>Ingenieros y técnicos</option>
                                <option value="12" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="12"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Inmobiliario y construcción"){echo 'selected';}?>>Inmobiliario y construcción</option>
                                <option value="13" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="13"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Legal"){echo 'selected';}?>>Legal</option>
                                <option value="14" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="14"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Marketing y comunicacion"){echo 'selected';}?>>Marketing y comunicación</option>
                                <option value="15" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="15"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Profesiones, artes y oficios"){echo 'selected';}?>>Profesiones, artes y oficios</option>
                                <option value="16" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="16"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Recursos humanos"){echo 'selected';}?>>Recursos humanos</option>
                                <option value="17" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="17"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Sanidad y salud"){echo 'selected';}?>>Sanidad y salud</option>
                                <option value="18" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="18"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Sector farmaceutico"){echo 'selected';}?>>Sector farmaceútico</option>
                                <option value="19" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="19"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Turismo y restauracion"){echo 'selected';}?>>Turismo y restauración</option>
                                <option value="20" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="20"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Ventas al detalle"){echo 'selected';}?>>Ventas al detalle</option>
                                <option value="21" <?php if(isset($_POST['categoria']) && empty($mensajeError['errorCategoria']) && $_POST['categoria']=="21"){echo 'selected';}elseif ($_SESSION['oferta']->getCategoria()=="Otros"){echo 'selected';}?>>Otros</option>
                            </select>
                            <?php
                            if(isset($mensajeError['errorCategoria'])){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorCategoria'].'
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                       </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="provincia" class="control-label col-sm-2">Provincia</label>
                    <div class="col-sm-10">
                        <?php if($_SESSION['usuario']->getPerfil()=='Usuario'){?>
                            <input type='text' class='form-control' id='alfabetico' name='provincia' readonly value='<?php echo $_SESSION['oferta']->getProvincia();?>'>
                        <?php }else {?>
                            <select name="provincia" class="custom-select <?php if(isset($_POST['provincia']) && empty($mensajeError['errorProvincia'])){echo 'is-valid';}elseif (isset($_POST['provincia']) && $mensajeError['errorProvincia']!=null){echo 'is-invalid';}?>" id="provincias">
                                <option <?php if (!isset($_POST['provincia']) || $mensajeError['errorProvincia']!=null){echo 'selected';}?>>Seleccione una provincia</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Avila"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Avila"){echo 'selected';}?>>Ávila</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Burgos"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Burgos"){echo 'selected';}?>>Burgos</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Leon"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Leon"){echo 'selected';}?>>León</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Palencia"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Palencia"){echo 'selected';}?>>Palencia</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Salamanca"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Salamanca"){echo 'selected';}?>>Salamanca</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Segovia"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Segovia"){echo 'selected';}?>>Segovia</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Soria"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Soria"){echo 'selected';}?>>Soria</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Valladolid"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Valladolid"){echo 'selected';}?>>Valladolid</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Zamora"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Zamora"){echo 'selected';}?>>Zamora</option>
                                <option <?php if (isset($_POST['provincia']) && empty($mensajeError['errorProvincia']) && $_POST['provincia']=="Todas"){echo 'selected';}elseif ($_SESSION['oferta']->getProvincia()=="Todas"){echo 'selected';}?>>Todas</option>
                            </select>
                        <?php
                            if(isset($mensajeError['errorProvincia'])){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.$mensajeError['errorCategoria'].'
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                       </div>';
                            }
                        }?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="float-right" style="margin-bottom: 2%">
                        <?php if($_SESSION['usuario']->getPerfil()=="Usuario"){
                            echo "<input type='submit' name='inscribir' class='btn btn-dark' value='Inscribirse'/> ";
                        }elseif ($_SESSION['usuario']->getPerfil()=="Empresa" && $_SESSION['oferta']->getCodEmpresa()==$_SESSION['usuario']->getCodUsuario()){
                            echo "<input type='submit' name='modificar' class='btn btn-dark' value='Modificar'/> ";
                            echo "<input type='submit' name='eliminar' class='btn btn-danger' value='Eliminar'/>";
                        }?>
                        <input type="submit" name="cancelar" class="btn btn-secondary" value="Cancelar"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>