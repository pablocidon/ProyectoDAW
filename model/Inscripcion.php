<?php
/**
 * File Inscripcion.php.
 * @author Pablo Cidón.
 *
 * Fecha de última revisión: 07/11/2018.
 * Fichero que contiene las operaciones que realiza la clase inscripción.
 */
require_once 'InscripcionPDO.php';

/**
 * Class Inscripcion
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018
 */
class Inscripcion{
    //Definición de los atributos de la clase:
    /**
     * @var $usuario Usuario que ha realizado la inscripción
     */
    private $usuario;
    /**
     * @var $oferta Oferta en la que el usuario a realizado la inscripción.
     */
    private $oferta;
    /**
     * @var $curriculum Curriculum con el que el usuario a realizado la inscripción en la oferta.
     */
    private $curriculum;

    /**
     * @function getUsuario().
     * Función para obtener el usuario que ha realizado la inscripción.
     *
     * @return string $usuario Usuario que ha realizado la inscripción.
     */
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * @function getCodOferta().
     * Función para obtener el código de la oferta en la que se ha realizado la inscripción.
     *
     * @return int $oferta Identificador de la oferta en la que se ha inscrito.
     */
    public function getOferta(){
        return $this->oferta;
    }

    /**
     * @function getCurriculum().
     * Función para obtener el curriculum que el usuario ha usado a la hora de inscribirse.
     *
     * @return int $curriculum Identificador del curriculum utilizado en la inscripción.
     */
    public function getCurriculum(){
        return $this->curriculum;
    }

    /**
     * @function setUsuario($usuario)
     * Función para cambiar el usuario de la inscripción.
     *
     * @param string $usuario Nuevo usuario de la inscripción.
     */
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    /**
     * @function setOferta($oferta).
     * Función para cambiar la oferta en la que se ha realizado la inscripción.
     *
     * @param int $oferta Nuevo código de la oferta en la inscripción.
     */
    public function setOferta($oferta){
        $this->oferta = $oferta;
    }

    /**
     * @function setCurriculum($curriculum).
     * Función para cambiar el curriculum con el que se ha realizado la inscripción.
     *
     * @param int $curriculum Nuevo identificador del curriculum usado en la inscripción.
     */
    public function setCurriculum($curriculum){
        $this->curriculum = $curriculum;
    }

    /**
     * Inscripcion constructor.
     * Función constructor del objeto inscripción.
     *
     * @param string $usuario Usuario que ha realizado la inscripción.
     * @param int $oferta Identificador de la oferta en la que se ha realizado la misma.
     * @param int $curriculum Identificador del curriculum usado en la misma.
     */
    public function __construct($usuario,$oferta,$curriculum){
        $this->usuario = $usuario;
        $this->oferta = $oferta;
        $this->curriculum = $curriculum;
    }

    /**
     * @function listarMisInscripciones($codUsuario).
     * Función para listar las ofertas en las que se ha inscrito el usuario.
     *
     * @param string $codUsuario Usuario del que se va a realizar el lisatado de ofertas.
     * @return array Devuelve un array con el total de inscripciones que ha realizado el usuario.
     */
    public static function listarMisInscripciones($codUsuario){
        $arrayInscripciones = [];
        $inscripcion = InscripcionPDO::listarMisInscripciones($codUsuario);
        if($inscripcion){
            for($i=0;$i<count($inscripcion);$i++){
                $arrayInscripciones[$i] = new Inscripcion($inscripcion[$i]['usuario'],$inscripcion[$i]['oferta'],$inscripcion[$i]['curriculum']);
            }
        }
        return $arrayInscripciones;
    }

    /**
     * @function listarInscripcionesPorOferta($codOferta).
     * Función para ver que inscripciones se han realizado en una determinada oferta.
     *
     * @param int $codOferta Identificador de la oferta en la que se va a listar las inscripciones.
     * @return array Devuelve un array con las inscripciones realizadas en una determinada oferta.
     */
    public static function listarInscripcionesPorOferta($codOferta){
        $arrayInscripciones = [];
        $inscripcion = InscripcionPDO::listarInscripcionesPorOferta($codOferta);
        if($inscripcion){
            for($i=0;$i<count($inscripcion);$i++){
                $arrayInscripciones[$i] = new Inscripcion($inscripcion[$i]['usuario'],$inscripcion[$i]['oferta'],$inscripcion[$i]['curriculum']);
            }
        }
        return $arrayInscripciones;
    }

    /**
     * @function realizarInscripcion($codUsuario,$codOferta,$codCurriculum).
     * Función para registrar las inscripciones que realizan los usuarios.
     *
     * @param string $codUsuario Usuario que ha realizado la inscripción.
     * @param int $codOferta Oferta en la que se ha realizado la inscripción.
     * @param int $codCurriculum Curriculum utilizado a la hora de inscribirse.
     * @return Inscripcion|null Devuelve un objeto 'Inscripción' en caso de realizarse, de lo contrario devovlerá 'null'.
     */
    public static function realizarInscripcion($codUsuario,$codOferta,$codCurriculum){
        $inscripcion = null;
        if(InscripcionPDO::realizarInscripcion($codUsuario,$codOferta,$codCurriculum)){
            $inscripcion = new Inscripcion($codUsuario,$codOferta,$codCurriculum);
        }
        return $inscripcion;

    }

    /*public static function eliminarInscripcion($codOferta,$codUsuario){
        $eliminado = false;
        if(InscripcionPDO::eliminarInscripcion($codOferta,$codUsuario)){
            $eliminado = true;
        }
        return $eliminado;
    }*/
}