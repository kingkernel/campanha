<?php
/*
Data criação: 16/01/2018
Última atualização: 16/01/2018
*/
class create {
	public function __construct(){
		auth::checkAuth();
	}
	public function assessor(){
		$menuup = new topmenu_campanha;
		$pagina = new page_site;

		$form = new assessorForms;

		$pagina->bodycontent = $menuup->html().'<div class="container"><div class="row"><fieldset ><legend>Acessores </legend><form id="formEleitor" action="/grava/eleitor" method="post" onsubmit="javascript: return false;">'.$form->cadastroIn()[0].'</fieldset></div></div><div id="ajax">';

		$pagina->render();
	/*

		$funcaoSuccess = 'function result0(){ $.notify({message: \'<span class="glyphicon glyphicon-ok"></span> <strong>Gravado com Sucesso!</strong><hr class="message-inner-separator"><p>A informação já se encontra online a todos usuários</p>\' },{ type: \'success\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'}, allow_dismiss:true }); $("#formEleitor")[0].reset(); };';
		$funcaoError = 'function result1(){ $.notify({message: \'<span class="glyphicon glyphicon-hand-right"></span> <strong>Erro de gravação</strong><hr class="message-inner-separator"><p>Não foi possivel adicionar os Dados. Tente novamente <span class=""></p>\' },{ type: \'danger\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'}, allow_dismiss:true }); $("#formEleitor")[0].reset(); };';
		$pagina->bodycontent = $menuup->html().'<div class="container"><div class="row"><form id="formEleitor" action="/grava/eleitor" method="post" onsubmit="javascript: return false;"><fieldset ><legend>Eleitor</legend>'.$form->cadastroIn()[0].'</fieldset><fieldset><legend>Contato</legend>'.$form->cadastroIn()[1].'</fieldset></form></div></div><div id="ajax"></div><br/>';
		$pagina->headersinclude .= fontawesome(urlcss($_GET)).$jsmaskurl.$animateCss.$jsNotify. "<style>.white{color: white;};</style>";//.$teste->addcss."</style>";
		$pagina->scriptsendpage = $form->cadastroIn()[2].$funcaoSuccess.$funcaoError;

		$pagina->render();
		//print_r($pagina);
		//print_r(get_class_methods($pagina));

		//include(PATHMODELO."module/".get_class()."/"."index.php");
	*/
	}
	public function caddata(){
		echo "bla bla bla";
	}
	public function eleitor(){
		$menuup = new topmenu_campanha;
		/*
		$teste = new sidemenu;
		$teste->titleSide = "Vereador";
		$teste->titleIcon = '<span class="glyphicon glyphicon-thumbs-up"></span>';
		*/
		$pagina = new page_site;

		$jsmaskurl = '<script src="'.urlcss($_GET).'public/js/jquery.mask.js"></script>';
		$jsNotify = '<script src="'.urlcss($_GET).'public/js/bootstrap-notify.min.js"></script>';
		$animateCss = '<link src="'.urlcss($_GET).'public/css/animate.min.css" rel="stylesheet">';

		//$jsGravaEleitor = '$.notify({message: \'Hello World\' },{ type: \'danger\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'} });';
		$form = new eleitorForms;

		$funcaoSuccess = 'function result0(){ $.notify({message: \'<span class="glyphicon glyphicon-ok"></span> <strong>Gravado com Sucesso!</strong><hr class="message-inner-separator"><p>A informação já se encontra online a todos usuários</p>\' },{ type: \'success\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'}, allow_dismiss:true }); $("#formEleitor")[0].reset(); };';
		$funcaoError = 'function result1(){ $.notify({message: \'<span class="glyphicon glyphicon-hand-right"></span> <strong>Erro de gravação</strong><hr class="message-inner-separator"><p>Não foi possivel adicionar os Dados. Tente novamente <span class=""></p>\' },{ type: \'danger\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'}, allow_dismiss:true }); $("#formEleitor")[0].reset(); };';
		$pagina->bodycontent = $menuup->html().'<div class="container"><div class="row"><form id="formEleitor" action="/grava/eleitor" method="post" onsubmit="javascript: return false;"><fieldset ><legend>Eleitor</legend>'.$form->cadastroIn()[0].'</fieldset><fieldset><legend>Contato</legend>'.$form->cadastroIn()[1].'</fieldset></form></div></div><div id="ajax"></div><br/>';
		$pagina->headersinclude .= fontawesome(urlcss($_GET)).$jsmaskurl.$animateCss.$jsNotify. "<style>.white{color: white;};</style>";//.$teste->addcss."</style>";
		$pagina->scriptsendpage = $form->cadastroIn()[2].$funcaoSuccess.$funcaoError;
		$pagina->render();
	}
}
?>