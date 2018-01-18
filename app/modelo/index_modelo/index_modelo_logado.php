<?php
$menuup = new topmenu_campanha;
$pagina = new page_site;
	$card = new cardflip;
	$card->imgavatar =  PUBLICDIR ."images/avatar.jpg";
	$card->imgfundo = PUBLICDIR . "images/portico.jpg";
	
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
$pagina->bodycontent = $menuup->html() . $card->html();
$pagina->render();
?>