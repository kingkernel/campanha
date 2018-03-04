<?php
class user {
	public function __construct(){

	}
	public function index(){
		echo 'NÃO TROLA!!';
	} 
	public function update(){
		$pagina = new page_site;
		$pagina->render();
	}
}
?>