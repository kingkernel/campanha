<?php
$pagina = new page_site;
	$card = new cardshow;
	$card->imagemlogin = PUBLICDIR ."images/avatar.jpg";
$pagina->bodycontent = $card->html();
$pagina->render();
?>