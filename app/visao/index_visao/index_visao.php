<?php
$pagina = new page_site;
	$card = new cardshow;
	$card->imagemlogin = "https://scontent.ffor11-1.fna.fbcdn.net/v/t1.0-9/16730330_390279281364546_6063746844240914631_n.jpg?oh=eb7347d27f1864707b41ef50e8b16d79&oe=5AE7437B";
	$sidemenu = new sidemenu;
	$sidemenu->titleSide = "Meu Sistema";
	$sidemenu->titleIcon = '<span class="glyphicon glyphicon-home"></span>';
	$sidemenu->intern = $card->html();
$pagina->headersinclude .= '<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">'.'<style>'.$sidemenu->addcss.'</style>';
$pagina->bodycontent = $sidemenu->html();
$pagina->render();
?>
