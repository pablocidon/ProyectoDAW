<?php
/**
 * Autor by Pablo Cidón.
 * Fecha de última revisión: 02/10/2018
 *
 */
require_once 'DBPDO.php';

class OfertaPDO{
    public static function publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $consulta = "INSERT INTO Ofertas (Titulo,Empresa,Descripcion,Requisitos,Experiencia,Vacantes,Categoria,CodEmpresa) VALUES (?,?,?,?,?,?,?,?)";
        $registrado = false;
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa]);
        if($resConsulta->rowCount()==1){
            $registrado = true;
        }
        return $registrado;
    }
    public static function listarOfertas($categoria,$provincia,$clave){
        $consulta = "SELECT * FROM Ofertas WHERE Categoria LIKE concat('%',?,'%') AND Provincia LIKE concat('%',?,'%') AND Titulo LIKE concat('%',?,'%')";
        //"SELECT * FROM Ofertas WHERE Categoria IN ('".implode("','",$categoria)."') AND Categoria IN ('".implode("','",$provincia)."') AND Titulo LIKE '".$clave."'";
        $arrayOfertas = [];
        $contador = 0;
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$categoria,$provincia,$clave]);
        if($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchObject()){
                $arrayOfertas['codOferta'] = $resFetch->CodOferta;
                $arrayOfertas['titulo'] = $resFetch->Titulo;
                $arrayOfertas['empresa'] = $resFetch->Empresa;
                $arrayOfertas['descripcion'] = $resFetch->Descripcion;
                $arrayOfertas['requisitos'] = $resFetch->Requisitos;
                $arrayOfertas['experiencia'] = $resFetch->Experiencia;
                $arrayOfertas['vacantes'] = $resFetch->Vacantes;
                $arrayOfertas['categoria'] = $resFetch->Categoria;
                $arrayOfertas['provincia'] = $resFetch->Provincia;
                $arrayOfertas['codEmpresa'] = $resFetch->CodEmpresa;
                $oferta[$contador] = $arrayOfertas;
                $contador++;
            }
        }
        return $oferta;
    }
    public static function verMisOfertas($codEmpresa){
        $consulta = "SELECT * FROM Ofertas WHERE CodEmpresa = ?";
        $oferta = [];
        $arrayOfertas = [];
        $contador = 0;
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codEmpresa]);
        if($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchObject()){
                $arrayOfertas['codOferta'] = $resFetch->CodOferta;
                $arrayOfertas['titulo'] = $resFetch->Titulo;
                $arrayOfertas['empresa'] = $resFetch->Empresa;
                $arrayOfertas['descripcion'] = $resFetch->Descripcion;
                $arrayOfertas['requisitos'] = $resFetch->Requisitos;
                $arrayOfertas['experiencia'] = $resFetch->Experiencia;
                $arrayOfertas['vacantes'] = $resFetch->Vacantes;
                $arrayOfertas['categoria'] = $resFetch->Categoria;
                $arrayOfertas['provincia'] = $resFetch->Provincia;
                $arrayOfertas['codEmpresa'] = $resFetch->CodEmpresa;
                $oferta[$contador] = $arrayOfertas;
                $contador++;
            }
        }
        return $oferta;
    }

    public static function consultarOferta($codOferta){
        $consulta = "SELECT * FROM Ofertas WHERE CodOferta = ?";
        $arrayOfertas = [];
        $resultado = DBPDO::ejecutaConsulta($consulta,[$codOferta]);
        if($resultado->rowCount()==1){
            $resFetch = $resultado->fetchObject();
            $arrayOfertas['codOferta'] = $resFetch->CodOferta;
            $arrayOfertas['titulo'] = $resFetch->Titulo;
            $arrayOfertas['empresa'] = $resFetch->Empresa;
            $arrayOfertas['descripcion'] = $resFetch->Descripcion;
            $arrayOfertas['requisitos'] = $resFetch->Requisitos;
            $arrayOfertas['experiencia'] = $resFetch->Experiencia;
            $arrayOfertas['vacantes'] = $resFetch->Vacantes;
            $arrayOfertas['categoria'] = $resFetch->Categoria;
            $arrayOfertas['provincia'] = $resFetch->Provincia;
            $arrayOfertas['codEmpresa'] = $resFetch->CodEmpresa;
        }
        return $arrayOfertas;
    }

    public static function editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta){
        $modificada = false;
        $consulta = "UPDATE Ofertas SET Titulo = ?, Empresa = ?, Descripcion = ?, Experiencia = ?, Vacantes = ?, Categoria = ?, Provincia = ? WHERE CodOferta = ?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta]);
        if($resConsulta->rowCount()==1){
            $modificada = true;
        }
        return $modificada;
    }
    public static function eliminarOferta($codOferta,$codEmpresa){
        $eliminada = false;
        $consulta = "DELETE FROM Ofertas where CodOferta = ? AND CodEmpresa = ?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codOferta,$codEmpresa]);
        if($resConsulta->rowCount()==1){
            $eliminada = true;
        }
        return $eliminada;
    }

    public static function listarProvincias(){
        $consulta = "SELECT distinct Provincia FROM Ofertas";
        $arrayProvincias = [];
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[]);
        if($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchAll()){
                $arrayProvincias = $resFetch;//->Provincia;
                /*
                 * $arrayProvincias['Provincia'] = $resultadoFetch->Provincia;
                 * $provincia[$contador]=$arrayProvincias;
                 * $contador++;
                 */
            }
        }
        return $arrayProvincias; //$provincia
    }

    public static function listarCategorias(){
        $consulta = "SELECT distinct Categoria FROM Ofertas";
        $arrayCategorias = [];
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[]);
        if($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchAll()){
                $arrayCategorias = $resFetch;//->Categoria;
                /*
                 * $arrayCategorias['Categoria'] = $resultadoFetch->Categoria;
                 * $categoria[$contador]=$arrayCategorias;
                 * $contador++;
                 */
            }

        }
        return $arrayCategorias; //$categoria
    }
}