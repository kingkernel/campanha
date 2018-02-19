<?php
class mobile {
	public function __construct(){
		if(!isset($_SESSION["logado"])){
			header("Location: /");
			echo "<script>document.reload();</script>";
		}

	}
	public function index(){
$menuup = new topmenu_campanha;

$pagina = new page_site;
	$card = new cardflip;
	$card->imgavatar =  PUBLICDIR ."images/avatar.jpg";
	$card->imgfundo = PUBLICDIR . "images/portico.jpg";
	$card->nomeuser = $_SESSION["userinfo"]["nome"];
	$card->textorotacao = "Resumo de trabalho";
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
	$pagina->bodycontent = $menuup->html().$card->html()."<br/><br/><br/><br/><br/>";
$pagina->render();
	echo '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.12&appId=1972064903046380&autoLogAppEvents=1\';
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script><div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>';
	}
}
?>