<?php
class grava{
	public function __construct(){

	}
	public function eleitor(){
		if(!isset($_POST["bairro"])){$_POST["bairro"]="";};
		if(!isset($_POST["rua"])){$_POST["rua"]="";};
		if(!isset($_POST["numero"])){$_POST["numero"]="";};
		if(!isset($_POST["email"])){$_POST["email"]="";};
		if(!isset($_POST["fone1"])){$_POST["fone1"]="";};
		if(!isset($_POST["fone2"])){$_POST["fone2"]="";};
		if(!isset($_POST["zap"])){$_POST["zap"]="";};
		if(!isset($_POST["face"])){$_POST["face"]="";};

		$eleitor = $_POST["eleitor"];
		$cidade = $_POST["cidade"];
		$bairro = $_POST["bairro"];
		$rua = $_POST["rua"];
		$numero = $_POST["numero"];
		$email = $_POST["email"];
		$fone1 = $_POST["fone1"];
		$fone2 = $_POST["fone2"];
		$zap = $_POST["zap"];
		$face = $_POST["face"];
		$licenca = $_POST["licenca"];

		$sql = 'call sp_add_eleitores("'.$eleitor.'","'.$cidade.'","'.$bairro.'","'.$rua.'","'.$numero.'","'.$email.'","'.$fone1.'","'.$fone2.'","'.$zap.'","'.$face.'", "'.$licenca.'")';

		$sucesso = '<script>result0();</script>';
		$erro = '<script>result1();</script>';
		echo $query = fastquery_messages($sql, $erro, $sucesso);
	}
}
?>