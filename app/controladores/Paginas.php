<?php
class Paginas Extends Controlador{

	public function __construct(){

	}
	public function index(){

		$datos=[
			'titulo' => 'Bienvenidos a mvc'
		];

		$this->vista('paginas/index',$datos);
	}
}
?>