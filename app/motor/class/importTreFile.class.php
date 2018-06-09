<?php

class importTreFile{
	public $file;

	public function __construct(){

	}
	public function decomp(){
		$linhas = utf8_encode(file_get_contents($this->file));
		$linhas = explode("\n", $linhas);
		foreach ($linhas as $key => $value) {
			$go = explode(";", $value);
			//$go = implode(", ", $go);
			print_r($go)."<br/>";
		}
		//print_r($linhas);
		//echo "<h1>$linhas</h1>";
	}
	public function votacao_candidato_munzona($tabela){
		$sql = 'insert into '.$tabela .' (DATA_GERACAO, HORA_GERACAO, ANO_ELEICAO, NUM_TURNO, DESCRICAO_ELEICAO, SIGLA_UF, SIGLA_UE, CODIGO_MUNICIPIO, NOME_MUNICIPIO, NUMERO_ZONA, CODIGO_CARGO, NUMERO_CAND, SQ_CANDIDATO, NOME_CANDIDATO, NOME_URNA_CANDIDATO, DESCRICAO_CARGO, COD_SIT_CAND_SUPERIOR, DESC_SIT_CAND_SUPERIOR, CODIGO_SIT_CANDIDATO, DESC_SIT_CANDIDATO, CODIGO_SIT_CAND_TOT, DESC_SIT_CAND_TOT, NUMERO_PARTIDO, SIGLA_PARTIDO, NOME_PARTIDO, SEQUENCIAL_LEGENDA, NOME_COLIGACAO, COMPOSICAO_LEGENDA, TOTAL_VOTOS) values ';
		$linhas = utf8_encode(file_get_contents($this->file));
		$linhas = explode("\n", $linhas);
		$n = 0;
		foreach ($linhas as $key => $value) {
			if($n >= 499){ fastquery("commit");} 
			else{
				$go = explode(";", $value);
				//$go = implode(", ", $go);
				$valores = implode(", ", $go);
				$query = $sql . "(".$valores .");";
				fastquery($query);
			};
			$n++;
		}

	}
}
?>