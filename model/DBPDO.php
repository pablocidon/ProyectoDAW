<?php
/**
 * File DBPDO.php
 * @author Pablo Cidón.
 *
 * Fichero que establece la conexión a la base de datos y ejecuta las consultas sobre la misma.
 */

/**
 * Class DBPDO
 * @author Pablo Cidón.
 *
 * Fecha última revisión 03-09-2018
 */
class DBPDO{
    /**
     * @param $consultaSQL
     * @param $parametros
     * @return bool|null|PDOStatement
     */
    public static function ejecutaConsulta($consultaSQL,$parametros){//Función que nos servirá para la ejecución de las consultas
        try{//Establecemos la conexión a la base de datos
            $miDB = new PDO(DATOSCONEXION, USER,PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($consultaSQL);//Preparamamos la consulta que será pasada como un parámetro
            $consulta->execute($parametros);//Ejecutamos la consulta con los parámetros
        }catch (PDOException $exception){//Si hay algún error
            $consulta=null;//Destruimos la consulta
            echo $exception->getMessage();
            unset($miDB);
        }
        return $consulta;//Resultado que nos devuelve la función.
    }
}
?>