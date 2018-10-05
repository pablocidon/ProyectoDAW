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

    public static function publicarOferta($codOferta,$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $oferta = null;
        if(OfertaPDO::publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa)){
            $oferta = new Oferta($codOferta,$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa);
        }
        return $oferta;
    }

    public static function listarOfertas($categoria,$provincia,$clave){
        return OfertaPDO::listarOfertas($categoria,$provincia,$clave);
    }

    public static function verMisOfertas($codEmpresa){
        return OfertaPDO::verMisOfertas($codEmpresa);
    }

    public static function editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $correcto=false;
        $codEmpresa = $this->getCodUsuario();

        if(OfertaPDO::editarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa)){
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
        return OfertaPDO::listarProvincias();
    }

    public static function listarCategorias(){
        return OfertaPDO::listarCategorias();
    }
}