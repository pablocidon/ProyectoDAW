<?php
/**
 * Autor by Pablo Cidón.
 * Fecha de última revisión: 02/10/2018
 *
 */
require_once 'CurriculumPDO.php';
class Curriculum{
    private $codCurriculum;
    private $path;
    private $codUsuario;

    /**
     * @return mixed
     */
    public function getCodCurriculum(){
        return $this->codCurriculum;
    }

    /**
     * @return mixed
     */
    public function getPath(){
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getCodUsuario(){
        return $this->codUsuario;
    }

    /**
     * @param mixed $codCurriculum
     */
    public function setCodCurriculum($codCurriculum){
        $this->codCurriculum = $codCurriculum;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path){
        $this->path = $path;
    }

    /**
     * @param mixed $codUsuario
     */
    public function setCodUsuario($codUsuario){
        $this->codUsuario = $codUsuario;
    }

    public function __construct($codCurriculum,$path,$codUsuario){
        $this->codCurriculum = $codCurriculum;
        $this->path = $path;
        $this->codUsuario = $codUsuario;
    }

    public function añadirCurriculum($path,$codUsuario){

    }

    public function borrarCurriculum($codCurriculum,$codUsuario){

    }

    public function listarMisCurriculums($codUsuario){

    }
}