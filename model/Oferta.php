<?php
/**
 * Autor by Pablo Cidón.
 * Fecha de última revisión: 05/10/2018
 *
 */
require_once 'OfertaPDO.php';
class Oferta{
    private $codOferta;
    private $titulo;
    private $empresa;
    private $descripcion;
    private $requisitos;
    private $experiencia;
    private $vacantes;
    private $categoria;
    private $provincia;
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

    public static function publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $oferta = null;
        if(OfertaPDO::publicarOferta($empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa)){
            $oferta = new Oferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa);
        }
        return $oferta;
    }

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

    public static function consultarOferta($codOferta){
        $oferta = null;
        $arrayOferta = OfertaPDO::consultarOferta($codOferta);
        if(!empty($arrayOferta)){
            $oferta = new Oferta($arrayOferta['codOferta'],$arrayOferta['titulo'],$arrayOferta['empresa'],$arrayOferta['descripcion'],$arrayOferta['requisitos'],$arrayOferta['experiencia'],$arrayOferta['vacantes'],$arrayOferta['categoria'],$arrayOferta['provincia'],$arrayOferta['codEmpresa']);
        }
        return $oferta;
    }

    public static function editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta){
        $correcto=false;
        $codOferta = $this->getCodOferta();

        if(OfertaPDO::editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codOferta)){
            $this->setTitulo($titulo);
            $this->setEmpresa($empresa);
            $this->setDescripcion($descripcion);
            $this->setRequisitos($requisitos);
            $this->setExperiencia($experiencia);
            $this->setVacantes($vacantes);
            $this->setCategoria($categoria);
            $this->setProvincia($provincia);
            $correcto=true;
        }
        return $correcto;
    }

    public static function eliminarOferta($codOferta,$codEmpresa){
        return OfertaPDO::eliminarOferta($codOferta,$codEmpresa);
    }

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