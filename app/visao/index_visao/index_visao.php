<?php
$pagina = new page_site;
	$card = new cardshow;
	$card->imagemlogin = PUBLICDIR ."images/avatar.jpg";
	$carousel = new carousel;
$pagina->bodycontent = $carousel->html().$card->html().;
$pagina->render();
?>