<?php
/**
 * File InscripciónPDO.php
 * @author Pablo Cidón.
 *
 * Fecha de última revisión: 07/11/2018
 *
 */
require_once 'DBPDO.php';

/**
 * Class InscripcionPDO
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018
 *
 * Fichero que contiene las funciones que operan en la BD con el objeto inscripción.
 */

class InscripcionPDO{
    /**
     * @function listarMisInscripciones($codUsuario).
     * Función para listar las inscripciones que ha realizado el usuario.
     *
     * @param string $codUsuario Usuario del que se van a buscar las inscripciones.
     * @return array Devuelve un array con los registros que se hayan obtenido.
     */
    public static function listarMisInscripciones($codUsuario){
        $consulta= "SELECT inscripciones.CodUsuario, ofertas.Titulo, curriculums.Path FROM ((inscripciones INNER JOIN ofertas ON inscripciones.CodOferta = ofertas.CodOferta) INNER JOIN curriculums ON inscripciones.CodCurriculum = curriculums.CodCurriculum) WHERE inscripciones.CodUsuario = ?";
        $arrayInscripciones = [];
        $contador = 0;
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario]);
        if ($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchObject()){
                $arrayInscripciones['usuario'] = $resFetch->CodUsuario;
                $arrayInscripciones['oferta'] = $resFetch->Titulo;
                $arrayInscripciones['curriculum'] = $resFetch->Path;
                $inscripcion[$contador]=$arrayInscripciones;
                $contador++;

            }
        }
        return $inscripcion;
    }

    /**
     * @function listarInscripcionesPorOferta($codOferta).
     * Función para listar todas las inscripciones que se hayan realizado en una determinada oferta.
     *
     * @param int $codOferta Identificador de la oferta sobre la que se están extrayendo los datos.
     * @return array Devuelve un array con cada uno de los registros encontrados.
     */
    public static function listarInscripcionesPorOferta($codOferta){
        $consulta= "SELECT Usuarios.Nombre, Usuarios.Apellidos, Curriculums.Path FROM ((Usuarios INNER JOIN Inscripciones on Usuarios.CodUsuario = Inscripciones.CodUsuario) INNER JOIN Curriculums ON Curriculums.CodCurriculum = Inscripciones.CodCurriculum) WHERE Inscripciones.CodOferta = '".$codOferta."'";
        $arrayInscripciones = [];
        $contador = 0;
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codOferta]);
        if ($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchObject()){
                $arrayInscripciones['usuario'] = $resFetch->Nombre.' '.$resFetch->Apellidos;
                $arrayInscripciones['oferta'] = null;
                $arrayInscripciones['curriculum'] = $resFetch->Path;
                $inscripcion[$contador]=$arrayInscripciones;
                $contador++;
            }
        }
        return $inscripcion;
    }

    /**
     * @function realizarInscripción($codUsuario,$codOferta,$codCurriculum).
     * Función para registrar cada una de las inscripciones realizadas a cabo.
     *
     * @param string $codUsuario Usuario que ha realizado la inscripción.
     * @param int $codOferta Identificador de la oferta en la que se ha realizado la inscripción.
     * @param int $codCurriculum Curriculum utilizado para realizar la inscripción.
     * @return bool Devuelve 'true' o 1 si el registro es creado. De lo contrario devolverá 'false' o 0.
     */
    public static function realizarInscripcion($codUsuario,$codOferta,$codCurriculum){
        $inscrito = false;
        $consulta = "INSERT INTO Inscripciones VALUES (?,?,?)";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codUsuario,$codOferta,$codCurriculum]);
        if($resConsulta->rowCount()==1){
            $inscrito = true;
        }
        return $inscrito;
    }

    /*public static function eliminarInscripcion($codOferta,$codUsuario){
        $eliminado = false;
        $consulta = "DELETE FROM Inscripciones WHERE CodOferta='".$codOferta."' AND CodUsuario = '".$codUsuario."'";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codOferta,$codUsuario]);
        if($resConsulta->rowCount()==1){
            $eliminado = true;
        }
        return $eliminado;
    }*/
}