 <?php
/**
 * File Usuario.php
 * @author Pablo Cidón
 *
 * Fichero del modelo que crea los objetos de la clase usuario y usa sus métodos
 */
require_once 'UsuarioPDO.php';

/**
 * Class Usuario
 * @author Pablo Cidón
 *
 * Fecha última revisión 03-09-2018
 */

class Usuario{

    private $codUsuario;
    private $nombre;
    private $apellidos;
    private $password;
    private $perfil;
    private $email;
    private $web;

    //Declaración de los métodos getter

    /**
     * @return mixed
     */
    public function getCodUsuario(){
        return $this->codUsuario;
    }

    /**
     * @return mixed
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos(){
        return $this->apellidos;
    }

    /**
     * @return mixed
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPerfil(){
        return $this->perfil;
    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getWeb(){
        return $this->web;
    }

    //Declaración de los métodos setter

    /**
     * @param mixed $codUsuario
     */
    public function setCodUsuario($codUsuario){
        $this->codUsuario = $codUsuario;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password){
        $this->password = $password;
    }

    /**
     * @param mixed $perfil
     */
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email){
        $this->email = $email;
    }

    /**
     * @param mixed $web
     */
    public function setWeb($web){
        $this->web = $web;
    }

    function __construct($codUsuario, $nombre, $apellidos, $passwdord, $perfil, $email, $web) {
        $this->codUsuario = $codUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->password = $passwdord;
        $this->perfil = $perfil;
        $this->email = $email;
        $this->web = $web;
    }

    public static function validarUsuario($codUsuario,$password){
        $usuario=null;
        $arrayUsuario=UsuarioPDO::validarUsuario($codUsuario,$password); 
        if(!empty($arrayUsuario)) { 
            $usuario = new Usuario($codUsuario, $arrayUsuario['nombre'], $arrayUsuario['apellidos'], $password, $arrayUsuario['perfil'], $arrayUsuario['email'],$arrayUsuario['web']);
        } 
        return $usuario; 
    }

    public static function registrarUsuario($codUsuario,$nombre, $apellidos, $password,$perfil,$email,$web){
         $usuario=null;
         if(UsuarioPDO::registrarUsuario($codUsuario,$nombre, $apellidos, $password,$perfil,$email,$web)){
             $usuario=new Usuario($codUsuario,$nombre, $apellidos, $password,$perfil,$email,$web);
         }
         return $usuario;
    }

    public static function comprobarExisteUsuario($codUsuario){
        return UsuarioPDO::comprobarExisteUsuario($codUsuario);
    }

    public function editarUsuario($nombre, $apellidos, $password, $email, $web){
        $correcto=false; 
        $codUsuario = $this->getCodUsuario();
        if(empty($nombre)){
            $nombre = $this->getPassword();
        }
        if(empty($password)){
            $apellidos = $this->getApellidos();
        }
        if(empty($password)){
            $password=hash('sha256',$this->getPassword()); 
        }
        if(empty($email)){
            $email = $this->getEmail();
        }
        if(empty($web)){
            $web = $this->getWeb();
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

     public function borrarUsuario(){ 
        $correcto=false; 
        $codUsuario=$this->getCodUsuario(); 
        if (UsuarioPDO::eliminarUsuario($codUsuario)){ 
            $correcto=true; 
        } 
        return $correcto; 
    }

}
?>