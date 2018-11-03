<?php
if (isset($_POST['cancelar'])){//En el caso de pulsar en cancelar volveremos a la página de inicio.
    header('Location: index.php');
}
if (isset($_POST['añadir'])){
$directorio = "pablo/";//Directorio en el que se guardarán los archivos
$fichero = $directorio . basename($_FILES['fichero']['name']);//Ruta en la que se va a guardar el archivo. En este caso será lo que almacenemos en nuestra base de datos.
if(move_uploaded_file($_FILES['fichero']['tmp_name'],$fichero))//Comprobamos que el archivo se ha subido al directorio señalado:
{
    echo "El archivo ". basename( $_FILES['fichero']['name'])."ha sido subido exitosamente!";//En el caso de que la subida se produzca con éxito, mostraremos un mensaje en consola.
    Curriculum::añadirCurriculum($fichero,$_SESSION['usuario']->getCodUsuario()); //De ser subido el archivo, guardaremos la ruta del mismo en nuestra base de datos.
}else{
    $errorSubida = "Se ha producido un error. Código error ".$_FILES['fichero']['error'];
}
}
    $curriculums = Curriculum::listarMisCurriculums($_SESSION['usuario']->getCodUsuario());

    //Cargamos la vista y controlador de esta página
    $_GET['pagina']='curriculums';
    require_once('view/layout.php');
?>
<script> console.log(<?php echo $directorio, $fichero;?>);</script>
