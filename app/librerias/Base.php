<?php
/**
 * Clase Base para conexión a Base de
 * datos y ejecutar consultas con 
 * PDO
 */
class base{

	private $host        = HOST;
	private $usuario     = USER;
	private $password    = PASSWORD;
	private $nombre_base = DBNAME;

	private $dbh; //Database Handler
	private $stmt; //Statemen
	private $error;

	public function __construct(){
		//Configurar la conexion
		$dsn = 'mysql:host='. $this->host. ';dbname='.$this->nombre_base;
		$opciones=array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
		);
		//Instancia PDO para generar conexion
		try {
			$this->dbh=new PDO($dsn, $this->usuario,$this->password, $opciones);
			$this->dbh->exec('set names utf8');
			
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
			echo $this->error;
		}
	}
	//preparamos la consulta
	public function query($sql){
		$this->stmt = $this->dbh->prepare($sql);
	}
	//Vinculamos la consulta
	public function bind($parametro, $valor, $tipo = null){
		if (is_null($tipo)) {
			switch (true) {
				case is_int($valor):
					$tipo = PDO::PARAM_INT;
					break;
				case is_bool($valor):
					$tipo = PDO::PARAM_BOOL;
					break;
				case is_null($valor):
					$tipo = PDO::PARAM_NULL;
					break;
				default:
					$tipo = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($parametro,$valor,$tipo);
	}
	//Ejecutamos la consulta
	public function execute(){
		return $this->stmt->execute();
	}
	//Obtener consulta
	public function registros(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}//obtener un registro
	public function registro(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}//obtener una cantidad de filas con row count
	public function rowCount(){
		return $this->stmt->rowCount();
	}
}
?>