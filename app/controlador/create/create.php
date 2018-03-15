<?php
/*
Data criação: 16/01/2018
Última atualização: 15/03/2018

*/
class create {
	public $page;
	public function __construct(){
		auth::checkAuth();
		$page = new page_site;
		$menuup = new topmenu_campanha;
		$page->bodycontent = $menuup->html();
		$funcaoSuccess = 'function result0(){ $.notify({message: \'<span class="glyphicon glyphicon-ok"></span> <strong>Gravado com Sucesso!</strong><hr class="message-inner-separator"><p>A informação já se encontra online a todos usuários</p>\' },{ type: \'success\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'}, allow_dismiss:true }); $("#formAssessor")[0].reset(); };';
		$funcaoError = 'function result1(){ $.notify({message: \'<span class="glyphicon glyphicon-hand-right"></span> <strong>Erro de gravação</strong><hr class="message-inner-separator"><p>Não foi possivel adicionar os Dados. Tente novamente <span class=""></p>\' },{ type: \'danger\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'}, allow_dismiss:true }); $("#formAssessor")[0].reset(); };';
		
		$files = ["jquery.mask.js", "bootstrap-notify.min.js","animate.min.css"];
		$filesheader = includeFile($files, PUBLICDIR);

		$page->headersinclude .= fontawesome(urlcss($_GET)).implode('', $filesheader);
		$page->scriptsendpage = $funcaoSuccess.$funcaoError;

		$this->page = $page;
	}
	public function assessor(){
		$form = new assessorForms;

		$this->page->bodycontent .= '<div class="container"><div class="row"><fieldset ><legend>Lideranças </legend><form id="formAssessor" action="/grava/assessor/" method="post" onsubmit="javascript: return false;">'.$form->cadastroIn()[0].'</fieldset></div></div><div id="ajax">';

		$this->page->scriptsendpage .= $form->cadastroIn()[2];
		$this->page->render();
		echo "<br/></br/>";
	}
	public function eleitor(){
		$form = new eleitorForms;

		$files = ["jquery.mask.js", "bootstrap-notify.min.js","animate.min.css"];
		$filesheader = includeFile($files, PUBLICDIR);

		$this->page->bodycontent .= '<div class="container"><div class="row"><form id="formEleitor" action="/grava/eleitor" method="post" onsubmit="javascript: return false;"><fieldset ><legend>Simpatizantes </legend>'.$form->cadastroIn()[0].'</fieldset><fieldset><legend>Contato</legend>'.$form->cadastroIn()[1].'</fieldset></form></div></div><div id="ajax"></div><br/>';
		
		$this->page->headersinclude .= "<style>.white{color: white;}".$form->cadastroIn()[3].'</style>';
		
		$this->page->scriptsendpage .= $form->cadastroIn()[2];
		$this->page->render();
		echo "<br/></br/>";
	}
		public function caddata(){
		echo "bla bla bla";
	}
}
?>