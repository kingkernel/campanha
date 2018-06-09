<?php
class codetest{
	public function index(){
		$leia = new importTreFile;
		$leia->file = "votacao_candidato_munzona_2010_AP.txt";
		$leia->votacao_candidato_munzona("eleicoes2010");
	}
}
?>