<?php
class Conexion{
public static function Conectar(){
	defined('servidor')or define('servidor','localhost');
	defined('nombre_bd')or define('nombre_bd','coffe');
	defined('usuario')or define('usuario','root');
	defined('password')or define('password','');
$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

  try{
  $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);	
	
  return $conexion;
}catch (Exception $e){
	die("Error de Conexion es: ". $e->getMessage());
   }
  }
}
?>