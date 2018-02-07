<?php
$pagina = new page_site;
	$card = new cardshow;
	$card->imagemlogin = PUBLICDIR ."images/avatar.jpg";
$pagina->headersinclude .= '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">';
$pagina->bodycontent = $card->html();
$pagina->render();
?>