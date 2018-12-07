<?php
/**
 * Operaciones sobre el objeto Oferta.
 *
 * Fichero que contiene las funciones que realiza el objeto Oferta.
 *
 * PHP Version 7.0
 *
 * @category Oferta.
 * @package Modelo.
 */
require_once 'OfertaPDO.php';

/**
 * Class Oferta
 *
 * Operaciones sobre el objeto Oferta.
 *
 * @author Pablo Cidón.
 * @copyright 10 de noviembre de 2018.
 */
class Oferta{
    //Declaración de los atributos
    /**
     * Identificador de la oferta.
     *
     * Valor entero mayor de 0.
     *
     * @var $codOferta
     */
    private $codOferta;
    /**
     * Título que tendrá la oferta.
     *
     * Cadena que contiene el título de la oferta.
     *
     * @var $titulo
     */
    private $titulo;
    /**
     * Empresa que la ha publicado.
     *
     * Cadena que contiene la empresa a la que pertenece.
     *
     * @var $empresa
     */
    private $empresa;
    /**
     * Descripción de la oferta.
     *
     * Cadena que contiene una descripción de en qué va a consistir la oferta.
     *
     * @var $descripcion
     */
    private $descripcion;
    /**
     * Requisitos necesarios para acceder al puesto.
     *
     * Cadena que contiene los requisitos necesarios para acceder a los puestos.
     *
     * @var $requisitos
     */
    private $requisitos;
    /**
     * Experiencia necesario para ocupar dicho puesto.
     *
     * Entero que contiene la experiencia previa necesaria para el puesto.
     *
     * @var $experiencia
     */
    private $experiencia;
    /**
     * Cantidad de puestos disponibles para dicha oferta.
     *
     * Entero que contiene el número de vacantes disponibles en la oferta.
     *
     * @var $vacantes
     */
    private $vacantes;
    /**
     * Categoria a la que va a pertenecer dicha oferta.
     *
     * Cadena que contiene la categoría a la que pertenece la oferta
     *
     * @var $categoria
     */
    private $categoria;
    /**
     * Provincia en la que se encuentren las ofertas.
     *
     * Cadena que contiene la provincia donde está situada la oferta.
     *
     * @var $provincia
     */
    private $provincia;
    /**
     * Empresa que las publica y que por lo tanto es la propitaria de las mismas.
     *
     * Identificador de la empresa que ha publicado la oferta.
     *
     * @var $codEmpresa
     */
    private $codEmpresa;

    /**
     * Obtener el identificador de la oferta.
     *
     * Función para obtener el identificador de una oferta.
     *
     * @return int Devuelve un entero que corresponde con el identificador de la oferta.
     */
    public function getCodOferta(){
        return $this->codOferta;
    }

    /**
     * Obtener la empresa a la que pertenece la oferta.
     *
     * Función para obtner el nombre de la empresa que ha publicado la oferta.
     *
     * @return string Devuelve una cadena con el valor de la empresa que la ha publicado.
     */
    public function getEmpresa(){
        return $this->empresa;
    }

    /**
     * Obtener el título de la oferta.
     *
     * Función para obtener el título de la empresa.
     *
     * @return string Devuelve una cadena con el título que se le ha dado a la oferta.
     */
    public function getTitulo(){
        return $this->titulo;
    }

    /**
     * @function getDescripcion().
     * Función para obtener la descripción de lo que va a consistir la oferta.
     *
     * @return string Devuelve una cadena con la descripción de lo que va a consistir la oferta.
     */
    public function getDescripcion(){
        return $this->descripcion;
    }

    /**
     * Obtener los requisitos de la oferta.
     *
     * Función para obtener los requisitos necesarios para la oferta.
     *
     * @return string Devuelve una cadena con los requisitos necesarios para acceder a la oferta.
     */
    public function getRequisitos(){
        return $this->requisitos;
    }

    /**
     * Obtener la experiencia necesaria para el puesto.
     *
     * Función para obtener la experiencia necesaria para el puesto.
     *
     * @return int Devuelve un entero con la experiencia previa necesaria para acceder a la oferta.
     */
    public function getExperiencia(){
        return $this->experiencia;
    }

    /**
     * Obtener las vacantes.
     *
     * Función que devuelve la cantidad de puestos que se ofrecen en una determinada oferta.
     *
     * @return int Devuelve un entero como cantidad de puestos disponibles en la oferta.
     */
    public function getVacantes(){
        return $this->vacantes;
    }

    /**
     * Obtener la categoria de la oferta.
     *
     * Función para obtener la categoría a la que pertenece una determinada oferta.
     *
     * @return string Devuelve una cadena con la categoría a la que pertenece la oferta.
     */
    public function getCategoria(){
        return $this->categoria;
    }

    /**
     * Obtener la provincia en la que se encuentra la oferta.
     *
     * Función para obtener la provincia en la que se encuentra la oferta.
     *
     * @return string Devuelve una cadena con la provincia en la que se encuentra la oferta.
     */
    public function getProvincia(){
        return $this->provincia;
    }

    /**
     * Obtener el identificador de la empresa que ha publicado la oferta.
     *
     * Función para obtener la empresa a la que pertenece la oferta.
     *
     * @return string Devuelve una cadena con la empresa que ha publicado una oferta.
     */
    public function getCodEmpresa(){
        return $this->codEmpresa;
    }

    /**
     * Modificar el identificador de la oferta.
     *
     * Función para cambiar el identificador de una oferta.
     *
     * @param $codOferta Nuevo valor que va a recibir el identificador de la oferta.
     */
    public function setCodOferta($codOferta){
        $this->codOferta = $codOferta;
    }

    /**
     * Modificar el título.
     *
     * Función para modificar el título de una oferta.
     *
     * @param $titulo Nuevo valor que va a tener el título.
     */
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    /**
     * Modificar la empresa a la que pertenece la oferta.
     *
     * Función para modificar la empresa que ha publicado la oferta.
     *
     * @param $empresa Nuevo valor que va a tener la empresa que ha publicado la oferta.
     */
    public function setEmpresa($empresa){
        $this->empresa = $empresa;
    }

    /**
     * Modificar la descripción de una oferta.
     *
     * Función para cambiar la descripción de la oferta.
     *
     * @param $descripcion Nuevo valor que va a tener el campo descripción de la oferta.
     */
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    /**
     * Modificar los requisitos de una oferta.
     *
     * Función para modificar los requisitos de una determinada oferta.
     *
     * @param $requisitos Nuevo valor que va a tener el campo requisitos en la oferta.
     */
    public function setRequisitos($requisitos){
        $this->requisitos = $requisitos;
    }

    /**
     * Modificar la experiencia necesaria.
     *
     * Función para cambiar la experiencia necesaria para la oferta.
     *
     * @param $experiencia Nuevo valor del campo experiencia.
     */
    public function setExperiencia($experiencia){
        $this->experiencia = $experiencia;
    }

    /**
     * Modificar la cantidad de puestos disponibles.
     *
     * Función para modificar el campo vacantes de una oferta.
     *
     * @param $vacantes Nueva cantidad de vacantes disponibles para la oferta.
     */
    public function setVacantes($vacantes){
        $this->vacantes = $vacantes;
    }

    /**
     * Modificar la categoría de una oferta.
     *
     * Función para cambiar la categoria a la que pertence una determinada oferta.
     *
     * @param $categoria Nuevo valor del campo categoria de la oferta.
     */
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    /**
     * Modificar la provincia en la que se encuentra la oferta.
     *
     * Función para cambiar la provincia a la que va a pertenece la oferta.
     *
     * @param $provincia Nuevo valor del campo provincia de la oferta.
     */
    public function setProvincia($provincia){
        $this->provincia = $provincia;
    }

    /**
     * Modificar el identificador de la empresa que ha publicado la oferta.
     *
     * Función para cambiar el identificador de la empresa que ha publicado la oferta.
     *
     * @param $codEmpresa Nuevo identificador de la empresa que ha publicado la oferta.
     */
    public function setCodEmpresa($codEmpresa){
        $this->codEmpresa = $codEmpresa;
    }

    /**
     * Oferta constructor.
     * Función constructora del objeto Oferta.
     *
     * @param int $codOferta Identificador de la oferta.
     * @param string $titulo Título de la oferta.
     * @param string $empresa Nombre de la empresa que ha publicado la oferta.
     * @param string $descripcion Descripción de lo que va a consistir la oferta.
     * @param string $requisitos Requisitos necesarios para acceder a la oferta.
     * @param int $experiencia Experiencia previa necesaria para los puestos ofrecidos en las ofertas.
     * @param int $vacantes Cantidad de puestos que se ofrecen en las ofertas.
     * @param string $categoria Categoría a la que van a pertencer las diferentes ofertas.
     * @param string $provincia Provincia en la que se va a situar la oferta.
     * @param string $codEmpresa Identificador de la empresa que ha publicado la oferta.
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
     * publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa).
     * Función para publicar las diferentes ofertas.
     *
     * @param string $titulo Título que va a tener la oferta.
     * @param string $empresa Nombre de la empresa a la que pertenece la oferta.
     * @param string $descripcion Descripción de lo que va a consistir la oferta.
     * @param string $requisitos Requisitos necesarios para acceder a alguno de los puestos se ofrecen.
     * @param int $experiencia Experiencia previa necesaria para ocupar los puestos ofrecidos.
     * @param int $vacantes Cantidad de puestos que se ofrecen en las diferentes ofertas.
     * @param string $categoria Categoria a la que van a pertenecer las diferentes ofertas.
     * @param string $provincia Provincia en la que se van a encontrar las diferentes ofertas.
     * @param string $codEmpresa Identificador de la empresa a la que pertence la oferta.
     * @return null|Oferta En el caso de que se haya publicado devolverá un objeto de la clase 'Oferta'. De lo contrario devolverá 'null'.
     */
    public static function publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa){
        $oferta = null;
        if(OfertaPDO::publicarOferta($titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa)){
            $oferta = new Oferta(@ $codOferta,$titulo,$empresa,$descripcion,$requisitos,$experiencia,$vacantes,$categoria,$provincia,$codEmpresa);
        }
        return $oferta;
    }

    /**
     * listarOfertas($categoria,$provincia,$clave).
     * Función para realizar el listado de todas las ofertas disponibles.
     *
     * @param string $categoria Realizar el listado filtrando por la categoría a la que pertencen las ofertas.
     * @param string $provincia Realizar el listado filtrando por la provincia a la que pertencen las ofertas.
     * @param string $clave Realizar el listado de ofertas filtrando por una palabra.
     * @return array Devuelve un array con la cantidad de ofertas encontradas.
     */
    public static function listarOfertas($categoria,$provincia,$clave,$pagina,$registrosPagina){
        $arrayOfertas = [];
        if(is_null($pagina)){
            $pagina = 1;
        }
        $oferta = OfertaPDO::listarOfertas($categoria,$provincia,$clave,$pagina,$registrosPagina);
        if($oferta){
            for($i=0;$i<count($oferta);$i++){
                $arrayOfertas[$i] = new Oferta($oferta[$i]['codOferta'],$oferta[$i]['titulo'],$oferta[$i]['empresa'],$oferta[$i]['descripcion'],$oferta[$i]['requisitos'],$oferta[$i]['experiencia'],$oferta[$i]['vacantes'],$oferta[$i]['categoria'],$oferta[$i]['provincia'],$oferta[$i]['codEmpresa']);

            }
        }
        return $arrayOfertas;
    }

    /**
     * verMisOfertas($codEmpresa).
     * Función para que una empresa realice un listado de las ofertas que pertenezcan a la misma.
     *
     * @param string $codEmpresa Identificador de la empresa por la que se va a realizar el listado.
     * @return array Devuelve un array con las ofertas que pertenecen a una determinada empresa.
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
     * consultarOferta($codOferta).
     * Función para que los usuarios puedan consultar el contenido de una determinada oferta.
     *
     * @param int $codOferta Identificador de la oferta que se va a consultar.
     * @return null|Oferta Devuelve 'null' en el caso de que no se haya encontrado ninguna, de lo contrario nos devolverá un objeto de la clase 'Oferta'.
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
     * eliminarOferta($codOferta,$codEmpresa).
     * Función para eliminar una oferta.
     *
     * @param int $codOferta Identificador de la empresa a eliminar.
     * @param string $codEmpresa Identificador de la empresa a la que pertenece la oferta.
     * @return bool Devolverá 'True' o 1 si el registro es eliminado, y de lo contrario devolverá 0 o 'False'.
     */
    public static function eliminarOferta($codOferta,$codEmpresa){
        $eliminada = false;
        if(OfertaPDO::eliminarOferta($codOferta,$codEmpresa)){
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
     * listarCategorias().
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