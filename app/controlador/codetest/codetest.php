<?php
class codetest{
	public function index(){
		$leia = new importTreFile;
		//$leia->file = "votacao_candidato_munzona_2010_AP.txt";
		//$leia->file = "detalhe_votacao_munzona_2010_AP.txt";
		$leia->file = "votacao_partido_munzona_2010_AP.txt";
		//$leia->decomp();
		$leia->partido_munzona_2010 ("partido_munzona_2010");
		
		//"eleicoes2010"
	}
}
?>