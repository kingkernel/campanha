<?php
$pagina = new page_site;
$pagina->headersinclude .= '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">';
	$card = new cardshow;
$pagina->bodycontent = $card->html();
$pagina->render();
?>