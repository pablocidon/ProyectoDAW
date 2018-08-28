 <?php
/**
 * File Usuario.php
 * @author Lucia Rodriguez Alvarez
 *
 * Fichero del modelo que crea los objetos de la clase usuario y usa sus métodos
 */
require_once 'UsuarioPDO.php';

/**
 * Class Usuario
 * @author Lucia Rodriguez Alvarez
 *
 * Fecha última revisión 18-04-2018
 */

class Usuario{
    //Definimos los atributos del objeto
    //Definimos los atributos del objeto
    /**
     * @var string $codUsuario     Código del usuario.
     */
    private $codUsuario;
    /**
     * @var string $descripcion     Descripción del usuario.
     */
    private $descripcion;
     /**
     * @var string $password     Descripción del usuario.
     */
    private $password;
     /**
     * @var string $password     Perfil del usuario.
     */
    private $perfil;
    /**
     * @var timestamp $ultimaConexion     Ultima Conexion del usuario.
     */
    private $ultimaConexion;
    /**
     * @var int $numVisitas     Ultima Numero visitas del usuario.
     */
    private $numVisitas;
    /**
     * @var timestamp   $fechaBajaUsuario  Fecha para las bajas lógicas de los Usuarios.
     */
    private $fechaBajaUsuario;
   
    //Definimos el constructor del objeto
    /**
     * Constructor de la clase Usuario.
     *
     * Función para construir el objeto de la clase usuario.
     *
     * @param string $codUsuario Código del usuario.
     * @param string $descripcion
     * @param string $password
     * @param string $perfil
     * @param timestamp $ultimaConexion
     * @param int $numVisitas
     */
    function __construct($codUsuario, $descripcion, $password, $perfil,$ultimaConexion,$numVisitas,$fechaBajaUsuario) {
        $this->CodUsuario = $codUsuario;
        $this->DescUsuario = $descripcion;
        $this->Password = $password;
        $this->Perfil = $perfil;
        $this->UltimaConexion=$ultimaConexion;
        $this->NumeroAccesos=$numVisitas;
        $this->FechaBajaUsuario=$fechaBajaUsuario;
    }
    
    /**
     * Funcion para validar el usuario, 
     * @author : Lucia Rodríguez Álvarez
     * @param : string $codUsuario, string $password
     * @return object Usuario
     **/
    public static function validarUsuario($codUsuario,$password){
        $usuario=null;
        $arrayUsuario=UsuarioPDO::validarUsuario($codUsuario,$password); 
        if(!empty($arrayUsuario)) { 
            $usuario = new Usuario($codUsuario, $arrayUsuario['descripcion'], $password, $arrayUsuario['perfil'], $arrayUsuario['ultimaConexion'],$arrayUsuario['numVisitas'],$arrayUsuario['fechaBajaUsuario']); 
        } 
        return $usuario; 
    }
    
    /**
     * @function buscarDepartamentoPorCodigo($codDepartamento).
     *
     * Función para buscar un departamento por su código.
     *
     * @param string $codDepartamento Código del departamento a buscar.
     *
     * @return Departamento|null Dependiendo de si se ha encontrado ese registro en la base de datos.
     */
    public static function buscarUsuarioPorCodigo($codUsuario){
        $usuario = null;
        $arrayUsuario = UsuarioPDO::buscarUsuarioPorCodigo($codUsuario);
        if(!empty($arrayUsuario)){
            $usuario = new Usuario($arrayUsuario['Codigo'],$arrayUsuario['Descripcion'],$arrayUsuario['Password'],$arrayUsuario['perfil'],$arrayUsuario['UltimaConexion'],$arrayUsuario['NumeroAccesos'],$arrayUsuario['FechaBajaUsuario']);
        }
        return $usuario;
    }
    
    /**
     * Funcion para el resgistro de usuario
     * @author : Lucia Rodríguez Álvarez
     * @param : string $codUsuario, string $password, string $descripcion
     * @return object Usuario
     **/
    public static function registrarUsuario($codUsuario,$password,$descripcion){
         $usuario=null;
         if(UsuarioPDO::registrarUsuario($codUsuario,$password,$descripcion)){
             $usuario=new Usuario($codUsuario,$descripcion,$password,"Usuario",null,0);
         }
         return $usuario;
    }
    
    /**
     * Funcion que comprueba si existe el usuario
     * @author : Lucia Rodríguez Álvarez
     * @param : string $codUsuario, string $password
     * @return object Usuario
     **/
    public static function comprobarExisteUsuario($codUsuario){
       
        return UsuarioPDO::comprobarExisteUsuario($codUsuario);

    }
    
    
    
    
    
    /**
     * Funcion editar los datos de un usuario
     * @author : Lucia Rodríguez Álvarez
     * @param : string $password, string $descripcion
     * @return boolean true en caso de que se edite y false en caso contrario
     **/
    public function editarUsuario($descripcion, $password){ 
        $correcto=false; 
        $codUsuario=$this->getCodUsuario(); 
        if(empty($password)){ //Si no se ha puesto contraseña se guarda la que ya esta
            $password=hash('sha256',$this->getPassword()); 
        } 
        if(UsuarioPDO::editarUsuario($descripcion,$password,$codUsuario)){ 
            $this->setDescripcion($descripcion); 
            $this->setPassword($password); 
            $correcto=true; 
        } 
        return $correcto; 
    }
    
    /**
     * Funcion editar los datos de un usuario
     * @author : Lucia Rodríguez Álvarez
     * @param : string $password, string $descripcion
     * @return boolean true en caso de que se edite y false en caso contrario
     **/
    public function editarPerfilUsuario($descripcion, $perfil, $codUsuario){ 
        $correcto=false; 
        //$codUsuario=$this->getCodUsuario(); 
       
        if(UsuarioPDO::editarPerfilUsuario($descripcion,$perfil,$codUsuario)){ 
           // $this->setDescripcion($descripcion); 
           // $this->setPerfil($perfil); 
            $correcto=true; 
        } 
        return $correcto; 
    }
    
    /**
     * Funcion que actualiza el numero de accesos
     * @author : Lucia Rodríguez Álvarez
     * @param : string $codUsuario
     * @return object Usuario
     **/   
   /* public static function actualizarAccesos($codUsuario){
        return UsuarioPDO::actualizarAccesos($codUsuario);
    }*/
    
    /**
     * Funcion que actualiza el numero de accesos y la fecha de ultima conexion
     * @author : Lucia Rodríguez Álvarez
     **/
    public function UltimaConexionyAcceso(){ 
        UsuarioPDO::UltimaConexion($this->CodUsuario); 
        UsuarioPDO::AumentarAccesos($this->CodUsuario); 
    }
    
    /**
     * Funcion que permite borrar los datos de un usuario
     * @author : Lucia Rodríguez Álvarez
     **/
     public function borrarUsuario(){ 
        $correcto=false; 
        $codUsuario=$this->getCodUsuario(); 
        if (UsuarioPDO::eliminarUsuario($codUsuario)){ 
            $correcto=true; 
        } 
        return $correcto; 
    }
    
    /**
     * @function bajaUsuario($codUsuario).
     *
     * Función para eliminar un departamento de nuestra base de datos.
     *
     * @param string $codUsuario Código del departamento a eliminar.
     * @return bool Devuelve 0 si no se ha eliminado o 1 si se ha eliminado.
     */
    public function bajaUsuario ($codUsuario){
        return UsuarioPDO::bajaUsuario($codUsuario);
    }

    /**
     * Función para obtener la Descripcion del Usuario.
     *
     * @return string $DescUsuario Descripcion del Usuario.
     */
    public function getDescripcion() {
        return $this->DescUsuario;
    }
    
    /**
     * Función para obtener la contraseña del Usuario.
     *
     * @return string $password Contraseña del Usuario.
     */
    public function getPassword() {
        return $this->Password;
    }

     /**
     * Función para obtener el codigo del Usuario.
     *
     * @return string $codUsuario Contraseña del Usuario.
     */
    public function getCodUsuario() {
       return $this->CodUsuario;
   }

   /**
     * Función para obtener el Perfil del Usuario.
     *
     * @return string $perfil Perfil del Usuario.
     */

    public function getPerfil() {
       return $this->Perfil;
   }
   
   /**
     * Función para obtener la ultima conexion del Usuario.
     *
     * @return string $ultimaConexion Ultima Conexion del Usuario.
     */
   
   public function getUltimaConexion() {
       return $this->UltimaConexion;
   }
   
   /**
     * Función para cambiar la ultima conexion del usuario
     *
     * @param string $ultimaConexion ultima conexion del usuario
     */
   
   public function setUltimaConexion($ultimaConexion){ 
        $this->UltimaConexion = $ultimaConexion; 
    } 
   
     /**
     * Función para obtener el Numero de Accesos del Usuario.
     *
     * @return int $numVisitas Numero de Accesos del Usuario.
     */
   public function getNumeroAccesos() {
       return $this->NumeroAccesos+1;
   }
   
   /**
     * Función para cambiar el numero de accesos del usuario
     *
     * @param int $numVisitas numero de accesos del usuario
     */
   public function setNumeroAccesos($numVisitas){ 
        $this->NumeroAccesos = $numVisitas; 
    } 
  
    /**
     * Función para cambiar el codigo del usuario
     *
     * @param string $codUsuario numero de accesos del usuario
     */
    function setCodUsuario($codUsuario) {
        $this->CodUsuario = $codUsuario;
    }
    
    /**
     * Función para cambiar la descripcion del usuario
     *
     * @param string $descripcion descripcion del usuario
     */
    function setDescripcion($descripcion) {
        $this->DescUsuario = $descripcion;
    }
    
    /**
     * Función para cambiar la contraseña del usuario
     *
     * @param string $password contraseña del usuario
     */
    function setPassword($password) {
        $this->Password = $password;
    }

    /**
     * Función para cambiar el perfil del usuario
     *
     * @param string $perfil perfil del usuario
     */
    function setPerfil($perfil) {
        $this->Perfil = $perfil;
    }
    
    public function getFechaBajaUsuario()
    {
        return $this->FechaBajaUsuario;
    }
    
    public function setFechaBajaUsuario($fechaBajaUsuario){
        $this->FechaBajaUsuario = $fechaBajaUsuario;
    }
   
    public static function contarUsuariosPorDescripcion ($descripcion){
        return UsuarioPDO::contarUsuariosPorDescripcion($descripcion);
    }
    
    public static function buscarUsuarioDescripcion ($descripcion,$pagina,$registro){
        $arrayUsuarios = null;
        if(is_null($pagina)){
            $pagina = 1;
        }
        $usuario = UsuarioPDO::buscarUsuarioDescripcion($descripcion, $pagina, $registro);
        if(!empty($usuario)){
            for($i=0;$i<count($usuario);$i++){
                $arrayUsuarios[$i] = new Usuario($usuario[$i]['Codigo'],$usuario[$i]['Descripcion'],$usuario[$i]['Password'],$usuario[$i]['Perfil'],$usuario[$i]['UltimaConexion'],$usuario[$i]['NumeroAccesos'],$usuario[$i]['FechaBajaUsuario']);
            }
        }
        return $arrayUsuarios;
    }
    
    public function bajaLogicaUsuario ($fechaBaja, $codUsuario){
        return UsuarioPDO::bajaLogicaUsuario($fechaBaja,$codUsuario);
    }
    
    public function rehabilitarUsuario ($codUsuario){
        return UsuarioPDO::rehabilitarUsuario($codUsuario);
    }

}
?>