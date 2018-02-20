<?php
class pagesError {
	public function __construct(){

	}
	public function E404(){
		$pagina =  new page_site;
			$menu = new topnav;
			$menu->brand = "Agenda Anubis";
			$mensagem = '<div class="jumbotron" style="padding:20px;margin:10px"><h1>Error 404</h1><p>Sua Solicitação não foi encontrada. Por favor tente novamente mais tarde ou reporte este bug ao criador do sistema.</p><p><a class="btn btn-primary btn-lg" href="/reportbug/">Avisar do Bug</a></p></div></div>';
		$image = '<img src="'.PUBLICDIR.'images/fail-404.jpg">';
		$pagina->bodycontent = $menu->html().$image.$mensagem;
		$pagina->render();
	}
}
?>