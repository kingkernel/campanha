<?php
$menuup = new topmenu_campanha;

$pagina = new page_site;
	$card = new cardflip;
	$card->imgavatar =  PUBLICDIR ."images/avatar.jpg";
	$card->imgfundo = PUBLICDIR . "images/portico.jpg";
	$card->nomeuser = "";
//	print_r($_SESSION);
/*
Array ( [load] => Array ( [interface] => Array ( [framework] => bootstrap ) [banco_de_dadosXX] => Array ( [driver] => mysql [banco] => kingkernel_fabiano [usuario] => kingkernel_sistemas [senha] => claudi963099 [host] => 107.161.183.163 ) [banco_de_dados] => Array ( [driver] => mysql [banco] => campanha [usuario] => root [senha] => [host] => 127.0.0.1 ) [offlinedb] => Array ( [driver] => mysql [banco] => campanha [usuario] => root [senha] => [host] => 127.0.0.1 ) [urlmode] => Array ( [comandos] => url ) [index] => Array ( [dbstart] => 1 ) ) [dbmode] => online [LOGADO] => 1 [usuario] => root [result] => Array ( [id] => 1 [email] => root [snhpwd] => eaf3c978f6741fd07c7412ec61785cd6165f28b3 [nome] => Administrador [idlicenca] => 1 [licenca] => d85856315f45f63013b6f67e43aa4a0fd03f8c93 [nomelicenca] => licença de testes [dataexpiracao] => 2018-12-31 [ativo] => 1 ) [userinfo] => Array ( [email] => root [id] => 1 [snhpwd] => eaf3c978f6741fd07c7412ec61785cd6165f28b3 [nome] => Administrador [licenca] => d85856315f45f63013b6f67e43aa4a0fd03f8c93 [idlicenca] => 1 [nomelicenca] => licença de testes [dataexpiracao] => 2018-12-31 ) )
*/
$pagina->headersinclude .="<style>".$card->addcss."</style>";
$pagina->scriptsendpage = $card->addjsend;
$pagina->bodycontent = $menuup->html() . $card->html();
$pagina->render();
?>