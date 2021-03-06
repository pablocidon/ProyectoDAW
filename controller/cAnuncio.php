<?php
/**
 * Controlador de los anuncios.
 *
 * Fichero que contiene el controlador de la página de los anuncios.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Anuncio.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
if (!isset($_SESSION['usuario'])) { //Comprobamos si no existe la sesion
    header("Location: index.php"); //Si no nos manda a la página del login.
} else{
    $entradaOk = true;
    $categoria = '';
    $oferta = Oferta::consultarOferta($_GET['codOferta']);//Cargaremos el objeto oferta.
    $inscrito = Inscripcion::comprobarYaInscrito($_GET['codOferta'],$_SESSION['usuario']->getCodUsuario());
    if($oferta){
        $_SESSION['oferta'] = $oferta; //En el caso de que haya oferta, la guardaremos en la sesión.
    }
    if(isset($_POST['cancelar'])){
        header("Location: index.php");//En el caso de pulsar cancelar volveremos a la página de inicio.
    }
    if (isset($_POST['inscribir'])){
        header("Location: index.php?pagina=inscribir");//En el caso de pulsar en inscribir, nos iremos al formulario de inscripción.
    }
    if (isset($_POST['modificar'])){
        /**
         * En el caso de pulsemos en modificar, realizaremos la validación de los campos.
         * Para ello llamaremos a las funciones de validación pasando como valor el contenido de los diferentes campos
         * y como parámetros la longitud máxima, la mínima o si es obligatorio indicándolo con 0 en el caso de que no lo sea, o con 1 si lo es.
         */
        $mensajeError['errorTitulo'] = validacionFormularios::comprobarAlfabetico($_POST['titulo'],20,1,1);
        $mensajeError['errorEmpresa'] = validacionFormularios::comprobarAlfaNumerico($_POST['empresa'],20,1,1);
        $mensajeError['errorDescripcion']= validacionFormularios::comprobarAlfaNumerico($_POST['descripcion'], 500, 1, 1); //comprobamos el campo fecha
        $mensajeError['errorRequisitos'] = validacionFormularios::comprobarAlfaNumerico($_POST['requisitos'],200,1,1);
        $mensajeError['errorExperiencia'] = validacionFormularios::comprobarEntero($_POST['experiencia'],1);
        $mensajeError['errorVacantes'] = validacionFormularios::comprobarEntero($_POST['vacantes'],1);
        $mensajeError['errorCategoria'] = validacionFormularios::comprobarAlfaNumerico($_POST['categoria'],50,0,1);
        $mensajeError['errorProvincia'] = validacionFormularios::comprobarAlfaNumerico($_POST['provincia'],50,0,1);
        /**
         * Comprobamos si se ha cargado algún mensaje de error.
         * En el caso de hacerlo, estableceremos la variable de entrada en falso debido a que hay errores.
         */
        foreach ($mensajeError as &$valor){
            if ($valor!=null){
                $entradaOk=false;
            }
        }
        /**
         * En el caso de que no haya error en la categoría seleccionada, asignaremos un valor a la variable $categoria,
         * dependiendo del valor que haya recibido en el $_POST['categoria'].
         */
        if($mensajeError['errorCategoria']==null) {
            switch ($_POST['categoria']) {
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
        if($entradaOk) {//En el caso de que no se hayan producido errores y la variable de entrada sea verdadera, modificaremos los datos del objeto
           if(Oferta::editarOferta($_POST['titulo'], $_POST['empresa'], $_POST['descripcion'], $_POST['requisitos'], $_POST['experiencia'], $_POST['vacantes'], $categoria, $_POST['provincia'], $_GET['codOferta'])) {
               if ($_SESSION['usuario']->getPerfil() == "Administrador") {
                   header('Location: index.php?pagina=ofertas');
               } else {
                   header('Location: index.php');
               }
           }
        }
        $_GET['pagina']='anuncio';
        require_once('view/layout.php');
    }
    if(isset($_POST['eliminar'])){
        /**
         * En el caso de pulsar sobre eliminar, ejecutaremos la función de eliminarOferta,
         * pasando como parámetros el identificador de la oferta y el identificador del usuario, para que ningún usuario no
         * pueda eliminar ninguna oferta que no sea suya.
         */
        if($_SESSION['usuario']->getPerfil()=="Administrador"){
            Oferta::eliminarOferta($_GET['codOferta'],$_SESSION['oferta']->getCodEmpresa());
            header('Location: index.php?pagina=ofertas');
        }else{
            Oferta::eliminarOferta($_GET['codOferta'],$_SESSION['usuario']->getCodUsuario());
            header('Location: index.php');
        }
    }
    $_GET['pagina']='anuncio';
    require_once('view/layout.php');
}
?>