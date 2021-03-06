<?php
/**
 * Controlador de los curriculums.
 *
 * Fichero que contiene el controlador de la página de los curriculums de un usuario.
 *
 * PHP Version 7.0
 *
 * @author Pablo Cidón.
 * @category Curriculums.
 * @package Controlador.
 * @copyright 09 de noviembre de 2018
 */
if (isset($_POST['cancelar'])){//En el caso de pulsar en cancelar volveremos a la página de inicio.
    header('Location: index.php');
}
$mensajeEliminado = '';
if($_SESSION['usuario']->getPerfil()!="Administrador"){
    $curriculums = Curriculum::listarMisCurriculums($_SESSION['usuario']->getCodUsuario());//Cargaremos un array con cada uno de los curriculums que pertenezcan a un usuario.
}else{
    $curriculums = Curriculum::listarMisCurriculums('%');//Realizamos el listado de las inscripciones por el usuario
}
if (isset($_POST['añadir'])){
    /**
     * En el caso de pulsar sobre añadir, indicaremos cual va a ser el directorio en el que se van a almacenar los ficheros.
     */
$directorio = $_SESSION['usuario']->getCodUsuario().'/';//Directorio en el que se guardarán los archivos
$fichero = $directorio . basename($_FILES['fichero']['name']);//Ruta en la que se va a guardar el archivo. En este caso será lo que almacenemos en nuestra base de datos.
if(move_uploaded_file($_FILES['fichero']['tmp_name'],$fichero))//Comprobamos que el archivo se ha subido al directorio señalado:
{
    echo "<script> alert('El archivo ". basename( $_FILES['fichero']['name'])."ha sido subido exitosamente!'</script>";//En el caso de que la subida se produzca con éxito, mostraremos un mensaje en consola.
    Curriculum::añadirCurriculum($fichero,$_SESSION['usuario']->getCodUsuario()); //De ser subido el archivo, guardaremos la ruta del mismo en nuestra base de datos.
}else{
    $errorSubida = "Se ha producido un error. Código error ".$_FILES['fichero']['error'];
}
}
if (isset($_POST['eliminar'])){
    /**
     * En el caso de que pulsemos en eliminar ejecutaremos la consulta de eliminar, y en el caso de que el
     * objeto sea eliminado de la base de datos también lo eliminaremos del directorio.
     */
    if($_SESSION['usuario']->getPerfil()!="Administrador"){
        if(Curriculum::borrarCurriculum($_POST['curriculum'],$_SESSION['usuario']->getCodUsuario())){
            unlink($_POST['path']);
            $mensajeEliminado = "El curriculum se ha eliminado con éxito.";
        }else{
            $mensajeEliminado = "Error al eliminar el curriculum";
        }
    }else{
        if(Curriculum::borrarCurriculum($_POST['curriculum'],$_POST['usuario'])){
            unlink($_POST['path']);
            $mensajeEliminado = "El curriculum se ha eliminado con éxito.";
        }else{
            $mensajeEliminado = "Error al eliminar el curriculum";
        }
    }
    if($_SESSION['usuario']->getPerfil()!="Administrador"){
        $curriculums = Curriculum::listarMisCurriculums($_SESSION['usuario']->getCodUsuario());//Cargaremos un array con cada uno de los curriculums que pertenezcan a un usuario.
    }else{
        $curriculums = Curriculum::listarMisCurriculums('%');//Realizamos el listado de las inscripciones por el usuario
    }
    $_GET['pagina']='curriculums';
    require_once('view/layout.php');
}
    //Cargamos la vista y controlador de esta página
    if($_SESSION['usuario']->getPerfil()!="Administrador"){
        $curriculums = Curriculum::listarMisCurriculums($_SESSION['usuario']->getCodUsuario());//Cargaremos un array con cada uno de los curriculums que pertenezcan a un usuario.
    }else{
        $curriculums = Curriculum::listarMisCurriculums('%');//Realizamos el listado de las inscripciones por el usuario
    }
    $_GET['pagina']='curriculums';
    require_once('view/layout.php');
?>
<script> console.log(<?php echo $directorio, $fichero;?>);</script>
