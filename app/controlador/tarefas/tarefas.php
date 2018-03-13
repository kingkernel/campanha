<?php
class tarefas {
	public $page;
	public function __construct(){
		$pagina = new page_site;
		$pagina->headersinclude .= fontawesome(urlcss($_GET));
			$topmenu = new topmenu_campanha;
		$pagina->bodycontent = $topmenu->html();
		$this->page = $pagina;
	}
	public function index(){
		$this->page->bodycontent .='<div class="jumbotron">tarefas !!!</div>';
		$this->page->render();
	}
	public function novatarefa(){
		$form = new formsTarefas;
		$this->page->bodycontent .= $form->addtarefa();
		$this->page->render();
	}
}
?>