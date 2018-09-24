<?php
/**
 * File Usuario.php
 * @author Pablo Cidón
 *
 * Fichero del modelo en el que la clase realiza las operaciones en la base de datos.
 */
require_once 'DBPDO.php';

/**
 * Class UsuarioPDO
 */

class UsuarioPDO{

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

    public static function registrarUsuario($codUsuario, $nombre, $apellidos, $password, $perfil, $email, $web) {
        $registrado=false;
        $consulta="INSERT INTO Usuarios (CodUsuario,Nombre,Apellidos,Password,Perfil,Email,Web) VALUES (?,?,?,?,?,?,?)";
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$codUsuario,$nombre,$apellidos,$password,$perfil,$email,$web]);
        if ($resConsulta->rowCount()==1){
            $registrado=true;
        }
        return $registrado;
    }

    public static function comprobarExisteUsuario($codUsuario){
        $registrado=false;
        $consulta="Select * from Usuarios where CodUsuario=?";
        $resConsulta= DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
        if ($resConsulta->rowCount()==1){
            $registrado=true;
        }
        return $registrado;
    }

    public static function editarUsuario($nombre,$apellidos,$password,$email,$web,$codUsuario){
        $editado=false;
        $consulta="UPDATE Usuarios SET Nombre=?,Apellidos=?,Password=?,Email=?,Web=? WHERE CodUsuario=?";
        $resConsulta= DBPDO::ejecutaConsulta($consulta,[$nombre,$apellidos,$password,$email,$web,$codUsuario]);
        if ($resConsulta->rowCount()==1){
            $editado=true;
        }
        return $editado;
    }

    public static function eliminarUsuario($codUsuario){
        $eliminado=false;
        $consulta="delete from Usuarios where CodUsuario=?";
        DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
        if (UsuarioPDO::comprobarExisteUsuario($codUsuario)){
            $eliminado=true;
        }
        return $eliminado;
    }
}

?>


