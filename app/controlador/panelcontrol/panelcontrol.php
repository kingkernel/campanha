<?php
class panelcontrol{
	public function __construct(){

	}
	public function index(){
		$pagina = new page_site;		
			$cardlogin = new cardflip;
		$pagina->headersinclude .="<style>".$cardlogin->addcss."</style>";
		$pagina->scriptsendpage = $cardlogin->addjsend;
		$pagina->bodycontent = $cardlogin->html();
		$pagina->render();
	}
}
?>