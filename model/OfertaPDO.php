<?php
/**
 * Operaciones sobre el objeto Oferta en la base de datos.
 *
 * Fichero que realiza las operaciones del objeto Oferta en la BD.
 *
 * PHP Version 7.0
 *
 * @category Oferta.
 * @package Modelo.
 */
require_once 'DBPDO.php';

/**
 * Class OfertaPDO
 *
 * Operaciones en la base de datos con el objeto Oferta.
 *
 * @author Pablo Cidón.
 * @copyright 10 de noviembre de 2018
 */
class OfertaPDO{
    /**
     * publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa).
     * Función para registrar cada una de las ofertas que sean publicadas.
     *
     * @param string $titulo Título que va a tener la oferta.
     * @param string $empresa Empresa a la que va a pertenecer la oferta.
     * @param string $descripcion Descripción de en qué va a consistir la oferta.
     * @param string $requisitos Requisitos necesario para ocupar alguno de los puestos anunciados.
     * @param int $experiencia Experiencia previa necesaria para acceder a un puesto.
     * @param int $vacantes Número de puestos disponibles para una determinada oferta.
     * @param string $categoria Categoría en la que se va a encontrar la oferta.
     * @param string $provincia Provincia en la que se va a situar la oferta.
     * @param string $codEmpresa Identificador de la empresa a la que pertenece la oferta.
     * @return bool Si el registro es creado, devolverá 1 o 'true', de lo contrario devolverá 0 o 'false'.
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
     * listarOfertas($categoria,$provincia,$clave,$pagina,$registrosPagina).
     * Función para realizar el listado de todas las ofertas disponibles, realizando la paginación de los resultados.
     *
     * @param $categoria Categoria por la que se va a realizar el filtrado de búsqueda.
     * @param $provincia Provincia por la que se van a filtrar los resultados.
     * @param $clave Palabra por la que se van a filtrar los títulos de las ofertas.
     * @param $pagina Número de página en la que se encuentra.
     * @param $registrosPagina Número de registros que mostraremos en cada una de las páginas.
     * @return mixed Devuelve un listado con todas las ofertas que sean encontradas según los filtros de búsqueda.
     */
    public static function listarOfertas($categoria,$provincia,$clave,$pagina,$registrosPagina){
        if(is_null($pagina)){
            $pagina = 1;
        }
        $primerRegistro = ($pagina-1)*($registrosPagina);
        $arrayOfertas = [];
        $contador = 0;
        $consulta = "SELECT * FROM Ofertas WHERE Categoria LIKE concat('%',?,'%') AND Provincia LIKE concat('%',?,'%') AND Titulo LIKE concat('%',?,'%') ORDER BY CodOferta DESC LIMIT $primerRegistro, $registrosPagina";
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
     * contarOfertasPorFiltro($categoria,$provincia,$clave).
     * Función para contar la cantidad de registros que hay según el filtrado de búsqueda.
     *
     * @param $categoria Categoria por la que se realiza el filtrado.
     * @param $provincia Provincia por la que se realiza el filtrado.
     * @param $clave Palabra del título por la que se filtrarán los resultados.
     * @return integer Devuelve la cantidad de registros que se han encontrado
     */
    public static function contarOfertasPorFiltro($categoria,$provincia,$clave){
        $consulta = "SELECT COUNT(*) FROM Ofertas WHERE Categoria LIKE concat('%',?,'%') AND Provincia LIKE concat('%',?,'%') AND Titulo LIKE concat('%',?,'%')";
        $resultado = DBPDO::ejecutaConsulta($consulta,[$categoria,$provincia,$clave]);
        if($resultado->rowCount()){
            $totalOfertas = $resultado->fetchColumn(0);
        }
        return $totalOfertas;
    }

    /**
     * verMisOfertas($codEmpresa).
     * Función para listar las ofertas que pertenecen a una determinada oferta.
     *
     * @param string $codEmpresa Identificador de la empresa por la que se va a realizar el listado.
     * @return array Devuelve un array con los registros encontrados.
     */
    public static function verMisOfertas($codEmpresa){
        $consulta = "SELECT * FROM Ofertas WHERE CodEmpresa LIKE ? ORDER BY CodOferta DESC";
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
     * consultarOferta($codOferta).
     * Función para consultar el contenido de una determinada oferta.
     *
     * @param int $codOferta Identificador de la oferta a consultar.
     * @return array Devuelve un array con el contenido de la oferta.
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
     * editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta).
     * Función para modificar una determinada oferta.
     *
     * @param string $titulo Nuevo valor que va a tener el título de la oferta.
     * @param string $empresa Nuevo valor que va a tener la empresa a la que pertenece la oferta.
     * @param string $descripcion Nuevo valor que va a tener la descripción de la oferta.
     * @param string $requisitos Nuevo valor que van a tener los requisitos que va a tener la empresa.
     * @param int $experiencia Nuevo valor de experiencia necesaria para acceder a alguno de los puestos ofrecidos.
     * @param int $vacantes Nueva cantidad de plazas disponibles en una determinada oferta.
     * @param string $categoria Nueva categoría a la que va a pertenecer la oferta.
     * @param string $provincia Nueva provincia en la que se va a encontrar la oferta.
     * @param int $codOferta Identificador de la oferta sobre la que se van a realizar los cambios.
     * @return bool Si se aplican los cambios, devolverá 'True' o 1, y de lo contrario devolverá 0 o 'False'.
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
     * eliminarOferta($codOferta,$codEmpresa).
     * Función para eliminar una oferta.
     *
     * @param int $codOferta Identificador de la empresa a eliminar.
     * @param string $codEmpresa Identificador de la empresa a la que pertenece la oferta.
     * @return bool Devolverá 'True' o 1 si el registro es eliminado, y de lo contrario devolverá 0 o 'False'.
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
     * listarProvincias().
     * Función para mostrar las provincias que cuenten con alguna oferta.
     *
     * @return array Devuelve un array con cada una de las provincias que tengan alguna oferta.
     */
    public static function listarProvincias(){
        $consulta = "SELECT distinct Provincia FROM Ofertas ORDER BY Provincia";
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
     * listarCategorias().
     * Función para listar las categorias que tienen alguna oferta dentro de la misma.
     *
     * @return array Devuelve un array con las diferentes categorias tengan alguna oferta dentro de la misma.
     */
    public static function listarCategorias(){
        $consulta = "SELECT distinct Categoria FROM Ofertas ORDER BY Categoria";
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