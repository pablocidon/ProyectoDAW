<?php
/**
 * Autor by Pablo Cidón.
 * Fecha de última revisión: 02/10/2018
 *
 */
class InscripcionPDO{
    public static function listarMisInscripciones($codUsuario){
        $consulta= "SELECT * from Inscripciones where CodUsuario='".$codUsuario."'";
        $arrayInscripciones = [];
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario]);
        if ($resConsulta->rowCount()==1){
            $resFetch = $resConsulta->fetchObject();

            //$arrayInscripciones['usuario'] = $resFetch->CodUsuario;
            $arrayInscripciones['oferta'] = $resFetch->CodOferta;
            $arrayInscripciones['curriculum'] = $resFetch->CodCurriculum;
        }
        return $arrayInscripciones;
    }
    public static function listarInscripcionesPorOferta($codOferta){
        $consulta= "SELECT * from Inscripciones where CodOferta='".$codOferta."'";
        $arrayInscripciones = [];
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codOferta]);
        if ($resConsulta->rowCount()>1){
            $resFetch = $resConsulta->fetchObject();

            $arrayInscripciones['usuario'] = $resFetch->CodUsuario;
            //$arrayInscripciones['oferta'] = $resFetch->CodOferta;
            $arrayInscripciones['curriculum'] = $resFetch->CodCurriculum;
        }
        return $arrayInscripciones;
    }
}