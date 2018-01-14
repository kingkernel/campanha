<?php
$pagina = new page_site;
	$card = new cardshow;
$pagina->bodycontent = $card->html();
$pagina->render();
?>