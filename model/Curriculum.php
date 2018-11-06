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
        $curriculum = null;
        if(CurriculumPDO::añadirCurriculum($path,$codUsuario)){
            $curriculum = new Curriculum(@ $codCurriculum,$path,$codUsuario);
        }
        return $curriculum;
    }

    public function borrarCurriculum($codCurriculum,$codUsuario){
        $eliminado = false;
        if(CurriculumPDO::borrarCurriculum($codCurriculum,$codUsuario)){
            $eliminado = true;
        }
        return $eliminado;
    }

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
}