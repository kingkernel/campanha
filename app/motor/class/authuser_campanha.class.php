<?php
class authuser_campanha{
	public $usuario;
	public function __construct(){

	}
	public function loguser(){
		$sql = 'call sp_authuser("'.$this->usuario.'")';
		$query = retornadbinfo($sql);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		$_SESSION["result"] = $data;
		$_SESSION["userinfo"]["email"] = $data["email"] ;
		$_SESSION["userinfo"]["id"] = $data["id"];
		$_SESSION["userinfo"]["snhpwd"] = $data["snhpwd"];
		$_SESSION["userinfo"]["nome"] = $data["nome"];
		$_SESSION["userinfo"]["licenca"] = $data["licenca"];
		$_SESSION["userinfo"]["idlicenca"] = $data["idlicenca"];
		$_SESSION["userinfo"]["nomelicenca"] = $data["nomelicenca"];
		$_SESSION["userinfo"]["dataexpiracao"] = $data["dataexpiracao"];
	}
}
?>