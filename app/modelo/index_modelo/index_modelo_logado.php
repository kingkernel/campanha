<?php
$pagina = new page_site;
	$card = new cardflip;
	$card->imgavatar =  "public/images/avatar.jpg";
	$nav = new topnav;
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
$pagina->bodycontent = $nav->html() . $card->html();
$pagina->render();
?>