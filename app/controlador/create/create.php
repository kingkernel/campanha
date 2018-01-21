<?php
/*
Data criação: 16/01/2018
Última atualização: 16/01/2018
*/
class create {
	public function __construct(){
		$argumentos = explode("/", $_GET["urldigitada"]);
	}
	public function assessor(){
		$menuup = new topmenu_campanha;
		include(PATHMODELO."module/".get_class()."/"."index.php");
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
			$nome = new inputAddOn;
				$nome->inputPlaceholder = "Nome do Eleitor";
				$nome->inputIcon = "glyphicon glyphicon-user";
				$nome->inputName = "eleitor";

			$city = new inputAddOn;
				$city->inputPlaceholder = "Cidade";
				$city->inputIcon = "glyphicon glyphicon-globe";
				$city->inputName = "cidade";

			$bairro = new inputAddOn;
				$bairro->inputPlaceholder = "Bairro";
				$bairro->inputIcon = "glyphicon glyphicon-map-marker";
				$bairro->inputName = "bairro";

			$rua = new inputAddOn;
				$rua->inputPlaceholder = "Rua";
				$rua->inputIcon = "glyphicon glyphicon-road";
				$rua->inputName = "rua";

			$numero = new inputAddOn;
				$numero->inputPlaceholder = "Número";
				$numero->inputIcon = "glyphicon glyphicon-home";
				$numero->inputName = "numero";

			$email = new inputAddOn;
				$email->inputPlaceholder = "E-mail";
				$email->inputIcon = "glyphicon glyphicon-envelope";
				$email->inputName = "email";

			$fone1 = new inputAddOn;
				$fone1->inputPlaceholder = "Fone 1";
				$fone1->inputIcon = "glyphicon glyphicon-phone";
				$fone1->inputName = "fone1";

			$fone2 = new inputAddOn;
				$fone2->inputPlaceholder = "Fone 2";
				$fone2->inputIcon = "glyphicon glyphicon-phone";
				$fone2->inputName = "fone2";

			$zap = new inputAddOn;
				$zap->inputPlaceholder = "Whatsapp";
				$zap->inputIcon = "fa fa-whatsapp";
				$zap->inputName = "zap";

 			$face = new inputAddOn;
				$face->inputPlaceholder = "http://Facebook.com/<<seu_nome_ou_ID>>";
				$face->inputIcon = "fa fa-facebook-official";
				$face->inputName = "face";

		$hidden1 = '<input type="hidden" name="licenca" value="'.$_SESSION["userinfo"]["idlicenca"].'">';
		$submit = '<input type="submit" value="cadastrar" class="btn btn-primary pull-right" style="margin:10px" id="cadEleitorBtn">';

		$jsmask = '$("#id_'.$fone1->inputName.'").mask(\'(99) 99999-9999\');$("#id_'.$fone2->inputName.'").mask(\'(99) 99999-9999\');$("#id_'.$zap->inputName.'").mask(\'(99) 99999-9999\');';
		$jsmaskurl = '<script src="'.urlcss($_GET).'public/js/jquery.mask.js"></script>';
		$jsNotify = '<script src="'.urlcss($_GET).'public/js/bootstrap-notify.min.js"></script>';
		$animateCss = '<link src="'.urlcss($_GET).'public/css/animate.min.css" rel="stylesheet">';

		//$jsGravaEleitor = '$.notify({message: \'Hello World\' },{ type: \'danger\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'} });';
		$jsGravaEleitor = '$("#cadEleitorBtn").click(function(){
			var nome = $("#id_'.$nome->inputName.'").$val();
			alert(nome);
	//$.notify({message: \'Gravado com sucesso!\' },{ type: \'success\', delay: 2500,animate: {enter: \'animated fadeInDown\', exit: \'animated fadeOutUp\'} });	 
		});';

		$pagina->bodycontent = $menuup->html().'<div class="container"><div class="row"><form action="/grava/eleitor" method="post" onsubmit="javascript: return false;"><fieldset ><legend>Eleitor</legend>'.$nome->html().$city->html().$bairro->html().$rua->html().$numero->html().'</fieldset><fieldset><legend>Contato</legend>'.$email->html().$fone1->html().$fone2->html().$zap->html().$face->html().$hidden1.$submit.'</fieldset></form></div></div><div id="ajax"></div><br/>';
		$pagina->headersinclude .= fontawesome(urlcss($_GET)).$jsmaskurl.$animateCss.$jsNotify; // .="<style>".$teste->addcss."</style>";
		$pagina->scriptsendpage = $jsmask.$jsGravaEleitor;
		$pagina->render();
	}
}
?>