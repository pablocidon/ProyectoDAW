<?php
/**
 * Operaciones en la base de datos.
 *
 * Fichero que establece la conexión a la base de datos y ejecuta las consultas sobre la misma.
 *
 * PHP Version 7.0.
 *
 * @category DBPDO
 * @package Modelo
 */

/**
 * Class DBPDO
 *
 * Operaciones en la base de datos.
 *
 * @author Pablo Cidón.
 * @copyright 09 de noviembre de 2018
 */
class DBPDO{
    /**
     * ejecutaConsulta($consultaSQL,$parametros).
     * Función para ejecutar cada una de las consultas en nuestra BD.
     *
     * @param string $consultaSQL Consulta que se va a llevar a cabo en nuestra BD.
     * @param array $parametros Parámetros que va a recibir la consulta que va a ser ejecutada.
     * @return bool|null|PDOStatement Devolverá 'true' o 'false' dependiendo de la consulta o 'null' si no hay resultados, o un elemento de la clase PDOStatement en el caso de que se produzca alguna excepción.
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