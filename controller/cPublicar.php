<?php
/**
 * Controlador de la página de publicar ofertas.
 *
 * Fichero que contiene el controlador de la página de publicar
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Publicar.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
if(isset($_POST['cancelar'])){
    header("Location: index.php?pagina=inicio");//En el caso de pulsar en cancelar, volveremos a la página de inicio.
}
$categoria = '';
/**
 * En el caso de pulsar en publicar, realizaremos la validación de los campos,
 * pasando como parámetros la cadena, la longitud máxima y mínima y si es o no obligatorio.
 */
if (isset($_POST['publicar'])){  //Si se ha pulsado enviar cargamos los errores
    $mensajeError['errorTitulo'] = validacionFormularios::comprobarAlfabetico($_POST['titulo'],30,1,1);
    $mensajeError['errorEmpresa'] = validacionFormularios::comprobarAlfaNumerico($_POST['empresa'],20,1,1);
    $mensajeError['errorDescripcion']= validacionFormularios::comprobarAlfaNumerico($_POST['descripcion'], 500, 1, 1); //comprobamos el campo fecha
    $mensajeError['errorRequisitos'] = validacionFormularios::comprobarAlfaNumerico($_POST['requisitos'],200,1,1);
    $mensajeError['errorExperiencia'] = validacionFormularios::comprobarEntero($_POST['experiencia'],1);
    $mensajeError['errorVacantes'] = validacionFormularios::comprobarEntero($_POST['vacantes'],1);
    $mensajeError['errorCategoria'] = validacionFormularios::comprobarAlfaNumerico($_POST['categoria'],50,0,1);
    $mensajeError['errorProvincia'] = validacionFormularios::comprobarAlfaNumerico($_POST['provincia'],50,0,1);
    foreach ($mensajeError as &$valor){
        if ($valor!=null){
            $entradaOk=false;//En caso de que haya errores, estableceremos el valor de falso a la variable de entrada.
        }
    }
    /**
     * Si no hay errores en la categoría, asignaremos el valor a una cadena, dependiendo del valor seleccionado.
     */
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

if (isset($_POST['publicar'])){
    /**
     * Si hemos pulsado en publicar, y no hay errores, crearemos el registro de en la base de datos y nos enviará a la página de inicio,
     * de lo contrario, mostraremos un mensaje de error y seguiremos en la misma página.
     */
    if(Oferta::publicarOferta($_POST['titulo'],$_POST['empresa'],$_POST['descripcion'],$_POST['requisitos'],$_POST['experiencia'],$_POST['vacantes'],$categoria,$_POST['provincia'],$_SESSION['usuario']->getCodUsuario())){
        if($_SESSION['usuario']->getPerfil()=="Administrador"){
            header('Location: index.php?pagina=ofertas');
        }else {
            header('Location: index.php?pagina=inicio');
        }
    }else{ //si no se ha podido editar
        $mensajeError['errorPublicar'] = "Error al publicar la oferta";
        $_GET["pagina"]="publicar";
        include_once 'view/layout.php';
    }
}else{
    $_GET["pagina"]="publicar";
    include_once 'view/layout.php';
}
?>