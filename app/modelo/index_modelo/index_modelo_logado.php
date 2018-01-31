<?php
/**
Ultima alteração: 30/01/2018
**/
$menuup = new topmenu_campanha;

$pagina = new page_site;
	$card = new cardflip;
	$card->imgavatar =  PUBLICDIR ."images/avatar.jpg";
	$card->imgfundo = PUBLICDIR . "images/portico.jpg";
	$card->nomeuser = "";
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
$pagina->bodycontent = $menuup->html() . $card->html();
$pagina->render();
?>