<?php
/**
 * Operaciones sobre el objeto Inscripcion.
 *
 * Fichero que contiene las operaciones que realiza la clase inscripción.
 *
 * PHP Version 7.0
 *
 * @category Inscripcion.
 * @package Modelo.
 */
require_once 'InscripcionPDO.php';

/**
 * Class Inscripcion
 *
 * Operaciones sobre el objeto inscripcion.
 *
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018
 */
class Inscripcion{
    //Definición de los atributos de la clase:
    /**
     * Identificador del usuario.
     *
     * El valor es una cadena correspondiente al usuario que ha realizado la inscripción.
     *
     * @var string
     */
    private $usuario;
    /**
     * Identificador de la oferta.
     *
     * Valor entero correspondiente al identificador de la oferta en la que se ha realizado la inscripción.
     *
     * @var int
     */
    private $oferta;
    /**
     * Identificador del curriculum.
     *
     * Valor entero correspondien al curriculum seleccionado en la inscripción.
     *
     * @var int
     */
    private $curriculum;

    /**
     * Obtener el identificador del usuario.
     *
     * Función para obtener el usuario que ha realizado la inscripción.
     *
     * @return string con el usuario que ha realizado la inscripción.
     */
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * Obtener el identificador de la oferta.
     *
     * Función para obtener el código de la oferta en la que se ha realizado la inscripción.
     *
     * @return int Con el identificador de la oferta en la que se ha inscrito.
     */
    public function getOferta(){
        return $this->oferta;
    }

    /**
     * Obtener el identificador del curriculum.
     *
     * Función para obtener el curriculum que el usuario ha usado a la hora de inscribirse.
     *
     * @return int Con el identificador del curriculum utilizado en la inscripción.
     */
    public function getCurriculum(){
        return $this->curriculum;
    }

    /**
     * Modificar el usuario.
     *
     * Función para cambiar el usuario de la inscripción.
     *
     * @param $usuario Nuevo usuario de la inscripción.
     */
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    /**
     * Modificar la oferta.
     *
     * Función para cambiar la oferta en la que se ha realizado la inscripción.
     *
     * @param $oferta Nuevo código de la oferta en la inscripción.
     */
    public function setOferta($oferta){
        $this->oferta = $oferta;
    }

    /**
     * Cambiar el curriculum.
     *
     * Función para cambiar el curriculum con el que se ha realizado la inscripción.
     *
     * @param $curriculum Nuevo identificador del curriculum usado en la inscripción.
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
     * listarMisInscripciones($codUsuario).
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
     * listarInscripcionesPorOferta($codOferta).
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
     * realizarInscripcion($codUsuario,$codOferta,$codCurriculum).
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

    /**
     * eliminarInscripcion($codOferta,$codUsuario).
     * Función para que un usuario pueda eliminar su inscripción de una oferta.
     *
     * @param int $codOferta Identificador de la oferta en la que se va a eliminar la inscripción.
     * @param string $codUsuario Identificador del usuario que se ha inscrito y que va a eliminar su inscripción.
     * @return bool Devuelve 'true' o 1 en el caso de que sea eliminado y '0' o false en el caso de que no se elimine.
     */
    public static function eliminarInscripcion($codOferta,$codUsuario){
        $eliminado = false;
        if(InscripcionPDO::eliminarInscripcion($codOferta,$codUsuario)){
            $eliminado = true;
        }
        return $eliminado;
    }

    /**
     * comprobarYaInscrito($oferta,$usuario).
     * Función para comprobar que un usuario se ha inscrito en una determinada oferta.
     *
     * @param int $oferta Identificador de la oferta que se va a comprobar la inscripción.
     * @param string $usuario Identificador del usuario del que se va a comprobar la inscripción.
     * @return mixed Nos devolverá si existe o no el registro para poderse o no inscribir el usuario en la oferta.
     */
    public static function comprobarYaInscrito($oferta,$usuario){
        return InscripcionPDO::comprobarYaInscrito($oferta,$usuario);
    }
}