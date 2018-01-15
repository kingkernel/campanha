<?php
$pagina = new page_site;
	$card = new cardflip;
	$card->imgavatar =  PUBLICDIR ."images/avatar.jpg";
	$card->imgfundo = PUBLICDIR . "images/portico.jpg";
	$nav = new topnav;
		$admin_menu = new li_item;
		$admin_menu->text = "menu";

		$use_info = new li_user_info;
		$use_info->nomedisplay = "usuario";
	$nav->itensleft = [$admin_menu];
	$nav->itensright = [$use_info];
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
$pagina->bodycontent = $nav->html() . $card->html();
$pagina->render();
?>