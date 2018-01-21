<?php
class grava{
	public function __construct(){

	}
	public function eleitor(){
		print_r($_POST);
/*
<form action="/grava/eleitor" method="post" onsubmit="javascript: return false;"><fieldset ><legend>Eleitor</legend><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span><input type="text" class="form-control" name="eleitor" id="id_eleitor"  placeholder="Nome do Eleitor"/></div><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i></span><input type="text" class="form-control" name="cidade" id="id_cidade"  placeholder="Cidade"/></div><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i></span><input type="text" class="form-control" name="bairro" id="id_bairro"  placeholder="Bairro"/></div><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-road" aria-hidden="true"></i></span><input type="text" class="form-control" name="rua" id="id_rua"  placeholder="Rua"/></div><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home" aria-hidden="true"></i></span><input type="text" class="form-control" name="numero" id="id_numero"  placeholder="Número"/></div></fieldset><fieldset><legend>Contato</legend><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span><input type="text" class="form-control" name="email" id="id_email"  placeholder="E-mail"/></div><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></span><input type="text" class="form-control" name="fone1" id="id_fone1"  placeholder="Fone 1"/></div><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></span><input type="text" class="form-control" name="fone2" id="id_fone2"  placeholder="Fone 2"/></div><div class="input-group"><span class="input-group-addon"><i class="fa fa-whatsapp" aria-hidden="true"></i></span><input type="text" class="form-control" name="zap" id="id_zap"  placeholder="Whatsapp"/></div><div class="input-group"><span class="input-group-addon"><i class="fa fa-facebook-official" aria-hidden="true"></i></span><input type="text" class="form-control" name="face" id="id_face"  placeholder="http://Facebook.com/<<seu_nome_ou_ID>>"/
*/
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