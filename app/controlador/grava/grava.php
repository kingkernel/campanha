<?php
class grava{
	public function __construct(){

	}
	public function eleitor(){
		if($_POST["licenca"]){$_POST["licenca"]="";};

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
	echo $sql;

	}
}
?>