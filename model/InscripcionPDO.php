<?php
/**
 * Autor by Pablo Cidón.
 * Fecha de última revisión: 03/10/2018
 *
 */
require_once 'DBPDO.php';

class InscripcionPDO{
    public static function listarMisInscripciones($codUsuario){
        $consulta= "SELECT inscripciones.CodUsuario, ofertas.Titulo, curriculums.Path FROM ((inscripciones INNER JOIN ofertas ON inscripciones.CodOferta = ofertas.CodOferta) INNER JOIN curriculums ON inscripciones.CodCurriculum = curriculums.CodCurriculum) WHERE inscripciones.CodUsuario = ?";
        //SELECT * from Ofertas INNER JOIN Inscripciones ON Ofertas.CodOferta = Inscripciones.CodOferta AND Inscripciones.CodUsuario = '".$codUsuario."'
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
    public static function realizarInscripcion($codUsuario,$codOferta,$codCurriculum){
        $inscrito = false;
        $consulta = "INSERT INTO Inscripciones VALUES (?,?,?)";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codUsuario,$codOferta,$codCurriculum]);
        if($resConsulta->rowCount()==1){
            $inscrito = true;
        }
        return $inscrito;
    }

    public static function eliminarInscripcion($codOferta,$codUsuario){
        $eliminado = false;
        $consulta = "DELETE FROM Inscripciones WHERE CodOferta='".$codOferta."' AND CodUsuario = '".$codUsuario."'";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codOferta,$codUsuario]);
        if($resConsulta->rowCount()==1){
            $eliminado = true;
        }
        return $eliminado;
    }
}