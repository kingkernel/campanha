<?php
class  messages {
	public function __construct(){

	}
	public function index(){
		$menuup = new topmenu_campanha;
		$pagina = new page_site;

			$messages = new panelMessages;
		$fontawesome = fontawesome(urlcss($_GET));
		$pagina->headersinclude .= $fontawesome;
		$pagina->bodycontent = $menuup->html().$messages->html();
		$pagina->render();
	}
	public function neweditor(){
		
	}
}
?>