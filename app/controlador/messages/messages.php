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
		$pagina->bodycontent = $menuup->html().'<legend style="padding:20px">Mensagens</legend><select style="margin-left: 20px"><option>nome pessoa</option><option>nome 2 pessoa</option></select><div style="margin:20px"><form action="post/" method="POST" onsubmit="return false;"><textarea name="editor1" id="editor1"></textarea><script type="text/javascript" src="'.PUBLICDIR.'3ptn/ckeditor/ckeditor.js"></script></div><div name="controls" style="margin:20px"><button id="msgbtn" class="btn btn-primary">Enviar</button></form></div>'."<div id=\"result\"></div><br/><br/><br/><br/><br/>";
		$js = '$("#msgbtn").click(function(){ var content = CKEDITOR.instances.editor1.getData(); alert(content + "ola"); $("#result").load("./post/", {a:content} )});';
		$pagina->scriptsendpage .= $js;
		$pagina->render();
		
	}
	public function post(){
		print_r($_POST);
	}
}
?>