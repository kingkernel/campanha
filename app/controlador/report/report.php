<?php
class report{
	public function __construct(){

	}
	public function index(){
		$menuup = new topmenu_campanha;
		$pagina = new page_site;

		$resumo = new resumeReport;
		
		$resumo->getResume();
			$item1 = new resumeReportItem;
				$item1->nome = "cidade 1";
				$item1->id = "sharp";
			$item2 = new resumeReportItem;
				$item2->nome = "cidade 2";
				$item2->progressColor = "primary";
			$item3 = new resumeReportItem;
				$item3->nome = "cidade 3";
				$item3->progressColor = "danger";
		$resumo->reportItens = [$item1, $item2, $item3];
		
		$pagina->bodycontent = $menuup->html().$resumo->html()."<br/><br/><br/><br/><br/>";
		$endjs = '$("#sharp").hover(function(){$(this).addClass("active")}, function(){$(this).removeClass("active")});';
		$pagina->scriptsendpage = $endjs;
		$pagina->render();

	}
}
?>