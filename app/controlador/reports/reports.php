<?php
class reports{
	public function __construct(){
		//$action = header("Location: /")."<script>documnent.reload();</script>";
		//Validate($action);
	}
	public function index(){
		$pagina = new page_site;
			$topmenu = new topmenu_campanha;
		$pagina->bodycontent = $topmenu->html();
		$pagina->render();
	}
	public function resumos(){
		/* 
		pegar primeiros o numero de cidades se houver.
		*/
		$resumo = new resumeReport;
		$resumo->bigtitle = "Cidades";
		$resumo->infoListText = "Cidades de visitadas";
		$resumo->getResume();
		$num = 1;
		foreach ($resumo->cidades as $key => $value) {
			$item[$num] = new resumeReportItem;
			$item[$num]->nome = $value;
			$item[$num]->barOverlayText = $value;
			$item[$num]->barSize = "100";
						array_push($resumo->reportItens, $item[$num]);
			$num++;
		}
		$bairros = new resumeReport;
		$bairros->bigtitle = "Bairros";
		$bairros->infoListText = "Bairros de visitados";
		$num = 1;
		foreach ($resumo->bairros as $key => $value) {
			$item[$num] = new resumeReportItem;
			$item[$num]->nome = $value;
			$item[$num]->barOverlayText = $value;
			$item[$num]->barSize = "100";
						array_push($bairros->reportItens, $item[$num]);
			$num++;
		}
	/*
		resumeReport Object ( [somacontent] => [total] => Array ( [total] => 4 ) [cidades] => Array ( [0] => [1] => Mazagão [2] => Santana ) [bairros] => Array ( [0] => [1] => Olaria [2] => laranjeiras [3] => REMEDIOS II ) [reportItens] => Array ( ) )
    */
		$pagina = new page_site;
			$topmenu = new topmenu_campanha;
		$pagina->bodycontent = $topmenu->html().$resumo->html().$bairros->html().'<br/><br/><br/>';
		$pagina->render();
	}
	public function porcidades(){
		$pagina = new page_site;
			$topmenu = new topmenu_campanha;

			$quantidade = new resumeReport;
			
		$pagina->bodycontent = $topmenu->html().'<br/><br/><br/>';
		$pagina->render();
	}
	public function porBairros(){
		$pagina = new page_site;
			$topmenu = new topmenu_campanha;
			$lista = new tableFilted;
			$lista->title = "Simpatizantes";
				$sql = 'call sp_sel_eleitores("'.$_SESSION["userinfo"]["idlicenca"].'", "'.$_SESSION["userinfo"]["id"].'")';
				$rows = new rowdataTable;
				$rows->dataSet = $sql;
				$search = ["nomeeleitor", "cidade", "bairro", "rua", "numero"];
				$replace = ["<strong>Simpatizante</strong>", "<strong>Cidade</strong>", "<strong>Bairro</strong>", "<strong>Rua</strong>", "<strong>Número</strong>"];
			$lista->rowsTable = str_replace($search, $replace, $rows->html());
		$pagina->headersinclude .= "<style>".$lista->css."</style>";
		$pagina->scriptsendpage = str_replace("@text", "Sem Resultados", $lista->js);
		$pagina->bodycontent = $topmenu->html().$lista->html().'<br/><br/><br/>';
		$pagina->render();
	}
}
?>