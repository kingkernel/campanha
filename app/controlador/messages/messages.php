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
		$pagina->bodycontent = $menuup->html().'<legend style="padding:20px">Mensagens</legend><select style="margin-left: 20px"><option>nome pessoa</option><option>nome 2 pessoa</option></select><div style="margin:20px"><form action="post/" method="POST"><textarea name="editor1" id="editor1"></textarea><script type="text/javascript" src="'.PUBLICDIR.'3ptn/ckeditor/ckeditor.js"></script></div><div name="controls" style="margin:20px"><button id="msgbtn" class="btn btn-primary">Enviar</button></form></div>'."<br/><br/><br/><br/><br/><div id=\"result\"></div>";
		$js = '$("#msgbtn").click(function(){ var content = $("#editor1").val(); alert(content + "ola");});';
		$pagina->scriptsendpage .= $js;
		$pagina->render();
		
	}
	public function post(){
		print_r($_POST);
	}
}
?>