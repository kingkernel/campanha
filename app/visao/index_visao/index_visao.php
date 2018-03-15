<?php
$pagina = new page_site;
	$card = new cardshow;
	$card->imagemlogin = PUBLICDIR ."images/avatar.png";
	$card->formTitle = '<a href="/newcampanha/">Cadastrar-me</a>';
	$card->style = "success";
	$card->formFooter = '<a href="#">Esqueceu a senha?</a>';
	$thiscss = "this/this.css";
	$filesinclude = [$thiscss];
	$filesheader = includeFile($filesinclude, PUBLICDIR);
$pagina->headersinclude .= implode('', $filesheader);
$pagina->bodyextras = 'class="body_theme2"';
$pagina->bodycontent = $card->html();
$pagina->render();
?>