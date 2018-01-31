<?php
class report{
	public function __construct(){

	}
	public function index(){
		$menuup = new topmenu_campanha;
		$pagina = new page_site;

		$resumo = new resumeReport;
		$pagina->bodycontent = $menuup->html().$resumo->html();
		$pagina->render();
	}
}
?>