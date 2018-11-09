<?php
/**
 * File Oferta.php
 *
 * @author  Pablo Cidón.
 * Fecha de última revisión: 07/11/2018
 *
 * Fichero que contiene las funciones que realiza el objeto Oferta.
 */
require_once 'OfertaPDO.php';

/**
 * Class Oferta
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018.
 */
class Oferta{
    //Declaración de los atributos
    /**
     * @var $codOferta Identificador de la oferta.
     */
    private $codOferta;
    /**
     * @var $titulo Título que tendrá la oferta.
     */
    private $titulo;
    /**
     * @var $empresa Empresa que la ha publicado.
     */
    private $empresa;
    /**
     * @var $descripcion Descripción de la oferta.
     */
    private $descripcion;
    /**
     * @var $requisitos Requisitos necesarios para acceder al puesto.
     */
    private $requisitos;
    /**
     * @var $experiencia Experiencia necesario para ocupar dicho puesto.
     */
    private $experiencia;
    /**
     * @var $vacantes Cantidad de puestos disponibles para dicha oferta.
     */
    private $vacantes;
    /**
     * @var $categoria Categoria a la que va a pertenecer dicha oferta.
     */
    private $categoria;
    /**
     * @var $provincia Provincia en la que se encuentren las ofertas.
     */
    private $provincia;
    /**
     * @var $codEmpresa Empresa que las publica y que por lo tanto es la propitaria de las mismas.
     */
    private $codEmpresa;

    /**
     * @return mixed
     */
    public function getCodOferta(){
        return $this->codOferta;
    }

    /**
     * @return mixed
     */
    public function getEmpresa(){
        return $this->empresa;
    }

    /**
     * @return mixed
     */
    public function getTitulo(){
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion(){
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getRequisitos(){
        return $this->requisitos;
    }

    /**
     * @return mixed
     */
    public function getExperiencia(){
        return $this->experiencia;
    }

    /**
     * @return mixed
     */
    public function getVacantes(){
        return $this->vacantes;
    }

    /**
     * @return mixed
     */
    public function getCategoria(){
        return $this->categoria;
    }

    /**
     * @return mixed
     */
    public function getProvincia(){
        return $this->provincia;
    }

    /**
     * @return mixed
     */
    public function getCodEmpresa(){
        return $this->codEmpresa;
    }

    /**
     * @param mixed $codOferta
     */
    public function setCodOferta($codOferta){
        $this->codOferta = $codOferta;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    /**
     * @param mixed $empresa
     */
    public function setEmpresa($empresa){
        $this->empresa = $empresa;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    /**
     * @param mixed $requisitos
     */
    public function setRequisitos($requisitos){
        $this->requisitos = $requisitos;
    }

    /**
     * @param mixed $experiencia
     */
    public function setExperiencia($experiencia){
        $this->experiencia = $experiencia;
    }

    /**
     * @param mixed $vacantes
     */
    public function setVacantes($vacantes){
        $this->vacantes = $vacantes;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia){
        $this->provincia = $provincia;
    }

    /**
     * @param mixed $codEmpresa
     */
    public function setCodEmpresa($codEmpresa){
        $this->codEmpresa = $codEmpresa;
    }

    /**
     * Oferta constructor.
     * @param $codOferta
     * @param $titulo
     * @param $empresa
     * @param $descripcion
     * @param $requisitos
     * @param $experiencia
     * @param $vacantes
     * @param $categoria
     * @param $provincia
     * @param $codEmpresa
     */
    public function __construct($codOferta,$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $this->codOferta = $codOferta;
        $this->titulo = $titulo;
        $this->empresa = $empresa;
        $this->descripcion = $descripcion;
        $this->requisitos = $requisitos;
        $this->experiencia = $experiencia;
        $this->vacantes = $vacantes;
        $this->categoria = $categoria;
        $this->provincia = $provincia;
        $this->codEmpresa = $codEmpresa;
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
     * @param $codEmpresa
     * @return null|Oferta
     */
    public static function publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $oferta = null;
        if(OfertaPDO::publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa)){
            $oferta = new Oferta(@ $codOferta,$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa);
        }
        return $oferta;
    }

    /**
     * @param $categoria
     * @param $provincia
     * @param $clave
     * @return array
     */
    public static function listarOfertas($categoria,$provincia,$clave){
        $arrayOfertas = [];
        $oferta = OfertaPDO::listarOfertas($categoria,$provincia,$clave);
        if($oferta){
            for($i=0;$i<count($oferta);$i++){
                $arrayOfertas[$i] = new Oferta($oferta[$i]['codOferta'],$oferta[$i]['titulo'],$oferta[$i]['empresa'],$oferta[$i]['descripcion'],$oferta[$i]['requisitos'],$oferta[$i]['experiencia'],$oferta[$i]['vacantes'],$oferta[$i]['categoria'],$oferta[$i]['provincia'],$oferta[$i]['codEmpresa']);

            }
        }
        return $arrayOfertas;
    }

    /**
     * @param $codEmpresa
     * @return array
     */
    public static function verMisOfertas($codEmpresa){
        $arrayOfertas = [];
        $oferta = OfertaPDO::verMisOfertas($codEmpresa);
        if($oferta){
            for($i=0;$i<count($oferta);$i++){
                $arrayOfertas[$i] = new Oferta($oferta[$i]['codOferta'],$oferta[$i]['titulo'],$oferta[$i]['empresa'],$oferta[$i]['descripcion'],$oferta[$i]['requisitos'],$oferta[$i]['experiencia'],$oferta[$i]['vacantes'],$oferta[$i]['categoria'],$oferta[$i]['provincia'],$oferta[$i]['codEmpresa']);

            }
        }
        return $arrayOfertas;
    }

    /**
     * @param $codOferta
     * @return null|Oferta
     */
    public static function consultarOferta($codOferta){
        $oferta = null;
        $arrayOferta = OfertaPDO::consultarOferta($codOferta);
        if(!empty($arrayOferta)){
            $oferta = new Oferta($arrayOferta['codOferta'],$arrayOferta['titulo'],$arrayOferta['empresa'],$arrayOferta['descripcion'],$arrayOferta['requisitos'],$arrayOferta['experiencia'],$arrayOferta['vacantes'],$arrayOferta['categoria'],$arrayOferta['provincia'],$arrayOferta['codEmpresa']);
        }
        return $oferta;
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
        $correcto=false;
        //$codOferta = $_SESSION['oferta']->getCodOferta();
        if(OfertaPDO::editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta)){
            $_SESSION['oferta']->setTitulo($titulo);
            $_SESSION['oferta']->setEmpresa($empresa);
            $_SESSION['oferta']->setDescripcion($descripcion);
            $_SESSION['oferta']->setRequisitos($requisitos);
            $_SESSION['oferta']->setExperiencia($experiencia);
            $_SESSION['oferta']->setVacantes($vacantes);
            $_SESSION['oferta']->setCategoria($categoria);
            $_SESSION['oferta']->setProvincia($provincia);
            $correcto=true;
        }
        return $correcto;
    }

    /**
     * @param $codOferta
     * @param $codEmpresa
     * @return bool
     */
    public static function eliminarOferta($codOferta,$codEmpresa){
        $eliminada = false;
        if(OfertaPDO::eliminarOferta($codOferta,$codEmpresa)){
            $eliminada = true;
        }
        return $eliminada;
    }

    /**
     * @function listarProvincias().
     * Función para mostrar las provincias que cuenten con alguna oferta.
     *
     * @return array Devuelve un array con cada una de las provincias que tengan alguna oferta.
     */
    public function listarProvincias(){
        $arrayProvincias = [];
        $provincias = OfertaPDO::listarProvincias();
        if($provincias){
            for ($i=0;$i<count($provincias);$i++){
                $arrayProvincias[$i] = $provincias[$i];
            }
        }
        return $arrayProvincias;
    }

    /**
     * @function listarCategorias().
     * Función para listar las categorias que tienen alguna oferta dentro de la misma.
     *
     * @return array Devuelve un array con las diferentes categorias tengan alguna oferta dentro de la misma.
     */
    public static function listarCategorias(){
        $arrayCategorias = [];
        $categorias = OfertaPDO::listarCategorias();
        if($categorias){
            for($i=0;$i<count($categorias);$i++){
                $arrayCategorias[$i] = $categorias[$i];
            }
        }
        return $arrayCategorias;
    }
}