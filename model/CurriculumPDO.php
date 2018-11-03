<?php
/**
 * Autor by Pablo Cidón.
 * Fecha de última revisión: 02/10/2018
 *
 */
require_once 'DBPDO.php';

class CurriculumPDO{
    public function añadirCurriculum($path,$codUsuario){
        $añadido = false;
        $consulta = "INSERT INTO Curriculums (Path, CodUsuario) VALUES(?,?)";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$path,$codUsuario]);
        if($resConsulta->rowCount()==1){
            $añadido = true;
        }
        return $añadido;
    }

    public function borrarCurriculum($codCurriculum,$codUsuario){
        $eliminado = false;
        $consulta = "DELETE FROM Curriculums where CodCurriculum = ? AND CodUsuario = ?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codCurriculum,$codUsuario]);
        if($resConsulta->rowCount()==1){
            $eliminado = true;
        }
        return $eliminado;
    }

    public function listarMisCurriculums($codUsuario){
        $consulta= "SELECT * from Curriculums where CodUsuario= ?";
        $arrayCurriculums = [];
        $contador = 0;
        $curriculum = [];
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario]);
        if ($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchObject()) {
                $arrayCurriculums['codCurriculum'] = $resFetch->CodCurriculum;
                $arrayCurriculums['path'] = $resFetch->Path;
                $arrayCurriculums['codUsuario'] = $resFetch->CodUsuario;
                $curriculum[$contador]=$arrayCurriculums;
                $contador++;
            }
        }
        return $curriculum;

    }
}