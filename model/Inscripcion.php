<?php
/**
 * Autor by Pablo Cidón.
 * Fecha de última revisión: 02/10/2018
 *
 */
require_once 'InscripcionPDO.php';
class Inscripcion{
    private $usuario;
    private $oferta;
    private $curriculum;

    /**
     * @return mixed
     */
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * @return mixed
     */
    public function getOferta(){
        return $this->oferta;
    }

    /**
     * @return mixed
     */
    public function getCurriculum(){
        return $this->curriculum;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta){
        $this->oferta = $oferta;
    }

    /**
     * @param mixed $curriculum
     */
    public function setCurriculum($curriculum){
        $this->curriculum = $curriculum;
    }

    public function __construct($usuario,$oferta,$curriculum){
        $this->usuario = $usuario;
        $this->oferta = $oferta;
        $this->curriculum = $curriculum;
    }

    public static function listarMisInscripciones($codUsuario){

    }

    public static function listarInscripcionesPorOferta($codOferta){

    }
}