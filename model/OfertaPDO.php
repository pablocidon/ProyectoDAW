<?php
/**
 * @author Pablo Cidón.
 * Fecha de última revisión: 02/10/2018
 *
 * Fichero que realiza las operaciones del objeto Oferta en la BD.
 */
require_once 'DBPDO.php';

/**
 * Class OfertaPDO
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018
 */
class OfertaPDO{
    /**
     * @param $titulo
     * @param $empresa
     * @param $descripcion
     * @param $requisitos
     * @param $experiencia
     * @param $vacantes
     * @param $categoria
     * @param $provincia
     * @param $codEmpresa
     * @return bool
     */
    public static function publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $consulta = "INSERT INTO Ofertas (Titulo,Empresa,Descripcion,Requisitos,Experiencia,Vacantes,Categoria,Provincia,CodEmpresa) VALUES (?,?,?,?,?,?,?,?,?)";
        $registrado = false;
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa]);
        if($resConsulta->rowCount()==1){
            $registrado = true;
        }
        return $registrado;
    }

    /**
     * @param $categoria
     * @param $provincia
     * @param $clave
     * @return mixed
     */
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

    /**
     * @param $codEmpresa
     * @return array
     */
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

    /**
     * @param $codOferta
     * @return array
     */
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

    /**
     * @param $titulo
     * @param $empresa
     * @param $descripcion
     * @param $requisitos
     * @param $experiencia
     * @param $vacantes
     * @param $categoria
     * @param $provincia
     * @param $codOferta
     * @return bool
     */
    public static function editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta){
        $modificada = false;
        $consulta = "UPDATE Ofertas SET Titulo=?, Empresa=?, Descripcion=?, Requisitos=?, Experiencia=?, Vacantes=?, Categoria=?, Provincia=? WHERE CodOferta=?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta]);
        if($resConsulta->rowCount()==1){
            $modificada = true;
        }
        return $modificada;
    }

    /**
     * @param $codOferta
     * @param $codEmpresa
     * @return bool
     */
    public static function eliminarOferta($codOferta,$codEmpresa){
        $eliminada = false;
        $consulta = "DELETE FROM Ofertas where CodOferta = ? AND CodEmpresa = ?";
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[$codOferta,$codEmpresa]);
        if($resConsulta->rowCount()==1){
            $eliminada = true;
        }
        return $eliminada;
    }

    /**
     * @return array
     */
    public static function listarProvincias(){
        $consulta = "SELECT distinct Provincia FROM Ofertas";
        $arrayProvincias = [];
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[]);
        if($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchAll()){
                $arrayProvincias = $resFetch;
            }
        }
        return $arrayProvincias; //$provincia
    }

    /**
     * @return array
     */
    public static function listarCategorias(){
        $consulta = "SELECT distinct Categoria FROM Ofertas";
        $arrayCategorias = [];
        $resConsulta = DBPDO::ejecutaConsulta($consulta,[]);
        if($resConsulta->rowCount()>0){
            while ($resFetch = $resConsulta->fetchAll()){
                $arrayCategorias = $resFetch;
            }
        }
        return $arrayCategorias;
    }
}