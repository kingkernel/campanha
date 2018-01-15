<?php
class index {
	public function __construct(){
		
	}
	public function index(){
		if (!isset($_SESSION["LOGADO"])){
		include_once(PATHMODELO . get_class() ."_modelo/". get_class()."_modelo.php");
		} else {
			include_once(PATHMODELO . get_class() ."_modelo/". get_class()."_modelo_logado.php");
		};
	}
}
?>