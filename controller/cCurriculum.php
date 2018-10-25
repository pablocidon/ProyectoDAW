<?php
if (isset($_POST['cancelar'])){//En el caso de pulsar en cancelar volveremos a la página de inicio.
    header('Location: index.php');
}
if (isset($_POST['añadir'])){
$directorio = $_SESSION['usuario']->getCodUsuario()."/";//Directorio en el que se guardarán los archivos
$fichero = $directorio . basename($_FILES['fichero']['name']);//Ruta en la que se va a guardar el archivo. En este caso será lo que almacenemos en nuestra base de datos.
if(move_uploaded_file($_FILES['fichero']['name'],$directorio))//Comprobamos que el archivo se ha subido al directorio señalado:
{
    echo "<script>console.log('El archivo ". basename( $_FILES['fichero']['name'])."ha sido subido exitosamente!)</script>";//En el caso de que la subida se produzca con éxito, mostraremos un mensaje en consola.
    //Curriculum::añadirCurriculum($fichero,$_SESSION['usuario']->getCodUsuario()); De ser subido el archivo, guardaremos la ruta del mismo en nuestra base de datos.
}
else
{
    echo "<script>console.log('Hubo un error al subir tu archivo! Por favor intenta de nuevo.')</script>";//De lo contrario mostraremos un mensaje error
    echo "<script>console.log(".$_FILES['fichero']['error'].")</script>";//También mostraremos el código del error, para saber por qué se ha producido.
}

}
    $curriculums = Curriculum::listarMisCurriculums($_SESSION['usuario']->getCodUsuario());

    //Cargamos la vista y controlador de esta página
    $_GET['pagina']='curriculums';
    require_once('view/layout.php');
?>
<script> console.log(<?php echo $directorio, $fichero;?>);</script>
