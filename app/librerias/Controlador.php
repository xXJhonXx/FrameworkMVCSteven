<?php
/**
 * Controlador principal
 * Se utiliza para cargar las vistas y los modelos
 */
class  Controlador {
/**
 * Metodo para cargar el modelo
 */
	public function modelo($modelo){
		if(file_exists("../app/modelos/".$modelo.".php")){
                require_once("../app/modelos/".$modelo.".php");
                return new $modelo();
            }else{
                die("no existe el archivo");
            }
        }
	public function vista($vista,$datos=[]){
		/**
		 * Verificar si existe
		 */
		if (file_exists('../app/vistas/'.$vista.'.php')) {
			require_once '../app/vistas/'.$vista.'.php';
		}else{
			/**
			 * Si no existe el archivo enviara un error
			 */
			die('<center><p style="font-size: 120px; margin-top:120px;">Error: El archivo de la vista no existe</p></center>');
		}
	}
}
?>