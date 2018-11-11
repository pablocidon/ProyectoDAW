<?php
/**
 * Operaciones en la base de datos con el objeto.
 *
 * Fichero que contiene las funciones que realizan operaciones en la BD sobre el objeto curriculum.
 *
 * PHP Version 7.0
 *
 * @category Curriculum
 * @package Modelo
 */
require_once 'DBPDO.php';

/**
 * Class CurriculumPDO
 *
 * Operaciones en la base de datos sobre el objeto Curriculum.
 *
 * @author Pablo Cidón
 * @copyright 09 de noviembre de 2018
 */
class CurriculumPDO{
    /**
     * añadirCurriculum($path,$codUsuario).
     * Función para crear el registro del curriculum en la base de datos.
     *
     * @param string $path Ruta en la que se encuentra el fichero.
     * @param string $codUsuario Usuario al que pertenece el mismo.
     * @return bool Devuelve 'true' o 1 si el registro se crea, de lo contrario devolverá 0 o 'null'.
     */
    public function añadirCurriculum($path,$codUsuario){
        $añadido = false;
        $consulta = "INSERT INTO Curriculums (Path, CodUsuario) VALUES(?,?)";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$path,$codUsuario]);
        if($resConsulta->rowCount()==1){
            $añadido = true;
        }
        return $añadido;
    }

    /**
     * borrarCurriculum($codCurriculum,$codUsuario).
     * Función para eliminar el registro de la BD, validando que el usuario que lo elimina es el propietario del mismo.
     *
     * @param int $codCurriculum Identificador del curriculum que se va a eliminar.
     * @param string $codUsuario Usuario al que pertenece el curriculum y que por lo tanto lo va a poder eliminar.
     * @return bool Devuelve 'true' o 1 si el registro se ha eliminado y si no devolverá 0 o 'null'.
     */
    public function borrarCurriculum($codCurriculum,$codUsuario){
        $eliminado = false;
        $consulta = "DELETE FROM Curriculums where CodCurriculum = ? AND CodUsuario = ?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codCurriculum,$codUsuario]);
        if($resConsulta->rowCount()==1){
            $eliminado = true;
        }
        return $eliminado;
    }

    /**
     * listarMisCurriculums($codUsuario).
     * Función para listar todos los curriculums que pertenecen a un determinado usuario.
     *
     * @param string $codUsuario Usuario del que se va a realizar el listado de curriculums.
     * @return array Devolverá el total de elementos que han sido encontrados.
     */
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