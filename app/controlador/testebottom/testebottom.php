<?php
class testebottom{
	public function __construct(){

	}
	public function index(){
		$pagina = new page_site;
		$navbotton = new navbottom;
		$pagina->bodycontent = $navbotton->html();
		$pagina->render();
	}
}

?>