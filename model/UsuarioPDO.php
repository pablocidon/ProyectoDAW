<?php
/**
 * Operaciones sobre el objeto Usuario en la base de datos.
 *
 * Fichero del modelo en el que la clase realiza las operaciones en la base de datos.
 *
 * PHP Version 7.0
 *
 * @category Usuario
 * @package Modelo
 */
require_once 'DBPDO.php';

/**
 * Class UsuarioPDO
 *
 * Operaciones sobre el objeto Usuario en la base de datos.
 *
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018
 */

class UsuarioPDO{
    /**
     * validarUsuario($codUsuario, $password).
     *
     * Función para comprobar que un usuario existe y puede iniciar sesión.
     *
     * @param string $codUsuario Identificador del usuario para entrar.
     * @param string $password Contraseña del usuario para entrar.
     * @return array Devuelve un array con el elemento encontrado.
     */
    public static function validarUsuario($codUsuario, $password) {
        $consulta= "SELECT * from Usuarios where CodUsuario='".$codUsuario."' and Password=SHA2('".$password."',256)"; //Creacion de la consulta para los usuarios
        $arrayUsuarios=[]; //Creacion del array de usuarios
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario,$password]); //Ejecutamos la consulta
        if ($resConsulta->rowCount()==1){ //Comprobamos si se han obtenido resultados en la consulta
            $resFetch = $resConsulta->fetchObject(); 
            //Metemos los resultados de la consulta en el array
            $arrayUsuarios['nombre'] = $resFetch->Nombre;
            $arrayUsuarios['apellidos'] = $resFetch->Apellidos;
            $arrayUsuarios['perfil'] = $resFetch->Perfil;
            $arrayUsuarios['email'] = $resFetch->Email;
            $arrayUsuarios['web'] = $resFetch->Web;
        }
        return $arrayUsuarios;         
    }

    /**
     * registrarUsuario($codUsuario, $nombre, $apellidos, $password, $perfil, $email, $web)
     * Función para que un nuevo usuario se registre en el programa.
     *
     * @param string $codUsuario Identificador del usuario para iniciar sesión.
     * @param string $nombre Nombre del usuario o de la empresa.
     * @param string $apellidos Apellidos del usuario.
     * @param string $password Contraseña del usuario para iniciar sesión.
     * @param string $perfil Tipo de perfil del usuario, solamente puede ser 'Usuario' o 'Empresa'.
     * @param string $email Dirección de correo electrónico del usuario.
     * @param string $web Sitio web del usuario.
     * @return bool Devuelve 'True' o 1 en el caso de que sea registrado y si no 0 o 'false'.
     */
    public static function registrarUsuario($codUsuario, $nombre, $apellidos, $password, $perfil, $email, $web) {
        $registrado=false;
        $consulta="INSERT INTO Usuarios (CodUsuario,Nombre,Apellidos,Password,Perfil,Email,Web) VALUES (?,?,?,?,?,?,?)";
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario,$nombre,$apellidos,$password,$perfil,$email,$web]);
        if ($resConsulta->rowCount()==1){
            $registrado=true;
        }
        return $registrado;
    }

    /**
     * comprobarExisteUsuario($codUsuario).
     * Función para comprobar que un usuario ya existe.
     *
     * @param string $codUsuario Identificador del usuario a comprobar que existe.
     * @return bool En caso de que el usuario ya exista devolverá 1 o 'true', en el caso contrario devolverá 0 o 'false'.
     */
    public static function comprobarExisteUsuario($codUsuario){
        $registrado=false;
        $consulta="Select * from Usuarios where CodUsuario=?";
        $resConsulta= DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
        if ($resConsulta->rowCount()==1){
            $registrado=true;
        }
        return $registrado;
    }

    /**
     * editarUsuario($nombre,$apellidos,$password,$email,$web,$codUsuario)
     * Función para editar los datos de un usuario registrado.
     *
     * @param string $nombre Nuevo nombre que va a recibir el usuario.
     * @param string $apellidos Nuevos apellidos que va a recibir el usuario.
     * @param string $password Nueva contraseña que va a tener el usuario.
     * @param string $email Nueva dirección de correo que tendrá el usuario.
     * @param string $web Nuevo sitio web que va a tener el usuario.
     * @param string $codUsuario Identificador del usuario sobre el que se van a realizar los cambios.
     * @return bool En el caso de que se apliquen los cambios devolverá 1 o 'true', de lo contrario devolverá 0 o 'false'.
     */
    public static function editarUsuario($nombre,$apellidos,$password,$email,$web,$codUsuario){
        $editado=false;
        $consulta="UPDATE Usuarios SET Nombre=?,Apellidos=?,Password=?,Email=?,Web=? WHERE CodUsuario=?";
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$nombre,$apellidos,$password,$email,$web,$codUsuario]);
        if ($resConsulta->rowCount()==1){
            $editado=true;
        }
        return $editado;
    }

    /**
     * eliminarUsuario($codUsuario).
     * Función para que un usuario elimine su cuenta.
     *
     * @param string $codUsuario Identificador del usuario a eliminar.
     * @return bool Devuelve 1 o 'true' en el caso de que sea eliminado. De lo contrario devolverá 0 o 'false'.
     */
    public static function eliminarUsuario($codUsuario){
        $eliminado=false;
        $consulta="delete from Usuarios where CodUsuario=?";
        DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
        if (UsuarioPDO::comprobarExisteUsuario($codUsuario)){
            $eliminado=true;
        }
        return $eliminado;
    }

    public static function listarUsuarios(){
        $consulta= "SELECT * from Usuarios ORDER BY CodUsuario"; //Creacion de la consulta para los usuarios
        $arrayUsuarios=[]; //Creacion del array de usuarios
        $contador = 0;
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[]); //Ejecutamos la consulta
        if ($resConsulta->rowCount()>0){ //Comprobamos si se han obtenido resultados en la consulta
            while ($resFetch = $resConsulta->fetchObject()) {
                //Metemos los resultados de la consulta en el array
                $arrayUsuarios['codUsuario'] = $resFetch->CodUsuario;
                $arrayUsuarios['nombre'] = $resFetch->Nombre;
                $arrayUsuarios['apellidos'] = $resFetch->Apellidos;
                //$arrayUsuarios['password'] = $resFetch->Password;
                $arrayUsuarios['perfil'] = $resFetch->Perfil;
                $arrayUsuarios['email'] = $resFetch->Email;
                $arrayUsuarios['web'] = $resFetch->Web;
                $usuario[$contador] = $arrayUsuarios;
                $contador++;
            }
        }
        return $usuario;
    }
}

?>


