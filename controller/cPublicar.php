<?php
if(isset($_POST['cancelar'])){
    header("Location: index.php?pagina=inicio");
}
if (isset($_POST['publicar'])){  //Si se ha pulsado enviar cargamos los errores
    /*$mensajeError['errorTitulo'] = validacionFormularios::comprobarAlfabetico($_POST['titulo'],20,1,1);
    $mensajeError['errorEmpresa'] = validacionFormularios::comprobarAlfabetico($_POST['empresa'],20,1,1);
    $mensajeError['errorDescripcion']= validacionFormularios::comprobarAlfabetico($_POST['descripcion'], 500, 1, 1); //comprobamos el campo fecha
    $mensajeError['errorRequisitos'] = validacionFormularios::comprobarAlfabetico($_POST['requisitos'],200,1,1);
    $mensajeError['errorExperiencia'] = validacionFormularios::comprobarEntero($_POST['experiencia'],1);
    $mensajeError['errorVacantes'] = validacionFormularios::comprobarEntero($_POST['puestos'],1);
    $mensajeError['errorCategoria'] = validacionFormularios::comprobarAlfabetico($_POST['categoria'],50,0,1);

    foreach ($mensajeError as &$valor){
        if ($valor!=null){
            $entradaOk=false;
        }
    }*/
}

if (isset($_POST['publicar'])){  //si se ha pulsado enviar y no ha habido errores
    /*if(Oferta::publicarOferta($_POST['titulo'],$_POST['empresa'],$_POST['descripcion'],$_POST['requisitos'],$_POST['experiencia'],$_POST['categoria'],$_SESSION['usuario']->getCodUsuario())){
        header('Location: index.php?pagina=inicio');
    }else{ //si no se ha podido editar
        $mensajeError['errorPublicar'] = "Error al publicar la oferta";  //mostramos el error*/
    echo $_POST['titulo'],$_POST['empresa'],$_POST['descripcion'],$_POST['requisitos'],$_POST['experiencia'],$_POST['categoria'],$_SESSION['usuario']->getCodUsuario();
        $_GET["pagina"]="publicar";
        include_once 'view/layout.php';
    //}
}else{
    $_GET["pagina"]="publicar";
    include_once 'view/layout.php';
}
?>