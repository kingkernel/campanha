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
		$pagina= new page_site;
		$menuup = new topmenu_campanha;

		$pagina->scriptsendpage ='CKEDITOR.replace(\'editor1\');';
		$pagina->bodycontent = $menuup->html().'<div style="margin:20px"><textarea name="editor1" id="editor1"></textarea><script type="text/javascript" src="'.PUBLICDIR.'3ptn/ckeditor/ckeditor.js"></script></div><div name="controls" style="margin:20px"><button class="btn btn-primary">Enviar</button></div>'."<br/><br/><br/><br/><br/>";
		$pagina->render();
		
	}
}
?>