<?php
$pagina = new page_site;
	$card = new cardshow;
	$card->imagemlogin = PUBLICDIR ."images/avatar.jpg";
	/*
	$carousel = new carousel;
	$topmenu = new topnav;
	$topmenu->brand = "Agenda Anubis";
	$topmenu->estilo = "inverse";
		$item1 = new li_dropdown;
		$item1->text = "Conheça";
			$subitem1 = new li_item;
			$subitem1->text = "Funções";
			$subitem2 = new li_item;
			$subitem2->text = "Licença";
		$item1->subitem = [$subitem1, $subitem2];
	$topmenu->itensleft = [$item1];
	*/
$pagina->bodycontent = /*$topmenu->html().$carousel->html2().*/$card->html();
$pagina->render();
?>