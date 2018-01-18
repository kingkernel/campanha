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
				$face->inputPlaceholder = "Facebook";
				$face->inputIcon = "fa fa-facebook-official";
				$face->inputName = "face";

		$hidden1 = '<input type="hidden" name="licenca" value="">'; 
		$submit = '<input type="submit" value="cadastrar" class="btn btn-primary pull-right" style="margin:10px">';

		$pagina->bodycontent = $menuup->html().'<div class="container"><div class="row"><form action="/grava/eleitor" method="post"><fieldset ><legend>Eleitor</legend>'.$nome->html().$city->html().$bairro->html().$rua->html().$numero->html().'</fieldset><fieldset><legend>Contato</legend>'.$email->html().$fone1->html().$fone2->html().$zap->html().$face->html().$hidden1.$submit.'</fieldset></form></div></div>';
		$pagina->headersinclude .= fontawesome(urlcss($_GET)); // .="<style>".$teste->addcss."</style>";
		$pagina->render();
	}
}
?>