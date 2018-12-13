 <?php
/**
 * Operaciones sobre el objeto Usuario.
 *
 * Fichero del modelo que crea los objetos de la clase usuario y usa sus métodos
 *
 * PHP Version 7.0
 *
 * @category Usuario.
 * @package Modelo.
 */
require_once 'UsuarioPDO.php';

/**
 * Class Usuario
 * Operaciones sobre el objeto usuario.
 *
 * @author Pablo Cidón
 * @copyright 09 de noviembre de 2018
 */

class Usuario{
    //Declaración de los atributos
    /**
     * Identificador del usuario.
     *
     * Cadena utilizada para que el usuario pueda iniciar la sesión.
     *
     * @var $codUsuario
     */
    private $codUsuario;
    /**
     * Nombre del usuario o empresa.
     *
     * Cadena que muestra el nombre del usuario registrado.
     *
     * @var $nombre
     */
    private $nombre;
    /**
     * Apellidos del usuario.
     *
     * Cadena que muestra los apellidos del usuario registrado.
     *
     * @var $apellidos
     */
    private $apellidos;
    /**
     * Contraseña del usuario.
     *
     * Cadena utilizada para poder iniciar la sesión en el programa.
     *
     * @var $password
     */
    private $password;
    /**
     * Tipo de perfil del usuario.
     *
     * Cadena que indica el tipo de perfil, solo admite los valores 'Usuario' o 'Empresa'.
     *
     * @var $perfil
     */
    private $perfil;
    /**
     * Correo electrónico del usuario.
     *
     * Cadena que indica el email del usuario registrado.
     *
     * @var $email
     */
    private $email;
    /**
     * Sitio web de la empresa.
     *
     * Cadena que indica la página web de la empresa.
     *
     * @var $web
     */
    private $web;

    /**
     * Obtener el identificador del usuario.
     *
     * Función para obtener el identificador del usuario.
     *
     * @return string Devuelve una cadena con el identificador del usuario.
     */
    public function getCodUsuario(){
        return $this->codUsuario;
    }

    /**
     * Obtener el nombre del usuario o empresa.
     *
     * Función para obtener el nombre del usuario o empresa.
     *
     * @return string Devuelve una cadena con el nombre del usuario o empresa.
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Obtener los apellidos de un usuario.
     *
     * Función para obtener los apellidos de un usuario en cuestión.
     *
     * @return string Devuelve una cadena con los apellidos del usuario.
     */
    public function getApellidos(){
        return $this->apellidos;
    }

    /**
     * Obtener el password de un usuario.
     *
     * Función para obtener la contraseña de acceso de un usuario.
     *
     * @return string Devuelve una cadena con la contraseña del usuario.
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * Obtener el tipo de perfil del usuario.
     *
     * Función para obtener el tipo de perfil de un usuario.
     *
     * @return string Devuelve una cadena con el tipo de perfil que tiene el usuario.
     */
    public function getPerfil(){
        return $this->perfil;
    }

    /**
     * Obtener la dirección de correo de un usuario.
     *
     * Función para obtener la dirección de correo electrónico de un usuario.
     *
     * @return string Devuelve una cadena con el email de un usuario.
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * Obtener la página web de un usuario.
     *
     * Función para obtener el sitio web de un usuario, por lo general que sea empresa.
     *
     * @return string Devuelve una cadena con la página web de una empresa.
     */
    public function getWeb(){
        return $this->web;
    }

    /**
     * Modificar el identificador del usuario.
     *
     * Función para modificar el identificador de un usuario.
     *
     * @param string $codUsuario Nuevo valor del campo codUsuario.
     */
    public function setCodUsuario($codUsuario){
        $this->codUsuario = $codUsuario;
    }

    /**
     * Modificar el nombre de un usuario.
     *
     * Función para modificar el nombre de un usuario o empresa registrado.
     *
     * @param string $nombre Nuevo nombre que el usuario va a tener en su perfil.
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Modificar los apellidos de un usuario.
     *
     * Función para modificar los apellidos de un usuario registrado.
     *
     * @param string $apellidos Nuevos apellidos que va a tener el usuario.
     */
    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    /**
     * Modificar la contraseña de un usuario.
     *
     * Función para modificar la contraseña de un usuario.
     *
     * @param string $password Nueva contraseña del usuario.
     */
    public function setPassword($password){
        $this->password = $password;
    }

    /**
     * Modificar el tipo de perfil.
     *
     * Función para modificar el tipo de perfil de un usuario.
     *
     * @param string $perfil Nuevo valor del perfil del usuario.
     */
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    /**
     * Modificar el email de un usuario.
     *
     * Función para modificar el email de un usuario registrado.
     *
     * @param string $email Nueva dirección de correo del usuario.
     */
    public function setEmail($email){
        $this->email = $email;
    }

    /**
     * Modificar el sitio web de un usuario.
     *
     * Función para obtener la página web de una empresa.
     *
     * @param string $web Nuevo sitio web del usuario.
     */
    public function setWeb($web){
        $this->web = $web;
    }

    /**
     * Usuario constructor.
     * Función constructora del objeto Usuario.
     *
     * @param string $codUsuario Identificador del usuario.
     * @param string $nombre Nombre del usuario o empresa.
     * @param string $apellidos Apellidos del usuario.
     * @param string $passwdord Contraseña del usuario.
     * @param string $perfil Tipo de perfil del usuario.
     * @param string $email Dirección de correo del usuario o empresa.
     * @param string $web Sitio web de la empresa.
     */
    function __construct($codUsuario, $nombre, $apellidos, $password, $perfil, $email, $web) {
        $this->codUsuario = $codUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->password = $password;
        $this->perfil = $perfil;
        $this->email = $email;
        $this->web = $web;
    }

    /**
     * validarUsuario($codUsuario,$password).
     * Función para comprobar que un usuario está registrado para iniciar sesión.
     *
     * @param string $codUsuario Identificador del usuario para iniciar sesión.
     * @param string $password Contraseña del usuario para iniciar sesión.
     * @return null|Usuario Si el usuario existe devolverá el objeto Usuario, de lo contrario nos devolverá 'null'.
     */
    public static function validarUsuario($codUsuario,$password){
        $usuario=null;
        $arrayUsuario=UsuarioPDO::validarUsuario($codUsuario,$password); 
        if(!empty($arrayUsuario)) { 
            $usuario = new Usuario($codUsuario, $arrayUsuario['nombre'], $arrayUsuario['apellidos'], $password, $arrayUsuario['perfil'], $arrayUsuario['email'],$arrayUsuario['web']);
        } 
        return $usuario; 
    }

    /**
     * registrarUsuario($codUsuario,$nombre, $apellidos, $password,$perfil,$email,$web).
     * Función para crear un nuevo usuario.
     *
     * @param string $codUsuario Identificador del usuario.
     * @param string $nombre Nombre del usuario o empresa.
     * @param string $apellidos Apellidos del usuario.
     * @param string $password Contraseña del usuario para acceder a su cuenta.
     * @param string $perfil Tipo de perfil del usuario.
     * @param string $email Dirección de correo del usuario.
     * @param string $web Sitio web de la empresa.
     * @return null|Usuario Si el registro es llevado a cabo, nos devolverá un elemento del tipo 'Usuario', de lo contrario nos devolverá 'null'.
     */
    public static function registrarUsuario($codUsuario,$nombre, $apellidos, $password,$perfil,$email,$web){
         $usuario=null;
         if(UsuarioPDO::registrarUsuario($codUsuario,$nombre, $apellidos, $password,$perfil,$email,$web)){
             $usuario=new Usuario($codUsuario,$nombre, $apellidos, $password,$perfil,$email,$web);
         }
         return $usuario;
    }

    /**
     * comprobarExisteUsuario($codUsuario).
     * Función para comprobar que el usuario ya existe.
     *
     * @param string $codUsuario Identificador del usuario a comprobar que existe.
     * @return bool En el caso de que exista, nos devolverá 1 o 'true' y de lo contrario 0 o 'false'.
     */
    public static function comprobarExisteUsuario($codUsuario){
        return UsuarioPDO::comprobarExisteUsuario($codUsuario);
    }

    /**
     * editarUsuario($nombre, $apellidos, $password, $email, $web, $codUsuario)
     * Función para modificar los datos de un usuario registrado.
     *
     * @param string $nombre Nuevo nombre del usuario o empresa.
     * @param string $apellidos Nuevos apellidos del usuario.
     * @param string $password Nueva contraseña del usuario.
     * @param string $email Nuevo correo electrónico del usuario o empresa.
     * @param string $web Nueva dirección web de la empresa.
     * @param string $codUsuario Identificador del usuario a modificar.
     * @return bool En el caso de que se apliquen los cambios devolverá 'true' o 1 y de lo contrario devolverá 0 o 'false'.
     */
    public function editarUsuario($nombre, $apellidos, $password, $email, $web, $codUsuario){
        $correcto=false; 
        $codUsuario = $this->getCodUsuario();
        if(empty($password)){
            $password=hash('sha256',$this->getPassword());
        }
        if(UsuarioPDO::editarUsuario($nombre, $apellidos, $password, $email, $web,$codUsuario)){
            $this->setNombre($nombre);
            $this->setApellidos($apellidos);
            $this->setPassword($password);
            $this->setEmail($email);
            $this->setWeb($web);
            $correcto=true; 
        } 
        return $correcto; 
    }

    /**
     * borrarUsuario($codUsuario).
     * Función para que un usuario pueda eliminar su cuienta.
     *
     * @param string $codUsuario Identificador del usuario a eliminar.
     * @return bool Si el usuario es eliminado devovlerá 1 o 'true' y de lo contrario devolverá 0 o 'false'.
     */
     public function borrarUsuario($codUsuario){
        $correcto=false; 
        if (UsuarioPDO::eliminarUsuario($codUsuario)){
            $correcto=true; 
        } 
        return $correcto; 
    }

    /**
     * listarUsuarios().
     * Función para obtener un listado de todos los usuarios para realizar el mantenimiento de los mismos.
     *
     * @return array Devuelve un array con cada uno de los usuarios que se encuentren registrados.
     */
    public function listarUsuarios(){
        $arrayUsuarios = [];
        $usuario = UsuarioPDO::listarUsuarios();
        if($usuario){
            for($i=0;$i<count($usuario);$i++){
                $arrayUsuarios[$i] = new Usuario ($usuario[$i]['codUsuario'], $usuario[$i]['nombre'], $usuario[$i]['apellidos'], @ $password, $usuario[$i]['perfil'], $usuario[$i]['email'],$usuario[$i]['web']);
            }
        }
        return $arrayUsuarios;
    }

    /**
     * consultarUsuario($codUsuario).
     * Función para obtener los datos de un usuario en concreto.
     *
     * @param string $codUsuario Identificador del usuario que vamos a consultar
     * @return null|Usuario Si el usuario es encontrado devolverá un objeto de la clase Usuario, de lo contrario devolverá null.
     */
    public function consultarUsuario($codUsuario){
        $usuario = null;
        $arrayUsuarios = UsuarioPDO::consultarUsuario($codUsuario);
        if($arrayUsuarios){
            $usuario = new Usuario($arrayUsuarios['codUsuario'],$arrayUsuarios['nombre'],$arrayUsuarios['apellidos'],@ $password, $arrayUsuarios['perfil'], $arrayUsuarios['email'],$arrayUsuarios['web']);
        }
        return $usuario;
    }
}
?>