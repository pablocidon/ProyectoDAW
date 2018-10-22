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
        $consulta= "SELECT * from Curriculums where CodUsuario='".$codUsuario."'";
        $arrayCurriculums = [];
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario]);
        if ($resConsulta->rowCount()>=1){
            $resFetch = $resConsulta->fetchObject();

            $arrayCurriculums['CodCurriculum'] = $resFetch->CodCurriculum;
            $arrayCurriculums['Path'] = $resFetch->Path;
            $arrayCurriculums['CodUsuario'] = $resFetch->CodUsuario;
        }
        return $arrayCurriculums;

    }
}