<?php
/**
 * Cargamos todas las librerias
 */
require_once 'config/configuracion.php';
// require_once 'librerias/Base.php';
// require_once 'librerias/Controlador.php';
// require_once 'librerias/Core.php';
//Autoload.php
spl_autoload_register(function($nombreClase){
	require_once 'librerias/'.$nombreClase.'.php';
});
/**
 * Se crea una instancia de la clase Controlador.
 */
/**
 * [$iniciar description]
 * @var Core
 */
$iniciar = new Core();

?>