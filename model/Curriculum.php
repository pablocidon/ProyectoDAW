<?php
/**
 * Operaciones sobre el objeto Curriculum.
 *
 * Fichero que crea los objetos de tipo curriculum y utiliza sus métodos.
 *
 * PHP Version 7.0
 *
 * @category Curriculum
 * @package Modelo
 */
require_once 'CurriculumPDO.php';

/**
 * Class Curriculum
 *
 * Operaciones sobre el objeto Curriculum.
 *
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018
 */
class Curriculum{
    //Definición de los atributos del objeto
    /**
     * Identificador del objeto curriculum.
     *
     * El valor es un entero mayor de 0.
     *
     * @var int
     */
    private $codCurriculum;
    /**
     * Ruta en la que se encuentra el fichero.
     *
     * El valor es una cadena.
     *
     * @var string
     */
    private $path;
    /**
     * Identificador del usuario al que pertenece.
     *
     * El valor es una cadena correspondiente a un usuario.
     *
     * @var string
     */
    private $codUsuario;

    /**
     * Obtener el identificador del curriculum.
     *
     * Función para obtener el identificador del curriculum.
     *
     * @return int Con el identificador del objeto Curriculum.
     */
    public function getCodCurriculum(){
        return $this->codCurriculum;
    }

    /**
     * Obtener la ruta en la que se encuentra el fichero.
     *
     * Función para obtener el path de un curriculum.
     *
     * @return string Con la ruta en la que se encuentra el curriculum.
     */
    public function getPath(){
        return $this->path;
    }

    /**
     * Obtener el identificador del usuario.
     *
     * Función para obtener el código del usuario al que pertenece dicho objeto.
     *
     * @return string  Con el código del usuario al que pertenece.
     */
    public function getCodUsuario(){
        return $this->codUsuario;
    }

    /**
     * Cambiar el identificador del curriculum.
     *
     * Función para modificar el identificador del curriculum.
     *
     * @param $codCurriculum Nuevo valor del campo.
     */
    public function setCodCurriculum($codCurriculum){
        $this->codCurriculum = $codCurriculum;
    }

    /**
     * Cambiar la ruta del fichero.
     *
     * Función modificar el path de un curriculum.
     *
     * @param $path Nueva ruta que va a tener el objeto.
     */
    public function setPath($path){
        $this->path = $path;
    }

    /**
     * Cambiar el identificador del usuario.
     *
     * Función para cambiar el usuario al que pertenece dicho elemento.
     *
     * @param $codUsuario Nuevo usuario al que va a pertenecer el elemento.
     */
    public function setCodUsuario($codUsuario){
        $this->codUsuario = $codUsuario;
    }

    /**
     * Curriculum constructor.
     * Función constructor del objeto curriculum.
     *
     * @param int $codCurriculum Identificador del curriculum
     * @param string $path Ruta en la que se va a encontrar almacenado.
     * @param string $codUsuario Usuario al que va a pertencer el elemento.
     */
    public function __construct($codCurriculum,$path,$codUsuario){
        $this->codCurriculum = $codCurriculum;
        $this->path = $path;
        $this->codUsuario = $codUsuario;
    }

    /**
     * añadirCurriculum($path,$codUsuario).
     * Función para crear el registro del curriculum añadido.
     *
     * @param string $path Ruta en la que se ha guardado el objeto.
     * @param string $codUsuario Usuario al que pertenece el elemento.
     * @return Curriculum|null Si se ha registrado, nos devolverá el objeto, de lo contrario devolverá 'null'.
     */
    public function añadirCurriculum($path,$codUsuario){
        $curriculum = null;
        if(CurriculumPDO::añadirCurriculum($path,$codUsuario)){
            $curriculum = new Curriculum(@ $codCurriculum,$path,$codUsuario);
        }
        return $curriculum;
    }

    /**
     * borrarCurriculum($codCurriculum, $codUsuario).
     * Función para eliminar el registro de nuestra BD.
     *
     * @param int $codCurriculum Código del curriculum que vamos a eliminar.
     * @param string $codUsuario Usuario al que pertenece.
     * @return bool Si el registro ha sido eliminado devolverá 'true' o 1, de lo contrario devolverá 'false' o 0.
     */
    public function borrarCurriculum($codCurriculum,$codUsuario){
        $eliminado = false;
        if(CurriculumPDO::borrarCurriculum($codCurriculum,$codUsuario)){
            $eliminado = true;
        }
        return $eliminado;
    }

    /**
     * listarMisCurriculum($codUsuario).
     * Función para listar los curriculums que tiene cada uno de los usuarios.
     *
     * @param string $codUsuario Usuario al que pertencen los curriculums que se van a listar.
     * @return array Con cada uno de los objetos que se hayan encontrado en nuestra BD.
     */
    public function listarMisCurriculums($codUsuario){
        $arrayCurriculums = [];
        $curriculum = CurriculumPDO::listarMisCurriculums($codUsuario);
        if($curriculum){
            for($i=0;$i<count($curriculum);$i++){
                $arrayCurriculums[$i] = new Curriculum($curriculum[$i]['codCurriculum'],$curriculum[$i]['path'],$curriculum[$i]['codUsuario']);

            }
        }
        return $arrayCurriculums;
    }

    /**
     * eliminarDirectorio($path).
     * Función para eliminar el directorio y todos los archivos que se encuentren dentro.
     *
     * @param string $path Directorio que se va a eliminar.
     */
    function eliminarDirectorio($path){
        $files = glob($path . '/*');//Busca cada uno de los elementos que se encuentran en un directorio, coincidiendo con el patrón y los añade a una matriz.
        foreach ($files as $file) {
            is_dir($file) ? eliminarDirectorio($file) : unlink($file);
        /*
         * Recorre el array comprobando si el contenido es un directorio o un archivo y los va eliminando.
         * En el caso de que haya un directorio entrará dentro del mismo para eliminar también aquellos archivos que coincidan con el patrón.
         */
        }
        rmdir($path);//Una vez eliminado todo lo que se encuentra dentro de los directorios procederá al borrado del directorio principal.
        return;
    }
    /*function removeDirectory($path) {
        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? removeDirectory($file) : unlink($file);
        }
        rmdir($path);
        return;
    }*/
}