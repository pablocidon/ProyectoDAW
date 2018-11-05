<?php
if(isset($_POST['cancelar'])){
    header("Location: index.php?pagina=inicio");
}
if (isset($_POST['publicar'])){  //Si se ha pulsado enviar cargamos los errores
    $mensajeError['errorTitulo'] = validacionFormularios::comprobarAlfabetico($_POST['titulo'],20,1,1);
    $mensajeError['errorEmpresa'] = validacionFormularios::comprobarAlfabetico($_POST['empresa'],20,1,1);
    $mensajeError['errorDescripcion']= validacionFormularios::comprobarAlfabetico($_POST['descripcion'], 500, 1, 1); //comprobamos el campo fecha
    $mensajeError['errorRequisitos'] = validacionFormularios::comprobarAlfabetico($_POST['requisitos'],200,1,1);
    $mensajeError['errorExperiencia'] = validacionFormularios::comprobarEntero($_POST['experiencia'],1);
    $mensajeError['errorVacantes'] = validacionFormularios::comprobarEntero($_POST['vacantes'],1);
    $mensajeError['errorCategoria'] = validacionFormularios::comprobarAlfaNumerico($_POST['categoria'],50,0,1);
    $mensajeError['errorProvincia'] = validacionFormularios::comprobarAlfaNumerico($_POST['provincia'],50,0,1);
    foreach ($mensajeError as &$valor){
        if ($valor!=null){
            $entradaOk=false;
        }
    }

    if($mensajeError['errorCategoria']==null){
        switch ($_POST['categoria']){
            case 1;
                $categoria = "Administracion de empresas ";
            break;
            case 2;
                $categoria = "Administracion publica";
                break;
            case 3;
                $categoria = "Atencion a clientes";
                break;
            case 4;
                $categoria = "Calidad, produccion e I+D";
                break;
            case 5;
                $categoria = "Comercial y ventas";
                break;
            case 6;
                $categoria = "Compras logistica y almacen";
                break;
            case 7;
                $categoria = "Diseño y artes graficas";
                break;
            case 8;
                $categoria = "Educacion y formacion";
                break;
            case 9;
                $categoria = "Finanzas y banca";
                break;
            case 10;
                $categoria = "Informatica y telecomunicaciones";
                break;
            case 11;
                $categoria = "Ingenieros y tecnicos";
                break;
            case 12;
                $categoria = "Inmobiliario y construcción";
                break;
            case 13;
                $categoria = "Legal";
                break;
            case 14;
                $categoria = "Marketing y comunicacion";
                break;
            case 15;
                $categoria = "Profesiones, artes y oficios";
                break;
            case 16;
                $categoria = "Recursos humanos";
                break;
            case 17;
                $categoria = "Sanidad y salud";
                break;
            case 18;
                $categoria = "Sector farmaceutico";
                break;
            case 19;
                $categoria = "Turismo y restauracion";
                break;
            case 20;
                $categoria = "Ventas al detalle";
                break;
            case 21;
                $categoria = "Otros";
                break;
        }
    }
}

if (isset($_POST['publicar'])){  //si se ha pulsado enviar y no ha habido errores
    /*if(Oferta::publicarOferta($_POST['titulo'],$_POST['empresa'],$_POST['descripcion'],$_POST['requisitos'],$_POST['experiencia'],$_POST['categoria'],$_SESSION['usuario']->getCodUsuario())){
        header('Location: index.php?pagina=inicio');
    }else{ //si no se ha podido editar
        $mensajeError['errorPublicar'] = "Error al publicar la oferta";  //mostramos el error*/
    echo $_POST['titulo'],$_POST['empresa'],$_POST['descripcion'],$_POST['requisitos'],$_POST['experiencia'],$_POST['vacantes'],$categoria,$_SESSION['usuario']->getCodUsuario();
        $_GET["pagina"]="publicar";
        include_once 'view/layout.php';
    //}
}else{
    $_GET["pagina"]="publicar";
    include_once 'view/layout.php';
}
?>