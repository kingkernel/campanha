<?php
$pagina = new page_site;
	$card = new cardflip;
	$nav = new topnav;
	$nav->imgavatar = PUBLICDIR . "images/avatar-0.jpg";
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
$pagina->bodycontent = $nav->html() . $card->html();
$pagina->render();
?>