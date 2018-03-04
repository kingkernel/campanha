<?php
/**+
Ultima alteração: 30/01/2018
**/
$menuup = new topmenu_campanha;

$pagina = new page_site;
	$card = new cardflip;
	$card->imgavatar =  PUBLICDIR ."images/avatar.jpg";
	$card->imgfundo = PUBLICDIR . "images/portico.jpg";
	$card->nomeuser = $_SESSION["userinfo"]["nome"];
	/*
	$card2 = new cardflip;
	$card2->imgavatar =  PUBLICDIR ."images/cavalo.jpg";
//	$card2->imgfundo = PUBLICDIR . "images/portico.jpg";
	$card2->nomeuser = $_SESSION["userinfo"]["nome"];
//	$card->textorotacao = "Resumo de trabalho";
	$card3 = new cardflip;
	$card3->imgavatar =  PUBLICDIR ."images/cao-sorrindo.jpg";
	$card3->nomeuser = $_SESSION["userinfo"]["nome"];
	$card3->imgfundo = PUBLICDIR . "images/capa2.jpg";
	*/
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
	$pagina->bodycontent = $menuup->html().$card->html()/*.$card2->html().$card3->html()*/."<br/><br/><br/><br/><br/>";
$pagina->render();
?>