<?php
class grava{
	public function __construct(){

	}
	public function eleitor(){
		
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
		$cadfor = $_POST["iduser"];
		$lider = $_POST["lider"];
		if($lider==""||$lider==null){$lider="0";};
		$sql = 'call sp_add_eleitores("'.$eleitor.'","'.$cidade.'","'.$bairro.'","'.$rua.'","'.$numero.'","'.$email.'","'.$fone1.'","'.$fone2.'","'.$zap.'","'.$face.'", '.$licenca.', '.$cadfor.', '.$lider.')';

		$sucesso = '<script>result0();</script>';
		$erro = '<script>result1();</script>';
		echo $sql;
		echo $query = fastquery_messages($sql, $erro, $sucesso);
	}
	public function assessor(){
	
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
		$cadfor = $_POST["iduser"];
		$sql = 'call sp_add_assessor("'.$eleitor.'","'.$cidade.'","'.$bairro.'","'.$rua.'","'.$numero.'","'.$email.'","'.$fone1.'","'.$fone2.'","'.$zap.'","'.$face.'", '.$licenca.', '.$cadfor.')';

		$sucesso = '<script>result0();</script>';
		$erro = '<script>result1();</script>';
		echo $query = fastquery_messages($sql, $erro, $sucesso);
	}
}
?>