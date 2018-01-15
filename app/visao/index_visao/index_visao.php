<?php
$pagina = new page_site;
$pagina->headersinclude .= '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">';
	$card = new cardshow;
	$card->imagemlogin = "https://scontent.ffor11-1.fna.fbcdn.net/v/t1.0-9/16730330_390279281364546_6063746844240914631_n.jpg?oh=eb7347d27f1864707b41ef50e8b16d79&oe=5AE7437B";
$pagina->bodycontent = $card->html();
$pagina->render();
?>